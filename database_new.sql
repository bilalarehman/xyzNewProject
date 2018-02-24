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

DROP TABLE IF EXISTS `aauth_groups`;

CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_groups` */

insert  into `aauth_groups`(`id`,`name`,`definition`) values (1,'Admin','Super Admin Group'),(2,'Public','Public Access Group'),(3,'Default','Default Access Group'),(4,'Account','Accountant Access Group'),(5,'Teacher','Teachers Access Group'),(6,'Reception','Reception Access Group'),(9,'Fees Section','Fees Access Groups'),(10,'Exam','Examination Section Access'),(11,'Class Teacher','More power than a teacher'),(12,'Office Manager','rights of '),(13,'Librarian','Library Person'),(14,'dgdfs','sdgdfs');

/*Table structure for table `aauth_perm_to_group` */

DROP TABLE IF EXISTS `aauth_perm_to_group`;

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perm_to_group` */

/*Table structure for table `aauth_perm_to_user` */

DROP TABLE IF EXISTS `aauth_perm_to_user`;

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perm_to_user` */

/*Table structure for table `aauth_perms` */

DROP TABLE IF EXISTS `aauth_perms`;

CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perms` */

insert  into `aauth_perms`(`id`,`name`,`definition`) values (1,'Fee Type','Add, Edit and delete fees types'),(2,'Fees Structure','Add, Edit, Delete Fees Structure'),(3,'Office Manager',''),(4,'Salary ','Monthly Employee Compensations '),(5,'fsfsf',NULL);

/*Table structure for table `aauth_pms` */

DROP TABLE IF EXISTS `aauth_pms`;

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

/*Data for the table `aauth_pms` */

insert  into `aauth_pms`(`id`,`sender_id`,`receiver_id`,`title`,`message`,`date`,`read`) values (1,1,2,'salam','salam kesy ho?','2018-01-27 00:17:24',1),(2,1,2,'salam','salam kesy ho?','2018-01-27 00:18:20',1),(3,1,2,'Test','<p>Testing email</p>','2018-01-27 00:25:21',1),(4,2,1,'Salam Mubesher Bhai','<p>This is test email for you hope you are dont mind my email and also provide me a good support.&nbsp;\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .&nbsp;\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support \r\n\r\n\r\n\r\nThis is test email for you hope you are dont mind my email and also provide me a good support .&nbsp;</p>','2018-01-27 00:39:49',1),(5,2,1,'Brother','<p>This is also a test email for you </p>','2018-01-27 00:50:30',1),(6,2,1,'another test email','<p>hi</p>','2018-01-27 01:28:13',1),(7,2,1,'asasasas','<p>asasas</p>','2018-01-27 01:31:25',1),(8,1,2,'form me to u','<p>this is test email</p>','2018-01-27 01:33:45',1),(9,2,1,'salam','<p>this is a test message to u</p>','2018-01-27 01:43:28',1),(10,2,1,'Salam','<p>This is a test email</p>','2018-01-27 02:55:47',1),(11,2,1,'Tommorow issue','<p>this is very <b>urjent </b>issue kindly see this and respond on it</p><h3>Salam this is H1</h3><h3><br></h3><p>this is heading 3<br></p>','2018-01-27 03:16:32',1),(12,1,9006,'Test email','<p>This is test email </p>','2018-01-27 03:25:04',1),(13,1,7,'salam','<p>test email</p>','2018-01-27 03:25:44',0);

/*Table structure for table `aauth_system_variables` */

DROP TABLE IF EXISTS `aauth_system_variables`;

CREATE TABLE `aauth_system_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_system_variables` */

/*Table structure for table `aauth_user_to_group` */

