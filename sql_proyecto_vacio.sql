CREATE DATABASE  IF NOT EXISTS `proyecto_vacio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `proyecto_vacio`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: proyecto_vacio
-- ------------------------------------------------------
-- Server version	5.7.29-log

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
-- Table structure for table `bolig`
--

DROP TABLE IF EXISTS `bolig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bolig` (
  `id` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bolig`
--

LOCK TABLES `bolig` WRITE;
/*!40000 ALTER TABLE `bolig` DISABLE KEYS */;
INSERT INTO `bolig` VALUES ('2020-04-21 00:57:03','pete');
/*!40000 ALTER TABLE `bolig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_acciones`
--

DROP TABLE IF EXISTS `catag_acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_acciones` (
  `Cod_accion` int(11) NOT NULL AUTO_INCREMENT,
  `Accion` varchar(40) NOT NULL,
  `hora_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Estado` int(11) NOT NULL,
  PRIMARY KEY (`Cod_accion`),
  UNIQUE KEY `Accion` (`Accion`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_acciones_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_acciones`
--

LOCK TABLES `catag_acciones` WRITE;
/*!40000 ALTER TABLE `catag_acciones` DISABLE KEYS */;
INSERT INTO `catag_acciones` VALUES (1,'sacar la basuraerrewr','2020-04-27 23:23:17',1),(2,'compra ropa ','2020-05-01 18:07:50',1);
/*!40000 ALTER TABLE `catag_acciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_actividades`
--

DROP TABLE IF EXISTS `catag_actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_actividades` (
  `Cod_act` int(11) NOT NULL AUTO_INCREMENT,
  `Actividad` varchar(40) NOT NULL,
  `hora_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Estado` int(11) NOT NULL,
  PRIMARY KEY (`Cod_act`),
  UNIQUE KEY `Actividad` (`Actividad`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_actividades_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_actividades`
--

LOCK TABLES `catag_actividades` WRITE;
/*!40000 ALTER TABLE `catag_actividades` DISABLE KEYS */;
INSERT INTO `catag_actividades` VALUES (2,'compra de ropita2','2020-04-23 07:16:23',1),(5,'aranita','2020-04-22 03:28:53',1);
/*!40000 ALTER TABLE `catag_actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_carteras`
--

DROP TABLE IF EXISTS `catag_carteras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_carteras` (
  `Cod_Catera` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Cartera` varchar(40) NOT NULL,
  `Estado` int(11) NOT NULL,
  `hora_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Cod_Catera`),
  UNIQUE KEY `Nombre_Cartera` (`Nombre_Cartera`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_carteras_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_carteras`
--

LOCK TABLES `catag_carteras` WRITE;
/*!40000 ALTER TABLE `catag_carteras` DISABLE KEYS */;
INSERT INTO `catag_carteras` VALUES (7,'MEMp',1,'2020-04-27 23:03:15'),(8,'sacd olo',1,'2020-04-27 23:03:36'),(9,'Banco',1,'2020-05-01 17:58:11'),(10,'carteraz',2,'2020-05-01 18:00:00');
/*!40000 ALTER TABLE `catag_carteras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_estado_usuarios`
--

DROP TABLE IF EXISTS `catag_estado_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_estado_usuarios` (
  `id_estado_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_estado_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_estado_usuarios`
--

LOCK TABLES `catag_estado_usuarios` WRITE;
/*!40000 ALTER TABLE `catag_estado_usuarios` DISABLE KEYS */;
INSERT INTO `catag_estado_usuarios` VALUES (1,'Activo'),(2,'Inactivo'),(3,'Bloqueado');
/*!40000 ALTER TABLE `catag_estado_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_estados`
--

DROP TABLE IF EXISTS `catag_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_estados` (
  `Cod_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`Cod_estado`),
  UNIQUE KEY `estado` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_estados`
--

LOCK TABLES `catag_estados` WRITE;
/*!40000 ALTER TABLE `catag_estados` DISABLE KEYS */;
INSERT INTO `catag_estados` VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `catag_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_gestores`
--

