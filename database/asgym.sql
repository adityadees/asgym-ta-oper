-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 10:54 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asgym`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcas`
--

CREATE TABLE `tblcas` (
  `idcas` int(11) NOT NULL,
  `idmember` varchar(20) NOT NULL,
  `tglbyr` date NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcas`
--

INSERT INTO `tblcas` (`idcas`, `idmember`, `tglbyr`, `total`) VALUES
(1, 'C01', '2018-05-14', 200),
(2, 'C02', '2018-05-22', 200000),
(3, 'C04', '2018-05-21', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tblhadir`
--

CREATE TABLE `tblhadir` (
  `idhadir` int(11) NOT NULL,
  `tanggal_hadir` date NOT NULL,
  `idmember` varchar(10) NOT NULL,
  `status_hadir` enum('H','A') NOT NULL,
  `notif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbljenis`
--

CREATE TABLE `tbljenis` (
  `id_jenis` int(11) NOT NULL,
  `nmjenis` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljenis`
--

INSERT INTO `tbljenis` (`id_jenis`, `nmjenis`, `ket`, `id_paket`) VALUES
(0, 'Tidak ada', '', 1),
(1, 'Kebugaran', '', 1),
(2, 'Diet', '', 1),
(3, 'Masa Otot', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE `tblmember` (
  `idmember` varchar(10) NOT NULL,
  `nmmember` varchar(30) NOT NULL,
  `altmember` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `idpaket` varchar(11) NOT NULL,
  `id_jenis` int(11) DEFAULT '0',
  `tglmasuk` date NOT NULL,
  `poin_mbr` double NOT NULL,
  `user_mbr` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `stts` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`idmember`, `nmmember`, `altmember`, `nohp`, `idpaket`, `id_jenis`, `tglmasuk`, `poin_mbr`, `user_mbr`, `password`, `stts`) VALUES
('C01', 'zz', 'zz', '9099', '1', 0, '2018-05-08', 398, 'zz@gmail.com', '25ed1bcb423b0b7200f485fc5ff71c8e', 'aktif'),
('C03', 'ds', 'asd', '123', '1', 3, '2018-05-14', 0, 'asds@aa.com', '202cb962ac59075b964b07152d234b70', 'nonaktif'),
('C04', 'DONI', 'jl. antasari', '085323', '3', 0, '2018-05-16', 0, 'doni@aaa.com', '202cb962ac59075b964b07152d234b70', 'aktif'),
('C06', 'asd23', 'adsd', '123', '1', 3, '2018-05-22', 0, 'am@aa.com', '202cb962ac59075b964b07152d234b70', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `tblmisi`
--

CREATE TABLE `tblmisi` (
  `idmisi` varchar(10) NOT NULL,
  `idmember` varchar(10) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `latihan` varchar(50) NOT NULL,
  `poinmisi` tinyint(1) NOT NULL,
  `tgl_misi` date NOT NULL,
  `time_misi` time NOT NULL,
  `sttss` enum('N','Y','V','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmisi`
--

INSERT INTO `tblmisi` (`idmisi`, `idmember`, `id_jenis`, `latihan`, `poinmisi`, `tgl_misi`, `time_misi`, `sttss`) VALUES
('M01', 'C01', 2, '', 1, '2018-05-21', '04:30:00', 'V'),
('M02', 'C01', 2, '', 2, '2018-05-21', '05:15:00', 'V'),
('M03', 'C03', 0, '', 0, '0000-00-00', '00:00:00', ''),
('M04', 'C06', 3, '', 1, '2018-05-21', '04:15:00', 'N'),
('M05', 'C01', 0, '', 1, '2018-05-21', '04:15:00', 'N'),
('M06', 'C01', 0, '', 1, '2018-05-28', '04:15:00', 'N'),
('M07', 'C06', 3, '', 100, '2018-05-24', '04:15:00', 'N'),
('M08', 'C04', 0, '', 20, '2018-05-23', '04:30:00', 'N'),
('M09', 'C04', 0, 'ASD', 12, '2018-05-22', '07:30:00', 'N');

--
-- Triggers `tblmisi`
--
DELIMITER $$
CREATE TRIGGER `poin_misi` AFTER UPDATE ON `tblmisi` FOR EACH ROW BEGIN
UPDATE tblmember SET poin_mbr=poin_mbr+NEW.poinmisi WHERE idmember=NEW.idmember;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaket`
--

CREATE TABLE `tblpaket` (
  `idpaket` int(11) NOT NULL,
  `nm_paket` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `masa_berlaku` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpaket`
--

INSERT INTO `tblpaket` (`idpaket`, `nm_paket`, `harga`, `masa_berlaku`) VALUES
(1, 'Paket Member', 100000, '1 Bulan'),
(2, 'Paket 12X Masuk', 100000, '2 Bulan'),
(3, 'Paket 1X Masuk', 15000, '1X Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tblpembayaran`
--

CREATE TABLE `tblpembayaran` (
  `idbayar` int(11) NOT NULL,
  `idmember` varchar(10) NOT NULL,
  `tgl_byr` date NOT NULL,
  `rek_ning` varchar(15) NOT NULL,
  `ats_nm` varchar(20) NOT NULL,
  `file_foto` varchar(50) NOT NULL,
  `sttsp` enum('Y','N','V') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblperpanjang`
--

CREATE TABLE `tblperpanjang` (
  `idper` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `idmember` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreward`
--

CREATE TABLE `tblreward` (
  `idreward` int(11) NOT NULL,
  `idmember` varchar(10) NOT NULL,
  `poin` double NOT NULL,
  `time_ward` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreward`
--

INSERT INTO `tblreward` (`idreward`, `idmember`, `poin`, `time_ward`) VALUES
(3, 'C01', 100, '2018-05-09 09:53:52');

--
-- Triggers `tblreward`
--
DELIMITER $$
CREATE TRIGGER `kurang_oin` AFTER INSERT ON `tblreward` FOR EACH ROW BEGIN
UPDATE tblmember SET poin_mbr=poin_mbr-NEW.poin WHERE idmember=NEW.idmember;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tmpmisi`
--

CREATE TABLE `tmpmisi` (
  `idtmp` int(11) NOT NULL,
  `idmember` varchar(10) NOT NULL,
  `idmisi` varchar(10) NOT NULL,
  `tmp_stts` enum('n','y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmpmisi`
--

INSERT INTO `tmpmisi` (`idtmp`, `idmember`, `idmisi`, `tmp_stts`) VALUES
(2, 'C01', 'M03', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `userlg`
--

CREATE TABLE `userlg` (
  `iduser` int(11) NOT NULL,
  `user_nm` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','trainer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlg`
--

INSERT INTO `userlg` (`iduser`, `user_nm`, `password`, `level`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'Trainer', '202cb962ac59075b964b07152d234b70', 'trainer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcas`
--
ALTER TABLE `tblcas`
  ADD PRIMARY KEY (`idcas`);

--
-- Indexes for table `tblhadir`
--
ALTER TABLE `tblhadir`
  ADD PRIMARY KEY (`idhadir`);

--
-- Indexes for table `tbljenis`
--
ALTER TABLE `tbljenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tblmember`
--
ALTER TABLE `tblmember`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `tblmisi`
--
ALTER TABLE `tblmisi`
  ADD PRIMARY KEY (`idmisi`);

--
-- Indexes for table `tblpaket`
--
ALTER TABLE `tblpaket`
  ADD PRIMARY KEY (`idpaket`);

--
-- Indexes for table `tblpembayaran`
--
ALTER TABLE `tblpembayaran`
  ADD PRIMARY KEY (`idbayar`);

--
-- Indexes for table `tblperpanjang`
--
ALTER TABLE `tblperpanjang`
  ADD PRIMARY KEY (`idper`);

--
-- Indexes for table `tblreward`
--
ALTER TABLE `tblreward`
  ADD PRIMARY KEY (`idreward`);

--
-- Indexes for table `tmpmisi`
--
ALTER TABLE `tmpmisi`
  ADD PRIMARY KEY (`idtmp`);

--
-- Indexes for table `userlg`
--
ALTER TABLE `userlg`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcas`
--
ALTER TABLE `tblcas`
  MODIFY `idcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblhadir`
--
ALTER TABLE `tblhadir`
  MODIFY `idhadir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbljenis`
--
ALTER TABLE `tbljenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpaket`
--
ALTER TABLE `tblpaket`
  MODIFY `idpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpembayaran`
--
ALTER TABLE `tblpembayaran`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblperpanjang`
--
ALTER TABLE `tblperpanjang`
  MODIFY `idper` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreward`
--
ALTER TABLE `tblreward`
  MODIFY `idreward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmpmisi`
--
ALTER TABLE `tmpmisi`
  MODIFY `idtmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlg`
--
ALTER TABLE `userlg`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
