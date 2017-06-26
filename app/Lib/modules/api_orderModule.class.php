<?php

header("Access-Control-Allow-Origin: *");

class api_orderModule extends BaseModule
{

    protected $now;

    public function __construct()
    {
        // 获取当前时间戳
        $this->now = time();
    }

    // 创建订单
    public function createOrder()
    {
        // 接收数据
        $data = $_REQUEST;
        if (!$data) {
            return parent::JsonError('参数错误');
        }
        $data['created_at'] = $this->now;
        $data['updated_at'] = $this->now;
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "order", $data);
        if ($res) {
            return parent::JsonSuccess();
        } else {
            return parent::JsonError('操作失败');
        }
    }

    // 获取订单
    public function orderList()
    {
        if (!empty($_REQUEST['status'])) {
            $where = "and status = '{$_REQUEST['status']}' ";
        } else {
            $where = '';
        }
        // 查询分类语句
        $selData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "order where deleted_at = 0 " . $where . " order by created_at desc");
        if (!$selData) {
            return parent::JsonError('暂无数据');
        }
        return parent::JsonSuccess($selData);
    }

    // 删除订单
    public function delOrder()
    {
        if (!empty($_REQUEST['id'])) {
            $data = ['deleted_at' => intval($_REQUEST['deleted_at'])];
        } else {
            return parent::JsonError('参数丢失！');
        }
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "order", $data, "UPDATE", "id=" . intval($_REQUEST['id']));
        if (!$res) {
            return parent::JsonError('删除失败');
        }
        return parent::JsonSuccess();
    }

}

