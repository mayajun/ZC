<div class="l_main_bd slideTxtBox">
    <div class=" effect_hd">
        <ul class="tab-nav webkit-box">
            <li class="webkit-box-flex tc current"><a href="#">商业模式</a></li>
            <li class="webkit-box-flex tc"><a href="#">创业团队</a></li>
            <li class="webkit-box-flex tc"><a href="#">历史情况</a></li>
            <li class="webkit-box-flex tc"><a href="#">未来计划</a></li>
        </ul>
    </div>
    <div class="effect_bd">
        <!-- 市场定位与商业模式 开始 -->
        <?php if ($this->_var['user_info']['id'] != null): ?>
        <div class="investor_info_box" id="pro_con_1" style="display:block;">
            <?php if ($this->_var['deal_item']['description_2'] || $this->_var['deal_item']['description_3'] || $this->_var['deal_item']['description_4'] || $this->_var['deal_item']['description_5'] || $this->_var['deal_item']['description_6'] || $this->_var['deal_item']['description_7']): ?>
            <?php if ($this->_var['deal_item']['description_2']): ?>
            <div class="investor_info_title f_red clearfix">
                <i class="fa fa-tags mr5"></i>目标用户或客户群体定位
            </div>
            <div class="text"><?php echo $this->_var['deal_item']['description_2']; ?></div>
            <div class="blank15"></div>
            <?php endif; ?>
            <?php if ($this->_var['deal_item']['description_3']): ?>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>目标用户或客户群体目前困扰或需求定位
            </div>
            <div class="text"><?php echo $this->_var['deal_item']['description_3']; ?></div>
            <div class="blank15"></div>
            <?php endif; ?>
            <?php if ($this->_var['deal_item']['description_4']): ?>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>用户或客户需求的产品或服务模式说明
            </div>
            <div class="text"> <?php echo $this->_var['deal_item']['description_4']; ?> </div>
            <div class="blank15"></div>
            <?php endif; ?>
            <?php if ($this->_var['deal_item']['description_5']): ?>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>项目赢利模式说明
            </div>
            <div class="text"><?php echo $this->_var['deal_item']['description_5']; ?></div>
            <div class="blank15"></div>
            <?php endif; ?>
            <?php if ($this->_var['deal_item']['description_6']): ?>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>市场主要同行或竞争对手概述
            </div>
            <div class="text"><?php echo $this->_var['deal_item']['description_6']; ?></div>
            <div class="blank15"></div>
            <?php endif; ?>
            <?php if ($this->_var['deal_item']['description_7']): ?>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>项目主要核心竞争力说明
            </div>
            <div class="text"><?php echo $this->_var['deal_item']['description_7']; ?></div>
            <?php endif; ?> 
            <?php else: ?>
            <div class="tc">暂无相关内容</div>
            <?php endif; ?>                  
        </div>
        <!-- 市场定位与商业模式 结束 -->
        
        <!-- 股东及管理团队 开始 -->
        <div class="investor_info_box" id="pro_con_2" style="display:none;">
            <div class="investor_info_title f_red clearfix">
                <i class="fa fa-tags mr5"></i>股东团队说明
            </div>
            <div class="text">
            <?php if ($this->_var['stock_list']): ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab2">
                <tbody>
                    <tr class="col">
                        <td>姓名</td>
                        <td>职务</td>
                        <td>所占股份(%)</td>
                        <td>是否全职</td>
                        <td>实际出资金额（万元）</td>
                        <td>与其他股东历史关系描述</td>
                    </tr>
                    <?php $_from = $this->_var['stock_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k1', 'stock_item');if (count($_from)):
    foreach ($_from AS $this->_var['k1'] => $this->_var['stock_item']):
?>
                    <tr>
                        <td><?php echo $this->_var['stock_item']['name']; ?></td>
                        <td><?php echo $this->_var['stock_item']['job']; ?></td>
                        <td><?php echo $this->_var['stock_item']['share']; ?></td>
                        <td><?php echo $this->_var['stock_item']['is_full_time']; ?></td>
                        <td><?php echo $this->_var['stock_item']['invest_money']; ?></td>
                        <td><?php echo $this->_var['stock_item']['relation']; ?></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </tbody>
                </table>
                <?php $_from = $this->_var['stock_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k1', 'stock_item');if (count($_from)):
    foreach ($_from AS $this->_var['k1'] => $this->_var['stock_item']):
