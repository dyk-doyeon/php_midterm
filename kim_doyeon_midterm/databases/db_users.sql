-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 10, 2023 at 08:33 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  `role_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'Unregistered', 'They are unregistered user. If you want to edit your information, you have to register.'),
(2, 'Admin', 'You can feel free to edit your information.'),
(3, 'Guest', 'You are a guest.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `user_role` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lname`, `user_fname`, `user_username`, `user_password`, `user_photo`, `user_role`) VALUES
(1, 'Smith', 'Mary', 'm_smith', 'm_smith1', 'default.jpg', 1),
(2, 'Delgado', 'Bob', 'b_delgado', 'b_delgado2', 'default.jpg', 2),
(3, 'Strange', 'Emily', 'e_strange', 'e_strange3', 'default.jpg', 2),
(4, 'Murphy', 'Greg', 'g_murphy', 'g_murphy4', 'default.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `tbl_roles` (`role_id`);
COMMIT;

-- Structure for view `view_user_role`
--
DROP TABLE IF EXISTS `view_user_role`;

DROP VIEW IF EXISTS `view_user_role`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_role`  AS SELECT `tbl_users`.`user_id` AS `user_id`, `tbl_users`.`user_lastname` AS `user_lastname`, `tbl_users`.`user_firstname` AS `user_firstname`, `tbl_users`.`user_username` AS `user_username`, `tbl_users`.`user_photo` AS `user_photo`, `tbl_roles`.`role_name` AS `role_name`, `tbl_roles`.`role_desc` AS `role_desc` FROM (`tbl_users` join `tbl_roles` on((`tbl_users`.`role_id` = `tbl_roles`.`role_id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
