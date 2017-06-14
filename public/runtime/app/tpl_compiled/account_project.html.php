<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/jcDate.css";
$this->_var['dcpagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/jcDate.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jQuery-jcDate.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jQuery-jcDate.js";

$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_list.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_list.js";
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
<style>
.btn_creat{height:30px; font-size:14px; line-height:30px; padding:0 15px; background:#12adff; color:#fff; display:inline-block; -moz-border-radius:3px; -khtml-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;}
.btn_creat:hover{color:#fff;}
input{border:solid 1px rgb(169, 169, 169);}
</style>
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
 	<?php echo $this->fetch('inc/account_left.html'); ?> 
	<div class="homeright pageright f_r">
		<!--
		<?php if (app_conf ( "INVEST_STATUS" ) == 0 || app_conf ( "INVEST_STATUS" ) == 1 || app_conf ( "IS_HOUSE" ) == 1): ?>
 		<a href="<?php
echo parse_url_tag("u:account#project|"."".""); 
?>" class="invest_choice_btn <?php if ($this->_var['action'] == 'project'): ?>cur<?php endif; ?>">回报项目(<?php if ($this->_var['deal_cp_sum']): ?><?php echo $this->_var['deal_cp_sum']; ?><?php else: ?>0<?php endif; ?>)</a>
 		<?php endif; ?>
		<?php if (app_conf ( "INVEST_STATUS" ) == 0 || app_conf ( "INVEST_STATUS" ) == 2): ?>
		<a href="<?php
echo parse_url_tag("u:account#project_invest|"."".""); 
?>" class="invest_choice_btn <?php if ($this->_var['action'] == 'project_invest'): ?>cur<?php endif; ?>">股权项目(<?php if ($this->_var['deal_gq_sum']): ?><?php echo $this->_var['deal_gq_sum']; ?><?php else: ?>0<?php endif; ?>)</a>
		<?php endif; ?>
		-->
		<a href="<?php echo $this->_var['cur_url']; ?>" class="invest_choice_btn cur">
			<?php if ($this->_var['cur_act'] == 'project'): ?>产品<?php endif; ?><?php if ($this->_var['cur_act'] == 'project_house'): ?>房产<?php endif; ?><?php if ($this->_var['cur_act'] == 'project_selfless'): ?>公益<?php endif; ?>项目(<?php if ($this->_var['deal_cp_sum']): ?><?php echo $this->_var['deal_cp_sum']; ?><?php else: ?>0<?php endif; ?>)
		</a>
		
		<div class="blank20"></div>
		 
		<!-- 产品项目检索 开始 -->
		<form action="<?php echo $this->_var['cur_url']; ?>" method="post">
		<div class="list_title clearfix">
			<div <?php if ($this->_var['deal_status'] == 0): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['cur_url']; ?>">所有</a>
			</div>
			<div  <?php if ($this->_var['deal_status'] == 1): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['deal_status_1_url']; ?>">待审核</a>
			</div>
			<div  <?php if ($this->_var['deal_status'] == 2): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['deal_status_2_url']; ?>">进行中</a>
			</div>
			<div  <?php if ($this->_var['deal_status'] == 3): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['deal_status_3_url']; ?>">已成功</a>
			</div>
			<div  <?php if ($this->_var['deal_status'] == 4): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['deal_status_4_url']; ?>">失败</a>
			</div>
			<div  <?php if ($this->_var['deal_status'] == 5): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['deal_status_5_url']; ?>">未通过</a>
			</div>
			<div  <?php if ($this->_var['deal_status'] == 6): ?>class="cur"<?php endif; ?>>
				<a href="<?php echo $this->_var['deal_status_6_url']; ?>">预热中</a>
			</div>
		</div>
		<div class="account_search" id="account_search">
			<div class="blank10"></div>
			<div class="form_row control-group f_l">
				<label class="form_lable small_form_lable">项目名称：</label>
				<div class="pr f_l">
					<input type="text" name="deal_name" value="<?php echo $this->_var['deal_name']; ?>" class="small_textbox w200 mr10" />
					<span class="holder_tip">请输入项目名称</span>
				</div>
				<?php if ($this->_var['deal_status'] == 0 || $this->_var['deal_status'] == 3): ?>
				<select name="give_status" id='give_status' class="ui-select field_select small">
					<option>是否发放筹款</option>
					<option value="1" <?php if ($this->_var['give_status'] == 1): ?> selected="selected"<?php endif; ?>>已发完</option>
					<option value="2" <?php if ($this->_var['give_status'] == 2): ?> selected="selected"<?php endif; ?>>未发完</option>
				</select>
				<?php endif; ?>
			</div>
			<input type="submit" value="搜索" class="ui-button theme_bgcolor" />
			<input type="hidden" name="deal_status" value="<?php echo $this->_var['deal_status']; ?>">
			<input type="hidden" name="more_search" value="<?php echo $this->_var['more_search']; ?>">
			<a href="javascript:void(0);" id="more_search_btn" class="more_search_btn f_red">更多筛选条件<i class="icon iconfont iconfont_down" id="iconfont_down">&#xe61d;</i><i class="icon iconfont iconfont_up" id="iconfont_up">&#xe61c;</i></a>
			<div id="more_search"  <?php if ($this->_var['more_search']): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
				<div class="blank0"></div>
				<div class="form_row control-group f_l">
					<label class="form_lable small_form_lable">创建时间：</label>
					<div class="small_form_text">
						<input readonly="" type="text" class="small_textbox w100 jcDate" rel="input-text" value="<?php echo $this->_var['begin_time']; ?>" name="begin_time" id="inputLaunchTime" placeholder="请选择日期">
						<span class="f_l pl10 pr10">─</span>
						<input readonly="" type="text" class="small_textbox w100 jcDate mr20" rel="input-text" value="<?php echo $this->_var['end_time']; ?>" name="end_time" id="inputLaunchTime" placeholder="请选择日期">
					</div>
					<div class="blank0"></div>
				</div>
			</div>
		</div>
		<!-- 产品项目检索 结束 -->
		</form>
 		 
		<div class="blank20"></div>
		<div class="list_conment">
			<?php if ($this->_var['deal_list']): ?>
			<div class="i_deal_list clearfix">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
					<thead>
						<tr>
							<th width="30%">项目名称</th>
							<th width="10%">类型</th>
							<th width="15%">上线起止日期</th>
							<th width="15%">目标/进度</th>
							<th width="15%">状态</th>
							<th width="15%" style="text-align:right;padding-right:24px">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['deal_item']):
?>
						<tr>
							<td class="lf">
								<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['deal_item']['name']; ?>">
									<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_item']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['deal_item']['name']; ?>" class="f_l p_img" />
									<span class="p_name"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '30',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a>
								</a>
							</td>
							<td >
								<?php 
$k = array (
  'name' => 'get_type_name',
  'v' => $this->_var['deal_item']['type'],
);
echo $k['name']($k['v']);
?>
							</td>
							<td>
								<div><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_item']['begin_time'],
);
echo $k['name']($k['v']);
?></div>
								<div class="blank10"></div>
								<div><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_item']['end_time'],
);
echo $k['name']($k['v']);
?></div>
							</td>
							<td>
								<div><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_item']['limit_price'],
);
echo $k['name']($k['v']);
?></div>
								<div class="blank10"></div>
								<div <?php if ($this->_var['deal_item']['is_effect'] == 1): ?><?php if ($this->_var['deal_item']['is_success'] == 0): ?>class="f_gray"<?php endif; ?><?php endif; ?>>完成 (<?php echo $this->_var['deal_item']['percent']; ?>%)</div>
							</td>
							<td>
									<?php if ($this->_var['deal_item']['is_effect'] == 0): ?>
										<?php if ($this->_var['deal_item']['is_edit'] == 1): ?>
											准备中
										<?php else: ?>
											等待审核
										<?php endif; ?>
									<?php elseif ($this->_var['deal_item']['is_effect'] == 2): ?>
										未通过<?php if ($this->_var['deal_item']['refuse_reason']): ?>,<a href="javascript:void(0);" class="refuse_reason" rel="<?php echo $this->_var['deal_item']['id']; ?>">查看理由</a><?php endif; ?>
									<?php else: ?>
									<?php if ($this->_var['deal_item']['type'] == 1): ?>
										<?php if ($this->_var['deal_item']['is_success'] == 1): ?>
											<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
											<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0 && $this->_var['deal_item']['pay_end_time'] > $this->_var['now']): ?>已成功<?php endif; ?>
											<?php if ($this->_var['deal_item']['pay_end_time'] < $this->_var['now']): ?>已成功<?php endif; ?>
											<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>已成功<?php endif; ?>
										<?php else: ?>
											<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
											<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0 && $this->_var['deal_item']['pay_end_time'] > $this->_var['now']): ?>支付阶段<?php endif; ?>
											<?php if ($this->_var['deal_item']['pay_end_time'] < $this->_var['now']): ?>未成功<?php endif; ?>
											<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>融资中<?php endif; ?>
										<?php endif; ?>
									<?php else: ?>
										<?php if ($this->_var['deal_item']['is_success'] == 1): ?>
											<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
											<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>已成功<?php endif; ?>
											<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>已成功<?php endif; ?>
										<?php else: ?>
											<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>预热中<?php endif; ?>
											<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>未成功<?php endif; ?>
											<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>进行中<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<?php endif; ?>
							</td>
							<td	style="text-align:right;padding-right:20px">
								<?php if ($this->_var['deal_item']['is_effect'] == 0): ?>
									<?php if ($this->_var['deal_item']['is_edit'] == 1): ?>
										<?php if ($this->_var['deal_item']['type'] == 1): ?>
											<a href="<?php
