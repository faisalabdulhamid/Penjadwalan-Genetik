/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - jadwal_genetika
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jadwal_genetika` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jadwal_genetika`;

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nidn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dosen_nidn_unique` (`nidn`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dosen` */

insert  into `dosen`(`id`,`nidn`,`nama`) values (1,'101','Tono Hartono, S.Si,MT'),(2,'102','Wartika,S.Kom,MT'),(3,'103','Lusi Melian,S.Si,MT'),(4,'104','Deasy Permatasari,S.Si,MT'),(5,'105','Wahyuni,S.Si,MT'),(6,'106','Citra Noviyasari,S.Si,MT'),(7,'107','Iyan Gustiana,S.Kom,M.Kom'),(8,'108','Yasmi Afrizal,S.Kom,M.Kom'),(9,'109','Imelda,ST,MT'),(10,'110','Diana Effendi,ST,MT'),(11,'111','Sintya Sukarta, ST,MT'),(12,'112','R. Fenny Syafariani,S.Si, M.Stat'),(13,'113','Novrini Hasti, S.Si,MT'),(14,'114','Marliana Budhiningtyas.S.Si.,M.Si'),(15,'115','Syahrul Mauluddin,S.Kom.,M.Kom'),(16,'116','Julian Chandra W, S.Kom.,M.Kom'),(17,'117','Bella Hardiyana, S.Kom.,M.Kom'),(18,'118','Andri Sahata, S.Kom.,M.Kom'),(19,'119','Rauf Fauzan, S.Kom.,M.Kom'),(20,'120','M.Rajab, S.Kom.,M.Kom'),(21,'121','Annisa Paramitha, S.Kom.,M.Kom'),(22,'122','Myrna Dwi R, S.Kom.,M.Kom'),(23,'123','Leonardi Paris H, S.Kom.,M.Kom., M.Eng'),(24,'124','Rangga Sidik, S.Kom.,M.Kom., M.Eng'),(25,'125','Mia Fitriawati, S.Kom.,M.Kom'),(26,'126','Nizar Rabbi R, S.Kom.,M.Kom'),(27,'127','Rani Puspita Dhaniawati, S.Kom.,M.Kom'),(28,'128','Agus Nursikuwagus, S.T.,Mm.,Mos.,M.T.,MTA'),(29,'129','Erna Susilawati, S.S.,MM'),(30,'130','Angga Fitriyanto, S.Kom'),(31,'131','Ratna Imanira, S.SI'),(32,'132','Wati Aris Astuti, SE., M.Si'),(33,'133','Sri Dewi Anggadini, SE., M.Si., Ak'),(34,'134','Inta Budi Setya Nusa,SE, M.Ak'),(35,'135','Dani Hamdani, S.Kom, MT'),(36,'136','Suwinarno,S.Kom, M.Kom'),(37,'137','Herwan Suwandy, S.Pd, M.Kom'),(38,'138','Dian Permata Sari, S.Kom., M.Kom');

/*Table structure for table `hari` */

DROP TABLE IF EXISTS `hari`;

CREATE TABLE `hari` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hari` */

insert  into `hari`(`id`,`nama`) values (1,'Senin'),(2,'Selasa'),(3,'Rabu'),(4,'Kamis'),(5,'Jum\'at'),(6,'Sabtu');

/*Table structure for table `jam` */

DROP TABLE IF EXISTS `jam`;

CREATE TABLE `jam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `range_jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jam` */

insert  into `jam`(`id`,`range_jam`) values (1,'07.00 - 07.45'),(2,'07.45 - 08.30'),(3,'08.30 - 09.15'),(4,'09.15 - 10.00'),(5,'10.00 - 10.45'),(6,'10.45 - 11.30'),(7,'11.30 - 12.15'),(8,'12.15 - 13.00'),(9,'13.00 - 13.45'),(10,'13.45 - 14.30'),(11,'14.30 - 15.15'),(12,'15.15 - 16.00'),(13,'16.00 - 16.45'),(14,'16.45 - 17.30');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  CONSTRAINT `kelas_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelas` */

