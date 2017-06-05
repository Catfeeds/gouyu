<?php
/**
 * 冠军队伍类
 * 
 *
 */
class AcpGuessChampionTeamAction extends AcpAction {
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessChampionTeamAction()
	{
		parent::_initialize();
	}
	
    private function get_search_condition()
    {
        $where = 'true';

        //team_name
        $team_name = I('team_name', '', 'strip_tags');
        if ($team_name) {
            $this->assign('team_name', $team_name);
            $team_ids = M('Team')->where('team_name LIKE "%' . $team_name . '%"')->getField('team_id', true);
            if ($team_ids) {
                $ids = implode(',', $team_ids);
                $where .= ' AND team_id IN (' . $ids . ')';
            } else {
                $where .= ' AND false';
            }
        }

        //title
        $title = I('title', '', 'strip_tags');
        if ($title) {
            $this->assign('title', $title);
            $guess_champion_ids = M('GuessChampion')->where('title LIKE "%' . $title . '%"')->getField('guess_champion_id', true);
            if ($guess_champion_ids) {
                $ids = implode(',', $guess_champion_ids);
                $where .= ' AND guess_champion_id IN (' . $ids . ')';
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
            $this->assign('start_date', $start_date);
			$where .= ' AND start_time >= ' . $start_date;
		}

		//添加时间范围结束时间
		$end_date = $this->_request('end_date');
		$end_date = str_replace('+', ' ', $end_date);
		$end_date = strtotime($end_date);
		if ($end_date)
		{
            $this->assign('end_date', $end_date);
			$where .= ' AND start_time <= ' . $end_date;
		}

        $guess_champion_id = I('get.guess_champion_id', 0, 'int');
        if ($guess_champion_id) {
            $this->assign('guess_champion_id', $guess_champion_id);
            $where .= ' AND guess_champion_id = ' . $guess_champion_id;
        }


        return $where;
    }

	/**
     * 冠军队伍列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_guess_champion_team()
	{
        $where = $this->get_search_condition();

		$guess_champion_team_obj = new GuessChampionTeamModel();
		//数据总量
		$total          = $guess_champion_team_obj ->getGuessChampionTeamNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_champion_team_obj->setStart($Page->firstRow);
        $guess_champion_team_obj->setLimit($Page->listRows);

        $guess_champion_team_list  = $guess_champion_team_obj ->getGuessChampionTeamList('', $where, 'addtime DESC');
        $guess_champion_team_list  = $guess_champion_team_obj ->getListData($guess_champion_team_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "冠军队伍列表");
        $this->assign("guess_champion_team_list", $guess_champion_team_list);
		$this->display();
	}
	
	/**
     * 添加冠军队伍
     * @author wzg
     * @return void
     */
	public function add_guess_champion_team()
	{
		$act = $this->_post('act');
        $guess_champion_id = I('get.guess_champion_id', 0, 'int');
        if (!$guess_champion_id) $this->error('出错了，请稍后再试');

		if($act == 'add')
		{
            $team_id = I('team_id', 0, 'int');
            $odds    = I('odds', 0, 'float');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$team_id) $this->error('请选择队伍');
            if (!$odds) $this->error('请填写赔率');

            $guess_champion_team_obj  = new GuessChampionTeamModel(); 

            $success       = $guess_champion_team_obj->addGuessChampionTeam(
                array(
                    'team_id'      => $team_id,
                    'odds'         => $odds,
                    'guess_champion_id'  => $guess_champion_id,
                    'serial'       => $serial,
                    'isuse'        => $isuse,
                    'addtime'      => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，冠军队伍添加成功', '/AcpGuessChampionTeam/list_guess_champion_team/guess_champion_id/'.$guess_champion_id);
            } else {
                $this->error('抱歉，冠军队伍添加失败，请稍候再试!');
            }
        }

        //队伍列表
        $team_list = M('Team')->where('isuse = 1')->select();
        $this->assign('team_list', $team_list);

		$this->assign('head_title', '添加冠军队伍');
		$this->display();
	}
	
	/**
     * 修改冠军队伍信息
     * @author wzg
     * @return void
     */
	public function edit_guess_champion_team()
	{
		$id  = $this->_get('guess_champion_team_id');
		$act = $this->_post('act');

        $guess_champion_team_obj = new GuessChampionTeamModel($id);
        $info     = $guess_champion_team_obj->getGuessChampionTeamInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!');
		
		if($act == 'add')
		{
            $team_id = I('team_id', 0, 'int');
            $odds    = I('odds', 0, 'float');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$team_id) $this->error('请选择队伍');
            if (!$odds) $this->error('请填写赔率');

            $guess_champion_team_obj  = new GuessChampionTeamModel(); 

            $data_array = array(
                'team_id'      => $team_id,
                'odds'         => $odds,
                'serial'       => $serial,
                'isuse'        => $isuse,
                'addtime'      => NOW_TIME
            );

            if ($guess_champion_team_obj->setGuessChampionTeam($id, $data_array)){
                $this->success('恭喜，冠军队伍信息修改成功', '/AcpGuessChampionTeam/list_guess_champion_team/guess_champion_id/'. $info['guess_champion_id']);
            } else {
                $this->error('抱歉，冠军队伍信息修改失败，请稍候再试!');
            }
        }

        //队伍列表
        $team_list = M('Team')->where('isuse = 1')->select();
        $this->assign('team_list', $team_list);
			
        $this->assign('guess_champion_team_info', $info);
		$this->assign('head_title', '修改冠军队伍');
		$this->display(APP_PATH . 'Tpl/AcpGuessChampionTeam/edit_guess_champion_team.html');
	}


    public function del_guess_champion_team() {
    
		$guess_champion_team_id = intval($this->_post('guess_champion_team_id'));
		if ($guess_champion_team_id) {

            //判断是否已开始
            $guess_champion_id = M('GuessChampionTeam')->where('guess_champion_team_id = ' . $guess_champion_team_id)->getField('guess_champion_id');
            $start_time = D('GuessChampion')->where('guess_champion_id = ' . $guess_champion_id)->getField('start_time');
            if ($start_time <= NOW_TIME) exit('failure');
            
			$guess_obj = new GuessChampionTeamModel($guess_champion_team_id);
			$success = $guess_obj->delGuessChampionTeam();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess_champion_team()
    {
        $question_ids = $this->_post('question_guess_champion_team_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //判断是否已开始
                $guess_champion_id = M('GuessChampionTeam')->where('guess_champion_team_id = ' . $question_id)->getField('guess_champion_id');
                $start_time = D('GuessChampion')->where('guess_champion_id = ' . $guess_champion_id)->getField('start_time');
                if ($start_time <= NOW_TIME) continue;

                $question_obj = new GuessChampionTeamModel($question_id);
				$success_num += $question_obj->delGuessChampionTeam();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }


    public function ajax_search_team()
    {
        $where = 'isuse = 1';
        $team_name = I('team_name', '', 'strip_tags');

        if ($team_name) $where .= ' AND team_name LIKE "%' . $team_name . '%"';

        $team_list = D('Team')->getTeamList('', $where, 'serial', 1000);

        if ($team_list) exit(json_encode($team_list));

        exit(json_encode(array('code' => '400')));
    }
}
?>
