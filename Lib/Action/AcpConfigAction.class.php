<?php
/**
 * 系统设置
 * 
 *
 */
class AcpConfigAction extends AcpAction {


	/**
     * 构造函数
     * @return void
     * @todo
     */
	public function AcpConfigAction()
	{
		parent::_initialize();
		#require_once('Common/func_sms.php');
	}

	/**
	 * @access public
     * @todo 高级设置
     * @return void
     * @author 姜伟
     */
	public function advanced_setting()
	{
		$act = $this->_post('act');
		if($act == 'save')		//提交保存时
		{
			$planter_online_time = $this->_post('planter_online_time');
			$planter_visit_time_interval = $this->_post('planter_visit_time_interval');
			$item_num_per_sort	= $this->_post('item_num_per_sort');
			$item_num_per_page	= $this->_post('item_num_per_page');
			$item_num_per_my_plant_page	= $this->_post('item_num_per_my_plant_page');
			$item_num_per_collect_page	= $this->_post('item_num_per_collect_page');
			$item_num_per_recharge_log_page	= $this->_post('item_num_per_recharge_log_page');

			if(!$planter_online_time || $planter_online_time == '')
			{
				$this->error('对不起, 种植机在线定义不能为空，请填写！',get_url());
			}

			if(!ctype_digit($planter_online_time))
			{
				$this->error('对不起, 种植机在线定义必须为整数，请重新填写！',get_url());
			}

			if(!$planter_visit_time_interval || $planter_visit_time_interval == '')
			{
				$this->error('对不起, 种植机请求时间间隔不能为空，请填写！',get_url());
			}

			if(!ctype_digit($planter_visit_time_interval) || !($planter_visit_time_interval <= 9999 && $planter_visit_time_interval >= 500) )
			{
				$this->error('对不起, 种植机请求时间间隔必须为整数，且在500-9999范围内，请重新填写！',get_url());
			}

			if(!$item_num_per_sort || $item_num_per_sort == '')
			{
				$this->error('对不起, 商城首页每分类显示商品数不能为空，请填写！',get_url());
			}

			if(!ctype_digit($item_num_per_sort))
			{
				$this->error('对不起, 商城首页每分类显示商品数必须为整数，请重新填写！',get_url());
			}

			if(!$item_num_per_page || $item_num_per_page == '')
			{
				$this->error('对不起, 商城列表页每页显示商品数不能为空，请填写！',get_url());
			}

			if(!ctype_digit($item_num_per_page))
			{
				$this->error('对不起, 商城列表页每页显示商品数必须为整数，请重新填写！',get_url());
			}

			if(!$item_num_per_my_plant_page || $item_num_per_my_plant_page == '')
			{
				$this->error('对不起, 我种植的植物每页记录数不能为空，请填写！',get_url());
			}

			if(!ctype_digit($item_num_per_my_plant_page))
			{
				$this->error('对不起, 我种植的植物每页记录数必须为整数，请重新填写！',get_url());
			}

			if(!$item_num_per_collect_page || $item_num_per_collect_page == '')
			{
				$this->error('对不起, 我的收藏每页显示记录数不能为空，请填写！',get_url());
			}

			if(!ctype_digit($item_num_per_collect_page))
			{
				$this->error('对不起, 我的收藏每页显示记录数必须为整数，请重新填写！',get_url());
			}

			if(!$item_num_per_recharge_log_page || $item_num_per_recharge_log_page == '')
			{
				$this->error('对不起, 充值/财务明细每页记录不能为空，请填写！',get_url());
			}

			if(!ctype_digit($item_num_per_recharge_log_page))
			{
				$this->error('对不起, 充值/财务明细每页记录必须为整数，请重新填写！',get_url());
			}

			$data = array(
					'planter_online_time'			=>	$planter_online_time,
					'planter_visit_time_interval'	=>	$planter_visit_time_interval,
					'item_num_per_sort'				=>	$item_num_per_sort,
					'item_num_per_page'				=>	$item_num_per_page,
					'item_num_per_my_plant_page'	=>	$item_num_per_my_plant_page,
					'item_num_per_collect_page'		=>	$item_num_per_collect_page,
					'item_num_per_recharge_log_page'=>	$item_num_per_recharge_log_page,
			);
			
			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfigs($data);
			if ($planter_visit_time_interval != $GLOBALS['config_info']['PLANTER_VISIT_TIME_INTERVAL'])
			{
				//如果修改了种植机访问时间间隔，更新内存中的command
				PlanterModel::flushKey('time_interval', sprintf('%04d', $planter_visit_time_interval));
			}
			$this->success('恭喜你，设置成功!', '/AcpConfig/advanced_setting');
		}
		
		$this->assign('head_title','高级设置');
		$this->assign('config',$this->system_config);
		$this->display();
	}

	/**
	 * @access public
     * @todo 基础资料设置 tp_config表中需要设置的参数
     * @return void
     * @author zhoutao@360shop.cc  zhoutao0928@sina.com
     */
	public function base_config()
	{
		$act = $this->_post('act');
		if($act == 'save')		//提交保存时
		{
			$shop_name 					= $this->_post('s_name');
			$customer_service_telephone = $this->_post('service_tel');
			$customer_service_email		= $this->_post('service_email');
			$customer_service_fax		= $this->_post('service_fax');
			$system_open				= $this->_post('sys_open');
			$system_close_reason		= $this->_post('close_reason');
			$company_name			    = $this->_post('company_name');
			$customer_service_address	= $this->_post('customer_service_address');
			$real_price_name			= $this->_post('real_price_name');
			$mall_price_name			= $this->_post('mall_price_name');
			$system_money_name			= $this->_post('system_money_name');
			$complaints_hotline			= $this->_post('complaints_hotline');
			$order_hotline				= $this->_post('order_hotline');
			$service_hotline			= $this->_post('service_hotline');
			$official_record			= $this->_post('official_record');
			$sms_uid			= $this->_post('sms_uid');
			$sms_key			= $this->_post('sms_key');
			$customer_service_qq		= $this->_post('customer_service_qq');
            $system_logo            = $this->_post('system_logo'); //用户登录大图
            $qr_code                = $this->_post('qr_code'); //用户登录大图
            $draw_prop              = $this->_post('draw_prop'); //
            $rmb_exchange_prop      = $this->_post('rmb_exchange_prop'); //兑换
            $alipay                 = $this->_post('alipay'); //转账账号
            $limit_recharge_money   = $this->_post('limit_recharge_money'); //最低充值金额
            $max_champion_bat       = $this->_post('max_champion_bat'); //最高投注
            $rmb_exchange_prop_alipay     = $this->_post('rmb_exchange_prop_alipay'); //支付宝兑换
            $rmb_exchange_prop_wxpay      = $this->_post('rmb_exchange_prop_wxpay'); //微信兑换
            $week_alert = $this->_post('week_alert'); //微信兑换


			if(!$shop_name || $shop_name == '')
			{
				$this->error('对不起,店铺名称不能为空！',get_url());
			}

			

			//保存验证码短信模板
			//$sms_set_obj = new SMSSetModel();
			//$sms_set_obj->setSMSSettingByTag('verify_code', $verify_code_sms_tpl);

			$system_close_reason = $system_close_reason?$system_close_reason:'啊,亲,太不巧了！由于累了所以我要休息一会儿，O(∩_∩)O~。很快就会回来哦！';
			$data = array(
					'shop_name'						=>	$shop_name,
					'customer_service_telephone'	=>	$customer_service_telephone,
					'customer_service_email'		=>	$customer_service_email,
					'customer_service_fax'			=>	$customer_service_fax,
					'system_open'					=>	$system_open,
					'system_close_reason'			=>	$system_close_reason,
					'company_name' 					=> $company_name,
					'customer_service_address' 		=> $customer_service_address,
					'real_price_name'				=> $real_price_name,
					'mall_price_name'				=> $mall_price_name,
					'system_money_name'				=> $system_money_name,
					'complaints_hotline'			=> $complaints_hotline,
					'order_hotline'					=> $order_hotline,
					'service_hotline'				=> $service_hotline,
					'official_record'				=> $official_record,
					'customer_service_qq'			=> $customer_service_qq,
                    'system_logo'         => $system_logo,
                    'qr_code'         => $qr_code,
                    'sms_uid'         => $sms_uid,
                    'sms_key'         => $sms_key,
                    'draw_prop'       => $draw_prop,
                    'rmb_exchange_prop'       => $rmb_exchange_prop,
                    'alipay'       => $alipay,
                    'limit_recharge_money'       => $limit_recharge_money,
                    'max_champion_bat'       => $max_champion_bat,
                    'rmb_exchange_prop_wxpay'    => $rmb_exchange_prop_wxpay,
                    'rmb_exchange_prop_alipay'   => $rmb_exchange_prop_alipay,
                    'week_alert'   => $week_alert,

			);
			
			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfigs($data);
			$this->success('恭喜你，参数设置成功了!', '/AcpConfig/base_config/mod_id/0');
		}
		 //用户登录大图
        //$system_logo_path = $this->system_config['SYSTEM_LOGO']? APP_PATH . $this->system_config['SYSTEM_LOGO']: false;
        //if($system_logo_path) $this->assign('system_logo_path', $system_logo_path);

        //$qr_code_path = $this->system_config['QR_CODE']? APP_PATH . $this->system_config['QR_CODE']: false;
        $this->assign('qr_code_path', C('IMG_DOMAIN') . $this->system_config['QR_CODE']);
	
		$config = $this->system_config;
		$this->assign('head_title','基础设置');
		$this->assign('config',$this->system_config);
		$this->display();
	}

