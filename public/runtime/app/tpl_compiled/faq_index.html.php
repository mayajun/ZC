<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/faq.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/faq.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/faq.js";
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
	<div class="adv_article_cate">
		<adv adv_id="faq_index_top" />
	</div>
	<div class="blank20"></div>
<div class="location_box wrap">
	<div class="location f_l">
		<i class="fl ico loc_ico mr5"></i>
		<label>您现在的位置：</label><?php if ($this->_var['nav_top']['top']): ?><a href="<?php echo $this->_var['nav_top']['top']['url']; ?>"><?php echo $this->_var['nav_top']['top']['name']; ?></a><?php endif; ?><?php if ($this->_var['nav_top']['list']): ?><em>>></em><a href="<?php echo $this->_var['nav_top']['list']['url']; ?>"><?php echo $this->_var['nav_top']['list']['name']; ?></a><?php endif; ?>
		<?php if ($this->_var['nav_top']['faq']): ?><em>>></em><a href="<?php echo $this->_var['nav_top']['cate_child']['url']; ?>"><?php echo $this->_var['nav_top']['faq']['name']; ?></a><?php endif; ?>
	</div>
</div>
<div class="blank10"></div>
<div class="article_main article_box faq_box" style="padding:0">
	<div class="article_l f_gray">
		<ul><!--class="on"-->
			<li <?php if ($this->_var['module'] == 'article_cate' && $this->_var['action'] == 'index' && $this->_var['id'] == 0): ?>class="on"<?php endif; ?>>
    			<a href="<?php
echo parse_url_tag("u:article_cate|"."id=".$this->_var['artilce_cate_item']['cate_id']."".""); 
?>">全部</a>
    		</li>
 			<?php $_from = $this->_var['artilce_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'artilce_cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['artilce_cate_item']):
?>
				<?php if ($this->_var['artilce_cate_item']['is_effect'] == 1 && $this->_var['artilce_cate_item']['is_delete'] == 0 && $this->_var['artilce_cate_item']['type_id'] == 0): ?>
					<li <?php if ($this->_var['artilce_cate_item']['current'] == 1): ?>class="on"<?php endif; ?>>
	        			<a href="<?php
echo parse_url_tag("u:article_cate|"."id=".$this->_var['artilce_cate_item']['cate_id']."".""); 
?>"><?php echo $this->_var['artilce_cate_item']['title']; ?></a>
	        		</li>
				<?php endif; ?>
    		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<li <?php if ($this->_var['module'] == 'faq' && $this->_var['action'] == 'index' && $this->_var['id'] == 0): ?>class="on"<?php endif; ?>>
    			<a href="<?php
echo parse_url_tag("u:faq|"."".""); 
?>">常见问题</a>
    		</li>
			<li <?php if ($this->_var['module'] == 'help' && $this->_var['action'] == 'index' && $this->_var['id'] == 0): ?>class="on"<?php endif; ?>>
        			<a href="<?php
echo parse_url_tag("u:help#show|"."".""); 
?>">帮助列表</a>
        	</li>
		</ul>
	</div>
	<div class="article_r">
		<div class="article_r_main">
			<div class="blank20"></div>
			<?php $_from = $this->_var['faq_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'faq_res');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['faq_res']):
?>
			<div class="mod_title"><i></i><?php echo $this->_var['key']; ?></div>
			<div class="blank20"></div>
			<div class="article_r_cont">
				<?php $_from = $this->_var['faq_res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'faq');$this->_foreach['faq'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['faq']['total'] > 0):
    foreach ($_from AS $this->_var['faq']):
        $this->_foreach['faq']['iteration']++;
?>
				<div class="article_r_list <?php if (($this->_foreach['faq']['iteration'] == $this->_foreach['faq']['total']) == 1): ?>last<?php endif; ?>">
					<h3><i></i><?php echo $this->_var['faq']['question']; ?></h3>
					<div class="blank0"></div>
					<div class="text"><i></i><?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['faq']['answer'],
);
echo $k['name']($k['v']);
?></div>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		</div>
		<div class="blank20"></div>
		<div class="pages" style="width:100%;"><?php echo $this->_var['pages']; ?></div>
		<div class="blank20"></div>
	</div>
</div>
<div class="blank20"></div>
<script type="text/javascript">
$(function(){
	$(".article_r_cont").parent(".article_r_list").last().css("border","0");
});
</script>
<?php echo $this->fetch('inc/footer.html'); ?> 