<?php if ($_REQUEST['is_ajax'] != 1): ?>
<?php echo $this->fetch('inc/header.html'); ?>
<style type="text/css">
body{background:#fff;}
.leader{
	overflow:hidden;
}
.leader h3{
	height:30px;
	line-height:30px;
	font-size:18px;
	border-bottom:1px solid #cecece;
}
.leader h3 .f_r{
	font-size:13px;
}
.leader .l{
	width:70px;
	text-align:center;
}
.leader .l img{
	width:70px;
	height:70px;
	margin:0;
	-moz-border-radius:50%; -khtml-border-radius:50%; -webkit-border-radius:50%; border-radius:50%;
}
.leader .r .btn_send{
	font-size:13px;
	color:#666;
}
.leader .r .btn_send i{font-size:14px;}
.leader .title{
	color:#333;
}
.leader .text{
	font-size:13px;
	color:#666;
	border-bottom:1px solid #e5e5e5;
	padding:10px 15px;
	background:#fff;
}
.leader .text:last-child{
	border-bottom:1px solid #cecece;
}
.ui-button1{
	width:120px;
	height:30px;
	line-height:32px;
	font-size:15px;
}
.select_box{
	height:30px;
	line-height:30px;
	text-align:center;
	border:1px solid #ddd;
	margin:-1px;
}
.tab_nav li{
	background:#fff;
}
.choose_box{
	background:#f1f1f1;
	display:none;
}
.choose_2{
	padding:10px;
	background:#fff;
}
.choose_2 .con2_l{
	height:28px;
	line-height:28px;
}
.choose_2 a{
	display:block;
	height:28px;
	line-height:28px;
	float:left;
	padding:0 5px;
	border-radius:3px;
	margin:0 5px;
	color:#666;
}
.choose_2 a:hover ,
.choose_2 a.cur {
	background:#4dbdf5;
	color:#fff;
}
.choose_2,.choose_show,select{font-size:13px}
.user_icon{margin:2px 5px 0 0;}
#cityid-1,#cityid-2{height:38px;line-height:38px;}
</style>
<input type="hidden" class="pull_to_refresh_url" value="<?php
echo parse_url_tag_wap("u:investor#invester_list|"."".""); 
?>" />
<!-- 默认的下拉刷新层 -->
<div class="pull-to-refresh-layer">
    <div class="preloader"></div>
    <div class="pull-to-refresh-arrow"></div>
</div>
<section class="choose_box" id="choose_box">
	<ul class="choose_1 tab_nav webkit-box" style="width:100%">
		<li class="webkit-box-flex tc">
			<select name="province" id="cityid-1">
		  		<option value="" rel="0">请选择省份</option>
				<?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
				<option <?php if ($this->_var['p_loc'] == $this->_var['region']['name']): ?>selected="selected"<?php endif; ?> rel="<?php echo $this->_var['region']['id']; ?>" value="<?php echo $this->_var['region']['url']; ?>"><?php echo $this->_var['region']['name']; ?></option>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>				 
			</select>
			<i class="icon iconfont">&#xe607;</i>
		</li>
		<li class="webkit-box-flex tc ">
			<select name="city" id="cityid-2">
		  		<option value="" rel="0">请选择城市</option>
				<?php $_from = $this->_var['region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
				<option class="ld-option" value="<?php echo $this->_var['region']['url']; ?>" <?php if ($this->_var['p_city'] == $this->_var['region']['name']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>				    
			</select>
			<i class="icon iconfont">&#xe607;</i>
		</li>
	</ul>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cityid-1,#cityid-2").change(function(){
				href = $(this).val();
				$.router.loadPage(href);
			});
		});
	</script>
	<div class="blank10"></div>
	<div class="choose_2 webkit-box">
		<div class="con2_l">投资人类型：</div>
	    <div class="con2_r webkit-box-flex" id="invest_type">
	    	<a href="<?php
echo parse_url_tag_wap("u:investor#invester_list|"."loc=".$this->_var['p_loc']."".""); 
?>"  <?php if ($this->_var['p_r'] == ''): ?> class="cur"<?php endif; ?>>全部</a>
			<a href="<?php
echo parse_url_tag_wap("u:investor#invester_list|"."r=institutions_invester&loc=".$this->_var['p_loc']."".""); 
?>" value="1" <?php if ($this->_var['p_r'] == 'institutions_invester'): ?> class="cur"<?php endif; ?>>机构投资人</a>
	        <a href="<?php
echo parse_url_tag_wap("u:investor#invester_list|"."r=invester&loc=".$this->_var['p_loc']."".""); 
?>" value="2" <?php if ($this->_var['p_r'] == 'invester'): ?> class="cur"<?php endif; ?>>投资人</a>
			<?php if (app_conf ( 'AVERAGE_USER_STATUS' ) == 1 || INVEST_TYPE == 1): ?>
	       		<a href="<?php
