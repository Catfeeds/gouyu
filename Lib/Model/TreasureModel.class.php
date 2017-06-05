<?php
/**
 * 宝贝模型类
 */

class TreasureModel extends Model
{
    private $treasure_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($treasure_id=0)
    {
        parent::__construct("treasure");
        $this->treasure_id = $treasure_id;
    }

    public function getTreasureNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加宝贝
     * @author 姜伟
     * @param array $arr_class 宝贝数组
     * @return boolean 操作结果
     * @todo 添加宝贝
     */
    public function addTreasure($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除宝贝
     * @author 姜伟
     * @param string $class_id 宝贝ID
     * @return boolean 操作结果
     * @todo 删除宝贝
     */
    public function delTreasure()
    {
        if (!is_numeric($this->treasure_id)) return false;
        return $this->where('treasure_id = ' . $this->treasure_id)->setField('isuse', 2);
    }

    /**
     * 更改宝贝
     * @author 姜伟
     * @param int $class_id 宝贝ID
     * @param array $arr_class 宝贝数组
     * @return boolean 操作结果
     * @todo 更改宝贝
     */
    public function setTreasure($treasure_id, $arr)
    {
        if (!is_numeric($treasure_id) || !is_array($arr)) return false;
        return $this->where('treasure_id = ' . $treasure_id)->save($arr);
    }

    /**
     * 获取宝贝
     * @author 姜伟
     * @param int $class_id 宝贝ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 宝贝
     * @todo 获取宝贝
     */
    public function getTreasureInfo($treasure_id, $fields = null)
    {
        if (!is_numeric($treasure_id))   return false;
        return $this->field($fields)->where('treasure_id = ' . $treasure_id)->find();
    }

    /**
     * 获取宝贝某个字段的信息
     * @author 姜伟
     * @param int $class_id 宝贝ID
     * @param string $field 查询的字段名
     * @return array 宝贝
     * @todo 获取宝贝某个字段的信息
     */
    public function getTreasureField($treasure_id, $field)
    {
        if (!is_numeric($treasure_id))   return false;
        return $this->where('treasure_id = ' . $treasure_id)->getField($field);
    }

    /**
     * 获取所有宝贝列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 宝贝列表
     * @todo 获取所有宝贝列表
     */
    public function getTreasureList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($treasure_list)
    {
        foreach($treasure_list AS $k=>$v) {
            //找出奖品图片与名称
            $prize_info = D('Prize')->getPrizeInfo($v['prize_id']);
            $treasure_list[$k]['img_path'] = $prize_info['img_path'];
            $treasure_list[$k]['prize_name'] = $prize_info['prize_name'];

            //现在已报名人数
            $people_num = M('TreasureUser')->where('treasure_id = ' . $v['treasure_id'])->count();
            $treasure_list[$k]['people_num'] = $people_num;

            //剩余人次
            $left_times = (string)($v['total_person_times'] - $people_num);
            $left_arr = array();
            for($i=0;$i<strlen($left_times);$i++) {
                $left_arr[] = $left_times[$i];
            }
            $treasure_list[$k]['left_arr'] = $left_arr;

        }

        return $treasure_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getTreasureInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

    /**
     * 时时彩开奖接口
     * wzg
     * todo 取出30个数据，随机取出一个
     */
    public function shishicai()
    {
        //$src = 'http://f.apiplus.cn/cqssc-1.json';
        $src = 'http://f.apiplus.cn/cqssc-30.json';
        $src .= '?_='.time();
        $json = file_get_contents(urldecode($src));
        $json = json_decode($json, 'true');
        $total_num = count($json['data']);
        $rand_num = mt_rand(0, $total_num - 1);
        $json_data = $json['data'][$rand_num]; 

        if ($json_data) {
            $arr = array();

            $expect = $json_data['expect'];
            //$year = substr($expect, 0, 4);
            $month = intval(substr($expect, 4, 2));
            $day = substr($expect, 6, 2);
            $periods = substr($expect, 8, 3);
            $arr['expect'] = $month . '月' . $day . '日第' . $periods . '期';

            $arr['opencode'] =str_replace(',', '', $json_data['opencode']);

            return $arr;
            dump($arr);die;
        }
        return false;
    }

    //自动处理夺宝人数已满的结果
    //@param int treasure_id
    public function autoSetResult()
    {
        trace('-----------------auto_start--------------------');
        $treasure_obj = D('Treasure');
        $treasure_list = $treasure_obj->getTreasureList('', 'isuse = 1 AND is_open = 0 AND open_time > 0 AND open_time <=' . NOW_TIME, 'addtime', 5);
        if ($treasure_list) {

            $shishicai = $treasure_obj->shishicai();
            if ($shishicai) {

                $arr = array(); //记录中奖表
                foreach ($treasure_list AS $k=>$v) {
                    $treasure_id = $v['treasure_id'];
                    $treasure_num = M('TreasureUser')->where('treasure_id = ' . $treasure_id)->count();
                    if ($treasure_num != $v['total_person_times']) continue;
                    if ($v['is_open']) continue;

                    //计算公式：时时彩中奖号码 % 所需总人数 + 1;
                    $new_lottery = intval($shishicai['opencode']) % $v['total_person_times'] + 1;

                    //找出中奖者信息
                    $award_user_info = M('TreasureUser')->field('user_id, treasure_user_id')->where('treasure_id = ' . $treasure_id . ' AND id = ' . $new_lottery)->find();
                    if (!$award_user_info) continue;

                    //算出夺宝成功率，前台显示时不用计算
                    $times = D('TreasureUser')->getTreasureUserNum('user_id = ' . $award_user_info['user_id'] . ' AND treasure_id = ' . $treasure_id);
                    $rate = $times / $v['total_person_times'] * 100;

                    //记录中奖表
                    $arr1 = array(
                        'user_id' => $award_user_info['user_id'],
                        'treasure_user_id' => $award_user_info['treasure_user_id'],
                        'treasure_id' => $treasure_id,
                        'prize_id'    => $v['prize_id'],
                        'lottery'     => $new_lottery,
                        'join_times'  => $times,
                        'award_rate'  => $rate,
                        'addtime'     => NOW_TIME,
                    );

                    //设置结果
                    $arr = array(
                        'is_open'       => 1,
                        'open_user_id'  => 0,
                        'draw_lottery'  => $shishicai['opencode'],
                        'lottery'       => $new_lottery,
                        'lottery_periods'  => $shishicai['expect'],
                        'open_time'     => NOW_TIME,
                    );

                    //再去找一次是否已开奖
                    $have = M('DrawPrize')->where('treasure_id = ' . $treasure_id)->count();
                    if ($have) continue;

                    $success = $treasure_obj->setTreasure($treasure_id, $arr);
                    if ($success) {
                        //入中奖表
                        $draw_prize_id = D('DrawPrize')->addDrawPrize($arr1);

                        //奖品名称
                        $prize_name = M('Prize')->where('prize_id = ' . $v['prize_id'])->getField('prize_name');
                        //推送消息给用户
                        $msg = array(
                            'first'		=> '恭喜您参与的夺宝活动中奖了！',
                            'keyword1'	=> '夺宝活动',
                            'keyword2'	=> $prize_name,
                            'url'		=> 'http://' . $_SERVER['HTTP_HOST'] . '/FrontTreasure/draw_prize_detail/draw_prize_id/' . $draw_prize_id,
                        );
                        PushModel::wxPush($award_user_info['user_id'], 'reserve', $msg);
                    }
                }

            }
        }

        trace('-----------------auto_end--------------------');
    }

    //到期后未满的退款流程
    public function treasureRefundByEndtime()
    {
        trace('---------------------auto_treasure_end_time-------------');
        $treasure_list = $this->getTreasureList('', 'isuse = 1 AND is_open = 0 AND open_time = 0 AND end_time < ' . NOW_TIME, 'addtime', 5);

        if ($treasure_list) {
            $treasure_user_obj = M('TreasureUser');
            $account_obj = new AccountModel();
            foreach ($treasure_list AS $key=>$val) {
                $treasure_user_list = $treasure_user_obj->field('count(*) AS add_num, user_id')
                    ->where('treasure_id = ' . $val['treasure_id'])
                    ->group('user_id')
                    ->select();
                $treasure_id = $val['treasure_id'];
                foreach ($treasure_user_list AS $k=>$v) {
                    $gain_money = $v['add_num'] * 100;
                    $account_obj->addAccount($v['user_id'], AccountModel::TREASURE_REFUND, $gain_money, '', $treasure_id);
                }

                //设置结果
                $arr = array(
                    'is_open'       => 1,
                    'open_user_id'  => 0,
                    'draw_lottery'  => 0,
                    'lottery'       => 0,
                    'lottery_periods'  => 0,
                    'open_time'     => NOW_TIME,
                );
                $success = $this->setTreasure($treasure_id, $arr);
            }

        }
        trace('---------------------auto_treasure_end_time-------------');
    }



    //红黑榜计算
    //opt 存在则为上周
    public function calWeekTimes($opt=0)
    {
        $curtime=time();
        $curtime = strtotime(date('Y-m-d', $curtime));
        $curweekday = date('w');
        $curweekday = $curweekday?$curweekday:7;
        $curmon = $curtime - ($curweekday-1)*86400; //周一 零点时间戳
        $cursun = $curmon + 7*86400; //周7 零点时间戳

        if ($opt) {
            $cursun = $curmon;
            $curmon = $curmon - 7 * 86400;
        }

        //总参与次数
        $list = M('Treasure')->alias('t')
            ->join('tp_treasure_user AS tu ON t.treasure_id = tu.treasure_id')
            ->field('t.treasure_id, t.total_person_times, tu.user_id, count(tu.treasure_user_id) AS num')
            ->where('tu.addtime >= ' . $curmon . ' AND tu.addtime < ' . $cursun . ' AND t.is_open = 1')
            ->group('tu.user_id')
            ->select();
        //成功次数
        $list_prize = M('DrawPrize')->field('user_id, treasure_id')->where('addtime >= ' . $curmon . ' AND addtime < ' . $cursun)->select();
        $prize_user = array();
        foreach($list_prize AS $k=>$v) {
            $prize_user[$v['user_id']][] = $v['treasure_id'];   
        }
        $diff_arr = [];
        foreach($list AS $k=>$v) {
            $success_treasure_ids = $prize_user[$v['user_id']]; 
            $ids = implode(',', $success_treasure_ids);
            $total_num = M('Treasure')->where('treasure_id IN (' . $ids . ')')->sum('total_person_times');
            $diff_num = intval($total_num - $v['num']);
            $diff_arr[$v['user_id']] = $diff_num;
        }

        if ($diff_arr) {
            $max_num = max($diff_arr);
            $max_pos = array_search($max_num, $diff_arr);

            $min_num = min($diff_arr);
            $min_pos = array_search($min_num, $diff_arr);

            return array(
                'max' => array(
                    $max_pos, 
                    $max_num
                ),
                'min' => array(
                    $min_pos,
                    $min_num
                )
            );
        }
    }


    //每周自动处理上周黑红榜
    public function autoCalTimes()
    {
        //周一
        $curtime=time();
        $curtime = strtotime(date('Y-m-d', $curtime));
        $curweekday = date('w');
        if ($curweekday == 1 && ($curtime + 1) == NOW_TIME) {
            $times = $this->calWeekTimes(true);
            M('WeekTimes')->add(array(
                'addtime' => NOW_TIME,
                'content' => json_encode($times)
            ));
        }

        return true;
    }
}
