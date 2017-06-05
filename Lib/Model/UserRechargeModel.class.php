<?php
/**
 * 用户充值ID模型类
 */

class UserRechargeModel extends Model
{
    private $user_recharge_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($user_recharge_id=0)
    {
        parent::__construct("user_recharge");
        $this->user_recharge_id = $user_recharge_id;
    }

    public function getUserRechargeNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加用户充值ID
     * @author 姜伟
     * @param array $arr_class 用户充值ID数组
     * @return boolean 操作结果
     * @todo 添加用户充值ID
     */
    public function addUserRecharge($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除用户充值ID
     * @author 姜伟
     * @param string $class_id 用户充值IDID
     * @return boolean 操作结果
     * @todo 删除用户充值ID
     */
    public function delUserRecharge()
    {
        if (!is_numeric($this->user_recharge_id)) return false;
        return $this->where('user_recharge_id = ' . $this->user_recharge_id)->delete();
    }

    /**
     * 更改用户充值ID
     * @author 姜伟
     * @param int $class_id 用户充值IDID
     * @param array $arr_class 用户充值ID数组
     * @return boolean 操作结果
     * @todo 更改用户充值ID
     */
    public function setUserRecharge($user_recharge_id, $arr)
    {
        if (!is_numeric($user_recharge_id) || !is_array($arr)) return false;
        return $this->where('user_recharge_id = ' . $user_recharge_id)->save($arr);
    }

    /**
     * 获取用户充值ID
     * @author 姜伟
     * @param int $class_id 用户充值IDID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 用户充值ID
     * @todo 获取用户充值ID
     */
    public function getUserRechargeInfo($user_recharge_id, $fields = null)
    {
        if (!is_numeric($user_recharge_id))   return false;
        return $this->field($fields)->where('user_recharge_id = ' . $user_recharge_id)->find();
    }

    /**
     * 获取用户充值ID某个字段的信息
     * @author 姜伟
     * @param int $class_id 用户充值IDID
     * @param string $field 查询的字段名
     * @return array 用户充值ID
     * @todo 获取用户充值ID某个字段的信息
     */
    public function getUserRechargeField($user_recharge_id, $field)
    {
        if (!is_numeric($user_recharge_id))   return false;
        return $this->where('user_recharge_id = ' . $user_recharge_id)->getField($field);
    }

    /**
     * 获取所有用户充值ID列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 用户充值ID列表
     * @todo 获取所有用户充值ID列表
     */
    public function getUserRechargeList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($user_recharge_list)
    {
        foreach($user_recharge_list AS $k=>$v) {
        }

        return $user_recharge_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getUserRechargeInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
