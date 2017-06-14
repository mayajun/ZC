<?php exit;?>a:3:{s:8:"template";a:4:{i:0;s:56:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/user_login.html";i:1;s:71:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/inc/header_login_register.html";i:2;s:64:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/inc/user_login_box.html";i:3;s:71:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/inc/footer_login_register.html";}s:7:"expires";i:1497454383;s:8:"maketime";i:1497450783;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="renderer" content="webkit" />
<meta name="keywords" content="百岁帮" />
<meta name="description" content="百岁帮" />
<title>会员登录 - 百岁帮 - 百岁帮</title>
<link rel="stylesheet" type="text/css" href="http://demo.zc.com/public/runtime/statics/89b00a04062ce7e4b2b0aac80166b6d3.css?v=1.61" />
<script type="text/javascript">
var APP_ROOT = '';
var LOADER_IMG = 'http://demo.zc.com/app/Tpl/fanwe_1/images/lazy_loading.gif';
var ERROR_IMG = 'http://demo.zc.com/app/Tpl/fanwe_1/images/image_err.gif';
var send_span = 2000;
var __HASH_KEY__ = "554fcae493e564ee0dc75bdf2ebf94caget_hash_key|YToxOntzOjQ6Im5hbWUiO3M6MTI6ImdldF9oYXNoX2tleSI7fQ==554fcae493e564ee0dc75bdf2ebf94ca";
var DO_REGISTER_URL = "/index.php?ctl=user&act=do_register";
var REGISTER_CHECK_URL = "/index.php?ctl=user&act=register_check";
var CHECK_VERIFY_CODE_URL = "/index.php?ctl=ajax&act=check_verify_code";
</script>
<script type="text/javascript" src="http://demo.zc.com/public/runtime/statics/7bb9e3f588cbcb5173a78b82f31b6361.js?v=1.61"></script>
<!--[if IE 6]>
	<script src="http://demo.zc.com/app/Tpl/fanwe_1/js/fanwe_utils/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
	DD_belatedPNG.fix('.banner .btn_tit ul li.on , .banner .btn_tit ul li , .mx_1 , .mx_2 , .mx_3 , .mx_4 , .xzdq1 , .zcz , .timeline-left-gray , .deal_log_title .title , .timeline-comment-top , .timeline-start span , .pageleft a , .dz , .kj , .boxaddress , .xzdq , .con6 .sub , .fx i , .attention_focus_deal i , .head_down_icon , .banner .prev , .banner .next , .mxr_1 , .mxr_2 , .mxr_3 , .shenhe .shenhe_info li , .mod_title i , .box4 .mod_cont3 .leader_t , .box4 .mod_cont3 .leader_w , .box4 .mod_cont3 .leader_r , .box4 .mod_cont3 .leader_x , .box4 .mod_cont3 .leader_p , .step_box , .pageleft a i , .invester_all .col_a , .article_l li.on , .article_box .article_r_list h3'); 
	</script>
<![endif]-->
<style type="text/css">
	body{background:#f3f3f3;}
	.dlmain { background:url(http://demo.zc.com/app/Tpl/fanwe_1/images/images/reglog_bg.gif) repeat-y; }
	.dlr1{margin-bottom:50px}
	.J_wrap{position:relative;z-index:3;}
	.my_shadow_bg{position:relative;z-index:2;}
</style>
</head>
<body>
<div class="head_1 z100" id="J_head">
	<div class="head_cont" style="background:#fff">
		<div class="wrap1000 constr clearfix">
			<div class="logo_1 f_l">
				<a class="link" href="/">
										<img src="http://demo.zc.com/public/attachment/201602/16/17/56c2ea5ce3b23.png" />
				</a>
			</div>
			<!---->
			<div class="f_yahei no-nav-text">登录</div>
			<!---->
			<div class="blank0"></div>
		</div>
	</div>
	<p class="head_bg"></p>
</div> 
<div id="J_wrap">
	<div class="blank80"></div>
	<div class="my_shadow_bg" style="margin:0">
		<link rel="stylesheet" type="text/css" href="http://demo.zc.com/public/runtime/statics/433a362ef634cabeff4c7bfd2b5cc88b.css?v=1.61" />
<script type="text/javascript" src="http://demo.zc.com/public/runtime/statics/abfe17fd96c73b9c649e0a147bb73bd4.js?v=1.61"></script>
<style>
	.dlmain{position:relative;z-index:1;}
	.control-group{float:left;overflow:visible;}
	.dlmain {width:1000px;position:relative;z-index:1;background:url(http://demo.zc.com/app/Tpl/fanwe_1/images/images/reglog_bg.gif) #fcfcfc repeat-y; }
	.control-group label{width:30px}
	.holder_tip{left:0;top:0;}
</style>
<div class="blank"></div>
<!--中间开始-->
<div class="dlmain" style="overflow:hidden">
	<div class="f_l dlr"  style="width:554px;">
		<div class="dlr1">
			<span class="f_l">用户登录</span>
		</div>
		<div class="blank0"></div>
		<form id="user_login_form" name="user_login_form" action="/index.php?ctl=user&act=do_login">
			<div class="control-group">
				<label class="control-label">账户</label>
				<div class="control-text">
					<div class="pr f_l">
						<input type="text" name="email" id="email" value="" class="textbox" />
						<span class="holder_tip">手机号/会员名/邮箱</span>
					</div>
				</div>
				<div class="blank0"></div>
			</div>
			<div class="control-group">
				<label class="control-label">密码</label>
				<div class="control-text">
					<div class="pr f_l">
						<input type="password"  autocomplete="off" name="user_pwd" id="user_pwd" value="" class="textbox" />
						<span class="holder_tip">请输入登录密码</span>
					</div>
					<a href="/index.php?ctl=user&act=getpassword" style="color:#1184df;font-size:13px;">忘记密码？</a>
				</div>
				<div class="blank0"></div>
			</div>
				
				<div class="control-group">
 					<label class="control-label">验证码</label>
					<div class="control-text">
						<input type="text" id="image_code" name="image_code" class="textbox" style="width:50px;" />
						<img src="http://demo.zc.com/verify.php?name=login_verify" alt="http://demo.zc.com/verify.php?name=login_verify" id="verify" align="absmiddle" height="41">
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
						<div class="blank0"></div>
	        <div class="control-group smaller-control-group tl">
	        	<label class="control-label"></label>
	        	<label class="ui_checkbox" rel="carry_type">
					<input type="checkbox" value="1" name="auto_login" checked="checked" />记住我（下次自动登录）
				</label>
	        </div>     
	        <div class="blank0"></div>
			<div class="control-group"> 
				<label class="title control-label"></label>
				<input type="button" value="登录" name="submit_form" class="ui-button theme_bgcolor" id="btn_do_login" />
				<input type="hidden" value="1" name="ajax" />
			</div>
		</form>
	</div>
	<div class="f_r dl" style="overflow:hidden">
		<div class="shell login">
            没有账号？<a href="/index.php?ctl=user&act=register" style="color:#0196db;">快速注册</a>
        </div>
   		 <div class="linebg clearfix shell">
            <b class="fond"></b>
            合作账号登录
            <b class="back"></b>
        </div>
        <div class="api_login tc">
        	554fcae493e564ee0dc75bdf2ebf94caapi_login|YToxOntzOjQ6Im5hbWUiO3M6OToiYXBpX2xvZ2luIjt9554fcae493e564ee0dc75bdf2ebf94ca        </div>
	</div>
	<div class="clear"></div>
</div>
<!--中间结束-->
<script type="text/javascript">
	$(function(){
		show_tip();
		setTimeout(autofillHide, 100);
		$("#verify").bind("click",function(){
			timenow = new Date().getTime();
			$(this).attr("src",$(this).attr("alt")+"&rand="+timenow);
		});
	});
	function autofillHide(){
	 	var obj = $("input[name='email']");
		var text = obj.val();
		if(text){
			$("#user_login_form").find(".holder_tip").hide();
		}
		else{
			$("#user_login_form").find(".holder_tip").show();
		}
	}		
</script>
<div class="blank"></div> 
	</div>
	<div class="blank80"></div>
</div>
<script type="text/javascript">
$(function(){
	resetWindowBox();
});
</script>
<div class="footer" pbid="footer" id="J_footer">
	<div class="footer-copy">
		<div class="footer-wrap">
			<div class="blank10"></div>
			<div style="color:#a5a5a5;font:12px 'SimSun';line-height:24px; text-align:center;">
				百岁帮&nbsp;<br />
				百岁帮			</div>	
		</div>
	</div>
</div>
</body>
</html> 
