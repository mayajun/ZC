<div class="xqmain_header">
	<div class="deal_basic box_main clearfix">
		<div class="deal_basic_hd deal_cp_basic_hd clearfix">
			<div class="img">
				<?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['deal_info']['user_id'],
);
echo $k['name']($k['p']);
?>
			</div>
			<div class="text">
				<h3><?php echo $this->_var['deal_info']['name']; ?></h3>
				<p><?php if ($this->_var['deal_info']['user_id'] != 0): ?><label class="f_999">发起人</label>&nbsp;<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['deal_info']['user_id']."".""); 
?>" class="theme_fcolor"><?php echo $this->_var['deal_info']['user_name']; ?><?php if ($this->_var['user_info']['user_icon']): ?> <img src="<?php echo $this->_var['user_info']['user_icon']; ?>" title="会员等级" class="level_icon" /><?php endif; ?></a>&nbsp;<a href="javascript:void(0)" onclick="send_message(100)" class="btn_send_message" style="display:inline-block">+发私信</a><?php else: ?><span><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?></span><?php endif; ?></p>
			</div>
			<div class="share_focus_box">
				<div class="share">
		        	<label class="f_l">分享：</label>
					<div class="bdsharebuttonbox">
						<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
						<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
						<a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a>
					</div>
					<script type="text/javascript">
						window._bd_share_config={
							"common":{
								"bdSnsKey":{},
								"bdText":"<?php echo $this->_var['deal_info']['name']; ?>",
								"bdDesc":"<?php echo $this->_var['deal_info']['brief']; ?>",
								"bdPic":"<?php echo $this->_var['deal_info']['image']; ?>",
								"bdMini":"1",
								"bdMiniList":false,
								"bdStyle":"1",
								"bdSize":"32"
							},
							"share":{},
							"selectShare":{
								"bdContainerClass":null,
								"bdSelectMiniList":["weixin","sqq","tsina","mail"]
							}
						};
						with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
					</script>
		        </div>
				<div class="focus">
					<label class="f_l">关注：</label>
					<?php if ($this->_var['deal_info']['type'] != 1): ?>	
						<?php if ($this->_var['is_focus']): ?>
						<div class="qxgz attention_focus_deal" id="<?php echo $this->_var['deal_info']['id']; ?>" title="取消关注"></div>	
						<?php else: ?>
						<div class="gz attention_focus_deal" id="<?php echo $this->_var['deal_info']['id']; ?>" title="关注"></div>	
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="deal_basic_bd">
			<div class="bd_left">
				<div class="img_show">
				<?php $_from = $this->_var['deal_info']['deal_imgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'img');$this->_foreach['deal_imgs_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_imgs_name']['total'] > 0):
    foreach ($_from AS $this->_var['img']):
        $this->_foreach['deal_imgs_name']['iteration']++;
?>
					<img src="<?php echo $this->_var['img']['image']; ?>" alt="<?php echo $this->_var['deal_info']['name']; ?>" width="760" height="530" class="<?php if (! ($this->_foreach['deal_imgs_name']['iteration'] <= 1)): ?>hide<?php endif; ?>" />
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<?php if ($this->_var['deal_info']['deal_imgs'] && count ( $this->_var['deal_info']['deal_imgs'] ) > 1): ?>
				<div class="img_navs">
					<div class="img_nav">
						<?php $_from = $this->_var['deal_info']['deal_imgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'img');$this->_foreach['deal_imgs_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_imgs_name']['total'] > 0):
    foreach ($_from AS $this->_var['img']):
        $this->_foreach['deal_imgs_name']['iteration']++;
?>
						<img src="<?php echo $this->_var['img']['image']; ?>" alt="<?php echo $this->_var['deal_info']['name']; ?>" width="80" height="56" onclick="scrollTo(this);" <?php if (($this->_foreach['deal_imgs_name']['iteration'] <= 1)): ?>class="active"<?php endif; ?> />
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					<div class="img_nav_mask"></div>
				</div>
				<?php endif; ?>
			</div>
			<div class="bd_right">
				<?php if ($this->_var['access'] == 1): ?>
				<div class="schedule_box f_l">
					<span class="finance_status">
					<?php if ($this->_var['deal_info']['is_effect'] == 1): ?>
						<?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>
						<i class="preheat">预热中</i>
						<?php elseif ($this->_var['deal_info']['end_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] != 0): ?>
							<?php if ($this->_var['deal_info']['is_success'] == 1): ?>
						<i class="success">已成功</i>
							<?php else: ?>
						<i class="fail">筹资失败</i>
							<?php endif; ?>	 
						<?php else: ?>
							<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
								<i class="success">已成功</i>
							<?php elseif ($this->_var['deal_info']['end_time'] == 0): ?>
						<i class="long">长期项目</i>
							<?php else: ?>
						<i class="financing">筹资中</i>
							<?php endif; ?>
						<?php endif; ?>
					<?php elseif ($this->_var['deal_info']['is_effect'] == 2): ?>
						<i class="audit_fail">审核失败</i>
					<?php else: ?>
						<i class="audit_wait">待审核</i>
					<?php endif; ?>
					</span>
					<div class="schedule_m">
						<div class="loading-progress">
							<span title="<?php echo $this->_var['deal_info']['percent']; ?>%">
								<?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>
								<div class="loading-bar" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;background:#ffae00;"><?php echo $this->_var['deal_info']['percent']; ?>%</div>
								<?php elseif ($this->_var['deal_info']['end_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] != 0): ?>
									<?php if ($this->_var['deal_info']['is_success'] == 1): ?>
									<div class="loading-bar" style="width:100%;"><span><?php echo $this->_var['deal_info']['percent']; ?>%</span></div>
									<?php else: ?>
									<div class="loading-bar" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;background:#4d4d4f;"><span><?php echo $this->_var['deal_info']['percent']; ?>%</span></div>
									<?php endif; ?>
								<?php else: ?>
									<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
									<div class="loading-bar" style="width:100%;"><span><?php echo $this->_var['deal_info']['percent']; ?>%</span></div>
									<?php else: ?>
										<?php if ($this->_var['deal_info']['end_time'] == 0): ?>
										<div class="loading-bar" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;"><span><?php echo $this->_var['deal_info']['percent']; ?>%</span></div>
										<?php else: ?>
										<div class="loading-bar" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;"><span><?php echo $this->_var['deal_info']['percent']; ?>%</span></div>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
								<div class="loading-container">
									<i width="15" height="15" class="myCanvas"></i>
									<span class="loading-point"></span>
									<span class="loading-detail">已筹集：<?php echo $this->_var['deal_info']['total_virtual_price']; ?>元</span>
								</div>
								<div class="loading-container syndicate-goal">
									<span class="loading-detail">筹集目标：<?php echo $this->_var['deal_info']['limit_price_format']; ?>元</span>
									<span class="loading-point"></span>
									<i width="15" height="15" class="myCanvas"></i>
								</div>
							</span>
						</div>
						<div class="blank0"></div>
						<div class="target_money f_999">
							<span>此项目须在 <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['end_time'],
  'f' => 'Y年m月d日H时i分',
);
echo $k['name']($k['v'],$k['f']);
?> 前，获得<span class="f_money"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_info']['limit_price_format'],
);
echo $k['name']($k['v']);
?></span>的支持才可成功!</span>
						</div>
						<div class="info-area mb20">
					        <div class="info-content">
					            <p class="content-val"><?php if ($this->_var['deal_info']['ips_bill_no'] == 0): ?>网站支付<?php else: ?>第三方托管<?php endif; ?></p>
					            <p class="start-num">支付方式</p>
					        </div>
					        <div class="info-line"></div>
					        <div class="info-content">
					            <p class="content-val"><?php if ($this->_var['deal_info']['is_effect'] == 1): ?><?php if ($this->_var['deal_info']['begin_time'] > NOW_TIME): ?>预热中<?php else: ?><?php if ($this->_var['deal_info']['remain_days'] < 0): ?><?php if ($this->_var['deal_info']['percent'] >= 100): ?>已成功<?php else: ?>已过期<?php endif; ?><?php else: ?><?php if ($this->_var['deal_info']['remain_days'] <= 0): ?>0<?php else: ?><?php echo $this->_var['deal_info']['remain_days']; ?><?php endif; ?>天<?php endif; ?><?php endif; ?><?php elseif ($this->_var['deal_info']['is_effect'] == 2): ?>审核失败<?php else: ?>待审核<?php endif; ?></p>
					            <p class="start-num">剩余时间</p>
					        </div>
					        <div class="info-line next"></div>
					        <div class="info-content">
					            <p class="content-val"><?php if ($this->_var['deal_info']['virtual_person'] == 0): ?><?php echo $this->_var['deal_info']['support_count']; ?><?php else: ?><?php echo $this->_var['deal_info']['person']; ?><?php endif; ?>人</p>
					            <p class="start-num">支持人数</p>
					        </div>
						</div>
						<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['is_effect'] == 1): ?>
							<a href="#repays_box" class="ui_button ui-button-block theme_bgcolor mb30">立即支持</a>
						<?php else: ?>
							<a href="javascript:void(0);" class="ui_button ui-button-block bg_gray mb30" id="J_btn_end" <?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>rel="preheat"<?php endif; ?>>立即支持</a>
						<?php endif; ?>
						<div class="jlxqTitleText siteIlB_box">
							<span class="gy siteIlB_item">
	                            <a href="<?php
echo parse_url_tag("u:deals|"."id=".$this->_var['deal_info']['cate_id']."&type=0".""); 
?>" title="<?php echo $this->_var['deal_info']['deal_type']; ?>" target="_blank"><?php echo $this->_var['deal_info']['deal_type']; ?></a>
	                        </span>
							<span class="addr siteIlB_item"><?php echo $this->_var['deal_info']['province']; ?>&nbsp;<?php echo $this->_var['deal_info']['city']; ?></span>
							<?php if ($this->_var['deal_info']['tags'] != ''): ?>
		                    <span class="label siteIlB_item">
		                    	<?php $_from = $this->_var['deal_info']['tags_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
		                    	<?php if (trim ( $this->_var['tag'] ) != ''): ?>
	                            <a href="<?php
echo parse_url_tag("u:deals|"."tag=".$this->_var['tag']."&type=0".""); 
?>" title="<?php echo $this->_var['tag']; ?>" target="_blank"><?php echo $this->_var['tag']; ?></a>
	                            <?php endif; ?>
		                    	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	                        </span>
		                	<?php endif; ?>
		                </div>
					</div>
				</div>
				<?php else: ?>
				<div class="blank0"></div>
				    <?php if ($this->_var['access'] == 0): ?>
                    <div class="box border_dashed2 border_radius7 mt20" style="margin:20px 0 20px 20px;">
                        <div class="box_main f16 tc clearfix">
                            <span>您需要登录后才可以查看该项目详情</span>
                            <div class="blank10"></div>
                            <a onclick="javascript:show_pop_login();" class="ui-button ui-center-button theme_bgcolor">马上登录</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_var['access'] == 2): ?>
                    <div class="box border_dashed2 border_radius7 mt20" style="margin:20px 0 20px 20px;">
                        <div class="box_main f16 tc clearfix">
                            <span>您的会员等级不够，无法查看项目详细信息！</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_var['access'] == 3): ?>
                    <div class="box border_dashed2 border_radius7 mt20" style="margin:20px 0 20px 20px;">
                        <div class="box_main f16 tc clearfix">
                            <span>手机认证后，即可查看该项目详情</span>
                            <div class="blank10"></div>
                            <a href="<?php
echo parse_url_tag("u:settings#security|"."method=setting-mobile-box".""); 
?>" class="ui-button ui-center-button theme_bgcolor">马上去手机认证</a>
                        </div>
                    </div>
                    <?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="tab-section">
    	<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_info']['id']."".""); 
?>" <?php if (ACTION_NAME == 'show'): ?>class="active"<?php endif; ?>>项目主页</a>
    	<?php if ($this->_var['access'] == 1): ?>
	    	<a href="<?php
echo parse_url_tag("u:deal#update|"."id=".$this->_var['deal_info']['id']."".""); 
?>" <?php if (ACTION_NAME == 'update' || ACTION_NAME == 'updatedetail'): ?>class="active"<?php endif; ?>>动态(<?php echo $this->_var['deal_info']['log_count']; ?>)</a>
	    	<?php if ($this->_var['deal_info']['is_support_print'] == 1 && $this->_var['deal_info']['type'] != 1): ?>
	    		<a href="<?php
echo parse_url_tag("u:deal#support|"."id=".$this->_var['deal_info']['id']."".""); 
?>" <?php if (ACTION_NAME == 'support'): ?>class="active"<?php endif; ?>>支持者(<?php echo $this->_var['deal_info']['person']; ?>)</a>
	    	<?php endif; ?>
	    	<a href="<?php
echo parse_url_tag("u:deal#comment|"."id=".$this->_var['deal_info']['id']."".""); 
?>" <?php if (ACTION_NAME == 'comment'): ?>class="active"<?php endif; ?>>评论(<?php if ($this->_var['comment_count'] > 0): ?><?php echo $this->_var['comment_count']; ?><?php else: ?>0<?php endif; ?>)</a>
	    	<?php if ($this->_var['deal_info']['type'] == 1 && ( $this->_var['deal_info']['stock_type'] == 2 || $this->_var['deal_info']['stock_type'] == 3 )): ?>
	    		<a href="<?php
echo parse_url_tag("u:deal#fixation_return|"."id=".$this->_var['deal_info']['id']."".""); 
?>" <?php if (ACTION_NAME == 'fixation_return'): ?>class="active"<?php endif; ?>>固定回报(<?php if ($this->_var['fixation_return_num'] > 0): ?><?php echo $this->_var['fixation_return_num']; ?><?php else: ?>0<?php endif; ?>)</a>
	    	<?php endif; ?>
	    	<?php if ($this->_var['deal_info']['type'] == 1 && ( $this->_var['deal_info']['stock_type'] == 1 || $this->_var['deal_info']['stock_type'] == 3 )): ?>
	    		<a href="<?php
echo parse_url_tag("u:deal#share_bonus|"."id=".$this->_var['deal_info']['id']."".""); 
?>" <?php if (ACTION_NAME == 'share_bonus'): ?>class="active"<?php endif; ?>>分红纪录(<?php if ($this->_var['share_bonus_num'] > 0): ?><?php echo $this->_var['share_bonus_num']; ?><?php else: ?>0<?php endif; ?>)</a>		
			<?php endif; ?>
    	<?php endif; ?>
 	</div>
</div>