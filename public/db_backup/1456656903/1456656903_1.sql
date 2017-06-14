-- fanwe SQL Dump Program
-- Microsoft-IIS/6.0
-- 
-- DATE : 2016-02-29 02:55:03
-- MYSQL SERVER VERSION : 5.1.71-community
-- PHP VERSION : cgi-fcgi
-- Vol : 1


DROP TABLE IF EXISTS `%DB_PREFIX%admin`;
CREATE TABLE `%DB_PREFIX%admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_adm_name` (`adm_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='//管理员';
INSERT INTO `%DB_PREFIX%admin` VALUES ('1','admin','f6fdffe48c908deb0f4c3bd36c032e72','1','0','4','1456649913','124.202.243.78');
INSERT INTO `%DB_PREFIX%admin` VALUES ('4','test','098f6bcd4621d373cade4e832627b4f6','1','0','4','1453145662','::1');
DROP TABLE IF EXISTS `%DB_PREFIX%adv`;
CREATE TABLE `%DB_PREFIX%adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tmpl` varchar(255) NOT NULL,
  `adv_id` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_table` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tmpl` (`tmpl`),
  KEY `adv_id` (`adv_id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_table` (`rel_table`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='//广告位';
INSERT INTO `%DB_PREFIX%adv` VALUES ('44','fanwe_1','deals_top','<div style=\"text-align:center;\">\r\n	<img src=\"./public/attachment/201602/29/01/56d32e7caf79e.jpg\" alt=\"\" width=\"1520\" height=\"277\" title=\"\" align=\"\" /><br />\r\n</div>','1','产品众筹广告页面','0','');
INSERT INTO `%DB_PREFIX%adv` VALUES ('45','fanwe_1','deals_bottom','<img src=\"./public/attachment/201602/29/01/56d32edc94c5f.jpg\" alt=\"\" width=\"1440\" height=\"263\" title=\"\" align=\"\" />','1','产品众筹广告2','0','');
INSERT INTO `%DB_PREFIX%adv` VALUES ('46','fanwe_1','deal_investor_show_bottom','<img src=\"./public/attachment/201602/29/01/56d32f283d090.png\" alt=\"\" width=\"1440\" height=\"263\" title=\"\" align=\"\" />','1','股权众筹广告页面','0','');
INSERT INTO `%DB_PREFIX%adv` VALUES ('47','fanwe_1','faq_index_top','<div style=\"text-align:center;\">\r\n	<img src=\"./public/attachment/201602/29/01/56d32ff476417.jpg\" alt=\"\" width=\"1440\" height=\"512\" title=\"\" align=\"\" /><br />\r\n</div>','1','帮助列表广告','0','');
INSERT INTO `%DB_PREFIX%adv` VALUES ('48','fanwe_1','news_top','<img src=\"./public/attachment/201602/29/01/56d330605b8d8.jpg\" alt=\"\" width=\"1440\" height=\"450\" title=\"\" align=\"\" />','1','动态广告','0','');
INSERT INTO `%DB_PREFIX%adv` VALUES ('49','fanwe_1','index_top','<div style=\"text-align:center;\">\r\n	<img src=\"./public/attachment/201602/29/01/56d330f64c4b4.jpg\" alt=\"\" />\r\n</div>','1','首页广告','0','');
DROP TABLE IF EXISTS `%DB_PREFIX%api_login`;
CREATE TABLE `%DB_PREFIX%api_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bicon` varchar(255) NOT NULL,
  `is_weibo` tinyint(1) NOT NULL,
  `dispname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='// 登录接口';
INSERT INTO `%DB_PREFIX%api_login` VALUES ('13','新浪api登录接口','a:3:{s:7:\"app_key\";s:0:\"\";s:10:\"app_secret\";s:0:\"\";s:7:\"app_url\";s:0:\"\";}','Sina','./public/attachment/201210/13/17/50792e5bbc901.gif','./public/attachment/201210/13/16/5079277a72c9d.gif','1','新浪微博');
DROP TABLE IF EXISTS `%DB_PREFIX%article`;
CREATE TABLE `%DB_PREFIX%article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT ' 文章内容',
  `cate_id` int(11) NOT NULL COMMENT '文章分类ID',
  `create_time` int(11) NOT NULL COMMENT '发表时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `add_admin_id` int(11) NOT NULL COMMENT '发布人(管理员ID)',
  `is_effect` tinyint(4) NOT NULL COMMENT '有效性标识',
  `rel_url` varchar(255) NOT NULL COMMENT '自动跳转的外链',
  `update_admin_id` int(11) NOT NULL COMMENT '更新人(管理员ID)',
  `is_delete` tinyint(4) NOT NULL COMMENT '删除标识',
  `click_count` int(11) NOT NULL COMMENT '点击数',
  `sort` int(11) NOT NULL COMMENT '排序 由大到小',
  `seo_title` text NOT NULL COMMENT '自定义seo页面标题',
  `seo_keyword` text NOT NULL COMMENT '自定义seo页面keyword',
  `seo_description` text NOT NULL COMMENT '自定义seo页面标述',
  `uname` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `is_week` tinyint(1) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `icon` varchar(255) NOT NULL COMMENT '展示图表',
  `writer` varchar(255) NOT NULL COMMENT '发布者',
  `tags` varchar(255) NOT NULL COMMENT '标签',
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `create_time` (`create_time`),
  KEY `update_time` (`update_time`),
  KEY `click_count` (`click_count`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='//文章列表';
INSERT INTO `%DB_PREFIX%article` VALUES ('68','关于我们','关于方维众筹 <br />\r\n<br />\r\n<p>\r\n	众筹，译自国外crowdfunding一词，即大众筹资或群众筹资。是指用团购+预购的形式，向网友募集项目资金的模式。众筹利用互联网和SNS传播的特性，让许多有梦想的人可以向公众展示自己的创意，发起项目争取别人的支持与帮助，进而获得所需要的援助，支持者则会获得实物、服务等不同形式的回报。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n众筹是一个协助亲们发起创意、梦想的平台，不论你是学生、白领、艺术家、明星，如果你有一个想完成的计划（例如：电影、音乐、动漫、设计、公益等），你可以在此发起项目向大家展示你的计划，并邀请喜欢你的计划的人以资金支持你。如果你愿意帮助别人，支持别人的梦想，你可以在众筹浏览到各行各业的人发起的项目计划，也可以成为发起人的梦想合伙人，当你们一起见证项目成功后，你还会获得发起人感谢你支持的回报。<br />\r\n<br />','22','1413251192','1434136614','0','1','','0','0','0','1','众筹，译自国外crowdfunding一词，即大众筹资或群众筹资。','方维系统 众筹网站 方维众筹','众筹，译自国外crowdfunding一词，即大众筹资或群众筹资。','','','','1','1','','方维众筹','关于');
INSERT INTO `%DB_PREFIX%article` VALUES ('69','联系方式','<img src=\"http://www.fanwe.com/app/Tpl/new/coupon/images/index_end_4.gif\" /> \r\n<div class=\"_link_1\">\r\n	<p class=\"shouqian\">\r\n		<span><img src=\"http://www.fanwe.com/app/Tpl/new/coupon/images/index_end_1.gif\" /></span>&nbsp;&nbsp;<span>福州市台江区八一七中路群升国际E区</span>\r\n	</p>\r\n	<p class=\"lianxi_1\">\r\n		<span><img src=\"http://www.fanwe.com/app/Tpl/new/coupon/images/index_end_2.gif\" /></span>&nbsp;&nbsp;<span>售前咨询（09:00-18:00）</span> 400-600-5505 0591-88600697\r\n	</p>\r\n	<p class=\"lianxi_1\">\r\n		QQ:800005515&nbsp;\r\n	</p>\r\n</div>','22','1413251436','1434136603','0','1','','0','0','0','2','','','','','','','1','1','','方维众筹','联系');
INSERT INTO `%DB_PREFIX%article` VALUES ('72','常见问题','','24','1413338371','1434136594','0','1','http://t2.fanwe.net:107/zc_svn/index.php?ctl=faq','0','0','0','5','','','','','','','1','1','','方维众筹','问题');
INSERT INTO `%DB_PREFIX%article` VALUES ('77','项目规范','<b>项目规范</b><br />\r\n<br />\r\n本众筹系统是中国最专业的众筹系统服务提供商，帮您在一天内快速搭建众筹平台。<br />\r\n<br />\r\n系统咨询热线： <br />\r\n<br />\r\n以下是众筹网站发布项目的基本要求，不合要求的项目，将会被拒绝或删除。如果你有疑问，可以通过邮件或电话联系我们。 <br />\r\n<br />\r\n<br />\r\n附注：某些规范会随着时间而更新或者调整，会导致一些旧项目并不能完全符合最新规范。<br />\r\n<br />\r\n项目发布团队资格：<br />\r\n&nbsp;&nbsp;&nbsp; （团队中必须有至少一名成员满足以下条件）<br />\r\n&nbsp;&nbsp;&nbsp; 18周岁以上;<br />\r\n&nbsp;&nbsp;&nbsp; 中华人民共和国公民;<br />\r\n&nbsp;&nbsp;&nbsp; 拥有能够在中国地区接收人民币汇款的银行卡或者支付宝、财付通账户;<br />\r\n&nbsp;&nbsp;&nbsp; 提供必要的身份认证和资质认证，根据项目内容，有可能包括但不限于：身份证，护照，学历证明等;<br />\r\n&nbsp;&nbsp;&nbsp; 其他跟项目发布、执行需求、渠道销售相关的必须条件。<br />\r\n项目发布：<br />\r\n&nbsp;&nbsp;&nbsp; 根据相关法律法规，项目发布申请提交后，须经过众筹网站工作人员审核后才能发布;<br />\r\n&nbsp;&nbsp;&nbsp; 根据项目的内容，众筹网站会要求项目发布团队提供相关材料，证明项目的可行性，以及项目发布团队的执行能力;<br />\r\n&nbsp;&nbsp;&nbsp; 众筹网站对提交上线审核的项目是否拥有上线资格具有最终决定权;<br />\r\n&nbsp;&nbsp;&nbsp; 项目在众筹网站上线预售期间，不能在中国大陆其他相似平台（包括但不限于众筹网站、电商网站、及其他形式网店等）同时发布。一经发现将立即下线处 理，其项目上线期间所获得的金额将被立即退回给预订用户在众筹网站上的账户中。<br />\r\n<br />\r\n项目内容规范（不符合以下内容规范的项目将被退回）：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 1. 只允许尚未正式对外发布的项目在众筹网站上线。项目在众筹网站上线之前，不能在中国大陆其他相似平台（包括但不限于众筹网站、电商网站、及其 他形式网店等）或媒体发布。<br />\r\n&nbsp;&nbsp;&nbsp; 2. 项目必须为智能项目。智能项目的定义为：设备必须可采集数据、联网联动，并提供自动化的服务。单纯有设计感的非智能项目暂时无法通过审核。<br />\r\n&nbsp;&nbsp;&nbsp; 3. 项目发布方必须在项目上线前提供无bug的实物试产样机，由众筹网站工作人员进行盲测确保没有问题才能正式上线。<br />\r\n&nbsp;&nbsp;&nbsp; 4. 项目内容介绍框架必须包含“项目介绍”、“团队介绍”、“研发进展”等重要板块。<br />\r\n&nbsp;&nbsp;&nbsp; 5. 项目软硬件设计必须完整、合理、具有可行性；有完整的计划和执行能力，且图片、视频不能借用或盗用非自行拍摄的内容。<br />\r\n&nbsp;&nbsp;&nbsp; 6. 项目发布团队必须有明确的生产计划及售后服务计划，尚不确定是否会量产的项目不符合首次发布的标准皆不能上线。<br />\r\n&nbsp;&nbsp;&nbsp; 7. 提交申请的项目必须能符合如下分类：医疗健康、家居生活、出行定位、影音娱乐、科技外设。<br />\r\n&nbsp;&nbsp;&nbsp; 8. 以下类别的项目或内容将不被允许在此发布或作为给预订用户的附加回报：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 烟、酒相关<br />\r\n&nbsp;&nbsp;&nbsp; 洗浴、美容或化妆项目相关<br />\r\n&nbsp;&nbsp;&nbsp; 毒品、类似毒品的物质、吸毒用具、烟等相关<br />\r\n&nbsp;&nbsp;&nbsp; 枪支、武器和刀具相关<br />\r\n&nbsp;&nbsp;&nbsp; 营养补充剂相关<br />\r\n&nbsp;&nbsp;&nbsp; 色情、保健、性用品内容相关<br />\r\n&nbsp;&nbsp;&nbsp; 房地产相关<br />\r\n&nbsp;&nbsp;&nbsp; 饮食类相关<br />\r\n&nbsp;&nbsp;&nbsp; 财政奖励(所有权、利润份额、还款贷款等)<br />\r\n&nbsp;&nbsp;&nbsp; 多级直销和传销类相关<br />\r\n&nbsp;&nbsp;&nbsp; 令人反感的内容(仇恨言论、不适当内容等)<br />\r\n&nbsp;&nbsp;&nbsp; 支持或反对政治党派的项目<br />\r\n&nbsp;&nbsp;&nbsp; 推广或美化暴力行为的项目<br />\r\n&nbsp;&nbsp;&nbsp; 对奖、彩票和抽奖活动相关<br />\r\n&nbsp;&nbsp;&nbsp; 股权、债券、分红、利息等形式的附加回报<br />\r\n&nbsp;&nbsp;&nbsp; 与首发项目无关的附加回报<br />\r\n&nbsp;&nbsp;&nbsp; 以其他无可行、不合理的承诺作为附加回报<br />\r\n举报及推荐标准：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 举报：不符合《项目内容规范》<br />\r\n&nbsp;&nbsp;&nbsp; 合格：符合《项目内容规范》<br />\r\n&nbsp;&nbsp;&nbsp; 推荐：合格并且满足下列标准中的任意1-3项（含3项），视为推荐<br />\r\n&nbsp;&nbsp;&nbsp; 强烈推荐：合格并且满足下列标准中的任意3项以上，视为强烈推荐<br />\r\n&nbsp;&nbsp;&nbsp; 1. 项目定位清晰，功能逻辑性强、完整且条理清晰、团队对研发和生产有完整的计划和管控能力，有相关的图片和视频（图片、视频不能借用或盗用非 本人/公司拍摄的）<br />\r\n&nbsp;&nbsp;&nbsp; 2. 项目符合时下趋势、有热点，具备可传播性<br />\r\n&nbsp;&nbsp;&nbsp; 3. 项目本身有创意、创新；非山寨、抄袭、跟风；市面上无同类相似项目<br />\r\n&nbsp;&nbsp;&nbsp; 4. 项目设计感好，有品质，符合大众审美喜好的要求<br />\r\n&nbsp;&nbsp;&nbsp; 5. 项目发布团队有一定的推广渠道、媒体资源、或在公众平台上有一定的影响力<br />\r\n&nbsp;&nbsp;&nbsp; 6. 项目发布团队的话题运营能力出众，与粉丝互动积极正面，能调动起网友的兴趣和参与感<br />\r\n<br />','24','1413588165','1434136547','0','1','','0','0','0','9','','','','','','','1','1','','方维众筹','项目');
INSERT INTO `%DB_PREFIX%article` VALUES ('74','【活动报名】10.21第一期天使合投SHOW热辣登场！','<p>\r\n	本协会精心策划“天使合投SHOW”，期待您的光临！\r\n</p>\r\n<p>\r\n	<strong>活动时间：</strong><span style=\"color:#ff0000;\">2014年10月21日（下周二） 14:00-17:30</span>\r\n</p>\r\n<p>\r\n	<strong>活动地点：</strong>科技园科技大厦B座1层\r\n</p>\r\n<strong>协办及支持单位：</strong>\r\n<p>\r\n	<strong>参与投资机构：</strong>\r\n</p>\r\n<p>\r\n	<strong>活动人数：</strong>50-60人\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong><span style=\"background-color:#ffff00;\">分享嘉宾及主题</span></strong>\r\n</p>\r\n<p>\r\n	<img src=\"./public/attachment/201410/17/16/5440d8025b024.jpg\" alt=\"\" border=\"0\" />\r\n</p>\r\n<br />\r\n<p>\r\n	<strong><span style=\"background-color:#ffff00;\">活动流程：</span></strong>\r\n</p>\r\n<p>\r\n	14:00 活动开始\r\n</p>\r\n<br />\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong><span style=\"background-color:#ffff00;\">报名方法：</span></strong>\r\n</p>\r\n<p>\r\n	邮件： 请注明姓名、机构、职务\r\n</p>\r\n<p>\r\n	电话：方维服务 400-600-5505 请注明姓名、机构、职务\r\n</p>','25','1413506986','1434136582','0','1','','0','0','0','6','','','','','','','1','1','','方维众筹','报名');
INSERT INTO `%DB_PREFIX%article` VALUES ('75','使用条款','使用条款<br />\r\n接受条款<br />\r\n<br />\r\n本站所提供的服务包含众筹网体验和使用、众筹网互联网消息传递服务以及众筹网提供的与众筹网有关的任何其他特色功能、内容或应用程序(合称\"众筹网服务\")。<br />\r\n<br />\r\n无论用户是以\"访客\"(表示用户只是浏览众筹网)还是\"成员\"(表示用户已在众筹网注册并登录)的身份使用众筹网服务，均表示该用户同意遵守本使用协议。<br />\r\n<br />\r\n如 果用户自愿成为众筹网成员并与其他成员交流(包括通过众筹网直接联系或通过众筹网各种服务而连接到的成员)，以及使用众筹网及其各种附加服务，请 务必认真阅读本协议并在注册过程中表明同意接受本协议。本协议的内容包含众筹网关于接受众筹网服务和在众筹网上发布内容的规定、用户使用众筹网服务所享有 的权利、承担的义务和对使用众筹网服务所受的限制、以及众筹网的隐私条款。<br />\r\n<br />\r\n如果用户选择使用某些众筹网服务，可能会收到要求其下载软件或内容的通知，和或要求用户同意附加条款和条件的通知。除非用户选择使用的众筹网服务相关的附加条款和条件另有规定，附加的条款和条件都应被包含于本协议中。<br />\r\n<br />\r\n有权随时修改本协议文本中的任何条款。一旦众筹网对本协议进行修改, 众筹网将会以公告形式发布通知。任何该等修改自发布之日起生效。如果用户在该等修改发布后继续使用众筹网服务，则表示该用户同意遵守对本协议所作出的该等 修改。因此，请用户务必定期查阅本协议，以确保了解所有关于本协议的最新修改。如果用户不同意众筹网对本协议进行的修改，请用户离开众筹网并立即停止使用 众筹网服务。同时，用户还应当删除个人档案并注销成员资格。<br />\r\n<br />\r\n遵守法律<br />\r\n<br />\r\n当使用众筹网服务时，用户同意遵守中华人民共和国 (下称\"中国\")的相关法律法规，包括但不限于《中华人民共和国宪法》、《中华人民共和国合同 法》、《中华人民共和国电信条例》、《互联网信息服务管理办法》、《互联网电子公告服务管理规定》、《中华人民共和国保守国家秘密法》、《全国人民代表大 会常务委员会关于维护互联网安全的决定》、《中华人民共和国计算机信息系统安全保护条例》、《计算机信息网络国际联网安全保护管理办法》、《中华人民共和 国著作权法》及其实施条例、《互联网著作权行政保护办法》等。用户只有在同意遵守所有相关法律法规和本协议时，才有权使用众筹网服务(无论用户是否有意访 问或使用此服务)。请用户仔细阅读本协议并将其妥善保存。<br />\r\n<br />\r\n用户帐号、密码及安全<br />\r\n<br />\r\n用户应提供及时、详尽、准确的个人资 料，并不断及时更新注册时提供的个人资料，保持其详尽、准确。所有用户输入的资料将引用为注册资料。众筹网不对因用户提交的注册信息不真实或未及时准确变 更信息而引起的问题、争议及其后果承担责任。 用户不应将其帐号、密码转让、出借或告知他人，供他人使用。如用户发现帐号遭他人非法使用，应立即通知众筹网。因黑客行为或用户的保管疏忽导致帐号、密码 遭他人非法使用的，众筹网不承担任何责任。<br />\r\n<br />\r\n隐私权政策<br />\r\n<br />\r\n用户提供的注册信息及众筹网保留的用户所有资料将受到中国相关法律法规和众筹网《隐私权政策》的规范。《隐私权政策》构成本协议不可分割的一部分。<br />\r\n<br />\r\n上传内容<br />\r\n<br />\r\n用 户通过任何众筹网提供的服务上传、张贴、发送(通过电子邮件或任何其它方式传送)的文本、文件、图像、照片、视频、声音、音乐、其他创作作品或任 何其他材料(以下简称\"内容\"，包括用户个人的或个人创作的照片、声音、视频等)，无论系公开还是私下传播，均由用户和内容提供者承担责任，众筹网不对该 等内容的正确性、完整性或品质作出任何保证。用户在使用众筹网服务时，可能会接触到令人不快、不适当或令人厌恶之内容，用户需在接受服务前自行做出判断。 在任何情况下，众筹网均不为任何内容负责(包括但不限于任何内容的错误、遗漏、不准确或不真实)，亦不对通过众筹网服务上传、张贴、发送(通过电子邮件或 任何其它方式传送)的内容衍生的任何损失或损害负责。众筹网在管理过程中发现或接到举报并进行初步调查后，有权依法停止任何前述内容的传播并采取进一步行 动，包括但不限于暂停某些用户使用众筹网的全部或部分服务，保存有关记录，并向有关机关报告。<br />\r\n<br />\r\n用户行为<br />\r\n<br />\r\n用户在使用众筹网服务时，必须遵守中华人民共和国相关法律法规的规定，用户保证不会利用众筹网服务进行任何违法或不正当的活动，包括但不限于下列行为：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 上传、展示、张贴或以其它方式传播含有下列内容之一的信息：<br />\r\n&nbsp;&nbsp;&nbsp; 反对宪法及其他法律的基本原则的;<br />\r\n&nbsp;&nbsp;&nbsp; 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的;<br />\r\n&nbsp;&nbsp;&nbsp; 损害国家荣誉和利益的;<br />\r\n&nbsp;&nbsp;&nbsp; 煽动民族仇恨、民族歧视、破坏民族团结的;<br />\r\n&nbsp;&nbsp;&nbsp; 破坏国家宗教政策，宣扬邪教和封建迷信的;<br />\r\n&nbsp;&nbsp;&nbsp; 散布谣言，扰乱社会秩序，破坏社会稳定的;<br />\r\n&nbsp;&nbsp;&nbsp; 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的;<br />\r\n&nbsp;&nbsp;&nbsp; 侮辱或者诽谤他人，侵害他人合法权利的;<br />\r\n&nbsp;&nbsp;&nbsp; 含有虚假、有害、胁迫、侵害他人隐私、骚扰、中伤、粗俗、猥亵、或其它道德上令人反感的内容;<br />\r\n&nbsp;&nbsp;&nbsp; 含有中国法律、法规、规章、条例以及任何具有法律效力的规范所限制或禁止的其它内容的;<br />\r\n&nbsp;&nbsp;&nbsp; 不得为任何非法目的而使用网络服务系统;<br />\r\n&nbsp;&nbsp;&nbsp; 用户同时保证不会利用众筹网服务从事以下活动：<br />\r\n&nbsp;&nbsp;&nbsp; 未经允许，进入计算机信息网络或者使用计算机信息网络资源的;<br />\r\n&nbsp;&nbsp;&nbsp; 未经允许，对计算机信息网络功能进行删除、修改或者增加的;<br />\r\n&nbsp;&nbsp;&nbsp; 未经允许，对进入计算机信息网络中存储、处理或者传输的数据和应用程序进行删除、修改或者增加的;故意制作、传播计算机病毒等破坏性程序的;<br />\r\n&nbsp;&nbsp;&nbsp; 其他危害计算机信息网络安全的行为。<br />\r\n<br />\r\n如用户在使用网络服务时违反任何上述规定，众筹网或经其授权者有权要求该用户改正或直接采取一切必要措施(包括但不限于更改、删除相关内容、暂停或终止相关用户使用众筹网服务)以减轻和消除该用户不当行为造成的影响。<br />\r\n<br />\r\n用户不得对众筹网服务的任何部分或全部以及通过众筹网取得的任何形式的信息，进行复制、拷贝、出售、转售或用于任何其它商业目的。<br />\r\n<br />\r\n用户须对自己在使用众筹网服务过程中的行为承担法律责任。用户承担法律责任的形式包括但不限于：停止侵害行为，向受到侵害者公开赔礼道歉，恢复受到 侵害者的名誉，对受到侵害者进行赔偿。如果众筹网网站因某用户的非法或不当行为受到行政处罚或承担了任何形式的侵权损害赔偿责任，该用户应向众筹网进行赔 偿(不低于众筹网向第三方赔偿的金额)并通过全国性的媒体向众筹网公开赔礼道歉。<br />\r\n<br />\r\n知识产权和其他合法权益(包括但不限于名誉权、商誉等)<br />\r\n<br />\r\n并不对用户发布到众筹网服务中的文本、文件、图像、照片、视频、声音、音乐、其他创作作品或任何其他材料(前文称为\"内容\")拥有任何所有 权。在用户将内容发布到众筹网服务中后，用户将继续对内容享有权利，并且有权选择恰当的方式使用该等内容。如果用户在众筹网服务中或通过众筹网服务展示或 发表任何内容，即表明该用户就此授予众筹网一个有限的许可以使众筹网能够合法使用、修改、复制、传播和出版此类内容。<br />\r\n<br />\r\n用户同意其已在服务所发布的内容，授予众筹网可以免费的、永久有效的、不可撤销的、非独家的、可转授权的、在全球范围内对所发布内容进行使 用、复制、修改、改写、改编、发行、翻译、创造衍生性著作的权利，及/或可以将前述部分或全部内容加以传播、表演、展示，及/或可以将前述部分或全部内容 放入任何现在已知和未来开发出的以任何形式、媒体或科技承载的著作当中。<br />\r\n<br />\r\n用户声明并保证：用户对其在众筹网服务中或通过众筹网服务发布 的内容拥有合法权利;用户在众筹网服务中或通过众筹网服务发布的内容不侵犯任何人的肖 像权、隐私权、著作权、商标权、专利权、及其它合同权利。如因用户在众筹网服务中或通过众筹网服务发布的内容而需向其他任何人支付许可费或其它费用，全部 由该用户承担。<br />\r\n<br />\r\n众筹网服务中包含众筹网提供的内容，包含用户和其他众筹网许可方的内容(下称\"众筹网的内容\")。众筹网的内容受《中华 人民共和国著作权法》、《中 华人民共和国商标法》、《中华人民共和国专利法》、《中华人民共和国反不正当竞争法》和其他相关法律法规的保护，众筹网拥有并保持对众筹网的内容和众筹网 服务的所有权利。<br />\r\n<br />\r\n国际使用之特别警告<br />\r\n<br />\r\n用户已了解国际互联网的无国界性，同意遵守所有关于网上行为、内容的法律法规。用户特别同意遵守有关从中国或用户所在国家或地区输出信息所可能涉及、适用的全部法律法规。<br />\r\n<br />\r\n项目筹款<br />\r\n<br />\r\n是一个让用户(即“项目发起人”)通过提供回报向支持者筹集资金的平台。您作为项目发起人，社会大众可以与您订立合同，在众筹网创建筹款项 目。您作为支持者，可以接受项目发起人和您之间的回报和契约，以赞助项目发起人的筹款项目。众筹网并不是支持者和项目发起人中的任何一方。所有交易仅存在 于用户和用户之间。<br />\r\n<br />\r\n通过众筹网支持项目，您须同意并遵守以下协议，包括如下条款：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 支持者同意接受在其承诺支持某项目时提供付款授权信息 。<br />\r\n&nbsp;&nbsp;&nbsp; 支持者同意众筹网及其合作伙伴授权或保留收费的权利。<br />\r\n&nbsp;&nbsp;&nbsp; 回报预期的完成日期并非约定实现的期限，它仅为项目发起人希望实现的日期。<br />\r\n&nbsp;&nbsp;&nbsp; 为建立良好的信用和名声，项目发起人会尽力依照预期完成日期实现项目。<br />\r\n&nbsp;&nbsp;&nbsp; 对于所有项目，众筹网将提供所有支持者的用户名称和联系方式给于项目发起人。项目成功时，众筹网将额外提供支持者的姓名、联系方式和邮寄地址等信息给于项目发起人。<br />\r\n&nbsp;&nbsp;&nbsp; 项目发起人可以在项目成功后直接向支持者要求额外信息。为了顺利获得回报，支持者须同意在合理期限内提供给项目发起人相关信息。<br />\r\n&nbsp;&nbsp;&nbsp; 如活动难以进行或无法满足回报需求时，项目发起人可应支持者的请求而退款 。<br />\r\n&nbsp;&nbsp;&nbsp; 项目发起人须满足项目成功后支持者的回报需求，或在无法实现的情况下退款。<br />\r\n&nbsp;&nbsp;&nbsp; 众筹网保留随时以任何理由取消项目的权利。<br />\r\n&nbsp;&nbsp;&nbsp; 众筹网有权随时以任何理由拒绝、取消、中断、删除或暂停该项目。众筹网不因该行为承担任何赔偿。众筹网的政策并非评论此类行为的理由。<br />\r\n&nbsp;&nbsp;&nbsp; 在项目成功和获得款项之间可能存在延迟。<br />\r\n<br />\r\n不承担任何相关回报或使用服务产生的损失或亏损。众筹网无义务介入任何用户之间的纠纷，或用户与其他第三方就服务使用方面产生的纠纷。包括但 不限于货物及服务的交付，其他条款、条件、保证或与网站活动相关联的有关陈述。众筹网不负责监督项目的实现与严格执行。您可授权众筹网、其工作人员、职 员、代理人及对损失索赔权的继任者所有已知或未知、公开或秘密的解决争议的方法和服务。<br />\r\n<br />\r\n费用和付款<br />\r\n<br />\r\n加入众筹网免费，但是我们对于某些服务是收取费用的。当您使用某项服务时，您将有机会看到您需要支付费用的项目，费用的变化在我们在网站上为您公开后生效。您负责支付使用该服务产生的所有费用和税款。<br />\r\n<br />\r\n向支持者筹集的资金通过第三方支付平台支付，众筹网对第三方支付平台的支付性能不承担责任。<br />\r\n<br />\r\n赔偿<br />\r\n<br />\r\n由 于用户通过众筹网服务上传、张贴、发送或传播的内容，或因用户与本服务连线，或因用户违反本使用协议，或因用户侵害他人任何权利而导致任何第三人 向众筹网提出赔偿请求，该用户同意赔偿众筹网及其股东、子公司、关联企业、代理人、品牌共有人或其它合作伙伴相应的赔偿金额(包括众筹网支付的律师费 等)，以使众筹网的利益免受损害。<br />\r\n<br />\r\n关于使用及储存的一般措施<br />\r\n<br />\r\n用户承认众筹网有权制定关于服务使用的一般措施及限制，包括 但不限于众筹网服务将保留用户的电子邮件信息、用户所张贴内容或其它上载内容的最长保留 期间、用户一个帐号可收发信息的最大数量、用户帐号当中可收发的单个信息的大小、众筹网服务器为用户分配的最大磁盘空间，以及一定期间内用户使用众筹网服 务的次数上限(及每次使用时间之上限)。通过众筹网服务存储或传送的任何信息、通讯资料和其它任何内容，如被删除或未予储存，用户同意众筹网毋须承担任何 责任。用户亦同意，超过一年未使用的帐号，众筹网有权关闭。众筹网有权依其自行判断和决定，随时变更相关一般措施及限制。<br />\r\n<br />\r\n服务的修改<br />\r\n<br />\r\n用 户了解并同意，无论通知与否，众筹网有权于任何时间暂时或永久修改或终止部分或全部众筹网服务，对此，众筹网对用户和任何第三人均无需承担任何责 任。用户同意，所有上传、张贴、发送到众筹网的内容，众筹网均无保存义务，用户应自行备份。众筹网不对任何内容丢失以及用户因此而遭受的相关损失承担责 任。<br />\r\n<br />\r\n终止服务<br />\r\n<br />\r\n用户同意众筹网可单方面判断并决定，如果用户违反本使用协议或用户长时间未能使用其帐号，众筹网可以终止该 用户的密码、帐号或某些服务的使用，并可 将该用户在众筹网服务中留存的任何内容加以移除或删除。众筹网亦可基于自身考虑，在通知或未通知之情形下，随时对该用户终止部分或全部服务。用户了解并同 意依本使用协议，无需进行事先通知，众筹网可在发现任何不适宜内容时，立即关闭或删除该用户的帐号及其帐号中所有相关信息及文件，并暂时或永久禁止该用户 继续使用前述文件或帐号。<br />\r\n<br />\r\n与广告商进行的交易<br />\r\n<br />\r\n用户通过众筹网服务与广告商进行任何形式的通讯或商业往来，或参与促销活 动(包括相关商品或服务的付款及交付)，以及达成的其它任何条款、条件、保 证或声明，完全是用户与广告商之间的行为。除有关法律法规明文规定要求众筹网承担责任外，用户因前述任何交易、沟通等而遭受的任何性质的损失或损害，均不予负责。<br />\r\n<br />\r\n链接<br />\r\n<br />\r\n用户了解并同意，对于众筹网服务或第三人提供的其它网站或资源的链接是否可以利用，众筹网不予负 责；存在或源于此类网站或资源的任何内容、广告、产 品或其它资料，众筹网亦不保证或负责。因使用或信赖任何此类网站或资源发布的或经由此类网站或资源获得的任何商品、服务、信息，如对用户造成任何损害，不负任何直接或间接责任。<br />\r\n<br />\r\n禁止商业行为<br />\r\n<br />\r\n用户同意不对众筹网服务的任何部分或全部以及用户通过众筹网的服务取得的任何物品、服务、信息等，进行复制、拷贝、出售、转售或用于任何其它商业目的。<br />\r\n<br />\r\n众筹网的专属权利<br />\r\n<br />\r\n用 户了解并同意，众筹网服务及其所使用的相关软件(以下简称\"服务软件\")含有受到相关知识产权及其它法律保护的专有保密资料。用户同时了解并同 意，经由众筹网服务或广告商向用户呈现的赞助广告或信息所包含之内容，亦可能受到著作权、商标、专利等相关法律的保护。未经众筹网或广告商书面授权，用户 不得修改、出售、传播部分或全部服务内容或软件，或加以制作衍生服务或软件。众筹网仅授予用户个人非专属的使用权，用户不得(也不得允许任何第三人)复 制、修改、创作衍生著作，或通过进行还原工程、反向组译及其它方式破译原代码。用户也不得以转让、许可、设定任何担保或其它方式移转服务和软件的任何权 利。用户同意只能通过由众筹网所提供的界面而非任何其它方式使用众筹网服务。<br />\r\n<br />\r\n担保与保证<br />\r\n<br />\r\n众筹网使用协议的任何规定均不 会免除因众筹网造成用户人身伤害或因故意造成用户财产损失而应承担的任何责任。 用户使用众筹网服务的风险由用户个人承担。众筹网对服务不提供任何明示或默示的担保或保证，包括但不限于商业适售性、特定目的的适用性及未侵害他人权利等 的担保或保证。<br />\r\n<br />\r\n众筹网亦不保证以下事项：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 服务将符合用户的要求；<br />\r\n&nbsp;&nbsp;&nbsp; 服务将不受干扰、及时提供、安全可靠或不会出错；<br />\r\n&nbsp;&nbsp;&nbsp; 使用服务取得的结果正确可靠；<br />\r\n&nbsp;&nbsp;&nbsp; 用户经由众筹网服务购买或取得的任何产品、服务、资讯或其它信息将符合用户的期望，且软件中任何错误都将得到更正。<br />\r\n&nbsp;&nbsp;&nbsp; 用户应自行决定使用众筹网服务下载或取得任何资料且自负风险，因任何资料的下载而导致的用户电脑系统损坏或数据流失等后果，由用户自行承担。<br />\r\n&nbsp;&nbsp;&nbsp; 用户经由众筹网服务获知的任何建议或信息(无论书面或口头形式)，除非使用协议有明确规定，将不构成众筹网对用户的任何保证。<br />\r\n<br />\r\n责任限制<br />\r\n<br />\r\n用户明确了解并同意，基于以下原因而造成的任何损失，众筹网均不承担任何直接、间接、附带、特别、衍生性或惩罚性赔偿责任(即使众筹网事先已被告知用户或第三方可能会产生相关损失)：<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 众筹网服务的使用或无法使用；<br />\r\n&nbsp;&nbsp;&nbsp; 通过众筹网服务购买、兑换、交换取得的任何商品、数据、服务、信息，或缔结交易而发生的成本；<br />\r\n&nbsp;&nbsp;&nbsp; 用户的传输或数据遭到未获授权的存取或变造；<br />\r\n&nbsp;&nbsp;&nbsp; 任何第三方在众筹网服务中所作的声明或行为；<br />\r\n&nbsp;&nbsp;&nbsp; 与众筹网服务相关的其它事宜，但本使用协议有明确规定的除外。<br />\r\n<br />\r\n一般性条款<br />\r\n<br />\r\n本使用协议构成用户与众筹网之间的正式协议，并用于规范用户的使用行为。在用户使用众筹网服务、使用第三方提供的内容或软件时，在遵守本协议的基础上，亦应遵守与该等服务、内容、软件有关附加条款及条件。<br />\r\n<br />\r\n本使用协议及用户与众筹网之间的关系，均受到中华人民共和国法律管辖。<br />\r\n<br />\r\n用户与众筹网就服务本身、本使用协议或其它有关事项发生的争议，应通过友好协商解决。协商不成的，应向相关机构提起诉讼。<br />\r\n<br />\r\n众筹网未行使或执行本使用协议设定、赋予的任何权利，不构成对该等权利的放弃。<br />\r\n<br />\r\n本使用协议中的任何条款因与中华人民共和国法律相抵触而无效，并不影响其它条款的效力。<br />\r\n<br />\r\n本使用协议的标题仅供方便阅读而设，如与协议内容存在矛盾，以协议内容为准。<br />\r\n<br />\r\n举报<br />\r\n<br />\r\n如用户发现任何违反本服务条款的情事，请及时通知众筹网。<br />\r\n<br />','21','1413586458','1434136572','0','1','','0','0','0','7','','','','','','','1','1','','方维众筹','条款');
INSERT INTO `%DB_PREFIX%article` VALUES ('76','【媒体报道】众筹平台助“印象”打造专业川菜连锁品牌','三顾茅庐，方识茅庐真印象!目前已经拥有直营店的平台，10月18号将与平台投资人见面。\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img alt=\"\" src=\"http://www.renrentou.com/s/upload/editor/2014/10images/141016102309036310fuv8e.jpg\" style=\"height:427px;width:651px;\" />\r\n</p>\r\n<p>\r\n	<br />\r\n　　融资计划\r\n</p>\r\n<p>\r\n	<br />\r\n　众筹平台的建立，将进一步提高本服务水平\r\n</p>\r\n<p>\r\n	<br />\r\n　　项目特色\r\n</p>\r\n<p>\r\n	<br />\r\n　项目特色信息\r\n</p>\r\n<p>\r\n	<br />\r\n　　项目背景\r\n</p>\r\n<p>\r\n	　跨济南、济区域，并保持良好增长势头。广大爱好美食的投资朋友们，这样好的赚钱投资机会你想拥有吗?赶紧关注众筹平台吧。\r\n</p>\r\n<p>\r\n	<br />\r\n　　市场优势\r\n</p>\r\n<p>\r\n	<br />\r\n　　拥有多年品牌积淀，就餐环境良好好，价格符合大众消费，是商场餐饮业市场中目前仅有的大众定位的川菜连锁品牌。另外，印象中央厨房的可复制性研发，品牌发展及品质保证，开业即火爆，市场潜力巨大。目前，印象已跨济南、济区域，并保持良好增长势头。广大爱好美食的投资朋友们，这样好的赚钱投资机会你想拥有吗?赶紧关注众筹平台吧。\r\n</p>','26','1413586791','1434136558','0','1','','0','0','0','8','','','','','','','1','1','','方维众筹','媒体');
INSERT INTO `%DB_PREFIX%article` VALUES ('78','版权申明','该系统知识产权归我方所有，<span style=\"font-family:\'宋体\';\">未经书面许可，不得以任何形式公布“软件产品”的源码，并不得复制、传播、出售、出租、出借等。</span><!--[if gte mso 9]><![endif]-->','21','1413588553','1434136537','0','1','','0','0','0','10','','','','','','','1','1','','方维众筹','版权');
INSERT INTO `%DB_PREFIX%article` VALUES ('79','会员注册','','28','1413588976','1434136523','0','1','user-register','0','0','0','11','','','','','','','1','1','','方维众筹','会员');
INSERT INTO `%DB_PREFIX%article` VALUES ('80','发起项目','','28','1413589126','1434136507','0','1','/zc_svn/project','0','0','0','12','','','','','','','1','1','./public/attachment/201412/08/10/548507b508df3.jpg','方维众筹','热门');
DROP TABLE IF EXISTS `%DB_PREFIX%article_cate`;
CREATE TABLE `%DB_PREFIX%article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '分类名称',
  `brief` varchar(255) NOT NULL COMMENT '分类简介(备用字段)',
  `pid` int(11) NOT NULL COMMENT '父ID，程序分类可分二级',
  `is_effect` tinyint(4) NOT NULL COMMENT '有效性标识',
  `is_delete` tinyint(4) NOT NULL COMMENT '删除标识',
  `type_id` tinyint(1) NOT NULL COMMENT '型 0:普通文章（可通前台分类列表查找到） 1.帮助文章（用于前台页面底部的站点帮助） 2.公告文章（用于前台页面公告模块的调用） 3.系统文章（自定义的一些文章，需要前台自定义一些入口链接到该文章） 所属该分类的所有文章类型与分类一致',
  `sort` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL COMMENT 'SEO标题',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `type_id` (`type_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='//文章分类';
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('21','站点申明','','0','1','0','1','10','zdsm');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('22','关于我们','','0','1','0','1','0','gywm');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('23','众筹简介','众筹简介','0','1','1','0','3','');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('24','新手帮助','','0','1','0','1','1','xsbz');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('25','活动报名','','0','1','0','0','5','hdbm');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('26','媒体报道','','0','1','0','0','6','mtbd');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('27','合作方式','','0','1','0','1','7','hzfs');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('28','我有项目','','0','1','0','1','8','wyxm');
DROP TABLE IF EXISTS `%DB_PREFIX%auto_cache`;
CREATE TABLE `%DB_PREFIX%auto_cache` (
  `cache_key` varchar(100) NOT NULL,
  `cache_type` varchar(100) NOT NULL,
  `cache_data` text NOT NULL,
  `cache_time` int(11) NOT NULL,
  PRIMARY KEY (`cache_key`,`cache_type`),
  KEY `cache_type` (`cache_type`),
  KEY `cache_key` (`cache_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='//自动缓存';
DROP TABLE IF EXISTS `%DB_PREFIX%bank`;
CREATE TABLE `%DB_PREFIX%bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '银行名称',
  `is_rec` tinyint(1) NOT NULL COMMENT '是否推荐',
  `day` int(11) NOT NULL COMMENT '处理时间',
  `sort` int(11) NOT NULL COMMENT '银行排序',
  `icon` varchar(255) DEFAULT NULL COMMENT '图标',
  `is_support_tzt` tinyint(1) NOT NULL COMMENT '0表示不支持易宝投资通，1表示支持支持易宝投资通',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%bank` VALUES ('1','中国工商银行','1','3','0','./public/bank/1.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('2','中国农业银行','1','3','0','./public/bank/2.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('3','中国建设银行','1','3','0','./public/bank/3.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('4','招商银行','1','3','0','./public/bank/4.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('5','中国光大银行','1','3','0','./public/bank/5.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('6','中国邮政储蓄银行','1','3','0','./public/bank/6.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('7','兴业银行','1','3','0','./public/bank/7.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('8','中国银行','0','3','0','./public/bank/8.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('9','交通银行','0','3','3','./public/bank/9.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('10','中信银行','0','3','0','./public/bank/10.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('11','华夏银行','0','3','0','./public/bank/11.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('12','上海浦东发展银行','0','3','1','./public/bank/12.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('13','城市信用社','0','3','0','./public/bank/13.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('14','恒丰银行','0','3','0','./public/bank/14.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('15','广东发展银行','0','3','0','./public/bank/15.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('16','深圳发展银行','0','3','2','./public/bank/16.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('17','中国民生银行','0','3','0','./public/bank/17.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('18','中国农业发展银行','0','3','0','./public/bank/18.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('19','农村商业银行','0','3','0','./public/bank/19.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('20','农村信用社','0','3','0','./public/bank/20.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('21','城市商业银行','0','3','0','./public/bank/21.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('22','农村合作银行','0','3','0','./public/bank/22.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('23','浙商银行','0','3','0','./public/bank/23.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('24','上海农商银行','0','3','0','./public/bank/24.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('25','中国进出口银行','0','3','0','./public/bank/25.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('26','渤海银行','0','3','0','./public/bank/26.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('27','国家开发银行','0','3','0','./public/bank/27.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('28','村镇银行','0','3','0','./public/bank/28.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('29','徽商银行股份有限公司','0','3','0','./public/bank/29.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('30','南洋商业银行','0','3','0','./public/bank/30.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('31','韩亚银行','0','3','0','./public/bank/31.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('32','花旗银行','0','3','0','./public/bank/32.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('33','渣打银行','0','3','0','./public/bank/33.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('34','华一银行','0','3','0','./public/bank/34.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('35','东亚银行','1','3','0','./public/bank/35.jpg','0');
INSERT INTO `%DB_PREFIX%bank` VALUES ('36','苏格兰皇家银行','1','1','26','./public/bank/36.jpg','0');
DROP TABLE IF EXISTS `%DB_PREFIX%collocation`;
CREATE TABLE `%DB_PREFIX%collocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `fee_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%conf`;
CREATE TABLE `%DB_PREFIX%conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `input_type` tinyint(1) NOT NULL COMMENT '配置输入的类型 0:文本输入 1:下拉框输入 2:图片上传 3:编辑器',
  `value_scope` text NOT NULL COMMENT '取值范围',
  `is_effect` tinyint(1) NOT NULL,
  `is_conf` tinyint(1) NOT NULL COMMENT '是否可配置 0: 可配置  1:不可配置',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=312 DEFAULT CHARSET=utf8 COMMENT='// 配置';
INSERT INTO `%DB_PREFIX%conf` VALUES ('1','DEFAULT_ADMIN','admin','1','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('2','URL_MODEL','0','1','1','0,1','1','1','3');
INSERT INTO `%DB_PREFIX%conf` VALUES ('3','AUTH_KEY','fanwe','1','0','','1','1','4');
INSERT INTO `%DB_PREFIX%conf` VALUES ('4','TIME_ZONE','8','1','1','0,8','1','1','1');
INSERT INTO `%DB_PREFIX%conf` VALUES ('5','ADMIN_LOG','1','1','1','0,1','0','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('6','DB_VERSION','1.61','0','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('7','DB_VOL_MAXSIZE','8000000','1','0','','1','1','11');
INSERT INTO `%DB_PREFIX%conf` VALUES ('8','WATER_MARK','','2','2','','1','1','48');
INSERT INTO `%DB_PREFIX%conf` VALUES ('10','BIG_WIDTH','500','2','0','','0','0','49');
INSERT INTO `%DB_PREFIX%conf` VALUES ('11','BIG_HEIGHT','500','2','0','','0','0','50');
INSERT INTO `%DB_PREFIX%conf` VALUES ('12','SMALL_WIDTH','200','2','0','','0','0','51');
INSERT INTO `%DB_PREFIX%conf` VALUES ('13','SMALL_HEIGHT','200','2','0','','0','0','52');
INSERT INTO `%DB_PREFIX%conf` VALUES ('14','WATER_ALPHA','75','2','0','','1','1','53');
INSERT INTO `%DB_PREFIX%conf` VALUES ('15','WATER_POSITION','4','2','1','1,2,3,4,5','1','1','54');
INSERT INTO `%DB_PREFIX%conf` VALUES ('16','MAX_IMAGE_SIZE','3000000','2','0','','1','1','55');
INSERT INTO `%DB_PREFIX%conf` VALUES ('17','ALLOW_IMAGE_EXT','jpg,gif,png','2','0','','1','1','56');
INSERT INTO `%DB_PREFIX%conf` VALUES ('18','BG_COLOR','#ffffff','2','0','','0','0','57');
INSERT INTO `%DB_PREFIX%conf` VALUES ('19','IS_WATER_MARK','1','2','1','0,1','1','1','58');
INSERT INTO `%DB_PREFIX%conf` VALUES ('20','TEMPLATE','fanwe_1','1','0','','1','1','17');
INSERT INTO `%DB_PREFIX%conf` VALUES ('21','SITE_LOGO','./public/attachment/201602/16/17/56c2ea5ce3b23.png','1','2','','1','1','19');
INSERT INTO `%DB_PREFIX%conf` VALUES ('173','SEO_TITLE','猫力中国','1','0','','1','1','20');
INSERT INTO `%DB_PREFIX%conf` VALUES ('24','SMS_ON','0','5','1','0,1','1','1','78');
INSERT INTO `%DB_PREFIX%conf` VALUES ('26','PUBLIC_DOMAIN_ROOT','','2','0','','0','1','59');
INSERT INTO `%DB_PREFIX%conf` VALUES ('27','APP_MSG_SENDER_OPEN','1','1','1','0,1','1','1','9');
INSERT INTO `%DB_PREFIX%conf` VALUES ('28','ADMIN_MSG_SENDER_OPEN','1','1','1','0,1','1','1','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('29','GZIP_ON','0','1','1','0,1','1','1','2');
INSERT INTO `%DB_PREFIX%conf` VALUES ('42','SITE_NAME','VK维客众筹','1','0','','1','1','1');
INSERT INTO `%DB_PREFIX%conf` VALUES ('30','CACHE_ON','1','1','1','0,1','1','1','7');
INSERT INTO `%DB_PREFIX%conf` VALUES ('31','EXPIRED_TIME','0','1','0','','1','1','5');
INSERT INTO `%DB_PREFIX%conf` VALUES ('32','TMPL_DOMAIN_ROOT','','2','0','0','0','0','62');
INSERT INTO `%DB_PREFIX%conf` VALUES ('33','CACHE_TYPE','File','1','1','File,Xcache,Memcached','1','1','7');
INSERT INTO `%DB_PREFIX%conf` VALUES ('34','MEMCACHE_HOST','127.0.0.1:11211','1','0','','1','1','8');
INSERT INTO `%DB_PREFIX%conf` VALUES ('35','IMAGE_USERNAME','admin','2','0','','0','1','60');
INSERT INTO `%DB_PREFIX%conf` VALUES ('36','IMAGE_PASSWORD','admin','2','4','','0','1','61');
INSERT INTO `%DB_PREFIX%conf` VALUES ('37','DEAL_MSG_LOCK','0','0','0','','0','0','1456656903');
INSERT INTO `%DB_PREFIX%conf` VALUES ('38','SEND_SPAN','2','1','0','','1','1','85');
INSERT INTO `%DB_PREFIX%conf` VALUES ('39','TMPL_CACHE_ON','1','1','1','0,1','1','1','6');
INSERT INTO `%DB_PREFIX%conf` VALUES ('40','DOMAIN_ROOT','','1','0','','1','0','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('41','COOKIE_PATH','/','1','0','','0','1','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('43','INTEGRATE_CFG','','0','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('44','INTEGRATE_CODE','','0','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('172','PAY_RADIO','0.1','3','0','','1','1','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('176','SITE_LICENSE','VK维客众筹 - zc03.vitakung.com 猫力中国版权所有','1','0','','1','1','22');
INSERT INTO `%DB_PREFIX%conf` VALUES ('174','SEO_KEYWORD','VK维客众筹','1','0','','1','1','21');
INSERT INTO `%DB_PREFIX%conf` VALUES ('175','SEO_DESCRIPTION','VK维客众筹','1','0','','1','1','22');
INSERT INTO `%DB_PREFIX%conf` VALUES ('177','PROMOTE_MSG_LOCK','0','0','0','','0','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('178','PROMOTE_MSG_PAGE','0','0','0','0','0','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('179','STATE_CDOE','','1','0','','1','1','23');
INSERT INTO `%DB_PREFIX%conf` VALUES ('180','USER_VERIFY','0','4','1','0,1,2,3,4,5,6','1','1','63');
INSERT INTO `%DB_PREFIX%conf` VALUES ('181','INVITE_REFERRALS','20','4','0','','1','1','67');
INSERT INTO `%DB_PREFIX%conf` VALUES ('182','INVITE_REFERRALS_TYPE','1','4','1','0,1','0','1','68');
INSERT INTO `%DB_PREFIX%conf` VALUES ('183','USER_MESSAGE_AUTO_EFFECT','1','4','1','0,1','1','1','64');
INSERT INTO `%DB_PREFIX%conf` VALUES ('184','BUY_INVITE_REFERRALS','20','4','0','','1','1','67');
INSERT INTO `%DB_PREFIX%conf` VALUES ('185','REFERRAL_IP_LIMI','0','4','1','0,1','1','1','71');
INSERT INTO `%DB_PREFIX%conf` VALUES ('288','VIRSUAL_NUM','888','4','0','','1','1','288');
INSERT INTO `%DB_PREFIX%conf` VALUES ('190','MAIL_SEND_PAYMENT','1','5','1','0,1','1','1','75');
INSERT INTO `%DB_PREFIX%conf` VALUES ('191','REPLY_ADDRESS','462414875@qq.com','5','0','','1','1','77');
INSERT INTO `%DB_PREFIX%conf` VALUES ('192','MAIL_SEND_DELIVERY','1','5','1','0,1','1','1','76');
INSERT INTO `%DB_PREFIX%conf` VALUES ('193','MAIL_ON','1','5','1','0,1','1','1','72');
INSERT INTO `%DB_PREFIX%conf` VALUES ('262','NETWORK_FOR_RECORD','京ICP备11046674号-3','1','0','','1','1','201');
INSERT INTO `%DB_PREFIX%conf` VALUES ('263','QR_CODE','./public/attachment/201602/16/17/56c2eae468581.jpg','3','2','','1','1','202');
INSERT INTO `%DB_PREFIX%conf` VALUES ('264','REPAY_MAKE','7','1','0','','1','1','264');
INSERT INTO `%DB_PREFIX%conf` VALUES ('265','SQL_CHECK','0','1','1','0,1','1','1','265');
INSERT INTO `%DB_PREFIX%conf` VALUES ('266','MORTGAGE_MONEY','0.01','6','0','','1','1','1');
INSERT INTO `%DB_PREFIX%conf` VALUES ('267','ENQUIER_NUM','6','6','0','','1','1','2');
INSERT INTO `%DB_PREFIX%conf` VALUES ('268','INVEST_PAY_SEND_STATUS','1','5','1','0,1,2','1','1','3');
INSERT INTO `%DB_PREFIX%conf` VALUES ('269','INVEST_STATUS_SEND_STATUS','1','5','1','0,1,2','1','1','4');
INSERT INTO `%DB_PREFIX%conf` VALUES ('270','INVEST_PAID_SEND_STATUS','1','5','1','0,1,2','1','1','5');
INSERT INTO `%DB_PREFIX%conf` VALUES ('271','INVEST_STATUS','0','6','1','0,1,2','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('272','AVERAGE_USER_STATUS','1','6','1','0,1','1','1','6');
INSERT INTO `%DB_PREFIX%conf` VALUES ('186','REFERRAL_LIMIT','1','4','0','','1','1','69');
INSERT INTO `%DB_PREFIX%conf` VALUES ('273','KF_PHONE','010-56267773','3','0','','1','1','69');
INSERT INTO `%DB_PREFIX%conf` VALUES ('274','KF_QQ','462414875','3','0','','1','1','69');
INSERT INTO `%DB_PREFIX%conf` VALUES ('275','SCORE_TRADE_NUMBER','100','4','0','','1','1','72');
INSERT INTO `%DB_PREFIX%conf` VALUES ('276','BUY_PRESEND_SCORE_MULTIPLE','1','4','0','','1','1','72');
INSERT INTO `%DB_PREFIX%conf` VALUES ('277','BUY_PRESEND_POINT_MULTIPLE','1','4','0','','1','1','72');
INSERT INTO `%DB_PREFIX%conf` VALUES ('278','PROJECT_HIDE','0','3','1','0,1','1','1','69');
INSERT INTO `%DB_PREFIX%conf` VALUES ('279','WORK_TIME','09:00-18:30','3','0','','1','1','69');
INSERT INTO `%DB_PREFIX%conf` VALUES ('280','IDENTIFY_POSITIVE','1','4','1','0,1','1','1','283');
INSERT INTO `%DB_PREFIX%conf` VALUES ('281','IDENTIFY_NAGATIVE','1','4','1','0,1','1','1','284');
INSERT INTO `%DB_PREFIX%conf` VALUES ('282','BUSINESS_LICENCE','1','4','1','0,1','1','1','285');
INSERT INTO `%DB_PREFIX%conf` VALUES ('283','BUSINESS_CODE','1','4','1','0,1','1','1','286');
INSERT INTO `%DB_PREFIX%conf` VALUES ('284','BUSINESS_TAX','1','4','1','0,1','1','1','287');
INSERT INTO `%DB_PREFIX%conf` VALUES ('289','MORTGAGE_MONEY_UNFREEZE','12','6','0','','1','1','500');
INSERT INTO `%DB_PREFIX%conf` VALUES ('290','WX_MSG_LOCK','0','0','0','','0','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('291','USER_VERIFY_STATUS','1','4','1','0,1','1','1','291');
INSERT INTO `%DB_PREFIX%conf` VALUES ('292','GQ_NAME','股权众筹','6','0','','1','1','500');
INSERT INTO `%DB_PREFIX%conf` VALUES ('293','PAYPASS_STATUS','1','4','1','0,1','1','1','293');
INSERT INTO `%DB_PREFIX%conf` VALUES ('294','USER_SEND_VERIFY_TIME','300','4','0','','1','1','294');
INSERT INTO `%DB_PREFIX%conf` VALUES ('295','URL_NAME','m.php','1','0','','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('296','IS_SELFLESS','1','7','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('297','IS_ENQUIRY','1','6','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('298','IS_LIMITED_PARTNER','1','6','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('299','IS_FINANCE','0','6','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('300','VOTE_ID','','4','0','','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('301','IS_HOUSE','0','7','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('302','USER_SUBMIT_TIME','5','4','0','0','1','1','302');
INSERT INTO `%DB_PREFIX%conf` VALUES ('305','BAIDU_MAP_APPKEY','','1','0','','1','1','265');
INSERT INTO `%DB_PREFIX%conf` VALUES ('306','CREDIT_REPORT','0','4','1','0,1','1','1','306');
INSERT INTO `%DB_PREFIX%conf` VALUES ('307','HOUSING_CERTIFICATE','0','4','1','0,1','1','1','307');
INSERT INTO `%DB_PREFIX%conf` VALUES ('308','IS_STOCK_TRANSFER','1','6','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('309','STOCK_TRANSFER_IS_VERIFY','1','6','1','0,1','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('310','STOCK_TRANSFER_COMMISION','0.1','6','0','','1','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('311','IS_SMS_DIRECT','0','5','1','0,1','1','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%contract`;
CREATE TABLE `%DB_PREFIX%contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL COMMENT '是否有效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='//合同模板';
INSERT INTO `%DB_PREFIX%contract` VALUES ('1','股权认购合同','<h2 align=\"center\">投 资 协 议</h2>\r\n<div style=\"width: 98%;text-align: right;\">\r\n协议编号：<span>{$transfer.load_id}</span>\r\n</div>\r\n<br/>\r\n<div> \r\n　　　本协议由以下各方于________年____月____日在______市签署：\r\n</p>\r\n</div>\r\n<br/>\r\n<div> \r\n<p style=\"text-align: left;font-weight: 600;\">甲方：______________________公司</p>\r\n<p >营业执照注册号：__________________</p>\r\n<p>法定代表：________________________</p>\r\n<p>注册地址： _______________________</p>\r\n<p>公司控股股东：</p>\r\n<p>姓名：_________</p>\r\n<p>身份证号：________________________</p>\r\n</div>\r\n <br/>\r\n<div> \r\n<p style=\"text-align: left;font-weight: 600;\">乙方： </p>\r\n<p>姓名：__________</p>\r\n<p>身份证号：_______________________</p>\r\n<p>或机构：_________________________</p>\r\n<p>营业执照注册号：_________________</p>\r\n<p>法定代表：_________________ </p>\r\n<p>注册地址：_________________________</p>\r\n</div>\r\n <br/>\r\n\r\n<div> \r\n<p style=\"text-align: left;font-weight: 600;\">丙方：____________________</p>\r\n<p>营业执照注册号：_____________________</p>\r\n<p>法定代表：__________________ </p>\r\n<p>注册地址：_______________________ </p>\r\n</div>\r\n<br/>\r\n<p style=\"text-align: left;font-weight: 600;\">释义</p>\r\n<p>除非本协议文意另有所指，下列词语具有以下含义： </p>\r\n<table border=\"1\" style=\"margin: 0px auto; border-collapse: collapse; border: 1px solid rgb(0, 0, 0); width: 70%; \">\r\n<tr>\r\n  <td width=\"20%\" style=\"padding-left:10px\">本次交易</td>\r\n <td style=\"padding-left:10px\">指乙方认购甲方（目标公司）增资的行为</td>\r\n</tr>\r\n<tr>\r\n  <td style=\"padding-left:10px\">元</td>\r\n  <td style=\"padding-left:10px\">指中华人民共和国法定货币人民币元</td>\r\n</tr>\r\n<tr>\r\n  <td style=\"padding-left:10px\">尽职调查</td>\r\n <td style=\"padding-left:10px\">\r\n    指基于本次交易之目的，由丙方委派保荐商或专业领投人士对目标公司在财务、法律等相关方面进行的调查                                                                  \r\n </td>\r\n</tr>\r\n<tr>\r\n  <td style=\"padding-left:10px\">投资完成</td>\r\n  <td style=\"padding-left:10px\">即增资完成，指乙方按照本协议的约定缴纳完毕认购的全部增资款或决定不继续投资</td>\r\n</tr>\r\n<tr>\r\n  <td style=\"padding-left:10px\">送达</td>\r\n  <td style=\"padding-left:10px\">\r\n	指本协议任一方按照本协议约定的任一种送达方式将公告、通知等文件发出的行为\r\n  </td>\r\n</tr>\r\n<tr>\r\n  <td style=\"padding-left:10px\">过渡期</td>\r\n  <td style=\"padding-left:10px\">\r\n  指本协议签署之日至乙方按照本协议约定的期限投资完成之日的期间\r\n  </td>\r\n</tr>\r\n</table>\r\n\r\n\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">1.鉴于：</p>\r\n<p>1.1 甲方________是一家依中华人民共和国法律在_____注册成立并合法存续的有限责任公司，注册号为____________。营业期限为自______年____月____日起至_____年    ____月_____日止。登记注册资本为人民币_____万元，实收资本为人民币_____万元，主要从事_____________________等业务。</p>\r\n<p>1.2 乙方____________________________系甲方即将登记股东，均系具有完全民事权利能力及民事行为能力人，能够独立承担民事责任。</p>\r\n<p>1.3 丙方成功运营{$SITE_TITLE}众筹网，能够为甲、乙双方提供完备的服务支持，并能够在授权范围内对双方的投资或经营行为进行监督。</p>\r\n<p>1.4甲方的项目基础包括：</p>\r\n<p>1.5 甲方转让其<span style=\"border-bottom: 1px solid #000;\">  {$user_stock}  </span>%的股份，融资<span style=\"border-bottom: 1px solid #000;\">  {$total_price}  </span>元，乙方按照本协议规定的条款和条件认购。</p>\r\n<p>1.6 乙方及丙方一致同意甲方新增注册资本及资本公积金共人民币_______万元，由投资方（乙方）按照本协议规定的条款和条件认购。丙方放弃认购本次增资。</p>\r\n<p>1.7乙方及丙方一致同意甲方将公司合法拥有的资产________评估价格______万元，抵押/质押给投资方（乙方）作为本次融资的担保措施。</p>\r\n<p>上述各方根据中华人民共和国有关法律法规的规定，经过友好协商，达成一致意见，特订立本协议如下条款，以供各方共同遵守。</p>\r\n<br />\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">2.股份认购的前提条件</p>\r\n<p>2.1  各方确认，乙方在本协议项下的投资义务以以下全部条件的满足为前提：</p>\r\n<p>（1）各方同意并正式签署本协议，包括所有附件内容。</p>\r\n<p>（2） 甲方按照本协议的相关条款修改章程并经所有股东正式签署，修改和签署业经乙方以书面形式认可；除上述目标公司章程修订之外，过渡期内，不得修订或重述目标公司章程。</p>\r\n<p>（3） 本次交易和担保措施需经过政府部门(如需)、甲方董事会的同意和批准，包括但不限于甲方董事会、股东会决议通过本协议项下的增资和担保事宜，及前述修改后的章程或章程修正案等。</p>\r\n<p>（4）甲方以书面形式向乙方和丙方充分、真实、完整披露甲方的资产、负债、权益、对外担保以及与本协议有关的全部信息。</p>\r\n<p>（5）甲方在变更时所产生的全部费用，工商变更费用，经甲、乙双方同意由甲方承担。</p>\r\n<p>（6）甲方在工商变更后，再转汇除定金之外的投资款，定金部分的结转由甲方与丙方另外按照约定办理。</p>\r\n<p>（7）甲方在股权变更之后，应在_____年____月之前完成在股权交易机构的挂牌，并按照股东占股比例，分别为乙方、丙方（另以协议约定）进行确权，以方便股东的转让、退出。</p>\r\n<p>（8）乙方具有自由转让、退出的权利，甲方应积极协助。</p>\r\n<p>2.2  若本协议2.1条的任何条件在_____年____月____日前因任何原因未能实现，则乙方有权以书面通知的形式单方解除本协议。</p><br/>\r\n<p style=\"text-align: left;font-weight: 600;\">3.  违约</p>\r\n<br />\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">3. 股份的认购</p>\r\n<p>3.1 甲方原有注册资本为人民币____万元，现各方同意，由乙方作为甲方的投资者，出资人民币_____万元，按照本协议的条款认购，认购所占比例为甲方股份的____%，甲方占股_____%，融资方式为一次性出资认购。</p>\r\n<p>3.2 股份认购前，甲、乙方股本结构如下图所示：</p>\r\n<table border=\"1\" style=\"margin: 0px auto; border-collapse: collapse; border: 1px solid rgb(0, 0, 0); width: 70%; \">\r\n  <tr>\r\n    <td style=\"padding-left:10px\">序号</td>\r\n    <td style=\"padding-left:10px\">股东</td>\r\n    <td style=\"padding-left:10px\">出资金额（元）</td>\r\n    <td style=\"padding-left:10px\">持股比例（%）</td>\r\n    <td style=\"padding-left:10px\">备注</td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"padding-left:10px\">1</td>\r\n    <td style=\"padding-left:10px\">甲</td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"padding-left:10px\">2</td>\r\n    <td style=\"padding-left:10px\">乙</td>\r\n    <td style=\"padding-left:10px\"></td>\r\n    <td style=\"padding-left:10px\"></td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"padding-left:10px\">3</td>\r\n    <td style=\"padding-left:10px\">其他</td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n  </tr>\r\n</table>\r\n<p>3.3 乙方缴纳认投定金、签订本投资协议的30天之内，甲方完成修订公司章程、完成工商管理部门的股权变更登记；并在乙方汇出除定金之外的投资款之后的一周内，给乙方出具出资证明。</p>\r\n<p>3.4 乙方认购后，乙方须选择一次性出资方式。丙方确认甲方已经完成工商股权变更登记之后，通知乙方转出除定金之外的投资款；乙方应该在接到丙方通知的一周内一次性把除定金之外的认购款项汇至协议约定的甲方帐户。定金的转付和结算按照甲方与丙方事先的《融资承诺清单》等有关约定办理。</p>\r\n<p>3.5 在完成项目融资后，甲、乙方占股结构如下表所示：</p>\r\n<table border=\"1\" style=\"margin: 0px auto; border-collapse: collapse; border: 1px solid rgb(0, 0, 0); width: 70%; \">\r\n  <tr>\r\n    <td style=\"padding-left:10px\">序号</td>\r\n    <td style=\"padding-left:10px\">股东</td>\r\n    <td style=\"padding-left:10px\">出资金额（元）</td>\r\n    <td style=\"padding-left:10px\">持股比例（%）</td>\r\n    <td style=\"padding-left:10px\">备注</td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"padding-left:10px\">1</td>\r\n    <td style=\"padding-left:10px\">甲</td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\">所占本项目投资比例</td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"padding-left:10px\">2</td>\r\n    <td style=\"padding-left:10px\">乙</td>\r\n    <td style=\"padding-left:10px\">{$total_price}</td>\r\n    <td style=\"padding-left:10px\">{$user_stock}</td>\r\n    <td style=\"padding-left:10px\">所占本项目投资比例</td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"padding-left:10px\">3</td>\r\n    <td style=\"padding-left:10px\">其他</td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n    <td style=\"padding-left:10px\"> </td>\r\n  </tr>\r\n</table>\r\n<p>乙方缴纳完除定金之外的投资款项后，视为增资完成。</p>\r\n<p>丙方与甲方的赠股按照事先的《融资承诺清单》等有关约定履行。</p>\r\n<p>3.6 各方同意，在本协议股份认购的前提条件全部满足后，甲方应按照本协议的约定向乙方提供董事会决议、股东会决议、修改后的公司章程或章程修正案等文件正本并获得乙方的书面认可。</p>\r\n<p>3.7 各方同意，本协议约定的甲方账户是指以下账户</p>\r\n<p>户名：________________</p>\r\n<p>账号：______________________</p>\r\n<p>开户行名称：____________________________</p>\r\n<p>3.8 乙方成为甲方股东后，依照相应的法律法规、本协议和甲方公司章程修订案的规定享有公司的股东权利并承担相应股东义务，包括但不限于利润收入分配权。</p>\r\n<p>3.9 若乙方不能在上述约定时间内将其认缴的资金汇入甲方帐户，乙方应承担相应责任。</p>\r\n<p>3.10 双方同意，乙方对甲方的全部出资仅用于甲方正常经营需求或经股东会议以特殊决议批准的其它用途，不得用于偿还甲方或者股东债务等其它用途，也不得用于非经营性支出或者与甲方主营业务不相关的其它经营性支出；不得用于委托理财、委托贷款和期货交易等风险性投资业务。</p>\r\n<p>3.11 甲方承诺，自甲方与{$SITE_TITLE}签订的《融资承诺清单》生效之日起_____天内，甲方禁止通过其他融资途径，包括但不限于银行贷款、风险投资、信托等方式募集资金。</p>\r\n<br/>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">4.修订章程和变更事项</p>\r\n<p>4.1 甲方按照本协议的相关条款在章程修订案里专门增加此次融资说明和乙方出资金额,并经甲方董事会正式签署。章程修订案甲方以书面形式告之乙方并经乙方认可；除上述甲方公司章程修订之外，过渡期内，不得修订或重述公司章程。</p>\r\n<p>4.2 甲方收到乙方在本协议签字同意和授权委托书以及相应的股东身份证明后，     30个工作日内到当地工商行政管理部门办理完变更甲方股权事项。</p>\r\n<p>4.3 在乙方将扣除定金的出资款支付至本协议约定的甲方帐户之日起的30个工作日内，由甲方向乙方股东签发并交付股东出资凭证，出资凭证中的出资额度包括乙方之前在{$SITE_TITLE}认投的定金部分，甲方应当在股东名册中将乙方登记为股东。股份制改造之前，由甲方负责乙方此投资款的验资并出具相应的验资报告</p>\r\n<br/>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">5.乙方权利和义务</p>\r\n<p>5.1反稀释</p>\r\n<p>(1)结构性反稀释条款：若甲方的任一股东或者第三方对甲方进行增资时，乙方有权优先按相应比例以同等价格同时认购相应的增资，以使其在增资后持有的甲方股权比例不低于其根据本协议持有的甲方股权比例。</p>\r\n<p>(2)降价融资的反稀释条款：若甲方以比本次交易更优惠的价格和条件进行新的融资时，甲方需采取相关措施，包括但不限于给乙方配发免费认股权、附送额外股、更低价格转让等方式，确保增资后乙方所持股权的价值不低于新投资者进入前其股权的价值。</p>\r\n<p>5.2 优先购买权</p>\r\n<p>若甲方股东拟转让其股权，在同等条件下，乙方享有优先购买权。</p>\r\n<p>5.3 共同出售权</p>\r\n<p>若甲方股东拟向除甲方外的其他股东或任何第三方转让其持有的甲方的部分或全部股权时，乙方有权就其持有甲方的股权，按照同样的价格和其它条件，与该股东按照持有甲方的股权的相应比例向该第三方共同转让。</p>\r\n<p>5.4 清算优先权</p>\r\n<p>在甲方清算、解散、合并、被收购、出售控股股权、出售全部资产时，乙方有权优先于甲方股东获得原投资金额加上已产生但尚未支付的红利。剩余资产由股东按持股比例进行分配。</p>\r\n<p>5.5 领投人监督权和行为一致权</p>\r\n<p>领投人作为甲方的股东，对项目的运营发展具有监督权，领投人作为本次增资的股东代表，在股东会里享有特别权利，其投票意见，代表本次增资股东中未出席股东会的股东们的投票意见。</p>\r\n<p>5.6 乙方所享权利仅包含收益权，不含经营权。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">6.甲方治理和财务管理</p>\r\n<p>6.1 双方同意并保证，投资完成后，甲方董事会成员应不超过____人，本次增资的投资者有权提名 <span style=\"border-bottom: 1px solid #000;\">  1  </span> 人担任甲方董事，各方应同意在本项目股东大会上投票赞成上述投资者提名的人士出任甲方董事。甲方应在公司章程修订案中对甲方经营加以说明，甲方股东会应至少每半年召开一次会议。</p>\r\n<p>6.2 乙方享有作为股东所享有的对甲方经营管理的知情权和进行监督的权利，甲方应按时提供给乙方以下资料和信息：</p>\r\n<p>（1）每日历季度最后一日起<span style=\"border-bottom: 1px solid #000;\">  30个工作日  </span> 内，提供甲方的月度合并管理账，含利润表、资产负债表和现金流量表；</p>\r\n<p>（2）每日历年度结束后<span style=\"border-bottom: 1px solid #000;\">  45个工作日  </span> 内，提供甲方的年度合并管理账；</p>\r\n<p>（3）每日历年度结束后<span style=\"border-bottom: 1px solid #000;\">  120个工作日  </span> 内，提供甲方的年度合并审计账；</p>\r\n<p>（4）在每日历/财务年度结束前至少<span style=\"border-bottom: 1px solid #000;\">  30  </span>  天，提供甲方的年度业务计划、年度预算和预测的财务报表；</p>\r\n<p>（5）在乙方收到管理账后的<span style=\"border-bottom: 1px solid #000;\">  30  </span>  天内，提供机会供乙方与甲方就管理帐进行讨论及审核；</p>\r\n<p>（6）按照乙方要求的格式提供其它统计数据、其它财务和交易信息，以便乙方被适当告知甲方的信息以保护自身利益。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">7. 经营目标</p>\r\n<p>7.1 甲方对经营管理负主要责任，对其经营过程中人为损失负主要经济责任。</p>\r\n<p>7.2 甲方对经营目标应在每年总结中提出下一年的目标发展计划及方案，根据每年评估做出项目发展目标，并以各种形式告知乙方且须经50%以上股东同意方可执行。</p>\r\n<p>7.3 甲方承诺在_____年内，在股权交易机构_______挂牌，登陆资本市场，方便投资者推出和投后管理。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">8. 竞业禁止</p>\r\n<p>8.1 未经乙方及50%以上股东同意，甲方股东不得单独设立或以任何形式(包括但不限于以股东、合伙人、理事、监事、经理、职员、代理人、顾问等身份)参与设立和经营有竞争性的经营主体。</p>\r\n<p>8.2 甲方股东同意，如果甲方股东及主要管理人员和技术人员违反竞业禁止条款，致使乙方利益受到损害的，除该等人员须赔偿乙方损失外，甲方股东应就乙方遭受的损失承担连带赔偿责任。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">9.知识产权的占有与使用</p>\r\n<p>甲方承诺并保证，除本协议另有规定之外，本协议签订之时及本协议签订之后，甲方是现拥有的公司名称、品牌、商标和专利、商品名称及品牌、网站名称、域名、专有技术、各种经营许可证等相关知识产权、许可权的唯一、合法的所有权人。上述知识产权均需经过相关主管部门的批准或备案，且所有为保护该等知识产权而采取的合法措施均经过政府部门批准或备案，甲方保证按时缴纳相关费用，保证其权利的持续有效性。</p>\r\n<br>\r\n\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">10. 债务和或有债务</p>\r\n<p>10.1 债务，是指甲方资产负债表中已经列明的或经甲、乙双方作账外负债确认的负债。甲方及甲方股东承诺并保证，除已向乙方披露的债务之外，甲方不存在任何其他债务。如甲方还存在未披露债务，全部由甲方股东承担。若甲方未先行承担并清偿了上述未披露债务，因此给乙方造成的损失应由甲方股东在损失实际发生后<span style=\"border-bottom: 1px solid #000;\">  10  </span>个工作日内向乙方全额赔偿。 </p>\r\n<p>10.2 或有债务，是指由于甲方资产负债表日期之前的原因（事件、情况、行为、协议、合同等），在资产负债表日期之后使甲方遭受的负债，而该等负债未列明于上述资产负债表之中，也未经甲、乙双方作账外负债确认的；或该等负债虽在上述资产负债表中列明，但负债的数额大于上述资产负债表中列明的数额。</p>\r\n<p>10.3 若甲方遭受或有债务，则甲方股东应按如下约定向乙方履行赔偿责任：</p>\r\n<p>（1）乙方按照本协议相关约定增资完成前，甲方遭受或有债务的，乙方有权终止本协议或在继续融资前要求甲方股东先行支付赔偿款；</p>\r\n<p>（2）乙方按照本协议相关约定增资完成后，甲方遭受或有债务的，乙方应当书面通知甲方股东，若甲方股东以甲方名义行使抗辩权，乙方应促使甲方给予必要的协助。无论甲方股东是否行使抗辩权或抗辩的结果如何，只要甲方遭受或有债务，甲方股东均应按本协议的约定履行赔偿责任；</p>\r\n<p>（3）甲方股东因甲方遭受或有债务对乙方的赔偿责任的金额，按甲方遭受的或有债务金额乘本协议项下乙方融资后占股权的比例计得。甲方股东对乙方因甲方遭受或有债务的赔偿金额不超过乙方在本协议项下的投资额；</p>\r\n<p>（4）甲方股东应于甲方支付或有债务之日起<span style=\"border-bottom: 1px solid #000;\">  10个工作日  </span>内向乙方履行赔偿责任；</p>\r\n<p>（5）甲方股东对甲方遭受或有债务的保证赔偿期限为自上述甲方资产负债表日期起<span style=\"border-bottom: 1px solid #000;\">  26  </span> 个月；因甲方偷、逃、漏税款、对外提供担保及不受诉讼时效限制的其他或有债务的保证赔偿期限为自上述甲方资产负债表日期起<span style=\"border-bottom: 1px solid #000;\">  10  </span> 年。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">11. 共同保证和承诺</p>\r\n<p>11.1 其为依据中国法律正式成立并有效存续的自然人、法人或其他组织。</p>\r\n<p>11.2 其拥有签订和履行本协议所必须的民事权利能力和行为能力，能够独立承担民事责任。</p>\r\n<p>11.3 其保证其就本协议的签署所提供的一切文件资料均是真实、合法、有效、完整的。本协议的签订或履行不违反以其为一方或约束其自身或其有关资产的任何重大合同或协议。</p>\r\n<p>11.4 其在本协议上签字的代表，根据有效的委托书或有效的法定代表人证明书，已获得签订本协议的充分授权。</p>\r\n<p>11.5 其已就与本次交易有关的，并需为各方所了解和掌握的所有信息和资料，向相关方进行了充分、详尽、及时的披露，没有重大遗漏、误导和虚构。</p>\r\n<p>11.6 鉴于股东多、分布区域广，若召开股东会，甲方将提前半个月发出通知，乙方、丙方联系方式若出现变化应及时通知甲方。为不影响公司重大事项的进展，特共同约定：若因个人原因未能亲自或委托他人如期出席股东会，则视为同意股东会决议，并视为同意委托公司人员全权代为办理相关手续，包括再融资、挂牌的工商变更和公司章程的修订。并以本协议约定为准，无须再出具委托书。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">12. 风险揭示 </p>\r\n<p>乙方投资甲方可能面临如下风险，甲方和甲方股东不承诺任何回报：</p>\r\n<p>12.1 政策风险——指国家未来股权众筹融资行业法律、法规、政策发生重大变化或进行行业整改等举措，将改变现有的行业现状，项目原定目标难以实现甚至无法实现所产生的风险。</p>\r\n<p>12.2 市场风险——主要指由于市场变化或经济环境造成甲方营业收入减少，经营效益下降而导致还款能力不足的风险，甚至亏损。 </p>\r\n<p>12.3 信用风险和流动性风险——指社会诚信度，资金流动性等风险。</p>\r\n<p>12.4 其他风险——战争、自然灾害等不可抗力风险；金融市场危机等超出甲方自身直接控制能力之外的风险等。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">13. 违约及其责任 </p>\r\n<p>13.1 本协议生效后，各方应按照本协议及全部附件、附表的规定全面、适当、及时地履行其义务及约定，若本协议的任何一方违反本协议包括全部附件、附表的约定，均构成违约。</p>\r\n<p>13.2 各方同意，除本协议另有约定，本协议违约金为乙方认购的增资款项全额的 10％。</p>\r\n<p>13.3 支付违约金不影响守约方要求违约方赔偿损失、继续履行协议或解除协议的权利。</p>\r\n<p>13.4 一旦发生违约行为，违约方应当向守约方支付违约金，并赔偿因其违约而给守约方造成的损失以及守约方为追偿损失而支付的合理费用，包括但不限于律师费、财产保全费等。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">14. 协议的变更、解除和终止 </p>\r\n<p>14.1 本协议的任何修改、变更应经协议各方另行协商，并就修改、变更事项共同签署协议后方可生效。</p>\r\n<p>（1）经各方当事人协商一致解除。</p>\r\n<p>（2）任一方发生违约行为并在守约方向其发出要求更正的书面通知之日起30 天内不予更正的，或累计发生两次或两次以上违约行为的，守约方有权单方解除本协议。</p>\r\n<p>（3）因不可抗力，造成本协议无法履行的。</p>\r\n<p>14.3 提出解除协议的一方应当通知其他各方，通知在到达其他各方时生效。</p>\r\n<p>14.4 本协议解除后，不影响守约方要求违约方支付违约金和赔偿损失的权利。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">15. 附件</p>\r\n<p>15.1 乙方认可的现行有效的甲方公司章程及修订案。</p>\r\n<p>15.2 股东会关于公司增资的股东会决议。</p>\r\n<p>15.3 甲方及其本次项目发起人________关于本次股权众筹计划书和回报方案说明。</p>\r\n<p>15.4 甲方给乙方的股东出资凭证。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">16. 通知及送达</p>\r\n<p>16.1 协议各方同意，与本协议有关的任何通知均应采用书面方式,可采用{$SITE_TITLE}网站平台公告、当面递交、传真、特快专递或挂号信件、电子邮件等形式。公告形式的通知以{$SITE_TITLE}有关网页上发布之日为送达日；当面递交、传真的通知以当日为送达日；以特快专递、挂号信件发出的通知以签收日或通知发出后第三日为送达日；以电子邮件发出的通知进入对方电子数据接收系统之日视为送达日。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">17. 法律适用与争议解决</p>\r\n<p>17.1 本协议的效力、解释及履行均适用中国人民共和国法律。</p>\r\n<p>17.2 本协议各方当事人因本协议发生的任何争议，均应首先通过友好协商的方式解决，如协商不成，各方同意向丙方所在地人民法院仲裁委员会申请仲裁。</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">18. 附则</p>\r\n<p>18.1 除非本协议另有规定，各方应自行支付各自产生的，与本协议及本协议述及的文件的谈判、起草、签署和执行有关的成本和费用。</p>\r\n<p>18.2 本协议未尽事宜，各方可另行签署补充文件，该补充文件与本协议具有同等法律效力。</p>\r\n<p>18.3 本协议自各方签字、盖章后成立并生效。本协议用中文书写，一式三份，各方各持一份，其余由甲方备案，各份具有同等法律效力。</p>\r\n<p>（以下无正文）</p>\r\n<br>\r\n\r\n<p style=\"text-align: left;font-weight: 600;\">甲方(盖章)：_________________</p>\r\n<p>法定代表人/授权代表(签字)：__________________                            </p>\r\n<p>签约时间：_____年____月____日</p>\r\n<p style=\"text-align: left;font-weight: 600;\">乙方(签字加盖手摸或公章)：___________________ </p>\r\n<p>签约时间：_____年____月____日</p>\r\n<p style=\"text-align: left;font-weight: 600;\">丙方(盖章)：_____________________________公司</p>\r\n<p>法定代表人/授权代表(签字)：__________________</p>\r\n<p>签约时间：_____年____月____日</p>\r\n<br>\r\n','0','1');
INSERT INTO `%DB_PREFIX%contract` VALUES ('2','股权转让协议样本','<h2 align=\"center\">   <span style=\"border-bottom: 1px solid #000;\">   {$deal.company}   </span>公司股权转让协议</h2> \r\n<p></p>\r\n\r\n<p>甲乙双方根据《中华人民共和国公司法》等法律、法规和 <span style=\"border-bottom: 1px solid #000;\">  {$deal.company}  </span>公司（以下简称该公司）章程的规定，经友好协商，本着平等互利、诚实信用的原则，签订本股权转让协议，以资双方共同遵守。</p>\r\n<p></p>\r\n甲方（转让方）：<span style=\"border-bottom: 1px solid #000;\">  {$transfer.user_name}  </span>           乙方（受让方）：<span style=\"border-bottom: 1px solid #000;\">  {$transfer.purchaser_name}  </span>             \r\n<p>身份证号码： <span style=\"border-bottom: 1px solid #000;\">  {$seller_info.identify_number}  </span>                         身份证号码：<span style=\"border-bottom: 1px solid #000;\">  {$purchaser_info.identify_number}  </span>   </p>\r\n<p>联系电话：  <span style=\"border-bottom: 1px solid #000;\">  {$seller_info.mobile}  </span>                          联系电话：<span style=\"border-bottom: 1px solid #000;\">  {$purchaser_info.mobile}  </span>    </p>\r\n<p></p>\r\n<p></p>\r\n<p>第一条  股权的转让</p>\r\n<p>1、 甲方将其持有该公司<span style=\"border-bottom: 1px solid #000;\">  {$transfer.user_stock}  </span>%的股权转让给乙方。 　</p>\r\n<p>2、 乙方同意接受上述转让的股权。 　</p>\r\n<p>3、 甲乙双方确定的转让价格为人民币  <span style=\"border-bottom: 1px solid #000;\">  {$transfer.price}  </span>  元。 　</p>\r\n<p>4、 甲方保证向乙方转让的股权不存在第三人的请求权，没有设置任何质押，未涉及任何争议及诉讼。 </p>\r\n<p>5、 甲方向乙方转让的股权中尚未实际缴纳出资的部分，转让后，由乙方继续履行这部分股权的出资义务。</p>\r\n<p>（注：若本次转让的股权系已缴纳出资的部分，则删去第5款）</p>\r\n<p>6、 本次股权转让完成后，乙方即享受相应的股东权利并承担义务。甲方不再享受相应的股东权利和承担义务。</p>\r\n<p>7、 甲方应对该公司及乙方办理相关审批、变更登记等法律手续提供必要协作与配合。</p>\r\n<p>8、本次股权转让所产生的相关费用经甲乙双方协商由_________支付。　</p>\r\n<p></p>\r\n<p></p>\r\n<p>第二条  转让款的支付 　</p>\r\n_____________________________________________________________________\r\n_____________________________________________________________________\r\n_____________________________________________________________________\r\n_____________________________________________________________________\r\n_____________________________________________________________________\r\n_____________________________________________________________________\r\n<p>　 （注：转让款的支付时间、支付方式由转让双方自行约定并载明于此）</p>\r\n<p></p>\r\n<p></p>\r\n<p>第三条  违约责任</p>\r\n<p>1、 本协议正式签订后，任何一方不履行或不完全履行本协议约定条款的，即构成违约。违约方应当负责赔偿其违约行为给守约方造成的损失。 　</p>\r\n<p>2、 任何一方违约时，守约方有权要求违约方继续履行本协议。 　</p>\r\n<p></p>\r\n<p></p>\r\n<p>第四条  适用法律及争议解决 　</p>\r\n<p>1、 本协议适用中华人民共和国的法律。 　</p>\r\n<p>2、 凡因履行本协议所发生的或与本协议有关的一切争议双方应当通过友好协商解决；如协商不成，则通过诉讼解决。 　</p>\r\n<p></p>\r\n<p></p>\r\n<p>第五条  协议的生效及其他 　</p>\r\n<p>1、本协议经双方签字盖章后生效。</p>\r\n<p>2、本协议生效之日即为股权转让之日，该公司据此更改股东名册、换发出资证明书，并向登记机关申请相关变更登记。</p>\r\n<p>3、本合同一式四份，甲乙双方各持一份，该公司存档一份，申请变更登记一份。 </p>\r\n<p></p>\r\n甲方（签字或盖章）:                         乙方（签字或盖章）： 　　　　 　\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n签订日期：_____年____月____日        签订日期：_____年____月____日\r\n','0','1');
DROP TABLE IF EXISTS `%DB_PREFIX%deal`;
CREATE TABLE `%DB_PREFIX%deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `deal_days` int(11) NOT NULL COMMENT '上线天数，仅提供管理员审核参考',
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `limit_price` decimal(20,2) NOT NULL COMMENT '项目金额',
  `brief` text NOT NULL,
  `description` text NOT NULL,
  `comment_count` int(11) NOT NULL,
  `support_count` int(11) NOT NULL COMMENT '支持人数',
  `focus_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `log_count` int(11) NOT NULL,
  `support_amount` decimal(20,2) NOT NULL COMMENT '支持总金额，需大等于limit_price(不含运费)',
  `pay_amount` decimal(20,2) NOT NULL COMMENT '可发放金额，抽完佣金的可领金额（含运费，运费不抽佣金）\r\n即support_amount*佣金比率+delivery_fee_amount',
  `delivery_fee_amount` decimal(20,2) NOT NULL COMMENT '交付费用金额',
  `create_time` int(11) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `tags` text NOT NULL,
  `tags_match` text NOT NULL,
  `tags_match_row` text NOT NULL,
  `success_time` int(11) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '推荐项目',
  `is_classic` tinyint(1) NOT NULL COMMENT '经典项目',
  `is_delete` tinyint(1) NOT NULL,
  `deal_extra_cache` text NOT NULL,
  `is_edit` tinyint(1) NOT NULL,
  `description_1` text NOT NULL,
  `is_support_print` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `is_has_send_success` tinyint(1) NOT NULL,
  `pay_radio` decimal(20,2) NOT NULL,
  `adv_image` varchar(255) NOT NULL COMMENT '广告图片',
  `status` tinyint(1) NOT NULL,
  `deal_background_image` varchar(255) NOT NULL COMMENT '项目背景图片',
  `deal_backgroundColor_image` varchar(255) NOT NULL COMMENT '项目底色图片',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 表示普通众筹，1表示股权众筹,2表示众筹买房,3表示公益众筹, 4表示融资众筹',
  `description_2` text NOT NULL COMMENT '目标用户或客户群体定位',
  `description_3` text NOT NULL COMMENT '目标用户或客户群体目前困扰或需求定位',
  `description_4` text NOT NULL COMMENT '满足目标用户或客户需求的产品或服务模式说明',
  `description_5` text NOT NULL COMMENT '项目赢利模式说明',
  `description_6` text NOT NULL COMMENT '市场主要同行或竞争对手概述',
  `description_7` text NOT NULL COMMENT '项目主要核心竞争力说明',
  `stock` text NOT NULL COMMENT '股东信息',
  `unstock` text NOT NULL COMMENT '非股东成员',
  `history` text NOT NULL COMMENT '三年信息',
  `plan` text NOT NULL COMMENT '三年计划',
  `attach` text NOT NULL COMMENT '附件信息',
  `investor_authority` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示只有投资人可以，1表所有人都可以看',
  `project_step` tinyint(1) NOT NULL COMMENT '项目阶段 0表示未启动 1表示在开发中 2产品已上市或上线，3已经有收入，4已经盈利',
  `business_create_time` int(11) NOT NULL COMMENT '企业成立时间',
  `business_employee_num` int(11) NOT NULL COMMENT '企业员工数量',
  `business_is_exist` tinyint(1) NOT NULL COMMENT '公司是否成立',
  `has_another_project` tinyint(1) NOT NULL COMMENT '是否有其他项目 0表示么有  1表示有',
  `business_name` varchar(255) NOT NULL COMMENT '公司名称',
  `business_address` varchar(255) NOT NULL COMMENT '办公地址',
  `business_stock_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '入股方式  0直接入股原公司 1 创建新公司入股',
  `business_pay_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '付款方式 0表示一次性付款',
  `business_descripe` text NOT NULL COMMENT '企业简介',
  `pay_end_time` int(11) NOT NULL COMMENT '支付结算时间',
  `investor_edit` int(1) NOT NULL COMMENT '0表示显示下一步按钮，1表示显示不错和返回按钮',
  `mine_stock` decimal(10,2) DEFAULT NULL COMMENT '投资人占有的股份',
  `transfer_share` decimal(10,2) NOT NULL,
  `virtual_num` int(11) NOT NULL COMMENT '虚拟人数',
  `virtual_price` decimal(20,2) NOT NULL COMMENT '虚拟金额',
  `gen_num` int(11) NOT NULL COMMENT '跟投人数',
  `xun_num` int(11) NOT NULL COMMENT '询价人数',
  `invote_money` decimal(20,2) NOT NULL COMMENT '预购金额',
  `invote_num` int(11) NOT NULL COMMENT '投资人数',
  `invote_mini_money` decimal(10,2) NOT NULL COMMENT '最低支付金额',
  `refuse_reason` text COMMENT '拒绝理由',
  `audit_data` text NOT NULL COMMENT '发起人资料',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `ips_bill_no` varchar(255) NOT NULL COMMENT '托管项目',
  `share_fee_amount` decimal(20,2) NOT NULL COMMENT '分红总金额',
  `is_special` tinyint(1) NOT NULL COMMENT '专题',
  `invest_status` tinyint(1) NOT NULL COMMENT '融资状态：0未确认，1成功，2失败',
  `left_money` decimal(20,2) NOT NULL COMMENT '剩余筹款',
  `lottery_draw_time` int(11) NOT NULL COMMENT '开奖时间：0未开奖，大于0已开奖',
  `share_fee_descripe` text COMMENT '分红说明',
  `exit_mechanism` text COMMENT '退出机制',
  `annual_interest_rate` decimal(10,2) NOT NULL COMMENT '预期年利率',
  `return_cycle` varchar(255) NOT NULL COMMENT '固定回报周期',
  `return_descripe` text COMMENT '回报说明',
  `stock_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1表示股权众筹，2表示债权众筹，3表示股权+债权（这三种类型都属于股权众筹）',
  `invest_phase` tinyint(2) NOT NULL COMMENT '投资阶段 0表示天使轮,1表示Pre-A轮，2表示A轮，3表示A+轮，4表示B轮，5表示B+轮，6表示C轮，7表示D轮，8表示E轮及以后，9表示并购，10表示上市',
  `company_id` int(11) NOT NULL COMMENT '公司id',
  `stock_subscript_id` int(11) NOT NULL COMMENT '股权认购合同ID',
  `stock_transfer_id` int(11) NOT NULL COMMENT '股权转让合同ID',
  `houses_info` text COMMENT '楼般信息',
  `houses_name` varchar(255) NOT NULL COMMENT '楼盘名称',
  `houses_address` varchar(255) NOT NULL COMMENT '楼盘地址',
  `api_address` varchar(255) NOT NULL COMMENT '地图定位地址',
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL COMMENT '纬度',
  `houses_status` varchar(255) NOT NULL COMMENT '楼盘阶段',
  `earnings` decimal(20,2) NOT NULL COMMENT '收益百分比',
  `earnings_cycle` int(11) NOT NULL COMMENT '收益周期',
  `earnings_send_count` int(11) NOT NULL COMMENT '收益期数',
  `earnings_send_capital` tinyint(1) NOT NULL COMMENT '收益发放含本金：0不是，1是',
  `houses_earnings_info` text NOT NULL COMMENT '房产收益说明',
  `update_log_icon` varchar(255) NOT NULL COMMENT '动态展示小图标',
  `is_earnings` tinyint(1) NOT NULL DEFAULT '1' COMMENT '项目是否有收益：0无收益，1有收益',
  `is_top` tinyint(1) NOT NULL COMMENT '置顶项目',
  PRIMARY KEY (`id`),
  KEY `begin_time` (`begin_time`),
  KEY `end_time` (`end_time`),
  KEY `is_effect` (`is_effect`),
  KEY `limit_price` (`limit_price`),
  KEY `comment_count` (`comment_count`),
  KEY `support_count` (`support_count`),
  KEY `focus_count` (`focus_count`),
  KEY `view_count` (`view_count`),
  KEY `log_count` (`log_count`),
  KEY `support_amount` (`support_amount`),
  KEY `create_time` (`create_time`),
  KEY `is_success` (`is_success`),
  KEY `cate_id` (`cate_id`),
  KEY `sort` (`sort`),
  KEY `is_recommend` (`is_recommend`),
  KEY `is_classic` (`is_classic`),
  KEY `is_delete` (`is_delete`),
  FULLTEXT KEY `tags_match` (`tags_match`),
  FULLTEXT KEY `name_match` (`name_match`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COMMENT='//项目信息';
INSERT INTO `%DB_PREFIX%deal` VALUES ('55','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','ux21151ux22827,ux26700ux38754,ux26399ux24453,ux23494ux30721,ux40644ux37329,ux25903ux25345,ux21407ux21019,ux28216ux25103,ux68ux73ux89,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345','功夫,桌面,期待,密码,黄金,支持,原创,游戏,DIY,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','./public/attachment/201211/07/10/021e2f6812298468cfab78cbd07b90ee85.jpg','','','15','1351710606','1623525000','1','3000.00','这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，希望大家能够喜欢并支持我们！','这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，所以在游戏的美术、包装、宣传等方面都会存在一些不足。但本次带来的两个作品都是我们利用几乎所有的业余时间尽心尽力制作出来的，希望大家能够喜欢并支持我们！\r\n<p>\r\n	<br />\r\n</p>\r\n<h3>\r\n	我想要做什么\r\n</h3>\r\n<p>\r\n	&nbsp; 桌面游戏是一种健康的休闲方式，你不用整天面对电脑的辐射，同时也让你可以不再过度沉迷于虚拟的网络世界中。因为桌面游戏方式的特殊性，能使你更加注重加强与人面对面的交流，提高自己的语言和沟通能力，还可以在现实生活中用这种轻松愉快的休闲方式结交更多的朋友。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;我们就是这样一群喜爱桌游，同时喜欢设计桌游的年轻人，我们并非专业的桌游制作团队，我们只是凭着对桌游的爱好开始了对桌游设计的探索。我们希望通过努力，将桌游的快乐带给更多喜欢轻松休闲、热爱生活的朋友。但是，我们的资金及能力有限，需要得到大家的帮助与支持，才能实现这样的梦想。也希望您在支持我们的同时收获一份快乐和惊喜！\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;我们这次将原创的桌面游戏《功夫》和《黄金密码》一起放到这里，希望得到大家的支持！&nbsp;&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n<img src=\"./public/attachment/201211/07/16/da4f6f7e11b249dcf71bf5e9c6a86d8a83o5700.jpg\" />\r\n</p>\r\n<p>\r\n	游戏人数：2-4人\r\n</p>\r\n<p>\r\n	适合年龄：8+\r\n</p>\r\n<p>\r\n	游戏时间：10-30分钟\r\n</p>\r\n<p>\r\n	游戏类型：手牌管理\r\n</p>\r\n<p>\r\n	游戏背景：你在游戏中扮演一名武者，灵活运用你掌握的功夫（手牌）和装备（装备牌）对抗其他的武者并最终打败他们。\r\n</p>\r\n<p>\r\n	游戏目标：扣除敌方所有人物的体力为胜。\r\n</p>\r\n游戏配件：69张动作牌（手牌）、6张道具牌、2张血量牌（需自行制作）\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"./public/attachment/201211/07/16/7a404c90f81ca1368ff0f5b24e26a5d781o5700.jpg\" />\r\n</p>\r\n<p>\r\n	游戏过程：游戏的每个回合分两个阶段，第一阶段为热身阶段，获得热身阶段胜利的玩家成为第二阶段（攻击阶段）的主导者，由他决定第二阶段如何进行。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;《功夫》用卡牌较好的模拟再现了格斗中的一些乐趣，比如热身阶段的猜招、攻击阶段一招一式的过招，同时结合手牌管理的一些特点，打出组合招式及连招，配合你获得的道具，最终战胜对手。在游戏过程中，当你取得一定的优势时，也不能掉以轻心，形式可能会因为你的任何一个破绽而发生逆转，这与格斗、搏击的情况十分相似。所以如何保持良好的心态，灵活的运用手牌才是这个游戏制胜的关键所在。（具体规则见最下方及本项目动态）\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	游戏人数：3-4人\r\n</p>\r\n<p>\r\n	适合年龄：8+\r\n</p>\r\n<p>\r\n	游戏时间：20-40分钟\r\n</p>\r\n<p>\r\n	游戏类型：逻辑推理、谜题设计\r\n</p>\r\n<p>\r\n	游戏背景：二战时期，德军将一批黄金铸成金条，分别保存在3个金库里，并派重兵把守。为了得到这批黄金，美军重金收买了一个德军守卫为内奸，内奸成功获取了金库的密码破解方法，并将密码破解方法以暗号的形式告知了美军特工。但是，与此同时德军也发现了暗号，并且金库的守卫非常森严，解开金库密码的时间只有1分钟……玩家在这个游戏中分别扮演德军、德军内奸、美军特工。如何设计出德军看不懂，美军特工又能在1分钟内解出的暗号密码。就看你的表现啦！\r\n</p>\r\n<p>\r\n	游戏目标：根据身份的不同，任务也不同。德军需解开密码保住金库，特工需设置密码阻止德军解密，美军需解开密码同时选择金库获得黄金。\r\n</p>\r\n<p>\r\n	游戏配件：10张密码牌、12张空箱牌、24张黄金牌、沙漏1个、草稿纸和笔（自备）\r\n</p>\r\n<p>\r\n	游戏过程：每人分别扮演一次特工、德军、美军，完成后计算每人所获得的黄金数量，黄金最多的玩家获胜。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>','0','1','0','3','1','15.00','18.50','5.00','1352229030','','','','功夫 桌面 期待 密码 黄金 支持 原创 游戏 DIY','ux21151ux22827,ux26700ux38754,ux26399ux24453,ux23494ux30721,ux40644ux37329,ux25903ux25345,ux21407ux21019,ux28216ux25103,ux68ux73ux89','功夫,桌面,期待,密码,黄金,支持,原创,游戏,DIY','0','0','8','福建','福州','17','0','fanwe','1','1','0','','0','','0','0','0','0.00','','0','','','0','','','','','','','','','','','','0','0','0','0','0','0','','','0','0','','0','0','0.00','0.00','0','0.00','0','0','0.00','0','0.00','','','0','','0.00','0','0','0.00','0','','','0.00','','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('56','拥有自己的咖啡馆','ux21654ux21857ux39302,ux25317ux26377,ux33258ux24049,ux25317ux26377ux33258ux24049ux30340ux21654ux21857ux39302','咖啡馆,拥有,自己,拥有自己的咖啡馆','./public/attachment/201211/07/11/40e44eb97b0ca5aed5148e59c2cc8dcb95.jpg','','','30','1351711495','1560367440','1','5000.00','每个人心目中都有一个属于自己的咖啡馆,我们也是.但我们想要的咖啡馆，又不仅仅是咖啡馆','<h3>\r\n	关于我\r\n</h3>\r\n<p>\r\n	每个人心目中都有一个属于自己的咖啡馆<br />\r\n我们也是<br />\r\n但我们想要的咖啡馆，又不仅仅是咖啡馆<br />\r\n这里除了售卖咖啡和甜点，还有旅行的梦想<br />\r\n我们想要一个“窝”，一个无论在出发前还是归来后随时开放的地方<br />\r\n梦想着有一天<br />\r\n我们可以带着咖啡的香气出发<br />\r\n又满载着旅行的收获回到充满咖啡香气的小“窝”\r\n</p>\r\n<h3>\r\n	我想要做什么\r\n</h3>\r\n<p>\r\n	以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。\r\n</p>\r\n<p>\r\n	<img src=\"./public/attachment/201211/07/16/0482ef5836f6745af0f59ff40d40805765o5700.jpg\" /><br />\r\n</p>\r\n<h3>\r\n	为什么我需要你的支持\r\n</h3>\r\n<p>\r\n	这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。\r\n</p>\r\n<h3>\r\n	我的承诺与回报\r\n</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/2ae4c7149cfd31f12d91453713322f9076o5700.jpg\" /><br />\r\n<br />\r\n<br />','0','11','1','5','1','5500.00','4950.00','0.00','1352229954','','','','咖啡馆 拥有 自己','ux21654ux21857ux39302,ux25317ux26377,ux33258ux24049','咖啡馆,拥有,自己','1434136682','1','1','北京','东城区','18','0','fzmatthew','1','1','0','','0','','0','0','0','0.00','','0','','','0','','','','','','','','','','','','0','0','0','0','0','0','','','0','0','','0','0','0.00','0.00','0','0.00','0','0','0.00','0','0.00','','','0','','0.00','1','0','4950.00','0','','','0.00','','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('57','短片电影《Blind Love》','ux30701ux29255,ux30005ux24433,ux66ux108ux105ux110ux100,ux76ux111ux118ux101,ux30701ux29255ux30005ux24433ux12298ux66ux108ux105ux110ux100ux76ux111ux118ux101ux12299,ux30701ux29255ux30005ux24433ux12298ux66ux108ux105ux110ux100ux76ux111ux118ux101ux12299','短片,电影,Blind,Love,短片电影《Blind Love》,短片电影《Blind Love》','./public/attachment/201211/07/11/0c067c4522bba51595c324028be7070d11.jpg','http://player.youku.com/embed/XMzgyNjMzNDA4','http://v.youku.com/v_show/id_XMzgyNjMzNDA4.html','30','1349034009','1655062800','1','3000.00','我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。','<p>\r\n	我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。\r\n</p>\r\n<p>\r\n	这是一个需要爱与被爱的世界，然而在我们面对这纷繁复杂多变的世界时，我们如何过滤掉那迷乱双眼的尘沙找到真爱？我们在爱中得救，在爱中迷失。我们过度相信我们用双眼所见的，却忘记听从内心最真的感受！\r\n</p>\r\n<p>\r\n	我们一路奔跑、一路追逐，生活的洪流把我们涌向未来不确定的方向，我们有着一双能望穿苍穹的眼睛，却不断的迷失在路途中。如果有一天我们的双眼失去光明……\r\n</p>\r\n<p>\r\n	真爱是否还遥远？\r\n</p>\r\n<p>\r\n	导演武秋辰将用电影语言为我们讲述一位盲人画家的爱情故事，如同她所写道的：“我们视觉正常的人很容易被表象所迷惑，而我们的触觉，听觉和嗅觉却非常的精准，给我们带来更丰富的感知。”当我们不仅凭双眼去认识这个世界的时候，也许答案就在那里！\r\n</p>\r\n<p>\r\n	为了使影片更富深入性、更具专业性，导演请来了好莱坞的职业演员，就连剧中的盲人画像也由美国著名画家OlyaLusina特为此片创作。\r\n</p>\r\n<p>\r\n	该片不仅是一个远赴美国实现梦想的中国女孩的心血之作，同时也深刻展现了一个盲人心中的世界，从“他”的角度为因爱迷失的人们找到了一个诗意的出口。\r\n</p>\r\n<p>\r\n	在这里，真诚地感谢您的关注！关注武秋辰和她的《BlindLove》！\r\n</p>\r\n<h3>\r\n	自我介绍<br />\r\n</h3>\r\n<p>\r\n	我是一个在美国学电影做电影的中国女孩。在美国圣地亚哥大学电影系求学的过程中，我学会了编剧，导演，拍摄和剪辑，参与了几十部电影的创作。“盲爱”是我在硕士毕业后自编自导的第一部独立电影作品。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"./public/attachment/201211/07/16/148cb883cbb170735c331125a96c11e162o5700.jpg\" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"./public/attachment/201211/07/16/875016977d65ee2cc679ab0cfd7a7f6620o5700.jpg\" /><br />\r\n<br />\r\n</p>','0','0','0','4','1','0.00','0.00','0.00','1352230821','','','','短片 电影 Blind Love','ux30701ux29255,ux30005ux24433,ux66ux108ux105ux110ux100,ux76ux111ux118ux101','短片,电影,Blind,Love','0','0','3','福建','福州','17','0','fanwe','1','1','0','','0','','0','0','0','0.00','','0','','','0','','','','','','','','','','','','0','0','0','0','0','0','','','0','0','','0','0','0.00','0.00','0','0.00','0','0','0.00','0','0.00','','','0','','0.00','0','0','0.00','0','','','0.00','','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('60','筹建康平羽毛球馆，为羽毛球爱好者建一个温暖的家！','ux24247ux24179,ux32701ux27611ux29699ux39302,ux31609ux24314,ux32701ux27611ux29699,ux29233ux22909ux32773,ux28201ux26262,ux19968ux20010,ux31609ux24314ux24247ux24179ux32701ux27611ux29699ux39302ux65292ux20026ux32701ux27611ux29699ux29233ux22909ux32773ux24314ux19968ux20010ux28201ux26262ux30340ux23478ux65281','康平,羽毛球馆,筹建,羽毛球,爱好者,温暖,一个,筹建康平羽毛球馆，为羽毛球爱好者建一个温暖的家！','./public/attachment/201602/29/01/56d3344294c5f.jpg','','','30','1456653461','1461837465','1','30000.00','康平县是一个经济落后的辽北小县城，靠近内蒙边界，体育、文化设施落后，没有专业羽毛球场馆，有时羽毛球爱好者不得不远程跋涉去外地市县打球，急需专业场馆！','<div class=\"xqLeftTitleBox\" style=\"margin:10px 0px;padding:0px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	<div class=\"xqLeftTitleInner\" style=\"margin:0px;padding:0px;text-align:center;\">\r\n		<h2 style=\"font-size:18px;vertical-align:top;color:#50ABF2;\">\r\n			羽毛球场馆——康平羽毛球爱好者的梦！\r\n		</h2>\r\n	</div>\r\n</div>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	这是一个关于梦想的故事，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	这是一个让生命更健康的话题，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	这里承载着欠发达地区对一项运动的渴望，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	这里争取为羽毛球爱好者建一个温暖的家，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	远离城市喧嚣的小县城有这么一群人，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们热爱生活，喜欢运动，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们舞动球拍，让快乐羽你同行，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们冬练三九，夏练三伏，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们东奔西走，四处找场地打球，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们不惧舟车劳顿，只为在球场上挥洒汗水，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们没有专业场地，但却屡创奇迹，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们是康平县羽毛球爱好者，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	他们的梦想是有一个专业的场馆，温暖的家，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	请您为康平县羽毛球馆筹建贡献一份力量，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	我们不会忘记您，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	我们不会忘记您在羽毛球馆筹建中的付出，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	我们真诚欢迎您，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	我们真诚欢迎您在羽毛球馆落成后的到来！\r\n</p>\r\n<img src=\"http://zcr6.ncfstatic.com/attachment/201602/14/08/56bfc694737f21a_t4_369x246_thumb_670x0.jpg\" alt=\"筹建康平县羽毛球馆，为康平县羽毛球爱好者建一个温暖的家！ (公益活动,公益创业,运动,健康,羽毛球)\" title=\"筹建康平县羽毛球馆，为康平县羽毛球爱好者建一个温暖的家！ (公益活动,公益创业,运动,健康,羽毛球)\" class=\"lazy1 go\" style=\"height:246px;width:369px;\" /> \r\n<div class=\"xqLeftTitleBox\" style=\"margin:10px 0px;padding:0px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	<div class=\"xqLeftTitleInner\" style=\"margin:0px;padding:0px;text-align:center;\">\r\n		<h2 style=\"font-size:18px;vertical-align:top;color:#50ABF2;\">\r\n			羽毛球馆筹建预算\r\n		</h2>\r\n	</div>\r\n</div>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	标准羽毛球场地的尺寸为：13.4M×6.1M，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	球场边线离建筑物外墙边线至少为1M，球场一侧设置观众座椅，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	单个羽毛球场地的占地建筑面积为：16.0×10.0≈160M2。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	球馆的结构为：混凝土框架，空心砖墙填充，普通抹灰、蓝色涂料粉刷，\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	断桥铝门窗、双层真空玻璃冷合，彩钢棚顶、地面为木地板油漆，铺设专业地胶。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	主体建筑600元／M2、地板100元/M2、采暖80元/M2、水电30元/M2、灯光20元/M2、设备（家具、网等等）10元／M2、其他10元/M2。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	塑胶地板：8000元/条,\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	管理支出：6000元。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	羽毛球馆单块场地造价：\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	850元/平方米×160平方米+8000+6000≈15万元；\r\n</p>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	备注：此预算未考虑占地费用。\r\n</p>\r\n<img src=\"http://zcr6.ncfstatic.com/attachment/201602/14/08/56bfcea10715b1a_t4_497x655_thumb_670x0.jpg\" alt=\"筹建康平县羽毛球馆，为康平县羽毛球爱好者建一个温暖的家！ (公益活动,公益创业,运动,健康,羽毛球)\" title=\"筹建康平县羽毛球馆，为康平县羽毛球爱好者建一个温暖的家！ (公益活动,公益创业,运动,健康,羽毛球)\" class=\"lazy1 go\" style=\"height:655px;width:497px;\" /> \r\n<div class=\"xqLeftTitleBox\" style=\"margin:10px 0px;padding:0px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	<div class=\"xqLeftTitleInner\" style=\"margin:0px;padding:0px;text-align:center;\">\r\n		<h2 style=\"font-size:18px;vertical-align:top;color:#50ABF2;\">\r\n			康平县羽毛球馆执行计划\r\n		</h2>\r\n	</div>\r\n</div>\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	场馆地理位置位于东关街道关家屯村，门前为东五线，是康平至方家的必经之路，距离国道203线300米，距离迎宾路2.4公里，交通便利，从县城内出发，车程不超过十分钟。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	场馆拟按标准场地建设，混凝土框架，顶高8米，空心砖墙填充，普通抹灰、蓝色涂料粉刷，断桥铝门窗、双层真空玻璃冷合，彩钢棚顶、地面为龙骨实木地板油漆，铺设专业地胶，球场侧面悬挂式防炫光直排灯管照明，锅炉供暖。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	场馆将于2016年3月未动工，主体部分将于2016年5月30日前完工，室内装修时间为40天，整体工程预计2016年7月18日前全部完成并投入使用。\r\n</p>\r\n<br />\r\n<p style=\"font-size:13px;font-family:\'Microsoft YaHei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;color:#333333;background-color:#FFFFFF;\">\r\n	场馆建成后开放时间为每日9:00至21:00，节假日不休息，致力于打造康平地区专业羽毛球场馆！\r\n</p>\r\n<h3>\r\n</h3>','0','0','0','0','0','0.00','0.00','0.00','1456653308','','','','康平 羽毛球馆 筹建 羽毛球 爱好者 温暖 一个','ux24247ux24179,ux32701ux27611ux29699ux39302,ux31609ux24314,ux32701ux27611ux29699,ux29233ux22909ux32773,ux28201ux26262,ux19968ux20010','康平,羽毛球馆,筹建,羽毛球,爱好者,温暖,一个','0','0','18','北京','朝阳区','20','0','vitakung','0','0','0','','0','','1','0','0','0.00','','0','','','3','','','','','','','','','','','','0','0','0','0','0','0','','','0','0','','0','0','0.00','0.00','0','0.00','0','0','0.00','0','0.00','','','0','','0.00','0','0','0.00','0','','','0.00','','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('58','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','ux21654ux21857ux39302,ux37325ux24314,ux20844ux30410,ux27969ux28010,ux21147ux37327,ux38656ux35201,ux22825ux20351,ux22823ux23478,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281','咖啡馆,重建,公益,流浪,力量,需要,天使,大家,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','./public/attachment/201211/07/11/438813e6d75cb84c6b0df8ffbad7aa8c31.jpg','http://www.tudou.com/v/153527563/v.swf','http://www.tudou.com/listplay/i67lCgQt5nQ/i9toRdup3ok.html','50','1352145022','1497297000','1','3000.00','爱天使成立的猫天使驿站三年多收养救助了两百余只的流浪猫并为它们找到了一个个温暖的家。','<p>\r\n	爱天使成立的猫天使驿站三年多收养救助了两百余只的流浪猫并为它们找到了一个个温暖的家。爱天使是一种爱，更是一种生活！坚持个人信念的我一直努力活出这个世上不一般的价值人生。那就是不追求自己能拥有什么而在能为自己以外的生命带去什么。。。爱天使在今年因合同到期而到了转折点，重建是艰辛的却也坚信必将更加强大。\r\n</p>\r\n<h3>\r\n	【关于我】——将救助流浪猫视为自己的事业！\r\n</h3>\r\n<p>\r\n	首先做个自我介绍：\r\n</p>\r\n<p>\r\n	我叫李文婷，英文名ANGELLI。\r\n</p>\r\n<p>\r\n	是一名爱猫如命的“狂热分子”，\r\n</p>\r\n<p>\r\n	作为流浪猫的代理麻麻已收养救助过两百余只猫咪；\r\n</p>\r\n<p>\r\n	00年在大学校园宿舍开始拨号上网的网络生活，\r\n</p>\r\n<p>\r\n	担任系学生会副主席及宣传部长等，\r\n</p>\r\n<p>\r\n	参与系女篮队、校诗朗诵比赛、主持系选举活动，\r\n</p>\r\n<p>\r\n	组织带领系队作为一辩参加校辩论赛获得季军，\r\n</p>\r\n<p>\r\n	毕业后于厦门海尔及三五互联等公司工作近六年。\r\n</p>\r\n<p>\r\n	工作中一直表现突出主持公司千人晚会并荣获过部门最高荣誉奖。\r\n</p>\r\n<p>\r\n	08年辞去部门经理一职后成为SOHO一族，\r\n</p>\r\n<p>\r\n	经营LA爱天使韩国饰品成为淘宝卖家。\r\n</p>\r\n<p>\r\n	于短短半年间毫无虚假的升为二钻一年后升至三钻，\r\n</p>\r\n<p>\r\n	于09年6月20日在老爸大力的支持下经营爱天使咖啡馆，\r\n</p>\r\n<p>\r\n	于2010年10月创办猫天使驿站正式收养救助流浪猫，\r\n</p>\r\n<p>\r\n	先后接受了海峡导报厦门卫视等媒体及大学生的多次采访报道。\r\n</p>\r\n<p>\r\n	三年间收养救助了两百余只流浪猫并为它们找到了一个个温暖的家。\r\n</p>\r\n<p>\r\n	与仔仔、全全、QQ、EE四只咪咪一起相伴爱天使救命流浪猫的生活。\r\n</p>\r\n<p>\r\n	爱天使就是流浪猫们的家，是我将用余生为之奋斗的事业！\r\n</p>\r\n将“关爱弱小弱势生命，传递爱分享快乐”救助流浪猫视为毕生为之努力的事业。<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/dda29128a6310c273da111f1f30296c172o5700.jpg\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/c7650c3dd93e5585dbfad780ba3bbced31o5700.jpg\" /><br />\r\n<br />\r\n<br />','1','2','1','5','1','5000.00','4500.00','0.00','1352231478','','','','咖啡馆 重建 公益 流浪 力量 需要 天使 大家','ux21654ux21857ux39302,ux37325ux24314,ux20844ux30410,ux27969ux28010,ux21147ux37327,ux38656ux35201,ux22825ux20351,ux22823ux23478','咖啡馆,重建,公益,流浪,力量,需要,天使,大家','1434136659','1','7','福建','福州','17','0','fanwe','1','1','0','','0','','0','0','0','0.00','','0','','','0','','','','','','','','','','','','0','0','0','0','0','0','','','0','0','','0','0','0.00','0.00','0','0.00','0','0','0.00','0','0.00','','','0','','0.00','1','0','4500.00','0','','','0.00','','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('59','保护梁子湖，我们在行动。','ux26753ux23376ux28246,ux34892ux21160,ux20445ux25252,ux25105ux20204,ux20445ux25252ux26753ux23376ux28246ux65292ux25105ux20204ux22312ux34892ux21160ux12290','梁子湖,行动,保护,我们,保护梁子湖，我们在行动。','./public/attachment/201602/29/01/56d332260f424.jpg','','','30','1456653037','1459331439','1','30000.00','梁子湖烟波浩渺，水质澄清，面积42万亩，是全国十大名湖之一，湖北省第二大淡水湖，武昌鱼的母亲湖。湖内动植物资源丰富多彩，有脊椎动物280多种，水生高等','<h3>\r\n</h3>\r\n<div>\r\n	千湖之省的美丽眼睛—梁子湖<br />\r\n梁子湖烟波浩渺，水质澄清，面积42万亩，是全国十大名湖之一，湖北省第二大淡水湖，武昌鱼的母亲湖。湖内动植物资源丰富多彩，有脊椎动物280多种，水生高等植物282种，是“水中大熊猫”桃花水母的栖息地，被誉为化石型湖泊和物种基因库，具有独特的生态价值，是湖北乃至全国的一个十分珍贵的湖泊湿地资源。<br />\r\n保护梁子湖，我们在行动。 (公益活动,绿色环保,绿色,青春,公益)<br />\r\n我们为什么这么做<br />\r\n如果世界上连一滴干净的水，一口新鲜的空气都没有，挣再多的钱，都是死路一条。——周星驰《美人鱼》<br />\r\n<br />\r\n一直以来，由于梁子湖流域的人口不断增加、产业发展和城镇化建设快速推进，加之一些保护措施跟不上等因素，水面面积不断缩小，其水质污染态势不容乐观。有专家担忧，一旦梁子湖流域生态环境进一步恶化，很可能沦为第二个“滇池”。<br />\r\n<br />\r\n幸运的是，我们觉悟的还算早。违法捕鱼的控制、围网被拆除、污染严重企业被关停取缔等等，一系列举措有效遏制了梁子湖生态环境恶化的步伐。2013年，梁子湖区政府划定严禁挖山、严禁填湖、严禁未批先建“三条红线”，在全域范围内全面退出一般性工业。2015年，鄂州市政府先后下发了《关于印发梁子湖（鄂州）生态文明示范区建设规划（2014-2020）》和《关于加快推进绿满鄂州行动的意见》，进一步明确了要加强梁子湖的生态文明建设。<br />\r\n保护梁子湖，我们在行动。 (公益活动,绿色环保,绿色,青春,公益)<br />\r\n我们做了什么<br />\r\n一直以来，为保护梁子湖的生态环境，鄂州市志愿者协会组织了志愿者开展植树造林、湿地保护宣传等活动，并协助相关部门宣教和制止非法捕捞行为。经过近几年的努力，我们在梁子湖流域植树达1万余株，有多个社会志愿组织加入到保护梁子湖的倡导行动中来，相关单位对梁子湖的生态文明建设也越来越重视，广大市民对保护梁子湖的意识越来越强。特别是2015年，我们通过众筹网，设计了“捐十元在梁子湖边种一棵爱心树”的公益项目”，成功筹集7万余元，分别在梁子湖区的沼山镇新桥村和梁子镇毛塘村开展植树造林活动，活动得到了社会各界的广泛支持，取得非常好的效果。<br />\r\n保护梁子湖，我们在行动。 (公益活动,绿色环保,绿色,青春,公益)保护梁子湖，我们在行动。 (公益活动,绿色环保,绿色,青春,公益)<br />\r\n我们将要做什么<br />\r\n您可以认捐树苗，共筑梁子湖生态梦；或者，您也可以联系我们，报名成为一名保护梁子湖生态环境的光荣志愿者。<br />\r\n<br />\r\n1、筹款达到10000元后，我们将在4月份集中组织志愿者到梁子湖畔种下1000棵爱心树。<br />\r\n<br />\r\n2、遵循适地适树的原则，以当地树种为主。严选地块、进行造林设计、管护规划，确保成活率。<br />\r\n<br />\r\n3、整个项目实施，我们将及时发布项目进展情况。<br />\r\n活动预算<br />\r\n1、所筹10000元全部用于购买树苗，按照每10元种一棵树的预算，共种下1000棵爱心树。<br />\r\n<br />\r\n2、所有捐款我们会完全公开明细，接受大家监督。<br />\r\n<br />\r\n3、组织植树活动需要的交通车辆、树苗运输、植树工具等费用，由项目发起方自行解决。<br />\r\n我们将给予什么回报<br />\r\n1、每捐款10元，将在梁子湖畔对应种下一颗爱心树。<br />\r\n<br />\r\n2、捐款50元（含）以上，您本人可参加我们的植树活动；捐款100元（含）以上，您和您的家人或朋友（不超过3人）棵参加我们的植树活动。<br />\r\n<br />\r\n3、捐款1000元（含）以上，您可组织不超过10人团队参加我们的植树活动，并为树木命名。<br />\r\n<br />\r\n4、捐款5000元（含）以上，您可组织不超过30人团队参加我们的植树活动，并为成片的树林命名。<br />\r\n<br />\r\n请将捐款成功页面截图、姓名、联系方式发送至ezhouvolunteer@163.com ，我们的工作人员会及时跟您取得联系。您也可以直接联系我们，将您的需求告诉我们。<br />\r\n保护梁子湖，我们在行动。 (公益活动,绿色环保,绿色,青春,公益)<br />\r\n<br />\r\n</div>','0','0','0','0','0','0.00','0.00','0.00','1456652774','','','','梁子湖 行动 保护 我们','ux26753ux23376ux28246,ux34892ux21160,ux20445ux25252,ux25105ux20204','梁子湖,行动,保护,我们','0','0','10','北京','朝阳区','20','0','vitakung','0','0','0','','0','','1','0','0','0.00','','0','','','0','','','','','','','','','','','','0','0','0','0','0','0','','','0','0','','0','0','0.00','0.00','0','0.00','0','0','0.00','0','0.00','','','0','','0.00','0','0','0.00','0','','','0.00','','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('61','邦美智洗洗衣店O2O智能管理系统','','','./public/attachment/201602/29/02/56d3411e2dc6c.png','','','0','1454323933','1461840736','1','20000000.00','','','0','0','0','0','0','0.00','0.00','0.00','1456656546','','','','互联网+','','','0','0','18','北京','海淀区','20','0','vitakung','0','0','0','','0','','0','0','0','0.00','','0','','','1','<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;line-height:24px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>','<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;line-height:24px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>','<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;line-height:24px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>','<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;line-height:24px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>','<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;line-height:24px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>','<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>','a:2:{i:0;a:7:{s:4:\"name\";s:1:\"A\";s:3:\"job\";s:9:\"总经理\";s:12:\"is_full_time\";s:6:\"全职\";s:5:\"share\";d:90;s:12:\"invest_money\";s:3:\"500\";s:8:\"relation\";s:0:\"\";s:8:\"describe\";s:729:\"<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>\";}i:1;a:7:{s:4:\"name\";s:1:\"B\";s:3:\"job\";s:6:\"监事\";s:12:\"is_full_time\";s:6:\"全职\";s:5:\"share\";d:10;s:12:\"invest_money\";s:3:\"100\";s:8:\"relation\";s:0:\"\";s:8:\"describe\";s:729:\"<span style=\"color:#32353D;font-family:\'Lantinghei SC\', \'Open Sans\', Arial, \'Hiragino Sans GB\', \'Microsoft YaHei\', 微软雅黑, STHeiti, \'WenQuanYi Micro Hei\', SimSun, sans-serif;font-size:13px;background-color:#F6F6F6;\">1、创始人王贵亮作风扎实为人刚毅，对业务了解，执行能力强；合伙人李成宇技术运营经验丰富，两人有较强的互补性。\r\n 2、SaaS整合现有洗衣资源模式较轻，业务扩张成本较低，容易整合广大社区服务资源。团队在转型前从事洗衣b2c业务，建立了较完善的标准化的符合行业需求的业务系统，能够提供满足用户需求的Saas服务。\r\n 3、团队有较好的成本控制机制，投资风险可控。</span>\";}}','a:0:{}','a:0:{}','a:0:{}','a:0:{}','0','0','1454227200','11','1','0','北京猫力网科技有限公司','北京市海淀区中关村创业大街','0','0','依托互联网及移动互联网产品级解决方案，面向洗衣服务商提供全流程信息化软件服务（SaaS），包括订单获取，订单汇集，物流管理，生产管理，客服管理，数据分析，营销方案支持等方面。帮助传统洗衣企业降低运营费用，提高管理效率，实现“互联网+”落地效应。','1467111140','1','','30.00','0','0.00','0','0','0.00','0','5000000.00','','a:7:{s:8:\"legal_id\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}s:12:\"legal_credit\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}s:16:\"business_license\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}s:28:\"tax_registration_certificate\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}s:17:\"organization_code\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}s:13:\"company_photo\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}s:13:\"site_contract\";a:3:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";s:12:\"display_type\";s:1:\"0\";}}','0','','0.00','0','0','0.00','0','不断创新，保持领先，2年之内成为最优秀洗衣行业软件服务提供商，占据主导市场份额；寻找其它传统行业SaaS整合机会，横向发展，成为一家综合软件服务提供商。','回购是指公司的管理层购买本公司的股份，从而使得本公司股权结构、控制权结构发生变化，并使得企业的原经营者变成了企业的所有者的一种收购行为。','0.00','1','','1','0','0','0','0','','','','','','','','0.00','0','0','0','','','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate`;
CREATE TABLE `%DB_PREFIX%deal_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='// 项目分类';
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('1','设计','1','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('2','科技','2','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('3','影视','3','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('4','摄影','4','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('5','音乐','5','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('6','出版','6','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('7','活动','7','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('8','游戏','8','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('9','旅行','9','0','0');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('10','其他','10','0','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_comment`;
CREATE TABLE `%DB_PREFIX%deal_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL COMMENT '回复的评论ID',
  `deal_user_id` int(11) NOT NULL COMMENT '项目发起人的ID',
  `reply_user_id` int(11) NOT NULL COMMENT '回复的评论的评论人ID',
  `deal_user_name` varchar(255) NOT NULL,
  `reply_user_name` varchar(255) NOT NULL,
  `deal_info_cache` text NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '状态0 表示隐藏 ，1 表示 显示',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`),
  KEY `log_id` (`log_id`),
  KEY `pid` (`pid`),
  KEY `deal_user_id` (`deal_user_id`),
  KEY `reply_user_id` (`reply_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 COMMENT='// 项目评论';
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('170','55','加油哦！','18','1352229601','26','fzmatthew','0','17','0','fanwe','','','0');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('171','56','感谢支持！！','18','1352230363','27','fzmatthew','0','18','0','fzmatthew','','','0');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('172','57','好好加油！','18','1352230882','28','fzmatthew','0','17','0','fanwe','','','0');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('173','57','回复 fzmatthew:一定会的。','17','1352230924','28','fanwe','172','17','18','fanwe','fzmatthew','','0');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('174','58','感谢','17','1352231585','29','fanwe','0','17','0','fanwe','','','0');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('175','58','感谢大家的支持','17','1352231787','0','fanwe','0','17','0','fanwe','','','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_faq`;
CREATE TABLE `%DB_PREFIX%deal_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COMMENT='//项目常见问题解答';
INSERT INTO `%DB_PREFIX%deal_faq` VALUES ('103','56','我们的咖啡馆在哪里？','目前暂定的店址，是在延安西路、重庆北路附近。','1');
INSERT INTO `%DB_PREFIX%deal_faq` VALUES ('104','56','我们的咖啡馆大概有多大？','目前定的店址面积约在200平米以内，有上下两层，底楼较小，二层是整个一层。','2');
INSERT INTO `%DB_PREFIX%deal_faq` VALUES ('105','56','咖啡馆筹备的进度是？','由于各种的原因，在寻找店址的过程中，先先后后放弃了很多地方，目前找的店址，在办证、面积、交通等方面都较理想。所以基本确定了地方，正在积极办理营业执照及设计各方面的工作，同时也在现有资金的基础上，募集更多的资金及支持。目前店面的装修免租期约在2个月内，所以离正式开业还需要一些时日。','3');
INSERT INTO `%DB_PREFIX%deal_faq` VALUES ('101','58','流浪猫与爱天使咖啡是什么关系呢？','爱天使就是收养救助流浪猫的咖啡馆。因为救助需要资金与空间，这个资金的最好来源一定是要有一个有收益的项目来支撑而非单纯靠募捐方式，否则容易造成依赖与被动，当然其实也因自己个性好强。 在繁殖季爱天使最多一天能收到3-6只的流浪猫，三年间独自一人艰难维持并收养救助两百多只流浪猫，所需空间资金精力全部由我个人维持。','1');
INSERT INTO `%DB_PREFIX%deal_faq` VALUES ('102','58','新店确定了吗？装修顺利吗？在哪里呢？','新店终于在几经各方协商后于前日确定于文化艺术中心广场正中间（五一文化广场中间文化宫左边，图书馆对面，大润发楼上正中间）的玻璃房。昨天开始了紧张的重新设计装修中。关于搬店的过程几经周折的磨难苦不堪言。因为新店面积比老店小了，而东西只能先搬过去，而里面要装修所以大柜子都没办法先放进去。里面也已堆满了东西，装修师傅找了五个都不愿意接，因为太多东西很影响装修。东西要一直搬来搬去，现在全部是灰，之后又是一大堆的卫生清洁整理工作，已有很多东西因此受到损坏了。。。新店是转过来了付了一大笔转让费未想因为要重装再装修又要投入两万多的改装费，这笔当时完全忘记预算在内了。。。 不过现在顺利的进入装修重新开业在即。谢谢大家的关注支持！我会让爱天使尽快走回正轨。','2');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_finance_cate`;
CREATE TABLE `%DB_PREFIX%deal_finance_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='// 融资分类';
DROP TABLE IF EXISTS `%DB_PREFIX%deal_focus_log`;
CREATE TABLE `%DB_PREFIX%deal_focus_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='// 项目焦点';
INSERT INTO `%DB_PREFIX%deal_focus_log` VALUES ('32','58','18','1352231518');
INSERT INTO `%DB_PREFIX%deal_focus_log` VALUES ('33','56','17','1352232247');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_house_cate`;
CREATE TABLE `%DB_PREFIX%deal_house_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='// 众筹买房分类';
DROP TABLE IF EXISTS `%DB_PREFIX%deal_image`;
CREATE TABLE `%DB_PREFIX%deal_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='//项目图片';
INSERT INTO `%DB_PREFIX%deal_image` VALUES ('68','60','./public/attachment/201602/29/01/56d3343ba037a.jpg');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_info_list`;
CREATE TABLE `%DB_PREFIX%deal_info_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL COMMENT '项目ID',
  `type` tinyint(1) NOT NULL COMMENT '类型 0 非股权团队 1 股权团队 2 项目历史 3 计划  4 项目附件',
  `name_list` text NOT NULL,
  `descrip_list` text NOT NULL,
  `pay_list` text NOT NULL COMMENT '支出列表',
  `income_list` text NOT NULL COMMENT '收入列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_investor_cate`;
CREATE TABLE `%DB_PREFIX%deal_investor_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='// 股权众筹分类';
INSERT INTO `%DB_PREFIX%deal_investor_cate` VALUES ('18','互联网+','1','0','1');
INSERT INTO `%DB_PREFIX%deal_investor_cate` VALUES ('19','实体店铺','2','0','1');
INSERT INTO `%DB_PREFIX%deal_investor_cate` VALUES ('20','影视项目','3','0','1');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_item`;
CREATE TABLE `%DB_PREFIX%deal_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL COMMENT '金额',
  `support_count` int(11) NOT NULL,
  `support_amount` decimal(20,2) NOT NULL COMMENT '支持量',
  `description` text NOT NULL,
  `is_delivery` tinyint(1) NOT NULL,
  `delivery_fee` decimal(20,2) NOT NULL COMMENT '支付金额',
  `is_limit_user` tinyint(1) NOT NULL COMMENT '是否限',
  `limit_user` int(11) NOT NULL COMMENT '限额数量',
  `repaid_day` int(11) NOT NULL COMMENT '项目成功后的回报时间',
  `virtual_person` int(11) NOT NULL,
  `is_share` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否分红',
  `share_fee` decimal(20,2) NOT NULL COMMENT '分红金额',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 表示回报类型 1表示无私奉献 2抽奖型',
  `lottery_measure` int(11) NOT NULL COMMENT '抽奖量数',
  `maxbuy` int(11) NOT NULL COMMENT '会员购买量',
  `lottery_draw_time` int(11) NOT NULL COMMENT '开奖时间：大于0表已开奖，0未开奖',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='// 项目回报';
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('17','55','10.00','0','0.00','我们将以平信的方式寄出2款桌游的首发纪念牌，随机赠送部分游戏牌（至少5张）并在游戏说明书中致谢','1','0.00','0','0','60','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('18','55','15.00','1','15.00','我们将回报《黄金密码》1套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）','1','5.00','0','0','60','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('19','55','30.00','0','0.00','我们将回报《黄金密码》、《功夫》各1套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）','1','5.00','0','0','60','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('20','55','50.00','0','0.00','我们将回报《黄金密码》、《功夫》各2套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）','1','5.00','0','0','60','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('21','55','500.00','0','0.00','我们将回报《黄金密码》40套，赠送首发纪念牌并在游戏说明书中致谢，同时还将在首发纪念牌上印上您的姓名或公司名称致谢！（限额2名）。（国内包邮）','1','0.00','0','0','60','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('22','56','50.00','0','0.00','你将收到小组成员，在旅行中为你寄出的一张祝福明信片\r\n你将成为我们开业PARTY的座上嘉宾\r\n所以，请留下你的联系方式（电话，地址及邮编）','1','0.00','0','0','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('23','56','200.00','0','0.00','你将获得咖啡馆开业后永久9折会员卡一张（会员卡可用于借阅书籍，并在生日当天获得免费饮料一杯）\r\n店内旅行纪念手信一份（价值在50元以内）\r\n成为开业PARTY的邀请来宾','1','0.00','0','0','60','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('24','56','500.00','11','5500.00','你将获得咖啡馆开业后永久9折会员卡一张（会员卡可用于借阅书籍，并在生日当天获得免费饮料一杯）\r\n一份店内招牌下午茶套餐的招待券\r\n免费参加店内组织的活动（各类分享会、试吃体验等等）\r\n成为开业PARTY的邀请来宾','1','0.00','0','0','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('25','57','60.00','0','0.00','电影签名海报和明信片。全国包邮。','1','0.00','0','0','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('26','57','150.00','0','0.00','电影DVD的拷贝一张，以及片尾特别感谢。全国包邮。','1','0.00','0','0','55','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('27','57','600.00','0','0.00','一个崭新的印有影片标志的8GB快闪储存器（flash drive), 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）, 以及片尾特别感谢。（所有DVD均有中文字幕），全国包邮。','1','0.00','1','20','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('28','57','1200.00','0','0.00','电影签名海报和明信片， 一个崭新的印有影片标志的8GB快闪储存器（flash drive), 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）, 以及片尾特别感谢。（所有DVD均有中文字幕）全国包邮。','1','0.00','1','5','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('29','57','3000.00','0','0.00','成为影片的联合制片人（associate producer), 8GB的快闪储存器（flash drive)， 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）。（所有DVD均有中文字幕） 全国包邮。','1','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('30','58','1000.00','0','0.00','爱的礼物：精美工艺品及红酒。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及价值399元的澳洲红宝龙红酒一瓶！你将成为爱天使的终生会员。。。','1','0.00','0','0','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('31','58','2000.00','1','2000.00','爱的礼物：精美工艺品红酒及晚餐。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及澳洲红宝龙红酒一瓶及邀请你到爱天使享受晚餐！你将成为爱天使的终生会员。。。','1','0.00','0','0','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('32','58','3000.00','1','3000.00','爱的礼物：精美工艺品及红酒及晚餐。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及价值688元的澳洲康纳瓦拉红酒一瓶及邀请你到爱天使享受晚餐！你将成为爱天使的终生会员。。。','1','0.00','0','0','50','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('33','59','0.00','0','0.00','感谢您的支持，您将收到我们寄出的信件或贺卡，这份支持将助我们的梦想飞的更高更远。','0','0.00','0','0','0','0','0','0.00','1','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('34','59','10.00','0','0.00','支持10元种下一棵爱心树\r\n感谢您的无私奉献，将为您在梁子湖畔种下一棵爱心树，这份捐赠将助我们的梦想飞的更高更远。您将收到一封来自梁子湖边的感谢信。','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('35','59','50.00','0','0.00','参与植树活动\r\n本人可以参加植树活动。您将收到一封来自梁子湖边的感谢信。','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('36','59','100.00','0','0.00','家庭亲子植树活动。\r\n您和您的家人（不超过3人）可以参加植树活动。您将收到一封来自梁子湖边的感谢信。','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('37','59','1000.00','0','0.00','组织团队参与植树活动，并为树木命名。\r\n您可组织不超过10人团队参加植树活动，并为树木命名。您将收到一封来自梁子湖边的感谢信。','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('38','60','0.00','0','0.00','感谢您的支持，您将收到我们寄出的信件或贺卡，这份支持将助我们的梦想飞的更高更远。','0','0.00','0','0','0','0','0','0.00','1','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('39','60','100.00','0','0.00','青铜会员\r\n场馆建成后馈赠8次打球次数， 每次不超过3个小时，限一个月内用完！','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('40','60','500.00','0','0.00','白银会员\r\n场馆建成后馈赠20次打球次数， 每次不超过3个小时，限3个月内用完！','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
INSERT INTO `%DB_PREFIX%deal_item` VALUES ('41','60','1000.00','0','0.00','黄金会员\r\n场馆建成后馈赠40次打球次数， 每次不超过3个小时，限6个月内用完！','0','0.00','0','0','10','0','0','0.00','0','0','0','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_item_image`;
CREATE TABLE `%DB_PREFIX%deal_item_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_item_id` (`deal_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COMMENT='//项目回报图片';
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('40','55','18','./public/attachment/201211/07/10/1df0db265b86352e3886b9c62e8ef01b18.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('41','55','18','./public/attachment/201211/07/10/4a4a8bdca29b165b7bd5f510ce200c4385.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('42','55','18','./public/attachment/201211/07/10/c8223b4192fc39e4a3dce8a986eccf3994.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('43','55','19','./public/attachment/201211/07/10/a37a306a3bedaa664011115de251576034.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('44','55','20','./public/attachment/201211/07/10/cc12200a637c9db1dcf7354e592f220985.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('45','55','21','./public/attachment/201211/07/10/d65e7badd7098a0922db2b49c2fd8ef011.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('46','56','22','./public/attachment/201211/07/11/5d379d45a98db1816b027e85d59ca47c58.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('47','56','23','./public/attachment/201211/07/11/1ed8f029594ec5e809d95d8074fe3d2760.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('48','56','24','./public/attachment/201211/07/11/b08505b20319f493cbc03debd52eceb474.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('49','56','24','./public/attachment/201211/07/11/18b75305fe13c623363abb4ab995f6af34.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('50','57','25','./public/attachment/201211/07/11/7ecd287a12bff4289d305c0fb949889e29.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('51','57','26','./public/attachment/201211/07/11/d84152ab2d569c584c795018846cbb7233.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('52','57','27','./public/attachment/201211/07/11/bdefb72e944b41b60a751d50d0d84fe983.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('53','57','28','./public/attachment/201211/07/11/c0df234411b34427dedb121ab9bd577352.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('54','57','28','./public/attachment/201211/07/11/9c82e2a30f02513d0a197f3d4573794e76.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('55','57','29','./public/attachment/201211/07/11/326730647fde78562777b82f0a9e81a155.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('56','58','30','./public/attachment/201211/07/11/06bab2f2823bdd050ef8949162bf717729.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('57','58','31','./public/attachment/201211/07/11/c835e1fd43685e3106c4de641f70cf2b62.jpg');
INSERT INTO `%DB_PREFIX%deal_item_image` VALUES ('58','58','32','./public/attachment/201211/07/11/44036ee2e369e9c91be966a329cac70084.jpg');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_level`;
CREATE TABLE `%DB_PREFIX%deal_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '等级名',
  `level` int(11) DEFAULT NULL COMMENT '等级大小   大->小',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='//项目等级';
DROP TABLE IF EXISTS `%DB_PREFIX%deal_log`;
CREATE TABLE `%DB_PREFIX%deal_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  `comment_data_cache` text NOT NULL,
  `deal_info_cache` text NOT NULL,
  `update_log_icon` varchar(255) NOT NULL COMMENT '动态展示小图标(暂时房产众筹用到)',
  `houses_status` varchar(255) NOT NULL COMMENT '楼盘阶段',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='//项目的动态，主要由发起人更新动态进度';
INSERT INTO `%DB_PREFIX%deal_log` VALUES ('26','功夫图文说明书1','1352229555','17','fanwe','55','./public/attachment/201211/07/11/5d2a94ce2a3db73277fb04be463365a255.jpg','','','','','','');
INSERT INTO `%DB_PREFIX%deal_log` VALUES ('27','每当我们踏上新的旅程，总是带着期待和兴奋\r\n\r\n而每次踏上归程，多多少少都会怀有一丝的失落\r\n\r\n在路上，我们拥有一拍即合、相谈甚欢的朋友\r\n\r\n在路上，我们总能遇到有趣的人，听到有意思的故事\r\n\r\n在路上，我们可以遗忘时间，丢开工作，在任何一方天地里享用美食和咖啡\r\n\r\n但是归来后，工作和生活又将我们丢回压力和快节奏之下\r\n\r\n我们想要一个在城市中，也能随时抽离的天地\r\n\r\n找朋友，找梦想，找快乐\r\n\r\n \r\n\r\n我们的小窝不会很大，但足以容纳所有的做梦者\r\n\r\n这里有齐全的旅行攻略书籍、各种旅行散文、绘本、游记……\r\n\r\n这里有香浓的咖啡和好吃的甜点\r\n\r\n这里有同样喜爱旅行，爱结交朋友的年轻人\r\n\r\n每一个将这里当做家的人，你们是我们的客人，更是这里的主人','1352230347','18','fzmatthew','56','./public/attachment/201211/07/11/714396a1e4416b0f7510d97e6966190459.jpg','','','','','','');
INSERT INTO `%DB_PREFIX%deal_log` VALUES ('28','在电影里看到的最自然的场景在拍摄的时候都是要用灯光特别加工出来的，因为摄影机和人对光的感受能力不一样。人的眼睛可以说是世界上最好的摄影机。这一幕女主角站在窗边充满惆怅的向男主角的方向望过去，明显的受到了日本导演岩井俊二的影响。','1352230864','17','fanwe','57','./public/attachment/201211/07/11/eab603d5c65ec25f88a7fdd8ec9a5c1095.jpg','','','','','','');
INSERT INTO `%DB_PREFIX%deal_log` VALUES ('29','谢谢这几天来帮忙的朋友们，昨天一群的同学们让窗户变得明亮，虽然还是挺乱但却充满了快乐与欢。。爱天使每天都要这样充满爱与快乐。。谢谢有你们！因为东西太多可能还要打理两天才能开业，希望最近有空的朋友还能过来帮忙。下午两点过来便可13400642022。地址文化艺术中心大润发楼上正中间店。谢谢！','1352231575','17','fanwe','58','./public/attachment/201211/07/11/85a7d1e781bfb8812271b6f6f1bee91d25.jpg','','','','','','');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_msg_list`;
CREATE TABLE `%DB_PREFIX%deal_msg_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `title` text NOT NULL,
  `is_youhui` tinyint(1) NOT NULL,
  `youhui_id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL COMMENT '发送的验证码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COMMENT='//私信列表';
INSERT INTO `%DB_PREFIX%deal_msg_list` VALUES ('113','462414875@qq.com','1','<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"http://zc03.vitakung.com/public/attachment/201602/16/17/56c2ea5ce3b23.png\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">项目发起人 vitakung 提交了项目保护梁子湖，我们在行动。，请及时登录后台审核!</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\"></a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">2016年02月29日</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过VK维客众筹帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>','1456652985','1','1456652983','0','发件失败的发件人地址vitakung@163.com','0','1','众筹通知-审核众筹项目','0','0','');
INSERT INTO `%DB_PREFIX%deal_msg_list` VALUES ('114','462414875@qq.com','1','<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"http://zc03.vitakung.com/public/attachment/201602/16/17/56c2ea5ce3b23.png\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">恭喜您的项目保护梁子湖，我们在行动。审核通过！</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\"></a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">2016年02月29日</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过VK维客众筹帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>','1456653033','1','1456653032','20','发件失败的发件人地址vitakung@163.com','0','1','众筹通知-项目审核通过','0','0','');
INSERT INTO `%DB_PREFIX%deal_msg_list` VALUES ('115','462414875@qq.com','1','<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"http://zc03.vitakung.com/public/attachment/201602/16/17/56c2ea5ce3b23.png\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">项目发起人 vitakung 提交了项目筹建康平羽毛球馆，为羽毛球爱好者建一个温暖的家！，请及时登录后台审核!</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\"></a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">2016年02月29日</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过VK维客众筹帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>','1456653431','1','1456653431','0','发件失败的发件人地址vitakung@163.com','0','1','众筹通知-审核众筹项目','0','0','');
INSERT INTO `%DB_PREFIX%deal_msg_list` VALUES ('116','462414875@qq.com','1','<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"http://zc03.vitakung.com/public/attachment/201602/16/17/56c2ea5ce3b23.png\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">恭喜您的项目筹建康平羽毛球馆，为羽毛球爱好者建一个温暖的家！审核通过！</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\"></a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">2016年02月29日</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过VK维客众筹帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>','1456653456','1','1456653455','20','发件失败的发件人地址vitakung@163.com','0','1','众筹通知-项目审核通过','0','0','');
INSERT INTO `%DB_PREFIX%deal_msg_list` VALUES ('117','462414875@qq.com','1','<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"http://zc03.vitakung.com/public/attachment/201602/16/17/56c2ea5ce3b23.png\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">项目发起人 vitakung 提交了项目邦美智洗洗衣店O2O智能管理系统，请及时登录后台审核!</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\"></a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">2016年02月29日</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过VK维客众筹帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>','1456656700','1','1456656700','0','发件失败的发件人地址vitakung@163.com','0','1','众筹通知-审核众筹项目','0','0','');
INSERT INTO `%DB_PREFIX%deal_msg_list` VALUES ('118','462414875@qq.com','1','<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"http://zc03.vitakung.com/public/attachment/201602/16/17/56c2ea5ce3b23.png\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">恭喜您的项目邦美智洗洗衣店O2O智能管理系统审核通过！</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\"></a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">2016年02月29日</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过VK维客众筹帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>','1456656735','1','1456656735','20','发件失败的发件人地址vitakung@163.com','0','1','众筹通知-项目审核通过','0','0','');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_notify`;
CREATE TABLE `%DB_PREFIX%deal_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='//准备发送通知的项目ID';
DROP TABLE IF EXISTS `%DB_PREFIX%deal_order`;
CREATE TABLE `%DB_PREFIX%deal_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `total_price` decimal(20,2) NOT NULL COMMENT '总价',
  `delivery_fee` decimal(20,2) NOT NULL COMMENT '运费',
  `deal_price` decimal(20,2) NOT NULL COMMENT '项目费用',
  `support_memo` text NOT NULL,
  `payment_id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `credit_pay` decimal(20,2) NOT NULL COMMENT '信贷付款',
  `online_pay` decimal(20,2) NOT NULL COMMENT '在线付款',
  `deal_name` varchar(255) NOT NULL,
  `order_status` tinyint(1) NOT NULL COMMENT '0:未支付 1:已支付(过期) 2:已支付(无库存) 3:成功',
  `create_time` int(11) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `repay_time` int(11) NOT NULL COMMENT '回报更新时间',
  `repay_memo` text NOT NULL COMMENT '回报备注，由发起人更新',
  `is_refund` tinyint(1) NOT NULL COMMENT '已退款 0:未 1:已',
  `is_has_send_success` tinyint(1) NOT NULL,
  `repay_make_time` int(11) NOT NULL DEFAULT '0' COMMENT '回报确认时间',
  `num` int(11) NOT NULL DEFAULT '1' COMMENT '购买数量',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单类型 0表示普通众筹 1表示股权众筹 2表示无私奉 3抽奖商品 5表示融资众筹 6表示股权转让 7房产众筹',
  `invest_id` int(11) NOT NULL DEFAULT '0' COMMENT 'invest 的ID',
  `share_fee` decimal(20,2) NOT NULL COMMENT '分红金额',
  `share_status` tinyint(1) NOT NULL COMMENT '分红是否发放：0未发放，1已发',
  `is_tg` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 表示在线支付 1表示第三方托管',
  `score` int(11) NOT NULL COMMENT '付款积分',
  `score_money` decimal(20,2) NOT NULL COMMENT '积分对换的余额,对换的余额已加到余额支付里，这里记录是用在查看，退款时用',
  `sp_multiple` varchar(255) NOT NULL COMMENT '记录"购买送支付金额的几倍信用/积分"的倍数的反序列数组array("score_multiple"=>''倍数'',"point_multiple"=>''倍数''）,退款时用',
  `logistics_company` varchar(255) NOT NULL COMMENT '物流公司',
  `logistics_links` varchar(255) NOT NULL COMMENT '物流链接',
  `logistics_number` varchar(255) NOT NULL COMMENT '物流单号',
  `requestNo` varchar(255) NOT NULL COMMENT 'yeepay_log.id',
  `is_complete_transaction` tinyint(1) NOT NULL COMMENT '0 表示未放款 1表示放款  2表示退款',
  `fee` decimal(20,2) NOT NULL COMMENT '手续费',
  `targetAmount` decimal(20,2) NOT NULL COMMENT '获取的目标金额',
  `progress` tinyint(1) NOT NULL DEFAULT '0' COMMENT '项目进度 0 表示未支付 2表示已支付定金 3表示支付首付 4表示退款处理 5放款处理',
  `is_winner` tinyint(1) NOT NULL COMMENT '0：没开奖，1幸运单，2未抽到',
  `lottery_draw_time` int(11) unsigned zerofill NOT NULL COMMENT '开奖时间',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_item_id` (`deal_item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='// 订单信息';
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('65','55','18','18','fzmatthew','1352229388','20.00','5.00','15.00','请在上班时间配送。','0','COMM','20.00','0.00','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','3','1352229388','方维','350000','13333333333','福建','福州','福建福州台江区工业路博美诗邦','0','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('66','56','24','17','fanwe','1352230101','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230101','方维','22222','14444444444','福建','福州','方维方维方维方维方维','1','1352230424','回报已经发货，发货单号123456, 有问题请联系我。','0','0','1424910145','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('67','56','24','19','test','1352230180','500.00','0.00','500.00','','24','ICBCB2C','0.00','500.00','拥有自己的咖啡馆','3','1352230157','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('68','56','24','19','test','1352230228','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230228','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('69','56','24','19','test','1352230232','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230232','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('70','56','24','19','test','1352230237','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230237','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('71','56','24','19','test','1352230240','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230240','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('72','56','24','19','test','1352230243','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230243','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('73','56','24','19','test','1352230247','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230247','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('74','56','24','19','test','1352230268','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230268','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('75','56','24','19','test','1352230270','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230270','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('76','56','24','19','test','1352230293','500.00','0.00','500.00','','0','','500.00','0.00','拥有自己的咖啡馆','3','1352230293','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('77','58','31','18','fzmatthew','1352231539','2000.00','0.00','2000.00','test','0','','2000.00','0.00','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','3','1352231539','方维','350000','13333333333','福建','福州','福建福州台江区工业路博美诗邦','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('78','58','30','19','test','0','1000.00','0.00','1000.00','ttt','24','CCB','500.00','0.00','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','0','1352231631','test','test','13344455555','湖北','襄樊','test','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('79','56','24','17','fanwe','0','500.00','0.00','500.00','部份支付','24','ICBCB2C','300.00','0.00','拥有自己的咖啡馆','0','1352231671','方维','22222','14444444444','福建','福州','方维方维方维方维方维','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
INSERT INTO `%DB_PREFIX%deal_order` VALUES ('80','58','32','18','fzmatthew','1352231704','3000.00','0.00','3000.00','','0','','3000.00','0.00','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','3','1352231704','方维','350000','13333333333','福建','福州','福建福州台江区工业路博美诗邦','1','0','','0','0','0','1','0','0','0.00','0','0','0','0.00','','','','','','0','0.00','0.00','0','0','00000000000');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_order_lottery`;
CREATE TABLE `%DB_PREFIX%deal_order_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL COMMENT '项目id',
  `deal_item_id` int(11) NOT NULL COMMENT '支持id',
  `user_id` int(11) NOT NULL COMMENT '会员id',
  `user_name` varchar(100) NOT NULL COMMENT '会员名',
  `lottery_sn` varchar(50) NOT NULL COMMENT '抽奖号',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `is_winner` tinyint(1) NOT NULL COMMENT '0：没开奖，1：幸运号,2：未抽到，3:订单退款，些号无效',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `time_msec` decimal(20,3) NOT NULL COMMENT '创建时间精确到毫秒',
  `lottery_draw_time` int(11) NOT NULL COMMENT '开奖时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `lottery_sn` (`lottery_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_pay_log`;
CREATE TABLE `%DB_PREFIX%deal_pay_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `money` decimal(20,2) NOT NULL,
  `create_time` int(11) NOT NULL,
  `log_info` text NOT NULL,
  `comissions` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `share_fee` decimal(20,2) NOT NULL,
  `delivery_fee` decimal(20,2) NOT NULL,
  `requestNo` varchar(255) NOT NULL COMMENT '是第三方支付的请求号',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='//项目支持金额发放记录';
DROP TABLE IF EXISTS `%DB_PREFIX%deal_selfless_cate`;
CREATE TABLE `%DB_PREFIX%deal_selfless_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='// 公益众筹分类';
INSERT INTO `%DB_PREFIX%deal_selfless_cate` VALUES ('18','扶贫','1','0','1');
INSERT INTO `%DB_PREFIX%deal_selfless_cate` VALUES ('19','儿童','2','0','1');
