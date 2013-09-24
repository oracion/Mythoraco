-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 23 Septembre 2013 à 19:52
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mythoracodb`
--

-- --------------------------------------------------------

--
-- Structure de la table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `userid` int(11) NOT NULL,
  `levelfire` int(11) NOT NULL,
  `levelwater` int(11) NOT NULL,
  `levelair` int(11) NOT NULL,
  `levelearth` int(11) NOT NULL,
  `levelquarry` int(11) NOT NULL,
  `levelquartz` int(11) NOT NULL,
  `levelsawmill` int(11) NOT NULL,
  `leveliron` int(11) NOT NULL,
  `levelhouse` int(11) NOT NULL,
  `leveltemple` int(11) NOT NULL,
  `levelbath` int(11) NOT NULL,
  `levelmarket` int(11) NOT NULL,
  `levelarmory` int(11) NOT NULL,
  `levelcity` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table pour stocker les niveaux de batiments des utilisateurs.';

--
-- Contenu de la table `buildings`
--

INSERT INTO `buildings` (`userid`, `levelfire`, `levelwater`, `levelair`, `levelearth`, `levelquarry`, `levelquartz`, `levelsawmill`, `leveliron`, `levelhouse`, `leveltemple`, `levelbath`, `levelmarket`, `levelarmory`, `levelcity`) VALUES
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(13, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(14, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(15, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(16, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(17, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(18, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(19, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(20, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(21, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(22, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(24, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `uniqueid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `speciesid` int(11) NOT NULL,
  `nickname` text NOT NULL,
  `level` int(11) NOT NULL,
  `xp` int(11) NOT NULL,
  `bonusattack` int(11) NOT NULL,
  `bonusdefense` int(11) NOT NULL,
  PRIMARY KEY (`uniqueid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `cards`
--

INSERT INTO `cards` (`uniqueid`, `userid`, `speciesid`, `nickname`, `level`, `xp`, `bonusattack`, `bonusdefense`) VALUES
(1, 3, 1, '', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cardsdb`
--

CREATE TABLE IF NOT EXISTS `cardsdb` (
  `id` int(11) NOT NULL,
  `speciesName` text NOT NULL,
  `rarity` int(11) NOT NULL,
  `evolutionRank` int(11) NOT NULL COMMENT 'Number of stars',
  `element` text NOT NULL,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `abilityName` text NOT NULL,
  `abilityStrength` int(11) NOT NULL,
  `cardType` text NOT NULL COMMENT 'Attack, Defense, Support, General...',
  `initiative` int(11) NOT NULL,
  `moveSpeed` int(11) NOT NULL,
  `minRange` int(11) NOT NULL,
  `maxRange` int(11) NOT NULL,
  `humanoid` tinyint(1) NOT NULL,
  `beast` tinyint(1) NOT NULL,
  `creature` tinyint(1) NOT NULL,
  `fusion` tinyint(1) NOT NULL,
  `aviary` tinyint(1) NOT NULL,
  `mechanical` tinyint(1) NOT NULL,
  `giant` tinyint(1) NOT NULL,
  `tiny` tinyint(1) NOT NULL,
  `etheral` tinyint(1) NOT NULL,
  `godly` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table à utiliser comme base de données statique.';

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `subscriptiondate` datetime NOT NULL,
  `lastlogindate` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='LA table des logins' AUTO_INCREMENT=25 ;

--
-- Contenu de la table `logins`
--

INSERT INTO `logins` (`userid`, `username`, `password`, `email`, `subscriptiondate`, `lastlogindate`) VALUES
(1, 'root', 'g4T3au', 'none', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ninichat', 'azqsazqs1', 'ninichat@mythoraco.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'oracion', 'courtois', 'oracion@mythoraco.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'azer', 'azer', 'azer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'qsdf', 'qsdf', 'qsdf', '2013-05-30 14:04:21', '0000-00-00 00:00:00'),
(6, 'rrr', 'rrr', 'rrr', '2013-05-30 14:12:06', '0000-00-00 00:00:00'),
(7, 'rrr', 'rrr', 'rrr', '2013-05-30 14:14:01', '0000-00-00 00:00:00'),
(8, 'aaa', 'aaa', 'aaa', '2013-05-30 14:14:50', '0000-00-00 00:00:00'),
(9, 'zzz', 'zzz', 'zzz', '2013-05-30 14:21:35', '0000-00-00 00:00:00'),
(10, 'eee', 'eee', 'eee', '2013-05-30 14:33:52', '0000-00-00 00:00:00'),
(11, 'ttt', 'ttt', 'ttt', '2013-05-30 14:43:01', '0000-00-00 00:00:00'),
(12, 'yyy', 'yyy', 'yyy', '2013-05-30 14:43:41', '0000-00-00 00:00:00'),
(13, 'uuu', 'uuu', 'uuu', '2013-05-30 14:45:17', '0000-00-00 00:00:00'),
(14, 'ppp', 'ppp', 'ppp', '2013-05-30 15:07:50', '0000-00-00 00:00:00'),
(15, 'ooo', 'ooo', 'ooo', '2013-05-30 15:08:04', '0000-00-00 00:00:00'),
(16, 'sss', 'sss', 'sss', '2013-05-30 15:43:40', '0000-00-00 00:00:00'),
(17, 'ggg', 'ggg', 'ggg', '2013-05-30 15:45:26', '0000-00-00 00:00:00'),
(18, 'vvv', 'vvv', 'vvv', '2013-05-30 15:46:41', '0000-00-00 00:00:00'),
(19, 'bbb', 'bbb', 'bbb', '2013-05-30 15:56:32', '0000-00-00 00:00:00'),
(20, 'bbb', 'bbb', 'bbb', '2013-05-30 16:03:15', '0000-00-00 00:00:00'),
(21, 'vvv', 'vvv', 'vvv', '2013-05-30 16:09:16', '0000-00-00 00:00:00'),
(22, 'vvv', 'vvv', 'vvv', '2013-05-30 16:09:51', '0000-00-00 00:00:00'),
(23, 'vvv', 'vvv', 'vvv', '2013-05-30 16:11:34', '0000-00-00 00:00:00'),
(24, 'ninjacky', '1234', 'ninjacky@gmail.com', '2013-06-07 16:03:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE IF NOT EXISTS `ressources` (
  `userid` int(11) NOT NULL,
  `playerxp` int(11) NOT NULL,
  `playerlevel` int(11) NOT NULL,
  `fire` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `air` int(11) NOT NULL,
  `earth` int(11) NOT NULL,
  `stone` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `iron` int(11) NOT NULL,
  `quartz` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `happiness` int(11) NOT NULL,
  `favor` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Pour stocker diverses variables.';

--
-- Contenu de la table `ressources`
--

INSERT INTO `ressources` (`userid`, `playerxp`, `playerlevel`, `fire`, `water`, `air`, `earth`, `stone`, `wood`, `iron`, `quartz`, `gold`, `happiness`, `favor`) VALUES
(3, 0, 1, 15, 0, 0, 0, 6480, 6480, 6490, 6490, 0, 100, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
