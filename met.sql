-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: pae
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `agendamiento_pacientes`
--

DROP TABLE IF EXISTS `agendamiento_pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendamiento_pacientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `consulta_id` bigint(20) unsigned NOT NULL,
  `bloque_id` bigint(20) unsigned NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendamiento_pacientes_paciente_id_foreign` (`consulta_id`),
  KEY `agendamiento_pacientes_bloques_bloque_id_foreign` (`bloque_id`)
) ENGINE=MyISAM AUTO_INCREMENT=465 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamiento_pacientes`
--

LOCK TABLES `agendamiento_pacientes` WRITE;
/*!40000 ALTER TABLE `agendamiento_pacientes` DISABLE KEYS */;
INSERT INTO `agendamiento_pacientes` VALUES (464,44,5,'2020-05-30 00:00:00');
/*!40000 ALTER TABLE `agendamiento_pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloques`
--

DROP TABLE IF EXISTS `bloques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloques` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bloque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL,
  `hora_inicio` int(11) DEFAULT NULL,
  `hora_fin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloques`
--

LOCK TABLES `bloques` WRITE;
/*!40000 ALTER TABLE `bloques` DISABLE KEYS */;
INSERT INTO `bloques` VALUES (1,'8:00  a 11:00 Hrs','semana',20,800,1100),(2,'11:00 a 14:00 Hrs','semana',20,1100,1400),(3,'14:00 a 17:00 Hrs','semana',20,1400,1700),(4,'17:00 a 20:00 Hrs','semana',20,1700,2000),(5,'9:00  a 14:00 Hrs','sábado',20,900,1400);
/*!40000 ALTER TABLE `bloques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargas_isapre`
--

DROP TABLE IF EXISTS `cargas_isapre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargas_isapre` (
  `ISAPRE` int(11) DEFAULT NULL,
  `RUT_AFILIADO` varchar(12) DEFAULT NULL,
  `RUT_CARGA` varchar(12) DEFAULT NULL,
  `NOMBRES` varchar(255) DEFAULT NULL,
  `AP_PATERNO` varchar(255) DEFAULT NULL,
  `AP_MATERNO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargas_isapre`
--

LOCK TABLES `cargas_isapre` WRITE;
/*!40000 ALTER TABLE `cargas_isapre` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargas_isapre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunas`
--

