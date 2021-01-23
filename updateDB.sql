USE `akademik_sdk_rentung`;
TRUNCATE TABLE `akademik_sdk_rentung`.`tb_nilai`; 
CREATE TABLE `akademik_sdk_rentung`.`tb_extra_siswa`( `nisn` VARCHAR(20), `id_extra` INT(10), `thn_ajaran` VARCHAR(10) );
ALTER TABLE `akademik_sdk_rentung`.`tb_nilai` CHANGE `jns_nilai` `jns_nilai` TEXT CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL; 

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
