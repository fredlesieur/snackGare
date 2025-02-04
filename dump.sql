-- MySQL dump 10.13  Distrib 8.0.37, for Win64 (x86_64)
--
-- Host: localhost    Database: snackgare
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `display_order` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil`
--

LOCK TABLES `accueil` WRITE;
/*!40000 ALTER TABLE `accueil` DISABLE KEYS */;
INSERT INTO `accueil` VALUES (3,'Produits de qualit├®s','Bienvenue dans le snack de la gare, o├╣ la qualit├® des produits est notre priorit├®. Nous mettons un point d\'honneur ├á utiliser des ingr├®dients frais et soigneusement s├®lectionn├®s pour pr├®parer nos kebabs, burgers et tacos. Tous nos plats sont pr├®par├®s avec des produits locaux, et chaque recette est r├®alis├®e de mani├¿re artisanale pour garantir une saveur authentique. Chez nous, manger sur le pouce ne signifie pas sacrifier la qualit├®. Venez d├®couvrir la diff├®rence que font des ingr├®dients frais et un savoir-faire artisanal.',1),(12,'Recettes originales','Avec nous, l\'originalit├® est toujours au menu ! En plus de nos incontournables kebabs, burgers et tacos, nous vous proposons chaque mois une recette unique, sp├®cialement con├ºue pour surprendre vos papilles. Que ce soit une sauce innovante, une association de saveurs in├®dite ou une revisite de vos classiques pr├®f├®r├®s, chaque cr├®ation est pens├®e pour vous offrir une exp├®rience culinaire nouvelle et excitante. Venez r├®guli├¿rement d├®couvrir nos nouvelles recettes et laissez vous tenter par l\'audace de nos cr├®ations mensuelles.',2),(13,'En ce moment','Notre burger savoyard',3),(14,'Nos sp├®cialit├®s ','Kebab, burger et tacos ',4);
/*!40000 ALTER TABLE `accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accueil_images`
--

DROP TABLE IF EXISTS `accueil_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accueil_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accueil_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accueil_id` (`accueil_id`),
  KEY `image_id` (`image_id`),
  CONSTRAINT `accueil_images_ibfk_1` FOREIGN KEY (`accueil_id`) REFERENCES `accueil` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accueil_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accueil_images`
--

