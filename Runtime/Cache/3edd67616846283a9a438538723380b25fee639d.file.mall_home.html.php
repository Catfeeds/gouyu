<?php /* Smarty version Smarty-3.1.6, created on 2016-08-25 14:31:32
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/mall_home.html" */ ?>
<?php /*%%SmartyHeaderCode:213250538257b18a285eb615-63786320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3edd67616846283a9a438538723380b25fee639d' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/FrontMall/mall_home.html',
      1 => 1471252526,
      2 => 'file',
    ),
    '0a76517024baa107858885fb396c5ed0d2092b6c' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/home.html',
      1 => 1472094527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213250538257b18a285eb615-63786320',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b18a2891132',
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
<?php if ($_valid && !is_callable('content_57b18a2891132')) {function content_57b18a2891132($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/wuzeguo/workspace/gouyu/frame/Extend/Vendor/Smarty/plugins/modifier.date_format.php';
?><!doctype html>
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

<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/mall_home.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">

<style>
	.shop_name .shop_name_txt{
		  height: 18px;
  overflow: hidden;
  line-height: 18px;
  display: inline-block;
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
	
<script>
    function no_pic(obj) {
        obj.setAttribute("src", "/Public/Images/acp/nopicture.jpg");
    }
    function no_slide_pic(obj) {
        obj.setAttribute("src", "/Public/Images/slide_default.jpg");
    }
</script>
<!--头部模块-->
<header class="index_head">
    <a class="search" href="javascript:void(0);" id="search_enter">
    	<svg class="sear_icon"><use xlink:href="#search"></use></svg>
    	<!-- <span class="sear_txt">找商品</span> -->
    </a>
    <!-- <a class="message" href="<?php echo $_smarty_tpl->tpl_vars['message_list_link']->value;?>
">
    	<svg class="msg_icon"><use xlink:href="#message"></use></svg>
    	<?php if ($_smarty_tpl->tpl_vars['not_read_num']->value){?><span class="msg_num"><?php echo $_smarty_tpl->tpl_vars['not_read_num']->value;?>
</span><?php }?>
    </a> -->
</header>
<!-- 地址模块 -->
<!--主内容-->
<div class="mall_home_cont">
	<!--轮播图片-->
	<div class="img_po">
		<div class="img_poa" id="img_poa">
	    	<div class="hge">
	    	  <div id="slider_cont" class="flexslider">
	    	    <ul class="slides" id="slides" style="height:100px;overflow:hidden;"> 
	    	    <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cust_flash_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
?>              
	  	          <li><div class="img"><a href="<?php echo $_smarty_tpl->tpl_vars['img']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img']->value['pic'];?>
" class="slide_img" onerror="no_slide_pic(this);"/></a></div></li>              
	  	      	<?php } ?>
	  	      </ul>
	  	    </div>
				</div>
	  </div>
	</div>
  <!--各大模块入口-->  	
  <div class="index_category">
    <div class="index_wrap">
    	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	      <a href="<?php echo $_smarty_tpl->tpl_vars['item_list_link']->value;?>
/class_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
" class="item">
	          	<img class="icon_quan" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_icon'];?>
" />
	          	<div class="item_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['class_name'];?>
</div>
	      </a>
	    <?php } ?>
	      <a href="<?php echo $_smarty_tpl->tpl_vars['item_list_link']->value;?>
" class="item">
	          <div id="icon_8" class="icon_quan"><svg class="index_icon"><use xlink:href="#all"></use></svg></div>
	          <div class="item_name">全部</div>
	      </a>
	    
    </div>
  </div>

	<!--推荐（商铺）模块-->
	<?php if ($_smarty_tpl->tpl_vars['item_list']->value){?>
	<div class="index_shop">
	    <div class="shop_tit">推荐商品</div>
	    <div class="shop_cont clearfix">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	       <div class="shop_item_cont">
	       		<a href="<?php echo $_smarty_tpl->tpl_vars['item_detail_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
" class="shop_item_link">
	       			<div class="shop_item_pic">
	       				<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['base_pic'];?>
" onerror="no_pic(this);" />
	       				<?php if ($_smarty_tpl->tpl_vars['item']->value['is_spec']==1){?>
						<div class="onsale-tag">
							<span>特价</span>
							<span class="r_ant"></span>
						</div>
						<?php }?>
	       				<div class="shop_item_price">
	       					<svg class="price_icon"><use xlink:href="#price"></use></svg>
	       					<?php if ($_smarty_tpl->tpl_vars['item']->value['is_spec']==1){?>
	       					<span class="price_tag">
		       					<span class="item_price"><i class="rmb_symbol">￥</i><?php echo $_smarty_tpl->tpl_vars['item']->value['special_info']['promotion_price'];?>
</span>
		       					<!-- <em class="del_em">￥</em> --><del class="del_price"><?php echo $_smarty_tpl->tpl_vars['item']->value['special_info']['old_price'];?>
</del>
	       					</span>
	       					<?php }else{ ?>
	       					<span class="price_tag"><i class="rmb_symbol">￥</i><?php echo $_smarty_tpl->tpl_vars['item']->value['mall_price'];?>
</span>
	       					<?php }?>
	       					
	       				</div>	
	       			</div>	
	       		</a>
	       </div>
		   <?php } ?>
	    </div>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['item_list']->value){?>
	<!--<div class="all_shop">
		<a href="<?php echo $_smarty_tpl->tpl_vars['item_list_link']->value;?>
" class="all_shop_btn">全部店铺</a>
	</div>-->
	<?php }?>
	<!--推荐（商品）模块-->
	<?php if ($_smarty_tpl->tpl_vars['item_list']->value){?>
	<!--<div class="index_item">
	    <div class="item_tit">推荐商品</div>
	    <div class="item_cont">
	       <div class="rec_item_cont">
	       	 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	       	 <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>
	       			<a href="<?php echo $_smarty_tpl->tpl_vars['item_list_link']->value;?>
/merchant_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['merchant_id'];?>
/item_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
">
	       				<div class="rec_item_pic">
		       				<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['base_pic'];?>
" onerror="no_pic(this);" />
		       				<div class="rec_item_info">
		       					<span class="rec_item_pTit">价格：</span>
		       					<span class="rec_item_pTxt"><i class="rmb_icon">￥</i><?php echo $_smarty_tpl->tpl_vars['item']->value['mall_price'];?>
</span>
		       					<span class="rec_item_pDel abs_left"><?php echo $_smarty_tpl->tpl_vars['item']->value['sales_num'];?>
销量</span>
		       				</div>	       					
	       				</div>	
	       			</a>
	       		<?php }elseif($_smarty_tpl->tpl_vars['key']->value==1){?>       				
       				<a href="<?php echo $_smarty_tpl->tpl_vars['item_list_link']->value;?>
/merchant_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['merchant_id'];?>
/item_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
" class="rec_item_lnk fr">
       					<div class="rec_item_sPic">
       						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['base_pic'];?>
" onerror="no_pic(this);" />
       					</div>
       					<div class="rec_item_price">
       							<div class="rec_item_pTit1">价格：</div>
       							<div class="rec_item_pTxt"><i class="rmb_icon">￥</i><?php echo $_smarty_tpl->tpl_vars['item']->value['mall_price'];?>
</div>
       							<span class="rec_item_pDel"><?php echo $_smarty_tpl->tpl_vars['item']->value['sales_num'];?>
销量</sapn>
       					</div>
       				</a>
       				<?php }elseif($_smarty_tpl->tpl_vars['key']->value==2){?>
       				<a href="<?php echo $_smarty_tpl->tpl_vars['item_list_link']->value;?>
/merchant_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['merchant_id'];?>
/item_id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
" class="rec_item_lnk fr top">
       					<div class="rec_item_lprice">
       							<div class="rec_item_pTit1">价格：</div>
       							<div class="rec_item_pTxt"><i class="rmb_icon">￥</i><?php echo $_smarty_tpl->tpl_vars['item']->value['mall_price'];?>
</div>
       							<span class="rec_item_pDel"><?php echo $_smarty_tpl->tpl_vars['item']->value['sales_num'];?>
销量</span>
       					</div>
       					<div class="rec_item_srPic">
       						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['base_pic'];?>
" onerror="no_pic(this);" />
       					</div>
       				</a>
       				<?php }?>
	       		<?php } ?>
	       </div>
	    </div>
	</div>-->
	<?php }?>

	<!--系统公告模块-->
	<?php if ($_smarty_tpl->tpl_vars['notice_list']->value){?>
	<!--<div class="notice">
	    <div class="notice_tit">系统公告</div>
	    <div class="notice_wrap">
	    	<?php  $_smarty_tpl->tpl_vars['notice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notice_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notice']->key => $_smarty_tpl->tpl_vars['notice']->value){
$_smarty_tpl->tpl_vars['notice']->_loop = true;
?>
		  	<div class="notice_line">
		  		<div class="notice_cont"><?php echo $_smarty_tpl->tpl_vars['notice']->value['title'];?>
</div>
		  		<div class="notice_time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['notice']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</div>
		  	</div>
		  	<?php } ?>
	  	</div>
	</div>-->
	<?php }?>
	<!--搜索-->
	<div class="search_cnt" id="home_search">
    <form class="search_form" method="get" action="/FrontSearch/search_item_result">
        <div class="head_cnt">
            <div class="head_cnt_input">
                <input type="search" name="keyword" class="search_input" placeholder="输入商品名称" autocomplete="off" />
            </div>
            <a class="cancel" href="javascript:void(0);" onclick="$('#home_search').hide();$('#screenIfm').hide();">取消</a>
        </div>
        <!--热门搜索标签-->
        <?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['hot_keywords']->value);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>1){?>
        <div class="key_list">
        	<div class="key_line">
					<?php  $_smarty_tpl->tpl_vars['keywords'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keywords']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_keywords']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['keywords']->key => $_smarty_tpl->tpl_vars['keywords']->value){
$_smarty_tpl->tpl_vars['keywords']->_loop = true;
?>
						<a class="key_block" href="<?php echo $_smarty_tpl->tpl_vars['search_item_result_link']->value;?>
/keyword/<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
</a>
					<?php } ?>
        	</div>
        </div>
        <?php }?>
    </form>
	</div>
	<!--弹出层背景透明化-->
	<div id="screenIfm" style="z-index:10;display:none;background-color:#fff;opacity:1;" class="screenIfm">
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
var slide_length= '<?php echo $_smarty_tpl->tpl_vars['cust_flash_num']->value;?>
';

$(function()
{
	//轮播图自适应手机
	var windowWith = window.innerWidth;
	var slide_ul_width = windowWith * slide_length;
	var slide_ul_height = windowWith * 100 / 375;	
	$('#slides').width(slide_ul_width);
	$('#slides').height(slide_ul_height);
	$('#img_poa').height(slide_ul_height);
	var swipeImgArray = $('.slide_img');
	for(var i = 0; i < swipeImgArray.length; i++){
		$(swipeImgArray[i]).width(windowWith);
		$(swipeImgArray[i]).height(slide_ul_height);
  }
  $('#slider_cont').flexslider({
      animation: "slide",
      direction: "horizontal",
      easing: "swing"
  });
  //商品图片高度
  var item_height = windowWith * 0.46;
  //var rec_item_height = windowWith * 0.216;
  var shopItemArray = $('.shop_item_pic');
  for(var i = 0; i < shopItemArray.length; i++){
		$(shopItemArray[i]).height(item_height);
  }
  //$('.rec_item_pic').height(item_height);
  //$('.rec_item_sPic,.rec_item_srPic').height(rec_item_height);

  var shop_h = item_height + 10;
  var shopItemContArray = $('.shop_item_cont');
  for(var i = 0; i < shopItemContArray.length; i++){
		$(shopItemContArray[i]).height(shop_h);
  }

  	//搜索
	$('#search_enter').click(function()
	{
		$('#home_search,#screenIfm').show();	
	});	
	//隐藏弹出框	
	$('.win-mask,.fx_font').click(function(){
		$('.win-mask').hide();
		$('.fx_font').hide();
	});
});

</script>
<script src="__JS__/front/slider.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/javascript"></script>
<script src="__JS__/front/search.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

</body>
</html>
 
<?php }} ?>