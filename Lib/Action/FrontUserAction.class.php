<?php
class FrontUserAction extends UcpAction{
	function _initialize()
	{
		$user_id = intval(session('user_id'));
        $state = $this->_request('state');
        if (ACTION_NAME != 'pay_page' && ACTION_NAME != 'alipay_response') 
        {
            parent::_initialize();
        } else {
            parent::excute_parent_initialize();
        }

		/*if ((ACTION_NAME == 'bind_mobile' || ACTION_NAME == 'bind_mobile') && $state != 1 && $user_id)
		{
			header("Content-Type:text/html; charset=utf-8");
			die('请通过微信访问');
		}*/
		#parent::_initialize();
		#$this->item_num_per_account_page = $GLOBALS['config_info']['item_num_per_account_page'];
		$this->item_num_per_account_page = 10; //账目明细
        $this->per_page_num = 6;  //一般
        $this->my_exchange_page_num = 8; //我的兑换

	}

	//个人中心
	public function personal_center()
	{
		$user_id = intval(session('user_id'));
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('nickname, headimgurl, left_money, consumed_money, user_rank_id, is_extend_user');
		$where = 'user_id = ' . $user_id;
		//获取等级名称
		$user_rank_obj = new UserRankModel();
		$user_rank_info = $user_rank_obj->getUserRankInfo('user_rank_id = ' . $user_info['user_rank_id'], 'rank_name');
		$user_info['rank_name'] = $user_rank_info['rank_name'];
		unset($user_rank_info['user_rank_id']);
		//获取用户积分数
		$user_integral_obj = new IntegralModel();
		$user_integral_list = $user_integral_obj->getIntegralList('end_integral', $where, 'addtime DESC');
		$this->assign('user_integral_list', $user_integral_list);

		//分销是否开启
		$is_fenxiao_open = $GLOBALS['config_info']['IS_FENXIAO_OPEN'];
		$this->assign('is_fenxiao_open', $is_fenxiao_open);


		//底部导航赋值
		$this->assign('nav', 'per_center');
		$this->assign('user_info', $user_info);
		$this->assign('head_title', '个人中心');
		$this->display();
	}

	//个人中心V2
	public function personal_center_v2()
	{
		$user_id = intval(session('user_id'));
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('nickname, headimgurl, left_money, consumed_money, user_rank_id, is_extend_user');
		$where = 'user_id = ' . $user_id;
		//获取等级名称
		$user_rank_obj = new UserRankModel();
		$user_rank_info = $user_rank_obj->getUserRankInfo('user_rank_id = ' . $user_info['user_rank_id'], 'rank_name');
		$user_info['rank_name'] = $user_rank_info['rank_name'];
		unset($user_rank_info['user_rank_id']);
		//获取用户积分数
		$user_integral_obj = new IntegralModel();
		$user_integral_list = $user_integral_obj->getIntegralList('end_integral', $where, 'addtime DESC');
		$this->assign('user_integral_list', $user_integral_list);

		//分销是否开启
		$is_fenxiao_open = $GLOBALS['config_info']['IS_FENXIAO_OPEN'];
		$this->assign('is_fenxiao_open', $is_fenxiao_open);

		//底部导航赋值
		$this->assign('nav', 'per_center');
		$this->assign('user_info', $user_info);
		$this->assign('head_title', '个人中心');
		$this->display();
	}

	//个人资料
	public function personal_data()
	{
		//获取用户资料
		$user_id = intval(session('user_id'));
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('nickname, realname, mobile, email, headimgurl, id, left_money, frozen_money, user_id');
        $user_info['left_money'] = $user_info['left_money'] + $user_info['frozen_money'];

        //是否已关闭
        $is_open = ConfigBaseModel::is_recharge_time();
        $this->assign('is_open', $is_open);

        //推广是否开启
        $is_open_back = $GLOBALS['config_info']['IS_RECHARGE_BACK_CLOSE'];
		$this->assign('is_open_back', $is_open_back);
		$this->assign('close_recharge_back_alert', $GLOBALS['config_info']['CLOSE_RECHARGE_BACK_ALERT']);

		$this->assign('user_info', $user_info);
		$this->assign('head_title', '个人资料');
		$this->display();
	}

	//钱包
	public function wallet()
	{
		//获取用户资料
		$user_id = intval(session('user_id'));
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('left_money');
        $user_info['member_card_id'] = $member_card_id = $user_obj->getMemberCardID($user_id);

		$this->assign('user_info', $user_info);
		$this->assign('head_title', '我的钱包');
		//底部导航赋值
		$this->assign('nav', 'wallet');
		$this->display();
	}


	//申请退款页，接受订单ID，获取订单相关的商家和镖师，供用户选择投诉对象用。
	public function apply_refund()
	{
		//订单ID
		$order_id = $this->_get('order_id');
		$order_obj = new OrderModel($order_id);
		try
		{
			$order_info = $order_obj->getOrderInfo('order_id, order_sn, order_status, pay_amount, express_fee');
		}
		catch (Exception $e)
		{
			$this->alert('对不起，订单不存在', U('/FrontMall/mall_home'));
		}

		if ($order_info['order_status'] == OrderModel::REFUNDING)
		{
			$this->alert('对不起，该订单正在申请退款中', U('/FrontOrder/order_detail/order_id/' . $order_id));
		}

		$img_url = $this->_request('img_url');
		if (isset($_POST['img_url']))
		{
			//退款信息
			$apply_info = array(
				'proof'			=> $img_url,
				'refund_money'	=> $order_info['pay_amount'],
				'reason'		=> $this->_request('reason'),
				'refund_type'	=> $this->_request('refund_type'),
			);
			$success = $order_obj->refundApply($apply_info);
			if ($success)
			{
				$this->alert('恭喜您，申请退款成功', '/FrontOrder/refunding_order');
			}
			else
			{
				$this->alert('抱歉，申请退款失败');
			}
		}

		//退款原因列表
		#$order = new OrderModel();
        $arr_refund_reason = $order_obj->getRefundReasonList();
		$this->assign('arr_refund_reason', $arr_refund_reason);

		$this->assign('complain_target_list', $complain_target_list);
		$this->assign('order_id', $order_id);
		$this->assign('head_title', '申请退款');
		$this->display();
	}

	//设置
	public function setup()
	{
		//获取用户信息
		$user_id = intval(session('user_id'));
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('mobile, email, nickname, headimgurl');

		$this->assign('user_info', $user_info);
		$this->assign('head_title', '设置');
		$this->display();
	}

	//意见反馈
	public function suggest()
	{
		$this->assign('head_title', '意见反馈');
		$this->display();
	}

	//验证手机号
	public function bind_mobile()
	{
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('mobile');

		$act = I('action');
        if ($act == 'bind')
        {
            $mobile = I('mobile');
            $verify_code = I('verify_code');

            if (!$mobile || !checkMobile($mobile)) exit('手机号不正确');
            if (!$verify_code) exit('验证码不为空');

            //验证手机号和验证码合法性
            $verify_code_obj = new VerifyCodeModel();
            if (!$verify_code_obj->checkVerifyCodeValid($verify_code, $mobile))
            {
                exit('对不起，验证码无效');
            }

            //验证手机号是否已有人用过
            $is_use = M('Users')->where('user_id != ' . $user_id . ' AND mobile = "' . $mobile . '"')->count();
            if ($is_use) exit('对不起，此号码已使用过了');

            if ($user_info['mobile'] == $mobile) exit('success');

            //绑定手机号
            $arr = array(
                'mobile'	=> $mobile
            );
            $user_obj->setUserInfo($arr);
            $success = $user_obj->saveUserInfo();
            log_file('sql = ' . $user_obj->getLastSql(), 'bind_mobile', true);
            if ($success) {
                exit('success');
            } else {
                exit('抱歉，系统错误，绑定失败');
            }

        }

		$this->assign('head_title', '绑定手机号');
		$this->display();
	}


