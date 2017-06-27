<?php



header("Access-Control-Allow-Origin: *");

class api_bangzhuguodeModule extends BaseModule
{


    //查询我帮助过的相关信息
    public function yibangzhu(){


        $id = $GLOBALS['user_info']['id'];

        $data = $GLOBALS['db']->getAll('select `a1.id,a1.deal_id,a1.user_name,a1.pay_time,a2.name,a2.end_time from '.DB_PREFIX.'deal_order a1 join left '.DB_PREFIX.'deal a2 on a1.deal_id = a2.id where a1.user_id='.$id.' order by a1.pay_time desc' );


        if($data){

             return parent::JsonSuccess($data);

        }else{

            return parent::JsonError('暂无数据');

        }


    }

    //获取帮助的详情,传递参数为项目的deal的id
    public function bangzhuxiangqing($id){


        $order_info = $GLOBALS['db']->getOne('select * from '.DB_PREFIX.'deal_order a1 left join '.DB_PREFIX.'payment_notice a2 on a1.id=a2.order_id where id='.$id);

        $payment = $GLOBALS['db']->getOne('select class_name from '.DB_PREFIX.'payment where id ='.$order_info['payment_id']);

        switch($order_info['order_status']){
            case 0:
                $status = "未支付";
                break;
            case 1:
                $status = '已支付(过期)' ;
                break;
            case 2:
                $status = '已支付(无库存)';
                break;
            case 3:
                $status = '成功';
                break;
        }

        $create_time = date("Y-m-d H:i",$order_info['create_time']) ;
        $pay_time = date("Y-m-d H:i",$order_info['pay_time']) ;


        $data = array(
            'id'=>$id,
            'deal_name'=>$order_info['deal_name'],
            'money'=>$order_info['money'],
            'order_status'=>$status,
            'notice_sn'=>$order_info['notice_sn'],
            'class_name'=>$payment['class_name'],
            'create_time'=>$create_time,
            'pay_time'=>$pay_time,

            );

        if($data){

             return parent::JsonSuccess($data);

        }else{

            return parent::JsonError('暂无数据');

        }


    }




    //一起帮帮助列表
    public function yiqibang(){



    }

}

?>