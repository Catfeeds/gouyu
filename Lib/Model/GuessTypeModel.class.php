<?php
/**
 * 竞猜类型模型类
 */

class GuessTypeModel extends Model
{
    private $guess_type_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_type_id=0)
    {
        parent::__construct("guess_type");
        $this->guess_type_id = $guess_type_id;
    }

    public function getGuessTypeNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加竞猜类型
     * @author 姜伟
     * @param array $arr_class 竞猜类型数组
     * @return boolean 操作结果
     * @todo 添加竞猜类型
     */
    public function addGuessType($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除竞猜类型
     * @author 姜伟
     * @param string $class_id 竞猜类型ID
     * @return boolean 操作结果
     * @todo 删除竞猜类型
     */
    public function delGuessType()
    {
        if (!is_numeric($this->guess_type_id)) return false;
        return $this->where('guess_type_id = ' . $this->guess_type_id)->delete();
    }

    /**
     * 更改竞猜类型
     * @author 姜伟
     * @param int $class_id 竞猜类型ID
     * @param array $arr_class 竞猜类型数组
     * @return boolean 操作结果
     * @todo 更改竞猜类型
     */
    public function setGuessType($guess_type_id, $arr)
    {
        trace($guess_type_id);
        if (!is_numeric($guess_type_id) || !is_array($arr)) return false;
        return $this->where('guess_type_id = ' . $guess_type_id)->save($arr);
    }

    /**
     * 获取竞猜类型
     * @author 姜伟
     * @param int $class_id 竞猜类型ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 竞猜类型
     * @todo 获取竞猜类型
     */
    public function getGuessTypeInfo($guess_type_id, $fields = null)
    {
        if (!is_numeric($guess_type_id))   return false;
        return $this->field($fields)->where('guess_type_id = ' . $guess_type_id)->find();
    }

    /**
     * 获取竞猜类型某个字段的信息
     * @author 姜伟
     * @param int $class_id 竞猜类型ID
     * @param string $field 查询的字段名
     * @return array 竞猜类型
     * @todo 获取竞猜类型某个字段的信息
     */
    public function getGuessTypeField($guess_type_id, $field)
    {
        if (!is_numeric($guess_type_id))   return false;
        return $this->where('guess_type_id = ' . $guess_type_id)->getField($field);
    }

    /**
     * 获取所有竞猜类型列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 竞猜类型列表
     * @todo 获取所有竞猜类型列表
     */
    public function getGuessTypeList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_type_list)
    {
        foreach($guess_type_list AS $k=>$v) {
            //是否有未开始或已开始比赛
            $where = 'guess_type_id = ' . $v['guess_type_id'] . ' AND is_over = 0';
            $guess_type_list[$k]['can_guess'] = M('Guess')->where($where)->count();
        }

        return $guess_type_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessTypeInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
