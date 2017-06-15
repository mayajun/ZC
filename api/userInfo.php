<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 甘味人生(526130@qq.com)
// +----------------------------------------------------------------------

require '../system/system_init.php';


//常量定义
define('UC_CLIENT_RELEASE', '20081031');

define('API_DELETEUSER', 1);		//note 用户删除 API 接口开关
define('API_RENAMEUSER', 1);		//note 用户改名 API 接口开关
define('API_GETTAG', 1);		//note 获取标签 API 接口开关
define('API_SYNLOGIN', 1);		//note 同步登录 API 接口开关
define('API_SYNLOGOUT', 1);		//note 同步登出 API 接口开关
define('API_UPDATEPW', 1);		//note 更改用户密码 开关
define('API_UPDATEBADWORDS', 1);	//note 更新关键字列表 开关
define('API_UPDATEHOSTS', 1);		//note 更新域名解析缓存 开关
define('API_UPDATEAPPS', 1);		//note 更新应用列表 开关
define('API_UPDATECLIENT', 1);		//note 更新客户端缓存 开关

define('API_RETURN_SUCCEED', '1');
define('API_RETURN_FAILED', '-1');
define('API_RETURN_FORBIDDEN', '-2');

$GLOBALS['cookie_path'] = str_replace("api/","",$GLOBALS['cookie_path']);




class userInfo {

    public function index(){
        $id = I('id');
        dump($id);
        exit;
    }
    
    
	

}


/**
 * 对数组进行转码操作
 * @param $array
 * @param $in_charset
 * @param $out_charset
 */
function iconv_array(&$array,$in_charset,$out_charset)
{
	if(UC_CHARSET!='utf-8')
	{
		foreach($array as $k=>$v)
		{
			if(is_array($array[$k]))
			{
				iconv_array($array[$k],$in_charset,$out_charset);
			}
			else
			{
				$array[$k] = iconv($in_charset,$out_charset,$array[$k]);
			}
		}
	}	
}


/**
 *  uc自带函数1
 *
 * @access  public
 * @param   string  $string
 *
 * @return  string  $string
 */
function _setcookie($var, $value, $life = 0, $prefix = 1)
{
    global $cookiepre, $cookiedomain, $cookiepath, $timestamp, $_SERVER;
    setcookie(($prefix ? $cookiepre : '').$var, $value,
        $life ? $timestamp + $life : 0, $cookiepath,
        $cookiedomain, $_SERVER['SERVER_PORT'] == 443 ? 1 : 0);
}

/**
 *  uc自带函数2
 *
 * @access  public
 *
 * @return  string  $string
 */
function _authcode($string, $operation = 'DECODE', $key = '', $expiry = 0)
{
    $ckey_length = 4;
    $key = md5($key ? $key : UC_KEY);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);

    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);

    $result = '';
    $box = range(0, 255);

    $rndkey = array();
    for($i = 0; $i <= 255; $i++)
    {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for($j = $i = 0; $i < 256; $i++)
    {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for($a = $j = $i = 0; $i < $string_length; $i++)
    {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if($operation == 'DECODE')
    {
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16))
        {
            return substr($result, 26);
        }
        else
        {
            return '';
        }
    }
    else
    {
        return $keyc.str_replace('=', '', base64_encode($result));
    }
}

/**
 *  uc自带函数3
 *
 * @access  public
 * @param   string  $string
 *
 * @return  string  $string
 */
function _stripslashes($string)
{
    if(is_array($string))
    {
        foreach($string as $key => $val)
        {
            $string[$key] = _stripslashes($val);
        }
    }
    else
    {
        $string = stripslashes($string);
    }
    return $string;
}
?>