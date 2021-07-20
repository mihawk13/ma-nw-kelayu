/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.10-MariaDB-log : Database - ma-nw-kelayu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ma-nw-kelayu` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ma-nw-kelayu`;

/*Data for the table `tb_data_sekolah` */

insert  into `tb_data_sekolah`(`id`,`alamat`,`nama_sekolah`,`nama_kepsek`,`nip_kepsek`) values 
(1,'Jl. TGH Zainuddin Abdul Madjid','Madrasah Aliyah NW Kelayu','Arsan Rusydani','1563 1402 2078101125');

/*Data for the table `tb_japel` */

insert  into `tb_japel`(`id`,`kelas_id`,`mapel_id`,`hari`,`jam`,`tahun_ajaran`) values 
(1,1,1,'Senin','07:30 - 09:00','2019/2020'),
(2,1,2,'Senin','09:00 - 10:30','2019/2020'),
(3,1,1,'Selasa','07:30 - 09:00','2019/2020'),
(4,1,2,'Selasa','09:00 - 10:30','2019/2020'),
(5,1,4,'Rabu','07:30 - 09:00','2019/2020'),
(6,1,6,'Rabu','09:00 - 10:30','2019/2020'),
(7,1,7,'Kamis','07:30 - 09:00','2019/2020'),
(8,1,1,'Kamis','09:00 - 10:30','2019/2020'),
(9,1,1,'Jumat','07:30 - 09:00','2019/2020'),
(10,1,2,'Jumat','09:00 - 10:30','2019/2020'),
(11,1,5,'Sabtu','07:30 - 09:00','2019/2020'),
(12,2,1,'Senin','07:30 - 09:00','2019/2020'),
(13,2,2,'Senin','09:00 - 10:30','2019/2020'),
(14,2,1,'Selasa','07:30 - 09:00','2019/2020'),
(15,2,2,'Selasa','09:00 - 10:30','2019/2020'),
(16,2,4,'Rabu','07:30 - 09:00','2019/2020'),
(17,2,6,'Rabu','09:00 - 10:30','2019/2020'),
(18,2,7,'Kamis','07:30 - 09:00','2019/2020'),
(19,2,1,'Kamis','09:00 - 10:30','2019/2020'),
(20,2,1,'Jumat','07:30 - 09:00','2019/2020'),
(21,2,2,'Jumat','09:00 - 10:30','2019/2020'),
(22,2,5,'Sabtu','07:30 - 09:00','2019/2020'),
(23,3,1,'Senin','07:30 - 09:00','2019/2020'),
(24,3,2,'Senin','09:00 - 10:30','2019/2020'),
(25,3,1,'Selasa','07:30 - 09:00','2019/2020'),
(26,3,2,'Selasa','09:00 - 10:30','2019/2020'),
(27,3,4,'Rabu','07:30 - 09:00','2019/2020'),
(28,3,6,'Rabu','09:00 - 10:30','2019/2020'),
(29,3,7,'Kamis','07:30 - 09:00','2019/2020'),
(30,3,1,'Kamis','09:00 - 10:30','2019/2020'),
(31,3,1,'Jumat','07:30 - 09:00','2019/2020'),
(32,3,2,'Jumat','09:00 - 10:30','2019/2020'),
(33,3,5,'Sabtu','07:30 - 09:00','2019/2020');

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`id_kelas`,`nama_kelas`,`thn_ajaran`,`nip_wali`) values 
(1,'Kelas 10','2019/2020','89785635528'),
(2,'Kelas 11','2019/2020','159755096'),
(3,'Kelas 12','2019/2020','210971157');

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id`,`nama_mapel`) values 
(1,'Bahasa Indonesia'),
(2,'Matematika'),
(3,'Bahasa Inggris'),
(4,'Akidah Akhlak'),
(5,'Pendidikan Jasmani, Olahraga dan Kesehatan'),
(6,'Kimia'),
(7,'Sejarah Kebudayaan Islam'),
(8,'Quran Hadist');

/*Data for the table `tb_mapel_guru` */

insert  into `tb_mapel_guru`(`nip`,`mapel_id`,`kelas_id`,`thn_ajaran`) values 
('16821660',1,1,'2019/2020'),
('16821660',2,1,'2019/2020'),
('16821660',4,2,'2019/2020'),
('16821660',6,2,'2019/2020'),
('16821660',2,3,'2019/2020'),
('16821660',7,3,'2019/2020'),
('89785635528',4,1,'2019/2020'),
('89785635528',8,2,'2019/2020'),
('89785635528',7,3,'2019/2020');

/*Data for the table `tb_nilai` */

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`nip`,`nama`,`jk`,`tempat_lahir`,`tgl_lahir`,`alamat`,`telp`,`username`,`password`,`level`) values 
('159755096','Lintang Rahimah','Laki-Laki','Pematangsiantar','1985-12-14','Kpg. Adisumarmo No. 947, Padan','0454 0683 031','159755096','159755096','Guru'),
('16821660','Cindy Utami','Laki-Laki','Tegal','1970-08-15','Gg. Hasanuddin No. 474, Tanger','(+62) 625 1999 058','16821660','16821660','Guru'),
('20214599','Garda Rangga Rajasa S.Farm','Laki-Laki','Lhokseumawe','2019-01-28','Psr. Padang No. 176, Parepare ','027 7585 500','20214599','20214599','Guru'),
('210971157','Lili Puspita S.Kom','Perempuan','Bengkulu','1975-05-25','Ki. Jayawijaya No. 26, Makassa','(+62) 481 1995 8416','210971157','210971157','Guru'),
('290372147','Maria Pudjiastuti','Perempuan','Kendari','2006-07-27','Jr. Baladewa No. 167, Langsa 8','0754 1114 934','290372147','290372147','Guru'),
('400083846','Vanya Padmi Kusmawati S.Farm','Perempuan','Mojokerto','1995-03-06','Jln. Bakin No. 587, Banda Aceh','(+62) 477 0646 961','400083846','400083846','Guru'),
('47927440','Raharja Najmudin','Perempuan','Banjar','1997-11-15','Kpg. Agus Salim No. 424, Pagar','0585 0830 838','47927440','47927440','Guru'),
('491726603','Makuta Balapati Halim','Perempuan','Jayapura','2014-01-02','Gg. Daan No. 738, Prabumulih 9','(+62) 631 0510 113','491726603','491726603','Guru'),
('591304451','Syahrini Hartati S.Gz','Perempuan','Tarakan','2015-02-23','Psr. Ciumbuleuit No. 381, Banj','(+62) 21 3810 8562','591304451','591304451','Guru'),
('591768157','Saadat Harsaya Natsir','Perempuan','Cimahi','1973-06-08','Jln. Ikan No. 104, Palembang 2','(+62) 252 6689 646','591768157','591768157','Guru'),
('709716261','Ikin Timbul Natsir S.Kom','Perempuan','Solok','1984-02-12','Gg. Jagakarsa No. 167, Parepar','(+62) 502 6125 4917','709716261','709716261','Guru'),
('712260517','Jais Marbun','Perempuan','Kediri','2014-04-28','Ki. Pasteur No. 265, Surabaya ','(+62) 482 9878 3904','712260517','712260517','Guru'),
('78882591314','Arsyan Rusdani','Laki-Laki','Kelayu','1983-04-26','Kelayu','08934324234','kepsek','kepsek','Kepala Sekolah'),
('81636103','Baktiono Pratama','Laki-Laki','Tomohon','2013-08-27','Gg. Cokroaminoto No. 995, Admi','0317 3740 289','81636103','81636103','Guru'),
('843848766','Zulfa Hastuti','Laki-Laki','Surabaya','2008-03-06','Jr. Tambun No. 231, Pasuruan 2','0810 075 224','843848766','843848766','Guru'),
('886662570','Cengkal Bakti Tamba S.Gz','Laki-Laki','Manado','2020-08-13','Jr. Baik No. 455, Administrasi','0690 1300 811','886662570','886662570','Guru'),
('89785635528','Musyrifatun Alawiyah','Perempuan','Kelayu','2021-07-20','Kelayu','08934324234','89785635528','89785635528','Guru'),
('987654321','Hifzul Hasani','Laki-Laki','Kelayu','1985-01-05','Kelayu','08123456789','tatausaha','tatausaha','Tata Usaha');

/*Data for the table `tb_raport` */

/*Data for the table `tb_raport_detail` */

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`nisn`,`nama_siswa`,`jk`,`tempat_lahir`,`tgl_lahir`,`agama`,`alamat`,`telp_siswa`,`status_siswa`,`nama_ayah`,`thn_lahir_ayah`,`pendidikan_ayah`,`pekerjaan_ayah`,`penghasilan_ayah`,`telp_ayah`,`nama_ibu`,`thn_lahir_ibu`,`pendidikan_ibu`,`pekerjaan_ibu`,`penghasilan_ibu`,`telp_ibu`,`kelas`,`username`,`password`) values 
('102550194','Hasna Wulandari S.Pd','Laki-Laki','Cirebon','1973-09-10','Islam','Ds. Adisucipto No. 237, Surabaya 25594, DIY','(+62) 211 2348 0106','Aktif','Adikara Hidayat S.IP',1984,'SMP','veritatis','1863512','(+62) 926 0564 6608','Zelaya Mandasari',1979,'Tidak Sekolah','quisquam','2829011','(+62) 29 2307 743',2,'102550194','102550194'),
('108666326','Dodo Wasita','Laki-Laki','Bau-Bau','1972-03-15','Islam','Kpg. Bagas Pati No. 654, Subulussalam 94498, SulTeng','020 7530 9491','Aktif','Puput Rachel Mandasa',2002,'Tidak Sekolah','eveniet','1124604','0634 7639 8760','Balapati Mustofa',2016,'S2','sequi','3771040','(+62) 865 0483 206',1,'108666326','108666326'),
('11426553','Dinda Sudiati','Perempuan','Kendari','1982-11-06','Islam','Psr. Gremet No. 933, Tanjung Pinang 12287, Maluku','(+62) 792 1925 1774','Aktif','Rini Kani Laksmiwati',1989,'SMP','ratione','4003294','0430 9476 277','Almira Lailasari M.F',2021,'SD','voluptas','2737567','(+62) 581 7167 4277',3,'11426553','11426553'),
('121742863','Hamima Riyanti','Laki-Laki','Bekasi','2005-06-22','Islam','Dk. R.M. Said No. 555, Administrasi Jakarta Selatan 86620, JaBar','(+62) 600 4662 0387','Aktif','Lidya Cici Palastri',1987,'S3','alias','1310740','0775 1053 103','Kartika Nasyidah',2019,'S3','veniam','2673526','022 2058 2456',1,'121742863','121742863'),
('137645588','Vivi Rahayu','Perempuan','Magelang','1999-03-08','Islam','Ds. Aceh No. 454, Bau-Bau 38206, KalTeng','0374 5975 0993','Aktif','Pandu Prabowo S.E.',2017,'S3','dolor','2573356','0856 366 015','Jail Saputra',1987,'Tidak Sekolah','officiis','1722114','0956 0448 975',1,'137645588','137645588'),
('13769883','Adiarja Damanik','Perempuan','Cilegon','2011-10-31','Islam','Ds. Sumpah Pemuda No. 250, Lubuklinggau 51259, Papua','026 6208 0418','Aktif','Siska Prastuti M.M.',1996,'SMP','modi','2784348','0913 8640 7558','Rendy Gunarto',1974,'SD','consequuntur','2281714','0592 4680 6879',3,'13769883','13769883'),
('138540165','Banara Bahuwirya Santoso M.Far','Perempuan','Kendari','1986-07-16','Islam','Ki. Diponegoro No. 203, Pontianak 75881, NTB','0916 0607 487','Aktif','Gantar Kurniawan S.K',2003,'S1','dolor','4324148','(+62) 643 8952 670','Cecep Samosir',2016,'SD','nihil','1232275','(+62) 870 6604 432',2,'138540165','138540165'),
('167223036','Bahuraksa Pratama','Laki-Laki','Lhokseumawe','2004-12-26','Islam','Jr. Nakula No. 206, Padangsidempuan 85814, Bali','0546 0475 7346','Aktif','Reksa Firmansyah',1992,'S1','architecto','4219352','021 2775 229','Unjani Queen Hartati',1987,'S2','in','3416294','(+62) 926 7520 3924',1,'167223036','167223036'),
('167984484','Eluh Vega Santoso','Perempuan','Administrasi Jakarta Pusat','2016-03-23','Islam','Jr. Bank Dagang Negara No. 570, Cilegon 55167, Banten','0268 4037 6553','Aktif','Gamani Gunarto',1973,'S1','mollitia','4320221','(+62) 559 4328 798','Ivan Situmorang',1986,'S2','fuga','1246569','0291 1348 855',3,'167984484','167984484'),
('168286414','Ozy Pratama','Laki-Laki','Singkawang','1999-04-23','Islam','Psr. Ahmad Dahlan No. 768, Pekalongan 14930, SumSel','(+62) 20 5133 286','Aktif','Gambira Widodo',2009,'S3','nisi','1216019','0548 5604 303','Melinda Ratih Rahmaw',1981,'S2','illo','3159154','0821 918 776',3,'168286414','168286414'),
('180483308','Dalimin Maheswara','Laki-Laki','Pangkal Pinang','1979-10-11','Islam','Dk. Villa No. 348, Probolinggo 89957, SulTeng','(+62) 500 2542 467','Aktif','Lurhur Halim Dongora',2018,'S2','atque','2867773','(+62) 759 1369 0346','Pia Alika Permata S.',2014,'S2','perferendis','4027798','(+62) 561 6917 2983',2,'180483308','180483308'),
('202680552','Kenari Uwais','Perempuan','Tangerang Selatan','1999-10-23','Islam','Dk. Madiun No. 730, Palu 97540, Aceh','0238 2412 9399','Aktif','Oni Hariyah',2008,'S3','tempore','2283964','0966 8805 4596','Ade Hutapea',1978,'SD','ab','4104534','0844 369 802',1,'202680552','202680552'),
('209536687','Farhunnisa Rahmi Wulandari S.E','Perempuan','Ambon','1982-02-02','Islam','Psr. Monginsidi No. 344, Administrasi Jakarta Utara 35760, Papua','0281 4744 097','Aktif','Wasis Pangestu Ramad',1994,'SMA','voluptatibus','1208667','(+62) 282 0411 4300','Qori Tantri Widiastu',2012,'S3','quo','4139016','(+62) 315 1659 280',2,'209536687','209536687'),
('211352718','Gasti Titin Nasyidah','Perempuan','Batu','2016-07-26','Islam','Psr. Ters. Jakarta No. 824, Cilegon 77563, JaBar','(+62) 968 3071 7429','Aktif','Gaman Hartana Prayog',1994,'SMP','qui','4549338','0406 7811 3806','Narji Ganep Wibisono',1999,'S1','tempora','1215400','0905 7367 781',1,'211352718','211352718'),
('213603024','Maria Padmasari','Laki-Laki','Tarakan','2010-01-23','Islam','Ds. Urip Sumoharjo No. 356, Sungai Penuh 56645, SulTra','0901 3419 957','Aktif','Asman Ganep Hutagalu',2005,'S3','maxime','1977021','(+62) 20 7420 701','Zulaikha Novi Aryani',2010,'Tidak Sekolah','sit','1736282','0788 7699 2648',3,'213603024','213603024'),
('247160051','Margana Widodo','Perempuan','Kotamobagu','2007-10-31','Islam','Kpg. Urip Sumoharjo No. 96, Bau-Bau 78703, NTT','0308 7860 867','Aktif','Karimah Nurdiyanti',1991,'Tidak Sekolah','veniam','4973985','(+62) 210 6814 2646','Syahrini Hartati',2008,'SMA','iste','3486994','(+62) 995 1339 759',3,'247160051','247160051'),
('256890166','Martana Wacana','Laki-Laki','Sabang','1983-08-16','Islam','Ki. Moch. Yamin No. 234, Bandung 88915, JaBar','0230 4221 5652','Aktif','Caket Habibi',2014,'S3','esse','4109352','(+62) 388 2372 040','Galih Natsir M.TI.',1982,'SD','rerum','2441114','0814 990 065',1,'256890166','256890166'),
('257651857','Betania Carla Namaga S.Kom','Laki-Laki','Surabaya','2008-01-21','Islam','Ds. Sudiarto No. 377, Payakumbuh 42655, Bali','0969 7627 0518','Aktif','Kalim Hutasoit',1987,'SD','tenetur','4913202','(+62) 887 901 535','Tirtayasa Galih Zulk',2020,'S3','inventore','2600017','(+62) 310 4984 200',3,'257651857','257651857'),
('262728606','Dalima Paramita Nurdiyanti M.P','Perempuan','Payakumbuh','2020-07-08','Islam','Kpg. Banceng Pondok No. 469, Madiun 60470, DKI','0394 6857 1809','Aktif','Chelsea Melani',1997,'Tidak Sekolah','dolorem','3763851','(+62) 914 4829 102','Gangsar Mahendra S.H',2010,'SMA','cumque','3333912','026 2451 8094',2,'262728606','262728606'),
('267090153','Yani Suryatmi M.Ak','Laki-Laki','Sabang','1994-01-04','Islam','Ds. Ekonomi No. 301, Jambi 75847, KalBar','(+62) 798 4514 7138','Aktif','Jaeman Mansur',2020,'S1','tenetur','1130652','(+62) 249 6432 217','Oni Kania Pudjiastut',1988,'S1','id','2621919','0828 0887 2611',2,'267090153','267090153'),
('280189412','Estiawan Nababan','Perempuan','Kediri','1991-01-03','Islam','Ki. Yosodipuro No. 590, Semarang 62122, PapBar','(+62) 605 0002 2945','Aktif','Safina Usamah',1993,'SD','minus','2538173','(+62) 917 2936 1844','Bakiono Waskita',1975,'Tidak Sekolah','mollitia','1126669','0298 8887 4850',2,'280189412','280189412'),
('285609508','Kasusra Tamba S.Gz','Laki-Laki','Salatiga','1974-12-25','Islam','Gg. Lada No. 157, Batam 40987, DIY','0912 4620 0954','Aktif','Vanya Nurdiyanti S.I',2015,'SMP','aut','3937493','0773 2487 501','Maryadi Latupono',2005,'SMP','ipsam','4062382','(+62) 27 7777 600',1,'285609508','285609508'),
('298260287','Wardi Prasetya','Perempuan','Parepare','1986-12-04','Islam','Gg. Basmol Raya No. 33, Metro 10749, KepR','0897 8306 682','Aktif','Shania Safitri',1974,'SMA','qui','1237303','0641 3275 082','Mila Raisa Agustina',1978,'SMP','ipsum','1746560','0859 2929 5869',2,'298260287','298260287'),
('310359944','Raharja Daryani Saragih','Laki-Laki','Madiun','1985-07-04','Islam','Ds. Arifin No. 71, Mojokerto 56966, SulUt','0355 4293 7297','Aktif','Nyana Maheswara',1999,'S1','quia','4203048','(+62) 484 6060 3712','Febi Purnawati',1976,'S1','consequatur','4791249','(+62) 974 5959 2376',1,'310359944','310359944'),
('326030633','Daniswara Tamba','Laki-Laki','Pariaman','1972-07-02','Islam','Kpg. Sunaryo No. 601, Tanjung Pinang 28608, Riau','0392 3209 0509','Aktif','Sabrina Jessica Wula',2007,'SMP','porro','1391848','(+62) 691 1647 370','Mala Yuniar',2013,'SD','eaque','4187659','(+62) 870 3291 446',2,'326030633','326030633'),
('331486304','Indra Maheswara','Perempuan','Bitung','1994-01-26','Islam','Ds. Basoka Raya No. 345, Banjar 69403, DIY','(+62) 376 3955 382','Aktif','Paramita Elma Rahayu',2015,'S1','maiores','4761328','0746 8075 486','Kairav Marpaung',1996,'S2','quis','1930075','0825 2993 7282',3,'331486304','331486304'),
('338799871','Niyaga Wasita S.I.Kom','Laki-Laki','Sabang','1984-10-06','Islam','Jln. Baiduri No. 889, Tanjung Pinang 78044, Maluku','(+62) 658 8633 9131','Aktif','Luthfi Mangunsong S.',2019,'S1','et','1926367','(+62) 631 0694 8240','Hana Aryani',1993,'S2','illum','2607899','0844 9507 3461',1,'338799871','338799871'),
('358031474','Gilda Kuswandari','Laki-Laki','Ternate','2010-03-24','Islam','Jln. Bah Jaya No. 870, Sibolga 28510, Maluku','(+62) 631 0798 051','Aktif','Arta Sirait',2002,'S2','eum','4487285','(+62) 494 9911 355','Maimunah Talia Winar',1970,'S1','officiis','4224559','0870 010 771',1,'358031474','358031474'),
('369652568','Agnes Oni Lailasari S.Kom','Laki-Laki','Jayapura','2008-12-27','Islam','Gg. Moch. Ramdan No. 295, Tangerang Selatan 54955, KalTeng','0845 0073 410','Aktif','Faizah Sadina Yuliar',2002,'S1','id','1610082','(+62) 849 0988 088','Diana Agustina',1981,'SMP','qui','2753395','(+62) 813 0234 9010',2,'369652568','369652568'),
('381061486','Ayu Yuniar','Laki-Laki','Administrasi Jakarta Utara','1973-10-13','Islam','Ki. W.R. Supratman No. 514, Tidore Kepulauan 74807, PapBar','0225 2712 3012','Aktif','Eva Hastuti M.TI.',1971,'SMA','velit','4148857','(+62) 739 5768 1129','Jagapati Adriansyah',1996,'SMA','eius','1444623','0625 0830 258',3,'381061486','381061486'),
('39130674','Danu Siregar','Laki-Laki','Tanjungbalai','1988-01-13','Islam','Psr. Juanda No. 938, Tangerang 87058, MalUt','(+62) 515 2558 385','Aktif','Gadang Lasmono Hiday',2021,'Tidak Sekolah','quia','1196928','0345 7045 190','Maida Natalia Novita',1971,'S2','ut','2070138','0861 2475 1550',3,'39130674','39130674'),
('39588810','Zelaya Endah Hasanah','Laki-Laki','Banjarbaru','1998-10-03','Islam','Jln. Labu No. 77, Gorontalo 31102, SulBar','(+62) 570 1051 764','Aktif','Kenes Widodo',2006,'S2','dolorem','1241220','0379 2622 949','Paramita Pudjiastuti',2011,'SMA','ducimus','3088474','(+62) 338 3926 200',3,'39588810','39588810'),
('398785098','Hesti Rachel Astuti S.Psi','Perempuan','Makassar','1993-10-06','Islam','Ki. Tentara Pelajar No. 992, Parepare 48816, PapBar','0589 4878 5144','Aktif','Ulya Lailasari',2004,'Tidak Sekolah','quo','3129100','(+62) 568 2769 316','Puspa Padmasari',1973,'SMP','quo','1151057','025 8584 7919',3,'398785098','398785098'),
('405414352','Asirwanda Cagak Waluyo S.E.','Laki-Laki','Langsa','2006-08-07','Islam','Jln. Pasteur No. 13, Gorontalo 82309, Jambi','(+62) 423 3727 933','Aktif','Vero Hutasoit S.Farm',1987,'S1','temporibus','3703268','(+62) 25 2228 2720','Sidiq Maheswara S.H.',2009,'SMP','ut','1019336','0859 6065 554',2,'405414352','405414352'),
('445420711','Shania Anggraini M.Ak','Laki-Laki','Kupang','1981-11-01','Islam','Dk. Wora Wari No. 286, Makassar 87842, SumSel','023 9893 384','Aktif','Edi Tampubolon S.Sos',2004,'SD','laudantium','2513123','(+62) 684 5852 1061','Ade Pertiwi',1970,'S2','a','3124298','0693 2363 3805',3,'445420711','445420711'),
('449181471','Gilda Winarsih','Laki-Laki','Tebing Tinggi','2001-05-08','Islam','Jln. Ahmad Dahlan No. 15, Administrasi Jakarta Selatan 97240, Gorontalo','(+62) 819 816 061','Aktif','Zaenab Zalindra Hass',2016,'S3','error','2481683','(+62) 487 8652 583','Rudi Adinata Damanik',2016,'S2','optio','4697427','0824 585 936',3,'449181471','449181471'),
('456599092','Tari Permata','Perempuan','Administrasi Jakarta Pusat','1970-06-11','Islam','Ds. Reksoninten No. 106, Administrasi Jakarta Timur 63736, KepR','0785 1372 6769','Aktif','Cakrabirawa Maulana',1994,'SMP','non','3281282','(+62) 888 7701 921','Halima Oktaviani',2009,'SMP','aperiam','1564461','(+62) 903 7746 1879',2,'456599092','456599092'),
('467438074','Tomi Nababan','Perempuan','Pontianak','2014-07-17','Islam','Psr. Basoka No. 122, Sawahlunto 30126, SumSel','0406 6633 1948','Aktif','Gara Kacung Damanik',1996,'SMP','dolor','2541514','(+62) 798 8915 210','Kamaria Zulaika',2013,'SMA','non','3351540','0706 4014 6244',1,'467438074','467438074'),
('469971415','Cakrabuana Edison Wasita S.E.','Perempuan','Bitung','2004-10-05','Islam','Ki. Sam Ratulangi No. 301, Magelang 48014, KalTim','(+62) 226 5886 399','Aktif','Patricia Zaenab Kusw',1992,'SMA','qui','1316587','0215 2476 211','Emin Banara Najmudin',2009,'SD','quam','2192004','0919 8669 4121',2,'469971415','469971415'),
('492899801','Carla Safina Wijayanti','Laki-Laki','Sabang','1979-03-25','Islam','Jln. Sukajadi No. 282, Cilegon 16245, NTB','0567 8861 406','Aktif','Gilda Lestari',2012,'SD','commodi','1496999','0311 8910 6979','Naradi Pratama',2016,'SMP','autem','4726404','0282 0388 670',3,'492899801','492899801'),
('493917087','Wulan Pudjiastuti','Perempuan','Tanjung Pinang','1995-12-07','Islam','Ki. R.M. Said No. 543, Dumai 41623, SumUt','(+62) 902 9912 5843','Aktif','Danuja Prabowo',1997,'S2','odit','2383089','0541 0128 080','Jarwadi Hutapea',1997,'S1','aut','1518304','(+62) 927 3610 799',2,'493917087','493917087'),
('499135345','Zizi Hartati','Laki-Laki','Ambon','1986-07-03','Islam','Gg. BKR No. 19, Mataram 76254, JaTeng','0634 6054 116','Aktif','Ana Puspita',2009,'SMA','quibusdam','3675662','0825 0360 2814','Salwa Yolanda',2000,'S1','earum','3105184','(+62) 436 1726 171',3,'499135345','499135345'),
('503092194','Mala Anggraini S.E.','Laki-Laki','Kediri','2018-06-07','Islam','Ki. Gading No. 757, Mataram 87746, SulBar','(+62) 933 4168 743','Aktif','Adhiarja Lanjar Tham',2015,'S3','ratione','1817751','0341 7474 5721','Nilam Ellis Usada S.',1971,'Tidak Sekolah','dolorem','1270530','0329 6648 2966',3,'503092194','503092194'),
('506605840','Darijan Mujur Mandala','Perempuan','Mojokerto','1983-03-13','Islam','Jln. Moch. Yamin No. 485, Tangerang 17471, SulUt','(+62) 211 0249 547','Aktif','Ajeng Dalima Prastut',1988,'SMP','rem','3101454','(+62) 624 1162 500','Mutia Hariyah S.T.',2016,'SMA','hic','2577479','(+62) 479 7638 516',2,'506605840','506605840'),
('511012293','Irma Hartati','Laki-Laki','Bima','1982-11-07','Islam','Gg. Imam No. 306, Solok 51292, SulBar','0845 9116 0360','Aktif','Farhunnisa Wahyuni M',2004,'Tidak Sekolah','doloremque','3510148','0586 1093 8102','Michelle Andriani',1994,'S3','impedit','4687783','023 9723 761',2,'511012293','511012293'),
('51605074','Paiman Natsir','Laki-Laki','Administrasi Jakarta Timur','1997-06-11','Islam','Dk. Bara No. 236, Prabumulih 87914, DKI','0788 6491 8019','Aktif','Ihsan Kusumo',1986,'S2','est','3620450','(+62) 799 7624 403','Oman Ramadan',2000,'S1','at','2549469','0564 8255 645',3,'51605074','51605074'),
('526695188','Lili Anggraini','Perempuan','Bogor','1998-09-17','Islam','Gg. Cut Nyak Dien No. 259, Tomohon 84096, SumUt','0710 4381 6704','Aktif','Titi Astuti M.Ak',1972,'S3','ipsum','2299703','(+62) 452 3602 985','Icha Usyi Oktaviani',2000,'S3','neque','4470344','(+62) 503 6795 1592',1,'526695188','526695188'),
('527974553','Prayitna Among Wacana','Perempuan','Pekalongan','2014-10-18','Islam','Ds. Barasak No. 616, Tegal 47925, Jambi','0233 5628 916','Aktif','Farhunnisa Maryati',1997,'Tidak Sekolah','commodi','4469133','0361 3044 2604','Aswani Jamal Tarihor',2003,'Tidak Sekolah','quasi','1687796','(+62) 764 3309 660',2,'527974553','527974553'),
('550689385','Kala Tarihoran','Perempuan','Semarang','1987-09-04','Islam','Ds. Panjaitan No. 246, Surabaya 34472, DIY','0275 3826 113','Aktif','Galiono Cakrawala Pr',2007,'SMP','perferendis','3481851','0537 8189 3972','Manah Mandala',2005,'S3','aut','1948957','(+62) 237 0796 558',1,'550689385','550689385'),
('551089325','Nasrullah Budiman','Perempuan','Tidore Kepulauan','2002-08-12','Islam','Psr. Yohanes No. 359, Administrasi Jakarta Utara 45563, SumUt','(+62) 257 1112 807','Aktif','Jaswadi Hutapea M.Pd',1979,'S2','nihil','4611749','(+62) 534 1947 795','Ophelia Unjani Wijay',2015,'Tidak Sekolah','sint','2000059','(+62) 938 6411 969',3,'551089325','551089325'),
('560452643','Jarwadi Cakrajiya Rajata','Laki-Laki','Sukabumi','1987-06-08','Islam','Kpg. W.R. Supratman No. 109, Salatiga 16917, NTT','(+62) 857 0116 998','Aktif','Jaiman Halim',1998,'S1','aut','2662780','(+62) 694 4735 315','Warsita Prasetyo',1989,'S2','unde','4572781','0647 2201 450',2,'560452643','560452643'),
('575880242','Zamira Olivia Lailasari S.I.Ko','Perempuan','Palopo','1996-09-18','Islam','Ki. Bayam No. 372, Kotamobagu 79963, Aceh','(+62) 994 0280 6970','Aktif','Titi Safitri',2008,'SMP','consectetur','3070192','(+62) 331 6535 101','Jamal Indra Budiyant',1973,'S3','nostrum','3444209','028 5868 480',2,'575880242','575880242'),
('584733051','Jono Kusumo','Perempuan','Dumai','1987-11-16','Islam','Ds. Baja No. 992, Langsa 20153, Lampung','(+62) 388 2711 6918','Aktif','Mumpuni Karna Hutaso',2000,'S1','accusantium','3285130','023 2986 0136','Gina Lestari',2014,'SMA','quae','1094907','(+62) 674 2232 320',1,'584733051','584733051'),
('624218031','Purwadi Hutapea M.Farm','Laki-Laki','Padangpanjang','1993-07-27','Islam','Ds. Yohanes No. 787, Medan 84587, Riau','0766 7731 014','Aktif','Banawa Catur Iswahyu',1982,'S2','et','1792663','(+62) 952 0758 952','Salwa Astuti',2019,'S1','nemo','2562645','0841 261 525',1,'624218031','624218031'),
('629266282','Rafid Harimurti Saputra','Laki-Laki','Tangerang','2007-04-14','Islam','Ki. Bank Dagang Negara No. 576, Lubuklinggau 52672, NTT','(+62) 798 3793 425','Aktif','Candra Jaswadi Suryo',1990,'Tidak Sekolah','voluptas','2481589','021 8541 2176','Zulfa Zaenab Usamah ',1995,'S2','porro','3088675','0972 9974 0343',3,'629266282','629266282'),
('647248194','Intan Puspasari S.Sos','Perempuan','Denpasar','1988-10-31','Islam','Jln. Ciumbuleuit No. 803, Tebing Tinggi 45071, KalTim','(+62) 760 3375 625','Aktif','Hesti Agustina',2016,'S2','non','1540801','(+62) 788 1291 3981','Usman Gunarto',1997,'S2','et','2295061','(+62) 204 4963 8243',1,'647248194','647248194'),
('693461881','Tugiman Wijaya S.Ked','Perempuan','Binjai','1973-01-14','Islam','Kpg. Gatot Subroto No. 126, Yogyakarta 92698, SulBar','(+62) 685 2053 3646','Aktif','Balamantri Nashirudd',1996,'SMA','itaque','4537139','(+62) 965 9684 341','Maya Nurdiyanti',2021,'S2','illum','2295760','0782 4479 287',1,'693461881','693461881'),
('696510463','Azalea Susanti','Perempuan','Madiun','1996-04-27','Islam','Ki. Bakau Griya Utama No. 923, Yogyakarta 62877, Gorontalo','(+62) 300 5009 814','Aktif','Cahyanto Prayoga S.I',1974,'SMP','amet','4381667','0623 4005 4285','Kayla Puti Utami S.P',2020,'S1','explicabo','2076615','(+62) 470 1021 857',2,'696510463','696510463'),
('701882085','Prasetya Saptono','Perempuan','Mataram','1996-03-12','Islam','Kpg. Suprapto No. 205, Pariaman 35340, Gorontalo','0771 4993 6418','Aktif','Cornelia Safina Laks',2012,'S1','et','2031127','0641 1559 621','Ajeng Mardhiyah',1981,'S1','est','1976506','0853 1909 866',2,'701882085','701882085'),
('706259742','Darsirah Napitupulu M.Farm','Perempuan','Surakarta','1984-09-11','Islam','Ki. Basoka Raya No. 701, Tarakan 64952, Lampung','(+62) 689 5850 626','Aktif','Wardaya Gantar Sihom',1979,'SMP','nam','3897945','(+62) 657 9171 2771','Tomi Karma Rajasa S.',1988,'SMP','consequatur','2868039','(+62) 26 7982 8437',2,'706259742','706259742'),
('714270482','Estiawan Martani Narpati','Laki-Laki','Bukittinggi','2009-02-17','Islam','Ds. Sugiyopranoto No. 519, Sabang 16826, MalUt','(+62) 659 7544 977','Aktif','Najwa Mardhiyah',1996,'S2','odit','1023030','(+62) 311 3319 897','Najwa Melani',1999,'Tidak Sekolah','magnam','3956294','0464 1642 417',1,'714270482','714270482'),
('73579427','Karimah Winarsih S.Kom','Laki-Laki','Blitar','1985-11-14','Islam','Jr. Peta No. 335, Administrasi Jakarta Selatan 28308, BaBel','(+62) 21 6860 996','Aktif','Indra Uwais',2012,'SMP','iusto','1257329','(+62) 21 0582 036','Patricia Restu Widia',2005,'SMP','facilis','3274254','(+62) 356 5453 8788',3,'73579427','73579427'),
('736234635','Cinta Genta Purwanti','Perempuan','Lubuklinggau','2007-10-17','Islam','Psr. Ujung No. 676, Pontianak 78286, NTT','0716 1055 860','Aktif','Pangestu Siregar',1992,'SD','molestiae','3986261','0528 9747 132','Ridwan Sitompul',1994,'SMP','iusto','4754296','(+62) 440 4075 532',1,'736234635','736234635'),
('742902832','Jagapati Hartaka Hutapea','Laki-Laki','Tual','2020-04-01','Islam','Psr. Laswi No. 791, Samarinda 46490, KalUt','(+62) 342 2723 0642','Aktif','Kasiyah Fitria Nurai',1986,'SD','et','2122005','(+62) 829 3255 983','Puti Puspasari',2012,'SMP','voluptatem','1339038','0592 8252 8038',3,'742902832','742902832'),
('743473875','Dalima Mutia Usada S.Pt','Laki-Laki','Administrasi Jakarta Barat','2011-09-11','Islam','Psr. Wora Wari No. 113, Pasuruan 83015, Gorontalo','0685 9137 2019','Aktif','Cemeti Rajasa',2008,'Tidak Sekolah','molestiae','2972520','(+62) 862 1787 823','Mitra Cawisono Naing',1995,'S2','ut','4625046','(+62) 418 5005 589',1,'743473875','743473875'),
('746324293','Marsito Opung Nainggolan M.Kom','Laki-Laki','Pematangsiantar','1997-05-10','Islam','Jln. Baja Raya No. 689, Banjarmasin 47936, NTT','(+62) 708 3880 618','Aktif','Nalar Winarno',1984,'Tidak Sekolah','omnis','1402800','0572 3187 4071','Pangeran Saptono',2007,'S3','facere','2159994','0201 2843 982',3,'746324293','746324293'),
('747045849','Putri Kuswandari','Laki-Laki','Tanjung Pinang','1983-12-15','Islam','Psr. Bagonwoto  No. 269, Kediri 22535, KepR','0841 972 643','Aktif','Eva Malika Anggraini',2013,'S2','est','3203965','(+62) 823 029 129','Ifa Nasyidah',2007,'SMP','aliquid','3252549','0848 9097 1002',3,'747045849','747045849'),
('767933837','Gilda Nasyiah M.Farm','Perempuan','Manado','1975-07-29','Islam','Dk. BKR No. 369, Mataram 18871, DKI','(+62) 27 2332 343','Aktif','Cinthia Tiara Laksit',2011,'Tidak Sekolah','autem','4518386','0431 0199 530','Kania Bella Pertiwi',2004,'SMP','et','1063482','(+62) 26 0168 136',3,'767933837','767933837'),
('768260723','Tiara Padmasari','Perempuan','Pariaman','1996-04-14','Islam','Jr. Adisumarmo No. 580, Makassar 63161, KalSel','(+62) 203 4205 6994','Aktif','Akarsana Paiman Pran',2001,'SD','quae','1229519','0294 1176 053','Halima Betania Yunia',1970,'SMP','pariatur','3852263','0679 3235 591',3,'768260723','768260723'),
('811625850','Latika Vanya Rahimah','Laki-Laki','Surakarta','2013-04-05','Islam','Ki. B.Agam 1 No. 622, Banjar 76460, NTB','(+62) 969 1487 949','Aktif','Kawaca Laswi Pratama',2000,'SMP','sint','1144529','0575 1814 893','Pardi Firmansyah',2011,'SMP','nihil','1368027','0307 7970 143',3,'811625850','811625850'),
('81813097','Mila Fitria Mulyani','Laki-Laki','Singkawang','1974-12-21','Islam','Gg. Baja Raya No. 980, Kupang 30177, Riau','0750 4494 5909','Aktif','Genta Kusmawati',1991,'SMP','tempora','4148292','(+62) 839 4916 262','Lala Nasyiah',2010,'S1','animi','2943759','(+62) 998 1376 641',1,'81813097','81813097'),
('835936115','Kasusra Maheswara','Laki-Laki','Mojokerto','1983-02-16','Islam','Jr. Bakhita No. 921, Samarinda 17655, PapBar','(+62) 701 8822 6725','Aktif','Koko Balamantri Kusu',1997,'S1','porro','2203883','(+62) 21 3048 056','Maimunah Kusmawati M',1994,'SD','magnam','4651249','0805 6060 3832',3,'835936115','835936115'),
('848461965','Edison Tampubolon','Laki-Laki','Banjarmasin','2000-02-05','Islam','Kpg. Otista No. 92, Yogyakarta 14243, Maluku','0433 1397 696','Aktif','Hamzah Gamanto Firma',2019,'Tidak Sekolah','perferendis','4256854','028 5470 9196','Oni Ani Fujiati S.Pt',2016,'Tidak Sekolah','molestiae','2085773','0705 2050 3896',3,'848461965','848461965'),
('852885255','Kambali Marwata Najmudin S.Ked','Laki-Laki','Cirebon','1981-09-07','Islam','Gg. Surapati No. 832, Cirebon 37303, PapBar','023 2540 097','Aktif','Natalia Purwanti',1982,'Tidak Sekolah','quas','2163173','0717 8043 8742','Hana Hariyah',2007,'SMA','aperiam','2345059','0875 0611 331',2,'852885255','852885255'),
('859319146','Farhunnisa Sudiati','Laki-Laki','Sukabumi','1999-03-21','Islam','Psr. Tentara Pelajar No. 121, Langsa 28850, Aceh','(+62) 532 6349 4329','Aktif','Genta Puspasari M.M.',1972,'SMA','architecto','3167992','(+62) 24 7140 0155','Dinda Maryati',1971,'Tidak Sekolah','sunt','1222453','0864 1509 791',2,'859319146','859319146'),
('867874088','Amelia Ade Wulandari','Perempuan','Bau-Bau','2006-07-08','Islam','Psr. Baranang Siang Indah No. 139, Banjar 62741, JaBar','(+62) 997 7435 0419','Aktif','Titi Permata M.Pd',1972,'S2','explicabo','1339950','0301 9930 4652','Rina Nova Andriani M',2014,'S2','ut','1493986','(+62) 961 9284 1834',2,'867874088','867874088'),
('883401640','Elisa Sudiati','Laki-Laki','Prabumulih','1976-10-19','Islam','Dk. Jend. Sudirman No. 712, Bitung 86758, Aceh','(+62) 306 1115 924','Aktif','Umaya Pangestu S.Gz',1996,'S1','qui','1344424','(+62) 250 2163 5591','Hamima Usamah',1977,'SMP','aut','1972962','0794 8890 5286',2,'883401640','883401640'),
('896769803','Kasim Sihotang','Laki-Laki','Sukabumi','2006-08-02','Islam','Jln. Raya Setiabudhi No. 811, Bontang 71678, SulSel','(+62) 741 5723 5983','Aktif','Radit Winarno',2018,'SMP','sed','1762530','0864 0208 4634','Pia Mandasari',1973,'Tidak Sekolah','veniam','2085639','0871 0517 5143',2,'896769803','896769803'),
('896944612','Shakila Yulianti','Perempuan','Probolinggo','2016-10-28','Islam','Dk. Ujung No. 32, Palopo 86682, SumBar','0338 9827 978','Aktif','Cayadi Irawan S.Sos',1993,'S2','totam','1875230','(+62) 755 8437 2078','Tina Melani',1970,'S3','at','3517750','(+62) 746 6978 532',2,'896944612','896944612'),
('897962972','Embuh Saragih S.I.Kom','Laki-Laki','Banjar','1982-01-29','Islam','Dk. Cut Nyak Dien No. 520, Palopo 90891, SumSel','0452 1965 8155','Aktif','Wani Yuliarti S.Gz',2001,'Tidak Sekolah','hic','3424199','(+62) 979 4589 406','Kawaya Budiman',2019,'SD','accusantium','1126758','0417 7697 8693',1,'897962972','897962972'),
('913610650','Gaiman Pratama','Perempuan','Payakumbuh','2017-02-08','Islam','Ds. Diponegoro No. 517, Lhokseumawe 63342, MalUt','(+62) 414 1384 6569','Aktif','Tri Pradana',2000,'SD','quasi','2541549','(+62) 820 8348 7769','Dinda Zalindra Novit',2001,'SD','voluptas','4260909','0718 7134 5021',2,'913610650','913610650'),
('913816019','Jasmani Rajasa','Laki-Laki','Palembang','1988-03-06','Islam','Gg. Pacuan Kuda No. 738, Kotamobagu 66461, SumBar','(+62) 302 2653 367','Aktif','Ilyas Arta Budiman',2002,'S3','quia','1961852','(+62) 521 0476 9169','Sarah Iriana Nasyida',2017,'S2','suscipit','1289870','0820 1654 002',1,'913816019','913816019'),
('916902423','Azalea Yuniar','Perempuan','Gunungsitoli','1972-08-16','Islam','Dk. Sudiarto No. 966, Bengkulu 45929, KalUt','(+62) 21 0570 9629','Aktif','Imam Widodo S.Pd',2009,'SMP','ratione','3163608','0968 3313 580','Vinsen Budiman',2009,'SMP','soluta','3372729','(+62) 368 9715 334',1,'916902423','916902423'),
('930129399','Dewi Karimah Agustina M.Pd','Laki-Laki','Padang','2003-11-04','Islam','Dk. Soekarno Hatta No. 653, Lubuklinggau 12271, KalUt','(+62) 668 6217 6831','Aktif','Yance Fitriani Hastu',1995,'SD','et','4358256','0722 8791 2162','Tina Azalea Suartini',2006,'S3','provident','1490771','(+62) 954 0481 5865',1,'930129399','930129399'),
('938185433','Joko Iswahyudi M.TI.','Perempuan','Sawahlunto','1999-11-10','Islam','Jr. Wora Wari No. 992, Bogor 83594, DIY','(+62) 660 8459 7631','Aktif','Zamira Usamah',1995,'SMP','at','3208312','0578 9447 559','Jayeng Jayadi Winarn',2013,'S1','doloribus','1665339','0728 1198 691',1,'938185433','938185433'),
('943736303','Tina Hassanah','Laki-Laki','Yogyakarta','1971-03-11','Islam','Psr. Barasak No. 815, Madiun 81359, DIY','0492 0667 8478','Aktif','Putri Mandasari',1978,'S2','facere','1376419','022 3972 6481','Almira Palastri',1990,'Tidak Sekolah','enim','1217198','(+62) 891 2882 5632',1,'943736303','943736303'),
('962851193','Diana Pertiwi','Perempuan','Bengkulu','1994-04-04','Islam','Gg. Sugiyopranoto No. 102, Pontianak 71528, JaTeng','0217 9249 643','Aktif','Devi Prastuti S.I.Ko',2004,'S3','quia','4446797','(+62) 244 8540 150','Rachel Indah Haryant',1976,'SMA','quia','3426677','0440 3604 321',3,'962851193','962851193'),
('973823874','Irfan Nalar Lazuardi','Laki-Laki','Cilegon','1997-07-19','Islam','Ki. Moch. Ramdan No. 853, Solok 10465, KalTim','0539 2942 310','Aktif','Anita Shania Pertiwi',2016,'SD','recusandae','1008303','(+62) 615 4557 0601','Gara Jabal Widodo S.',1990,'SMA','quis','1038890','(+62) 660 7937 1036',1,'973823874','973823874'),
('984784531','Kenes Tampubolon','Perempuan','Medan','1998-06-04','Islam','Jln. Sutarto No. 332, Palu 55954, Maluku','0842 7666 7377','Aktif','Kacung Saragih',1995,'Tidak Sekolah','vitae','4411540','(+62) 982 4886 619','Radika Marpaung',2003,'S1','inventore','1426058','(+62) 841 839 509',2,'984784531','984784531'),
('985529424','Umaya Sirait','Laki-Laki','Payakumbuh','1982-03-24','Islam','Gg. Sukabumi No. 985, Pematangsiantar 49592, SumSel','023 3436 1624','Aktif','Safina Lalita Farida',2020,'SD','eveniet','2154732','(+62) 565 1584 877','Nilam Mulyani',2011,'Tidak Sekolah','nisi','3836164','(+62) 394 8217 048',1,'985529424','985529424');

/*Data for the table `tb_tahun_ajaran` */

insert  into `tb_tahun_ajaran`(`id`,`tahun`,`status`) values 
(1,'2019/2020','Aktif'),
(2,'2020/2021','Tidak Aktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
