-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 juin 2022 à 00:43
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
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `is_valid` int(1) NOT NULL,
  `clef` int(30) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `img`, `role`, `is_valid`, `clef`) VALUES
(1, 'Jean', 'jean@gmail.com', 'jean1234', '', '1', 0, 0),
(2, 'Jeanne', 'Jeanne@gmail.com\r\n', 'jeanne1234', '', '1', 0, 0),
(3, 'Gabriel', 'salut.gaby@gmail.com', '$2y$10$btAOvQYaKAesgxjiwPFZZOX4hp5Bn26gaUa0JSLCej4WvFtebQg.q', 'https://st3.depositphotos.com/3489481/18618/i/600/depositphotos_186188634-stock-photo-young-man-selected-as-winnner.jpg', '1', 1, 0),
(4, 'toto', 'toto@gmail.com', '$2y$10$uXr/ZldD2NR5cmKHF3ld5OVn6pSqAzR44KhxGyk7B7WI1GYew.Cny', '', 'user', 0, 8561),
(5, 'tota', 'tatl@gmail.com', '$2y$10$QQCS./kynGNcIM9L0ZX9N.KPTfAz4GjayWFhTwCU7KtIpewNubDyu', '', 'user', 0, 7767),
(6, 'ato', 'tato@gmail.com', '$2y$10$IaQ6CTAsinEohjiQS/wWdep56naY/HhzXNaKoTk7luVrqT0IpyZNy', '', 'user', 0, 7499);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
