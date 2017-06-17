<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 甘味人生(526130@qq.com)
// +----------------------------------------------------------------------


class api_userModule extends BaseModule
{
    /**
     * 用户信息页面
     * **/    
    public function index(){
        $id = $_REQUEST['id'];
        if(!$id){
            return parent::JsonError('参数错误');
        }
        //用户信息
        $info = $GLOBALS['db']->getRow("select id,user_name,age,mobile from ".DB_PREFIX."user where id=".$id);
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
        
        if(!$_REQUEST){
            return parent::JsonError('参数错误');
        }
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user",$user_data,"UPDATE","id=".intval($_REQUEST['id']));
        
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
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 我的关注列表
     * **/
    public function myFocus(){
        $user_id = $_REQUEST['user_id'];
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
        es_cookie::delete("email");
        es_cookie::delete("user_pwd");
        es_cookie::delete("hide_user_notify");
        es_cookie::delete("mobile_status");
        
        return parent::JsonSuccess();
    }
}
?>