<?php



header("Access-Control-Allow-Origin: *");

class api_renzhengModule extends BaseModule
{

    /**
     * 执行认证数据的数据插入
     *
     * type = 1为个人信息验证 type=0 组织信息验证
     */

    public function insert_renzheng($deal_id,$type){


        //接收数据
        $data = $_REQUEST;
        $data['type'] = $type;
        $data['deal_id']=$deal_id;

        if(!$data){
            return parent::JsonError('参数错误');
        }
        $res = $GLOBALS['db']->autoExecute(DB_PREFIX."deal_renzheng_info",$data);

        if($res){
            return parent::JsonSuccess();
        }else{
            return parent::JsonError('操作失败');
        }


    }



    /**
     * 管理类型接口
     */
    public function guanli($deal_id,$type){

        $data = $GLOBALS['db']->getOne('select * from '.DB_PREFIX.'deal where id = '.$deal_id);

        $deal_log = $GLOBALS['db']->getOne('select * from '.DB_PREFIX.'deal_log where id='.$deal_id);


        if (!$data) {
            return parent::JsonError('暂无数据');
        }


        //返回支持记录的数据
        if($type == 1){

            $data1 = array(
                'support_count'=>$data['support_count'],  //支持人数
                'support_amount'=>$data['support_amount'],// 支持金额
                'focus_count'=>$data['focus_count'] //关注数
                );

            return parent::JsonSuccess($data1);
        }


        //编辑项目
        if($type ==2){

            $data2 = array(
                'limit_price'=>$data['limit_price'], //目标金额
                'tags'=>$data['tags'],      //资金用途
                'deal_days'=>$data['deal_days'],//众筹天数
                'begin_time'=>$data['begin_time'],//开始时间
                'description'=>$data['description'],//描述
                'log_info'=>$deal_log['log_info'],//筹款动态
                'create_time'=>$deal_info['create_tiem'],//创建时间
                'user_name'=>$deal_info['user_name'],//昵称
                'image'=>$deal_info['image'],//上传的图片
                'vedio'=>$deal_info['vedio'],//上传的视频
                'source_vedio'=>$deal_info['source_vedio'],//视频资源
                );


            return parent::JsonSuccess($data3);
        }

        //修改时间进入接口
        if($type ==3){
            $data3 = array(
                'deal_days'=>$data['deal_days'], //众筹天数
                'begin_time'=>$data['begin_time'],// 开始时间
                'end_time'=>$data['end_time']//结束时间
                );

            return parent::JsonSuccess($data);

        }



    }



    /**
     * 执行修改接口
     */

    public function guanlixiugai($deal_id){


        //执行编辑项目修改提交
        if($type ==2){

            $data = $_REQUEST;

            $res = $GLOBALS['db']->autoExecute(DB_PREFIX."deal",$data,"UPDATE","id=".$deal_id);

            if (!$res) {
                return parent::JsonError('修改失败');
            }else{
                return parent::JsonSuccess();

            }

        }

        //执行修改时间
        //
        //需要begin_time，end_time，deal_days  前台获取时间戳传入
        if($type ==3){

            $data = $_REQUEST;

            $res = $GLOBALS['db']->autoExecute(DB_PREFIX."deal",$data,"UPDATE","id=".$deal_id);

            if (!$res) {
                return parent::JsonError('修改失败');
            }else{
                return parent::JsonSuccess();

            }

        }

        //项目更新接口
        if($type ==4){
            $data = $_REQUEST;
            $data['create_time']=time();
            $data['user_id']=$GLOBALS['user_info']['id'];
            $data['user_name']= $GLOBALS['user_info']['use_name'];
            $data['deal_id']= $deal_id;

            $res = $GLOBALS['db']->autoExecute(DB_PREFIX."deal_log",$data);

            if (!$res) {
                return parent::JsonError('修改失败');
            }else{
                return parent::JsonSuccess();

            }
        }

        //删除项目接口
        //
        //需要将钱原路退还，比较复杂
        if($type == 8){

            $res = $GLOBALS['db']->query("delete from ".DB_PREFIX."deal where deal_id = ".$deal_id);


            if (!$res) {
                return parent::JsonError('删除失败');
            }else{
                return parent::JsonSuccess('删除成功');


        }


    }
}




}

?>