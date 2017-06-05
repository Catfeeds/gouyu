<?php
//夺宝类 + Roll
class FrontTreasureAction extends FrontAction
{
    function _initialize() 
    {
        parent::_initialize();
        $this->per_page_num = 6;

        //是否关闭夺宝
        if ($GLOBALS['config_info']['IS_TREASURE_CLOSE'] && ACTION_NAME != 'roll_detail' && ACTION_NAME != 'submit_roll') {
            redirect(U('/FrontMall/mall'));
        }
    }

    /**
     * roll详情
     * @author wzg
     * @date 8-23
     */
    public function roll_detail()
    {
        $roll_id = I('get.roll_id', 0, 'int');
        if (!$roll_id) $this->alert('出错了，请稍后再试', '/FrontGuess/guess_index.html');

        //详情
        $roll_obj = new RollModel();
        $roll_info = $roll_obj->getRollInfo($roll_id);
        $prize_info = D('Prize')->getPrizeInfo($roll_info['prize_id']);
        $roll_info['prize_name'] = $prize_info['prize_name'];
        $roll_info['img_path'] = $prize_info['img_path'];
        $roll_info['left_time'] = $roll_obj->calLeftTime($roll_info['end_time']);

        //是否已开奖，如果有则取出中奖者
        if ($roll_info['is_open']) {
            $award_user_id = M('RollAward')->where('roll_id = ' . $roll_id)->getField('user_id');
            $user_obj = new UserModel($award_user_id);
            $award_user_info = $user_obj->getUserInfo('headimgurl, user_id, nickname');
            $award_user_info['addtime'] = M('RollUser')->where('user_id = ' . $award_user_id . ' AND roll_id = ' . $roll_id)->getField('addtime');
        }

        //是否已报名
        $user_id = intval(session('user_id'));
        $roll_user_info = M('RollUser')->where('user_id = ' . $user_id . ' AND roll_id = ' . $roll_id)->find();

        //已报名用户
        $roll_user_obj = new RollUserModel();
        $roll_user_list = $roll_user_obj->getRollUserList('', 'roll_id = ' . $roll_id, 'addtime DESC', 10);
        $roll_user_list = $roll_user_obj->getListData($roll_user_list);
        $roll_user_num = $roll_user_obj->getRollUserNum('roll_id = ' . $roll_id);

        //用户的游戏账号
        $user_id = intval(session('user_id'));
        $user_game_list = D('UserGame')->getUserGameList('', 'user_id = ' . $user_id, 'addtime DESC');
        $user_game_list = D('UserGame')->getListData($user_game_list);

        $game_list = D('Game')->getGameList('', 'isuse = 1', 'serial');

        //规则
        $where = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::ROLL_RULE;
        $article_obj = new GeneralArticleModel();
        $content = $article_obj->getSpecialArticleContent($where);
        $this->assign('content', $content);

        //用户余额
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        $this->assign('left_money', $left_money);

        $this->assign('head_title', 'Roll详情');
        $this->assign('roll_info', $roll_info);
        $this->assign('roll_user_info', $roll_user_info);
        $this->assign('roll_user_list', $roll_user_list);
        $this->assign('roll_user_num', $roll_user_num);
        $this->assign('award_user_info', $award_user_info);
        $this->assign('user_game_list', $user_game_list);
        $this->assign('game_list', $game_list);
        if ($roll_info['is_open']) {
            $this->display(APP_PATH . '/Tpl/FrontTreasure/award_page.html');
        } else {
            $this->display();
        }
    }

