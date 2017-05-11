/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : goonil

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-11 13:36:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for passwd
-- ----------------------------
DROP TABLE IF EXISTS `passwd`;
CREATE TABLE `passwd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  `md5` char(32) NOT NULL,
  `sha1` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `words` (`word`),
  UNIQUE KEY `md5` (`md5`),
  UNIQUE KEY `sha1` (`sha1`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;
