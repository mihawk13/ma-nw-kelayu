
USE `akademik_sdk_rentung`;

CREATE TABLE `tb_raport` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn_ajaran` VARCHAR(10) DEFAULT NULL,
  `semester` INT(1) DEFAULT NULL,
  `nisn` VARCHAR(20) DEFAULT NULL,
  `a_sikap_spiritual` VARCHAR(200) DEFAULT NULL,
  `a_sikap_sosial` VARCHAR(200) DEFAULT NULL,
  `d_saran_saran` VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIK` (`thn_ajaran`,`semester`,`nisn`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_raport_detail` */

DROP TABLE IF EXISTS `tb_raport_detail`;

CREATE TABLE `tb_raport_detail` (
  `id_raport` INT(10) NOT NULL,
  `id_mapel` INT(10) NOT NULL,
  `pengetahuan` VARCHAR(200) NOT NULL,
  `keterampilan` VARCHAR(200) NOT NULL,
  UNIQUE KEY `UNIK` (`id_raport`,`id_mapel`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_raport_extra` */

DROP TABLE IF EXISTS `tb_raport_extra`;

CREATE TABLE `tb_raport_extra` (
  `id_raport` INT(10) DEFAULT NULL,
  `id_extra` INT(10) DEFAULT NULL,
  `keterangan` VARCHAR(200) DEFAULT NULL,
  UNIQUE KEY `UNIK` (`id_raport`,`id_extra`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `akademik_sdk_rentung`.`tb_mapel` ADD COLUMN `mulok` BOOLEAN DEFAULT FALSE NULL AFTER `nama_mapel`;

INSERT INTO tb_mapel (nama_mapel,mulok) VALUES('Bahasa Daerah', 1);