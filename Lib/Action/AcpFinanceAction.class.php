<?php

/**
 * 财务管理类
 * 
 *
 */
class AcpFinanceAction extends AcpAction {
    
    /**
     * 构造函数
     * @author 姜伟
     * @return void
     * @todo
     */
    public function AcpFinanceAction() {
         parent::_initialize();
    }
 
    /**
     * 代理商余额变动明细
     * @author 姜伟
     * @return void
     * @todo 取account表中该用户的所有数据
     */
    public function get_account_log() {
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        $user_id    = $this->_request('user_id', 0);

        $change_type = $this->_request('change_type', 0);
        
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }

        //通过时间区间筛选数据
        if($start_time && $end_time)
            $where['addtime'] = array( array('GT', strtotime($start_time)), array('LT', strtotime($end_time)), 'AND'); 
        //按用户id筛选
        if($user_id)
            $where['user_id'] = $user_id;

        if ($change_type) {
            $where['change_type'] = $change_type;
        }
        
        //获取订单列表
        import('ORG.Util.Pagelist');// 导入分页类
        $AccountModel = new AccountModel();
        $count        = $AccountModel->getAccountNum($where);
        $Page         = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show         = $Page->show();
        $fields       = 'user_id,proof,addtime,change_type,amount_in,amount_out,amount_after_pay,remark';
		$AccountModel->setStart($Page->firstRow);
		$AccountModel->setLimit(C('PER_PAGE_NUM'));
        $changed_list = $AccountModel->getAccountList($fields, $where, 'addtime desc');
        $UserModel = new UserModel();
        foreach ($changed_list as $key => $value) 
        {
            $user_info                         = $UserModel->getParamUserInfo('user_id = ' . $value['user_id'], 'username');
            $changed_list[$key]['username']    = $user_info['username'];
            $changed_list[$key]['change_type'] = AccountModel::getChangeTypeList()[$value['change_type']];
        }
       // dump($changed_list);  
        
        //类型
        $this->assign('change_type_list', AccountModel::getChangeTypeList());

        //所有余额 不包括已禁的
        $total_left_money = M('Users')->where('is_enable = 1 AND role_type = 3')->sum('left_money');
        $total_frozen__money = M('Users')->where('is_enable = 1 AND role_type = 3')->sum('frozen_money');
        $this->assign('total_left_money', $total_left_money + $total_frozen__money);

        $this->assign('changed_list', $changed_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
		$this->assign('head_title', '款项出入明细');
		
        $this->display();
    }

    //手动充值
    public function recharge()
    {
        //筛选条件
        $where['role_type']         = array('EQ', 3);
        $where['is_enable']       = 1;

        //id号
        $code = I('recharge_id', '', 'strip_tags');
        if ($code) {
            $this->assign('recharge_id', $code);
            $user_recharge_obj = new UserRechargeModel();
            $user_recharge_info = $user_recharge_obj->getUserRechargeInfos('isuse = 1 AND expire_time >= ' . NOW_TIME . ' AND code = "' . $code . '"');
            if ($user_recharge_info) {
                $where['user_id'] = array('EQ', $user_recharge_info['user_id']);
            } else {
                $where['user_id'] = array('EQ', false);
            }

            import('ORG.Util.Pagelist');
            $UserModel  = new UserModel();
            $count      = $UserModel->getUserNum($where);
            $Page       = new Pagelist($count, C('PER_PAGE_NUM'));
            $show       = $Page->show();
            $user_list  = $UserModel->getUserList('nickname, mobile, left_money, user_id', $where, 'user_id desc', $Page->firstRow . ',' . $Page->listRows);
            //缺少判断可操作的权限===============================================================================
            $this->assign('data', $user_list);
            $this->assign('page', $show);
        }

		$this->assign('head_title', '充值');
        $this->display();
    }

