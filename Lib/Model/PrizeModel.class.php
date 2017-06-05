<?php
/**
 * 奖品模型类
 */

class PrizeModel extends Model
{
    private $prize_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($prize_id=0)
    {
        parent::__construct("prize");
        $this->prize_id = $prize_id;
    }

    public function getPrizeNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加奖品
     * @author 姜伟
     * @param array $arr_class 奖品数组
     * @return boolean 操作结果
     * @todo 添加奖品
     */
    public function addPrize($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除奖品
     * @author 姜伟
     * @param string $class_id 奖品ID
     * @return boolean 操作结果
     * @todo 删除奖品
     */
    public function delPrize()
    {
        if (!is_numeric($this->prize_id)) return false;
        return $this->where('prize_id = ' . $this->prize_id)->setField('isuse', 2);
    }

    /**
     * 更改奖品
     * @author 姜伟
     * @param int $class_id 奖品ID
     * @param array $arr_class 奖品数组
     * @return boolean 操作结果
     * @todo 更改奖品
     */
    public function setPrize($prize_id, $arr)
    {
        if (!is_numeric($prize_id) || !is_array($arr)) return false;
        return $this->where('prize_id = ' . $prize_id)->save($arr);
    }

    /**
     * 获取奖品
     * @author 姜伟
     * @param int $class_id 奖品ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 奖品
     * @todo 获取奖品
     */
    public function getPrizeInfo($prize_id, $fields = null)
    {
        if (!is_numeric($prize_id))   return false;
        return $this->field($fields)->where('prize_id = ' . $prize_id)->find();
    }

    /**
     * 获取奖品某个字段的信息
     * @author 姜伟
     * @param int $class_id 奖品ID
     * @param string $field 查询的字段名
     * @return array 奖品
     * @todo 获取奖品某个字段的信息
     */
    public function getPrizeField($prize_id, $field)
    {
        if (!is_numeric($prize_id))   return false;
        return $this->where('prize_id = ' . $prize_id)->getField($field);
    }

    /**
     * 获取所有奖品列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 奖品列表
     * @todo 获取所有奖品列表
     */
    public function getPrizeList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($prize_list)
    {
        foreach($prize_list AS $k=>$v) {
        }

        return $prize_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getPrizeInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
