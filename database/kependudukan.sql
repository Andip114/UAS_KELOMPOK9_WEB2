-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 06:41 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kependudukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kelahiran`
--

CREATE TABLE `data_kelahiran` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_kelahiran` varchar(12) NOT NULL,
  `hari_lahir` varchar(6) NOT NULL,
  `tempat_lahir` varchar(12) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `ayah` varchar(25) NOT NULL,
  `ibu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelahiran`
--

INSERT INTO `data_kelahiran` (`id`, `nama`, `tempat_kelahiran`, `hari_lahir`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `ayah`, `ibu`) VALUES
(2, 'Hera', 'Rumah Sakit', 'Sabtu', 'Tegal', '2019-09-23', 'LAKI-LAKI', 'Bambang', 'Sri');

-- --------------------------------------------------------

--
-- Table structure for table `data_kematian`
--

CREATE TABLE `data_kematian` (
  `id` int(11) NOT NULL,
  `NIK` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `dusun` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `hari_meninggal` varchar(6) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(10) NOT NULL,
  `sebab_meninggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kematian`
--

INSERT INTO `data_kematian` (`id`, `NIK`, `nama`, `umur`, `dusun`, `alamat`, `jenis_kelamin`, `hari_meninggal`, `tanggal_meninggal`, `tempat_meninggal`, `sebab_meninggal`) VALUES
(2, '3322399900', 'Hera', '80', 'Margana', 'Tegal', 'LAKI-LAKI', 'Rabu', '2012-12-02', 'Rumah', 'Bunuh Diri');

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(11) NOT NULL,
  `NIK` char(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `RT_RW` char(11) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `kecematan` varchar(20) NOT NULL,
  `agama` varchar(12) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(4) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `NIK`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `gol_darah`, `alamat`, `RT_RW`, `desa`, `kecematan`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `foto`) VALUES
(4, '3321', 'Andi Purwanto', 'Brebes', '1998-05-03', 'LAKI-LAKI', 'B', 'Desa Lembarawa', '03/05', 'Lembarawa', 'Brebes', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', ''),
(5, '3322', 'Wandoyo Hadi Kusomo', 'Brebes', '1998-05-05', 'LAKI-LAKI', 'A', 'Wanasari', '05/01', 'Wanasari', 'Wanasari', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', ''),
(6, '3323', 'Ida Fauziah', 'Brebes', '1999-04-03', 'PEREMPUAN', 'AB', 'Desa Krasak', '04/03', 'Krasak', 'Brebes', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', ''),
(7, '3324', 'Slamet Effendi', 'Brebes', '1999-02-22', 'LAKI-LAKI', 'O', 'Pesantunan', '01/01', 'Pesantunan', 'Wanasari', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', NULL),
(11, '3325', 'Hera', 'Brebes', '1999-12-12', 'LAKI-LAKI', 'B', 'Jalan. letnan Kolonen Jendral No.14 Kaligangsa Indah', '04/01', 'Kaligangsa', 'Brebes', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `job_title` varchar(20) DEFAULT NULL,
  `Tempat Lahir` varchar(15) DEFAULT NULL,
  `tanggal lahir` date DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `alamat`, `job_title`, `Tempat Lahir`, `tanggal lahir`, `email`, `password`, `level`, `join_date`, `last_activity`) VALUES
(1, 'Andi Purwanto', 'andi', 'Desa Lembarawa RT 3 RW 1', 'Admin', 'Brebes', '1998-05-03', 'andi@gmail.com', 'ce0e5bf55e4f71749eade7a8b95c4e46', '1', '2019-12-29 20:04:10', '2020-01-07 17:17:30'),
(2, 'Hera', '33201', 'Tegal', 'User', 'Tegal', '1999-04-02', 'hera@gmail.com', '9807a1e7fdb9edcc283f59dae4bcdc43', '2', '2020-01-02 18:04:04', '2020-01-07 17:40:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kematian`
--
ALTER TABLE `data_kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kematian`
--
ALTER TABLE `data_kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
