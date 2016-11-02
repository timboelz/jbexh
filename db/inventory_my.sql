/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.27 : Database - inventory_my
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventory_my` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventory_my`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(7) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `harga_beli` int(12) DEFAULT NULL,
  `harga_jual` int(12) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `DateIn` date DEFAULT NULL,
  `DateExpired` date DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`),
  UNIQUE KEY `kd_buku` (`kd_barang`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id`,`kd_barang`,`nm_barang`,`keterangan`,`harga_beli`,`harga_jual`,`stok`,`DateIn`,`DateExpired`,`satuan`) values (25,'B-0005','FORTELIS','',13000,26000,143,'1970-01-01','2015-02-21','ampul'),(24,'B-0004','DERMAHEAL','',60000,130000,102,'1970-01-01','2015-09-01','pil'),(23,'B-0003','CREAM ESTESIA','',25000,27000,99,'1970-01-01','2015-08-12','botol'),(21,'B-0001','CARNITINE','obat pelangsing',25000,50000,124,'1970-01-01','2015-08-12','kapsul'),(22,'B-0002','CAVIAR EXTRACT','',24000,55000,87,'1970-01-01','2015-09-01','tablet'),(26,'B-0006','FULADIC','',28000,49000,55,'1970-01-01','2015-09-01','tablet'),(27,'B-0007','FUROSEMIDE','',12000,35000,55,'2014-08-01','2015-08-01','kapsul'),(28,'B-0008','XITINOL','',23000,56000,54,'2014-07-25','2014-07-25','ampul'),(35,'B-0009','xeptic','',25000,55000,50,NULL,NULL,'botol');

/*Table structure for table `barang_stok--` */

DROP TABLE IF EXISTS `barang_stok--`;

CREATE TABLE `barang_stok--` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stok` int(12) DEFAULT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `DateIn` datetime DEFAULT NULL,
  `DateExpired` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_barang`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `barang_stok--` */

insert  into `barang_stok--`(`id`,`stok`,`kd_barang`,`DateIn`,`DateExpired`) values (20,4,'B-0001',NULL,'2015-07-21 00:00:00'),(21,5,'B-0002',NULL,'2015-07-22 00:00:00'),(22,7,'B-0003',NULL,'2015-07-21 00:00:00'),(23,230,'B-0004',NULL,'2015-07-21 00:00:00'),(24,150,'B-0005',NULL,'2015-07-15 00:00:00'),(25,200,'B-0006',NULL,'2015-07-21 00:00:00'),(26,240,'B-0007',NULL,'2015-07-21 00:00:00'),(27,0,'B-0008',NULL,'2015-07-25 00:00:00');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kd_kategori` varchar(6) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_kategori`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`kd_kategori`,`nm_kategori`) values (1,'K-001','Obat Lemah'),(2,'K-003','Obat Menengah'),(3,'K-002','Obat Keras'),(7,'K-004','ssssss');

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `kd_pasien` varchar(7) NOT NULL,
  `nm_pasien` varchar(30) DEFAULT NULL,
  `usia` int(5) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telepon` int(15) DEFAULT NULL,
  PRIMARY KEY (`kd_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`kd_pasien`,`nm_pasien`,`usia`,`alamat`,`no_telepon`) values ('P-0001','Abdul Malik ',28,'jl. Condet raya ',2147483647),('P-0002','Adi Pratama',8,'jl. Bogor raya',21),('P-0003','Randi Budiman ',7,'jl Bungur raya',21),('P-0004','Adri Wahyudi',25,'jl. Jambu Dua',2147483647);

/*Table structure for table `pembelian_detail` */

DROP TABLE IF EXISTS `pembelian_detail`;

