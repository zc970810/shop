/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : shop

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 26/01/2019 10:13:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for imooc_admin
-- ----------------------------
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminuser` varchar(50) NOT NULL DEFAULT '',
  `adminpass` char(32) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_ip` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_admin
-- ----------------------------
BEGIN;
INSERT INTO `imooc_admin` VALUES (1, 'admin', '0192023a7bbd73250516f069df18b500', '2019-01-23 20:21:03', '2019-01-24 12:56:48', 2130706433);
COMMIT;

-- ----------------------------
-- Table structure for imooc_cart
-- ----------------------------
DROP TABLE IF EXISTS `imooc_cart`;
CREATE TABLE `imooc_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `products` text,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_cart
-- ----------------------------
BEGIN;
INSERT INTO `imooc_cart` VALUES (2, 21700.00, 3, '{\"3\":{\"quantity\":2,\"product\":{\"id\":\"3\",\"name\":\"Macbook Pro\",\"price\":\"8800.00\",\"code\":\"88888888\",\"description\":\"Macbook Pro\"}},\"4\":{\"quantity\":1,\"product\":{\"id\":\"4\",\"name\":\"\\u534e\\u4e3a\\u624b\\u673a\",\"price\":\"4100.00\",\"code\":\"929868123123123\",\"description\":\"\\u5546\\u54c1\\u63cf\\u8ff0\\uff1a\\r\\n\\r\\n\\u8fd9\\u662f\\u534e\\u4e3a\\u624b\\u673a\"}}}', 5, '2019-01-24 10:53:24');
COMMIT;

-- ----------------------------
-- Table structure for imooc_order
-- ----------------------------
DROP TABLE IF EXISTS `imooc_order`;
CREATE TABLE `imooc_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `products` text,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_order
-- ----------------------------
BEGIN;
INSERT INTO `imooc_order` VALUES (1, 17600.00, 2, '{\"3\":{\"quantity\":2,\"product\":{\"id\":\"3\",\"name\":\"Macbook Pro\",\"price\":\"8800.00\",\"code\":\"88888888\",\"description\":\"Macbook Pro\"}}}', 5, '2019-01-24 12:46:33');
COMMIT;

-- ----------------------------
-- Table structure for imooc_product
-- ----------------------------
DROP TABLE IF EXISTS `imooc_product`;
CREATE TABLE `imooc_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `code` varchar(100) NOT NULL DEFAULT '',
  `description` text,
  `stock` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_product
-- ----------------------------
BEGIN;
INSERT INTO `imooc_product` VALUES (3, 'Macbook Pro', '88888888', 'Macbook Pro', 99, 8800.00, '2019-01-24 00:19:28');
INSERT INTO `imooc_product` VALUES (4, '华为手机', '929868123123123', '商品描述：\r\n\r\n这是华为手机', 99, 4100.00, '2019-01-24 00:31:28');
COMMIT;

-- ----------------------------
-- Table structure for imooc_user
-- ----------------------------
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_user
-- ----------------------------
BEGIN;
INSERT INTO `imooc_user` VALUES (3, 'zhangsan', '4297f44b13955235245b2497399d7a93', '张三', 28, '13912345678@qq.com', '13912345678', '2019-01-23 23:54:34');
INSERT INTO `imooc_user` VALUES (4, 'wangwu', '4297f44b13955235245b2497399d7a93', '', 0, 'wangwu@imooc.com', '', '2019-01-24 09:21:45');
INSERT INTO `imooc_user` VALUES (5, 'zhaoliu', '4297f44b13955235245b2497399d7a93', '', 0, 'zhaoliu@imooc.com', '', '2019-01-24 09:35:05');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
