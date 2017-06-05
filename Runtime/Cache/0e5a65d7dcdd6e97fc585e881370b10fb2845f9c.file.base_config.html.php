<?php /* Smarty version Smarty-3.1.6, created on 2017-03-03 22:04:20
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpConfig/base_config.html" */ ?>
<?php /*%%SmartyHeaderCode:198038140057b1b9ef8fe994-89964331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e5a65d7dcdd6e97fc585e881370b10fb2845f9c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpConfig/base_config.html',
      1 => 1488549800,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198038140057b1b9ef8fe994-89964331',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b1b9efbd3f7',
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
<?php if ($_valid && !is_callable('content_57b1b9efbd3f7')) {function content_57b1b9efbd3f7($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
					
<form id='base_config' action='' method='POST'>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span> 系统名称：</label>  
    <div class="form-controls">  
        <input type="text" name='s_name' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['SHOP_NAME'];?>
' placeholder="">
        <span class="fi-help-text"></span>  
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name">公司名称：</label>  
    <div class="form-controls">  
        <input type="text" name='company_name' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['COMPANY_NAME'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">公司地址：</label>  
    <div class="form-controls">  
        <input type="text" name='customer_service_address' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['CUSTOMER_SERVICE_ADDRESS'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">短信验证服务UID：</label>  
    <div class="form-controls">  
        <input type="text" name='sms_uid' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['SMS_UID'];?>
' placeholder="">  
    	<span class="fi-help-text"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">短信服务KEY：</label>  
    <div class="form-controls">  
        <input type="text" name='sms_key' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['SMS_KEY'];?>
' placeholder="">  
    	<span class="fi-help-text"></span>
    </div>  
</div> 

<!--
<div class="formitems inline">  
    <label class="fi-name">客服邮件地址：</label>  
    <div class="form-controls">  
        <input type="text" name='service_email' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['CUSTOMER_SERVICE_EMAIL'];?>
' placeholder="">  
    	<span class="fi-help-text"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">客服电话：</label>  
    <div class="form-controls">  
        <input type="text" name='service_tel' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['CUSTOMER_SERVICE_TELEPHONE'];?>
' placeholder="">  
    	<span class="fi-help-text"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">客服传真：</label>  
    <div class="form-controls">  
        <input type="text" name='service_fax' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['CUSTOMER_SERVICE_FAX'];?>
' placeholder="">  
    	<span class="fi-help-text"></span>
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name">全国投诉热线：</label>  
    <div class="form-controls">  
        <input type="text" name='complaints_hotline' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['COMPLAINTS_HOTLINE'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name">订货热线：</label>  
    <div class="form-controls">  
        <input type="text" name='order_hotline' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['ORDER_HOTLINE'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name">售后热线：</label>  
    <div class="form-controls">  
        <input type="text" name='service_hotline' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['SERVICE_HOTLINE'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name">客服QQ总号：</label>  
    <div class="form-controls">  
        <input type="text" name='customer_service_qq' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['CUSTOMER_SERVICE_QQ'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div>-->
<div class="formitems inline">  
    <label class="fi-name">暂时关闭网站：</label>  
    <div class="form-controls">  
        <div class="radio-group">  
            <label><input type="radio" name="sys_open" value='0' <?php if ($_smarty_tpl->tpl_vars['config']->value['SYSTEM_OPEN']==0){?>checked="checked"<?php }?>>是</label>  
            <label><input type="radio" name="sys_open" value='1' <?php if ($_smarty_tpl->tpl_vars['config']->value['SYSTEM_OPEN']==1){?>checked="checked"<?php }?>>否</label>   
        </div>  
    </div>  
</div>
<div class="formitems inline reason <?php if ($_smarty_tpl->tpl_vars['config']->value['SYSTEM_OPEN']==1){?>hide<?php }?>">  
    <label class="fi-name">关闭后提示信息：</label>   
    <div class="form-controls">  
        <textarea name="close_reason" id="close_reason"><?php echo $_smarty_tpl->tpl_vars['config']->value['SYSTEM_CLOSE_REASON'];?>
</textarea>  
        <span class="fi-help-text">一般在200字以内</span>  
    </div>    
</div>
<!--
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span> 本店价格前台显示名称：</label>  
    <div class="form-controls">  
        <input type="text" name='mall_price_name' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['MALL_PRICE_NAME'];?>
' placeholder="">
        <span class="fi-help-text"></span>  
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span> 实际拿货价前台显示名称：</label>  
    <div class="form-controls">  
        <input type="text" name='real_price_name' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['REAL_PRICE_NAME'];?>
' placeholder="">
        <span class="fi-help-text"></span>  
    </div>  
</div>
-->
<div class="formitems inline">  
    <label class="fi-name">底部备案：</label>  
    <div class="form-controls">  
        <input type="text" name='official_record' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['OFFICIAL_RECORD'];?>
' placeholder="">  
        <span class="fi-help-text"></span>
    </div>  
</div>


<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span> 系统内部交易货币名称：</label>  
    <div class="form-controls">  
        <input type="text" name='system_money_name' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['SYSTEM_MONEY_NAME'];?>
' placeholder="">
        <span class="fi-help-text"></span>  
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>系统货币与人民币的兑换比：</label>  
    <div class="form-controls">  
        1RMB = <input type="text" name='rmb_exchange_prop' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['RMB_EXCHANGE_PROP'];?>
' placeholder="" class="mini"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>

        <span class="fi-help-text"></span>  
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>微信充值人民币的兑换比：</label>  
    <div class="form-controls">  
        1RMB = <input type="text" name='rmb_exchange_prop_wxpay' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['RMB_EXCHANGE_PROP_WXPAY'];?>
' placeholder="" class="mini"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>

        <span class="fi-help-text"></span>  
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>支付宝充值人民币的兑换比：</label>  
    <div class="form-controls">  
        1RMB = <input type="text" name='rmb_exchange_prop_alipay' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['RMB_EXCHANGE_PROP_ALIPAY'];?>
' placeholder="" class="mini"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>

        <span class="fi-help-text"></span>  
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>金币最低金额：</label>  
    <div class="form-controls">  
        <input type="text" name='limit_recharge_money' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['LIMIT_RECHARGE_MONEY'];?>
' placeholder="" class="mini"> 元
        <span class="fi-help-text"></span>  
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>支付宝账号：</label>  
    <div class="form-controls">  
        <input type="text" name='alipay' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['ALIPAY'];?>
' placeholder="" class="large">
        <span class="fi-help-text"></span>  
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>抽水比例：</label>  
    <div class="form-controls">  
        <input type="text" name='draw_prop' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['DRAW_PROP'];?>
' placeholder="" class="mini">%
        <span class="fi-help-text"></span>  
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>冠军猜单个队伍投注上限：</label>  
    <div class="form-controls">  
        <input type="text" name='max_champion_bat' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['MAX_CHAMPION_BAT'];?>
' placeholder="" class="mini"><?php echo $_smarty_tpl->tpl_vars['system_config']->value['SYSTEM_MONEY_NAME'];?>

        <span class="fi-help-text"></span>  
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>红黑榜文字提示：</label>  
    <div class="form-controls">  
        <input type="text" name='week_alert' value='<?php echo $_smarty_tpl->tpl_vars['config']->value['WEEK_ALERT'];?>
' placeholder="" class="xxlarge">
        <span class="fi-help-text"></span>  
    </div>  
</div>

<!--<div class="formitems inline" id="qr_code">
    <label class="fi-name">网站logo：</label>
    <div class="form-controls">
        <ul class="fi-imgslist">
            <li class="preview fi-imgslist-item pic<?php if (!$_smarty_tpl->tpl_vars['config']->value['qr_code']||!file_exists($_smarty_tpl->tpl_vars['logo_path']->value)){?> hide<?php }?>" style="">
                <div>
                    <img class="J_Preview" style="height:69px;" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['qr_code'];?>
"/>
                </div>
                <input type="hidden" name="qr_code" class="J_ImgUrl" data-id="<?php if ($_smarty_tpl->tpl_vars['config']->value['qr_code']){?><?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['qr_code'];?>
" />
                <a href="javascript:;" class="del J_Del" title="删除这张图"><i class="gicon-remove" onclick="delImage('qr_code');"></i></a>
                <img src="__IMAGES__/popup-loading.gif" class="J_AjaxLoading pic-loading" style="width: 32px; height: 32px;" />
                <div class="pic-mask J_Mask"></div>
            </li>
            <li class="fi-imgslist-item<?php if ($_smarty_tpl->tpl_vars['logo_path']->value&&file_exists($_smarty_tpl->tpl_vars['logo_path']->value)){?> hide<?php }?> add_li">
                <a href="javascript:;" class="add" title="上传一张新的图片" id="qr_code_uploader">+</a>
            </li>
        </ul>
        <span class="fi-help-text">（图片高度64PX，宽度自动）</span>
    </div>
</div>
-->
<div class="formitems inline">  
    <label class="fi-name"></label>  
    <div class="form-controls">
    	<input type='hidden' name='act' value='save' />
        <button type="submit" class="btn btn-blue"><i class="gicon-check white"></i>确定</button>
        <button type="reset" class="btn"><i class="gicon-repeat"></i>重置</button>
    </div>  
</div>
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
	
<script src="__JS__/jquery/ajaxupload.3.5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src='/Public/Js/common/upload_images.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
'></script>
<script>
    
    function upload_file(div_id)
    {
        // ajax上传图片
        new AjaxUpload("#" + div_id + "_uploader", {
            action: "/AcpArticleAjax/uploadHandler",
            name: "imgFile",
            responseType: "json",
            onSubmit: function(){
                //alert('正在上传');
                //preview处的图片改为loading图片
                $('#' + div_id).find('.preview').removeClass('hide');
            },
            onChange: function(file, extension){
                if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
                    return true;
                }
                else {
                    alert('暂不支持该图片格式！');
                    return false;
                }
            },
            onComplete: function(file, response){
                console.log(response);
                if (response.status === 0) {
                    alert(response.msg);
                }
                else if (response.status === 1) {
                    $('#' + div_id).find('.J_Preview').attr('src', response.img_url);
                    $('#' + div_id).find('.preview').show();
                    $('#' + div_id).find('.J_ImgUrl').val(response.img_url);
                    $('#' + div_id).find('.add_li').hide();
                }
            }
        });
    }

    function delImage(div_id)
    {
        var ajaxLoading = $('#' + div_id).find('#J_AjaxLoading');
        var preview = $('#' + div_id).find('#J_Preview');
        var param = {};
        var _id = $('#' + div_id).find('#J_ImgUrl').data('id');
        var imgUrl = $('#' + div_id).find('#J_ImgUrl').val();
        
        if (_id != '') {
            param.id = _id;
        }
        if (imgUrl != '') {
            param.img_url = imgUrl;
        }
        $.ajax({
            url: '/AcpArticleAjax/delImage',
            type: 'post',
            data: param,
            dataType: 'json',
            beforeSend: function(){
                ajaxLoading.show();
            },
            success: function(data){
            //  console.log(data);
                if (data.status === 1) {
                    $('#' + div_id).find('#J_ImgUrl').attr('data-id', '').val(null);
                    $('#' + div_id).find('#J_Del').off('click', delImage);
                    preview.removeAttr('src').parent().parent().addClass('hide');
                    $('#' + div_id).find('#' + div_id + '_uploader').parent().removeClass('hide');
                    $('#' + div_id).find('#add_li').show();
                }
                ajaxLoading.fadeOut();
            }
        });
    }

    //upload_file('qr_code');


</script>
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src='__ACPJS__/AcpConfig/edit_config.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
'></script>

</body>
</html>
<?php }} ?>