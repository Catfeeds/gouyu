<?php
/**
 * 中奖类
 * 
 *
 */
class AcpDrawPrizeAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpDrawPrizeAction()
	{
		parent::_initialize();
	}

    private function get_search_condition()
    {
        //$where = 'true';

        //draw_prize_name
        $draw_prize_name = I('draw_prize_name', '', 'strip_tags');
        $this->assign('draw_prize_name', $draw_prize_name);
        if ($draw_prize_name) {
            $where .= ' AND draw_prize_name LIKE "%' . $draw_prize_name . '%"';
        }

        //host_team
        $host_team_name = I('host_team_name', '', 'strip_tags');
        $this->assign('host_team_name', $host_team_name);
        if ($host_team_name) {
            $host_team_ids = M('Team')->where('team_name LIKE "%' . $host_team_name . '%"')->getField('team_id', true);
            if ($host_team_ids) {
                $team_ids = implode(',', $host_team_ids);
                $where .= ' AND host_team IN (' . $team_ids . ')';
            } else {
                $where .= ' AND false';
            }
        }

        //guest_team
        $guest_team_name = I('guest_team_name', '', 'strip_tags');
        $this->assign('guest_team_name', $guest_team_name);
        if ($guest_team_name) {
            $guest_team_ids = M('Team')->where('team_name LIKE "%' . $guest_team_name . '%"')->getField('team_id', true);
            if ($guest_team_ids) {
                $team_ids = implode(',', $guest_team_ids);
                $where .= ' AND guest_team IN (' . $team_ids . ')';
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
			$where .= ' AND start_time >= ' . $start_date;
		}

		//添加时间范围结束时间
		$end_date = $this->_request('end_date');
		$end_date = str_replace('+', ' ', $end_date);
		$end_date = strtotime($end_date);
		if ($end_date)
		{
			$where .= ' AND start_time <= ' . $end_date;
		}

        return $where;
    }
	
	/**
     * 中奖列表
     * @author wsq
     * @return void
     * @todo 
     */
	public function draw_prize($where, $head_title, $opt)
	{
        $where .= $this->get_search_condition();
        $where .= ' AND isuse != 2';
        $treasure_id = I('get.treasure_id', 0, 'int');
        if ($treasure_id) {
            $where .= ' AND treasure_id = ' . $treasure_id;
        }

		$draw_prize_obj = new DrawPrizeModel();
		//数据总量
		$total          = $draw_prize_obj->getDrawPrizeNum($where);

        //echo "<pre>"; die(print_r($draw_prize_list));

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$draw_prize_obj->setStart($Page->firstRow);
        $draw_prize_obj->setLimit($Page->listRows);

        $draw_prize_list  = $draw_prize_obj->getDrawPrizeList('', $where, 'deliver_time DESC, addtime DESC');
        $draw_prize_list  = $draw_prize_obj->getListData($draw_prize_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", $head_title);
        $this->assign("draw_prize_list", $draw_prize_list);
		$this->display(APP_PATH . 'Tpl/AcpDrawPrize/list_draw_prize.html');
	}
	public function list_draw_prize()
    {
        $this->draw_prize('is_deliver = 0', '已中奖/待发货列表', 'DELIVER');
    }
    //已发货订单
    public function delivered_draw_prize()
    {
        $this->draw_prize('is_deliver = 1', '已发货列表', 'DELIVERED');
    }
	
	/**
     * 添加中奖
     * @author wsq
     * @return void
     */
	public function add_draw_prize()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $draw_prize_name = I('draw_prize_name', '', 'strip_tags');
            $host_team  = I('host_team', 0, 'int');
            $guest_team = I('guest_team', 0, 'int');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$draw_prize_name) $this->error('请填写中奖名称');
            if (!$host_team) $this->error('请选择中奖主队');
            if (!$guest_team) $this->error('请选择中奖客队');
            if (!$start_time) $this->error('请选择开始时间');

            $draw_prize_obj  = new DrawPrizeModel(); 

            $success       = $draw_prize_obj->addDrawPrize(
                array(
                    'draw_prize_name'    => $draw_prize_name,
                    'host_team'     => $host_team,
                    'guest_team'    => $guest_team,
                    'start_time'    => strtotime($start_time),
                    'serial'        => $serial,
                    'isuse'        => $isuse,
                    'add_time'     => NOW_TIME,
                )
            );

            if ($success) {
                $this->success('恭喜，中奖添加成功', '/AcpDrawPrize/list_draw_prize');
            } else {
                $this->error('抱歉，中奖添加失败，请稍候再试!');
            }
        }

        //队伍列表
        $team_list = M('Team')->where('isuse = 1')->select();
        $this->assign('team_list', $team_list);
			
		$this->assign('head_title', '添加中奖');
		$this->display();
	}
	
	/**
     * 修改中奖信息
     * @author wsq
     * @return void
     */
	public function edit_draw_prize()
	{
		$id  = $this->_get('draw_prize_id');
		$act = $this->_post('act');

        $draw_prize_obj = new DrawPrizeModel($id);
        $info     = $draw_prize_obj->getDrawPrizeInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpDrawPrize/list_draw_prize');
		
		if($act == 'add')
		{
            $draw_prize_name = I('draw_prize_name', '', 'strip_tags');
            $host_team  = I('host_team', 0, 'int');
            $guest_team = I('guest_team', 0, 'int');
            $start_time = I('start_time');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$draw_prize_name) $this->error('请填写中奖名称');
            if (!$host_team) $this->error('请选择中奖主队');
            if (!$guest_team) $this->error('请选择中奖客队');
            if (!$start_time) $this->error('请选择开始时间');

            $draw_prize_obj  = new DrawPrizeModel(); 

            $data_array = array(
                    "draw_prize_name"    => $draw_prize_name,
                    "host_team"     => $host_team,
                    "guest_team"    => $guest_team,
                    "start_time"    => strtotime($start_time),
                    "serial"        => $serial,
                    "isuse"        => $isuse,
                );

            if ($draw_prize_obj->setDrawPrize($id, $data_array)){
                $this->success('恭喜，中奖信息修改成功', '/AcpDrawPrize/list_draw_prize');
            } else {
                $this->error('抱歉，中奖信息修改失败，请稍候再试!');
            }
        }
			
        //队伍列表
        $team_list = M('Team')->where('isuse = 1')->select();
        $this->assign('team_list', $team_list);

        $this->assign('draw_prize_info', $info);
		$this->assign('head_title', '修改中奖');
		$this->display(APP_PATH . 'Tpl/AcpDrawPrize/edit_draw_prize.html');
	}


    public function del_draw_prize() {
    
		$draw_prize_id = intval($this->_post('draw_prize_id'));
		if ($draw_prize_id) {
			$draw_prize_obj = new DrawPrizeModel($draw_prize_id);
			$success = $draw_prize_obj->delDrawPrize();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_draw_prize()
    {
        $question_ids = $this->_post('question_draw_prize_ids');

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //此中奖下是否还有内容
                $num = M('DrawPrizeField')->where('draw_prize_id = ' . $question_id)->count();
                if ($num) continue;

                $question_obj = new DrawPrizeModel($question_id);
				$success_num += $question_obj->delDrawPrize();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }

    /**
     * 中奖信息详情
     * wzg
     */
    public function draw_prize_detail()
    {
        $draw_prize_id = I('get.draw_prize_id', 0, 'int');
        //if (!$draw_prize_id) $this->error('出错了，请稍后再试');

        $draw_prize_obj = new DrawPrizeModel();
        $info = $draw_prize_obj->getDrawPrizeInfo($draw_prize_id);
        //if (!$info) $this->error('出错了，请稍后再试');

        //用户信息
        $user_obj = new UserModel($info['user_id']);
        $user_info = $user_obj->getUserInfo('user_id, headimgurl, nickname, realname');

        //夺宝信息
        $treasure_obj = new TreasureModel();
        $treasure_info = $treasure_obj->getTreasureInfo($info['treasure_id']);
        $prize_info = D('Prize')->getPrizeInfo($treasure_info['prize_id']);
        $treasure_info['prize_name'] = $prize_info['prize_name'];
        $treasure_info['img_path'] = $prize_info['img_path'];

        //游戏及账号
        $treasure_user_info = D('TreasureUser')->getTreasureUserInfo($info['treasure_user_id']);
        $treasure_user_info['game_name'] = M('Game')->where('game_id = ' . $treasure_user_info['game_id'])->getField('game_name');

        $this->assign('info', $info);
        $this->assign('user_info', $user_info);
        $this->assign('treasure_info', $treasure_info);
        $this->assign('treasure_user_info', $treasure_user_info);
        $this->display();
    }


    //设置发货
    public function deliver_treasure() {
    
		$draw_prize_id = intval($this->_post('draw_prize_id'));
		if ($draw_prize_id) {

			$draw_prize_obj = new DrawPrizeModel($draw_prize_id);
            $success = $draw_prize_obj
                ->where('draw_prize_id = ' . $draw_prize_id)
                ->setField(array(
                    'is_deliver'=> 1, 
                    'deliver_time' => NOW_TIME
                ));

            //发货成功后的提醒
            if ($success) {
                $info = $draw_prize_obj->where('draw_prize_id = ' . $draw_prize_id)->find();
                $prize_name = M('Prize')->where('prize_id = ' . $info['prize_id'])->getField('prize_name');

                //推送消息给用户
                $msg = array(
                    'first'		=> '尊敬的用户，您的商品发货啦！',
                    'keyword1'	=> '夺宝奖品',
                    'keyword2'	=> $info['lottery'],
                    'keyword3'	=> $prize_name,
                    'url'		=> 'http://' . $_SERVER['HTTP_HOST'] . '/FrontUser/my_treasure.html',
                );
                PushModel::wxPush($info['user_id'], 'deliver', $msg);
            }

			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }
}
?>
