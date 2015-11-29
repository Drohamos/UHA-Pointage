-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Novembre 2015 à 12:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pointage`
--

-- --------------------------------------------------------

--
-- Structure de la table `pointages`
--

CREATE TABLE IF NOT EXISTS `pointages` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL,
  `date` date NOT NULL,
  `aMatin` time DEFAULT NULL COMMENT 'Heure arrivée matin',
  `dMidi` time DEFAULT NULL COMMENT 'Heure départ pause midi',
  `aMidi` time DEFAULT NULL COMMENT 'Heure retour pause midi',
  `dSoir` time DEFAULT NULL COMMENT 'Heure départ soir',
  PRIMARY KEY (`id`),
  KEY `FK_horaires_membres` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `pointages`
--

INSERT INTO `pointages` (`id`, `user_id`, `date`, `aMatin`, `dMidi`, `aMidi`, `dSoir`) VALUES
(1, 2, '2015-10-22', '09:00:00', '12:00:00', '14:00:00', '17:00:00'),
(2, 2, '2015-10-21', '15:40:32', '15:40:38', '15:40:40', '15:40:42'),
(3, 3, '2015-10-23', '10:20:56', '10:20:57', '10:20:58', '10:20:59'),
(6, 2, '2015-10-27', '15:26:09', '15:27:07', '15:27:17', '15:52:37'),
(9, 2, '2015-10-28', '14:54:22', '14:55:19', NULL, NULL),
(10, 2, '2015-11-28', '18:00:39', '18:00:43', '18:00:46', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL COMMENT 'MD5 du password',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `prenom`, `nom`, `password`) VALUES
(2, 'robin', 'Robin', 'Barkas', 'ccab7fb02502f3489b34aac7403d5529'),
(3, 'admin', 'Admin', 'Istrateur', '32132132143217317432178321783217');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pointages`
--
ALTER TABLE `pointages`
  ADD CONSTRAINT `FK_horaires_membres` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
