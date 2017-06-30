-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 06 月 30 日 15:01
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `hd`
--

-- --------------------------------------------------------

--
-- 表的结构 `hd_shop`
--

CREATE TABLE IF NOT EXISTS `hd_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '�ŵ�id',
  `shop_name` varchar(55) NOT NULL COMMENT '�ŵ�����',
  `type_id` int(10) unsigned NOT NULL COMMENT '�ŵ�����id',
  `company_id` int(10) unsigned NOT NULL COMMENT '��˾id',
  `shop_status` tinyint(3) unsigned NOT NULL COMMENT '�ŵ�״̬',
  `shop_notice` varchar(55) NOT NULL COMMENT '�ŵ깫��',
  `cost_per` float(10,2) NOT NULL COMMENT '�˾�����',
  `shop_address` varchar(255) NOT NULL COMMENT '�ŵ��ַ',
  `shop_introduction` varchar(255) NOT NULL COMMENT '�ŵ���',
  `add_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hd_shop_shop_name` (`shop_name`),
  KEY `hd_shop_type_id` (`type_id`),
  KEY `hd_shop_company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�ŵ��' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `hd_shop`
--

INSERT INTO `hd_shop` (`id`, `shop_name`, `type_id`, `company_id`, `shop_status`, `shop_notice`, `cost_per`, `shop_address`, `shop_introduction`, `add_time`) VALUES
(3, '全聚德', 4, 83, 1, '老北京地道烤鸭，一鸭多吃，开业大酬宾', 200.00, '北京省北京市朝阳区区三里屯什么路全聚德烤鸭店', '位居北京朝阳三里屯，黄金地段，老北京地道烤鸭，吃货们不容错过，赶快品尝吧！', 1498721789),
(6, '金手勺', 3, 83, 1, '江湖菜涵盖多种地方特色菜，让你一饱口福', 300.00, '北京省北京市海淀区银丰大厦3楼', '金手勺位居北京海淀区中关村，地段繁华，深受上班族的喜爱。', 1498725710),
(7, '鱼头汤', 2, 83, 0, '山东特色菜，一鱼多吃，口味鲜美', 200.00, '北京省北京市昌平区霍营街道', '赶快来吃', 1498788136);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
