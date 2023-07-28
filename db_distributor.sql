-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2023 at 07:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_distributor`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat_masuk`
--

CREATE TABLE `detail_obat_masuk` (
  `no_faktur` int(11) NOT NULL,
  `tgl_transaksi` int(11) DEFAULT NULL,
  `nama_supplier` varchar(180) DEFAULT NULL,
  `kode_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `pegawai` varchar(255) DEFAULT NULL,
  `laba` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_obat_masuk`
--

INSERT INTO `detail_obat_masuk` (`no_faktur`, `tgl_transaksi`, `nama_supplier`, `kode_obat`, `nama_obat`, `harga_beli`, `jumlah_beli`, `sub_total`, `pegawai`, `laba`) VALUES
(6, 2023, 'Irwansyah', 10, 'Paracetamols', 20000, 20000, 20000, 'Admin', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_faktur` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` bigint(20) NOT NULL,
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `jumlah_beli` bigint(20) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `laba` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`no_faktur`, `tgl_penjualan`, `id_pelanggan`, `nama_pelanggan`, `kode_obat`, `nama_obat`, `harga_jual`, `jumlah_beli`, `sub_total`, `laba`) VALUES
(16, '2023-07-27', 1, 0, 1, 'Amoxilyn', 5000, 20000, 100000000, 60000000),
(17, '2023-07-27', 1, 0, 1, 'Amoxilyn', 5000, 3000, 15000000, 9000000),
(18, '2023-07-27', 1, 0, 1, 'Amoxilyn', 5000, 3000, 15000000, 9000000),
(19, '2023-07-27', 1, 0, 1, 'Amoxilyn', 5000, 20000, 100000000, 60000000),
(20, '2023-09-14', 1, 0, 1, 'Amoxilyn', 5000, 200, 1000000, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id_jenis_obat` int(11) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id_jenis_obat`, `jenis_obat`) VALUES
(1, 'Kapsul'),
(2, 'Cair'),
(4, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `no_faktur` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `jenis_transaksi` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `pemasukan` bigint(20) DEFAULT NULL,
  `pengeluaran` bigint(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jenis_obat` varchar(255) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_jual` bigint(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `stok_min` int(11) DEFAULT NULL,
  `laba` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `satuan`, `jenis_obat`, `harga_beli`, `harga_jual`, `stok`, `stok_min`, `laba`) VALUES
(1, 'Amoxilyn', 'pack', 'Kapsul', 2000, 5000, 99, 60, 3000),
(4, 'Paracetamol', 'pack', 'Tablet', 7000, 8000, 999, 60, 1000),
(10, 'Paracetamols', 'kg', 'Kapsul', 20000, 4000, 1, 60, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `no_faktur` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `tunai` bigint(20) NOT NULL,
  `kembalian` bigint(20) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_masuk`
--

INSERT INTO `obat_masuk` (`no_faktur`, `id_supplier`, `tgl_transaksi`, `total_harga`, `tunai`, `kembalian`, `pegawai`) VALUES
(6, 2, '2023-07-20', 20000, 20009, 9, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `username` varchar(180) NOT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelompok_usia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `no_telepon`, `alamat`, `kelompok_usia`) VALUES
(1, 'Iis', 'te1', '083231231', 'Cirebon', '25'),
(2, 'Widya', 'te2', NULL, NULL, NULL),
(4, 'yuyu', 'yuyu', '081028102', 'yuyu', '21');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE `retur_pembelian` (
  `no_retur` int(11) NOT NULL,
  `tgl_retur` date DEFAULT NULL,
  `no_faktor` int(11) DEFAULT NULL,
  `kode_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `qty_retur` int(11) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

CREATE TABLE `retur_penjualan` (
  `no_retur` int(11) NOT NULL,
  `tgl_retur` date NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `kode_satuan` int(11) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`kode_satuan`, `satuan`) VALUES
(3, 'kg'),
(4, 'pack'),
(5, 'meter');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `jenis_kelamin`, `contact_person`, `no_telepon`) VALUES
(2, 'Irwansyah', 'Cirebon', 'laki-laki', '083825287989', '083825287989');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `no_faktur` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_obat` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total` bigint(20) NOT NULL,
  `tunai` bigint(20) NOT NULL,
  `kembalian` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`no_faktur`, `id_pelanggan`, `kode_obat`, `tgl_penjualan`, `total`, `tunai`, `kembalian`, `total_harga`, `pegawai`) VALUES
(16, 1, 1, '2023-07-27', 20000, 200000000, 100000000, 100000000, 'administrator'),
(17, 2, 1, '2023-08-24', 3000, 20000000, 5000000, 15000000, 'administrator'),
(18, 1, 1, '2023-07-18', 3000, 200000000, 185000000, 15000000, 'administrator'),
(19, 1, 1, '2023-08-24', 20000, 200000000, 100000000, 100000000, 'administrator'),
(20, 1, 1, '2023-09-14', 200, 7000, -993000, 1000000, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'Telemarketing 1', 'te1', 'a7c2a9cd39a5a7b2444830d3f6a82c19', 'user'),
(5, 'Telemarketing 2', 'te2', 'eeaab52fffc59c6649c885f783a8a001', 'user'),
(6, 'yuyu', 'yuyu', 'f34d07b202eaeadf913468e95d7fcb86', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_obat_masuk`
--
ALTER TABLE `detail_obat_masuk`
  ADD UNIQUE KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD UNIQUE KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`no_retur`),
  ADD KEY `no_faktor` (`no_faktor`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`no_retur`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id_jenis_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kode_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  MODIFY `no_retur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  MODIFY `no_retur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `kode_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi_penjualan` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
