<?php /* Smarty version Smarty-3.1.6, created on 2016-10-09 09:55:21
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpFinance/recharge.html" */ ?>
<?php /*%%SmartyHeaderCode:122119454557d259bc589258-83111598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aea7451a13dc7959412c23ee4d895c301f0e176' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpFinance/recharge.html',
      1 => 1475219347,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122119454557d259bc589258-83111598',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57d259bc7062d',
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
<?php if ($_valid && !is_callable('content_57d259bc7062d')) {function content_57d259bc7062d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpFinance/user_list.css" type="text/css" />

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
					
<div class="tablesWrap">  
    <form   method="post" action="">
    <div class="tables-searchbox">  
        <span class="tbs-txt">充值ID号：</span>  
        <input type="text" name="recharge_id" value="<?php echo $_smarty_tpl->tpl_vars['recharge_id']->value;?>
">  
        <button class="btn" type="submit"><i class="gicon-search"></i>搜索</button>  
    </div>  
	</form> 
    <!-- end tables-searchbox -->  
    <table class="wxtables">  
        <colgroup>  
        <col width="5%">  
        <col width="25%">  
        <col width="20%">  
        <col width="20%">  
        <col width="25%">  
        </colgroup>  
        <thead>  
            <tr>  
                <td>编号</td>  
                <td>用户昵称</td>  
                <td>手机号</td>  
                <td>账户余额</td>  
                <td>操作</td>  
            </tr>  
        </thead>  
        <tbody>  
			
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['iteration']++;
?>
            <tr>  
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['iteration'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['nickname'];?>
</td>  
                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['mobile'])===null||$tmp==='' ? '--' : $tmp);?>
</td>  
                <td>
                	<span>￥</span>  
                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['left_money'];?>
</span>
                </td>  
                <td>  
                    <a href="javascript:;" class="btn j_form" title="加款" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" >充值</a>
                    <a href="/AcpFinance/get_account_log/user_id/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" class="btn" title="明细">明细</a>    
                </td>  
            </tr>  
			<?php }
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>
			<tr>  
                <td colspan="20" style="text-align:center">对不起,暂无您要查询的数据!</td>  
            </tr>  
			<?php } ?>
        </tbody>  
    </table>  
    <!-- end wxtables -->  
    <div class="tables-btmctrl clearfix">  
        <div class="fl">  
        </div>  
        <div class="fr">  
            <div class="paginate">  
                <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

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
	
<script>
var RMB_EXCHANGE_PROP = parseFloat(<?php echo $_smarty_tpl->tpl_vars['system_config']->value['RMB_EXCHANGE_PROP'];?>
);
var recharge_id ='<?php echo $_smarty_tpl->tpl_vars['recharge_id']->value;?>
';

$(function() {

    var html='<form id="pop_demo">                                                                '+
        '<div class="formitems inline">                                                       '+
        '	<label class="fi-name"><span class="colorRed">*</span>充值鱼翅：</label>          '+
        '	<div class="form-controls">                                                       '+
        '		<input type="text" id="amount" name="amount">                                 '+
        '       &nbsp;&nbsp;&nbsp;&nbsp;<span id="RMB">0</span>元                                                   '+
        '		<span class="fi-help-text" id="amount_ts">格式如: 100</span>       '+
        '	</div>                                                                            '+
        '</div>                                                                               '+
        '<div class="formitems inline">                                                       '+
        '	<label class="fi-name"><span class="colorRed"></span>操作备注：</label>           '+
        '	<div class="form-controls">                                                       '+
        '		<textarea name="remark" id="remark"></textarea>                               '+
        '		<span class="fi-help-text">一般在200字以内</span>                             '+
        '	</div>                                                                            '+
        '</div>																			      '+
        '</form>                                                                              '+
        '<script>                                                                             '+
        '$("#amount").keyup(function(){'+
            'var money = $(this).val();'+
            '$("#RMB").html(parseFloat(money / RMB_EXCHANGE_PROP));'+
            '});'+
        '<\/script>  ';
			
	$(".j_form").click(function(){
		var user_id = $(this).data('id');
		$.jPops.custom({
			title:"充值",
			content:html,
			callback:function(r){
				acp.popFormStatus=false;//弹窗表单验证状态
				if(r){

					$.validator.setDefaults({
						submitHandler: function() {
							var amount=$("#jpops #amount").val();
							var remark=$("#jpops #remark").val();
                            var amount_type= 1;

                            if (amount >= 200000) {
                                $.jPops.confirm({  
                                    title:"提示",  
                                    content:"充值鱼翅已大于20万，确定充值吗？",  
                                    okBtnTxt:"确定",  
                                    cancelBtnTxt:"取消",  
                                    callback:function(r) {  
                                        if(r)
                                        {
                                            acp.popFormStatus=true;//设置弹窗表单验证状态为通过
                                            $.ajax({
                                                url : '/AcpFinance/recharge_by_admin', 
                                                type : 'POST', 
                                                dataType : 'JSON',
                                                timeout : 1000,
                                                data : {action : "set",user_id : user_id,amount_type : amount_type,amount : amount, remark : remark, recharge_id:recharge_id},
                                                error : function() {
                                                    $.jPops.message({title:"操作提示",content: "操作失败请重试",timing:3000});
                                                },
                                                success : function(result) {
                                                    if(result.code == 200)
                                                    {
                                                        $.jPops.message({title:"操作提示",content: result.msg,timing:3000});
                                                        //刷新页面
                                                        setTimeout(function(){window.location.reload() },2000);
                                                    }
                                                    else
                                                    {
                                                        $.jPops.message({title:"操作提示",content: result.msg,timing:3000});
                                                    }
                                                }
                                            });
                                        } else {
                                            location.reload();
                                        }
                                    }
                                });
                            } else {
                                acp.popFormStatus=true;//设置弹窗表单验证状态为通过
                                $.ajax({
                                    url : '/AcpFinance/recharge_by_admin', 
                                    type : 'POST', 
                                    dataType : 'JSON',
                                    timeout : 1000,
                                    data : {action : "set",user_id : user_id,amount_type : amount_type,amount : amount, remark : remark, recharge_id:recharge_id},
                                    error : function() {
                                        $.jPops.message({title:"操作提示",content: "操作失败请重试",timing:3000});
                                    },
                                    success : function(result) {
                                        if(result.code == 200)
                                        {
                                            $.jPops.message({title:"操作提示",content: result.msg,timing:3000});
                                            //刷新页面
                                            setTimeout(function(){window.location.reload() },2000);
                                        }
                                        else
                                        {
                                            $.jPops.message({title:"操作提示",content: result.msg,timing:3000});
                                        }
                                    }
                                });
                            }
							
						}
					});

					//表单验证规则
					$("#pop_demo").validate({
						rules: {
							amount: {required: true}
						},
						messages: {
							amount: {required: "请输入变动金额"}
						},
						errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
						success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
					});

                    //模拟提交表单
                    $("#pop_demo").submit();


					return acp.popFormStatus;//通过表单验证状态确定是否关闭窗口
				}
				else{//点击取消按钮执行的事件
					return true;
				}
			}
			
		});
	})
 });

</script>


</body>
</html>
<?php }} ?>