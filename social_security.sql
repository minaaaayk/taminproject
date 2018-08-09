-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2018 at 07:51 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_security`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_name`
--

CREATE TABLE `tbl_access_name` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_access_name`
--

INSERT INTO `tbl_access_name` (`id`, `name`) VALUES
(0, 'عمومی'),
(1, ' مدیرت کاربران'),
(2, 'مدیرت فروم ها'),
(3, ' مشاهده ی log ها'),
(4, 'مدیریت قوانین'),
(5, 'دریافت صورت جلسه'),
(6, 'حاشیه نویسی'),
(7, 'نظر دادن در فروم ها'),
(8, 'مرتبط سازی موضوعات'),
(9, 'مشاهده نظرات');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amendment`
--

CREATE TABLE `tbl_amendment` (
  `Am_id` int(4) NOT NULL,
  `parent_txt_id` int(4) NOT NULL,
  `txt_id` int(4) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aticle`
--

CREATE TABLE `tbl_aticle` (
  `A_id` int(4) NOT NULL,
  `num` int(4) NOT NULL,
  `part_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aticle`
--

INSERT INTO `tbl_aticle` (`A_id`, `num`, `part_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bylaw`
--

CREATE TABLE `tbl_bylaw` (
  `BLaw_id` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `id_marja_tasvib` int(4) NOT NULL,
  `Date_tasvib` date NOT NULL,
  `Date_ejra` date NOT NULL,
  `fortype` enum('law','article','note') NOT NULL,
  `law_id` int(4) DEFAULT NULL,
  `A_id` int(4) DEFAULT NULL,
  `N_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_captcha`
--

CREATE TABLE `tbl_captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `A_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_state` tinyint(1) NOT NULL DEFAULT '0',
  `comment_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_law`
--

CREATE TABLE `tbl_law` (
  `Law_id` int(4) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL DEFAULT 'بدون عنوان',
  `type` enum('عادی','اساسی','احکام و نظام نامه') CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Date_tasvib` date NOT NULL,
  `id_marja_tasvib` int(4) DEFAULT '0',
  `Date_eblagh` date DEFAULT NULL,
  `num_eblagh` int(10) DEFAULT '0',
  `Date_enteshar` date DEFAULT NULL,
  `Date_emza` date DEFAULT NULL,
  `Date_taeid` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_law`
--

INSERT INTO `tbl_law` (`Law_id`, `title`, `type`, `Date_tasvib`, `id_marja_tasvib`, `Date_eblagh`, `num_eblagh`, `Date_enteshar`, `Date_emza`, `Date_taeid`, `status`) VALUES
(1, 'قانون تست', 'عادی', '2018-04-24', 12, '2018-04-18', 44, '2018-04-09', '2018-04-16', '2018-04-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hash_pass` text NOT NULL,
  `salt_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `hash_pass`, `salt_pass`) VALUES
(2, 2, 'minaaayk', 'b56ad56285cd6064e263c6516273305bb6e867b9', 'X6aCW6cw'),
(3, 3, 'aliahmadiiii', '1a7aa54f8cf936b95a685b1f9b9701a6b0aad169', '7bx,Xji2'),
(4, 4, 'm-nassiri', 'ee0a8dda3ebfd3ff3fd0ef08943302b28c249a29', 'M6KyBTAt'),
(5, 5, 'dr-rezvani', 'e469a3ee95f59f756143be94c8504f41bb1932b3', 'c4p9ssKj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marja_tavib`
--

CREATE TABLE `tbl_marja_tavib` (
  `id` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `priority` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marja_tavib`
--

INSERT INTO `tbl_marja_tavib` (`id`, `title`, `active`, `priority`) VALUES
(1, 'كميسيون بهداري مجلس شوراي اسلامي ', 1, 0),
(2, 'انجمن موبدان تهران ', 1, 0),
(3, 'خبرگان رهبري ', 1, 1),
(4, 'خبرگان و شوراي بازنگري قانون اساسي ', 1, 0),
(5, 'دولت در زمان فترت ', 1, 0),
(6, 'رئيس ستاد كل نيروهاي مسلح ', 1, 0),
(7, 'شوراي انقلاب جمهوري اسلامي ايران ', 1, 0),
(8, 'شوراي توسعه فرهنگ قرآني', 1, 0),
(9, 'شوراي عالي امنيت ملي ', 1, 0),
(10, ' 	شوراي عالي انقلاب فرهنگي ', 1, 0),
(11, 'شوراي عالي پشتيباني جنگ', 1, 0),
(12, 'شوراي نگهبان ', 1, 1),
(13, ' 	فرمانده كل قوا', 0, 0),
(14, 'كميسيون امور قضايي و حقوقي مجلس ', 1, 0),
(15, 'كميسيون آموزش و تحقيقات مجلس شوراي اسلامي ', 1, 0),
(16, 'كميسيون اجتماعي مجلس ', 1, 0),
(17, 'كميسيون اداري واستخدامي وپست ونيروي مجلس ', 1, 0),
(18, 'كميسيون اقتصادي مجلس شوراي اسلامي ', 1, 0),
(19, 'كميسيون امور اداري و استخدامي مجلس شوراي اسلامي', 1, 0),
(20, 'كميسيون امور دفاعي مجلس شوراي اسلامي ', 1, 0),
(21, 'كميسيون انرژي مجلس شوراي سلامي ', 1, 0),
(22, 'كميسيون برنامه مجلس شوراي ملي ', 1, 0),
(23, 'كميسيون برنامه و بودجه و محاسبات مجلس شوراي اسلامي ', 1, 0),
(24, 'كميسيون بودجه مجلس شوراي ملي ', 1, 0),
(25, 'كميسيون دارايي مجلس سنا ', 0, 0),
(26, 'كميسيون صنايع و معادن مجلس شوراي اسلامي ', 1, 0),
(27, 'كميسيون فرهنگ مجلس شوراي ملّي ', 1, 0),
(28, 'كميسيون مجلس ', 1, 1),
(29, 'كميسيون مجلس سنا ', 1, 0),
(30, 'كميسيون مجلس شوراي ملي', 1, 0),
(31, ' 	كميسيون مشترك بهداري', 1, 0),
(32, 'كميسيون مشترك اجتماعي و امنيت ملي و سياست خارجي و برنامه و بودجه و محاسبات مجلس شوراي اسلامي ', 1, 0),
(33, 'كميسيون مشترك اقتصاد مجلسين ', 1, 0),
(34, 'كميسيون مشترك كشاورزي مجلسين ', 1, 0),
(35, 'كميسيون مشترك مجلسين', 1, 0),
(36, 'كميسيون هاي 1و2 شوراي عالي انقلاب فرهنگي ', 1, 0),
(37, 'كميسيون هاي مشترك دادگستري مجلسين ', 1, 0),
(38, 'كميسيونهاي مشترك اقتصاد و دارايي مجلسين سناوشورا ', 1, 0),
(39, 'كمييسيون هاي مشترك دادگستري ', 1, 0),
(40, ' 	مجلس خبرگان رهبري', 1, 1),
(41, 'مجلس سنا ', 1, 0),
(42, 'مجلس شوراي اسلامي', 1, 1),
(43, 'مجلس شوراي ملي ', 1, 0),
(44, 'مجلس مؤسسان ', 1, 0),
(45, ' 	مجمع تشخيص مصلحت نظام', 1, 1),
(46, ' 	معاون سرمايه انساني رئيس جمهور', 1, 0),
(47, ' 	مقام معظم رهبري', 1, 1),
(48, 'مقام معظم رهبري ( فرماندهي كل قوا ) ', 1, 1),
(49, 'مقامات روحاني و هيأت هاي مديره كليساهاي پروتستان ', 1, 0),
(50, 'همه پرسي ', 1, 0),
(51, 'هيات وزيران (دوره فترت)', 1, 0),
(52, 'وزراي عضو شوراي هماهنگي مناطق آزاد تجاري -صنعتي و ويژه اقتصادي ', 1, 0),
(53, ' 	وزير عدليه (داور)', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `access_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `acive` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `access_id`, `title`, `uri`, `parent_id`, `acive`) VALUES
(1, 1, 'مدیرت کاربران', NULL, NULL, '0'),
(2, 1, 'مشاهده اطلاعات کاربران', 'users/admin/show_users', 1, '1'),
(3, 1, 'افزودن کاربر', 'users/admin/add_user', 1, '1'),
(4, 1, 'حدف کاربران', 'users/admin/remove_users', 1, '0'),
(5, 1, 'ویرایش کاربر', 'users/admin/edit_user', 1, '0'),
(6, 1, 'تغییر کلمه عبور کاربر', 'users/admin/change_pass_user', 1, '0'),
(7, 2, 'مدیرت فروم ها', NULL, NULL, '0'),
(8, 2, 'مشاهده فروم ها', 'users/admin/show_all_forum', 7, '0'),
(9, 2, 'ایجاد فروم', 'users/admin/add_forum', 7, '0'),
(10, 2, 'حذف فروم', 'users/admin/remove_forum', 7, '0'),
(11, 3, 'مدیریت لاگ ها', 'users/admin/show_logs', NULL, '0'),
(12, 4, 'مدیریت قوانین و آیین نامه ها', NULL, NULL, '0'),
(13, 4, 'افزودن', 'users/employee/add_some', 12, '1'),
(14, 4, 'حذف کردن', 'users/employee/remove_some', 12, '1'),
(15, 5, 'دریافت صورت جلسه', 'users/employee/get_records', NULL, '0'),
(16, 8, 'مرتبط سازی موضوعات', 'users/expert/connection_some', NULL, '1'),
(17, 0, 'ویرایش اطلاعات شخصی', 'users/public/edit_user', NULL, '0'),
(18, 0, 'تغییر کلمه عبور', 'users/public/change_pass', NULL, '0'),
(19, 0, 'جست و جوی پیشرفته', 'search/index', NULL, '0'),
(20, 0, 'مشاهده ی قوانین و ...', NULL, NULL, '0'),
(21, 0, 'قوانین', 'users/general/show_law', 20, '1'),
(22, 0, 'آیین نامه ها', 'users/general/show_bylaw', 20, '0'),
(23, 0, 'بخش نامه ها', 'users/general/show_circulars', 20, '0'),
(24, 0, 'اصلاحیه ها', 'users/general/show_corrigendum', 20, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_middle_txt`
--

CREATE TABLE `tbl_middle_txt` (
  `txt_id` int(4) NOT NULL,
  `parent_id` int(4) NOT NULL,
  `type_txt_id` int(3) NOT NULL,
  `id_marja_tasvib_txt` tinyint(3) DEFAULT NULL,
  `Date_tasvib_txt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_middle_txt`
--

INSERT INTO `tbl_middle_txt` (`txt_id`, `parent_id`, `type_txt_id`, `id_marja_tasvib_txt`, `Date_tasvib_txt`) VALUES
(60, 1, 1, 12, NULL),
(61, 1, 2, 12, NULL),
(62, 2, 2, 12, NULL),
(63, 3, 2, 12, NULL),
(64, 2, 1, 12, NULL),
(65, 4, 2, 12, NULL),
(66, 3, 1, 12, NULL),
(67, 5, 2, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note`
--

CREATE TABLE `tbl_note` (
  `N_id` int(4) NOT NULL,
  `num` int(4) NOT NULL,
  `article_id` int(4) NOT NULL,
  `paragraph_flag` tinyint(1) NOT NULL DEFAULT '0',
  `parent_paragraph_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_note`
--

INSERT INTO `tbl_note` (`N_id`, `num`, `article_id`, `paragraph_flag`, `parent_paragraph_id`) VALUES
(1, 1, 1, 1, 3),
(2, 2, 1, 1, 3),
(3, 3, 1, 1, 11),
(4, 1, 2, 0, NULL),
(5, 1, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paragraph`
--

CREATE TABLE `tbl_paragraph` (
  `paragraph_id` int(4) NOT NULL,
  `txt` text NOT NULL,
  `num_or_partName` enum('abjad','number') NOT NULL,
  `name_list` varchar(10) NOT NULL,
  `parent_id_txt` int(4) DEFAULT NULL,
  `parent_id_paragraph` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_paragraph`
--

INSERT INTO `tbl_paragraph` (`paragraph_id`, `txt`, `num_or_partName`, `name_list`, `parent_id_txt`, `parent_id_paragraph`) VALUES
(1, 'عه سلام عه سلام عه سلام\r', 'number', '1', 1, NULL),
(2, 'خوبی خوبی خوبی خوبی\r', 'number', '2', 1, NULL),
(3, 'چطوری چطوری چطوری چطوری چطوری چطوری\r', 'number', '3', 1, NULL),
(4, 'پدر پدر پدر پدر پدر پدر پدر پدر پدر پدر پدر پدر پدر\r', 'abjad', 'الف', 3, NULL),
(5, 'سن سن سن سن سن سن سن سن سن سن سن سن\r', 'abjad', 'ب', 3, NULL),
(6, 'مم مم مم مم مم مم مم مم \r', 'number', '1', NULL, 5),
(7, 'نن نن نن نن نن نن نن نن \r', 'number', '2', NULL, 5),
(8, 'هه هه هه هه هه هه هه هه \r', 'number', '3', NULL, 5),
(9, 'دارد دارد دارد دارد دارد دارد دارد\r', 'abjad', 'ج', 3, NULL),
(10, 'قو قو قو قو قو قو قو قو \r', 'number', '4', 1, NULL),
(11, 'کو کو کو کو کو کو کو کو کو کو \r', 'number', '5', 1, NULL),
(12, 'ححححححححححححححححححححح\r', 'number', '1', 7, NULL),
(13, 'خخخخخخخخخخخخخخخخخخخخخخخخخخخ\r', 'number', '2', 7, NULL),
(14, 'ددددددددددددددددددددددددددددددددددد\r', 'number', '3', 7, NULL),
(15, 'ذذذذذذذذذذذذذذذ\r', 'number', '4', 7, NULL),
(16, 'ححححححححححححححححححححح\r', 'number', '1', 8, NULL),
(17, 'خخخخخخخخخخخخخخخخخخخخخخخخخخخ\r', 'number', '2', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_part`
--

CREATE TABLE `tbl_part` (
  `Part_id` int(4) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL DEFAULT 'بدون عنوان',
  `type` enum('فصل','بخش') CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `num` int(4) DEFAULT NULL,
  `parent` enum('law','blaw') NOT NULL DEFAULT 'law',
  `blaw_id` int(4) DEFAULT NULL,
  `law_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_part`
--

INSERT INTO `tbl_part` (`Part_id`, `title`, `type`, `num`, `parent`, `blaw_id`, `law_id`) VALUES
(1, 'بدون عنوان', 'فصل', 0, 'law', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `access_level` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `type`, `access_level`, `user_id`) VALUES
(1, 1, '1 2 3', 2),
(2, 1, '1 2 3', 3),
(3, 2, '4 5', 4),
(4, 3, '4 6 7 8', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_text`
--

CREATE TABLE `tbl_text` (
  `id` int(4) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `parent_txt_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_text`
--

INSERT INTO `tbl_text` (`id`, `text`, `parent_txt_id`) VALUES
(1, 'اااااااااا اااااااااااااااااااااا ااااااااااااااااااااا\r</br>ببببببببببببببببببببببببببببببببببببببببببببببببببب\r', 60),
(2, 'تتتتتتتتتتتتتتتتتتتت\r', 61),
(3, 'ثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثث\r', 62),
(4, 'سلام سلام سلام سلام سلام\r', 62),
(5, 'پپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپپ\r', 63),
(6, 'جججججججججججججججججججججججججججج\r</br>ها ها ها ها ها ها ها ها ها ها ها ها ها ها ها ها ها ها ها ها\r', 64),
(7, 'چچچچچچچچچچچچچچچچچچچچچچچچچچ\r', 65),
(8, 'به باه به به: \r\n</br> در در در در در در در در در در در در در در \r\n</br> فرزندان فرزندان: فرزندان فرزندان\r\n</br> مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر مادر\r\n', 66),
(9, 'فرد فرد فرد فرد فرد فرد فرد فرد فرد فرد فرد فرد\r', 66),
(10, 'از از از از از از از از از از از از از از از از از از از از از از از از از از از \r', 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_txt`
--

CREATE TABLE `tbl_type_txt` (
  `type_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_txt`
--

INSERT INTO `tbl_type_txt` (`type_id`, `name`) VALUES
(1, 'ماده'),
(2, 'تبصره'),
(3, 'اصلاحیه'),
(7, 'بخشنامه');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_user`
--

CREATE TABLE `tbl_type_user` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_user`
--

INSERT INTO `tbl_type_user` (`id`, `title`) VALUES
(1, 'ادمین'),
(2, 'کارمند'),
(3, 'کارشناس حقوقی');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `family` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `family`, `email`) VALUES
(2, 'مینا', 'یعقوبی کیا', 'mina.yaghoobi@gmail.com'),
(3, 'علی', 'احمدی', 'ali.ahmadi@gmail.com'),
(4, 'دکتر', 'نصیری', 'dr.nasiri@gmail.com'),
(5, 'دکتر ', 'رضوانی', 'dr.rezvani@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access_name`
--
ALTER TABLE `tbl_access_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_amendment`
--
ALTER TABLE `tbl_amendment`
  ADD PRIMARY KEY (`Am_id`),
  ADD KEY `FK_Aparent_txt_id` (`parent_txt_id`),
  ADD KEY `FK_A_txt_id` (`txt_id`);

--
-- Indexes for table `tbl_aticle`
--
ALTER TABLE `tbl_aticle`
  ADD PRIMARY KEY (`A_id`),
  ADD KEY `FK_part_id` (`part_id`);

--
-- Indexes for table `tbl_bylaw`
--
ALTER TABLE `tbl_bylaw`
  ADD PRIMARY KEY (`BLaw_id`),
  ADD KEY `FK_b_l` (`law_id`),
  ADD KEY `FK_b_a` (`A_id`),
  ADD KEY `FK_b_n` (`N_id`),
  ADD KEY `FK_mt_blaw` (`id_marja_tasvib`);

--
-- Indexes for table `tbl_captcha`
--
ALTER TABLE `tbl_captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id_fk` (`A_id`);

--
-- Indexes for table `tbl_law`
--
ALTER TABLE `tbl_law`
  ADD PRIMARY KEY (`Law_id`),
  ADD KEY `FK_mt_law` (`id_marja_tasvib`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `tbl_marja_tavib`
--
ALTER TABLE `tbl_marja_tavib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_menu_id_fk` (`parent_id`),
  ADD KEY `access_id_fk` (`access_id`);

--
-- Indexes for table `tbl_middle_txt`
--
ALTER TABLE `tbl_middle_txt`
  ADD PRIMARY KEY (`txt_id`),
  ADD KEY `FK_type_txt` (`type_txt_id`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`N_id`),
  ADD KEY `FK_article_id` (`article_id`),
  ADD KEY `parent_pargr_id_fk` (`parent_paragraph_id`);

--
-- Indexes for table `tbl_paragraph`
--
ALTER TABLE `tbl_paragraph`
  ADD PRIMARY KEY (`paragraph_id`),
  ADD KEY `FK_parent_paragraph_id` (`parent_id_paragraph`),
  ADD KEY `parent_txt_id_fk` (`parent_id_txt`);

--
-- Indexes for table `tbl_part`
--
ALTER TABLE `tbl_part`
  ADD PRIMARY KEY (`Part_id`),
  ADD KEY `FK_law_id` (`law_id`),
  ADD KEY `FK_blaw_id` (`blaw_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_role_fk` (`user_id`),
  ADD KEY `type_user_role_fk` (`type`);

--
-- Indexes for table `tbl_text`
--
ALTER TABLE `tbl_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_txt_id` (`parent_txt_id`);

--
-- Indexes for table `tbl_type_txt`
--
ALTER TABLE `tbl_type_txt`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_type_user`
--
ALTER TABLE `tbl_type_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_name`
--
ALTER TABLE `tbl_access_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_amendment`
--
ALTER TABLE `tbl_amendment`
  MODIFY `Am_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_aticle`
--
ALTER TABLE `tbl_aticle`
  MODIFY `A_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bylaw`
--
ALTER TABLE `tbl_bylaw`
  MODIFY `BLaw_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_captcha`
--
ALTER TABLE `tbl_captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_law`
--
ALTER TABLE `tbl_law`
  MODIFY `Law_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_marja_tavib`
--
ALTER TABLE `tbl_marja_tavib`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_middle_txt`
--
ALTER TABLE `tbl_middle_txt`
  MODIFY `txt_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tbl_note`
--
ALTER TABLE `tbl_note`
  MODIFY `N_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_paragraph`
--
ALTER TABLE `tbl_paragraph`
  MODIFY `paragraph_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_part`
--
ALTER TABLE `tbl_part`
  MODIFY `Part_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_text`
--
ALTER TABLE `tbl_text`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_type_txt`
--
ALTER TABLE `tbl_type_txt`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_type_user`
--
ALTER TABLE `tbl_type_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_amendment`
--
ALTER TABLE `tbl_amendment`
  ADD CONSTRAINT `FK_A_txt_id` FOREIGN KEY (`txt_id`) REFERENCES `tbl_middle_txt` (`txt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Aparent_txt_id` FOREIGN KEY (`parent_txt_id`) REFERENCES `tbl_middle_txt` (`txt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_aticle`
--
ALTER TABLE `tbl_aticle`
  ADD CONSTRAINT `FK_part_id` FOREIGN KEY (`part_id`) REFERENCES `tbl_part` (`Part_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bylaw`
--
ALTER TABLE `tbl_bylaw`
  ADD CONSTRAINT `FK_b_a` FOREIGN KEY (`A_id`) REFERENCES `tbl_aticle` (`A_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_b_l` FOREIGN KEY (`law_id`) REFERENCES `tbl_law` (`Law_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_b_n` FOREIGN KEY (`N_id`) REFERENCES `tbl_note` (`N_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mt_blaw` FOREIGN KEY (`id_marja_tasvib`) REFERENCES `tbl_marja_tavib` (`id`);

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `article_id_fk` FOREIGN KEY (`A_id`) REFERENCES `tbl_aticle` (`A_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_law`
--
ALTER TABLE `tbl_law`
  ADD CONSTRAINT `FK_mt_law` FOREIGN KEY (`id_marja_tasvib`) REFERENCES `tbl_marja_tavib` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `access_id_fk` FOREIGN KEY (`access_id`) REFERENCES `tbl_access_name` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_menu_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `tbl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_middle_txt`
--
ALTER TABLE `tbl_middle_txt`
  ADD CONSTRAINT `FK_type_txt` FOREIGN KEY (`type_txt_id`) REFERENCES `tbl_type_txt` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD CONSTRAINT `FK_article_id` FOREIGN KEY (`article_id`) REFERENCES `tbl_aticle` (`A_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_pargr_id_fk` FOREIGN KEY (`parent_paragraph_id`) REFERENCES `tbl_paragraph` (`paragraph_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paragraph`
--
ALTER TABLE `tbl_paragraph`
  ADD CONSTRAINT `FK_parent_paragraph_id` FOREIGN KEY (`parent_id_paragraph`) REFERENCES `tbl_paragraph` (`paragraph_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_txt_id_fk` FOREIGN KEY (`parent_id_txt`) REFERENCES `tbl_text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_part`
--
ALTER TABLE `tbl_part`
  ADD CONSTRAINT `FK_blaw_id` FOREIGN KEY (`blaw_id`) REFERENCES `tbl_bylaw` (`BLaw_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_law_id` FOREIGN KEY (`law_id`) REFERENCES `tbl_law` (`Law_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD CONSTRAINT `type_user_role_fk` FOREIGN KEY (`type`) REFERENCES `tbl_type_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_role_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_text`
--
ALTER TABLE `tbl_text`
  ADD CONSTRAINT `FK_txt_id` FOREIGN KEY (`parent_txt_id`) REFERENCES `tbl_middle_txt` (`txt_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
