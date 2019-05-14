-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: shopware
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB-1:10.3.13+maria~bionic

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
-- Table structure for table `s_core_log`
--

DROP TABLE IF EXISTS `s_core_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_core_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_core_log`
--

LOCK TABLES `s_core_log` WRITE;
/*!40000 ALTER TABLE `s_core_log` DISABLE KEYS */;
INSERT INTO `s_core_log` VALUES (88,'backend','','In order to receive information about updates and install plugins, you need to log in to your Shopware account. If you don\'t have a Shopware account yet, you can easily register.','2019-03-26 12:42:02','Demo user','172.18.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:65.0) Gecko/20100101 Firefox/65.0',''),(89,'backend','Item','Item Sonnenbrille \"Red\" has been saved successfully.','2019-03-26 12:43:50','Demo user','172.18.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:65.0) Gecko/20100101 Firefox/65.0',''),(90,'backend','Item','Item Sonnenbrille \"Red\" has been saved successfully.','2019-03-26 12:43:51','Demo user','172.18.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:65.0) Gecko/20100101 Firefox/65.0',''),(91,'backend','Item','Item Sonnenbrille \"Red\" has been saved successfully.','2019-03-26 13:05:01','Demo user','172.18.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:65.0) Gecko/20100101 Firefox/65.0','');
/*!40000 ALTER TABLE `s_core_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_blog_comments`
--

DROP TABLE IF EXISTS `s_blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_blog_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `active` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points` double NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_blog_comments`
--

LOCK TABLES `s_blog_comments` WRITE;
/*!40000 ALTER TABLE `s_blog_comments` DISABLE KEYS */;
INSERT INTO `s_blog_comments` VALUES (1,1,'jakies inmie','dono','dono thiz\n','2019-02-10 00:00:00',1,'doo@gmail.com',1,1);
/*!40000 ALTER TABLE `s_blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_articles_vote`
--

DROP TABLE IF EXISTS `s_articles_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_articles_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articleID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `points` double NOT NULL,
  `datum` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `answer_date` datetime DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articleID` (`articleID`),
  KEY `get_articles_votes` (`articleID`,`active`,`datum`),
  KEY `vote_average` (`points`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_articles_vote`
--

LOCK TABLES `s_articles_vote` WRITE;
/*!40000 ALTER TABLE `s_articles_vote` DISABLE KEYS */;
INSERT INTO `s_articles_vote` VALUES (4,198,'Pep Eroni','Hervorragend','bin sehr zufrieden...',5,'2012-08-22 10:29:07',1,'','Danke','2012-08-29 13:13:19',NULL),(12,198,'Bert Bewerter','Super Artikel','Dieser Artikel zeichnet sich durch extreme Stabilität aus und fasst super viele Klamotten.\r\nDas Preisleistungsverhältnis ist exorbitant gut.',5,'2012-08-29 14:02:24',1,'','Vielen Dank für die positive Bewertung. Wir legen bei der Auswahl unserer Artikel besonders Wert auf die Qualität, sowie das Preis - / Leistungsverhältnis.<br>','2012-08-29 14:04:14',NULL);
/*!40000 ALTER TABLE `s_articles_vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_user`
--

DROP TABLE IF EXISTS `s_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `encoder` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'md5',
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `accountmode` int(11) NOT NULL,
  `confirmationkey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paymentID` int(11) NOT NULL DEFAULT 0,
  `doubleOptinRegister` tinyint(1) DEFAULT 0,
  `doubleOptinEmailSentDate` datetime DEFAULT NULL,
  `doubleOptinConfirmDate` datetime DEFAULT NULL,
  `firstlogin` date NOT NULL DEFAULT '0000-00-00',
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sessionID` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newsletter` int(1) NOT NULL DEFAULT 0,
  `validation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `affiliate` int(10) NOT NULL DEFAULT 0,
  `customergroup` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `paymentpreset` int(11) NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subshopID` int(11) NOT NULL,
  `referer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pricegroupID` int(11) unsigned DEFAULT NULL,
  `internalcomment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `failedlogins` int(11) NOT NULL,
  `lockeduntil` datetime DEFAULT NULL,
  `default_billing_address_id` int(11) DEFAULT NULL,
  `default_shipping_address_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `customernumber` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `sessionID` (`sessionID`),
  KEY `firstlogin` (`firstlogin`),
  KEY `lastlogin` (`lastlogin`),
  KEY `pricegroupID` (`pricegroupID`),
  KEY `customergroup` (`customergroup`),
  KEY `validation` (`validation`),
  KEY `default_billing_address_id` (`default_billing_address_id`),
  KEY `default_shipping_address_id` (`default_shipping_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_user`
--

LOCK TABLES `s_user` WRITE;
/*!40000 ALTER TABLE `s_user` DISABLE KEYS */;
INSERT INTO `s_user` VALUES (1,'a256a310bc1e5db755fd392c524028a8','md5','myqxample@cos.de',1,0,'',5,0,NULL,NULL,'2011-11-23','2012-01-04 14:12:05','uiorqd755gaar8dn89ukp178c7',0,'',0,'EK',0,'1',1,'',NULL,'',0,NULL,1,3,NULL,'mr','Max','Mustermann',NULL,'20001',NULL,NULL),(2,'352db51c3ff06159d380d3d9935ec814','md5','mustermann@b2b.de',1,0,'',4,0,NULL,NULL,'2012-08-30','2012-08-30 11:43:17','66e9b10064a19b1fcf6eb9310c0753866c764836',0,'0',0,'H',4,'1',1,'',NULL,'',0,NULL,2,4,NULL,'mr','Händler','Kundengruppe-Netto',NULL,'20003',NULL,NULL),(3,'$2y$10$lXF7.Q6D65/uqCaKCU2mpuHqzNO5Q1iWXPCT.eggUokH3h1IITGHK','bcrypt','intern4@wearevirtua.com',1,0,'',5,0,NULL,NULL,'2019-03-15','2019-03-15 10:14:48','nogmuhkmd2eu7c87ih1tg3jvne',0,'',0,'EK',0,'2',1,'',NULL,'',0,NULL,5,5,NULL,'mr','kuba','kuba',NULL,'20005','8a6293aa-a5ef-4827-8b9e-59da823fcd42.1','2019-03-15 10:03:00'),(4,'$2y$10$yRf0Pum4oKX7pq3U3RTyhuQKhUoHWRBIidKWF.UvSvHHk4yOJRu2e','bcrypt','demo@gmail.com',1,0,'',4,0,NULL,NULL,'2019-03-29','2019-05-10 12:57:16','8v0c2j2stqn4dhf3c9dnakv2ro',0,'',0,'EK',0,'2',1,'',NULL,'',0,NULL,7,8,NULL,'mr','aaaaaa','aaaaaa',NULL,'20006','c026a243-2f4e-4444-acdc-db52827349a6.1','2019-05-10 12:41:47');
/*!40000 ALTER TABLE `s_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_customer_search_index`
--

DROP TABLE IF EXISTS `s_customer_search_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_customer_search_index` (
  `id` int(11) NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `accountmode` int(11) DEFAULT NULL,
  `firstlogin` date DEFAULT NULL,
  `newsletter` int(1) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `default_billing_address_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `customernumber` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_group_id` int(11) DEFAULT NULL,
  `customer_group_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `count_orders` int(11) DEFAULT NULL,
  `invoice_amount_sum` double DEFAULT NULL,
  `invoice_amount_avg` double DEFAULT NULL,
  `invoice_amount_min` double DEFAULT NULL,
  `invoice_amount_max` double DEFAULT NULL,
  `first_order_time` date DEFAULT NULL,
  `last_order_time` date DEFAULT NULL,
  `has_canceled_orders` int(1) DEFAULT NULL,
  `product_avg` double DEFAULT NULL,
  `ordered_at_weekdays` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_in_shops` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_on_devices` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_with_deliveries` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_with_payments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_products` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_products_of_categories` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_products_of_manufacturer` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `index_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_customer_search_index`
--

LOCK TABLES `s_customer_search_index` WRITE;
/*!40000 ALTER TABLE `s_customer_search_index` DISABLE KEYS */;
INSERT INTO `s_customer_search_index` VALUES (1,'test@example.com',1,0,'2011-11-23',0,1,1,NULL,'mr','Max','Mustermann',NULL,'20001',1,'Shopkunden',5,'Muster GmbH',NULL,'Musterstr. 55','55555','Musterhausen','05555 / 555555',NULL,NULL,2,'Deutschland',3,NULL,1,201.86,201.86,201.86,201.86,'2012-08-31','2012-08-31',1,40.47,'|friday|','|1|',NULL,'|9|','|4|','|SW10196|SW10001|SW10002841|SW10185|','|10|20|3|24|25|','|14|','2019-04-25 14:58:59'),(2,'mustermann@b2b.de',1,0,'2012-08-30',0,1,2,NULL,'mr','Händler','Kundengruppe-Netto',NULL,'20003',2,'B2B / Händler netto',4,'B2B','Einkauf','Musterweg 1','55555','Musterstadt','012345 / 6789',NULL,NULL,2,'Deutschland',3,NULL,1,998.56,998.56,998.56,998.56,'2012-08-30','2012-08-30',0,836.13,'|thursday|','|1|',NULL,'|9|','|4|','|SW10196|','|3|10|20|','|14|','2019-04-25 14:58:59'),(3,'intern4@wearevirtua.com',1,0,'2019-03-15',0,1,5,NULL,'mr','kuba','kuba',NULL,'20005',1,'Shopkunden',5,NULL,NULL,'kuba','30-999','Kraków',NULL,NULL,NULL,4,'Australien',0,NULL,1,322.99,322.99,322.99,322.99,'2019-03-15','2019-03-15',0,300,'|friday|','|1|','|desktop|','|16|','|5|',NULL,NULL,NULL,'2019-04-25 14:58:59'),(4,'demo@gmail.com',1,0,'2019-03-29',0,1,7,NULL,'mr','aaaaaa','aaaaaa',NULL,'20006',1,'Shopkunden',5,NULL,NULL,'demodemo','1111','demodemo',NULL,NULL,NULL,2,'Deutschland',0,NULL,0,0,0,0,0,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-25 14:58:59');
/*!40000 ALTER TABLE `s_customer_search_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_campaigns_logs`
--

DROP TABLE IF EXISTS `s_campaigns_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_campaigns_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mailingID` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `articleID` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_campaigns_logs`
--

LOCK TABLES `s_campaigns_logs` WRITE;
/*!40000 ALTER TABLE `s_campaigns_logs` DISABLE KEYS */;
INSERT INTO `s_campaigns_logs` VALUES (1,'2019-02-10 00:00:00',1,'kra@samas.com',1);
/*!40000 ALTER TABLE `s_campaigns_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_campaigns_maildata`
--

DROP TABLE IF EXISTS `s_campaigns_maildata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_campaigns_maildata` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupID` int(11) unsigned NOT NULL,
  `salutation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added` datetime NOT NULL,
  `double_optin_confirmed` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_campaigns_maildata`
--

LOCK TABLES `s_campaigns_maildata` WRITE;
/*!40000 ALTER TABLE `s_campaigns_maildata` DISABLE KEYS */;
INSERT INTO `s_campaigns_maildata` VALUES (1,'demo@gmail.com',1,'mr',NULL,'kuba','kuba','ulica',NULL,'krakow','2019-05-10 12:30:12',NULL,NULL);
/*!40000 ALTER TABLE `s_campaigns_maildata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_order_shippingaddress`
--

DROP TABLE IF EXISTS `s_order_shippingaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_order_shippingaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `orderID` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryID` int(11) NOT NULL,
  `stateID` int(11) DEFAULT NULL,
  `additional_address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orderID` (`orderID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_order_shippingaddress`
--

LOCK TABLES `s_order_shippingaddress` WRITE;
/*!40000 ALTER TABLE `s_order_shippingaddress` DISABLE KEYS */;
INSERT INTO `s_order_shippingaddress` VALUES (1,2,15,'B2B','Einkauf','mr','Händler','Kundengruppe-Netto','Musterweg 1','00000','Musterstadt',NULL,2,3,NULL,NULL,NULL),(2,1,57,'shopware AG','','mr','Max','Mustermann','Mustermannstraße 92','48624','Schöppingen',NULL,2,3,NULL,NULL,NULL),(3,3,61,'','','mr','kuba','kuba','ulica','212-123','wroclaw','',7,NULL,'','',''),(4,4,63,'','','mr','kuba','kuba','ulica 22','30-275','krakow','',23,NULL,'','','');
/*!40000 ALTER TABLE `s_order_shippingaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_order_billingaddress`
--

DROP TABLE IF EXISTS `s_order_billingaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_order_billingaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `orderID` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `customernumber` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(11) NOT NULL DEFAULT 0,
  `stateID` int(11) DEFAULT NULL,
  `ustid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orderID` (`orderID`),
  KEY `userid` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_order_billingaddress`
--

LOCK TABLES `s_order_billingaddress` WRITE;
/*!40000 ALTER TABLE `s_order_billingaddress` DISABLE KEYS */;
INSERT INTO `s_order_billingaddress` VALUES (1,2,15,'B2B','Einkauf','mr',NULL,'Händler','Kundengruppe-Netto','Musterweg 1','00000','Musterstadt','012345 / 6789',2,3,'',NULL,NULL,NULL),(2,1,57,'shopware AG','','mr',NULL,'Max','Mustermann','Mustermannstraße 92','48624','Schöppingen','',2,3,'',NULL,NULL,NULL),(3,3,61,'','','mr','20005','kuba','kuba','kuba','30-999','Kraków','',4,NULL,'','','',''),(4,4,63,'','','mr','20006','aaaaaa','aaaaaa','demodemo','1111','demodemo','',2,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `s_order_billingaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_user_addresses`
--

DROP TABLE IF EXISTS `s_user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_user_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `ustid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `country_id` (`country_id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `s_user_addresses_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `s_core_countries` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `s_user_addresses_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `s_core_countries_states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `s_user_addresses_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `s_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_user_addresses`
--

LOCK TABLES `s_user_addresses` WRITE;
/*!40000 ALTER TABLE `s_user_addresses` DISABLE KEYS */;
INSERT INTO `s_user_addresses` VALUES (1,1,'Muster GmbH',NULL,'mr',NULL,'Max','Mustermann','Musterstr. 55','55555','Musterhausen',2,3,NULL,'05555 / 555555',NULL,NULL),(2,2,'B2B','Einkauf','mr',NULL,'Händler','Kundengruppe-Netto','Musterweg 1','55555','Musterstadt',2,3,NULL,'012345 / 6789',NULL,NULL),(3,1,'shopware AG',NULL,'mr',NULL,'Max','Mustermann','Mustermannstraße 92','48624','Schöppingen',2,NULL,NULL,NULL,NULL,NULL),(4,2,'B2B','Einkauf','mr',NULL,'Händler','Kundengruppe-Netto','Musterweg 1','00000','Musterstadt',2,3,NULL,NULL,NULL,NULL),(5,3,NULL,NULL,'mr',NULL,'kuba','kuba','kuba','30-999','Kraków',4,NULL,NULL,NULL,NULL,NULL),(6,3,NULL,NULL,'mr',NULL,'kuba','kuba','ulica','212-123','wroclaw',7,NULL,NULL,NULL,NULL,NULL),(7,4,NULL,NULL,'mr',NULL,'aaaaaa','aaaaaa','demodemo','1111','demodemo',2,NULL,NULL,NULL,NULL,NULL),(8,4,NULL,NULL,'mr',NULL,'kuba','kuba','ulica 22','30-275','krakow',23,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `s_user_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_user_billingaddress`
--

DROP TABLE IF EXISTS `s_user_billingaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_user_billingaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT 0,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(11) NOT NULL DEFAULT 0,
  `stateID` int(11) DEFAULT NULL,
  `ustid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_user_billingaddress`
--

LOCK TABLES `s_user_billingaddress` WRITE;
/*!40000 ALTER TABLE `s_user_billingaddress` DISABLE KEYS */;
INSERT INTO `s_user_billingaddress` VALUES (1,1,'kroatia','dono','mr','kuba','kuba','ulica 1','888888','krakow','1238123181',1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `s_user_billingaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_user_shippingaddress`
--

DROP TABLE IF EXISTS `s_user_shippingaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_user_shippingaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT 0,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `additional_address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_user_shippingaddress`
--

LOCK TABLES `s_user_shippingaddress` WRITE;
/*!40000 ALTER TABLE `s_user_shippingaddress` DISABLE KEYS */;
INSERT INTO `s_user_shippingaddress` VALUES (1,1,'kroatia','dono','mr','kuba','kuba','ulica 11','888888','krakow',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `s_user_shippingaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_core_payment_instance`
--

DROP TABLE IF EXISTS `s_core_payment_instance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_core_payment_instance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_mean_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iban` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(20,4) DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_mean_id` (`payment_mean_id`),
  KEY `payment_mean_id_2` (`payment_mean_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_core_payment_instance`
--

LOCK TABLES `s_core_payment_instance` WRITE;
/*!40000 ALTER TABLE `s_core_payment_instance` DISABLE KEYS */;
INSERT INTO `s_core_payment_instance` VALUES (1,5,61,3,'kuba','kuba','kuba','30-999','Kraków',NULL,NULL,NULL,NULL,NULL,NULL,322.9900,'2019-03-15'),(2,4,63,4,'aaaaaa','aaaaaa','demodemo','1111','demodemo',NULL,NULL,NULL,NULL,NULL,NULL,24.9500,'2019-05-10');
/*!40000 ALTER TABLE `s_core_payment_instance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_cms_support`
--

DROP TABLE IF EXISTS `s_cms_support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_cms_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_template` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_typeID` int(10) NOT NULL,
  `isocode` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'de',
  `shop_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_cms_support`
--

LOCK TABLES `s_cms_support` WRITE;
/*!40000 ALTER TABLE `s_cms_support` DISABLE KEYS */;
INSERT INTO `s_cms_support` VALUES (5,1,'Kontaktformular','<p>Schreiben Sie uns eine eMail.</p>\r\n<p>Wir freuen uns auf Ihre Kontaktaufnahme.</p>','info@example.com','Kontaktformular Shopware Demoshop\r\n\r\nAnrede: {sVars.anrede}\r\nVorname: {sVars.vorname}\r\nNachname: {sVars.nachname}\r\neMail: {sVars.email}\r\nTelefon: {sVars.telefon}\r\nBetreff: {sVars.betreff}\r\nKommentar: \r\n{sVars.kommentar}\r\n\r\n\r\n','Kontaktformular Shopware','<p>Ihr Formular wurde versendet!</p>',NULL,NULL,NULL,1,'de',NULL),(8,1,'Partnerformular','<h2>Partner werden und mitverdienen!</h2>\r\n<p>Einfach unseren Link auf ihre Seite legen und Sie erhalten f&uuml;r jeden Umsatz ihrer vermittelten Kunden automatisch eine attraktive Provision auf den Netto-Auftragswert.</p>\r\n<p>Bitte f&uuml;llen Sie <span style=\"text-decoration: underline;\">unverbindlich</span> das Partnerformular aus. Wir werden uns umgehend mit Ihnen in Verbindung setzen!</p>','info@example.com','Partneranfrage - {$sShopname}\n{sVars.firma} moechte Partner Ihres Shops werden!\n\nFirma: {sVars.firma}\nAnsprechpartner: {sVars.ansprechpartner}\nStraße/Hausnr.: {sVars.strasse}\nPLZ / Ort: {sVars.plz} {sVars.ort}\neMail: {sVars.email}\nTelefon: {sVars.tel}\nFax: {sVars.fax}\nWebseite: {sVars.website}\n\nKommentar:\n{sVars.kommentar}\n\nProfil:\n{sVars.profil}','Partner Anfrage','<p>Die Anfrage wurde versandt!</p>',NULL,NULL,NULL,0,'de',NULL),(9,1,'Defektes Produkt','<p>Sie erhalten von uns nach dem Absenden dieses Formulars innerhalb kurzer Zeit eine R&uuml;ckantwort mit einer RMA-Nummer und weiterer Vorgehensweise.</p>\r\n<p>Bitte f&uuml;llen Sie die Fehlerbeschreibung ausf&uuml;hrlich aus, Sie m&uuml;ssen diese dann nicht mehr dem Paket beilegen.</p>','info@example.com','Defektes Produkt - Shopware Demoshop\r\n\r\nFirma: {sVars.firma}\r\nKundennummer: {sVars.kdnr}\r\neMail: {sVars.email}\r\n\r\nRechnungsnummer: {sVars.rechnung}\r\nArtikelnummer: {sVars.artikel}\r\n\r\nDetaillierte Fehlerbeschreibung:\r\n--------------------------------\r\n{sVars.fehler}\r\n\r\nRechner: {sVars.rechner}\r\nSystem {sVars.system}\r\nWie tritt das Problem auf: {sVars.wie}\r\n','Online-Serviceformular','<p>Formular erfolgreich versandt!</p>',NULL,NULL,NULL,2,'de',NULL),(10,1,'Rückgabe','<h2>Hier k&ouml;nnen Sie Informationen zur R&uuml;ckgabe einstellen...</h2>','info@example.com','Rükgabe - Shopware Demoshop\n \nKundennummer: {sVars.kdnr}\neMail: {sVars.email}\n \nRechnungsnummer: {sVars.rechnung}\nArtikelnummer: {sVars.artikel}\n \nKommentar:\n \n{sVars.info}','Rückgabe','<p>Formular erfolgreich versandt.</p>',NULL,NULL,NULL,0,'de',NULL),(16,1,'Anfrage-Formular','<p>Schreiben Sie uns eine eMail.</p>\r\n<p>Wir freuen uns auf Ihre Kontaktaufnahme.</p>','info@example.com','{sShopname} Anfrage-Formular\n\nAnrede: {sVars.anrede}\nVorname: {sVars.vorname}\nNachname: {sVars.nachname}\neMail: {sVars.email}\nTelefon: {sVars.telefon}\nArtikel: {sVars.sordernumber}\n\nFrage: \n{sVars.inquiry}','{sShopname} Anfrage-Formular','<p>Ihre Anfrage wurde versendet!</p>',NULL,NULL,NULL,0,'de',NULL),(17,1,'Partner form','<h2><strong>Become partner and earn money!</strong></h2>\r\n<p>Link our Site and receive&nbsp;an attractive commission on the net contract price&nbsp;for every tornover of your&nbsp;provided customers.</p>\r\n<p>Please fill out the partner form <span style=\"text-decoration: underline;\">without obligation</span>.&nbsp;We will immediately get in contact with you!</p>','info@example.com','Partner inquiry - {$sShopname}\n{sVars.firma} want to become your partner!\n\nCompany: {sVars.firma}\nContact person: {sVars.ansprechpartner}\nStreet / No.: {sVars.strasse}\nPostal Code / City: {sVars.plz} {sVars.ort}\neMail: {sVars.email}\nPhone: {sVars.tel}\nFax: {sVars.fax}\nWebsite: {sVars.website}\n\nComment:\n{sVars.kommentar}\n\nProfile:\n{sVars.profil}','Partner inquiry','<p>&nbsp;</p>\r\n&nbsp;\r\n<div id=\"result_box\" dir=\"ltr\">The request has been sent!</div>',NULL,NULL,NULL,0,'de',NULL),(18,1,'Contact','','info@example.com','Contact form Shopware Demoshop\r\n\r\nTitle: {sVars.anrede}\r\nFirst name: {sVars.vorname}\r\nLast name: {sVars.nachname}\r\neMail: {sVars.email}\r\nPhone: {sVars.telefon}\r\nSubject: {sVars.betreff}\r\nComment: \r\n{sVars.kommentar}\r\n\r\n\r\n','Contact form Shopware','<p>Your form was sent!</p>',NULL,NULL,NULL,0,'de',NULL),(19,1,'Defective product','<p>After submitting this form you will receive an answer from us with a RMA number and additional instruction</p><p>Please fill out the form with all necessary details. You will not need to include the error description in your package.</p>','info@example.com','Defective product - Shopware Demoshop\n\nCompany: {sVars.firma}\nCustomer no.: {sVars.kdnr}\neMail: {sVars.email}\n\nInvoice no.: {sVars.rechnung}\nArticle no.: {sVars.artikel}\n\nDescription of failure:\n--------------------------------\n{sVars.fehler}\n\nType: {sVars.rechner}\nSystem {sVars.system}\nHow does the problem occur:\n{sVars.wie}','Online-Serviceform','<p>Form successfully sent!</p>',NULL,NULL,NULL,0,'de',NULL),(20,1,'Return','<h2>Here you can write information about the return...</h2>','info@example.com','Return - Shopware Demoshop\n\nCustomer no.: {sVars.kdnr}\neMail: {sVars.email}\n\nInvoice no.: {sVars.rechnung}\nArticle no.: {sVars.artikel}\n\nComment:\n{sVars.info}','Return','<p>Form successfully sent.</p>',NULL,NULL,NULL,0,'de',NULL),(21,1,'Inquiry form','<p>Send us an email.&nbsp;<br /><br />We look forward to hearing from you.</p>','info@example.com','{sShopname} Anfrage-Formular\n\nAnrede: {sVars.anrede}\nVorname: {sVars.vorname}\nNachname: {sVars.nachname}\neMail: {sVars.email}\nTelefon: {sVars.telefon}\nArtikel: {sVars.sordernumber}\n\nFrage: \n{sVars.inquiry}','{sShopname} Anfrage-Formular','<p>Your request has been sent!</p>',NULL,NULL,NULL,0,'de',NULL),(22,1,'Support beantragen','<p>Wir freuen uns &uuml;ber Ihre Kontaktaufnahme.</p>','info@example.com','','Support beantragen','<p>Vielen Dank f&uuml;r Ihre Anfrage!</p>',NULL,NULL,NULL,1,'de',NULL);
/*!40000 ALTER TABLE `s_cms_support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_core_payment_data`
--

DROP TABLE IF EXISTS `s_core_payment_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_core_payment_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_mean_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `use_billing_data` int(1) DEFAULT NULL,
  `bankname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iban` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_holder` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_mean_id_2` (`payment_mean_id`,`user_id`),
  KEY `payment_mean_id` (`payment_mean_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_core_payment_data`
--

LOCK TABLES `s_core_payment_data` WRITE;
/*!40000 ALTER TABLE `s_core_payment_data` DISABLE KEYS */;
INSERT INTO `s_core_payment_data` VALUES (1,6,4,1,'ing','37040044','BE71096123456769',NULL,NULL,NULL,'2019-05-10');
/*!40000 ALTER TABLE `s_core_payment_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_campaigns_mailaddresses`
--

DROP TABLE IF EXISTS `s_campaigns_mailaddresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_campaigns_mailaddresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(1) NOT NULL,
  `groupID` int(11) NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `lastmailing` int(11) NOT NULL,
  `lastread` int(11) NOT NULL,
  `added` datetime DEFAULT NULL,
  `double_optin_confirmed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groupID` (`groupID`),
  KEY `email` (`email`),
  KEY `lastmailing` (`lastmailing`),
  KEY `lastread` (`lastread`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_campaigns_mailaddresses`
--

LOCK TABLES `s_campaigns_mailaddresses` WRITE;
/*!40000 ALTER TABLE `s_campaigns_mailaddresses` DISABLE KEYS */;
INSERT INTO `s_campaigns_mailaddresses` VALUES (1,1,0,'demo@gmail.com',0,0,'2019-04-26 14:31:32',NULL);
/*!40000 ALTER TABLE `s_campaigns_mailaddresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_core_auth`
--

DROP TABLE IF EXISTS `s_core_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_core_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `encoder` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'LegacyBackendMd5',
  `apiKey` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localeID` int(11) NOT NULL,
  `sessionID` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `failedlogins` int(11) NOT NULL,
  `lockeduntil` datetime DEFAULT NULL,
  `extended_editor` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `disabled_cache` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_core_auth`
--

LOCK TABLES `s_core_auth` WRITE;
/*!40000 ALTER TABLE `s_core_auth` DISABLE KEYS */;
INSERT INTO `s_core_auth` VALUES (1,1,'demo','$2y$10$ddEbioyox2D9SmT1AWCGC.sOux0PLkKJwS6vsn26zY0OXmCvmC25S','bcrypt','ik67sVLGQiP0KZlsRBe0gqtlN6zgyP8S1xw9Go8J',1,'r5nnes4irnpiats80q3enh27sd','2019-05-07 16:07:06','Demo user','demo@example.com',1,0,'2010-01-01 00:00:00',0,0);
/*!40000 ALTER TABLE `s_core_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_emarketing_partner`
--

DROP TABLE IF EXISTS `s_emarketing_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_emarketing_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profil` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fix` double NOT NULL DEFAULT 0,
  `percent` double NOT NULL DEFAULT 0,
  `cookielifetime` int(11) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 0,
  `userID` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idcode` (`idcode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_emarketing_partner`
--

LOCK TABLES `s_emarketing_partner` WRITE;
/*!40000 ALTER TABLE `s_emarketing_partner` DISABLE KEYS */;
INSERT INTO `s_emarketing_partner` VALUES (1,'1','2019-02-10','kroatia','dono','ulica 11','88888','krakow','123812983','128310283','Poland','demo@gmail.com','http//:watawata.com','dono\n',0,0,0,0,NULL);
/*!40000 ALTER TABLE `s_emarketing_partner` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-14  9:06:10
