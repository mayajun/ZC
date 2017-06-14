<?php echo $this->fetch('inc/header.html'); ?>
<?php
	$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_show.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<!-- 中间 开始 -->
<div class="mod deal_show">
	<section class="deal_box">
		<!--1-->
    	<div class="imgboxdt">
		    <a href="#" title="<?php echo $this->_var['deal_info']['name']; ?>">
		    	<?php if ($this->_var['deal_info']['source_vedio'] == ''): ?>
				<img src="<?php if ($this->_var['deal_info']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_info']['image'],
  'w' => '640',
  'h' => '445',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal_info']['name']; ?>" class="deal_image" />
				<?php else: ?>
  				<iframe width=100% src="<?php echo $this->_var['deal_info']['source_vedio']; ?>" frameborder=0 allowfullscreen></iframe>
				<?php endif; ?>
 	    	</a>
    	</div>
    	<a href="#" title="<?php echo $this->_var['deal_info']['name']; ?>" class="deal_title sizing"><?php echo $this->_var['deal_info']['name']; ?></a>
    	<!--2-->
    	<div class="paiduan">
        	<span class="caption-title">
	        	已筹资：
	        	<span class="ui_price">
	        		<i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['deal_info']['total_virtual_price_format']; ?></span>
	        	</span>&nbsp;&nbsp;
	        	目标：
				<span class="ui_price black">
	        		<i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['deal_info']['limit_price_format']; ?></span>
	        	</span>
        	</span>
            <span class="f_r ">
        		<?php if ($this->_var['deal_info']['status'] == 0): ?>
                    <span class="common common-sprite">预热中</span>
                <?php else: ?>
	            	<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
						<span class="common common-success">已成功</span>
					<?php else: ?>
                    	<?php if ($this->_var['deal_info']['status'] == 1): ?>
                            <span class="common common-success">已成功</span>
                        <?php endif; ?>
                        <?php if ($this->_var['deal_info']['status'] == 2): ?>
                            <span class="common common-fail">筹资失败</span>
                        <?php endif; ?>
                        <?php if ($this->_var['deal_info']['status'] == 3): ?>
                            <span class="common common-sprite">筹资中</span>
                        <?php endif; ?>
                        <?php if ($this->_var['deal_info']['status'] == 4): ?>
                            <span class="common common-sprite">长期项目</span>
                        <?php endif; ?>
				 	<?php endif; ?>
	  			<?php endif; ?>
            </span>
	 	</div>
    	<div class="blank5"></div>
     	<!--3-->
    	<div class="deal_content_box pd">             
     		<div class="ui">
      			<span class="<?php if ($this->_var['deal_info']['percent'] >= 100): ?>common-success<?php endif; ?> progress" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;"></span>
         	</div>             
        	<div class="blank"></div>
        	<div class="div_dt">
        		<span class="num"><?php echo $this->_var['deal_info']['percent']; ?>%</span><br />
        		<span class="til">已达</span>
        	</div>
        	<div class="div_dt">
        		<?php if ($this->_var['deal_info']['status'] == 0): ?>
				<span class="num">
					<?php echo $this->_var['deal_info']['left_days']; ?>天
				</span>
				<span class="til">距离开始</span>
				<?php else: ?>
	        	<span class="num">
	        		<?php if ($this->_var['deal']['percent'] >= 100): ?>
				 	已成功
					<?php else: ?>
						<?php if ($this->_var['deal_info']['status'] == 1): ?>
                   	 		已成功
	                    <?php endif; ?>
	                    <?php if ($this->_var['deal_info']['status'] == 2): ?>
                   			筹资失败
	                    <?php endif; ?>
	                    <?php if ($this->_var['deal_info']['status'] == 3): ?>
	                        <?php echo $this->_var['deal_info']['remain_days']; ?>天
	                    <?php endif; ?>
	                    <?php if ($this->_var['deal_info']['status'] == 4): ?>
	                       	 长期项目
	                    <?php endif; ?>
					<?php endif; ?>	
 				</span><br />
				<span class="til">剩余时间</span>
				<?php endif; ?>
			</div>
	        <div class="div_dt" style="border:none;">
	            <span class="num"><?php echo $this->_var['deal_info']['person']; ?></span><br />
	            <span class="til">支持者</span>               
	        </div>
        	<div class="blank"></div>
    	</div>
	</section>
	<section class="shit clearfix">
		<div class="webkit-box">
			<span class="tl webkit-box-flex">发起人：<?php if ($this->_var['deal_info']['user_name']): ?><?php echo $this->_var['deal_info']['user_name']; ?><?php else: ?><?php echo $this->_var['site_name']; ?><?php endif; ?></span>
	    	<span class="tr webkit-box-flex">支付方式：<?php if ($this->_var['deal_info']['ips_bill_no'] == 0): ?>网站支付<?php else: ?>第三方托管<?php endif; ?></span>
		</div>
	    <div class="blank0"></div>
	    <a class="f_r <?php if ($this->_var['is_focus']): ?>qxgz<?php else: ?>gz<?php endif; ?> attention_focus_deal btn_focus" id="<?php echo $this->_var['deal_info']['id']; ?>" href="#">
	    	<?php if ($this->_var['is_focus']): ?>
	    	<i class="icon iconfont is_focus">&#xe634;</i>
	    	<?php else: ?>
	    	<i class="icon iconfont no_focus">&#xe635;</i>
	    	<?php endif; ?>
	    </a>
	    <a href="#" class="bnt_share f_r mr10 J_open_share"><i class="icon iconfont">&#xe633;</i></a>
	    <div class="open_share_box hide">
			<div class="bdsharebuttonbox">
				<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
				<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
				<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a>
			</div>
		</div>
	</section>
	<section class="detailmain">
	    <p class="detailpd"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_info']['brief'],
  'p' => '0',
  'e' => '60',
);
echo $k['name']($k['v'],$k['p'],$k['e']);
?></p>
	    <?php if ($this->_var['access'] == 1 || $this->_var['access'] == 3): ?>
	    <div class="blank10"></div>
	    <p class="tc">
	    	<a class="detailmain_a J_view_detail" href="#">
		    	<span class="theme_fcolor" id="view_details">展开详情 +</span><i class="fa fa-angle-right"></i>
		    </a>
	    </p>
	    <div class="blank10"></div>
	    <div class="deal_info_box pb15 hide" id="deal_info_box">
	    	<?php echo $this->fetch('deal_info.html'); ?> 
	    	<div class="blank15"></div>
	    	<p class="tc">
	    		<a class="detailmain_aa J_close_detail" href="#">
					<span class="theme_fcolor" id="view_detailss">收起详情 -</span>
			    </a>
	    	</p>
	    </div>
	    <?php else: ?>
			<?php if ($this->_var['access'] == 0): ?>
	        <div class="authority_box">
           		温馨提示：您需要<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:user#login|"."".""); 
