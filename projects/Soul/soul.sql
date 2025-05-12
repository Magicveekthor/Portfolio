-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 02:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soul`
--

-- --------------------------------------------------------

--
-- Table structure for table `soul_admin`
--

CREATE TABLE `soul_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_admin`
--

INSERT INTO `soul_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'laura_amah', 'luxury1000#');

-- --------------------------------------------------------

--
-- Table structure for table `soul_category`
--

CREATE TABLE `soul_category` (
  `id` int(11) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_category`
--

INSERT INTO `soul_category` (`id`, `product_category`, `category_image`) VALUES
(1, 'Summer Wears', 'blog_list_1.jpg'),
(2, 'Winter Wears', 'single_blog_4.jpg'),
(3, 'Men Collection', 'blog_list_3.jpg'),
(4, 'Women Collection', 'single_blog_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soul_message`
--

CREATE TABLE `soul_message` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `messages` longtext NOT NULL,
  `status2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_message`
--

INSERT INTO `soul_message` (`id`, `fullname`, `email_address`, `phone_number`, `messages`, `status2`) VALUES
(9, 'Odoh Victor', 'victorodoh7@gmail.com', '08104859796', 'esrffdtgfhnb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soul_orders`
--

CREATE TABLE `soul_orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `postcode` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_orders`
--

INSERT INTO `soul_orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `full_name`, `email`, `user_phone`, `user_address`, `user_country`, `postcode`, `order_date`) VALUES
(1, 240.00, 'Paid', '2', 'VICTOR', 'magicveekthor@gmail.com', '08104859786', 'Level 14, Tower Three, International Towers Sydney Exchange Place, 300 Barangaroo Avenue', 'Nigeria', 2000, '2023-08-22'),
(2, 120.00, 'Paid', '1', 'VICTOR', 'victorodoh7@gmail.com', '08104859786', 'Level 14, Tower Three, International Towers Sydney Exchange Place, 300 Barangaroo Avenue', 'Nigeria', 397691, '2023-08-23'),
(3, 10.00, 'Not paid', '0', 'VICTOR', 'magicveekthor@gmail.com', '09017127141', 'Valley Crescent, Nza street', 'Nigeria', 2000, '2023-08-23'),
(4, 120.00, 'Paid', '2', 'VICTOR', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-09-06'),
(5, 50.00, 'Paid', '1', 'VICTOR', 'anthonyokafor14@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-09-06'),
(6, 40.00, 'Paid', '1', 'Odoh Victor', 'victorodoh7@gmail.com', '01215 654096', '45 Valley Crescent, Nza Street, Independence Layout', 'Nigeria', 56789, '2023-09-06'),
(30, 60.00, 'Paid', '20', 'John Doe', 'anthonyokafor14@gmail.com', '08104859786', '4 Nwamba Street, Achara Layout', 'Nigeria', 56789, '2023-10-04'),
(31, 60.00, 'Paid', '20', 'John Doe', 'anthonyokafor14@gmail.com', '08104859786', '4 Nwamba Street, Achara Layout', 'Nigeria', 56789, '2023-10-04'),
(32, 50.00, 'Paid', '1', 'Odoh Victor', 'victorodoh7@gmail.com', '01215 654096', '45 Valley Crescent, Nza Street, Independence Layout', 'Nigeria', 56789, '2023-10-04'),
(33, 50.00, 'Paid', '1', 'Odoh Victor', 'victorodoh7@gmail.com', '01215 654096', '45 Valley Crescent, Nza Street, Independence Layout', 'Nigeria', 56789, '2023-10-04'),
(34, 50.00, 'Paid', '1', 'Odoh Victor', 'victorodoh7@gmail.com', '01215 654096', '45 Valley Crescent, Nza Street, Independence Layout', 'Nigeria', 56789, '2023-10-04'),
(35, 20.00, 'Paid', '0', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-10-18'),
(36, 20.00, 'Paid', '0', 'Victor Odoh', 'victorodoh7@gmail.com', '09017127141', 'Level 14, Tower Three, International Towers Sydney Exchange Place, 300 Barangaroo Avenue', 'Nigeria', 34597, '2023-10-18'),
(37, 20.00, 'Not paid', '0', 'Victor Odoh Calistus', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 34597, '2023-10-19'),
(38, 20.00, 'Not paid', 'Guest', 'Victor Odoh Calistus', 'magicveekthor@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-10-19'),
(39, 20.00, 'Not paid', 'Guest', 'Victor Odoh Calistus', 'victorodoh7@gmail.com', '08104859786', 'Adepeyin Olowu Street, Eleko Beach Rd, 105101, Eleko, Lagos', 'Nigeria', 397691, '2023-10-19'),
(40, 50.00, 'Paid', '20', 'Anthony Okafor', 'anthonyokafor14@gmail.com', '08104859786', '4 Nwamba Street, Achara Layout', 'Nigeria', 56789, '2023-10-24'),
(41, 50.00, 'Paid', '22', 'Magic Johnson', 'magicveekthor@gmail.com', '09017127141', '4 Nwamba Street, Achara Layout', 'Nigeria', 56789, '2023-10-24'),
(42, 50.00, 'Paid', '22', 'Magic Johnson', 'magicveekthor@gmail.com', '09017127141', '4 Nwamba Street, Achara Layout', 'Nigeria', 56789, '2023-10-24'),
(43, 210.00, 'Paid', 'Guest', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-11-09'),
(44, 130.00, 'Paid', 'Guest', 'John Doe', 'victorodoh7@gmail.com', '09017127141', 'Level 14, Tower Three, International Towers Sydney Exchange Place, 300 Barangaroo Avenue', 'Nigeria', 34597, '2023-11-09'),
(45, 20.00, 'Paid', '1', 'Odoh Victor', 'victorodoh7@gmail.com', '01215 654096', '45 Valley Crescent, Nza Street, Independence Layout', 'Nigeria', 56789, '2023-11-09'),
(46, 50.00, 'Not paid', 'Guest', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-11-09'),
(47, 50.00, 'Not paid', 'Guest', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-11-09'),
(48, 50.00, 'Not paid', 'Guest', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-11-09'),
(49, 50.00, 'Not paid', 'Guest', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-11-09'),
(50, 50.00, 'Paid', 'Guest', 'Victor Odoh', 'victorodoh7@gmail.com', '08104859786', 'Valley Crescent, Nza street', 'Nigeria', 397691, '2023-11-09'),
(51, 130.00, 'Not paid', 'Guest', 'Odoh Victor', 'vitryrudtfcjgvh@hjkm', '810 485 9786', 'p89878rytsdfgxc', 'Nigeria', 878654, '2024-09-09'),
(52, 50.00, 'Not paid', 'Guest', 'Victor Odoh', 'magicveekthor@gmail.com', '+(240) 492-6819', '4911 Marlboro Pike, Capitol Heights, Maryland', 'United States', 20743, '2025-02-11'),
(53, 50.00, 'Not paid', 'Guest', 'Victor Odoh', 'magicveekthor@gmail.com', '+(240) 492-6819', '4911 Marlboro Pike, Capitol Heights, Maryland', 'United States', 20743, '2025-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `soul_order_items`
--

CREATE TABLE `soul_order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_order_items`
--

INSERT INTO `soul_order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_color`, `product_size`, `product_quantity`, `product_image`, `user_id`, `order_date`) VALUES
(1, 1, 1, 'Soul Shorts', 40.00, 'Medium', 'Blue', 5, 'product_10.jpg', 2, '2023-08-22'),
(2, 1, 2, 'Soul Hoodie', 10.00, 'Medium', 'Black', 4, 'product_4.jpg', 2, '2023-08-22'),
(3, 2, 1, 'Soul Shorts', 40.00, 'Large', 'Red', 3, 'product_10.jpg', 1, '2023-08-23'),
(4, 3, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 1, '2023-08-23'),
(5, 4, 1, 'Soul Shorts', 40.00, 'Medium', 'Red', 3, 'product_10.jpg', 2, '2023-09-06'),
(6, 5, 2, 'Soul Hoodie', 10.00, 'Small', 'Yellow', 5, 'product_4.jpg', 1, '2023-09-06'),
(7, 6, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 1, '2023-09-06'),
(37, 30, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 20, '2023-10-04'),
(38, 30, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 20, '2023-10-04'),
(39, 31, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 20, '2023-10-04'),
(40, 31, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 20, '2023-10-04'),
(41, 32, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 4, 'product_4.jpg', 1, '2023-10-04'),
(42, 33, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 1, '2023-10-04'),
(43, 34, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 1, '2023-10-04'),
(44, 35, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 0, '2023-10-18'),
(45, 36, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 0, '2023-10-18'),
(46, 37, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 0, '2023-10-19'),
(47, 38, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 0, '2023-10-19'),
(48, 39, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 0, '2023-10-19'),
(49, 40, 2, 'Soul Hoodie', 10.00, 'Small', 'Black', 4, 'product_4.jpg', 20, '2023-10-24'),
(50, 41, 2, 'Soul Hoodie', 10.00, 'Small', 'Black', 4, 'product_4.jpg', 22, '2023-10-24'),
(51, 42, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 22, '2023-10-24'),
(52, 43, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 5, 'product_10.jpg', 0, '2023-11-09'),
(53, 44, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 3, 'product_10.jpg', 0, '2023-11-09'),
(54, 45, 2, 'Soul Hoodie', 10.00, 'Small', 'Brown', 1, 'product_4.jpg', 1, '2023-11-09'),
(55, 46, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2023-11-09'),
(56, 47, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2023-11-09'),
(57, 48, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2023-11-09'),
(58, 49, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2023-11-09'),
(59, 50, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2023-11-09'),
(60, 51, 1, 'Soul Shorts', 40.00, 'Medium', 'Blue', 3, 'product_10.jpg', 0, '2024-09-09'),
(61, 52, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2025-02-11'),
(62, 53, 1, 'Soul Shorts', 40.00, 'Small', 'Red', 1, 'product_10.jpg', 0, '2025-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `soul_payments`
--

CREATE TABLE `soul_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_payments`
--

INSERT INTO `soul_payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 1, '2', '1', '0000-00-00 00:00:00'),
(2, 1, '2', '7', '0000-00-00 00:00:00'),
(3, 4, '2', '8WB40456XD695574M', '2023-09-06 11:45:53'),
(4, 5, '1', '3WF22053PV894883J', '2023-09-06 11:54:27'),
(5, 5, '1', '0MX70316D3779742L', '2023-09-06 11:59:27'),
(6, 5, '1', '1VN88483MX6875548', '2023-09-06 11:59:55'),
(7, 0, '1', '\' 1808859934 \'', '2023-10-18 17:18:37'),
(8, 0, '1', '\' 2146822623 \'', '2023-10-18 17:22:01'),
(9, 0, '1', '\' 1784595589 \'', '2023-10-18 17:25:05'),
(10, 0, '1', '\' 1990442040 \'', '2023-10-18 17:27:11'),
(11, 0, '1', '\'.852653227.\'', '2023-10-18 17:34:38'),
(12, 0, '1', '\'.1794191095.\'', '2023-10-18 17:39:22'),
(13, 33, '1', '902067779', '2023-10-18 17:41:55'),
(14, 32, '1', '237451835', '2023-10-18 17:46:08'),
(15, 35, '0', '', '2023-10-18 17:54:03'),
(16, 36, '0', '1879235944', '2023-10-18 18:02:56'),
(17, 6, '1', '1371004127', '2023-10-24 11:39:36'),
(18, 34, '1', '831601149', '2023-10-24 11:41:53'),
(19, 30, '20', '155637933', '2023-10-24 11:51:55'),
(20, 31, '20', '296927506', '2023-10-24 12:12:47'),
(21, 40, '20', '1839846120', '2023-10-24 12:16:05'),
(22, 41, '22', '441799562', '2023-10-24 12:50:31'),
(23, 42, '22', '226929300', '2023-10-24 12:56:41'),
(24, 42, '22', '226929300', '2023-10-24 12:57:17'),
(25, 42, '22', '226929300', '2023-10-24 12:57:59'),
(26, 42, '22', '226929300', '2023-10-24 12:58:20'),
(27, 43, 'Guest', '1329670270', '2023-11-09 16:46:49'),
(28, 44, 'Guest', '496943786', '2023-11-09 16:51:59'),
(29, 45, '1', '1410008103', '2023-11-09 17:07:00'),
(30, 50, 'Guest', '230688402', '2023-11-09 17:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `soul_products`
--

CREATE TABLE `soul_products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` decimal(6,2) NOT NULL,
  `p_keyword` varchar(255) NOT NULL,
  `p_categories` varchar(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `p_color` varchar(255) NOT NULL,
  `p_material` varchar(255) NOT NULL,
  `p_type` varchar(255) NOT NULL,
  `p_descrip` longtext NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `status2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_products`
--

INSERT INTO `soul_products` (`id`, `p_name`, `p_price`, `p_keyword`, `p_categories`, `p_size`, `p_color`, `p_material`, `p_type`, `p_descrip`, `cover_image`, `status2`) VALUES
(1, 'Soul Shorts', 40.00, 'shirt,hoodie,red,large', 'Summer Wears', 'Red,Blue,Yellow', 'Small,Medium,Large', 'Cotton', 'Okay', 'The vast array of uncompleted construction projects in Nigeria is troubling, to say the least. Lots of Public projects are either abandoned or suffer from a long slowdown after huge mobilization. It is common practice to see the project not built within the stipulated time and budget. Research has identified the main cause of this to be poor project analysis and management.', 'product_10.jpg', 1),
(2, 'Soul Hoodie', 10.00, 'shirt,hoodie,red,large,sweat shirt', 'Summer Wears', 'Brown,Black,Yellow', 'Small,Medium,Large', 'Cotton', 'Okay', 'The vast array of uncompleted construction projects in Nigeria is troubling, to say the least. Lots of Public projects are either abandoned or suffer from a long slowdown after huge mobilization. It is common practice to see the project not built within the stipulated time and budget. Research has identified the main cause of this to be poor project analysis and management.', 'product_4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soul_product_detail`
--

CREATE TABLE `soul_product_detail` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `proid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_product_detail`
--

INSERT INTO `soul_product_detail` (`id`, `images`, `proid`) VALUES
(1, 'product_3.jpg', 1),
(2, 'product_4.jpg', 1),
(3, 'product_5.jpg', 1),
(4, 'product_7.jpg', 2),
(5, 'product_8.jpg', 2),
(6, 'product_9.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `soul_reviews`
--

CREATE TABLE `soul_reviews` (
  `id` int(11) NOT NULL,
  `review_name` varchar(255) NOT NULL,
  `review_rating` varchar(1) NOT NULL,
  `review_email` varchar(255) NOT NULL,
  `review_body` varchar(255) NOT NULL,
  `review_date` date NOT NULL,
  `proid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_reviews`
--

INSERT INTO `soul_reviews` (`id`, `review_name`, `review_rating`, `review_email`, `review_body`, `review_date`, `proid`) VALUES
(1, 'Odoh Victor', '', 'victorodoh7@gmail.com', 'I like the quality of the product. ', '2023-09-11', 2),
(3, 'Magic Veekthor', '', 'victorodoh7@gmail.com', 'werryyty', '2023-09-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soul_users`
--

CREATE TABLE `soul_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_street` varchar(255) NOT NULL,
  `user_zip` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soul_users`
--

INSERT INTO `soul_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_street`, `user_zip`, `user_phone`, `user_country`) VALUES
(1, 'Odoh Victor', 'victorodoh7@gmail.com', 'soul123', '45 Valley Crescent, Nza Street, Independence Layout', '56789', '01215 654096', 'Nigeria'),
(20, 'Anthony Okafor', 'anthonyokafor14@gmail.com', 'soul123', '4 Nwamba Street, Achara Layout', '56789', '08104859786', 'Nigeria'),
(21, 'Magic Veekthor', 'victor.odoh@elizadeuniversity.edu.ng', 'Calistus121', '45 Valley Crescent, Nza Street, Independence Layout', '45678', '09017127141', 'Nigeria'),
(22, 'Magic Johnson', 'magicveekthor@gmail.com', 'liverpool', '4 Nwamba Street, Achara Layout', '56789', '09017127141', 'Nigeria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `soul_admin`
--
ALTER TABLE `soul_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `soul_category`
--
ALTER TABLE `soul_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soul_message`
--
ALTER TABLE `soul_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soul_orders`
--
ALTER TABLE `soul_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `soul_order_items`
--
ALTER TABLE `soul_order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `soul_payments`
--
ALTER TABLE `soul_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `soul_products`
--
ALTER TABLE `soul_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soul_product_detail`
--
ALTER TABLE `soul_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soul_reviews`
--
ALTER TABLE `soul_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soul_users`
--
ALTER TABLE `soul_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `soul_admin`
--
ALTER TABLE `soul_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soul_category`
--
ALTER TABLE `soul_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soul_message`
--
ALTER TABLE `soul_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `soul_orders`
--
ALTER TABLE `soul_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `soul_order_items`
--
ALTER TABLE `soul_order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `soul_payments`
--
ALTER TABLE `soul_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `soul_products`
--
ALTER TABLE `soul_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soul_product_detail`
--
ALTER TABLE `soul_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soul_reviews`
--
ALTER TABLE `soul_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soul_users`
--
ALTER TABLE `soul_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
