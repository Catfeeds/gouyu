<?php /* Smarty version Smarty-3.1.6, created on 2016-10-18 10:14:42
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpGuessFieldQuestion/guess_field_question_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:65707241957e8d3bab49087-11841469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ddbdb80ae8eca6fff0ca6c8bd2e989bce13779' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpGuessFieldQuestion/guess_field_question_detail.html',
      1 => 1476756720,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65707241957e8d3bab49087-11841469',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57e8d3bae36a7',
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
<?php if ($_valid && !is_callable('content_57e8d3bae36a7')) {function content_57e8d3bae36a7($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
     <?php echo $_smarty_tpl->tpl_vars['guess_user_list']->value[0]['guess_question'];?>

        <label class="fi-name" style="float:right; font-weight:normal;color:red">两队比分：<?php echo $_smarty_tpl->tpl_vars['guess_info']->value['host_score'];?>
:<?php echo $_smarty_tpl->tpl_vars['guess_info']->value['guest_score'];?>
</label>  
</div>
<div class="tablesWrap">  
    <div class="tables-searchbox">
        <form method="post" action="">
            <span class="tbs-txt">ID：</span>
            <input type="text" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

            <span class="tbs-txt">用户昵称：</span>
            <input type="text" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
">

            <button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
        </form>
    </div>
<!-- end tables-searchbox -->  
<table class="wxtables">  
    <colgroup>  
    <col width="3%">
    <col width="5%">
    <col width="5%">
    <col width="5%">
    <col width="5%">
    <col width="7%">
    <col width="5%">
    <col width="5%">
    <col width="5%">
    </colgroup>
    <thead>
        <tr>  
            <td>选择</td>  
            <td>ID</td>
            <td>用户名</td>
            <?php if ($_smarty_tpl->tpl_vars['field_type']->value!=2){?>
            <td>投注队伍</td>
            <?php }else{ ?>
            <td>投注类型</td>
            <?php }?>
            <td>投注金额</td>
            <td>投注时间</td>
            <td>赔率</td>
            <td>结果</td>
            <td>获得金额</td>
        </tr>  
    </thead>  
	<?php  $_smarty_tpl->tpl_vars['question_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guess_user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question_class']->key => $_smarty_tpl->tpl_vars['question_class']->value){
$_smarty_tpl->tpl_vars['question_class']->_loop = true;
?>
    <tbody class="combo-tbody">  
        <tr>
			<td><input type="checkbox" class="checkbox" name="a[]" value="<?php echo $_smarty_tpl->tpl_vars['question_class']->value['guess_field_question_id'];?>
"></td>
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['id'];?>
</td>  
			<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['question_class']->value['nickname'])===null||$tmp==='' ? '--' : $tmp);?>
</td>  
            <td><?php if ($_smarty_tpl->tpl_vars['question_class']->value['team_type']==1){?>
                    <?php if ($_smarty_tpl->tpl_vars['question_class']->value['defind_team_name']){?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['defind_host_name'];?>

                    <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['field_type']->value==2){?>
                            大于
                        <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['host_team_name'];?>
<?php if ($_smarty_tpl->tpl_vars['field_type']->value==1&&$_smarty_tpl->tpl_vars['question_class']->value['lose_type']==1){?>-<?php echo $_smarty_tpl->tpl_vars['question_class']->value['lose_score'];?>
<?php }?>
                        <?php }?>
                    <?php }?>
                <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['question_class']->value['defind_team_name']){?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['defind_guest_name'];?>

                    <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['field_type']->value==2){?>
                            小于
                        <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['guest_team_name'];?>
<?php if ($_smarty_tpl->tpl_vars['field_type']->value==1&&$_smarty_tpl->tpl_vars['question_class']->value['lose_type']==2){?>-<?php echo $_smarty_tpl->tpl_vars['question_class']->value['lose_score'];?>
<?php }?>
                        <?php }?>
                    <?php }?>
                <?php }?></td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['add_money'];?>
</td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['ajax_addtime'];?>
</td>  
            <td><?php if ($_smarty_tpl->tpl_vars['question_class']->value['team_type']==1){?><?php echo $_smarty_tpl->tpl_vars['question_class']->value['host_odds'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['question_class']->value['guest_odds'];?>
<?php }?></td>  
            <td><?php if ($_smarty_tpl->tpl_vars['question_class']->value['result']==1){?>
                    <?php if ($_smarty_tpl->tpl_vars['question_class']->value['defind_team_name']){?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['defind_host_name'];?>

                    <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['field_type']->value==2){?>
                            大于
                        <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['host_team_name'];?>
<?php if ($_smarty_tpl->tpl_vars['field_type']->value==1&&$_smarty_tpl->tpl_vars['question_class']->value['lose_type']==1){?>-<?php echo $_smarty_tpl->tpl_vars['question_class']->value['lose_score'];?>
<?php }?>
                        <?php }?>
                    <?php }?>
                <?php }elseif($_smarty_tpl->tpl_vars['question_class']->value['result']==2){?>
                    <?php if ($_smarty_tpl->tpl_vars['question_class']->value['defind_team_name']){?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['defind_guest_name'];?>

                    <?php }else{ ?>
                        <?php if ($_smarty_tpl->tpl_vars['field_type']->value==2){?>
                            小于
                        <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['question_class']->value['guest_team_name'];?>
<?php if ($_smarty_tpl->tpl_vars['field_type']->value==1&&$_smarty_tpl->tpl_vars['question_class']->value['lose_type']==2){?>-<?php echo $_smarty_tpl->tpl_vars['question_class']->value['lose_score'];?>
<?php }?>
                        <?php }?>
                    <?php }?>
                <?php }elseif($_smarty_tpl->tpl_vars['question_class']->value['result']==-1){?>退款<?php }else{ ?>暂无<?php }?></td>  
			<td><?php echo $_smarty_tpl->tpl_vars['question_class']->value['prize_money'];?>
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
    <?php if (0){?>
    <div class="fl">  
        <a href="javascript:;" class="btn btn-blue" onclick="Select()">全选</a>  
        <a href="javascript:;" class="btn btn-blue" onclick="Cancel()">取消</a>  
        <a href="javascript:;" onclick="batch_delete()" class="btn btn-blue">删除</a>
    </div>  
    <?php }?>
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
					if (data == 'success')
					{
						alert('恭喜您，设置成功！');
						location.reload();
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
</script>


</body>
</html>
<?php }} ?>