insert  into `kelas`(`id`,`kelas`,`tahun_ajaran_id`) values (1,'SD-1',1),(2,'SD-2',1),(3,'SD-3',1),(4,'SD-4',1),(5,'SD-5',1),(6,'KSI-1',1),(7,'KSI-2',1),(8,'KSI-3',1),(9,'KSI-4',1),(10,'KSI-5',1),(11,'KSI-6',1),(12,'SBD-1',1),(13,'SBD-2',1),(14,'SBD-3',1),(15,'SBD-4',1),(16,'SBD-5',1),(17,'SBD-6',1),(18,'MTK.2-1',1),(19,'MTK.2-2',1),(20,'MTK.2-3',1),(21,'MTK.2-4',1),(22,'MTK.2-5',1),(23,'MTK.2-6',1),(24,'AKUN-1',1),(25,'AKUN-2',1),(26,'AKUN-3',1),(27,'AKUN-4',1),(28,'AKUN-5',1),(29,'AKUN-6',1),(30,'LBD.1-1',1),(31,'LBD.1-2',1),(32,'LBD.1-3',1),(33,'LBD.1-4',1),(34,'LBD.1-5',1),(35,'LBD.1-6',1),(36,'SO-1',1),(37,'SO-2',1),(38,'SO-3',1),(39,'SO-4',1),(40,'SO-5',1),(41,'SO-6',1),(42,'MENSA-1',1),(43,'MENSA-2',1),(44,'MENSA-3',1),(45,'MENSA-4',1),(46,'MENSA-5',1),(47,'MENSA-6',1),(48,'KEB-1',1),(49,'KEB-2',1),(50,'KEB-3',1),(51,'KEB-4',1),(52,'KEB-5',1),(53,'KEB-6',1),(54,'BD-1',1),(55,'BD-2',1),(56,'BD-3',1),(57,'BD-4',1),(58,'BD-5',1),(59,'BD-6',1),(60,'LBD-1-1',1),(61,'LBD-1-2',1),(62,'LBD-1-3',1),(63,'LBD-1-4',1),(64,'LBD-1-5',1),(65,'LBD-1-6',1),(66,'APBO-1',1),(67,'APBO-2',1),(68,'APBO-3',1),(69,'APBO-4',1),(70,'APBO-5',1),(71,'APBO-6',1),(72,'LP.2-1',1),(73,'LP.2-2',1),(74,'LP.2-3',1),(75,'LP.2-4',1),(76,'LP.2-5',1),(77,'LP.2-6',1),(78,'AMI.2-1',1),(79,'AMI.2-2',1),(80,'AMI.2-3',1),(82,'AMI.2-5',1),(83,'AMI.2-6',1),(84,'AMI.2-7',1),(85,'DM-1',1),(86,'DM-2',1),(87,'DM-3',1),(89,'DM-5',1),(90,'DM-6',1),(91,'DM-7',1),(92,'KM-1',1),(93,'KM-2',1),(94,'KM-3',1),(95,'KM-4',1),(97,'KM-6',1),(98,'KM-7',1),(99,'LSTAT-1',1),(100,'LSTAT-2',1),(101,'LSTAT-3',1),(102,'LSTAT-4',1),(103,'LSTAT-5',1),(104,'LSTAT-6',1),(105,'PWL-1',1),(106,'PWL-2',1),(108,'PWL-4',1),(109,'PWL-5',1),(110,'PWL-6',1),(111,'PWL-7',1),(112,'SIT-13',1),(113,'SIT-14',1),(114,'SIT-15',1),(115,'SIT-16',1),(116,'SIT-17',1),(117,'RPL-1',1),(118,'RPL-2',1),(119,'RPL-7',1),(120,'RPL-4',1),(121,'RPL-5',1),(122,'RPL-6',1),(123,'JKL-10',1),(124,'JKL-11',1),(125,'JKL-9',1),(126,'EP-1',1),(127,'EP-2',1),(128,'EP-3',1),(129,'EP-4',1),(130,'EP-5',1),(131,'EP-7',1),(133,'KAP-1',1),(134,'KAP-2',1),(135,'KAP-3',1),(136,'KAP-4',1),(137,'KAP-5',1),(138,'KAP-6',1),(139,'KAP-7',1),(140,'SPK-11',1),(141,'SPK-12',1),(142,'SPK-13',1),(143,'SPK-14',1),(144,'SPK-15',1),(145,'SPK-16',1),(146,'AKSI-11',1),(147,'AKSI-12',1),(148,'AKSI-13',1),(149,'AKSI-14',1),(150,'AKSI-15',1),(151,'AKSI-16',1),(152,'KOMAS-1',1),(153,'KOMAS-2',1),(154,'KOMAS-7',1),(155,'KOMAS-4',1),(156,'KOMAS-5',1),(157,'KOMAS-6',1),(159,'TM-10',1),(160,'TM-8',1),(161,'TM-9',1),(162,'KMNSI-10',1),(163,'KMNSI-8',1),(164,'KMNSI-9',1),(165,'KPO-1',1),(166,'KPO-2',1),(167,'KPO-3',1),(168,'KPO-4',1),(169,'KPO-5',1),(170,'KPO-6',1);

