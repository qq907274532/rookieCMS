/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : rookie

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-03-06 14:03:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ceshi
-- ----------------------------
DROP TABLE IF EXISTS `ceshi`;
CREATE TABLE `ceshi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_dir` tinyint(1) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ceshi
-- ----------------------------
INSERT INTO `ceshi` VALUES ('1', '1', '111', '2017-02-27 15:00:04', '0', '2');
INSERT INTO `ceshi` VALUES ('2', '1', '111', '2017-02-28 15:00:04', '1', '2');
INSERT INTO `ceshi` VALUES ('3', '0', '111', '2017-02-28 15:00:04', '1', '2');
INSERT INTO `ceshi` VALUES ('4', '0', '111', '2017-02-26 15:00:04', '1', '2');
INSERT INTO `ceshi` VALUES ('5', '0', '111', '2017-02-28 15:00:04', '1', '2');
INSERT INTO `ceshi` VALUES ('6', '0', '111', '2017-02-26 15:00:04', '2', '3');
INSERT INTO `ceshi` VALUES ('7', '0', '111', '2017-02-26 15:00:04', '2', '3');
INSERT INTO `ceshi` VALUES ('8', '0', '111', '2017-02-26 15:00:04', '2', '3');
INSERT INTO `ceshi` VALUES ('9', '1', '111', '2017-02-26 15:00:04', '2', '3');
INSERT INTO `ceshi` VALUES ('10', '0', '111', '2017-02-27 15:00:04', '2', '3');
INSERT INTO `ceshi` VALUES ('11', '0', '111', '2017-02-27 15:00:04', '2', '3');
INSERT INTO `ceshi` VALUES ('12', '0', '111', '2017-02-27 15:00:04', '0', '3');
INSERT INTO `ceshi` VALUES ('13', '1', '111', '2017-02-27 15:00:04', '9', '3');
INSERT INTO `ceshi` VALUES ('14', '0', '111', '2017-02-27 15:00:04', '9', '4');
INSERT INTO `ceshi` VALUES ('15', '0', '111', '2017-02-27 15:00:04', '9', '4');
INSERT INTO `ceshi` VALUES ('16', '0', '111', '2017-02-27 15:00:04', '9', '4');
INSERT INTO `ceshi` VALUES ('17', '0', '111', '2017-02-28 15:00:04', '9', '4');
INSERT INTO `ceshi` VALUES ('18', '0', '111', '2017-02-28 15:00:04', '9', '4');
INSERT INTO `ceshi` VALUES ('19', '0', '111', '2017-02-28 15:00:04', '9', '4');
INSERT INTO `ceshi` VALUES ('20', '0', '111', '2017-02-28 15:00:04', '13', '5');
INSERT INTO `ceshi` VALUES ('21', '0', '111', '2017-02-28 15:00:04', '13', '5');
INSERT INTO `ceshi` VALUES ('22', '0', '111', '2017-02-28 15:00:04', '13', '5');
INSERT INTO `ceshi` VALUES ('23', '0', '111', '2017-02-26 15:00:04', '13', '5');
INSERT INTO `ceshi` VALUES ('24', '0', '111', '2017-02-26 15:00:04', '13', '5');
INSERT INTO `ceshi` VALUES ('25', '0', '111', '2017-02-26 15:00:04', '13', '6');
INSERT INTO `ceshi` VALUES ('26', '0', '111', '2017-02-26 15:00:04', '13', '6');
INSERT INTO `ceshi` VALUES ('27', '0', '111', '2017-02-26 15:00:04', '13', '6');
INSERT INTO `ceshi` VALUES ('28', '0', '111', '2017-02-26 15:00:04', '0', '6');
INSERT INTO `ceshi` VALUES ('29', '0', '111', '2017-02-26 15:00:04', '0', '7');
INSERT INTO `ceshi` VALUES ('30', '0', '111', '2017-02-28 15:00:04', '0', '7');
INSERT INTO `ceshi` VALUES ('31', '0', '111', '2017-02-28 15:00:04', '0', '7');
INSERT INTO `ceshi` VALUES ('32', '0', '111', '2017-02-28 15:00:04', '0', '7');
INSERT INTO `ceshi` VALUES ('33', '0', '111', '2017-02-28 15:00:04', '0', '8');
INSERT INTO `ceshi` VALUES ('34', '0', '111', '2017-02-28 15:00:04', '0', '8');
INSERT INTO `ceshi` VALUES ('35', '0', '111', '2017-02-28 15:00:04', '0', '8');

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
INSERT INTO `hx_admin_user` VALUES ('1', 'admin', 'pbkdf2_sha256$12000$HVqHjtCOhoKo$TZOQbvzgln4Ni4WfJtWw3Dz0it9ugCGIxXeAK9sen/4=', '907274532@qq.com', '1', '2017-03-06 13:04:00', '127.0.0.1', '2016-11-27 15:11:13', '2017-03-06 13:04:00');

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
INSERT INTO `hx_auth_group` VALUES ('1', '超级管理员', null, '1', '23,22,21,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1', '2016-11-27 16:28:50', '2017-03-06 13:31:04');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='节点表';

