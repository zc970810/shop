create database shop;
-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `imooc_admin`
--

CREATE TABLE IF NOT EXISTS `imooc_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminuser` varchar(50) NOT NULL DEFAULT '',
  `adminpass` char(32) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `login_at` datetime NOT NULL,
  `login_ip` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `imooc_admin`
--

INSERT INTO `imooc_admin` (`id`, `adminuser`, `adminpass`, `created_at`, `login_at`, `login_ip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-01-23 20:21:03', '2019-05-28 11:25:50', 2130706433);

-- --------------------------------------------------------

--
-- 表的结构 `imooc_cart`
--

CREATE TABLE IF NOT EXISTS `imooc_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `products` text,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `imooc_cart`
--

INSERT INTO `imooc_cart` (`id`, `price`, `quantity`, `products`, `uid`, `created_at`) VALUES
(2, '21700.00', 3, '{"3":{"quantity":2,"product":{"id":"3","name":"Macbook Pro","price":"8800.00","code":"88888888","description":"Macbook Pro"}},"4":{"quantity":1,"product":{"id":"4","name":"\\u534e\\u4e3a\\u624b\\u673a","price":"4100.00","code":"929868123123123","description":"\\u5546\\u54c1\\u63cf\\u8ff0\\uff1a\\r\\n\\r\\n\\u8fd9\\u662f\\u534e\\u4e3a\\u624b\\u673a"}}}', 5, '2019-01-24 10:53:24'),
(3, '0.00', 0, '[]', 6, '2019-05-28 11:34:52');

-- --------------------------------------------------------

--
-- 表的结构 `imooc_order`
--

CREATE TABLE IF NOT EXISTS `imooc_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `products` text,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `imooc_order`
--

INSERT INTO `imooc_order` (`id`, `price`, `quantity`, `products`, `uid`, `created_at`) VALUES
(1, '17600.00', 2, '{"3":{"quantity":2,"product":{"id":"3","name":"Macbook Pro","price":"8800.00","code":"88888888","description":"Macbook Pro"}}}', 5, '2019-01-24 12:46:33');

-- --------------------------------------------------------

--
-- 表的结构 `imooc_product`
--

CREATE TABLE IF NOT EXISTS `imooc_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `code` varchar(100) NOT NULL DEFAULT '',
  `description` text,
  `stock` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `imooc_product`
--

INSERT INTO `imooc_product` (`id`, `name`, `code`, `description`, `stock`, `price`, `created_at`) VALUES
(3, 'Macbook Pro', '88888888', 'Macbook Pro', 99, '8800.00', '2019-01-24 00:19:28'),
(4, '华为手机', '929868123123123', '商品描述：\r\n\r\n这是华为手机', 99, '4100.00', '2019-01-24 00:31:28'),
(5, '鼠标', '201808081113', '我是个鼠标啊哈哈哈哈哈哈哈哈哈或或或或或或或或或', 99999, '99.00', '2019-05-28 03:29:21');

-- --------------------------------------------------------

--
-- 表的结构 `imooc_user`
--

CREATE TABLE IF NOT EXISTS `imooc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `imooc_user`
--

INSERT INTO `imooc_user` (`id`, `username`, `password`, `name`, `age`, `email`, `phone`, `created_at`) VALUES
(3, 'zhangsan', '4297f44b13955235245b2497399d7a93', '张三', 28, '13912345678@qq.com', '13912345678', '2019-01-23 23:54:34'),
(5, 'zhaoliu', '4297f44b13955235245b2497399d7a93', '赵刘', 99, 'zhaoliu@imooc.com', '123456', '2019-01-24 09:35:05'),
(6, 'zc', 'c9624888f571507964fae4696d57fe0b', '赵辰', 22, '935216290@qq.com', '13717852927', '2019-05-28 03:28:41'),
(7, 'sb', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '123456@qq.com', '', '2019-05-28 11:31:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
