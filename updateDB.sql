USE `akademik_sdk_rentung`;
TRUNCATE TABLE `akademik_sdk_rentung`.`tb_nilai`; 
CREATE TABLE `akademik_sdk_rentung`.`tb_extra_siswa`( `nisn` VARCHAR(20), `id_extra` INT(10), `thn_ajaran` VARCHAR(10) );
ALTER TABLE `akademik_sdk_rentung`.`tb_nilai` CHANGE `jns_nilai` `jns_nilai` TEXT CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL; 
