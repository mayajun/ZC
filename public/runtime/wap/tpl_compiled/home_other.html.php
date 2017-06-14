<?php echo $this->fetch('inc/header.html'); ?>
<?php
	$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/dz_index.css";
	$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/finance/company_deal_overviews.css";
	$this->_var['dcpagecss'][] = $this->_var['TMPL_REAL']."/css/finance/company_deal_overviews.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<div class="home">
	<!-- 详细顶部 开始 -->
	<?php echo $this->fetch('inc/home_header.html'); ?>
	<!-- 详细顶部 结束 -->
	<!-- 详细顶部 结束 -->
	<div class="deal_content">
		<!-- 重要信息 开始 -->
		<div class="box">
			<div class="box_title">投资计划</div>
			<div class="box_content">
				<div class="info">
					<div class="sub_item">
						<div class="sub_name">投资理念</div>
						<div class="text"><?php if ($this->_var['home_user_info']['concept']): ?><?php echo $this->_var['home_user_info']['concept']; ?><?php else: ?>暂无<?php endif; ?></div>
					</div>
					<div class="sub_item">
						<div class="sub_name">一年计划投资项目</div>
						<div class="text"><?php if ($this->_var['home_user_info']['investment_num']): ?><?php echo $this->_var['home_user_info']['investment_num']; ?><?php else: ?>0<?php endif; ?>个</div>
					</div>
					<div class="sub_item">
						<div class="sub_name">关注的领域</div>
						<div class="text">
							<?php if ($this->_var['home_user_info']['cate_name']): ?>
								<?php $_from = $this->_var['home_user_info']['cate_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');$this->_foreach['cate_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cate_items']['total'] > 0):
    foreach ($_from AS $this->_var['cate_item']):
        $this->_foreach['cate_items']['iteration']++;
?>
								
								 <?php echo $this->_var['cate_item']; ?>
								  <?php if (! ( ($this->_foreach['cate_items']['iteration'] == $this->_foreach['cate_items']['total']) )): ?>•<?php endif; ?>
								 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							<?php else: ?>
								暂无
							<?php endif; ?>
						</div>
					</div>
					<div class="sub_item">
						<div class="sub_name">关注的城市</div>
						<div class="text">
							<?php if ($this->_var['gz_region']): ?>
								<?php $_from = $this->_var['gz_region']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key_region', 'gz_region_c');if (count($_from)):
    foreach ($_from AS $this->_var['key_region'] => $this->_var['gz_region_c']):
?>
									<?php echo $this->_var['gz_region_c']; ?>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							<?php else: ?>
								暂无
							<?php endif; ?>
						</div>
					</div>
					<div class="sub_item">
						<div class="sub_name">单个项目投资额度范围</div>
						<div class="text"><span class="f_red"><?php if ($this->_var['home_user_info']['investment_begin']): ?><?php echo $this->_var['home_user_info']['investment_begin']; ?><?php else: ?>0.00<?php endif; ?>万-<?php if ($this->_var['home_user_info']['investment_end']): ?><?php echo $this->_var['home_user_info']['investment_end']; ?><?php else: ?>0.00<?php endif; ?>万</span></div>
					</div>
					<div class="sub_item">
						<div class="sub_name">博客或微博</div>
						<div class="text">
							<?php if ($this->_var['home_user_info']['weibo_list']): ?><?php $_from = $this->_var['home_user_info']['weibo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'weibo_item');$this->_foreach['weibo_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['weibo_items']['total'] > 0):
    foreach ($_from AS $this->_var['weibo_item']):
        $this->_foreach['weibo_items']['iteration']++;
?> <a href="<?php echo $this->_var['weibo_item']['weibo_url']; ?>" target="_blank" class="linkgreen"><?php echo $this->_var['weibo_item']['weibo_url']; ?></a> <?php if (! ( ($this->_foreach['weibo_items']['iteration'] == $this->_foreach['weibo_items']['total']) )): ?>、<?php endif; ?> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><?php else: ?>暂无<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 重要信息 结束 -->
		<!-- 发起的项目 开始 -->
		<?php if ($this->_var['deal_list']): ?>
		<div class="box">
			<div class="box_title">发起的项目</div>
			<div class="box_content">
				<div class="teams_list c_deal_count">
					<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_item');$this->_foreach['deal_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_items']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_item']):
        $this->_foreach['deal_items']['iteration']++;
?>
					<div class="teams item_view_more">
						<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>','#deal-show',2);" class="webkit-box">
							<div class="image">
								<img src="<?php if ($this->_var['deal_item']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php echo $this->_var['deal_item']['image']; ?><?php endif; ?>" />
							</div>
							<div class="text webkit-box-flex">
								<div class="name">
									<?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '20',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?>
								</div>
								<div class="info"><?php if ($this->_var['deal_item']['brief']): ?><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['brief'],
  'b' => '0',
  'e' => '30',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?><?php else: ?><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '40',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?><?php endif; ?></div>
							</div>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<?php if ($this->_var['deal_count'] > 3): ?>
				<a class="link view_more J_view_all" rel="c_deal_count">查看全部(<?php echo $this->_var['deal_count']; ?>)</a>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- 发起的项目 结束 -->
		<!-- 支持的项目 开始 -->
		<?php if ($this->_var['deal_support_list']): ?>
		<div class="box">
			<div class="box_title">支持的项目</div>
			<div class="box_content">
				<div class="teams_list c_deal_support_count">
					<?php $_from = $this->_var['deal_support_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_item');$this->_foreach['deal_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_items']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_item']):
        $this->_foreach['deal_items']['iteration']++;
