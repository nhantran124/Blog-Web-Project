-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2022 lúc 07:01 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(3, 'Food', 'this is description for food'),
(4, 'Travel', 'this is description for travel'),
(6, 'Game', 'this is description for game'),
(10, 'School', 'Study is good for you');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(4, 'Genshin Impact', 'Genshin Impact[b] l&agrave; một tr&ograve; chơi h&agrave;nh động nhập vai do miHoYo của Trung Quốc ph&aacute;t triển v&agrave; được xuất bản lần đầu v&agrave;o năm 2020. Genshin Impact l&agrave; IP được miHoYo ph&aacute;t triển tiếp nối sau sản phẩm trước l&agrave; series Honkai.[c] Tr&ograve; chơi được ph&aacute;t h&agrave;nh tr&ecirc;n Microsoft Windows, PlayStation 4, iOS, v&agrave; Android v&agrave;o năm 2020 v&agrave; tr&ecirc;n PlayStation 5 v&agrave;o năm 2021. Tr&ograve; chơi đang trong qu&aacute; tr&igrave;nh thiết lập để ph&aacute;t h&agrave;nh tr&ecirc;n hệ m&aacute;y Nintendo Switch. Tr&ograve; chơi c&oacute; m&ocirc;i trường thế giới mở theo phong c&aacute;ch anime v&agrave; hệ thống chiến đấu dựa tr&ecirc;n h&agrave;nh động sử dụng nguy&ecirc;n tố ph&eacute;p thuật v&agrave; chuyển đổi giữa c&aacute;c nh&acirc;n vật. Đ&acirc;y l&agrave; một tr&ograve; chơi free-to-play (chơi miễn ph&iacute;) v&agrave; kiếm tiền th&ocirc;ng qua cơ chế quay gacha nơi người chơi c&oacute; thể nhận nh&acirc;n vật hoặc vũ kh&iacute; mới. Tr&ograve; chơi được cập nhật thường xuy&ecirc;n th&ocirc;ng qua c&aacute;c bản v&aacute; sử dụng tr&ograve; chơi dưới dạng m&ocirc; h&igrave;nh dịch vụ.', '165867580688450801_p0_master1200.jpg', '2022-07-24 15:16:46', 3, 1, 0),
(5, 'Đại Học Văn Lang', 'Đại học Văn Lang (Van Lang University) được th&agrave;nh lập theo quyết định số 71/TTg năm 1995 của Thủ tướng Ch&iacute;nh phủ. Đ&acirc;y l&agrave; trường đại học đa ng&agrave;nh, đ&agrave;o tạo theo định hướng ứng dụng. Đại học Văn Lang hiện trực thuộc Tập đo&agrave;n gi&aacute;o dục Văn Lang.', '1658675943image-20220401164117-1.jpeg', '2022-07-24 15:19:03', 3, 1, 0),
(6, 'Wuthering Waves', 'Wuthering Waves is a story-rich open-world game with a high degree of freedom. You wake from your slumber as a Rover, greeted by an expansive new world filled with novel sights and newfangled tech.', '1658676846FTyXsa2WQAA6c1-.jpg', '2022-07-24 15:34:06', 6, 16, 0),
(10, 'LOL', 'Li&ecirc;n Minh Huyền Thoại (tiếng Anh: League of Legends, viết tắt: LMHT hoặc LoL) l&agrave; một tr&ograve; chơi video thể loại đấu trường trận chiến trực tuyến nhiều người chơi (MOBA - Multiplayer Online Battlefield Arena) được Riot Games ph&aacute;t triển v&agrave; ph&aacute;t h&agrave;nh tr&ecirc;n nền tảng Windows v&agrave; MacOS, lấy cảm hứng từ bản mod Defense of the Ancients cho tr&ograve; chơi video Warcraft III: Frozen Throne. N&oacute; l&agrave; một tr&ograve; chơi được chơi miễn ph&iacute; v&agrave; được hỗ trợ bởi c&aacute;c vi giao dịch (micro-transaction). Tr&ograve; chơi được c&ocirc;ng bố đầu ti&ecirc;n v&agrave;o ng&agrave;y 7 th&aacute;ng 10 năm 2008 v&agrave; ph&aacute;t h&agrave;nh v&agrave;o ng&agrave;y 27 th&aacute;ng 10 năm 2009.[1] Kể từ khi ph&aacute;t h&agrave;nh, Li&ecirc;n Minh Huyền Thoại được đ&oacute;n nhận rất t&iacute;ch cực, v&agrave; trở n&ecirc;n phổ biến trong những năm sau đ&oacute;. Theo một b&agrave;i b&aacute;o của Forbes năm 2012, Li&ecirc;n Minh Huyền Thoại l&agrave; tr&ograve; chơi m&aacute;y t&iacute;nh được chơi nhiều nhất ở Bắc Mỹ v&agrave; Ch&acirc;u &Acirc;u về số giờ chơi.[2] Đến th&aacute;ng 1 năm 2014, c&oacute; 67 triệu người chơi Li&ecirc;n Minh Huyền Thoại mỗi th&aacute;ng, 27 triệu người mỗi ng&agrave;y, v&agrave; hơn 7,5 triệu người c&ugrave;ng l&uacute;c trong những thời điểm cao nhất. Đ&acirc;y được coi l&agrave; một trong những tựa game th&agrave;nh c&ocirc;ng nhất mọi thời đại[3]. Th&aacute;ng 9 năm 2016, ước t&iacute;nh c&oacute; hơn 100 triệu người chơi mỗi th&aacute;ng[4][5].', '1658681649unnamed.jpg', '2022-07-24 16:54:09', 6, 16, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Giang ', 'Nhat Quang', 'a', 'quang@gmail.com', '$2y$10$Fef0GpI.Rmh6aGCcoatlaO3TNeJz9hDJOAhbfkYYh5V.f9whttZ0q', '1658417993_meo_su_tu.jpg', 1),
(16, 'HỨA TRUNG', 'KI&Ecirc;N', 'admin', 'huatrungkien126@gmail.com', '$2y$10$sZbdTkP40Po/9Bb3LPcLZuxnmSrwC5EKYVlau0HzFlWyMtY4N6PI2', '1658676047_admin-icon-vector-male-user-person-profile-avatar-with-gear-cogwheel-for-settings-and-configuration-in-flat-color-glyph-pictogram-illustration-tcxt95.jpg', 1),
(17, 'TRAN', 'THANH NHAN', 'nhan123', 'nhan@gmail.com', '$2y$10$c.yD9Hk8YC5tH7ct16CnoORneACMcAI5sSjyszNaI7Svw0Q9TXRxW', '1658681774_admin-icon-vector-male-user-person-profile-avatar-with-gear-cogwheel-for-settings-and-configuration-in-flat-color-glyph-pictogram-illustration-tcxt95.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
