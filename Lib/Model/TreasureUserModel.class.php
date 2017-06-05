<?php
/**
 * 夺宝用户模型类
 */

class TreasureUserModel extends Model
{
    private $treasure_user_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($treasure_user_id=0)
    {
        parent::__construct("treasure_user");
        $this->treasure_user_id = $treasure_user_id;
    }

    public function getTreasureUserNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加夺宝用户
     * @author 姜伟
     * @param array $arr_class 夺宝用户数组
     * @return boolean 操作结果
     * @todo 添加夺宝用户
     */
    public function addTreasureUser($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除夺宝用户
     * @author 姜伟
     * @param string $class_id 夺宝用户ID
     * @return boolean 操作结果
     * @todo 删除夺宝用户
     */
    public function delTreasureUser()
    {
        if (!is_numeric($this->treasure_user_id)) return false;
        return $this->where('treasure_user_id = ' . $this->treasure_user_id)->setField('isuse', 2);
    }

    /**
     * 更改夺宝用户
     * @author 姜伟
     * @param int $class_id 夺宝用户ID
     * @param array $arr_class 夺宝用户数组
     * @return boolean 操作结果
     * @todo 更改夺宝用户
     */
    public function setTreasureUser($treasure_user_id, $arr)
    {
        if (!is_numeric($treasure_user_id) || !is_array($arr)) return false;
        return $this->where('treasure_user_id = ' . $treasure_user_id)->save($arr);
    }

    /**
     * 获取夺宝用户
     * @author 姜伟
     * @param int $class_id 夺宝用户ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 夺宝用户
     * @todo 获取夺宝用户
     */
    public function getTreasureUserInfo($treasure_user_id, $fields = null)
    {
        if (!is_numeric($treasure_user_id))   return false;
        return $this->field($fields)->where('treasure_user_id = ' . $treasure_user_id)->find();
    }

    /**
     * 获取夺宝用户某个字段的信息
     * @author 姜伟
     * @param int $class_id 夺宝用户ID
     * @param string $field 查询的字段名
     * @return array 夺宝用户
     * @todo 获取夺宝用户某个字段的信息
     */
    public function getTreasureUserField($treasure_user_id, $field)
    {
        if (!is_numeric($treasure_user_id))   return false;
        return $this->where('treasure_user_id = ' . $treasure_user_id)->getField($field);
    }

    /**
     * 获取所有夺宝用户列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 夺宝用户列表
     * @todo 获取所有夺宝用户列表
     */
    public function getTreasureUserList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($treasure_user_list)
    {
        foreach($treasure_user_list AS $k=>$v) {
            //用户昵称
            $user_obj = new UserModel($v['user_id']);
            $user_info = $user_obj->getUserInfo('headimgurl, nickname');
            $treasure_user_list[$k]['nickname'] = $user_info['nickname'];
            $treasure_user_list[$k]['headimgurl'] = $user_info['headimgurl'];

            //treasure
            $treasure_info = D('Treasure')->getTreasureInfo($v['treasure_id']);
            $treasure_user_list[$k]['is_open'] = $treasure_info['is_open'];
            $treasure_user_list[$k]['periods'] = $treasure_info['periods'];
            $treasure_user_list[$k]['prize_id'] = $treasure_info['prize_id'];
            $treasure_user_list[$k]['lottery'] = $treasure_info['lottery'];

            //prize_info
            $prize_info = D('Prize')->getPrizeInfo($treasure_info['prize_id']);
            $treasure_user_list[$k]['prize_name'] = $prize_info['prize_name'];
            $treasure_user_list[$k]['img_path'] = $prize_info['img_path'];

            //is_prize
            if ($treasure_info['is_open'] && $treasure_info['lottery']) {
                $draw_prize_info = M('DrawPrize')->where('treasure_id = ' . $v['treasure_id'])->find();
                if ($v['user_id'] == $draw_prize_info['user_id'] && $draw_prize_info['lottery'] == $v['id'])
                {
                    $treasure_user_list[$k]['is_prize'] = 1;
                }
                $user_obj1 = new UserModel($draw_prize_info['user_id']);
                $user_info1 = $user_obj1->getUserInfo('nickname');
                $treasure_user_list[$k]['award_user_name'] = $user_info1['nickname'];
                $treasure_user_list[$k]['draw_prize_id'] = $draw_prize_info['draw_prize_id'];
                $treasure_user_list[$k]['award_user_id'] = $draw_prize_info['user_id'];
            }
        }

        return $treasure_user_list;
    }
 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getTreasureUserInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
