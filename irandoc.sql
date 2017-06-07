-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 06:45 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irandoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `pay` int(2) NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `f_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `l_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `melli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `uni_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `field` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `madrak` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `uni_kind` int(11) NOT NULL,
  `uni_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id`, `ip`, `day`, `month`, `year`, `start_time`, `end_time`, `pay`, `price`, `f_name`, `l_name`, `melli`, `uni_num`, `phone`, `field`, `grade`, `madrak`, `gender`, `uni_kind`, `uni_name`, `subject`) VALUES
(1, '::1', '۰۶', '۰۹', '0', '2', '2', 0, '26', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(2, '::1', '۰۶', '۰۹', '1395', '04:48:29pm', '04:48:45pm', 0, '12', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(3, '::1', '۰۶', '۰۹', '????', '09:14:15pm', '09:14:18pm', 0, '2', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(4, '::1', '۰۶', '۰۹', '????', '09:27:57pm', '09:29:48pm', 0, '83', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(5, '::1', '۰۶', '۰۹', '????', '', '', 0, '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, '0', '0'),
(6, '::1', '۰۷', '۰۹', '????', '08:59:55am', '09:01:21am', 0, '64', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(7, '::1', '۰۷', '۰۹', '????', '09:01:33am', '09:03:11am', 0, '73', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(8, '::1', '۰۷', '۰۹', '????', '09:04:25am', '09:04:40am', 0, '11', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(9, '::1', '۰۷', '۰۹', '????', '09:06:20am', '09:09:31am', 0, '143', '0', '0', '0', '0', '0', 3, 1, 2, 1, 2, '0', '0'),
(10, '::1', '۰۹', '۰۹', '۱۳۹۵', '02:24:27pm', '02:24:29pm', 0, '1', '0', '0', '0', '0', '0', 1, 1, 1, 1, 1, '0', '0'),
(11, '::1', '۰۹', '۰۹', '۱۳۹۵', '02:51:07pm', '02:51:08pm', 0, '0.9 ریال  ', 'uodheelljn', 'shafiei', '-1903809181038', '', 'hdfjke', 1, 1, 1, 1, 1, '', ''),
(12, '::1', '۱۱', '۰۹', '۱۳۹۵', '07:18:23pm', '07:18:34pm', 0, '8.1 ریال  ', 'sdh', 'kn', 'kj', '', 'jkjn', 1, 1, 1, 1, 1, '', ''),
(13, '::1', '۱۷', '۰۹', '۱۳۹۵', '10:22:51am', '10:22:53am', 0, '1.35 ریال  ', 'iman', 'sh', '087865', '', '897', 1, 1, 1, 1, 1, '', ''),
(14, '::1', '۱۷', '۰۹', '۱۳۹۵', '10:34:15am', '10:34:16am', 0, '0.9 ریال  ', 'salam', 'doj', 'd;lksl;', '', 'd;lkd;lk', 1, 1, 1, 1, 1, '', ''),
(15, '::1', '۱۷', '۰۹', '۱۳۹۵', '10:34:34am', '10:34:35am', 0, '0.9 ریال  ', 'تسداصنصتیدص', 'کیئمی', 'کینمیت', '', '989', 1, 1, 1, 1, 1, '', ''),
(16, '::1', '۱۷', '۰۹', '۱۳۹۵', '10:38:08am', '10:38:09am', 0, '0.9 ریال  ', 'kjhfbhkh', 'lkjjhkjshk', 'ljbjkbjkb', '', 'bjkb', 1, 1, 1, 1, 1, '', ''),
(17, '::1', '۱۷', '۰۹', '۱۳۹۵', '10:46:35am', '10:46:37am', 0, '1.35 ریال  ', 'ساسااس', 'ااسن', 'تسستا', '', '908890', 1, 1, 1, 1, 1, '', ''),
(18, '::1', '۱۷', '۰۹', '۱۳۹۵', '', '', 0, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(19, '::1', '۱۷', '۰۹', '۱۳۹۵', '', '', 0, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(20, '::1', '۱۷', '۰۹', '۱۳۹۵', '', '', 1, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(21, '::1', '۱۷', '۰۹', '۱۳۹۵', '11:57:32am', '11:57:33am', 0, '0.9 ریال  ', 'efpiji', 'jilj', 'lkj', '', 'lk', 1, 1, 1, 1, 1, '', ''),
(22, '::1', '۲۲', '۰۹', '۱۳۹۵', '08:19:05am', '08:19:13am', 0, '5.85 ریال  ', 'jvjhv', 'vhj', 'vhj', '', 'v', 1, 1, 1, 1, 1, '', ''),
(23, '::1', '۲۲', '۰۹', '۱۳۹۵', '', '', 0, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(24, '::1', '۲۲', '۰۹', '۱۳۹۵', '08:56:35am', '09:09:32am', 0, '582.75 ریال  ', 'iman', 'shafiei', '0019877889', 'iust', '09125141543', 3, 1, 2, 1, 1, 'iust', 'salam'),
(25, '::1', '۲۲', '۰۹', '۱۳۹۵', '', '', 0, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(26, '::1', '۲۲', '۰۹', '۱۳۹۵', '09:11:04am', '09:11:06am', 0, '1.35 ریال  ', 'gwa', 'wag', '436', '', '436', 1, 1, 1, 1, 1, '', ''),
(27, '::1', '۲۲', '۰۹', '۱۳۹۵', '', '', 0, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(28, '::1', '۲۲', '۰۹', '۱۳۹۵', '09:14:37am', '09:14:38am', 0, '0.9 ریال  ', 'SGV', 'GSR', 'wG', '', '324', 1, 1, 1, 1, 1, '', ''),
(29, '::1', '۲۲', '۰۹', '۱۳۹۵', '09:15:29am', '09:15:31am', 0, '1.35 ریال  ', 'aefaef', 'afa', 'wfawf221', '', '213', 1, 1, 1, 1, 1, '', ''),
(30, '::1', '۲۲', '۰۹', '۱۳۹۵', '', '', 0, '0 ریال  ', '', '', '', '', '', 0, 0, 0, 0, 0, '', ''),
(31, '::1', '۲۲', '۰۹', '۱۳۹۵', '09:19:13am', '09:19:14am', 0, '0.9 ریال  ', 'wf', 'jbj', '8278', '', '98898', 1, 1, 1, 1, 1, '', ''),
(32, '::1', '۲۲', '۰۹', '۱۳۹۵', '09:28:09am', '09:36:51am', 0, '391.5 ریال  ', 'ایمان', 'شفیعی', '00982727', '', '929828', 1, 1, 1, 1, 1, '', ''),
(33, '::1', '۲۴', '۰۹', '۱۳۹۵', '07:40:18am', '07:40:26am', 0, '5.85 ریال  ', 'ایمان', 'شفیعی', '009191819', 'علم و صنعت', '09029', 3, 1, 1, 1, 1, 'علم و صنعت', 'بررسی ...'),
(34, '::1', '۲۴', '۰۹', '۱۳۹۵', '07:41:12am', '07:41:13am', 0, '0.9 ریال  ', 'iman', 'sh', '092092', 'iust', '902029', 1, 1, 1, 1, 1, 'iust', 'ddd'),
(35, '::1', '۲۴', '۰۹', '۱۳۹۵', '07:41:58am', '07:42:00am', 0, '1.35 ریال  ', 'محمد', 'اسلامی', '909038397', 'علم و صنعت', '0290228020', 1, 1, 1, 1, 1, 'علم و صنعت', 'بررسی ...'),
(36, '::1', '۲۴', '۰۹', '۱۳۹۵', '07:45:03am', '07:45:13am', 0, '7.65 ریال  ', 'ocdsh', 'joijoiwj', 'pijowidjioj', '', 'pojpojwopj', 1, 1, 1, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `day` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `month` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `year` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `day`, `month`, `year`, `price`) VALUES
(1, '۱۶', '۰۹', '۱۳۹۵', 0),
(2, '۲۱', '۰۹', '۱۳۹۵', 0),
(3, '۲۲', '۰۹', '۱۳۹۵', 985),
(4, '۲۳', '۰۹', '۱۳۹۵', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ready_users`
--

CREATE TABLE `ready_users` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `f_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `l_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `melli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `uni_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `gender` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `field` int(11) NOT NULL,
  `madrak` int(11) NOT NULL,
  `uni_kind` int(11) NOT NULL,
  `uni_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `begin_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `isReady` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ready_users`
--

INSERT INTO `ready_users` (`id`, `ip`, `f_name`, `l_name`, `melli`, `uni_num`, `phone`, `gender`, `grade`, `field`, `madrak`, `uni_kind`, `uni_name`, `subject`, `begin_time`, `end_time`, `isReady`) VALUES
(1, '::1', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(2, '::2', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(3, '::3', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(4, '::4', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(5, '::5', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(6, '::6', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(7, '::7', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(8, '::8', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(9, '::9', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(10, '::10', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(11, '::11', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(12, '::12', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(13, '::13', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(14, '::14', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(15, '::15', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(16, '::16', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(17, '::17', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(18, '::18', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(19, '::19', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(20, '::20', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(21, '::21', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(22, '::22', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(23, '::23', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(24, '::24', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(25, '::25', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(26, '::26', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(27, '::27', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(28, '::28', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(29, '::29', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(30, '::30', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(31, '::31', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(32, '::32', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(33, '::33', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(34, '::34', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(35, '::35', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(36, '::36', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(37, '::37', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(38, '::38', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(39, '::39', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(40, '::40', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(41, '::41', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(42, '::42', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(43, '::43', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(44, '::44', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(45, '::45', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(46, '::46', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(47, '::47', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(48, '::48', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(49, '::49', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0),
(50, '::50', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ready_users`
--
ALTER TABLE `ready_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ready_users`
--
ALTER TABLE `ready_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
