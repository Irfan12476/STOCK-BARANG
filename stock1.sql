-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 10:23 AM
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
-- Database: `stock1`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `penerima` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(3, 4, '2022-03-19 03:01:13', 'sasa', 300),
(4, 4, '2022-03-18 13:33:23', 'hilang', 5),
(5, 7, '2022-03-18 17:10:09', 'siapa', 54),
(6, 8, '2022-03-19 01:32:56', 'i', 300),
(7, 10, '2022-03-19 03:44:33', 'sasa', 1),
(10, 10, '2022-03-19 08:30:38', 'jkl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'h@gmail.com', '<?$pw;?>'),
(3, 'admin@gmail.com', '1d75028ee3e85e6ff48a565001237ef9'),
(5, 'irfan@gmail.com', '123'),
(6, 'bramantyo@gmail.com', '988'),
(7, 'irfan@gmail.com', '45454'),
(8, 'dsfsd@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `qty`, `keterangan`) VALUES
(1, 0, '0000-00-00 00:00:00', 0, 'jj'),
(2, 0, '0000-00-00 00:00:00', 0, ''),
(32, 33, '0000-00-00 00:00:00', 3, ''),
(33, 0, '0000-00-00 00:00:00', 0, ''),
(34, 2, '2022-03-18 12:52:22', 23, ''),
(35, 1, '2022-03-18 12:54:42', 98908908, ''),
(39, 4, '2022-03-18 13:46:44', 234, 'toko Handphone'),
(40, 5, '2022-03-18 15:28:11', 2500, ''),
(41, 6, '2022-03-18 15:30:52', 9, ''),
(42, 7, '2022-03-18 15:37:49', 6766, ''),
(45, 3, '2022-03-18 16:58:20', 56, ''),
(46, 8, '2022-03-18 16:59:46', 700, 'zainab'),
(47, 8, '2022-03-18 17:00:31', 2312, 'toko Handphone'),
(48, 5, '2022-03-18 17:04:25', 40, ''),
(49, 8, '2022-03-19 01:33:32', 234, 'konter hp'),
(50, 10, '2022-03-19 03:38:54', 25, 'bodo ah'),
(53, 11, '2022-03-19 03:42:35', 14, 'toko Handphone'),
(54, 13, '2022-03-20 00:48:12', 67, 'konter hp'),
(55, 10, '2022-03-20 04:42:18', 45, 'konter hp'),
(56, 16, '2022-03-20 08:12:14', 50, 'dikasihh'),
(57, 12, '2022-03-20 08:16:10', 50, 'toko Handphone'),
(58, 16, '2022-03-20 08:16:22', 50, 'toko Handphone'),
(59, 12, '2022-03-20 08:42:01', 30, 'yy'),
(60, 16, '2022-03-20 08:42:30', 30, 'jgj'),
(61, 16, '2022-03-20 08:43:59', 30, 'hgh');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idpeminjaman` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggalpinjam` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `peminjam` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`idpeminjaman`, `idbarang`, `tanggalpinjam`, `qty`, `peminjam`, `status`) VALUES
(1, 10, '2022-03-20 07:29:27', 50, 'bNG', 'Dipinjam'),
(2, 10, '2022-03-20 08:03:38', 50, 'jhh', 'Dipinjam'),
(3, 10, '2022-03-20 08:04:13', 50, 'i', 'Dipinjam'),
(4, 10, '2022-03-20 08:05:26', 50, 'sasa', 'Dipinjam'),
(5, 10, '2022-03-20 08:05:58', 50, 'sasa', 'Dipinjam'),
(6, 12, '2022-03-20 08:06:21', 40, 'sasa', 'kembali'),
(7, 13, '2022-03-20 08:07:07', 100, 'hj', 'Dipinjam'),
(8, 16, '2022-03-20 08:11:19', 10, 'sasa', 'kembali'),
(9, 12, '2022-03-20 08:12:40', 30, 'sasa', 'Dipinjam'),
(10, 16, '2022-03-20 08:13:18', 30, 'sasa', 'kembali'),
(11, 12, '2022-03-20 08:16:43', 10, 'jjj', 'Dipinjam'),
(12, 12, '2022-03-20 08:17:17', 10, 'ggg', 'Dipinjam'),
(13, 16, '2022-03-20 08:17:54', 10, 'rer', 'Dipinjam'),
(14, 16, '2022-03-20 08:42:50', 10, 'ddd', 'Dipinjam'),
(15, 16, '2022-03-20 08:44:22', 10, 'hihih', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(767) NOT NULL,
  `deksripsi` varchar(566) NOT NULL,
  `stock` int(15) NOT NULL,
  `image` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deksripsi`, `stock`, `image`) VALUES
(12, 'SAMSUNG A3S', 'SMARTPHONE', 20, NULL),
(13, 'OPPO A9S', 'SMARTPHONE', -100, NULL),
(14, 'VIVO Y12', 'SMARTPHONE', 70, NULL),
(16, 'REALME U1', 'SMARTPHONE', 50, '90b6c1f933ef24fe51fb2180c46cbd56.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idpeminjaman`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
