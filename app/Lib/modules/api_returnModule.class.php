<?php

class api_returnModule extends BaseModule
{


    // 产品众筹 首页
    public function index()
    {

       $id = intval($_REQUEST['id']);
        $deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$id." and is_delete = 0 and (is_effect = 1 or (is_effect = 0 and user_id = ".intval($GLOBALS['user_info']['id'])."))");
        $deal_info['invote_mini_moneys'] =number_format(($deal_info['invote_mini_money']/10000),2);

        $access=get_level_access($GLOBALS['user_info'],$deal_info);

        $deal_info['login_time']=$GLOBALS['db']->getOne("select login_time from ".DB_PREFIX."user where id=".$deal_info['user_id']);
        $deal_info['user_icon']=$GLOBALS['user_level'][$deal_info['user_level']]['icon'];
        $deal_info['is_investor']=$GLOBALS['db']->getOne("select is_investor from ".DB_PREFIX."user where id=".$deal_info['user_id']);

        $deal_info['deal_type']=$GLOBALS['db']->getOne("select name from ".DB_PREFIX."deal_selfless_cate where id=".$deal_info['cate_id']);


        if(!$deal_info)
        {
             return parent::JsonError('暂无数据');

        }


        //跟投人数
        $gen_num=$GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."investment_list where  deal_id=".$id);

        //支持人和支持金额 支持时间
        $datas = $GLOBALS['db']->getAll('select * from '.DB_PREFIX."deal_order where deal_id=".$deal_info['id'] );

        foreach ($datas as $key => $value) {

            //获取支持人的头像
           $avatar = get_user_avatar_root($value['user_id'],3);
            $datas[$key]['avatar'] = $avatar;

        }

        //获取支持项目的总的次数
        $total_support = $GLOBALS['db']->getOne('select count(*) from '.DB_PREFIX."deal_order where deal_id=".$id);

        //得到已筹天数
        $now = time();
        $create_time = $deal_info['create_time'];

        $day = round(($now - $create_time)/3600/24);

        $data = array(
            'deal_info'=>$deal_info,
            'access' =>$access,
            'gen_num'=>$gen_num,
            'datas'=>$datas,


            'total_support'=>$total_support,


            'name' =>$deal_info['name'],// 项目名称
            'img'=>$deal_info['image'],  //发起人头像
            'user_name'=>$deal_info['user_name'], //发起人姓名
            'day' => $day,    //已筹天数
            'deal_type'=>$deal_info['deal_type'],//求助类型
            'limit_price'=>$deal_info['limit_price'], //筹资总额
            'support_amount'=>$deal_info['support_amount'],//已筹金额
            'support_count'=>$deal_info['support_count'],//个人帮助次数
                                                        //一起帮次数
            'description' =>$deal_info['description'],//项目描述


            'houses_info'=>$deal_info['houses_info'],//房产信息
            'houses_name'=>$deal_info['houses_name'],//房产名字
            'houses_status'=>$deal_info['houses_status'],//房产状态


            );

        return parent::JsonSuccess($data);

    }



    //评论接口
    public function comment($deal_id,$pid,$reply_user_id,$content){

        //提交的参数为被评论人id 评论人id 评论内容


        $data = array(
            'com_id'=>$com_id,
            'comment'=>$comment
            );


        $re=$GLOBALS['db']->autoExecute(DB_PREFIX."deal_comment",$data,"UPDATE","user_id=".$re_id);

        if($re){

            $return = array('msg'=>"评论失败");
            return parent::JsonError($return);

        }else{
            $return = array('msg'=>"评论成功");

            return parent::JsonSuccess($return);

        }

    }


}