	/**
	 * @access public
     * @todo 分销设置 tp_config表中需要设置的参数
     * @return void
     * @author jiangwei
     */
	public function fenxiao_config()
	{
		$act = $this->_post('act');
		if($act == 'save')		//提交保存时
		{
			$is_fenxiao_open = $this->_post('is_fenxiao_open');
			$fenxiao_level = $this->_post('fenxiao_level');
			$first_level_agent_rate = $this->_post('first_level_agent_rate');
			$second_level_agent_rate = $this->_post('second_level_agent_rate');
			$third_level_agent_rate	= $this->_post('THIRD_LEVEL_AGENT_RATE');

			if(!$fenxiao_level || !is_numeric($fenxiao_level) || ($fenxiao_level < 1 || $fenxiao_level > 3))
			{
				$this->error('对不起，分销级数请填写1-3的整数!',get_url());
			}

			if(!$first_level_agent_rate || (!is_numeric($first_level_agent_rate) && !is_float($first_level_agent_rate)))
			{
				$this->error('对不起，一级代理提成请填写整数或小数!',get_url());
			}

			if(!$second_level_agent_rate || (!is_numeric($second_level_agent_rate) && !is_float($second_level_agent_rate)))
			{
				$this->error('对不起，二级代理提成请填写整数或小数!',get_url());
			}

			if(!$third_level_agent_rate || (!is_numeric($third_level_agent_rate) && !is_float($third_level_agent_rate)))
			{
				$this->error('对不起，三级代理提成请填写整数或小数!',get_url());
			}

			$data = array(
				'fenxiao_level'				=> $fenxiao_level,
				'first_level_agent_rate'	=> $first_level_agent_rate,
				'second_level_agent_rate'	=> $second_level_agent_rate,
				'third_level_agent_rate'	=> $third_level_agent_rate,
			);
			
			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfigs($data);
			$this->success('恭喜你，参数设置成功了!', '/AcpConfig/base_config/mod_id/0');
		}
	
		$config = $this->system_config;
		$this->assign('head_title','分销设置');
		$this->assign('config',$this->system_config);
		$this->display();
	}

	/**
	 * @access public
	 * @todo 配置短信相关设置
	 * @return void
	 * @author zhoutao@360shop.cc  zhoutao0928@sina.com
	 */
	public function sms_config()
	{
		$SMSModel = new SMSModel();
		
		$act = $this->_post('act');
		if($act == 'ajaxset')		//进行异步设置
		{
			$send_name = $this->_post('type');
			$state	   = $this->_post('state');
			$to_admin  = $this->_post('to_admin');
			$sms_text  = $this->_post('sms_text');
			$state 	   = $state?$state:0;
			$to_admin  = $to_admin?$to_admin:0;
			if(!$send_name || !$sms_text)
			{
				exit(json_encode(array('type'=>-1,'message'=>'参数错误')));
			}
			$data = array(
					'state'		=>	$state,
					'to_admin'	=>	$to_admin,
					'sms_text'	=>	$sms_text
			);
			if($SMSModel->setSMSSetting($send_name,$data))
			{
				exit(json_encode(array('type'=>1,'message'=>'恭喜你，设置成功！')));
			}
			exit(json_encode(array('type'=>-1,'message'=>'对不起，设置失败,数据可能未作修改！')));
		}
		elseif($act == 'set_all')
		{
			//订单创建
			$order_create_state    = $this->_post('order_create_state');
			$order_create_to_admin = $this->_post('order_create_to_admin');
			$order_create_sms_text = $this->_post('now_order_create');
			$order_create = array(
					'state'		=>	$order_create_state,
					'to_admin'	=>	$order_create_to_admin,
					'sms_text'	=>	$order_create_sms_text
			);
			
			//订单确认
			$order_check_state    = $this->_post('order_check_state');
			$order_check_to_admin = $this->_post('order_check_to_admin');
			$order_check_sms_text = $this->_post('now_order_check');
			$order_check = array(
					'state'		=>	$order_check_state,
					'to_admin'	=>	$order_check_to_admin,
					'sms_text'	=>	$order_check_sms_text
			);
			
			//订单支付
			$order_pay_state	 = $this->_post('order_pay_state');
			$order_pay_to_admin  = $this->_post('order_pay_to_admin');
			$order_pay_sms_text	 = $this->_post('now_order_pay');
			$order_pay = array(
					'state'		=>	$order_pay_state,
					'to_admin'	=>	$order_pay_to_admin,
					'sms_text'	=>	$order_pay_sms_text
			);
			
			//订单发货
			$order_ship_state	 = $this->_post('order_ship_state');
			$order_ship_to_admin = $this->_post('order_ship_to_admin');
			$order_ship_sms_text = $this->_post('now_order_ship');
			$order_ship = array(
					'state'		=>	$order_ship_state,
					'to_admin'	=>	$order_ship_to_admin,
					'sms_text'	=>	$order_ship_sms_text
			);
			
			//用户修改密码
			$set_psw_state 		 = $this->_post('set_psw_state');
			$set_psw_to_admin	 = $this->_post('set_psw_to_admin');
			$set_psw_sms_text	 = $this->_post('now_set_psw');
			$set_psw = array(
					'state'		=>	$set_psw_state,
					'to_admin'	=>	$set_psw_to_admin,
					'sms_text'	=>	$set_psw_sms_text
			);
			
			//2014-05-08 zhoutao 由于注册时不能获取用户的手机号码，注释掉了注册时的短信发送
			$user_reg_sms_text = true;
// 			//用户注册时
// 			$user_reg_state 	 = $this->_post('user_reg_state');
// 			$user_reg_to_admin	 = $this->_post('user_reg_to_admin');
// 			$user_reg_sms_text	 = $this->_post('now_user_reg');
// 			$user_reg = array(
// 					'state'		=>	$user_reg_state,
// 					'to_admin'	=>	$user_reg_to_admin,
// 					'sms_text'	=>	$user_reg_sms_text
// 			);
			
			//管理员登录时
			$admin_login_state	 = $this->_post('admin_login_state');
			$admin_login_to_admin = $this->_post('admin_login_to_admin');
			$admin_login_sms_text = $this->_post('now_admin_login');
			$admin_login = array(
					'state'		=>	$admin_login_state,
					'to_admin'	=>	$admin_login_to_admin,
					'sms_text'	=>	$admin_login_sms_text
			);
			
			if(!$order_create_sms_text || !$order_check_sms_text || !$order_ship_sms_text || !$order_pay_sms_text || !$set_psw_sms_text || !$user_reg_sms_text || !$admin_login_sms_text)
			{
				$this->error('对不起，存在空的短信模板，请在检查后重新保存。',get_url());
			}
			//保存短信设置
			$SMSModel->setSMSSetting('order_create',$order_create);		
			$SMSModel->setSMSSetting('order_check',$order_check);
			$SMSModel->setSMSSetting('order_pay',$order_pay);
			$SMSModel->setSMSSetting('order_ship',$order_ship);
			$SMSModel->setSMSSetting('set_psw',$set_psw);
			#$SMSModel->setSMSSetting('user_reg',$user_reg);		//2014-05-08 zhoutao 注释掉
			$SMSModel->setSMSSetting('admin_login',$admin_login);
			
			$sms_open	= $this->_post('open');
			$sms_open 	= $sms_open?1:0;
			$sms_mobile = $this->_post('sms_mobile');
			require_once('Lib/Model/ConfigBaseModel.class.php');
			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfig('sms_open', $sms_open);
			$ConfigBaseModel->setConfig('sms_mobile',$sms_mobile);
			$this->success('恭喜你，设置保存成功！',get_url());
		}
		elseif($act == 'test_send')			//测试发送短信
		{
			$mobile = $this->_post('mobile');
			if(!checkMobile($mobile))
			{
				exit(json_encode(array('type'=>-1,'message'=>'请输入正确的手机号！')));
			}
			$result = $SMSModel->sendSMS($mobile, '这是一条短信');
			if(!$result['status'])	//发送失败时
			{
				exit(json_encode(array('type'=>-1,'message'=>'对不起，发送失败!')));
			}
			exit(json_encode(array('type'=>1,'message'=>'恭喜你，测试短信已经发送成功!')));
			
		}
		
		
		$r = $SMSModel->getSMSSettingList();  	//获取短信配置项
		$arr = array();
		foreach($r as $v)
		{
			$k = $v['send_name'];
			$arr[$k] = $v;
		}
		$smsId = (int) $GLOBALS['config_info']['SMS_API'];
		$client_id = (int) $GLOBALS['config_info']['CLIENT_ID'];
		//获取剩余短信数量
		$SMSLeftTotal = $SMSModel->getSMSLeftNumber();
		$config = $this->system_config;
		
		$this->assign('sms_open',$config['SMS_OPEN']);
		$this->assign('sms_mobile',$config['SMS_MOBILE']);
		$this->assign('left_total',$SMSLeftTotal);
		$this->assign('sms_config',$arr);
		$this->assign('head_title','短信设置');
		$this->display();
	}

