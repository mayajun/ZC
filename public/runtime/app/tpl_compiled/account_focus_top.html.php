<div class="list_title clearfix">
	<div <?php if ($this->_var['f'] == 0): ?>class="cur"<?php endif; ?>>
		<a href="<?php echo $this->_var['status_0_url']; ?>">全部</a>
	</div>
	<div <?php if ($this->_var['f'] == 1): ?>class="cur"<?php endif; ?>>
		<a href="<?php echo $this->_var['status_1_url']; ?>">进行中</a>
	</div>
	<div <?php if ($this->_var['f'] == 2): ?>class="cur"<?php endif; ?>>
		<a href="<?php echo $this->_var['status_2_url']; ?>">成功的</a>
	</div>
	<div <?php if ($this->_var['f'] == 3): ?>class="cur"<?php endif; ?>>
		<a href="<?php echo $this->_var['status_3_url']; ?>">失败的</a>
	</div>
</div>