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
<div class="mod deal_investor_show">
	<section class="deal_box">
		<!-- 1 开始 -->
		<div class="imgboxdt">
		    <a class="pb-standalone" href="#" title="<?php echo $this->_var['deal_info']['name']; ?>">
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
?><?php endif; ?>" alt="<?php echo $this->_var['deal_info']['name']; ?>" />
				<?php else: ?>
  				<iframe width=100% src="<?php echo $this->_var['deal_info']['source_vedio']; ?>" frameborder=0 allowfullscreen></iframe>
				<?php endif; ?>
 	    	</a>
    	</div>
    	<a href="#" title="<?php echo $this->_var['deal_info']['name']; ?>" class="deal_title sizing"><?php echo $this->_var['deal_info']['name']; ?></a>
    	<!-- 1 结束 -->

    	<!-- 2 开始 -->
    	<div class="paiduan">
        	<span class="caption-title">
	        	目标：<em class="blak"><?php echo $this->_var['deal_info']['limit_price_format']; ?>万</em>
        	</span>
            <span class="f_r ">
	  			<?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>
				<span class="common common-sprite">预热中</span>
				<?php elseif ($this->_var['deal_info']['end_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] != 0): ?>
					<?php if ($this->_var['deal_info']['is_success'] == 1): ?>
				<span class="common common-success">已成功</span>
					<?php else: ?>
				<span class="common common-fail">筹资失败</span>
					<?php endif; ?>	 
				<?php else: ?>
					<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
						<span class="common common-success">已成功</span>
					<?php elseif ($this->_var['deal_info']['end_time'] == 0): ?>
				<span class="common common-sprite">长期项目</span>
					<?php else: ?>
				<span class="common common-success">融资中</span>
					<?php endif; ?>
				<?php endif; ?>
            </span>
	 	</div>
    	<div class="blank5"></div>
    	<!-- 2 结束 -->

    	<!-- 3 开始 -->
    	<div class="deal_content_box pd">             
     		<div class="ui">
      			<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
                <span class="common-success" style="width:100%;"></span>
                <?php else: ?>
                <span class="progress" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;"></span>
                <?php endif; ?>
         	</div>             
        	<div class="blank"></div>
        	<div class="div_dt">
        		<span class="num theme_fcolor"><?php echo $this->_var['deal_info']['gen_num']; ?></span><br />
        		<span class="til">跟投人数</span>
        	</div>
        	<div class="div_dt">
				<span class="f_money"><?php echo $this->_var['deal_info']['total_virtual_price']; ?>万</span><br />
				<span class="til">认投金额</span>
			</div>
	        <div class="div_dt" style="border:none;">
	            <span class="num theme_fcolor"><?php echo $this->_var['deal_info']['xun_num']; ?></span><br />
	            <span class="til">询价人数</span>               
	        </div>
        	<div class="blank"></div>
    	</div>
    	<div class="blank10"></div>
    	<!-- 3 结束 -->
    </section>
	<!-- 3 开始 -->
	<div class="blank15"></div>
	<div class="detailmain_3 webkit-box invest_btn_box">
		<!-- 领投 -->
		<a class="ui-button <?php if ($this->_var['deal_info']['pay_end_time'] < NOW_TIME || $this->_var['deal_info']['end_time'] < NOW_TIME || $this->_var['deal_info']['begin_time'] > NOW_TIME): ?>bg_gray<?php else: ?>bg_red<?php endif; ?> webkit-box-flex" name="applicate_leader" id="applicate_leader">我要领投</a>
		<input name="leader_ajax" id="leader_ajax" value="1" type="hidden"/>
		<!-- 跟投 -->
		<a name="continue_investor" id="continue_investor" class="ui-button <?php if ($this->_var['deal_info']['pay_end_time'] < NOW_TIME || $this->_var['deal_info']['end_time'] < NOW_TIME || $this->_var['deal_info']['begin_time'] > NOW_TIME): ?>bg_gray<?php else: ?>theme_color<?php endif; ?> follow_invest webkit-box-flex <?php if (app_conf ( "IS_ENQUIRY" ) == 0): ?> btn_enquiry_money<?php endif; ?>">我要跟投</a>
		<input name="continue_ajax" id="continue_ajax" value="1" type="hidden"/>
		<!-- 约谈 -->
		<a href="#" class="ui-button <?php if ($this->_var['deal_info']['pay_end_time'] < NOW_TIME || $this->_var['deal_info']['end_time'] < NOW_TIME): ?>bg_gray<?php else: ?>bg_green<?php endif; ?> conver webkit-box-flex" onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>);">我要约谈</a>
	</div>
	<!-- 3 结束 -->
	<section class="deal_shit">
	    <span>发起人：<?php if ($this->_var['deal_info']['user_name']): ?><?php echo $this->_var['deal_info']['user_name']; ?><?php else: ?><?php echo $this->_var['site_name']; ?><?php endif; ?></span>
	    <a class="f_red" href=""><?php echo $this->_var['deal_user_info']['user_name']; ?></a>
		<!-- 会员等级，投资人类型图标 -->
		<?php if ($this->_var['user_info']['user_icon']): ?>
		<div class="f_l">
			<img src="<?php echo $this->_var['user_info']['user_icon']; ?>" alt="会员等级" class="level_icon" />
		</div>
		<?php endif; ?>
		<div class="f_l">
			<i class="investor_type <?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>personal_icon<?php else: ?>agency_icon<?php endif; ?>" title="<?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>个人投资者<?php else: ?>机构投资者<?php endif; ?>"></i>
		</div>
		
	    <a class="f_r <?php if ($this->_var['is_focus']): ?>qxgz<?php else: ?>gz<?php endif; ?> attention_focus_deal" id="<?php echo $this->_var['deal_info']['id']; ?>" href="#">
	    	<?php if ($this->_var['is_focus']): ?><i class="icon iconfont is_focus">&#xe605;</i> 取消关注<?php else: ?><i class="icon iconfont no_focus">&#xe606;</i>关注<?php endif; ?>
	    </a>
	    <span></span>
	</section>
  	<seation class="detail_main">
  		<!-- 1 开始 -->
  		<div class="detailmain_1">
    		<div class="tl">
				<span class="zs">融资金额：</span>
				<span class="nu1"><?php echo $this->_var['deal_info']['limit_price_format']; ?>万</span>
			</div>
			<?php if ($this->_var['deal_info']['end_time'] != 0): ?>	
			<div class="tl">
				<span class="zs">剩余时间：</span>
				<span class="nu1"><?php if ($this->_var['deal_info']['begin_time'] > NOW_TIME): ?>预热中<?php else: ?><?php if ($this->_var['deal_info']['remain_days'] < 0): ?><?php if ($this->_var['deal_info']['percent'] > 100): ?>已成功<?php else: ?>已过期<?php endif; ?><?php else: ?><?php if ($this->_var['deal_info']['remain_days'] <= 0): ?>0<?php else: ?><?php echo $this->_var['deal_info']['remain_days']; ?><?php endif; ?>天<?php endif; ?><?php endif; ?></span>
			</div>
			<?php endif; ?>
			<div class="tl">
				<span class="zs">支持人数：</span>
	 			<span class="nu1"><?php echo $this->_var['deal_info']['invote_num']; ?>人</span>
	 		</div>
	 		<div class="tl">
				<span class="zs">支付方式：</span>
	 			<span class="nu1"><?php if ($this->_var['deal_info']['ips_bill_no'] == 0): ?>网站支付<?php else: ?>第三方托管<?php endif; ?></span>
	 		</div>
			<div class="tl">
				<span class="zs">款项拨付方式：</span>
				<span class="nu1">一次性全额到账</span>
			</div>
			<div class="blank5"></div>
			<div class="tl">
				<span class="zs">项目截止时间：</span>
				<span class="nu1 f_red"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['end_time'],
  'f' => 'Y年m月d日H时i分',
);
echo $k['name']($k['v'],$k['f']);
?></span>
			</div>
			<div class="blank5"></div>
    	</div>
    	<!-- 1 结束 -->
    	<!-- 2 开始 -->
    	<div class="detailmain_2">
		    <div>
		    	<label class="f_666">项目简介：</label>
		    	<div class="blank0"></div>
		    	<div class="f13">
		    		<?php echo $this->_var['deal_item']['business_descripe']; ?>
		    	</div>
		    </div>
		    <?php if ($this->_var['access'] == 1 || $this->_var['access'] == 3): ?>
      		<p class="tc mt10">
		    	<a class="detailmain_a J_view_detail" href="#">
			    	<span class="theme_fcolor" id="view_details">展开详情 +</span><i class="fa fa-angle-right"></i>
			    </a>
		    </p>
    		<div id="deal_info_box" style="display:none">
			 	<div class="blank10"></div>
	    		<table width="100%" border="0" cellspacing="1" cellpadding="0" class="tab3">
				    <tbody>
				    	<?php if ($this->_var['deal_item']['type'] == 4): ?>
						 <tr>
				            <td align="right" class="td_l">项目名称：</td>
				            <td><?php echo $this->_var['deal_item']['name']; ?></td>
				        </tr>
						<?php endif; ?>
				        <tr>
				            <td align="right" class="td_l">项目类别：</td>
				            <td><?php echo $this->_var['cates']; ?></td>
				        </tr>
				        <tr>
				        	<td align="right" class="td_l">项目标签：</td>
				            <td><?php echo $this->_var['deal_item']['tags']; ?></td>
				        </tr>
				        <tr>
				        	<td align="right" class="td_l">项目所属阶段：</td>
				            <td><?php if ($this->_var['deal_item']['project_step'] == 0): ?>尚未启动<?php endif; ?><?php if ($this->_var['deal_item']['project_step'] == 1): ?>产品开发中<?php endif; ?><?php if ($this->_var['deal_item']['project_step'] == 2): ?>产品已上市或上线<?php endif; ?><?php if ($this->_var['deal_item']['project_step'] == 3): ?>已经有收入<?php endif; ?><?php if ($this->_var['deal_item']['project_step'] == 4): ?>已经盈利<?php endif; ?></td>
				        </tr>
				        <tr>
				            <td align="right" class="td_l">出让股份：</td>
				            <td><?php echo $this->_var['deal_item']['transfer_share']; ?>%</td>
				        </tr>
				        <tr>
				        	<td align="right" class="td_l">是否有其他项目：</td>
				            <td><?php if ($this->_var['deal_item']['has_another_project'] == 0): ?>否<?php else: ?>是<?php endif; ?></td>
				        </tr>
				        <tr>
				            <td align="right" class="td_l">企业所在城市：</td>
				            <td><?php echo $this->_var['deal_item']['city']; ?></td>
				        </tr>
				        <tr>
				        	<?php if ($this->_var['deal_item']['business_is_exist'] == 1): ?>
				        	<td align="right" class="td_l">企业成立时间：</td>
				            <td><?php echo $this->_var['deal_item']['business_create_time']; ?></td>
				            <?php else: ?>
				            <td align="right" class="td_l">公司是否已经成立：</td>
				            <td>否</td>
				            <?php endif; ?>
				        </tr>
			            <tr>
				            <td align="right" class="td_l">企业员工人数：</td>
				            <td><?php echo $this->_var['deal_item']['business_employee_num']; ?></td>
				        </tr>
				        <tr>
				            <td align="right" class="td_l">公司名称：</td>
				            <td><?php echo $this->_var['deal_item']['business_name']; ?></td>
				        </tr>
				        <tr>
				        	<td align="right" class="td_l">公司地址：</td>
				            <td><?php echo $this->_var['deal_item']['business_address']; ?></td>
				        </tr>
						<?php if ($this->_var['deal_item']['type'] == 4): ?>
						 <tr>
				            <td align="right" class="td_l">轮次：</td>
				            <td>
								<?php if ($this->_var['deal_item']['invest_phase'] == 0): ?>天使轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 1): ?>Pre-A轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 2): ?>A轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 3): ?>A+轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 4): ?>B轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 5): ?>B+轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 6): ?>C轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 7): ?>D轮<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 8): ?>E轮及以后<?php endif; ?>
		                        <?php if ($this->_var['deal_item']['invest_phase'] == 9): ?>并购<?php endif; ?>
							</td>
				        </tr>
						<?php endif; ?>
				    </tbody>
				</table>
				<div class="blank15"></div>
				<table width="100%" border="0" cellspacing="1" cellpadding="0" class="tab3 tab4">
				    <tbody>
				    	<tr>
				            <td align="center" colspan="2">其他资质材料</td>
				        </tr>
				        <tr>
				            <td>审核项目</td>
				            <td>审核状态</td>
				        </tr>
				        <?php if ($this->_var['audit_data_list']['legal_id']['display_type'] == 0): ?>
				        <tr>
				        	<td align="right" class="td_l">法人代表身份证</td>
				            <td><?php if ($this->_var['audit_data_list']['legal_id']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				        <?php if ($this->_var['audit_data_list']['legal_credit']['display_type'] == 0): ?>
				        <tr>
				        	<td align="right" class="td_l">法人代表个人信用报告</td>
				            <td><?php if ($this->_var['audit_data_list']['legal_credit']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				        <?php if ($this->_var['audit_data_list']['business_license']['display_type'] == 0): ?>
				        <tr>
				            <td align="right" class="td_l">营业执照</td>
				            <td><?php if ($this->_var['audit_data_list']['business_license']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				        <?php if ($this->_var['audit_data_list']['tax_registration_certificate']['display_type'] == 0): ?>
				        <tr>
				        	<td align="right" class="td_l">税务登记证</td>
				            <td><?php if ($this->_var['audit_data_list']['tax_registration_certificate']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				        <?php if ($this->_var['audit_data_list']['organization_code']['display_type'] == 0): ?>
				        <tr>
				            <td align="right" class="td_l">组织机构代码证</td>
				            <td><?php if ($this->_var['audit_data_list']['organization_code']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				        <?php if ($this->_var['audit_data_list']['company_photo']['display_type'] == 0): ?>
				        <tr>
				        	<td align="right" class="td_l">公司照片</td>
				            <td><?php if ($this->_var['audit_data_list']['company_photo']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				        <?php if ($this->_var['audit_data_list']['site_contract']['display_type'] == 0): ?>
			            <tr>
				            <td align="right" class="td_l">场地租赁合同</td>
				            <td><?php if ($this->_var['audit_data_list']['site_contract']['status'] != 1): ?><i class="fa fa-times-circle f_gray"></i><?php else: ?><i class="fa fa-check-circle theme_fcolor"></i><?php endif; ?></td>
				        </tr>
				        <?php endif; ?>
				    </tbody>
				</table>
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
		            温馨提示：您未实名认证，马上去<a href="#" onclick="RouterURL('<?php
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
		            温馨提示：您的实名认证未通过，重新去<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-id-box".""); 
?>','#settings-security',2);" class="f_red link_underline">实名认证</a>！
		        </div>
		        <?php endif; ?>
			<?php endif; ?>
		</div>
    	<!-- 2 结束 -->
		<div class="blank10"></div>
		<?php if ($this->_var['access'] == 1): ?>
    	<!-- 4 开始 -->
    	<div class="detailmain_4">
    		<div class="total">
    			<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:deal#project_follow|"."deal_id=".$this->_var['deal_info']['id']."".""); 
?>','#deal-project_follow',2);" target="_blank">
    				<div class="project_ico"></div>
	                <div class="specific_items">
	                    <h3>
	                    	<span>投资人数</span>
	                    	<span class="f_r bg_red"><?php echo $this->_var['count']; ?>人</span>
	                    </h3>
	                </div>
	                <div class="go_see"><i class="fa fa-chevron-right"></i></div>
    			</a>
    		</div>
			<div class="blank5"></div>
			<?php if ($this->_var['leader_info']['user_name']): ?>
	    		<div class="leader">
	    			<h3 class="theme_fcolor">项目领投人</h3>
	    			<div class="text webkit-box">
	    				<div class="l mr10 leader_img">
	    					<?php 
$k = array (
  'name' => 'show_wap_blank_avatar',
  'p' => $this->_var['leader_info']['user_id'],
  't' => 'middle',
);
echo $k['name']($k['p'],$k['t']);
?>
							<div class="blank10"></div>
							<a href="#" onclick="send_message(<?php echo $this->_var['leader_info']['user_id']; ?>)" class="btn_send theme_color f14 b_radius3"><i class="fa fa-envelope mr5"></i>发私信</a>
	    				</div>
	    				<div class="r webkit-box-flex">
	    					<div class="leader_title">
				        		<span class="user_name f_l mr5"><?php echo $this->_var['leader_info']['user_name']; ?></span>
								<?php if ($this->_var['leader_info']['user_icon']): ?>
								<div class="user_icon f_l">
				                	<img src="<?php echo $this->_var['leader_info']['user_icon']; ?>" title="会员等级" class="inline_level_icon level_icon" />
				                </div>
								<?php endif; ?>
								<div class="user_icon f_l">
									<?php if ($this->_var['leader_info']['is_investor'] == 0 || $this->_var['leader_info']['is_investor'] == 1): ?>
									<i class="icon iconfont" rel="个人投资者认证">&#xe609;</i>
									<?php else: ?>
									<i class="icon iconfont" rel="机构投资者认证">&#xe608;</i>
									<?php endif; ?>
								</div>
								<div class="user_icon f_l"><i class="fa fa-flag"></i></div>
							</div>
							<div class="blank5"></div>
					        <div class="conment">
					        	<div><?php echo $this->_var['leader_info']['identify_name']; ?> | <a class="theme_fcolor"  onclick="javascript:leader_detailed_information();">详细资料&gt;&gt;</a></div>
					    	  	<div>
					    	  		<label class="f_666">领投金额：<span class="f_money"><?php echo $this->_var['leader_info']['money']; ?></span></label><span class="symbol">万</span>
					    	  	</div>
					    	  	<div>
					    	  	<label class="f_666">领投时间：</label><span><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['leader_info']['create_time'],
);
echo $k['name']($k['v']);
?></span>	
					    	  	</div>
							</div>
	    				</div>
	    			</div>
	    		</div>
    		<?php else: ?>
    			<div class="leader mb10">
	    			项目领投人：无
	    		</div>
			<?php endif; ?>
    	</div>
    	<!-- 4 结束 -->
		
    	<!-- 5 开始 -->
    	<div class="detailmain_5">
			<p><?php echo $this->_var['deal_info']['description']; ?></p>
			<!--投资者信息-->
			<?php echo $this->fetch('inc/investor_info.html'); ?>
    	</div>
    	<!-- 5 结束 -->
    	<?php endif; ?>
  	</seation>
  	<?php if ($this->_var['access'] == 1): ?>

	<section class="detailborder" onclick="$.router.loadPage('<?php echo $this->_var['deal_info']['update_url']; ?>');">
	    <div class="detailmain Dynamic">        
	        <span class="span1">圈子动态（<?php echo $this->_var['deal_info']['log_count']; ?>）</span>
	        <span class="span3"><i class="fa fa-angle-right "></i></span>
	    </div>
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
    	<div class="blank"></div>
	</section>

	<?php if ($this->_var['comment_count']): ?>
	<section class="detailborder" onclick="$.router.loadPage('<?php echo $this->_var['deal_info']['comment_url']; ?>');">
	    <div class="detailmain Dynamic">        
	        <span class="span1">评论（<?php echo $this->_var['comment_count']; ?>）</span>
	        <span class="span3"><i class="fa fa-angle-right "></i></span>
	    </div>
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
    	<div class="blank"></div>
	</section>
	<?php endif; ?>
	<?php endif; ?>
</div>
<!-- 中间 结束 -->
<script type="text/javascript">
	var deal_info_id = <?php echo $this->_var['deal_info']['id']; ?>;
	var login_id = '<?php echo $this->_var['user_info']['id']; ?>';
	var leader_info_id = '<?php echo $this->_var['leader_info']['id']; ?>';
	var IS_ENQUIRY = <?php echo app_conf("IS_ENQUIRY")?>;
	var deal_info_type = '<?php echo $this->_var['deal_info']['type']; ?>';
</script>
<!-- deal.js -->
<!-- deal_investor_show.js -->
<?php echo $this->fetch('inc/footer.html'); ?>