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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_absen` */

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

/*Data for the table `tb_data_sekolah` */

insert  into `tb_data_sekolah`(`id`,`alamat`,`nama_sekolah`,`nama_kepsek`,`nip_kepsek`) values 
(1,'Jl. Raya Rentung','SDK Rentung II','Karsius Suman','1563 1402 2078101125');

/*Table structure for table `tb_extra` */

DROP TABLE IF EXISTS `tb_extra`;

CREATE TABLE `tb_extra` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_extra` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_extra` */

/*Table structure for table `tb_extra_guru` */

DROP TABLE IF EXISTS `tb_extra_guru`;

CREATE TABLE `tb_extra_guru` (
  `nip` varchar(20) DEFAULT NULL,
  `id_extra` int(10) DEFAULT NULL,
  `id_kelas` int(10) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_extra_guru` */

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

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`nip`,`nama`,`jk`,`tempat_lahir`,`tgl_lahir`,`status_kerja`,`agama`,`alamat`,`telp`,`email`,`username`,`password`) values 
('136246658568','Rachel Yulianti','Laki-Laki','Pasuruan','1996-10-06','Pengajar','Kristen','Kpg. Baan No. 425, Padang 9902','0480 3901 6369','megantara.ghaliyati@yuniar.biz','136246658568','136246658568'),
('140619945987','Prakosa Hakim','Perempuan','Administrasi Jakarta','1988-05-03','Pengajar','Kristen','Ds. Dipenogoro No. 539, Taraka','0440 5324 747','najwa.lestari@gmail.co.id','140619945987','140619945987'),
('165253709862','Koko Prima Marpaung','Laki-Laki','Subulussalam','1973-08-01','Pengajar','Kristen','Ki. Ters. Buah Batu No. 761, M','0254 2833 652','qtarihoran@gmail.com','165253709862','165253709862'),
('198538913258','Kajen Prasetya','Perempuan','Pematangsiantar','2007-03-28','Pengajar','Kristen','Jr. Samanhudi No. 707, Adminis','0230 4347 0865','sarah.mulyani@gmail.com','198538913258','198538913258'),
('310778830365','Zulaikha Mardhiyah','Laki-Laki','Bogor','2006-02-28','Pengajar','Kristen','Psr. Otto No. 561, Bekasi 9852','(+62) 319 4562 375','azalea.tarihoran@narpati.name','310778830365','310778830365'),
('319495996256','Clara Septi Yuniar M.Kom.','Perempuan','Bukittinggi','1970-08-24','Pengajar','Kristen','Psr. Bass No. 817, Padang 9913','(+62) 230 1434 361','siswahyudi@yahoo.co.id','319495996256','319495996256'),
('329364987586','Arsipatra Gaduh Saputra S.Gz','Perempuan','Kediri','1973-04-21','Pengajar','Kristen','Ds. Perintis Kemerdekaan No. 4','(+62) 966 3244 314','ratih.widiastuti@yahoo.co.id','329364987586','329364987586'),
('548852618596','Viman Hutasoit','Laki-Laki','Sawahlunto','1987-05-26','Pengajar','Kristen','Ds. Kali No. 563, Administrasi','0247 5086 9457','halimah.cici@nurdiyanti.mil.id','548852618596','548852618596'),
('680257008985','Maimunah Puspita','Laki-Laki','Madiun','1992-07-04','Pengajar','Kristen','Ds. Bahagia  No. 850, Solok 75','(+62) 258 6394 973','indah60@novitasari.ac.id','680257008985','680257008985'),
('834748558869','Hana Namaga','Perempuan','Banjarbaru','1987-05-23','Pengajar','Kristen','Gg. Sutan Syahrir No. 711, Sur','(+62) 595 2686 9565','intan.budiyanto@saputra.biz.id','834748558869','834748558869'),
('912983430856','Dipa Tamba M.M.','Perempuan','Kupang','1976-03-28','Pengajar','Kristen','Jr. Mahakam No. 473, Kupang 78','(+62) 530 0854 642','dpangestu@yahoo.com','912983430856','912983430856'),
('932041731856','Ilsa Maria Usada','Perempuan','Singkawang','1980-05-13','Pengajar','Kristen','Gg. Basoka No. 705, Bengkulu 5','(+62) 884 750 467','ellis.maryati@yahoo.com','932041731856','932041731856'),
('985213267453','Vanesa Yolanda','Perempuan','Palu','1982-09-07','Pengajar','Kristen','Ki. Ki Hajar Dewantara No. 539','(+62) 284 9718 338','dwidiastuti@yahoo.com','985213267453','985213267453');

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

/*Data for the table `tb_japel` */

insert  into `tb_japel`(`id`,`id_kelas`,`id_mapel`,`hari`,`jam`,`tahun_ajaran`) values 
(17,1,1,'Senin','07:30 - 09:00','2019/2020'),
(18,1,2,'Senin','09:00 - 10:30','2019/2020'),
(19,1,1,'Selasa','07:30 - 09:00','2019/2020'),
(20,1,2,'Selasa','09:00 - 10:30','2019/2020'),
(21,1,4,'Rabu','07:30 - 09:00','2019/2020'),
(22,1,6,'Rabu','09:00 - 10:30','2019/2020'),
(23,1,7,'Kamis','07:30 - 09:00','2019/2020'),
(24,1,1,'Kamis','09:00 - 10:30','2019/2020'),
(25,1,1,'Jumat','07:30 - 09:00','2019/2020'),
(26,1,2,'Jumat','09:00 - 10:30','2019/2020'),
(27,1,5,'Sabtu','07:30 - 09:00','2019/2020');

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL,
  `wali_kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`id_kelas`,`nama_kelas`,`thn_ajaran`,`wali_kelas`) values 
(1,'1','2019/2020','136246658568'),
(2,'2','2019/2020','140619945987'),
(3,'3','2019/2020','165253709862'),
(4,'4','2019/2020','198538913258'),
(5,'5','2019/2020','310778830365'),
(6,'6','2019/2020','319495996256');

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id`,`nama_mapel`) values 
(1,'Bahasa Indonesia'),
(2,'Matematika'),
(3,'Bahasa Inggris'),
(4,'Pendidikan Agama dan Budi Pekerti'),
(5,'Pendidikan Jasmani, Olahraga dan Kesehatan'),
(6,'Pendidikan Pancasila dan Kewarganegaraan'),
(7,'Seni Budaya dan Prakarya');

/*Table structure for table `tb_mapel_guru` */

DROP TABLE IF EXISTS `tb_mapel_guru`;

