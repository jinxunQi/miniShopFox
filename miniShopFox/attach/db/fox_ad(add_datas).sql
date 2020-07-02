/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : studyfoxminishop

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 02/07/2020 20:02:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fox_ad
-- ----------------------------
DROP TABLE IF EXISTS `fox_ad`;
CREATE TABLE `fox_ad`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '幻灯片0 广告1',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '图片',
  `gid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '链接的商品ID',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fox_ad
-- ----------------------------
INSERT INTO `fox_ad` VALUES (2, 0, '手机', '20200702/520bc61c74f47df9454c21dcde856f8e.jpg', 1, 2);
INSERT INTO `fox_ad` VALUES (3, 0, '日用百货', '20200702/283adfbaf685d3867d6d98c6c9fad3be.jpg', 3, 1);
INSERT INTO `fox_ad` VALUES (4, 1, '电脑', '20200702/db636f6df16e373ff4a6d1d3f7335c5f.jpg', 2, 3);
INSERT INTO `fox_ad` VALUES (5, 1, 'test4', '20200702/cdf7d0fe2c34a02ad3a04f2021cf1030.jpg', 4, 3);
INSERT INTO `fox_ad` VALUES (6, 1, 'test5', '20200702/782888b8dd94410eab52db09e9283222.jpg', 5, 5);
INSERT INTO `fox_ad` VALUES (7, 1, 'test6', '20200702/a0ff7df69425605ceff9dd9f965cbb51.jpg', 6, 6);
INSERT INTO `fox_ad` VALUES (11, 0, '手机', '20200702/0e8817c466572b743e11af8323c69726.jpg', 7, 8);

SET FOREIGN_KEY_CHECKS = 1;
