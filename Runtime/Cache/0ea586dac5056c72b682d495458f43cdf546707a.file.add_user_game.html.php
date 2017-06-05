<?php /* Smarty version Smarty-3.1.6, created on 2016-10-13 09:07:38
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/add_user_game.html" */ ?>
<?php /*%%SmartyHeaderCode:17895903057be5632d54ff7-22752757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ea586dac5056c72b682d495458f43cdf546707a' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontUser/add_user_game.html',
      1 => 1476319532,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1476005410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17895903057be5632d54ff7-22752757',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57be5632d9cf8',
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
<?php if ($_valid && !is_callable('content_57be5632d9cf8')) {function content_57be5632d9cf8($_smarty_tpl) {?><!doctype html>
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
			
		<form action="" method="POST" id="form1">
			<div class="game_name_box clearfix">
				<label for="game_name" class="fl">游戏名称</label>
				<select id="game_name" name="game_id" class="fl">
					<option value ="0">选择游戏名称</option>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['game_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <option value ="<?php echo $_smarty_tpl->tpl_vars['item']->value['game_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['game_name'];?>
</option>
                    <?php } ?>
				</select>
			</div>
			<div class="game_id_box clearfix">
				<label for="game_id" class="fl">游戏ID号</label>
				<input type="text" id="game_id" placeholder="数字ID号＋游戏昵称" name="game_account" class="fl"/>
			</div>
			<div class="game_id_box clearfix">
				<label for="game_url" class="fl" style="width:27%">Steam URL</label>
				<input type="text" id="game_url" placeholder="输入Steam URL(必填)" name="steam_url" class="fl" style="width:73%"/>
			</div>
			<h1 class="url_hint">注意：请正确填写Steam URL，自动发货即将上线<br>(可百度"Steam URL")查找教程</h1>
            <input type="hidden" name="act" value="add">
			<input class="global_bt" id="game_bt" type="button" value="提交" style="margin-top: 1rem;"/>
		</form>

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
		   // var url="/^https:\/\/steamcommunity\.com\/tradeoffer/"

			$("#game_bt").on("click",function(){
				var url="https://steamcommunity.com/tradeoffer";
				if($("#game_name").val()=="0"){
					layer.open({
					content: '请选择游戏名称',
					btn: ['确定'],
					});
				return;
				}
				if($("#game_id").val().length<1){
					layer.open({
					content: '请输入游戏ID号',
					btn: ['确定'],
					});
				$("#game_id").focus();
				return;
				}
				if($("#game_url").val().length<1){
					layer.open({
					content: '请输入Steam URL',
					btn: ['确定'],
					});
				$("#game_url").focus();
				return;
				}
				if(!$("#game_url").val().indexOf(url)=="0"){
					layer.open({
					content: '您填写的steam URL格式不正确',
					btn: ['确定'],
					});
				$("#game_url").focus();
				return;
				}
                ajax_submit('/FrontUser/add_user_game', $("#form1").serialize(), '/FrontUser/user_game_list.html', '添加成功');
			})
		</script>

</body>
</html>
 
<?php }} ?>