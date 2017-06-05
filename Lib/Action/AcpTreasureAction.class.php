<?php
/**
 * 宝贝类
 * 
 *
 */
class AcpTreasureAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpTreasureAction()
	{
		parent::_initialize();
	}


	private function get_search_condition()
    {
        $where = 'true';

        //prize_name
        $prize_name = I('prize_name', '', 'strip_tags');
        $this->assign('prize_name', $prize_name);
        if ($prize_name) {
            $prize_ids = M('Prize')->where('prize_name LIKE "%' . $prize_name . '%"')->getField('prize_id', true);
            if ($prize_ids) {
                $ids = implode(',', $prize_ids);
                $where .= ' AND prize_id IN (' . $ids . ')';
            }
        }

        //is_open
        $is_open = $this->_request('is_open');
        $this->assign('is_open', $is_open);
        if ($is_open) {
            if ($is_open == 3) {
                $where .= ' AND is_open = 1 AND lottery = 0';
            } else if ($is_open == 2) {
                $where .= ' AND is_open = 0';
            } else {
                $where .= ' AND is_open = 1 AND lottery != 0';
            }
        }

        //is_fuli
        $is_fuli = $this->_request('is_fuli');
        $this->assign('is_fuli', $is_fuli);
        if ($is_fuli) {
            if ($is_fuli == 2) {
                $where .= ' AND is_fuli = 0';
            } else {
                $where .= ' AND is_fuli = 1';
            }
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

        return $where;
    }
	/**
     * 宝贝列表
     * @author wzg
     * @return void
     * @todo 
     */
	public function list_treasure()
	{
        $where = $this->get_search_condition();
        $where .= ' AND isuse != 2';
		$treasure_obj = new TreasureModel();
		//数据总量
		$total          = $treasure_obj->getTreasureNum($where);

        //echo "<pre>"; die(print_r($treasure_list));

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$treasure_obj->setStart($Page->firstRow);
        $treasure_obj->setLimit($Page->listRows);

        $treasure_list  = $treasure_obj->getTreasureList('', $where, 'is_open, addtime DESC');
        $treasure_list  = $treasure_obj->getListData($treasure_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "宝贝列表");
        $this->assign("treasure_list", $treasure_list);
		$this->display();
	}

    /**
     * 根据总需人次生成数组
     * wzg
     */
    private function gene_json_ids($total_times)
    {
        $total_times = intval($total_times);
        $arr = array();
        for($i=1;$i<=$total_times;$i++) {
            $arr[] = $i;
        }
        if ($arr) {
            $str = json_encode($arr);
            return $str;
        } else {
            return false;
        }
    }
	
	/**
     * 添加宝贝
     * @author wzg
     * @return void
     */
	public function add_treasure()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $prize_id   = I('prize_id');
            $start_time = I('start_time');
            $end_time   = I('end_time');
            $total_person_times = I('total_person_times', 0, 'int');
            $periods    = I('periods', 0, 'int');
            $each_person_times = I('each_person_times', 0, 'int');
            $serial     = I('serial');
            $isuse      = I('isuse');
            $is_fuli    = I('is_fuli');
            $limit_fuli_money = I('limit_fuli_money');

            //校验表单数据
            if (!$prize_id) $this->error('请输入奖品');
            if (!$start_time) $this->error('请输入开始时间');
            if (!$end_time) $this->error('请输入结束时间');
            if (!$total_person_times) $this->error('请输入总需人次');
            if (!$periods) $this->error('请输入期数');
            if (!$each_person_times) $this->error('请输入每人每人购买期限');

            $treasure_obj  = new TreasureModel(); 

            $id_json_str = $this->gene_json_ids($total_person_times);
            if (!$id_json_str) $this->error('生成id数组时出错了');

            $success       = $treasure_obj->addTreasure(
                array(
                    'prize_id'    => $prize_id,
                    'start_time'  => strtotime($start_time),
                    'end_time'    => strtotime($end_time),
                    'total_person_times'    => $total_person_times,
                    'periods'     => $periods,
                    'each_person_times'    => $each_person_times,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'addtime'     => NOW_TIME,
                    'id_json_str' => $id_json_str,
                    'is_fuli'       => $is_fuli,
                    'limit_fuli_money'  => $limit_fuli_money,
                )
            );

            if ($success) {
                $this->success('恭喜，宝贝添加成功', '/AcpTreasure/list_treasure');
            } else {
                $this->error('抱歉，宝贝添加失败，请稍候再试!');
            }
        }

        //奖品列表
        $prize_list = M('Prize')->where('isuse = 1')->select();
        $this->assign('prize_list', $prize_list);
			
		$this->assign('head_title', '添加宝贝');
		$this->display();
	}
	
	/**
     * 修改宝贝信息
     * @author wzg
     * @return void
     */
	public function edit_treasure()
	{
		$id  = $this->_get('treasure_id');
		$act = $this->_post('act');

        $treasure_obj = new TreasureModel($id);
        $info         = $treasure_obj->getTreasureInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!', '/AcpTreasure/list_treasure');
		
		if($act == 'add')
		{
            $prize_id   = I('prize_id');
            $start_time = I('start_time');
            $end_time   = I('end_time');
            $total_person_times = I('total_person_times', 0, 'int');
            $periods    = I('periods', 0, 'int');
            $each_person_times = I('each_person_times', 0, 'int');
            $serial     = I('serial');
            $isuse      = I('isuse');
            $is_fuli    = I('is_fuli');
            $limit_fuli_money = I('limit_fuli_money');

            //校验表单数据
            if (!$prize_id) $this->error('请先择奖品');
            if (!$start_time) $this->error('请输入开始时间');
            if (!$end_time) $this->error('请输入结束时间');
            if (!$total_person_times) $this->error('请输入总需人次');
            if (!$periods) $this->error('请输入期数');
            if (!$each_person_times) $this->error('请输入每人每人购买期限');

            //验证是否已开始
            if ($info['is_open']) $this->error('夺宝已结束不能修改');
            //if ($info['start_time'] <= NOW_TIME) $this->error('夺宝已开始不能修改');
            //是否已有人参加
            $num = M('TreasureUser')->where('treasure_id = ' . $id)->count();
            if ($num) $this->error('此夺宝已有人参加，不能修改');

            $treasure_obj  = new TreasureModel(); 

            $id_json_str = $this->gene_json_ids($total_person_times);
            $data_array    =  array(
                    'prize_id'       => $prize_id,
                    'start_time'  => strtotime($start_time),
                    'end_time'    => strtotime($end_time),
                    'total_person_times'    => $total_person_times,
                    'periods'     => $periods,
                    'each_person_times'    => $each_person_times,
                    'serial'      => $serial,
                    'isuse'       => $isuse,
                    'id_json_str' => $id_json_str,
                    'is_fuli'     => $is_fuli,
                    'limit_fuli_money'  => $limit_fuli_money,
                );

            if ($treasure_obj->setTreasure($id, $data_array)){
                $this->success('恭喜，宝贝信息修改成功', '/AcpTreasure/list_treasure');
            } else {
                $this->error('抱歉，宝贝信息修改失败，请稍候再试!');
            }
        }
			
        //奖品列表
        $prize_list = M('Prize')->where('isuse = 1')->select();
        $this->assign('prize_list', $prize_list);

        $this->assign('treasure_info', $info);
		$this->assign('head_title', '修改宝贝');
		$this->display(APP_PATH . 'Tpl/AcpTreasure/edit_treasure.html');
	}


    public function del_treasure() {
    
		$treasure_id = intval($this->_post('treasure_id'));
		if ($treasure_id) {
            $treasure_info = D('Treasure')->getTreasureInfo($treasure_id);

            if (!$treasure_info['is_open']) {
                //是否已有人参加
                $num = M('TreasureUser')->where('treasure_id = ' . $treasure_id)->count();
                if ($num) exit('have');
            }

			$treasure_obj = new TreasureModel($treasure_id);
			$success = $treasure_obj->delTreasure();
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }


    /**
     * 批量删除
     * wzg
     */
    public function batch_del_treasure()
    {
        $question_ids = $this->_post('question_class_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
            {
                //是否已有人参加
                $num = M('TreasureUser')->where('treasure_id = ' . $question_id)->count();
                if ($num) continue;

                $question_obj = new TreasureModel($question_id);
				$success_num += $question_obj->delTreasure();
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
    public function set_result()
    {
        $user_id = intval(session('user_id'));
        $treasure_id = I('treasure_id', 0, 'int');
        $lottery = I('lottery');
        $lottery_periods = I('lottery_periods', '', 'strip_tags');

        if (!$treasure_id) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '出现异常'));
        }
        if (!$lottery || !is_numeric($lottery)) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '请填写正确的时时彩开奖号'));
        }

        if (!$lottery_periods) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '请填写时时彩中奖期数'));
        }

        $treasure_obj = new TreasureModel();

        //没有到总需人数不能开奖
        $treasure_num = M('TreasureUser')->where('treasure_id = ' . $treasure_id)->count();
        $treasure_info = $treasure_obj->getTreasureInfo($treasure_id);
        if ($treasure_num < $treasure_info['total_person_times']) {
            $this->ajaxReturn(array('code' => 0, 'msg' => '未到所需总人数'));
        }

        //如果没有结束则不能设置
        if ($treasure_info['end_time'] >= NOW_TIME) {
            //$this->ajaxReturn(array('code' => 0, 'msg' => '此夺宝未结束，不能设置'));
        }

        //是否已经设置，已设置返回
        if ($treasure_info['is_open']) $this->ajaxReturn(array('code' => 0, 'msg' => '已设置过时时彩开奖号码了'));

        //根据时时彩产生中奖号码
        //计算公式：时时彩中奖号码 % 所需总人数 + 1;
        if (!$treasure_info['total_person_times']) $this->ajaxReturn(array('code' => 0, 'msg' => '总人数为空，出现异常'));
        $new_lottery = intval($lottery) % $treasure_info['total_person_times'] + 1;

        //找出中奖者信息
        $award_user_info = M('TreasureUser')->field('user_id, treasure_user_id')->where('treasure_id = ' . $treasure_id . ' AND id = ' . $new_lottery)->find();
        if (!$award_user_info) $this->ajaxReturn(array('code' => 0, 'msg' => '没有找到对应的中奖者'));

        //算出夺宝成功率，前台显示时不用计算
        $times = D('TreasureUser')->getTreasureUserNum('user_id = ' . $award_user_info['user_id'] . ' AND treasure_id = ' . $treasure_id);
        $rate = $times / $treasure_info['total_person_times'] * 100;

        //记录中奖表
        $award_arr = array(
            'user_id' => $award_user_info['user_id'],
            'treasure_user_id' => $award_user_info['treasure_user_id'],
            'treasure_id' => $treasure_id,
            'prize_id'    => $treasure_info['prize_id'],
            'lottery'     => $new_lottery,
            'join_times'  => $times,
            'award_rate'  => $rate,
            'addtime'     => NOW_TIME,
        );

        //设置结果
        $arr = array(
            'is_open'       => 1,
            'open_user_id'  => $user_id,
            'draw_lottery'  => $lottery,
            'lottery'       => $new_lottery,
            'lottery_periods'  => $lottery_periods,
            'open_time'     => NOW_TIME,
        );
        $success = $treasure_obj->setTreasure($treasure_id, $arr);

        if ($success) {
            //搜入中奖表
            $draw_prize_id = D('DrawPrize')->addDrawPrize($award_arr);
            if ($draw_prize_id) {

                //奖品名称
                $prize_name = M('Prize')->where('prize_id = ' . $treasure_info['prize_id'])->getField('prize_name');
                //推送消息给用户
                $msg = array(
                    'first'		=> '恭喜您参与的夺宝活动中奖了！',
                    'keyword1'	=> '夺宝活动',
                    'keyword2'	=> $prize_name,
                    'url'		=> 'http://' . $_SERVER['HTTP_HOST'] . '/FrontTreasure/draw_prize_detail/draw_prize_id/' . $draw_prize_id,
                );
                PushModel::wxPush($award_user_info['user_id'], 'reserve', $msg);

                $this->ajaxReturn(array('code' => 200, 'msg' => '设置成功'));
            }
        }
        $this->ajaxReturn(array('code' => 0, 'msg' => '设置失败'));
    }
}
?>