LOCK TABLES `accueil_images` WRITE;
/*!40000 ALTER TABLE `accueil_images` DISABLE KEYS */;
INSERT INTO `accueil_images` VALUES (6,12,55),(7,12,57),(8,13,56),(9,14,54),(10,14,61),(11,14,65),(12,3,58),(13,3,59),(14,3,62),(15,3,63),(16,3,64),(17,3,66);
/*!40000 ALTER TABLE `accueil_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `dateavis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` tinyint(1) DEFAULT '0',
  `rating` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (7,'Alice','Super service et d├®licieux tacos!','2024-11-28 10:40:31',1,5),(8,'Bob','Je recommande vivement ce restaurant.','2024-11-28 10:40:51',1,5),(9,'Charlie','Des produits de qualit├® ├á un prix raisonnable.','2024-11-28 10:41:14',0,5),(11,'Famille studi','Nous avons ador├® le moment pass├®, la nourriture de qualit├® et le personnel tr├¿s accueillant.','2024-11-28 13:24:22',1,5),(12,'Christiane','On mange tr├¿s bien dommage que Walter ne soit pas au menu...','2024-11-28 13:26:54',1,4);
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boissons`
--

DROP TABLE IF EXISTS `boissons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boissons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price_bottle` decimal(10,2) DEFAULT NULL,
  `price_can` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boissons`
--

LOCK TABLES `boissons` WRITE;
/*!40000 ALTER TABLE `boissons` DISABLE KEYS */;
INSERT INTO `boissons` VALUES (1,'Les Softs','Coca, Fanta, Orangina, Oasis, Ice-tea.',4.00,2.50),(2,'Nos eaux','San Peligrino, Perrier, Evian.',2.00,1.00),(3,'Nos Vins (75cl)','Rouge : Touraine |\r\n\r\nRos├® : Pays d\'Oc |\r\n\r\nBlanc : Sauvignon |',8.00,NULL),(4,'Nos Bi├¿res (50cl)','Heineken.\r\n8.6.\r\nDesperados.',NULL,3.50);
/*!40000 ALTER TABLE `boissons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `burgers`
--

DROP TABLE IF EXISTS `burgers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `burgers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `price_menu` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `burgers`
--

LOCK TABLES `burgers` WRITE;
/*!40000 ALTER TABLE `burgers` DISABLE KEYS */;
INSERT INTO `burgers` VALUES (2,'BIG F',' \r\nDeux steaks hach├® fa├ºon bouch├¿res 150 g, lards frits, salade,  cheddar, sauce burger.',11.00,13.50),(3,'CLASSIC',' Un steak hach├® fa├ºon bouch├¿res 150 g, , cheddar, salade, sauce burger.\r\n',7.50,10.00),(4,'CHICKEN BURGER','Filet de poulet, salade, cornichon, cheddar \r\nen tranche, sauce burger.\r\n',9.00,11.50),(5,'LE FISH',' Filet de poisson pan├®, salade iceberg, cheddar en tranche, sauce burger.\r\n',9.00,11.50),(6,'RACLETTE','Steak hach├® fa├ºon bouch├¿res 150g, galette pomme de terre, raclette, cornichons, salade, sauce burger.\r\n',9.00,11.50),(7,'SAVOYARD','Steak hach├® fa├ºon bouch├¿res 150 g, galette de pomme de terre, \r\nreblochon, cornichons, salade, lards frits, sauce \r\nburger.\r\n',9.00,11.50),(8,'LE VEGGIE','Galette v├®g├®tal, cornichons, salade, sauce burger.',9.00,11.50),(9,'LE BIG W','Steak hach├® fa├ºon bouch├¿res 150 g, filet de poulet, cornichons, salade, cheddar, sauce burger.\r\n\r\n',11.00,13.00);
/*!40000 ALTER TABLE `burgers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jours` varchar(50) DEFAULT NULL,
  `opening_time_lunch` time DEFAULT NULL,
  `closing_time_lunch` time DEFAULT NULL,
  `opening_time_dinner` time DEFAULT NULL,
  `closing_time_dinner` time DEFAULT NULL,
  `is_closed_lunch` tinyint(1) DEFAULT NULL,
  `is_closed_dinner` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horaires`
--

LOCK TABLES `horaires` WRITE;
/*!40000 ALTER TABLE `horaires` DISABLE KEYS */;
INSERT INTO `horaires` VALUES (1,'Lundi','11:00:00','14:00:00','18:00:00','21:00:00',0,0,'2024-11-22 12:29:36','2024-11-22 12:29:36'),(2,'mardi','11:00:00','14:00:00','18:00:00','21:00:00',0,0,'2024-11-22 12:29:57','2024-11-22 12:29:57'),(3,'mercredi','11:00:00','14:00:00','18:00:00','21:00:00',0,0,'2024-11-22 12:30:07','2024-11-22 12:30:07'),(4,'jeudi','11:00:00','14:00:00','18:00:00','21:00:00',0,0,'2024-11-22 12:30:40','2024-11-22 12:30:40'),(5,'vendredi','11:00:00','14:00:00','18:00:00','21:00:00',0,0,'2024-11-22 12:30:49','2024-11-22 12:30:49'),(8,'samedi',NULL,NULL,NULL,NULL,1,1,'2024-11-22 15:25:43','2024-11-28 15:09:05'),(9,'dimanche',NULL,NULL,'18:30:00','21:30:00',1,0,'2024-11-22 15:25:45','2024-11-28 15:09:25');
/*!40000 ALTER TABLE `horaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (54,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725170/images/ewg9x7lajzuurficm03v.webp','burger sur bois','2024-11-27 16:32:53'),(55,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725198/images/cbvh9unha90nrxtnlqmk.webp','burger poulet','2024-11-27 16:33:21'),(56,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725221/images/jf1kmwlksslh2ecg1z0o.webp','burger savoyard','2024-11-27 16:33:44'),(57,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725243/images/rscqaxblu1znkkh1vr8x.webp','burger veggie','2024-11-27 16:34:06'),(58,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725306/images/t9rksizzfqyocqeat6nw.webp','pain tacos','2024-11-27 16:35:09'),(59,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725328/images/uuvbw7fy9lf9gbdbsezg.webp','pain pita','2024-11-27 16:35:31'),(60,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725363/images/fnig9rapeaddoqf4q3cq.webp','sandwitch kebab','2024-11-27 16:36:05'),(61,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725402/images/sbxrimuxnrku2af7nmyy.webp','sandwitch tacos','2024-11-27 16:36:45'),(62,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725637/images/as4xvaz6ib4x7ewjst8j.webp','oignons','2024-11-27 16:40:38'),(63,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725654/images/i0odtkxw1cfv9g0cpdbk.webp','tomate','2024-11-27 16:40:55'),(64,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725676/images/mor52ciksm19kvcjh7fl.webp','salade','2024-11-27 16:41:18'),(65,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732726296/images/ieemddp3myrm7ojk34p1.webp','kebab','2024-11-27 16:51:37'),(66,'https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732729351/default/cuu6118jagxhif7siada.webp','painburger','2024-11-27 17:42:32');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kebabs`
--

DROP TABLE IF EXISTS `kebabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kebabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price_sandwich` decimal(10,2) DEFAULT NULL,
  `price_menu` decimal(10,2) DEFAULT NULL,
  `price_plate` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kebabs`
--

LOCK TABLES `kebabs` WRITE;
/*!40000 ALTER TABLE `kebabs` DISABLE KEYS */;
INSERT INTO `kebabs` VALUES (1,'KEBABS','Servi avec salade tomate et oignons.',8.00,10.00,12.00);
/*!40000 ALTER TABLE `kebabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'Nos viandes','Kebab  Nuggets Tenders Viande hach├®e Escalope Cordon bleu Chorizo Merguez',NULL),(2,'Nos sauces','Blanche Mayonnaise Ketchup Barbecue Moutarde Curry Burger Samoura├»**  Alg├®rienne*   Harissa*  Andalouse* ',NULL),(3,'Nos Suppl├®ments','Raclette Cheddar Ch├¿vres Oignons frits Lard frit',1.00);
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salades`
--

DROP TABLE IF EXISTS `salades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salades`
--

LOCK TABLES `salades` WRITE;
/*!40000 ALTER TABLE `salades` DISABLE KEYS */;
INSERT INTO `salades` VALUES (1,'ITALIENNE','Salade, tomates, parmesan, jambon cru et sauce.',7.00),(2,'POULETTE',' Salade, tomates, parmesan, poulet pan├® et sauce .  ',7.00),(3,'THON','Salade, tomates, thon, olives et sauce.                                \r\n',7.00),(4,'ROYANS',' Salade, ravioles frits, noix, St Marcellin et sauce.',9.00),(5,'PESTO','Salade, tomates, parmesan,\r\njambon cru, burrata, pesto.',9.00);
/*!40000 ALTER TABLE `salades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snacks`
--

DROP TABLE IF EXISTS `snacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `snacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snacks`
--

LOCK TABLES `snacks` WRITE;
/*!40000 ALTER TABLE `snacks` DISABLE KEYS */;
INSERT INTO `snacks` VALUES (1,'Le menu Enfant','\r\n4 Nuggets, frites, boisson \r\net dessert.',7.00),(2,'Le menu Ado','\r\n\r\n Cheeseburger, frites, boisson \r\net dessert.',8.00),(3,'La Pti\'Box','\r\n\r\n Au choix 5 Tenders ou 6 sticks mozza\r\nou 6 Oignons rings\r\n ou 6 nuggets.',6.00),(4,'La Box','\r\n\r\n 4 Tenders, 4 Oignons rings,\r\n4 Calamars ├á la romaine.',12.00),(5,'La Big-Box','\r\n\r\n 5 Tenders, 5 Oignons rings, \r\n5 Calamars ├á la romaine, \r\n5 Nuggets\r\n5 Sticks de mozzarella.',19.00),(6,'Grandes Frites','150g',3.50),(7,'Petite Frites','80g',2.50);
/*!40000 ALTER TABLE `snacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tacos`
--

DROP TABLE IF EXISTS `tacos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tacos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price_solo` decimal(10,2) NOT NULL,
  `price_menu` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tacos`
--

LOCK TABLES `tacos` WRITE;
/*!40000 ALTER TABLE `tacos` DISABLE KEYS */;
INSERT INTO `tacos` VALUES (1,'1 viande','1 viande au choix',8.00,10.00),(2,'2 viandes','2 viandes au choix',10.00,12.00),(3,'3 viandes','3 viandes au choix',12.00,14.00);
/*!40000 ALTER TABLE `tacos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_table`
--

DROP TABLE IF EXISTS `test_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_table`
--

LOCK TABLES `test_table` WRITE;
/*!40000 ALTER TABLE `test_table` DISABLE KEYS */;
INSERT INTO `test_table` VALUES (15,'test'),(16,'Updated Name'),(17,'fetchall'),(19,'test'),(20,'Updated Name'),(21,'fetchall');
/*!40000 ALTER TABLE `test_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','collaborateur') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'walter','$2y$10$O6GiccXi8oc7IHMMGDG4NOohLMAhhgrRtn8UqF4CZyey8HjgakfUG','admin'),(2,'fred','$2y$10$/G9Vh8sZ4pKwpltBgos4e.sPHs/DbgBFMeAlRiIbnhihGH.XwF5PG','collaborateur');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-02 17:34:35
