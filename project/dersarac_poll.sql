-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2022 at 01:22 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.29

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

--
-- Dumping data for table `lesson_demands`
--

INSERT INTO `lesson_demands` (`id`, `name`, `introduction`, `preference`, `who`, `email`, `telephone`, `user_id`, `date`) VALUES
(91, 'Serkan', 'Yurt disina cikicagim icin ingilizce ogrensem iyi olcak diye dusundum', 'face2face', 'myself', 'serkan33tekin1994@icloud.com', '05529396309', 210, '2022-05-22 12:58:57');

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
(153, 'image0mm407.jpeg', 'f', 'Boğaziçi Üniversitesi İngilizce Öğretmenliği öğrencisinden özel ders', 'Boğaziçi Üniversitesi İngilizce Öğretmenliği bölümü hazırlık öğrencisiyim. Daha öncesinde ilk ve ortaöğretim kademesindeki öğrencilerle özel ders tecrübem oldu. Dersleri zoom üzerinden online olarak veya yüzyüze veriyorum. İlkokul, ortaokul ve lise öğrencilerine İngilizce ve Türkçe derslerinde özel ders verebilirim.Özellikle LGS ve YDT sınavına hazırlanan öğrencilerle sınava yönelik soru çözümleri ve özel dersler yapabilirim.', NULL, NULL, 'online', 50, 'türkçe İngilizce İngilizce ortaokul İngilizce ilkokul İngilizce lgs İngilizce ydt türkçe lgs', 197),
(154, '7c50a0d3-e16a-460d-92ae-08f842bef64fmm409.jpg', 'm', '12 yıllık Akademisyenden İngilizce dersi', 'ODTÜ İngilizce Öğretmenliği bölümünden onur öğrencisi olarak mezun oldum. Bölüme Türkiye 170.si olarak girdim. Halen Türkiye\'de en başarılı ilk beş üniversite arasında gösterilen bir devlet okulunda Öğretim Görevlisi (+ material developer & curriculum designer) olarak çalışıyorum. Daha önce ilköğretim dahil her düzeyde ingilizce öğretmenliği yaptım. Özel bir üniversitede hazırlık bölümünde tüm seviyelerde 5 sene koordinatörlük yaptım ve Modern Dillerde Bölüm derslerine girdim. Tüm seviyelerin müfredatını düzenleme ve sınavlarını hazırlama konusunda tecrübeliyim. Ayrıca, ünlü bir dil kursunda da Yds ve Yökdile yönelik çalıştım.\r\ntoplam tecrübem 12 yıl. Yökdil skorum 100.', 34, NULL, 'both', 350, 'yds, yökdil, toefl, ielts, genel ingilizce, iş ingilizcesi ve speaking', 198),
(157, 'profil_imgmm411.png', 'm', 'Özel Ders Verilir', 'İlköğretim 1.sınıftan üniversite hazırlık grubuna kadar her yaştan her kademede öğrenciye birebir yada toplu ders verilir... ', 1, 'Seyhan, Ceyhan, Sarıçam, Çukurova... ', 'both', 40, 'türkçe\r\ntürk dili ve edebiyatı', 199),
(158, 'F8FB764F-3880-4F03-B415-88E917893213mm421.jpeg', 'm', 'Dokuz Eylül Üniversitesi Mezunu 13 Yıllık Devlet Okulu Çalışma Tecrübeli Matematik Öğretmeni', '2009 yılında Dokuz Eylül Üniversitesi İlköğretim Matematik Öğretmenliği bölümünden mezun oldum. 13 yıldır devlet okullarında çalışmaktayım. 8 sınıf öğrencilerinin LGS’ye hazırlanması ve 5. 6. 7. sınıf öğrencileri için okula destek olarak özel ders vermekteyim. Özel ders konusunda da 10 yılı aşkın tecrübem var. Pandemi dönemi ile birlikte online özel ders tecrübe ve altyapımı da geliştirdim. Bireysel ya da grup dersi yapabilirim. ', 48, 'Milas', 'both', 150, 'matematik ortaokul 5, 6, 7, 8', 204),
(159, '12185220_10153681837077418_942073624537701231_o (1)mm423.jpg', 'f', 'İngilizce Öğretmeni', 'Hacettepe İngilizce Öğretmenliği mezunu 12 yıllık öğretmenim. 9 yıldır MEB bünyesinde çalışıyorum. Öncesinde bir süre Amerika\'da yaşadım ve öğretmenliğim boyunca İtalya, İspanya, Fransa gibi Avrupa ülkeleri ile çeşitli projelerde yer aldım. Özel derslere öğrencilik yıllarımda başladım ve yıllardır devam ediyorum. Yeniliklere ayak uydurmayı seven, küçük yaş gruplarıyla da arası iyi, iletişim-empati yönü yüksek biriyim. Öğrencinin ihtiyacına yönelik program hazırlayıp takip eşliğinde eksiklerini gidermek isterim.', NULL, NULL, 'online', 200, 'İngilizce okul öncesi-ilkokul-ortaokul-lise-üniversite\r\nyds toefl ielts\r\nspeaking/conversation\r\n', 205),
(161, '7832D7F7-3B10-4623-A1B3-CAB403BAE10Amm431.jpeg', 'f', 'Ingilizce-turkce ozel ders', 'Mutercim tercumanlik bolumundeyim, belge cevirisi, ingilizce ve turkce ozel dersleri uygun fiyata verebilirim.', NULL, NULL, 'online', 100, 'ingilizce turkce ozelders online ceviri odev', 209),
(162, 'Ekran Resmi 2022-04-30 14.40.26mm433.png', 'f', 'İngilizce Özel Ders ', 'Adnan Menderes Üniversitesi İngilizce Öğretmenliği bölümünde okudum. Çocuklarla ve gençlerle çok iyi anlaşırım. Yaşlarımız yakın olduğu için derslerin anlaşılması kolay olur. 2018den beri özel ders veriyorum. 22 yaşındayım. Genel Üniversite ortalamam 3.15. ', 20, 'Pamukkale, Merkezefendi', 'both', 70, 'İngilizce-orta Öğretim \r\nİngilizce-lise \r\n', 210),
(163, 'profil_imgmm439.png', 'f', 'Fizik ve Matematik Anlatıcısı', 'İstanbul Üniversitesi Fizik, İstanbul Ticaret Üniversitesi Endüstri Mühendisliği, Anadolu Üniversitesi    Çalışma Ekonomisi Ön Lisans eğitimlerine sahip Fizik ve Matematik Bilimini çok s even iyi bir öğretici', 34, 'Ataşehir Kadıköy Maltepe Kartal Ümraniye', 'both', 200, 'fizik matematik geometri lise ortaokul İlkokul', 213),
(164, '7E554292-392F-4C50-85BE-6E42EF988062mm451.jpeg', 'f', 'Her yaş grubuna matematik dersi veriyorum', 'Manisa Celal Bayar Üniversitesi - Matematik Bölümü mezunuyum. 2 yıldır özel sektörde çalışmaktayım. Yaklaşık 4 yıldır her  yaş grubuna özel ders veriyorum. İlk ve ortaokul grubu  öğrencilerine matematiği sevdirerek öğretme amacındayım. Lise grubu öğrencilerimle birebir ve disiplinli bir program uyguluyorum.', 33, 'Yenişehir Toroslar Akdeniz ', 'both', 120, 'matematik ilkokul ortaokul lise ', 219),
(165, 'IMG_20191124_184140mm455.jpg', 'm', 'YETİŞKİNLER İÇİN HER SEVİYE ALMANCA VE İNGİLİZCE ÖZEL DERS ', 'Lisansımı Mimar Sinan Güzel Sanatlar Üniversitesi Sosyoloji Bölümünde, yüksek lisansımı Bilgi Üniversitesi Tarih Bölümünde tamamladım. Şu anda Amsterdam Üniversitesi\'nde doktora eğitimimi sürdürmekteyim. Şu anda özel ders vermenin yanı sıra Almanca ve İngilizceden serbest çevirmenlik ve ayrıca Türkçe dilinde editörlük yapmaktayım. Seçkin yayınevlerince yayınlanmış pek çok çeviri eserim vardır.Derslerim çevrimiçidir (Zoom üzerinden) ve temel bir kaynak üzerinden ilerlemektedir. İngilizce için de Almanca için de dünyaca kabul gören ve en çok tercih edilen temel kaynaklar üzerinden ilerleyeceğiz. Derslerin yoğunluğu ve ilerleme hızı öğrencinin seviyesine, hedeflerine ve ihtiyaçlarına göre belirlenecektir.', NULL, NULL, 'online', 300, 'yetişkin ingilizce almanca özel ders', 221),
(166, 'IMG-20220610-WA0004mm461.jpg', 'm', 'Bilkent matematik (ing, %100 burslu) öğrencisi, YKS sayısal 1100\'üncüsü, matematik olimpiyatçısı', 'Matematiğe ilgim lise yıllarında olimpiyatla tanışmamla oldu. Zor sorularla uğraşmak ve bazılarını çözebilmek kişiye hoş bir özgüven katıyor. Olimpiyatla beraber popüler matematiğe de ilgim başladı. Lisede başlayan bu ilgi YKS senesinde de arkadaşlarıma matematik soruları çözmek yönüne evrildi. Şu anda da Bilkent Üniversitesinde matematik 2. sınıf öğrencisiyim.', 38, 'tüm semtler', 'both', 120, 'yks matematik', 224);

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
(220, 'Mert', 'Aydın', 'mertaydin991@hotmail.com', '$2y$10$1xIvTREC5zNSGmj07J7xkeTupuajfQDLSEXozg2wKB6D1mm.vyYx6', '', 1, '2022-04-02 19:39:11'),
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
  `phone` varchar(255) NOT NULL,
  `last_sign_in` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fname`, `lname`, `email`, `password`, `token`, `status`, `phone`, `last_sign_in`) VALUES
(181, 'Mehmet Melih', 'Gürleyen', 'melihgurleyen@gmail.com', '$2y$10$3dutZJrmndr71uuhO0p9cuzTjYGZrDnX5sP9oMTna61S22GOT6BRG', '', 1, '', '2022-03-24 12:49:44'),
(182, 'Kadriye', 'inal', 'kadriyeinal54@gmail.com', '$2y$10$5NCui.wpwxn5r8ezVK279u2kNpjkQ7zYvLTdCuHEyM2zM1SudTgz2', '', 1, '', '2022-03-24 13:08:53'),
(185, 'Burak', 'Karakol', 'pc_kiyatrist@hotmail.com', '$2y$10$hgIyWoxJhPUSNcj9ZYyss.PNaXa7aYiDuJr5WrlBAXU3Kx.b2eIxm', '', 1, '', '2022-03-24 21:20:17'),
(186, 'Sami Orçun', 'Kortunay', 'sami.kortunay@tau.edu.tr', '$2y$10$V7fqE3Y1Q/UiqtqAq5FZLuncnYCVBmJjavA1KYTQHOJpwxZjrYYq2', '', 1, '', '2022-03-24 21:55:05'),
(190, 'Süheyl', 'Karatekin', 'süheylkaratekin@hacettepe.edu.tr', '$2y$10$bnDwYSRYbZ65isJRkN2sAeAzxNcVv..QYOM5Wc2JTlUxfLVXfp7ki', 'e36fbc1ad0f576a9b37956a7024ae014', 0, '', '2022-03-26 21:19:08'),
(191, 'Songül', 'Karaman', 'songulkaraman@hacettepe.edu.tr', '$2y$10$cxSoh6t9xnGgmEdI3Rr2n.i6IubG2PRgSlQ50iOwoguj.pxo/3Ahq', 'beda3d4b4acea2ce100059e80ccd865c', 0, '', '2022-03-27 05:48:17'),
(192, 'mehmet', 'görgülü', 'mehgorgulu@gmail.com', '$2y$10$ucZgXGHkiQrPtVrZUTA/m.iiQIcpM/7hhP8Zb7Ke6u1Bu7rbn0dSu', '', 1, '', '2022-03-28 07:29:16'),
(193, 'Gülşah', 'Mutlu', 'gulsahmutluu1@gmail.com', '$2y$10$3kETNC18RsT5cbM1ll2ASeFBp2fE4uLiyZMDcd5TJZTRQNAyWTFXO', '', 1, '', '2022-03-28 11:58:08'),
(194, 'Kbr', 'Htc', 'kbrhtc13@gmail.com', '$2y$10$czx6RVUSKG/kL74kzTfuNuKAs4fR.KOXMhIIAkIaifuRz/xvHpT6O', '', 1, '', '2022-03-29 07:23:40'),
(195, 'Nihal Gökçe', 'Aslan', 'aslannihalgokce@gmail.com', '$2y$10$KKuur6JHZfPDA1hrBrD9MOm6An4Q9WG4TN707KlLML.fUuVqWqV1a', 'e33e5f3f3bd4c50dabc8ab3b0a6e3110', 0, '', '2022-03-30 07:58:32'),
(196, 'Eda', 'Güneş', 'edaaguness7@gmail.com', '$2y$10$xkvFeEJENYfW/8ok4z/29ep36.C4glWUMA//DINH.vFtyThNkBZ9y', '', 1, '', '2022-03-30 08:15:53'),
(197, 'Nihal Gökçe', 'Aslan', 'nihal.aslan@boun.edu.tr', '$2y$10$sNFYgRWa.5e8E3Nr/EthWu9JKCY1MdNXjN1VCnfnEkrOqtYlKFylO', '', 1, '', '2022-04-02 08:47:11'),
(198, 'Yağız', 'Dikkatli', 'yagizdikkatli@hotmail.com', '$2y$10$cws1dCsNHRI6hyH2G7csLu.iZ4MajF337.3M1BVV9K0hayXxzcWG.', '', 1, '', '2022-04-03 12:18:33'),
(199, 'Ahmet', 'Erdoğan', 'ahmet.erdo@hotmail.com', '$2y$10$G8eYCC9k2E91GZSWuYeI5e1BtbDXroTlWSN9Z88xYQlRHNwmE3oJ2', '', 1, '', '2022-04-03 20:16:04'),
(200, 'Ahmet', 'Levent', 'ahmetlevent272@gmail.com', '$2y$10$B0veM72GzMP41RsaqUlO0u8CzOW5Zwv331b.fP94CvaE0R.O7HrO.', 'bd7bb4219fefac596dc27882f0e769a6', 0, '', '2022-04-06 11:55:43'),
(201, 'Mustafa', 'Arı', 'mustafaari88@gmail.com', '$2y$10$5hDvOjgJ1ZYcKv5cuBcck.G9Oriu8v3nlUKO3E8LjiWwsEHp4Wg0W', '', 1, '', '2022-04-06 17:02:05'),
(202, 'Ömer', 'Kurt', 'z.omerkurt@gmail.com', '$2y$10$Pd1YyVNnWsYgIvaNW2qq/.szX9vmZWbjOe3jFfwNby5dc.AMPnlkK', '', 1, '', '2022-04-13 16:59:11'),
(203, 'Polat', 'Çokgüngör', '0451120006@ogr.iu.edu.tr', '$2y$10$ar4CPtAdS5O0l6vwKG6LBe28HGNTUGPTGbsMTS4PLAolyHDRxB.6S', '', 1, '', '2022-04-13 17:23:34'),
(204, 'Güven', 'Türkmen', 'igturkmen96@aof.anadolu.edu.tr', '$2y$10$Z7MXe5y8bA5zWnsDtKKKpO0Wi7XVfbqv0mYotsi4QbYYTMS10cbI2', '', 1, '', '2022-04-25 05:40:57'),
(205, 'çiğdem', 'uysal', 'cigdemjii@hotmail.com', '$2y$10$6Q6vj.siX2HzeN3MAfkLxeRaqk3vjwsfn2dGaj7hf2AFW5PlgkEG6', '', 1, '', '2022-04-16 21:20:37'),
(206, 'FERHAT', 'ÇANAKCI', 'frhtcnkc1@gmail.com', '$2y$10$ZuCefxLpf9lAJPhqlTVPW.lntYvfjBnzdjllmxx2JwouhGMpKH1JS', '', 1, '', '2022-04-18 07:30:23'),
(207, 'Erkan', 'Atmaca', 'erkanatmaca4242@gmail.com', '$2y$10$NiXmyMF5.kV8eGsDUR.UDejysZkJh734cii0goQUuRbewNEsSTugm', '', 1, '', '2022-04-29 07:10:12'),
(209, 'Eylul', 'Kebapcigil', 'eylulkebapcigil@icloud.com', '$2y$10$OvpLZ5d24X8fYiUpI6xey.ENry/AZDMXVBrgagT9qfVppZ6PRq4Ym', '', 1, '', '2022-04-30 10:29:13'),
(210, 'Elif', 'Çelik', 'elifc7138@gmail.com', '$2y$10$3FIQnMk0jVa5R5uqILibk.c3VYmqUuh6YP/F6JZiSitzhUQGeFykW', '', 1, '', '2022-04-30 12:33:04'),
(211, 'Elif', 'Bahçeci', 'bahcecielif88@gmail.com', '$2y$10$ZcGXfYJPfLnG848PgA0dCeM5P12xfTM74pPZfnTD/5R.IWUy/.gYC', '', 1, '', '2022-04-30 21:59:56'),
(212, 'Cemile', 'KAYIŞ', 'cemilekayis@hotmail.com', '$2y$10$LMMoXswgvI8T9.eSAdeIse4/gsNmUrJ/vk3fXZSfu1vR9ydYxPyOO', '', 1, '', '2022-05-02 11:14:38'),
(213, 'sevgi', 'güler', 'sevginim@gmail.com', '$2y$10$OKjHpN64nn34oUKM8lTk4Op24dvw24wsCih4lE0F/dLGfjZxr0mh2', '', 1, '', '2022-05-05 12:23:18'),
(214, 'qwer', 'qwer', 'qwer@qwer.com', '$2y$10$P6j9YLd6xz25FmDb89m7jOwp6JN64Qx6Eli5FJdsbqiIHPnnTwXqi', 'e3dfc95d34234071fbe57b57cff912b9', 0, '', '2022-05-06 12:04:59'),
(215, 'Ezgi Nurefşan', 'Ersoy', 'ezgierdıy26.ee@gmail.com', '$2y$10$pr1APeqEms3KpETEHH8n8OLKMNDLru36t0u6HfjmhATCpuxC0lqKC', '7fcb6315be8d62b17137ed654884594f', 0, '', '2022-05-20 18:41:58'),
(216, 'Ezgi Nurefşan', 'Ersoy', 'ezgiersoy26.ee@gmail.com', '$2y$10$9AxTiG1KzVYLrZ0gw.PwdesMdOdNjaUiwA1B0XmmdmHlCWCvl4.a2', '', 1, '', '2022-05-20 18:58:39'),
(218, 'Abdullah', 'Ateş', 'eaates2016@gmail.com', '$2y$10$MbO0cDhVlzeuk5oELsKcPu7JrGSGFoG7lqe0yW0pW9imAQrAinToC', '', 1, '05538550342', '2022-05-22 05:43:56'),
(219, 'Işık', 'Yedigöz', 'iskydgz@gmail.com', '$2y$10$Yi1P4OmiNwLOp7f5/fRXw.FCr.V05CKghdRb32AvgLFN0oXpnriUa', '', 1, '05551810461', '2022-05-22 10:58:08'),
(220, 'Sezen', 'Mert', 'sznkzltg25@gmail.com', '$2y$10$5kXfWVCW5rvSvG26CZGtZOfb/MqmzqJsrgQoUdNC1Re9K5AWaWkhq', '', 1, '5529371318', '2022-05-26 06:57:43'),
(221, 'Emre', 'Güler', 'eguler86@gmail.com', '$2y$10$lYwVu5UDAfzxOWQMM6NEieP8WAj7hmSnSn7cKVk44mduwwvBniQuq', '', 1, '0531297033', '2022-07-06 13:44:52'),
(222, 'Emine', 'Öz', 'Emineee-22@hotmail.com', '$2y$10$2UqN13VBssOh3mupRPuQsO3ylOOzGuj0a5mq1kGkWy8r7e1G9Pa.W', '', 1, '5455424287', '2022-06-22 10:59:59'),
(223, 'Songül', 'Işık', 'Songulisik888@gmail.com', '$2y$10$4rw/tT9M7rflAFmGARa.8O8mkB1dWwn3FjwKtRjcL4YZ/WeAlOknS', '', 1, '05457208615', '2022-06-25 12:49:27'),
(224, 'adem eren', 'uyanık', 'eren.uyanik@ug.bilkent.edu.tr', '$2y$10$H/X8ete9funfURFhKwULB.XU/9fyQ4e5PuNdCaVFWFrWD8ONXghVy', '', 1, '05347924138', '2022-07-03 18:34:38');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

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
