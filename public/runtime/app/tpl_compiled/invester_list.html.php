<?php echo $this->fetch('inc/header.html'); ?>
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/invester_list.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<style type="text/css">
	.ui-small-button{
		height:30px;
		line-height:30px;
		padding:0 20px;
	}
</style>
<div class="xqmain">
	<adv adv_id="invester_list_top" />
	<div class="blank20"></div>
	<div class="invester_all">
		<!-- 检索条件 开始 -->
		<div class="ui_deals_filter">
			<div class="ui_deals_filter_item">
				<div class="filter_item">
					<label class="f_l">投资类型：</label>
					<div class="filter_text f_l">
						<ul>
							<li <?php if ($this->_var['p_r'] == 'all'): ?>class="current"<?php endif; ?>>
								<a href="<?php
echo parse_url_tag("u:investor#invester_list|"."loc=".$this->_var['p_loc']."".""); 
?>">全部</a>
							</li>
							<li <?php if ($this->_var['p_r'] == 'institutions_invester'): ?>class="current"<?php endif; ?>>
								<a href="<?php
echo parse_url_tag("u:investor#invester_list|"."r=institutions_invester&loc=".$this->_var['p_loc']."".""); 
?>" value="1">机构投资人</a>
							</li>
							<li <?php if ($this->_var['p_r'] == 'invester'): ?>class="current"<?php endif; ?>>
								<a href="<?php
echo parse_url_tag("u:investor#invester_list|"."r=invester&loc=".$this->_var['p_loc']."".""); 
?>" value="2">投资人</a>
							</li>
							<?php if (app_conf ( 'AVERAGE_USER_STATUS' ) == 1 || INVEST_TYPE == 1): ?>
							<li <?php if ($this->_var['p_r'] == 'ordinary_user'): ?>class="current"<?php endif; ?>>
								<a href="<?php
echo parse_url_tag("u:investor#invester_list|"."r=ordinary_user&loc=".$this->_var['p_loc']."".""); 
?>" value="0">普通用户</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="ui_deals_filter_item last_item">
				<div class="filter_item" id="deals_area">
					<label class="f_l">所在地区：</label>
					<div class="filter_text f_l">
						<ul>
							<li <?php if ($this->_var['p_loc'] == ''): ?>class="current"<?php endif; ?>>
								<a href="<?php
echo parse_url_tag("u:investor#invester_list|"."r=".$this->_var['p_r']."".""); 
?>" value="">全部</a>
							</li>
							<?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city_item');if (count($_from)):
    foreach ($_from AS $this->_var['city_item']):
?>
							<?php if ($this->_var['city_item']['province'] != ''): ?>
							<li <?php if ($this->_var['p_loc'] == $this->_var['city_item']['province']): ?>class="current"<?php endif; ?>>
								<a href="<?php echo $this->_var['city_item']['url']; ?>" target="_self" value=""><?php echo $this->_var['city_item']['province']; ?></a>
							</li>
							<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</ul>
					</div>
					<a href="javascript:void(0);" onclick="javascript:show_pop_region();" class="more_city"><i class="icon iconfont">&#xe619;</i>选择更多城市</a>
				</div>
			</div>
			<div class="blank0"></div>
		</div>
		<!-- 检索条件 结束 -->
		<div class="blank20"></div>
		<div class="xqmain_left">
			<!-- 投资人列表 开始 -->
			<div class="invester_all_list overflow_hide">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="invester_table">
					<thead>
						<tr>
							<th style="padding-left:20px;text-align:left">投资人</th>
							<th>投资领域</th>
							<th>参与项目</th>
							<th>自荐项目</th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_var['invester_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'invester_item');if (count($_from)):
    foreach ($_from AS $this->_var['invester_item']):
?>
						<tr>
							<td class="user_img_box">
								<div class="user_img f_l">
									<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['invester_item']['id']."".""); 