echo parse_url_tag_wap("u:investor#invester_list|"."r=ordinary_user&loc=".$this->_var['p_loc']."".""); 
?>" value="0" <?php if ($this->_var['p_r'] == 'ordinary_user'): ?> class="cur"<?php endif; ?>>普通用户</a>
			<?php endif; ?>
	        <div class="blank0"></div>
	    </div>
	    <div class="clear"></div>
	</div>
	<div class="choose_2 webkit-box">
	 	<div class="con2_l">按所属城市：</div>
	    <div class="con2_r webkit-box-flex" id="invest_type">
			<a href="<?php
echo parse_url_tag_wap("u:investor#invester_list|"."r=".$this->_var['p_r']."".""); 
?>"  <?php if ($this->_var['p_loc'] == ''): ?>class="cur"<?php endif; ?> target="_self"  value="">全部</a>		
			<?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city_item');if (count($_from)):
    foreach ($_from AS $this->_var['city_item']):
?>
			<?php if ($this->_var['city_item']['province'] != ''): ?>
		        <a href="<?php echo $this->_var['city_item']['url']; ?>" target="_self" value="" <?php if ($this->_var['p_loc'] == $this->_var['city_item']['province']): ?>class="cur"<?php endif; ?> ><?php echo $this->_var['city_item']['province']; ?></a>
			<?php endif; ?>
		    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
	    </div>
	</div>
	<div class="blank10"></div>
</section>
<section class="leader pull-to-refresh-content">
<?php endif; ?>
	<h3 class="theme_fcolor pl10 pr10">
		<a href="#" class="choose_show f_r" id="choose_show">筛选</a>
	</h3>
	<?php if ($this->_var['invester_list']): ?>
	<?php $_from = $this->_var['invester_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'invester_item');if (count($_from)):
    foreach ($_from AS $this->_var['invester_item']):
?>
	<div class="text">
		<div class="webkit-box">
			<div class="l mr10">
				<div>
					<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:home|"."id=".$this->_var['invester_item']['id']."".""); 
?>','#home-index',2);">
						<img src="<?php echo $this->_var['invester_item']['image']; ?>" />
					</a>
				</div>
				<div class="blank5"></div>
			</div>
			<div class="r webkit-box-flex">
				<div>
					<div class="blank5"></div>
					<span class="user_name f_l mr5"><?php echo $this->_var['invester_item']['user_name']; ?></span>
					<!-- 会员等级，投资人类型图标 -->
					<?php if ($this->_var['invester_item']['user_icon']): ?>
					<div class="user_icon f_l">
	                	<img src="<?php echo $this->_var['invester_item']['user_icon']; ?>" title="会员等级" class="inline_level_icon level_icon" />
	                </div>
					<?php endif; ?>
					<div class="<?php if ($this->_var['invester_item']['is_investor'] > 0): ?>user_icon f_l<?php endif; ?>">
						<?php if ($this->_var['invester_item']['is_investor'] == 1): ?>
						<i class="icon iconfont" rel="个人投资者认证">&#xe609;</i>
						<?php endif; ?>
						<?php if ($this->_var['invester_item']['is_investor'] == 2): ?>
						<i class="icon iconfont" rel="机构投资者认证">&#xe608;</i>
						<?php endif; ?>
					</div>
					<div class="blank5"></div>
					
										
					<div class="conment">
						<div>
							<?php if ($this->_var['invester_item']['province']): ?><i class="fa fa-map-marker"></i>&nbsp;<?php echo $this->_var['invester_item']['province']; ?><?php echo $this->_var['invester_item']['city']; ?>&nbsp;&nbsp;<?php endif; ?>
						</div>
						<a href="#" onclick="send_message(<?php echo $this->_var['invester_item']['id']; ?>)" class="btn_send f14 b_radius3"><i class="fa fa-envelope mr5"></i>发私信</a>
					</div>
				</div>
				<div class="blank5"></div>
				<a href="#" rel="<?php echo $this->_var['invester_item']['id']; ?>" name="recommend_project" onclick="ajax_get_recommend_project(this);" class="ui-button ui-button1 f_r <?php if ($this->_var['invester_item']['id'] == $this->_var['user_info']['id']): ?>bg_gray<?php else: ?>theme_color<?php endif; ?>">自荐我的项目</a>
				
			</div>
		</div>
	</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<div class="blank15"></div>
	<div class="pages"><?php echo $this->_var['pages']; ?></div>
	<div class="blank30"></div>
	<?php else: ?>
	<p class="f_999 tc">暂无数据</p>
	<?php endif; ?>
<?php if ($_REQUEST['is_ajax'] != 1): ?>
</section>
<script type="text/javascript">
	var user_info_id = '<?php echo $this->_var['user_info']['id']; ?>';
</script>
<!-- invester_list.js -->
<?php echo $this->fetch('inc/footer.html'); ?>
<?php endif; ?>