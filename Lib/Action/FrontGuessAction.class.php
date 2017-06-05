<?php
//竞猜类
class FrontGuessAction extends FrontAction
{
    function _initialize() 
    {
        parent::_initialize();
        $this->per_page_num = 6;
    }

    /**
     * 竞猜首页
     * @author wzg
     * date 8-22
     */
    public function guess_index()
    {
        //1,今日竞猜人数及金额
        $guess_user = D('GuessUser');
        //今日零点时间
        $today_start_time = strtotime(date('Y-m-d'));
        $today_end_time = strtotime('+1 day', $today_start_time);
        $guess_user_info = $guess_user->field('count(*) AS people_num, sum(add_money) AS total_money')
            ->where('addtime >= ' . $today_start_time . ' AND addtime <= ' . $today_end_time)
            ->find();
        if ($guess_user_info['total_money'] > 10000)
        {
            $guess_user_info['total_money'] = floatval(intval($guess_user_info['total_money'] / 100)/100) . '万';
        } else {
            $guess_user_info['total_money'] = intval($guess_user_info['total_money']);
        }
        //dump($guess_user_info);

        //2, roll项目
        $roll_obj = new RollModel();
        $roll_info = $roll_obj->where('isuse = 1 AND is_open = 0 AND start_time <= ' . NOW_TIME . ' AND end_time >= ' . NOW_TIME)
            ->find();
        if ($roll_info) {
            $prize_info = D('Prize')->getPrizeInfo($roll_info['prize_id']);
            $roll_info['prize_name'] = $prize_info['prize_name'];
            $roll_info['img_path'] = $prize_info['img_path'];
            $roll_info['left_time'] = $roll_obj->calLeftTime($roll_info['end_time']);
        }

        //3, 竞猜周排行
        //这周一
        //为0是 就是 星期七
        $curtime=time();
        $curtime = strtotime(date('Y-m-d', $curtime));
        $curweekday = date('w');
        $curweekday = $curweekday?$curweekday:7;
        $curmon = $curtime - ($curweekday-1)*86400; //周一 零点时间戳
        $cursun = $curmon + 7*86400; //周7 零点时间戳
        //$guess_user_list = $guess_user->field('(sum(prize_money) - sum(add_money)) AS total_prize, user_id')
        //    ->where('is_pay = 1 AND addtime >= ' . $curmon . ' AND addtime <= ' . $cursun)
        //    ->group('user_id')
        //    ->order('total_prize DESC')
        //    ->having('total_prize > 0')
        //    ->limit(5)
        //    ->select();
        $guess_user_list = $guess_user->alias('u')
            ->join('tp_guess_field_question AS q ON q.guess_field_question_id = u.guess_field_question_id')
            ->field('(sum(u.prize_money) - sum(u.add_money)) AS total_prize, u.user_id')
            ->where('q.is_over = 1 AND u.is_pay = 1 AND u.addtime >= ' . $curmon . ' AND u.addtime <= ' . $cursun)
            ->group('u.user_id')
            ->order('total_prize DESC')
            ->having('total_prize > 0')
            ->limit(5)
            ->select();
        //echo $guess_user->getLastSql();
        //dump($guess_user_list);die;

        $guess_user_list = $guess_user->getListData($guess_user_list);

        //竞猜分类
        $guess_type_list = D('GuessType')->getGuessTypeList('', 'isuse = 1', 'serial', 4);
        $guess_type_list = D('GuessType')->getListData($guess_type_list);
        $this->assign('guess_type_list', $guess_type_list);
        $guess_type_id = I('get.guess_type_id', 0, 'int');
        $guess_type_id = $guess_type_id ? $guess_type_id : 14;
        $this->assign('guess_type_id', $guess_type_id);

        //4,竞猜列表
        $guess_obj = new GuessModel();
        $where_n = 'isuse = 1 AND guess_type_id = ' . $guess_type_id;
		$total_num  = $guess_obj->getGuessNum($where_n);
        $this->assign('total_num', $total_num);

        $where_n .= ' AND is_over = 0';
		$no_end_total = $guess_obj->getGuessNum($where_n);

        $order_by = '(case when first_field_time <= '. NOW_TIME . ' AND is_over = 0  then 0
            when first_field_time > "' . NOW_TIME .'" AND  is_over = 0 then 1 
        else 2 end)';

