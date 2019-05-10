-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 09 月 23 日 17:35
-- 伺服器版本: 10.1.34-MariaDB
-- PHP 版本： 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `kh_sql`
--

-- --------------------------------------------------------

--
-- 資料表結構 `accounts`
--

CREATE TABLE `accounts` (
  `id` int(100) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `userid`, `password`, `role`) VALUES
(25, 'admin', 'admin', 'you850407', '最高權限'),
(26, 'test10A', 'test_10A', 'you850407', '10A_USER'),
(27, 'Tes_7A', 'test_7A', 'you850407', '7A_USER'),
(28, 'Tesss', 'Tessss', 'you850407', '9ES_USER'),
(30, '黃老大', 'root', 'you850407', '最高權限'),
(31, 'root', 'test_21ES', 'you850407', '21ES_USER');

-- --------------------------------------------------------

--
-- 資料表結構 `accounts_nurses`
--

CREATE TABLE `accounts_nurses` (
  `id` int(11) NOT NULL,
  `accounts_nurses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `accounts_nurses`
--

INSERT INTO `accounts_nurses` (`id`, `accounts_nurses`, `username`, `password`) VALUES
(3, 'Tes1111', 'tes111', 'you850407'),
(4, 'tess', 'tess', 'you850407'),
(5, 'root', 'root', 'you850407');

-- --------------------------------------------------------

--
-- 資料表結構 `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(100) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `userid`) VALUES
(24, 'admin', 'admin'),
(25, 'test10A', 'test_10A'),
(26, 'Tes_7A', 'test_7A'),
(27, 'Tessss', 'Tesss'),
(29, '黃老大', 'root'),
(30, 'root', 'test_21ES');

-- --------------------------------------------------------

--
-- 資料表結構 `adminuserinformation`
--

CREATE TABLE `adminuserinformation` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statusofphone` tinyint(1) NOT NULL,
  `statusofemail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `adminuserinformation`
--