CREATE TABLE `tb_mapel_guru` (
  `nip` varchar(20) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel_guru` */

insert  into `tb_mapel_guru`(`nip`,`id_mapel`,`id_kelas`,`thn_ajaran`) values 
('140619945987',4,1,'2019/2020'),
('140619945987',4,2,'2019/2020'),
('140619945987',4,3,'2019/2020'),
('140619945987',4,4,'2019/2020'),
('140619945987',4,5,'2019/2020'),
('140619945987',4,6,'2019/2020'),
('136246658568',1,1,'2019/2020'),
('136246658568',2,1,'2019/2020'),
('136246658568',6,1,'2019/2020'),
('136246658568',7,1,'2019/2020'),
('165253709862',5,1,'2019/2020'),
('165253709862',5,2,'2019/2020'),
('165253709862',5,3,'2019/2020'),
('165253709862',5,4,'2019/2020'),
('165253709862',5,5,'2019/2020'),
('165253709862',5,6,'2019/2020');

/*Table structure for table `tb_nilai` */

DROP TABLE IF EXISTS `tb_nilai`;

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `nisn` int(20) NOT NULL,
  `jns_nilai` varchar(50) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai` */

insert  into `tb_nilai`(`id_nilai`,`id_kelas`,`id_mapel`,`nisn`,`jns_nilai`,`nilai`,`thn_ajaran`,`semester`) values 
(19,1,1,101521564,'Tugas 1','80','2019/2020',1),
(20,1,1,101521564,'Tugas 2','80','2019/2020',1),
(21,1,1,101521564,'Tugas 3','80','2019/2020',1),
(22,1,1,101521564,'UTS','85','2019/2020',1),
(23,1,1,101521564,'UAS','90','2019/2020',1),
(24,1,2,101521564,'Tugas 1','75','2019/2020',1),
(25,1,2,101521564,'Tugas 2','80','2019/2020',1),
(26,1,2,101521564,'Tugas 3','80','2019/2020',1),
(27,1,2,101521564,'UTS','80','2019/2020',1),
(28,1,2,101521564,'UAS','80','2019/2020',1),
(29,1,6,101521564,'Tugas 1','80','2019/2020',1),
(30,1,6,101521564,'Tugas 2','80','2019/2020',1),
(31,1,6,101521564,'Tugas 3','90','2019/2020',1),
(32,1,6,101521564,'UTS','90','2019/2020',1),
(33,1,6,101521564,'UAS','90','2019/2020',1);

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

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`id_pegawai`,`nama`,`username`,`password`,`level`) values 
(1,'Tata Usaha','tatausaha','tatausaha','Tata Usaha'),
(2,'Kepala Sekolah','kepsek','kepsek','Kepala Sekolah');

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

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`nisn`,`nama_siswa`,`jk`,`tempat_lahir`,`tgl_lahir`,`agama`,`alamat`,`telp_siswa`,`status_siswa`,`nama_ayah`,`thn_lahir_ayah`,`pendidikan_ayah`,`pekerjaan_ayah`,`penghasilan_ayah`,`telp_ayah`,`nama_ibu`,`thn_lahir_ibu`,`pendidikan_ibu`,`pekerjaan_ibu`,`penghasilan_ibu`,`telp_ibu`,`kelas`,`username`,`password`) values 
('101521102','Landok','Laki-Laki','Karangasem','2020-04-09','Budha','Ki. Urip Sumoharjo No. 310, Parepare 63588, MalUt','+62738838939','Aktif','Raden Landok',1967,'SD','Guru','5,000,000','+62 8977788','Raden Ajeng Landok',1970,'S1','Guru','3,500,000','+62 983242834',1,'101521102','101521102'),
('101521123','Ni Putu Aniek Kendra','Perempuan','Gianyar','2020-04-03','Islam','Ds. Asia Afrika No. 700, Tanjungbalai 59431, KalBar','+6234344848','Aktif','Raden Adah',1967,'SMP','Guru','5,000,000','+62 8977788','Raden Ajeng Adah',1970,'S1','Guru','3,500,000','+62 983242834',1,'101521123','101521123'),
('101521456','Septo Santoso','Laki-Laki','Denpasar','2020-04-01','Islam','Dk. Untung Suropati No. 75, Yogyakarta 79254, Riau','+62093888','Aktif','Raden Santoso',1967,'S1','Dosen','5,000,000','+62 8977788','Raden Ajeng Santoso',1970,'S1','Koki','3,500,000','+62 983242834',1,'101521456','101521456'),
('101521564','Abdur Simbonang','Laki-Laki','Kuta','2020-04-04','Kristen','Dk. Sugiyopranoto No. 32, Mataram 91494, PapBar','+6287899','Aktif','Raden Simbonang',1968,'SMA','Dosen','10,000,000','+62 8977788','Raden Ajeng Simbonan',1970,'SMA','Koki','4,500,000','+62 983242834',1,'101521564','101521564'),
('101521654','Putri Batakula','Perempuan','Tabanan','2020-04-02','Hindu','Jln. Abdul No. 592, Pasuruan 97762, Papua','+629988899','Aktif','Raden Batakula',1968,'SMA','Dosen','10,000,000','+62 8977788','Raden Ajeng Batakula',1970,'SMA','Dosen','4,500,000','+62 983242834',1,'101521654','101521654'),
('101521898','Santok kun','Perempuan','Tete Batu','2020-04-11','Islam','Ki. Bahagia No. 646, Blitar 95554, BaBel','+62546767','Aktif','Raden Santok',1967,'SMA','Guru','10,000,000','+62 8977788','Raden Ajeng Santok',1970,'SMP','Koki','4,500,000','+62 983242834',1,'101521898','101521898'),
('105711515','Ani Puspa Nasyidah','Perempuan','Kotamobagu','2012-06-01','Kristen','Jr. Bara Tambar No. 119, Tangerang Selatan 27706, Papua','0277 6016 300','Aktif','Kani Aryani',2014,'S1','ipsa','3339942','(+62) 650 8313 6192','Dodo Salahudin',2013,'SMP','cumque','4394081','(+62) 459 6087 0227',2,'105711515','105711515'),
('105782149','Hasna Shakila Hastuti','Perempuan','Tidore Kepulauan','2001-11-23','Kristen','Ds. Basoka Raya No. 184, Jayapura 11859, JaTim','(+62) 26 0287 458','Aktif','Catur Zulkarnain',2013,'S1','ipsum','2950826','0552 9073 282','Raina Wijayanti',1985,'SMP','voluptas','3429834','(+62) 791 1971 9084',2,'105782149','105782149'),
('10976999','Jagapati Sinaga','Perempuan','Sorong','2017-09-22','Kristen','Ds. Bakhita No. 40, Lhokseumawe 74980, SulTeng','(+62) 948 5884 7113','Aktif','Rahmi Nasyiah',2011,'S1','quis','2309220','(+62) 639 1954 1243','Qori Rahimah',1996,'SD','laborum','1865141','(+62) 877 915 294',5,'10976999','10976999'),
('115926939','Kala Irawan','Laki-Laki','Semarang','2016-08-24','Kristen','Dk. Achmad No. 510, Tidore Kepulauan 22302, Lampung','(+62) 606 2072 565','Aktif','Bahuraksa Suwarno S.',1983,'SMA','accusantium','3822161','0966 9875 6406','Tomi Rajasa',2020,'Tidak Sekolah','aut','4229558','0677 7526 301',6,'115926939','115926939'),
('126069822','Kuncara Nardi Sihombing','Laki-Laki','Banjarmasin','1977-05-10','Kristen','Dk. Wahid Hasyim No. 966, Surabaya 55084, KalBar','(+62) 837 054 984','Aktif','Michelle Mardhiyah',1973,'S1','in','1960294','0454 8732 5667','Rahmi Novitasari',2015,'S3','quidem','2239530','0557 0338 124',6,'126069822','126069822'),
('129351635','Irnanto Hutapea','Laki-Laki','Parepare','1974-01-01','Kristen','Dk. Astana Anyar No. 415, Tomohon 74116, KalBar','(+62) 210 0933 311','Aktif','Vanya Gasti Suartini',1981,'SMA','possimus','1993258','0700 2393 3114','Lukman Natsir',1998,'SD','aliquam','3435133','028 6329 643',5,'129351635','129351635'),
('13165425','Ifa Suartini','Perempuan','Tangerang','2015-01-02','Kristen','Ki. Supono No. 116, Banda Aceh 50722, KalTeng','(+62) 717 4809 9422','Aktif','Icha Usada',2016,'S1','ex','4379377','(+62) 772 7206 3625','Kusuma Pranowo',1975,'S1','est','3924532','0484 8022 366',3,'13165425','13165425'),
('139602109','Gadang Kenari Hidayanto','Perempuan','Madiun','1981-05-10','Kristen','Gg. Salatiga No. 464, Bukittinggi 50386, Papua','(+62) 804 286 532','Aktif','Kenzie Uwais',1981,'S1','in','1328805','(+62) 481 5940 521','Ajeng Nova Pertiwi',2009,'S1','magnam','1878813','0839 271 867',2,'139602109','139602109'),
('147516308','Cakrajiya Tarihoran','Perempuan','Sorong','1972-01-04','Kristen','Gg. Sutoyo No. 229, Malang 61410, DKI','(+62) 542 6751 537','Aktif','Yance Nabila Mulyani',1970,'S1','aut','3413599','(+62) 555 9874 922','Dalima Violet Aryani',1992,'S2','qui','4534855','0991 6766 3727',2,'147516308','147516308'),
('149907544','Lulut Hadi Pradana','Laki-Laki','Bekasi','1975-06-26','Kristen','Ds. Sam Ratulangi No. 536, Gorontalo 34512, KalBar','(+62) 792 2958 085','Aktif','Titi Suryatmi',1990,'S2','voluptatibus','4667316','0452 1860 8259','Candrakanta Jaga Mar',1977,'SMA','dolor','4770828','0208 6989 692',2,'149907544','149907544'),
('151012423','Ira Hesti Laksita','Perempuan','Pontianak','2008-01-31','Kristen','Gg. Sukajadi No. 890, Padangsidempuan 56460, KalUt','0525 8929 649','Aktif','Rini Usada',1985,'Tidak Sekolah','at','3260247','0979 8868 203','Farhunnisa Shakila N',1998,'S3','assumenda','1476623','(+62) 29 1813 230',5,'151012423','151012423'),
('157500944','Rachel Wastuti','Laki-Laki','Ternate','1996-02-16','Kristen','Jln. Labu No. 495, Sungai Penuh 68080, KalSel','0816 477 070','Aktif','Hartaka Karma Hardia',1973,'Tidak Sekolah','pariatur','3533183','024 3464 815','Karya Sihotang',1975,'Tidak Sekolah','saepe','2867332','0622 0759 8313',2,'157500944','157500944'),
('159343059','Sakti Waskita','Perempuan','Balikpapan','2011-11-22','Kristen','Ds. Bakti No. 498, Jambi 83313, SulSel','(+62) 925 3534 025','Aktif','Prayogo Sitorus',1988,'S1','in','4787273','(+62) 997 2453 300','Artanto Ganjaran Wah',1971,'SMP','eius','1683638','(+62) 247 0768 936',4,'159343059','159343059'),
('16695593','Humaira Kusmawati','Perempuan','Pasuruan','1999-11-04','Kristen','Psr. Flora No. 912, Pagar Alam 36820, SumBar','0703 4799 308','Aktif','Wardi Nashiruddin',1974,'S2','sapiente','1152429','0517 8961 2281','Harjaya Argono Harya',1980,'SD','modi','3301666','0641 3512 7877',4,'16695593','16695593'),
('178162939','Rangga Ardianto','Perempuan','Prabumulih','1973-01-19','Kristen','Kpg. Baya Kali Bungur No. 733, Gunungsitoli 26901, SumUt','0655 0755 2045','Aktif','Ghani Hartana Nugroh',1978,'S2','nihil','2405790','0610 2751 905','Sabrina Wani Purwant',2001,'SMP','facere','2887292','(+62) 790 3734 694',6,'178162939','178162939'),
('17899854','Bahuraksa Saragih','Laki-Laki','Bitung','1973-11-08','Kristen','Psr. Umalas No. 494, Makassar 28349, KalTim','(+62) 853 7798 894','Aktif','Sadina Rahmawati',1990,'S1','perspiciatis','4041262','(+62) 541 9349 071','Kairav Tampubolon',2015,'S1','repellendus','4083618','(+62) 21 9825 8873',6,'17899854','17899854'),
('185663691','Irsad Setiawan','Laki-Laki','Ternate','1999-09-01','Kristen','Psr. Halim No. 672, Manado 84449, PapBar','0412 1678 5759','Aktif','Gantar Hadi Natsir',1995,'SMA','sit','2800468','(+62) 750 6842 280','Rini Lili Lestari',2008,'Tidak Sekolah','eos','4039224','0829 9990 762',4,'185663691','185663691'),
('197590766','Cinta Uli Kusmawati','Laki-Laki','Bengkulu','2017-02-07','Kristen','Ki. Otto No. 46, Kediri 65462, SumSel','0611 4921 538','Aktif','Farhunnisa Maria Pra',1972,'Tidak Sekolah','quisquam','1387780','0732 5593 8442','Gina Kusmawati',1993,'S3','ut','3538359','0900 9120 869',3,'197590766','197590766'),
('210136764','Hendri Wira Damanik','Laki-Laki','Surakarta','2018-11-27','Kristen','Jr. Baranangsiang No. 371, Batam 70219, SulSel','(+62) 862 780 048','Aktif','Karma Mangunsong M.K',2014,'SMA','perferendis','1194612','(+62) 288 4962 6784','Bahuwirya Kusumo',2005,'SMP','cumque','4957551','0444 0894 927',5,'210136764','210136764'),
('21051075','Salimah Novitasari','Perempuan','Sukabumi','1980-03-08','Kristen','Psr. Basoka Raya No. 915, Palu 18018, Bengkulu','0417 7809 945','Aktif','Ridwan Daruna Suryon',1972,'S3','soluta','2602814','(+62) 264 0455 2247','Mahfud Damanik',1996,'S2','velit','3312726','(+62) 227 5145 418',4,'21051075','21051075'),
('216820295','Karen Yuliana Melani','Laki-Laki','Ambon','2015-03-27','Kristen','Jr. Raya Ujungberung No. 979, Solok 94485, Bali','(+62) 610 1343 860','Aktif','Kalim Hidayat',1979,'S3','blanditiis','2066934','(+62) 381 0107 363','Yuliana Oktaviani M.',1992,'SMP','facilis','3787275','(+62) 22 0427 6201',1,'216820295','216820295'),
('219213583','Mahdi Marbun','Laki-Laki','Depok','1997-10-19','Kristen','Psr. Baranang No. 61, Surakarta 31537, KalUt','0655 0495 9864','Aktif','Upik Adikara Marbun',1979,'S1','omnis','4934020','(+62) 286 8919 2633','Fitria Usada',2008,'Tidak Sekolah','et','3356813','0833 066 004',4,'219213583','219213583'),
('222094715','Jessica Yani Andriani','Laki-Laki','Kendari','1988-07-25','Kristen','Jr. Sugiyopranoto No. 678, Bitung 66824, Jambi','(+62) 702 6292 7376','Aktif','Balamantri Situmoran',1996,'S2','qui','2961715','0289 6923 902','Ilsa Astuti',2002,'SMP','quod','3033184','024 0827 993',5,'222094715','222094715'),
('223842188','Maman Nashiruddin','Laki-Laki','Bogor','1972-07-29','Kristen','Jln. Gading No. 595, Denpasar 32058, Aceh','0344 3171 250','Aktif','Luis Viktor Habibi',1991,'SMP','consequatur','2868471','0493 4655 320','Jelita Laksmiwati',2012,'SMP','minima','4338643','0391 7442 266',5,'223842188','223842188'),
('225871102','Vero Nababan','Perempuan','Padangsidempuan','2017-08-02','Kristen','Dk. Kyai Gede No. 411, Ternate 98813, JaBar','0599 1913 6387','Aktif','Aurora Lestari',2015,'S3','maxime','4744502','(+62) 663 0347 365','Natalia Novitasari S',2012,'SMP','harum','4657590','0891 0980 4035',2,'225871102','225871102'),
('230686559','Nrima Wibowo','Perempuan','Langsa','2016-10-05','Kristen','Dk. Bak Mandi No. 323, Yogyakarta 28947, DIY','024 6221 5629','Aktif','Rini Iriana Mayasari',2000,'S1','neque','2610585','(+62) 267 1369 8108','Alambana Yosef Mahen',2001,'SMP','perferendis','3754449','0562 4116 3409',5,'230686559','230686559'),
('23349161','Luluh Sirait','Laki-Laki','Bandar Lampung','1995-03-06','Kristen','Kpg. Karel S. Tubun No. 465, Bogor 71050, SulBar','(+62) 561 7771 6821','Aktif','Uli Prastuti',1988,'SMA','quaerat','4365297','0850 845 298','Ibun Rahmat Pradipta',2016,'S1','voluptates','3434489','(+62) 434 8219 3106',1,'23349161','23349161'),
('25288245','Muni Pangestu','Laki-Laki','Payakumbuh','1971-07-17','Kristen','Gg. Nanas No. 886, Administrasi Jakarta Pusat 54997, NTT','(+62) 479 9628 690','Aktif','Asirwanda Nashiruddi',2017,'S2','asperiores','2121350','(+62) 889 296 557','Harsanto Firgantoro',1971,'S3','cum','2463380','(+62) 630 7389 416',1,'25288245','25288245'),
('256438395','Zelaya Mandasari','Laki-Laki','Tasikmalaya','2012-12-07','Kristen','Psr. Nakula No. 753, Denpasar 19879, SulBar','(+62) 25 0883 021','Aktif','Qori Suartini',1991,'S2','eius','3758641','(+62) 415 1689 058','Icha Yulianti S.Sos',2018,'SMP','id','2673452','0432 4272 616',1,'256438395','256438395'),
('272148078','Kiandra Puspasari','Perempuan','Bontang','2017-07-26','Kristen','Kpg. Thamrin No. 864, Bau-Bau 11195, MalUt','0261 0170 2439','Aktif','Hartana Bagas Jailan',2013,'SMP','maxime','1191540','(+62) 754 7352 7293','Artawan Adriansyah',1973,'S1','aut','4693339','(+62) 223 6090 693',3,'272148078','272148078'),
('273023633','Asmuni Nashiruddin','Perempuan','Kotamobagu','2001-07-13','Kristen','Psr. Ciwastra No. 779, Tanjungbalai 70525, KalTeng','027 1006 885','Aktif','Jaiman Putra',2018,'S1','quos','3744867','0243 9016 3457','Salman Marpaung M.Fa',2008,'SMA','est','4084219','(+62) 29 6462 344',4,'273023633','273023633'),
('279801434','Tira Astuti','Laki-Laki','Cimahi','2004-01-12','Kristen','Dk. Pasir Koja No. 566, Medan 32184, NTT','(+62) 330 8087 043','Aktif','Prayogo Umaya Adrian',1984,'S1','possimus','3653568','(+62) 959 2389 717','Wakiman Sirait',1983,'SMA','est','2867370','(+62) 412 4626 702',4,'279801434','279801434'),
('286331988','Lasmono Balijan Lazuardi','Laki-Laki','Tual','1985-01-29','Kristen','Gg. Abang No. 486, Cirebon 90391, Maluku','(+62) 924 4615 3281','Aktif','Halim Ganep Wahyudin',1991,'Tidak Sekolah','eius','2840108','(+62) 639 0121 4300','Raharja Uwais',1989,'S3','sunt','4901259','(+62) 882 5728 7856',4,'286331988','286331988'),
('286625945','Rina Nasyidah','Perempuan','Kendari','1978-03-17','Kristen','Psr. Dipenogoro No. 279, Bogor 49902, NTT','(+62) 218 7471 747','Aktif','Zulfa Lestari',1979,'S2','quia','3865824','0480 2970 1786','Pranawa Samosir S.IP',2015,'S1','sit','4053510','0618 9668 1697',4,'286625945','286625945'),
('294574449','Sabrina Hamima Handayani','Laki-Laki','Sungai Penuh','1982-12-10','Kristen','Jr. Taman No. 635, Batu 60066, SulTeng','(+62) 995 2369 767','Aktif','Jelita Palastri',1972,'S1','saepe','1918494','0827 5344 9922','Ridwan Prakasa',1997,'SMP','qui','4329877','(+62) 281 9356 8776',5,'294574449','294574449'),
('294613833','Mahfud Emong Sitompul','Perempuan','Jayapura','1976-10-13','Kristen','Ds. Daan No. 984, Madiun 58338, Gorontalo','(+62) 792 1865 4370','Aktif','Vera Wastuti',1976,'SD','consequuntur','1476148','(+62) 792 6280 071','Nova Laksita',2009,'Tidak Sekolah','consequuntur','2389744','(+62) 964 3819 283',2,'294613833','294613833'),
('296305094','Citra Melani','Perempuan','Pekalongan','1993-10-12','Kristen','Jr. Pasir Koja No. 993, Depok 52312, MalUt','(+62) 814 564 255','Aktif','Karen Wijayanti',2018,'SMP','magnam','3983179','(+62) 568 6057 6742','Ani Uyainah',1983,'SD','aspernatur','4800295','0241 1980 545',4,'296305094','296305094'),
('305135827','Rizki Pangestu','Laki-Laki','Pekalongan','1973-12-02','Kristen','Psr. Industri No. 543, Ambon 84051, BaBel','0879 4326 429','Aktif','Kamidin Prasasta',1993,'Tidak Sekolah','occaecati','1238410','(+62) 349 7978 529','Ira Tantri Hastuti S',2013,'SMA','voluptas','3393075','(+62) 238 8497 986',5,'305135827','305135827'),
('305684924','Aditya Anggriawan','Laki-Laki','Magelang','1997-11-04','Kristen','Jr. Uluwatu No. 114, Blitar 31256, SulUt','(+62) 281 4095 6527','Aktif','Candrakanta Pardi Si',1977,'SD','temporibus','3625496','(+62) 489 2501 044','Indah Cici Wastuti',2008,'S3','sunt','3790047','(+62) 363 6253 567',5,'305684924','305684924'),
('329858940','Emong Utama','Perempuan','Depok','1993-03-19','Kristen','Ds. Panjaitan No. 284, Palu 46211, MalUt','(+62) 649 8019 096','Aktif','Rahmi Laksmiwati',1985,'S3','et','2162504','0432 3379 2241','Padma Halimah',1978,'S3','eaque','3038203','0896 026 211',2,'329858940','329858940'),
('330178630','Gara Pranata Sitompul','Laki-Laki','Tangerang Selatan','1971-06-30','Kristen','Dk. Ketandan No. 309, Kediri 94463, KalTim','0733 1751 1664','Aktif','Asmianto Panji Setia',1980,'Tidak Sekolah','aliquam','4804599','(+62) 989 4159 711','Mutia Suartini',2009,'SD','ut','2429131','0722 8338 204',1,'330178630','330178630'),
('333073484','Tari Nasyidah','Laki-Laki','Manado','1989-01-01','Kristen','Kpg. Monginsidi No. 299, Singkawang 92532, SumBar','(+62) 895 396 963','Aktif','Lala Yulianti',2003,'S2','illum','1706083','0983 6682 305','Rosman Damar Suryono',1985,'SD','tempora','1459762','0927 0227 5405',2,'333073484','333073484'),
('354079976','Mila Tira Yuliarti','Laki-Laki','Bekasi','1975-07-22','Kristen','Jln. Urip Sumoharjo No. 80, Tangerang Selatan 93940, NTT','0884 4350 454','Aktif','Widya Uyainah',1989,'S2','repudiandae','3310432','024 5346 511','Muni Mahfud Siregar',2012,'SD','et','1635047','021 3715 302',5,'354079976','354079976'),
('356206557','Iriana Yuniar','Laki-Laki','Cilegon','1981-01-01','Kristen','Gg. Abdul No. 970, Tebing Tinggi 18656, KepR','(+62) 908 2016 837','Aktif','Jamalia Susanti',1979,'SMA','dolorem','2477353','(+62) 897 2855 400','Wardi Ibun Simanjunt',2020,'SD','iste','1820348','(+62) 569 3726 3929',3,'356206557','356206557'),
('361987147','Rudi Garda Simanjuntak','Perempuan','Tual','1971-10-23','Kristen','Ds. Suniaraja No. 554, Gorontalo 37889, SulTra','0812 4390 7963','Aktif','Vanya Hastuti M.TI.',1994,'Tidak Sekolah','voluptas','3764539','(+62) 741 6419 0915','Rachel Violet Kusmaw',1989,'Tidak Sekolah','nostrum','4940110','0408 2661 9078',5,'361987147','361987147'),
('374523511','Hamima Natalia Nasyidah','Perempuan','Pangkal Pinang','1982-03-24','Kristen','Dk. Basuki Rahmat  No. 324, Pasuruan 42988, Lampung','(+62) 837 7338 5758','Aktif','Maida Hariyah',1995,'Tidak Sekolah','vitae','2338742','(+62) 826 2627 9304','Ella Hasanah',2013,'SD','minus','4056730','(+62) 799 7656 923',2,'374523511','374523511'),
('388439371','Hairyanto Adriansyah','Perempuan','Parepare','2017-07-04','Kristen','Jr. Baja Raya No. 318, Padangpanjang 18839, Papua','(+62) 801 567 247','Aktif','Intan Puspasari S.Pt',2015,'S1','accusantium','4976477','(+62) 459 9534 5249','Mila Elisa Namaga M.',2018,'SD','nulla','4792743','0519 9485 1877',3,'388439371','388439371'),
('391185090','Kayla Salwa Nurdiyanti','Perempuan','Pematangsiantar','1990-05-04','Kristen','Ki. Jaksa No. 784, Singkawang 79948, KalSel','0290 7279 445','Aktif','Zulaikha Wahyuni',1996,'Tidak Sekolah','et','1858993','029 4116 052','Wira Iswahyudi',1988,'SMA','voluptate','2738722','(+62) 20 9692 671',2,'391185090','391185090'),
('395710560','Darijan Sihombing','Perempuan','Pagar Alam','2019-10-18','Kristen','Jln. Laksamana No. 323, Samarinda 60014, Maluku','(+62) 473 2721 6973','Aktif','Saiful Wisnu Saptono',2012,'S2','et','3409239','(+62) 24 4730 2523','Prima Mulya Mahendra',2017,'S2','ipsam','4920823','(+62) 24 0621 7826',6,'395710560','395710560'),
('435440739','Darimin Bambang Setiawan','Laki-Laki','Tomohon','2004-08-16','Kristen','Ki. Asia Afrika No. 196, Pekanbaru 83395, Bengkulu','0453 3278 6823','Aktif','Nyoman Pratama',1991,'S2','necessitatibus','3165256','(+62) 759 3784 0806','Irwan Mahendra M.Ak',1992,'SMA','odio','1254998','0925 0026 6371',4,'435440739','435440739'),
('439075688','Digdaya Sihombing','Laki-Laki','Pagar Alam','1986-06-08','Kristen','Psr. Nanas No. 189, Ternate 14872, Maluku','0373 2299 316','Aktif','Malika Wulandari',2000,'S2','id','1092586','0750 3541 299','Lulut Hutasoit',1983,'S2','eaque','3351431','0859 363 558',1,'439075688','439075688'),
('439444023','Jaswadi Suwarno','Laki-Laki','Parepare','1981-06-06','Kristen','Kpg. HOS. Cjokroaminoto (Pasirkaliki) No. 733, Padang 85550, SulBar','(+62) 23 3988 553','Aktif','Maimunah Suartini',1977,'Tidak Sekolah','placeat','2246688','(+62) 949 8479 759','Kartika Dian Yuliart',1990,'SD','qui','3214304','0737 5414 1605',6,'439444023','439444023'),
('450266875','Candrakanta Mahendra','Laki-Laki','Dumai','2008-03-11','Kristen','Kpg. Dago No. 475, Administrasi Jakarta Pusat 40668, Papua','0601 7914 866','Aktif','Zelda Paulin Kusmawa',2001,'S1','molestiae','3796864','(+62) 341 7537 521','Ghaliyati Jasmin Yul',2008,'S3','aut','1994365','0631 1593 669',1,'450266875','450266875'),
('452140421','Vero Damar Pranowo','Perempuan','Depok','2019-09-14','Kristen','Gg. Baranangsiang No. 69, Salatiga 88561, Lampung','(+62) 299 0740 4938','Aktif','Sari Sudiati',2016,'S3','dolore','3602020','0802 774 408','Balidin Galuh Iswahy',2001,'S1','et','2504185','(+62) 875 6241 7866',4,'452140421','452140421'),
('456291266','Warji Thamrin','Perempuan','Sukabumi','1976-10-20','Kristen','Jln. Ters. Pasir Koja No. 214, Kendari 33841, SulTra','(+62) 426 5139 2130','Aktif','Carla Hassanah',2007,'S2','sed','3811762','(+62) 473 1092 679','Indah Lestari',2015,'SMP','officiis','4988570','0397 7880 1488',5,'456291266','456291266'),
('456977074','Carla Melinda Widiastuti','Laki-Laki','Padang','1977-02-12','Kristen','Ki. Untung Suropati No. 376, Subulussalam 21039, SulSel','0612 0316 872','Aktif','Hilda Riyanti',1977,'S2','eos','4640409','0406 1484 7957','Sari Anggraini',1995,'S2','odit','4412170','(+62) 23 2664 9904',4,'456977074','456977074'),
('470078883','Balijan Marsito Siregar','Perempuan','Salatiga','2008-02-17','Kristen','Ds. Tambak No. 894, Sawahlunto 73566, KalSel','(+62) 695 7064 909','Aktif','Latika Aryani',2020,'S3','ex','1375984','(+62) 23 0355 0324','Dian Eka Nuraini S.E',1972,'SMA','assumenda','4011102','0416 0932 486',1,'470078883','470078883'),
('482189400','Nyoman Muni Manullang','Perempuan','Langsa','1976-06-09','Kristen','Psr. Abdullah No. 481, Tegal 49963, NTB','0656 9775 1784','Aktif','Oskar Ajimin Mandala',2006,'SMP','vitae','1882137','0657 5648 660','Rama Halim',1992,'S2','eos','4747588','(+62) 968 4125 829',1,'482189400','482189400'),
('487575774','Tomi Samosir','Laki-Laki','Cirebon','1980-06-25','Kristen','Kpg. Sampangan No. 486, Tomohon 32676, SumBar','(+62) 601 0250 4054','Aktif','Karimah Mardhiyah',2015,'S3','et','4998183','(+62) 272 8319 7368','Irsad Dabukke',2001,'SD','autem','1308761','(+62) 917 7629 079',1,'487575774','487575774'),
('492616473','Kasim Putra','Laki-Laki','Samarinda','1990-05-22','Kristen','Jln. Bass No. 730, Makassar 50930, SumSel','0479 7416 272','Aktif','Tira Nurdiyanti',1994,'SD','enim','1330543','0886 4739 949','Fathonah Utami',1985,'SMP','accusamus','1714493','0582 9226 983',4,'492616473','492616473'),
('500827406','Yuliana Astuti','Perempuan','Administrasi Jakarta Timur','1975-09-27','Kristen','Kpg. Bambu No. 77, Pontianak 20941, KepR','(+62) 826 8868 087','Aktif','Julia Nurdiyanti',1986,'S2','architecto','2387659','0982 8367 171','Ifa Almira Lailasari',1999,'S1','rerum','2932379','(+62) 231 1770 871',6,'500827406','500827406'),
('522244351','Syahrini Kuswandari','Perempuan','Binjai','2002-06-09','Kristen','Ds. Suniaraja No. 221, Sukabumi 71813, SulSel','0567 5203 711','Aktif','Yunita Astuti',1994,'S1','soluta','3988753','(+62) 874 375 919','Eja Kasim Megantara',1999,'SMP','vitae','2398263','(+62) 425 8573 897',6,'522244351','522244351'),
('539575856','Mutia Yulianti','Perempuan','Magelang','2014-02-17','Kristen','Jr. Barasak No. 117, Tanjungbalai 85461, Aceh','027 6099 6336','Aktif','Hendri Erik Latupono',1972,'S3','quia','3909608','0730 9156 8787','Heryanto Siregar',2013,'SMP','molestiae','3336229','0848 5217 9162',2,'539575856','539575856'),
('541705747','Koko Upik Iswahyudi','Perempuan','Prabumulih','1989-06-13','Kristen','Gg. Bacang No. 298, Padangsidempuan 63246, DIY','0623 0364 578','Aktif','Shakila Nasyiah',1979,'SMP','iste','1114348','(+62) 388 5536 749','Ida Handayani',2004,'SD','et','2823408','0862 3974 5901',4,'541705747','541705747'),
('543531251','Patricia Mandasari','Perempuan','Semarang','1973-10-08','Kristen','Psr. K.H. Wahid Hasyim (Kopo) No. 482, Padangpanjang 69553, SulSel','0635 0381 9348','Aktif','Ajimat Firmansyah S.',2004,'SD','repellat','2124147','(+62) 975 1227 522','Mulyono Pandu Prakas',1976,'SD','voluptates','2638944','(+62) 855 516 781',6,'543531251','543531251'),
('548974475','Lili Puspita','Laki-Laki','Banda Aceh','1984-09-25','Kristen','Ki. Wora Wari No. 563, Banjar 56499, KalTim','(+62) 656 9825 9788','Aktif','Kamila Suryatmi',2002,'SMA','cumque','4233714','0468 1262 0456','Saiful Kuswoyo',1986,'SMP','odio','4925812','0983 3012 566',2,'548974475','548974475'),
('551568704','Anastasia Wastuti','Laki-Laki','Serang','1998-06-05','Kristen','Jr. Pelajar Pejuang 45 No. 904, Balikpapan 40381, DKI','0257 9938 295','Aktif','Gilda Cornelia Rahay',2017,'S1','repellat','3426203','(+62) 271 8676 863','Cici Yuni Yuliarti',1972,'SMP','aut','2195125','(+62) 609 7678 7744',2,'551568704','551568704'),
('559571445','Gaiman Najmudin','Perempuan','Bengkulu','1976-08-20','Kristen','Ds. Wahidin Sudirohusodo No. 758, Pekalongan 55824, SumUt','(+62) 595 3023 7497','Aktif','Sadina Sari Wastuti',2000,'S2','dicta','3154535','0388 9546 274','Cakrawala Natsir',2015,'SD','repellendus','2134415','0340 7238 555',3,'559571445','559571445'),
('560637112','Dewi Zulaikha Hasanah','Laki-Laki','Kendari','2020-07-07','Kristen','Dk. Mahakam No. 461, Cimahi 35128, SulTra','(+62) 451 3624 6449','Aktif','Elon Jinawi Nugroho ',1997,'S3','incidunt','3794071','0946 7626 427','Oskar Nainggolan',1971,'S3','animi','3226894','(+62) 857 2771 6198',4,'560637112','560637112'),
('567847050','Nardi Sitompul','Perempuan','Medan','1977-03-01','Kristen','Psr. Baranang Siang Indah No. 187, Sungai Penuh 77169, Aceh','(+62) 603 3592 7030','Aktif','Pandu Bagus Prayoga',2008,'SD','ut','4746919','(+62) 505 2288 5594','Zamira Yuliana Rahay',2001,'SMA','et','3024319','0383 9201 0809',2,'567847050','567847050'),
('571269971','Rahmat Edi Sirait','Laki-Laki','Tasikmalaya','2015-01-25','Kristen','Dk. HOS. Cjokroaminoto (Pasirkaliki) No. 427, Manado 52990, Bali','(+62) 991 0256 683','Aktif','Cinthia Kasiyah Wija',2002,'SD','est','4330488','0272 8760 4181','Genta Rahayu',2001,'S3','voluptatem','2295091','0523 6884 9082',6,'571269971','571269971'),
('581218403','Oni Nadia Yuliarti','Laki-Laki','Binjai','1986-11-05','Kristen','Jln. Ciumbuleuit No. 827, Medan 14483, JaTim','(+62) 535 6149 480','Aktif','Cakrajiya Sinaga',1980,'SMA','fuga','1100703','(+62) 453 7703 8708','Eva Susanti',2000,'S1','occaecati','1451217','(+62) 213 9641 172',2,'581218403','581218403'),
('58266101','Kani Vera Melani','Perempuan','Payakumbuh','1980-02-20','Kristen','Kpg. Baabur Royan No. 137, Pekalongan 54298, Papua','0428 2681 447','Aktif','Salwa Gabriella Nasy',2014,'S3','quo','1168850','0232 9900 134','Gading Waluyo',2011,'S3','quia','1997961','(+62) 578 5669 1523',2,'58266101','58266101'),
('587448609','Timbul Sitompul','Perempuan','Probolinggo','2005-06-29','Kristen','Jln. Kartini No. 963, Metro 19061, SulTra','(+62) 845 092 319','Aktif','Raden Saragih',1986,'S2','quis','3658369','(+62) 923 5558 6193','Vivi Pudjiastuti',1981,'S2','a','4168765','(+62) 578 3364 6520',1,'587448609','587448609'),
('591072799','Mutia Ulya Mandasari','Perempuan','Subulussalam','1982-01-14','Kristen','Ds. Ahmad Dahlan No. 724, Magelang 92377, SulTra','0500 7713 0689','Aktif','Nurul Handayani',1970,'SMP','est','1456301','(+62) 22 3282 3478','Talia Safitri S.Kom',1971,'S1','molestiae','1359850','0694 1690 408',1,'591072799','591072799'),
('594153662','Ajeng Tari Anggraini','Laki-Laki','Sabang','1990-07-28','Kristen','Psr. Cokroaminoto No. 766, Binjai 76652, Gorontalo','0624 9336 180','Aktif','Maryadi Saefullah',1992,'SD','adipisci','1513963','(+62) 776 3187 622','Adhiarja Manullang',2006,'S3','nemo','1486502','(+62) 619 6018 8809',5,'594153662','594153662'),
('599882498','Kiandra Maryati','Laki-Laki','Mataram','1998-04-25','Kristen','Gg. Diponegoro No. 470, Parepare 39155, JaTim','022 6690 631','Aktif','Perkasa Panca Gunawa',2002,'S1','numquam','4015162','0800 2566 6331','Surya Irwan Gunawan ',1995,'S2','dolorem','3587572','0704 8771 2946',1,'599882498','599882498'),
('606594672','Sadina Hariyah','Laki-Laki','Tomohon','1976-08-29','Kristen','Kpg. Pasir Koja No. 265, Blitar 54791, Jambi','0644 3313 541','Aktif','Puji Nurdiyanti S.Pd',2013,'SMP','architecto','3992779','(+62) 821 640 328','Kunthara Dongoran S.',2013,'Tidak Sekolah','doloribus','4566010','(+62) 952 7209 3307',3,'606594672','606594672'),
('608552840','Gaman Dabukke','Laki-Laki','Bukittinggi','1971-02-20','Kristen','Psr. Abdul. Muis No. 736, Pekanbaru 82081, Jambi','(+62) 515 2979 3109','Aktif','Cahyono Budiman',1986,'S3','fuga','4373168','028 8501 2150','Novi Samiah Yulianti',2017,'SD','sed','3371175','0376 6874 2667',4,'608552840','608552840'),
('61104177','Setya Wibisono','Perempuan','Payakumbuh','2001-03-21','Kristen','Gg. Bagis Utama No. 41, Palu 50946, KalBar','0304 1818 7085','Aktif','Laras Nasyiah S.E.I',1973,'Tidak Sekolah','magnam','3252066','0576 6166 8996','Winda Yuniar',1980,'S2','et','4245031','0342 2291 3746',6,'61104177','61104177'),
('611580276','Syahrini Lalita Lestari','Laki-Laki','Salatiga','1978-11-14','Kristen','Ds. Ki Hajar Dewantara No. 175, Sawahlunto 80526, JaTim','0499 5029 049','Aktif','Rika Yuni Rahayu',1982,'SMP','eveniet','2960044','(+62) 967 2730 025','Dadi Firmansyah',1974,'S1','commodi','4437888','0835 217 209',3,'611580276','611580276'),
('640543860','Ivan Elvin Prabowo','Perempuan','Bogor','1998-08-10','Kristen','Jln. Barat No. 637, Tasikmalaya 34828, JaBar','(+62) 527 2079 5856','Aktif','Gamani Indra Budiyan',1991,'SD','labore','4190714','(+62) 898 8070 585','Kadir Kemba Hakim M.',1973,'S1','vel','4464265','029 1017 933',6,'640543860','640543860'),
('655865635','Drajat Ramadan','Perempuan','Serang','2013-01-30','Kristen','Ki. Bass No. 75, Padangpanjang 79575, JaTeng','(+62) 880 7158 855','Aktif','Kamaria Yolanda S.E.',1974,'S1','similique','4922332','(+62) 306 4216 1566','Karsana Habibi S.Pt',1997,'S1','consequatur','4485931','(+62) 634 1064 462',4,'655865635','655865635'),
('658604218','Fathonah Fujiati','Perempuan','Makassar','1979-01-19','Kristen','Jln. Bakhita No. 233, Kediri 39880, JaTeng','(+62) 852 264 025','Aktif','Diah Yuliarti',2016,'SMA','fuga','2672524','021 9681 311','Digdaya Ramadan',2000,'SMA','accusantium','1846938','(+62) 880 3354 5464',4,'658604218','658604218'),
('661430127','Amalia Rahmawati','Perempuan','Cilegon','1991-08-05','Kristen','Gg. Bakit  No. 541, Palembang 22418, Banten','0572 3924 3530','Aktif','Maimunah Sudiati',1972,'S2','dolore','2828200','(+62) 625 3878 2306','Kamaria Zelda Haryan',1988,'S3','animi','1844211','(+62) 323 2749 7490',2,'661430127','661430127'),
('673997490','Diana Prastuti','Laki-Laki','Sungai Penuh','1989-02-10','Kristen','Ds. Dewi Sartika No. 827, Padang 35538, KalTeng','(+62) 718 8458 7080','Aktif','Kania Yolanda M.Kom.',1987,'SMA','repudiandae','4069696','0756 1191 450','Ibrahim Tamba M.Farm',2012,'SMA','aut','4343976','021 4658 8838',6,'673997490','673997490'),
('674562216','Najam Narpati','Perempuan','Mataram','2011-05-10','Kristen','Ki. Barasak No. 694, Administrasi Jakarta Barat 74723, Gorontalo','0762 3294 6915','Aktif','Cahyo Kusumo',1998,'SD','totam','3673597','(+62) 974 9508 368','Tri Waluyo',2019,'Tidak Sekolah','quis','2769954','(+62) 349 6896 807',3,'674562216','674562216'),
('674609191','Warsita Pratama','Laki-Laki','Palembang','1984-06-30','Kristen','Gg. Katamso No. 80, Administrasi Jakarta Utara 11828, SulTra','(+62) 745 6312 942','Aktif','Akarsana Siregar S.S',1981,'SMA','pariatur','3015756','(+62) 238 9197 249','Rahmi Melani S.T.',2005,'S2','sint','3941725','(+62) 886 9336 691',2,'674609191','674609191'),
('684186665','Widya Rahimah','Perempuan','Kupang','1998-07-18','Kristen','Ds. K.H. Wahid Hasyim (Kopo) No. 380, Langsa 29612, JaTeng','0253 5374 2148','Aktif','Darijan Napitupulu S',1998,'SMP','ex','1620055','0861 2572 218','Atma Sitompul',1995,'S1','illo','2831683','(+62) 819 5711 573',6,'684186665','684186665'),
('700292672','Dinda Winarsih','Laki-Laki','Pekalongan','1991-12-26','Kristen','Ds. Baik No. 377, Padangsidempuan 12665, DIY','0956 7506 234','Aktif','Gading Ganjaran Habi',1997,'S3','id','3093127','(+62) 855 717 249','Vanya Jamalia Wuland',1996,'S1','beatae','2177209','(+62) 845 026 906',6,'700292672','700292672'),
('712339274','Ika Hilda Melani','Laki-Laki','Padang','1991-04-10','Kristen','Ds. Bakhita No. 24, Kediri 14715, MalUt','0321 5578 5178','Aktif','Praba Nainggolan',2007,'S3','magni','4984794','(+62) 628 0443 850','Ira Hariyah',1980,'S2','vitae','3270502','0562 3185 0356',2,'712339274','712339274'),
('71543745','Jaka Kusumo','Laki-Laki','Palu','2001-10-25','Kristen','Jln. R.M. Said No. 934, Mataram 71704, Bengkulu','(+62) 555 3039 829','Aktif','Maimunah Yuniar',1976,'S2','voluptas','1014856','(+62) 573 7986 532','Mala Mulyani',1981,'Tidak Sekolah','ab','1957929','0365 1868 9118',3,'71543745','71543745'),
('716107871','Johan Ganep Winarno','Laki-Laki','Pekalongan','2012-10-27','Kristen','Gg. Banceng Pondok No. 208, Padangsidempuan 73024, Banten','(+62) 554 5104 1688','Aktif','Adikara Marbun',2009,'SMP','commodi','2763823','(+62) 884 5861 7564','Caturangga Kurniawan',2020,'SD','consequatur','1561975','(+62) 28 5388 8080',5,'716107871','716107871'),
('723744634','Radika Siregar','Perempuan','Yogyakarta','2018-04-07','Kristen','Ds. Suryo No. 779, Malang 82156, DIY','(+62) 543 2682 9358','Aktif','Puput Astuti',1970,'S2','placeat','1816478','(+62) 451 6695 784','Balidin Saefullah',1996,'Tidak Sekolah','ut','2521377','0338 0537 307',4,'723744634','723744634'),
('725033695','Eka Laksmiwati','Perempuan','Sorong','2005-12-29','Kristen','Psr. Sadang Serang No. 425, Bogor 53498, SulSel','0643 7418 230','Aktif','Zaenab Purwanti',1996,'SD','asperiores','2511505','0886 6756 640','Laswi Firmansyah S.F',1990,'S1','aut','2463335','0583 9561 713',5,'725033695','725033695'),
('726087087','Jarwadi Situmorang','Laki-Laki','Tual','1983-03-25','Kristen','Gg. Basudewo No. 440, Pematangsiantar 52780, Aceh','(+62) 766 9138 669','Aktif','Ajimin Marpaung',1986,'SMP','consequuntur','4395019','(+62) 381 0368 0136','Mursinin Hidayanto',1992,'S1','sint','2670753','0486 5606 188',3,'726087087','726087087'),
('729271003','Raihan Rajata','Laki-Laki','Salatiga','2003-05-03','Kristen','Psr. Panjaitan No. 861, Pematangsiantar 88067, Bengkulu','0529 3136 0729','Aktif','Rahayu Sakura Aryani',1987,'Tidak Sekolah','accusamus','1766091','(+62) 617 4132 912','Galuh Nainggolan',1972,'Tidak Sekolah','deleniti','1154643','0880 5243 516',3,'729271003','729271003'),
('737919322','Hani Hamima Padmasari','Perempuan','Sungai Penuh','2001-05-10','Kristen','Jr. Raya Setiabudhi No. 539, Serang 34309, PapBar','021 8107 460','Aktif','Dian Yuliarti',1978,'SMA','nulla','2240601','(+62) 267 0476 680','Rahayu Syahrini Safi',1982,'S1','aut','3607873','(+62) 23 4610 222',5,'737919322','737919322'),
('751371129','Perkasa Wisnu Mangunsong','Laki-Laki','Ternate','2015-10-06','Kristen','Jln. Imam Bonjol No. 748, Kediri 41764, SumBar','(+62) 243 2259 986','Aktif','Uli Permata',2014,'SD','quam','4136473','(+62) 222 1182 0380','Elma Nasyidah',2012,'SD','nesciunt','4383977','0931 1298 9770',3,'751371129','751371129'),
('754519803','Tantri Olivia Handayani','Perempuan','Lhokseumawe','2004-12-08','Kristen','Psr. Halim No. 71, Pontianak 91229, DIY','(+62) 341 2474 9955','Aktif','Kusuma Sitorus',2012,'S2','eveniet','3489495','0323 4246 3822','Jessica Palastri',2015,'S3','ea','2548452','(+62) 522 7482 088',3,'754519803','754519803'),
('75674266','Bahuraksa Waluyo','Laki-Laki','Kotamobagu','1984-01-18','Kristen','Psr. Antapani Lama No. 941, Sibolga 60106, Riau','0572 9835 426','Aktif','Raharja Suryono',2001,'S1','voluptatem','1188483','0843 613 031','Dipa Luluh Maheswara',2000,'SMP','quia','3403007','028 2960 2417',1,'75674266','75674266'),
('766666283','Zelda Aryani','Perempuan','Palu','2004-12-07','Kristen','Psr. Abdul. Muis No. 841, Administrasi Jakarta Barat 41458, KalBar','(+62) 447 5054 060','Aktif','Ajiono Latupono',2004,'S3','est','2510740','(+62) 592 2919 215','Nasim Sitorus S.Kom',1990,'SMA','quibusdam','4059786','0347 3079 182',5,'766666283','766666283'),
('766973126','Pardi Kusumo','Laki-Laki','Tarakan','2000-01-15','Kristen','Jln. Bakau No. 18, Yogyakarta 30179, KalSel','0860 069 361','Aktif','Patricia Susanti',1979,'S2','adipisci','3190713','0379 8589 4010','Martaka Okta Waskita',1990,'SMP','blanditiis','2220611','0248 9948 413',4,'766973126','766973126'),
('771590315','Cakrabirawa Dadap Salahudin','Laki-Laki','Pariaman','1985-07-28','Kristen','Jr. Basoka No. 75, Binjai 63575, Bengkulu','(+62) 27 5269 4955','Aktif','Maria Kusmawati',2006,'Tidak Sekolah','ut','1164375','0714 4232 154','Aslijan Capa Sinaga',2018,'S2','sequi','1040288','0512 7939 2539',3,'771590315','771590315'),
('772593971','Eva Paulin Rahimah','Laki-Laki','Binjai','1982-08-06','Kristen','Dk. Rajawali No. 737, Padangpanjang 33914, Lampung','(+62) 267 4645 5385','Aktif','Mulyono Kusumo',1993,'SD','est','2938029','(+62) 993 2249 132','Opan Jaga Simanjunta',1977,'SMA','qui','4386165','0886 361 117',1,'772593971','772593971'),
('774849995','Asirwanda Maulana','Laki-Laki','Madiun','2015-10-22','Kristen','Jr. Kebonjati No. 24, Administrasi Jakarta Timur 86135, PapBar','(+62) 26 6274 8405','Aktif','Wakiman Wahyudin',2018,'S3','et','3930082','0542 8033 7696','Darmana Cawisadi Jan',1985,'SMA','vitae','2451586','021 2078 664',6,'774849995','774849995'),
('779992737','Ani Suartini','Perempuan','Depok','2009-08-03','Kristen','Kpg. Achmad Yani No. 562, Cirebon 95132, KalBar','(+62) 803 9711 5704','Aktif','Daliman Santoso M.Ak',1998,'S1','tenetur','1412129','0597 1700 109','Cawisadi Hartaka Tha',2006,'S2','in','1844602','0908 1982 5732',4,'779992737','779992737'),
('799713840','Irwan Marbun','Laki-Laki','Pekalongan','1989-07-19','Kristen','Gg. Rajawali No. 437, Pangkal Pinang 27079, PapBar','(+62) 500 6515 4666','Aktif','Nadia Susanti S.Sos',1981,'SMA','consequatur','3908440','(+62) 440 2441 9478','Hendra Kardi Situmor',1998,'SD','laborum','4089767','(+62) 502 2434 3132',1,'799713840','799713840'),
('801372524','Kemba Wasita','Perempuan','Tomohon','1975-03-04','Kristen','Dk. Bambu No. 244, Pematangsiantar 37111, Riau','0372 3161 848','Aktif','Gabriella Farhunnisa',1987,'SMA','maiores','4919210','0248 1324 8375','Oni Nasyidah',2016,'S2','magni','1218069','(+62) 621 2891 417',1,'801372524','801372524'),
('810160729','Raisa Padmasari','Laki-Laki','Batu','1975-04-11','Kristen','Jr. Baranang No. 83, Pontianak 70148, NTB','(+62) 819 676 443','Aktif','Usman Mumpuni Hidaya',2006,'SMP','non','2028311','(+62) 294 4099 1091','Ibrani Mandala',2010,'SD','quod','4047489','(+62) 351 2061 747',3,'810160729','810160729'),
('823770213','Cakrajiya Waskita','Perempuan','Bima','1977-09-07','Kristen','Jln. Kebangkitan Nasional No. 814, Tanjung Pinang 69629, NTT','(+62) 787 0670 9025','Aktif','Indah Mayasari M.M.',2004,'Tidak Sekolah','impedit','3860932','0343 9028 6985','Yuni Belinda Wijayan',2013,'Tidak Sekolah','doloribus','2856693','0903 3093 7605',4,'823770213','823770213'),
('824444743','Chandra Gada Wibisono','Laki-Laki','Solok','1978-10-23','Kristen','Psr. Basoka Raya No. 386, Sabang 10155, DKI','(+62) 882 3441 070','Aktif','Juli Ulya Lestari',1999,'S1','amet','4799721','0883 9855 2853','Sadina Sudiati',2020,'S3','qui','1091102','(+62) 873 7320 765',2,'824444743','824444743'),
('844260736','Salimah Pratiwi','Laki-Laki','Palu','1991-09-08','Kristen','Jln. Ketandan No. 750, Malang 75174, PapBar','(+62) 21 4755 338','Aktif','Laila Wijayanti',1983,'SMA','fuga','1221326','0300 5044 6707','Sabar Adriansyah',1971,'Tidak Sekolah','eligendi','3119549','0577 7800 3976',4,'844260736','844260736'),
('850622076','Maya Lailasari','Laki-Laki','Tarakan','1992-02-24','Kristen','Psr. Abdul Muis No. 726, Makassar 15595, KalSel','(+62) 634 5568 4608','Aktif','Cemplunk Manullang S',1984,'SMP','culpa','2732846','(+62) 22 2900 183','Cemplunk Saputra M.M',1981,'SMP','eum','1312645','027 2410 6423',5,'850622076','850622076'),
('866517463','Lasmanto Mustofa','Perempuan','Bandung','2000-09-17','Kristen','Psr. Hang No. 349, Tomohon 57637, KalTeng','(+62) 986 2473 318','Aktif','Gantar Utama S.Kom',2016,'SMA','beatae','3499609','0622 2859 2005','Diana Agnes Agustina',1992,'SD','eum','1959906','0536 9144 899',6,'866517463','866517463'),
('87574139','Sabrina Nabila Pertiwi','Perempuan','Bekasi','1991-12-13','Kristen','Ds. Ujung No. 963, Pekanbaru 88020, Lampung','0537 9699 818','Aktif','Harjo Aslijan Mustof',1989,'S2','et','2948720','0783 3219 7271','Vino Natsir',1982,'S3','facere','3103967','0777 5217 624',6,'87574139','87574139'),
('88866808','Nadia Tina Sudiati','Perempuan','Palu','1993-05-13','Kristen','Jr. Padma No. 9, Madiun 75553, BaBel','0613 4832 266','Aktif','Safina Hartati S.Far',2001,'SD','est','4693308','0848 902 232','Febi Mardhiyah',2007,'SMA','distinctio','4516469','(+62) 20 2007 912',5,'88866808','88866808'),
('895422925','Ade Sitompul','Laki-Laki','Sorong','2003-08-08','Kristen','Dk. Banda No. 122, Surakarta 95992, PapBar','(+62) 871 838 750','Aktif','Mariadi Hidayanto',1985,'SMA','earum','4261534','0952 2299 9952','Laswi Latupono',2012,'SMP','tempora','4391150','0207 7007 6972',3,'895422925','895422925'),
('90550857','Rafid Bajragin Waluyo','Perempuan','Mataram','1973-02-02','Kristen','Psr. Abdul Muis No. 764, Tasikmalaya 57811, Bengkulu','025 4185 262','Aktif','Daliman Kuswoyo S.Pt',1982,'SMA','est','3921263','(+62) 214 8258 4616','Silvia Uyainah',1983,'Tidak Sekolah','distinctio','2673765','0539 3064 0131',1,'90550857','90550857'),
('906494519','Gabriella Oktaviani','Perempuan','Denpasar','2000-11-19','Kristen','Jr. Kyai Mojo No. 583, Administrasi Jakarta Barat 12622, Gorontalo','(+62) 944 5814 6798','Aktif','Talia Hariyah',1991,'S2','officiis','2600410','0962 0554 1436','Lidya Kusmawati',1998,'SMP','quidem','2892334','(+62) 607 4983 5899',6,'906494519','906494519'),
('907388709','Taufik Eja Hakim','Perempuan','Pariaman','1976-12-21','Kristen','Dk. Badak No. 486, Tangerang Selatan 46660, MalUt','0575 6953 8907','Aktif','Jinawi Kusumo',2011,'S2','minima','1471650','(+62) 807 060 421','Icha Namaga',1984,'Tidak Sekolah','libero','3553531','0325 6199 8207',3,'907388709','907388709'),
('90894458','Edi Tampubolon','Perempuan','Palangka Raya','1994-02-14','Kristen','Jln. Cut Nyak Dien No. 671, Parepare 48656, Riau','0797 1748 2368','Aktif','Oni Amalia Susanti',2000,'SD','repellat','3017835','0838 0324 530','Pangeran Maulana',2017,'S1','dolor','4613587','(+62) 786 4061 0475',6,'90894458','90894458'),
('917797290','Baktiadi Sihotang','Laki-Laki','Cirebon','1983-09-22','Kristen','Ki. Thamrin No. 147, Yogyakarta 46862, Bali','025 5352 253','Aktif','Ira Sarah Palastri S',2006,'SMP','vel','3843749','(+62) 315 6812 1167','Umar Kurniawan',2007,'SMA','dolorem','4230460','(+62) 549 5398 022',2,'917797290','917797290'),
('921632531','Prasetya Mursinin Ramadan','Perempuan','Singkawang','1992-10-21','Kristen','Jr. Lembong No. 53, Cilegon 13045, PapBar','0790 5960 970','Aktif','Zizi Yuniar',2005,'Tidak Sekolah','dolores','2716893','(+62) 434 9510 8226','Ganjaran Dongoran',1992,'S2','maiores','3727223','(+62) 918 2418 703',5,'921632531','921632531'),
('932540839','Bancar Tampubolon','Laki-Laki','Batu','2014-08-27','Kristen','Jr. Pelajar Pejuang 45 No. 741, Banjarmasin 67626, KalUt','(+62) 461 0743 1010','Aktif','Cornelia Widiastuti',2004,'S1','animi','3256486','(+62) 644 2824 705','Nurul Aryani',2014,'SMP','et','3822471','0533 0684 583',6,'932540839','932540839'),
('935190470','Zulfa Melani','Laki-Laki','Sungai Penuh','2014-03-05','Kristen','Ki. Arifin No. 799, Lhokseumawe 74856, JaTim','(+62) 713 5936 870','Aktif','Estiono Iswahyudi',1991,'SMP','aut','4946019','(+62) 774 4714 020','Maimunah Chelsea Agu',2012,'S1','quibusdam','2803468','(+62) 904 3506 197',3,'935190470','935190470'),
('94110731','Eman Mansur','Perempuan','Tegal','1994-08-08','Kristen','Dk. Babah No. 684, Serang 81693, KalBar','(+62) 591 2090 476','Aktif','Vega Bakda Mandala S',2016,'S1','explicabo','2825079','0622 2095 157','Gina Astuti M.Ak',1985,'SD','qui','3097040','0709 5105 3093',5,'94110731','94110731'),
('944520127','Ana Zulaika','Laki-Laki','Bau-Bau','1979-06-25','Kristen','Dk. Sutoyo No. 406, Bandung 45130, Bengkulu','0268 8936 936','Aktif','Violet Wirda Wahyuni',1993,'S2','nisi','3167434','0953 0203 508','Siti Puspita S.H.',1980,'SD','et','4606531','(+62) 908 6903 958',3,'944520127','944520127'),
('947620461','Tiara Lestari','Perempuan','Blitar','1988-07-31','Kristen','Ki. Tentara Pelajar No. 20, Kendari 79865, Maluku','(+62) 432 0862 145','Aktif','Zulfa Utami',1984,'SD','quo','3538035','0878 243 288','Mulyono Asmuni Jaila',1994,'S1','nulla','1411627','0630 6158 0299',6,'947620461','947620461'),
('95801952','Cayadi Hutagalung','Perempuan','Madiun','1976-06-21','Kristen','Jln. Urip Sumoharjo No. 35, Sukabumi 20130, JaTim','(+62) 437 4033 3840','Aktif','Julia Nasyiah',1996,'SMP','ut','2277374','025 9608 9562','Ellis Riyanti',1977,'S3','non','4476734','0720 0941 0432',5,'95801952','95801952'),
('958955936','Latika Usada','Perempuan','Kupang','1983-12-22','Kristen','Jr. Sutami No. 631, Bandar Lampung 12667, Bali','0889 0994 9216','Aktif','Zalindra Laras Mulya',1999,'SMA','dolorum','3326179','0520 6120 552','Puput Riyanti',1980,'SD','sapiente','4580828','0892 256 505',3,'958955936','958955936'),
('964732646','Salimah Utami','Perempuan','Cilegon','2011-07-21','Kristen','Ds. Fajar No. 558, Tebing Tinggi 25859, JaBar','(+62) 769 7068 2632','Aktif','Aurora Namaga',2004,'SD','qui','1547505','(+62) 523 6587 9260','Jessica Prastuti',2008,'SMA','officia','3969772','0478 6078 3542',3,'964732646','964732646'),
('966700412','Latika Rahimah','Perempuan','Blitar','1998-02-13','Kristen','Gg. Urip Sumoharjo No. 808, Kotamobagu 33066, SulBar','(+62) 222 3451 4733','Aktif','Nabila Anggraini',2006,'S2','sunt','1930742','(+62) 423 8205 6561','Rahmi Hasanah',2018,'SMP','quas','1710513','(+62) 594 9223 112',6,'966700412','966700412'),
('967284493','Eva Rahmawati','Perempuan','Kediri','2016-02-27','Kristen','Psr. Otista No. 414, Depok 35906, Bengkulu','(+62) 915 0160 6454','Aktif','Asmadi Prayoga',2004,'SMP','sapiente','1711827','0825 7410 2772','Yuliana Tina Pertiwi',1988,'S1','pariatur','4770593','(+62) 975 6451 2472',2,'967284493','967284493'),
('967483530','Juli Maida Mulyani','Laki-Laki','Cirebon','2011-12-11','Kristen','Gg. R.M. Said No. 200, Bontang 83392, BaBel','0637 2401 641','Aktif','Elisa Anggraini M.Pd',1993,'S1','aspernatur','4571906','0947 7731 2103','Mila Nasyidah',1982,'S1','placeat','3095155','(+62) 657 9570 313',3,'967483530','967483530'),
('968487575','Daryani Mustofa','Laki-Laki','Mojokerto','1993-04-12','Kristen','Jr. Bayan No. 293, Semarang 80510, SulTra','(+62) 610 4348 090','Aktif','Kayla Yulianti M.Kom',2007,'SMA','consequatur','3810308','0261 5681 9239','Tami Kusmawati',2010,'SMP','ut','2443818','0670 4978 8120',6,'968487575','968487575'),
('980552616','Gawati Yulianti','Laki-Laki','Banda Aceh','1985-10-29','Kristen','Gg. Arifin No. 159, Bontang 59850, SulUt','(+62) 953 5941 863','Aktif','Dipa Wahyudin',1987,'SD','aut','1675571','0826 196 187','Tomi Hidayat',2017,'S1','dolores','4646070','0473 1459 178',3,'980552616','980552616'),
('983716168','Silvia Mandasari','Laki-Laki','Administrasi Jakarta Selatan','2019-08-04','Kristen','Ds. Barasak No. 784, Singkawang 35271, Riau','(+62) 395 4462 282','Aktif','Argono Saptono',1986,'SMA','voluptatibus','3628400','(+62) 23 4953 106','Balijan Darman Prata',1984,'Tidak Sekolah','sed','2953434','0908 4866 482',5,'983716168','983716168');

/*Table structure for table `tb_tahun_ajaran` */

DROP TABLE IF EXISTS `tb_tahun_ajaran`;

CREATE TABLE `tb_tahun_ajaran` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tb_tahun_ajaran` */

insert  into `tb_tahun_ajaran`(`id`,`tahun`,`status`) values 
(3,'2019/2020','Aktif'),
(4,'2020/2021','Tidak Aktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
