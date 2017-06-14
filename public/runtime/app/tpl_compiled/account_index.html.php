<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/jcDate.css";
$this->_var['dcpagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/jcDate.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jQuery-jcDate.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jQuery-jcDate.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/order_list.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/order_list.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<style type="text/css">
	.uc_table td.rt{
		padding-right:0;
		text-align:center;
	}
</style>
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
 	<?php echo $this->fetch('inc/account_left.html'); ?> 
	<div class="homeright pageright f_r">
		<!--
		<?php if (app_conf ( "INVEST_STATUS" ) == 0 || app_conf ( "INVEST_STATUS" ) == 1): ?>
		<a href="<?php
echo parse_url_tag("u:account#index|"."".""); 
?>" class="invest_choice_btn <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'index' || $this->_var['action'] == 'view_order'): ?>cur<?php endif; ?>">回报项目(<?php if ($this->_var['order_sum']): ?><?php echo $this->_var['order_sum']; ?><?php else: ?>0<?php endif; ?>)</a>
		<?php endif; ?>
		<?php if (app_conf ( "INVEST_STATUS" ) == 0 || app_conf ( "INVEST_STATUS" ) == 2): ?>
			<?php if (app_conf ( "IS_ENQUIRY" ) == 1): ?>
				<a href="<?php
echo parse_url_tag("u:account#mine_investor_status|"."type=0".""); 
?>" class="invest_choice_btn <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'mine_investor_status'): ?>cur<?php endif; ?>">股权项目(<?php if ($this->_var['investor_list_count']): ?><?php echo $this->_var['investor_list_count']; ?><?php else: ?>0<?php endif; ?>)</a>
			<?php else: ?>
				<a href="<?php
echo parse_url_tag("u:account#mine_investor_status|"."type=1".""); 
?>" class="invest_choice_btn <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'mine_investor_status'): ?>cur<?php endif; ?>">股权项目(<?php if ($this->_var['investor_list_count']): ?><?php echo $this->_var['investor_list_count']; ?><?php else: ?>0<?php endif; ?>)</a>
			<?php endif; ?>
		<?php endif; ?>
		-->
		<a href="<?php echo $this->_var['cur_url']; ?>" class="invest_choice_btn cur">
			<?php if ($this->_var['cur_act'] == 'index'): ?>产品<?php endif; ?><?php if ($this->_var['cur_act'] == 'house_index'): ?>房产<?php endif; ?><?php if ($this->_var['cur_act'] == 'selfless_index'): ?>公益<?php endif; ?>项目(<?php echo $this->_var['order_sum']; ?>)
		</a>

		<div class="blank20"></div>
		<div class="list_title clearfix">
			<div <?php if ($this->_var['is_paid'] == 0): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['cur_url']; ?>">所有</a>
			</div>
			<div <?php if ($this->_var['is_paid'] == 1): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['is_paid_1_url']; ?>">支付成功</a>
			</div>
			<div <?php if ($this->_var['is_paid'] == 2): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['is_paid_2_url']; ?>">未支付</a>
			</div>
		</div>
		<form method="post" action="<?php echo $this->_var['cur_url']; ?>">
			<div class="account_search" id="account_search">
				<div class="form_row control-group f_l">
					<label class="form_lable small_form_lable">项目名称：</label>
					<div class="pr f_l">
						<input type="text" name="deal_name" value="<?php echo $this->_var['deal_name']; ?>"  class="small_textbox w200 mr10" />
						<span class="holder_tip">请输入项目名称</span>
					</div>
					<select name="deal_status" id='deal_status' class="ui-select field_select small">
						<option value="">选择项目状态</option>
						<option value="1" <?php if ($this->_var['deal_status'] == 1): ?>selected="selected"<?php endif; ?>>进行中</option>
						<option value="2" <?php if ($this->_var['deal_status'] == 2): ?>selected="selected"<?php endif; ?>>已成功</option>
						<option value="3" <?php if ($this->_var['deal_status'] == 3): ?>selected="selected"<?php endif; ?>>已失败</option>
					</select>
					<select name="item_status" id='item_status' class="ui-select field_select small">
						<option value="">选择回报状态</option>
						<option value="1" <?php if ($this->_var['item_status'] == 1): ?>selected="selected"<?php endif; ?> >待发放回报</option>
						<option value="2" <?php if ($this->_var['item_status'] == 2): ?>selected="selected"<?php endif; ?> >已发放回报</option>
 						<option value="3" <?php if ($this->_var['item_status'] == 3): ?>selected="selected"<?php endif; ?> >已收到回报</option>
					</select>
				</div>
				<input type="submit" value="搜索" class="ui-button theme_bgcolor" />
				<input type="hidden" name="more_search" value="<?php echo $this->_var['more_search']; ?>">
				<input type="hidden" name="is_paid" value="<?php echo $this->_var['is_paid']; ?>" >
				<a href="javascript:void(0);" id="more_search_btn" class="more_search_btn f_red">更多筛选条件<i class="icon iconfont iconfont_down" id="iconfont_down">&#xe61d;</i><i class="icon iconfont iconfont_up" id="iconfont_up">&#xe61c;</i></a>
				<div id="more_search" <?php if ($this->_var['more_search'] == 1): ?> style=" display:block;"<?php else: ?>style=" display:none;"<?php endif; ?>>
					<div class="blank0"></div>
					<div class="form_row control-group f_l">
						<label class="form_lable small_form_lable">付款时间：</label>
						<div class="small_form_text">
							<input readonly="" type="text" class="small_textbox w100 jcDate" rel="input-text" value="<?php echo $this->_var['pay_begin_time']; ?>" name="pay_begin_time" id="inputLaunchTime" placeholder="请选择日期">
							<span class="f_l pl10 pr10">─</span>
							<input readonly="" type="text" class="small_textbox w100 jcDate mr20" rel="input-text" value="<?php echo $this->_var['pay_end_time']; ?>" name="pay_end_time" id="inputLaunchTime" placeholder="请选择日期">
						</div>
						<div class="blank0"></div>
					</div>
				</div>
			</div>
		</form>
		<div class="blank10"></div>
		<div class="list_conment account_index">
			<?php if ($this->_var['order_list']): ?>
			<div class="i_deal_list clearfix">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
					<tbody>
						<tr border="0" style="background-color:#f4f4f4; color:#555; height:40px;">
							<th width="220">项目名称</th>
							<th width="130">支付时间</th>
							<th width="80">类型</th>
							<th width="100">金额</th>
							<th width="150">状态</th>
							<th width="80">操作</th>
						</tr>
						<?php $_from = $this->_var['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order_item');if (count($_from)):
    foreach ($_from AS $this->_var['order_item']):
