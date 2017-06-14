<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_invest_show.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/finance/company_deal_overviews.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_comment.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fancybox.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.fancybox.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_comment.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_comment.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.SuperSlide.2.1.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.SuperSlide.2.1.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<?php if ($this->_var['deal_info']['type'] == 2): ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_var['TMPL']; ?>/css/deal_house_show.css" />
<?php endif; ?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<div class="blank0"></div>
<!--中间开始-->
<div class="xqmain">
	<!--中间页面头部start-->
	<?php if ($this->_var['deal_info']['type'] == 0): ?>
		<?php echo $this->fetch('inc/deal_header.html'); ?>
	<?php endif; ?>
	<?php if ($this->_var['deal_info']['type'] == 1): ?>
		<?php echo $this->fetch('inc/deal_invest_header.html'); ?>
	<?php endif; ?>
	<?php if ($this->_var['deal_info']['type'] == 2): ?>
		<?php echo $this->fetch('inc/deal_house_header.html'); ?>
	<?php endif; ?>
	<!--中间页面头部end-->	
	<div class="blank20"></div>
	<div class="xqmain_main">
		<!--左-->	
		<div class="xqmain_left">
			<div class="box_main">
				<div class="send-cnt">
		       	 	<div class="deal_box">
						<?php if ($this->_var['user_info']): ?>
						<div class="comment_form">
							<form name="comment_form" action="<?php
echo parse_url_tag("u:deal#savedealcomment|"."id=".$this->_var['deal_info']['id']."".""); 
?>">
								<textarea name="content" class="comment_form_content">发表评论</textarea>
								<div class="blank10"></div>
								<div class="comment-btn">
									<span class="syn_weibo">
										<label style="cursor:pointer">
											<input type="checkbox" name="syn_weibo" value="1" />
											<span>同时发布至我的微博 </span>
										</label>
									</span>				
									<div class="ui-button theme_bgcolor send_btn" rel="green">
										<div>
											<span>发送</span>
										</div>
									</div>	
									<div class="blank0"></div>
								</div>
								<input type="hidden" name="ajax" value="1" />
							</form>
						</div>
						<?php else: ?>
						<div class="comment-content tc">
							<span>请登录后评论，立即 </span><a href="<?php
echo parse_url_tag("u:user#login|"."".""); 
?>" class="mylink">登录</a> 或 <a href="<?php
echo parse_url_tag("u:user#register|"."".""); 
?>" class="mylink">注册</a>
							<div class="blank15"></div>
						</div>
						<?php endif; ?>
						<div class="blank0"></div>
						<?php $_from = $this->_var['comment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment_item');if (count($_from)):
    foreach ($_from AS $this->_var['comment_item']):
?>
							<?php echo $this->fetch('inc/comment_item_nolog.html'); ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<div class="blank0"></div>
						<div class="pages"><?php echo $this->_var['pages']; ?></div>
					</div>
				</div>
			</div>
		</div>
		<!--左结束-->
		<!--右-->
		<?php if ($this->_var['deal_info']['type'] == 0 || $this->_var['deal_info']['type'] == 2): ?>
		<?php echo $this->fetch('inc/deal_right.html'); ?>
		<?php endif; ?>
		<?php if ($this->_var['deal_info']['type'] == 1): ?>
		<?php echo $this->fetch('inc/deal_investor_right.html'); ?>
		<?php endif; ?>
		<!--右结束-->
		<div class="blank0"></div>
	</div>
</div>
<!--中间结束-->
<div class="blank0"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 