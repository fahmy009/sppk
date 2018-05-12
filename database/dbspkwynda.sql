-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2015 at 09:06 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbspkwynda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `id_bag` varchar(4) NOT NULL,
  `n_bag` varchar(25) NOT NULL,
  PRIMARY KEY (`id_bag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bag`, `n_bag`) VALUES
('B001', '4A'),
('B002', '3B'),
('B003', '3D'),
('B004', '2C'),
('B005', '3A');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_bag` varchar(4) NOT NULL,
  `id_jab` varchar(4) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `id_bag`, `id_jab`, `foto`) VALUES
('KDG1402005', 'warto,s.Ag ', 'Bandung', '1978-12-16', 'P', 'jln.hartono no.', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1402002', 'siti fatimah, spd ', 'Bandung', '1978-12-16', 'L', 'jln.bringin jay', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1402003', 'jariniswati, spd ', 'Banyumas', '1981-11-17', 'L', 'jln.pahlawan no', '2004-07-12', 'B001', 'J003', '22390789speech.jpg'),
('KDG1402004', 'yulianto, spd ', 'Purwokerto', '1978-01-07', 'L', 'jln.kedamaian g', '2004-11-09', 'B002', 'J001', '14291317mark_zuckerberg.jpg'),
('KDG1403001', 'Nani Herawati, S.pd.SD ', 'Banyumas', '1981-11-17', 'P', 'jln.sukajaya no 5 kalianda ', '2004-07-12', 'B001', 'J003', '22390789speech.jpg'),
('KDG1403002', 'jalaludin ', 'Purwokerto', '1978-01-07', 'P', 'jln.palas jaya no 6 palas ', '2004-11-09', 'B002', 'J001', '14291317mark_zuckerberg.jpg'),
('KDG1403003', 'Maryati,S.Pd,SD ', 'Bandung', '1978-12-16', 'P', 'jln.bringin raya no 5 palas ', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1403004', 'hadid suradi jaya ', 'Banyumas', '1981-11-17', 'P', 'jln.Sindang Sari no 78 palas ', '2004-07-12', 'B001', 'J001', '22390789speech.jpg'),
('KDG1403005', 'Irma Siti Rohimah ', 'Purwokerto', '1978-01-07', 'L', 'jln.sindang Sari no 60 ', '2004-11-09', 'B002', 'J003', '14291317mark_zuckerberg.jpg'),
('KDG1403006', 'iis wahyudi ', 'Purwokerto', '1978-12-16', 'L', 'jln.pelita no 88 palas ', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1403007', 'kusyanto ', 'Bandung', '1981-11-17', 'L', 'jln.cemara no 43 kalianda ', '2004-07-12', 'B001', 'J001', '22390789speech.jpg'),
('KDG1403008', 'Sari Pranata, S.Pd ', 'Banyumas', '1978-01-07', 'L', 'jln.bandar agung no 66 ', '2004-11-09', 'B002', 'J001', '14291317mark_zuckerberg.jpg'),
('KDG1403009', 'Sri Supartiah ', 'Purwokerto', '1978-12-16', 'P', 'jln.Sukapura no 43 ', '2004-02-02', 'B002', 'J003', '65747033federer.jpg'),
('KDG1403010', 'Yuhanidar,S.Pd ', 'Purwokerto', '1981-11-17', 'P', 'jln.Patimura no 34 ', '2004-07-12', 'B001', 'J001', '22390789speech.jpg'),
('KDG1403011', 'Winda Maryani,S.Kom ', 'Bandung', '1978-01-07', 'P', 'jln.tugu no 55 ', '2004-11-09', 'B002', 'J001', '14291317mark_zuckerberg.jpg'),
('KDG1403012', 'Samsul Bahri,S.kom ', 'Banyumas', '1978-12-16', 'P', 'jln.ciputat no 7 ', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1403013', 'Suci Santika ', 'Purwokerto', '1981-11-17', 'P', 'jln.addul gani no 34 ', '2004-07-12', 'B001', 'J003', '22390789speech.jpg'),
('KDG1403014', 'Rela Angge Minerva,S.Pd ', 'Purwokerto', '1978-01-07', 'L', 'jln.Baktiarsa no 56 ', '2004-11-09', 'B002', 'J001', '14291317mark_zuckerberg.jpg'),
('KDG1403015', 'Anggun Maryani,S.Pd ', 'Bandung', '1978-12-16', 'L', 'jln.palas aji no 43 ', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1403016', 'santi pranita ', 'Banyumas', '1981-11-17', 'L', 'jln.Raden Patah no 62 ', '2004-07-12', 'B001', 'J001', '22390789speech.jpg'),
('KDG1403017', 'Saraswati,S.Pd ', 'Purwokerto', '1978-01-07', 'L', 'jln.Hartono no 34 ', '2004-11-09', 'B002', 'J003', '14291317mark_zuckerberg.jpg'),
('KDG1403018', 'sugiman,S.Ag ', 'Purwokerto', '1978-12-16', 'P', 'jln.hartono no 55 ', '2004-02-02', 'B002', 'J001', '65747033federer.jpg'),
('KDG1403019', 'Baharuddin,S.Ag ', 'Bandung', '1981-11-17', 'P', 'jln.hartono no 52 ', '2004-07-12', 'B001', 'J001', '22390789speech.jpg'),
('KDG1403020', 'Nurjanah,S.Pd ', 'Banyumas', '1978-01-07', 'P', 'jln.rawa bening no 6 ', '2004-11-09', 'B002', 'J001', '14291317mark_zuckerberg.jpg'),
('KDG1403021', 'Nurul Alamsyah,S.Pd ', 'Purwokerto', '1978-12-16', 'P', 'jln.jati no 89 ', '2004-02-02', 'B002', 'J003', '65747033federer.jpg'),
('NIP0002', 'Wynda ', 'Kalianda ', '1981-10-15', 'L', 'jl.kalianda ', '0000-00-00', 'B003', 'J001', '182891ABUD2- 110 X 50 MAK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `h_jabatan`
--

CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `idh` int(11) NOT NULL AUTO_INCREMENT,
  `idkjb` varchar(4) NOT NULL,
  `jab_old` varchar(20) NOT NULL,
  `tgl_ajb` date NOT NULL,
  `jabatan_baru` varchar(20) NOT NULL,
  `tgl_kjb` date NOT NULL,
  PRIMARY KEY (`idh`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `h_jabatan`
--

INSERT INTO `h_jabatan` (`idh`, `idkjb`, `jab_old`, `tgl_ajb`, `jabatan_baru`, `tgl_kjb`) VALUES
(10, 'KJ01', 'Rekom', '2009-01-16', 'Kepala Rekom', '2013-01-16'),
(11, 'KJ01', 'Kepala Rekom', '2009-01-16', 'Mgr.Rekom', '2013-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jab` varchar(4) NOT NULL,
  `n_jab` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `n_jab`) VALUES
