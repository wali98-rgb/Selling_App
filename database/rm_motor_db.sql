-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 02.12
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rm_motor_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `id_motor` int(3) NOT NULL,
  `foto_motor` varchar(255) NOT NULL,
  `merek_motor` varchar(50) NOT NULL,
  `slug_motor` varchar(50) NOT NULL,
  `stok_motor` int(10) NOT NULL,
  `harga_motor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`id_motor`, `foto_motor`, `merek_motor`, `slug_motor`, `stok_motor`, `harga_motor`) VALUES
(2, 'vegar.jpeg', 'Vega R', 'vega-r', 6, 10000000),
(3, 'beat_2016.jpeg', 'Beat 2016', 'beat-2016', 29, 16000000),
(4, 'beatstreet.jpeg', 'BeatStreet', 'beatstreet', 40, 18000000),
(5, 'cbr_150_repsol.jpeg', 'CBR 150 Repsol', 'cbr-150-repsol', 24, 26000000),
(6, 'cbr_250r.jpeg', 'CBR 250R', 'cbr-250r', 49, 35000000),
(7, 'honda_beat.jpeg', 'Honda Beat', 'honda-beat', 69, 14000000),
(8, 'mio_2013.jpeg', 'Mio 2013', 'mio-2013', 30, 12000000),
(9, 'mio_gt.jpeg', 'Mio GT', 'mio-gt', 12, 20000000),
(10, 'ninja_400abs.jpeg', 'Ninja 400 ABS', 'ninja-400-abs', 13, 40000000),
(11, 'ninja_1000abs.jpeg', 'Ninja 1000 ABS', 'ninja-1000-abs', 20, 46000000),
(12, 'ninja_rr_2014.jpeg', 'Ninja RR 2014', 'ninja-rr-2014', 9, 50000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `id_pembeli` int(3) NOT NULL,
  `id_motor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pembeli` int(3) NOT NULL,
  `nama_pembeli` varchar(40) NOT NULL,
  `password` varchar(150) NOT NULL,
  `alamat` longtext NOT NULL,
  `j_kelamin` varchar(9) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `role` enum('admin','pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pembeli`, `nama_pembeli`, `password`, `alamat`, `j_kelamin`, `pekerjaan`, `role`) VALUES
(1, 'Admin', '0192023a7bbd73250516f069df18b500', 'Bandung', 'Laki-laki', 'CEO', 'admin'),
(2, 'Budi', '6ad14ba9986e3615423dfca256d04e3f', 'Banjaran', 'Laki-laki', 'Mahasiswa', 'pembeli'),
(3, 'Dapit', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bandung', 'Laki-laki', 'Dosen', 'pembeli'),
(4, 'Mia', 'fb46c4e4dcdf1d5bfccea6671f9dfae9', 'Bandung', 'Perempuan', 'SPG', 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_pembeli` (`id_pembeli`,`id_motor`),
  ADD KEY `id_motor` (`id_motor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_motor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pembeli` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_motor`) REFERENCES `katalog` (`id_motor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
