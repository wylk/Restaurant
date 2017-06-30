-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- ä¸»æœº: localhost
-- ç”Ÿæˆæ—¥æœŸ: 2017 å¹´ 06 æœˆ 30 æ—¥ 15:00
-- æœåŠ¡å™¨ç‰ˆæœ¬: 5.5.53
-- PHP ç‰ˆæœ¬: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- æ•°æ®åº“: `hd`
--

-- --------------------------------------------------------

--
-- è¡¨çš„ç»“æ„ `hd_company`
--

CREATE TABLE IF NOT EXISTS `hd_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `company_name` varchar(55) NOT NULL COMMENT '¹«Ë¾Ãû³Æ',
  `company_address` varchar(255) NOT NULL COMMENT '¹«Ë¾µØÖ·',
  `company_person` varchar(55) NOT NULL COMMENT '¹«Ë¾·¨ÈË',
  `licence` varchar(55) NOT NULL COMMENT 'ÓªÒµÖ´ÕÕºÅÂë',
  `cart_number` varchar(55) NOT NULL COMMENT 'Éí·İÖ¤ºÅÂë',
  `licence_path` varchar(255) NOT NULL,
  `frontal_view` varchar(255) NOT NULL COMMENT 'Éí·İÖ¤ÕıÃæÕÕ',
  `back_view` varchar(255) NOT NULL COMMENT 'Éí·İÖ¤·´ÃæÕÕ',
  `phone` char(11) NOT NULL COMMENT 'ÊÖ»úºÅÂë',
  `password` char(32) NOT NULL COMMENT 'ç™»å½•å¯†ç ',
  `email` varchar(55) NOT NULL COMMENT 'ç”µå­é‚®ç®±',
  `addtime` int(10) unsigned NOT NULL COMMENT '´´½¨Ê±¼ä',
  `status` tinyint(3) unsigned NOT NULL COMMENT 'çŠ¶æ€å€¼ é»˜è®¤0 é€šè¿‡1 ä¸é€šè¿‡2',
  `reason` varchar(255) NOT NULL COMMENT 'é©³å›åŸå› ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hd_company_company_name` (`company_name`),
  KEY `hd_company_phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='¹«Ë¾±í' AUTO_INCREMENT=85 ;

--
-- è½¬å­˜è¡¨ä¸­çš„æ•°æ® `hd_company`
--

INSERT INTO `hd_company` (`id`, `company_name`, `company_address`, `company_person`, `licence`, `cart_number`, `licence_path`, `frontal_view`, `back_view`, `phone`, `password`, `email`, `addtime`, `status`, `reason`) VALUES
(83, 'åŒ—äº¬äº”ä¸€ä¹å¡ç§‘æŠ€æœ‰é™å…¬å¸', 'åŒ—äº¬æµ·æ·€åŒºè‹å·è¡—é“¶ä¸°å¤§å¦3æ¥¼çº³ä»€ç©ºé—´', 'äººäººé™†', '1111111', '412627199809090909', './uploadfile/images/18811480487/20170630143320_103.jpg', './uploadfile/images/18811480487/20170630143320_994.jpg', './uploadfile/images/18811480487/20170630143320_216.jpg', '18811480487', '96e79218965eb72c92a549dd5a330112', '760553350@qq.com', 1498632860, 2, ''),
(84, 'åŒ—äº¬äº”ä¸€ä¹å¡ç§‘æŠ€', 'åŒ—äº¬æµ·æ·€åŒºè‹å·è¡—é“¶ä¸°å¤§å¦3æ¥¼', 'luwen', '1111111', '412627199809090909', './uploadfile/images/15651117501/20170628164115_623.jpg', './uploadfile/images/15651117501/20170628164115_352.jpg', './uploadfile/images/15651117501/20170628164115_619.jpg', '15651117501', '96e79218965eb72c92a549dd5a330112', '760553350@qq.com', 1498639275, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
