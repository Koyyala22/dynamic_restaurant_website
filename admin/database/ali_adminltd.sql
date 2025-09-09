-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 08:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ali_adminltd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE `tbl_logins` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `RANDOM_ID` varchar(20) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logins`
--

INSERT INTO `tbl_logins` (`ID`, `USERNAME`, `PASSWORD`, `RANDOM_ID`, `CREATED_AT`) VALUES
(1, 'veerababu@spondias.com', '$2y$10$mtqf8LwEpJZ15oZu8HJk6.ohEKQ8z04Uua/LpZY8YA327eAyEiI/O', 'FwOfKf7lT8br6VPZZCGB', '2025-08-28 06:16:42'),
(2, 'deepika@spondias.com', '$2y$10$wirOehSv/vf7BtkO5RKjF.1LMb5GCBNnkvYC7zC3JmpG96Cz7gtFu', 'xjhQH1bS71Ot7ut4m43c', '2025-08-28 06:17:14'),
(3, 'priya@spondias.com', '$2y$10$1pk5VFmXZ/GItasox9busuUrsC7AUMnqv86LsT.5OtRoxKfXN/M7a', 'Q1sRN09ZFb1qkl3OgI0E', '2025-08-28 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `RANDOM_ID` varchar(10) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`ID`, `TITLE`, `DESCRIPTION`, `IMAGE`, `RANDOM_ID`, `CREATED_AT`) VALUES
(1, 'IT CONSULTING', 'Delivering top-notch IT consulting, we guide businesses towards optimal technology strategies and solutions for sustainable growth and success. Our expert team ensures tailored advice and implementation, enhancing your IT landscape.', '../uploads/service/Up2vF7AeqcHPFlKJSUVaimageIT.png', 'Up2vF7Aeqc', '2024-09-11 05:33:21'),
(2, 'FINTECH', 'Empowering financial innovation, we specialize in providing cutting-edge fintech solutions to optimize and revolutionize your financial processes and services. Our expertise ensures a seamless integration of technology for enhanced financial experiences.', '../uploads/service/szyOGUJbRv2L4TbFSzZ7imageFINTECH.png', 'szyOGUJbRv', '2024-09-11 05:33:48'),
(3, 'TRANSPORT', 'Revolutionizing transportation, we offer comprehensive services to streamline logistics, optimize routes, and enhance overall efficiency. Our expertise ensures reliable and innovative solutions for your evolving mobility needs.', '../uploads/service/damV4Ozd6mLX6Q3U9XRzimageTRANSPORT.png', 'damV4Ozd6m', '2024-09-11 05:34:14'),
(4, 'LOGISTIC', 'Revolutionizing logistics solutions, our comprehensive services ensure streamlined supply chains for efficient transportation. Tailored offerings guarantee reliable delivery, adding value to optimized supply chain management.', '../uploads/service/hjB0yS5MdRbSRBvc0CBfimageLOGISTIC.png', 'hjB0yS5MdR', '2024-09-11 05:34:45'),
(5, 'HEALTH', 'Elevating health, we offer services for optimized well-being and tailored healthcare, ensuring optimal living experiences. Our expertise ensures reliable and innovative health solutions, prioritizing your well-being at every step.', '../uploads/service/BWtzQor6U7v1wnfZduAbimageHEALTH.png', 'BWtzQor6U7', '2024-09-11 05:35:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  ADD UNIQUE KEY `id` (`ID`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
