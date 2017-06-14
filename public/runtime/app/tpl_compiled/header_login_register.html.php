<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="renderer" content="webkit" />
<meta name="keywords" content="<?php if ($this->_var['page_seo_keyword'] != ''): ?><?php echo $this->_var['page_seo_keyword']; ?><?php else: ?><?php echo $this->_var['seo_keyword']; ?><?php endif; ?>" />
<meta name="description" content="<?php if ($this->_var['page_seo_description'] != ''): ?><?php echo $this->_var['page_seo_description']; ?><?php else: ?><?php echo $this->_var['seo_description']; ?><?php endif; ?>" />
<title><?php if ($this->_var['page_title'] != ''): ?><?php echo $this->_var['page_title']; ?> - <?php endif; ?><?php echo $this->_var['site_name']; ?> - <?php echo $this->_var['seo_title']; ?></title>
<?php
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/base.theme.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/base.frame.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/weebox.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/common_css/layout.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/common_css/style.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/head.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/foot.css";

$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/common_js/jquery-1.8.2.min.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.bgiframe.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.weebox.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jquery.pngfix.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/lazyload.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/fanweUI.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/fanweUI.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/zcUI.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/zcUI.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/script.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/script.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/common_js/script.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/common_js/script.js";

if(app_conf("APP_MSG_SENDER_OPEN")==1)
{
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
}
if(HAS_DEAL_NOTIFY>0)
{
$this->_var['notifypagejs'][] = $this->_var['TMPL_REAL']."/js/notify_sender.js";
$this->_var['cnotifypagejs'][] = $this->_var['TMPL_REAL']."/js/notify_sender.js";	
}
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/plupload/plupload.full.min.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/plupload/plupload.full.min.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['pagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript">
var APP_ROOT = '<?php echo $this->_var['APP_ROOT']; ?>';
var LOADER_IMG = '<?php echo $this->_var['TMPL']; ?>/images/lazy_loading.gif';
var ERROR_IMG = '<?php echo $this->_var['TMPL']; ?>/images/image_err.gif';
<?php if (app_conf ( "APP_MSG_SENDER_OPEN" ) == 1): ?>
var send_span = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SEND_SPAN',
);
echo $k['name']($k['v']);
?>000;
<?php endif; ?>
var __HASH_KEY__ = "<?php 
$k = array (
  'name' => 'get_hash_key',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>";

var DO_REGISTER_URL = "<?php
echo parse_url_tag("u:user#do_register|"."".""); 
?>";
var REGISTER_CHECK_URL = "<?php
echo parse_url_tag("u:user#register_check|"."".""); 
?>";
var CHECK_VERIFY_CODE_URL = "<?php
echo parse_url_tag("u:ajax#check_verify_code|"."".""); 
?>";
</script>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['pagejs'],
  'c' => $this->_var['cpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<?php if (HAS_DEAL_NOTIFY > 0): ?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['notifypagejs'],
  'c' => $this->_var['cnotifypagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<?php endif; ?>

<!--[if IE 6]>
	<script src="<?php echo $this->_var['TMPL']; ?>/js/fanwe_utils/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
	DD_belatedPNG.fix('.banner .btn_tit ul li.on , .banner .btn_tit ul li , .mx_1 , .mx_2 , .mx_3 , .mx_4 , .xzdq1 , .zcz , .timeline-left-gray , .deal_log_title .title , .timeline-comment-top , .timeline-start span , .pageleft a , .dz , .kj , .boxaddress , .xzdq , .con6 .sub , .fx i , .attention_focus_deal i , .head_down_icon , .banner .prev , .banner .next , .mxr_1 , .mxr_2 , .mxr_3 , .shenhe .shenhe_info li , .mod_title i , .box4 .mod_cont3 .leader_t , .box4 .mod_cont3 .leader_w , .box4 .mod_cont3 .leader_r , .box4 .mod_cont3 .leader_x , .box4 .mod_cont3 .leader_p , .step_box , .pageleft a i , .invester_all .col_a , .article_l li.on , .article_box .article_r_list h3'); 
	</script>
<![endif]-->
<style type="text/css">
	body{background:#f3f3f3;}
	.dlmain { background:url(<?php echo $this->_var['TMPL']; ?>/images/images/reglog_bg.gif) repeat-y; }
	.dlr1{margin-bottom:50px}
	.J_wrap{position:relative;z-index:3;}
	.my_shadow_bg{position:relative;z-index:2;}
</style>
</head>
<body>
<div class="head_1 z100" id="J_head">
	<div class="head_cont" style="background:#fff">
		<div class="wrap1000 constr clearfix">
			<div class="logo_1 f_l">
				<a class="link" href="<?php echo $this->_var['APP_ROOT']; ?>/">
					<?php
						$this->_var['logo_image'] = app_conf("SITE_LOGO");
					?>
					<img src="<?php echo $this->_var['logo_image']; ?>" />
				</a>
			</div>
			<!--<?php if ($this->_var['MODULE_NAME'] == 'user'): ?>-->
			<div class="f_yahei no-nav-text"><?php if ($this->_var['ACTION_NAME'] == 'login'): ?>登录<?php elseif ($this->_var['ACTION_NAME'] == 'register'): ?>注册<?php elseif ($this->_var['ACTION_NAME'] == 'getpassword'): ?>取回密码<?php endif; ?></div>
			<!--<?php endif; ?>-->
			<div class="blank0"></div>
		</div>
	</div>
	<p class="head_bg"></p>
</div>