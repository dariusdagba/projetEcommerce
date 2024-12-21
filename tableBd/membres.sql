-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 déc. 2024 à 04:16
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommercebd`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `idmembre` varchar(40) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `adresse` varchar(60) DEFAULT NULL,
  `datedenaissnace` date DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`idmembre`, `prenom`, `nom`, `telephone`, `adresse`, `datedenaissnace`, `login`, `password`) VALUES
('akaal1999', 'alice', 'akat', '5144549775', '293 Place Stirling', '1999-06-05', 'aloush09', 'alicia@567'),
('dargb1999', 'gbadoo', 'dario', '4384549775', '210 CarrÃ© Benoit', '1999-05-30', 'dario1245', '12345678'),
('darst1999', 'states', 'darius', '4384549765', '218 Stinson Lasalle', '1999-01-09', 'dariostates45', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idmembre`),
  ADD UNIQUE KEY `unique_login` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
