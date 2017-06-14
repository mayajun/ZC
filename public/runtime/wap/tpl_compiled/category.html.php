<?php echo $this->fetch('inc/header.html'); ?>
<div class="category-con selectbj" id="categoryList">
  	<div class="tav_nav webkit-box" id="top_search_hd">
        <?php if (app_conf ( "INVEST_STATUS" ) == 0): ?> 
        <a href="#" livalue="0" class="search_cate search_cate_l webkit-box-flex cur" checked="checked">回报众筹</a>
        <a href="#" livalue="1" class="search_cate search_cate_r webkit-box-flex"><?php echo $this->_var['gq_name']; ?></a>
        <?php endif; ?>
        <?php if (app_conf ( "INVEST_STATUS" ) == 1): ?>
        <a href="#" livalue="0" class="search_cate search_cate_all webkit-box-flex cur" checked="checked">回报众筹</a>
        <?php endif; ?>
        <?php if (app_conf ( "INVEST_STATUS" ) == 2): ?>
        <a href="#" livalue="1" class="search_cate search_cate_all webkit-box-flex cur" checked="checked"><?php echo $this->_var['gq_name']; ?></a>
        <?php endif; ?>
    </div>
    <ul class="category_list mod_main">
    	<?php if (app_conf ( 'INVEST_STATUS' ) == 0): ?>
    	<li id="pros" class="category_li">
			<h2 class="category">
				<a href="#category-index">全部项目</a>
			</h2>
			<ul class="category-table clearfix">
				<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_item']):
?>
				<li>
					<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['cates_item']):
?>
			<h2 class="category <?php if ($this->_var['k'] % 4 == 0): ?>category_bg1<?php endif; ?><?php if ($this->_var['k'] % 4 == 1): ?>category_bg2<?php endif; ?><?php if ($this->_var['k'] % 4 == 2): ?>category_bg3<?php endif; ?><?php if ($this->_var['k'] % 4 == 3): ?>category_bg4<?php endif; ?>">
				<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
			</h2>
			<ul class="category-table sub-category-table clearfix">
				<?php $_from = $this->_var['cates_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_list_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_list_item']):
?>
				<?php if ($this->_var['cates_item']['id'] == $this->_var['cates_list_item']['pid']): ?>
					<li>
						<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_list_item']['id']."".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_list_item']['name']; ?>"><?php echo $this->_var['cates_list_item']['name']; ?></a>
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</li>
		<li id="invests" class="category_li" style="display:none">
			<h2 class="category">
				<a href="">全部项目</a>
			</h2>
			<ul class="category-table clearfix">
				<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_item']):
?>
				<li>
					<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."&type=1".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['cates_item']):
?>
			<h2 class="category <?php if ($this->_var['k'] % 4 == 0): ?>category_bg1<?php endif; ?><?php if ($this->_var['k'] % 4 == 1): ?>category_bg2<?php endif; ?><?php if ($this->_var['k'] % 4 == 2): ?>category_bg3<?php endif; ?><?php if ($this->_var['k'] % 4 == 3): ?>category_bg4<?php endif; ?>">
				<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."&type=1".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
			</h2>
			<ul class="category-table sub-category-table clearfix">
				<?php $_from = $this->_var['cates_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_list_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_list_item']):
?>
				<?php if ($this->_var['cates_item']['id'] == $this->_var['cates_list_item']['pid']): ?>
					<li>
						<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_list_item']['id']."&type=1".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_list_item']['name']; ?>"><?php echo $this->_var['cates_list_item']['name']; ?></a>
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</li>
		<?php endif; ?>
		<?php if (app_conf ( 'INVEST_STATUS' ) == 1): ?>
    	<li id="pros" class="category_li">
			<h2 class="category">
				<a href="">全部项目</a>
			</h2>
			<ul class="category-table clearfix">
				<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_item']):
?>
				<li>
					<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['cates_item']):
?>
			<h2 class="category <?php if ($this->_var['k'] % 4 == 0): ?>category_bg1<?php endif; ?><?php if ($this->_var['k'] % 4 == 1): ?>category_bg2<?php endif; ?><?php if ($this->_var['k'] % 4 == 2): ?>category_bg3<?php endif; ?><?php if ($this->_var['k'] % 4 == 3): ?>category_bg4<?php endif; ?>">
				<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
			</h2>
			<ul class="category-table sub-category-table clearfix">
				<?php $_from = $this->_var['cates_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_list_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_list_item']):
?>
				<?php if ($this->_var['cates_item']['id'] == $this->_var['cates_list_item']['pid']): ?>
					<li>
						<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_list_item']['id']."".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_list_item']['name']; ?>"><?php echo $this->_var['cates_list_item']['name']; ?></a>
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</li>
		<?php endif; ?>
		<?php if (app_conf ( 'INVEST_STATUS' ) == 2): ?>
		<li id="invests" class="category_li">
			<h2 class="category">
				<a href="">全部项目</a>
			</h2>
			<ul class="category-table clearfix">
				<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_item']):
?>
				<li>
					<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."&type=1".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php $_from = $this->_var['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'cates_item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['cates_item']):
?>
			<h2 class="category <?php if ($this->_var['k'] % 4 == 0): ?>category_bg1<?php endif; ?><?php if ($this->_var['k'] % 4 == 1): ?>category_bg2<?php endif; ?><?php if ($this->_var['k'] % 4 == 2): ?>category_bg3<?php endif; ?><?php if ($this->_var['k'] % 4 == 3): ?>category_bg4<?php endif; ?>">
				<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_item']['id']."&type=1".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_item']['name']; ?>"><?php echo $this->_var['cates_item']['name']; ?></a>
			</h2>
			<ul class="category-table sub-category-table clearfix">
				<?php $_from = $this->_var['cates_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_list_item');if (count($_from)):
    foreach ($_from AS $this->_var['cates_list_item']):
?>
				<?php if ($this->_var['cates_item']['id'] == $this->_var['cates_list_item']['pid']): ?>
					<li>
						<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deals#index|"."id=".$this->_var['cates_list_item']['id']."&type=1".""); 
?>','#deals-index',2);" title="<?php echo $this->_var['cates_list_item']['name']; ?>"><?php echo $this->_var['cates_list_item']['name']; ?></a>
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</li>
		<?php endif; ?>
	</ul>
</div>
<!-- category.js -->
<?php echo $this->fetch('inc/footer.html'); ?>
