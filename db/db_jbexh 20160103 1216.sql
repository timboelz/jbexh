﻿-- Script was generated by Devart dbForge Studio for MySQL, Version 6.0.128.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 1/3/2016 12:16:42
-- Server version: 5.6.20
-- Client version: 4.1
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

SET NAMES 'utf8';

USE db_jbexh;

DROP TABLE IF EXISTS tbl_admin;
CREATE TABLE tbl_admin (
  id INT(10) NOT NULL AUTO_INCREMENT,
  username VARCHAR(30) DEFAULT NULL,
  password VARCHAR(15) DEFAULT NULL,
  level VARCHAR(15) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

DROP TABLE IF EXISTS tbl_event;
CREATE TABLE tbl_event (
  event_id VARCHAR(25) NOT NULL,
  event_name VARCHAR(150) NOT NULL,
  event_address VARCHAR(255) NOT NULL,
  event_location VARCHAR(255) NOT NULL,
  event_date DATE NOT NULL,
  event_pic VARCHAR(255) NOT NULL,
  event_pic_plan VARCHAR(255) NOT NULL,
  PRIMARY KEY (event_id)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 3276
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

DROP TABLE IF EXISTS tbl_event_detail;
CREATE TABLE tbl_event_detail (
  event_id VARCHAR(25) NOT NULL,
  event_desc_lat_bel VARCHAR(1000) DEFAULT NULL,
  event_desc_tujuan VARCHAR(1000) DEFAULT NULL,
  event_desc_target VARCHAR(1000) DEFAULT NULL,
  event_desc_kegiatan VARCHAR(1000) DEFAULT NULL,
  event_desc_promosi VARCHAR(1000) DEFAULT NULL,
  event_desc_fasilitas VARCHAR(1000) DEFAULT NULL,
  PRIMARY KEY (event_id)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 1365
CHARACTER SET latin1
COLLATE latin1_swedish_ci;


INSERT INTO tbl_admin VALUES
(3, 'admin', 'admin', 'admin');


INSERT INTO tbl_event VALUES
('20160101_02', 'Job Fair MM', 'JL. Chairil anwar Bekasi Timur 17113 ', 'METRO POLITAN MALL ', '2016-03-24', 'Flyer.jpg', 'stand.jpg'),
('20160102_03', 'Job Fair Festival', 'JL.Cileungsi Jonggol ', 'Cileungsi Jawa Barat', '2016-01-08', 'Flyer.jpg', 'stand.jpg'),
('20160102_04', 'Job Fair Carnaval ', '', '', '2016-02-15', 'jobfair_pamflet.jpg', 'stand.jpg'),
('20160103_05', 'aaa', 'ddddd', 'ffff', '2016-04-16', 'jobfair_pamflet.jpg', 'floor_plan2.jpg'),
('20160103_06', 'A', 'A', 'A', '2016-01-16', 'pamflet_X.jpg', 'stand_CEK.jpg');


INSERT INTO tbl_event_detail VALUES
('20160101_01', '\t\t\t\t\t\t\t\t\t\t$event_desc_lat_bel\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t$event_desc_tujuan\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t$event_desc_target\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t$event_desc_kegiatan\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t$event_desc_promosi\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t$event_desc_fasilitas\t\t\t\t\t\t\t\t\t'),
('20160101_02', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDalam rangka membantu Perusahaan untuk mendapatkan kandidat yang sesuai harapan Perusahaan dan sekaligus Program Pemerintah dengan salah satu tujuannya adalah mengurangi pengangguran dan kemiskinan, Sehubungan dengan hal tersebut diatas kami menyelenggarakanan Job Fair terbuka untuk umum. ; Job Fair ini mempertemukan member RSM Consultan dan JB-Jobs yang sampai sekarang jumlahnya mencapai 180.00 member yang potensial dengan perusahaan secara langsung, sehingga terjadi prose Rekrutment yang Cepat, Efisien, dan Efektif  xxxx\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tMembantu member member RSM Consultant lulusan SMA/SMK dan Fresh Graduate Perguruan Tinggi lain untuk mempersiapkan diri memasuki dunia kerja ; Memberi kesempatan kepada para pihak ( Institusi / Perusahaan ) Pencari tenaga kerja untuk menyampaikan informasi dan kualifikasi yang diinginkan terhadap para pencari kerja ; Membantu para pencari kerja untuk bertemu langsung dengan pihak pencari kerja ( Institusi / Perusahaan ) dalamproses rekruitment tenaga kerja dan kualifikasi tenaga kerja xx\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tMenghadirkan 20 Perusahaan ; Pencari kerja minimum Lulusan SMA/SMK,D3,S1,S2. ; Pencari kerja Fresh Graduate dan berpengalaman yang ingin peningkatan karir. ; Target Pengunjung minimal 5.000 orang.\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tPendataan Aplikasi Kerja (Sesuai dengan formasi dan kualifikasi yang dibutuhkan) ; Presentasi Perusahaan ( Open House dengan memaparkan profil perusahaan ) ; Rekrutment Tenaga Kerja langsung dengan penerimaan lamaran ; Tes dan Seleksi Tenaga Kerja (Walk Interview) ', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tMedia Sosial : Facebook, email blash ; Iklan Koran 7 Radio ; SMS Broadcast ; Brosur ; Spanduk,Baliho ', '1 Unit Meja + 2 Unit Kursi.\r\n;2 Box Lunc per hari.\r\n;Lampu Penerangan.\r\n;Terminal Listrik.'),
('20160102_03', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDalam rangka membantu Perusahaan untuk mendapatkan kandidat yang sesuai harapan Perusahaan dan sekaligus Program Pemerintah dengan salah satu tujuannya adalah mengurangi pengangguran dan kemiskinan, Sehubungan dengan hal tersebut diatas kami menyelenggarakanan Job Fair terbuka untuk umum. ; Job Fair ini mempertemukan member RSM Consultan dan JB-Jobs yang sampai sekarang jumlahnya mencapai 180.00 member yang potensial dengan perusahaan secara langsung, sehingga terjadi prose Rekrutment yang Cepat, Efisien, dan Efektif \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n    Membantu member member RSM Consultant lulusan SMA/SMK dan Fresh Graduate Perguruan Tinggi lain untuk mempersiapkan diri memasuki dunia kerja\r\n   ; Memberi kesempatan kepada para pihak ( Institusi / Perusahaan ) Pencari tenaga kerja untuk menyampaikan informasi dan kualifikasi yang diinginkan terhadap para pencari kerja\r\n   ; Membantu para pencari kerja untuk bertemu langsung dengan pihak pencari kerja ( Institusi / Perusahaan ) dalamproses rekruitment tenaga kerja dan kualifikasi tenaga kerja\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n    Menghadirkan 20 Perusahaan\r\n  ;  Pencari kerja minimum Lulusan SMA/SMK,D3,S1,S2.\r\n   ; Pencari kerja Fresh Graduate dan berpengalaman yang ingin peningkatan karir.\r\n   ; Target Pengunjung minimal 5.000 orang.\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n    Pendataan Aplikasi Kerja (Sesuai dengan formasi dan kualifikasi yang dibutuhkan)\r\n   ; Presentasi Perusahaan ( Open House dengan memaparkan profil perusahaan )\r\n   ; Rekrutment Tenaga Kerja langsung dengan penerimaan lamaran\r\n   ; Tes dan Seleksi Tenaga Kerja (Walk Interview)\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n    Media Sosial : Facebook, email blash\r\n   ; Iklan Koran 7 Radio\r\n   ; SMS Broadcast\r\n   ; Brosur\r\n   ; Spanduk , Baliho\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t', '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tlunch 2x sehari; kursi dan meja\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t'),
('20160102_04', 'Dalam rangka membantu Perusahaan untuk mendapatkan kandidat yang sesuai harapan Perusahaan dan sekaligus Program Pemerintah dengan salah satu tujuannya adalah mengurangi pengangguran dan kemiskinan, Sehubungan dengan hal tersebut diatas kami menyelenggarakanan Job Fair terbuka untuk umum. ; Job Fair ini mempertemukan member RSM Consultan dan JB-Jobs yang sampai sekarang jumlahnya mencapai 180.00 member yang potensial dengan perusahaan secara langsung, sehingga terjadi prose Rekrutment yang Cepat, Efisien, dan Efektif ', 'Membantu member member RSM Consultant lulusan SMA/SMK dan Fresh Graduate Perguruan Tinggi lain untuk mempersiapkan diri memasuki dunia kerja ; Memberi kesempatan kepada para pihak ( Institusi / Perusahaan ) Pencari tenaga kerja untuk menyampaikan informasi dan kualifikasi yang diinginkan terhadap para pencari kerja ; Membantu para pencari kerja untuk bertemu langsung dengan pihak pencari kerja ( Institusi / Perusahaan ) dalamproses rekruitment tenaga kerja dan kualifikasi tenaga kerja ', 'Menghadirkan 20 Perusahaan ; Pencari kerja minimum Lulusan SMA/SMK,D3,S1,S2. ; Pencari kerja Fresh Graduate dan berpengalaman yang ingin peningkatan karir. ; Target Pengunjung minimal 5.000 orang. ', 'Pendataan Aplikasi Kerja (Sesuai dengan formasi dan kualifikasi yang dibutuhkan) ; Presentasi Perusahaan ( Open House dengan memaparkan profil perusahaan ) ; Rekrutment Tenaga Kerja langsung dengan penerimaan lamaran ; Tes dan Seleksi Tenaga Kerja (Walk Interview) ', 'Media Sosial : Facebook, email blash ; Iklan Koran 7 Radio ; SMS Broadcast ; Brosur ; Spanduk,Baliho ', '1 Unit Meja + 2 Unit Kursi.\r\n;2 Box Lunc per hari.\r\n;Lampu Penerangan.\r\n;Terminal Listrik.'),
('20160103_05', 'gf', 'hgyy', 'rrrrhhbbb', 'ygfyfhj', 'hvgghjgfyf', 'hhvghjghyg'),
('20160103_06', 'A', 'A', 'A', 'A', 'A', 'A');
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;