/*Table structure for table `ketentuan_dosen` */

DROP TABLE IF EXISTS `ketentuan_dosen`;

CREATE TABLE `ketentuan_dosen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bobot_fitness` tinyint(4) NOT NULL DEFAULT '5',
  `dosen_id` int(10) unsigned NOT NULL,
  `hari_id` int(10) unsigned NOT NULL,
  `jam_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ketentuan_dosen_dosen_id_foreign` (`dosen_id`),
  KEY `ketentuan_dosen_hari_id_foreign` (`hari_id`),
  KEY `ketentuan_dosen_jam_id_foreign` (`jam_id`),
  CONSTRAINT `ketentuan_dosen_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ketentuan_dosen_hari_id_foreign` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ketentuan_dosen_jam_id_foreign` FOREIGN KEY (`jam_id`) REFERENCES `jam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ketentuan_dosen` */

insert  into `ketentuan_dosen`(`id`,`bobot_fitness`,`dosen_id`,`hari_id`,`jam_id`) values (1,5,16,3,10),(2,5,16,3,11),(3,5,16,3,12),(4,5,16,3,14),(5,5,23,5,1),(6,5,23,5,2),(7,5,23,5,3),(8,5,23,5,4),(9,5,23,5,6),(10,5,23,5,7),(11,5,23,5,8),(12,5,23,5,9),(13,5,23,5,10),(14,5,23,5,11),(15,5,23,5,12),(16,5,23,5,13),(17,5,23,5,14),(18,5,27,3,9),(19,5,27,3,10),(20,5,27,3,11),(21,5,27,3,12),(22,5,27,3,14),(23,5,23,6,1),(24,5,23,6,2),(25,5,23,6,4),(26,5,23,6,5),(27,5,23,6,6),(28,5,23,6,7),(29,5,23,6,8),(30,5,23,6,9),(31,5,23,6,10),(32,5,23,6,12),(33,5,23,6,13),(34,5,23,6,14);

/*Table structure for table `ketentuan_matkul` */

DROP TABLE IF EXISTS `ketentuan_matkul`;

CREATE TABLE `ketentuan_matkul` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matkul_id` int(10) unsigned NOT NULL,
  `ruangan_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ketentuan_matkul_matkul_id_foreign` (`matkul_id`),
  KEY `ketentuan_matkul_ruangan_id_foreign` (`ruangan_id`),
  CONSTRAINT `ketentuan_matkul_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ketentuan_matkul_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ketentuan_matkul` */

insert  into `ketentuan_matkul`(`id`,`matkul_id`,`ruangan_id`) values (1,28,9),(2,35,9),(3,34,11),(4,44,11),(5,37,10),(6,46,10);

/*Table structure for table `ketentuan_ruangan` */

DROP TABLE IF EXISTS `ketentuan_ruangan`;

