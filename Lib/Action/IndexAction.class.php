<?php
class IndexAction extends FrontAction
{
	function _initialize() 
	{
		if (ACTION_NAME != 'js')
		{
			parent::_initialize();
		}
	}

	//wx-js
	function js()
	{
		//获取jsapi-ticket
		Vendor('Wxin.WeiXin');
		$appid = C('appid');
		$secret = C('appsecret');
		$wx_obj = new WxApi();
		$access_token = WxApi::getAccessToken($appid, $secret);
		$result = $wx_obj->getJsapiTicket($access_token);
		$ticket = $result['ticket'];
$user_id = intval(session('user_id'));
$user_obj = new UserModel($user_id);
$arr = array(
	'ticket'	=> $ticket
);
$user_obj->setUserInfo($arr);
$user_obj->saveUserInfo();
		$url = 'http://' . $_SERVER['HTTP_HOST'] . '/Index/js';
		vendor('wxpay.WxPayPubHelper');
		$address_obj = new Address();
		$params = $address_obj->getParametersAll($ticket, $url, $appid);
#echo "<pre>";
#print_r($params);
#die;
		$this->assign('params', $params);
log_file($params['signature']);
		$this->assign('head_title', '微信JS-SDK测试');
		$this->display();
	}

	//unserialize
	function unserialize()
	{
		if (isset($_POST['submit']))
		{
			echo "<pre>反序列化值：";
			print_r(unserialize($_POST['str']));
		}
		$this->display();
	}

	//解析json
	function parse_json()
	{
		print_r(json_decode('{"code":42037,"error_msg":"\u62a2\u5355\u5931\u8d25"}', true));
		if (isset($_POST['submit']))
		{
			echo "<pre>json值：";
			print_r(json_decode($_POST['str']), true);
		}
		$this->display();
	}

	//MD5测试
	function getmd5()
	{
		if (isset($_POST['submit']))
		{
			echo "<h1>MD5值：" . md5($_POST['str']) . "</h1>";
		}
		$this->display();
	}

	//静态页跳转方法
	function redirect($url)
	{
		if (!empty($_POST))
		{
			redirect($url);
		}
	}

	//首页
	public function index()
	{
		redirect(U('/FrontGuess/guess_index'));
	}
}
