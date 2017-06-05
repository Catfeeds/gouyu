<?php
/** 
 * @author 姜伟
 * @deprecated 记录用户账户变动明细的类库
 * @
 * */
class AccountModel extends Model
{
    /*
     *
			'1'	=> '在线充值',
			'2'	=> '银行汇入',
			'3'	=> '手动录入',
			'4'	=> '支付宝付款',
			'5'	=> '订单消费',
			'6'	=> '手动扣款',
			'7'	=> '订单退款',
			'8'=> '订单确认收货',

            '9' => '竞猜扣款',
            '10' => '猜冠军扣款',
            '11' => '夺宝扣款',
            '12' => '兑换扣款'
            '13' => '竞猜奖金'
            '14' => '猜冠军奖金'
            '15' => '竞猜退款'
            '16' => '冠军猜退款'
            '17' => '夺宝退款'
            '18' => '退回已结算金额'
            '19' => '推荐充值返利'
            '20' => '竞猜取消下注'
     *
     */

    const ONLINE_VOUCHER = 1;
    const BANK_VOUCHER = 2;
    const MANUAL_OPERATOR = 3;
    const ONLINE_PAY = 4;
    const ORDER_COST = 5;
    const MANUAL_DECRESE = 6;
    const ORDER_REFOUND = 7;
    const ORDER_CONFIRMD = 8;

    const GUESS_PAY = 9;
    const GUESS_CHAMPION_PAY = 10;
    const TREASURE_PAY = 11;
    const EXCHANGE_PAY = 12;
    const GUESS_GAIN = 13;
    const GUESS_CHAMPION_GAIN = 14;
    const GUESS_REFUND = 15;
    const GUESS_CHAMPION_REFUND = 16;
    const TREASURE_REFUND = 17;
    const PAY_MONEY_BACK = 18;
    const RECHARGE_BACK = 19;
    const GUESS_BAT_REBACK = 20;

    /** 
	 * 构造函数
     * @author 姜伟
     * @param void
     * @return void
     * @todo 初始化数据库，数据表
     * */
    public function AccountModel()
    {
		$this->db(0);
		$this->tableName = C('DB_PREFIX') . 'account';
	}
    
