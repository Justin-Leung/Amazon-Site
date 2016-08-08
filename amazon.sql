-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 07, 2016 at 08:55 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazon`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `niche` text NOT NULL,
  `link` text NOT NULL,
  `image_link` text NOT NULL,
  `price` text NOT NULL,
  `discount` text NOT NULL,
  `rating` text NOT NULL,
  `asin` text NOT NULL,
  `free_shipping` varchar(5) NOT NULL,
  `special_offers` varchar(5) NOT NULL,
  `no_auctions` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `niche`, `link`, `image_link`, `price`, `discount`, `rating`, `asin`, `free_shipping`, `special_offers`, `no_auctions`) VALUES
(1, 'Panasonic ErgoFit Best in Class In-Ear Earbud Headphones', 'electronics', 'https://www.amazon.com/Panasonic-Headphones-RP-HJE120-K-Comfort-Fit-Compatible/dp/B003EM8008/', 'https://images-na.ssl-images-amazon.com/images/I/31-nuw-iqAL.jpg', '$28.99', '$7.89', '5', 'B003EM8008', 'true', 'true', 'false'),
(2, 'Cards Against Humanity', 'toys', 'https://www.amazon.com/Cards-Against-Humanity-LLC-CAHUS/dp/B004S8F7QM/ref=zg_bs_toys-and-games_1', 'https://images-na.ssl-images-amazon.com/images/I/41OYMigTzeL._AC_UL320_SR282,320_.jpg', '$24.99', '', '5', 'B004S8F7QM', 'true', 'false', 'false'),
(3, 'Leatherman - Wingman Multi-Tool, Stainless Steel\r\n', 'outdoors', 'https://www.amazon.com/Leatherman-Wingman-Multi-Tool-Stainless-Steel/dp/B005DI0XM4/', 'https://images-na.ssl-images-amazon.com/images/I/412e81ONPWL._SX466_.jpg', '$29.47', '', '4.5', 'B005DI0XM4', 'true', 'false', 'true'),
(4, 'RTIC 30 oz. Tumbler', 'home', 'https://www.amazon.com/RTIC-RTIC30-30-oz-Tumbler/dp/B019D9HESO/', 'http://ecx.images-amazon.com/images/I/31o0goKiY-L.jpg', '$17.35', '$15.95', '4.5', 'B019D9HESO', 'true', 'true', 'false'),
(5, 'External Battery RAVPower 16750mAh Portable Charger', 'electronics', 'https://www.amazon.com/Portable-RAVPower-16750mAh-Technology-Lightning/dp/B00MQSMDYU/', 'https://images-na.ssl-images-amazon.com/images/I/41vynM771AL.jpg', '$64.99', '$35.99', '4.5', 'B00MQSMEEE', 'true', 'false', 'false'),
(6, 'KMASHI 10000mAh External Battery Power Bank', 'electronics', 'https://www.amazon.com/KMASHI-10000mAh-External-Battery-Portable/dp/B00JM59JPG/', 'https://images-na.ssl-images-amazon.com/images/I/51m4oNi7ldL._SX522_.jpg', '$69.99', '$13.99', '5', 'B00JM59JPG', 'true', 'true', 'false'),
(7, 'SanDisk Ultra Fit 128GB USB 3.0 Flash Drive', 'electronics', 'https://www.amazon.com/SanDisk-Ultra-SDCZ43-128G-GAM46-Newest-Version/dp/B01BGTG2A0/', 'https://images-na.ssl-images-amazon.com/images/I/61QGF0DVSOL._SY679_.jpg', '$39.99', '$28.99', '4.5', 'B01BGTG2A0', 'true', 'true', 'false'),
(8, 'Sargent Art 22-7251 Colored Pencils, Pack of 50, Assorted Colors', 'other', 'https://www.amazon.com/Sargent-Art-22-7251-Colored-Assorted/dp/B0027PA1AU', 'https://images-na.ssl-images-amazon.com/images/I/71grY4U4mgL._SX522_.jpg', '$19.75', '$8.65', '4.5', 'B0027PA1AU', 'true', 'false', 'false'),
(9, 'AmazonBasics Microfiber Cleaning Cloth - 24 Pack', 'home', 'https://www.amazon.com/AmazonBasics-Microfiber-Cleaning-Cloth-Pack/dp/B009FUF6DM/', 'https://images-na.ssl-images-amazon.com/images/I/91Nw5vN%2BCQL._SX522_PIbundle-24,TopRight,0,0_SX374SY522SH20_.jpg', '$13.95', '', '4.5', 'B009FUF6DM', 'true', 'false', 'false'),
(10, 'Philips Norelco Multigroom Series 3100, 5 attachments, QG3330', 'beauty', 'https://www.amazon.com/Philips-Norelco-Multigroom-attachments-QG3330/dp/B00ARF42H0/', 'https://images-na.ssl-images-amazon.com/images/I/61GXd5VfFnL._SL1300_.jpg', '$19.99', '$18.97', '4.5', 'B00ARF42H0', 'true', 'true', 'false'),
(11, 'Q-tips Cotton Swabs, 500 Count (Pack of 4)', 'beauty', 'https://www.amazon.com/Q-tips-Cotton-Swabs-Count-Pack/dp/B00005304H/', 'https://images-na.ssl-images-amazon.com/images/I/81H21iKKU9L._SY679_.jpg', '$14.44', '$10.76', '5', 'B00005304H', 'true', 'true', 'true'),
(12, 'AmazonBasics Apple Certified Lightning to USB Cable - 6 Feet (1.8 Meters) - White', 'electronics', 'https://www.amazon.com/AmazonBasics-Apple-Certified-Lightning-Cable/dp/B010S9N6OO/', 'https://images-na.ssl-images-amazon.com/images/I/71soxnP9Q%2BL._SL1399_.jpg', '$7.99', '', '4.5', 'B010S9N6OO', 'true', 'false', 'false'),
(13, 'AmazonBasics High-Speed HDMI Cable - 6 Feet (Latest Standard)', 'electronics', 'https://www.amazon.com/AmazonBasics-High-Speed-HDMI-Cable-Standard/dp/B014I8SSD0/', 'https://images-na.ssl-images-amazon.com/images/I/71pFDaZU8lL._SL1500_.jpg', '$5.49', '', '4.5', 'B014I8SSD0', 'true', 'false', 'false'),
(14, 'AmazonBasics AA Performance Alkaline Batteries (48-Pack)', 'home', 'https://www.amazon.com/AmazonBasics-Performance-Alkaline-Batteries-48-Pack/dp/B00MNV8E0C/', 'https://images-na.ssl-images-amazon.com/images/I/911DjgBE5wL._SX522_.jpg', '$12.99', '$12.34', '4.5', 'B00MNV8E0C', 'true', 'true', 'true'),
(15, 'SanDisk Ultra 64GB microSDXC UHS-I Card with Adapter, Grey/Red', 'electronics', 'https://www.amazon.com/SanDisk-microSDXC-Standard-Packaging-SDSQUNC-064G-GN6MA/dp/B010Q588D4/', 'https://images-na.ssl-images-amazon.com/images/I/61fslgOdQCL._SL1200_.jpg', '$59.99', '$19.19', '4.5', 'B010Q588D4', 'true', 'true', 'false'),
(16, 'Cambridge SoundWorks OontZ Angle 3 Next Generation Ultra Portable Wireless Bluetooth Speaker', 'electronics', 'https://www.amazon.com/Cambridge-SoundWorks-OontZ-Angle-Generation/dp/B010OYASRG/', 'https://images-na.ssl-images-amazon.com/images/I/712YnPWCEkL._SL1001_.jpg', '$99.99', '$27.99', '4.5', 'B010OYASRG', 'true', 'true', 'true'),
(17, 'iPhone 6S Tempered Glass Screen Protector for Apple iPhone 6, iPhone 6S 2015 (2-Pack)', 'electronics', 'https://www.amazon.com/iPhone-Screen-Protector-amFilm-Tempered/dp/B01415QHYW/', 'https://images-na.ssl-images-amazon.com/images/I/71gO96OjWzL._SL1500_.jpg', '$29.99', '$7.95', '4.5', 'B01415QHYW', 'true', 'true', 'false'),
(18, 'Champion Men''s Long Mesh Short with Pockets', 'clothing', 'https://www.amazon.com/Champion-Mens-Long-Short-Pockets/dp/B002VLZH7M/', 'https://images-na.ssl-images-amazon.com/images/I/81n%2BHovBsSL._UX342_.jpg', '$9.35', '', '4.5', 'B002VLZH7M/', 'true', 'true', 'true'),
(19, 'Retro Rewind Classic Polarized Wayfarer Sunglasses', 'clothing', 'https://www.amazon.com/Retro-Rewind-Polarized-Wayfarer-Sunglasses/dp/B014B4XUB6/', 'https://images-na.ssl-images-amazon.com/images/I/41VAXCUWUML._UX679_.jpg', '$7.25', '', '4', 'B014B4XUB6', 'true', 'true', 'false'),
(20, 'Ultra Bright CREE XML T6 LED 600 Lumen Tactical Flashlight', 'outdoors', 'https://www.amazon.com/Tactical-Flashlight-Resistant-Camping-Adjustable/dp/B01DF2MNCM/', 'https://images-na.ssl-images-amazon.com/images/I/612bhScdMwL._SL1000_.jpg', '$16.99', '', '5', 'B01DF2MNCM', 'true', 'true', 'false'),
(21, 'Sennheiser HD 202 II Professional Headphones (Black)', 'electronics', 'https://www.amazon.com/Sennheiser-202-Professional-Headphones-Black/dp/B003LPTAYI/', 'https://images-na.ssl-images-amazon.com/images/I/71OJzVOZ5HL._SL1500_.jpg', '$34.99', '$24.50', '4', 'B003LPTAYI', 'true', 'true', 'true'),
(22, 'JanSport T501 SuperBreak Backpack', 'clothing', 'https://www.amazon.com/JanSport-T501-SuperBreak-Backpack/dp/B0007QCSKM/', 'https://images-na.ssl-images-amazon.com/images/I/61ro3sBG5HL._UX385_.jpg', '$29.99', '', '4.5', 'B0007QCSKM', 'true', 'true', 'true'),
(23, 'KRUPS F203 Electric Spice and Coffee Grinder with Stainless Steel Blades, 3-Ounce, Black', 'home', 'https://www.amazon.com/KRUPS-Electric-Grinder-Stainless-3-Ounce/dp/B00004SPEU/', 'https://images-na.ssl-images-amazon.com/images/I/81OJ6qwKxyL._SL1500_.jpg', '$19.90', '', '4.5', 'B00004SPEU', 'true', 'true', 'true'),
(24, 'InnoGear 5000 Lumen Bright Headlight Headlamp Flashlight Torch', 'outdoors', 'https://www.amazon.com/InnoGear-Headlight-Flashlight-Rechargeable-Batteries/dp/B00OUOS0PE/', 'https://images-na.ssl-images-amazon.com/images/I/61KopXDrpAL._SL1001_.jpg', '$59.99', '$27.98', '5', 'B00OUOS0PE', 'true', 'true', 'false'),
(25, 'Panasonic Best in Class On-Ear Stereo Headphones RP-HT21 (Black & Silver)', 'electronics', 'https://www.amazon.com/Panasonic-Headphones-Lightweight-Comfortable-Audiophile/dp/B00004T8R2/', 'https://images-na.ssl-images-amazon.com/images/I/41OfTYsUX1L.jpg', '$7.44', '', '5', 'B00004T8R2', 'true', 'false', 'false'),
(26, 'Fruit of the Loom Men''s 6-Pack Stay Tucked Crew T-Shirt', 'clothing', 'https://www.amazon.com/Fruit-Loom-6-Pack-Tucked-T-Shirt/dp/B00XWUD2N2/', 'https://images-na.ssl-images-amazon.com/images/I/81UxhkSlBjL._UX342_.jpg', '$11.99', '', '4.5', 'B00XWUD2N2', 'true', 'false', 'false'),
(27, 'Sabrent 4-Port USB 2.0 Hub with Individual Power Switches and LEDs', 'electronics', 'https://www.amazon.com/Sabrent-4-Port-Individual-Switches-HB-UMLS/dp/B00BWF5U0M/', 'https://images-na.ssl-images-amazon.com/images/I/712PsQVOWTL._SL1500_.jpg', '$12.99', '$6.99', '4.5', 'B00BWF5U0M', 'true', 'true', 'true'),
(28, 'Lokai Classic Bracelet', 'clothing', 'https://www.amazon.com/Lokai-Classic-Bracelet/dp/B00XTWALL4/', 'https://images-na.ssl-images-amazon.com/images/I/31JHmjkDRKL._UY395_.jpg', '$22.99', '', '4', 'B00XTWALL4', 'true', 'false', 'true'),
(29, 'Rubbermaid Easy Find Lid Food Storage Container, 42-Piece set', 'home', 'https://www.amazon.com/Rubbermaid-Easy-Storage-Container-42-Piece/dp/B00COK3FD8/', 'https://images-na.ssl-images-amazon.com/images/I/41bwydgZ%2B2L.jpg', '$15.99', '', '5', 'B00COK3FD8/', 'true', 'true', 'true'),
(30, 'Honeywell HT-900 TurboForce Air Circulator Fan, Black', 'home', 'https://www.amazon.com/Honeywell-HT-900-TurboForce-Circulator-Black/dp/B001R1RXUG/', 'https://images-na.ssl-images-amazon.com/images/I/71yQJc5kOPL._SL1500_.jpg', '$11.88', '', '4.5', 'B001R1RXUG', 'true', 'true', 'false'),
(31, 'Keurig K55 Coffee Maker, Black', 'home', 'https://www.amazon.com/dp/B018UQ5AMS/', 'https://images-na.ssl-images-amazon.com/images/I/81vmITBcqqL._SL1500_.jpg', '$88.99', '', '4.5', 'B018UQ5AMS', 'true', 'false', 'false'),
(32, 'Roll over image to zoom in\r\nPaper Mate Pink Pearl Premium Erasers, 3 Pack, Large', 'home', 'https://www.amazon.com/dp/B00006IFAQ/', 'https://images-na.ssl-images-amazon.com/images/I/815kVAi4jxL._SL1500_.jpg', '$4.58', '', '5', 'B00006IFAQ', 'true', 'true', 'false'),
(33, 'Panasonic ErgoFit Best in Class In-Ear Earbud Headphones', 'electronics', 'https://www.amazon.com/Panasonic-Headphones-RP-HJE120-Comfort-Fit-Compatible/dp/B003EM6AOG/', 'https://images-na.ssl-images-amazon.com/images/I/3122Iz%2B1EWL.jpg', '$6.28', '', '5', 'B003EM6AOG', 'true', 'true', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
