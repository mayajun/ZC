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
        if (!$_POST) {
            return parent::JsonError('请求失败');
        }
        if (!$user_id = intval(es_cookie::get("id"))) {
            return parent::JsonError('登录状态异常');
        }
        foreach ($_POST as $k => $v) {
            $postData[$k] = strim($v);
        }

        $data['user_id'] = $user_id;
        $data['deal_id'] = $postData['deal_id'];
        $data['share_name'] = $postData['share_name'];
        $data['share_des'] = $postData['share_des'];
        $data['share_goal'] = $postData['share_goal'];
        $data['created_at'] = $this->now;

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
        if (!$user_id = intval(es_cookie::get("id"))) {
            return parent::JsonError('登录状态异常');
        }
        // 分页函数
        $limit = parent::paging($_REQUEST['page']);
        // 查询我的一起帮
        $res = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share where user_id = " . $user_id . " order by id desc LIMIT {$limit['start']},{$limit['end']}");

        if ($res) {

            foreach ($res as $key => $value) {
                // 获取众筹图片
                $dealInfo = $GLOBALS['db']->getAll("SELECT image FROM " . DB_PREFIX . "deal where id=" . $value['deal_id']);
                $res[$key]['deal_image'] = API_DOMAIN . substr(current($dealInfo)['image'],1);
                // 添加完成度
                if ($value['share_goal'] === 0) {
                    $res[$key]['completion'] = "0%";
                    continue;
                }
                $res[$key]['completion'] = intval(($value['share_raise'] / $value['share_goal']) * 100) . "%";
            }

            return parent::JsonSuccess($res);

        } else {
            return parent::JsonError('暂无数据');
        }
    }

    // 获取一起帮详情
    public function shareDetail()
    {
        if (!$_POST) {
            return parent::JsonError('请求失败');
        }
        if (!$user_id = intval(es_cookie::get("id"))) {
            return parent::JsonError('登录状态异常');
        }
        $data['id'] = intval($_POST['id']);
        $where = " where user_id = " . $user_id . " and id = " . $data['id'];

        // 查询我的一起帮
        $res = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share" . $where);
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

    // 编辑一起帮
    public function updateShare()
    {
        if (!$_POST) {
            return parent::JsonError('请求失败');
        }
        if (!$user_id = intval(es_cookie::get("id"))) {
            return parent::JsonError('登录状态异常');
        }
        foreach ($_POST as $k => $v) {
            $postData[$k] = strim($v);
        }
        $where = ' set ';
        $data['share_name'] = $postData['share_name'];
        $data['share_des'] = $postData['share_des'];
        $data['share_goal'] = intval($postData['share_goal']);
        foreach ($data as $key => $val) {
            $where .= $key . "={$val} ";
        }

        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "deal_share", $data, "UPDATE", "id=" . intval($postData['id']));

        if ($res) {
            return parent::JsonSuccess();
        } else {
            return parent::JsonError('修改失败');
        }
    }

    // 删除一起帮
    public function delShare()
    {
        if (!$_POST) {
            return parent::JsonError('请求失败');
        }
        if (!$user_id = intval(es_cookie::get("id"))) {
            return parent::JsonError('登录状态异常');
        }
        $data['id'] = intval($_POST['id']);
        $res = $GLOBALS['db']->query("delete from " . DB_PREFIX . "deal_share where id =" . $data['id']);
        if ($res === 0) {
            return parent::JsonError('操作失败');
        } else {
            return parent::JsonSuccess();
        }
    }


}

