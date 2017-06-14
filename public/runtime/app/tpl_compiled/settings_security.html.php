<?php echo $this->fetch('inc/header.html'); ?>
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/switch_city.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/switch_city.js";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/setting_security.css";
$this->_var['dcpagecss'][] = $this->_var['TMPL_REAL']."/css/setting_security.css";
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
<script type="text/javascript">
    var ROOT = '<?php echo $this->_var['APP_ROOT']; ?>/<?php echo $this->_var['URL_NAME']; ?>';
    var VAR_MODULE = "m";
    var VAR_ACTION = "a";
    var WEB_SESSION_ID = '<?php echo es_session::id(); ?>';
    var EMOT_URL = '<?php echo $this->_var['APP_ROOT']; ?>/public/emoticons/';
    var MAX_FILE_SIZE =  '<?php echo $this->_var['max_size_byte']; ?>b';
    var UPLOAD_URL ='<?php echo $this->_var['APP_ROOT']; ?>/<?php echo $this->_var['URL_NAME']; ?>?m=File&a=do_upload&upload_type=0&dir=image' ;
	var UPLOAD_SWF='<?php echo $this->_var['TMPL']; ?>/js/plupload/Moxie.swf';
	var UPLOAD_XAP='<?php echo $this->_var['TMPL']; ?>/js/plupload//Moxie.xap';
	var ALLOW_IMAGE_EXT= "gif,jpg,jpeg,png,bmp";
	var MAX_IMAGE_SIZE= '<?php echo $this->_var['max_size_byte']; ?>b';
	function get_file_fun(str){
  		$(str).ui_upload({multi:false,
		FileUploaded:function(ajaxobj){
 				if(ajaxobj.error==1)
				{
					$.showErr(ajaxobj.info);
				}else{
					$(str).attr('src',ajaxobj.url);
					if(str=='#business_tax'||str=='#business_code'||str=='#business_licence'){
						str=str.replace("#","");
 						$("#identify_"+str).val(ajaxobj.public_url);
					}else{
						$(str+"_image").val(ajaxobj.public_url);
					}
					
 				}
			},Error:function(error){
			if(error.code==-600){
				$.showErr("您上传的文件太大，最大允许上传<?php echo $this->_var['max_size']; ?>");
			}else{
				$.showErr(error.message);
			}
 		}});
	}
</script>
<style>
	.control-group .control-label{width:160px;}
</style>
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
	<?php echo $this->fetch('inc/account_left.html'); ?> 
	<div class="homeright pageright f_r">
		<div class="list_title clearfix">
			<div class="cur">
				<span>安全信息</span>
			</div>
		</div>
		<div class="list_conment setting_security">
			<ul class="security-ul">
				<li>
					<div class="it cf clearfix">
						<div class="icon nicheng"></div>
						<h3>昵称</h3>
						<?php if ($this->_var['user_info']['user_name']): ?>
						<p>已设置</p>
						<div class="update"><?php echo $this->_var['user_info']['user_name']; ?></div>
						<?php else: ?>
						<p class="f_red">未设置</p>
						<div class="update">
							<a href="javascript:void(0);" class="J_setting" id="J_setting_user_name"><?php if ($this->_var['user_info']['user_name']): ?>修改<?php else: ?>设置<?php endif; ?></a>
						</div>
						<?php endif; ?>
 					</div>
					<div class="setting_box" id="setting-username-box">
						<?php if (! $this->_var['user_info']['user_name']): ?>
						<form class="ajax_form_user_name" action="<?php
echo parse_url_tag("u:settings#save_username|"."".""); 
?>" id="save_name" > 
 							<div class="form_row control-group" >
								<label class="form_lable">昵称:</label>
								<input type="text" value="" class="small_textbox" name="user_name" />
							</div>
 							<div class="blank20"></div>
							<div class="submit_btn_row control-group">
								<label class="form_lable"></label>
								<input type="button" value="保存昵称" name="pass" class="ui-button theme_bgcolor" id="user_name"  />
								<input type="hidden" value="1" name="ajax" />
 								<div class="blank15"></div>
							</div>
						</form>
						<?php endif; ?>
					</div>
				</li>
				<li>
					<div class="it cf clearfix">
						<div class="icon pwd"></div>
						<h3>登录密码</h3>
						<?php if ($this->_var['user_info']['user_pwd']): ?>
						<p>已设置</p>
						<?php else: ?>
						<p class="f_red">未设置</p>
						<?php endif; ?>
						<div class="update">
							<a href="javascript:void(0);" class="J_setting" id="J_setting_pwd"><?php if ($this->_var['user_info']['user_pwd']): ?>修改<?php else: ?>设置<?php endif; ?></a>
						</div>
					</div>
					<div class="setting_box" id="setting-pwd-box">
						<form class="ajax_form_password" action="<?php
