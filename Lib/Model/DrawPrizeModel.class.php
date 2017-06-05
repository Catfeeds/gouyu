<?php
/**
 * 中奖模型类
 */

class DrawPrizeModel extends Model
{
    private $draw_prize_id;
    /**
     * 构造函数
     * @author 姜伟
     * @todo 构造函数
     */
    public function __construct($draw_prize_id=0)
    {
        parent::__construct("draw_prize");
        $this->draw_prize_id = $draw_prize_id;
    }

    public function getDrawPrizeNum($where='') {
      return $this->where($where)->count();
    }

    /**
     * 添加中奖
     * @author 姜伟
     * @param array $arr_class 中奖数组
     * @return boolean 操作结果
     * @todo 添加中奖
     */
    public function addDrawPrize($arr)
    {
        if (!is_array($arr)) return false;
        return $this->add($arr);
    }

    /**
     * 删除中奖
     * @author 姜伟
     * @param string $class_id 中奖ID
     * @return boolean 操作结果
     * @todo 删除中奖
     */
    public function delDrawPrize()
    {
        if (!is_numeric($this->draw_prize_id)) return false;
        return $this->where('draw_prize_id = ' . $this->draw_prize_id)->setField('isuse', 2);
    }

    /**
     * 更改中奖
     * @author 姜伟
     * @param int $class_id 中奖ID
     * @param array $arr_class 中奖数组
     * @return boolean 操作结果
     * @todo 更改中奖
     */
    public function setDrawPrize($draw_prize_id, $arr)
    {
        if (!is_numeric($draw_prize_id) || !is_array($arr)) return false;
        return $this->where('draw_prize_id = ' . $draw_prize_id)->save($arr);
    }

    /**
     * 获取中奖
     * @author 姜伟
     * @param int $class_id 中奖ID
     * @param string $fields 查询的字段名，默认为空，取全部
     * @return array 中奖
     * @todo 获取中奖
     */
    public function getDrawPrizeInfo($draw_prize_id, $fields = null)
    {
        if (!is_numeric($draw_prize_id))   return false;
        return $this->field($fields)->where('draw_prize_id = ' . $draw_prize_id)->find();
    }

    /**
     * 获取中奖某个字段的信息
     * @author 姜伟
     * @param int $class_id 中奖ID
     * @param string $field 查询的字段名
     * @return array 中奖
     * @todo 获取中奖某个字段的信息
     */
    public function getDrawPrizeField($draw_prize_id, $field)
    {
        if (!is_numeric($draw_prize_id))   return false;
        return $this->where('draw_prize_id = ' . $draw_prize_id)->getField($field);
    }

    /**
     * 获取所有中奖列表
     * @author 姜伟
     * @param string $where where子句
     * @return array 中奖列表
     * @todo 获取所有中奖列表
     */
    public function getDrawPrizeList($field=null, $where = null, $order=null, $limit=null)
    {
        return $this->field($field)->where($where)->order($order)->limit($limit)->select();
    }

    public function getListData($draw_prize_list)
    {
        foreach($draw_prize_list AS $k=>$v) {
            //用户名
            $user_info = M('Users')->field('nickname, headimgurl')->where('user_id = ' . $v['user_id'])->find();
            $draw_prize_list[$k]['username'] = $user_info['nickname'];
            $draw_prize_list[$k]['nickname'] = $user_info['nickname'];
            $draw_prize_list[$k]['headimgurl'] = $user_info['headimgurl'];

            //奖品
            $prize_info = D('Prize')->getPrizeInfos('prize_id = ' . $v['prize_id'],'prize_name, img_path');
            $draw_prize_list[$k]['prize_name'] = $prize_info['prize_name'];
            $draw_prize_list[$k]['prize_logo'] = $prize_info['img_path'];

            //期数
            $treasure_info = M('Treasure')->field('periods, total_person_times')->where('treasure_id = ' . $v['treasure_id'])->find();
            $draw_prize_list[$k]['periods'] = $treasure_info['periods'];

            //总人次
            $draw_prize_list[$k]['total_person_times'] = $treasure_info['total_person_times'];

            //这个用户共参与多少人次
            $draw_prize_list[$k]['people_use_times'] = M('TreasureUser')->where('user_id = ' . $v['user_id'] . ' AND treasure_id = ' . $v['treasure_id'])->count();

            //时间
            $draw_prize_list[$k]['ajax_addtime'] = date('Y-m-d H:i:s', $v['addtime']);

            //账号与密码
            $treasure_user_info = M('TreasureUser')->where('treasure_user_id = ' . $v['treasure_user_id'])->find();
            $draw_prize_list[$k]['game_name']  = M('Game')->where('game_id = ' . $treasure_user_info['game_id'])->getField('game_name');
            $draw_prize_list[$k]['game_account']  = $treasure_user_info['game_account'];
            $draw_prize_list[$k]['steam_url']  = $treasure_user_info['steam_url'];

	    //夺宝成功率
	    //$times = D('TreasureUser')->getTreasureUserNum('user_id = ' . $v['user_id'] . ' AND treasure_id = ' . $v['treasure_id']);
	    //$rate = intval(($times / $treasure_info['total_person_times'])*10000) / 100;
	    //$draw_prize_list[$k]['award_rate']  = $rate;
	}

        return $draw_prize_list;
    }

      //夺宝成功率
      public function calRate()
      {
          $list = $this->getDrawPrizeList('', 'isuse = 1', '', 10000);
          $treasure_obj = new TreasureModel();
          foreach ($list AS $k=>$v) {
              $treasure_info = $treasure_obj->getTreasureInfo($v['treasure_id']);
              $times = D('TreasureUser')->getTreasureUserNum('user_id = ' . $v['user_id'] . ' AND treasure_id = ' . $v['treasure_id']);
              $rate = $times / $treasure_info['total_person_times'] * 100;
              $this->where('draw_prize_id = ' . $v['draw_prize_id'])->setField('award_rate', $rate);
          }
      }

 
    /**
     * 获取分类信息
     * @author 姜伟
     * @param string $where where子句
     * @param string $fields 要获取的字段名
     * @return array 商品基本信息
     * @todo 根据where查询条件查找商品表中的相关数据并返回
     */
    public function getDrawPrizeInfos($where, $fields = '')
    {
		return $this->field($fields)->where($where)->find();
    }
}
