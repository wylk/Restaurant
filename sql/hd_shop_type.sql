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
-- Ë°®ÁöÑÁªìÊûÑ `hd_shop_type`
--

CREATE TABLE IF NOT EXISTS `hd_shop_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '√≈µÍ¿‡–Õid',
  `cid` int(10) unsigned NOT NULL COMMENT 'ÂÖ¨Âè∏',
  `typename` varchar(55) NOT NULL COMMENT '√≈µÍ¿‡–Õ√˚≥∆',
  `type_img` varchar(255) NOT NULL COMMENT '√≈µÍ¿‡–ÕµƒÕº±Í',
  `create_time` int(10) unsigned NOT NULL COMMENT 'ÂàõÂª∫Êó∂Èó¥',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='√≈µÍ¿‡–Õ±Ì' AUTO_INCREMENT=5 ;

--
-- ËΩ¨Â≠òË°®‰∏≠ÁöÑÊï∞ÊçÆ `hd_shop_type`
--

INSERT INTO `hd_shop_type` (`id`, `cid`, `typename`, `type_img`, `create_time`) VALUES
(2, 83, 'È≤ÅËèú', './uploadfile/images/18811480487/20170629115120_132.jpg', 1498708280),
(3, 83, 'Ê±üÊπñËèú', './uploadfile/images/18811480487/20170629142633_931.jpg', 1498714617),
(4, 83, 'ÁÉ§È∏≠', './uploadfile/images/18811480487/20170629152818_107.jpg', 1498721298);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
