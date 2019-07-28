-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 08:52 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sereniteawp`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE `my_order` (
  `id` int(10) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `blend_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `ctn_size` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `cartons` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`id`, `order_id`, `user_id`, `type`, `blend_name`, `product_code`, `ctn_size`, `quantity`, `cartons`, `date`, `status`, `category`) VALUES
(35, '93651', 1, 'box', 'Spice Chai', '', 'Yes', 5, '0', '2017-07-29', 'pending', ''),
(42, '4732101014', 101014, 'box', 'English Breakfast', '', 'Yes', 12, '0', '2017-07-29', 'pending', ''),
(43, '4732101014', 101014, 'box', 'Spice Chai', '', 'Yes', 12, '0', '2017-07-29', 'pending', ''),
(44, '4732101014', 101014, 'box', 'Peppermint Herbal*', '', 'No', 12, '0', '2017-07-29', 'pending', ''),
(45, '4732101014', 101014, 'tin', 'Spice Chai', '', 'Yes', 523, '0', '2017-07-29', 'pending', ''),
(46, '4732101014', 101014, 'tin', 'Darjeeling Green', '', 'Yes', 205, '0', '2017-07-29', 'pending', ''),
(47, '4732101014', 101014, 'tin', 'Chamomile Herbal*', '', 'No', 523, '0', '2017-07-29', 'pending', ''),
(48, '43111', 1, 'box', 'Earl Grey', '', 'Yes', 1, '0', '2017-07-29', 'pending', ''),
(49, '43111', 1, 'box', 'Peppermint Herbal*', '', 'No', 50, '0', '2017-07-29', 'pending', ''),
(50, '43111', 1, 'tin', 'Spice Chai', '', 'Yes', 2, '0', '2017-07-29', 'pending', ''),
(51, '43111', 1, 'tin', 'Lemongrass & Ginger*', '', 'No', 5, '0', '2017-07-29', 'pending', ''),
(52, '2949101014', 101014, 'box', 'Earl Grey', '', 'Yes', 1, '0', '2017-07-29', 'pending', ''),
(53, '2949101014', 101014, 'box', 'Peppermint Herbal*', '', 'No', 50, '0', '2017-07-29', 'pending', ''),
(54, '2949101014', 101014, 'tin', 'Spice Chai', '', 'Yes', 2, '0', '2017-07-29', 'pending', ''),
(55, '2949101014', 101014, 'tin', 'Lemongrass & Ginger*', '', 'No', 5, '0', '2017-07-29', 'pending', ''),
(56, '1010144957', 101014, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 1, '0', '2017-07-29', 'pending', ''),
(57, '1010143807', 101014, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 1, '0', '2017-07-29', 'pending', ''),
(58, '1010144259', 101014, 'Accessories & Teaware', 'Ceramic Teapot with steel infuser and lid (1 cup or 2 cup sizes available)', '', 'Yes', 11, '0', '2017-07-29', 'pending', ''),
(59, '1010122655', 101012, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 1, '0', '2017-07-29', 'pending', ''),
(60, '1010122655', 101012, 'Accessories & Teaware', 'Stainless Steel Teapot with steel infuser and lid (1 cup or 2 cup sizes available)', '', 'Yes', 2, '0', '2017-07-29', 'pending', ''),
(61, '1010125661', 101012, '20 Pyramid Tea Bags Box', 'Darjeeling Second Flush', '', 'Yes', 5, '0', '2017-07-31', 'pending', ''),
(62, '1010125661', 101012, '20 Pyramid Tea Bags Tin', 'Lemongrass & Ginger*', '', 'No', 6, '0', '2017-07-31', 'pending', ''),
(63, '1010125661', 101012, 'Accessories & Teaware', 'Teaspoon (stainless steel)', '', 'Yes', 7, '0', '2017-07-31', 'pending', ''),
(64, '1010122220', 101012, '100 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 56, '0', '2017-07-31', 'pending', ''),
(65, '1010122220', 101012, '100 Enveloped Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 12, '0', '2017-07-31', 'pending', ''),
(66, '1010122220', 101012, '1 Kg Loose Leaf Resealable Pouch', 'Irish Breakfast', '', 'Yes', 410, '0', '2017-07-31', 'pending', ''),
(67, '1010122220', 101012, 'Tea Tray Set (comes in sets of 2)', 'Teapot (1 cup or 2 cup) + Milk Jug + Wooden Tray + Ceramic Cup + Ceramic Tea Bag Dish', '', 'Yes', 14, '0', '2017-07-31', 'pending', ''),
(68, '1010122220', 101012, 'Other Accessories', 'Wooden Tea Chest 4 compartment', '', 'Yes', 55, '0', '2017-07-31', 'pending', ''),
(69, '1010125060', 101012, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 111, '0', '2017-07-31', 'pending', ''),
(70, '1010125060', 101012, '20 Pyramid Tea Bags Box', 'Earl Grey', '', 'Yes', 2, '0', '2017-07-31', 'pending', ''),
(71, '1010125060', 101012, '20 Pyramid Tea Bags Box', 'Spice Chai', '', 'Yes', 2, '0', '2017-07-31', 'pending', ''),
(72, '1010125060', 101012, '20 Pyramid Tea Bags Box', 'Darjeeling Green', '', 'Yes', 2, '0', '2017-07-31', 'pending', ''),
(73, '1010125060', 101012, '20 Pyramid Tea Bags Box', 'Darjeeling Second Flush', '', 'Yes', 2, '0', '2017-07-31', 'pending', ''),
(74, '1010137275', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-01', 'pending', ''),
(75, '1010137275', 101013, '20 Pyramid Tea Bags Tin', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-01', 'pending', ''),
(76, '1010137275', 101013, '125g Loose Leaf Tea Box', 'English Breakfast', '', 'Yes', 14, '0', '2017-08-01', 'pending', ''),
(77, '1010136330', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-01', 'pending', ''),
(78, '1010136330', 101013, '100 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-01', 'pending', ''),
(79, '1010138750', 101013, '20 Pyramid Tea Bags Box', 'Spice Chai', '', 'Yes', 55, '0', '2017-08-01', 'pending', ''),
(80, '1010138750', 101013, '20 Pyramid Tea Bags Tin', 'Darjeeling Green', '', 'Yes', 88, '0', '2017-08-01', 'pending', ''),
(81, '1010138750', 101013, 'Other Accessories', 'Display/Storage Tins (free)', '', 'Yes', 88, '0', '2017-08-01', 'pending', ''),
(82, '1010134592', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 7, '0', '2017-08-01', 'pending', ''),
(83, '1010134592', 101013, 'Wooden Tea Chests', '9 Compartment', '', 'Yes', 14, '0', '2017-08-01', 'pending', ''),
(84, '1010134592', 101013, '1 Kg Loose Leaf Resealable Pouch', 'Lemongrass & Ginger*', '', 'No', 8, '0', '2017-08-01', 'pending', ''),
(85, '1010134592', 101013, 'Tea Tray Set (comes in sets of 2)', 'Teapot (1 cup or 2 cup) + Milk Jug + Wooden Tray + Ceramic Cup + Ceramic Tea Bag Dish', '', 'Yes', 8, '0', '2017-08-01', 'pending', ''),
(86, '1010134592', 101013, 'Other Accessories', 'Display/Storage Tins (free)', '', 'Yes', 9, '0', '2017-08-01', 'pending', ''),
(87, '1010137534', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 23, '0', '2017-08-01', 'pending', ''),
(88, '1010137534', 101013, '20 Pyramid Tea Bags Box', 'Darjeeling Green', '', 'Yes', 2, '0', '2017-08-01', 'pending', ''),
(89, '1010137534', 101013, '20 Pyramid Tea Bags Tin', 'English Breakfast', '', 'Yes', 4, '0', '2017-08-01', 'pending', ''),
(90, '1010137534', 101013, '20 Pyramid Tea Bags Tin', 'Darjeeling Green', '', 'Yes', 4, '0', '2017-08-01', 'pending', ''),
(91, '1010137534', 101013, '100 Pyramid Tea Bags Box', 'Lemongrass & Ginger*', '', 'No', 5, '0', '2017-08-01', 'pending', ''),
(92, '1010137534', 101013, '100 Enveloped Pyramid Tea Bags Box', 'Peppermint Herbal*', '', 'No', 8, '0', '2017-08-01', 'pending', ''),
(93, '1010131372', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 1, '0', '2017-08-01', 'pending', ''),
(94, '1010131372', 101013, 'Accessories & Teaware', 'Stainless Steel Teapot with steel infuser and lid (1 cup or 2 cup sizes available)', '', 'Yes', 2, '0', '2017-08-01', 'pending', ''),
(95, '1010138484', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 10, '0', '2017-08-01', 'pending', ''),
(96, '1010138484', 101013, '20 Pyramid Tea Bags Box', 'Spice Chai', '', 'Yes', 11, '0', '2017-08-01', 'pending', ''),
(97, '1010138484', 101013, '20 Pyramid Tea Bags Tin', 'Peppermint Herbal*', '', 'No', 12, '0', '2017-08-01', 'pending', ''),
(98, '1010138484', 101013, '20 Pyramid Tea Bags Tin', 'Lemongrass & Ginger*', '', 'No', 13, '0', '2017-08-01', 'pending', ''),
(99, '1010138484', 101013, '125g Loose Leaf Tea Box', 'English Breakfast', '', 'Yes', 14, '0', '2017-08-01', 'pending', ''),
(100, '1010138484', 101013, '125g Loose Leaf Tea Box', 'Spice Chai', '', 'Yes', 15, '0', '2017-08-01', 'pending', ''),
(101, '1010138484', 101013, '100 Pyramid Tea Bags Box', 'Darjeeling Second Flush', '', 'Yes', 2, '0', '2017-08-01', 'pending', ''),
(102, '1010138484', 101013, '100 Enveloped Pyramid Tea Bags Box', 'Darjeeling Green', '', 'Yes', 1, '0', '2017-08-01', 'pending', ''),
(103, '1010138484', 101013, '100 Enveloped Pyramid Tea Bags Box', 'Peppermint Herbal*', '', 'No', 5, '0', '2017-08-01', 'pending', ''),
(104, '1010138484', 101013, '1 Kg Loose Leaf Resealable Pouch', 'Chamomile Herbal*', '', 'No', 9, '0', '2017-08-01', 'pending', ''),
(105, '1010137947', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 10, '0', '2017-08-01', 'pending', ''),
(106, '1010137947', 101013, '20 Pyramid Tea Bags Box', 'Darjeeling Green', '', 'Yes', 10, '0', '2017-08-01', 'pending', ''),
(107, '1010137947', 101013, '20 Pyramid Tea Bags Tin', 'Earl Grey', '', 'Yes', 12, '0', '2017-08-01', 'pending', ''),
(108, '1010137947', 101013, '20 Pyramid Tea Bags Tin', 'Chamomile Herbal*', '', 'No', 13, '0', '2017-08-01', 'pending', ''),
(109, '1010137947', 101013, '125g Loose Leaf Tea Box', 'Darjeeling Second Flush', '', 'Yes', 14, '0', '2017-08-01', 'pending', ''),
(110, '1010137947', 101013, '100 Pyramid Tea Bags Box', 'Spice Chai', '', 'Yes', 15, '0', '2017-08-01', 'pending', ''),
(111, '1010137947', 101013, '100 Enveloped Pyramid Tea Bags Box', 'Spice Chai', '', 'Yes', 56, '0', '2017-08-01', 'pending', ''),
(112, '1010137947', 101013, '100 Enveloped Pyramid Tea Bags Box', 'Irish Breakfast', '', 'Yes', 58, '0', '2017-08-01', 'pending', ''),
(113, '1010137947', 101013, '1 Kg Loose Leaf Resealable Pouch', 'Masala Chai', '', 'Yes', 1, '0', '2017-08-01', 'pending', ''),
(114, '1010137947', 101013, '1 Kg Loose Leaf Resealable Pouch', 'Darjeeling Second Flush', '', 'Yes', 2, '0', '2017-08-01', 'pending', ''),
(115, '1010137947', 101013, '1 Kg Loose Leaf Resealable Pouch', 'Lemongrass & Ginger*', '', 'No', 3, '0', '2017-08-01', 'pending', ''),
(116, '11329', 1, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-01', 'pending', ''),
(117, '11329', 1, '20 Pyramid Tea Bags Tin', 'Darjeeling Green', '', 'Yes', 33, '0', '2017-08-01', 'pending', ''),
(118, '11329', 1, '125g Loose Leaf Tea Box', 'Lemongrass & Ginger*', '', 'No', 44, '0', '2017-08-01', 'pending', ''),
(119, '1010137440', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 14, '0', '2017-08-01', 'pending', ''),
(120, '1010137440', 101013, '20 Pyramid Tea Bags Box', 'Darjeeling Green', '', 'Yes', 141, '0', '2017-08-01', 'pending', ''),
(121, '1010137440', 101013, '125g Loose Leaf Tea Tin', 'Darjeeling Second Flush', '', 'Yes', 41, '0', '2017-08-01', 'pending', ''),
(122, '1010137440', 101013, '125g Loose Leaf Tea Tin', 'Chamomile Herbal*', '', 'No', 14, '0', '2017-08-01', 'pending', ''),
(123, '1010134775', 101013, '20 Pyramid Tea Bags Tin', 'Peppermint Herbal*', '', 'No', 22, '0', '2017-08-01', 'pending', ''),
(124, '1010134775', 101013, '100 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 11, '0', '2017-08-01', 'pending', ''),
(125, '15666', 1, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 1, '0', '2017-08-21', 'pending', ''),
(126, '15666', 1, '20 Pyramid Tea Bags Tin', 'English Breakfast', '', 'Yes', 2, '0', '2017-08-21', 'pending', ''),
(127, '15666', 1, 'Accessories & Teaware', 'Stainless Steel Teapot with steel infuser and lid (1 cup or 2 cup sizes available)', '', 'Yes', 3, '0', '2017-08-21', 'pending', ''),
(128, '14905', 1, '125g Loose Leaf Tea Box', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-21', 'pending', ''),
(129, '14905', 1, '125g Loose Leaf Tea Tin', 'English Breakfast', '', 'Yes', 12, '0', '2017-08-21', 'pending', ''),
(130, '1010138383', 101013, '20 Pyramid Tea Bags Box', 'English Breakfast', '', 'Yes', 5, '0', '2017-08-21', 'pending', ''),
(131, '1010138383', 101013, '20 Pyramid Tea Bags Tin', 'Darjeeling Second Flush', '', 'Yes', 6, '0', '2017-08-21', 'pending', ''),
(132, '1010138383', 101013, '20 Pyramid Tea Bags Tin', 'Peppermint Herbal*', '', 'No', 6, '0', '2017-08-21', 'pending', ''),
(133, '1010138383', 101013, '125g Loose Leaf Tea Box', 'English Breakfast', '', 'Yes', 1, '0', '2017-08-21', 'pending', ''),
(134, '1010138383', 101013, '125g Loose Leaf Tea Tin', 'English Breakfast', '', 'Yes', 4, '0', '2017-08-21', 'pending', ''),
(135, '1010138383', 101013, '125g Loose Leaf Tea Tin', 'Spice Chai', '', 'Yes', 6, '0', '2017-08-21', 'pending', ''),
(136, '1010138383', 101013, 'Variety Pack (Enveloped Pyramid Tea Bags)', '50 Black Tea Varieties', '', 'Yes', 6, '0', '2017-08-21', 'pending', ''),
(137, '1010138383', 101013, 'Wooden Tea Chests', '12 Compartment', '', 'Yes', 4, '0', '2017-08-21', 'pending', ''),
(138, '1010138383', 101013, 'Accessories & Teaware', 'Tea Tongs (stainless steel)', '', 'Yes', 5, '0', '2017-08-21', 'pending', ''),
(139, '14416', 1, '20 Pyramid Tea Bags Box', 'Chamomile Herbal', 'CH20PTBB', '12', 5, '4', '2017-08-22', 'pending', ''),
(140, '14416', 1, '20 Pyramid Tea Bags Box', 'Earl Grey', 'EG20PTBB', '12', 3, '2', '2017-08-22', 'pending', ''),
(141, '14416', 1, '20 Pyramid Tea Bags Box', 'Spice Chai', 'SC20PTBB', '12', 6, '7', '2017-08-22', 'pending', ''),
(142, '14405', 1, '20 Pyramid Tea Bags Box', 'Chamomile Herbal', 'CH20PTBB', '12', 1, '1', '2017-08-22', 'pending', ''),
(143, '14405', 1, '20 Pyramid Tea Bags Box', 'Earl Grey', 'EG20PTBB', '12', 1, '1', '2017-08-22', 'pending', ''),
(144, '14405', 1, '20 Pyramid Tea Bags Box', 'Spice Chai', 'SC20PTBB', '12', 1, '1', '2017-08-22', 'pending', ''),
(145, '14405', 1, '125g Loose Leaf Box', 'Chamomile Herbal (50g)', 'CH50GB', '12', 2, '2', '2017-08-22', 'pending', ''),
(146, '14405', 1, '125g Loose Leaf Box', 'Earl Grey', 'EG125GB', '12', 2, '2', '2017-08-22', 'pending', ''),
(147, '14405', 1, '125g Loose Leaf Box', 'Spice Chai', 'SC125GB', '12', 2, '2', '2017-08-22', 'pending', ''),
(148, '11237', 1, '20 Pyramid Tea Bags Box', 'Chamomile Herbal', 'CH20PTBB', '12', 1, '0', '2017-08-22', 'pending', ''),
(149, '11237', 1, '20 Pyramid Tea Bags Box', 'Darjeeling Green', 'DG20PTBB', '12', 1, '0', '2017-08-22', 'pending', ''),
(150, '11237', 1, '20 Pyramid Tea Bags Box', 'Darjeeling Second Flush', 'DSF20PTBB', '12', 0, '1', '2017-08-22', 'pending', ''),
(151, '11237', 1, '20 Pyramid Tea Bags Box', 'Earl Grey', 'EG20PTBB', '12', 0, '1', '2017-08-22', 'pending', ''),
(152, '11237', 1, '20 Pyramid Tea Bags Box', 'English Breakfast', 'EB20PTBB', '12', 1, '0', '2017-08-22', 'pending', ''),
(153, '11237', 1, '20 Pyramid Tea Bags Box', 'Lemongrass & Ginger', 'LGG20PTBB', '12', 1, '0', '2017-08-22', 'pending', ''),
(154, '11237', 1, '20 Pyramid Tea Bags Box', 'Peppermint Herbal', 'PH20PTBB', '12', 0, '1', '2017-08-22', 'pending', ''),
(155, '11237', 1, '20 Pyramid Tea Bags Box', 'Spice Chai', 'SC20PTBB', '12', 0, '1', '2017-08-22', 'pending', ''),
(156, '11237', 1, '125g Loose Leaf Box', 'Chamomile Herbal (50g)', 'CH50GB', '12', 2, '0', '2017-08-22', 'pending', ''),
(157, '11237', 1, '125g Loose Leaf Box', 'Darjeeling Green', 'DG125GB', '12', 2, '0', '2017-08-22', 'pending', ''),
(158, '11237', 1, '125g Loose Leaf Box', 'Darjeeling Second Flush', 'DSF125GB', '12', 0, '2', '2017-08-22', 'pending', ''),
(159, '11237', 1, '125g Loose Leaf Box', 'Earl Grey', 'EG125GB', '12', 0, '2', '2017-08-22', 'pending', ''),
(160, '11237', 1, '125g Loose Leaf Box', 'English Breakfast', 'EB125GB', '12', 2, '0', '2017-08-22', 'pending', ''),
(161, '11237', 1, '125g Loose Leaf Box', 'Lemongrass & Ginger (65g)', 'LGG65GB', '12', 2, '0', '2017-08-22', 'pending', ''),
(162, '11237', 1, '125g Loose Leaf Box', 'Peppermint Herbal (65g)', 'PH65GB', '12', 0, '2', '2017-08-22', 'pending', ''),
(163, '11237', 1, '125g Loose Leaf Box', 'Spice Chai', 'SC125GB', '12', 0, '2', '2017-08-22', 'pending', ''),
(164, '11237', 1, '125g Loose Leaf Tin', 'Chamomile Herbal (50g)', 'CH50GT', '10', 3, '0', '2017-08-22', 'pending', ''),
(165, '11237', 1, '125g Loose Leaf Tin', 'Darjeeling First Flush', 'DFF125GT', '10', 3, '0', '2017-08-22', 'pending', ''),
(166, '11237', 1, '125g Loose Leaf Tin', 'Darjeeling Green', 'DG125GT', '10', 0, '3', '2017-08-22', 'pending', ''),
(167, '11237', 1, '125g Loose Leaf Tin', 'Darjeeling Second Flush', 'DSF125GT', '10', 0, '3', '2017-08-22', 'pending', ''),
(168, '11237', 1, '125g Loose Leaf Tin', 'Earl Grey', 'EG125GT', '10', 3, '0', '2017-08-22', 'pending', ''),
(169, '11237', 1, '125g Loose Leaf Tin', 'English Breakfast', 'EB125GT', '10', 3, '0', '2017-08-22', 'pending', ''),
(170, '11237', 1, '125g Loose Leaf Tin', 'Irish Breakfast', 'IB125GT', '10', 0, '3', '2017-08-22', 'pending', ''),
(171, '11237', 1, '125g Loose Leaf Tin', 'Lemongrass & Ginger (65g)', 'LGG65GT', '10', 0, '3', '2017-08-22', 'pending', ''),
(172, '11237', 1, 'Variety Pack (Enveloped Pyramid Tea Bags)', '7 Variety Pack(7 tea bags)', '7EPTBVSB', '24', 4, '0', '2017-08-22', 'pending', ''),
(173, '11237', 1, 'Variety Pack (Enveloped Pyramid Tea Bags)', '50 Black Tea Varieties', 'BV50EPTBCB', '6', 0, '4', '2017-08-22', 'pending', ''),
(174, '11237', 1, 'Variety Pack (Enveloped Pyramid Tea Bags)', '50 Herbal Green Varieties', 'HGV50EPTBCB', '6', 4, '0', '2017-08-22', 'pending', ''),
(175, '11237', 1, 'Teapots Ceramic', '1 Cup with Logo', 'TPWC1CL', '1', 5, '0', '2017-08-22', 'pending', ''),
(176, '11237', 1, 'Teapots Ceramic', '1 Cup Plain', 'TPWC1CP', '1', 5, '0', '2017-08-22', 'pending', ''),
(177, '11237', 1, 'Wooden Tea Chests', '8 Compartment', 'WTC8', '1', 6, '0', '2017-08-22', 'pending', ''),
(178, '11237', 1, 'Teapots Stainless Steel', '2 Cup with Logo', 'TPSS2CL', '1', 7, '0', '2017-08-22', 'pending', ''),
(179, '11237', 1, 'Other', 'Teaspoon Stainless Steel', 'TSSSL', '1', 8, '0', '2017-08-22', 'pending', ''),
(180, '11237', 1, 'Other', 'Tea tongs Stainless Steel', 'TBSSSL', '1', 8, '0', '2017-08-22', 'pending', ''),
(181, '11237', 1, 'Other', 'Promotional Brochure', 'PROMO_BRO', '1', 8, '0', '2017-08-22', 'pending', ''),
(182, '17756', 1, 'Teapots Ceramic', '1 Cup with Logo', 'TPWC1CL', '1', 1, 'N/A', '2017-08-22', 'pending', ''),
(183, '17756', 1, 'Teapots Ceramic', '1 Cup Plain', 'TPWC1CP', '1', 1, 'N/A', '2017-08-22', 'pending', ''),
(184, '17756', 1, 'Wooden Tea Chests', '8 Compartment', 'WTC8', '1', 2, 'N/A', '2017-08-22', 'pending', ''),
(185, '17756', 1, 'Teapots Stainless Steel', '2 Cup with Logo', 'TPSS2CL', '1', 3, 'N/A', '2017-08-22', 'pending', ''),
(186, '17756', 1, 'Other', 'Tea tongs Stainless Steel', 'TBSSSL', '1', 4, 'N/A', '2017-08-22', 'pending', ''),
(187, '14540', 1, 'Tea Tray Set Replacement Accessories', 'Teabag Dish White Ceramic', 'TBDWC', '1', 1, 'N/A', '2017-08-23', 'pending', ''),
(188, '14540', 1, 'Tea Tray Set Replacement Accessories', 'Teacup White Ceramic', 'TCWCL', '1', 1, 'N/A', '2017-08-23', 'pending', ''),
(189, '14540', 1, 'Tea Tray Set Replacement Accessories', 'Wooden Tray', 'WTRAY', '1', 1, 'N/A', '2017-08-23', 'pending', ''),
(190, '15811', 1, '25 Tea Bags Box', 'Black Tea', 'Z_BT25TBB', '18', 1, '', '2017-08-28', 'pending', ''),
(191, '15811', 1, '25 Tea Bags Box', 'Chai Tea', 'Z_BT25TBB', '18', 1, '1', '2017-08-28', 'pending', ''),
(192, '15811', 1, '25 Tea Bags Box', 'Chamomile', 'Z_CH25TBB', '18', 0, '1', '2017-08-28', 'pending', ''),
(193, '15811', 1, '100 Pyramid Tea Bags Box', 'Black Tea', 'Z_BT100TBB', '6', 2, '', '2017-08-28', 'pending', ''),
(194, '15811', 1, '100 Pyramid Tea Bags Box', 'English Breakfast', 'Z_EB100TBB', '6', 0, '2', '2017-08-28', 'pending', ''),
(195, '15811', 1, '100 Pyramid Tea Bags Box', 'Chai Tea', 'Z_CT100TBB', '6', 2, '2', '2017-08-28', 'pending', ''),
(196, '15811', 1, 'Other', 'Shelf Talkers/Wobbler', 'PROMO_WOBBLER', '0', 3, 'N/A', '2017-08-28', 'pending', ''),
(197, '16524', 1, '20 Pyramid Tea Bags Box', 'Chamomile Herbal', 'CH20PTBB', '12', 1, '', '2017-08-28', 'pending', ''),
(198, '16524', 1, '20 Pyramid Tea Bags Box', 'Darjeeling Second Flush', 'DSF20PTBB', '12', 0, '1', '2017-08-28', 'pending', ''),
(199, '16524', 1, '1 Kg Loose Leaf Resealable Pouch', 'Darjeeling Green', 'DG1KGRP', '4', 2, '2', '2017-08-28', 'pending', ''),
(200, '14960', 1, 'Other', 'Shelf Talkers/Wobbler', 'PROMO_WOBBLER', '0', 1, 'N/A', '2017-08-28', 'pending', ''),
(201, '14960', 1, 'Other', 'Promotional Brochure', 'PROMO_BRO', '0', 2, 'N/A', '2017-08-28', 'pending', ''),
(202, '15106', 1, 'Display Tin', 'Black Tea', 'Z_TINDISPBT', '6', 1, '', '2017-08-28', 'pending', ''),
(203, '15106', 1, 'Display Tin', 'Chai Tea', 'Z_TINDISPCT', '6', 1, '', '2017-08-28', 'pending', ''),
(204, '15106', 1, 'Other', '8 Compartment', 'Z_TINDISPBT', '1', 1, 'N/A', '2017-08-28', 'pending', ''),
(205, '15106', 1, 'Other', 'Promotional Brochure', 'Z_TINDISPCT', '0', 1, 'N/A', '2017-08-28', 'pending', ''),
(206, '14019', 1, 'Other', '8 Compartment', 'Z_WTC8', '1', 9, 'N/A', '2017-08-28', 'pending', ''),
(207, '14019', 1, 'Other', 'Promotional Brochure', 'PROMO_BRO', '0', 9, 'N/A', '2017-08-28', 'pending', ''),
(208, '13345', 1, '20 Pyramid Tea Bags Box', 'Darjeeling Green', 'DG20PTBB', '12', 1, '', '2017-08-31', 'pending', ''),
(209, '13345', 1, '1 Kg Loose Leaf Resealable Pouch', 'Assam Leaf', 'AL1KGRP', '4', 2, '', '2017-08-31', 'pending', ''),
(210, '13345', 1, '25 Tea Bags Box', 'Black Tea', 'Z_BT25TBB', '18', 0, '5', '2017-08-31', 'pending', ''),
(211, '13345', 1, '100 Tea Bags Box', 'Black Tea', 'Z_BT100TBB', '6', 0, '6', '2017-08-31', 'pending', ''),
(212, '19039', 1, 'Other', 'Promotional Brochure', 'PROMO_BRO', '1', 1, 'N/A', '2017-08-31', 'pending', ''),
(213, '19039', 1, 'Tea Tray Set Replacement Accessories', 'Wooden Tray', 'WTRAY', '1', 2, 'N/A', '2017-08-31', 'pending', ''),
(214, '19039', 1, 'Other', 'Promotional Brochure', 'PROMO_BRO', '0', 3, 'N/A', '2017-08-31', 'pending', ''),
(215, '19039', 1, 'Other', 'Promotional Brochure', 'PROMO_BRO', '0', 4, 'N/A', '2017-08-31', 'pending', ''),
(216, '18009', 1, 'Other(Serenitea Retail)', 'Teaspoon Stainless Steel', 'TSSSL', '1', 1, 'N/A', '2017-08-31', 'pending', 'serenitea'),
(217, '18009', 1, 'Other(Serenitea Retail)', 'Tea tongs Stainless Steel', 'TBSSSL', '1', 1, 'N/A', '2017-08-31', 'pending', 'serenitea'),
(218, '18009', 1, 'Other Accessories', 'Wooden Tea Stand 4 Comp', 'WSTAND4', '1', 1, 'N/A', '2017-08-31', 'pending', 'serenitea'),
(219, '18009', 1, 'Other(Zoetic Retail)', 'Shelf Talkers/Wobbler', 'PROMO_WOBBLER', '0', 3, 'N/A', '2017-08-31', 'pending', 'zoetic'),
(220, '18009', 1, 'Other(Zoetic Retail)', 'Promotional Brochure', 'PROMO_BRO', '0', 3, 'N/A', '2017-08-31', 'pending', 'zoetic'),
(221, '18009', 1, 'Other(Zoetic Food Service)', '8 Compartment', 'Z_WTC8', '1', 4, 'N/A', '2017-08-31', 'pending', 'zoetic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_order`
--
ALTER TABLE `my_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_order`
--
ALTER TABLE `my_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
