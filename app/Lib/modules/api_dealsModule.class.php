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
        $page = $_REQUEST['page'] ? intval($_REQUEST['page']) : 1;

        $limit['start'] = $item * ($page - 1);
        $limit['end'] = $item * $page;

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

    // 获取众筹分类
    public function getCateList()
    {
        // 查询分类语句
        $dealData = $GLOBALS['db']->getAll("SELECT * FROM " . DB_PREFIX . "deal_cate order by sort");
        if (!$dealData) {
            return parent::JsonError('暂无数据');
        }
        return parent::JsonSuccess($dealData);
    }

    /**
     * 图片上传
     * @return bool|string|void
     */
    public function fileUpload()
    {
        // 判断是否为多文件上传
        if (!is_array($_FILES['upload']['error'])) {
            return parent::JsonError('请使用多文件上传设置，传递文件为数组，每个文件名后加[]即可');
        }
        // 判断上传状态
        foreach ($_FILES['upload']['error'] as $err) {
            if (0 != $err) {
                return parent::JsonError('上传失败，请重试！');
            }
        }
        // 判断上传文件MIME类型合法性
        foreach ($_FILES['upload']['type'] as $type) {
            if (!in_array($type, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'])) {
                return parent::JsonError('文件类型非法');
            }
        }
        // 判断上传文件大小合法性 2 * 1024 * 1024
        foreach ($_FILES['upload']['size'] as $size) {
            if ($size > 2097152) {
                return parent::JsonError('文件限制最大为2M');
            }
        }
        // 获取文件后缀名
        $base_path = "public/images/api_upload/"; //接收文件目录
        foreach ($_FILES['upload']['name'] as $name) {
            $uploadInfo = explode('.', $name);
            $ext = strtolower(array_pop($uploadInfo));
            // 判断后缀名合法性
            if (!in_array($ext, ['jpg', 'png', 'gif', 'bmp'])) {
                return parent::JsonError('文件后缀名错误！');
            }
            $newFileName = md5(basename($_FILES ['upload'] ['name']) . time() . rand(0, 99999999)) . $ext;
            $target_path[] = APP_ROOT_PATH . $base_path . $newFileName;
            $url_path[] = $base_path . $newFileName;
        }
        // 转移文件
        foreach ($_FILES ['upload'] ['tmp_name'] as $key => $tmpName) {
            if (move_uploaded_file($tmpName, $target_path[$key])) {
                $saveName[] = $url_path[$key];
            } else {
                return parent::JsonError('未知错误请稍后再试');
            }
        }
        return parent::JsonSuccess($saveName);
    }
    /**
     * ---

     * ### 单/多文件上传接口

    接口地址：[http://API\_DOMAIN/index.php?ctl=api_deals&act=fileUpload](http://www.zc.local.com/index.php?ctl=api_deals&act=fileUpload)

    请求方式：post

    参 数：

    upload[](文件资源类型)
    注意：这里无论单文件还是多文件，上传文件名要写成upload[]


    返 回 值：

    ```

    {
    "status_code": 200,
    "message": "成功",
    "data": [ // 这里返回的是根目录下位置
    "public/images/api_upload/135938b1f40bacb55a170f7cbbc56017jpg",
    "public/images/api_upload/3629423d466ba7cfba52adbf87e6ab50jpg"
    ]
    }
    ```
     */

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