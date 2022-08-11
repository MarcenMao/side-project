-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-05-17 11:45:22
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
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(10) NOT NULL,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='table holding product records' AUTO_INCREMENT=17 ;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`pname`, `pno`, `price`, `description`) VALUES
('bike', 1, 1500, 'bike for kids'),
('computer', 2, 35780, 'computer for gaming'),
('new iphone', 3, 32500, '64g new iphone '),
('woodtable', 4, 25000, 'wood table '),
('ipad mini4', 5, 19500, 'apple ipad mini4 '),
('watch', 6, 3500, 'sport watch for kids'),
('iphone case', 7, 500, 'iphone case for iphone7'),
('shoes', 8, 2500, 'shoes023'),
('手機架', 9, 39, '懶人手機架'),
('束口袋', 10, 350, '迷彩束口袋'),
('123', 16, 123, '123');

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
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`username`, `password`, `dob`, `lastname`, `firstname`, `mobile`) VALUES
('admin', 'admin', '2017-05-10', 'Weihua', 'Wang', '0912345678'),
('billhu@gmail.com', '1234', '2017-05-01', 'hu', 'bill', '0923-456-789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
