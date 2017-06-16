<?php

class api_dealsModule extends BaseModule
{

    protected $now;

    public function __construct()
    {
        // 获取当前时间戳
        $this->now = date();
    }

    // 产品众筹 首页
    public function index()
    {

        // 搜索条件
        $query = '';
        // 分类id
        $cate_id = intval($_REQUEST['cate_id']);
        if (0 != $cate_id) {
            $query = 'where cate_id = ' . $cate_id;
        }
        // 每页条数
        $item = 8;
        if ($page = intval($_REQUEST['page'])) {
            $limit['start'] = $item * $page;
            $limit['end'] = $item * ($page + 1);
        }
        // 查询众筹语句
        $dealData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal " . $query . " order by id desc LIMIT {$limit['start']},{$limit['end']}");

        if (!$dealData) {
            return parent::JsonError('暂无数据');
        }

        foreach ($dealData as $data) {
            // 产品id
            $subData['id'] = $data['id'] ? $data['id'] : 0;
            // 产品名称
            $subData['name'] = $data['name'] ? $data['name'] : '';
            // 目标金额
            $subData['limit_price'] = $data['limit_price'] >= 0 ? $data['limit_price'] : 0;
            // 支持金额
            $subData['support_amount'] = $data['support_amount'] >= 0 ? $data['support_amount'] : 0;
            // 开始时间
            $subData['begin_time'] = $data['begin_time'] ? $data['begin_time'] : 0;
            // 结束时间
            $subData['end_time'] = $data['end_time'] ? $data['end_time'] : 0;
            // 支持人数
            $subData['support_count'] = $data['support_count'] ? $data['support_count'] : 0;
            // 热门
            $subData['is_hot'] = $data['is_hot'] ? $data['is_hot'] : 0;
            // 置顶
            $subData['is_special'] = $data['is_special'] ? $data['is_special'] : 0;
            // 用户id
            if (!empty($data['user_id'])) {
                $userIds[] = $data['user_id'];
            } else {
                return parent::JsonError('暂无数据');
            }

            $apiData[] = $subData;
        }

        // 查询用户信息
        $userData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "user where id in (" . implode(',', $userIds) . ")");

        foreach ($apiData as $key => &$value) {
            $value['user_name'] = $userData[$key]['user_name'];
            $value['user_avatar'] = API_DOMAIN . get_user_avatar($userData[$key]['id']);
        }

        // 百分比计算
        $apiData = $this->perOfDone($apiData);
        // 剩余时间计算
        $apiData = $this->surDay($apiData);

        return parent::JsonSuccess($apiData);

    }

    // 产品众筹 详情页
    public function app()
    {
        echo 'app';
        die;
    }

    // 查询分类
    public function getCateList()
    {
        // 查询分类语句
        $dealData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_cate order by sort");
        if (!$dealData) {
            return parent::JsonError('暂无数据');
        }
        return parent::JsonSuccess($dealData);
    }

    // public function getDetail()
    // {
    //     $id = $_REQUEST['id'];
    //
    //     $id = intval($id);
    //     if (empty($id) || $id == 0) {
    //         return parent::JsonError('参数错误');
    //     }
    //     // 获取众筹详情
    //     $data = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal where id=".$id);
    //     var_dump($data);
    //         die;
    // }

    /**
     * 计算完成百分比
     * @param array $data
     * @return array
     */
    protected function perOfDone(array $data)
    {
        foreach ($data as $key => $item) {
            if (isset($item['support_amount']) && isset($item['limit_price'])) {
                if ($item['support_amount'] > 0) {
                    $data[$key]['per'] = round($item['limit_price'] / $item['support_amount']);
                } else {
                    $data[$key]['per'] = 0;
                }
            }
        }
        return $data;
    }

    /**
     * 计算剩余时间
     * @param array $data
     * @return array
     */
    protected function surDay(array $data)
    {
        foreach ($data as $key => $item) {
            if (isset($item['end_time'])) {
                if ($item['end_time'] > $this->now) {
                    $data[$key]['sur'] = 0;
                } else {
                    $data[$key]['sur'] = intval(($item['end_time'] - $this->now) / 86400);
                }
            }
        }
        return $data;
    }


}

?>