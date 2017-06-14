<?php exit;?>a:3:{s:8:"template";a:9:{i:0;s:59:"D:/wwwroot/zhongchou.com/wap/tpl/default/user_register.html";i:1;s:56:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/header.html";i:2;s:67:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/sui_mobile_header.html";i:3;s:66:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/sui_mobile_title.html";i:4;s:72:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/sui_mobile_user_status.html";i:5;s:63:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/header_search.html";i:6;s:52:"D:/wwwroot/zhongchou.com/wap/tpl/default/footer.html";i:7;s:54:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/left.html";i:8;s:63:"D:/wwwroot/zhongchou.com/wap/tpl/default/inc/sui_mobile_js.html";}s:7:"expires";i:1497269822;s:8:"maketime";i:1497266222;}<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>会员注册 - VK维客众筹 - 百岁帮</title>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0,minimum-scale=0.5">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">        <link rel="stylesheet" type="text/css" href="http://116.255.159.227:8080/public/runtime/statics/c46874c16af060e82ea8eecca84f3a3e.css?v=1.61" />
    <script type="text/javascript" src="http://116.255.159.227:8080/public/runtime/statics/3bd9c54f5a7d88c6a2d4c86f150da12d.js?v=1.61"></script>
    <script type='text/javascript' src='/public/region.js'></script>
    <script type="text/javascript">
        var APP_ROOT = 'http://116.255.159.227:8080/wap';
        var APP_ROOT_ORA = 'http://116.255.159.227:8080';
                var send_span = 2000;
        		var __HASH_KEY__ = "rzNryONVpSNXBFYMhDEUIEqUbHRvdeIMLPjgdQnGuWXfQaLFJx";
        var isapp = '';
        var is_sdk = '0';
    </script>
    <script type="text/javascript">
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
    </script>
</head>
<body>
    <!-- page 开始 -->
    <div class="page" id="user-register" >
        <!-- header 开始 -->
    	<header class="bar bar-nav header_nav">
		<a class="button button-link button-nav pull-left back" href="http://116.255.159.227:8080/wap/index.php?ctl=user&act=login" data-transition="slide-out">
	  <span class="icon icon-left"></span>
	  	返回
	</a>
			<h1 class="title pull-left">会员注册</h1>
		<a class="button  button-link button-nav  pull-right open-panel" data-panel='#panel-left-box'>
		<span class="icon icon-menu"></span>
	</a>
</header>		<script type="text/javascript">
   	 login_status = $("#login_status").attr('title');
	 
	function syn_user_info()
	{	
 				  $("#login_status_info").html('您好，您还没有登录哦');
		  $("#login_status_url").html('<a href="/wap/index.php?ctl=user&act=login"  class="close-panel ">登录/注册</a>');
			}	
</script>
        <!-- header 结束 -->
        <!-- content 开始 -->
        <div class="content  " id="content_box">
            <div class="selectbox1" id="selectbox1">
    <div class="selectbox" id="selectbox"></div>
    <div class="selectbj" id="selectbj">
        <div class="tav_nav webkit-box" id="top_search_hd">
             
            <a href="#" livalue="0" class="search_cate search_cate_l webkit-box-flex cur" checked="checked">回报众筹</a>
            <a href="#" livalue="1" class="search_cate search_cate_r webkit-box-flex">股权众筹</a>
                                            </div>
        <div class="searchbox">
            <form action="/wap/index.php?ctl=deals" method="post">
                <div class="search">
                    <div class="seach_text">
                        <input type="text" name="k" placeholder="请输入关键字搜索">
                    </div>
                    <div class="blank"></div>
                    <div class="seach_submit pr">
                        <i class="fa fa-search"></i>
                        <input type="submit" value="搜索" class="ps" style="opacity:0;width:100%;height:100%;left:0;">
                         
                            <input type="hidden" name="type" value="0"/>                
                            <input type="hidden" name="redirect" value="1"/>        
                                                                              
                    </div>
                </div>
            </form>
        </div>
        <div id="top_search_bd">
            <ul>
                                <li rel="0">
