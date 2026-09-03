-- phpMyAdmin SQL Dump
-- version 5.2.1deb1+deb12u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2026 at 09:58 AM
-- Server version: 10.11.18-MariaDB-0+deb12u1
-- PHP Version: 8.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `fullname`, `email`, `status`, `created_at`) VALUES
(1, 'admin', '$2y$10$L6RKtEBYtDY9FGfbxNFQqeztKCXqrGBW3mhH.5/rEdqorpvkIGWEC', 'System Administrator', 'admin@example.com', 'Active', '2026-07-28 06:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `device_name` varchar(150) NOT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `processor` varchar(100) DEFAULT NULL,
  `processor_full_name` varchar(255) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `storage` varchar(100) DEFAULT NULL,
  `monitor` varchar(100) DEFAULT NULL,
  `operating_system` varchar(100) DEFAULT NULL,
  `license_status` varchar(100) DEFAULT NULL,
  `mac_address` varchar(100) DEFAULT NULL,
  `assigned_user` varchar(100) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `internet_location` varchar(100) DEFAULT NULL,
  `sections` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `warranty_information` varchar(255) DEFAULT NULL,
  `year_of_manufacture` year(4) DEFAULT NULL,
  `expired_year` year(4) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `registered_by` varchar(100) DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  `checked_by` varchar(100) DEFAULT NULL,
  `checked_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `device_name`, `serial_number`, `type`, `manufacturer`, `model`, `processor`, `processor_full_name`, `ram`, `storage`, `monitor`, `operating_system`, `license_status`, `mac_address`, `assigned_user`, `owner`, `internet_location`, `sections`, `location`, `warranty_information`, `year_of_manufacture`, `expired_year`, `expired_date`, `notes`, `photo`, `registered_by`, `registered_date`, `checked_by`, `checked_date`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'SN-20260002', 'Laptop', 'Lenovo', 'ThinkPad E14', 'Intel Core i5', 'Intel Core i5-1235U', '8 GB', '256 GB SSD', '14-inch', 'Windows 11 Pro', 'Activated', 'AA:BB:CC:DD:EE:FF', 'Jane Smith', 'Finance', 'Wi-Fi', 'Finance', 'Windows 11 Pro', '2 Years', '2024', '2027', '2027-06-30', 'Assigned to Finance Manager', 'laptop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 06:56:09', '2026-07-31 07:37:35'),
(2, 'Laptop', 'SN-20260002', 'Dell', 'Laptop', 'Dell E14', 'Intel Core i5', 'Intel Core i5-1235U', '8 GB', '256 GB SSD', '14-inch', 'Windows 11 Pro', 'Activated', 'AA:BB:CC:DD:EE:FF', 'Jane Smith', 'Finance', 'Wi-Fi', 'Finance', 'Room 305', '2 Years', '2024', '2027', '2027-06-30', 'Assigned to Finance Manager', 'laptop01.jpg', 'Admin', '2026-07-31', 'IT admint', '2026-07-31', '2026-07-31 06:57:03', '2026-07-31 06:57:03'),
(3, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:28', '2026-07-31 07:21:28'),
(4, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(5, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(6, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(7, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(8, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(9, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(10, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Windows 11 Pro', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:36:01'),
(11, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:54', '2026-07-31 07:21:54'),
(12, 'Desktop Computer', 'SN-20260001', 'Desktop', 'Apple', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Windows 11 Pro', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:54', '2026-07-31 09:35:57'),
(13, 'Acer', 'SN-202600013', 'Desktop', 'acer', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Windows 11 Pro', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:54', '2026-07-31 09:34:53'),
(14, 'Laptop', 'SN-20260002', NULL, 'Lenovo', 'Jane Smith', NULL, NULL, NULL, NULL, NULL, 'Room', NULL, NULL, NULL, NULL, NULL, NULL, 'IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-31 09:52:50', '2026-07-31 09:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('Admin','Manager','Staff') NOT NULL DEFAULT 'Staff',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$L6RKtEBYtDY9FGfbxNFQqeztKCXqrGBW3mhH.5/rEdqorpvkIGWEC', 'System Administrator', 'admin@example.com', NULL, 'Admin', 'Active', '2026-07-29 02:12:09', '2026-07-29 08:05:40'),
(2, 'manager', '$2y$10$89kcH4L2hwStrFQgBWC5lOhAWAyURqvfYBLsB97ENWxCL.Nrvt87G', 'John Manager', 'manager@example.com', NULL, 'Admin', 'Active', '2026-07-29 02:12:09', '2026-07-29 08:30:13'),
(3, 'staff', '$2y$10$89kcH4L2hwStrFQgBWC5lOhAWAyURqvfYBLsB97ENWxCL.Nrvt87G', 'David Staff', 'staff@example.com', NULL, 'Staff', 'Active', '2026-07-29 02:12:09', '2026-07-29 08:04:39'),
(4, 'lay', '$2y$10$KgmXg/dBaLKsF/rJaYsytORygrWi5w8ZsuuMwn9W24Xw.ILJR5uM.', 'vuth lay', 'vuthlay003@gmail.com', NULL, 'Admin', 'Inactive', '2026-07-29 02:26:49', '2026-07-29 04:44:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
