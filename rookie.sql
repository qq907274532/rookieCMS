/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : rookie

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-02-16 22:15:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hx_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `hx_admin_user`;
CREATE TABLE `hx_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '后台管理用户',
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `status` tinyint(4) DEFAULT '1' COMMENT '锁定状态2锁定，1：未锁定',
  `last_time` datetime DEFAULT NULL COMMENT '登录时间',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '登录ip',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台管理员';

-- ----------------------------
-- Records of hx_admin_user
-- ----------------------------
INSERT INTO `hx_admin_user` VALUES ('1', 'admin', 'pbkdf2_sha256$12000$HVqHjtCOhoKo$TZOQbvzgln4Ni4WfJtWw3Dz0it9ugCGIxXeAK9sen/4=', '907274532@qq.com', '1', '2017-02-12 14:24:30', '127.0.0.1', '2016-11-27 15:11:13', '2017-02-12 14:24:30');

-- ----------------------------
-- Table structure for hx_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `hx_auth_group`;
CREATE TABLE `hx_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL,
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of hx_auth_group
-- ----------------------------
INSERT INTO `hx_auth_group` VALUES ('1', '超级管理员', null, '1', '76,75,74,73,72,71,70,69,68,67,66,65,64,63,62,61,60,59,58,57,56,55,52,51,50,49,48,47,46,45,44,43,42,41,40,39,38,37,36,35,34,33,22,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1', '2016-11-27 16:28:50', '2016-12-12 20:42:01');

-- ----------------------------
-- Table structure for hx_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `hx_auth_group_access`;
CREATE TABLE `hx_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='节点和角色中间表';

-- ----------------------------
-- Records of hx_auth_group_access
-- ----------------------------
INSERT INTO `hx_auth_group_access` VALUES ('1', '1');

-- ----------------------------
-- Table structure for hx_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `hx_auth_rule`;
CREATE TABLE `hx_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `url` varchar(200) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL COMMENT '排序',
  `menu` int(1) DEFAULT '0' COMMENT '是否是菜单,1是菜单 2：不是',
  `icon` varchar(150) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='节点表';

-- ----------------------------
-- Records of hx_auth_rule
-- ----------------------------
INSERT INTO `hx_auth_rule` VALUES ('1', 'Manageer/Rbac/index', '权限管理', '1', '1', '', '0', 'Rbac/index', '0', '1', 'fa-gear');
INSERT INTO `hx_auth_rule` VALUES ('2', 'Manageer/AdminUser/list', '管理员管理', '1', '1', '', '1', 'AdminUser/index', '1', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('3', 'Manager/AdminUser/index', '列表', '1', '1', '', '2', 'AdminUser/index', '0', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('4', 'Manager/AdminUser/add', '添加', '1', '1', '', '2', 'AdminUser/add', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('5', 'Manager/AdminUser/edit', '修改', '1', '1', '', '2', 'AdminUser/edit', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('6', 'Manager/AdminUser/del', '启用/禁用', '1', '1', '', '2', 'AdminUser/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('7', 'Manager/Node/list', '节点管理', '1', '1', '', '1', 'Node/index', '2', '1', 'cogs');
INSERT INTO `hx_auth_rule` VALUES ('8', 'Manager/Node/index', '列表', '1', '1', '', '7', 'Node/index', '0', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('9', 'Manager/Node/add', '添加', '1', '1', '', '7', 'Node/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('10', 'Manager/Node/edit', '修改', '1', '1', '', '7', 'Node/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('11', 'Manager/Node/del', '启用/禁用', '1', '1', '', '7', 'Node/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('12', 'Manager/Role/list', '角色管理', '1', '1', '', '1', 'Role/index', '2', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('13', 'Manager/Role/index', '列表', '1', '1', '', '12', 'Role/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('14', 'Manager/Role/add', '添加', '1', '1', '', '12', 'Role/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('15', 'Manager/Role/edit', '修改', '1', '1', '', '12', 'Role/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('16', 'Manager/Role/del', '启用/禁用', '1', '1', '', '12', 'Role/del', '4', '0', '');

-- ----------------------------
-- Table structure for hx_log
-- ----------------------------
DROP TABLE IF EXISTS `hx_log`;
CREATE TABLE `hx_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '管理员远',
  `time` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL COMMENT '登录ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_log
-- ----------------------------
