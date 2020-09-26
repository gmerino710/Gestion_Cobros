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
-- Temporary table structure for view `all_promesas`
--

DROP TABLE IF EXISTS `all_promesas`;
/*!50001 DROP VIEW IF EXISTS `all_promesas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `all_promesas` (
  `Cod_cliente` tinyint NOT NULL,
  `Dui` tinyint NOT NULL,
  `Nombre_cliente` tinyint NOT NULL,
  `F_ingreso` tinyint NOT NULL,
  `Monto_empresa` tinyint NOT NULL,
  `F_pago` tinyint NOT NULL,
  `Estado de promesa` tinyint NOT NULL,
  `Cod_Gestores` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bitacora_cliente`
--

DROP TABLE IF EXISTS `bitacora_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_cliente` (
  `Cod_cliente` varchar(40) NOT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `Nombre_cliente` varchar(40) DEFAULT NULL,
  `Dui` char(10) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `Cartera` varchar(20) DEFAULT NULL,
  `Gestor` varchar(40) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `id_operacion` varchar(40) DEFAULT NULL,
  `saldo_capital` decimal(15,2) DEFAULT NULL,
  `saldo_interes` decimal(15,2) DEFAULT NULL,
  `saldo_vencido` decimal(15,2) DEFAULT NULL,
  `saldo_total` decimal(15,2) DEFAULT NULL,
  `dias_mora` int(11) DEFAULT NULL,
  `descripcion_producto` text,
  `trabajo` varchar(40) DEFAULT NULL,
  `direccion_trabajo` varchar(40) DEFAULT NULL,
  `tel_casa` varchar(12) DEFAULT NULL,
  `tel_trabajo` varchar(12) DEFAULT NULL,
  `tel_celular` varchar(12) DEFAULT NULL,
  `tel_familiar` varchar(12) DEFAULT NULL,
  `nombre_familiar` varchar(40) DEFAULT NULL,
  `tel_fiador` varchar(12) DEFAULT NULL,
  `nombre_fiador` varchar(40) DEFAULT NULL,
  `tel_ref1` varchar(12) DEFAULT NULL,
  `nombre_ref1` varchar(40) DEFAULT NULL,
  `tel_ref2` varchar(12) DEFAULT NULL,
  `nombre_ref2` varchar(40) DEFAULT NULL,
  `Comentario_cuenta` text,
  `Factura` varchar(40) DEFAULT NULL,
  `Sucursal` varchar(40) DEFAULT NULL,
  `Asesor` varchar(40) DEFAULT NULL,
  `dia_asignacion` varchar(20) DEFAULT NULL,
  `mes_asignacion` varchar(20) DEFAULT NULL,
  `año_asignacion` year(4) DEFAULT NULL,
  `monto_otorgado` decimal(15,2) DEFAULT NULL,
  `plazo` varchar(40) DEFAULT NULL,
  `dia_apertura` varchar(20) DEFAULT NULL,
  `mes_apertura` varchar(20) DEFAULT NULL,
  `año_apertura` year(4) DEFAULT NULL,
  `dia_vencimiento` varchar(20) DEFAULT NULL,
  `mes_vencimiento` varchar(20) DEFAULT NULL,
  `año_vencimiento` year(4) DEFAULT NULL,
  `cuota` decimal(15,2) DEFAULT NULL,
  `dia_ultimo_pago` varchar(20) DEFAULT NULL,
  `mes_ultimo_pago` varchar(20) DEFAULT NULL,
  `año_ultimo_pago` year(4) DEFAULT NULL,
  `monto_ultimo_pago` decimal(15,2) DEFAULT NULL,
  `cuotas_pagadas` int(11) DEFAULT NULL,
  `garantia` varchar(40) DEFAULT NULL,
  `tipo_cartera` varchar(40) DEFAULT NULL,
  `dia_separacion` varchar(20) DEFAULT NULL,
  `mes_separacion` varchar(20) DEFAULT NULL,
  `año_separacion` year(4) DEFAULT NULL,
  `salario_cliente` decimal(15,2) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_cliente`
--

LOCK TABLES `bitacora_cliente` WRITE;
/*!40000 ALTER TABLE `bitacora_cliente` DISABLE KEYS */;
INSERT INTO `bitacora_cliente` VALUES ('3','','0000-00-00','KENIA DEL CARMEN MORALES MOLINA','38443216','','h','batacon','copl bosques del rio  11 2 gpo 16 San Salvador Soy','499642',182.70,307.36,542.62,542.62,822,'TEL CEL GSM BLACKBERRY 8520 INTCOMEX BLC','gmg el salvadorCobrador','','','','78893817','2276854','evelyn carolina pichinte Familiar','','otro  numero ','2512541','rosman fabrizio molina Amigo','79315492','diana  fuentes Familiar','','115221|602575','68','','25','4',2015,0.00,'18','15','3',2012,'15','9',2013,25.82,'18','12',2012,26.11,10,'','Cartera B','30','6',2013,301.00,'2020-08-29 02:07:27',NULL,'0000-00-00 00:00:00','admin'),('3','','0000-00-00','KENIA DEL CARMEN MORALES MOLINA','38443216','','h','batacon','copl bosques del rio  11 2 gpo 16 San Salvador Soy','499642',182.70,307.36,542.62,542.62,822,'TEL CEL GSM BLACKBERRY 8520 INTCOMEX BLC','gmg el salvadorCobrador','','','','78893817','2276854','evelyn carolina pichinte Familiar','','otro  numero ','2512541','rosman fabrizio molina Amigo','79315492','diana  fuentes Familiar','','115221|602575','68','','25','4',2015,0.00,'18','15','3',2012,'15','9',2013,25.82,'18','12',2012,26.11,10,'','Cartera B','30','6',2013,301.00,'2020-08-29 02:16:10',NULL,'0000-00-00 00:00:00','admin');
/*!40000 ALTER TABLE `bitacora_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_colas_trabajo`
--

DROP TABLE IF EXISTS `bitacora_colas_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_colas_trabajo` (
  `Id` varchar(20) NOT NULL,
  `cliente` varchar(40) NOT NULL,
  `Operacion_ref` varchar(10) NOT NULL,
  `Cartera` varchar(20) DEFAULT NULL,
  `dia_alarma` varchar(20) DEFAULT NULL,
  `mes_alarma` varchar(20) DEFAULT NULL,
  `año_alarma` varchar(20) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `Usuario` varchar(40) DEFAULT NULL,
  `Comentario` text,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_colas_trabajo`
--

LOCK TABLES `bitacora_colas_trabajo` WRITE;
/*!40000 ALTER TABLE `bitacora_colas_trabajo` DISABLE KEYS */;
INSERT INTO `bitacora_colas_trabajo` VALUES ('','233620','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 16:53:20','admin','0000-00-00 00:00:00',NULL),('','282136','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','90741','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','198978','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','285184','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','87728','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','231327','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','112462','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','52640','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 16:53:21','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','126','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','66','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','66','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 17:38:10','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:39:02','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:39:02','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:39:02','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:39:03','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:39:03','admin','0000-00-00 00:00:00',NULL),('','126','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 17:39:03','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:39:03','admin','0000-00-00 00:00:00',NULL),('','66','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:39:03','admin','0000-00-00 00:00:00',NULL),('','66','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 17:39:03','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','126','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','66','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','66','','cartera  prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-26 17:40:29','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:44:37','admin','0000-00-00 00:00:00',NULL),('','3','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:44:37','admin','0000-00-00 00:00:00',NULL),('','3','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 17:44:37','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 17:44:37','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 23:58:07','admin','0000-00-00 00:00:00',NULL),('','3','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 23:58:07','admin','0000-00-00 00:00:00',NULL),('','3','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-26 23:58:07','admin','0000-00-00 00:00:00',NULL),('','3','','cartera  prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-26 23:58:07','admin','0000-00-00 00:00:00',NULL),('','1087','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL),('','3','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL),('','3','','cartera prado','5','3','2015','08:00:00','ALEXANDER','clientes nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `bitacora_colas_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_creditos`
--

DROP TABLE IF EXISTS `bitacora_creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_creditos` (
  `No_referecia` int(11) NOT NULL DEFAULT '0',
  `Cod_empresa` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `Fecha_saldos` date DEFAULT NULL,
  `Saldo_capital` double DEFAULT NULL,
  `Saldo_interes` double DEFAULT NULL,
  `Saldo_mora` double DEFAULT NULL,
  `Saldo_seguros` double DEFAULT NULL,
  `Saldo_cargos` double DEFAULT NULL,
  `Saldo_al_dia` double DEFAULT NULL,
  `Cancelacion_total` double DEFAULT NULL,
  `Estado` varchar(40) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_creditos`
--

LOCK TABLES `bitacora_creditos` WRITE;
/*!40000 ALTER TABLE `bitacora_creditos` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora_creditos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_gestion`
--

DROP TABLE IF EXISTS `bitacora_gestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_gestion` (
  `Operacion_ref` varchar(10) NOT NULL,
  `cliente` varchar(40) DEFAULT NULL,
  `Gestion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(11) DEFAULT NULL,
  `dia` varchar(15) DEFAULT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_gestion`
--

LOCK TABLES `bitacora_gestion` WRITE;
/*!40000 ALTER TABLE `bitacora_gestion` DISABLE KEYS */;
INSERT INTO `bitacora_gestion` VALUES ('105392','480','SE LE LLAMA 78665537  AL CL Y NO CONTESTA. SE LE L','22035373','25','8',2020,'2020-08-26 08:37:25','admin','0000-00-00 00:00:00',NULL),('105392','480','SE LE LLAMA 78665537  AL CL Y NO CONTESTA. SE LE L','22035373','25','8',2020,'2020-08-26 23:57:51','admin','0000-00-00 00:00:00',NULL),('105392','480','SE LE LLAMA 78665537  AL CL Y NO CONTESTA. SE LE L','22035373','25','8',2020,'2020-08-29 02:13:05','admin','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `bitacora_gestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_pagos`
--

DROP TABLE IF EXISTS `bitacora_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_pagos` (
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_operacion` int(11) NOT NULL,
  `abono` int(11) NOT NULL,
  `abono_dia` int(11) NOT NULL,
  `abono_mes` int(11) NOT NULL,
  `abono_año` int(11) NOT NULL,
  `saldo_total` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_pagos`
--

LOCK TABLES `bitacora_pagos` WRITE;
/*!40000 ALTER TABLE `bitacora_pagos` DISABLE KEYS */;
INSERT INTO `bitacora_pagos` VALUES ('2020-08-18 21:26:50','admin','0000-00-00 00:00:00',NULL,1,2,3,4,5,6,8,'codasss'),('2020-08-18 21:26:50','admin','0000-00-00 00:00:00',NULL,1,8,8,8,8,8,8,'codasss'),('2020-08-18 23:39:05','admin','0000-00-00 00:00:00',NULL,1,2,3,4,5,6,8,'codasss'),('2020-08-18 23:39:05','admin','0000-00-00 00:00:00',NULL,1,8,8,8,8,8,8,'codasss'),('2020-08-19 16:41:46','admin','0000-00-00 00:00:00',NULL,1,2,3,4,5,6,8,'codasss'),('2020-08-19 16:41:47','admin','0000-00-00 00:00:00',NULL,1,8,8,8,8,8,8,'codasss');
/*!40000 ALTER TABLE `bitacora_pagos` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `carga_gestion`
--

DROP TABLE IF EXISTS `carga_gestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carga_gestion` (
  `Operacion_ref` varchar(10) NOT NULL,
  `cliente` varchar(40) DEFAULT NULL,
  `Gestion` text,
  `Telefono` varchar(11) DEFAULT NULL,
  `dia` varchar(15) DEFAULT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  KEY `cliente` (`cliente`),
  CONSTRAINT `carga_gestion_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `catag_cliente` (`Cod_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carga_gestion`
--

LOCK TABLES `carga_gestion` WRITE;
/*!40000 ALTER TABLE `carga_gestion` DISABLE KEYS */;
INSERT INTO `carga_gestion` VALUES ('499642','3','SE LE LLAMA LA TT AL NUMERO 78609081. SE LE LLAMA AL FIADOR AL UMERO 71708169 Y LOS CONTESTA UNA MUJER DICE SER NUMERO EKIVOCADO Y QUE SE EETA LLAMANDO PARA USULUTAN REF 1 ARELY DE GALAN 77758320 NO CONTESTA REF 2 NELLY AYALA 75157237 NUMERO FUERA DE SERVICIO PDTE LA VISITA A DOM OP ANTONIO','74112314','25','8',2020,'2020-08-29 02:13:04','admin','0000-00-00 00:00:00',NULL),('151739','66','SE LE LLAMA AL TT AL NUMERO 76172090  NUMERO APAGADO.SE LE LLAM A AL FF AL NUMERO 73018760  Y NUMERO FUERA DE SERVICIO.REF 1 CLAUDIA SICILIANO 76287969 SUENA APAGADO.REF 2 SONIA ELIZABETH TORRES 70080597 CONTESTO Y DICE QUE CL SIEMPRE VIVE EN MISMA DIRECCION Y DICE QUE NUMERO DE CEL DE EL NO LO TIENE PERO QUE SE COMUNICARA ATRAVES DE LAS REDES SOCIALES Y LE DARA EL RECADO PDTE DE VISITA OP ANTONIO','25171640','25','8',2020,'2020-08-29 02:13:04','admin','0000-00-00 00:00:00',NULL),('489201','126','SE LE LLAMA AL CL AL NUMERO  73239400  NUMERO EKIVOCADO  SE LE LLAMA AL FF 72407162 Y NUMERO APAGADO REF 1 CARLOS ERNESTO ASCENCIO ALVARADO 72618446 FUERA DE SERVICIO JOSE DEMETRIO ALVARADO TOBAR 24692113  NO CONTESTA OP ANTONIO ','25021452','25','8',2020,'2020-08-29 02:13:04','admin','0000-00-00 00:00:00',NULL),('183956','955','72187027 se le llama al cl y fuera de servicio. se le llama al ff 72131510  y contesta un hombre el cul dice ser numero ekivocado. ref 1 JAIME TOBAR 75263273  numero fuera de servicio. ref 2 ROSA MELIDA MENDEZ 72271223 los contesta y los dijo que los podiamos encontrar en col maracaibo calle cemtral ultimas casas portom color blnaco a mano izquierda dio numero de esposa 77763665 sonia se le llama y no contesta op antonio ','22035373','25','8',2020,'2020-08-29 02:13:05','admin','0000-00-00 00:00:00',NULL),('489369','1087','se le llama al cl 70323644  numero apagado.70174535  se le llama al ff y fuera de servicdio. rerf 1 JOSE WILFREDO RAMIREZ 71525883  apagado. MAIRA LISSETH PEREZ 79925092  numero ekivocado op antonio ','22202227','25','8',2020,'2020-08-29 02:13:05','admin','0000-00-00 00:00:00',NULL),('449764','1265','cliente fallecido','22270801','25','8',2020,'2020-08-29 02:13:05','admin','0000-00-00 00:00:00',NULL),('95052','4313','SE LE LLAM AL CL 79266476  NUMERO EKIVOCADO. SE LE LLAMA AL FF 70053256 NUMERO EKIVOCAD. REF 1 LIZETH CONTRERAS  73724041  NO CONTESTA. REF 2 JOSE ANTONIO LOPEZ  79600084  NUMERO EKIVOCADO OP ANTONIO ','25021452','25','8',2020,'2020-08-29 02:13:05','admin','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `carga_gestion` ENABLE KEYS */;
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
  `Estado` int(11) NOT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cod_accion`),
  UNIQUE KEY `Accion` (`Accion`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_acciones_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_acciones`
--

LOCK TABLES `catag_acciones` WRITE;
/*!40000 ALTER TABLE `catag_acciones` DISABLE KEYS */;
INSERT INTO `catag_acciones` VALUES (5,'fsdfsdfsddf',1,'2020-06-02 02:38:57','admin','0000-00-00 00:00:00',NULL),(6,'pedro fddf',1,'2020-08-18 23:45:09','admin','0000-00-00 00:00:00',NULL),(7,'cxvcxvcxv vcvcv',1,'2020-08-19 06:41:05','admin','0000-00-00 00:00:00',NULL),(8,'dvsvxcv vcxvxcv',1,'2020-09-26 12:51:44','admin','0000-00-00 00:00:00',NULL);
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
  `Estado` int(11) NOT NULL,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Cod_act`),
  UNIQUE KEY `Actividad` (`Actividad`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_actividades_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_actividades`
--

LOCK TABLES `catag_actividades` WRITE;
/*!40000 ALTER TABLE `catag_actividades` DISABLE KEYS */;
INSERT INTO `catag_actividades` VALUES (10,'Localizados',1,NULL,'2020-09-26 12:32:59',NULL,'0000-00-00 00:00:00'),(11,'Promesa',1,NULL,'2020-09-26 12:33:08',NULL,'0000-00-00 00:00:00'),(12,'Ilocalizados',1,NULL,'2020-09-26 12:33:18',NULL,'0000-00-00 00:00:00'),(13,'Depuracion',1,NULL,'2020-09-26 12:33:42',NULL,'0000-00-00 00:00:00'),(14,'Acciones',1,NULL,'2020-09-26 12:33:53',NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `catag_actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_carteras`
--

DROP TABLE IF EXISTS `catag_carteras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_carteras` (
  `Cod_catera` varchar(20) NOT NULL,
  `Nombre_Cartera` varchar(40) NOT NULL,
  `Estado` int(11) NOT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cod_catera`),
  UNIQUE KEY `Nombre_Cartera` (`Nombre_Cartera`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_carteras_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_carteras`
--

LOCK TABLES `catag_carteras` WRITE;
/*!40000 ALTER TABLE `catag_carteras` DISABLE KEYS */;
INSERT INTO `catag_carteras` VALUES ('cartera prado','Cartera de clientes Prado',1,'2020-08-26 06:35:10','admin','0000-00-00 00:00:00',NULL),('cartera unicomer','Cartera de cliente unicomer',1,'2020-08-26 18:09:15','admin','0000-00-00 00:00:00',NULL),('cartera_pedro','pedrito',1,'2020-09-16 11:08:35',NULL,'0000-00-00 00:00:00',NULL),('fsdfsdfdfdfdf dffs','dsfdsff',2,'2020-08-19 06:48:37','admin','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `catag_carteras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_cliente`
--

DROP TABLE IF EXISTS `catag_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_cliente` (
  `Cod_cliente` varchar(40) NOT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `Nombre_cliente` varchar(40) DEFAULT NULL,
  `Dui` char(10) DEFAULT NULL,
  `NIT` varchar(40) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `Cartera` varchar(20) DEFAULT NULL,
  `Gestor` varchar(40) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `id_operacion` varchar(40) DEFAULT NULL,
  `saldo_capital` decimal(15,2) DEFAULT NULL,
  `saldo_interes` decimal(15,2) DEFAULT NULL,
  `saldo_vencido` decimal(15,2) DEFAULT NULL,
  `saldo_total` decimal(15,2) DEFAULT NULL,
  `saldo_mora` decimal(15,2) DEFAULT NULL,
  `deuda_total` decimal(15,2) DEFAULT NULL,
  `dias_mora` int(11) DEFAULT NULL,
  `f_ultimo_pago` date DEFAULT NULL,
  `descripcion_producto` text,
  `trabajo` varchar(40) DEFAULT NULL,
  `direccion_trabajo` varchar(40) DEFAULT NULL,
  `tel_casa` varchar(12) DEFAULT NULL,
  `tel_trabajo` varchar(12) DEFAULT NULL,
  `tel_celular` varchar(12) DEFAULT NULL,
  `tel_alterno` varchar(9) DEFAULT NULL,
  `tel_familiar` varchar(12) DEFAULT NULL,
  `nombre_familiar` varchar(40) DEFAULT NULL,
  `DUI_fiador` varchar(40) DEFAULT NULL,
  `NIT_fiador` varchar(40) DEFAULT NULL,
  `tel_fiador` varchar(12) DEFAULT NULL,
  `nombre_fiador` varchar(40) DEFAULT NULL,
  `tel_alterno_fiador` varchar(9) DEFAULT NULL,
  `tel_casa_fiador` varchar(9) DEFAULT NULL,
  `tel_trabajo_fiador` varchar(9) DEFAULT NULL,
  `direccion_domicilio_fiador` varchar(50) DEFAULT NULL,
  `lugar_trabajo_fiador` varchar(50) DEFAULT NULL,
  `direccion_trabajo_fiador` varchar(50) DEFAULT NULL,
  `tel_ref1` varchar(12) DEFAULT NULL,
  `nombre_ref1` varchar(40) DEFAULT NULL,
  `tel_ref2` varchar(12) DEFAULT NULL,
  `nombre_ref2` varchar(40) DEFAULT NULL,
  `Comentario_cuenta` text,
  `Factura` varchar(40) DEFAULT NULL,
  `Sucursal` varchar(40) DEFAULT NULL,
  `Asesor` varchar(40) DEFAULT NULL,
  `dia_asignacion` varchar(20) DEFAULT NULL,
  `mes_asignacion` varchar(20) DEFAULT NULL,
  `año_asignacion` year(4) DEFAULT NULL,
  `monto_otorgado` decimal(15,2) DEFAULT NULL,
  `plazo` varchar(40) DEFAULT NULL,
  `dia_apertura` varchar(20) DEFAULT NULL,
  `mes_apertura` varchar(20) DEFAULT NULL,
  `año_apertura` year(4) DEFAULT NULL,
  `dia_vencimiento` varchar(20) DEFAULT NULL,
  `mes_vencimiento` varchar(20) DEFAULT NULL,
  `año_vencimiento` year(4) DEFAULT NULL,
  `cuota` decimal(15,2) DEFAULT NULL,
  `dia_ultimo_pago` varchar(20) DEFAULT NULL,
  `mes_ultimo_pago` varchar(20) DEFAULT NULL,
  `año_ultimo_pago` year(4) DEFAULT NULL,
  `monto_ultimo_pago` decimal(15,2) DEFAULT NULL,
  `f_asignacion` date DEFAULT NULL,
  `cuotas_pagadas` int(11) DEFAULT NULL,
  `garantia` varchar(40) DEFAULT NULL,
  `tipo_cartera` varchar(40) DEFAULT NULL,
  `dia_separacion` varchar(20) DEFAULT NULL,
  `mes_separacion` varchar(20) DEFAULT NULL,
  `año_separacion` year(4) DEFAULT NULL,
  `salario_cliente` decimal(15,2) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cod_cliente`),
  KEY `Gestor` (`Gestor`),
  KEY `Cartera` (`Cartera`),
  CONSTRAINT `catag_cliente_ibfk_1` FOREIGN KEY (`Gestor`) REFERENCES `catag_gestores` (`Cod_Gestores`),
  CONSTRAINT `catag_cliente_ibfk_2` FOREIGN KEY (`Cartera`) REFERENCES `catag_carteras` (`Cod_catera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_cliente`
--

LOCK TABLES `catag_cliente` WRITE;
/*!40000 ALTER TABLE `catag_cliente` DISABLE KEYS */;
INSERT INTO `catag_cliente` VALUES ('1',NULL,NULL,'CARMEN MIRIAM',NULL,NULL,NULL,'cartera_pedro','buzon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'catag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pagocatag_promesa_pago',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-16 10:53:28',NULL,'2020-09-25 06:31:46',NULL),('1087','','0000-00-00','GUILLERMO  RAMOS PEREZ','20634798',NULL,'','cartera prado','buzon','COL. LA PALMA CALLE A RADIO VEA PJE 4 2 CALLE A RA','489369',169.12,192.25,440.35,440.35,NULL,NULL,863,NULL,'MINICOMP SONY MHCEX66 2000W','ALBAÑIL INDEPENDIENTEOtro','','25021452','23521904','73699162',NULL,'225893','NATIVIDAD  GUZMAN Familiar',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'','ESPERANZA  RAMOS Familiar','2258749','MANUEL ANTONIO HERNANDEZ Indefinido','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\r\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.','137470|594484','39','','25','4',2015,0.00,'24','5','2',2012,'5','2',2014,16.28,'28','11',2012,16.28,NULL,9,'','Cartera B','31','5',2013,343.00,'2020-08-29 02:04:53','admin','2020-09-25 00:28:57','admin'),('126','','0000-00-00','MARIA ELENA ORELLANA DE','10630085',NULL,'','cartera prado','buzon','CL PPAL PJE 28 12  San Salvador San Martin','489201',398.93,720.44,1305.88,1305.88,NULL,NULL,978,NULL,'REFRI AUTO SAMSUNG RT38CVSW1 13CF BLC','RECIBE AYUDA DEL EXTRANJEROOtro','','22966121','22966121','73728954',NULL,'2283611','CARMEN ELENA ORELLANA Familiar',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'226669','WILSON RODOLFO ZOMETA Amigo','22957261','CELIA  ORELLANA Familiar','cocolito\r\n','84320|561205','39','','25','4',2015,0.00,'24','12','10',2011,'12','10',2013,38.24,'24','7',2012,39.35,NULL,31,'','Cartera B','31','1',2013,263.00,'2020-08-29 02:04:53','admin','2020-09-24 20:31:49','admin'),('1265','','0000-00-00','WALTER ALBERTO AMAYA ','12593051',NULL,'','cartera prado','buzon','poligono setenta y cuatro  0 5  San Salvador Tonac','449764',226.43,262.51,541.16,541.16,NULL,NULL,786,NULL,'TEL CEL GSM BLACKBERRY 9220 NEG','COOPERATIVA AEMIS SA DE CVCobrador','','22035373','','61265440',NULL,'22937518','ANGELA  AMAYA Familiar',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'7438252','ANDREA  CHOTO Indefinido','2215392','ZULMA  AMAYA Familiar','','132575|678058','99','','25','4',2015,0.00,'12','20','12',2012,'20','12',2013,27.48,'1','10',2013,0.09,NULL,1,'','Cartera B','31','8',2013,300.00,'2020-08-29 02:04:53','admin','2020-08-29 02:07:28','admin'),('3','','0000-00-00','KENIA DEL CARMEN MORALES MOLINA','38443216',NULL,'','cartera prado','buzon','copl bosques del rio  11 2 gpo 16 San Salvador Soy','172380',185.98,300.19,546.55,546.55,NULL,NULL,834,NULL,'TEL CEL GSM BLACKBERRY 8520 INTCOMEX NEG','gmg el salvadorCobrador','','','','78893817',NULL,'2276854','evelyn carolina pichinte Familiar',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'2512541','rosman fabrizio molina Amigo','79315492','diana  fuentes Familiar','Cards assume no specific width to start, so they’ll be 100% wide unless otherwise stated. You can change this as needed with custom CSS, grid classes, grid Sass mixins, or utilities.\r\nCards assume no specific width to start, so they’ll be 100% wide unless otherwise stated. You can change this as needed with custom CSS, grid classes, grid Sass mixins, or utilities.\r\nCards assume no specific width to start, so they’ll be 100% wide unless otherwise stated. You can change this as needed with custom CSS, grid classes, grid Sass mixins, or utilities.','162051|607105','68','','25','4',2015,0.00,'18','3','4',2012,'3','10',2013,25.05,'1','10',2013,0.94,NULL,10,'','Cartera B','30','6',2013,301.00,'2020-08-29 02:04:53','admin','2020-09-24 22:08:59','admin'),('4313','','0000-00-00','JUANA DEL ROSARIO ESCOBAR ','18373946',NULL,'','cartera prado','buzon','SAN MARCOS}COL. EL MILAGRO PJE. VILANOVA Num 42 SN','95052',20.68,11.44,38.69,38.69,NULL,NULL,532,NULL,'COC GAS MABE EM1751BBO 30 5Q BLC','COSTURERA MODISTASin respuesta','','22202227','22202227','',NULL,'','SERGIO ADALBERTO MARTINEZ Conyugue',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'','ANGEL  ESCOBAR Familiar','2223385','MARIA LUISA NAVARRO Indefinido',' ','42166|463255','8','','25','4',2015,0.00,'36','30','5',2006,'30','5',2009,21.50,'27','4',2009,16.61,NULL,34,'','Cartera B','31','5',2014,217.00,'2020-08-29 02:04:53','admin','2020-09-24 21:55:52','admin'),('4804','','0000-00-00','CARMEN  HIDALGO ','5076226',NULL,'','cartera prado','buzon','4ª AV SUR COMERCIAL BENECIA SYAPANGO A LA PAR DE Z','105392',35.43,2.31,56.42,56.42,NULL,NULL,424,NULL,'ARTICULO VARIOS','COMEDOR SILVIAAuxiliares','','22270801','22274661','',NULL,'','ODILIA  . Indefinido',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'22773848','NAPOLEON  HERNANDEZ Indefinido','','SILVIA DEL CARMEN GRANADOS Familiar','ssdfdsfsdfsssssssssssssssssssssssssssssssssssssssssssssssssssssss.sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss.ssssssssssssssssssssssssssssssssss.sdff','73286|185776','9','','25','4',2015,0.00,'24','17','9',2005,'17','9',2007,17.72,'15','10',2006,5.70,NULL,12,'','Cartera B','30','9',2014,343.00,'2020-08-29 02:04:53','admin','2020-09-24 21:57:27','admin'),('66','','0000-00-00','MARIA JOAQUINA ARIAS UMAÑA','8116009',NULL,'','cartera prado','batacon','- PASAJE 4 CASA  1  San Salvador Ilopango','151739',427.64,369.93,1034.50,1034.50,NULL,NULL,850,NULL,'TV LCD 32 SONY KDL32BX330','COSTURA EN CASACosturera','','74112314','74112314','74112314',NULL,'799843','ANA   PORTILLO Amigo',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'22225866','WENDY  GALDAMEZ Familiar','73698159','REINA ISABEL ARIAS Familiar','','69708|656680','99','','25','4',2015,0.00,'24','18','10',2012,'18','10',2014,29.10,'1','10',2013,0.72,NULL,1,'','Cartera B','31','5',2013,293.00,'2020-08-29 02:04:53','admin','2020-08-29 02:16:10','admin'),('955','','0000-00-00','DELFINA ANABELLA RIVAS ','24741830',NULL,'','cartera prado','buzon','GRUPO 32 PJE 39  CASA 32  San Salvador Ilopango','183956',281.59,16.55,302.50,336.33,NULL,NULL,314,NULL,'VAJILLAS GIBSON 16 PZS','TEXTILES RED POINT SA DE CVOtro','','25171640','','',NULL,'','ALICIA  RIVAS Familiar',NULL,NULL,'','otro  numero ',NULL,NULL,NULL,NULL,NULL,NULL,'2265546','MILAGRO ELIZABETH .. Familiar','2292592','ALEJANDRA  PEREZ Indefinido','','109970|671770','48','','25','4',2015,0.00,'30','7','12',2012,'7','6',2015,27.12,'11','2',2015,150.00,NULL,17,'','Cartera B','31','7',2014,250.00,'2020-08-29 02:04:53','admin','2020-08-29 02:07:28','admin');
/*!40000 ALTER TABLE `catag_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_colas_trabajo`
--

DROP TABLE IF EXISTS `catag_colas_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_colas_trabajo` (
  `cliente` varchar(40) NOT NULL,
  `Cartera` varchar(20) DEFAULT NULL,
  `dia_alarma` varchar(20) DEFAULT NULL,
  `mes_alarma` varchar(20) DEFAULT NULL,
  `año_alarma` varchar(20) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `Usuario` varchar(40) DEFAULT NULL,
  `Comentario` text,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  KEY `cliente` (`cliente`),
  KEY `Cartera` (`Cartera`),
  CONSTRAINT `catag_colas_trabajo_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `catag_cliente` (`Cod_cliente`),
  CONSTRAINT `catag_colas_trabajo_ibfk_3` FOREIGN KEY (`Cartera`) REFERENCES `catag_carteras` (`Cod_catera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_colas_trabajo`
--

LOCK TABLES `catag_colas_trabajo` WRITE;
/*!40000 ALTER TABLE `catag_colas_trabajo` DISABLE KEYS */;
INSERT INTO `catag_colas_trabajo` VALUES ('1087','cartera prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-29 02:09:48','admin','0000-00-00 00:00:00',NULL),('3','cartera prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL),('126','cartera prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL),('1087','cartera prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL),('66','cartera prado','5','3','2015','08:00:00','arnold','clientes nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL),('66','cartera prado','5','3','2015','08:00:00','arnold','clientes  nuevos','2020-08-29 02:09:49','admin','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `catag_colas_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_creditos`
--

DROP TABLE IF EXISTS `catag_creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_creditos` (
  `No_referecia` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_empresa` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `Fecha_saldos` date DEFAULT NULL,
  `Saldo_capital` double DEFAULT NULL,
  `Saldo_interes` double DEFAULT NULL,
  `Saldo_mora` double DEFAULT NULL,
  `Saldo_seguros` double DEFAULT NULL,
  `Saldo_cargos` double DEFAULT NULL,
  `Saldo_al_dia` double DEFAULT NULL,
  `Cancelacion_total` double DEFAULT NULL,
  `Estado` varchar(40) DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`No_referecia`),
  KEY `FK_Ordenes_Tickets` (`Cod_empresa`),
  CONSTRAINT `FK_Ordenes_Tickets` FOREIGN KEY (`Cod_empresa`) REFERENCES `catag_empresa` (`Cod_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_creditos`
--

LOCK TABLES `catag_creditos` WRITE;
/*!40000 ALTER TABLE `catag_creditos` DISABLE KEYS */;
/*!40000 ALTER TABLE `catag_creditos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_criterios_busqueda`
--

DROP TABLE IF EXISTS `catag_criterios_busqueda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_criterios_busqueda` (
  `criterio` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`criterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_criterios_busqueda`
--

LOCK TABLES `catag_criterios_busqueda` WRITE;
/*!40000 ALTER TABLE `catag_criterios_busqueda` DISABLE KEYS */;
INSERT INTO `catag_criterios_busqueda` VALUES ('Cartera','Cartera'),('Cod_cliente','Codigo cliente'),('Dui','DUI'),('Nombre_cliente','Nombre');
/*!40000 ALTER TABLE `catag_criterios_busqueda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_em`
--

DROP TABLE IF EXISTS `catag_em`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_em` (
  `Cod_empresa` int(11) NOT NULL DEFAULT '0',
  `Empresa` varchar(40) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_em`
--

LOCK TABLES `catag_em` WRITE;
/*!40000 ALTER TABLE `catag_em` DISABLE KEYS */;
/*!40000 ALTER TABLE `catag_em` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_empresa`
--

DROP TABLE IF EXISTS `catag_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_empresa` (
  `Cod_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `Empresa` varchar(40) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cod_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_empresa`
--

LOCK TABLES `catag_empresa` WRITE;
/*!40000 ALTER TABLE `catag_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `catag_empresa` ENABLE KEYS */;
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
  `Cod_Gestores` varchar(40) NOT NULL,
  `Nombre` varchar(40) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `hora_de_modi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_de_creacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cod_Gestores`),
  UNIQUE KEY `Nombre_Gestor` (`Nombre`),
  KEY `Estado` (`Estado`),
  CONSTRAINT `catag_gestores_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_gestores`
--

LOCK TABLES `catag_gestores` WRITE;
/*!40000 ALTER TABLE `catag_gestores` DISABLE KEYS */;
INSERT INTO `catag_gestores` VALUES ('batacon','Guillermo ',1,'Merino','0000-00-00 00:00:00','0000-00-00 00:00:00','admin','2020-08-26 23:52:29','admin'),('buzon','pedro',1,'garcia','0000-00-00 00:00:00','0000-00-00 00:00:00','admin','0000-00-00 00:00:00',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_menu`
--

LOCK TABLES `catag_menu` WRITE;
/*!40000 ALTER TABLE `catag_menu` DISABLE KEYS */;
INSERT INTO `catag_menu` VALUES (0,'-Menu Padre-','#',NULL,0),(1,'Inicio','sistema','home',0),(2,'Configuración del sistema','usuarios','cog',0),(3,'Listado de Usuarios','usuarios','user',4),(4,'Roles','roles','user-secret',2),(5,'Menus','menu','list-alt',2),(6,'Parámetros Generales','parametros','briefcase',2),(31,'Mis Perfiles','misperfiles','th-list',2),(32,'Mis Usuarios','misusuarios','th-list',2),(33,'Usuarios','usuarios','user',2),(34,'Administracion','Administracion','list-alt',0),(35,'Acciones','acciones','tasks',34),(36,'Actividades','actividades','cog',34),(37,'Carteras','carteras','book-open',34),(38,'Gestores','gestores','user-plus',34),(39,'Promesas de pago','Promesas','user',34),(40,'Procesos','#','cogs',0),(41,'Empresa','Empresa','university',40),(42,'Importacion','import','arrow-alt-circle-up',40),(43,'Distribucion carteras','distribucion','check',40),(44,'Gestion de cobros','gestion-de-cobros','book',0),(45,'Busqueda','busqueda','search',44),(46,'Criterio','criterio',NULL,0),(47,'Gestion de cartera','cobros',NULL,44);
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
INSERT INTO `catag_menu_rol` VALUES (1,2),(1,4),(1,5),(1,6),(1,31),(1,32),(1,33),(1,34),(2,34),(1,35),(2,35),(1,36),(2,36),(1,37),(1,38),(1,39),(2,39),(1,40),(2,40),(1,42),(2,42),(1,44),(1,45),(1,46),(1,47);
/*!40000 ALTER TABLE `catag_menu_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catag_pagos`
--

DROP TABLE IF EXISTS `catag_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_pagos` (
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  `id_cliente` varchar(20) DEFAULT NULL,
  `id_operacion` varchar(20) NOT NULL,
  `abono` int(11) NOT NULL,
  `abono_dia` int(11) NOT NULL,
  `abono_mes` int(11) NOT NULL,
  `abono_año` int(11) NOT NULL,
  `saldo_total` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  KEY `codigo` (`codigo`),
  CONSTRAINT `catag_pagos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `catag_carteras` (`Cod_catera`),
  CONSTRAINT `fk_carteras` FOREIGN KEY (`codigo`) REFERENCES `catag_carteras` (`Cod_catera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_pagos`
--

LOCK TABLES `catag_pagos` WRITE;
/*!40000 ALTER TABLE `catag_pagos` DISABLE KEYS */;
INSERT INTO `catag_pagos` VALUES ('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'100264378','65100011454',100,24,7,2015,1007,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'100187224','65900012341',25,27,7,2015,1981,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'260482','55800005089',122,29,7,2015,124,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'960396','51200028846',17,7,7,2015,1587,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'100214197','51300004081',50,12,7,2015,862,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'100242191','65100006733',20,15,7,2015,1741,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'924956','21032017021',20,15,7,2015,455,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'100146079','65900009761',100,16,7,2015,183,'cartera unicomer'),('2020-08-29 02:11:03','admin','0000-00-00 00:00:00',NULL,'100274040','62300001657',31,23,7,2015,859,'cartera unicomer');
/*!40000 ALTER TABLE `catag_pagos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_parametros`
--

LOCK TABLES `catag_parametros` WRITE;
/*!40000 ALTER TABLE `catag_parametros` DISABLE KEYS */;
INSERT INTO `catag_parametros` VALUES (1,'nombre_empresa','wqeqeqe','Potosi, S.A. de C.V.'),(2,'version_aplicativo',NULL,'2.0'),(3,'abrev_nombre_empresa','Nombre de la empresa','Empresa Potosi'),(4,'ruta_perfiles','','asset/images/perfiles/'),(5,'ruta_logo','Guardar la ruta del logo','asset/images/logo/');
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
-- Table structure for table `catag_promesa_pago`
--

DROP TABLE IF EXISTS `catag_promesa_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catag_promesa_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(40) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `modificado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_promesa_pago`
--

LOCK TABLES `catag_promesa_pago` WRITE;
/*!40000 ALTER TABLE `catag_promesa_pago` DISABLE KEYS */;
INSERT INTO `catag_promesa_pago` VALUES (1,'Con acuerdo','determina que se hizo un cambio de fecha','2020-09-25 06:28:57','admin',NULL,'0000-00-00 00:00:00'),(2,'Nueva','Determina que hay nueva promesa de pago','2020-09-25 06:30:37','admin',NULL,'0000-00-00 00:00:00'),(3,'Incumplida','Determina que  una promesa de pagos se r','2020-09-25 06:31:03','admin',NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `catag_promesa_pago` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_roles`
--

LOCK TABLES `catag_roles` WRITE;
/*!40000 ALTER TABLE `catag_roles` DISABLE KEYS */;
INSERT INTO `catag_roles` VALUES (1,'Administrador','S'),(2,'Asistente','Solo asiste');
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
  `Estado` int(11) NOT NULL,
  `Actividad` int(11) NOT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cod_sub`),
  UNIQUE KEY `Subactividad` (`Subactividad`),
  KEY `Estado` (`Estado`),
  KEY `Actividad` (`Actividad`),
  CONSTRAINT `catag_sub_actividades_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `catag_estados` (`Cod_estado`),
  CONSTRAINT `catag_sub_actividades_ibfk_2` FOREIGN KEY (`Actividad`) REFERENCES `catag_actividades` (`Cod_act`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_sub_actividades`
--

LOCK TABLES `catag_sub_actividades` WRITE;
/*!40000 ALTER TABLE `catag_sub_actividades` DISABLE KEYS */;
INSERT INTO `catag_sub_actividades` VALUES (1,'En Casa',1,10,'2020-09-26 12:38:08',NULL,'0000-00-00 00:00:00',NULL),(2,'En trabajo',1,10,'2020-09-26 12:38:27',NULL,'0000-00-00 00:00:00',NULL),(3,'En gestion',1,10,'2020-09-26 12:38:33',NULL,'0000-00-00 00:00:00',NULL),(4,'Renuentes',1,10,'2020-09-26 12:38:53',NULL,'0000-00-00 00:00:00',NULL),(5,'Con familiar',1,10,'2020-09-26 12:39:01',NULL,'0000-00-00 00:00:00',NULL),(6,'Con terceros',1,10,'2020-09-26 12:39:12',NULL,'0000-00-00 00:00:00',NULL),(7,'Con aval',1,10,'2020-09-26 12:39:17',NULL,'0000-00-00 00:00:00',NULL),(8,'Fallecidos',1,10,'2020-09-26 12:39:29',NULL,'0000-00-00 00:00:00',NULL),(9,'Fuera de lugar',1,10,'2020-09-26 12:39:37',NULL,'0000-00-00 00:00:00',NULL),(10,'Con acuerdo',1,11,'2020-09-26 12:40:39',NULL,'0000-00-00 00:00:00',NULL),(11,'Nueva',1,11,'2020-09-26 12:40:48',NULL,'0000-00-00 00:00:00',NULL),(12,'Incumplida',1,11,'2020-09-26 12:40:57',NULL,'0000-00-00 00:00:00',NULL),(13,'Busqueda',1,12,'2020-09-26 12:41:14',NULL,'0000-00-00 00:00:00',NULL),(14,'Cambio de domicilio',1,12,'2020-09-26 12:41:22',NULL,'0000-00-00 00:00:00',NULL),(15,'Dirección deficiente',1,12,'2020-09-26 12:41:49',NULL,'0000-00-00 00:00:00',NULL),(16,'Zona de alto riesgo',1,12,'2020-09-26 12:42:00',NULL,'0000-00-00 00:00:00',NULL),(17,'En proceso de liquidación',1,13,'2020-09-26 12:43:20',NULL,'0000-00-00 00:00:00',NULL),(18,'Cancelada',1,13,'2020-09-26 12:43:32',NULL,'0000-00-00 00:00:00',NULL),(19,'Designada',1,13,'2020-09-26 12:43:39',NULL,'0000-00-00 00:00:00',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catag_usuarios`
--

LOCK TABLES `catag_usuarios` WRITE;
/*!40000 ALTER TABLE `catag_usuarios` DISABLE KEYS */;
INSERT INTO `catag_usuarios` VALUES (1,'admin','a696fb1d440bae8dda0a14413b1387f7bc7063670a5057ed3d93a95320d963407aae8deed6b31c13516f2f75a3592c21f0914d80c5adfa1272d08dedc09bdfe8VYSJKMAlpsympqt2YsbPVNZQ4Qn1mv3jX1a2k/k60eE=',1,'Administrador',1,1,'2020-09-26 09:40:37','1.jpg','admin','admin',3,100000,'web'),(7,'carlitos','a99f1841248885e63c443c106947cdf1a4e3851a2f530616bfabc2c825c07328b772f79df7dfd49345be302dcbe8cf70115fb8724ab93b3ca0bcb434e380de50ETyZ+3Q62OJFuHH8HsyXNpz2jRHjzpNhv36lARzbANs=',2,'Guillermo',0,2,NULL,'no.png',NULL,NULL,0,0,'web'),(8,'arnold','0f6e1847c5c12c4ba4075ad769dbf5ef0e666c8890c27f6b79155c943ac762fc027d96c936d61e987d5b4d3225b2db510c58a1e1d1c83afebf68411fe328307fB5hmnw/kis5jd1pkVi66T9Aa3YxD/jbPhDIY0CWc0iI=',2,'Karlos perez',0,2,'2020-08-26 00:29:14','8.jpg',NULL,NULL,0,0,'web');
/*!40000 ALTER TABLE `catag_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientemx`
--

DROP TABLE IF EXISTS `clientemx`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientemx` (
  `Cod_cliente` varchar(40) NOT NULL,
  `Cod_empresa` int(11) NOT NULL,
  `Nombre_cliente` varchar(40) DEFAULT NULL,
  `tel1` varchar(20) DEFAULT NULL,
  `tel2` varchar(20) DEFAULT NULL,
  `tel3` varchar(20) DEFAULT NULL,
  `Direccion_domicilio` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientemx`
--

LOCK TABLES `clientemx` WRITE;
/*!40000 ALTER TABLE `clientemx` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientemx` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_promesa_pago`
--

DROP TABLE IF EXISTS `detalle_promesa_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_promesa_pago` (
  `Cod_cliente` varchar(40) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `Gestor` varchar(40) DEFAULT NULL,
  `Monto_empresa` decimal(8,2) DEFAULT NULL,
  `F_ingreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `F_pago` date DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(40) DEFAULT NULL,
  `fecha_de_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(40) DEFAULT NULL,
  KEY `FK_Codcliente` (`Cod_cliente`),
  KEY `FK_Idestado` (`id_estado`),
  KEY `FK_Gestor` (`Gestor`),
  CONSTRAINT `FK_Codcliente` FOREIGN KEY (`Cod_cliente`) REFERENCES `catag_cliente` (`Cod_cliente`),
  CONSTRAINT `FK_Gestor` FOREIGN KEY (`Gestor`) REFERENCES `catag_gestores` (`Cod_Gestores`),
  CONSTRAINT `FK_Idestado` FOREIGN KEY (`id_estado`) REFERENCES `catag_promesa_pago` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_promesa_pago`
--

LOCK TABLES `detalle_promesa_pago` WRITE;
/*!40000 ALTER TABLE `detalle_promesa_pago` DISABLE KEYS */;
INSERT INTO `detalle_promesa_pago` VALUES ('126',1,'buzon',8920.60,'2020-09-26 10:49:54','2021-01-01','2020-09-26 16:49:54','admin','0000-00-00 00:00:00',NULL),('66',1,'batacon',89.36,'2020-09-26 11:04:29','2020-10-26','2020-09-26 17:04:29','admin','2020-09-26 17:04:52',NULL);
/*!40000 ALTER TABLE `detalle_promesa_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fechas`
--

DROP TABLE IF EXISTS `fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fechas` (
  `f` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fechas`
--

LOCK TABLES `fechas` WRITE;
/*!40000 ALTER TABLE `fechas` DISABLE KEYS */;
INSERT INTO `fechas` VALUES ('2020-10-20');
/*!40000 ALTER TABLE `fechas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_login`
--

LOCK TABLES `log_login` WRITE;
/*!40000 ALTER TABLE `log_login` DISABLE KEYS */;
INSERT INTO `log_login` VALUES (1,'admin','2020-02-22 20:18:05','::1','Chrome 79.0.3945.130   Windows 10',1),(2,'admin','2020-02-26 21:48:46','::1','Chrome 80.0.3987.122   Windows 10',1),(3,'admin','2020-05-07 11:44:51','::1','Chrome 81.0.4044.129   Windows 10',1),(4,'admin','2020-05-07 19:12:07','::1','Chrome 81.0.4044.129   Windows 10',1),(5,'admin','2020-05-07 19:20:01','::1','Chrome 81.0.4044.129   Windows 10',1),(6,'admin','2020-05-07 19:31:48','::1','Chrome 81.0.4044.129   Windows 10',1),(7,'admin','2020-05-07 19:33:51','::1','Chrome 81.0.4044.129   Windows 10',1),(8,'admin','2020-05-07 19:57:46','::1','Chrome 81.0.4044.129   Windows 10',1),(9,'admin','2020-05-07 21:07:14','::1','Chrome 81.0.4044.129   Windows 10',1),(10,'admin','2020-05-08 17:02:07','::1','Chrome 81.0.4044.138   Windows 10',1),(11,'admin','2020-05-11 16:57:53','::1','Chrome 81.0.4044.138   Windows 10',1),(12,'admin','2020-05-11 19:05:01','::1','Chrome 81.0.4044.138   Windows 10',1),(13,'admin','2020-05-11 19:09:36','::1','Chrome 81.0.4044.138   Windows 10',1),(14,'admin','2020-05-12 16:35:31','::1','Chrome 81.0.4044.138   Windows 10',1),(15,'admin','2020-05-12 17:20:33','::1','Chrome 81.0.4044.138   Windows 10',1),(16,'admin','2020-05-12 18:05:12','::1','Chrome 81.0.4044.138   Windows 10',1),(17,'admin','2020-05-12 18:14:47','::1','Chrome 81.0.4044.138   Windows 10',1),(18,'admin','2020-05-12 19:16:00','::1','Spartan 18.18362   Windows 10',1),(19,'admin','2020-05-12 20:36:38','::1','Chrome 81.0.4044.138   Windows 10',1),(20,'admin','2020-05-12 20:36:48','::1','Chrome 81.0.4044.138   Windows 10',1),(21,'admin','2020-05-13 11:01:23','::1','Chrome 81.0.4044.138   Windows 10',1),(22,'admin','2020-05-13 17:00:27','::1','Chrome 81.0.4044.138   Windows 10',1),(23,'admin','2020-05-13 17:12:47','::1','Safari 600.1.4  Apple iPhone iOS',1),(24,'admin','2020-05-13 17:39:04','::1','Chrome 81.0.4044.138   Windows 10',1),(25,'admin','2020-05-13 17:49:30','::1','Chrome 81.0.4044.138   Windows 10',1),(26,'admin','2020-05-13 17:50:49','::1','Chrome 81.0.4044.138   Windows 10',1),(27,'admin','2020-05-13 18:22:42','::1','Chrome 81.0.4044.138   Windows 10',1),(28,'admin','2020-05-13 18:29:03','::1','Chrome 81.0.4044.138   Windows 10',2),(29,'admin','2020-05-13 18:40:06','::1','Chrome 81.0.4044.138   Windows 10',1),(30,'pabblito','2020-05-13 18:41:59','::1','Chrome 81.0.4044.138   Windows 10',2),(31,'admin','2020-05-13 18:42:41','::1','Chrome 81.0.4044.138   Windows 10',1),(32,'admin','2020-05-13 19:57:36','::1','Chrome 81.0.4044.138   Windows 10',1),(33,'admin','2020-05-15 17:09:58','::1','Chrome 81.0.4044.138   Windows 10',1),(34,'admin','2020-05-15 23:41:03','::1','Chrome 81.0.4044.138   Windows 10',1),(35,'erick','2020-05-16 00:12:20','::1','Chrome 81.0.4044.138   Windows 10',3),(36,'admin','2020-05-16 00:28:02','::1','Chrome 81.0.4044.138   Windows 10',1),(37,'erick','2020-05-16 00:29:20','::1','Chrome 81.0.4044.138   Windows 10',3),(38,'admin','2020-05-16 00:29:33','::1','Chrome 81.0.4044.138   Windows 10',1),(39,'admin','2020-05-16 00:30:01','::1','Chrome 81.0.4044.138   Windows 10',1),(40,'erick','2020-05-16 00:30:16','::1','Chrome 81.0.4044.138   Windows 10',3),(41,'erick','2020-05-18 17:13:12','::1','Chrome 81.0.4044.138   Windows 10',3),(42,'admin','2020-05-18 17:14:11','::1','Chrome 81.0.4044.138   Windows 10',1),(43,'admin','2020-05-18 23:55:10','::1','Chrome 81.0.4044.138   Windows 10',1),(44,'admin','2020-05-19 18:53:43','::1','Chrome 81.0.4044.138   Windows 10',1),(45,'admin','2020-05-19 20:12:59','::1','Chrome 81.0.4044.138   Windows 10',1),(46,'admin','2020-05-19 20:17:20','::1','Chrome 81.0.4044.138   Windows 10',1),(47,'akana','2020-05-19 20:28:20','::1','Chrome 81.0.4044.138   Windows 10',6),(48,'akana','2020-05-19 23:43:47','::1','Chrome 81.0.4044.138   Windows 10',6),(49,'akana','2020-05-20 00:31:56','::1','Chrome 81.0.4044.138   Windows 10',6),(50,'akana','2020-05-20 18:14:37','::1','Chrome 81.0.4044.138   Windows 10',6),(51,'admin','2020-05-20 19:20:38','::1','Chrome 81.0.4044.138   Windows 10',1),(52,'admin','2020-05-20 23:56:42','::1','Chrome 81.0.4044.138   Windows 10',1),(53,'admin','2020-06-01 18:43:25','::1','Chrome 83.0.4103.61   Windows 10',1),(54,'admin','2020-06-02 00:21:14','::1','Chrome 83.0.4103.61   Windows 10',1),(55,'admin','2020-06-02 16:49:15','::1','Chrome 83.0.4103.61   Windows 10',1),(56,'admin','2020-06-02 20:04:25','::1','Chrome 83.0.4103.61   Windows 10',1),(57,'admin','2020-06-03 16:41:27','::1','Chrome 83.0.4103.61   Windows 10',1),(58,'admin','2020-06-03 16:48:05','::1','Chrome 83.0.4103.61   Windows 10',1),(59,'admin','2020-06-04 16:37:18','::1','Chrome 83.0.4103.61   Windows 10',1),(60,'admin','2020-06-04 23:59:41','::1','Chrome 83.0.4103.61   Windows 10',1),(61,'admin','2020-06-08 23:08:37','::1','Chrome 83.0.4103.61   Windows 10',1),(62,'admin','2020-06-09 23:17:32','::1','Chrome 83.0.4103.97   Windows 10',1),(63,'admin','2020-06-10 18:21:09','::1','Chrome 83.0.4103.97   Windows 10',1),(64,'admin','2020-06-12 17:04:55','::1','Chrome 83.0.4103.97   Windows 10',1),(65,'admin','2020-06-13 00:15:37','::1','Chrome 83.0.4103.97   Windows 10',1),(66,'admin','2020-06-14 10:02:51','::1','Chrome 83.0.4103.97   Windows 10',1),(67,'admin','2020-06-16 16:55:12','::1','Chrome 83.0.4103.97   Windows 10',1),(68,'admin','2020-06-17 08:40:00','::1','Chrome 83.0.4103.106   Windows 10',1),(69,'admin','2020-06-17 20:36:51','::1','Chrome 83.0.4103.106   Windows 10',1),(70,'admin','2020-06-17 21:23:22','::1','Chrome 83.0.4103.106   Windows 10',1),(71,'admin','2020-06-17 23:43:48','::1','Chrome 83.0.4103.106   Windows 10',1),(72,'admin','2020-06-18 00:32:15','::1','Chrome 83.0.4103.106   Windows 10',1),(73,'admin','2020-06-18 00:44:02','::1','Chrome 83.0.4103.106   Windows 10',1),(74,'admin','2020-06-18 16:58:07','::1','Chrome 83.0.4103.106   Windows 10',1),(75,'admin','2020-06-18 17:44:14','::1','Chrome 83.0.4103.106   Windows 10',1),(76,'admin','2020-06-18 17:48:21','::1','Chrome 83.0.4103.106   Windows 10',1),(77,'admin','2020-06-18 17:49:27','::1','Chrome 83.0.4103.106   Windows 10',1),(78,'admin','2020-06-18 17:53:16','::1','Spartan 18.18362   Windows 10',1),(79,'admin','2020-06-23 19:12:55','::1','Chrome 83.0.4103.106   Windows 10',1),(80,'admin','2020-06-23 19:12:55','::1','Chrome 83.0.4103.106   Windows 10',1),(81,'admin','2020-06-24 18:03:04','::1','Chrome 83.0.4103.116   Windows 10',1),(82,'admin','2020-06-26 09:13:07','::1','Chrome 83.0.4103.116   Windows 10',1),(83,'admin','2020-07-01 16:39:34','::1','Chrome 83.0.4103.116   Windows 10',1),(84,'admin','2020-08-15 09:55:10','::1','Chrome 84.0.4147.125   Windows 10',1),(85,'admin','2020-08-17 22:57:46','::1','Chrome 84.0.4147.125   Windows 10',1),(86,'admin','2020-08-18 14:31:03','::1','Chrome 84.0.4147.125   Windows 10',1),(87,'admin','2020-08-19 00:39:23','::1','Chrome 84.0.4147.125   Windows 10',1),(88,'admin','2020-08-18 21:40:48','::1','Chrome 84.0.4147.125   Windows 10',1),(89,'admin','2020-08-19 10:36:54','::1','Chrome 84.0.4147.135   Windows 10',1),(90,'arnold','2020-08-19 10:39:13','::1','Chrome 84.0.4147.135   Windows 10',8),(91,'admin','2020-08-19 10:41:18','::1','Chrome 84.0.4147.135   Windows 10',1),(92,'arnold','2020-08-19 11:12:03','::1','Chrome 84.0.4147.135   Windows 10',8),(93,'admin','2020-08-19 11:12:30','::1','Chrome 84.0.4147.135   Windows 10',1),(94,'admin','2020-08-19 16:07:35','::1','Chrome 84.0.4147.135   Windows 10',1),(95,'arnold','2020-08-19 23:42:37','::1','Chrome 84.0.4147.135   Windows 10',8),(96,'arnold','2020-08-21 10:16:34','::1','Chrome 84.0.4147.135   Windows 10',8),(97,'arnold','2020-08-21 17:39:30','::1','Chrome 84.0.4147.135   Windows 10',8),(98,'arnold','2020-08-25 16:02:54','::1','Chrome 84.0.4147.135   Windows 10',8),(99,'arnold','2020-08-26 00:29:14','::1','Chrome 84.0.4147.135   Windows 10',8),(100,'admin','2020-08-26 00:34:19','::1','Chrome 84.0.4147.135   Windows 10',1),(101,'admin','2020-08-26 10:47:47','::1','Chrome 84.0.4147.135   Windows 10',1),(102,'admin','2020-08-26 16:34:49','::1','Chrome 84.0.4147.135   Windows 10',1),(103,'admin','2020-08-28 19:00:06','::1','Chrome 84.0.4147.135   Windows 10',1),(104,'admin','2020-09-03 18:05:50','::1','Chrome 85.0.4183.83   Windows 10',1),(105,'admin','2020-09-04 21:00:01','::1','Chrome 85.0.4183.83   Windows 10',1),(106,'admin','2020-09-04 21:05:12','::1','Chrome 85.0.4183.83   Windows 10',1),(107,'admin','2020-09-16 02:23:19','::1','Chrome 85.0.4183.102   Windows 10',1),(108,'admin','2020-09-15 23:57:34','::1','Chrome 85.0.4183.102   Windows 10',1),(109,'admin','2020-09-16 00:14:48','::1','Chrome 85.0.4183.102   Windows 10',1),(110,'admin','2020-09-16 00:32:48','::1','Chrome 85.0.4183.102   Windows 10',1),(111,'admin','2020-09-16 00:36:08','::1','Chrome 85.0.4183.102   Windows 10',1),(112,'admin','2020-09-16 00:37:36','::1','Chrome 85.0.4183.102   Windows 10',1),(113,'admin','2020-09-16 00:49:04','::1','Chrome 85.0.4183.102   Windows 10',1),(114,'admin','2020-09-16 02:55:17','::1','Chrome 85.0.4183.102   Windows 10',1),(115,'admin','2020-09-16 08:30:43','::1','Chrome 85.0.4183.102   Windows 10',1),(116,'admin','2020-09-16 08:32:14','::1','Chrome 85.0.4183.102   Windows 10',1),(117,'admin','2020-09-16 18:02:33','::1','Chrome 85.0.4183.102   Windows 10',1),(118,'admin','2020-09-16 18:03:40','::1','Chrome 85.0.4183.102   Windows 10',1),(119,'admin','2020-09-16 18:42:51','::1','Chrome 85.0.4183.102   Windows 10',1),(120,'admin','2020-09-16 19:06:53','::1','Chrome 85.0.4183.102   Windows 10',1),(121,'admin','2020-09-16 21:16:38','::1','Chrome 85.0.4183.102   Windows 10',1),(122,'admin','2020-09-16 23:36:37','::1','Chrome 85.0.4183.102   Windows 10',1),(123,'admin','2020-09-16 23:50:58','::1','Chrome 85.0.4183.102   Windows 10',1),(124,'admin','2020-09-17 00:46:32','::1','Chrome 85.0.4183.102   Windows 10',1),(125,'admin','2020-09-17 08:53:39','::1','Chrome 85.0.4183.102   Windows 10',1),(126,'admin','2020-09-17 08:56:00','::1','Chrome 85.0.4183.102   Windows 10',1),(127,'admin','2020-09-17 09:04:11','::1','Chrome 85.0.4183.102   Windows 10',1),(128,'admin','2020-09-17 09:08:48','::1','Chrome 85.0.4183.102   Windows 10',1),(129,'admin','2020-09-17 09:43:57','::1','Chrome 85.0.4183.102   Windows 10',1),(130,'admin','2020-09-17 10:41:42','::1','Chrome 85.0.4183.102   Windows 10',1),(131,'admin','2020-09-17 10:57:02','::1','Chrome 85.0.4183.102   Windows 10',1),(132,'admin','2020-09-18 22:00:58','::1','Chrome 85.0.4183.102   Windows 10',1),(133,'admin','2020-09-18 22:31:25','::1','Chrome 85.0.4183.102   Windows 10',1),(134,'admin','2020-09-22 23:40:48','::1','Chrome 85.0.4183.102   Windows 10',1),(135,'admin','2020-09-22 23:47:22','::1','Chrome 85.0.4183.102   Windows 10',1),(136,'admin','2020-09-23 00:10:48','::1','Chrome 85.0.4183.102   Windows 10',1),(137,'admin','2020-09-24 08:48:17','::1','Chrome 85.0.4183.121   Windows 10',1),(138,'admin','2020-09-24 10:58:29','::1','Chrome 85.0.4183.121   Windows 10',1),(139,'admin','2020-09-24 14:29:04','::1','Chrome 85.0.4183.121   Windows 10',1),(140,'admin','2020-09-24 18:27:15','::1','Chrome 85.0.4183.121   Windows 10',1),(141,'admin','2020-09-25 00:06:55','::1','Chrome 85.0.4183.121   Windows 10',1),(142,'admin','2020-09-25 09:18:27','::1','Chrome 85.0.4183.121   Windows 10',1),(143,'admin','2020-09-25 11:08:04','::1','Chrome 85.0.4183.121   Windows 10',1),(144,'admin','2020-09-25 12:08:43','::1','Chrome 85.0.4183.121   Windows 10',1),(145,'admin','2020-09-25 15:50:51','::1','Chrome 85.0.4183.121   Windows 10',1),(146,'admin','2020-09-25 21:56:12','::1','Chrome 85.0.4183.121   Windows 10',1),(147,'admin','2020-09-26 06:24:06','::1','Chrome 85.0.4183.121   Windows 10',1),(148,'admin','2020-09-26 09:08:47','::1','Chrome 85.0.4183.121   Windows 10',1),(149,'admin','2020-09-26 09:23:24','::1','Chrome 85.0.4183.121   Windows 10',1),(150,'admin','2020-09-26 09:40:37','::1','Chrome 85.0.4183.121   Windows 10',1);
/*!40000 ALTER TABLE `log_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logo_empresa`
--

DROP TABLE IF EXISTS `logo_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logo_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Logo_empresa` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logo_empresa`
--

LOCK TABLES `logo_empresa` WRITE;
/*!40000 ALTER TABLE `logo_empresa` DISABLE KEYS */;
INSERT INTO `logo_empresa` VALUES (1,'Logo-empresa.png');
/*!40000 ALTER TABLE `logo_empresa` ENABLE KEYS */;
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
-- Table structure for table `pruebat2`
--

DROP TABLE IF EXISTS `pruebat2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pruebat2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `h_modify` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pruebat2`
--

LOCK TABLES `pruebat2` WRITE;
/*!40000 ALTER TABLE `pruebat2` DISABLE KEYS */;
INSERT INTO `pruebat2` VALUES (1,'2020-06-05 00:13:36','0000-00-00 00:00:00','gmerino710@gmail.com','Marco'),(2,'2020-06-05 00:13:36','0000-00-00 00:00:00','gmerino711@gmail.com','Pedro'),(3,'2020-06-05 00:13:36','2020-06-05 00:41:32','gmerino712@gmail.com','CorcipCorcio');
/*!40000 ALTER TABLE `pruebat2` ENABLE KEYS */;
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
-- Dumping events for database 'proyecto_vacio'
--

--
-- Dumping routines for database 'proyecto_vacio'
--
/*!50003 DROP PROCEDURE IF EXISTS `insertar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar`(Nombre varchar(40))
BEGIN
declare codigo char(1);
set @cody := 'p';
insert into prueba (nombre)values (Nombre);
	


Set @code_auto :=(
SELECT
    CONCAT(@cody, LPAD(id, 4, '0')) codigo
    FROM
    prueba order by codigo desc limit 1);

select @code_auto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `all_promesas`
--

/*!50001 DROP TABLE IF EXISTS `all_promesas`*/;
/*!50001 DROP VIEW IF EXISTS `all_promesas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_promesas` AS select `cl`.`Cod_cliente` AS `Cod_cliente`,`cl`.`Dui` AS `Dui`,`cl`.`Nombre_cliente` AS `Nombre_cliente`,`dpp`.`F_ingreso` AS `F_ingreso`,`dpp`.`Monto_empresa` AS `Monto_empresa`,`dpp`.`F_pago` AS `F_pago`,`cpp`.`Estado` AS `Estado de promesa`,`gt`.`Cod_Gestores` AS `Cod_Gestores` from (((`detalle_promesa_pago` `dpp` join `catag_promesa_pago` `cpp` on((`cpp`.`id` = `dpp`.`id_estado`))) join `catag_cliente` `cl` on((`cl`.`Cod_cliente` = `dpp`.`Cod_cliente`))) join `catag_gestores` `gt` on((`gt`.`Cod_Gestores` = `dpp`.`Gestor`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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

-- Dump completed on 2020-09-26 11:09:38