?>">
										<img src="<?php echo $this->_var['invester_item']['image']; ?>" lazy="true" />
									</a>
								</div>
								<div class="user_text f_l">
									<div class="user_text_1">
										<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['invester_item']['id']."".""); 
?>" class="inline_user_name user_name">
											<span class="theme_fcolor b"><?php echo $this->_var['invester_item']['user_name']; ?></span>
										</a>
										<?php if ($this->_var['invester_item']['user_icon']): ?>
						                <img src="<?php echo $this->_var['invester_item']['user_icon']; ?>" title="会员等级" class="inline_level_icon level_icon" />
										<?php endif; ?>
										<i class="<?php if ($this->_var['invester_item']['is_investor'] > 0): ?>inline_investor_type investor_type <?php endif; ?><?php if ($this->_var['invester_item']['is_investor'] == 1): ?>personal_icon<?php endif; ?><?php if ($this->_var['invester_item']['is_investor'] == 2): ?>agency_icon<?php endif; ?>" title="<?php if ($this->_var['invester_item']['is_investor'] == 1): ?>个人投资者<?php endif; ?><?php if ($this->_var['invester_item']['is_investor'] == 2): ?>机构投资者<?php endif; ?>"></i>
										<a href="javascript:void(0)" onclick="send_message(<?php echo $this->_var['invester_item']['id']; ?>)" class="inline_btn_send_message btn_send_message theme_fcolor">+发私信</a>
										<div class="blank0"></div>
									</div>
									<div class="user_text_2 brief">
										<?php if ($this->_var['invester_item']['is_investor'] == 0 || $this->_var['invester_item']['is_investor'] == 1): ?>
										<span>个人</span>
										<?php else: ?>
										<span>
											<?php if ($this->_var['invester_item']['identify_business_name'] != ''): ?>
											<?php echo $this->_var['invester_item']['identify_business_name']; ?>
											<?php else: ?>
											投资机构
											<?php endif; ?>
										</span>
										<?php endif; ?>
										
									</div>
									<div class="user_text_3 seat"><?php if ($this->_var['invester_item']['province']): ?><i class="icon iconfont">&#xe619;</i><?php echo $this->_var['invester_item']['province']; ?>&nbsp;<?php echo $this->_var['invester_item']['city']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; ?><a href="javascript:void(0)" onclick="invester_look(<?php echo $this->_var['invester_item']['id']; ?>,this)" id="detailed_information">详细</a></span>
									<script type="text/javascript">
										function invester_look(id,obj){			
											var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=investor_detailed_information&id="+id;
											$.ajax({
												url: ajaxurl,
												dataType: "json",
												type: "POST",
												success:function(data){
													if(data.status == 1){
														$.weeboxs.open(data.html, {boxid:'append_money',contentType:'text',showButton:false, showCancel:false, showOk:false,title:data.user_name+'详细资料',width:480,type:'wee'});
													}
												}
											});
										}		
									</script>
									</div>
								</div>
							</td>
							<td>
								<?php if ($this->_var['invester_item']['cate_name']): ?>
								<?php $_from = $this->_var['invester_item']['cate_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
								<div><?php echo $this->_var['cate_item']; ?></div>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								<?php else: ?>
								<div>暂无</div>
								<?php endif; ?>
							</td>
							<td>
								<div>发起：<?php echo $this->_var['invester_item']['build_count']; ?>个</div>
								<div>支持：<?php echo $this->_var['invester_item']['support_count']; ?>个</div>
							</td>
							<td>
				            	<a href="javascript:void(0)" rel="<?php echo $this->_var['invester_item']['id']; ?>" name="recommend_project" class="btn_recommend_project <?php if ($this->_var['invester_item']['id'] == $this->_var['user_info']['id']): ?>btn_unrecommend_project<?php endif; ?> b_radius">自荐我的项目</a>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</tbody>
				</table>
				<div class="blank0"></div>
			</div>
			<div class="blank20"></div>
			<div class="pages"><?php echo $this->_var['pages']; ?></div>
			<div class="blank20"></div>
			<!-- 投资人列表 结束 -->
		</div>
		<div class="xqmain_right">
			<!-- 融资成功 开始 -->
			<div class="success_item_box mb20">
				<h3>融资成功的项目</h3>
				<div class="text">
					<?php $_from = $this->_var['deal_success_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_success_item');$this->_foreach['deal_success_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal_success_items']['total'] > 0):
    foreach ($_from AS $this->_var['deal_success_item']):
        $this->_foreach['deal_success_items']['iteration']++;
