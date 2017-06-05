<?php
/**
 * 消息推送模型类
 */

class PushModel extends Model
{
    // 消息id
    public $push_id;

    /**
     * 构造函数
     * @author 姜伟
     * @param $push_id 消息推送ID
     * @return void
     * @todo 初始化消息推送id
     */
    public function PushModel($push_id)
    {
        if ($push_id = intval($push_id))
		{
            $this->push_id = $push_id;
		}
    }

    /**
     * 推送消息给用户
     * @author 姜伟
     * @param int $user_id
     * @param string $opt refund订单退款(退款通知模板)，accept商家接单/镖师抢单(服务接单通知模板)，reject商家拒单/无镖师抢单(预定失败通知模板)
     * @param array $msg
     * @return int $message_id
     * @todo 推送消息给用户
     */
    public static function wxPush($user_id, $opt, $msg)
    {
log_file('user_id = ' . $user_id, 'push');
		//获取用户微信openid
		$user_obj = new UserModel($user_id);
		$user_info = $user_obj->getUserInfo('openid');
		$openid = $user_info['openid'];
		$template_id = '';
		$url = $msg['order_id'] ? C('DOMAIN') . '/FrontOrder/order_detail/order_id/' . $msg['order_id'] : $msg['url'];
		#$url = 'http://' . 'msd.yurtree.com' . '/FrontOrder/order_detail/order_id/' . $msg['order_id'];
		$topcolor = '#FF0000';
		$remark = isset($msg['remark']) ? $msg['remark'] : '点击查看详情';

		$wx_templates = C('TEMPLATES');
		switch($opt)
		{
			case 'new_rec_user':
				$template_id = $wx_templates[$opt];	//新会员加入通知
$template_id = 'ngqIpbwh8bUfcSsECmogfXcV14J0tQlEpBO27izEYtY';
				$data = array(
					'touser'	=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'keyword1'	=> array(
							'value'	=> $msg['keyword1'],
							'color'	=> '#FF0000',
						),
						'keyword2'	=> array(
							'value'	=> $msg['keyword2'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;

			case 'rec_user_pay':
				$template_id = $wx_templates[$opt];	//新用户支付通知
				$data = array(
					'touser'		=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'keyword1'	=> array(
							'value'	=> $msg['keyword1'],
							'color'	=> '#FF0000',
						),
						'keyword2'	=> array(
							'value'	=> $msg['keyword2'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;
			case 'deposit_succeed':
				$template_id = $wx_templates[$opt];		//提现成功通知
				$data = array(
					'touser'		=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'money'	=> array(
							'value'	=> $msg['money'],
							'color'	=> '#FF0000',
						),
						'timet'	=> array(
							'value'	=> $msg['timet'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;
			case 'deposit_fail':
				$template_id = $wx_templates[$opt];		//提现失败
				$data = array(
					'touser'		=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'money'	=> array(
							'value'	=> $msg['money'],
							'color'	=> '#FF0000',
						),
						'timet'	=> array(
							'value'	=> $msg['timet'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;

			case 'reserve':
				$template_id = $wx_templates[$opt];	//通知   roll中奖 and treasure 
				$data = array(
					'touser'	=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'keyword1'	=> array(
							'value'	=> $msg['keyword1'],
							'color'	=> '#FF0000',
						),
						'keyword2'	=> array(
							'value'	=> $msg['keyword2'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;
			case 'deliver':
				$template_id = $wx_templates[$opt];	//发货通知
				$data = array(
					'touser'	=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'keyword1'	=> array(
							'value'	=> $msg['keyword1'],
							'color'	=> '#FF0000',
						),
						'keyword2'	=> array(
							'value'	=> $msg['keyword2'],
							'color'	=> '#FF0000',
						),
						'keyword3'	=> array(
							'value'	=> $msg['keyword3'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;
			case 'alert':
				$template_id = $wx_templates[$opt];	//发货通知
				$data = array(
					'touser'	=> $openid,
					'template_id'	=> $template_id,
					'url'			=> $url,
					'topcolor'		=> $topcolor,
					'data'			=> array(
						'first'	=> array(
							'value'	=> $msg['first'],
							'color'	=> '#FF0000',
						),
						'keyword1'	=> array(
							'value'	=> $msg['keyword1'],
							'color'	=> '#FF0000',
						),
						'keyword2'	=> array(
							'value'	=> $msg['keyword2'],
							'color'	=> '#FF0000',
						),
						'remark'	=> array(
							'value'	=> $remark,
							'color'	=> '#FF0000',
						),
					),
				);
				break;
			default:
				break;
		}

		log_file('push_user: ' . 'opt = ' . $opt . ', data = ' . json_encode($data));
trace(json_encode($data));
		$appid = C('APPID');
		$secret = C('APPSECRET');
log_file('send_template_msg0', 'subscribe');
if (ACTION_NAME != 'mp_event')
{
		vendor('Wxin.WeiXin');
}
		$access_token = WxApi::getAccessToken($appid, $secret);
log_file('send_template_msg', 'subscribe');
		$weixin_obj = new WxApi($access_token);
		$result = $weixin_obj->send_template_msg($data);
trace($result);
		$success = $result['errcode'] == 0 ? true : false;

		return $success;
	}
}
