/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50617
 Source Host           : localhost
 Source Database       : kittencupzf2

 Target Server Type    : MySQL
 Target Server Version : 50617
 File Encoding         : utf-8

 Date: 06/19/2014 13:41:15 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `kp_user_zf2mvc`
-- ----------------------------
DROP TABLE IF EXISTS `kp_user_zf2mvc`;
CREATE TABLE `kp_user_zf2mvc` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `oldPassword` varchar(32) NOT NULL,
  `lastPasswordChangeTime` int(11) NOT NULL,
  `regData` int(11) NOT NULL,
  `lastLoginDate` int(11) NOT NULL,
  `regIp` varchar(15) NOT NULL,
  `lastLoginIp` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
