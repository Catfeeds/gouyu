<?php
/**
 * 订单地址模型类
 */

class OrderAddressModel extends Model
{
    private $order_address_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($order_id=0)
    {
        parent::__construct("order_address");
        $this->orderId= $order_id;
    }

    public function getOrderAddressNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加订单地址
     * @author 姜伟
     * @param array $arr_class 订单地址数组
     * @return boolean 操作结果
     * @todo 添加订单地址
     */
    public function addOrderAddress($arr)
    {
        if (!$this->orderId) return false;
        if (!is_array($arr)) return false;
        $arr['order_id'] = $this->orderId;
        return $this->add($arr);
    }

    /**
     * 删除订单地址
     * @author 姜伟
     * @param string $class_id 订单地址ID
     * @return boolean 操作结果
     * @todo 删除订单地址
     */
    public function delOrderAddress()
    {
        if (!is_numeric($this->orderId)) return false;
        return $this->where('order_id = ' . $this->orderId)->setField('isuse', 2);
    }

    /**
     * 更改订单地址
     * @author 姜伟
     * @param int $class_id 订单地址ID
     * @param array $arr_class 订单地址数组
     * @return boolean 操作结果
     * @todo 更改订单地址
     */
    public function setOrderAddress($order_address_id, $arr)
    {
        if (!is_numeric($order_address_id) || !is_array($arr)) return false;
        return $this->where('order_address_id = ' . $order_address_id)->save($arr);
    }

    /**
     * 获取订单地址
     * @author 姜伟
     * @param int $class_id 订单地址ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 订单地址
     * @todo 获取订单地址
     */
    public function getOrderAddressInfo($order_address_id, $fields = null)
    {
        if (!is_numeric($order_address_id))   return false;
        return $this->field($fields)->where('order_address_id = ' . $order_address_id)->find();
    }

    /**
     * 获取订单地址某个字段的信息
     * @author 姜伟
     * @param int $class_id 订单地址ID
     * @param string $field 查询的字段名
     * @return array 订单地址
     * @todo 获取订单地址某个字段的信息
     */
    public function getOrderAddressField($order_address_id, $field)
    {
        if (!is_numeric($order_address_id))   return false;
        return $this->where('order_address_id = ' . $order_address_id)->getField($field);
    }

    /**
     * 获取所有订单地址列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 订单地址列表
     * @todo 获取所有订单地址列表
     */
    public function getOrderAddressList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($order_address_list)
    {
        foreach($order_address_list AS $k=>$v) {
        }

        return $order_address_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getOrderAddressInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }

}
