<?php /* Smarty version Smarty-3.1.6, created on 2016-08-15 17:24:00
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/Login/index.html" */ ?>
<?php /*%%SmartyHeaderCode:125015334257b18a30c9d244-97457595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20aa61a099e9005624c5ca2a57d2ea9f905797d4' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/Login/index.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125015334257b18a30c9d244-97457595',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'system_config' => 0,
    'jifen' => 0,
    'redirect' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b18a30d06d1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b18a30d06d1')) {function content_57b18a30d06d1($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录 - <?php echo $_smarty_tpl->tpl_vars['system_config']->value['SHOP_TITLE'];?>
</title>
	<link rel="stylesheet" href="__CSS__/login/login-min.css">
	<link rel="stylesheet" href="__PLG__/jPops/jquery.jpops.min-v3.css">
</head>
<body>
	<div class="lgbox">
		<h1><a href="/" class="lgbox-logo">比昂软件</a></h1>
		<div class="lgbox-form">
			<h2 class="lgbox-form-title"><?php if ($_smarty_tpl->tpl_vars['jifen']->value){?>积分管理员登录<?php }else{ ?>管理员登录<?php }?></h2>
			<form name="form1" id="form1" method="post" action="">
				<div class="formitems inline">  
				    <div class="form-controls">  
				        <input type="text" placeholder="用户名" name="user" id="user" class="input">  
				        <span class="fi-help-text hide"></span>  
				    </div>  
				</div> 
				<div class="formitems inline">  
				    <div class="form-controls">  
				        <input type="password" placeholder="密码" name="pass" id="pass" class="input">  
				        <span class="fi-help-text hide"></span>  
				    </div>  
				</div>
				<div class="formitems inline">  
				    <div class="form-controls">  
				        <input type="text" name="vdcode" id="vdcode" placeholder="验证码" class="input special">
				        <img id="verifyImg" src='__APP__/Public/verify/' onclick="this.src=this.src+'?'+Math.random()"   alt="看不清？点击更换" />
				        <a href="javascript:;" onClick="fleshVerify()">看不清？</a> 
				        <span class="fi-help-text hide"></span>
				    </div>  
				</div>
				<div class="formitems inline">
					<input type="hidden" name="ajax" value="1">
                    <input type="hidden" name="act" value="submit">
                    <input type="hidden" name="redirect" value="<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
" />
					<input type="submit" name="submit" value="登录" id="submit_b" />
				</div>
			</form>
		</div>
		<!-- end lgbox-form -->
	</div>
	<!-- end lgbox -->

	<div class="copyright">
		&copy; <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['system_config']->value['CUR_TIME'],"%Y");?>
 Copyright <?php echo $_smarty_tpl->tpl_vars['system_config']->value['WEBSITE_DOMAIN'];?>
 All Rights Reserved</div>
	</div>

	<script src="__JS__/jquery/jquery-1.8.3.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/jquery/jquery.validate-min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/jquery/jquery.form.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PLG__/jPops/jquery.jpops.min-v3.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/login/login-min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

	<script>
	var app="__APP__";
	</script>

</body>
</html>
<?php }} ?>