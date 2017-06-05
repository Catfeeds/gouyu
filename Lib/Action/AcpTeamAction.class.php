<?php
/**
 * 队伍类
 * 
 *
 */
class AcpTeamAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpTeamAction()
	{
		parent::_initialize();
	}
	
	/**
     * 队伍列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_team()
	{
        $where = 'isuse !=2';
        $team_name = I('team_name');
        if ($team_name) {
            $this->assign('team_name', $team_name);
            $where .= ' AND team_name LIKE "%' . $team_name . '%"';   
        }

		$team_obj = new TeamModel();
		//数据总量
		$total      = $team_obj->getTeamNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$team_obj->setStart($Page->firstRow);
        $team_obj->setLimit($Page->listRows);

        $team_list  = $team_obj->getTeamList('', $where, 'isuse DESC, serial');
        $team_list  = $team_obj->getListData($team_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "队伍列表");
        $this->assign("team_list", $team_list);
		$this->display();
	}
	
	/**
     * 添加队伍
     * @author wzg
     * @return void
     */
	public function add_team()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
			$_post         = $this->_post();
			$team_name = $_post['team_name'];
			$team_logo = $_post['team_logo'];
			$team_desc = $_post['team_desc'];
			$serial = $_post['serial'];
			$isuse = $_post['isuse'];
			$guess_type_id = $_post['guess_type_id'];

            //校验表单数据
            if (!$team_name) $this->error('请输入队伍名称');
            if (!$team_logo) $this->error('请上传队伍logo');
            if (!$team_desc) $this->error('请输入队伍描述');

            $team_obj  = new TeamModel(); 

            $success       = $team_obj->addTeam(
                array(
                    "team_name"    => $team_name,
                    "team_logo"    => $team_logo,
                    "team_desc"    => $team_desc,
                    "serial"       => $serial,
                    "isuse"        => $isuse,
                    "guess_type_id"   => $guess_type_id,
                )
            );

            if ($success) {
                $this->success('恭喜，队伍添加成功', '/AcpTeam/list_team');
            } else {
                $this->error('抱歉，队伍添加失败，请稍候再试!');
            }
        }

        //竞猜类型
        $guess_type_obj = new GuessTypeModel();
        $guess_type_list = $guess_type_obj->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);
			
		$this->assign('head_title', '添加队伍');
		$this->display();
	}
	
	/**
     * 修改队伍信息
     * @author wzg
     * @return void
     */
	public function edit_team()
	{
		$id  = $this->_get('team_id');
		$act = $this->_post('act');

        $team_obj = new TeamModel($id);
        $info         = $team_obj->getTeamInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpTeam/list_team');
		
		if($act == 'add')
		{
			$_post         = $this->_post();
			$team_name = $_post['team_name'];
			$team_logo = $_post['team_logo'];
			$team_desc = $_post['team_desc'];
			$serial = $_post['serial'];
			$isuse = $_post['isuse'];
			$guess_type_id = $_post['guess_type_id'];

            //校验表单数据
            if (!$team_name) $this->error('请输入队伍名称');
            if (!$team_logo) $this->error('请上传队伍logo');
            if (!$team_desc) $this->error('请输入队伍描述');

            $team_obj  = new TeamModel(); 

            $data_array    =  array(
                    "team_name"    => $team_name,
                    "team_logo"    => $team_logo,
                    "team_desc"    => $team_desc,
                    "serial"       => $serial,
                    "isuse"        => $isuse,
                    "guess_type_id"   => $guess_type_id,
                );

            if ($team_obj->setTeam($id, $data_array)){
                $this->success('恭喜，队伍信息修改成功', '/AcpTeam/list_team');
            } else {
                $this->error('抱歉，队伍信息修改失败，请稍候再试!');
            }
        }
			
        //竞猜类型
        $guess_type_obj = new GuessTypeModel();
        $guess_type_list = $guess_type_obj->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);

        $this->assign('team_info', $info);
        $this->assign('team_logo_path', APP_PATH .$info['team_logo']);
		$this->assign('head_title', '修改队伍');
		$this->display(APP_PATH . 'Tpl/AcpTeam/edit_team.html');
	}


    public function del_team() {
    
		$team_id = intval($this->_post('team_id'));
		if ($team_id) {
			$team_obj = new TeamModel($team_id);

			$success = $team_obj->delTeam();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_team()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                $question_obj = new TeamModel($question_id);
				$success_num += $question_obj->delTeam();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
}
?>
