<?php
header("Access-Control-Allow-Origin: *");

class api_registerModule extends BaseModule
{

    /**
     * 用户注册登录*
    **/

    public function register(){

        session_start();
        $mobile = $_REQUEST['mobile'];
        $vertify = $_REQUEST['vertify'];
        $password = $_REQUEST['password'];
        //判断是否有推荐人
        $pid = $_REQUEST['pid']?$_REQUEST['pid']:0;
        


        $session_mobile = $_SESSION['mobile'];
        // $session_mobile = 1000000060;
        $session_vertify = $_SESSION['vertify'];
        // $session_vertify = $_SESSION['vertify'];
        // $session_vertify = 88888;

        $is_exist = $GLOBALS['db']->getOne('select id from '.DB_PREFIX.'user where mobile='.$mobile);

        if($is_exist){

            return parent::JsonError('该手机号已注册!');

        }else{

             if($mobile == $session_mobile && $vertify == $session_vertify){
                 
                $code = ""; //首次可以修改加密
                $passwords = md5($password);
                $data = array(
                    'pid'=>$pid,
                    'mobile'=>$mobile,
                    'user_pwd'=>$passwords,
                    'user_name'=>$mobile,
                    'create_time'=>1111111,
                    );
                $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user",$data);
                $uid = $GLOBALS['db']->getOne('select id from '.DB_PREFIX.'user where user_name='.$mobile);
                 //生成推荐二维码
                $res = getImage($uid,"public/images/qrcode","user_".$uid.".png");
                //二维码路径+名称
                $path = $res['save_path'];
                //将路径存入数据库
                $GLOBALS['db']->autoExecute(DB_PREFIX."user",array('rec_image'=>$path),"UPDATE",'id='.$uid);
                //注册成功后，给上级用户增加200积分
                if($pid){
                    $score = $GLOBALS['db']->getOne('select score from '.DB_PREFIX.'user where id='.$pid);
                    $new_score = $score + 200;
                    $GLOBALS['db']->autoExecute(DB_PREFIX."user",array('score'=>$new_score),"UPDATE",'id='.$pid);
                }

                if($res){

                    $data = array(
                        'dis'=>'0',
                        'mobile'=>$mobile,
                        'password'=>$password
                        );
                    return parent::JsonSuccess($res);

                }else{
                     return parent::JsonError('注册失败!'.$res.'aa');
                }


             }else{

                return parent::JsonError('验证码不正确或者已超时!');

             }
        }



    }


     //快速登录短信接口
    public function duanxin(){

        session_start();

        $mobile = $_REQUEST['mobile'];
        header('content-type:text/html;charset=utf-8');

        // $vertify = 1111;
        $vertify = rand(1111, 9999);

        // Session('vertify',$vertify,3000); //过期时间5分钟
        // Session('mobile',$mobile,3000);

        $_SESSION['vertify'] = $vertify;
        $_SESSION['mobile'] = $mobile;


        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL

        $smsConf = array(
            'key'   => 'a546fd51254b3eb01769f7b862654456', //您申请的APPKEY
            'mobile'    => $mobile, //接受短信的用户手机号码
            'tpl_id'    => '37551', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$vertify.'&#company#=百岁帮' //您设置的模板变量，根据实际情况修改
        );

        $content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                // echo "短信发送成功,短信ID：".$result['result']['sid'];

                $data = array(
                    'mobile'=>$mobile,
                    'vertify'=>$vertify,
                    'msg'=>"短信发送成功,短信ID：".$result['result']['sid']
                    );

                return parent::JsonSuccess($data);

            }else{
                //状态非0，说明失败
                $msg = $result['reason'];
                // echo "短信发送失败(".$error_code.")：".$msg;

                $data = array(
                    'msg'=>"短信发送失败(".$error_code.")：".$msg
                    );

                return parent::JsonError($data);

            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            // echo "请求发送短信失败";

            return parent::JsonError('暂无数据');
        }


    }


}


?>