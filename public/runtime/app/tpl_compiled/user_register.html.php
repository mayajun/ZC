<?php echo $this->fetch('inc/header_login_register.html'); ?>
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/user_register.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/login_reg.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/user_register.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/user_register.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<div class="blank"></div>
<style>
	.nav li{float:left;}
	.hidden{display:none;}
	.c{color:#690}
	.c{color:#12ADFF;}
	.control-label{width:70px;}
	.control-group{float:left; overflow:visible}
	.dlmain {width:1000px; background:url(<?php echo $this->_var['TMPL']; ?>/images/images/reglog_bg.gif) #fcfcfc repeat-y; }
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
				<form id="user_register_form" name="user_register_form" action="<?php echo $this->_var['url']; ?>">
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
				<?php if (app_conf ( "USER_VERIFY" ) != 2): ?>	
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
				<?php endif; ?>
				<?php if (app_conf ( "USER_VERIFY_STATUS" ) == 1): ?>	
				<div class="control-group mycontrol-group">
					<label for="signup-email-code" class="control-label"><span class="f_red">*</span>验证码</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text" id="image_code" name="image_code" class="textbox f_l" style="width:50px;margin-right:10px" />
							<img src="./verify.php?name=register_verify" alt="./verify.php?name=register_verify" id="verify" align="absmiddle" height="41">
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
				<?php else: ?>
				<div class="control-group mycontrol-group">
			 		<input type="hidden" id="image_code" name="image_code" class="textbox f_l" value="0" style="width:50px;margin-right:10px" />
				 	<img src="./verify.php?name=register_verify" alt="./verify.php?name=register_verify" id="verify" align="absmiddle" height="41" style="display:none;">
				 </div>
				<?php endif; ?>
				<?php if (app_conf ( "USER_VERIFY" ) == 1 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 5): ?>
				<div class="control-group mycontrol-group">
					<label for="signup-email-code" class="control-label"><span class="f_red">*</span>邮件验证</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text control-label" id="settings_email_code" name="verify_coder_email" class="textbox f_l" style="width:50px;margin-right:10px" />
							<input type="button" value="获取验证码" class="ui-button_active send_sms_verify bg_red" id="J_send_email_verify" />
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
				<?php endif; ?>
				<?php if (app_conf ( "USER_VERIFY" ) == 2 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 5 || app_conf ( "USER_VERIFY" ) == 6): ?>
				<div class="control-group mycontrol-group">
					<label for="signup-mobile control-label" class="control-label"><span class="f_red">*</span>手机号码</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text" value="" class="textbox" id="settings-mobile" name="mobile" size="30">
							<span class="holder_tip">请输入11位有效的手机号</span>
						</div>
						<div class="tip_box"></div>
					</div>
					<div class="blank0"></div>
				</div>
				<?php endif; ?>
				<?php if (app_conf ( "USER_VERIFY" ) == 2 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 6): ?>
				<div class="control-group mycontrol-group">
					<label for="signup-mobile-code" class="control-label"><span class="f_red">*</span>手机验证</label>
					<div class="control-text">
						<div class="pr f_l">
							<input type="text" id="settings-mobile-code" name="verify_coder" class="textbox f_l" style="width:50px;margin-right:10px" />
							<input type="button" value="获取验证码" class="send_sms_verify ui-button bg_red f_l" id="J_send_sms_verify" rel="ui-button" />
						</div>
						<div class="tip_box f_l"></div>
					</div>
					<div class="blank0"></div>
				</div>
				<?php endif; ?>
				<?php if (app_conf ( "USER_INVESTMENT" ) == 1): ?>
				<div class="small-control-group mycontrol-group" style="overflow:visible">
					<label class="control-label">会员类型</label>
					<select name="select_box" id="select_box" class="ui-select field_select small">
	              		<option value="0">请选择类型</option>
						<option value="1">创业者</option>
						<option value="2">投资者</option>		 
					</select>
					<div class="blank0"></div>
				</div>
				<?php endif; ?>
			 	<div class="blank0"></div>
				<div class="button_row term">
					<label class="ui_checkbox" rel="agree_register" id="agree_register">
						<input type="checkbox" value="1" checked="checked" />	
					</label>
					<a href="<?php
echo parse_url_tag("u:help#term|"."".""); 
?>" target="_blank">《<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?>服务条款》</a>
				</div>
				<div class="blank10"></div>
				<div class="button_row do_register control-group">
					<label class="control-label"></label>
					<input type="button" value="注册" name="submit_form" class="ui-button theme_bgcolor" id="btn_do_register" />
					<input type="hidden" value="1" name="ajax" />
					<input  type="hidden" name="user_verify" value="<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'USER_VERIFY',
);
echo $k['name']($k['v']);
?>" />
					<div class="blank15"></div>
				</div>
				</form>
			</div>
		</div>	
		<div class="f_r dl" style="overflow:hidden">
			<div class="shell login">
	            已是我们的会员！  <a href="<?php
echo parse_url_tag("u:user#login|"."".""); 
?>" style="color:#0196db;"> 登录</a>
	        </div>
	   		 <div class="linebg clearfix shell">
	            <b class="fond"></b>
	            合作账号登录
	            <b class="back"></b>
	        </div>
	        <div class="api_login tc">
				<?php 
$k = array (
  'name' => 'api_login',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
			</div>
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
			form_error($("#settings-mobile"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => '手机号码不能为空',
  'value' => '手机号码',
);
echo $k['name']($k['format'],$k['value']);
?>");
			$("#J_send_sms_verify").bind("click",function(){
				send_mobile_verify_sms();
			});
			return false;
		}
	
	   	var ajaxurl =  "<?php
echo parse_url_tag("u:ajax#check_field|"."is_only=1".""); 
?>";
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
					var sajaxurl = "<?php
echo parse_url_tag("u:ajax#send_mobile_verify_code|"."is_only=1".""); 
?>";
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
<?php echo $this->fetch('inc/footer_login_register.html'); ?>