?>
                <div class="name">▍股东团队成员<?php echo $this->_var['stock_item']['name']; ?>简介：</div>
                <div class="sub"> <?php echo $this->_var['stock_item']['describe']; ?> </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
            <?php if (! $this->_var['stock_list']): ?>
                暂无相关内容
            <?php endif; ?> 
            </div>
            <div class="blank15"></div>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>非股东管理团队
            </div>
            <div class="text">
            <?php if ($this->_var['unstock_list']): ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab2">
                <tbody>
                    <tr class="col">
                        <td>姓名</td>
                        <td>职务</td>
                        <td>是否全职</td>
                        <td>与创始团队成员历史关系</td>
                    </tr>
                    <?php $_from = $this->_var['unstock_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'unstock_item');if (count($_from)):
    foreach ($_from AS $this->_var['unstock_item']):
?>
                        <tr>
                            <td><?php echo $this->_var['unstock_item']['name']; ?></td>
                            <td><?php echo $this->_var['unstock_item']['job']; ?></td>
                            <td><?php echo $this->_var['unstock_item']['is_full_time']; ?></td>
                            <td><?php echo $this->_var['unstock_item']['relation']; ?></td>
                        </tr> 
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </tbody>
                </table>
                <?php $_from = $this->_var['unstock_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'unstock_item');if (count($_from)):
    foreach ($_from AS $this->_var['unstock_item']):
?>
                        <div class="name">▍非股东团队成员<?php echo $this->_var['unstock_item']['name']; ?>简介：</div>
                        <div class="sub"> <?php echo $this->_var['unstock_item']['describe']; ?> </div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
            <?php if (! $this->_var['unstock_list']): ?>
            <div class="tc f_999">暂无相关内容</div>
            <?php endif; ?>
            </div>
        </div>
        <!-- 股东及管理团队 结束 -->

        <!-- 历史执行情况/在营店 开始 -->
        <div class="investor_info_box" id="pro_con_3" style="display:none;">
            <?php if ($this->_var['history_list']): ?>
			<?php $_from = $this->_var['history_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('history_key_num', 'history_item');if (count($_from)):
    foreach ($_from AS $this->_var['history_key_num'] => $this->_var['history_item']):
?>
			<?php $this->_var['history_key_num']++; ?>
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>第<span class="daxie"><?php echo $this->_var['history_key_num']; ?></span>阶段
            </div>
            <div class="text">
                <ul>
                    <li>
                        <span class="theme_fcolor">1、阶段名称：</span><?php echo $this->_var['history_item']['info']['name']; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">2、起止时间：</span><?php echo $this->_var['history_item']['info']['begin_time']; ?>至<?php echo $this->_var['history_item']['info']['end_time']; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">3、阶段达成目标描述：</span>
                        <?php if ($this->_var['history_item']['info']['describe']): ?>
                        <div class="pl20"><?php echo $this->_var['history_item']['info']['describe']; ?></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">4、完成阶段目标的主要措施、方法、手段：</span>
                        <?php if ($this->_var['history_item']['info']['do_describe']): ?>
                        <div class="pl20"><?php echo $this->_var['history_item']['info']['do_describe']; ?></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">5、阶段收入：</span>
                        <?php if ($this->_var['history_item']['info']['is_income'] == 1): ?>
                            <table border="0" cellspacing="0" cellpadding="0" class="tab2">
                            <tbody>
                                <tr class="col">
                                    <td width="30%">收入类别</td>
                                    <td width="30%" class="t_r">收入金额(元)</td>
                                    <td>备注</td>
                                </tr>                        
                                <?php $_from = $this->_var['history_item']['income']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'income');if (count($_from)):
    foreach ($_from AS $this->_var['income']):
?>
                                <tr>
                                    <td><?php echo $this->_var['income']['type']; ?></td>
                                    <td><?php echo $this->_var['income']['money']; ?></td>
                                    <td><?php echo $this->_var['income']['memo']; ?></td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <tr>
                                    <td>合计</td>
                                    <td class="t_r"><?php echo $this->_var['history_item']['info']['item_income']; ?></td>
                                    <td></td>                                   
                                </tr>
                            </tbody>
                            </table>
                            <div class="blank0"></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">6、阶段开支：</span>
                        <?php if ($this->_var['history_item']['info']['is_out'] == 1): ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab2">
                            <tbody>
                                <tr class="col">
                                    <td width="30%">费用类别</td>
                                    <td width="30%" class="t_r">开支金额(元)</td>
                                    <td>备注</td>
                                </tr>
                                <?php $_from = $this->_var['history_item']['out']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('out_key_num', 'out');if (count($_from)):
    foreach ($_from AS $this->_var['out_key_num'] => $this->_var['out']):
?>
                                <tr>
                                    <td><?php echo $this->_var['out']['type']; ?></td>
                                    <td><?php echo $this->_var['out']['money']; ?></td>
                                    <td><?php echo $this->_var['out']['memo']; ?></td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <tr>
                                    <td>合计</td>
                                    <td class="t_r"><?php echo $this->_var['history_item']['info']['item_out']; ?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            </table>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                </ul>
            </div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<div class="blank10"></div>
            <div class="con26">
                <span class="theme_fcolor f15 b"><i class="fa fa-bar-chart"></i>累计盈亏：</span>
                （累计盈亏未计算筹备开支/ 单位：元）
            </div>
            <div class="blank10"></div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab2" style="width:100%">
            <tbody>
                <tr class="col f_b">
                    <td width="30%">累计收入金额（元）</td>
                    <td width="30%">累计开支金额（元）</td>
                    <td>累计盈亏金额（元）</td>
                </tr>
                <tr class="theme_fcolor">
                    <td><?php echo $this->_var['total_history_income']; ?></td>
                    <td><?php echo $this->_var['total_history_out']; ?></td>
                    <td class="f_red"><?php echo $this->_var['total_history']; ?></td>
                </tr>
            </tbody>
            </table>
            <?php else: ?>
            <div class="tc">暂无相关内容</div>
            <?php endif; ?>
        </div>
        <!-- 历史执行情况/在营店 结束 -->

        <!-- 未来三年内计划 开始 -->
        <div class="investor_info_box" id="pro_con_4" style="display:none;">
            <?php if ($this->_var['plan_list']): ?>
            <?php $_from = $this->_var['plan_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('plan_key_num', 'plan_item');if (count($_from)):
    foreach ($_from AS $this->_var['plan_key_num'] => $this->_var['plan_item']):
?>
			<?php $this->_var['plan_key_num']++; ?>    
            <div class="investor_info_title f_red">
                <i class="fa fa-tags mr5"></i>第<span class="daxie"><?php echo $this->_var['plan_key_num']; ?></span>阶段
            </div>
            <div class="text">
                <ul>
                    <li>
                        <span class="theme_fcolor">1、阶段名称：</span><?php echo $this->_var['plan_item']['info']['name']; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">2、起止时间：</span><?php echo $this->_var['plan_item']['info']['begin_time']; ?>至<?php echo $this->_var['plan_item']['info']['end_time']; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">3、阶段达成目标描述：</span>
                        <?php if ($this->_var['plan_item']['info']['describe']): ?>
                        <div class="pl20"><?php echo $this->_var['plan_item']['info']['describe']; ?></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">4、完成阶段目标的主要措施、方法、手段：</span>
                        <?php if ($this->_var['plan_item']['info']['do_describe']): ?>
                        <div class="pl20"><?php echo $this->_var['plan_item']['info']['do_describe']; ?></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">5、阶段收入：</span>
                        <?php if ($this->_var['plan_item']['info']['is_income'] == 1): ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab2">
                            <tbody>
                                <tr class="col">
                                    <td width="30%">收入类别</td>
                                    <td width="30%" class="t_r">收入金额(元)</td>
                                    <td>备注</td>
                                </tr>
                                <?php $_from = $this->_var['plan_item']['income']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'income');if (count($_from)):
    foreach ($_from AS $this->_var['income']):
?>
                                <tr>
                                    <td><?php echo $this->_var['income']['type']; ?></td>
                                    <td class="t_r"><?php echo $this->_var['income']['money']; ?></td>
                                    <td><?php echo $this->_var['income']['memo']; ?></td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <tr>
                                    <td>合计</td>
                                    <td class="t_r"><?php echo $this->_var['plan_item']['info']['item_income']; ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                            </table>
                            <div class="blank0"></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                    <li>
                        <span class="theme_fcolor">6、阶段开支：</span>
                        <?php if ($this->_var['plan_item']['info']['is_out'] == 1): ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab2">
                            <tbody>
                                <tr class="col">
                                    <td width="30%">费用类别</td>
                                    <td width="30%" class="t_r">开支金额(元)</td>
                                    <td>备注</td>
                                </tr>
                                <?php $_from = $this->_var['plan_item']['out']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('out_key_num', 'out');if (count($_from)):
    foreach ($_from AS $this->_var['out_key_num'] => $this->_var['out']):
?>
                                    <tr>
                                        <td><?php echo $this->_var['out']['type']; ?></td>
                                        <td class="t_r"><?php echo $this->_var['out']['money']; ?></td>
                                        <td><?php echo $this->_var['out']['memo']; ?></td>
                                    </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <tr>
                                    <td>合计</td>
                                    <td class="t_r"><?php echo $this->_var['plan_item']['info']['item_out']; ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                            </table>
                            <div class="blank0"></div>
                        <?php else: ?>无<?php endif; ?>
                    </li>
                </ul>
            </div>
		    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <div class="blank10"></div>
            <div class="con26">
                <span class="theme_fcolor f15 b"><i class="fa fa-bar-chart"></i>累计盈亏：</span>
                （累计盈亏 / 单位：元）
            </div>
            <div class="blank10"></div>
            <table border="0" cellspacing="0" cellpadding="0" class="tab2" style="width:100%">
                <tbody>
                    <tr class="col f_b">
                        <td width="30%">累计收入金额（元）</td>
                        <td width="30%">累计开支金额（元）</td>
                        <td>累计盈亏金额（元）</td>
                    </tr>
                    <tr class="theme_fcolor">
                        <td><?php echo $this->_var['total_plan_income']; ?></td>
                        <td><?php echo $this->_var['total_plan_out']; ?></td>
                        <td class="f_red"><?php echo $this->_var['total_plan']; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php else: ?>
            <div class="tc">暂无相关内容</div>
            <?php endif; ?>
        </div>
        <!-- 未来三年内计划 结束 -->
		<?php endif; ?>
		<?php if ($this->_var['user_info']['id'] == null): ?>
        <div class="text tc pt20 pb10 pl10 pr10 f14">
           温馨提示：您需要<a href="#" onclick="RouterURL('<?php
echo parse_url_tag_wap("u:user#login|"."".""); 
?>','#user-login');" style="color:red;cursor: pointer;">登录</a>才可以查看项目详细信息！ 
        </div>
		<?php endif; ?>
    </div>   
</div>
<div class="blank20"></div>
<script type="text/javascript">
    $(function(){
        $(".tab-nav").find("li").on('click',function(){
            $(".investor_info_box").eq($(this).index()).show().siblings().hide();
            $(this).addClass("current").siblings().removeClass("current");
        });
        $("#text_accessory[href$='.txt']").find(".accessory_icon").addClass("accessory_t");
        $("#text_accessory[href$='.doc']").find(".accessory_icon").addClass("accessory_w");
        $("#text_accessory[href$='.docx']").find(".accessory_icon").addClass("accessory_w");
        $("#text_accessory[href$='.rar']").find(".accessory_icon").addClass("accessory_r");
        $("#text_accessory[href$='.zip']").find(".accessory_icon").addClass("accessory_r");
        $("#text_accessory[href$='.xls']").find(".accessory_icon").addClass("accessory_x");
        $("#text_accessory[href$='.xlsx']").find(".accessory_icon").addClass("accessory_x");
        $("#text_accessory[href$='.ppt']").find(".accessory_icon").addClass("accessory_p");
    });
</script>