-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: SGMA
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoServicioId` bigint unsigned NOT NULL,
  `Nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_tiposervicioid_foreign` (`TipoServicioId`),
  CONSTRAINT `categorias_tiposervicioid_foreign` FOREIGN KEY (`TipoServicioId`) REFERENCES `tipo_servicios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,1,'Repuestos','..',1,0,NULL,'2022-03-26 01:42:34',NULL),(2,2,'Accesorios de interior','..',1,0,NULL,'2022-03-26 01:42:34',NULL),(3,1,'Servicios Mecanicos','..',1,0,NULL,'2022-03-26 01:42:34',NULL),(4,2,'Accesorios de exterior','..',1,0,NULL,'2022-03-26 01:42:34',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_compra_detalles`
--

DROP TABLE IF EXISTS `documento_compra_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento_compra_detalles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `DocumentoCompraId` bigint unsigned NOT NULL,
  `ProductoId` bigint unsigned NOT NULL,
  `Producto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Productos atributos Nombre+codigo',
  `NumeroSerieParte` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Cantidad` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `CostoUnitario` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Impuestos` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Total` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documento_compra_detalles_documentocompraid_foreign` (`DocumentoCompraId`),
  KEY `documento_compra_detalles_productoid_foreign` (`ProductoId`),
  CONSTRAINT `documento_compra_detalles_documentocompraid_foreign` FOREIGN KEY (`DocumentoCompraId`) REFERENCES `documento_compras` (`id`),
  CONSTRAINT `documento_compra_detalles_productoid_foreign` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_compra_detalles`
--

LOCK TABLES `documento_compra_detalles` WRITE;
/*!40000 ALTER TABLE `documento_compra_detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento_compra_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_compras`
--

DROP TABLE IF EXISTS `documento_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento_compras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `NumeroCompra` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FechaDocumento` date NOT NULL,
  `NumeroDocumento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TipoDocumento` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT 'Tipo_Documento (1=>Factura, 2=>Nota de Venta, 3=>Liquidacion Compras)',
  `SujetoId` bigint unsigned NOT NULL,
  `DNI` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'DNI/CEDULA/RUC/PASSAPORTE',
  `Proveedor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Sujetos atributos Nombres+Apellidos',
  `ValorSinImpuestos` decimal(18,2) NOT NULL DEFAULT '0.00',
  `ValorImpuestos` decimal(18,2) NOT NULL DEFAULT '0.00',
  `ValorTotal` decimal(18,2) NOT NULL DEFAULT '0.00',
  `EstadoCompra` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Estado(1=>Activo, 2=>Cerrado, 3=>Anulado)',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documento_compras_sujetoid_foreign` (`SujetoId`),
  CONSTRAINT `documento_compras_sujetoid_foreign` FOREIGN KEY (`SujetoId`) REFERENCES `sujetos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_compras`
--

LOCK TABLES `documento_compras` WRITE;
/*!40000 ALTER TABLE `documento_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `RUC` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RazonSocial` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreComercial` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNIRepresentanteLegal` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NombreRepresentanteLegal` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContribuyenteEspecial` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ContribuyenteRegimen` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `TipoContribuyente` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ObligadoLlevarContabilidad` tinyint DEFAULT '0',
  `AgenteRetencion` tinyint DEFAULT '0',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'9999999999001','TALLER \"ABC\" ','Empresa NN','Ecuador',NULL,NULL,'','','',0,0,1,0,NULL,'2022-03-26 01:42:34',NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardexes`
--

DROP TABLE IF EXISTS `kardexes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardexes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoMovimiento` enum('IN','OUT') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kardex_Tipo_Movimiento (IN=>Ingreso, OUT=>Salida)',
  `FechaMovimiento` datetime NOT NULL,
  `TransaccionID` bigint unsigned NOT NULL,
  `Transaccion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductoId` bigint unsigned NOT NULL,
  `Producto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Productos atributos Nombre+codigo',
  `Cantidad` decimal(18,4) NOT NULL,
  `CostoTotal` decimal(18,6) NOT NULL,
  `CantidadSaldo` decimal(18,4) NOT NULL,
  `CostoToalSaldo` decimal(18,6) NOT NULL,
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kardexes_productoid_foreign` (`ProductoId`),
  CONSTRAINT `kardexes_productoid_foreign` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardexes`
--

LOCK TABLES `kardexes` WRITE;
/*!40000 ALTER TABLE `kardexes` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardexes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_accesos`
--

DROP TABLE IF EXISTS `log_accesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_accesos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `UsuarioId` bigint unsigned NOT NULL,
  `FechaHoraAcceso` datetime NOT NULL,
  `Nombre_Navegador` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InfoAdicional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `log_accesos_usuarioid_foreign` (`UsuarioId`),
  CONSTRAINT `log_accesos_usuarioid_foreign` FOREIGN KEY (`UsuarioId`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_accesos`
--

LOCK TABLES `log_accesos` WRITE;
/*!40000 ALTER TABLE `log_accesos` DISABLE KEYS */;
INSERT INTO `log_accesos` VALUES (1,1,'2022-03-26 03:03:29','Google Chrome','192.168.56.1','OK '),(2,3,'2022-03-26 10:03:01','Google Chrome','192.168.56.1','OK '),(3,3,'2022-03-26 10:03:03','Google Chrome','192.168.56.1','OK '),(4,1,'2022-03-26 10:03:08','Google Chrome','192.168.56.1','OK '),(5,1,'2022-03-26 10:03:44','Google Chrome','192.168.56.1','OK '),(6,2,'2022-03-26 10:03:14','Google Chrome','192.168.56.1','OK '),(7,3,'2022-03-26 10:03:16','Google Chrome','192.168.56.1','OK '),(8,1,'2022-03-26 10:03:05','Google Chrome','192.168.56.1','OK ');
/*!40000 ALTER TABLE `log_accesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2022_02_19_055515_create_usuarios_table',1),(3,'2022_02_19_064932_create_tipo_servicios_table',1),(4,'2022_02_19_161318_create_log_accesos_table',1),(5,'2022_02_19_172247_create_empresas_table',1),(6,'2022_02_19_173107_create_categorias_table',1),(7,'2022_02_19_181224_create_productos_table',1),(8,'2022_02_19_182326_create_sujetos_table',1),(9,'2022_02_19_183755_create_vehiculos_table',1),(10,'2022_02_19_185529_create_ordenes_atencion_table',1),(11,'2022_02_19_195150_create_ordenes_atencion__detalles_table',1),(12,'2022_02_19_200339_create_documento_compras_table',1),(13,'2022_02_19_202002_create_documento_compra_detalles_table',1),(14,'2022_02_19_210239_create_kardexes_table',1),(15,'2022_02_20_095550_update_edbasurto',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes_atencion`
--

DROP TABLE IF EXISTS `ordenes_atencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenes_atencion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `NumeroTransaccion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Numero de ODA',
  `TipoServicioId` bigint unsigned NOT NULL,
  `MecanicoId` bigint unsigned DEFAULT NULL,
  `VendedorId` bigint unsigned DEFAULT NULL,
  `SujetoId` bigint unsigned NOT NULL,
  `DNI` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'DNI/CEDULA/RUC/PASSAPORTE',
  `Cliente` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Sujetos atributos Nombres+Apellidos',
  `FechaHora` datetime NOT NULL COMMENT 'Fecha y Hora de creacion de la ODA',
  `VehiculoId` bigint unsigned NOT NULL,
  `Placa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vehiculo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Vehiculo atributos Marka+Modelo',
  `DescripcionRecepcionVehiculo` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `FechaHoraInicioAtencion` datetime DEFAULT NULL,
  `FechaHoraCierreAtencion` datetime DEFAULT NULL,
  `EstadoODA` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Estado(1=>Activo, 2=>En Atecion, 3=>Cerrado, 4=>No Atendido)',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `KilometroActualVehiculo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ordenes_atencion_sujetoid_foreign` (`SujetoId`),
  KEY `ordenes_atencion_tiposervicioid_foreign` (`TipoServicioId`),
  KEY `ordenes_atencion_mecanicoid_foreign` (`MecanicoId`),
  KEY `ordenes_atencion_vendedorid_foreign` (`VendedorId`),
  KEY `ordenes_atencion_vehiculoid_foreign` (`VehiculoId`),
  CONSTRAINT `ordenes_atencion_mecanicoid_foreign` FOREIGN KEY (`MecanicoId`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `ordenes_atencion_sujetoid_foreign` FOREIGN KEY (`SujetoId`) REFERENCES `sujetos` (`id`),
  CONSTRAINT `ordenes_atencion_tiposervicioid_foreign` FOREIGN KEY (`TipoServicioId`) REFERENCES `tipo_servicios` (`id`),
  CONSTRAINT `ordenes_atencion_vehiculoid_foreign` FOREIGN KEY (`VehiculoId`) REFERENCES `vehiculos` (`id`),
  CONSTRAINT `ordenes_atencion_vendedorid_foreign` FOREIGN KEY (`VendedorId`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes_atencion`
--

LOCK TABLES `ordenes_atencion` WRITE;
/*!40000 ALTER TABLE `ordenes_atencion` DISABLE KEYS */;
INSERT INTO `ordenes_atencion` VALUES (1,'2022ODA-001',1,4,1,1,'0100230630','EDUARDO','2022-03-26 10:51:00',1,'GPG0152','CHEVROLET CORSA EVOLUTION 1.4CC 4P 2008 SEDAN',NULL,NULL,NULL,'1',0,NULL,'2022-03-26 20:54:53','2022-03-26 20:54:53','123554'),(2,'2022ODA-001',1,4,1,40,'0104643952','VICTORIA PEREZ','2022-03-26 10:54:00',3,'GRD0283','TOYOTA HILUX 2,7CC 4X2 2008 CAMIONETA',NULL,NULL,NULL,'1',0,NULL,'2022-03-26 20:56:07','2022-03-26 20:56:07','12354');
/*!40000 ALTER TABLE `ordenes_atencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes_atencion_detalles`
--

DROP TABLE IF EXISTS `ordenes_atencion_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenes_atencion_detalles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `OrdenAtencionId` bigint unsigned NOT NULL,
  `ProductoId` bigint unsigned NOT NULL,
  `Producto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Productos atributos Nombre+codigo',
  `NumeroSerieParte` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Cantidad` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `Precio` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Costo` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ordenes_atencion_detalles_ordenatencionid_foreign` (`OrdenAtencionId`),
  KEY `ordenes_atencion_detalles_productoid_foreign` (`ProductoId`),
  CONSTRAINT `ordenes_atencion_detalles_ordenatencionid_foreign` FOREIGN KEY (`OrdenAtencionId`) REFERENCES `ordenes_atencion` (`id`),
  CONSTRAINT `ordenes_atencion_detalles_productoid_foreign` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes_atencion_detalles`
--

LOCK TABLES `ordenes_atencion_detalles` WRITE;
/*!40000 ALTER TABLE `ordenes_atencion_detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordenes_atencion_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CategoriaId` bigint unsigned NOT NULL,
  `Codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `NumeroParte` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Precio` decimal(18,6) NOT NULL DEFAULT '0.000000',
  `Costo` decimal(18,6) NOT NULL DEFAULT '0.000000',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoriaid_foreign` (`CategoriaId`),
  CONSTRAINT `productos_categoriaid_foreign` FOREIGN KEY (`CategoriaId`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sujetos`
--

DROP TABLE IF EXISTS `sujetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sujetos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoSujeto` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tipo_Sujeto(1=>Cliente, 2=>Proveedor)',
  `DNI` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'DNI/CEDULA/RUC/PASSAPORTE',
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombres',
  `Apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Apellidos',
  `Direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Direccion',
  `Telefono` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Telefono',
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sujetos_tiposujeto_dni_unique` (`TipoSujeto`,`DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujetos`
--

LOCK TABLES `sujetos` WRITE;
/*!40000 ALTER TABLE `sujetos` DISABLE KEYS */;
INSERT INTO `sujetos` VALUES (1,'1','0100230630','EDUARDO','','QUITO','','maliciacardenas@hotmail.com',1,1,1,'2021-01-16 20:52:41','2022-03-26 01:42:34'),(2,'1','0100753383','HECTOR','RUILOVA','BELLAVISTA','0995700663','hrcosaco@hotmail.com',1,2,2,'2022-03-05 22:10:12','2022-03-26 01:42:34'),(3,'1','0101048338','GONZALO','CARDENAS','EL BATAN','2923107','gecardenas1@hotmail.com',1,3,3,'2021-07-28 18:39:18','2022-03-26 01:42:34'),(4,'1','0101117794','ARTURO','CORDOVA','CONOCOTO','2343932','arturocordoval@hotmail.com',1,1,1,'2021-11-21 01:18:18','2022-03-26 01:42:34'),(5,'1','0101229771','MARIA ROSA','MARCHAN','AV 6 D EDICIEMBRE 36 34','0961021900','mariavoz@hotmail.com',1,2,2,'2022-03-14 00:49:24','2022-03-26 01:42:34'),(6,'1','0101384477','CORNELIO','VICUÑO','CUENCA','2860147','cbicuar514@hotmail.com',1,3,3,'2021-03-23 19:48:05','2022-03-26 01:42:34'),(7,'1','0101497568','CARLOS','LOPEZ','CAPELO','2860411','maisabelmartinez.ec@gmail.com',1,1,1,'2021-02-14 01:49:09','2022-03-26 01:42:34'),(8,'1','0101843571','JORGE','FEIJOO','PUSUQUI','2355438','jorge.g.feijoo.v@gmail.com',1,2,2,'2021-01-23 22:11:40','2022-03-26 01:42:34'),(9,'1','0102017092','PAUL','MOREJON JARAMILLO','GONZALEZ SUAREZ','2562170','',1,3,3,'2021-03-17 01:08:18','2022-03-26 01:42:34'),(10,'1','0102106051','JUAN ','TORRES','FRANCISCO DE NATES','2436889','vintitojf@hotmail.com',1,1,1,'2021-10-10 21:35:27','2022-03-26 01:42:34'),(11,'1','0102261088','JUAN','PALACIOS','GUAPULO','0995651694','jpalaciosi@hotmail.com',1,2,2,'2020-09-08 20:29:28','2022-03-26 01:42:34'),(12,'1','0102334596','NUBE','CASTRO','CHARLES DARWIN','0984254551','nube09@gmail.com',1,3,3,'2022-01-28 19:55:51','2022-03-26 01:42:34'),(13,'1','0102531068','MARGARITA','LEDESMA','CUMBAYA','2229289','gerencia@italcom.ec',1,1,1,'2020-07-03 20:13:58','2022-03-26 01:42:34'),(14,'1','0102531076','LORENA','LEDESMA','BELLAVISTA','0999730180','lorenaledesma68@hotmail.com',1,2,2,'2020-09-12 21:57:57','2022-03-26 01:42:34'),(15,'1','0102616315','ANDRES','CRESPO','LA CAROLINA','0995000969','candresrobertoz@gmail.com',1,3,3,'2021-06-13 23:05:30','2022-03-26 01:42:34'),(16,'1','0102791845','ANDRES ','ASTUDILLO','LA  CONCEPCION','0992669454','dra.astusilva@hotmail.com',1,1,1,'2022-02-15 02:38:38','2022-03-26 01:42:34'),(17,'1','0102863552','ALFREDO','MORA G','SAN RAFAEL','0979329029','goitar29@gmail.com',1,2,2,'2022-03-25 18:50:48','2022-03-26 01:42:34'),(18,'1','0102954740','MARCO','TELLO S','GONZALES SUAREZ','0998158385','msnowblind@gmail.com',1,3,3,'2021-02-26 20:57:55','2022-03-26 01:42:34'),(19,'1','0102992591','GABRIELA','GOMEZ','BOSSANO Y JATVA','0995107358','gabgomez@hotmail.com',1,1,1,'2021-11-18 01:29:56','2022-03-26 01:42:34'),(20,'1','0103384517','MONICA','RIQUETTI','VISTA GRANDE 159','2060124','mriquetti@gmail.com',1,2,2,'2021-11-26 00:32:11','2022-03-26 01:42:34'),(21,'1','0103427464','JUAN JOSE','JARAMILLO','MIRAVALLES 3','2899175','chino.jaramillo@hotmail.com',1,3,3,'2021-08-21 21:50:21','2022-03-26 01:42:34'),(22,'1','0103436499','DANIELO','AREVALO','SAN BLAS','0999178040','vdanarevalo@yahoo.es',1,1,1,'2020-08-21 20:41:24','2022-03-26 01:42:34'),(23,'1','0103468542','CRISTINA','ARTEAGA','QUITO TENIS','0990504344','arteagacristi@gmail.com',1,2,2,'2022-01-02 19:22:13','2022-03-26 01:42:34'),(24,'1','0103597779','ANA','AVILA','GRANDA CENTENO','0984031313','avac75@hotmail.com',1,3,3,'2022-02-14 19:06:13','2022-03-26 01:42:34'),(25,'1','0103667531','PEDRO','ORELLANA','LA FLORESTA','0991000318','pedrorellana@gmail.com',1,1,1,'2020-06-30 22:45:55','2022-03-26 01:42:34'),(26,'1','0103903688','FABIAN','PESANTEZ','COTOCOLLAO','6038344','esteban.pesantez@hotmail.com',1,2,2,'2021-10-21 20:11:52','2022-03-26 01:42:34'),(27,'1','0103922068','BRISEIDA','ORDOÑEZ','BENALCAZAR','0984673196','brisa.oc@hotmail.com',1,3,3,'2021-07-25 02:06:16','2022-03-26 01:42:34'),(28,'1','0103931382','ANDREA','BRAVO','CUENCA','9999999','andrebare@gmail.com',1,1,1,'2021-03-12 01:42:35','2022-03-26 01:42:34'),(29,'1','0103941373','JOHANNA','GUZMAN','ELOY ALFARO','0958840229','johannagro88@gmail.com',1,2,2,'2022-02-14 19:48:54','2022-03-26 01:42:34'),(30,'1','0104119474','SAMANTHA','BACUILIMA','LOS GRANADOS Y LAS HIEDRAS','0996865413','sambaculima@gmail.com',1,3,3,'2021-07-07 01:27:17','2022-03-26 01:42:34'),(31,'1','0104123203','ESTEFANIA','YANEZ','JIPIJAPA','0991618543','estfania1409@hotmail.com',1,1,1,'2021-10-01 19:59:38','2022-03-26 01:42:34'),(32,'1','0104129556','JOSUE','DURAN','CUENCA','0988225523','josueduranhermida@hotmail.com',1,2,2,'2021-03-16 20:08:40','2022-03-26 01:42:34'),(33,'1','0104169396','LADY','AREVALO','IÑAQUITO','0998502745','lady3185@hotmail.com',1,3,3,'2021-08-08 23:19:56','2022-03-26 01:42:34'),(34,'1','0104205760','ANDREA','DURIES','QUITO TENNIS','0991450523','andreaduries@gmail.com',1,1,1,'2022-03-23 01:49:16','2022-03-26 01:42:34'),(35,'1','0104235791','GINA','LOBATO CORDERO','LA CAROLINA','0991111840','ginasoloco@hotmail.com',1,2,2,'2021-12-04 19:07:20','2022-03-26 01:42:34'),(36,'1','0104530068','FRANKLIN','UGUÑA','6 DE DICIEMBRE Y CARRION','0958980156','franklinuguna@hotmail.com',1,3,3,'2021-04-15 22:35:26','2022-03-26 01:42:34'),(37,'1','0104566260','JUANA','FERNANDEZ','SAN BLAS','9999999','',1,1,1,'2021-02-20 01:05:59','2022-03-26 01:42:34'),(38,'1','0104567151','FRANCISCO','BERMEO','6 DE DICIEMBRE','0987626548','francisco.bermeo.ca@gmail.com',1,2,2,'2021-05-07 19:10:54','2022-03-26 01:42:34'),(39,'1','0104639315','JULIO','PAÑI','ISABEL LA CATOLICA Y CORUÑA','0999972201','juliopaniledesma@gmail.com',1,3,3,'2021-11-02 21:51:18','2022-03-26 01:42:34'),(40,'1','0104643952','VICTORIA','PEREZ','ANTONIO LLORET','0984555501','vperezleon@outlook.com',1,1,1,'2021-12-30 20:30:56','2022-03-26 01:42:34'),(41,'1','0104678446','DOLORES','VINTIMILLA','NAYON','3801666','dolores86vintimilla@gmail.com',1,2,2,'2021-03-03 19:23:47','2022-03-26 01:42:34'),(42,'1','0104797626','CLAUDIA','BERMEO','MANUEL CORRAL','09922700952','claudiab23@gmail.com',1,3,3,'2021-10-21 21:05:41','2022-03-26 01:42:34'),(43,'1','0104802483','ANGELICA','SANCHEZ','CUENCA','2858913','asanchez807@hotmail.com',1,1,1,'2022-01-15 19:32:34','2022-03-26 01:42:34'),(44,'1','0105141444','MARIA','DURAN','EL BATAN','2248081','belenduranf@gmail.com',1,2,2,'2021-10-05 00:17:24','2022-03-26 01:42:34'),(45,'1','0105271613','MARIA','SOL PALACIOS','GUAPULO','3238174','solpalacios1995@gmail.com',1,3,3,'2021-04-09 21:52:48','2022-03-26 01:42:34'),(46,'1','0105362651','DIEGO','MONTUFAR','PINAR ALTO','','diego.montufar@gmail.com',1,1,1,'2021-10-02 21:59:00','2022-03-26 01:42:34'),(47,'1','0105687396','MISHELL','MANTILLA','CUENCA','0992607627','mishumantilla_9@hotmail.com',1,2,2,'2022-02-04 20:11:54','2022-03-26 01:42:34'),(48,'1','0105728612','DIEGO','ULLOA','COMITE DEL PUEBLO','0995434767','spndeportivo@gmail.com',1,3,3,'2021-06-02 01:50:15','2022-03-26 01:42:34'),(49,'1','0106709850','MARIA AUGUSTA','VAZQUEZ','QUITO','0983431044','aangavazquez@gmail.com',1,1,1,'2021-04-02 21:55:06','2022-03-26 01:42:34'),(50,'1','0151525011','JUAN','RANGEL','QUITO','0967413036','jrangelmv@hotmail.com',1,2,2,'2020-11-17 23:58:50','2022-03-26 01:42:34'),(51,'2','0101337566001','NARCISA DE JESUS','ARIAS VICUNA','Quito','999999','administracion@umai.ec',1,3,1,'2021-04-27 22:09:32','2022-03-26 01:42:34'),(52,'2','0102019767001','TIGRE SEGARRA','JUAN ANGEL','COLONIA S/H Y PANAMERICANA','022021794','tigresegarrajuan@gmail.com',1,1,2,'2020-08-04 15:04:34','2022-03-26 01:42:34'),(53,'2','0102416468001','MAX','ANDRADE','QUITO','018601908','max.andr@gmail.com',1,2,3,'2021-04-30 19:56:47','2022-03-26 01:42:34'),(54,'2','0102423571001','JOSE ANTONIO','TORAL','LA CAROLINA','0998661730','dosa.arq@gmail.com',1,3,1,'2021-03-12 01:55:08','2022-03-26 01:42:34'),(55,'2','0102519337001','KARINA','ASTUDILLO','EL BOSQUE','0949012912','icariluastudillo@gmail.com',1,1,2,'2021-06-28 19:30:44','2022-03-26 01:42:34'),(56,'2','0102753340001','VELASTEGUI','GREYS','LUIS CORDERO','072842225','gracevelastegui@yahoo.com',1,2,3,'2021-01-25 19:29:07','2022-03-26 01:42:34'),(57,'2','0104940556001','DIANA','BRAVO','CUENCA','0995132297','dianabravolo9@gmail.com',1,3,1,'2021-06-24 01:32:47','2022-03-26 01:42:34'),(58,'2','0104990551001','ESTEBAN','SOLANO','MARIANA DE JESUS','99999999','info@amaruec.org',1,1,2,'2021-01-24 01:43:29','2022-03-26 01:42:34'),(59,'2','0107139669001','PEDRO','GUTIERREZ','AV. MEDIO EJIDO','2370118','gutiguev10@gmail.com',1,2,3,'2021-10-25 20:32:53','2022-03-26 01:42:34'),(60,'2','0190146677001','ALEM CIA LTDA','','GASPAR DE VILLARROEL','3436006','contabilidad@alem.com.ec',1,3,1,'2022-02-04 20:59:23','2022-03-26 01:42:34'),(61,'2','0190430162001','IMPORTXEM CIA LTDA','','CUENCA','0992321029','importxem@gmail.com',1,1,2,'2021-02-20 01:48:33','2022-03-26 01:42:34'),(62,'2','0190499472001','LINAJEMUEBLES CIA LTDA','','CUENCA','0995503532','info@linajemuebles.com',1,2,1,'2021-11-01 21:08:17','2022-03-26 01:42:34'),(63,'2','0201340650001','ALEX','MEJIA','QUITO','2503980','contabilidad@notaria22quito.com',1,3,2,'2022-01-28 20:30:19','2022-03-26 01:42:34'),(64,'2','0202029161001','EMMA','AGUILAR','ISABEL LA CATOLICA','0999382061','emyaguilaralds@hotmail.com',1,1,3,'2021-05-29 23:58:31','2022-03-26 01:42:34'),(65,'2','0300777679001','EDGAR','ROJAS','SAN BARTOLO','2688611','edgarrojasgonzalez@gmail.com',1,2,1,'2020-10-23 19:06:12','2022-03-26 01:42:34'),(66,'2','0301839866001','SEBASTIAN','PESANTES','CCNU','0997387054','info@knowwadsoft.com',1,3,2,'2021-04-17 20:25:17','2022-03-26 01:42:34'),(67,'2','0302008024001','GABRIELLA','MORENO','LA FLORESTA','0983978086','basloromeroc@yahoo.es',1,1,3,'2021-10-08 02:56:32','2022-03-26 01:42:34'),(68,'2','0390011024001','Lacteos San Antonio','','balzar','999999999','administracion@gmail.com',1,2,1,'2020-10-09 17:59:40','2022-03-26 01:42:34'),(69,'2','0400713764001','ISAAC','POZO','CARAPUNGO','0995520644','isaacpozo64@hotmail.com',1,3,2,'2021-05-29 01:47:55','2022-03-26 01:42:34'),(70,'2','0401196696001','FREDDY','ALMEIDO','VERSALLER','3216856','freddyalmeidavalencia@hotmail.com',1,1,3,'2020-06-21 18:34:52','2022-03-26 01:42:34'),(71,'2','0401314539001','ANDREA','ROSERO','QUITO','098 460 5802','andyy290579@hotmail.com',1,2,1,'2021-11-06 02:22:22','2022-03-26 01:42:34'),(72,'2','0401341813001','VERONICA','MONTENEGRO','NAYON','0998244809','lmediavilla@min.com.ec',1,3,2,'2021-12-30 20:58:24','2022-03-26 01:42:34'),(73,'2','0401365929001','ELIANE','DONOSO','EL DORADO','0995606974','elianedonoso@gmail.com',1,1,1,'2021-08-02 20:00:56','2022-03-26 01:42:34'),(74,'2','0401487467001','SUSAN','ORTEGA','ISABEL LA CATOLICA','0984827482','susyortega_25@hotmail.com',1,2,2,'2020-07-16 20:23:37','2022-03-26 01:42:34'),(75,'2','0401819404001','MARILYN','YEPEZ','LUGO Y PASAJE 1','0963344755','marilynyepez@gmail.com',1,3,3,'2022-02-14 21:29:10','2022-03-26 01:42:34'),(76,'2','0500010715001','LEONARDO','MUÑOZ','LA TACUNGA','032701153','leonardomzch@gmail.com',1,1,1,'2020-08-26 22:23:47','2022-03-26 01:42:34'),(77,'2','0500899927001','MARIA','FELIX','SANGOLQUI','2842828','mery.felix.vela@hotmail.com',1,2,2,'2020-12-28 20:35:16','2022-03-26 01:42:34'),(78,'2','0501117378001','NANCEY','MOLINA','PASTOCALLE','2700178','markinj34@gmail.com',1,3,3,'2021-11-13 00:42:17','2022-03-26 01:42:34'),(79,'2','0501168025001','MONICA','TITO','CENTRO HISTORICO','0978791275','cafeteriafabiolita@gmail.com',1,1,1,'2021-03-19 21:31:36','2022-03-26 01:42:34'),(80,'2','0501598130001','GRACIELA','ARAUJO','LA Y','2444936','ecuepherme@hotmail.com',1,2,2,'2021-06-28 21:15:52','2022-03-26 01:42:34'),(81,'2','0502486376001','GABRIELA','CHAVEZ','LA MARISCAL','0984489891','wax3369@gmail.com',1,3,3,'2021-09-03 19:49:14','2022-03-26 01:42:34'),(82,'2','0502636061001','JAIME GONZALO','ACOSTA TIGLLA','Gonzalez de la Vega N6-50','0993103073','administracion@umai.ec',1,1,1,'2021-02-03 15:59:58','2022-03-26 01:42:34'),(83,'2','0503108771001','FRANSHESCA','YEPEZ','CDLA ATAHUALPA','0969730524','franshesca.yepez94@gmail.com',1,2,2,'2021-11-10 01:10:40','2022-03-26 01:42:34'),(84,'2','0503350076001','JUAN','TAPIA','EL DORADO','0995421660','jhonta16@gmail.com',1,3,3,'2022-01-10 18:50:42','2022-03-26 01:42:34'),(85,'2','0503379174001','FRANKLIN','GAVILANES','LUIS CORDERO','','franklingm87@hotmail.com',1,1,1,'2022-02-04 22:28:36','2022-03-26 01:42:34'),(86,'2','0590055328001','FUENTES SAN FELIPE S.A.','','Cuba s/n y pasaje Eloy A Latacunga Ecuador','02253162','',1,2,3,'2020-06-18 18:16:30','2022-03-26 01:42:34'),(87,'2','0600803753001','LILIAN','GRANDA PAEZ','MONTESERRIN','0998028828','lgrandap@gmail.com',1,3,1,'2021-09-22 01:49:35','2022-03-26 01:42:34'),(88,'2','0601907215001','MARCELO','HERRERA','TAMBILLO','2317357','drmarceloherrera@gmail.com',1,1,1,'2021-02-24 19:46:05','2022-03-26 01:42:34'),(89,'2','0602047482001','JIMI','DE LA CRUZ','RIOBAMBA','2947719','joshuadelacruz@hotmail.com',1,2,2,'2021-07-05 18:21:45','2022-03-26 01:42:34'),(90,'2','0602285025001','MARIA','SUICA','CONOCOTO','2606068','',1,3,3,'2021-11-14 02:25:57','2022-03-26 01:42:34'),(91,'2','0602399271001','MAURO','PIÑAS','MERCADILLO','2901822','mauro19kavezon@gmail.com',1,1,1,'2021-03-06 22:12:13','2022-03-26 01:42:34'),(92,'2','0602476855001','ALVARO','MEJIA SALAZAR','QUITO','229220','facturasalvaro@yahoo.com',1,2,2,'2021-07-15 19:17:42','2022-03-26 01:42:34'),(93,'2','0602552408001','TANYA','ZAMORA','CUMBAYA','0984509794','tandre202@hotmail.com',1,3,3,'2021-07-02 21:49:31','2022-03-26 01:42:34'),(94,'2','0602982878001','CRISTOBAL','BOSMEDIANO','ORELLANA Y WHYMPER','0984679245','c.bosmediano@live.com',1,1,1,'2021-02-28 00:14:39','2022-03-26 01:42:34'),(95,'2','0603203225001','LUIS','VERA','RIOBAMBA','2608443','luiso100@hotmail.com',1,2,2,'2021-06-03 20:37:02','2022-03-26 01:42:34'),(96,'2','0603719782001','LUCIA','ASTUDILLO','RIOBAMBA','0994541421','lucyastu@gmail.com',1,3,3,'2021-02-03 01:47:53','2022-03-26 01:42:34'),(97,'2','0603805888001','CARLOS','MONTALVO','LA MARISCAL','0983806633','cemontalvop@hotmail.com',1,1,1,'2021-08-14 02:19:09','2022-03-26 01:42:34'),(98,'2','0604173674001','SANTIAGO','CHAVEZ','QUITO','0980961236','sesantiagochavez@gmail.com',1,2,2,'2021-07-24 02:19:58','2022-03-26 01:42:34'),(99,'2','0604183475001','ANDRES','POMBOZA','RIOBAMBA','0984519243','apomboza@gmail.com',1,3,3,'2021-02-27 23:13:21','2022-03-26 01:42:34'),(100,'2','0604261198001','JULIANO','OLEAS','AV ILALO','0992892403','juliano14@hotmail.es',1,1,1,'2021-04-10 21:21:15','2022-03-26 01:42:34');
/*!40000 ALTER TABLE `sujetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicios`
--

DROP TABLE IF EXISTS `tipo_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_servicios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicios`
--

LOCK TABLES `tipo_servicios` WRITE;
/*!40000 ALTER TABLE `tipo_servicios` DISABLE KEYS */;
INSERT INTO `tipo_servicios` VALUES (1,'Mecanica','prb',1,0,NULL,'2022-03-26 01:42:34',NULL),(2,'Electronica','dsfsd',1,0,NULL,'2022-03-26 01:42:34',NULL);
/*!40000 ALTER TABLE `tipo_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoRol` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Rol_Usuario (1=>Administrador, 2=>Gerente, 3=>Mecanico, 4=>Vendedor)',
  `NickName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email_Usuario',
  `NombreCompleto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordSALT` blob NOT NULL,
  `PasswordHASH` blob NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UserCreated` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'1','admin','admin@hotmail.com','Administrador del Sistema',_binary '$2y$09$/r0MUcjBfDyHy5v9RkCQbu22peHAN2t4U96MUZfVvpeGfLeDtuszK',_binary '$2y$09$eEg.C7nVv50QuMMthXJfluIZjV7ZJHmLP4xQoMqgWt.ZWqQH9yC8m',1,1,1,'2022-03-26 01:42:34',NULL),(2,'2','gerente','gerente@hotmail.com','Gerente del Area',_binary '$2y$09$wITOc0kxEvblPYjSEa4cou7sYfGcOuXuB2JKfxp7hshP4QpmOk6ru',_binary '$2y$09$J/e6CtgjE5DrldCPs2v/V.v.TkcPR04SUC6v0wcdhRxk6xOkyl4WK',1,1,1,'2022-03-26 01:42:34',NULL),(3,'4','vendedor','vendedor@hotmail.com','Vendedor de Turno',_binary '$2y$09$O8Ebnwu5h9WPIQ8pZAlHuO32636eq38VP0lSE5aurfnlau2z237w6',_binary '$2y$09$JRqa2EqZfnblhsguozsRhebAV3KtvO2Kj1NMqu4eezA6HxQpbh.8O',1,1,1,'2022-03-26 01:42:34',NULL),(4,'3','mecanico','mecanico@hotmail.com','Mecanico del Sistema',_binary '$2y$09$Nk3R7qpMPZZlXM3008iumuaCrVXw8U16dXo8hwu1p/wF1GbdgLwxW',_binary '$2y$09$iUmlFo.McY6CPO5EGVdQ/.Fa1oQQw/PBRQGSZgXlXezLdz6lC692q',1,1,1,'2022-03-26 01:42:34',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `SujetoId` bigint unsigned NOT NULL,
  `Placa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Modelo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UserCreated` bigint unsigned NOT NULL,
  `UserUpdated` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Anio` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No definido',
  PRIMARY KEY (`id`),
  KEY `vehiculos_sujetoid_foreign` (`SujetoId`),
  CONSTRAINT `vehiculos_sujetoid_foreign` FOREIGN KEY (`SujetoId`) REFERENCES `sujetos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,1,'GPG0152','CORSA EVOLUTION','CHEVROLET','1.4CC 4P',1,0,NULL,'2022-03-23 07:37:41','2022-03-23 07:51:00','2008','SEDAN','PLATA'),(2,3,'GSN3749','K07II','DONG FENG','1,3 CC',1,0,NULL,'2022-03-23 07:52:42','2022-03-23 07:52:42','2015','FURGONETA','NEGRO'),(3,40,'GRD0283','HILUX','TOYOTA','2,7CC 4X2',1,0,NULL,'2022-03-26 07:58:37','2022-03-26 20:55:42','2008','CAMIONETA','BLANCO');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-26 11:07:01
