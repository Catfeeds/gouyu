<?php
/**
 * 游戏模型类
 */

class GameModel extends Model
{
    private $game_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($game_id=0)
    {
        parent::__construct("game");
        $this->game_id = $game_id;
    }

    public function getGameNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加游戏
     * @author 姜伟
     * @param array $arr_class 游戏数组
     * @return boolean 操作结果
     * @todo 添加游戏
     */
    public function addGame($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除游戏
     * @author 姜伟
     * @param string $class_id 游戏ID
     * @return boolean 操作结果
     * @todo 删除游戏
     */
    public function delGame()
    {
        if (!is_numeric($this->game_id)) return false;
        return $this->where('game_id = ' . $this->game_id)->setField('isuse', 2);
    }

    /**
     * 更改游戏
     * @author 姜伟
     * @param int $class_id 游戏ID
     * @param array $arr_class 游戏数组
     * @return boolean 操作结果
     * @todo 更改游戏
     */
    public function setGame($game_id, $arr)
    {
        if (!is_numeric($game_id) || !is_array($arr)) return false;
        return $this->where('game_id = ' . $game_id)->save($arr);
    }

    /**
     * 获取游戏
     * @author 姜伟
     * @param int $class_id 游戏ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 游戏
     * @todo 获取游戏
     */
    public function getGameInfo($game_id, $fields = null)
    {
        if (!is_numeric($game_id))   return false;
        return $this->field($fields)->where('game_id = ' . $game_id)->find();
    }

    /**
     * 获取游戏某个字段的信息
     * @author 姜伟
     * @param int $class_id 游戏ID
     * @param string $field 查询的字段名
     * @return array 游戏
     * @todo 获取游戏某个字段的信息
     */
    public function getGameField($game_id, $field)
    {
        if (!is_numeric($game_id))   return false;
        return $this->where('game_id = ' . $game_id)->getField($field);
    }

    /**
     * 获取所有游戏列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 游戏列表
     * @todo 获取所有游戏列表
     */
    public function getGameList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($game_list)
    {
        foreach($game_list AS $k=>$v) {
        }

        return $game_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGameInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