	/**
     * 友情链接列表
     * @author 姜伟
     * @return void
     * @todo 从link表取数据
     */
	public function list_link()
	{
		$link = new LinkModel();
		$linkList = $link->getAllLinkListPage();
	//	echo "<pre>";
	//	print_r($linkList);die;
		
		if($linkList && is_array($linkList))
		{
			$pagination = array_pop($linkList);
			foreach($linkList as $key => $val)
			{
				$linkList[$key]['link_name'] = mbSubStr($val['link_name'], 15);
				$linkList[$key]['link_url'] = mbSubStr($val['link_url'], 30);
			}
			
			$this->assign('pagination', $pagination);
			$this->assign('link_list', $linkList);
		}
		
		$this->assign('head_title', '友情链接列表');
		$this->display();
	}

	/**
     * 添加友情链接
     * @author 姜伟
     * @return void
     * @todo 把数据写进tp_link表
     */
	public function add_link()
	{
		$act = $this->_post('act');
		if($act == 'submit')
		{
			$linkName 	  = $this->_post('link_name');
			$linkUrl 	  = $this->_post('link_url');
			$imgUrl 	  = $this->_post('img_url');
			$serial 	  = $this->_post('serial');
			$isUse 		  = $this->_post('isuse');
			$isBottomShow = $this->_post('is_bottom_show');
			
			if(!$linkName)
			{
				$this->error('请输入网站名称！');
			}
			if(!$linkUrl)
			{
				$this->error('请输入网站地址！');
			}
			else
			{
				if(!preg_match('/^http/i', $linkUrl))
				{
					$this->error('请输入带协议的完整URL地址！');
				}
				elseif(!preg_match(C('URL_PREG'), $linkUrl))
				{
					$this->error('请输入有效的URL地址！');
				}
			}
			if($serial && !ctype_digit($serial))
			{
				$this->error('请输入纯数字的排序号！');
			}
			if(!ctype_digit($isUse) || !ctype_digit($isBottomShow))
			{
				$this->error('非法参数！');
			}
			
			$data = array(
				'is_bottom_show' => $isBottomShow,
				'link_name' 	 => $linkName,
				'link_url' 		 => $linkUrl,
				'link_logo' 	 => $imgUrl,
				'serial' 		 => $serial,
				'isuse' 		 => $isUse
			);
			
			$link = new LinkModel();
			if($link->addLink($data))
			{
				$this->success('恭喜您，友情链接添加成功！', '/AcpConfig/list_link');
			}
			else
			{
				$this->error('对不起，友情链接添加失败，请稍后重试！');
			}
		}
		
		$this->assign('action_title', '友情链接列表');
		$this->assign('action_src', '/AcpConfig/list_link/mode_id/0');
		$this->assign('head_title', '添加友情链接');
		$this->display();
	}

	/**
     * 修改友情链接
     * @author 姜伟
     * @return void
     * @todo 修改tp_link表数据
     */
	public function edit_link()
	{
		$id = $this->_get('id');
		$act = $this->_post('act');
		$link = new LinkModel();
		
		if($act == 'submit')
		{
			$linkName 	  = $this->_post('link_name');
			$linkUrl 	  = $this->_post('link_url');
			$imgUrl 	  = $this->_post('img_url');
			$serial 	  = $this->_post('serial');
			$isUse 		  = $this->_post('isuse');
			$isBottomShow = $this->_post('is_bottom_show');
			
			if(!$linkName)
			{
				$this->error('请输入网站名称！');
			}
			if(!$linkUrl)
			{
				$this->error('请输入网站地址！');
			}
			else
			{
				if(!preg_match('/^http/i', $linkUrl))
				{
					$this->error('请输入带协议的完整URL地址！');
				}
				elseif(!preg_match(C('URL_PREG'), $linkUrl))
				{
					$this->error('请输入有效的URL地址！');
				}
			}
			if($serial && !ctype_digit($serial))
			{
				$this->error('请输入纯数字的排序号！');
			}
			if(!ctype_digit($isUse) || !ctype_digit($isBottomShow))
			{
				$this->error('非法参数！');
			}
			
			$data = array(
				'is_bottom_show' => $isBottomShow,
				'link_name' 	 => $linkName,
				'link_url' 		 => $linkUrl,
				'link_logo' 	 => $imgUrl,
				'serial' 		 => $serial,
				'isuse' 		 => $isUse
			);
			
			if(false !== $link->editLink($id, $data))
			{
				$this->success('恭喜您，友情链接修改成功！', '/AcpConfig/list_link');
			}
			else
			{
				$this->error('对不起，友情链接修改失败，请稍后重试！');
			}
		}
		
		if(!$id || !ctype_digit($id))
		{
			$this->error('非法参数！', '/AcpConfig/list_link');
		}
		$linkInfo = $link->getLink($id);
		if(!$linkInfo)
		{
			$this->error('无效ID！', '/AcpConfig/list_link');
		}
		
		$this->assign('link_info', $linkInfo);
		
		$this->assign('action_title', '友情链接列表');
		$this->assign('action_src', '/AcpConfig/list_link/mod_id/0');
		$this->assign('head_title', '修改友情链接');
		$this->display();
	}

