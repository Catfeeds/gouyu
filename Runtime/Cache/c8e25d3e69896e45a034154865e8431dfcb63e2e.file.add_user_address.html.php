<?php /* Smarty version Smarty-3.1.6, created on 2016-08-25 17:10:58
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontAddress/add_user_address.html" */ ?>
<?php /*%%SmartyHeaderCode:193060633457beab26713132-56499370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8e25d3e69896e45a034154865e8431dfcb63e2e' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontAddress/add_user_address.html',
      1 => 1472116256,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1472094527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193060633457beab26713132-56499370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57beab267ceeb',
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
<?php if ($_valid && !is_callable('content_57beab267ceeb')) {function content_57beab267ceeb($_smarty_tpl) {?><!doctype html>
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
<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
<!-- CSS -->
<link rel="stylesheet" href="__CSS__/front/front_css/base.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<link rel="stylesheet" href="__CSS__/front/front_css/mall_icon.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/global.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__CSS__/front/front_css/gy_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>

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
		
		<form id="form1" action="" method="post">
		<ul class="add_take">
			<li class="clearfix">
				<label for="take_name" class="fl">收件人</label>
				<input type="text" placeholder="请输入姓名" class="fl" id="take_name" name="realname"/>
			</li>
			<li class="clearfix">
				<label  class="fl" for="take_phone" >手机号码</label>
				<input type="number" placeholder="输入手机号" class="fl" id="take_phone" name="mobile"/>
			</li>
			<li class="clearfix">
				<label for="take_phone" class="fl">收件地区</label>
				<select class="fl  add_select" name="province_id" id="province_id">
					<option value ="0" >省</option>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <option value ="<?php echo $_smarty_tpl->tpl_vars['item']->value['province_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['province_name'];?>
</option>
                    <?php } ?>
				</select>
				<select class="fl  add_select" name="city_id" id="city_id">
					<option value ="0">市</option>
				</select>
				<select class="fl  add_select" name="area_id" id="area_id">
					<option value ="0">区</option>
				</select>
			</li>
			<li class="clearfix">
				<label for="take_site" class="fl">详细地址</label>
				<input type="text" placeholder="输入详细地址" class="fl" id="site" name="address"/>
			</li>
		</ul>
		<a class="default clearfix  " href="javascript:;">
			<i class="icon2 wx fl" id="fx"></i>
			<p class="fl">设为默认地址</p>
			<input type="hidden" name="is_default" id="is_default" value="0"/>
		</a>
		<input class="global_bt" id="take_bt" type="button" value="保存"/>
        <input type="hidden" name="act" value="add"/>
		</form>

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
    <script type="text/javascript" src="__JS__/front/front_js/layer.m.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
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
			$(".default").on("click",function(){
				if($("#fx").hasClass("fwx")){
					$("#fx").removeClass("fwx");
					$("#fx").addClass("wx");
                    $("#is_default").val(0);
				}else{
					$("#fx").removeClass("wx");
					$("#fx").addClass("fwx");
                    $("#is_default").val(1);
				}
			})
			// 表单验证
			var telreg = /^1[23456789]\d<?php echo 9;?>
$/;
			$("#take_bt").on("click",function(){
				if($("#take_name").val().length<1){
					layer.open({
					content: '请输入收件人姓名',
					btn: ['确定'],
					});
				$("#take_name").focus();
				return;
				}
				if($("#take_phone").val().length<1){
					layer.open({
					content: '请输入收件人联系方式',
					btn: ['确定'],
					});
				$("#take_phone").focus();
				return;
				}
				mobile = $("#take_phone").val();
				//if(!telreg.test(mobile)){
				//	layer.open({
				//	content: '请输入正确的联系方式',
				//	btn: ['确定'],
				//	});
				//$("#take_phone").focus();
				//return;
				//}
				$("select").each(function(){
					if($(this).val()=="0"){
						layer.open({
						content: '请填写收件地区',
						btn: ['确定'],
						});
					return;
					}else{

					}
				})
				if($("#site").val().length<1){
					layer.open({
					content: '请输入详细地址',
					btn: ['确定'],
					});
				$("#site").focus();
				return;
				}

                //提交表单
                $("#form1").submit();
				})
		</script>

</body>
</html>
 
<?php }} ?>