        $where = 'isuse = 1 AND start_time <= ' . NOW_TIME . ' AND guess_type_id = ' . $guess_type_id; 

        if ($no_end_total < $this->per_page_num) {
            $num_dec = $this->per_page_num - $no_end_total;
            if ($no_end_total) {
                $guess_obj->setStart(0);
                $guess_obj->setLimit($no_end_total);
                $order_by_se = $order_by . ', serial';
                $guess_list1 = $guess_obj->getGuessList('', $where, $order_by_se);

                $guess_obj->setStart($no_end_total);
                $guess_obj->setLimit($num_dec);
                $order_by_en = $order_by . ', over_time DESC';
                $guess_list2 = $guess_obj->getGuessList('', $where, $order_by_en);

                foreach ($guess_list2 AS $k=>$v) {
                    $guess_list1[] = $v;
                }
                $guess_list = $guess_list1;
            } else {
                $guess_obj->setStart(0);
                $guess_obj->setLimit($this->per_page_num);
                $order_by .= ', over_time DESC';
                $guess_list = $guess_obj->getGuessList('', $where, $order_by);
            }
        } else {
            $guess_obj->setStart(0);
            $guess_obj->setLimit($this->per_page_num);
            $order_by .= ', serial';
            $guess_list = $guess_obj->getGuessList('', $where, $order_by);
        }

        $guess_list = $guess_obj->getListData($guess_list);

        $this->assign('firstRow', 0);
		$this->assign('page_num', $this->per_page_num);
        $this->assign('guess_list', $guess_list);

        //公告 
        $where = 'notice_sort_id = 2 AND isuse = 1';
        $notice_obj = new NoticeBaseModel();
        $notice_id = $notice_obj->where($where)->order('addtime DESC')->getField('notice_id');
        $content = $notice_obj->getNoticeContents($notice_id);
        $this->assign('content', $content);

