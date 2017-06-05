<?php /* Smarty version Smarty-3.1.6, created on 2016-10-09 17:18:01
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpGuessFieldQuestion/edit_guess_field_question.html" */ ?>
<?php /*%%SmartyHeaderCode:130369428657b3c3fd5baac2-03495234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbced272052c0671ee98cf0054ebb08b61494c7c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpGuessFieldQuestion/edit_guess_field_question.html',
      1 => 1476004680,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130369428657b3c3fd5baac2-03495234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b3c3fd71742',
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
<?php if ($_valid && !is_callable('content_57b3c3fd71742')) {function content_57b3c3fd71742($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
					
<form id="J_FormArticle" action="" method="post">

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed"></span>所在局名称：</label>  
    <div class="form-controls">  
        <span><?php echo $_smarty_tpl->tpl_vars['guess_field_info']->value['guess_field_name'];?>
</span>
		<span class="fi-help-text hide"></span>
    </div>  
</div> 

<?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']){?>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed"></span>局类型：</label>  
    <div class="form-controls">  
        <span><?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==1){?>让分局<?php }else{ ?>大小分局<?php }?></span>
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
<?php }?>

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>问题：</label>  
    <div class="form-controls">  
        <input type="text"  name="guess_question" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['guess_question'];?>
" class="large">
		<span class="fi-help-text hide"></span>
    </div>  
</div> 

<?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==1){?>
<div class="formitems inline lose_type">  
    <label class="fi-name"><span class="colorRed">*</span>让分类型：</label>  
    <div class="form-controls">  
        <select name="lose_type" id="lose_type">
            <option value="">--请选择--</option>
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['lose_type']==1){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['team_list']->value[0]['team_name'];?>
 让 <?php echo $_smarty_tpl->tpl_vars['team_list']->value[1]['team_name'];?>
</option>
            <option value="2" <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['lose_type']==2){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['team_list']->value[1]['team_name'];?>
 让 <?php echo $_smarty_tpl->tpl_vars['team_list']->value[0]['team_name'];?>
</option>
        </select>
		<span class="fi-help-text hide"></span>
    </div>  
</div>  
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']){?>
<div class="formitems inline lose_score">  
    <label class="fi-name"><span class="colorRed">*</span><?php if ($_smarty_tpl->tpl_vars['guess_field_info']->value['field_type']==1){?>让分<?php }else{ ?>大小分<?php }?>分数：</label>  
    <div class="form-controls">  
		<input type="text" placeholder="" class="mini" name="lose_score" id="lose_score" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['lose_score'];?>
">  
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
<?php }?>
<!--<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>问题：</label>  
    <div class="form-controls">  
        <select name="guess_question_id">
            <option value="">--请选择--</option>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_question_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['guess_question_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['guess_question_id']==$_smarty_tpl->tpl_vars['guess_field_question_info']->value['guess_question_id']){?>selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['desc'],20,"...",true);?>
</option>
            <?php } ?>
        </select>
		<span class="fi-help-text hide"></span>
    </div>  
</div> 

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>主队赔率：</label>  
    <div class="form-controls">  
        <input type="text"  name="host_odds" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['host_odds'];?>
" class="mini">
		<span class="fi-help-text hide"></span>
    </div>  
</div> 

<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>客队赔率：</label>  
    <div class="form-controls">  
        <input type="text"  name="guest_odds" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['guest_odds'];?>
" class="mini">
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
-->

<!--<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>开始时间：</label>  
    <div class="form-controls">  
        <input type="text" autocomplete="off" class="Wdate" name="start_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['guess_info']->value['start_date'],'%Y-%m-%d %H:%M:%S');?>
"  onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
-->

<div class="formitems inline">  
    <label class="fi-name">自定义队伍名：</label>  
    <div class="form-controls">  
        <div class="radio-group user_defind">  
            <label><input type="radio" name="defind_team_name" value="1"  <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['defind_team_name']==1){?>checked="checked"<?php }?>/>是</label>  
            <label><input type="radio" name="defind_team_name" value="0" <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['defind_team_name']==0){?>checked="checked"<?php }?>/>否</label>   
        </div>  
    </div>  
</div> 

<div class="formitems inline team_name" <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['defind_team_name']==0){?>style="display:none"<?php }?>>  
    <label class="fi-name"><span class="colorRed">*</span>队伍显示名：</label>  
    <div class="form-controls">  
        <input type="text" placeholder="主队显示名" class="" name="defind_host_name" id="serial" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['defind_host_name'];?>
">  
		<input type="text" placeholder="客队显示名" class="" name="defind_guest_name" id="serial" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['defind_guest_name'];?>
">  
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>排序号：</label>  
    <div class="form-controls">  
		<input type="text" placeholder="" class="mini" name="serial" id="serial" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_question_info']->value['serial'];?>
">  
		<span class="fi-help-text hide"></span>
    </div>  
</div> 

<div class="formitems inline">  
    <label class="fi-name">显示：</label>  
    <div class="form-controls">  
        <div class="radio-group">  
            <label><input type="radio" name="isuse" value="1" <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['isuse']==1){?>checked="checked"<?php }?> />是</label>  
            <label><input type="radio" name="isuse" value="0" <?php if ($_smarty_tpl->tpl_vars['guess_field_question_info']->value['isuse']==0){?>checked="checked"<?php }?>/>否</label>   
        </div>  
    </div>  
</div> 

<div class="formitems inline">  
    <label class="fi-name"></label>  
    <div class="form-controls">  
		<input type="hidden" name="act" value="add" />
        <input type="hidden" name="guess_field_id" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_id']->value;?>
" />
        <button type="submit" class="btn btn-blue"><i class="gicon-check white"></i>修改</button>  
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
	
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="__JS__/jquery/ajaxupload.3.5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script>
$(".user_defind input").on('click', function(){
    var is_defind = $(this).val();
    if (is_defind == 1) {
        $(".team_name").show();
    } else {
        $(".team_name").hide();
    }
});

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
                    $('#' + div_id).find('#J_Preview').attr('src', response.img_url);
                    $('#' + div_id).find('.preview').show();
                    $('#' + div_id).find('#J_ImgUrl').val(response.img_url);
                    $('#' + div_id).find('#add_li').hide();
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

</script>

</body>
</html>
<?php }} ?>