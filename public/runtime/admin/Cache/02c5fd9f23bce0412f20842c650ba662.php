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


<script type="text/javascript" src="__TMPL__Common/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.weebox.js"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/weebox.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<div class="main">
<div class="main_title">申请解冻资金列表</div>
<div class="blank5"></div>
<?php function get_pay_type($pay_type){
		if($pay_type ==0)
		{
			$pay_type="第三方托管";
		}else{
			$pay_type="余额支付";
		}
		return $pay_type;
	}
	function get_freeze_status($status){
		if($status ==1)
		{
			$status="冻结";
		}elseif($status ==2){
			$status="解冻";
		}else{
			$status="申请解冻";
		}
		return $status;
	}
	function get_freeze($id,$deal){
		$freeze = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."money_freeze where id = '".$id."'");
		if($freeze['pay_type']==0){
			return "<a href=\"__ROOT__/index.php?ctl=collocation&act=SincerityGoldUnfreeze&user_id=".$freeze['platformUserNo']."&user_type=0&freezeRequestNo=".$freeze['requestNo']."&deal_id=".$freeze['deal_id']."\">解冻诚意金</a>";
		}
		if($freeze['pay_type']==1){
			return "<a href=\"javascript:pay_type('".$id."')\">解冻诚意金</a>";
		}
		
	} ?>
<script>
	function pay_type(id)
	{
		location.href = ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=edit_dsffreezer&id="+id;
	}
</script>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="9" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px    "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="100px    "><a href="javascript:sortBy('platformUserNo','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照发起人<?php echo ($sortType); ?> ">发起人<?php if(($order)  ==  "platformUserNo"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="100px    "><a href="javascript:sortBy('amount','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照冻结金额<?php echo ($sortType); ?> ">冻结金额<?php if(($order)  ==  "amount"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('deal_id','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照项目名称    <?php echo ($sortType); ?> ">项目名称    <?php if(($order)  ==  "deal_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="100px    "><a href="javascript:sortBy('pay_type','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照支付类型<?php echo ($sortType); ?> ">支付类型<?php if(($order)  ==  "pay_type"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="100px    "><a href="javascript:sortBy('status','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照诚意金状态<?php echo ($sortType); ?> ">诚意金状态<?php if(($order)  ==  "status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('create_time','<?php echo ($sort); ?>','UserUnfreeze','index')" title="按照冻结时间<?php echo ($sortType); ?> ">冻结时间<?php if(($order)  ==  "create_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="60px">操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$money_freeze): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($money_freeze["id"]); ?>"></td><td><?php echo ($money_freeze["id"]); ?></td><td><?php echo (get_deal_user($money_freeze["platformUserNo"])); ?></td><td><?php echo ($money_freeze["amount"]); ?></td><td><?php echo (get_deal_name($money_freeze["deal_id"])); ?></td><td><?php echo (get_pay_type($money_freeze["pay_type"])); ?></td><td><?php echo (get_freeze_status($money_freeze["status"])); ?></td><td><?php echo (to_date($money_freeze["create_time"])); ?></td><td class="op_action"> <?php echo (get_freeze($money_freeze["id"],$deal)); ?>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="9" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>