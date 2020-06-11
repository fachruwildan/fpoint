-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2020 at 09:25 AM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpoints`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_siswa` bigint(20) NOT NULL,
  `id_status_absensi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'ISLAM'),
(2, 'KRISTEN'),
(3, 'HINDU'),
(4, 'BUDDHA'),
(5, 'KONG HU CHU');

-- --------------------------------------------------------

--
-- Table structure for table `akumulasi_point`
--

CREATE TABLE `akumulasi_point` (
  `id_siswa` bigint(20) NOT NULL,
  `id_sanksi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_tindakan` int(11) DEFAULT NULL,
  `pasal` varchar(10) DEFAULT NULL,
  `uraian_aturan` text,
  `point_aturan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hari_efektif`
--

CREATE TABLE `hari_efektif` (
  `id_hari_efektif` int(11) NOT NULL,
  `nama_hari_efektif` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hari_tidak_efek`
--

CREATE TABLE `hari_tidak_efek` (
  `id_hari_tidak_efektif` int(11) NOT NULL,
  `tanggal_tidak_efektif` date DEFAULT NULL,
  `keterangan_tidak_efektif` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `kepala_jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_aturan`
--

CREATE TABLE `kategori_aturan` (
  `id_kategori` int(11) NOT NULL,
  `kategori_aturan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_wali_kelas` int(11) DEFAULT NULL,
  `kelas` varchar(3) DEFAULT NULL,
  `grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', NULL),
('m130524_201442_init', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nama_kelas`
--

CREATE TABLE `nama_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `on_kelas_siswa`
--

CREATE TABLE `on_kelas_siswa` (
  `id_kelas` int(11) NOT NULL,
  `id_siswa` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `jenis_kelamin_pegawai` char(1) NOT NULL,
  `no_hp_pegawai` varchar(15) NOT NULL,
  `status_kepegawaian` varchar(50) NOT NULL,
  `jabatan_pegawai` varchar(50) NOT NULL,
  `foto_pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_agama`, `nama_pegawai`, `alamat_pegawai`, `jenis_kelamin_pegawai`, `no_hp_pegawai`, `status_kepegawaian`, `jabatan_pegawai`, `foto_pegawai`) VALUES
(1, 1, 'admin', 'admin', 'L', '081234567890', 'Pegawai Tetap', 'Teknisi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_siswa` bigint(20) NOT NULL,
  `id_aturan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id_penghargaan` int(11) NOT NULL,
  `uraian_penghargaan` text,
  `point_penghargaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_siswa` bigint(20) NOT NULL,
  `id_penghargaan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `id_sanksi` int(11) NOT NULL,
  `uraian` text,
  `minimum_point` int(11) DEFAULT NULL,
  `maximum_point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) NOT NULL,
  `id_wali_murid` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir_siswa` varchar(40) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `jenis_kelamin_siswa` char(1) NOT NULL,
  `alamat_rumah_siswa` text NOT NULL,
  `alamat_domisili_siswa` text NOT NULL,
  `no_hp_siswa` varchar(15) NOT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE `sp` (
  `id_sp` int(11) NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `tanggal_sp` date NOT NULL,
  `jml_point_pelanggaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_absensi`
--

CREATE TABLE `status_absensi` (
  `id_status_absensi` int(11) NOT NULL,
  `keterangan_status_absensi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `tindakan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_pegawai`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '68r2xcRUUj-MNODNLTd3C-FyqU91ENQF', '$2y$13$CX9I6C0VQa6blxgbbPo.cOsMZrsip6xO94/dnYRVnRSjRfJjgrxPG', NULL, 'admin@admin.com', 10, '2020-06-11 02:05:49', '2020-06-11 02:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wali_murid`
--

CREATE TABLE `wali_murid` (
  `id_wali_murid` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `nama_wali_murid` varchar(50) NOT NULL,
  `tempat_lahir_wali_murid` varchar(50) NOT NULL,
  `tanggal_lahir_wali_murid` date NOT NULL,
  `jenis_kelamin_wali_murid` char(1) NOT NULL,
  `alamat_rumah_wali_murid` text NOT NULL,
  `no_hp_wali_murid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_siswa`,`id_status_absensi`),
  ADD KEY `FK_ABSENSI2` (`id_status_absensi`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `akumulasi_point`
--
ALTER TABLE `akumulasi_point`
  ADD PRIMARY KEY (`id_siswa`,`id_sanksi`),
  ADD KEY `FK_AKUMULASI_POINT2` (`id_sanksi`);

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `FK_ON_KATEGORI_ATURAN` (`id_kategori`),
  ADD KEY `FK_ON_TINDAKAN_ATURAN` (`id_tindakan`);

--
-- Indexes for table `hari_efektif`
--
ALTER TABLE `hari_efektif`
  ADD PRIMARY KEY (`id_hari_efektif`);

--
-- Indexes for table `hari_tidak_efek`
--
ALTER TABLE `hari_tidak_efek`
  ADD PRIMARY KEY (`id_hari_tidak_efektif`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori_aturan`
--
ALTER TABLE `kategori_aturan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `FK_ON_JURUSAN_KELAS` (`id_jurusan`),
  ADD KEY `FK_ON_WALIKELAS` (`id_wali_kelas`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nama_kelas`
--
ALTER TABLE `nama_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `on_kelas_siswa`
--
ALTER TABLE `on_kelas_siswa`
  ADD PRIMARY KEY (`id_kelas`,`id_siswa`),
  ADD KEY `FK_ON_KELAS_SISWA2` (`id_siswa`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `FK_ON_AGAMA_PEGAWAI` (`id_agama`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_siswa`,`id_aturan`),
  ADD KEY `FK_PELANGGARAN2` (`id_aturan`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_siswa`,`id_penghargaan`),
  ADD KEY `FK_PRESTASI2` (`id_penghargaan`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id_sanksi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `FK_ON_AGAMA_SISWA` (`id_agama`),
  ADD KEY `FK_ON_WALI_MURid_siswa` (`id_wali_murid`);

--
-- Indexes for table `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `FK_ON_SISWA_SP` (`id_siswa`);

--
-- Indexes for table `status_absensi`
--
ALTER TABLE `status_absensi`
  ADD PRIMARY KEY (`id_status_absensi`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ON_PEGAWAI_USER` (`id_pegawai`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`),
  ADD KEY `FK_ON_PEGAWAI_WALIKELAS` (`id_pegawai`);

--
-- Indexes for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD PRIMARY KEY (`id_wali_murid`),
  ADD KEY `FK_ON_AGAMA_WALI_MURID` (`id_agama`),
  ADD KEY `FK_ON_PEKERJAAN_WALI_MURID` (`id_pekerjaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_siswa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_aturan`
--
ALTER TABLE `kategori_aturan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nama_kelas`
--
ALTER TABLE `nama_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id_penghargaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_sanksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp`
--
ALTER TABLE `sp`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_absensi`
--
ALTER TABLE `status_absensi`
  MODIFY `id_status_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wali_murid`
--
ALTER TABLE `wali_murid`
  MODIFY `id_wali_murid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `FK_ABSENSI` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `FK_ABSENSI2` FOREIGN KEY (`id_status_absensi`) REFERENCES `status_absensi` (`id_status_absensi`);

--
-- Constraints for table `akumulasi_point`
--
ALTER TABLE `akumulasi_point`
  ADD CONSTRAINT `FK_AKUMULASI_POINT` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `FK_AKUMULASI_POINT2` FOREIGN KEY (`id_sanksi`) REFERENCES `sanksi` (`id_sanksi`);

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `FK_ON_KATEGORI_ATURAN` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_aturan` (`id_kategori`),
  ADD CONSTRAINT `FK_ON_TINDAKAN_ATURAN` FOREIGN KEY (`id_tindakan`) REFERENCES `tindakan` (`id_tindakan`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_ON_JURUSAN_KELAS` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `FK_ON_WALIKELAS` FOREIGN KEY (`id_wali_kelas`) REFERENCES `wali_kelas` (`id_wali_kelas`);

--
-- Constraints for table `nama_kelas`
--
ALTER TABLE `nama_kelas`
  ADD CONSTRAINT `FK_ON_NAMA_KELAS` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `on_kelas_siswa`
--
ALTER TABLE `on_kelas_siswa`
  ADD CONSTRAINT `FK_ON_KELAS_SISWA` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `FK_ON_KELAS_SISWA2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_ON_AGAMA_PEGAWAI` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`);

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `FK_PELANGGARAN` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `FK_PELANGGARAN2` FOREIGN KEY (`id_aturan`) REFERENCES `aturan` (`id_aturan`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `FK_PRESTASI` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `FK_PRESTASI2` FOREIGN KEY (`id_penghargaan`) REFERENCES `penghargaan` (`id_penghargaan`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_ON_AGAMA_SISWA` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `FK_ON_WALI_MURid_siswa` FOREIGN KEY (`id_wali_murid`) REFERENCES `wali_murid` (`id_wali_murid`);

--
-- Constraints for table `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `FK_ON_SISWA_SP` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_ON_PEGAWAI_USER` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `FK_ON_PEGAWAI_WALIKELAS` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD CONSTRAINT `FK_ON_AGAMA_WALI_MURID` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `FK_ON_PEKERJAAN_WALI_MURID` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
