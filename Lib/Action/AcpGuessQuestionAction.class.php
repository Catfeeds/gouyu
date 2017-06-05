<?php
/**
 * 问题类
 * 
 *
 */
class AcpGuessQuestionAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessQuestionAction()
	{
		parent::_initialize();
	}
	
    private function get_search_condition()
    {
        $where = 'true';

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

        $guess_question_name = I('guess_question_name', '', 'strip_tags');
        if ($guess_question_name) {
            $this->assign('guess_question_name', $guess_question_name);
            $where .= ' AND guess_question_name LIKE "%' . $guess_question_name . '%"';
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

        $guess_field_id = I('get.guess_field_id', 0, 'int');
        //if (!$guess_id) $this->error('出错了，请稍后再试', '/AcpGuess/list_guess');
        if ($guess_field_id) {
            $this->assign('guess_field_id', $guess_field_id);
            $where .= ' AND guess_field_id = ' . $guess_field_id;
        }


        return $where;
    }

	/**
     * 问题列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_guess_question()
	{
        $where = $this->get_search_condition();

		$guess_question_obj = new GuessQuestionModel();
		//数据总量
		$total          = $guess_question_obj ->getGuessQuestionNum();

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_question_obj->setStart($Page->firstRow);
        $guess_question_obj->setLimit($Page->listRows);

        $guess_question_list  = $guess_question_obj ->getGuessQuestionList();
        $guess_question_list  = $guess_question_obj ->getListData($guess_question_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "问题列表");
        $this->assign("guess_question_list", $guess_question_list);
		$this->display();
	}
	
	/**
     * 添加问题
     * @author wzg
     * @return void
     */
	public function add_guess_question()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $desc = I('desc', '', 'strip_tags');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$desc) $this->error('请填写标题');

            $guess_question_obj  = new GuessQuestionModel(); 

            $success       = $guess_question_obj->addGuessQuestion(
                array(
                    'desc'        => $desc,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                )
            );

            if ($success) {
                $this->success('恭喜，问题添加成功', '/AcpGuessQuestion/list_guess_question');
            } else {
                $this->error('抱歉，问题添加失败，请稍候再试!');
            }
        }

		$this->assign('head_title', '添加问题');
		$this->display();
	}
	
	/**
     * 修改问题信息
     * @author wzg
     * @return void
     */
	public function edit_guess_question()
	{
		$id  = $this->_get('guess_question_id');
		$act = $this->_post('act');

        $guess_question_obj = new GuessQuestionModel($id);
        $info     = $guess_question_obj->getGuessQuestionInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!');
		
		if($act == 'add')
		{
            $desc = I('desc', '', 'strip_tags');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$desc) $this->error('请填写标题');

            $guess_question_obj  = new GuessQuestionModel(); 

            $data_array = array(
                "desc"    => $desc,
                "serial"        => $serial,
                "isuse"        => $isuse,
            );

            if ($guess_question_obj->setGuessQuestion($id, $data_array)){
                $this->success('恭喜，问题信息修改成功', '/AcpGuessQuestion/list_guess_question');
            } else {
                $this->error('抱歉，问题信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('guess_question_info', $info);
		$this->assign('head_title', '修改问题');
		$this->display(APP_PATH . 'Tpl/AcpGuessQuestion/edit_guess_question.html');
	}


    public function del_guess_question() {
    
		$guess_question_id = intval($this->_post('guess_question_id'));
		if ($guess_question_id) {
			$guess_obj = new GuessQuestionModel($guess_question_id);

			$success = $guess_obj->delGuessQuestion();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess_question()
    {
        $question_ids = $this->_post('question_guess_question_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                $question_obj = new GuessQuestionModel($question_id);
				$success_num += $question_obj->delGuessQuestion();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
}
?>