        $this->assign('guess_user_info', $guess_user_info);
        $this->assign('roll_info', $roll_info);
        $this->assign('guess_user_list', $guess_user_list);
        $this->assign('head_title', '竞猜首页');
        $this->display();
    }

    //异步竞猜列表
    //todo 1, 如果未结束的足够，则直接取未结束的， 
    //2, 如果不足够，则先查看还剩下几个，先取剩下的，取好后再查看还需要取多少个，则取已结束的
    public function ajax_guess_list()
    {
		$user_id = intval(session('user_id'));
		$firstRow = I('firstRow');
        $guess_type_id = I('guess_type_id', 0, 'int');

        $where_n = 'isuse = 1 AND guess_type_id = ' . $guess_type_id;
        $guess_obj = new GuessModel();
		$total = $guess_obj->getGuessNum($where_n);

		if ($firstRow < ($total - 1) && $user_id)
        { 
            $where_n .= ' AND is_over = 0';
            $no_end_total = $guess_obj->getGuessNum($where_n);

            $order_by = '(case when first_field_time <= '. NOW_TIME . ' AND is_over = 0  then 0
                when first_field_time > "' . NOW_TIME .'" AND  is_over = 0 then 1 
            else 2 end)';

            $where = 'isuse = 1 AND start_time <= ' . NOW_TIME . ' AND guess_type_id = ' . $guess_type_id; 

            if ($no_end_total < $firstRow + $this->per_page_num) {
                if ($no_end_total >= $firstRow) {
                    $num_dec = $this->per_page_num + $firstRow - $no_end_total;
                    $num_dec1 = $no_end_total - $firstRow ; //没结束的还有几个
                    $guess_obj->setStart($firstRow);
                    $guess_obj->setLimit($num_dec1);
                    $order_by_se = $order_by . ', serial';
                    $guess_list1 = $guess_obj->getGuessList('', $where, $order_by_se);

                    $guess_obj->setStart($no_end_total);
                    $guess_obj->setLimit($num_dec);
                    $order_by_en = $order_by . ', over_time DESC';
                    $guess_list2 = $guess_obj->getGuessList('', $where, $order_by_en);

                    foreach ($guess_list2 AS $k=>$v) {
                        $guess_list1[] = $v;
                    }
                    $guess_list = $guess_list1;
                } else {
                    $guess_obj->setStart($firstRow);
                    $guess_obj->setLimit($this->per_page_num);
                    $order_by .= ', over_time DESC';
                    $guess_list = $guess_obj->getGuessList('', $where, $order_by);
                }
            } else {
                $guess_obj->setStart($firstRow);
                $guess_obj->setLimit($this->per_page_num);
                $order_by .= ', serial';
                $guess_list = $guess_obj->getGuessList('', $where, $order_by);
            }

            $guess_list = $guess_obj->getListData($guess_list);
            //trace($guess_list);

			echo json_encode($guess_list);
			exit;
		}

		exit('failure');
    }

    /**
     * 竞猜赛事
     * @author wzg
     * @date 8-23
     */
    public function guess_info()
    {
        $guess_id = I('get.guess_id', 0, 'int');
        if (!$guess_id) $this->alert('出错了，请稍后再试', '/FrontGuess/guess_index.html');

        //找出详情，查看是否已结束
        $guess_obj = new GuessModel();
        $guess_info = $guess_obj->getGuessInfo($guess_id);
        if (!$guess_info) $this->alert('出错了，请稍后再试', '/FrontGuess/guess_index.html');
        $host_team_info = D('Team')->getTeamInfo($guess_info['host_team']);
        $guest_team_info = D('Team')->getTeamInfo($guess_info['guest_team']);
        $this->assign('host_team_info', $host_team_info);
        $this->assign('guest_team_info', $guest_team_info);

        //1,参与人数及投注金额
        $guess_user_obj = M('GuessUser');
        $guess_user_info = $guess_user_obj->field('count(*) AS people_num, sum(add_money) AS total_money')
            ->where('guess_id = ' . $guess_id)
            ->find();

        //没结束则执行其他操作,否则默认显示每一局的信息
        if ($guess_info['start_time'] <= NOW_TIME) {

            //2,局
            $guess_field_obj = new GuessFieldModel();
            $guess_field_list = $guess_field_obj->where('guess_id = ' . $guess_id)
                ->order('is_first DESC, serial, addtime')
                ->select();
            $guess_field_list = $guess_field_obj->getListData($guess_field_list);
            $guess_field_num = $guess_field_obj->where('isuse = 1 AND guess_id = ' . $guess_id)->count();
            $this->assign('guess_field_num', $guess_field_num);
            //dump($guess_field_list);die;

            //3,如果是有查看某一局
            //如果没有局列表，则不执行以下代码
            if ($guess_field_list) {
                $guess_field_id = I('guess_field_id', 0, 'int');
                if (!$guess_field_id) {
                    $key = null;
                    foreach ($guess_field_list AS $k=>$v) {
                        if ($v['over'] == 'no_over') {
                            $key = $k;
                            break;
                        }
                    }
                    //当key 为 null 时， 说明所有所有局都已开盘，无法投注
                    if (!$key) {
                        $guess_field_id = $guess_field_list[0]['guess_field_id'];
                    } else {
                        $guess_field_id = $guess_field_list[$key]['guess_field_id'];
                    }
                } else {

                }

                //检查这个局是否已关
                $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_id);
                if(GuessFieldModel::checkOpen($guess_field_info) == 'over') $guess_field_over = 1;
                $this->assign('guess_field_over', $guess_field_over);

                $this->assign('guess_field_id', $guess_field_id);
                $this->assign('guess_field_info', $guess_field_info);

                //如果没结果则显示结束时间
                if ($guess_field_over != 1) {
                    $left_time = D('Roll')->calLeftTime($guess_field_info['start_time']);
                    $this->assign('left_time', $left_time);
                }

                //4,所在局的问题
                if ($guess_field_id) {
                    $guess_field_question_obj = new GuessFieldQuestionModel();
                    $guess_field_question_list = $guess_field_question_obj->getGuessFieldQuestionList('', 'isuse = 1 AND guess_field_id = ' . $guess_field_id, 'serial');
                    $guess_field_question_list = $guess_field_question_obj->getListData($guess_field_question_list);
//trace($guess_field_question_list);
                    //dump($guess_field_question_list);die;
                }

                //5, 猜冠军
                $guess_champion_obj = new GuessChampionModel();
                $guess_champion_info = $guess_champion_obj->field('guess_champion_id, title')
                    ->where('is_over = 0 AND isuse = 1')
                    ->order('serial, start_time')
                    ->find();
                if ($guess_champion_info) {
                    $guess_champion_info['people_num'] = M('GuessChampionUser')->
                        where('guess_champion_id = ' . $guess_champion_info['guess_champion_id'])
                        ->count();
                    //猜冠军的队伍，取4个
                    $guess_champion_team_obj = new GuessChampionTeamModel();
                    $guess_champion_team_list = $guess_champion_team_obj->getGuessChampionTeamList('', 
                        'isuse = 1 AND guess_champion_id = ' . $guess_champion_info['guess_champion_id'], 'serial', 4);
                    $guess_champion_team_list = $guess_champion_team_obj->getListData($guess_champion_team_list);
                    //dump($guess_champion_team_list);die;
                }

                //个人余额
                $user_id = intval(session('user_id'));
                $user_obj = new UserModel($user_id);
                $left_money = $user_obj->getLeftMoney();
                $this->assign('left_money', $left_money);
            }
        }

        $this->assign('head_title', '赛事竞猜');
        $this->assign('guess_info', $guess_info);
        $this->assign('guess_user_info', $guess_user_info);
        $this->assign('guess_field_list', $guess_field_list);
        $this->assign('guess_field_question_list', $guess_field_question_list);
        $this->assign('guess_champion_info', $guess_champion_info);
        $this->assign('guess_champion_team_list', $guess_champion_team_list);
        if (!$guess_field_id) {
            $this->display(APP_PATH . '/Tpl/FrontGuess/guess_info_no_start.html');
        } else {
            $this->display(APP_PATH . '/Tpl/FrontGuess/guess_info.html');
        }
    }


    /**
     * 取消下注
     * wzg
     * todo 1, 检查这个盘口是否已经取消过了 是否已开盘
     *      2, 退回金额 取消记录
     *      3, 记录
     */
    public function ajax_cancel_bat()
    {
        $user_id = intval(session('user_id'));

        //1, 验证
        $guess_field_question_id = I('guess_field_question_id', 0, 'int');
        if (!$guess_field_question_id) exit('failure');

        $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);
        if (!$guess_field_question_info) exit('failure');

        $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_question_info['guess_field_id']);
        if(GuessFieldModel::checkOpen($guess_field_info) == 'over') exit('failure');

        $guess_bat_reback_obj = M('GuessBatReback');
        $num = $guess_bat_reback_obj->where('user_id = ' . $user_id . ' AND guess_field_question_id = ' . $guess_field_question_id)->count();
        if ($num) exit('failure');

        //2, reback money
        $where = 'user_id = ' . $user_id . ' AND guess_field_question_id = ' . $guess_field_question_id;
        $bat_info = M('GuessUser')->field('sum(add_money) AS bat_money')
            ->where($where)
            ->find();

        if ($bat_info['bat_money'] && $bat_info['bat_money'] > 0) {
            $account_obj = new AccountModel();
            $success = $account_obj->addAccount($user_id, AccountModel::GUESS_BAT_REBACK, $bat_info['bat_money'], '取消下注', $guess_field_question_id);
            if ($success < 0) exit('failure');

            //设置投注记录删除
            M('GuessUser')->where($where)->delete();

            //3, 记录
            $arr = array(
                'user_id' => $user_id, 
                'guess_field_question_id' => $guess_field_question_id, 
                'addtime' => NOW_TIME, 
                'isuse' => 1
            );
            $guess_bat_reback_obj->add($arr);

            //4, 更新赔率
            $guess_user_obj = new GuessUserModel();
            //删除之后投注总额
            $total_host_money = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = 1')->sum('add_money');
            $total_guest_money = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = 2')->sum('add_money');
            //理新
            $odds_info = $guess_user_obj->cal_odds($total_host_money, $total_guest_money);
            D('GuessFieldQuestion')->setGuessFieldQuestion($guess_field_question_id, $odds_info);

            exit('success');
        }
        exit('no_have');

    }


    /**
     * 判断猜冠军是否已结束，或已开盘
     * 已结束或开盘，返回false else true
     */
    public function check_guess_champion_status($info)
    {
        if ($info['is_over']) {
            return  false;
        } elseif ($info['is_start'] == 1) {
            return false;
        } elseif ($info['is_start'] == 0 && $info['start_time'] < NOW_TIME) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * 猜冠军详情
     * @author wzg
     * @date 8-23
     */
    public function guess_champion_info()
    {
        $guess_champion_id = I('get.guess_champion_id', 0, 'int');
        if (!$guess_champion_id) $this->alert('出错了，请稍后再试', '/FrontGuess/guess_index.html');

        //详情
        $guess_champion_obj = new GuessChampionModel();
        $guess_champion_info = $guess_champion_obj->getGuessChampionInfo($guess_champion_id);
        //if ($guess_champion_info['is_over']) $this->alert('出错了，请稍后再试', '/FrontGuess/guess_index.html');

        //是否已结束，或者已开盘
        $guess_champion_status = $this->check_guess_champion_status($guess_champion_info);
        $this->assign('guess_champion_status', $guess_champion_status);

        //人数及金额
        $guess_champion_user_info = M('GuessChampionUser')->field('count(*) AS people_num, sum(add_money) AS total_money')
            ->where('guess_champion_id = ' . $guess_champion_id)
            ->find();
        $guess_champion_info['people_num'] = $guess_champion_user_info['people_num'];
        $guess_champion_info['total_money'] = $guess_champion_user_info['total_money'];
        //dump($guess_champion_info);die;

        //队伍
        $guess_champion_team_obj = new GuessChampionTeamModel();
        $guess_champion_team_list = $guess_champion_team_obj->getGuessChampionTeamList('', 'guess_champion_id = ' . $guess_champion_id, 'serial', 100);
        $guess_champion_team_list = $guess_champion_team_obj->getListData($guess_champion_team_list);
        $guess_champion_team_num = $guess_champion_team_obj->getGuessChampionTeamNum('guess_champion_id = ' . $guess_champion_id);
        $this->assign('guess_champion_team_num', $guess_champion_team_num);
        //dump($guess_champion_team_list);die;

        $left_time = RollModel::calLeftTime($guess_champion_info['start_time']);
        $this->assign('left_time', $left_time);

        //user--left_money
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        $this->assign('left_money', $left_money);

        $this->assign('head_title', '猜冠军赛事');
        $this->assign('guess_champion_info', $guess_champion_info);
        $this->assign('guess_champion_team_list', $guess_champion_team_list);
        $this->display();
    }

    /**
     * 投注
     */
    public function bat_guess()
    {
        $team_type = I('team_type', 0, 'int');
        $guess_field_question_id = I('guess_field_question_id', 0, 'int');
        $add_money = I('add_money', 0, 'int');
        if (!$team_type || !$guess_field_question_id) exit('failure');
        if (!$add_money || $add_money < 100) exit('failure');

        if ($team_type != 1 && $team_type != 2) exit('failure');
        $add_money = ($add_money > 5000000) ? 5000000 : $add_money;

        $user_id = intval(session('user_id'));
        $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);
        $guess_id = $guess_field_question_info['guess_id'];

        //判断问题是否已结算
        if ($guess_field_question_info['is_over']) {
            exit('over');
        }

        //判断是否已经结束
        $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_question_info['guess_field_id']);
        if(GuessFieldModel::checkOpen($guess_field_info) == 'over') exit('failure');

        //队伍id and odds
        $guess_info = D('Guess')->getGuessInfo($guess_id);
        $team_id = $team_type == 1 ? $guess_info['host_team'] : $guess_info['guest_team'];
        $odds = $team_type == 1 ? $guess_field_question_info['host_odds'] : $guess_field_question_info['guest_odds'];
        $host_team_name = D('Team')->getTeamField($guess_info['host_team'], 'team_name');
        $guest_team_name = D('Team')->getTeamField($guess_info['guest_team'], 'team_name');
        $title = '(' . $host_team_name . 'VS' . $guest_team_name . ')';

        //判断余额是否足够并支付
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        if (floatval($left_money) < floatval($add_money)) exit('failure');

        $account_obj = new AccountModel();
        $success = $account_obj->addAccount($user_id, AccountModel::GUESS_PAY, $add_money * -1, $title, $guess_field_question_id);
        if ($success < 0) exit('failure');

        $guess_user_obj = new GuessUserModel();
        //没添加之前的两队金额
        $total_host_money = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = 1')->sum('add_money');
        $total_guest_money = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = 2')->sum('add_money');
        //调整
        $team_type == 1 && ($total_host_money = $total_host_money + $add_money);
        $team_type == 2 && ($total_guest_money = $total_guest_money + $add_money);

        //insert database
        $arr = array(
            'guess_id' => $guess_id,
            'user_id' => $user_id,
            'team_id' => $team_id,
            'guess_field_question_id' => $guess_field_question_id,
            'team_type' => $team_type,
            'add_money' => $add_money,
            'odds'      => $odds,
            'is_pay'    => 1,
            'addtime'  => NOW_TIME
        );
        $state = $guess_user_obj->addGuessUser($arr);
        if ($state){
            //调整总赔率
            $odds_info = $guess_user_obj->cal_odds($total_host_money, $total_guest_money);
            D('GuessFieldQuestion')->setGuessFieldQuestion($guess_field_question_id, $odds_info);
            exit('success');
        }

        exit('failure');
    }


    /**
     * 投注
     */
    public function bat_guess_champion()
    {
        $guess_champion_team_id = I('guess_champion_team_id', 0, 'int');
        $guess_champion_id = I('guess_champion_id', 0, 'int');
        $add_money = I('add_money', 0, 'int');
        if (!$guess_champion_team_id || !$guess_champion_id) exit('failure');
        if (!$add_money || $add_money < 100) exit('failure');

        //title
        $guess_champion_info = D('GuessChampion')->getGuessChampionInfo($guess_champion_id);
        if (!$guess_champion_info)  exit('failure');

        //是否可以投注
        $guess_champion_status = $this->check_guess_champion_status($guess_champion_info);
        if (!$guess_champion_status) exit('failure');

        $user_id = intval(session('user_id'));
        $guess_champion_user_obj = M('GuessChampionUser');
        //投注金额是否已到上限
        $total_money_each_guess = $guess_champion_user_obj->where('user_id = ' . $user_id . ' AND guess_champion_team_id = ' . $guess_champion_team_id)
            ->sum('add_money');
        $max_champion_bat = $GLOBALS['config_info']['MAX_CHAMPION_BAT'];
        if ($max_champion_bat < ($total_money_each_guess + $add_money)) exit('max');

        //队伍id and odds
        $guess_champion_team_info = D('GuessChampionTeam')->getGuessChampionTeamInfo($guess_champion_team_id);
        $team_id = $guess_champion_team_info['team_id'];
        $odds = $guess_champion_team_info['odds'];

        //判断余额是否足够并支付
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        if (floatval($left_money) < floatval($add_money)) exit('failure');

        $account_obj = new AccountModel();
        $success = $account_obj->addAccount($user_id, AccountModel::GUESS_CHAMPION_PAY, $add_money * -1, $guess_champion_info['title'], $guess_champion_id);

        //insert database
        $arr = array(
            'guess_champion_id' => $guess_champion_id,
            'user_id' => $user_id,
            'team_id' => $team_id,
            'guess_champion_team_id' => $guess_champion_team_id,
            'add_money' => $add_money,
            'odds'      => $odds,
            'is_pay'    => 1,
            'addtime'  => NOW_TIME
        );
        $state = $guess_champion_user_obj->add($arr);
        if ($state) exit('success');

        exit('failure');
    }


    /**
     * 游戏规则
     */
    public function guess_rule()
    {
        $where = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::GUESS_RULE;
        $article_obj = new GeneralArticleModel();
        $contents = $article_obj->getSpecialArticleContent($where);

        $this->assign('contents', $contents);
        $this->assign('head_title', '夺宝规则');
        $this->display(APP_PATH . '/Tpl/FrontTreasure/treasure_rule.html');
    }

}