echo parse_url_tag("u:settings#save_pass|"."".""); 
?>" id="save_pass" > 
							<?php if ($this->_var['user_info']['user_pwd']): ?>
							<div class="control-group small-control-group">
								<label class="control-label">旧密码:</label>
								<div class="control-text">
									<input type="password"  autocomplete="off" value="" class="small_textbox" name="user_old_pwd" />
								</div>
							</div>
							<input type="hidden" name="change_pwd" value="1">
							<?php else: ?>
							<input type="hidden" name="change_pwd" value="0">
							<?php endif; ?>
	 						<div class="blank0"></div> 				
							<div class="control-group small-control-group">
								<label class="control-label">新密码:</label>
								<div class="control-text">
									<input type="password"  autocomplete="off" value="" class="small_textbox" name="user_pwd" />
								</div>
								<div class="blank0"></div>
							</div>
							<div class="control-group small-control-group">
								<label class="control-label">确认密码:</label>
								<div class="control-text">
									<input type="password"  autocomplete="off" value="" class="small_textbox" name="confirm_user_pwd" />
								</div>
							</div>
							<div class="blank10"></div>
							<div class="submit_btn_row control-group">
								<label class="control-label"></label>
								<input type="button" value="保存密码" name="pass" class="ui-button theme_bgcolor" id="pass"  />
								<input type="hidden" value="1" name="ajax" />
								<input type="hidden" name="setting_pwd" value="1">
							</div>
						</form>
					</div>
				</li>
				<li>
					<div class="it cf clearfix">
						<div class="icon email"></div>
						<h3>绑定邮箱</h3>
						<?php if ($this->_var['user_info']['email']): ?>
							<p>已绑定</p>
						<?php else: ?>
							<p class="f_red">未绑定</p>
						<?php endif; ?>
						<div class="update">
 							<a href="javascript:void(0);" class="J_setting" id="J_setting_email"><?php if ($this->_var['user_info']['email']): ?>修改<?php else: ?>绑定<?php endif; ?></a>
						</div>
					</div>
					<div class="setting_box" id="setting-email-box">
						<form class="ajax_form_email" action="<?php
echo parse_url_tag("u:settings#email_binding|"."".""); 
?>">
						<?php if ($this->_var['user_info']['email']): ?>
							<div class="control-group smaller-control-group">
								<label class="control-label">原邮箱:</label>
								<div class="control-text"><?php 
$k = array (
  'name' => 'hideEmail',
  'v' => $this->_var['user_info']['email'],
);
echo $k['name']($k['v']);
?></div>
								<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">邮箱验证码:</label>
								<div class="control-text">
									<input type="text" value="" class="small_textbox mr10" name="verify_coder"  style="width:165px;"/>
	 								<input type="button" value="获取验证码" class="ui_button send_sms_verify small_send_sms_verify bg_red" id="email_verify_code" />
	 							</div>
	 							<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">新邮箱:</label>
								<div class="control-text">
									<input type="text" value="" class="small_textbox" name="email" />
								</div>
	 						</div>
							<input type="hidden" value="2" name="step" />
						<?php else: ?>
							<div class="control-group small-control-group">
								<label class="control-label">新邮箱:</label>
								<div class="control-text">
									<input type="text"   value=""   class="small_textbox" name="email" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">邮箱验证码:</label>
								<div class="control-text">
									<input type="text" value="" class="small_textbox mr10" name="verify_coder"  style="width:165px;"/>
	 								<input type="button" value="获取验证码" class="ui_button send_sms_verify small_send_sms_verify bg_red" id="email_verify_code" />
	 							</div>
	 						</div>
							<input type="hidden" value="1" name="step" />
						<?php endif; ?>				
 	 						<div class="blank10"></div>
							<div class="submit_btn_row control-group">
								<label class="control-label"></label>
								<div class="ui-button theme_bgcolor" rel="green">绑定邮箱</div>
								<input type="hidden" value="1" name="ajax" />
							</div>
						</form>
					</div>
				</li>
				<li>
					<div class="it cf clearfix">
						<div class="icon mobile"></div>
						<h3>绑定手机</h3>
						<?php if ($this->_var['user_info']['mobile']): ?>
							<p>已绑定</p>
							<div class="update"><a href="javascript:void(0)" class="J_setting" id="J_setting_mobile">修改</a></div>
						<?php else: ?>
							<p class="f_red">未绑定</p>
							<div class="update"><a href="javascript:void(0)" class="J_setting f_red" id="J_setting_mobile">绑定</a></div>
						<?php endif; ?>
						
					</div>
					<div class="setting_box" id="setting-mobile-box">
						<form class="ajax_form_mobile" action="<?php
echo parse_url_tag("u:settings#mobile_binding|"."".""); 
?>" >
							<?php if ($this->_var['user_info']['mobile']): ?>
							<div class="control-group small-control-group">
								<label class="control-label">原手机号:</label>
								<div class="control-text"><?php 
