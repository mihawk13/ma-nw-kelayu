/*
SQLyog Ultimate v12.2.6 (64 bit)
MySQL - 10.4.10-MariaDB-log : Database - akademik_sdk_rentung
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`akademik_sdk_rentung` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `akademik_sdk_rentung`;

/*Table structure for table `tb_absen` */

DROP TABLE IF EXISTS `tb_absen`;

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(10) NOT NULL,
  `nisn` int(20) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket_absen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_data_sekolah` */

DROP TABLE IF EXISTS `tb_data_sekolah`;

CREATE TABLE `tb_data_sekolah` (
  `id` int(11) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `nama_kepsek` varchar(100) DEFAULT NULL,
  `nip_kepsek` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_extra` */

DROP TABLE IF EXISTS `tb_extra`;

CREATE TABLE `tb_extra` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_extra` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_extra_guru` */

DROP TABLE IF EXISTS `tb_extra_guru`;

CREATE TABLE `tb_extra_guru` (
  `nip` varchar(20) DEFAULT NULL,
  `id_extra` int(10) DEFAULT NULL,
  `id_kelas` int(10) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_extra_siswa` */

DROP TABLE IF EXISTS `tb_extra_siswa`;

CREATE TABLE `tb_extra_siswa` (
  `nisn` varchar(20) DEFAULT NULL,
  `id_extra` int(10) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_guru` */

DROP TABLE IF EXISTS `tb_guru`;

CREATE TABLE `tb_guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_kerja` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_japel` */

DROP TABLE IF EXISTS `tb_japel`;

CREATE TABLE `tb_japel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL,
  `wali_kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(100) NOT NULL,
  `mulok` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_mapel_guru` */

DROP TABLE IF EXISTS `tb_mapel_guru`;

CREATE TABLE `tb_mapel_guru` (
  `nip` varchar(20) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_nilai` */

DROP TABLE IF EXISTS `tb_nilai`;

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `nisn` int(20) NOT NULL,
  `jns_nilai` text NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=457 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_raport` */

DROP TABLE IF EXISTS `tb_raport`;

CREATE TABLE `tb_raport` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thn_ajaran` varchar(10) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `a_sikap_spiritual` varchar(200) DEFAULT NULL,
  `a_sikap_sosial` varchar(200) DEFAULT NULL,
  `d_saran_saran` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIK` (`thn_ajaran`,`semester`,`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_raport_detail` */

DROP TABLE IF EXISTS `tb_raport_detail`;

CREATE TABLE `tb_raport_detail` (
  `id_raport` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `pengetahuan` varchar(200) NOT NULL,
  `keterampilan` varchar(200) NOT NULL,
  UNIQUE KEY `UNIK` (`id_raport`,`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_raport_extra` */

DROP TABLE IF EXISTS `tb_raport_extra`;

CREATE TABLE `tb_raport_extra` (
  `id_raport` int(10) DEFAULT NULL,
  `id_extra` int(10) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  UNIQUE KEY `UNIK` (`id_raport`,`id_extra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp_siswa` varchar(20) NOT NULL,
  `status_siswa` varchar(20) NOT NULL,
  `nama_ayah` varchar(20) NOT NULL,
  `thn_lahir_ayah` int(11) NOT NULL,
  `pendidikan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `penghasilan_ayah` varchar(20) NOT NULL,
  `telp_ayah` varchar(20) NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `thn_lahir_ibu` int(11) NOT NULL,
  `pendidikan_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `penghasilan_ibu` varchar(20) NOT NULL,
  `telp_ibu` varchar(20) NOT NULL,
  `kelas` int(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_tahun_ajaran` */

DROP TABLE IF EXISTS `tb_tahun_ajaran`;

CREATE TABLE `tb_tahun_ajaran` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
