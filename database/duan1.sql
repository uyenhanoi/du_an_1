-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 08:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan11`
--

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_danhgia` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `chat_luong` text NOT NULL,
  `dung_voi_mo_ta` text NOT NULL,
  `so_sao` int(11) NOT NULL,
  `thoi_gian_danh_gia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`id_danhgia`, `id_kh`, `id_sp`, `chat_luong`, `dung_voi_mo_ta`, `so_sao`, `thoi_gian_danh_gia`) VALUES
(1, 1, 1, 'Kém', 'Chất liệu đúng với mô tả không', 3, '2023-11-07 22:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `iddm` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`iddm`, `ten_danhmuc`) VALUES
(1, 'TẤT CẢ SẢN PHẨM');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_giohang` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `luot_thich` int(11) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `noi_dung_sp` text NOT NULL,
  `gia_sp` double(10,2) NOT NULL,
  `id_danhgia` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_sp`, `ten_sp`, `hinh_anh`, `luot_thich`, `so_luong`, `noi_dung_sp`, `gia_sp`, `id_danhgia`, `id_danhmuc`) VALUES
(1, 'Nội thất phong khách ND01', '', 27, 30, 'Nội dung của sản phẩm', 0.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan_admin`
--

CREATE TABLE `tai_khoan_admin` (
  `id_tkadmin` int(11) NOT NULL,
  `ten_taikhoan` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_vai_tro` int(11) NOT NULL,
  `mat_khau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoan_admin`
--

INSERT INTO `tai_khoan_admin` (`id_tkadmin`, `ten_taikhoan`, `hinh_anh`, `id_vai_tro`, `mat_khau`) VALUES
(1, 'nguyenthu', '', 1, '12344321');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan_kh`
--

CREATE TABLE `tai_khoan_kh` (
  `id_tkkhach` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoan_kh`
--

INSERT INTO `tai_khoan_kh` (`id_tkkhach`, `ten_kh`, `mat_khau`, `hinh_anh`, `sdt`, `dia_chi`, `email`, `id_danhgia`) VALUES
(1, 'nmmm', '677', '', '0961746082', 'Hà Nội', 'nmm@fpt.edu.vn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vai_tro`
--

CREATE TABLE `vai_tro` (
  `id_vt` int(11) NOT NULL,
  `vai_tro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vai_tro`
--

INSERT INTO `vai_tro` (`id_vt`, `vai_tro`) VALUES
(1, 'Quản lý'),
(2, 'Người viết bài'),
(3, 'Quản lý sản phẩm'),
(4, 'Quản lý giá thành'),
(5, 'Quản lý bình luận'),
(6, 'Đăng bài viết'),
(7, 'Đăng sản phẩm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `lk_danh_gia_vs_khach_hang` (`id_kh`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`iddm`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `lk_gio_hang_vs_khach_hang` (`id_kh`),
  ADD KEY `lk_gio_hang_vs_sp` (`id_sp`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `lk_sanpham_danhmuc` (`id_danhmuc`),
  ADD KEY `lk_sp_danhgia` (`id_danhgia`);

--
-- Indexes for table `tai_khoan_admin`
--
ALTER TABLE `tai_khoan_admin`
  ADD PRIMARY KEY (`id_tkadmin`),
  ADD KEY `lk_tk_vt` (`id_vai_tro`);

--
-- Indexes for table `tai_khoan_kh`
--
ALTER TABLE `tai_khoan_kh`
  ADD PRIMARY KEY (`id_tkkhach`),
  ADD KEY `lk_kh_dg` (`id_danhgia`);

--
-- Indexes for table `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`id_vt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tai_khoan_admin`
--
ALTER TABLE `tai_khoan_admin`
  MODIFY `id_tkadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tai_khoan_kh`
--
ALTER TABLE `tai_khoan_kh`
  MODIFY `id_tkkhach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vai_tro`
--
ALTER TABLE `vai_tro`
  MODIFY `id_vt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `lk_gio_hang_vs_khach_hang` FOREIGN KEY (`id_kh`) REFERENCES `tai_khoan_kh` (`id_tkkhach`),
  ADD CONSTRAINT `lk_gio_hang_vs_sp` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id_sp`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danh_muc` (`iddm`),
  ADD CONSTRAINT `lk_sp_danhgia` FOREIGN KEY (`id_danhgia`) REFERENCES `danh_gia` (`id_danhgia`);

--
-- Constraints for table `tai_khoan_admin`
--
ALTER TABLE `tai_khoan_admin`
  ADD CONSTRAINT `lk_tk_vt` FOREIGN KEY (`id_vai_tro`) REFERENCES `vai_tro` (`id_vt`);

--
-- Constraints for table `tai_khoan_kh`
--
ALTER TABLE `tai_khoan_kh`
  ADD CONSTRAINT `lk_kh_dg` FOREIGN KEY (`id_danhgia`) REFERENCES `danh_gia` (`id_danhgia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
