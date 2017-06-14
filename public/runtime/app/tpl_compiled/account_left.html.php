<div class="homeleft pageleft f_l ">
	<div class="homeleft_title">
		<span class="f12">账户安全级别：</span><span class="f_r b" id="security_val">50%</span>
		<div class="blank5"></div>
		<div class="progress_bg">
			<span class="theme_bgcolor" id="progress"></span>
		</div>
		<input type="hidden" name="s_email" value="<?php echo $this->_var['user_info']['email']; ?>" />
		<input type="hidden" name="s_mobile" value="<?php echo $this->_var['user_info']['mobile']; ?>" />
		<input type="hidden" name="s_paypassword" value="<?php echo $this->_var['user_info']['paypassword']; ?>" />
		<input type="hidden" name="s_investor_status" value="<?php echo $this->_var['user_info']['investor_status']; ?>" />
	</div>
	<div class="menutitle menutitle_account">
		<span class="f_l"><i class="icons"></i>账户管理</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'home'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:home#index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'home'): ?>&#xe61a;<?php endif; ?></i><span>账户中心</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'credit'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#credit|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'credit'): ?>&#xe61a;<?php endif; ?></i><span>资金记录</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_inchange' || $this->_var['action'] == 'record' || $this->_var['action'] == 'money_inchange_log' || $this->_var['action'] == 'pay'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#money_inchange|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_inchange' || $this->_var['action'] == 'record' || $this->_var['action'] == 'money_inchange_log' || $this->_var['action'] == 'pay'): ?>&#xe61a;<?php endif; ?></i><span>我的充值</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_carry_bank' || $this->_var['action'] == 'refund' || $this->_var['action'] == 'money_carry' || $this->_var['action'] == 'money_carry_log' || $this->_var['action'] == 'money_carry_addbank' || $this->_var['action'] == 'addbank' || $this->_var['action'] == 'money_carry_addbank'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#money_carry_bank|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_carry_bank' || $this->_var['action'] == 'refund' || $this->_var['action'] == 'money_carry' || $this->_var['action'] == 'money_carry_log' || $this->_var['action'] == 'money_carry_addbank' || $this->_var['action'] == 'addbank' || $this->_var['action'] == 'money_carry_addbank'): ?>&#xe61a;<?php endif; ?></i><span>我的提现</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'score'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#score|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'score'): ?>&#xe61a;<?php endif; ?></i><span>积分明细</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'point'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#point|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'point'): ?>&#xe61a;<?php endif; ?></i><span>信用明细</span>
				</div>
			</a>
		</li>
		<?php if (app_conf ( "INVEST_STATUS" ) != 1 || app_conf ( "IS_FINANCE" ) == 1): ?>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_freeze'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#money_freeze|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_freeze'): ?>&#xe61a;<?php endif; ?></i><span>诚意金明细</span>
				</div>
			</a>
		</li>
		<?php endif; ?>
	</ul>
	<?php if (app_conf ( "INVEST_STATUS" ) != 2): ?>
	<div class="menutitle menutitle_item">
		<span class="f_l"><i class="icons"></i>产品项目</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'index' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 0 ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php if (app_conf ( "INVEST_STATUS" ) == 0 || app_conf ( "INVEST_STATUS" ) == 1): ?><?php
echo parse_url_tag("u:account#index|"."".""); 
?><?php endif; ?><?php if (app_conf ( "INVEST_STATUS" ) == 2): ?><?php
echo parse_url_tag("u:account#mine_investor_status|"."".""); 
?><?php endif; ?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'index' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 0 ) )): ?>&#xe61a;<?php endif; ?></i><span>我参与的产品项目</span>
				</div> 
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project' || ( $this->_var['project_deal_type'] == 0 && ( $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' || $this->_var['action'] == 'lottery' ) ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php if (app_conf ( "INVEST_STATUS" ) == 0 || app_conf ( "INVEST_STATUS" ) == 1): ?><?php
echo parse_url_tag("u:account#project|"."".""); 
?><?php endif; ?><?php if (app_conf ( "INVEST_STATUS" ) == 2): ?><?php
echo parse_url_tag("u:account#project_invest|"."".""); 
?><?php endif; ?>" class="a2">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project' || ( $this->_var['project_deal_type'] == 0 && ( $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' || $this->_var['action'] == 'lottery' ) ) )): ?>&#xe61a;<?php endif; ?></i><span>我创建的项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#focus|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus'): ?>&#xe61a;<?php endif; ?></i><span>我关注的项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#recommend|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend'): ?>&#xe61a;<?php endif; ?></i><span>推荐产品项目</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<?php if (app_conf ( "IS_HOUSE" ) == 1): ?>
	<div class="menutitle house">
		<span class="f_l"><i class="icons"></i>房产项目</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'house_index' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 2 ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#house_index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'house_index' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 2 ) )): ?>&#xe61a;<?php endif; ?></i><span>我参与的房产项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_house' || ( $this->_var['project_deal_type'] == 2 && ( $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' || $this->_var['action'] == 'lottery' ) ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#project_house|"."".""); 
