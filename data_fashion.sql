-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `ho` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` bigint(20) NOT NULL,
  `dia_chi` text NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `sex` varchar(10) NOT NULL DEFAULT 'male'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `ho`, `ten`, `email`, `sdt`, `dia_chi`, `user_name`, `user_password`, `create_date`, `sex`) VALUES
(2, 'Đinh', 'ca', 'cadinhngoc5@gmail.com', 336835498, 'xom 2 giao an giao thuy nam dinh', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-10-18 17:34:46', 'male'),
(3, 'Đinh Ngọc', 'Dũng', 'dinhngocdung1963@gmail.com', 396569970, 'x', 'dung', '625d45c587033e8970af8b4e3fdb575c', '2022-10-19 20:28:10', 'male'),
(4, 'me', 'me', 'cadinhngoc5@gmail.com', 384139612, 'xom 2 giao an giao thuy nam dinh', 'ngo', '503df5ff92a0620d57b99bd878c4444d', '2022-10-19 21:06:10', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(250) NOT NULL,
  `gioi_thieu` varchar(250) NOT NULL,
  `noi_dung` text NOT NULL,
  `nguoi_dang` varchar(250) DEFAULT NULL,
  `ngay_dang` datetime DEFAULT current_timestamp(),
  `trang_thai` int(11) NOT NULL,
  `anh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bai_viet`
--

INSERT INTO `bai_viet` (`id`, `tieu_de`, `gioi_thieu`, `noi_dung`, `nguoi_dang`, `ngay_dang`, `trang_thai`, `anh`) VALUES
(1, 'test  ', 'test', 'test', '   ca', '2022-10-21 08:40:06', 0, 'Uploads/nickel.jpg'),
(2, 'Thời trang', 'Cuộc thi Miss Grand International (Hoa hậu Hòa bình Quốc tế) đang diễn ra vô cùng gay cấn với phần thể hiện, tranh tài của các đại diện đến từ các quốc gia trên thế giới. Và Việt Nam, hoa hậu Thiên Ân đang được đánh giá là đối thủ nặng ký cho chiếc v', 'Hoa hậu Thiên Ân, Thùy Tiên mặc quần ngược vẫn được khen nhờ \"vớt vát\" bằng thần thái', 'vnxpress', '2022-10-21 09:57:34', 0, 'Uploads/network-mesh-wire-digital-technology-background_1017-27428.png');

-- --------------------------------------------------------

--
-- Table structure for table `ct_don_hang`
--

CREATE TABLE `ct_don_hang` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_don_hang`
--

