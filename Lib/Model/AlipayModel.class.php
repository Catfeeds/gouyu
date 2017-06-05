<?php
/**
*  支付方式
*  @ Date : 2014/04/08
*  @ Author : 姜伟
*/

//集成支付宝代码
/*****老版网页支付start******/
vendor('AlipaySDK.alipay_notify');
vendor('AlipaySDK.alipay_service');
/*****老版网页支付end******/

/*****app支付start******/
//vendor('alipay_mobile_pay.lib.alipay_core');
//vendor('alipay_mobile_pay.lib.alipay_rsa');
//vendor('alipay_mobile_pay.lib.alipay_notify');
/*****app支付end******/

/*****新版手机网页支付start******/
vendor('alipay_mobile_new.AopSdk');
/*****新版手机网页支付end******/

class AlipayModel extends PaywayModel 
{
	private $private_key_path;
	/**
	 * 获取支付代码
	 * @author 姜伟
	 * @param int $order_id 订单ID
	 * @param int $voucher_amount 充值金额，$order_id = 0 时有效
	 * @return int $qr_pay_mode 是否扫码支付，1是，0否
	 * @todo 获取支付代码
	 */
	public function pay_code($order_id = 0, $voucher_amount = 0.00, $qr_pay_mode = 0, $is_sms=false, $defaultbank = '', $user_id = 0)
	{
		log_file('defaultbank = ' . $defaultbank);
		$parameter = array();
		$service = '';
		$logistics_fee 	= 0.00;
		$logistics_type	= 'EXPRESS';

		$user_id = $user_id ? $user_id : session('user_id');

		//支付接口参数
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfoByTag('alipay');
		$pay_config = unserialize($payway_info['pay_config']);
		unset($payway_info);
        trace($pay_config);
		if (isset($pay_config['alipay_general_method']))
		{
			if($pay_config['alipay_general_method']==0) //标准双接口
			{
				//普通实物到账service
				$service =  'trade_create_by_buyer';
			}
			else if($pay_config['alipay_general_method']==1) //即时到账接口
			{
				//即时到账service
				$service = 'create_direct_pay_by_user';
			}
			else if($pay_config['alipay_general_method']==2) //纯担保交易接口
			{
				//纯担保交易接口service
				$service = 'create_partner_trade_by_buyer';
			}
			#$service = 'create_direct_pay_by_user';
		}

		//如果是订单付款，取订单信息，赋值到接口入参
		if($order_id)
		{
			//获取订单信息
			$order_obj = new OrderModel($order_id);
			$order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, user_address_id');
			$user_address_obj   = new UserAddressModel();
	        $user_address_info  = $user_address_obj->getUserAddressInfo('user_address_id = ' . $order_info['user_address_id']);
	        $order_info['consignee']  = $user_address_info['realname'];
	        $order_info['mobile']  = $user_address_info['mobile'];
			$order_info['address'] = AreaModel::getAreaString($user_address_info['province_id'], $user_address_info['city_id'], $user_address_info['area_id']) . $user_address_info['address'];
			$total_fee = $order_info['pay_amount'];
			$total_fee = $total_fee < 0.01 ? 0.01 : $total_fee;

			$out_trade_no 	= date('Ymdhms') . '_payorder_' . $order_id;
			$subject		= '订单付款';
			$body			= '订单付款';
			$logistics_fee 	= $order_info['express_fee'];
		}
		else
		{
			$total_fee = $voucher_amount;
			$out_trade_no 	= date('Ymdhms') . '_voucher_' . $user_id;
			$subject		= '在线充值';
			$body			= '在线充值';
		}

		//支付
		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];
		$seller_email 	= $pay_config['alipay_account'];

		$_input_charset = 'UTF-8';
		$sign_type		= 'MD5';
		$transport		= 'https';
		$return_url		= 'http://' . $_SERVER['HTTP_HOST'] . ((!$is_sms)?'/FrontUser/alipay_response':'/AcpConfig/alipay_response');
		$notify_url		= 'http://' . $_SERVER['HTTP_HOST'] . ((!$is_sms)?'/Front/alipay_response':'/Front/alipay_response_post');
		//$return_url		= 'http://gouyu.beyondin.com' . ((!$is_sms)?'/FrontUser/alipay_response':'/AcpConfig/alipay_response');
		//$notify_url		= 'http://gouyu.beyondin.com' . ((!$is_sms)?'/Front/alipay_response':'/Front/alipay_response_post');
		$show_url		= '';

		//是否银行支付
		#$paymethod    			= '';
		#$paybank['pay_code']  	= '';

		#if($order['pay_id'] != PAY_ALIPAY)
		#{
			#$paybank = get_payway_info($order['pay_id']);
			#$paymethod = 'bankPay';
		#}
	
