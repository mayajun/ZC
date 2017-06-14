<?php echo $this->fetch('inc/header.html'); ?>
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/setting_index.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<div class="user_center">
    <section class="u_top">
        <img src="<?php echo $this->_var['TMPL']; ?>/images/mybackground.png" width="100%" style=" position:absolute; top:0px;">
        <div class="this_details">
        	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:home#index|"."id=".$this->_var['user_info']['id']."".""); 
?>','#home-index',2);">
        		 <div class="user_pic">
                	<img src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'uid' => $this->_var['user_info']['id'],
  'type' => 'middle',
);
echo $k['name']($k['uid'],$k['type']);
?>" width="100%">
           		 </div>
        	</a>
            <div class="user_info">
                <h3><?php echo $this->_var['user_info']['user_name']; ?></h3>
                <p>
                    <i class="fa fa-map-marker"></i>
                    <span>会员</span>
					<?php if ($this->_var['user_info']['user_level']): ?>
                    <span><?php echo $this->_var['level_name']; ?></span>
					<?php endif; ?>
                </p>
            </div>
        </div>
    </section>
	<div class="list-block">
	    <ul>
	        <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:home#index|"."id=".$this->_var['user_info']['id']."".""); 
?>','#home-index',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe600;</i></div>
			        <div class="item-inner">
			          <div class="item-title">我的主页</div>			        
			        </div>
				</a>
	      </li>
	    </ul>
	</div>
	<div class="list-block">
	    <ul>
	      <li class="item-content">
	        <div class="item-media"><i class="icon iconfont">&#xe612;</i></div>
	        <div class="item-inner">
	          <div class="item-title">账户余额</div>
	          <div class="item-after"><span class="f_money">¥<?php echo $this->_var['user_info']['money']; ?></span></div>
	        </div>
	      </li>
		  <?php if ($this->_var['is_tg']): ?>
                <?php if ($this->_var['user_info']['ips_acct_no']): ?>
             	<li class="item-content" id="u_money_other" style="display:none">
	        		<div class="item-media"><i class="icon iconfont">&#xe61e;</i></div>
			        <div class="item-inner">
			          	<div class="item-title">第三方管理账号</div>
			          	<div class="item-after"><span class="f_money">¥<span id="u_money_other_money"></span></span></div>
			        </div>
		      	</li>
				<?php else: ?>
					<li id="u_money_other">
						<a href="#" onclick="RouterURL('<?php echo $this->_var['tg_register_url']; ?>','#collocation-CreateNewAcct',2);" id="J_bind_ips" class="item-content item-link">
			        		<div class="item-media"><i class="icon iconfont">&#xe61e;</i></div>
					        <div class="item-inner">
					          	<div class="item-title">第三方管理账号</div>
					          	<div class="item-after">
					          		<span class="f_red">去绑定</span>
					          	</div>
					        </div>
				    	</a>
			      	</li>
			 	<?php endif; ?>
          <?php endif; ?>
	    </ul>
	</div>
	<?php if (app_conf ( 'INVEST_STATUS' ) == 0 || app_conf ( 'INVEST_STATUS' ) == 1): ?>
	<div class="list-block">
	    <ul>
	      <li>
	      	<a href="<?php
echo parse_url_tag_wap("u:account#index|"."".""); 
?>" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#index|"."".""); 
?>','#account-index');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe616;</i></div>
		        <div class="item-inner">
		          <div class="item-title">支持的产品项目</div>     
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#project|"."".""); 
?>','#account-project');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe615;</i></div>
		        <div class="item-inner">
		          <div class="item-title">我的产品项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#focus|"."".""); 
?>','#account-focus');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe605;</i></div>
		        <div class="item-inner">
		          <div class="item-title">关注的产品项目</div>			         
		        </div>
			</a>
	      </li>		
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#recommend|"."".""); 
?>','#account-recommend');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe610;</i></div>
		        <div class="item-inner">
		          <div class="item-title">推荐的产品项目</div>			        
		        </div>
			</a>
	      </li>
	 	</ul>
	</div>
	<?php endif; ?>
	<?php if (app_conf ( 'IS_HOUSE' ) == 1): ?>
	<div class="list-block">
	    <ul>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#house_index|"."".""); 
?>','#account-house_index');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe616;</i></div>
		        <div class="item-inner">
		          <div class="item-title">支持房产的项目</div>     
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#project_house|"."".""); 
?>','#account-project_house');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe615;</i></div>
		        <div class="item-inner">
		          <div class="item-title">我的房产项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#focus_house|"."".""); 
