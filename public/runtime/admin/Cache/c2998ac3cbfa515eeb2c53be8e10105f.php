<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript" src="__TMPL__Common/js/check_dog.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/IA300ClientJavascript.js"></script>
<script type="text/javascript">
	var ACTION_ID ='<?php echo $action_id ?>';
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
	var LOGINOUT_URL = '<?php echo u("Public/do_loginout");?>';
	var WEB_SESSION_ID = '<?php echo es_session::id(); ?>';
	var EMOT_URL = '<?php echo APP_ROOT; ?>/public/emoticons/';
	var MAX_FILE_SIZE = "<?php echo (app_conf("MAX_IMAGE_SIZE")/1000000)."MB"; ?>";
	var FILE_UPLOAD_URL ='<?php echo u("File/do_upload");?>' ;
	CHECK_DOG_HASH = '<?php $adm_session = es_session::get(md5(conf("AUTH_KEY"))); echo $adm_session["adm_dog_key"]; ?>';
	function check_dog_sender_fun()
	{
		window.clearInterval(check_dog_sender);
		check_dog2();
	}
	var check_dog_sender = window.setInterval("check_dog_sender_fun()",5000);
	
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/lang/zh_CN.js'></script>
</head>
<body onLoad="javascript:DogPageLoad();">
<div id="info"></div>

<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<div class="main">
<div class="main_title">网站数据统计</div>
<div class="blank5"></div>
<style>
.statistics{padding-left:8px;}
.item_title_s{  text-align: right; width:120px;}
.right_table td { border-width:0 !important;
  }
a{
text-decoration:none;
}
</style>


<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title" style="width:200px;">
				会员统计
			</td>
			<td class="item_input">
			<span id="version_tip">			
			<span class="statistics"><a href="<?php echo ($URL_NAME); ?>?m=User&a=index&"><?php echo ($user_count); ?>个注册用户</a>; </span> 
		<span class="statistics"> <a href="<?php echo ($URL_NAME); ?>?m=User&a=index&"><?php echo ($user_level); ?>个普通用户</a>; </span> 
		<span class="statistics"><a href="<?php echo ($URL_NAME); ?>?m=User&a=index&is_investor=1"> 投资人:<?php echo ($is_investor); ?>个</a>;</span> 
		<span class="statistics"> <a href="<?php echo ($URL_NAME); ?>?m=User&a=index&is_investor=2"> 投资机构:<?php echo ($institution); ?>个</a>;</span> 
		<span class="statistics"> <a href="<?php echo ($URL_NAME); ?>?m=User&a=index&is_investor=1">通过实名认证<?php echo ($is_identify); ?>个</a></span> 
			
			</span>
			</td>
		</tr>		
		<tr>
		<td class="item_title" style="width:200px;">网站资金统计</td>
		
		<td>		
		<table class="right_table">		
		<tr><td class="item_title_s" >会员充值：</td>   <td>￥<?php echo ($money_diy); ?></td></tr>
		<tr><td class="item_title_s">管理员充值:</td>   <td>+￥<?php echo ($money_admin); ?></td></tr>
		<tr><td class="item_title_s">会员提现: </td>   <td>-￥ <?php echo ($user_refund); ?> <a href="<?php echo ($URL_NAME); ?>?m=UserRefund&a=index">查看详情</a></td></tr>
		<tr><td class="item_title_s">网站余额统计:</td>   <td> ￥<?php echo ($web_amount); ?> </td></tr>		
		</table>			
		</td></tr>		
		<tr>
			<td class="item_title" style="width:200px;">
				第三方资金统记
			</td>
			<td class="item_input">		
		<table class="right_table">		
		<tr><td class="item_title_s" >会员充值:</td>   <td>+￥<?php echo ($three_rechange); ?>  <a href="<?php echo ($URL_NAME); ?>?m=YeepayRecharge&a=index">查看详情</a></td></tr>
		<tr><td class="item_title_s"> 会员提现:</td>   <td>-￥<?php echo ($three_yeepay_withdraw); ?>  <a href="<?php echo ($URL_NAME); ?>?m=YeepayWithdraw&a=index">查看详情</a></td></tr>
		<tr><td class="item_title_s"> 第三方余额统计: </td>   <td>+￥<?php echo ($three_balance); ?></td></tr>	
		</table>
			</td>
		</tr>
		<tr>
			<td class="item_title" style="width:150px;">
				项目统计
			</td>
			<td class="item_input">
			
		<table class="right_table" >		
		<tr><td class="item_title_s"   style="width:150px;>待审核项目：</td>   <td><?php echo ($no_effect); ?>个</td></tr>
		<tr><td class="item_title_s"> 预热项目:</td>   <td><?php echo ($no_begain); ?>  个</td></tr>
		<tr><td class="item_title_s"> 进行中项目: </td>   <td><?php echo ($is_effect); ?>个</td></tr>	
		<tr><td class="item_title_s">筹资成功回报项目： </td><td><?php echo ($is_success); ?>个</td></tr>	
		<tr><td class="item_title_s">筹资失败回报项目： </td><td><?php echo ($no_success); ?>个</td></tr>	
		<tr><td class="item_title_s"> 融资成功项目：</td><td><?php echo ($stock_is_success); ?>个</td></tr>	
		<tr><td class="item_title_s"> 融资失败项目：</td><td><?php echo ($stock_no_success); ?>个</td></tr>	
		<tr><td class="item_title_s">未通过审核项目: </td><td><?php echo ($is_effect_forbid); ?>个</td></tr>	
		</table>
			</td>
		</tr>
		<tr>
			<td class="item_title" style="width:200px;">
				筹款统记
			</td>
			<td class="item_input">
			
		<table class="right_table" >	
	    <tr><td class="item_title_s" >成功筹款:</td><td><?php echo ($success_amount); ?>￥</td></tr>
	    <tr><td class="item_title_s">已发放筹款: </td><td><?php echo ($deal_pay_log); ?>￥</td></tr>	
	    <tr><td class="item_title_s">待发放筹款:</td><td><?php echo ($no_deal_pay_log); ?>￥</td></tr>	
		</table>
			</td>
		</tr>
		<tr>
			<td class="item_title" style="width:200px;">
			网站收益
			</td>
			<td class="item_input" style="padding-left:20px;">
				 项目佣金:￥<?php echo ($commission); ?>
			</td>
		</tr>
		<tr>
			<td class="item_title" style="width:200px;">
				用户缴纳的诚意金
			</td>
			<td class="item_input" style="padding-left:21px;">
				 用户缴纳的诚意金:￥<?php echo ($margator_money); ?>
			</td>
		</tr>
 		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table>	
</body>
</html>