		//alipay array()
		$parameter += array(
		'token'				=> '',
		"service" 			=> $service,
		"partner" 			=> $partner,						//合作商户号
		"return_url" 		=> $return_url,  					//同步返回
		"notify_url" 		=> $notify_url,  					//异步返回
		"_input_charset" 	=> $_input_charset,					//字符集，默认为UTF-8
		"show_url" 			=> $show_url,         				//商品相关网站
		"seller_email" 		=> $seller_email,					//卖家邮箱，必填
		"subject" 			=> $subject,						//商品名称，必填
		"body" 				=> $body,							//商品描述，必填
		"out_trade_no" 		=> $out_trade_no,					//商品外部交易号，必填,每次测试都须修改
		"price" 			=> $total_fee,						//商品单价，必填
		"payment_type"		=> '1',								//默认为1,不需要修改
		"quantity" 			=> '1',								//商品数量，必填
		"logistics_fee"		=> $logistics_fee,					//物流配送费用
		"logistics_payment"	=> 'BUYER_PAY',						//物流配送费用付款方式：SELLER_PAY(卖家支付)、BUYER_PAY(买家支付)、BUYER_PAY_AFTER_RECEIVE(货到付款)
		"logistics_type"	=> $logistics_type,					//物流配送方式：POST(平邮)、EMS(EMS)、EXPRESS(其他快递)

		'buyer_email'		=> '',//$order['email'],					//买家邮箱  【备注：根据支付宝要求修改为空！2012-10-19】
		#'paymethod'			=> $paymethod,
		#'defaultbank'		=> $paybank['pay_code'],
		'paymethod'			=> "bankPay",
		'defaultbank'		=> $defaultbank,
		'extend_param'		=> "isv^sh30"
		);
	
		if ($order_id)
		{
			$parameter['receive_name'] = $order_info['consignee'];	//收货人姓名必须是中文的或者大些英文字母。
			$parameter['receive_address'] = $order_info['address'];	//收货人地址不为空即可
			$parameter['receive_mobile'] = $order_info['mobile'];	//必须是11位的数字，13开头的或15开头的。
		}

		if($qr_pay_mode)
		{
			$parameter['qr_pay_mode'] = 2;
		}
		
		#if(!$paybank['pay_code'] || !$paymethod)
		#{
			#unset($parameter['paymethod']);
			#unset($parameter['defaultbank']);
		#}
		
		#if ($paymethod == 'bankPay')
		#{
			#unset($parameter['buyer_email']);
		#}

		#echo "<pre>";
		#print_r($parameter);
		#echo "</pre>";die;
		$alipay = new alipay_service($parameter, $security_code, $sign_type);
		$link = $alipay->create_url();
			#echo "<pre>";print_r($link); var_dump($alipay);die;


		#if($qr_pay_mode)
		#{
			#$link = "<input type=\"button\" class=\"btn_pay_code\" onclick=\"window.open('". $link ."')\" value=\"\" class=\"f14\" />";
		#}
		
