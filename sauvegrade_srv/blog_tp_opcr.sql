-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 mars 2022 à 11:03
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_tp_opcr`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articles_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_author_id` int(11) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_title` text NOT NULL,
  `article_subtitle` text,
  `article_content` text NOT NULL,
  `article_date_creation` date NOT NULL,
  `article_date_modification` date NOT NULL,
  PRIMARY KEY (`articles_id`),
  KEY `id_author` (`article_author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articles_id`, `article_author_id`, `article_image`, `article_title`, `article_subtitle`, `article_content`, `article_date_creation`, `article_date_modification`) VALUES
(1, 1, 'https://th.bing.com/th/id/R.94c0a4d7d4c7fd8db7dbf63d0d6746a4?rik=2Z6OFc2apWD5TQ&pid=ImgRaw&r=0', 'Préparer demain avec la gestion de projets', 'Article partenaire', 'Dans une autre vie, j’ai fait de la gestion de projet. J’étais donc en charge de projets informatiques plus ou moins complexes, avec des clients à satisfaire et des développeurs à gérer. N’ayant jamais suivi de formation là-dessus, j’ai donc pas mal potassé dans mon coin avec des livres et je me suis formé sur le tas.\r\n\r\nL’expérience a plutôt été bonne bien qu’épuisante. Beaucoup de travail, beaucoup de stress, mais beaucoup de satisfaction de voir des projets se développer à partir d’une idée de quelques lignes dans un email.', '2022-03-04', '2022-03-12'),
(2, 3, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Sous titre ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis aliquam lectus, nec vulputate nunc varius sed. Vestibulum nec metus vulputate, malesuada dui sed, sagittis sapien. Nunc imperdiet arcu non bibendum porttitor. Donec ut metus eget ex interdum consectetur in nec urna. Aliquam nec porttitor mauris. Praesent hendrerit est congue, laoreet erat et, luctus est. Fusce consequat, nunc in porttitor vestibulum, arcu mauris rutrum est, id bibendum orci est vitae ante. Nam erat turpis, blandit sed eleifend sed, pulvinar a erat. Integer pulvinar massa id nisi luctus, sit amet aliquam lacus varius. Morbi feugiat, purus a blandit molestie, lectus turpis maximus tortor, ac suscipit magna nibh et magna. Donec ante lectus, imperdiet sed imperdiet id, consectetur ut massa. Donec interdum luctus magna, et suscipit ipsum pulvinar sed. Nullam scelerisque justo et est scelerisque ultricies. Mauris euismod auctor aliquam. Vivamus in tincidunt sem. Praesent et accumsan nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis aliquam lectus, nec vulputate nunc varius sed. Vestibulum nec metus vulputate, malesuada dui sed, sagittis sapien. Nunc imperdiet arcu non bibendum porttitor. Donec ut metus eget ex interdum consectetur in nec urna. Aliquam nec porttitor mauris. Praesent hendrerit est congue, laoreet erat et, luctus est. Fusce consequat, nunc in porttitor vestibulum, arcu mauris rutrum est, id bibendum orci est vitae ante. Nam erat turpis, blandit sed eleifend sed, pulvinar a erat. Integer pulvinar massa id nisi luctus, sit amet aliquam lacus varius. Morbi feugiat, purus a blandit molestie, lectus turpis maximus tortor, ac suscipit magna nibh et magna. Donec ante lectus, imperdiet sed imperdiet id, consectetur ut massa. Donec interdum luctus magna, et suscipit ipsum pulvinar sed. Nullam scelerisque justo et est scelerisque ultricies. Mauris euismod auctor aliquam. Vivamus in tincidunt sem. Praesent et accumsan nunc.', '2022-03-04', '2022-03-12'),
(3, 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Article Partenaire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis aliquam lectus, nec vulputate nunc varius sed. Vestibulum nec metus vulputate, malesuada dui sed, sagittis sapien. Nunc imperdiet arcu non bibendum porttitor. Donec ut metus eget ex interdum consectetur in nec urna. Aliquam nec porttitor mauris. Praesent hendrerit est congue, laoreet erat et, luctus est. Fusce consequat, nunc in porttitor vestibulum, arcu mauris rutrum est, id bibendum orci est vitae ante. Nam erat turpis, blandit sed eleifend sed, pulvinar a erat. Integer pulvinar massa id nisi luctus, sit amet aliquam lacus varius. Morbi feugiat, purus a blandit molestie, lectus turpis maximus tortor, ac suscipit magna nibh et magna. Donec ante lectus, imperdiet sed imperdiet id, consectetur ut massa. Donec interdum luctus magna, et suscipit ipsum pulvinar sed. Nullam scelerisque justo et est scelerisque ultricies. Mauris euismod auctor aliquam. Vivamus in tincidunt sem. Praesent et accumsan nunc.', '2022-03-04', '2022-03-12'),
(4, 3, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'sous-titre de l\'article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis aliquam lectus, nec vulputate nunc varius sed. Vestibulum nec metus vulputate, malesuada dui sed, sagittis sapien. Nunc imperdiet arcu non bibendum porttitor. Donec ut metus eget ex interdum consectetur in nec urna. Aliquam nec porttitor mauris. Praesent hendrerit est congue, laoreet erat et, luctus est. Fusce consequat, nunc in porttitor vestibulum, arcu mauris rutrum est, id bibendum orci est vitae ante. Nam erat turpis, blandit sed eleifend sed, pulvinar a erat. Integer pulvinar massa id nisi luctus, sit amet aliquam lacus varius. Morbi feugiat, purus a blandit molestie, lectus turpis maximus tortor, ac suscipit magna nibh et magna. Donec ante lectus, imperdiet sed imperdiet id, consectetur ut massa. Donec interdum luctus magna, et suscipit ipsum pulvinar sed. Nullam scelerisque justo et est scelerisque ultricies. Mauris euismod auctor aliquam. Vivamus in tincidunt sem. Praesent et accumsan nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis aliquam lectus, nec vulputate nunc varius sed. Vestibulum nec metus vulputate, malesuada dui sed, sagittis sapien. Nunc imperdiet arcu non bibendum porttitor. Donec ut metus eget ex interdum consectetur in nec urna. Aliquam nec porttitor mauris. Praesent hendrerit est congue, laoreet erat et, luctus est. Fusce consequat, nunc in porttitor vestibulum, arcu mauris rutrum est, id bibendum orci est vitae ante. Nam erat turpis, blandit sed eleifend sed, pulvinar a erat. Integer pulvinar massa id nisi luctus, sit amet aliquam lacus varius. Morbi feugiat, purus a blandit molestie, lectus turpis maximus tortor, ac suscipit magna nibh et magna. Donec ante lectus, imperdiet sed imperdiet id, consectetur ut massa. Donec interdum luctus magna, et suscipit ipsum pulvinar sed. Nullam scelerisque justo et est scelerisque ultricies. Mauris euismod auctor aliquam. Vivamus in tincidunt sem. Praesent et accumsan nunc.', '2022-03-04', '2022-03-12');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_author_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `id_article` (`comment_author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_author_id`, `comment_text`, `comment_date`) VALUES
(1, 3, 'Ceci est un commentaire ', '2022-03-17 19:35:32'),
(2, 2, 'Ceci est un commentaire ', '2022-03-17 19:35:32');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Jean', '', 'jean1234', 1),
(2, 'Jeanne', '', 'jeanne1234', 1),
(3, 'Gabriel', '', 'Gabriel1234', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`article_author_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_author_id`) REFERENCES `articles` (`articles_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
