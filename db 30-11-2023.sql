-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 08:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_books` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_books`, `judul`, `pengarang`, `penerbit`, `foto`) VALUES
(1, 'Codeigniter', 'Mulyadi', 'Tiga Serangkai', 'codeigniter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id_migrations` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `ipk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id_migrations`, `nama`, `nim`, `ipk`) VALUES
(1, 'Lanjar Dwi Saputro', 'K3520038', '3.84');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `telepon`, `email`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'lanjar', 'Lanjar Dwi Saputro', 'Banjarjo 18/04, Gedangan, Cepogo, Boyolali', 'Boyolali', '2002-11-29', 'Laki-laki', '085747768629', 'lanjar17@gmail.com', '12345678', 'lanjar.jpeg', '0000-00-00', '0000-00-00'),
(25, 'lanjardw', 'Dwi Lanjar Saputro', 'Bjir', 'Byl', '2002-11-29', 'Laki-laki', '08687787', 'lanjar17@gmail.com', '$2y$10$Txg07dIBeXT//N5o98v9u.k4SXrRdZa94viw5FVr91XgmOtdWPRke', 'IMG_1948.JPG', '2023-11-27', '2023-11-27'),
(27, 'dhani', 'Dhani Wahyu Ramadhan', 'Banjarjo 18/04, Gedangan, Cepogo, Boyolali', 'Boyolali', '2015-07-14', 'Laki-laki', '085768676543', 'dhani@gmail.com', '$2y$10$aJBC6qTlAN1I2LkESa1fNOcvJzxZq/hPl8o1OmefMcM6Cv/G0SRRa', 'IMG_1945.JPG', '2023-11-28', '2023-11-28'),
(30, 'yuni12', 'Yuni Lestari Trunol', 'Jombongggggggg', 'Boyolali', '2002-12-19', 'Perempuan', '085724704537', 'yuni@yuni.com', '$2y$10$Domw7UsJ3WBx1o42krWH5uCy9mOfg1gjWpZj0CQSMrDP7Ov8NGvja', 'IMG_1892.JPG', '2023-11-28', '2023-11-30'),
(31, 'jokow', 'Joko Widodo', 'Banjarsari, Surakarta', 'Surakarta', '2012-12-12', 'Laki-laki', '086374374', 'joko@gmail.com', '$2y$10$I21Sw79FGxdCW6wm78yY1.91hyorI4IPCU4/Z7E4iLQNYcUfNarqu', 'IMG_1976.JPG', '2023-11-30', '2023-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_books`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id_migrations`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id_migrations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
