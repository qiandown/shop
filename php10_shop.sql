/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : php10_shop

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-08-11 14:50:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sphinx`
-- ----------------------------
DROP TABLE IF EXISTS `sphinx`;
CREATE TABLE `sphinx` (
  `max_id` mediumint(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sphinx
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_access`
-- ----------------------------
DROP TABLE IF EXISTS `tp_access`;
CREATE TABLE `tp_access` (
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_access
-- ----------------------------
INSERT INTO `tp_access` VALUES ('1', '8');
INSERT INTO `tp_access` VALUES ('1', '9');
INSERT INTO `tp_access` VALUES ('1', '10');
INSERT INTO `tp_access` VALUES ('1', '11');
INSERT INTO `tp_access` VALUES ('1', '12');
INSERT INTO `tp_access` VALUES ('1', '13');
INSERT INTO `tp_access` VALUES ('2', '1');
INSERT INTO `tp_access` VALUES ('2', '2');
INSERT INTO `tp_access` VALUES ('2', '6');
INSERT INTO `tp_access` VALUES ('2', '7');
INSERT INTO `tp_access` VALUES ('2', '9');
INSERT INTO `tp_access` VALUES ('2', '10');
INSERT INTO `tp_access` VALUES ('2', '8');
INSERT INTO `tp_access` VALUES ('1', '5');
INSERT INTO `tp_access` VALUES ('2', '3');
INSERT INTO `tp_access` VALUES ('1', '14');
INSERT INTO `tp_access` VALUES ('1', '7');
INSERT INTO `tp_access` VALUES ('1', '6');
INSERT INTO `tp_access` VALUES ('1', '4');
INSERT INTO `tp_access` VALUES ('1', '3');
INSERT INTO `tp_access` VALUES ('1', '2');
INSERT INTO `tp_access` VALUES ('1', '1');
INSERT INTO `tp_access` VALUES ('2', '4');
INSERT INTO `tp_access` VALUES ('2', '5');

-- ----------------------------
-- Table structure for `tp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  `last_time` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `truename` varchar(45) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tp_admin_tp_role1_idx` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '0', '0', null, null, null, '1');
INSERT INTO `tp_admin` VALUES ('2', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '0', '0', '0', null, null, null, '2');
INSERT INTO `tp_admin` VALUES ('3', 'admin3', '21232f297a57a5a743894a0e4a801fc3', '0', '0', '0', null, null, null, '3');

-- ----------------------------
-- Table structure for `tp_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `tp_attribute`;
CREATE TABLE `tp_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(255) DEFAULT NULL COMMENT '属性名称',
  `cate_id` int(11) DEFAULT '0' COMMENT '类型表中的主键ID',
  `attr_type` tinyint(1) DEFAULT '0' COMMENT '0.输入框架，1.下拉框',
  `attr_val` varchar(255) DEFAULT NULL COMMENT '预定义属性的值（多个使用英文,隔开）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='商品属性表';

-- ----------------------------
-- Records of tp_attribute
-- ----------------------------
INSERT INTO `tp_attribute` VALUES ('1', '颜色', '1', '1', '黑色,黄色,绿色,白色');
INSERT INTO `tp_attribute` VALUES ('2', '出场编号', '1', '0', '');
INSERT INTO `tp_attribute` VALUES ('3', '内存', '1', '1', '16G,32G,64G,128G');
INSERT INTO `tp_attribute` VALUES ('4', '生产日期', '2', '0', '');
INSERT INTO `tp_attribute` VALUES ('5', '材质', '2', '1', '硅胶,天然橡胶,水果味');
INSERT INTO `tp_attribute` VALUES ('6', '规格', '2', '1', '12cm,14cm');
INSERT INTO `tp_attribute` VALUES ('7', '内存', '3', '0', '32G,64G,128G');
INSERT INTO `tp_attribute` VALUES ('8', '颜色', '3', '0', '黑,白,红');

