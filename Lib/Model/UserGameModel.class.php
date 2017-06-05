<?php
/**
 * 用户游戏模型类
 */

class UserGameModel extends Model
{
    private $user_game_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($user_game_id=0)
    {
        parent::__construct("user_game");
        $this->user_game_id = $user_game_id;
    }

    public function getUserGameNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加用户游戏
     * @author 姜伟
     * @param array $arr_class 用户游戏数组
     * @return boolean 操作结果
     * @todo 添加用户游戏
     */
    public function addUserGame($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除用户游戏
     * @author 姜伟
     * @param string $class_id 用户游戏ID
     * @return boolean 操作结果
     * @todo 删除用户游戏
     */
    public function delUserGame()
    {
        if (!is_numeric($this->user_game_id)) return false;
        return $this->where('user_game_id = ' . $this->user_game_id)->delete();
    }

    /**
     * 更改用户游戏
     * @author 姜伟
     * @param int $class_id 用户游戏ID
     * @param array $arr_class 用户游戏数组
     * @return boolean 操作结果
     * @todo 更改用户游戏
     */
    public function setUserGame($user_game_id, $arr)
    {
        if (!is_numeric($user_game_id) || !is_array($arr)) return false;
        return $this->where('user_game_id = ' . $user_game_id)->save($arr);
    }

    /**
     * 获取用户游戏
     * @author 姜伟
     * @param int $class_id 用户游戏ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 用户游戏
     * @todo 获取用户游戏
     */
    public function getUserGameInfo($user_game_id, $fields = null)
    {
        if (!is_numeric($user_game_id))   return false;
        return $this->field($fields)->where('user_game_id = ' . $user_game_id)->find();
    }

    /**
     * 获取用户游戏某个字段的信息
     * @author 姜伟
     * @param int $class_id 用户游戏ID
     * @param string $field 查询的字段名
     * @return array 用户游戏
     * @todo 获取用户游戏某个字段的信息
     */
    public function getUserGameField($user_game_id, $field)
    {
        if (!is_numeric($user_game_id))   return false;
        return $this->where('user_game_id = ' . $user_game_id)->getField($field);
    }

    /**
     * 获取所有用户游戏列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 用户游戏列表
     * @todo 获取所有用户游戏列表
     */
    public function getUserGameList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($user_game_list)
    {
        foreach($user_game_list AS $k=>$v) {
            $user_game_list[$k]['game_name'] = D('Game')->getGameField($v['game_id'], 'game_name');
        }

        return $user_game_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getUserGameInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
