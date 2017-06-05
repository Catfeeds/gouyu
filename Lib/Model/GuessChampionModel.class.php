<?php
/**
 * 猜冠军模型类
 */

class GuessChampionModel extends Model
{
    private $guess_champion_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_champion_id=0)
    {
        parent::__construct("guess_champion");
        $this->guess_champion_id = $guess_champion_id;
    }

    public function getGuessChampionNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加猜冠军
     * @author 姜伟
     * @param array $arr_class 猜冠军数组
     * @return boolean 操作结果
     * @todo 添加猜冠军
     */
    public function addGuessChampion($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除猜冠军
     * @author 姜伟
     * @param string $class_id 猜冠军ID
     * @return boolean 操作结果
     * @todo 删除猜冠军
     */
    public function delGuessChampion()
    {
        if (!is_numeric($this->guess_champion_id)) return false;
        return $this->where('guess_champion_id = ' . $this->guess_champion_id)->delete();
    }

    /**
     * 更改猜冠军
     * @author 姜伟
     * @param int $class_id 猜冠军ID
     * @param array $arr_class 猜冠军数组
     * @return boolean 操作结果
     * @todo 更改猜冠军
     */
    public function setGuessChampion($guess_champion_id, $arr)
    {
        if (!is_numeric($guess_champion_id) || !is_array($arr)) return false;
        return $this->where('guess_champion_id = ' . $guess_champion_id)->save($arr);
    }

    /**
     * 获取猜冠军
     * @author 姜伟
     * @param int $class_id 猜冠军ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 猜冠军
     * @todo 获取猜冠军
     */
    public function getGuessChampionInfo($guess_champion_id, $fields = null)
    {
        if (!is_numeric($guess_champion_id))   return false;
        return $this->field($fields)->where('guess_champion_id = ' . $guess_champion_id)->find();
    }

    /**
     * 获取猜冠军某个字段的信息
     * @author 姜伟
     * @param int $class_id 猜冠军ID
     * @param string $field 查询的字段名
     * @return array 猜冠军
     * @todo 获取猜冠军某个字段的信息
     */
    public function getGuessChampionField($guess_champion_id, $field)
    {
        if (!is_numeric($guess_champion_id))   return false;
        return $this->where('guess_champion_id = ' . $guess_champion_id)->getField($field);
    }

    /**
     * 获取所有猜冠军列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 猜冠军列表
     * @todo 获取所有猜冠军列表
     */
    public function getGuessChampionList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_champion_list)
    {
        foreach($guess_champion_list AS $k=>$v) {
        }

        return $guess_champion_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessChampionInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
