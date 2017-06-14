<?php echo $this->fetch('inc/header.html'); ?>
<div class="deals_index"> 	
 	<section class="items_list mt10">
 		<div class="main_menu_box">
		<div class="hide_list" style="display:block;">
		  	<div class="abbr">
		  	   	<div class="first_list webkit-box-flex" id="first_list">
		  	   	    <ul>
		  	   	    	<li class="directory">
							<a  onclick="$.router.loadPage('<?php
echo parse_url_tag_wap("u:stock_transfer|"."loc=".$this->_var['p_loc']."&type=".$this->_var['p_type']."".""); 
?>');"  title="全部">全部</a>
						</li>
						<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
						<li class="directory"><?php echo $this->_var['cate_item']['name']; ?></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		  	   	    </ul>
		  	   	</div>
			   	<div class="second_list webkit-box-flex" id="second_list">
			   		<ul>
			   	    	<li class="two_directory">
							<a   onclick="$.router.loadPage('<?php
echo parse_url_tag_wap("u:stock_transfer|"."loc=".$this->_var['p_loc']."&type=".$this->_var['p_type']."&state=".$this->_var['p_state']."".""); 
?>');" >全部</a>
						</li>
		  	   	    </ul>
			   		<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
			   	    <ul>
			   	    	<li class="two_directory"><a    onclick="$.router.loadPage('<?php echo $this->_var['cate_item']['url']; ?>');" >全部</a></li>
			   	    	<?php if ($this->_var['cate_item']['child']): ?>
						<?php $_from = $this->_var['cate_item']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'clist');if (count($_from)):
    foreach ($_from AS $this->_var['clist']):
?>
						<?php if ($this->_var['clist']): ?>
						<li class="two_directory"><a    onclick="$.router.loadPage('<?php echo $this->_var['clist']['url']; ?>');"><?php echo $this->_var['clist']['name']; ?></a></li>
				   		<?php endif; ?>
					    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php endif; ?>	
		  	   	    </ul>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			   	</div>
		  	</div>
		</div>
	 	<div class="main_list">
	 	   <ul class="mall-cate webkit-box">
	 	   	   	<li class="webkit-box-flex"><?php if ($this->_var['cate_name']): ?><?php echo $this->_var['cate_name']; ?><?php else: ?>全部分类 <?php endif; ?><i class="icon iconfont ml5">&#xe607;</i></li>
	 	   </ul>
	 	</div>
 	</div>
 	
 		<div class="items">
			<?php $_from = $this->_var['transfer_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'transfer_item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['transfer_item']):
?>
			<div class="card">
 			   	<div class="card-header"><?php echo $this->_var['transfer_item']['deal_name']; ?></div>
  			  	<div class="card-content">
  			    	<div class="card-content-inner"><?php echo $this->_var['transfer_item']['user_name']; ?>转让<?php echo $this->_var['transfer_item']['num']; ?>股，总价<?php echo $this->_var['transfer_item']['price']; ?>元，原估值<?php echo $this->_var['transfer_item']['stock_value']; ?>元</div>
 			   	</div>
		  		<div class="card-footer">
				<?php if ($this->_var['transfer_item']['is_success'] == 1): ?>
					已成功
				<?php elseif ($this->_var['transfer_item']['is_success'] == 0): ?>
					<?php if ($this->_var['transfer_item']['purchaser_id'] > 0): ?>
						交易中
					<?php else: ?>
						<?php if ($this->_var['transfer_item']['end_time'] > $this->_var['now']): ?>								
							<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:stock_transfer#go_transfer|"."id=".$this->_var['transfer_item']['id']."".""); 
?>','#stock_transfer-go_transfer',2);" class="button button-fill theme_bgcolor f_r">前往交易</a>
						<?php else: ?>
							已过期，交易失效
						<?php endif; ?>		
					<?php endif; ?>
				<?php else: ?>
					已取消交易
				<?php endif; ?>
				</div>
		 	</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</section>
	<input type="hidden" name="page_count" value="<?php echo $this->_var['page_count']; ?>" />
</div>
<div class="pages"><?php echo $this->_var['pages']; ?></div>
<?php echo $this->fetch('inc/footer.html'); ?>