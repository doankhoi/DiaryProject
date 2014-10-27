-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2014 at 10:33 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_articles`
--

CREATE TABLE IF NOT EXISTS `tb_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `privileges_id` int(11) DEFAULT NULL,
  `subjects_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `privileges_id` (`privileges_id`),
  KEY `subjects_id` (`subjects_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_articles`
--

INSERT INTO `tb_articles` (`id`, `title`, `content`, `created`, `updated`, `privileges_id`, `subjects_id`, `users_id`) VALUES
(2, 'Ngày đầu tiên đi học', 'Ngày đầu tiên đi học\r\nMẹ dắt tay đến trường\r\nEm vừa đi vừa khóc , mẹ dỗ dành yêu thương!\r\n\r\nNgày đầu tiên đi học\r\nEm mắt ướt nhạt nhòa\r\nCô vỗ về an ủi , chao ôi sao thiết tha!\r\n\r\nNgày đầu như thế đó\r\nCô giáo như mẹ hiền\r\nEm bây giờ cứ ngỡ , cô giáo là cô tiên\r\n\r\nEm bây giờ khôn lớn\r\nVẫn nhớ về ngày xưa\r\nNgày đầu tiên đi học\r\nMẹ cô cùng vỗ về', '2014-10-01 21:16:38', '2014-10-01 21:16:38', 1, 1, 4),
(3, 'Bài văn điểm thấp', 'Trong những ngày gần đây, hàng chục ngàn người Hong Kong, trong đó chủ yếu là thanh niên, học sinh, sinh viên đã đổ xuống đường phố, phong tỏa khu trung tâm để phản đối kế hoạch can thiệp vào cuộc bầu cử lãnh đạo Hong Kong của Bắc Kinh.\r\nDù vấp phải phản ứng quyết liệt từ chính quyền và cảnh sát chống bạo động, dù phải đối phó với hơi cay và dùi cui, nhưng những người trẻ Hong Kong tham gia vào cuộc biểu tình này vẫn có những nét văn hóa đặc thù không lẫn vào đâu được.\r\n\r\nĐi biểu tình vẫn làm bài tập về nhà\r\n\r\nĐây là cuộc biểu tình lớn nhất Hong Kong kể từ khi thành phố này được trao trả lại cho Trung Quốc vào năm 1997 với sự tham gia của hàng chục ngàn người đủ mọi tầng lớp, trong đó chủ yếu là học sinh, sinh viên.', '2014-10-01 21:51:44', '2014-10-01 21:51:44', 2, 1, 6),
(4, 'Bài viết này của vương anh', 'Nội dung của bài viết vương anh', '2014-10-13 07:36:57', '2014-10-13 07:36:57', 1, 1, 6),
(5, 'Bài viết mới của doankhoi', '<p>Kh&ocirc;ng <strong>c&oacute; g&igrave; đ&acirc;u</strong></p>', '2014-10-23 16:27:58', '2014-10-23 16:27:58', 1, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE IF NOT EXISTS `tb_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `articles_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `articles_id` (`articles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id`, `content`, `flag`, `created`, `updated`, `users_id`, `articles_id`) VALUES
(1, 'Cảm ơn bạn đã chia sẻ', 0, '2014-10-03 08:59:55', '2014-10-03 08:59:55', 5, 2),
(2, 'Cảm ơn bạn đã chia sẻ', 0, '2014-10-13 07:38:07', '2014-10-13 07:38:07', 5, 4),
(3, 'Bài viết khá hay', 0, '2014-10-13 14:23:30', '2014-10-13 14:23:30', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_friends_users`
--

CREATE TABLE IF NOT EXISTS `tb_friends_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_flag` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_flag` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_invitations`
--

CREATE TABLE IF NOT EXISTS `tb_invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `articles_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_id` (`articles_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_invitations`
--

INSERT INTO `tb_invitations` (`id`, `flag`, `created`, `users_id`, `articles_id`) VALUES
(1, 0, '2014-10-01 21:17:53', 5, 2),
(2, 0, '2014-10-01 21:52:25', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_privileges`
--

CREATE TABLE IF NOT EXISTS `tb_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_privileges`
--

