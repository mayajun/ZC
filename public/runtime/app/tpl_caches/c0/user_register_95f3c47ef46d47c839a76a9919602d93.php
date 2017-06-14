<?php exit;?>a:3:{s:8:"template";a:3:{i:0;s:59:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/user_register.html";i:1;s:71:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/inc/header_login_register.html";i:2;s:71:"D:/AppServ/www/zhongchou/app/Tpl/fanwe_1/inc/footer_login_register.html";}s:7:"expires";i:1497454377;s:8:"maketime";i:1497450777;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="renderer" content="webkit" />
<meta name="keywords" content="百岁帮" />
<meta name="description" content="百岁帮" />
<title>会员注册 - 百岁帮 - 百岁帮</title>
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
			<div class="f_yahei no-nav-text">注册</div>
			<!---->
			<div class="blank0"></div>
		</div>
	</div>
	<p class="head_bg"></p>
</div><link rel="stylesheet" type="text/css" href="http://demo.zc.com/public/runtime/statics/e1747d3c21c9ddd3649297950116a5d5.css?v=1.61" />
<script type="text/javascript" src="http://demo.zc.com/public/runtime/statics/9236049fa2d9cf94dedd5775d46bb3a7.js?v=1.61"></script>
<div class="blank"></div>
<style>
	.nav li{float:left;}
	.hidden{display:none;}
	.c{color:#690}
	.c{color:#12ADFF;}
	.control-label{width:70px;}
	.control-group{float:left; overflow:visible}
	.dlmain {width:1000px; background:url(http://demo.zc.com/app/Tpl/fanwe_1/images/images/reglog_bg.gif) #fcfcfc repeat-y; }
	.tip_box{float:left}
	.holder_tip{top:0;left:0;}
	.term{margin-left:95px;}
</style>
<div class="blank20"></div>
<div class="my_shadow_bg">
	<div class="blank"></div>
	<div class="dlmain" style="overflow:hidden">
		<div class="left f_l dlr" style="width:594px;_width:580px">
			<div class="link_dash f25 dlr1">
				<ul class="nav myLine">
					<li class="theme_fcolor">用户注册</li>
				</ul>
			</div>
			<div class="item c_1 hidden">
				<form id="user_register_form" name="user_register_form" action="">
				<div class="control-group mycontrol-group">
					<label class="control-label"><span class="f_red">*</span>会员名称</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text" value="" class="textbox" name="user_name"/>
							<span class="holder_tip">至少输入4个字符</span>
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
				<div class="control-group mycontrol-group">
					<label class="control-label"><span class="f_red">*</span>创建密码</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="password"  autocomplete="off" name="user_pwd"  class="textbox" />
							<span class="holder_tip">至少输入4个字符</span>
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
				<div class="control-group mycontrol-group">
					<label class="control-label"><span class="f_red">*</span>确认密码</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="password"  autocomplete="off" name="confirm_user_pwd"  class="textbox" />
							<span class="holder_tip">至少输入4个字符</span>
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
					
				<div class="control-group mycontrol-group">
					<label class="control-label"><span class="f_red">*</span>电子邮箱</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text" class="textbox" name="email"/>
							<span class="holder_tip">请正确输入电子邮箱，可用于密码找回</span>
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
									
				<div class="control-group mycontrol-group">
					<label for="signup-email-code" class="control-label"><span class="f_red">*</span>验证码</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text" id="image_code" name="image_code" class="textbox f_l" style="width:50px;margin-right:10px" />
							<img src="http://demo.zc.com/verify.php?name=register_verify" alt="http://demo.zc.com/verify.php?name=register_verify" id="verify" align="absmiddle" height="41">
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
																							 	<div class="blank0"></div>
				<div class="button_row term">
					<label class="ui_checkbox" rel="agree_register" id="agree_register">
						<input type="checkbox" value="1" checked="checked" />	
					</label>
					<a href="/index.php?ctl=help&act=term" target="_blank">《百岁帮服务条款》</a>
				</div>
				<div class="blank10"></div>
				<div class="button_row do_register control-group">
					<label class="control-label"></label>
					<input type="button" value="注册" name="submit_form" class="ui-button theme_bgcolor" id="btn_do_register" />
					<input type="hidden" value="1" name="ajax" />
					<input  type="hidden" name="user_verify" value="0" />
					<div class="blank15"></div>
				</div>
				</form>
			</div>
		</div>	
		<div class="f_r dl" style="overflow:hidden">
			<div class="shell login">
	            已是我们的会员！  <a href="/index.php?ctl=user&act=login" style="color:#0196db;"> 登录</a>
	        </div>
	   		 <div class="linebg clearfix shell">
	            <b class="fond"></b>
	            合作账号登录
	            <b class="back"></b>
	        </div>
	        <div class="api_login tc">
				554fcae493e564ee0dc75bdf2ebf94caapi_login|YToxOntzOjQ6Im5hbWUiO3M6OToiYXBpX2xvZ2luIjt9554fcae493e564ee0dc75bdf2ebf94ca			</div>
		</div>
		<div class="blank"></div>
	</div>
</div>
<div class="blank20"></div>
<script type="text/javascript">
	var code_timeer = null;
	var code_lefttime = 0 ;
	$(function(){
		
		// 同意条款
		$("#agree_register").on('click',function(){
			if($(this).find("input[type='checkbox']").is(':checked')){
				$("#btn_do_register").removeAttr("disabled").addClass("theme_bgcolor").removeClass("bg_gray");
			}
			else{
				$("#btn_do_register").attr("disabled","disabled").addClass("bg_gray").removeClass("theme_bgcolor");
			}
		});
		$(".c_1").show();
		$(".n_1").addClass("c");
		$("#J_send_sms_verify").bind("click",function(){
			send_mobile_verify_sms();
		});
		
		$("#J_send_email_verify").bind("click",function(){
			email=$("#user_register_form").find("input[name='email']").val();
			send_email_verify(1,email,"#J_send_email_verify");
 		});
		
		$("#verify").bind("click",function(){
			timenow = new Date().getTime();
			$(this).attr("src",$(this).attr("alt")+"&rand="+timenow);
		});
	});	
	function send_mobile_verify_sms(){
		$("#J_send_sms_verify").unbind("click");
	
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			form_error($("#settings-mobile"),"手机号码格式错误");	
			$("#J_send_sms_verify").bind("click",function(){
				send_mobile_verify_sms();
			});
			return false;
		}
		
		if(!$.maxLength($("#settings-mobile").val(),11,true))
		{
			$("#settings-mobile").focus();
			$("#settings-mobile").next().show().text("长度不能超过11位");			
			$("#settings-mobile").next().css({"color":"red"});
			$("#J_send_sms_verify").bind("click",function(){
				
				send_mobile_verify_sms();
			});
			return false;
		}
		
		if($.trim($("#settings-mobile").val()).length == 0)
		{				
			form_error($("#settings-mobile"),"手机号码不能为空");
			$("#J_send_sms_verify").bind("click",function(){
				send_mobile_verify_sms();
			});
			return false;
		}
	
	   	var ajaxurl =  "/index.php?ctl=ajax&act=check_field&is_only=1";
		var query = new Object();
		query.field_name = "mobile";
		query.field_data = $.trim($("#settings-mobile").val());
		
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{	
					var sajaxurl = "/index.php?ctl=ajax&act=send_mobile_verify_code&is_only=1";
					var squery = new Object();
					squery.mobile = $.trim($("#settings-mobile").val());
					squery.is_register = 1;
					squery.image_code = $.trim($("#image_code").val());
					$.ajax({ 
						url: sajaxurl,
						data:squery,
						type: "POST",
						dataType: "json",
						success: function(sdata){
								
							if(sdata.status==1)
							{
								code_lefttime = 60;
								code_lefttime_func();
								$.showSuccess(sdata.info);
								return false;
							}
							else
							{
									
								$("#J_send_sms_verify").bind("click",function(){
									send_mobile_verify_sms();
								});
								$.showErr(sdata.info);
								return false;
							}
						}
					});	
				}
				else
				{	
					$("#J_send_sms_verify").bind("click",function(){
						send_mobile_verify_sms();
					});			
					form_error($("#settings-mobile"),data.info);
					return false;
				}
			}
		});	
	}
	function code_lefttime_func(){
		clearTimeout(code_timeer);
		$("#J_send_sms_verify").val(code_lefttime+"秒后重新发送");
		$("#J_send_sms_verify").addClass("ui-button-sms-activer").removeClass("bg_red").removeClass("bg_red1");
		code_lefttime--;
		if(code_lefttime >0){
			$("#J_send_sms_verify").attr("disabled","disabled");
			code_timeer = setTimeout(code_lefttime_func,1000);
		}
		else{
			code_lefttime = 60;
			$("#J_send_sms_verify").removeAttr("disabled");
			$("#J_send_sms_verify").val("发送验证码");
			$("#J_send_sms_verify").addClass("bg_red").removeClass("ui-button-sms-activer");
			$("#J_send_sms_verify").bind("click",function(){
				send_mobile_verify_sms();
			});
		}
		
	}	
</script>
<div class="blank"></div>
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