INSERT INTO `ct_don_hang` (`id`, `id_san_pham`, `so_luong`, `id_don_hang`) VALUES
(1, 4, 100, 1),
(2, 1, 1, 3),
(3, 2, 2, 3),
(4, 1, 4, 4),
(5, 2, 2, 4),
(6, 1, 3, 5),
(7, 4, 4, 5),
(8, 2, 6, 5),
(9, 1, 3, 6),
(10, 4, 4, 6),
(11, 2, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `sex` varchar(10) NOT NULL DEFAULT 'NAM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `mo_ta`, `sex`) VALUES
(1, 'QUẦN ÁO NAM', 'Quần áo giành cho các bạn nam trẻ trung, năng động.  ', 'NAM'),
(2, 'ĐỒNG HỒ NAM', 'Đồng hồ nam tạo nên nét mạnh mẽ cá tính riêng. ', 'NAM'),
(3, 'TÚI XÁCH - BÓP VÍ NAM', 'Túi xách , bóp ví dành riêng cho phái mạnh, thể hiện sự đăng cấp của người dùng', 'NAM'),
(5, 'GIÀY - DÉP NAM', 'Giày, dép dành riêng cho phái mạnh', 'NAM'),
(6, 'THẮT LƯNG - DÂY NỊT NAM', 'Các loại thắt lưng, dây nịt dành riêng cho phái mạnh', 'NAM'),
(7, 'PHỤ KIỆN NAM', 'Phụ kiện đính kèm cho nam giới, tạo phong cách đặc chưng cho từng trang phục', 'NAM'),
(8, 'test', 'te', 'NAM'),
(9, 'khanh', 'khanh', 'NAM');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(250) NOT NULL,
  `sdt` bigint(20) NOT NULL,
  `dia_chi` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `trang_thai` int(11) NOT NULL,
  `tong_tien` decimal(11,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `ho_ten`, `sdt`, `dia_chi`, `email`, `ngay_tao`, `trang_thai`, `tong_tien`) VALUES
(1, 'dinh ngoc ca', 336835498, 'xom 2 giao an giao thuy nam dinh', 'cadinhngoc5@gmail.com', '2022-10-22 01:18:23', 1, '200'),
(2, 'test', 555, 'test', 'cadinhngoc5@gmail.com', '2022-10-22 01:43:39', 1, '0'),
(3, 'ca', 1, 'ca', 'cadinhngoc5@gmail.com', '2022-10-22 02:10:43', 1, '0'),
(4, 'text', 1234565, 'text', 'cadinhngoc5@gmail.com', '2022-10-22 02:19:45', 3, '8400000'),
(5, 'ca', 336835498, 'hoang mai ha noi', 'cadinhngoc555@gmail.com', '2022-10-28 03:20:26', 1, '5280000'),
(6, 'ca', 336835498, 'hoang mai ha noi', 'cadinhngoc555@gmail.com', '2022-10-28 03:21:14', 2, '5280000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `danh_muc` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `nha_san_xuat` varchar(255) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `phan_tram_khuyen_mai` float DEFAULT 0,
  `anh` text DEFAULT NULL,
  `sex` varchar(10) NOT NULL DEFAULT 'NAM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ten`, `danh_muc`, `mo_ta`, `nha_san_xuat`, `so_luong`, `gia_ban`, `phan_tram_khuyen_mai`, `anh`, `sex`) VALUES
(6, 'Áo sơ mi nam', 'QUẦN ÁO NAM', 'Áo sơ mi nam caro ngắn tay Vũ Tuấn NTS.03.10 SID55515', 'Vũ Tuấn', 100, 365000, 50, 'Uploads/ao_so_mi_nam_caro_ngan_tay_vu_tuan_nts0310_5840.jpg', 'NAM'),
(7, 'Đồng hồ nam', 'ĐỒNG HỒ NAM', 'Đồng hồ nam curren dây thép nam tính SID56977', 'Quảng châu', 200, 650000, 50, 'Uploads/dong_ho_nam_curren_day_thep_nam_tinh_c3ac.jpg', 'NAM'),
(8, 'Đồng hồ nam LongBo', 'ĐỒNG HỒ NAM', 'Đồng hồ nam LongBo nam tính 80275G-G02 SID64056', 'Việt Nam', 3, 520000, 50, 'Uploads/dong_ho_nam_longbo_nam_tinh_80275gg02_1b20.jpg', 'NAM'),
(9, 'Áo sơ mi nam', 'QUẦN ÁO NAM', 'Áo sơ mi nam kẻ sọc Mốt Trẻ ASD025 SID63131', 'Việt Nam', 3, 269000, 50, 'Uploads/ao_so_mi_nam_ke_soc_mot_tre_asd025_141a.jpg', 'NAM'),
(10, 'Balo phượt', 'TÚI XÁCH - BÓP VÍ NAM', 'Balo phượt thời trang SID60937', 'Việt Nam', 3, 350000, 50, 'Uploads/balo_phuot_thoi_trang_521a.jpg', 'NAM'),
(11, 'Balo MIKKOR The Grander', 'TÚI XÁCH - BÓP VÍ NAM', 'Balo MIKKOR The Grander thời trang TG SID53266', 'Việt Nam', 30, 699000, 50, 'Uploads/balo_mikkor_the_grander_thoi_trang_tg_ca59.jpg', 'NAM'),
(12, 'Giày sneaker nam', 'GIÀY - DÉP NAM', 'Giày sneaker nam ANDOFA cá tính FCB01 SID64940', 'Việt Nam', 10, 320000, 50, 'Uploads/giay_sneaker_nam_andofa_ca_tinh_fcb01_6a07.jpg', 'NAM'),
(13, 'Giày nam Top Fit KRYPTON', 'GIÀY - DÉP NAM', 'Giày nam Top Fit KRYPTON 8008005 SID66073', 'Việt Nam', 30, 469000, 50, 'Uploads/giay_nam_top_fit_krypton_8008005_4e0e.jpg', 'NAM'),
(14, 'Thắt lưng nam da đầu', 'THẮT LƯNG - DÂY NỊT NAM', 'Thắt lưng nam da đầu tỳ 282 thời trang SID55214', 'Việt Nam', 24, 498000, 50, 'Uploads/that_lung_nam_da_dau_ty_282_thoi_trang_63a4.jpg', 'NAM'),
(15, 'Thắt lưng da bò nam', 'THẮT LƯNG - DÂY NỊT NAM', 'Thắt lưng da bò nam 280 sang trọng SID55061', 'Việt Nam', 54, 498000, 50, 'Uploads/that_lung_da_bo_nam_280_sang_trong_405f.jpg', 'NAM'),
(16, 'Vớ nam', 'PHỤ KIỆN NAM', 'Combo 5 vớ nam phối bo thời trang SID56321', 'Việt Nam', 300, 200000, 50, 'Uploads/combo_5_vo_nam_phoi_bo_thoi_trang_5362.jpg', 'NAM'),
(17, 'Vòng tay Grannat', 'PHỤ KIỆN NAM', 'Vòng tay Grannat 6ly đẹp mắt SID63592', 'Việt Nam', 36, 400000, 50, 'Uploads/vong_tay_grannat_6ly_dep_mat_4c95.jpg', 'NAM'),
(18, 'Đồng hồ nam Curren Chronometer', 'ĐỒNG HỒ NAM', 'Đồng hồ nam Curren Chronometer 8125 dây da SID58649', 'Việt Nam', 40, 960000, 50, 'Uploads/dong_ho_nam_curren_chronometer_8125_day_da_944e.jpg', 'NAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hang` (`id_don_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD CONSTRAINT `ct_don_hang_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