INSERT INTO `tb_privileges` (`id`, `description`) VALUES
(1, 'Public'),
(2, 'Protected1'),
(3, 'Protected2'),
(4, 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profiles`
--

CREATE TABLE IF NOT EXISTS `tb_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `introducted` text COLLATE utf8_unicode_ci,
  `birthday` date NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hobby` tinytext COLLATE utf8_unicode_ci,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_profiles`
--

INSERT INTO `tb_profiles` (`id`, `avatar`, `name`, `introducted`, `birthday`, `address`, `phone`, `sex`, `created`, `updated`, `hobby`, `users_id`) VALUES
(4, '821819_liverpool-logo_620.jpg.png', 'Đoàn Ngọc Khởi', NULL, '2014-09-22', 'Thái Bình', '01644090845', 'Male', '2014-09-21 21:46:33', '2014-09-21 21:46:33', 'Bóng bàn, Bóng đá', 4),
(5, '25-09-12-23-25.jpg', 'Đoàn Ngọc Khởi', NULL, '2014-09-22', 'Thái Bình', '01644090845', 'Male', '2014-09-21 21:49:41', '2014-09-21 21:49:41', 'Bóng bàn, Bóng đá', 5),
(6, 'ferrari-458-italia_3.jpg', 'Nguyễn Anh Vương', NULL, '2014-10-12', 'Hà Nội', '011145678', 'Female', '2014-10-01 09:48:25', '2014-10-01 09:48:25', 'Thích xem phim, nghe nhạc', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_schedules`
--

CREATE TABLE IF NOT EXISTS `tb_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `time` datetime NOT NULL,
  `notes` tinytext COLLATE utf8_unicode_ci,
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_schedules`
--

INSERT INTO `tb_schedules` (`id`, `title`, `created`, `time`, `notes`, `priority`, `users_id`) VALUES
(1, 'Ngày mai thi', '2014-10-23 22:57:11', '2014-10-24 00:00:00', 'Cần mang đầy đủ giấy tờ\r\nthẻ sinh viên,\r\nchứng minh thư', 0, 6),
(2, 'Học quản trị dự án', '2014-10-23 22:57:11', '2014-10-24 00:00:00', 'Học bù quản trị dự án tại Tc 301', 1, 6),
(3, 'Chụp ảnh cùng bạn', '2014-10-25 17:03:59', '2014-10-10 00:00:00', 'Cùng nhóm bạn đi chụp ảnh kỉ niệm', 0, 6),
(4, 'Học cơ sở dữ liệu', '2014-10-25 20:33:00', '2014-10-27 00:00:00', 'Học truy vấn SQL', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subjects`
--

CREATE TABLE IF NOT EXISTS `tb_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_subjects`
--

INSERT INTO `tb_subjects` (`id`, `description`, `users_id`) VALUES
(1, 'Học đường', NULL),
(2, 'Vu vơ', NULL),
(3, 'Mục mới', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `repassword` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirm_flag` tinyint(4) NOT NULL DEFAULT '0',
  `profiles_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_id` (`profiles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `repassword`, `email`, `created`, `updated`, `confirm_flag`, `profiles_id`) VALUES
(4, 'anh', 'c3284d0f94606de1fd2af172aba15bf3', 'c3284d0f94606de1fd2af172aba15bf3', 'doanngockhoi93@gmail.com', '2014-09-21 21:46:33', '2014-09-21 21:46:33', 0, NULL),
(5, 'doanngockhoi', '6dae0374137398cd7249f4529b456bd7', '6dae0374137398cd7249f4529b456bd7', 'admin@gmail.com', '2014-09-21 21:49:41', '2014-09-21 21:49:41', 0, NULL),
(6, 'vuonganh', '5e9cac55109c8826e75ef85deb210142', '5e9cac55109c8826e75ef85deb210142', 'vuonganh@gmail.com', '2014-10-01 09:48:25', '2014-10-01 09:48:25', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users_likes`
--

CREATE TABLE IF NOT EXISTS `tb_users_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `flag` tinyint(4) DEFAULT '0',
  `users_id` int(11) DEFAULT NULL,
  `articles_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_id` (`articles_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_users_likes`
--

INSERT INTO `tb_users_likes` (`id`, `created`, `updated`, `flag`, `users_id`, `articles_id`) VALUES
(1, '2014-10-03 09:39:50', '2014-10-03 09:39:50', 0, 5, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_articles`
--
ALTER TABLE `tb_articles`
  ADD CONSTRAINT `tb_articles_ibfk_1` FOREIGN KEY (`privileges_id`) REFERENCES `tb_privileges` (`id`),
  ADD CONSTRAINT `tb_articles_ibfk_2` FOREIGN KEY (`subjects_id`) REFERENCES `tb_subjects` (`id`),
  ADD CONSTRAINT `tb_articles_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`),
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`articles_id`) REFERENCES `tb_articles` (`id`);

--
-- Constraints for table `tb_friends_users`
--
ALTER TABLE `tb_friends_users`
  ADD CONSTRAINT `tb_friends_users_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_invitations`
--
ALTER TABLE `tb_invitations`
  ADD CONSTRAINT `tb_invitations_ibfk_1` FOREIGN KEY (`articles_id`) REFERENCES `tb_articles` (`id`),
  ADD CONSTRAINT `tb_invitations_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD CONSTRAINT `tb_profiles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_schedules`
--
ALTER TABLE `tb_schedules`
  ADD CONSTRAINT `tb_schedules_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`profiles_id`) REFERENCES `tb_profiles` (`id`);

--
-- Constraints for table `tb_users_likes`
--
ALTER TABLE `tb_users_likes`
  ADD CONSTRAINT `tb_users_likes_ibfk_1` FOREIGN KEY (`articles_id`) REFERENCES `tb_articles` (`id`),
  ADD CONSTRAINT `tb_users_likes_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