?>
					<?php if ($this->_foreach['deal_success_items']['iteration'] <= 4): ?>
					<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_success_item']['id']."".""); 
?>" title="<?php echo $this->_var['deal_success_item']['name']; ?>" target="_blank" class="success_item b_radius">
						<img src="<?php echo $this->_var['deal_success_item']['image']; ?>" width="64" height="64" />
					</a>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
			</div>
			<!-- 融资成功 结束 -->
			<!-- 星级投资人 开始 -->
			<div class="success_item_box">
				<h3><i class="stars_investor"></i>星级投资人</h3>
				<div class="text invester_table">
					<?php $_from = $this->_var['stars_invester_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'stars_invester_item');$this->_foreach['stars_invester_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stars_invester_items']['total'] > 0):
    foreach ($_from AS $this->_var['stars_invester_item']):
        $this->_foreach['stars_invester_items']['iteration']++;
?>
					<?php if (($this->_foreach['stars_invester_items']['iteration'] - 1) < 1): ?>
						<div class="user_img f_l">
							<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['stars_invester_item']['id']."".""); 
?>">
			            		<img src="<?php echo $this->_var['stars_invester_item']['image']; ?>" />
					        </a>
						</div>
						<div class="user_text f_l">
							<div class="user_text_1">
								<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['stars_invester_item']['id']."".""); 
?>" class="inline_user_name user_name">
									<span class="theme_fcolor b"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['stars_invester_item']['user_name'],
  'b' => '0',
  'e' => '5',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></span>
								</a>
								<?php if ($this->_var['stars_invester_item']['user_icon']): ?>
				                <img src="<?php echo $this->_var['stars_invester_item']['user_icon']; ?>" title="会员等级" class="inline_level_icon level_icon" />
								<?php endif; ?>
								<i class="inline_investor_type investor_type <?php if ($this->_var['stars_invester_item']['is_investor'] == 0 || $this->_var['stars_invester_item']['is_investor'] == 1): ?>personal_icon<?php else: ?>agency_icon<?php endif; ?>" title="<?php if ($this->_var['stars_invester_item']['is_investor'] == 0 || $this->_var['stars_invester_item']['is_investor'] == 1): ?>个人投资者<?php else: ?>机构投资者<?php endif; ?>"></i>
								<a href="javascript:void(0)" onclick="send_message(<?php echo $this->_var['stars_invester_item']['id']; ?>)" class="inline_btn_send_message btn_send_message theme_fcolor">+发私信</a>
								<div class="blank0"></div>
							</div>
							<div class="user_text_2 brief">
								<?php if ($this->_var['stars_invester_item']['cate_name']): ?>
								<?php $_from = $this->_var['stars_invester_item']['cate_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
								<span><?php echo $this->_var['cate_item']; ?></span>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								<?php else: ?>
								<span>暂无</span>
								<?php endif; ?>
							</div>
							<div class="user_text_3 seat f_l">
								<i class="icon iconfont">&#xe619;</i><?php echo $this->_var['stars_invester_item']['province']; ?>&nbsp;<?php echo $this->_var['stars_invester_item']['city']; ?>
							</div>
							<a href="javascript:void(0)" rel="95" name="recommend_project" class="btn_recommend_project  b_radius">自荐项目</a>
						</div>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
			</div>
			<!-- 星级投资人 结束 -->
			<div class="blank20"></div>
			<!-- 最新投资人 开始 -->
			<div class="success_item_box new_investor_box">
				<h3>最新投资人</h3>
				<div class="text invester_table">
					<ul>
						<?php $_from = $this->_var['new_invester']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'new_invester_item');$this->_foreach['invester_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invester_item']['total'] > 0):
    foreach ($_from AS $this->_var['new_invester_item']):
        $this->_foreach['invester_item']['iteration']++;
