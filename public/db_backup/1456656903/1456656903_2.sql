-- fanwe SQL Dump Program
-- Microsoft-IIS/6.0
-- 
-- DATE : 2016-02-29 02:55:03
-- MYSQL SERVER VERSION : 5.1.71-community
-- PHP VERSION : cgi-fcgi
-- Vol : 2


DROP TABLE IF EXISTS `%DB_PREFIX%deal_support_log`;
CREATE TABLE `%DB_PREFIX%deal_support_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL COMMENT '金额',
  `deal_item_id` int(11) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '1' COMMENT '数量',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`),
  KEY `deal_item_id` (`deal_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='// 项目支持记录';
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('41','55','18','1352229388','15.00','18','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('42','56','17','1352230101','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('43','56','19','1352230180','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('44','56','19','1352230228','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('45','56','19','1352230232','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('46','56','19','1352230237','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('47','56','19','1352230240','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('48','56','19','1352230243','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('49','56','19','1352230247','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('50','56','19','1352230268','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('51','56','19','1352230270','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('52','56','19','1352230293','500.00','24','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('53','58','18','1352231539','2000.00','31','1');
INSERT INTO `%DB_PREFIX%deal_support_log` VALUES ('54','58','18','1352231704','3000.00','32','1');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_visit_log`;
CREATE TABLE `%DB_PREFIX%deal_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `client_ip` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COMMENT='// 访问记录';
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('117','55','127.0.0.1','1352229137');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('118','56','127.0.0.1','1352230070');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('119','57','127.0.0.1','1352230830');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('120','58','127.0.0.1','1352231514');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('121','56','127.0.0.1','1352231651');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('122','55','127.0.0.1','1352232299');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('123','58','127.0.0.1','1352232420');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('124','56','127.0.0.1','1352232590');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('125','57','127.0.0.1','1352232717');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('126','55','127.0.0.1','1352246374');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('127','57','127.0.0.1','1352246699');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('128','56','127.0.0.1','1352246710');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('129','58','127.0.0.1','1352246719');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('130','58','127.0.0.1','1455586010');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('131','56','127.0.0.1','1455586205');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('132','57','127.0.0.1','1455586417');
INSERT INTO `%DB_PREFIX%deal_visit_log` VALUES ('133','58','127.0.0.1','1455586732');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_vote`;
CREATE TABLE `%DB_PREFIX%deal_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `deal_id` int(11) NOT NULL COMMENT '项目id',
  `create_time` int(11) NOT NULL COMMENT '投票创建时间',
  `begin_time` int(11) NOT NULL COMMENT '投票开始时间',
  `end_time` int(11) NOT NULL COMMENT '投票结束时间',
  `money` decimal(20,2) NOT NULL COMMENT '卖出金额',
  `status` tinyint(1) NOT NULL COMMENT '0表示未同意 1表示同意 2表示投票失败',
  `yes_num` int(11) NOT NULL COMMENT '同意的总票数',
  `no_num` int(11) NOT NULL COMMENT '不同意的总票数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_vote_log`;
CREATE TABLE `%DB_PREFIX%deal_vote_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `deal_vote_id` int(11) NOT NULL COMMENT '投票id',
  `vote_status` tinyint(1) NOT NULL COMMENT '0表示不同意 1表示同意',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%faq`;
CREATE TABLE `%DB_PREFIX%faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='// 常见问题设置';
INSERT INTO `%DB_PREFIX%faq` VALUES ('1','基本问题','这是什么站?','我们是一个让你可以发起和支持创意项目的平台。如果你有一个创意的想法(新颖的产品?独立电影?)，我们欢迎你到我们的平台上发起项目，向公众推广，并得到资金的支持去完成你的想法。如果你喜欢创意，我们欢迎你来到我们平台，浏览各种有趣的项目，并力所能及支持他们。','1');
INSERT INTO `%DB_PREFIX%faq` VALUES ('2','基本问题','什么样的项目适合我们的平台?','我们欢迎一切有创意的想法，欢迎艺术家，电影工作者，音乐家，产品设计师，作家，画家，表演者，DJ等等来我们平台推广他们的创意。但是，我们的平台不适用于慈善项目或是创业投资项目。如果你不确定你的想法是否适合我们的平台，欢迎你直接与我们联系。','2');
INSERT INTO `%DB_PREFIX%faq` VALUES ('3','基本问题','这种模式有非法集资的风险吗?','不会，因为我们要求项目不能够以股权或是资金作为对支持者的回报。项目发起人更不能向支持者许诺任何资金上的收益。项目的回报必须是以实物（如产品，出版物），或者媒体内容（如提供视频或者音乐的流媒体播放或者下载）。我们平台项目接受支持，不能够以股权或者债券的形式。支持者对一个项目的支持属于购买行为，而不是投资行为。','3');
INSERT INTO `%DB_PREFIX%faq` VALUES ('4','基本问题','这个平台接受慈善项目类的提案么?','我们不接受慈善类项目。作为个人，我们支持社会公益慈善事业，但是我们平台不是支持此类项目的平台。我们所接受的是商业类，有销售购买行为的设计或者文创类的项目。项目发起人需要给支持以实物或者媒体内容类的回报。','4');
INSERT INTO `%DB_PREFIX%faq` VALUES ('5','项目发起人相关问题','是否会要求产品或作品的知识产权?','不会。我们只是提供一个宣传和支持的平台，知识产权由项目发起人所有。','5');
INSERT INTO `%DB_PREFIX%faq` VALUES ('6','项目发起人相关问题','什么人可以发起项目?','目前任何在两岸三地(中国大陆，台湾，港澳)的有创意的人都可以发起项目。你可以是一个从事创意行业的自由职业者，也可以是公司职员。只要你有个点子，我们都希望收到你的项目提案。','6');
INSERT INTO `%DB_PREFIX%faq` VALUES ('7','项目发起人相关问题','我怎么发起项目呢?','请到我们的网站并注册用户后，在我们网站上提交所需要的基本项目信息，包括项目的内容，目前进行的阶段等等。我们会有专人跟进，与你联系。','7');
INSERT INTO `%DB_PREFIX%faq` VALUES ('8','项目发起人相关问题','我想发起项目，但是我担心我的知识产权被人抄袭?','作为项目发起人，你可以选择公布更多的信息。知识产权敏感的信息，你可以选择不公开。同时，我们平台是一个面对公众的平台。你所提供的信息越丰富，越翔实，就越容易打动和说服别人的支持。','8');
INSERT INTO `%DB_PREFIX%faq` VALUES ('9','项目发起人相关问题','项目目标金额是否有上下限制?','我们对目标金额的下限是1000元人民币。原则上没有上限。但是资金的要求越高，成功的概率就越低。目前常见的目标金额从几千到几万不等。','9');
INSERT INTO `%DB_PREFIX%faq` VALUES ('10','项目发起人相关问题','没有达到目标金额，是否就不能得到支持?','是的。如果在项目截至日期到达时，没有达到预期，那么已经收到的资金会退还给支持者。这么做的原因是为了给支持者提供风险保护。只有当项目有足够多的人支持足够多的资金时，他们的支持才生效。','10');
INSERT INTO `%DB_PREFIX%faq` VALUES ('11','项目发起人相关问题','我的项目成功了，然后呢?','我们会分两次把资金打入你所提供的银行账户。两次汇款的时间和金额因项目而异，在项目上线之前，由我们平台与项目发起人确定。在资金的支持下，你就可以开始进行你的项目，给你的支持者以邮件或者其他形式的更新，并如期实现你承诺的回报。','11');
INSERT INTO `%DB_PREFIX%faq` VALUES ('12','项目发起人相关问题','如何设定项目截止日期?','一般来说，时间设置在一个月或以内比较合适。数据显示，绝大部分的支持发生在项目上线开始和结束前的一个星期中。','12');
INSERT INTO `%DB_PREFIX%faq` VALUES ('13','项目发起人相关问题','收到的金额能够超过预设的目标?','可以。在截至日期之前，项目可以一直接受资金支持。','13');
INSERT INTO `%DB_PREFIX%faq` VALUES ('14','项目发起人相关问题','大家支持的动机是什么?','大家对项目支持的动机是多样的。有些是因为项目发起者提供了有吸引力的回报，特别是产品设计类的项目。有些是因为认可这个项目，希望它能够实现。有些是因为认可项目的发起人，希望助他一臂之力。','14');
INSERT INTO `%DB_PREFIX%faq` VALUES ('15','项目发起人相关问题','什么样的回报比较合适?','回报因项目而异。可以是实物，比如如果是电影项目，可以提供成片后的DVD;如果是产品设计，可以提供产品;其他还有如明信片，T恤，出版物。也可以是非实物，比如鸣谢，与项目发起人共进晚餐，影片首映的门票等。我们欢迎项目发起人展开想象，设计出各式各样的回报。','15');
INSERT INTO `%DB_PREFIX%faq` VALUES ('16','项目发起人相关问题','如何能够吸引更多的人来支持我的项目?','对此，我们会另外详细介绍。简短来说，有以下要点\r\n- 拍摄一个有趣，吸引人的视频。讲述这个项目背后的故事。\r\n- 提供有吸引力，物有所值的回报。\r\n- 项目刚上线时，要发动你的亲朋好友来支持你。让你的项目有一个基本的人气。\r\n- 充分运用微博，人人等社交网站来推广。\r\n- 在项目上线期间，经常性的在你的项目页上提供项目的更新，与支持者，询问者的互动。\r\n- 项目宣传视频是必须的么?\r\n宣传视频是项目页上的重要内容。是公众了解你和你的项目的第一步。一个好的宣传视频，能够比文字和图片起到更好的宣传效果。基于这个原因，我们要求每个项目都提供一个视频。有必要的话，我们平台可以提供视频拍摄的支持。','16');
INSERT INTO `%DB_PREFIX%faq` VALUES ('17','项目发起人相关问题','项目宣传视频有什么要求?','我们要求宣传视频在两分钟之内。内容上，强烈建议包括以下内容\r\n发起人姓名\r\n项目简短描述(特别说明其吸引人的地方)，目前进展\r\n为什么需要支持\r\n谢谢大家','17');
INSERT INTO `%DB_PREFIX%faq` VALUES ('18','项目支持者相关问题','如果项目没有达到目标金额，我支持的资金会还给我么?','是的。如果项目在截止日期没有达到目标，你所支持的金额会返还给你。','18');
INSERT INTO `%DB_PREFIX%faq` VALUES ('19','项目支持者相关问题','如何支持一个项目?','每个项目页的右侧有可选择的支持额度和相应的回报介绍。想支持的话，选择你想支持的金额，鼠标点击绿色的按钮，即可。你可以选择支付宝或者财付通来完成付款。','19');
INSERT INTO `%DB_PREFIX%faq` VALUES ('20','项目支持者相关问题','如何保证项目发起人能够实现他们的承诺呢?','很多项目本身存在着风险，比如产品设计和纪录片的拍摄。有可能存在项目发起人无法完成其许诺的情况。项目支持者一方面要了解创意项目本身是有风险的，另一方面，我们要求项目发起人提供联系方式，并且鼓励有意支持者直接联系他们，在与项目发起人的沟通和互动中对项目的价值，风险，项目发起人的执行力等等有所判断。','20');
DROP TABLE IF EXISTS `%DB_PREFIX%file_verifies`;
CREATE TABLE `%DB_PREFIX%file_verifies` (
  `nameid` char(32) NOT NULL DEFAULT '',
  `cthash` varchar(32) NOT NULL DEFAULT '',
  `method` enum('local','official') NOT NULL DEFAULT 'official',
  `filename` varchar(254) NOT NULL DEFAULT '',
  PRIMARY KEY (`nameid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%finance_company`;
CREATE TABLE `%DB_PREFIX%finance_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '融资公司',
  `company_name` varchar(255) NOT NULL COMMENT '公司简称',
  `company_all_name` varchar(255) NOT NULL COMMENT '公司全称',
  `company_p_status` tinyint(1) NOT NULL COMMENT '0 3个月内上线 1 6个月内上线  2 运营中  3 停止运营 ',
  `company_brief` varchar(255) NOT NULL COMMENT '一句话简介',
  `company_website` varchar(255) NOT NULL COMMENT '公司网址',
  `company_create_time` int(11) NOT NULL COMMENT '公司创建时间',
  `company_logo` varchar(255) NOT NULL COMMENT '公司LOGO',
  `company_level` tinyint(1) NOT NULL COMMENT '0 表示创始人 1表示联合创始人',
  `company_job` varchar(255) NOT NULL COMMENT '职位',
  `company_sina_weibo` varchar(255) NOT NULL COMMENT '新浪微博',
  `company_weixin` varchar(255) NOT NULL COMMENT '微信账号',
  `company_business_card` varchar(255) NOT NULL COMMENT '名片',
  `iphone_url` varchar(255) NOT NULL COMMENT 'iPhone下载链接',
  `pc_url` varchar(255) NOT NULL COMMENT 'PC端下载链接',
  `android_url` varchar(255) NOT NULL COMMENT 'Android下载链接',
  `ipd_url` varchar(255) NOT NULL COMMENT 'iPad下载链接',
  `take_office_time` int(11) NOT NULL COMMENT '上任时间',
  `company_introduce_image` text NOT NULL COMMENT '图片介绍',
  `company_introduce_word` text NOT NULL COMMENT '文字介绍',
  `user_id` int(11) NOT NULL COMMENT '所属会员',
  `cate_id` int(11) NOT NULL COMMENT '分类ID',
  `status` tinyint(1) NOT NULL COMMENT '0 表示无效，未提交审核 1表示审核通过 2表示审核未通过',
  `province` varchar(255) NOT NULL COMMENT '省份',
  `city` varchar(255) NOT NULL COMMENT '城市',
  `company_tag` varchar(255) NOT NULL COMMENT '标签',
  `team_advantage` text COMMENT '团队优势',
  `is_edit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '编辑状态 0 提交审核 1 编辑',
  `refuse_reason` varchar(255) NOT NULL COMMENT '未通过理由',
  `focus_company_count` int(11) NOT NULL DEFAULT '0' COMMENT '关注公司的数量',
  `user_level` int(11) NOT NULL COMMENT '公司等级',
  `sort` int(11) NOT NULL COMMENT '序列号',
  `is_recommend` tinyint(1) NOT NULL COMMENT '推荐公司',
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_name` (`company_name`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%finance_company_focus`;
CREATE TABLE `%DB_PREFIX%finance_company_focus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL COMMENT '融资公司ID',
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='关注的公司';
DROP TABLE IF EXISTS `%DB_PREFIX%finance_company_investment_case`;
CREATE TABLE `%DB_PREFIX%finance_company_investment_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL COMMENT '融资公司ID',
  `create_time` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL COMMENT '公司简称',
  `invest_phase` tinyint(2) NOT NULL COMMENT '投资阶段 0表示天使轮,1表示Pre-A轮，2表示A轮，3表示A+轮，4表示B轮，5表示B+轮，6表示C轮，7表示D轮，8表示E轮及以后，9表示并购，10表示上市',
  `invest_amount_unit` tinyint(1) NOT NULL COMMENT '我方投资单位 0 人民币 1 美元',
  `invest_amount` decimal(20,2) NOT NULL COMMENT '我方投资金额 ，单位：元',
  `finance_amount_unit` tinyint(1) NOT NULL COMMENT '此轮总投资金额 单位 0 人民币 1 美元',
  `finance_amount` decimal(20,2) NOT NULL COMMENT '此轮总投资金额 单位：元',
  `valuation_unit` tinyint(1) NOT NULL COMMENT '此轮总投资金额 单位 0 人民币 1 美元',
  `valuation` decimal(20,2) NOT NULL COMMENT '此轮估值 金额 单位：元',
  `invest_time` int(11) NOT NULL COMMENT '投资时间',
  `status` tinyint(1) NOT NULL COMMENT '0 未审核 1审核通过 2 审核不通过',
  `type` tinyint(1) NOT NULL COMMENT '0 表示投资案例  1 融资经历 2 过往投资方',
  `invest_company_id` int(11) NOT NULL COMMENT '案例公司ID',
  `invest_type` tinyint(1) DEFAULT NULL COMMENT '过往投资方类型 1 代表个人 2 投资机构  3 公司',
  `level` tinyint(1) DEFAULT NULL COMMENT '0 代表创始合伙人 1 代表董事长 2 CEO 3 管理合伙人 4 资深合伙人 5 合伙人 6 风险合伙人 7 董事 8总经理 9 副总经理 10 董事总经理 11 高级副总裁 12 副总裁  13 投资总监 14 高级投资经理 15 投资经理 16 高级分析师 17 分析师',
  `invest_subject` text COMMENT '融资经历的 投资主体',
  `finance_pressurl` varchar(25) DEFAULT NULL COMMENT '融资经历的 相关报道',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关注的公司';
DROP TABLE IF EXISTS `%DB_PREFIX%finance_company_sub_product`;
CREATE TABLE `%DB_PREFIX%finance_company_sub_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL COMMENT '融资公司ID',
  `create_time` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL COMMENT '产品名称',
  `product_website` varchar(255) NOT NULL COMMENT '子产品链接',
  `status` tinyint(1) NOT NULL COMMENT '0 未审核 1审核通过 2 审核不通过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司的子产品';
DROP TABLE IF EXISTS `%DB_PREFIX%finance_company_team`;
CREATE TABLE `%DB_PREFIX%finance_company_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL COMMENT '融资公司ID/机构ID',
  `create_time` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0 表示创始团队 1 团队成员 2 过往成员 3 过往投资方 4 机构成员',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '职位类型 0 代表创始人 1 代表联合创始人',
  `position` varchar(255) NOT NULL COMMENT '职位名称',
  `user_id` int(11) NOT NULL COMMENT '对应的会员ID',
  `status` tinyint(1) NOT NULL COMMENT '0 未审核 1审核通过 2 审核不通过',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `intro` varchar(255) NOT NULL COMMENT '成员介绍',
  `employee_level` tinyint(1) DEFAULT NULL COMMENT '职位类型 0 技术 1 设计 2 产品 3 运营 4 市场与销售 5 行政、人事及财务 6 投资和并购 7 其他',
  `is_manager` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是公司的管理者 0代表不是  1代表是',
  `job_start_time` int(11) NOT NULL COMMENT '任职开始时间',
  `job_end_time` int(11) NOT NULL DEFAULT '0' COMMENT '0 表示至今 ',
  `invite_name` varchar(255) DEFAULT NULL COMMENT '公司名称/机构名称',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `invest_type` tinyint(1) NOT NULL COMMENT '过往投资方类型 1 代表个人 2 投资机构  ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司团队';
DROP TABLE IF EXISTS `%DB_PREFIX%goods`;
CREATE TABLE `%DB_PREFIX%goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '商品名称',
  `sub_name` varchar(255) NOT NULL COMMENT '商品简称',
  `cate_id` int(11) NOT NULL COMMENT '分类ID',
  `img` text NOT NULL COMMENT '商品主图',
  `brief` text NOT NULL COMMENT '商品简介',
  `description` text NOT NULL COMMENT '商品描述',
  `sort` int(11) NOT NULL COMMENT '排序',
  `max_bought` int(11) NOT NULL COMMENT '库存数',
  `user_max_bought` int(11) NOT NULL COMMENT '会员最大购买量按件',
  `score` int(11) NOT NULL COMMENT '购买所需积分',
  `is_delivery` tinyint(1) NOT NULL COMMENT '	是否需要配送；0：否; 1：是',
  `is_hot` tinyint(1) NOT NULL COMMENT '热卖',
  `is_new` tinyint(1) NOT NULL COMMENT '最新',
  `is_recommend` tinyint(1) NOT NULL COMMENT '是否推荐',
  `is_effect` tinyint(1) NOT NULL COMMENT '1：可用，0不可用',
  `seo_title` text NOT NULL COMMENT 'SEO自定义标题',
  `seo_keyword` text NOT NULL COMMENT 'SEO自定义关键词',
  `seo_description` text NOT NULL COMMENT 'SEO自定义描述',
  `goods_type_id` int(11) NOT NULL COMMENT '商品属性',
  `invented_number` int(11) NOT NULL COMMENT '虚拟购买数',
  `buy_number` int(11) NOT NULL COMMENT '购买人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%goods_attr`;
CREATE TABLE `%DB_PREFIX%goods_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '属性名称',
  `goods_type_attr_id` int(11) NOT NULL COMMENT '属性ID',
  `score` int(11) NOT NULL COMMENT '所需积分',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `is_checked` tinyint(1) NOT NULL COMMENT '是否有独立库存',
  PRIMARY KEY (`id`),
  KEY `goods_type_attr_id` (`goods_type_attr_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%goods_attr_stock`;
CREATE TABLE `%DB_PREFIX%goods_attr_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `attr_cfg` text NOT NULL,
  `stock_cfg` int(11) NOT NULL,
  `attr_str` text NOT NULL,
  `buy_count` int(11) NOT NULL,
  `attr_key` varchar(100) NOT NULL COMMENT '属性ID以下划线从小到大排序的key',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%goods_cate`;
CREATE TABLE `%DB_PREFIX%goods_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '商品分类名称',
  `is_effect` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%goods_order`;
CREATE TABLE `%DB_PREFIX%goods_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(255) NOT NULL COMMENT '订单号',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `score` int(11) NOT NULL COMMENT ' 所需积分',
  `total_score` int(11) NOT NULL COMMENT ' 所需积分',
  `pay_score` int(11) NOT NULL COMMENT '支付的积分',
  `number` int(11) NOT NULL DEFAULT '1' COMMENT '数量',
  `user_id` int(11) NOT NULL COMMENT ' 会员ID',
  `user_name` varchar(255) NOT NULL COMMENT '会员名',
  `delivery_sn` varchar(255) NOT NULL COMMENT '快递单号',
  `order_status` tinyint(1) NOT NULL COMMENT '订单状态 0未兑换 1已兑换 2已兑换（无库存，积分已退回） 3:退积分（管理员取消兑换，退还积分）  4已取消   5无效的订单',
  `delivery_status` tinyint(1) NOT NULL COMMENT '0:未发货，1：已发货，2：无需发货',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `create_date` date NOT NULL COMMENT '创建时间Ymd',
  `ex_time` int(11) NOT NULL COMMENT '兑换时间',
  `ex_date` date NOT NULL COMMENT '兑换时间Ymd',
  `is_delivery` tinyint(1) NOT NULL COMMENT '是否配送',
  `delivery_date` date NOT NULL COMMENT '发货时间Ymd',
  `delivery_time` int(11) NOT NULL COMMENT '发货时间',
  `delivery_tel` varchar(255) NOT NULL COMMENT '收货电话',
  `delivery_zip` varchar(255) NOT NULL,
  `delivery_addr` varchar(255) NOT NULL COMMENT '收货地址',
  `delivery_city` varchar(255) NOT NULL COMMENT '发货城市',
  `delivery_province` varchar(255) NOT NULL COMMENT '发货省份',
  `delivery_name` varchar(255) NOT NULL COMMENT '收货名称',
  `delivery_express` varchar(255) NOT NULL COMMENT '快递公司',
  `attr_view` varchar(255) NOT NULL COMMENT '属性信息',
  `attr` text NOT NULL COMMENT '所选属性',
  `memo` text NOT NULL COMMENT '用户留言',
  `admin_memo` text NOT NULL COMMENT '取消订单备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%goods_type`;
CREATE TABLE `%DB_PREFIX%goods_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '商品类型名',
  `is_effect` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%goods_type_attr`;
CREATE TABLE `%DB_PREFIX%goods_type_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '商品属性名',
  `input_type` tinyint(1) NOT NULL,
  `preset_value` text NOT NULL,
  `goods_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%help`;
CREATE TABLE `%DB_PREFIX%help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_fix` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='// 帮助介绍';
INSERT INTO `%DB_PREFIX%help` VALUES ('1','服务条款','<div class=\"layout960\"><p><strong>一、接受条款</strong></p>\r\n<p>我们所提供的服务包含我们平台网站体验和使用、我们平台互联网消息传递服务以及我们平台提供的与我们平台网站有关的任何其他特色功能、内容或应用程序(合称\"我们平台服务\")。无论用户是以\"访客\"(表示用户只是浏览我们平台网站)还是\"成员\"(表示用户已在我们平台注册并登录)的身份使用我们平台服务，均表示该用户同意遵守本使用协议。</p>\r\n<p>如果用户自愿成为我们平台成员并与其他成员交流(包括通过我们平台网站直接联系或通过我们平台各种服务而连接到的成员)，以及使用我们平台网站及其各种附加服务，请务必认真阅读本协议并在注册过程中表明同意接受本协议。本协议的内容包含我们平台关于接受我们平台服务和在我们平台网站上发布内容的规定、用户使用我们平台服务所享有的权利、承担的义务和对使用我们平台服务所受的限制、以及我们平台的隐私条款。如果用户选择使用某些我们平台服务，可能会收到要求其下载软件或内容的通知，和/或要求用户同意附加条款和条件的通知。除非用户选择使用的我们平台服务相关的附加条款和条件另有规定，附加的条款和条件都应被包含于本协议中。</p>\r\n<p>我们平台有权随时修改本协议文本中的任何条款。一旦我们平台对本协议进行修改,我们平台将会以公告形式发布通知。任何该等修改自发布之日起生效。如果用户在该等修改发布后继续使用我们平台服务，则表示该用户同意遵守对本协议所作出的该等修改。因此，请用户务必定期查阅本协议，以确保了解所有关于本协议的最新修改。如果用户不同意我们平台对本协议进行的修改，请用户离开我们平台网站并立即停止使用我们平台服务。同时，用户还应当删除个人档案并注销成员资格。</p>\r\n<p><strong>二、遵守法律</strong></p>\r\n<p>当使用我们平台服务时，用户同意遵守中华人民共和国(下称\"中国\")的相关法律法规，包括但不限于《中华人民共和国宪法》、《中华人民共和国合同法》、《中华人民共和国电信条例》、《互联网信息服务管理办法》、《互联网电子公告服务管理规定》、《中华人民共和国保守国家秘密法》、《全国人民代表大会常务委员会关于维护互联网安全的决定》、《中华人民共和国计算机信息系统安全保护条例》、《计算机信息网络国际联网安全保护管理办法》、《中华人民共和国著作权法》及其实施条例、《互联网著作权行政保护办法》等。用户只有在同意遵守所有相关法律法规和本协议时，才有权使用我们平台服务(无论用户是否有意访问或使用此服务)。请用户仔细阅读本协议并将其妥善保存。</p>\r\n<p><strong>三、用户帐号、密码及安全</strong></p>\r\n<p>用户应提供及时、详尽、准确的个人资料，并不断及时更新注册时提供的个人资料，保持其详尽、准确。所有用户输入的资料将引用为注册资料。我们平台不对因用户提交的注册信息不真实或未及时准确变更信息而引起的问题、争议及其后果承担责任。</p>\r\n<p>用户不应将其帐号、密码转让、出借或告知他人，供他人使用。如用户发现帐号遭他人非法使用，应立即通知我们平台。因黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用的，我们平台不承担任何责任。</p>\r\n<p><strong>四、隐私权政策</strong></p>\r\n<p>用户提供的注册信息及我们平台保留的用户所有资料将受到中国相关法律法规和我们平台《隐私权政策》的规范。《隐私权政策》构成本协议不可分割的一部分。</p>\r\n<p><strong>五、上传内容</strong></p>\r\n<p>用户通过任何我们平台提供的服务上传、张贴、发送(通过电子邮件或任何其它方式传送)的文本、文件、图像、照片、视频、声音、音乐、其他创作作品或任何其他材料(以下简称\"内容\"，包括用户个人的或个人创作的照片、声音、视频等)，无论系公开还是私下传播，均由用户和内容提供者承担责任，我们平台不对该等内容的正确性、完整性或品质作出任何保证。用户在使用我们平台服务时，可能会接触到令人不快、不适当或令人厌恶之内容，用户需在接受服务前自行做出判断。在任何情况下，我们平台均不为任何内容负责(包括但不限于任何内容的错误、遗漏、不准确或不真实)，亦不对通过我们平台服务上传、张贴、发送(通过电子邮件或任何其它方式传送)的内容衍生的任何损失或损害负责。我们平台在管理过程中发现或接到举报并进行初步调查后，有权依法停止任何前述内容的传播并采取进一步行动，包括但不限于暂停某些用户使用我们平台的全部或部分服务，保存有关记录，并向有关机关报告。</p>\r\n<p><strong>六、用户行为</strong></p>\r\n<p>用户在使用我们平台服务时，必须遵守中华人民共和国相关法律法规的规定，用户保证不会利用我们平台服务进行任何违法或不正当的活动，包括但不限于下列行为∶</p>\r\n<p>上传、展示、张贴或以其它方式传播含有下列内容之一的信息：</p>\r\n<p>反对宪法及其他法律的基本原则的;</p>\r\n<p>危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的;</p>\r\n<p>损害国家荣誉和利益的;</p>\r\n<p>煽动民族仇恨、民族歧视、破坏民族团结的;</p>\r\n<p>破坏国家宗教政策，宣扬邪教和封建迷信的;</p>\r\n<p>散布谣言，扰乱社会秩序，破坏社会稳定的;</p>\r\n<p>散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的;</p>\r\n<p>侮辱或者诽谤他人，侵害他人合法权利的;</p>\r\n<p>含有虚假、有害、胁迫、侵害他人隐私、骚扰、中伤、粗俗、猥亵、或其它道德上令人反感的内容;</p>\r\n<p>含有中国法律、法规、规章、条例以及任何具有法律效力的规范所限制或禁止的其它内容的;</p>\r\n<p>不得为任何非法目的而使用网络服务系统;</p>\r\n<p>用户同时保证不会利用我们平台服务从事以下活动：</p>\r\n<p>未经允许，进入计算机信息网络或者使用计算机信息网络资源的;</p>\r\n<p>未经允许，对计算机信息网络功能进行删除、修改或者增加的;</p>\r\n<p>未经允许，对进入计算机信息网络中存储、处理或者传输的数据和应用程序进行删除、修改或者增加的;故意制作、传播计算机病毒等破坏性程序的;</p>\r\n<p>其他危害计算机信息网络安全的行为。</p>\r\n<p>如用户在使用网络服务时违反任何上述规定，我们平台或经其授权者有权要求该用户改正或直接采取一切必要措施(包括但不限于更改、删除相关内容、暂停或终止相关用户使用我们平台服务)以减轻和消除该用户不当行为造成的影响。</p>\r\n<p>用户不得对我们平台服务的任何部分或全部以及通过我们平台取得的任何形式的信息，进行复制、拷贝、出售、转售或用于任何其它商业目的。</p>\r\n<p>用户须对自己在使用我们平台服务过程中的行为承担法律责任。用户承担法律责任的形式包括但不限于：停止侵害行为，向受到侵害者公开赔礼道歉，恢复受到侵害这的名誉，对受到侵害者进行赔偿。如果我们平台网站因某用户的非法或不当行为受到行政处罚或承担了任何形式的侵权损害赔偿责任，该用户应向我们平台进行赔偿(不低于我们平台向第三方赔偿的金额)并通过全国性的媒体向我们平台公开赔礼道歉。</p>\r\n<p><strong>七、知识产权和其他合法权益(包括但不限于名誉权、商誉等)</strong></p>\r\n<p>我们平台并不对用户发布到我们平台服务中的文本、文件、图像、照片、视频、声音、音乐、其他创作作品或任何其他材料(前文称为\"内容\")拥有任何所有权。在用户将内容发布到我们平台服务中后，用户将继续对内容享有权利，并且有权选择恰当的方式使用该等内容。如果用户在我们平台服务中或通过我们平台服务展示或发表任何内容，即表明该用户就此授予我们平台一个有限的许可以使我们平台能够合法使用、修改、复制、传播和出版此类内容。</p>\r\n<p>用户同意其已就在我们平台服务所发布的内容，授予我们平台可以免费的、永久有效的、不可撤销的、非独家的、可转授权的、在全球范围内对所发布内容进行使用、复制、修改、改写、改编、发行、翻译、创造衍生性著作的权利，及/或可以将前述部分或全部内容加以传播、表演、展示，及/或可以将前述部分或全部内容放入任何现在已知和未来开发出的以任何形式、媒体或科技承载的著作当中。</p>\r\n<p>用户声明并保证：用户对其在我们平台服务中或通过我们平台服务发布的内容拥有合法权利;用户在我们平台服务中或通过我们平台服务发布的内容不侵犯任何人的肖像权、隐私权、著作权、商标权、专利权、及其它合同权利。如因用户在我们平台服务中或通过我们平台服务发布的内容而需向其他任何人支付许可费或其它费用，全部由该用户承担。</p>\r\n<p>我们平台服务中包含我们平台提供的内容，包含用户和其他我们平台许可方的内容(下称\"我们平台的内容\")。我们平台的内容受《中华人民共和国著作权法》、《中华人民共和国商标法》、《中华人民共和国专利法》、《中华人民共和国反不正当竞争法》和其他相关法律法规的保护，我们平台拥有并保持对我们平台的内容和我们平台服务的所有权利。</p>\r\n<p><strong>八、国际使用之特别警告</strong></p>\r\n<p>用户已了解国际互联网的无国界性，同意遵守所有关于网上行为、内容的法律法规。用户特别同意遵守有关从中国或用户所在国家或地区输出信息所可能涉及、适用的全部法律法规。</p>\r\n<p><strong>九、赔偿</strong></p>\r\n<p>由于用户通过我们平台服务上传、张贴、发送或传播的内容，或因用户与本服务连线，或因用户违反本使用协议，或因用户侵害他人任何权利而导致任何第三人向我们平台提出赔偿请求，该用户同意赔偿我们平台及其股东、子公司、关联企业、代理人、品牌共有人或其它合作伙伴相应的赔偿金额(包括我们平台支付的律师费等)，以使我们平台的利益免受损害。</p>\r\n<p><strong>十、关于使用及储存的一般措施</strong></p>\r\n<p>用户承认我们平台有权制定关于服务使用的一般措施及限制，包括但不限于我们平台服务将保留用户的电子邮件信息、用户所张贴内容或其它上载内容的最长保留期间、用户一个帐号可收发信息的最大数量、用户帐号当中可收发的单个信息的大小、我们平台服务器为用户分配的最大磁盘空间，以及一定期间内用户使用我们平台服务的次数上限(及每次使用时间之上限)。通过我们平台服务存储或传送的任何信息、通讯资料和其它任何内容，如被删除或未予储存，用户同意我们平台毋须承担任何责任。用户亦同意，超过一年未使用的帐号，我们平台有权关闭。我们平台有权依其自行判断和决定，随时变更相关一般措施及限制。</p>\r\n<p><strong>十一、服务的修改</strong></p>\r\n<p>用户了解并同意，无论通知与否，我们平台有权于任何时间暂时或永久修改或终止部分或全部我们平台服务，对此，我们平台对用户和任何第三人均无需承担任何责任。用户同意，所有上传、张贴、发送到我们平台的内容，我们平台均无保存义务，用户应自行备份。我们平台不对任何内容丢失以及用户因此而遭受的相关损失承担责任。</p>\r\n<p><strong>十二、终止服务</strong></p>\r\n<p>用户同意我们平台可单方面判断并决定，如果用户违反本使用协议或用户长时间未能使用其帐号，我们平台可以终止该用户的密码、帐号或某些服务的使用，并可将该用户在我们平台服务中留存的任何内容加以移除或删除。我们平台亦可基于自身考虑，在通知或未通知之情形下，随时对该用户终止部分或全部服务。用户了解并同意依本使用协议，无需进行事先通知，我们平台可在发现任何不适宜内容时，立即关闭或删除该用户的帐号及其帐号中所有相关信息及文件，并暂时或永久禁止该用户继续使用前述文件或帐号。</p>\r\n<p><strong>十三、与广告商进行的交易</strong></p>\r\n<p>用户通过我们平台服务与广告商进行任何形式的通讯或商业往来，或参与促销活动(包括相关商品或服务的付款及交付)，以及达成的其它任何条款、条件、保证或声明，完全是用户与广告商之间的行为。除有关法律法规明文规定要求我们平台承担责任外，用户因前述任何交易、沟通等而遭受的任何性质的损失或损害，我们平台均不予负责。</p>\r\n<p><strong>十四、链接</strong></p>\r\n<p>用户了解并同意，对于我们平台服务或第三人提供的其它网站或资源的链接是否可以利用，我们平台不予负责;存在或源于此类网站或资源的任何内容、广告、产品或其它资料，我们平台亦不保证或负责。因使用或信赖任何此类网站或资源发布的或经由此类网站或资源获得的任何商品、服务、信息，如对用户造成任何损害，我们平台不负任何直接或间接责任。</p>\r\n<p><strong>十五、禁止商业行为</strong></p>\r\n<p>用户同意不对我们平台服务的任何部分或全部以及用户通过我们平台的服务取得的任何物品、服务、信息等，进行复制、拷贝、出售、转售或用于任何其它商业目的。</p>\r\n<p><strong>十六、我们平台的专属权利</strong></p>\r\n<p>用户了解并同意，我们平台服务及其所使用的相关软件(以下简称\"服务软件\")含有受到相关知识产权及其它法律保护的专有保密资料。用户同时了解并同意，经由我们平台服务或广告商向用户呈现的赞助广告或信息所包含之内容，亦可能受到著作权、商标、专利等相关法律的保护。未经我们平台或广告商书面授权，用户不得修改、出售、传播部分或全部服务内容或软件，或加以制作衍生服务或软件。我们平台仅授予用户个人非专属的使用权，用户不得(也不得允许任何第三人)复制、修改、创作衍生著作，或通过进行还原工程、反向组译及其它方式破译原代码。用户也不得以转让、许可、设定任何担保或其它方式移转服务和软件的任何权利。用户同意只能通过由我们平台所提供的界面而非任何其它方式使用我们平台服务。</p>\r\n<p><strong>十七、担保与保证</strong></p>\r\n<p>我们平台使用协议的任何规定均不会免除因我们平台造成用户人身伤害或因故意造成用户财产损失而应承担的任何责任。</p>\r\n<p>用户使用我们平台服务的风险由用户个人承担。我们平台对服务不提供任何明示或默示的担保或保证，包括但不限于商业适售性、特定目的的适用性及未侵害他人权利等的担保或保证。</p>\r\n<p>我们平台亦不保证以下事项：</p>\r\n<p>服务将符合用户的要求;</p>\r\n<p>服务将不受干扰、及时提供、安全可靠或不会出错;</p>\r\n<p>使用服务取得的结果正确可靠;</p>\r\n<p>用户经由我们平台服务购买或取得的任何产品、服务、资讯或其它信息将符合用户的期望，且软件中任何错误都将得到更正。</p>\r\n<p>用户应自行决定使用我们平台服务下载或取得任何资料且自负风险，因任何资料的下载而导致的用户电脑系统损坏或数据流失等后果，由用户自行承担。</p>\r\n<p>用户经由我们平台服务获知的任何建议或信息(无论书面或口头形式)，除非使用协议有明确规定，将不构成我们平台对用户的任何保证。</p>\r\n<p><strong>十八、责任限制</strong></p>\r\n<p>用户明确了解并同意，基于以下原因而造成的任何损失，我们平台均不承担任何直接、间接、附带、特别、衍生性或惩罚性赔偿责任(即使我们平台事先已被告知用户或第三方可能会产生相关损失)：</p>\r\n<p>我们平台服务的使用或无法使用;</p>\r\n<p>通过我们平台服务购买、兑换、交换取得的任何商品、数据、信息、服务、信息，或缔结交易而发生的成本;</p>\r\n<p>用户的传输或数据遭到未获授权的存取或变造;</p>\r\n<p>任何第三方在我们平台服务中所作的声明或行为;</p>\r\n<p>与我们平台服务相关的其它事宜，但本使用协议有明确规定的除外。</p>\r\n<p><strong>十九、一般性条款</strong></p>\r\n<p>本使用协议构成用户与我们平台之间的正式协议，并用于规范用户的使用行为。在用户使用我们平台服务、使用第三方提供的内容或软件时，在遵守本协议的基础上，亦应遵守与该等服务、内容、软件有关附加条款及条件。</p>\r\n<p>本使用协以及用户与我们平台之间的关系，均受到中华人民共和国法律管辖。</p>\r\n<p>用户与我们平台就服务本身、本使用协议或其它有关事项发生的争议，应通过友好协商解决。协商不成的，应向北京市东城区人民法院提起诉讼。</p>\r\n<p>我们平台未行使或执行本使用协议设定、赋予的任何权利，不构成对该等权利的放弃。</p>\r\n<p>本使用协议中的任何条款因与中华人民共和国法律相抵触而无效，并不影响其它条款的效力。</p>\r\n<p>本使用协议的标题仅供方便阅读而设，如与协议内容存在矛盾，以协议内容为准。</p>\r\n<p><strong>二十、举报</strong></p>\r\n<p>如用户发现任何违反本服务条款的情事，请及时通知我们平台。</p>\r\n</div>','term','','1','1');
INSERT INTO `%DB_PREFIX%help` VALUES ('2','服务介绍','','intro','','1','1');
INSERT INTO `%DB_PREFIX%help` VALUES ('3','隐私策略','','privacy','','1','1');
INSERT INTO `%DB_PREFIX%help` VALUES ('4','关于我们','','about','','1','1');
INSERT INTO `%DB_PREFIX%help` VALUES ('5','官方微博','','','http://weibo.com/vitakung','0','1');
INSERT INTO `%DB_PREFIX%help` VALUES ('7','撰写指南','','write_guide','','1','1');
DROP TABLE IF EXISTS `%DB_PREFIX%index_image`;
CREATE TABLE `%DB_PREFIX%index_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 表示首页轮播 1表示产品页轮播 2表示股权轮播',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='//首页图片';
INSERT INTO `%DB_PREFIX%index_image` VALUES ('5','./public/attachment/201211/07/10/5099c97ad9f82.gif','http://qodoculture.com','5','方维众筹','2');
INSERT INTO `%DB_PREFIX%index_image` VALUES ('6','./public/attachment/201211/07/10/5099c984946c3.jpg','http://mollygogo.com','4','4','1');
INSERT INTO `%DB_PREFIX%index_image` VALUES ('7','./public/attachment/201602/29/01/56d32a416acfc.jpg','http://vitakung.com','1','1','0');
INSERT INTO `%DB_PREFIX%index_image` VALUES ('8','./public/attachment/201602/29/01/56d32a6957bcf.png','http://molly.net.cn','2','2','0');
INSERT INTO `%DB_PREFIX%index_image` VALUES ('9','./public/attachment/201602/29/01/56d32aad31975.jpg','http://t5.mollygogo.com','3','3','0');
DROP TABLE IF EXISTS `%DB_PREFIX%investment_list`;
CREATE TABLE `%DB_PREFIX%investment_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(11) NOT NULL DEFAULT '0' COMMENT '投资的类型 0 表示 询价，1表示领投，2表示跟投,3表示追加的金额 , 4转让中的股份 , 5转让获得的股份 ,6取消转让的股份',
  `money` decimal(20,2) NOT NULL COMMENT '投资的金额',
  `stock_value` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '估指',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0表示 未来审核，1表示同意，2表示不同意',
  `introduce` text NOT NULL COMMENT '领投人的个人简介',
  `user_id` int(11) NOT NULL COMMENT '会员ID',
  `deal_id` int(11) NOT NULL COMMENT '股权众筹ID',
  `cates` text NOT NULL COMMENT '分类信息',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `investment_reason` text NOT NULL COMMENT '投资请求',
  `funding_to_help` text NOT NULL COMMENT '资金帮助',
  `investor_money_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '投资金额0 表示未审核 1表示审核通过 2表示审核拒绝 3表示已支付投资成功 4表示未按时间支付，违约',
  `order_id` int(11) NOT NULL COMMENT '订单号',
  `is_partner` tinyint(11) NOT NULL COMMENT '0表示无状态 1表示愿意承担企业合伙人 2表示不愿意承担企业合伙人',
  `leader_moban` text NOT NULL COMMENT '尽职调查和条款清单模板',
  `leader_help` text NOT NULL COMMENT '他为创业者还能提供的其它帮助',
  `leader_for_team` text NOT NULL COMMENT '对创业团队评价',
  `leader_for_project` text NOT NULL COMMENT '对创业项目评价',
  `send_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 表示未发送 1发送成功',
  `detailed_information` text NOT NULL COMMENT '详细资料',
  `num` int(11) NOT NULL COMMENT '份数',
  `stock_transfer_value` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '转让价值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
DROP TABLE IF EXISTS `%DB_PREFIX%invite`;
CREATE TABLE `%DB_PREFIX%invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '被邀请人的id',
  `invite_id` int(11) NOT NULL COMMENT '邀请的id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '判断是否接受邀请，默认0表示待确认，1表示接受邀请，2拒绝邀请',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `job` varchar(255) NOT NULL COMMENT '职位',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `type` tinyint(1) NOT NULL COMMENT '邀请的类型 0 表示邀请人是 投资机构 1表示邀请人是公司 3 创始团队来的邀请 4 团队成员来的邀请  5 过往成员来的邀请  6 过往投资方 ',
  `organization_name` varchar(255) NOT NULL COMMENT '机构/公司名称',
  `job_start_time` int(11) NOT NULL COMMENT '任职开始时间',
  `job_end_time` int(11) NOT NULL DEFAULT '0' COMMENT '0 表示至今 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邀请列表';
DROP TABLE IF EXISTS `%DB_PREFIX%licai`;
CREATE TABLE `%DB_PREFIX%licai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `licai_sn` varchar(50) NOT NULL COMMENT '编号',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '发起人【发起机构】',
  `img` varchar(255) NOT NULL COMMENT '项目图片',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `re_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0元;1新品上架;2当月畅销;3:本周畅销;4:限时抢购;',
  `begin_buy_date` date NOT NULL COMMENT '购买开始时间',
  `end_buy_date` date NOT NULL COMMENT '购买结束时间',
  `end_date` date NOT NULL COMMENT '项目结束时间',
  `min_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '起购金额',
  `max_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '单笔最大购买限额',
  `begin_interest_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '【0:当日生效，1:次日生效，2:下个工作日生效,3下二个工作日】',
  `product_size` varchar(255) DEFAULT NULL COMMENT '产品规模',
  `risk_rank` tinyint(1) NOT NULL DEFAULT '0' COMMENT '风险等级（2高、1中、0低）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1有效、0无效',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '理财类型（0余额宝、1固定定存、2浮动定存;3票据、4基金）',
  `description` text NOT NULL COMMENT '理财详情',
  `purchasing_time` varchar(255) DEFAULT NULL COMMENT '赎回到账时间描述',
  `rule_info` text COMMENT '规则',
  `is_trusteeship` tinyint(1) DEFAULT NULL COMMENT '是否托管 0是 1否',
  `average_income_rate` decimal(8,4) NOT NULL DEFAULT '0.0000' COMMENT 'type=0七日平均(年)收益率;type=1近三个月收益率【动态计算】',
  `per_million_revenue` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '每万元收益【动态计算】',
  `subscribing_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '累计成交总额',
  `redeming_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '累计被赎回',
  `is_deposit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否托管;1:托管;0:非托管',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `brief` varchar(255) DEFAULT NULL COMMENT '简介',
  `net_value` decimal(10,2) DEFAULT '0.00' COMMENT '最新净值',
  `fund_key` varchar(50) DEFAULT NULL COMMENT '关连的基金编号',
  `fund_type_id` int(10) NOT NULL DEFAULT '0' COMMENT '基金种类',
  `fund_brand_id` int(10) NOT NULL DEFAULT '0' COMMENT '基金品牌',
  `bank_id` int(10) NOT NULL DEFAULT '0' COMMENT '银行',
  `begin_interest_date` date DEFAULT NULL COMMENT '起息时间',
  `time_limit` int(10) DEFAULT NULL COMMENT '理财期限',
  `review_type` tinyint(1) DEFAULT NULL COMMENT '赎回到账方式: 0,发起人审核   1,网站和发起人审核 2，自动审核',
  `total_people` int(10) DEFAULT NULL COMMENT '参与人数',
  `service_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '成交服务费',
  `licai_status` tinyint(1) DEFAULT NULL COMMENT '理财状态 0：预热期 1：理财期 2：提前结束 3已到期',
  `send_type` tinyint(1) DEFAULT NULL COMMENT '发放款项类型  0：自动  1：手动',
  `is_send` tinyint(1) DEFAULT NULL COMMENT '是否发放 0：否 1：是',
  `investment_adviser` varchar(255) DEFAULT NULL,
  `profit_way` varchar(255) DEFAULT NULL COMMENT '获取收益方式',
  `scope` varchar(255) DEFAULT NULL COMMENT '利率范围',
  `platform_rate` decimal(10,4) DEFAULT NULL COMMENT '平台收益(余额宝)',
  `site_buy_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '购买手续费(余额宝)',
  `redemption_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '赎回手续费(余额宝)',
  `pay_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发放理财时资金不足是否允许垫付  0表示 不允许垫付  1 表示 允许垫付',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%licai_advance`;
CREATE TABLE `%DB_PREFIX%licai_advance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `redempte_id` int(11) NOT NULL COMMENT '赎回ID',
  `user_id` int(11) NOT NULL COMMENT '申请人ID',
  `user_name` varchar(255) NOT NULL COMMENT '申请用户名',
  `money` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT '赎回本金',
  `earn_money` decimal(10,2) NOT NULL COMMENT '收益金额',
  `fee` decimal(10,2) NOT NULL COMMENT '赎回手续费',
  `organiser_fee` decimal(10,2) NOT NULL,
  `advance_money` decimal(10,2) NOT NULL COMMENT '垫付金额',
  `real_money` decimal(10,2) NOT NULL COMMENT '发起人账户金额和冻结资金被扣的金额',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0表示未处理 1表示通过',
  `type` tinyint(1) NOT NULL COMMENT '0 预热期赎回 1.起息时间违约赎回 2.正常到期赎回',
  `create_date` date NOT NULL COMMENT '申请时间',
  `update_date` date NOT NULL COMMENT '处理时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%licai_bank`;
CREATE TABLE `%DB_PREFIX%licai_bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='基金种类：\r\n全部 货币型 股票型 债券型 混合型 理财型 指数型 QDII 其他型';
DROP TABLE IF EXISTS `%DB_PREFIX%licai_dealshow`;
CREATE TABLE `%DB_PREFIX%licai_dealshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licai_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%licai_fund_brand`;
CREATE TABLE `%DB_PREFIX%licai_fund_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='基金品牌：\r\n全部 嘉实 鹏华 易方达 国泰 南方 建信 招商 工银瑞信 海富通 华商 中邮创业 长盛 东方\r\n';
DROP TABLE IF EXISTS `%DB_PREFIX%licai_fund_type`;
CREATE TABLE `%DB_PREFIX%licai_fund_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='基金种类：\r\n全部 货币型 股票型 债券型 混合型 理财型 指数型 QDII 其他型';
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('1','货币型','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('2','股票型','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('3','债券型','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('4','混合型','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('5','理财型','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('6','标准','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('7','QDII','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('8','其他型','1','0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('9','中欧','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%licai_history`;
CREATE TABLE `%DB_PREFIX%licai_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `licai_id` varchar(50) NOT NULL COMMENT '编号',
  `history_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '购买金额起',
  `net_value` decimal(10,2) NOT NULL COMMENT '当日净利',
  `rate` decimal(7,4) NOT NULL COMMENT '利率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='基金净值列表';
DROP TABLE IF EXISTS `%DB_PREFIX%licai_holiday`;
CREATE TABLE `%DB_PREFIX%licai_holiday` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL COMMENT '年',
  `holiday` date NOT NULL COMMENT '假日',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%licai_interest`;
CREATE TABLE `%DB_PREFIX%licai_interest` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `licai_id` varchar(50) NOT NULL COMMENT '编号',
  `min_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买金额起',
  `max_money` decimal(10,2) NOT NULL COMMENT '购买金额起',
  `interest_rate` decimal(7,4) NOT NULL COMMENT '利息率',
  `buy_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '原购买手续费',
  `site_buy_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '网站购买手续费',
  `redemption_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '赎回手续费',
  `before_rate` decimal(10,4) DEFAULT NULL COMMENT '预热期利率',
  `before_breach_rate` decimal(10,4) DEFAULT NULL COMMENT '预热期违约利率',
  `breach_rate` decimal(10,4) DEFAULT NULL COMMENT '正常利息 违约收益率',
  `platform_rate` decimal(10,4) DEFAULT NULL COMMENT '平台收益率',
  `freeze_bond_rate` decimal(10,4) DEFAULT NULL,
  `platform_breach_rate` decimal(10,4) DEFAULT NULL COMMENT '用户违约网站收益',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='利率列表【不同投资金额，可以获得不同的利率】';
DROP TABLE IF EXISTS `%DB_PREFIX%licai_order`;
CREATE TABLE `%DB_PREFIX%licai_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licai_id` int(11) NOT NULL COMMENT '理财产品ID',
  `user_id` int(11) NOT NULL COMMENT '购买用户的id',
  `user_name` varchar(50) NOT NULL,
  `money` decimal(10,2) NOT NULL COMMENT '购买金额',
  `status` tinyint(1) NOT NULL COMMENT '0：未支付 1：已支付 2、部分赎回 3、已完结',
  `freeze_bond_rate` decimal(10,4) NOT NULL COMMENT '冻结保证金费率',
  `freeze_bond` decimal(10,2) NOT NULL COMMENT '冻结保证金',
  `pay_money` decimal(10,2) NOT NULL COMMENT '发放金额',
  `status_time` datetime NOT NULL COMMENT '处理时间',
  `create_time` datetime NOT NULL COMMENT '购买时间',
  `create_date` date NOT NULL COMMENT '购买年月日',
  `site_buy_fee_rate` decimal(10,4) NOT NULL COMMENT '实际申购费率',
  `site_buy_fee` decimal(10,2) NOT NULL COMMENT '实际申购费',
  `redemption_fee_rate` decimal(10,4) NOT NULL COMMENT '赎回手续费',
  `before_interest_date` date NOT NULL COMMENT '预热开始时间',
  `before_interest_enddate` date NOT NULL COMMENT '预热结束时间',
  `before_rate` decimal(10,4) NOT NULL COMMENT '预热利率',
  `before_interest` decimal(10,2) NOT NULL COMMENT '预热利息',
  `is_before_pay` tinyint(1) NOT NULL COMMENT '是否已经支付预热期手续费',
  `before_breach_rate` decimal(10,4) NOT NULL COMMENT '预热期违约利率',
  `begin_interest_type` tinyint(1) NOT NULL COMMENT '【0:当日生效，1:次日生效，2:下个工作日生效,3下二个工作日】',
  `begin_interest_date` date NOT NULL COMMENT '起息时间YMD',
  `interest_rate` decimal(10,4) NOT NULL COMMENT '利息率',
  `breach_rate` decimal(10,4) NOT NULL COMMENT '正常利息 违约收益率',
  `end_interest_date` date NOT NULL COMMENT '结束时间YMD',
  `service_fee_rate` decimal(10,4) NOT NULL COMMENT '成交服务费率',
  `service_fee` decimal(10,2) NOT NULL COMMENT '成交服务费',
  `redempte_money` decimal(10,2) DEFAULT '0.00' COMMENT '赎回金额',
  `gross` decimal(10,2) DEFAULT '0.00' COMMENT '毛利',
  `gross_margins` decimal(10,4) DEFAULT '0.0000' COMMENT '毛利率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COMMENT='理财订单表';
DROP TABLE IF EXISTS `%DB_PREFIX%licai_recommend`;
CREATE TABLE `%DB_PREFIX%licai_recommend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `licai_id` varchar(50) NOT NULL COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `img` varchar(255) NOT NULL COMMENT '项目图片',
  `brief` varchar(255) DEFAULT NULL COMMENT '简介',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='个性推荐';
DROP TABLE IF EXISTS `%DB_PREFIX%licai_redempte`;
CREATE TABLE `%DB_PREFIX%licai_redempte` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `user_id` int(11) NOT NULL COMMENT '申请人ID',
  `user_name` varchar(255) NOT NULL COMMENT '申请用户名',
  `money` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT '赎回本金',
  `earn_money` decimal(10,2) NOT NULL COMMENT '收益金额',
  `fee` decimal(10,2) NOT NULL COMMENT '赎回手续费',
  `organiser_fee` decimal(10,2) NOT NULL COMMENT '平台收益',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0表示未赎回 1表示已赎回 2表示拒绝 3表示取消赎回',
  `type` tinyint(1) NOT NULL COMMENT '0 预热期赎回 1.起息时间违约赎回 2.正常到期赎回3.预热期正常赎回 ',
  `create_date` date NOT NULL COMMENT '申请时间',
  `update_date` date NOT NULL COMMENT '处理时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%link`;
CREATE TABLE `%DB_PREFIX%link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `count` int(11) NOT NULL,
  `show_index` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COMMENT='//链接';
INSERT INTO `%DB_PREFIX%link` VALUES ('128','猫力中国','14','http://molly.net.cn','1','1','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('129','VK维客','14','http://vitakung.com','1','2','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('130','KK大公馆','14','http://kungkuan.com','1','3','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('131','宫网','14','http://gong.news','1','4','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('132','猫力网','14','http://mollygogo.com','1','5','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('133','qodo取道文化','14','http://qodoculture.com','1','6','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('134','VITAGONG宫伟','14','http://vitagong.com','1','7','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('135','MW猫力珠宝','14','http://mollywang.com','1','8','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('136','qodo取道中国','14','http://qodo.com.cn','1','9','','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('137','36氪股权众筹','19','https://z.36kr.com/projects','1','10','./public/attachment/201602/29/02/56d3381803d09.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('138','软银中国','21','http://www.sbcvc.com/','1','11','./public/attachment/201602/29/02/56d33860b71b0.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('139','纪源资本','21','http://www.ggvc.com/','1','12','./public/attachment/201602/29/02/56d3388e94c5f.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('140','红杉资本','21','http://www.sequoiacap.cn/zh/','1','13','./public/attachment/201602/29/02/56d338b12625a.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('141','经纬中国','21','http://www.matrixpartners.com.cn/','1','14','./public/attachment/201602/29/02/56d338d8d9701.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('142','IDG','21','http://www.idgvc.com/','1','15','./public/attachment/201602/29/02/56d338f76acfc.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('143','GOBI','21','http://www.gobivc.com/','1','16','./public/attachment/201602/29/02/56d3391b03d09.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('144','真格基金','21','http://www.zhenfund.com/','1','17','./public/attachment/201602/29/02/56d33958501bd.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('145','京东金融','19','http://z.jd.com/new.html','1','18','./public/attachment/201602/29/02/56d339aa0f424.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('146','天使客','19','https://www.angelclub.com/','1','19','./public/attachment/201602/29/02/56d339fc7a120.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('147','天使街','19','http://www.tianshijie.com.cn/','1','20','./public/attachment/201602/29/02/56d33a4d40d99.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('148','企e融','19','http://www.71fi.com/','1','21','./public/attachment/201602/29/02/56d33aadd59f8.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('149','融e帮','19','http://rongebang.com/','1','22','./public/attachment/201602/29/02/56d33af866ff3.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('150','第五创','19','http://www.d5ct.com/','1','23','./public/attachment/201602/29/02/56d33b2c44aa2.jpg','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('151','众筹客','18','http://www.zhongchouke.com/','1','24','./public/attachment/201602/29/02/56d33bf91312d.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('152','淘宝众筹','18','https://izhongchou.taobao.com/index.htm','1','25','./public/attachment/201602/29/02/56d33c5d31975.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('153','众筹网','18','http://www.zhongchou.com/','1','26','./public/attachment/201602/29/02/56d33cb4b34a7.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('154','汇梦公社','20','http://www.hmzone.com/','1','27','./public/attachment/201602/29/02/56d33d5800000.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('155','咱们众筹','20','http://www.zamazc.com/','1','28','./public/attachment/201602/29/02/56d33da3b71b0.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('156','大家投','20','http://www.dajiatou.com/','1','29','./public/attachment/201602/29/02/56d33e01f0537.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('157','大家筹','20','http://www.dajiachou.com/','1','30','./public/attachment/201602/29/02/56d33e30bebc2.jpg','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('158','人人合伙','20','http://www.renrenhehuo.cn/index.ac','1','31','./public/attachment/201602/29/02/56d33e736acfc.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('159','360淘金','20','https://t.360.cn/','1','32','./public/attachment/201602/29/02/56d33ed05b8d8.png','','0','1');
INSERT INTO `%DB_PREFIX%link` VALUES ('160','蚂蚁天使','20','https://www.mayiangel.com/index.htm','1','33','./public/attachment/201602/29/02/56d33f1440d99.png','','0','1');
DROP TABLE IF EXISTS `%DB_PREFIX%link_group`;
CREATE TABLE `%DB_PREFIX%link_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '友情链接分组名称',
  `sort` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 文字描述 1图片描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='//链接组';
INSERT INTO `%DB_PREFIX%link_group` VALUES ('14','友情链接','1','1','0');
INSERT INTO `%DB_PREFIX%link_group` VALUES ('18','产品众筹','2','1','1');
INSERT INTO `%DB_PREFIX%link_group` VALUES ('19','股权众筹','3','1','1');
INSERT INTO `%DB_PREFIX%link_group` VALUES ('20','其他众筹','4','1','1');
INSERT INTO `%DB_PREFIX%link_group` VALUES ('21','风投在线','5','1','1');
DROP TABLE IF EXISTS `%DB_PREFIX%log`;
CREATE TABLE `%DB_PREFIX%log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin` int(11) NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  `log_status` tinyint(1) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2545 DEFAULT CHARSET=utf8 COMMENT='//记录';
INSERT INTO `%DB_PREFIX%log` VALUES ('2380','发起项目更新成功','1417975607','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2381','TPL_MAIL_INVESTOR_PAY_STATUS更新成功','1422475811','1','127.0.0.1','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2382','admin登录成功','1434136365','1','127.0.0.1','1','Public','do_login');
INSERT INTO `%DB_PREFIX%log` VALUES ('2383','我有项目更新成功','1434136446','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2384','合作方式更新成功','1434136453','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2385','媒体报道更新成功','1434136459','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2386','活动报名更新成功','1434136466','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2387','新手帮助更新成功','1434136474','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2388','关于我们更新成功','1434136480','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2389','站点申明更新成功','1434136488','1','127.0.0.1','1','ArticleCate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2390','发起项目更新成功','1434136507','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2391','会员注册更新成功','1434136523','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2392','版权申明更新成功','1434136537','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2393','项目规范更新成功','1434136547','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2394','【媒体报道】众筹平台助“印象”打造专业川菜连锁品牌更新成功','1434136558','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2395','使用条款更新成功','1434136572','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2396','【活动报名】10.21第一期天使合投SHOW热辣登场！更新成功','1434136582','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2397','常见问题更新成功','1434136594','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2398','联系方式更新成功','1434136603','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2399','关于我们更新成功','1434136614','1','127.0.0.1','1','Article','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2400','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！更新成功','1434136659','1','127.0.0.1','1','Deal','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2401','短片电影《Blind Love》更新成功','1434136671','1','127.0.0.1','1','Deal','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2402','拥有自己的咖啡馆更新成功','1434136682','1','127.0.0.1','1','Deal','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2403','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持更新成功','1434136697','1','127.0.0.1','1','Deal','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2404','58_is_special启用成功','1434136705','1','127.0.0.1','1','Deal','toogle_status');
INSERT INTO `%DB_PREFIX%log` VALUES ('2405','56_is_special启用成功','1434136708','1','127.0.0.1','1','Deal','toogle_status');
INSERT INTO `%DB_PREFIX%log` VALUES ('2406','admin登录成功','1438559152','1','127.0.0.1','1','Public','do_login');
INSERT INTO `%DB_PREFIX%log` VALUES ('2407','admin登录成功','1450915035','1','127.0.0.1','1','Public','do_login');
INSERT INTO `%DB_PREFIX%log` VALUES ('2408','admin登录成功','1453143765','1','::1','1','Public','do_login');
INSERT INTO `%DB_PREFIX%log` VALUES ('2409','测试管理员更新成功','1453143872','1','::1','1','Role','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2410','测试管理员更新成功','1453143896','1','::1','1','Role','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2411','更新系统配置','1453144048','1','::1','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2412','测试管理员更新成功','1453144423','1','::1','1','Role','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2413','测试管理员更新成功','1453144510','1','::1','1','Role','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2414','测试管理员更新成功','1453145592','1','::1','1','Role','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2415','test添加成功','1453145611','1','::1','1','Admin','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2416','test登录成功','1453145662','4','::1','1','Public','do_login');
INSERT INTO `%DB_PREFIX%log` VALUES ('2417','测试管理员更新成功','1453145703','1','::1','1','Role','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2418','更新系统配置','1455585763','1','127.0.0.1','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2419','更新系统配置','1455585785','1','127.0.0.1','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2420','更新系统配置','1455585798','1','127.0.0.1','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2421','更新系统配置','1455585864','1','127.0.0.1','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2422','更新系统配置','1455585895','1','127.0.0.1','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2423','所有项目更新成功','1455586841','1','127.0.0.1','1','Nav','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2424','产品众筹更新成功','1455586862','1','127.0.0.1','1','Nav','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2425','公益模块更新成功','1455586877','1','127.0.0.1','1','Nav','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2426','股权众筹更新成功','1455586942','1','127.0.0.1','1','Nav','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2427','经典项目更新成功','1455586973','1','127.0.0.1','1','Nav','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2428','股权交易添加成功','1455587010','1','127.0.0.1','1','Nav','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2429','积分商城添加成功','1455587152','1','127.0.0.1','1','Nav','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2430','动态最新添加成功','1455587166','1','127.0.0.1','1','Nav','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2431','动态最新彻底删除成功','1455587206','1','127.0.0.1','1','Nav','foreverdelete');
INSERT INTO `%DB_PREFIX%log` VALUES ('2432','新手帮助添加成功','1455587237','1','127.0.0.1','1','Nav','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2433','天使投资人添加成功','1455587292','1','127.0.0.1','1','Nav','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2434','股权交易排序修改成功','1455587352','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2435','文章更新成功','1455587390','1','127.0.0.1','1','Nav','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2436','路演资讯排序修改成功','1455587417','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2437','积分商城排序修改成功','1455587421','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2438','天使投资人排序修改成功','1455587424','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2439','新手帮助排序修改成功','1455587431','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2440','最新动态排序修改成功','1455587431','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2441','最新动态排序修改成功','1455587437','1','127.0.0.1','1','Nav','set_sort');
INSERT INTO `%DB_PREFIX%log` VALUES ('2442','admin登录成功','1456649913','1','124.202.243.78','1','Public','do_login');
INSERT INTO `%DB_PREFIX%log` VALUES ('2443','更新系统配置','1456649955','1','124.202.243.78','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2444','更新系统配置','1456650012','1','124.202.243.78','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2445','更新系统配置','1456650021','1','124.202.243.78','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2446','更新系统配置','1456650050','1','124.202.243.78','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2447','更新系统配置','1456650063','1','124.202.243.78','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2448','官方微博更新成功','1456650099','1','124.202.243.78','1','Help','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2449','彻底删除成功','1456650145','1','124.202.243.78','1','MAdv','foreverdelete');
INSERT INTO `%DB_PREFIX%log` VALUES ('2450','创业者的曙光添加成功','1456650281','1','124.202.243.78','1','MAdv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2451','VK维客添加成功','1456650302','1','124.202.243.78','1','MAdv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2452','vitakung添加成功','1456650404','1','124.202.243.78','1','User','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2453','方维众筹更新成功','1456650637','1','124.202.243.78','1','IndexImage','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2454','方维众筹更新成功','1456650648','1','124.202.243.78','1','IndexImage','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2455','1添加成功','1456650707','1','124.202.243.78','1','IndexImage','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2456','2添加成功','1456650752','1','124.202.243.78','1','IndexImage','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2457','2更新成功','1456650762','1','124.202.243.78','1','IndexImage','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2458','3添加成功','1456650802','1','124.202.243.78','1','IndexImage','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2459','3更新成功','1456650815','1','124.202.243.78','1','IndexImage','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2460','方维众筹更新成功','1456650934','1','124.202.243.78','1','IndexImage','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2461','方维众筹更新成功','1456651001','1','124.202.243.78','1','IndexImage','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2462','TPL_SMS_DEAL_FAIL更新成功','1456651056','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2463','TPL_SMS_DEAL_FAIL更新成功','1456651057','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2464','TPL_SMS_DEAL_FAIL更新成功','1456651059','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2465','TPL_SMS_DEAL_FAIL更新成功','1456651061','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2466','TPL_SMS_USER_VERIFY更新成功','1456651068','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2467','TPL_SMS_USER_S更新成功','1456651077','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2468','TPL_SMS_USER_F更新成功','1456651083','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2469','TPL_SMS_VERIFY_CODE更新成功','1456651090','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2470','TPL_SMS_DEAL_SUCCESS更新成功','1456651098','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2471','TPL_SMS_INVESTOR_PAY_STATUS更新成功','1456651105','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2472','TPL_SMS_INVESTOR_STATUS更新成功','1456651112','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2473','TPL_SMS_INVESTOR_PAID_STATUS更新成功','1456651118','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2474','TPL_SMS_ZC_STATUS更新成功','1456651128','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2475','TPL_SMS_TZT_VERIFY_CODE更新成功','1456651152','1','124.202.243.78','1','MsgTemplate','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2476','smtp.163.com添加成功','1456651209','1','124.202.243.78','1','MailServer','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2477','短信宝平台(<a href=http://www.smsbao.com/reg?r=10027 target=_blank>马上注册</a>)安装成功','1456651219','1','124.202.243.78','1','Sms','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2478','短信宝平台(<a href=http://www.smsbao.com/reg?r=10027 target=_blank>马上注册</a>)启用成功','1456651223','1','124.202.243.78','1','Sms','set_effect');
INSERT INTO `%DB_PREFIX%log` VALUES ('2479','更新系统配置','1456651396','1','124.193.88.122','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2480','短信宝平台(<a href=http://www.smsbao.com/reg?r=10027 target=_blank>马上注册</a>)更新成功','1456651523','1','124.193.88.122','1','Sms','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2481','短信宝平台(<a href=http://www.smsbao.com/reg?r=10027 target=_blank>马上注册</a>)更新成功','1456651532','1','124.193.88.122','1','Sms','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2482','产品众筹广告页面添加成功','1456651774','1','124.193.88.122','1','Adv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2483','产品众筹广告页面更新成功','1456651818','1','60.253.251.254','1','Adv','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2484','产品众筹广告2添加成功','1456651881','1','60.253.251.254','1','Adv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2485','股权众筹广告页面添加成功','1456651955','1','60.253.251.254','1','Adv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2486','帮助列表广告添加成功','1456652107','1','124.193.88.122','1','Adv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2487','帮助列表广告更新成功','1456652162','1','124.202.243.78','1','Adv','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2488','动态广告添加成功','1456652264','1','124.193.88.122','1','Adv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2489','首页广告添加成功','1456652418','1','60.253.251.254','1','Adv','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2490','更新系统配置','1456652476','1','124.202.243.78','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2491','保护梁子湖，我们在行动。更新成功','1456653032','1','124.202.243.78','1','DealSubmit','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2492','扶贫添加成功','1456653196','1','220.113.12.3','1','DealSelflessCate','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2493','儿童添加成功','1456653203','1','220.113.12.3','1','DealSelflessCate','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2494','筹建康平羽毛球馆，为羽毛球爱好者建一个温暖的家！更新成功','1456653455','1','60.253.251.254','1','DealSelflessSubmit','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2495','产品众筹添加成功','1456653517','1','60.253.251.254','1','LinkGroup','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2496','股权众筹添加成功','1456653526','1','124.202.243.78','1','LinkGroup','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2497','其他众筹添加成功','1456653624','1','124.202.243.78','1','LinkGroup','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2498','风投在线添加成功','1456653637','1','60.253.251.254','1','LinkGroup','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2499','猫力中国添加成功','1456653663','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2500','VK维客添加成功','1456653683','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2501','KK大公馆添加成功','1456653703','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2502','宫网添加成功','1456653720','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2503','猫力网添加成功','1456653752','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2504','qodo取道文化添加成功','1456653780','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2505','VITAGONG宫伟添加成功','1456653835','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2506','MW猫力珠宝添加成功','1456653875','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2507','qodo取道中国添加成功','1456653898','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2508','36氪股权众筹添加成功','1456654193','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2509','股权众筹更新成功','1456654216','1','124.193.88.122','1','LinkGroup','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2510','36氪股权众筹更新成功','1456654233','1','124.193.88.122','1','Link','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2511','风投在线更新成功','1456654272','1','60.253.251.254','1','LinkGroup','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2512','软银中国添加成功','1456654318','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2513','纪源资本添加成功','1456654352','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2514','红杉资本添加成功','1456654386','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2515','经纬中国添加成功','1456654426','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2516','IDG添加成功','1456654457','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2517','GOBI添加成功','1456654492','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2518','真格基金添加成功','1456654553','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2519','京东金融添加成功','1456654636','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2520','天使客添加成功','1456654718','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2521','天使街添加成功','1456654799','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2522','企e融添加成功','1456654895','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2523','融e帮添加成功','1456654969','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2524','第五创添加成功','1456655021','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2525','众筹客添加成功','1456655227','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2526','产品众筹更新成功','1456655242','1','124.193.88.122','1','LinkGroup','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2527','淘宝众筹添加成功','1456655326','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2528','众筹网添加成功','1456655365','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2529','众筹网更新成功','1456655414','1','60.253.251.254','1','Link','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2530','其他众筹更新成功','1456655535','1','60.253.251.254','1','LinkGroup','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2531','汇梦公社添加成功','1456655577','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2532','咱们众筹添加成功','1456655653','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2533','大家投添加成功','1456655747','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2534','大家筹添加成功','1456655794','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2535','人人合伙添加成功','1456655860','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2536','360淘金添加成功','1456655954','1','60.253.251.254','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2537','蚂蚁天使添加成功','1456656021','1','124.193.88.122','1','Link','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2538','1456651606删除成功','1456656061','1','124.193.88.122','1','Database','delete');
INSERT INTO `%DB_PREFIX%log` VALUES ('2539','更新系统配置','1456656124','1','60.253.251.254','1','Conf','update');
INSERT INTO `%DB_PREFIX%log` VALUES ('2540','互联网+添加成功','1456656307','1','60.253.251.254','1','DealInvestorCate','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2541','实体店铺添加成功','1456656315','1','60.253.251.254','1','DealInvestorCate','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2542','影视项目添加成功','1456656332','1','60.253.251.254','1','DealInvestorCate','insert');
INSERT INTO `%DB_PREFIX%log` VALUES ('2543','邦美智洗洗衣店O2O智能管理系统更新成功','1456656735','1','60.253.251.254','1','DealInvestorSubmit','update_investor');
INSERT INTO `%DB_PREFIX%log` VALUES ('2544','admin密码修改成功','1456656848','1','60.253.251.254','1','Index','do_change_password');
DROP TABLE IF EXISTS `%DB_PREFIX%m_adv`;
CREATE TABLE `%DB_PREFIX%m_adv` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `img` varchar(255) DEFAULT '',
  `page` varchar(20) DEFAULT '',
  `type` tinyint(1) DEFAULT '0' COMMENT '1.标签集,2.url地址,3.分类排行,4.最亮达人,5.搜索发现,6.一起拍,7.热门单品排行,8.直接显示某个分享',
  `data` text,
  `sort` smallint(5) DEFAULT '10',
  `status` tinyint(1) DEFAULT '1',
  `open_url_type` int(11) DEFAULT '0' COMMENT '0:使用内置浏览器打开url;1:使用外置浏览器打开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%m_adv` VALUES ('25','VK维客','./public/attachment/201602/29/01/56d328bd3d090.jpg','top','1','','2','1','0');
INSERT INTO `%DB_PREFIX%m_adv` VALUES ('24','创业者的曙光','./public/attachment/201602/29/01/56d328a87de29.jpg','top','1','','1','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%m_config`;
CREATE TABLE `%DB_PREFIX%m_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `val` text,
  `type` tinyint(1) NOT NULL,
  `sort` int(11) DEFAULT '0',
  `value_scope` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%m_config` VALUES ('10','kf_phone','客服电话','010-56267773','0','1','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('11','kf_email','客服邮箱','462414875@qq.com','0','2','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('29','ios_upgrade','ios版本升级内容','','3','9','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('16','page_size','分页大小','10','0','10','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('17','about_info','关于我们(填文章ID)','','0','3','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('18','program_title','程序标题名称','VK维客众筹','0','0','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('22','android_version','android版本号(yyyymmddnn)','','0','4','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('23','android_filename','android下载包名(放程序根目录下)','','0','5','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('24','ios_version','ios版本号(yyyymmddnn)','','0','7','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('25','ios_down_url','ios下载地址(appstore连接地址)','','0','8','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('28','android_upgrade','android版本升级内容','修复bug','3','6','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('30','article_cate_id','文章分类ID','','0','11','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('31','android_forced_upgrade','android是否强制升级(0:否;1:是)','1','0','0','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('32','ios_forced_upgrade','ios是否强制升级(0:否;1:是)','1','0','0','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('35','logo','系统LOGO','','2','1','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('33','index_adv_num','首页广告数','5','0','33','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('34','index_pro_num','首页推荐商品数','0','0','34','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('36','wx_appid','微信APPID','','0','36','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('37','wx_secrit','微信SECRIT','','0','37','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('38','sina_app_key','新浪APP_KEY','','0','38','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('39','sina_app_secret','新浪APP_SECRET','','0','39','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('40','sina_bind_url','新浪回调地址','','0','40','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('41','qq_app_key','QQ登录APP_KEY','','0','41','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('42','qq_app_secret','QQ登录APP_SECRET','','0','42','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('43','wx_app_key','微信(分享)appkey','','0','43','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('44','wx_app_secret','微信(分享)appSecret','','0','44','');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('45','wx_controll','一站式登录方式','0','4','45','0,1');
INSERT INTO `%DB_PREFIX%m_config` VALUES ('46','ios_check_version','ios审核版本号(审核中填写)','','0','9','');
