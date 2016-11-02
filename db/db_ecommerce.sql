/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.27 : Database - db_ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_ecommerce`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id`,`username`,`password`,`level`) values (3,'admin','admin','admin');

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`id_kategori`,`nama_kategori`) values (1,'Handphone'),(2,'Aksesoris');

/*Table structure for table `tbl_konfirmasi` */

DROP TABLE IF EXISTS `tbl_konfirmasi`;

CREATE TABLE `tbl_konfirmasi` (
  `kode_transaksi` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_transaksi`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_konfirmasi` */

insert  into `tbl_konfirmasi`(`kode_transaksi`,`email`,`nama_pengirim`) values ('001281214','21','ADI PRATAMA'),('002281214','22','Arya wibowo');

/*Table structure for table `tbl_produk` */

DROP TABLE IF EXISTS `tbl_produk`;

CREATE TABLE `tbl_produk` (
  `kode_produk` varchar(15) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `stok` int(20) DEFAULT NULL,
  `dibeli` int(20) DEFAULT NULL,
  `gbr_besar` varchar(50) DEFAULT NULL,
  `deskripsi` tinytext,
  PRIMARY KEY (`kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_produk` */

insert  into `tbl_produk`(`kode_produk`,`id_kategori`,`nama_produk`,`harga`,`stok`,`dibeli`,`gbr_besar`,`deskripsi`) values ('B-0001',0,'Samsung Galaxy Ace',1200000,9,1,'samsung-galaxy-ace1.gif','Smartphone terbaru dengan spesifikasi terbaru'),('B-0002',1,'Samsung Galaxy Core',2500000,5,1,'core.jpg',''),('B-0005',2,'Samsung Galaxy Ace2 White',2700000,8,1,'ace2_white.jpg','Samsung Galaxy Ace2 White Dengan Kemampuan handal dan design yang Trendy'),('B-0007',1,'Samsung Galaxy Y DUOS',980000,17,1,'y_duos.jpg',''),('B-0008',1,'Samsung Galaxy Core',2500000,14,1,'core.jpg',''),('B-0009',1,'Samsung Galaxy Core',2500000,14,1,'core.jpg',''),('B-0012',0,'Case Iphone 5',80000,50,NULL,'nexus5slimarmor-228x228.gif','Soft Case Neo Hybrid Iphone 5 terbaru dan elegan'),('B-0013',2,'Slim Armor Iphone 5',55000,50,NULL,'CaseArmorIphone5.gif','Case Spigen Slim Armor Iphone 5/5S Original'),('B-0014',2,'Headset Samsung Galaxy S3',45000,55,NULL,'headset_samsung_s3.gif','Headset Samsung Galaxy S3 Original'),('B-0015',0,'Power Bank Robot RT6000',35000,39,1,'rt6000-228x228.gif','Model RT6000 Kapasitas 6000mAh');

/*Table structure for table `tbl_transaksi_detail` */

DROP TABLE IF EXISTS `tbl_transaksi_detail`;

CREATE TABLE `tbl_transaksi_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(15) DEFAULT NULL,
  `kode_produk` char(15) DEFAULT NULL,
  `jumlah` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transaksi_detail` */

insert  into `tbl_transaksi_detail`(`id`,`kode_transaksi`,`kode_produk`,`jumlah`) values (41,'002040215','B-0002',3),(42,'002040215','B-0001',1),(43,'005040215','B-0002',1),(44,'005040215','B-0005',1),(45,'005040215','B-0007',1),(46,'007040215','B-0002',1),(47,'007040215','B-0007',1);

/*Table structure for table `tbl_transaksi_header` */

DROP TABLE IF EXISTS `tbl_transaksi_header`;

CREATE TABLE `tbl_transaksi_header` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode_user` int(11) DEFAULT NULL,
  `tgl_jual` date NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `total` int(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`kode_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transaksi_header` */

insert  into `tbl_transaksi_header`(`id`,`kode_user`,`tgl_jual`,`kode_transaksi`,`total`,`status`) values (62,25,'2015-02-04','002040215',8700000,0),(65,25,'2015-02-04','005040215',6180000,0),(67,25,'2015-02-04','007040215',3480000,0);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `kode_user` int(15) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(20) DEFAULT NULL,
  `pass_user` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text,
  `telpon` varchar(20) DEFAULT NULL,
  `propinsi` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `kode_verifikasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_user`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`kode_user`,`username_user`,`pass_user`,`nama`,`email`,`alamat`,`telpon`,`propinsi`,`kota`,`kode_pos`,`level`,`kode_verifikasi`) values (24,'vania ','123456','vania cantika aurellia','vania@gmail.com','bogor rt 2 rw 5','021 8776766','jawa barat','bogor kota','12245','member',NULL),(25,'ardi','123456','ariyanto','triono.triono1@gmail','bogor','082167645','jawa barat','cisaat','13760','member','a2XtmE0kpzUWWaIt');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
