-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-25 07:10:02
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `coursesdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `courses`
--

CREATE TABLE `courses` (
  `課程編號` text NOT NULL,
  `老師編號` char(20) DEFAULT NULL,
  `課程名稱` text,
  `課程資訊` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `courses`
--

INSERT INTO `courses` (`課程編號`, `課程名稱`, `課程資訊`,`老師編號`) VALUES
('CSE350','電腦網路', 'TCP/UDP',  '9'),
('CSE360','編譯器製作',  '熟悉 Compiler 之設計與製作過程。', '8'),
('CSE497', 'JAVA物件導向程式設計',  '1. Java programming language\r\n2. Java軟體開發工具介紹\r\n3. Design patterns\r\n4. Refactoring','7'),
('1', '離散數學','','1'),
('10', '計算機概論','','1'),
('11', '數學導論','','1'),
('13', '機率論'),'','1',
('14', '資料結構','','1'),
('15', '向量分析','','1'),
('16', '統計學','','1'),
('17', '微分方程','','1'),
('18', '資料探勘','','1'),
('19', '性與人生','','1'),
('2', '線性代數','','1'),
('3', '微積分','','1'),
('4', '高等微積分','','1'),
('5', 'C程式設計','','1'),
('6', '性別與全球化','','1'),
('7', '汽車發展史','','1'),
('8', '代數學','','1'),
('9', '游泳','','1');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`課程編號`(10));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
