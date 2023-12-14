CREATE DATABASE  IF NOT EXISTS `readeazy` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `readeazy`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: readeazy
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Livro 1','103.43','destaque','78.80','image/book-1.png'),(2,'Livro 2','99.43','destaque','67.80','image/book-2.png'),(3,'Livro 3','109.43','destaque','87.80','image/book-3.png'),(4,'Livro 4','99.43','destaque','57.80','image/book-4.png'),(5,'Livro 5','66.43','destaque','37.80','image/book-5.png'),(6,'Livro 6','99.43','destaque','77.89','image/book-6.png'),(7,'Livro 7','112.43','destaque','88.89','image/book-7.png'),(8,'Livro 8','77.43','destaque','55.77','image/book-8.png'),(9,'Livro 9','154.22','destaque','99.77','image/book-9.png'),(10,'Livro 10','65.11','destaque','47.22','image/book-10.png'),(11,'Livro 1','65.11','chegados','0','image/book-1.png'),(12,'Livro 2','45.78','chegados','0','image/book-2.png'),(13,'Livro 3','78.90','chegados','0','image/book-3.png'),(14,'Livro 4','32.50','chegados','0','image/book-4.png'),(15,'Livro 5','92.40','chegados','0','image/book-5.png'),(16,'Livro 6','54.75','chegados','0','image/book-6.png'),(17,'Livro 7','36.20','chegados','0','image/book-7.png'),(18,'Livro 8','107.60','chegados','0','image/book-8.png'),(19,'Livro 9','81.30','chegados','0','image/book-9.png'),(20,'Livro 10','69.99','chegados','0','image/book-10.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recovery_tokens`
--

DROP TABLE IF EXISTS `recovery_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recovery_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recovery_tokens`
--

LOCK TABLES `recovery_tokens` WRITE;
/*!40000 ALTER TABLE `recovery_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `recovery_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Anderson','teste@teste.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(8,'Lucas','teste2@teste.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(10,'Lucas2','teste3@teste.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(11,'Lucas3','teste4@teste.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(15,'Lucas','teste@teste.co','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(16,'Lucas','teste5@teste.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(17,'Anderson','teste@teste.net','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(18,'Anderson','andersondiniz159@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b');
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

-- Dump completed on 2023-12-13 21:46:44
