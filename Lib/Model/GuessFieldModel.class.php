<?php
/**
 * 竞猜局数模型类
 */

class GuessFieldModel extends Model
{
    private $guess_field_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_field_id=0)
    {
        parent::__construct("guess_field");
        $this->guess_field_id = $guess_field_id;
    }

    public function getGuessFieldNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加竞猜局数
     * @author 姜伟
     * @param array $arr_class 竞猜局数数组
     * @return boolean 操作结果
     * @todo 添加竞猜局数
     */
    public function addGuessField($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除竞猜局数
     * @author 姜伟
     * @param string $class_id 竞猜局数ID
     * @return boolean 操作结果
     * @todo 删除竞猜局数
     */
    public function delGuessField()
    {
        if (!is_numeric($this->guess_field_id)) return false;
        return $this->where('guess_field_id = ' . $this->guess_field_id)->delete();
    }

    /**
     * 更改竞猜局数
     * @author 姜伟
     * @param int $class_id 竞猜局数ID
     * @param array $arr_class 竞猜局数数组
     * @return boolean 操作结果
     * @todo 更改竞猜局数
     */
    public function setGuessField($guess_field_id, $arr)
    {
        if (!is_numeric($guess_field_id) || !is_array($arr)) return false;
        return $this->where('guess_field_id = ' . $guess_field_id)->save($arr);
    }

    /**
     * 获取竞猜局数
     * @author 姜伟
     * @param int $class_id 竞猜局数ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 竞猜局数
     * @todo 获取竞猜局数
     */
    public function getGuessFieldInfo($guess_field_id, $fields = null)
    {
        if (!is_numeric($guess_field_id))   return false;
        return $this->field($fields)->where('guess_field_id = ' . $guess_field_id)->find();
    }

    /**
     * 获取竞猜局数某个字段的信息
     * @author 姜伟
     * @param int $class_id 竞猜局数ID
     * @param string $field 查询的字段名
     * @return array 竞猜局数
     * @todo 获取竞猜局数某个字段的信息
     */
    public function getGuessFieldField($guess_field_id, $field)
    {
        if (!is_numeric($guess_field_id))   return false;
        return $this->where('guess_field_id = ' . $guess_field_id)->getField($field);
    }

    /**
     * 获取所有竞猜局数列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 竞猜局数列表
     * @todo 获取所有竞猜局数列表
     */
    public function getGuessFieldList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_field_list)
    {
        foreach($guess_field_list AS $k=>$v) {
            $guess_field_list[$k]['guess_name'] = M('Guess')->where('guess_id = ' . $v['guess_id'])->getField('guess_name');

            //是否已开始
            //已开盘时不能投注
            $over = $this->checkOpen($v);
            
            $guess_field_list[$k]['over'] = $over;
        }

        return $guess_field_list;
    }

    /**
     * 检查此局是否可以投注
     * wzg
     * @var int is_start 操作按钮
     * @var int start_time 初始时的开盘时间
     */
    public static function checkOpen($info)
    {
        $guess_info = D('Guess')->getGuessInfos('guess_id = ' . $info['guess_id'], 'is_over');

        if (!$guess_info['is_over']) {
            if (!$info['is_over']) {
                //如果有is_start则直接判断
                if ($info['is_start']) {
                    if ($info['is_start'] == 1) {
                        $over = 'over';
                    } else {
                        $over = 'no_over';
                    }
                } else {
                    //没有则判断时间
                    if ($info['start_time'] <= NOW_TIME) {
                        $over = 'over';
                    } else {
                        $over = 'no_over';
                    }
                }
            } else {
                $over = 'over';
            }
        } else {
            $over = 'over';
        }

        return $over;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessFieldInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
