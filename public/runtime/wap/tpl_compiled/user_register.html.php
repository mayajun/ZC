<?php echo $this->fetch('inc/header.html'); ?>
<style type="text/css">
	.btn_yzm{width:108px;float:none;font-size:14px;letter-spacing:0;}
</style>
<!--login-->  
<div class="blank15"></div>
<section class="user_register">
  <form id="user_register_form" name="user_register_form" action="<?php
echo parse_url_tag_wap("u:user#do_register|"."".""); 
?>">
  	<div class="ul_block">
  		<ul>
  			<li class="webkit-box">
				<label class="input_lable">会员名称</label>
				<input type="text" placeholder="请输入会员名称" name="user_name" value="" class="textbox webkit-box-flex" />
			</li>
			<li class="webkit-box">
				<label class="input_lable">登录密码</label>
				<input type="password"  autocomplete="off" placeholder="请输入登录密码" name="user_pwd" value="" class="textbox webkit-box-flex" />
			</li>
			<li class="webkit-box">
				<label class="input_lable">确认密码</label>
				<input type="password"  autocomplete="off" placeholder="请输入确认密码" name="confirm_user_pwd" value="" class="textbox webkit-box-flex" />
			</li>
			<?php if (app_conf ( "USER_VERIFY" ) != 2): ?>
			<li class="webkit-box">
 				<label class="input_lable">电子邮箱:</label>
				<input type="text" placeholder="输入电子邮箱" name="email" value="" class="textbox webkit-box-flex" />
 			</li>
			<?php endif; ?>
			<?php if (app_conf ( "USER_VERIFY" ) == 1 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 5): ?>
			<li class="webkit-box">
				<input type="text" placeholder="输入邮箱验证码" name="verify_coder_email" value="" class="textbox webkit-box-flex mr10" />
				<input class="ui-button btn_yzm bg_red" type="button" value="获取验证码"  id="J_send_email_verify" rel="ui-button">
			</li>
			<?php endif; ?>
			<?php if (app_conf ( "USER_VERIFY" ) == 2 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 5 || app_conf ( "USER_VERIFY" ) == 6): ?>
			<li class="webkit-box">
				<label class="input_lable">手机号码</label>
				<input type="text" placeholder="输入手机号码" name="mobile" id="settings-mobile" value="" class="textbox webkit-box-flex" />
			</li>
			<?php endif; ?>
			<?php if (app_conf ( "USER_VERIFY" ) == 2 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 6): ?>
			<li class="webkit-box">
				<input type="text" placeholder="输入手机验证码" name="verify_coder" value="" class="textbox webkit-box-flex mr10" />
				<input class="ui-button btn_yzm bg_red" type="button" value="获取验证码"  id="J_send_sms_verify" rel="ui-button">
			</li>
			<?php endif; ?>
  		</ul>
  	</div>
	<div class="mod_main"> 
		<input class="ui-button theme_color" type="button" name="submit_form"  value="注册" rel="ui-button">
		<input type="hidden" value="1" name="ajax" />
		<input type="hidden" name="target" value="<?php echo $this->_var['target']; ?>">
	</div>
  </form>
</section>
<div class="blank15"></div>
<script>
	<?php if (app_conf ( "USER_VERIFY" ) == 2 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 5 || app_conf ( "USER_VERIFY" ) == 6): ?>
		var is_mobile=1;
		<?php if (app_conf ( "USER_VERIFY" ) != 5): ?>
			var is_mobile_verify=1;
		<?php else: ?>
			var is_mobile_verify=0;
		<?php endif; ?>
	<?php else: ?>
		var is_mobile=0;
		var is_mobile_verify=0;
	<?php endif; ?>
	<?php if (app_conf ( "USER_VERIFY" ) != 2): ?>
		var is_email=1;
		<?php if (app_conf ( "USER_VERIFY" ) == 1 || app_conf ( "USER_VERIFY" ) == 4 || app_conf ( "USER_VERIFY" ) == 5): ?>
			var is_email_verify=1;
		<?php else: ?>
			var is_email_verify=0;
		<?php endif; ?>
	<?php else: ?>
		var is_email=0;
	<?php endif; ?>
</script>
<!-- user_register.js -->
<?php echo $this->fetch('footer.html'); ?>