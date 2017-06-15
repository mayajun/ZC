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
        $userInfo = M('user');
        $info = $userInfo->select();
        var_dump($info);
    }
}
?>