DROP TABLE IF EXISTS `comunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comunas` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `comuna` varchar(255) DEFAULT NULL,
  `padre` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunas`
--

LOCK TABLES `comunas` WRITE;
/*!40000 ALTER TABLE `comunas` DISABLE KEYS */;
INSERT INTO `comunas` VALUES (346,'ALTO HOSPICIO',1),(296,'CAMINA',1),(297,'COLCHANE',1),(3,'HUARA',1),(2,'IQUIQUE',1),(4,'PICA',1),(5,'POZO ALMONTE',1),(7,'ANTOFAGASTA',2),(10,'CALAMA',2),(298,'MARIA ELENA',2),(8,'MEJILLONES',2),(300,'OLLAGE',2),(301,'SAN PEDRO DE ATACAMA',2),(299,'SIERRA GORDA',2),(9,'TALTAL',2),(6,'TOCOPILLA',2),(302,'ALTO DEL CARMEN',3),(14,'CALDERA',3),(11,'CHAÑARAL',3),(13,'COPIAPO',3),(12,'DIEGO DE ALMAGRO',3),(17,'FREIRINA',3),(18,'HUASCO',3),(15,'TIERRA AMARILLA',3),(16,'VALLENAR',3),(22,'ANDACOLLO',4),(31,'CANELA',4),(29,'COMBARBALA',4),(21,'COQUIMBO',4),(30,'ILLAPEL',4),(20,'LA HIGUERA',4),(19,'LA SERENA',4),(33,'LOS VILOS',4),(26,'MONTE PATRIA',4),(25,'OVALLE',4),(24,'PAIHUANO',4),(27,'PUNITAQUI',4),(28,'RIO HURTADO',4),(32,'SALAMANCA',4),(23,'VICUÑA',4),(44,'ALGARROBO',5),(56,'CABILDO',5),(67,'CALLE LARGA',5),(46,'CARTAGENA',5),(40,'CASABLANCA',5),(63,'CATEMU',5),(340,'CONCON',5),(45,'EL QUISCO',5),(47,'EL TABO',5),(51,'HIJUELAS',5),(41,'ISLA DE PASCUA',5),(321,'JUAN FERNANDEZ',5),(50,'LA CALERA',5),(49,'LA CRUZ',5),(59,'LA LIGUA',5),(53,'LIMACHE',5),(65,'LLAY LLAY',5),(66,'LOS ANDES',5),(52,'NOGALES',5),(54,'OLMUE',5),(62,'PANQUEHUE',5),(57,'PAPUDO',5),(55,'PETORCA',5),(36,'PUCHUNCAVI',5),(61,'PUTAENDO',5),(48,'QUILLOTA',5),(38,'QUILPUE',5),(35,'QUINTERO',5),(68,'RINCONADA',5),(42,'SAN ANTONIO',5),(69,'SAN ESTEBAN',5),(60,'SAN FELIPE',5),(64,'SANTA MARIA',5),(43,'SANTO DOMINGO',5),(34,'VALPARAISO',5),(39,'VILLA ALEMANA',5),(37,'VIÑA DEL MAR',5),(58,'ZAPALLAR',5),(132,'CHEPICA',6),(125,'CHIMBARONGO',6),(110,'CODEGUA',6),(114,'COINCO',6),(113,'COLTAUCO',6),(112,'DOÑIHUE',6),(107,'GRANEROS',6),(139,'LA ESTRELLA',6),(116,'LAS CABRAS',6),(136,'LITUECHE',6),(129,'LOLOL',6),(106,'MACHALI',6),(122,'MALLOA',6),(134,'MARCHIGUE',6),(126,'NANCAGUA',6),(138,'NAVIDAD',6),(120,'OLIVAR',6),(130,'PALMILLA',6),(133,'PAREDONES',6),(131,'PERALILLO',6),(115,'PEUMO',6),(118,'PICHIDEGUA',6),(137,'PICHILEMU',6),(127,'PLACILLA',6),(135,'PUMANQUE',6),(123,'QUINTA DE TILCOCO',6),(105,'RANCAGUA',6),(121,'RENGO',6),(119,'REQUINOA',6),(124,'SAN FERNANDO',6),(111,'SAN FRANCISCO DE MOSTAZAL',6),(117,'SAN VICENTE',6),(128,'SANTA CRUZ',6),(166,'CAUQUENES',7),(167,'CHANCO',7),(161,'COLBUN',7),(157,'CONSTITUCION',7),(155,'CUREPTO',7),(140,'CURICO',7),(158,'EMPEDRADO',7),(144,'HUALAÑE',7),(145,'LICANTEN',7),(159,'LINARES',7),(162,'LONGAVI',7),(154,'MAULE',7),(147,'MOLINA',7),(164,'PARRAL',7),(152,'PELARCO',7),(320,'PELLUHUE',7),(153,'PENCAHUE',7),(143,'RAUCO',7),(165,'RETIRO',7),(149,'RIO CLARO',7),(141,'ROMERAL',7),(148,'SAGRADA FAMILIA',7),(151,'SAN CLEMENTE',7),(156,'SAN JAVIER',7),(341,'SAN RAFAEL',7),(150,'TALCA',7),(142,'TENO',7),(146,'VICHUQUEN',7),(163,'VILLA ALEGRE',7),(160,'YERBAS BUENAS',7),(303,'ANTUCO',8),(198,'ARAUCO',8),(180,'BULNES',8),(208,'CABRERO',8),(201,'CAÑETE',8),(344,'CHIGUAYANTE',8),(168,'CHILLAN',8),(342,'CHILLAN VIEJO',8),(175,'COBQUECURA',8),(186,'COELEMU',8),(170,'COIHUECO',8),(188,'CONCEPCION',8),(202,'CONTULMO',8),(194,'CORONEL',8),(197,'CURANILAHUE',8),(185,'EL CARMEN',8),(193,'FLORIDA',8),(192,'HUALQUI',8),(210,'LAJA',8),(199,'LEBU',8),(200,'LOS ALAMOS',8),(204,'LOS ANGELES',8),(195,'LOTA',8),(214,'MULCHEN',8),(212,'NACIMIENTO',8),(213,'NEGRETE',8),(174,'NINHUE',8),(184,'PEMUCO',8),(191,'PENCO',8),(169,'PINTO',8),(171,'PORTEZUELO',8),(215,'QUILACO',8),(206,'QUILLECO',8),(182,'QUILLON',8),(172,'QUIRIHUE',8),(187,'RANQUIL',8),(176,'SAN CARLOS',8),(178,'SAN FABIAN',8),(177,'SAN GREGORIO DE ÑIQUEN',8),(181,'SAN IGNACIO',8),(179,'SAN NICOLAS',8),(343,'SAN PEDRO DE LA PAZ',8),(211,'SAN ROSENDO',8),(205,'SANTA BARBARA',8),(196,'SANTA JUANA',8),(189,'TALCAHUANO',8),(203,'TIRUA',8),(190,'TOME',8),(173,'TREHUACO',8),(209,'TUCAPEL',8),(207,'YUMBEL',8),(183,'YUNGAY',8),(216,'ANGOL',9),(235,'CARAHUE',9),(220,'COLLIPULLI',9),(230,'CUNCO',9),(225,'CURACAUTIN',9),(305,'CURARREHUE',9),(221,'ERCILLA',9),(229,'FREIRE',9),(232,'GALVARINO',9),(238,'GORBEA',9),(231,'LAUTARO',9),(240,'LONCOCHE',9),(226,'LONQUIMAY',9),(218,'LOS SAUCES',9),(223,'LUMACO',9),(304,'MELIPEUCO',9),(234,'NUEVA IMPERIAL',9),(345,'PADRE LAS CASAS',9),(233,'PERQUENCO',9),(237,'PITRUFQUEN',9),(242,'PUCON',9),(236,'PUERTO SAAVEDRA',9),(217,'PUREN',9),(219,'RENAICO',9),(227,'TEMUCO',9),(306,'TEODORO SCHMIDT',9),(239,'TOLTEN',9),(222,'TRAIGUEN',9),(224,'VICTORIA',9),(228,'VILCUN',9),(241,'VILLARRICA',9),(277,'ANCUD',10),(265,'CALBUCO',10),(270,'CASTRO',10),(280,'CHAITEN',10),(271,'CHONCHI',10),(262,'COCHAMO',10),(276,'CURACO DE VELEZ',10),(279,'DALCAHUE',10),(268,'FRESIA',10),(269,'FRUTILLAR',10),(281,'FUTALEUFU',10),(308,'HUALAIHUE',10),(267,'LLANQUIHUE',10),(264,'LOS MUERMOS',10),(263,'MAULLIN',10),(255,'OSORNO',10),(282,'PALENA',10),(261,'PUERTO MONTT',10),(258,'PUERTO OCTAY',10),(266,'PUERTO VARAS',10),(274,'PUQUELDON',10),(260,'PURRANQUE',10),(256,'PUYEHUE',10),(272,'QUEILEN',10),(273,'QUELLON',10),(278,'QUEMCHI',10),(275,'QUINCHAO',10),(259,'RIO NEGRO',10),(307,'SAN JUAN DE LA COSTA',10),(257,'SAN PABLO',10),(285,'AYSEN',11),(287,'CHILE CHICO',11),(286,'CISNES',11),(289,'COCHRANE',11),(284,'COYHAIQUE',11),(309,'GUAITECAS',11),(312,'LAGO VERDE',11),(310,'O\'HIGGINS',11),(288,'RIO IBAÑEZ',11),(311,'TORTEL',11),(316,'LAGUNA BLANCA',12),(319,'NAVARINO',12),(292,'PORVENIR',12),(317,'PRIMAVERA',12),(291,'PUERTO NATALES',12),(290,'PUNTA ARENAS',12),(314,'RIO VERDE',12),(315,'SAN GREGORIO',12),(318,'TIMAUKEL',12),(313,'TORRES DEL PAINE',12),(109,'ALHUE',13),(103,'BUIN',13),(99,'CALERA DE TANGO',13),(333,'CERRILLOS',13),(324,'CERRO NAVIA',13),(76,'COLINA',13),(75,'CONCHALI',13),(83,'CURACAVI',13),(338,'EL BOSQUE',13),(89,'EL MONTE',13),(328,'ESTACION CENTRAL',13),(334,'HUECHURABA',13),(330,'INDEPENDENCIA',13),(87,'ISLA DE MAIPO',13),(96,'LA CISTERNA',13),(93,'LA FLORIDA',13),(97,'LA GRANJA',13),(327,'LA PINTANA',13),(92,'LA REINA',13),(78,'LAMPA',13),(71,'LAS CONDES',13),(332,'LO BARNECHEA',13),(337,'LO ESPEJO',13),(325,'LO PRADO',13),(323,'MACUL',13),(94,'MAIPU',13),(90,'MARIA PINTO',13),(88,'MELIPILLA',13),(91,'NUÑOA',13),(339,'PADRE HURTADO',13),(104,'PAINE',13),(336,'PEDRO AGUIRRE CERDA',13),(85,'PEÑAFLOR',13),(322,'PEÑALOLEN',13),(101,'PIRQUE',13),(72,'PROVIDENCIA',13),(82,'PUDAHUEL',13),(100,'PUENTE ALTO',13),(79,'QUILICURA',13),(81,'QUINTA NORMAL',13),(329,'RECOLETA',13),(77,'RENCA',13),(98,'SAN BERNARDO',13),(335,'SAN JOAQUIN',13),(102,'SAN JOSE DE MAIPO',13),(95,'SAN MIGUEL',13),(108,'SAN PEDRO',13),(326,'SAN RAMON',13),(70,'SANTIAGO CENTRO',13),(73,'SANTIAGO OESTE',13),(84,'SANTIAGO SUR',13),(86,'TALAGANTE',13),(80,'TIL-TIL',13),(331,'VITACURA',13),(244,'CORRAL',14),(248,'FUTRONO',14),(251,'LA UNION',14),(254,'LAGO RANCO',14),(249,'LANCO',14),(247,'LOS LAGOS',14),(246,'MAFIL',14),(245,'MARIQUINA',14),(243,'VALDIVIA',14),(250,'PANGUIPULLI',14),(252,'PAILLACO',14),(253,'RIO BUENO',14),(1,'ARICA',15),(295,'CAMARONES',15),(293,'GENERAL LAGOS',15),(294,'PUTRE',15);
/*!40000 ALTER TABLE `comunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condiciones_cierre`
--

DROP TABLE IF EXISTS `condiciones_cierre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condiciones_cierre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `condicion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condiciones_cierre`
--

