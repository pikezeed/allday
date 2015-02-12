-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table allday.tbl_permission
CREATE TABLE IF NOT EXISTS `tbl_permission` (
  `id_permission` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table allday.tbl_role
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id_role` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table allday.tbl_sell
CREATE TABLE IF NOT EXISTS `tbl_sell` (
  `id_sell` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `date_outcome` datetime DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id_sell`),
  KEY `FK_tbl_sell_tbl_store` (`id_product`),
  CONSTRAINT `FK_tbl_sell_tbl_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table allday.tbl_store
CREATE TABLE IF NOT EXISTS `tbl_store` (
  `id_store` int(11) NOT NULL AUTO_INCREMENT,
  `total_p` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_store`),
  KEY `FK_tbl_store_tbl_product` (`id_product`),
  CONSTRAINT `FK_tbl_store_tbl_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
