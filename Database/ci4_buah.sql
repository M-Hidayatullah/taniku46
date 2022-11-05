-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2021 pada 08.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_buah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password`, `level`) VALUES
(21, 'Admin', 'admin@gmail.com', '$2y$10$bM1//ZrPm28ePjGwor/eTutcVuEuIKRmo/zwF0kcNLCRyNInmox6W', 'admin'),
(22, 'Sobirin', 'sobirin@gmail.com', '$2y$10$ht6kWRo0QS7mFI6VFabX7e8l.H3hCSyZBxE1rCSmT2qrSMppZ3C3e', 'admin'),
(23, 'Coba_Admin', 'admincoba123@gmail.com', '$2y$10$vkMsl/0OpiPudYBjwxu/XO3Ocu/mJiTrN9T7QixNEUEwYc/VUrtqy', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(20, 'Buahh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(13, 'Lembuak', 5000),
(14, 'Gunung Sari', 7000),
(15, 'Kediri', 7000),
(16, 'Selagalas', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `telpon_pelanggan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telpon_pelanggan`, `alamat`, `level`) VALUES
(26, 'sobirin', 'sobirin19@gmail.com', '$2y$10$95bZJUmMRKkIAPMo/ENKYO/i/rE3N67OKvS1lVjEGxpiEDL0Q1KH2', '081936262918', 'Jati Mekar', 'pelanggan'),
(27, 'wahyu', 'wahyu@gmail.com', '$2y$10$P4NeqO.darcub8GxbiaxNupm8S1R.aE3.hLQypH5Pwfs11kYh9eK6', '087864059577', 'Desa Lajut', 'pelanggan'),
(29, 'kk', 'kk@gmail.com', '$2y$10$4mMo9zGLMfvuolX4lhI9J.B5Feqw36dUavh/iwT/2Kogz6wn4wRD6', '9999', 'kghjg', 'pelanggan'),
(30, 'Coba_Pelanggan', 'pelanggancoba123@gmail.com', '$2y$10$SwPz243WRHvpQNF167r/Q.Y7VKa.WBMZOeou3LB9S5tCWELNW7XR.', '081936262918', 'Kecamatan Lingsar', 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_invoice` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama_pem` varchar(150) NOT NULL,
  `telpon` int(11) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `alamat` text NOT NULL,
  `metode_pembayaran` varchar(200) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `aksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_invoice`, `id_pembeli`, `nama_pem`, `telpon`, `tgl_beli`, `batas_bayar`, `alamat`, `metode_pembayaran`, `bukti_transfer`, `aksi`) VALUES
(164, 30, 'Coba_Pelanggan', 2147483647, '2021-07-28 11:23:31', '2021-07-30 11:23:31', 'Kecamatan Lingsar', 'cod', '', 1),
(167, 26, 'sobirin', 2147483647, '2021-07-28 11:33:18', '2021-07-30 11:33:18', 'Jati Mekar', 'transfer', '1628097431_6a80213d90ace5eb187a.jpg', 1),
(168, 26, 'sobirin', 2147483647, '2021-08-04 12:17:44', '2021-08-06 12:17:44', 'Jati Mekar', 'transfer', '1628097475_569b8f813c8a2465c195.jpg', 0),
(169, 26, 'sobirin', 2147483647, '2021-08-04 12:18:22', '2021-08-06 12:18:22', 'Jati Mekar', 'cod', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_invoice`, `id_produk`, `tgl_pembelian`, `harga`, `jumlah`, `id_ongkir`, `total_pembelian`) VALUES
(216, 164, 95, '2021-06-28', 250000, 1, 14, 250000),
(219, 167, 96, '2021-07-28', 14000, 1, 13, 14000),
(220, 168, 95, '2021-08-04', 250000, 1, 14, 250000),
(221, 169, 97, '2021-08-04', 8000, 1, 14, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_suplier` int(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `id_suplier`, `harga_beli`, `harga_jual`, `berat`, `foto_produk`, `deskripsi`) VALUES
(91, 'Anggur', 20, 9, 150000, 20000, '9', '1623583643_06f49c39f30a805f758a.jpg', '<p>Anggur Hitam Impor</p>'),
(95, 'Melon', 20, 14, 150000, 250000, '195', '1624893123_e7ede13ce3570fcfa10e.jpg', '<p>Melong Madu Zakaria</p>'),
(96, 'Jeruk', 20, 9, 10000, 14000, '198', '1626087704_2e91ee5aaa464feb3268.png', 'Jeruk Madu'),
(97, 'Jambu biji', 20, 15, 5000, 8000, '44', '1626087765_43f022f278010f305ad0.jpg', '<p>Jambu biji Super</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `review` varchar(150) NOT NULL,
  `tanggal_review` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `id_pembelian`, `id_pelanggan`, `title`, `review`, `tanggal_review`) VALUES
(2, 205, 26, 'Store 19', 'hhh', '2021-06-21'),
(3, 91, 26, 'Store 19', 'hhh', '2021-06-21'),
(4, 94, 26, 'Store 19', 'hjkfghjk', '2021-06-21'),
(5, 91, 26, 'Store 19', 'Admin sangat Ramah', '2021-06-21'),
(6, 209, 26, 'Store 19', 'tess asdsa', '2021-06-21'),
(7, 206, 27, 'Store 19', 'Pengiriman lama', '2021-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `telpon` varchar(200) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `produk`, `telpon`, `email`, `password`, `level`, `alamat`) VALUES
(9, 'Haikal ', 'Anggur', '', 'haikal@gmail.com', '$2y$10$95bZJUmMRKkIAPMo/ENKYO/i/rE3N67OKvS1lVjEGxpiEDL0Q1KH2', 'supplier', ''),
(14, 'Zakaria', 'Melon', '098765434567', 'Zakaria@gmail.com', '$2y$10$A4oUI2qY97LAm1MxwXa78ubMIdoTDx/IeO8lf9XJK3Lm2Jan15Qru', 'supplier', 'Desa Lajut'),
(15, 'Supplier_Coba', 'Manggis', '098765434567', 'cobasupplier123@gmail.com', '$2y$10$8ArHej1ynNFWMBCuIU/KZu9.ZxwbsYex9I13u2RFSxGXNYj8t20Aq', 'supplier', 'Jati Mekar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id_temp`, `id_produk`, `id_pelanggan`, `qty`) VALUES
(32, 83, 26, 2),
(33, 81, 26, 1),
(34, 86, 26, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
