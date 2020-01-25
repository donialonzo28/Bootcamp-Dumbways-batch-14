/*
 Navicat Premium Data Transfer

 Source Server         : localhost - MySQL
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost:3306
 Source Schema         : library

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : 65001

 Date: 25/01/2020 19:27:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book_tb
-- ----------------------------
DROP TABLE IF EXISTS `book_tb`;
CREATE TABLE `book_tb`  (
  `book_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name_book` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `writer_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `publication_year` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of book_tb
-- ----------------------------
INSERT INTO `book_tb` VALUES ('B001', 'AngularJS Essential', 'C001', 'W001', '2018', 'imgs/7035623_images_1445561838.jpg');
INSERT INTO `book_tb` VALUES ('B002', 'Unity 2018 By Example', 'C003', 'W003', '2018', 'imgs/b08823.png');
INSERT INTO `book_tb` VALUES ('B003', 'Phyton GUI Programming with Tkinter', 'C002', 'W004', '2017', 'imgs/49026226_2aba4ac8-f75c-406b-98d4-69e685a22ff5_1000_1000.jpg');
INSERT INTO `book_tb` VALUES ('B004', 'Rust High Performance', 'C002', 'W002', '2019', 'imgs/images2.jpg');
INSERT INTO `book_tb` VALUES ('B005', 'book name', 'C001', 'W001', '2020', 'imgs/1579953225asd.jpg');

-- ----------------------------
-- Table structure for book_tb_copy1
-- ----------------------------
DROP TABLE IF EXISTS `book_tb_copy1`;
CREATE TABLE `book_tb_copy1`  (
  `book_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name_book` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `writer_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `publication_year` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for category_tb
-- ----------------------------
DROP TABLE IF EXISTS `category_tb`;
CREATE TABLE `category_tb`  (
  `category_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name_category` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of category_tb
-- ----------------------------
INSERT INTO `category_tb` VALUES ('C001', 'Web Programming');
INSERT INTO `category_tb` VALUES ('C002', 'General Programming');
INSERT INTO `category_tb` VALUES ('C003', 'Web Development');
INSERT INTO `category_tb` VALUES ('C004', 'category name');

-- ----------------------------
-- Table structure for writer_tb
-- ----------------------------
DROP TABLE IF EXISTS `writer_tb`;
CREATE TABLE `writer_tb`  (
  `writer_id` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name_writer` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`writer_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of writer_tb
-- ----------------------------
INSERT INTO `writer_tb` VALUES ('W001', 'Rodrigo Banas');
INSERT INTO `writer_tb` VALUES ('W002', 'Iban Eguia Moraza');
INSERT INTO `writer_tb` VALUES ('W003', 'Alan Thorn');
INSERT INTO `writer_tb` VALUES ('W004', 'Alan D. Moore');
INSERT INTO `writer_tb` VALUES ('W005', 'writer name');
INSERT INTO `writer_tb` VALUES ('W006', 'werwrwe');

SET FOREIGN_KEY_CHECKS = 1;
