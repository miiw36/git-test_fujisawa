-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: git-test
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'みみみ','dddd@jjjj',NULL,'fffff','2024-03-14 02:56:46'),(6,'ジソウスイッチ','jisouswitch@gmail.com','藤沢 バステト','テストです。','2024-03-14 05:15:19'),(7,'うえち','jisouswitch@gmail.com','all','なんくるないさ','2024-03-14 05:16:03'),(8,'ChatGPT','jisouswitch@gmail.com','赤木 エジプトガン','エジプトは歴史的にも文化的にも魅力的な国です。ここでは、エジプトの様々な側面について少し掘り下げてみましょう。\r\n\r\n1. **歴史と古代文明**: エジプトは世界で最も古い文明の一つであり、古代エジプト文明はピラミッドやスフィンクスなどの壮大な建造物で知られています。ナイル川の豊かな土壌に恵まれ、古代エジプト人は農業や天文学、医学などの分野で進歩しました。\r\n\r\n2. **ピラミッドと遺跡**: ギザのピラミッドやルクソールの神殿など、エジプトには数多くの古代建造物が残っています。これらの建築物は世界遺産に登録されており、多くの観光客が訪れる人気の観光地です。\r\n\r\n3. **ナイル川**: ナイル川はエジプトの生命線であり、古代から現代まで人々の生活に重要な役割を果たしてきました。ナイル川の豊かな土壌は農業に適しており、多くの農民が川の周りで生活しています。\r\n\r\n4. **文化と芸術**: エジプトの文化には、古代の神話や宗教、伝統的な音楽やダンス、そしてアラビア語での詩や物語が含まれます。また、古代エジプトの美術や彫刻も世界的に有名です。\r\n\r\n5. **近現代の政治と社会**: 近年のエジプトは政治的な変革や社会的な動きがありました。2011年のアラブの春以降、政治的な不安定さや経済的な課題が続いていますが、観光業やその他の産業においても成長を見せています。\r\n\r\nエジプトは多様な文化と歴史を持つ国であり、その魅力は世界中の人々を惹きつけています。','2024-03-14 05:17:15');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-14 14:22:12
