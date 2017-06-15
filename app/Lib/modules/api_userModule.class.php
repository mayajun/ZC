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
     * 修改用户信息
     * **/    
    public function infoEdit(){
        $id = $_REQUEST['id'];
        
        $info = $GLOBALS['db']->getRow("select id,user_name,age,mobile from ".DB_PREFIX."user where id=".$id);
        $info['head'] = get_user_avatar($info['id'],'middle');
        //银行卡
        $bank = $GLOBALS['db']->getRow("select * from".DB_PREFIX."user_bank where user_id=".$id);
        $bankName = $GLOBALS['db']->getOne("select name from".DB_PREFIX."bank where id=".$bank['bank_id']);
        
        $info['bank'] = $bankName."(尾号".substr($bank['bankcard'], -4).")";
        ajax_return(array("code"=>200,"data"=>$info,"info"=>"用户信息获取成功"));
    }
}
?>