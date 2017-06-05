<?php
/**
 * 充值返利模型类
 */

class RechargeBackModel extends Model
{
    private $recharge_back_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($recharge_back_id=0)
    {
        parent::__construct("recharge_back");
        $this->recharge_back_id = $recharge_back_id;
    }

    public function getRechargeBackNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加充值返利
     * @author 姜伟
     * @param array $arr_class 充值返利数组
     * @return boolean 操作结果
     * @todo 添加充值返利
     */
    public function addRechargeBack($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除充值返利
     * @author 姜伟
     * @param string $class_id 充值返利ID
     * @return boolean 操作结果
     * @todo 删除充值返利
     */
    public function delRechargeBack()
    {
        if (!is_numeric($this->recharge_back_id)) return false;
        return $this->where('recharge_back_id = ' . $this->recharge_back_id)->delete();
    }

    /**
     * 更改充值返利
     * @author 姜伟
     * @param int $class_id 充值返利ID
     * @param array $arr_class 充值返利数组
     * @return boolean 操作结果
     * @todo 更改充值返利
     */
    public function setRechargeBack($recharge_back_id, $arr)
    {
        if (!is_numeric($recharge_back_id) || !is_array($arr)) return false;
        return $this->where('recharge_back_id = ' . $recharge_back_id)->save($arr);
    }

    /**
     * 获取充值返利
     * @author 姜伟
     * @param int $class_id 充值返利ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 充值返利
     * @todo 获取充值返利
     */
    public function getRechargeBackInfo($recharge_back_id, $fields = null)
    {
        if (!is_numeric($recharge_back_id))   return false;
        return $this->field($fields)->where('recharge_back_id = ' . $recharge_back_id)->find();
    }

    /**
     * 获取充值返利某个字段的信息
     * @author 姜伟
     * @param int $class_id 充值返利ID
     * @param string $field 查询的字段名
     * @return array 充值返利
     * @todo 获取充值返利某个字段的信息
     */
    public function getRechargeBackField($recharge_back_id, $field)
    {
        if (!is_numeric($recharge_back_id))   return false;
        return $this->where('recharge_back_id = ' . $recharge_back_id)->getField($field);
    }

    /**
     * 获取所有充值返利列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 充值返利列表
     * @todo 获取所有充值返利列表
     */
    public function getRechargeBackList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($recharge_back_list)
    {
        foreach($recharge_back_list AS $k=>$v) {
            $recharge_back_list[$k]['ajax_addtime'] = date('Y-m-d H:i:s', $v['addtime']);
        }

        return $recharge_back_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getRechargeBackInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