DROP TABLE IF EXISTS `catag_gestores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_gestores` (
  `Cod_Gestores` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `hora_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hora_de_modi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Cod_Gestores`),
  UNIQUE KEY `Nombre_Gestor` (`Nombre`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_gestores_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_gestores`
--

LOCK TABLES `catag_gestores` WRITE;
/*!40000 ALTER TABLE `catag_gestores` DISABLE KEYS */;
INSERT INTO `catag_gestores` VALUES (1,'Guillermo',2,'Merino','2020-04-27 22:58:04','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `catag_gestores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_iconos`
--

DROP TABLE IF EXISTS `catag_iconos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_iconos` (
  `id_icono` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_icono` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_icono`)
) ENGINE=InnoDB AUTO_INCREMENT=734 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_iconos`
--

LOCK TABLES `catag_iconos` WRITE;
/*!40000 ALTER TABLE `catag_iconos` DISABLE KEYS */;
INSERT INTO `catag_iconos` VALUES (1,'ion-alert'),(2,'ion-alert-circled'),(3,'ion-android-add'),(4,'ion-android-add-circle'),(5,'ion-android-alarm-clock'),(6,'ion-android-alert'),(7,'ion-android-apps'),(8,'ion-android-archive'),(9,'ion-android-arrow-back'),(10,'ion-android-arrow-down'),(11,'ion-android-arrow-dropdown'),(12,'ion-android-arrow-dropdown-circle'),(13,'ion-android-arrow-dropleft'),(14,'ion-android-arrow-dropleft-circle'),(15,'ion-android-arrow-dropright'),(16,'ion-android-arrow-dropright-circle'),(17,'ion-android-arrow-dropup'),(18,'ion-android-arrow-dropup-circle'),(19,'ion-android-arrow-forward'),(20,'ion-android-arrow-up'),(21,'ion-android-attach'),(22,'ion-android-bar'),(23,'ion-android-bicycle'),(24,'ion-android-boat'),(25,'ion-android-bookmark'),(26,'ion-android-bulb'),(27,'ion-android-bus'),(28,'ion-android-calendar'),(29,'ion-android-call'),(30,'ion-android-camera'),(31,'ion-android-cancel'),(32,'ion-android-car'),(33,'ion-android-cart'),(34,'ion-android-chat'),(35,'ion-android-checkbox'),(36,'ion-android-checkbox-blank'),(37,'ion-android-checkbox-outline'),(38,'ion-android-checkbox-outline-blank'),(39,'ion-android-checkmark-circle'),(40,'ion-android-clipboard'),(41,'ion-android-close'),(42,'ion-android-cloud'),(43,'ion-android-cloud-circle'),(44,'ion-android-cloud-done'),(45,'ion-android-cloud-outline'),(46,'ion-android-color-palette'),(47,'ion-android-compass'),(48,'ion-android-contact'),(49,'ion-android-contacts'),(50,'ion-android-contract'),(51,'ion-android-create'),(52,'ion-android-delete'),(53,'ion-android-desktop'),(54,'ion-android-document'),(55,'ion-android-done'),(56,'ion-android-done-all'),(57,'ion-android-download'),(58,'ion-android-drafts'),(59,'ion-android-exit'),(60,'ion-android-expand'),(61,'ion-android-favorite'),(62,'ion-android-favorite-outline'),(63,'ion-android-film'),(64,'ion-android-folder'),(65,'ion-android-folder-open'),(66,'ion-android-funnel'),(67,'ion-android-globe'),(68,'ion-android-hand'),(69,'ion-android-hangout'),(70,'ion-android-happy'),(71,'ion-android-home'),(72,'ion-android-image'),(73,'ion-android-laptop'),(74,'ion-android-list'),(75,'ion-android-locate'),(76,'ion-android-lock'),(77,'ion-android-mail'),(78,'ion-android-map'),(79,'ion-android-menu'),(80,'ion-android-microphone'),(81,'ion-android-microphone-off'),(82,'ion-android-more-horizontal'),(83,'ion-android-more-vertical'),(84,'ion-android-navigate'),(85,'ion-android-notifications'),(86,'ion-android-notifications-none'),(87,'ion-android-notifications-off'),(88,'ion-android-open'),(89,'ion-android-options'),(90,'ion-android-people'),(91,'ion-android-person'),(92,'ion-android-person-add'),(93,'ion-android-phone-landscape'),(94,'ion-android-phone-portrait'),(95,'ion-android-pin'),(96,'ion-android-plane'),(97,'ion-android-playstore'),(98,'ion-android-print'),(99,'ion-android-radio-button-off'),(100,'ion-android-radio-button-on'),(101,'ion-android-refresh'),(102,'ion-android-remove'),(103,'ion-android-remove-circle'),(104,'ion-android-restaurant'),(105,'ion-android-sad'),(106,'ion-android-search'),(107,'ion-android-send'),(108,'ion-android-settings'),(109,'ion-android-share'),(110,'ion-android-share-alt'),(111,'ion-android-star'),(112,'ion-android-star-half'),(113,'ion-android-star-outline'),(114,'ion-android-stopwatch'),(115,'ion-android-subway'),(116,'ion-android-sunny'),(117,'ion-android-sync'),(118,'ion-android-textsms'),(119,'ion-android-time'),(120,'ion-android-train'),(121,'ion-android-unlock'),(122,'ion-android-upload'),(123,'ion-android-volume-down'),(124,'ion-android-volume-mute'),(125,'ion-android-volume-off'),(126,'ion-android-volume-up'),(127,'ion-android-walk'),(128,'ion-android-warning'),(129,'ion-android-watch'),(130,'ion-android-wifi'),(131,'ion-aperture'),(132,'ion-archive'),(133,'ion-arrow-down-a'),(134,'ion-arrow-down-b'),(135,'ion-arrow-down-c'),(136,'ion-arrow-expand'),(137,'ion-arrow-graph-down-left'),(138,'ion-arrow-graph-down-right'),(139,'ion-arrow-graph-up-left'),(140,'ion-arrow-graph-up-right'),(141,'ion-arrow-left-a'),(142,'ion-arrow-left-b'),(143,'ion-arrow-left-c'),(144,'ion-arrow-move'),(145,'ion-arrow-resize'),(146,'ion-arrow-return-left'),(147,'ion-arrow-return-right'),(148,'ion-arrow-right-a'),(149,'ion-arrow-right-b'),(150,'ion-arrow-right-c'),(151,'ion-arrow-shrink'),(152,'ion-arrow-swap'),(153,'ion-arrow-up-a'),(154,'ion-arrow-up-b'),(155,'ion-arrow-up-c'),(156,'ion-asterisk'),(157,'ion-at'),(158,'ion-backspace'),(159,'ion-backspace-outline'),(160,'ion-bag'),(161,'ion-battery-charging'),(162,'ion-battery-empty'),(163,'ion-battery-full'),(164,'ion-battery-half'),(165,'ion-battery-low'),(166,'ion-beaker'),(167,'ion-beer'),(168,'ion-bluetooth'),(169,'ion-bonfire'),(170,'ion-bookmark'),(171,'ion-bowtie'),(172,'ion-briefcase'),(173,'ion-bug'),(174,'ion-calculator'),(175,'ion-calendar'),(176,'ion-camera'),(177,'ion-card'),(178,'ion-cash'),(179,'ion-chatbox'),(180,'ion-chatbox-working'),(181,'ion-chatboxes'),(182,'ion-chatbubble'),(183,'ion-chatbubble-working'),(184,'ion-chatbubbles'),(185,'ion-checkmark'),(186,'ion-checkmark-circled'),(187,'ion-checkmark-round'),(188,'ion-chevron-down'),(189,'ion-chevron-left'),(190,'ion-chevron-right'),(191,'ion-chevron-up'),(192,'ion-clipboard'),(193,'ion-clock'),(194,'ion-close'),(195,'ion-close-circled'),(196,'ion-close-round'),(197,'ion-closed-captioning'),(198,'ion-cloud'),(199,'ion-code'),(200,'ion-code-download'),(201,'ion-code-working'),(202,'ion-coffee'),(203,'ion-compass'),(204,'ion-compose'),(205,'ion-connection-bars'),(206,'ion-contrast'),(207,'ion-crop'),(208,'ion-cube'),(209,'ion-disc'),(210,'ion-document'),(211,'ion-document-text'),(212,'ion-drag'),(213,'ion-earth'),(214,'ion-easel'),(215,'ion-edit'),(216,'ion-egg'),(217,'ion-eject'),(218,'ion-email'),(219,'ion-email-unread'),(220,'ion-erlenmeyer-flask'),(221,'ion-erlenmeyer-flask-bubbles'),(222,'ion-eye'),(223,'ion-eye-disabled'),(224,'ion-female'),(225,'ion-filing'),(226,'ion-film-marker'),(227,'ion-fireball'),(228,'ion-flag'),(229,'ion-flame'),(230,'ion-flash'),(231,'ion-flash-off'),(232,'ion-folder'),(233,'ion-fork'),(234,'ion-fork-repo'),(235,'ion-forward'),(236,'ion-funnel'),(237,'ion-gear-a'),(238,'ion-gear-b'),(239,'ion-grid'),(240,'ion-hammer'),(241,'ion-happy'),(242,'ion-happy-outline'),(243,'ion-headphone'),(244,'ion-heart'),(245,'ion-heart-broken'),(246,'ion-help'),(247,'ion-help-buoy'),(248,'ion-help-circled'),(249,'ion-home'),(250,'ion-icecream'),(251,'ion-image'),(252,'ion-images'),(253,'ion-information'),(254,'ion-information-circled'),(255,'ion-ionic'),(256,'ion-ios-alarm'),(257,'ion-ios-alarm-outline'),(258,'ion-ios-albums'),(259,'ion-ios-albums-outline'),(260,'ion-ios-americanfootball'),(261,'ion-ios-americanfootball-outline'),(262,'ion-ios-analytics'),(263,'ion-ios-analytics-outline'),(264,'ion-ios-arrow-back'),(265,'ion-ios-arrow-down'),(266,'ion-ios-arrow-forward'),(267,'ion-ios-arrow-left'),(268,'ion-ios-arrow-right'),(269,'ion-ios-arrow-thin-down'),(270,'ion-ios-arrow-thin-left'),(271,'ion-ios-arrow-thin-right'),(272,'ion-ios-arrow-thin-up'),(273,'ion-ios-arrow-up'),(274,'ion-ios-at'),(275,'ion-ios-at-outline'),(276,'ion-ios-barcode'),(277,'ion-ios-barcode-outline'),(278,'ion-ios-baseball'),(279,'ion-ios-baseball-outline'),(280,'ion-ios-basketball'),(281,'ion-ios-basketball-outline'),(282,'ion-ios-bell'),(283,'ion-ios-bell-outline'),(284,'ion-ios-body'),(285,'ion-ios-body-outline'),(286,'ion-ios-bolt'),(287,'ion-ios-bolt-outline'),(288,'ion-ios-book'),(289,'ion-ios-book-outline'),(290,'ion-ios-bookmarks'),(291,'ion-ios-bookmarks-outline'),(292,'ion-ios-box'),(293,'ion-ios-box-outline'),(294,'ion-ios-briefcase'),(295,'ion-ios-briefcase-outline'),(296,'ion-ios-browsers'),(297,'ion-ios-browsers-outline'),(298,'ion-ios-calculator'),(299,'ion-ios-calculator-outline'),(300,'ion-ios-calendar'),(301,'ion-ios-calendar-outline'),(302,'ion-ios-camera'),(303,'ion-ios-camera-outline'),(304,'ion-ios-cart'),(305,'ion-ios-cart-outline'),(306,'ion-ios-chatboxes'),(307,'ion-ios-chatboxes-outline'),(308,'ion-ios-chatbubble'),(309,'ion-ios-chatbubble-outline'),(310,'ion-ios-checkmark'),(311,'ion-ios-checkmark-empty'),(312,'ion-ios-checkmark-outline'),(313,'ion-ios-circle-filled'),(314,'ion-ios-circle-outline'),(315,'ion-ios-clock'),(316,'ion-ios-clock-outline'),(317,'ion-ios-close'),(318,'ion-ios-close-empty'),(319,'ion-ios-close-outline'),(320,'ion-ios-cloud'),(321,'ion-ios-cloud-download'),(322,'ion-ios-cloud-download-outline'),(323,'ion-ios-cloud-outline'),(324,'ion-ios-cloud-upload'),(325,'ion-ios-cloud-upload-outline'),(326,'ion-ios-cloudy'),(327,'ion-ios-cloudy-night'),(328,'ion-ios-cloudy-night-outline'),(329,'ion-ios-cloudy-outline'),(330,'ion-ios-cog'),(331,'ion-ios-cog-outline'),(332,'ion-ios-color-filter'),(333,'ion-ios-color-filter-outline'),(334,'ion-ios-color-wand'),(335,'ion-ios-color-wand-outline'),(336,'ion-ios-compose'),(337,'ion-ios-compose-outline'),(338,'ion-ios-contact'),(339,'ion-ios-contact-outline'),(340,'ion-ios-copy'),(341,'ion-ios-copy-outline'),(342,'ion-ios-crop'),(343,'ion-ios-crop-strong'),(344,'ion-ios-download'),(345,'ion-ios-download-outline'),(346,'ion-ios-drag'),(347,'ion-ios-email'),(348,'ion-ios-email-outline'),(349,'ion-ios-eye'),(350,'ion-ios-eye-outline'),(351,'ion-ios-fastforward'),(352,'ion-ios-fastforward-outline'),(353,'ion-ios-filing'),(354,'ion-ios-filing-outline'),(355,'ion-ios-film'),(356,'ion-ios-film-outline'),(357,'ion-ios-flag'),(358,'ion-ios-flag-outline'),(359,'ion-ios-flame'),(360,'ion-ios-flame-outline'),(361,'ion-ios-flask'),(362,'ion-ios-flask-outline'),(363,'ion-ios-flower'),(364,'ion-ios-flower-outline'),(365,'ion-ios-folder'),(366,'ion-ios-folder-outline'),(367,'ion-ios-football'),(368,'ion-ios-football-outline'),(369,'ion-ios-game-controller-a'),(370,'ion-ios-game-controller-a-outline'),(371,'ion-ios-game-controller-b'),(372,'ion-ios-game-controller-b-outline'),(373,'ion-ios-gear'),(374,'ion-ios-gear-outline'),(375,'ion-ios-glasses'),(376,'ion-ios-glasses-outline'),(377,'ion-ios-grid-view'),(378,'ion-ios-grid-view-outline'),(379,'ion-ios-heart'),(380,'ion-ios-heart-outline'),(381,'ion-ios-help'),(382,'ion-ios-help-empty'),(383,'ion-ios-help-outline'),(384,'ion-ios-home'),(385,'ion-ios-home-outline'),(386,'ion-ios-infinite'),(387,'ion-ios-infinite-outline'),(388,'ion-ios-information'),(389,'ion-ios-information-empty'),(390,'ion-ios-information-outline'),(391,'ion-ios-ionic-outline'),(392,'ion-ios-keypad'),(393,'ion-ios-keypad-outline'),(394,'ion-ios-lightbulb'),(395,'ion-ios-lightbulb-outline'),(396,'ion-ios-list'),(397,'ion-ios-list-outline'),(398,'ion-ios-location'),(399,'ion-ios-location-outline'),(400,'ion-ios-locked'),(401,'ion-ios-locked-outline'),(402,'ion-ios-loop'),(403,'ion-ios-loop-strong'),(404,'ion-ios-medical'),(405,'ion-ios-medical-outline'),(406,'ion-ios-medkit'),(407,'ion-ios-medkit-outline'),(408,'ion-ios-mic'),(409,'ion-ios-mic-off'),(410,'ion-ios-mic-outline'),(411,'ion-ios-minus'),(412,'ion-ios-minus-empty'),(413,'ion-ios-minus-outline'),(414,'ion-ios-monitor'),(415,'ion-ios-monitor-outline'),(416,'ion-ios-moon'),(417,'ion-ios-moon-outline'),(418,'ion-ios-more'),(419,'ion-ios-more-outline'),(420,'ion-ios-musical-note'),(421,'ion-ios-musical-notes'),(422,'ion-ios-navigate'),(423,'ion-ios-navigate-outline'),(424,'ion-ios-nutrition'),(425,'ion-ios-nutrition-outline'),(426,'ion-ios-paper'),(427,'ion-ios-paper-outline'),(428,'ion-ios-paperplane'),(429,'ion-ios-paperplane-outline'),(430,'ion-ios-partlysunny'),(431,'ion-ios-partlysunny-outline'),(432,'ion-ios-pause'),(433,'ion-ios-pause-outline'),(434,'ion-ios-paw'),(435,'ion-ios-paw-outline'),(436,'ion-ios-people'),(437,'ion-ios-people-outline'),(438,'ion-ios-person'),(439,'ion-ios-person-outline'),(440,'ion-ios-personadd'),(441,'ion-ios-personadd-outline'),(442,'ion-ios-photos'),(443,'ion-ios-photos-outline'),(444,'ion-ios-pie'),(445,'ion-ios-pie-outline'),(446,'ion-ios-pint'),(447,'ion-ios-pint-outline'),(448,'ion-ios-play'),(449,'ion-ios-play-outline'),(450,'ion-ios-plus'),(451,'ion-ios-plus-empty'),(452,'ion-ios-plus-outline'),(453,'ion-ios-pricetag'),(454,'ion-ios-pricetag-outline'),(455,'ion-ios-pricetags'),(456,'ion-ios-pricetags-outline'),(457,'ion-ios-printer'),(458,'ion-ios-printer-outline'),(459,'ion-ios-pulse'),(460,'ion-ios-pulse-strong'),(461,'ion-ios-rainy'),(462,'ion-ios-rainy-outline'),(463,'ion-ios-recording'),(464,'ion-ios-recording-outline'),(465,'ion-ios-redo'),(466,'ion-ios-redo-outline'),(467,'ion-ios-refresh'),(468,'ion-ios-refresh-empty'),(469,'ion-ios-refresh-outline'),(470,'ion-ios-reload'),(471,'ion-ios-reverse-camera'),(472,'ion-ios-reverse-camera-outline'),(473,'ion-ios-rewind'),(474,'ion-ios-rewind-outline'),(475,'ion-ios-rose'),(476,'ion-ios-rose-outline'),(477,'ion-ios-search'),(478,'ion-ios-search-strong'),(479,'ion-ios-settings'),(480,'ion-ios-settings-strong'),(481,'ion-ios-shuffle'),(482,'ion-ios-shuffle-strong'),(483,'ion-ios-skipbackward'),(484,'ion-ios-skipbackward-outline'),(485,'ion-ios-skipforward'),(486,'ion-ios-skipforward-outline'),(487,'ion-ios-snowy'),(488,'ion-ios-speedometer'),(489,'ion-ios-speedometer-outline'),(490,'ion-ios-star'),(491,'ion-ios-star-half'),(492,'ion-ios-star-outline'),(493,'ion-ios-stopwatch'),(494,'ion-ios-stopwatch-outline'),(495,'ion-ios-sunny'),(496,'ion-ios-sunny-outline'),(497,'ion-ios-telephone'),(498,'ion-ios-telephone-outline'),(499,'ion-ios-tennisball'),(500,'ion-ios-tennisball-outline'),(501,'ion-ios-thunderstorm'),(502,'ion-ios-thunderstorm-outline'),(503,'ion-ios-time'),(504,'ion-ios-time-outline'),(505,'ion-ios-timer'),(506,'ion-ios-timer-outline'),(507,'ion-ios-toggle'),(508,'ion-ios-toggle-outline'),(509,'ion-ios-trash'),(510,'ion-ios-trash-outline'),(511,'ion-ios-undo'),(512,'ion-ios-undo-outline'),(513,'ion-ios-unlocked'),(514,'ion-ios-unlocked-outline'),(515,'ion-ios-upload'),(516,'ion-ios-upload-outline'),(517,'ion-ios-videocam'),(518,'ion-ios-videocam-outline'),(519,'ion-ios-volume-high'),(520,'ion-ios-volume-low'),(521,'ion-ios-wineglass'),(522,'ion-ios-wineglass-outline'),(523,'ion-ios-world'),(524,'ion-ios-world-outline'),(525,'ion-ipad'),(526,'ion-iphone'),(527,'ion-ipod'),(528,'ion-jet'),(529,'ion-key'),(530,'ion-knife'),(531,'ion-laptop'),(532,'ion-leaf'),(533,'ion-levels'),(534,'ion-lightbulb'),(535,'ion-link'),(536,'ion-load-a'),(537,'ion-load-b'),(538,'ion-load-c'),(539,'ion-load-d'),(540,'ion-location'),(541,'ion-lock-combination'),(542,'ion-locked'),(543,'ion-log-in'),(544,'ion-log-out'),(545,'ion-loop'),(546,'ion-magnet'),(547,'ion-male'),(548,'ion-man'),(549,'ion-map'),(550,'ion-medkit'),(551,'ion-merge'),(552,'ion-mic-a'),(553,'ion-mic-b'),(554,'ion-mic-c'),(555,'ion-minus'),(556,'ion-minus-circled'),(557,'ion-minus-round'),(558,'ion-model-s'),(559,'ion-monitor'),(560,'ion-more'),(561,'ion-mouse'),(562,'ion-music-note'),(563,'ion-navicon'),(564,'ion-navicon-round'),(565,'ion-navigate'),(566,'ion-network'),(567,'ion-no-smoking'),(568,'ion-nuclear'),(569,'ion-outlet'),(570,'ion-paintbrush'),(571,'ion-paintbucket'),(572,'ion-paper-airplane'),(573,'ion-paperclip'),(574,'ion-pause'),(575,'ion-person'),(576,'ion-person-add'),(577,'ion-person-stalker'),(578,'ion-pie-graph'),(579,'ion-pin'),(580,'ion-pinpoint'),(581,'ion-pizza'),(582,'ion-plane'),(583,'ion-planet'),(584,'ion-play'),(585,'ion-playstation'),(586,'ion-plus'),(587,'ion-plus-circled'),(588,'ion-plus-round'),(589,'ion-podium'),(590,'ion-pound'),(591,'ion-power'),(592,'ion-pricetag'),(593,'ion-pricetags'),(594,'ion-printer'),(595,'ion-pull-request'),(596,'ion-qr-scanner'),(597,'ion-quote'),(598,'ion-radio-waves'),(599,'ion-record'),(600,'ion-refresh'),(601,'ion-reply'),(602,'ion-reply-all'),(603,'ion-ribbon-a'),(604,'ion-ribbon-b'),(605,'ion-sad'),(606,'ion-sad-outline'),(607,'ion-scissors'),(608,'ion-search'),(609,'ion-settings'),(610,'ion-share'),(611,'ion-shuffle'),(612,'ion-skip-backward'),(613,'ion-skip-forward'),(614,'ion-social-android'),(615,'ion-social-android-outline'),(616,'ion-social-angular'),(617,'ion-social-angular-outline'),(618,'ion-social-apple'),(619,'ion-social-apple-outline'),(620,'ion-social-bitcoin'),(621,'ion-social-bitcoin-outline'),(622,'ion-social-buffer'),(623,'ion-social-buffer-outline'),(624,'ion-social-chrome'),(625,'ion-social-chrome-outline'),(626,'ion-social-codepen'),(627,'ion-social-codepen-outline'),(628,'ion-social-css3'),(629,'ion-social-css3-outline'),(630,'ion-social-designernews'),(631,'ion-social-designernews-outline'),(632,'ion-social-dribbble'),(633,'ion-social-dribbble-outline'),(634,'ion-social-dropbox'),(635,'ion-social-dropbox-outline'),(636,'ion-social-euro'),(637,'ion-social-euro-outline'),(638,'ion-social-facebook'),(639,'ion-social-facebook-outline'),(640,'ion-social-foursquare'),(641,'ion-social-foursquare-outline'),(642,'ion-social-freebsd-devil'),(643,'ion-social-github'),(644,'ion-social-github-outline'),(645,'ion-social-google'),(646,'ion-social-google-outline'),(647,'ion-social-googleplus'),(648,'ion-social-googleplus-outline'),(649,'ion-social-hackernews'),(650,'ion-social-hackernews-outline'),(651,'ion-social-html5'),(652,'ion-social-html5-outline'),(653,'ion-social-instagram'),(654,'ion-social-instagram-outline'),(655,'ion-social-javascript'),(656,'ion-social-javascript-outline'),(657,'ion-social-linkedin'),(658,'ion-social-linkedin-outline'),(659,'ion-social-markdown'),(660,'ion-social-nodejs'),(661,'ion-social-octocat'),(662,'ion-social-pinterest'),(663,'ion-social-pinterest-outline'),(664,'ion-social-python'),(665,'ion-social-reddit'),(666,'ion-social-reddit-outline'),(667,'ion-social-rss'),(668,'ion-social-rss-outline'),(669,'ion-social-sass'),(670,'ion-social-skype'),(671,'ion-social-skype-outline'),(672,'ion-social-snapchat'),(673,'ion-social-snapchat-outline'),(674,'ion-social-tumblr'),(675,'ion-social-tumblr-outline'),(676,'ion-social-tux'),(677,'ion-social-twitch'),(678,'ion-social-twitch-outline'),(679,'ion-social-twitter'),(680,'ion-social-twitter-outline'),(681,'ion-social-usd'),(682,'ion-social-usd-outline'),(683,'ion-social-vimeo'),(684,'ion-social-vimeo-outline'),(685,'ion-social-whatsapp'),(686,'ion-social-whatsapp-outline'),(687,'ion-social-windows'),(688,'ion-social-windows-outline'),(689,'ion-social-wordpress'),(690,'ion-social-wordpress-outline'),(691,'ion-social-yahoo'),(692,'ion-social-yahoo-outline'),(693,'ion-social-yen'),(694,'ion-social-yen-outline'),(695,'ion-social-youtube'),(696,'ion-social-youtube-outline'),(697,'ion-soup-can'),(698,'ion-soup-can-outline'),(699,'ion-speakerphone'),(700,'ion-speedometer'),(701,'ion-spoon'),(702,'ion-star'),(703,'ion-stats-bars'),(704,'ion-steam'),(705,'ion-stop'),(706,'ion-thermometer'),(707,'ion-thumbsdown'),(708,'ion-thumbsup'),(709,'ion-toggle'),(710,'ion-toggle-filled'),(711,'ion-transgender'),(712,'ion-trash-a'),(713,'ion-trash-b'),(714,'ion-trophy'),(715,'ion-tshirt'),(716,'ion-tshirt-outline'),(717,'ion-umbrella'),(718,'ion-university'),(719,'ion-unlocked'),(720,'ion-upload'),(721,'ion-usb'),(722,'ion-videocamera'),(723,'ion-volume-high'),(724,'ion-volume-low'),(725,'ion-volume-medium'),(726,'ion-volume-mute'),(727,'ion-wand'),(728,'ion-waterdrop'),(729,'ion-wifi'),(730,'ion-wineglass'),(731,'ion-woman'),(732,'ion-wrench'),(733,'ion-xbox');
/*!40000 ALTER TABLE `catag_iconos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_menu`
--

DROP TABLE IF EXISTS `catag_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(1000) DEFAULT NULL,
  `url` varchar(2000) DEFAULT NULL,
  `fa` varchar(1000) DEFAULT NULL,
  `id_padre` int(11) DEFAULT '0',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_menu`
--

LOCK TABLES `catag_menu` WRITE;
/*!40000 ALTER TABLE `catag_menu` DISABLE KEYS */;
INSERT INTO `catag_menu` VALUES (0,'-Menu Padre-','#',NULL,0),(1,'Inicio','sistema','home',0),(2,'Configuración del sistema','usuarios','cog',0),(3,'Listado de Usuarios','usuarios','user',4),(4,'Roles','roles','user-secret',2),(5,'Menus','menu','list-alt',2),(6,'Parámetros Generales','parametros','briefcase',2),(31,'Mis Perfiles','misperfiles','th-list',2),(32,'Mis Usuarios','misusuarios','th-list',2),(33,'Usuarios','usuarios','user',2),(34,'Administracion','Administracion','admin',0),(35,'Acciones','acciones','admin',34),(36,'Actividades','actividades',NULL,34),(37,'Carteras','carteras',NULL,34),(38,'Gestores','gestores',NULL,34);
/*!40000 ALTER TABLE `catag_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_menu_rol`
--

DROP TABLE IF EXISTS `catag_menu_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_menu_rol` (
  `id_rol` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_menu`),
  KEY `fk_menu_x_rol_2` (`id_menu`),
  CONSTRAINT `fk_menu_x_rol_1` FOREIGN KEY (`id_rol`) REFERENCES `catag_roles` (`id_rol`),
  CONSTRAINT `fk_menu_x_rol_2` FOREIGN KEY (`id_menu`) REFERENCES `catag_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_menu_rol`
--

LOCK TABLES `catag_menu_rol` WRITE;
/*!40000 ALTER TABLE `catag_menu_rol` DISABLE KEYS */;
INSERT INTO `catag_menu_rol` VALUES (1,2),(1,4),(1,5),(1,6),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38);
/*!40000 ALTER TABLE `catag_menu_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_parametros`
--

DROP TABLE IF EXISTS `catag_parametros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_parametro` varchar(1000) DEFAULT NULL,
  `descripcion` varchar(4000) DEFAULT NULL,
  `valor` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_parametros`
--

LOCK TABLES `catag_parametros` WRITE;
/*!40000 ALTER TABLE `catag_parametros` DISABLE KEYS */;
INSERT INTO `catag_parametros` VALUES (1,'nombre_empresa','','AML Consulting Services, S.A. de C.V.'),(2,'version_aplicativo',NULL,'1.0'),(3,'abrev_nombre_empresa','','AML Advantage'),(4,'ruta_perfiles','','asset/images/perfiles/'),(5,'url_ofac','url lista OFAC en formato ZIP','https://www.treasury.gov/ofac/downloads/sdn_xml.zip'),(6,'url_onu','Url LIsta ONU','https://scsanctions.un.org/resources/xml/en/consolidated.xml'),(7,'proceso_ofac','Para indicar si el proceso de ofac se esta ejecutando','NO'),(9,'tiempo_ejecucion_automatica','Segundos de ejecución para un script php automatico','10000'),(10,'proceso_onu','Para indicar si el proceso de onu se esta ejecutando','NO'),(11,'fecha_ofac','Fecha de ultima actualización OFAC','22/02/2020'),(12,'fecha_onu','Fecha de ultima actualización ONU','22/02/2020'),(13,'url_webservicie','URL del Servicio Web','http://www.aml-advantage.com/listas/'),(14,'rol_list_pub','Rol para mostrar la lista publica','1'),(15,'relaciones_arbol','Activa la funcion de arbol de relaciones 0=Inactivar, 1=Activar','1'),(16,'activa_contadores','Activa los contadores de los usuarios','0'),(17,'descarga_listas_usu','Usuarios separados por coma para poder descargar las listas	','admin'),(18,'nombre_link_mapa','NOmbre que se muestra en el enlace del mapa','Ver diagrama de relaciones (Versión BETA)');
/*!40000 ALTER TABLE `catag_parametros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `catag_perfil`
--

DROP TABLE IF EXISTS `catag_perfil`;
/*!50001 DROP VIEW IF EXISTS `catag_perfil`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `catag_perfil` (
  `Id` tinyint NOT NULL,
  `Usuario` tinyint NOT NULL,
  `Nombre` tinyint NOT NULL,
  `Estado` tinyint NOT NULL,
  `Rol` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `catag_roles`
--

DROP TABLE IF EXISTS `catag_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(1000) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_roles`
--

LOCK TABLES `catag_roles` WRITE;
/*!40000 ALTER TABLE `catag_roles` DISABLE KEYS */;
INSERT INTO `catag_roles` VALUES (1,'Administrador','S');
/*!40000 ALTER TABLE `catag_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_sub_actividades`
--

DROP TABLE IF EXISTS `catag_sub_actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_sub_actividades` (
  `Cod_sub` int(11) NOT NULL AUTO_INCREMENT,
  `Subactividad` varchar(40) NOT NULL,
  `hora_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Estado` int(11) NOT NULL,
  `Actividad` int(11) NOT NULL,
  PRIMARY KEY (`Cod_sub`),
  UNIQUE KEY `Subactividad` (`Subactividad`),
  KEY `Estado` (`Estado`),
  KEY `Actividad` (`Actividad`),
  CONSTRAINT `catag_sub_actividades_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`),
  CONSTRAINT `catag_sub_actividades_ibfk_2` FOREIGN KEY (`Actividad`) REFERENCES `catag_actividades` (`Cod_act`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_sub_actividades`
--

LOCK TABLES `catag_sub_actividades` WRITE;
/*!40000 ALTER TABLE `catag_sub_actividades` DISABLE KEYS */;
INSERT INTO `catag_sub_actividades` VALUES (8,'sfszfzfz','2020-04-22 23:48:05',1,5),(9,'fasfasf','2020-04-27 23:24:00',1,2);
/*!40000 ALTER TABLE `catag_sub_actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_usuarios`
--

DROP TABLE IF EXISTS `catag_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(1000) DEFAULT NULL,
  `clave` longtext,
  `id_rol` int(11) DEFAULT NULL,
  `nombre` varchar(4000) DEFAULT NULL,
  `es_admin` int(11) DEFAULT '0',
  `id_estado_usuario` int(11) DEFAULT '1',
  `ultimo_acceso` datetime DEFAULT NULL,
  `logo` varchar(1000) DEFAULT 'no.png',
  `usu_web_service` varchar(100) DEFAULT NULL,
  `pass_web_service` varchar(100) DEFAULT NULL,
  `cant_usuarios` int(11) DEFAULT '0',
  `cat_registro_masivo` int(11) DEFAULT '0',
  `permiso_login` varchar(10) DEFAULT 'web',
  PRIMARY KEY (`id_usuario`),
  KEY `fk_estado_usuario` (`id_estado_usuario`),
  KEY `fk_rol_usuario` (`id_rol`),
  CONSTRAINT `fk_estado_usuario` FOREIGN KEY (`id_estado_usuario`) REFERENCES `catag_estado_usuarios` (`id_estado_usuario`),
  CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`id_rol`) REFERENCES `catag_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_usuarios`
--

LOCK TABLES `catag_usuarios` WRITE;
/*!40000 ALTER TABLE `catag_usuarios` DISABLE KEYS */;
INSERT INTO `catag_usuarios` VALUES (1,'admin','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=',1,'Administrador',1,1,'2020-05-07 19:57:46','12.jpg','admin','admin',3,100000,'web');
/*!40000 ALTER TABLE `catag_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_login`
--

DROP TABLE IF EXISTS `log_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(1000) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `ip` varchar(1000) DEFAULT NULL,
  `agente` varchar(4000) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_login`
--

LOCK TABLES `log_login` WRITE;
/*!40000 ALTER TABLE `log_login` DISABLE KEYS */;
INSERT INTO `log_login` VALUES (1,'admin','2020-02-22 20:18:05','::1','Chrome 79.0.3945.130   Windows 10',1),(2,'admin','2020-02-26 21:48:46','::1','Chrome 80.0.3987.122   Windows 10',1),(3,'admin','2020-05-07 11:44:51','::1','Chrome 81.0.4044.129   Windows 10',1),(4,'admin','2020-05-07 19:12:07','::1','Chrome 81.0.4044.129   Windows 10',1),(5,'admin','2020-05-07 19:20:01','::1','Chrome 81.0.4044.129   Windows 10',1),(6,'admin','2020-05-07 19:31:48','::1','Chrome 81.0.4044.129   Windows 10',1),(7,'admin','2020-05-07 19:33:51','::1','Chrome 81.0.4044.129   Windows 10',1),(8,'admin','2020-05-07 19:57:46','::1','Chrome 81.0.4044.129   Windows 10',1);
/*!40000 ALTER TABLE `log_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `codigo_perfil` varchar(100) DEFAULT NULL,
  `nombre_perfil` varchar(1000) DEFAULT NULL,
  `consulta_x_coincidencia` varchar(10) DEFAULT 'S',
  `porcentaje_coincidencia` decimal(18,2) DEFAULT '0.00',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles_menu`
--

DROP TABLE IF EXISTS `perfiles_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles_menu` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_perfil`,`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles_menu`
--

LOCK TABLES `perfiles_menu` WRITE;
/*!40000 ALTER TABLE `perfiles_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfiles_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba`
--

DROP TABLE IF EXISTS `prueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) DEFAULT NULL,
  `Nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba`
--

LOCK TABLES `prueba` WRITE;
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
INSERT INTO `prueba` VALUES (1,NULL,'memo'),(2,NULL,'memo1'),(3,NULL,'memo1'),(4,NULL,'memo3'),(5,NULL,'memo4');
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_x_usuarios`
--

DROP TABLE IF EXISTS `usuarios_x_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_x_usuarios` (
  `id_usuario_em` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `usuario` varchar(1000) DEFAULT NULL,
  `clave` varchar(2000) DEFAULT NULL,
  `nombre` varchar(1000) DEFAULT NULL,
  `codigo_perfil` varchar(100) DEFAULT NULL,
  `id_estado_usuario` int(11) DEFAULT '1',
  `ver_relaciones` varchar(10) DEFAULT 'S',
  PRIMARY KEY (`id_usuario_em`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_x_usuarios`
--

LOCK TABLES `usuarios_x_usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios_x_usuarios` DISABLE KEYS */;
INSERT INTO `usuarios_x_usuarios` VALUES (9,2,'analistaaml','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Analista 1','003',1,'N'),(10,2,'usuariorh','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario RH','09',1,'N'),(12,2,'digitador.prueba','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario Digitador','05',1,'S'),(13,5,'usuario1','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Katherin Rico','01',1,'S'),(14,19,'compras','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario de Compras','1',1,'S'),(15,19,'talento_humano','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario de Talento Humano','1',1,'S'),(16,19,'comercial','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario de Comercial','1',1,'S'),(18,19,'jdubon','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Oficialía de Cumplimiento ','3',1,'S'),(21,32,'igd1','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','OficialCIGD','01',1,'S'),(22,32,'igd2','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario DOS','01',1,'S'),(23,9,'fosaffi1','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario uno','01',1,'S'),(24,9,'fosaffi2','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario dos','01',1,'S'),(25,33,'analista','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Analista de Cumplimiento','01',1,'S'),(26,33,'agenciafb','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Agencia Flor Blanca','02',1,'S'),(27,33,'legal','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Departamento Legal','03',1,'S'),(28,4,'Usuario1','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario uno','01',1,'S'),(29,4,'Usuario2','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario dos','02',1,'S'),(30,25,'mmenjivar','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Maria Teresa Menjivar','1102',1,'S'),(31,2,'lgutierrez','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Leyla Gutierrez','0001',1,'S'),(32,2,'admindemo','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Usuario de prueba','003',1,'N'),(33,6,'Jose.Hernandez','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Jose Andres Hernandez Martinez ','1',1,'S'),(34,6,'Daniel.Osegueda','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Daniel Orlando Osegueda Orantes ','1',1,'S'),(35,6,'Carlos.Arias','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Carlos Romeo Arias Miranda ','2',1,'N'),(36,6,'Eva.Butter','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Eva Yolanda de Guadalupe Butter Aguilar ','2',1,'S'),(37,6,'Iris.Sosa','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Iris Esmeralda Sosa Galindo ','2',1,'N'),(38,6,'Ricardo.Flores','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Ricardo Alberto Flores Blanco ','2',1,'N'),(39,6,'Silvia.Flores','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Silvia Angelica Flores de Cuellar ','2',1,'N'),(40,6,'Cindy.Diaz','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Cindy Jazmin Diaz Montano ','2',1,'N'),(41,6,'Daniel.Ramirez','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Daniel Ernesto Ramirez Martinez ','2',1,'N'),(42,6,'Edwin.Melendez','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Edwin Alberto Melendez Aparicio ','2',1,'N'),(43,6,'Iliana.Cruz','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Iliana Dominga Cruz de Serrano ','2',1,'N'),(44,6,'Elena.Platero','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Maria Elena Platero ','2',1,'N'),(45,6,'Ana.Pineda','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Ana Cecilia Pineda de Diaz ','2',1,'N'),(46,6,'Aldo.Weill','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Aldo Martelli Weill','2',1,'N'),(47,6,'Jaime.Rivera','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Jaime Arnoldo Rivera Rivas','2',1,'N'),(48,6,'Jancy.Chavez','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Jancy Emmanuel Chavez Zelaya ','2',1,'N'),(49,6,'Jose.Zarate','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Jose Mauricio Zarate Hernandez ','2',1,'N'),(50,6,'Claudia.Henriquez','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=','Claudia Veronica Henriquez Alfaro ','2',1,'S');
/*!40000 ALTER TABLE `usuarios_x_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `viw_sub_actividad`
--

DROP TABLE IF EXISTS `viw_sub_actividad`;
/*!50001 DROP VIEW IF EXISTS `viw_sub_actividad`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `viw_sub_actividad` (
  `Id` tinyint NOT NULL,
  `Subactividad` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `actividad` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `catag_perfil`
--

/*!50001 DROP TABLE IF EXISTS `catag_perfil`*/;
/*!50001 DROP VIEW IF EXISTS `catag_perfil`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `catag_perfil` AS select `usr`.`id_usuario` AS `Id`,`usr`.`usuario` AS `Usuario`,`usr`.`nombre` AS `Nombre`,`eu`.`nombre_estado` AS `Estado`,`rl`.`nombre_rol` AS `Rol` from ((`catag_usuarios` `usr` join `catag_estado_usuarios` `eu` on((`eu`.`id_estado_usuario` = `usr`.`id_estado_usuario`))) join `catag_roles` `rl` on((`rl`.`id_rol` = `usr`.`id_rol`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `viw_sub_actividad`
--

/*!50001 DROP TABLE IF EXISTS `viw_sub_actividad`*/;
/*!50001 DROP VIEW IF EXISTS `viw_sub_actividad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `viw_sub_actividad` AS select `sub`.`Cod_sub` AS `Id`,`sub`.`Subactividad` AS `Subactividad`,`es`.`estado` AS `estado`,`act`.`Cod_act` AS `actividad` from ((`catag_sub_actividades` `sub` join `catag_actividades` `act` on((`sub`.`Actividad` = `act`.`Cod_act`))) join `catag_estados` `es` on((`es`.`Cod_estado` = `sub`.`Estado`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-07 20:08:24
