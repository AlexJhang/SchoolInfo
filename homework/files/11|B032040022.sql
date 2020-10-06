-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 05 月 25 日 12:42
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
-- 資料表結構 `courses`
--

CREATE TABLE `courses` (
  `課程編號` char(20) NOT NULL,
  `課程名稱` text,
  `課程資訊` longtext,
  `老師編號` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `courses`
--

INSERT INTO `courses` (`課程編號`, `課程名稱`, `課程資訊`, `老師編號`) VALUES
('1', '離散數學', '', '1'),
('10', '計算機概論', '', '1'),
('11', '數學導論', '', '1'),
('13', '機率論', '', '1'),
('14', '資料結構', '', '1'),
('15', '向量分析', '', '1'),
('16', '統計學', '', '1'),
('17', '微分方程', '', '1'),
('18', '資料探勘', '', '1'),
('19', '性與人生', '', '1'),
('2', '線性代數', '', '1'),
('3', '微積分', '', '1'),
('4', '高等微積分', '', '1'),
('415', '無名課', 'dfkjdsnlkvdhskvndshslk', '1'),
('5', 'C程式設計', '', '4'),
('6', '性別與全球化', '', '1'),
('7', '汽車發展史', '', '1'),
('8', '代數學', '', '1'),
('9', '游泳', '', '1'),
('CSE350', '電腦網路', 'TCP/UDP', '9'),
('CSE360', '編譯器製作', '熟悉 Compiler 之設計與製作過程。', '8'),
('CSE497', 'JAVA物件導向程式設計', '1. Java programming language\r\n2. Java軟體開發工具介紹\r\n3. Design patterns\r\n4. Refactoring', '7');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `留言編號` int(11) NOT NULL,
  `課程編號` text,
  `作者` text NOT NULL,
  `時間` text NOT NULL,
  `內容` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `messages`
--

INSERT INTO `messages` (`留言編號`, `課程編號`, `作者`, `時間`, `內容`) VALUES
(22, 'CSE497', 'B035020028', '2018-05-23 20:52', 'This is a test.'),
(23, 'CSE497', 'B035020028', '2018-05-24 11:57', '123\r\n456');

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
('CSE497', 15, '', '', 'B035020028', '2018-05-25 12:53', '【JAVA 物件導向程式設計】Demo 時間 &amp; 作業繳交', '●作業繳交:\r\n \r\n從作業四開始，\r\n所有修課同學請於網大繳交作業，\r\n異常處理加選同學請確認是否可以進入網大，\r\n如果有問題請於周一至週五下午兩點-五點至F5018 或是寄信跟助教反應。\r\n \r\n●Demo時間: \r\n \r\n由於下周一老師出差，助教將於課堂時間進行作業Demo\r\n時間:3/26(一)，地點: F5007，範圍: 作業一 - 作業三\r\n \r\n由於作業三繳交期限為3/26 23:59，若當天上午有繳交作業，\r\n可以安排於當天Demo，若是當天上午未繳交作業，則安排於下次Demo\r\n \r\n學號 B03 開頭同學，Demo時間:9點-10點\r\n學號 B05 開頭同學， Demo時間: 10點-11點\r\n其餘同學， Demo時間: 11點-12點\r\n \r\n當日早上，八點半即開放Demo，\r\n學號B03開頭的同學可以提早到教室Demo，以免等待時間過久，\r\n如果錯過規定的Demo時間，請當天下午至F5018繼續完成Demo，避免佔用他人時間。\r\n \r\n---請對你的程式碼有深入了解，demo時助教會詢問---\r\n \r\njava_TAs'),
('1', 16, 'dog.9999.jpg', 'uploads/1/dog.9999.jpg', '1', '2018-05-25 20:39', 'holle', '各位同學好');

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

-- --------------------------------------------------------

--
-- 資料表結構 `學生`
--

CREATE TABLE `學生` (
  `學號` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `姓名` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `密碼` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `生日` date NOT NULL,
  `性別` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `學生資訊` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `學生`
--

INSERT INTO `學生` (`學號`, `姓名`, `密碼`, `生日`, `性別`, `學生資訊`) VALUES
('123', '12213', '123', '2018-05-15', 'M', 'sdafdasf'),
('B032040001', '陳彥翰', '827ccb0eea8a706c4c34a16891f84e7b', '1995-10-26', 'M', '萬年卷哥☝☝☝☝☝☝☝☝☝☝☝☝'),
('B032040002', 'Judy', '827ccb0eea8a706c4c34a16891f84e7b', '2018-05-04', 'F', 'wqee'),
('B032040009', '洪啟峰', 'f1c1592588411002af340cbaedd6fc33', '1995-09-20', 'M', 'I <span style=\"color:#FF0000;\"> love </span><span style=\"color:#FFAAAA;\">Angel</span>'),
('B032040017', 'Tina', '827ccb0eea8a706c4c34a16891f84e7b', '2003-05-16', 'F', 'dsgfbfngfmndgf'),
('B032040022', '張肇尹', '5c66a576ef76271fbacb40029de6361a', '1996-03-12', 'M', 'Very Good!\r\n生於憂患，死於安樂\r\n✈'),
('B032040023', '張肇貳', '23456', '2000-05-16', 'M', 'not bad!!!'),
('B032040024', '路人甲', '827ccb0eea8a706c4c34a16891f84e7b', '1996-05-18', 'M', ''),
('B032040025', '金二水', '827ccb0eea8a706c4c34a16891f84e7b', '1994-01-12', 'F', ''),
('B032040026', '木天冷', '827ccb0eea8a706c4c34a16891f84e7b', '1996-05-18', 'M', ''),
('B032040027', '水五峰', '827ccb0eea8a706c4c34a16891f84e7b', '1996-05-20', 'F', ''),
('B032040028', '火關西', '827ccb0eea8a706c4c34a16891f84e7b', '1997-07-12', 'F', ''),
('B032040029', '土不同', '827ccb0eea8a706c4c34a16891f84e7b', '1996-05-08', 'M', ''),
('B032040030', '東佢欸', '827ccb0eea8a706c4c34a16891f84e7b', '1996-05-24', 'M', ''),
('B032040031', '羅小海', '827ccb0eea8a706c4c34a16891f84e7b', '1996-03-18', 'F', ''),
('B032040036', 'liaoweihua', 'e10adc3949ba59abbe56e057f20f883e', '1996-03-22', 'M', 'akjhsdakjshdhasd'),
('B032040045', '嗚嗚嗚', '123', '2018-05-09', 'M', '1241414234'),
('B035020028', '陳子傑', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', '1996-05-10', 'M', 'hhhhhhh');

-- --------------------------------------------------------

--
-- 資料表結構 `寄信`
--

CREATE TABLE `寄信` (
  `標題` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `內容` text COLLATE utf8mb4_unicode_ci,
  `時間` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `學號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `老師編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `寄信編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `收件人身份` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `寄信`
--

INSERT INTO `寄信` (`標題`, `內容`, `時間`, `學號`, `老師編號`, `寄信編號`, `收件人身份`) VALUES
('wolframalpha', '<a href=\"https://www.wolframalpha.com\">wolframalpha<a>', '2018-05-08 00:00:00', 'B032040022', '1', '1', 'S'),
('re:☞♛☜2', '☞♛☜☞♛☜☞♛☜☞♛☜☞♛☜☞♛☜', '2018-05-23 16:00:55', 'B032040001', '1', '10', 'S'),
('作業', '本魯好夥伴在工業區工作，跟我分享他們宿舍超便宜，一個月兩張小朋友內，電費不用錢\r\n，租一間放五台礦機再冷氣全年無休開16度根本爽賺。\r\n\r\n他有沒有賺到我是不太清楚，不過台灣有多少電力是用在挖礦呢？\r\n\r\n看顯卡搶成這樣，應該不少吧？', '2018-05-08 00:00:00', 'B032040022', '1', '2', 'S'),
('斜槓青年：全球職涯新趨勢，迎接更有價值的多職人生', '　<a href=\"http://www.books.com.tw/products/0010762201\">除了本業，你還擁有什麼？</a>\r\n　　除了職稱，你還有沒有比名片更亮眼的故事？\r\n　　席捲全球新風潮！\r\n　　不是迫於生存，而是不甘平庸！\r\n　　\r\n　　斜／槓／青／年──Slash是一種生活態度！\r\n　　共享經濟時代，越來越多人不再滿足於單一職業和身分的束縛，\r\n　　開始選擇一種能夠利用自身專業和才藝，經營多重身分的多職人生。\r\n　　這些人都擁有一個共同的名字：斜槓青年／Slash。\r\n　　\r\n　　對於一個斜槓青年最重要的是：\r\n　　不是身兼很多種賺錢的方式，而是擁有許多真正熱愛的事物。\r\n　　透過不同管道，讓你的才華和機會超／展／開！\r\n\r\n　　斜槓青年並不浪漫，但可能精采。\r\n　　他們投資的不是財富，而是自己人生的故事────\r\n　　一邊做設計同時開書店、從事攝影也是健身教練、寫程式邊做Youtuber……\r\n　　如今全球斜槓青年的故事已越堆越厚，如果你還未上路，那你該緊張了。\r\n\r\n　　未必要辭職去旅行，\r\n　　拋棄麵包追逐詩與遠方。\r\n　　但是你該捫心自問，\r\n　　除了一份安穩的工作，你還會什麼？\r\n　　如果世界是精采的，\r\n　　當你delete人生的其他選擇，自然就沒得選擇。\r\n　　你要做一隻在猴群裡爬樹的魚？還是也同時痛快地游水！\r\n　　讓現在的業餘愛好，成為你未來謀生的手段！\r\n\r\n　　從今以後，按自己的方式生活！\r\n　　\r\n★好評推薦★\r\n　　\r\n　　這個時代，大家都處於一種不斷變動的焦慮，過去的一招半式闖江湖，一份工作做到底，已經過去了。\r\n　　現在的經驗法則，就是沒有法則，必須依靠探索和嘗試來瞭解這個「沒有模式的時代」的新規則。\r\n　　作者這本書以他自身的觀察出發，提供在生活之樂中找到生存之道的思考與路徑，適合仍在理想及麵包兩端心理交戰、期望有所不同的朋友閱讀。——前公務員／《公門菜鳥飛》作者／生態保育NGO／政治工作者林于凱\r\n　　\r\n　　本書完整解釋了「斜槓青年」一詞的真正來由，也加入許多作者有感於科技蓬勃發展的當下，對比過\r\n　　往與現今社會而給出的許多應逐漸捨棄或轉換的價值觀建議。\r\n　　這是一本適合以下兩種人閱讀的書：沒察覺但其實正逐漸成為斜槓青年一份子的年輕人／越來越不懂當下青年到底在想什麼的中生代青年。——Workis創辦人／toetoe共同創辦人／tico及時通訊創辦人楊皓宇Howie\r\n　　', '2018-05-15 00:00:00', 'B032040022', '3', '3', 'S'),
('【JAVA 物件導向程式設計】 Homework 11', '【2018 JAVA 物件導向程式設計 Homework 11】\r\n\r\nl   注意事項\r\n \r\n1.     請使用 JAVA 語言，配合 IntelliJ IDEA 寫本次作業並進行測試，並安裝、使用 JAVA SE Development Kit (JDK) 8 函式庫。\r\n \r\n2.     請依據作業規定設定 IntelliJ IDEA 專案名稱與 package name，若未依照規定將根據狀況扣分。\r\n \r\n3.     嚴禁抄襲其他同學作業，參與者 (抄襲與被抄襲) 本學期總成績不及格處理。\r\n4.     請對你的程式碼有深入瞭解，demo 時助教會問。\r\n \r\n5.     對題目有問題可以寄信問助教群(<a href=\"java_ta@net.nsysu.edu.tw\">java_ta@net.nsysu.edu.tw</a>)或是到實驗室(EC5018)詢問，但不幫忙debug。\r\n \r\n6.     逾期以零分計算，不接受補交，有任何因素導致無法如期繳交， 請事先告知；Demo 時間會另外通知。\r\n\r\n\r\nl   作業規定與上傳\r\n1.     IntelliJ IDEA 專案名稱：<學號>_HW11\r\n2.     作業請繳交專案之 tar 或 zip archive 並上傳至網路大學。請於 2018  年  5  月 27  日 (週日) 23:59  前上傳完畢，逾期以零分計算，不接受補交，再次強調，有任何因素導致無法如期繳交，請事先告知。\r\n\r\n', '2018-05-08 00:00:00', 'B032040022', '4', '4', 'S'),
('\"教務處(教務處電子報)\"\r\n【演講公告】5/24(四) 道德倫理、性別醫療關懷倫�z演講 (供餐)', '【演講公告】5/24(四) 道德倫理、性別醫療關懷倫理演講 (供餐)\r\n\r\n當別人需要幫忙時，您是否會伸出援手呢？到底該如何抉擇？\r\n助人行為真的很不容易，如果顧慮太多，那遇見緊急情境「自保」將會是最佳選擇，然而看到需要幫助的人，能幫卻不去幫是一種非常不舒服的內心掙扎。我們到底該如何取捨呢？\r\n\r\n「關懷」不是特別要做些什麼，更不是在彌補什麼，而是發自本性的迎向他人，主動地與他人建立關係、與他人結合。\r\n關懷是道德的基礎，而非由道德產生關懷。關懷者因著關懷態度而產生關懷行動，建立關懷關係，才能塑造和諧的共同存在情境，達致美善的生活。而關懷的醫療照護，所需要的更是「聆聽式的對話」以及「對話式的聆聽」，如此一來即不會受到性別上的差異問題所困擾。\r\n\r\n為培養大家對道德、性別醫療關懷倫理議題有更進一步的認知，本校師資培育中心洪瑞兒主任特別邀請台灣大學哲學系王榮麟副教授和中山醫學大學通識教育中心蕭宏恩主任來跟我們分享助人的道德義務，以及性別、醫療關懷與倫理議題。希望大家能從演講互動中對當前倫理議題進行反思進而提升自我批判思考能力。歡迎且鼓勵有興趣的老師同學前來聆聽演講！\r\n\r\n演講詳細訊息如下：\r\n107年5月24日 (四)  13:10-17:00\r\n【場次一】\r\n講題：助人是我們的道德義務嗎？\r\n講者：台灣大學哲學系 王榮麟副教授\r\n時間：13:10-15:00\r\n【場次二】\r\n講題：性別、醫療關懷與倫理\r\n講者：中山醫學大學通識教育中心 蕭宏恩主任\r\n時間：15:10-17:00\r\n\r\n活動議程如下：\r\n時間	活動內容	\r\n12:30-13:10	報到	\r\n13:10-15:00	【專題演講I】助人是我們的道德義務嗎？ 台灣大學哲學系王榮麟副教授	\r\n15:00-15:10	休息	\r\n15:10-17:00	【專題演講II】性別、醫療關懷與倫理 中山醫學大學通識教育中心蕭宏恩主任	\r\n17:00	晚餐&賦歸 	\r\n\r\n演講地點：國立中山大學社科院1001\r\n報名網址：<a href=\"https://goo.gl/forms/I4OKq8oX9JeQMGK33\">https://goo.gl/forms/I4OKq8oX9JeQMGK33</a>\r\n報名截止：5/23(三) 中午12點前\r\n*活動當天附晚餐\r\n*師資生可認A類演講\r\n\r\n', '2018-05-08 00:00:00', 'B032040022', '6', '5', 'S'),
('asdfa', 'asfasgas\r\nasgasg', '2018-05-21 20:04:49', 'B032040022', '1', '6', 'T'),
('<strong>☞♛☜</string>', '我是卷哥', '2018-05-22 15:58:28', 'B032040001', '1', '7', 'T'),
('re:☞♛☜', '啊不就好棒棒！！', '2018-05-23 15:49:52', 'B032040001', '1', '8', 'S'),
('re:☞♛☜2', '☞♛☜☞♛☜☞♛☜', '2018-05-23 16:02:59', 'B032040001', '1', '9', 'S');

-- --------------------------------------------------------

--
-- 資料表結構 `授教`
--

CREATE TABLE `授教` (
  `授教編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `課程編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `學號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `授教`
--

INSERT INTO `授教` (`授教編號`, `課程編號`, `學號`) VALUES
('1', '1', 'B032040009'),
('10', '5', 'B032040026'),
('11', '5', 'B032040027'),
('12', '5', 'B032040028'),
('13', 'CSE350', 'B032040022'),
('14', 'CSE497', 'B032040022'),
('2', '1', 'B032040022'),
('3', '2', 'B032040022'),
('4', '3', 'B032040022'),
('5', '4', 'B032040022'),
('6', '5', 'B032040022'),
('7', '5', 'B032040023'),
('8', '5', 'B032040024'),
('9', '5', 'B032040025');

-- --------------------------------------------------------

--
-- 資料表結構 `繳交`
--

CREATE TABLE `繳交` (
  `繳交編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `時間` datetime NOT NULL,
  `學號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `作業編號` int(20) NOT NULL,
  `檔案名稱` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `分數` int(5) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `繳交`
--

INSERT INTO `繳交` (`繳交編號`, `時間`, `學號`, `作業編號`, `檔案名稱`, `分數`) VALUES
('1', '2018-05-19 14:02:04', 'B032040022', 1, '汽機車強制險理賠項目.doc', 95),
('10', '2018-05-24 08:05:42', 'B032040009', 2, '繳交table.sql', -1),
('2', '2018-05-19 14:30:58', 'B032040022', 10, '登山重要求救資訊.docx', 95),
('3', '2018-05-19 14:41:37', 'B032040022', 4, '網大ER-model.xml', -1),
('4', '2018-05-21 12:14:54', 'B032040022', 5, '2018 JAVA 物件導向程式設計 Homework 10.pdf', -1),
('5', '2018-05-22 06:33:08', 'B032040022', 2, 'commons-lang3-3.7.jar', 100),
('6', '2018-05-23 02:38:19', 'B032040022', 12, '2012_0713-0715 黑黑谷上治茆山走巒安堂出西巒大山 航跡檔.gdb', 90),
('7', '2018-05-23 13:11:49', 'B032040024', 13, 'command.txt', 95),
('8', '2018-05-23 13:12:10', 'B032040024', 14, 'StorageHomework.doc', -1),
('9', '2018-05-23 13:12:49', 'B032040022', 13, '學生資料.csv', 80);

-- --------------------------------------------------------

--
-- 資料表結構 `老師`
--

CREATE TABLE `老師` (
  `老師編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `姓名` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `密碼` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `自介` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `老師`
--

INSERT INTO `老師` (`老師編號`, `姓名`, `密碼`, `自介`) VALUES
('1', '蔣永嚴', '827ccb0eea8a706c4c34a16891f84e7b', '台灣數學界權威教授之一\r\n職稱(Position):教授\r\n辦公室(Office):中山大學 理2002-4\r\n電話(Phone):(07)5252000-3829(O)\r\n傳真(Fax):(07)5253809\r\nE-mail:chiangyy@math.nsysu.edu.tw\r\n最高學歷(Highest Education)\r\n美國紐約城市大學數學博士(1995) Ph. D.,The City University of New York, 1995\r\n專長(Research Specialties)\r\n黎曼面、雙曲幾何、複變函數論、最佳化理論  Hyperbolic Geometry, Teichmuller Theory, Optimization Theory'),
('2', '羅娜', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
('3', '彰中', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
('4', '915', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
('5', '肇善終', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
('6', '教務處', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
('7', '吳俊弘', '827ccb0eea8a706c4c34a16891f84e7', NULL),
('8', ' 張玉盈', '827ccb0eea8a706c4c34a16891f84e7', 'E-Mail: changyi@cse.nsysu.edu.tw \r\n學歷:\r\n學士: 國立臺灣大學資訊工程系 ( 1986/06 )\r\n碩士: The Ohio State Univ., Computer & Information Science ( 1987/12 )\r\n博士: The Ohio State Univ., Computer & Information Science ( 1991/06 )\r\n\r\n\r\n\r\n經歷:\r\n國立中山大學應用數學系副教授 ( 1991/08 ~ 1997/07 )\r\n國立中山大學應用數學系教授 ( 1997/08 ~ 1999/07)\r\n現職: 國立中山大學資訊工程系教授 ( 1999/08 ~ ) \r\n專長: 資料庫系統, 分散式系統, 多媒体資訊系統 , 行動資訊系統 ，資料挖掘 \r\n得獎記錄:\r\n1992 中華民國電腦學會優良論文獎 ( 資訊系統類 )\r\n1994 國立中山大學傑出教學獎\r\n1999 國立中山大學研究績優獎\r\n2000 國立中山大學優良導師獎\r\n2001 中國電機工程學會優秀青年電機工程師獎\r\n2002 中國工程學會南區優秀青年工程師獎\r\n2008 中華民國電腦學會佳作論文獎(資訊應用類)\r\n2017 指導之博士生獲得救國團之優秀青年獎'),
('9', '賴位光', '827ccb0eea8a706c4c34a16891f84e7b', '美國普渡大學電機博士\r\n專長：電腦網路、無線通訊\r\n研究室：電資大樓 工EC5001室\r\nE-mail：wklai@cse.nsysu.edu.tw\r\nTEL：07-5252000 ext. 4312\r\n個人首頁\r\n實驗室：高速網路實驗室 工EC5008室\r\nTEL:07-5252365\r\n ');

-- --------------------------------------------------------

--
-- 資料表結構 `課程`
--

CREATE TABLE `課程` (
  `課程編號` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `課程名稱` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `課程`
--

INSERT INTO `課程` (`課程編號`, `課程名稱`) VALUES
('1', '離散數學'),
('10', '計算機概論'),
('11', '數學導論'),
('13', '機率論'),
('14', '資料結構'),
('15', '向量分析'),
('16', '統計學'),
('17', '微分方程'),
('18', '資料探勘'),
('19', '性與人生'),
('2', '線性代數'),
('3', '微積分'),
('4', '高等微積分'),
('5', 'C程式設計'),
('6', '性別與全球化'),
('7', '汽車發展史'),
('8', '代數學'),
('9', '游泳');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`課程編號`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`留言編號`);

--
-- 資料表索引 `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`教材編號`);

--
-- 資料表索引 `作業`
--
ALTER TABLE `作業`
  ADD PRIMARY KEY (`作業編號`),
  ADD KEY `課程編號` (`課程編號`);

--
-- 資料表索引 `學生`
--
ALTER TABLE `學生`
  ADD PRIMARY KEY (`學號`);

--
-- 資料表索引 `寄信`
--
ALTER TABLE `寄信`
  ADD PRIMARY KEY (`寄信編號`),
  ADD KEY `學號` (`學號`);

--
-- 資料表索引 `授教`
--
ALTER TABLE `授教`
  ADD PRIMARY KEY (`授教編號`);

--
-- 資料表索引 `繳交`
--
ALTER TABLE `繳交`
  ADD PRIMARY KEY (`繳交編號`);

--
-- 資料表索引 `老師`
--
ALTER TABLE `老師`
  ADD PRIMARY KEY (`老師編號`);

--
-- 資料表索引 `課程`
--
ALTER TABLE `課程`
  ADD PRIMARY KEY (`課程編號`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `留言編號` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表 AUTO_INCREMENT `resources`
--
ALTER TABLE `resources`
  MODIFY `教材編號` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