-- ----------------------------
-- Table structure for `tp_brand`
-- ----------------------------
DROP TABLE IF EXISTS `tp_brand`;
CREATE TABLE `tp_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) DEFAULT NULL,
  `brand_sort` int(11) NOT NULL,
  `brand_status` tinyint(1) DEFAULT '1' COMMENT '0.已删除，1.正常',
  `brand_image` varchar(40) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_brand
-- ----------------------------
INSERT INTO `tp_brand` VALUES ('1', '苹果', '0', '1', '2017-07-14/5968766a7ce07.jpg', null);
INSERT INTO `tp_brand` VALUES ('2', '华为', '0', '1', '2017-07-14/5968767969cc4.jpg', null);
INSERT INTO `tp_brand` VALUES ('3', '小米', '0', '1', '2017-07-13/596787fd4865e.gif', null);
INSERT INTO `tp_brand` VALUES ('4', '乐视', '0', '1', '2017-07-13/596787f393ae2.jpg', null);
INSERT INTO `tp_brand` VALUES ('5', '戴尔', '0', '1', '2017-07-13/596787e981bf8.jpg', null);
INSERT INTO `tp_brand` VALUES ('6', 'oppo', '0', '1', '2017-07-13/5967880880e97.jpg', null);
INSERT INTO `tp_brand` VALUES ('7', '诺基亚', '0', '1', '2017-07-13/59678819a4040.jpg', null);
INSERT INTO `tp_brand` VALUES ('8', '摩托罗拉', '0', '1', '2017-07-14/596888913d971.jpg', null);

-- ----------------------------
-- Table structure for `tp_cart`
-- ----------------------------
DROP TABLE IF EXISTS `tp_cart`;
CREATE TABLE `tp_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  `number` smallint(6) DEFAULT NULL,
  `goods_attr` varchar(255) DEFAULT NULL COMMENT '商品的选中的属性',
  `user_id` int(11) DEFAULT NULL,
  `goods_count` int(11) unsigned DEFAULT '0',
  `goods_small_pic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_cart
-- ----------------------------
INSERT INTO `tp_cart` VALUES ('5', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', '2', '0', null);
INSERT INTO `tp_cart` VALUES ('12', '2', '5666.00', '1', '{\"\\u6750\\u8d28\":\"\\u7845\\u80f6\",\"\\u89c4\\u683c\":\"12cm\"}', '1', '0', null);
INSERT INTO `tp_cart` VALUES ('13', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', '1', '0', null);
INSERT INTO `tp_cart` VALUES ('14', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', '1', '0', null);
INSERT INTO `tp_cart` VALUES ('15', '14', '12888.00', '1', 'null', '1', '0', '2017-08-01/thumb_59805874b54c7.jpg');
INSERT INTO `tp_cart` VALUES ('16', '1', '3999.00', '5', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('17', '1', '3999.00', '3', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('18', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('19', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', '1', '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('20', '1', '3999.00', '2', '{\"\\u989c\\u8272\":\"\\u9ec4\\u8272\",\"\\u5185\\u5b58\":\"32G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('21', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ec4\\u8272\",\"\\u5185\\u5b58\":\"32G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('22', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('23', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('24', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', null, '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('25', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ec4\\u8272\",\"\\u5185\\u5b58\":\"32G\"}', '1', '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('26', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', '1', '0', '2017-08-01/thumb_597f5af6041f1.jpg');
INSERT INTO `tp_cart` VALUES ('27', '1', '3999.00', '1', '{\"\\u989c\\u8272\":\"\\u9ed1\\u8272\",\"\\u5185\\u5b58\":\"16G\"}', '1', '0', '2017-08-01/thumb_597f5af6041f1.jpg');

-- ----------------------------
-- Table structure for `tp_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品类型表';

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES ('1', '手机');
INSERT INTO `tp_cate` VALUES ('2', '情趣用品');
INSERT INTO `tp_cate` VALUES ('3', '电脑');

-- ----------------------------
-- Table structure for `tp_category`
-- ----------------------------
DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL DEFAULT '',
  `short_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品分类简称 ',
  `pid` int(11) NOT NULL DEFAULT '0',
  `is_visible` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示  1 显示 0 不显示',
  `attr_id` int(11) NOT NULL DEFAULT '0' COMMENT '关联商品类型ID',
  `attr_name` varchar(255) NOT NULL DEFAULT '' COMMENT '关联类型名称',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `sort` int(11) DEFAULT NULL,
  `category_pic` varchar(255) NOT NULL DEFAULT '' COMMENT '商品分类图片',
  `name` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=244 COMMENT='商品分类表';

-- ----------------------------
-- Records of tp_category
-- ----------------------------
INSERT INTO `tp_category` VALUES ('1', '女装/男装/内衣', '女装', '0', '1', '0', '', '衣服', '', '0', '', 'aa');
INSERT INTO `tp_category` VALUES ('2', '鞋靴/箱包/配件', '配饰', '0', '1', '0', '', '鞋靴/箱包/配件', '', '1', '', '');
INSERT INTO `tp_category` VALUES ('3', '女装', '女装', '1', '1', '0', '', '女装', '', '0', '', null);
INSERT INTO `tp_category` VALUES ('4', '连衣裙', '连衣裙', '3', '1', '28', '连衣裙', '连衣裙', '', '0', 'upload/goods_category/1497086116.jpg', '');

-- ----------------------------
-- Table structure for `tp_goods`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) DEFAULT NULL,
  `goods_number` varchar(255) DEFAULT NULL,
  `goods_count` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `goods_status` int(11) DEFAULT '1',
  `goods_weight` varchar(100) DEFAULT NULL,
  `goods_addtime` int(11) DEFAULT NULL,
  `goods_click` int(11) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  `goods_mprice` decimal(10,2) DEFAULT NULL,
  `goods_big_pic` varchar(255) DEFAULT NULL,
  `goods_small_pic` varchar(255) DEFAULT NULL,
  `goods_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_goods