	//验证邮箱
	public function bind_email()
	{
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getUserInfo('email');

		$act = I('action');
        if ($act == 'bind')
        {
            $email = I('email');
            $verify_code = I('verify_code');

            if (!$email || !checkEmail($email)) exit('邮箱不正确');
            if (!$verify_code) exit('验证码不为空');

            //验证手机号和验证码合法性
            $verify_code_obj = new VerifyCodeModel();
            if (!$verify_code_obj->checkVerifyCodeValid($verify_code, $email))
            {
                exit('对不起，验证码无效');
            }

            if ($user_info['email'] == $email) exit('success');

            //绑定手机号
            $arr = array(
                'email'	=> $email
            );
            $user_obj->setUserInfo($arr);
            $success = $user_obj->saveUserInfo();
            log_file('sql = ' . $user_obj->getLastSql(), 'bind_mobile', true);
            if ($success) {
                exit('success');
            } else {
                exit('抱歉，系统错误，绑定失败');
            }

        }

		$this->assign('head_title', '绑定邮箱');
		$this->display();
	}

	//财务往来明细页 by cc
	public function account_list()
	{
		$user_id = intval(session('user_id'));
		$where = 'user_id = ' . $user_id;
		$account_obj = new AccountModel();
		//总数
		$total = $account_obj->getAccountNum($where);
		$account_obj->setStart(0);
        $account_obj->setLimit($this->item_num_per_account_page);
		$account_list = $account_obj->getAccountList('remark, addtime, amount_before_pay, amount_after_pay, amount_in, amount_out, order_id, change_type, operater', $where, 'addtime DESC');
		$account_list = $account_obj->getListData($account_list);
		#echo "<pre>";
		#print_r($account_list);
		#die;

        $user_obj = new UserModel($user_id);
        $user_info = $user_obj->getLeftAndFrozenMoney();
        $left_money = $user_info['left_money'] + $user_info['frozen_money'];
		$this->assign('left_money', $left_money);

		$this->assign('account_list', $account_list);
		$this->assign('total_num', $total);
		$this->assign('page_num', $this->item_num_per_account_page);

		$this->assign('head_title', '鱼翅明细');
		$this->display();
	}

