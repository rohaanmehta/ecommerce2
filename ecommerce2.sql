-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `price`) VALUES
(11, 25, 6, 55000),
(12, 26, 6, 5500),
(13, 18, 6, 20500),
(14, 17, 6, 5499);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_desc_top` text NOT NULL,
  `parent_category` varchar(10) NOT NULL DEFAULT '',
  `show_on_homepage` int(1) NOT NULL DEFAULT 0,
  `category_order` int(10) NOT NULL DEFAULT 0,
  `category_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_desc_top`, `parent_category`, `show_on_homepage`, `category_order`, `category_slug`) VALUES
(11, 'KITCHEN', 'Welcome to the future of kitchen design with our innovative modular kitchen solutions. Our modular kitchens are meticulously crafted to combine functionality with aesthetics, offering versatility and convenience like never before. Each component is thoughtfully designed to optimize space utilization and organization, providing you with a seamless cooking experience. Whether you\'re a culinary enthusiast or a busy professional, our modular kitchen designs are tailored to meet your lifestyle needs, making meal preparation a pleasure rather than a chore. Elevate your culinary space with our customizable modular kitchen solutions and unlock a world of possibilities for your home.', '', 1, 1, 'KITCHEN'),
(12, 'FURNITURE', ' ', '', 1, 2, 'FURNITURE'),
(13, 'BEDS', 'Introducing our revolutionary modular bed design, where versatility meets comfort to transform your sleeping space into a personalized sanctuary. Our modular beds are expertly crafted to adapt to your changing needs, offering endless possibilities for customization and functionality. From integrated storage solutions to adjustable configurations, each component of our modular beds is thoughtfully designed to enhance your sleeping experience. Whether you crave extra storage, space-saving solutions, or simply desire a bed that reflects your unique style, our modular designs have you covered. Elevate your bedroom with our customizable modular bed solutions and discover the ultimate in comfort and convenience.', '12', 1, 1, 'BEDS'),
(14, 'STUDY TABLE', ' ', '12', 1, 2, 'STUDYTABLE'),
(15, 'WARDROBE', 'Welcome to a world of organized elegance with our exquisite wardrobe collection. Crafted with precision and designed to enhance your living space, our wardrobes combine functionality with style to provide the perfect storage solution for your clothing and accessories. From sleek modern designs to timeless classics, each wardrobe is expertly crafted to maximize space utilization and optimize organization, keeping your belongings neatly tucked away and easily accessible. Elevate your bedroom or dressing area with our versatile wardrobe options and add a touch of sophistication to your home décor.', '12', 1, 3, 'WARDROBE'),
(16, 'CHAIR', 'Welcome to our world of chairs, where comfort meets style in every seat. From classic designs to contemporary masterpieces, our chair collection offers something for every space and taste. Crafted with care and attention to detail, each chair is a testament to quality craftsmanship and ergonomic design, ensuring optimal comfort and support for every sitter. Whether you\'re furnishing your dining room, office, or outdoor patio, our chairs are the perfect combination of form and function, adding a touch of elegance to any setting.', '12', 1, 4, 'CHAIR');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `mobile`, `email`) VALUES
(1, 'test', '87969869', 'admin@ibhejo.com');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_banner`
--

CREATE TABLE `homepage_banner` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `order` int(3) NOT NULL,
  `type` varchar(10) NOT NULL,
  `storage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_banner`
--

INSERT INTO `homepage_banner` (`id`, `name`, `order`, `type`, `storage`) VALUES
(25, '310324081030.png', 1, 'banner1', 'local'),
(26, '310324081039.png', 2, 'banner1', 'local'),
(27, '310324081048.png', 3, 'banner1', 'local'),
(28, '310324081056.png', 4, 'banner1', 'local'),
(29, '310324081104.png', 5, 'banner1', 'local'),
(30, '310324081113.png', 6, 'banner1', 'local'),
(31, '310324081125.png', 1, 'banner2', 'local'),
(32, '310324081136.png', 2, 'banner2', 'local'),
(33, '310324081146.png', 3, 'banner2', 'local'),
(34, '310324081155.png', 4, 'banner2', 'local'),
(35, '310324081206.png', 1, 'banner3', 'local');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_slider`
--

CREATE TABLE `homepage_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order` int(5) NOT NULL,
  `storage` varchar(10) NOT NULL DEFAULT 'local'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_slider`
--

INSERT INTO `homepage_slider` (`id`, `name`, `order`, `storage`) VALUES
(18, '310324080758.png', 1, 'local'),
(19, '310324080807.png', 2, 'local'),
(20, '310324080816.png', 3, 'local');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `purchasable` int(2) NOT NULL DEFAULT 0,
  `product_slug` varchar(100) NOT NULL,
  `promote` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `desc`, `price`, `stock`, `sku`, `purchasable`, `product_slug`, `promote`) VALUES