-- ----------------------------
INSERT INTO `tp_goods` VALUES ('1', '苹果7', null, '30', '1', '1', '1', null, '1501518582', null, '3999.00', '4300.00', '2017-08-01/597f5af6041f1.jpg', '2017-08-01/thumb_597f5af6041f1.jpg', null);
INSERT INTO `tp_goods` VALUES ('2', '华为荣耀畅玩4', null, '99', '2', '1', '1', null, '1501547212', null, '5666.00', '6000.00', '2017-08-01/597fcacb9edec.jpg', '2017-08-01/thumb_597fcacb9edec.jpg', null);
INSERT INTO `tp_goods` VALUES ('14', '外星人', null, '99', '5', '3', '1', null, '1501583477', null, '12888.00', null, '2017-08-01/59805874b54c7.jpg', '2017-08-01/thumb_59805874b54c7.jpg', null);

-- ----------------------------
-- Table structure for `tp_goodsattr`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goodsattr`;
CREATE TABLE `tp_goodsattr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  `goods_attr_val` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_goodsattr
-- ----------------------------
INSERT INTO `tp_goodsattr` VALUES ('1', '1', '1', '黑色,黄色');
INSERT INTO `tp_goodsattr` VALUES ('2', '1', '3', '16G,32G,64G,128G');
INSERT INTO `tp_goodsattr` VALUES ('3', '2', '5', '硅胶,天然橡胶,水果味');
INSERT INTO `tp_goodsattr` VALUES ('4', '2', '6', '12cm');

-- ----------------------------
-- Table structure for `tp_goods_order`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods_order`;
CREATE TABLE `tp_goods_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `og_price` decimal(10,2) DEFAULT NULL,
  `og_number` tinyint(4) DEFAULT NULL,
  `og_total_price` decimal(10,2) DEFAULT NULL,
  `og_goods_id` int(11) DEFAULT NULL,
  `og_goods_attr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='订单商品基本信息表';

-- ----------------------------
-- Records of tp_goods_order
-- ----------------------------
INSERT INTO `tp_goods_order` VALUES ('5', '9', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('6', '10', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('7', '11', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('8', '12', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('9', '13', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('10', '14', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('11', '15', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('12', '16', null, null, null, null, null, null);
INSERT INTO `tp_goods_order` VALUES ('13', '17', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `tp_location`
-- ----------------------------
DROP TABLE IF EXISTS `tp_location`;
CREATE TABLE `tp_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户信息表',
  `lo_name` varchar(20) DEFAULT NULL,
  `lo_tel` char(11) DEFAULT NULL,
  `lo_address` varchar(30) DEFAULT NULL,
  `lo_default` tinyint(1) DEFAULT NULL COMMENT '1.默认地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户收获地址表';

