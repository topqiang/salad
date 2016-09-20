/*
Navicat MySQL Data Transfer

Source Server         : foodlink
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : shala

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-09-20 20:39:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shala_address`
-- ----------------------------
DROP TABLE IF EXISTS `shala_address`;
CREATE TABLE `shala_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收货地址ID',
  `name` varchar(255) DEFAULT NULL COMMENT '收货人姓名',
  `sex` varchar(11) DEFAULT NULL COMMENT '收货人性别',
  `tel` int(11) DEFAULT NULL COMMENT '电话',
  `city` varchar(255) DEFAULT NULL COMMENT '所在城市',
  `detailadd` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `numhouse` varchar(255) DEFAULT NULL COMMENT '门牌号',
  `label` varchar(255) DEFAULT NULL COMMENT '地址标签',
  `fromuser` int(11) DEFAULT NULL COMMENT '改地址所属用户',
  `provice` varchar(255) DEFAULT '北京' COMMENT '地址省份',
  PRIMARY KEY (`id`),
  KEY `add_user` (`fromuser`),
  CONSTRAINT `add_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_address
-- ----------------------------
INSERT INTO `shala_address` VALUES ('1', '阚自强', '男', '12345678', '房山区', '北京市丰台区北京西站-南广场', '1234', '小区', '5', '北京');
INSERT INTO `shala_address` VALUES ('2', '小王', '男', '12345678', '朝阳区', '北京市丰台区北京西站-南广场', '1234', '学校', '5', '北京');
INSERT INTO `shala_address` VALUES ('3', '再见', '男', '84932058', '海淀区', '北京市海淀区北京大学口腔医院', '4321', '学校\n', '5', '北京');
INSERT INTO `shala_address` VALUES ('4', 'zizi', '男', '2147483647', '西城区', '北京市东城区褡裢火烧(东四北大街)', '7890', '公司', '5', '北京');
INSERT INTO `shala_address` VALUES ('5', 'zizi', '男', '2147483647', '朝阳区', '北京市朝阳区朝阳公园', '4321', '学校', '5', '北京');
INSERT INTO `shala_address` VALUES ('6', 'QIANG', '男', '52435525', '西城区', '北京市西城区西城区', '1234', '学校', '5', '北京');

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
-- Table structure for `shala_fcate`
-- ----------------------------
DROP TABLE IF EXISTS `shala_fcate`;
CREATE TABLE `shala_fcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '分类备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_fcate
-- ----------------------------
INSERT INTO `shala_fcate` VALUES ('9', '水果类', '菜品分类');
INSERT INTO `shala_fcate` VALUES ('10', '硬质蔬菜类', '菜品分类');
INSERT INTO `shala_fcate` VALUES ('11', '碳水&豆子&蛋白', '菜品分类');
INSERT INTO `shala_fcate` VALUES ('12', '健康油脂类', '菜品分类');
INSERT INTO `shala_fcate` VALUES ('13', '丰富配料类', '菜品分类');
INSERT INTO `shala_fcate` VALUES ('14', '基菜', '不可删除');
INSERT INTO `shala_fcate` VALUES ('15', '酱料', '不可删除');

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
INSERT INTO `shala_foods` VALUES ('8', '罗马生菜', '14', 'Uploads/foods/201609/57d65e06684fe.png', '1473666566', '1473666566', '12.00', '0');
INSERT INTO `shala_foods` VALUES ('9', '球形生菜', '14', 'Uploads/foods/201609/57d65e32c0c43.png', '1473666610', '1473666610', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('10', '苦菊', '9', 'Uploads/foods/201609/57d65e52c2895.png', '1473666642', '1473666642', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('11', '子叶生菜', '14', 'Uploads/foods/201609/57d65e69127f9.png', '1473666665', '1473666665', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('12', '圣女果', '10', 'Uploads/foods/201609/57d65e8ea2966.png', '1473666702', '1473666702', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('13', '芦笋', '10', 'Uploads/foods/201609/57d65e9f20351.png', '1473666719', '1473666719', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('14', '西芹', '10', 'Uploads/foods/201609/57d65ebd954f2.png', '1473666749', '1473666749', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('15', '橙子', '9', 'Uploads/foods/201609/57d65ee38f475.png', '1473666787', '1473666787', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('16', '菠萝', '9', 'Uploads/foods/201609/57d65ef1e1bb7.png', '1473666801', '1473666801', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('17', '哈密瓜', '12', 'Uploads/foods/201609/57d65f015fb19.png', '1473666817', '1473686303', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('18', '鸡蛋', '11', 'Uploads/foods/201609/57d65f39c86a6.png', '1473666873', '1473666873', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('19', '烤土豆', '11', 'Uploads/foods/201609/57d65f49e85ec.png', '1473666889', '1473666889', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('20', '玉米', '11', 'Uploads/foods/201609/57d65f58394d0.png', '1473666904', '1473666904', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('21', '白煮鸡胸', '12', 'Uploads/foods/201609/57d65f952359b.png', '1473666965', '1473666965', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('22', '牛油果', '13', 'Uploads/foods/201609/57d65fab728a9.png', '1473666987', '1473686244', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('23', '烤茄子', '12', 'Uploads/foods/201609/57d65fc716007.png', '1473667015', '1473667015', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('24', '辣酱', '15', 'Uploads/foods/201609/57d7720867e60.png', '1473737224', '1473737224', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('25', '甜酱', '15', 'Uploads/foods/201609/57d7722b047e0.png', '1473737259', '1473737274', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('26', '蒜酱', '15', 'Uploads/foods/201609/57d7724e03e2d.png', '1473737294', '1473737294', '0.00', '0');
INSERT INTO `shala_foods` VALUES ('27', '麻酱', '15', 'Uploads/foods/201609/57d77265c2212.png', '1473737317', '1473737317', '0.00', '0');

-- ----------------------------
-- Table structure for `shala_gcate`
-- ----------------------------
DROP TABLE IF EXISTS `shala_gcate`;
CREATE TABLE `shala_gcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `name` varchar(255) NOT NULL COMMENT '商品分类名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '商品分类备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_gcate
-- ----------------------------
INSERT INTO `shala_gcate` VALUES ('1', '早餐', '商品分类');
INSERT INTO `shala_gcate` VALUES ('2', '三明治', '商品分类');
INSERT INTO `shala_gcate` VALUES ('3', '小食', '商品分类');
INSERT INTO `shala_gcate` VALUES ('4', '健康饮品', '商品分类');
INSERT INTO `shala_gcate` VALUES ('5', '自选沙拉大份', '48');
INSERT INTO `shala_gcate` VALUES ('6', '自选沙拉小份', '38');
INSERT INTO `shala_gcate` VALUES ('7', '自选卷', '25');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_gley
-- ----------------------------
INSERT INTO `shala_gley` VALUES ('7', '19', '6', '1');

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
  PRIMARY KEY (`id`),
  KEY `good_gcate` (`cate_id`),
  CONSTRAINT `good_gcate` FOREIGN KEY (`cate_id`) REFERENCES `shala_gcate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_goods
-- ----------------------------
INSERT INTO `shala_goods` VALUES ('2', '美式烤肋排', '鸡翅，番茄酱，烧烤酱', '3', 'Uploads/goods/201609/57d6573d8c6c1.png', '30.00', '0', '非常好吃', '1473664829', '1473664829');
INSERT INTO `shala_goods` VALUES ('3', 'VOSS矿泉水', 'voss矿泉水', '4', 'Uploads/goods/201609/57d65aaf862af.png', '36.00', '0', '健康水', '1473665711', '1473665711');
INSERT INTO `shala_goods` VALUES ('7', '自选沙拉大份', '球形生菜X1份    橙子X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473747526', '1473747526');
INSERT INTO `shala_goods` VALUES ('8', '自选沙拉大份', '球形生菜X1份    橙子X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473751828', '1473751828');
INSERT INTO `shala_goods` VALUES ('9', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755907', '1473755907');
INSERT INTO `shala_goods` VALUES ('10', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755917', '1473755917');
INSERT INTO `shala_goods` VALUES ('11', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755976', '1473755976');
INSERT INTO `shala_goods` VALUES ('12', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473756074', '1473756074');
INSERT INTO `shala_goods` VALUES ('13', '自选沙拉大份', '罗马生菜X2份    子叶生菜X1份    球形生菜X1份    菠萝X1份    西芹X1份    圣女果X1份    橙子X1份    玉米X1份    芦笋X1份    烤茄子X1份    哈密瓜X1份    白煮鸡胸X1份    牛油果X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473845179', '1473845179');
INSERT INTO `shala_goods` VALUES ('14', '自选沙拉大份', '罗马生菜X4份    菠萝X1份    西芹X1份    橙子X1份    玉米X1份    圣女果X1份    芦笋X1份    哈密瓜X1份    牛油果X1份    烤茄子X1份    白煮鸡胸X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473845229', '1473845229');
INSERT INTO `shala_goods` VALUES ('15', '自选沙拉小份', '苦菊X1份    橙子X1份    鸡蛋X3份    烤土豆X4份    辣酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', 'diy', '1473845904', '1473845904');
INSERT INTO `shala_goods` VALUES ('16', '测试', '大法师法师的放大', '1', 'Uploads/goods/201609/57de03e1951dc.png', '43.23', '0', '', '1474167777', '1474167777');
INSERT INTO `shala_goods` VALUES ('17', '非常可乐', '水', '4', 'Uploads/goods/201609/57de0400c4632.jpg', '2.99', '0', '', '1474167808', '1474167808');
INSERT INTO `shala_goods` VALUES ('18', '测试', '谁啊哈对撒发', '2', 'Uploads/goods/201609/57de0424e10a5.png', '12.45', '0', '', '1474167844', '1474167844');
INSERT INTO `shala_goods` VALUES ('19', '自选沙拉大份', '罗马生菜X3份    球形生菜X1份    苦菊X1份    橙子X2份    菠萝X1份    甜酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1474278066', '1474278066');
INSERT INTO `shala_goods` VALUES ('20', '自选卷', '球形生菜X1份    苦菊X1份    橙子X1份    鸡蛋X1份    烤土豆X1份    辣酱X1份    ', '7', 'Uploads/goods/201609/efc3527e79264b90aa657037f19780e1.jpg', '25.00', '0', 'diy', '1474358840', '1474358840');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_hub
-- ----------------------------
INSERT INTO `shala_hub` VALUES ('1', '5', '10', '0', '1');
INSERT INTO `shala_hub` VALUES ('2', '5', '15', '1', '0');
INSERT INTO `shala_hub` VALUES ('3', '5', '16', '1', '0');
INSERT INTO `shala_hub` VALUES ('4', '5', '12', '1', '1');
INSERT INTO `shala_hub` VALUES ('5', '5', '13', '1', '1');
INSERT INTO `shala_hub` VALUES ('6', '5', '14', '1', '1');
INSERT INTO `shala_hub` VALUES ('8', '5', '18', '0', '1');
INSERT INTO `shala_hub` VALUES ('9', '5', '19', '0', '1');
INSERT INTO `shala_hub` VALUES ('10', '5', '20', '1', '0');

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
  `paytype` int(11) DEFAULT NULL COMMENT '支付方式',
  `delivertype` int(11) DEFAULT NULL COMMENT '送货方式',
  `address` int(11) NOT NULL COMMENT '该订单配送地址',
  PRIMARY KEY (`id`),
  KEY `or_user` (`fromuser`),
  CONSTRAINT `or_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_order
-- ----------------------------
INSERT INTO `shala_order` VALUES ('5', '52016092017061777011', '5', '0', '0', '55.00', '0', null, '1', '6');
INSERT INTO `shala_order` VALUES ('7', '52016092017271442481', '5', '1474363634', '1474363634', '109.23', '0', null, '1', '6');
INSERT INTO `shala_order` VALUES ('8', '52016092017363126531', '5', '1474364191', '1474364191', '15.44', '0', null, '1', '6');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_orgo
-- ----------------------------
INSERT INTO `shala_orgo` VALUES ('1', '2', '30.00', '1', '5');
INSERT INTO `shala_orgo` VALUES ('2', '20', '25.00', '1', '5');
INSERT INTO `shala_orgo` VALUES ('3', '16', '43.23', '1', '7');
INSERT INTO `shala_orgo` VALUES ('4', '2', '30.00', '1', '7');
INSERT INTO `shala_orgo` VALUES ('5', '3', '36.00', '2', '7');
INSERT INTO `shala_orgo` VALUES ('6', '18', '12.45', '1', '8');
INSERT INTO `shala_orgo` VALUES ('7', '17', '2.99', '1', '8');

-- ----------------------------
-- Table structure for `shala_preference`
-- ----------------------------
DROP TABLE IF EXISTS `shala_preference`;
CREATE TABLE `shala_preference` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '偏好id',
  `fromfoods` int(11) DEFAULT NULL COMMENT '偏好菜品id',
  `fromuser` int(11) DEFAULT NULL COMMENT '偏好所属用户id',
  `type` int(11) DEFAULT NULL COMMENT '偏好值',
  PRIMARY KEY (`id`),
  KEY `pre_user` (`fromuser`),
  KEY `pre_foods` (`fromfoods`),
  CONSTRAINT `pre_foods` FOREIGN KEY (`fromfoods`) REFERENCES `shala_foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pre_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_preference
-- ----------------------------

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_shop
-- ----------------------------
INSERT INTO `shala_shop` VALUES ('1', '望京SOHO店', '望京SOHO 塔3底商3108', '1064796887', '营业时间：周一至周六 8:00-20:00');
INSERT INTO `shala_shop` VALUES ('5', '新城店', '北京朝阳区朝外大街6号（新城国际）26号楼底商103号', '2147483647', '营业时间：周一至周日 8:00-20:00');

-- ----------------------------
-- Table structure for `shala_shoppic`
-- ----------------------------
DROP TABLE IF EXISTS `shala_shoppic`;
CREATE TABLE `shala_shoppic` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '门店图片id',
  `pic` varchar(255) DEFAULT NULL COMMENT '门店图片轮播',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_shoppic
-- ----------------------------
INSERT INTO `shala_shoppic` VALUES ('1', 'Uploads/shop/201609/profileimg3.png');
INSERT INTO `shala_shoppic` VALUES ('2', 'Uploads/shop/201609/profileimg5.png');
INSERT INTO `shala_shoppic` VALUES ('3', 'Uploads/shop/201609/profileimg6.png');
INSERT INTO `shala_shoppic` VALUES ('4', 'Uploads/shop/201609/profileimg2.png');

-- ----------------------------
-- Table structure for `shala_user`
-- ----------------------------
DROP TABLE IF EXISTS `shala_user`;
CREATE TABLE `shala_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(20) DEFAULT NULL COMMENT '用户姓名',
  `tel` int(15) NOT NULL COMMENT '用户电话',
  `wx_id` int(11) DEFAULT NULL COMMENT '微信授权id',
  `address` int(255) DEFAULT NULL COMMENT '用户地址',
  `sex` int(11) DEFAULT NULL COMMENT '用户性别',
  `pic` varchar(255) DEFAULT NULL COMMENT '用户头像地址',
  `balance` float DEFAULT NULL COMMENT '用户余额',
  `pwd` varchar(255) DEFAULT '' COMMENT '用户密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_user
-- ----------------------------
INSERT INTO `shala_user` VALUES ('1', null, '2323323', null, null, null, null, null, '');
INSERT INTO `shala_user` VALUES ('2', null, '23233', null, null, null, null, null, '');
INSERT INTO `shala_user` VALUES ('3', null, '22222222', null, null, null, null, null, '');
INSERT INTO `shala_user` VALUES ('4', null, '1243543', null, null, null, null, null, '');
INSERT INTO `shala_user` VALUES ('5', null, '123456', null, '6', null, null, null, '');
INSERT INTO `shala_user` VALUES ('6', null, '2147483647', null, null, null, null, null, '');

-- ----------------------------
-- View structure for `shala_foodcate`
-- ----------------------------
DROP VIEW IF EXISTS `shala_foodcate`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_foodcate` AS select `shala_foods`.`id` AS `fid`,`shala_foods`.`name` AS `fname`,`shala_foods`.`cate_id` AS `fcate_id`,`shala_foods`.`pic` AS `fpic`,`shala_foods`.`create_time` AS `fcreate_time`,`shala_foods`.`update_time` AS `fupdate_time`,`shala_foods`.`price` AS `fprice`,`shala_fcate`.`name` AS `cname`,`shala_foods`.`status` AS `fstatus` from (`shala_foods` join `shala_fcate`) where (`shala_foods`.`cate_id` = `shala_fcate`.`id`) ;

-- ----------------------------
-- View structure for `shala_gleygood`
-- ----------------------------
DROP VIEW IF EXISTS `shala_gleygood`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_gleygood` AS select `shala_goods`.`id` AS `gid`,`shala_goods`.`name` AS `gname`,`shala_goods`.`constituent` AS `gconstituent`,`shala_goods`.`cate_id` AS `gcate_id`,`shala_goods`.`pic` AS `gpic`,`shala_goods`.`price` AS `gprice`,`shala_goods`.`status` AS `gstatus`,`shala_goods`.`remark` AS `gremark`,`shala_goods`.`create_time` AS `gcreate_time`,`shala_goods`.`update_time` AS `gupdate_time`,`shala_gley`.`fromuser` AS `glfromuser`,`shala_gley`.`goodnum` AS `goodnum`,`shala_gley`.`id` AS `glid` from (`shala_gley` join `shala_goods`) where (`shala_gley`.`goods` = `shala_goods`.`id`) ;

-- ----------------------------
-- View structure for `shala_goodcate`
-- ----------------------------
DROP VIEW IF EXISTS `shala_goodcate`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_goodcate` AS select `shala_goods`.`id` AS `gid`,`shala_goods`.`name` AS `gname`,`shala_goods`.`constituent` AS `gconstituent`,`shala_goods`.`cate_id` AS `gcate_id`,`shala_goods`.`pic` AS `gpic`,`shala_goods`.`price` AS `gprice`,`shala_goods`.`status` AS `gstatus`,`shala_goods`.`remark` AS `gremark`,`shala_goods`.`create_time` AS `gcreate_time`,`shala_goods`.`update_time` AS `gupdate_time`,`shala_gcate`.`name` AS `cname` from (`shala_goods` join `shala_gcate`) where (`shala_goods`.`cate_id` = `shala_gcate`.`id`) ;

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_ordadd` AS select `shala_address`.`name` AS `addname`,`shala_address`.`sex` AS `sex`,`shala_address`.`tel` AS `tel`,`shala_address`.`city` AS `city`,`shala_address`.`detailadd` AS `detailadd`,`shala_address`.`numhouse` AS `numhouse`,`shala_address`.`label` AS `label`,`shala_address`.`provice` AS `provice`,`shala_order`.`id` AS `oid`,`shala_order`.`name` AS `ordname`,`shala_order`.`fromuser` AS `fromuser`,`shala_order`.`create_time` AS `create_time`,`shala_order`.`update_time` AS `update_time`,`shala_order`.`price` AS `price`,`shala_order`.`type` AS `type`,`shala_order`.`paytype` AS `paytype`,`shala_order`.`delivertype` AS `delivertype`,`shala_order`.`address` AS `address` from (`shala_order` join `shala_address`) where (`shala_order`.`address` = `shala_address`.`id`) ;

-- ----------------------------
-- View structure for `shala_orgood`
-- ----------------------------
DROP VIEW IF EXISTS `shala_orgood`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_orgood` AS select `shala_orgo`.`id` AS `id`,`shala_orgo`.`gid` AS `gid`,`shala_orgo`.`gprice` AS `gprice`,`shala_orgo`.`gnum` AS `gnum`,`shala_orgo`.`oid` AS `oid`,`shala_goods`.`name` AS `name`,`shala_goods`.`constituent` AS `constituent`,`shala_goods`.`pic` AS `pic` from (`shala_orgo` join `shala_goods`) where (`shala_orgo`.`gid` = `shala_goods`.`id`) ;