INSERT INTO `adminuserinformation` (`id`, `userid`, `phone`, `email`, `statusofphone`, `statusofemail`) VALUES
(25, 'admin', '', '', 0, 0),
(26, 'test_10A', '', '', 0, 0),
(27, 'test_7A', '', '', 0, 0),
(28, 'Tessss', '', '', 0, 0),
(30, 'root', '', '', 0, 0),
(31, 'test_21ES', '', '', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `bulletin`
--

CREATE TABLE `bulletin` (
  `id` int(11) NOT NULL,
  `toppest` tinyint(1) NOT NULL,
  `station` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `homepage` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateofstart` date NOT NULL,
  `dateofend` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bulletin`
--

INSERT INTO `bulletin` (`id`, `toppest`, `station`, `homepage`, `title`, `content`, `dateofstart`, `dateofend`) VALUES
(12, 0, '7A', 0, 'Test_7A and Test_10ES', 'console.log(stations, content, title, $(\"#title\").val().length);', '2018-09-22', '2018-09-26'),
(13, 1, '10ES', 1, 'Test_7A and Test_10ES', 'console.log(\'really wtf\');', '2018-09-22', NULL),
(23, 0, '21ES', 0, 'test21ES', 'test21ES', '2018-09-22', NULL),
(24, 0, '7A', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(25, 0, '9ES', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(26, 0, '9EN', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(27, 0, '10A', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(28, 0, '10ES', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(29, 0, '13ES', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(30, 0, '13EN', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL),
(31, 0, '21ES', 0, 'alltest', 'test to see all kind of roles can see the bulletin', '2018-09-22', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `firesetting`
--

CREATE TABLE `firesetting` (
  `id` int(11) NOT NULL,
  `station` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shift` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `team` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `teamname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `firesetting`
--

INSERT INTO `firesetting` (`id`, `station`, `shift`, `team`, `teamname`) VALUES
(1, '10A', '白班', '滅火班', '第一組'),
(2, '10A', '大夜', '通報班', ''),
(4, '10A', '大夜', '避難引導班', ''),
(5, '10A', '大夜', '救護班', ''),
(6, '10A', '大夜', '安全防護班', '第2組'),
(7, '10A', '白班', '通報班', ''),
(8, '10A', '大夜', '滅火班', ''),
(9, '10A', '白班', '安全防護班', '');

-- --------------------------------------------------------

--
-- 資料表結構 `floorphone`
--

CREATE TABLE `floorphone` (
  `id` int(100) NOT NULL,
  `source` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `personnel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `station` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `floorphone`
--

INSERT INTO `floorphone` (`id`, `source`, `personnel`, `phone`, `station`, `sort`) VALUES
(1, '黃大哥', '醫生', '0932172', '21ES', 7),
(2, '黃老二很men', '院長大人', '6969696969', '21ES', 6),
(3, 'test7A', 'test7A', '7777777777', '7A', 7),
(4, 'test10A大哥', 'test10A大哥', '1010109999', '10A', 1),
(5, 'test10ES', 'test10ES', '0101010101', '10ES', 10),
(7, '10A副阿長', '10A副阿長', '1011111111', '10A', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `functions`
--

CREATE TABLE `functions` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nurses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminuser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adminuserinformation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bulletin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firesetting` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `groupsetting` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `settingstation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `floorphone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setting` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `iptable`
--

CREATE TABLE `iptable` (
  `id` int(11) NOT NULL,
  `ipaddress` int(255) NOT NULL,
  `insertdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `iptable`
--

INSERT INTO `iptable` (`id`, `ipaddress`, `insertdate`) VALUES
(13, 1869573988, '2018-09-23'),
(15, 2071690107, '2018-09-23'),
(17, 1853583227, '2018-09-23'),
(19, 1869576993, '2018-09-23'),
(20, 2065694999, '2018-09-23'),
(28, 2054912891, '2018-09-23'),
(29, 2071690197, '2018-09-23'),
(30, 1863089109, '2018-09-23'),
(31, 1893654238, '2018-09-23'),
(32, -555819298, '2018-09-23'),
(33, -370546199, '2018-09-23'),
(34, -563093794, '2018-09-23'),
(35, -555847825, '2018-09-23'),
(36, 1869673460, '2018-09-23'),
(37, 1893600288, '2018-09-23'),
(38, 741092396, '2018-09-23'),
(39, 2071825932, '2018-09-23'),
(40, 1426327303, '2018-09-23'),
(41, 1893622816, '2018-09-23'),
(42, 1881960236, '2018-09-23'),
(43, -16705788, '2018-09-23'),
(50, 2066509600, '2018-09-23'),
(51, 2066509601, '2018-09-23'),
(52, 2066509602, '2018-09-23'),
(53, 2066509603, '2018-09-23'),
(54, 2066509604, '2018-09-23'),
(55, 2066509605, '2018-09-23'),
(56, 2066509606, '2018-09-23'),
(57, 2066509607, '2018-09-23'),
(58, 2066509608, '2018-09-23'),
(59, 2066509609, '2018-09-23'),
(60, 2066509610, '2018-09-23'),
(61, 2066509611, '2018-09-23'),
(62, 2066509612, '2018-09-23'),
(63, 2066509613, '2018-09-23'),
(64, 2066509614, '2018-09-23'),
(65, 2066509615, '2018-09-23'),
(66, 2066509616, '2018-09-23'),
(67, 2066509617, '2018-09-23'),
(68, 2066509618, '2018-09-23'),
(69, 2066509619, '2018-09-23'),
(70, 2066509620, '2018-09-23'),
(71, 2066509621, '2018-09-23'),
(72, 2066509622, '2018-09-23'),
(73, 2066509623, '2018-09-23'),
(74, 2066509624, '2018-09-23'),
(75, 2066509625, '2018-09-23'),
(76, 2066509626, '2018-09-23'),
(77, 2066509627, '2018-09-23'),
(78, 2066509628, '2018-09-23'),
(79, 2066509629, '2018-09-23'),
(80, 2066509630, '2018-09-23'),
(81, 2066509631, '2018-09-23'),
(82, 2066509632, '2018-09-23'),
(83, 2066509633, '2018-09-23'),
(84, 2066509634, '2018-09-23'),
(85, 2066509635, '2018-09-23'),
(86, 2066509636, '2018-09-23'),
(87, 2066509637, '2018-09-23'),
(88, 2066509638, '2018-09-23'),
(89, 2066509639, '2018-09-23'),
(90, 2066509640, '2018-09-23'),
(91, 2066509641, '2018-09-23'),
(92, 2066509642, '2018-09-23'),
(93, 2066509643, '2018-09-23'),
(94, 2066509644, '2018-09-23'),
(95, 2066509645, '2018-09-23'),
(96, 2066509646, '2018-09-23'),
(97, 2066509647, '2018-09-23'),
(98, 2066509648, '2018-09-23'),
(99, 2066509649, '2018-09-23'),
(100, 2066509650, '2018-09-23'),
(101, 2066509651, '2018-09-23'),
(102, 2066509652, '2018-09-23'),
(103, 2066509653, '2018-09-23'),
(104, 2066509654, '2018-09-23'),
(105, 2066509655, '2018-09-23'),
(106, 2066509656, '2018-09-23'),
(107, 2066509657, '2018-09-23'),
(108, 2066509658, '2018-09-23'),
(109, 2066509659, '2018-09-23'),
(110, 2066509660, '2018-09-23'),
(111, 2066509661, '2018-09-23'),
(112, 2066509662, '2018-09-23'),
(113, 2066509663, '2018-09-23'),
(114, 2066509664, '2018-09-23'),
(115, 2066509665, '2018-09-23'),
(116, 2066509666, '2018-09-23'),
(117, 2066509667, '2018-09-23'),
(118, 2066509668, '2018-09-23'),
(119, 2066509669, '2018-09-23'),
(120, 2066509670, '2018-09-23'),
(121, 2066509671, '2018-09-23'),
(122, 2066509672, '2018-09-23'),
(123, 2066509673, '2018-09-23'),
(124, 2066509674, '2018-09-23'),
(125, 2066509675, '2018-09-23'),
(126, 2066509676, '2018-09-23'),
(127, 2066509677, '2018-09-23'),
(128, 2066509678, '2018-09-23');

-- --------------------------------------------------------

--
-- 資料表結構 `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `accounts_nurses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `nurses`
--

INSERT INTO `nurses` (`id`, `accounts_nurses`, `username`, `area`) VALUES
(5, 'Tes1111', 'tes111', '7A,13EN,21ES'),
(6, 'tess', 'tess', '9ES,9EN,21ES'),
(7, 'root', 'root', '7A,9ES,9EN,10A,10ES,13ES,13EN,21ES');

-- --------------------------------------------------------

--
-- 資料表結構 `pofadminuser`
--

CREATE TABLE `pofadminuser` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofadminuser`
--

INSERT INTO `pofadminuser` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(12, '10A_USER', 0, 0, 0, 0),
(18, '最高權限', 1, 1, 1, 1),
(19, '7A_USER', 0, 0, 0, 0),
(20, '9ES_USER', 0, 0, 0, 0),
(21, '9EN_USER', 0, 0, 0, 0),
(22, '10ES_USER', 0, 0, 0, 0),
(23, '13ES_USER', 0, 0, 0, 0),
(24, '13EN_USER', 0, 0, 0, 0),
(25, '21ES_USER', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `pofadminuserinformation`
--

CREATE TABLE `pofadminuserinformation` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofadminuserinformation`
--

INSERT INTO `pofadminuserinformation` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(10, '10A_USER', 0, 0, 0, 0),
(16, '最高權限', 1, 1, 1, 1),
(17, '7A_USER', 0, 0, 0, 0),
(18, '9ES_USER', 0, 0, 0, 0),
(19, '9EN_USER', 0, 0, 0, 0),
(20, '10ES_USER', 0, 0, 0, 0),
(21, '13ES_USER', 0, 0, 0, 0),
(22, '13EN_USER', 0, 0, 0, 0),
(23, '21ES_USER', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `pofbulletin`
--

CREATE TABLE `pofbulletin` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofbulletin`
--

INSERT INTO `pofbulletin` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(9, '10A_USER', 1, 1, 1, 1),
(15, '最高權限', 1, 1, 1, 1),
(16, '7A_USER', 1, 1, 1, 1),
(17, '9ES_USER', 1, 1, 1, 1),
(18, '9EN_USER', 1, 1, 1, 1),
(19, '10ES_USER', 1, 1, 1, 1),
(20, '13ES_USER', 1, 1, 1, 1),
(21, '13EN_USER', 1, 1, 1, 1),
(22, '21ES_USER', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `poffiresetting`
--

CREATE TABLE `poffiresetting` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `poffiresetting`
--

INSERT INTO `poffiresetting` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(7, '10A_USER', 1, 1, 1, 1),
(13, '最高權限', 1, 1, 1, 1),
(14, '7A_USER', 1, 1, 1, 1),
(15, '9ES_USER', 1, 1, 1, 1),
(16, '9EN_USER', 1, 1, 1, 1),
(17, '10ES_USER', 1, 1, 1, 1),
(18, '13ES_USER', 1, 1, 1, 1),
(19, '13EN_USER', 1, 1, 1, 1),
(20, '21ES_USER', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `poffloorphone`
--

CREATE TABLE `poffloorphone` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `poffloorphone`
--

INSERT INTO `poffloorphone` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(4, '10A_USER', 1, 1, 1, 1),
(10, '最高權限', 1, 1, 1, 1),
(11, '7A_USER', 1, 1, 1, 1),
(12, '9ES_USER', 1, 1, 1, 1),
(13, '9EN_USER', 1, 1, 1, 1),
(14, '10ES_USER', 1, 1, 1, 1),
(15, '13ES_USER', 1, 1, 1, 1),
(16, '13EN_USER', 1, 1, 1, 1),
(17, '21ES_USER', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `pofnurses`
--

CREATE TABLE `pofnurses` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofnurses`
--

INSERT INTO `pofnurses` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(16, '10A_USER', 0, 0, 0, 0),
(22, '最高權限', 1, 1, 1, 1),
(23, '7A_USER', 0, 0, 0, 0),
(24, '9ES_USER', 0, 0, 0, 0),
(25, '9EN_USER', 0, 0, 0, 0),
(26, '10ES_USER', 0, 0, 0, 0),
(27, '13ES_USER', 0, 0, 0, 0),
(28, '13EN_USER', 0, 0, 0, 0),
(29, '21ES_USER', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `pofsetthinggroup`
--

CREATE TABLE `pofsetthinggroup` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofsetthinggroup`
--

INSERT INTO `pofsetthinggroup` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(6, '10A_USER', 0, 0, 0, 0),
(12, '最高權限', 1, 1, 1, 1),
(13, '7A_USER', 0, 0, 0, 0),
(14, '9ES_USER', 0, 0, 0, 0),
(15, '9EN_USER', 0, 0, 0, 0),
(16, '10ES_USER', 0, 0, 0, 0),
(17, '13ES_USER', 0, 0, 0, 0),
(18, '13EN_USER', 0, 0, 0, 0),
(19, '21ES_USER', 0, 0, 0, 0),
(37, 'test24', 1, 1, 1, 1),
(38, 'test2', 1, 1, 1, 1),
(39, 'vdvdv', 0, 0, 0, 0),
(40, 'rrr', 0, 0, 0, 0),
(41, 'grgrg', 0, 0, 0, 0),
(42, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 0, 0, 0, 1),
(43, 'test3', 0, 0, 0, 0),
(44, 'vsvvvvvv', 0, 0, 0, 1),
(45, 'cSSs', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `pofsetting`
--

CREATE TABLE `pofsetting` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofsetting`
--

INSERT INTO `pofsetting` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(1, '10A_USER', 0, 0, 0, 0),
(7, '最高權限', 1, 1, 1, 1),
(8, '7A_USER', 0, 0, 0, 0),
(9, '9ES_USER', 0, 0, 0, 0),
(10, '9EN_USER', 0, 0, 0, 0),
(11, '10ES_USER', 0, 0, 0, 0),
(12, '13ES_USER', 0, 0, 0, 0),
(13, '13EN_USER', 0, 0, 0, 0),
(14, '21ES_USER', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `pofsettingstation`
--

CREATE TABLE `pofsettingstation` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `addonly` tinyint(1) NOT NULL,
  `editonly` tinyint(1) NOT NULL,
  `delonly` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pofsettingstation`
--

INSERT INTO `pofsettingstation` (`id`, `typeofroles`, `readonly`, `addonly`, `editonly`, `delonly`) VALUES
(5, '10A_USER', 1, 1, 1, 1),
(11, '最高權限', 1, 1, 1, 1),
(12, '7A_USER', 1, 1, 1, 1),
(13, '9ES_USER', 1, 1, 1, 1),
(14, '9EN_USER', 1, 1, 1, 1),
(15, '10ES_USER', 1, 1, 1, 1),
(16, '13ES_USER', 1, 1, 1, 1),
(17, '13EN_USER', 1, 1, 1, 1),
(18, '21ES_USER', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `editTables` int(11) NOT NULL,
  `dateofrecord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `setting`
--

CREATE TABLE `setting` (
  `id` int(255) NOT NULL,
  `deletetime` int(100) NOT NULL,
  `emailerror` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `setting`
--

INSERT INTO `setting` (`id`, `deletetime`, `emailerror`) VALUES
(1, 2, 8);

-- --------------------------------------------------------

--
-- 資料表結構 `settinggroup`
--

CREATE TABLE `settinggroup` (
  `id` int(11) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `settingstation`
--

CREATE TABLE `settingstation` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `station` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tohome` int(100) NOT NULL,
  `stationchief` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `settingstation`
--

INSERT INTO `settingstation` (`id`, `status`, `station`, `tohome`, `stationchief`) VALUES
(1, 1, '7A', 7, 'test_7A'),
(2, 1, '9ES', 10, 'test9Es'),
(4, 1, '9EN', 3, 'test9EN'),
(5, 1, '10ES', 10, 'test10ES'),
(7, 1, '10A', 1, '10A_test');

-- --------------------------------------------------------

--
-- 資料表結構 `stations`
--

CREATE TABLE `stations` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `privilegeof7A` tinyint(1) NOT NULL,
  `privilegeof9ES` tinyint(1) NOT NULL,
  `privilegeof9EN` tinyint(1) NOT NULL,
  `privilegeof10A` tinyint(1) NOT NULL,
  `privilegeof10ES` tinyint(1) NOT NULL,
  `privilegeof13ES` tinyint(1) NOT NULL,
  `privilegeof13EN` tinyint(1) NOT NULL,
  `privilegeof21ES` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `typeofroles`
--

CREATE TABLE `typeofroles` (
  `id` int(100) NOT NULL,
  `typeofroles` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `privilegeof7A` tinyint(1) NOT NULL,
  `privilegeof9ES` tinyint(1) NOT NULL,
  `privilegeof9EN` tinyint(1) NOT NULL,
  `privilegeof10A` tinyint(1) NOT NULL,
  `privilegeof10ES` tinyint(1) NOT NULL,
  `privilegeof13ES` tinyint(1) NOT NULL,
  `privilegeof13EN` tinyint(1) NOT NULL,
  `privilegeof21ES` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `typeofroles`
--

INSERT INTO `typeofroles` (`id`, `typeofroles`, `privilegeof7A`, `privilegeof9ES`, `privilegeof9EN`, `privilegeof10A`, `privilegeof10ES`, `privilegeof13ES`, `privilegeof13EN`, `privilegeof21ES`) VALUES
(27, '10A_USER', 0, 0, 0, 1, 0, 0, 0, 0),
(33, '最高權限', 1, 1, 1, 1, 1, 1, 1, 1),
(34, '7A_USER', 1, 0, 0, 0, 0, 0, 0, 0),
(35, '9ES_USER', 0, 1, 0, 0, 0, 0, 0, 0),
(36, '9EN_USER', 0, 0, 1, 0, 0, 0, 0, 0),
(37, '10ES_USER', 0, 0, 0, 0, 1, 0, 0, 0),
(38, '13ES_USER', 0, 0, 0, 0, 0, 1, 0, 0),
(39, '13EN_USER', 0, 0, 0, 0, 0, 0, 1, 0),
(40, '21ES_USER', 0, 0, 0, 0, 0, 0, 0, 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- 資料表索引 `accounts_nurses`
--
ALTER TABLE `accounts_nurses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_nurse` (`accounts_nurses`);

--
-- 資料表索引 `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- 資料表索引 `adminuserinformation`
--
ALTER TABLE `adminuserinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- 資料表索引 `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `firesetting`
--
ALTER TABLE `firesetting`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `floorphone`
--
ALTER TABLE `floorphone`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `iptable`
--
ALTER TABLE `iptable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipaddress` (`ipaddress`);

--
-- 資料表索引 `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_nurses` (`accounts_nurses`);

--
-- 資料表索引 `pofadminuser`
--
ALTER TABLE `pofadminuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `pofadminuserinformation`
--
ALTER TABLE `pofadminuserinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `pofbulletin`
--
ALTER TABLE `pofbulletin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `poffiresetting`
--
ALTER TABLE `poffiresetting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `poffloorphone`
--
ALTER TABLE `poffloorphone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `pofnurses`
--
ALTER TABLE `pofnurses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `pofsetthinggroup`
--
ALTER TABLE `pofsetthinggroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `pofsetting`
--
ALTER TABLE `pofsetting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `pofsettingstation`
--
ALTER TABLE `pofsettingstation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 資料表索引 `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `settinggroup`
--
ALTER TABLE `settinggroup`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `settingstation`
--
ALTER TABLE `settingstation`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- 資料表索引 `typeofroles`
--
ALTER TABLE `typeofroles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeofroles` (`typeofroles`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表 AUTO_INCREMENT `accounts_nurses`
--
ALTER TABLE `accounts_nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用資料表 AUTO_INCREMENT `adminuserinformation`
--
ALTER TABLE `adminuserinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表 AUTO_INCREMENT `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表 AUTO_INCREMENT `firesetting`
--
ALTER TABLE `firesetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `floorphone`
--
ALTER TABLE `floorphone`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `iptable`
--
ALTER TABLE `iptable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- 使用資料表 AUTO_INCREMENT `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `pofadminuser`
--
ALTER TABLE `pofadminuser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表 AUTO_INCREMENT `pofadminuserinformation`
--
ALTER TABLE `pofadminuserinformation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表 AUTO_INCREMENT `pofbulletin`
--
ALTER TABLE `pofbulletin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表 AUTO_INCREMENT `poffiresetting`
--
ALTER TABLE `poffiresetting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表 AUTO_INCREMENT `poffloorphone`
--
ALTER TABLE `poffloorphone`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表 AUTO_INCREMENT `pofnurses`
--
ALTER TABLE `pofnurses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表 AUTO_INCREMENT `pofsetthinggroup`
--
ALTER TABLE `pofsetthinggroup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- 使用資料表 AUTO_INCREMENT `pofsetting`
--
ALTER TABLE `pofsetting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表 AUTO_INCREMENT `pofsettingstation`
--
ALTER TABLE `pofsettingstation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表 AUTO_INCREMENT `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `settinggroup`
--
ALTER TABLE `settinggroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `settingstation`
--
ALTER TABLE `settingstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `typeofroles`
--
ALTER TABLE `typeofroles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
