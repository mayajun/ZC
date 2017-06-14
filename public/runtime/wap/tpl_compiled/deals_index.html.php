<?php if ($_REQUEST['is_ajax'] != 1): ?>
<?php echo $this->fetch('inc/header.html'); ?>
<?php
    $this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/dz_index.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<input type="hidden" class="pull_to_refresh_url" value="<?php
echo parse_url_tag_wap("u:deals#index|"."".""); 
?>" />
<!-- 默认的下拉刷新层 -->
<div class="pull-to-refresh-layer">
    <div class="preloader"></div>
    <div class="pull-to-refresh-arrow"></div>
</div>
<div class="deals_index pull-to-refresh-content">
<?php endif; ?>
	<div class="main_menu_box">
		<div class="hide_list" style="display:block;">
		  	<div class="abbr">
		  	   	<div class="first_list webkit-box-flex" id="first_list">
		  	   	    <ul>
		  	   	    	<li class="directory">
							<a  onclick="$.router.loadPage('<?php
echo parse_url_tag_wap("u:deals|"."loc=".$this->_var['p_loc']."&type=".$this->_var['p_type']."".""); 
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
echo parse_url_tag_wap("u:deals|"."loc=".$this->_var['p_loc']."&type=".$this->_var['p_type']."&state=".$this->_var['p_state']."".""); 
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
		  	<div class="abbr">
			   	<div class="all_list" id="first_list">
	  	   	    	<ul>
	  	   	    		<li class="directory">
							<a   onclick="$.router.loadPage('<?php
echo parse_url_tag_wap("u:deals|"."r=".$this->_var['p_r']."&id=".$this->_var['p_id']."&type=".$this->_var['p_type']."&state=".$this->_var['p_state']."".""); 
?>');" >全部</a>
						</li>
						<?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'quan');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['quan']):
?>
						<li class="directory"><a   onclick="$.router.loadPage('<?php echo $this->_var['quan']['url']; ?>');" ><?php echo $this->_var['quan']['province']; ?></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  	   	    	</ul>
		  	   	</div>  
		  	</div>
		  	<div class="abbr">
		  	   	<div class="all_list" id="first_list">
		  	   	    <ul>
		  	   	    	<li class="directory"><a    onclick="$.router.loadPage('<?php
echo parse_url_tag_wap("u:deals|"."type=".$this->_var['p_type']."&loc=".$this->_var['p_loc']."&&id=".$this->_var['p_id']."".""); 
?>');"  <?php if ($this->_var['p_state'] == ''): ?> class="current"<?php endif; ?>>所有项目<?php if ($this->_var['p_state'] == ''): ?>(<?php echo $this->_var['deal_count']; ?>)<?php endif; ?></a></li>
						<?php $_from = $this->_var['state_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'state_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['state_item']):
?>
						<li class="directory"><a   onclick="$.router.loadPage('<?php echo $this->_var['state_item']['url']; ?>');"   title="<?php echo $this->_var['state_item']['name']; ?>" <?php if ($this->_var['p_state'] == $this->_var['key']): ?>class="current"<?php endif; ?>><?php echo $this->_var['state_item']['name']; ?><?php if ($this->_var['p_state'] == $this->_var['key']): ?>(<?php echo $this->_var['deal_count']; ?>)<?php endif; ?></a></li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
		  	   	    </ul>
		  	   	</div>
		  	</div>
		</div>
	 	<div class="main_list">
	 	   <ul class="mall-cate webkit-box">
	 	   	   	<li class="webkit-box-flex"><?php if ($this->_var['cate_name']): ?><?php echo $this->_var['cate_name']; ?><?php else: ?>全部分类 <?php endif; ?><i class="icon iconfont ml5">&#xe607;</i></li>
			   	<li class="webkit-box-flex"><?php if ($this->_var['p_loc']): ?><?php echo $this->_var['p_loc']; ?><?php else: ?>全城 <?php endif; ?><i class="icon iconfont ml5">&#xe607;</i></li>
			   	<li class="webkit-box-flex"><?php if ($this->_var['state_name']): ?><?php echo $this->_var['state_name']; ?><?php else: ?>状态<?php endif; ?><i class="icon iconfont ml5">&#xe607;</i></li>
	 	   </ul>
	 	</div>
 	</div>
 	<section class="items_list mt10">
 		<div class="items">
			<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'deal');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['deal']):
?>
			<div class="item clearfix">
			    <a href="#" title="<?php echo $this->_var['deal']['name']; ?>" onclick="RouterURL('<?php echo $this->_var['deal']['url']; ?>','#deal-show',2);">
			        <div class="item-image">
			            <img src="<?php if ($this->_var['deal']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal']['image'],
  'w' => '115',
  'h' => '80',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal']['name']; ?>" class="lazyImg_deals_list" />
			        </div>
			        <div class="item-content">
			        	<div class="item_name webkit-box">
			        		<h3 class="webkit-box-flex"><?php echo $this->_var['deal']['name']; ?></h3>
		        		 	<div class="invest_status">
								<?php if ($this->_var['deal']['begin_time'] > $this->_var['now_time']): ?>
								<i class="invest_status_icon common-success">预热中</i>
								<?php elseif ($this->_var['deal']['end_time'] < $this->_var['now_time'] && $this->_var['deal']['end_time'] != 0): ?>
									<?php if ($this->_var['deal']['is_success'] == 1): ?>
										<i class="invest_status_icon common-success">已成功</i>
									<?php else: ?>
										<?php if ($this->_var['deal']['type'] == 1): ?>
										<i class="invest_status_icon common-fail">融资失败</i>
										<?php else: ?>
										<i class="invest_status_icon common-fail">筹资失败</i>
										<?php endif; ?>
									<?php endif; ?>
								<?php else: ?>
									<?php if ($this->_var['deal']['percent'] >= 100): ?>
									<i class="invest_status_icon common-success">已成功</i>
									<?php else: ?>
										<?php if ($this->_var['deal']['end_time'] == 0): ?>
											<i class="invest_status_icon long_term">长期项目</i>
										<?php else: ?>
											<?php if ($this->_var['deal']['type'] == 1): ?>
											<i class="invest_status_icon common-sprite">融资中</i>
											<?php else: ?>
											<i class="invest_status_icon common-sprite">筹资中</i>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>
			        	</div>
			            <p class="p-color"><?php echo $this->_var['deal']['brief']; ?></p>
			            <div class="clearfix bottom">
			                <div class="price">目标 <em class="f_money number">¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal']['limit_price'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em></div>
			                <span class="support">完成<em><?php echo $this->_var['deal']['percent']; ?>%</em></span>
			            </div>
			        </div>
			    </a>
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</section>
	<input type="hidden" name="page_ajax_url" value="<?php echo $this->_var['page_ajax_url']; ?>" />
	<input type="hidden" name="page_count" value="<?php echo $this->_var['page_count']; ?>" />
<?php if ($_REQUEST['is_ajax'] != 1): ?>
</div>
<!-- 加载提示符 -->
<div class="infinite-scroll-preloader">
	<div class="preloader"></div>
</div>
<script type="text/javascript">
	var now_page = 1;
	var all_page = <?php echo $this->_var['page_count']; ?>;
</script>
<!-- deals_index.js -->
<?php echo $this->fetch('inc/footer.html'); ?>
<?php endif; ?>