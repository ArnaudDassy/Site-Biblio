-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Mai 2015 à 13:19
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`) VALUES
(1, 'Manuel'),
(2, 'Gandhi'),
(3, 'Orelsan'),
(4, 'Google'),
(5, 'Petit Lu'),
(6, 'Claudy'),
(7, 'Marc Levy'),
(8, 'Nestlé'),
(9, 'Arnaud');

-- --------------------------------------------------------

--
-- Structure de la table `biblio`
--

CREATE TABLE IF NOT EXISTS `biblio` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `adress_street` varchar(150) NOT NULL,
  `adress_city` varchar(150) NOT NULL,
  `horaire_lundi` varchar(150) NOT NULL,
  `horaire_mardi` varchar(150) NOT NULL,
  `horaire_mercredi` varchar(150) NOT NULL,
  `horaire_jeudi` varchar(150) NOT NULL,
  `horaire_vendredi` varchar(150) NOT NULL,
  `horaire_samedi` varchar(150) NOT NULL,
  `horaire_dimanche` varchar(150) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `biblio`
--

INSERT INTO `biblio` (`id`, `nom`, `adress_street`, `adress_city`, `horaire_lundi`, `horaire_mardi`, `horaire_mercredi`, `horaire_jeudi`, `horaire_vendredi`, `horaire_samedi`, `horaire_dimanche`, `phone`, `email`) VALUES
(1, 'Oreye', 'Rue des écoliers, 35', 'Oreye, 4360', '8h - 16h', '8h - 16h', '9h - 17h', '8h - 16h', 'Fermée', '9h - 16h', '8h - 12h', '0199034567', 'bilbliotheque.communale@oreye.be'),
(3, 'Waremme', 'Route de huy, 145', 'Waremme, 4300', '8h - 16h', '8h - 16h', '8h - 16h', '8h - 16h', '8h - 16h', '9h - 16h', 'Fermée', '0197845678', 'waremme.culture@wallonie.be'),
(4, 'Seraing', 'Avenue Charles Edouard, 13', 'Seraing, 4100', 'Fermée', '7h - 15h', '9h - 17h', '7h - 15h', '7h - 15h', '8h - 16h', 'Fermée', '0197890983', 'lecture.seraing@commune.be'),
(5, 'Juprelle', 'Rue de la boutonnière, 30', 'Juprelle, 4130', '8h - 16h', '8h - 16h', '8h - 16h', '8h - 16h', '8h - 16h', 'Fermée', 'Fermée', '0190815453', 'biblioJuprelle@outlook.com'),
(6, 'Hannut', 'Rue de la casse, 4', 'Hannut, 4320', '9h - 17h', '9h - 17h', 'Fermée', '9h - 17h', '9h - 17h', '10h - 18h', '10h - 14h', '0190569584', 'bibliotheque.hannut@wallonie.be');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`) VALUES
(1, 'Oeuvre'),
(2, 'Roman'),
(3, 'BD'),
(4, 'Encyclopédie'),
(5, 'Photographies'),
(6, 'Romance'),
(7, 'Humour'),
(8, 'Comique');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `auteur_id` smallint(5) NOT NULL,
  `maison_id` tinyint(3) NOT NULL,
  `note` tinyint(1) NOT NULL,
  `body` varchar(10000) NOT NULL,
  `type_id` tinyint(3) NOT NULL,
  `genre_id` tinyint(3) unsigned NOT NULL,
  `biblio_id` tinyint(1) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `auteur_id`, `maison_id`, `note`, `body`, `type_id`, `genre_id`, `biblio_id`, `img_path`) VALUES
