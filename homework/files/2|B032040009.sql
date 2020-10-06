-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 05 月 24 日 06:07
-- 伺服器版本: 5.7.21
-- PHP 版本： 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `DB_proj1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `作業`
--

CREATE TABLE `作業` (
  `作業編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `作業名稱` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `繳交期限` datetime NOT NULL,
  `課程編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `作業資訊` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `作業`
--

INSERT INTO `作業` (`作業編號`, `作業名稱`, `繳交期限`, `課程編號`, `作業資訊`) VALUES
('1', 'ch1 習題', '2018-05-23 00:00:00', '1', NULL),
('10', 'ch10 習題', '2018-04-17 00:00:00', '1', ''),
('11', 'ch11 習題', '2018-06-01 00:00:00', '2', ''),
('12', 'ch12 習題', '2018-06-01 00:00:00', '1', ''),
('13', '1.Data Type', '2018-05-30 00:00:00', '5', NULL),
('14', '2.Array', '2018-06-01 00:00:00', '5', NULL),
('15', '3.Control', '2018-06-02 00:00:00', '5', NULL),
('2', 'ch2 習題', '2018-05-25 00:00:00', '1', NULL),
('3', 'ch3 習題', '2018-05-26 00:00:00', '1', NULL),
('4', 'ch4 習題', '2018-05-27 00:00:00', '1', NULL),
('5', 'ch5 習題', '2018-05-28 00:00:00', '1', NULL),
('6', 'ch6 習題', '2018-05-29 00:00:00', '1', NULL),
('7', 'ch7 習題', '2018-06-01 00:00:00', '1', ''),
('8', 'ch8 習題', '2018-04-10 00:00:00', '1', ''),
('9', 'ch9 習題', '2018-06-01 00:00:00', '1', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `作業`
--
ALTER TABLE `作業`
  ADD PRIMARY KEY (`作業編號`),
  ADD KEY `課程編號` (`課程編號`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `作業`
--
ALTER TABLE `作業`
  ADD CONSTRAINT `作業_ibfk_1` FOREIGN KEY (`課程編號`) REFERENCES `課程` (`課程編號`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
