-- phpMyAdmin SQL Dump
-- version 5.2.1deb1+deb12u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2026 at 01:03 AM
-- Server version: 10.11.18-MariaDB-0+deb12u1
-- PHP Version: 8.2.33

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
(1, 'Laptop', 'PC-001', 'Desktop', 'acer', 'OptiPlex 3070 Tower', 'Intel Core i9', 'Intel Core i5-1235U', '8 GB', '256 GB SSD', '14-inch', 'Windows 10 Pro', 'Activated', 'AA:BB:CC:DD:EE:FF', 'Ly Sotheareak', 'Administrator', 'Wi-Fi', 'Administrator', 'Adminitrator', '2 Years', '2024', '2027', '2027-06-30', 'Assigned to Finance Manager', 'laptop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 06:56:09', '2026-08-04 11:41:42'),
(2, 'Laptop', 'PC-002', 'Laptop', 'MIS', 'OptiPlex 3020', 'Intel Core i3', 'Intel Core i5-1235U', '8 GB', '128 GB SSD', '22-inch', 'Windows 10 Pro', 'Activated', 'AA:BB:CC:DD:EE:FF', 'Suon Alen', 'Finance', 'Wi-Fi', 'Finance', 'Room 305', '2 Years', '2024', '2027', '2027-06-30', 'Assigned to Finance Manager', 'laptop01.jpg', 'Admin', '2026-07-31', 'IT admint', '2026-07-31', '2026-07-31 06:57:03', '2026-08-05 01:38:19'),
(3, 'Desktop Computer', 'PC-003', 'Desktop', 'Dell', 'OptiPlex 3070 Tower', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '8 GB', '512 GB SSD', 'Dell 22-inch', 'Windows 10 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'Administrator', 'IT Department', 'Office LAN', 'Consavation', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:28', '2026-08-03 08:08:54'),
(4, 'Desktop Computer', 'PC-004', 'Laptop', 'Dell', 'OptiPlex 3070 Tower', 'Intel Core i5', 'Intel Core i7-11700 @ 2.50GHz', '8 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 10 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'Administrator', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-08-03 08:11:27'),
(5, 'Desktop Computer', 'PC-005', 'Desktop', 'Asus', 'OptiPlex 3020', 'Intel Core i5', 'Intel Core i7-11700 @ 2.50GHz', '2 GB', '512 GB SSD', 'Dell 22-inch', 'Windows 8 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'Archive', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-08-03 08:16:58'),
(6, 'Desktop Computer', 'PC-006', 'Desktop', 'Dell', 'OptiPlex 3070 Tower', 'Intel Core i5', 'Intel Core i7-11700 @ 2.50GHz', '8 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'Somnang', 'IT Department', 'Office LAN', 'Exhibtion', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-08-03 08:20:11'),
(7, 'Desktop Computer', 'PC-007', 'Laptop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'Education', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(8, 'Desktop Computer', 'PC-008', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'IT', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(9, 'Desktop Computer', 'PC-009', 'Desktop', 'Dell', 'OptiPlex 7090', 'Intel Core i7', 'Intel Core i7-11700 @ 2.50GHz', '16 GB', '512 GB SSD', 'Dell 24-inch', 'Windows 11 Pro', 'Activated', '00:1A:2B:3C:4D:5E', 'John Doe', 'IT Department', 'Office LAN', 'Reading', 'Room 201', '3 Years', '2023', '2026', '2026-12-31', 'Working normally', 'desktop01.jpg', 'Admin', '2026-07-31', 'IT Support', '2026-07-31', '2026-07-31 07:21:46', '2026-07-31 07:21:46'),
(19, 'Desktop PC 02', 'PC-010', 'Desktop', 'HP', 'ProDesk 600 G6', 'Core i5', 'Intel Core i5-10500', '16GB', '512GB SSD', 'HP 24 Monitor', 'Windows 10 Pro', 'Licensed', '00:11:22:33:44:02', 'User 02', 'Organization', 'Internet', 'HR', 'Office 102', '1 Year', '2023', '2026', '2026-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(20, 'Laptop 01', 'SN-10003', 'Laptop', 'Lenovo', 'ThinkPad E14', 'Core i5', 'Intel Core i5-1135G7', '8GB', '512GB SSD', '14 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:03', 'User 03', 'Organization', 'Internet', 'Finance', 'Office 103', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(21, 'Laptop 02', 'SN-10004', 'Laptop', 'Dell', 'Latitude 5420', 'Core i5', 'Intel Core i5-1145G7', '16GB', '512GB SSD', '14 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:04', 'User 04', 'Organization', 'Internet', 'Finance', 'Office 104', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(22, 'Laptop 03', 'SN-10005', 'Laptop', 'HP', 'EliteBook 840 G8', 'Core i7', 'Intel Core i7-1165G7', '16GB', '1TB SSD', '14 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:05', 'User 05', 'Organization', 'Internet', 'Admin', 'Office 105', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(23, 'Desktop PC 03', 'SN-10006', 'Desktop', 'Lenovo', 'ThinkCentre M70s', 'Core i5', 'Intel Core i5-10400', '8GB', '256GB SSD', 'Lenovo 24 Monitor', 'Windows 10 Pro', 'Licensed', '00:11:22:33:44:06', 'User 06', 'Organization', 'Internet', 'Admin', 'Office 106', '1 Year', '2023', '2026', '2026-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(24, 'Laptop 04', 'SN-10007', 'Laptop', 'Acer', 'TravelMate P2', 'Core i5', 'Intel Core i5-1135G7', '8GB', '512GB SSD', '15.6 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:07', 'User 07', 'Organization', 'Internet', 'IT', 'Office 107', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(25, 'Laptop 05', 'SN-10008', 'Laptop', 'ASUS', 'ExpertBook B1', 'Core i5', 'Intel Core i5-1235U', '16GB', '512GB SSD', '15.6 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:08', 'User 08', 'Organization', 'Internet', 'IT', 'Office 108', '2 Years', '2025', '2028', '2028-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(26, 'Desktop PC 04', 'SN-10009', 'Desktop', 'Dell', 'OptiPlex 5080', 'Core i7', 'Intel Core i7-10700', '16GB', '512GB SSD', 'Dell 24 Monitor', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:09', 'User 09', 'Organization', 'Internet', 'Finance', 'Office 109', '1 Year', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(27, 'Laptop 06', 'SN-10010', 'Laptop', 'Lenovo', 'ThinkPad T14', 'Core i7', 'Intel Core i7-1165G7', '16GB', '512GB SSD', '14 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:10', 'User 10', 'Organization', 'Internet', 'HR', 'Office 110', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(28, 'Desktop PC 05', 'SN-10011', 'Desktop', 'HP', 'ProDesk 400 G7', 'Core i5', 'Intel Core i5-10500', '8GB', '256GB SSD', 'HP 22 Monitor', 'Windows 10 Pro', 'Licensed', '00:11:22:33:44:11', 'User 11', 'Organization', 'Internet', 'HR', 'Office 111', '1 Year', '2023', '2026', '2026-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(29, 'Laptop 07', 'SN-10012', 'Laptop', 'Dell', 'Latitude 5520', 'Core i5', 'Intel Core i5-1145G7', '16GB', '512GB SSD', '15.6 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:12', 'User 12', 'Organization', 'Internet', 'IT', 'Office 112', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(30, 'Laptop 08', 'SN-10013', 'Laptop', 'HP', 'ProBook 450 G8', 'Core i5', 'Intel Core i5-1135G7', '8GB', '512GB SSD', '15.6 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:13', 'User 13', 'Organization', 'Internet', 'Finance', 'Office 113', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(31, 'Desktop PC 06', 'SN-10014', 'Desktop', 'Acer', 'Veriton X', 'Core i5', 'Intel Core i5-10400', '8GB', '256GB SSD', 'Acer 24 Monitor', 'Windows 10 Pro', 'Licensed', '00:11:22:33:44:14', 'User 14', 'Organization', 'Internet', 'Admin', 'Office 114', '1 Year', '2023', '2026', '2026-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(32, 'Laptop 09', 'SN-10015', 'Laptop', 'ASUS', 'VivoBook 15', 'Core i5', 'Intel Core i5-1235U', '16GB', '512GB SSD', '15.6 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:15', 'User 15', 'Organization', 'Internet', 'IT', 'Office 115', '2 Years', '2025', '2028', '2028-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(33, 'Desktop PC 07', 'SN-10016', 'Desktop', 'Lenovo', 'ThinkCentre M80s', 'Core i7', 'Intel Core i7-10700', '16GB', '1TB SSD', 'Lenovo 24 Monitor', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:16', 'User 16', 'Organization', 'Internet', 'HR', 'Office 116', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(34, 'Laptop 10', 'SN-10017', 'Laptop', 'Acer', 'Aspire 5', 'Core i5', 'Intel Core i5-1235U', '8GB', '512GB SSD', '15.6 inch', 'Windows 11 Home', 'Licensed', '00:11:22:33:44:17', 'User 17', 'Organization', 'Internet', 'Finance', 'Office 117', '1 Year', '2025', '2026', '2026-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(35, 'Desktop PC 08', 'SN-10018', 'Desktop', 'MIS', 'OptiPlex 7090', 'Core i5', 'Intel Core i5-11500', '16GB', '1TB SSD', 'Dell 24 Monitor', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:18', 'User 18', 'Organization', 'Internet', 'IT', 'Office 118', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(36, 'Laptop 11', 'SN-10019', 'Laptop', 'Lenovo', 'ThinkPad E15', 'Core i5', 'Intel Core i5-1135G7', '16GB', '512GB SSD', '15.6 inch', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:19', 'User 19', 'Organization', 'Internet', 'Admin', 'Office 119', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01'),
(37, 'Desktop PC 09', 'SN-10020', 'Desktop', 'HP', 'ProDesk 600 G6', 'Core i5', 'Intel Core i5-10500', '16GB', '512GB SSD', 'HP 24 Monitor', 'Windows 11 Pro', 'Licensed', '00:11:22:33:44:20', 'User 20', 'Organization', 'Internet', 'Finance', 'Office 120', '2 Years', '2024', '2027', '2027-12-31', 'Good condition', '', 'Admin', '2026-08-28', 'Admin', '2026-08-28', '2026-08-28 07:10:01', '2026-08-28 07:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `id` int(11) NOT NULL,
  `stock_code` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `part_number` varchar(100) DEFAULT NULL,
  `unit` varchar(20) DEFAULT 'pcs',
  `minimum_stock` int(11) DEFAULT 0,
  `location` varchar(100) DEFAULT NULL,
  `shelf` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `stock_code`, `item_name`, `category`, `manufacturer`, `model`, `part_number`, `unit`, `minimum_stock`, `location`, `shelf`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(43, 'PC-0001', 'PC-0001', 'Dell', 'Dell', 'Dell', '', '10', 10, 'IT', 'IT', 'The  a new we need buy a new computer for our staffs.', NULL, '2026-09-02 01:56:49', '2026-09-02 01:59:26'),
(44, 'M-0002', 'M-0001', 'Mouse', 'Dell', 'Dell', '', '20', 20, 'IT', 'Adminstrator', 'News', NULL, '2026-09-02 01:58:16', '2026-09-02 02:00:38'),
(45, 'M-0003', 'Key-0001', 'IT', 'Dell', 'Dell', '', '10', 0, 'IT', '', 'I buy new mouse', 'admin', '2026-09-02 04:12:55', '2026-09-02 04:32:45'),
(46, 'STK-20260902092932', 'asd', 'IT', 'Dell', 'OptiPlex 7090', NULL, '1', 3, 'IT', NULL, '', NULL, '2026-09-02 09:29:32', '2026-09-02 09:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `stock_serials`
--

CREATE TABLE `stock_serials` (
  `id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `serial_number` varchar(150) NOT NULL,
  `status` enum('Available','Issued','Damaged') NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `warranty_expired` date DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

CREATE TABLE `stock_transactions` (
  `id` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `transaction_type` enum('IN','OUT') NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `transaction_date` date NOT NULL,
  `notes` text DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_transactions`
--

INSERT INTO `stock_transactions` (`id`, `stock_item_id`, `transaction_type`, `quantity`, `supplier`, `receiver`, `reference_no`, `transaction_date`, `notes`, `created_by`, `created_at`) VALUES
(35, 44, 'IN', 1, 'Lay', NULL, NULL, '2026-09-02', 'Error mouse', NULL, '2026-09-01 19:00:02'),
(36, 45, 'IN', 10, 'IT', NULL, NULL, '2026-09-02', 'new', 'admin', '2026-09-01 21:13:49'),
(37, 45, 'OUT', 2, NULL, NULL, '0158548', '2026-09-02', 'Error', 'admin', '2026-09-01 21:14:41'),
(38, 46, 'IN', 1, 'C06', NULL, NULL, '2026-09-02', '', NULL, '2026-09-02 02:30:46'),
(39, 46, 'OUT', 1, NULL, NULL, '0001', '2026-09-02', '', NULL, '2026-09-02 02:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(10) UNSIGNED DEFAULT NULL,
  `task_title` varchar(255) NOT NULL,
  `problem_category` varchar(100) DEFAULT NULL,
  `problem_description` text DEFAULT NULL,
  `action_taken` text DEFAULT NULL,
  `software_name` varchar(255) DEFAULT NULL,
  `software_version` varchar(100) DEFAULT NULL,
  `license_status` varchar(50) DEFAULT NULL,
  `license_key` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Open',
  `priority` varchar(50) NOT NULL DEFAULT 'Normal',
  `reported_by` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `task_date` date NOT NULL,
  `resolved_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `inventory_id`, `task_title`, `problem_category`, `problem_description`, `action_taken`, `software_name`, `software_version`, `license_status`, `license_key`, `result`, `status`, `priority`, `reported_by`, `assigned_to`, `created_by`, `task_date`, `resolved_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Install Window', 'Software', 'User requested Window installation.', 'Installed Window and activated the software.', 'Microsoft Office', '2024', 'Licensed', '', 'Installation completed successfully.', 'In Progress', 'High', 'User', 'IT Support', NULL, '2026-08-31', '2026-09-03', 'No problems found.', '2026-09-01 01:47:59', '2026-09-02 02:27:13'),
(2, NULL, 'Play install a new building  នៅក្រោយអគារ ក', 'Software  នៅក្រោយអគារ ក', 'We are waiting for boss approval. នៅក្រោយអគារ ក', 'Installed Microsoft Office and activated the software.  នៅក្រោយអគារ ក', 'Microsoft Office  នៅក្រោយអគារ ក', '2024 នៅក្រោយអគារ ក', 'Licensed នៅក្រោយអគារ ក', ' នៅក្រោយអគារ ក', 'Installation completed successfully. នៅក្រោយអគារ ក', 'Pending', 'Normal', 'User', 'IT Support', NULL, '2026-09-02', '2026-09-30', 'No problems found.', '2026-09-01 01:48:35', '2026-09-02 04:04:13'),
(3, NULL, 'Install Microsoft Office', 'Software', 'User requested Microsoft Office installation.', 'Installed Microsoft Office and activated the software.', 'Microsoft Office', '2024', 'Licensed', NULL, 'Installation completed successfully.', 'Completed', 'Normal', 'User', 'IT Support', 'Admin', '2026-09-01', '2026-09-01', 'No problems found.', '2026-09-01 01:48:35', '2026-09-01 01:48:35'),
(4, NULL, 'Install Microsoft Office', 'Software', 'User requested Microsoft Office installation.', 'Installed Microsoft Office and activated the software.', 'Microsoft Office', '2024', 'Licensed', NULL, 'Installation completed successfully.', 'Completed', 'Normal', 'User', 'IT Support', 'Admin', '2026-09-01', '2026-09-01', 'No problems found.', '2026-09-01 01:48:35', '2026-09-01 01:48:35'),
(5, NULL, 'Install Microsoft Office', 'Software', 'User requested Microsoft Office installation.', 'Installed Microsoft Office and activated the software.', 'Microsoft Office', '2024', 'Licensed', NULL, 'Installation completed successfully.', 'Completed', 'Normal', 'User', 'IT Support', 'Admin', '2026-09-01', '2026-09-01', 'No problems found.', '2026-09-01 01:48:35', '2026-09-01 01:48:35'),
(6, NULL, 'Install Microsoft Office', 'Software', 'User requested Microsoft Office installation.', 'Installed Microsoft Office and activated the software.', 'Microsoft Office', '2024', 'Licensed', NULL, 'Installation completed successfully.', 'Completed', 'Normal', 'User', 'IT Support', 'Admin', '2026-09-01', '2026-09-01', 'No problems found.', '2026-09-01 01:48:35', '2026-09-01 01:48:35'),
(7, NULL, 'Install Microsoft Office', 'Software', 'User requested Microsoft Office installation.', 'Installed Microsoft Office and activated the software.', 'Microsoft Office', '2024', 'Licensed', NULL, 'Installation completed successfully.', 'Completed', 'Normal', 'User', 'IT Support', 'Admin', '2026-09-01', '2026-09-01', 'No problems found.', '2026-09-01 01:48:35', '2026-09-01 01:48:35'),
(8, NULL, 'Install Microsoft Office', 'Software', 'User requested Microsoft Office installation.', 'Installed Microsoft Office and activated the software.', 'Microsoft Office', '2024', 'Licensed', NULL, 'Installation completed successfully.', 'Completed', 'Normal', 'User', 'IT Support', 'Admin', '2026-09-01', '2026-09-01', 'No problems found.', '2026-09-01 01:48:35', '2026-09-01 01:48:35'),
(9, NULL, 'Install Microsoft Office', 'We are stilling a problem', 'Error window 10', '', '', '', '', '', '', 'In Progress', 'Normal', '', 'Admin', NULL, '2026-09-01', '0000-00-00', '', '2026-09-01 10:07:06', '2026-09-02 02:26:55'),
(10, NULL, 'Install Cameras', 'Software', 'It don\'t have any problem', 'we started two days', 'Camera', 'Camera', 'camera', 'No', 'This is a good ', 'Completed', 'Normal', 'Lay', 'Phat', NULL, '2026-09-02', '2026-09-05', 'It is working a normal.', '2026-09-02 00:57:55', '2026-09-02 01:02:13'),
(11, NULL, 'Install Cables', 'This works done we help at on time', 'Change out of date cables', '', '', '', '', '', '', 'Completed', 'Critical', '', 'IT Support', NULL, '2026-09-02', '0000-00-00', '', '2026-09-02 03:57:06', '2026-09-02 07:41:16'),
(12, NULL, 'Run Camera', '', 'change cable', '', '', '', '', '', '', 'Completed', 'Critical', '', '', NULL, '2026-09-02', '0000-00-00', '', '2026-09-02 07:38:32', '2026-09-02 07:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `task_categories`
--

CREATE TABLE `task_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_categories`
--

INSERT INTO `task_categories` (`id`, `category_name`, `description`, `status`, `created_at`) VALUES
(1, 'Windows Error', NULL, 1, '2026-08-30 23:01:02'),
(2, 'Software Installation', NULL, 1, '2026-08-30 23:01:02'),
(3, 'Software Update', NULL, 1, '2026-08-30 23:01:02'),
(4, 'License', NULL, 1, '2026-08-30 23:01:02'),
(5, 'Hardware Problem', NULL, 1, '2026-08-30 23:01:02'),
(6, 'New Computer Installation', NULL, 1, '2026-08-30 23:01:02'),
(7, 'Printer Problem', NULL, 1, '2026-08-30 23:01:02'),
(8, 'Network Problem', NULL, 1, '2026-08-30 23:01:02'),
(9, 'User Support', NULL, 1, '2026-08-30 23:01:02'),
(10, 'Maintenance', NULL, 1, '2026-08-30 23:01:02'),
(11, 'Other', NULL, 1, '2026-08-30 23:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `task_work_logs`
--

CREATE TABLE `task_work_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(10) UNSIGNED DEFAULT NULL,
  `work_date` date NOT NULL,
  `work_title` varchar(255) NOT NULL,
  `work_description` text NOT NULL,
  `action_taken` text DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `worked_by` varchar(100) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_work_logs`
--

INSERT INTO `task_work_logs` (`id`, `task_id`, `inventory_id`, `work_date`, `work_title`, `work_description`, `action_taken`, `result`, `status`, `worked_by`, `start_time`, `end_time`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-09-01', 'Install Microsoft Office', 'User requested Microsoft Office installation.', 'Installed Microsoft Office 2024 and configured the software.', 'Installation completed successfully.', 'Completed', 'IT Support', '09:00:00', '10:00:00', 'No problems found.', '2026-09-01 01:53:34', '2026-09-01 01:53:34'),
(2, 2, 2, '2026-09-01', 'Network Troubleshooting', 'User reported network connection problems.', 'Checked network cable, IP address, and network settings.', 'Network connection restored successfully.', 'Completed', 'IT Support', '10:30:00', '11:15:00', 'Loose network cable was found.', '2026-09-01 01:53:34', '2026-09-01 01:53:34'),
(3, 3, 3, '2026-09-01', 'Windows Update', 'Computer required operating system updates.', 'Downloaded and installed Windows updates.', 'Windows updated successfully.', 'Completed', 'IT Support', '13:00:00', '14:00:00', 'Computer restarted after the update.', '2026-09-01 01:53:34', '2026-09-01 01:53:34'),
(4, 1, 1, '2026-09-01', 'Install Microsoft Office', 'User requested Microsoft Office installation.', 'Installed Microsoft Office 2024 and configured the software.', 'Installation completed successfully.', 'Completed', 'IT Support', '09:00:00', '10:00:00', 'No problems found.', '2026-09-01 01:55:10', '2026-09-01 01:55:10'),
(5, 2, 2, '2026-09-01', 'Network Troubleshooting', 'User reported network connection problems.', 'Checked network cable, IP address, and network settings.', 'Network connection restored successfully.', 'Completed', 'IT Support', '10:30:00', '11:15:00', 'Loose network cable was found.', '2026-09-01 01:55:10', '2026-09-01 01:55:10'),
(6, 3, 3, '2026-09-01', 'Windows Update', 'Computer required operating system updates.', 'Downloaded and installed Windows updates.', 'Windows updated successfully.', 'Completed', 'IT Support', '13:00:00', '14:00:00', 'Computer restarted after the update.', '2026-09-01 01:55:10', '2026-09-01 01:55:10'),
(7, 9, 0, '2026-09-02', 'Done', 'This works done we help at on time', 'This works done we help at on time', 'This works done we help at on time', 'Completed', 'This works done we help at on time', '09:21:00', '12:00:00', 'This works done we help at on time', '2026-09-02 02:21:30', '2026-09-02 02:21:30'),
(8, 2, 0, '2026-09-02', 'This works done we help at on time', 'This works done we help at on time', 'This works done we help at on time', 'This works done we help at on time', 'Completed', 'This works done we help at on time', '10:23:00', '15:23:00', 'This works done we help at on time', '2026-09-02 02:23:19', '2026-09-02 02:23:19'),
(9, 11, 0, '2026-09-02', 'Communication to experience', 'This works done we help at one time with IT', 'It still running process', '', 'Open', 'IT', '11:00:00', '12:00:00', 'We deserting ', '2026-09-02 04:00:14', '2026-09-02 04:00:14'),
(10, 2, 0, '2026-09-03', 'change out of date cable 50%', '', '', '', 'Open', '', '11:02:00', '11:08:00', 'This works done we help at on time', '2026-09-02 04:02:42', '2026-09-02 04:02:42'),
(11, 12, 0, '2026-09-02', 'expert', 'change camera', 'change camera run cable', 'done', 'In Progress', 'change camera', '14:40:00', '16:40:00', 'contious', '2026-09-02 07:40:22', '2026-09-02 07:40:22');

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
(1, 'admin', '$2y$10$zNZW3YZpwWsi.wA/UG29.efk0WW9H71dxSQeV75TlnDwmaX/MCuPS', 'System Administrator', 'admin@example.com', '015951866', 'Admin', 'Active', '2026-07-29 02:12:09', '2026-08-03 09:25:20'),
(2, 'manager', '$2y$10$2bWHgnCcq8DeTVhTomlxkOBgGGzAfsYzrox/vnEXV4BVjTkJRQtJ6', 'John Manager', 'manager@example.com', '015951866', 'Admin', 'Active', '2026-07-29 02:12:09', '2026-08-01 08:35:05'),
(3, 'staff', '$2y$10$4aUPN6pfq.LLsBFo1V7tLOZ88jU.apV/XQBvUEnbgtjnW3kiqQb7u', 'David Staff', 'staff@example.com', '015951866', 'Admin', 'Active', '2026-07-29 02:12:09', '2026-08-03 09:25:35'),
(4, 'lay', '$2y$10$AL/ziJCDhIy.HVnrmOtSMeWO0z6XKZ0xrxUlQdEEjD5ZXGh6fC206', 'vuth lay', 'vuthlay003@gmail.com', '015951866', 'Admin', 'Active', '2026-07-29 02:26:49', '2026-08-03 09:23:25'),
(6, 'phos', '$2y$10$e5v8/Lmr40kGcRB/3ZQimeHYgs8PkJpI9SsHjxKxY1SbbwuQA1yu2', 'phos', 'phos@mail.com', '07934090', '', 'Active', '2026-08-03 09:35:10', '2026-08-28 09:16:50'),
(7, 'dara', '$2y$10$onAxBr/jUqTMJPrJ0rm37OiEivrm4ZFIB2wXdVbsd3jFKk2nsKgla', 'dara', 'dara@gmail.com', '07934090', 'Admin', 'Active', '2026-08-03 09:38:10', '2026-08-28 09:15:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_code` (`stock_code`);

--
-- Indexes for table `stock_serials`
--
ALTER TABLE `stock_serials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_number` (`serial_number`),
  ADD KEY `stock_item_id` (`stock_item_id`);

--
-- Indexes for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_item_id` (`stock_item_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `task_work_logs`
--
ALTER TABLE `task_work_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_work_logs_task` (`task_id`);

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
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stock_serials`
--
ALTER TABLE `stock_serials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `task_work_logs`
--
ALTER TABLE `task_work_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock_serials`
--
ALTER TABLE `stock_serials`
  ADD CONSTRAINT `stock_serials_ibfk_1` FOREIGN KEY (`stock_item_id`) REFERENCES `stock_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD CONSTRAINT `stock_transactions_ibfk_1` FOREIGN KEY (`stock_item_id`) REFERENCES `stock_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_work_logs`
--
ALTER TABLE `task_work_logs`
  ADD CONSTRAINT `fk_task_work_logs_task` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
