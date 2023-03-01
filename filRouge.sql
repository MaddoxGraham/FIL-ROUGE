-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: filRouge
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `ADRESSE`
--

DROP TABLE IF EXISTS `ADRESSE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ADRESSE` (
  `IdAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `nominationAdresse` enum('maison','livraison','facturation') DEFAULT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdAdresse`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ADRESSE`
--

LOCK TABLES `ADRESSE` WRITE;
/*!40000 ALTER TABLE `ADRESSE` DISABLE KEYS */;
INSERT INTO `ADRESSE` VALUES (1,'maison','7 Rue de Pre au lard','pre au lard','france','25142',1),(2,'livraison','Rue Victor Krum','QuidditchCity','france','29874',1),(3,'maison','rue du normandy','alliance','france','98547',1),(4,'maison','rue du petit bout','auBout','france','10245',1),(5,'maison','avenue des turien','turienville','bruxelle','35879',0),(6,'maison','jesaispasquoi','jesaispasou','france','32547',1),(7,'livraison','serdaigle dormitary','poudlard','france','78546',1),(8,'facturation','rue du paradis','elliseum','france','65874',1);
/*!40000 ALTER TABLE `ADRESSE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CATEGORIE`
--

DROP TABLE IF EXISTS `CATEGORIE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CATEGORIE` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `nomination` varchar(255) DEFAULT NULL,
  `sousCat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCat`),
  KEY `sousCat` (`sousCat`),
  CONSTRAINT `CATEGORIE_ibfk_1` FOREIGN KEY (`sousCat`) REFERENCES `CATEGORIE` (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CATEGORIE`
--

LOCK TABLES `CATEGORIE` WRITE;
/*!40000 ALTER TABLE `CATEGORIE` DISABLE KEYS */;
INSERT INTO `CATEGORIE` VALUES (1,'Baguettes',NULL),(3,'Baguettes coeur de chêne',1),(4,'Baguettes plume de phoenix',1),(5,'Baguettes crin de Licorne',1),(6,'Robes',8),(7,'Capes',8),(8,'Vetements',NULL),(9,'Gants',8),(10,'Lunettes',8),(11,'chouette',15),(12,'chat',15),(13,'crapaud',15),(14,'rat',15),(15,'Animaux',NULL);
/*!40000 ALTER TABLE `CATEGORIE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLIENT`
--

DROP TABLE IF EXISTS `CLIENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CLIENT` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `dateInsciprtion` datetime NOT NULL DEFAULT curdate(),
  `raisonSociale` varchar(30) DEFAULT NULL,
  `idCoeff` int(11) NOT NULL,
  `idCommercial` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  KEY `idCoeff` (`idCoeff`),
  KEY `idCommercial` (`idCommercial`),
  CONSTRAINT `CLIENT_ibfk_1` FOREIGN KEY (`idCoeff`) REFERENCES `COEFFICIENT` (`idCoeff`),
  CONSTRAINT `CLIENT_ibfk_2` FOREIGN KEY (`idCommercial`) REFERENCES `COMMERCIAL` (`idCommercial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLIENT`
--

LOCK TABLES `CLIENT` WRITE;
/*!40000 ALTER TABLE `CLIENT` DISABLE KEYS */;
INSERT INTO `CLIENT` VALUES (1,'Rose','Lisa','L.Rose@gmail.com','06-02-54-68-25','LisaRose','LisaRoseRocks','2023-02-23 15:24:31','NULL',1,3),(2,'Moreau','Jeff','Alliance4Ever@gmail.com','09-66-54-25-68','Joker','sr2pilots','2023-02-23 15:24:31',NULL,1,1),(3,'Vakarian','Garrus','Calibration@hotmail.com','06-55-68-47-01','Archangel','calibrate4life','2023-02-23 15:24:31','CALIBRATECORP',2,2),(4,'Harper','Jack','Harper@yahoo.fr','09-96-02-57-22','IllusiveMan','letsallbetraitors','2023-02-23 15:24:31',NULL,1,5),(5,'Zero','Jack','fuckyou@gmail.com','09-10-58-24-74','Subject0','bioticsispower','2023-02-23 15:24:31',NULL,1,4);
/*!40000 ALTER TABLE `CLIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COEFFICIENT`
--

DROP TABLE IF EXISTS `COEFFICIENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COEFFICIENT` (
  `idCoeff` int(11) NOT NULL AUTO_INCREMENT,
  `nomination` varchar(50) DEFAULT NULL,
  `montant` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idCoeff`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COEFFICIENT`
--

LOCK TABLES `COEFFICIENT` WRITE;
/*!40000 ALTER TABLE `COEFFICIENT` DISABLE KEYS */;
INSERT INTO `COEFFICIENT` VALUES (1,'particulier',NULL),(2,'professionnel',25);
/*!40000 ALTER TABLE `COEFFICIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COMMANDE`
--

DROP TABLE IF EXISTS `COMMANDE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COMMANDE` (
  `idCom` int(11) NOT NULL AUTO_INCREMENT,
  `dateCom` datetime NOT NULL DEFAULT curdate(),
  `reduction` int(11) DEFAULT NULL,
  `TotalTTC` decimal(5,0) DEFAULT NULL,
  `statut` enum('en cours','clos') NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCom`,`dateCom`),
  KEY `COMMANDE_ibfk_1` (`idClient`),
  CONSTRAINT `COMMANDE_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `CLIENT` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMMANDE`
--

LOCK TABLES `COMMANDE` WRITE;
/*!40000 ALTER TABLE `COMMANDE` DISABLE KEYS */;
INSERT INTO `COMMANDE` VALUES (1,'2023-02-24 09:22:13',NULL,NULL,'clos',4),(5,'2023-02-28 16:36:30',NULL,NULL,'en cours',3),(7,'2023-03-01 08:45:31',NULL,NULL,'clos',5);
/*!40000 ALTER TABLE `COMMANDE` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`admin`@`localhost`*/ /*!50003 TRIGGER CreerHistorique AFTER UPDATE ON COMMANDE
FOR EACH ROW
    BEGIN
        DECLARE CurrentCom INT;
        DECLARE CurrentIdCli INT;
        DECLARE CurrentDateCom DATETIME;
        DECLARE CurrentNom VARCHAR(50); 
        DECLARE CurrentPrenom VARCHAR(50); 
        DECLARE CurrentMail VARCHAR(50); 
        DECLARE CurrentTel VARCHAR(50); 
        DECLARE CurrentRaisonSociale VARCHAR(50);  
		DECLARE CurrentStatut VARCHAR(50);
        DECLARE OldStat VARCHAR(255);
        DECLARE NewStat VARCHAR(255);

        SET CurrentCom = OLD.idCom;
        SET CurrentIdCli = OLD.idClient;
        SET CurrentDateCom = OLD.dateCom;
        SET CurrentNom = (SELECT C.nom from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentPrenom = (SELECT C.prenom from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentMail = (SELECT C.mail from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentTel = (SELECT C.telephone from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentRaisonSociale = (SELECT C.raisonSociale from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
		SET CurrentStatut = NEW.statut ;
        SET OldStat = OLD.statut;        
        
    IF CurrentStatut = 'clos' AND OldStat != 'clos'
    THEN
    INSERT INTO HISTORIQUE (
        HISTORIQUE.idClient,
        HISTORIQUE.idCom,
        HISTORIQUE.dateCom,
        HISTORIQUE.nomHistorique,
        HISTORIQUE.prenomHistorique,
        HISTORIQUE.mailHistorique,
        HISTORIQUE.telephoneHistorique,
        HISTORIQUE.raisonsocialeHistorique) VALUES(CurrentIdCli,CurrentCom,CurrentDateCom,CurrentNom,CurrentPrenom,CurrentMail,CurrentTel,CurrentRaisonSociale);
        END IF;
        IF OldStat = 'clos'
        THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Aucun accès aux valeurs archivées. ';
        END IF;
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `COMMERCIAL`
--

DROP TABLE IF EXISTS `COMMERCIAL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COMMERCIAL` (
  `idCommercial` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `specificite` enum('particuliers','professionnels') DEFAULT NULL,
  PRIMARY KEY (`idCommercial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMMERCIAL`
--

LOCK TABLES `COMMERCIAL` WRITE;
/*!40000 ALTER TABLE `COMMERCIAL` DISABLE KEYS */;
INSERT INTO `COMMERCIAL` VALUES (1,'Shepard','John','particuliers'),(2,'Urdnot','Wrex','professionnels'),(3,'Solus','Mordin','particuliers'),(4,'T\'Soni','Liara','particuliers'),(5,'Krios','Thane','professionnels');
/*!40000 ALTER TABLE `COMMERCIAL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FACTURE`
--

DROP TABLE IF EXISTS `FACTURE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FACTURE` (
  `numeroFact` int(11) NOT NULL AUTO_INCREMENT,
  `delaisPayement` date DEFAULT NULL,
  `modePayement` enum('virement','cheque','CB') DEFAULT NULL,
  `datePayement` date DEFAULT NULL,
  `idCom` int(11) DEFAULT NULL,
  `dateCom` datetime DEFAULT NULL,
  PRIMARY KEY (`numeroFact`),
  KEY `idCom` (`idCom`,`dateCom`),
  CONSTRAINT `FACTURE_ibfk_1` FOREIGN KEY (`idCom`, `dateCom`) REFERENCES `COMMANDE` (`idCom`, `dateCom`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FACTURE`
--

LOCK TABLES `FACTURE` WRITE;
/*!40000 ALTER TABLE `FACTURE` DISABLE KEYS */;
INSERT INTO `FACTURE` VALUES (1,'2023-02-24','CB','2023-02-24',1,'2023-02-24 09:22:13'),(3,'2023-02-28','cheque',NULL,5,'2023-02-28 16:36:30');
/*!40000 ALTER TABLE `FACTURE` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`admin`@`localhost`*/ /*!50003 TRIGGER `CalculDelais` AFTER INSERT ON `FACTURE` FOR EACH ROW BEGIN

	DECLARE PayementPrevu DATE;
    DECLARE DateCommande DATE;
    DECLARE DateActuelle DATE; 
    
    SET DateCommande = (SELECT new.dateCom from COMMANDE LIMIT 1 ) ;
	SET PayementPrevu = (SELECT DATE_ADD(DateCommande, INTERVAL 90 DAY)) ;
	
    INSERT INTO FACTURE (delaisPayement) VALUES (PayementPrevu);
 	
  
    
/*	SELECT COEFFICIENT.nomination, CLIENT.nom, COMMANDE.idCom, FACTURE.idCom from FACTURE
    JOIN COMMANDE ON COMMANDE.idCom = FACTURE.idCom
    JOIN CLIENT ON CLIENT.idClient = COMMANDE.idClient
    JOIN COEFFICIENT ON CLIENT.idCoeff = COEFFICIENT.idCoeff 
    where COEFFICIENT.idCoeff = 2 */
    
 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `FOURNISSEUR`
--

DROP TABLE IF EXISTS `FOURNISSEUR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FOURNISSEUR` (
  `RefFournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nomination` varchar(255) NOT NULL,
  PRIMARY KEY (`RefFournisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOURNISSEUR`
--

LOCK TABLES `FOURNISSEUR` WRITE;
/*!40000 ALTER TABLE `FOURNISSEUR` DISABLE KEYS */;
INSERT INTO `FOURNISSEUR` VALUES (1,'Ollivander'),(3,'Gaichiffon'),(4,'Animaux et Crin de cheval'),(5,'HoneyDuck');
/*!40000 ALTER TABLE `FOURNISSEUR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `FOURNISSEURPRODUIT`
--

DROP TABLE IF EXISTS `FOURNISSEURPRODUIT`;
/*!50001 DROP VIEW IF EXISTS `FOURNISSEURPRODUIT`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `FOURNISSEURPRODUIT` AS SELECT
 1 AS `RefProduit`,
  1 AS `shortLibel`,
  1 AS `prxHT`,
  1 AS `RefFournisseur`,
  1 AS `nomination` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `HABITE`
--

DROP TABLE IF EXISTS `HABITE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HABITE` (
  `idClient` int(11) NOT NULL,
  `IdAdresse` int(11) NOT NULL,
  PRIMARY KEY (`idClient`,`IdAdresse`),
  KEY `IdAdresse` (`IdAdresse`),
  CONSTRAINT `HABITE_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `CLIENT` (`idClient`),
  CONSTRAINT `HABITE_ibfk_2` FOREIGN KEY (`IdAdresse`) REFERENCES `ADRESSE` (`IdAdresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HABITE`
--

LOCK TABLES `HABITE` WRITE;
/*!40000 ALTER TABLE `HABITE` DISABLE KEYS */;
INSERT INTO `HABITE` VALUES (1,4),(1,6),(2,3),(3,6),(4,1),(4,2),(5,5),(5,8);
/*!40000 ALTER TABLE `HABITE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HISTORIQUE`
--

DROP TABLE IF EXISTS `HISTORIQUE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HISTORIQUE` (
  `idClient` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `dateCom` datetime NOT NULL,
  `nomHistorique` varchar(50) NOT NULL,
  `prenomHistorique` varchar(50) NOT NULL,
  `mailHistorique` varchar(50) NOT NULL,
  `telephoneHistorique` varchar(50) DEFAULT NULL,
  `raisonsocialeHistorique` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idClient`,`idCom`,`dateCom`),
  KEY `HISTORIQUE_ibfk_2` (`idCom`,`dateCom`),
  CONSTRAINT `HISTORIQUE_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `CLIENT` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `HISTORIQUE_ibfk_2` FOREIGN KEY (`idCom`, `dateCom`) REFERENCES `COMMANDE` (`idCom`, `dateCom`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HISTORIQUE`
--

LOCK TABLES `HISTORIQUE` WRITE;
/*!40000 ALTER TABLE `HISTORIQUE` DISABLE KEYS */;
INSERT INTO `HISTORIQUE` VALUES (4,1,'2023-02-24 09:22:13','Harper','Jack','Harper@yahoo.fr','09-96-02-57-22',NULL),(5,7,'2023-03-01 08:45:31','Zero','Jack','fuckyou@gmail.com','09-10-58-24-74',NULL);
/*!40000 ALTER TABLE `HISTORIQUE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LIGNECOMMANDE`
--

DROP TABLE IF EXISTS `LIGNECOMMANDE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LIGNECOMMANDE` (
  `reference` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `prix` decimal(5,2) DEFAULT NULL,
  `RefProduit` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `dateCom` datetime NOT NULL,
  PRIMARY KEY (`reference`),
  KEY `RefProduit` (`RefProduit`),
  KEY `idCom` (`idCom`,`dateCom`),
  CONSTRAINT `LIGNECOMMANDE_ibfk_1` FOREIGN KEY (`RefProduit`) REFERENCES `PRODUIT` (`RefProduit`),
  CONSTRAINT `LIGNECOMMANDE_ibfk_2` FOREIGN KEY (`idCom`, `dateCom`) REFERENCES `COMMANDE` (`idCom`, `dateCom`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIGNECOMMANDE`
--

LOCK TABLES `LIGNECOMMANDE` WRITE;
/*!40000 ALTER TABLE `LIGNECOMMANDE` DISABLE KEYS */;
INSERT INTO `LIGNECOMMANDE` VALUES (1,2,'Baguette rouge',NULL,112,1,'2023-02-24 09:22:13');
/*!40000 ALTER TABLE `LIGNECOMMANDE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LISTER`
--

DROP TABLE IF EXISTS `LISTER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LISTER` (
  `RefProduit` int(11) NOT NULL,
  `idLiv` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `IdBonCommande` int(11) NOT NULL,
  PRIMARY KEY (`RefProduit`,`idLiv`,`IdBonCommande`),
  KEY `idLiv` (`idLiv`),
  CONSTRAINT `LISTER_ibfk_1` FOREIGN KEY (`RefProduit`) REFERENCES `PRODUIT` (`RefProduit`),
  CONSTRAINT `LISTER_ibfk_2` FOREIGN KEY (`idLiv`) REFERENCES `LIVRAISON` (`idLiv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LISTER`
--

LOCK TABLES `LISTER` WRITE;
/*!40000 ALTER TABLE `LISTER` DISABLE KEYS */;
INSERT INTO `LISTER` VALUES (112,1,1,'Baguette rouge',1),(112,1,1,'Baguette rouge',2);
/*!40000 ALTER TABLE `LISTER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LIVRAISON`
--

DROP TABLE IF EXISTS `LIVRAISON`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LIVRAISON` (
  `idLiv` int(11) NOT NULL AUTO_INCREMENT,
  `dateLivraison` date NOT NULL,
  `idCom` int(11) NOT NULL,
  `dateCom` datetime NOT NULL,
  PRIMARY KEY (`idLiv`),
  KEY `idCom` (`idCom`,`dateCom`),
  CONSTRAINT `LIVRAISON_ibfk_1` FOREIGN KEY (`idCom`, `dateCom`) REFERENCES `COMMANDE` (`idCom`, `dateCom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIVRAISON`
--

LOCK TABLES `LIVRAISON` WRITE;
/*!40000 ALTER TABLE `LIVRAISON` DISABLE KEYS */;
INSERT INTO `LIVRAISON` VALUES (1,'2023-02-27',1,'2023-02-24 09:22:13');
/*!40000 ALTER TABLE `LIVRAISON` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PHOTOS`
--

DROP TABLE IF EXISTS `PHOTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PHOTOS` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `majorPicture` tinyint(1) NOT NULL,
  `RefProduit` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `RefProduit` (`RefProduit`),
  CONSTRAINT `PHOTOS_ibfk_1` FOREIGN KEY (`RefProduit`) REFERENCES `PRODUIT` (`RefProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PHOTOS`
--

LOCK TABLES `PHOTOS` WRITE;
/*!40000 ALTER TABLE `PHOTOS` DISABLE KEYS */;
INSERT INTO `PHOTOS` VALUES (1,'src imgage baguette accacia',0,112),(2,'PRIMARY src imgage baguette accacia',1,112),(3,'src imgage baguette accacia',0,112),(4,'PRIMARY src imgage baguette beige',1,113),(5,'src imgage baguette blanche',0,115),(6,'PRIMARY src imgage baguette blanche',1,115),(7,'src imgage baguette blanche',0,115),(8,'src imgage baguette blanche',0,115),(9,'src imgage baguette rouge',0,100),(10,'PRIMARY src imgage baguette rouge',1,100),(11,'PRIMARY src imgage chat gris',1,104),(12,'src imgage chat gris',0,104),(13,'src imgage chat gris',0,104),(14,'PRIMARY src imgage chat roux',1,103),(15,'PRIMARY src imgage chouette blanche',1,111),(16,'src imgage chouette blanche',0,111),(17,'src imgage chouette blanche',0,111),(18,'src imgage chouette blanche',0,111),(19,'PRIMARY src imgage chouette brune',1,109),(20,'src imgage chouette brune',0,109),(21,'PRIMARY src imgage crapeau chanteur',1,114),(22,'src imgage crapeau chanteur',0,114),(23,'src imgage crapeau chanteur',0,114),(24,'src imgage crapeau chanteur',0,114),(25,'PRIMARY src imgage gants de quidditch',1,107),(26,' src imgage gants de quidditch',0,107),(27,' PRIMARY src imgage lunettes rondes',1,110),(28,'PRIMARY src imgage rat blanc',1,108),(29,'src imgage rat blanc',0,108),(30,'src imgage rat blanc',0,108),(31,'PRIMARY src img robe de maison',1,106),(32,'src img robe de maison',0,106),(33,'src img robe de maison',0,106),(34,'src img robe de maison',0,106),(35,'src img robe de maison',0,106),(36,'PRIMARY src img robe de maison SERDAIGLE',1,105),(37,'src img robe de maison SERDAIGLE',0,105),(38,'src img robe de maison SERDAIGLE',0,105);
/*!40000 ALTER TABLE `PHOTOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUIT`
--

DROP TABLE IF EXISTS `PRODUIT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUIT` (
  `RefProduit` int(11) NOT NULL AUTO_INCREMENT,
  `shortLibel` varchar(255) NOT NULL,
  `longLibel` text DEFAULT NULL,
  `prxHT` decimal(5,0) NOT NULL,
  `idCat` int(11) NOT NULL,
  PRIMARY KEY (`RefProduit`),
  KEY `idCat` (`idCat`),
  CONSTRAINT `PRODUIT_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `CATEGORIE` (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUIT`
--

LOCK TABLES `PRODUIT` WRITE;
/*!40000 ALTER TABLE `PRODUIT` DISABLE KEYS */;
INSERT INTO `PRODUIT` VALUES (100,'Baguette rouge','manche en bois d accacia, son coeur de chêne permet de viser les plus hauts pouvoir, bonne prise en main',95,3),(103,'Chat roux','sage et prêt à metamorphoser ce petit chat roux pourras vous accompagner durant votre année a poudlard',150,12),(104,'Chat gris','Ce petit chat espiègle et malin saura vous accompagner dans vos cours tout autant qu il vous fera tourner en bourique ! ',149,12),(105,'Robe de Serdaigle','Robe de la maison Serdaigle, son fil à tisser magique vous assurera les premieres pages du Sorier bien Fringué',57,7),(106,'Robe de maison','robe de maison basique noire en fil de jobarbille, peut se décliner selon la maison de son possesseur',16,7),(107,'gants de quidditch','gants de Quidditch renforcés en peau de dragon',8,9),(108,'rat blanc','ce petit accolyte vous permettra de suivre vos cours de methamorphose convenablement',42,14),(109,'Chouette brune','parfaite pour les longs courriers cette chouette vous permettra de garder le contact avec vos proche',79,11),(110,'Lunettes ronde','Lunettes rondes pour un style sans erreurs',11,10),(111,'Chouette blanche','rapide et discrète, cette chouette vous assurera une correspondance fiable et rapide',106,11),(112,'Baguette accacia','Baguette en bois d accacia avec coeur de dragon et plume de phoenix',190,4),(113,'Baguette beige','cette baguette vous permettra de maitriser les sorts de soins, avec sn coeur en plume de phoenix',255,4),(114,'Crapeaux chanteur','parfait pour un soliste ou un eleve du coeur des grenouilles, crapeau accordé en fa mineur',100,13),(115,'Baguette blanche','Avec son coeur en crin de licorne, cette baguette vous accordera un pouvoir lumineux',188,5);
/*!40000 ALTER TABLE `PRODUIT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `PRODUITSCATEGORIES`
--

DROP TABLE IF EXISTS `PRODUITSCATEGORIES`;
/*!50001 DROP VIEW IF EXISTS `PRODUITSCATEGORIES`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `PRODUITSCATEGORIES` AS SELECT
 1 AS `shortLibel`,
  1 AS `NomCategorie`,
  1 AS `NomSousCategorie` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `STOCKER`
--

DROP TABLE IF EXISTS `STOCKER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STOCKER` (
  `RefProduit` int(11) NOT NULL,
  `RefFournisseur` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`RefProduit`,`RefFournisseur`),
  KEY `RefFournisseur` (`RefFournisseur`),
  CONSTRAINT `STOCKER_ibfk_1` FOREIGN KEY (`RefProduit`) REFERENCES `PRODUIT` (`RefProduit`),
  CONSTRAINT `STOCKER_ibfk_2` FOREIGN KEY (`RefFournisseur`) REFERENCES `FOURNISSEUR` (`RefFournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STOCKER`
--

LOCK TABLES `STOCKER` WRITE;
/*!40000 ALTER TABLE `STOCKER` DISABLE KEYS */;
INSERT INTO `STOCKER` VALUES (100,1,1),(103,4,8),(104,4,3),(105,3,2),(106,3,54),(107,3,15),(108,4,4),(109,4,15),(110,5,5),(111,4,2),(112,1,2),(113,1,3),(114,4,25);
/*!40000 ALTER TABLE `STOCKER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `FOURNISSEURPRODUIT`
--

/*!50001 DROP VIEW IF EXISTS `FOURNISSEURPRODUIT`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `FOURNISSEURPRODUIT` AS select `PRODUIT`.`RefProduit` AS `RefProduit`,`PRODUIT`.`shortLibel` AS `shortLibel`,`PRODUIT`.`prxHT` AS `prxHT`,`FOURNISSEUR`.`RefFournisseur` AS `RefFournisseur`,`FOURNISSEUR`.`nomination` AS `nomination` from ((`PRODUIT` join `STOCKER` on(`PRODUIT`.`RefProduit` = `STOCKER`.`RefProduit`)) join `FOURNISSEUR` on(`STOCKER`.`RefFournisseur` = `FOURNISSEUR`.`RefFournisseur`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `PRODUITSCATEGORIES`
--

/*!50001 DROP VIEW IF EXISTS `PRODUITSCATEGORIES`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `PRODUITSCATEGORIES` AS select `PRODUIT`.`shortLibel` AS `shortLibel`,`CAT1`.`nomination` AS `NomCategorie`,`CAT2`.`nomination` AS `NomSousCategorie` from ((`CATEGORIE` `CAT1` join `CATEGORIE` `CAT2` on(`CAT1`.`idCat` = `CAT2`.`sousCat`)) join `PRODUIT` on(`CAT2`.`idCat` = `PRODUIT`.`idCat`)) order by `CAT1`.`nomination` */;
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

-- Dump completed on 2023-03-01  9:34:31
