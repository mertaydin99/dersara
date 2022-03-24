-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2022 at 09:41 PM
-- Server version: 8.0.27
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dersarac_poll`
--
CREATE DATABASE IF NOT EXISTS `dersarac_poll` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dersarac_poll`;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_demands`
--

CREATE TABLE `lesson_demands` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `introduction` varchar(800) NOT NULL,
  `preference` enum('face2face','online') NOT NULL,
  `who` enum('myself','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int UNSIGNED NOT NULL,
  `img_url` varchar(500) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `title` varchar(100) NOT NULL,
  `introduction` varchar(800) NOT NULL,
  `city` int UNSIGNED DEFAULT NULL,
  `province` varchar(300) DEFAULT NULL,
  `preference` enum('face2face','online','both') NOT NULL,
  `price` smallint UNSIGNED NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `img_url`, `gender`, `title`, `introduction`, `city`, `province`, `preference`, `price`, `keyword`, `user_id`) VALUES
(141, 'IMG_20220106_143456_594mm375.jpg', 'm', 'İlköğretim Matematik özel ders', '2006 fizik mezunuyum, 11 senedir devlette fizikçiyim. Hobby olarak yaptığım için kendi evim haricinde evlere ders vermeye gitmiyorum. İlköğretim ilkokul ve ortaokul için matematik ve geometri dersleri veriyorum. Fiyatı uygun tuttum para kazanma amacım yok. Sadece zaman ve emek kaybım nedeniyle cüzi miktar talep ediyorum. Normalde 300 TL olan ders ücretlerimi şuan saatlik 150 TL yaptım, tabi bu kısa süreliğine olduğu için kontenjan dolduğunda kusura bakmayın. Teşekkürler.', 41, 'İzmit merkez', 'both', 150, 'İlköğretim matematik geometri ', 181),
(142, 'Screenshot_2022-03-20-17-13-03-842_com.whatsappmm377.jpg', 'f', 'ilköğretim takviye ', 'merhaba ben Kadriye öğretmen 9 yıllık eğitim öğretim hayatım deneyimlerim mevcuttur , özel çocuklarlada calsrm ,Türkçe ,matematik , bilişsel becerileri, gecikmiş konuşma çalışmalarında gayet iyiyim,ilköğretim öğrencileri ile geri kalan çocuklarımızla yüzde 85 başarı sağladım ', 34, 'Aydınlı, tuzla, içmeler,Pendik, Esenyalı, Güzelyalı ', 'both', 160, 'matematik türkçe özel eğitim ilköğretim konuşma çocuk bilişsel beceri', 182);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int UNSIGNED NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_sign_in` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `email`, `password`, `token`, `status`, `last_sign_in`) VALUES
(220, 'Mert', 'Aydın', 'mertaydin991@hotmail.com', '$2y$10$1xIvTREC5zNSGmj07J7xkeTupuajfQDLSEXozg2wKB6D1mm.vyYx6', '', 1, '2022-03-24 15:59:25'),
(221, 'Ayşe', 'Taşlıca', 'ataslica353535@gmail.com', '$2y$10$.sQ0w8oPRmJ9lUY2deAC1eihSyspX5REk9xz6Yxf1GRnc2C0onxga', '', 1, '2022-03-24 14:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int UNSIGNED NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_sign_in` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fname`, `lname`, `email`, `password`, `token`, `status`, `last_sign_in`) VALUES
(180, 'Mert', 'Aydın', 'mertaydin99@hotmail.com', '$2y$10$9bSXcU8UlWH6jQf7arWOXeJRuO9oc7cKXXa76Rx2yluUgnFZ.W1Ue', '', 1, '2022-03-24 16:02:49'),
(181, 'Mehmet Melih', 'Gürleyen', 'melihgurleyen@gmail.com', '$2y$10$3dutZJrmndr71uuhO0p9cuzTjYGZrDnX5sP9oMTna61S22GOT6BRG', '', 1, '2022-03-24 12:49:44'),
(182, 'Kadriye', 'inal', 'kadriyeinal54@gmail.com', '$2y$10$5NCui.wpwxn5r8ezVK279u2kNpjkQ7zYvLTdCuHEyM2zM1SudTgz2', '', 1, '2022-03-24 13:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lesson_demands`
--
ALTER TABLE `lesson_demands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique` (`user_id`),
  ADD UNIQUE KEY `img_url` (`img_url`),
  ADD UNIQUE KEY `img_url_2` (`img_url`),
  ADD UNIQUE KEY `img_url_3` (`img_url`);
ALTER TABLE `profile` ADD FULLTEXT KEY `keyword` (`keyword`);
ALTER TABLE `profile` ADD FULLTEXT KEY `introduction` (`introduction`);
ALTER TABLE `profile` ADD FULLTEXT KEY `province` (`province`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_email` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lesson_demands`
--
ALTER TABLE `lesson_demands`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lesson_demands`
--
ALTER TABLE `lesson_demands`
  ADD CONSTRAINT `lesson_demands_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
