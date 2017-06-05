<?php
/**
 * 中奖类
 * 
 *
 */
class AcpRollAwardAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpRollAwardAction()
	{
		parent::_initialize();
	}

    private function get_search_condition()
    {
        //$where = 'true';

        //roll_award_name
        $roll_award_name = I('roll_award_name', '', 'strip_tags');
        $this->assign('roll_award_name', $roll_award_name);
        if ($roll_award_name) {
            $where .= ' AND roll_award_name LIKE "%' . $roll_award_name . '%"';
        }

        //host_team
        $host_team_name = I('host_team_name', '', 'strip_tags');
        $this->assign('host_team_name', $host_team_name);
        if ($host_team_name) {
            $host_team_ids = M('Team')->where('team_name LIKE "%' . $host_team_name . '%"')->getField('team_id', true);
            if ($host_team_ids) {
                $team_ids = implode(',', $host_team_ids);
                $where .= ' AND host_team IN (' . $team_ids . ')';
            } else {
                $where .= ' AND false';
            }
        }

        //guest_team
        $guest_team_name = I('guest_team_name', '', 'strip_tags');
        $this->assign('guest_team_name', $guest_team_name);
        if ($guest_team_name) {
            $guest_team_ids = M('Team')->where('team_name LIKE "%' . $guest_team_name . '%"')->getField('team_id', true);
            if ($guest_team_ids) {
                $team_ids = implode(',', $guest_team_ids);
                $where .= ' AND guest_team IN (' . $team_ids . ')';
            } else {
                $where .= ' AND false';
            }
        }

		//添加时间范围起始时间
		$start_date = $this->_request('start_date');
		$start_date = str_replace('+', ' ', $start_date);
		$start_date = strtotime($start_date);
		if ($start_date)
		{
			$where .= ' AND start_time >= ' . $start_date;
		}

		//添加时间范围结束时间
		$end_date = $this->_request('end_date');
		$end_date = str_replace('+', ' ', $end_date);
		$end_date = strtotime($end_date);
		if ($end_date)
		{
			$where .= ' AND start_time <= ' . $end_date;
		}

        return $where;
    }
	
	/**
     * 中奖列表
     * @author wsq
     * @return void
     * @todo 
     */
	public function roll_award($where, $head_title, $opt)
	{
        $where .= $this->get_search_condition();
        $roll_id = I('get.roll_id', 0, 'int');
        if ($roll_id) {
            $where .= ' AND roll_id = ' . $roll_id;
        }

		$roll_award_obj = new RollAwardModel();
		//数据总量
		$total          = $roll_award_obj->getRollAwardNum($where);

        //echo "<pre>"; die(print_r($roll_award_list));

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$roll_award_obj->setStart($Page->firstRow);
        $roll_award_obj->setLimit($Page->listRows);

        $roll_award_list  = $roll_award_obj->getRollAwardList('', $where);
        $roll_award_list  = $roll_award_obj->getListData($roll_award_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", $head_title);
        $this->assign("roll_award_list", $roll_award_list);
		$this->display(APP_PATH . 'Tpl/AcpRollAward/list_roll_award.html');
	}

	public function list_roll_award()
    {
        $this->roll_award('is_deliver = 0', '已中奖/待发货列表', 'DELIVER');
    }
    //已发货订单
    public function delivered_roll_award()
    {
        $this->roll_award('is_deliver = 1', '已发货列表', 'DELIVERED');
    }
	
	/**
     * 添加中奖
     * @author wsq
     * @return void
     */
	public function add_roll_award()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $roll_award_name = I('roll_award_name', '', 'strip_tags');
            $host_team  = I('host_team', 0, 'int');
            $guest_team = I('guest_team', 0, 'int');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$roll_award_name) $this->error('请填写中奖名称');
            if (!$host_team) $this->error('请选择中奖主队');
            if (!$guest_team) $this->error('请选择中奖客队');
            if (!$start_time) $this->error('请选择开始时间');

            $roll_award_obj  = new RollAwardModel(); 

            $success       = $roll_award_obj->addRollAward(
                array(
                    'roll_award_name'    => $roll_award_name,
                    'host_team'     => $host_team,
                    'guest_team'    => $guest_team,
                    'start_time'    => strtotime($start_time),
                    'serial'        => $serial,
                    'isuse'        => $isuse,
                    'add_time'     => NOW_TIME,
                )
            );

            if ($success) {
                $this->success('恭喜，中奖添加成功', '/AcpRollAward/list_roll_award');
            } else {
                $this->error('抱歉，中奖添加失败，请稍候再试!');
            }
        }

        //队伍列表
        $team_list = M('Team')->where('isuse = 1')->select();
        $this->assign('team_list', $team_list);
			
		$this->assign('head_title', '添加中奖');
		$this->display();
	}
	
	/**
     * 修改中奖信息
     * @author wsq
     * @return void
     */
	public function edit_roll_award()
	{
		$id  = $this->_get('roll_award_id');
		$act = $this->_post('act');

        $roll_award_obj = new RollAwardModel($id);
        $info     = $roll_award_obj->getRollAwardInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpRollAward/list_roll_award');
		
		if($act == 'add')
		{
            $roll_award_name = I('roll_award_name', '', 'strip_tags');
            $host_team  = I('host_team', 0, 'int');
            $guest_team = I('guest_team', 0, 'int');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$roll_award_name) $this->error('请填写中奖名称');
            if (!$host_team) $this->error('请选择中奖主队');
            if (!$guest_team) $this->error('请选择中奖客队');
            if (!$start_time) $this->error('请选择开始时间');

            $roll_award_obj  = new RollAwardModel(); 

            $data_array = array(
                    "roll_award_name"    => $roll_award_name,
                    "host_team"     => $host_team,
                    "guest_team"    => $guest_team,
                    "start_time"    => strtotime($start_time),
                    "serial"        => $serial,
                    "isuse"        => $isuse,
                );

            if ($roll_award_obj->setRollAward($id, $data_array)){
                $this->success('恭喜，中奖信息修改成功', '/AcpRollAward/list_roll_award');
            } else {
                $this->error('抱歉，中奖信息修改失败，请稍候再试!');
            }
        }
			
        //队伍列表
        $team_list = M('Team')->where('isuse = 1')->select();
        $this->assign('team_list', $team_list);

        $this->assign('roll_award_info', $info);
		$this->assign('head_title', '修改中奖');
		$this->display(APP_PATH . 'Tpl/AcpRollAward/edit_roll_award.html');
	}


    public function del_roll_award() {
    
		$roll_award_id = intval($this->_post('roll_award_id'));
		if ($roll_award_id) {
            //此中奖下是否还有内容
            $num = M('RollAwardField')->where('roll_award_id = ' . $roll_award_id)->count();
            if ($num) exit('failure');

			$roll_award_obj = new RollAwardModel($roll_award_id);
			$success = $roll_award_obj->delRollAward();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_roll_award()
    {
        $question_ids = $this->_post('question_roll_award_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //此中奖下是否还有内容
                $num = M('RollAwardField')->where('roll_award_id = ' . $question_id)->count();
                if ($num) continue;

                $question_obj = new RollAwardModel($question_id);
				$success_num += $question_obj->delRollAward();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }

    /**
     * 中奖信息详情
     * wzg
     */
    public function roll_award_detail()
    {
        $roll_award_id = I('get.roll_award_id', 0, 'int');
        //if (!$roll_award_id) $this->error('出错了，请稍后再试');

        $roll_award_obj = new RollAwardModel();
        $info = $roll_award_obj->getRollAwardInfo($roll_award_id);
        //if (!$info) $this->error('出错了，请稍后再试');

        //用户信息
        $user_obj = new UserModel($info['user_id']);
        $user_info = $user_obj->getUserInfo('user_id, headimgurl, nickname, realname');

        //roll信息
        $roll_obj = new RollModel();
        $roll_info = $roll_obj->getRollInfo($info['roll_id']);

        //游戏及账号
        $roll_user_info = D('RollUser')->getRollUserInfo($info['roll_user_id']);
        $roll_user_info['game_name'] = M('Game')->where('game_id = ' . $roll_user_info['game_id'])->getField('game_name');

        $this->assign('info', $info);
        $this->assign('user_info', $user_info);
        $this->assign('roll_info', $roll_info);
        $this->assign('roll_user_info', $roll_user_info);
        $this->display();
    }

    //设置发货
    public function deliver_roll() {
    
		$roll_award_id = intval($this->_post('roll_award_id'));
		if ($roll_award_id) {
			$roll_award_obj = new RollAwardModel($roll_award_id);
			$success = $roll_award_obj->where('roll_award_id = ' . $roll_award_id)->setField('is_deliver', 1);
            //发货成功后的提醒
            if ($success) {

                $info = $roll_award_obj->where('roll_award_id = ' . $roll_award_id)->find();
                $prize_id = M('Roll')->where('roll_id = ' . $info['roll_id'])->getField('prize_id');
                $prize_name = M('Prize')->where('prize_id = ' . $prize_id)->getField('prize_name');

                //推送消息给用户
                $msg = array(
                    'first'		=> '尊敬的用户，您的商品发货啦！',
                    'keyword1'	=> 'Roll活动奖品',
                    'keyword2'	=> $info['id'],
                    'keyword3'	=> $prize_name,
                    'url'		=> 'http://' . $_SERVER['HTTP_HOST'] . '/FrontUser/my_roll.html',
                );
                PushModel::wxPush($info['user_id'], 'deliver', $msg);
            }
            exit($success ? 'success' : 'failure');
        }

		exit('failure');
    }
}
?>