('J001', 'Guru Bahasa'),
('J002', 'Wakil Kepala Sekolah'),
('J003', 'Kepala Sekolah'),
('J004', 'Tata Usaha'),
('J005', 'Guru Bahasa Lampung'),
('J006', 'Guru Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE IF NOT EXISTS `kandidat` (
  `id_kandidat` char(3) DEFAULT NULL,
  `nip` varchar(12) NOT NULL DEFAULT '',
  `user_id` varchar(6) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `kriteria1` varchar(20) DEFAULT NULL,
  `kriteria2` varchar(20) DEFAULT NULL,
  `kriteria3` varchar(20) DEFAULT NULL,
  `kriteria4` varchar(20) DEFAULT NULL,
  `kriteria5` varchar(20) DEFAULT NULL,
  `kriteria6` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nip`, `user_id`, `nama`, `kriteria1`, `kriteria2`, `kriteria3`, `kriteria4`, `kriteria5`, `kriteria6`) VALUES
('G1', 'KDG1402003 ', 'admin', 'jariniswati, spd ', '99', '88', '99', '88', '77', '66'),
('G2', 'KDG1402005 ', 'admin', 'warto,s.Ag ', '66', '67', '73', '81', '78', '67'),
('G3', 'KDG1403001 ', 'admin', 'Nani Herawati, S.pd.SD ', '75', '78', '69', '70', '88', '78'),
('G4', 'KDG1403002 ', 'admin', 'jalaludin ', '80', '88', '78', '70', '87', '73'),
('G5', 'KDG1403003 ', 'admin', 'Maryati,S.Pd,SD ', '95', '89', '99', '80', '77', '89'),
('G6', 'KDG1403004 ', 'admin', 'hadid suradi jaya ', '83', '80', '89', '80', '78', '72'),
('G7', 'KDG1403005 ', 'admin', 'Irma Siti Rohimah ', '90', '80', '99', '71', '78', '70'),
('G8', 'KDG1403006 ', 'admin', 'iis wahyudi ', '93', '88', '82', '80', '89', '69'),
('G9', 'KDG1403007 ', 'admin', 'kusyanto ', '75', '78', '93', '75', '88', '81'),
('G10', 'KDG1403008 ', 'admin', 'Sari Pranata, S.Pd ', '95', '79', '95', '80', '88', '90'),
('G11', 'KDG1403009 ', 'admin', 'Sri Supartiah ', '90', '76', '80', '89', '90', '78'),
('G12', 'KDG1403010 ', 'admin', 'Yuhanidar,S.Pd ', '85', '75', '95', '90', '88', '76'),
('G13', 'KDG1403011 ', 'admin', 'Winda Maryani,S.Kom ', '95', '82', '80', '88', '77', '79'),
('G14', 'KDG1403012 ', 'admin', 'Samsul Bahri,S.kom ', '87', '85', '91', '99', '78', '86'),
('G15', 'KDG1402004 ', 'admin', 'yulianto, spd ', '89', '81', '83', '70', '79', '65'),
('G16', 'KDG1402002 ', 'admin', 'siti fatimah, spd ', '90', '98', '82', '76', '88', '89'),
('G17', 'KDG1403013 ', 'admin', 'Suci Santika ', '89', '75', '81', '80', '90', '78'),
('G18', 'KDG1403014 ', 'admin', 'Rela Angge Minerva,S.Pd ', '85', '73', '75', '80', '90', '72'),
('G19', 'KDG1403015 ', 'admin', 'Anggun Maryani,S.Pd ', '75', '99', '75', '79', '78', '76'),
('G20', 'KDG1403016 ', 'admin', 'santi pranita ', '95', '86', '89', '85', '78', '69'),
('G21', 'KDG1403017 ', 'admin', 'Saraswati,S.Pd ', '86', '80', '83', '71', '80', '70'),
('G22', 'KDG1403018 ', 'admin', 'sugiman,S.Ag ', '88', '84', '87', '76', '68', '75');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` varchar(6) NOT NULL,
  `user_id` varchar(6) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `user_id`, `nama`) VALUES
