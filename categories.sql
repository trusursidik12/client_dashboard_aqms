-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 11:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `param` varchar(5) NOT NULL,
  `ispu_a` int(11) NOT NULL,
  `ispu_b` int(11) NOT NULL,
  `ambien_a` double NOT NULL,
  `ambien_b` double NOT NULL,
  `effect` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `param`, `ispu_a`, `ispu_b`, `ambien_a`, `ambien_b`, `effect`) VALUES
(1, 'Baik', 'co', 0, 50, 0, 4000, 'Tidak ada efek'),
(2, 'Baik', 'no2', 0, 50, 0, 80, 'Sedikit berbau'),
(3, 'Baik', 'o3', 0, 50, 0, 120, 'Luka pada Beberapa spesies tumbuhan akibat kombinasi dengan SO2 (selama 4 jam)'),
(4, 'Baik', 'so2', 0, 50, 0, 52, 'Luka pada Beberapa spesies tumbuhan akibat kombinasi dengan O3 (selama 4 jam)'),
(5, 'Baik', 'pm10', 0, 50, 0, 50, 'Tidak ada efek'),
(6, 'Baik', 'pm25', 0, 50, 0, 15.5, 'Tidak ada efek'),
(7, 'Sedang', 'co', 51, 100, 4001, 8000, 'Perubahan kimia darah tapi tidak terdeteksi'),
(8, 'Sedang', 'no2', 51, 100, 81, 200, 'Berbau'),
(9, 'Sedang', 'o3', 51, 100, 121, 235, 'Luka pada Beberapa spesies tumbuhan'),
(10, 'Sedang', 'so2', 51, 100, 53, 180, 'Luka pada Beberapa spesies tumbuhan'),
(11, 'Sedang', 'pm10', 51, 100, 51, 150, 'Terjadi penurunan pada jarak pandang'),
(12, 'Sedang', 'pm25', 51, 100, 15.6, 55.4, 'Terjadi penurunan pada jarak pandang'),
(13, 'Tidak Sehat', 'co', 101, 200, 8001, 15000, 'Peningkatan pada kardiovaskular pada perokok yang sakit jantung'),
(14, 'Tidak Sehat', 'no2', 101, 200, 201, 1130, 'Bau dan kehilangan warna. Peningkatan reaktivitas pembuluh tenggorokan pada penderita asma'),
(15, 'Tidak Sehat', 'o3', 101, 200, 236, 400, 'Penurunan kemampuan pada atlit yang berlatih keras'),
(16, 'Tidak Sehat', 'so2', 101, 200, 181, 400, 'Bau, Meningkatnya kerusakan tanaman'),
(17, 'Tidak Sehat', 'pm10', 101, 200, 151, 350, 'Jarak pandang turun dan terjadi pengotoran debu dimana-mana'),
(18, 'Tidak Sehat', 'pm25', 101, 200, 55.5, 150.4, 'Jarak pandang turun dan terjadi pengotoran debu dimana-mana'),
(19, 'Sangat Tidak Sehat', 'co', 201, 300, 15001, 30000, 'Meningkatnya kardiovaskular pada orang bukan perokok yang berpenyakit jantung, dan akan tampak beberapa kelemahan yang terlihat secara nyata'),
(20, 'Sangat Tidak Sehat', 'no2', 201, 300, 1131, 2260, 'Meningkatnya sensitivitas pasien yang berpenyakit asma dan bronhitis '),
(21, 'Sangat Tidak Sehat', 'o3', 201, 300, 401, 800, 'Olah raga ringan mengakibatkan pengaruh pernafasan pada pasien yang berpenyakit paru-paru kronis'),
(22, 'Sangat Tidak Sehat', 'so2', 201, 300, 401, 800, 'Meningkatnya sensitivitas pada pasien berpenyakit asthma dan bronhitis'),
(23, 'Sangat Tidak Sehat', 'pm10', 201, 300, 351, 420, 'Meningkatnya sensitivitas pada pasien berpenyakit asthma dan bronhitis'),
(24, 'Sangat Tidak Sehat', 'pm25', 201, 300, 150.5, 250.4, 'Meningkatnya sensitivitas pada pasien berpenyakit asthma dan bronhitis'),
(25, 'Berbahaya', 'co', 301, 99999, 30001, 99999999, 'Tingkat yang berbahaya bagi semua populasi yang terpapar'),
(26, 'Berbahaya', 'no2', 301, 99999, 2261, 99999, 'Tingkat yang berbahaya bagi semua populasi yang terpapar'),
(27, 'Berbahaya', 'o3', 301, 99999, 801, 99999, 'Tingkat yang berbahaya bagi semua populasi yang terpapar'),
(28, 'Berbahaya', 'so2', 301, 99999, 801, 99999, 'Tingkat yang berbahaya bagi semua populasi yang terpapar'),
(29, 'Berbahaya', 'pm10', 301, 99999, 421, 99999, 'Tingkat yang berbahaya bagi semua populasi yang terpapar'),
(30, 'Berbahaya', 'pm25', 301, 99999, 250.5, 99999, 'Tingkat yang berbahaya bagi semua populasi yang terpapar'),
(31, 'Baik', 'hc', 0, 50, 0, 45, NULL),
(32, 'Sedang', 'hc', 51, 100, 46, 100, NULL),
(33, 'Tidak Sehat', 'hc', 101, 200, 101, 215, NULL),
(34, 'Sangat Tidak Sehat', 'hc', 201, 300, 216, 432, NULL),
(35, 'Berbahaya', 'hc', 301, 99999, 433, 99999, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ispu_a` (`ispu_a`,`ispu_b`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
