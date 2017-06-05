<?php
class AppApiModel extends ApiModel
{
	/**
	 * 检查更新接口
	 * @author 姜伟
	 * @param array $params 参数列表
	 * @return 成功返回'绑定成功'，失败退出返回错误码
	 * @todo 检查更新接口
	 */
	function checkUpdating($params)
	{
		$version = $params['version'];
		$system = '';
		$suffix = '';
		//获取客户端操作系统
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(strpos($agent, 'iphone') || strpos($agent, 'ipad'))
		{
			$system = 'ios';
			$suffix = '.ipa';
		}
		#elseif(strpos($agent, 'android'))
		else
		{
			$system = 'android';
			$suffix = '.apk';
		}
		//$system = 'ios';
		//$suffix = '.ipa';

		if (!$system)
		{
			ApiModel::returnResult(-1, null, '系统错误');
		}

		//转化为数字进行比较
		$version = intval(str_replace('.', '', $version));
		$system_version = intval(str_replace('.', '', $GLOBALS['config_info'][strtoupper($system . '_version')]));

		if ($version < $system_version)
		{
			return C('IMG_DOMAIN') . '/Uploads/pandorabox_' . $system . '_' . $GLOBALS['config_info'][strtoupper($system . '_version')] . $suffix;
		}
		else
		{
			return null;
		}
	}

	/**
	 * 获取参数列表
	 * @author 姜伟
	 * @param 
	 * @return 参数列表 
	 * @todo 获取参数列表
	 */
	function getParams($func_name)
	{
		$params = array(
			'checkUpdating'	=> array(
				array(
					'field'		=> 'version', 
					'type'		=> 'string', 
					'required'	=> true, 
					'miss_code'	=> 41057, 
					'empty_code'=> 44057, 
					'type_code'	=> 45057, 
				),
			),
		);

		return $params[$func_name];
	}
}
