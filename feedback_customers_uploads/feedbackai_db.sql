-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: feedbackai
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `feedback_reports`
--

DROP TABLE IF EXISTS `feedback_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `userphoto` varchar(100) DEFAULT NULL,
  `userid` int(30) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `total_comments` varchar(100) DEFAULT NULL,
  `report_date` varchar(100) DEFAULT NULL,
  `report_month` varchar(100) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  `points` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `overall` varchar(100) DEFAULT NULL,
  `positivity` varchar(100) DEFAULT NULL,
  `negativity` varchar(100) DEFAULT NULL,
  `emotion_img` varchar(100) DEFAULT NULL,
  `total_sentiments` varchar(30) DEFAULT NULL,
  `total_postive` varchar(30) DEFAULT NULL,
  `total_negative` varchar(30) DEFAULT NULL,
  `total_overall` varchar(30) DEFAULT NULL,
  `total_design` varchar(30) DEFAULT NULL,
  `total_bug` varchar(30) DEFAULT NULL,
  `total_pricing` varchar(30) DEFAULT NULL,
  `total_supports` varchar(30) DEFAULT NULL,
  `total_others` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_reports`
--

LOCK TABLES `feedback_reports` WRITE;
/*!40000 ALTER TABLE `feedback_reports` DISABLE KEYS */;
INSERT INTO `feedback_reports` VALUES (32,'Pricing','Pricing-1624210537','\nThe Price of the Products is really interesting and amazing when compare to the content. Am Happy I made the right choice by purchasing the products','1624210537','Sunday, June 20, 2021, 1:35 pm','Customer','Nkemjika Gwacham','customer.png',0,'Open','0','2021-06-20','6','none',NULL,'member1@gmail.com','+2347015087561','15','15','0','happy.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'Design','Design-1624211977','\nThe Price of the Products is really interesting and amazing when compare to the content. Am Happy I made the right choice by purchasing the products','1624211977','Sunday, June 20, 2021, 1:59 pm','Customer','Tony Good','customer.png',0,'Open','0','2021-06-20','6','none',NULL,'ciustomer2@gmail.com','+2347015087561','15','15','0','happy.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'Design','Design-1624349106','The design of the products is Bad. ','1624349106','Tuesday, June 22, 2021, 4:05 am','Customer','Tony Vagrant','customer.png',0,'Open','0','2021-06-22','6','none',NULL,'ciustomer3@gmail.com','+2348066453019','-41.09','0','-41.09','sad.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `feedback_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_statistics`
--

DROP TABLE IF EXISTS `feedback_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_sentiments` varchar(30) DEFAULT NULL,
  `total_postive` varchar(30) DEFAULT NULL,
  `total_negative` varchar(30) DEFAULT NULL,
  `total_overall` varchar(30) DEFAULT NULL,
  `total_design` varchar(30) DEFAULT NULL,
  `total_bug` varchar(30) DEFAULT NULL,
  `total_pricing` varchar(30) DEFAULT NULL,
  `total_supports` varchar(30) DEFAULT NULL,
  `total_others` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_statistics`
--

LOCK TABLES `feedback_statistics` WRITE;
/*!40000 ALTER TABLE `feedback_statistics` DISABLE KEYS */;
INSERT INTO `feedback_statistics` VALUES (1,'123','91','39','0','18','13','33','31','12');
/*!40000 ALTER TABLE `feedback_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userid` int(30) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `user_rank` varchar(100) DEFAULT NULL,
  `reciever_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `timing` varchar(100) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title_seo` varchar(200) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `doctor_id` varchar(100) DEFAULT NULL,
  `doctor_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `user_rank` varchar(200) DEFAULT NULL,
  `user_verified` varchar(200) DEFAULT NULL,
  `user_banned` varchar(200) DEFAULT NULL,
  `created_time` varchar(200) DEFAULT NULL,
  `timer1` varchar(200) DEFAULT NULL,
  `timer2` varchar(200) DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `phone_no` varchar(60) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `points` varchar(100) DEFAULT NULL,
  `levels` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,NULL,'$2y$04$Qo01NCDXzXs8K7jqbQVJ2O7.H2EDkTtmtauXPjtNVsJJEhHLzOVxG','Fred Brook','admin@gmail.com','good1624194465.png','Admin','1','0','Sunday, June 20, 2021, 9:07 am','1624194465',NULL,'2440ddbf485b9c39b42644feeb273b6d1624194465',NULL,'+23408064242019','Admin','0','1'),(10,NULL,'$2y$04$MdT6puDc7kb6DTvkpMq0D.W2se2nqazi5r9fnC5EdRy2IBOTmvede','Fred  good','admin1@gmail.com','good1624231820.png','Admin','1','0','Sunday, June 20, 2021, 7:30 pm','1624231820',NULL,'a573d2c34ca7f030d2eabceef701cc681624231820',NULL,'123','Admin','0','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'feedbackai'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-22  9:08:33
