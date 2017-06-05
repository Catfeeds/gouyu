<?php
/**
 * 夺宝用户列表类
 * 
 *
 */
class AcpTreasureUserAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpTreasureUserAction()
	{
		parent::_initialize();
	}
	
	/**
     * 夺宝用户列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_treasure_user()
	{
        $treasure_id = I('get.treasure_id', 0, 'int');
        if (!$treasure_id) $this->error('出错了，请稍后再试');

        $where = 'treasure_id = ' . $treasure_id;
		$treasure_user_obj = new TreasureUserModel();
		//数据总量
		$total          = $treasure_user_obj->getTreasureUserNum($where);

        //echo "<pre>"; die(print_r($treasure_user_list));

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$treasure_user_obj->setStart($Page->firstRow);
        $treasure_user_obj->setLimit($Page->listRows);

        $treasure_user_list  = $treasure_user_obj->getTreasureUserList('', $where, 'addtime DESC');
        $treasure_user_list  = $treasure_user_obj->getListData($treasure_user_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "夺宝用户列表");
        $this->assign("treasure_user_list", $treasure_user_list);
		$this->display();
	}
	
	/**
     * 添加夺宝用户列表
     * @author wzg
     * @return void
     */
	public function add_treasure_user()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $treasure_user_name = I('treasure_user_name', '', 'strip_tags');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$treasure_user_name) $this->error('请输入夺宝用户列表名称');

            $treasure_user_obj  = new TreasureUserModel(); 

            $success       = $treasure_user_obj->addTreasureUser(
                array(
                    'treasure_user_name'       => $treasure_user_name,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'addtime'     => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，夺宝用户列表添加成功', '/AcpTreasureUser/list_treasure_user');
            } else {
                $this->error('抱歉，夺宝用户列表添加失败，请稍候再试!');
            }
        }
			
		$this->assign('head_title', '添加夺宝用户列表');
		$this->display();
	}
	
	/**
     * 修改夺宝用户列表信息
     * @author wzg
     * @return void
     */
	public function edit_treasure_user()
	{
		$id  = $this->_get('treasure_user_id');
		$act = $this->_post('act');

        $treasure_user_obj = new TreasureUserModel($id);
        $info         = $treasure_user_obj->getTreasureUserInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpTreasureUser/list_treasure_user');
		
		if($act == 'add')
		{
            $treasure_user_name = I('treasure_user_name', '', 'strip_tags');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$treasure_user_name) $this->error('请输入夺宝用户列表名称');

            $treasure_user_obj  = new TreasureUserModel(); 

            $data_array    =  array(
                    'treasure_user_name'       => $treasure_user_name,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                );

            if ($treasure_user_obj->setTreasureUser($id, $data_array)){
                $this->success('恭喜，夺宝用户列表信息修改成功', '/AcpTreasureUser/list_treasure_user');
            } else {
                $this->error('抱歉，夺宝用户列表信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('treasure_user_info', $info);
		$this->assign('head_title', '修改夺宝用户列表');
		$this->display(APP_PATH . 'Tpl/AcpTreasureUser/edit_treasure_user.html');
	}


    public function del_treasure_user() {
    
		$treasure_user_id = intval($this->_post('treasure_user_id'));
		if ($treasure_user_id) {
            //是否已开始
            $start_time = M('TreasureUser')->where('treasure_user_id = ' . $treasure_user_id)->getField('start_time');
            //if ($start_time <= NOW_TIME) exit('failure');

			$treasure_user_obj = new TreasureUserModel($treasure_user_id);
			$success = $treasure_user_obj->delTreasureUser();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_treasure_user()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
            {
                //是否已开始
                $start_time = M('TreasureUser')->where('treasure_user_id = ' . $question_id)->getField('start_time');
                //if ($start_time <= NOW_TIME) continue;

                $question_obj = new TreasureUserModel($question_id);
				$success_num += $question_obj->delTreasureUser();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
}
?>
