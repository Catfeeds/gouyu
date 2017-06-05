<?php 
//商品兑换类
class FrontMallAction extends FrontAction
{
    function _initialize()
    {
		parent::_initialize();
        $this->per_page_num = 4;
    }

    /**
     * 商城首页
     * @author wzg
     */
    public function mall()
    {
        //轮播图
        $cust_flash_obj = new CustFlashModel();
        $cust_flash_list = $cust_flash_obj->getCustFlashList('', 'isuse = 1', 'serial');

        //分类信息
        $class_obj = new ClassModel();
        $class_list = $class_obj->getClassList('', 'isuse = 1', 'serial', 4);

        //商品信息
        $item_obj = new ItemModel();
        $class_item_list = $class_list;
        foreach ($class_item_list AS $k=>$v) {
            $class_item_list[$k]['item_list'] = $item_obj->getItemListGroupByWhere('class_id = ' . $v['class_id'], 4);
        }
//trace($class_item_list);
        //dump($class_item_list);die;

        //公告 
        $where = 'notice_sort_id = 1 AND isuse = 1';
        $notice_obj = new NoticeBaseModel();
        $notice_id = $notice_obj->where($where)->order('addtime DESC')->getField('notice_id');
        $content = $notice_obj->getNoticeContents($notice_id);
        $this->assign('content', $content);

        $this->assign('head_title', '商城首页');
        $this->assign('cust_flash_list', $cust_flash_list);
        $this->assign('class_list', $class_list);
        $this->assign('class_item_list', $class_item_list);
        $this->display();
    }

    /**
     * 兑换规则
     * wzg
     */
    public function exchange_rule()
    {
        $where = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::EXCHANGE_RULE;
        $article_obj = new GeneralArticleModel();
        $contents = $article_obj->getSpecialArticleContent($where);

        $this->assign('contents', $contents);
        $this->assign('head_title', '兑换规则');
        $this->display(APP_PATH . '/Tpl/FrontTreasure/treasure_rule.html');
    }

    /**
     * 一级分类下内容
     * wzg
     */
    public function class_mall()
    {
        $class_id = I('get.class_id', 0, 'int');
        if (!$class_id) $this->alert('出错了，请稍后再试', '/FrontItem/mall');

        $where = 'class_id = ' . $class_id . ' AND isuse = 1 AND stock > 0';
        $sort_id = I('get.sort_id', 0, 'int');
        if ($sort_id) {
            $this->assign('sort_id', $sort_id);
            $where .= ' AND sort_id = ' . $sort_id;
            $this->assign('redirect_url', '/FrontMall/class_mall/class_id/'. $class_id . '/sort_id/' . $sort_id);
        } else {
            $this->assign('redirect_url', '/FrontMall/class_mall/class_id/'. $class_id);
        }

        //排序
        $type = I('type', 0, 'int');
        $this->assign('type', $type);
        $orderby = 'serial, addtime DESC';
        switch ($type) 
        {
        case 1: 
            //$orderby = 'serial';
            break;
        case 2: 
            $orderby = 'addtime';
            break;
        case 3: 
            $orderby = 'sales_num';
            break;
        case 4: 
            $orderby = 'mall_price';
            break;
        }
        $up = I('up', 0, 'int');
        $this->assign('up', $up);
        if ($up && $type !=1) {
            $orderby .= ' DESC';
        }

        //商品信息
        $item_obj = new ItemModel();
        $item_obj->setStart(0);
        $item_obj->setLimit(10000);
        $item_list = $item_obj->getItemList('', $where, $orderby);
        $item_list = $item_obj->getListData($item_list);
        //dump($item_list);die;

        //二级分类列表
        $sort_list = M('Sort')->where('isuse = 1 AND class_id = ' . $class_id)->order('serial')->select();

        // class_name
        $class_name = M('Class')->where('class_id = ' . $class_id)->getField('class_name');
        $this->assign('class_name', $class_name);

        $this->assign('class_id', $class_id);
        $this->assign('item_list', $item_list);
        $this->assign('sort_list', $sort_list);
        $this->assign('head_title', '商城分类专区');
        $this->display();
    }

    /**
     * 商品详情
     * wzg
     */
    public function item_detail()
    {
        $item_id = I('get.item_id', 0, 'int');

        $item_obj = new ItemModel($item_id);
        $item_info = $item_obj->getItemInfo('item_id = ' . $item_id);
		$this->assign('item_id', $item_id);
		
		if (!$item_info)
		{
			$redirect = U('/FrontItem/mall');
			$this->alert('对不起，商品不存在！', $redirect);
		}

		//获取商品中图，购物车页，商品详情页都使用该图
		require_cache('Common/func_item.php');
		$item_info['small_pic'] = middle_img($item_info['base_pic']);
		$this->assign('item_info', $item_info);
		#echo "<pre>";print_r($item_info);die;
		//商品图片
		$item_photo_obj = new ItemPhotoModel();
		$item_photo_list = $item_photo_obj->getPhotos($item_id);
		$this->assign('item_photo_list', $item_photo_list);
		#echo "<pre>";print_r($item_photo_list);die;
     
        //兑换规则
        $where = 'article_sort_id = ' . GeneralArticleModel::RULE . ' AND rule_type = ' . GeneralArticleModel::EXCHANGE_RULE;
        $article_obj = new GeneralArticleModel();
        $contents = $article_obj->getSpecialArticleContent($where);

		//商品详情描述
		$item_txt_obj = new ItemTxtModel();
		$item_txt = html_entity_decode(stripslashes($item_txt_obj->getItemTxt($item_id)));		//商品详情
		$item_txt = preg_replace("/\\\&quot;/", "", $item_txt);               //商品详情
		$this->assign('item_txt', $item_txt);

        //left_money
        $user_id = intval(session('user_id'));
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        $this->assign('left_money', $left_money);

        //用户的游戏账号
        $user_id = intval(session('user_id'));
        $user_game_list = D('UserGame')->getUserGameList('', 'user_id = ' . $user_id, 'addtime DESC');
        $user_game_list = D('UserGame')->getListData($user_game_list);
        $game_list = D('Game')->getGameList('', 'isuse = 1', 'serial');

        //用户地址
        $user_address_obj = new UserAddressModel();
        $user_address_list = $user_address_obj->getUserAddressList('', 'isuse = 1 AND user_id = ' . $user_id, 'addtime DESC');
        $user_address_list = $user_address_obj->getListData($user_address_list);

        //省
        $province_list = M('AddressProvince')->select();
        $this->assign('province_list', $province_list);

        //是否已关闭
        $is_open = ConfigBaseModel::is_recharge_time(2);
        $this->assign('is_open', $is_open);

        $this->assign('item_info', $item_info);
        $this->assign('contents', $contents);
        $this->assign('head_title', '商品详情');
        $this->assign('user_game_list', $user_game_list);
        $this->assign('game_list', $game_list);
        $this->assign('user_address_list', $user_address_list);
        $this->display();
    }