CREATE TABLE `pembelian_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(15) NOT NULL,
  `kd_barang` char(7) NOT NULL,
  `jumlah` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nomor_penjualan_tamu` (`no_po`,`kd_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

/*Data for the table `pembelian_detail` */

insert  into `pembelian_detail`(`id`,`no_po`,`kd_barang`,`jumlah`) values (107,'PO.001.060814','B-0004',3),(106,'PO.001.060814','B-0006',12),(108,'PO.002.070814','B-0002',2),(109,'PO.002.070814','B-0003',3);

/*Table structure for table `pembelian_header` */

DROP TABLE IF EXISTS `pembelian_header`;

CREATE TABLE `pembelian_header` (
  `no_po` varchar(15) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kd_supplier` char(7) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `kd_user` char(4) NOT NULL,
  PRIMARY KEY (`no_po`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pembelian_header` */

insert  into `pembelian_header`(`no_po`,`tgl_pembelian`,`kd_supplier`,`total`,`kd_user`) values ('PO.001.060814','2014-08-07','S-0004',206000,'U008'),('PO.002.070814','2014-08-09','S-0002',123000,'U007');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merek` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id`,`merek`,`jumlah`) values (1,'Samsung',80),(2,'Nokia',20),(3,'Blackberry',40),(4,'Apple',60);

/*Table structure for table `penjualan_detail` */

DROP TABLE IF EXISTS `penjualan_detail`;

CREATE TABLE `penjualan_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_penjualan` varchar(30) NOT NULL,
  `kd_barang` char(7) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_detail` (`id`),
  KEY `nomor_penjualan_tamu` (`no_penjualan`,`kd_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_detail` */

insert  into `penjualan_detail`(`id`,`no_penjualan`,`kd_barang`,`jumlah`) values (183,'TJL.001.060814','B-0001',6),(184,'TJL.001.060814','B-0003',15),(185,'TJL.001.060814','B-0001',50),(186,'TJL.002.060814','B-0005',5),(187,'TJL.002.060814','B-0004',2),(188,'TJL.003.090814','B-0001',1),(189,'TJL.003.090814','B-0002',2);

/*Table structure for table `penjualan_header` */

DROP TABLE IF EXISTS `penjualan_header`;

CREATE TABLE `penjualan_header` (
  `no_penjualan` varchar(15) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kd_pasien` char(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `kd_user` char(4) NOT NULL,
  PRIMARY KEY (`no_penjualan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_header` */

insert  into `penjualan_header`(`no_penjualan`,`tgl_penjualan`,`kd_pasien`,`total`,`kd_user`) values ('TJL.001.060814','2014-10-06','P-0001',500000,'U007'),('TJL.002.060814','2014-09-06','P-0002',250000,'U008'),('TJL.003.090814','2014-08-09','P-0004',150000,'U007');

/*Table structure for table `po_detail` */

DROP TABLE IF EXISTS `po_detail`;

CREATE TABLE `po_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(15) NOT NULL,
  `kd_barang` char(7) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_detail` (`id`),
  KEY `nomor_penjualan_tamu` (`no_po`,`kd_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

/*Data for the table `po_detail` */

insert  into `po_detail`(`id`,`no_po`,`kd_barang`,`jumlah`) values (94,'PO.001.010914','B-0008',40),(93,'PO.001.010914','B-0006',40),(95,'po.002.030215','B-0004',100),(96,'po.002.030215','B-0001',150);

/*Table structure for table `po_header` */

DROP TABLE IF EXISTS `po_header`;

CREATE TABLE `po_header` (
  `no_po` varchar(15) NOT NULL,
  `tgl_po` date NOT NULL,
  `kd_supplier` char(10) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `kd_user` char(4) NOT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_po`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `po_header` */

insert  into `po_header`(`no_po`,`tgl_po`,`kd_supplier`,`total`,`kd_user`,`status`) values ('PO.001.010914','2014-09-01','S-0004',2040000,'U008','T'),('po.002.030215','2015-02-03','S-0004',9750000,'0','t');

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_satuan` varchar(7) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_satuan`),
  UNIQUE KEY `kd_satuan` (`kd_satuan`),
  UNIQUE KEY `id` (`id`),
  KEY `kd_satuan_2` (`kd_satuan`),
  KEY `kd_satuan_3` (`kd_satuan`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `satuan` */

insert  into `satuan`(`id`,`kd_satuan`,`satuan`) values (12,'Sa-003','Cream'),(11,'Sa-002','Tablet'),(10,'Sa-001','Botol');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `kd_supplier` varchar(7) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` int(15) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`kd_supplier`,`nm_supplier`,`alamat`,`no_telepon`) values ('S-0001','ANEKA JAYA TOYS','Jl. Adisucipto, Yogyakarta',2147483647),('S-0002','INDO JAYA TOYS','Jl. Pleret, Blok O, Yogyakarta',0),('S-0003','CV Harapan Maju','jl. Tipar satu',21),('S-0004','CV. Sehat Jaya','jl. Raya Cijantung no.28',21);

/*Table structure for table `transaksikeluar` */

DROP TABLE IF EXISTS `transaksikeluar`;

CREATE TABLE `transaksikeluar` (
  `no_keluar` varchar(15) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `total` int(10) DEFAULT NULL,
  `kd_user` char(4) NOT NULL,
  `kd_pasien` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`no_keluar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transaksikeluar` */

/*Table structure for table `transaksikeluardetail` */

DROP TABLE IF EXISTS `transaksikeluardetail`;

CREATE TABLE `transaksikeluardetail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_keluar` varchar(15) NOT NULL,
  `kd_barang` char(7) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_detail` (`id`),
  KEY `nomor_penjualan_tamu` (`no_keluar`,`kd_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

/*Data for the table `transaksikeluardetail` */

/*Table structure for table `transaksimasuk` */

DROP TABLE IF EXISTS `transaksimasuk`;

CREATE TABLE `transaksimasuk` (
  `no_po` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kd_supplier` char(7) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `kd_user` char(4) NOT NULL,
  PRIMARY KEY (`no_po`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transaksimasuk` */

insert  into `transaksimasuk`(`no_po`,`tgl_masuk`,`kd_supplier`,`total`,`kd_user`) values ('PO.001.010914','2014-09-01','S-0004',4250000,'U007'),('po.002.030215','2015-02-03','S-0001',39000,'0');

/*Table structure for table `transaksimasukdetail` */

DROP TABLE IF EXISTS `transaksimasukdetail`;

CREATE TABLE `transaksimasukdetail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(15) NOT NULL,
  `kd_barang` char(7) NOT NULL,
  `jumlah` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nomor_penjualan_tamu` (`no_po`,`kd_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

/*Data for the table `transaksimasukdetail` */

insert  into `transaksimasukdetail`(`id`,`no_po`,`kd_barang`,`jumlah`) values (132,'PO.001.010914','B-0004',60),(131,'PO.001.010914','B-0005',50),(133,'po.002.030215','B-0005',3);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `kd_user` varchar(4) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`kd_user`,`nm_user`,`username`,`password`,`level`) values ('U007','Herawati','user','user','gudang'),('U008','Juni Kurniawati','admin','admin','admin'),('U009','Umi','administrator','administrator','Administrator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