DROP TABLE IF EXISTS `aauth_user_to_group`;

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_user_to_group` */

insert  into `aauth_user_to_group`(`user_id`,`group_id`) values (0,1),(0,2),(0,4),(0,5),(0,11),(1,1),(1,4),(9001,5),(9002,5),(9002,11),(9003,5),(9003,11),(9004,5),(9004,11),(9005,5),(9005,11),(9006,5),(9007,5),(9008,5),(9008,11),(9009,5),(9009,11),(9010,5),(9011,5),(9012,5),(9012,11),(9013,5),(9013,11),(9014,5),(9014,11),(9015,5),(9016,5),(9016,11),(9017,5),(9017,11),(9018,5),(9019,5),(9019,11),(9020,5),(9021,5),(9021,11),(9022,5),(9022,11),(9023,5),(9023,11),(9024,5),(9024,11),(9025,5),(9025,11),(9026,5),(9026,11),(9027,5),(9027,11),(9028,5),(9028,11),(9029,5),(9029,11),(9030,5),(9031,5),(9032,5),(9033,5),(9033,11),(9034,5),(9035,5),(9036,5),(9037,5),(9037,11),(9038,5),(9039,5),(9040,5),(9040,11),(9041,5),(9041,11),(9042,5),(9043,1),(9043,5),(9044,5),(9045,5),(9046,5),(9047,5),(9047,11),(9048,5),(9048,11),(9049,5),(9050,5),(9050,11),(9051,5),(9051,11),(9052,5),(9053,5),(9053,11),(9054,5),(9054,11),(9055,4),(9055,9),(9056,4),(9056,9),(9057,5),(9058,5),(9058,11),(9059,4),(9059,9),(9060,4),(9060,9),(9061,1),(9061,3),(9062,5),(9063,3),(9063,5),(9064,3),(9064,5),(9064,11);

/*Table structure for table `aauth_user_variables` */

DROP TABLE IF EXISTS `aauth_user_variables`;

CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_user_variables` */

/*Table structure for table `aauth_users` */

DROP TABLE IF EXISTS `aauth_users`;

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

/*Data for the table `aauth_users` */

insert  into `aauth_users`(`id`,`email`,`pass`,`name`,`banned`,`last_login`,`last_activity`,`last_login_attempt`,`forgot_exp`,`remember_time`,`remember_exp`,`verification_code`,`ip_address`,`login_attempts`,`allow_campus`) values (1,'mubeshersajid@gmail.com','ab3d92e195754233100a4385c5209992bdea094935f2c304d81fbc0837a79c75','Mubesher Sajid',0,'2018-02-24 21:47:52','2018-02-24 21:47:52','2018-02-24 21:00:00',NULL,NULL,NULL,'','::1',NULL,'01,02,03,04,05');

/*Table structure for table `controller_permission` */

DROP TABLE IF EXISTS `controller_permission`;

CREATE TABLE `controller_permission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `controller` varchar(100) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `controller_permission` */

insert  into `controller_permission`(`id`,`controller`,`permission`) values (1,'dashboard','Admin,Account,Teacher,Librarian'),(2,'fees','Admin'),(3,'user','Admin'),(4,'Classes','Admin'),(5,'Exam','Admin'),(6,'Faculty','Admin'),(7,'Faculty_attend','Admin'),(8,'Hr','Admin'),(9,'Library','Admin'),(10,'Messages','Admin'),(11,'Options','Admin'),(12,'Periods','Admin'),(13,'School','Admin'),(14,'Sms','Admin'),(15,'Staff_type','Admin'),(16,'Std_progress','Admin'),(17,'Student','Admin'),(18,'Student_attend','Admin'),(19,'Subject','Admin'),(20,'Update','Admin'),(21,'User','Admin');

/*Table structure for table `inf_app` */

DROP TABLE IF EXISTS `inf_app`;

CREATE TABLE `inf_app` (
  `APP_NAME` varchar(225) NOT NULL,
  `APP_LOGO` varchar(225) DEFAULT NULL,
  `APP_VER` varchar(225) DEFAULT NULL,
  `APP_DEV` varchar(225) DEFAULT NULL,
  `APP_DEV_WEB` varchar(225) DEFAULT NULL,
  `APP_CR` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inf_app` */