    /**
     * 兑换商品
     * wzg
     */
    public function exchange_item()
    {
        $return_arr = array(
            'code' => 400,
            'msg'  => '出错了，请稍后再试'
        );

        //是否可以兑换
        $is_open = ConfigBaseModel::is_recharge_time(2);
        if (!$is_open) {
            $close_message = $GLOBALS['config_info']['CLOSE_EXCHANGE_ALERT'];

            $return_arr['msg'] = $close_message;
            exit(json_encode($return_arr));
        }

        $user_id = intval(session('user_id'));

        $type = I('type', 0, 'int');
        $item_id = I('item_id', 0, 'int');
        $item_num = I('item_num', 0, 'int');
        if (!$item_id || $item_num <= 0) 
        {
            exit(json_encode($return_arr));
        }

        $item_obj = new ItemModel();
        $item_info = $item_obj->getItemInfo('item_id = ' . $item_id);
        if (!$item_info) 
        {
            exit(json_encode($return_arr));
        }

        //库存是否足够
        if ($item_info['stock'] <= $item_num) {
            $return_arr['msg'] = '库存不足，手慢了';
            exit(json_encode($return_arr));
        }

        //余额是否足够
        $user_obj = new UserModel($user_id);
        $left_money = $user_obj->getLeftMoney();
        $total_amount = $item_info['mall_price'] * $item_num;
        if ($left_money < $total_amount) {
            $return_arr['code'] = '401';
            $return_arr['msg'] = '余额不足';
            exit(json_encode($return_arr));
        }

        //实物
        if (!$item_info['is_real']) {
            $address_info = FrontTreasureAction::check_game_account($user_id);

            if (strpos($address_info['steam_url'], 'https://steamcommunity.com/tradeoffer') === false) {
                $return_arr['msg'] = '您填写的steam URL格式不正确';
                exit(json_encode($return_arr));
            }
        } else {
            $address_info = $this->check_address($user_id);
        }

        //订单信息数组
        $arr = array(
            'pay_amount'		=> $total_amount,
            'total_amount'		=> $total_amount,
            'need_deliever'		=> $item_info['is_real'] ? 1 : 0,
        );

        $item_info['item_num'] = $item_num;
        $item_info['real_price'] = $item_info['mall_price'];
        $item_info['cost_price'] = $total_amount;

        $order_obj = new OrderModel();
        $order_id = $order_obj->addOrder($arr, $item_info, $address_info);

        //付款
        $account_obj = new AccountModel();
        $success = $account_obj->addAccount($user_id, AccountModel::ORDER_COST, $total_amount * -1,'兑换支付', $order_id);

        $return_arr['code'] = '500';
        $return_arr['order_id'] = $order_id;
        $return_arr['msg'] = '兑换成功';
        exit(json_encode($return_arr));

        exit(json_encode($return_arr));
    }

    //验证地址
    private function check_address($user_id)
    {
        $type = I('type', 0, 'int');
        if ($type == 1) {
            $user_address_id = I('user_address_id', 0, 'int');
            if (!$user_address_id) exit('failure');

            $user_address_info = D('UserAddress')->where('user_address_id = ' . $user_address_id . ' AND user_id = ' . $user_id)->find();
            if (!$user_address_info) exit('failure');

            return $user_address_info;
        } else {
            $realname = I('realname', '', 'strip_tags');
            $mobile = I('mobile', '', 'strip_tags');
            $province_id = I('province_id', 0, 'int');
            $city_id = I('city_id', 0, 'int');
            $area_id = I('area_id', 0, 'int');
            $address = I('address', '', 'strip_tags');
            $save_address = I('save_address', 0, 'int');
            if (!$realname || !$mobile || !$province_id || !$city_id || !$area_id || !$address) exit('请把地址填写完整');

            $user_address_arr = array(
                'realname' => $realname,
                'mobile' => $mobile,
                'province_id' => $province_id,
                'city_id' => $city_id,
                'area_id' => $area_id,
                'address' => $address,
            );
            //是否保存
            if ($save_address) {
                $user_address_arr['addtime'] = NOW_TIME;
                $user_address_arr['user_id'] = $user_id;
                $user_address_arr['isuse'] = 1;
                D('UserAddress')->add($user_address_arr);
            }

            return $user_address_arr;
        }
    }
}
