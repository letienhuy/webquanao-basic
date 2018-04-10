-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 11:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `id_hoadon` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `chitiet_hoadon`
--

INSERT INTO `chitiet_hoadon` (`id_hoadon`, `id_sp`, `soluong`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 3),
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `chuyenmuc_id` int(10) UNSIGNED NOT NULL,
  `chuyenmuc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`chuyenmuc_id`, `chuyenmuc`, `link`) VALUES
(2, 'Thời Trang Nam', ''),
(3, 'Thời Trang Nữ', ''),
(4, 'Sản Phẩm Hot', ''),
(5, 'Sản Phẩm Bán Chạy', ''),
(7, 'Sản Phẩm Giảm Giá', '');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `ngaymua` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hoten_nm` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tongtien` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hoadon`, `ngaymua`, `hoten_nm`, `diachi`, `email`, `phone`, `tongtien`) VALUES
(1, '2018-04-06 20:25:40', 'Nguyễn văn Hùng', 'Thành phố thái nguyên', 'huy', '0987452154', '1,190.000 đ');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id_lh` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hoten` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tieude` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id_lh`, `time`, `hoten`, `email`, `tieude`, `noidung`) VALUES
(1, '2016-08-18 15:05:33', 'ngocchien', 'Chien@gmail.com', 'Sản phẩm tốt lắm', 'Tôi rất yêu sản phẩm ở cửa hàng bạn mong bạn sớm có những sản phẩm tốt và giá thành hợp lý xin cảm ơn shop Fanshop'),
(2, '2016-08-24 03:31:55', 'Nguyễn Ngọc Hải', 'MaribelValde@gmail.com', 'Sản phẩm ít', 'Shop còn ít quần áo mong shop phát triển thêm '),
(3, '2016-09-04 17:58:33', 'Nguyễn văn mới', 'Nguyenmoi@gmail.com', 'Mới vào', 'Mới vào');

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

