<?php
/**
 * 竞猜类型类
 * 
 *
 */
class AcpGuessTypeAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessTypeAction()
	{
		parent::_initialize();
	}
	
	/**
     * 竞猜类型列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_guess_type()
	{

		$guess_type_obj = new GuessTypeModel();
        $where = 'isuse !=2';
		//数据总量
		$total      = $guess_type_obj->getGuessTypeNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_type_obj->setStart($Page->firstRow);
        $guess_type_obj->setLimit($Page->listRows);

        $guess_type_list  = $guess_type_obj->getGuessTypeList();
        $guess_type_list  = $guess_type_obj->getListData($guess_type_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "竞猜类型列表");
        $this->assign("guess_type_list", $guess_type_list);
		$this->display();
	}
	
	/**
     * 添加竞猜类型
     * @author wzg
     * @return void
     */
	public function add_guess_type()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
			$_post         = $this->_post();
			$guess_type_name = $_post['guess_type_name'];
			$desc = $_post['desc'];
			$serial = $_post['serial'];
			$isuse = $_post['isuse'];

            //校验表单数据
            if (!$guess_type_name) $this->error('请输入竞猜类型名称');

            $guess_type_obj  = new GuessTypeModel(); 

            $success       = $guess_type_obj->addGuessType(
                array(
                    "guess_type_name"    => $guess_type_name,
                    "desc"    => $desc,
                    "serial"       => $serial,
                    "isuse"        => $isuse,
                )
            );

            if ($success) {
                $this->success('恭喜，竞猜类型添加成功', '/AcpGuessType/list_guess_type');
            } else {
                $this->error('抱歉，竞猜类型添加失败，请稍候再试!');
            }
        }
			
		$this->assign('head_title', '添加竞猜类型');
		$this->display();
	}
	
	/**
     * 修改竞猜类型信息
     * @author wzg
     * @return void
     */
	public function edit_guess_type()
	{
		$id  = $this->_get('guess_type_id');
		$act = $this->_post('act');

        $guess_type_obj = new GuessTypeModel($id);
        $info         = $guess_type_obj->getGuessTypeInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpGuessType/list_guess_type');
		
		if($act == 'add')
		{
			$_post         = $this->_post();
			$guess_type_name = $_post['guess_type_name'];
			$desc = $_post['desc'];
			$serial = $_post['serial'];
			$isuse = $_post['isuse'];

            //校验表单数据
            if (!$guess_type_name) $this->error('请输入竞猜类型名称');

            $guess_type_obj  = new GuessTypeModel(); 

            $data_array    =  array(
                    "guess_type_name"    => $guess_type_name,
                    "desc"              => $desc,
                    "serial"       => $serial,
                    "isuse"        => $isuse,
                );

            if ($guess_type_obj->setGuessType($id, $data_array)){
                $this->success('恭喜，竞猜类型信息修改成功', '/AcpGuessType/list_guess_type');
            } else {
                $this->error('抱歉，竞猜类型信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('guess_type_info', $info);
		$this->assign('head_title', '修改竞猜类型');
		$this->display(APP_PATH . 'Tpl/AcpGuessType/edit_guess_type.html');
	}


    public function del_guess_type() {
    
		$guess_type_id = intval($this->_post('guess_type_id'));
		if ($guess_type_id) {
			$guess_type_obj = new GuessTypeModel($guess_type_id);

			$success = $guess_type_obj->delGuessType();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess_type()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                $question_obj = new GuessTypeModel($question_id);
				$success_num += $question_obj->delGuessType();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
}
?>
