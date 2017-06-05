<?php /* Smarty version Smarty-3.1.6, created on 2016-09-23 18:12:53
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpItem/get_item_list.html" */ ?>
<?php /*%%SmartyHeaderCode:30001600757b1947689b051-19162148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '643aff777f2e08437668d1ef9ac6b76536758829' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpItem/get_item_list.html',
      1 => 1474625572,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
    '503fb78b8b4765e393a06919123fb183c64302b7' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpItem/opt.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30001600757b1947689b051-19162148',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b19476b4a9a',
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
<?php if ($_valid && !is_callable('content_57b19476b4a9a')) {function content_57b19476b4a9a($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
					
<script>
    function no_pic(obj) {
        obj.setAttribute("src", "/Public/Images/acp/nopicture.jpg");
    }
</script>

<div class="tablesWrap">
    <div class="tables-searchbox">
        <form method="post">
            <span class="tbs-txt"><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
名称：</span>
            <input type="text" name="item_name" value="<?php echo $_smarty_tpl->tpl_vars['item_name']->value;?>
">

            <span class="tbs-txt"><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
货号：</span>
            <input type="text" class="mini" name="item_sn" value="<?php echo $_smarty_tpl->tpl_vars['item_sn']->value;?>
">

            <!--
            <span class="tbs-txt">销售量：</span>
            <input type="text" style="width:60px;" name="start_sales_num" value="<?php echo $_smarty_tpl->tpl_vars['start_sales_num']->value;?>
">
            <span class="tbs-txt">——</span>
            <input type="text" style="width:60px;" name="end_sales_num" value="<?php echo $_smarty_tpl->tpl_vars['end_sales_num']->value;?>
">
            -->

            <select name="category_id">
                <option value="0" selected="">-<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
分类-</option>
                <?php  $_smarty_tpl->tpl_vars['row1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row1']->key => $_smarty_tpl->tpl_vars['row1']->value){
$_smarty_tpl->tpl_vars['row1']->_loop = true;
?>
                <option value="1.<?php echo $_smarty_tpl->tpl_vars['row1']->value['class_id'];?>
" <?php if (("1.").($_smarty_tpl->tpl_vars['row1']->value['class_id'])==$_smarty_tpl->tpl_vars['category_id']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row1']->value['class_name'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['row2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row1']->value['sort_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row2']->key => $_smarty_tpl->tpl_vars['row2']->value){
$_smarty_tpl->tpl_vars['row2']->_loop = true;
?>
                <option value="2.<?php echo $_smarty_tpl->tpl_vars['row2']->value['sort_id'];?>
" <?php if (("2.").($_smarty_tpl->tpl_vars['row2']->value['sort_id'])==$_smarty_tpl->tpl_vars['category_id']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row2']->value['sort_name'];?>
</option>
                <!--<?php  $_smarty_tpl->tpl_vars['row3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row2']->value['genre_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row3']->key => $_smarty_tpl->tpl_vars['row3']->value){
$_smarty_tpl->tpl_vars['row3']->_loop = true;
?>
                <option value="3.<?php echo $_smarty_tpl->tpl_vars['row3']->value['class_genre_id'];?>
" <?php if (("3.").($_smarty_tpl->tpl_vars['row3']->value['class_genre_id'])==$_smarty_tpl->tpl_vars['category_id']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row3']->value['genre_name'];?>
</option>
				<?php } ?>-->
                <?php } ?>
                <?php } ?>
            </select>
         
            <select name="item_status">
                <option value="0" selected="">-<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
状态-</option>
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_item_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['item_status']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</option>
                <?php } ?>
            </select>

            <div class="mgt10">
                <span class="tbs-txt">添加时间：</span>
                <input type="text" autocomplete="off" class="Wdate" name="start_date" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_date']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
                <span class="tbs-txt">至</span>
                <input type="text" autocomplete="off" class="Wdate" name="end_date" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_date']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
                <button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
            </div>

        </form>
    </div>
    <!-- end tables-searchbox -->
    <table class="wxtables">
        <colgroup>
            <col width="5%">
            <col width="5%">
            <col width="5%">
            <col width="20%">
            <col width="7%">
            <col width="7%">
            <col width="7%">
            <col width="7%">
            <col width="7%">
            <col width="7%">
            <col width="7%">
            <col width="20%">
        </colgroup>
        <thead>
        <tr>
            <td>选择</td>
            <td>编号</td>
            <td>图片</td>
            <td><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
名称</td>
            <td>货号</td>
            <td>本店价</td>
            <td>库存</td>
            <td>销售量</td>
            <td><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
状态</td>
            <td>是否实物</td>
            <td>排序号</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
        <tr>
            <td><input type="checkbox" class="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
" name="checkIds[]"></td>
            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']+$_smarty_tpl->tpl_vars['page']->value->firstRow;?>
.</td>
            <td><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_item'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['small_img'];?>
" alt="" width="50" height="50" onerror="no_pic(this);"></a></td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_item'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['item_name'];?>
</a>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['item_sn'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['mall_price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['stock'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sales_num'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['item']->value['is_real']=='1'){?>是<?php }else{ ?>否<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['serial'];?>
</td>
            <td>
				<?php /*  Call merged included template "./opt.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./opt.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '30001600757b1947689b051-19162148');
content_57e5002603397($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./opt.html" */?>
                <input type="hidden" name="item_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
