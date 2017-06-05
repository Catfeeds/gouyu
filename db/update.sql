/***************2016-09-12************/
ALTER TABLE tp_guess_user ADD COLUMN `open_time` int(11) NOT NULL DEFAULT '0' COMMENT '设置结果时间';
ALTER TABLE tp_guess ADD COLUMN `alert_message` varchar(256) NOT NULL DEFAULT '' COMMENT '异常的提示信息';

ALTER TABLE tp_user_game CHANGE  COLUMN game_id `game_id` varchar(11) NOT NULL DEFAULT '' COMMENT '游戏id';
CREATE TABLE `tp_guess_type` (
      `guess_type_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
      `guess_type_name` varchar(32) NOT NULL DEFAULT '' COMMENT '类型名称',
      `logo` varchar(128) NOT NULL DEFAULT '' COMMENT 'logo',
      `desc` text NOT NULL COMMENT '描述',
      `serial` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
      `isuse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否启用，1启用，0关闭',
      PRIMARY KEY (`guess_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='竞猜类型表'
ALTER TABLE tp_guess ADD COLUMN `guess_type_id` int(8) NOT NULL DEFAULT '0' COMMENT '类型';
ALTER TABLE tp_guess_champion ADD COLUMN `is_start` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1, 2';
ALTER TABLE tp_user_recharge ADD COLUMN `expire_time` int(11) NOT NULL DEFAULT '0' COMMENT '到期时间';


ALTER TABLE tp_user_game CHANGE COLUMN game_account `game_account` varchar(200) NOT NULL DEFAULT '' COMMENT '游戏账号';
ALTER TABLE tp_order_address CHANGE COLUMN game_account `game_account` varchar(200) NOT NULL DEFAULT '' COMMENT ' 游戏账号';
ALTER TABLE tp_roll_user CHANGE COLUMN game_account `game_account` varchar(200) NOT NULL DEFAULT '' COMMENT ' 游戏账号';
ALTER TABLE tp_treasure_user CHANGE COLUMN game_account `game_account` varchar(200) NOT NULL DEFAULT '' COMMENT ' 游戏账号';


ALTER TABLE tp_draw_prize ADD COLUMN `deliver_time` int(11) NOT NULL DEFAULT '0' COMMENT '发货时间';



ALTER TABLE tp_draw_prize ADD COLUMN `isuse` tinyint(4) NOT NULL DEFAULT '1';
ALTER TABLE tp_guess_field_question ADD COLUMN `guess_question` varchar(128) NOT NULL DEFAULT '' COMMENT '问题';



ALTER TABLE tp_guess_champion ADD COLUMN `over_time` int(11) NOT NULL DEFAULT '0' COMMENT '结束时间';


/***************2016-09-26************/
ALTER TABLE tp_team ADD COLUMN `guess_type_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '竞猜类型';
ALTER TABLE tp_guess_field ADD COLUMN `is_first` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否第一局';
ALTER TABLE tp_guess ADD COLUMN `first_field_time` int(11) NOT NULL DEFAULT '0' COMMENT '第一局开始时间';


/***************2016-09-27************/
ALTER TABLE tp_draw_prize CHANGE COLUMN award_rate `award_rate` float(8,2) NOT NULL DEFAULT '0.00' COMMENT '中奖率';
ALTER TABLE tp_account ADD COLUMN `need_opt` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否需要操作';
ALTER TABLE tp_account ADD COLUMN `opt_time` int(11) NOT NULL DEFAULT '0' COMMENT '操作时间';
ALTER TABLE tp_guess_field_question ADD COLUMN `open_time` int(11) NOT NULL DEFAULT '0' COMMENT '结算时间';

ALTER TABLE tp_guess ADD COLUMN `bo` tinyint(6) NOT NULL DEFAULT '0' COMMENT 'bo';

/***************2016-09-28************/
ALTER TABLE tp_treasure CHANGE COLUMN draw_lottery `draw_lottery` varchar(6) NOT NULL COMMENT '老时时彩开奖号码';

ALTER TABLE tp_guess_field ADD COLUMN `field_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '局类型 1,让分局， 2, 大小分局';

/***************2016-09-29************/
ALTER TABLE tp_guess_field_question ADD COLUMN `lose_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '让分类型';
ALTER TABLE tp_guess_field_question ADD COLUMN `lose_score` float(6,2) NOT NULL DEFAULT '0.00' COMMENT '让分分数，或大小分总分';

CREATE TABLE `tp_recharge_back` (
      `recharge_back_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '返利受益者    用户表中的parent_id',
      `recharge_money` float(8,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
      `gain_money` float(8,2) NOT NULL DEFAULT '0.00' COMMENT '受益金额',
      `recharge_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '被受益用户',
      `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
      PRIMARY KEY (`recharge_back_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推广充值返利表'

ALTER TABLE tp_treasure ADD COLUMN `prop_deg` float(6,2) NOT NULL DEFAULT '0.00' COMMENT '夺宝进度';


/***************2016-10-09************/
CREATE TABLE `tp_guess_bat_reback` (
      `guess_bat_reback_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
      `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'user_id',
      `guess_field_question_id` int(11) NOT NULL DEFAULT '0' COMMENT '问题id',
      `addtime` int(11) NOT NULL DEFAULT '0',
      `isuse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否启用，1启用，0关闭',
      PRIMARY KEY (`guess_bat_reback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1260 DEFAULT CHARSET=utf8 COMMENT='投注退回记录'

ALTER TABLE tp_guess_field_question ADD COLUMN `defind_team_name` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否自定义队伍名';
ALTER TABLE tp_guess_field_question ADD COLUMN `defind_host_name` varchar(128) NOT NULL DEFAULT '' COMMENT '主队显示名';
ALTER TABLE tp_guess_field_question ADD COLUMN `defind_guest_name` varchar(128) NOT NULL DEFAULT '' COMMENT '客队显示名';


ALTER TABLE tp_user_game ADD COLUMN `steam_url` varchar(256) NOT NULL DEFAULT '';
ALTER TABLE tp_order_address ADD COLUMN `steam_url` varchar(256) NOT NULL DEFAULT '' COMMENT '机器人';
ALTER TABLE tp_treasure_user ADD COLUMN `steam_url` varchar(256) NOT NULL DEFAULT '' COMMENT '机器人';
ALTER TABLE tp_roll_user ADD COLUMN `steam_url` varchar(256) NOT NULL DEFAULT '' COMMENT '机器人';

/***************2016-10-11************/
ALTER TABLE tp_guess_field_question CHANGE COLUMN lose_score `lose_score` float(5,1) NOT NULL DEFAULT '0.0' COMMENT '让分分数，或大小分总分';


/***************2017-3-3************/
ALTER TABLE tp_treasure ADD COLUMN  `is_fuli` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否福利专区';
ALTER TABLE tp_treasure ADD COLUMN  `limit_fuli_money` float(10,2) NOT NULL DEFAULT '0.0' COMMENT '参于福利最低流水';
ALTER TABLE tp_guess_user CHANGE COLUMN  add_money `add_money` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '投注金额';
