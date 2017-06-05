<?php
/**
 * Roll活动模型类
 */

class RollModel extends Model
{
    private $roll_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($roll_id=0)
    {
        parent::__construct("roll");
        $this->roll_id = $roll_id;
    }

    public function getRollNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加Roll活动
     * @author 姜伟
     * @param array $arr_class Roll活动数组
     * @return boolean 操作结果
     * @todo 添加Roll活动
     */
    public function addRoll($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除Roll活动
     * @author 姜伟
     * @param string $class_id Roll活动ID
     * @return boolean 操作结果
     * @todo 删除Roll活动
     */
    public function delRoll()
    {
        if (!is_numeric($this->roll_id)) return false;
        return $this->where('roll_id = ' . $this->roll_id)->setField('isuse', 2);
    }

    /**
     * 更改Roll活动
     * @author 姜伟
     * @param int $class_id Roll活动ID
     * @param array $arr_class Roll活动数组
     * @return boolean 操作结果
     * @todo 更改Roll活动
     */
    public function setRoll($roll_id, $arr)
    {
        if (!is_numeric($roll_id) || !is_array($arr)) return false;
        return $this->where('roll_id = ' . $roll_id)->save($arr);
    }

    /**
     * 获取Roll活动
     * @author 姜伟
     * @param int $class_id Roll活动ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array Roll活动
     * @todo 获取Roll活动
     */
    public function getRollInfo($roll_id, $fields = null)
    {
        if (!is_numeric($roll_id))   return false;
        return $this->field($fields)->where('roll_id = ' . $roll_id)->find();
    }

    /**
     * 获取Roll活动某个字段的信息
     * @author 姜伟
     * @param int $class_id Roll活动ID
     * @param string $field 查询的字段名
     * @return array Roll活动
     * @todo 获取Roll活动某个字段的信息
     */
    public function getRollField($roll_id, $field)
    {
        if (!is_numeric($roll_id))   return false;
        return $this->where('roll_id = ' . $roll_id)->getField($field);
    }

    /**
     * 获取所有Roll活动列表
     * @author 姜伟
     * @param string $where where子句
     * @return array Roll活动列表
     * @todo 获取所有Roll活动列表
     */
    public function getRollList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($roll_list)
    {
        foreach($roll_list AS $k=>$v) {
            //奖品图片与名称
            $prize_info = D('Prize')->getPrizeInfo($v['prize_id']);
            $roll_list[$k]['img_path'] = $prize_info['img_path'];
            $roll_list[$k]['prize_name'] = $prize_info['prize_name'];
        }

        return $roll_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getRollInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }


    /**
     * 计算剩余时间
     * @author wzg
     * @param unix 时间 int $end_time
     */
    public function calLeftTime($end_time)
    {
        if ($end_time <= NOW_TIME) return '00:00:00';
        $seconds = $end_time - NOW_TIME;

        $times = '';
        $day = floor($seconds/86400);
        $hours = intval($day * 24);
        $hours += floor(($seconds / 3600) % 24);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = floor($seconds % 60);

        if ($hours == 0) $hours = '00';
        if ($minutes == 0) $minutes = '00';
        if ($seconds == 0) $seconds = '00';

        return $hours . ':' . $minutes . ':' . $seconds;
    }



    /**
     * 自动设置结果
     * @author wzg
     * todo 先找出已结束时间的roll, 然后开奖
     */
    public function openRoll()
    {
        trace('-------------------open_roll start-----------------');
        $roll_list = $this->getRollList('', 'isuse = 1 AND is_open != 1 AND end_time < ' . NOW_TIME, 'addtime', 5);

        if ($roll_list) {
            foreach ($roll_list AS $k=>$v) {
                //是否已经设置，已设置返回
                if ($v['is_open']) continue;

                //找出中奖者信息
                //最大随机号
                $max_id = M('RollUser')->where('roll_id = ' . $v['roll_id'])->max('id');
                trace($max_id);
                if (!$max_id) continue;
                $award_user_info = M('RollUser')->where('id = ' . $max_id . ' AND roll_id = ' . $v['roll_id'])->find();
                if (!$award_user_info) continue;

                //记录中奖表
                $award_arr = array(
                    'user_id' => $award_user_info['user_id'],
                    'roll_user_id' => $award_user_info['roll_user_id'],
                    'roll_id' => $v['roll_id'],
                    'id'     => $max_id,
                    'addtime'     => NOW_TIME,
                    'isuse'    => 1,
                );

                //设置结果
                $arr = array(
                    'is_open'       => 1,
                    'open_user_id'  => 0,
                    'id'            => $max_id,
                    'open_time'     => NOW_TIME,
                );
                $success = $this->setRoll($v['roll_id'], $arr);

                if ($success) {
                    //搜入中奖表
                    D('RollAward')->addRollAward($award_arr);

                    //奖品名称
                    $prize_name = M('Prize')->where('prize_id = ' . $v['prize_id'])->getField('prize_name');
                    //推送消息给用户
                    $msg = array(
                        'first'		=> '恭喜您参与的roll活动中奖了！',
                        'keyword1'	=> 'roll活动',
                        'keyword2'	=> $prize_name,
                        'url'		=> 'http://' . $_SERVER['HTTP_HOST'] . '/FrontTreasure/roll_detail/roll_id/' . $v['roll_id'],
                    );
                    PushModel::wxPush($award_user_info['user_id'], 'reserve', $msg);
                }
            }
        }
        trace('-------------------open_roll end-----------------');
    }
}
