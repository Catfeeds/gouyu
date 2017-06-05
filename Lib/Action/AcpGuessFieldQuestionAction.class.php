<?php
/**
 * 每局问题类
 * 
 *
 */
class AcpGuessFieldQuestionAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessFieldQuestionAction()
	{
		parent::_initialize();
	}
	
    private function get_search_condition()
    {
        $where = 'true';

        //guess_type_id
        $guess_type_id = I('guess_type_id', 0, 'int');
        $this->assign('guess_type_id', $guess_type_id);
        if ($guess_type_id) {
            $guess_ids = M('Guess')->where('guess_type_id = ' . $guess_type_id)->getField('guess_id', true);
            if ($guess_ids) {
                $ids = implode(',', $guess_ids);
                $where .= ' AND guess_id IN (' . $ids . ')';
            } else {
                $where .= ' AND false';
            }
 
        }

        //guess_name
        $guess_name = I('guess_name', '', 'strip_tags');
        if ($guess_name) {
            $this->assign('guess_name', $guess_name);
            $guess_ids = M('Guess')->where('guess_name LIKE "%' . $guess_name . '%"')->getField('guess_id', true);
            if ($guess_ids) {
                $ids = implode(',', $guess_ids);
                $where .= ' AND guess_id IN (' . $ids . ')';
            } else {
                $where .= ' AND false';
            }
        }

        //guess_field
        $guess_field_name = I('guess_field_name', '', 'strip_tags');
        if ($guess_field_name) {
            $this->assign('guess_field_name', $guess_field_name);
            $guess_field_ids = M('GuessField')->where('guess_field_name LIKE "%' . $guess_field_name . '%"')->getField('guess_field_id', true);
            if ($guess_field_ids) {
                $ids = implode(',', $guess_field_ids);
                $where .= ' AND guess_field_id IN (' . $ids . ')';
            } else {
                $where .= ' AND false';
            }
        }

        //guess_field_id
        $guess_field_id = I('get.guess_field_id', 0, 'int');
        if ($guess_field_id) {
            $this->assign('guess_field_id', $guess_field_id);
            $where .= ' AND guess_field_id = ' . $guess_field_id;
        }

        return $where;
    }

	/**
     * 每局问题列表
     * @author wsq
     * @return void
     * @todo 
     */
	public function list_guess_field_question()
	{
        $where = $this->get_search_condition();
        $where .= ' AND isuse != 2';

		$guess_field_question_obj = new GuessFieldQuestionModel();
		//数据总量
		$total          = $guess_field_question_obj ->getGuessFieldQuestionNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_field_question_obj->setStart($Page->firstRow);
        $guess_field_question_obj->setLimit($Page->listRows);

        $guess_field_question_list  = $guess_field_question_obj ->getGuessFieldQuestionList('', $where, 'is_over, addtime ASC');
        $guess_field_question_list  = $guess_field_question_obj ->getListData($guess_field_question_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        //类型列表
        $guess_type_list = M('GuessType')->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);

        $this->assign("head_title", "每局问题列表");
        $this->assign("guess_field_question_list", $guess_field_question_list);
		$this->display();
	}
	
	/**
     * 添加每局问题
     * @author wsq
     * @return void
     */
	public function add_guess_field_question()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            //$guess_question_id = I('guess_question_id', 0, 'int');
            $guess_question = I('guess_question', '', 'strip_tags');
            $guess_id = I('guess_id', 0, 'int');
            $guess_field_id = I('guess_field_id', 0, 'int');
            //$host_odds = I('host_odds', 0.0, 'float');
            //$guest_odds = I('guest_odds', 0.0, 'float');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            $defind_team_name = I('defind_team_name', 0, 'int');
            $defind_host_name = I('defind_host_name', '', 'strip_tags');
            $defind_guest_name = I('defind_guest_name', '', 'strip_tags');

            //校验表单数据
            if (!$guess_id) $this->error('请选择竞猜');
            if (!$guess_field_id) $this->error('出错了，请稍后再试');
            if (!$guess_question) $this->error('请填写问题');
            //if (!$host_odds) $this->error('请填写主队赔率');
            //if (!$guest_odds) $this->error('请填写客队赔率');

            //如果是让分局或者是大小分局的处理
            $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_id);
            if ($guess_field_info['field_type'] == 1) {
                $lose_type = I('lose_type', 0, 'int');
                $lose_score = I('lose_score', 0.00, 'float');
                if (!$lose_type) $this->error('请填写让分类型');
                if (!$lose_score) $this->error('请填写让分分数');
            
            } else if ($guess_field_info['field_type'] == 2) {
                $lose_score = I('lose_score', 0.00, 'float');
                if (!$lose_score) $this->error('请填写大小分分数');
            }
            //如果是大小分局及让分局，只能添加一个问题
            $guess_field_question_obj  = new GuessFieldQuestionModel(); 
            if ($guess_field_info['field_type'] == 1 || $guess_field_info['field_type'] == 2) 
            {
                $num = $guess_field_question_obj->getGuessFieldQuestionNum('guess_field_id = ' . $guess_field_id);
                if ($num) $this->error('让分局或者大小分局下已有一问题');
            }

            //如果是自定义队伍名
            if ($defind_team_name) {
                if (!$defind_host_name || !$defind_guest_name) $this->error('请填写自定义队伍名');
            }

            $arr = array(
                'guess_field_id'    => $guess_field_id,
                //'guess_question_id' => $guess_question_id,
                'guess_question' => $guess_question,
                //'host_odds'         => $host_odds,
                //'guest_odds'        => $guest_odds,
                'serial'            => $serial,
                'isuse'             => $isuse,
                'guess_id'          => $guess_id,
                'addtime'           => NOW_TIME,
                'defind_team_name'  => $defind_team_name,
                'defind_host_name'  => $defind_host_name,
                'defind_guest_name' => $defind_guest_name
            );

            //让分局或者是大小分局的数据
            if ($guess_field_info['field_type'] == 1) {
                $arr['lose_type'] = $lose_type;
                $arr['lose_score'] = $lose_score;
            } else if ($guess_field_info['field_type'] == 2) {
                $arr['lose_score'] = $lose_score;
            }

            $success = $guess_field_question_obj->addGuessFieldQuestion($arr);

            if ($success) {

                $this->success('恭喜，每局问题添加成功', '/AcpGuessFieldQuestion/list_guess_field_question/guess_field_id/'.$guess_field_id);
            } else {
                $this->error('抱歉，每局问题添加失败，请稍候再试!');
            }
        }

        //问题
        $guess_question_list = M('GuessQuestion')->where('isuse = 1')->order('serial')->select();
        $this->assign('guess_question_list', $guess_question_list);

        //竞猜列表
        $guess_obj = new GuessModel();
        $guess_list = $guess_obj->getGuessList('guess_id, guess_name', 'is_over != 1', 'addtime DESC', 1000);
        $this->assign('guess_list', $guess_list);

		$this->assign('head_title', '添加每局问题');
		$this->display();
	}
	
	/**
     * 修改每局问题信息
     * @author wsq
     * @return void
     */
	public function edit_guess_field_question()
	{
		$id  = $this->_get('guess_field_question_id');
		$act = $this->_post('act');

        $guess_field_question_obj = new GuessFieldQuestionModel($id);
        $info     = $guess_field_question_obj->getGuessFieldQuestionInfo($id);
        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!');

        //局详情
        $field_info = M('GuessField')->where('guess_field_id = ' . $info['guess_field_id'])->find();
        $this->assign('guess_field_info', $field_info);
		
		if($act == 'add')
		{
            //$guess_question_id = I('guess_question_id', 0, 'int');
            $guess_question = I('guess_question', '', 'strip_tags');
            //$host_odds = I('host_odds', 0.0, 'float');
            //$guest_odds = I('guest_odds', 0.0, 'float');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');
            $lose_score = I('lose_score', 0.00, 'float');
            $lose_type  = I('lose_type', 0, 'int');

            $defind_team_name = I('defind_team_name', 0, 'int');
            $defind_host_name = I('defind_host_name', '', 'strip_tags');
            $defind_guest_name = I('defind_guest_name', '', 'strip_tags');

            //校验表单数据
            //if (!$guess_question_id) $this->error('请选择问题');
            if (!$guess_question) $this->error('请填写问题');
            //if (!$host_odds) $this->error('请填写主队赔率');
            //if (!$guest_odds) $this->error('请填写客队赔率');

            //是否大小分局或者是让分局验证
            if ($field_info['field_type'] == 1) {
                if (!$lose_type) $this->error('请填写让分类型');
                if (!$lose_score) $this->error('请填写让分分数');
            
            } else if ($field_info['field_type'] == 2) {
                if (!$lose_score) $this->error('请填写大小分分数');
            }

            //自定义队伍名验证
            if ($info['defind_team_name']) {
                if (!$defind_host_name || !$defind_guest_name) $this->error('请填写自定义队伍名');
            }

            $guess_field_question_obj  = new GuessFieldQuestionModel(); 

            $data_array = array(
                'guess_question' => $guess_question,
                //'guess_question_id' => $guess_question_id,
                //'host_odds'         => $host_odds,
                //'guest_odds'        => $guest_odds,
                'serial'            => $serial,
                'isuse'             => $isuse,
                'lose_score'        => $lose_score,
                'lose_type'        => $lose_type,

                'defind_team_name'  => $defind_team_name,
                'defind_host_name'  => $defind_host_name,
                'defind_guest_name' => $defind_guest_name
            );

            if ($guess_field_question_obj->setGuessFieldQuestion($id, $data_array)){
                $this->success('恭喜，每局问题信息修改成功', '/AcpGuessFieldQuestion/list_guess_field_question/guess_field_id/'. $info['guess_field_id']);
            } else {
                $this->error('抱歉，每局问题信息修改失败，请稍候再试!');
            }
        }


        //两队名称
        $guess_info = D('Guess')->getGuessInfo($info['guess_id']);
        $team_obj = new TeamModel();
        $team_list = array();
        $team_list[0] = $team_obj->getTeamInfo($guess_info['host_team']);
        $team_list[1] = $team_obj->getTeamInfo($guess_info['guest_team']);
        $this->assign('team_list', $team_list);
			
        //问题
        $guess_question_list = M('GuessQuestion')->where('isuse = 1')->order('serial')->select();
        $this->assign('guess_question_list', $guess_question_list);

        $this->assign('guess_field_question_info', $info);
		$this->assign('head_title', '修改每局问题');
		$this->display(APP_PATH . 'Tpl/AcpGuessFieldQuestion/edit_guess_field_question.html');
	}


    public function del_guess_field_question() {
    
		$guess_field_question_id = intval($this->_post('guess_field_question_id'));
		if ($guess_field_question_id) {
            //是否已结束
            $model = new GuessFieldQuestionModel();
            $info = $model->getGuessFieldQuestionInfo($guess_field_question_id);
            if (!$info['is_over'] || $info['result'] == 0) {
                //是否有人投注，有则不能删除，只能退回
                $guess_user_obj = M('GuessUser');
                $num = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id)->count();
                if ($num) exit('have');
            }

			$guess_obj = new GuessFieldQuestionModel($guess_field_question_id);
			$success = $guess_obj->delGuessFieldQuestion();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess_field_question()
    {
        $question_ids = $this->_post('question_guess_field_question_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //判断是否已开始
                $guess_field_id = M('GuessFieldQuestion')->where('guess_field_question_id = ' . $question_id)->getField('guess_field_id');
                $start_time = M('GuessField')->where('guess_field_id = ' . $guess_field_id)->getField('start_time');
                if ($start_time <= NOW_TIME) continue;

                $question_obj = new GuessFieldQuestionModel($question_id);
				$success_num += $question_obj->delGuessFieldQuestion();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }

    /**
     * 查看投注分布
     * wzg
     */
    public function look_odds_detail()
    {
        $guess_field_question_id = I('get.guess_field_question_id', 0, 'int');
        if (!$guess_field_question_id) $this->error('出错了，请稍后再试');

        $guess_user_obj = M('GuessUser');
        //人数及总计金额
        $where = 'guess_field_question_id = ' . $guess_field_question_id;
        $field = 'count(*) AS num, sum(add_money) AS total_money';
        $host_info = $guess_user_obj->field($field)->where($where . ' AND team_type = 1')->find();
        $guest_info = $guess_user_obj->field($field)->where($where . ' AND team_type = 2')->find();

        //找出题目
        $info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);
        if ($info['guess_question']) {
            $info['question_title'] = $info['guess_question'];
        } else {
            $info['question_title'] = M('GuessQuestion')->where('guess_question_id = ' . $info['guess_question_id'])->getField('desc');
        }
        $this->assign('info', $info);

        //两队名称
        $guess_obj = new GuessModel();
        $guess_info = $guess_obj->getGuessInfo($info['guess_id']);
        $guess_info['host_name'] = M('Team')->where('team_id = ' . $guess_info['host_team'])->getField('team_name');
        $guess_info['guest_name'] = M('Team')->where('team_id = ' . $guess_info['guest_team'])->getField('team_name');

        //局情况
        $field_type = M('GuessField')->where('guess_field_id = ' . $info['guess_field_id'])->getField('field_type');
        $this->assign('field_type', $field_type);

        $this->assign('host_info', $host_info);
        $this->assign('guest_info', $guest_info);
        $this->assign('guess_field_question_id', $guess_field_question_id);
        $this->assign('guess_info', $guess_info);
        $this->display();
    }

    /**
     * 设置结果
     * wzg
     * @todo 设置已中奖
     */
    public function set_team()
    {
        $type = I('type', '', 'strip_tags');
        $guess_field_question_id = I('guess_field_question_id', 0, 'int');
        if (!$guess_field_question_id || !$type) exit('failure');

        //检查是否已结束
        $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);
        if ($guess_field_question_info['is_over']) exit('failure');

        //检查是否已开盘
        $guess_field_id = $guess_field_question_info['guess_field_id'];
        $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_id);
        trace($guess_field_info);
        if ($guess_field_info['is_start'] == 1 || $guess_field_info['start_time'] <= NOW_TIME) {
        } else {
            exit('no_start');
        }

        //检查是否是大小分局或让分局下，如果是则去检查是否已设置分数且已结束
        if ($guess_field_info['field_type']) {
            //$guess_info = D('Guess')->getGuessInfo($guess_field_info['guess_id']);
            //if ($guess_info['host_score'] == 0 && $guess_info['guest_score'] == 0) exit('lose_field');
        }

        $result = $type == 'host' ? 1 : 2;
        $arr = array(
            'is_over' => 1,
            'result'  => $result,
            'open_time' => NOW_TIME,
        );

        $success = D('GuessFieldQuestion')->setGuessFieldQuestion($guess_field_question_id, $arr);
        if ($success) {
            //奖金发放流程
            //1,找出投注此结果的用户
            $guess_user_obj = new GuessUserModel();
            $where = 'is_pay = 1 AND guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = ' . $result;
            $win_user_list = $guess_user_obj->where($where)->select();

            if ($win_user_list) {
                //2,找出赔率
                $total_host_money = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = 1')->sum('add_money');
                $total_guest_money = $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id . ' AND team_type = 2')->sum('add_money');
                //重新计算赔率
                $odds_info = $guess_user_obj->cal_odds($total_host_money, $total_guest_money);
                if ($result == 1) {
                    //$odds = D('GuessFieldQuestion')->where('guess_field_question_id = ' . $guess_field_question_id)->getField('host_odds');
                    $odds = $odds_info['host_odds'];
                } else {
                    //$odds = D('GuessFieldQuestion')->where('guess_field_question_id = ' . $guess_field_question_id)->getField('guest_odds');
                    $odds = $odds_info['guest_odds'];
                }

                //3,发放金额
                //两队名称
                $guess_obj = new GuessModel();
                $guess_info = $guess_obj->getGuessInfo($guess_field_question_info['guess_id']);
                $host_name = M('Team')->where('team_id = ' . $guess_info['host_team'])->getField('team_name');
                $guest_name = M('Team')->where('team_id = ' . $guess_info['guest_team'])->getField('team_name');
                $remark = '(' . $host_name . 'VS' . $guest_name . ')';

                $account_obj = new AccountModel();
                foreach ($win_user_list AS $k=>$v) {
                    //计算每个用户的所得金额
                    $gain_money = floatval($v['add_money'] * $odds);
                    //发放金额
                    $account_obj->addAccount($v['user_id'], AccountModel::GUESS_GAIN, $gain_money, $remark, $guess_field_question_id);

                    //4, 设置为已中奖
                    $guess_user_obj->where('guess_user_id = ' . $v['guess_user_id'])
                        ->setField(array(
                            'is_prize' => 1, 
                            'prize_money' => $gain_money, 
                            ));
                }

            }

            //设置共同的开奖时间
            $guess_user_obj->where('guess_field_question_id = ' . $guess_field_question_id)->setField('open_time', NOW_TIME);

            exit('success');
        }

        exit('failure');
    }

    /**
     * 获取问题
     */
    public function ajax_get_guess_field_list()
    {
        $guess_id = I('guess_id', 0, 'int');
        if (!$guess_id) exit(json_encode(array('code' => '400')));

        $guess_field_list = D('GuessField')->getGuessFieldList('guess_field_id, guess_field_name', 'guess_id = ' . $guess_id, 'serial', 1000);

        if ($guess_field_list) exit(json_encode($guess_field_list));

        exit(json_encode(array('code' => '400')));
    }


    /**
     * 全额退款给用户
     * wzg
     */
    public function refund_guess_field_question()
    {
        $guess_field_question_id = I('guess_field_question_id', 0, 'int');
        if (!$guess_field_question_id) exit('failure');

        //检查是否已结束
        $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);
        if ($guess_field_question_info['is_over']) exit('failure');

        //检查是否已开盘
        $guess_field_id = $guess_field_question_info['guess_field_id'];
        $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_id);
        if ($guess_field_info['is_start'] == 1 || $guess_field_info['start_time'] <= NOW_TIME) {
        } else {
            exit('failure');
        }

        $arr = array(
            'is_over' => 1,
            'result'  => -1,
            'open_time' => NOW_TIME,
        );

        $success = D('GuessFieldQuestion')->setGuessFieldQuestion($guess_field_question_id, $arr);
        if ($success) {
            //奖金发放流程
            //1,找出投注此结果的用户
            $guess_user_obj = new GuessUserModel();
            $where = 'is_pay = 1 AND guess_field_question_id = ' . $guess_field_question_id;
            $win_user_list = $guess_user_obj->where($where)->select();

            if ($win_user_list) {

                //两队名称
                $guess_obj = new GuessModel();
                $guess_info = $guess_obj->getGuessInfo($guess_field_question_info['guess_id']);
                $host_name = M('Team')->where('team_id = ' . $guess_info['host_team'])->getField('team_name');
                $guest_name = M('Team')->where('team_id = ' . $guess_info['guest_team'])->getField('team_name');
                $remark = '(' . $host_name . 'VS' . $guest_name . ')';

                $account_obj = new AccountModel();
                foreach ($win_user_list AS $k=>$v) {
                    //计算每个用户的所得金额
                    $gain_money = $v['add_money'];
                    //发放金额
                    $account_obj->addAccount($v['user_id'], AccountModel::GUESS_REFUND, $gain_money, $remark, $guess_field_question_id);

                    // 设置为平局
                    $guess_user_obj->where('guess_user_id = ' . $v['guess_user_id'])
                        ->setField(array(
                            'is_prize' => 0, 
                            'prize_money' => $gain_money, 
                            'open_time' => NOW_TIME));
                }

            }
            exit('success');
        }

        exit('failure');
    }


    //投注人详情
    public function guess_field_question_detail()
    {
        $guess_field_question_id = I('get.guess_field_question_id', 0, 'int');
        if (!$guess_field_question_id) $this->error('出错了，请稍后再试');    

        $where = 'is_pay = 1 AND guess_field_question_id = ' . $guess_field_question_id;
        $id = I('id');
        if ($id) {
            $this->assign('id', $id);
           $user_id = M('Users')->where('id = ' . $id)->getField('user_id'); 
           if ($user_id) {
                $where .= ' AND user_id = ' . $user_id;
           } else {
                $where .= ' AND false';
           }
        }

        $nickname = I('nickname', '', 'strip_tags');
        if ($nickname) {
           $this->assign('nickname', $nickname);
           $user_ids = M('Users')->where('nickname LIKE "%' . $nickname . '%"')->getField('user_id', true); 
           if ($user_ids) {
               $ids = implode(',', $user_ids);
               $where .= ' AND user_id IN (' . $ids . ')';
           } else {
               $where .= ' AND false';
           }
        }

		$guess_user_obj = new GuessUserModel();
		//数据总量
		$total          = $guess_user_obj ->getGuessUserNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_user_obj->setStart($Page->firstRow);
        $guess_user_obj->setLimit($Page->listRows);

        $guess_user_list  = $guess_user_obj ->getGuessUserList('', $where, 'addtime DESC');
        $guess_user_list  = $guess_user_obj ->getListData($guess_user_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        //field_type
        $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);
        $field_type = M('GuessField')->where('guess_field_id = ' . $guess_field_question_info['guess_field_id'])->getField('field_type');
        $this->assign('field_type', $field_type);

        //guess_info
        $guess_info = D('Guess')->getGuessInfo($guess_field_question_info['guess_id']);
        $this->assign('guess_info', $guess_info);

        $this->assign("head_title", "投注详情");
        $this->assign("guess_user_list", $guess_user_list);
		$this->display();
    }



    /**
     * 已结算的金额退回功能
     * wzg
     * todo 1, 找出所此问题下的所有用户
     *      2, 判断是否有获得金额
     *      3, 从冻结金额中扣除所得金额
     *      4, 还原用户的投注记录设置
     *      5, 还原问题的设置
     *      6, 去除明细表中的设置
     */
    public function set_refund_money_back()
    {
        $guess_field_question_id = I('guess_field_question_id', 0, 'int');
        if (!$guess_field_question_id) exit('failure');

        //判断是否在退款时间内
        $guess_field_question_obj = new GuessFieldQuestionModel();
        $guess_field_question_info = $guess_field_question_obj->getGuessFieldQuestionInfo($guess_field_question_id);
        if ($guess_field_question_info['open_time'] + 300 <= NOW_TIME) exit('over');

        //1.--
        $guess_user_obj = new GuessUserModel();
        $where = 'is_pay = 1 AND guess_field_question_id = ' . $guess_field_question_id;
        $guess_user_list = $guess_user_obj->where($where)->select();

        if ($guess_user_list) {
            $account_obj = new AccountModel();
            foreach ($guess_user_list AS $k=>$v) {
                //2.--
                if ($v['prize_money'] > 0.00) {
                    //3.---
                    $success = $account_obj->addAccount($v['user_id'], AccountModel::PAY_MONEY_BACK, $v['prize_money'] * -1, '退回结算金额', $guess_field_question_id);
                    //4.--
                    if ($success >= 0) {
                        $guess_user_obj->where('guess_user_id =' . $v['guess_user_id'])
                            ->setField(array(
                                'is_prize' => 0,
                                'prize_money' => 0.00,
                            ));
                    }
                }
            }

            //5.--
            $arr = array(
                'is_over' => 0,
                'result'  => 0,
                'open_time' => 0,
            );
            $guess_field_question_obj->setGuessFieldQuestion($guess_field_question_id, $arr);

            //6.--
            $where = 'change_type in (' . AccountModel::GUESS_REFUND . ', ' . AccountModel::GUESS_GAIN . ') AND order_id = ' . $guess_field_question_id;
            $account_obj->where($where)
                ->setField('need_opt', 0);

            exit('success');
        }

        exit('failure');
    }



    //获取两队名字
    public function check_field_and_get_team()
    {
        $guess_field_id = I('guess_field_id', 0, 'int');
        if (!$guess_field_id) exit(json_encode(array('code' => '400')));

        $guess_field_info = D('GuessField')->getGuessFieldInfo($guess_field_id);
        if ($guess_field_info && $guess_field_info['field_type'] == 1) {

            $guess_info = D('Guess')->getGuessInfo($guess_field_info['guess_id']);

            $team_obj = new TeamModel();
            $team_list = array();
            $team_list[0] = $team_obj->getTeamInfo($guess_info['host_team']);
            $team_list[1] = $team_obj->getTeamInfo($guess_info['guest_team']);

            if ($team_list) {
                exit(json_encode($team_list));
            }
        } else if ($guess_field_info['field_type'] == 2) {
            exit(json_encode(array('code' => '600')));
        }

        exit(json_encode(array('code' => '400')));
    }
}
?>
