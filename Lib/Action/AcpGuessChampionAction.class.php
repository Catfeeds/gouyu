<?php
/**
 * 猜冠军类
 * 
 *
 */
class AcpGuessChampionAction extends AcpAction {
	
	
	 /**
     * 构造函数
     * @author 陆宇峰
     * @return void
     * @todo
     */
    public function AcpGuessChampionAction()
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

        $guess_champion_name = I('guess_champion_name', '', 'strip_tags');
        if ($guess_champion_name) {
            $this->assign('guess_champion_name', $guess_champion_name);
            $where .= ' AND guess_champion_name LIKE "%' . $guess_champion_name . '%"';
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
     * 猜冠军列表
     * @author wsq
     * @return void
     * @todo 
     */
	public function list_guess_champion()
	{
        $where = $this->get_search_condition();

		$guess_champion_obj = new GuessChampionModel();
		//数据总量
		$total          = $guess_champion_obj ->getGuessChampionNum($where);

		import('ORG.Util.Pagelist');
		$per_page_num = C('PER_PAGE_NUM');
		$Page = new Pagelist($total, $per_page_num);
		$guess_champion_obj->setStart($Page->firstRow);
        $guess_champion_obj->setLimit($Page->listRows);

        $guess_champion_list  = $guess_champion_obj ->getGuessChampionList('', $where, 'is_over, over_time DESC');
        $guess_champion_list  = $guess_champion_obj ->getListData($guess_champion_list);

		$page_str = $Page->show();
        $this->assign('page_str', $page_str);

        $this->assign("head_title", "猜冠军列表");
        $this->assign("guess_champion_list", $guess_champion_list);
		$this->display();
	}
	
	/**
     * 添加猜冠军
     * @author wsq
     * @return void
     */
	public function add_guess_champion()
	{
		$act = $this->_post('act');

		if($act == 'add')
		{
            $title = I('title', '', 'strip_tags');
            $start_time = I('start_time');
            $end_time   = I('end_time');
            $province_id = I('province_id', 0, 'int');
            $city_id     = I('city_id', 0, 'int');
            $area_id     = I('area_id', 0, 'int');
            $address     = I('address', '', 'strip_tags');
            $img_path    = I('img_path');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$title) $this->error('请填写标题');
            if (!$start_time) $this->error('请选择开始时间');
            if (!$end_time) $this->error('请选择结束时间');
            //if (!$province_id || !$city_id || !$area_id || !$address) $this->error('请把地址填写完整');
            if (!$img_path || !file_exists(APP_PATH . $img_path)) $this->error('请上传主图');

            $guess_champion_obj  = new GuessChampionModel(); 

            $success       = $guess_champion_obj->addGuessChampion(
                array(
                    'title'        => $title,
                    'start_time'   => strtotime($start_time),
                    'end_time'     => strtotime($end_time),
                    'province_id'  => $province_id,
                    'city_id'      => $city_id,
                    'area_id'      => $area_id,
                    'address'      => $address,
                    'img_path'     => $img_path,
                    'serial'       => $serial,
                    'isuse'        => $isuse,
                    'addtime'      => NOW_TIME
                )
            );

            if ($success) {
                $this->success('恭喜，猜冠军添加成功', '/AcpGuessChampion/list_guess_champion');
            } else {
                $this->error('抱歉，猜冠军添加失败，请稍候再试!');
            }
        }

        //省份列表
        $province_list = M('AddressProvince')->select();
        $this->assign('province_list', $province_list);

		$this->assign('head_title', '添加猜冠军');
		$this->display();
	}
	