    //充值
    public function recharge_by_admin() {
        $action      = $this->_request('action', '');
        $user_id     = $this->_request('user_id', 0);
        $amount_type = $this->_request('amount_type', 0);
        $amount      = $this->_request('amount', 0);
        $remark      = $this->_request('remark', '');
        $recharge_id = $this->_request('recharge_id', '');
       //缺少判断可操作的权限===============================================================================
        if(!$recharge_id)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,网络问题!')));
        if(!$user_id)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,没有找到可操作的ID!')));
        if($amount <= 0)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,充值金额必须大于0!')));
        if(!is_numeric($amount))
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,充值金额格式不正确!')));
        
        if($action == 'set')
        {
            $change_type = 1;

            //增加user表的left_money字段，并往account表插入一条记录
            $AccountModel = new AccountModel();
            $tag          = $AccountModel->addAccount($user_id, $change_type, $amount, $remark, '', '');
            if(!$tag) exit(json_encode(array('code'=>400, 'msg'=>'对不起,操作失败')));

            //充值返利
            D('Account')->RechargeBack($user_id, $amount);
            
            //设置过期
            D('UserRecharge')->where('code = "' . $recharge_id . '"')->setField('isuse', 0);

            exit(json_encode(array('code'=>200, 'msg'=>'恭喜您,操作成功!')));
        }
    }

     /**
     * 简单地列出代理商
     * @author 姜伟
     * @return void
     * @todo 从user表，取出属于代理商的数据列出来
     */
	public function edit_account()
	{
        $username = $this->_request('username', '');
        $id = $this->_request('id', '');

        //筛选条件
        $where['role_type']         = array('EQ', 3);
        $where['is_enable']       = 1;

        //用户姓名筛选
        if ($username)
            $where['nickname'] = array('LIKE', '%' . $username . '%');

        //用户账号筛选
        if ($id)
            $where['id'] = array('EQ', $id);

        import('ORG.Util.Pagelist');
        $UserModel  = new UserModel();
        $count      = $UserModel->getUserNum($where);
        $Page       = new Pagelist($count, C('PER_PAGE_NUM'));
        $show       = $Page->show();
        $UserModel->setStart($Page->firstRow);
        $UserModel->setLimit($Page->listRows);
        $user_list  = $UserModel->getUserList('id, nickname, realname, left_money, user_id', $where, 'left_money DESC, user_id desc', $Page->firstRow . ',' . $Page->listRows);
        //缺少判断可操作的权限===============================================================================
        $this->assign('data', $user_list);
        $this->assign('page', $show);
        $this->assign('username', $username);
        $this->assign('id', $id);
		$this->assign('head_title', '调整用户余额');
		
        $this->display();
    }
    
    /**
     * 待确认的入账
     * @author 姜伟
     * @return void
     * @todo 从tp_account_apply表取出申请的列表
     */
	public function get_account_apply_list()
	{
        $username   = $this->_request('username', '');
        $order_id   = $this->_request('order_id', '');
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }

        //筛选条件
        $where['apply_state'] = 0; 
        //用户账号筛选
        if($username)
        {
            $UserModel  = new UserModel();
            $user_info  = $UserModel->getParamUserInfo('username like "%'. $username .'%"', 'user_id');
            if($user_info)
			{
                $where['user_id']= $user_info['user_id'];
			}
        }
        
        //通过时间区间筛选数据
        if($start_time && $end_time)
            $where['addtime'] = array( array('gt', str_format_time($start_time)), array('lt', str_format_time($end_time)), 'and'); 

        //通过订单ID筛选
        if($order_id)
            $where['order_id']= $order_id;
        
