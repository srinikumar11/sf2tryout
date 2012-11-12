-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: symfony
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Symfony 2.1'),(2,'Symfony 1.4');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5BC96BF0DAE07E97` (`blog_id`),
  CONSTRAINT `FK_5BC96BF0DAE07E97` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment`
--

LOCK TABLES `Comment` WRITE;
/*!40000 ALTER TABLE `Comment` DISABLE KEYS */;
INSERT INTO `Comment` VALUES (1,NULL,'Srinivasan','Srini@comogroupap.com','Testing comment','2012-10-30 22:54:12','2012-10-30 22:54:12'),(2,3,'Srini','sirini@sdfs.com','fasdf asd fasd','2012-10-30 23:20:10','2012-10-30 23:20:10'),(3,3,'Testing','sfs@sadfsd.com','sdfasdf','2012-10-30 23:21:07','2012-10-30 23:21:07'),(4,3,'Testing','sfs@sadfsd.com','sdfasdf','2012-10-30 23:21:44','2012-10-30 23:21:44'),(5,3,'Testing','sfs@sadfsd.com','sdfasdf','2012-10-30 23:24:28','2012-10-30 23:24:28'),(6,3,'Testing','sfs@sadfsd.com','sdfasdf','2012-10-30 23:24:56','2012-10-30 23:24:56');
/*!40000 ALTER TABLE `Comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate`
--

DROP TABLE IF EXISTS `affiliate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_597AA5CFE7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate`
--

LOCK TABLES `affiliate` WRITE;
/*!40000 ALTER TABLE `affiliate` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blog` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C015514364C19C1` (`category`),
  CONSTRAINT `FK_C015514364C19C1` FOREIGN KEY (`category`) REFERENCES `Category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (3,1,'Symfony 2.1.2 Released','Auctor odio turpis in dignissim phasellus, urna dis? Porttitor, risus vel platea, rhoncus. Porttitor! Penatibus! Urna, vel in non! Porta! Ut in, porta ac risus cras velit habitasse amet eu scelerisque sed, dapibus montes! In duis? Duis nisi. Adipiscing ac vel amet. Turpis elit arcu? Et egestas arcu, dapibus placerat sit cum vut auctor? In tempor, ultrices enim nec auctor a duis ut, scelerisque tincidunt rhoncus? Ut in in sed integer sit. Mus arcu habitasse arcu adipiscing scelerisque risus et aliquet integer sed a ac vel vel montes? Quis turpis, aliquet mauris tortor egestas a lectus, elit aliquam habitasse, magna! In in eros magnis habitasse, ultrices augue odio, sed etiam sed porta dapibus porttitor penatibus adipiscing rhoncus ac ac ut.\r\n\r\nTurpis sagittis porttitor sit. Et, lundium nec, sagittis eu in sit arcu tortor mid et augue ac platea cras risus aliquet a auctor! Quis elit elementum tincidunt nascetur lectus! Arcu dis dignissim scelerisque, tempor scelerisque, scelerisque pulvinar porttitor porttitor, tristique risus sociis etiam magna risus, in vel. Diam et augue porttitor elementum pulvinar, facilisis! Montes pulvinar elementum, duis magna vel, dis a proin ridiculus, mattis quis purus augue vut in aenean, ac sociis enim platea, odio nascetur, scelerisque ridiculus? Natoque vel a ac eros! Massa egestas, pulvinar tincidunt vut? Aenean ridiculus? A, sit rhoncus pid, turpis elementum ridiculus! Scelerisque? Tincidunt sit cras lorem purus. A porttitor sed, sit adipiscing. Scelerisque sed, lectus adipiscing sed, risus etiam ac sociis non.',1,'Srini','Symfony_2_1_2_Released','2012-10-30 21:41:17','2012-10-30 21:41:17');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_affiliate`
--

DROP TABLE IF EXISTS `category_affiliate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_affiliate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9E1A77FF12469DE2` (`category_id`),
  KEY `IDX_9E1A77FF9F12C49A` (`affiliate_id`),
  CONSTRAINT `FK_9E1A77FF12469DE2` FOREIGN KEY (`category_id`) REFERENCES `jobcategory` (`id`),
  CONSTRAINT `FK_9E1A77FF9F12C49A` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_affiliate`
--

