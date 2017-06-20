<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 甘味人生(526130@qq.com)
// +----------------------------------------------------------------------

//发布接口
class api_publishModule extends BaseModule
{
    /**
     * 发布首页 顶级分类
     * **/
    public function index(){
        $types = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate where pid=0");
        if($types){
            return parent::JsonSuccess($types);
        }else{
            return parent::JsonError('暂无数据');
        }
    }
    
    /**
     * 发布 二级分类
     * **/
    public function child(){
        //一级分类id
        $pid = intval($_REQUEST['pid']);
        if(!$pid){
            return parent::JsonError('参数错误');
        }
        $types = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate where pid=".$pid);
        if($types){
            return parent::JsonSuccess($types);
        }else{
            return parent::JsonError('暂无数据');
        }
    }
    
    /**
     * 发布
     * **/
    public function publish(){
        //接收数据
        $data = $_REQUEST;
        if(!$data){
            return parent::JsonError('参数错误');
        }
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX."deal",$data);
        $deal_id = $GLOBALS['db']->getOne("select id from ".DB_PREFIX."deal order by id desc");
        //插入图片
        $res2 = $GLOBALS['db']->autoExecute(DB_PREFIX."deal_image",$data['images']);
        if($res){
            return parent::JsonSuccess();
        }else{
            return parent::JsonError('操作失败');
        }
    }
}
?>