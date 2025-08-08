-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2025 at 05:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprojectgroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `our_department_title` varchar(255) DEFAULT NULL,
  `our_department_description_part1` text,
  `our_department_description_part2` text,
  `financial_integrity_icon` varchar(255) DEFAULT NULL,
  `financial_integrity_text` varchar(255) DEFAULT NULL,
  `transparency_icon` varchar(255) DEFAULT NULL,
  `transparency_text` varchar(255) DEFAULT NULL,
  `our_mission_title` varchar(255) DEFAULT NULL,
  `our_mission_description` text,
  `our_vision_title` varchar(255) DEFAULT NULL,
  `our_vision_description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `page_name`, `title`, `description`, `our_department_title`, `our_department_description_part1`, `our_department_description_part2`, `financial_integrity_icon`, `financial_integrity_text`, `transparency_icon`, `transparency_text`, `our_mission_title`, `our_mission_description`, `our_vision_title`, `our_vision_description`, `image_url`, `is_visible`) VALUES
(1, 'unit1', 'Unit Penjanaan, Risiko & Sistem', 'Mengendalikan dan merancang pengurusan penjanaan Universiti', 'Unit Penjanaan, Risiko & Sistem', 'ok', '', '', '', '', '', 'Our Mission', 'To provide exceptional financial services and stewardship of university resources through efficient processes, innovative solutions, and responsive customer service, supporting the UPSI Malaysia\'s commitment to academic excellence and research innovation.', 'Our Vision', 'To be recognized as a leader in higher education financial management, setting the standard for excellence, innovation, and best practices in financial services while fostering a culture of continuous improvement and fiscal responsibility that advances the UPSI Malaysia\'s global standing.', './uploads/1752593848_uprs-scaled.jpg', 0),
(2, 'unit2', 'Unit Kewangan Pelajar', 'Mengurus dan mengakaunkan hasil yuran pelajar', 'pengurusan kewangan pelajar', '', '', '', '', '', '', '', '', '', '', './uploads/1752594139_ukp-scaled.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `address` text,
  `hotline1` varchar(50) DEFAULT NULL,
  `hotline1_desc` varchar(100) DEFAULT NULL,
  `hotline2` varchar(50) DEFAULT NULL,
  `hotline2_desc` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `map_embed_url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `department`, `address`, `hotline1`, `hotline1_desc`, `hotline2`, `hotline2_desc`, `image_url`, `map_embed_url`) VALUES
