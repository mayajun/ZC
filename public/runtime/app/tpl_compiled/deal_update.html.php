<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_invest_show.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/finance/company_deal_overviews.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_log.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fancybox.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.fancybox.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_log.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_log.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
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
	<!--中间页面头部end-->	
	<div class="blank20"></div>
	<div class="xqmain_main">
		<!--左start-->
		<div class="xqmain_left">
	        <div class="topic-box">
     	 		<div class="deal_left">
     	 			<div class="box_main">
						<div class="title line clearfix">
				            <h3>项目最新动态</h3>
				            <?php if ($this->_var['deal_info']['user_id'] == $this->_var['user_info']['id'] && $this->_var['deal_info']['is_effect'] == 1): ?>
							<div class="ui-button ui-small-button f_r theme_bgcolor" id="add_update" rel="green" url="<?php
echo parse_url_tag("u:deal#add_update|"."id=".$this->_var['deal_info']['id']."".""); 
?>" style="margin-top:-5px">
								<div>
									<span>更新动态</span>
								</div>
							</div>	
							<?php endif; ?>
				        </div>			
						<div class="blank0"></div>
						<div class="timeline">
							<div id="pin_box">
								<?php echo $this->fetch('inc/time_line_item.html'); ?>
							</div>
							<div class="ajax_loading_log" id="pin_loading" rel="<?php
echo parse_url_tag("u:ajax#dealupdate|"."id=".$this->_var['deal_info']['id']."&p=".$this->_var['current_page']."".""); 
?>">加载更多动态</div>
							<div class="pages"><?php echo $this->_var['pages']; ?></div>				
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--左end-->
		<?php if ($this->_var['deal_info']['type'] == 0): ?>
			<?php echo $this->fetch('inc/deal_right.html'); ?>
		<?php endif; ?>
		<?php if ($this->_var['deal_info']['type'] == 1): ?>
			<?php echo $this->fetch('inc/deal_investor_right.html'); ?>
		<?php endif; ?>
		<div class="blank0"></div>
	</div>
</div>
<!--中间结束-->
<div class="blank0"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 