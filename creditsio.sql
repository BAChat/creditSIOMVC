-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 sep. 2020 à 13:40
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `creditsio`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `CLIENTNUM` varchar(5) NOT NULL,
  `CLIENTNOM` varchar(25) DEFAULT NULL,
  `CLIENTPRENOM` varchar(15) DEFAULT NULL,
  `CLIENTRUE` varchar(50) DEFAULT NULL,
  `CLIENTCP` varchar(5) DEFAULT NULL,
  `CLIENTVILLE` varchar(50) DEFAULT NULL,
  `CLIENTMOBILE` varchar(14) DEFAULT NULL,
  `CLIENTMAIL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CLIENTNUM`)
) ENGINE=innodb DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`CLIENTNUM`, `CLIENTNOM`, `CLIENTPRENOM`, `CLIENTRUE`, `CLIENTCP`, `CLIENTVILLE`, `CLIENTMOBILE`, `CLIENTMAIL`) VALUES
('CLI01', 'MICHEL', 'BERNARD', '13 Chemin des Chassagnes', '69600', 'OULLINS', '07-04-32-88-00', 'b.michel@gmail.com'),
('CLI02', 'CHELIM', 'BERTRAND', '151 Grande Rue', '69600', 'OULLINS', '07-05-33-89-10', 'b.chelim@gmail.com'),
('CLI03', 'MECHIL', 'BASTIEN', '127 rue Stephane Déchamp', '69600', 'OULLINS', '07-06-33-89-20', 'b.mechil@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `COMPTENum` varchar(5) NOT NULL,
  `COMPTESOLDE` double DEFAULT NULL,
  `CLIENTNUM` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`COMPTENum`),
  KEY `FK_COMPTE_CLIENT` (`CLIENTNUM`)
) ENGINE=innodb DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`COMPTENum`, `COMPTESOLDE`, `CLIENTNUM`) VALUES
('51122', 250, 'CLI01'),
('52233', 500, 'CLI01'),
('53234', 1500, 'CLI02'),
('54243', 100, 'CLI02'),
('55253', 200, 'CLI03'),
('52763', 600, 'CLI03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
