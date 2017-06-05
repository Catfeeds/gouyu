<?php /* Smarty version Smarty-3.1.6, created on 2016-10-09 15:14:29
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpUser/get_user_list.html" */ ?>
<?php /*%%SmartyHeaderCode:133572110657b19474c72820-81298185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d3a306657abb1a41613d4f188dee440a78e12d4' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpUser/get_user_list.html',
      1 => 1475992968,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133572110657b19474c72820-81298185',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b1947513498',
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
<?php if ($_valid && !is_callable('content_57b1947513498')) {function content_57b1947513498($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpUser/audit_waiting.css" type="text/css" />

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
					
<div class="t-a-wait-con">
    <div class="tablesWrap"> 
    	<div class="tables-searchbox">
            <div class="t-a-wait-top">
                <form action="" method="post" id="rank_waiting">
                    <!--<?php if ($_smarty_tpl->tpl_vars['opt']->value=='user'){?><div class="t-a-wait-top-li"><span>用户账号：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" class="mini" name="username"> </div>-->
                <!--div class="t-a-wait-top-li"><span>加盟商名称：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
" class="mini" name="nickname"> </div-->
                <div class="t-a-wait-top-li"><span>昵称：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
" class="mini" name="nickname"> </div><?php }?>
                <div class="t-a-wait-top-li"><span>手机号：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
" class="mini" name="mobile"> </div>
                <!--div class="t-a-wait-top-li"><span>QQ：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['qq']->value;?>
" class="mini" name="qq"> </div-->
                <!--div class="t-a-wait-top-li"><span>邮箱：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="mini" name="email"> </div-->
                <!--div class="t-a-wait-top-li"><span>门店编号：</span><input type="text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['store_sn']->value;?>
" class="mini" name="store_sn"> </div-->
                    <!--
                <div class="t-a-wait-top-li">
                <select class="small" name="big_area_id">
                    <option value="0" >大区</option>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['row'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['row']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['name'] = 'row';
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['big_area_list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total']);
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['big_area_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['big_area_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['big_area_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['big_area_id']==$_smarty_tpl->tpl_vars['big_area_id']->value){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['big_area_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['area_name'];?>
</option>
                    <?php endfor; endif; ?>
                </select>
                </div>
                    -->

                <!--<div class="t-a-wait-top-li">
                <select class="small" name="user_rank_id">
                    <option value="0" >用户等级</option>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['row'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['row']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['name'] = 'row';
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rank_list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total']);
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rank_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['user_rank_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rank_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['user_rank_id']==$_smarty_tpl->tpl_vars['user_rank_id']->value){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['rank_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['rank_name'];?>
</option>
                    <?php endfor; endif; ?>
                </select>
                </div>
                -->

                <div class="t-a-wait-top-li" style="width:400px;">
                    <div class="formitems inline">  
                        <label class="fi-name" style="width:70px; font-weight:normal;">注册时间：</label>  
                        <div class="form-controls" style="margin-left:80px;">  
				            <input type="text" style="width:120px;" autocomplete="off" class="Wdate" name="start_time" value="<?php if ($_smarty_tpl->tpl_vars['start_time']->value){?><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['start_time']->value);?>
<?php }?>" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">  

                            <span class="fi-text">-</span>  
                            
                            <input type="text" style="width:120px;" autocomplete="off" class="Wdate" name="end_time" value="<?php if ($_smarty_tpl->tpl_vars['end_time']->value){?><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['end_time']->value);?>
<?php }?>" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">  
                        </div>  
                    </div> 
                </div>

                <div class="t-a-wait-top-li" style=""><input type="hidden" name="submit" value="search" /><button class="btn"><i class="gicon-search"></i>搜索</button> </div>
              </form>
            </div>        
        </div> 
        <table class="wxtables">  
            <colgroup>  
            <col width="5%"> 
            <col width="5%"> 
            <col width="7%">  
            <col width="7%">  
            <col width="7%">  
            <col width="15%">
            </colgroup>  
            <thead>  
                <tr>  
                    <td>选择</td>  
                    <!--td>用户名</td>
                    <td>联系人</td>-->  
                    <td>ID</td>  
                    <td>姓名</td>  
                    <td>手机</td>
                    <!--td>所在地区</td-->
                    <td>注册时间</td>
                    <!--
                    <td>邮箱</td>
                    <td>QQ</td>
                    -->
                    <td>操作</td>  
                </tr>  
            </thead>  
            <tbody>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                <tr>  
                    <td><input type="checkbox" class="checkbox" value='<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
' name="a[]"></td> 
                    <!--
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>  
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['realname'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['area_string'];?>
</td>
                    <td><span><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</span></td>  
                    <td><span><?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
</span></td>  
                    -->
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>  
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</td>  
                    <td><?php if ($_smarty_tpl->tpl_vars['user']->value['mobile']){?><?php echo $_smarty_tpl->tpl_vars['user']->value['mobile'];?>
<?php }else{ ?>--<?php }?></td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['reg_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
                    <td>  
                        <?php if ($_smarty_tpl->tpl_vars['user']->value['role_type']==6){?>
                            <a href="/AcpUser/edit_dept_user/user_id/<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" class="btn" title="修改用户信息">修改</a>   
                        <?php }?>
						<?php if ($_smarty_tpl->tpl_vars['user']->value['is_enable']==1){?>
							<a href="javascript:;" class="btn" onclick="set_is_enable(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
, 2)" title="禁用该用户">禁用</a>   
						<?php }elseif($_smarty_tpl->tpl_vars['user']->value['is_enable']==2){?>
							<a href="javascript:;" class="btn" onclick="set_is_enable(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
, 1)" title="激活该用户">激活</a>   
						<?php }?>
                            <a href="/AcpUser/user_detail/user_id/<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" class="btn" title="用户信息">查看</a>   
                            <a href="/AcpUser/extend_user/parent_id/<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" class="btn" title="推广列表">推广列表</a>   
                        <!--
                        <a href="javascript:;" onclick="delUser(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
, this);" class="btn" title="删除"><i class="gicon-trash black"></i>删除</a>    
							<a href="javascript:;" class="btn" onclick="general_code(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
)" title="生成二维码链接">二维码链接</a>   
                        <a href="/AcpUser/user_detail/user_id/<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" class="btn" title="查看用户详情">详情</a>   
						<a href="javascript:;" onclick="send_freight_coupon(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
);" class="btn" title="发放优惠券">发放优惠券</a>   
                        -->
                    </td>  
                </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['user']->_loop) {
?>
					<tr><td colspan="11">没有符合条件的用户</td></tr>
                <?php } ?>
            </tbody>  
        </table>  
        <!-- end wxtables -->  
        <div class="tables-btmctrl clearfix">  
            <div class="fl">  
				<a href="javascript:;" class="btn btn-blue" onclick="Select()">全选</a>  
				<a href="javascript:;" class="btn btn-blue" onclick="Cancel()">取消</a>  
                <a href="javascript:void(0);" class="btn btn-blue" onclick="batch_set_is_enable(2)">批量禁用</a> 
                <a href="javascript:void(0);" class="btn btn-blue" onclick="batch_set_is_enable(1)">批量激活</a> 
            </div> 
            <div class="fr">  
                <div class="paginate">  
                    <?php echo $_smarty_tpl->tpl_vars['show']->value;?>

                </div>  
                <!-- end paginate -->  
            </div>  
        </div>  
        <!-- end tables-btmctrl -->  
    </div>  
    <!-- end tablesWrap --> 
</div>

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
    var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
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

 
function set_is_enable(id, is_enable)
{
	opt = (is_enable == 1) ? '激活' : '禁用';
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要执行该操作吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpUserAjax/set_user_is_enable', {"user_id":id, "is_enable":is_enable}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，' + opt + '成功！');
						location.reload();
					}
					else
					{
						alert('对不起，' + opt + '失败');
					}
				});
			 }  
			 return true;  
		 }
	 });  	
}

function batch_set_is_enable(is_enable)
{
	opt = (is_enable == 1) ? '激活' : '禁用';
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要执行这些操作吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 var ids = '';
				 var count = 0;
				 $('input[name="a[]"]:checked').each(function(){
					 count ++;
					 ids += $(this).val() + ',';
				 });

				 if (!count)
				 {
					 alert('对不起，请选择至少一项进行操作！');
					 return;
				 }

				 ids = ids.substr(0, ids.length - 1);

				 $.post('/AcpUserAjax/batch_set_user_is_enable', {"user_ids":ids, "is_enable":is_enable}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，' + opt + '成功！');
						location.reload();
					}
					else
					{
						alert('对不起，' + opt + '失败');
					}
				});
			 }  
			 return true;  
		 }
	 });
}

function send_freight_coupon(user_id)
{
	var html='';

	var html='<form id="deliver_form">' + 
			'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>优惠券名称：</label>'+ 
				'<div class="form-controls">'+
					'<input name="freight_name" id="freight_name"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
			'<div class="formitems inline">'+
            '<label class="fi-name"><span class="colorRed">*</span>优惠券使用条件( > 元)：</label>'+ 
				'<div class="form-controls">'+
					'<input name="price_limit" id="price_limit"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
			'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>优惠券面额：</label>'+ 
				'<div class="form-controls">'+
					'<input name="freight_num" id="freight_num"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
			'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>有效天数：</label>'+ 
				'<div class="form-controls">'+
					'<input name="valid_day_num" id="valid_day_num"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
		'</form>';
	
	$.jPops.custom({
		title:"发放优惠券",  
		content:html,
		okBtnTxt:"确定",  
		cancelBtnTxt:"取消",  
		callback:function(r)
		{
			if(r)
			{
			    var freight_name  = $('#freight_name').val();
				var freight_num   = $('#freight_num').val();
				var valid_day_num = $('#valid_day_num').val();
				var price_limit   = $('#price_limit').val();

				$.validator.setDefaults(
				{
					//表单验证通过后的处理，异步提交表单
					submitHandler: function()
					{
						$.post('/AcpPromo/dispatch_coupon',{"user_id":user_id,"num":freight_num,"valid_day_num":valid_day_num, "coupon_name":freight_name, "price_limit":price_limit},function(data)
						{
							if (data == 'success')
							{
								alert('恭喜您，操作成功');
							}
							else
							{
								alert('对不起，操作失败');
							}
						})
						acp.batchDeliverFormStatus = true;
					}
				});
			
				//表单验证规则
				$("#deliver_form").validate(
				{
					rules: 
					{
						freight_num: 
						{
							required: true,
							digits: true
						},
						valid_day_num: 
						{
							required: true,
							digits: true
						},
					},
					messages: 
					{
						freight_num: 
						{
							required: "对不起，请填写面额",
							digits: "面额请填写数字!"
						},
						valid_day_num: 
						{
							required: "对不起，请填写有效天数",
							digits: "有效天数请填写数字!"
						},
					},
					errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
					success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
				});

				//模拟提交表单
				$("#deliver_form").submit();
				return acp.batchDeliverFormStatus;
			}
			else
			{
				return true;  
			}
		}
	});
}

function batch_send_freight_coupon()
{
	var html='';

	var user_ids = '';
	var count = 0;
	$('input[name="a[]"]:checked').each(function()
	{
		count ++;
		user_ids += $(this).val() + ',';
	});
	if (!count)
	{
		alert('对不起，请选择至少一个用户进行发放');
		return;
	}

	var user_ids = user_ids.substr(0, user_ids.length - 1);
	var html='<form id="batch_deliver_form">' + 
			'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>优惠券名称：</label>'+ 
				'<div class="form-controls">'+
					'<input name="freight_name" id="freight_name"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
			'<div class="formitems inline">'+
            '<label class="fi-name"><span class="colorRed">*</span>优惠券使用条件( > 元)：</label>'+ 
				'<div class="form-controls">'+
					'<input name="price_limit" id="price_limit"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
			'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>优惠券面额：</label>'+ 
				'<div class="form-controls">'+
					'<input name="freight_num" id="freight_num"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
			'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>有效天数：</label>'+ 
				'<div class="form-controls">'+
					'<input name="valid_day_num" id="valid_day_num"><span class="fi-help-text"> </span>'+
				'</div>' + 
			'</div>'+
		'</form>';
	
	$.jPops.custom({
		title:"批量发放镖金优惠券",  
		content:html,
		okBtnTxt:"确定",  
		cancelBtnTxt:"取消",  
		callback:function(r)
		{
			if(r)
			{
			    var freight_name  = $('#freight_name').val();
				var freight_num   = $('#freight_num').val();
				var valid_day_num = $('#valid_day_num').val();
				var price_limit   = $('#price_limit').val();

				$.validator.setDefaults(
				{
					//表单验证通过后的处理，异步提交表单
					submitHandler: function()
					{
						$.post('/AcpPromo/batch_dispatch_coupon',{"user_ids":user_ids,"freight_num":freight_num,"valid_day_num":valid_day_num, "coupon_name":freight_name, "price_limit":price_limit},function(data)
						{
							if (data == 'success')
							{
								alert('恭喜您，操作成功');
							}
							else
							{
								alert('对不起，操作失败');
							}
						})
						acp.batchDeliverFormStatus = true;
					}
				});
			
				//表单验证规则
				$("#batch_deliver_form").validate(
				{
					rules: 
					{
						freight_num: 
						{
							required: true,
							digits: true
						},
						valid_day_num: 
						{
							required: true,
							digits: true
						},
					},
					messages: 
					{
						freight_num: 
						{
							required: "对不起，请填写面额",
							digits: "面额请填写数字!"
						},
						valid_day_num: 
						{
							required: "对不起，请填写有效天数",
							digits: "有效天数请填写数字!"
						},
					},
					errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
					success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
				});

				//模拟提交表单
				$("#batch_deliver_form").submit();
				return acp.batchDeliverFormStatus;
			}
			else
			{
				return true;  
			}
		}
	});
}

function delUser(_id, _this){
	$.jPops.confirm({
		title:"提示",
		content:'您确定要删除这条数据吗？',
		okBtnTxt:"确定",
		cancelBtnTxt:"取消",
		callback:function(r){
			if(r){
				$.ajax({
					url: '/AcpUser/ajax_del_user',
					data: {id: _id},
					success: function(data){
                        var msg = '';
						if(data == 'success'){
                            msg ="删除成功";
                        } else {
                            msg ="删除失败";
                        }
                        $.jPops.alert({
                            title:"提示",
                            content: msg,
                            okBtnTxt:"确定",
                            callback:function(){
                                location.href="/AcpUser/get_all_user_list?r=" + Math.random();
                                return true;
                            }
                        });
					}
				});
			}
			return true;
		}
	});
}

function general_code(id)
{
    if (!id) {
        alert('出错啦');
    }
    var url_link = url + '?register_p=' + id;
    $.jPops.custom({
		title:"二维码链接地址",  
		content:url_link,
		okBtnTxt:"确定",  
        cancelBtnTxt:"取消",  
        callback:function(r)
        {
            return true;
        } 
    });

}
</script>
 

</body>
</html>
<?php }} ?>