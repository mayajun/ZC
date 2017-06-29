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
        // 实际付款
        $data['real_money'] = ($_REQUEST['money'] * $_REQUEST['count']) - $_REQUEST['coupon'];
        // 订单编号
        $data['order_sn'] = rand(100,999).time().rand(100,999);
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
        foreach($selData as &$orderInfo){
            // 获取产品信息
            $dealInfo = $GLOBALS['db']->getAll("select id,name,image from " . DB_PREFIX . "deal where id = " .$orderInfo['deal_id']);
            if(!empty($dealInfo)){
                $orderInfo['dealInfo'] = $dealInfo;
            } else {
                $orderInfo['dealInfo'] = [];
            }
            // 获取用户信息
            $userInfo = $GLOBALS['db']->getAll("SELECT user_name FROM " . DB_PREFIX . "user where id = ".$orderInfo['user_id']);
            if(!empty($dealInfo)){
                $userInfo = current($userInfo);
                $userInfo['avatar'] = API_DOMAIN . get_user_avatar($orderInfo['user_id']);
                $orderInfo['userInfo'] = $userInfo;
            } else {
                $orderInfo['userInfo'] = [];
            }
        }
        return parent::JsonSuccess($selData);
    }

    // 修改订单状态
    public function updateOrder()
    {
        if (!empty($_REQUEST['status']) || !empty($_REQUEST['id'])) {
            switch($_REQUEST['status']){
                case 'paid': // 已支付时调用
                    $data['trade_sn'] = $_REQUEST['trade_sn']; // 交易号
                    $data['paid_at'] = time();
                case 'sent': // 已发货时调用
                    $data['logistics_company'] = $_REQUEST['logistics_company']; // 快递公司
                    $data['logistics_number'] = $_REQUEST['logistics_number']; // 运单号
                    $data['sent_at'] = time();
                case 'received': // 已收货时调用
                    $data['received_at'] = time();
                case 'completed': // 评价时调用
                    $data['evaluate'] = $_REQUEST['evaluate']; // 评价内容
                    $data['star'] = $_REQUEST['star']; // 评价星级
                    $data['evaluated_at'] = time();
                case 'refund': // 退款时调用
                    $data['why_refund'] = $_REQUEST['why_refund']; // 退款原因
                    $data['refund_at'] = time();
                case 'unpaid':
                default:
                return parent::JsonError('状态值错误');
            }
            $data['status'] = $_REQUEST['status'];
            $data['updated_at'] = time();
            $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "order", $data, "UPDATE", "id=" . intval($_REQUEST['id']));

            if ($res) {
                return parent::JsonSuccess();
            } else {
                return parent::JsonError('修改失败');
            }
        }
        return parent::JsonError('参数错误');
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

