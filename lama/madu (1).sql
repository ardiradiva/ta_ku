-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2022 pada 10.56
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL DEFAULT 0,
  `id_admin` int(11) NOT NULL,
  `rasa` int(11) NOT NULL,
  `aroma` int(11) NOT NULL,
  `warna` int(11) NOT NULL,
  `aksesibilitas` int(11) NOT NULL,
  `packaging` int(11) NOT NULL,
  `konsistensi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `fleksibilitas` int(11) NOT NULL,
  `garansi` int(11) NOT NULL,
  `jarak` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `legalitas` int(11) NOT NULL,
  `manajerial` int(11) NOT NULL,
  `komunikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_admin`, `rasa`, `aroma`, `warna`, `aksesibilitas`, `packaging`, `konsistensi`, `harga`, `fleksibilitas`, `garansi`, `jarak`, `lokasi`, `legalitas`, `manajerial`, `komunikasi`) VALUES
(1, 1, 5, 4, 4, 3, 4, 4, 5, 4, 4, 5, 4, 5, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `rasa` int(11) NOT NULL,
  `aroma` int(11) NOT NULL,
  `warna` int(11) NOT NULL,
  `aksesibilitas` int(11) NOT NULL,
  `packaging` int(11) NOT NULL,
  `konsistensi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `fleksibilitas` int(11) NOT NULL,
  `garansi` int(11) NOT NULL,
  `jarak` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `legalitas` int(11) NOT NULL,
  `manajerial` int(11) NOT NULL,
  `komunikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_supplier`, `id_users`, `tahun`, `periode`, `rasa`, `aroma`, `warna`, `aksesibilitas`, `packaging`, `konsistensi`, `harga`, `fleksibilitas`, `garansi`, `jarak`, `lokasi`, `legalitas`, `manajerial`, `komunikasi`) VALUES
(1, 1, 1, 2022, 2, 4, 4, 3, 4, 1, 5, 3, 4, 1, 4, 2, 1, 4, 1),
(2, 2, 1, 2022, 1, 3, 4, 2, 4, 2, 3, 3, 2, 2, 4, 4, 4, 4, 3),
(7, 3, 1, 2022, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `hp`, `id_admin`) VALUES
(1, 'CV Supplier A', 'Mojo, Kediri', '0813445678099', 1),
(2, 'CV Supplier B', 'Sidoarjo', '0813445678088', 1),
(3, 'CV Supplier C', 'Pare, Kediri', '081436098765', 1);

--
-- Trigger `supplier`
--
DELIMITER $$
CREATE TRIGGER `hapus_nilai` AFTER DELETE ON `supplier` FOR EACH ROW DELETE from nilai where id_supplier=OLD.id_supplier
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_nilai` AFTER INSERT ON `supplier` FOR EACH ROW insert into nilai(id_supplier) values(NEW.id_supplier)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`) VALUES
(1, 'user1', 'user1', 'user1'),
(2, 'user2', 'user2', 'user2'),
(3, 'user3', 'user3', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_bobot` (`id_bobot`),
  ADD KEY `id_admin_bobot` (`id_admin`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