    /**
     * 提交报名信息
     * wzg
     */
    public function submit_roll()
    {
        $user_id = intval(session('user_id'));

        //查看是否有余额，没有则不能报名
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        if ($left_money <= 0) {
            exit('failure');
        }

        $type = I('type', 0, 'int');
        $roll_id = I('roll_id', 0, 'int');
        if (!$roll_id) exit('failure');

        //是否已报名
        $roll_user_obj = new RollUserModel();
        $is_roll = $roll_user_obj->getRollUserNum('roll_id = ' . $roll_id . ' AND user_id = ' . $user_id);
        if ($is_roll) exit('failure');

        $game_account_info = $this->check_game_account($user_id);
        $game_id = $game_account_info['game_id'];
        $game_account = $game_account_info['game_account'];
        $steam_url = $game_account_info['steam_url'];

        if (strpos($steam_url, 'https://steamcommunity.com/tradeoffer') === false) {
            exit('url_error');
        }

        //写入表
        $id = $this->roll_gene_id();
        if (strlen($id) != 11) exit('failure');

        $arr = array(
            'roll_id' => $roll_id,
            'game_id' => $game_id,
            'game_account' => $game_account,
            'steam_url' => $steam_url,
            'user_id' => $user_id,
            'id' => $id,
            'addtime' => NOW_TIME,
            'isuse' => 1
        );
        $success = $roll_user_obj->addRollUser($arr);
        if ($success) exit('success');

        exit('failure');
    }

    //生成roll id 号
    //前面4位随机数 ＋ 时间后7位
    private function roll_gene_id()
    {
        $time_str = substr(time(), 3);
        $rand_code = null;
        for ($i = 0; $i < 4; $i++)
        {
            $rand = rand(0,9);
            $rand_code .= $rand;
        }
        $rand_code = $rand_code . $time_str;

        return $rand_code;
    }

    /**
     * 夺宝首页
     * @author wzg
     * @date 8-23
     */
    public function treasure_index()
    {
        $treasure_obj = new TreasureModel();
        $treasure_list = $treasure_obj->getTreasureList('', 'isuse = 1 AND start_time <= ' . NOW_TIME . ' AND end_time >= ' . NOW_TIME . ' AND is_open = 0 AND is_fuli = 0', 'prop_deg DESC, serial', 30);
        $treasure_list = $treasure_obj->getListData($treasure_list);
        //dump($treasure_list);die;

        $fuli_list = $treasure_obj->getTreasureList('', 'isuse = 1 AND start_time <= ' . NOW_TIME . ' AND end_time >= ' . NOW_TIME . ' AND is_open = 0 AND is_fuli = 1', 'prop_deg DESC, serial', 30);
        $fuli_list = $treasure_obj->getListData($fuli_list);

        //夺宝成功
        $draw_prize_obj = new DrawPrizeModel();
        $draw_prize_list = $draw_prize_obj->getDrawPrizeList('', 'isuse = 1', 'addtime DESC', 30);
        $draw_prize_list = $draw_prize_obj->getListData($draw_prize_list);
        //dump($draw_prize_list);die;

        //红转榜
        $times = $treasure_obj->calWeekTimes();
        foreach ($times AS $k=>$v) {
            $times[$k]['name'] = M('Users')->where('user_id = ' . $v[0])->getField('nickname');
        }
        $this->assign('times', $times);
        #echo "<pre>";print_r($times);die;

        //公告 
        $where = 'notice_sort_id = 3 AND isuse = 1';
        $notice_obj = new NoticeBaseModel();
        $notice_id = $notice_obj->where($where)->order('addtime DESC')->getField('notice_id');
        $content = $notice_obj->getNoticeContents($notice_id);
        $this->assign('content', $content);

        $this->assign('head_title', '夺宝首页');
        $this->assign('treasure_list', $treasure_list);
        $this->assign('fuli_list', $fuli_list);
        $this->assign('draw_prize_list', $draw_prize_list);
        $this->display();
    }