	/**
     * 删除友情链接
     * @author 姜伟
     * @return void
     * @todo 删除tp_link表数据
     */
	public function del_link()
	{
		$this->display();
	}

	/**
     * 顶部菜单列表
     * @author 姜伟
     * @return void
     * @todo 从tp_menu表列出数据
     */
	public function list_menu()
	{
		//引入语言包
		require_lang();
		global $lang;

		//获得菜单类型
		$config_model = new ConfigBaseModel();
		$menu_list = $config_model->getMenuList();

		//引入文章分类模型
		$article_model = new ArticleCategoryModel();

		foreach ($menu_list AS $temp => $value)
		{
			$menu_list[$temp]['menu_type'] = $lang['top_menu_type'][$value['menu_type']];

			if ($value['menu_type'] == MENU_TYPE_ARTICLE_CLASS)
			{
				$menu_list[$temp]['link_id'] = $article_model->getClassField($value['link_id'], 'article_sort_name');
			}
			else if ($value['menu_type'] == MENU_TYPE_OUT_LINK)
			{
				$menu_list[$temp]['link_id'] = $value['out_url'];
			}
		}

		$this->assign('top_menu_list', $menu_list);
		$this->assign('head_title', '头部菜单设置');
		$this->display();
	}

	/**
     * 添加顶部菜单
     * @author 姜伟
     * @return void
     * @todo 插入tp_menu表数据
     */
	public function add_menu()
	{
		//保存修改
		$action = $this->_post('action');
		if($action == 'add')
		{
			$title 		= $this->_post('title');
			$menu_type 	= $this->_post('menu_type');
			$link_id 	= $this->_post('link_id');
			$limit_total= $this->_post('limit_total');
			$out_url 	= $this->_post('out_url');
			$target 	= $this->_post('target');
			$serial 	= $this->_post('serial');
			$isuse 		= $this->_post('isuse');

			//表单验证
			if(!$title)
			{
				$this->error('请填写菜单显示文字~', '__APP__/AcpConfig/add_menu');
			}
			if(!$menu_type)
			{
				$this->error('请选择菜单类型~',  '__APP__/AcpConfig/add_menu');
			}

			$path_img = '';
			// 上传图片
			if ($upData = uploadImg())
			{
				$path_img = $upData['pic_url'];
			}

			$data['title']   		= $title;
			$data['menu_type'] 		= $menu_type;
			$data['link_id'] 	   	= $link_id;
			$data['limit_total'] 	= $limit_total;
			$data['out_url'] 		= $out_url;
			$data['target']    		= $target;
			$data['path_img'] 		= $path_img;
			$data['serial'] 		= $serial;
			$data['isuse'] 			= $isuse;

			$generalArticle = new ConfigBaseModel();
			if($id = $generalArticle->addMenu($data))
			{
				$this->success('恭喜您，菜单项添加成功~', '__APP__/AcpConfig/list_menu');
			}
			else
			{
				$this->error('对不起，菜单项添加失败~', '__APP__/AcpConfig/add_menu');
			}
		}

		//获得菜单类型
		$menu_type = new ConfigBaseModel();
		$menu_type_list = $menu_type->getMenuType();
		$this->assign('menu_type_options', $menu_type_list);

		//获得商品分类
		$item_list_options = array();
		$item_class = new ClassModel();
		$item_list = $item_class->getClassList();
		foreach ($item_list AS $temp=>$value)
		{
			if (!$value['class_id']) continue;
			$item_list_options[$value['class_id']] = $value['class_name'];
		}

		$this->assign('item_list_options', $item_list_options);

		//获得文章分类
		$article_class = new ArticleCategoryModel();
		$article_list = $article_class->getArticleCategoryList();
		$article_list_options = array();
		foreach ($article_list AS $temp=>$value)
		{
			if (!$value['article_sort_id']) continue;
			$article_list_options[$value['article_sort_id']] = $value['article_sort_name'];
		}
		$this->assign('article_list_options', $article_list_options);

		//获取归大的serialID
		$max_serial = $menu_type->getMaxMenuSerial();
		$this->assign('max_serial', $max_serial+1);

		$this->assign('action_title', '头部菜单设置');
		$this->assign('action_src', '/AcpConfig/list_menu/mod_id/0');
		$this->assign('head_title', '添加头部菜单');
		$this->display();
	}

	/**
     * 修改顶部菜单
     * @author 姜伟
     * @return void
     * @todo 修改tp_menu表数据
     */
	public function edit_menu()
	{
		$id = $this->_request('id');
		$action = $this->_post('action');

		//保存入库
		if($action == 'edit')
		{
			$title 		= $this->_post('title');
			$menu_type 	= $this->_post('menu_type');
			$link_id 	= $this->_post('link_id');
			$limit_total= $this->_post('limit_total');
			$out_url 	= $this->_post('out_url');
			$target 	= $this->_post('target');
			$serial 	= $this->_post('serial');
			$isuse 		= $this->_post('isuse');

			//表单验证
			if(!$title)
			{
				$this->error('请填写菜单显示文字~', '__APP__/AcpConfig/add_menu');
			}
			if(!$menu_type)
			{
				$this->error('请选择菜单类型~',  '__APP__/AcpConfig/add_menu');
			}

			// 上传图片
			if ($upData = uploadImg())
			{
				$path_img = $upData['pic_url'];
				$data['path_img'] 		= $path_img;
			}

			$data['title']   		= $title;
			$data['menu_type'] 		= $menu_type;
			$data['link_id'] 	   	= $link_id;
			$data['limit_total'] 	= $limit_total;
			$data['out_url'] 		= $out_url;
			$data['target']    		= $target;
			$data['serial'] 		= $serial;
			$data['isuse'] 			= $isuse;

			$generalArticle = new ConfigBaseModel();
			if($generalArticle->editMenu($id, $data))
			{
				$this->success('恭喜您，菜单项修改成功~', '__APP__/AcpConfig/edit_menu/id/' . $id);
			}
			else
			{
				$this->error('对不起，菜单项修改失败~', '__APP__/AcpConfig/edit_menu/id/' . $id);
			}
		}

		//显示详情
		$config_model = new ConfigBaseModel();
		$menu_ary = $config_model->getMenu($id);
		$this->assign('menu_ary', $menu_ary);

		//获得菜单类型
		$menu_type = new ConfigBaseModel();
		$menu_type_list = $menu_type->getMenuType();
		$this->assign('menu_type_options', $menu_type_list);

		//获得商品分类
		$item_list_options = array();
		$item_class = new ClassModel();
		$item_list = $item_class->getClassList();
		foreach ($item_list AS $temp=>$value)
		{
			if (!$value['class_id']) continue;
			$item_list_options[$value['class_id']] = $value['class_name'];
		}

		$this->assign('item_list_options', $item_list_options);

		//获得文章分类
		$article_class = new ArticleCategoryModel();
		$article_list = $article_class->getArticleCategoryList();
		$article_list_options = array();
		foreach ($article_list AS $temp=>$value)
		{
			if (!$value['article_sort_id']) continue;
			$article_list_options[$value['article_sort_id']] = $value['article_sort_name'];
		}
		$this->assign('article_list_options', $article_list_options);
		$this->assign('action_title', '头部菜单设置');
		$this->assign('action_src', '/AcpConfig/list_menu/mod_id/0');
		$this->assign('head_title', '修改头部菜单');
		$this->display();
	}