-- ----------------------------
-- Records of hx_auth_rule
-- ----------------------------
INSERT INTO `hx_auth_rule` VALUES ('1', 'Manageer/Rbac/index', '权限管理', '1', '1', '', '0', 'Rbac/index', '0', '1', 'fa-briefcase');
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
INSERT INTO `hx_auth_rule` VALUES ('17', 'Common/common/list', '系统设置', '1', '1', '', '0', 'common/list', '50', '1', 'fa-cog');
INSERT INTO `hx_auth_rule` VALUES ('18', 'Manager/BasicSettings/list', '基本设置', '1', '1', '', '17', 'BasicSettings/index', '1', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('19', 'Manager/BasicSettings/index', '设置', '1', '1', '', '18', 'BasicSettings/index', '2', '2', '');
INSERT INTO `hx_auth_rule` VALUES ('20', 'Manager/Log/common', '日志管理', '1', '1', '', '0', 'Log/common', '12', '1', 'fa-envelope-o');
INSERT INTO `hx_auth_rule` VALUES ('21', 'Manager/OperationLog/list', '操作日志', '1', '1', '', '20', 'OperationLog/index', '1', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('22', 'Manager/OperationLog/index', '列表', '1', '1', '', '21', 'OperationLog/index', '1', '2', '');
INSERT INTO `hx_auth_rule` VALUES ('23', 'Manager/Role/Rbac', '权限分配', '1', '1', '', '7', 'Role/Rbac', '5', '2', '');

-- ----------------------------
-- Table structure for hx_log
-- ----------------------------
DROP TABLE IF EXISTS `hx_log`;
CREATE TABLE `hx_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '管理员',
  `module` varchar(50) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(50) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(50) NOT NULL DEFAULT '' COMMENT '方法',
  `post_value` varchar(255) DEFAULT NULL COMMENT 'post提交内容',
  `get_value` varchar(255) DEFAULT '' COMMENT 'get 提交内容',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_log
-- ----------------------------
INSERT INTO `hx_log` VALUES ('1', '1', 'Manager', 'Node', 'edit', '{\"pid\":\"0\",\"title\":\"\\u7cfb\\u7edf\\u8bbe\\u7f6e\",\"name\":\"Common\\/common\\/list\",\"url\":\"common\\/list\",\"icon\":\"fa-cog\",\"sort\":\"50\",\"menu\":\"1\",\"id\":\"17\"}', '[]', '2017-03-06 13:20:17');
INSERT INTO `hx_log` VALUES ('2', '1', 'Manager', 'Node', 'edit', '[]', '{\"id\":\"1\"}', '2017-03-06 13:21:59');
INSERT INTO `hx_log` VALUES ('3', '1', 'Manager', 'BasicSettings', 'index', '[]', '[]', '2017-03-06 13:22:14');
INSERT INTO `hx_log` VALUES ('4', '1', 'Manager', 'OperationLog', 'index', '[]', '[]', '2017-03-06 13:56:58');
