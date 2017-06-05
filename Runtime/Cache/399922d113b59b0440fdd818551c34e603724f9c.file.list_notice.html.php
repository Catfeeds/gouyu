<?php /* Smarty version Smarty-3.1.6, created on 2016-08-22 15:38:06
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpNotice/list_notice.html" */ ?>
<?php /*%%SmartyHeaderCode:154173562557baabde3036b5-30650213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '399922d113b59b0440fdd818551c34e603724f9c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpNotice/list_notice.html',
      1 => 1471252520,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154173562557baabde3036b5-30650213',
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
  'unifunc' => 'content_57baabde5ddda',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57baabde5ddda')) {function content_57baabde5ddda($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpNotice/list_notice_cloud.css" type="text/css" />

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
					
<div class="t-art" style="margin-bottom:10px;"><a href="/AcpNotice/add_notice" class="btn btn-blue"><i class="gicon-plus white"></i>添加公告</a>  </div>
<div class="tablesWrap">  
    <div class="tables-searchbox"> 
	<form name="form1" action="/AcpNotice/list_notice" method="get">
        <div class="t-list">
            <span class="tbs-txt">标题：</span>  
            <input type="text" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
        </div>
        <div class="t-list">
            <span class="tbs-txt">公告分类：</span>  
            <select class="small" name="sort_id" id="sort_id">  
                <option value="0">--请选择--</option> 
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['notice_category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['notice_category_option_selected']->value),$_smarty_tpl);?>

            </select>
        </div>  
        <div class="t-list t-list-w">
            <div class="formitems inline">  
                <label class="fi-name" style="width:40px; font-weight:normal;">时间：</label>  
                <div class="form-controls" style="margin-left:40px;">  
                    <input type="text" name="begin_time" id="begin_time" value="<?php echo $_smarty_tpl->tpl_vars['begin_time']->value;?>
" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">  
                    <span class="fi-text">至</span>  
                    <input type="text" name="end_time" id="end_time" value="<?php echo $_smarty_tpl->tpl_vars['end_time']->value;?>
" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">  
                </div>  
            </div> 
        </div> 
        <div class="t-list">
			<input type="hidden" name="act" value="submit" />
            <button class="btn" type="submit"><i class="gicon-search"></i>搜索</button> 
        </div>    
	</form>
    </div>  
    <!-- end tables-searchbox -->  
    <table class="wxtables">  
        <colgroup>  
        <col width="5%">  
        <col width="35%">  
        <col width="15%">  
        <col width="15%">
        <col width="10%">  
        <col width="5%">     
        <col width="15%">  
        </colgroup>  
        <thead>  
            <tr>  
                <td>选择</td>  
                <td>标题</td>  
                <td>公告分类</td>  
                <td>添加日期</td>  
                <td>浏览量</td> 
                <td>排序</td>  
                <td>操作</td>  
            </tr>  
        </thead>  
        <tbody>  
		<?php if ($_smarty_tpl->tpl_vars['general_notice_list']->value){?>
		<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['general_notice_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
            <tr>  
                <td class="_checkbox">  
                    <input type="checkbox" class="checkbox" name="checkIds[]" value="<?php echo $_smarty_tpl->tpl_vars['this']->value['notice_id'];?>
">  
                </td>  
                <td><a href="/Notice/notice_display/id/<?php echo $_smarty_tpl->tpl_vars['this']->value['notice_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['this']->value['title'];?>
</a></td>  
                <td><?php echo $_smarty_tpl->tpl_vars['this']->value['notice_sort_name'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['this']->value['addtime'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['this']->value['clickdot'];?>
</td>  
                <td class="serial">
					<img src="__IMAGES__/ajax-loading.gif" class="hide" id="ajax-loading" />
					<input type="text" class="mini" style="width:40px; text-align:center; border-color: #fff;" value="<?php echo $_smarty_tpl->tpl_vars['this']->value['serial'];?>
" onblur="setSerial(<?php echo $_smarty_tpl->tpl_vars['this']->value['notice_id'];?>
, this);" />
				</td>   
                <td>  
                    <a href="__APP__/AcpNotice/edit_notice/id/<?php echo $_smarty_tpl->tpl_vars['this']->value['notice_id'];?>
" class="btn" title="编辑"><i class="gicon-edit black"></i>编辑</a>   
                    <a href="javascript:;" onclick="delNotice(<?php echo $_smarty_tpl->tpl_vars['this']->value['notice_id'];?>
, this);" class="btn" title="删除"><i class="gicon-trash black"></i>删除</a>    
                </td>  
            </tr>  
		<?php } ?>
		<?php }else{ ?>
			<tr>
			<?php if ($_smarty_tpl->tpl_vars['is_search']->value){?>
				<td colspan="7" class="center">暂未搜索到相关公告，您可以尝试其他搜索</td>
			<?php }else{ ?>
				<td colspan="7" class="center">暂无公告，您可以<a href="__APP__/AcpNotice/add_notice">添加公告</a></td>
			<?php }?>
			</tr>
		<?php }?>
        </tbody>  
    </table>  
    <!-- end wxtables -->  
	<?php if ($_smarty_tpl->tpl_vars['general_notice_list']->value){?>
    <div class="tables-btmctrl clearfix">  
        <div class="fl">  
            <a href="javascript:selall()" class="btn btn-blue">全选</a>  
            <a href="javascript:clearall()" class="btn btn-blue">取消</a>  
            <a href="javascript:;" onclick="delNoticeBatch();" class="btn btn-blue">删除</a>  
        </div>  
        <div class="fr">  
            <div class="paginate">  
                <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

            </div>  
            <!-- end paginate -->  
        </div>  
    </div>  
	<?php }?>
    <!-- end tables-btmctrl -->  
</div>  
<!-- end tablesWrap -->    

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
<script type="text/javascript" src="__ACPJS__/AcpNotice/notice.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

</body>
</html>
<?php }} ?>