?>','#user-login');" class="f_red link_underline">登录</a>才可以查看项目详细信息！ 
	        </div>
    		<?php endif; ?>
	        <?php if ($this->_var['access'] == 2): ?>
	     	<div class="authority_box f_red">
	            温馨提示：您的会员等级不够，无法查看项目详细信息！
	        </div>
	        <?php endif; ?>
	        <?php if ($this->_var['access'] == 4): ?>
	        <div class="authority_box">
	            温馨提示：您未实名认证，马上去<a href='#' onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-id-box".""); 
?>','#settings-security',2);" class="f_red link_underline">实名认证</a>！
	        </div>
	        <?php endif; ?>
	        <?php if ($this->_var['access'] == 5): ?>
	        <div class="authority_box f_red">
	            温馨提示：您的实名认证正在审核中，无法查看项目详细信息！
	        </div>
	        <?php endif; ?>
	        <?php if ($this->_var['access'] == 6): ?>
	        <div class="authority_box">
	            温馨提示：您的实名认证未通过，重新去<a href='#' onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-id-box".""); 
?>','#settings-security',2);" class="f_red link_underline">实名认证</a>！
	        </div>
	        <?php endif; ?>
	        <div class="blank15"></div>
		<?php endif; ?>
	</section>
	<?php if ($this->_var['access'] == 1 || $this->_var['access'] == 3): ?>
	<div class="content-block-title">选择回报</div>
	<div class="return_item">
	  	<?php $_from = $this->_var['deal_info']['deal_item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['item']):
?>
	  	<?php if ($this->_var['item']['type'] == 1): ?>
	  	<div class="card">
		    <div class="card-header">
		    	<?php if ($this->_var['deal_info']['remain_days'] > 0): ?>
		    		<?php if (( $this->_var['item']['support_count'] + $this->_var['item']['virtual_person'] ) < $this->_var['item']['limit_user'] || $this->_var['item']['limit_user'] == 0): ?>
			    		<div>
			    			<span class="f_red">无私奉献</span>
			    			<span class="f12 f_999"><?php echo $this->_var['item']['support_count']; ?>人已支持</span>
			    		</div>
			        	<a data_id="<?php echo $this->_var['item']['id']; ?>" class="dedication_do ui-button ui-small-button theme_color" style="width:80px;">立即支持</a>
		    		<?php else: ?>
			    		<div>
			    			<span class="ui_price">
			    				<i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['item']['price_format']; ?></span>
			    			</span>
			    			<span class="f12 f_999">已满额</span>
			    		</div>
			        	<a disabled="true" class="ui-button ui-small-button bg_gray" style="width:80px;">立即支持</a>
		    		<?php endif; ?>
		    	<?php else: ?>
		    		<div>
		    			<span class="f_red">无私奉献</span>
		    			<span class="f12 f_999"><?php echo $this->_var['item']['person']; ?>人已支持</span>
		    		</div>
			        <a href="#"  disabled="true" class="ui-button ui-small-button bg_gray" style="width:80px;">立即支持</a>
		      	<?php endif; ?>
		    </div>
		    <div class="card-content">
		      	<div class="card-content-inner">
		      		<p><?php echo $this->_var['item']['description']; ?></p>
		      		<p class="clearfix">
				    	<?php $_from = $this->_var['item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
					    <img class="pimg pimg_<?php echo $this->_var['k']; ?>" src="<?php echo $this->_var['image']['image']; ?>">
					    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				    </p>
		      	</div>
		    </div>
	  	</div>
	  	<?php else: ?>
	  	<div class="card">
		    <div class="card-header">
		    	<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now_time'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now_time'] && $this->_var['deal_info']['is_effect'] == 1): ?>
		    		<?php if (( $this->_var['item']['support_count'] + $this->_var['item']['virtual_person'] ) < $this->_var['item']['limit_user'] || $this->_var['item']['limit_user'] == 0): ?>
				    	<div>
			    		 	<span class="ui_price">
			    				<?php if ($this->_var['item']['type'] == 2): ?>抽奖<?php endif; ?><i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['item']['price_format']; ?></span>
			    			</span>
			    			<span class="f12 f_999"><?php echo $this->_var['item']['person']; ?>人已支持<?php if ($this->_var['item']['is_limit_user'] == 1): ?><?php if ($this->_var['item']['limit_user'] > 0): ?>/限<?php echo $this->_var['item']['limit_user']; ?>名<?php endif; ?><?php endif; ?></span>
			    		</div>
			    		<?php if ($this->_var['item']['type'] == 2): ?>
							<?php if (! $this->_var['deal_info']['lottery_draw_time']): ?>
							 	<a item_id="<?php echo $this->_var['item']['id']; ?>" item_price="<?php echo $this->_var['item']['price_format']; ?>" class="lottery_do_num ui-button ui-small-button theme_color" style="width:80px;">立即支持</a>
							<?php else: ?>
								<div>
							        <span class="ui_price">
					    				<i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['item']['price_format']; ?></span>
					    			</span>
							        <span class="f12 f_999">已抽奖</span>
							    </div>
							<?php endif; ?>
						<?php else: ?>
							<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:cart#index|"."id=".$this->_var['item']['id']."&deal_id=".$this->_var['item']['deal_id']."".""); 
