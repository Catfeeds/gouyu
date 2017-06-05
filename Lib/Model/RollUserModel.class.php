<?php
/**
 * RollUser用户模型类
 */

class RollUserModel extends Model
{
    private $roll_user_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($roll_user_id=0)
    {
        parent::__construct("roll_user");
        $this->roll_user_id = $roll_user_id;
    }

    public function getRollUserNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加RollUser用户
     * @author 姜伟
     * @param array $arr_class RollUser用户数组
     * @return boolean 操作结果
     * @todo 添加RollUser用户
     */
    public function addRollUser($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除RollUser用户
     * @author 姜伟
     * @param string $class_id RollUser用户ID
     * @return boolean 操作结果
     * @todo 删除RollUser用户
     */
    public function delRollUser()
    {
        if (!is_numeric($this->roll_user_id)) return false;
        return $this->where('roll_user_id = ' . $this->roll_user_id)->setField('isuse', 2);
    }

    /**
     * 更改RollUser用户
     * @author 姜伟
     * @param int $class_id RollUser用户ID
     * @param array $arr_class RollUser用户数组
     * @return boolean 操作结果
     * @todo 更改RollUser用户
     */
    public function setRollUser($roll_user_id, $arr)
    {
        if (!is_numeric($roll_user_id) || !is_array($arr)) return false;
        return $this->where('roll_user_id = ' . $roll_user_id)->save($arr);
    }

    /**
     * 获取RollUser用户
     * @author 姜伟
     * @param int $class_id RollUser用户ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array RollUser用户
     * @todo 获取RollUser用户
     */
    public function getRollUserInfo($roll_user_id, $fields = null)
    {
        if (!is_numeric($roll_user_id))   return false;
        return $this->field($fields)->where('roll_user_id = ' . $roll_user_id)->find();
    }

    /**
     * 获取RollUser用户某个字段的信息
     * @author 姜伟
     * @param int $class_id RollUser用户ID
     * @param string $field 查询的字段名
     * @return array RollUser用户
     * @todo 获取RollUser用户某个字段的信息
     */
    public function getRollUserField($roll_user_id, $field)
    {
        if (!is_numeric($roll_user_id))   return false;
        return $this->where('roll_user_id = ' . $roll_user_id)->getField($field);
    }

    /**
     * 获取所有RollUser用户列表
     * @author 姜伟
     * @param string $where where子句
     * @return array RollUser用户列表
     * @todo 获取所有RollUser用户列表
     */
    public function getRollUserList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($roll_user_list)
    {
        foreach($roll_user_list AS $k=>$v) {
            //用户昵称
            $user_obj = new UserModel($v['user_id']);
            $user_info = $user_obj->getUserInfo('headimgurl, nickname');
            $roll_user_list[$k]['nickname'] = $user_info['nickname'];
            $roll_user_list[$k]['headimgurl'] = $user_info['headimgurl'];

            //Roll名称
            $roll_obj = D('Roll');
            $roll_info = $roll_obj->getRollInfo($v['roll_id']);
            $roll_user_list[$k]['roll_name'] = $roll_info['roll_name'];
            $roll_user_list[$k]['is_open'] = $roll_info['is_open'];
            $roll_user_list[$k]['open_time'] = $roll_info['open_time'];
            $roll_user_list[$k]['start_time'] = $roll_info['start_time'];
            $roll_user_list[$k]['end_time'] = $roll_info['end_time'];
            $roll_user_list[$k]['ajax_open_time'] = date('Y-m-d H:i:s', $roll_info['open_time']);
            $roll_user_list[$k]['ajax_end_time'] = date('Y-m-d H:i:s', $roll_info['end_time']);
            $roll_user_list[$k]['ajax_addtime'] = date('Y-m-d H:i:s', $roll_info['addtime']);
            $roll_user_list[$k]['left_time'] = $roll_obj->calLeftTime($roll_info['end_time']);

            //奖品信息
            $prize_info = M('Prize')->where('prize_id = ' . $roll_info['prize_id'])->find();
            $roll_user_list[$k]['prize_name'] = $prize_info['prize_name'];
            $roll_user_list[$k]['img_path'] = $prize_info['img_path'];

            //查看中奖者 
            if ($roll_info['is_open']) {
                $award_user_id = M('RollAward')->where('roll_id = ' . $v['roll_id'])->getField('user_id');
                $roll_user_list[$k]['award_user_id'] = $award_user_id;
                $roll_user_list[$k]['award_user_name'] = M('Users')->where('user_id = ' . $award_user_id)->getField('nickname');
            }
        }

        return $roll_user_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getRollUserInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
