<?php
/**
 * 奖品类
 * 
 *
 */
class AcpPrizeAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpPrizeAction()
	{
		parent::_initialize();
	}
	
	/**
     * 奖品列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_prize()
	{
        $where = 'isuse != 2';
		$prize_obj = new PrizeModel();
		//数据总量
		$total          = $prize_obj->getPrizeNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$prize_obj->setStart($Page->firstRow);
        $prize_obj->setLimit($Page->listRows);

        $prize_list  = $prize_obj->getPrizeList('', $where, 'addtime DESC');
        $prize_list  = $prize_obj->getListData($prize_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "奖品列表");
        $this->assign("prize_list", $prize_list);
		$this->display();
	}
	
	/**
     * 添加奖品
     * @author wzg
     * @return void
     */
	public function add_prize()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $prize_name = I('prize_name', '', 'strip_tags');
            $img_path   = I('img_path');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$prize_name) $this->error('请输入奖品名称');
            if (!$img_path || !file_exists(APP_PATH . $img_path)) $this->error('请上传图片');

            $prize_obj  = new PrizeModel(); 

            $success       = $prize_obj->addPrize(
                array(
                    'prize_name'  => $prize_name,
                    'img_path'    => $img_path,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'addtime'     => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，奖品添加成功', '/AcpPrize/list_prize');
            } else {
                $this->error('抱歉，奖品添加失败，请稍候再试!');
            }
        }
			
		$this->assign('head_title', '添加奖品');
		$this->display();
	}
	
	/**
     * 修改奖品信息
     * @author wzg
     * @return void
     */
	public function edit_prize()
	{
		$id  = $this->_get('prize_id');
		$act = $this->_post('act');

        $prize_obj = new PrizeModel($id);
        $info         = $prize_obj->getPrizeInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpPrize/list_prize');
		
		if($act == 'add')
		{
            $prize_name = I('prize_name', '', 'strip_tags');
            $img_path   = I('img_path');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$prize_name) $this->error('请输入奖品名称');
            if (!$img_path || !file_exists(APP_PATH . $img_path)) $this->error('请上传图片');

            $prize_obj  = new PrizeModel(); 

            $data_array    =  array(
                    'prize_name'       => $prize_name,
                    'img_path'      => $img_path,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                );

            if ($prize_obj->setPrize($id, $data_array)){
                $this->success('恭喜，奖品信息修改成功', '/AcpPrize/list_prize');
            } else {
                $this->error('抱歉，奖品信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('prize_info', $info);
        $this->assign('img_path_path', APP_PATH . $info['img_path']);
		$this->assign('head_title', '修改奖品');
		$this->display(APP_PATH . 'Tpl/AcpPrize/edit_prize.html');
	}


    public function del_prize() {
    
		$prize_id = intval($this->_post('prize_id'));
		if ($prize_id) {
            //检查此奖品是否已被使用
            $num = M('Treasure')->where('prize_id = ' . $prize_id)->count();
            if ($num) exit('failure');

			$prize_obj = new PrizeModel($prize_id);
			$success = $prize_obj->delPrize();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_prize()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
            {
                //检查此奖品是否已被使用
                $num = M('Treasure')->where('prize_id = ' . $question_id)->count();
                if ($num) continue;

                $question_obj = new PrizeModel($question_id);
				$success_num += $question_obj->delPrize();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
}
?>
