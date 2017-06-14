<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript" src="__TMPL__Common/js/check_dog.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/IA300ClientJavascript.js"></script>
<script type="text/javascript">
	var ACTION_ID ='<?php echo $action_id ?>';
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
	var LOGINOUT_URL = '<?php echo u("Public/do_loginout");?>';
	var WEB_SESSION_ID = '<?php echo es_session::id(); ?>';
	var EMOT_URL = '<?php echo APP_ROOT; ?>/public/emoticons/';
	var MAX_FILE_SIZE = "<?php echo (app_conf("MAX_IMAGE_SIZE")/1000000)."MB"; ?>";
	var FILE_UPLOAD_URL ='<?php echo u("File/do_upload");?>' ;
	CHECK_DOG_HASH = '<?php $adm_session = es_session::get(md5(conf("AUTH_KEY"))); echo $adm_session["adm_dog_key"]; ?>';
	function check_dog_sender_fun()
	{
		window.clearInterval(check_dog_sender);
		check_dog2();
	}
	var check_dog_sender = window.setInterval("check_dog_sender_fun()",5000);
	
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/lang/zh_CN.js'></script>
</head>
<body onLoad="javascript:DogPageLoad();">
<div id="info"></div>

<script type="text/javascript" src="__ROOT__/public/region.js"></script>	
<script type="text/javascript" src="__TMPL__Common/js/deal_edit.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<?php if($type == 2): ?><!--众筹买卖-->
	<style type="text/css">
	    td span label{float:left; padding:3px; margin:2px; background:#E6E6E6; cursor:pointer; display:inline-block;}
	    td span label.active{background:#F60; color:#fff;}
	    #container{height:200px; width: 200px; float:left;}  
	    #container_front{width: 600px; height:500px; border: 1px solid #000; position: absolute; top: 10px; background-color: #fff; overflow: hidden;}
	    #container_m{ width: 550px; height: 450px; margin: 0 auto;}
	    #cancel_btn{display: block; width: 600px; height: 18px; line-height: 18px; text-align: right;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo app_conf("BAIDU_MAP_APPKEY"); ?>"></script> 
	<script type="text/javascript" src="__TMPL__Common/js/map.js"></script>
	<script type="text/javascript">
	var blue_point = "__ROOT__/system/blue_point.png";
	var red_point = "__ROOT__/system/red_point.png";
		$(document).ready(function(){
			 $("input[name='search_api']").bind("click",function(){  
			 	var api_address = $("input[name='api_address']").val();
				var city=$("select[name='city_id']").val();
				if ($.trim(api_address) == '') {
					alert("<?php echo L("INPUT_KEY_PLEASE");?>");
				}
				else 
				{
					search_api(api_address, city);
				}
	        });
			draw_map('0','0');
			$("#container_front").hide();
	        $("#cancel_btn").bind("click",function(){ $("#container_front").hide(); });
	        $("input[name='chang_api']").bind("click",function(){ 
	            editMap($("input[name='xpoint']").attr('value'),$("input[name='ypoint']").attr('value'));
	        });
			
			
		});
	
	</script><?php endif; ?><!--众筹买卖-->
<div class="main">
<div class="main_title"><?php echo L("ADD");?> <a href="<?php echo u("DealOnline/online_index");?>" class="back_list"><?php echo L("BACK_LIST");?></a></div>
<div class="blank5"></div>
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title"><span style="color:red">*</span>项目名称:</td>
		<td class="item_input"><input type="text" class="textbox require" name="name" /></td>
	</tr>
	<tr>
		<td class="item_title">项目等级:</td>
		<td class="item_input">
			<select name="user_level">
				<option value="0">请选择等级</option>
				<?php if(is_array($user_level)): foreach($user_level as $kk=>$level): ?><option value="<?php echo ($level["id"]); ?>" <?php if(($kk == 0)): ?>selected="selected"<?php endif; ?>><?php echo ($level["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			<span class='tip_span'>后台发起项目默认最低等级</span>
		</td>
	</tr>
	<tr>
		<td class="item_title"><span style="color:red">*</span>发起人ID:</td>
		<td class="item_input"><input type="text" class="textbox require" name="user_id" style="width:30px;" /> <span class='tip_span'>要填写发起人ID<?php if($type == 2): ?>,房产众筹发启人规定为企业型的<?php endif; ?></span></td>
	</tr>
	<tr>
		<td class="item_title">项目图片:</td>
		<td class="item_input">
			
			<div style="clear:both;margin-bottom:40px;">
				<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='image' id='keimg_h_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_image' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image' title='删除'>
                </div>
            </div>
        </div>
        </span>
				<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='image1' id='keimg_h_image1' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image1'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_image1' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_image1' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image1' title='删除'>
                </div>
            </div>
        </div>
        </span>
				<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='image2' id='keimg_h_image2' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image2'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_image2' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_image2' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image2' title='删除'>
                </div>
            </div>
        </div>
        </span>
			</div>
			<div style="clear:both">
				<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='image3' id='keimg_h_image3' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image3'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_image3' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_image3' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image3' title='删除'>
                </div>
            </div>
        </div>
        </span>
				<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='image4' id='keimg_h_image4' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image4'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_image4' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_image4' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image4' title='删除'>
                </div>
            </div>
        </div>
        </span>
				<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='image5' id='keimg_h_image5' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image5'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_image5' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_image5' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image5' title='删除'>
                </div>
            </div>
        </div>
        </span>
			</div>
			<span class='tip_span'>推荐760*530图片，第一张是项目封面</span>
		</td>
	</tr>
	<tr style="display:none">
		<td class="item_title">广告图片:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='adv_image' id='keimg_h_adv_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='adv_image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_adv_image' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_adv_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='adv_image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐765*317图片</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">详情页海报图:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='deal_background_image' id='keimg_h_deal_background_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='deal_background_image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_deal_background_image' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_deal_background_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='deal_background_image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐宽1920像素图片</span>
		</td>
	</tr>
	<tr>
	<td class="item_title">详情页背景图:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='deal_backgroundColor_image' id='keimg_h_deal_backgroundColor_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='deal_backgroundColor_image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_deal_backgroundColor_image' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_deal_backgroundColor_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='deal_backgroundColor_image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐单原色图片</span>
		</td>
	</tr>
	<?php if($type == 2): ?><tr>
		<td class="item_title">房产众筹动态展示小图标:</td>
		<td class="item_input">			
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='' name='update_log_icon' id='keimg_h_update_log_icon' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='update_log_icon'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='./admin/Tpl/default/Common/images/no_pic.gif' target='_blank' id='keimg_a_update_log_icon' ><img src='./admin/Tpl/default/Common/images/no_pic.gif' id='keimg_m_update_log_icon' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='update_log_icon' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐30*30图片</span>
		</td>
	</tr><?php endif; ?>
	<tr>
		<td class="item_title">视频地址:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="vedio" />
			<span class='tip_span'>填入优酷、腾讯、土豆等flash地址。</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">参考上线天数:</td>
		<td class="item_input"><input type="text" class="textbox" name="deal_days" /></td>
	</tr>
	<tr>
		<td class="item_title"><span style="color:red">*</span>项目开始时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="begin_time" id="begin_time" value="" onfocus="this.blur(); return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />
			<input type="button" class="button" id="btn_begin_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#begin_time').val('');" />	
		</td>
	</tr>
	<tr>
		<td class="item_title"><span style="color:red">*</span>项目结束时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="end_time" id="end_time" value="" onfocus="this.blur(); return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />
			<input type="button" class="button" id="btn_end_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#end_time').val('');" />

		</td>
	</tr>
	
	<tr>
		<td class="item_title">上架:</td>
		<td class="item_input">
			<label><?php echo L("IS_EFFECT_1");?><input type="radio" name="is_effect" value="1" checked="checked" /></label>
			<label><?php echo L("IS_EFFECT_0");?><input type="radio" name="is_effect" value="0" /></label>
		</td>
	</tr>
	<tr>
		<td class="item_title">是否显示支持者:</td>
		<td class="item_input">
			<label><?php echo L("IS_SUPPORT_PRINT_1");?><input type="radio" name="is_support_print" value="1" /></label>
			<label><?php echo L("IS_SUPPORT_PRINT_0");?><input type="radio" name="is_support_print" value="0" checked="checked" /></label>
			<span class='tip_span'>前台页面是否显示支持者的人数</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">支付类型:</td>
		<td class="item_input">
			<select name="ips_bill_no">
 				<option value="0" <?php if($vo["ips_bill_no"] == ''): ?>selected="selected"<?php endif; ?> >网站支付</option>
				<option value="1" <?php if($vo["ips_bill_no"] != ''): ?>selected="selected"<?php endif; ?> >第三方托管</option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="item_title"><span style="color:red">*</span>目标金额:</td>
		<td class="item_input"><input type="text" class="textbox require" name="limit_price" /></td>
	</tr>
	<tr>
		<td class="item_title">佣金比例:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="pay_radio"  value="<?php echo ($vo["pay_radio"]); ?>"/>
			<span class='tip_span'>佣金比例为0的话，按系统的佣金比例0.1来算，不是0的话按这里的佣金比例来算</span>
		
		</td>
	</tr>
	<tr>
		<td class="item_title">项目简介:</td>
		<td class="item_input">
			<textarea name="brief" class="textarea"></textarea>
		</td>
	</tr>
	<tr>
		<td class="item_title">项目标签:</td>
		<td class="item_input"><input type="text" class="textbox" name="tags" style="width:500px;" /> <span class='tip_span'>用空格分隔</span></td>
	</tr>
	
	<tr>
		<td class="item_title"><span style="color:red">*</span>项目所属类别:</td>
		<td class="item_input">
			<select name="cate_id" class="require">
				<option value="0">请选择</option>
				<?php if(is_array($cate_list)): foreach($cate_list as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>"><?php echo ($cate_item["title_show"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="item_title"><span style="color:red">*</span>项目所属地区:</td>
		<td class="item_input" class="require">
			<select name="province">				
			<option value="" rel="0">请选择省份</option>
			<?php if(is_array($region_lv2)): foreach($region_lv2 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>"><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			
			<select name="city" class="require">				
			<option value="" rel="0">请选择城市</option>
			</select>
			<script type="text/javascript">
				load_city();
			</script>
		</td>
	</tr>
	<!--众筹买卖-->
	<?php if($type == 2): ?><tr>
		<td class="item_title"><span style="color:red">*</span>楼盘名称:</td>
		<td class="item_input"><input type="text" class="textbox require" name="houses_name" /></td>
	</tr>
	<tr>
		<td class="item_title"><span style="color:red">*</span>楼盘阶段:</td>
		<td class="item_input">
			<select name="houses_status" class="require">
				<option value="">请选择楼盘阶段</option>
				<?php if(is_array($houses_status_list)): foreach($houses_status_list as $key=>$houses_status): ?><option value="<?php echo ($houses_status); ?>"><?php echo ($houses_status); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="item_title">楼盘地址:</td>
		<td class="item_input"><input type="text" class="textbox require" name="houses_address" style="width:500px;" /></td>
	</tr>
	<tr>
            <td class="item_title">地图定位</td>
            <td class="item_input">            	
            	关键词：<input type="text" class="textbox" name="api_address" value="" /> 
				<input type="button" value="查找" class="button" name="search_api" id="search_api" >
				<div style="height:10px; clear:both;"></div>
                <div id="container"></div>
				<div style="height:10px; clear:both;"></div>
                <script type="text/javascript"></script> 
                <input type="button" value="手动修改" name="chang_api" id="chang_api">
                <div style="position:relative; top:-400px;">
                    <div  id="container_front">
                        <a href="#" id="cancel_btn">取消</a>
                        <div id="container_m"></div>
                    </div>
                </div>
				<input type="hidden" name="xpoint" />
				<input type="hidden" name="ypoint" />
            </td>
    </tr>
	<tr>
		<td class="item_title">是否有收益:</td>
		<td class="item_input" >
			<select name="is_earnings" id="earnings_button">				
			<option value="1" selected=selected >是</option>
			<option value="0">否</option>
			</select>
		</td>
	</tr>
	<tr class="earnings_class">
		<td class="item_title"><span style="color:red">*</span>收益百分比:</td>
		<td class="item_input">
			<input type="text" class="textbox earnings_child require" name="earnings" />%
			<span class="tip_span">利率精确到小数点后两位</span>
		</td>
	</tr>
	<tr  class="earnings_class">
		<td class="item_title"><span style="color:red">*</span>收益周期:</td>
		<td class="item_input">
			<select name="earnings_cycle">
				<option value="1">1个月</option>
				<option value="2">2个月</option>
				<option value="3">3个月</option>
				<option value="4">4个月</option>
				<option value="5">5个月</option>
				<option value="6">6个月</option>
				<option value="7">7个月</option>
				<option value="8">8个月</option>
				<option value="9">9个月</option>
				<option value="10">10个月</option>
				<option value="11">11个月</option>
				<option value="12">12个月</option>
			</select>
		</td>
	</tr>
	<tr class="earnings_class">
		<td class="item_title"><span style="color:red">*</span>收益期数:</td>
		<td class="item_input">
			<input type="text" class="textbox earnings_child require" name="earnings_send_count" />
			<span class="tip_span"></span>
		</td>
	</tr>
	<tr  class="earnings_class">
		<td class="item_title"><span style="color:red">*</span>收益发放含本金</td>
		<td class="item_input">
			<select name="earnings_send_capital">
				<option value="0">否</option>
				<option value="1" selected=selected>是</option>
			</select>
		</td>
	</tr><?php endif; ?>
	<!--end众筹买卖-->
	<tr>
		<td class="item_title">项目排序:</td>
		<td class="item_input"><input type="text" class="textbox" name="sort" value="<?php echo ($new_sort); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">项目详情:</td>
		<td class="item_input">
			 <div  style='margin-bottom:5px; '><textarea id='description' name='description' class='ketext' style='width:750px; height:350px;' ></textarea> </div>
		</td>
	</tr>
	<?php if($type == 2): ?><!--众筹买卖-->
		<tr>
		<td class="item_title">楼盘信息:</td>
		<td class="item_input">
			 <div  style='margin-bottom:5px; '><textarea id='houses_info' name='houses_info' class='ketext' style='width:750px; height:350px;' ></textarea> </div>
		</td>
	</tr>
	<tr>
		<td class="item_title">收益说明:</td>
		<td class="item_input">
			 <div  style='margin-bottom:5px; '><textarea id='houses_earnings_info' name='houses_earnings_info' class='ketext' style='width:750px; height:350px;' ></textarea> </div>
		</td>
	</tr><?php endif; ?>
    <tr>
		<td class="item_title">付款与退款说明:</td>
		<td class="item_input">
			 <div  style='margin-bottom:5px; '><textarea id='description_1' name='description_1' class='ketext' style='width:750px; height:350px;' ></textarea> </div>
		</td>
	</tr>
  	
	<tr>
		<td class="item_title">常见问题: [<a href="javascript:void(0);" onclick="add_faq();">增加</a>]</td>
		<td class="item_input" id="faq">
			
		</td>
	</tr>

	<tr>
		<td class="item_title">SEO标题:</td>
		<td class="item_input">
			<textarea name="seo_title" class="textarea"></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO关键词:</td>
		<td class="item_input">
			<textarea name="seo_keyword" class="textarea"></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO描述:</td>
		<td class="item_input">
			<textarea name="seo_description" class="textarea"></textarea>
		</td>
	</tr>
	
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>

<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="DealOnline" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="insert" />
			<input type="hidden" name="type" value="<?php echo ($type); ?>" />
			<!--隐藏元素-->
			<input type="submit" class="button" value="<?php echo L("ADD");?>" />
			<input type="reset" class="button" value="<?php echo L("RESET");?>" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 		 
</form>
</div>
</body>
</html>