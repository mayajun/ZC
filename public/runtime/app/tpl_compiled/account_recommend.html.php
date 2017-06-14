<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_list.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_list.js";
?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<style type="text/css">
	.hide_area{display:none;}
	.hide_area td{padding:20px;text-align:left}
	.deletebox{
		display:none;
		width:16px;
		margin:0 auto;
	}
	.deletebox i {
		background:url(<?php echo $this->_var['TMPL']; ?>/images/del_icon.png) no-repeat;
		display:inline-block;
		vertical-align:middle;
		width:16px;
		height:16px;
	}
	.uc_table td{border-bottom:1px solid #f2f2f2;}
</style>
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!-- 中间开始 -->
<div class="dlmain Myhomepage">
	<!-- 左侧菜单 开始 -->
	<?php echo $this->fetch('inc/account_left.html'); ?>
	<!-- 左侧菜单 结束 -->

	<!-- 右侧内容 开始 -->
	<div class="homeright pageright f_r">
		<div class="list_title clearfix">
			<div <?php if ($this->_var['all'] == 0): ?>class="cur"<?php endif; ?>>
				<span>推荐给我的项目</span>
			</div>
		</div>
		<div class="list_conment">
			<?php if ($this->_var['recommend_info'] != null): ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table" id="account_recommend">
				<thead>
					<tr>
						<th>项目名称</th>
						<?php if ($this->_var['recommend_act'] == 'recommend_investor' || $this->_var['recommend_act'] == 'recommend_finance'): ?>
						<th>融资阶段</th>
						<?php endif; ?>
						<th style="width:20%">类型</th>
						<th style="width:20%">推荐时间</th>
						<th style="width:13%">操作</th>
						<th style="width:4%">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_var['recommend_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'recommend_info_item');if (count($_from)):
    foreach ($_from AS $this->_var['recommend_info_item']):
?>
					<tr>
						<td class="lf">
							<?php if ($this->_var['recommend_info_item']['type'] == 4): ?>
							<a href="<?php
echo parse_url_tag("u:finance#company_finance|"."id=".$this->_var['recommend_info_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['recommend_info_item']['deal_name']; ?>">
								<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['recommend_info_item']['deal_image'],
  'w' => '60',
  'h' => '45',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" alt="<?php echo $this->_var['recommend_info_item']['deal_name']; ?>" class="f_l p_img"/>
								<span class="p_name"><?php echo $this->_var['recommend_info_item']['deal_name']; ?></span>
							</a>
							<?php else: ?>
							<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['recommend_info_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['recommend_info_item']['deal_name']; ?>">
								<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['recommend_info_item']['deal_image'],
  'w' => '60',
  'h' => '45',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" alt="<?php echo $this->_var['recommend_info_item']['deal_name']; ?>" class="f_l p_img"/>
								<span class="p_name"><?php echo $this->_var['recommend_info_item']['deal_name']; ?></span>
							</a>
							<?php endif; ?>
						</td>
						<?php if ($this->_var['recommend_act'] == 'recommend_investor' || $this->_var['recommend_act'] == 'recommend_finance'): ?>
						<td><?php if ($this->_var['recommend_info_item']['type'] == 4): ?><?php 
$k = array (
  'name' => 'get_invest_phase',
  'v' => $this->_var['recommend_info_item']['invest_phase'],
);
echo $k['name']($k['v']);
?><?php else: ?>无<?php endif; ?></td>
						<?php endif; ?>
						<td><?php if ($this->_var['recommend_info_item']['deal_type'] == 1): ?><?php echo $this->_var['gq_name']; ?><?php endif; ?><?php if ($this->_var['recommend_info_item']['deal_type'] == 0): ?>普通众筹<?php endif; ?></td>
						<td><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['recommend_info_item']['create_time'],
);
echo $k['name']($k['v']);
?></td>
						<td	class="p_op">
							<a href="javascript:void(0);" class="view_deal theme_fcolor">查看推荐理由</a><br />
						</td>
						<td class="p_del">
							<a href="javascript:void(0);" class="deletebox sc" rel="<?php echo $this->_var['recommend_info_item']['id']; ?>">
                                <i></i>
                            </a>
						</td>
					</tr>
					<tr class="hide_area">
						<td colspan="5">
							<?php echo $this->_var['recommend_info_item']['memo']; ?>
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</tbody>	
			</table>
			<div class="blank20"></div>
			<div class="pages"><?php echo $this->_var['pages']; ?></div>
			<div class="blank20"></div>
			<?php else: ?>
			<div class="f14 tc">
				暂时没有推送的项目，点击立即<a href="<?php
echo parse_url_tag("u:deals|"."".""); 
?>" class="btn_creat ml10" target="_blank">浏览更多项目</a>
			</div>
			<?php endif; ?>
		</div>
		<div class="blank"></div>
	</div>
	<!-- 右侧内容 结束 -->
	<div class="blank"></div>
</div>
<!-- 中间结束 -->
<script type="text/javascript">
$(function(){
	$(".view_deal").bind("click",function(){
		var $this = $(this);
		var $td = $this.parent().parent().find("td");
		var $hide_area = $this.parent().parent().next(".hide_area");
		if($hide_area.is(":hidden")){
			$this.html("关闭推荐理由");
			$td.css("borderBottom","0");
			$hide_area.show();
		}
		else{
			$this.html("查看推荐理由");
			$td.css("borderBottom","1px solid #f2f2f2");
			$hide_area.hide();
		}
	});

	$("#account_recommend tr").bind('mouseover mouseout', function(e){
		$(this).find(".deletebox").toggle();
	});
	
	ajax_delete_recommend();
})
function ajax_delete_recommend(){
	$(".sc").bind("click",function(){
		if (confirm("确认要删除吗？")) {
			var id=$(this).attr("rel");
          	var ajaxurl ='<?php
echo parse_url_tag("u:ajax#ajax_delete_recommend|"."".""); 
?>';
			var query=new Object();
			query.id=id;
			$.ajax({
				url: ajaxurl,
				dataType: "json",
				data:query,
				type: "POST",
				success:function(ajaxobj){
					if(ajaxobj.status==0){
						$.showErr(ajaxobj.info);
						return false;
					}
					if(ajaxobj.status==1){
						$.showSuccess(ajaxobj.info,function(){
							window.location.reload();
						});
						return false;
					}
					
				}
			});
        }
	});
	return false;
}
</script>
<?php echo $this->fetch('inc/footer.html'); ?> 