-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_gap`;
CREATE TABLE `tb_gap` (
  `gap_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gap_selisih` int(11) NOT NULL,
  `gap_bobot` float NOT NULL,
  `gap_ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`gap_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tb_gap` (`gap_id`, `gap_selisih`, `gap_bobot`, `gap_ket`) VALUES
(1,	0,	5,	'Tak Ada Selisih (kompetensi sesuai yang dibutuhkan)'),
(2,	1,	4.5,	'Kompetensi individu kelebihan 1 tingkat/level'),
(3,	-1,	4,	'Kompetensi individu kekurangan 1 tingkat/level'),
(4,	2,	3.5,	'Kompetensi individu kelebihan 2 tingkat/level'),
(5,	-2,	3,	'Kompetensi individu kekurangan 2 tingkat/level'),
(6,	3,	2.5,	'Kompetensi individu kelebihan 3 tingkat/level'),
(7,	-3,	2,	'Kompetensi individu kekurangan 3 tingkat/level'),
(8,	4,	1.5,	'Kompetensi individu kelebihan 4 tingkat/level'),
(9,	-4,	1,	'Kompetensi individu kekurangan 4 tingkat/level');

DROP TABLE IF EXISTS `tb_kriteria`;
CREATE TABLE `tb_kriteria` (
  `kriteria_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria_jenis` enum('Core Factor','Secondary Factor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Core Factor',
  `kriteria_bobot` double(8,2) NOT NULL,
  PRIMARY KEY (`kriteria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tb_kriteria` (`kriteria_id`, `kriteria_nama`, `kriteria_jenis`, `kriteria_bobot`) VALUES
(1,	'Quality',	'Core Factor',	60.00),
(2,	'Cost',	'Core Factor',	60.00),
(3,	'Delivery',	'Secondary Factor',	40.00),
(4,	'Responsiveness',	'Secondary Factor',	40.00);

DROP TABLE IF EXISTS `tb_profil_standar`;
CREATE TABLE `tb_profil_standar` (
  `profil_standar_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_id` bigint(20) unsigned NOT NULL,
  `sub_kriteria_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`profil_standar_id`),
  KEY `kriteria_id` (`kriteria_id`),
  KEY `sub_kriteria_id` (`sub_kriteria_id`),
  CONSTRAINT `tb_profil_standar_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `tb_kriteria` (`kriteria_id`),
  CONSTRAINT `tb_profil_standar_ibfk_2` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `tb_sub_kriteria` (`sub_kriteria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tb_profil_standar` (`profil_standar_id`, `kriteria_id`, `sub_kriteria_id`) VALUES
(1,	1,	1);

DROP TABLE IF EXISTS `tb_sub_kriteria`;
CREATE TABLE `tb_sub_kriteria` (
  `sub_kriteria_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_id` bigint(20) unsigned NOT NULL,
  `sub_kriteria_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_kriteria_nilai` double(8,2) NOT NULL,
  PRIMARY KEY (`sub_kriteria_id`),
  KEY `kriteria_id` (`kriteria_id`),
  CONSTRAINT `tb_sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `tb_kriteria` (`kriteria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tb_sub_kriteria` (`sub_kriteria_id`, `kriteria_id`, `sub_kriteria_nama`, `sub_kriteria_nilai`) VALUES
(1,	1,	'Deserunt dolor neces',	123.00),
(2,	1,	'Voluptatum autem cum',	123.00),
(3,	1,	'Blanditiis laboriosa',	1.00);

DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier` (
  `supplier_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_notlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tb_supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_email`, `supplier_notlp`) VALUES
(1,	'Deserunt expedita et',	'Dignissimos quasi es',	'tukoq@mailinator.com',	'A sunt temporibus no'),
(3,	'Eos ex placeat qua',	'Elit tempore adipi',	'vudife@mailinator.com',	'Deserunt consequuntu'),
(4,	'Reiciendis est aperi',	'Soluta distinctio Q',	'bulapixanu@mailinator.com',	'Eum a ullamco aliqua');

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','pimpinan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tb_user_email_unique` (`email`),
  UNIQUE KEY `tb_user_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tb_user` (`id`, `name`, `email`, `username`, `level`, `password`) VALUES
(11,	'Adminstrator',	'admin@mail.com',	'admin',	'admin',	'$2y$10$9uDRxBWheZngmUSjAgOmO.wj6BBIGyS/i5xJ3nxYfihWV6vKSRQFO'),
(15,	'Hiram Mcdaniel',	'pimpinan@mail.com',	'pimpinan',	'pimpinan',	'$2y$10$ghhcmq9mkWAHpXWysTp7/eZ9aDmw2RYny.0rlyL7NX4RMRvDCfsPG');

-- 2022-06-23 09:47:56
