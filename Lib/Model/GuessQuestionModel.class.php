<?php
/**
 * 问题模型类
 */

class GuessQuestionModel extends Model
{
    private $guess_question_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_question_id=0)
    {
        parent::__construct("guess_question");
        $this->guess_question_id = $guess_question_id;
    }

    public function getGuessQuestionNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加问题
     * @author 姜伟
     * @param array $arr_class 问题数组
     * @return boolean 操作结果
     * @todo 添加问题
     */
    public function addGuessQuestion($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除问题
     * @author 姜伟
     * @param string $class_id 问题ID
     * @return boolean 操作结果
     * @todo 删除问题
     */
    public function delGuessQuestion()
    {
        if (!is_numeric($this->guess_question_id)) return false;
        return $this->where('guess_question_id = ' . $this->guess_question_id)->delete();
    }

    /**
     * 更改问题
     * @author 姜伟
     * @param int $class_id 问题ID
     * @param array $arr_class 问题数组
     * @return boolean 操作结果
     * @todo 更改问题
     */
    public function setGuessQuestion($guess_question_id, $arr)
    {
        if (!is_numeric($guess_question_id) || !is_array($arr)) return false;
        return $this->where('guess_question_id = ' . $guess_question_id)->save($arr);
    }

    /**
     * 获取问题
     * @author 姜伟
     * @param int $class_id 问题ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 问题
     * @todo 获取问题
     */
    public function getGuessQuestionInfo($guess_question_id, $fields = null)
    {
        if (!is_numeric($guess_question_id))   return false;
        return $this->field($fields)->where('guess_question_id = ' . $guess_question_id)->find();
    }

    /**
     * 获取问题某个字段的信息
     * @author 姜伟
     * @param int $class_id 问题ID
     * @param string $field 查询的字段名
     * @return array 问题
     * @todo 获取问题某个字段的信息
     */
    public function getGuessQuestionField($guess_question_id, $field)
    {
        if (!is_numeric($guess_question_id))   return false;
        return $this->where('guess_question_id = ' . $guess_question_id)->getField($field);
    }

    /**
     * 获取所有问题列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 问题列表
     * @todo 获取所有问题列表
     */
    public function getGuessQuestionList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_question_list)
    {
        foreach($guess_question_list AS $k=>$v) {
        }

        return $guess_question_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessQuestionInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