	/**
     * 删除顶部菜单
     * @author 姜伟
     * @return void
     * @todo 从tp_menu删除该行数据
     */
	public function del_menu()
	{
		$this->display();
	}

	/**
     * 设置微信在线客服的账号
     * @author 姜伟
     * @return void
     * @todo 把数据写进tp_customer_server_online表
     */
	public function set_weixin_service_account()
	{
		$act = $this->_post('act');
		$config = new ConfigBaseModel();
		$customerServiceOnline = new CustomerServiceOnlineModel();
		if($act == 'submit')
		{
			$_post = $this->_post();
			$onlineDisplay = $_post['online_display'];
			$data = $_post['data'];
		//	echo "<pre>";
		//	print_r($data);die;
			
			$totalInsert = 0;//待插入数
			$totalUpdate = 0;//待更新数
			$successInsert = 0;//插入成功数
			$successUpdate = 0;//更新成功数
			foreach($data as $key => $val)
			{
				foreach($val as $k => $v)
				{
					$v['service_type'] = $key;
					if(!$v['customer_service_online_id'])
					{
						$totalInsert++;
						if($customerServiceOnline->addCustomerServiceOnlice($v))
						{
							$successInsert++;
						}
					}
					else
					{
						$totalUpdate++;
						if(false !== $customerServiceOnline->editCustomerServiceOnlice($v['customer_service_online_id'], $v))
						{
							$successUpdate++;
						}
					}
				}
			}
			if($totalInsert == $successInsert && $totalUpdate == $successUpdate)
			{
				$this->success('恭喜您，客服设置成功！');
			}
			else
			{
				$this->error('对不起，客服设置失败，请稍后重试！');
			}
		}
		$customerServiceOnlineList = $customerServiceOnline->getCustomerServiceOnlineList();
		if($customerServiceOnlineList)
		{
			foreach($customerServiceOnlineList as $key => $val)
			{
				switch($val['service_type'])
				{
					case 1:
						$customerServiceOnlineListGroup[$val['service_type']][] = $val;
						break;
					case 2:
						$customerServiceOnlineListGroup[$val['service_type']][] = $val;
						break;
					case 3:
						$customerServiceOnlineListGroup[$val['service_type']][] = $val;
						break;
				}
			}
		}
		else
		{
			$customerServiceOnlineListGroup[1][] = array();
			$customerServiceOnlineListGroup[2][] = array();
			$customerServiceOnlineListGroup[3][] = array();
		}
		#echo "<pre>";
		#print_r($customerServiceOnlineListGroup);
		#die;

		$this->assign('customer_service_online_list_group', $customerServiceOnlineListGroup);
		
		$this->assign('head_title', '在线客服帐号管理');
		$this->display();
	}
	
	/**
     * 设置在线客服的账号
     * @author 姜伟
     * @return void
     * @todo 把数据写进tp_customer_server_online表
     */
	public function set_service_account()
	{
		$act = $this->_post('act');
		$config = new ConfigBaseModel();
		$customerServiceOnline = new CustomerServiceOnlineModel();
		if($act == 'submit')
		{
			$_post = $this->_post();
			$onlineDisplay = $_post['online_display'];
			$data = $_post['data'];
		//	echo "<pre>";
		//	print_r($data);die;
			
			$totalInsert = 0;//待插入数
			$totalUpdate = 0;//待更新数
			$successInsert = 0;//插入成功数
			$successUpdate = 0;//更新成功数
			foreach($data as $key => $val)
			{
				foreach($val as $k => $v)
				{
					$v['service_type'] = $key;
					if(!$v['customer_service_online_id'])
					{
						$totalInsert++;
						if($customerServiceOnline->addCustomerServiceOnlice($v))
						{
							$successInsert++;
						}
					}
					else
					{
						$totalUpdate++;
						if(false !== $customerServiceOnline->editCustomerServiceOnlice($v['customer_service_online_id'], $v))
						{
							$successUpdate++;
						}
					}
				}
			}
			
			if(false === $config->setConfig('online_display', $onlineDisplay))
			{
				if($onlineDisplay == 'block')
				{
					$this->error(0, null, '对不起，在线客服启用失败，请稍后重试！');
				}
				elseif($onlineDisplay == 'none')
				{
					$this->error(0, null, '对不起，在线客服禁用失败，请稍后重试！');
				}
			}
			if($totalInsert == $successInsert && $totalUpdate == $successUpdate)
			{
				$this->success('恭喜您，客服设置成功！', '/AcpConfig/set_service_account');
			}
			else
			{
				$this->error('对不起，客服设置失败，请稍后重试！');
			}
		}
		$onlineDisplay = $config->getConfig('online_display');
		$customerServiceOnlineList = $customerServiceOnline->getCustomerServiceOnlineList();
		if($customerServiceOnlineList)
		{
			foreach($customerServiceOnlineList as $key => $val)
			{
				switch($val['service_type'])
				{
					case 1:
						$customerServiceOnlineListGroup[$val['service_type']][] = $val;
						break;
					case 2:
						$customerServiceOnlineListGroup[$val['service_type']][] = $val;
						break;
				}
			}
		}
		else
		{
			$customerServiceOnlineListGroup[1][] = array();
			$customerServiceOnlineListGroup[2][] = array();
		}
	//	echo "<pre>";
	//	print_r($customerServiceOnlineListGroup);die;
		
		$this->assign('online_display', $onlineDisplay);
		$this->assign('customer_service_online_list_group', $customerServiceOnlineListGroup);
		
		$this->assign('head_title', '在线客服帐号管理');
		$this->display();
	}
	
	/**
	 * @access public
	 * @todo 短信充值
	 * @author zhoutao@360shop.cc zhoutao0928@sina.com
	 * @return void
	 */
	