<!--                     <dl>
                        <dt>众筹类别</dt>
                        <dd>
                            <a href="/wap/index.php?ctl=deals">全部回报众筹</a>
                        </dd>
                    </dl>
                    <p class="cl"></p> -->
                    <dl>
                        <dt>属性</dt>
                        <dd>
                            <a href="/wap/index.php?ctl=deals&r=rec">推荐项目</a>
                        </dd>
                        <dd class="c24">
                            <a href="/wap/index.php?ctl=deals&r=yure">正在预热</a>
                        </dd>
                        <dd class="c23">
                            <a href="/wap/index.php?ctl=deals&r=new">最新上线</a>
                        </dd>
                    </dl>
                    <p class="cl"></p>
                    <dl>
                        <dt>分类</dt>
                                                                        <dd>
                            <a href="/wap/index.php?ctl=deals&id=1"  class=" " >设计</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=2"  class="c24 " >科技</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=3"  class=" c23" >影视</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=4"  class=" " >摄影</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=5"  class="c24 " >音乐</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=6"  class=" c23" >出版</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=7"  class=" " >活动</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=8"  class="c24 " >游戏</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=9"  class=" c23" >旅行</a>
                        </dd>
                                                                                                 <dd>
                            <a href="/wap/index.php?ctl=deals&id=10"  class=" " >其他</a>
                        </dd>
                                                                     </dl>
                </li>
                <li rel="1" style="display:none">
<!--                     <dl>
                        <dt>众筹类别</dt>
                        <dd class="c24">
                            <a href="/wap/index.php?ctl=deals&type=1">全部股权众筹</a>
                        </dd>
                    </dl>
                    <p class="cl"></p> -->
                    <dl>
                        <dt>属性</dt>
                        <dd>
                            <a href="/wap/index.php?ctl=deals&r=rec&type=1">推荐项目</a>
                        </dd>
                        <dd class="c24">
                            <a href="/wap/index.php?ctl=deals&r=yure&type=1">正在预热</a>
                        </dd>
                        <dd class="c23">
                            <a href="/wap/index.php?ctl=deals&r=new&type=1">最新上线</a>
                        </dd>
                    </dl>
                    <p class="cl"></p>
                    <dl>
                        <dt>分类</dt>
                                                                        <dd>
                            <a href="/wap/index.php?ctl=deals&id=1&type=1"  class=" " >设计</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=2&type=1"  class="c24 " >科技</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=3&type=1"  class=" c23" >影视</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=4&type=1"  class=" " >摄影</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=5&type=1"  class="c24 " >音乐</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=6&type=1"  class=" c23" >出版</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=7&type=1"  class=" " >活动</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=8&type=1"  class="c24 " >游戏</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=9&type=1"  class=" c23" >旅行</a>
                        </dd>
                                                                                                <dd>
                            <a href="/wap/index.php?ctl=deals&id=10&type=1"  class=" " >其他</a>
                        </dd>
                                                                    </dl>
                </li>
                                                            </ul>
        </div>
    </div>
    <div class="blank"></div>
</div>
<script type="text/javascript">
    $("#top_search_hd .search_cate").bind('click',function(){
        var $obj=$(this);
        var i=$obj.index();
        $obj.attr("checked",true).addClass("cur").siblings().attr("checked",false).removeClass("cur");
        $obj.parent().parent().find("input[name='type']").val($(this).attr("livalue"));
        $("#top_search_bd li").eq(i).show().siblings().hide();
    });
</script><style type="text/css">
	.btn_yzm{width:108px;float:none;font-size:14px;letter-spacing:0;}
