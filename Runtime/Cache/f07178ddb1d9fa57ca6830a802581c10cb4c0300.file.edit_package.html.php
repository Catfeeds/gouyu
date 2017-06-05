<?php /* Smarty version Smarty-3.1.6, created on 2016-08-15 17:35:50
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpPage/edit_package.html" */ ?>
<?php /*%%SmartyHeaderCode:29338794357b18cf6c3a393-17019021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f07178ddb1d9fa57ca6830a802581c10cb4c0300' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpPage/edit_package.html',
      1 => 1471252522,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29338794357b18cf6c3a393-17019021',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b18cf6dca4f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b18cf6dca4f')) {function content_57b18cf6dca4f($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
					
<style>

/*打理网店*/
.mgcon{ width:1160px; padding-left:14px;}
.mg-l{ width:810px; float:left;}
.mg-l-t{ padding:10px; border-bottom:#ddd solid 1px;}
.mg-l-t span{ display:block; line-height:20px; height:20px; font-size:18px; background:url(../../Images/mcp/mg_shop_h2.gif) scroll no-repeat 0 2px; padding-left:40px;}
/*支付宝*/
.alipay-mg{}
.alipay-nav{ border-bottom:#E7E7E7 solid 1px; padding-left:10px;height:61px;clear:both; position:relative;}
.alipay-nav ul{width:100%; height:60px;}
.alipay-nav ul li{width:100px; height:30px; padding-top:30px;float:left;margin-left:5px; margin-bottom:-1px; cursor:pointer; position:relative;}
.alipay-nav ul li span{}
.alipay-nav ul li span input{width:90px;height:24px; line-height:24px; text-align:center;}
.alipay-nav ul li span.ali-nav-t,.alipay-nav ul li span.ali-nav-i{display:block;width:100px; height:30px;line-height:30px; text-align:center;background:#E7E7E7; border-left:#E7E7E7 solid 1px;border-right:#E7E7E7 solid 1px; border-top:#ccc solid 2px;}
.alipay-nav ul li.hover span.ali-nav-t,.alipay-nav ul li.hover span.ali-nav-i{background:#FFF;border-top:#FB7126 solid 2px;}
.alipay-nav ul li span.ali-nav-i{display:block;width:100px; height:29px; padding-top:1px;}
.alipay-nav ul li i{ display:none; width:13px; height:13px; top:12px; position:absolute;background:url(../../Images/mcp/mg_platform_icon.gif) scroll no-repeat;}
.alipay-nav ul li i.move{cursor:col-resize; left:15px; background-position:0 -20px;}
.alipay-nav ul li i.del{background-position:0 -93px; left:35px;}
.alipay-nav ul li span:nth-child(2){ display:none;}
.alipay-nav .alipay-nav-add{ display:none; float: left;height: 30px;margin-bottom: -1px;margin-left: 5px;padding-top: 30px;}
.alipay-nav .alipay-nav-add a{display:block;background:url(../../Images/mcp/mg_muen_addicon.gif) scroll no-repeat; width:100px; height:30px;}
.releaseali{ width:100px; height:26px; line-height:26px; border:#3078ee solid 1px; background-color: #358ee0; color:#FFF; text-align:center; position:absolute; right:0px; top:20px; cursor:pointer;}
/**/
.alipay-meun-type{padding: 15px 0 10px; border-bottom:#CCC solid 1px;}
.alipay-meun-type a{ display:inline-block; padding:0px 10px; height:23px; line-height:23px;border: 1px solid #ccc; font-size:12px;}
.alipay-meun-type a.hover{background-color: #358ee0;border-color: #3078ee; color:#FFF;}
.alipay-meun{margin: 0 15px;}
.alipay-meun-c{ display:none; height:390px}
.alipay-meun-no{ display:none; padding-top:20px;}
.alipay-meun-have{}
.ali-meun-t{ background-color:#f1f1f1; margin-bottom:10px;}
.ali-meun-t span{ display:block; float:left; height:28px; line-height:28px;}
.ali-meun-t span.icon{ width:50px;}
.ali-meun-t span.name{width:140px;}
.ali-meun-t span.type{width:140px;}
.ali-meun-t span.xsnr{width:300px;}
.ali-meun-t span.tem{width:150px;}
.ali-meun-c{ border:#fff dashed 1px;}
.ali-meun-c ul li{height:35px; padding:10px 0; background-color:#FFF; border:#fff dashed 1px;}
.ali-meun-c-icon{ width:50px;height:35px; line-height:35px;float:left;}
.ali-meun-c-icon i{ display:none; width:13px; height:13px;background:url(../../Images/mcp/mg_platform_icon.gif) scroll no-repeat;}
.ali-meun-c-icon i.move{background-position:0 -56px; margin-right:10px;cursor:row-resize;}
.ali-meun-c-icon i.del{background-position:0 -93px; cursor:pointer;}
.ali-meun-c-name{ width:140px;height:35px; line-height:35px;float:left;}
.ali-meun-c-name-text{width:99%; height:35px; line-height:35px; overflow:hidden;}
.ali-meun-c-name-edit{width:120px;border:#d9d9d9 solid 1px;height:33px;}
.ali-meun-c-name-edit input{background:none; border:none; width:100%; height:33px; line-height:33px;}
.ali-meun-c-type{ width:140px;height:35px; line-height:35px;float:left;}
.ali-meun-c-type .ali-meun-c-type-text{}
.ali-meun-c-type .ali-meun-c-type-edit{border: 1px solid #E7E7E7;color: #666666;height: 32px;line-height: 32px;overflow: hidden;padding: 0 10px;position: relative;width: 100px;}
.ali-meun-c-type .ali-meun-c-type-edit i{border-color: #666666 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);border-style: solid;border-width: 4px;display: block;height: 0;width: 0;right: 7px;top: 14px;position: absolute;}
.ali-meun-c-type .ali-meun-c-type-edit select.ali-m-se-type{ height: 30px;left: 0;opacity: 0.00001;top: 0;width: 100%; position: absolute;}
.ali-meun-c-xsnr{width:300px;height:35px; line-height:35px;float:left;}
.ali-meun-c-xsnr-text{ width:300px;height:35px; line-height:35px; overflow:hidden;}
.ali-meun-c-xsnr-edit .textp-wap{}
.ali-meun-c-xsnr-edit .j-xsnrspan{border: 1px solid #D9D9D9;float: left;height: 32px;line-height: 32px;width: 290px;}
.ali-meun-c-xsnr-edit .j-xsnrspan span{display: block;float: left;height: 32px;line-height: 32px;}
.ali-meun-c-xsnr-edit .j-xsnrspan span.text{ width:225px; height:32px; overflow:hidden; padding-left:5px;}
.ali-meun-c-xsnr-edit .j-xsnrspan span.replace{ width:60px; background-color:#7a94b2; color:#FFF;cursor:pointer;text-align: center;}
.ali-meun-c-xsnr-edit .textp-tel{ display:none; width:230px; height:32px; border:#d9d9d9 solid 1px;}
.ali-meun-c-xsnr-edit .textp-tel input{ background:none; border:none; width:100%; height:100%;}
.ali-meun-c-xsnr-edit .textp-auto,.ali-meun-c-xsnr-edit .textp-custom{ display:none;}
.ali-meun-c-edit{ width:117px;height:40px; line-height:40px;float:left;}
.ali-meun-c-edit span{ display:block;width:97px; height:32px;}
.ali-meun-c-edit span.bind{ background:url(../../Images/mcp/mg_shop_mg.gif) scroll no-repeat; cursor:pointer;}
.ali-meun-c-edit span.unbind{ display:none;background:url(../../Images/mcp/mg_shop_mg_unb.gif) scroll no-repeat;}
.ali-meun-c-tem{ width:124px;height:32px; line-height:32px;margin-left:5px;float:left; border:#d9d9d9 solid 1px;}
.ali-meun-c-tem span{ display:block; height:32px; line-height:32px; text-align:center; float:left;}
.ali-meun-c-tem span.text{ width:80px; overflow:hidden;}
.ali-meun-c-tem span.replace{ width:44px; background-color:#7a94b2; color:#FFF; cursor:pointer;}
.ali-meun-c-tem span.unbind{ display:none;width:44px; background-color:#ccc; color:#FFF;}
.ali-navmeun-add{ display:none;padding-top: 5px;padding-left: 30px;}
.ali-navmeun-add a{display:block; background:url(../../Images/mcp/mg_muen_addicon.gif) scroll no-repeat; width:100px; height:30px;}
.alipay-button{}
.alipay-button span{ display:block; float:left; width:50px; height:24px; line-height:24px;padding: 8px 21px 0 18px;  margin-left:10px;font: 700 14px/1.2 宋体b8b\4f53,黑体ED1\4F53,verdana; text-align:center; border:#3078ee solid 1px;background-color: #358ee0; cursor:pointer; }
.alipay-button span.edit{color: white;}
.alipay-button span.fulfil{color: white; display:none;}
.alipay-button span.cancel{display:none}
.mg-r{ height: 410px;margin-left: 5px;margin-top: 10px;padding: 98px 30px 105px 41px;width: 272px; float:left; background:url(../../Images/mcp/mcp_iphone.gif) scroll no-repeat;}
.mg-r-c{ width:272px; height:410px; overflow: hidden;position:relative;}
.mg-ali-ms{width:272px; height:31px;background-color:#E7E7E7; border-top:#c7cacd solid 1px; position:absolute; left:0px; bottom:0px;}
.ali-ms-c{ width:68px; height:30px; line-height:30px; float:left; text-align:center; border-top: #F3F3F3 solid 1px; position:relative;}
.ali-ms-ct{width:63px; height:30px;  cursor:pointer; position: relative; z-index: 100; background-color:#E7E7E7;border-left:#c7cacd solid 1px;}
.ali-ms-ct span{ display: block;width:100%; height:30px;color: #6d6d6d; font-size: 11px;}
.ali-ms-cc{ width:105px; padding:5px 10px;background-color:#ebeaea; border:#bcbfc3 solid 1px; border-radius: 5px; -moz-border-radius:5px; -webkite-border-radius: 5px; position:absolute; left:-30px; bottom:-170px;}
.ali-ms-cc span{ display:block; width:105px; height:30px; line-height: 30px; overflow:hidden;font-size: 11px; color: #6d6d6d;background:url(../../Images/mcp/mg_shoujishowhe.gif) bottom scroll no-repeat;}
.ali-ms-ci{  width: 13px; height: 6px; background:url(../../Images/mcp/mcp_sanjiao.png) scroll no-repeat; position: absolute; left: 25px; /*bottom: 35px;*/}
/* 模版弹出层 */
.mg-plateshow-bg{display: none;  position: absolute; left:0px; top:0px; background:rgba(0, 0, 0, 0.4); z-index: 900;}
.mg-plateshow{display: none;position:fixed;top:65px;width:1220px; padding: 5px; height: 680px;background:rgba(0, 0, 0, 0.4);z-index: 999; margin-top: }
.mg-plateshow-c{ width:1220px; height: 635px;background-color: #f4f4f4; overflow:auto;}
.mg-plateshow-t{width:1210px; height: 45px; line-height: 45px; position: relative; padding-left: 10px; background-color: #0070d0; color: #fff; font-size: 14px; font-weight: bold;}
.mg-plateshow-t i{ display: block; width: 20px; height: 20px; cursor: pointer; position: absolute; top: 10px; right: 10px; background:url(../../Images/mcp/mg_showboxdel.gif) scroll no-repeat;}
.mg-plateshow-f{ padding: 5px 15px; position: relative;}
.mg-plateshow-ft{color: #000; font-size: 14px; font-weight: bold;}
.mg-plateshow-fc{ margin-top: 10px;}
.mg-plateshow-fct{ width: 75px; padding: 5px 0; height: 22px;line-height: 22px; float: left;}
.mg-plateshow-fcli{width: 300px;padding: 5px 0; float: left;}
.mg-plateshow-fcli ul li{ width: 22px; height: 22px; float: left; margin-right:5px;  text-align: center; line-height: 22px; color:#fff; font-size:12px;}
.mg-plateshow-fcs{width: 250px; height: 30px; border: #168bee solid 1px; float: left; background-color: #fff;}
.mg-plateshow-fcs span{ display: block; float: left; height: 30px;}
.mg-plateshow-fcs span.icon{background:url(../../Images/mcp/mg_showboxss.gif) scroll no-repeat; width: 25px;}
.mg-plateshow-fcs span.text{ width: 185px;}
.mg-plateshow-fcs span.text input{ width: 185px; height:30px; border: none; background: none;}
.mg-plateshow-fcs span.button{ width: 40px; background-color:#168bee; }
.mg-plateshow-fcs span.button input{width: 40px; height: 30px; text-align: center; line-height: 30px;border: none; background: none; color: #fff;}
.mg-plateshow-fadd{ position: absolute;right:25px;top: 15px;}
.mg-plateshow-fadd a{background-color: #168bee;display: block;font-size: 14px;height: 30px;line-height: 30px; color: #fff; font-size: 12px; margin-bottom: -1px;margin-right: 4px;width: 65px;text-align: center;}
.mg-plateshow-fadd a i{ background: url("../../Images/mcp/mg_showboxadd.gif") no-repeat scroll;display: inline-block;height: 14px;vertical-align: -3px;width: 14px;}
.mg-plateshow-l{padding: 5px 15px;}
.mg-plateshow-l ul.mg-plateshow-ul li{width:218px;height:430px; float: left; margin: 0 10px; cursor: pointer;}
.mg-pla-c{width:208px;height:363px; padding: 5px;  border-radius: 3px;}
.mg-pla-cc{width:206px;height:361px; border:#c4c3c3 solid 1px; background-color: #fff;}
.mg-pla-ccimg{width:196px;height:300px; padding: 5px; border-bottom: #e7e7e7 solid 1px;}
.mg-pla-cctitlte{width:196px;padding: 5px; height: 40px; line-height: 20px; overflow: hidden; color: #6c6d6d; font-size: 12px;}
.mg-pla-b{ width: 140px; height: 43px; line-height: 43px; margin:10px auto 0 auto;text-align: center; background-color: #c1c0bf; color: #fff;}
.mg-pla-b i{background: url("../../Images/mcp/mobanlock.png") no-repeat scroll; background-position: 0 -30px; display: inline-block;height: 30px;vertical-align: -13px;width: 25px;}
.mg-plateshow-l ul li.hover .mg-pla-c{background-color: #e3e3e3;}
.mg-plateshow-l ul li.hover .mg-pla-b{background-color: #fb8f04;}
.mg-plateshow-p{ width: 125px; margin: 0 auto;}
.mg-plateshow-p span{ display:block; float: left; width: 38px; height: 33px; line-height: 33px; text-align: center;}
.mg-plateshow-p span.up{background: url("../../Images/mcp/mg_showboxpageup.gif") no-repeat scroll;}
.mg-plateshow-p span.text{}
.mg-plateshow-p span.next{background: url("../../Images/mcp/mg_showboxpagenext.gif") no-repeat scroll;}
/*WAP-网址*/
.waplink{ width:100%;}
/**/
.waplk{background:#fff; border:#7a94b2 solid 2px; border-left-width:90px; position:relative; border-radius:5px; margin-top:10px;}
.waplk_l{ width:53px; height:53px; top:50%; margin-top:-26px; left:-72px; position:absolute; background:url(../../Images/mcp/t1_03.jpg) no-repeat scroll; height:100%;}
.waplk_r{ width:1060px; margin-left:15px;}
.waplk_r_t{background: none repeat scroll 0 0 #7A94B2;color: #FFFFFF;height: 36px;line-height: 36px;text-align: center;width: 134px;}
.waplk_r_c{}
.waplk_meun{margin:10px 0px;}
.waplk_meun a{display:inline-block;border: 1px solid #D1D1D1;height: 28px;line-height: 28px;}
.waplk_meun a span{display:block; float:left; padding:0 10px; width:120px; height:28px; overflow:hidden;}
.waplk_meun a span.xuanze{ width:75px; background-color:#d1d1d1; color:#FFF;}
.waplk_meun a.hover span.xuanze{ background:url(../../Images/mcp/waplinkabg.gif) scroll no-repeat;}
/*JS控制*/
.j-alnav{}
/*所有菜单显示*/
.j-alltext{}
/*所有菜单编辑*/
.j-alledit{ display:none;}
/*获取tab切换data*/
.j-menudata{}


</style>
<form id="form1" name="form1" method="post" action="">
	<div class="mg-plateshow-l">
		<ul class="mg-plateshow-ul clearfix">
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['package_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
			<li id="<?php echo $_smarty_tpl->tpl_vars['row']->value['templet_package_id'];?>
" onClick="change_package(this.id)" style="width:215px;" <?php if ($_smarty_tpl->tpl_vars['templet_package_id']->value==$_smarty_tpl->tpl_vars['row']->value['templet_package_id']){?>class="hover"<?php }?>>
			<div class="mg-pla-c">
				<div class="mg-pla-cc">
					<div class="mg-pla-ccimg">
						<img width="196" height="300" src="<?php echo $_smarty_tpl->tpl_vars['crm_host']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['image'];?>
">
					</div>
					<div class="mg-pla-cctitlte">
						<?php echo $_smarty_tpl->tpl_vars['row']->value['templet_package_name'];?>

					</div>
				</div>
			</div>
			<div class="mg-pla-b" <?php if ($_smarty_tpl->tpl_vars['templet_package_id']->value==$_smarty_tpl->tpl_vars['row']->value['templet_package_id']){?>style="background-color:#fb8f04;"<?php }?>>
				<?php if ($_smarty_tpl->tpl_vars['templet_package_id']->value==$_smarty_tpl->tpl_vars['row']->value['templet_package_id']){?>已<?php }else{ ?>未<?php }?>启用
			</div>
			</li>
			<?php } ?>
		</ul>
	</div>
	<input type="hidden" name="templet_package_id" id="templet_package_id">
	<input type="hidden" name="act" id="act" value="save">
</form>

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
	
<script>
function change_package(id)
{
	if (id != "<?php echo $_smarty_tpl->tpl_vars['templet_package_id']->value;?>
" && confirm('启用后前台该页面将变为当前模板效果，确定要执行该操作吗？'))
	{
		$('#templet_package_id').val(id);
		$('#form1').submit();
	}
}
</script>

</body>
</html>
<?php }} ?>