echo parse_url_tag("u:project#investor_edit|"."id=".$this->_var['deal_item']['id']."".""); 
?>">编辑</a>
										<?php else: ?>
											<a href="<?php
echo parse_url_tag("u:project#edit|"."id=".$this->_var['deal_item']['id']."".""); 
?>">编辑</a>
										<?php endif; ?>
									<a href="<?php
echo parse_url_tag("u:project#del|"."id=".$this->_var['deal_item']['id']."".""); 
?>" class="del_deal">删除</a>
									<?php else: ?>
									等待审核
									<?php endif; ?>
								<?php elseif ($this->_var['deal_item']['is_effect'] == 2): ?>
									<?php if ($this->_var['deal_item']['type'] == 1): ?>
										<a href="<?php
echo parse_url_tag("u:project#investor_edit|"."id=".$this->_var['deal_item']['id']."".""); 
?>">编辑</a>
									<?php else: ?>
										<a href="<?php
echo parse_url_tag("u:project#edit|"."id=".$this->_var['deal_item']['id']."".""); 
?>">编辑</a>
									<?php endif; ?>
										<a href="<?php
echo parse_url_tag("u:project#del|"."id=".$this->_var['deal_item']['id']."".""); 
?>" class="del_deal">删除</a>
								<?php else: ?>
									<a href="<?php
