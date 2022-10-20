-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 24, 2022 at 02:30 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `law`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_000000_create_users_table', 2),
(8, '2020_11_13_143436_create_papers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `authors` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `present` tinyint(4) NOT NULL,
  `topic` tinyint(4) NOT NULL,
  `abstract_word` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract_pdf` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract_word2` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract_pdf2` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullpaper_word` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullpaper_pdf` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullpaper_word2` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullpaper_pdf2` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paper_status` tinyint(4) NOT NULL,
  `result_abs` tinyint(4) DEFAULT NULL,
  `confirm` tinyint(4) DEFAULT NULL,
  `result_full` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `user_id`, `title`, `authors`, `present`, `topic`, `abstract_word`, `abstract_pdf`, `abstract_word2`, `abstract_pdf2`, `fullpaper_word`, `fullpaper_pdf`, `fullpaper_word2`, `fullpaper_pdf2`, `poster`, `paper_status`, `result_abs`, `confirm`, `result_full`, `created_at`, `updated_at`) VALUES
(3, 7, 'ความหมาย วัตถุประสงค์และมูลเหตุการจัดเก็บภาษีจากการท่องเที่ยว', 'กฤษรัตน์ ศรีสว่าง , ชลีรัตน์ มเหสักขกุล , ชัยยุทธ ถาวรานุรักษ์  และจิรนันท์ ไชยบุปผา', 1, 2, NULL, NULL, NULL, NULL, '7_1648180863.docx', '7_1648180863.pdf', NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-03-25 04:01:03', '2022-03-25 04:01:03'),
(4, 7, 'ข้อพิจารณาและกฎเกณฑ์บางประการที่เกี่ยวข้องกับวารสารกฎหมาย', 'กฤษรัตน์ ศรีสว่าง  และจันทิรา จันทรโชติ', 1, 1, NULL, NULL, NULL, NULL, '7_1648458272.docx', '7_1648458273.pdf', NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-03-28 09:04:33', '2022-03-28 09:04:33'),
(5, 9, 'มาตรการทางกฎหมายในการคุ้มครองการเล่นแชร์ออนไลน์', 'ชญากานต์ คุ่มเคี่ยม,  ชนวีร์ ตาหงส์,  ชนัญชิดา แก้วรุ่ง,  ชนันดา คงดำ,  ชนาธรณ์ สาบก,  ชนิกานต์ ชัยณรงค์', 1, 1, NULL, NULL, NULL, NULL, '9_1649478633.docx', '9_1649478633.pdf', NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-09 04:30:33', '2022-04-09 04:30:33'),
(6, 11, 'ปัญหาทางกฎหมายในการที่หน่วยงานของรัฐเข้าถือหุ้นของบริษัทจดทะเบียน ในตลาดหลักทรัพย์จนทำให้มีสถานะเป็นรัฐวิสาหกิจ', 'นายกฤษฎา  คงประดิษฐ์งาม พนักงานคดีปกครอง สำนักงานศาลปกครองกลาง นักศึกษาปริญญาโท คณะนิติศาสตร์ มธ.', 1, 1, NULL, NULL, NULL, NULL, '11_1649666323.doc', '11_1649666323.pdf', NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-11 08:38:43', '2022-04-11 08:38:43'),
(7, 13, 'ปัญหาการทำแท้งของคนต่างชาติในประเทศไทย', 'อัครชัย หนูราช, อังคณา สงจันทร์, อัจจิรา หนูพรหม, อัจฉรา บุญทอง, อัญญกานต์ จันทรสวัสดิ์, อัญมณี ขาวมาก', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13_1649927903.pdf', 1, NULL, NULL, 0, '2022-04-13 10:19:33', '2022-04-14 09:18:23'),
(8, 12, 'การกำหนดรูปแบบความผิดที่ได้กระทำโดยประมาทจากการขับขี่', 'ปนัดดา รัตตนนท์  ปิยชาติ หงนิพนธ์  ปิยวัฒน์ หวานแก้ว  ฟารีดา ดอเลาะ  ภูธเนศ ทองมี  มัทนา แดงรักษ์  และปพนธีร์ ธีระพันธ์', 2, 1, '12_1650255693.doc', '12_1650255693.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-18 04:21:33', '2022-04-18 04:21:33'),
(9, 12, 'มาตรการทางกฎหมายเพื่อการชดเชยกรณีที่เที่ยวบินถูกยกเลิก', 'สวรินทร์ เพชรนู  สายชล ปาลาเลย์  สายนที บุญโท  สาริณี สุวรรณมณี  สิทธินันท์ จันทร์แก้ว  สิทธิพจน์ แก้วมุณี  และปพนธีร์ ธีระพันธ์', 2, 1, '12_1650256087.doc', '12_1650256087.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-18 04:28:07', '2022-04-18 04:28:07'),
(10, 15, 'กฎหมายเกี่ยวกับการควบคุมปริมาณการเพาะปลูกพืชกัญชาและผลิตยาที่มีสารสกัดกัญชาของแพทย์พื้นบ้าน', 'ผู้ช่วยศาสตราจารย์จินตนา อุณหะไวทยะ, อาจารย์สิณิษฐา ดิษฐปาน', 2, 1, '15_1650336017.docx', '15_1650336017.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-19 02:40:17', '2022-04-19 02:40:17'),
(11, 20, 'LGBT ที่ถูกเลือกปฏิบัติในอาชีพข้าราชการ', 'สุชาวัลย์ พันธเกตุ,สุนิษา ทับพรหม,สุทธิกานต์ ผดุงศักดิ์,สุทธิรัตน์ ขุนรองชู และ สุทิวัส ปราบปราม คณะนิติศาสตร์', 1, 1, NULL, NULL, NULL, NULL, '20_1650375687.docx', '20_1650375687.pdf', NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-19 13:41:27', '2022-04-19 13:41:27'),
(12, 21, 'ปัญหาความไม่เท่าเทียมของกลุ่ม LGBTQ ในการทำงาน', 'วรศักดิ์ ไชยภักดี, วริศรา สุคนธรัตน์, วัชรพงศ์ ทองพิมพ์, วารินทร์ ขวัญพิทักษ์และ ศศินา เลิศวงหัส/คณะนิติศาสตร์', 2, 1, '21_1650441161.docx', '21_1650441161.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-20 07:52:41', '2022-04-20 07:52:41'),
(13, 13, 'คำนำหน้านามของหญิงชาย', 'กชกร เกื้อเพชร, กชกร สมานอารีรักษ์, กชวรรณ จินดาเพ็ชร, กนกพล แดงวังหมาก, กนกวรรณ ระเห็ดหาญ, กนิษฐา  สังข์มี, นีสรีน เจ๊ะยิ', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13_1650443391.pdf', 1, NULL, NULL, 0, '2022-04-20 08:29:51', '2022-04-20 08:29:51'),
(14, 22, 'มาตรการทางกฎหมายในการป้องกันการปลอมแปลงบัญชีเฟซบุ๊ก', 'นิติศาสตร์', 1, 1, NULL, NULL, NULL, NULL, '22_1650458938.docx', '22_1650458938.pdf', NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-04-20 12:48:58', '2022-04-20 12:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer_abs`
--

CREATE TABLE `paper_reviewer_abs` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `s11` tinyint(4) DEFAULT NULL,
  `s21` tinyint(4) DEFAULT NULL,
  `s22` tinyint(4) DEFAULT NULL,
  `s23` tinyint(4) DEFAULT NULL,
  `c11` text COLLATE utf8_unicode_ci,
  `c21` text COLLATE utf8_unicode_ci,
  `c22` text COLLATE utf8_unicode_ci,
  `c23` text COLLATE utf8_unicode_ci,
  `comment` text COLLATE utf8_unicode_ci,
  `filename` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` tinyint(4) DEFAULT NULL,
  `approve` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_reviewer_abs`
--

INSERT INTO `paper_reviewer_abs` (`id`, `paper_id`, `rev_id`, `s11`, `s21`, `s22`, `s23`, `c11`, `c21`, `c22`, `c23`, `comment`, `filename`, `result`, `approve`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 1, 2, 3, 1, 'aa', 'bb', 'cc', 'dd', 'ee', NULL, 2, 0, '2022-04-23 09:20:02', '2022-04-23 09:34:58'),
(2, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-04-23 09:20:02', '2022-04-23 09:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer_full`
--

CREATE TABLE `paper_reviewer_full` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `s11` tinyint(4) DEFAULT NULL,
  `s21` tinyint(4) DEFAULT NULL,
  `s22` tinyint(4) DEFAULT NULL,
  `s31` tinyint(4) DEFAULT NULL,
  `s32` tinyint(4) DEFAULT NULL,
  `s33` tinyint(4) DEFAULT NULL,
  `s41` tinyint(4) DEFAULT NULL,
  `s51` tinyint(4) DEFAULT NULL,
  `s52` tinyint(4) DEFAULT NULL,
  `s61` tinyint(4) DEFAULT NULL,
  `s62` tinyint(4) DEFAULT NULL,
  `s63` tinyint(4) DEFAULT NULL,
  `c11` text COLLATE utf8_unicode_ci,
  `c21` text COLLATE utf8_unicode_ci,
  `c22` text COLLATE utf8_unicode_ci,
  `c31` text COLLATE utf8_unicode_ci,
  `c32` text COLLATE utf8_unicode_ci,
  `c33` text COLLATE utf8_unicode_ci,
  `c41` text COLLATE utf8_unicode_ci,
  `c51` text COLLATE utf8_unicode_ci,
  `c52` text COLLATE utf8_unicode_ci,
  `c61` text COLLATE utf8_unicode_ci,
  `c62` text COLLATE utf8_unicode_ci,
  `c63` text COLLATE utf8_unicode_ci,
  `comment` text COLLATE utf8_unicode_ci,
  `filename` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` tinyint(4) DEFAULT '0',
  `approve` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_reviewer_full`
--

INSERT INTO `paper_reviewer_full` (`id`, `paper_id`, `rev_id`, `s11`, `s21`, `s22`, `s31`, `s32`, `s33`, `s41`, `s51`, `s52`, `s61`, `s62`, `s63`, `c11`, `c21`, `c22`, `c31`, `c32`, `c33`, `c41`, `c51`, `c52`, `c61`, `c62`, `c63`, `comment`, `filename`, `result`, `approve`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 2, 3, 1, 2, 3, 1, 2, 3, 1, 2, 3, 'aa', 'bb', 'cc', 'dd', 'ee', 'ff', 'gg', 'hh', 'ii', 'jj', 'kk', 'll', 'mm', NULL, 1, 0, '2022-04-21 08:06:51', '2022-04-23 09:05:22'),
(2, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-04-21 08:06:51', '2022-04-21 08:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer_poster`
--

CREATE TABLE `paper_reviewer_poster` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `s11` tinyint(4) DEFAULT NULL,
  `s21` tinyint(4) DEFAULT NULL,
  `s22` tinyint(4) DEFAULT NULL,
  `s23` tinyint(4) DEFAULT NULL,
  `c11` text COLLATE utf8_unicode_ci,
  `c21` text COLLATE utf8_unicode_ci,
  `c22` text COLLATE utf8_unicode_ci,
  `c23` text COLLATE utf8_unicode_ci,
  `comment` text COLLATE utf8_unicode_ci,
  `filename` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` tinyint(4) DEFAULT '0',
  `approve` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anucha.kh@gmail.com', '$2y$10$RFaR/c1qgs7qcqTdzynZgO/l5c6MPh7zla80eIYzT8DX.hyMdhigO', '2022-03-18 04:40:02'),
('anucha.k@tsu.ac.th', '$2y$10$CZYSiCSb1WK0wu6HSmVaG.6zT4APdwRB0Oy2y3Go.krEr6Qsy7DGi', '2022-03-22 02:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tdate` date NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pay_status` tinyint(4) NOT NULL,
  `book_no` int(11) DEFAULT NULL,
  `id_no` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `tdate`, `filename`, `pay_status`, `book_no`, `id_no`, `comment`, `created_at`, `updated_at`) VALUES
(1, 15, '1000.00', '2022-04-19', '15_1650339842.jpg', 2, NULL, NULL, NULL, '2022-04-19 03:44:02', '2022-04-20 05:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `university` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ss1` tinyint(4) NOT NULL,
  `ss2` tinyint(4) DEFAULT NULL,
  `ss3` tinyint(4) DEFAULT NULL,
  `ss4` tinyint(4) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `invite` tinyint(4) NOT NULL,
  `invite_full` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviewers`
--

INSERT INTO `reviewers` (`id`, `title`, `fname`, `lname`, `type`, `university`, `ss1`, `ss2`, `ss3`, `ss4`, `email`, `telephone`, `password`, `invite`, `invite_full`, `created_at`, `updated_at`) VALUES
(1, 'ผศ.ดร.', 'จิดาภา', 'พรยิ่ง', 1, 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ', 1, 2, NULL, NULL, 'jidapa.p@tsu.ac.th', '0863969661', '123456', 0, 1, '2022-04-08 08:09:27', '2022-04-21 08:08:47'),
(2, 'ผศ.', 'ศุภวีร์', 'เกลี้ยงจันทร์', 1, 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ', 1, 2, NULL, NULL, 'suphavee@tsu.ac.th', '0812737243', '123456', 0, 0, '2022-04-08 08:15:59', '2022-04-08 08:15:59'),
(3, 'ผศ.ดร.', 'กฤษรัตน์', 'ศรีสว่าง', 2, 'คณะนิติศาสตร์ มหาวิทยาลัยสงขลานครินทร์', 1, 2, NULL, NULL, 'Kritsarat.sr@gmail.com', '0878071721', '123456', 0, 0, '2022-04-09 04:19:11', '2022-04-09 04:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`) VALUES
(1, 'ด้านนิติศาสตร์'),
(2, 'ด้านสังคมศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `academic` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `register_type` tinyint(4) NOT NULL,
  `partner` tinyint(4) DEFAULT NULL,
  `org` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `academic`, `fname`, `lname`, `address`, `province`, `postcode`, `tel`, `register_type`, `partner`, `org`, `present`, `email`, `email_verified_at`, `password`, `isAdmin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'นาย', NULL, 'กฤษดา', 'สุวรรณการณ์', '222 ม.2', 'พัทลุง', '93110', '08-9870-4656', 4, NULL, 'มหาวิทยาลัยทักษิณ', 'Y', 'suwankarn@gmail.com', NULL, '$2y$10$dEIuMVF8vkv0uAQHsU4z0uciGy1Z5FnLTnIvnsHY6HVZwMySf.dki', 1, 1, NULL, '2022-03-16 09:29:50', '2022-03-17 08:41:27'),
(3, 'นาย', NULL, 'อนุชา', 'ขุนแก้ว', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ', 'สงขลา', '90000', '0894433547', 1, NULL, NULL, 'N', 'anucha.k@tsu.ac.th', NULL, '$2y$10$W5VPZlLBVYuNLsWiS6xroO4htdxNt6o8HfGyk/xm2X2MvVjXHa9fO', 1, 1, NULL, '2022-03-22 02:26:28', '2022-03-22 02:26:28'),
(4, 'นาง', 'ผศ.', 'ชลีรัตน์', 'มเหสักขกุล', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ 140 ถนนกาญจนวนิช หมู่ 4 ตำบลเขารูปช้าง อำเภอเมือง', 'สงขลา', '90000', '0841952877', 1, NULL, NULL, 'Y', 'chaleerath.m@tsu.ac.th', NULL, '$2y$10$w1PTrEtdwltZ97urX2FNweaKK3LJEwJaplLRnJc2N1Oc3hCNMjIvm', 1, 1, NULL, '2022-03-24 02:58:22', '2022-03-24 02:58:22'),
(5, 'นาย', NULL, 'พิธาน', 'ดลหมาน', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ 140 ม.4 ต.เขารูปช้าง อ.เมือง จ.สงขลา 90000', 'สงขลา', '90000', '095-9452647', 2, NULL, NULL, 'N', 'pithan.d@tsu.ac.th', NULL, '$2y$10$/cPhnaYdB2NwwaOIIw/fo.kyEbvZe7QWK2gbJM3Bf2EQc5gYOnKHC', 1, 1, NULL, '2022-03-24 03:43:35', '2022-03-24 03:43:35'),
(6, 'นาย', NULL, 'ยุทธชัย', 'ด้วงสวัสดิ์', '140 หมู่ 4 ต.เขารูปช้าง อ. เมืองสงขลา จ.สงขลา', 'สงขลา', '90000', '0937501171', 1, NULL, NULL, 'N', 'yutthachai.d@tsu.ac.th', NULL, '$2y$10$NIVN6PkGjH6GXo22yz/lV.GtKWTO38v7HVdwiIfzhssfXZo61jbHu', 1, 1, NULL, '2022-03-24 04:45:30', '2022-03-24 04:45:30'),
(7, 'นาย', 'ผศ.ดร.', 'กฤษรัตน์', 'ศรีสว่าง', 'คณะนิติศาสตร์ มหาวิทยาลัยสงขลานครินทร์  เลขที่ 15 ตำบลหาดใหญ่ อำเภอหาดใหญ่ จังหวัดสงขลา 90110', 'สงขลา', '90110', '0878071721', 3, 1, NULL, 'Y', 'kritsarat.sr@gmail.com', NULL, '$2y$10$4AJh03Rtvw/wSva3iSHvp.84czv3Vr8IpfoabGLNM4VKrP8r2BwOu', 0, 1, NULL, '2022-03-25 03:54:26', '2022-03-25 03:54:26'),
(8, 'นาย', NULL, 'นายวีระ', 'ชุมช่วย', '98/57 ม.10', 'สงขลา', '90000', '0980128185', 1, NULL, NULL, 'N', 'werapassachon@yahoo.com', NULL, '$2y$10$LzVUXxXHp2rLciSairdreOPSCuDPJWulZ0SLD7Qw8X61uXaTvjCzi', 1, 1, NULL, '2022-03-28 08:08:51', '2022-03-28 08:08:51'),
(9, 'นางสาว', NULL, 'ชญากานต์', 'คุ่มเคี่ยม', '204/3 หมู่9 ตำบลตะโหมด อำเภอตะโหมด', 'พัทลุง', '93160', '0969561268', 1, NULL, NULL, 'Y', 'kaemkh.14@gmail.com', NULL, '$2y$10$Fx.HuqN/PNphjMnVAEfVge4nsoyAjYNcgzOnhSJ6oWWk8Dq/B6svq', 0, 1, NULL, '2022-03-30 12:37:19', '2022-03-30 12:37:19'),
(10, 'นาย', 'อ.', 'อานนท์', 'ศรีบุญโรจน์', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ เลขที่ 140 หมู่ 4 ถนนกาญจนวนิช ตำบลเขารูปช้าง อำเภอเมือง', 'สงขลา', '90000', '0860956996', 1, NULL, NULL, 'Y', 'sarnon@tsu.co.th', NULL, '$2y$10$4b1SfIsWfEzsOlZ1IMY8wudk270C3tuDp156jx.JtJ8AAtXab7POu', 0, 1, NULL, '2022-04-02 14:46:36', '2022-04-02 14:46:36'),
(11, 'นาย', NULL, 'กฤษฎา', 'คงประดิษฐ์งาม', 'เลขที่ 2218/1-322 อาคาร 1 ชั้น 3 ซอยกรุงเทพฯ-นนทบุรี 46 ถนน กรุงเทพฯ-นนท์ แขวงวงศ์สว่าง เขตบางซื่อ', 'กรุงเทพมหานคร', '10800', '0869915346', 4, NULL, 'สำนักงานศาลปกครองกลาง', 'Y', 'kridsadalawchula50@gmail.com', NULL, '$2y$10$OqRhycsLjyA0OrZN/Ln2BeY5AE36KyhP6GiXShBTVur7BwPTmQWVm', 0, 1, NULL, '2022-04-07 14:19:35', '2022-04-07 14:19:35'),
(12, 'นาย', 'รศ.', 'ปพนธีร์', 'ธีระพันธ์', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ เลขที่ 140 หมู่ 4 ถ.กาญจนวนิช ต.เขารูปช้าง อ.เมือง', 'สงขลา', '90000', '0888542312', 1, NULL, NULL, 'Y', 'papontee@tsu.ac.th', NULL, '$2y$10$ywiwfNbuOl3ObR2OWV3OOuZYP.Dz7VniCBco6JFJtj1cVhuUu6L1m', 0, 1, NULL, '2022-04-08 03:16:17', '2022-04-18 04:28:34'),
(13, 'นาง', 'ผศ.', 'กนกลักษณ์', 'จุ๋ยมณี', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ', 'สงขลา', '90000', '0869663870', 1, NULL, NULL, 'N', 'kanokluk450@hotmail.com', NULL, '$2y$10$OEURDXP.snJdQRbGllKBo.JppFEuFL4ValNmTRWOPCOKmy4brjMhq', 0, 1, 'ZPvNTSQtEW8gmDYVgO8Qz0QWC1F7rpuWxihAaLazhxuq0wJHuvq2ZLREzIuV', '2022-04-13 10:16:07', '2022-04-13 10:16:07'),
(14, 'นาย', NULL, 'ธนาโชติ', 'ศรีแก้ว', 'บ้านพักข้าราชการตำรวจ สภ.เมืองยะลา 14/59 ถ.สุขยางค์ ต.สะเตง อ.เมือง', 'ยะลา', '95000', '0822601138', 1, NULL, NULL, 'Y', 'lovebenz_555@hotmail.com', NULL, '$2y$10$XdUwf5QLwZJnY1rRChgueOuyy8xILTtELA0X2GtTjBotWXZFXoJm2', 0, 1, NULL, '2022-04-18 13:45:04', '2022-04-18 13:46:52'),
(15, 'นางสาว', 'ผศ.', 'จินตนา', 'อุณหะไวทยะ', 'สำนักวิชารัฐศาสตร์และนิติศาสตร์ มหาวิทยาลัยวลัยลักษณ์ 222 ตำบลไทยบุรี อำเภอท่าศาลา จังหวัดนครศรีธรรมราช 80160', 'นครศรีธรรมราช', '80160', '0654289550', 3, 6, NULL, 'Y', '่jintana.unha@gmail.com', NULL, '$2y$10$utwGQEcyjkBnpPHIp7OW4eS2mWA4r6NtRjOSx6s5.9b9KiQFHdHmK', 0, 1, NULL, '2022-04-19 02:32:03', '2022-04-19 02:32:03'),
(16, 'นางสาว', NULL, 'อภิชญา', 'จีรนนท์', '14/1 หมู่5 อำเภอ ตะกั่วทุ่ง ตำบล โคกกลอย', 'พังงา', '82140', '0810864957', 1, NULL, NULL, 'Y', '611081480@tsu.ac.th', NULL, '$2y$10$1jHPGHkK4RGItGHBOezW6uB70K8v..sw5jmsJwX8EwHYL.jWRlJda', 0, 1, NULL, '2022-04-19 06:36:35', '2022-04-19 06:36:35'),
(17, 'นาย', 'อ.', 'ศิริชัย', 'กุมารจันทร์', 'คณะนิติศาสตร์ ม.ทักษิณ 140 ม.4 ต.เขารูปช้าง อ.เมือง', 'สงขลา', '90000', '0887848232', 1, NULL, NULL, 'Y', 'Sirichai@tsu.ac.th', NULL, '$2y$10$JDaHgvCruWpLTvUGxT/k3.K/FUBX21Lh5j3dhHr30IxIoMsG0rBxS', 0, 1, NULL, '2022-04-19 07:50:37', '2022-04-19 07:50:37'),
(18, 'นางสาว', NULL, 'ยศวดี', 'เสริมอ้วน', '96 ม.7 ต.นาโยงเหนือ อ.นาโยง', 'ตรัง', '92170', '0895973920', 1, NULL, NULL, 'Y', 'yodsawadee29088@gmail.com', NULL, '$2y$10$zSDaqeVbxOjdiAE9o/OjyO45BqYzb3QP/l6afm/SbhJoI0Z95kNZS', 0, 1, NULL, '2022-04-19 11:59:19', '2022-04-19 11:59:19'),
(19, 'นางสาว', NULL, 'ณัฐมล', 'ชูทิพย์', '32/109 ม.2 ต.บ้านควน อ.เมือง', 'ตรัง', '92000', '0618903690', 1, NULL, NULL, 'Y', 'nuttttaa@gmail.com', NULL, '$2y$10$styFwr0S6CorBzbaKyFWxuISa6E0Z3/IRGxM4X.55ngMEVzROXo/a', 0, 1, NULL, '2022-04-19 13:09:28', '2022-04-19 13:09:28'),
(20, 'นางสาว', NULL, 'สุชาวัลย์', 'พันธเกตุ', '18 หมู่ที่1 ตำบลทุ่งค่าย อำเภอย่านตาขาว', 'ตรัง', '92140', '0936281672', 1, NULL, NULL, 'Y', 'suchawan1999@gamil.com', NULL, '$2y$10$cPn8XhBH6KfkGNrX6n0NP.Tx3ippbPx5gdMW1Xs7ydW/ND4.VCeMW', 0, 1, NULL, '2022-04-19 13:36:38', '2022-04-19 13:36:38'),
(21, 'นาย', NULL, 'วรศักดิ์', 'ไชยภักดี', '297 ม.1 ต.อ่าวตง อ.วังวิเศษ', 'ตรัง', '92220', '0950295062', 1, NULL, NULL, 'Y', '612081063@tsu.ac.th', NULL, '$2y$10$BWsP1wbcYLY9zNlvij0QUuOTSVWciwl83rMLXSlXg3n0bPRfrStiy', 0, 1, NULL, '2022-04-20 07:31:34', '2022-04-20 07:31:34'),
(22, 'นางสาว', NULL, 'ชนิตา', 'ราชสีห์', 'คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ 140 หมู่ 4 ถนนกาญจนวนิช ตำบลเขารูปช้าง อำเภอเมืองสงขลา จังหวัดสงขลา 90000', 'สงขลา', '90000', '0614601322', 1, NULL, NULL, 'Y', '611081085@tsu.ac.th', NULL, '$2y$10$HGrBRK0G6hR/QZxfUhJmqeMaquUoObeat0z1nZFw2yKsxTMm4yLVW', 0, 1, NULL, '2022-04-20 12:44:02', '2022-04-20 12:44:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_reviewer_abs`
--
ALTER TABLE `paper_reviewer_abs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_reviewer_full`
--
ALTER TABLE `paper_reviewer_full`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_reviewer_poster`
--
ALTER TABLE `paper_reviewer_poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `paper_reviewer_abs`
--
ALTER TABLE `paper_reviewer_abs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paper_reviewer_full`
--
ALTER TABLE `paper_reviewer_full`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paper_reviewer_poster`
--
ALTER TABLE `paper_reviewer_poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
