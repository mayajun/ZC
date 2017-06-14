<?php $_from = $this->_var['deal_hot_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'deal_0_72887500_1497402004');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['deal_0_72887500_1497402004']):
?>
<div class="item clearfix">
    <a href="#" title="<?php echo $this->_var['deal_0_72887500_1497402004']['name']; ?>" onclick="RouterURL('<?php echo $this->_var['deal_0_72887500_1497402004']['url']; ?>','#deal-show',2);">
        <div class="item-image">
            <img src="<?php if ($this->_var['deal_0_72887500_1497402004']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_0_72887500_1497402004']['image'],
  'w' => '115',
  'h' => '80',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal_0_72887500_1497402004']['name']; ?>" class="lazyImg_index" />
        </div>
        <div class="item-content">
            <div class="item_name webkit-box">
                <h3 class="webkit-box-flex"><?php echo $this->_var['deal_0_72887500_1497402004']['name']; ?></h3>
                <div class="invest_status">
                    <?php if ($this->_var['deal_0_72887500_1497402004']['begin_time'] > $this->_var['now_time']): ?>
                    <i class="invest_status_icon common-success">预热中</i>
                    <?php elseif ($this->_var['deal_0_72887500_1497402004']['end_time'] < $this->_var['now_time'] && $this->_var['deal_0_72887500_1497402004']['end_time'] != 0): ?>
                        <?php if ($this->_var['deal_0_72887500_1497402004']['is_success'] == 1): ?>
                            <i class="invest_status_icon common-success">已成功</i>
                        <?php else: ?>
                            <?php if ($this->_var['deal_0_72887500_1497402004']['type'] == 1): ?>
                            <i class="invest_status_icon common-fail">融资失败</i>
                            <?php else: ?>
                            <i class="invest_status_icon common-fail">筹资失败</i>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ($this->_var['deal_0_72887500_1497402004']['percent'] >= 100): ?>
                        <i class="invest_status_icon common-success">已成功</i>
                        <?php else: ?>
                            <?php if ($this->_var['deal_0_72887500_1497402004']['end_time'] == 0): ?>
                                <i class="invest_status_icon long_term">长期项目</i>
                            <?php else: ?>
                                <?php if ($this->_var['deal_0_72887500_1497402004']['type'] == 1): ?>
                                <i class="invest_status_icon common-sprite">融资中</i>
                                <?php else: ?>
                                <i class="invest_status_icon common-sprite">筹资中</i>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <p class="p-color"><?php echo $this->_var['deal_0_72887500_1497402004']['brief']; ?></p>
            <div class="clearfix bottom">
                <div class="price">目标 <em class="f_money number">¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_0_72887500_1497402004']['limit_price'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></em></div>
                <span class="support">完成<em><?php echo $this->_var['deal_0_72887500_1497402004']['percent']; ?>%</em></span>
            </div>
        </div>
    </a>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>