    /** 
	 * 修改用户账户余额，并写入账户变动日志
     * @author 姜伟
     * @param string $user_id 用户ID
     * @param int $change_type 变动类型
     * @param float $amount 变动金额(正负数）
     * @param string $remark 管理员备注，线上充值时，该参数为第三方支付平台返回的交易码
     * @param int $order_id 订单ID
     * @param string $proof 线下操作的凭证，非必填
     * @return float $amount_after_pay 余额不足时返回-1
     * @todo 1、调用分销商模型的getLeftMoney方法获取变动前余额$amount_before_pay；2、计算变动后$amount_after_pay = $amount_before_pay + $amount; 3、若$amount_after_pay小于0，返回-1退出，否则调用分销商模型的setLeftMoeny方法修改分销商余额；4、将账户变动信息写入到账户变动日志表account中；5、返回变动后的余额 $amount_after_pay
     * */
    public function addAccount($user_id, $change_type, $amount, $remark = '', $order_id = 0, $proof = '')
    {
		/*判断余额是否足够*/
		//调用UserModel的getLeftMoney方法获取预存款余额
		$user_obj = new UserModel($user_id);

        //先进冻结账户，后自动回余额
        //变动前的余额
        $user_total_money = $user_obj->getLeftAndFrozenMoney();
        $amount_before_pay_left = $user_total_money['left_money'];
        trace($amount_before_pay_left, 'amount_before_pay_left');

        //变动前的冻结余额
        $amount_before_pay_frozen = $user_total_money['frozen_money'];
        trace($amount_before_pay_frozen, 'amount_before_pay_frozen');


        $amount_before_pay = $amount_before_pay_left + $amount_before_pay_frozen;
        trace($amount_before_pay, 'amount_before_pay');

        //变动后的账户金额
        if (in_array($change_type, array(13,15, 18))) {
            $amount_after_pay_frozen = $amount_before_pay_frozen + $amount;

            //若余额不足，返回-1
            if ($amount_after_pay_frozen < 0.00)
            {
                return -1;
            }
        } else {
            $amount_after_pay_left = $amount_before_pay_left + $amount;

            //若余额不足，返回-1
            if ($amount_after_pay_left < 0.00)
            {
                return -1;
            }
        }

        //变动后的总余额
        $amount_after_pay = $amount_before_pay + $amount;  
        trace($amount_after_pay, 'amount_after_pay');

		/*写账户变动日志begin*/
		//判断入账 or 出账
		$amount_in = $amount_out = 0.00;
		if ($amount > 0)
		{
			$amount_in = $amount;
		}
		else
		{
			$amount_out = $amount * -1;
		}

		//组成数组
    	$this->data['user_id'] = $user_id;
    	$this->data['change_type'] = $change_type;
    	$this->data['amount_in'] = $amount_in;
    	$this->data['amount_out'] = $amount_out;
        $this->data['amount_before_pay'] = $amount_before_pay;
        $this->data['amount_after_pay'] = $amount_after_pay;
        $this->data['order_id'] = $order_id;
        $this->data['operater'] = session('user_id') ? intval(session('user_id')) : 0;
    	$this->data['addtime'] = time();
    	$this->data['remark'] = $remark;
    	$this->data['proof'] = $proof;
    	$this->data['ip'] = get_client_ip();

		//执行驱动事件
		switch ($change_type)
		{
			case self::ONLINE_VOUCHER:
				$this->voucher();//在线充值
				$this->data['pay_code'] = $proof;
                $user_obj->setLeftMoney($amount_after_pay_left);
				break;
			case self::BANK_VOUCHER:
				$this->offlinePay();//线下汇款充值
				break;
			case self::MANUAL_OPERATOR:
				//$this->manualVoucher();//手动录入
                $user_obj->setLeftMoney($amount_after_pay_left);
				break;
			case self::ONLINE_PAY:
				$this->onlinePayOrder();//线上支付
				break;
			case self::ORDER_COST:
				$this->payOrder($order_id, $proof);//订单消费
                $user_obj->setLeftMoney($amount_after_pay_left);
                $user_obj->where('user_id = %d', intval($user_id))->setInc('consumed_money', $amount_out);
				break;
			case self::MANUAL_DECRESE:
				//$this->manualDeduct();//手动扣款
                $user_obj->setLeftMoney($amount_after_pay_left);
				break;
            case self::GUESS_PAY;
            case self::GUESS_CHAMPION_PAY;
            case self::TREASURE_PAY;
            case self::EXCHANGE_PAY;
            case self::TREASURE_REFUND;
            case self::RECHARGE_BACK;
            case self::GUESS_BAT_REBACK;
            case self::GUESS_CHAMPION_GAIN;
            case self::GUESS_CHAMPION_REFUND;
                $user_obj->setLeftMoney($amount_after_pay_left);
                break;
            case self::GUESS_GAIN; 
            case self::GUESS_REFUND;
                //竞猜类奖金、退款流程
                //1,金额到frozen_money
                //2,accont设置是否需要操作及操作时间
                //3,时间到期时系统自动把冻结池中的金额放到余额中
                $this->data['need_opt'] = 1;
                $this->data['opt_time'] = NOW_TIME + 5*60;
                $user_obj->setFrozenMoney($amount_after_pay_frozen);
                break;
            case self::PAY_MONEY_BACK; //退回金额
                $user_obj->setFrozenMoney($amount_after_pay_frozen);
                break;
			
			default:
				trigger_error(__CLASS__ . ', ' . __FUNCTION__ . ', 无效的参数change_type');
		}

		//保存到数据库
		$this->add($this->data);
		log_file('account: ' . $this->getLastSql());
		/*写账户变动日志end*/

    	return $amount_after_pay;
    }

