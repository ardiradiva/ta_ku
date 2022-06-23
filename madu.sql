-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2022 pada 12.09
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
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
('ADM00001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` varchar(15) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
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
('BT00001', 'ADM00001', 5, 4, 4, 3, 4, 4, 5, 4, 4, 5, 4, 5, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(15) NOT NULL,
  `id_supplier` varchar(15) NOT NULL,
  `id_users` varchar(15) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
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

INSERT INTO `nilai` (`id_nilai`, `id_supplier`, `id_users`, `tahun`, `periode`, `status`, `rasa`, `aroma`, `warna`, `aksesibilitas`, `packaging`, `konsistensi`, `harga`, `fleksibilitas`, `garansi`, `jarak`, `lokasi`, `legalitas`, `manajerial`, `komunikasi`) VALUES
('NI000001', 'SP000001', NULL, 2022, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('NI000002', 'SP000002', NULL, 2022, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('NI000003', 'SP000003', NULL, 2022, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('NI000004', 'SP000004', NULL, 2022, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_admin`, `nama`, `alamat`, `hp`) VALUES
('SP000001', 'ADM00001', 'SP 1', 'Mojo, Kediri', '0813445678098'),
('SP000002', 'ADM00001', 'SP 2', 'Campurrejo, Trenggalek', '0813445678088'),
('SP000003', 'ADM00001', 'SP A', 'Kediri', '081637609788'),
('SP000004', 'ADM00001', 'SP B', 'Kediri', '0816376097889');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`) VALUES
('US000001', 'Ardira Diva ', 'user1', '24c9e15e52afc47c225b757e7bee1f9d'),
('US000002', 'Rayka Azahra', 'user2', '7e58d63b60197ceb55a1c487989a3720');

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
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