?>
						<tr>
							<td class="lf">
				
							<?php if ($this->_var['order_item']['deal_info']): ?>
								<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['order_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['order_item']['deal_name']; ?>">
									<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['order_item']['deal_info']['image'],
  'w' => '60',
  'h' => '45',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['order_item']['deal_name']; ?>"/ class="f_l p_img">
									<span class="p_name">
										<?php if ($this->_var['order_item']['type'] == 3): ?>
											(<span class="f_red">抽奖<?php if ($this->_var['order_item']['is_winner'] == 1): ?>：幸运单<?php endif; ?></span>)<br />
										<?php endif; ?>
										<?php echo $this->_var['order_item']['deal_name']; ?>
									</span>
								</a>
							<?php else: ?>
								<div>
									<span title="<?php echo $this->_var['order_item']['deal_name']; ?>">
										<?php if ($this->_var['order_item']['type'] == 3 && $this->_var['order_item']['is_winner'] == 1): ?>
											<span class="f_red">幸运单</span><br />
										<?php endif; ?>
										<?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['order_item']['deal_name'],
  'b' => '0',
  'e' => '20',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?>
									</span>
								</div>	
							<?php endif; ?>
							</td>
							<td><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['order_item']['pay_time'],
);
echo $k['name']($k['v']);
?></td>
							<td><?php 
