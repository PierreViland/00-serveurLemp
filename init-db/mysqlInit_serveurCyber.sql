-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : lun. 31 mars 2025 à 14:33
-- Version du serveur : 8.0.32
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compte_visualisation`
--
CREATE DATABASE IF NOT EXISTS `compte_visualisation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `compte_visualisation`;

-- --------------------------------------------------------

--
-- Structure de la table `bddHash`
--

CREATE TABLE `bddHash` (
  `ID` int NOT NULL,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solde` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bddHash`
--

INSERT INTO `bddHash` (`ID`, `Nom`, `Prenom`, `Mot_de_passe`, `solde`) VALUES
(1, 'musk', 'elon', 'NzQ0MjYxYmY3NzViNzA5ODdjOTVmOWM3OTQ3YzdmNTRkNmJhZDU2NzNjNDA1OTExYjdiNTU2YjRiM2Q4Y2RmZA==', 10000.00),
(2, 'bezos', 'jeff', 'NzM4MTliNzY4NDRjODYyYTNiN2U3MjEyNjUwMTAyNzQ3YzI0MmVkMTE2NTk3NTIxOTVmOGI5MWQ0NWZmZGJlZA==', 99999.00),
(3, 'aupaysdes', 'alice', 'NDQ0ZTVjYTgxMmYyOWZkZTVlY2FkYjA1MTdlNzNiY2RkNWM4MjMzMjAyYWI5ZGIwNGVlOGEyOWQ2MGEyMDkwYg==', 1.00),
(8, 'viland', 'pierre', 'NjhkZjVhZTQ2ZWVjNDRjOTkzZWM5MDhkODBlNzgyNGFkYWExYmZlZmYyNjZhNzQ3MjJiNDJiZTUwNmU1NDA0ZQ==', 10.00),
(9, 'pv', 'pv', 'pv', 1.00);

-- --------------------------------------------------------

--
-- Structure de la table `liste_compte`
