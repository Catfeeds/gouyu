<?php
/**
 * 冠军队伍模型类
 */

class GuessChampionTeamModel extends Model
{
    private $guess_champion_team_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_champion_team_id=0)
    {
        parent::__construct("guess_champion_team");
        $this->guess_champion_team_id = $guess_champion_team_id;
    }

    public function getGuessChampionTeamNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加冠军队伍
     * @author 姜伟
     * @param array $arr_class 冠军队伍数组
     * @return boolean 操作结果
     * @todo 添加冠军队伍
     */
    public function addGuessChampionTeam($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除冠军队伍
     * @author 姜伟
     * @param string $class_id 冠军队伍ID
     * @return boolean 操作结果
     * @todo 删除冠军队伍
     */
    public function delGuessChampionTeam()
    {
        if (!is_numeric($this->guess_champion_team_id)) return false;
        return $this->where('guess_champion_team_id = ' . $this->guess_champion_team_id)->delete();
    }

    /**
     * 更改冠军队伍
     * @author 姜伟
     * @param int $class_id 冠军队伍ID
     * @param array $arr_class 冠军队伍数组
     * @return boolean 操作结果
     * @todo 更改冠军队伍
     */
    public function setGuessChampionTeam($guess_champion_team_id, $arr)
    {
        if (!is_numeric($guess_champion_team_id) || !is_array($arr)) return false;
        return $this->where('guess_champion_team_id = ' . $guess_champion_team_id)->save($arr);
    }

    /**
     * 获取冠军队伍
     * @author 姜伟
     * @param int $class_id 冠军队伍ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 冠军队伍
     * @todo 获取冠军队伍
     */
    public function getGuessChampionTeamInfo($guess_champion_team_id, $fields = null)
    {
        if (!is_numeric($guess_champion_team_id))   return false;
        return $this->field($fields)->where('guess_champion_team_id = ' . $guess_champion_team_id)->find();
    }

    /**
     * 获取冠军队伍某个字段的信息
     * @author 姜伟
     * @param int $class_id 冠军队伍ID
     * @param string $field 查询的字段名
     * @return array 冠军队伍
     * @todo 获取冠军队伍某个字段的信息
     */
    public function getGuessChampionTeamField($guess_champion_team_id, $field)
    {
        if (!is_numeric($guess_champion_team_id))   return false;
        return $this->where('guess_champion_team_id = ' . $guess_champion_team_id)->getField($field);
    }

    /**
     * 获取所有冠军队伍列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 冠军队伍列表
     * @todo 获取所有冠军队伍列表
     */
    public function getGuessChampionTeamList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_champion_team_list)
    {
        $team_obj = new TeamModel();
        foreach($guess_champion_team_list AS $k=>$v) {
            //队伍名称
            $team_info = $team_obj->getTeamInfo($v['team_id']);
            $guess_champion_team_list[$k]['team_name'] = $team_info['team_name'];
            $guess_champion_team_list[$k]['team_logo'] = $team_info['team_logo'];

            //所属竞猜
            $guess_champion_team_list[$k]['guess_champion_title'] = M('GuessChampion')->where('guess_champion_id  = ' . $v['guess_champion_id'])->getField('title');
        }

        return $guess_champion_team_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessChampionTeamInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
