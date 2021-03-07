-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 04:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_associate_sub`
--

-- --------------------------------------------------------

--
-- Table structure for table `association_rules`
--

CREATE TABLE `association_rules` (
  `id` int(11) NOT NULL,
  `association_rules_a` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `association_rules_b` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `conf` decimal(16,2) NOT NULL,
  `lift` decimal(16,2) NOT NULL,
  `data_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `association_rules`
--

INSERT INTO `association_rules` (`id`, `association_rules_a`, `association_rules_b`, `conf`, `lift`, `data_date`) VALUES
(1, 'SP241=Low', 'SP242=Low', '1.00', '1.00', '2021-01-31 16:24:33'),
(2, 'KS(M)101=Low', 'SP242=Low', '1.00', '1.00', '2021-02-06 14:13:32'),
(3, 'KS(M)101=Low SP242=Low', 'SP243=Low', '1.00', '1.00', '2021-01-24 14:53:20'),
(4, 'ST031=high', 'SP242=Low', '1.00', '1.00', '2021-02-06 14:13:36'),
(5, 'KS(M)101=Low VT498=Low SP243=Low', 'SP242=Low', '1.00', '1.00', '2021-02-06 14:13:38'),
(6, 'ST141=Low SD301=Low ', 'SP242=Low SP243=Low', '0.99', '1.01', '2021-02-06 14:13:40'),
(7, 'SP242=Low SP243=Low', 'SP241=Low SP242=Low SP243=Low', '0.98', '1.01', '2021-02-06 14:10:22'),
(8, 'KS(M)101=Low KS(M)205=Low', 'SP242=Low ST031=high SP243=Low', '0.90', '1.02', '2021-02-06 14:41:42'),
(9, 'SP241=Low', 'SP242=Low SP243=Low', '0.91', '1.11', '2021-02-06 14:16:08'),
(10, 'KS(M)101=Low KS(M)205=Low', 'SP243=Low SP242=Low', '0.92', '1.03', '2021-02-06 15:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `static_sub`
--

CREATE TABLE `static_sub` (
  `id` int(11) NOT NULL,
  `ssub_eng` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ssub_th` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `spasspercentage` decimal(16,2) NOT NULL,
  `sdate_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `static_sub`
--

INSERT INTO `static_sub` (`id`, `ssub_eng`, `ssub_th`, `spasspercentage`, `sdate_update`) VALUES
(1, 'JP414', 'จป414', '100.00', '2021-01-30 16:03:42'),
(2, 'ST330', 'ศท330', '100.00', '2021-01-30 16:11:24'),
(3, 'VT497', 'วท497', '97.62', '2021-01-30 16:07:29'),
(4, 'ST011', 'ศท011', '96.43', '2021-01-30 16:10:44'),
(6, 'ST021', 'ศท021', '96.42', '2021-01-30 16:10:51'),
(7, 'VT498', 'วท498', '89.79', '2021-01-30 16:05:46'),
(8, 'ST031', 'ศท031', '87.91', '2021-01-30 16:24:55'),
(9, 'JP413', 'จป413', '86.66', '2021-01-30 16:06:08'),
(10, 'ST331', 'ศท331', '85.71', '2021-01-30 16:11:31'),
(11, 'JP314', 'จป314', '83.33', '2021-01-30 16:06:00'),
(12, 'CHP241', 'ชป241', '83.33', '2021-01-30 16:06:13'),
(13, 'GNG304', 'กง304', '80.95', '2021-01-30 16:04:06'),
(14, 'ST013', 'ศท013', '76.08', '2021-01-30 16:24:49'),
(15, 'ST021', 'ศท021', '73.62', '2021-01-30 16:25:02'),
(16, 'VT102', 'วท102', '70.58', '2021-01-30 16:07:11'),
(17, 'ST304', 'ศท304 ', '63.88', '2021-01-30 16:11:14'),
(18, 'PS101', 'ผษ101 ', '63.73', '2021-01-30 16:07:00'),
(19, 'SP241', 'ศท241 ', '54.94', '2021-01-30 16:11:43'),
(20, 'ST302', 'ศท302', '52.94', '2021-01-30 16:11:03'),
(21, 'ST022', 'ศท022', '43.05', '2021-01-30 16:25:14'),
(22, 'ST142', 'ศท142', '40.00', '2021-01-30 16:25:16'),
(23, 'KM100', 'คม100', '32.65', '2021-01-30 16:04:22'),
(24, 'ST012', 'ศท012', '23.52', '2021-01-30 16:25:26'),
(25, 'SD301', 'สต301', '17.78', '2021-01-30 16:12:13'),
(26, 'ST141', 'ศท141', '17.58', '2021-01-30 16:25:29'),
(27, 'KS(M)102', 'คศ102', '16.48', '2021-01-30 16:05:20'),
(28, 'KS(M)205', 'คศ205', '16.48', '2021-01-30 16:05:31'),
(29, 'SP241', 'ศป241', '9.87', '2021-01-30 16:25:57'),
(30, 'PS101', 'คศ101', '8.79', '2021-01-30 16:26:12'),
(31, 'KS(M)206', 'คศ206', '6.59', '2021-01-30 16:26:14'),
(32, 'CHW100', 'ชว100', '2.63', '2021-01-30 16:06:24'),
(33, 'SP242', 'ศป242', '0.00', '2021-01-30 16:11:51'),
(34, 'SP243', 'ศป243', '0.00', '2021-01-30 16:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `association_rules`
--
ALTER TABLE `association_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_sub`
--
ALTER TABLE `static_sub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `association_rules`
--
ALTER TABLE `association_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `static_sub`
--
ALTER TABLE `static_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