?>','#cart-index',2);" class="ui-button ui-small-button theme_color" style="width:80px;">立即支持</a>	
						<?php endif; ?>
					<?php else: ?>
					<div>
						<span class="ui_price">
		    				<i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['item']['price_format']; ?></span>
		    			</span>
						<?php if ($this->_var['item']['type'] == 2 && $this->_var['deal_info']['lottery_draw_time'] > 0): ?>
							<span class="f12 f_999">已抽奖</span>
						<?php else: ?>
							<span class="f12 f_999">已满额</span>
						<?php endif; ?>
				    </div>
				    <a href="#" disabled="true" class="ui-button ui-small-button bg_gray" style="width:80px;">立即支持</a>
				    <?php endif; ?>
			   	<?php else: ?>
				    <div>
				    	<span class="ui_price">
		    				<i class="ui_price_rmb">¥</i><span class="ui_price_integer"><?php echo $this->_var['item']['price_format']; ?></span>
		    			</span>
				        <span class="f12 f_999"><?php echo $this->_var['item']['person']; ?>人已支持</span>
				    </div>
				    <a href="#"  disabled="true" class="ui-button ui-small-button bg_gray" style="width:80px;">立即支持</a>
				<?php endif; ?>
		    </div>
		    <div class="card-content">
		      	<div class="card-content-inner">
	      		 	<p class="mb5"><?php echo $this->_var['item']['description']; ?></p>
			     	<p class="f_666 f12">
				    	<?php if ($this->_var['item']['is_delivery'] == 1): ?>
							<?php if ($this->_var['item']['delivery_fee'] == 0): ?>
							运费：包邮
							<?php else: ?>
							运费：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['item']['delivery_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
							<?php endif; ?>
							&nbsp;&nbsp;
						<?php endif; ?>
						<?php if ($this->_var['item']['is_share'] == 1 && $this->_var['item']['share_fee'] > 0): ?>
							分红：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['item']['share_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
						<?php endif; ?>
				    </p>
					<?php if ($this->_var['item']['type'] == 2 && $this->_var['item']['maxbuy'] > 0): ?>
					<p class="f_666 f12">
						每个会员最大支持数量：<?php echo $this->_var['item']['maxbuy']; ?>
					</p>
					<?php endif; ?>
			     	<?php if ($this->_var['item']['repaid_day'] > 0): ?>
					<p class="f_666 f12">
						预计发放时间：项目成功结束后<?php echo $this->_var['item']['repaid_day']; ?>天内
					</p>
					<?php endif; ?>
				    <p class="mt5 clearfix">
				    	<?php $_from = $this->_var['item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
					    <img class="pimg pimg_<?php echo $this->_var['k']; ?>" src="<?php echo $this->_var['image']['image']; ?>">
					    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				    </p>
		      	</div>
		    </div>
	  	</div>
	  	<?php endif; ?>
	  	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  	</div>
	<?php if ($this->_var['deal_info']['deal_item_count'] > 3): ?>
 	<div class="list-block view_more_return_item">
	    <ul>
	      <li class="item-content item-link">
	        <div class="item-inner">
	          <div class="item-title">查看其他全部回报</div>
	        </div>
	      </li>
	    </ul>
  	</div>
	<?php endif; ?>
	<div class="card" onclick="$.router.loadPage('<?php echo $this->_var['deal_info']['update_url']; ?>');">
	    <div class="card-header">圈子动态（<?php echo $this->_var['log_num']; ?>）</div>
	    <div class="card-content">
	      	<div class="card-content-inner">
      		 	<div class="critical_ul">
			        <ul>
			        	<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log');if (count($_from)):
    foreach ($_from AS $this->_var['log']):
?>
			            <li>
			                <div class="uer_pic"><img src="<?php echo $this->_var['log']['user_info']['avatar']; ?>" width="44" height="44"></div>
			                <div class="comment">
			                    <h4><?php echo $this->_var['log']['user_info']['user_name']; ?></h4>
			                    <div class="details">
			                        <div class="lov1"></div>
			                        <p>
			                             <?php echo $this->_var['log']['log_info']; ?>
			                        </p>
			                    </div>
			                </div>
			            </li>
			            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			        </ul>
			    </div>
	      	</div>
	    </div>
	</div>
	<div class="card" onclick="$.router.loadPage('<?php echo $this->_var['deal_info']['comment_url']; ?>');">
	    <div class="card-header">评论（<?php echo $this->_var['comment_count']; ?>）</div>
	    <div class="card-content">
	      	<div class="card-content-inner">
  		 	 	<div class="critical_ul">
			        <ul>
			        	<?php $_from = $this->_var['comment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
			            <li>
			                <div class="uer_pic"><img src="<?php echo $this->_var['comment']['user_info']['avatar']; ?>" width="44" height="44"></div>
			                <div class="comment">
			                    <h4><?php echo $this->_var['comment']['user_info']['user_name']; ?></h4>
			                    <div class="details">
			                        <div class="lov1"></div>
			                        <p>
			                           	<?php echo $this->_var['comment']['content']; ?>
			                        </p>
			                    </div>
			                </div>
			            </li> 
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			        </ul>
			    </div>
	      	</div>
	    </div>
	</div>
	<?php endif; ?>
</div>
<div class="hide" id="dedicate_demo">
	<div class="dedicate_box">
		<form class="ajax_form_dedicate" action="<?php
echo parse_url_tag_wap("u:cart#index|"."".""); 
?>">
			<div class="webkit-box">
				<label>奉献金额:</label>
				<input type="text" placeholder="请输入奉献金额" value="" name="pay_money" class="textboxs sizing webkit-box-flex">
			</div>
			<div class="dedicate_tip f_red hide mt5" style="padding-left:70px;">*请输入正确的金额</div>
			<div class="blank15"></div>
			<div class="submit_btn_row two_btn webkit-box">
				<div class="ui-button ui_button_l theme_color webkit-box-flex">提交</div>
				<div class="ui_button bg_red theme_color webkit-box-flex close_modal" onclick="$.closeModal();">取消</div>
				<input type="hidden" name="id" value="item_id">
				<input type="hidden" name="deal_id" value="<?php echo $this->_var['deal_info']['id']; ?>">
				<input type="hidden" name="ctl" value="cart">
			</div>
		</form>
	</div>
</div>
<div class="blank15"></div>
<!-- 中间 结束 --> 
<script type="text/javascript">
	var deal_info_id = <?php echo $this->_var['deal_info']['id']; ?>;
	var login_id = '<?php echo $this->_var['user_info']['id']; ?>';
	var leader_info_id = '<?php echo $this->_var['leader_info']['id']; ?>';
	var IS_ENQUIRY = <?php echo app_conf("IS_ENQUIRY")?>;

	var deal_info_name = '<?php echo $this->_var['deal_info']['name']; ?>';
	var deal_info_brief = '<?php echo $this->_var['deal_info']['brief']; ?>';
	var deal_info_image = '<?php echo $this->_var['deal_info']['image']; ?>';
	var deal_info_url = APP_ROOT+'/index.php?ctl=deal&act=show&id='+deal_info_id;
</script>
<!-- deal.js -->
<?php echo $this->fetch('inc/footer.html'); ?>