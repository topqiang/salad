/*
Navicat MySQL Data Transfer

Source Server         : foodlink
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : shala

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-10-25 07:38:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shala_about`
-- ----------------------------
DROP TABLE IF EXISTS `shala_about`;
CREATE TABLE `shala_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_about
-- ----------------------------
INSERT INTO `shala_about` VALUES ('1', 'Daisy fresh是一家健康沙拉为主题的餐厅。我们秉承高品质、高标准、高要求的理念，为广大追求健康饮食的朋友提供最贴心的服务，最快捷的派送服务，最诱人的超值优惠，足不出户就可尽享健康心动沙拉美食。');

-- ----------------------------
-- Table structure for `shala_access_token`
-- ----------------------------
DROP TABLE IF EXISTS `shala_access_token`;
CREATE TABLE `shala_access_token` (
  `at_id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(50) NOT NULL,
  `app_secret` varchar(100) NOT NULL,
  `access_token` varchar(200) NOT NULL,
  `ctime` int(10) NOT NULL,
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_access_token
-- ----------------------------
INSERT INTO `shala_access_token` VALUES ('1', 'wx83c51d0725e3fe63', '96a6e70f74e335bbb2f9d957346d36dd', 'ndsNQ8l8D7RTHbexBO-Qp0mKixQdQS8QL7B7Ce6jcUdDoRQMtQzScVQmBnsHWZecnPL5Z_VxJCVgSLoxOpsfWA', '1402281591');

-- ----------------------------
-- Table structure for `shala_address`
-- ----------------------------
DROP TABLE IF EXISTS `shala_address`;
CREATE TABLE `shala_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收货地址ID',
  `name` varchar(255) DEFAULT NULL COMMENT '收货人姓名',
  `sex` varchar(11) DEFAULT NULL COMMENT '收货人性别',
  `tel` varchar(15) DEFAULT NULL COMMENT '电话',
  `city` varchar(255) DEFAULT NULL COMMENT '所在城市',
  `detailadd` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `numhouse` varchar(255) DEFAULT NULL COMMENT '门牌号',
  `label` varchar(255) DEFAULT NULL COMMENT '地址标签',
  `fromuser` int(11) DEFAULT NULL COMMENT '改地址所属用户',
  `provice` varchar(255) DEFAULT '北京' COMMENT '地址省份',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `add_user` (`fromuser`),
  CONSTRAINT `add_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_address
-- ----------------------------
INSERT INTO `shala_address` VALUES ('0', null, null, null, null, '', null, null, null, '北京', '0');
INSERT INTO `shala_address` VALUES ('1', '阚自强', '男', '12345678', '房山区', '北京市丰台区北京西站-南广场', '1234', '小区', '5', '北京', '0');
INSERT INTO `shala_address` VALUES ('2', '小王', '男', '12345678', '朝阳区', '北京市丰台区北京西站-南广场', '1234', '学校', '5', '北京', '0');
INSERT INTO `shala_address` VALUES ('3', '再见', '男', '84932058', '海淀区', '北京市海淀区北京大学口腔医院', '4321', '学校\n', '5', '北京', '0');
INSERT INTO `shala_address` VALUES ('6', 'QIANG', '男', '52435525', '西城区', '北京市西城区西城区', '1234', '学校', '5', '北京', '0');
INSERT INTO `shala_address` VALUES ('7', '2', '男', '2', '延庆县', '北京市延庆县八达岭长城-登长城入口', '2222', '其他', '2', '北京', '0');
INSERT INTO `shala_address` VALUES ('8', '2', '男', '2', '延庆县', '北京市延庆县八达岭长城-登长城入口', '3333', '公司', '2', '北京', '0');
INSERT INTO `shala_address` VALUES ('9', 'hello', '女', '321', '延庆县', '北京市延庆县八达岭长城-登长城入口', '321', '家', '2', '北京', '0');
INSERT INTO `shala_address` VALUES ('10', '望京SOHO店', null, '1064796887', '朝阳区', '望京SOHO 塔3底商', '3108', null, null, '北京', '0');
INSERT INTO `shala_address` VALUES ('11', '新城店', null, '2147483647', '朝阳区', '北京朝阳区朝外大街6号（新城国际）26号楼底商', '103号', null, null, '北京', '0');
INSERT INTO `shala_address` VALUES ('12', '测试点', null, '110', '海淀区', '北京市海淀区温莎ktv(花园店)', '110', null, null, '北京', '0');
INSERT INTO `shala_address` VALUES ('15', 'test', '男', '13163177870', '南开区', '天津市南开区天津市南开区咸阳路小学', '1234', '其他', '7', '天津', '0');
INSERT INTO `shala_address` VALUES ('16', '热水器', '男', '18666886655', '南开区', '天津市南开区大悦城(天津)', '阿里啦咯啦咯', '其他', '10', '天津', '0');

-- ----------------------------
-- Table structure for `shala_admin`
-- ----------------------------
DROP TABLE IF EXISTS `shala_admin`;
CREATE TABLE `shala_admin` (
  `aid` int(10) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `account` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `g_id` int(2) NOT NULL COMMENT '管理员组(99代表没有权限限制)',
  `ctime` int(10) NOT NULL COMMENT '创建时间',
  `status` int(1) NOT NULL COMMENT '状态0：正常；9：已删除',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of shala_admin
-- ----------------------------
INSERT INTO `shala_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '99', '0', '0');
INSERT INTO `shala_admin` VALUES ('2', 'toocms', '3e458623ad9a24f16c2ef9ce4ade501c', '99', '1395366826', '0');
INSERT INTO `shala_admin` VALUES ('3', 'liuqiang', 'e10adc3949ba59abbe56e057f20f883e', '0', '1395366866', '0');
INSERT INTO `shala_admin` VALUES ('4', 'hjh', 'f4cf676496261e18f12cea039cdacbf5', '0', '1398133854', '0');
INSERT INTO `shala_admin` VALUES ('5', 'xjl-888', '6ebe76c9fb411be97b3b0d48b791a7c9', '3', '1398779414', '0');

-- ----------------------------
-- Table structure for `shala_admin_action`
-- ----------------------------
DROP TABLE IF EXISTS `shala_admin_action`;
CREATE TABLE `shala_admin_action` (
  `act_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='管理员操作表';

-- ----------------------------
-- Records of shala_admin_action
-- ----------------------------
INSERT INTO `shala_admin_action` VALUES ('1', 'Admin', '管理员管理');
INSERT INTO `shala_admin_action` VALUES ('2', 'Group', '管理员分组');
INSERT INTO `shala_admin_action` VALUES ('3', 'Cate', '餐品分类管理');
INSERT INTO `shala_admin_action` VALUES ('4', 'Food', '餐品管理');
INSERT INTO `shala_admin_action` VALUES ('5', 'Order', '餐品订单管理');
INSERT INTO `shala_admin_action` VALUES ('6', 'Room', '包间管理');
INSERT INTO `shala_admin_action` VALUES ('7', 'RoomOrder', '包间预定管理');

-- ----------------------------
-- Table structure for `shala_admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `shala_admin_group`;
CREATE TABLE `shala_admin_group` (
  `g_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '组名称',
  `act_list` varchar(1000) NOT NULL COMMENT '操作列表',
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员权限表';

-- ----------------------------
-- Records of shala_admin_group
-- ----------------------------
INSERT INTO `shala_admin_group` VALUES ('2', '高级管理员', 'a:7:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";}');
INSERT INTO `shala_admin_group` VALUES ('3', '服务员', 'a:2:{i:0;s:1:\"5\";i:1;s:1:\"7\";}');

-- ----------------------------
-- Table structure for `shala_article`
-- ----------------------------
DROP TABLE IF EXISTS `shala_article`;
CREATE TABLE `shala_article` (
  `art_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) NOT NULL,
  `art_content` text NOT NULL,
  `art_author` varchar(100) NOT NULL,
  `ctime` int(10) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_article
-- ----------------------------
INSERT INTO `shala_article` VALUES ('3', '关于我们', '<p>\r\n	<span style=\"color:#e53333;\"><strong>湘极了</strong></span>----来自湖南湘西的土家菜品牌，至2007年成立以来，始终以发扬湘西土家文化为己任，不断推陈出新，精益求精，并挖掘了不少湘西本土原汁原味的原生态土家菜，深受广大消费者的好评！成为北京具有民族特色的餐饮品牌之一。【湘极了土家菜---- 专注原生态土家菜】\r\n</p>\r\n<p>\r\n	<span style=\"color:#e53333;font-size:16px;\"><span style=\"font-size:18px;\"><strong>盛大升级</strong></span><span style=\"font-size:18px;\"><strong>：</strong></span></span>本店公众微信可以订外卖、预订包间和积分了，用微信点餐（<span style=\"color:#00d5ff;\">堂食、外卖均可</span>），赢积分，天天免费送菜品，想吃什么送什么。同时，我们每月还从积分最多的前6位朋友里抽出6位幸运食客，<span style=\"color:#00d5ff;\">分别邀请</span>您及您的5-6位朋友一同来湘极了免费吃大餐（标准：180元，超出部分自付，不限菜品）。\r\n</p>\r\n<p>\r\n	<span style=\"color:#e53333;\"><strong>=============================</strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#00d5ff;\"><strong>公司理念：</strong></span>做人要厚道、做菜要地道、地道湘西土家风味！\r\n</p>\r\n<p>\r\n	<span style=\"color:#00d5ff;\"><strong>营业时间：</strong></span>11：00-23：00（无闭餐时间）\r\n</p>\r\n<p>\r\n	<span style=\"color:#00d5ff;\"><strong>客服电话：</strong></span><span style=\"font-size:16px;\"><u>010-57462890</u> <u>010-57139353</u></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#00d5ff;\"><strong>服务监督电话：</strong></span><span style=\"font-size:16px;\"><u>18801087807</u></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#e53333;\"><strong>=============================</strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#e53333;\"><strong><img src=\"http://t2.qpic.cn/mblogpic/0cda57c71fddccbce4fe/460\" alt=\"\" /><br />\r\n</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"background-color:#60d978;\"></span> \r\n</p>', 'admin', '1398048098');
INSERT INTO `shala_article` VALUES ('4', '配送范围', '<p>\r\n	<span style=\"color:#e53333;font-size:18px;\">配送范围</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><span style=\"background-color:#60D978;\">A区</span><span style=\"background-color:#60D978;\">：</span>电建南院、中蓝大学生公寓、传媒大学校内、水电二局、定福庄西街/东街</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><span style=\"background-color:#60D978;\">B区：</span>花园闸小区、妇联小区（大黄庄南里1号院）、电建北院、绿岛苑东</span><span style=\"font-family:\'宋体\';font-size:7pt;\"><span style=\"font-size:14px;\">/</span><span style=\"font-size:14px;\">西区、北齿小区、福怡苑南区、东领鉴筑、金福家园、金星小区、传媒大学东门南里</span><span style=\"font-size:14px;\">4</span><span style=\"font-size:14px;\">号院</span></span><span style=\"font-family:\'宋体\';font-size:7pt;\"></span> \r\n</p>\r\n<p class=\"p0\">\r\n	<span style=\"font-family:\'宋体\';font-size:7pt;\"><span style=\"font-size:14px;background-color:#60D978;\">C</span><span style=\"font-size:14px;\"><span style=\"background-color:#60D978;\">区：</span>珠江绿洲、传媒大学北门斜对面</span><span style=\"font-size:14px;\">2</span><span style=\"font-size:14px;\">号院、动力街区</span><span style=\"font-size:14px;\">A1/A2/A3</span><span style=\"font-size:12px;\"><span style=\"font-size:14px;\">区、福怡苑北区、天泰定福苑、内蒙古饭店斜对面</span><span style=\"font-family:\'宋体\';font-size:14px;\">北花园小区</span><span style=\"font-family:\'宋体\';font-size:7pt;\"></span> </span></span> \r\n</p>\r\n<p class=\"p0\">\r\n	<span style=\"font-family:\'宋体\';font-size:7pt;\"><span style=\"font-size:14px;background-color:#60D978;\">D</span><span style=\"font-size:14px;\"><span style=\"background-color:#60D978;\">区：</span>二外、鲁班大厦、五建小区及附近</span></span> \r\n</p>\r\n<p class=\"p0\">\r\n	<span style=\"font-family:宋体;font-size:7pt;color:#E53333;\"><span style=\"font-size:14px;color:#E53333;\">------------------------------------------------------------</span></span> \r\n</p>\r\n<p class=\"p0\">\r\n	<span style=\"font-family:\'宋体\';font-size:7pt;\"><span style=\"font-size:14px;\"><img src=\"http://t2.qpic.cn/mblogpic/0cda57c71fddccbce4fe/460\" alt=\"\" /><br />\r\n</span></span> \r\n</p>', 'admin', '1398057508');
INSERT INTO `shala_article` VALUES ('7', '招贤纳士', '<p>\r\n	<span style=\"font-size:14px;\"><span style=\"background-color:#00D5FF;\"><span>2014年6月8日最新招聘信息：</span></span></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><span style=\"background-color:#00D5FF;\"><span>招收银员1名：</span><span style=\"background-color:;\"><span style=\"background-color:#FFFFFF;\"></span><span style=\"font-size:14px;line-height:21px;background-color:#FFFFFF;\"><span style=\"background-color:#FFE500;\">认同本企业企业文化，有良好的职业道德</span><span style=\"background-color:#FFE500;\">，</span>女性，为人正直，诚实可靠，具备一定的与人沟通能力，有简单的财务知识和简单的Office办公软件应用技能（不会也可以有老师教，只要肯学）工资=底薪+提成</span></span></span></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><span style=\"background-color:#00D5FF;\">招服务员或服务生2名：</span><span style=\"background-color:#FFE500;\">认同本企业企业文化，有良好的职业道德，</span>为人诚实，踏实肯干，能吃苦耐劳，有团队合作精神，个人爱卫生，干净整洁，邋遢者勿扰。欢迎稳重的中年女士（30-45岁）加入。工资=底薪+提成+补助+奖金</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;color:#E53333;\">-----------------------------------------------------</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><img src=\"http://t2.qpic.cn/mblogpic/0cda57c71fddccbce4fe/460\" alt=\"\" /><br />\r\n</span>\r\n</p>', 'admin', '1402235720');
INSERT INTO `shala_article` VALUES ('8', '菜品展示', '<p>\r\n	<span style=\"background-color:#00d5ff;font-size:18px;\">本店招牌菜（独一无二）</span> \r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/e22fed847e25ea337542/460\" /> \r\n</p>\r\n<p>\r\n	湘极了（招牌菜）\r\n</p>\r\n<p>\r\n	<span style=\"background-color:#00d5ff;font-size:18px;\">部分经典特色菜品</span> \r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/8679b90380021f7fe61a/460\" /> \r\n</p>\r\n<p>\r\n	<span>香辣鱼嘴巴</span> \r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/0d874a45dfe2c5884b82/460\" /> \r\n</p>\r\n<p>\r\n	香辣跳跳蛙\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/ea591bb62212553f93d2/460\" /> \r\n</p>\r\n<p>\r\n	砂锅柴鸡\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/7afb2b531d3fb254bb2e/460\" /> \r\n</p>\r\n<p>\r\n	猪棒骨炖活鱼\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/77054c6452f1a66b34bc/460\" /> \r\n</p>\r\n<p>\r\n	湘西腊猪脚炖海带\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/da37d6e4b5ce92d6d63a/460\" /> \r\n</p>\r\n<p>\r\n	正宗湘西腊肉（每年数量有限）\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/32889a3179aad0d83f5a/460\" /> \r\n</p>\r\n<p>\r\n	湘极烤鱼（麻辣味、香辣味、豆豉味）\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/d9a810ab6a56488cd014/460\" /> \r\n</p>\r\n<p>\r\n	酸菜鱼（回头鱼）\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/c9fabe773c42a8da7512/460\" /> \r\n</p>\r\n<p>\r\n	剁椒鱼头\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/8416b499853b84ba2b80/460\" /> \r\n</p>\r\n<p>\r\n	开胃鱼头\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/55fb9a891027a1cc0990/460\" /> \r\n</p>\r\n<p>\r\n	牛蛙火锅\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/c410e5ec576df1ca12c6/460\" /> \r\n</p>\r\n<p>\r\n	蔬菜馒头\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/c9e4b81141463af207ea/460\" /> \r\n</p>\r\n<p>\r\n	坛子刀巴豆炒肉沫\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/5f92dc7ec67c228bbe2a/460\" /> \r\n</p>\r\n<p>\r\n	坛子茄子炒肉沫\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/e4f41e6da25da1aa7fb0/460\" /> \r\n</p>\r\n<p>\r\n	坛子玉米辣子粉炒肉沫\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/be5ed35df41cba9948de/460\" /> \r\n</p>\r\n<p>\r\n	窝窝头外外婆菜\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/c1e53fcbc892b7b2f7d0/460\" /> \r\n</p>\r\n<p>\r\n	湘西茶油蒸湘西腊河鱼\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/8bed44224c628b646db8/460\" /> \r\n</p>\r\n<p>\r\n	盐菜炒锅巴\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/cfafb678b557e0f07b3c/460\" /> \r\n</p>\r\n<p>\r\n	湘西叶儿粑\r\n</p>\r\n<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/48ba29c465dcd3bc8fd0/460\" /> \r\n<p>\r\n	&nbsp;丛毛藠饺子（屉装）\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/41585c85caf430d4ad20/460\" /> \r\n</p>\r\n<p>\r\n	丛毛藠饺子（盒装）\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/e8f9eeee9a9fd4aaef80/460\" /> \r\n</p>\r\n<p>\r\n	湘西土家米酒\r\n</p>\r\n<p>\r\n	<span style=\"color:#e53333;\">-----------------------------------------------</span> \r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/0cda57c71fddccbce4fe/460\" /> \r\n</p>', 'admin', '1402235828');
INSERT INTO `shala_article` VALUES ('9', '品牌故事', '<p>\r\n	<span style=\"color:#e53333;font-size:32px;\"><strong>品牌故事</strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><br />\r\n</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\">“<span style=\"color:#00d5ff;font-size:18px;\">湘极了</span>”招牌菜取自湘西沅陵晒兰肉为主要原材料，伴以香芹或蒜苔加入干辣椒爆炒而成，口感香甜，如山中幽兰之香，咸辣兼并，屡获“香极了”的赞誉。本店店名由此而来，取“香”的谐音，改为“湘极了”，免于流俗，同时又能更加清晰的体现出本店是<span style=\"color:#00d5ff;font-size:18px;\">一家专注湘西土家菜</span>的餐厅。此菜是一道全国<span style=\"color:#00d5ff;font-size:18px;\">独一无二</span>的传统特色食品，历史悠久，用其作为本店招牌菜，又彰显了品牌创始人把“<span style=\"color:#00d5ff;font-size:18px;\">湘</span>西土家菜做到<span style=\"color:#00d5ff;font-size:18px;\">极</span>致”的决心，以传承土家文化之精髓。一语双关，任重道远。</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><br />\r\n</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#e53333;font-size:32px;\"><strong>成长脚印</strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\">————<span style=\"background-color:#e56600;font-size:18px;\">7年成长，7年积垫，我们一直专注原生态湘西土家菜</span><span style=\"background-color:#e56600;font-size:18px;\"></span></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\">1、2007年4月4日湘极了土家菜馆在北京成立；<br />\r\n2、2010年3月28日获得了中国工商总局颁发的“湘极了”商标注册证书；<br />\r\n3、2008-2011年期间湘极了土家菜被北京多家美食指南杂志刊登（如《<span style=\"background-color:#00d5ff;\">吃货是怎样炼成的</span>》等），是北京具有民族特色的餐厅之一；<br />\r\n4、2011年12月5日，成立了专业的餐饮管理公司，开始对湘极了品牌进行更加系统的管理；<br />\r\n5、2012年12月湘极了被中国著名的餐饮杂志《<span style=\"background-color:#00d5ff;\">东方美食</span>》杂志专题报道；<br />\r\n6、2013年2月成立了湘西沅陵洞溪蔬菜种植专业合作社，利用湘西地理环境的优势，移植成功了野生丛毛藠，并委托北京市农业产业化重点龙头企业金路易食品公司生产出了丛毛藠饺子，为京城人民提供了又一道原生态土家美食。更多系列的土家食品正在研发中；<br />\r\n7、2013年4月湘极了土家菜再次被《东方美食》杂志报道；<br />\r\n8、2014年4月4日-10日，<span style=\"background-color:#00d5ff;\">CCTV发现之旅频道</span>深入湘西大山深处，专程采访了丛毛藠培植基地；</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\">9、2014年6月12日天津电视台《这是天津卫》美食栏目对湘极了土家菜进行了采访报道。<br />\r\n从成立至今，湘极了一直致力于新产品研发以及从民间寻找（挖掘）具有湘西土家特色的美食，同时在湘西成立了原材料加工基地，为供应地道的土家菜原材料提供了保障。并相继开发出了不少湘西原汁原味的土家美食，让京城食客不用深入湘西就能感受湘西浓厚的美食文化。<br />\r\n影视名星高圆圆、赵国良（青年毛泽东扮演者）、林栋甫（代表作《建国大业》等）和歌唱家吴坚（中国交响乐团男低音歌唱家）、王静（总政歌剧团女高音歌唱家）以及中央电视台著名节目主持人小尼曾先后几次光临本店品尝土家美食，受到了这些老师们的好评。<br />\r\n<span style=\"color:#e53333;\">-------------------------------------------------</span><span style=\"color:#e53333;\">-----</span> </span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;\"><img alt=\"\" src=\"http://t2.qpic.cn/mblogpic/0cda57c71fddccbce4fe/460\" /><br />\r\n</span>\r\n</p>', 'admin', '1402235848');
INSERT INTO `shala_article` VALUES ('10', '客服中心', '<p>\r\n	<span style=\"color:#E53333;\"><strong>=============================</strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#00D5FF;\"><strong>公司理念：</strong></span>做人要厚道、做菜要地道、地道湘西土家风味！\r\n</p>\r\n<p>\r\n	<span style=\"color:#00D5FF;\"><strong>营业时间：</strong></span>11：00-23：00（无闭餐时间）\r\n</p>\r\n<p>\r\n	<span style=\"color:#00D5FF;\"><strong>客服电话：</strong></span><span style=\"font-size:16px;\"><u>010-57462890</u> <u>010-57139353</u></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#00D5FF;\"><strong>服务监督电话：</strong></span><span style=\"font-size:16px;\"><u>18801087807</u></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#E53333;\"><strong>=============================</strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"color:#E53333;\"><strong><img src=\"http://t2.qpic.cn/mblogpic/0cda57c71fddccbce4fe/460\" alt=\"\" /><br />\r\n</strong></span>\r\n</p>', 'admin', '1402241040');

-- ----------------------------
-- Table structure for `shala_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `shala_coupon`;
CREATE TABLE `shala_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '优惠券类型',
  `startime` varchar(15) NOT NULL COMMENT '该优惠卷开始时间',
  `endtime` varchar(15) NOT NULL COMMENT '该优惠卷结束时间',
  `num` int(11) NOT NULL COMMENT '发行优惠券个数',
  `man` double(11,2) DEFAULT NULL COMMENT '满减活动满',
  `jian` double(11,2) DEFAULT NULL COMMENT '减少金额',
  `zhe` int(1) DEFAULT NULL COMMENT '折扣数量',
  `miane` double(11,2) DEFAULT NULL COMMENT '优惠券面额',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '该优惠券状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_coupon
-- ----------------------------
INSERT INTO `shala_coupon` VALUES ('1', '2', '2016/09/29', '2016/10/11', '11', '0.00', '0.00', '8', '0.00', '0');
INSERT INTO `shala_coupon` VALUES ('2', '1', '2016/10/08', '2016/10/10', '10', '38.00', '10.00', '0', '0.00', '0');
INSERT INTO `shala_coupon` VALUES ('3', '3', '2016/10/08', '2016/10/12', '31', null, null, null, '12.00', '0');

-- ----------------------------
-- Table structure for `shala_fcate`
-- ----------------------------
DROP TABLE IF EXISTS `shala_fcate`;
CREATE TABLE `shala_fcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '分类备注',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_fcate
-- ----------------------------
INSERT INTO `shala_fcate` VALUES ('9', '水果类', '菜品分类', '0');
INSERT INTO `shala_fcate` VALUES ('10', '硬质蔬菜类', '菜品分类', '0');
INSERT INTO `shala_fcate` VALUES ('11', '碳水&豆子&蛋白', '菜品分类', '0');
INSERT INTO `shala_fcate` VALUES ('12', '健康油脂类', '菜品分类', '0');
INSERT INTO `shala_fcate` VALUES ('13', '丰富配料类', '菜品分类', '0');
INSERT INTO `shala_fcate` VALUES ('14', '基菜', '不可删除', '0');
INSERT INTO `shala_fcate` VALUES ('15', '酱料', '不可删除', '0');

-- ----------------------------
-- Table structure for `shala_foods`
-- ----------------------------
DROP TABLE IF EXISTS `shala_foods`;
CREATE TABLE `shala_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜品id',
  `name` varchar(6) NOT NULL COMMENT '菜品名称',
  `cate_id` int(20) NOT NULL COMMENT '菜品所属类别',
  `pic` varchar(255) DEFAULT NULL COMMENT '菜品缩略图地址',
  `create_time` int(11) DEFAULT NULL COMMENT '菜品创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '菜品信息修改时间',
  `price` double(11,2) DEFAULT NULL COMMENT '菜品价格',
  `status` int(2) DEFAULT NULL COMMENT '菜品状态',
  PRIMARY KEY (`id`),
  KEY `food_cate` (`cate_id`),
  CONSTRAINT `food_cate` FOREIGN KEY (`cate_id`) REFERENCES `shala_fcate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_foods
-- ----------------------------
INSERT INTO `shala_foods` VALUES ('8', '罗马生菜', '14', 'Uploads/foods/201609/57e3c4323ce1b.jpg', '1473666566', '1474544690', '12.00', '0');
INSERT INTO `shala_foods` VALUES ('9', '球形生菜', '14', 'Uploads/foods/201609/57e3c4428c267.jpg', '1473666610', '1474544706', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('10', '苦菊', '9', 'Uploads/foods/201609/57e3c2594a3b6.jpg', '1473666642', '1474544217', '1.00', '9');
INSERT INTO `shala_foods` VALUES ('11', '子叶生菜', '14', 'Uploads/foods/201609/57e3c3ee96437.jpg', '1473666665', '1474544622', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('12', '圣女果', '10', 'Uploads/foods/201609/57e3c30ea1971.jpg', '1473666702', '1474544398', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('13', '芦笋', '10', 'Uploads/foods/201609/57e3c3181ee3b.jpg', '1473666719', '1474544408', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('14', '西芹', '10', 'Uploads/foods/201609/57e3c3285a294.jpg', '1473666749', '1474544424', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('15', '橙子', '9', 'Uploads/foods/201609/57e3c26f00c55.jpg', '1473666787', '1474544239', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('16', '菠萝', '9', 'Uploads/foods/201609/57e3c3040bfa7.jpg', '1473666801', '1474544388', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('17', '哈密瓜', '12', 'Uploads/foods/201609/57e3c3fa6f291.jpg', '1473666817', '1474544634', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('18', '鸡蛋', '11', 'Uploads/foods/201609/57e3c3323b7b0.jpg', '1473666873', '1474544434', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('19', '烤土豆', '11', 'Uploads/foods/201609/57e3c34018669.jpg', '1473666889', '1474544448', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('20', '玉米', '11', 'Uploads/foods/201609/57e3c34b9b44a.jpg', '1473666904', '1474544459', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('21', '白煮鸡胸', '12', 'Uploads/foods/201609/57e3c40629517.jpg', '1473666965', '1474544646', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('22', '牛油果', '13', 'Uploads/foods/201609/57e3c4228cbb8.jpg', '1473666987', '1474544674', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('23', '烤茄子', '12', 'Uploads/foods/201609/57e3c416890a4.jpg', '1473667015', '1474544662', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('24', '辣酱', '15', 'Uploads/foods/201609/57e3c3e497d8d.jpg', '1473737224', '1474544612', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('25', '甜酱', '15', 'Uploads/foods/201609/57e3c3d5d09e8.jpg', '1473737259', '1474544597', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('26', '蒜酱', '15', 'Uploads/foods/201609/57e3c3ccedf61.jpg', '1473737294', '1474544588', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('27', '麻酱', '15', 'Uploads/foods/201609/57e3c3a8ba580.jpg', '1473737317', '1474544552', '0.00', '0');

-- ----------------------------
-- Table structure for `shala_gcate`
-- ----------------------------
DROP TABLE IF EXISTS `shala_gcate`;
CREATE TABLE `shala_gcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `name` varchar(255) NOT NULL COMMENT '商品分类名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '商品分类备注',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_gcate
-- ----------------------------
INSERT INTO `shala_gcate` VALUES ('1', '早餐', '商品分类', '0');
INSERT INTO `shala_gcate` VALUES ('2', '三明治', '商品分类', '0');
INSERT INTO `shala_gcate` VALUES ('3', '小食', '商品分类', '0');
INSERT INTO `shala_gcate` VALUES ('4', '鲜榨果汁', '商品分类', '0');
INSERT INTO `shala_gcate` VALUES ('5', '自选沙拉大份', '48', '0');
INSERT INTO `shala_gcate` VALUES ('6', '自选沙拉小份', '38', '0');
INSERT INTO `shala_gcate` VALUES ('7', '自选卷', '25', '0');

-- ----------------------------
-- Table structure for `shala_gley`
-- ----------------------------
DROP TABLE IF EXISTS `shala_gley`;
CREATE TABLE `shala_gley` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `goods` int(11) NOT NULL COMMENT '购物车商品集合',
  `fromuser` int(11) NOT NULL COMMENT '购物车所属用户',
  `goodnum` int(11) NOT NULL DEFAULT '1' COMMENT '商品数量',
  PRIMARY KEY (`id`),
  KEY `gley_user` (`fromuser`),
  KEY `gley_good` (`goods`),
  CONSTRAINT `gley_good` FOREIGN KEY (`goods`) REFERENCES `shala_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gley_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_gley
-- ----------------------------
INSERT INTO `shala_gley` VALUES ('17', '22', '2', '1');

-- ----------------------------
-- Table structure for `shala_goods`
-- ----------------------------
DROP TABLE IF EXISTS `shala_goods`;
CREATE TABLE `shala_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `name` varchar(255) NOT NULL COMMENT '商品名称',
  `constituent` varchar(255) DEFAULT NULL COMMENT '商品成分',
  `cate_id` int(255) NOT NULL COMMENT '商品类别',
  `pic` varchar(255) DEFAULT NULL COMMENT '商品缩率图地址',
  `price` double(11,2) DEFAULT NULL COMMENT '商品价格',
  `status` int(11) DEFAULT NULL COMMENT '商品状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '商品描述',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `zannum` int(11) NOT NULL DEFAULT '0' COMMENT '手动设置商品被赞数量',
  `unzannum` int(11) NOT NULL DEFAULT '0' COMMENT '手动设置商品为被赞数量',
  PRIMARY KEY (`id`),
  KEY `good_gcate` (`cate_id`),
  CONSTRAINT `good_gcate` FOREIGN KEY (`cate_id`) REFERENCES `shala_gcate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_goods
-- ----------------------------
INSERT INTO `shala_goods` VALUES ('2', '美式烤肋排', '鸡翅，番茄酱，烧烤酱', '3', 'Uploads/goods/201609/57e3c1a5f2145.jpg', '30.00', '0', '非常好吃', '1473664829', '1474544038', '0', '0');
INSERT INTO `shala_goods` VALUES ('3', 'VOSS矿泉水', 'voss矿泉水', '4', 'Uploads/goods/201609/57e3c1b2bf2ab.jpg', '36.00', '0', '健康水', '1473665711', '1474544050', '0', '0');
INSERT INTO `shala_goods` VALUES ('7', '自选沙拉大份', '球形生菜X1份    橙子X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473747526', '1473747526', '0', '0');
INSERT INTO `shala_goods` VALUES ('8', '自选沙拉大份', '球形生菜X1份    橙子X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473751828', '1473751828', '0', '0');
INSERT INTO `shala_goods` VALUES ('9', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755907', '1473755907', '0', '0');
INSERT INTO `shala_goods` VALUES ('10', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755917', '1473755917', '0', '0');
INSERT INTO `shala_goods` VALUES ('11', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755976', '1473755976', '0', '0');
INSERT INTO `shala_goods` VALUES ('12', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473756074', '1473756074', '0', '0');
INSERT INTO `shala_goods` VALUES ('13', '自选沙拉大份', '罗马生菜X2份    子叶生菜X1份    球形生菜X1份    菠萝X1份    西芹X1份    圣女果X1份    橙子X1份    玉米X1份    芦笋X1份    烤茄子X1份    哈密瓜X1份    白煮鸡胸X1份    牛油果X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473845179', '1473845179', '0', '0');
INSERT INTO `shala_goods` VALUES ('14', '自选沙拉大份', '罗马生菜X4份    菠萝X1份    西芹X1份    橙子X1份    玉米X1份    圣女果X1份    芦笋X1份    哈密瓜X1份    牛油果X1份    烤茄子X1份    白煮鸡胸X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473845229', '1473845229', '0', '0');
INSERT INTO `shala_goods` VALUES ('15', '自选沙拉小份', '苦菊X1份    橙子X1份    鸡蛋X3份    烤土豆X4份    辣酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', 'diy', '1473845904', '1473845904', '0', '0');
INSERT INTO `shala_goods` VALUES ('16', '测试', '大法师法师的放大', '1', 'Uploads/goods/201609/57e3c0df6b3d7.jpg', '43.23', '0', '', '1474167777', '1477301979', '10', '20');
INSERT INTO `shala_goods` VALUES ('17', '非常可乐', '水', '4', 'Uploads/goods/201609/57e3c1bfb35a7.jpg', '2.99', '0', '', '1474167808', '1474544063', '0', '0');
INSERT INTO `shala_goods` VALUES ('18', '测试', '谁啊哈对撒发', '2', 'Uploads/goods/201609/57e3c19a3a201.jpg', '12.45', '0', '', '1474167844', '1474544026', '0', '0');
INSERT INTO `shala_goods` VALUES ('19', '自选沙拉大份', '罗马生菜X3份    球形生菜X1份    苦菊X1份    橙子X2份    菠萝X1份    甜酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1474278066', '1474278066', '0', '0');
INSERT INTO `shala_goods` VALUES ('20', '自选卷', '球形生菜X1份    苦菊X1份    橙子X1份    鸡蛋X1份    烤土豆X1份    辣酱X1份    ', '7', 'Uploads/goods/201609/efc3527e79264b90aa657037f19780e1.jpg', '25.00', '0', 'diy', '1474358840', '1474358840', '0', '0');
INSERT INTO `shala_goods` VALUES ('21', '自选沙拉小份', '罗马生菜X1份    球形生菜X1份    圣女果X1份    芦笋X1份    辣酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1474508667', '1474508667', '0', '0');
INSERT INTO `shala_goods` VALUES ('22', '自选沙拉大份', '罗马生菜X1份    子叶生菜X1份    球形生菜X1份    西芹X1份    圣女果X1份    芦笋X1份    烤茄子X1份    烤土豆X1份    牛油果X1份    哈密瓜X1份    鸡蛋X1份    玉米X1份    白煮鸡胸X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '不切碎', '1474533324', '1474533324', '0', '0');
INSERT INTO `shala_goods` VALUES ('23', '自选沙拉大份', '罗马生菜X2份    球形生菜X1份    子叶生菜X1份    橙子X1份    圣女果X1份    哈密瓜X1份    蒜酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '切碎', '1474541117', '1474541117', '0', '0');
INSERT INTO `shala_goods` VALUES ('24', '自选沙拉大份', '罗马生菜X1份    子叶生菜X1份    球形生菜X1份    橙子X1份    西芹X1份    菠萝X1份    圣女果X1份    玉米X1份    鸡蛋X1份    芦笋X1份    烤土豆X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '切碎', '1475049858', '1475049858', '0', '0');
INSERT INTO `shala_goods` VALUES ('25', '自选沙拉大份', '罗马生菜X1份    橙子X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '切碎', '1475112774', '1475112774', '0', '0');
INSERT INTO `shala_goods` VALUES ('26', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    西芹X1份    玉米X1份    芦笋X1份    圣女果X1份    鸡蛋X1份    橙子X1份    菠萝X1份    烤土豆X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '切碎', '1475114044', '1475114044', '0', '0');
INSERT INTO `shala_goods` VALUES ('27', '自选沙拉', '罗马生菜X1份    橙子X1份    蒜酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1475892338', '1475892338', '0', '0');
INSERT INTO `shala_goods` VALUES ('28', '自选沙拉', '罗马生菜X1份    橙子X1份    蒜酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1475970105', '1475970105', '0', '0');
INSERT INTO `shala_goods` VALUES ('29', '自选沙拉', '罗马生菜X1份    橙子X1份    甜酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1476438800', '1476438800', '0', '0');
INSERT INTO `shala_goods` VALUES ('30', '自选沙拉', '罗马生菜X3份    球形生菜X1份    橙子X2份    菠萝X1份    甜酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1477106696', '1477106696', '0', '0');
INSERT INTO `shala_goods` VALUES ('31', '自选沙拉', '罗马生菜X2份    球形生菜X2份    橙子X1份    菠萝X1份    辣酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1477107148', '1477107148', '0', '0');

-- ----------------------------
-- Table structure for `shala_hub`
-- ----------------------------
DROP TABLE IF EXISTS `shala_hub`;
CREATE TABLE `shala_hub` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '偏好表id',
  `uid` int(11) NOT NULL COMMENT '偏好来源用户',
  `fid` int(11) NOT NULL COMMENT '偏好来源商品',
  `well` int(11) NOT NULL DEFAULT '0' COMMENT '点赞',
  `bad` int(11) NOT NULL DEFAULT '0' COMMENT '忌口',
  PRIMARY KEY (`id`),
  KEY `hub_user` (`uid`),
  KEY `hub_good` (`fid`),
  CONSTRAINT `hub_good` FOREIGN KEY (`fid`) REFERENCES `shala_foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hub_user` FOREIGN KEY (`uid`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_hub
-- ----------------------------
INSERT INTO `shala_hub` VALUES ('1', '5', '10', '0', '1');
INSERT INTO `shala_hub` VALUES ('2', '5', '15', '1', '0');
INSERT INTO `shala_hub` VALUES ('3', '5', '16', '1', '0');
INSERT INTO `shala_hub` VALUES ('4', '5', '12', '1', '1');
INSERT INTO `shala_hub` VALUES ('5', '5', '13', '0', '0');
INSERT INTO `shala_hub` VALUES ('6', '5', '14', '1', '1');
INSERT INTO `shala_hub` VALUES ('8', '5', '18', '0', '0');
INSERT INTO `shala_hub` VALUES ('9', '5', '19', '0', '1');
INSERT INTO `shala_hub` VALUES ('10', '5', '20', '1', '0');
INSERT INTO `shala_hub` VALUES ('11', '2', '10', '0', '0');
INSERT INTO `shala_hub` VALUES ('12', '2', '15', '0', '0');
INSERT INTO `shala_hub` VALUES ('13', '2', '16', '0', '0');
INSERT INTO `shala_hub` VALUES ('14', '2', '12', '1', '0');
INSERT INTO `shala_hub` VALUES ('15', '2', '13', '1', '0');
INSERT INTO `shala_hub` VALUES ('16', '2', '14', '1', '0');
INSERT INTO `shala_hub` VALUES ('17', '7', '15', '1', '0');
INSERT INTO `shala_hub` VALUES ('18', '7', '19', '1', '0');
INSERT INTO `shala_hub` VALUES ('19', '7', '17', '0', '1');
INSERT INTO `shala_hub` VALUES ('20', '7', '22', '0', '1');
INSERT INTO `shala_hub` VALUES ('21', '7', '16', '1', '0');
INSERT INTO `shala_hub` VALUES ('22', '7', '18', '1', '0');
INSERT INTO `shala_hub` VALUES ('23', '7', '12', '1', '0');
INSERT INTO `shala_hub` VALUES ('24', '7', '13', '1', '0');
INSERT INTO `shala_hub` VALUES ('25', '7', '14', '1', '0');
INSERT INTO `shala_hub` VALUES ('26', '7', '20', '1', '0');
INSERT INTO `shala_hub` VALUES ('27', '7', '21', '0', '1');
INSERT INTO `shala_hub` VALUES ('28', '7', '23', '0', '1');

-- ----------------------------
-- Table structure for `shala_hubgood`
-- ----------------------------
DROP TABLE IF EXISTS `shala_hubgood`;
CREATE TABLE `shala_hubgood` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品偏好表id',
  `uid` int(11) NOT NULL COMMENT '偏好所属用户',
  `gid` int(11) NOT NULL COMMENT '偏好所属商品',
  `well` int(11) NOT NULL DEFAULT '0' COMMENT '偏好喜欢',
  `bad` int(11) NOT NULL DEFAULT '0' COMMENT '偏好不喜欢',
  PRIMARY KEY (`id`),
  KEY `hub_good_user` (`uid`),
  KEY `hub_good_gid` (`gid`),
  CONSTRAINT `hub_good_gid` FOREIGN KEY (`gid`) REFERENCES `shala_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hub_good_user` FOREIGN KEY (`uid`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_hubgood
-- ----------------------------
INSERT INTO `shala_hubgood` VALUES ('1', '5', '16', '0', '1');
INSERT INTO `shala_hubgood` VALUES ('4', '5', '2', '0', '1');
INSERT INTO `shala_hubgood` VALUES ('5', '5', '3', '0', '1');
INSERT INTO `shala_hubgood` VALUES ('7', '5', '18', '1', '0');

-- ----------------------------
-- Table structure for `shala_luggage`
-- ----------------------------
DROP TABLE IF EXISTS `shala_luggage`;
CREATE TABLE `shala_luggage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double(11,2) DEFAULT NULL COMMENT '运费金额',
  `man` double(11,2) DEFAULT NULL COMMENT '订单满额免运费',
  `status` int(11) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_luggage
-- ----------------------------
INSERT INTO `shala_luggage` VALUES ('1', '12.00', '100.00', '0');

-- ----------------------------
-- Table structure for `shala_menu`
-- ----------------------------
DROP TABLE IF EXISTS `shala_menu`;
CREATE TABLE `shala_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `sort` int(5) NOT NULL,
  `ctime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_menu
-- ----------------------------
INSERT INTO `shala_menu` VALUES ('1', '0', '点餐/预定', '', '点餐/预定', '', '0', '1402240555');
INSERT INTO `shala_menu` VALUES ('2', '1', '预定包间', '', '预定包间', 'http://115.29.193.175/xjl/index.php?s=/Room/roomList', '0', '1402240589');
INSERT INTO `shala_menu` VALUES ('3', '1', '堂食点餐', '', '堂食点餐', 'http://115.29.193.175/xjl/index.php?s=/Index/foodList', '0', '1402240636');
INSERT INTO `shala_menu` VALUES ('4', '1', '外卖订餐', '', '外卖订餐', 'http://115.29.193.175/xjl/index.php?s=/Index/foodList', '0', '1402240663');
INSERT INTO `shala_menu` VALUES ('5', '0', '查询', '', '查询', '', '0', '1402240683');
INSERT INTO `shala_menu` VALUES ('6', '5', '帮助中心', '', '帮助中心', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/12', '0', '1402276842');
INSERT INTO `shala_menu` VALUES ('7', '5', '配送范围', '', '配送范围', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/4', '0', '1402240768');
INSERT INTO `shala_menu` VALUES ('8', '5', '会员卡', '', '会员卡', 'http://115.29.193.175/xjl/index.php?s=/Index/vipCard', '0', '1402276262');
INSERT INTO `shala_menu` VALUES ('9', '5', '我的订单', '', '我的订单', 'http://115.29.193.175/xjl/index.php?s=/Order/orderList', '0', '1402240836');
INSERT INTO `shala_menu` VALUES ('10', '0', '关于我们', '', '关于我们', '', '0', '1402240852');
INSERT INTO `shala_menu` VALUES ('11', '10', '客服中心', '', '客服中心', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/10', '0', '1402240930');
INSERT INTO `shala_menu` VALUES ('12', '10', '招贤纳士', '', '招贤纳士', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/7', '0', '1402240954');
INSERT INTO `shala_menu` VALUES ('13', '10', '菜品展示', '', '菜品展示', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/8', '0', '1402287482');
INSERT INTO `shala_menu` VALUES ('14', '10', '品牌故事', '', '品牌故事', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/9', '0', '1402241017');
INSERT INTO `shala_menu` VALUES ('16', '5', '积分兑换规则', '', '积分兑换规则', 'http://115.29.193.175/xjl/index.php?s=/Article/artInfo/art_id/11', '0', '1402243375');

-- ----------------------------
-- Table structure for `shala_msg`
-- ----------------------------
DROP TABLE IF EXISTS `shala_msg`;
CREATE TABLE `shala_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) NOT NULL COMMENT '通知内容',
  `start_time` varchar(15) NOT NULL COMMENT '系统通知开始时间',
  `end_time` varchar(15) DEFAULT NULL COMMENT '系统通知结束时间',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '系统通知状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_msg
-- ----------------------------
INSERT INTO `shala_msg` VALUES ('1', '下周一全场半折真的', '', '', '9');
INSERT INTO `shala_msg` VALUES ('2', '今天下线', '', '', '9');

-- ----------------------------
-- Table structure for `shala_nfd`
-- ----------------------------
DROP TABLE IF EXISTS `shala_nfd`;
CREATE TABLE `shala_nfd` (
  `name` varchar(255) NOT NULL,
  `desc_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shala_nfd
-- ----------------------------
INSERT INTO `shala_nfd` VALUES ('1ss', '4', '1');

-- ----------------------------
-- Table structure for `shala_order`
-- ----------------------------
DROP TABLE IF EXISTS `shala_order`;
CREATE TABLE `shala_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `name` varchar(255) NOT NULL COMMENT '订单编号',
  `fromuser` int(11) NOT NULL COMMENT '订单所属用户',
  `create_time` int(11) NOT NULL COMMENT '订单创建时间',
  `update_time` int(11) NOT NULL COMMENT '订单修改时间',
  `price` double(11,2) DEFAULT NULL COMMENT '订单总金额',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '订单当前状态',
  `paytype` int(11) DEFAULT '1' COMMENT '支付方式',
  `delivertype` int(11) DEFAULT NULL COMMENT '送货方式',
  `address` varchar(255) NOT NULL DEFAULT '0' COMMENT '该订单配送地址',
  `delidate` varchar(255) DEFAULT NULL COMMENT '配送或者自提时间',
  `luggage` double(11,2) DEFAULT '0.00' COMMENT '运费',
  `benefit` double(11,2) DEFAULT '0.00' COMMENT '优惠价格',
  `remark` varchar(255) DEFAULT NULL COMMENT '订单留言',
  `paymoney` double(11,2) DEFAULT NULL COMMENT '实际支付金额',
  `getcode` int(5) DEFAULT '0' COMMENT '自提提货码',
  `detailadd` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `addname` varchar(255) DEFAULT NULL COMMENT '收货人姓名',
  `tel` varchar(15) DEFAULT NULL COMMENT '收货人电话',
  PRIMARY KEY (`id`),
  KEY `or_user` (`fromuser`),
  CONSTRAINT `or_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_order
-- ----------------------------
INSERT INTO `shala_order` VALUES ('19', '52016092316471378917', '5', '1474620433', '1474620433', '42.45', '3', '1', '1', '3', null, '0.00', '0.00', null, null, '0', '北京市海淀区北京大学口腔医院4321', null, null);
INSERT INTO `shala_order` VALUES ('21', '72016092317095430442', '7', '1474621794', '1474621794', '43.23', '0', '1', '1', '11', null, '0.00', '0.00', null, null, '74204', '北京朝阳区朝外大街6号（新城国际）26号楼底商103号', null, null);
INSERT INTO `shala_order` VALUES ('24', '72016092909540769458', '7', '1475114047', '1476173962', '48.00', '2', '1', '1', '15', null, '0.00', '0.00', null, null, '22329', '天津市南开区天津市南开区咸阳路小学1234', null, null);
INSERT INTO `shala_order` VALUES ('25', '72016100810054229363', '7', '1475892342', '1476265800', '38.00', '9', '1', '1', '15', '2016-10-09=10:00-11:00', '12.00', '7.60', '', '42.40', '0', '天津市南开区天津市南开区咸阳路小学1234', null, null);
INSERT INTO `shala_order` VALUES ('26', '72016100907414798813', '7', '1475970107', '1476173879', '38.00', '3', '1', '1', '15', null, '12.00', '0.00', null, '50.00', '0', '天津市南开区天津市南开区咸阳路小学1234', null, null);
INSERT INTO `shala_order` VALUES ('27', '72016100907441932593', '7', '1475970259', '1476170581', '36.00', '3', '1', '1', '15', null, '12.00', '0.00', null, '48.00', '0', '天津市南开区天津市南开区咸阳路小学1234', null, null);
INSERT INTO `shala_order` VALUES ('28', '72016101417532242379', '7', '1476438802', '1476438802', '38.00', '0', '1', '1', '15', null, '12.00', '0.00', null, '50.00', '0', '天津市南开区天津市南开区咸阳路小学1234', null, null);
INSERT INTO `shala_order` VALUES ('29', '102016102211250762209', '10', '1477106707', '1477106707', '38.00', '0', '1', '1', '0', null, '12.00', '0.00', null, '50.00', '0', '', null, null);
INSERT INTO `shala_order` VALUES ('30', '102016102211323511354', '10', '1477107155', '1477108303', '76.00', '0', '1', '1', '16', '2016-10-24=16:00-17:00', '12.00', '0.00', '', '88.00', '0', '天津市南开区大悦城(天津)阿里啦咯啦咯', null, null);

-- ----------------------------
-- Table structure for `shala_orgo`
-- ----------------------------
DROP TABLE IF EXISTS `shala_orgo`;
CREATE TABLE `shala_orgo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单商品关联表id',
  `gid` int(11) NOT NULL COMMENT '商品id',
  `gprice` double(11,2) NOT NULL COMMENT '商品价格',
  `gnum` int(11) NOT NULL COMMENT '商品数量',
  `oid` int(11) NOT NULL COMMENT '订单id',
  PRIMARY KEY (`id`),
  KEY `orgod` (`oid`),
  CONSTRAINT `orgod` FOREIGN KEY (`oid`) REFERENCES `shala_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_orgo
-- ----------------------------
INSERT INTO `shala_orgo` VALUES ('28', '18', '12.45', '1', '19');
INSERT INTO `shala_orgo` VALUES ('29', '2', '30.00', '1', '19');
INSERT INTO `shala_orgo` VALUES ('32', '16', '43.23', '1', '21');
INSERT INTO `shala_orgo` VALUES ('35', '26', '48.00', '1', '24');
INSERT INTO `shala_orgo` VALUES ('36', '27', '38.00', '1', '25');
INSERT INTO `shala_orgo` VALUES ('37', '28', '38.00', '1', '26');
INSERT INTO `shala_orgo` VALUES ('38', '3', '36.00', '1', '27');
INSERT INTO `shala_orgo` VALUES ('39', '29', '38.00', '1', '28');
INSERT INTO `shala_orgo` VALUES ('40', '30', '38.00', '1', '29');
INSERT INTO `shala_orgo` VALUES ('41', '31', '38.00', '2', '30');

-- ----------------------------
-- Table structure for `shala_rate`
-- ----------------------------
DROP TABLE IF EXISTS `shala_rate`;
CREATE TABLE `shala_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品评价主键',
  `wellnum` varchar(255) NOT NULL,
  `msgtext` varchar(255) DEFAULT NULL,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_rate
-- ----------------------------
INSERT INTO `shala_rate` VALUES ('10', '3', '不错', '16', '7', '1473666566', '0');

-- ----------------------------
-- Table structure for `shala_shop`
-- ----------------------------
DROP TABLE IF EXISTS `shala_shop`;
CREATE TABLE `shala_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `working` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_shop
-- ----------------------------
INSERT INTO `shala_shop` VALUES ('1', '望京SOHO店', '10', '1064796887', '周一至周六 8:00-20:00', '0');
INSERT INTO `shala_shop` VALUES ('5', '新城店', '11', '2147483647', '周一至周日 8:00-20:00', '0');
INSERT INTO `shala_shop` VALUES ('6', '测试点', '12', '110', '9:00---9:00', '9');

-- ----------------------------
-- Table structure for `shala_shoppic`
-- ----------------------------
DROP TABLE IF EXISTS `shala_shoppic`;
CREATE TABLE `shala_shoppic` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '门店图片id',
  `pic` varchar(255) DEFAULT NULL COMMENT '门店图片轮播',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_shoppic
-- ----------------------------
INSERT INTO `shala_shoppic` VALUES ('1', 'Uploads/shop/201609/d4-img-1.jpg');
INSERT INTO `shala_shoppic` VALUES ('2', 'Uploads/shop/201609/3518.jpg');
INSERT INTO `shala_shoppic` VALUES ('3', 'Uploads/shop/201609/3547.jpg');
INSERT INTO `shala_shoppic` VALUES ('4', 'Uploads/shop/201609/3574.jpg');
INSERT INTO `shala_shoppic` VALUES ('6', 'Uploads/shop/201609/8ff0ff14d8c548a09a166e94a7fe4a74.jpg');

-- ----------------------------
-- Table structure for `shala_token`
-- ----------------------------
DROP TABLE IF EXISTS `shala_token`;
CREATE TABLE `shala_token` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_id` int(10) NOT NULL,
  `token` varchar(50) NOT NULL,
  `api_url` varchar(100) NOT NULL,
  `ctime` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_token
-- ----------------------------
INSERT INTO `shala_token` VALUES ('2', '0', 'wt2pno16e3', 'http://您的域名/index.php/Api/WeiXin/responseMsg/wt2pno16e3', '1397202118', '0');

-- ----------------------------
-- Table structure for `shala_user`
-- ----------------------------
DROP TABLE IF EXISTS `shala_user`;
CREATE TABLE `shala_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(20) DEFAULT NULL COMMENT '用户姓名',
  `tel` varchar(15) NOT NULL COMMENT '用户电话',
  `wx_id` varchar(255) DEFAULT NULL COMMENT '微信授权id',
  `address` int(255) NOT NULL DEFAULT '0' COMMENT '用户地址',
  `sex` varchar(11) DEFAULT NULL COMMENT '用户性别',
  `pic` varchar(255) DEFAULT NULL COMMENT '用户头像地址',
  `balance` float DEFAULT NULL COMMENT '用户余额',
  `pwd` varchar(255) DEFAULT '' COMMENT '用户密码',
  `delivertype` int(11) NOT NULL DEFAULT '1' COMMENT '默认物流方式',
  `create_time` int(11) DEFAULT NULL COMMENT '用户创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_user
-- ----------------------------
INSERT INTO `shala_user` VALUES ('2', '强', '13163177872', null, '10', null, null, null, 'e10adc3949ba59abbe56e057f20f883e', '1', null);
INSERT INTO `shala_user` VALUES ('5', '黑', '13163177871', null, '3', null, null, null, 'e10adc3949ba59abbe56e057f20f883e', '1', null);
INSERT INTO `shala_user` VALUES ('7', '再见', '13163177870', null, '15', null, null, null, 'e10adc3949ba59abbe56e057f20f883e', '1', null);
INSERT INTO `shala_user` VALUES ('9', 'level', '15523455432', null, '10', null, null, null, 'c33367701511b4f6020ec61ded352059', '1', '1474598516');
INSERT INTO `shala_user` VALUES ('10', null, '18630830168', null, '16', null, null, null, '96e79218965eb72c92a549dd5a330112', '1', '1477106623');

-- ----------------------------
-- Table structure for `shala_usercou`
-- ----------------------------
DROP TABLE IF EXISTS `shala_usercou`;
CREATE TABLE `shala_usercou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `couid` int(11) NOT NULL COMMENT '优惠卷id',
  `utype` int(11) NOT NULL DEFAULT '0' COMMENT '优惠卷使用状态',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `u_c` (`uid`),
  KEY `c_u` (`couid`),
  CONSTRAINT `c_u` FOREIGN KEY (`couid`) REFERENCES `shala_coupon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `u_c` FOREIGN KEY (`uid`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_usercou
-- ----------------------------

-- ----------------------------
-- Table structure for `shala_weixin_article`
-- ----------------------------
DROP TABLE IF EXISTS `shala_weixin_article`;
CREATE TABLE `shala_weixin_article` (
  `wxa_id` int(10) NOT NULL AUTO_INCREMENT,
  `wxa_type` int(1) NOT NULL,
  `wxa_keywords` varchar(50) NOT NULL,
  `wxa_keywords_type` int(1) NOT NULL,
  `wxa_title` varchar(200) NOT NULL,
  `wxa_description` text NOT NULL,
  `wxa_picurl` varchar(200) NOT NULL,
  `wxa_url` varchar(200) NOT NULL,
  `wxa_sort` int(5) NOT NULL,
  `ctime` int(10) NOT NULL,
  `utime` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`wxa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_weixin_article
-- ----------------------------
INSERT INTO `shala_weixin_article` VALUES ('2', '1', '', '0', '', '欢迎进入湘极了订外卖、包间预订及会员积分系统！\r\n详情请看以下底部菜单。\r\n发送【秘籍】或【MJ】可查询详细操作流程。\r\n湘极了盛大升级：订外卖和堂食均可赢积分，天天免费兑菜品，想吃什么送什么。月总积分前6位食客月月免费来湘极了吃大餐（详情请进底部菜单“查询”——>“积分兑换规则”）', '', '', '0', '1397024410', '1402999632', '0');
INSERT INTO `shala_weixin_article` VALUES ('5', '2', '笑话', '1', '', '一次去公厕小解，尿急没仔细看就进去了。当时我就凌乱了，里面有两个妇女，我找一个坑迅速蹲了下去，完事就提裤走了出来，真尴尬啊。\r\n这时后面一女人说：“哎玛，我以为是男的呢！原来是个女汉子...”', '', '', '0', '1397027157', '1397102311', '0');
INSERT INTO `shala_weixin_article` VALUES ('9', '3', '订餐', '1', '（可正常下单了）', '欢迎来到湘极了订餐外卖系统', 'http://t2.qpic.cn/mblogpic/4de8288df8f46075a012/460', 'http://115.29.193.175/xjl/index.php?s=/Home/Index/foodList', '7', '1397093888', '1399983054', '0');
INSERT INTO `shala_weixin_article` VALUES ('10', '0', '订餐', '0', '', '对不起，您的问题太难了，请来一点三四岁小孩的问题，谢谢', '', '', '0', '1397095078', '1398134105', '0');
INSERT INTO `shala_weixin_article` VALUES ('11', '3', '订餐', '1', '外卖订餐/堂食点餐', '外卖订餐', 'http://t2.qpic.cn/mblogpic/f527b648fd1692ba346e/460', 'http://115.29.193.175/xjl/index.php?s=/Home/Index/foodList', '6', '1397100034', '1400236406', '0');
INSERT INTO `shala_weixin_article` VALUES ('12', '2', '你好', '1', '', '您好，我们是一家专注原生态湘西土家菜的餐厅！期待您的光临！', '', '', '0', '1397102650', '1398393498', '0');
INSERT INTO `shala_weixin_article` VALUES ('13', '2', '电话', '0', '', '固定电话:010-57462890 \r\n固定电话:010-57139353\r\n服务监督电话:18801087807', '', '', '0', '1397106173', '1398320470', '0');
INSERT INTO `shala_weixin_article` VALUES ('15', '3', '订餐', '1', '会员卡', '会员卡', 'http://weixin.genduanzi.com/Uploads/wxaImg/201404/5347743af3753.png', 'http://115.29.193.175/xjl/index.php?s=/Home/Index/vipCard', '0', '1397123444', '1398086646', '0');
INSERT INTO `shala_weixin_article` VALUES ('16', '3', '订餐', '1', '预订包间', '预订包间', 'http://t2.qpic.cn/mblogpic/478b17dd3ebdb0f81e5e/460', 'http://115.29.193.175/xjl/index.php?s=/Home/Room/roomList', '5', '1397546723', '1399444021', '0');
INSERT INTO `shala_weixin_article` VALUES ('17', '3', '订餐', '1', '我的订单', '我的订单', 'http://www.geziba.com/item_pic/50011150/12727360079.jpg', 'http://115.29.193.175/xjl/index.php/Order/orderList', '4', '1397547870', '1399385079', '0');
INSERT INTO `shala_weixin_article` VALUES ('18', '3', '订餐', '1', '配送范围及帮助中心', '配送范围', 'http://shunde.zsjjob.com/user/help/images/jianlizhushou_r1_c1.jpg', 'http://115.29.193.175/xjl/index.php?s=/Home/Article/artInfo/art_id/4', '3', '1397547968', '1399385182', '0');
INSERT INTO `shala_weixin_article` VALUES ('19', '3', '订餐', '1', '关于我们', '关于我们', 'http://weixin.genduanzi.com/Uploads/wxaImg/201404/53548b5277edb.png', 'http://115.29.193.175/xjl/index.php?s=/Home/Article/artInfo/art_id/3', '0', '1398049618', '1398086657', '0');
INSERT INTO `shala_weixin_article` VALUES ('20', '3', '秘籍 MJ', '0', '如何在餐厅用手机快速点餐', '如何在餐厅用手机快速点餐', 'http://t2.qpic.cn/mblogpic/db0c7e7f0e7179d77f60/460', 'http://mp.weixin.qq.com/s?__biz=MjM5NjI0NDg3Mg==&mid=200409907&idx=1&sn=1d60d6941d8c3c9b4c9cb768b5852067#rd', '0', '1402584387', '1402998922', '0');
INSERT INTO `shala_weixin_article` VALUES ('21', '3', '秘籍 MJ', '0', '订外卖流程', '订外卖流程', 'http://t2.qpic.cn/mblogpic/ac776e54bf4ab75b154a/460', 'http://mp.weixin.qq.com/s?__biz=MjM5NjI0NDg3Mg==&mid=200409907&idx=2&sn=532a5f3905b1a4b4521e76fca105423e#rd', '0', '1402584507', '1402998698', '0');
INSERT INTO `shala_weixin_article` VALUES ('22', '3', '秘籍 MJ', '0', '订包间流程', '订包间流程', 'http://t2.qpic.cn/mblogpic/e7d4cbc77bed91521386/460', 'http://mp.weixin.qq.com/s?__biz=MjM5NjI0NDg3Mg==&mid=200409907&idx=3&sn=27d578a419a1b9bd282128de4749d9c4#rd', '0', '1402999072', '0', '0');
INSERT INTO `shala_weixin_article` VALUES ('23', '3', '秘籍 MJ', '0', '会员积分查询秘籍', '会员积分查询秘籍', 'http://t2.qpic.cn/mblogpic/5b9c5484d5ef142af024/460', 'http://mp.weixin.qq.com/s?__biz=MjM5NjI0NDg3Mg==&mid=200409907&idx=4&sn=d47016e81d773e849bff7389efc2460a#rd', '0', '1402999191', '1402999854', '0');
INSERT INTO `shala_weixin_article` VALUES ('24', '3', '秘籍 MJ', '0', '积分兑换菜品秘籍', '积分兑换菜品秘籍', 'http://t2.qpic.cn/mblogpic/be37ff7a0cc2a196bcb0/460', 'http://mp.weixin.qq.com/s?__biz=MjM5NjI0NDg3Mg==&mid=200409907&idx=5&sn=20ad858511bdbe173d72f41e4663912c#rd', '0', '1402999293', '1402999875', '0');
INSERT INTO `shala_weixin_article` VALUES ('25', '3', '秘籍 MJ', '0', '30人包间聚会', '30人包间聚会', 'http://t2.qpic.cn/mblogpic/475093ed66447fd333dc/460', 'http://mp.weixin.qq.com/s?__biz=MjM5NjI0NDg3Mg==&mid=200409907&idx=6&sn=26b66dbcdc724467fdfbbc51d82e8e6b#rd', '0', '1402999512', '0', '0');

-- ----------------------------
-- View structure for `shala_foodcate`
-- ----------------------------
DROP VIEW IF EXISTS `shala_foodcate`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_foodcate` AS select `shala_foods`.`id` AS `fid`,`shala_foods`.`name` AS `fname`,`shala_foods`.`cate_id` AS `fcate_id`,`shala_foods`.`pic` AS `fpic`,`shala_foods`.`create_time` AS `fcreate_time`,`shala_foods`.`update_time` AS `fupdate_time`,`shala_foods`.`price` AS `fprice`,`shala_fcate`.`name` AS `cname`,`shala_foods`.`status` AS `fstatus` from (`shala_foods` join `shala_fcate`) where ((`shala_foods`.`cate_id` = `shala_fcate`.`id`) and (`shala_foods`.`status` <> 9)) ;

-- ----------------------------
-- View structure for `shala_gleygood`
-- ----------------------------
DROP VIEW IF EXISTS `shala_gleygood`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_gleygood` AS select `shala_goods`.`id` AS `gid`,`shala_goods`.`name` AS `gname`,`shala_goods`.`constituent` AS `gconstituent`,`shala_goods`.`cate_id` AS `gcate_id`,`shala_goods`.`pic` AS `gpic`,`shala_goods`.`price` AS `gprice`,`shala_goods`.`status` AS `gstatus`,`shala_goods`.`remark` AS `gremark`,`shala_goods`.`create_time` AS `gcreate_time`,`shala_goods`.`update_time` AS `gupdate_time`,`shala_gley`.`fromuser` AS `glfromuser`,`shala_gley`.`goodnum` AS `goodnum`,`shala_gley`.`id` AS `glid` from (`shala_gley` join `shala_goods`) where (`shala_gley`.`goods` = `shala_goods`.`id`) ;

-- ----------------------------
-- View structure for `shala_goodcate`
-- ----------------------------
DROP VIEW IF EXISTS `shala_goodcate`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_goodcate` AS select `shala_goods`.`id` AS `gid`,`shala_goods`.`name` AS `gname`,`shala_goods`.`constituent` AS `gconstituent`,`shala_goods`.`cate_id` AS `gcate_id`,`shala_goods`.`pic` AS `gpic`,`shala_goods`.`price` AS `gprice`,`shala_goods`.`status` AS `gstatus`,`shala_goods`.`remark` AS `gremark`,`shala_goods`.`create_time` AS `gcreate_time`,`shala_goods`.`update_time` AS `gupdate_time`,`shala_gcate`.`name` AS `cname`,`shala_gcate`.`status` AS `cstatus`,`shala_goods`.`zannum` AS `zannum`,`shala_goods`.`unzannum` AS `unzannum` from (`shala_goods` join `shala_gcate`) where ((`shala_goods`.`cate_id` = `shala_gcate`.`id`) and (`shala_goods`.`status` <> 9) and (`shala_gcate`.`status` <> 9)) ;

-- ----------------------------
-- View structure for `shala_hubfooduser`
-- ----------------------------
DROP VIEW IF EXISTS `shala_hubfooduser`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_hubfooduser` AS select `shala_foodcate`.`fid` AS `fid`,`shala_foodcate`.`fname` AS `fname`,`shala_foodcate`.`fcate_id` AS `fcate_id`,`shala_foodcate`.`fpic` AS `fpic`,`shala_foodcate`.`fcreate_time` AS `fcreate_time`,`shala_foodcate`.`fupdate_time` AS `fupdate_time`,`shala_foodcate`.`fprice` AS `fprice`,`shala_foodcate`.`cname` AS `cname`,`shala_foodcate`.`fstatus` AS `fstatus`,`shala_hub`.`well` AS `well`,`shala_hub`.`bad` AS `bad`,`shala_hub`.`uid` AS `uid` from ((`shala_hub` join `shala_user`) join `shala_foodcate`) where ((`shala_hub`.`uid` = `shala_user`.`id`) and (`shala_hub`.`fid` = `shala_foodcate`.`fid`)) ;

-- ----------------------------
-- View structure for `shala_hubgooduser`
-- ----------------------------
DROP VIEW IF EXISTS `shala_hubgooduser`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_hubgooduser` AS select `shala_goodcate`.`gid` AS `gid`,`shala_goodcate`.`gname` AS `gname`,`shala_goodcate`.`gconstituent` AS `gconstituent`,`shala_goodcate`.`gcate_id` AS `gcate_id`,`shala_goodcate`.`gpic` AS `gpic`,`shala_goodcate`.`gprice` AS `gprice`,`shala_goodcate`.`gstatus` AS `gstatus`,`shala_goodcate`.`gremark` AS `gremark`,`shala_goodcate`.`gcreate_time` AS `gcreate_time`,`shala_goodcate`.`gupdate_time` AS `gupdate_time`,`shala_goodcate`.`cname` AS `cname`,`shala_hubgood`.`uid` AS `uid`,`shala_hubgood`.`well` AS `well`,`shala_hubgood`.`bad` AS `bad` from (`shala_goodcate` join `shala_hubgood`) where (`shala_hubgood`.`gid` = `shala_goodcate`.`gid`) ;

-- ----------------------------
-- View structure for `shala_ordadd`
-- ----------------------------
DROP VIEW IF EXISTS `shala_ordadd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_ordadd` AS select `shala_address`.`name` AS `addname`,`shala_address`.`sex` AS `sex`,`shala_address`.`tel` AS `tel`,`shala_address`.`city` AS `city`,`shala_address`.`numhouse` AS `numhouse`,`shala_address`.`label` AS `label`,`shala_address`.`provice` AS `provice`,`shala_order`.`id` AS `oid`,`shala_order`.`name` AS `ordname`,`shala_order`.`fromuser` AS `fromuser`,`shala_order`.`create_time` AS `create_time`,`shala_order`.`update_time` AS `update_time`,`shala_order`.`price` AS `price`,`shala_order`.`type` AS `type`,`shala_order`.`paytype` AS `paytype`,`shala_order`.`delivertype` AS `delivertype`,`shala_order`.`address` AS `address`,`shala_order`.`benefit` AS `benefit`,`shala_order`.`luggage` AS `luggage`,`shala_order`.`delidate` AS `delidate`,`shala_order`.`remark` AS `remark`,`shala_order`.`paymoney` AS `paymoney`,`shala_order`.`getcode` AS `getcode`,`shala_order`.`detailadd` AS `detailadd` from (`shala_order` join `shala_address`) where ((`shala_order`.`address` = `shala_address`.`id`) and (`shala_order`.`type` <> 9)) ;

-- ----------------------------
-- View structure for `shala_orgood`
-- ----------------------------
DROP VIEW IF EXISTS `shala_orgood`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_orgood` AS select `shala_orgo`.`id` AS `id`,`shala_orgo`.`gid` AS `gid`,`shala_orgo`.`gprice` AS `gprice`,`shala_orgo`.`gnum` AS `gnum`,`shala_orgo`.`oid` AS `oid`,`shala_goods`.`name` AS `name`,`shala_goods`.`constituent` AS `constituent`,`shala_goods`.`pic` AS `pic`,`shala_order`.`fromuser` AS `uid`,`shala_goods`.`remark` AS `remark` from ((`shala_orgo` join `shala_goods`) join `shala_order`) where ((`shala_orgo`.`gid` = `shala_goods`.`id`) and (`shala_orgo`.`oid` = `shala_order`.`id`)) ;

-- ----------------------------
-- View structure for `shala_shopadd`
-- ----------------------------
DROP VIEW IF EXISTS `shala_shopadd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_shopadd` AS select `shala_shop`.`id` AS `id`,`shala_shop`.`name` AS `name`,`shala_shop`.`tel` AS `tel`,`shala_shop`.`working` AS `working`,`shala_address`.`detailadd` AS `address`,`shala_address`.`city` AS `city`,`shala_address`.`id` AS `addid`,`shala_address`.`numhouse` AS `numhouse` from (`shala_shop` join `shala_address`) where ((`shala_shop`.`address` = `shala_address`.`id`) and (`shala_shop`.`status` <> 9)) ;

-- ----------------------------
-- View structure for `shala_ucoupon`
-- ----------------------------
DROP VIEW IF EXISTS `shala_ucoupon`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_ucoupon` AS select `shala_coupon`.`type` AS `type`,`shala_coupon`.`startime` AS `startime`,`shala_coupon`.`endtime` AS `endtime`,`shala_coupon`.`num` AS `num`,`shala_coupon`.`man` AS `man`,`shala_coupon`.`jian` AS `jian`,`shala_coupon`.`zhe` AS `zhe`,`shala_coupon`.`miane` AS `miane`,`shala_coupon`.`status` AS `status`,`shala_usercou`.`uid` AS `uid`,`shala_usercou`.`id` AS `id`,`shala_usercou`.`utype` AS `utype` from (`shala_coupon` join `shala_usercou`) where (`shala_usercou`.`couid` = `shala_coupon`.`id`) ;

-- ----------------------------
-- View structure for `shala_urate`
-- ----------------------------
DROP VIEW IF EXISTS `shala_urate`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_urate` AS select `shala_user`.`name` AS `name`,`shala_rate`.`id` AS `id`,`shala_rate`.`wellnum` AS `wellnum`,`shala_rate`.`msgtext` AS `msgtext`,`shala_rate`.`gid` AS `gid`,`shala_rate`.`uid` AS `uid`,`shala_rate`.`create_time` AS `create_time`,`shala_goods`.`name` AS `gname` from ((`shala_rate` join `shala_user`) join `shala_goods`) where ((`shala_rate`.`uid` = `shala_user`.`id`) and (`shala_rate`.`gid` = `shala_goods`.`id`) and (`shala_rate`.`status` <> 9)) ;

-- ----------------------------
-- View structure for `shala_useradd`
-- ----------------------------
DROP VIEW IF EXISTS `shala_useradd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_useradd` AS select `shala_user`.`id` AS `id`,`shala_user`.`name` AS `name`,`shala_user`.`tel` AS `tel`,`shala_user`.`wx_id` AS `wx_id`,`shala_user`.`sex` AS `sex`,`shala_user`.`pic` AS `pic`,`shala_user`.`balance` AS `balance`,`shala_user`.`pwd` AS `pwd`,`shala_user`.`delivertype` AS `delivertype`,`shala_user`.`create_time` AS `create_time`,`shala_address`.`detailadd` AS `address` from (`shala_user` join `shala_address`) where (`shala_user`.`address` = `shala_address`.`id`) ;
