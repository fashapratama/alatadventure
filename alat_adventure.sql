-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 04:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alat_adventure`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 'Tenda', 'Pesan tenda untuk petualangan Anda.', 35000.00, 'tenda.jpg'),
(2, 'Kendaraan Offroad', 'Pesan kendaraan offroad untuk eksplorasi lebih jauh.', 250000.00, 'mobil.jpg'),
(3, 'Peralatan Masak', 'Peralatan Masak untuk membuat masakan di tengah petualangan.', 25000.00, 'masak.jpg'),
(4, 'Sepatu Hiking', 'Sepatu Hiking untuk perlindungan yang lebih baik saat mendaki.', 30000.00, 'sepatu-hiking.png'),
(5, 'Jaket Tebal', 'Jaket Tebal untuk menjaga tubuh tetap hangat dalam cuaca dingin.', 20000.00, 'jaket2.jpg'),
(6, 'Trekking Pole', 'Trekking Pole membantu keseimbangan Anda saat mendaki.', 15000.00, 'pole.jpg'),
(7, 'Tas Carrier', 'Tas Carrier untuk membawa barang-barang penting dalam perjalanan.', 20000.00, 'tas.jpg'),
(8, 'Headlamp', 'Headlamp untuk penerangan saat beraktivitas malam hari.', 5000.00, 'lampu.jpg'),
(9, 'Sleeping Bag', 'Sleeping Bag untuk kenyamanan dan kehangatan saat beristirahat.', 25000.00, 'Bag.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alat` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `status` enum('Menunggu Pembayaran','Dibayar','Dikirim','Selesai') DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `email`, `alamat`, `telepon`, `alat`, `jumlah`, `tanggal`, `transaksi`, `status`) VALUES
(1, 'disun', '19037@smkn1bawang.sch.id', 'karang', '82', 'Kendaraan Offroad', 2, '2024-11-30', '867240', 'Menunggu Pembayaran'),
(2, 'h', 'alea@gmail.com', 'uww', '34', 'Jaket Tebal', 2, '2024-11-30', '609153', 'Menunggu Pembayaran'),
(3, 'h', 'alea@gmail.com', 'uww', '34', 'Jaket Tebal', 2, '2024-11-30', '453305', 'Menunggu Pembayaran'),
(4, 'nana', 'h@gmail.com', 'larangan', '34', 'Kendaraan Offroad', 1, '2024-11-22', '762139', 'Menunggu Pembayaran'),
(5, 'pp', 'f@gmail.com', 'karangtalun', '123', 'Trekking Pole', 2, '2024-11-23', '343092', 'Menunggu Pembayaran'),
(6, 'nb', '19037@smkn1bawang.sch.id', 'blitar', '23', 'Jaket Tebal', 1, '2024-11-30', '640044', 'Menunggu Pembayaran'),
(7, 'nb', '19037@smkn1bawang.sch.id', 'blitar', '23', 'Jaket Tebal', 1, '2024-11-30', '738463', 'Menunggu Pembayaran'),
(8, 'nana', 'h@gmail.com', 'kenteng', '34', 'Kendaraan Offroad', 1, '2024-11-30', '384663', 'Menunggu Pembayaran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