    /**
     * @access public
     * @todo   添加短信支付日志(表tp_sms_pay)
     * @author zhoutao
     * @param  string $pay_code 支付平台返回的交易码，唯一。 必须
     * @param  int $pay_state 充值状态。1表示成功，0表示失败
     * @param  float $pay_money 支付的金额。默认为0.00
     * @param  int $sms_total 充值的短信总条数。默认为0
     * @return void
     */
    public function addSMSPayLog($pay_code,$pay_state,$pay_money=0.00,$sms_total=0)
    {
    	if(!$pay_code){
    		return false;
    	}
    	$this->tableName = 'sms_pay';
    	$data = array(
    			'pay_code'		=>	$pay_code,
    			'pay_money'		=>	$pay_money,
    			'sms_total'		=>	$sms_total,
    			'pay_time'		=>	time(),
    			'pay_state'		=>	$pay_state
    	);
    	$this->add($data);
    }
    
    /** 
     * @author 姜伟
     * @deprecated 根据查询条件获得账户明细列表总条数
     * @param string $fields 返回的数据库字段列表，英文逗号隔开，为空则取全部字段
     * @param string $where 查询条件，where字句，为空则取全部
     * @return array $account_list 账户明细列表
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountNum($where = '')
    {
		return $this->where($where)->count();
    }
    
    
    /** 
     * @author 姜伟
     * @deprecated 根据查询条件获得账户明细列表
     * @param string $fields 返回的数据库字段列表，英文逗号隔开，为空则取全部字段
     * @param string $where 查询条件，where字句，为空则取全部
     * @return array $account_list 账户明细列表
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountList($fields = '', $where = '', $order = '', $limit = null)
    {
		return $this->field($fields)->where($where)->limit($limit)->order($order)->select();
    }
    
    /** 
     * @author 姜伟
     * @deprecated 获得单个用户的账户明细列表
     * @param int $user_id 用户ID
     * @return array $account_list
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountDetailByUserId($user_id)
    {
		$user_id = intval($user_id);
		if (!$user_id)
		{
			trigger_error(__CLASS__ . ', ' . __FUNCTION__ . '，无效的参数user_id');
		}

		//返回的字段列表
		$fields = 'change_type, amount_in, amount_out, amount_after_pay, amount_before_pay, order_id, operater, addtime, remark, proof, ip';

		//查询条件
		$where = 'user_id = ' . $user_id;

		return $this->getAccountList($fields, $where);
    }
     
    /** 
     * @author 姜伟
     * @deprecated 获得所有用户的账户明细列表
     * @param void
     * @return array $account_list
     * @todo 从账户日志表中取一定数量的账户明细，并以数组形式返回
     * */
    public function getAccountDetailByUsers()
    {
		//返回的字段列表
		$fields = 'user_id, change_type, amount_in, amount_out, amount_after_pay, amount_before_pay, order_id, operater, addtime, remark, proof, ip';

		return $this->getAccountList($fields);
    }
    
     /** 
     * @author 姜伟
     * @deprecated 用户在线充值
     * @param void
     * @return void
     * @todo 调用分销商模型的方法改变累计充值字段，发送邮件、短信等
     * */
    public function voucher()
    {
		require_once('Lib/Model/UserModel.class.php');
        $user_id = intval(session('user_id'));
		$user_obj = new UserModel($user_id);

        //充值
        trace($this->data['amount_after_pay'], 'wuzeguo_amount');
        //$user_obj->setLeftMoney($this->data['amount_after_pay']);
    }
    
     /** 
     * @author 姜伟
     * @deprecated 用预存款余额支付订单
     * @param int $order_id 订单ID
     * @param string $proof 消费码
     * @return void
     * @todo 调用订单模型的payOrder方法即可
     * @version 1.0
     * */
    public function payOrder($order_id, $proof)
    {
        if (!$order_id) return;
		//调用订单模型的payOrder方法
		$order_obj = new OrderModel($order_id);
        //$payway = $order_obj->where('order_id=%d', intval($order_id))->getField('payway');
		//$order_obj->payOrder($proof, $payway);

        //设置订单状态
        $order_obj = new OrderModel($order_id);
        $order_obj->setOrderState(OrderModel::PAYED);
    }
    
