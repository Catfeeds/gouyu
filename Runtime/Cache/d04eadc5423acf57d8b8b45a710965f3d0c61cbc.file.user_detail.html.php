<?php /* Smarty version Smarty-3.1.6, created on 2016-08-28 13:53:01
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpUser/user_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:136480465157c27c3d415f93-03225598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd04eadc5423acf57d8b8b45a710965f3d0c61cbc' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpUser/user_detail.html',
      1 => 1471252525,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136480465157c27c3d415f93-03225598',
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
  'unifunc' => 'content_57c27c3d65276',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57c27c3d65276')) {function content_57c27c3d65276($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpOrder/order_detail.css" type="text/css" />

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
					
<div class="t-detail-top">
	<div class="top-tit">
		当前用户状态：<?php echo $_smarty_tpl->tpl_vars['user_info']->value['is_enable'];?>

	</div>
</div>
<div class="t-detail-goods">
    <div class="t-detail-goods-tit mag">基本信息：</div>
    <div class="t-detail-goods-con t-buser">
    	<table class="wxtables tables-form">  
            <colgroup>  
                <col width="10%">  
                <col width="90%">   
            </colgroup>  
            <tbody>  
                <!-- <tr>  
                    <td class="tables-form-title">微信头像：</td>  
					<td><img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" style="width:50px;"></td> 
                </tr> --> 
                <tr>  
                    <td class="tables-form-title">加盟商：</td>  
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['nickname']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
<?php }else{ ?>--<?php }?></td>   
                </tr> 
                <tr>
                    <td class="tables-form-title">联系人：</td>  
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['realname']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
<?php }else{ ?>--<?php }?></td>
                </tr>
                <tr>
                    <td class="tables-form-title">手机号：</td>  
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['mobile']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
<?php }else{ ?>--<?php }?></td>
                </tr>
                <tr>
                    <td class="tables-form-title">邮箱：</td>  
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['email']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
<?php }else{ ?>--<?php }?></td>
                </tr>
                <tr>
                    <td class="tables-form-title">加盟时间：</td>  
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['reg_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user_info']->value['reg_time'],"%Y-%m-%d %H:%M:%S");?>
<?php }else{ ?>--<?php }?></td>
                </tr>
                <tr>  
                    <td class="tables-form-title">QQ：</td>  
                    <td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['qq']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['qq'];?>
<?php }else{ ?>--<?php }?></td>   
                </tr>
                <tr>  
                    <td class="tables-form-title">用户类型：</td>  
                    <td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_type']){?>系统内用户<?php }else{ ?>系统外用户<?php }?></td>   
                </tr>
                <tr>  
                    <td class="tables-form-title">门店编号：</td>  
                    <td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['store_sn']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['store_sn'];?>
<?php }else{ ?>--<?php }?></td>   
                </tr>
                <tr>  
                    <td class="tables-form-title">大区：</td>  
                    <td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['big_area_name']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['big_area_name'];?>
<?php }else{ ?>--<?php }?></td>   
                </tr>
                <tr>  
                    <td class="tables-form-title">省市县：</td>  
                    <td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['area_string']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['area_string'];?>
<?php }else{ ?>--<?php }?></td>   
                </tr>
            </tbody>  
        </table>   
    </div>

	<div class="t-detail-goods-tit mag">财务信息：</div>
    <div class="t-detail-goods-con t-buser">
    	<table class="wxtables tables-form">  
            <colgroup>  
                <col width="10%">  
                <col width="90%">   
            </colgroup>  
            <tbody>  
                <tr>
                    <td class="tables-form-title">用户等级：</td>  
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['rank_name']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['rank_name'];?>
<?php }else{ ?>--<?php }?></td>
                </tr>
                <tr>  
					<td class="tables-form-title">剩余<?php echo $_smarty_tpl->tpl_vars['SYSTEM_MONEY_NAME']->value;?>
：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['left_money'];?>
</td>
                </tr>  
                <!-- <tr>  
                    <td class="tables-form-title">已消费金额：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['consumed_money'];?>
</td> 
                </tr> --> 
                <tr>  
                    <td class="tables-form-title">积分余额：</td>  
                    <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['left_integral'];?>
</td> 
                </tr>
            </tbody>  
        </table>   
    </div>

	<div class="t-detail-goods-tit mag">收货信息：</div>
    <div class="t-detail-goods-con t-buser">
    	<table class="wxtables tables-form">  
            <colgroup>  
                <col width="10%">
                <col width="90%">
            </colgroup>  
            <tbody>  
                <tr>  
                    <td class="tables-form-title">收货地址：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['area_string'];?>
<?php echo $_smarty_tpl->tpl_vars['user_info']->value['address'];?>
</td>   
                </tr>  
            </tbody>  
        </table>   
    </div>
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
	

<style>
#jpops .fi-name{width:100px;}
#jpops .form-controls{margin-left:100px;}
</style>
 

</body>
</html>
<?php }} ?>