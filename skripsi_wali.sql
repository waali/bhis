-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2014 at 04:44 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_wali`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`) VALUES
('wali', 'e10adc3949ba59abbe56e057f20f883e', 'Wali Songo1', 'wali@gmail.com'),
('test', 'e10adc3949ba59abbe56e057f20f883e', 'Seto El', 'se@gmail.cpm'),
('walisongo', 'e10adc3949ba59abbe56e057f20f883e', 'Wali Songo', 'walisongo@gmail.com'),
('ucifausan', 'e10adc3949ba59abbe56e057f20f883e', 'Uci Fausan', 'ucifauxan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `email`, `telepon`, `pesan`, `tanggal`) VALUES
(8, 'Test Contact', 'seto.elkahfi@propanraya.com', '08989898989', 'Ini tes kontak saja ya', '2014-08-28 01:57:22'),
(7, 'Test Contact', 'member2@gmail.com', '08989898989', 'Ini tes kontak saja ya', '2014-08-28 01:56:38'),
(9, 'Test Contact', 'member2@gmail.com', '08989898989', 'Ini tes kontak saja ya', '2014-08-28 01:57:49'),
(10, 'Test Contact', 'member2@gmail.com', '08989898989', 'Ini tes kontak saja ya', '2014-08-28 01:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE IF NOT EXISTS `formulir` (
  `nomor_formulir` varchar(17) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kelas` char(1) COLLATE latin1_general_ci NOT NULL,
  `jurusan` int(1) NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kota_lahir` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tingkat` char(5) COLLATE latin1_general_ci NOT NULL,
  `hobi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `cita` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tlp` char(12) COLLATE latin1_general_ci NOT NULL,
  `ayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lunas` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nomor_formulir`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`nomor_formulir`, `nama`, `foto`, `kelas`, `jurusan`, `jenis_kelamin`, `agama`, `email`, `password`, `alamat`, `kota_lahir`, `tanggal_lahir`, `sekolah`, `tingkat`, `hobi`, `cita`, `tlp`, `ayah`, `ibu`, `pekerjaanayah`, `pekerjaanibu`, `tanggal_daftar`, `lunas`) VALUES
('FORM.14.1R.01', 'Wali ', './uploads/foto/FORM.14.1R.01-FORM.1410.1101.04-deddy.jpg', 'R', 1, 'Perempuan', 'Islam', 'wali@gmail.com', '9b0442a9a1cbb95f8291afc1a668adc0', 'Tangerang Indah\r\nBlok A 5\r\nTangerang', 'Tangerang', '1990-07-04', 'SMA N 3', 'SMA', 'Renang', 'Astronot', '', 'Ali Sadikin', 'Umi Kalsum', 'Tukang kayu', 'Ibu rumah tangga', '2014-07-24 14:33:06', 1),
('FORM.14.1E.02', 'Pevita Pearce', './uploads/foto/FORM.14.1E.02-FORM.1410.1111.03-poni.jpg', 'E', 2, 'Perempuan', 'Islam', 'pev@gmail.cpm', 'a3f77a532c5752d76f22267b15201081', 'Jakarta Raya', 'Jakarta', '1994-07-07', 'SMA N 3', 'SMA', 'Makan', 'Pramugrari', '09584754', 'Pev Sr.', 'Pearce Sr.', 'Artis', 'Artis', '2014-07-24 14:50:06', 0),
('FORM.14.2R.03', 'Seto El', './uploads/foto/FORM.14.2R.03-Google-plus-160x120.jpg', 'R', 1, 'Laki-laki', 'Islam', 'seto.elkahfi@propanraya.com', '', 'LA Boulevard', 'San Fransisco', '1989-09-01', 'SMK N 2 San Fransisco', 'SMK', 'Menari', 'Astronot', '32323223', 'Ahmad dahlan', 'Siti masruroh', 'Doktor', 'Doktor', '2014-09-04 03:20:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `judul`, `isi`) VALUES
(1, 'Selamat datang di BHIS School', '<p>Bandara Hotel Internatioanl School adalah sebuah lembaga pendidikan kepariwisataan yang berfokus untuk menghasilkan lulusan yang siap bekerja pada industri pariwisata nasional maupun internasional.</p>\r\n<p>Lulusan-lusan BHIS sudah diserap oleh industri pariwisata di dunia.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `judul`, `isi`, `gambar`, `jadwal`) VALUES
(1, 'Food and Beverages (F n B)', 'Food and beverages Mauris blandit vehicula neque. Proin consectetuer. Donec venenatis. Cras urna metus, feugiat non, consectetuer quis, pretium quis, nunc. ', 'building_150x70_02.gif', 'Senin - Jumat'),
(2, 'Kitchen', 'Kitchen Mauris blandit vehicula neque. Proin consectetuer. Donec venenatis. Cras urna metus, feugiat non, consectetuer quis, pretium quis, nunc. ', 'building_150x70_03.gif', 'Selasa - Kamis');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'Kuliah Umum', 'Mauris blandit vehicula neque. Proin consectetuer. Donec venenatis. Cras urna metus, feugiat non, consectetuer quis, pretium quis, nunc. ', 'templatemo.gif'),
(2, 'Ekstrakurikuler', 'Nullam pede purus, tempor a, imperdiet in, porttitor at, nulla. Aliquam elit risus, volutpat quis, mattis ac, elementum eget, mauris. Duis vitae velit sed dui malesuada dignissim. ', 'flashmo.gif'),
(3, 'Seminar', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc quis sem nec tellus blandit tincidunt. Duis vitae velit sed dui malesuada dignissim. ', 'webdesignmo.gif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `jam`) VALUES
('R', 'Regular', '09:35:16'),
('E', 'Executive', '09:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nis` varchar(17) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kelas` char(1) COLLATE latin1_general_ci NOT NULL,
  `jurusan` int(1) NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kota_lahir` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tingkat` char(5) COLLATE latin1_general_ci NOT NULL,
  `hobi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `cita` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tlp` char(12) COLLATE latin1_general_ci NOT NULL,
  `ayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nis`, `nama`, `foto`, `kelas`, `jurusan`, `jenis_kelamin`, `agama`, `email`, `password`, `alamat`, `kota_lahir`, `tanggal_lahir`, `sekolah`, `tingkat`, `hobi`, `cita`, `tlp`, `ayah`, `ibu`, `pekerjaanayah`, `pekerjaanibu`, `tanggal_daftar`) VALUES
('14.1R1.01', 'Wali Risqy', './uploads/foto/FORM.14.1R.01-FORM.1410.1101.04-deddy.jpg', 'R', 1, 'Perempuan', 'Islam', 'wali@gmail.com', 'c33367701511b4f6020ec61ded352059', 'Tangerang Indah\r\nBlok A 5\r\nTangerang', 'Tangerang', '1990-07-04', 'SMA N 3', 'SMA', 'Renang', 'Astronot', '089898989', 'Ali Sadikin', 'Umi Kalsum', 'Tukang kayu', 'Ibu rumah tangga', '2014-07-24 14:33:06'),
('14.1E2.02', 'Pevita Pearce', './uploads/foto/FORM.14.1E.02-FORM.1410.1111.03-poni.jpg', 'E', 2, 'Perempuan', 'Islam', 'pev@gmail.cpm', 'a3f77a532c5752d76f22267b15201081', 'Jakarta Raya', 'Jakarta', '1994-07-07', 'SMA N 3', 'SMA', 'Makan', 'Pramugrari', '09584754', 'Pev Sr.', 'Pearce Sr.', 'Artis', 'Artis', '2014-07-24 14:50:06'),
('14.1R.01', 'Wali ', './uploads/foto/FORM.14.1R.01-FORM.1410.1101.04-deddy.jpg', 'R', 1, 'Perempuan', 'Islam', 'wali@gmail.com', '9b0442a9a1cbb95f8291afc1a668adc0', 'Tangerang Indah\r\nBlok A 5\r\nTangerang', 'Tangerang', '1990-07-04', 'SMA N 3', '', 'Renang', 'Astronot', '', 'Ali Sadikin', 'Umi Kalsum', 'Tukang kayu', 'Ibu rumah tangga', '2014-07-24 14:33:06'),
('14.2R.03', 'Seto El', './uploads/foto/FORM.14.2R.03-Google-plus-160x120.jpg', 'R', 1, 'Laki-laki', 'Islam', 'seto.elkahfi@propanraya.com', '769dbe599fa7360ee423e2bbf30f2623', 'LA Boulevard', 'San Fransisco', '1989-09-01', 'SMK N 2 San Fransisco', '', 'Menari', 'Astronot', '32323223', 'Ahmad dahlan', 'Siti masruroh', 'Doktor', 'Doktor', '2014-09-04 03:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `judul`, `keterangan`, `gambar`, `link`) VALUES
(1, 'Kegiatan', 'Kegiatan belajar mengajar', 'slide-Queen Mary II.jpg', ''),
(2, 'Kegiatan', 'Kegiatan belajar mengajar', 'slide2.jpg', ''),
(3, 'Pelatihan', 'Pelatihan internal', 'slide3.jpg', ''),
(4, 'Ektrakurikuler', 'Ekskul yang ada di BHIS', 'slide4.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE IF NOT EXISTS `tentang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id`, `judul`, `isi`) VALUES
(1, 'Tentang BHIS School', '<h2>Sejarah</h2>\r\n<p>Sejarah BHIS School dimulai dari.</p>\r\n<h2>Visi &amp; Misi</h2>\r\n<h3>Visi</h3>\r\n<p>Mencerdaskan kehidupan bangsa melalui lembaga pendidikan yang berkualitas.</p>\r\n<h3>Misi</h3>\r\n<p>Phasellus commodo lobortis dolor non posuere. Aliquam nec consectetur dui, vitae accumsan dolor. Nulla vel est at urna accumsan tempus a sed metus. Maecenas feugiat, neque nec rhoncus viverra, lorem urna accumsan ipsum, eu vehicula felis quam ac nisi. Morbi vestibulum mi arcu, vitae luctus lorem pharetra a. Vivamus varius ante eu dapibus adipiscing. Sed sit amet tincidunt erat. Proin ante libero, tristique et mi ut, tempus ultrices nibh. Nullam sollicitudin augue tincidunt venenatis vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque tortor tortor, pulvinar hendrerit lorem vel, commodo ultrices nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur iaculis ultrices lectus, vel blandit enim pharetra vel. Cras eu lacus quis diam iaculis auctor.</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