?>
						<?php if (($this->_foreach['invester_item']['iteration'] - 1) < 5): ?>
						<li>
							<div class="user_img f_l">
								<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['new_invester_item']['id']."".""); 
?>">
									<img src="<?php echo $this->_var['new_invester_item']['image']; ?>" lazy="true" />
								</a>
							</div>
							<div class="user_text f_l">
								<div class="user_text_1">
									<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['new_invester_item']['id']."".""); 
?>" class="user_name">
										<span class="theme_fcolor b"><?php echo $this->_var['new_invester_item']['user_name']; ?></span>
									</a>
									<?php if ($this->_var['new_invester_item']['user_icon']): ?>
					                <img src="<?php echo $this->_var['new_invester_item']['user_icon']; ?>" title="会员等级" class="level_icon" />
									<?php endif; ?>
									<i class="inline_investor_type investor_type <?php if ($this->_var['new_invester_item']['is_investor'] == 0 || $this->_var['new_invester_item']['is_investor'] == 1): ?>personal_icon<?php else: ?>agency_icon<?php endif; ?>" title="<?php if ($this->_var['new_invester_item']['is_investor'] == 0 || $this->_var['new_invester_item']['is_investor'] == 1): ?>个人投资者<?php else: ?>机构投资者<?php endif; ?>"></i>
									<div class="blank0"></div>
								</div>
								<div class="user_text_2 brief f_l">
								<?php if ($this->_var['new_invester_item']['cate_name']): ?>
									<?php $_from = $this->_var['new_invester_item']['cate_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
									<span><?php echo $this->_var['cate_item']; ?></span>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									<?php else: ?>
									<span>暂无</span>
								<?php endif; ?>
								</div>
								<a href="javascript:void(0)" rel="95" name="recommend_project" class="btn_recommend_project  b_radius">自荐项目</a>
							</div>
							<?php if (! ($this->_foreach['invester_item']['iteration'] == $this->_foreach['invester_item']['total'])): ?>
							<div class="blank5"></div>
							<div class="line"></div>
							<?php endif; ?>
						</li>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
				</div>
			</div>
			<!-- 最新投资人 结束 -->
		</div>
		<div class="blank0"></div>
	</div>
	<div class="blank20"></div>
	<adv adv_id="invester_list_bottom" />
</div>
<script type="text/javascript">
$(function(){
	var $deals_area=$("#deals_area");
	if($deals_area.find("li").length>=17){
		$(this).find(".more_city").show();
	}
	ajax_get_recommend_project();
});
//获取会员所有项目列表
function ajax_get_recommend_project(){
	$("a[name='recommend_project']").bind("click",function(){
		if($(this).attr("rel")=='<?php echo $this->_var['user_info']['id']; ?>'){
			$.showErr("不能给自己推荐！");
			return false;
		}
		var ajaxurl ='<?php
echo parse_url_tag("u:ajax#ajax_get_recommend_project|"."".""); 
?>';
		var query=new Object();
		//推荐人id
		query.id='<?php echo $this->_var['user_info']['id']; ?>';
		//被推荐人id
		query.user_id=$(this).attr("rel");
		$.ajax({
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success:function(ajaxobj){
				if(ajaxobj.status==0){
					show_pop_login();
					return false;
				}
				if(ajaxobj.status==1){
					$.showErr(ajaxobj.info);
					return false;
				}
				if(ajaxobj.status==2){
					$.weeboxs.open(ajaxobj.html, {boxid:'project_recommend_page',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'我的项目',width:480,type:'wee'});
					return false;
				}
			}
		});
	});
}
</script>
<?php echo $this->fetch('inc/footer.html'); ?>