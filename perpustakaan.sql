-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2021 pada 07.53
-- Versi server: 8.0.11
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `email` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(125) NOT NULL,
  `tgl_bergabung` varchar(125) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `role_id`, `nama_admin`, `email`, `foto`, `tgl_bergabung`, `password`) VALUES
(10, 1, 'Dheo Apriansyah', 'admin@gmail.com', 'default.png', '1609660815', '$2y$10$IIf3x71UC7zszmUvLcJDxe09Vw5nDveYG86r81JuYyWm9WgbpMnyi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nama_lengkap` varchar(195) NOT NULL,
  `jenis_kelamin` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(25) NOT NULL,
  `no_telp` int(25) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile` varchar(125) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `email`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `password`, `role_id`, `profile`, `tanggal_dibuat`) VALUES
(2, 'sakura@gmail.com', 'Sakura', 'Perempuan', 'Bandung', '1996-04-04', 2147483647, 'Bandung', '$2y$10$dmHUs44fIz3.5DodeqAjDe/mf5YtahJZIJWDGNTbwJiemwQ3Jq33G', 2, 'default.png', 1609582886);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(35) NOT NULL,
  `thn_terbit` date NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `status_buku` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul_buku`, `pengarang`, `thn_terbit`, `penerbit`, `isbn`, `jumlah_buku`, `lokasi`, `gambar`, `tgl_input`, `status_buku`) VALUES
(3, 2, 'Mahir  Berhitung dan Mahir Mewarnai', 'Akhmad Rahmat', '2014-03-03', 'CV.Indo Kreasi', '7623447342', 6, 'Rak 3', 'gambar1539746653.jpg', '2018-07-25', '1'),
(4, 1, 'Dasar Dasar Fisika', 'Kurnia Sandi', '2013-04-04', 'Wacana Ria', '233214414', 4, 'Rak 2', 'gambar1539746772.jpg', '2018-07-24', '0'),
(6, 4, 'Public Speaking', 'Pambudi Prasetyo', '2015-06-06', 'Aldi Pustaka', '843594759', 8, 'Rak 2', 'gambar1539747050.jpg', '2019-01-24', '1'),
(7, 3, 'Trik SQL', 'Ahdim Makaren', '2014-07-07', 'Wacana Ria', '54234762', 5, 'Rak 1', 'gambar1539747068.jpg', '2018-03-14', '0'),
(8, 6, 'Kemurnian Agama', 'Pambudi Prasetyo', '2014-08-08', 'Aldi Pustaka', '980958607', 4, 'Rak 3', 'gambar1539747079.jpg', '2018-07-24', '1'),
(9, 1, 'Mikrokontroler', 'Ahdim Makaren', '2012-09-09', 'Wacana Ria', '12121314', 11, 'Rak 2', 'gambar1539747096.jpg', '2018-04-11', '0'),
(10, 1, '24 Jam Belajar FrameWork', 'Rudi Hartono', '2017-03-02', 'Unjung Pena', '12345345', 10, 'Rak 2', 'gambar1539747110.jpg', '0000-00-00', '1'),
(11, 2, 'JavaScript uncover', 'Andre Pratama', '2015-03-12', 'Duniailkom', '9087654', 7, 'Rak 1', 'gambar1539747128.jpg', '0000-00-00', '1'),
(12, 3, 'Pemrograman dan Hack Android untuk pemula dan adva', 'Edy Winarno ST, M.eng, Ali Zaki, Sm', '2016-09-23', 'Elex Media Komputindo', '4234252', 7, 'Rak 1', 'gambar1539747149.jpg', '2018-07-25', '1'),
(16, 3, 'VB .Net', 'Azka', '2018-10-01', 'Elex Media', '12345678', 8, 'Rak 1', 'gambar1539747329.png', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_pinjam` varchar(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `denda` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_pinjam`, `id_buku`, `denda`) VALUES
('PJ001', 16, 10000),
('PJ001', 6, 10000),
('PJ002', 2, 0),
('PJ005', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sains'),
(2, 'Hobby'),
(3, 'Komputer'),
(4, 'Komunikasi'),
(5, 'Hukum'),
(6, 'Agama'),
(7, 'Populer'),
(8, 'Bahasa'),
(9, 'komik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` varchar(35) NOT NULL,
  `total_denda` double NOT NULL,
  `status_peminjaman` varchar(25) NOT NULL,
  `status_pengembalian` varchar(25) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
