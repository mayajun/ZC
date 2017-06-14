<?php echo $this->fetch('inc/header.html'); ?> 
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
 	<?php echo $this->fetch('inc/account_left.html'); ?> 
	<div class="homeright pageright f_r">
		<?php echo $this->fetch('inc/account_focus_top.html'); ?>
		<div class="list_conment">
			<?php if ($this->_var['deal_list']): ?>
			<div class="i_deal_list clearfix">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
					<thead>
						<tr>
							<th>项目名称</th>
							<th width="100">
								获得支持
							</th>
							<th width="100">
								支持人数
							</th>
							<th width="100">
								达成目标
							</th>
							<th width="100">
								剩余时间
							</th>
							<th width="70">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['deal_item']):
?>
						<tr>
							<td class="lf">
				             	<a href="<?php if ($this->_var['deal_item']['type'] == 4): ?><?php
echo parse_url_tag("u:finance#company_finance|"."id=".$this->_var['deal_item']['id']."".""); 
?><?php else: ?><?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?><?php endif; ?>" target="_blank" title="<?php echo $this->_var['deal_item']['name']; ?>">
				             		<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_item']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['order_item']['deal_name']; ?>" class="f_l p_img"/>
				             		<span class="p_name"><?php echo $this->_var['deal_item']['name']; ?></span>
				             	</a>
							</td>
							<td>
							<?php if ($this->_var['deal_item']['type'] == 1): ?>
								<span class="f_money b"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_item']['invote_money'],
);
echo $k['name']($k['v']);
?></span>
							<?php else: ?>
								<span class="f_money b"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_item']['support_amount'],
);
echo $k['name']($k['v']);
?></span>
							<?php endif; ?>
							</td>
							<td>
								<?php if ($this->_var['deal_item']['type'] == 1): ?>
									<?php echo $this->_var['deal_item']['invote_num']; ?>
								<?php else: ?>
									<?php echo $this->_var['deal_item']['support_count']; ?>
								<?php endif; ?>	
							</td>
							<td>			
								<?php echo $this->_var['deal_item']['percent']; ?>%
							</td>
							<td>		
								<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
								<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>已结束<?php endif; ?>
								<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>
								<?php echo $this->_var['deal_item']['remain_days']; ?>天
								<?php endif; ?>						
							</td>
							<td>
								<a href="<?php
echo parse_url_tag("u:account#del_focus|"."id=".$this->_var['deal_item']['fid']."".""); 
?>">取消关注</a>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</tbody>
				</table>
			</div>
			<div class="blank20"></div>
			<div class="pages"><?php echo $this->_var['pages']; ?></div>
			<div class="blank20"></div>
			<?php else: ?>
			<div class="empty_tip">
				没有相关的记录
			</div>
			<?php endif; ?>
		</div>
	</div>
 	<div class="blank"></div>	
</div>
<!--中间结束-->
<?php echo $this->fetch('inc/footer.html'); ?> 