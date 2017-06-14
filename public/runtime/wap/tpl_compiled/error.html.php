<?php echo $this->fetch('inc/header.html'); ?> 
<style type="text/css">
	body{background:#fff;}
</style>
<?php if ($this->_var['stay'] == 0): ?>
<meta http-equiv="refresh" content="3;URL=<?php echo $this->_var['jump']; ?>" />
<?php endif; ?>
<section class="oper_tip mod_main">
	<div class="f16 f_red tc">操作错误！</div>
	<div class="blank15"></div>
	<div class="full msgbox">
		<p>
		<?php if ($this->_var['integrate_result']): ?>
		<?php echo $this->_var['integrate_result']; ?>
		<?php endif; ?>
		<?php echo $this->_var['msg']; ?>	
		</p>
		<div class="blank"></div>
		<?php if ($this->_var['stay'] == 0): ?>
		<div class="return_jump">								
			请点击此处直接 [<a href="<?php echo $this->_var['jump']; ?>">返回</a>] 或者等待三秒钟后自动跳转。		
		</div>
		<?php endif; ?>
	</div>
</section>
<?php echo $this->fetch('inc/footer.html'); ?> 