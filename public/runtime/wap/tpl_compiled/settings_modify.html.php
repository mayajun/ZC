<?php echo $this->fetch('inc/header.html'); ?>
<script type="text/javascript">
    var ROOT = '<?php echo $this->_var['APP_ROOT']; ?>/m.php';
    var VAR_MODULE = "m";
    var VAR_ACTION = "a";
    var WEB_SESSION_ID = '<?php echo es_session::id(); ?>';
    var EMOT_URL = '<?php echo $this->_var['APP_ROOT']; ?>/public/emoticons/';
    var MAX_FILE_SIZE = '<?php echo $this->_var['max_size_byte']; ?>b';
    var UPLOAD_URL ='<?php echo $this->_var['APP_ROOT']; ?>/wap/index.php?ctl=avatar&act=upload&uid=<?php echo $this->_var['user_info']['id']; ?>';
	var UPLOAD_SWF='<?php echo $this->_var['TMPL']; ?>/js/plupload/Moxie.swf';
	var UPLOAD_XAP='<?php echo $this->_var['TMPL']; ?>/js/plupload/Moxie.xap';
	var ALLOW_IMAGE_EXT= "gif,jpg,jpeg,png,bmp";
	var MAX_IMAGE_SIZE= '<?php echo $this->_var['max_size_byte']; ?>b';
	
	function get_file_fun(name){
		$("#"+name).ui_upload({
			multi:false,
			FilesAdded:function(){
				$.showPreloader('图片上传中');
			},
			FileUploaded:function(ajaxobj){
 				if(ajaxobj.error==1)
				{
					$.alert(ajaxobj.info);
				}else{
					$("#avatar").attr("src",ajaxobj.middle_url+"?r="+Math.random());
					$("#"+name+"_u").val(ajaxobj.public_url);
 				}
 				$.hidePreloader();
			},Error:function(error){
				if(error.code==-600){
					$.alert("您上传的文件太大，最大允许上传<?php echo $this->_var['max_size']; ?>");
				}else{
					$.alert(error.message);
				}
 			}
 		});
	}
</script>
<script>
	var gz_region_i = <?php echo $this->_var['gz_region_count']; ?>;
</script>
<style>
	.select_mod .f_select{padding:0 5px;}
	.btn_gz_city{display:inline-block;width:inherit;padding:0 5px;margin:0 5px;}
	.gz_region_box .iconfont{color:#b9b9b9;}
</style>
<section class="settings_modify">
	<nav class="tab_hd webkit-box">
	  	<a href="#" class="nav_l sizing J_SelectPersonalType cur" rel="carry_type1">个人设置</a>
	  	<a href="#" class="nav_r sizing J_SelectAgencyType" rel="carry_type2">投资设置</a>
	</nav>
	<form id="user_register_form" class="ajax_setting_form" action="<?php
echo parse_url_tag_wap("u:settings#save_modify|"."".""); 
?>"  method="post">
		<div class="ul_block" id="J_online_pay">
			<ul>
				<li class="u_img webkit-box">
					<label class="input_lable mr10">头像</label>
					<div class="list_con webkit-box-flex" style="padding:10px 0;">
						<div class="user_pic">
		                    <img id="avatar" src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'uid' => $this->_var['user_info']['id'],
  'type' => 'middle',
);
echo $k['name']($k['uid'],$k['type']);
?>" width="100%">
			                <input type="hidden" name="avatar_file_u" id="avatar_file_u" value="<?php echo $this->_var['user_info']['identify_business_tax']; ?>" rel="num" />
			            	<input type="button" class="filebox" name="avatar_file" id="avatar_file" />
			            	<div class="fileuploading"></div>
		                </div>
						<div class="go_see" style="top: 34px;"><i class="fa fa-chevron-right"></i></div>
					</div>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">会员名称</label>
					<input type="text" class="textbox webkit-box-flex" value="<?php echo $this->_var['user_info']['user_name']; ?>" readonly="readonly"/>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">邮箱</label>
					<?php if ($this->_var['user_info']['email']): ?>
					<input type="text" value="<?php echo $this->_var['user_info']['email']; ?>" class="textbox webkit-box-flex" readonly="readonly" />
					<a href="<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-email-box".""); 
?>">修改</a>
					<?php else: ?>
					<div class="textbox webkit-box-flex">
						邮箱未绑定，点击&nbsp;<a href="<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-email-box".""); 
?>" class="f_red" style="text-decoration:underline">去绑定</a>
					</div>
					<?php endif; ?>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">真实姓名</label>		
					<?php if ($this->_var['user_info']['identify_name']): ?>
					<input type="text" value="<?php echo $this->_var['user_info']['identify_name']; ?>" class="textbox webkit-box-flex" readonly="readonly" />
					<?php else: ?>
					<div class="textbox webkit-box-flex">
					未实名认证，点击&nbsp;<a href="<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-id-box".""); 
