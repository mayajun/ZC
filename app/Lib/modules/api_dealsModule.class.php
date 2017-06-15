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

        $allData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal order by id desc LIMIT 0,8");

        if (!$allData) {
            return parent::JsonError('暂无数据');
        }

        foreach ($allData as $data) {
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

            $apiData[] = $subData;
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
                    $data[$key]['sur'] = '已过期';
                } else {
                    $data[$key]['sur'] = intval(($item['end_time'] - $this->now) / 86400 );
                }
            }
        }
        return $data;
    }


}

?>