('F1', 'admin', 'Absensi'),
('F2', 'admin', 'Kerapihan'),
('F3', 'admin', 'Kedisiplinan'),
('F4', 'admin', 'Kemampuan Dalam Mengajar'),
('F5', 'admin', 'Kepribadian'),
('F6', 'admin', 'Kejujuran');

-- --------------------------------------------------------

--
-- Table structure for table `k_jabatan`
--

CREATE TABLE IF NOT EXISTS `k_jabatan` (
  `idkjb` varchar(4) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `masa_kerja` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idkjb`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_jabatan`
--

INSERT INTO `k_jabatan` (`idkjb`, `nip`, `masa_kerja`, `keterangan`) VALUES
('KJ01', '1234', 4, 'dsda');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE IF NOT EXISTS `nilai_alternatif` (
  `id_matrik` varchar(10) NOT NULL DEFAULT '',
  `user_id` varchar(6) DEFAULT NULL,
  `matrik_value` varchar(10) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_matrik`, `user_id`, `matrik_value`, `jenis`) VALUES
('0', 'rani', '0.33333333', 'alternatif'),
('1', 'rani', '0.33333333', 'alternatif'),
('2', 'rani', '0.33333333', 'alternatif'),
('3', 'rani', '0.33333333', 'alternatif'),
('4', 'rani', '0.33333333', 'alternatif'),
('5', 'rani', '0.33333333', 'alternatif'),
('6', 'rani', '0.33333333', 'alternatif'),
('7', 'rani', '0.33333333', 'alternatif'),
('8', 'rani', '0.33333333', 'alternatif'),
('9', 'rani', '0.33333333', 'alternatif'),
('10', 'rani', '0.33333333', 'alternatif'),
('11', 'rani', '0.33333333', 'alternatif'),
('0', 'admin', '0.33333333', 'alternatif'),
('1', 'admin', '0.33333333', 'alternatif'),
('2', 'admin', '0.33333333', 'alternatif'),
('3', 'admin', '0.33333333', 'alternatif'),
('4', 'admin', '0.33333333', 'alternatif'),
('5', 'admin', '0.33333333', 'alternatif'),
('6', 'admin', '0.33333333', 'alternatif'),
('7', 'admin', '0.33333333', 'alternatif'),
('8', 'admin', '0.33333333', 'alternatif'),
('9', 'admin', '0.33333333', 'alternatif'),
('10', 'admin', '0.33333333', 'alternatif'),
('11', 'admin', '0.33333333', 'alternatif');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE IF NOT EXISTS `nilai_kriteria` (
  `id_matrik` varchar(10) NOT NULL DEFAULT '',
  `user_id` varchar(6) DEFAULT NULL,
  `matrik_value` varchar(10) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_matrik`, `user_id`, `matrik_value`, `jenis`) VALUES
('0', 'admin', '0.33333333', 'kriteria'),
('1', 'admin', '0.33333333', 'kriteria'),
('2', 'admin', '0.33333333', 'kriteria'),
('3', 'admin', '0.33333333', 'kriteria');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `idp` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `t_pdk` varchar(20) NOT NULL,
  `d_pdk` text NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`idp`, `nip`, `t_pdk`, `d_pdk`) VALUES
