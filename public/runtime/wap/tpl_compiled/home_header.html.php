<div class="deal_header">
	<div class="deal_header_content tc">
		<div class="logo"><?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['home_user_info']['id'],
  't' => 'big',
);
echo $k['name']($k['p'],$k['t']);
?></div>
		<div class="name">
			<?php echo $this->_var['home_user_info']['user_name']; ?> 
			<?php if ($this->_var['home_user_info']['user_icon']): ?>
				<img src="<?php echo $this->_var['home_user_info']['user_icon']; ?>" title="会员等级" class="inline_level_icon level_icon">
			<?php endif; ?>
			<i class="icon iconfont theme_fcolor" rel="个人投资者认证">&#xe609;</i>
		</div>
		<div class="info"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['home_user_info']['create_time'],
  'f' => 'Y年m月d日',
);
echo $k['name']($k['v'],$k['f']);
?> 加入 <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?></div>
		<?php if ($this->_var['home_user_info']['province']): ?>
		<div class="other">
			<p>
				<span><i class="icon iconfont">&#xe624;</i><?php if ($this->_var['home_user_info']['province']): ?><?php echo $this->_var['home_user_info']['province']; ?> <?php echo $this->_var['home_user_info']['city']; ?><?php endif; ?></span>
			</p>
		</div>
		<?php endif; ?>
		<div class="operat">
			<a href="#" rel="<?php echo $this->_var['home_user_info']['id']; ?>" name="recommend_project" onclick="ajax_get_recommend_project(this);" class="btn_custom">自荐我的项目</a>
			<a href="#" class="btn_custom" onclick="send_message(<?php echo $this->_var['home_user_info']['id']; ?>);">私信</a>
		</div>
	</div>
</div>
<script>
	var user_info_id = '<?php echo $this->_var['user_info']['id']; ?>';
</script>