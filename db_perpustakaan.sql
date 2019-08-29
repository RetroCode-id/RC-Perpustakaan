-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 03:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `no_buku` varchar(6) NOT NULL,
  `judul_buku` varchar(40) NOT NULL,
  `pengarang` varchar(20) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `status` enum('dipinjam','belum dipinjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`no_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `status`) VALUES
('091234', 'Tenki No Ko', 'redwims', 'kadokawa', '2019-08-21', 'dipinjam'),
('091286', 'boku no hero ', 'Oda', 'shonen jump', '2019-08-16', 'dipinjam'),
('092368', 'magi shinbad no bouken', 'shinbad', 'shonen jump', '1993-11-15', 'dipinjam'),
('135672', 'horimiya', 'hero', 'jump comic', '2011-08-17', 'belum dipinjam'),
('156234', 'shokugeki no souma', 'yukihira souma', 'shonen jump', '2004-04-20', 'dipinjam'),
('182901', 'Kimi No Nawa', 'orochi', 'giga jump', '2019-08-21', 'belum dipinjam'),
('33678', 'one ', 'oda', 'shonen jump', '2019-08-04', 'dipinjam'),
('567891', 'fire brigade of flames', 'kusakabe shinra', 'shonen jump', '2016-06-14', 'dipinjam'),
('666666', 'hozuki no reitetsu', 'enma', 'jigoku', '0006-06-06', 'belum dipinjam'),
('670132', 'gate', 'itami youji', 'shonen jump', '2019-08-24', 'dipinjam'),
('730923', 'naruto', 'kisimoto', 'shonen jump', '2001-10-10', 'dipinjam'),
('986570', 'harry porter', 'harry', 'erlangga', '1993-02-10', 'belum dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$3l7t/3Lnk6RA7G72gAMq4unz1s8do1hzNyWWT.Rx/5xjGsQZOlT.i'),
(4, 'user', '$2y$10$e1ltN.X3mmw.8bfpQ.eEy.kcuw3R1NqBZecGBf7XiBXwg.QucOCP6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjam`
--

CREATE TABLE `tb_peminjam` (
  `no_pinjam` int(11) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `no_buku` varchar(6) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_wajib_kembali` date NOT NULL,
  `tgl_telah_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`no_pinjam`, `nis`, `no_buku`, `tgl_pinjam`, `tgl_wajib_kembali`, `tgl_telah_kembali`) VALUES
(2, '809276', '33678', '2019-08-04', '2019-08-13', '2019-08-09'),
(3, '190823', '33678', '2019-08-21', '2019-08-28', '2019-08-10'),
(5, '809276', '666666', '2019-08-23', '2019-12-12', '2019-08-07'),
(6, '190823', '091234', '2019-08-23', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(6) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` enum('laki laki','perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `jenis_kelamin`, `alamat`) VALUES
('190823', 'rehan adi saputra', 'laki laki', 'tulangan gang 20'),
('809276', 'ricky damar saputra', 'laki laki', 'sirapan rt12 rw 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`no_buku`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `nis` (`nis`),
  ADD KEY `no_buku` (`no_buku`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  MODIFY `no_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD CONSTRAINT `tb_peminjam_ibfk_1` FOREIGN KEY (`no_buku`) REFERENCES `tb_buku` (`no_buku`) ON DELETE NO ACTION,
  ADD CONSTRAINT `tb_peminjam_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
