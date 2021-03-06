<?php

header("Access-Control-Allow-Origin: *");

class api_insuranceModule extends BaseModule
{

    protected $now;

    public function __construct()
    {
        // 获取当前时间戳
        $this->now = time();
    }

    // 创建保险类型
    public function createInsurance()
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
        if (!empty($postData['pid'])) {
            $data['pid'] = $postData['pid'];
        }
        $data['name'] = $postData['name'];
        $data['image'] = $postData['image'];
        $data['money'] = intval($postData['money']);
        $data['term'] = intval($postData['term']);
        $data['age_min'] = intval($postData['age_min']);
        $data['age_max'] = intval($postData['age_max']);
        $data['limit_time'] = intval($postData['limit_time']);
        $data['observation'] = intval($postData['observation']);
        $data['flow'] = $postData['flow'];
        $data['cases'] = $postData['cases'];
        $data['created_at'] = $this->now;
        $data['updated_at'] = $this->now;

        // 保单编号
        $data['insurance_no'] = rand(100, 999) . time() . rand(100, 999);
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "insurance", $data);
        if ($res) {
            return parent::JsonSuccess();
        } else {
            return parent::JsonError('操作失败');
        }
    }

    // 获取保单列表
    public function insuranceList()
    {
        if ($_REQUEST['status']) {
            $where = "where status = '{$_REQUEST['status']}' ";
        } else {
            $where = "where status <> 'deleted'";
        }
        // 查询分类语句
        $selData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "insurance " . $where . " order by id desc");
        if (!$selData) {
            return parent::JsonError('暂无数据');
        }
        foreach ($selData as $key => $insInfo) {
            if($insInfo['pid'] != 0) {
                unset($selData[$key]);
            }
        }
        return parent::JsonSuccess($selData);
    }

    // 修改订单状态
    // public function updateOrder()
    // {
    //     if (!empty($_REQUEST['status']) || !empty($_REQUEST['id'])) {
    //         switch ($_REQUEST['status']) {
    //             case 'paid': // 已支付时调用
    //                 $data['trade_sn'] = $_REQUEST['trade_sn']; // 交易号
    //                 $data['paid_at'] = time();
    //             case 'sent': // 已发货时调用
    //                 $data['logistics_company'] = $_REQUEST['logistics_company']; // 快递公司
    //                 $data['logistics_number'] = $_REQUEST['logistics_number']; // 运单号
    //                 $data['sent_at'] = time();
    //             case 'received': // 已收货时调用
    //                 $data['received_at'] = time();
    //             case 'completed': // 评价时调用
    //                 $data['evaluate'] = $_REQUEST['evaluate']; // 评价内容
    //                 $data['star'] = $_REQUEST['star']; // 评价星级
    //                 $data['evaluated_at'] = time();
    //             case 'refund': // 退款时调用
    //                 $data['why_refund'] = $_REQUEST['why_refund']; // 退款原因
    //                 $data['refund_at'] = time();
    //             case 'unpaid':
    //             default:
    //                 return parent::JsonError('状态值错误');
    //         }
    //         $data['status'] = $_REQUEST['status'];
    //         $data['updated_at'] = time();
    //         $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "order", $data, "UPDATE", "id=" . intval($_REQUEST['id']));
    //
    //         if ($res) {
    //             return parent::JsonSuccess();
    //         } else {
    //             return parent::JsonError('修改失败');
    //         }
    //     }
    //     return parent::JsonError('参数错误');
    // }

    // 删除保险类型
    public function delInsurance()
    {
        if (!empty($_REQUEST['id'])) {
            $data = ['status' => 'deleted'];
            $data['updated_at'] = $this->now;
        } else {
            return parent::JsonError('参数丢失！');
        }
        // 查询状态值
        $resS = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "insurance where id =" . $_REQUEST['id']." and status = 'deleted'");

        if($resS){
            return parent::JsonError('操作失败');
        }

        $res = $GLOBALS['db']->autoExecute(DB_PREFIX . "insurance", $data, "UPDATE", "id=" . intval($_REQUEST['id']));
        if (!$res) {
            return parent::JsonError('删除失败');
        }
        return parent::JsonSuccess();
    }

}