	public function sms_pay()
	{
		$act = $this->_post('act');
		$az = new AzModel();
		$az_id = intval($GLOBALS['install_info']['az_id']);
		$user_left_sms_total = $az->__call_api('get_sms_total_by_az_id', array('az_id'=>$az_id));	//客户当前还剩余的可发短信总数
		$this->assign('left_sms_total',$user_left_sms_total);
		
		if ($act == 'pay')
		{
			//充值金额
			$total_fee = $this->_post('total_fee');
			if (!$total_fee)
			{
				$this->error('对不起，请填写充值金额');
			}
			$total_fee = floatval($total_fee);
			if ($total_fee < 0.01)
			{
				$this->error('对不起，充值金额不得小于0.01元');
			}
	
			//支付方式
			$payway_id = intval($this->_post('payway_id'));
			if (!$payway_id)
			{
				$this->error('对不起，请选择支付方式');
			}
			
			$sms_total = 0;		//要充值的总条数
			switch ($total_fee)	//这里当前写死了（2014-05-04）
			{
				case 50:
					$sms_total = 500;
					break;
				case 100:
					$sms_total = 1200;
					break;
				case 200:
					$sms_total = 2500;
					break;
				case 500:
					$sms_total = 7800;
					break;
				default:
					$sms_total = 0;
			}
			
			$smsId = (int) $GLOBALS['config_info']['SMS_API'];	//短信接口ID（az库中tp_sms表）
			$param_ary = array(
					'id' => $smsId
			);
			$result = $az->__call_api('get_sms_total', $param_ary);		//系统当前短信剩余的总条数(az系统数据库中的短信池中的剩余总数)
			if($sms_total > $result)	//此情况出现的几率非常低（系统余剩的短信量已经不够客户本次充值）
			{
				$this->error('对不起，当前不能充值，请您速联系"360shop客服人员"',get_url());
			}
			
			//获取支付方式的pay_tag
			$payway_obj = new PaywayModel();
			$payway_info = $payway_obj->getPaywayInfoById($payway_id);
			$pay_tag = $payway_info['pay_tag'];
			
			if ($pay_tag == 'alipay')
			{
				$payment_obj = new AlipayModel();
				$link = $payment_obj->pay_code(0, $total_fee,0, true);
				$qr_pay_mode_link = $payment_obj->pay_code(0, $total_fee, 1, true);
				$this->assign('qr_pay_mode_link', $qr_pay_mode_link);
				$this->assign('links', $link);
			}
			elseif ($pay_tag == 'chinabank')
			{
				$payment_obj = new ChinabankModel();
				$parameter = $payment_obj->pay_code(0, $total_fee, 0, true);
				$this->assign('parameter', $parameter);
			}
	
			$this->assign('amount', $total_fee);
			$this->assign('pay_tag', $pay_tag);
	
			#//调用支付宝模型的pay_code获取支付链接
			#$alipay_obj = new AlipayModel();
			#$link = $alipay_obj->pay_code(0, $total_fee);
			#redirect($link);
		}
		/*if ($act == 'voucher')
		{
		//充值金额
		$total_fee = $this->_post('total_fee');
		if (!$total_fee)
		{
		$this->error('对不起，请填写充值金额');
		}
		$total_fee = floatval($total_fee);
		if ($total_fee < 0.01)
		{
		$this->error('对不起，充值金额不得小于0.01元');
		}
	
		//调用支付宝模型的pay_code获取支付链接
		$alipay_obj = new AlipayModel();
		$link = $alipay_obj->pay_code(0, $total_fee, 1);
		redirect($link);
		}*/
	
		//获取支付方式列表
		$payway_obj = new PaywayModel();
		$payway_list = $payway_obj->getPaywayList();
		$this->assign('payway_list', $payway_list);#myprint($payway_list);
	
		$payway_info['pay_desc'] = html_entity_decode($payway_info['pay_desc']);
		$this->assign('payway_info', $payway_info);
		$this->assign('pay_tag', $pay_tag);
		
		
		$this->assign('head_title', '短信充值');
		$this->display();
		
		// 		require_once('Common/func_sms.php');	//测试用代码（在支付成功后执行的操作）
		// 		myprint(sms_recharge(50));
	}
	

	
	/**
	 * 支付宝付款成功后的回调页面
	 * @author zt
	 * @param void
	 * @return void
	 * @todo 调用支付宝支付模型验证来源可靠性后，获取订单号，调用订单模型的payOrder方法设置订单状态为已付款
	 */
	public function alipay_response()
	{
		$alipay_obj = new AlipayModel();
		$return_state = $alipay_obj->pay_response();
		if ($return_state == 2)
		{
			$total_fee = $_GET['total_fee'];	//充值的总额
			require_once('Common/func_sms.php');
			$sms_total = sms_recharge($total_fee);	//为客户充值的短信数量
			
			//短信充值日志的记录
			$account = new AccountModel();
			$account->addSMSPayLog($_GET['out_trade_no'],1,$total_fee,$sms_total);
			
			$this->success('恭喜您，充值成功', '/AcpConfig/sms_config/mod_id/0');
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
		if ($return_state == 2)
		{
			$this->success('恭喜您，充值成功', '/AcpConfig/sms_config/mod_id/0');
		}
		else
		{
			$this->error('对不起，非法访问', U('/'));
		}
	}

	/**
     * 设置前台轮播图片
     * @author 姜伟
     * @return void
     * @todo 设置前台轮播图片
     */
	public function set_cust_flash()
	{
		$act = $this->_post('act');
		if ($act == 'add')
		{
			if (count($_POST['pic']) == 0)
			{
				$this->error('抱歉，请至少上传一张图片');
			}

			$pic_str = implode(';', $_POST['pic']);
			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfig('cust_flash_list', $pic_str);
			$this->success('恭喜您，设置成功！');
			#echo $pic_str . "<br>";
			#echo strlen($pic_str);
			#echo "<pre>";
			#print_r($_POST);
			#die;
		}

		$cust_flash_list = $GLOBALS['config_info']['CUST_FLASH_LIST'];
		$cust_flash_list = explode(';', $cust_flash_list);
		$this->assign('cust_flash_list', $cust_flash_list);
		$this->display();
	}

	/**
     * 设置关注时推送的图文
     * @author 姜伟
     * @return void
     * @todo 设置关注时推送的图文
     */
	public function subscribe_set()
	{
		$act = $this->_post('act');
		if($act == 'set')		//提交保存时
		{
			$subscribe_title 	= $this->_post('subscribe_title');
			$subscribe_link 	= $this->_post('subscribe_link');
			$subscribe_pic 		= $this->_post('img_url');
			$subscribe_content 	= $this->_post('subscribe_content');
			
			if(!$subscribe_title)
			{
				$this->error('对不起，请填写图文标题',get_url());
			}

			if(!$subscribe_link)
			{
				$this->error('对不起，请填写图文链接',get_url());
			}

			if(!$subscribe_pic)
			{
				$this->error('对不起，请填写图文缩略图',get_url());
			}

			if(!$subscribe_content)
			{
				$this->error('对不起，请填写图文简述',get_url());
			}

			$data = array(
				'subscribe_title'	=> $subscribe_title,
				'subscribe_link'	=> $subscribe_link,
				'subscribe_pic'		=> $subscribe_pic,
				'subscribe_content'	=> $subscribe_content,
			);

			$ConfigBaseModel = new ConfigBaseModel();
			$ConfigBaseModel->setConfigs($data);
			$this->success('设置成功!');
		}
	
		$config = $this->system_config;
		$this->assign('head_title','新用户关注推送图文设置');
		$this->assign('config',$this->system_config);
		$this->display();
	}

	/**
     * 修改密码
	 * @param void
     * @return void
     * @todo
     */
	public function set_password()
	{
		$act = $this->_post('act');
		if ($act == 'save')
		{
			$user_id = intval(session('user_id'));
			$old_password = $this->_post('old_password');
			$this->assign('old_password', $old_password);
			$new_password = $this->_post('new_password');
			$this->assign('new_password', $new_password);
			$confirm_password = $this->_post('confirm_password');
			$this->assign('confirm_password', $confirm_password);
			if (!$old_password)
			{
				$this->error('请输入旧密码');
			}

			if (!$new_password)
			{
				$this->error('请输入新密码');
			}

			if (strlen($new_password) < 6)
			{
				$this->error('密码长度不得小于6位');
			}

			if ($confirm_password != $new_password)
			{
				$this->error('验证密码和新密码必须一致');
			}

			//验证旧密码
			$user_obj = new UserModel($user_id);
			$user_info = $user_obj->getUserInfo('user_id', 'user_id = ' . $user_id . ' AND password = "' . MD5($old_password) . '"');
			if (!$user_info)
			{
				$this->error('旧密码不正确');
			}

			//修改密码
			$arr = array(
				'password' => MD5($new_password)
			);
			$user_obj->setUserInfo($arr);
			$success = $user_obj->saveUserInfo();
			if ($success)
			{
				$this->success('修改成功');
			}
			else
			{
				$this->error('修改失败');
			}
		}

		$this->assign('head_title', '修改密码');
		$this->display(APP_PATH . 'Tpl' . DS . MODULE_NAME . DS . ACTION_NAME . '.html');
	}

    /**
     * 满减优惠
     * @author wzg
     */
    public function shopping_fare()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $base_fare = I('base_fare', 0.00, 'float');
            $full_cost = I('full_cost', 0.00, 'float');

            $arr = array(
                'base_fare' => $base_fare,
                'full_cost' => $full_cost,
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '运费设置');
        $this->display();
    }