">
            </td>
        </tr>
        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
        <tr><td colspan="10">没有找到任何记录</td></tr>
        <?php } ?>
        </tbody>
    </table>
    <!-- end wxtables -->
    <div class="tables-btmctrl clearfix">
        <div class="fl">
            <a href="javascript:selall()" class="btn btn-blue">全选</a>
            <a href="javascript:clearall()" class="btn btn-blue">取消</a>
            <a href="javascript:;" class="btn btn-blue <?php if ($_smarty_tpl->tpl_vars['opt']->value=='store'){?>J_batch_display<?php }else{ ?>J_batch_store<?php }?>"><?php if ($_smarty_tpl->tpl_vars['opt']->value=='store'){?>上架<?php }else{ ?>下架<?php }?></a>
            <a href="javascript:;" class="btn btn-blue J_batch_del">删除</a>
        </div>
        <div class="fr">
            <div class="paginate">
                <?php echo $_smarty_tpl->tpl_vars['page']->value->show();?>

            </div>
            <!-- end paginate -->
        </div>
    </div>
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
<script src="__ACPJS__/acp_item.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__ACPJS__/AcpItem/list_item.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/front/jquery.showLoading.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<link rel="stylesheet" href="__CSS__/front/showLoading.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<script>
var item_name = '<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
';

function sync_item()
{
    var html = "确定执行此操作，本操作将比较费时，请耐心等候!";
	$.jPops.custom({
		title:"同步商品资料",  
		content:html,
		okBtnTxt:"确定",  
		cancelBtnTxt:"取消",  
		callback:function(r)
		{
			if(r)
			{
                $('body').showLoading();
                $.post('/Global/sync',{},function(data) {
                    $("body").hideLoading();
                    if (data == 'success') {
                        alert('同步成功');
                        location.reload();
                    } else {
                        alert('同步失败，请稍后再试');
                    }
                });
			}
            return true;  
		}
	});
}
</script>

</body>
</html>
<?php }} ?><?php /* Smarty version Smarty-3.1.6, created on 2016-09-23 18:12:54
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpItem/opt.html" */ ?>
<?php if ($_valid && !is_callable('content_57e5002603397')) {function content_57e5002603397($_smarty_tpl) {?><a href="/AcpItem/edit_item/item_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
" class="btn" title="编辑">编辑</a>
<?php if ($_smarty_tpl->tpl_vars['opt']->value=='onsale'){?>
	<a href="javascript:;" class="btn J_store" title="下架">下架</a>
<?php }elseif($_smarty_tpl->tpl_vars['opt']->value=='store'){?>
	<a href="javascript:;" class="btn J_display" title="上架">上架</a>
<?php }?>
<a href="javascript:;" class="btn J_del" title="删除">删除</a>
<?php }} ?>