insert  into `inf_app`(`APP_NAME`,`APP_LOGO`,`APP_VER`,`APP_DEV`,`APP_DEV_WEB`,`APP_CR`) values ('Shershah.com','nil','1.0.0','I Tech Stellar','http://www.itechstellar.com','2017-2018');

/*Table structure for table `inf_category` */

DROP TABLE IF EXISTS `inf_category`;

CREATE TABLE `inf_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `allow` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `inf_category` */

insert  into `inf_category`(`id`,`parent_id`,`name`,`allow`) values (1,0,'Accessories','Y'),(2,0,'Belt Drive\r\n','Y'),(3,0,'Body\r\n','Y'),(4,0,'Brake & Wheel Hub\r\n','Y'),(8,0,'Cooling System\r\n','Y'),(9,0,'Drivetrain\r\n','Y'),(10,1,'	Back Up Camera\r\n','Y'),(11,1,'Cargo\r\n','Y'),(12,1,'Clearance & Side Marker Light\r\n','Y'),(13,1,'Emergency & Warning Light\r\n','Y'),(14,10,'Back Up Camera System\r\n','Y'),(15,10,'\r\nBack Up Camera\r\n','Y'),(16,1,'Cargo\r\n','Y'),(17,1,'Clearance & Side Marker Light\r\n','Y'),(18,1,'	Emergency & Warning Light\r\n','Y'),(19,1,'Fifth Wheel\r\n','Y'),(20,1,'Grille Guard\r\n','Y'),(21,1,'Identification Bar Light\r\n','Y'),(22,11,'Bike Rack\r\n','Y'),(23,11,'	Bike Rack Beam\r\n','Y'),(24,11,'	Cargo Carrier\r\n','Y'),(25,17,'2 1/2\" Clearance & Side Marker Light\r\n','Y'),(26,17,'	2 1/2\" LED Clearance & Side Marker Light\r\n','Y'),(27,17,'	2\" Clearance & Side Marker Light\r\n','Y'),(28,17,'2\" LED Clearance & Side Marker Light\r\n','Y'),(29,17,'Beehive Clearance Light\r\n','Y'),(30,18,'	Flashing Light\r\n','Y'),(31,18,'	LED Strobe Light\r\n','Y'),(32,18,'Oval LED Strobe Light\r\n','Y'),(33,18,'	Revolving Light\r\n','Y'),(34,18,'	Rotating Light\r\n','Y'),(35,18,'	Strobe Light\r\n','Y'),(36,18,'Traffic Light\r\n','Y'),(37,2,'ATV / UTV Belt\r\n','Y'),(38,2,'	Automotive V-Belt\r\n','Y'),(39,2,'	Heavy Duty / Industrial V-Belt\r\n','Y'),(40,2,'Light Duty FHP / Lawn & Garden V-Belt\r\n','Y'),(41,2,'	Pulley & Tensioner\r\n','Y'),(42,2,'Refrigeration V-Belt\r\n','Y'),(43,2,'	Snowmobile Belt\r\n','Y'),(44,2,'Tool\r\n','Y'),(45,2,'Vintage Auto Belt\r\n','Y'),(46,14,'New Cameras','Y'),(47,46,'Very New Camera','Y'),(48,3,'Level 1','Y'),(49,48,'Level 2','Y'),(50,49,'Level 3','Y'),(51,50,'Level 4','Y'),(52,51,'5','Y'),(53,12,'Level 3','Y'),(54,9,'Bumper / Pad','Y'),(55,54,'Axle Bumper','Y'),(56,55,'METRO XB33 Bumper','Y');

/*Table structure for table `inf_main_menu` */

DROP TABLE IF EXISTS `inf_main_menu`;

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

/*Data for the table `inf_main_menu` */

insert  into `inf_main_menu`(`PMENUID`,`PMENUICON`,`PMENUNAME`,`PMENULINK`,`ALLOW_GROUP`,`ORDER_BY`,`ALLOW`) values (8,'fa fa-info-circle','Information Section','app','Admin,Fees Section',9,'Y'),(9,'fa fa-user','User Section','user','Admin',10,'Y'),(10,'fa fa-cog','Setting','options','Admin',11,'Y'),(15,'fa fa-sitemap','Category','category','Admin',1,'Y');

/*Table structure for table `inf_school` */

DROP TABLE IF EXISTS `inf_school`;

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

/*Data for the table `inf_school` */

insert  into `inf_school`(`SCODE`,`SSNAME`,`SNAME`,`NTN_int`,`GST_int`,`ADDRESS1`,`ADDRESS2`,`CAMPUS`,`CAMPUS_NO`,`BANK_LOGO`,`LOGO`,`PHONE`,`FAX`,`TITLE_ACC`,`BANK`,`BANK_NAME`,`BANK2`,`ACC_NUM`,`NOTE`,`TOTAL_ATDAYS`,`CUSER`,`CTIMESTAMP`,`MUSER`,`MTIMESTAMP`,`M`,`N`,`XI`,`XII`) values ('P','UPS','Blank App','','','S.T-3/B, Block-F, North Nazimabad, Karachi.','','Branch 1',1,'https://usmanpublicschoolsystem.com/esms/campus18/assets/images/dubai-islamic-logo.jpg','https://upsspk.tk/esms/campus18/assets/images/logo.jpg','Ph: 36628398-36679159','','Title Of A/C: Usman Public School Campus IX','Hyderi Branch, North Nazimabad','Dubai Islamic Bank Pakistan Ltd.','MEHMOODABAD BRANCH','A/C# 0208834005','Note: Please Clear all dues before 10th of month to avoid inconvenience.  ',0,'','2018-02-13 22:16:42','','0000-00-00 00:00:00',7,6,'','');

/*Table structure for table `inf_sub_menu` */

DROP TABLE IF EXISTS `inf_sub_menu`;

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

/*Data for the table `inf_sub_menu` */

insert  into `inf_sub_menu`(`SMENUID`,`PMENUID`,`ORDER_BY`,`MENUICON`,`MENULINK`,`MENUNAME`,`ALLOW_GROUP`,`ALLOW`) values (1,1,1,'fa fa-circle-o','fees/fees_type','Fees Type','Admin,Fees Section','Y'),(2,1,3,'fa fa-circle-o','fees/fees_challan','Fees Challan Generate','Admin,Fees Section','Y'),(3,1,4,'fa fa-circle-o','fees/view_challan','View Challan','Admin,Fees Section','Y'),(4,1,4,'fa fa-circle-o','fees/fees_reports','Fees Report','Admin,Fees Section','Y'),(34,8,0,'fa fa-circle-o','app/index','App Info','Admin','Y'),(35,9,NULL,'fa fa-circle-o','user/index','View User','Admin','Y'),(37,10,0,'fa fa-circle-o','options/menu','Menu','Admin','Y'),(39,0,NULL,'fa fa-circle-o','accounts/view_expence','View Expence','Admin','Y'),(40,0,NULL,'fa fa-circle-o','fees/fees_type','Fees Types','Admin','Y'),(41,0,NULL,'fa fa-circle-o','fees/fees_type','Fees Types','Admin','Y'),(46,1,5,'fa fa-circle-o','fees/fees_all','Fees All','Admin,Fees Section','Y'),(50,1,2,'fa fa-circle-o','fees/fee_structure','Fee Structure','Admin,Fees Section','Y'),(56,1,3,'fa fa-circle-o','fees/discount','Student Discount','Admin,Fees Section','Y'),(58,15,1,'fa fa-circle-o','category/index','View Category','Admin','Y');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
