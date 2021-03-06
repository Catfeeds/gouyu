<?php
/**
 * 每局问题模型类
 */

class GuessFieldQuestionModel extends Model
{
    private $guess_field_question_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_field_question_id=0)
    {
        parent::__construct("guess_field_question");
        $this->guess_field_question_id = $guess_field_question_id;
    }

    public function getGuessFieldQuestionNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加每局问题
     * @author 姜伟
     * @param array $arr_class 每局问题数组
     * @return boolean 操作结果
     * @todo 添加每局问题
     */
    public function addGuessFieldQuestion($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除每局问题
     * @author 姜伟
     * @param string $class_id 每局问题ID
     * @return boolean 操作结果
     * @todo 删除每局问题
     */
    public function delGuessFieldQuestion()
    {
        if (!is_numeric($this->guess_field_question_id)) return false;
        return $this->where('guess_field_question_id = ' . $this->guess_field_question_id)->setField('isuse', 2);
    }

    /**
     * 更改每局问题
     * @author 姜伟
     * @param int $class_id 每局问题ID
     * @param array $arr_class 每局问题数组
     * @return boolean 操作结果
     * @todo 更改每局问题
     */
    public function setGuessFieldQuestion($guess_field_question_id, $arr)
    {
        if (!is_numeric($guess_field_question_id) || !is_array($arr)) return false;
        return $this->where('guess_field_question_id = ' . $guess_field_question_id)->save($arr);
    }

    /**
     * 获取每局问题
     * @author 姜伟
     * @param int $class_id 每局问题ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 每局问题
     * @todo 获取每局问题
     */
    public function getGuessFieldQuestionInfo($guess_field_question_id, $fields = null)
    {
        if (!is_numeric($guess_field_question_id))   return false;
        return $this->field($fields)->where('guess_field_question_id = ' . $guess_field_question_id)->find();
    }

    /**
     * 获取每局问题某个字段的信息
     * @author 姜伟
     * @param int $class_id 每局问题ID
     * @param string $field 查询的字段名
     * @return array 每局问题
     * @todo 获取每局问题某个字段的信息
     */
    public function getGuessFieldQuestionField($guess_field_question_id, $field)
    {
        if (!is_numeric($guess_field_question_id))   return false;
        return $this->where('guess_field_question_id = ' . $guess_field_question_id)->getField($field);
    }

    /**
     * 获取所有每局问题列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 每局问题列表
     * @todo 获取所有每局问题列表
     */
    public function getGuessFieldQuestionList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_field_question_list)
    {
        $user_id = intval(session('user_id'));
        $guess_user_obj = new GuessUserModel();

        foreach($guess_field_question_list AS $k=>$v) {
            //所在局名称
            $guess_field_info = M('GuessField')->where('guess_field_id = ' . $v['guess_field_id'])->find();
            $guess_field_question_list[$k]['guess_field_name'] = $guess_field_info['guess_field_name'];

            //是否让分局或者大小分局
            $guess_field_question_list[$k]['field_type'] = $guess_field_info['field_type'];

            //总比分
            $guess_info = D('Guess')->getGuessInfo($guess_field_info['guess_id']);
            $guess_field_question_list[$k]['host_score'] = $guess_info['host_score'];
            $guess_field_question_list[$k]['guest_score'] = $guess_info['guest_score'];

            //所在竞猜
            $guess_field_question_list[$k]['guess_name'] = $guess_info['guess_name'];

            //问题
            if ($v['guess_question']) {
                $guess_field_question_list[$k]['question'] = $v['guess_question'];
            } else {
                $guess_field_question_list[$k]['question'] = M('GuessQuestion')->where('guess_question_id = ' . $v['guess_question_id'])->getField('desc');
            }

            //竞猜人数
            $guess_field_question_list[$k]['join_people'] = $guess_user_obj->where('guess_field_question_id = ' . $v['guess_field_question_id'])
                ->count();

            //用户个人对两队的投注金额
            $where = 'user_id = ' . $user_id . ' AND guess_field_question_id = ' . $v['guess_field_question_id'];
            $host_bat_info = $guess_user_obj->field('sum(add_money) AS host_bat_money')
                ->where($where . ' AND team_type = 1')
                ->find();
            $guess_field_question_list[$k]['host_bat_money'] = $host_bat_info['host_bat_money'];

            $guest_bat_info = $guess_user_obj->field('sum(add_money) AS guest_bat_money')
                ->where($where . ' AND team_type = 2')
                ->find();
            $guess_field_question_list[$k]['guest_bat_money'] = $guest_bat_info['guest_bat_money'];

            //是否已取消过投注
            $guess_field_question_list[$k]['is_cancel_bat'] = M('GuessBatReback')->where($where)->count();
        }

        //dump($guess_field_question_list);die;
        return $guess_field_question_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessFieldQuestionInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
