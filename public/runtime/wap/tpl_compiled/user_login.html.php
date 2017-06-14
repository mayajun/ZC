<?php echo $this->fetch('inc/header.html'); ?>
<!-- 登录 开始 -->  
<section class="login p10 tc">
	<form id="user_login_form" name="user_login_form" action="<?php
echo parse_url_tag_wap("u:user#do_login|"."".""); 
?>">
		<input class="input100 sizing" type="text"  name="email" id="email" placeholder="手机号/会员名/邮箱" required="required">
		<input class="input100 sizing" type="password"  autocomplete="off" name="user_pwd"  id="user_pwd" placeholder="输入登录密码" required="required">
		<div class="blank10"></div>
		<input class="ui-button theme_color" type="button" name="submit_form" value="登录" rel="ui-button">
		<input type="hidden" name="ajax" value="1">
		<input type="hidden" name="target" value="<?php echo $this->_var['target']; ?>">
	</form>
	<a class="f_l rgst f_red pt10" href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:user#register|"."target=".$this->_var['target']."".""); 
?>','#user-register',2);">注册账号</a>
	<?php if (app_conf ( "USER_VERIFY" ) == 2): ?>
		<a class="f_r rgst f_red pt10" href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:user#getpassword|"."target=".$this->_var['target']."".""); 
?>','#user-getpassword',2);">忘记密码？</a>
	<?php endif; ?>
	<div class="blank"></div>
</section>
<!-- 登录 结束 -->  
<?php echo $this->fetch('inc/footer.html'); ?>