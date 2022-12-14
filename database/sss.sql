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
(21, 'Dior', 'N?????c hoa Dior sang tr???ng tinh t??? v?? quy???n r?? cao c???p', 0, NULL, NULL),
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
(19, 'N?????c hoa nam', '123', 0, NULL, NULL),
(20, 'N?????c hoa n???', '123', 0, NULL, NULL),
(21, 'N?????c hoa mini', '123', 0, NULL, NULL);

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
(1, '8', '17', 'N?????c hoa r???t ch???t l?????ng s??? ???ng h??? qu??i ???!', NULL, NULL),
(2, '8', '17', 'Gi?? h???p l?? m?? ch???t l?????ng tr??n 10 ??i???m. Mua h??ng nh?? n??y kh s??? ti???c ti???n.', NULL, NULL),
(3, '7', '17', '???n ??p', NULL, NULL),
(4, '8', '16', 'M??i n??y th??m d???u hay n???ng ???', NULL, NULL),
(5, '10', '17', 'Giao n?????c hoa em ch??a ???', NULL, NULL),
(6, '8', '22', 'Mua r???t nhi???u ch??? ??ng m???i ch??? n??y.', NULL, NULL),
(7, '11', '23', 'C?? n?????c hoa Nam kh??ng shop', NULL, NULL),
(8, '8', '37', 'Ch???t l?????ng ', NULL, NULL),
(9, '8', '37', 'Very nice', NULL, NULL),
(10, '7', '36', 'Shop b??n h??ng c?? t??m', NULL, NULL),
(11, '7', '39', 'Gi?? h??i ch??c nh??ng b?? l???i r???t oke', NULL, NULL);

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
(9, 'Tr???n Nh?? Ng???c', 'ngoc2000@gmail.com', '123456', '0796998523', NULL, NULL),
(10, 'Ngoc cntt234', 'ngocngoctt@gmail.com', '123456', '0796998523', NULL, NULL),
(11, 'TR???N NG???C 240420', 'Tranngoc123@gmail.com', '123456', '0796998523', NULL, NULL);

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
(10, '32', '36', 'N?????c Hoa N??? Chanel Coco Mademoiselle L\'Eau Privee 100ml', '3.500.000', '4', NULL, NULL),
(11, '33', '37', 'N?????c Hoa Cho Nam Tommy Hilfiger Tommy 100ml C???a M???', '2.500.000', '1', NULL, NULL),
(12, '34', '37', 'Gucci Guilty Pour Homme', '2.200.000', '9', NULL, NULL),
(13, '34', '36', 'N?????c Hoa Yves Saint Laurent Libre EDP', '499.000', '4', NULL, NULL),
(14, '35', '36', 'N?????c Hoa N??? Dior J\'adore Parfum D\'eau EDP 100ml', '3.550.000', '10', NULL, NULL),
(15, '36', '40', 'N?????c hoa Dior Homme Sport EDT', '2.980.000', '3', NULL, NULL),
(16, '37', '40', 'N?????c Hoa Nam Dior Sauvage EDP ', '375.000', '5', NULL, NULL),
(17, '38', '40', 'N?????c Hoa Nam Gucci Guilty Absolute Pour Homme EDP 90ml', '2.100.000', '3', NULL, NULL);

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
(20, '2', '??ang ch??? x??? l??', NULL, NULL),
(21, '2', '??ang ch??? x??? l??', NULL, NULL),
(22, '2', '??ang ch??? x??? l??', NULL, NULL),
(23, '2', '??ang ch??? x??? l??', NULL, NULL),
(24, '2', '??ang ch??? x??? l??', NULL, NULL),
(25, '2', '??ang ch??? x??? l??', NULL, NULL),
(26, '2', '??ang ch??? x??? l??', NULL, NULL),
(27, '2', '??ang ch??? x??? l??', NULL, NULL),
(28, '2', '??ang ch??? x??? l??', NULL, NULL),
(29, '2', '??ang ch??? x??? l??', NULL, NULL),
(30, '2', '??ang ch??? x??? l??', NULL, NULL),
(31, '2', '??ang ch??? x??? l??', NULL, NULL),
(32, '2', '??ang ch??? x??? l??', NULL, NULL),
(33, '2', '??ang ch??? x??? l??', NULL, NULL),
(34, '2', '??ang ch??? x??? l??', NULL, NULL),
(35, '2', '??ang ch??? x??? l??', NULL, NULL),
(36, '2', '??ang ch??? x??? l??', NULL, NULL),
(37, '2', '??ang ch??? x??? l??', NULL, NULL),
(38, '2', '??ang ch??? x??? l??', NULL, NULL);

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
(41, 19, 18, 'G???i ?? v?? b???t ng???, Gucci Guilty Pour Homme Eau de Parfum l?? m???t h????ng th??m h????ng g???, cay n???ng ???????c t???o ra ????? khi??u kh??ch. Hoa h???ng v?? ???t t???o ra m???t s??? rung c???m c??? ??i???n b???t ng??? v?? tr??n ?????y sinh l???c, trong khi ho???c h????ng v?? g??? tuy???t t??ng l??m n???i b???t s??? phong ph?? v?? g???i c???m c???a h????ng th??m.', 'G???i ?? v?? b???t ng???, Gucci Guilty Pour Homme Eau de Parfum l?? m???t h????ng th??m h????ng g???, cay n???ng ???????c t???o ra ????? khi??u kh??ch. Hoa h???ng v?? ???t t???o ra m???t s??? rung c???m c??? ??i???n b???t ng??? v?? tr??n ?????y sinh l???c, trong khi ho???c h????ng v?? g??? tuy???t t??ng l??m n???i b???t s??? phong ph?? v?? g???i c???m c???a h????ng th??m.', '2450000', 'Gucci Guilty Pour Homme EDP18.webp', 0, NULL, NULL, 'N?????c hoa n??? Yves Saint Laurent Black Opium EDP', '50', ''),
(42, 20, 21, 'M??i h????ng ???????c ph???i tr???n t???o n??n t??? nh???ng c??nh hoa ???????m n???ng v???a n??? t??nh m?? v???n v???a ???n ch??? tinh th???n m??nh li???t. Tr??n n???n hoa hu??? tr???ng tao nh?? ?????c s???c c???a d??ng Gucci Bloom, v???i Nettare Di Fiori ???????c th??m ??i???m nh???n ho?? quy???n v???i h????ng hoa kim ng??n v?? hoa m???c t??, hoa h???ng th??m ng??t d???oi s??? t??n vinh c???a l???p n???n h????ng g??? ???m ??p.', 'M??i h????ng ???????c ph???i tr???n t???o n??n t??? nh???ng c??nh hoa ???????m n???ng v???a n??? t??nh m?? v???n v???a ???n ch??? tinh th???n m??nh li???t. Tr??n n???n hoa hu??? tr???ng tao nh?? ?????c s???c c???a d??ng Gucci Bloom, v???i Nettare Di Fiori ???????c th??m ??i???m nh???n ho?? quy???n v???i h????ng hoa kim ng??n v?? hoa m???c t??, hoa h???ng th??m ng??t d???oi s??? t??n vinh c???a l???p n???n h????ng g??? ???m ??p.', '456000', 'Gucci Bloom Nettare Di Fiori EDP177.webp', 0, NULL, NULL, 'N?????c hoa n??? Gucci Bloom Nettare Di Fiori EDP', '100', ''),
(43, 20, 17, 'M??i h????ng ???????c ph???i tr???n t???o n??n t??? nh???ng c??nh hoa ???????m n???ng v???a n??? t??nh m?? v???n v???a ???n ch??? tinh th???n m??nh li???t. Tr??n n???n hoa hu??? tr???ng tao nh?? ?????c s???c c???a d??ng Gucci Bloom, v???i Nettare Di Fiori ???????c th??m ??i???m nh???n ho?? quy???n v???i h????ng hoa kim ng??n v?? hoa m???c t??, hoa h???ng th??m ng??t d???oi s??? t??n vinh c???a l???p n???n h????ng g??? ???m ??p.', 'M??i h????ng ???????c ph???i tr???n t???o n??n t??? nh???ng c??nh hoa ???????m n???ng v???a n??? t??nh m?? v???n v???a ???n ch??? tinh th???n m??nh li???t. Tr??n n???n hoa hu??? tr???ng tao nh?? ?????c s???c c???a d??ng Gucci Bloom, v???i Nettare Di Fiori ???????c th??m ??i???m nh???n ho?? quy???n v???i h????ng hoa kim ng??n v?? hoa m???c t??, hoa h???ng th??m ng??t d???oi s??? t??n vinh c???a l???p n???n h????ng g??? ???m ??p.', '456000', 'Yves -Saint -Laurent- Black -Opium -EDP58.webp', 0, NULL, NULL, 'N?????c hoa n??? Yves  Black Opium EDP', '200', ''),
(45, 20, 20, 'G???i ?? v?? b???t ng???, Gucci Guilty Pour Homme Eau de Parfum l?? m???t h????ng th??m h????ng g???, cay n???ng ???????c t???o ra ????? khi??u kh??ch. Hoa h???ng v?? ???t t???o ra m???t s??? rung c???m c??? ??i???n b???t ng??? v?? tr??n ?????y sinh l???c, trong khi ho???c h????ng v?? g??? tuy???t t??ng l??m n???i b???t s??? phong ph?? v?? g???i c???m c???a h????ng th??m.', 'G???i ?? v?? b???t ng???, Gucci Guilty Pour Homme Eau de Parfum l?? m???t h????ng th??m h????ng g???, cay n???ng ???????c t???o ra ????? khi??u kh??ch. Hoa h???ng v?? ???t t???o ra m???t s??? rung c???m c??? ??i???n b???t ng??? v?? tr??n ?????y sinh l???c, trong khi ho???c h????ng v?? g??? tuy???t t??ng l??m n???i b???t s??? phong ph?? v?? g???i c???m c???a h????ng th??m.', '789000', 'nuoc-hoa-scandal-178.jpg', 0, NULL, NULL, 'N?????c hoa nam Yves Laure', '100', '710100'),
(46, 20, 21, 'H????ng ch??nh: Hoa hu???, Orange Blossom, Hoa Nh??i Sambac, S???a, Raspberry\r\n\r\nKhi So Scandal ti???p c???n, h????ng th??m ng???t ng??o tr??n ng???p kh??ng gian v?? d?????ng nh?? kh??ng ai c?? th??? tr???n kh???i s??? c??m d??? m?????t m?? m?? So Scandal mang l???i.', 'H????ng ch??nh: Hoa hu???, Orange Blossom, Hoa Nh??i Sambac, S???a, Raspberry\r\n\r\nKhi So Scandal ti???p c???n, h????ng th??m ng???t ng??o tr??n ng???p kh??ng gian v?? d?????ng nh?? kh??ng ai c?? th??? tr???n kh???i s??? c??m d??? m?????t m?? m?? So Scandal mang l???i.', '123000', 'so-sa_f127da40be4a46a9a4154613f99483d8_master40.webp', 0, NULL, NULL, 'Jean Paul Gaultier So Scandal!', '100', '98400'),
(48, 20, 22, 'Th????ng hi???u Chanel n???i ti???ng ?????n t??? Ph??p. Mang m??i h????ng t????i m??t, nh??? nh??ng nh??ng kh??ng k??m ph???n sang tr???ng qu?? ph??i.', 'Th????ng hi???u Chanel n???i ti???ng ?????n t??? Ph??p. Mang m??i h????ng t????i m??t, nh??? nh??ng nh??ng kh??ng k??m ph???n sang tr???ng qu?? ph??i.', '3500000', 'coco87.jpg', 0, NULL, NULL, 'N?????c Hoa Chanel Coco Mademoiselle 100m', '10', NULL),
(49, 19, 21, '?????n t??? th????ng hi???u n???i ti???ng c???a Ph??p. Dior mang m??i h????ng ?????m ch???t ph????ng ????ng ???m ??p, l???ch l??m.', '?????n t??? th????ng hi???u n???i ti???ng c???a Ph??p. Dior mang m??i h????ng ?????m ch???t ph????ng ????ng ???m ??p, l???ch l??m.', '2980000', 'dior nam94.jpg', 0, NULL, NULL, 'N?????c Hoa Nam Dior Sauvage EDP', '10', NULL),
(50, 21, 19, 'N?????c hoa th????ng hi???u Versace lu??n ???????c ??a chu???ng tr??n to??n th??? gi???i, ?????c bi???t l?? d??ng n?????c hoa Versace Eros. D?? thi???t k??? chai 5ml nh??? b?? nh??ng bi???u t?????ng n??? th???n quy???n l???c Medusa v???n l?? ??i???m nh???n t???o n??n s??? sang tr???ng cho lo???i n?????c hoa n??y.', 'N?????c hoa th????ng hi???u Versace lu??n ???????c ??a chu???ng tr??n to??n th??? gi???i, ?????c bi???t l?? d??ng n?????c hoa Versace Eros. D?? thi???t k??? chai 5ml nh??? b?? nh??ng bi???u t?????ng n??? th???n quy???n l???c Medusa v???n l?? ??i???m nh???n t???o n??n s??? sang tr???ng cho lo???i n?????c hoa n??y.', '1200000', 'semini35.jpg', 0, NULL, NULL, 'VERSACE EROS', '5', NULL),
(51, 21, 22, 'BLEU DE CHANEL Parfum l?? h????ng n?????c hoa ho??n h???o v???i h????ng th??m thu???n khi???t nh??ng c??ng r???t s??u s???c, th??? hi???n s??? nam t??nh, m???nh m??? v?? t??? tin.', 'BLEU DE CHANEL Parfum l?? h????ng n?????c hoa ho??n h???o v???i h????ng th??m thu???n khi???t nh??ng c??ng r???t s??u s???c, th??? hi???n s??? nam t??nh, m???nh m??? v?? t??? tin.', '500000', 'chanel minin59.jpg', 0, NULL, NULL, 'N?????c hoa nam Chanel Bleu De Chanel EDP 10ml', '6', NULL),
(52, 21, 17, 'M??i h????ng c???a s??? t??? do, s??? sang tr???ng v?? ?????ng c???p, ?????y t???t c??? nh???ng g?? ph??? n??? c???n ch??? l?? th??? th??i, t??? do v?? chanh x???. Nh???ng n???t h????ng Cam ma-r???c k???t h???p m??i x??? h????ng t??o b???o r???t l??i cu???n v?? l??u h????ng l??u h??n', 'M??i h????ng c???a s??? t??? do, s??? sang tr???ng v?? ?????ng c???p, ?????y t???t c??? nh???ng g?? ph??? n??? c???n ch??? l?? th??? th??i, t??? do v?? chanh x???. Nh???ng n???t h????ng Cam ma-r???c k???t h???p m??i x??? h????ng t??o b???o r???t l??i cu???n v?? l??u h????ng l??u h??n', '390000', 'yslmini36.jpg', 0, NULL, NULL, 'N?????C HOA MINI YSL LIBRE PERFUME 7,5ML', '3', NULL),
(53, 21, 18, 'Nh??? nh??ng v?? ?????y d???u d??ng v???i n???t h????ng hoa kim ng??n. ???m ??p, ?????m ???? c???a hoa nh??i v?? hu???. V???a thanh tao nh???ng c??ng r???t b?? ???n. T???o n??n hi???u ???ng v?? c??ng sang tr???ng v?? n??? t??nh cho nh???ng c?? g??i tr???.N?????c hoa Gucci mini 5ml nh??n chung c?? kh??? n??ng b??m t???a kh?? t???t. Kho???ng t??? 6-7 gi??? ?????ng h??? tr??n da. H????ng th??m nh??? nh??ng, bay b???ng, ph???ng ph???t xung quanh d???u nh??? s??? kh??ng khi???n nh???ng ng?????i xung quanh c???m th???y d??? ch???u', 'Nh??? nh??ng v?? ?????y d???u d??ng v???i n???t h????ng hoa kim ng??n. ???m ??p, ?????m ???? c???a hoa nh??i v?? hu???. V???a thanh tao nh???ng c??ng r???t b?? ???n. T???o n??n hi???u ???ng v?? c??ng sang tr???ng v?? n??? t??nh cho nh???ng c?? g??i tr???.N?????c hoa Gucci mini 5ml nh??n chung c?? kh??? n??ng b??m t???a kh?? t???t. Kho???ng t??? 6-7 gi??? ?????ng h??? tr??n da. H????ng th??m nh??? nh??ng, bay b???ng, ph???ng ph???t xung quanh d???u nh??? s??? kh??ng khi???n nh???ng ng?????i xung quanh c???m th???y d??? ch???u', '600000', 'nuoc-hoa-gucci-mini-5ml-477.jpg', 0, NULL, NULL, 'N?????c hoa Gucci Bloom mini 5ml', '8', NULL),
(54, 21, 20, 'N?????c hoa Tom my Boy v???i h????ng th??m m??t r?????i, ?????y nam t??nh, cho ph??i m???nh t???a s??ng v???i phong c??ch t??? tin v?? sang tr???ng.\r\n\r\n-Tinh d???u n?????c hoa s??? t???a h????ng si??u quy???n r??, lan t???a v?? l??u l???i h????ng th??m r???t l??u khi n?? ???????c s??? d???ng tr??n c??c ??i???m m???ch tr??n c?? th??? b???n nh?? v??ng c??? tay, c???, sau tai hay sau g??y v?? b??n d?????i khu???u tay.\r\n\r\n-Nh???ng v??? tr?? n??y c?? m???ch ?????p m???nh v?? nhi???t cao h??n n??n l??m cho m??i h????ng khu???ch t??n m???t c??ch t??? nhi??n nh???t tr??n c?? th??? b???n\r\n\r\nH????ng ?????u: B???c h??, o???i h????ng, b?????i, cam bergamot\r\nH????ng gi???a: Qu???, b??nh T??o, v?? Rose\r\nH????ng cu???i: H??? ph??ch, hoa x????ng r???ng, c??? xanh', 'N?????c hoa Tom my Boy v???i h????ng th??m m??t r?????i, ?????y nam t??nh, cho ph??i m???nh t???a s??ng v???i phong c??ch t??? tin v?? sang tr???ng.\r\n\r\n-Tinh d???u n?????c hoa s??? t???a h????ng si??u quy???n r??, lan t???a v?? l??u l???i h????ng th??m r???t l??u khi n?? ???????c s??? d???ng tr??n c??c ??i???m m???ch tr??n c?? th??? b???n nh?? v??ng c??? tay, c???, sau tai hay sau g??y v?? b??n d?????i khu???u tay.\r\n\r\n-Nh???ng v??? tr?? n??y c?? m???ch ?????p m???nh v?? nhi???t cao h??n n??n l??m cho m??i h????ng khu???ch t??n m???t c??ch t??? nhi??n nh???t tr??n c?? th??? b???n\r\n\r\nH????ng ?????u: B???c h??, o???i h????ng, b?????i, cam bergamot\r\nH????ng gi???a: Qu???, b??nh T??o, v?? Rose\r\nH????ng cu???i: H??? ph??ch, hoa x????ng r???ng, c??? xanh', '320000', 'tmmy mi87.jpg', 0, NULL, NULL, 'N?????c Hoa Mini Tommy Boy 20ml', '9', NULL),
(56, 21, 22, 'M??i th??m nh??? nh??ng sang tr???ng, l??u h????ng l??u tr??n qu???n ??o', 'M??i th??m nh??? nh??ng sang tr???ng, l??u h????ng l??u tr??n qu???n ??o', '220000', 'chanel mini69.jpg', 0, NULL, NULL, 'N?????c Hoa Mini Chanel No5 7.5ml 10ml', '5', NULL);

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
(1, 'Ng???c Nh??', 'C???n Th??', '0848545517', 'ngocnhu240420@gmail.com', 'D??? v???', NULL, NULL),
(2, 'Nh?? Ng???c', 'C???n th??', '0848545517', 'ngocnhu240420@gmail.com', 'D??? v???', NULL, NULL),
(3, 'Nh?? Ng???c', 'C???n th??', '0848545517', 'ngocnhu240420@gmail.com', 'D??? d???', NULL, NULL),
(4, '1', '4', '3', '2', '5', NULL, NULL),
(5, '11', '1', '1', '1', '1', NULL, NULL),
(6, '1', '4', '3', '2', 'nh??? tay d??m', NULL, NULL),
(7, 'Nh?? Ng???c', 'H???u Giang', '0848545517', 'nhungoc240420@gmail.com', 'H??ng d??? v???', NULL, NULL),
(8, ' Ng???c Nh?? ', '1', '0848545517', 'nhungoc240420@gmail.com', 'ki???m tra h??ng', NULL, NULL),
(9, 'Nh??', 'H???u Giang', '0848545517', 'nhungoc240420@gmail.com', 'Ki???m tra h??ng', NULL, NULL),
(10, 'Ng???c', 'C?? Mau', '0848545517', 'nhungoc240420@gmail.com', 'D??? v???', NULL, NULL),
(11, 'Ngoc Nhu Tran', 'H???u Giang', '0848545517', 'nhungoc240420@gmail.com', 'Ki???m tra', NULL, NULL),
(12, 'Ng???c Tr???n', 'C???n Th??', '0848545517', 'ngocnhu240420@gmail.com', 'ki???m tra', NULL, NULL),
(13, 'Ng???c', 'C???n Th??', '0848545517', 'nhungoc240420@gmail.com', 'nh??? tay', NULL, NULL),
(14, 'Nh??', 'H???u Giang', '0848545517', 'nhungoc240420@gmail.com', 'ki???m tra\r\n', NULL, NULL),
(15, 'Tr???n Nh??', 'C???n Th??', '0848545517', 'nhungoc240420gmail.com', 'nh??? tay', NULL, NULL),
(16, 'Tran Nhu Ngoc', 'H???u Giang', '0848545517', 'nhungoc240420@gmail.com', 'nh??? tay, d??? v???', NULL, NULL),
(17, 'Nh?? Ng???c Tr???n', 'C???n Th??', '0848545517', 'ngocnhu240420@gmail.com', 'ki???m tra k??', NULL, NULL),
(18, 'Tran Nhu Ngoc', 'C?? Mau', '0796998523', 'nhungoc@gmail.com', 'ki???m tra', NULL, NULL),
(19, 'Ngoc Nhu', 'C?? Mau', '0796998523', 'ngocnhu240420@gmail.com', 'nh??? tay', NULL, NULL),
(20, 'Tr???n Nh?? Ng???c', 'H???u Giang CT', '0796998523', 'nhungoc240420@gmail.com', 'ki???m tra th???', NULL, NULL);

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
