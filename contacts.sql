-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 août 2021 à 13:28
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contacts`
--

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

CREATE TABLE `gender` (
  `idg` int(11) NOT NULL,
  `lib` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gender`
--

INSERT INTO `gender` (`idg`, `lib`) VALUES
(1, 'female'),
(2, 'male');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id1` int(11) NOT NULL,
  `groupeName` varchar(11) NOT NULL,
  `Icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id1`, `groupeName`, `Icon`) VALUES
(25, 'amie', 'handwritten-lettering-welcome-to-our-online-store-vector-illustration-vector-illustration-handwritten-lettering-welcome-to-174735689.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `groupepersonne`
--

CREATE TABLE `groupepersonne` (
  `idgp` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupepersonne`
--

INSERT INTO `groupepersonne` (`idgp`, `id`, `id1`) VALUES
(23, 51, 23),
(24, 51, 24),
(25, 52, 24),
(26, 51, 25),
(27, 52, 25),
(28, 54, 26);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `perEmail` varchar(255) DEFAULT NULL,
  `proEmail` varchar(255) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `telNo1` varchar(20) DEFAULT NULL,
  `telNo2` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `idg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `firstName`, `lastName`, `perEmail`, `proEmail`, `image`, `telNo1`, `telNo2`, `address`, `idg`) VALUES
(54, 'kaouthar ', 'abakouy', 'kwtrelbakouri1@gmail.com', 'mohammedelbakouri@gmail.com', 0x70686f746f312e706e67, '0611298878', '0698754123', 'tetouan', 1),
(55, 'kaouthar ', 'elbakouri', 'kwtrelbakouri1@gmail.com', 'kaoutarelbakouri@gmail.com', 0x3230303732303231323234373035333631333038363032313330202831292e706e67, '1235', '0698754123', 'meknes', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`idg`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id1`);

--
-- Index pour la table `groupepersonne`
--
ALTER TABLE `groupepersonne`
  ADD PRIMARY KEY (`idgp`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idg` (`idg`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `gender`
--
ALTER TABLE `gender`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `groupepersonne`
--
ALTER TABLE `groupepersonne`
  MODIFY `idgp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`idg`) REFERENCES `gender` (`idg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
