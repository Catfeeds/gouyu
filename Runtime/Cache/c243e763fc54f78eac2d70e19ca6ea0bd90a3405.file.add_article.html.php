<?php /* Smarty version Smarty-3.1.6, created on 2016-08-23 16:41:21
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpArticle/add_article.html" */ ?>
<?php /*%%SmartyHeaderCode:196235828157baabe1b1a496-34587804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c243e763fc54f78eac2d70e19ca6ea0bd90a3405' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpArticle/add_article.html',
      1 => 1471941501,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196235828157baabe1b1a496-34587804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57baabe1ce025',
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
<?php if ($_valid && !is_callable('content_57baabe1ce025')) {function content_57baabe1ce025($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_html_options')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/function.html_options.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpArticle/add_article.css"  type="text/css"/>

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
    <label class="fi-name"><span class="colorRed">*</span>标题：</label>  
    <div class="form-controls">  
        <input type="text" placeholder="" class="xlarge" name="title" id="title">  
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>所属栏目：</label>  
    <div class="form-controls">  
        <select name="sort_id" id="sort_id" onchange="show_rule_sort(this)">  
            <option value="">--请选择--</option>
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['article_category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['sort_id']->value),$_smarty_tpl);?>

        </select>   
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
<div class="formitems inline rule">  
    <label class="fi-name"><span class="colorRed">*</span>规则用于：</label>  
    <div class="form-controls">  
        <select name="rule_type" id="rule_type">  
            <option value="">--请选择--</option>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rule_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
            <?php } ?>
        </select>   
		<span class="fi-help-text hide"></span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">作者：</label>  
    <div class="form-controls">  
        <input type="text" placeholder="" name="author" id="author"> 
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">来源：</label>  
    <div class="form-controls">  
        <input type="text" placeholder="" name="article_source" id="article_source"> 
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">排序：</label>  
    <div class="form-controls">  
        <input type="text" placeholder="" style="width:45px;" name="serial" id="serial"> 
    </div>  
</div>
<div class="formitems inline">  
    <label class="fi-name">显示：</label>  
    <div class="form-controls">  
        <div class="radio-group">  
            <label><input type="radio" name="isuse" value="1" checked="checked" />是</label>  
            <label><input type="radio" name="isuse" value="0" />否</label>   
        </div>  
    </div>  
</div> 
<div class="formitems inline">
	<label class="fi-name">缩略图：</label>
	<div class="form-controls">
		<ul class="fi-imgslist">
			<li class="fi-imgslist-item pic hide">
				<div class="pic-wrap">
					<img id="J_Preview" class="pic-preview" />
				</div>
				<input type="hidden" name="img_url" data-id="" id="J_ImgUrl" />
				<a href="javascript:;" class="del" id="J_Del" title="删除这张图"><i class="gicon-remove"></i></a>
				<img src="__IMAGES__/popup-loading.gif" id="J_AjaxLoading" class="pic-loading" style="width: 32px; height: 32px;" />
				<div class="pic-mask" id="J_Mask"></div>
			</li>
			<li class="fi-imgslist-item">
				<a href="javascript:;" class="add" title="上传一张新的图片" id="J_Uploader">+</a>
			</li>
		</ul>
		<span class="fi-help-text">文章列表的缩略图，暂时只支持上传单张2M以内JPEG,PNG,GIF格式图片</span>
	</div>
</div>
<div class="formitems inline">  
    <label class="fi-name">页面关键字：</label>  
    <div class="form-controls">  
        <input type="text" placeholder="" class="xlarge" name="keywords" id="keywords"> 
        <span style="color:#ddd;">多个用"|"分隔</span>
    </div>  
</div> 
<div class="formitems inline">  
    <label class="fi-name">页面描述：</label>  
    <div class="form-controls">  
        <textarea name="description" id="description"></textarea>   
    </div>  
</div> 
<!--<div class="formitems inline">  
    <label class="fi-name">文章内容：</label>  
    <div class="form-controls" id="J_KindEditor">  
        <textarea name="contents" id="contents" class="large"></textarea>
    </div>  
    </div>--> 
<div class="formitems inline">  
    <label class="fi-name">文章内容：</label>  
    <div class="form-controls" id="J_KindEditor">  
        <script id="editor" name="contents" type="text/plain" style="width:700px;height:500px;"></script>
    </div>  
</div>  
<div class="formitems inline">  
    <label class="fi-name"></label>  
    <div class="form-controls">  
		<input type="hidden" name="act" value="submit" />
        <button type="submit" class="btn btn-blue"><i class="gicon-check white"></i>保存</button>  
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
	
<!-- 编辑器 -->
<script type="text/javascript" charset="utf-8" src="__UE__/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__UE__/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="__UE__/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="__JS__/jquery/ajaxupload.3.5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="__ACPJS__/AcpArticle/article_save.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script>
    UE.getEditor('editor');

$(".rule").hide();
//选择规则时的方法
function show_rule_sort(obj)
{
    var sort_id = $(obj).val();
    if (sort_id == 3) {
        $(".rule").show();   
    } else {
        $(".rule").hide();
    }
}
</script>

</body>
</html>
<?php }} ?>