	/**
     * 修改猜冠军信息
     * @author wsq
     * @return void
     */
	public function edit_guess_champion()
	{
		$id  = $this->_get('guess_champion_id');
		$act = $this->_post('act');

        $guess_champion_obj = new GuessChampionModel($id);
        $info     = $guess_champion_obj->getGuessChampionInfo($id);

        if (!$id || !$info) $this->error('抱歉，信息不存在,请稍候再试!');
		
		if($act == 'add')
		{
            $title = I('title', '', 'strip_tags');
            $start_time = I('start_time');
            $end_time   = I('end_time');
            $province_id = I('province_id', 0, 'int');
            $city_id     = I('city_id', 0, 'int');
            $area_id     = I('area_id', 0, 'int');
            $address     = I('address', '', 'strip_tags');
            $img_path    = I('img_path');
            $serial     = I('serial', 0, 'int');
            $isuse      = I('isuse', 0, 'int');

            //校验表单数据
            if (!$title) $this->error('请填写标题');
            if (!$start_time) $this->error('请选择开始时间');
            if (!$end_time) $this->error('请选择结束时间');
            //if (!$province_id || !$city_id || !$area_id || !$address) $this->error('请把地址填写完整');
            if (!$img_path || !file_exists(APP_PATH . $img_path)) $this->error('请上传主图');

            $guess_champion_obj  = new GuessChampionModel(); 

            $data_array = array(
                'title'        => $title,
                'start_time'   => strtotime($start_time),
                'end_time'     => strtotime($end_time),
                'province_id'  => $province_id,
                'city_id'      => $city_id,
                'area_id'      => $area_id,
                'address'      => $address,
                'img_path'     => $img_path,
                'serial'       => $serial,
                'isuse'        => $isuse,
                'addtime'      => NOW_TIME
            );

            if ($guess_champion_obj->setGuessChampion($id, $data_array)){
                $this->success('恭喜，猜冠军信息修改成功', '/AcpGuessChampion/list_guess_champion');
            } else {
                $this->error('抱歉，猜冠军信息修改失败，请稍候再试!');
            }
        }

        //省份列表
        $province_list = M('AddressProvince')->select();
        $this->assign('province_list', $province_list);

        //城市列表
        $city_list = M('AddressCity')->where('province_id = ' . $info['province_id'])->select();
        $this->assign('city_list', $city_list);

        //区域列表
        $area_list = M('AddressArea')->where('city_id = ' . $info['city_id'])->select();
        $this->assign('area_list', $area_list);
			
        $this->assign('guess_champion_info', $info);
        $this->assign('img_path_path', APP_PATH . $info['img_path']);
		$this->assign('head_title', '修改猜冠军');
		$this->display(APP_PATH . 'Tpl/AcpGuessChampion/edit_guess_champion.html');
	}


    public function del_guess_champion() {
    
		$guess_champion_id = intval($this->_post('guess_champion_id'));
		if ($guess_champion_id) {
            //判断是否有二级内容
            //$num = D('GuessChampionTeam')->getGuessChampionTeamNum('guess_champion_id = ' . $guess_champion_id);
            //if ($num) exit('failure');

            //判断是否已开始
            $start_time = D('GuessChampion')->where('guess_champion_id = ' . $guess_champion_id)->getField('start_time');
            if ($start_time <= NOW_TIME) exit('failure');

			$guess_obj = new GuessChampionModel($guess_champion_id);
			$success = $guess_obj->delGuessChampion();
            if ($success) {
                D('GuessChampionTeam')->where('guess_champion_id = ' . $guess_champion_id)->delete();
            }
			exit($success ? 'success' : 'failure');
		}

		exit('failure');
    }

	
    /**
     * 批量删除
     * wzg
     */
    public function batch_del_guess_champion()
    {
        $question_ids = $this->_post('question_guess_champion_ids');
        trace($question_ids);

		if ($question_ids) {
			$question_id_ary = explode(',', $question_ids);
			$success_num = 0;
			foreach ($question_id_ary AS $question_id)
			{
                //判断是否有二级内容
                $num = D('GuessChampionTeam')->getGuessChampionTeamNum('guess_champion_id = ' . $question_id);
                if ($num) continue;

                //判断是否已开始
                //$start_time = M('GuessChampion')->where('guess_champion_id = ' . $question_id)->getField('start_time');
                //if ($start_time <= NOW_TIME) continue;

                $question_obj = new GuessChampionModel($question_id);
				$success_num += $question_obj->delGuessChampion();
			}
			echo $success_num ? 'success' : 'failure';
			exit;
		}

		exit('failure');
    }

    /**
     * 查看投注分布
     * wzg
     */
    public function look_odds_detail()
    {
        $guess_champion_id = I('get.guess_champion_id', 0, 'int');
        if (!$guess_champion_id) $this->error('出错了，请稍后再试');

        $guess_champion_user_obj = D('GuessChampionUser');
        //人数及总计金额
        $where = 'guess_champion_id = ' . $guess_champion_id;
        $field = 'count(*) AS num, sum(add_money) AS total_money, odds, guess_champion_team_id, team_id, guess_champion_id';
        $list = $guess_champion_user_obj->field($field)->where($where)->group('guess_champion_team_id')->select();
        $list = $guess_champion_user_obj->getListData($list);
        //dump($list);die;

        //标题
        $info = M('GuessChampion')->where('guess_champion_id = ' . $guess_champion_id)->find();
        $this->assign('info', $info);

        $this->assign('list', $list);
        $this->assign('head_title', '猜冠军投注分布');
        $this->display();
    }