        //获取入账申请列表
        import('ORG.Util.Pagelist');
        $AccountApplyModel  = new AccountApplyModel();
        $count              = $AccountApplyModel->getUnhandledAccountApplyNum($where);
        $Page               = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show               = $Page->show();
        $account_apply_list = $AccountApplyModel->getAccountApplyList($where, '', 'addtime desc', $Page->firstRow . ',' . $Page->listRows);
        $UserModel          = new UserModel();
        foreach ($account_apply_list as $key => $value) 
        {
            $user_info = $UserModel->getParamUserInfo('user_id = '. $value['user_id'], 'username');
            $account_apply_list[$key]['username'] = $user_info['username'];
        }
  // dump($account_apply_list); 
        //缺少判断可操作的权限===============================================================================
        
        $this->assign('data', $account_apply_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('username', $username);
		$this->assign('head_title', '线下入账申请');
		
        $this->display();
    }
     
    /**
     * 导出财务数据
     * @author 姜伟
     * @return void
     * @todo 从account表导出数据，支持选定代理商或起始时间
     */
    public function export_account() {
   
        $action     = $this->_request('action');
        $agent_no   = $this->_request('agent_no', '');
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }

        $export_url = '';
        if($action == 'select')
        {
            $tag = false;
            //通过代理商编号获取代理商的user_id
            if($agent_no)
            {
                $where     = array();
                $user_info = M('users')->where('agent_no = "'. $agent_no . '"')->field('user_id,username')->find();
                //echo  M('users')->_sql();
               
                //通过user_id获取指定数据
                if($user_info)
                    $where['user_id'] = $user_info['user_id'];
                else
                    $tag = true;
            }
            
            //通过时间区间筛选数据
            if($start_time && $end_time)
                $where['addtime'] = array( array('GT', str_format_time($start_time)), array('LT', str_format_time($end_time)), 'AND'); 
          
            //获取总条数
            $account    = M('account');
            $count      = $account->where($where)->order('addtime')->count();
            $agent_no = $agent_no ? $agent_no : 0;
            $export_url = '/AcpFinance/export_account/action/export/agent_no/'. $agent_no . '/start_time/'. $start_time .'/end_time/'. $end_time ;
            $count      = ($tag) ? 0 : $count ;
           
        }
        else if($action == 'export')
        {
            $tag = false;
            $where     = array();
            //通过代理商编号获取代理商的user_id
            if($agent_no && $agent_no != 'start_time')
            {
                $user_info = M('users')->where('agent_no = "'. $agent_no . '"')->field('user_id,username')->find();
                if($user_info)
                    $where['user_id'] = $user_info['user_id'];
                 else
                    $tag = true;
            }
            //通过时间区间筛选数据
            if($start_time && $end_time)
            {
                $where['addtime'][] = array('GT', str_format_time($start_time)); 
                $where['addtime'][] = array('LT', str_format_time($end_time)); 
            }   

            //获取数据
            $account = D('Account');
            $arr     = $account->where($where)->order('addtime')->select();
            #echo "<pre>";
            #print_r($arr);die;
            
            $count   = count($arr);
            $count   = ($tag) ? 0 : $count ;
        
            //引入PHPExcel类库
            vendor('Excel.PHPExcel');
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Da")
                    ->setLastModifiedBy("Da")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX,generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet(0)->setTitle('财务变动明细报表');          //标题
            $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);      //单元格宽度
            $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial'); //设置字体
            $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);      //设置字体大小
            $objPHPExcel->getActiveSheet(0)->setCellValue('A1', '用户名');
            $objPHPExcel->getActiveSheet(0)->setCellValue('B1', '操作类型');
            $objPHPExcel->getActiveSheet(0)->setCellValue('C1', '入账金额');
            $objPHPExcel->getActiveSheet(0)->setCellValue('D1', '出账金额');
            $objPHPExcel->getActiveSheet(0)->setCellValue('E1', '变动前预存款金额');
            $objPHPExcel->getActiveSheet(0)->setCellValue('F1', '变动后预存款结余');
            $objPHPExcel->getActiveSheet(0)->setCellValue('G1', '相关订单号');
            $objPHPExcel->getActiveSheet(0)->setCellValue('H1', '操作人');
            $objPHPExcel->getActiveSheet(0)->setCellValue('I1', '记录生成时间');
            $objPHPExcel->getActiveSheet(0)->setCellValue('J1', '备注');
            $objPHPExcel->getActiveSheet(0)->setCellValue('K1', '支付凭证号');
            $objPHPExcel->getActiveSheet(0)->setCellValue('L1', '操作人IP');
            
            //每行数据的内容
            foreach ($arr as  $value) {
                static $i  = 2;
                //获取用户信息
                $user_info = M('users')->where('user_id = ' . $value['user_id'])->field('username')->find();
               
                //用户名
                $objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $user_info['username']);
                //操作类型
                $objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, AccountModel::getChangeTypeList()[$value['change_type']]);
                //入账金额
                $objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $value['amount_in']);
                //出账金额
                $objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, $value['amount_out']);
                //变动前预存款金额
                $objPHPExcel->getActiveSheet(0)->setCellValue('E' . $i, $value['amount_before_pay']);
                //变动后预存款结余
                $objPHPExcel->getActiveSheet(0)->setCellValue('F' . $i, $value['amount_after_pay']);
                //相关订单号
				$order_sn = '--';
				if ($value['order_id'])
				{
                    try
                    {
                        $order_obj = new OrderModel($value['order_id']);
                        $order_info = $order_obj->getOrderInfo('order_sn');
                        $order_sn = "'" . $order_info['order_sn'];
                    }
                    catch (Exception $e)
                    {
                        //订单不存在，不处理
                    }
				}
                $objPHPExcel->getActiveSheet(0)->setCellValue('G' . $i, $order_sn);
                //操作人姓名
				$realname = '--';
				if ($value['operater'])
				{
					$user_obj = new UserModel($value['operater']);
					$user_info = $user_obj->getUserInfo('realname');
				}
                $objPHPExcel->getActiveSheet(0)->setCellValue('H' . $i, $realname);
                //记录生成时间
                $value['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
                $objPHPExcel->getActiveSheet(0)->setCellValue('I' . $i, $value['addtime']);
                //备注
                $objPHPExcel->getActiveSheet(0)->setCellValue('J' . $i, $value['remark']);
                //支付凭证号
                $objPHPExcel->getActiveSheet(0)->setCellValue('K' . $i, $value['proof']);
                //操作人IP
                $objPHPExcel->getActiveSheet(0)->setCellValue('L' . $i, $value['ip']);
                $i++;
            }
            
            //直接输出文件到浏览器下载
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="财务变动明细报表_' . date("YmdHis") . '.xls"');
            header('Cache-Control: max-age=0');
            ob_clean(); //关键
            flush(); //关键
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
        }
        
        if($start_time == 'end_time')
		{
            $start_time = '';
		}
        
        
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('count', $count);
        $this->assign('export_url', $export_url);
		$this->assign('head_title', '导出财务数据');
		
        $this->display();
    }

    
     /**
     * 申请入帐明细
     * @author 姜伟
     * @return void
     * @todo 从tp_account_apply表取出申请的列表
     */
    public function account_apply_list() {
        $username      = $this->_request('username', '');
        $start_time    = $this->_request('start_time', '');
        $end_time      = $this->_request('end_time', '');
        $apply_state   = $this->_request('apply_state', 4);
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }
        //筛选条件
        if($apply_state != 4)
             $where['apply_state'] = $apply_state; 
        //用户名称筛选
        if($username)
        {
            $UserModel  = new UserModel();
            $user_info  = $UserModel->getParamUserInfo('username like "%'. $username .'%"', 'user_id');
            if($user_info)
                $where['user_id']= $user_info['user_id'];
        }   
   
        //通过时间区间筛选数据
        if($start_time && $end_time)
            $where['addtime'] = array( array('gt', str_format_time($start_time)), array('lt', str_format_time($end_time)), 'and'); 

        //获取订单列表
        import('ORG.Util.Pagelist');
        $AccountApplyModel  = new AccountApplyModel();
        $count              = $AccountApplyModel->getUnhandledAccountApplyNum($where);

        $Page               = new Pagelist($count,C('PER_PAGE_NUM')); 
        $show               = $Page->show();
        $account_apply_list = $AccountApplyModel->getAccountApplyList($where, '', '', $Page->firstRow . ',' . $Page->listRows);
     //dump($account_apply_list);
        $UserModel          = new UserModel();
        foreach ($account_apply_list as $key => $value) 
        {
            $user_info                            = $UserModel->getParamUserInfo('user_id = '. $value['user_id'], 'username');
            $account_apply_list[$key]['username'] = $user_info['username'];
        }
     
 
        //缺少判断可操作的权限===============================================================================
        
        $this->assign('data', $account_apply_list);
        $this->assign('page', $show);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('username', $username);
        $this->assign('apply_state', $apply_state);
		$this->assign('head_title', '申请入账明细');
		
        $this->display();
    }
    

    /**
     * 通过,或拒绝入账申请
     * @author 姜伟
     * @return void
     * @todo 往account表插入一条记录
     * @todo 修改用户的预存金额
     * @todo 修改account表中记录的行状态
     * @todo 向款项出入明细表增加一条记录
     */
    public function confirm_enter() {
        $action           = $this->_request('action', '');
        $account_apply_id = $this->_request('id', 0);
        //缺少判断可操作的权限===============================================================================
        if(!$account_apply_id)
            $this->error('对不起,没有找到可操作的ID!');

        if($action == 'by')
        {
            //获取该条信息记录
            $AccountApplyModel  = new AccountApplyModel($account_apply_id);
            $account_apply_info = $AccountApplyModel->getAccountApplyById($account_apply_id);
           
            if(!$account_apply_info) 
                $this->error('对不起,没有你要查询的数据!');
            
            $AccountModel = new AccountModel();
            $left_money          = $AccountModel->addAccount($account_apply_info['user_id'], 3, $account_apply_info['amount'], '管理员手动通过入账申请', $account_apply_info['order_id'], $account_apply_info['proof']);
            if($left_money < 0)
                $this->error('对不起,余额不足，修改用户预存款失败!');
            
			//根据订单号取订单ID
			$order_obj = new OrderModel();
			$order_id = $order_obj->getOrderIdByOrderSn($account_apply_info['order_id']);
			//若申请信息中有订单号，自动为该笔订单付款
			$order_id = intval($order_id);
			if ($order_id)
			{
				//获取订单信息
				$order_obj = new OrderModel($order_id);
				try
				{
					$order_info = $order_obj->getOrderInfo('order_sn, pay_amount, order_status, order_type');
					//若未付款，为该笔订单付款，否则不处理
					if ($order_info['order_status'] == 0)
					{
						//为该笔订单付款

						$is_virtual_stock_order = $order_info['order_type'] == 2 ? true : false;
						$left_money = $AccountModel->addAccount($account_apply_info['user_id'], 5, floatval($order_info['pay_amount']) * -1, '支付订单号为' . $order_info['order_sn'] . '的订单', $order_id, $account_apply_info['proof'], $is_virtual_stock_order);
					}
				}
				catch (Exception $e)
				{
					//订单不存在，不处理
				}
			}

             //修改account表中记录的行状态为通过
            $apply_state_tag =  $AccountApplyModel->passAccountApply(array( 'apply_state' => 1));
            
            if($apply_state_tag)
                $this->success('恭喜您,操作已成功！该用户账户余额已调整为：' . $left_money);
            
        }
        else if($action == 'refusal')
        {
            //修改account表中记录的行状态为拒绝
            $AccountApplyModel = new AccountApplyModel($account_apply_id);
            $apply_state_tag   =  $AccountApplyModel->passAccountApply(array( 'apply_state' => 2));
            
            if($apply_state_tag)
                $this->success('恭喜您,操作已成功!');
        }
    }
    
    
    /**
     * 修改代理商的账户余额
     * @author 姜伟
     * @return void
     * @todo 如果金额为0，返回加款失败；如果减款金额大于总余额，返回失败；
     * @todo 增加user表的left_money字段，往account表插入一条记录
     */
    public function set_amount() {
        $action      = $this->_request('action', '');
        $user_id     = $this->_request('user_id', 0);
        $amount_type = $this->_request('amount_type', 0);
        $amount      = $this->_request('amount', 0);
        $remark      = $this->_request('remark', '');
       //缺少判断可操作的权限===============================================================================
        if(!$user_id)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,没有找到可操作的ID!')));
        if(!$amount)
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,变动金额必须大于0!')));
        if($amount && !preg_match('/^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$/', $amount))
            exit(json_encode(array('code'=>400, 'msg'=>'对不起,变动金额格式不正确!')));
        
        if($action == 'set')
        {
            //加款还是减款
            $change_type = 3;
            
            if($amount_type)
            {
                  $amount      = '-'.$amount;
                  $change_type = 6;
            }
                
            
            //增加user表的left_money字段，并往account表插入一条记录
            $AccountModel = new AccountModel();
            $tag          = $AccountModel->addAccount($user_id, $change_type, $amount, $remark, '', '');
                
            if(!$tag)
                exit(json_encode(array('code'=>400, 'msg'=>'对不起,操作失败,当前减款金额大于总余额!')));
            
            exit(json_encode(array('code'=>200, 'msg'=>'恭喜您,操作成功!')));
        }
    }

    
   
    
    
    /**
     * 入账比例报表
     * @author 姜伟
     * @return void
     * @todo 从order表中取出多种v，按它们已付款的订单额，显示成线状图(除电子钱包外的饼图)
     */
    public function chart_payment() {
        $start_time = $this->_request('start_time', '');
        $end_time   = $this->_request('end_time', '');
        if($start_time)
        {
            $start_time = str_replace('+', ' ', $start_time);
        }
        if($end_time)
        {
            $end_time = str_replace('+', ' ', $end_time);
        }
        $s_time = str_format_time($start_time);
        $e_time = str_format_time($end_time);

        if($s_time > $e_time)
             $this->error('对不起,您选择的开始时间不能大于结束时间!');
        
        //按时间统计出每种支付方式的总金额
        $OrderModel = new OrderModel();
        $OrderModel->setListFields('payway_name, pay_time');
        $order_listt     = $OrderModel->getVolumeOfTradeGroupByPayway($s_time, $e_time);

        //计算总金额的百分之1
        $order_total_volumn     = $OrderModel->getVolumeOfTrade($s_time, $e_time);
        $order_total_volumn_one = number_format(($order_total_volumn / 100), 2, '.', '');

        //输出饼状图
        import('ORG.Util.Highcharts');
        $arr = array();
        foreach($order_listt as $k=>$value)
        {
            $proportion      = number_format(($value['total_volumn'] / $order_total_volumn_one), 2, '.', '');
            $arr[$k]['name'] =   $value['payway_name'] .":". $value['total_volumn'] .'元';
            $arr[$k]['num']  =  $proportion;
        }
        $data = ch_json_encode($arr);
        $this->assign('data',$data);

        $this->assign('time', $start_time . ' 至  '  .$end_time);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('order_listt', $order_listt);
		$this->assign('head_title', '入账比例报表');
		
        $this->display();
    }

    /**
     * 充值按日统计
     */
    public function recharge_stat_by_day() 
    {
		$add_time = $this->_post('add_time');
		$change_type = $this->_post('change_type');
        $change_type = $change_type ? $change_type : AccountModel::ONLINE_VOUCHER;
        $this->assign('change_type', $change_type);
		$start_time = 0;
		$end_time = 0;
		$date = '';

		if ($add_time)
		{
			$start_time = strtotime(date('Y-m-d', strtotime($add_time)));
			#$end_time = strtotime(date('Y-m-d', strtotime($add_time))) + 115200;
			$end_time = strtotime(date('Y-m-d', strtotime($add_time))) + 115200;
			$date = date('Y-m-d', strtotime($add_time));
		}
		else
		{
			//今天0点的时间戳
			$end_time = strtotime(date('Y-m-d', time())) + 86400;

			//昨天0点的时间戳
			#$start_time = strtotime(date('Y-m-d', time())) - 86400;
			$start_time = strtotime(date('Y-m-d', time()));
			$date  = date('Y-m-d', $start_time);
		}

        $where = 'change_type = ' . $change_type . ' AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time;
        if ($change_type == AccountModel::ONLINE_VOUCHER || $change_type == AccountModel::MANUAL_OPERATOR) {
            $field_type  = 'amount_in';
        } else {
            $field_type  = 'amount_out';
        }

		//获取充值统计数据
		$account_obj = new AccountModel();
		$recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%H") AS hour, COUNT(*) AS recharge_num, SUM('.$field_type.') AS total_amount')->where($where)->group('hour')->order('addtime DESC')->select();

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 24; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['hour'])] = $val['total_amount'];
		}

		$this->assign('recharge_amount_stat_list', $new_recharge_stat_list);

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 24; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['hour'])] = $val['recharge_num'];
		}

		$this->assign('recharge_num_stat_list', $new_recharge_stat_list);
		$this->assign('date', $date);
		#echo "<pre>";
		#print_r($recharge_stat_list);
		#echo $account_obj->getLastSql();
		#print_r($new_uv_list);

        //TITLE中的页面标题
		$this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '按日统计');
        $this->display();
    }

    /**
     * 充值按月统计
     */
    public function recharge_stat_by_month() 
    {
		$change_type = $this->_post('change_type');
        $change_type = $change_type ? $change_type : AccountModel::ONLINE_VOUCHER;
        $this->assign('change_type', $change_type);

		$year = $this->_post('year');
		$month = $this->_post('month');
		$year = $year ? $year : date('Y');
		$month = $month ? $month : date('m');
		$start_time = 0;
		$end_time = 0;
		$date = '';

		if ($year && $month)
		{
			$this->assign('year', $year);
			$this->assign('month', $month);
			$start_time = mktime(0, 0, 0, $month, 1, $year);
			if ($month == 12)
			{
				$year ++;
				$month = 1;
			}
			else
			{
				$month ++;
			}

			$end_time = mktime(0, 0, 0, $month, 1, $year) - 1;
			$date = $year . '-' . date('m');
		}

        $where = 'change_type = ' . $change_type . ' AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time;
        if ($change_type == AccountModel::ONLINE_VOUCHER || $change_type == AccountModel::MANUAL_OPERATOR) {
            $field_type  = 'amount_in';
        } else {
            $field_type  = 'amount_out';
        }

		//获取充值统计数据
		$account_obj = new AccountModel();
		$recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%d") AS day, COUNT(*) AS recharge_num, SUM('.$field_type .') AS total_amount')->where($where)->group('day')->order('addtime DESC')->select();

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 30; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['day'])] = $val['total_amount'];
		}

		$this->assign('recharge_amount_stat_list', $new_recharge_stat_list);

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 30; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['day'])] = $val['recharge_num'];
		}

		$this->assign('recharge_num_stat_list', $new_recharge_stat_list);
		$this->assign('date', $date);
		$this->assign('day_num', date('d', mktime(0,0,0,$month + 1,0,$year)));

        //TITLE中的页面标题
		$this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '按月统计');
        $this->display();
    }

    /**
     * 充值按年统计
     */
    public function recharge_stat_by_year() 
    {
		$change_type = $this->_post('change_type');
        $change_type = $change_type ? $change_type : AccountModel::ONLINE_VOUCHER;
        $this->assign('change_type', $change_type);

		$year = $this->_post('year');
		$start_time = 0;
		$end_time = 0;
		$date = '';

		if ($year)
		{
			$start_time = mktime(0, 0, 0, 1, 1, $year);
			$end_time = mktime(0, 0, 0, 1, 1, $year + 1) - 1;
			$date = date('Y-m-d', strtotime($year));
		}
		else
		{
			$year = date('Y');
			$start_time = mktime(0, 0, 0, 1, 1, $year);
			$end_time = mktime(0, 0, 0, 1, 1, $year + 1) - 1;
		}
		$this->assign('year', $year);

        $where = 'change_type = ' . $change_type . ' AND addtime >= ' . $start_time . ' AND addtime <= ' . $end_time;
        if ($change_type == AccountModel::ONLINE_VOUCHER || $change_type == AccountModel::MANUAL_OPERATOR) {
            $field_type  = 'amount_in';
        } else {
            $field_type  = 'amount_out';
        }

		//获取充值统计数据
		$account_obj = new AccountModel();
		$recharge_stat_list = $account_obj->field('DATE_FORMAT(FROM_UNIXTIME(addtime), "%m") AS month, COUNT(*) AS recharge_num, SUM(' . $field_type . ') AS total_amount')->where($where)->group('month')->order('addtime DESC')->select();

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 12; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['month'])] = $val['total_amount'];
		}

		$this->assign('recharge_amount_stat_list', $new_recharge_stat_list);

		$new_recharge_stat_list = array();
		for ($i = 0; $i <= 12; $i ++)
		{
			$new_recharge_stat_list[$i] = 0;
		}

		//组成数组
		foreach ($recharge_stat_list AS $key => $val)
		{
			$new_recharge_stat_list[intval($val['month'])] = $val['recharge_num'];
		}

		$this->assign('recharge_num_stat_list', $new_recharge_stat_list);
		$this->assign('date', $date);

        //TITLE中的页面标题
		$this->assign('shop_name', $GLOBALS['install_info']['shop_name']);
        $this->assign('head_title', '按年统计');
        $this->display();
    }



    //找出问题
    public function get_problem_info()
    {
        $account_obj = new AccountModel();
        $where = 'change_type = 1';
        $fields       = 'user_id,proof,addtime,change_type,amount_in,amount_out,amount_after_pay,remark';

        import('ORG.Util.Pagelist');// 导入分页类
        $count        = $account_obj->getAccountNum($where);
        $Page         = new Pagelist($count,100); 
        $show         = $Page->show();
		$account_obj->setStart($Page->firstRow);
		$account_obj->setLimit(100);
        $list = $account_obj->getAccountList($fields, $where, 'addtime DESC');
        $UserModel = new UserModel();
        $list_all = array();
        foreach ($list AS $k=>$v) {
            $start_time = $v['addtime'] -300;
            $count = $account_obj->where('change_type = 13 AND user_id = ' . $v['user_id'] . ' AND addtime >= ' . $start_time . ' AND addtime <= ' . $v['addtime'])->count();

            if (!$count) {
                continue;
            }
            $info = $account_obj->field($field)->where('change_type = 13 AND user_id = ' . $v['user_id'] . ' AND addtime >= ' . $start_time . ' AND addtime <= ' . $v['addtime'])->find();
            $list_all[] = $list[$k];
            $list_all[] = $info;

        }

        foreach($list_all AS $k=>$v) {
            $user_info                         = $UserModel->getParamUserInfo('user_id = ' . $v['user_id'], 'username');
            $list_all[$k]['username']    = $user_info['username'];
            $list_all[$k]['change_type'] = AccountModel::getChangeTypeList()[$v['change_type']];
        }

        $this->assign('changed_list', $list_all);
        $this->assign('page', $show);
        $this->display(APP_PATH . 'Tpl/AcpFinance/get_account_log.html');
    }
}

?>
