-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 11:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2


CREATE Database Giziku;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang_flutter_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_nama` varchar(25) DEFAULT NULL,
  `menu_harga` varchar(10) DEFAULT NULL,
  `menu_ket` varchar(50) DEFAULT NULL,
  `menu_gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_menu` (`menu_id`, `menu_nama`, `menu_harga`, `menu_ket`, `menu_gambar`) VALUES
(11, 'Menu 1', '10000', 'keterangan 1','https://cf.shopee.co.id/file/7efaa4e4eea8193be6045a513691cc06'),
(13, 'Menu 2', '14000', 'keterangan 2','https://ecs7.tokopedia.net/img/cache/700/product-1/2017/1/14/14800382/14800382_1c46b3e8-52d3-4cd2-b3b2-bbad08e38bc3_750_750.jpg'),
(14, 'Menu 3', '22000', 'keterangan 3','https://ecs7.tokopedia.net/img/cache/700/product-1/2017/4/12/1587433/1587433_258db83e-091e-40e4-b631-39b9c3425a7d.jpg'),
(16, 'Menu 4', '24000', 'keterangan 4','https://s0.bukalapak.com/img/0120771353/w-1000/KURSI_TAMU_MINIMALIS_KSJ9___MEBEL_JEPARA.jpg'),
(18, 'Menu 5', '12000', 'keterangan 5','https://cf.shopee.co.id/file/7d698e0c1ab46821c17608720ceaae73'),
(19, 'Menu 6', '11000', 'keterangan 6','https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//108/MTA-3387879/canon_fotocopy-canon-ir-1435-if_full08.jpg'),
(20, 'Menu 7', '50000', 'keterangan 7','https://cnet3.cbsistatic.com/img/XWfLJTcPLhV50Y4fTumC-ClXvGg=/868x488/2018/06/19/c4819309-41c7-4d8f-9b0d-47c9082858fa/06-hl-l2395dw-compact-monochrome-laser-printer.jpg'),
(21, 'Menu 8', '18000', 'keterangan 8','https://cnet3.cbsistatic.com/img/y_MbP2XfWPAJg4BtUPLvNSL4Fns=/868x488/2018/06/19/a02b3cf9-0a33-4186-9bcb-f6577c47f4c2/09-hl-l2395dw-compact-monochrome-laser-printer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(25) NOT NULL,
  `user_nip` int(25) NOT NULL,
  `user_jabatan` varchar(35) NOT NULL,
  `user_unit_kerja` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_hp` varchar(35) NOT NULL,
  `user_password` text NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nama`,`user_nip`,`user_jabatan`, `user_unit_kerja`,`user_email`, `user_hp`, `user_password`, `user_status`) VALUES
(1, 'Asad', '123467890','bos','perawatan','alhamasy10@gmail.com', '081311458682', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'humam','123467890','bos','perawatan', 'humam@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'hazim', '123467890','bos','perawatan','hazim@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'ahmad','123467890','bos','perawatan', 'ahmad@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'fiqri', '123467890','bos','perawatan','fiqri@gmail.com', '0812345678', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'sulthan','123467890','bos','perawatan', 'sulthanalihsan@gmail.com', '09808293412', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(8, 'Muhammad Sulthan Al Ihsan', '123467890','bos','perawatan','sulthanalihsan5@gmail.com', '08971418545', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(9, 'sulthan1', '123467890','bos','perawatan','sulthan55@gmail.com', '09780980', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(10, 'sulthan1', '123467890','bos','perawatan','sulthan67@gmail.com', '09780980', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(11, 'sulthan1', '123467890','bos','perawatan','sulthan77@gmail.com', '09780980', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(12, 'yjj','123467890','bos','perawatan', 'ujj', '666', 'e61e7de603852182385da5e907b4b232', 1),
(13, 'sulthan','123467890','bos','perawatan', 'sulthan555@gmail.com', '08971418545', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(14, 'humam', '123467890','bos','perawatan','jakhumam@gmail.com', '321', 'caf1a3dfb505ffed0d024130f58c5cfa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