$k = array (
  'name' => 'order_type_name',
  'v' => $this->_var['order_item']['type'],
);
echo $k['name']($k['v']);
?></td>
							<td>
								<span class="f_money b"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['order_item']['total_price'],
);
echo $k['name']($k['v']);
?></span>
							</td>
							<td>			
								<?php if ($this->_var['order_item']['order_status'] == 0): ?>
								支付未完成
								<?php else: ?>		
									<?php if ($this->_var['order_item']['deal_info']): ?>
										<?php if ($this->_var['order_item']['deal_info']['is_success'] == 1): ?>
											<?php if ($this->_var['order_item']['deal_info']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
											<?php if ($this->_var['order_item']['deal_info']['end_time'] < $this->_var['now'] && $this->_var['order_item']['deal_info']['end_time'] != 0): ?>
												<span>已成功</span>
												<div class="blank5"></div>
												<?php if ($this->_var['order_item']['repay_time'] > 0): ?>
												回报已发放&nbsp;<?php if ($this->_var['order_item']['repay_make_time'] > 0): ?>确认收到<?php else: ?><span class="f_money ">未确认收到</span><?php endif; ?>
												<?php else: ?>
												等待发放回报
												<?php endif; ?>
											<?php endif; ?>
											<?php if ($this->_var['order_item']['deal_info']['begin_time'] < $this->_var['now'] && ( $this->_var['order_item']['deal_info']['end_time'] > $this->_var['now'] || $this->_var['order_item']['deal_info']['end_time'] == 0 )): ?>
											<span>已成功</span>
											<div class="blank5"></div>
											<?php if ($this->_var['order_item']['repay_time'] > 0): ?>回报已发放&nbsp;<?php if ($this->_var['order_item']['repay_make_time'] > 0): ?>确认收到<?php else: ?><span class="f_money ">未确认收到</span><?php endif; ?>
											<?php else: ?>等待发放回报
											<?php endif; ?>
										<?php endif; ?>
										<?php else: ?>
											<?php if ($this->_var['order_item']['deal_info']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
											<?php if ($this->_var['order_item']['deal_info']['end_time'] < $this->_var['now'] && $this->_var['order_item']['deal_info']['end_time'] != 0): ?>
											<span>未成功</span>
											<div class="blank5"></div>
											<?php if ($this->_var['order_item']['is_refund'] == 1): ?>已退款<?php else: ?>等待退款<?php endif; ?>
											<?php endif; ?>
											<?php if ($this->_var['order_item']['deal_info']['begin_time'] < $this->_var['now'] && ( $this->_var['order_item']['deal_info']['end_time'] > $this->_var['now'] || $this->_var['order_item']['deal_info']['end_time'] == 0 )): ?>进行中未成功<?php endif; ?>
										<?php endif; ?>
									<?php else: ?>
										<?php if ($this->_var['order_item']['is_success'] == 0): ?>
										未成功&nbsp;<?php if ($this->_var['order_item']['repay_time'] > 0): ?>回报已发放<?php if ($this->_var['order_item']['repay_make_time'] > 0): ?><br /> 确认收到<?php else: ?> <br /> 未确认收到<?php endif; ?><?php else: ?>等待发放回报<?php endif; ?>
										<?php else: ?>
										已成功&nbsp;<?php if ($this->_var['order_item']['is_refund'] == 1): ?>已退款<?php else: ?>等待退款<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</td>
							<td class="rt">
								<?php if ($this->_var['order_item']['order_status'] == 0): ?>
									<?php if ($this->_var['order_item']['lottery_draw_time'] > 0): ?>
										<span>幸运号已揭晓</span>
									<?php else: ?>
										<a href="<?php
echo parse_url_tag("u:account#view_order|"."id=".$this->_var['order_item']['id']."".""); 
?>" class="ui-small-button bg_red f12 b" style="float:none;display:inline-block">继续支付</a>
									<?php endif; ?>
									<div class="blank5"></div>
									<a href="<?php
echo parse_url_tag("u:account#del_order|"."id=".$this->_var['order_item']['id']."".""); 
?>" class="del_deal">删除</a>
								<?php else: ?>
									<a href="<?php
echo parse_url_tag("u:account#view_order|"."id=".$this->_var['order_item']['id']."".""); 
?>">查看详情</a>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</tbody>
				</table>
				<div class="blank20"></div>
				<div class="pages"><?php echo $this->_var['pages']; ?></div>
				<div class="blank20"></div>
			</div>
			<?php else: ?>
			<div class="empty_tip">
				还没有任何支持记录
			</div>
			<?php endif; ?>
		</div>
		<div class="blank"></div>	
	</div>
	<div class="blank"></div>
</div>
<div class="blank"></div>
<script type="text/javascript">
	account_more_search("#more_search_btn","#more_search");
	//选择日期控件
    $("input.jcDate").jcDate({
        IcoClass : "jcDateIco",
        Event : "click",
        Speed : 100,
        Left :-125,
        Top : 28,
        format : "-",
        Timeout : 100,
        Oldyearall : 17,  // 配置过去多少年
		Newyearall : 0  // 配置未来多少年
    });
</script>
<?php echo $this->fetch('inc/footer.html'); ?> 