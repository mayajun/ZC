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

<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>

<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<div class="main">
<div class="main_title">买房收益列表-等待审核</div>
<div class="blank5"></div>
<?php function get_bonus_status($status)
	{
		if($status==0)return "等待审核";
		if($status==1)return "通过";
		if($status==2)return "未通过	";
	}
	function get_edit_1($id,$deal){
 		if($deal['type']==0){
			return "<a href=\"javascript:edit_user_bonus('".$id."')\">审核</a>";
		}
		elseif($deal['type']==1){
			return "<a href=\"javascript:edit_user_bonus('".$id."')\">编辑</a>";
		}
		else{
			
		}
	}
	function del_user_bonus($id,$deal){
		return "<a href=\"javascript:del_user_bonus('".$id."')\">删除</a>";
	} ?>
<script>
	
function del_user_bonus(id)
{
	if(!id)
	{
		idBox = $(".key:checked");
		if(idBox.length == 0)
		{
			alert("请选择需要删除的项目");
			return;
		}
		idArray = new Array();
		$.each( idBox, function(i, n){
			idArray.push($(n).val());
		});
		id = idArray.join(",");
	}
	if(confirm("确定要删除选中的项目吗？"))
	$.ajax({ 
			url: ROOT+"?"+VAR_MODULE+"=DealSubmitBuyHouseEarnings&"+VAR_ACTION+"=del_user_bonus&id="+id+"&action_id="+ACTION_ID,
			data: "ajax=1",
			dataType: "json",
			success: function(obj){
				$("#info").html(obj.info);
				if(obj.status==1)
				location.href=location.href;
			}
	});
}
	//编辑跳转
function edit_user_bonus(id)
{
	location.href = ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=edit_user_bonus&id="+id+"&action_id="+ACTION_ID;
}
</script>	
	
						
<div class="blank5"></div>
		
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="13" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th><a href="javascript:sortBy('收益编号','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照收益编号   <?php echo ($sortType); ?> ">收益编号   <?php if(($order)  ==  "收益编号"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('项目名称','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照项目名称   <?php echo ($sortType); ?> ">项目名称   <?php if(($order)  ==  "项目名称"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('融资金额','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照融资金额   <?php echo ($sortType); ?> ">融资金额   <?php if(($order)  ==  "融资金额"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('收益年度','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照收益年度   <?php echo ($sortType); ?> ">收益年度   <?php if(($order)  ==  "收益年度"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('收益期数','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照收益期数（第几期）   <?php echo ($sortType); ?> ">收益期数（第几期）   <?php if(($order)  ==  "收益期数"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('收益金额','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照收益金额   <?php echo ($sortType); ?> ">收益金额   <?php if(($order)  ==  "收益金额"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('收益周期','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照收益周期（个月）   <?php echo ($sortType); ?> ">收益周期（个月）   <?php if(($order)  ==  "收益周期"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('平均年收益率','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照平均年收益率（%）   <?php echo ($sortType); ?> ">平均年收益率（%）   <?php if(($order)  ==  "平均年收益率"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('开始时间','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照开始时间   <?php echo ($sortType); ?> ">开始时间   <?php if(($order)  ==  "开始时间"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('结束时间','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照结束时间   <?php echo ($sortType); ?> ">结束时间   <?php if(($order)  ==  "结束时间"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('状态','<?php echo ($sort); ?>','DealSubmitBuyHouseEarnings','submit_buy_house_earnings')" title="按照状态 <?php echo ($sortType); ?> ">状态 <?php if(($order)  ==  "状态"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="60px">操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($deal["id"]); ?>"></td><td><?php echo ($deal["收益编号"]); ?></td><td><?php echo ($deal["项目名称"]); ?></td><td><?php echo (format_price($deal["融资金额"])); ?></td><td><?php echo ($deal["收益年度"]); ?></td><td><?php echo ($deal["收益期数"]); ?></td><td><?php echo (format_price($deal["收益金额"])); ?></td><td><?php echo ($deal["收益周期"]); ?></td><td><?php echo ($deal["平均年收益率"]); ?></td><td><?php echo (to_date($deal["开始时间"])); ?></td><td><?php echo (to_date($deal["结束时间"])); ?></td><td><?php echo (get_bonus_status($deal["状态"])); ?></td><td class="op_action"><div class="viewOpBox_demo"> <?php echo (get_edit_1($deal["收益编号"],$deal)); ?>&nbsp; <?php echo (del_user_bonus($deal["收益编号"])); ?>&nbsp;</div><a href="javascript:void(0);" class="opration"><span>操作</span><i></i></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="13" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
			
<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>

</div>

</body>
</html>