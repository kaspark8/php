-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 09:30 PM
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
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(25) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `page_content` text COLLATE utf8_bin NOT NULL,
  `page_created` bigint(50) DEFAULT NULL,
  `page_modified` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_content`, `page_created`, `page_modified`) VALUES
(5, 'Ut faucibus nibh sem', 'Ut faucibus nibh sem, ullamcorper feugiat lectus posuere ac. Nulla facilisi. Maecenas augue sem, aliquet vel egestas ac, vulputate quis eros. Praesent rutrum dolor quis nibh pharetra, nec ultrices sem suscipit. Phasellus egestas euismod magna non efficitur. Nam eget dictum nulla, vel placerat nisl. Suspendisse consequat dui vehicula tristique cursus. Proin turpis lacus, elementum sed placerat ut, blandit a enim.\r\n\r\n', 1525523440, 1525525979),
(6, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat nec ligula vel ultricies. Phasellus nisl arcu, suscipit tincidunt lacus et, feugiat venenatis tortor. Fusce et enim ut nulla efficitur ullamcorper nec et ante. Pellentesque et turpis in lectus volutpat commodo ut et massa. Cras sed ipsum eu elit euismod posuere in eu sem. Nulla ac fringilla velit. Nullam hendrerit volutpat ultrices. Cras sollicitudin erat ac ipsum sagittis volutpat. Maecenas maximus pellentesque neque, vitae euismod sapien bibendum non. Nunc consectetur turpis vitae ipsum pharetra, et ornare lectus molestie. Donec ac nunc ut justo maximus viverra. Donec ac pretium dolor. Fusce pharetra erat vestibulum, faucibus massa non, ultrices nisi. Integer bibendum efficitur laoreet.', 1525524087, 1525524087),
(7, 'Proin dictum', 'Proin dictum, nibh sed molestie auctor, neque ex vehicula tellus, ut suscipit est massa ac ipsum. Sed vel tempor elit, a fermentum nisl. Aliquam volutpat vitae ante at tincidunt. Vivamus non pulvinar tellus. Nunc et sagittis tortor. Vestibulum nec diam sit amet orci cursus aliquam ut et neque. Sed eu magna quis lacus auctor pharetra. Donec mattis pellentesque elit eget varius. Praesent nec ante et ex dictum rhoncus ac nec erat. Nulla ac mi volutpat, efficitur leo non, vulputate risus.', 1525524097, 1525524097),
(8, 'Nullam nec', 'Nullam nec posuere lectus. Etiam vehicula, sapien eu eleifend sodales, mauris leo iaculis turpis, in consectetur ipsum diam ac eros. Nunc augue urna, maximus ac porttitor at, sollicitudin ac ligula. Phasellus semper leo a ipsum pretium ornare. Nulla in placerat velit. Nulla at facilisis ipsum. Phasellus risus nulla, luctus vitae felis in, suscipit venenatis erat. Maecenas risus eros, suscipit sodales congue quis, malesuada at sapien.', 1525524106, 1525524106),
(9, 'Test', 'Test', 1525548004, 1525548004);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(25) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `product_price` varchar(255) COLLATE utf8_bin NOT NULL,
  `product_owner_id` int(255) NOT NULL,
  `product_created` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_owner_id`, `product_created`) VALUES
(2, 'Prod2', '222', 2, 1525547207),
(3, 'Toode 1', '12', 5, 1525547985),
(4, 'Toode 2', '22', 2, 1525547996);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '1',
  `user_created` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_type`, `user_created`) VALUES
(2, 'kaspar', 'email@email.ee', '123', 1, 1525536752),
(3, 'juhan', 'smuul@teele.ee', 'Smuyul', 2, 1525542031),
(5, 'test', 'test', 'test', 3, 1525547957),
(6, 'admin', 'admin', 'admin', 1, 1525548489),
(7, 'product', 'product', 'product', 1, 1525548496),
(8, 'pages', 'pages', 'pages', 1, 1525548503);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
