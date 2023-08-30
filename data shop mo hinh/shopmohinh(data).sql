-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 09:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmohinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `fullname`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Đăng Toàn', 'toannd@gmail.com', 'c75112f364363a03cfdb88eb90361af0', 1, '2023-08-03 02:57:23', '2023-08-03 07:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_role`
--

CREATE TABLE `tbl_account_role` (
  `id` bigint(20) NOT NULL,
  `name_role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account_role`
--

INSERT INTO `tbl_account_role` (`id`, `name_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-08-03 03:03:46', '2023-08-03 03:03:46'),
(2, 'Thường', '2023-08-03 03:03:59', '2023-08-03 03:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_blog` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) NOT NULL,
  `name_cate` varchar(100) NOT NULL,
  `image_cate` varchar(500) NOT NULL,
  `banner` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name_cate`, `image_cate`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ô tô', 'Ô tô-2023-08-13.webp', 'banner-Ô tô-2023-08-13.webp', 1, '2023-08-13 00:23:05', '2023-08-13 00:23:05'),
(2, 'Xe chuyên dụng', 'Xe chuyên dụng-2023-08-13.webp', 'banner-Xe chuyên dụng-2023-08-13.webp', 1, '2023-08-13 00:23:24', '2023-08-13 00:23:24'),
(3, 'Mô tô', 'Mô tô-2023-08-13.webp', 'banner-Mô tô-2023-08-13.webp', 1, '2023-08-13 00:23:52', '2023-08-13 00:23:52'),
(4, 'Xe dạp', 'Xe dạp-2023-08-13.webp', 'banner-Xe dạp-2023-08-13.webp', 1, '2023-08-13 00:24:26', '2023-08-13 00:24:26'),
(5, 'Máy bay', 'Máy bay-2023-08-13.webp', 'banner-Máy bay-2023-08-13.webp', 1, '2023-08-13 00:24:40', '2023-08-13 00:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` bigint(20) NOT NULL,
  `name_customer` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `district_id` bigint(20) NOT NULL,
  `ward_id` bigint(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `method_pack` varchar(100) NOT NULL,
  `method_checkout` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `total_money` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` bigint(20) NOT NULL,
  `name_prd` varchar(200) NOT NULL,
  `img_prd` varchar(500) NOT NULL,
  `price_prd` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_code` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` bigint(20) NOT NULL,
  `name_prd` varchar(200) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_prd` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `detail` text NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name_prd`, `price`, `image_prd`, `description`, `detail`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mô hình xe Ford Bronco Badlands 2021 Off Road 1:24 Maisto 32541', 499000, 'caf98d62669876db2e7f4846a23e8b12-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:24&nbsp;</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật, một số chi tiết được mạ chrome.</li>\r\n	<li>Sơn: Lớp sơn mịn, dầy bền v&agrave; b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: Xe mở được 2 cửa. B&aacute;nh xe kh&ocirc;ng đ&aacute;nh l&aacute;i được.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 20cm, ngang 9cm, cao 7cm</li>\r\n	<li>Trọng Lượng: 650g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: MAISTO</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/ford-bronco-badlands-2021-off-road-124-maisto-32541-matte-black_db57a485c313496da8977ba985c08438_1024x1024.png\" /></p>', '<p><strong>Giới thiệu sản phẩm:&nbsp;</strong></p>\r\n\r\n<p>M&ocirc; h&igrave;nh Ford Bronco Badlands 2021 Off Road được chế t&aacute;c bởi h&atilde;ng m&ocirc; h&igrave;nh Maisto. Nh&agrave; sản xuất đ&atilde; rất trau chuốt cho mẫu m&ocirc; h&igrave;nh với vẻ ngo&agrave;i cứng c&aacute;p, mạnh mẽ c&ugrave;ng nội thất tương đối bắt mắt người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<p>Chất liệu của m&ocirc; h&igrave;nh được đ&uacute;c bằng khung kim loại, lốp xe bằng cao su v&agrave; một số chi tiết được phủ lớp mạ chrome.</p>', 1, 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(2, 'Mô hình xe Lamborghini Terzo Milennio 1:24 Bburago - 18-21094', 429000, 'dc1014fd80b01af0fb206219dce7a548-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:24&nbsp;</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật, một số chi tiết được mạ chrome.</li>\r\n	<li>Sơn: Lớp sơn mịn, dầy bền v&agrave; b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: Xe mở được 2 cửa</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 19cm, ngang 9cm, cao 5cm</li>\r\n	<li>Trọng Lượng: (đang cập nhật)</li>\r\n	<li>H&atilde;ng sản xuất: Bburago</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe Lamborghini Terzo Milennio 1:24 Bburago - 18-21094\" src=\"https://file.hstatic.net/1000328919/file/a__36__ae299291bc77475faa80523018869aa2_1024x1024.jpg\" /></p>', '<h4>Giới thiệu</h4>\r\n\r\n<p>Lamborghini Terzo Millennio được ra mắt v&agrave;o năm 2017,&nbsp;với t&ecirc;n m&atilde; LB48H,&nbsp;T&ecirc;n gọi Terzo Millenio, c&oacute; nghĩa Thi&ecirc;n ni&ecirc;n kỷ thứ 3&nbsp;trong tiếng Italia, với điểm nhấn ch&iacute;nh l&agrave; th&acirc;n vỏ t&iacute;ch hợp c&aacute;c thiết bị dự trữ năng lượng v&agrave; c&oacute; khả năng tự liền&nbsp;khi bị nứt sau va chạm. Đ&acirc;y l&agrave; si&ecirc;u xe&nbsp;Concept&nbsp;chạy điện đầu ti&ecirc;n do Lamborghini chế tạo, được ra đời nhằm kế nhiệm cho đ&agrave;n anh&nbsp;Lamborghini Aventador đ&igrave;nh đ&aacute;m.&nbsp;</p>\r\n\r\n<h4><strong>Hiệu suất động cơ v&agrave; c&ocirc;ng nghệ tr&ecirc;n Lamborghini&nbsp;Terzo Millennio</strong></h4>\r\n\r\n<p>Si&ecirc;u phẩm Lamborghini Terzo Millennio được trang bị c&ocirc;ng nghệ si&ecirc;u tụ điện c&oacute; khả năng nhận, truyền điện nhanh hơn c&aacute;c loại pin truyền thống v&agrave; c&oacute; khả năng dự trữ cao hơn b&igrave;nh thường.Si&ecirc;u phẩm n&agrave;y được ch&agrave;o b&aacute;n với gi&aacute; hơn 2,5 triệu USD v&agrave; sản xuất giới hạn chỉ 63 chiếc tr&ecirc;n to&agrave;n thế giới. Ngo&agrave;i ra theo th&ocirc;ng tin cho biết 63 si&ecirc;u phẩm hybird n&agrave;y đều đ&atilde; c&oacute; chủ.</p>\r\n\r\n<h3><strong>M&ocirc; h&igrave;nh xe Lamborghini Terzo Millennio 1:24 Bburago</strong></h3>\r\n\r\n<p><strong>Giới thiệu:</strong>&nbsp; M&ocirc; h&igrave;nh xe Lamborghini Terzo Millennio ở&nbsp;<strong>tỷ lệ 1:24</strong>, được chế t&aacute;c bởi h&atilde;ng m&ocirc; h&igrave;nh&nbsp;<strong>Bburago.&nbsp;</strong>Mặc d&ugrave; c&oacute; k&iacute;ch thước nhỏ gọn với chiều&nbsp;d&agrave;i chỉ 18cm, ngang 8cm, cao 6cm, nhưng Bburago đ&atilde; rất trau chuốt trong từng chi tiết ngoại thất cũng như nội thất,khiến cho mẫu m&ocirc; h&igrave;nh thể hiện được sự mạnh mẽ, hầm hố v&agrave; đến từ tương lai&nbsp;đ&uacute;ng chất của si&ecirc;u phẩm Terzo Millennio xe thật. Mẫu m&ocirc; h&igrave;nh xe Lamborghini Terzo Millennio tỷ lệ 1:24 n&agrave;y c&oacute; thể mở được 2 cửa theo kiểu c&aacute;nh chim, m&ocirc; phỏng thực tế đ&uacute;ng với xe thật.</p>', 1, 1, '2023-08-13 01:39:23', '2023-08-13 01:39:23'),
(3, 'Mô hình xe Lamborghini Aventador LP700-4 1:24 Welly', 449000, '01b751a71ef24f38ea9457a00e593d8e-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:24&nbsp;</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật, một số chi tiết được mạ chrome.</li>\r\n	<li>Sơn: Lớp sơn mịn, dầy bền v&agrave; b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: Xe mở được 2 cửa v&agrave; capo trước. B&aacute;nh xe đ&aacute;nh l&aacute;i được, cửa xe c&oacute; k&iacute;nh.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 19cm, ngang 9cm, cao 5cm</li>\r\n	<li>Trọng Lượng: (đang cập nhật)</li>\r\n	<li>H&atilde;ng sản xuất: WELLY</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe Lamborghini Aventador LP700-4 1:24 Welly\" src=\"https://file.hstatic.net/1000328919/file/lp700-4_82b63fecb9b749cba29780571a98248d_1024x1024.jpg\" /></p>', '<h4><strong>Ng&agrave;y ra mắt</strong></h4>\r\n\r\n<p><strong>Lamborghini Aventador</strong>&nbsp;Được ra mắt v&agrave;o ng&agrave;y 28 th&aacute;ng 2 năm 2011 tại Geneva Motor Show, 5 th&aacute;ng sau khi ra mắt tại Sant&#39;Agata Bolognese, chiếc xe được đặt t&ecirc;n m&atilde; l&agrave; LB834, được thiết kế để thay thế cho mẫu xe cũ Murci&eacute;lago.</p>\r\n\r\n<p>Ngay sau khi Aventador ra mắt, Lamborghini đ&atilde; sản xuất được 5000 chiếc Aventadors, mất năm năm để đạt được mốc quan trọng n&agrave;y. (t&iacute;nh đến th&aacute;ng 3 năm 2016)</p>\r\n\r\n<h4><strong>Th&ocirc;ng số v&agrave; hiệu suất</strong></h4>\r\n\r\n<p>Aventador&nbsp;LP 700&ndash;4 sử dụng&nbsp;động cơ V12&nbsp;6.5 l&iacute;t 60&deg; 700&nbsp;PS (510&nbsp;kW; 690&nbsp;bhp) nặng 235&nbsp;kg mới của Lamborghini.</p>\r\n\r\n<ul>\r\n	<li>0&ndash;100&nbsp;km/h (0&ndash;62&nbsp;mph): 2.9 gi&acirc;y</li>\r\n	<li>Tốc độ tối đa: Ch&iacute;nh thức: 354&nbsp;km/h (220&nbsp;mph)</li>\r\n	<li>Gi&aacute; b&aacute;n mỗi chiếc khoảng:&nbsp;393.695 USD</li>\r\n</ul>\r\n\r\n<h4><strong>Sự kiện xuất hiện</strong></h4>\r\n\r\n<p>Lamborghini Aventador LP700-4 đ&atilde; từng xuất hiện trong phim&nbsp;Transformers Age of Extinction&nbsp;năm 2014 v&agrave;&nbsp;The Dark Knight Rises 2012.</p>', 1, 1, '2023-08-13 01:42:07', '2023-08-13 01:42:07'),
(4, 'Mô hình xe Ford GT 1:36 RMZ', 139000, '4236e6986a3f865d72529bdb087c6130-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:36</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng tinh xảo v&agrave; sắc n&eacute;t, một số chi tiết được mạ chrome. Sản phẩm cao cấp b&ecirc;n trong được l&oacute;t thảm.</li>\r\n	<li>Sơn: Lớp sơn tĩnh điện cho độ bền v&agrave; b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: Xe mở được 2 cửa. B&aacute;nh xe kh&ocirc;ng đ&aacute;nh l&aacute;i được. Ngo&agrave;i ra xe c&oacute; trớn</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 12cm, ngang 5cm, cao 3cm</li>\r\n	<li>Trọng Lượng: (cập nhật sau)</li>\r\n	<li>H&atilde;ng sản xuất: RMZ</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/ford-gt-136-rmz-police_cfc9b901a5d745bd90b0435df5131f69_1024x1024.png\" /></p>', '<p><strong>Giới thiệu:</strong>&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom...&nbsp;M&ocirc; h&igrave;nh xe&nbsp;với k&iacute;ch cỡ thu nhỏ 36&nbsp;lần sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 1, 1, '2023-08-13 01:44:01', '2023-08-13 01:44:01'),
(5, 'Mô hình xe Xúc New Holland W170D Bburago - MH18-32083', 237150, 'fe11c329302ca8be2232e1bcbe381962-08-13.webp', '<ul>\r\n	<li>Chất liệu : To&agrave;n bộ khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn : Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng : C&oacute; thể vận h&agrave;nh n&ecirc;n l&ecirc;n hạ xuống, xoay theo &yacute; muốn của bạn, b&aacute;nh xe c&oacute; thể quay.</li>\r\n	<li>K&iacute;ch thước :d&agrave;i 20cm, ngang 9cm, cao 5cm</li>\r\n	<li>Trọng Lượng : 500g</li>\r\n	<li>H&atilde;ng sản xuất : BBURAGO</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe Xúc New Holland W170D Bburago\" src=\"https://file.hstatic.net/1000328919/file/mo-hinh-xe-xuc-new-holland-w170d-bburago_8edf4ca9878541d599883de86fb3b4e1_1024x1024.jpg\" /></p>', '<p><strong><strong>Giới thiệu :</strong>&nbsp;M&Ocirc; H&Igrave;NH XE X&Uacute;C<strong>&nbsp;</strong>&nbsp;</strong>được m&ocirc; phỏng rất chi tiết, được sơn tĩnh điện tinh tế, kh&ocirc;ng bị lem, rất ph&ugrave; hợp để trưng b&agrave;y ở b&agrave;n l&agrave;m việc, ph&ograve;ng ngủ, showroom,... ngo&agrave;i ra bạn c&oacute; thể x&acirc;y dựng một m&ocirc; h&igrave;nh thu nhỏ về xe c&ocirc;ng tr&igrave;nh cho ri&ecirc;ng m&igrave;nh.</p>', 2, 1, '2023-08-13 02:30:48', '2023-08-13 02:32:30'),
(6, 'Mô hình xe Volvo EC220E Excavator Construction 1:50 Bburago', 289000, 'c3c6a6a06cca032539b1c0bd1b24f1ba-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: K&iacute;ch cỡ 1:50</li>\r\n	<li>&nbsp;Chất liệu: To&agrave;n bộ khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>&nbsp;Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>&nbsp;Chức năng: C&oacute; thể vận h&agrave;nh n&ecirc;n l&ecirc;n hạ xuống, xoay theo &yacute; muốn của bạn, b&aacute;nh xe c&oacute; thể quay.</li>\r\n	<li>&nbsp;K&iacute;ch thước: (đang cập nhật)</li>\r\n	<li>&nbsp;Trọng Lượng: (đang cập nhật)</li>\r\n	<li>&nbsp;H&atilde;ng sản xuất: BBURAGO</li>\r\n	<li>&nbsp;Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>', '<p><strong><strong>Giới thiệu :</strong>&nbsp;M<strong>&ocirc; h&igrave;nh&nbsp;Volvo EC220E Excavator Construction 1:50 Bburago</strong>&nbsp;</strong>được m&ocirc; phỏng rất chi tiết, được sơn tĩnh điện tinh tế, kh&ocirc;ng bị lem, rất ph&ugrave; hợp để trưng b&agrave;y ở b&agrave;n l&agrave;m việc, ph&ograve;ng ngủ, showroom,... ngo&agrave;i ra bạn c&oacute; thể x&acirc;y dựng một M&ocirc; h&igrave;nh thu nhỏ về xe c&ocirc;ng tr&igrave;nh cho ri&ecirc;ng m&igrave;nh.</p>', 2, 1, '2023-08-13 02:32:24', '2023-08-13 02:32:24'),
(7, 'Mô hình xe tải đồ chơi Jiaye', 249000, 'efcfac2a948d5eacbeb3cbea147fb274-08-13.webp', '<ul>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật, một số chi tiết được mạ chrome.</li>\r\n	<li>Sơn: Lớp sơn mịn, dầy bền v&agrave; b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: từng sản phẩm c&oacute; chức năng ri&ecirc;ng được ch&uacute; th&iacute;ch ở từng h&igrave;nh.</li>\r\n	<li>K&iacute;ch thước: (đang cập nhật)</li>\r\n	<li>Trọng Lượng: (đang cập nhật)</li>\r\n	<li>H&atilde;ng sản xuất: Jiaye</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>', '<p>Giới thiệu:&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom...M&ocirc; h&igrave;nh xe&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 2, 1, '2023-08-13 02:34:50', '2023-08-13 02:34:50'),
(8, 'Mô hình xe Lu 1:50 KDW 625018', 299000, '8d687355d3a5d302fec03d4491555c54-08-13.webp', '<ul>\r\n	<li>Tỉ lệ : K&iacute;ch cỡ 1:50</li>\r\n	<li>Chất liệu: To&agrave;n bộ khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: C&oacute; thể vận h&agrave;nh n&ecirc;n l&ecirc;n hạ xuống, xoay theo &yacute; muốn của bạn, b&aacute;nh xe c&oacute; thể quay.</li>\r\n	<li>K&iacute;ch thước:d&agrave;i 25cm, ngang 4cm, cao 7cm</li>\r\n	<li>Trọng Lượng: 500g</li>\r\n	<li>H&atilde;ng sản xuất: KDW</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>', '<p><strong>Giới thiệu:</strong>&nbsp;M&ocirc; h&igrave;nh xe&nbsp;được m&ocirc; phỏng rất chi tiết, được sơn tĩnh điện tinh tế, kh&ocirc;ng bị lem, rất ph&ugrave; hợp để trưng b&agrave;y ở b&agrave;n l&agrave;m việc, ph&ograve;ng ngủ, showroom,... ngo&agrave;i ra bạn c&oacute; thể x&acirc;y dựng một m&ocirc; h&igrave;nh thu nhỏ về xe c&ocirc;ng tr&igrave;nh cho ri&ecirc;ng m&igrave;nh.</p>', 2, 1, '2023-08-13 02:36:45', '2023-08-13 02:36:45'),
(9, 'Mô hình xe mô tô Ducati V4S 1:12 Huayi', 259000, 'ca2d3e155de334fea26dac826ebc864c-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:12</li>\r\n	<li>Chất liệu: B&igrave;nh xăng v&agrave; khung xe được l&agrave;m bằng kim loại. D&agrave;n &aacute;o bằng nhựa, lốp xe l&agrave;m bằng cao su.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: B&aacute;nh xe c&oacute; thể quay được, đ&aacute;nh l&aacute;i được v&agrave; phuộc nh&uacute;n được. Ngo&agrave;i ra xe c&ograve;n c&oacute; chống nghi&ecirc;ng, đế trưng b&agrave;y, c&oacute; đ&egrave;n v&agrave; nhạc.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 17cm, ngang 6cm, cao 9cm</li>\r\n	<li>Trọng Lượng: (cập nhật sau)&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: HUAYI</li>\r\n</ul>', '<p><strong>Giới thiệu:</strong>&nbsp;&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom..M&ocirc; h&igrave;nh xe m&ocirc; t&ocirc;&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 3, 1, '2023-08-13 02:39:53', '2023-08-13 02:39:53'),
(10, 'Mô hình mô tô Ducati Hypermotard SP White 1:12 Maisto MH-31101-5', 279000, '5cdda67563a6f64280e0f1b458b9633e-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:12</li>\r\n	<li>Chất liệu: B&igrave;nh xăng v&agrave; khung xe được l&agrave;m bằng kim loại. D&agrave;n &aacute;o bằng nhựa, lốp xe l&agrave;m bằng cao su.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian.</li>\r\n	<li>Chức năng: B&aacute;nh xe c&oacute; thể quay được, đ&aacute;nh l&aacute;i được v&agrave; phuộc nh&uacute;n được. Ngo&agrave;i ra xe c&ograve;n c&oacute; chống nghi&ecirc;ng.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 17cm, ngang 5cm, cao 9cm</li>\r\n	<li>Trọng Lượng: 650g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: MAISTO</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>', '<p><strong>Giới thiệu:</strong>&nbsp;&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom.. M&ocirc; h&igrave;nh xe&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 3, 1, '2023-08-13 02:43:21', '2023-08-13 02:43:21'),
(11, 'Mô hình xe mô tô Yamaha YZF-R1 2021 1:12 Maisto 21847', 339000, '8010b76f4d2840893736a62deca0e262-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:12</li>\r\n	<li>Chất liệu: B&igrave;nh xăng v&agrave; khung xe được l&agrave;m bằng kim loại. D&agrave;n &aacute;o bằng nhựa, lốp xe l&agrave;m bằng cao su.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian.</li>\r\n	<li>Chức năng: B&aacute;nh xe c&oacute; thể quay được, đ&aacute;nh l&aacute;i được v&agrave; phuộc nh&uacute;n được. Ngo&agrave;i ra xe c&ograve;n c&oacute; chống nghi&ecirc;ng.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 17cm, ngang 5cm, cao 9cm</li>\r\n	<li>Trọng lượng: (cập nhật sau)</li>\r\n	<li>H&atilde;ng sản xuất: Maisto</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>', '<p><strong>Giới thiệu:</strong>&nbsp;&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom..M&ocirc; h&igrave;nh xe m&ocirc; t&ocirc;&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 3, 1, '2023-08-13 02:45:11', '2023-08-13 02:45:11'),
(12, 'Mô hình xe mô tô BMW R1250 GS 1:18 Maisto', 179000, '8dd70d140e00533c31012ed5827e2470-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:18</li>\r\n	<li>Chất liệu: B&igrave;nh xăng v&agrave; khung xe được l&agrave;m bằng kim loại. D&agrave;n &aacute;o bằng nhựa, lốp xe l&agrave;m bằng cao su.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: B&aacute;nh xe c&oacute; thể quay được, đ&aacute;nh l&aacute;i được v&agrave; phuộc nh&uacute;n được. Ngo&agrave;i ra xe c&ograve;n c&oacute; chống nghi&ecirc;ng v&agrave; đế trưng b&agrave;y.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 12cm, ngang 5cm, cao 8cm</li>\r\n	<li>Trọng Lượng: 300g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: MAISTO</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.\r\n	<p><img src=\"https://file.hstatic.net/1000328919/file/form_kich_thuoc_o_to_34_2ada9d815c9c46a39e7e99dfa5ad5d37_1024x1024.jpg\" /></p>\r\n	</li>\r\n</ul>', '<p><strong>Giới thiệu:</strong>&nbsp;&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom..M&ocirc; h&igrave;nh xe m&ocirc; t&ocirc;&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 3, 1, '2023-08-13 02:46:42', '2023-08-13 02:46:42'),
(13, 'Mô hình xe đạp Porsche Bike R 1:10 Welly', 349000, '353784b9993117d2b59077c8524aaa33-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: K&iacute;ch cỡ 1:10</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tuyệt đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian</li>\r\n	<li>Chức năng: B&aacute;nh trước sau quay được, bẻ l&aacute;i được, phuộc, sau nh&uacute;n được, c&oacute; ch&acirc;n chống, nh&ocirc;ng x&iacute;ch chuyển động.</li>\r\n	<li>K&iacute;ch thước:d&agrave;i 17cm, ngang 6cm, cao 10cm</li>\r\n	<li>Trọng Lượng: 800g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: WELLY</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe đạp Porsche Bike R 1:10 Welly\" src=\"https://file.hstatic.net/1000328919/file/mo-hinh-xe-dap-porsche-bike-r-1-10-welly_8bdddae81c09400fb768f895372f533d_1024x1024.jpg\" /></p>', '<p>Giới thiệu:&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom..M&ocirc; h&igrave;nh xe đạp với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 4, 1, '2023-08-13 02:50:05', '2023-08-13 02:50:05'),
(14, 'Mô hình xe đạp Porsche Bike FS Evolution 1:10 Welly', 349000, 'c2b230ecfc86dd52f2b14204cade122e-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: K&iacute;ch cỡ 1:10</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tuyệt đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian</li>\r\n	<li>Chức năng: B&aacute;nh trước sau quay được, bẻ l&aacute;i được, phuộc, sau nh&uacute;n được, c&oacute; ch&acirc;n chống, nh&ocirc;ng x&iacute;ch chuyển động.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 17cm, ngang 6cm, cao 10cm</li>\r\n	<li>Trọng Lượng: 800g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: WELLY</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe đạp Porsche Bike FS Evolution 1:10 Welly\" src=\"https://file.hstatic.net/1000328919/file/mo-hinh-xe-dap-porsche-bike-fs-evolution-1-10-welly_6f851889acf14446a3837a6b35075891_1024x1024.jpg\" /></p>', '<p>Giới thiệu:&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom.. <strong>M&ocirc; h&igrave;nh xe đạp&nbsp;</strong>với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 4, 1, '2023-08-13 02:52:25', '2023-08-13 02:52:25'),
(15, 'Mô hình xe đạp BMW Q6 SXTR 1:10 Welly', 349000, 'f9a194dc641fa29989c1ee83d0d2f612-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: K&iacute;ch cỡ 1:10</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tuyệt đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian</li>\r\n	<li>Chức năng: B&aacute;nh trước sau quay được, bẻ l&aacute;i được, phuộc, sau nh&uacute;n được, c&oacute; ch&acirc;n chống, nh&ocirc;ng x&iacute;ch chuyển động.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 20cm, ngang 8cm, cao 11cm</li>\r\n	<li>Trọng Lượng: 800g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: WELLY</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe đạp BMW Q6 SXTR 1:10 Welly\" src=\"https://file.hstatic.net/1000328919/file/a__128__2ee48f47dfce4a8eabee82fd2fffea84_1024x1024.jpg\" /></p>', '<p>Giới thiệu:&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom.. M&ocirc; h&igrave;nh xe đạp với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 4, 1, '2023-08-13 02:53:44', '2023-08-13 02:53:44'),
(16, 'Mô hình xe đạp Audi Design Cross 1:10 Welly', 349000, '61e3cf6d1192f9db3d3dfe79a15467e8-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:10</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tuyệt đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian</li>\r\n	<li>Chức năng: B&aacute;nh trước sau quay được, bẻ l&aacute;i được, phuộc, sau nh&uacute;n được, c&oacute; ch&acirc;n chống, nh&ocirc;ng x&iacute;ch chuyển động.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 21cm, ngang 8cm, cao 11cm</li>\r\n	<li>Trọng Lượng: 800g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: WELLY</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe đạp Audi Design Cross 1:10 Welly\" src=\"https://file.hstatic.net/1000328919/file/mo-hinh-xe-dap-audi-design-cross-1-10-welly-silver_472270dba9954ae59f1cdd444f5fe592_1024x1024.jpg\" /></p>', '<p>Giới thiệu :&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom.. <strong>M&ocirc; h&igrave;nh xe đạp</strong>&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 4, 1, '2023-08-13 02:55:17', '2023-08-13 02:55:17'),
(17, 'Mô hình máy bay quân sự Apache AH-64 Huayi', 359000, 'f0be37d39d9cc33ac0295ee93d1ff590-08-13.webp', '<ul>\r\n	<li>Tỉ lệ:</li>\r\n	<li>Chất liệu: Kim loại,nhựa,</li>\r\n	<li>Sơn: Được sơn tỉ mỉ, chi tiết tinh tế, sắc sảo, rất th&iacute;ch hợp để trưng b&agrave;y, l&agrave;m qu&agrave; tặng. Hoặc c&oacute; thể sưu tầm th&agrave;nh bộ sưu tập của ri&ecirc;ng bạn.</li>\r\n	<li>Chức năng : Được thiết kế dựa tr&ecirc;n m&aacute;y bay qu&acirc;n sự thật, c&oacute; thể th&aacute;o lắp c&aacute;nh ra khỏi th&acirc;n m&aacute;y bay v&agrave; c&oacute; đ&egrave;n nhạc m&ocirc; phỏng.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 30cm, ngang12cm, cao 15cm</li>\r\n	<li>Trọng Lượng: 470g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: HUAYI</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/13_60cb1410abd242daaf8a7fd341898b7f_1024x1024.png\" /></p>', '<p><strong>AH-64 Apache</strong>&nbsp;l&agrave; một loại&nbsp;m&aacute;y bay trực thăng tấn c&ocirc;ng&nbsp;của&nbsp;Lục qu&acirc;n Hoa Kỳ, v&agrave; c&aacute;i t&ecirc;n&nbsp;Apache&nbsp;cũng được đặt theo t&ecirc;n một bộ tộc&nbsp;thổ d&acirc;n da đỏ&nbsp;ở&nbsp;Bắc Mỹ.</p>\r\n\r\n<p>Với thiết kế m&ocirc; phỏng như m&aacute;y bay thật.&nbsp;<strong>M&ocirc; h&igrave;nh m&aacute;y bay trực thăng Apache AH-64</strong>&nbsp;được phủ l&ecirc;n th&acirc;n một lớp sơn b&oacute;ng lưỡng chạm v&agrave;o kh&ocirc;ng g&acirc;y nh&aacute;m tay, c&aacute;c chi tiết được thể hiện đầy đủ chi tiế như phần c&aacute;nh quạt, khẩu s&uacute;ng trường b&aacute;n tự động,... Mẫu sản phẩm c&ograve;n c&oacute; đi k&egrave;m LED đỏ v&agrave; nhạc nhỏ.</p>\r\n\r\n<p>Chất liệu m&ocirc; h&igrave;nh được đ&uacute;c khung từ kim loại, phần vỏ ngo&agrave;i l&agrave; nhựa cứng bền bỉ theo thời gian, c&oacute; một số chi tiết được mạ chrome, mặt k&iacute;nh ở phần đầu m&aacute;y bay được l&agrave;m bằng mica c&aacute;ch nhiệt gi&uacute;p mở đ&egrave;n nhạc li&ecirc;n tục m&agrave; kh&ocirc;ng bị n&oacute;ng.</p>\r\n\r\n<p>T&iacute;nh năng của m&ocirc; h&igrave;nh m&aacute;y bay qu&acirc;n sự kh&aacute; nổi trội khi c&oacute; thể lắp r&aacute;p được phần t&ecirc;n lửa với 4 c&aacute;nh quạt trực thăng ph&iacute;a tr&ecirc;n v&agrave; xoay được như thật (thao t&aacute;c ho&agrave;n to&agrave;n bằng tay), ph&iacute;a tr&ecirc;n đầu m&aacute;y bay c&oacute; một n&uacute;t bấm khi ấn v&agrave;o mẫu sẽ ph&aacute;t đ&egrave;n nhạc c&oacute; LED m&agrave;u đỏ.&nbsp;<strong>Apache AH-64</strong>&nbsp;c&ograve;n c&oacute; thể di chuyển b&aacute;nh xe mượt m&agrave; l&ecirc;n xuống.</p>\r\n\r\n<p>Quả l&agrave; một mẫu m&ocirc; h&igrave;nh kh&aacute; l&yacute; tưởng cho c&aacute;c bạn trưng b&agrave;y v&agrave; đi k&egrave;m cực kỳ nhiều t&iacute;nh năng bật nhất m&agrave; ở c&aacute;c ph&acirc;n kh&uacute;c tầm phổ th&ocirc;ng kh&ocirc;ng c&oacute; được, h&atilde;y sở hữu ngay cho m&igrave;nh c&aacute;c bạn nh&eacute;.</p>', 5, 1, '2023-08-13 02:56:58', '2023-08-13 02:56:58'),
(18, 'Mô hình máy bay quân sự V-22 Osprey Bell Boeing Marines 1:72 JL Models', 1479000, '29517e30b157c3194da7f36dc5f9c2fe-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:72</li>\r\n	<li>Chất liệu: Kim loại, nhựa.</li>\r\n	<li>Sơn: Đ&atilde; sơn sẵn.</li>\r\n	<li>Chức năng : C&oacute; thể th&aacute;o lắp đế ra khỏi th&acirc;n m&aacute;y bay.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 24cm, ngang 22cm, cao 17cm</li>\r\n	<li>Trọng Lượng: 605g</li>\r\n	<li>H&atilde;ng sản xuất: JL Models</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/form_kich_thuoc_may_bay_12_f2feaf52b81c4e93b49b90b471bb0522_1024x1024.jpg\" /></p>', '<p>M&ocirc; h&igrave;nh V-22 Osprey Bell Boeing Marines được ph&ocirc;ng phỏng dựa tr&ecirc;n mẫu m&aacute;y bay thật với c&aacute;c chi tiết tinh xảo. M&ocirc; h&igrave;nh đ&atilde; được sơn tĩnh điện v&agrave; k&egrave;m theo đế. Th&iacute;ch hợp để trưng b&agrave;y v&agrave; sưu tầm, c&ograve;n g&igrave; th&uacute; vị hơn khi c&oacute; một bộ sưu tầm tất cả c&aacute;c chiến đấu cơ m&agrave; m&igrave;nh y&ecirc;u th&iacute;ch hoặc l&agrave;m qu&agrave; tặng người th&acirc;n.</p>', 5, 1, '2023-08-13 02:58:31', '2023-08-13 02:58:31'),
(19, 'Mô hình máy bay chiến đấu F-15 Eagle McDonnell Douglas USA 1:100 AmerCom', 599000, '9c1b32baf11521d83d84498ec31ff9e5-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:100</li>\r\n	<li>Chất liệu: Kim loại, nhựa.</li>\r\n	<li>Sơn: Đ&atilde; sơn sẵn.</li>\r\n	<li>Chức năng : C&oacute; thể th&aacute;o lắp đế ra khỏi th&acirc;n m&aacute;y bay.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 19cm, ngang 13cm, cao 11cm</li>\r\n	<li>Trọng Lượng: 220g</li>\r\n	<li>H&atilde;ng sản xuất:&nbsp;AmerCom</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/form_kich_thuoc_may_bay_19_57f3973184d64709b0ccaaf5d2245b7d_1024x1024.jpg\" /></p>', '<p>M&ocirc; h&igrave;nh F-15A Eagle McDonnell Douglas USA được ph&ocirc;ng phỏng dựa tr&ecirc;n mẫu m&aacute;y bay thật với c&aacute;c chi tiết tinh xảo. M&ocirc; h&igrave;nh đ&atilde; được sơn tĩnh điện v&agrave; k&egrave;m theo đế. Th&iacute;ch hợp để trưng b&agrave;y v&agrave; sưu tầm, c&ograve;n g&igrave; th&uacute; vị hơn khi c&oacute; một bộ sưu tầm tất cả c&aacute;c chiến đấu cơ m&agrave; m&igrave;nh y&ecirc;u th&iacute;ch hoặc l&agrave;m qu&agrave; tặng người th&acirc;n.</p>', 5, 1, '2023-08-13 03:00:09', '2023-08-13 03:00:09'),
(20, 'Mô hình máy bay chiến đấu F-14 Tomcat Grumman 1:100 Amer', 629000, 'a6e8df29f1bffc86cac9413361d5578d-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:100</li>\r\n	<li>Chất liệu: Kim loại, nhựa.</li>\r\n	<li>Sơn: Đ&atilde; sơn sẵn.</li>\r\n	<li>Chức năng : C&oacute; thể th&aacute;o lắp đế ra khỏi th&acirc;n m&aacute;y bay.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 19cm, ngang 19cm, cao 12cm</li>\r\n	<li>Trọng Lượng: 295g</li>\r\n	<li>H&atilde;ng sản xuất: Amer</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/form_kich_thuoc_may_bay_8_c8ec3bc21272437ab6c62a0e4205ff62_1024x1024.jpg\" /></p>', '<p>M&ocirc; h&igrave;nh F-14 Tomcat Grumman được ph&ocirc;ng phỏng dựa tr&ecirc;n mẫu m&aacute;y bay thật với c&aacute;c chi tiết tinh xảo. M&ocirc; h&igrave;nh đ&atilde; được sơn tĩnh điện v&agrave; k&egrave;m theo đế. Th&iacute;ch hợp để trưng b&agrave;y v&agrave; sưu tầm, c&ograve;n g&igrave; th&uacute; vị hơn khi c&oacute; một bộ sưu tầm tất cả c&aacute;c chiến đấu cơ m&agrave; m&igrave;nh y&ecirc;u th&iacute;ch hoặc l&agrave;m qu&agrave; tặng người th&acirc;n.</p>', 5, 1, '2023-08-13 03:02:08', '2023-08-13 03:02:08'),
(21, 'Mô hình xe Bus City long 19cm Bburago', 279000, '6f50bf39767df36799f98eea6b75a97d-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:24&nbsp;</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật, một số chi tiết được mạ chrome.</li>\r\n	<li>Sơn: Lớp sơn mịn, dầy bền v&agrave; b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: B&aacute;nh trước,sau quay được, v&ocirc; lăng kh&ocirc;ng&nbsp;đ&aacute;nh l&aacute;i được. Xe mở được 2&nbsp;cửa.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 19.5cm, ngang 5cm, cao 5.5cm</li>\r\n	<li>Trọng Lượng: 1010g</li>\r\n	<li>H&atilde;ng sản xuất: BBURAGO</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.\r\n	<p><img src=\"https://file.hstatic.net/1000328919/file/form_kich_thuoc_o_to_23_7363daa91cae48fc9067bbff3a5ae5a8_1024x1024.jpg\" /></p>\r\n	</li>\r\n</ul>', '<p><strong>Giới thiệu:&nbsp;</strong>Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom... M&ocirc; h&igrave;nh xe&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 1, 1, '2023-08-13 03:04:27', '2023-08-13 03:04:27'),
(22, 'Mô hình Máy Xáng Cạp 1:87 KDW - 625015', 349000, '231b190c4b5da0b7385b7facec1dbee7-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:50</li>\r\n	<li>Chất liệu: To&agrave;n bộ khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: C&oacute; thể vận h&agrave;nh n&ecirc;n l&ecirc;n hạ xuống, xoay theo &yacute; muốn của bạn, b&aacute;nh xe c&oacute; thể quay.</li>\r\n	<li>K&iacute;ch thước:d&agrave;i 18cm, ngang 4cm, cao 10cm</li>\r\n	<li>Trọng Lượng: 500g</li>\r\n	<li>H&atilde;ng sản xuất: KDW</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình Máy Xáng Cạp 1:87 KDW\" src=\"https://file.hstatic.net/1000328919/file/mo-hinh-may-xang-cap-1-87-kdw_4ed48878f7ed41dca7f16ff788a9a349_1024x1024.jpg\" /></p>', '<p>(trống)</p>', 2, 1, '2023-08-13 03:06:17', '2023-08-13 03:06:17'),
(23, 'Mô hình xe mô tô Ducati Super Naked V4 S 1:18 Maisto - 20075', 179000, '32833963e43f23ea64f954817cbb4f44-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 1:18</li>\r\n	<li>Chất liệu: B&igrave;nh xăng v&agrave; khung xe được l&agrave;m bằng kim loại. D&agrave;n &aacute;o bằng nhựa, lốp xe l&agrave;m bằng cao su.</li>\r\n	<li>Sơn: Lớp sơn mịn tương đối, b&oacute;ng ho&agrave;n hảo.</li>\r\n	<li>Chức năng: B&aacute;nh xe c&oacute; thể quay được, đ&aacute;nh l&aacute;i được v&agrave; phuộc nh&uacute;n được. Ngo&agrave;i ra xe c&ograve;n c&oacute; chống nghi&ecirc;ng v&agrave; đế trưng b&agrave;y.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 12cm, ngang 4cm, cao 7cm</li>\r\n	<li>Trọng Lượng: 300g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: MAISTO</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img src=\"https://file.hstatic.net/1000328919/file/form_kich_thuoc_o_to_16_7db863fca433421e9952ff48df9dfd4b_1024x1024.jpg\" /></p>', '<p><strong>Giới thiệu:</strong>&nbsp;&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom..M&ocirc; h&igrave;nh xe m&ocirc; t&ocirc;&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 3, 1, '2023-08-13 03:08:07', '2023-08-13 03:08:07'),
(24, 'Mô hình xe đạp BMW Q5 T 1:10 Welly', 349000, 'a60a829e408f87f59386d71572b99e63-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: K&iacute;ch cỡ 1:10</li>\r\n	<li>Chất liệu: Khung xe đ&uacute;c bằng kim loại, lốp xe bằng cao su, chi tiết xe được m&ocirc; phỏng thiết kế như xe thật.</li>\r\n	<li>Sơn: Lớp sơn mịn tuyệt đối, b&oacute;ng ho&agrave;n hảo, bền đẹp theo thời gian</li>\r\n	<li>Chức năng: B&aacute;nh trước sau quay được, bẻ l&aacute;i được, phuộc, sau nh&uacute;n được, c&oacute; ch&acirc;n chống, nh&ocirc;ng x&iacute;ch chuyển động.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 20cm, ngang 8cm, cao 11cm</li>\r\n	<li>Trọng Lượng: 800g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: WELLY</li>\r\n	<li>Sản phẩm được sản xuất c&oacute; bản quyền.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình xe đạp BMW Q5 T 1:10 Welly\" src=\"https://file.hstatic.net/1000328919/file/a__127__279a116c21d54ce9a2a0db8b8256551e_1024x1024.jpg\" /></p>', '<p>Giới thiệu :&nbsp;Chiếc xe c&oacute; thiết kế như thật với những đường n&eacute;t m&ocirc; phỏng chi tiết, được sơn tĩnh điện tinh tế rất ph&ugrave; hợp để trưng b&agrave;y ở ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, showroom.. <strong>M&ocirc; h&igrave;nh xe đạp</strong>&nbsp;với k&iacute;ch cỡ nhỏ nhắn sẽ trở th&agrave;nh một m&oacute;n sưu tập th&uacute; vị trong ph&ograve;ng của bạn.</p>', 4, 1, '2023-08-13 03:10:05', '2023-08-13 03:10:05'),
(25, 'Mô hình máy bay Vietnam Airlines 16cm Everfly', 169000, 'f1a56dd13a88712f0ddbe313dccea135-08-13.webp', '<ul>\r\n	<li>Tỉ lệ: 16cm</li>\r\n	<li>Chất liệu: M&aacute;y bay được l&agrave;m bằng kim loại, đế bằng nhựa.</li>\r\n	<li>Chức năng: M&aacute;y bay được sơn tĩnh điện, m&ocirc; phỏng y như m&aacute;y bay thật b&ecirc;n ngo&agrave;i. D&ugrave;ng để trưng b&agrave;y hoặc l&agrave;m qu&agrave; tặng.</li>\r\n	<li>K&iacute;ch thước: d&agrave;i 19cm, ngang 16cm, cao 10cm</li>\r\n	<li>Trọng Lượng: 250g&nbsp;</li>\r\n	<li>H&atilde;ng sản xuất: EVERFLY</li>\r\n</ul>\r\n\r\n<p><img alt=\"Mô hình máy bay Vietnam Airlines 16cm Everfly\" src=\"https://file.hstatic.net/1000328919/file/4411233000297_98cb3d01cd6c4e3dae33dfac2039c798_1024x1024.jpg\" /></p>', '<p><strong>Giới thiệu sản phẩm:</strong></p>\r\n\r\n<p>M&ocirc; h&igrave;nh m&aacute;y bay Vietnam Airlines l&agrave; h&atilde;ng h&agrave;ng kh&ocirc;ng của Việt Nam với&nbsp;thiết kế m&ocirc; phỏng theo m&aacute;y bay thật, sản phẩm&nbsp;được phủ l&ecirc;n một lớp sơn b&oacute;ng, c&aacute;c chi tiết được m&ocirc; phỏng tương đối đầy đủ từ c&aacute;nh quạt đến c&aacute;c &ocirc; cửa của m&aacute;y bay.</p>\r\n\r\n<p>Chất liệu m&ocirc; h&igrave;nh ho&agrave;n to&agrave;n bằng kim loại với một số chi tiết bằng nhựa cứng.</p>\r\n\r\n<p>T&iacute;nh năng của mẫu kh&aacute; nổi trội khi c&aacute;c b&aacute;nh xe c&oacute; thể đẩy tới lui trơn tru mượt m&agrave;.</p>\r\n\r\n<p><strong>Phụ kiện sản phẩm:</strong></p>\r\n\r\n<p>Đi k&egrave;m theo m&ocirc; h&igrave;nh m&aacute;y bay&nbsp;Vietnam Airlines l&agrave; một c&aacute;i đế nhựa được sơn kh&aacute; kĩ c&agrave;ng v&agrave; b&oacute;ng bẩy, phần th&acirc;n đế v&agrave; phần đế c&oacute; thể th&aacute;o lắp được để vệ sinh sản phẩm dễ d&agrave;ng hơn</p>', 5, 1, '2023-08-13 03:11:45', '2023-08-13 03:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_imgs`
--

CREATE TABLE `tbl_product_imgs` (
  `id` bigint(20) NOT NULL,
  `img` varchar(500) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_imgs`
--

INSERT INTO `tbl_product_imgs` (`id`, `img`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'caf98d62669876db2e7f4846a23e8b12-1-08-13.webp', 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(2, 'caf98d62669876db2e7f4846a23e8b12-2-08-13.webp', 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(3, 'caf98d62669876db2e7f4846a23e8b12-3-08-13.webp', 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(4, 'caf98d62669876db2e7f4846a23e8b12-4-08-13.webp', 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(5, 'caf98d62669876db2e7f4846a23e8b12-5-08-13.webp', 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(6, 'caf98d62669876db2e7f4846a23e8b12-6-08-13.webp', 1, '2023-08-13 01:36:25', '2023-08-13 01:36:25'),
(7, 'dc1014fd80b01af0fb206219dce7a548-1-08-13.webp', 2, '2023-08-13 01:39:23', '2023-08-13 01:39:23'),
(8, 'dc1014fd80b01af0fb206219dce7a548-2-08-13.webp', 2, '2023-08-13 01:39:23', '2023-08-13 01:39:23'),
(9, 'dc1014fd80b01af0fb206219dce7a548-3-08-13.webp', 2, '2023-08-13 01:39:23', '2023-08-13 01:39:23'),
(10, 'dc1014fd80b01af0fb206219dce7a548-4-08-13.webp', 2, '2023-08-13 01:39:23', '2023-08-13 01:39:23'),
(11, 'dc1014fd80b01af0fb206219dce7a548-5-08-13.webp', 2, '2023-08-13 01:39:23', '2023-08-13 01:39:23'),
(12, '01b751a71ef24f38ea9457a00e593d8e-1-08-13.webp', 3, '2023-08-13 01:42:07', '2023-08-13 01:42:07'),
(13, '01b751a71ef24f38ea9457a00e593d8e-2-08-13.webp', 3, '2023-08-13 01:42:07', '2023-08-13 01:42:07'),
(14, '01b751a71ef24f38ea9457a00e593d8e-3-08-13.webp', 3, '2023-08-13 01:42:07', '2023-08-13 01:42:07'),
(15, '01b751a71ef24f38ea9457a00e593d8e-4-08-13.webp', 3, '2023-08-13 01:42:07', '2023-08-13 01:42:07'),
(16, '01b751a71ef24f38ea9457a00e593d8e-5-08-13.webp', 3, '2023-08-13 01:42:07', '2023-08-13 01:42:07'),
(17, '4236e6986a3f865d72529bdb087c6130-1-08-13.webp', 4, '2023-08-13 01:44:01', '2023-08-13 01:44:01'),
(18, '4236e6986a3f865d72529bdb087c6130-2-08-13.webp', 4, '2023-08-13 01:44:01', '2023-08-13 01:44:01'),
(19, '4236e6986a3f865d72529bdb087c6130-3-08-13.webp', 4, '2023-08-13 01:44:01', '2023-08-13 01:44:01'),
(20, '4236e6986a3f865d72529bdb087c6130-4-08-13.webp', 4, '2023-08-13 01:44:01', '2023-08-13 01:44:01'),
(21, 'fe11c329302ca8be2232e1bcbe381962-1-08-13.webp', 5, '2023-08-13 02:30:48', '2023-08-13 02:30:48'),
(22, 'fe11c329302ca8be2232e1bcbe381962-2-08-13.webp', 5, '2023-08-13 02:30:48', '2023-08-13 02:30:48'),
(23, 'fe11c329302ca8be2232e1bcbe381962-3-08-13.webp', 5, '2023-08-13 02:30:48', '2023-08-13 02:30:48'),
(24, 'fe11c329302ca8be2232e1bcbe381962-4-08-13.webp', 5, '2023-08-13 02:30:48', '2023-08-13 02:30:48'),
(25, 'fe11c329302ca8be2232e1bcbe381962-5-08-13.webp', 5, '2023-08-13 02:30:48', '2023-08-13 02:30:48'),
(26, 'c3c6a6a06cca032539b1c0bd1b24f1ba-1-08-13.webp', 6, '2023-08-13 02:32:24', '2023-08-13 02:32:24'),
(27, 'c3c6a6a06cca032539b1c0bd1b24f1ba-2-08-13.webp', 6, '2023-08-13 02:32:24', '2023-08-13 02:32:24'),
(28, 'c3c6a6a06cca032539b1c0bd1b24f1ba-3-08-13.webp', 6, '2023-08-13 02:32:24', '2023-08-13 02:32:24'),
(29, 'efcfac2a948d5eacbeb3cbea147fb274-1-08-13.webp', 7, '2023-08-13 02:34:50', '2023-08-13 02:34:50'),
(30, 'efcfac2a948d5eacbeb3cbea147fb274-2-08-13.webp', 7, '2023-08-13 02:34:50', '2023-08-13 02:34:50'),
(31, 'efcfac2a948d5eacbeb3cbea147fb274-3-08-13.webp', 7, '2023-08-13 02:34:50', '2023-08-13 02:34:50'),
(32, 'efcfac2a948d5eacbeb3cbea147fb274-4-08-13.webp', 7, '2023-08-13 02:34:50', '2023-08-13 02:34:50'),
(33, '8d687355d3a5d302fec03d4491555c54-1-08-13.webp', 8, '2023-08-13 02:36:45', '2023-08-13 02:36:45'),
(34, 'ca2d3e155de334fea26dac826ebc864c-1-08-13.webp', 9, '2023-08-13 02:39:53', '2023-08-13 02:39:53'),
(35, 'ca2d3e155de334fea26dac826ebc864c-2-08-13.webp', 9, '2023-08-13 02:39:53', '2023-08-13 02:39:53'),
(36, 'ca2d3e155de334fea26dac826ebc864c-3-08-13.webp', 9, '2023-08-13 02:39:53', '2023-08-13 02:39:53'),
(37, '5cdda67563a6f64280e0f1b458b9633e-1-08-13.webp', 10, '2023-08-13 02:43:21', '2023-08-13 02:43:21'),
(38, '5cdda67563a6f64280e0f1b458b9633e-2-08-13.webp', 10, '2023-08-13 02:43:21', '2023-08-13 02:43:21'),
(39, '5cdda67563a6f64280e0f1b458b9633e-3-08-13.webp', 10, '2023-08-13 02:43:21', '2023-08-13 02:43:21'),
(40, '5cdda67563a6f64280e0f1b458b9633e-4-08-13.webp', 10, '2023-08-13 02:43:21', '2023-08-13 02:43:21'),
(41, '5cdda67563a6f64280e0f1b458b9633e-5-08-13.webp', 10, '2023-08-13 02:43:21', '2023-08-13 02:43:21'),
(42, '8010b76f4d2840893736a62deca0e262-1-08-13.webp', 11, '2023-08-13 02:45:11', '2023-08-13 02:45:11'),
(43, '8010b76f4d2840893736a62deca0e262-2-08-13.webp', 11, '2023-08-13 02:45:11', '2023-08-13 02:45:11'),
(44, '8010b76f4d2840893736a62deca0e262-3-08-13.webp', 11, '2023-08-13 02:45:11', '2023-08-13 02:45:11'),
(45, '8010b76f4d2840893736a62deca0e262-4-08-13.webp', 11, '2023-08-13 02:45:11', '2023-08-13 02:45:11'),
(46, '8dd70d140e00533c31012ed5827e2470-1-08-13.webp', 12, '2023-08-13 02:46:42', '2023-08-13 02:46:42'),
(47, '8dd70d140e00533c31012ed5827e2470-2-08-13.webp', 12, '2023-08-13 02:46:42', '2023-08-13 02:46:42'),
(48, '8dd70d140e00533c31012ed5827e2470-3-08-13.webp', 12, '2023-08-13 02:46:42', '2023-08-13 02:46:42'),
(49, '8dd70d140e00533c31012ed5827e2470-4-08-13.webp', 12, '2023-08-13 02:46:42', '2023-08-13 02:46:42'),
(50, '8dd70d140e00533c31012ed5827e2470-5-08-13.webp', 12, '2023-08-13 02:46:42', '2023-08-13 02:46:42'),
(51, '353784b9993117d2b59077c8524aaa33-1-08-13.webp', 13, '2023-08-13 02:50:05', '2023-08-13 02:50:05'),
(52, '353784b9993117d2b59077c8524aaa33-2-08-13.webp', 13, '2023-08-13 02:50:05', '2023-08-13 02:50:05'),
(53, '353784b9993117d2b59077c8524aaa33-3-08-13.webp', 13, '2023-08-13 02:50:05', '2023-08-13 02:50:05'),
(54, '353784b9993117d2b59077c8524aaa33-4-08-13.webp', 13, '2023-08-13 02:50:05', '2023-08-13 02:50:05'),
(55, 'c2b230ecfc86dd52f2b14204cade122e-1-08-13.webp', 14, '2023-08-13 02:52:25', '2023-08-13 02:52:25'),
(56, 'c2b230ecfc86dd52f2b14204cade122e-2-08-13.webp', 14, '2023-08-13 02:52:25', '2023-08-13 02:52:25'),
(57, 'c2b230ecfc86dd52f2b14204cade122e-3-08-13.webp', 14, '2023-08-13 02:52:25', '2023-08-13 02:52:25'),
(58, 'c2b230ecfc86dd52f2b14204cade122e-4-08-13.webp', 14, '2023-08-13 02:52:25', '2023-08-13 02:52:25'),
(59, 'c2b230ecfc86dd52f2b14204cade122e-5-08-13.webp', 14, '2023-08-13 02:52:25', '2023-08-13 02:52:25'),
(60, 'f9a194dc641fa29989c1ee83d0d2f612-1-08-13.webp', 15, '2023-08-13 02:53:44', '2023-08-13 02:53:44'),
(61, 'f9a194dc641fa29989c1ee83d0d2f612-2-08-13.webp', 15, '2023-08-13 02:53:44', '2023-08-13 02:53:44'),
(62, 'f9a194dc641fa29989c1ee83d0d2f612-3-08-13.webp', 15, '2023-08-13 02:53:44', '2023-08-13 02:53:44'),
(63, 'f9a194dc641fa29989c1ee83d0d2f612-4-08-13.webp', 15, '2023-08-13 02:53:44', '2023-08-13 02:53:44'),
(64, '61e3cf6d1192f9db3d3dfe79a15467e8-1-08-13.webp', 16, '2023-08-13 02:55:17', '2023-08-13 02:55:17'),
(65, '61e3cf6d1192f9db3d3dfe79a15467e8-2-08-13.webp', 16, '2023-08-13 02:55:17', '2023-08-13 02:55:17'),
(66, '61e3cf6d1192f9db3d3dfe79a15467e8-3-08-13.webp', 16, '2023-08-13 02:55:17', '2023-08-13 02:55:17'),
(67, '61e3cf6d1192f9db3d3dfe79a15467e8-4-08-13.webp', 16, '2023-08-13 02:55:17', '2023-08-13 02:55:17'),
(68, '61e3cf6d1192f9db3d3dfe79a15467e8-5-08-13.webp', 16, '2023-08-13 02:55:17', '2023-08-13 02:55:17'),
(69, 'f0be37d39d9cc33ac0295ee93d1ff590-1-08-13.webp', 17, '2023-08-13 02:56:58', '2023-08-13 02:56:58'),
(70, 'f0be37d39d9cc33ac0295ee93d1ff590-2-08-13.webp', 17, '2023-08-13 02:56:58', '2023-08-13 02:56:58'),
(71, 'f0be37d39d9cc33ac0295ee93d1ff590-3-08-13.webp', 17, '2023-08-13 02:56:58', '2023-08-13 02:56:58'),
(72, 'f0be37d39d9cc33ac0295ee93d1ff590-4-08-13.webp', 17, '2023-08-13 02:56:58', '2023-08-13 02:56:58'),
(73, 'f0be37d39d9cc33ac0295ee93d1ff590-5-08-13.webp', 17, '2023-08-13 02:56:58', '2023-08-13 02:56:58'),
(74, '29517e30b157c3194da7f36dc5f9c2fe-1-08-13.webp', 18, '2023-08-13 02:58:31', '2023-08-13 02:58:31'),
(75, '29517e30b157c3194da7f36dc5f9c2fe-2-08-13.webp', 18, '2023-08-13 02:58:31', '2023-08-13 02:58:31'),
(76, '29517e30b157c3194da7f36dc5f9c2fe-3-08-13.webp', 18, '2023-08-13 02:58:31', '2023-08-13 02:58:31'),
(77, '29517e30b157c3194da7f36dc5f9c2fe-4-08-13.webp', 18, '2023-08-13 02:58:31', '2023-08-13 02:58:31'),
(78, '29517e30b157c3194da7f36dc5f9c2fe-5-08-13.webp', 18, '2023-08-13 02:58:31', '2023-08-13 02:58:31'),
(79, '9c1b32baf11521d83d84498ec31ff9e5-1-08-13.webp', 19, '2023-08-13 03:00:09', '2023-08-13 03:00:09'),
(80, '9c1b32baf11521d83d84498ec31ff9e5-2-08-13.webp', 19, '2023-08-13 03:00:09', '2023-08-13 03:00:09'),
(81, '9c1b32baf11521d83d84498ec31ff9e5-3-08-13.webp', 19, '2023-08-13 03:00:09', '2023-08-13 03:00:09'),
(82, '9c1b32baf11521d83d84498ec31ff9e5-4-08-13.webp', 19, '2023-08-13 03:00:09', '2023-08-13 03:00:09'),
(83, '9c1b32baf11521d83d84498ec31ff9e5-5-08-13.webp', 19, '2023-08-13 03:00:09', '2023-08-13 03:00:09'),
(84, 'a6e8df29f1bffc86cac9413361d5578d-1-08-13.webp', 20, '2023-08-13 03:02:08', '2023-08-13 03:02:08'),
(85, 'a6e8df29f1bffc86cac9413361d5578d-2-08-13.webp', 20, '2023-08-13 03:02:08', '2023-08-13 03:02:08'),
(86, 'a6e8df29f1bffc86cac9413361d5578d-3-08-13.webp', 20, '2023-08-13 03:02:08', '2023-08-13 03:02:08'),
(87, 'a6e8df29f1bffc86cac9413361d5578d-4-08-13.webp', 20, '2023-08-13 03:02:08', '2023-08-13 03:02:08'),
(88, '6f50bf39767df36799f98eea6b75a97d-1-08-13.webp', 21, '2023-08-13 03:04:27', '2023-08-13 03:04:27'),
(89, '6f50bf39767df36799f98eea6b75a97d-2-08-13.webp', 21, '2023-08-13 03:04:27', '2023-08-13 03:04:27'),
(90, '6f50bf39767df36799f98eea6b75a97d-3-08-13.webp', 21, '2023-08-13 03:04:27', '2023-08-13 03:04:27'),
(91, '6f50bf39767df36799f98eea6b75a97d-4-08-13.webp', 21, '2023-08-13 03:04:27', '2023-08-13 03:04:27'),
(92, '6f50bf39767df36799f98eea6b75a97d-5-08-13.webp', 21, '2023-08-13 03:04:27', '2023-08-13 03:04:27'),
(93, '231b190c4b5da0b7385b7facec1dbee7-1-08-13.webp', 22, '2023-08-13 03:06:17', '2023-08-13 03:06:17'),
(94, '231b190c4b5da0b7385b7facec1dbee7-2-08-13.webp', 22, '2023-08-13 03:06:17', '2023-08-13 03:06:17'),
(95, '231b190c4b5da0b7385b7facec1dbee7-3-08-13.webp', 22, '2023-08-13 03:06:17', '2023-08-13 03:06:17'),
(96, '231b190c4b5da0b7385b7facec1dbee7-4-08-13.webp', 22, '2023-08-13 03:06:17', '2023-08-13 03:06:17'),
(97, '231b190c4b5da0b7385b7facec1dbee7-5-08-13.webp', 22, '2023-08-13 03:06:17', '2023-08-13 03:06:17'),
(98, '32833963e43f23ea64f954817cbb4f44-1-08-13.webp', 23, '2023-08-13 03:08:07', '2023-08-13 03:08:07'),
(99, '32833963e43f23ea64f954817cbb4f44-2-08-13.webp', 23, '2023-08-13 03:08:07', '2023-08-13 03:08:07'),
(100, '32833963e43f23ea64f954817cbb4f44-3-08-13.webp', 23, '2023-08-13 03:08:07', '2023-08-13 03:08:07'),
(101, '32833963e43f23ea64f954817cbb4f44-4-08-13.webp', 23, '2023-08-13 03:08:07', '2023-08-13 03:08:07'),
(102, 'a60a829e408f87f59386d71572b99e63-1-08-13.webp', 24, '2023-08-13 03:10:05', '2023-08-13 03:10:05'),
(103, 'a60a829e408f87f59386d71572b99e63-2-08-13.webp', 24, '2023-08-13 03:10:05', '2023-08-13 03:10:05'),
(104, 'a60a829e408f87f59386d71572b99e63-3-08-13.webp', 24, '2023-08-13 03:10:05', '2023-08-13 03:10:05'),
(105, 'a60a829e408f87f59386d71572b99e63-4-08-13.webp', 24, '2023-08-13 03:10:05', '2023-08-13 03:10:05'),
(106, 'f1a56dd13a88712f0ddbe313dccea135-1-08-13.webp', 25, '2023-08-13 03:11:45', '2023-08-13 03:11:45'),
(107, 'f1a56dd13a88712f0ddbe313dccea135-2-08-13.webp', 25, '2023-08-13 03:11:45', '2023-08-13 03:11:45'),
(108, 'f1a56dd13a88712f0ddbe313dccea135-3-08-13.webp', 25, '2023-08-13 03:11:45', '2023-08-13 03:11:45'),
(109, 'f1a56dd13a88712f0ddbe313dccea135-4-08-13.webp', 25, '2023-08-13 03:11:45', '2023-08-13 03:11:45'),
(110, 'f1a56dd13a88712f0ddbe313dccea135-5-08-13.webp', 25, '2023-08-13 03:11:45', '2023-08-13 03:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` bigint(20) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rated` int(11) NOT NULL,
  `content` text NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `name_user`, `email`, `rated`, `content`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Đăng Toàn', 'toan23@gmail.com', 5, 'Sản phẩm tốt, giao hàng nhanh', 1, 1, '2023-08-13 16:07:05', '2023-08-13 16:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_account_role`
--
ALTER TABLE `tbl_account_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_imgs`
--
ALTER TABLE `tbl_product_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_account_role`
--
ALTER TABLE `tbl_account_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_product_imgs`
--
ALTER TABLE `tbl_product_imgs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