    /** 
     * @author 姜伟
     * @deprecated 管理员手工扣款
     * @param void
     * @return void
     * @todo 发送邮件、短信等
     * @version 1.0
     * */
    public function manualDeduct()
    {
    }
    
     /** 
     * @author 姜伟
     * @deprecated 管理员手工录入
     * @param void
     * @return void
     * @todo 发送邮件、短信等
     * @version 1.0
     * */
    public function manualVoucher()
    {
    }
    
     /** 
     * @author 姜伟
     * @deprecated 线上支付订单
     * @param void
     * @return void
     * @todo 线上支付订单，发送邮件、短信等
     * @version 1.0
     * */
    public function onlinePayOrder()
    {
		$this->payOrder();
    }
 
     /** 
     * @author 姜伟
     * @deprecated 线下汇款充值
     * @param void
     * @return void
     * @todo 线下汇款充值，发送邮件、短信等
     * @version 1.0
     * */
    public function offlinePay()
    {
    }
 
     /** 
     * @author 姜伟
     * @deprecated 查询第三方支付平台返回的交易码是否已存在于account表中
     * @param string $trade_no 第三方支付平台返回的交易码
     * @return boolean 存在返回true，不存在返回false
     * @todo 查询第三方支付平台返回的交易码是否已存在于account表中
     * @version 1.0
     * */
    public function checkPayCodeExists($trade_no)
    {
		$account_info = $this->field('account_id')->where('pay_code = "' . $trade_no . '"')->find();

		return $account_info ? true : false;
    }

    /**
     * 获取财务明细列表页数据信息列表
     * @author 姜伟
     * @param array $account_list
     * @return array $account_list
     * @todo 根据传入的$account_list获取更详细的财务明细列表页数据信息列表
     */
    public function getListData($account_list)
    {
		foreach ($account_list AS $k => $v)
		{
			//操作类型
			$change_type_list = self::getChangeTypeList();
			$change_type_name = $change_type_list[$v['change_type']];
			$account_list[$k]['change_type_name'] = $change_type_name;

			//操作人
			$user_obj = new UserModel($v['operater']);
			$user_info = $user_obj->getUserInfo('nickname');
			$account_list[$k]['operater'] = $user_info ? $user_info['nickname'] : '--';
			
			$account_list[$k]['amount_money'] = $v['amount_in'] > 0.00 ? $v['amount_in'] : '-' . $v['amount_out'];
		}

		return $account_list;
    }

    /**
     * 获取财务变动类型列表
     * @author 姜伟
     * @param void
     * @return array $change_type_list
     * @todo 获取财务变动类型列表
     */
    public static function getChangeTypeList()
    {
		$arr = array(
			'1'	=> '在线充值',
			//'2'	=> '银行汇入',
			'3'	=> '手动录入',
			//'4'	=> '支付宝付款',
			'5'	=> '订单消费',
			'6'	=> '手动扣款',
			//'7'	=> '订单退款',
			//'8'=> '订单确认收货',

            '9' => '竞猜扣款',
            '10' => '猜冠军扣款',
            '11' => '夺宝扣款',
            '12' => '兑换扣款',
            '13' => '竞猜奖金',
            '14' => '猜冠军奖金',
            '15' => '竞猜退款',
            '16' => '冠军猜退款',
            '17' => '夺宝退款',
            '18' => '退回已结算金额',
            '19' => '推荐充值返利',
            '20' => '竞猜取消下注'
		);

		return $arr;
    }

    /**
     * 根据订单ID获取支付信息
     * @author 姜伟
     * @param int $order_id
     * @return float
     * @todo 根据订单ID获取支付信息
     */
    public function getPayInfo($order_id)
    {
		//获取支付方式
		$order_obj = new OrderModel($order_id);
        $order_info = $order_obj->getOrderInfo('payway');

		//获取支付方式信息
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfo('payway_id = ' . $order_info['payway']);
		if (!$payway_info)
		{
			return false;
		}

		return $payway_info;
	}
 
