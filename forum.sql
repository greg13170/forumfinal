-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 juil. 2018 à 14:50
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(5) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mp`
--

DROP TABLE IF EXISTS `mp`;
CREATE TABLE IF NOT EXISTS `mp` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_envoyeur` int(5) NOT NULL,
  `id_receveur` int(5) NOT NULL,
  `pseudo_envoyeur` text NOT NULL,
  `titre` text NOT NULL,
  `text` text NOT NULL,
  `lu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `msg_topic`
--

DROP TABLE IF EXISTS `msg_topic`;
CREATE TABLE IF NOT EXISTS `msg_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  `pseudo_createur` text NOT NULL,
  `titre` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_forum` int(5) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `pseudo_createur` text NOT NULL,
  `id_createur` int(5) NOT NULL,
  `premier_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(5) NOT NULL AUTO_INCREMENT COMMENT 'identifiant user',
  `pseudo` text NOT NULL COMMENT 'pseudo affiché',
  `username` text NOT NULL COMMENT 'identifiant connexion',
  `password` text NOT NULL COMMENT 'password connexion',
  `email` text NOT NULL COMMENT 'email utilisateur',
  `rang` int(5) NOT NULL COMMENT 'rang de droit utilisateur',
  `signature` text COMMENT 'signature user',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='Table comptes utilisateurs';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
