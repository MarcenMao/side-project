-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-07 11:32:29
-- 伺服器版本: 5.6.17
-- PHP 版本： 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `onlinestore`
--

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ptime` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nofitems` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 資料表的匯出資料 `order`
--

INSERT INTO `order` (`oid`, `uid`, `ptime`, `nofitems`, `total`) VALUES
(1, 'admin', '2017-06-15 08:24:30', 123, 500),
(2, 'admin', '2017-06-07 03:12:38', 756, 500);

-- --------------------------------------------------------

--
-- 資料表結構 `orderitem`
--

CREATE TABLE IF NOT EXISTS `orderitem` (
  `oid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `nofitems` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  KEY `oid` (`oid`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(10) NOT NULL,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`pname`, `pno`, `price`, `description`) VALUES
('bike', 1, 1000, '??'),
('computer', 2, 15000, '???'),
('sdfsd', 3, 100, '41410'),
('1111', 4, 111, '111'),
('11111', 5, 1111, '111'),
('777', 6, 77, '777'),
('888', 7, 88, '88'),
('99', 8, 99, '99'),
('測試', 9, 133, '測試'),
('測試', 10, 133, '測試');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `lastname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `access` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'access level',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`username`, `password`, `dob`, `lastname`, `firstname`, `mobile`, `access`) VALUES
('admin', '0000', '2017-05-01', 'wei', 'wang', '0912345678', 'member'),
('billhu@gmail.com', '1234', '2017-05-01', 'hu', 'bill', '0923-456-789', 'admin');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `o2uPK` FOREIGN KEY (`uid`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `order` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
