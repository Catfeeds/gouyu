<?php
/**
 * 猜冠军用户模型类
 */

class GuessChampionUserModel extends Model
{
    private $guess_champion_user_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_champion_user_id=0)
    {
        parent::__construct("guess_champion_user");
        $this->guess_champion_user_id = $guess_champion_user_id;
    }

    public function getGuessChampionUserNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加猜冠军用户
     * @author 姜伟
     * @param array $arr_class 猜冠军用户数组
     * @return boolean 操作结果
     * @todo 添加猜冠军用户
     */
    public function addGuessChampionUser($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除猜冠军用户
     * @author 姜伟
     * @param string $class_id 猜冠军用户ID
     * @return boolean 操作结果
     * @todo 删除猜冠军用户
     */
    public function delGuessChampionUser()
    {
        if (!is_numeric($this->guess_champion_user_id)) return false;
        return $this->where('guess_champion_user_id = ' . $this->guess_champion_user_id)->delete();
    }

    /**
     * 更改猜冠军用户
     * @author 姜伟
     * @param int $class_id 猜冠军用户ID
     * @param array $arr_class 猜冠军用户数组
     * @return boolean 操作结果
     * @todo 更改猜冠军用户
     */
    public function setGuessChampionUser($guess_champion_user_id, $arr)
    {
        if (!is_numeric($guess_champion_user_id) || !is_array($arr)) return false;
        return $this->where('guess_champion_user_id = ' . $guess_champion_user_id)->save($arr);
    }

    /**
     * 获取猜冠军用户
     * @author 姜伟
     * @param int $class_id 猜冠军用户ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 猜冠军用户
     * @todo 获取猜冠军用户
     */
    public function getGuessChampionUserInfo($guess_champion_user_id, $fields = null)
    {
        if (!is_numeric($guess_champion_user_id))   return false;
        return $this->field($fields)->where('guess_champion_user_id = ' . $guess_champion_user_id)->find();
    }

    /**
     * 获取猜冠军用户某个字段的信息
     * @author 姜伟
     * @param int $class_id 猜冠军用户ID
     * @param string $field 查询的字段名
     * @return array 猜冠军用户
     * @todo 获取猜冠军用户某个字段的信息
     */
    public function getGuessChampionUserField($guess_champion_user_id, $field)
    {
        if (!is_numeric($guess_champion_user_id))   return false;
        return $this->where('guess_champion_user_id = ' . $guess_champion_user_id)->getField($field);
    }

    /**
     * 获取所有猜冠军用户列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 猜冠军用户列表
     * @todo 获取所有猜冠军用户列表
     */
    public function getGuessChampionUserList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_champion_user_list)
    {
        foreach($guess_champion_user_list AS $k=>$v) {
            //队伍名称
            $guess_champion_user_list[$k]['team_name'] = M('Team')->where('team_id = ' . $v['team_id'])->getField('team_name');

            //detail
            $guess_champion_info = D('GuessChampion')->getGuessChampionInfo($v['guess_champion_id']);
            $guess_champion_user_list[$k]['title'] = $guess_champion_info['title'];
            $guess_champion_user_list[$k]['is_over'] = $guess_champion_info['is_over'];
            $guess_champion_user_list[$k]['ajax_addtime'] = date('Y-m-d H:i:s', $v['addtime']);

            //胜出队情况
            if ($guess_champion_info['is_over']) {
                if ($guess_champion_info['result'] != -1) {
                    $win_team_info = D('GuessChampionTeam')->getGuessChampionTeamInfo($guess_champion_info['result']);
                    $guess_champion_user_list[$k]['win_team_name'] = M('Team')->where('team_id = ' . $win_team_info['team_id'])->getField('team_name');
                    $guess_champion_user_list[$k]['win_team_odds'] = $win_team_info['odds'];
                }
                $guess_champion_user_list[$k]['win_team_id'] = $guess_champion_info['result'];
            }
        }

        return $guess_champion_user_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessChampionUserInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
