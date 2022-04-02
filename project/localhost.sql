-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2022 at 03:19 PM
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
(142, 'Screenshot_2022-03-20-17-13-03-842_com.whatsappmm377.jpg', 'f', 'ilköğretim takviye ', 'merhaba ben Kadriye öğretmen 9 yıllık eğitim öğretim hayatım deneyimlerim mevcuttur , özel çocuklarlada calsrm ,Türkçe ,matematik , bilişsel becerileri, gecikmiş konuşma çalışmalarında gayet iyiyim,ilköğretim öğrencileri ile geri kalan çocuklarımızla yüzde 85 başarı sağladım ', 34, 'Aydınlı, tuzla, içmeler,Pendik, Esenyalı, Güzelyalı ', 'both', 160, 'matematik türkçe özel eğitim ilköğretim konuşma çocuk bilişsel beceri', 182),
(146, 'IMG-20220319-WA0010mm383.jpg', 'm', 'Kodlama Eğitmeni', 'Teknik Lise Bilişim Teknolojileri ve Yazılım bölümünden mezun olduktan sonra İnönü Üniversitesi Bilgisayar ve Öğretim Teknolojileri Eğitimi Bölümü\'nden mezun oldum. 3 yıl özel eğitim kurumunda Bilişim Teknolojileri ve Yazılım Öğretmeni olarak görev yaptım. 4 yıldır MEB bünyesinde öğretmen olarak çalışıyorum. Lise yıllarımdan beri kodlama ve yazılım üzerine eğitimler alıp proje ve yarışmalar için çalışmalar yapıyorum. Temel algoritma eğitimi, kodlama, yazılımın temelleri, Scratch , Mbot, Arduino, temel elektronik bilgisive projeler konusunda uzmanlığa sahibim.', 27, 'Şehitkamil ve Şahinbey', 'both', 75, 'kodlama  arduino mbot yazılım bilgisayar teknoloji algoritma ilkokul ortaokul ', 185),
(151, 'memoomm397.jpg', 'm', 'Bilkent ingilizce-fransızca mütercim tercümanlık mezunu ve toronto\'da master yapmış öğretmenden ders', 'korkularınızı yenmeyi ve çekingenliğinizi kırmada yanınızda olacağım hiç zor değil aslında. Sadece ezber gramer odaklı değil konuşarak öğreneceğiz. Biraz zorlanmadan istediğimiz hedefe ulaşamayız. Ders dışında da her türlü sorunuza ve tıkandığınız yerlerde cevap verip çıkığınız bu yolda yanınızda olup hep destek vereceğim.', 6, 'çayyolu', 'both', 100, 'ingilizce başlangıç toefl yds speaking', 192),
(152, 'profil_imgmm401.png', 'f', 'KİMYA MÜHENDİSİNDEN ÖZEL DERS', 'Kimya mühendisiyim.4senedir kimya,matematik ve ingilizce uzerine dersler vermekteyim', NULL, NULL, 'online', 100, 'matematik\r\nkimya\r\nİngilizce\r\nİlkokul-ortaokul-lise', 194),
(153, 'image0mm407.jpeg', 'f', 'Boğaziçi Üniversitesi İngilizce Öğretmenliği öğrencisinden özel ders', 'Boğaziçi Üniversitesi İngilizce Öğretmenliği bölümü hazırlık öğrencisiyim. Daha öncesinde ilk ve ortaöğretim kademesindeki öğrencilerle özel ders tecrübem oldu. Dersleri zoom üzerinden online olarak veya yüzyüze veriyorum. İlkokul, ortaokul ve lise öğrencilerine İngilizce ve Türkçe derslerinde özel ders verebilirim.Özellikle LGS ve YDT sınavına hazırlanan öğrencilerle sınava yönelik soru çözümleri ve özel dersler yapabilirim.', NULL, NULL, 'online', 50, 'türkçe İngilizce İngilizce ortaokul İngilizce ilkokul İngilizce lgs İngilizce ydt türkçe lgs', 197);

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
(220, 'Mert', 'Aydın', 'mertaydin991@hotmail.com', '$2y$10$1xIvTREC5zNSGmj07J7xkeTupuajfQDLSEXozg2wKB6D1mm.vyYx6', '', 1, '2022-03-25 15:53:18'),
(221, 'Ayşe', 'Taşlıca', 'ataslica353535@gmail.com', '$2y$10$.sQ0w8oPRmJ9lUY2deAC1eihSyspX5REk9xz6Yxf1GRnc2C0onxga', '', 1, '2022-03-24 14:49:42'),
(223, 'Yalçın', 'Akgungor', 'akgungor1999@gmail.com', '$2y$10$AxewUPSSiizMVyE4JVz6O.dN1gISrRZvBizzr626hMAaIfPBYDoMS', '', 1, '2022-03-29 10:40:28');

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
(181, 'Mehmet Melih', 'Gürleyen', 'melihgurleyen@gmail.com', '$2y$10$3dutZJrmndr71uuhO0p9cuzTjYGZrDnX5sP9oMTna61S22GOT6BRG', '', 1, '2022-03-24 12:49:44'),
(182, 'Kadriye', 'inal', 'kadriyeinal54@gmail.com', '$2y$10$5NCui.wpwxn5r8ezVK279u2kNpjkQ7zYvLTdCuHEyM2zM1SudTgz2', '', 1, '2022-03-24 13:08:53'),
(185, 'Burak', 'Karakol', 'pc_kiyatrist@hotmail.com', '$2y$10$hgIyWoxJhPUSNcj9ZYyss.PNaXa7aYiDuJr5WrlBAXU3Kx.b2eIxm', '', 1, '2022-03-24 21:20:17'),
(186, 'Sami Orçun', 'Kortunay', 'sami.kortunay@tau.edu.tr', '$2y$10$V7fqE3Y1Q/UiqtqAq5FZLuncnYCVBmJjavA1KYTQHOJpwxZjrYYq2', '', 1, '2022-03-24 21:55:05'),
(189, 'Mert', 'Aydın', 'mertaydin99@hotmail.com', '$2y$10$q1OjoPx4eCRr7ca0kkIXsuOl.tECQE6aVO1n0292PCe8.u8jJX4Zq', '', 1, '2022-03-31 14:28:27'),
(190, 'Süheyl', 'Karatekin', 'süheylkaratekin@hacettepe.edu.tr', '$2y$10$bnDwYSRYbZ65isJRkN2sAeAzxNcVv..QYOM5Wc2JTlUxfLVXfp7ki', 'e36fbc1ad0f576a9b37956a7024ae014', 0, '2022-03-26 21:19:08'),
(191, 'Songül', 'Karaman', 'songulkaraman@hacettepe.edu.tr', '$2y$10$cxSoh6t9xnGgmEdI3Rr2n.i6IubG2PRgSlQ50iOwoguj.pxo/3Ahq', 'beda3d4b4acea2ce100059e80ccd865c', 0, '2022-03-27 05:48:17'),
(192, 'mehmet', 'görgülü', 'mehgorgulu@gmail.com', '$2y$10$ucZgXGHkiQrPtVrZUTA/m.iiQIcpM/7hhP8Zb7Ke6u1Bu7rbn0dSu', '', 1, '2022-03-28 07:29:16'),
(193, 'Gülşah', 'Mutlu', 'gulsahmutluu1@gmail.com', '$2y$10$3kETNC18RsT5cbM1ll2ASeFBp2fE4uLiyZMDcd5TJZTRQNAyWTFXO', '', 1, '2022-03-28 11:58:08'),
(194, 'Kbr', 'Htc', 'kbrhtc13@gmail.com', '$2y$10$czx6RVUSKG/kL74kzTfuNuKAs4fR.KOXMhIIAkIaifuRz/xvHpT6O', '', 1, '2022-03-29 07:23:40'),
(195, 'Nihal Gökçe', 'Aslan', 'aslannihalgokce@gmail.com', '$2y$10$KKuur6JHZfPDA1hrBrD9MOm6An4Q9WG4TN707KlLML.fUuVqWqV1a', 'e33e5f3f3bd4c50dabc8ab3b0a6e3110', 0, '2022-03-30 07:58:32'),
(196, 'Eda', 'Güneş', 'edaaguness7@gmail.com', '$2y$10$xkvFeEJENYfW/8ok4z/29ep36.C4glWUMA//DINH.vFtyThNkBZ9y', '', 1, '2022-03-30 08:15:53'),
(197, 'Nihal Gökçe', 'Aslan', 'nihal.aslan@boun.edu.tr', '$2y$10$sNFYgRWa.5e8E3Nr/EthWu9JKCY1MdNXjN1VCnfnEkrOqtYlKFylO', '', 1, '2022-04-02 08:47:11');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

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