	//异步获取财务列表
	public function ajax_account_list()
	{
		$user_id = intval(session('user_id'));
		$firstRow = I('firstRow');
		$where = 'user_id = ' . $user_id;
		$account_obj = new AccountModel();
		//订单总数
		$total = $account_obj->getAccountNum($where);

		if ($firstRow < ($total - 1) && $user_id)
		{
			$account_obj->setStart($firstRow);
			$account_obj->setLimit($this->item_num_per_account_page);
			$account_list = $account_obj->getAccountList('remark, addtime, amount_before_pay, amount_after_pay, amount_in, amount_out, order_id, change_type, operater', $where, 'addtime DESC');
			$account_list = $account_obj->getListData($account_list);

			foreach ($account_list AS $k => $v)
			{
				$account_list[$k]['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
			}

			echo json_encode($account_list);
			exit;
		}

		exit('failure');
	}

	//充值记录页 by cc
	public function recharge_list()
	{
		//获取充值列表
		$user_id = intval(session('user_id'));
		$where = 'change_type = 1 AND user_id = ' . $user_id;
		$account_obj = new AccountModel();
		//总数
		$total = $account_obj->getAccountNum($where);
		$account_obj->setStart(0);
        $account_obj->setLimit($this->item_num_per_account_page);
		$account_list = $account_obj->getAccountList('remark, addtime, amount_before_pay, amount_after_pay, amount_in, change_type', $where, 'addtime DESC');
		$account_list = $account_obj->getListData($account_list);
		$this->assign('account_list', $account_list);
		$this->assign('total', $total);
		$this->assign('firstRow', $this->item_num_per_account_page);

		$this->assign('head_title', '充值记录');
		$this->display();
	}

	//积分明细 by cc
	public function integral_list()
	{
		$user_id = intval(session('user_id'));
		$where = 'user_id = ' . $user_id;
		$integral_obj = new IntegralModel();
		//总数
		$total = $integral_obj->getIntegralNum($where);
		$integral_obj->setStart(0);
        $integral_obj->setLimit($this->item_num_per_account_page);
		$integral_list = $integral_obj->getIntegralList('remark, addtime, start_integral, end_integral, integral, id, change_type, operater', $where, 'addtime DESC');
		$integral_list = $integral_obj->getListData($integral_list);

		$this->assign('integral_list', $integral_list);
		$this->assign('total', $total);
		$this->assign('firstRow', $this->item_num_per_account_page);

		$this->assign('head_title', '积分明细');
		$this->display();
	}


	//消息中心 by zlf
	public function message_list()
	{
		$user_id = intval(session('user_id'));
		$where = 'reply_user_id = ' . $user_id;
		$message_obj = new MessageModel();
		//得到未读消息数量
		$not_read_num = $message_obj->getMessageNum($where . ' AND is_read = 0');
		//总数
		$total = $message_obj->getMessageNum($where);

		//得到消息列表
		$message_obj->setStart(0);
        $message_obj->setLimit($this->item_num_per_account_page);
		$message_list = $message_obj->getMessageList('message_id, addtime, message_type, message_contents, is_read', $where, 'addtime DESC');
		$message_list = $message_obj->getListData($message_list);

		$this->assign('not_read_num',$not_read_num);
		$this->assign('message_list',$message_list);
		$this->assign('total', $total);
		$this->assign('firstRow', $this->item_num_per_account_page);
		$this->assign('head_title', '消息中心');
		$this->display();
	}

	//异步获取消息列表
	public function get_message_list()
	{

		$firstRow = I('post.firstRow');
		$user_id = intval(session('user_id'));
		$where = 'reply_user_id = ' . $user_id;
		$message_obj = new MessageModel();

		//总数
		$total = $message_obj->getMessageNum($where);

		if ($firstRow <= ($total - 1) && $user_id)
		{
			$message_obj->setStart($firstRow);
	        $message_obj->setLimit($this->item_num_per_account_page);
			$message_list = $message_obj->getMessageList('message_id, addtime, message_type, message_contents, is_read', $where, 'addtime DESC');
			$message_list = $message_obj->getListData($message_list);

			echo json_encode($message_list);
			exit;
		}

		exit('failure');
	}

	//消息详情 by cc
	public function message_detail()
	{
		$id = intval($this->_get('id'));
		$message_obj = new MessageModel();
		$where = 'message_id = ' . $id;

		$message_info = $message_obj->getMessageInfo($where, 'message_id, addtime, message_type, message_contents, is_read');
		#消息类型，1发送，2回复，3管理员群发
        if ($message_info['message_type'] == 1) {
            $type_text = '发送';
        }elseif ($message_info['message_type'] == 2) {
            $type_text = '回复';
        }elseif ($message_info['message_type'] == 3) {
            $type_text = '管理员群发';
        }
		$this->assign('message_info', $message_info);
		$this->assign('type_text', $type_text);
		$this->assign('head_title', '消息详情');
		$this->display();
	}

    /**
     * 验证充值信息
     * wzg
     */
    public function check_recharge_info()
    {
        //是否可以充值
        $is_recharge = ConfigBaseModel::is_recharge_time();
        if (!$is_recharge) {
            $alert_text = $GLOBALS['config_info']['CLOSE_RECHARGE_ALERT'];
            //$this->alert($alert_text, '/FrontUser/personal_data.html');
            return $alert_text;
        }

        //充值金额
        $recharge_money = I('recharge_money', 0, 'int');
        $total_money = I('total_money', 0, 'int');
        $recharge_type = I('recharge_type', 0, 'int');

        $redirect_url = U('/FrontUser/recharge');
        $RMB_EXCHANGE_PROP_ALIPAY = $GLOBALS['config_info']['RMB_EXCHANGE_PROP_ALIPAY'];
        if (!$recharge_money)
        {
            //$this->alert('对不起，请选择或填写充值金额', $redirect_url);
            return '对不起，请选择或填写充值金额';
        }

        $limit_recharge_money = $GLOBALS['config_info']['LIMIT_RECHARGE_MONEY'];
        $limit_recharge_money = $limit_recharge_money ? $limit_recharge_money : 1;
        if ($recharge_money < $limit_recharge_money)
        {
            //$this->alert('对不起，充值金额不得小于' . $limit_recharge_money, $redirect_url);
            return '对不起，充值金额不得小于';
        }

        if (!$total_money)
        {
            //$this->alert('对不起，请选择或填写充值金额', $redirect_url);
            return '对不起，请选择或填写充值金额';
        }
        if ($total_money != $recharge_money*$RMB_EXCHANGE_PROP_ALIPAY)
        {
            //$this->alert('对不起，请选择或填写充值金额', $redirect_url);
            return '对不起，请选择或填写充值金额';
        }
        if (!$recharge_type) 
        {
            //$this->alert('对不起，网络异常', $redirect_url);
            return '对不起，网络异常';
        }

        return 600;
    }


	//充值页
	public function recharge()
	{
        //是否可以充值
        $is_recharge = ConfigBaseModel::is_recharge_time();
        if (!$is_recharge) {
            $alert_text = $GLOBALS['config_info']['CLOSE_RECHARGE_ALERT'];
            $this->alert($alert_text, '/FrontUser/personal_data.html');
        }

		$user_id = intval(session('user_id'));

        $act = I('act', '', 'strip_tags');
        if ($act == 'pay') {
            $alert_message = $this->check_recharge_info();
            if ($alert_message != 600) {
                $this->alert($alert_message, U('/FrontUser/recharge'));
            }

            /*
            //形成支付宝支付链接
            $alpay_model = new AlipayModel();
            //$pay_url = $alpay_model->pay_code(0, $recharge_money);
            $pay_url = $alpay_model->pay_code(0, 0.01);
            $code = $pay_url;

            //生成ID
            $time_str = substr(time(), 2);
            $rand_code = null;
            for ($i = 0; $i < 3; $i++)
            {
                $rand = rand(0,9);
                $rand_code .= $rand;
            }
            $rand_code = $rand_code . $time_str;
            if (strlen($rand_code) != 11) 
            {
                $this->alert('对不起，网络异常', $redirect_url);
            }

            $num = $user_recharge_obj->getUserRechargeNum('code = ' . $rand_code);
            if ($num)
            {
                $this->alert('网络异常,请重试', $redirect_url);
            }

            //入库
            $user_recharge_obj = new UserRechargeModel();
            $user_id = intval(session('user_id'));
            $arr = array(
                'user_id'        => $user_id,
                'code'           => $code,
                'recharge_money' => $recharge_money,
                'isuse'          => 1,
                'addtime'        => NOW_TIME,
                'expire_time'    => NOW_TIME + 172800
            );
            $success = $user_recharge_obj->add($arr);
            if (!$success) 
            {
                $this->alert('对不起，网络异常', $redirect_url);
            }
            */
            //echo '/FrontUser/pay_page/code_id/' . $success;die;
           // echo 'http://gouyu.beyondin.com/Global/test_pay_page/code_id/' . $success;die;

            //充值金额
            $recharge_money = I('recharge_money', 0, 'int');
            $total_money = I('total_money', 0, 'int');
            $recharge_type = I('recharge_type', 0, 'int');

            $add_url = 'recharge_money/' . $recharge_money . '/total_money/' . $total_money . '/recharge_type/' . $recharge_type . '/id/' . $user_id;

            redirect('/FrontUser/pay_page/' . $add_url);
        }

		//获取用户余额
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('left_money');
		$this->assign('user_info', $user_info);

		//系统内部货币名称
		$this->assign('SYSTEM_MONEY_NAME', $GLOBALS['config_info']['SYSTEM_MONEY_NAME']);
		//1RMB充值的系统内部货币数量
		$this->assign('RMB_EXCHANGE_PROP', $GLOBALS['config_info']['RMB_EXCHANGE_PROP']);
		$this->assign('head_title', '充值');
		//底部导航赋值
		$this->display();
	}

    /**
     * 微信支付异步加载数据后回调
     * wzg
     */
    public function ajax_wx_pay_data()
    {
        $return_arr = array(
            'code' => 400,
        );

        $alert_message = $this->check_recharge_info();
        if ($alert_message != 600) {
            $return_arr['msg'] = $alert_message;
            exit(json_encode($return_arr));
        }
        $pay_amount = I('recharge_money', 0, 'int');

        $wxpay_obj = new WXPayModel();
        //JSAPI
        $jsApiParameters = $wxpay_obj->pay_code(0, $pay_amount);

        $return_arr['code'] = 600;
        $return_arr['data'] = $jsApiParameters;
        exit(json_encode($return_arr));
    }

    //转账成功
    public function recharge_success()
    {
        $this->assign('head_title', '转账成功');
        $this->display();
    }

    //支付页
    //todo 1先验证传过来的值，2,生成支付宝支付链接
    public function pay_page()
    {
        $alert_message = $this->check_recharge_info();
        if ($alert_message != 600) {
            $this->alert($alert_message, U('/FrontUser/recharge'));
        }

        if (!strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
            $recharge_money = I('recharge_money', 0, 'int');
			$user_id = I('id', 0, 'int');
			if (!$user_id) $this->alert('支付参数出错，请重新支付');

            //形成支付宝支付链接
            $alpay_model = new AlipayModel();
            $alpay_model->mobile_wap_pay_code(0, $recharge_money, $user_id);
            //$pay_url = $alpay_model->pay_code(0, $recharge_money, 0, false, '', $user_id );

            /*$code_id = I('get.code_id');
            $user_recharge_obj = new UserRechargeModel();
            $pay_url = $user_recharge_obj->where('user_recharge_id = ' . $code_id)->getField('code');
            if (!$pay_url) $this->alert('支付参数出错，请重新支付', '/FrontUser/recharge.html');
             */

            //echo $pay_url;die;

            //echo '<script>window.location.href="' . $pay_url . '" </script>';
            //die;
            //redirect($pay_url);
        }

        //$user_id = session('user_id');
        //if ($user_id != 39628) $this->alert('支付升级中，请稍后', '/FrontUser/personal_data');

        $this->assign('pay_url', $pay_url);
        $this->assign('head_title', '支付页面');
        $this->display();
    }


	//微信支付测试页
	public function wxpay()
	{
		$wxpay_obj = new WXPayModel();
		$pay_amount = 1;
		$jsApiParameters = $wxpay_obj->pay_code(0, $pay_amount);
		$this->assign('jsApiParameters', $jsApiParameters);
		#print_r(json_decode($jsApiParameters, true));
		#echo $jsApiParameters;
		#die;

		$this->assign('head_title', '测试微信支付');
		$this->display();
	}

	//保存用户信息
	function save_user_info()
	{
		$realname = $this->_post('realname');
		$email = $this->_post('email');
		$province_id = $this->_post('province_id');
		$city_id = $this->_post('city_id');
		$area_id = $this->_post('area_id');
		$street_id = intval($this->_post('street'));
		$baby_birthday = $this->_post('baby_birthday');
        $baby_birthday = strtotime($baby_birthday);
		$address = $this->_post('address');
		$user_id = intval(session('user_id'));
        //log_file('realname:'. $realname . ',province_id:' . $province_id . ',city_id:'. $city_id . ', area_id:' . $area_id . ',street:'. $street_id . ',baby_birthday:' . $baby_birthday . ',user_id:' . $user_id . ', address:' . $address);

		if ($user_id) {
			$arr = array(
				'realname'	=> $realname,
				'email'	=> $email,
				'province_id'	=> $province_id ? intval($province_id) : 0,
				'city_id'		=> $city_id ? intval($city_id) : 0,
				'area_id'		=> $area_id ? intval($area_id) : 0,
                'street'   => $street_id,
                'address'  => $address,
                'baby_birthday' => $baby_birthday,
			);
			$user_obj = new UserModel($user_id);
			$user_obj->setUserInfo($arr);
			$success = $user_obj->saveUserInfo();
            D('MemberCard')->createNewMemberForERPSystemByUserID($user_id);
			//echo $success ? 'success' : 'failure';
		}

		exit('success');
	}

	/**
	 * 支付宝付款成功后的回调页面
	 * @author 姜伟
	 * @param void
	 * @return void
	 * @todo 调用支付宝支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function alipay_response()
	{
		$alipay_obj = new AlipayModel();
		$return_state = $alipay_obj->pay_response();
trace($return_state, 'wuzeguo_debug');
		if ($return_state == 1)
		{
			$this->alert('恭喜您，订单付款成功', U('/FrontOrder/pre_deliver_order'));
		}
		elseif ($return_state == 2)
		{
			$this->alert('恭喜您，充值成功', U('/FrontUser/personal_data'));
		}
		else
		{
			$this->alert('对不起，非法访问', U('/'));
		}
	}

	/**
	 * 微信付款成功后的回调页面
	 * @author 姜伟
	 * @param void
	 * @return void
	 * @todo 调用微信支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function wxpay_response()
	{
		$wxpay_obj = new WXPayModel();
		$return_state = $wxpay_obj->pay_response();
		if ($return_state == 1)
		{
			$this->alert('恭喜您，订单付款成功', U('/FrontOrder/pre_deliver_order'));
		}
		elseif ($return_state == 2)
		{
			$this->alert('恭喜您，充值成功', U('/FrontUser/personal_data'));
		}
		else
		{
			$this->error('对不起，非法访问', U('/'));
		}
	}

	/**
	 * 网银在线付款成功后的回调页面
	 * @author 姜伟
	 * @param void
	 * @return void
	 * @todo 调用网银在线支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function chinabank_response()
	{
		$chinabank_obj = new ChinabankModel();
		$return_state = $chinabank_obj->pay_response();
		if ($return_state == 1)
		{
			$this->alert('恭喜您，订单付款成功', U('/UcpOrder/get_pre_stockup_order_list'));
		}
		elseif ($return_state == 2)
		{
			$this->alert('恭喜您，充值成功', U('/Ucp'));
		}
		else
		{
			$this->alert('对不起，非法访问', U('/'));
		}
	}


	//异步获取积分列表
	public function get_integral_list()
	{
		$user_id = intval(session('user_id'));
		$firstRow = I('post.firstRow');
		$where = 'user_id = ' . $user_id;
		$integral_obj = new IntegralModel();
		//订单总数
		$total = $integral_obj->getIntegralNum($where);

		if ($firstRow < ($total - 1) && $user_id)
		{
			$integral_obj->setStart($firstRow);
			$integral_obj->setLimit($this->item_num_per_account_page);
			$integral_list = $integral_obj->getIntegralList('remark, addtime, start_integral, end_integral, integral, id, change_type, operater', $where, 'addtime DESC');
			$integral_list = $integral_obj->getListData($integral_list);

			foreach ($integral_list AS $k => $v)
			{
				$integral_list[$k]['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
			}

			echo json_encode($integral_list);
			exit;
		}

		exit('failure');
	}

	//发送验证码
	function send_vcode()
	{
		$mobile = $this->_post('phone');
        trace($mobile);
		$user_id = session('user_id');;

		if (is_numeric($mobile) && strlen($mobile) == 11 && $user_id)
		{
			//获取验证码
			$verify_code_obj = new VerifyCodeModel();
			$verify_code = $verify_code_obj->generateVerifyCode($mobile);
			if ($verify_code)
			{
				$sms_obj = new SMSModel();
				$send_state = $sms_obj->sendVerifyCode($mobile, $verify_code);
				#echo $verify_code_obj->getLastSql();
				#$send_state = 1;
				echo $send_state ? 'success' : 'failure';
				exit;
			}
		}
		exit('failure');
	}

    //发送验证码
	function send_email_code()
	{
		$email = $this->_post('email');
		$user_id = session('user_id');;

		if ($email || checkEmail($email))
		{
			//获取验证码
			$verify_code_obj = new VerifyCodeModel();
			$verify_code = $verify_code_obj->generateVerifyCode($email);
			if ($verify_code)
			{
                $email_obj = new EmailModel();
                $send_state = $email_obj->sendEmail($email, '验证邮箱', '您的验证码为(' . $verify_code . ')');
trace($send_state);
				echo $send_state ? 'success' : 'failure';
				exit;
			}
		}
		exit('failure');
	}

	//获取微信支付的参数
	function get_wx_param()
	{
		$coin_num = $this->_post('coin_num');
		$user_id = intval(session('user_id'));

		if (is_numeric($coin_num) && $user_id)
		{
			$wxpay_obj = new WXPayModel();
			//JSAPI
			$jsApiParameters = $wxpay_obj->pay_code(0, $coin_num);
			log_file($jsApiParameters);
			$this->json_exit($jsApiParameters);
		}

		$this->json_exit('failure');
	}

	/**
     * 储存反馈意见
     * @author zlf
     * @return void
     * @todo 储存反馈意见
     */
    public function save_suggest_info(){
        $user_id = intval(session('user_id'));
        $message = $this->_post('message');

        if ($user_id && $message)
        {
            $user_suggest_obj = new UserSuggestModel();
            $arr = array(
                'user_id'		=> $user_id,
                'message'		=> $message,
            );
            $success = $user_suggest_obj->addUserSuggest($arr);

            echo $success ? 'success' : 'failure';
            exit;
        }

        exit('failure');
    }


    //专属二维码
	public function my_qr_code()
	{
		$user_id = intval(session('user_id'));
		$my_url = 'http://' . $_SERVER['HTTP_HOST'] . '?rec_user_id=' . $user_id;
		// echo $my_url;die;
		//获取二维码地址
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('nickname,headimgurl');
		//$qr_code_path = C('IMG_DOMAIN') . $user_info['qr_code'];
		//$this->assign('qr_code', $qr_code_path);
		$this->assign('user_info', $user_info);
		$this->assign('my_url', $my_url);
		$this->assign('head_title', '推广二维码');
		$this->display();
	}

    /**
     * 我的收益
     * wzg
     */
    public function my_recharge_back()
    {
        $user_id = intval(session('user_id'));

        $recharge_back_obj = new RechargeBackModel();
        $total_num = $recharge_back_obj->getRechargeBackNum('user_id = ' . $user_id);
        $recharge_back_obj->setStart(0);
        $recharge_back_obj->setLimit($this->item_num_per_account_page);
        $recharge_back_list = $recharge_back_obj->getRechargeBackList('', 'user_id = ' . $user_id, 'addtime DESC');
        $recharge_back_list = $recharge_back_obj->getListData($recharge_back_list);
        
        $this->assign('recharge_back_list', $recharge_back_list);
		$this->assign('total_num', $total_num);
		$this->assign('page_num', $this->item_num_per_account_page);
		$this->assign('head_title', '推广获益');
		$this->display();
    }

    public function ajax_my_recharge_back()
    {
        $user_id = intval(session('user_id'));
        $firstRow = I('firstRow');
        
        $recharge_back_obj = new RechargeBackModel();
        $recharge_back_obj->setStart($firstRow);
        $recharge_back_obj->setLimit($this->item_num_per_account_page);
        $recharge_back_list = $recharge_back_obj->getRechargeBackList('', 'user_id = ' . $user_id, 'addtime DESC');
        $recharge_back_list = $recharge_back_obj->getListData($recharge_back_list);
    
        if($recharge_back_list) {
            exit(json_encode($recharge_back_list));
        } else {
            exit('failure');
        }
    }

    //好友推荐页面，
    //用来进入公众号的首次关注
    //@author wsq
	public function show_qr_code()
	{
		//$rec_user_id  = I('get.rec_user_id', 0, 'int');
		//$user_info    = D('User')->where('user_id =' . $rec_user_id)->field('nickname, role_type, qr_code')->find();

        ////if(!$user_info) $this->redirect('/FrontUser/register');
		////获取二维码地址
		////$qr_code_path = get_img_url($user_info['qr_code']);

        $qr_code_path = $GLOBALS['config_info']['QR_CODE'];
		$this->assign('qr_code', $qr_code_path);
		$this->assign('role_type', $user_info['role_type']);
		#$this->assign('my_url', $my_url);
		$this->display('my_qr_code');
	}


	//我的团队
	public function my_team()
	{
		$user_id = intval(session('user_id'));
		$this->assign('user_id', $user_id);
		$user_obj = new UserModel($user_id);
		$account_obj = new AccountModel();

		//一级代理人数
		$first_agent_num = $user_obj->getUserNum('first_agent_id = ' . $user_id);
		$this->assign('first_agent_num', $first_agent_num);

		//二级代理人数
		$second_agent_num = $user_obj->getUserNum('second_agent_id = ' . $user_id);
		$this->assign('second_agent_num', $second_agent_num);

		//三级代理人数
		$third_agent_num = $user_obj->getUserNum('third_agent_id = ' . $user_id);
		$this->assign('third_agent_num', $third_agent_num);

		//一级代理收益
		$first_agent_gain = $account_obj->sumAccount('user_id = ' . $user_id . ' AND change_type = ' . AccountModel::FIRST_LEVEL_AGENT_GAIN);
		$this->assign('first_agent_gain', floatval($first_agent_gain));

		//二级代理收益
		$second_agent_gain = $account_obj->sumAccount('user_id = ' . $user_id . ' AND change_type = ' . AccountModel::SECOND_LEVEL_AGENT_GAIN);
		$this->assign('second_agent_gain', floatval($second_agent_gain));

		//三级代理收益
		$third_agent_gain = $account_obj->sumAccount('user_id = ' . $user_id . ' AND change_type = ' . AccountModel::THIRD_LEVEL_AGENT_GAIN);
		$this->assign('third_agent_gain', floatval($third_agent_gain));

		$fenxiao_level = $GLOBALS['config_info']['FENXIAO_LEVEL'];
		$this->assign('fenxiao_level', $fenxiao_level);

		$this->assign('head_title', '我的收益');
		$this->display();
	}

	//代理列表
	public function agent_list()
	{
		$user_id = intval(session('user_id'));
		$agent_type = intval($this->_request('agent_type'));
		$firstRow = intval($this->_request('firstRow'));
		$fetch_num = intval($this->_request('fetch_num'));
		$fetch_num = $fetch_num ? $fetch_num : 8;
		$where = 'is_enable = 1 AND ';
		$where .= $agent_type == 1 ? 'first_agent_id = ' . $user_id : ($agent_type == 2 ? 'second_agent_id = ' . $user_id : 'third_agent_id = ' . $user_id);
		$this->assign('user_id', $user_id);
		$user_obj = new UserModel();
		$total = $user_obj->getUserNum($where);
		$user_obj->setStart($firstRow);
		$user_obj->setLimit($fetch_num);
		$user_list = $user_obj->getUserList('headimgurl, nickname, consumed_money, province, city, reg_time', $where, 'reg_time');
		#echo $user_obj->getLastSql();
		#die;

		if (IS_AJAX && IS_POST)
		{
			#echo $user_obj->getLastSql();
			#dump($user_list);
			//异步请求
			foreach ($user_list AS $k => $v)
			{
				$user_list[$k]['reg_time'] = date('Y-m-d H:i:s', $v['reg_time']);
			}
			$this->json_exit($user_list);
		}
		else
		{
			//同步请求
			$this->assign('user_list', $user_list);
			$this->assign('agent_type', $agent_type);
			$this->assign('firstRow', $firstRow + $fetch_num);
			$this->assign('total', $total);

			$head_title = '我的';
			$head_title .= $agent_type == 1 ? '一级代理' : ($agent_type == 2 ? '二级代理' : '三级代理');
			$this->assign('head_title', $head_title);
			$this->display();
		}
	}

	//查看我的优惠券
	function my_coupon()
	{
		$user_id = intval(session('user_id'));
        if (!$user_id)
        {
            $this->error('对不起，您还没登录！');
        }

        $user_vouchers_obj = new UserVouchersModel;

        // 未使用
        $where = 'isuse = 1 AND end_time > '.NOW_TIME.' AND user_id = '.$user_id;
        $user_vouchers_obj->setLimit(1000);
        $list_one = $user_vouchers_obj->getUserVouchersList('',$where);
        $list_one = $user_vouchers_obj->getListData($list_one);
        // dump($list_one);exit;
        $this->assign('list_one', $list_one);

        // 已使用
        $where = 'isuse = 0 AND user_id = '.$user_id;
        $user_vouchers_obj->setLimit(1000);
        $list_two = $user_vouchers_obj->getUserVouchersList('',$where);
        $list_two = $user_vouchers_obj->getListData($list_two);
        $this->assign('list_two', $list_two);

        // 已过期
        $where = 'isuse = 1 AND end_time < '.NOW_TIME.' AND user_id = '.$user_id;
        $user_vouchers_obj->setLimit(1000);
        $list_three = $user_vouchers_obj->getUserVouchersList('',$where);
        $list_three = $user_vouchers_obj->getListData($list_three);
        $this->assign('list_three', $list_three);

		$this->assign('head_title', '我的优惠券');
		$this->display();
	}

	//设置提成比例
	function set_rate()
	{
		$user_id = cur_user_id();
		$user_obj = new UserModel($user_id);

		//表单提交处理
		$act = $this->_post('act');
		if ($act == 'save')
		{
			$first_agent_rate = floatval($this->_post('first_agent_rate'));
			$arr = array(
				'first_agent_rate'	=> $first_agent_rate
			);
			$user_obj->setUserInfo($arr);
			$user_obj->saveUserInfo();
			$this->alert('恭喜您，设置成功！', '/FrontUser/set_rate');
		}

		$user_info = $user_obj->getUserInfo('first_agent_rate');
		$first_agent_rate = $user_info['first_agent_rate'] > 0 ? $user_info['first_agent_rate'] : (100 - $GLOBALS['config_info']['FIRST_LEVEL_AGENT_RATE']);

		$this->assign('first_agent_rate', $first_agent_rate);
		$this->assign('head_title', '提成设置');
		$this->display();
	}

	//成为分销商
	public function be_seller()
	{
		$this->assign('head_title', '成为分销商');
		$this->display();
	}

	//合伙人列表页（一、二、三级）
	public function partner_list()
	{
		$this->assign('head_title', '合伙人列表页');
		$this->display();
	}

	//合伙人订单列表页（一、二、三级）
	public function partner_order_list()
	{
		$this->assign('head_title', '合伙人订单列表');
		$this->display();
	}

	//我的财富奖励明细
	public function award_list()
	{
		$this->assign('head_title', '奖励明细');
		$this->display();
	}

	//添加支付宝
	public function add_alipay()
	{
		$user_id = cur_user_id();
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('alipay_account, alipay_account_name');
		$this->assign('user_info', $user_info);

		$act = $this->_request('act');
		if ($act == 'save')
		{
			$alipay_account_name = $this->_request('zfb_name');
			$alipay_account = $this->_request('zfb_id');

			$arr = array(
				'alipay_account_name'	=> $alipay_account_name,
				'alipay_account'		=> $alipay_account,
			);
			$user_obj->setUserInfo($arr);
			$user_obj->saveUserInfo();
			$this->alert('恭喜您，账号绑定成功！', '/FrontUser/personal_center');
		}

		$this->assign('head_title', '添加支付宝');
		$this->display();
	}

	//申请提现
	public function getcash()
	{
		$user_id = cur_user_id();
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('alipay_account, alipay_account_name, left_money');
		$this->assign('user_info', $user_info);

		//今日是否提现
		$deposit_apply_obj = new DepositApplyModel();
		$deposit_num = $deposit_apply_obj->getDepositApplyNum('addtime >= ' . strtotime('today') . ' AND user_id = ' . $user_id);
		$this->assign('deposit_num', $deposit_num);

		$act = $this->_request('act');
		if ($act == 'save')
		{
			$money = $this->_request('money');

			$arr = array(
				'money'			=> $money,
				'user_id'		=> $user_id,
			);
			$deposit_apply_obj = new DepositApplyModel();
			$deposit_apply_obj->addDepositApply($arr);
			$this->alert('恭喜您，提现申请已提交！', '/FrontUser/personal_center');
		}

		$this->assign('deposit_fee', $GLOBALS['config_info']['DEPOSIT_FEE']);
		$this->assign('no_footer', 1);
		$this->assign('head_title', '申请提现');
		$this->display();
	}

	//积分兑换记录
	public function integral_exchange_list()
	{
		$this->assign('head_title', '积分兑换记录');
		$this->display();
	}

    //游戏列表
    public function user_game_list()
    {
        $user_id = intval(session('user_id'));

        $user_game_obj = new UserGameModel();
        $user_game_list = $user_game_obj->getUserGameList('', 'user_id = ' . $user_id, 'addtime DESC');
        $user_game_list = $user_game_obj->getListData($user_game_list);

        $this->assign('user_game_list', $user_game_list);
		$this->assign('head_title', '游戏信息管理');
		$this->display();
    }

    //添加游戏
    public function add_user_game()
    {
        $act = I('act');
        $user_id = intval(session('user_id'));

        if ('add' == $act) {
            $game_id = I('game_id', '', 'strip_tags');
            $game_account = I('game_account');
            $steam_url = I('steam_url', '', 'strip_tags');
            if (!$game_account || !$game_id || !$steam_url) {
                exit('填写不完整');
            }
            if (strpos($steam_url, 'https://steamcommunity.com/tradeoffer') === false) {
                exit('您填写的steam URL格式不正确');
            }

            $arr = array(
                'game_id' => $game_id,
                'game_account' => $game_account,
                'user_id' => $user_id,
                'addtime' => NOW_TIME,
                'steam_url' => $steam_url
            );

            $user_game_obj = new UserGameModel();
            $success = $user_game_obj->addUserGame($arr);
            if ($success) exit('success');

            exit('添加失败');
        }

        $game_list = D('Game')->getGameList('', 'isuse = 1', 'serial');

        $this->assign('game_list', $game_list);
        $this->assign('head_title', '添加游戏');
        $this->display();
    }

    //删除我的游戏
    public function delete_user_game()
    {
        $user_id = intval(session('user_id'));

        $user_game_id = I('user_game_id', 0, 'int');
        if (!$user_game_id) exit('出现异常，请稍后再试');

        //验证是否自己的
        $user_game_obj = new UserGameModel($user_game_id);
        $num = $user_game_obj->getUserGameInfos('user_id = ' . $user_id . ' AND user_game_id = ' . $user_game_id);
        if (!$num) exit('出错了，请稍后再试');

        $success = $user_game_obj->delUserGame();
        if ($success) exit('success');

        exit('删除失败');
    }


    /**
     * 我的roll
     * wzg
     */
    public function my_roll()
    {
        $user_id = intval(session('user_id'));

        $roll_user_obj = D('RollUser');
        //num
        $total_num = $roll_user_obj->getRollUserNum('isuse = 1 AND user_id = ' . $user_id);

        $roll_user_obj->setStart(0);
        $roll_user_obj->setLimit($this->per_page_num);

        $roll_user_list = $roll_user_obj->getRollUserList('', 'isuse = 1 AND user_id = ' . $user_id, 'addtime DESC');
        $roll_user_list = $roll_user_obj->getListData($roll_user_list);

        $this->assign('total_num', $total_num);
        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);

        $this->assign('head_title', '我的roll');
        $this->assign('roll_user_list', $roll_user_list);
        $this->display();
    }

