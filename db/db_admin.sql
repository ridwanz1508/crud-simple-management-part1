-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_admin
DROP DATABASE IF EXISTS `db_admin`;
CREATE DATABASE IF NOT EXISTS `db_admin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_admin`;

-- Dumping structure for table db_admin.tb_product
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE IF NOT EXISTS `tb_product` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fmobile` varchar(50) DEFAULT NULL,
  `ftype` varchar(50) DEFAULT NULL,
  `fpict` varchar(500) DEFAULT NULL,
  `fprice` int(11) DEFAULT NULL,
  `fstock` int(11) DEFAULT NULL,
  `fcategory` varchar(50) DEFAULT NULL,
  `fnote` text,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- Dumping data for table db_admin.tb_product: ~4 rows (approximately)
DELETE FROM `tb_product`;
INSERT INTO `tb_product` (`fid`, `fmobile`, `ftype`, `fpict`, `fprice`, `fstock`, `fcategory`, `fnote`, `create_date`, `update_date`, `create_by`) VALUES
	(1, 'Samsung', 'A5', 'http://localhost/coba_part1/assets/images/e61d63a574057b3b288ab411d62b9ea8.jpg', 8000000, 34, 'Handphone', 'Big Sale!', '2024-11-07 10:49:17', '2024-11-07 13:18:34', NULL),
	(8, 'Macbook', 'Pro 13', 'http://localhost/coba_part1/assets/images/72311ae04c98b9a8501c088a6ccc648e.png', 38900000, 13, 'Laptop', 'Big Sale!', '2024-11-07 14:07:35', '2024-11-07 14:09:01', NULL),
	(9, 'Apple', 'Series 9', 'http://localhost/coba_part1/assets/images/a0cfe132b922de89dcce67e14449a2e0.jpeg', 8500000, 9, 'Watch', 'Big Sale!', '2024-11-07 14:14:03', NULL, NULL),
	(10, 'Oppo', 'Not 12', 'http://localhost/coba_part1/assets/images/bf3b4fb38cdbbb56b74ec77760f73150.jpg', 2870000, 34, 'Handphone', 'Big Sale!', '2024-11-07 14:20:52', NULL, NULL);

-- Dumping structure for table db_admin.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `femail` varchar(50) DEFAULT NULL,
  `fage` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_admin.tb_user: ~7 rows (approximately)
DELETE FROM `tb_user`;
INSERT INTO `tb_user` (`fid`, `fname`, `femail`, `fage`, `create_date`, `update_date`, `create_by`) VALUES
	(1, 'abla', 'abla@gmail.com', 23, '2024-08-28 15:27:22', '2024-09-11 14:39:57', 'admin'),
	(2, 'aduhh', 'aduh@gmail.com', 21, '2024-08-28 15:27:18', NULL, 'admin'),
	(3, 'naon', 'naon@gmail.com', 24, '2024-08-28 15:27:13', NULL, 'admin'),
	(4, 'aku', 'aku@gmail.com', 22, '2024-08-28 15:27:08', NULL, 'admin'),
	(8, 'el', 'el@gmail.com', 22, '2024-08-28 15:27:25', NULL, 'admin'),
	(12, 'iya', 'iya@gmail.com', 23, '2024-08-28 15:27:37', NULL, 'admin'),
	(13, 'eli', 'eli@gmail.com', 23, '2024-09-11 15:30:01', NULL, 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