echo parse_url_tag("u:deal#update|"."id=".$this->_var['deal_item']['id']."".""); 
?>">项目日志</a>
									<div class="blank5"></div>
									<?php if ($this->_var['deal_item']['type'] == 1): ?>
									<a href="<?php
echo parse_url_tag("u:account#get_leader_list|"."id=".$this->_var['deal_item']['id']."".""); 
?>">领投资格列表</a>
									<div class="blank5"></div>
									<?php endif; ?>
									<?php if ($this->_var['deal_item']['is_success'] == 1): ?>
										<?php if ($this->_var['deal_item']['type'] == 1): ?>
											<?php if (app_conf ( "IS_ENQUIRY" ) == 1): ?>
												<a href="<?php
echo parse_url_tag("u:account#get_investor_status|"."id=".$this->_var['deal_item']['id']."&type=0".""); 
?>">申请列表</a>
											<?php else: ?>
												<a href="<?php
echo parse_url_tag("u:account#get_investor_status|"."id=".$this->_var['deal_item']['id']."&type=1".""); 
?>">申请列表</a>
											<?php endif; ?>
											<div class="blank5"></div>
											<a href="<?php
echo parse_url_tag("u:account#support|"."id=".$this->_var['deal_item']['id']."&type=1".""); 
?>">投资列表</a>
											<div class="blank5"></div>
											<a href="<?php
echo parse_url_tag("u:account#paid|"."id=".$this->_var['deal_item']['id']."".""); 
?>">放款记录</a>
										<?php else: ?>
											<a href="<?php
echo parse_url_tag("u:account#support|"."id=".$this->_var['deal_item']['id']."".""); 
?>">支持记录</a>
											<div class="blank5"></div>
											<a href="<?php
echo parse_url_tag("u:account#paid|"."id=".$this->_var['deal_item']['id']."".""); 
?>">放款记录</a>
											<?php if ($this->_var['deal_item']['is_lottery'] == 1): ?>
											<div class="blank5"></div>
											<a href="<?php
echo parse_url_tag("u:account#lottery|"."id=".$this->_var['deal_item']['id']."".""); 
?>">抽奖列表</a>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
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
				无相关信息，可尝试其他操作
				<!--从未创建过任何项目 <a href="<?php
echo parse_url_tag("u:project#choose|"."".""); 
?>" class="btn_creat linkgreen">立即创建项目</a>-->
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="blank0"></div>
</div>
<!--中间结束-->
<script type="text/javascript">
	account_more_search("#more_search_btn","#more_search");
	account_more_search("#more_investsearch_btn","#more_investsearch");
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
<script>
	$(function(){
 		$(".refuse_reason").bind("click",function(){
			var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=refuse_reason";
 			var obj=new Object();
			obj.deal_id=$(this).attr("rel");
			$.ajax({ 
				url: ajaxurl,
				data:obj,
				type: "POST",
				dataType: "json",
				success: function(data){
					if(data.status==1){
						$.weeboxs.open(data.info, {boxid:'fanwe_success_box',contentType:'text',showButton:true, showCancel:false, showOk:true,title:'未通过原因',width:250,type:'wee'});
					}else{
						$.showErr(data.info);
					}
					
					
				}
			});
		});
	});
	
	function bind_project_form()
	{	
//			search_type=$("select[name='search_type']").val();
//			search_name=$("input[name='search_name']").val();
//			$("#account_project").attr("action","<?php
echo parse_url_tag("u:account#project|"."".""); 
?>"+"&search_type="+search_type+"&search_name="+search_name);
 		$("#account_project").submit();
	}
	$("#account_project").bind("submit",function(){
 		search_type=$("select[name='search_type']").val();
			search_name=$("input[name='search_name']").val();
			$("#account_project").attr("action","<?php
echo parse_url_tag("u:account#project|"."".""); 
?>"+"&search_type="+search_type+"&search_name="+search_name);
			
			return true;
	});
	
</script>
<?php echo $this->fetch('inc/footer.html'); ?> 