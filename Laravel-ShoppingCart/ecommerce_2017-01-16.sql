# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: ecommerce
# Generation Time: 2017-01-17 04:26:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `inStock` int(11) NOT NULL,
  `imgPath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_name_index` (`name`),
  KEY `products_price_index` (`price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `inStock`, `imgPath`)
VALUES
	(1,'Specialized Demo 8','Theres no room for failure in DH. Thats why our Demo 8 downhill mountain bikes get right down to business. Theyre designed to be the fastest bikes on the track, and with a World Cup overall, its safe to say that we did it right. Youll find 200mm of our FSR suspension aggressive S3 DH race geometry, asymmetrical frames, and 650b wheels. Its a machine primed to give you maximum control over the gnarliest terrain that the mountain can muster.',7500,300,'https://upload.wikimedia.org/wikipedia/commons/c/c2/Downhill_specialized.jpg'),
	(2,'Specialized Tarmac','The Tarmac doesnt do one thing well, it does everything exceptionally—which is why its been ridden to victory in all three Grand Tours. The Tarmacs advanced materials add a modern edge to the lively character of a classic race bike, while its Rider-First Engineered™ design ensures that the Tarmac sprints, corners, and descends with uniform excellence across every size.',8500,250,'https://c2.staticflickr.com/6/5188/5884857927_f49f05b7ca_b.jpg'),
	(3,'Awesome Bike','The awesomest bike ever',4000,250,'https://upload.wikimedia.org/wikipedia/commons/c/c5/Hydrogen_bicycle.jpg'),
	(4,'The best','The best bike ever',2344,5,'https://upload.wikimedia.org/wikipedia/commons/a/a7/Ordinary_bicycle01.jpg'),
	(5,'Crappy Cycle','Nobody wants to ride this',5,1,'https://upload.wikimedia.org/wikipedia/commons/f/fa/Peewee\'s_bike.jpg'),
	(6,'Its not so bad','baller bike',500,4,'https://upload.wikimedia.org/wikipedia/commons/0/0d/Wielermuseum_Roeselare_012.JPG');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
