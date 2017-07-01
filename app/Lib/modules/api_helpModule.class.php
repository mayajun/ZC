<?php

header("Access-Control-Allow-Origin: *");

class api_helpModule extends BaseModule
{

    protected $now;

    public function __construct()
    {
        // 获取当前时间戳
        $this->now = time();
    }

    // 支持一起帮
    public function help()
    {
        if (!$_REQUEST) {
            return parent::JsonError('参数错误');
        }
        $data['share_id'] = $_REQUEST['share_id'];
        // 查询一起帮信息
        $shareInfo = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share where id = " . $data['share_id']);
        if (!$shareInfo) {
            return parent::JsonError('参数错误');
        }
        if ($shareInfo['share_raise'] + $_REQUEST['help_money'] > $shareInfo['share_goal']) {
            return parent::JsonError('目标已达成或超过目标金额，不能继续支持');
        }
        $data['user_id'] = $_REQUEST['user_id'];
        $data['help_money'] = $_REQUEST['help_money'];
        $data['help_text'] = $_REQUEST['help_text'];
        $data['help_trade_no'] = $_REQUEST['help_trade_no'];
        $data['created_at'] = time();
        // 存储帮助信息
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "help", $data);
        // 修改一起帮进度
        $shareData['share_raise'] = $shareInfo['share_raise'] + $_REQUEST['help_money'];
        $deal_res = $GLOBALS['db']->autoExecute(DB_PREFIX . "deal_share", $shareData, "UPDATE", "id=" . $data['share_id']);
        if ($res && $deal_res) {
            return parent::JsonSuccess();
        } else {
            return parent::JsonError('操作失败');
        }
    }

    // 获取一起帮记录
    public function helpList()
    {
        if (!$_REQUEST['share_id']) {
            return parent::JsonError('参数错误');
        }

        // 查询一起帮信息
        $shareInfo = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_share where id = " . $_REQUEST['share_id']);
        if (!$shareInfo) {
            return parent::JsonError('参数错误');
        }
        $shareInfo = current($shareInfo);

        // 获取用户信息
        $user = $GLOBALS['db']->getAll("SELECT user_name FROM " . DB_PREFIX . "user where id = " . intval($shareInfo['user_id']));

        if (!empty($user)) {
            $user = current($user);
            $user['avatar'] = get_user_avatar($shareInfo['user_id']);
            $shareInfo['userInfo'] = $user;
        } else {
            $shareInfo['userInfo'] = [];
        }

        $data['share_name'] = $shareInfo['share_name'];
        $data['share_des'] = $shareInfo['share_des'];
        $data['share_raise'] = $shareInfo['share_raise'];
        $data['share_goal'] = $shareInfo['share_goal'];
        $data['userInfo'] = $shareInfo['userInfo'];

        // 获取帮助记录
        $helpInfo = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_help where share_id = " . $_REQUEST['share_id']);
        if (!$helpInfo) {
            return parent::JsonError('参数错误');
        }

        // 获取用户信息
        foreach ($helpInfo as $key => $help) {
            // 获取用户信息
            $userInfo = $GLOBALS['db']->getAll("SELECT user_name FROM " . DB_PREFIX . "user where id = " . $help['user_id']);
            if (!empty($userInfo)) {
                $userInfo = current($userInfo);
                $userInfo['avatar'] = get_user_avatar($help['user_id']);
                $helpInfo[$key]['userInfo'] = $userInfo;
            } else {
                $helpInfo[$key]['userInfo'] = [];
            }
        }

        $data['help_info'] = $helpInfo;
        return parent::JsonSuccess($data);


    }

}