    /**
     * 设置结果
     * wzg
     */
    public function set_team()
    {
        $guess_champion_id = I('guess_champion_id', 0, 'int');
        $guess_champion_team_id = I('guess_champion_team_id', 0, 'int');
        if (!$guess_champion_id || !$guess_champion_team_id) exit('failure');

        //检查是否已设置
        $guess_champion_info = D('GuessChampion')->getGuessChampionInfo($guess_champion_id);
        if ($guess_champion_info['is_over']) exit('failure');

        //是否已开盘，没开盘不能设置
        if ($guess_champion_info['is_start'] == 2 
            || ($guess_champion_info['is_start'] == 0 && $guess_champion_info['start_time'] > NOW_TIME)) {
            exit('no_start');
        }

        $arr = array(
            'is_over' => 1,
            'result'  => $guess_champion_team_id,
            'over_time' => NOW_TIME
        );

        $success = D('GuessChampion')->setGuessChampion($guess_champion_id, $arr);
        if ($success) {
            //奖金发放流程
            //1,找出投注此结果的用户
            $guess_champion_user_obj = M('GuessChampionUser');
            $where = 'is_pay = 1 AND guess_champion_id = ' . $guess_champion_id . ' AND guess_champion_team_id= ' . $guess_champion_team_id;
            $win_user_list = $guess_champion_user_obj->where($where)->select();

            if ($win_user_list) {
                //2,找出赔率
                $odds = D('GuessChampionTeam')->where('guess_champion_team_id = ' . $guess_champion_team_id)->getField('odds');

                //3,发放金额
                $account_obj = new AccountModel();
                foreach ($win_user_list AS $k=>$v) {
                    //计算每个用户的所得金额
                    $gain_money = floatval($v['add_money'] * $odds);
                    //发放金额
                    $account_obj->addAccount($v['user_id'], AccountModel::GUESS_CHAMPION_GAIN, $gain_money, $guess_champion_info['title'], $guess_champion_id);

                    //4, 设置为已中奖
                    $guess_champion_user_obj->where('guess_champion_user_id = ' . $v['guess_champion_user_id'])
                        ->setField(array('is_prize' => 1, 'prize_money' => $gain_money));
                }
            }
            exit('success');
        }

        exit('failure');
    }


    //手动设置开关盘
    public function set_start_guess_champion()
    {
        $type = I('type', 0, 'int');
        $guess_champion_id = I('guess_champion_id', 0, 'int');
        if (!$type || !$guess_champion_id) exit('failure');

        $guess_champion_obj = new GuessChampionModel();
        $success = $guess_champion_obj->setGuessChampion($guess_champion_id, array('is_start' =>  $type));

        if ($success) exit('success');

        exit('failure');
    }


    /**
     * 全额退款给用户
     * wzg
     */
    public function refund_guess_champion()
    {
        $guess_champion_id = I('guess_champion_id', 0, 'int');
        if (!$guess_champion_id) exit('failure');

        //检查是否已设置
        $guess_champion_info = D('GuessChampion')->getGuessChampionInfo($guess_champion_id);
        if ($guess_champion_info['is_over']) exit('failure');

        $arr = array(
            'is_over' => 1,
            'result'  => -1,
            'over_time' => NOW_TIME
        );

        $success = D('GuessChampion')->setGuessChampion($guess_champion_id, $arr);
        if ($success) {
            //奖金发放流程
            //找出投注此结果的用户
            $guess_champion_user_obj = M('GuessChampionUser');
            $where = 'is_pay = 1 AND guess_champion_id = ' . $guess_champion_id;
            $win_user_list = $guess_champion_user_obj->where($where)->select();

            if ($win_user_list) {
                //发放金额
                $account_obj = new AccountModel();
                foreach ($win_user_list AS $k=>$v) {
                    //计算每个用户的所得金额
                    $gain_money = floatval($v['add_money']);
                    //发放金额
                    $account_obj->addAccount($v['user_id'], AccountModel::GUESS_CHAMPION_REFUND, $gain_money, $guess_champion_info['title'], $guess_champion_id);

                    // 设置为已中奖
                    $guess_champion_user_obj->where('guess_champion_user_id = ' . $v['guess_champion_user_id'])
                        ->setField(array('is_prize' => 0, 'prize_money' => $gain_money));
                }
            }
            exit('success');
        }

        exit('success');
    }


    //手动设置结束
    public function set_over()
    {
        $guess_champion_id = I('guess_champion_id', 0, 'int');
        if (!$guess_champion_id) exit('failure');

        $guess_champion_obj = new GuessChampionModel();

        //判断是否有人投注
        $guess_champion_user_obj = new GuessChampionUserModel();
        $num = $guess_champion_user_obj->getGuessChampionUserNum('is_pay = 1 AND guess_champion_id = ' . $guess_champion_id);
        if ($num) exit('failure');

        $arr = array(
            'is_over' => 1,
            'result'  => 0,
            'over_time' => NOW_TIME,
        );
        $success = $guess_champion_obj->setGuessChampion($guess_champion_id, $arr);

        if ($success) exit('success');

        exit('failure');
    }
}
?>