LOCK TABLES `condiciones_cierre` WRITE;
/*!40000 ALTER TABLE `condiciones_cierre` DISABLE KEYS */;
INSERT INTO `condiciones_cierre` VALUES (1,'Alta Clínica: Cierre del caso por tener logrados los objetivos terapéuticos'),(2,'Abandono: Paciente opta por no recibir la orientación'),(3,'Derivación a GES/AUGE: Se deriva a red para seguir tratamiento por tener un problema de salud GES/AUGE'),(4,'Derivación a Red privada: Se deriva a red privada para seguir tratamiento según la previsión de salud del sujeto'),(5,'Cierre administrativo: No se puede contactar'),(6,'Requiere un 2do llamado de seguimiento'),(7,'Otros');
/*!40000 ALTER TABLE `condiciones_cierre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `paciente_id` bigint(20) unsigned NOT NULL,
  `motivo_consulta_id` bigint(20) unsigned NOT NULL,
  `estado_id` bigint(20) unsigned NOT NULL,
  `fecha_enviado` datetime DEFAULT NULL,
  `fecha_gestionado` datetime DEFAULT NULL,
  `fecha_cerrado` datetime DEFAULT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci,
  `comentario_cierre` longtext COLLATE utf8mb4_unicode_ci,
  `estado_cierre_id` bigint(20) unsigned DEFAULT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_emergencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_emergencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `explicacion_foco` longtext COLLATE utf8mb4_unicode_ci,
  `consideraciones` longtext COLLATE utf8mb4_unicode_ci,
  `confirma_mesa_ayuda` tinyint(1) DEFAULT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `cierre_caso_id` int(11) DEFAULT NULL,
  `otros` longtext COLLATE utf8mb4_unicode_ci,
  `responsable_cierre_id` int(11) DEFAULT NULL,
  `motivo_consultas_profesionales_id` int(11) DEFAULT NULL,
  `otros_profesional` longtext COLLATE utf8mb4_unicode_ci,
  `comentario_profesional` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `consultas_user_id_foreign` (`user_id`),
  KEY `consultas_paciente_id_foreign` (`paciente_id`),
  KEY `consultas_motivo_consulta_id_foreign` (`motivo_consulta_id`),
  KEY `consultas_estado_id_foreign` (`estado_id`),
  KEY `consultas_estado_cierre_id_foreign` (`estado_cierre_id`),
  CONSTRAINT `consultas_estado_cierre_id_foreign` FOREIGN KEY (`estado_cierre_id`) REFERENCES `estados_cierres` (`id`),
  CONSTRAINT `consultas_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  CONSTRAINT `consultas_motivo_consulta_id_foreign` FOREIGN KEY (`motivo_consulta_id`) REFERENCES `motivo_consultas` (`id`),
  CONSTRAINT `consultas_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `consultas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (44,NULL,49,1,3,'2020-05-26 15:32:59','2020-05-26 15:33:23','2020-05-27 14:36:43','Comentario paciente',NULL,2,NULL,'Marcello López','974163322',1,'2020-05-26 19:32:59','2020-05-27 18:36:43','Explicación prueba','Consideración de prueba',1,5,4,NULL,4,13,'otros profesional','comentario profesional');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(150) DEFAULT NULL,
  `ver` char(2) DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (0,'PSICOPEDAGOGIA','no'),(1,'PSIQUIATRÍA ADULTO','si'),(2,'PSICOLOGÍA ADULTO','si'),(3,'PSICOLOGÍA IST','no'),(4,'TERAPIA OCUPACIONAL','si'),(5,'NUTRICIÓN','si'),(6,'MEDICINA GENERAL','no'),(7,'PSICOPEDAGOGÍA','si'),(8,'PSICOLOGÍA INFANTO-JUVENIL','si'),(9,'PSICOLOGÍA ADOLESCENTE','no'),(10,'PSIQUIATRÍA INFANTO-JUVENIL','si'),(11,'ACUPUNTURA','no'),(12,'FONOAUDIOLOGÍA','si'),(13,'NEUROPSICOLOGÍA','si'),(14,'PSICOTERAPIA DE PAREJAS Y FAMILIAS\r\n','si'),(15,'MEDICO INTEGRAL','no'),(16,'MEDICO INTEGRAL','no'),(17,'TERAPIA FLORAL','no'),(18,'TERAPIA OCUPACIONAL ','no'),(19,'TEST DE BENDER','no'),(20,'TEST DE MMPI','no'),(21,'TEST DE RELACIONES OBJETÍVALES','no'),(22,'TEST DE RORSCHACH O SIMILAR','no'),(23,'TEST DE WESCHLER-WAIS- WISC','no'),(24,'TRAUMATOLOGÍA','no'),(25,'PSICOTERAPIA GRUPAL','no'),(26,'CONSULTA DE SALUD MENTAL POR OTROS PROFESIONALES','no'),(27,'NEUROFEEDBACK','si'),(28,'REALIDAD VIRTUAL','no'),(29,'ADOS-2','no'),(30,'SOFTWARE REALIDAD VIRTUAL','no'),(31,'KINESIOLOGÍA','no'),(32,'PROGRAMA DE ANSIEDAD Y FOBIA','si'),(33,'PROGRAMA PODER DE MUJER','no'),(34,'PROGRAMA DE NEUROCOGNICIÓN','no'),(35,'PROGRAMA YO TE CUIDO','si'),(36,'PROGRAMA DE ALIMENTACIÓN SALUDABLE Y PSICONUTRICIÓN','no');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Enviado','2020-04-25 18:37:16','2020-04-25 18:37:16'),(2,'En Gestión','2020-04-25 18:37:16','2020-04-25 18:37:16'),(3,'Cerrado','2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_cierres`
--

DROP TABLE IF EXISTS `estados_cierres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados_cierres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_cierres`
--

LOCK TABLES `estados_cierres` WRITE;
/*!40000 ALTER TABLE `estados_cierres` DISABLE KEYS */;
INSERT INTO `estados_cierres` VALUES (1,'Abierto','2020-04-25 18:37:16','2020-04-25 18:37:16'),(2,'Cerrado','2020-04-25 18:37:16','2020-04-25 18:37:16'),(3,'Paciente rechaza atención','2020-04-25 18:37:16','2020-04-25 18:37:16'),(4,'No contactabilidad','2020-04-25 18:37:16','2020-04-25 18:37:16'),(5,'Derivado','2020-04-25 18:37:16','2020-04-25 18:37:16'),(6,'Requiere segundo llamado','2020-04-25 18:37:16','2020-04-25 18:37:16'),(7,'Consultante no pertenece a isapres','2020-04-25 18:37:16','2020-04-25 18:37:16'),(8,'Derivado - Mesa de ayuda','2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `estados_cierres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feriado`
--

DROP TABLE IF EXISTS `feriado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feriado`
--

LOCK TABLES `feriado` WRITE;
/*!40000 ALTER TABLE `feriado` DISABLE KEYS */;
INSERT INTO `feriado` VALUES (1,'2014-01-01',NULL),(2,'2014-04-18',NULL),(3,'2014-04-19',NULL),(4,'2014-05-01',NULL),(5,'2014-05-21',NULL),(6,'2014-06-07',6),(7,'2014-08-15',NULL),(8,'2014-08-20',24),(9,'2014-09-08',7),(10,'2014-09-18',NULL),(11,'2014-09-19',NULL),(12,'2014-10-02',10),(13,'2014-10-12',NULL),(14,'2014-10-31',NULL),(15,'2014-11-01',NULL),(16,'2014-12-08',NULL),(17,'2014-12-25',NULL),(18,'2014-12-31',NULL),(19,'2015-01-01',NULL),(20,'2015-04-03',NULL),(21,'2015-04-04',NULL),(22,'2015-05-01',NULL),(23,'2015-05-21',NULL),(24,'2015-06-07',6),(25,'2015-08-15',NULL),(26,'2015-08-20',24),(27,'2015-09-08',NULL),(28,'2015-09-18',NULL),(29,'2015-09-19',NULL),(30,'2015-10-02',10),(31,'2015-10-12',NULL),(32,'2015-10-31',NULL),(33,'2015-11-01',NULL),(34,'2015-12-08',NULL),(35,'2015-12-25',NULL),(36,'2015-12-31',NULL),(37,'2016-01-01',NULL),(38,'2016-03-25',NULL),(39,'2016-03-26',NULL),(40,'2016-05-01',NULL),(41,'2016-05-21',NULL),(42,'2016-06-05',NULL),(43,'2016-06-27',NULL),(44,'2016-06-16',NULL),(45,'2016-08-15',NULL),(46,'2016-09-18',NULL),(47,'2016-09-19',NULL),(48,'2016-10-10',NULL),(49,'2016-10-23',NULL),(50,'2016-10-31',NULL),(51,'2016-11-01',NULL),(52,'2016-12-08',NULL),(53,'2016-12-25',NULL),(54,'2017-01-01',NULL),(55,'2017-01-02',NULL),(56,'2017-04-14',NULL),(57,'2017-04-15',NULL),(58,'2017-04-19',NULL),(59,'2017-05-01',NULL),(60,'2017-05-21',NULL),(61,'2017-06-26',NULL),(62,'2017-07-02',NULL),(63,'2017-07-16',NULL),(64,'2017-08-15',NULL),(65,'2017-09-18',NULL),(66,'2017-09-19',NULL),(67,'2017-10-09',NULL),(68,'2017-10-27',NULL),(69,'2017-11-01',NULL),(70,'2017-11-19',NULL),(71,'2017-12-08',NULL),(72,'2017-12-17',NULL),(73,'2017-12-25',NULL),(74,'2018-01-01',NULL),(75,'2018-03-30',NULL),(76,'2018-03-31',NULL),(77,'2018-05-01',NULL),(78,'2018-05-21',NULL),(79,'2018-07-02',NULL),(80,'2018-07-16',NULL),(81,'2018-08-15',NULL),(82,'2018-09-17',NULL),(83,'2018-09-18',NULL),(84,'2018-09-19',NULL),(85,'2018-10-15',NULL),(86,'2018-11-01',NULL),(87,'2018-11-02',NULL),(88,'2018-12-08',NULL),(89,'2018-12-25',NULL),(90,'2018-01-16',1),(91,'2018-12-31',NULL),(92,'2019-12-25',NULL),(93,'2020-01-01',NULL),(103,'2020-04-10',NULL),(104,'2020-04-11',NULL),(105,'2020-04-26',NULL),(106,'2020-05-01',NULL),(107,'2020-05-21',NULL),(108,'2020-06-07',NULL),(109,'2020-06-29',NULL),(110,'2020-07-16',NULL),(111,'2020-08-15',NULL),(112,'2020-09-18',NULL),(113,'2020-09-19',NULL),(114,'2020-10-12',NULL),(115,'2020-10-25',NULL),(116,'2020-10-31',NULL),(117,'2020-11-01',NULL),(118,'2020-12-08',NULL),(119,'2020-12-25',NULL);
/*!40000 ALTER TABLE `feriado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `isapre`
--

DROP TABLE IF EXISTS `isapre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `isapre` (
  `id` int(11) NOT NULL,
  `isapre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `isapre`
--

LOCK TABLES `isapre` WRITE;
/*!40000 ALTER TABLE `isapre` DISABLE KEYS */;
INSERT INTO `isapre` VALUES (0,'sin isapre'),(1,'Banmedica'),(2,'Vida Tres'),(3,'Cruz Blanca'),(4,'Colmena'),(5,'Mas Vida'),(6,'Fonasa'),(8,'Consalud'),(9,'Fundación'),(10,'Cruz del Norte'),(11,'Particular'),(12,'Achs'),(13,'Rio Blanco'),(14,'San Lorenzo'),(15,'Chuquicamata'),(16,'Fusat'),(17,'Codelco'),(20,'Del Cobre');
/*!40000 ALTER TABLE `isapre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_03_30_193750_create_roles_table',1),(4,'2020_03_30_194210_create_role_user_table',1),(5,'2020_03_30_200344_create_motivo_consultas_table',1),(6,'2020_03_30_201216_create_estados_table',1),(7,'2020_03_30_201216_create_pacientes_excel_table',1),(8,'2020_03_30_201216_create_pacientes_table',1),(9,'2020_04_25_133513_create_estados_cierres_table',1),(10,'2020_04_25_133514_create_consultas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivo_consultas`
--

DROP TABLE IF EXISTS `motivo_consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motivo_consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivo_consultas`
--

LOCK TABLES `motivo_consultas` WRITE;
/*!40000 ALTER TABLE `motivo_consultas` DISABLE KEYS */;
INSERT INTO `motivo_consultas` VALUES (1,'Psicología Adulto','2020-04-25 18:37:16','2020-04-25 18:37:16'),(2,'Psicología Infanto-Juvenil','2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `motivo_consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivo_consultas_profesionales`
--

DROP TABLE IF EXISTS `motivo_consultas_profesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motivo_consultas_profesionales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivo_consultas_profesionales`
--

LOCK TABLES `motivo_consultas_profesionales` WRITE;
/*!40000 ALTER TABLE `motivo_consultas_profesionales` DISABLE KEYS */;
INSERT INTO `motivo_consultas_profesionales` VALUES (3,'Problemas Familiares','2020-04-25 18:37:16','2020-04-25 18:37:16'),(4,'Problemas laborales','2020-04-25 18:37:16','2020-04-25 18:37:16'),(5,'Sintomatología Ansiosa/Angustia','2020-04-25 18:37:16','2020-04-25 18:37:16'),(6,'Estrés','2020-04-25 18:37:16','2020-04-25 18:37:16'),(7,'Crisis de pánico','2020-04-25 18:37:16','2020-04-25 18:37:16'),(8,'Consulta otra especialidad','2020-04-25 18:37:16','2020-04-25 18:37:16'),(9,'Paciente en tratamiento de Salud Mental','2020-04-25 18:37:16','2020-04-25 18:37:16'),(10,'Violencia intrafamiliar','2020-04-25 18:37:16','2020-04-25 18:37:16'),(11,'Síntoma depresivo','2020-04-25 18:37:16','2020-04-25 18:37:16'),(12,'Otros','2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `motivo_consultas_profesionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `comuna_id` int(11) DEFAULT NULL,
  `ubicacion_actual` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (49,'Marcello','López','Cáceres','16366326','974163322','974163322','mlc74163322@gmail.com',1,'2020-05-26 19:32:59','2020-05-26 20:24:21',33,48,'Dirección de prueba','M');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regiones`
--

DROP TABLE IF EXISTS `regiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `region` char(255) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regiones`
--

LOCK TABLES `regiones` WRITE;
/*!40000 ALTER TABLE `regiones` DISABLE KEYS */;
INSERT INTO `regiones` VALUES (14,'Región de Los Ríos',0,1),(13,'Región Metropolitana',0,1),(12,'Región de Magallanes y la Antártica Chilena',0,1),(11,'Región de Aysén del General Carlos Ibañez del Campo',0,1),(10,'Región de Los Lagos',0,1),(9,'Región de la Araucanía',0,1),(8,'Region del Bío-Bío',0,1),(7,'Región del Maule',0,1),(6,'Región del Libertador General Bernardo O Higgins',0,1),(5,'Región de Valparaiso',0,1),(4,'Región de Coquimbo',0,1),(3,'Región de Atacama',0,1),(2,'Región de Antofagasta',0,1),(1,'Región de Tarapacá',0,1),(15,'Región de Arica y Parinacota',0,1);
/*!40000 ALTER TABLE `regiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registroisapre`
--

DROP TABLE IF EXISTS `registroisapre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registroisapre` (
  `ISAPRE` varchar(255) DEFAULT NULL,
  `RUT_AFILIADO` double DEFAULT NULL,
  `NOMBRES` varchar(255) DEFAULT NULL,
  `AP_PATERNO` varchar(255) DEFAULT NULL,
  `AP_MATERNO` varchar(255) DEFAULT NULL,
  KEY `ind_isapre` (`ISAPRE`),
  KEY `ind_rut` (`RUT_AFILIADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroisapre`
--

LOCK TABLES `registroisapre` WRITE;
/*!40000 ALTER TABLE `registroisapre` DISABLE KEYS */;
INSERT INTO `registroisapre` VALUES ('1',16366326,'MARCELLO','LÓPEZ','CÁceres');
/*!40000 ALTER TABLE `registroisapre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsables`
--

DROP TABLE IF EXISTS `responsables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsables`
--

LOCK TABLES `responsables` WRITE;
/*!40000 ALTER TABLE `responsables` DISABLE KEYS */;
INSERT INTO `responsables` VALUES (1,'Alejandro Horta','2020-04-28 02:41:27','2020-04-28 02:41:27'),(2,'Angeles Ramirez','2020-04-28 02:41:27','2020-04-28 02:41:27'),(3,'Densky Retamal','2020-04-28 02:41:27','2020-04-28 02:41:27'),(4,'Marcela Díaz','2020-04-28 02:41:27','2020-04-28 02:41:27'),(5,'Marta Donoso','2020-04-28 02:41:27','2020-04-28 02:41:27'),(6,'Lorena Gajardo','2020-04-28 02:41:27','2020-04-28 02:41:27'),(7,'Romina Inostroza','2020-04-28 02:41:27','2020-04-28 02:41:27'),(8,'Noelia Bravo','2020-04-28 02:41:27','2020-04-28 02:41:27'),(9,'Camila Romero','2020-04-28 02:41:27','2020-04-28 02:41:27'),(10,'Caterina Zoffoli','2020-04-28 02:41:27','2020-04-28 02:41:27'),(11,'María Victoria Briano Fuentealba ','2020-04-28 02:41:27','2020-04-28 02:41:27'),(12,'Vanessa Saéz Osorio','2020-04-28 02:41:27','2020-04-28 02:41:27');
/*!40000 ALTER TABLE `responsables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2020-04-25 18:37:16','2020-04-25 18:37:16'),(2,2,2,'2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Enfermera','Enfermera','2020-04-25 18:37:16','2020-04-25 18:37:16'),(2,'Comercial','Comercial','2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Marcello','López','Cáceres','16366326','974163322','mlc74163322@gmail.com',NULL,'$2y$10$D6RVM0G9.csVUghIddv2s.7/NYbvge0W2cnVD4srf0L1a4eV8.Uie',NULL,'2020-04-25 18:37:16','2020-04-25 18:37:16'),(2,'Departamento','área','Comercial','11111111','974163322','mlopez@cetep.cl',NULL,'$2y$10$wh6GV5rt.q5gLCrEePKIKuZcKSWtshqTyyElOaHey/iaJGBPQlNQC',NULL,'2020-04-25 18:37:16','2020-04-25 18:37:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-28 11:32:50
