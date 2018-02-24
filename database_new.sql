/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.28-MariaDB : Database - shershah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `aauth_groups` */

CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_perm_to_group` */

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_perm_to_user` */

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_perms` */

CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_pms` */

CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date` datetime DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`read`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_system_variables` */

CREATE TABLE `aauth_system_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_user_to_group` */

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_user_variables` */

CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `aauth_users` */

CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `ip_address` varchar(100) DEFAULT NULL,
  `login_attempts` int(11) DEFAULT '0',
  `allow_campus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `controller_permission` */

CREATE TABLE `controller_permission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `controller` varchar(100) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Table structure for table `inf_app` */

CREATE TABLE `inf_app` (
  `APP_NAME` varchar(225) NOT NULL,
  `APP_LOGO` varchar(225) DEFAULT NULL,
  `APP_VER` varchar(225) DEFAULT NULL,
  `APP_DEV` varchar(225) DEFAULT NULL,
  `APP_DEV_WEB` varchar(225) DEFAULT NULL,
  `APP_CR` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `inf_category` */

CREATE TABLE `inf_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `allow` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Table structure for table `inf_main_menu` */

CREATE TABLE `inf_main_menu` (
  `PMENUID` int(10) NOT NULL AUTO_INCREMENT,
  `PMENUICON` varchar(200) DEFAULT NULL,
  `PMENUNAME` varchar(200) DEFAULT NULL,
  `PMENULINK` varchar(200) DEFAULT NULL,
  `ALLOW_GROUP` varchar(100) DEFAULT NULL,
  `ORDER_BY` int(11) DEFAULT NULL,
  `ALLOW` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`PMENUID`),
  UNIQUE KEY `PMENUID_2` (`PMENUID`),
  KEY `PMENUID` (`PMENUID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Table structure for table `inf_school` */

CREATE TABLE `inf_school` (
  `SCODE` varchar(1) NOT NULL,
  `SSNAME` varchar(3) DEFAULT NULL,
  `SNAME` varchar(50) NOT NULL,
  `NTN_int` varchar(25) DEFAULT NULL,
  `GST_int` varchar(25) DEFAULT NULL,
  `ADDRESS1` varchar(100) DEFAULT NULL,
  `ADDRESS2` varchar(100) DEFAULT NULL,
  `CAMPUS` varchar(225) DEFAULT NULL,
  `CAMPUS_NO` int(11) DEFAULT NULL,
  `BANK_LOGO` varchar(225) DEFAULT NULL,
  `LOGO` varchar(225) DEFAULT NULL,
  `PHONE` varchar(50) DEFAULT NULL,
  `FAX` varchar(25) DEFAULT NULL,
  `TITLE_ACC` varchar(100) DEFAULT NULL,
  `BANK` varchar(100) DEFAULT NULL,
  `BANK_NAME` varchar(200) DEFAULT NULL,
  `BANK2` varchar(100) DEFAULT NULL,
  `ACC_NUM` varchar(100) NOT NULL,
  `NOTE` text NOT NULL,
  `TOTAL_ATDAYS` int(5) DEFAULT NULL,
  `CUSER` varchar(50) DEFAULT NULL,
  `CTIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MUSER` varchar(50) DEFAULT NULL,
  `MTIMESTAMP` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `M` int(11) DEFAULT NULL,
  `N` int(11) DEFAULT NULL,
  `XI` varchar(11) DEFAULT NULL,
  `XII` varchar(11) DEFAULT NULL,
  UNIQUE KEY `SCODE` (`SCODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `inf_sub_menu` */

CREATE TABLE `inf_sub_menu` (
  `SMENUID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PMENUID` int(10) DEFAULT '0',
  `ORDER_BY` int(11) DEFAULT NULL,
  `MENUICON` varchar(200) DEFAULT '0',
  `MENULINK` varchar(200) DEFAULT '0',
  `MENUNAME` varchar(200) DEFAULT '0',
  `ALLOW_GROUP` varchar(200) NOT NULL,
  `ALLOW` varchar(1) DEFAULT '0',
  PRIMARY KEY (`SMENUID`),
  UNIQUE KEY `SMENUID` (`SMENUID`),
  KEY `SMENUID_2` (`SMENUID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
