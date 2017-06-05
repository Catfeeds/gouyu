<?php /* Smarty version Smarty-3.1.6, created on 2016-10-26 14:24:24
         compiled from "/Users/wuzeguo/workspace/gouyu/Tpl/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:177908967157b18a28968776-04439385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d0b41e9e704c260fabd0f8baf97d9f2c80fc407' => 
    array (
      0 => '/Users/wuzeguo/workspace/gouyu/Tpl/footer.html',
      1 => 1477463029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177908967157b18a28968776-04439385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57b18a289cb62',
  'variables' => 
  array (
    'close_treasure_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b18a289cb62')) {function content_57b18a289cb62($_smarty_tpl) {?><!--底部导航-->
<div class="footer clearfix" style="z-index:1000">
    <div class="footer_box 
        <?php if (@ACTION_NAME=='guess_index'||@ACTION_NAME=='guess_info'||@ACTION_NAME=='guess_champion_info'||@ACTION_NAME=='guess_rule'){?>footer_active<?php }?>" onclick="redirect('/FrontGuess/guess_index')">
        <span class="icon jingcia_white3x jingcai_gold3x"></span>
        <p>竞猜</p>
    </div>
    <?php if (!$_smarty_tpl->tpl_vars['close_treasure_info']->value){?>
    <div class="footer_box 
        <?php if (@ACTION_NAME=='roll_detail'||@ACTION_NAME=='treasure_index'||@ACTION_NAME=='treasure_detail'||@ACTION_NAME=='draw_prize_record'||@ACTION_NAME=='award_record_by_prize'||@ACTION_NAME=='draw_prize_detail'||@ACTION_NAME=='treasure_rule'){?>footer_active<?php }?>" onclick="redirect('/FrontTreasure/treasure_index.html')">
        <span class="icon duobao_white3x duobao_gold3x"></span>
        <p>夺宝</p>
    </div>
    <?php }?>
    <div class="footer_box 
        <?php if (@ACTION_NAME=='mall'||@ACTION_NAME=='exchange_rule'||@ACTION_NAME=='class_mall'||@ACTION_NAME=='item_detail'){?>footer_active<?php }?>" onclick="redirect('/FrontMall/mall.html')">
        <span class="icon shangcheng_white3x shangcheng_gold3x" style="margin-top: 0.1rem;"></span>
        <p>商城</p>
    </div>
    <div class="footer_box  
        <?php if (@ACTION_NAME=='personal_data'||@ACTION_NAME=='user_game_list'||@ACTION_NAME=='add_user_game'||@ACTION_NAME=='setup'||@ACTION_NAME=='bind_email'||@ACTION_NAME=='bind_mobile'||@ACTION_NAME=='user_address_list'||@ACTION_NAME=='add_user_address'||@ACTION_NAME=='my_roll'||@ACTION_NAME=='my_exchange'||@ACTION_NAME=='exchange_detail'||@ACTION_NAME=='my_guess'||@ACTION_NAME=='my_guess_champion'||@ACTION_NAME=='my_treasure'||@ACTION_NAME=='account_list'||@ACTION_NAME=='help_center'||@ACTION_NAME=='article_detail'||@ACTION_NAME=='about_us'||@ACTION_NAME=='recharge'||@ACTION_NAME=='pay_page'||@ACTION_NAME=='recharge_success'||@ACTION_NAME=='my_qr_code'||@ACTION_NAME=='my_recharge_back'){?>footer_active<?php }?>" onclick="redirect('/FrontUser/personal_data')">
        <span class="icon geren_white3x geren_gold3x"></span>
        <p>个人</p>
    </div>
</div>
<?php }} ?>