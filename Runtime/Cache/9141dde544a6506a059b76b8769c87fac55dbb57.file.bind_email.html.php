<?php /* Smarty version Smarty-3.1.6, created on 2016-12-14 13:41:57
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/bind_email.html" */ ?>
<?php /*%%SmartyHeaderCode:126582471857be9c8cd53aa1-37908825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9141dde544a6506a059b76b8769c87fac55dbb57' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/bind_email.html',
      1 => 1481693853,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126582471857be9c8cd53aa1-37908825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57be9c8cdfe8f',
  'variables' => 
  array (
    'version' => 0,
    'user_id' => 0,
    'wx_share_link' => 0,
    'share_info' => 0,
    'head_title' => 0,
    'signPackage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57be9c8cdfe8f')) {function content_57be9c8cdfe8f($_smarty_tpl) {?><!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="email=no" />
<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/base.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/mall_icon.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<?php if (@ACTION_NAME!='draw_prize_record'&&@ACTION_NAME!='award_record_by_prize'&&@ACTION_NAME!='my_roll'&&@ACTION_NAME!='my_qr_code'&&@ACTION_NAME!='my_recharge_back'){?>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/global.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/gy_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<?php }?>

<style type="text/css">
body{
    background:#202020;
}
</style>

<!-- 失败默认图片 -->
<script>
  function no_pic(obj) {
    obj.setAttribute("src", "/Public/Images/front/nopicture.png");
}
</script>
</head>
<body>
	
		<form id="form1">
			<div class="binding_phone">
				<input type="text" placeholder="输入电子邮箱" id="phone" name="email"/>
				<div class="binding_phone_box clearfix">
					<input class="fl"  placeholder="输入验证码" type="number" id="code" name="verify_code"></input>
					<input class="fr code_btn" onclick="get_yzm(this)" value="获取验证码" type="button" /></input>
                    <input type="hidden" name="action" value="bind"/>
				</div>
			</div>
			<input class="global_bt" id="phone_btn" type="button" value="保存"/>
		</form>
		<!-- 保存成功弹窗 -->
		<div class="keep_win clearfix">
			<i class="fl icon2 szmr"></i>
			<p class="fl">保存成功</p>
		</div>

	 <div class="refresh">
    	<img src="/Public/Images/front/front_img/icon_shuaxin.png" />
    </div>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<script>
		//var user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		////分享信息
		//var link = '<?php echo $_smarty_tpl->tpl_vars['wx_share_link']->value;?>
';
		//var img = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['pic'];?>
';
		//var title = '<?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
';
		//var desc = '<?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
';
		//var appId = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';
		//var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
		//var nonceStr = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';
		//var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';
	</script>
	<!--JS-->
    <script type="text/javascript" src="__JS__/front/front_js/jquery-3.0.0.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php if (@ACTION_NAME!='my_roll'&&@ACTION_NAME!='my_exchange'){?>
    <script type="text/javascript" src="__JS__/front/front_js/layer.m.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php }?>
    <script type="text/javascript">
    

    	$(".refresh").on("click",function(){
			location.reload()
		})
    
    </script>
    <script type="text/javascript" src="__JS__/front/front_js/common.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <!--<script src="__PUBLIC__/Js/front/jquery-1.8.2.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/html5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>-->
	<!--end js-->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	

		<script>
			// 验证码
				  var countdown=60;
			      var Emailreg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                  var times = 0;
                  function get_yzm(obj){
                      var phone = $("#phone").val();
                      if($("#phone").val().length<1){
                          layer.open({
                              content: '请输入邮箱地址',
                              btn: ['确定'],
                          });
                          $("#phone").focus();
                          return;
                      }
                      mobile = $("#phone").val();
                      if(!Emailreg.test(mobile)){
                          layer.open({
                              content: '请输入正确邮箱地址',
                              btn: ['确定'],
                          });
                          $("#phone").focus();
                          return;
                      }
                      if (times) return;
                      times = 1;
                      $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontUser/send_email_code",
                          data: "email=" +phone,
                          error: function (XMLHttpRequest, textStatus, errorThrown) { },
                          success: function (msg){
                              console.log(msg);
                              if(msg == 'failure') 
                              {
                                  settime(obj);

                                  //alert('网络故障');
                                  //window.location.reload();
                                  //return false;
                              }
                              else 
                              {
                                  settime(obj);
                              }
                          }
                      });
                  }
			      function settime(obj) {
			          if (countdown == 0) {
                          times = 0;
			              obj.removeAttribute("disabled");
			              if($(".EN").hasClass("active")){
			              obj.value="Get Auth Code";
			          	   }else{
			          	  obj.value="获取验证码";
			          	   }
			              countdown = 60;
			              obj.style.opacity= "1";
			              return;
			          } else {
			              obj.setAttribute("disabled", true);
			              obj.value= "已发送("+countdown + ")s";
			              countdown--;
			              obj.style.opacity= "1";
			          }
			      setTimeout(function() {
			          settime(obj) }
			          ,1000)
			      }
			      // 保存成功方法。
			      var keepfun = function(){
			      	$(".keep_win").show();
			      	setTimeout(function () {
					        $(".keep_win").hide();
					        // 跳转页面的
					}, 2000);
			      }

			      // 表单验证
			      $("#phone_btn").on("click",function(){
					if($("#phone").val().length<1){
						layer.open({
						content: '请输入邮箱地址',
						btn: ['确定'],
						});
					$("#phone").focus();
					return;
					}
					mobile = $("#phone").val();
					if(!Emailreg.test(mobile)){
						layer.open({
						content: '请输入正确邮箱地址',
						btn: ['确定'],
						});
					$("#phone").focus();
					return;
					}
					if($("#code").val().length<1){
						layer.open({
						content: '请输入验证码',
						btn: ['确定'],
						});
					$("#code").focus();
					return;
					}
                      $.ajax({
                          type: "POST", //用POST方式传输
                          url: "/FrontUser/bind_email",
                          data: $("#form1").serialize(),
                          error: function (XMLHttpRequest, textStatus, errorThrown) { },
                          success: function (msg){
                              console.log(msg);
                              if(msg == 'success') 
                              {
                                  keepfun();
                                  setTimeout('window.location.href="/FrontUser/setup.html"', 1000);
                              }
                              else 
                              {
                                  alert_message(msg);
                              }
                          }
                      });
					})
		</script>


</body>
</html>
 
<?php }} ?>