    /**
     * 夺宝详情
     * @author wzg
     * @date 8-23
     */
    public function Treasure_detail()
    {
        $treasure_id = I('get.treasure_id', 0, 'int');
        if (!$treasure_id) $this->alert('出错了，请稍后再试', '/FrontTreasure/treasure_index.html');

        $treasure_obj = new TreasureModel();
        $treasure_info = $treasure_obj->getTreasureInfo($treasure_id);

        //参于人次
        $treasure_user_obj = D('TreasureUser');
        $treasure_info['people_num'] = $treasure_user_obj->where('treasure_id = ' . $treasure_id)->count();

        $prize_info = M('Prize')->where('prize_id = ' . $treasure_info['prize_id'])->find();
        $treasure_info['prize_name'] = $prize_info['prize_name'];
        $treasure_info['img_path'] = $prize_info['img_path'];

        //此奖品下是否有中奖记录
        //$prize_award_num = M('DrawPrize')->where('prize_id = ' . $prize_id)->count();
        //$this->assign('prize_award_num', $prize_award_num);

        //剩余次数
        $left_times = (string)($treasure_info['total_person_times'] - $treasure_info['people_num']);
        $left_arr = array();
        for($i=0;$i<strlen($left_times);$i++) {
            $left_arr[] = $left_times[$i];
        }

        //我参于次数与时间
        $user_id = intval(session('user_id'));
        $my_treasure_list = $treasure_user_obj->where('user_id = ' . $user_id . ' AND treasure_id = ' . $treasure_id)
            ->order('addtime DESC')
            ->select();
    
        //所有夺宝用户
        $treasure_user_list = $treasure_user_obj->field('count(*) AS add_num, addtime, treasure_id, user_id')
            ->where('treasure_id = ' . $treasure_id)
            ->group('addtime, user_id')
            ->order('addtime DESC')
            ->limit(10)
            ->select();
        $treasure_user_list = $treasure_user_obj->getListData($treasure_user_list);

        //账户余额
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();

        //用户的游戏账号
        $user_id = intval(session('user_id'));
        $user_game_list = D('UserGame')->getUserGameList('', 'user_id = ' . $user_id, 'addtime DESC');
        $user_game_list = D('UserGame')->getListData($user_game_list);

        //夺宝规则 开奖规则
        $where1 = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::TREASURE_RULE;
        $where2 = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::TREASURE_OPEN_RULE;
        $article_obj = new GeneralArticleModel();
        $rule_contents = $article_obj->getSpecialArticleContent($where1);
        $open_contents = $article_obj->getSpecialArticleContent($where2);
        $this->assign('rule_contents', $rule_contents);
        $this->assign('open_contents', $open_contents);

        $game_list = D('Game')->getGameList('', 'isuse = 1', 'serial');

        //查看本周流水是否达到要求
        $this->assign('can_fuli', $this->check_fuli_limit($treasure_info));

        $this->assign('head_title', '夺宝详情');
        $this->assign('treasure_info', $treasure_info);
        $this->assign('my_treasure_list', $my_treasure_list);
        $this->assign('treasure_user_list', $treasure_user_list);
        $this->assign('left_money', $left_money);
        $this->assign('left_arr', $left_arr);
        $this->assign('user_game_list', $user_game_list);
        $this->assign('game_list', $game_list);
        $this->display();
    }

