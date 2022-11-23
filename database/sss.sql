-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220810.35f421a69b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 07:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sss`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_02_26_052707_create_tbl_admin_table', 1),
(5, '2022_02_26_103952_crate_tbl_category_product', 2),
(6, '2022_02_26_134259_create_tbl_brand_product', 3),
(7, '2022_02_26_142805_create_tbl_product', 4),
(8, '2022_02_26_143319_create_tbl_product', 5),
(9, '2022_03_06_103653_tbl_customer', 6),
(10, '2022_04_22_152311_tbl_shipping', 7),
(20, '2022_04_24_152307_tbl_payment', 8),
(21, '2022_04_24_152522_tbl_oder_details', 8),
(22, '2022_04_24_153143_tbl_order', 8),
(24, '2022_04_25_085624_tbl_oder_details', 9),
(25, '2022_04_26_064535_tbl_whistlist', 10),
(26, '2022_04_27_065739_tbl_comment', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'ngocb1809615@student.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'NHU NGOC', '0796998523', '2022-10-15 06:01:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(17, 'Ysl', '123', 1, NULL, NULL),
(18, 'Gucci', '123', 1, NULL, NULL),
(19, 'Versace', '123', 1, NULL, NULL),
(20, 'Tommy', '123', 1, NULL, NULL),
(21, 'Dior', 'Nước hoa Dior sang trọng tinh tế và quyến rũ cao cấp', 0, NULL, NULL),
(22, 'Chanel', '123', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(19, 'Nước hoa nam', '123', 0, NULL, NULL),
(20, 'Nước hoa nữ', '123', 0, NULL, NULL),
(21, 'Nước hoa mini', '123', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `customer_id`, `product_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '8', '17', 'Nước hoa rất chất lượng sẽ ủng hộ quài ạ!', NULL, NULL),
(2, '8', '17', 'Giá hợp lý mà chất lượng trên 10 điểm. Mua hàng như này kh sợ tiếc tiền.', NULL, NULL),
(3, '7', '17', 'Ổn áp', NULL, NULL),
(4, '8', '16', 'Mùi này thơm dịu hay nồng ạ', NULL, NULL),
(5, '10', '17', 'Giao nước hoa em chưa ạ', NULL, NULL),
(6, '8', '22', 'Mua rất nhiều chỗ ưng mỗi chỗ này.', NULL, NULL),
(7, '11', '23', 'Có nước hoa Nam không shop', NULL, NULL),
(8, '8', '37', 'Chất lượng ', NULL, NULL),
(9, '8', '37', 'Very nice', NULL, NULL),
(10, '7', '36', 'Shop bán hàng có tâm', NULL, NULL),
(11, '7', '39', 'Giá hơi chác nhưng bù lại rất oke', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(7, 'TRAN NHU NGOC2404', 'Ngocnhutran20@gmail.com', '123456', '0796998523', NULL, NULL),
(8, 'Nhu Ngoc', 'Tranngoc24@gmail.com', '123456', '0796998523', NULL, NULL),
(9, 'Trần Như Ngọc', 'ngoc2000@gmail.com', '123456', '0796998523', NULL, NULL),
(10, 'Ngoc cntt234', 'ngocngoctt@gmail.com', '123456', '0796998523', NULL, NULL),
(11, 'TRẦN NGỌC 240420', 'Tranngoc123@gmail.com', '123456', '0796998523', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oder_details`
--

CREATE TABLE `tbl_oder_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_oder_details`
--

INSERT INTO `tbl_oder_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(10, '32', '36', 'Nước Hoa Nữ Chanel Coco Mademoiselle L\'Eau Privee 100ml', '3.500.000', '4', NULL, NULL),
(11, '33', '37', 'Nước Hoa Cho Nam Tommy Hilfiger Tommy 100ml Của Mỹ', '2.500.000', '1', NULL, NULL),
(12, '34', '37', 'Gucci Guilty Pour Homme', '2.200.000', '9', NULL, NULL),
(13, '34', '36', 'Nước Hoa Yves Saint Laurent Libre EDP', '499.000', '4', NULL, NULL),
(14, '35', '36', 'Nước Hoa Nữ Dior J\'adore Parfum D\'eau EDP 100ml', '3.550.000', '10', NULL, NULL),
(15, '36', '40', 'Nước hoa Dior Homme Sport EDT', '2.980.000', '3', NULL, NULL),
(16, '37', '40', 'Nước Hoa Nam Dior Sauvage EDP ', '375.000', '5', NULL, NULL),
(17, '38', '40', 'Nước Hoa Nam Gucci Guilty Absolute Pour Homme EDP 90ml', '2.100.000', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `shipping_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `shipping_id`, `customer_id`, `order_status`, `payment_id`, `order_total`, `created_at`, `updated_at`) VALUES
(36, '18', '10', '3', '36', '6,666,666', NULL, NULL),
(37, '19', '9', '3', '37', '11,111,110', NULL, NULL),
(38, '20', '8', '2', '38', '6,666,666', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(20, '2', 'Đang chờ xử lý', NULL, NULL),
(21, '2', 'Đang chờ xử lý', NULL, NULL),
(22, '2', 'Đang chờ xử lý', NULL, NULL),
(23, '2', 'Đang chờ xử lý', NULL, NULL),
(24, '2', 'Đang chờ xử lý', NULL, NULL),
(25, '2', 'Đang chờ xử lý', NULL, NULL),
(26, '2', 'Đang chờ xử lý', NULL, NULL),
(27, '2', 'Đang chờ xử lý', NULL, NULL),
(28, '2', 'Đang chờ xử lý', NULL, NULL),
(29, '2', 'Đang chờ xử lý', NULL, NULL),
(30, '2', 'Đang chờ xử lý', NULL, NULL),
(31, '2', 'Đang chờ xử lý', NULL, NULL),
(32, '2', 'Đang chờ xử lý', NULL, NULL),
(33, '2', 'Đang chờ xử lý', NULL, NULL),
(34, '2', 'Đang chờ xử lý', NULL, NULL),
(35, '2', 'Đang chờ xử lý', NULL, NULL),
(36, '2', 'Đang chờ xử lý', NULL, NULL),
(37, '2', 'Đang chờ xử lý', NULL, NULL),
(38, '2', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`, `product_name`, `product_quantity`, `promotion`) VALUES
(41, 19, 18, 'Gợi ý và bất ngờ, Gucci Guilty Pour Homme Eau de Parfum là một hương thơm hương gỗ, cay nồng được tạo ra để khiêu khích. Hoa hồng và ớt tạo ra một sự rung cảm cổ điển bất ngờ và tràn đầy sinh lực, trong khi hoắc hương và gỗ tuyết tùng làm nổi bật sự phong phú và gợi cảm của hương thơm.', 'Gợi ý và bất ngờ, Gucci Guilty Pour Homme Eau de Parfum là một hương thơm hương gỗ, cay nồng được tạo ra để khiêu khích. Hoa hồng và ớt tạo ra một sự rung cảm cổ điển bất ngờ và tràn đầy sinh lực, trong khi hoắc hương và gỗ tuyết tùng làm nổi bật sự phong phú và gợi cảm của hương thơm.', '2450000', 'Gucci Guilty Pour Homme EDP18.webp', 0, NULL, NULL, 'Nước hoa nữ Yves Saint Laurent Black Opium EDP', '50', ''),
(42, 20, 21, 'Mùi hương được phối trộn tạo nên từ những cánh hoa đượm nồng vừa nữ tính mà vẫn vừa ẩn chứ tinh thần mãnh liệt. Trên nền hoa huệ trắng tao nhã đặc sắc của dòng Gucci Bloom, với Nettare Di Fiori được thêm điểm nhấn hoà quyện với hương hoa kim ngân và hoa mộc tê, hoa hồng thơm ngát dứoi sự tôn vinh của lớp nền hương gỗ ấm áp.', 'Mùi hương được phối trộn tạo nên từ những cánh hoa đượm nồng vừa nữ tính mà vẫn vừa ẩn chứ tinh thần mãnh liệt. Trên nền hoa huệ trắng tao nhã đặc sắc của dòng Gucci Bloom, với Nettare Di Fiori được thêm điểm nhấn hoà quyện với hương hoa kim ngân và hoa mộc tê, hoa hồng thơm ngát dứoi sự tôn vinh của lớp nền hương gỗ ấm áp.', '456000', 'Gucci Bloom Nettare Di Fiori EDP177.webp', 0, NULL, NULL, 'Nước hoa nữ Gucci Bloom Nettare Di Fiori EDP', '100', ''),
(43, 20, 17, 'Mùi hương được phối trộn tạo nên từ những cánh hoa đượm nồng vừa nữ tính mà vẫn vừa ẩn chứ tinh thần mãnh liệt. Trên nền hoa huệ trắng tao nhã đặc sắc của dòng Gucci Bloom, với Nettare Di Fiori được thêm điểm nhấn hoà quyện với hương hoa kim ngân và hoa mộc tê, hoa hồng thơm ngát dứoi sự tôn vinh của lớp nền hương gỗ ấm áp.', 'Mùi hương được phối trộn tạo nên từ những cánh hoa đượm nồng vừa nữ tính mà vẫn vừa ẩn chứ tinh thần mãnh liệt. Trên nền hoa huệ trắng tao nhã đặc sắc của dòng Gucci Bloom, với Nettare Di Fiori được thêm điểm nhấn hoà quyện với hương hoa kim ngân và hoa mộc tê, hoa hồng thơm ngát dứoi sự tôn vinh của lớp nền hương gỗ ấm áp.', '456000', 'Yves -Saint -Laurent- Black -Opium -EDP58.webp', 0, NULL, NULL, 'Nước hoa nữ Yves  Black Opium EDP', '200', ''),
(45, 20, 20, 'Gợi ý và bất ngờ, Gucci Guilty Pour Homme Eau de Parfum là một hương thơm hương gỗ, cay nồng được tạo ra để khiêu khích. Hoa hồng và ớt tạo ra một sự rung cảm cổ điển bất ngờ và tràn đầy sinh lực, trong khi hoắc hương và gỗ tuyết tùng làm nổi bật sự phong phú và gợi cảm của hương thơm.', 'Gợi ý và bất ngờ, Gucci Guilty Pour Homme Eau de Parfum là một hương thơm hương gỗ, cay nồng được tạo ra để khiêu khích. Hoa hồng và ớt tạo ra một sự rung cảm cổ điển bất ngờ và tràn đầy sinh lực, trong khi hoắc hương và gỗ tuyết tùng làm nổi bật sự phong phú và gợi cảm của hương thơm.', '789000', 'nuoc-hoa-scandal-178.jpg', 0, NULL, NULL, 'Nước hoa nam Yves Laure', '100', '710100'),
(46, 20, 21, 'Hương chính: Hoa huệ, Orange Blossom, Hoa Nhài Sambac, Sữa, Raspberry\r\n\r\nKhi So Scandal tiếp cận, hương thơm ngọt ngào tràn ngập không gian và dường như không ai có thể trốn khỏi sự cám dỗ mượt mà mà So Scandal mang lại.', 'Hương chính: Hoa huệ, Orange Blossom, Hoa Nhài Sambac, Sữa, Raspberry\r\n\r\nKhi So Scandal tiếp cận, hương thơm ngọt ngào tràn ngập không gian và dường như không ai có thể trốn khỏi sự cám dỗ mượt mà mà So Scandal mang lại.', '123000', 'so-sa_f127da40be4a46a9a4154613f99483d8_master40.webp', 0, NULL, NULL, 'Jean Paul Gaultier So Scandal!', '100', '98400'),
(48, 20, 22, 'Thương hiệu Chanel nỗi tiếng đến từ Pháp. Mang mùi hương tươi mát, nhẹ nhàng nhưng không kém phần sang trọng quý phái.', 'Thương hiệu Chanel nỗi tiếng đến từ Pháp. Mang mùi hương tươi mát, nhẹ nhàng nhưng không kém phần sang trọng quý phái.', '3500000', 'coco87.jpg', 0, NULL, NULL, 'Nước Hoa Chanel Coco Mademoiselle 100m', '10', NULL),
(49, 19, 21, 'Đến từ thương hiệu nổi tiếng của Pháp. Dior mang mùi hương đậm chất phương đông ấm áp, lịch lãm.', 'Đến từ thương hiệu nổi tiếng của Pháp. Dior mang mùi hương đậm chất phương đông ấm áp, lịch lãm.', '2980000', 'dior nam94.jpg', 0, NULL, NULL, 'Nước Hoa Nam Dior Sauvage EDP', '10', NULL),
(50, 21, 19, 'Nước hoa thương hiệu Versace luôn được ưa chuộng trên toàn thế giới, đặc biệt là dòng nước hoa Versace Eros. Dù thiết kế chai 5ml nhỏ bé nhưng biểu tượng nữ thần quyền lực Medusa vẫn là điểm nhấn tạo nên sự sang trọng cho loại nước hoa này.', 'Nước hoa thương hiệu Versace luôn được ưa chuộng trên toàn thế giới, đặc biệt là dòng nước hoa Versace Eros. Dù thiết kế chai 5ml nhỏ bé nhưng biểu tượng nữ thần quyền lực Medusa vẫn là điểm nhấn tạo nên sự sang trọng cho loại nước hoa này.', '1200000', 'semini35.jpg', 0, NULL, NULL, 'VERSACE EROS', '5', NULL),
(51, 21, 22, 'BLEU DE CHANEL Parfum là hương nước hoa hoàn hảo với hương thơm thuần khiết nhưng cũng rất sâu sắc, thể hiện sự nam tính, mạnh mẽ và tự tin.', 'BLEU DE CHANEL Parfum là hương nước hoa hoàn hảo với hương thơm thuần khiết nhưng cũng rất sâu sắc, thể hiện sự nam tính, mạnh mẽ và tự tin.', '500000', 'chanel minin59.jpg', 0, NULL, NULL, 'Nước hoa nam Chanel Bleu De Chanel EDP 10ml', '6', NULL),
(52, 21, 17, 'Mùi hương của sự tự do, sự sang trọng và đẳng cấp, đấy tất cả những gì phụ nữ cần chỉ là thế thôi, tự do và chanh xả. Những nốt hương Cam ma-rốc kết hợp mùi xạ hương táo bạo rất lôi cuốn và lưu hương lâu hơn', 'Mùi hương của sự tự do, sự sang trọng và đẳng cấp, đấy tất cả những gì phụ nữ cần chỉ là thế thôi, tự do và chanh xả. Những nốt hương Cam ma-rốc kết hợp mùi xạ hương táo bạo rất lôi cuốn và lưu hương lâu hơn', '390000', 'yslmini36.jpg', 0, NULL, NULL, 'NƯỚC HOA MINI YSL LIBRE PERFUME 7,5ML', '3', NULL),
(53, 21, 18, 'Nhẹ nhàng và đầy dịu dàng với nốt hương hoa kim ngân. Ấm áp, đậm đà của hoa nhài và huệ. Vừa thanh tao những cũng rất bí ẩn. Tạo nên hiệu ứng vô cùng sang trọng và nữ tính cho những cô gái trẻ.Nước hoa Gucci mini 5ml nhìn chung có khả năng bám tỏa khá tốt. Khoảng từ 6-7 giờ đồng hồ trên da. Hương thơm nhẹ nhàng, bay bổng, phảng phất xung quanh dịu nhẹ sẽ không khiến những người xung quanh cảm thấy dễ chịu', 'Nhẹ nhàng và đầy dịu dàng với nốt hương hoa kim ngân. Ấm áp, đậm đà của hoa nhài và huệ. Vừa thanh tao những cũng rất bí ẩn. Tạo nên hiệu ứng vô cùng sang trọng và nữ tính cho những cô gái trẻ.Nước hoa Gucci mini 5ml nhìn chung có khả năng bám tỏa khá tốt. Khoảng từ 6-7 giờ đồng hồ trên da. Hương thơm nhẹ nhàng, bay bổng, phảng phất xung quanh dịu nhẹ sẽ không khiến những người xung quanh cảm thấy dễ chịu', '600000', 'nuoc-hoa-gucci-mini-5ml-477.jpg', 0, NULL, NULL, 'Nước hoa Gucci Bloom mini 5ml', '8', NULL),
(54, 21, 20, 'Nước hoa Tom my Boy với hương thơm mát rượi, đầy nam tính, cho phái mạnh tỏa sáng với phong cách tự tin và sang trọng.\r\n\r\n-Tinh dầu nước hoa sẽ tỏa hương siêu quyến rũ, lan tỏa và lưu lại hương thơm rất lâu khi nó được sử dụng trên các điểm mạch trên cơ thể bạn như vùng cổ tay, cổ, sau tai hay sau gáy và bên dưới khuỷu tay.\r\n\r\n-Những vị trí này có mạch đập mạnh và nhiệt cao hơn nên làm cho mùi hương khuếch tán một cách tự nhiên nhất trên cơ thể bạn\r\n\r\nHương đầu: Bạc hà, oải hương, bưởi, cam bergamot\r\nHương giữa: Quế, bánh Táo, và Rose\r\nHương cuối: Hổ phách, hoa xương rồng, cỏ xanh', 'Nước hoa Tom my Boy với hương thơm mát rượi, đầy nam tính, cho phái mạnh tỏa sáng với phong cách tự tin và sang trọng.\r\n\r\n-Tinh dầu nước hoa sẽ tỏa hương siêu quyến rũ, lan tỏa và lưu lại hương thơm rất lâu khi nó được sử dụng trên các điểm mạch trên cơ thể bạn như vùng cổ tay, cổ, sau tai hay sau gáy và bên dưới khuỷu tay.\r\n\r\n-Những vị trí này có mạch đập mạnh và nhiệt cao hơn nên làm cho mùi hương khuếch tán một cách tự nhiên nhất trên cơ thể bạn\r\n\r\nHương đầu: Bạc hà, oải hương, bưởi, cam bergamot\r\nHương giữa: Quế, bánh Táo, và Rose\r\nHương cuối: Hổ phách, hoa xương rồng, cỏ xanh', '320000', 'tmmy mi87.jpg', 0, NULL, NULL, 'Nước Hoa Mini Tommy Boy 20ml', '9', NULL),
(56, 21, 22, 'Mùi thơm nhẹ nhàng sang trọng, lưu hương lâu trên quần áo', 'Mùi thơm nhẹ nhàng sang trọng, lưu hương lâu trên quần áo', '220000', 'chanel mini69.jpg', 0, NULL, NULL, 'Nước Hoa Mini Chanel No5 7.5ml 10ml', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(1, 'Ngọc Như', 'Cần Thơ', '0848545517', 'ngocnhu240420@gmail.com', 'Dễ vỡ', NULL, NULL),
(2, 'Như Ngọc', 'Cần thơ', '0848545517', 'ngocnhu240420@gmail.com', 'Dễ vỡ', NULL, NULL),
(3, 'Như Ngọc', 'Cần thơ', '0848545517', 'ngocnhu240420@gmail.com', 'Dễ dỡ', NULL, NULL),
(4, '1', '4', '3', '2', '5', NULL, NULL),
(5, '11', '1', '1', '1', '1', NULL, NULL),
(6, '1', '4', '3', '2', 'nhẹ tay dùm', NULL, NULL),
(7, 'Như Ngọc', 'Hậu Giang', '0848545517', 'nhungoc240420@gmail.com', 'Hàng dễ vỡ', NULL, NULL),
(8, ' Ngọc Như ', '1', '0848545517', 'nhungoc240420@gmail.com', 'kiểm tra hàng', NULL, NULL),
(9, 'Như', 'Hậu Giang', '0848545517', 'nhungoc240420@gmail.com', 'Kiểm tra hàng', NULL, NULL),
(10, 'Ngọc', 'Cà Mau', '0848545517', 'nhungoc240420@gmail.com', 'Dễ vỡ', NULL, NULL),
(11, 'Ngoc Nhu Tran', 'Hậu Giang', '0848545517', 'nhungoc240420@gmail.com', 'Kiểm tra', NULL, NULL),
(12, 'Ngọc Trần', 'Cần Thơ', '0848545517', 'ngocnhu240420@gmail.com', 'kiểm tra', NULL, NULL),
(13, 'Ngọc', 'Cần Thơ', '0848545517', 'nhungoc240420@gmail.com', 'nhẹ tay', NULL, NULL),
(14, 'Như', 'Hậu Giang', '0848545517', 'nhungoc240420@gmail.com', 'kiểm tra\r\n', NULL, NULL),
(15, 'Trần Như', 'Cần Thơ', '0848545517', 'nhungoc240420gmail.com', 'nhẹ tay', NULL, NULL),
(16, 'Tran Nhu Ngoc', 'Hậu Giang', '0848545517', 'nhungoc240420@gmail.com', 'nhẹ tay, dễ vỡ', NULL, NULL),
(17, 'Như Ngọc Trần', 'Cần Thơ', '0848545517', 'ngocnhu240420@gmail.com', 'kiểm tra kĩ', NULL, NULL),
(18, 'Tran Nhu Ngoc', 'Cà Mau', '0796998523', 'nhungoc@gmail.com', 'kiểm tra', NULL, NULL),
(19, 'Ngoc Nhu', 'Cà Mau', '0796998523', 'ngocnhu240420@gmail.com', 'nhẹ tay', NULL, NULL),
(20, 'Trần Như Ngọc', 'Hậu Giang CT', '0796998523', 'nhungoc240420@gmail.com', 'kiểm tra thử', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_whistlist`
--

CREATE TABLE `tbl_whistlist` (
  `whistlist_id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_whistlist`
--

INSERT INTO `tbl_whistlist` (`whistlist_id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(22, '11', '16', NULL, NULL),
(24, '8', '17', NULL, NULL),
(25, '11', '23', NULL, NULL),
(26, '8', '37', NULL, NULL),
(27, '8', '36', NULL, NULL),
(28, '7', '37', NULL, NULL),
(29, '9', '40', NULL, NULL),
(30, '9', '39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_oder_details`
--
ALTER TABLE `tbl_oder_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_whistlist`
--
ALTER TABLE `tbl_whistlist`
  ADD PRIMARY KEY (`whistlist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_oder_details`
--
ALTER TABLE `tbl_oder_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_whistlist`
--
ALTER TABLE `tbl_whistlist`
  MODIFY `whistlist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