    //test up_token
    public function test()
    {
        $this->assign();
        $this->display();
    }

	/**
	 * 菜单和界面设置
	 */
	public function menu_set() 
	{
		$custom    		= M('custom');
		$industry_custom= M('industry_custom');
		$message   		= M('message');
		$cust_page 		= M('cust_page');
		$template_page 	= M('template_page');

		//获取商户的自定义菜单
		$tag         = 0;
		$custom_info = array(
			'name'	=> '111',
		);
		$custom_info = json_decode('[{"id":"5129","p_id":"1","name":"\u4ea7\u54c1\u5c55\u793a","value":"","type":"","obj_name":"","page_name":"","template_page_id":"0","data_name":"","template_page_name":"","sort":null},{"id":"5130","p_id":"1","name":"\u4f18\u60e0\u6d3b\u52a8","value":"\/FrontCoupon\/coupon_list","type":1,"obj_name":"FrontCouponAction","page_name":"","template_page_id":"7","data_name":"\/FrontCoupon\/coupon_list","template_page_name":null,"sort":null},{"id":"5131","p_id":"1","name":"\u65b0\u95fb\u52a8\u6001","value":"","type":"","obj_name":"","page_name":"","template_page_id":"0","data_name":"","template_page_name":"","sort":[{"id":"5132","p_id":"5131","name":"\u65b0\u95fb\u5217\u8868","value":"\/FrontArticle\/article_list","type":1,"obj_name":"FrontArticleAction","page_name":"article_list","template_page_id":"48","template_page_name":"\u7f8e\u98df\u7c7b\u6587\u7ae0\u5217\u8868\u6a21\u677f","data_name":"\/FrontArticle\/article_list"},{"id":"5133","p_id":"5131","name":"\u5e86\u795d\u4e24\u5cb87\u5468\u5e74","value":"\/FrontArticle\/article_display\/id\/111.html","type":1,"obj_name":"FrontArticleAction","page_name":"article_display","template_page_id":"65","template_page_name":"\u6e05\u65b0\u552f\u7f8e\u7c7b\u6587\u7ae0\u8be6\u60c5\u6a21\u677f","data_name":"\/FrontArticle\/article_display\/id\/111.html"}]}]', true);
		$custom_info = json_decode('{"button":[{"type":"view","name":"\u5546\u57ce","url":"http:\/\/b2c.beyondin.com"},{"type":"view","name":"\u4e2a\u4eba","url":"http:\/\/b2c.beyondin.com\/FrontUser\/personal_center"},{"name":"\u5e2e\u52a9","sub_button":[{"type":"click","name":"\u5ba2\u670d","key":"customer_service"},{"type":"view","name":"\u5e2e\u52a9\u4e2d\u5fc3","url":"http:\/\/b2c.beyondin.com\/FrontHelp\/help_list"},{"type":"view","name":"\u5173\u4e8e","url":"http:\/\/b2c.beyondin.com\/FrontHelp\/about"},{"type":"view","name":"\u4e13\u5c5e\u63a8\u5e7f\u4e8c\u7ef4\u7801","url":"http:\/\/b2c.beyondin.com\/FrontUser\/my_qr_code"}]}]}', true);
		$custom_info = $custom_info['button'];
		//获取当前数据库中的设置
		#$wx_menu_obj = M('wx_menu');
		#$custom_info = $wx_menu_obj->where()->getField('wx_menu');
		#$custom_info = json_decode($custom_info, true);
		#echo "<pre>";
		#print_r($custom_info);
		#die;

		//判断用户是否设置过菜单,没有就获取默认的菜单

		$this->assign('custom_info', $custom_info);
		$this->assign('menu_length', count($custom_info));
#echo'<pre>';
#print_r($custom_info);				
#die;
		$select_type = array(
			'view'		=> '跳转网址',
			'media_id'	=> '推送图文',
			'click'		=> '自动回复',
			'4'			=> '自定义页面',
		);
		$this->assign('select_type', $select_type);
		
		//TITLE中的页面标题
		$this->assign('head_title', '菜单和界面设置');
		$this->display();
	}

	/**
	* 保存菜单设置
	*/
	public function save_platform()
	{
		$az_id         = $GLOBALS['install_info']['az_id'];
		$platform_info = $this->_post('platform_info');

		//因为tp框架接收json会把数据过滤了所以要把json数据反过滤一下
		$platform_info = html_entity_decode($platform_info);
		log_file($platform_info, 'aaa', true);
		$platform_info = str_replace('\\', '', $platform_info);
		$platform_arr  = json_decode($platform_info, true);
		//log_file($platform_arr, 'aaa', true);
		//dump($platform_arr, true);
		//更新到数据库
		$arr = array(
			'wx_menu' => json_encode($platform_arr)
		);
		$wx_menu_obj = M('wx_menu');
		$num = $wx_menu_obj->count();
		if ($num)
		{
			$wx_menu_obj->where('')->save($arr);
		}
		else
		{
			$wx_menu_obj->add($arr);
		}
		log_file($wx_menu_obj->getLastSql(), 'aaa', true);

		$custom        = M('custom');
		//删除可与原有的菜单
		$custom->where('az_id = ' . $az_id)->delete();
//print_r($platform_arr);die();
		//存入新菜单数据
		$new_platform_arr_a = array();
		$new_platform_arr_b = array();
		
		if(is_array($platform_arr))
		{
			$i = 0;
			foreach ($platform_arr as $key => $value)
			{
				$new_platform_arr_a['az_id'] = $az_id;
			    $new_platform_arr_a['p_id']  = 1;
				$new_platform_arr_a['name']  = $value['name'];
				$new_platform_arr_a['custom_value'] = $value['value'];
				$new_platform_arr_a['custom_type'] 	= $value['type'];
				$new_platform_arr_a['obj_name'] 	= $value['obj_name'];
				$new_platform_arr_a['page_name']    =  $value['page_name'];
				$new_platform_arr_a['template_page_id'] =  $value['template_page_id'];
				$new_platform_arr_a['serial'] 	        = $i;
				//添加顶级
				$p_id = $custom->add($new_platform_arr_a);
//P($new_platform_arr_a);
				$j    = 0;
				foreach ($platform_arr[$i]['sorts'] as $key_b => $value_b)
				{
					$new_platform_arr_b['az_id'] = $az_id;
					$new_platform_arr_b['p_id']  = $p_id;
					$new_platform_arr_b['name']  = $value_b['name'];
					$new_platform_arr_b['custom_value'] = $value_b['value'];
					$new_platform_arr_b['custom_type'] 	= $value_b['type'];
					$new_platform_arr_b['obj_name'] 	= $value_b['obj_name'];
					$new_platform_arr_b['page_name']        =  $value_b['page_name'];
					$new_platform_arr_b['template_page_id'] =  $value_b['template_page_id'];
					$new_platform_arr_b['serial'] 	        = $j;
//print_r($new_platform_arr_b);
					//添加子级
					$custom->add($new_platform_arr_b);
					$j++;
				}
				$i++;
			}

			exit(json_encode(array('code' => '200', 'msg' => '恭喜您,菜单保存成功!')));
		}
		else
		{
			exit(json_encode(array('code' => '400', 'msg' => '对不起,菜单信息错误!')));
		}
	}