    //检查是否达到流水要求
    function check_fuli_limit(&$treasure_info)
    {
        if ($treasure_info['is_fuli'] && $treasure_info['limit_fuli_money'] > 0) {
            $user_id = intval(session('user_id'));   

            //为0是 就是 星期七
            $curtime=time();
            $curtime = strtotime(date('Y-m-d', $curtime));
            $curweekday = date('w');
            $curweekday = $curweekday?$curweekday:7;
            $curmon = $curtime - ($curweekday)*86400; //周一 零点时间戳
            $cursun = $curmon + 7*86400; //周7 零点时间戳

            $where = 'addtime >= ' . $curmon . ' AND addtime <= ' . $cursun . ' AND is_pay = 1 AND open_time > 0 AND user_id = ' . $user_id;
            $bat_money = M('GuessUser')->where($where)->sum('add_money');

            if ($treasure_info['limit_fuli_money'] <= $bat_money) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * 往期开奖记录(总）
     * wzg
     * @todo 根据奖品分组 , 取最新中奖信息
     */
    public function draw_prize_record()
    {
        $draw_prize_obj = new DrawPrizeModel();
        $subModel = $draw_prize_obj
            ->where('isuse = 1')
            ->order('addtime DESC')
            ->group('prize_id')
            ->select(false);
        $total_num = $draw_prize_obj->table($subModel.' b')->count();
        $this->assign('total_num', $total_num);

        $draw_prize_obj->setStart(0);
        $draw_prize_obj->setLimit($this->per_page_num);
        $draw_prize_list = $draw_prize_obj->where('isuse = 1')
            ->order('addtime DESC')
            ->group('prize_id')
            ->limit()
            ->select();
        $draw_prize_list = $draw_prize_obj->getListData($draw_prize_list);
        //dump($draw_prize_list);die;

        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);

        $this->assign('draw_prize_list', $draw_prize_list);
        $this->assign('head_title', '往期开奖总记录');
        $this->display();
    }

    public function ajax_draw_prize_record()
    {
        $firstRow = I('firstRow');
        $draw_prize_obj = new DrawPrizeModel();
        $draw_prize_obj->setStart($firstRow);
        $draw_prize_obj->setLimit($this->per_page_num);

        $draw_prize_list = $draw_prize_obj->where('isuse = 1')
            ->order('addtime DESC')
            ->group('prize_id')
            ->limit()
            ->select();
        $draw_prize_list = $draw_prize_obj->getListData($draw_prize_list);

        if($draw_prize_list) {
            exit(json_encode($draw_prize_list));
        } else {

            exit('failure');
        }
    }

    /**
     * 往期中奖记录－－－某奖品下记录
     * wzg
     */
    public function award_record_by_prize()
    {
        $prize_id = I('prize_id', 0, 'int');
        if (!$prize_id) $this->alert('出错了，请稍后再试', '/FrontTreasure/treasure_index.html');

        $user_id = intval(session('user_id'));

        $draw_prize_obj = new DrawPrizeModel();
        $total_num = $draw_prize_obj->where('prize_id = ' . $prize_id . ' AND isuse = 1')->count();
        $this->assign('total_num', $total_num);

        $draw_prize_obj->setStart(0);
        $draw_prize_obj->setLimit($this->per_page_num);
        $draw_prize_list = $draw_prize_obj->where('prize_id = ' . $prize_id . ' AND isuse = 1')
            ->order('addtime DESC')
            ->limit()
            ->select();
        $draw_prize_list = $draw_prize_obj->getListData($draw_prize_list);
        //dump($draw_prize_list);die;

        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);

        $this->assign('draw_prize_list', $draw_prize_list);
        $this->assign('prize_id', $prize_id);
        $this->assign('user_id', $user_id);
        $this->assign('head_title', '往期开奖记录');
        $this->display();
    }

    public function ajax_award_record_by_prize()
    {
        $firstRow = I('firstRow', 0, 'int');
        if (!$firstRow) exit('failure');

        $prize_id = I('prize_id', 0, 'int');
        if (!$prize_id) exit('failure');

        $draw_prize_obj = new DrawPrizeModel();
        $draw_prize_obj->setStart($firstRow);
        $draw_prize_obj->setLimit($this->per_page_num);

        $draw_prize_list = $draw_prize_obj->where('prize_id = ' . $prize_id . ' AND isuse = 1')
            ->order('addtime DESC')
            ->limit()
            ->select();
        $draw_prize_list = $draw_prize_obj->getListData($draw_prize_list);

        if($draw_prize_list) {
            exit(json_encode($draw_prize_list));
        } else {

            exit('failure');
        }
    }

    /**
     * 获奖详情
     * wzg
     */
    public function draw_prize_detail()
    {
        $draw_prize_id = I('draw_prize_id', 0, 'int');
        if (!$draw_prize_id) $this->alert('出错了，请稍后再试', '/FrontTreasure/treasure_info');

        $draw_prize_obj = new DrawPrizeModel();
        $draw_prize_info = $draw_prize_obj->getDrawPrizeInfos('draw_prize_id = ' . $draw_prize_id, 'treasure_id');
        //dump($draw_prize_info);die;
        if (!$draw_prize_info) $this->alert('出错了，请稍后再试', '/FrontTreasure/treasure_info');

        $treasure_obj = new TreasureModel();
        $treasure_info = $treasure_obj->getTreasureInfo($draw_prize_info['treasure_id']);

        //所有夺宝用户
        $treasure_user_obj = D('TreasureUser');
        $treasure_user_list = $treasure_user_obj->field('count(*) AS add_num, addtime, treasure_id, user_id')
            ->where('treasure_id = ' . $treasure_info['treasure_id'])
            ->group('user_id')
            ->order('addtime DESC')
            ->limit(1000000)
            ->select();
        $treasure_user_list = $treasure_user_obj->getListData($treasure_user_list);
        $this->assign('treasure_user_list', $treasure_user_list);
    
        $this->assign('draw_prize_info', $draw_prize_info);
        $this->assign('treasure_info', $treasure_info);
        $this->assign('head_title', '开奖详情');
        $this->display();
    }

    /**
     * 提交数据－－－夺宝
     * wzg
     */
    public function submit_treasure()
    {
        $treasure_id = I('treasure_id', 0, 'int');
        $add_times = I('add_times', 0, 'int');
        if (!$treasure_id) exit('failure');
        if (!$add_times || $add_times < 1) exit('failure');
        $user_id = intval(session('user_id'));

        $add_money = $add_times * 100;
        //验证钱是否足够
        $user_model = new UserModel($user_id);
        $user_money = $user_model->getLeftMoney();
        if ($user_money < $add_money) {
            exit('余额不足');
        }

        //验证是否已超最大值
        $treasure_info = D('Treasure')->getTreasureInfo($treasure_id);
        $total_person_times = $treasure_info['total_person_times']; 
        if ($treasure_info['is_open']) exit('夺宝已结束了');

        //如果是福利专区，检查是否有资格
        $can_fuli = $this->check_fuli_limit($treasure_info);
        if (!$can_fuli) exit('暂无参加福利资格');

        //今日已使用次数
        $today_start_time = strtotime(date('Y-m-d', NOW_TIME));
        $today_end_time = strtotime('+1 day', $today_start_time);
        $where = 'treasure_id = ' . $treasure_id. ' AND user_id = ' . $user_id . ' AND addtime >= ' . $today_start_time . ' AND addtime < ' . $today_end_time;
        $user_haved_num = M('TreasureUser')->where($where)->count();
        //是否达每人上限
        if (($user_haved_num+$add_times) > $treasure_info['each_person_times']) exit('您今天参加次数已超上限');

        $haved_num = M('TreasureUser')->where('treasure_id = ' . $treasure_id)->count();
        $left_times = intval($total_person_times - $haved_num);
        if ($left_times < $add_times) exit('提交次数已超总需次数');

        $game_account_info = $this->check_game_account($user_id);
        $game_id = $game_account_info['game_id'];
        $game_account = $game_account_info['game_account'];
        $steam_url = $game_account_info['steam_url'];

        if (strpos($steam_url, 'https://steamcommunity.com/tradeoffer') === false) {
            exit('url_error');
        }
        
        //入库
        $arr = array(
            'user_id' => $user_id,
            'treasure_id' => $treasure_id,
            'game_id' => $game_id,
            'game_account' => $game_account,
            'steam_url' => $steam_url,
            'addtime' => NOW_TIME,
            'isuse' => 1,
            'add_money' => 100
        );

        //分配　id
        $array = array();
        $id_arr = @json_decode($treasure_info['id_json_str'], true);
        //trace($id_arr);
        if (!$id_arr || !is_array($id_arr)) exit('网络异常, 请稍后再试');
        $left_times_new = $left_times - 1;
        for($i=0;$i<$add_times;$i++) {
            $rand_num = rand(0, $left_times_new); //获取一个随机数 范围内
            //trace($rand_num);
            //trace($id_arr);
            $id = $id_arr[$rand_num]; //根据随机数取出对应数组的值
            $arr['id'] = null; //清空
            $arr['id'] = $id; //附值
            $array[] = $arr; 
            unset($id_arr[$rand_num]); //去除已使用的数组元素
            shuffle($id_arr); //打乱数组，使其key值按顺序排序
            -- $left_times_new; //剩余个数减1
        }
        $ids_str = json_encode($id_arr);

        //刷新treasure表中的id_json_str
        $success1 = D('Treasure')->where('treasure_id = ' . $treasure_id)->setField('id_json_str', $ids_str);

        if ($success1) {
            //扣款
            $account_obj = new AccountModel();
            $success = $account_obj->addAccount($user_id, AccountModel::TREASURE_PAY, $add_money * -1,'夺宝支付('. $add_times . '人次)', $treasure_id, $add_times);

            $success2 = M('TreasureUser')->addAll($array);
            if ($success2) {
                //如果人数已到，过20秒则直接开奖
                //刷新夺宝进度
                $total_num = M('TreasureUser')->where('treasure_id = ' . $treasure_id)->count();
                if ($total_num) {
                    $prop_deg = $total_num / $total_person_times * 100;
                }
                $arr= array();
                $arr['prop_deg'] = $prop_deg;

                if ($total_num >= $total_person_times) {
                    $arr['open_time'] = NOW_TIME;
                }
                D('Treasure')->where('treasure_id = ' . $treasure_id)->setField($arr);

                //如果已达到开奖，则马上执行
                if ($total_num >= $total_person_times) {
                    D('Treasure')->autoSetResult();
                }

                exit('success');
            } else {
                exit('failure');
            }
        } else {
            exit('failure');
        }
    }

    /**
     * 填写游戏账号模块
     * wzg
     */
    public function check_game_account($user_id)
    {
        $type = I('type', 0, 'int');
        if ($type == 1) {
            $user_game_id = I('user_game_id', 0, 'int');
            if (!$user_game_id) exit('failure');

            //找了其账号
            $user_game_info = D('UserGame')->getUserGameInfos('user_game_id = ' . $user_game_id . ' AND user_id = ' . $user_id);
            if (!$user_game_info) exit('failure');

            $game_id = $user_game_info['game_id'];
            $game_account = $user_game_info['game_account'];
            $steam_url = $user_game_info['steam_url'];

        } else {
            $game_id = I('game_id', 0, 'int');
            $game_account = I('game_account', '', 'strip_tags');
            $save_game = I('save_game', 0, 'int');
            $steam_url = I('steam_url', '', 'strip_tags');
            if (!$game_id || !$game_account || !$steam_url) exit('failure');


            //是否保存
            if ($save_game) {
                $user_game_arr = array(
                    'game_id' => $game_id,
                    'game_account' => $game_account,
                    'user_id' => $user_id,
                    'addtime' => NOW_TIME,
                    'steam_url' => $steam_url
                );
                D('UserGame')->addUserGame($user_game_arr);
            }
        }

        return array(
            'game_id' => $game_id,
            'game_account' => $game_account,
            'steam_url' => $steam_url
        );
    }


    /**
     * 游戏规则
     */
    public function treasure_rule()
    {
        $where = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::TREASURE_RULE;
        $article_obj = new GeneralArticleModel();
        $contents = $article_obj->getSpecialArticleContent($where);

        $this->assign('contents', $contents);
        $this->assign('head_title', '夺宝规则');
        $this->display();
    }
}
