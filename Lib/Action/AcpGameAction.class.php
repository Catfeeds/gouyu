<?php
/**
 * 游戏类
 * 
 *
 */
class AcpGameAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGameAction()
	{
		parent::_initialize();
	}
	
	/**
     * 游戏列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_game()
	{
        $where = 'isuse != 2';
		$game_obj = new GameModel();
		//数据总量
		$total          = $game_obj->getGameNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$game_obj->setStart($Page->firstRow);
        $game_obj->setLimit($Page->listRows);

        $game_list  = $game_obj->getGameList('', $where, 'addtime DESC');
        $game_list  = $game_obj->getListData($game_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "游戏列表");
        $this->assign("game_list", $game_list);
		$this->display();
	}
	
	/**
     * 添加游戏
     * @author wzg
     * @return void
     */
	public function add_game()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $game_name = I('game_name', '', 'strip_tags');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$game_name) $this->error('请输入游戏名称');

            $game_obj  = new GameModel(); 

            $success       = $game_obj->addGame(
                array(
                    'game_name'       => $game_name,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'addtime'     => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，游戏添加成功', '/AcpGame/list_game');
            } else {
                $this->error('抱歉，游戏添加失败，请稍候再试!');
            }
        }
			
		$this->assign('head_title', '添加游戏');
		$this->display();
	}
	
	/**
     * 修改游戏信息
     * @author wzg
     * @return void
     */
	public function edit_game()
	{
		$id  = $this->_get('game_id');
		$act = $this->_post('act');

        $game_obj = new GameModel($id);
        $info         = $game_obj->getGameInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpGame/list_game');
		
		if($act == 'add')
		{
            $game_name = I('game_name', '', 'strip_tags');
            $serial     = I('serial');
            $isuse      = I('isuse');

            //校验表单数据
            if (!$game_name) $this->error('请输入游戏名称');

            $game_obj  = new GameModel(); 

            $data_array    =  array(
                    'game_name'       => $game_name,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                );

            if ($game_obj->setGame($id, $data_array)){
                $this->success('恭喜，游戏信息修改成功', '/AcpGame/list_game');
            } else {
                $this->error('抱歉，游戏信息修改失败，请稍候再试!');
            }
        }
			
        $this->assign('game_info', $info);
		$this->assign('head_title', '修改游戏');
		$this->display(APP_PATH . 'Tpl/AcpGame/edit_game.html');
	}


    public function del_game() {
    
		$game_id = intval($this->_post('game_id'));
		if ($game_id) {
            //是否已开始
            $start_time = M('Game')->where('game_id = ' . $game_id)->getField('start_time');
            //if ($start_time <= NOW_TIME) exit('failure');

			$game_obj = new GameModel($game_id);
			$success = $game_obj->delGame();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_game()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
            {
                //是否已开始
                $start_time = M('Game')->where('game_id = ' . $question_id)->getField('start_time');
                //if ($start_time <= NOW_TIME) continue;

                $question_obj = new GameModel($question_id);
				$success_num += $question_obj->delGame();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }
	
}
?>
