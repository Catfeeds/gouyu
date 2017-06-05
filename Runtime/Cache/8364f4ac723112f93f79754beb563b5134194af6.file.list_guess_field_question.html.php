<?php /* Smarty version Smarty-3.1.6, created on 2016-10-12 13:31:36
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpGuessFieldQuestion/list_guess_field_question.html" */ ?>
<?php /*%%SmartyHeaderCode:28085712057b2dc83ad8740-24585235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8364f4ac723112f93f79754beb563b5134194af6' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpGuessFieldQuestion/list_guess_field_question.html',
      1 => 1476236115,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28085712057b2dc83ad8740-24585235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b2dc83d6822',
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
<?php if ($_valid && !is_callable('content_57b2dc83d6822')) {function content_57b2dc83d6822($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
	
<link type="text/css" rel="stylesheet" href="__ACPCSS__/tip.css" />

<style>
.PageNext{page-break-after: always; height:1px;}
</style>


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
					
 <div class="tables-searchbox"> 
     <a href="/AcpGuessFieldQuestion/add_guess_field_question" class="btn btn-blue"><i class="gicon-plus white"></i>添加题目</a>  
</div>
<div class="tablesWrap">  
    <div class="tables-searchbox">
        <form method="post" action="">
            <span class="tbs-txt">局名称：</span>
            <input type="text" name="guess_field_name" value="<?php echo $_smarty_tpl->tpl_vars['guess_field_name']->value;?>
">

            <span class="tbs-txt">所属竞猜：</span>
            <input type="text" name="guess_name" value="<?php echo $_smarty_tpl->tpl_vars['guess_name']->value;?>
">


            <select name="guess_type_id">
                <option value="0" selected="">-竞猜类型-</option>
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['guess_type_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['guess_type_id']->value==$_smarty_tpl->tpl_vars['row']->value['guess_type_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['guess_type_name'];?>
</option>
                <?php } ?>
            </select>
            <button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
<!---
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
                <span class="tbs-txt">开始时间：</span>
                <input type="text" autocomplete="off" class="Wdate" name="start_date" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_date']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
                <span class="tbs-txt">至</span>
                <input type="text" autocomplete="off" class="Wdate" name="end_date" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_date']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
            </div>

            --->
        </form>
    </div>
<!-- end tables-searchbox -->  
<table class="wxtables">  
    <colgroup>  
    <col width="2%">
    <col width="5%">
    <col width="5%">
    <col width="7%">
    <col width="3%">
    <col width="3%">
    <col width="3%">
    <col width="3%">
    <col width="3%">
    <col width="3%">
    <col width="8%">
    </colgroup>
    <thead>
        <tr>  
            <td>选择</td>  
            <td>所属竞猜</td>
            <td>所属局名称</td>
            <td>问题</td>
            <td>主队赔率</td>
            <td>客队赔率</td>
            <td>排序号</td>
            <td>是否有效</td>
            <td>结果</td>
            <td>总比分</td>
            <td>操作</td>
        </tr>  
    </thead>  
	<?php  $_smarty_tpl->tpl_vars['question_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_field_question_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question_class']->key => $_smarty_tpl->tpl_vars['question_class']->value){
$_smarty_tpl->tpl_vars['question_class']->_loop = true;
?>
    <tbody class="combo-tbody">  
        <tr>
			<td><input type="checkbox" class="checkbox" name="a[]" value="<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
"></td>
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_name'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_name'];?>
</td>  
			<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['question_class']->value['question'],20,"...",true);?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['host_odds'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['guest_odds'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['serial'];?>
</td>  
			<td><?php if ($_smarty_tpl->tpl_vars['question_class']->value['isuse']==1){?>是<?php }else{ ?>否<?php }?></td>  
            <td><?php if ($_smarty_tpl->tpl_vars['question_class']->value['result']==1){?>主队<?php }elseif($_smarty_tpl->tpl_vars['question_class']->value['result']==2){?>客队<?php }elseif($_smarty_tpl->tpl_vars['question_class']->value['result']==-1){?>全额退款<?php }else{ ?>未设置<?php }?></td>  
            <td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['host_score'];?>
:<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guest_score'];?>
</td>  
            <td>  
				<a href="/AcpGuessFieldQuestion/edit_guess_field_question/guess_field_question_id/<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
.html" class="btn" title="修改">修改</a>  
                <a href="javascript:;" class="btn" title="删除" onclick="delete_question_class(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
)">删除</a>  
                <?php if (!$_smarty_tpl->tpl_vars['question_class']->value['is_over']){?>
                <a href="javascript:;" class="btn" title="主队胜" onclick="set_team(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
, 'host')"><?php if ($_smarty_tpl->tpl_vars['question_class']->value['field_type']==2){?>大于<?php }else{ ?>主队<?php }?></a>  
                <a href="javascript:;" class="btn" title="客队胜" onclick="set_team(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
, 'guest')"><?php if ($_smarty_tpl->tpl_vars['question_class']->value['field_type']==2){?>小于<?php }else{ ?>客队<?php }?></a>  
                <a href="javascript:;" class="btn" title="全额退款" onclick="refund_question_class(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
)">全额退款</a>  
                <?php }else{ ?>
                <a href="javascript:;" class="btn" title="结算金额回退" onclick="set_refund_money_back(<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
)">结算金额回退</a>  
                <?php }?>
                <a href="/AcpGuessFieldQuestion/look_odds_detail/guess_field_question_id/<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
.html" class="btn" target="_blank" title="查看投注分布">投注分布</a>  
                <a href="/AcpGuessFieldQuestion/guess_field_question_detail/guess_field_question_id/<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
.html" class="btn" target="_blank" title="查看详情">详情</a>  
                <!--<a href="/AcpGuessFieldQuestion/list_guess_filed/guess_id/<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_id'];?>
.html" class="btn" title="局数列表">局数列表</a>  -->
            </td>  
        </tr>
    </tbody>
	<?php }
if (!$_smarty_tpl->tpl_vars['question_class']->_loop) {
?>   
    <tbody>    
		<tr>
			<td colspan="7">
				没有符合条件的记录
			</td>
		<tr>
    </tbody>  
	<?php } ?>
</table>  
<!-- end wxtables -->  
<div class="tables-btmctrl clearfix">  
    <div class="fl">  
        <a href="javascript:;" class="btn btn-blue" onclick="Select()">全选</a>  
        <a href="javascript:;" class="btn btn-blue" onclick="Cancel()">取消</a>  
        <a href="javascript:;" onclick="batch_delete()" class="btn btn-blue">删除</a>
    </div>  
    <div class="fr">  
        <div class="paginate">
			<?php echo $_smarty_tpl->tpl_vars['page_str']->value;?>
 
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

<script>
	//全选
	function Select(){
		var sel=document.getElementsByName("a[]");
		for(var i=0;i<sel.length;i++){
			sel[i].checked=true;
		}
	}
	//取消全选
	function Cancel(){
		var sel=document.getElementsByName("a[]");
		for(var i=0;i<sel.length;i++){
			sel[i].checked=false;
		}
	}

function delete_question_class(question_guess_id)
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要删除这条数据吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpGuessFieldQuestion/del_guess_field_question', {"guess_field_question_id":question_guess_id}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，删除成功！');
						location.reload();
					}
                    else if (data == 'have')
                    {
                        alert('此问题已有人投注，请先结束后再删除');
                    }
					else
					{
						alert('对不起，删除失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });  	
}

function batch_delete()
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要删除这些数据吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 var question_guess_ids = '';
				 var count = 0;
				 $('input[name="a[]"]:checked').each(function(){
					 count ++;
					 question_guess_ids += $(this).val() + ',';
				 });

				 if (!count)
				 {
					 alert('对不起，请选择至少一项进行删除！');
					 return;
				 }

				 question_guess_ids = question_guess_ids.substr(0, question_guess_ids.length - 1);
                 console.log(question_guess_ids);

				 $.post('/AcpGuessFieldQuestion/batch_del_guess_field_question', {"question_guess_field_question_ids":question_guess_ids}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，删除成功！');
						location.reload();
					}
					else
					{
						alert('对不起，删除失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });
}


function set_team(question_guess_id, type)
{
    if (type == 'host') {
        var name = '主队';
    } else {
        var name = '客队';
    }
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要设置"+name+"为最后结果吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpGuessFieldQuestion/set_team', {"guess_field_question_id":question_guess_id,"type":type}, function(data, textStatus) 
				 {
                     console.log(data);
					if (data == 'success')
					{
						alert('恭喜您，设置成功！');
						location.reload();
					}
                    else if (data == 'lose_field')
                    {
                        alert('大小分局或让分局请先设置分数');
                    }
                    else if (data == 'no_start')
                    {
                        alert('此局还未开始哦');
                    }
					else
					{
						alert('对不起，设置失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });  	
}

function refund_question_class(guess_field_question_id)
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要全额退款给用户吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpGuessFieldQuestion/refund_guess_field_question', {"guess_field_question_id":guess_field_question_id}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，退款成功！');
						location.reload();
					}
					else
					{
						alert('对不起，退款失败！');
					}
				});
			 }  
			 return true;  
		 }
	 });  	
}



//结算后的金额退回
function set_refund_money_back(question_guess_id)
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要退回已结算的金额吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 $.post('/AcpGuessFieldQuestion/set_refund_money_back', {"guess_field_question_id":question_guess_id}, function(data, textStatus) 
				 {
					if (data == 'success')
					{
						alert('恭喜您，成功退回！');
						location.reload();
					}
                    else if (data == 'over')
                    {
                        alert('已过了退回时间');
                    }
					else
					{
						alert('对不起，操作失败！');
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
<?php }} ?>