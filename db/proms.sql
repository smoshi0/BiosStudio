-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 09:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proms`
--

-- --------------------------------------------------------

--
-- Table structure for table `projek`
--

CREATE TABLE `projek` (
  `id` int(11) NOT NULL,
  `nama_projek` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `manajer` text NOT NULL,
  `anggota1` text NOT NULL,
  `anggota2` text NOT NULL,
  `anggota3` text NOT NULL,
  `np` decimal(10,0) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `jw` varchar(10) NOT NULL,
  `prog_back` varchar(100) NOT NULL,
  `note_back` varchar(225) NOT NULL,
  `prog_front` varchar(100) NOT NULL,
  `note_front` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projek`
--

INSERT INTO `projek` (`id`, `nama_projek`, `proposal`, `manajer`, `anggota1`, `anggota2`, `anggota3`, `np`, `hp`, `start_date`, `end_date`, `jw`, `prog_back`, `note_back`, `prog_front`, `note_front`) VALUES
(30, 'sepamda', '61d5541e5deec.pdf', 'Ujang', 'Budi', 'Dirga', 'Pratama', '2000', 'awdas', '2021-12-02', '2021-12-27', '25', '100', 'diupdate di github pada tanggal 3 januari 2021', '100', 'projek diunggah di github pada tanggal 5 februari 2021'),
(36, 'Bayu Dirga', '61c890298f29c.pdf', 'Bayu', 'Bayu', 'Dirga', '', '200000', 'Hasil', '2021-12-02', '2021-12-30', '28', '100', '', '100', ''),
(37, 'DURJANA', '61ce6cc9234cc.pdf', 'Bayu', 'Supri', '', '', '20000000', 'Marketing', '2021-12-01', '2021-12-31', '30', '', '', '90', 'Projek disimpan di github pada tanggal 3 januari 2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(5, 'bayu', '$2y$10$WDXHm6LYpxlJv.qJbxK.DekAFeD.zhPwXhfnHctXInr9F8czhAHjK', 'admin'),
(9, 'ubay', '$2y$10$iaDICgQvBYnXfz0q0ay7quQ4sxsquUbnHckN4Wk01wvptd9GWFfGm', 'analis'),
(13, 'ucup', '$2y$10$Jo24akCVIzGg6T4d5Y0zA.ukeQXVpgjmjkuK1oD4nSzJBph3r73ja', 'admin'),
(15, 'analis', '$2y$10$E17zaoGkt94oMNk2Ndqcd.iRFgf80Om6avZNoVvEXQ8F9OfCiNOdq', 'analis'),
(16, 'front', '$2y$10$2hcRSjXn51xoqpPJBfrS8.HhKJj9xq0gjhxbPfTsKXNGv/eRnyVpK', 'front'),
(17, 'back', '$2y$10$2yRHw/nMTE5NGUv0kl/bV.zAn5gsyLJDe.It45ungEwlCFt0.4.eC', 'backend'),
(18, 'admin', '$2y$10$1D3ZIOcjiePzmNKi2TmqlOhZ56Ng/psShyk3Bjipx5bhbXpvqt0Au', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
