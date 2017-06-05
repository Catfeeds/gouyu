<?php
/**
 * 竞猜局数类
 * 
 *
 */
class AcpGuessFieldAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessFieldAction()
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

        $guess_field_name = I('guess_field_name', '', 'strip_tags');
        if ($guess_field_name) {
            $this->assign('guess_field_name', $guess_field_name);
            $where .= ' AND guess_field_name LIKE "%' . $guess_field_name . '%"';
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

        $guess_id = I('get.guess_id', 0, 'int');
        //if (!$guess_id) $this->error('出错了，请稍后再试', '/AcpGuess/list_guess');
        if ($guess_id) {
            $this->assign('guess_id', $guess_id);
            $where .= ' AND guess_id = ' . $guess_id;
        }


        return $where;
    }

	/**
     * 竞猜局数列表
     * @author wsq
     * @return void
     * @todo 
     */
	public function list_guess_field()
	{
        $where = $this->get_search_condition();

		$guess_field_obj = new GuessFieldModel();
		//数据总量
		$total          = $guess_field_obj ->getGuessFieldNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_field_obj->setStart($Page->firstRow);
        $guess_field_obj->setLimit($Page->listRows);

        $guess_field_list  = $guess_field_obj ->getGuessFieldList('', $where, 'is_over, addtime DESC');
        $guess_field_list  = $guess_field_obj ->getListData($guess_field_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        //类型列表
        $guess_type_list = M('GuessType')->where('isuse = 1')->select();
        $this->assign('guess_type_list', $guess_type_list);

        $this->assign("head_title", "竞猜局数列表");
        $this->assign("guess_field_list", $guess_field_list);
		$this->display();
	}
	
	/**
     * 添加竞猜局数
     * @author wsq
     * @return void
     */
	public function add_guess_field()
	{
		$act = $this->_post('act');

        //$guess_id = I('guess_id', 0, 'int');
        //$this->assign('guess_id', $guess_id);

		if($act == 'add')
		{
            $guess_field_name = I('guess_field_name', '', 'strip_tags');
            $guess_id   = I('guess_id', 0, 'int');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');
            $is_first   = I('is_first', 0, 'int');
            $field_type = I('field_type', 0, 'int');

            //校验表单数据
            if (!$guess_field_name) $this->error('请填写局名称');
            if (!$start_time) $this->error('请选择开始时间');
            if (!$guess_id) $this->error('请选择所属竞猜');

            $guess_field_obj  = new GuessFieldModel(); 

            $success       = $guess_field_obj->addGuessField(
                array(
                    "guess_field_name"    => $guess_field_name,
                    "start_time"    => strtotime($start_time),
                    "serial"        => $serial,
                    "isuse"        => $isuse,
                    'guess_id'     => $guess_id,
                    'addtime'      => NOW_TIME,
                    'is_first'     => $is_first,
                    'field_type'    => $field_type,
                )
            );

            if ($success) {
                if ($is_first) {
                    //如果是第一局，则去更新guess表中的第一局时间
                    $guess_obj = new GuessModel();
                    $guess_obj->where('guess_id = ' . $guess_id)->setField('first_field_time', strtotime($start_time));

                    //去除其他局中的第一局设置
                    $guess_field_obj->where('guess_id = ' . $guess_id . ' AND guess_field_id != ' . $success)->setField('is_first', 0);
                }

                $this->success('恭喜，竞猜局数添加成功', '/AcpGuessField/list_guess_field/guess_id/'.$guess_id);
            } else {
                $this->error('抱歉，竞猜局数添加失败，请稍候再试!');
            }
        }

        //竞猜列表
        $guess_obj = new GuessModel();
        $guess_list = $guess_obj->getGuessList('guess_id, guess_name', 'is_over != 1', 'addtime DESC', 1000);
        $this->assign('guess_list', $guess_list);

		$this->assign('head_title', '添加竞猜局数');
		$this->display();
	}
	
	/**
     * 修改竞猜局数信息
     * @author wsq
     * @return void
     */
	public function edit_guess_field()
	{
		$id  = $this->_get('guess_field_id');
		$act = $this->_post('act');

        $guess_field_obj = new GuessFieldModel($id);
        $info     = $guess_field_obj->getGuessFieldInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!');
		
		if($act == 'add')
		{
            $guess_field_name = I('guess_field_name', '', 'strip_tags');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$guess_field_name) $this->error('请填写局名称');
            if (!$start_time) $this->error('请选择开始时间');
            $start_time = strtotime($start_time);

            $guess_field_obj  = new GuessFieldModel(); 

            $data_array = array(
                "guess_field_name"    => $guess_field_name,
                "start_time"    => $start_time,
                "serial"        => $serial,
                "isuse"        => $isuse,
            );

            if ($guess_field_obj->setGuessField($id, $data_array)){
                //是否修改了时间，如果修改了且这个局是第一局则更新竞猜中的时间
                if ($start_time != $info['start_time'] && $info['is_first'] == 1) {
                    M('Guess')->where('guess_id = ' . $info['guess_id'])->setField('first_field_time', $start_time);
                }

                $this->success('恭喜，竞猜局数信息修改成功', '/AcpGuessField/list_guess_field/guess_id/'. $info['guess_id']);
            } else {
                $this->error('抱歉，竞猜局数信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('guess_field_info', $info);
		$this->assign('head_title', '修改竞猜局数');
		$this->display(APP_PATH . 'Tpl/AcpGuessField/edit_guess_field.html');
	}


    public function del_guess_field() {
    
		$guess_field_id = intval($this->_post('guess_field_id'));
		if ($guess_field_id) {
            //判断是否有二级内容
            $num = D('GuessFieldQuestion')->getGuessFieldQuestionNum('guess_field_id = ' . $guess_field_id);
            if ($num) exit('failure');

            //判断是否已开始
            $start_time = D('GuessField')->where('guess_field_id = ' . $guess_field_id)->getField('start_time');
            if ($start_time <= NOW_TIME) exit('failure');
            
			$guess_obj = new GuessFieldModel($guess_field_id);
			$success = $guess_obj->delGuessField();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess_field()
    {
        $question_ids = $this->_post('question_guess_field_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //判断是否有二级内容
                $num = D('GuessFieldQuestion')->getGuessFieldQuestionNum('guess_field_id = ' . $question_id);
                if ($num) continue;

                //判断是否已开始
                $start_time = D('GuessField')->where('guess_field_id = ' . $question_id)->getField('start_time');
                if ($start_time <= NOW_TIME) continue;

                $question_obj = new GuessFieldModel($question_id);
				$success_num += $question_obj->delGuessField();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }

    //手动设置开关盘
    public function set_start_guess_field()
    {
        $type = I('type', 0, 'int');
        $guess_field_id = I('guess_field_id', 0, 'int');
        if (!$type || !$guess_field_id) exit('failure');

        $guess_field_obj = new GuessFieldModel();
        $success = $guess_field_obj->setGuessField($guess_field_id, array('is_start' =>  $type));

        if ($success) exit('success');

        exit('failure');
    }


    //手动设置结束
    public function set_over()
    {
        $guess_field_id = I('guess_field_id', 0, 'int');
        if (!$guess_field_id) exit('failure');

        $guess_field_obj = new GuessFieldModel();
        $success = $guess_field_obj->setGuessField($guess_field_id, array('is_over' => 1));

        if ($success) exit('success');

        exit('failure');
    }

    //手动设置第一局
    public function set_first_field()
    {
        $guess_field_id = I('guess_field_id', 0, 'int');
        if (!$guess_field_id) exit('failure');

        $guess_field_obj = new GuessFieldModel();
        $success = $guess_field_obj->setGuessField($guess_field_id, array('is_first' => 1));

        if ($success) {
            //刷新guess表
            $guess_field_info = $guess_field_obj->getGuessFieldInfo($guess_field_id);
            M('Guess')->where('guess_id = ' . $guess_field_info['guess_id'])->setField('first_field_time', $guess_field_info['start_time']);

            //刷新guess_field
            $guess_field_obj->where('guess_id = ' . $guess_field_info['guess_id'] . ' AND guess_field_id != ' . $guess_field_id)->setField('is_first', 0);
        }

        if ($success) exit('success');

        exit('failure');
    }

    /**
     * 全额退款给用户
     * wzg
     */
    public function refund_guess_field()
    {
        $guess_field_id = I('guess_field_id', 0, 'int');
        if (!$guess_field_id) exit('failure');

        //所在局下面的问题
        $guess_field_question_list = D('GuessFieldQuestion')->getGuessFieldQuestionList('', 'is_over != 1 AND guess_field_id = ' . $guess_field_id, '', 1000);

        if ($guess_field_question_list) {
            foreach ($guess_field_question_list AS $k=>$v) {

                $arr = array(
                    'is_over' => 1,
                    'result'  => -1,
                    'open_time' => NOW_TIME
                );

                $guess_field_question_id = $v['guess_field_question_id'];
                $success = D('GuessFieldQuestion')->setGuessFieldQuestion($guess_field_question_id, $arr);
                if ($success) {
                    $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($guess_field_question_id);

                    //奖金发放流程
                    //找出投注此结果的用户
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
                }
            }
        }

        //设置结束
        $guess_field_obj = new GuessFieldModel();
        $success1 = $guess_field_obj->setGuessField($guess_field_id, array('is_over' => 1));

        exit('success');
    }

}
?>
