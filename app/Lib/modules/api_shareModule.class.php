<?php

header("Access-Control-Allow-Origin: *");

class api_shareModule extends BaseModule
{

    protected $now;

    public function __construct()
    {
        // 获取当前时间戳
        $this->now = time();
    }

    // 发起一起帮
    public function share()
    {
        if (!$_REQUEST) {
            return parent::JsonError('参数错误');
        }
        $data['user_id'] = $_REQUEST['user_id'];
        $data['deal_id'] = $_REQUEST['deal_id'];
        $data['share_name'] = $_REQUEST['share_name'];
        $data['share_des'] = $_REQUEST['share_des'];
        $data['share_goal'] = $_REQUEST['share_goal'];
        $data['created_at'] = time();
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "deal_share", $data);
        if ($res) {

            return parent::JsonSuccess();

        } else {

            return parent::JsonError('操作失败');

        }
    }

    // 获取我的一起帮列表
    public function myShare()
    {
        if (!$_REQUEST['user_id']) {
            return parent::JsonError('参数错误');
        }
        $user_id = $_REQUEST['user_id'];
        // 每页条数
        $item = 8;
        $page = $_REQUEST['page'] ? intval($_REQUEST['page']) : 1;

        $limit['start'] = $item * ($page - 1);
        $limit['end'] = $item * $page;

        // 查询我的一起帮
        $res = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share where user_id = " . $user_id . " order by id desc LIMIT {$limit['start']},{$limit['end']}");

        if (!$res) {
            return parent::JsonError('暂无数据');
        }
        return parent::JsonSuccess($res);
    }

    // 获取一起帮详情
    public function shareDetail()
    {
        if (!$_REQUEST['id']) {
            return parent::JsonError('参数错误');
        }

        // 查询我的一起帮
        $res = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share where id = " . $_REQUEST['id']);

        if (!$res) {
            return parent::JsonError('暂无数据');
        }

        $res = current($res);
        // 获取原帮助信息
        $dealInfo = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal where id = " . intval($res['deal_id']));

        $dealInfo = current($dealInfo);
        $res['dealInfo']['name'] = $dealInfo['name'];
        $res['dealInfo']['image'] = API_DOMAIN . substr($dealInfo['image'], 1);

        return parent::JsonSuccess($res);
    }

    // 修改一起帮
    public function updateShare()
    {
        if (!$_REQUEST['id']) {
            return parent::JsonError('参数错误');
        }
        // // 查询我的一起帮
        // $shareInfo = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share where id = " . $_REQUEST['id']);
        //
        // if (!$shareInfo) {
        //     return parent::JsonError('暂无数据');
        // }
        //
        // $shareInfo = current($shareInfo);
        // // 判断所属
        // if (!$shareInfo['user_id'] != $_REQUEST['user_id']) {
        //     return parent::JsonError('操作非法');
        // }

        $data['share_name'] = $_REQUEST['share_name'];
        $data['share_des'] = $_REQUEST['share_des'];
        $data['share_goal'] = $_REQUEST['share_goal'];
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "deal_share", $data, "UPDATE", "id=" . intval($_REQUEST['id']));

        if ($res) {
            return parent::JsonSuccess();
        } else {
            return parent::JsonError('修改失败');
        }
    }

    // 删除一起帮
    public function delOrder()
    {
        $res = $GLOBALS['db']->query("delete from " . DB_PREFIX . "deal_share where id =" . $_REQUEST['id']);
        if ($res === 0) {
            return parent::JsonError('操作失败');
        } else {
            return parent::JsonSuccess();
        }
    }

}