		return $link;
	}

	/**
	 * 支付相应
	 * @author 姜伟
	 * @param void
	 * @return 订单付款成功返回1，充值成功返回2，失败返回false
	 * @todo 验证来源有效性，获取支付类型（充值/订单付款），如果是充值，充值等额预存款，如果是订单付款，设置订单状态为已付款
	 */
	function pay_response()
	{
		/*检查签名*/
		if(!$this->pay_check_sign())
		{
			return false;
		}

		$data = isset($_GET['out_trade_no']) ? $_GET : $_POST;
		
		//获取支付类型
		$row_dd	= isset($data['out_trade_no']) ? explode('_', $data['out_trade_no']) : '';
		$pay_type = $row_dd[1];
		$order_id = ($pay_type == 'payorder') ? $row_dd[2] : 0;

		//获取支付宝的反馈参数
		$trade_no = (isset($data['trade_no'])) ? $data['trade_no'] : '';	//获取订单号
		$trade_status	= (isset($data['trade_status']))? 	$data['trade_status']:''; 	//获取支付宝反馈过来的状态,根据不同的状态来更新数据库 WAIT_BUYER_PAY(表示等待买家付款);WAIT_SELLER_SEND_GOODS(表示买家付款成功,等待卖家发货);WAIT_BUYER_CONFIRM_GOODS(卖家已经发货等待买家确认);TRADE_FINISHED(表示交易已经成功结束)

		if($order_id)
		{
			//获取订单信息
			$order_obj = new OrderModel($order_id);
			try
			{
				$order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, pay_time, order_status, user_id, coupon_id, coupon_amount');
			}
			catch (Exception $e)
			{
				return false;
			}

			$user_id = $order_info['user_id'];
			$total_fee = floatval($order_info['pay_amount']);
			/* 检查支付的金额是否相符*/
			if ($total_fee != $data['total_fee'])
			{
				return false;
			}

			//检查订单是否已付款，若已付款，退出
			if ($order_info['order_status'])
			{
				//return false;
			}

			//买家付款成功 WAIT_SELLER_SEND_GOODS
			//这里放入你自定义代码,比如根据不同的trade_status进行不同操作
			if ($trade_status == 'WAIT_SELLER_SEND_GOODS' || $trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS' )
			{
				//优惠券状态变更
				$coupon_obj = new CouponModel();
				$tag = $coupon_obj->useCoupon($order_info['coupon_id'], $order_id, $order_info['coupon_amount']);

				//调用订单模型的payOrder方法设置订单状态为已付款
				#$order_obj->payOrder($trade_no, 'alipay');
				//调用财务模型的addAccount方法支付订单
				$account_obj = new AccountModel();
				$account_obj->addAccount($user_id, 1, $data['total_fee'], '订单付款，支付宝充入', $order_id, $trade_no);
				$account_obj->addAccount($user_id, 5, $data['total_fee'] * -1, '订单付款扣款', $order_id, $trade_no);

				//记录支付方式
				$arr = array(
					'payway'	=> '支付宝',
					'pay_code'		=> $trade_no,
				);
				$order_obj = new OrderModel($order_id);
				$order_obj->setOrderInfo($arr);
				$order_obj->saveOrderInfo();
				return 1;
			}
			else
			{
				return false;
			}
		}
		elseif ($pay_type == 'voucher')
		{
			//检验是否已处理，若已处理，直接返回false
			$account_obj = new AccountModel();
			$is_handled = $account_obj->checkPayCodeExists($trade_no);
			if ($is_handled)
			{
				//已处理，直接返回false
				return false;
			}

			//获取user_id
			$user_id = $row_dd[2];

            //钱是否满10元
            if ($data['total_fee'] < 10) {
            
            }

			$account_obj = new AccountModel();
            $total_fee = $data['total_fee'] * $GLOBALS['config_info']['RMB_EXCHANGE_PROP_ALIPAY'];
			if ($trade_status == 'WAIT_SELLER_SEND_GOODS')
			{
				//调用账户模型的addAccount充值等额预存款金额
				$account_obj->addAccount($user_id, 1, $total_fee, '支付宝充值', 0, $trade_no);
				log_file($account_obj->getLastSql());

                //是否是上级推荐
                $account_obj->RechargeBack($user_id, $total_fee);

				return 2;
			}
			else if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS' )
			{
				//调用账户模型的addAccount充值等额预存款金额
				$account_obj->addAccount($user_id, 1, $total_fee, '支付宝充值', 0, $trade_no);
				log_file($account_obj->getLastSql());

                //是否是上级推荐
                $account_obj->RechargeBack($user_id, $total_fee);

				return 2;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	//会员查询教研接口
	function pay_check_email($email)
	{
		global $db, $config, $userdata, $phpEx;

		$payway 		= get_payway_info(PAY_ALIPAY);
		$pay_config 	= unserialize_config($payway['pay_config']);
		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];

		$_input_charset = "UTF-8"; //字符编码格式
		$sign_type 		= "MD5"; //加密方式
		$transport		= "http";//访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式

		$parameter = array(
		"service" 		=> "user_query", 		//会员查询教研接口user_query
		"partner" 		=> $partner,			//合作商户号
		"_input_charset"=> $_input_charset,
		"email" 		=> $email	//需要检测的邮箱
		);
		$alipay = new alipay_service($parameter, $security_code, $sign_type);
		$link = $alipay->create_url();

		return $link;
	}

	//会员收货地址教研接口
	function pay_check_address($email)
	{
		global $db, $config, $userdata, $phpEx;

		$payway 		= get_payway_info(PAY_ALIPAY);
		$pay_config 	= unserialize_config($payway['pay_config']);
		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];

		$_input_charset = "UTF-8"; //字符编码格式
		$sign_type 		= "MD5"; //加密方式
		$transport		= "http";//访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式

		$parameter = array(
		"service" 		=> "user_consignee_address", 		//会员查询教研接口user_query
		"partner" 		=> $partner,						//合作商户号
		"_input_charset"=> $_input_charset,
		"user_email"	=> $email							//需要检测的邮箱
		);
		$alipay = new alipay_service($parameter, $security_code, $sign_type);
		$link = $alipay->create_url();

		return $link;
	}

	//确认发货状态
	function pay_send_goods_confirm($order)
	{
		global $db, $config, $userdata, $phpEx;

		$payway 		= get_payway_info(PAY_ALIPAY);
		$pay_config 	= unserialize_config($payway['pay_config']);
		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];

		$_input_charset = "UTF-8"; //字符编码格式
		$sign_type 		= "MD5"; //加密方式
		$transport		= "http";//访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式

		$parameter = array(
		"service" 			=> 'send_goods_confirm_by_platform',
		"partner" 			=> $partner,			//合作商户号
		"_input_charset" 	=> $_input_charset,		//字符集，默认为UTF-8

		"trade_no" 			=> $order['trade_no'],			//商品交易号，必填,每次测试都须修改
		'logistics_name'	=> $order['shipping_company'], 	//物流公司名称
		"transport_type"	=> $order['shipping_code'],		//物流配送方式：POST(平邮)、EMS(EMS)、EXPRESS(其他快递)
		'invoice_no'		=> $order['shipping_single']	//物流发货单号
		);

		//print_r($parameter);

		$alipay = new alipay_service($parameter, $security_code, $sign_type);
		$link = $alipay->create_url();

		return $link;
	}

	//确认订单是否客户已经确认收货
	function single_trade_query($order)
	{
		global $db, $config, $userdata, $phpEx;

		$payway 		= get_payway_info(PAY_ALIPAY);
		$pay_config 	= unserialize_config($payway['pay_config']);
		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];

		$_input_charset = "UTF-8"; //字符编码格式
		$sign_type 		= "MD5"; //加密方式
		$transport		= "http";//访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式

		$parameter = array(
		"service" 			=> 'single_trade_query',
		"partner" 			=> $partner,			//合作商户号
		"_input_charset" 	=> $_input_charset,		//字符集，默认为UTF-8
		"outTradeNo"		=> create_date('Ymdhms', $order['add_time'], +8).'_'.$order['id']		//商品交易号，必填,每次测试都须修改
		);

		//print_r($parameter);

		$alipay = new alipay_service($parameter, $security_code, $sign_type);
		$link = $alipay->create_url();

		return $link;
	}

	//确认签名
	function pay_check_sign()
	{
		//支付
		$data = isset($_GET['out_trade_no']) ? $_GET : $_POST;
		ksort($data);
		
		//支付接口参数
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfoByTag('alipay');
		$pay_config = unserialize($payway_info['pay_config']);
		unset($payway_info);

		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];
		
		
		$sign = '';
		foreach($data as $key => $val)
		{
			if($val != '' and $key != 'sign' and $key != 'sign_type' and $key != "paycode")
			{
				$sign .= "&$key=$val";
			}
		}

		if($data['sign'] != md5(substr($sign,1).$security_code))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	//确认签名
	function pay_check_alilogin_sign()
	{
		global $db, $config;

		//支付
		ksort($_GET);

		$sign = '';		
		$partner = $config['alilogin_partner'];
		$security_code = $config['alilogin_security_code'];

		foreach($_GET as $key => $val)
		{
			if($val != '' and $key != 'sign' and $key != 'sign_type' and $key != "paycode" and $key != "mod")
			{
				$sign .= "&$key=$val";
			}
		}

		if($_GET['sign'] != md5(substr($sign,1).$security_code))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	//会员校验接口
	function pay_check_user($user_email, $return_url)
	{
		global $db, $config, $userdata, $phpEx;
		
		$partner = $config['alilogin_partner'];
		$security_code = $config['alilogin_security_code'];
		$seller_email	= '';

		$return_url		= 'http://' . $config['server_name'].$return_url;
		$_input_charset = "UTF-8"; //字符编码格式
		$sign_type 		= "MD5"; //加密方式
		$transport		= "http";//访问模式,你可以根据自己的服务器是否支持ssl访问而选择http以及https访问模式

		$parameter = array(
		"service" 		=> "user_authentication", //user_authentication 会员验证接口
		"partner" 		=> $partner,
		"_input_charset"=> $_input_charset,
		"return_url"	=> $return_url,		//同步返回
		"email" 		=> $user_email	//买家邮箱，必填
		);

		//print_r($parameter);
		$alipay = new alipay_service($parameter,$security_code,$sign_type);
		$link = $alipay->create_url();

		return $link;
	}
	/**
	 * 获取支付包签约类型列表
	 * @author 姜伟
	 * @param void
	 * @return void
	 * @todo 直接返回3种签约接口的数组
	 */
	public function getSignTypeList()
	{
		return array(
			array(
				'key'	=> '使用即时到帐交易接口',
				'value'	=> '1'
			),
			array(
				'key'	=> '使用即时担保交易接口',
				'value'	=> '2'
			),
			array(
				'key'	=> '使用标准双接口',
				'value'	=> '0'
			),
		);
	}

/**
	 * 获取支付代码
	 * @author 姜伟
	 * @param int $order_ids 订单ID列表
	 * @return int $qr_pay_mode 是否扫码支付，1是，0否
	 * @todo 获取支付代码
	 */
	public function refund_apply($order_ids)
	{
		$parameter = array();
		$service = '';

		//支付接口参数
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfoByTag('alipay');
		$pay_config = unserialize($payway_info['pay_config']);
		unset($payway_info);

		//支付
		$partner 		= $pay_config['alipay_partner'];
		$security_code 	= $pay_config['alipay_key'];
		$seller_email 	= $pay_config['alipay_account'];

		$_input_charset = 'UTF-8';
		$sign_type		= 'MD5';
		$transport		= 'https';
		$notify_url		= 'http://' . $_SERVER['HTTP_HOST'] . '/Front/alipay_refund_post';
		$return_url		= 'http://' . $_SERVER['HTTP_HOST'] . '/Front/alipay_refund';

		//获取batch_no, batch_num, detail_data
		$batch_num = 0;
		$detail_data = '';

		//获取batch_no
		$alipay_refund_log_obj = new AlipayRefundLogModel();
		$alipay_refund_log_id = $alipay_refund_log_obj->addAlipayRefundLog(array());
		//batch_no为当前时间.批次ID
		$batch_no = date('Ymd', time()) . $alipay_refund_log_id;
		$order_ids = explode(',', $order_ids);
		foreach ($order_ids AS $k => $v)
		{
			//获取订单退款金额
			$order_obj = new OrderModel($v);
			try 
			{
				$order_info = $order_obj->getOrderInfo('pay_amount, pay_code, order_status');
			}
			catch (Exception $e)
			{
				continue;
			}

			if ($order_info['order_status'] != OrderModel::REFUNDING)
			{
				continue;
			}

			//设置本系统通过退款的时间
			$arr3 = array(
				'refund_pass_time'	=> time()
			);
			$order_obj->setOrderInfo($arr3);
			$order_obj->saveOrderInfo();

			$batch_num ++;
			$detail_data .= $order_info['pay_code'] . "^" . $order_info['pay_amount'] . "^" . "协商退款#";
			#"2015040300001000310047293941^0.01^协商退款"

			//将订单信息保存到alipay_refund_detail表
			$alipay_refund_detail_obj = new AlipayRefundDetailModel();
			$arr2 = array(
				'alipay_refund_log_id'	=> $alipay_refund_log_id,
				'order_id'				=> $v,
				'refund_num'			=> $order_info['pay_amount'],
				'pay_code'				=> $order_info['pay_code'],
			);
			$alipay_refund_detail_obj->addAlipayRefundDetail($arr2);
		}
		$detail_data = substr($detail_data, 0, -1);
		#die($detail_data);

		$alipay_refund_log_obj = new AlipayRefundLogModel($alipay_refund_log_id);
		$arr = array(
			'batch_no'	=> $batch_no,
			'batch_num'	=> $batch_num,
			'addtime'	=> time(),
		);
		$alipay_refund_log_obj->editAlipayRefundLog($arr);

		//alipay array()
		$parameter = array(
			"service" 			=> 'refund_fastpay_by_platform_pwd',
			"partner" 			=> $partner,						//合作商户号
			"notify_url" 		=> $notify_url,  					//异步返回
			"return_url" 		=> $return_url,  					//异步返回
			"_input_charset" 	=> $_input_charset,					//字符集，默认为UTF-8
			"seller_email" 		=> $seller_email,					//卖家邮箱，必填
			#"subject" 			=> $subject,						//商品名称，必填
			"refund_date" 		=> date('Y-m-d H:i:s', time()),		//退款时间
			"batch_no"			=> $batch_no,						//退款批次号
			"batch_num" 		=> $batch_num,						//退款笔数
			'detail_data'		=> $detail_data,					//单笔数据集
			#"batch_no"			=> date('Ymd', time()) . '001',			//退款批次号
			#"batch_num" 		=> '1',								//退款笔数
			#'detail_data'		=> "2015040300001000310047293941^0.01^协商退款"	//单笔数据集
		);

		$alipay = new alipay_service($parameter, $security_code, $sign_type);
		$link = $alipay->create_url();
		#echo "<pre>";
		#echo $link;
		#print_r($parameter);
		#echo "</pre>";die;

		#if($qr_pay_mode)
		#{
			#$link = "<input type=\"button\" class=\"btn_pay_code\" onclick=\"window.open('". $link ."')\" value=\"\" class=\"f14\" />";
		#}
		
		return $link;
	}

	/**
	 * 退款回调处理
	 * @author 姜伟
	 * @param void
	 * @return 订单退款成功返回true，失败返回false
	 * @todo 验证来源有效性，获取支付类型（充值/订单付款），如果是充值，充值等额预存款，如果是订单付款，设置订单状态为已付款
	 */
	function refund_post()
	{
		$data = isset($_GET['batch_no']) ? $_GET : $_POST;
		log_file('alipay_refund_post, response_data = ' . json_encode($data), 'alipay_refund_post');
		#send_email('支付宝退款异步处理', 'data = ' . json_encode($data));
		
		/*检查签名*/
		if(!$this->pay_check_sign())
		{
			send_email('支付宝退款签名校验未通过', 'data = ' . json_encode($data));
			#return false;
		}

		//获取退款批次号，退款笔数，退款结果
		$batch_no = $data['batch_no'];
		$batch_num = $data['success_num'];
		$result_details = urldecode($data['result_details']);

		//判断退款批次有效性
		$alipay_refund_log_obj = new AlipayRefundLogModel();
		$alipay_refund_log_info = $alipay_refund_log_obj->getAlipayRefundLogInfo('batch_no = "' . $batch_no . '"', 'is_handled, alipay_refund_log_id, batch_num');
		if (!$alipay_refund_log_info)
		{
			//不存在该退款批次，退出返回false
			return false;
		}

		if ($alipay_refund_log_info['batch_num']!= $batch_num)
		{
			//该退款批次的总退款笔数被篡改，退出返回false
			#return false;
		}

		if ($alipay_refund_log_info['is_handled'] == 1)
		{
			//该退款批次已处理过，退出返回false
			return false;
		}

		//遍历退款结果，一一处理订单状态
		$alipay_refund_log_id = $alipay_refund_log_info['alipay_refund_log_id'];
		#dump($result_details);
		$result_details = explode('#', urldecode($result_details));
		$alipay_refund_detail_obj = new AlipayRefundDetailModel();
		$success_num = 0;
		#dump($result_details);
		#die;
		foreach ($result_details AS $k => $v)
		{
			//获取pay_code
			$arr = explode('^', $v);
			$pay_code = $arr[0];
			//获取处理结果
			$success = $arr[count($arr) - 1];
			if ($success == 'SUCCESS' || $success == 'TRADE_HAS_CLOSED')
			{
				//处理成功，将订单状态变更为已退款
				$alipay_refund_detail_info = $alipay_refund_detail_obj->getAlipayRefundDetailInfo('pay_code = "' . $pay_code . '" AND alipay_refund_log_id = ' . $alipay_refund_log_id, 'order_id');
				if (!$alipay_refund_detail_info)
				{
					//订单退款日志不存在，退出返回false
					return false;
				}
				$order_obj = new OrderModel($alipay_refund_detail_info['order_id']);
				
				$tag = $order_obj->passRefundApply();
				$success_num += $tag ? 1 : 0;
			}
		}

		if ($success_num == $batch_num)
		{
			//将本批次退款状态变更为已处理
			$alipay_refund_log_obj = new AlipayRefundLogModel($alipay_refund_log_id);
			$arr = array(
				'is_handled'	=> 1
			);
			$alipay_refund_log_obj->editAlipayRefundLog($arr);
			exit('success');
		}
	}

	/**
	 * 获取无线支付代码
	 * @author 姜伟
	 * @param int $order_id 订单ID
	 * @param int $voucher_amount 充值金额，$order_id = 0 时有效
	 * @todo 获取无线支付代码
	 */
	public function mobile_pay_code($order_id = 0, $voucher_amount = 0.00)
	{
		$service = 'mobile.securitypay.pay';

		//支付接口参数
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfoByTag('mobile_alipay');
		$pay_config = json_decode($payway_info['pay_config'], true);
#dump($payway_info);
		unset($payway_info);

		//如果是订单付款，取订单信息，赋值到接口入参
		if($order_id)
		{
			//获取订单信息
			$order_obj = new OrderModel($order_id);
			$order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, consignee, mobile');
			
			$total_fee = $order_info['pay_amount'];
			$total_fee = $total_fee < 0.01 ? 0.01 : $total_fee;

			$out_trade_no 	= date('Ymdhms') . '_payorder_' . $order_id;
			$subject		= '订单付款';
			$body			= '订单付款';
		}
		else
		{
			$total_fee = $voucher_amount;
			$out_trade_no 	= date('Ymdhms') . '_voucher_' . session('user_id');
			$subject		= '在线充值';
			$body			= '在线充值';
		}

		//支付
		$partner 	= $pay_config['partner'];
		$security_code 	= $pay_config['key'];
		$seller_email 	= $pay_config['account'];

		$_input_charset = 'utf-8';
		$sign_type		= 'RSA';
		$transport		= 'https';
		#$return_url		= 'http://' . $_SERVER['HTTP_HOST'] . ((!$is_sms)?'/FrontUser/mobile_alipay_response':'/AcpConfig/mobile_alipay_response');
		$notify_url		= C('DOMAIN') . '/Front/mobile_alipay_response_post';
		$show_url		= '';

		$parameter = array(
			"service" 			=> $service,
			"partner" 			=> $partner,						//合作商户号
			"_input_charset" 	=> $_input_charset,					//字符集，默认为UTF-8
			"sign_type"			=> $sign_type,								//加密方式
			#"return_url" 		=> $return_url,  					//同步返回
			"notify_url" 		=> $notify_url,  					//异步返回
			"out_trade_no" 		=> $out_trade_no,					//商品外部交易号，必填,每次测试都须修改
			"subject" 			=> $subject,						//商品名称，必填
			"payment_type"		=> '1',								//默认为1,不需要修改
			"seller_id" 		=> $seller_email,					//卖家邮箱，必填
			"total_fee"			=> $total_fee,						//商品单价，必填
			"body" 				=> $body,							//商品描述，必填
		);

		//生成待签名字符串
		#$str = createLinkstringUrlencode(paraFilter($parameter));
		$str = createLinkstring(paraFilter($parameter));
#echo $str;
		//生成签名后字符串
		#$sign = $this->rsaSign($str, $pay_config['private_key_path']);
		$this->private_key_path = APP_PATH . 'frame/Extend/Vendor/alipay_mobile_pay/key/rsa_private_key.pem';
		$parameter['sign'] = rsaSign($str, $this->private_key_path);

		return $parameter;
	}

	/**
	 * 无线快捷支付回调处理
	 * @author 姜伟
	 * @param void
	 * @return 订单付款成功返回1，充值成功返回2，失败返回false
	 * @todo 验证来源有效性，获取支付类型（充值/订单付款），如果是充值，充值等额预存款，如果是订单付款，设置订单状态为已付款
	 */
	function mobile_pay_response()
	{
		#log_file('$_POST = ' . json_encode($_POST), 'mobile_alipay');
		#log_file('$_REQUEST = ' . json_encode($_REQUEST), 'mobile_alipay');
		#$postStr = file_get_contents("php://input");
		#$data = $this->xmlToArray($postStr);
		#log_file('postStr = ' . $postStr, 'mobile_alipay');
		$data = isset($_GET['out_trade_no']) ? $_GET : $_POST;
		log_file('data = ' . json_encode($data), 'mobile_alipay');
		/*检查签名*/
		$this->public_key_path = APP_PATH . 'frame/Extend/Vendor/alipay_mobile_pay/key/alipay_public_key.pem';
		$str = createLinkstring(paraFilter($data), false);
		if(!rsaVerify($str, $this->public_key_path, $data['sign']))
		{
log_file('校验未通过', 'mobile_alipay');
			return false;
		}

log_file('校验通过', 'mobile_alipay');
		$data = isset($_GET['out_trade_no']) ? $_GET : $_POST;
		
		//获取支付类型
		$row_dd	= isset($data['out_trade_no']) ? explode('_', $data['out_trade_no']) : '';
		$pay_type = $row_dd[1];
		$order_id = ($pay_type == 'payorder') ? $row_dd[2] : 0;

		//获取支付宝的反馈参数
		$trade_no = (isset($data['trade_no'])) ? $data['trade_no'] : '';	//获取订单号
		$trade_status	= (isset($data['trade_status']))? 	$data['trade_status']:''; 	//获取支付宝反馈过来的状态,根据不同的状态来更新数据库 WAIT_BUYER_PAY(表示等待买家付款);WAIT_SELLER_SEND_GOODS(表示买家付款成功,等待卖家发货);WAIT_BUYER_CONFIRM_GOODS(卖家已经发货等待买家确认);TRADE_FINISHED(表示交易已经成功结束)

		if($order_id)
		{
			//获取订单信息
			$order_obj = new OrderModel($order_id);
			try
			{
				$order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, consignee, mobile, pay_time, order_status, user_id');
			}
			catch (Exception $e)
			{
				return false;
			}

			$user_id = $order_info['user_id'];
			$total_fee = floatval($order_info['pay_amount']);
			/* 检查支付的金额是否相符*/
			if ($total_fee != $data['total_fee'])
			{
				return false;
			}

			//检查订单是否已付款，若已付款，退出
			if ($order_info['order_status'])
			{
				//return false;
			}

			//买家付款成功 WAIT_SELLER_SEND_GOODS
			//这里放入你自定义代码,比如根据不同的trade_status进行不同操作
			if ($trade_status == 'WAIT_SELLER_SEND_GOODS' || $trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS' )
			{
				//调用订单模型的payOrder方法设置订单状态为已付款
				#$order_obj->payOrder($trade_no, 'alipay');
				//调用财务模型的addAccount方法支付订单
				$account_obj = new AccountModel();
				$account_obj->addAccount($user_id, 1, $data['total_fee'], '订单付款，支付宝充入', $order_id, $trade_no);
				$account_obj->addAccount($user_id, 5, $data['total_fee'] * -1, '订单付款扣款', $order_id, $trade_no);

				//记录支付方式
				$arr = array(
					'pay_tag'		=> 'mobile_alipay',
					'payway_name'	=> '支付宝',
					'pay_code'		=> $trade_no,
				);
				$order_obj = new OrderModel($order_id);
				$order_obj->setOrderInfo($arr);
				$order_obj->saveOrderInfo();
				return 1;
			}
			else
			{
				return false;
			}
		}
		elseif ($pay_type == 'voucher')
		{
			//检验是否已处理，若已处理，直接返回false
			$account_obj = new AccountModel();
			$is_handled = $account_obj->checkPayCodeExists($trade_no);
			if ($is_handled)
			{
				//已处理，直接返回false
				return false;
			}

			//获取user_id
			$user_id = $row_dd[2];

			$account_obj = new AccountModel();
			if ($trade_status == 'WAIT_SELLER_SEND_GOODS')
			{
				//调用账户模型的addAccount充值等额预存款金额
				$account_obj->addAccount($user_id, 1, $data['total_fee'], '支付宝充值', 0, $trade_no);
				log_file($account_obj->getLastSql());
				return 2;
			}
			else if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS' )
			{
				//调用账户模型的addAccount充值等额预存款金额
				$account_obj->addAccount($user_id, 1, $data['total_fee'], '支付宝充值', 0, $trade_no);
				log_file($account_obj->getLastSql());
				return 2;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * 	作用：将xml转为array
	 */
	public function xmlToArray($xml)
	{
        //将XML转为array        
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);		
		return $array_data;
	}


    /**
     * 手机网页支付
     */
    public function  mobile_wap_pay_code($order_id = 0, $voucher_amount = 0.00, $user_id =0)
    {
        $user_id = $user_id ? $user_id : session('user_id');

		//支付接口参数
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfoByTag('wap_alipay');
		$pay_config = unserialize($payway_info['pay_config']);
		unset($payway_info);

		//如果是订单付款，取订单信息，赋值到接口入参
		if($order_id)
		{
			//获取订单信息
			$order_obj = new OrderModel($order_id);
			$order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, consignee, mobile');
			
			$total_fee = $order_info['pay_amount'];
			$total_fee = $total_fee < 0.01 ? 0.01 : $total_fee;

			$out_trade_no 	= date('Ymdhms') . '_payorder_' . $order_id;
			$subject		= '订单付款';
			$body			= '订单付款';
		}
		else
		{
			$total_fee = $voucher_amount;
			$out_trade_no 	= date('Ymdhms') . '_voucher_' . $user_id;
			$subject		= '在线充值';
			$body			= '在线充值';
		}

        //集成支付宝
        $aop = new AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = $pay_config['alipay_app_id'];
        //$aop->appId = '2016101402174714';
        //$aop->appId = '2016101302146440';

        $aop->rsaPrivateKeyFilePath = APP_PATH . 'frame/Extend/Vendor/alipay_mobile_new/key/rsa_private_key.pem';
        $aop->alipayPublicKey= APP_PATH . 'frame/Extend/Vendor/alipay_mobile_new/key/alipay_public_key.pem';
        //$aop->rsaPrivateKeyFilePath = APP_PATH . 'frame/Extend/Vendor/alipay_mobile_new/key/rsa_private_key_my.pem';
        //$aop->alipayPublicKey= APP_PATH . 'frame/Extend/Vendor/alipay_mobile_new/key/alipay_public_key_my.pem';
        $aop->apiVersion = '1.0';
        $aop->postCharset='UTF-8';
        $aop->format='json';

        //主要业务参数
        $parameter = array(
            'body' => $body,
            'subject' => $subject,
            'out_trade_no' => $out_trade_no,
            'timeout_express' => '90m',        //允许付款的最晚时间
            'total_amount' => $total_fee,
            'product_code' => 'QUICK_WAP_PAY', //不用更改
        );
        $request = new AlipayTradeWapPayRequest ();
        $request->setBizContent(json_encode($parameter));
        $request->setNotifyUrl('http://' . $_SERVER['HTTP_HOST'] . '/Front/mobile_wap_pay_response'); //支付后的通知地址
        $request->setReturnUrl(''); //支付后的跳转地址
        $result = $aop->pageExecute($request); 
        echo $result;
    } 

    /**
     * 最新手机网页支付回调
     * @author wzg
     * @date 2016-10-19
     */
    public function mobile_wap_pay_response()
    {
		$data = isset($_GET['out_trade_no']) ? $_GET : $_POST;
		trace('data = ' . json_encode($data), 'mobile_wap_alipay');

        //第一步： 在通知返回参数列表中，除去sign、sign_type两个参数外，凡是通知返回回来的参数皆是待验签的参数
        //第二步： 将剩下参数进行url_decode, 然后进行字典排序，组成字符串，得到待签名字符串
        //第三步： 将签名参数（sign）使用base64解码为字节码串。
        //第四步： 使用RSA的验签方法，通过签名字符串、签名参数（经过base64解码）及支付宝公钥验证签名。

        $aop = new AopClient ();
        //$aop->alipayPublicKey= APP_PATH . 'frame/Extend/Vendor/alipay_mobile_new/key/alipay_public_key.pem';

        $alipay_public_key = APP_PATH . 'frame/Extend/Vendor/alipay_mobile_new/key/alipay_public_key.pem';
        if (!$aop->rsaCheckV1($data, $alipay_public_key)) 
        {
trace('校验未通过', 'mobile_wap_alipay');
			return false;
        }
trace('校验通过', 'mobile_wap_alipay');

		//支付接口参数
		$payway_obj = new PaywayModel();
		$payway_info = $payway_obj->getPaywayInfoByTag('wap_alipay');
		$pay_config = unserialize($payway_info['pay_config']);
#dump($payway_info);
		unset($payway_info);

		//获取支付类型
		$row_dd	= isset($data['out_trade_no']) ? explode('_', $data['out_trade_no']) : '';
		$pay_type = $row_dd[1];
		$order_id = ($pay_type == 'payorder') ? $row_dd[2] : 0;

        //验证app_id
        if (!(isset($data['app_id']) && $data['app_id'] == $pay_config['alipay_app_id'])) {
trace('app_id不正确', 'mobile_wap_alipay');
            return false;
        }
        
		//获取支付宝的反馈参数
		$trade_no = (isset($data['trade_no'])) ? $data['trade_no'] : '';	//获取订单号
		$trade_status	= (isset($data['trade_status']))? 	$data['trade_status']:''; 	//获取支付宝反馈过来的状态,根据不同的状态来更新数据库 WAIT_BUYER_PAY(表示等待买家付款);WAIT_SELLER_SEND_GOODS(表示买家付款成功,等待卖家发货);WAIT_BUYER_CONFIRM_GOODS(卖家已经发货等待买家确认);TRADE_FINISHED(表示交易已经成功结束)

        //支付金额
        $pay_total_amount = $data['total_amount'];

		if($order_id)
		{
			//获取订单信息
			$order_obj = new OrderModel($order_id);
			try
			{
				$order_info = $order_obj->getOrderInfo('pay_amount, total_amount, express_fee, consignee, mobile, pay_time, order_status, user_id');
			}
			catch (Exception $e)
			{
				return false;
			}

			$user_id = $order_info['user_id'];
			$total_fee = floatval($order_info['pay_amount']);
			/* 检查支付的金额是否相符*/
			if ($total_fee != $pay_total_amount)
			{
				return false;
			}

			//检查订单是否已付款，若已付款，退出
			if ($order_info['order_status'])
			{
				//return false;
			}

			//买家付款成功 WAIT_SELLER_SEND_GOODS
			//这里放入你自定义代码,比如根据不同的trade_status进行不同操作
			if ($trade_status == 'WAIT_SELLER_SEND_GOODS' || $trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS' )
			{
				//调用订单模型的payOrder方法设置订单状态为已付款
				#$order_obj->payOrder($trade_no, 'alipay');
				//调用财务模型的addAccount方法支付订单
				$account_obj = new AccountModel();
				$account_obj->addAccount($user_id, 1, $pay_total_amount, '订单付款，支付宝充入', $order_id, $trade_no);
				$account_obj->addAccount($user_id, 5, $pay_total_amount * -1, '订单付款扣款', $order_id, $trade_no);

				//记录支付方式
				$arr = array(
					'pay_tag'		=> 'mobile_alipay',
					'payway_name'	=> '支付宝',
					'pay_code'		=> $trade_no,
				);
				$order_obj = new OrderModel($order_id);
				$order_obj->setOrderInfo($arr);
				$order_obj->saveOrderInfo();
				return 1;
			}
			else
			{
				return false;
			}
		}
		elseif ($pay_type == 'voucher')
		{
			//检验是否已处理，若已处理，直接返回false
			$account_obj = new AccountModel();
			$is_handled = $account_obj->checkPayCodeExists($trade_no);
			if ($is_handled)
			{
				//已处理，直接返回false
				return false;
			}

			//获取user_id
			$user_id = $row_dd[2];

			$account_obj = new AccountModel();
            $total_fee = $pay_total_amount * $GLOBALS['config_info']['RMB_EXCHANGE_PROP_ALIPAY'];
			if ($trade_status == 'WAIT_SELLER_SEND_GOODS')
			{
				//调用账户模型的addAccount充值等额预存款金额
				$account_obj->addAccount($user_id, 1, $total_fee, '支付宝充值', 0, $trade_no);
				log_file($account_obj->getLastSql());
				return 2;
			}
			else if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS' )
			{
				//调用账户模型的addAccount充值等额预存款金额
				$account_obj->addAccount($user_id, 1, $total_fee, '支付宝充值', 0, $trade_no);
				log_file($account_obj->getLastSql());
				return 2;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
    }
}
