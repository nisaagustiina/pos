-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2022 pada 15.53
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`, `created`, `updated`) VALUES
(1, 'Riski', 'L', '08123478909', 'Andir\r\n', '2022-01-08 13:51:33', '2022-01-11 05:08:02'),
(2, 'Yani', 'P', '08123456789', 'lebakmuncang\r\n', '2022-01-08 13:52:23', '2022-01-08 07:58:43'),
(3, 'Cahyo', 'L', '08123456709', 'ciwidey', '2022-01-08 13:52:41', '2022-01-11 05:07:49'),
(4, 'Santi', 'P', '022334567811', 'Pasjam', '2022-01-08 13:52:58', '2022-01-11 05:07:56'),
(5, 'Vasha', 'L', '08123456789', 'Soreang\r\n', '2022-01-08 13:53:24', '2022-01-08 07:58:12'),
(8, 'Cakra', 'L', '-', 'Soreang', '2022-01-08 14:13:47', '2022-01-11 04:56:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `id_category` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`id_category`, `nama`, `created`, `updated`) VALUES
(1, 'ATK', '2022-01-08 14:30:38', '2022-01-08 08:57:45'),
(2, 'Sembako', '2022-01-08 14:30:49', '2022-01-08 09:05:13'),
(3, 'Sayuran', '2022-01-08 14:30:58', NULL),
(4, 'Buah - Buahan', '2022-01-08 14:31:04', '2022-01-08 09:07:43'),
(5, 'Frozen Food', '2022-01-08 14:31:20', NULL),
(6, 'Snack', '2022-01-08 14:31:27', '2022-01-12 11:34:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `id_item` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`id_item`, `barcode`, `nama`, `id_category`, `id_unit`, `harga`, `stok`, `image`, `created`, `updated`) VALUES
(1, 'BR006', 'Buku Tulis', 1, 3, 2000, 0, 'item-220111-3f8f77e4f1.jpg', '2022-01-08 17:28:52', '2022-01-11 05:03:04'),
(2, 'BR007', 'Pensil', 1, 3, 1000, 0, 'item-220111-54b498b802.jpg', '2022-01-08 17:29:12', '2022-01-11 05:03:33'),
(3, 'BR001', 'Beras', 2, 1, 12000, 50, 'item-220111-7313947e76.png', '2022-01-08 17:29:31', '2022-01-11 04:57:57'),
(8, 'BR003', 'Gula Pasir', 2, 2, 3000, 5, 'item-220111-84ee3f0e70.jpg', '2022-01-08 17:54:10', '2022-01-11 04:58:40'),
(11, 'BR009', 'Ale-ale', 6, 3, 1000, 0, 'item-220111-a9d70c9abc.jpg', '2022-01-08 21:32:39', '2022-01-11 05:05:27'),
(12, 'BR008', 'oreo', 6, 3, 2000, 8, 'item-220111-95ea4833e6.jpg', '2022-01-08 21:33:58', '2022-01-11 05:04:24'),
(13, 'BR002', 'Telur', 2, 1, 25000, 50, 'item-220111-d3d56c7fce.jpg', '2022-01-08 21:39:15', '2022-01-11 04:58:19'),
(20, 'BR004', 'Minyak Goreng', 2, 5, 12000, 10, 'item-220111-a96f9f1244.jpg', '2022-01-11 11:00:06', NULL),
(21, 'BR005', 'Mie Instant', 2, 3, 3000, 5, 'item-220111-ddb8b90e20.jpg', '2022-01-11 11:01:22', NULL),
(22, 'BR010', 'Kopi Kapal Api', 2, 3, 2000, 70, 'item-220111-2d188bad86.jpg', '2022-01-11 11:05:58', NULL),
(23, 'BR011', 'Garam', 2, 2, 2000, 0, 'item-220111-0ebc04305c.jpg', '2022-01-11 11:07:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `id_unit` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`id_unit`, `nama`, `created`, `updated`) VALUES
(1, 'kg', '2022-01-08 15:18:37', NULL),
(2, 'ons', '2022-01-08 15:18:45', NULL),
(3, 'pcs', '2022-01-08 15:18:51', NULL),
(5, 'liter', '2022-01-08 21:43:39', NULL),
(6, 'pak', '2022-01-08 21:43:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `no_telp`, `alamat`, `deskripsi`, `created`, `updated`) VALUES
(1, 'Toko A', '021345678', 'Jakarta', 'Toko ATK ', '2022-01-08 09:45:08', '2022-01-12 08:20:43'),
(2, 'Toko B', '022897564', 'Soreang', 'Toko Sembako', '2022-01-08 09:45:08', NULL),
(3, 'Toko C', '087634567899', 'Pasirjambu', 'Toko Frozen Food', '2022-01-08 09:47:12', '2022-01-11 04:55:27'),
(4, 'Toko D', '081234567801', 'Kuningan', NULL, '2022-01-08 09:47:54', '2022-01-11 04:55:40'),
(6, 'Toko E', '087623456734', 'Kutawaringin', NULL, '2022-01-08 12:10:46', '2022-01-11 04:55:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `id_sale` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `final_harga` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`id_sale`, `invoice`, `id_customer`, `total_harga`, `diskon`, `final_harga`, `cash`, `kembalian`, `note`, `date`, `id_user`, `created`) VALUES
(1, 'MP2201120001', 3, 40000, 5000, 35000, 50000, 15000, '', '2022-01-12', 1, '2022-01-12 12:58:36'),
(2, 'MP2201130001', 8, 50000, 0, 50000, 50000, 0, '', '2022-01-13', 1, '2022-01-12 13:38:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `id_stock` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`id_stock`, `id_item`, `type`, `detail`, `id_supplier`, `qty`, `date`, `created`, `id_user`) VALUES
(10, 3, 'in', 'kulakan', 2, 50, '2022-01-11', '2022-01-11 18:12:30', 1),
(11, 13, 'in', 'kg', 2, 50, '2022-01-11', '2022-01-11 18:13:04', 1),
(12, 8, 'in', '', NULL, 5, '2022-01-11', '2022-01-11 18:40:41', 1),
(13, 20, 'in', 'kulakan', 2, 10, '2022-01-11', '2022-01-11 18:40:57', 1),
(14, 21, 'in', 'dus', 2, 5, '2022-01-11', '2022-01-11 18:41:18', 1),
(15, 12, 'in', '', NULL, 8, '2022-01-11', '2022-01-11 18:41:39', 1),
(17, 22, 'in', '', NULL, 80, '2022-01-12', '2022-01-12 08:33:52', 1),
(18, 22, 'out', 'Diseduh', NULL, 10, '2022-01-12', '2022-01-12 15:57:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `alamat` text NOT NULL,
  `level` int(11) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Nisa', 'Andir', 1),
(2, 'kasir 1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Kasir 1', 'Ciwidey', 2),
(4, 'kasir 3', 'ad959ec08dbff20da608a4b5cdbe92f21c55e84d', 'Reffan', 'Pasirjambu', 2),
(6, 'kasir 2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'kasir 2', 'Andir', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`id_sale`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `t_stock_ibfk_1` (`id_item`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `p_category` (`id_category`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `p_unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  ADD CONSTRAINT `t_sale_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `p_item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