-- ----------------------------
-- Records of tp_location
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_controller` varchar(255) DEFAULT NULL,
  `menu_action` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `is_show` tinyint(4) DEFAULT NULL COMMENT '是否显示菜单',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_menu
-- ----------------------------
INSERT INTO `tp_menu` VALUES ('1', '系统菜单', '', '', '0', '1');
INSERT INTO `tp_menu` VALUES ('2', '权限菜单', 'system', 'menulist', '1', '1');
INSERT INTO `tp_menu` VALUES ('3', '商品管理', '', '', '0', '1');
INSERT INTO `tp_menu` VALUES ('4', '品牌列表', 'brand', 'showlist', '3', '1');
INSERT INTO `tp_menu` VALUES ('5', '商品列表', 'goods', 'showlist', '3', '1');
INSERT INTO `tp_menu` VALUES ('6', '品牌删除', 'brand', 'edit', '4', '1');
INSERT INTO `tp_menu` VALUES ('7', '角色列表', 'system', 'rolelist', '1', '1');
INSERT INTO `tp_menu` VALUES ('8', '品牌修改', 'brand', 'edit', '3', '1');
INSERT INTO `tp_menu` VALUES ('9', '后台页面', '', '', '0', '1');
INSERT INTO `tp_menu` VALUES ('10', '后台首页', 'index', 'index', '9', '1');
INSERT INTO `tp_menu` VALUES ('11', '首页头部', 'index', 'head', '9', '1');
INSERT INTO `tp_menu` VALUES ('12', '后台左侧', 'index', 'left', '9', '1');
INSERT INTO `tp_menu` VALUES ('13', '后台右侧', 'index', 'right', '9', '1');
INSERT INTO `tp_menu` VALUES ('14', '商品类型列表', 'cate', 'showlist', '3', '1');
INSERT INTO `tp_menu` VALUES ('15', '商品类型增加', 'cate', 'add', '3', '1');
INSERT INTO `tp_menu` VALUES ('16', '属性列表', 'attribute', 'showlist', '3', '1');
INSERT INTO `tp_menu` VALUES ('17', '属性增加', 'attribute', 'add', '3', '1');

-- ----------------------------
-- Table structure for `tp_order`
-- ----------------------------
DROP TABLE IF EXISTS `tp_order`;
CREATE TABLE `tp_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(40) DEFAULT NULL COMMENT '订单编号表',
  `user_id` int(11) DEFAULT NULL COMMENT '下单人ID表',
  `order_addtime` int(11) DEFAULT NULL COMMENT '下单时间',
  `order_price` decimal(10,2) DEFAULT NULL COMMENT '订单总金额',
  `order_pay` tinyint(1) DEFAULT NULL COMMENT '支付方式，1.余额，2.支付宝，3.微信',
  `location_id` int(11) DEFAULT NULL COMMENT '收货人地址信息',
  `order_update` int(11) DEFAULT NULL,
  `order_status` tinyint(1) DEFAULT '0' COMMENT '0.未付款,1.已付款',
  `order_exp` tinyint(1) DEFAULT NULL COMMENT '1.圆通，2.申通',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of tp_order
-- ----------------------------
INSERT INTO `tp_order` VALUES ('9', '2017080315511016123', '1', null, '3999.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('10', '2017080315512215786', '1', null, '3999.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('11', '2017080315535621917', '2', null, '3999.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('12', '2017080315540628195', '2', null, '3999.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('13', '2017080408333019754', '1', null, '0.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('14', '2017080408333516595', '1', null, '0.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('15', '2017080408340213780', '1', null, '0.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('16', '2017080408342219807', '1', null, '0.00', null, null, null, '0', null);
INSERT INTO `tp_order` VALUES ('17', '2017080714550919775', '1', null, '0.00', null, null, null, '0', null);

-- ----------------------------
-- Table structure for `tp_pic`
-- ----------------------------
DROP TABLE IF EXISTS `tp_pic`;
CREATE TABLE `tp_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_big` varchar(255) DEFAULT NULL,
  `pic_small` varchar(255) DEFAULT NULL,
  `goods_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_pic
-- ----------------------------
INSERT INTO `tp_pic` VALUES ('1', '2017-08-01/597f5af6041f1.jpg', '2017-08-01/thumb_597f5af6041f1.jpg', '1');
INSERT INTO `tp_pic` VALUES ('2', '2017-08-01/597fcacb9edec.jpg', '2017-08-01/thumb_597fcacb9edec.jpg', '2');
INSERT INTO `tp_pic` VALUES ('51', '2017-08-02/598138929dc6b.jpg', '2017-08-02/thumb_598138929dc6b.jpg', '14');
INSERT INTO `tp_pic` VALUES ('52', '2017-08-02/598138929e43b.jpg', '2017-08-02/thumb_598138929e43b.jpg', '14');
INSERT INTO `tp_pic` VALUES ('53', '2017-08-02/598138c157623.jpg', '2017-08-02/thumb_598138c157623.jpg', '2');
INSERT INTO `tp_pic` VALUES ('54', '2017-08-03/5982c0ca543c4.jpg', '2017-08-03/thumb_5982c0ca543c4.jpg', '1');
INSERT INTO `tp_pic` VALUES ('55', '2017-08-03/5982c0ca71c73.jpg', '2017-08-03/thumb_5982c0ca71c73.jpg', '1');

-- ----------------------------
-- Table structure for `tp_role`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `role_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('1', '超级管理员', '1');
INSERT INTO `tp_role` VALUES ('2', '管理员', '1');
INSERT INTO `tp_role` VALUES ('3', '业务员', '1');
INSERT INTO `tp_role` VALUES ('4', '业务员', '1');

-- ----------------------------
-- Table structure for `tp_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) DEFAULT NULL,
  `user_pwd` char(32) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `user_qq` varchar(45) DEFAULT NULL,
  `user_phone` varchar(45) DEFAULT NULL,
  `user_addtime` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT '1' COMMENT '0.用户禁用,1.正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '592942997@qq.com', '', '', null, '1');
INSERT INTO `tp_user` VALUES ('2', 'admin1', '21232f297a57a5a743894a0e4a801fc3', '2319162543@qq.com', '', '', null, '1');
