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
        if($shareInfo['share_raise'] + $_REQUEST['help_money'] > $shareInfo['share_goal']){
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

}