    /** 
     * @author 姜伟
     * @deprecated 根据查询条件获得账户总和
     * @param string $where 查询条件，where字句，为空则取全部
     * @return float $amount
     * @todo 
     * */
    public function sumAccount($where = '')
    {
		return $this->where($where)->sum('amount_in');
    }


    /**
     * 时间到期后自动把冻结金额放入余额池中
     * wzg
     */
    public function autoFrozenToLeftMoney()
    {
        trace('-----------frozen_money --start-- left_money ------------');
        //1,把表中need_opt为1的找出且时间已到
        $account_list = $this->getAccountList('', 'need_opt = 1 AND opt_time > 0 AND opt_time <= ' . NOW_TIME, 'addtime', 10);

        if ($account_list) {
            foreach ($account_list AS $k => $v) {
                if ($v['amount_in'] > 0.00) {
                    trace($v['user_id'], 'user_id');
                    $amount = $v['amount_in'];
                    $user_obj = new UserModel($v['user_id']);
                    $total_money = $user_obj->getLeftAndFrozenMoney();  

                    //frozen_money --
                    $frozen_money = $total_money['frozen_money'];
                    trace($frozen_money, 'frozen_money');
                    $after_frozen_money = $frozen_money - $amount;
                    trace($after_frozen_money, 'after_frozen_money');
                    if ($after_frozen_money < 0) continue;

                    //left_money
                    $left_money = $total_money['left_money'];
                    trace($left_money, 'left_money');
                    $after_left_money = $left_money + $amount;
                    trace($after_left_money, 'after_left_money');

                    //set
                    $user_obj->setFrozenMoney($after_frozen_money);
                    $user_obj->setLeftMoney($after_left_money);

                    //设置need_opt = 0
                    $this->where('account_id = ' . $v['account_id'])->setField('need_opt', 0);
                }
            }
        }
        trace('-----------frozen_money --end-- left_money ------------');
    }


    /**
     * 是否有上级推荐
     * 充值返利
     * int $user_id;
     * float $amount 充值金额
     */
    public function RechargeBack($user_id, $amount)
    {
        //是否需要返利给上级用户
        //1,检查是否开启了充值返利，
        //2,查看是否已过5次
        //3,充值并插充值返利表
        $is_open = $GLOBALS['config_info']['IS_RECHARGE_BACK_CLOSE'];
        if ($is_open) {
            $recharge_back_pro = $GLOBALS['config_info']['RECHARGE_BACK_PRO'];
            $recharge_back_pro = $recharge_back_pro ? $recharge_back_pro : 2;

            $user_obj = new UserModel($user_id);
            $user_info = $user_obj->getUserInfo('parent_id');
            if ($user_info['parent_id']) {
                //查看用户还存在否
                $user_obj2 = new UserModel($user_info['parent_id']);
                $user_info2 = $user_obj2->getUserInfo('user_id');
                $parent_id = $user_info2['user_id'];

                if ($parent_id) {
                    $recharge_back_obj = new RechargeBackModel();
                    $num = $recharge_back_obj->getRechargeBackNum('user_id = ' . $parent_id . ' AND recharge_user_id = ' . $user_id);
                    if ($num < 5) {
                        //计算返利金额
                        $back_money = $amount * $recharge_back_pro / 100;
                        $status = $this->addAccount($parent_id, AccountModel::RECHARGE_BACK, $back_money, '推广返利', '', '');
                        if ($status >= 0) {
                            //recharge_back
                            $arr = array(
                                'user_id' => $parent_id,
                                'recharge_money' => $amount,
                                'gain_money'  => $back_money,
                                'recharge_user_id' => $user_id,
                                'addtime' => NOW_TIME,
                            );
                            $recharge_back_obj->add($arr);
                        }
                    }
                }
            }
        }
    }
}