    //异步roll
    public function ajax_my_roll()
    {
        $user_id = intval(session('user_id'));
        $firstRow = I('firstRow');
        
        $roll_user_obj = D('RollUser');
        $roll_user_obj->setStart($firstRow);
        $roll_user_obj->setLimit($this->per_page_num);

        $roll_user_list = $roll_user_obj->getRollUserList('', 'isuse = 1 AND user_id = ' . $user_id, 'addtime DESC');
        $roll_user_list = $roll_user_obj->getListData($roll_user_list);
    
        if($roll_user_list) {
            exit(json_encode($roll_user_list));
        } else {
            exit('failure');
        }
    }

    /**
     * 我的兑换记录
     * wzg
     */
    public function my_exchange()
    {
        $user_id = intval(session('user_id'));

        $where = 'user_id = ' . $user_id . ' AND (order_status = 1 OR order_status = 2)';
        //获取订单列表
		$order_obj = new OrderModel();
		//总数
		$total = $order_obj->getOrderNum($where);
		$order_obj->setStart(0);
        $order_obj->setLimit($this->my_exchange_page_num);
		$order_list = $order_obj->getOrderList('order_status, order_id, pay_amount, addtime', $where, 'addtime DESC');
		$order_list = $order_obj->getFrontListData($order_list);

		$this->assign('total_num', $total);
        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->my_exchange_page_num);

