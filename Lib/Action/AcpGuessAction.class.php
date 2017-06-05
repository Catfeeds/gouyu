<?php
/**
 * 竞猜类
 * 
 *
 */
class AcpGuessAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessAction()
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
            $where .= ' AND guess_type_id = ' . $guess_type_id;
        }

        //guess_name
        $guess_name = I('guess_name', '', 'strip_tags');
        $this->assign('guess_name', $guess_name);
        if ($guess_name) {
            $where .= ' AND guess_name LIKE "%' . $guess_name . '%"';
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
     * 竞猜列表
     * @author wsq
     * @return void
     * @todo 
     */
	public function list_guess()
	{
        $where = $this->get_search_condition();

		$guess_obj = new GuessModel();
		//数据总量
		$total          = $guess_obj->getGuessNum($where);

        //echo "<pre>"; die(print_r($guess_list));

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_obj->setStart($Page->firstRow);
        $guess_obj->setLimit($Page->listRows);

        $guess_list  = $guess_obj->getGuessList('', $where, 'is_over, addtime DESC');
        $guess_list  = $guess_obj->getListData($guess_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        //类型列表
        $guess_type_list = M('GuessType')->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);

        $this->assign("head_title", "竞猜列表");
        $this->assign("guess_list", $guess_list);
		$this->display();
	}
	
	/**
     * 添加竞猜
     * @author wsq
     * @return void
     */
	public function add_guess()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $guess_name = I('guess_name', '', 'strip_tags');
            $host_team  = I('host_team', 0, 'int');
            $guest_team = I('guest_team', 0, 'int');
            $start_time = I('start_time');
            $guess_type_id = I('guess_type_id', 0, 'int');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');
            $bo         = I('bo', 0, 'int');

            //校验表单数据
            if (!$guess_name) $this->error('请填写竞猜名称');
            if (!$host_team) $this->error('请选择竞猜主队');
            if (!$guest_team) $this->error('请选择竞猜客队');
            if (!$start_time) $this->error('请选择开始时间');
            //if (!$guess_type_id) $this->error('请选择类型');

            $guess_obj  = new GuessModel(); 

            $success       = $guess_obj->addGuess(
                array(
                    'guess_type_id' => $guess_type_id,
                    'guess_name'    => $guess_name,
                    'host_team'     => $host_team,
                    'guest_team'    => $guest_team,
                    'start_time'    => strtotime($start_time),
                    'serial'        => $serial,
                    'isuse'         => $isuse,
                    'addtime'       => NOW_TIME,
                    'bo'            => $bo,
                )
            );

            if ($success) {
                $this->success('恭喜，竞猜添加成功', '/AcpGuess/list_guess');
            } else {
                $this->error('抱歉，竞猜添加失败，请稍候再试!');
            }
        }

        //队伍列表
        //$team_list = M('Team')->where('isuse = 1')->select();
        //$this->assign('team_list', $team_list);

        //类型列表
        $guess_type_list = M('GuessType')->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);
			
		$this->assign('head_title', '添加竞猜');
		$this->display();
	}
	
	/**
     * 修改竞猜信息
     * @author wsq
     * @return void
     */
	public function edit_guess()
	{
		$id  = $this->_get('guess_id');
		$act = $this->_post('act');

        $guess_obj = new GuessModel($id);
        $info     = $guess_obj->getGuessInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpGuess/list_guess');
		
		if($act == 'add')
		{
            $guess_type_id = I('guess_type_id', 0, 'int');
            $guess_name = I('guess_name', '', 'strip_tags');
            $host_team  = I('host_team', 0, 'int');
            $guest_team = I('guest_team', 0, 'int');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');
            $bo         = I('bo', 0, 'int');

            //校验表单数据
            if (!$guess_name) $this->error('请填写竞猜名称');
            if (!$host_team) $this->error('请选择竞猜主队');
            if (!$guest_team) $this->error('请选择竞猜客队');
            if (!$start_time) $this->error('请选择开始时间');
            //if (!$guess_type_id) $this->error('请选择类型');

            $guess_obj  = new GuessModel(); 

            $data_array = array(
                    'guess_type_id' => $guess_type_id,
                    "guess_name"    => $guess_name,
                    "host_team"     => $host_team,
                    "guest_team"    => $guest_team,
                    "start_time"    => strtotime($start_time),
                    "serial"        => $serial,
                    "isuse"        => $isuse,
                    "bo"        => $bo,
                );

            if ($guess_obj->setGuess($id, $data_array)){
                $this->success('恭喜，竞猜信息修改成功', '/AcpGuess/list_guess');
            } else {
                $this->error('抱歉，竞猜信息修改失败，请稍候再试!');
            }
        }
			
        //队伍列表
        $team_list = M('Team')->where('isuse = 1 AND guess_type_id = ' . $info['guess_type_id'])->select();
        $this->assign('team_list', $team_list);

        //类型列表
        $guess_type_list = M('GuessType')->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);

        $this->assign('guess_info', $info);
		$this->assign('head_title', '修改竞猜');
		$this->display(APP_PATH . 'Tpl/AcpGuess/edit_guess.html');
	}


    public function del_guess() {
    
		$guess_id = intval($this->_post('guess_id'));
		if ($guess_id) {
            //此竞猜下是否还有内容
            $num = M('GuessField')->where('guess_id = ' . $guess_id)->count();
            if ($num) exit('failure');

			$guess_obj = new GuessModel($guess_id);
			$success = $guess_obj->delGuess();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess()
    {
        $question_ids = $this->_post('question_guess_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //此竞猜下是否还有内容
                $num = M('GuessField')->where('guess_id = ' . $question_id)->count();
                if ($num) continue;

                $question_obj = new GuessModel($question_id);
				$success_num += $question_obj->delGuess();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }

    /**
     * 设置比数
     * wzg
     */
    public function set_result()
    {
        $guess_id = I('guess_id', 0, 'int');
        if (!$guess_id) $this->ajaxReturn(array('code' => 0, 'msg' => '出错了'));

        $host_score = I('host_score', 0, 'int');
        $guest_score = I('guest_score', 0, 'int');
        if (!is_numeric($host_score) || !is_numeric($guest_score)) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '请填写分数'));
        }

        $guess_obj = new GuessModel();
        $arr = array(
            'host_score' => $host_score,
            'guest_score' => $guest_score,
        );

        $success = $guess_obj->setGuess($guess_id, $arr);
        $this->ajaxReturn(array('code' => 200, 'msg' => '设置成功'));

    }

    //手动设置结束
    public function set_over()
    {
        $guess_id = I('guess_id', 0, 'int');
        if (!$guess_id) exit('failure');

        $guess_obj = new GuessModel();

        //判断是否已开始
        //$start_time = $guess_obj->where('guess_id = ' . $guess_id)->getField('start_time');
        //if ($start_time > NOW_TIME) $this->ajaxReturn(array('code' => 0, 'msg' => '此竞猜还未开始呢'));

        $arr = array(
            'is_over' => 1,
            'over_time' => NOW_TIME,
        );
        $success = $guess_obj->setGuess($guess_id, $arr);

        if ($success) exit('success');

        exit('failure');
    }

    //手动设置开关盘
    public function set_start_guess()
    {
        $type = I('type', 0, 'int');
        $guess_id = I('guess_id', 0, 'int');
        if (!$type || !$guess_id) exit('failure');

        $guess_obj = new GuessModel();
        $success = $guess_obj->setGuess($guess_id, array('is_start' =>  $type));

        if ($success) exit('success');

        exit('failure');
    }


    //提示信息
    public function add_alert_message()
    {
        $guess_id = I('get.guess_id', 0, 'int');
        if (!$guess_id) $this->error('异常，请稍后');

        $guess_obj = new GuessModel();
        $guess_info = $guess_obj->getGuessInfos('guess_id = ' . $guess_id, 'alert_message');

        $act = I('act', '', 'strip_tags');
        if ($act == 'add') {
            $alert_message = I('alert_message', '', 'strip_tags');
            $guess_obj->where('guess_id = ' . $guess_id)->setField('alert_message', $alert_message);

            $this->success('设置成功');
        }

        $this->assign('alert_message', $guess_info['alert_message']);
        $this->assign('head_title', '添加异常信息');
        $this->display();
    }


    //根据类型取队伍
    //wzg
    public function ajax_get_team_by_type()
    {
        $guess_type_id = I('guess_type_id', 0, 'int');
        if (!$guess_type_id) exit(json_encode(array('code' => '400')));

        $team_list = D('Team')->getTeamList('', 'guess_type_id = ' . $guess_type_id, 'serial', 1000);

        if ($team_list) exit(json_encode($team_list));

        exit(json_encode(array('code' => '400')));
    }

    public function ajax_search_team()
    {
        $guess_type_id = I('guess_type_id', 0, 'int');

        $where = 'isuse = 1';
        $team_name = I('team_name', '', 'strip_tags');

        if ($team_name) $where .= ' AND team_name LIKE "%' . $team_name . '%"';
        if ($guess_type_id) $where .= ' AND guess_type_id = ' . $guess_type_id;

        $team_list = D('Team')->getTeamList('', $where, 'serial', 1000);

        if ($team_list) exit(json_encode($team_list));

        exit(json_encode(array('code' => '400')));
    }
}
?>
