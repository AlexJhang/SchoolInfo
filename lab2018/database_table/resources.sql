-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-25 07:10:26
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
-- 資料表結構 `resources`
--

CREATE TABLE `resources` (
  `課程編號` text,
  `教材編號` int(11) NOT NULL,
  `檔案` text,
  `檔案路徑` text,
  `作者` text,
  `時間` text,
  `主旨` mediumtext,
  `公告` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `resources`
--

INSERT INTO `resources` (`課程編號`, `教材編號`, `檔案`, `檔案路徑`, `作者`, `時間`, `主旨`, `公告`) VALUES
('CSE497', 1, '2018 JAVA 物件導向程式設計 Homework 10.pdf', 'uploads/CSE497/2018 JAVA 物件導向程式設計 Homework 10.pdf', 'M043040098', '2018-05-15 20:10', 'Homework 10', '* 注意事項\r\n1. 請使用 JAVA 語言，配合 IntelliJ IDEA 寫本次作業並進行測試，並安裝、使用 JAVA SE Development Kit (JDK) 8 函式庫。\r\n2. 請依據作業規定設定 IntelliJ IDEA 專案名稱與 package name，若未依照規定將根據狀況扣分。\r\n3. 嚴禁抄襲其他同學作業，參與者(抄襲與被抄襲)皆以學期成績不及格處理。\r\n4. 請對你的程式碼有深入瞭解，demo 時助教會問。\r\n5. 對題目有問題可以寄信問助教群(java_ta@net.nsysu.edu.tw)或是到實驗室(EC5018)詢問，但不幫忙 debug。\r\n6. 逾期以零分計算，不接受補交，有任何因素導致無法如期繳交，請事先告知。\r\n7. Demo 時間會另外通知。\r\n* 作業規定與上傳\r\n1. IntelliJ IDEA 專案名稱：StudentID_HW10\r\n2. 作業請繳交專案之 tar 或 zip archive 並上傳至網路大學。 請於 2018 年 5 月 27 日 (週日)\r\n23:59 前上傳完畢，逾期以零分計算，不接受補交，有任何因素導致無法如期繳交，有問題請事先告知，再次強調，Demo 時間會另外通知。'),
('CSE497', 13, '2018 JAVA Homework 12.zip', 'uploads/CSE497/2018 JAVA Homework 12.zip', 'B035020028', '2018-05-25 12:23', '2018 JAVA 物件導向程式設計 Homework 12', '【2018 JAVA 物件導向程式設計 Homework 12】\r\n \r\n注意事項\r\n \r\n請使用 JAVA 語言，配合 IntelliJ IDEA 寫本次作業並進行測試，並安裝、使用 JAVA SE Development Kit (JDK) 8 函式庫。\r\n \r\n \r\n請依據作業規定設定 IntelliJ IDEA 專案名稱與 package name，若未依照規定將根據狀況扣分。\r\n \r\n嚴禁抄襲其他同學作業，參與者 (抄襲與被抄襲) 本學期總成績不及格處理。\r\n請對你的程式碼有深入瞭解，demo 時助教會問。\r\n \r\n對題目有問題可以寄信問助教群(java_ta@net.nsysu.edu.tw)或是到實驗室(EC5018)詢問，但不幫忙debug。\r\n \r\n逾期以零分計算，不接受補交，有任何因素導致無法如期繳交， 請事先告知；Demo 時間會另外通知。\r\n\r\n\r\n\r\n \r\n作業規定與上傳\r\nIntelliJ IDEA 專案名稱：&lt;學號&gt;_HW12\r\n作業請繳交專案之 tar 或 zip archive 並上傳至網路大學。請於 2018  年  6  月 7  日 (週四) 23:59  前上傳完畢，逾期以零分計算，不接受補交，再次強調，有任何因素導致無法如期繳交，請事先告知。'),
('CSE497', 15, '', '', 'B035020028', '2018-05-25 12:53', '【JAVA 物件導向程式設計】Demo 時間 &amp; 作業繳交', '●作業繳交:\r\n \r\n從作業四開始，\r\n所有修課同學請於網大繳交作業，\r\n異常處理加選同學請確認是否可以進入網大，\r\n如果有問題請於周一至週五下午兩點-五點至F5018 或是寄信跟助教反應。\r\n \r\n●Demo時間: \r\n \r\n由於下周一老師出差，助教將於課堂時間進行作業Demo\r\n時間:3/26(一)，地點: F5007，範圍: 作業一 - 作業三\r\n \r\n由於作業三繳交期限為3/26 23:59，若當天上午有繳交作業，\r\n可以安排於當天Demo，若是當天上午未繳交作業，則安排於下次Demo\r\n \r\n學號 B03 開頭同學，Demo時間:9點-10點\r\n學號 B05 開頭同學， Demo時間: 10點-11點\r\n其餘同學， Demo時間: 11點-12點\r\n \r\n當日早上，八點半即開放Demo，\r\n學號B03開頭的同學可以提早到教室Demo，以免等待時間過久，\r\n如果錯過規定的Demo時間，請當天下午至F5018繼續完成Demo，避免佔用他人時間。\r\n \r\n---請對你的程式碼有深入了解，demo時助教會詢問---\r\n \r\njava_TAs');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`教材編號`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `resources`
--
ALTER TABLE `resources`
  MODIFY `教材編號` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
