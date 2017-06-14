<?php echo $this->fetch('inc/header.html'); ?>
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/score/score_mall_index.css";
$this->_var['dcpagecss'][] = $this->_var['TMPL_REAL']."/css/score/score_mall_index.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
  'c' => $this->_var['dcpagecss'],
);
echo $k['name']($k['v'],$k['c']);
?>" />
<div id="J_wrap">
	<div class="blank20"></div>
	<div class="ui_deals_filter">
		<div class="ui_deals_filter_item">
			<div class="filter_item">
				<label class="f_l">所有类别：</label>
				<div class="filter_text f_l">
					<ul>
						<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['cate']):
?>
						<li <?php if ($this->_var['cate_pid'] == $this->_var['cate']['id']): ?>class="current"<?php endif; ?>>
							<a href="<?php echo $this->_var['cate']['url']; ?>" title="<?php echo $this->_var['cate']['name']; ?>"><?php echo $this->_var['cate']['name']; ?></a>
						</li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
				</div>
				<!--小分类-->
				<?php if ($this->_var['cate_sublist']): ?>
				<div class="blank0"></div>
				<div class="ui_deals_filter_l child_cate">
					<ul>
						<?php $_from = $this->_var['cate_sublist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['child_cate_item']):
?>
						<li <?php if ($this->_var['cates'] == $this->_var['child_cate_item']['id']): ?>class="current"<?php endif; ?> >
							<a href="<?php echo $this->_var['child_cate_item']['url']; ?>" title="<?php echo $this->_var['child_cate_item']['name']; ?>"><?php echo $this->_var['child_cate_item']['name']; ?></a>
						</li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
					<div class="blank0"></div>
				</div>
				<div class="blank5"></div>
				<?php endif; ?>
				<!---->
				
			</div>
		</div>
		<div class="ui_deals_filter_item last_item">
			<div class="filter_item">
				<label class="f_l">积分范围：</label>
				<div class="filter_text f_l">
					<ul>
						<?php $_from = $this->_var['integral_url']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'integral_0_60387500_1497256731');if (count($_from)):
    foreach ($_from AS $this->_var['integral_0_60387500_1497256731']):
?>
						<li <?php if ($this->_var['integral_0_60387500_1497256731']['integral'] == $this->_var['integral_str']): ?>class="current"<?php endif; ?>>
							<a href="<?php echo $this->_var['integral_0_60387500_1497256731']['url']; ?>" title="<?php echo $this->_var['integral_0_60387500_1497256731']['name']; ?>"><?php echo $this->_var['integral_0_60387500_1497256731']['name']; ?></a>
						</li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="pin_box">
		<div class="deals">
			<div class="deals_sortbar">
				<ul>
					<?php $_from = $this->_var['sort_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sort_0_61950000_1497256731');if (count($_from)):
    foreach ($_from AS $this->_var['sort_0_61950000_1497256731']):
?>
					<li <?php if ($this->_var['sort_0_61950000_1497256731']['sort'] == $this->_var['sort_str']): ?>class="cur"<?php endif; ?>><a href="<?php echo $this->_var['sort_0_61950000_1497256731']['url']; ?>"><?php echo $this->_var['sort_0_61950000_1497256731']['name']; ?></a></li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</div>
			<div class="deals_list">
				<ul>
					<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
					<li class="score_item <?php if ($this->_var['key'] % 4 == 0): ?>first<?php endif; ?>">
						<a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo $this->_var['goods']['name']; ?>" class="score_item_iwrap">
							<div class="score_img">
								<img src="<?php if ($this->_var['goods']['img'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['goods']['img'],
  'w' => '270',
  'h' => '203',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['goods']['name']; ?>" lazy="true" />
							</div>
							<div class="score_text">
								<div class="score_title"><?php 
$k = array (
  'name' => 'msubstr',
  'value' => $this->_var['goods']['name'],
  'a' => '0',
  'b' => '16',
);
echo $k['name']($k['value'],$k['a'],$k['b']);
?></div>
								<div class="score_price">
									<div class="f_l">所需积分：<span class="f_money"><?php echo $this->_var['goods']['score']; ?></span>积分</div>
									<div class="f_r">购买人数：<?php echo $this->_var['goods']['total_buy']; ?>人</div>
								</div>
							</div>
							<div class="ui_button theme_bgcolor">查看详情</div>
						</a>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</div>
			<div class="blank"></div>
			<div class="pages"><?php echo $this->_var['pages']; ?></div>
			<div class="blank20"></div>
		</div>
	</div>
	<div class="blank20"></div>
</div>
<?php echo $this->fetch('inc/footer.html'); ?>