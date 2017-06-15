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
    public function infoEdit(){
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
        return parent::JsonSuccess($info);
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
    
    //修改或添加收货地址
    public function addressEdit(){
        $data = $_REQUEST;
        if(!$_REQUEST){
            return parent::JsonError('参数错误');
        }
        //修改
        if($data['act']=='u'){
            
        }
    }
}
?>