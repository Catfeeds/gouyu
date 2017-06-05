<?php
/**
 * 管理员权限数组
 * 
 * id 为权限唯一标识符
 * name 为权限或菜单对应的名字
 * mod_do_url 为对应的网址，其中do必须以acp_开头
 * in_menu 当此为空时表示本身就是左侧菜单；不为空时，其值必须是id，此id就是当' . C('USER_NAME') . '处于此权限页面时对应左侧菜单的特殊显示的权限id
 * 
 * ID规则：第一级为01至99的数字；
 *        第二级为0101至9999的数字，其中前两位为上级ID值；
 *        第三级为010101至999999的数字，其中最前面两位为顶级ID值，中间两位为上级ID值；
 *        以此类推
 */
$admin_menu_file = array();

$_mod_id    = 0;
$_sort_id   = 10;

$admin_menu_file[$_mod_id] = array('id' => $_sort_id, 'mod_name' => 'System', 'name' => '系统管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpConfig/base_config');
$admin_menu_file[$_mod_id]['menu_list'] = array(
    '基础设置'  => array(
        array('id' => $_sort_id.'01', 'name' => '欢迎页面', 'mod_do_url' => '/Acp/index', 'in_menu' => ''),
        array('id' => $_sort_id.'02', 'name' => '基础设置', 'mod_do_url' => '/AcpConfig/base_config', 'in_menu' => ''),
        array('id' => $_sort_id.'05', 'name' => '邮箱设置', 'mod_do_url' => '/AcpConfig/set_email', 'in_menu' => ''),
        array('id' => $_sort_id.'03', 'name' => '定时关闭充值', 'mod_do_url' => '/AcpConfig/close_recharge', 'in_menu' => ''),
        array('id' => $_sort_id.'04', 'name' => '定时关闭商城', 'mod_do_url' => '/AcpConfig/close_exchange', 'in_menu' => ''),
        array('id' => $_sort_id.'74', 'name' => '关闭夺宝', 'mod_do_url' => '/AcpConfig/close_treasure', 'in_menu' => ''),
        array('id' => $_sort_id.'76', 'name' => '每天消息提醒', 'mod_do_url' => '/AcpConfig/push_information', 'in_menu' => ''),
        array('id' => $_sort_id.'70', 'name' => '充值返利设置', 'mod_do_url' => '/AcpConfig/set_recharge_back', 'in_menu' => ''),
		array('id' => $_sort_id.'71', 'name' => '支付方式设置', 'mod_do_url' => '/AcpPayment/list_payment', 'in_menu' => ''),	//OK-DONE
		array('id' => $_sort_id.'72', 'name' => '支付宝支付方式设置', 'mod_do_url' => '/AcpPayment/set_alipay', 'in_menu' => $_sort_id.'71'),	//OK-DONE
		array('id' => $_sort_id.'75', 'name' => '支付宝最新支付方式设置', 'mod_do_url' => '/AcpPayment/set_mobile_wap_alipay', 'in_menu' => $_sort_id.'71'),	//OK-DONE
		array('id' => $_sort_id.'73', 'name' => '微信支付设置', 'mod_do_url' => '/AcpPayment/set_wxpay', 'in_menu' => $_sort_id.'71'),//OK-DONE
    ),
	'管理员与权限'	=> array(																						//OK-DONE
		array('id' => $_sort_id.'06', 'name' => '管理员列表', 'mod_do_url' => '/AcpRole/list_admin', 'in_menu' => ''),
		array('id' => $_sort_id.'07', 'name' => '添加管理员', 'mod_do_url' => '/AcpRole/add_admin', 'in_menu' => $_sort_id.'06'),
		array('id' => $_sort_id.'08', 'name' => '修改管理员', 'mod_do_url' => '/AcpRole/edit_admin', 'in_menu' => $_sort_id.'06'),
		array('id' => $_sort_id.'09', 'name' => '删除管理员', 'mod_do_url' => '/AcpRole/del_admin', 'in_menu' => $_sort_id.'06'),
		array('id' => $_sort_id.'10', 'name' => '激活/禁用管理员', 'mod_do_url' => '/AcpRole/set_admin', 'in_menu' => $_sort_id.'06'),
		array('id' => $_sort_id.'11', 'name' => '恢复已删除管理员', 'mod_do_url' => '/AcpRole/hf_admin', 'in_menu' => $_sort_id.'06'),
		array('id' => $_sort_id.'12', 'name' => '角色列表', 'mod_do_url' => '/AcpRole/list_role', 'in_menu' => ''),
		array('id' => $_sort_id.'13', 'name' => '添加角色', 'mod_do_url' => '/AcpRole/add_role', 'in_menu' => $_sort_id.'12'),
		array('id' => $_sort_id.'14', 'name' => '修改角色', 'mod_do_url' => '/AcpRole/edit_role', 'in_menu' => $_sort_id.'12'),
		array('id' => $_sort_id.'15', 'name' => '删除角色', 'mod_do_url' => '/AcpRole/del_role', 'in_menu' => $_sort_id.'12'),
		array('id' => $_sort_id.'16', 'name' => '激活/禁用角色', 'mod_do_url' => '/AcpRole/set_admin_group', 'in_menu' => $_sort_id.'12'),
		array('id' => $_sort_id.'17', 'name' => '恢复已删除角色', 'mod_do_url' => '/AcpRole/hf_admin_group', 'in_menu' => $_sort_id.'12'),
	),
	'轮播图'	=> array(
		array('id' => $_sort_id.'20', 'name' => '轮播图片列表', 'mod_do_url' => '/AcpCustFlash/get_cust_flash_list', 'in_menu' => ''),//OK-DONE
		array('id' => $_sort_id.'21', 'name' => '添加轮播图片', 'mod_do_url' => '/AcpCustFlash/add_cust_flash', 'in_menu' => ''),//OK-DONE
		array('id' => $_sort_id.'22', 'name' => '修改轮播图片', 'mod_do_url' => '/AcpCustFlash/edit_cust_flash', 'in_menu' => $_sort_id.'20'),//OK-DONE
		array('id' => $_sort_id.'23', 'name' => '删除轮播图片', 'mod_do_url' => '/AcpCustFlash/del_cust_flash', 'in_menu' => $_sort_id.'20'),//OK-DONE
	),

	// '友情链接'	=> array(
	// 	array('id' => '0118', 'name' => '友情链接列表', 'mod_do_url' => '/AcpConfig/list_link', 'in_menu' => ''),
	// 	array('id' => '0119', 'name' => '添加友情链接', 'mod_do_url' => '/AcpConfig/add_link', 'in_menu' => '0125', 'in_top' => '0'),
	// 	array('id' => '0120', 'name' => '修改友情链接', 'mod_do_url' => '/AcpConfig/edit_link', 'in_menu' => '0125', 'in_top' => '0'),
	// ),
);