?>" class="f_red" style="text-decoration:underline">去认证</a>
					</div>
					<?php endif; ?>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">身份证号</label>		
					<?php if ($this->_var['user_info']['identify_number']): ?>
					<input type="text" value="<?php echo $this->_var['user_info']['identify_number']; ?>" class="textbox webkit-box-flex" readonly="readonly" />
					<?php else: ?>
					<div class="textbox webkit-box-flex">
					未实名认证，点击&nbsp;<a href="<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-id-box".""); 
?>" class="f_red" style="text-decoration:underline">去认证</a>
					</div>
					<?php endif; ?>
				</li>
				<li class="webkit-box">
					<label class="input_lable">手机号</label>
					<?php if ($this->_var['user_info']['mobile']): ?>
					<input type="text" value="<?php echo $this->_var['user_info']['mobile']; ?>" class="textbox" <?php if ($this->_var['user_info']['mobile']): ?>readonly="readonly"<?php endif; ?> />
					<?php else: ?>
					<div class="ml10 text webkit-box-flex">
						未绑定手机，点击&nbsp;<a href="<?php
echo parse_url_tag_wap("u:settings#security|"."method=setting-mobile-box".""); 
?>" class="f_red" style="text-decoration:underline">去绑定</a>
					</div>
					<?php endif; ?>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">性别</label>
					<div class="cate_name_list webkit-box-flex">
						<label>
							<input type="radio" name="sex" value="1" <?php if ($this->_var['user_info']['sex'] == 1): ?>checked="checked"<?php endif; ?> class="mt mr5" />男
						</label>
						<label>
							<input type="radio" name="sex" value="0" <?php if ($this->_var['user_info']['sex'] == 0): ?>checked="checked"<?php endif; ?> class="mt mr5" />女
						</label>
						<label>
							<input type="radio" name="sex" value="-1" <?php if ($this->_var['user_info']['sex'] == - 1): ?>checked="checked"<?php endif; ?> class="mt mr5" />未知
						</label>
					</div>
					<div class="blank"></div>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">省市</label>
					<div class="list_con webkit-box-flex">
					  	<div class="select_mod"> 
						  	<select name="province" id="province" class="f_select">               
			                    <option value="" rel="0">请选择省份</option>          
			                    <?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
			                    <option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
			                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		                  	</select>
					  	</div>
					  	<div class="select_mod"> 
						  	<select name="city" id="city" class="f_select">             
			                   	<option value="" rel="0">请选择城市</option>
			                    <?php $_from = $this->_var['region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
			                    <option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
			                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		                  	</select>
					  	</div>
					</div>
					<div class="blank"></div>
				</li>
				<li class="textarea webkit-box">
					<label class="input_lable">自我介绍</label>
					<textarea placeholder="这里可以输入大约300字的自我介绍，让大家多了解你" id="intro" name="intro" class="textbox webkit-box-flex ml10"><?php echo $this->_var['user_info']['intro']; ?></textarea>
				</li>
				<li class="webkit-box">
					<label class="input_lable">微博</label>
					<input id="weibo_url" type="text"  name="weibo_url[]" value="<?php echo $this->_var['weibo_list']['0']['weibo_url']; ?>" class="textbox webkit-box-flex" placeholder="输入微博地址"/>
				</li>
				
				
			</ul>
		</div>
		<div class="ul_block hide" id="J_ips_pay">
			<ul >
				<?php if ($this->_var['user_info']['is_investor'] == 2): ?>
					<li class="webkit-box">
						<label class="input_lable mr10">机构名称</label>
						<input type="text" value="<?php echo $this->_var['user_info']['identify_business_name']; ?>" class="textbox webkit-box-flex" name="identify_business_name" readonly="readonly" />
					</li>
					<li class="webkit-box">
						<label class="input_lable mr10">机构英文名称</label>
						<input type="text" value="<?php echo $this->_var['user_info']['company_english_name']; ?>" class="textbox webkit-box-flex" name="company_english_name" />
					</li>
					<li class="webkit-box">
						<label class="input_lable mr10">机构网址</label>
						<input type="text" value="<?php echo $this->_var['user_info']['company_url']; ?>" class="textbox webkit-box-flex" name="company_url" placeholder="如：http://www.fanwe.com"/>
					</li>
					<li class="webkit-box">
						<label class="input_lable mr10">机构成立时间</label>
						<input class="textbox webkit-box-flex"  rel="input-text" value="<?php echo $this->_var['company_create_time']; ?>" name="company_create_time" id="company_create_time" placeholder="请选择时间">
					</li>	
				<?php else: ?>
				<li class="webkit-box">
					<label class="input_lable mr10">所在公司</label>
					<input type="text" value="<?php echo $this->_var['user_info']['company']; ?>" class="textbox webkit-box-flex" name="company" />
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">所在职位</label>
					<input type="text" value="<?php echo $this->_var['user_info']['job']; ?>" class="textbox webkit-box-flex" id="job" name="job" />
				</li>
				<?php endif; ?>
				<li class="textarea webkit-box">
					<label class="input_lable mr10" style="line-height:1;text-align:left">
						<div class="pt5">
							投资领域<br /><span class="f_999 f12" style="font-weight:normal">(最多选择3个)</span>
						</div>
					</label>
					<div class="cate_name_list webkit-box-flex" id="cate_name_list">
						<?php $_from = $this->_var['deal_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cates_item');$this->_foreach['key'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['key']['total'] > 0):
    foreach ($_from AS $this->_var['cates_item']):
        $this->_foreach['key']['iteration']++;
?>
	                    <label class="cate_name_label">
	                        <input class="mt mr5" type="checkbox" name="cates[<?php echo $this->_var['cates_item']['id']; ?>]" id="pc" value="<?php echo $this->_var['cates_item']['name']; ?>" <?php if ($this->_var['user_info']['cate_name'] [ $this->_var['cates_item']['id'] ]): ?>checked="checked"<?php endif; ?> rel="cate_name" /><?php echo $this->_var['cates_item']['name']; ?>
	                    </label>
	                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	                </div>
				</li>	
				<li class="textarea webkit-box">
					<label class="input_lable mr10" style="line-height:1;text-align:left">
						<div class="pt5">
							关注城市<br /><span class="f_999 f12" style="font-weight:normal">(最多选择3个)</span>
						</div>
					</label>
					<div class="webkit-box-flex">
						<div class="gz_region_box">
							<?php if ($this->_var['gz_region']): ?>
							<?php $_from = $this->_var['gz_region']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key_region', 'gz_region_c');if (count($_from)):
    foreach ($_from AS $this->_var['key_region'] => $this->_var['gz_region_c']):
?>
							<label class="mr10">
								<span class="gz_region"><?php echo $this->_var['gz_region_c']; ?></span>
								<i class="icon iconfont del_region" onclick="del_region(this);"></i>
								<input type="hidden" name="gz_region[<?php echo $this->_var['key_region']; ?>]" value="<?php echo $this->_var['gz_region_c']; ?>">
							</label>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							<?php endif; ?>
						</div>
						<div class="blank10"></div>
						<div class="gz_region_select">
							<div class="select_mod">
								<select name="gz_province" id="gz_province" class="f_select">
									<option value="" rel="0">请选择省份</option>			
									<?php $_from = $this->_var['gz_city_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
									<option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</select>
							</div>
							<div class="select_mod">
								<select name="gz_city" id="gz_city" class="f_select">
									<option value="" rel="0">请选择城市</option>
									<?php $_from = $this->_var['gz_city_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
									<option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</select>
							</div>
							<div class="blank10"></div>
							<a class="ui_button ui-small-button theme_color btn_gz_city J_addCity" id="btn_gz_city">确定添加城市</a>
						</div>
                    </div>
					<div class="blank0"></div>
				</li>
				<li class="webkit-box">
					<?php if ($this->_var['user_info']['is_investor'] == 2): ?>
						<label class="input_lable mr10">机构简介</label>
					<?php else: ?>
						<label class="input_lable mr10">投资理念</label>
					<?php endif; ?>
					<textarea placeholder="这里可以输入大约300字的投资理念，让大家多了解你"  name="concept" class="textbox webkit-box-flex ml10"><?php echo $this->_var['user_info']['concept']; ?></textarea>
				</li>
				<li class="webkit-box">
					<?php if ($this->_var['user_info']['is_investor'] == 2): ?>
						<label class="input_lable mr10">投资案例总数</label>
						<input type="text" value="<?php echo $this->_var['user_info']['investment_num']; ?>" class="textbox  webkit-box-flex"  name="investment_num" placeholder="请输入投资案例总数"/>
					<?php else: ?>
						<label class="input_lable mr10">一年计划投资项目</label>
						<input type="text" value="<?php echo $this->_var['user_info']['investment_num']; ?>" class="textbox webkit-box-flex"  name="investment_num" placeholder="请输入项目数量"/>
					<?php endif; ?>
				</li>
				<li class="webkit-box">
					<label class="input_lable mr10">单个项目投资范围</label>
					<input type="text" value="<?php if ($this->_var['user_info']['investment_begin'] > 0): ?><?php echo $this->_var['user_info']['investment_begin']; ?><?php endif; ?>" class="textbox webkit-box-flex"  name="investment_begin" onKeyUp="amount(this);" placeholder="请输入最小金额"/>
					<span>&nbsp;&nbsp;至&nbsp;&nbsp;</span>
					<input type="text" value="<?php if ($this->_var['user_info']['investment_end'] > 0): ?><?php echo $this->_var['user_info']['investment_end']; ?><?php endif; ?>" class="textbox webkit-box-flex"  name="investment_end" placeholder="请输入最大金额"/>万
				</li>
				
			</ul>
		</div>
		<div class="submit_row mod_main">
			<input class="ui-button theme_color" type="button" value="确认修改"/>
			<input type="hidden" value="wap" name="from" />	
			<input type="hidden" value="1" name="ajax" />	
		</div>
	</form>
</section>
<div class="blank15"></div>
<!-- settings_modify.js -->
<?php echo $this->fetch('inc/footer.html'); ?>