(1, 'Le dicton du savoir vivre', 1, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lorem arcu, ornare vulputate tellus ac, sollicitudin rutrum nulla. Proin tempus posuere enim eu hendrerit. Nunc augue sem, auctor eget cursus et, luctus ac mauris. Maecenas interdum lectus nunc, et venenatis ante elementum et. Duis nec sapien egestas, venenatis magna vitae, facilisis leo. Donec et erat varius, egestas ligula a, sollicitudin libero. Suspendisse ut ex placerat, viverra neque at, accumsan tortor. Proin ultrices metus at metus imperdiet, at sagittis nisl facilisis. Praesent risus erat, interdum nec vulputate quis, accumsan et tellus. Vestibulum sit amet magna velit.\r\n\r\nCurabitur varius aliquet velit ut maximus. Cras mi sapien, ornare luctus ante at, ullamcorper congue nunc. Aenean hendrerit ut purus quis tempor. Vestibulum eget erat orci. Fusce ut augue rhoncus, ultrices enim id, aliquet lorem. Nulla sit amet lorem nibh. Aenean efficitur diam libero, et maximus nisi consequat sed. Nam tellus dui, convallis at justo id, faucibus accumsan urna. Nulla varius laoreet ex, pretium pharetra turpis suscipit et. Nulla vitae massa a lacus ornare tincidunt. Donec luctus ex lacus, eu accumsan lacus ultricies in. Phasellus consequat erat et tempor laoreet. Vestibulum aliquet, enim eu rhoncus ultrices, augue libero condimentum tortor, eu ullamcorper dolor quam et nisl. Praesent non risus ut nisl vulputate suscipit ac nec urna. Curabitur accumsan nec lectus ut scelerisque. Phasellus tempus ut ante quis scelerisque.\r\n\r\nIn porttitor quam posuere mollis laoreet. Ut vitae tincidunt augue. Aliquam pulvinar lectus a dapibus convallis. Curabitur sit amet tincidunt velit. Ut scelerisque maximus diam, eu efficitur diam gravida non. Aliquam nec quam et odio ultricies commodo. Proin nec nulla laoreet, imperdiet mauris sit amet, eleifend mi. In vestibulum sem metus, quis mattis purus pharetra sit amet. Suspendisse potenti. Nunc sem ipsum, dapibus in interdum vel, consectetur et dolor. Cras ut pharetra erat, quis pharetra risus. Donec vehicula at risus eget rutrum. Mauris et massa risus. Sed quis nulla id sem condimentum malesuada quis et justo. Sed quam lacus, tristique sed eros ac, blandit accumsan odio.', 1, 1, 1, './files/image_1.png'),
(2, 'L''absence du vide', 2, 6, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lorem arcu, ornare vulputate tellus ac, sollicitudin rutrum nulla. Proin tempus posuere enim eu hendrerit. Nunc augue sem, auctor eget cursus et, luctus ac mauris. Maecenas interdum lectus nunc, et venenatis ante elementum et. Duis nec sapien egestas, venenatis magna vitae, facilisis leo. Donec et erat varius, egestas ligula a, sollicitudin libero. Suspendisse ut ex placerat, viverra neque at, accumsan tortor. Proin ultrices metus at metus imperdiet, at sagittis nisl facilisis. Praesent risus erat, interdum nec vulputate quis, accumsan et tellus. Vestibulum sit amet magna velit.\r\n\r\nCurabitur varius aliquet velit ut maximus. Cras mi sapien, ornare luctus ante at, ullamcorper congue nunc. Aenean hendrerit ut purus quis tempor. Vestibulum eget erat orci. Fusce ut augue rhoncus, ultrices enim id, aliquet lorem. Nulla sit amet lorem nibh. Aenean efficitur diam libero, et maximus nisi consequat sed. Nam tellus dui, convallis at justo id, faucibus accumsan urna. Nulla varius laoreet ex, pretium pharetra turpis suscipit et. Nulla vitae massa a lacus ornare tincidunt. Donec luctus ex lacus, eu accumsan lacus ultricies in. Phasellus consequat erat et tempor laoreet. Vestibulum aliquet, enim eu rhoncus ultrices, augue libero condimentum tortor, eu ullamcorper dolor quam et nisl. Praesent non risus ut nisl vulputate suscipit ac nec urna. Curabitur accumsan nec lectus ut scelerisque. Phasellus tempus ut ante quis scelerisque.\r\n\r\nIn porttitor quam posuere mollis laoreet. Ut vitae tincidunt augue. Aliquam pulvinar lectus a dapibus convallis. Curabitur sit amet tincidunt velit. Ut scelerisque maximus diam, eu efficitur diam gravida non. Aliquam nec quam et odio ultricies commodo. Proin nec nulla laoreet, imperdiet mauris sit amet, eleifend mi. In vestibulum sem metus, quis mattis purus pharetra sit amet. Suspendisse potenti. Nunc sem ipsum, dapibus in interdum vel, consectetur et dolor. Cras ut pharetra erat, quis pharetra risus. Donec vehicula at risus eget rutrum. Mauris et massa risus. Sed quis nulla id sem condimentum malesuada quis et justo. Sed quam lacus, tristique sed eros ac, blandit accumsan odio.', 2, 2, 1, './files/image_2.png'),
(3, 'Et salut bonhomme', 3, 3, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lorem arcu, ornare vulputate tellus ac, sollicitudin rutrum nulla. Proin tempus posuere enim eu hendrerit. Nunc augue sem, auctor eget cursus et, luctus ac mauris. Maecenas interdum lectus nunc, et venenatis ante elementum et. Duis nec sapien egestas, venenatis magna vitae, facilisis leo. Donec et erat varius, egestas ligula a, sollicitudin libero. Suspendisse ut ex placerat, viverra neque at, accumsan tortor. Proin ultrices metus at metus imperdiet, at sagittis nisl facilisis. Praesent risus erat, interdum nec vulputate quis, accumsan et tellus. Vestibulum sit amet magna velit.\r\n\r\nCurabitur varius aliquet velit ut maximus. Cras mi sapien, ornare luctus ante at, ullamcorper congue nunc. Aenean hendrerit ut purus quis tempor. Vestibulum eget erat orci. Fusce ut augue rhoncus, ultrices enim id, aliquet lorem. Nulla sit amet lorem nibh. Aenean efficitur diam libero, et maximus nisi consequat sed. Nam tellus dui, convallis at justo id, faucibus accumsan urna. Nulla varius laoreet ex, pretium pharetra turpis suscipit et. Nulla vitae massa a lacus ornare tincidunt. Donec luctus ex lacus, eu accumsan lacus ultricies in. Phasellus consequat erat et tempor laoreet. Vestibulum aliquet, enim eu rhoncus ultrices, augue libero condimentum tortor, eu ullamcorper dolor quam et nisl. Praesent non risus ut nisl vulputate suscipit ac nec urna. Curabitur accumsan nec lectus ut scelerisque. Phasellus tempus ut ante quis scelerisque.\r\n\r\nIn porttitor quam posuere mollis laoreet. Ut vitae tincidunt augue. Aliquam pulvinar lectus a dapibus convallis. Curabitur sit amet tincidunt velit. Ut scelerisque maximus diam, eu efficitur diam gravida non. Aliquam nec quam et odio ultricies commodo. Proin nec nulla laoreet, imperdiet mauris sit amet, eleifend mi. In vestibulum sem metus, quis mattis purus pharetra sit amet. Suspendisse potenti. Nunc sem ipsum, dapibus in interdum vel, consectetur et dolor. Cras ut pharetra erat, quis pharetra risus. Donec vehicula at risus eget rutrum. Mauris et massa risus. Sed quis nulla id sem condimentum malesuada quis et justo. Sed quam lacus, tristique sed eros ac, blandit accumsan odio.', 3, 3, 3, './files/image_3.png'),
(4, 'Wazabi', 5, 4, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lorem arcu, ornare vulputate tellus ac, sollicitudin rutrum nulla. Proin tempus posuere enim eu hendrerit. Nunc augue sem, auctor eget cursus et, luctus ac mauris. Maecenas interdum lectus nunc, et venenatis ante elementum et. Duis nec sapien egestas, venenatis magna vitae, facilisis leo. Donec et erat varius, egestas ligula a, sollicitudin libero. Suspendisse ut ex placerat, viverra neque at, accumsan tortor. Proin ultrices metus at metus imperdiet, at sagittis nisl facilisis. Praesent risus erat, interdum nec vulputate quis, accumsan et tellus. Vestibulum sit amet magna velit.\r\n\r\nCurabitur varius aliquet velit ut maximus. Cras mi sapien, ornare luctus ante at, ullamcorper congue nunc. Aenean hendrerit ut purus quis tempor. Vestibulum eget erat orci. Fusce ut augue rhoncus, ultrices enim id, aliquet lorem. Nulla sit amet lorem nibh. Aenean efficitur diam libero, et maximus nisi consequat sed. Nam tellus dui, convallis at justo id, faucibus accumsan urna. Nulla varius laoreet ex, pretium pharetra turpis suscipit et. Nulla vitae massa a lacus ornare tincidunt. Donec luctus ex lacus, eu accumsan lacus ultricies in. Phasellus consequat erat et tempor laoreet. Vestibulum aliquet, enim eu rhoncus ultrices, augue libero condimentum tortor, eu ullamcorper dolor quam et nisl. Praesent non risus ut nisl vulputate suscipit ac nec urna. Curabitur accumsan nec lectus ut scelerisque. Phasellus tempus ut ante quis scelerisque.\r\n\r\nIn porttitor quam posuere mollis laoreet. Ut vitae tincidunt augue. Aliquam pulvinar lectus a dapibus convallis. Curabitur sit amet tincidunt velit. Ut scelerisque maximus diam, eu efficitur diam gravida non. Aliquam nec quam et odio ultricies commodo. Proin nec nulla laoreet, imperdiet mauris sit amet, eleifend mi. In vestibulum sem metus, quis mattis purus pharetra sit amet. Suspendisse potenti. Nunc sem ipsum, dapibus in interdum vel, consectetur et dolor. Cras ut pharetra erat, quis pharetra risus. Donec vehicula at risus eget rutrum. Mauris et massa risus. Sed quis nulla id sem condimentum malesuada quis et justo. Sed quam lacus, tristique sed eros ac, blandit accumsan odio.4eme de couv', 4, 4, 4, './files/image_4.png'),
(5, 'Maya l''abeille', 5, 5, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lorem arcu, ornare vulputate tellus ac, sollicitudin rutrum nulla. Proin tempus posuere enim eu hendrerit. Nunc augue sem, auctor eget cursus et, luctus ac mauris. Maecenas interdum lectus nunc, et venenatis ante elementum et. Duis nec sapien egestas, venenatis magna vitae, facilisis leo. Donec et erat varius, egestas ligula a, sollicitudin libero. Suspendisse ut ex placerat, viverra neque at, accumsan tortor. Proin ultrices metus at metus imperdiet, at sagittis nisl facilisis. Praesent risus erat, interdum nec vulputate quis, accumsan et tellus. Vestibulum sit amet magna velit.\r\n\r\nCurabitur varius aliquet velit ut maximus. Cras mi sapien, ornare luctus ante at, ullamcorper congue nunc. Aenean hendrerit ut purus quis tempor. Vestibulum eget erat orci. Fusce ut augue rhoncus, ultrices enim id, aliquet lorem. Nulla sit amet lorem nibh. Aenean efficitur diam libero, et maximus nisi consequat sed. Nam tellus dui, convallis at justo id, faucibus accumsan urna. Nulla varius laoreet ex, pretium pharetra turpis suscipit et. Nulla vitae massa a lacus ornare tincidunt. Donec luctus ex lacus, eu accumsan lacus ultricies in. Phasellus consequat erat et tempor laoreet. Vestibulum aliquet, enim eu rhoncus ultrices, augue libero condimentum tortor, eu ullamcorper dolor quam et nisl. Praesent non risus ut nisl vulputate suscipit ac nec urna. Curabitur accumsan nec lectus ut scelerisque. Phasellus tempus ut ante quis scelerisque.\r\n\r\nIn porttitor quam posuere mollis laoreet. Ut vitae tincidunt augue. Aliquam pulvinar lectus a dapibus convallis. Curabitur sit amet tincidunt velit. Ut scelerisque maximus diam, eu efficitur diam gravida non. Aliquam nec quam et odio ultricies commodo. Proin nec nulla laoreet, imperdiet mauris sit amet, eleifend mi. In vestibulum sem metus, quis mattis purus pharetra sit amet. Suspendisse potenti. Nunc sem ipsum, dapibus in interdum vel, consectetur et dolor. Cras ut pharetra erat, quis pharetra risus. Donec vehicula at risus eget rutrum. Mauris et massa risus. Sed quis nulla id sem condimentum malesuada quis et justo. Sed quam lacus, tristique sed eros ac, blandit accumsan odio.', 5, 5, 5, './files/image_5.png'),
(6, 'Trésor de Kellog', 8, 9, 3, 'bla bla bla', 1, 7, 1, './files/image_6.png');

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE IF NOT EXISTS `maison` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`id`, `nom`) VALUES
(1, 'Gaillard'),
(2, 'France print\r\n'),
(3, 'Livre de poche'),
(4, 'WalloBook'),
(5, 'PintBook'),
(6, 'France print'),
(7, 'PrintWallonie'),
(8, 'Pocket'),
(9, 'Aucun idée'),
(10, 'Maison Blanche');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'Nouvelle'),
(2, 'Comique'),
(3, 'Triller'),
(4, 'Adulte'),
(5, 'Bibliographie'),
(6, 'BD'),
(7, 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `adress_street` varchar(100) NOT NULL,
  `adress_postal_code` varchar(6) NOT NULL,
  `adress_city` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `admin`, `first_name`, `last_name`, `adress_street`, `adress_postal_code`, `adress_city`, `email`, `avatar_path`) VALUES
(1, 'admin', 'admin', 1, 'Arnaud', 'Dassy', 'Rue de la Centenaire', '4360', 'Oreye', 'arnaud.dassy@gmail.com', 'Rue de la Centenaire'),
(2, 'user', 'user', NULL, '', '', '', '', '', '', ''),
(3, 'Arnaud', 'azerty', NULL, 'Arnaud', 'Dassy', 'Rue de la Centenaire', '4360', 'Oreye', 'arnaud.dassy@gmail.com', 'Rue de la Centenaire');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
