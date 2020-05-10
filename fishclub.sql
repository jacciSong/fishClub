-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2020-04-29 04:24:45
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fishclub`
--

-- --------------------------------------------------------

--
-- 表的结构 `cart_detail_info`
--

CREATE TABLE IF NOT EXISTS `cart_detail_info` (
  `cart_id` int(11) NOT NULL COMMENT '购物车id,user_id的外键',
  `ware_id` int(11) NOT NULL COMMENT '主键+外键     商品表的ware_id',
  `count` int(11) NOT NULL COMMENT '购物车商品数量',
  `status` enum('normal','delete') NOT NULL COMMENT '状态',
  PRIMARY KEY (`cart_id`,`ware_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `discount_base_info`
--

CREATE TABLE IF NOT EXISTS `discount_base_info` (
  `code` varchar(128) NOT NULL COMMENT '折扣码',
  `ratio` decimal(19,2) NOT NULL COMMENT '优惠力度',
  `status` enum('normal','delete','used') NOT NULL COMMENT '状态',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `management_base_info`
--

CREATE TABLE IF NOT EXISTS `management_base_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `account` varchar(64) NOT NULL COMMENT '账号',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `email` varchar(64) NOT NULL COMMENT '联系邮箱',
  `phone` varchar(64) NOT NULL COMMENT '联系电话',
  `status` enum('normal','delete') NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `management_base_info`
--

INSERT INTO `management_base_info` (`id`, `account`, `password`, `email`, `phone`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2640470874@qq.com', '15022562833', 'normal');

-- --------------------------------------------------------

--
-- 表的结构 `order_base_info`
--

CREATE TABLE IF NOT EXISTS `order_base_info` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `user_id` int(11) NOT NULL COMMENT '外键   用户信息表的id',
  `order_number` varchar(128) NOT NULL COMMENT '订单编号',
  `time` datetime NOT NULL COMMENT '下单时间',
  `ware_total` decimal(19,2) NOT NULL COMMENT '商品总价',
  `shipping` decimal(19,2) DEFAULT '0.00' COMMENT '运费',
  `discount_code` varchar(128) DEFAULT NULL COMMENT '外键  折扣表的code',
  `discount` decimal(19,2) DEFAULT '0.00' COMMENT '折扣',
  `total` decimal(19,2) NOT NULL COMMENT '订单总额',
  `address_id` int(11) NOT NULL COMMENT '外键，地址信息表的address_id',
  `real_pay` decimal(19,2) NOT NULL DEFAULT '0.00' COMMENT '实付款',
  `status` enum('payed','delete','obligation','completed') NOT NULL COMMENT '状态',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `order_ware_detail`
--

CREATE TABLE IF NOT EXISTS `order_ware_detail` (
  `order_id` int(11) NOT NULL COMMENT '主键+外键     订单信息表的order_id',
  `id` int(11) NOT NULL COMMENT '主键+外键     商品表的ware_id',
  `price` decimal(19,2) NOT NULL COMMENT '下单时商品价格',
  `count` int(11) NOT NULL COMMENT '下单商品数量',
  `status` enum('normal','delete') NOT NULL COMMENT '状态',
  PRIMARY KEY (`order_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_address_detail`
--

CREATE TABLE IF NOT EXISTS `user_address_detail` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地址id  ',
  `user_id` int(11) NOT NULL COMMENT '外键   用户信息表的user_id',
  `first_name` varchar(64) NOT NULL COMMENT '名字',
  `last_name` varchar(64) NOT NULL COMMENT '姓',
  `company` varchar(256) DEFAULT NULL COMMENT '公司',
  `adress` text COMMENT '地址',
  `apartment` varchar(256) NOT NULL COMMENT '公寓',
  `city` varchar(256) NOT NULL COMMENT '城市',
  `country` varchar(256) NOT NULL COMMENT '国家',
  `state` varchar(256) NOT NULL COMMENT '州',
  `zip_code` varchar(256) NOT NULL COMMENT '邮编',
  `email` varchar(64) NOT NULL COMMENT '联系邮箱',
  `phone` varchar(64) NOT NULL COMMENT '联系电话',
  `status` enum('normal','delete') NOT NULL COMMENT '状态',
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_base_info`
--

CREATE TABLE IF NOT EXISTS `user_base_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `first_name` varchar(64) NOT NULL COMMENT '名字',
  `last_name` varchar(64) NOT NULL COMMENT '姓',
  `email` varchar(64) NOT NULL COMMENT '邮箱',
  `password` varchar(64) NOT NULL,
  `status` enum('normal','delete') NOT NULL COMMENT '状态',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ware_base_info`
--

CREATE TABLE IF NOT EXISTS `ware_base_info` (
  `ware_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `name` varchar(64) NOT NULL COMMENT '名字',
  `price` decimal(19,2) NOT NULL COMMENT '价格',
  `detail` text NOT NULL COMMENT '商品详情',
  `picture` varchar(128) DEFAULT NULL COMMENT '商品图片',
  `count_max` int(11) NOT NULL COMMENT '商品数量上限',
  `status` enum('normal','delete','null') NOT NULL COMMENT '状态',
  PRIMARY KEY (`ware_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
