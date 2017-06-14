<!--右start-->
<div class="xqmain_right">
	<div class="schedule_box">
		<div class="box_main">
			<div class="title line clearfix">
	            <h3>发起人信息</h3>
	        </div>
			<div class="box_promoter">
				<div class="promoter_img">
					<?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['deal_info']['user_id'],
);
echo $k['name']($k['p']);
?>
				</div>
				<div class="promoter_text">
					<span class="boxname">
						<div class="f_l"><?php echo $this->_var['deal_info']['user_name']; ?></div>
						<?php if ($this->_var['deal_info']['user_icon']): ?>
						<div class="f_l"><img src="<?php echo $this->_var['deal_info']['user_icon']; ?>" title="会员等级" class="level_icon" /></div>
						<?php endif; ?>
						<div class="f_l">
							<i class="<?php if ($this->_var['deal_info']['is_investor'] > 0): ?>investor_type<?php endif; ?> <?php if ($this->_var['deal_info']['is_investor'] == 1): ?>personal_icon<?php endif; ?><?php if ($this->_var['deal_info']['is_investor'] == 2): ?>agency_icon<?php endif; ?>" title="<?php if ($this->_var['deal_info']['is_investor'] == 1): ?>个人投资者<?php endif; ?><?php if ($this->_var['deal_info']['is_investor'] == 2): ?>机构投资者<?php endif; ?>"></i>
						</div>
						<div class="f_l">
							<a href="javascript:void(0)" onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>)" class="btn_send_message">+发私信</a>
						</div>
						<div class="blank0"></div>
					</span>
					<span class="boxtime">最后登录时间：<?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['login_time'],
);
echo $k['name']($k['v']);
?></span>
					<?php if ($this->_var['deal_info']['province'] != '' || $this->_var['deal_info']['city'] != ''): ?>
					<span class="boxaddress"><i class="icon iconfont">&#xe619;</i><?php echo $this->_var['deal_info']['province']; ?>&nbsp;<?php echo $this->_var['deal_info']['city']; ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if ($this->_var['access'] == 1): ?>
	<div class="repays_box" id="repays_box">
		<div class="repays_m">
			<?php $_from = $this->_var['deal_item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_item']):
?>
			<?php if ($this->_var['deal_item']['type'] == 1): ?>
			<div class="repays f_l">
				<div class="repays_hd">
					<span class="f_l">无私奉献</span>
					<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['is_effect'] == 1): ?>
						<?php if ($this->_var['deal_item']['virtual_add_support_person'] < $this->_var['deal_item']['limit_user'] || $this->_var['deal_item']['limit_user'] == 0): ?>
							<a class="ui_button f_r theme_bgcolor" href="<?php
echo parse_url_tag("u:cart|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank">
								<div>
									<span>支持</span>
								</div>
							</a>
						<?php else: ?>
						<div class="ui_button f_r bg_gray" disabled="disabled">已满额</div>
						<?php endif; ?>
					<?php else: ?>
					<div class="ui_button f_r bg_gray" disabled="disabled">支持</div>
					<?php endif; ?>
				</div>
				<div class="repays_bd">
					<div class="repay_intro">
						<?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['deal_item']['description'],
);
echo $k['name']($k['v']);
?>
					</div>
					<p class="buy_num">已有<em class="f14 f_red"><?php echo $this->_var['deal_item']['support_count']; ?></em>位</p>
					<div class="repay_num f_l" style="width:100%">
		 				<div class="deal_item_images" style="overflow:hidden;text-align:left">	
							<div class="blank5"></div>			
							<?php $_from = $this->_var['deal_item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
							<div class="image_item">
								<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" rel="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '570',
  'h' => '430',
);
echo $k['name']($k['v'],$k['w'],$k['h']);
?>" width=50 height=50 />
							</div>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</div>
		 			</div>
					<div class="blank0"></div>
				</div>
			</div>
			<?php else: ?>
			<div class="repays clearfix">
				<div class="repays_hd clearfix">
					<span class="repay_money f_l"><span class="yen">¥</span><?php echo $this->_var['deal_item']['price_format']; ?></span>
					<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['is_effect'] == 1): ?>
						<?php if ($this->_var['deal_item']['virtual_add_support_person'] < $this->_var['deal_item']['limit_user'] || $this->_var['deal_item']['limit_user'] == 0): ?>
							<?php if ($this->_var['deal_item']['type'] == 2): ?>
								<?php if (! $this->_var['deal_info']['lottery_draw_time']): ?>
								<a class="ui_button f_r theme_bgcolor" href="<?php