		#echo "<pre>";
		#print_r($order_list);
		#die;

        $this->assign('head_title', '鱼翅兑换记录');
        $this->assign('order_list', $order_list);
        $this->display();
    }

    public function ajax_my_exchange()
    {
        $user_id = intval(session('user_id'));
        $firstRow = I('firstRow');
        
        $where = 'user_id = ' . $user_id . ' AND (order_status = 1 OR order_status = 2)';
        $order_obj = new OrderModel();
        $order_obj->setStart($firstRow);
        $order_obj->setLimit($this->my_exchange_page_num);

		$order_list = $order_obj->getOrderList('order_status, order_id, pay_amount, addtime', $where, 'addtime DESC');
		$order_list = $order_obj->getFrontListData($order_list);
    
        if($order_list) {
            exit(json_encode($order_list));
        } else {
            exit('failure');
        }
    }


    //兑换详情
    public function exchange_detail()
    {
        $order_id = I('order_id', 0, 'int');
        if (!$order_id) $this->alert('出错了，请稍后再试', '/FrontUser/my_exchange.html');

        //item_info
        $item_info = M('OrderItem')->where('order_id = ' . $order_id)->find();

        //order_info 
        $order_obj = new OrderModel($order_id);
        $order_info = $order_obj->getOrderInfo('user_id, order_status');
        $user_obj = new UserModel($order_info['user_id']);
        $user_info = $user_obj->getUserInfo('nickname, realname, username');

        //order_address
        $order_address_obj = new OrderAddressModel();
        $order_address_info = $order_address_obj->getOrderAddressInfos('order_id = ' . $order_id);
        if ($item_info['is_real']) {
            $area_obj           = new AreaModel();
            $address            = $area_obj->getAreaString($order_address_info['province_id'], $$order_address_info['city_id'], $order_address_info['area_id']);
            $order_address_info['area_string'] = $address . ' ' .  $order_address_info['address'];
        } else {
            $order_address_info['game_name'] = M('Game')->where('game_id = ' . $order_address_info['game_id'])->getField('game_name');
        } 

        $this->assign('head_title', '兑换详情');
        $this->assign('item_info', $item_info);
        $this->assign('order_info', $order_info);
        $this->assign('order_address_info', $order_address_info);
        $this->assign('user_info', $user_info);
        $this->display();
    }

    /**
     * 我的竞猜--比赛
     * wzg
     */
    public function my_guess()
    {
        $user_id = intval(session('user_id'));

        $guess_user_obj = new GuessUserModel();
        $where = 'is_pay = 1 AND user_id = ' . $user_id;
        $total = $guess_user_obj->getGuessUserNum($where);

        $guess_user_obj->setStart(0);
        $guess_user_obj->setLimit($this->per_page_num);
        $guess_user_list = $guess_user_obj->getGuessUserList('', $where, 'addtime DESC');
        $guess_user_list = $guess_user_obj->getListData($guess_user_list);
        //dump($guess_user_list);die;

        //本周，本月
        //本周次数
        $wek_times = $this->return_wek_or_mon(1);
        $where1 = 'user_id = ' . $user_id .  ' AND addtime >= ' . $wek_times['start_time']. ' AND addtime <= ' . $wek_times['end_time'];
        trace($where1);
        $wek_total_num = $guess_user_obj->where($where1)->count();
        $wek_prize_num = $guess_user_obj->where($where1 . ' AND is_prize = 1')->count();
        $gain_money_wek = $guess_user_obj->field('(sum(prize_money) - sum(add_money)) AS total_prize')
            ->where($where1)
            ->find();
        $gain_money_wek = $gain_money_wek['total_prize'];
        if (abs($gain_money_wek) > 10000) {
            $gain_money_wek = intval($gain_money_wek / 100) / 100;
            $gain_money_wek .= '万';
        }

        if ($wek_total_num > 0) {
            $wek_prize_rate = intval($wek_prize_num / $wek_total_num * 10000)/100;
        } else {
            $wek_prize_rate = 0;
        }

		$this->assign('wek_total_num', $wek_total_num);
		$this->assign('wek_prize_rate', $wek_prize_rate);
		$this->assign('gain_money_wek', $gain_money_wek);

        //本月
        $mon_times = $this->return_wek_or_mon(2);
        $where2 = 'user_id = ' . $user_id .  ' AND addtime >= ' . $mon_times['start_time']. ' AND addtime <= ' . $mon_times['end_time'];
        trace($where2);
        $mon_total_num = $guess_user_obj->where($where2)->count();
        $mon_prize_num = $guess_user_obj->where($where2 . ' AND is_prize = 1')->count();
        $gain_money_mon = $guess_user_obj->field('(sum(prize_money) - sum(add_money)) AS total_prize')
            ->where($where2)
            ->find();
        $gain_money_mon = $gain_money_mon['total_prize'];
        if (abs($gain_money_mon) > 10000) {
            $gain_money_mon = intval($gain_money_mon / 100) / 100;
            $gain_money_mon .= '万';
        }

        if ($mon_total_num > 0) {
            $mon_prize_rate = intval($mon_prize_num / $mon_total_num * 10000)/100;
        } else {
            $mon_prize_rate = 0;
        }

        $this->assign('mon_total_num', $mon_total_num);
		$this->assign('mon_prize_rate', $mon_prize_rate);
		$this->assign('gain_money_mon', $gain_money_mon);

		$this->assign('total_num', $total);
        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);

        $this->assign('head_title', '比赛竞猜');
        $this->assign('guess_user_list', $guess_user_list);
        $this->display();
    }
    public function ajax_my_guess()
    {
        $user_id = intval(session('user_id'));
        $firstRow = I('firstRow');
        
        $where = 'is_pay = 1 AND user_id = ' . $user_id;
        $guess_user_obj = new GuessUserModel();
        $guess_user_obj->setStart($firstRow);
        $guess_user_obj->setLimit($this->per_page_num);

        $guess_user_list = $guess_user_obj->getGuessUserList('', $where, 'addtime DESC');
        $guess_user_list = $guess_user_obj->getListData($guess_user_list);
    
        if($guess_user_list) {
            exit(json_encode($guess_user_list));
        } else {
            exit('failure');
        }
    }

    /**
     * 猜冠军
     * wzg
     */
    public function my_guess_champion()
    {
        $user_id = intval(session('user_id'));

        $guess_champion_user_obj = new GuessChampionUserModel();
        $where = 'is_pay = 1 AND user_id = ' . $user_id;
        $total = $guess_champion_user_obj->getGuessChampionUserNum($where);

        $guess_champion_user_obj->setStart(0);
        $guess_champion_user_obj->setLimit($this->per_page_num);
        $guess_champion_user_list = $guess_champion_user_obj->getGuessChampionUserList('', $where, 'addtime DESC');
        $guess_champion_user_list = $guess_champion_user_obj->getListData($guess_champion_user_list);
        //dump($guess_champion_user_list);die;

        //本周，本月
        //本周次数
        $wek_times = $this->return_wek_or_mon(1);
        $where1 = 'user_id = ' . $user_id .  ' AND addtime >= ' . $wek_times['start_time']. ' AND addtime <= ' . $wek_times['end_time'];
        $wek_total_num = $guess_champion_user_obj->where($where1)->count();
        $wek_prize_num = $guess_champion_user_obj->where($where1 . ' AND is_prize = 1')->count();
        $gain_money_wek = $guess_champion_user_obj->field('(sum(prize_money) - sum(add_money)) AS total_prize')
            ->where($where1)
            ->find();
        $gain_money_wek = $gain_money_wek['total_prize'];
        if (abs($gain_money_wek) > 10000) {
            $gain_money_wek = intval($gain_money_wek / 100) / 100;
            $gain_money_wek .= '万';
        }

        if ($wek_total_num > 0) {
            $wek_prize_rate = intval($wek_prize_num / $wek_total_num * 10000)/100;
        } else {
            $wek_prize_rate = 0;
        }

		$this->assign('wek_total_num', $wek_total_num);
		$this->assign('wek_prize_rate', $wek_prize_rate);
		$this->assign('gain_money_wek', $gain_money_wek);

        //本月
        $mon_times = $this->return_wek_or_mon(2);
        $where2 = 'user_id = ' . $user_id .  ' AND addtime >= ' . $mon_times['start_time']. ' AND addtime <= ' . $mon_times['end_time'];
        $mon_total_num = $guess_champion_user_obj->where($where2)->count();
        $mon_prize_num = $guess_champion_user_obj->where($where2 . ' AND is_prize = 1')->count();
        $gain_money_mon = $guess_champion_user_obj->field('(sum(prize_money) - sum(add_money)) AS total_prize')
            ->where($where2)
            ->find();
        $gain_money_mon = $gain_money_mon['total_prize'];
        if (abs($gain_money_mon) > 10000) {
            $gain_money_mon = intval($gain_money_mon / 100) / 100;
            $gain_money_mon .= '万';
        }

        if ($mon_total_num > 0) {
            $mon_prize_rate = intval($mon_prize_num / $mon_total_num * 10000)/100;
        } else {
            $mon_prize_rate = 0;
        }

		$this->assign('mon_total_num', $mon_total_num);
		$this->assign('mon_prize_rate', $mon_prize_rate);
		$this->assign('gain_money_mon', $gain_money_mon);
    
		$this->assign('total_num', $total);
        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);

        $this->assign('head_title', '猜冠军');
        $this->assign('guess_champion_user_list', $guess_champion_user_list);
        $this->display();
    }

    public function ajax_my_guess_champion()
    {
        $user_id = intval(session('user_id'));
        $firstRow = I('firstRow');
        
        $where = 'is_pay = 1 AND user_id = ' . $user_id;
        $guess_champion_user_obj = new GuessChampionUserModel();
        $guess_champion_user_obj->setStart($firstRow);
        $guess_champion_user_obj->setLimit($this->per_page_num);

        $guess_champion_user_list = $guess_champion_user_obj->getGuessChampionUserList('', $where, 'addtime DESC');
        $guess_champion_user_list = $guess_champion_user_obj->getListData($guess_champion_user_list);
    
        if($guess_champion_user_list) {
            exit(json_encode($guess_champion_user_list));
        } else {
            exit('failure');
        }
    }

    /**
     * 夺宝
     * wzg
     */
    public function my_treasure()
    {
        $user_id = intval(session('user_id'));

        $treasure_user_obj = new TreasureUserModel();
        $subModel = $treasure_user_obj
            ->where('user_id = ' . $user_id)
            ->order('addtime DESC')
            ->group('treasure_id')
            ->select(false);
        $total = $treasure_user_obj->table($subModel.' a')->count();

        $treasure_user_obj->setStart(0);
        $treasure_user_obj->setLimit($this->per_page_num);
        $order_by = '(case when t.is_open = 1 AND d.is_deliver = 0 AND d.addtime > 0  then 0
            when t.is_open = 0 then 1 
        else 2 end)';
        $treasure_user_list = $treasure_user_obj->alias('u')
            ->join('tp_draw_prize AS d ON u.treasure_id = d.treasure_id')
            ->join('tp_treasure AS t ON t.treasure_id = u.treasure_id')
            ->field('count(*) AS times, u.treasure_id, u.user_id, d.is_deliver')
            ->where('u.user_id = ' . $user_id)
            ->order($order_by . ', t.open_time DESC, u.addtime DESC')
            ->limit()
            ->group('u.treasure_id')
            ->select();
        $treasure_user_list = $treasure_user_obj->getListData($treasure_user_list);
        //dump($treasure_user_list);die;

		$this->assign('total_num', $total);
        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);

        $this->assign('head_title', '夺宝记录');
        $this->assign('treasure_user_list', $treasure_user_list);
        $this->display();
    }
    public function ajax_my_treasure()
    {
        $user_id = intval(session('user_id'));
        $firstRow = I('firstRow');
        
        $where = 'is_pay = 1 AND user_id = ' . $user_id;
        $treasure_user_obj = new TreasureUserModel();
        $treasure_user_obj->setStart($firstRow);
        $treasure_user_obj->setLimit($this->per_page_num);

        $order_by = '(case when t.is_open = 1 AND d.is_deliver = 0 AND d.addtime > 0  then 0
            when t.is_open = 0 then 1 
        else 2 end)';
        $treasure_user_list = $treasure_user_obj->alias('u')
            ->join('tp_draw_prize AS d ON u.treasure_id = d.treasure_id')
            ->join('tp_treasure AS t ON t.treasure_id = u.treasure_id')
            ->field('count(*) AS times, u.treasure_id, u.user_id, d.is_deliver')
            ->where('u.user_id = ' . $user_id)
            ->order($order_by . ', t.open_time DESC, u.addtime DESC')
            ->limit()
            ->group('u.treasure_id')
            ->select();
        $treasure_user_list = $treasure_user_obj->getListData($treasure_user_list);
    
        if($treasure_user_list) {
            exit(json_encode($treasure_user_list));
        } else {
            exit('failure');
        }
    }


    /**
     * 帮助中心
     */
    public function help_center()
    {
        $article_obj = new GeneralArticleModel();
        $article_list = $article_obj->field('title, article_id')
            ->where('isuse = 1 AND article_sort_id = ' . GeneralArticleModel::HELP_CENTER)
            ->select();

        $this->assign('article_list', $article_list);
        $this->assign('head_title', '帮助中心');
        $this->display();
    }

    public function article_detail()
    {
        $article_id = I('article_id', 0, 'int');
        if (!$article_id) $this->alert('出错了，请稍后再试', '/FrontUser/help_center.html');

        $article_obj = new GeneralArticleModel();
        $title = $article_obj->where('article_id = ' . $article_id)->getField('title');
        $content = $article_obj->getArticleContents($article_id);

        $this->assign('content', $content);
        $this->assign('head_title', $title);
        $this->display();
    }

    /**
     * 关于我们
     */
    public function about_us()
    {
        $article_obj = new GeneralArticleModel();
        $article_id = $article_obj->where('isuse = 1 AND article_sort_id = ' . GeneralArticleModel::ABOUT_US)
            ->order('serial')
            ->getField('article_id');
        $content = $article_obj->getArticleContents($article_id);

        $this->assign('content', $content);
        $this->assign('head_title', '关于我们');
        $this->assign('opt', 'about');
        $this->display(APP_PATH . 'Tpl/FrontUser/article_detail.html');
    }


    /**
     * 返回本周或本月时间
     * $type == 1 wek 2 mon
     */
    public function return_wek_or_mon($type = 1)
    {
        $curtime=time();
        if ($type == 1) {
            $curtime = strtotime(date('Y-m-d', $curtime));
            $curweekday = date('w');
            $curweekday = $curweekday?$curweekday:7;
            $curmon = $curtime - ($curweekday-1)*86400; //上周一 零点时间戳
            $cursun = $curmon + 7*86400; //上周7 零点时间戳
            return array(
                'start_time' => $curmon,
                'end_time'   => $cursun,
            );
        } else if ($type == 2) {
            $curmon = strtotime(date('Y-m'), $curtime);
            $nextmon = strtotime('+1 month', $curmon);

            return array(
                'start_time' => $curmon,
                'end_time'   => $nextmon,
            );
        }
    }



    //微信测试
    public function test_wx()
    {
        $wxpay_obj = new WXPayModel();
        //JSAPI
        $jsApiParameters = $wxpay_obj->pay_code(0, 0.01);
        dump($jsApiParameters);die;
    }

}