(1, '1234', '2000 - 2006', 'SD Negeri 2 Palembang'),
(2, '1234', '2006 - 2007', 'SMP Negeri 3 Palembang'),
(3, '1234', '2007 - 2010', 'SMA 1 Negeri Palembang');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE IF NOT EXISTS `pengalaman_kerja` (
  `id_peker` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nm_pekerjaan` varchar(50) NOT NULL,
  `d_pekerjaan` text NOT NULL,
  PRIMARY KEY (`id_peker`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`id_peker`, `nip`, `nm_pekerjaan`, `d_pekerjaan`) VALUES
(1, '1234', 'Freelance Networking ', 'Rancang bangun jaringan untuk warnet.'),
(2, '1234', 'Freelance Web Programmer', '- Merancang Aplikasi Berbasis Web untuk keperluan TA/Skripsi mahasiswa.\r\n- Merancang dan membangun website toko online, Personal, Akademik dan Company profile.\r\n'),
(5, 'admin', 'gvfdg', 'gdfg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `passid` varchar(50) NOT NULL,
  `level_user` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `userid`, `passid`, `level_user`) VALUES
(1, 'admin', 'admin', 1),
(2, 'wynda', 'wynda', 1),
(3, 'demo', 'demo', 1),
(4, 'KDG1402002 ', 'KDG1402002 ', 3),
(5, 'KDG1402003 ', 'KDG1402003 ', 3),
(6, 'KDG1402004 ', 'KDG1402004 ', 3),
(7, 'KDG1402005 ', 'KDG1402005 ', 3),
(8, 'KDG1403001 ', 'KDG1403001 ', 3),
(9, 'KDG1403002 ', 'KDG1403002 ', 3),
(10, 'KDG1403003 ', 'KDG1403003 ', 3),
(11, 'KDG1403004 ', 'KDG1403004 ', 3),
(12, 'KDG1403005 ', 'KDG1403005 ', 3),
(13, 'KDG1403006 ', 'KDG1403006 ', 3),
(14, 'KDG1403007 ', 'KDG1403007 ', 3),
(15, 'KDG1403008 ', 'KDG1403008 ', 3),
(16, 'KDG1403009 ', 'KDG1403009 ', 3),
(17, 'KDG1403010 ', 'KDG1403010 ', 3),
(18, 'KDG1403011 ', 'KDG1403011 ', 3),
(19, 'KDG1403012 ', 'KDG1403012 ', 3),
(20, 'KDG1403013 ', 'KDG1403013 ', 3),
(21, 'KDG1403014 ', 'KDG1403014 ', 3),
(22, 'KDG1403015 ', 'KDG1403015 ', 3),
(23, 'KDG1403016 ', 'KDG1403016 ', 3),
(24, 'KDG1403017 ', 'KDG1403017 ', 3),
(25, 'KDG1403018 ', 'KDG1403018 ', 3),
(26, 'KDG1403019 ', 'KDG1403019 ', 3),
(27, 'KDG1403020 ', 'KDG1403020 ', 3),
(28, 'KDG1403021 ', 'KDG1403021 ', 3),
(29, 'KDG1403022 ', 'KDG1403022 ', 3),
(30, 'KDG1403023 ', 'KDG1403023 ', 3),
(31, 'KDG1403024 ', 'KDG1403024 ', 3),
(32, 'KDG1403025 ', 'KDG1403025 ', 3),
(33, 'KDG1403026 ', 'KDG1403026 ', 3),
(34, 'KDG1403027 ', 'KDG1403027 ', 3),
(35, 'KDG1403028 ', 'KDG1403028 ', 3),
(36, 'NIP0002', 'NIP0002', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