echo parse_url_tag("u:cart|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank">抽奖</a>
								<?php else: ?>
									<div class="ui_button f_r bg_gray" disabled="disabled">已抽奖</div>
								<?php endif; ?>
							<?php else: ?>
								<a class="ui_button theme_bgcolor f_r" href="<?php
echo parse_url_tag("u:cart|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank">支持</a>
							<?php endif; ?>
						
						<?php else: ?>
							<?php if ($this->_var['deal_item']['type'] == 2 && $this->_var['deal_info']['lottery_draw_time'] > 0): ?>
								<div class="ui_button f_r bg_gray" disabled="disabled">已抽奖</div>
							<?php else: ?>
								<div class="ui_button f_r bg_gray" disabled="disabled">已满额</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php else: ?>
					<div class="ui_button f_r bg_gray" disabled="disabled">支持</div>
					<?php endif; ?>			
					<div class="clear"></div>
				</div>
				<div class="repays_bd">
					<div class="repay_intro">
						<span><?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['deal_item']['description'],
);
echo $k['name']($k['v']);
?></span>
					</div>
					<p class="buy_num"><?php if ($this->_var['deal_item']['is_limit_user'] == 1): ?><?php if ($this->_var['deal_item']['limit_user'] > 0): ?>限额<em class="f14 f_red"><?php echo $this->_var['deal_item']['limit_user']; ?></em>位，<?php endif; ?><?php endif; ?>已有<em class="f14 f_red"><?php echo $this->_var['deal_item']['virtual_person_list']; ?></em>位</p>
					<div class="repay_img tl">		
						<?php $_from = $this->_var['deal_item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
						<div class="image_item">
							<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" rel="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '570',
  'h' => '430',
);
echo $k['name']($k['v'],$k['w'],$k['h']);
?>" width=50 height=50 />
						</div>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					<div class="repay_num">
						<?php if ($this->_var['deal_item']['is_delivery'] == 1 || ( $this->_var['deal_item']['is_share'] == 1 && $this->_var['deal_item']['share_fee'] > 0 )): ?>
						<div>
							<?php if ($this->_var['deal_item']['is_delivery'] == 1): ?>
								<?php if ($this->_var['deal_item']['delivery_fee'] == 0): ?>
								运费：包邮
								<?php else: ?>
								运费：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_item']['delivery_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
								<?php endif; ?>
								&nbsp;&nbsp;
							<?php endif; ?>
							<?php if ($this->_var['deal_item']['is_share'] == 1 && $this->_var['deal_item']['share_fee'] > 0): ?>
								分红：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_item']['share_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						<?php if ($this->_var['deal_item']['type'] == 2 && $this->_var['deal_item']['maxbuy'] > 0): ?>
						<div class="blank5"></div>
						<div>
							每个会员最大支持数量：<?php echo $this->_var['deal_item']['maxbuy']; ?>
						</div>
						<?php endif; ?>
						<?php if ($this->_var['deal_item']['repaid_day'] > 0): ?>
						<div class="blank5"></div>
						<div>
							确认回报时间：回报发放成功后<?php echo $this->_var['deal_item']['repaid_day']; ?>天内
						</div>
						<?php endif; ?>
					</div>
					<div class="blank0"></div>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</div>
	<?php if ($this->_var['deal_info']['description_1'] != null): ?>
	<div class="blank20"></div>
	<div class="box">
		<div class="box_main" style="background:#fff9e9;">
			<div class="title line clearfix">
	            <h3>付款与退款说明</h3>
	        </div>
			<div class="content f_666">
				<span>付款与退款说明付款与退款说明付款与退款说明付款与退款说明付款与退款说明<?php echo $this->_var['deal_info']['description_1']; ?></span>
			</div>
		</div>
	</div>
	<div class="blank"></div>
	<?php endif; ?>
	<?php else: ?>
	<div class="blank20"></div>
	    <?php if ($this->_var['access'] == 0): ?>
     	<div class="box">
         	<div class="box_main f16 tc clearfix">
            	<span>您需要登录后才可以查看该项目详情</span>
            	<div class="blank10"></div>
            	<a onclick="javascript:show_pop_login();" class="ui-button ui-button-block theme_bgcolor" style="padding:0">马上登录</a>
         	</div>
        </div>
        <?php endif; ?>
     	<?php if ($this->_var['access'] == 2): ?>
     	<div class="box">
         	<div class="box_main f16 tc clearfix">
	            <span>您的会员等级不够，无法查看该项目详情</span>
	        </div>
        </div>
        <?php endif; ?>
     	<?php if ($this->_var['access'] == 3): ?>
        <div class="box">
         	<div class="box_main f16 tc clearfix">
         		<span>手机认证后，即可查看该项目详情</span>
         		<div class="blank10"></div>
            	<a href="<?php
echo parse_url_tag("u:settings#security|"."method=setting-mobile-box".""); 
?>" class="ui-button ui-button-block theme_bgcolor" style="padding:0">马上去认证手机</a>
	        </div>
        </div>
        <?php endif; ?>
	<?php endif; ?>
	<div class="blank"></div>
	<!--第3部分结束-->	
</div>
<!--右end-->