?>" class="a2">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_house' || ( $this->_var['project_deal_type'] == 2 && ( $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' || $this->_var['action'] == 'lottery' ) ) )): ?>&#xe61a;<?php endif; ?></i><span>我创建的房产项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_house'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#focus_house|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_house'): ?>&#xe61a;<?php endif; ?></i><span>我关注房产的项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_house'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#recommend_house|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_house'): ?>&#xe61a;<?php endif; ?></i><span>推荐房产项目</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<?php if (app_conf ( "IS_SELFLESS" ) == 1): ?>
	<div class="menutitle welfare">
		<span class="f_l"><i class="icons"></i>公益项目</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'selfless_index' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 3 ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#selfless_index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'selfless_index' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 3 ) )): ?>&#xe61a;<?php endif; ?></i><span>我参与的公益项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_selfless' || ( $this->_var['project_deal_type'] == 3 && ( $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' || $this->_var['action'] == 'lottery' ) ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#project_selfless|"."".""); 
?>" class="a2">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_selfless' || ( $this->_var['project_deal_type'] == 3 && ( $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' || $this->_var['action'] == 'lottery' ) ) )): ?>&#xe61a;<?php endif; ?></i><span>我创建的房产项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_selfless'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#focus_selfless|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_selfless'): ?>&#xe61a;<?php endif; ?></i><span>我关注公益的项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_selfless'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#recommend_selfless|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_selfless'): ?>&#xe61a;<?php endif; ?></i><span>推荐公益项目</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<?php if (app_conf ( "INVEST_STATUS" ) != 1): ?>
	<div class="menutitle stock">
		<span class="f_l"><i class="icons"></i>股权项目</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'mine_investor_status' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 1 ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#mine_investor_status|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'mine_investor_status' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 1 ) )): ?>&#xe61a;<?php endif; ?></i><span>我参与的股权项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_invest' || ( $this->_var['project_deal_type'] == 1 && ( $this->_var['action'] == 'get_investor_status' || $this->_var['action'] == 'get_leader_list' || $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' ) ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#project_invest|"."".""); 
?>" class="a2">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_invest' || ( $this->_var['project_deal_type'] == 1 && ( $this->_var['action'] == 'get_investor_status' || $this->_var['action'] == 'get_leader_list' || $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' ) ) )): ?>&#xe61a;<?php endif; ?></i><span>我创建的股权项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_investor'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#focus_investor|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_investor'): ?>&#xe61a;<?php endif; ?></i><span>我关注股权的项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_investor'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#recommend_investor|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_investor'): ?>&#xe61a;<?php endif; ?></i><span>推荐股权项目</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<?php if (app_conf ( "INVEST_STATUS" ) != 1): ?>
	<div class="menutitle financ">
		<span class="f_l"><i class="icons"></i>融资项目</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'mine_investor_finance' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 4 ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#mine_investor_finance|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'mine_investor_finance' || ( $this->_var['action'] == 'view_order' && $this->_var['order_deal_type'] == 4 ) )): ?>&#xe61a;<?php endif; ?></i><span>我参与的融资项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_finance' || ( $this->_var['project_deal_type'] == 4 && ( $this->_var['action'] == 'get_investor_status' || $this->_var['action'] == 'get_leader_list' || $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' ) ) )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#project_finance|"."".""); 
