<?php
/**
 * 竞猜模型类
 */

class GuessModel extends Model
{
    private $guess_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_id=0)
    {
        parent::__construct("guess");
        $this->guess_id = $guess_id;
    }

    public function getGuessNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加竞猜
     * @author 姜伟
     * @param array $arr_class 竞猜数组
     * @return boolean 操作结果
     * @todo 添加竞猜
     */
    public function addGuess($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除竞猜
     * @author 姜伟
     * @param string $class_id 竞猜ID
     * @return boolean 操作结果
     * @todo 删除竞猜
     */
    public function delGuess()
    {
        if (!is_numeric($this->guess_id)) return false;
        return $this->where('guess_id = ' . $this->guess_id)->delete();
    }

    /**
     * 更改竞猜
     * @author 姜伟
     * @param int $class_id 竞猜ID
     * @param array $arr_class 竞猜数组
     * @return boolean 操作结果
     * @todo 更改竞猜
     */
    public function setGuess($guess_id, $arr)
    {
        if (!is_numeric($guess_id) || !is_array($arr)) return false;
        return $this->where('guess_id = ' . $guess_id)->save($arr);
    }

    /**
     * 获取竞猜
     * @author 姜伟
     * @param int $class_id 竞猜ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 竞猜
     * @todo 获取竞猜
     */
    public function getGuessInfo($guess_id, $fields = null)
    {
        if (!is_numeric($guess_id))   return false;
        return $this->field($fields)->where('guess_id = ' . $guess_id)->find();
    }

    /**
     * 获取竞猜某个字段的信息
     * @author 姜伟
     * @param int $class_id 竞猜ID
     * @param string $field 查询的字段名
     * @return array 竞猜
     * @todo 获取竞猜某个字段的信息
     */
    public function getGuessField($guess_id, $field)
    {
        if (!is_numeric($guess_id))   return false;
        return $this->where('guess_id = ' . $guess_id)->getField($field);
    }

    /**
     * 获取所有竞猜列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 竞猜列表
     * @todo 获取所有竞猜列表
     */
    public function getGuessList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_list)
    {
        $team_obj = new TeamModel();
        foreach($guess_list AS $k=>$v) {
            $host_team_info = $team_obj->getTeamInfo($v['host_team']);
            $guest_team_info = $team_obj->getTeamInfo($v['guest_team']);
            $guess_list[$k]['host_team_name'] = $host_team_info['team_name'];
            $guess_list[$k]['host_img_path'] = $host_team_info['team_logo'];
            $guess_list[$k]['guest_team_name'] = $guest_team_info['team_name'];
            $guess_list[$k]['guest_img_path'] = $guest_team_info['team_logo'];

            //取第一局的时间
            if ($v['first_field_time']) {
                $guess_list[$k]['ajax_start_time'] = date('m-d H:i', $v['first_field_time']);
            } else {
                $start_time = M('GuessField')->where('isuse = 1 AND guess_id = ' . $v['guess_id'])->order('serial')->getField('start_time');
                $start_time = $start_time ? $start_time : $v['start_time'];
                $guess_list[$k]['ajax_start_time'] = date('m-d H:i', $start_time);
            }

            //局数
            $guess_list[$k]['guess_field_num'] = M('GuessField')->where('isuse = 1 AND guess_id = ' . $v['guess_id'])->count();

            //是否结束，已开始，未开始
            if ($v['is_over'] == 1) {
                $over = 1;
            } else {
                if ($v['first_field_time'] <= NOW_TIME) {
                    $over = 2; //进行中
                } else {
                    $over = 3; //未开始
                }
            }
            $guess_list[$k]['over'] = $over;
        }

        return $guess_list;
        dump($guess_list);die;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