$k = array (
  'name' => 'hideMobile',
  'v' => $this->_var['user_info']['mobile'],
);
echo $k['name']($k['v']);
?></div>
								<input type="hidden" id="settings-mobile-type" name="step" value="2">
								<div class="blank0"></div>
	 						</div>
						 	<div class="control-group small-control-group">
								<label class="control-label">验证码:</label>
								<div class="control-text">
									<input type="text" value="" class="small_textbox mr10" name="verify_coder"  style="width:165px;"/>
	 								<input type="button" value="获取验证码" class="ui_button send_sms_verify small_send_sms_verify bg_red" id="J_send_sms_verify" />
	 							</div>
	 							<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">新机号:</label>
								<div class="control-text">
									<input type="text" id="settings-new-mobile" value="" class="small_textbox" name="mobile" />
	 							</div>
	 						</div>
							<input type="hidden" name="bind_mobile" value="0">
							<?php else: ?>
							<div class="control-group small-control-group">
								<label class="control-label">手机号:</label>
								<div class="control-text">
									<input type="text" id="settings-mobile" value="" class="small_textbox" name="mobile" />
	 								<input type="hidden" id="settings-mobile-type" name="step" value="1">
	 							</div>
	 							<div class="blank0"></div>
							</div>
						 	<div class="control-group small-control-group">
								<label class="control-label">验证码:</label>
								<div class="control-text">
									<input type="text" value="" class="small_textbox mr10" name="verify_coder"  style="width:165px;"/>
	 								<input type="button" value="获取验证码" class="ui_button send_sms_verify small_send_sms_verify bg_red" id="J_send_sms_verify" />
	 							</div>
	 						</div>
							<input type="hidden" name="bind_mobile" value="1">
							<?php endif; ?>
	 						<div class="blank10"></div>
							<div class="submit_btn_row control-group">
								<label class="control-label"></label>
								<input type="button" value="提交" name="setting_mobile" class="ui-button theme_bgcolor" id="setting_mobile"  />
								<input type="hidden" value="1" name="ajax" />
							</div>
						</form>
					</div>
				</li>
				<li>
					<div class="it cf clearfix">
						<div class="icon paypwd"></div>
						<h3>支付密码<?php if ($this->_var['user_info']['mobile']): ?><?php if ($this->_var['user_info']['paypassword'] == ''): ?><br /><span class="f12 f_red">请设置支付密码，以免投资项目时无法完成支付</span><?php endif; ?><?php endif; ?></h3>
						<?php if ($this->_var['user_info']['mobile']): ?>
						<?php if ($this->_var['user_info']['paypassword']): ?>
						<p>已设置</p>
						<?php else: ?>
						<p class="f_red">未设置</p>
						<?php endif; ?>
 						<div class="update"><a href="javascript:void(0)" class="J_setting" id="J_setting_paypwd">设置</a></div>
						<?php else: ?>
						<p class="f_red">请先设置手机号</p>
						<?php endif; ?>
					</div>
					<div class="setting_box" id="setting-pass-box">
						<form class="ajax_form_paypassword" action="<?php
echo parse_url_tag("u:settings#paypassword_binding|"."".""); 
?>">
							<div class="control-group small-control-group">
								<label class="control-label">支付密码:</label>
								<div class="control-text">
									<input type="password"  autocomplete="off" id="" value="" class="small_textbox" name="paypassword" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">确认支付密码:</label>
								<div class="control-text">
									<input type="password"  autocomplete="off" id="" value="" class="small_textbox" name="confirm_pypassword" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<div class="control-group smaller-control-group">
								<label class="control-label">手机号:</label>
								<div class="control-text"><?php 
$k = array (
  'name' => 'hideMobile',
  'v' => $this->_var['user_info']['mobile'],
);
echo $k['name']($k['v']);
?></div>
								<div class="blank0"></div>
	 						</div>
						 	<div class="control-group small-control-group">
								<label class="control-label">验证码:</label>
								<div class="control-text">
									<input type="text" value="" class="small_textbox mr10" name="verify"  style="width:165px;"/>
	 								<input type="button" value="获取验证码" class="ui_button send_sms_verify small_send_sms_verify bg_red" id="J_send_sms_verify_pay" />
	 							</div>
	 						</div>
	 						<div class="blank10"></div>
							<div class="submit_btn_row control-group">
								<label class="control-label"></label>
								<div class="ui-button theme_bgcolor" rel="green">提交</div>
								<input type="hidden" value="1" name="ajax" />
								<input type="hidden" value="0" name="step" />
							</div>
						</form>
					</div>
 				</li>
				<li>
					<div class="it cf clearfix">
						<div class="icon verified"></div>
						<h3>实名认证</h3>
						<?php if ($this->_var['user_info']['mobile']): ?>
							<?php if ($this->_var['user_info']['is_investor'] > 0 || $this->_var['user_info']['identify_name'] != ''): ?>
								<?php if ($this->_var['user_info']['investor_status'] == 0): ?>
								<p>已提交,认证中</p>
								<div class="update"><span class="theme_fcolor">认证中</span></div>
								<?php elseif ($this->_var['user_info']['investor_status'] == 1): ?>
								<p>已设置</p>
								<?php if ($this->_var['user_info']['identify_name'] == ''): ?>
								<div class="update"><a href="javascript:void(0)" class="J_setting" id="J_setting_paypwd">修改</a></div>
								<?php else: ?>
								<div class="update"><a href="javascript:void(0)" class="J_setting theme_fcolor" id="J_setting_paypwd">认证成功</a></div>
								<?php endif; ?>
								<?php elseif ($this->_var['user_info']['investor_status'] == 2): ?>
								<p class="f_red">未通过</p>
								<div class="update"><a href="javascript:void(0)" class="J_setting" id="J_setting_paypwd">修改</a></div>
								<?php endif; ?>
							<?php else: ?>
							<p class="f_red">未认证</p>
							<div class="update"><a href="javascript:void(0)" class="J_setting" id="J_setting_paypwd">设置</a></div>
							<?php endif; ?>
  						   
						<?php else: ?>
						<p class="f_red">请先设置手机号</p>
						<?php endif; ?>
					</div>
					<div class="setting_box" id="setting-id-box">
						<form class="ajax_form_identify" action="<?php
