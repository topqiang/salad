/*
Navicat MySQL Data Transfer

Source Server         : foodlink
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : shala

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-09-24 13:50:17
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
  `tel` varchar(15) DEFAULT NULL COMMENT '电话',
  `city` varchar(255) DEFAULT NULL COMMENT '所在城市',
  `detailadd` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `numhouse` varchar(255) DEFAULT NULL COMMENT '门牌号',
  `label` varchar(255) DEFAULT NULL COMMENT '地址标签',
  `fromuser` int(11) DEFAULT NULL COMMENT '改地址所属用户',
  `provice` varchar(255) DEFAULT '北京' COMMENT '地址省份',
  PRIMARY KEY (`id`),
  KEY `add_user` (`fromuser`),
  CONSTRAINT `add_user` FOREIGN KEY (`fromuser`) REFERENCES `shala_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_address
-- ----------------------------
INSERT INTO `shala_address` VALUES ('1', '阚自强', '男', '12345678', '房山区', '北京市丰台区北京西站-南广场', '1234', '小区', '5', '北京');
INSERT INTO `shala_address` VALUES ('2', '小王', '男', '12345678', '朝阳区', '北京市丰台区北京西站-南广场', '1234', '学校', '5', '北京');
INSERT INTO `shala_address` VALUES ('3', '再见', '男', '84932058', '海淀区', '北京市海淀区北京大学口腔医院', '4321', '学校\n', '5', '北京');
INSERT INTO `shala_address` VALUES ('6', 'QIANG', '男', '52435525', '西城区', '北京市西城区西城区', '1234', '学校', '5', '北京');
INSERT INTO `shala_address` VALUES ('7', '2', '男', '2', '延庆县', '北京市延庆县八达岭长城-登长城入口', '2222', '其他', '2', '北京');
INSERT INTO `shala_address` VALUES ('8', '2', '男', '2', '延庆县', '北京市延庆县八达岭长城-登长城入口', '3333', '公司', '2', '北京');
INSERT INTO `shala_address` VALUES ('9', 'hello', '女', '321', '延庆县', '北京市延庆县八达岭长城-登长城入口', '321', '家', '2', '北京');
INSERT INTO `shala_address` VALUES ('10', '望京SOHO店', null, '1064796887', '朝阳区', '望京SOHO 塔3底商', '3108', null, null, '北京');
INSERT INTO `shala_address` VALUES ('11', '新城店', null, '2147483647', '朝阳区', '北京朝阳区朝外大街6号（新城国际）26号楼底商', '103号', null, null, '北京');
INSERT INTO `shala_address` VALUES ('12', '测试点', null, '110', '海淀区', '北京市海淀区温莎ktv(花园店)', '110', null, null, '北京');

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
INSERT INTO `shala_gcate` VALUES ('4', '健康饮品', '商品分类', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`),
  KEY `good_gcate` (`cate_id`),
  CONSTRAINT `good_gcate` FOREIGN KEY (`cate_id`) REFERENCES `shala_gcate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_goods
-- ----------------------------
INSERT INTO `shala_goods` VALUES ('2', '美式烤肋排', '鸡翅，番茄酱，烧烤酱', '3', 'Uploads/goods/201609/57e3c1a5f2145.jpg', '30.00', '0', '非常好吃', '1473664829', '1474544038');
INSERT INTO `shala_goods` VALUES ('3', 'VOSS矿泉水', 'voss矿泉水', '4', 'Uploads/goods/201609/57e3c1b2bf2ab.jpg', '36.00', '0', '健康水', '1473665711', '1474544050');
INSERT INTO `shala_goods` VALUES ('7', '自选沙拉大份', '球形生菜X1份    橙子X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473747526', '1473747526');
INSERT INTO `shala_goods` VALUES ('8', '自选沙拉大份', '球形生菜X1份    橙子X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473751828', '1473751828');
INSERT INTO `shala_goods` VALUES ('9', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755907', '1473755907');
INSERT INTO `shala_goods` VALUES ('10', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    辣酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755917', '1473755917');
INSERT INTO `shala_goods` VALUES ('11', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473755976', '1473755976');
INSERT INTO `shala_goods` VALUES ('12', '自选沙拉大份', '罗马生菜X1份    球形生菜X1份    子叶生菜X1份    苦菊X1份    橙子X1份    菠萝X1份    麻酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473756074', '1473756074');
INSERT INTO `shala_goods` VALUES ('13', '自选沙拉大份', '罗马生菜X2份    子叶生菜X1份    球形生菜X1份    菠萝X1份    西芹X1份    圣女果X1份    橙子X1份    玉米X1份    芦笋X1份    烤茄子X1份    哈密瓜X1份    白煮鸡胸X1份    牛油果X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473845179', '1473845179');
INSERT INTO `shala_goods` VALUES ('14', '自选沙拉大份', '罗马生菜X4份    菠萝X1份    西芹X1份    橙子X1份    玉米X1份    圣女果X1份    芦笋X1份    哈密瓜X1份    牛油果X1份    烤茄子X1份    白煮鸡胸X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1473845229', '1473845229');
INSERT INTO `shala_goods` VALUES ('15', '自选沙拉小份', '苦菊X1份    橙子X1份    鸡蛋X3份    烤土豆X4份    辣酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', 'diy', '1473845904', '1473845904');
INSERT INTO `shala_goods` VALUES ('16', '测试', '大法师法师的放大', '1', 'Uploads/goods/201609/57e3c0df6b3d7.jpg', '43.23', '0', '', '1474167777', '1474543839');
INSERT INTO `shala_goods` VALUES ('17', '非常可乐', '水', '4', 'Uploads/goods/201609/57e3c1bfb35a7.jpg', '2.99', '0', '', '1474167808', '1474544063');
INSERT INTO `shala_goods` VALUES ('18', '测试', '谁啊哈对撒发', '2', 'Uploads/goods/201609/57e3c19a3a201.jpg', '12.45', '0', '', '1474167844', '1474544026');
INSERT INTO `shala_goods` VALUES ('19', '自选沙拉大份', '罗马生菜X3份    球形生菜X1份    苦菊X1份    橙子X2份    菠萝X1份    甜酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', 'diy', '1474278066', '1474278066');
INSERT INTO `shala_goods` VALUES ('20', '自选卷', '球形生菜X1份    苦菊X1份    橙子X1份    鸡蛋X1份    烤土豆X1份    辣酱X1份    ', '7', 'Uploads/goods/201609/efc3527e79264b90aa657037f19780e1.jpg', '25.00', '0', 'diy', '1474358840', '1474358840');
INSERT INTO `shala_goods` VALUES ('21', '自选沙拉小份', '罗马生菜X1份    球形生菜X1份    圣女果X1份    芦笋X1份    辣酱X1份    ', '6', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '38.00', '0', '切碎', '1474508667', '1474508667');
INSERT INTO `shala_goods` VALUES ('22', '自选沙拉大份', '罗马生菜X1份    子叶生菜X1份    球形生菜X1份    西芹X1份    圣女果X1份    芦笋X1份    烤茄子X1份    烤土豆X1份    牛油果X1份    哈密瓜X1份    鸡蛋X1份    玉米X1份    白煮鸡胸X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '不切碎', '1474533324', '1474533324');
INSERT INTO `shala_goods` VALUES ('23', '自选沙拉大份', '罗马生菜X2份    球形生菜X1份    子叶生菜X1份    橙子X1份    圣女果X1份    哈密瓜X1份    蒜酱X1份    ', '5', 'Uploads/goods/201609/4c086e017b084739bfec686dfd5fe5c0.jpg', '48.00', '0', '切碎', '1474541117', '1474541117');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
  `paytype` int(11) DEFAULT '1' COMMENT '支付方式',
  `delivertype` int(11) DEFAULT NULL COMMENT '送货方式',
  `address` varchar(255) NOT NULL COMMENT '该订单配送地址',
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_order
-- ----------------------------
INSERT INTO `shala_order` VALUES ('19', '52016092316471378917', '5', '1474620433', '1474620433', '42.45', '0', '1', '1', '3', null, '0.00', '0.00', null, null, '0', '北京市海淀区北京大学口腔医院4321', null, null);
INSERT INTO `shala_order` VALUES ('21', '72016092317095430442', '7', '1474621794', '1474621794', '43.23', '0', '1', '0', '11', null, '0.00', '0.00', null, null, '74204', '北京朝阳区朝外大街6号（新城国际）26号楼底商103号', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_orgo
-- ----------------------------
INSERT INTO `shala_orgo` VALUES ('28', '18', '12.45', '1', '19');
INSERT INTO `shala_orgo` VALUES ('29', '2', '30.00', '1', '19');
INSERT INTO `shala_orgo` VALUES ('32', '16', '43.23', '1', '21');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_shoppic
-- ----------------------------
INSERT INTO `shala_shoppic` VALUES ('1', 'Uploads/shop/201609/d4-img-1.jpg');
INSERT INTO `shala_shoppic` VALUES ('2', 'Uploads/shop/201609/3518.jpg');
INSERT INTO `shala_shoppic` VALUES ('3', 'Uploads/shop/201609/3547.jpg');
INSERT INTO `shala_shoppic` VALUES ('4', 'Uploads/shop/201609/3574.jpg');

-- ----------------------------
-- Table structure for `shala_user`
-- ----------------------------
DROP TABLE IF EXISTS `shala_user`;
CREATE TABLE `shala_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(20) DEFAULT NULL COMMENT '用户姓名',
  `tel` varchar(15) NOT NULL COMMENT '用户电话',
  `wx_id` int(11) DEFAULT NULL COMMENT '微信授权id',
  `address` int(255) DEFAULT NULL COMMENT '用户地址',
  `sex` int(11) DEFAULT NULL COMMENT '用户性别',
  `pic` varchar(255) DEFAULT NULL COMMENT '用户头像地址',
  `balance` float DEFAULT NULL COMMENT '用户余额',
  `pwd` varchar(255) DEFAULT '' COMMENT '用户密码',
  `delivertype` int(11) NOT NULL DEFAULT '1' COMMENT '默认物流方式',
  `create_time` int(11) DEFAULT NULL COMMENT '用户创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shala_user
-- ----------------------------
INSERT INTO `shala_user` VALUES ('2', null, '13163177872', null, '10', null, null, null, 'e10adc3949ba59abbe56e057f20f883e', '0', null);
INSERT INTO `shala_user` VALUES ('5', null, '13163177871', null, '3', null, null, null, 'e10adc3949ba59abbe56e057f20f883e', '1', null);
INSERT INTO `shala_user` VALUES ('7', null, '13163177870', null, '11', null, null, null, 'e10adc3949ba59abbe56e057f20f883e', '0', null);
INSERT INTO `shala_user` VALUES ('9', null, '15523455432', null, '10', null, null, null, 'c33367701511b4f6020ec61ded352059', '0', '1474598516');

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_goodcate` AS select `shala_goods`.`id` AS `gid`,`shala_goods`.`name` AS `gname`,`shala_goods`.`constituent` AS `gconstituent`,`shala_goods`.`cate_id` AS `gcate_id`,`shala_goods`.`pic` AS `gpic`,`shala_goods`.`price` AS `gprice`,`shala_goods`.`status` AS `gstatus`,`shala_goods`.`remark` AS `gremark`,`shala_goods`.`create_time` AS `gcreate_time`,`shala_goods`.`update_time` AS `gupdate_time`,`shala_gcate`.`name` AS `cname` from (`shala_goods` join `shala_gcate`) where ((`shala_goods`.`cate_id` = `shala_gcate`.`id`) and (`shala_goods`.`status` <> 9)) ;

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_orgood` AS select `shala_orgo`.`id` AS `id`,`shala_orgo`.`gid` AS `gid`,`shala_orgo`.`gprice` AS `gprice`,`shala_orgo`.`gnum` AS `gnum`,`shala_orgo`.`oid` AS `oid`,`shala_goods`.`name` AS `name`,`shala_goods`.`constituent` AS `constituent`,`shala_goods`.`pic` AS `pic`,`shala_order`.`fromuser` AS `uid` from ((`shala_orgo` join `shala_goods`) join `shala_order`) where ((`shala_orgo`.`gid` = `shala_goods`.`id`) and (`shala_orgo`.`oid` = `shala_order`.`id`)) ;

-- ----------------------------
-- View structure for `shala_shopadd`
-- ----------------------------
DROP VIEW IF EXISTS `shala_shopadd`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shala_shopadd` AS select `shala_shop`.`id` AS `id`,`shala_shop`.`name` AS `name`,`shala_shop`.`tel` AS `tel`,`shala_shop`.`working` AS `working`,`shala_address`.`detailadd` AS `address`,`shala_address`.`city` AS `city`,`shala_address`.`id` AS `addid`,`shala_address`.`numhouse` AS `numhouse` from (`shala_shop` join `shala_address`) where ((`shala_shop`.`address` = `shala_address`.`id`) and (`shala_shop`.`status` <> 9)) ;
