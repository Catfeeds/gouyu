<?php
/**
 * RollAward中奖模型类
 */

class RollAwardModel extends Model
{
    private $roll_award_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($roll_award_id=0)
    {
        parent::__construct("roll_award");
        $this->roll_award_id = $roll_award_id;
    }

    public function getRollAwardNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加RollAward中奖
     * @author 姜伟
     * @param array $arr_class RollAward中奖数组
     * @return boolean 操作结果
     * @todo 添加RollAward中奖
     */
    public function addRollAward($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除RollAward中奖
     * @author 姜伟
     * @param string $class_id RollAward中奖ID
     * @return boolean 操作结果
     * @todo 删除RollAward中奖
     */
    public function delRollAward()
    {
        if (!is_numeric($this->roll_award_id)) return false;
        return $this->where('roll_award_id = ' . $this->roll_award_id)->setField('isuse', 2);
    }

    /**
     * 更改RollAward中奖
     * @author 姜伟
     * @param int $class_id RollAward中奖ID
     * @param array $arr_class RollAward中奖数组
     * @return boolean 操作结果
     * @todo 更改RollAward中奖
     */
    public function setRollAward($roll_award_id, $arr)
    {
        if (!is_numeric($roll_award_id) || !is_array($arr)) return false;
        return $this->where('roll_award_id = ' . $roll_award_id)->save($arr);
    }

    /**
     * 获取RollAward中奖
     * @author 姜伟
     * @param int $class_id RollAward中奖ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array RollAward中奖
     * @todo 获取RollAward中奖
     */
    public function getRollAwardInfo($roll_award_id, $fields = null)
    {
        if (!is_numeric($roll_award_id))   return false;
        return $this->field($fields)->where('roll_award_id = ' . $roll_award_id)->find();
    }

    /**
     * 获取RollAward中奖某个字段的信息
     * @author 姜伟
     * @param int $class_id RollAward中奖ID
     * @param string $field 查询的字段名
     * @return array RollAward中奖
     * @todo 获取RollAward中奖某个字段的信息
     */
    public function getRollAwardField($roll_award_id, $field)
    {
        if (!is_numeric($roll_award_id))   return false;
        return $this->where('roll_award_id = ' . $roll_award_id)->getField($field);
    }

    /**
     * 获取所有RollAward中奖列表
     * @author 姜伟
     * @param string $where where子句
     * @return array RollAward中奖列表
     * @todo 获取所有RollAward中奖列表
     */
    public function getRollAwardList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($roll_award_list)
    {
        foreach($roll_award_list AS $k=>$v) {
            //用户昵称
            $roll_award_list[$k]['nickname'] = M('Users')->where('user_id = ' . $v['user_id'])->getField('nickname');

            //Roll名称
            $roll_award_list[$k]['roll_name'] = M('Roll')->where('roll_id = ' . $v['roll_id'])->getField('roll_name');

            //账号与密码
            $roll_user_info = M('RollUser')->where('roll_user_id = ' . $v['roll_user_id'])->find();
            $roll_award_list[$k]['game_name']  = M('Game')->where('game_id = ' . $roll_user_info['game_id'])->getField('game_name');
            $roll_award_list[$k]['game_account']  = $roll_user_info['game_account'];
            $roll_award_list[$k]['steam_url']  = $roll_user_info['steam_url'];
        }

        return $roll_award_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getRollAwardInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
