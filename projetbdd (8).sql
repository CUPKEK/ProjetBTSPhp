-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mars 2019 à 09:54
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `NomCli` varchar(50) NOT NULL,
  `PrenomCli` varchar(50) NOT NULL,
  `MailCli` varchar(50) NOT NULL,
  `UsernameCli` varchar(50) NOT NULL,
  `NumeroCli` varchar(10) NOT NULL,
  `MdpCli` varchar(50) NOT NULL,
  `CreditCli` int(11) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `PaysCli` varchar(10) NOT NULL,
  `dateAjout` date DEFAULT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `NomCli`, `PrenomCli`, `MailCli`, `UsernameCli`, `NumeroCli`, `MdpCli`, `CreditCli`, `Admin`, `PaysCli`, `dateAjout`) VALUES
(1, 'Ruff', 'Hugo', 'hugo.ruffus@hotmail.fr', 'CUPKEK', '0601251510', 'azerty', 250, 0, 'France', NULL),
(2, 'BOB', 'DYLAN', 'BOB@BOB.BOB', 'BOB', '0601251510', 'azerty', 500, 0, 'France', NULL),
(3, 'Admin', 'Admin', 'admin@admin.fr', 'Admin', '1', 'admin', 0, 1, 'France', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historique_produit`
--

DROP TABLE IF EXISTS `historique_produit`;
CREATE TABLE IF NOT EXISTS `historique_produit` (
  `idProduit` int(11) NOT NULL,
  `PrixProduit` int(11) NOT NULL,
  `PoidProduit` int(11) NOT NULL,
  `NomProduit` varchar(50) NOT NULL,
  `DescriptionProduit` varchar(500) NOT NULL,
  `CouleurProduit` varchar(50) NOT NULL,
  `idclient` int(11) NOT NULL,
  `dateDelete` date NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique_produit`
--

INSERT INTO `historique_produit` (`idProduit`, `PrixProduit`, `PoidProduit`, `NomProduit`, `DescriptionProduit`, `CouleurProduit`, `idclient`, `dateDelete`) VALUES
(10, 50, 10, 'Tabouret', 'Je vends un lot de tabouret en très bon état. ', 'Beige', 2, '2019-03-06');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `idclient` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Image_Client_FK` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `idclient`) VALUES
(2, 'Fer à repasser.jpg', '2019-01-21 10:46:03', '1', 1),
(3, 'Chaise de Bureau.jpg', '2019-01-21 15:36:55', '1', 1),
(4, 'Chaise de Camping.jpg', '2019-01-21 15:38:19', '1', 1),
(5, '33-Mignonne-Outil-De-Jardin-Photo-Home-Design-Mobilier-Décorer.jpg', '2019-01-21 15:39:35', '1', 1),
(6, 'produitbeauté.jpg', '2019-01-21 15:43:58', '1', 2),
(7, 'meunle.jpg', '2019-01-21 15:45:23', '1', 2),
(8, 'Chaise Design.jpg', '2019-01-28 14:03:19', '1', 2),
(9, 'Transat.jpg', '2019-02-11 10:59:34', '1', 2),
(10, 'Tabouret.jpg', '2019-02-11 16:55:39', '1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `PrixProduit` int(11) NOT NULL,
  `StockProduit` int(11) NOT NULL,
  `PoidProduit` int(11) NOT NULL,
  `NomProduit` varchar(50) NOT NULL,
  `DescriptionProduit` varchar(500) NOT NULL,
  `CouleurProduit` varchar(50) NOT NULL,
  `idclient` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `Produit_Client_FK` (`idclient`),
  KEY `idclient` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `PrixProduit`, `StockProduit`, `PoidProduit`, `NomProduit`, `DescriptionProduit`, `CouleurProduit`, `idclient`) VALUES
(2, 50, 1, 5, 'Fer à repasser', 'Fer à repasser en vente', 'Blanc', 1),
(3, 30, 1, 10, 'Chaise de Bureau', 'Chaise de bureau vraiment pas chère', 'Noir', 1),
(4, 10, 1, 2, 'Chaise de Camping', 'Chaise de Camping en vente car je ne m\'en sers plus', 'Bleu', 1),
(5, 50, 1, 10, 'Lot d\'outil de jardin', 'Je vends mes outils de jardin car je ne m\'en sers plus', 'Beige', 1),
(6, 150, 1, 5, 'Lot de 50 produits de beauté', 'Je vends un lot de produit de beauté que j\'ai reçu pour noël', 'Rouge', 2),
(7, 100, 1, 20, 'Meuble télévision', 'Mise en vente d\'un meuble télé en bois plaqué', 'Beige', 2),
(8, 50, 4, 2, 'Chaise de salon', 'Chaise de salon designe à vendre pas chère', 'Jaune', 2),
(9, 30, 2, 10, 'Transat', 'Je mets en vente une paire de transat très peu usée que j\'ai reçu l\'année dernière.', 'Gris', 2);

--
-- Déclencheurs `produit`
--
DROP TRIGGER IF EXISTS `ajout_historique_produit`;
DELIMITER $$
CREATE TRIGGER `ajout_historique_produit` AFTER DELETE ON `produit` FOR EACH ROW BEGIN
       INSERT INTO historique_produit(
          idProduit,
          PrixProduit,
          PoidProduit,
          NomProduit,
          DescriptionProduit,
          CouleurProduit,
          idclient,
          dateDelete)
          VALUES(
          OLD.idProduit,
          OLD.PrixProduit,
          OLD.PoidProduit,
          OLD.NomProduit,
          OLD.DescriptionProduit,
          OLD.CouleurProduit,
          OLD.idclient,
          NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `typeproduit`
--

DROP TABLE IF EXISTS `typeproduit`;
CREATE TABLE IF NOT EXISTS `typeproduit` (
  `idtypeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(50) NOT NULL,
  `Marque` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtypeProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeproduit`
--

INSERT INTO `typeproduit` (`idtypeProduit`, `Categorie`, `Marque`) VALUES
(2, 'Electronique', 'Moulinex'),
(3, 'Chaise', 'Ikea'),
(4, 'Chaise', 'Decatlon'),
(5, 'Jardin', 'Botanic'),
(6, 'Beaute', 'Sephora'),
(7, 'Meuble', 'Ikea'),
(8, 'Chaise', 'Roche Bobois'),
(9, 'Chaise', 'Botanic'),
(10, 'Chaise', 'Ikea');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
