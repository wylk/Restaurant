-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- ‰∏ªÊú∫: localhost
-- ÁîüÊàêÊó•Êúü: 2017 Âπ¥ 06 Êúà 30 Êó• 15:01
-- ÊúçÂä°Âô®ÁâàÊú¨: 5.5.53
-- PHP ÁâàÊú¨: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Êï∞ÊçÆÂ∫ì: `hd`
--

-- --------------------------------------------------------

--
-- Ë°®ÁöÑÁªìÊûÑ `hd_employee`
--

CREATE TABLE IF NOT EXISTS `hd_employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '‘±π§id',
  `role_id` int(10) unsigned NOT NULL COMMENT 'Ω«…´id',
  `company_id` int(10) unsigned NOT NULL COMMENT 'ÂÖ¨Âè∏id',
  `shop_id` int(10) unsigned NOT NULL COMMENT 'µÍ∆Ãid',
  `username` varchar(55) NOT NULL COMMENT 'µ«¬º’À∫≈',
  `password` char(32) NOT NULL COMMENT 'µ«¬º√‹¬Î',
  `truename` varchar(55) NOT NULL COMMENT '’Ê µ–’√˚',
  `phone` char(11) NOT NULL COMMENT ' ÷ª˙∫≈¬Î',
  `email` varchar(55) NOT NULL COMMENT 'µÁ◊”” œ‰',
  `status` tinyint(3) unsigned NOT NULL COMMENT '◊¥Ã¨',
  `remark` varchar(255) NOT NULL COMMENT '±∏◊¢',
  `create_time` int(10) unsigned NOT NULL COMMENT 'ÂàõÂª∫Êó∂Èó¥',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hd_employee_username` (`username`),
  UNIQUE KEY `hd_employee_phone` (`phone`),
  UNIQUE KEY `hd_employee_email` (`email`),
  KEY `hd_employee_role_id` (`role_id`),
  KEY `hd_employee_shop_id` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='‘±π§±Ì' AUTO_INCREMENT=9 ;

--
-- ËΩ¨Â≠òË°®‰∏≠ÁöÑÊï∞ÊçÆ `hd_employee`
--

INSERT INTO `hd_employee` (`id`, `role_id`, `company_id`, `shop_id`, `username`, `password`, `truename`, `phone`, `email`, `status`, `remark`, `create_time`) VALUES
(1, 0, 83, 3, 'admin', '96e79218965eb72c92a549dd5a330112', '66', '18811480487', '123@qq.com', 1, 'Êí∏Ëµ∑Ë¢ñÂ≠êÂä†Ê≤πÂπ≤', 1498729284),
(8, 0, 83, 6, 'demo', '96e79218965eb72c92a549dd5a330112', '‰∫∫‰∫∫6', '18811480482', '1234@qq.com', 1, 'Â•ΩÂ•ΩÂπ≤', 1498729662);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
