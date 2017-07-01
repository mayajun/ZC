<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 甘味人生(526130@qq.com)
// +----------------------------------------------------------------------
header("Access-Control-Allow-Origin: *");


class api_userModule extends BaseModule
{
    /**
     * 用户信息页面
     * **/
    public function index(){
//        $id = $_REQUEST['id'];
        $id = es_cookie::get('id');
        if(!$id){
            return parent::JsonError('参数错误');
        }
        //用户信息
        $info = $GLOBALS['db']->getRow("select id,user_name,age,mobile,thirdbind,thirdnum from ".DB_PREFIX."user where id=".$id);
        $info['head'] = get_user_avatar($info['id'],'middle');
        //银行卡
        $bank = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_bank where user_id=".$id);
        $bankName = $GLOBALS['db']->getOne("select name from ".DB_PREFIX."bank where id=".$bank['bank_id']);

        //收货地址
        $address = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_consignee where user_id=".$id);

        $info['bank'] = $bankName."(尾号".substr($bank['bankcard'], -4).")";

        $data = [$info,$address];
        return parent::JsonSuccess($data);
    }

    /**
     * 修改信息
     * **/
    public function update(){
        $user_data = $_REQUEST;
        $id = es_cookie::get('id');
        if(!$_REQUEST){
            return parent::JsonError('参数错误');
        }
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user",$user_data,"UPDATE","id=".$id);

        if($res){
            return parent::JsonSuccess();
        }else{
            return parent::JsonError('修改失败');
        }
    }

    /**
     * 修改或添加收货地址
     * **/
    public function addressEdit(){
        $data = $_REQUEST;
        $data['user_id'] = es_cookie::get('id');
        if(!$_REQUEST){
            return parent::JsonError('参数错误');
        }
        //修改
        if($data['id']){
            $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user_consignee",$data,"UPDATE","id=".intval($data['id']));
            if($data['is_default']==1){
                $res2 = $this->setDefault($data['user_id'],$data['id']);
            }

        }else{
            $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user_consignee",$data);
            if($data['is_default']==1){
                $res2 = $this->setDefault($data['user_id'],$data['id']);
            }
        }

        if($res){
            return parent::JsonSuccess();
        }else{
            return parent::JsonError('操作失败');
        }
    }

    /**
     * 设置默认地址
     * **/
    protected function setDefault($user_id,$id){
        $res1 = $GLOBALS['db']->autoExecute(DB_PREFIX."user_consignee",array('is_default'=>0),"UPDATE",'user_id='.$user_id);
        $res2 = $GLOBALS['db']->autoExecute(DB_PREFIX."user_consignee",array('is_default'=>1),"UPDATE",'user_id='.$user_id." and id=".$id);

        if($res1 && $res2){
            return parent::JsonSuccess();
        }else{
            return parent::JsonError('修改失败');
        }
    }
    
    /**
     * 删除收货地址
     * **/
    public function addressDel(){
        $data = $_REQUEST;
        $user_id = es_cookie::get('id');
        $res = $GLOBALS['db']->query("delete from ".DB_PREFIX."user_consignee where user_id=".$user_id." and id=".$data['id']);
        
        if($res==0){
            return parent::JsonError('操作失败');
        }else{
            return parent::JsonSuccess();
        }
        
    }

    /**
     * 我的关注列表
     * **/
    public function myFocus(){
        $user_id = es_cookie::get('id');
        $page = $_REQUEST['page'];
        $pagesize = 15;
        $offset = $page * $pagesize;

        $lists = $GLOBALS['db']->getAll("select d.id,d.name,d.image,d.is_effect,d.begin_time,d.end_time,d.is_success from ".DB_PREFIX."deal_focus_log as f left join ".DB_PREFIX."deal as d on d.id=f.deal_id where f.user_id=".$user_id." limit(".$offset.",".$pagesize.")");
        if($lists){
            return parent::JsonSuccess($lists);
        }else{
            return parent::JsonError();
        }
    }

    /**
     * 退出登录
     * **/
    public function loginout(){
        es_cookie::delete('id');
        es_cookie::delete("email");
        es_cookie::delete("user_pwd");
        es_cookie::delete("hide_user_notify");
        es_cookie::delete("mobile_status");

        return parent::JsonSuccess();
    }
    
