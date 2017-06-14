<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_invest_show.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/finance/company_deal_overviews.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fancybox.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.fancybox.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
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
<!-- 项目背景 开始-->
<div class="deal_body deal_show" <?php if ($this->_var['deal_info']['deal_backgroundColor_image'] != null): ?> style="background:url(<?php echo $this->_var['deal_info']['deal_backgroundColor_image']; ?>) repeat;" <?php endif; ?>>
    <!-- 项目大海报-->
    <div class="deal_banner" <?php if ($this->_var['deal_info']['deal_background_image'] != null): ?>style="background:url(<?php echo $this->_var['deal_info']['deal_background_image']; ?>) top center no-repeat;padding-top:405px;"<?php endif; ?>>
        <div class="clearfix"></div>
        <!--中间开始-->
        <div class="xqmain" >
            <!--中间页面头部start-->
            <?php echo $this->fetch('inc/deal_header.html'); ?>
            <!--中间页面头部end-->
            <div class="blank20"></div> 
            <div class="xqmain_main" >
                <!--中间页面左边start-->
                <div class="xqmain_left" >
                    <div class="box_main" >
                        <div class="title line clearfix">
                            <h3>项目介绍</h3>
                        </div>
                       <?php if ($this->_var['deal_info']['source_vedio']): ?>
						<embed wmode="opaque" wmode="opaque" src="<?php echo $this->_var['deal_info']['source_vedio']; ?>" allowFullScreen="true" quality="high"  width="790" height="500" align="middle" allowScriptAccess="always" ></embed>	                    
						<?php endif; ?>
						
                        <?php if ($this->_var['access'] == 1): ?>
                        <div class="l_main">
                            <p><?php echo $this->_var['deal_info']['description']; ?></p>
                        </div>
                        <div class="blank"></div>
                        <div class="deal_qa">
                            <?php $_from = $this->_var['deal_info']['deal_faq_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'faq');if (count($_from)):
    foreach ($_from AS $this->_var['faq']):
?>
                            <div class="faq_question" rel="<?php echo $this->_var['faq']['id']; ?>"> - <?php echo $this->_var['faq']['question']; ?></div>
                            <div class="faq_answer" rel="<?php echo $this->_var['faq']['id']; ?>" style="display: none;"><?php echo $this->_var['faq']['answer']; ?></div>
                            <div class="blank10"></div>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                        <div class="blank"></div>
                        <div class="l_foot">
                            <?php if ($this->_var['deal_info']['tags'] != ''): ?>
                            <div class="l_foot1">
                                <span class="f_l">标签：
                                <?php $_from = $this->_var['deal_info']['tags_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
                                <?php if (trim ( $this->_var['tag'] ) != ''): ?>
                                    <a href="<?php
echo parse_url_tag("u:deals|"."tag=".$this->_var['tag']."&type=0".""); 
?>" title="<?php echo $this->_var['tag']; ?>" target="_blank"><?php echo $this->_var['tag']; ?></a>
                                <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </span>
                            </div>
                            <?php endif; ?>
                            <div class="l_foot2 f_l">
                                <span class="lft1 f_l">
                                      如果您对项目有疑问，可以在此向项目发起人咨询
                                </span>
                                <span onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>);" class="f_r">
                                    <a class="ui-small-button theme_bgcolor">对发起人提问</a>
                                </span>
                            </div>
                            
                        </div>
                        <?php else: ?>
                            <?php if ($this->_var['access'] == 0): ?>
                            <div class="box border_dashed2 border_radius7 mt20">
                                <div class="box_main f16 tc clearfix">
                                    <span>您需要登录后才可以查看该项目详情</span>
                                    <div class="blank10"></div>
                                    <a onclick="javascript:show_pop_login();" class="ui-button ui-center-button theme_bgcolor">马上登录</a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ($this->_var['access'] == 2): ?>
                            <div class="box border_dashed2 border_radius7 mt20">
                                <div class="box_main f16 tc clearfix">
                                    <span>您的会员等级不够，无法查看项目详细信息！</span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ($this->_var['access'] == 3): ?>
                            <div class="box border_dashed2 border_radius7 mt20">
                                <div class="box_main f16 tc clearfix">
                                    <span>手机认证后，即可查看该项目详情</span>
                                    <div class="blank10"></div>
                                    <a href="<?php
echo parse_url_tag("u:settings#security|"."method=setting-mobile-box".""); 
?>" class="ui-button ui-center-button theme_bgcolor">马上去手机认证</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--中间页面左边end-->
                <?php echo $this->fetch('inc/deal_right.html'); ?>
                <div class="blank"></div>
            </div>
        </div>
        <!--中间结束-->
        <div class="blank"></div>
    </div>
</div>
<!-- 项目背景 结束-->
<script type="text/javascript">
    var img = document.getElementById("deal_image");
    if(img){
         var temp = new Image();
        temp.onload = function(){
            var style = img.style,
                ratio = Math.min(1,Math.max(0,760)/this.width);
            //设置预览尺寸
            style.width = Math.round( this.width * ratio ) + "px";
            style.height = Math.round( this.height * ratio ) + "px";
        }
        temp.src = img.src;
    }
</script>
<?php echo $this->fetch('inc/footer.html'); ?>