<?php
/**
 * 队伍模型类
 */

class TeamModel extends Model
{
    private $team_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($team_id=0)
    {
        parent::__construct("team");
        $this->team_id = $team_id;
    }

    public function getTeamNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加队伍
     * @author 姜伟
     * @param array $arr_class 队伍数组
     * @return boolean 操作结果
     * @todo 添加队伍
     */
    public function addTeam($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除队伍
     * @author 姜伟
     * @param string $class_id 队伍ID
     * @return boolean 操作结果
     * @todo 删除队伍
     */
    public function delTeam()
    {
        if (!is_numeric($this->team_id)) return false;
        return $this->where('team_id = ' . $this->team_id)->setField('isuse', 2);
    }

    /**
     * 更改队伍
     * @author 姜伟
     * @param int $class_id 队伍ID
     * @param array $arr_class 队伍数组
     * @return boolean 操作结果
     * @todo 更改队伍
     */
    public function setTeam($team_id, $arr)
    {
        if (!is_numeric($team_id) || !is_array($arr)) return false;
        return $this->where('team_id = ' . $team_id)->save($arr);
    }

    /**
     * 获取队伍
     * @author 姜伟
     * @param int $class_id 队伍ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 队伍
     * @todo 获取队伍
     */
    public function getTeamInfo($team_id, $fields = null)
    {
        if (!is_numeric($team_id))   return false;
        return $this->field($fields)->where('team_id = ' . $team_id)->find();
    }

    /**
     * 获取队伍某个字段的信息
     * @author 姜伟
     * @param int $class_id 队伍ID
     * @param string $field 查询的字段名
     * @return array 队伍
     * @todo 获取队伍某个字段的信息
     */
    public function getTeamField($team_id, $field)
    {
        if (!is_numeric($team_id))   return false;
        return $this->where('team_id = ' . $team_id)->getField($field);
    }

    /**
     * 获取所有队伍列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 队伍列表
     * @todo 获取所有队伍列表
     */
    public function getTeamList($field, $where = null, $order, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($team_list)
    {
        $guess_type_obj = new GuessTypeModel();
        foreach($team_list AS $k=>$v) {
            //竞猜类型
            $team_list[$k]['guess_type_name'] = $guess_type_obj->where('guess_type_id = ' . $v['guess_type_id'])->getField('guess_type_name');
        }

        return $team_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getTeamInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