?>','#account-focus_house');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe605;</i></div>
		        <div class="item-inner">
		          <div class="item-title">关注的房产项目</div>			         
		        </div>
			</a>
	      </li>		
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#recommend_house|"."".""); 
?>','#account-recommend_house');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe610;</i></div>
		        <div class="item-inner">
		          <div class="item-title">推荐的房产项目</div>			        
		        </div>
			</a>
	      </li> 
	 	</ul>
	</div>
	<?php endif; ?>
	<?php if (app_conf ( 'IS_SELFLESS' ) == 1): ?>
	<div class="list-block">
	    <ul>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#selfless_index|"."".""); 
?>','#account-selfless_index');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe616;</i></div>
		        <div class="item-inner">
		          <div class="item-title">支持公益的项目</div>     
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#project_selfless|"."".""); 
?>','#account-project_selfless');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe615;</i></div>
		        <div class="item-inner">
		          <div class="item-title">我的公益项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#focus_selfless|"."".""); 
?>','#account-focus_selfless');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe605;</i></div>
		        <div class="item-inner">
		          <div class="item-title">关注的公益项目</div>			         
		        </div>
			</a>
	      </li>		
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#recommend_selfless|"."".""); 
?>','#account-recommend_selfless');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe610;</i></div>
		        <div class="item-inner">
		          <div class="item-title">推荐的公益项目</div>			        
		        </div>
			</a>
	      </li> 
	 	</ul>
	</div>
	<?php endif; ?>
	<?php if (app_conf ( 'INVEST_STATUS' ) == 0 || app_conf ( 'INVEST_STATUS' ) == 2): ?>
	<div class="list-block">
	    <ul>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#mine_investor_status|"."".""); 
?>','#account-mine_investor_status');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe60c;</i></div>
		        <div class="item-inner">
		          <div class="item-title">投资的股权项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#project_invest|"."".""); 
?>','#account-project_invest');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe62d;</i></div>
		        <div class="item-inner">
		          <div class="item-title">我的股权项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#focus_investor|"."".""); 
?>','#account-focus_investor');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe605;</i></div>
		        <div class="item-inner">
		          <div class="item-title">关注股权的项目</div>			         
		        </div>
			</a>
	      </li>		
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#recommend_investor|"."".""); 
?>','#account-recommend_investor');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe610;</i></div>
		        <div class="item-inner">
		          <div class="item-title">推荐股权的项目</div>			        
		        </div>
			</a>
	      </li>
		  <?php if (app_conf ( 'IS_STOCK_TRANSFER' ) == 1): ?>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#stock_transfer_out|"."".""); 
?>','#account-stock_transfer_out');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe60c;</i></div>
		        <div class="item-inner">
		          <div class="item-title">股权转让</div>
		        </div>
			</a>
	      </li>
		  <?php endif; ?>
	 	</ul>
	</div>
	<?php endif; ?>
	<?php if (app_conf ( 'IS_FINANCE' ) == 1): ?>
	<div class="list-block">
	    <ul>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#mine_investor_finance|"."".""); 
?>','#account-mine_investor_finance');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe60c;</i></div>
		        <div class="item-inner">
		          <div class="item-title">投资的融资项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#project_finance|"."".""); 
?>','#account-project_finance');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe615;</i></div>
		        <div class="item-inner">
		          <div class="item-title">我的融资项目</div>
		        </div>
			</a>
	      </li>
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#focus_finance|"."".""); 
?>','#account-focus_finance');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe605;</i></div>
		        <div class="item-inner">
		          <div class="item-title">关注融资的项目</div>			         
		        </div>
			</a>
	      </li>		
	      <li>
	      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#recommend_finance|"."".""); 
?>','#account-recommend_finance');" class="item-content item-link">
		        <div class="item-media"><i class="icon iconfont">&#xe610;</i></div>
		        <div class="item-inner">
		          <div class="item-title">推荐融资的项目</div>			        
		        </div>
			</a>
	      </li>
	 	</ul>
	</div>
	<?php endif; ?>
	<div class="list-block">
		<ul>
			  <li class="item-content recharges">
			        <div class="item-media"><i class="icon iconfont">&#xe611;</i></div>
			        <div class="item-inner">
			          	<div class="item-title"><a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#record|"."".""); 
?>','#account-record',2);">充值记录</a></div>
					 	<div class="item-after"><a href="<?php
echo parse_url_tag_wap("u:account#incharge|"."".""); 
?>">充值</a></div>  
			        </div>
		      </li>		
		      <li class="item-content cash">
		      	
			        <div class="item-media"><i class="icon iconfont">&#xe61a;</i></div>
			        <div class="item-inner">
			          	<div class="item-title"><a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#refund|"."".""); 
?>','#account-refund',2);">提现记录</a></div>	
					  	<div class="item-after"><a href="<?php
echo parse_url_tag_wap("u:account#money_carry_bank|"."".""); 
?>">提现</a></div> 		        
			        </div>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#credit|"."".""); 
?>','#account-credit',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe60e;</i></div>
			        <div class="item-inner">
			          <div class="item-title">收支明细</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#score|"."".""); 
