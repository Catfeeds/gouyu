<?php
/**
 * Roll活动类
 * 
 *
 */
class AcpRollAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpRollAction()
	{
		parent::_initialize();
	}
	
	/**
     * Roll活动列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_roll()
	{
        $where = 'isuse != 2';
		$roll_obj = new RollModel();
		//数据总量
		$total          = $roll_obj->getRollNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$roll_obj->setStart($Page->firstRow);
        $roll_obj->setLimit($Page->listRows);

        $roll_list  = $roll_obj->getRollList('', $where, 'addtime DESC');
        $roll_list  = $roll_obj->getListData($roll_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "Roll活动列表");
        $this->assign("roll_list", $roll_list);
		$this->display();
	}
	
	/**
     * 添加Roll活动
     * @author wzg
     * @return void
     */
	public function add_roll()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $roll_name  = I('roll_name', '', 'strip_tags');
            $start_time = I('start_time');
            $end_time   = I('end_time');
            //$img_path   = I('img_path');
            $prize_id = I('prize_id', 0, 'int');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$roll_name) $this->error('请输入奖品名称');
            if (!$start_time) $this->error('请输入开始时间');
            if (!$end_time) $this->error('请输入结束时间');
            if (!$prize_id) $this->error('请选择奖品');
            //if (!$img_path || !file_exists(APP_PATH . $img_path)) $this->error('请上传奖品图片');

            $roll_obj  = new RollModel(); 

            $success       = $roll_obj->addRoll(
                array(
                    'roll_name'   => $roll_name,
                    'start_time'  => strtotime($start_time),
                    'end_time'    => strtotime($end_time),
                    'prize_id'    => $prize_id,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'addtime'     => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，Roll活动添加成功', '/AcpRoll/list_roll');
            } else {
                $this->error('抱歉，Roll活动添加失败，请稍候再试!');
            }
        }

        //奖品列表
        $prize_list = M('Prize')->where('isuse = 1')->select();
        $this->assign('prize_list', $prize_list);

		$this->assign('head_title', '添加Roll活动');
		$this->display();
	}
	
	/**
     * 修改Roll活动信息
     * @author wzg
     * @return void
     */
	public function edit_roll()
	{
		$id  = $this->_get('roll_id');
		$act = $this->_post('act');

        $roll_obj = new RollModel($id);
        $info         = $roll_obj->getRollInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpRoll/list_roll');
		
		if($act == 'add')
        { 
            $roll_name  = I('roll_name', '', 'strip_tags');
            $start_time = I('start_time');
            $end_time   = I('end_time');
            //$img_path   = I('img_path');
            $prize_id   = I('prize_id', 0, 'int');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$roll_name) $this->error('请输入奖品名称');
            if (!$start_time) $this->error('请输入开始时间');
            if (!$end_time) $this->error('请输入结束时间');
            if (!$prize_id) $this->error('请选择奖品');
            //if (!$img_path || !file_exists(APP_PATH . $img_path)) $this->error('请上传奖品图片');

            $roll_obj  = new RollModel(); 

            $data_array    =  array(
                'roll_name'    => $roll_name,
                'start_time'  => strtotime($start_time),
                'end_time'    => strtotime($end_time),
                'prize_id'     => $prize_id,
                'serial'      => $serial,
                'isuse'       => $isuse,
            );

            if ($roll_obj->setRoll($id, $data_array)){
                $this->success('恭喜，Roll活动信息修改成功', '/AcpRoll/list_roll');
            } else {
                $this->error('抱歉，Roll活动信息修改失败，请稍候再试!');
            }
        }

        //奖品列表
        $prize_list = M('Prize')->where('isuse = 1')->select();
        $this->assign('prize_list', $prize_list);
			
        $this->assign('roll_info', $info);
        //$this->assign('img_path_path', APP_PATH . $info['img_path']);
		$this->assign('head_title', '修改Roll活动');
		$this->display(APP_PATH . 'Tpl/AcpRoll/edit_roll.html');
	}


    public function del_roll() {
    
		$roll_id = intval($this->_post('roll_id'));
		if ($roll_id) {
            //是否已开始 且 未开奖
            $info = D('Roll')->getRollInfo($roll_id);
            if ($info['start_time'] <= NOW_TIME && $info['is_open'] != 1) exit('failure');

			$roll_obj = new RollModel($roll_id);
			$success = $roll_obj->delRoll();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_roll()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
            {
                //是否已开始
                $start_time = M('Roll')->where('roll_id = ' . $question_id)->getField('start_time');
               // if ($start_time <= NOW_TIME) continue;

                $question_obj = new RollModel($question_id);
				$success_num += $question_obj->delRoll();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
    /**
     * 设置结果
     * @author wzg
     */
    public function open_roll()
    {
        $user_id = intval(session('user_id'));
        $roll_id = I('roll_id', 0, 'int');

        if (!$roll_id) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '出现异常'));
        }

        $roll_obj = new RollModel();
        //如果没有结束则不能设置
        $roll_info = $roll_obj->getRollInfo($roll_id);
        if ($roll_info['end_time'] >= NOW_TIME) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '此Roll未结束，不能设置'));
        }

        //是否已经设置，已设置返回
        if ($roll_info['is_open']) $this->ajaxReturn(array('code' => 0, 'msg' => '您已开过奖了'));

        //找出中奖者信息
        //最大随机号
        $max_id = M('RollUser')->where('roll_id = ' . $roll_id)->max('id');
        trace($max_id);
        $award_user_info = M('RollUser')->where('id = ' . $max_id . ' AND roll_id = ' . $roll_id)->find();
        if (!$award_user_info) $this->ajaxReturn(array('code' => 0, 'msg' => '没有找到对应的中奖者'));

        //记录中奖表
        $award_arr = array(
            'user_id' => $award_user_info['user_id'],
            'roll_user_id' => $award_user_info['roll_user_id'],
            'roll_id' => $roll_id,
            'id'     => $max_id,
            'addtime'     => NOW_TIME,
            'isuse'    => 1,
        );

        //设置结果
        $arr = array(
            'is_open'       => 1,
            'open_user_id'  => $user_id,
            'id'            => $max_id,
            'open_time'     => NOW_TIME,
        );
        $success = $roll_obj->setRoll($roll_id, $arr);

        if ($success) {
            //搜入中奖表
            if (D('RollAward')->addRollAward($award_arr)) {
                $this->ajaxReturn(array('code' => 200, 'msg' => '设置成功'));
            }
        }
        $this->ajaxReturn(array('code' => 0, 'msg' => '设置失败'));
    }
}
?>