(16, 'CHAIR DECOR Velvet Upholstered Modern Accent Arm Chair for Living and Dining Room Mid-Century Club', 'Heavy Duty With Luxury: The chair comes with the durable MS frame which is capable to handle 150kgs Of weight provides stability and ensuring long-lasting use. High density foam with upholstered in high quality velvet fabric offering a soft and elegant seating experience.', 9500, 10, '345-LPO', 0, '345-LPO22589250324104347', 'section2'),
(17, 'Finch Fox Low Back Home Office Desk Task Chair Swivel Computer Chair - Velvet Upholstery Accent Chair for Desk on Rolling Wheels, Adjustable Height Swivel Chair Yellow & Light Grey Color', '', 5499, 20, 'PO9-0DFF', 1, 'PO9-0DFF27695250324072730', 'section2'),
(18, 'Stella furnitures Nordic Accent Chair Velvet Upholstery Chair Tufted Chair / Bubble / Block Chair Grey , Pre - Assembled', '', 20500, 15, 'JK871-WE', 1, 'JK871-WE45471250324072742', 'section2'),
(19, 'TIED RIBBONS Stylish Designer DSW Chair for Living Room Garden Patio Café Home Side Chair Office Accent Chair', '', 3500, 5, 'UIPO765-PL', 1, 'UIPO765-PL38760250324072753', 'section2'),
(20, 'Choose It Teak Wood Rocking Chair/Colonial and Traditional Rocking Armchair/Balcony/Super Comfirtable Cushion(Light Gray)', '', 13999, 22, 'POLDF-73', 1, 'POLDF-7336288250324072804', 'section2'),
(22, 'Solimo Madray Engineered Wood Wardrobe, Wenge, 3 Door', '', 15550, 14, 'DHJY78-KJ', 1, 'DHJY78-KJ18084240324121306', 'section1'),
(23, 'SONA ART & CRAFTS Solid Sheesham Wood 2 Door Wardrobe with 5 Drawers Storage for Bedroom | Wooden Almirah for Clothes | Wooden Cupboard | Natural Honey Finish', '', 35999, 6, 'HJI76-0H', 1, 'HJI76-0H30569250324072815', 'section1'),
(24, 'Royal Interiors Noah Metal Matte Finish Bed Queen Size Matte Finish Bed Without Storage For Bedroom Living Room Furniture Queen Matte Finish Bed For Home', '', 0, 0, 'POHG8-WE', 1, 'POHG8-WE58280250324073201', 'section1'),
(25, 'The Sleep Company Elev8 Smart Recliner Bed | Bed Base with Italia Grey Frame | Premium Smart Adjustable Bed | in-Built Massage Mode & Zero Gravity Sleep Mode', '', 55000, 9, 'HGDUYD65-WR', 1, 'HGDUYD65-WR30291250324072838', 'section1'),
(26, 'Portronics My Buddy D Wood Multipurpose Movable & Adjustable Table for Computer & Laptop', '', 5500, 9, 'GHYUI65-!S', 1, 'GHYUI65-!S28926250324072848', 'section1');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`) VALUES
(16, 16, 16),
(17, 17, 16),
(18, 18, 16),
(19, 19, 16),
(20, 20, 16),
(22, 22, 12),
(23, 23, 16),
(24, 24, 13),
(25, 25, 13),
(26, 26, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE `product_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `product` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_enquiry`
--

INSERT INTO `product_enquiry` (`id`, `name`, `contact`, `product`) VALUES
(3, 'rohaan', '9766084748', 19),
(4, 'rohaan', '9766084748', 19),
(5, 'rohaan', '9766084748', 19),
(6, 'rohaan', '9766084748', 19);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `image_name1` varchar(100) NOT NULL,
  `image_name2` varchar(100) NOT NULL,
  `image_name3` varchar(100) NOT NULL,
  `image_name4` varchar(100) NOT NULL,
  `order` int(10) NOT NULL,
  `storage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_name1`, `image_name2`, `image_name3`, `image_name4`, `order`, `storage`) VALUES
(19, 16, '1240324113957.png', '2240324114145.png', '3240324114145.png', '4240324114145.png', 0, 'local'),
(20, 17, '1240324114537.png', '2240324114537.png', '3240324114537.png', '4240324114537.png', 0, 'local'),
(21, 18, '1240324114748.png', '2240324114748.png', '3240324114748.png', '4240324114748.png', 0, 'local'),
(22, 19, '1240324114948.png', '2240324114948.png', '3240324114948.png', '4240324114948.png', 0, 'local'),
(23, 20, '1240324115206.png', '2240324115206.png', '3240324115206.png', '4240324115206.png', 0, 'local'),
(25, 22, '1240324121306.png', '2240324121306.png', '3240324121306.png', '', 0, 'local'),
(26, 23, '1240324121518.png', '2240324121518.png', '3240324121518.png', '4240324121518.png', 0, 'local'),
(27, 24, '1240324121700.png', '2240324121700.png', '3240324121700.png', '4240324121700.png', 0, 'local'),
(28, 25, '1240324121836.png', '2240324121836.png', '3240324121836.png', '4240324121836.png', 0, 'local'),
(29, 26, '1240324122028.png', '2240324122028.png', '3240324122028.png', '4240324122028.png', 0, 'local');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `country`, `state`, `city`, `email`, `password`, `role`) VALUES
(3, 'wew', '', 'yiuy', 'iyi', 'yiy', 'iy', '10f9132e586392a6513eeeb303db630c', 'customer'),
(4, 'wew', '', 'yiuy', 'iyi', 'yiy', 'iy', '10f9132e586392a6513eeeb303db630c', 'customer'),
(5, 'wew', '', 'yiuy', 'iyi', 'yiy', 'iy', '10f9132e586392a6513eeeb303db630c', 'customer'),
(6, 'rohaan', '', 'india', 'maharashtra', 'mumbai', 'ronymehta321@gmail.com', '286f81c4c860b781fc162ea188d1911b', 'admin'),
(7, 'tt', '', 'tt', 't', 'tt', 't', '6aef24261a07283f92f5483621168d73', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_slider`
--
ALTER TABLE `homepage_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `homepage_slider`
--
ALTER TABLE `homepage_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