echo parse_url_tag("u:settings#binding_investor|"."".""); 
?>">
						<?php if (( $this->_var['user_info']['investor_status'] != 1 ) && ( $this->_var['user_info']['is_investor'] == 0 || ( $this->_var['user_info']['is_investor'] > 0 && $this->_var['user_info']['investor_status'] == 2 ) || $this->_var['user_info']['identify_name'] == '' )): ?>
							<?php if ($this->_var['user_info']['is_investor'] > 0 && $this->_var['user_info']['investor_status'] == 2 && $this->_var['user_info']['investor_send_info']): ?>
							<div class="control-group smaller-control-group">
								<label class="control-label fail_form_lable f_red"><i></i>错误理由:</label>
								<div class="control-text" style="width:423px;height:auto;"><?php echo $this->_var['user_info']['investor_send_info']; ?></div>
								<div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<div class="control-group small-control-group">
								<label class="control-label">类型:</label>
								<div class="control-text">
									<span <?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>class="ui_check info_view ui_checked "<?php else: ?>class="ui_check info_view"<?php endif; ?> type="radio" rel="info_view">
										<input type="radio" name="is_investor" value="1" <?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>checked="checked"<?php endif; ?>  />
									</span>
									个人会员
									<span <?php if ($this->_var['user_info']['is_investor'] == 2): ?>class="ui_check info_view ml10 ui_checked "<?php else: ?>class="ui_check ml10 info_view"<?php endif; ?> type="radio" rel="info_view" >
										<input type="radio" name="is_investor" value="2" <?php if ($this->_var['user_info']['is_investor'] == 2): ?>checked="checked"<?php endif; ?> />
									</span>	
									企业会员
								</div>
								<div class="blank0"></div>
	 						</div>
							<?php if ($this->_var['payment_count']): ?>
								<div class="control-group small-control-group">
									<label class="control-label">是否绑卡:</label>
									<div class="control-text">
										<div class="mt10">
											<label class='ui_radiobox mr10' rel="is_binding">
												<input type="radio" name="is_binding" value="1" <?php if ($this->_var['user_info']['is_binding'] == 1): ?>checked="checked"<?php endif; ?>  />绑卡
											</label>
											<label class='ui_radiobox' rel="is_binding">
												<input type="radio" name="is_binding" value="0" <?php if ($this->_var['user_info']['is_binding'] == 0): ?>checked="checked"<?php endif; ?> />不绑卡
											</label>
										</div>
									</div>
									<div class="blank0"></div>
		 						</div>
							<?php endif; ?>
 							<div class="control-group small-control-group">
								<label class="control-label" id="identify_name_str"><?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>个人<?php else: ?>法人<?php endif; ?>身份证姓名:</label>
								<div class="control-text">
									<input type="text" id="" value="<?php echo $this->_var['user_info']['identify_name']; ?>" class="small_textbox" name="identify_name" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">身份证号码:</label>
								<div class="control-text">
									<input type="text" id="" value="<?php echo $this->_var['user_info']['identify_number']; ?>" class="small_textbox" name="identify_number" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<?php if (app_conf ( 'IDENTIFY_POSITIVE' )): ?>
 							<div class="control-group small-control-group">
								<label class="control-label">身份证正面:</label>
								<div class="pic_box f_l mr20">
									<i class="del_pic"></i>
									<div class="pic_show" id="audit_data_legal_num">
										<img id="identify_positive" src="<?php echo $this->_var['user_info']['identify_positive_image']; ?>" />
										<input type="hidden" name="identify_positive_image" id="identify_positive_image"  value="<?php echo $this->_var['user_info']['identify_positive_image']; ?>" rel="num" />
									</div>
								</div>
								<div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<?php if (app_conf ( 'IDENTIFY_NAGATIVE' )): ?>
 							<div class="control-group small-control-group">
								<label class="control-label">身份证反面:</label>
						      	<div class="pic_box f_l mr20">
						            <i class="del_pic"></i>
						            <div class="pic_show" id="audit_data_legal_credit_num">
						                <img id="identify_nagative" src="<?php echo $this->_var['user_info']['identify_nagative_image']; ?>" />
						                <input type="hidden" name="identify_nagative_image" id="identify_nagative_image" value="<?php echo $this->_var['user_info']['identify_nagative_image']; ?>" rel="num" />
						            </div>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<?php if (app_conf ( 'CARD' )): ?>
 							<div class="control-group small-control-group gr_div">
								<label class="control-label">名片:</label>
						      	<div class="pic_box f_l mr20">
						            <i class="del_pic"></i>
						            <div class="pic_show">
						                <img id="card" src="<?php echo $this->_var['user_info']['card']; ?>" />
						                <input type="hidden" name="card" id="card_image" value="<?php echo $this->_var['user_info']['card']; ?>" rel="num" />
						            </div>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							
							
							<?php if (app_conf ( 'CREDIT_REPORT' )): ?>
							<div class="control-group small-control-group gr_div">
								<label class="control-label">信用报告:</label>
						      	<div class="pic_box f_l mr20">
						            <i class="del_pic"></i>
						            <div class="pic_show">
						                <img id="credit_report" src="<?php echo $this->_var['user_info']['credit_report']; ?>" />
						                <input type="hidden" name="credit_report" id="credit_report_image" value="<?php echo $this->_var['user_info']['credit_report']; ?>" rel="num" />
						            </div>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<?php if (app_conf ( 'HOUSING_CERTIFICATE' )): ?>
							<div class="control-group small-control-group gr_div">
								<label class="control-label">房产认证:</label>
						      	<div class="pic_box f_l mr20">
						            <i class="del_pic"></i>
						            <div class="pic_show">
						                <img id="housing_certificate" src="<?php echo $this->_var['user_info']['housing_certificate']; ?>" />
						                <input type="hidden" name="housing_certificate" id="housing_certificate_image" value="<?php echo $this->_var['user_info']['housing_certificate']; ?>" rel="num" />
						            </div>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<?php if (app_conf ( 'IDENTIFY_POSITIVE' ) || app_conf ( 'IDENTIFY_NAGATIVE' )): ?>
							<div class="control-group small-control-group">
								<label class="control-label">&nbsp;</label>
								<div>
									<span class="prompt" style="margin-top:3px;width:500px;">支持jpg、jpeg、png、gif格式，大小不超过<?php echo $this->_var['max_size']; ?>。【推荐尺寸760px*530px】</span>
								</div>
								<div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<div class="control-group small-control-group gr_div identity_conditions_box">
								<label class="control-label">符合以下条件之一的自然人投资者:</label>
						      	<div class="f_l mr20">
						            <label class='ui_radiobox' rel="identity_conditions">
										<input type="radio" name="identity_conditions" <?php if ($this->_var['user_info']['identity_conditions'] == 0): ?>checked="checked"<?php endif; ?> value="0"  />我的金融资产超过100万元
									</label>
									<div class="blank10"></div>
									<label class='ui_radiobox' rel="identity_conditions">
										<input type="radio" name="identity_conditions" <?php if ($this->_var['user_info']['identity_conditions'] == 1): ?>checked="checked"<?php endif; ?> value="1" />我的年收入超过30万元
									</label>
									<div class="blank10"></div>
									<label class='ui_radiobox' rel="identity_conditions">
										<input type="radio" name="identity_conditions" <?php if ($this->_var['user_info']['identity_conditions'] == 2): ?>checked="checked"<?php endif; ?> value="2" />我是专业的风险投资人
									</label>
									<div class="blank10"></div>
									<label class='ui_radiobox' rel="identity_conditions">
										<input type="radio" name="identity_conditions" <?php if ($this->_var['user_info']['identity_conditions'] == 3): ?>checked="checked"<?php endif; ?> value="3" />我不符合上述任一条件
									</label>
						        </div>
						        <div class="blank0"></div>
	 						</div>
 							<div class="<?php if ($this->_var['user_info']['is_investor'] != 2): ?>hidden<?php endif; ?> pt20 mt20" id="qy_div">
								<div class="control-group small-control-group">
									<label class="control-label">企业名称:</label>
									<div class="control-text">
										<input type="text" id="" value="<?php echo $this->_var['user_info']['identify_business_name']; ?>" class="small_textbox" name="identify_business_name" />
									</div>
									<div class="blank0"></div>
	 							</div>
								<?php if (app_conf ( 'BUSINESS_LICENCE' )): ?>
 								<div class="control-group small-control-group">
									<label class="control-label">营业执照:</label>
									<div class="pic_box f_l mr20">
										<i class="del_pic"></i>
										<div class="pic_show" id="audit_data_legal_num">
											<img id="business_licence" src="<?php echo $this->_var['user_info']['identify_business_licence']; ?>" />
											<input type="hidden" name="identify_business_licence" id="identify_business_licence"  value="<?php echo $this->_var['user_info']['identify_business_licence']; ?>" rel="num" />
										</div>
									</div>
									<div class="blank0"></div>
		 						</div>
								<?php endif; ?>
								<?php if (app_conf ( 'BUSINESS_CODE' )): ?>
 								<div class="control-group small-control-group">
									<label class="control-label">组织机构代码证:</label>
							      	<div class="pic_box f_l mr20">
							            <i class="del_pic"></i>
							            <div class="pic_show" id="audit_data_legal_credit_num">
							                <img id="business_code" src="<?php echo $this->_var['user_info']['identify_business_code']; ?>" />
							                <input type="hidden" name="identify_business_code" id="identify_business_code" value="<?php echo $this->_var['user_info']['identify_business_code']; ?>" rel="num" />
							            </div>
							        </div>
							        <div class="blank0"></div>
		 						</div>
								<?php endif; ?>
								<?php if (app_conf ( 'BUSINESS_TAX' )): ?>
 								<div class="control-group small-control-group">
									<label class="control-label">税务登记证:</label>
							      	<div class="pic_box f_l mr20">
							            <i class="del_pic"></i>
							            <div class="pic_show" id="audit_data_legal_credit_num">
							                <img id="business_tax" src="<?php echo $this->_var['user_info']['identify_business_tax']; ?>" />
							                <input type="hidden" name="identify_business_tax" id="identify_business_tax" value="<?php echo $this->_var['user_info']['identify_business_tax']; ?>" rel="num" />
							            </div>
							        </div>
							        <div class="blank0"></div>
		 						</div>
								<?php endif; ?>
							</div>
							<?php if ($this->_var['payment_count']): ?>
							<div class="binding">
								<!--绑卡请求号-->
								<input type="hidden" id="" value="<?php echo $this->_var['requestid']; ?>" class="small_textbox" name="requestid" />
								<!--用户标识类型-->
								<input type="hidden" id="" value="5" class="small_textbox"  name="identitytype"  />						
								<!--用户标识-->
								<input type="hidden" id="" value="<?php echo $this->_var['identityid']; ?>" class="small_textbox"  name="identityid" />
																	
								<div class="control-group small-control-group">
									<label class="control-label">银行卡号:</label>
									<div class="control-text">
										<input type="text" id="" value="" class="small_textbox" name="cardno" />
									</div>
									<div class="blank0"></div>
		 						</div>								
								<div class="control-group small-control-group">
									<label class="control-label">银行预留手机号:</label>
									<div class="control-text">
										<input type="text" id="" value="" class="small_textbox" name="phone" />
									</div>
									<div class="blank0"></div>
		 						</div>								
								<!--用户请求ip-->
								<input type="hidden" id="" value="<?php echo $this->_var['userip']; ?>" class="small_textbox" name="userip" />	
								<input type="hidden" id="" value="<?php echo $this->_var['payment_count']; ?>" class="small_textbox" name="payment_count" />		
								<div class="control-group small-control-group">
								    <label class="control-label">
								    	 选择银行：
								    </label>
									<select name="bank_id" id="Jbank_bank_id" class="ui-select field_select small bank_id">
										<option value="">请选择</option>
										<?php $_from = $this->_var['bank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
										<option value="<?php echo $this->_var['item']['id']; ?>" day="<?php echo $this->_var['item']['day']; ?>"><?php echo $this->_var['item']['name']; ?></option>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</select>
								    <div class="blank0"></div>
								</div>
								<div class="control-group small-control-group">								
									<label for="settings-region" class="control-label"> 开户行所在地：</label>
									<select name="province" id="cityid-1" class="ui-select field_select small">
										<option value="" rel="0">请选择省份</option>
										<?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
										<option value="<?php echo $this->_var['region']['name']; ?>" class="ld-option" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
									</select>
									<select name="city" id="cityid-2" class="ui-select field_select small">
										<option value="" rel="0">请选择城市</option>
										<?php $_from = $this->_var['region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
										<option class="ld-option" value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</select>
									<div class="blank0"></div>
							 	</div>					
								<div class="control-group small-control-group">			
									<label for="settings-bankzone" class="control-label"> 开户行网点：</label>
									<div class="control-text">
										<input type="text" name="bankzone" id="Jbank_bankzone" class="small_textbox w250 mr10" value="">
										<a href="http://www.cardbaobao.com/wangdian/" target="_blank">网点查询</a>
									</div>
									<div class="blank0"></div>	
								</div>
							</div>
							<?php endif; ?>
							<div class="binding_y">
								<div class="blank0"></div>
								<div class="control-group smaller-control-group">
									<label class="control-label">手机号:</label>
									<div class="control-text"><?php 
$k = array (
  'name' => 'hideMobile',
  'v' => $this->_var['user_info']['mobile'],
);
echo $k['name']($k['v']);
?></div>
									<div class="blank0"></div>
		 						</div>
							 	<div class="control-group small-control-group">
									<label class="control-label">验证码:</label>
									<div class="control-text">
										<input type="text" value="" class="small_textbox mr10" name="verify"  style="width:165px;"/>
		 								<input type="button" value="获取验证码" class="ui_button send_sms_verify small_send_sms_verify bg_red" id="J_send_sms_verify_iden" />
		 							</div>
		 						</div>
							</div>
	 						<div class="blank10"></div>
							<div class="submit_btn_row control-group">
								<label class="control-label"></label>
								<div class="ui-button theme_bgcolor" rel="green" >提交</div>
								<input type="hidden" value="1" name="ajax" />
								<input type="hidden" value="0" name="step" />
							</div>
						<?php endif; ?>
						</form>
						<?php if ($this->_var['user_info']['investor_status'] == 1): ?>
							<div class="control-group smaller-control-group">
								<label class="control-label">类型:</label>
								<div class="control-text">
									<?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>个人会员<?php endif; ?>
									<?php if ($this->_var['user_info']['is_investor'] == 2): ?>企业会员<?php endif; ?>
								</div>
								<div class="blank0"></div>
	 						</div>
 							<div class="control-group small-control-group">
								<label class="control-label" id=""><?php if ($this->_var['user_info']['is_investor'] == 0 || $this->_var['user_info']['is_investor'] == 1): ?>个人<?php else: ?>法人<?php endif; ?>身份证姓名:</label>
								<div class="control-text">
									<input type="text" id="" value="<?php echo $this->_var['user_info']['identify_name']; ?>" class="small_textbox" name="identify_name" disabled="disabled" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<div class="control-group small-control-group">
								<label class="control-label">身份证号码:</label>
								<div class="control-text">
									<input type="text" id="" value="<?php echo $this->_var['user_info']['identify_number']; ?>" class="small_textbox" name="identify_number" disabled="disabled" />
								</div>
								<div class="blank0"></div>
	 						</div>
							<?php if (app_conf ( 'IDENTIFY_POSITIVE' )): ?>
							<div class="control-group small-control-group">
								<label class="control-label">身份证正面:</label>
								<div class="pic_box f_l mr20">
									<img src="<?php echo $this->_var['user_info']['identify_positive_image']; ?>" width="150" height="150" />
								</div>
	 						</div>
							<?php endif; ?>
							<?php if (app_conf ( 'IDENTIFY_NAGATIVE' )): ?>
	 						<div class="blank0"></div>
							<div class="control-group small-control-group">
								<label class="control-label">身份证反面:</label>
						      	<div class="pic_box f_l mr20">
						            <img src="<?php echo $this->_var['user_info']['identify_nagative_image']; ?>" width="150" height="150" />
						        </div>
	 						</div>
							<?php endif; ?>
							<?php if ($this->_var['user_info']['is_investor'] == 1): ?>
							<?php if (app_conf ( 'CARD' )): ?>
							<div class="control-group small-control-group">
								<label class="control-label">名片:</label>
						      	<div class="pic_box f_l mr20">
						             <img id="card" src="<?php echo $this->_var['user_info']['card']; ?>" width="150" height="150"/>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							
							<?php if (app_conf ( 'CREDIT_REPORT' )): ?>
							<div class="control-group small-control-group">
								<label class="control-label">信用报告:</label>
						      	<div class="pic_box f_l mr20">
						             <img id="credit_report" src="<?php echo $this->_var['user_info']['credit_report']; ?>" width="150" height="150"/>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<?php if (app_conf ( 'HOUSING_CERTIFICATE' )): ?>
							<div class="control-group small-control-group">
								<label class="control-label">房产认证:</label>
						      	<div class="pic_box f_l mr20">
						             <img id="housing_certificate" src="<?php echo $this->_var['user_info']['housing_certificate']; ?>" width="150" height="150"/>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<div class="control-group small-control-group">
								<label class="control-label">符合的自然人投资者条件:</label>
						      	<div class="control-text">
									<?php if ($this->_var['user_info']['identity_conditions'] == 0): ?>
										<span>我的金融资产超过100万元</span>
									<?php elseif ($this->_var['user_info']['identity_conditions'] == 1): ?>
										<span>我的年收入超过30万元</span>
									<?php elseif ($this->_var['user_info']['identity_conditions'] == 2): ?>
										<span>我是专业的风险投资人</span>
									<?php else: ?>
										<span>我不符合任何条件</span>
									<?php endif; ?>
						        </div>
						        <div class="blank0"></div>
	 						</div>
							<?php endif; ?>
							<div class="blank0"></div>
							<div class="<?php if ($this->_var['user_info']['is_investor'] != 2): ?>hide<?php endif; ?> mt20">
								<div class="control-group small-control-group">
									<label class="control-label">企业名称:</label>
									<input type="text" id="" value="<?php echo $this->_var['user_info']['identify_business_name']; ?>" class="small_textbox" name="identify_business_name" disabled="disabled" />
	 							</div>
								<?php if (app_conf ( 'BUSINESS_LICENCE' )): ?>
	 							<div class="blank0"></div>
								<div class="control-group small-control-group">
									<label class="control-label">营业执照:</label>
									<div class="pic_box f_l mr20">
										<img src="<?php echo $this->_var['user_info']['identify_business_licence']; ?>" width="150" height="150" />
									</div>
		 						</div>
								<?php endif; ?>
								<?php if (app_conf ( 'BUSINESS_CODE' )): ?>
		 						<div class="blank0"></div>
								<div class="control-group small-control-group">
									<label class="control-label">组织机构代码证:</label>
							      	<div class="pic_box f_l mr20">
							        	<img src="<?php echo $this->_var['user_info']['identify_business_code']; ?>" width="150" height="150" />
							        </div>
		 						</div>
								<?php endif; ?>
								<?php if (app_conf ( 'BUSINESS_TAX' )): ?>
		 						<div class="blank0"></div>
								<div class="control-group small-control-group">
									<label class="control-label">税务登记证:</label>
							      	<div class="pic_box f_l mr20">
							            <img src="<?php echo $this->_var['user_info']['identify_business_tax']; ?>" width="150" height="150" />
							        </div>
		 						</div>
								<?php endif; ?>
		 					</div>
						<?php endif; ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="blank"></div>
</div>
<!--中间结束-->
<div class="blank"></div>
<div class="ajax_loading_box">
	<img src="<?php echo $this->_var['TMPL']; ?>/images/loading.gif" class="ajax_loading_icon" />
</div>
<script>
	var code_timeer = null;
	var code_lefttime = 0 ;
	$(document).ready(function(){
		<?php if ($this->_var['method']): ?>
			$("#<?php echo $this->_var['method']; ?>").show();
		<?php endif; ?>
		// 上传图片
		get_file_fun("#identify_positive");
		get_file_fun("#identify_nagative");
		get_file_fun("#business_licence");
		get_file_fun("#business_code");
		get_file_fun("#business_tax");
		get_file_fun("#card");		
		get_file_fun("#credit_report");	
		get_file_fun("#housing_certificate");	
		// 绑定手机发送验证码
		$("#J_send_sms_verify").bind("click",function(){
			send_mobile_verify_sms_custom($.trim($("#settings-mobile-type").val()),$.trim($("#settings-mobile").val()),"#J_send_sms_verify");
		});

		// 绑定邮箱发送验证码
		$("#email_verify_code").bind("click",function(){
			step=$(".ajax_form_email").find("input[name='step']").val();
			if(step==1){
				email=$(".ajax_form_email").find("input[name='email']").val();
				send_email_verify(step,email,"#email_verify_code");
			}
			else{
				if(step==2){
					send_email_verify(step,'',"#email_verify_code");
				}
			}
		});

		// 支付密码发送验证码
		$("#J_send_sms_verify_pay").bind("click",function(){
				send_mobile_verify_sms_custom(2,'',"#J_send_sms_verify_pay");
		});

		// 安全信息发送验证码
		$("#J_send_sms_verify_iden").bind("click",function(){
				send_mobile_verify_sms_custom(2,'',"#J_send_sms_verify_iden");
		});
		
		bind_ajax_form_custom(".ajax_form_user_name");
		bind_ajax_form_custom(".ajax_form_paypassword");
		bind_ajax_form_custom(".ajax_form_mobile");
		bind_ajax_form_custom(".ajax_form_email");
		bind_ajax_form_custom(".ajax_form_password");
		if(<?php echo $this->_var['payment_count']; ?>){
			var is_binding =$(".ajax_form_identify").find("input[name='is_binding']:checked").val();
			if(is_binding==1){
				$(".binding").show();
				$(".binding_y").hide();
			}
			else{
				$(".binding").hide();
				$(".binding_y").show()
			}
			$(".ajax_form_identify").find("input[name='is_binding']").on('click',function(){
				if($(this).val()==1){
					$(".binding").show();
					$(".binding_y").hide();
					is_binding =1;
					//bind_ajax_form_identify(".ajax_form_identify");
					return false;
				}
				else{
					$(".binding").hide();
					$(".binding_y").show();
					is_binding =0;                                                                                                                                                                                                                      
					//bind_ajax_form_custom(".ajax_form_identify");
					return false;
				}
				return false;
			});
			$(".ajax_form_identify").find(".ui-button").live("click",function(){
				if(is_binding){
					bind_ajax_form_identify(".ajax_form_identify");
				}
				else{
					bind_ajax_form_no_identify(".ajax_form_identify");
				}
			});
		}else{
			bind_ajax_form_custom(".ajax_form_identify");
		}
		
		if($("input[name='is_investor']:checked").val()==1){
			$("#identify_name_str").html("个人身份证姓名:");
			$("#qy_div").hide();
			$(".gr_div").show();
		}else{
			$("#identify_name_str").html("法人身份证姓名:");
			$("#qy_div").show();
			$(".gr_div").hide();
		}
		$(".ajax_form_identify").find("input[name='is_investor']").bind('click',function(){
				if($(this).val()==2){
				$("#identify_name_str").html("法人身份证姓名:");
				$("#qy_div").show();
				$(".gr_div").hide();
			}else{
				$("#identify_name_str").html("个人身份证姓名:");
				$("#qy_div").hide();
				$(".gr_div").show();
			}
		});
	});
</script>
<script type="text/javascript">
	$(".J_setting").bind('click',function(){
		var setting_box = $(this).parent().parent().parent().find(".setting_box");
		if(setting_box.is(":hidden")){
			setting_box.slideDown(300);
			if($(this).text()=='修改'){
				$(this).text("取消修改");
			}
			if($(this).text()=='绑定'){
				$(this).text("取消绑定");
			}
			if($(this).text()=='设置'){
				$(this).text("取消设置");
			}
  		}
		else{
			setting_box.slideUp(300);
 			if($(this).text()=='取消绑定'){
				$(this).text("绑定");
			}
			if($(this).text()=='取消修改'){
				$(this).text("修改");
			}
			if($(this).text()=='取消设置'){
				$(this).text("设置");
			}
		}
	});
</script>
<script type="text/javascript">
	$(function(){
		$("#Jbank_bank_id").bind("change",function(){
			if($(this).val()=='other'){
				$("dl.otherbank").show();
			}else{
				$("dl.otherbank").hide();
			}
		});
		
	});
	function bind_ajax_form_identify(obj_form)
	{
		$(".ajax_loading_box").show();
		var ajaxurl = "<?php
echo parse_url_tag("u:settings#bind_investor|"."".""); 
?>";
		var query = $(obj_form).serialize();
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success: function(ajaxobj){
				$(".ajax_loading_box").hide();
				if(ajaxobj.status==1){
					$.weeboxs.open(ajaxobj.html, {boxid:'bindbankcard_info',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'绑卡短信验证',width:480,type:'wee'});
				}
			    if(ajaxobj.status==2){
					$.showErr(ajaxobj.info);
				}
				if(ajaxobj.status==0){
					$.showErr(ajaxobj.info);
				}
			},
			error:function(ajaxobj)
			{
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
		return false;
	}
	function bind_ajax_form_no_identify(obj_form)
	{
		var ajaxurl = $(obj_form).attr("action");
		var query = $(obj_form).serialize();
//		return false;
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success: function(ajaxobj){
				if(ajaxobj.status==1)
				{
					if(ajaxobj.info!="")
					{
						$.showSuccess(ajaxobj.info,function(){
							if(ajaxobj.jump!="")
							{
								location.href = ajaxobj.jump;
							}
						});	
					}
					else
					{
						if(ajaxobj.jump!="")
						{
							location.href = ajaxobj.jump;
						}
					}
				}
				else
				{
					if(ajaxobj.info!="")
					{
						$.showErr(ajaxobj.info,function(){
							if(ajaxobj.jump!="")
							{
								location.href = ajaxobj.jump;
							}
						});	
					}
					else
					{
						if(ajaxobj.jump!="")
						{
							location.href = ajaxobj.jump;
						}
					}							
				}
			},
			error:function(ajaxobj)
			{
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
		return false;
	}

</script>
<?php echo $this->fetch('inc/footer.html'); ?> 