LOCK TABLES `category_affiliate` WRITE;
/*!40000 ALTER TABLE `category_affiliate` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_affiliate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `how_to_apply` longtext COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FBD8E0F85F37A13B` (`token`),
  KEY `IDX_FBD8E0F812469DE2` (`category_id`),
  CONSTRAINT `FK_FBD8E0F812469DE2` FOREIGN KEY (`category_id`) REFERENCES `jobcategory` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,2,'full-time','Sensio Labs','sensio-labs.gif','http://www.sensiolabs.com/','Web Developer','Paris, France','You\'ve already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.','Send your resume to fabien.potencier [at] sensio.com','job_sensio_labs',1,1,'job@example.com','2012-12-10 00:00:00','2012-10-27 21:53:12',NULL),(2,1,'full-time','Extreme Sensio','5097bf11f083b.png','http://www.extreme-sensio.com/','Web Designer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.','Send your resume to fabien.potencier [at] sensio.com','job_extreme_sensio',1,1,'job@example.com','2012-12-10 00:00:00','2012-10-27 21:53:12','2012-11-05 18:58:49'),(3,2,'full-time','Company 100',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_100',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(4,2,'full-time','Company 101',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_101',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(5,2,'full-time','Company 102',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_102',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(6,2,'full-time','Company 103',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_103',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(7,2,'full-time','Company 104',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_104',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(8,2,'full-time','Company 105',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_105',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(9,2,'full-time','Company 106',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_106',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(10,2,'full-time','Company 107',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_107',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(11,2,'full-time','Company 108',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_108',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(12,2,'full-time','Company 109',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_109',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(13,2,'full-time','Company 110',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_110',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(14,2,'full-time','Company 111',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_111',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(15,2,'full-time','Company 112',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_112',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(16,2,'full-time','Company 113',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_113',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(17,2,'full-time','Company 114',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_114',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(18,2,'full-time','Company 115',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_115',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(19,2,'full-time','Company 116',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_116',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(20,2,'full-time','Company 117',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_117',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(21,2,'full-time','Company 118',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_118',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(22,2,'full-time','Company 119',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_119',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(23,2,'full-time','Company 120',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_120',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(24,2,'full-time','Company 121',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_121',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(25,2,'full-time','Company 122',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_122',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(26,2,'full-time','Company 123',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_123',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(27,2,'full-time','Company 124',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_124',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(28,2,'full-time','Company 125',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_125',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(29,2,'full-time','Company 126',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_126',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(30,2,'full-time','Company 127',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_127',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(31,2,'full-time','Company 128',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_128',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(32,2,'full-time','Company 129',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_129',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(33,2,'full-time','Company 130',NULL,NULL,'Web Developer','Paris, France','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','Send your resume to lorem.ipsum [at] dolor.sit','job_130',1,1,'job@example.com','2012-11-26 21:53:12','2012-10-27 21:53:12',NULL),(35,3,'part-time','Como Technology Solutions','508ea77506666.png','http://comogroup.com.au','Team Leader','Chennai','Come and enjoy the environment...','Come and meet mrs. kavita','24234232342342',1,NULL,'srini@comogroupap.com','2012-11-28 21:27:41','2012-10-29 21:27:41',NULL),(36,1,'part-time','Test','508eaf3866d32.png','Test','Test','Test','Test','Test','80675ce50a4302a07ed19b06855c1dfcb881636f',0,NULL,'Test','2012-11-28 22:00:48','2012-10-29 22:00:48',NULL),(37,1,'part-time','Test','508eaf678063d.png','Test','Test','Test','Test','Test','e08e3feff548b38a980cb28a1cfb31e0d45bd6fa',0,1,'Test','2012-11-28 22:01:35','2012-10-29 22:01:35','2012-10-29 22:18:21'),(38,3,'full-time','COmo Tech',NULL,'http://google.com','Technical manager','Chennai','This is a sample Desc','Contact Srini','3bf90edb28b137a13af9586b78dd1813f798e795',1,NULL,'srini@comogroupap.com','2012-12-05 21:57:30','2012-11-05 21:57:30',NULL);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobcategory`
--

DROP TABLE IF EXISTS `jobcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E8EB4F275E237E06` (`name`),
  UNIQUE KEY `UNIQ_E8EB4F27989D9B62` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobcategory`
--

LOCK TABLES `jobcategory` WRITE;
/*!40000 ALTER TABLE `jobcategory` DISABLE KEYS */;
INSERT INTO `jobcategory` VALUES (1,'Design','design'),(2,'Programming','programming'),(3,'Manager','manager'),(4,'Administrator','administrator');
/*!40000 ALTER TABLE `jobcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'srini','srini','srinikumar11@gmail.com','srinikumar11@gmail.com',1,'hvlt55u0z0o4cws8k408w0k0g0k40ko','3Wcu1EueYt2p7iyg5JZSJXGqzqQ8An25qKC1tr23P1Yr6PPU0UuImZJ9dXQT6AstDmk5nKM5JkB0Kf2hbrKtnQ==','2012-11-09 23:17:56',0,0,NULL,NULL,NULL,'a:2:{i:0;s:11:\"ROLES_ADMIN\";i:1;s:10:\"ROLE_ADMIN\";}',0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_depricated`
--

DROP TABLE IF EXISTS `users_depricated`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_depricated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5EE0CED792FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_5EE0CED7A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_depricated`
--

LOCK TABLES `users_depricated` WRITE;
/*!40000 ALTER TABLE `users_depricated` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_depricated` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-09 23:26:48