	/**
	* 调用支付宝接口创建菜单
	*/
	public function add_platform()
	{
		$is_create_alipay_custom = $GLOBALS['install_info']['is_create_alipay_custom'];
		$az_id                   = $GLOBALS['install_info']['az_id'];
		$act                     = $this->_request('act');

		if($act == 'add_platform')
		{
			$custom      = M('custom');

			//获取商户的自定义菜单
			$custom_info = array();
			$custom_row  = $custom->where('az_id = ' . $az_id . ' AND p_id = 1')
								  ->field('id, name, custom_value as actionParam, custom_type as actionType')
								  ->order('serial')
								  ->select();
								  
			//组织创建菜单的数据结构
			if(is_array($custom_row))
			{
				$menu = array();
				$i = 0;
				foreach ($custom_row as $key => $value)
				{
					$menu[$i]['name'] = $value['name'];
					if ($value['actionType'] == 'link' || $value['actionType'] == 'cust_link')
					{
						//只有一级菜单
						$menu[$i]['type'] = 'view';
						if (!substr_count($custom_row[$i]['actionParam'],'http')) 
						{
							$menu[$i]['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $value['actionParam'];
						}
						unset($custom_row[$i]['actionParam']);
						unset($custom_row[$i]['actionType']);
						$i ++;
						continue;
					}
					
					//有二级菜单
					$sort_row = $custom->where('p_id = ' . $value['id'])
										->field('name, custom_value as actionParam, custom_type as actionType')
										->order('serial')
										->select();

					$sub_menu = array();
					if (is_array($sort_row))
					{
						$j = 0;
						foreach ($sort_row as $key => $value_b)
						{
							if ($value_b['actionType'] == 'link' || $value_b['actionType'] == 'cust_link')
							{
								$sub_menu[$j]['type'] = 'view';
								$sub_menu[$j]['name'] = $value_b['name'];
								if (!substr_count($sort_row[$j]['actionParam'],'http')) 
								{
									$sub_menu[$j]['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $sort_row[$j]['actionParam'];
								}
							}	

							$j++;
						}
						unset($custom_row[$i]['actionParam']);
						unset($custom_row[$i]['actionType']);
						$menu[$i]['sub_button'] = $sub_menu;

					}
					unset($custom_row[$i]['id']);
					$custom_info['button'] =  $custom_row;
					$i++;
				}
				$new_menu = array(
					'button' => $menu
				);
				unset($menu);

				$platform_model = M('platform');
				$platform_info = $platform_model->field('appid, appsecret, access_token, refresh_token, expires_in, create_time')->where('isuse = 1 AND platform_type = 2 AND az_id = ' . $az_id)->find();
				if (!$platform_info)
				{
					exit(json_encode(array('code' => '300', 'msg' => '对不起, 请先完成公众平台接口设置!')));
				}

				#echo "<pre>";
				#print_r($platform_info);
				#die;
				//获取商家接口信息
				$appid = $platform_info['appid'];
				$secret = $platform_info['appsecret'];
				Vendor('Wxin.WeiXin');
				$access_token = WxApi::getAccessToken($appid, $secret);
				$wxapi_obj = new WxApi($access_token);
				$result = $wxapi_obj->menu_create($new_menu);
				#$result = $wxapi_obj->menu_get();
				#echo "<pre>";
				#print_r($result);
				#echo "</pre>";
				#echo "menu<pre>";
				#print_r($new_menu);
				#echo "<pre>";
				#print_r($custom_row);
				#die;

				if (isset($result['errcode']) && $result['errcode'] == 0)
				{
					exit(json_encode(array('code' => '200', 'msg' => '恭喜您，菜单已同步到您的微信公众号！')));
				}
				else
				{
					exit(json_encode(array('code' => '301', 'msg' => '对不起，菜单创建失败，请稍后再试！')));
				}
			}
			else
			{
				exit(json_encode(array('code' => '400', 'msg' => '对不起,您还未设置菜单信息!')));
			}

		}
	}

    /**
     * 设置邮箱信息
     * @author wzg
     */
    public function set_email()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $mail_address = I('mail_address');
            $mail_loginname = I('mail_loginname');
            $mail_smtp = I('mail_smtp');
            $mail_password = I('mail_password');
            $fromname = I('fromname');

            $arr = array(
                'mail_address' => $mail_address,
                'mail_loginname' => $mail_loginname,
                'mail_smtp' => $mail_smtp,
                'mail_password' => $mail_password,
                'fromname' => $fromname,
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '邮箱设置');
        $this->display();
    }

    /**
     * 暂时关闭充值 
     * @author wzg
     */
    public function close_recharge()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $close_start_time = I('close_start_time');
            $close_end_time = I('close_end_time');
            $is_close = I('is_close');
            $close_recharge_alert = I('close_recharge_alert');

            $arr = array(
                'close_end_time' => strtotime($close_end_time),
                'close_start_time' => strtotime($close_start_time),
                'is_close'       => $is_close,
                'close_recharge_alert' => $close_recharge_alert,
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '暂时关闭充值');
        $this->display();
    }


    /**
     * 暂时关闭兑换 
     * @author wzg
     */
    public function close_exchange()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $close_exchange_start_time = I('close_exchange_start_time');
            $close_exchange_end_time = I('close_exchange_end_time');
            $is_exchange_close = I('is_exchange_close');
            $close_exchange_alert = I('close_exchange_alert');

            $arr = array(
                'close_exchange_end_time' => strtotime($close_exchange_end_time),
                'close_exchange_start_time' => strtotime($close_exchange_start_time),
                'is_exchange_close'       => $is_exchange_close,
                'close_exchange_alert' => $close_exchange_alert,
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '暂时关闭兑换');
        $this->display();
    }

    /**
     * 关闭/开启 充值返利上级
     * 设置 返利比例
     * @author wzg
     */
    public function set_recharge_back()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $is_recharge_back_close = I('is_recharge_back_close');
            $close_recharge_back_alert = I('close_recharge_back_alert');
            $recharge_back_pro = I('recharge_back_pro', 0.00, 'float');

            if (!$recharge_back_pro) {
                //$this->error('请填写正确的返利比例');
            }

            $arr = array(
                'is_recharge_back_close'       => $is_recharge_back_close,
                'close_recharge_back_alert'    => $close_recharge_back_alert,
                'recharge_back_pro'            => $recharge_back_pro
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '设置充值返利');
        $this->display();
    }


    /**
     * 关闭 夺宝
     * @author wzg
     */
    public function close_treasure()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $is_treasure_close = I('is_treasure_close');

            $arr = array(
                'is_treasure_close'       => $is_treasure_close,
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '关闭夺宝');
        $this->display();
    }


    
    //每天推送消息
    public function push_information()
    {
        $act = I('act', '', 'strip_tags');
        $config_obj = new ConfigBaseModel();
        if ('save' == $act) {
            $is_push = I('is_push', 0, 'int');
            $push_time = I('push_time');
            $push_title = I('push_title', '', 'strip_tags');
            $push_content = I('push_content', '', 'strip_tags');

            $arr = array(
                'is_push' => $is_push,
                'push_time' => strtotime($push_time),
                'push_title' => $push_title,
                'push_content' => $push_content,
            );
            $success = $config_obj->setConfigs($arr);

            if ($success) {
                $this->success('设置成功');
            }
            $this->error('设置失败');
        }
        $this->assign('head_title', '每日推送提醒');
        $this->display();
    }
}
?>