?>" class="a2">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'project_finance' || ( $this->_var['project_deal_type'] == 4 && ( $this->_var['action'] == 'get_investor_status' || $this->_var['action'] == 'get_leader_list' || $this->_var['action'] == 'support' || $this->_var['action'] == 'paid' || $this->_var['action'] == 'set_repay' ) ) )): ?>&#xe61a;<?php endif; ?></i><span>我创建的融资项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_finance'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#focus_finance|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'focus_finance'): ?>&#xe61a;<?php endif; ?></i><span>我关注融资的项目</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_finance'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#recommend_finance|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'recommend_finance'): ?>&#xe61a;<?php endif; ?></i><span>推荐融资项目</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<?php if (app_conf ( "INVEST_STATUS" ) != 1): ?>
	<div class="menutitle management">
		<span class="f_l"><i class="icons"></i>投后管理</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">	
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'share_bonus' || $this->_var['action'] == 'share_bonus_apply' || $this->_var['action'] == 'share_bonus_detail' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#share_bonus|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'share_bonus'): ?>&#xe61a;<?php endif; ?></i><span>分红管理</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'fixed_interest' || $this->_var['action'] == 'fixed_interest_apply' || $this->_var['action'] == 'fixed_interest_detail' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#fixed_interest|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'fixed_interest'): ?>&#xe61a;<?php endif; ?></i><span>利息发放</span>
				</div>
			</a>
		</li>
		<?php if (app_conf ( "IS_STOCK_TRANSFER" ) == 1): ?>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'stock_transfer_out' || $this->_var['action'] == 'stock_transfer_in' || $this->_var['action'] == 'stock_transfer_add' || $this->_var['action'] == 'stock_transfer_edit' || $this->_var['action'] == 'stock_transfer_view_order' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#stock_transfer_out|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'stock_transfer_out'): ?>&#xe61a;<?php endif; ?></i><span>股权转让</span>
				</div>
			</a>
		</li>
		<?php endif; ?>
		<li <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'buy_house_earnings' || $this->_var['action'] == 'buy_house_earnings_apply' || $this->_var['action'] == 'buy_house_earnings_detail' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#buy_house_earnings|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'buy_house_earnings'): ?>&#xe61a;<?php endif; ?></i><span>买房收益</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<?php if (app_conf ( "IS_FINANCE" ) == 1): ?>
	<div class="menutitle company">
		<span class="f_l"><i class="icons"></i>公司管理</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">	
		<li <?php if ($this->_var['module'] == 'finance' && $this->_var['action'] == 'company_manage'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:finance#company_manage|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'finance' && $this->_var['action'] == 'company_manage'): ?>&#xe61a;<?php endif; ?></i><span>我管理的公司</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'finance' && $this->_var['action'] == 'company_focus'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:finance#company_focus|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'finance' && $this->_var['action'] == 'company_focus'): ?>&#xe61a;<?php endif; ?></i><span>我关注的公司</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
	<div class="menutitle menutitle_set">
		<span class="f_l"><i class="icons"></i>个人设置</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
 		<li <?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'index'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:settings#index|"."".""); 
?>" class="a5">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'index'): ?>&#xe61a;<?php endif; ?></i><span>个人资料</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'security'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:settings#security|"."".""); 
?>" class="a12">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'security'): ?>&#xe61a;<?php endif; ?></i><span>安全信息</span>
				</div>
			</a>
		</li>

		<li <?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'invite'): ?>class="select"<?php endif; ?> <?php if ($this->_var['user_info']['investor_status'] != 1 || $this->_var['user_info']['is_investor'] != 2): ?> style="display:none;"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:settings#invite|"."".""); 
?>" class="a12">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'invite'): ?>&#xe61a;<?php endif; ?></i><span>机构成员</span>
				</div>
			</a>
		</li>

 		<li <?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'consignee'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:settings#consignee|"."".""); 
?>" class="a8">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'consignee'): ?>&#xe61a;<?php endif; ?></i><span>收件地址</span>
				</div>
			</a>
		</li>
		<?php if (get_api_login_count ( 'Weixin' ) > 0): ?>
		<li <?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'bind'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:settings#bind|"."".""); 
?>" class="a7">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'settings' && $this->_var['action'] == 'bind'): ?>&#xe61a;<?php endif; ?></i><span>帐号绑定</span>
				</div>
			</a>
		</li>
		<?php endif; ?>
	</ul>
	<div class="menutitle menutitle_news">
		<span class="f_l"><i class="icons"></i>消息中心</span><i class="icon iconfont">&#xe61a;</i>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'comment'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:comment#index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'comment'): ?>&#xe61a;<?php endif; ?></i><span>项目评论</span>
				</div>
			</a>
		</li>
		<li>
			<a href="<?php
echo parse_url_tag("u:news#fav|"."".""); 
?>" target="_blank" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'xxx'): ?>&#xe61a;<?php endif; ?></i><span>项目动态</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'message'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:message#index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'message'): ?>&#xe61a;<?php endif; ?></i><span>我的私信</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'notify'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:notify#index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'notify'): ?>&#xe61a;<?php endif; ?></i><span>站内通知</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'invite'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:invite#index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'invite'): ?>&#xe61a;<?php endif; ?></i><span>查看邀请</span>
				</div>
			</a>
		</li>
	</ul>
	<div class="menutitle menutitle_invite">
		<span class="f_l"><i class="icons"></i>我的邀请</span><i class="icon iconfont">&#xe61a;</i>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'referral' && $this->_var['action'] == 'index'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:referral#index|"."".""); 