    /**
     * 银行卡列表
     * **/
    public function bankLists(){
        $user_id = es_cookie::get('id');
        $lists = $GLOBALS['db']->getAll("select id,bank_name,bankcard,real_name,genre from ".DB_PREFIX."user_bank where user_id=".$user_id);
        
        if($lists==0){
            return parent::JsonError('暂无数据');
        }else{
            return parent::JsonSuccess($lists);
        }
        
    }
    
    /**
     * 添加银行卡页面，获取银行列表
     * **/
    public function bank(){
        $user_id = es_cookie::get('id');
        $lists = $GLOBALS['db']->getAll("select id,name from ".DB_PREFIX."bank");
        
        if($lists==0){
            return parent::JsonError('操作失败');
        }else{
            return parent::JsonSuccess($lists);
        }
        
    }
    
    /**
     * 执行添加银行卡
     * **/
    public function bankAdd(){
        $data = $_REQUEST;
        
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user_bank",$data);
        
        if($res==0){
            return parent::JsonError('操作失败');
        }else{
            return parent::JsonSuccess();
        }
        
    }
    
    /**
     * 删除已绑定银行卡
     * **/
    public function bankDel(){
        $data = $_REQUEST;
        $user_id = es_cookie::get('id');
        $res = $GLOBALS['db']->query("delete from ".DB_PREFIX."user_bank where user_id=".$user_id." and id=".$data['id']);
        
        if($res==0){
            return parent::JsonError('操作失败');
        }else{
            return parent::JsonSuccess();
        }
        
    }
    
    /**
     * 钱包 收支明细
     * **/
    public function credit()
    {
        $uid = es_cookie::get('id');
        if(!$uid){
            return parent::JsonError('用户ID为空');
        }
        
        $page_size = 15;
        $page = intval($_REQUEST['page']);
        if($page==0)
        $page = 1;
        $limit = (($page-1)*$page_size).",".$page_size;
        
        //结果数组
        $res = array();
        
        $condition =" and money <>0";
        $day=intval(strim($_REQUEST['day']));
        //$day=intval(str_replace("ne","-",$day));
        if($day!=0){
                $now_date=to_timespan(to_date(NOW_TIME,'Y-m-d'),'Y-m-d');
                $last_date=$now_date+$day*24*3600;
                if($day>0){
                        $condition.=" and log_time>=$now_date and  log_time<$last_date  ";
                }else{
                        $condition.=" and log_time>$last_date and  log_time<=$now_date  ";
                }
//                $GLOBALS['tmpl']->assign('day',$day);
                $res['day'] = $day;
        }
        $begin_time=strim($_REQUEST['begin_time']);
        if($begin_time!=0){
                $begin_time=to_timespan($begin_time,'Y-m-d');
                $condition.=" and log_time>=$begin_time ";
//                $GLOBALS['tmpl']->assign('begin_time',to_date($begin_time,'Y-m-d'));
                $res['begin_time'] = to_date($begin_time,'Y-m-d');
        }
        $end_time=strim($_REQUEST['end_time']);
        if($end_time!=0){
                $end_time=to_timespan($end_time,'Y-m-d');
                $condition.=" and log_time<$end_time ";
//                $GLOBALS['tmpl']->assign('end_time',to_date($end_time,'Y-m-d'));
                $res['end_time'] = to_date($end_time,'Y-m-d');

        }
        if($_REQUEST['begin_money']==='0'){
                $condition.=" and money>=0 ";
//                $GLOBALS['tmpl']->assign('begin_money',0);
                $res['begin_money'] = 0;
        }else{
                $begin_money=floatval($_REQUEST['begin_money']);
                if($begin_money!=0){
                        $condition.=" and money>=$begin_money ";
//                        $GLOBALS['tmpl']->assign('begin_money',$begin_money);
                $res['begin_money'] = $begin_money;

                }
        }

        if($_REQUEST['end_money']==='0'){
                $condition.=" and money<=0 ";
//                $GLOBALS['tmpl']->assign('end_money',0);
                $res['end_money'] = 0;
        }else{
                $end_money=floatval($_REQUEST['end_money']);
                if($end_money!=0){
                        $condition.=" and money<=$end_money ";
//                        $GLOBALS['tmpl']->assign('end_money',$end_money);
                $res['begin_money'] = $end_money;

                }
        }

        $type=intval($_REQUEST['type']);
        if($type>0){
                switch($type){
                        //我的收入
                        case 1:
                        $condition.=" and type=0 and money>0 ";
                        break;
                        //我的支出
                        case 2:
                        $condition.=" and type=0 and money<0 ";
                        break;
                        //我的提现
                        case 3:
                        $condition.=" and type=4  ";
                        break;

                }
//                $GLOBALS['tmpl']->assign('type',$type);
                $res['type'] = $type;
        }

        $money = $GLOBALS['db']->getOne('select money from '.DB_PREFIX."user where id=".$uid);
        $log_list = $GLOBALS['db']->getAll("select id,log_info,log_time,money from ".DB_PREFIX."user_log where user_id = ".$uid."   $condition order by log_time desc,id desc limit ".$limit);
//        $log_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_log where user_id = ".intval($GLOBALS['user_info']['id'])."  $condition ");
        
        $data = array('total'=>$money,'lists'=>$log_list);
        return parent::JsonSuccess($data);
    }
    
