-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 nov. 2022 à 15:14
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leboncoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `idAnnonce` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `prix` double NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(500) NOT NULL,
  `idCategorie` int NOT NULL,
  `IdUser` int NOT NULL,
  `codeLocalisation` varchar(3) NOT NULL,
  PRIMARY KEY (`idAnnonce`),
  KEY `fk_userAnnonce` (`IdUser`),
  KEY `FK_localisation_annonce` (`codeLocalisation`),
  KEY `FK_cat_annonce` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`) VALUES
(1, 'Véhicule'),
(2, 'Mode'),
(3, 'Jeu de société'),
(4, 'Jeu vidéo'),
(5, 'Livre/BD/Manga'),
(6, 'Musique'),
(7, 'Sport'),
(8, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

DROP TABLE IF EXISTS `localisation`;
CREATE TABLE IF NOT EXISTS `localisation` (
  `codeDep` varchar(3) NOT NULL,
  `dep` varchar(23) NOT NULL,
  PRIMARY KEY (`codeDep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`codeDep`, `dep`) VALUES
('02', 'Aisne'),
('03', 'Allier'),
('04', 'Alpes-de-Haute-Provence'),
('05', 'Hautes-Alpes'),
('06', 'Alpes-Maritimes'),
('07', 'Ardèche'),
('08', 'Ardennes'),
('09', 'Ariège'),
('10', 'Aube'),
('11', 'Aude'),
('12', 'Aveyron'),
('13', 'Bouches-du-Rhône'),
('14', 'Calvados'),
('15', 'Cantal'),
('16', 'Charente'),
('17', 'Charente-Maritime'),
('18', 'Cher'),
('19', 'Corrèze'),
('21', 'Côte-d\'Or'),
('22', 'Côtes-d\'Armor'),
('23', 'Creuse'),
('24', 'Dordogne'),
('25', 'Doubs'),
('26', 'Drôme'),
('27', 'Eure'),
('28', 'Eure-et-Loir'),
('29', 'Finistère'),
('2A', 'Corse-du-Sud'),
('2B', 'Haute-Corse'),
('30', 'Gard'),
('31', 'Haute-Garonne'),
('32', 'Gers'),
('33', 'Gironde'),
('34', 'Hérault'),
('35', 'Ille-et-Vilaine'),
('36', 'Indre'),
('37', 'Indre-et-Loire'),
('38', 'Isère'),
('39', 'Jura'),
('40', 'Landes'),
('41', 'Loir-et-Cher'),
('42', 'Loire'),
('43', 'Haute-Loire'),
('44', 'Loire-Atlantique'),
('45', 'Loiret'),
('46', 'Lot'),
('47', 'Lot-et-Garonne'),
('48', 'Lozère'),
('49', 'Maine-et-Loire'),
('50', 'Manche'),
('51', 'Marne'),
('52', 'Haute-Marne'),
('53', 'Mayenne'),
('54', 'Meurthe-et-Moselle'),
('55', 'Meuse'),
('56', 'Morbihan'),
('57', 'Moselle'),
('58', 'Nièvre'),
('59', 'Nord'),
('60', 'Oise'),
('61', 'Orne'),
('62', 'Pas-de-Calais'),
('63', 'Puy-de-Dôme'),
('64', 'Pyrénées-Atlantiques'),
('65', 'Hautes-Pyrénées'),
('66', 'Pyrénées-Orientales'),
('67', 'Bas-Rhin'),
('68', 'Haut-Rhin'),
('69', 'Rhône'),
('70', 'Haute-Saône'),
('71', 'Saône-et-Loire'),
('72', 'Sarthe'),
('73', 'Savoie'),
('74', 'Haute-Savoie'),
('75', 'Paris'),
('76', 'Seine-Maritime'),
('77', 'Seine-et-Marne'),
('78', 'Yvelines'),
('79', 'Deux-Sèvres'),
('80', 'Somme'),
('81', 'Tarn'),
('82', 'Tarn-et-Garonne'),
('83', 'Var'),
('84', 'Vaucluse'),
('85', 'Vendée'),
('86', 'Vienne'),
('87', 'Haute-Vienne'),
('88', 'Vosges'),
('89', 'Yonne'),
('90', 'Territoire de Belfort'),
('91', 'Essonne'),
('92', 'Hauts-de-Seine'),
('93', 'Seine-St-Denis'),
('94', 'Val-de-Marne'),
('95', 'Val-D\'Oise'),
('971', 'Guadeloupe'),
('972', 'Martinique'),
('973', 'Guyane'),
('974', 'La Réunion'),
('976', 'Mayotte');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idsender` int NOT NULL,
  `idReceiver` int NOT NULL,
  `Content` text NOT NULL,
  `idAnnonce` int NOT NULL,
  `deliveredTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `fk_messageUser` (`idsender`),
  KEY `fk_messageReceiver` (`idReceiver`),
  KEY `fk_annonce` (`idAnnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `useraccount`
--

DROP TABLE IF EXISTS `useraccount`;
CREATE TABLE IF NOT EXISTS `useraccount` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `AccountCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `useraccount`
--

INSERT INTO `useraccount` (`idUser`, `userName`, `Tel`, `Email`, `Password`, `AccountCreationDate`) VALUES
(1, 'alexis', '0665879541', 'alexis@leboncoin.com', 'powerisbetter', '2022-11-22 18:01:58'),
(3, 'Mohamed', '0665879541', 'mohamed@leboncoin.com', 'nani?', '2022-11-22 19:08:20'),
(4, 'joel', '0123456789', 'joel@ndjate.fr', 'ilovemakima', '2022-11-26 14:17:35'),
(6, 'hamid', '0987654321', 'hamid@leboncoin.fr', 'test', '2022-11-26 14:21:10'),
(7, 'sanctifie', '6666666666', 'canctifie@bre.com', 'lol', '2022-11-26 14:21:10');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `FK_cat_annonce` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_localisation_annonce` FOREIGN KEY (`codeLocalisation`) REFERENCES `localisation` (`codeDep`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userAnnonce` FOREIGN KEY (`IdUser`) REFERENCES `useraccount` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_annonce` FOREIGN KEY (`idAnnonce`) REFERENCES `annonce` (`idAnnonce`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_messageReceiver` FOREIGN KEY (`idReceiver`) REFERENCES `useraccount` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_messageUser` FOREIGN KEY (`idsender`) REFERENCES `useraccount` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
