-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 17.43
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `pass`) VALUES
('1', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `pass`, `jurusan`) VALUES
(1, 'Made Landiva', '2201010591', '2201010591', 'ti-manajemen data dan informasi'),
(2, 'Alit Pranadita', '2201010559', '2201010559', 'ti-manajemen data dan informasi'),
(6, 'Putra Lanyink', '2201010610', '2201010610', 'ti-manajemen data dan informasi'),
(10, 'Kevin Sanjaya', '2201010582', '2201010582', 'ti-manajemen data dan informasi'),
(11, 'Komang Deni', '2201010610', '2201010610', 'sistem informasi'),
(13, 'Made Mayada', '2201010581', '2201010581', 'ti-manajemen data dan informasi'),
(17, 'I Komang Alit Pranadita', '2201010559', '2201010559', 'ti-manajemen data dan informasi'),
(19, 'Putu Adi Sanjaya', '2201010557', '2201010557', 'ti-manajemen data dan informasi'),
(20, 'I Nyoman Darmawan s.kom', '2201010593', '2201010593', 'ti-akuntansi dan bisnis'),
(21, 'Komang Darmawan', '2201010593', '2201010593', 'ti-manajemen data dan informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(10) NOT NULL,
  `id_mahasiswa` varchar(10) NOT NULL,
  `tgl_saran` date NOT NULL,
  `isi_saran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `id_mahasiswa`, `tgl_saran`, `isi_saran`) VALUES
(21, '1', '2023-07-01', 'semoga kedepannya lab a bisa diisi ac lagi satu'),
(22, '2', '2023-07-02', 'Pc di lab H lelet, kalau bisa diganti semua biar baru'),
(23, '2', '2023-07-02', 'saran semoga tempat gym bisa dibuka untuk umum agar semua mahasiswa dapat menggunakan fasilitas gym di kampus'),
(24, '1', '2023-07-02', 'Jalan menuju parkir belakang berlubang saran saya agar segera diperbaiki atau dibuatkan jalan yang nyaman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id_saran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
