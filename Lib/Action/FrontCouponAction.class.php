<?php
class FrontCouponAction extends FrontAction{
	function _initialize()
	{
		$this->item_num_per_account_page = C('ITEM_NUM_PER_ACCOUNT_PAGE');
	}

	//领取页面
	public function get_coupon()
    {
    	$user_id = intval(session('user_id'));
        if (IS_POST) {
            $vouchers_id = intval(I('post.id'));
            $card_code   = intval(I('post.card'));

            $vouchers_obj = new VouchersModel;
            $vouchers_info = $vouchers_obj->getVouchersInfo('vouchers_id = '.$vouchers_id,'vouchers_id,num,amount_limit,start_time,end_time,genre_id,title');
            if (!$vouchers_info)
            {
                exit('1');// 不存在优惠券
            }

            $member_card_obj = new MemberCardModel;
            $member_card_info = $member_card_obj->where('user_id = '.$user_id.' AND card_code = '.$card_code)->find();
            if (!$member_card_info)
            {
                exit('2');// 不存在会员卡
            }

            $user_vouchers_obj = new UserVouchersModel;
            $user_vouchers_info = $user_vouchers_obj->getUserVouchersInfo('user_id = '.$user_id.' AND vouchers_id = '.$vouchers_id,'');
            if ($user_vouchers_info)
            {
                exit('have');
            }

            $vouchers_info['member_card_id'] = $member_card_info['member_card_id'];
            $vouchers_info['user_id'] = $user_id;

            $user_vouchers_obj->addUserVouchers($vouchers_info);

            exit('success');
        } else {

            $member_card_obj = new MemberCardModel;
            $card_list = $member_card_obj->getPayCardList(session('user_id'));
            $this->assign('card_list', $card_list);
            // dump($card_list);exit;

            $coupon_set_obj = new CouponSetModel;

            $where = 'type_num = 3 AND start_time < '.NOW_TIME.' AND end_time > '.NOW_TIME;
            $coupon_set_info = $coupon_set_obj->getCouponSetInfo($where,'vouchers_ids');

            $vouchers_obj = new VouchersModel;
            $vouchers_list = $vouchers_obj->getVouchersList('','vouchers_id IN ('.$coupon_set_info['vouchers_ids'].')');
            foreach ($vouchers_list as $k => $v) {
                $vouchers_list[$k]['use_limit_desc'] = CouponSetModel::getUseLimitDesc($v['amount_limit'], 0,0, $v['genre_id']);
            }
            $this->assign('vouchers', $vouchers_list);
            // dump($vouchers_list);exit;

    		$this->assign('head_title', '领取');
    		$this->display();
        }
	}
}
