-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for allday
CREATE DATABASE IF NOT EXISTS `allday` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `allday`;


-- Dumping structure for table allday.tbl_authen_emp
CREATE TABLE IF NOT EXISTS `tbl_authen_emp` (
  `id_authen` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  `id_emp` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_authen`),
  KEY `FK_Authenticaiton_emp_employee` (`id_emp`),
  CONSTRAINT `FK_Authenticaiton_emp_employee` FOREIGN KEY (`id_emp`) REFERENCES `tbl_employee` (`id_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_authen_emp: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_authen_emp` DISABLE KEYS */;
INSERT INTO `tbl_authen_emp` (`id_authen`, `username`, `password`, `id_emp`) VALUES
	(142, 'B', 'B', 161),
	(143, 'A', '123A', 162),
	(144, 'saran', '123', 163),
	(145, '0005', '998', 164);
/*!40000 ALTER TABLE `tbl_authen_emp` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_employee
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id_emp` int(12) NOT NULL AUTO_INCREMENT,
  `emp_number` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '0',
  `surname` varchar(100) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '0',
  `tel` varchar(100) NOT NULL DEFAULT '0',
  `sex` enum('male','female') NOT NULL,
  `date_start` datetime NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `id_permission` int(12) NOT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `FK_employee_permission` (`id_permission`),
  CONSTRAINT `FK_employee_permission` FOREIGN KEY (`id_permission`) REFERENCES `tbl_permission` (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_employee: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
INSERT INTO `tbl_employee` (`id_emp`, `emp_number`, `name`, `surname`, `address`, `email`, `tel`, `sex`, `date_start`, `img_path`, `id_permission`) VALUES
	(161, '0000123', 'saran', 'kflsd\'dfk;kA', 'fefe', 'fl;skf\'s;A', 'fl;skfk;lsdfA', 'female', '2015-02-25 01:22:47', 'download4.jpg', 2),
	(162, '115000', 'NA', 'SA', 'dfere', 'EA', 'TA', 'female', '2015-03-25 04:29:39', 'download5.jpg', 1),
	(163, 'EMP0006', 'pName', 'sName', '87 m4', 'pike_zeed@hotmail.com', '0816349563', 'male', '2015-02-11 03:06:18', 'img1.jpg', 1),
	(164, 'EMP0002', '343', 'feesr', 'fsfkddsal;k', 'sd;f;ef', '1423432523', 'male', '2015-02-11 11:49:20', 'img4.jpg', 1);
/*!40000 ALTER TABLE `tbl_employee` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_permission
CREATE TABLE IF NOT EXISTS `tbl_permission` (
  `id_permission` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_permission: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_permission` DISABLE KEYS */;
INSERT INTO `tbl_permission` (`id_permission`, `name`) VALUES
	(1, 'admin'),
	(2, 'employee');
/*!40000 ALTER TABLE `tbl_permission` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_permission_role
CREATE TABLE IF NOT EXISTS `tbl_permission_role` (
  `id_permission_role` int(12) NOT NULL AUTO_INCREMENT,
  `id_permision` int(12) NOT NULL DEFAULT '0',
  `id_role` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_permission_role`),
  KEY `FK_tbl_permission_role_tbl_permission` (`id_permision`),
  KEY `FK_tbl_permission_role_tbl_role` (`id_role`),
  CONSTRAINT `FK_tbl_permission_role_tbl_permission` FOREIGN KEY (`id_permision`) REFERENCES `tbl_permission` (`id_permission`),
  CONSTRAINT `FK_tbl_permission_role_tbl_role` FOREIGN KEY (`id_role`) REFERENCES `tbl_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_permission_role: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_permission_role` DISABLE KEYS */;
INSERT INTO `tbl_permission_role` (`id_permission_role`, `id_permision`, `id_role`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 2, 1),
	(6, 2, 2),
	(7, 2, 3);
/*!40000 ALTER TABLE `tbl_permission_role` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `code_id` varchar(50) DEFAULT NULL,
  `name_p` varchar(50) DEFAULT NULL,
  `price_p` varchar(50) DEFAULT NULL,
  `detail_p` text,
  `picture_p` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_product: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`id_product`, `code_id`, `name_p`, `price_p`, `detail_p`, `picture_p`, `date`) VALUES
	(56, 'P004', 'ยางรถยนตร์', '200', 'zzzzzzzzzz', 'godzilla-wallpaper-1600x900.jpg', '2015-02-04 00:00:00'),
	(57, 'P0001', 'pName_1', '100', 'new detail', 'img1.jpg', '2015-02-11 00:00:00'),
	(58, 'P005', 'name_new', '5', 'detail new', 'img21.jpg', '2015-02-14 18:16:51');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_role
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id_role` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_role: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` (`id_role`, `name`) VALUES
	(1, 'select'),
	(2, 'update'),
	(3, 'insert'),
	(4, 'delete');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_sell
CREATE TABLE IF NOT EXISTS `tbl_sell` (
  `id_sell` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `date_outcome` datetime DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id_sell`),
  KEY `FK_tbl_sell_tbl_store` (`id_product`),
  CONSTRAINT `FK_tbl_sell_tbl_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_sell: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_sell` DISABLE KEYS */;
INSERT INTO `tbl_sell` (`id_sell`, `amount`, `date_outcome`, `id_product`) VALUES
	(1, 1, '2015-02-06 10:02:49', 57),
	(143, 40, '2015-02-15 01:08:22', 58),
	(144, 30, '2015-02-15 01:08:22', 57),
	(145, 5, '2015-02-15 01:08:30', 58),
	(146, 5, '2015-02-15 01:08:30', 57),
	(147, 44, '2015-02-15 01:08:56', 58),
	(148, 309, '2015-02-15 01:08:56', 57),
	(149, 20, '2015-02-15 01:40:55', 56),
	(150, 5, '2015-02-15 01:51:04', 56),
	(151, 1, '2015-02-15 03:03:28', 56),
	(152, 1, '2015-02-15 03:04:07', 56);
/*!40000 ALTER TABLE `tbl_sell` ENABLE KEYS */;


-- Dumping structure for table allday.tbl_store
CREATE TABLE IF NOT EXISTS `tbl_store` (
  `id_store` int(11) NOT NULL AUTO_INCREMENT,
  `total_p` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_store`),
  KEY `FK_tbl_store_tbl_product` (`id_product`),
  CONSTRAINT `FK_tbl_store_tbl_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table allday.tbl_store: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_store` DISABLE KEYS */;
INSERT INTO `tbl_store` (`id_store`, `total_p`, `date`, `id_product`) VALUES
	(4, 100, '2015-02-04 08:57:18', 56),
	(5, 10, '2015-02-04 08:59:16', 56),
	(7, 60, '2015-02-11 09:33:03', 57),
	(8, 60, '2015-02-11 09:45:59', 57),
	(9, 100, '2015-02-11 10:35:31', 57),
	(10, 60, '2015-02-11 11:03:04', 57),
	(11, 60, '2015-02-11 11:03:20', 57),
	(13, 5, '2015-02-11 22:38:38', 57),
	(14, 56, '2015-02-12 05:38:33', 56),
	(15, 55, '2015-02-14 18:33:56', 58),
	(16, 34, '2015-02-14 18:34:02', 58);
/*!40000 ALTER TABLE `tbl_store` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