CREATE TABLE `quangcao` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenanh` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `quangcao`
--

INSERT INTO `quangcao` (`id`, `tenanh`) VALUES
(7, 'images/images/201631713300296357.jpg'),
(8, 'images/images/B1CLT168_210.jpg'),
(9, 'images/images/1200_7_52.jpg'),
(10, 'images/images/1_55_51.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `tensp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaisp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuyenmuc_id` int(10) NOT NULL,
  `chatlieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsx` year(4) NOT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mausac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichthuoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensp_khongdau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `gia`, `loaisp`, `hinhanh`, `chuyenmuc_id`, `chatlieu`, `namsx`, `xuatxu`, `mausac`, `kichthuoc`, `tensp_khongdau`) VALUES
(1, 'Áo sơ mi nam A12', '200.000', '', 'sp/2016519133545620440.jpg', 4, 'Cotton 100%', 2016, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao so  mi nam A12'),
(2, 'Áo sơ mi nam B3', '250.000', '', 'sp/201655153217560167.jpg', 2, 'Cotton 100%', 2016, 'Việt nam', 'Xanh Đậm', 'M L XL XXL', 'Ao so mi nam B3'),
(3, 'Áo sơ mi nam B3', '180.000', '', 'sp/2016421173348476341.jpg', 2, 'Cotton 100%', 2016, 'Việt nam', 'Xanh Đậm', 'M L XL XXL', 'Ao so mi nam B3'),
(4, 'Áo sơ mi nam A15', '200.000', '', 'sp/2016417162515500822.jpg', 2, 'Cotton 65%', 2016, 'Việt nam', 'Xanh dương nhạt', 'M L XL XXL', 'Ao so mi nam A15'),
(5, 'Áo sơ mi nam B123', '250.000', '', 'sp/2016427163020194371.jpg', 4, 'Cotton 100%', 2016, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao so mi nam B123'),
(6, 'Áo sơ mi nam A16', '200.000', '', 'sp/2016519133322745924.jpg', 2, 'Cotton 100%', 2016, 'Việt nam', 'Đen', 'M L XL XXL', 'Ao so mi nam A16'),
(7, 'Áo sơ mi nam A10', '160.000', '', 'sp/2016512141116701977.jpg', 5, 'Cotton 65%', 2016, 'Việt nam', 'Đen trắng', 'M L XL XXL', 'Ao so mi nam A10'),
(8, 'Áo sơ mi nữ Aw3', '150.000', '', 'sp/yhiu.jpg', 3, 'Cotton 100%', 2016, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao so mi nam Aw3'),
(9, 'Áo sơ mi nữ BQ', '175.000', '', 'sp/B1CLT168_210.jpg', 3, 'Cotton 65%', 2016, 'Việt nam', 'Hồng', 'M L XL XXL', 'Ao so mi nu BQ'),
(10, 'Áo sơ mi nữ BA', '200.000', '', 'sp/G1OLT009_210.jpg', 3, 'Cotton 65%', 2016, 'Việt nam', 'Hồng nhạt', 'M L XL XXL', 'Ao so mi nu BA'),
(11, 'Áo thun nam A2', '145.000', '', 'sp/8.jpg', 4, 'Thun', 2016, 'Việt nam', 'Xám', 'M L XL XXL', 'Ao thun nam A2'),
(12, 'Áo thun nam A4', '160.000', '', 'sp/20165615281763849.jpg', 5, 'Cotton 100%', 2016, 'Việt nam', 'Đen trắng', 'M L XL XXL', 'Ao thun nam A4'),
(13, 'Áo thun nam A5', '250.000', '', 'sp/201656151011435291.jpg', 5, 'Vãi pha nilon', 2016, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao thun nam A5'),
(14, 'Áo thun nam AZZ', '100.000', '', 'sp/images.jpg', 2, 'Thun', 2014, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao thun nam AZZ'),
(15, 'Áo khoác nam Z6', '350.000', '', 'sp/201591124012656921.jpg', 2, 'Vãi nilon', 2016, 'Việt nam', 'Đen', 'M L XL XXL', 'Ao khoac nam Z6'),
(16, 'Áo khoác nam Z1', '400.000', '', 'sp/2014113161911390705.jpg', 2, 'Cotton 100%', 2016, 'Việt nam', 'Nâu', 'M L XL XXL', 'Ao khoac nam Z1'),
(17, 'Áo khoác choàng S2', '250.000', '', 'sp/20151024162022852862.jpg', 2, 'Cotton 65%', 2016, 'Việt nam', 'Đen', 'M L XL XXL', 'Ao khoac choang S2'),
(18, 'Áo khoác nam Z5', '360.000', '', 'sp/2015102916218249574.jpg', 5, 'Cotton 100%', 2016, 'Việt nam', 'Đen', 'M L XL XXL', 'Ao khoac nam Z5'),
(19, 'Áo khoác nữ SD', '250.000', '', 'sp/286.jpg', 3, 'Cotton 100%', 2016, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao khoac nu SD'),
(20, 'Áo thun nữ A1', '150.000', '', 'sp/B1CLT178_210.jpg', 3, 'Cotton 100%', 2016, 'Việt nam', 'Xanh Dương', 'M L XL XXL', 'Ao thun nu A1'),
(21, 'Áo thun nữ AD', '160.000', '', 'sp/B1CLT164_210.jpg', 3, 'Cotton 65%', 2016, 'Việt nam', 'Trắng', 'M L XL XXL', 'Ao thun nu AD'),
(22, 'Áo thun nữ A4', '150.000', '', 'sp/B2CHT054.jpg', 3, 'Thun', 2016, 'Việt nam', 'Xám', 'M L XL XXL', 'Ao thun nu A4'),
(23, 'Váy nữ AZ2', '350.000', '', 'sp/B1OLT017_210.jpg', 3, 'Cotton 100%', 2016, 'Việt nam', 'Hồng', 'M L XL XXL', 'Vay nu AZ2'),
(24, 'Váy nữ AB2', '250.000', '', 'sp/G1SLT004_210.jpg', 4, 'Vãi pha nilon', 2016, 'Việt nam', 'Đen trắng', 'M L XL XXL', 'Vay nu AB2'),
(25, 'Áo tôn dáng nữ F2', '250.000', '', 'sp/198.jpg', 5, 'Cotton 100%', 2016, 'Việt nam', 'Vàng nhạt', 'M L XL XXL', 'Ao ton dang nu F2'),
(26, 'Áo tôn dáng nữ F3', '200.000', '', 'sp/eva-thoi-trang.jpg', 5, 'Cotton 65%', 2016, 'Việt nam', 'Xanh dương', 'M L XL XXL', ''),
(27, 'Váy tôn giáng AE', '250.000', '', 'sp/K1CLT018.jpg', 4, 'Cotton 65%', 2016, 'Việt nam', 'Cam nhạt', 'M L XL XXL', ''),
(28, 'ao1', '120.000', '', 'sp/198.jpg', 4, 'thun', 2016, 'việt nam', 'vàng', 'S XL', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `ho` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `ho`, `ten`, `mail`, `phone`, `matkhau`, `ngaysinh`, `diachi`, `gioitinh`, `level`) VALUES
(15, 'Nguyễn Ngọc', 'Chiến', 'Ngocchien@gmail.com', '0979433225', '123456', '1982-02-14', 'Tổ 4 tân thịnh thanh phố thái nguyên', '1', 1),
(16, 'Nguyễn thị', 'Đào', 'Thuydao@gmail.com', '0977644905', '123456', '1976-04-18', 'Tổ 4 tân thịnh thanh phố thái nguyên', '0', 1),
(17, 'Nguyễn văn', 'Hùng', 'huy', '0987452154', '123456', '1984-07-13', 'Thành phố thái nguyên', '1', 1),
(18, 'Nguyễn ngọc ', 'chiến', 'admin', '0979433225', '123456', '1993-09-15', '  Quỳnh châu Quỳnh lưu Nghệ an', '1', 2),
(20, 'Nguyễn văn', 'Tuấn', 'Nguyentuan@gmail.com', '01657842255', '123456', '1973-03-16', 'Trường công nghệ thông tin - Thái nguyên', '1', 1),
(21, 'nguyên văn', 'khang', 'Nguyentuan1@gmail.com', '01657842255', '123456', '1975-04-13', 'Trường công nghệ thông tin - Thái nguyên', '1', 1),
(22, 'Huy', 'Le', 'admina', '123456789', 'admina', '1973-12-13', 'abc', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`chuyenmuc_id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoadon`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id_lh`);

--
-- Indexes for table `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `chuyenmuc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id_lh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
