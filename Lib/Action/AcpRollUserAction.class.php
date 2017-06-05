<?php
/**
 * Roll用户列表类
 * 
 *
 */
class AcpRollUserAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpRollUserAction()
	{
		parent::_initialize();
	}
	
	/**
     * Roll用户列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_roll_user()
	{
        $roll_id = I('get.roll_id', 0, 'int');
        if (!$roll_id) $this->error('出错了，请稍后再试');

        $where = 'roll_id = ' . $roll_id;
		$roll_user_obj = new RollUserModel();
		//数据总量
		$total          = $roll_user_obj->getRollUserNum($where);

        //echo "<pre>"; die(print_r($roll_user_list));

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$roll_user_obj->setStart($Page->firstRow);
        $roll_user_obj->setLimit($Page->listRows);

        $roll_user_list  = $roll_user_obj->getRollUserList('', $where, 'addtime DESC');
        $roll_user_list  = $roll_user_obj->getListData($roll_user_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "Roll用户列表");
        $this->assign("roll_user_list", $roll_user_list);
		$this->display();
	}
	
	/**
     * 添加Roll用户列表
     * @author wzg
     * @return void
     */
	public function add_roll_user()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $roll_user_name = I('roll_user_name', '', 'strip_tags');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$roll_user_name) $this->error('请输入Roll用户列表名称');

            $roll_user_obj  = new RollUserModel(); 

            $success       = $roll_user_obj->addRollUser(
                array(
                    'roll_user_name'       => $roll_user_name,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'addtime'     => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，Roll用户列表添加成功', '/AcpRollUser/list_roll_user');
            } else {
                $this->error('抱歉，Roll用户列表添加失败，请稍候再试!');
            }
        }
			
		$this->assign('head_title', '添加Roll用户列表');
		$this->display();
	}
	
	/**
     * 修改Roll用户列表信息
     * @author wzg
     * @return void
     */
	public function edit_roll_user()
	{
		$id  = $this->_get('roll_user_id');
		$act = $this->_post('act');

        $roll_user_obj = new RollUserModel($id);
        $info         = $roll_user_obj->getRollUserInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpRollUser/list_roll_user');
		
		if($act == 'add')
		{
            $roll_user_name = I('roll_user_name', '', 'strip_tags');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$roll_user_name) $this->error('请输入Roll用户列表名称');

            $roll_user_obj  = new RollUserModel(); 

            $data_array    =  array(
                    'roll_user_name'       => $roll_user_name,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                );

            if ($roll_user_obj->setRollUser($id, $data_array)){
                $this->success('恭喜，Roll用户列表信息修改成功', '/AcpRollUser/list_roll_user');
            } else {
                $this->error('抱歉，Roll用户列表信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('roll_user_info', $info);
		$this->assign('head_title', '修改Roll用户列表');
		$this->display(APP_PATH . 'Tpl/AcpRollUser/edit_roll_user.html');
	}


    public function del_roll_user() {
    
		$roll_user_id = intval($this->_post('roll_user_id'));
		if ($roll_user_id) {
            //是否已开始
            $start_time = M('RollUser')->where('roll_user_id = ' . $roll_user_id)->getField('start_time');
            //if ($start_time <= NOW_TIME) exit('failure');

			$roll_user_obj = new RollUserModel($roll_user_id);
			$success = $roll_user_obj->delRollUser();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_roll_user()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
            {
                //是否已开始
                $start_time = M('RollUser')->where('roll_user_id = ' . $question_id)->getField('start_time');
                //if ($start_time <= NOW_TIME) continue;

                $question_obj = new RollUserModel($question_id);
				$success_num += $question_obj->delRollUser();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
}
?>
