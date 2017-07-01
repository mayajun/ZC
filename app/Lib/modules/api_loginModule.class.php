<?php

header("Access-Control-Allow-Origin: *");

class api_loginModule extends BaseModule
{

    //账号密码登录
    public function zhanghaomima(){

        $mobile = $_REQUEST['mobile'];

        $password = $_REQUEST['password'];

        $user = $GLOBALS['db']->getOne('select id,user_pwd,user_name from '.DB_PREFIX.'user where mobile='.$mobile);
        if(!$user){

            return parent::JsonError('手机号尚未注册');

        }else{


            $info = $GLOBALS['db']->getOne('select id from '.DB_PREFIX.'user where mobile='.$mobile.' and user_pwd= "'.md5($password).'"');

            if($info){

                $data = array(
                'id'=>$user['id'],
                'user_pwd'=>$user['user_pwd'],
                'user_name'=>$user['user_name'],
                );

                $_SESSION['id'] = $user['id'];
                $_SESSION['user_pwd']= $user['user_pwd'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['mobile'] = $mobile;

            return parent::JsonSuccess($data);


            }else{

                return parent::JsonError('账号或密码错误');

            }

        }





    }

    //快速登录
    public function kuaisudenglu(){

        $mobile = $_REQUEST['mobile'];
        $vertify = $_REQUEST['vertify'];


        $session_mobile = $_SESSION['mobile'];
        $session_vertify = $_SESSION['vertify'];


        //验证码是否匹配
        if($mobile == $session_mobile && $vertify == $session_vertify){
            //匹配上则判断是否老用户，老用户则查出其相关信息，运行其登陆；新用户，插入数据库，允许其登陆。
            //
            $is_exist = $GLOBALS['db']->getOne('select id,user_pwd from '.DB_PREFIX.'user where mobile='.$mobile);

            if($is_exist){

                $data = array(
                    'id'=>$is_exist['id'],
                    'mobile'=>$mobile,
                    'user_pwd'=>$id_exist['user_pwd'],
                    'dis'=>'1',
                    );

                 return parent::JsonSuccess($data);

            }else{

                $user_data= array(
                    'mobile'=>$mobile,
                    'user_name'=>$mobile,
                    'create_time'=>time(),
                    );

                 $res = $GLOBALS['db']->autoExecute(DB_PREFIX."user",$user_data,"INSERT");

                 if($res){

                    $data = array(
                        'dis'=>0,   //新注册用户需要跳转到注册页面
                        'mobile'=>$mobile,
                        );

                    $_SESSION['mobile']=  $mobile;

                     return parent::JsonSuccess($data);

                 }else{

                    return parent::JsonError('暂无数据!');

                 }

                return parent::JsonError('验证码不正确!');

            }

        }else{

            return parent::JsonError('验证码不正确!');
        }







    }
    //快速登录短信接口
    public function duanxin(){
        session_start();
        header('content-type:text/html;charset=utf-8');

        $vertify = rand(1111, 9999);

        // Session('vertify',$verify,3000); //过期时间5分钟
        // Session('mobile',$mobile,3000);
        $mobile = $_REQUEST['mobile'];

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


    //qq第三方登录
    //
    public function qqdenglu(){







    }



    //微信第三方登录
    public function weixindenglu(){

         // 回调地址

         $url = urlencode($_REQUEST['url']);
         // $url = urlencode("http://www.xxxxxxxxx.com/api_login.php");
         // 公众号的id和secret
         $appid = 'wxe1de742419056f20';
         $appsecret = '995918892ecf6a6b635699eda2dd2f25';
         session_start();


         // 获取code码，用于和微信服务器申请token。 注：依据OAuth2.0要求，此处授权登录需要用户端操作
         if(!isset($_GET['code']) && !isset($_SESSION['code'])){
              $data = array(

                'url'=>'<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx6c11a252ff1d00c4&redirect_uri='.$url.'&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"><font style="font-size:30">授权</font></a>'
              );

            return parent::JsonSuccess($data);
            exit;
         }

         // 依据code码去获取openid和access_token，自己的后台服务器直接向微信服务器申请即可
         if (isset($_GET['code']) && !isset($_SESSION['token'])){
          $_SESSION['code'] = $_GET['code'];

          $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid.
           "&secret=".$appsecret."&code=".$_GET['code']."&grant_type=authorization_code";
          $res = https_request($url);
          $res=(json_decode($res, true));
          $_SESSION['token'] = $res;
         }


         // 依据申请到的access_token和openid，申请Userinfo信息。
         if (isset($_SESSION['token']['access_token'])){
          $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$_SESSION['token']['access_token']."&openid=".$_SESSION['token']['openid']."&lang=zh_CN";

          $res = https_request($url);
          $res = json_decode($res, true);

          $_SESSION['userinfo'] = $res;

         }

         $data = array(
            'userinfo'=>$_SESSION['userinfo'],
            'token'=>$_SESSION['token'],
            );

        return parent::JsonSuccess($data);

    }



}
?>