CREATE TABLE `ketentuan_ruangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruangan_id` int(10) unsigned NOT NULL,
  `hari_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ketentuan_ruangan_ruangan_id_foreign` (`ruangan_id`),
  KEY `ketentuan_ruangan_hari_id_foreign` (`hari_id`),
  CONSTRAINT `ketentuan_ruangan_hari_id_foreign` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ketentuan_ruangan_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ketentuan_ruangan` */

insert  into `ketentuan_ruangan`(`id`,`ruangan_id`,`hari_id`) values (1,12,1),(2,13,2);

/*Table structure for table `matakuliah` */

DROP TABLE IF EXISTS `matakuliah`;

CREATE TABLE `matakuliah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_mk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` tinyint(3) unsigned NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('TEORI','PRAKTIKUM') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matakuliah_kode_mk_unique` (`kode_mk`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `matakuliah` */

insert  into `matakuliah`(`id`,`kode_mk`,`nama`,`sks`,`semester`,`jenis`) values (1,'IS31271','Bahasa Inggris I',2,'1','TEORI'),(2,'IS31272','Pengantar Ilmu Komputer',3,'1','TEORI'),(3,'IS31273','Matematika I ',3,'1','TEORI'),(4,'IS31274','Dasar Manajemen & Bisnis',3,'1','TEORI'),(5,'IS31275','Algoritma & Struktur Data I',3,'1','TEORI'),(6,'IS31371L','Komputer Aplikasi SI',2,'1','TEORI'),(7,'IS31372L','Komputer Aplikasi IT ',2,'1','TEORI'),(8,'IS32276','Bahasa Inggris II',2,'2','TEORI'),(9,'IS32171','Pendidikan Agama',2,'2','TEORI'),(10,'IS32277','Akuntansi',3,'2','TEORI'),(11,'IS32278','Konsep Sistem Informasi',3,'2','TEORI'),(12,'IS32279','Pengantar Teknologi Informasi',2,'2','TEORI'),(13,'IS32373L','Lab. Komputer Akuntansi ',2,'2','TEORI'),(14,'IS32374L','Lab. Pemrograman Dasar ',2,'2','TEORI'),(15,'IS32172','Pancasila',2,'2','TEORI'),(16,'IS33173','Kewarganegaraan',2,'3','TEORI'),(17,'IS33280','Analisis Proses Bisnis',2,'3','TEORI'),(18,'IS33281','Matematika 2',3,'2','TEORI'),(19,'IS33282','Analisis & Perancangan Sistem Informasi',3,'3','TEORI'),(20,'IS33283','Algoritma & Struktur Data II',3,'3','TEORI'),(21,'IS33375L','Lab. Pemrograman I ',2,'3','TEORI'),(22,'IS33376L','Hardware Komputer ',3,'3','TEORI'),(23,'IS34284','Sistem Operasi',3,'4','TEORI'),(24,'IS34285','Manajemen Sains',3,'4','TEORI'),(25,'IS34286','Konsep E-Business',2,'4','TEORI'),(26,'IS34287','Basis Data',3,'4','TEORI'),(27,'IS34377L','Lab. Basis Data I ',2,'4','TEORI'),(28,'IS34378','Analisis & Perancangan Berorientasi Objek',3,'4','TEORI'),(29,'IS34379L','Lab. Pemrograman II ',2,'4','TEORI'),(30,'IS35288','Statistika',3,'5','TEORI'),(31,'IS35471','Manajemen Sistem Informasi',3,'5','TEORI'),(32,'IS35380','Perancangan Basis Data',3,'5','TEORI'),(33,'IS35381','Jaringan Komputer',3,'5','TEORI'),(34,'IS35382L','Lab. Basis Data II ',2,'5','TEORI'),(35,'IS35383L','Pemrograman Web ',2,'5','TEORI'),(36,'IS35385L','Animasi dan Multimedia Interaktif 1',2,'5','TEORI'),(37,'IS35384L','Pemrograman III ',2,'5','TEORI'),(38,'IS36289','Data Mining',3,'6','TEORI'),(39,'IS36385','Knowledge Management',3,'6','TEORI'),(40,'IS36388A','Sistem Informasi Terdistribusi',3,'6','TEORI'),(41,'IS36388B','Jaringan Komputer Lanjut',3,'6','TEORI'),(42,'IS36386L','Laboratorium Statistika',2,'6','TEORI'),(43,'IS36472','Rekayasa Perangkat Lunak',3,'6','TEORI'),(44,'IS36387L','Pemrograman Web Lanjut ',2,'6','TEORI'),(45,'IS36388L','Animasi dan Multimedia Interaktif 2',2,'6','TEORI'),(46,'IS36571K','Kerja Praktek',2,'6','TEORI'),(47,'IS37473','Manajemen Proyek Sistem Informasi',3,'7','TEORI'),(48,'IS37389','Pengelolaan Instalasi Komputer',3,'7','TEORI'),(49,'IS37391A','E-Commerce Lanjut',3,'7','TEORI'),(50,'IS37391B','Pemrograman Mobile',3,'7','TEORI'),(51,'IS37390','Testing dan Implementasi Sistem',3,'7','TEORI'),(52,'IS37475','Kewirausahaan',3,'7','TEORI'),(53,'IS37474','Metodologi  Penelitian',3,'7','TEORI'),(54,'IS38478A','Sistem Pendukung Keputusan',3,'8','TEORI'),(55,'IS38478B','Teknik Multimedia',3,'8','TEORI'),(56,'IS38479A','Analisis Kinerja Sistem Informasi',3,'8','TEORI'),(57,'IS38479B','Keamanan Sistem Informasi',3,'8','TEORI'),(58,'IS38476','Etika Profesi',2,'8','TEORI'),(59,'IS38572','Komputer dan Masyarakat',2,'8','TEORI'),(60,'IS38477','Kecakapan Antarpersonal',2,'8','TEORI'),(61,'IS38573S','Skripsi',6,'8','TEORI'),(62,'IS312790-','Struktur Data',2,'2','TEORI'),(63,'IS312791-','Konsep Pemrograman Objek',2,'2','TEORI'),(64,'IS34377L-','Lab. Basis Data 1',2,'2','PRAKTIKUM'),(65,'IS312792-','Sistem Basis Data',2,'2','TEORI');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2017_09_13_171729_create_dosens_table',1),(2,'2017_09_13_172118_create_matakuliahs_table',1),(3,'2017_09_13_172608_create_haris_table',1),(4,'2017_09_13_172654_create_jams_table',1),(5,'2017_09_13_173006_create_kelas_table',1),(6,'2017_09_13_211018_create_tahun_ajarans_table',1),(7,'2017_09_13_212552_AlterKelasThn',1),(8,'2017_09_13_213550_create_pengampus_table',1),(9,'2017_09_14_071147_create_ruangans_table',1),(10,'2017_09_14_184409_create_ketentuan_dosens_table',1),(11,'2017_09_15_154149_create_ketentuan_matkuls_table',1),(12,'2017_09_15_154905_create_ketentuan_ruangans_table',1);

/*Table structure for table `pengampu` */

DROP TABLE IF EXISTS `pengampu`;

CREATE TABLE `pengampu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matkul_id` int(10) unsigned DEFAULT NULL,
  `dosen_id` int(10) unsigned DEFAULT NULL,
  `kelas_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengampu_matkul_id_foreign` (`matkul_id`),
  KEY `pengampu_dosen_id_foreign` (`dosen_id`),
  KEY `pengampu_kelas_id_foreign` (`kelas_id`),
  CONSTRAINT `pengampu_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengampu_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengampu_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pengampu` */

insert  into `pengampu`(`id`,`matkul_id`,`dosen_id`,`kelas_id`) values (1,11,5,6),(2,11,5,7),(3,11,5,8),(4,11,5,9),(5,11,5,10),(6,11,23,11),(7,18,31,18),(8,18,31,19),(9,18,3,20),(10,18,3,21),(11,18,6,22),(12,18,6,23),(13,10,32,24),(14,10,32,25),(15,10,33,26),(16,10,33,27),(17,10,32,28),(18,10,34,29),(19,23,28,36),(20,23,24,37),(21,23,28,38),(22,23,24,39),(23,23,24,40),(24,23,28,41),(25,24,13,42),(26,24,13,43),(27,24,13,44),(28,24,13,45),(29,24,3,46),(30,24,3,47),(31,25,29,48),(32,25,2,49),(33,25,29,50),(34,25,29,51),(35,25,29,52),(36,25,29,53),(37,26,10,54),(38,26,10,55),(39,26,10,56),(40,26,10,57),(41,26,25,58),(42,26,25,59),(43,27,22,30),(44,27,22,31),(45,27,22,32),(46,27,22,33),(47,27,22,34),(48,27,22,35),(49,28,6,66),(50,28,6,67),(51,28,21,68),(52,28,21,69),(53,28,21,70),(54,28,21,71),(55,29,15,72),(56,28,15,73),(57,28,15,74),(58,29,15,75),(59,29,15,76),(60,34,16,77),(61,45,25,78),(62,45,27,79),(63,45,27,80),(65,45,25,82),(66,45,26,83),(67,45,26,84),(68,38,28,85),(69,38,28,86),(70,38,28,87),(72,38,9,89),(73,38,35,90),(74,38,35,91),(75,39,24,92),(76,39,24,93),(77,39,24,94),(78,39,23,95),(80,39,23,97),(81,39,23,98),(82,42,12,99),(83,42,12,100),(84,42,12,101),(85,42,12,102),(86,42,12,103),(87,42,12,104),(88,44,22,105),(89,44,18,106),(91,44,22,108),(92,44,20,109),(93,44,20,110),(94,44,22,111),(95,40,27,112),(96,40,27,113),(97,40,27,114),(98,40,27,115),(99,40,27,116),(100,43,8,117),(101,43,19,118),(102,43,8,119),(103,43,19,120),(104,43,8,121),(105,43,8,122),(106,41,17,123),(107,41,30,124),(108,41,20,125),(109,58,25,126),(110,58,25,127),(111,58,4,128),(112,58,4,129),(113,58,4,130),(114,58,4,131),(115,60,14,133),(116,60,14,134),(117,60,14,135),(118,60,14,136),(119,60,14,137),(120,60,14,138),(121,60,14,139),(122,54,2,140),(123,54,2,141),(124,54,2,142),(125,54,19,143),(126,54,19,144),(127,54,19,145),(128,56,9,146),(129,56,9,147),(130,56,9,148),(131,56,9,149),(132,56,20,150),(133,56,20,151),(134,59,18,152),(135,59,18,153),(136,59,18,154),(137,59,36,155),(138,59,18,156),(139,59,18,157),(140,55,17,159),(141,55,17,160),(142,55,17,161),(143,57,37,162),(144,57,37,163),(145,57,37,164),(146,62,1,1),(147,62,1,2),(148,62,1,3),(149,62,1,4),(150,62,38,5),(151,65,26,12),(152,65,26,13),(153,65,26,14),(154,65,26,15),(155,65,26,16),(156,65,36,17),(157,64,7,60),(158,64,7,61),(159,64,7,62),(160,64,7,63),(161,64,7,64),(162,64,7,65),(163,63,16,165),(164,63,16,166),(165,63,16,167),(166,63,16,168),(167,63,16,169),(168,63,16,170);

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` tinyint(4) DEFAULT NULL,
  `jenis` enum('TEORI','LABORATORIUM') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TEORI',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ruangan` */

insert  into `ruangan`(`id`,`nama`,`kapasitas`,`jenis`) values (1,'4210',NULL,'TEORI'),(2,'4214',NULL,'TEORI'),(3,'5204',NULL,'TEORI'),(4,'5205',NULL,'TEORI'),(5,'5206',NULL,'TEORI'),(6,'4516',NULL,'TEORI'),(7,'5606',NULL,'TEORI'),(8,'5607',NULL,'TEORI'),(9,'LAB 4',NULL,'LABORATORIUM'),(10,'LAB 7.010',NULL,'LABORATORIUM'),(11,'LAB 9.010',NULL,'LABORATORIUM'),(12,'LAB 9',NULL,'LABORATORIUM'),(13,'LAB 8',NULL,'LABORATORIUM');

/*Table structure for table `tahun_ajaran` */

DROP TABLE IF EXISTS `tahun_ajaran`;

CREATE TABLE `tahun_ajaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tahun_ajaran_tahun_ajaran_unique` (`tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tahun_ajaran` */

insert  into `tahun_ajaran`(`id`,`tahun_ajaran`,`aktif`) values (1,'2016 - 2017',1),(2,'2017 - 2018',NULL),(3,'2018 - 2019',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
