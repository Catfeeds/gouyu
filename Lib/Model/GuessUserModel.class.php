<?php
/**
 * 竞猜用户模型类
 */

class GuessUserModel extends Model
{
    private $guess_user_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($guess_user_id=0)
    {
        parent::__construct("guess_user");
        $this->guess_user_id = $guess_user_id;
    }

    public function getGuessUserNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加竞猜用户
     * @author 姜伟
     * @param array $arr_class 竞猜用户数组
     * @return boolean 操作结果
     * @todo 添加竞猜用户
     */
    public function addGuessUser($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除竞猜用户
     * @author 姜伟
     * @param string $class_id 竞猜用户ID
     * @return boolean 操作结果
     * @todo 删除竞猜用户
     */
    public function delGuessUser()
    {
        if (!is_numeric($this->guess_user_id)) return false;
        return $this->where('guess_user_id = ' . $this->guess_user_id)->setField('isuse', 2);
    }

    /**
     * 更改竞猜用户
     * @author 姜伟
     * @param int $class_id 竞猜用户ID
     * @param array $arr_class 竞猜用户数组
     * @return boolean 操作结果
     * @todo 更改竞猜用户
     */
    public function setGuessUser($guess_user_id, $arr)
    {
        if (!is_numeric($guess_user_id) || !is_array($arr)) return false;
        return $this->where('guess_user_id = ' . $guess_user_id)->save($arr);
    }

    /**
     * 获取竞猜用户
     * @author 姜伟
     * @param int $class_id 竞猜用户ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 竞猜用户
     * @todo 获取竞猜用户
     */
    public function getGuessUserInfo($guess_user_id, $fields = null)
    {
        if (!is_numeric($guess_user_id))   return false;
        return $this->field($fields)->where('guess_user_id = ' . $guess_user_id)->find();
    }

    /**
     * 获取竞猜用户某个字段的信息
     * @author 姜伟
     * @param int $class_id 竞猜用户ID
     * @param string $field 查询的字段名
     * @return array 竞猜用户
     * @todo 获取竞猜用户某个字段的信息
     */
    public function getGuessUserField($guess_user_id, $field)
    {
        if (!is_numeric($guess_user_id))   return false;
        return $this->where('guess_user_id = ' . $guess_user_id)->getField($field);
    }

    /**
     * 获取所有竞猜用户列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 竞猜用户列表
     * @todo 获取所有竞猜用户列表
     */
    public function getGuessUserList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($guess_user_list)
    {
        foreach($guess_user_list AS $k=>$v) {
            //用户昵称
            $user_obj = new UserModel($v['user_id']);
            $user_info = $user_obj->getUserInfo('nickname, realname, username, headimgurl, id');
            $guess_user_list[$k]['nickname'] = $user_info['nickname'];
            $guess_user_list[$k]['headimgurl'] = $user_info['headimgurl'];
            $guess_user_list[$k]['ajax_addtime'] = date('Y-m-d H:i:s', $v['addtime']);
            $guess_user_list[$k]['id'] = $user_info['id'];

            //队伍信息and odds 
            if ($v['guess_id']) {
                $guess_info = D('Guess')->getGuessInfo($v['guess_id']);
                $guess_user_list[$k]['host_team'] = $guess_info['host_team'];
                $guess_user_list[$k]['guest_team'] = $guess_info['guest_team'];
                $guess_user_list[$k]['host_team_name'] = M('Team')->where('team_id = ' . $guess_info['host_team'])->getField('team_name');
                $guess_user_list[$k]['guest_team_name'] = M('Team')->where('team_id = ' . $guess_info['guest_team'])->getField('team_name');
            }
            //odds
            if ($v['guess_field_question_id']) {
                $guess_field_question_info = D('GuessFieldQuestion')->getGuessFieldQuestionInfo($v['guess_field_question_id']);
                $guess_user_list[$k]['host_odds'] = $guess_field_question_info['host_odds'];
                $guess_user_list[$k]['guest_odds'] = $guess_field_question_info['guest_odds'];
                $guess_user_list[$k]['result'] = $guess_field_question_info['result'];
                $guess_user_list[$k]['defind_team_name'] = $guess_field_question_info['defind_team_name'];
                $guess_user_list[$k]['defind_host_name'] = $guess_field_question_info['defind_host_name'];
                $guess_user_list[$k]['defind_guest_name'] = $guess_field_question_info['defind_guest_name'];
                $guess_user_list[$k]['lose_type'] = $guess_field_question_info['lose_type'];
                $guess_user_list[$k]['lose_score'] = $guess_field_question_info['lose_score'];

                if ($guess_field_question_info['guess_question']) {
                    $guess_user_list[$k]['guess_question'] = $guess_field_question_info['guess_question'];
                } else {
                    $guess_user_list[$k]['guess_question'] = M('GuessQuestion')
                        ->where('guess_question_id = ' . $guess_field_question_info['guess_question_id'])
                        ->getField('desc');

                }

                //局类型及显示
                $guess_user_list[$k]['field_type'] = M('GuessField')
                    ->where('guess_field_id = ' . $guess_field_question_info['guess_field_id'])
                    ->getField('field_type');
            }

            //是否中奖
            //$team_id = $guess_field_question_info['result'] == 1 ? $guess_info['host_team'] : $guess_info['guest_team'];
            //if ($v['is_prize'] && $v['team_type'] == $guess_field_question_info['result'] && $team_id == $v['team_id']) {
            //    //计算奖金
            //    $guess_user_list[$k]['award_money'] = floatval($v['add_money'] * $v['odds']);
            //}

        }

        return $guess_user_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getGuessUserInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }


    //赔率计算
    //wzg
    public function cal_odds($host_money, $guest_money)
    {
        //初始值
        $arr = array(
            'host_odds'  => 1.00,
            'guest_odds' => 1.00 
        );
        if (!$host_money || !$guest_money)  return $arr;

        //抽水1%
        $config_obj = new ConfigBaseModel();
        $draw_prop = $config_obj->getConfig('draw_prop');
        //各自所占的比例
        $total_money = $host_money + $guest_money;
        //$host_prop = $host_money / $total_money;
        //$guest_prop = $guest_money / $total_money;

        //减去抽水后的金额
        $left_money = $total_money * (100 - $draw_prop) / 100;
        //dump($left_money);die;
        //$left_host_money = $left_money * $host_prop;
        //$left_guest_money = $left_money * $guest_prop;

        //各自所得赔率
        //向下取
        if ($guest_money > 0) $guest_odds = floor(floatval($left_money / $guest_money) * 100) / 100;
        if ($host_money > 0) $host_odds = floor(floatval($left_money / $host_money) * 100) /100;

        $arr['host_odds'] = $host_odds ? $host_odds : 1.00;
        $arr['guest_odds'] = $guest_odds ? $guest_odds : 1.00;

        return $arr;
    }

}