?>','#account-score',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe60a;</i></div>
			        <div class="item-inner">
			          <div class="item-title">积分明细</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#point|"."".""); 
?>','#account-point',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe618;</i></div>
			        <div class="item-inner">
			          <div class="item-title">信用明细</div>
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:account#money_freeze|"."".""); 
?>','#account-money_freeze',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe61b;</i></div>
			        <div class="item-inner">
			          <div class="item-title">诚意金明细</div>			        
			        </div>
				</a>
		      </li>
		</ul>
	</div>
	<?php if (app_conf ( 'IS_LICAI' ) == 1): ?>
	<div class="list-block">
		<ul>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:licai#uc_published_lc|"."".""); 
?>','#licai-uc_published_lc',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe61c;</i></div>
			        <div class="item-inner">
			          <div class="item-title">发起的理财</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:licai#uc_expire_lc|"."".""); 
?>','#licai-uc_expire_lc',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe617;</i></div>
			        <div class="item-inner">
			          <div class="item-title">快到期理财发放</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:licai#uc_redeem_lc|"."".""); 
?>','#licai-uc_redeem_lc',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe60b;</i></div>
			        <div class="item-inner">
			          <div class="item-title">赎回管理</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:licai#uc_buyed_lc|"."".""); 
?>','#licai-uc_buyed_lc',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe619;</i></div>
			        <div class="item-inner">
			          <div class="item-title">购买的理财</div>			        
			        </div>
				</a>
		      </li>
		</ul>
	</div>
	<!--融资公司模块-->
	<?php endif; ?>
	<?php if (app_conf ( "IS_FINANCE" ) == 1): ?>
	<div class="list-block">
		<ul>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:finance#company_manage|"."".""); 
?>','#finance-company_manage',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe61c;</i></div>
			        <div class="item-inner">
			          <div class="item-title">我管理的公司</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:finance#company_focus|"."".""); 
?>','#finance-company_focus',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe617;</i></div>
			        <div class="item-inner">
			          <div class="item-title">我关注的公司</div>			        
			        </div>
				</a>
		      </li>
		</ul>
	</div>
	<!--融资公司模块 end-->
	<?php endif; ?>
	<div class="list-block">
		<ul>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#modify|"."".""); 
?>','#settings-modify',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe60d;</i></div>
			        <div class="item-inner">
			          <div class="item-title">修改资料</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#security|"."".""); 
?>','#settings-security',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe61d;</i></div>
			        <div class="item-inner">
			          <div class="item-title">安全信息</div>			        
			        </div>
				</a>
		      </li>
			  <?php if ($this->_var['user_info']['investor_status'] == 1 && $this->_var['user_info']['is_investor'] == 2): ?>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#invite|"."".""); 
?>','#settings-invite',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe61d;</i></div>
			        <div class="item-inner">
			          <div class="item-title">机构成员</div>			        
			        </div>
				</a>
		      </li>
			  <?php endif; ?>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:settings#consignee|"."".""); 
?>','#settings-consignee',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe614;</i></div>
			        <div class="item-inner">
			          <div class="item-title">收货地址管理</div>			        
			        </div>
				</a>
		      </li>
		</ul>
	</div>	
	<div class="list-block">
		<ul>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:score_goods_order#index|"."".""); 
?>','#score_goods_order-index',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe613;</i></div>
			        <div class="item-inner">
			          <div class="item-title">积分兑换</div>			        
			        </div>
				</a>
		      </li>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:referral#index|"."".""); 
?>','#referral-index',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe632;</i></div>
			        <div class="item-inner">
			          <div class="item-title">邀请好友</div>			        
			        </div>
				</a>
		      </li>	  
		</ul>
	</div>	
	<div class="list-block">
		<ul>
			  <li>
		      	<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:invite#index|"."".""); 
?>','#invite-index',2);" class="item-content item-link">
			        <div class="item-media"><i class="icon iconfont">&#xe631;</i></div>
			        <div class="item-inner">
			          <div class="item-title">查看机构和企业邀请</div>			        
			        </div>
				</a>
		      </li>
		</ul>
	</div>	
	<div class="list-block">
		<ul>
			  <li>
		      	<a href="#" ajaxurl="<?php
echo parse_url_tag_wap("u:user#loginout|"."".""); 
?>" class="item-content" id="user_login_out">
			        <div class="item-media"><i class="icon iconfont">&#xe60f;</i></div>
			        <div class="item-inner">
			          <div class="item-title">退出</div>			        
			        </div>
				</a>
		      </li>			  
		</ul>
	</div>	
</div>
<div class="blank15"></div>
<script type="text/javascript">
	var is_tg = '<?php echo $this->_var['is_tg']; ?>';
	var user_info_id = '<?php echo $this->_var['user_info']['id']; ?>';
</script>
<!-- settings_index.js -->
<?php echo $this->fetch('inc/footer.html'); ?>