</style>
<!--login-->  
<div class="blank15"></div>
<section class="user_register">
  <form id="user_register_form" name="user_register_form" action="/wap/index.php?ctl=user&act=do_register">
  	<div class="ul_block">
  		<ul>
  			<li class="webkit-box">
				<label class="input_lable">会员名称</label>
				<input type="text" placeholder="请输入会员名称" name="user_name" value="" class="textbox webkit-box-flex" />
			</li>
			<li class="webkit-box">
				<label class="input_lable">登录密码</label>
				<input type="password"  autocomplete="off" placeholder="请输入登录密码" name="user_pwd" value="" class="textbox webkit-box-flex" />
			</li>
			<li class="webkit-box">
				<label class="input_lable">确认密码</label>
				<input type="password"  autocomplete="off" placeholder="请输入确认密码" name="confirm_user_pwd" value="" class="textbox webkit-box-flex" />
			</li>
						<li class="webkit-box">
 				<label class="input_lable">电子邮箱:</label>
				<input type="text" placeholder="输入电子邮箱" name="email" value="" class="textbox webkit-box-flex" />
 			</li>
												  		</ul>
  	</div>
	<div class="mod_main"> 
		<input class="ui-button theme_color" type="button" name="submit_form"  value="注册" rel="ui-button">
		<input type="hidden" value="1" name="ajax" />
		<input type="hidden" name="target" value="">
	</div>
  </form>
</section>
<div class="blank15"></div>
<script>
			var is_mobile=0;
		var is_mobile_verify=0;
				var is_email=1;
					var is_email_verify=0;
			</script>
<!-- user_register.js -->
	</div>
	<!-- content 结束 -->
	<!-- footer-nav 开始 -->
  	<nav class="bar bar-tab footer_bar">
     	<a class="tab-item " href="#" onclick="RouterURL('/wap/index.php','#index-index');">
	      	<i class="icon iconfont">&#xe600;</i>
     	 	<span class="tab-label">首页</span>
	    </a>
	    			    <a class="tab-item " href="#" onclick="RouterURL('/wap/index.php?ctl=project&act=choose','#project-choose');">
	      	<i class="icon iconfont">&#xe601;</i>
     	 	<span class="tab-label">发起</span>
	    </a>
	    <input type="hidden" name="check_login" value="">
	    			 	<a class="tab-item " href="#" onclick="RouterURL('/wap/index.php?ctl=investor&act=invester_list','#investor-invester_list');">
	      	<i class="icon iconfont">&#xe604;</i>
     	 	<span class="tab-label">投资人</span>
	    </a>
	     	 	<a class="tab-item "  onclick="RouterURL('/wap/index.php?ctl=user&act=login','#user-login',2);">
	      	<i class="icon iconfont">&#xe602;</i>
     	 	<span class="tab-label">登录</span>
	    </a>
	      	</nav>
  	<!-- footer-nav 结束 -->
</div>
<!-- page 结束 -->
 
<script>
  //初始化侧栏禁止滑动打开
  $.config = {
    swipePanelOnlyClose:true
  }
</script>
<script type="text/javascript" src="http://116.255.159.227:8080/public/runtime/statics/e0ff6ada168f18863b51959b6dbab838.js?v=1.61"></script>
<script type="text/javascript">
$(document).on("pageInit", function(e, pageId, $page) {
});
//$(document).on("pageInit","#index-index", function(e, pageId, $page) {
// 	$(function(){
//		$.refreshScroller();
//	    $('.lazyImg_index').LazyLoad({
//	        container: window,
//	        event:'scroll',
//	        effect: 'show',
//	        effectArgs: 'slow',
//	        loadImg:'http://116.255.159.227:8080/wap/tpl/default/images/loading_img.gif',
//	        load: null,
//	        offset: 50
//	    });
//	});
//});
 
$(document).on("pageReinit", function(e, pageId, $page) {
});
$(document).on("pageLoadError", function(e, pageId, $page) {
 	$.toast("加载失败,返回首页");
    $.router.loadPage('/wap/index.php');
});
$.init();
</script></body>
</html>