    //爱心值
    public function loveValue(){
        $user_id = es_cookie::get('id');
        if(!$user_id){
            return parent::JsonError('参数错误');
        }
        //爱心值总数
        $loveNum = $GLOBALS['db']->getOne('select love_value from '.DB_PREFIX."user where id=".$user_id);
        //超越人数
        $num = $GLOBALS['db']->getOne('select count(id) as count from '.DB_PREFIX."user where love_value<=".$loveNum);
//        var_dump($num);
//        exit;
        
        return parent::JsonSuccess(['loveNum'=>$loveNum,'num'=>$num]);
    }
    
    //爱心值记录
    public function lovelog(){
        $user_id = es_cookie::get('id');
        if(!$user_id){
            return parent::JsonError('参数错误');
        }
        
        $page_size = 15;
        $page = intval($_REQUEST['page']);
        if($page==0)
        $page = 1;
        $limit = (($page-1)*$page_size).",".$page_size;
        
        $lists = $GLOBALS['db']->getAll('select id,log_info,log_time,score from '.DB_PREFIX."user_lovelog where user_id=".$user_id." order by log_time desc,id desc limit ".$limit);
//        var_dump($lists);
//        exit;
        return parent::JsonSuccess($lists);
    }
    
    //红包记录
    public function red(){
        es_cookie::set('id',19,3600*24);
        $user_id = es_cookie::get('id');
        if(!$user_id){
            return parent::JsonError('用户未登录');
        }
        
        $page_size = 15;
        $page = intval($_REQUEST['page']);
        if($page==0)
        $page = 1;
        $limit = (($page-1)*$page_size).",".$page_size;
        
        $total = $GLOBALS['db']->getOne('select red_money from '.DB_PREFIX."user where id=".$user_id);
        $lists = $GLOBALS['db']->getAll('select id,log_info,log_time,money,from_user_id from '.DB_PREFIX."user_redlog where user_id=".$user_id." order by log_time desc,id desc limit ".$limit);
//        var_dump($lists);
//        exit;
        return parent::JsonSuccess(['total'=>$total,'lists'=>$lists]);
    }
    
    //积分记录
    public function myscore(){
        $user_id = es_cookie::get('id');
        if(!$user_id){
            return parent::JsonError('用户未登录');
        }
        
        $page_size = 15;
        $page = intval($_REQUEST['page']);
        if($page==0)
        $page = 1;
        $limit = (($page-1)*$page_size).",".$page_size;
        
        $total = $GLOBALS['db']->getOne('select score from '.DB_PREFIX."user where id=".$user_id);
        $lists = $GLOBALS['db']->getAll('select id,log_info,log_time,score,from_user_id from '.DB_PREFIX."user_scorelog where user_id=".$user_id." order by log_time desc,id desc limit ".$limit);
//        var_dump($lists);
//        exit;
        return parent::JsonSuccess(['total'=>$total,'lists'=>$lists]);
    }
   
   /**
    * 说明：生成二维码并将路径存入数据库
    * **/
   public function getQrcode($pid){
        //生成新二维码并存放在指定目录中
        $user_id = es_cookie::get('id');
        $res = getImage($pid,"public/images/qrcode","user_".$user_id.".png");
        
        //二维码路径+名称
        $path = $res['save_path'];
        //将路径存入数据库
        $GLOBALS['db']->autoExecute(DB_PREFIX."user",array('rec_image'=>$path),"UPDATE",'id='.$user_id);
   }
}
?>