$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'User', 'name' => '用户管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpUser/get_all_user_list');
$admin_menu_file[$_mod_id]['menu_list'] = array(
	C('USER_NAME') . '管理'	=> array(
		array('id' => $_sort_id.'01', 'name' => C('USER_NAME') . '列表', 'mod_do_url' => '/AcpUser/get_all_user_list', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'02', 'name' => '用户详情页', 'mod_do_url' => '/AcpUser/user_detail', 'in_menu' => $_sort_id . '01'),//OK-CC
		array('id' => $_sort_id.'03', 'name' => '推广员列表', 'mod_do_url' => '/AcpUser/extend_user', 'in_menu' => $_sort_id . '01'),//OK-CC
		array('id' => $_sort_id.'04', 'name' => '推广收益周最佳', 'mod_do_url' => '/AcpUser/recharge_back_most_by_week', 'in_menu' =>'' ),//
		array('id' => $_sort_id.'05', 'name' => '上周红黑榜', 'mod_do_url' => '/AcpUser/get_week_times', 'in_menu' =>'' ),//
	),
	// C('USER_NAME') . '统计'	=> array(
	// 	array('id' => '0203', 'name' => C('USER_NAME') . '注册日统计', 'mod_do_url' => '/AcpUser/user_reg_stat_by_day', 'in_menu' => ''),
	// 	array('id' => '0207', 'name' => C('USER_NAME') . '注册月统计', 'mod_do_url' => '/AcpUser/user_reg_stat_by_month', 'in_menu' => ''),
	// 	array('id' => '0208', 'name' => C('USER_NAME') . '注册年统计', 'mod_do_url' => '/AcpUser/user_reg_stat_by_year', 'in_menu' => ''),
	// 	array('id' => '0210', 'name' => C('USER_NAME') . '消费统计', 'mod_do_url' => '/AcpUser/user_consume_stat', 'in_menu' => ''),
	// ),
	//C('USER_NAME') . '等级'	=> array(
	//	array('id' => $_sort_id.'30', 'name' => C('USER_NAME') . '等级列表', 'mod_do_url' => '/AcpUser/get_user_rank_list', 'in_menu' => ''),//OK-DONE
	//	array('id' => $_sort_id.'31', 'name' => '添加' . C('USER_NAME') . '等级', 'mod_do_url' => '/AcpUser/add_user_rank', 'in_menu' => ''),//OK-DONE
	//	array('id' => $_sort_id.'32', 'name' => '修改' . C('USER_NAME') . '等级', 'mod_do_url' => '/AcpUser/edit_user_rank', 'in_menu' => $_sort_id.'30'),//OK-DONE
	//	// array('id' => '0209', 'name' => C('USER_NAME') . '等级统计', 'mod_do_url' => '/AcpUser/user_rank_stat', 'in_menu' => ''),
	//),
);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'guess', 'name' => '竞猜管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpGuess/list_guess');
$admin_menu_file[$_mod_id]['menu_list'] = array(
    '竞猜类型管理'	=> array(
        array('id' => $_sort_id.'75', 'name' => '类型列表', 'mod_do_url' => '/AcpGuessType/list_guess_type', 'in_menu' => ''),
        array('id' => $_sort_id.'76', 'name' => '添加类型', 'mod_do_url' => '/AcpGuessType/add_guess_type', 'in_menu' => ''),
        array('id' => $_sort_id.'77', 'name' => '修改类型', 'mod_do_url' => '/AcpGuessType/edit_guess_type', 'in_menu' => $_sort_id . '75'),
        array('id' => $_sort_id.'78', 'name' => '删除类型', 'mod_do_url' => '/AcpGuessType/del_guess_type', 'in_menu' => $_sort_id . '75'),
        array('id' => $_sort_id.'79', 'name' => '批量删除类型', 'mod_do_url' => '/AcpGuessType/batch_del_guess_type', 'in_menu' => $_sort_id . '75'),
	),
    '队伍管理'	=> array(
        array('id' => $_sort_id.'55', 'name' => '队伍列表', 'mod_do_url' => '/AcpTeam/list_team', 'in_menu' => ''),
        array('id' => $_sort_id.'56', 'name' => '添加队伍', 'mod_do_url' => '/AcpTeam/add_team', 'in_menu' => ''),
        array('id' => $_sort_id.'57', 'name' => '修改队伍', 'mod_do_url' => '/AcpTeam/edit_team', 'in_menu' => $_sort_id . '55'),
        array('id' => $_sort_id.'58', 'name' => '删除队伍', 'mod_do_url' => '/AcpTeam/del_team', 'in_menu' => $_sort_id . '55'),
        array('id' => $_sort_id.'59', 'name' => '批量删除队伍', 'mod_do_url' => '/AcpTeam/batch_del_team', 'in_menu' => $_sort_id . '55'),
	),
    //'问题管理'	=> array(
    //    array('id' => $_sort_id.'65', 'name' => '问题列表', 'mod_do_url' => '/AcpGuessQuestion/list_guess_question', 'in_menu' => ''),
    //    array('id' => $_sort_id.'66', 'name' => '添加问题', 'mod_do_url' => '/AcpGuessQuestion/add_guess_question', 'in_menu' => ''),
    //    array('id' => $_sort_id.'67', 'name' => '修改问题', 'mod_do_url' => '/AcpGuessQuestion/edit_guess_question', 'in_menu' => $_sort_id . '65'),
    //    array('id' => $_sort_id.'68', 'name' => '删除问题', 'mod_do_url' => '/AcpGuessQuestion/del_guess_question', 'in_menu' => $_sort_id . '65'),
    //    array('id' => $_sort_id.'69', 'name' => '批量删除问题', 'mod_do_url' => '/AcpGuessQuestion/batch_del_guess_question', 'in_menu' => $_sort_id . '65'),
	//),
    '竞猜列表'	=> array(
        array('id' => $_sort_id.'05', 'name' => '竞猜列表', 'mod_do_url' => '/AcpGuess/list_guess', 'in_menu' => ''),
        array('id' => $_sort_id.'06', 'name' => '添加竞猜', 'mod_do_url' => '/AcpGuess/add_guess', 'in_menu' => ''),
        array('id' => $_sort_id.'07', 'name' => '修改竞猜', 'mod_do_url' => '/AcpGuess/edit_guess', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'08', 'name' => '删除竞猜', 'mod_do_url' => '/AcpGuess/del_guess', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'09', 'name' => '批量删除竞猜', 'mod_do_url' => '/AcpGuess/batch_del_guess', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'04', 'name' => '设置分数', 'mod_do_url' => '/AcpGuess/set_result', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'03', 'name' => '提示信息', 'mod_do_url' => '/AcpGuess/add_alert_message', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'02', 'name' => '设置结束', 'mod_do_url' => '/AcpGuess/set_over', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'01', 'name' => '根据类型找队伍', 'mod_do_url' => '/AcpGuess/ajax_get_team_by_type', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'10', 'name' => '根据名称找队伍', 'mod_do_url' => '/AcpGuess/ajax_search_team', 'in_menu' => $_sort_id . '05'),
    ),

        //局数管理
    '竞猜局列表'	=> array(
        array('id' => $_sort_id.'15', 'name' => '竞猜局列表', 'mod_do_url' => '/AcpGuessField/list_guess_field', 'in_menu' => ''),
        array('id' => $_sort_id.'16', 'name' => '添加竞猜局', 'mod_do_url' => '/AcpGuessField/add_guess_field', 'in_menu' => ''),
        array('id' => $_sort_id.'17', 'name' => '修改竞猜局', 'mod_do_url' => '/AcpGuessField/edit_guess_field', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'18', 'name' => '删除竞猜局', 'mod_do_url' => '/AcpGuessField/del_guess_field', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'19', 'name' => '批量删除竞猜局', 'mod_do_url' => '/AcpGuessField/batch_del_guess_field', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'14', 'name' => '设置结束', 'mod_do_url' => '/AcpGuessField/set_over', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'13', 'name' => '设置开关盘', 'mod_do_url' => '/AcpGuessField/set_start_guess_field', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'12', 'name' => '设置局全额退款', 'mod_do_url' => '/AcpGuessField/refund_guess_field', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'11', 'name' => '设置第一局', 'mod_do_url' => '/AcpGuessField/set_first_field', 'in_menu' => $_sort_id . '15'),
    ),

    '竞猜局问题列表'	=> array(
        array('id' => $_sort_id.'25', 'name' => '每局问题列表', 'mod_do_url' => '/AcpGuessFieldQuestion/list_guess_field_question', 'in_menu' => ''),
        array('id' => $_sort_id.'26', 'name' => '添加问题', 'mod_do_url' => '/AcpGuessFieldQuestion/add_guess_field_question', 'in_menu' => ''),
        array('id' => $_sort_id.'27', 'name' => '修改问题', 'mod_do_url' => '/AcpGuessFieldQuestion/edit_guess_field_question', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'28', 'name' => '删除问题', 'mod_do_url' => '/AcpGuessFieldQuestion/del_guess_field_question', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'29', 'name' => '批量删除问题', 'mod_do_url' => '/AcpGuessFieldQuestion/batch_del_guess_field_question', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'24', 'name' => '投注分布情况', 'mod_do_url' => '/AcpGuessFieldQuestion/look_odds_detail', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'23', 'name' => '设置获胜队', 'mod_do_url' => '/AcpGuessFieldQuestion/set_team', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'22', 'name' => '获取局列表', 'mod_do_url' => '/AcpGuessFieldQuestion/ajax_get_guess_field_list', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'21', 'name' => '设置局问题全额退款', 'mod_do_url' => '/AcpGuessFieldQuestion/refund_guess_field_question', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'20', 'name' => '投注详情', 'mod_do_url' => '/AcpGuessFieldQuestion/guess_field_question_detail', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'300', 'name' => '结算金额回退', 'mod_do_url' => '/AcpGuessFieldQuestion/set_refund_money_back', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'301', 'name' => '局判断类型', 'mod_do_url' => '/AcpGuessFieldQuestion/check_field_and_get_team', 'in_menu' => $_sort_id . '25'),

    ),

    '猜冠军管理'	=> array(
        array('id' => $_sort_id.'35', 'name' => '猜冠军列表', 'mod_do_url' => '/AcpGuessChampion/list_guess_champion', 'in_menu' => ''),
        array('id' => $_sort_id.'36', 'name' => '添加猜冠军', 'mod_do_url' => '/AcpGuessChampion/add_guess_champion', 'in_menu' => ''),
        array('id' => $_sort_id.'37', 'name' => '修改猜冠军', 'mod_do_url' => '/AcpGuessChampion/edit_guess_champion', 'in_menu' => $_sort_id . '35'),
        array('id' => $_sort_id.'38', 'name' => '删除猜冠军', 'mod_do_url' => '/AcpGuessChampion/del_guess_champion', 'in_menu' => $_sort_id . '35'),
        array('id' => $_sort_id.'39', 'name' => '批量删除猜冠军', 'mod_do_url' => '/AcpGuessChampion/batch_del_guess_champion', 'in_menu' => $_sort_id . '35'),
        array('id' => $_sort_id.'34', 'name' => '投注分布情况', 'mod_do_url' => '/AcpGuessChampion/look_odds_detail', 'in_menu' => $_sort_id . '35'),
        array('id' => $_sort_id.'33', 'name' => '设置结果', 'mod_do_url' => '/AcpGuessChampion/set_team', 'in_menu' => $_sort_id . '35'),

        array('id' => $_sort_id.'45', 'name' => '冠军队列表', 'mod_do_url' => '/AcpGuessChampionTeam/list_guess_champion_team', 'in_menu' => ''),
        array('id' => $_sort_id.'46', 'name' => '添加冠军队', 'mod_do_url' => '/AcpGuessChampionTeam/add_guess_champion_team', 'in_menu' => $_sort_id . '45'),
        array('id' => $_sort_id.'47', 'name' => '修改冠军队', 'mod_do_url' => '/AcpGuessChampionTeam/edit_guess_champion_team', 'in_menu' => $_sort_id . '45'),
        array('id' => $_sort_id.'48', 'name' => '删除冠军队', 'mod_do_url' => '/AcpGuessChampionTeam/del_guess_champion_team', 'in_menu' => $_sort_id . '45'),
        array('id' => $_sort_id.'49', 'name' => '批量删除冠军队', 'mod_do_url' => '/AcpGuessChampionTeam/batch_del_guess_champion_team', 'in_menu' => $_sort_id . '45'),
    ),
);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'treasure', 'name' => '夺宝管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpGuess/list_guess');
$admin_menu_file[$_mod_id]['menu_list'] = array(
    '游戏管理'	=> array(
        array('id' => $_sort_id.'05', 'name' => '游戏列表', 'mod_do_url' => '/AcpGame/list_game', 'in_menu' => ''),
        array('id' => $_sort_id.'06', 'name' => '添加游戏', 'mod_do_url' => '/AcpGame/add_game', 'in_menu' => ''),
        array('id' => $_sort_id.'07', 'name' => '修改游戏', 'mod_do_url' => '/AcpGame/edit_game', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'08', 'name' => '删除游戏', 'mod_do_url' => '/AcpGame/del_game', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'09', 'name' => '批量删除游戏', 'mod_do_url' => '/AcpGame/batch_del_game', 'in_menu' => $_sort_id . '05'),
    ),
    '奖品管理'	=> array(
        array('id' => $_sort_id.'15', 'name' => '奖品列表', 'mod_do_url' => '/AcpPrize/list_prize', 'in_menu' => ''),
        array('id' => $_sort_id.'16', 'name' => '添加奖品', 'mod_do_url' => '/AcpPrize/add_prize', 'in_menu' => ''),
        array('id' => $_sort_id.'17', 'name' => '修改奖品', 'mod_do_url' => '/AcpPrize/edit_prize', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'18', 'name' => '删除奖品', 'mod_do_url' => '/AcpPrize/del_prize', 'in_menu' => $_sort_id . '15'),
        array('id' => $_sort_id.'19', 'name' => '批量删除奖品', 'mod_do_url' => '/AcpPrize/batch_del_prize', 'in_menu' => $_sort_id . '15'),
    ),
    '夺宝管理'	=> array(
        array('id' => $_sort_id.'25', 'name' => '夺宝列表', 'mod_do_url' => '/AcpTreasure/list_treasure', 'in_menu' => ''),
        array('id' => $_sort_id.'26', 'name' => '添加夺宝', 'mod_do_url' => '/AcpTreasure/add_treasure', 'in_menu' => ''),
        array('id' => $_sort_id.'27', 'name' => '修改夺宝', 'mod_do_url' => '/AcpTreasure/edit_treasure', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'28', 'name' => '删除夺宝', 'mod_do_url' => '/AcpTreasure/del_treasure', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'29', 'name' => '批量删除夺宝', 'mod_do_url' => '/AcpTreasure/batch_del_treasure', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'24', 'name' => '夺宝用户列表', 'mod_do_url' => '/AcpTreasureUser/list_treasure_user', 'in_menu' => $_sort_id . '25'),
        array('id' => $_sort_id.'23', 'name' => '设置结果', 'mod_do_url' => '/AcpTreasure/set_result', 'in_menu' => $_sort_id . '25'),
    ),
    '中奖订单管理'	=> array(
        array('id' => $_sort_id.'36', 'name' => '已中奖/待发货订单', 'mod_do_url' => '/AcpDrawPrize/list_draw_prize', 'in_menu' => ''),
        array('id' => $_sort_id.'38', 'name' => '设置发货', 'mod_do_url' => '/AcpDrawPrize/deliver_treasure', 'in_menu' => $_sort_id . '36'),
        array('id' => $_sort_id.'37', 'name' => '已发货订单', 'mod_do_url' => '/AcpDrawPrize/delivered_draw_prize', 'in_menu' => ''),
        array('id' => $_sort_id.'39', 'name' => '详情', 'mod_do_url' => '/AcpDrawPrize/draw_prize_detail', 'in_menu' => $_sort_id . '37'),
    ),
);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'Roll', 'name' => 'Roll管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpRoll/list_roll');
$admin_menu_file[$_mod_id]['menu_list'] = array(
    'Roll活动管理'	=> array(
        array('id' => $_sort_id.'05', 'name' => 'Roll列表', 'mod_do_url' => '/AcpRoll/list_roll', 'in_menu' => ''),
        array('id' => $_sort_id.'06', 'name' => '添加Roll', 'mod_do_url' => '/AcpRoll/add_roll', 'in_menu' => ''),
        array('id' => $_sort_id.'07', 'name' => '修改Roll', 'mod_do_url' => '/AcpRoll/edit_roll', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'08', 'name' => '删除Roll', 'mod_do_url' => '/AcpRoll/del_roll', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'09', 'name' => '批量删除Roll', 'mod_do_url' => '/AcpRoll/batch_del_roll', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'04', 'name' => 'Roll用户列表', 'mod_do_url' => '/AcpRollUser/list_roll_user', 'in_menu' => $_sort_id . '05'),
        array('id' => $_sort_id.'03', 'name' => '设置开奖', 'mod_do_url' => '/AcpRoll/open_roll', 'in_menu' => $_sort_id . '05'),
    ),
    'Roll订单管理'	=> array(
        array('id' => $_sort_id.'10', 'name' => '已中奖/待发货订单', 'mod_do_url' => '/AcpRollAward/list_roll_award', 'in_menu' => ''),
        array('id' => $_sort_id.'13', 'name' => 'roll_详情', 'mod_do_url' => '/AcpRollAward/roll_award_detail', 'in_menu' => $_sort_id . '10'),
        array('id' => $_sort_id.'12', 'name' => '设置发货', 'mod_do_url' => '/AcpRollAward/deliver_roll', 'in_menu' => $_sort_id . '10'),
        array('id' => $_sort_id.'11', 'name' => '已发货订单', 'mod_do_url' => '/AcpRollAward/delivered_roll_award', 'in_menu' => ''),
    ),
);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'Item', 'name' => C('ITEM_NAME') . '管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpItem/get_onsale_item_list');
$admin_menu_file[$_mod_id]['menu_list'] = array(
	C('ITEM_NAME') . '管理'	=> array(
		array('id' => $_sort_id.'01', 'name' => '出售中的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_onsale_item_list', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'02', 'name' => '仓库中的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_store_item_list', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'03', 'name' => '库存报警的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_alarm_item_list', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'04', 'name' => '售罄的' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/get_sold_out_item_list', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'05', 'name' => '添加' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/add_item', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'06', 'name' => '修改' . C('ITEM_NAME'), 'mod_do_url' => '/AcpItem/edit_item', 'in_menu' => $_sort_id.'01'),//OK-CC
	),//OK-CC
	C('ITEM_NAME') . '分类'	=> array(			//OK-DONE
		array('id' => $_sort_id.'10', 'name' => '一级分类列表', 'mod_do_url' => '/AcpClass/get_level_one', 'in_menu' => ''),
		array('id' => $_sort_id.'11', 'name' => '添加一级分类', 'mod_do_url' => '/AcpClass/add_level_one', 'in_menu' => ''),
		array('id' => $_sort_id.'12', 'name' => '修改一级分类', 'mod_do_url' => '/AcpClass/edit_level_one', 'in_menu' => $_sort_id.'10'),
		array('id' => $_sort_id.'13', 'name' => '二级分类列表', 'mod_do_url' => '/AcpClass/get_level_two', 'in_menu' => ''),
		array('id' => $_sort_id.'14', 'name' => '添加二级分类', 'mod_do_url' => '/AcpClass/add_level_two', 'in_menu' => ''),
		array('id' => $_sort_id.'15', 'name' => '修改二级分类', 'mod_do_url' => '/AcpClass/edit_level_two', 'in_menu' => $_sort_id.'13'),
	),
);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'Order', 'name' => '订单管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpOrder/get_pre_pay_order_list');
$admin_menu_file[$_mod_id]['menu_list'] = array(
	'待处理订单'	=> array(
		#array('id' => $_sort_id.'01', 'name' => '待付款订单', 'mod_do_url' => '/AcpOrder/get_pre_pay_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'02', 'name' => '兑换/待发货订单', 'mod_do_url' => '/AcpOrder/get_pre_deliver_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'13', 'name' => '兑换/待领取订单', 'mod_do_url' => '/AcpOrder/get_pre_exchange_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'03', 'name' => '已发货订单', 'mod_do_url' => '/AcpOrder/get_delivered_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'07', 'name' => '已领取订单', 'mod_do_url' => '/AcpOrder/get_exchanged_order_list', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'04', 'name' => '发货', 'mod_do_url' => '/AcpOrder/deliver_order', 'in_menu' => $_sort_id.'01'),//going-WSQ
		array('id' => $_sort_id.'05', 'name' => '订单详情', 'mod_do_url' => '/AcpOrder/order_detail', 'in_menu' => $_sort_id.'01'),//going-WSQ
		array('id' => $_sort_id.'06', 'name' => '修改订单', 'mod_do_url' => '/AcpOrder/edit_order', 'in_menu' => $_sort_id.'01'),//going-WSQ
		#array('id' => $_sort_id.'07', 'name' => '待退货订单', 'mod_do_url' => '/AcpOrder/get_pre_refund_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => $_sort_id.'08', 'name' => '退货受理中订单', 'mod_do_url' => '/AcpOrder/get_accepted_refund_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => $_sort_id.'09', 'name' => '退货商品寄送中订单', 'mod_do_url' => '/AcpOrder/get_delivering_refund_order_list', 'in_menu' => ''),//going-WSQ
#		array('id' => $_sort_id.'10', 'name' => '已退货订单', 'mod_do_url' => '/AcpOrder/get_refunded_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => $_sort_id.'11', 'name' => '待换货订单', 'mod_do_url' => '/AcpOrder/get_pre_change_order_list', 'in_menu' => ''),
		#array('id' => $_sort_id.'12', 'name' => '查看退货订单', 'mod_do_url' => '/AcpOrder/order_refund_change_apply_detail', 'in_menu' => $_sort_id.'08'),//going-WSQ
	),
	//'历史订单'	=> array(
		//array('id' => $_sort_id.'20', 'name' => '所有订单', 'mod_do_url' => '/AcpOrder/get_all_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => $_sort_id.'21', 'name' => '所有退货订单', 'mod_do_url' => '/AcpOrder/get_refunded_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => $_sort_id.'22', 'name' => '所有换货订单', 'mod_do_url' => '/AcpOrder/get_changed_order_list', 'in_menu' => ''),
		#array('id' => $_sort_id.'23', 'name' => '所有确认订单', 'mod_do_url' => '/AcpOrder/get_confirmed_order_list', 'in_menu' => ''),//going-WSQ
		#array('id' => $_sort_id.'24', 'name' => '所有取消订单', 'mod_do_url' => '/AcpOrder/get_canceled_order_list', 'in_menu' => ''),
	//),//going-WSQ
	'订单统计'	=> array(
		array('id' => $_sort_id.'30', 'name' => '订单日统计', 'mod_do_url' => '/AcpOrder/order_stat_by_day', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'31', 'name' => '订单月统计', 'mod_do_url' => '/AcpOrder/order_stat_by_month', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'32', 'name' => '订单年统计', 'mod_do_url' => '/AcpOrder/order_stat_by_year', 'in_menu' => ''),//going-WSQ
		//array('id' => $_sort_id.'33', 'name' => '订单区域统计', 'mod_do_url' => '/AcpOrder/order_stat_by_area', 'in_menu' => ''),//going-WSQ
		array('id' => $_sort_id.'34', 'name' => '导出订单', 'mod_do_url' => '/AcpOrder/order_export', 'in_menu' => ''),//可以根据区域、省市县、时间、门店编码等筛选导出			//going-WSQ
	),
);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'Account', 'name' => '财务管理', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpFinance/get_account_apply_list');
$admin_menu_file[$_mod_id]['menu_list'] = array(
	'日常处理'	=> array(
		#array('id' => $_sort_id.'01', 'name' => '入账申请列表', 'mod_do_url' => '/AcpFinance/get_account_apply_list', 'in_menu' => ''),
		array('id' => $_sort_id.'02', 'name' => '调整余额', 'mod_do_url' => '/AcpFinance/edit_account', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
		array('id' => $_sort_id.'06', 'name' => '加减款', 'mod_do_url' => '/AcpFinance/set_amount', 'in_menu' => $_sort_id . '02'),//
		array('id' => $_sort_id.'03', 'name' => '财务变动明细', 'mod_do_url' => '/AcpFinance/get_account_log', 'in_menu' => ''),//修改字段名称展示之	//going-WSQ
		array('id' => $_sort_id.'04', 'name' => '充值页面', 'mod_do_url' => '/AcpFinance/recharge', 'in_menu' => ''),//增加手机号、QQ号，修改字段名称展示之，加导出按钮，跳到财务导出页导出Excel	//going-WSQ
		array('id' => $_sort_id.'05', 'name' => '充值操作', 'mod_do_url' => '/AcpFinance/recharge_by_admin', 'in_menu' => $_sort_id . '04'),//
		array('id' => $_sort_id.'09', 'name' => '充值操作', 'mod_do_url' => '/AcpFinance/get_problem_info', 'in_menu' => $_sort_id . '02'),//
	),
	/*'提现管理'	=> array(
		array('id' => $_sort_id.'10', 'name' => '提现记录', 'mod_do_url' => '/AcpDeposit/get_deposit_list', 'in_menu' => ''),
		array('id' => $_sort_id.'11', 'name' => '提现申请列表', 'mod_do_url' => '/AcpDeposit/get_deposit_apply_list', 'in_menu' => ''),
		array('id' => $_sort_id.'12', 'name' => '通过提现申请', 'mod_do_url' => '/AcpDeposit/set_state', 'in_menu' => $_sort_id.'11'),
		array('id' => $_sort_id.'13', 'name' => '拒绝提现申请', 'mod_do_url' => '/AcpDeposit/refuse', 'in_menu' => $_sort_id.'11'),
		array('id' => $_sort_id.'14', 'name' => '提现统计', 'mod_do_url' => '/AcpDeposit/deposit_stat', 'in_menu' => ''),
		array('id' => $_sort_id.'15', 'name' => '导出提现申请', 'mod_do_url' => '/AcpDeposit/export_deposit_apply', 'in_menu' => ''),
	),
     */
	'财务统计'	=> array(
		array('id' => $_sort_id.'20', 'name' => '按日统计', 'mod_do_url' => '/AcpFinance/recharge_stat_by_day', 'in_menu' => ''),
		array('id' => $_sort_id.'21', 'name' => '按月统计', 'mod_do_url' => '/AcpFinance/recharge_stat_by_month', 'in_menu' => ''),
		array('id' => $_sort_id.'22', 'name' => '按年统计', 'mod_do_url' => '/AcpFinance/recharge_stat_by_year', 'in_menu' => ''),
		array('id' => $_sort_id.'23', 'name' => '导出财务数据', 'mod_do_url' => '/AcpFinance/export_account', 'in_menu' => ''),//增加筛选项，可根据手机号、门店编号导出	//going-WSQ
	),
);

//$admin_menu_file[5] = array('id' => '06', 'mod_name' => 'page_model', 'name' => '模板装修', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpTempletPackage/get_templet_package_list');
//$admin_menu_file[5]['menu_list'] = array(
//	'页面模板'	=> array(
//		array('id' => '0609', 'name' => '当前页面模板', 'mod_do_url' => '/AcpPage/get_selected_page_list', 'in_menu' => ''),
//		array('id' => '0610', 'name' => '换页面模板', 'mod_do_url' => '/AcpPage/edit_page', 'in_menu' => '0609'),
//		array('id' => '0611', 'name' => '换模板套装', 'mod_do_url' => '/AcpPage/edit_package', 'in_menu' => ''),
//		#array('id' => '0605', 'name' => '页面模板列表', 'mod_do_url' => '/AcpPage/get_page_list', 'in_menu' => ''),
//		#array('id' => '0606', 'name' => '添加页面模板', 'mod_do_url' => '/AcpPage/add_page', 'in_menu' => ''),
//		#array('id' => '0607', 'name' => '删除页面模板', 'mod_do_url' => '/AcpPage/delete_page', 'in_menu' => '0605'),
//		#array('id' => '0608', 'name' => '修改页面模板', 'mod_do_url' => '/AcpPage/edit_page', 'in_menu' => '0605'),
//	),
//	'首页导航定制'	=> array(
//		array('id' => '0612', 'name' => '首页导航列表', 'mod_do_url' => '/AcpIndexNav/get_index_nav_list', 'in_menu' => ''),
//		array('id' => '0613', 'name' => '添加首页导航', 'mod_do_url' => '/AcpIndexNav/add_index_nav', 'in_menu' => ''),
//		array('id' => '0614', 'name' => '修改首页导航', 'mod_do_url' => '/AcpIndexNav/edit_index_nav', 'in_menu' => '0612'),
//	),
//);

$admin_menu_file[++$_mod_id] = array('id' => ++$_sort_id, 'mod_name' => 'Article', 'name' => '文章资讯', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpArticle/list_article');
$admin_menu_file[$_mod_id]['menu_list'] = array(
	'文章管理'	=> array(
		array('id' => $_sort_id.'01', 'name' => '文章列表', 'mod_do_url' => '/AcpArticle/list_article', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'02', 'name' => '添加文章', 'mod_do_url' => '/AcpArticle/add_article', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'03', 'name' => '修改文章', 'mod_do_url' => '/AcpArticle/edit_article', 'in_menu' => $_sort_id.'01'),//OK-CC
		array('id' => $_sort_id.'04', 'name' => '文章栏目列表', 'mod_do_url' => '/AcpArticle/list_sort', 'in_menu' => '')//OK-CC
	),
	'公告管理'	=> array(
		array('id' => $_sort_id.'11', 'name' => '公告列表', 'mod_do_url' => '/AcpNotice/list_notice', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'12', 'name' => '添加公告', 'mod_do_url' => '/AcpNotice/add_notice', 'in_menu' => ''),//OK-CC
		array('id' => $_sort_id.'13', 'name' => '修改公告', 'mod_do_url' => '/AcpNotice/edit_notice', 'in_menu' => $_sort_id.'11'),//OK-CC
		//array('id' => $_sort_id.'14', 'name' => '公告栏目列表', 'mod_do_url' => '/AcpNotice/list_sort', 'in_menu' => '')//OK-CC
	),
);

// $admin_menu_file[6] = array('id' => '07', 'mod_name' => 'Stat', 'name' => '统计', 'mod_do_url' => '', 'in_menu' => '', 'default_url' => '/AcpStat/today_flow_detail');
// $admin_menu_file[6]['menu_list'] = array(
// 	'流量统计'	=> array(
// 		array('id' => '0701', 'name' => '今日流量', 'mod_do_url' => '/AcpStat/today_flow_detail', 'in_menu' => ''),
// 		array('id' => '0702', 'name' => '历史流量日统计', 'mod_do_url' => '/AcpStat/history_flow_detail_d', 'in_menu' => ''),
// 		array('id' => '0706', 'name' => '历史流量月统计', 'mod_do_url' => '/AcpStat/history_flow_detail_m', 'in_menu' => ''),
// 		array('id' => '0707', 'name' => '历史流量年统计', 'mod_do_url' => '/AcpStat/history_flow_detail_y', 'in_menu' => ''),
// 		#array('id' => '0703', 'name' => '页面统计', 'mod_do_url' => '/AcpStat/page_stat', 'in_menu' => ''),
// 	),
// 	#'客服统计'	=> array(
// 		#array('id' => '0704', 'name' => '客服流量详情', 'mod_do_url' => '/AcpStat/customer_service_detail', 'in_menu' => ''),
// 		#array('id' => '0705', 'name' => '客服流量统计', 'mod_do_url' => '/AcpStat/customer_service_stat', 'in_menu' => '')
// 	#),
// );