?>" class="a3">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'referral' && $this->_var['action'] == 'index'): ?>&#xe61a;<?php endif; ?></i><span>我的邀请记录</span>
				</div>
			</a>
		</li>
	</ul>
	<?php if ($this->_var['is_tg']): ?>
	<div class="menutitle menutitle_account">
		<span class="f_l"><i class="icons"></i>第三方托管</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'yeepay_recharge'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#yeepay_recharge|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'yeepay_recharge'): ?>&#xe61a;<?php endif; ?></i><span>我的充值</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'yeepay_withdraw'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#yeepay_withdraw|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'yeepay_withdraw'): ?>&#xe61a;<?php endif; ?></i><span>我的提现</span>
				</div>
			</a>
		</li>
		<?php if (INVEST_TYPE != 1): ?>
		<li <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'yeepay_money_freeze'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:account#yeepay_money_freeze|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"><?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'yeepay_money_freeze'): ?>&#xe61a;<?php endif; ?></i><span>我的诚意金</span>
				</div>
			</a>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
	<?php if (LICAI_TYPE): ?>
	<div class="menutitle licai">
		<span class="f_l"><i class="icons"></i>我的理财</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
 	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'licai' && ( $this->_var['action'] == 'uc_published_lc' || $this->_var['action'] == 'uc_record_lc' || $this->_var['action'] == 'uc_u_buyed_deal_lc' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:licai#uc_published_lc|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"></i><span>发起的理财</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'licai' && ( $this->_var['action'] == 'uc_expire_lc' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:licai#uc_expire_lc|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"></i><span>快到期理财发放</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'licai' && $this->_var['action'] == 'uc_redeem_lc'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:licai#uc_redeem_lc|"."type=0".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"></i><span>赎回管理</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'licai' && ( $this->_var['action'] == 'uc_buyed_lc' || $this->_var['action'] == 'uc_redeem' || $this->_var['action'] == 'uc_buyed_deal_lc' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:licai#uc_buyed_lc|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"></i><span>购买的理财</span>
				</div>
			</a>
		</li>
		<li <?php if ($this->_var['module'] == 'licai' && ( $this->_var['action'] == 'mortgage_money' )): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:licai#mortgage_money|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"></i><span>冻结金明细</span>
				</div>
			</a>
		</li>
 	</ul>
	<div class="menutitle points_exchange">
		<span class="f_l"><i class="icons"></i>积分兑换</span>
		<i class="icon iconfont iconfont_right">&#xe61a;</i>
		<i class="icon iconfont iconfont_down">&#xe61b;</i>
		<div class="blank0"></div>
	</div>
 	<ul class="homemenulist">
		<li <?php if ($this->_var['module'] == 'score_goods_order' && $this->_var['action'] == 'index'): ?>class="select"<?php endif; ?>>
			<a href="<?php
echo parse_url_tag("u:score_goods_order#index|"."".""); 
?>" class="a1">
				<div class="text">
					<i class="icon iconfont"></i><span>兑换列表</span>
				</div>
			</a>
		</li>
 	</ul>
	<?php endif; ?>
</div>
<script type="text/javascript">
(function(){
	var email=$("input[name='s_email']").val() ,
	 	mobile=$("input[name='s_mobile']").val() ,
	 	paypassword=$("input[name='s_paypassword']").val() ,
	 	investor_status=$("input[name='s_investor_status']").val() ,
		s_array=new Array(email,mobile,paypassword,investor_status);
 	for(var i=0; i<s_array.length; i++){
     	if(s_array[i] == "" || s_array[i] == 0 || typeof(s_array[i]) == "undefined"){
          	s_array.splice(i,1);
          	i= i-1;
 		}        
 	}
 	var total_length=4 ,
 		s_array_length=s_array.length ,
 		security_val=((s_array_length/total_length)*100);
	$("#security_val").text(security_val+"%");
	$("#progress").animate({width:security_val+"%"},1000);
})();

(function(){
	$(".menutitle").removeClass(".cur");
	$(".homemenulist").hide();
	$(".homemenulist").each(function(){
		var obj = $(this);
		if(obj.find(".select").length){
			var menutitle = obj.prev(".menutitle");
			obj.show();
			menutitle.addClass("cur");
			menutitle.find(".iconfont_right").hide();
			menutitle.find(".iconfont_down").show();
		}
	});

	$(".homeleft").find(".menutitle").on('click',function(e){
		e.stopPropagation();
		var obj = $(this);
		var hascur = obj.hasClass("cur");
		if(hascur){
			obj.find(".iconfont_down").hide();
			obj.find(".iconfont_right").show();
			obj.removeClass("cur").next(".homemenulist").slideUp(300);
		}
		else{
			obj.find(".iconfont_right").hide();
			obj.find(".iconfont_down").show();
			obj.addClass("cur").next(".homemenulist").slideDown(300);
		}
	});
})();
</script>