(1, 'Branch 1', 'Unit Kewangan Pelajar', 'Aras Bawah (Sebelah Surau)\nKompleks Akademik\nKampus Sultan Azlan Shah (KSAS)\nUniversiti Pendidikan Sultan Idris\n35900 Tanjung Malim\nPerak Darul Ridzuan', '05 – 4507761 / 013 – 512 2040', '(Undergrad- Diploma- Degree)', '05 – 4507760 / 013 – 458 0580', '(Postgrad- Master- PHD)', './uploads/branch1-ksas.png', ' <iframe class=\"rounded-lg md:col-span-1\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.3922103745676!2d101.53068947507921!3d3.724355196249574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb89c69b82a3ab%3A0x7fa38dc86ca7823!2sKompleks%20Akademik%20UPSI!5e0!3m2!1sen!2smy!4v1750647109620!5m2!1sen!2smy\" width=\"350\" height=\"320\" style=\"border:0;\"></iframe>'),
(2, 'Pejabat Bendahari 1', 'Unit Pembayaran, Unit Akaun dan Bajet, Unit Governan, Kumpulan Wang dan Pinjaman', 'Aras Bawah (Kanan Hadapan)\r\nBangunan Canselori\r\nKampus Sultan Abdul Jalil Shah\r\nUniversiti Pendidikan Sultan Idris\r\n35900 Tanjung Malim\r\nPerak Darul Ridzuan', '05 – 450 6207 (Unit Pembayaran)', '<strong>Hotline 1.1: </strong>\n05 – 450 6652 (Unit Akaun & Bajet)', '05 – 450 6305 ', '(Unit Governan, Kumpulan Wang & Pinjaman)', './uploads/branch2-pt.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5610561282874!2d101.5229129750791!3d3.686838296287144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb87f8ab7ed4d3%3A0xf1781d5e4fd1b7b4!2sBangunan%20Canselori%20UPSI!5e0!3m2!1sen!2smy!4v1750930634046!5m2!1sen!2smy\" width=\"350\" height=\"320\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(3, ' Pejabat Bendahari 2', 'Unit Perolehan & Pengurusan Kontrak', 'Aras Bawah (Bersebelahan Mesin ATM)\r\nBangunan Canselori\r\nKampus Sultan Abdul Jalil Shah\r\nUniversiti Pendidikan Sultan Idris\r\n35900 Tanjung Malim\r\nPerak Darul Ridzuan', '05 – 450 6309', '', '05 – 458 1004 (Faks)', '', './uploads/branch3-pt.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5610561282874!2d101.5229129750791!3d3.686838296287144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb87f8ab7ed4d3%3A0xf1781d5e4fd1b7b4!2sBangunan%20Canselori%20UPSI!5e0!3m2!1sen!2smy!4v1750930634046!5m2!1sen!2smy\" width=\"350\" height=\"320\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(4, 'Pejabat Bendahari 3', 'Unit Aset, Stor dan Pembangunan & Unit Penjanaan, Risiko dan Sistem', 'Aras Bawah (Tangga Belakang)\r\nBangunan Canselori\r\nKampus Sultan Abdul Jalil Shah\r\nUniversiti Pendidikan Sultan Idris\r\n35900 Tanjung Malim\r\nPerak Darul Ridzuan', '05 - 450 6624', 'Unit Aset, Stor & Pembangunan', '05 - 450 6512', 'Unit Penjanaan, Risiko & Sistem', './uploads/1751186976_branch4-pt.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5610561282874!2d101.5229129750791!3d3.686838296287144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb87f8ab7ed4d3%3A0xf1781d5e4fd1b7b4!2sBangunan%20Canselori%20UPSI!5e0!3m2!1sen!2smy!4v1750930634046!5m2!1sen!2smy\" width=\"350\" height=\"320\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(5, 'Pejabat Bendahari 4', 'Unit Pentadbiran, Kewangan & Kualiti dan Unit Gaji, Cuti Belajar & Ticketing', 'Aras 1 (Kanan Hadapan)\r\nBangunan Canselori\r\nKampus Sultan Abdul Jalil Shah\r\nUniversiti Pendidikan Sultan Idris\r\n35900 Tanjung Malim\r\nPerak Darul Ridzuan', '05 - 450 5172 / 012 - 359 3214', 'Unit Pentadbiran, Kewangan & Kualiti', '05 - 450 5546 / 012 - 601 1954', 'Unit Gaji, Cuti Belajar & Ticketing', './uploads/1751187153_branch5-pt.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5610561282874!2d101.5229129750791!3d3.686838296287144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb87f8ab7ed4d3%3A0xf1781d5e4fd1b7b4!2sBangunan%20Canselori%20UPSI!5e0!3m2!1sen!2smy!4v1750930634046!5m2!1sen!2smy\" width=\"350\" height=\"320\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(6, 'testingg', 'ye', 'ok', '123', 'test1', '123', 'test2', '', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `faq_section`
--

CREATE TABLE `faq_section` (
  `id` int NOT NULL,
  `question` varchar(512) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `faq_section`
--

INSERT INTO `faq_section` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'How will my feedback be used?', 'It will help improve our services and processes after review by our team.', 0, 1, '2025-07-16 15:45:59', '2025-07-16 15:45:59'),
(2, 'How long will it take to process my feedback?', 'We aim to respond within 3-5 business days.', 1, 1, '2025-07-16 15:46:56', '2025-07-16 15:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `feedback_type` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `rating` int NOT NULL,
  `is_anonymous` tinyint(1) DEFAULT '0',
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_type`, `feedback`, `rating`, `is_anonymous`, `submitted_at`) VALUES
(1, 'general', 'test', 3, 0, '2025-06-19 18:16:58'),
(2, 'service', 'mantap', 4, 0, '2025-06-29 11:27:01'),
(3, 'general', 'ok', 3, 0, '2025-06-29 12:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_section`
--

CREATE TABLE `feedback_section` (
  `id` int NOT NULL,
  `feedback_type` varchar(100) DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `feedback_text` text,
  `submit_anonymously` tinyint(1) DEFAULT '0',
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `feedback_section`
--

INSERT INTO `feedback_section` (`id`, `feedback_type`, `rating`, `feedback_text`, `submit_anonymously`, `submission_date`) VALUES
(1, 'general', 3, 'ok', 0, '2025-07-16 16:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `footer_section`
--

CREATE TABLE `footer_section` (
  `id` int NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_description` text,
  `address_text` text,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `admin_login_link` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `footer_section`
--

INSERT INTO `footer_section` (`id`, `department_name`, `department_description`, `address_text`, `phone_number`, `email_address`, `youtube_link`, `copyright_text`, `admin_login_link`, `facebook_link`, `instagram_link`) VALUES
(1, 'UPSI Bursar Department', 'Providing financial services and support to the UPSI Malaysia community.', 'Universiti Pendidikan Sultan Idris, 35900 PRK', '+603-7967 3202', 'bendahari@upsi.edu.my', '', '© 2025 UPSI Malaysia - Bursar Department. All rights reserved.', 'admin_login.php', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `category_name`, `description`) VALUES
(1, 'General', 'umum'),
(2, 'Financial Aid', 'stud');

-- --------------------------------------------------------

--
-- Table structure for table `news_section`
--

CREATE TABLE `news_section` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `publish_date` date DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_urgent` tinyint(1) DEFAULT '0',
  `link_url` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `news_section`
--

INSERT INTO `news_section` (`id`, `title`, `description`, `publish_date`, `image_url`, `is_urgent`, `link_url`, `category_id`) VALUES
(1, 'Test1', 'hi', '2025-07-15', '', 1, '', 1),
(2, 'Test 2', 'j', '2025-07-15', '', 0, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text,
  `icon_class` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `category_name`, `description`, `icon_class`) VALUES
(1, 'Student', 'learner', 'fas fa-user-graduate'),
(2, 'Staff', 'teacher', 'fas fa-users');

-- --------------------------------------------------------

--
-- Table structure for table `service_forms_documents`
--

CREATE TABLE `service_forms_documents` (
  `id` int NOT NULL,
  `document_title` varchar(255) NOT NULL,
  `document_type` varchar(50) DEFAULT NULL,
  `file_url` varchar(255) NOT NULL,
  `category_group` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `service_forms_documents`
--

INSERT INTO `service_forms_documents` (`id`, `document_title`, `document_type`, `file_url`, `category_group`) VALUES
(1, 'Tuition Fee Payment', 'PDF', './uploads/documents/1752639829_2022-2023 (sem2).pdf', 'Financial Fee');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_description` text,
  `points_list` text,
  `link_text` varchar(100) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `category_id`, `item_title`, `item_description`, `points_list`, `link_text`, `link_url`, `image_url`) VALUES
(1, 1, 'Tuition Fee', 'oke ke', 'T1, T2', '', '', ''),
(2, 2, 'Memo', 'in charge', 'T2, T3', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_item_points`
--

CREATE TABLE `service_item_points` (
  `id` int NOT NULL,
  `service_item_id` int NOT NULL,
  `point_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_profile`
--

CREATE TABLE `team_profile` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `phoneNo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `team_profile`
--

INSERT INTO `team_profile` (`id`, `name`, `position`, `profile_img`, `phoneNo`, `email`, `description`) VALUES
(1, 'Tn. Hj. Mohamad Najib bin Hj. Mohamed', 'Director of Bursar Department', 'najib-cropped.png', '+60 5450 6329', 'najib@bendahari.upsi.edu.my', NULL),
(2, 'Pn. Normadkhah bt Ardani', 'Akauntan WA13', 'ciknor.png\n', '+60 5450 6302', 'normadkhah@bendahari.upsi.edu.my', ''),
(3, 'Dr. Sayed Muhammad Arif bin Sayed Yahya', 'Akauntan WA13', 'sayed.png', '+60 5450 6301', 'sayedarif@bendahari.upsi.edu.my', ''),
(4, 'En. Nazrul Azlan bin Musa', 'Akauntan WA12', 'nzrul.png', '+60 5450 6330', 'nazrul.azlan@bendahari.upsi.edu.my', ''),
(5, 'Pn. Wahidanoor bt Wahid', 'Akauntan WA12', 'wahida.png', '+60 5450 6359', 'wahidanoor@bendahari.upsi.edu.my', NULL),
(6, 'ah', 'hb', '1751195652_anos ft kanon.jpg', 'j', 'nb@mail.com', 'jj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `faq_section`
--
ALTER TABLE `faq_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_section`
--
ALTER TABLE `feedback_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_section`
--
ALTER TABLE `footer_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `news_section`
--
ALTER TABLE `news_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_category` (`category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `service_forms_documents`
--
ALTER TABLE `service_forms_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `service_item_points`
--
ALTER TABLE `service_item_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_item_id` (`service_item_id`);

--
-- Indexes for table `team_profile`
--
ALTER TABLE `team_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq_section`
--
ALTER TABLE `faq_section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback_section`
--
ALTER TABLE `feedback_section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_section`
--
ALTER TABLE `footer_section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_forms_documents`
--
ALTER TABLE `service_forms_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_item_points`
--
ALTER TABLE `service_item_points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_profile`
--
ALTER TABLE `team_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_section`
--
ALTER TABLE `news_section`
  ADD CONSTRAINT `fk_news_category` FOREIGN KEY (`category_id`) REFERENCES `news_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_item_points`
--
ALTER TABLE `service_item_points`
  ADD CONSTRAINT `service_item_points_ibfk_1` FOREIGN KEY (`service_item_id`) REFERENCES `service_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
