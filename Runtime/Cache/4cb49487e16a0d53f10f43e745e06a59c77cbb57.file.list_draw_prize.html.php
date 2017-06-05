<?php /* Smarty version Smarty-3.1.6, created on 2016-10-10 17:41:56
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpDrawPrize/list_draw_prize.html" */ ?>
<?php /*%%SmartyHeaderCode:149738378257b52fef559738-13279144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cb49487e16a0d53f10f43e745e06a59c77cbb57' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpDrawPrize/list_draw_prize.html',
      1 => 1476092514,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149738378257b52fef559738-13279144',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b52fef79ec0',
  'variables' => 
  array (
    'system_config' => 0,
    'version' => 0,
    'ui_navPosMod' => 0,
    'ui_layoutMod' => 0,
    'my_menu_file' => 0,
    'mod_id' => 0,
    'key' => 0,
    'menu' => 0,
    'first_level' => 0,
    'menu_list' => 0,
    'link' => 0,
    'unread_message_num' => 0,
    'action_title' => 0,
    'action_src' => 0,
    'head_title' => 0,
    'my_menu_list' => 0,
    'menu_no' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b52fef79ec0')) {function content_57b52fef79ec0($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
 - 管理中心 - <?php echo $_smarty_tpl->tpl_vars['system_config']->value['SHOP_TITLE'];?>
</title>
	<link rel="stylesheet" href="__ACPJS__/acpcomm.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" href="__ACPCSS__/acpcomm-min.css">
	<link rel="stylesheet" href="__PLG__/jPops/jquery.jpops.min-v3.css">
	<link type="text/css" rel="stylesheet" href="__ACPCSS__/tip.css" />
	
<link type="text/css" rel="stylesheet" href="__ACPCSS__/tip.css" />

<style>
.PageNext{page-break-after: always; height:1px;}
</style>


</head>
<body id="body">

	<div class="header <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='fixed'){?>fixed<?php }?>" id="j-nav">
		<div class="layout blue clearfix <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fixed'){?>fixed<?php }?>">
			<div class="brandWrap fl">
				<h1 class="logo">
					<a href="/"><img src="__PUBLIC__/Images/acp/logo.png"></a>
				</h1>
				<a href="javascript:;" class="brandTgl j-togggle-sidebar"><i class="ic16 ic-menu"></i></a>
			</div>
			<!-- end brandWrap -->
			<ul class="nav fl clearfix">
			<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['my_menu_file']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>
				<li class="nav-list">
					<a href="javascript:;" class="nav-list-main j-navsub-toggle <?php if ($_smarty_tpl->tpl_vars['mod_id']->value==$_smarty_tpl->tpl_vars['key']->value){?>active<?php }?>">
						<span><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>

							<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['num'])&&$_smarty_tpl->tpl_vars['menu']->value['num']>0){?>
								(<b><?php echo $_smarty_tpl->tpl_vars['menu']->value['num'];?>
</b>)
							<?php }?>
						</span>
						<i class="navArrow ic8 ic-navarrow-down"></i>
					</a>
					<dl class="nav-list-sub">
					<?php  $_smarty_tpl->tpl_vars['menu_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_list']->_loop = false;
 $_smarty_tpl->tpl_vars['first_level'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_list']->key => $_smarty_tpl->tpl_vars['menu_list']->value){
$_smarty_tpl->tpl_vars['menu_list']->_loop = true;
 $_smarty_tpl->tpl_vars['first_level']->value = $_smarty_tpl->tpl_vars['menu_list']->key;
?>
						<dt><?php echo $_smarty_tpl->tpl_vars['first_level']->value;?>
</dt>
						<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['link']->value['in_menu']==''&&!isset($_smarty_tpl->tpl_vars['link']->value['in_top'])){?>
							<dd>
								<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['mod_do_url'];?>
/mod_id/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>

									<?php if (isset($_smarty_tpl->tpl_vars['link']->value['num'])&&$_smarty_tpl->tpl_vars['link']->value['num']>0){?>
										(<b class="colorRed"><?php echo $_smarty_tpl->tpl_vars['link']->value['num'];?>
</b>)
									<?php }?>
								</a>
							</dd>
						<?php }?>
						<?php } ?>
					<?php } ?>
						</dl>
					<!-- end nav-list-sub -->
				</li>
			<?php } ?>
			</ul>
			<!-- end nav -->
			<ul class="nav fr mgr10 clearfix">
				<!-- 站内信先注释，加入站内信功能时去除注释 -->
                <!--<li class="nav-list">
                	<?php if ($_smarty_tpl->tpl_vars['unread_message_num']->value){?>
                    <a href="/AcpMessage/waiting_reply_message/mod_id/2" class="nav-list-main onlyicon">
                        <i class="navArrow ic16 ic-envelope"></i>
                    </a>
                    <span class="nav-mailcount">
                    	<?php echo $_smarty_tpl->tpl_vars['unread_message_num']->value;?>

                    </span>
                    <?php }else{ ?>
                    <a href="/AcpMessage/list_message/mod_id/2" class="nav-list-main onlyicon">
                        <i class="navArrow ic16 ic-envelope"></i>
                    </a>
                    <span class="nav-mailcount"></span>
                    <?php }?>
				</li>-->
                <li class="nav-list">
                    <a href="javascript:;" class="nav-list-main onlyicon j-navsub-toggle">
                        <i class="navArrow ic16 ic-cog"></i>
                    </a>
                    <dl class="nav-list-sub layoutCtrl algRight">
                        <dt>布局方式</dt>
                        <dd>
                            <a href="javascript:;" class="j-layoutCtrl" data-type="fluid"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fixed'){?>white<?php }?>"></i>流式布局</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" class="j-layoutCtrl" data-type="fixed"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fluid'||$_smarty_tpl->tpl_vars['ui_layoutMod']->value==''){?>white<?php }?>"></i>固定宽度</a>
                        </dd>
                        <dt class="ie6hide">导航栏固定方式</dt>
                        <dd class="ie6hide">
                            <a href="javascript:;" class="j-navCtrl" data-type="default"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='fixed'){?>white<?php }?>"></i>默认</a>
                        </dd>
                        <dd class="ie6hide">
                            <a href="javascript:;" class="j-navCtrl" data-type="fixed"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='default'||$_smarty_tpl->tpl_vars['ui_navPosMod']->value==''){?>white<?php }?>"></i>固定</a>
                        </dd>
                    </dl>
                </li>
                <li class="nav-list">
                    <a href="javascript:;" class="nav-list-main onlyicon j-navsub-toggle">
                        <i class="navArrow ic16 ic-user"></i>
                    </a>
                    <dl class="nav-list-sub algRight">
                        <dd><a href="javascript:;"><?php echo smarty_modifier_truncate($_SESSION['user_info']['username'],15,"...",true);?>
</a></dd>
                        <dd><a href="/" target="_blank">首页</a></dd>
                        <dd><a href="/logout">退出</a></dd>
                    </dl>
                </li>
            </ul>
            <!-- end nav -->
		</div>
	</div>
	<!-- end header -->

	<div class="layout <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='fixed'){?>pdt40<?php }?> <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fixed'){?>fixed<?php }?>" id="j-cont-ly">
		<div class="container clearfix">
			<div class="content fr">
				<div id="main">
					<div class="breadcrumbs">
						<a href="/acp">首页</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_title']->value){?>
                        <span class="ic8 ic-menuarrow-right"></span>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['action_src']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['action_title']->value;?>
</a>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['head_title']->value){?>
                        <span class="ic8 ic-menuarrow-right"></span>
                        <a href="javascript:;" class="colorBlack"><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</a>
                        <?php }?>
						<a href="javascript:;" class="closebrdc j-closebrdc"><i class="gicon-remove"></i></a>
					</div>
					<!-- end breadcrumbs -->
					<div class="main-content">
					
<div class="tablesWrap">  
<!-- end tables-searchbox -->  
    <!--<div class="tables-searchbox">
        <form method="post" action="">
            <span class="tbs-txt">名称：</span>
            <input type="text" name="draw_prize_name" value="<?php echo $_smarty_tpl->tpl_vars['draw_prize_name']->value;?>
">

            <span class="tbs-txt">主队：</span>
            <input type="text" name="host_team_name" value="<?php echo $_smarty_tpl->tpl_vars['host_team_name']->value;?>
">

            <span class="tbs-txt">客队：</span>
            <input type="text" name="guest_team_name" value="<?php echo $_smarty_tpl->tpl_vars['guest_team_name']->value;?>
">

            <select name="item_status">
                <option value="0" selected="">-<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
状态-</option>
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_item_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['item_status']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</option>
                <?php } ?>
            </select>

            <div class="mgt10">
                <span class="tbs-txt">开始时间：</span>
                <input type="text" autocomplete="off" class="Wdate" name="start_date" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_date']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
                <span class="tbs-txt">至</span>
                <input type="text" autocomplete="off" class="Wdate" name="end_date" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_date']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
                <button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
            </div>

        </form>
    </div>
        -->
<table class="wxtables">  
    <colgroup>  
    <col width="2%">
    <col width="3%">
    <col width="4%">
    <col width="4%">
    <col width="3%">
    <col width="5%">
    <col width="7%">
    <col width="7%">
    <col width="7%">
    </colgroup>
    <thead>
        <tr>  
            <td>选择</td>  
            <td>用户昵称</td>
            <td>夺宝奖品</td>
            <td>夺宝期数</td>
            <td>中奖号码</td>
            <td>游戏名称</td>
            <td>游戏账号</td>
            <td>Steam Url</td>
            <td>操作</td>
        </tr>  
    </thead>  
	<?php  $_smarty_tpl->tpl_vars['question_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['draw_prize_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question_class']->key => $_smarty_tpl->tpl_vars['question_class']->value){
$_smarty_tpl->tpl_vars['question_class']->_loop = true;
?>
    <tbody class="combo-tbody">  
        <tr>
			<td><input type="checkbox" class="checkbox" name="a[]" value="<?php echo $_smarty_tpl->tpl_vars['question_class']->value['draw_prize_id'];?>
"></td>
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['nickname'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['prize_name'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['periods'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['lottery'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['game_name'];?>
</td>  
			<td style="word-break:break-all;"><?php echo $_smarty_tpl->tpl_vars['question_class']->value['game_account'];?>
</td>  
			<td style="word-break:break-all;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['question_class']->value['steam_url'])===null||$tmp==='' ? '--' : $tmp);?>
</td>  
            <td>  
				<a href="/AcpUser/user_detail/user_id/<?php echo $_smarty_tpl->tpl_vars['question_class']->value['user_id'];?>
.html" class="btn" title="用户详情">用户详情</a>  
				<a href="/AcpDrawPrize/draw_prize_detail/draw_prize_id/<?php echo $_smarty_tpl->tpl_vars['question_class']->value['draw_prize_id'];?>
.html" class="btn" title="夺宝详情">夺宝详情</a>  
                <?php if (!$_smarty_tpl->tpl_vars['question_class']->value['is_deliver']){?>
                <a href="javascript:;" class="btn" title="发货" onclick="deliver_treasure(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['draw_prize_id'];?>
)">发货</a>  
                <?php }else{ ?>
                <a href="javascript:;" class="btn" title="删除" onclick="delete_question_class(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['draw_prize_id'];?>
)">删除</a>  
                <?php }?>
            </td>  
        </tr>
    </tbody>
	<?php }
if (!$_smarty_tpl->tpl_vars['question_class']->_loop) {
?>   
    <tbody>    
		<tr>
			<td colspan="7">
				没有符合条件的记录
			</td>
		<tr>
    </tbody>  
	<?php } ?>
</table>  
<!-- end wxtables -->  
<div class="tables-btmctrl clearfix">  
    <!--<div class="fl">  
        <a href="javascript:;" class="btn btn-blue" onclick="Select()">全选</a>  
        <a href="javascript:;" class="btn btn-blue" onclick="Cancel()">取消</a>  
        <a href="javascript:;" onclick="batch_delete()" class="btn btn-blue">删除</a>
    </div>  
    -->
    <div class="fr">  
        <div class="paginate">
			<?php echo $_smarty_tpl->tpl_vars['page_str']->value;?>
 
        </div>  
        <!-- end paginate -->  
    </div>  
</div>  
<!-- end tables-btmctrl -->  
</div>  
<!-- end tablesWrap -->   

					</div>
					<!-- end main-content -->
				</div>
				<!-- end main -->
			</div>
			<!-- end content -->
			<div id="sidebar" class="fl">
				
					<?php  $_smarty_tpl->tpl_vars['menu_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_list']->_loop = false;
 $_smarty_tpl->tpl_vars['first_level'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['my_menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_list']->key => $_smarty_tpl->tpl_vars['menu_list']->value){
$_smarty_tpl->tpl_vars['menu_list']->_loop = true;
 $_smarty_tpl->tpl_vars['first_level']->value = $_smarty_tpl->tpl_vars['menu_list']->key;
?>
					<dl class="menulist">
						<dt>
							<a href="" class="j-togglemenu">
								<i class="meunarrow ic8 ic-menuarrow-down"></i>
								<?php echo $_smarty_tpl->tpl_vars['first_level']->value;?>

							</a>
						</dt>
						<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['link']->value['in_menu']==''){?>
								<dd>
									<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['mod_do_url'];?>
/mod_id/<?php echo $_smarty_tpl->tpl_vars['mod_id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['id']==$_smarty_tpl->tpl_vars['menu_no']->value){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>

										<?php if (isset($_smarty_tpl->tpl_vars['link']->value['num'])&&$_smarty_tpl->tpl_vars['link']->value['num']>0){?>
											(<b><?php echo $_smarty_tpl->tpl_vars['link']->value['num'];?>
</b>)
										<?php }?>
									</a>
								</dd>
							<?php }?>
						<?php } ?>
					</dl>
					<?php } ?>
				
			</div>
			<!-- end sidebar -->
		</div>
		<!-- end container -->
	</div>
	
	<!-- 提示层 by zhengzhen -->
	<p id="J_TipLayer" class="popTip" style="top: 110px; display: none;">
		<i></i>
		<span>正在加载，请稍后...</span>
	</p>
	<div id="J_TransMaskLayer" class="transMask" style="display: none;"></div>
	
	<script src="__JS__/jquery/jquery-1.8.3.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__ACPJS__/acpcomm-min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PLG__/jPops/jquery.jpops.min-v3.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script type="text/javascript" src="__ACPJS__/tip.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

<script>
	//全选
	function Select(){
		var sel=document.getElementsByName("a[]");
		for(var i=0;i<sel.length;i++){
			sel[i].checked=true;
		}
	}
	//取消全选
	function Cancel(){
		var sel=document.getElementsByName("a[]");
		for(var i=0;i<sel.length;i++){
			sel[i].checked=false;
		}
	}

function delete_question_class(question_draw_prize_id)
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要删除这条数据吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpDrawPrize/del_draw_prize', {"draw_prize_id":question_draw_prize_id}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，删除成功！');
						location.reload();
					}
					else
					{
						alert('对不起，删除失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });  	
}

function batch_delete()
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要删除这些数据吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 var question_draw_prize_ids = '';
				 var count = 0;
				 $('input[name="a[]"]:checked').each(function(){
					 count ++;
					 question_draw_prize_ids += $(this).val() + ',';
				 });

				 if (!count)
				 {
					 alert('对不起，请选择至少一项进行删除！');
					 return;
				 }

				 question_draw_prize_ids = question_draw_prize_ids.substr(0, question_draw_prize_ids.length - 1);
                 console.log(question_draw_prize_ids);

				 $.post('/AcpDrawPrize/batch_del_draw_prize', {"question_draw_prize_ids":question_draw_prize_ids}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，删除成功！');
						location.reload();
					}
					else
					{
						alert('对不起，删除失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });
}

//发货
function deliver_treasure(question_draw_prize_id)
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要设置发货吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpDrawPrize/deliver_treasure', {"draw_prize_id":question_draw_prize_id}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，设置成功！');
						location.reload();
					}
					else
					{
						alert('对不起，设置失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });  	
}
</script>


</body>
</html>
<?php }} ?>