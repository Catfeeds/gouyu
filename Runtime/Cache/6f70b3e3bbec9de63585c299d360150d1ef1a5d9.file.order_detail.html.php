<?php /* Smarty version Smarty-3.1.6, created on 2016-10-11 09:35:12
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/AcpOrder/order_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:15470544857c53cb136ddb5-67543864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f70b3e3bbec9de63585c299d360150d1ef1a5d9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/AcpOrder/order_detail.html',
      1 => 1476149711,
      2 => 'file',
    ),
    '8e2892026ea33ad48208d4644e2a84be371864f9' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/acp.html',
      1 => 1471252521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15470544857c53cb136ddb5-67543864',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57c53cb16b2cc',
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
<?php if ($_valid && !is_callable('content_57c53cb16b2cc')) {function content_57c53cb16b2cc($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.truncate.php';
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
	

<link rel="stylesheet" href="/Public/Css/acp/AcpOrder/order_detail.css" type="text/css" />
<style>
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
					
<div id="print_div">
<div class="t-detail-top">
	<input type="hidden" id="order_type" value="<?php echo $_smarty_tpl->tpl_vars['order_type']->value;?>
">
	<input type="hidden" id="order_id" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
">
	<input type="hidden" id="admin_remark" name="admin_remark" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['admin_remark'];?>
">
	<input type="hidden" id="total_amount" name="total_amount" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['total_amount'];?>
">
	<input type="hidden" id="express_fee" name="express_fee" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['express_fee'];?>
">
	<input type="hidden" id="express_company_id" name="express_company_id" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['express_company_id'];?>
">
	<input type="hidden" id="express_number" name="express_number" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['express_number'];?>
">
	<div class="top-tit">
		当前订单（<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
）状态：<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_status'];?>

    	<button type="button" class="btn" onclick="print_order()" style="float:right;">打印当前订单</button>  
	</div>
    <div class="top-but">
    	<table class="wxtables">  
			<tbody>  
            <tr><td class="tables-form-title" style="width:100px">用户昵称：</td>  
                <td><span><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</span></td></tr>
            <tr><td class="tables-form-title">ID：</td>  
                <td><span><?php echo $_smarty_tpl->tpl_vars['user_info']->value['id'];?>
</span></td></tr>
            <tr><td class="tables-form-title">联系方式：</td>  
                <td><span><?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
</span></td></tr>
			</tbody>  
        </table>

    </div>
    <!--<div class="top-but">
    	<button type="button" class="btn" id="remark_btn">备注</button>  
		<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status_num']==0){?>
			<button type="button" class="btn" id="change_price_btn">修改价格</button>  
			<?php if (isset($_smarty_tpl->tpl_vars['order_type']->value)&&$_smarty_tpl->tpl_vars['order_type']->value==3){?>
				<a href="javascript:;" onclick="offline_pay(<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
, 1)" class="btn">已线下收款</a>  
			<?php }else{ ?>
				<a href="javascript:;" onclick="offline_pay(<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
, 0)" class="btn">已线下收款</a>  
			<?php }?>
		<?php }?>
        <button type="button" class="btn" id="cancel_order_btn">关闭订单</button>  
	</div>-->
</div>

<div class="t-detail-goods">
	<div class="t-detail-goods-tit">订单状态变更明细:</div>
    <div class="t-detail-goods-con">
    	<table class="wxtables">  
			<colgroup>  
				<col width="5%">  
				<col width="10%">  
				<col width="12%">  
				<col width="10%">  
				<col width="13%">  
				<col width="50%">  
			</colgroup>  
			<thead>  
				<tr>  
					<td>序号</td>  
					<td>变更前状态</td>  
					<td>变更后状态</td>  
					<td>变更时间</td>  
					<td>操作人IP</td>  
					<td>操作描述</td>  
				</tr>  
			</thead>  
			<tbody>  
				<?php  $_smarty_tpl->tpl_vars['order_log_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order_log_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_log_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order_log_info']->key => $_smarty_tpl->tpl_vars['order_log_info']->value){
$_smarty_tpl->tpl_vars['order_log_info']->_loop = true;
?>
				<tr>  
					<td>  
						<?php echo $_smarty_tpl->tpl_vars['order_log_info']->value['i'];?>

					</td>  
					<td>  
						<?php echo $_smarty_tpl->tpl_vars['order_log_info']->value['start_order_status'];?>

					</td>  
					<td>  
						<?php echo $_smarty_tpl->tpl_vars['order_log_info']->value['end_order_status'];?>
 
					</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['order_log_info']->value['addtime'];?>
</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['order_log_info']->value['ip'];?>
</td> 
					<td><?php echo $_smarty_tpl->tpl_vars['order_log_info']->value['remark'];?>
</td> 
				</tr>  
				<?php }
if (!$_smarty_tpl->tpl_vars['order_log_info']->_loop) {
?>
					暂无记录
				<?php } ?>
			</tbody>  
		</table>  
    </div>
	<div class="t-detail-goods-tit">商品信息:</div>
    <div class="t-detail-goods-con">
    	<table class="wxtables">  
			<colgroup>  
				<col width="45%">  
				<col width="8%">  
				<col width="8%">  
				<col width="8%">  
				<col width="8%">  
				<col width="8%"> 
				<col width="15%">  
			</colgroup>  
			<thead>  
				<tr>  
					<td>商品名称</td>  
					<td>规格属性</td>  
					<td>货号</td>  
					<td>商品价格</td>  
					<td>购买数量</td>  
					<td>总价</td>  
					<td>备注</td>  
				</tr>  
			</thead>  
			<tbody>  
				<?php  $_smarty_tpl->tpl_vars['item_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item_info']->key => $_smarty_tpl->tpl_vars['item_info']->value){
$_smarty_tpl->tpl_vars['item_info']->_loop = true;
?>
				<tr>  
					<td>  
						<b class="pic-t"><img src="<?php echo $_smarty_tpl->tpl_vars['item_info']->value['small_pic'];?>
" /></b>
						<span><?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_name'];?>
</span> 
					</td>  
					<td>  
						<?php if ($_smarty_tpl->tpl_vars['item_info']->value['property']==''){?>
							无
						<?php }else{ ?>
							<?php echo $_smarty_tpl->tpl_vars['item_info']->value['property'];?>
 
						<?php }?>
					</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_sn'];?>
</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['item_info']->value['real_price'];?>
</td> 
					<td><?php echo $_smarty_tpl->tpl_vars['item_info']->value['number'];?>
</td> 
					<td>  
						<span><?php echo $_smarty_tpl->tpl_vars['item_info']->value['real_price']*$_smarty_tpl->tpl_vars['item_info']->value['number'];?>
</span>  
					</td>  
					<td>无</td>  
				</tr>  
				<?php } ?>
			</tbody>  
		</table>  
    </div>

	<?php if (count($_smarty_tpl->tpl_vars['gift_list']->value)){?>
		<div class="t-detail-goods-tit">礼品信息:</div>
		<div class="t-detail-goods-con">
			<table class="wxtables">  
				<colgroup>  
					<col width="20%">  
					<col width="50%">  
					<col width="15%">  
					<col width="15%"> 
				</colgroup>  
				<thead>  
					<tr>  
						<td>礼品图片</td>  
						<td>礼品名称</td>  
						<td>市场价</td>  
						<td>数量</td>  
					</tr>  
				</thead>  
				<tbody>  
					<?php  $_smarty_tpl->tpl_vars['gift_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gift_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gift_info']->key => $_smarty_tpl->tpl_vars['gift_info']->value){
$_smarty_tpl->tpl_vars['gift_info']->_loop = true;
?>
					<tr>  
						<td>  
							<b class="pic-t"><img src="<?php echo $_smarty_tpl->tpl_vars['gift_info']->value['small_pic'];?>
" /></b>
						</td>  
						<td>  
							<span><?php echo $_smarty_tpl->tpl_vars['gift_info']->value['gift_name'];?>
</span> 
						</td>  
						<td>  
							<span>鱼翅</span>  
							<span><?php echo $_smarty_tpl->tpl_vars['gift_info']->value['market_price'];?>
</span>  
						</td>  
						<td><?php echo $_smarty_tpl->tpl_vars['gift_info']->value['gift_total'];?>
</td> 
					</tr>  
					<?php } ?>
				</tbody>  
			</table>  
		</div>
	<?php }?>
    <div class="t-detail-goods-tit mag">订单实收款结算：</div>
    <div class="t-detail-goods-con t-border">
    	<table class="wxtables tables-form">  
            <colgroup>  
                <col width="20%">  
                <col width="80%">   
            </colgroup>  
            <tbody>  
                <tr>  
                    <td class="tables-form-title">商品金额（鱼翅）：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['total_amount'];?>
</td>   
                </tr>  
                <?php if (0){?>
                <tr>  
                    <td class="tables-form-title">商品总重量（克）：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['weight'];?>
</td> 
                </tr> 
				<?php if (isset($_smarty_tpl->tpl_vars['order_type']->value)&&$_smarty_tpl->tpl_vars['order_type']->value!=3){?>
					<tr>  
						<td class="tables-form-title">运费（鱼翅）：</td>  
						<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['express_fee'];?>
</td> 
					</tr> 
				<?php }?>
                <tr>  
                    <td class="tables-form-title">订单折扣或涨价（鱼翅）：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['system_discount_amount'];?>
</td> 
                </tr> 
                <?php }?>
                <tr>  
                    <td class="tables-form-title">订单实收款（鱼翅）：</td>  
					<!--<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['total_amount']+$_smarty_tpl->tpl_vars['order_info']->value['express_fee'];?>
</td>-->
					<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</td> 
                </tr>  
            </tbody>  
        </table>   
    </div>
    <?php if (0){?>
	<div class="t-detail-goods-tit mag">物流信息：</div>
	<div class="t-detail-goods-con t-border">
		<table class="wxtables tables-form">  
			<colgroup>  
				<col width="20%">  
				<col width="80%">   
			</colgroup>  
			<tbody>  
				<tr>  
					<td class="tables-form-title">物流公司：</td>  
					<td><span class="line-t"><?php echo $_smarty_tpl->tpl_vars['express_company_name']->value;?>
</span><!-- <a id="change_express_company_btn" href="javascript:;" class="btn">修改物流公司</a>-->  </td>
				</tr>  
				<tr>  
					<td class="tables-form-title">收货信息：</td>  
                    <td> <?php if ($_smarty_tpl->tpl_vars['user_address_info']->value['realname']){?><?php echo $_smarty_tpl->tpl_vars['user_address_info']->value['realname'];?>
,<?php }?><?php if ($_smarty_tpl->tpl_vars['user_address_info']->value['mobile']){?><?php echo $_smarty_tpl->tpl_vars['user_address_info']->value['mobile'];?>
,<?php }?> <?php echo $_smarty_tpl->tpl_vars['address_detail']->value;?>
</td>
                        <!--					<td><?php if ($_smarty_tpl->tpl_vars['order_info']->value['address']){?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['address'];?>
，<?php }?><?php if ($_smarty_tpl->tpl_vars['order_info']->value['consignee']){?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['consignee'];?>
，<?php }?><?php if ($_smarty_tpl->tpl_vars['order_info']->value['mobile']){?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['mobile'];?>
<?php }?></td> -->
				</tr> 
				<tr>  
					<td class="tables-form-title">物流单号：</td>  
					<td><span class="line-t"><?php if ($_smarty_tpl->tpl_vars['order_info']->value['express_number']){?> <?php echo $_smarty_tpl->tpl_vars['order_info']->value['express_number'];?>
 <?php }else{ ?> 暂无运单信息<?php }?></span> 
				</tr> 
				<tr>  
					<td class="tables-form-title">买家留言：</td>  
					<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['user_remark'];?>
</td> 
				</tr>  
			</tbody>  
		</table>   
	</div>
    <?php }?>
</div>
</div>

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
function print_order()
{
	printdiv('print_div');
}
</script>
<script src="__JS__/acp/AcpOrder/order.js?version={$version}"></script>
<!--<script src="__JS__/acp/AcpOrder/order_detail.js?version={$version}"></script>-->
<style>
#jpops .fi-name{width:100px;}
#jpops .form-controls{margin-left:100px;}
</style>
 

</body>
</html>
<?php }} ?>