?>
						<div class="teams item_view_more">
							<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>','#deal-show',2);" class="webkit-box">
								<div class="image">
									<img src="<?php if ($this->_var['deal_item']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php echo $this->_var['deal_item']['image']; ?><?php endif; ?>" />
								</div>
								<div class="text webkit-box-flex">
									<div class="name">
										<?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '20',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?>
									</div>
									<div class="info"><?php if ($this->_var['deal_item']['brief']): ?><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['brief'],
  'b' => '0',
  'e' => '30',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?><?php else: ?><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '40',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?><?php endif; ?></div>
								</div>
							</a>
						</div>	
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<?php if ($this->_var['deal_support_count'] > 3): ?>
				<a class="link view_more J_view_all" rel="c_deal_support_count">查看全部(<?php echo $this->_var['deal_support_count']; ?>)</a>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- 支持的项目 结束 -->
		<?php if ($this->_var['deal_focus_list']): ?>
		<!-- 关注的项目 开始 -->
		<div class="box">
			<div class="box_title">关注的项目</div>
			<div class="box_content">
				<div class="teams_list c_deal_focus">
					<?php $_from = $this->_var['deal_focus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_item');$this->_foreach['deal_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_items']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_item']):
        $this->_foreach['deal_items']['iteration']++;
?>
					<div class="teams item_view_more">
						<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>','#deal-show',2);" class="webkit-box">
							<div class="image">
								<img src="<?php if ($this->_var['deal_item']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php echo $this->_var['deal_item']['image']; ?><?php endif; ?>" />
							</div>
							<div class="text webkit-box-flex">
								<div class="name">
									<?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '20',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?>
								</div>
								<div class="info"><?php if ($this->_var['deal_item']['brief']): ?><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['brief'],
  'b' => '0',
  'e' => '30',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?><?php else: ?><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '40',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?><?php endif; ?></div>
							</div>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<?php if ($this->_var['deal_focus_count'] > 3): ?>
				<a class="link view_more J_view_all" rel="c_deal_focus">查看全部(<?php echo $this->_var['deal_focus_count']; ?>)</a>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- 关注的项目 结束 -->
		<!-- 相关关注  开始 -->
		<div class="box focus">
			<div class="box_title">
				<span class="focus_nav cur J_focus_show" rel="myfocuser_show">关注(<?php if ($this->_var['deal_focus_count']): ?><?php echo $this->_var['deal_focus_count']; ?><?php else: ?>0<?php endif; ?>)</span>
				<span class="focus_nav J_focus_show" rel="myfuns_show">粉丝(<?php if ($this->_var['deal_focused_count']): ?><?php echo $this->_var['deal_focused_count']; ?><?php else: ?>0<?php endif; ?>)</span>
				<span class="focus_nav J_focus_show" rel="mycompanyfocuser_show">关注的公司 (<?php if ($this->_var['finance_focus_count']): ?><?php echo $this->_var['finance_focus_count']; ?><?php else: ?>0<?php endif; ?>)</span>
			</div>
			<div class="box_content clearfix">
				<!--关注 开始 -->
				<div class="focus_show myfocuser_show">
					<?php $_from = $this->_var['deal_focus_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['deal_item']):
?>
						<div class="image">
							<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:home|"."id=".$this->_var['deal_item']['user_id']."".""); 
?>','#home-index',2);">
								<img src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'p' => $this->_var['deal_item']['user_id'],
  't' => 'big',
);
echo $k['name']($k['p'],$k['t']);
?>" />
							</a>
						</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<!-- 关注 结束 -->
				<!-- 粉丝 开始 -->
				<div class="focus_show myfuns_show hide">
					<?php $_from = $this->_var['deal_focused_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_item');$this->_foreach['deal_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_items']['total'] > 0):
    foreach ($_from AS $this->_var['deal_item']):
        $this->_foreach['deal_items']['iteration']++;
?>
						<div class="image">
							<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:home|"."id=".$this->_var['deal_item']['id']."".""); 
?>','#home-index',2);">
								<img src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'p' => $this->_var['deal_item']['id'],
  't' => 'big',
);
echo $k['name']($k['p'],$k['t']);
?>" />
							</a>
						</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<!-- 粉丝 结束 -->
				<!-- 关注的公司 开始 -->
				<div class="focus_show mycompanyfocuser_show hide">
					<?php $_from = $this->_var['finance_focus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'finance_focus_item');$this->_foreach['finance_focus_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['finance_focus_items']['total'] > 0):
    foreach ($_from AS $this->_var['finance_focus_item']):
        $this->_foreach['finance_focus_items']['iteration']++;
?>
						<div class="image">
							<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:finance#company_show|"."cid=".$this->_var['finance_focus_item']['id']."".""); 
?>','#finance-company_show',2);">
								<img src="<?php echo $this->_var['finance_focus_item']['company_logo']; ?>" />
							</a>
						</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<!-- 关注的公司 开结束 -->
			</div>
		</div>
		<!-- 相关关注 结束 -->
	</div>
</div>
<!-- home.js -->
<?php echo $this->fetch('inc/footer.html'); ?>