-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?04 �?19 �?16:18
-- 服务器版本: 5.5.47-log
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `7005thinkadmin`
--

-- --------------------------------------------------------

--
-- 表的结构 `entrylist`
--

CREATE TABLE IF NOT EXISTS `entrylist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `telphone` varchar(11) NOT NULL,
  `sex` tinyint(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `matchnum` int(11) NOT NULL,
  `matchzone` varchar(255) NOT NULL,
  `ip` char(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='id	编号\r\nname	用户名称\r\ntelphone	电话\r\nsex	性别\r\nemail	邮箱\r\nmatchNum	比赛场次序号\r\nmatchZone	赛区\r\nIP	IP地址\r\ntime	报名时间' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `entrylist`
--

INSERT INTO `entrylist` (`id`, `name`, `telphone`, `sex`, `email`, `matchnum`, `matchzone`, `ip`, `time`) VALUES
(8, '3333333333333', '2147483647', 100, '100@qq.com', 100, '100', '100', '0000-00-00 00:00:00'),
(9, '55555555555', '2147483647', 100, '100@qq.com', 100, '100', '100', '0000-00-00 00:00:00'),
(10, '55555555555', '15814503185', 100, '100@qq.com', 100, '100', '100', '0000-00-00 00:00:00'),
(11, '5555555555555555', '15814503185', 100, '100@qq.com', 100, '100', '100', '0000-00-00 00:00:00'),
(12, '9999999999', '15814503185', 100, '100@qq.com', 100, '100', '100', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `links`
--

INSERT INTO `links` (`id`, `title`, `url`) VALUES
(2, '链接地址1', 'https://www.baidu.com/1');

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL COMMENT '??',
  `create_at` varchar(11) DEFAULT '0',
  `update_at` varchar(11) DEFAULT '0',
  `login_ip` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0:???? 1:??',
  `type` tinyint(1) DEFAULT '1' COMMENT '1:???? 2:??? ',
  PRIMARY KEY (`id`),
  KEY `username` (`username`) USING BTREE,
  KEY `password` (`password`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `username`, `email`, `password`, `avatar`, `create_at`, `update_at`, `login_ip`, `status`, `type`) VALUES
(1, 'admin', '515343908@qq.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, '1436679338', '1461050669', '127.0.0.1', 1, 2),
(2, 'ph4nt0mer', 'rootphantomy@hotmail.com', 'ecb97ffafc1798cd2f67fcbc37226761', NULL, '1457881563', '0', '127.0.0.1', 1, 2),
(3, 'test', '1@QQ.COM', 'c4ca4238a0b923820dcc509a6f75849b', NULL, '1460884600', '0', '127.0.0.1', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `member_oauth`
--

CREATE TABLE IF NOT EXISTS `member_oauth` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `qq` varchar(100) DEFAULT NULL COMMENT 'QQ openid',
  `sina` varchar(100) DEFAULT NULL COMMENT 'sina openid',
  `github` varchar(100) DEFAULT NULL COMMENT 'github openid',
  `weixin` varchar(255) DEFAULT NULL COMMENT 'weixin openid',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `matchnum` int(11) NOT NULL,
  `matchzone` varchar(50) NOT NULL,
  `matchtime` datetime NOT NULL,
  PRIMARY KEY (`id`,`matchnum`,`matchzone`,`matchtime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='matchNum	比赛场次序号\r\nmatchZone	赛区\r\nmatchTime	比赛时间' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `session`
--

INSERT INTO `session` (`id`, `matchnum`, `matchzone`, `matchtime`) VALUES
(1, 1, '区域一', '2016-04-18 00:46:09'),
(2, 1, '1', '0000-00-00 00:00:00'),
(3, 2, '22222', '0000-00-00 00:00:00'),
(4, 4, '广东赛区', '2016-05-00 00:00:00'),
(5, 6, '广东赛区', '2016-05-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `visitlist`
--

CREATE TABLE IF NOT EXISTS `visitlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
