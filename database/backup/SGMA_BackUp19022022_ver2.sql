CREATE DATABASE  IF NOT EXISTS `SGMA` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `SGMA`;
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
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoServicioId` bigint unsigned NOT NULL,
  `Nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `categorias_tiposervicioid_foreign` (`TipoServicioId`),
  CONSTRAINT `categorias_tiposervicioid_foreign` FOREIGN KEY (`TipoServicioId`) REFERENCES `tipo_servicios` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,1,'Repuestos','..',1,0,NULL,'2022-02-20 03:15:41',NULL),(2,2,'Accesorios de interior','..',1,0,NULL,'2022-02-20 03:15:41',NULL),(3,1,'Servicios Mecanicos','..',1,0,NULL,'2022-02-20 03:15:41',NULL),(4,2,'Accesorios de exterior','..',1,0,NULL,'2022-02-20 03:15:41',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_compra_detalles`
--

DROP TABLE IF EXISTS `documento_compra_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento_compra_detalles` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `DocumentoCompraId` bigint unsigned NOT NULL,
  `ProductoId` bigint unsigned NOT NULL,
  `Producto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Productos atributos Nombre+codigo',
  `NumeroSerieParte` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Cantidad` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `CostoUnitario` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Impuestos` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Total` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `documento_compra_detalles_documentocompraid_foreign` (`DocumentoCompraId`),
  KEY `documento_compra_detalles_productoid_foreign` (`ProductoId`),
  CONSTRAINT `documento_compra_detalles_documentocompraid_foreign` FOREIGN KEY (`DocumentoCompraId`) REFERENCES `documento_compras` (`Id`),
  CONSTRAINT `documento_compra_detalles_productoid_foreign` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`Id`)
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
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `documento_compras_sujetoid_foreign` (`SujetoId`),
  CONSTRAINT `documento_compras_sujetoid_foreign` FOREIGN KEY (`SujetoId`) REFERENCES `sujetos` (`Id`)
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
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardexes`
--

DROP TABLE IF EXISTS `kardexes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardexes` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `kardexes_productoid_foreign` (`ProductoId`),
  CONSTRAINT `kardexes_productoid_foreign` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`Id`)
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
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `UsuarioId` bigint unsigned NOT NULL,
  `FechaHoraAcceso` datetime NOT NULL,
  `Nombre_Navegador` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InfoAdicional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `log_accesos_usuarioid_foreign` (`UsuarioId`),
  CONSTRAINT `log_accesos_usuarioid_foreign` FOREIGN KEY (`UsuarioId`) REFERENCES `usuarios` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_accesos`
--

LOCK TABLES `log_accesos` WRITE;
/*!40000 ALTER TABLE `log_accesos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (329,'2019_12_14_000001_create_personal_access_tokens_table',1),(330,'2022_02_19_055515_create_usuarios_table',1),(331,'2022_02_19_064932_create_tipo_servicios_table',1),(332,'2022_02_19_161318_create_log_accesos_table',1),(333,'2022_02_19_172247_create_empresas_table',1),(334,'2022_02_19_173107_create_categorias_table',1),(335,'2022_02_19_181224_create_productos_table',1),(336,'2022_02_19_182326_create_sujetos_table',1),(337,'2022_02_19_183755_create_vehiculos_table',1),(338,'2022_02_19_185529_create_ordenes_atencion_table',1),(339,'2022_02_19_195150_create_ordenes_atencion__detalles_table',1),(340,'2022_02_19_200339_create_documento_compras_table',1),(341,'2022_02_19_202002_create_documento_compra_detalles_table',1),(342,'2022_02_19_210239_create_kardexes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes_atencion`
--

DROP TABLE IF EXISTS `ordenes_atencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenes_atencion` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `NumeroTransaccion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Numero de ODA',
  `TipoServicioId` bigint unsigned NOT NULL,
  `MecanicoId` bigint unsigned DEFAULT NULL,
  `VendedorId` bigint unsigned DEFAULT NULL,
  `SujetoId` bigint unsigned NOT NULL,
  `DNI` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'DNI/CEDULA/RUC/PASSAPORTE',
  `Cliente` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Sujetos atributos Nombres+Apellidos',
  `FechaHora` datetime NOT NULL COMMENT 'Fecha y Hora de creacion de la ODA',
  `VehiculoId` bigint unsigned NOT NULL,
  `Placa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vehiculo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Vehiculo atributos Marka+Modelo',
  `DescripcionRecepcionVehiculo` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `FechaHoraInicioAtencion` datetime DEFAULT NULL,
  `FechaHoraCierreAtencion` datetime DEFAULT NULL,
  `EstadoODA` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Estado(1=>Activo, 2=>En Atecion, 3=>Cerrado, 4=>No Atendido)',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ordenes_atencion_sujetoid_foreign` (`SujetoId`),
  KEY `ordenes_atencion_tiposervicioid_foreign` (`TipoServicioId`),
  KEY `ordenes_atencion_mecanicoid_foreign` (`MecanicoId`),
  KEY `ordenes_atencion_vendedorid_foreign` (`VendedorId`),
  KEY `ordenes_atencion_vehiculoid_foreign` (`VehiculoId`),
  CONSTRAINT `ordenes_atencion_mecanicoid_foreign` FOREIGN KEY (`MecanicoId`) REFERENCES `usuarios` (`Id`),
  CONSTRAINT `ordenes_atencion_sujetoid_foreign` FOREIGN KEY (`SujetoId`) REFERENCES `sujetos` (`Id`),
  CONSTRAINT `ordenes_atencion_tiposervicioid_foreign` FOREIGN KEY (`TipoServicioId`) REFERENCES `tipo_servicios` (`Id`),
  CONSTRAINT `ordenes_atencion_vehiculoid_foreign` FOREIGN KEY (`VehiculoId`) REFERENCES `vehiculos` (`Id`),
  CONSTRAINT `ordenes_atencion_vendedorid_foreign` FOREIGN KEY (`VendedorId`) REFERENCES `usuarios` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes_atencion`
--

LOCK TABLES `ordenes_atencion` WRITE;
/*!40000 ALTER TABLE `ordenes_atencion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordenes_atencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes_atencion_detalles`
--

DROP TABLE IF EXISTS `ordenes_atencion_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenes_atencion_detalles` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `OrdenAtencionId` bigint unsigned NOT NULL,
  `ProductoId` bigint unsigned NOT NULL,
  `Producto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Concatenacion de la tabla Productos atributos Nombre+codigo',
  `NumeroSerieParte` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Cantidad` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `Precio` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Costo` decimal(18,2) NOT NULL DEFAULT '0.00',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ordenes_atencion_detalles_ordenatencionid_foreign` (`OrdenAtencionId`),
  KEY `ordenes_atencion_detalles_productoid_foreign` (`ProductoId`),
  CONSTRAINT `ordenes_atencion_detalles_ordenatencionid_foreign` FOREIGN KEY (`OrdenAtencionId`) REFERENCES `ordenes_atencion` (`Id`),
  CONSTRAINT `ordenes_atencion_detalles_productoid_foreign` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`Id`)
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
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
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
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CategoriaId` bigint unsigned NOT NULL,
  `Codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `NumeroParte` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Precio` decimal(18,6) NOT NULL DEFAULT '0.000000',
  `Costo` decimal(18,6) NOT NULL DEFAULT '0.000000',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `productos_categoriaid_foreign` (`CategoriaId`),
  CONSTRAINT `productos_categoriaid_foreign` FOREIGN KEY (`CategoriaId`) REFERENCES `categorias` (`Id`)
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
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoSujeto` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tipo_Sujeto(1=>Cliente, 2=>Proveedor)',
  `DNI` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'DNI/CEDULA/RUC/PASSAPORTE',
  `Nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombres',
  `Apellido` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Apellidos',
  `Direccion` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Direccion',
  `Telefono` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Telefono',
  `Email` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `sujetos_tiposujeto_dni_unique` (`TipoSujeto`,`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujetos`
--

LOCK TABLES `sujetos` WRITE;
/*!40000 ALTER TABLE `sujetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sujetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicios`
--

DROP TABLE IF EXISTS `tipo_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_servicios` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicios`
--

LOCK TABLES `tipo_servicios` WRITE;
/*!40000 ALTER TABLE `tipo_servicios` DISABLE KEYS */;
INSERT INTO `tipo_servicios` VALUES (1,'Mecanica','prb',1,0,NULL,'2022-02-20 03:15:40',NULL),(2,'Electronica','dsfsd',1,0,NULL,'2022-02-20 03:15:40',NULL);
/*!40000 ALTER TABLE `tipo_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TipoRol` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Rol_Usuario (1=>Administrador, 2=>Gerente, 3=>Mecanico, 4=>Vendedor)',
  `NickName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email_Usuario',
  `NombreCompleto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordSALT` blob NOT NULL,
  `PasswordHASH` blob NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned NOT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculos` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `SujetoId` bigint unsigned NOT NULL,
  `Placa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Modelo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Marca` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `UsuarioCreacion` bigint unsigned NOT NULL,
  `UsuarioActualizacion` bigint unsigned DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `vehiculos_sujetoid_foreign` (`SujetoId`),
  CONSTRAINT `vehiculos_sujetoid_foreign` FOREIGN KEY (`SujetoId`) REFERENCES `sujetos` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
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

-- Dump completed on 2022-02-19 17:18:25
