-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: recepcao
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `modalidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Saude 2','presencial'),(2,'Saude','ead'),(4,'Beleza','presencial'),(5,'Beleza','ead'),(7,'Informatica','presencial'),(8,'Informatica','ead'),(9,'Informatica','semi-presencial'),(12,'Administrativo 2','hibrido'),(25,'Administracao','hibrido');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `dtIni` date DEFAULT NULL,
  `dtFim` date DEFAULT NULL,
  `cargaHoraria` int(11) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Cuidador de Idosos','2022-10-15','2022-11-15',40,15,1),(2,'Cuidador de Idosos','2022-10-15','2022-11-15',40,15,2),(3,'Informatica Basica','2022-09-30','2022-10-15',30,15,7),(4,'Informatica Basica','2022-09-20','2022-10-10',15,15,9),(5,'Excel','2022-10-10','2022-10-30',20,60,8),(8,'Cuidador de CrianÃ§as','2022-10-10','2022-10-20',10,20,1),(9,'Programador de Sistemas','2022-10-15','2022-10-30',200,15,7),(13,'Maquiagem','2022-10-20','2022-11-10',10,15,4),(15,'Excel AvanÃ§ado','2022-10-15','2022-11-05',20,15,8),(17,'PrÃ¡tica CirurgÃ­ca de Catarata','2022-10-10','2022-11-10',5,100,2),(21,'SeguranÃ§a da Info','2020-01-30','2021-01-10',50,50,7),(22,'SeguranÃ§a de Escritorio','2022-10-24','2022-10-26',50,100,25);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursosinteressados`
--

DROP TABLE IF EXISTS `cursosinteressados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursosinteressados` (
  `cursos_id` int(11) NOT NULL,
  `interessados_id` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`interessados_id`),
  KEY `interessados_id` (`interessados_id`),
  CONSTRAINT `cursosinteressados_ibfk_1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `cursosinteressados_ibfk_2` FOREIGN KEY (`interessados_id`) REFERENCES `interessados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursosinteressados`
--

LOCK TABLES `cursosinteressados` WRITE;
/*!40000 ALTER TABLE `cursosinteressados` DISABLE KEYS */;
INSERT INTO `cursosinteressados` VALUES (1,1),(1,2),(2,2),(3,2),(5,1),(5,2),(13,1);
/*!40000 ALTER TABLE `cursosinteressados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interessados`
--

DROP TABLE IF EXISTS `interessados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interessados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contato` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `escolaridade` varchar(100) DEFAULT NULL,
  `dtNasc` date DEFAULT NULL,
  `tpcontato` varchar(20) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interessados`
--

LOCK TABLES `interessados` WRITE;
/*!40000 ALTER TABLE `interessados` DISABLE KEYS */;
INSERT INTO `interessados` VALUES (1,'87999999999','walter@gmail.com','técnico','2001-10-10','whatsapp','Walter'),(2,'8799998888','laura@gmail.com','técnico','2000-01-01','whatsapp','Laura');
/*!40000 ALTER TABLE `interessados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'jean','Jean Elder Santana Araujo','123456');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-24 11:56:12
