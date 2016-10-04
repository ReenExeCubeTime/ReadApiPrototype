CREATE DATABASE  IF NOT EXISTS `funnystories` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `funnystories`;
-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: funnystories
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `fs_category`
--

DROP TABLE IF EXISTS `fs_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_category`
--

LOCK TABLES `fs_category` WRITE;
/*!40000 ALTER TABLE `fs_category` DISABLE KEYS */;
INSERT INTO `fs_category` VALUES (1,'History','2016-10-05 00:18:49','2016-10-05 00:18:49');
/*!40000 ALTER TABLE `fs_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fs_language`
--

DROP TABLE IF EXISTS `fs_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_language`
--

LOCK TABLES `fs_language` WRITE;
/*!40000 ALTER TABLE `fs_language` DISABLE KEYS */;
INSERT INTO `fs_language` VALUES (1,'uk','Ukrainian','2016-10-05 00:18:49','2016-10-05 00:18:49');
/*!40000 ALTER TABLE `fs_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fs_story`
--

DROP TABLE IF EXISTS `fs_story`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7E8AF5E412469DE2` (`category_id`),
  KEY `IDX_7E8AF5E482F1BAF4` (`language_id`),
  CONSTRAINT `FK_7E8AF5E482F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `fs_language` (`id`),
  CONSTRAINT `FK_7E8AF5E412469DE2` FOREIGN KEY (`category_id`) REFERENCES `fs_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_story`
--

LOCK TABLES `fs_story` WRITE;
/*!40000 ALTER TABLE `fs_story` DISABLE KEYS */;
INSERT INTO `fs_story` VALUES (1,1,1,'Good morning Story',1,'2016-10-05 00:18:49','2016-10-05 00:18:49'),(2,1,1,'Memory Story',1,'2016-10-05 00:18:49','2016-10-05 00:18:49'),(3,1,1,'Try Story',1,'2016-10-05 00:18:49','2016-10-05 00:18:49');
/*!40000 ALTER TABLE `fs_story` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fs_user`
--

DROP TABLE IF EXISTS `fs_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_user`
--

LOCK TABLES `fs_user` WRITE;
/*!40000 ALTER TABLE `fs_user` DISABLE KEYS */;
INSERT INTO `fs_user` VALUES (1,'Alex','2016-10-05 00:18:49','2016-10-05 00:18:49'),(2,'Vertys','2016-10-05 00:18:49','2016-10-05 00:18:49'),(3,'Reen','2016-10-05 00:18:49','2016-10-05 00:18:49');
/*!40000 ALTER TABLE `fs_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fs_user_story_favorite`
--

DROP TABLE IF EXISTS `fs_user_story_favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_user_story_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USER_STORY_UNIQUE` (`user_id`,`story_id`),
  KEY `IDX_B8D65F23A76ED395` (`user_id`),
  KEY `IDX_B8D65F23AA5D4036` (`story_id`),
  CONSTRAINT `FK_B8D65F23AA5D4036` FOREIGN KEY (`story_id`) REFERENCES `fs_story` (`id`),
  CONSTRAINT `FK_B8D65F23A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fs_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_user_story_favorite`
--

LOCK TABLES `fs_user_story_favorite` WRITE;
/*!40000 ALTER TABLE `fs_user_story_favorite` DISABLE KEYS */;
INSERT INTO `fs_user_story_favorite` VALUES (1,1,1,'2016-10-05 00:18:49'),(2,2,1,'2016-10-05 00:18:49'),(3,3,1,'2016-10-05 00:18:49'),(4,2,2,'2016-10-05 00:18:49');
/*!40000 ALTER TABLE `fs_user_story_favorite` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-05  0:22:02
