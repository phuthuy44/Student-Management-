-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 03:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`) VALUES
(2, 'Phuong Vy', 'vy002359@gmail.com', '123456'),
(3, 'Phuong Alex', 'phuongvy@gmail.com', '123456'),
(4, 'phuthuy', 'minhtran.02051999@gmail.com', '123'),
(6, 'pvy', 'tranuyen196123@gmail.com', '$2y$10$JeeuPNzL9QwEoom7g7zMQOQvvQk6l82hdAX8HKTKxE1'),
(9, 'Hai ly', 'tranuyen1963@gmail.com', '$2y$10$AiK95KUy7lJlUJgOImoRbu4FykWOK1OPnzpS6wGd06m'),
(10, 'Sudoku', 'Asan@gmail.com', '$2y$10$rYtQl0SuDyiR8znPxZFo1u67UB2BBbXBe0.Mo65FQvx');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `fullname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `lastname`, `email`, `parents_name`, `date`, `phone`, `gender`, `district`, `city`, `state`, `nation`, `photo`) VALUES
(2, 'Alex', 'Tran', 'vy00987@gmail.com', 'Suzy Chan', '2006-02-15', '+20879112', 'female', 'HCM', 'HongKong', '123', 'USA', '25h58PICakGc58PICyzdPiN4v_PIC2018.png_wh860.png'),
(5, 'Alex', 'Down', 'vyalex123456@gmail.com', 'Zuki Down', '2004-01-28', '+20879112', 'male', 'HCM', 'Paris', '123', 'Paris', 'táº£i xuá»‘ng.png'),
(7, 'Sakura ', 'Takida', 'sakura@gmail.com', 'Nobi Takida', '2003-01-15', '+11207865423', 'female', 'Tokyo', 'Kiki Ecommerce', 'IU', 'Japanese', 'Takida.jpg'),
(8, 'Nobita', 'Sazan', 'nobitanngocnghech@gmail.com', 'Nobuta', '2002-06-25', '+220123456', 'male', 'Hokado', 'Buki Ecommerce', 'intop', 'Japanese', 'Nobita.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `fullname_Teacher` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_Teacher` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_Teacher` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adress_Teacher` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_Teacher` date NOT NULL,
  `gender_Teacher` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_Teacher` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fullname_Teacher`, `phone_Teacher`, `email_Teacher`, `Adress_Teacher`, `date_Teacher`, `gender_Teacher`, `photo_Teacher`) VALUES
(1, 'Pham Quoc Huy', '0987876543', 'phamquochuy@gmail.com', 'Quan 2, HCM', '1999-05-15', '', 'PhamQuocHuy.png'),
(2, 'Nguyen Song Ha Trang Anh', '078564321', 'nshtanh@gmail.com', 'Vung Tau', '1989-05-16', 'female', 'NguyenSongHaTrangAnh.jpg'),
(3, 'Nguyen Thi Hong Anh', '0120876542', 'honganh@gmail.com', 'DakLak', '1993-09-21', 'female', 'NguyenThiHongAnh.jpg'),
(4, 'Pham Hoai Bao', '0920879112', 'baohoai@gmail.com', 'Quan7, HCM', '1986-09-22', 'male', 'PhamHoaiBao.jpg'),
(5, 'Nguyen Thi Huong', '098765438', 'nthHuong@gmail.com', 'Binh Hung Hoa 2, Binh Tan, HCM', '1992-09-30', 'female', 'NguyenSongHaTrangAnh.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
