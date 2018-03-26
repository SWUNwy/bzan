/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : bzshop

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-26 16:31:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bz_admin`
-- ----------------------------
DROP TABLE IF EXISTS `bz_admin`;
CREATE TABLE `bz_admin` (
  `id` int(24) NOT NULL AUTO_INCREMENT COMMENT '自增主键id',
  `name` varchar(64) NOT NULL COMMENT '登录名',
  `pwd` varchar(128) NOT NULL COMMENT '密码',
  `tell` char(20) NOT NULL COMMENT '电话',
  `email` varchar(64) NOT NULL COMMENT '邮箱',
  `remarks` varchar(128) NOT NULL COMMENT '备注',
  `role_id` int(4) NOT NULL COMMENT '角色组',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '管理员状态；0停用；1使用；',
  `add_time` datetime NOT NULL COMMENT '登录时间',
  `last_time` datetime NOT NULL COMMENT '最后登录时间',
  `login_ip` varchar(256) NOT NULL COMMENT '登录IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_admin
-- ----------------------------
INSERT INTO `bz_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '18782253525', 'admin@admin.com', 'admintest', '0', '0', '2018-03-26 16:30:41', '0000-00-00 00:00:00', '0.0.0.0');

-- ----------------------------
-- Table structure for `bz_arrtibute`
-- ----------------------------
DROP TABLE IF EXISTS `bz_arrtibute`;
CREATE TABLE `bz_arrtibute` (
  `attribute_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '属性Id',
  `attribute_group_id` int(16) NOT NULL COMMENT '属性组Id',
  `name` varchar(64) NOT NULL COMMENT '属性名',
  `sort_id` int(16) NOT NULL COMMENT '排序值',
  PRIMARY KEY (`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_arrtibute
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_attribute_group`
-- ----------------------------
DROP TABLE IF EXISTS `bz_attribute_group`;
CREATE TABLE `bz_attribute_group` (
  `attribute_group_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '属性组ID自增',
  `name` varchar(64) NOT NULL COMMENT '属性名',
  `sort_id` int(16) NOT NULL COMMENT '排序Id',
  PRIMARY KEY (`attribute_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_attribute_group
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `bz_auth_group`;
CREATE TABLE `bz_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `bz_auth_group_access`;
CREATE TABLE `bz_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `bz_auth_rule`;
CREATE TABLE `bz_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_brand`
-- ----------------------------
DROP TABLE IF EXISTS `bz_brand`;
CREATE TABLE `bz_brand` (
  `brand_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '品牌Id自增主键',
  `brand_name` varchar(64) NOT NULL COMMENT '品牌名',
  `brand_logo` varchar(64) NOT NULL COMMENT '品牌图片URL',
  `category_id` int(16) NOT NULL COMMENT '分类Id',
  `is_show` int(9) NOT NULL COMMENT '品牌状态',
  `sort_order` int(11) NOT NULL COMMENT '品牌排序',
  `brand_desc` varchar(64) NOT NULL COMMENT '品牌描述',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `modified_time` datetime NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_brand
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_cart`
-- ----------------------------
DROP TABLE IF EXISTS `bz_cart`;
CREATE TABLE `bz_cart` (
  `cart_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '购物车Id自增主键',
  `user_id` int(16) NOT NULL COMMENT '用户登录Id，取值于session',
  `session_id` varchar(16) NOT NULL COMMENT '如果该用户推出，则该session_id队员的购物车中的所有记录都将被删除',
  `goods_id` int(16) NOT NULL COMMENT '商品Id',
  `sku` varchar(16) NOT NULL COMMENT '商品sku',
  `goods_name` varchar(16) NOT NULL COMMENT '商品名',
  `price` decimal(16,0) NOT NULL COMMENT '商品单价',
  `goods_num` smallint(5) NOT NULL COMMENT '商品数量',
  `add_time` datetime NOT NULL COMMENT '加入时间',
  `bar_code` varchar(16) NOT NULL COMMENT '商品条码',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_category`
-- ----------------------------
DROP TABLE IF EXISTS `bz_category`;
CREATE TABLE `bz_category` (
  `category_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '商品分类自增Id',
  `parent_id` int(16) NOT NULL COMMENT '父类Id',
  `category_name` varchar(64) NOT NULL COMMENT '分类名称',
  `category_desc` varchar(64) NOT NULL COMMENT '分类信息描述',
  `meta_title` varchar(64) NOT NULL COMMENT '标题',
  `meta_keywords` varchar(64) NOT NULL COMMENT '关键字',
  `top` int(9) NOT NULL COMMENT '是否顶部栏展示',
  `sort_id` int(16) NOT NULL COMMENT '排序Id',
  `show` int(4) NOT NULL COMMENT '状态',
  `create_time` datetime NOT NULL COMMENT '添加时间',
  `modified_time` datetime NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_category
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_category_description`
-- ----------------------------
DROP TABLE IF EXISTS `bz_category_description`;
CREATE TABLE `bz_category_description` (
  `category_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '分类Id自增主键',
  `name` varchar(64) NOT NULL COMMENT '分类名称',
  `description` text NOT NULL COMMENT '分类信息描述',
  `meta_title` varchar(16) NOT NULL COMMENT 'title',
  `meta_keywords` varchar(16) NOT NULL COMMENT '关键字',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_category_description
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_goods`
-- ----------------------------
DROP TABLE IF EXISTS `bz_goods`;
CREATE TABLE `bz_goods` (
  `goods_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '商品自增Id',
  `goods_name` varchar(64) NOT NULL COMMENT '商品名',
  `sku` varchar(64) NOT NULL COMMENT '商品sku',
  `model` varchar(64) NOT NULL COMMENT '商品model',
  `hs_code` varchar(64) NOT NULL COMMENT '商品HS编码',
  `bar_code` varchar(64) NOT NULL COMMENT '商品条码',
  `country_code` varchar(64) NOT NULL COMMENT '商品国别编码',
  `keyword` varchar(64) NOT NULL COMMENT '商品关键字',
  `goods_content` text NOT NULL COMMENT '商品详细描述',
  `img` varchar(64) NOT NULL COMMENT '商品图片路径URL',
  `category_id` int(16) NOT NULL COMMENT '商品分类Id',
  `band_id` int(16) NOT NULL COMMENT '品牌Id',
  `price` decimal(16,0) NOT NULL COMMENT '商品单价',
  `tax_id` decimal(16,0) NOT NULL COMMENT '商品税种类',
  `quantity` int(16) NOT NULL COMMENT '商品库存',
  `sales_num` int(16) NOT NULL COMMENT '商品销量',
  `is_recommend` smallint(6) NOT NULL COMMENT '是否推荐',
  `status` int(16) NOT NULL COMMENT '商品状态:0下架，1上架',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `modified_time` datetime NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `bz_goods_attr`;
CREATE TABLE `bz_goods_attr` (
  `goods_attr_id` int(9) NOT NULL AUTO_INCREMENT COMMENT '商品属性Id',
  `goods_id` int(9) NOT NULL COMMENT '商品Id',
  `attr_id` int(9) NOT NULL COMMENT '属性Id',
  `attr_value` text NOT NULL COMMENT '该属性具体的值',
  `attr_price` text NOT NULL COMMENT '该属性对应的价格',
  PRIMARY KEY (`goods_attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_goods_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `bz_goods_attribute`;
CREATE TABLE `bz_goods_attribute` (
  `goods_id` int(16) NOT NULL COMMENT '商品Id',
  `attribute_id` int(16) NOT NULL COMMENT '属性Id',
  `text` varchar(64) NOT NULL COMMENT '属性内容',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_goods_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_goods_gallery`
-- ----------------------------
DROP TABLE IF EXISTS `bz_goods_gallery`;
CREATE TABLE `bz_goods_gallery` (
  `img_id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '商品相册Id自增主键',
  `goods_id` mediumint(9) NOT NULL COMMENT '商品Id',
  `img_url` varchar(128) NOT NULL COMMENT '相册图片URL',
  `img_desc` varchar(128) NOT NULL COMMENT '图片描述',
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_goods_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `bz_keyword`;
CREATE TABLE `bz_keyword` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(128) NOT NULL COMMENT '关键词',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_keyword
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_order`
-- ----------------------------
DROP TABLE IF EXISTS `bz_order`;
CREATE TABLE `bz_order` (
  `order_id` bigint(16) NOT NULL AUTO_INCREMENT,
  `tradeNo` varchar(255) NOT NULL COMMENT '交易流水号',
  `fremark` varchar(64) NOT NULL COMMENT '快递企业',
  `batch_number` varchar(64) NOT NULL COMMENT '外部订单号',
  `store_url` varchar(128) NOT NULL COMMENT '订单来源',
  `user_id` varchar(64) NOT NULL COMMENT '会员Id',
  `user_name` varchar(64) NOT NULL COMMENT '会员姓名',
  `user_tell` varchar(64) NOT NULL COMMENT '会员电话号码',
  `user_email` varchar(64) NOT NULL COMMENT '会员邮箱',
  `payment_method` varchar(24) NOT NULL COMMENT '支付方式',
  `payment_code` varchar(24) NOT NULL COMMENT '支付方式代码',
  `order_status_id` int(24) NOT NULL COMMENT '订单状态Id',
  `address_name` varchar(64) NOT NULL COMMENT '收货人姓名',
  `address_tell` int(24) NOT NULL COMMENT '收货人联系电话',
  `zipode` varchar(24) NOT NULL COMMENT '收货邮编',
  `address_identity` varchar(64) NOT NULL COMMENT '收货人身份证号码',
  `msg` text NOT NULL COMMENT '收货信息',
  `shipping_method` varchar(9) NOT NULL COMMENT '快递费用',
  `country_name` varchar(24) NOT NULL COMMENT '收货地址省份信息',
  `city_name` varchar(24) NOT NULL COMMENT '收货地址城市信息',
  `zone_name` varchar(24) NOT NULL COMMENT '收货地址地区信息',
  `shipping_address` varchar(64) NOT NULL COMMENT '收货地址详细信息',
  `total` decimal(15,0) NOT NULL COMMENT '订单总额',
  `tax_id` int(9) NOT NULL COMMENT '税率Id',
  `currency_code` varchar(9) NOT NULL COMMENT '交易币种',
  `create_time` datetime NOT NULL COMMENT '订单添加时间',
  `modified_time` datetime NOT NULL COMMENT '订单最后修改时间',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_order
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_order_express`
-- ----------------------------
DROP TABLE IF EXISTS `bz_order_express`;
CREATE TABLE `bz_order_express` (
  `order_express_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '物流信息表自增主键',
  `order_id` int(16) NOT NULL COMMENT '订单Id',
  `express_no` varchar(16) NOT NULL COMMENT '物流编号',
  `express_name` varchar(16) NOT NULL COMMENT '物流名称',
  `express_code` varchar(16) NOT NULL COMMENT '物流代码',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `modified_time` datetime NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`order_express_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_order_express
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `bz_order_goods`;
CREATE TABLE `bz_order_goods` (
  `order_goods_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '订单列表，商品信息Id自增主键',
  `order_id` int(16) NOT NULL COMMENT '订单Id',
  `goods_id` int(16) NOT NULL COMMENT '商品Id',
  `goods_name` varchar(24) NOT NULL COMMENT '商品名',
  `sku` varchar(24) NOT NULL COMMENT '商品sku',
  `quantity` varchar(24) NOT NULL COMMENT '订单商品数量',
  `price` decimal(15,0) NOT NULL COMMENT '订单商品价格',
  `total` decimal(15,0) NOT NULL COMMENT '订单总价',
  `tax` decimal(15,0) NOT NULL COMMENT '订单税',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `modified_time` datetime NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`order_goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_order_history`
-- ----------------------------
DROP TABLE IF EXISTS `bz_order_history`;
CREATE TABLE `bz_order_history` (
  `order_history_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '历史订单信息Id自增主键',
  `order_id` int(16) NOT NULL COMMENT '订单Id',
  `order_status_id` int(9) NOT NULL COMMENT '订单状态Id',
  `msg` text NOT NULL COMMENT '订单信息',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `modified_time` datetime NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`order_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_order_history
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_order_status`
-- ----------------------------
DROP TABLE IF EXISTS `bz_order_status`;
CREATE TABLE `bz_order_status` (
  `order_status_id` int(9) NOT NULL AUTO_INCREMENT COMMENT '订单状态Id自增主键',
  `status_name` varchar(16) NOT NULL COMMENT '状态名',
  PRIMARY KEY (`order_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_order_status
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_payment`
-- ----------------------------
DROP TABLE IF EXISTS `bz_payment`;
CREATE TABLE `bz_payment` (
  `pay_id` int(16) NOT NULL AUTO_INCREMENT COMMENT '支付方式Id自增主键',
  `pay_code` varchar(64) NOT NULL COMMENT '支付方式代码',
  `pay_name` varchar(64) NOT NULL COMMENT '支付方式名称',
  `pay_desc` varchar(64) NOT NULL COMMENT '支付方式描述',
  `pay_partner_id` varchar(64) NOT NULL COMMENT 'partner_id合作Id',
  `pay_partner_key` varchar(64) NOT NULL COMMENT 'partner_code安全校验码',
  `pay_status` int(9) NOT NULL DEFAULT '0' COMMENT '支付方式状态，是否启用;启用：1，不启用：0',
  `start_time` datetime NOT NULL COMMENT '启用时间',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `bz_system`
-- ----------------------------
DROP TABLE IF EXISTS `bz_system`;
CREATE TABLE `bz_system` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `title` varchar(24) NOT NULL DEFAULT '网站名称',
  `icon_url` varchar(255) NOT NULL DEFAULT '网站icon图标',
  `keyword` varchar(255) NOT NULL DEFAULT '网站关键字',
  `meta` varchar(255) NOT NULL DEFAULT '网站描述',
  `copyright` varchar(255) NOT NULL DEFAULT '网站底部版权信息',
  `icp` varchar(255) NOT NULL DEFAULT 'icp备案',
  `shielding_words` varchar(255) DEFAULT '屏蔽词',
  `last_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bz_system
-- ----------------------------
INSERT INTO `bz_system` VALUES ('1', 'bz', '20180321\\305930801371b8b2f86e36f9cb28e608.png', '网站关键字', '网站描述', '网站底部版权信息', 'icp备案', '屏蔽词', '2018-03-21 09:51:30');
