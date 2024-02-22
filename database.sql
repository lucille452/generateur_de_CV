-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 fév. 2024 à 15:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `academics`
--

CREATE TABLE `academics` (
  `Academic_id` int(255) NOT NULL,
  `Diploma` varchar(200) NOT NULL,
  `Date_start` date NOT NULL,
  `Date_end` date NOT NULL,
  `School` varchar(100) NOT NULL,
  `User_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `academics`
--

INSERT INTO `academics` (`Academic_id`, `Diploma`, `Date_start`, `Date_end`, `School`, `User_id`) VALUES
(1, 'test', '2024-01-29', '2024-02-14', 'coucou', 1),
(5, 'Baccalauréat', '2022-09-15', '2023-06-15', 'Lycée Vincent Auriol', 4);

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `Cv_id` int(255) NOT NULL,
  `Job` varchar(255) NOT NULL,
  `Hobbies` text NOT NULL,
  `User_id` int(255) NOT NULL,
  `Model` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`Cv_id`, `Job`, `Hobbies`, `User_id`, `Model`) VALUES
(100, 'alternant en informatique', 'danse, voyage, scoutisme', 4, 2),
(101, 'alternant en informatique', 'danse, voyage, scoutisme', 4, 2),
(102, 'alternant en informatique', 'danse, voyage, scoutisme', 1, 2),
(103, 'alternant en informatique', 'danse, voyage, scoutisme', 1, 3),
(106, 'etudiant', 'cououou les copains c\'est trop bien ca fonctionne pas', 1, 1),
(107, 'etudiant', 'cououou les copains c\'est trop bien ca fonctionne pas', 1, 2),
(108, 'etudiant', 'cououou les copains c\'est trop bien ca fonctionne pas', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `Experience_id` int(255) NOT NULL,
  `Company` varchar(200) NOT NULL,
  `Date_start` date NOT NULL,
  `Date_end` date NOT NULL,
  `Job` varchar(100) NOT NULL,
  `Descriptions` text NOT NULL,
  `User_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`Experience_id`, `Company`, `Date_start`, `Date_end`, `Job`, `Descriptions`, `User_id`) VALUES
(1, 'Ynov', '2024-02-05', '2024-02-25', 'etudiante', 'coucou', 1),
(3, 'L\'atelier T', '2022-07-15', '2022-09-09', 'stage', 'fait un stage dans un cabinet d\'architecture', 4),
(4, 'MCC Informatique', '2023-04-15', '2023-05-09', 'stage', 'fait un stage chez un préstataire informatique sur revel', 4);

-- --------------------------------------------------------

--
-- Structure de la table `liaison_academic`
--

CREATE TABLE `liaison_academic` (
  `id` int(11) NOT NULL,
  `Academic_id` int(255) NOT NULL,
  `Cv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liaison_academic`
--

INSERT INTO `liaison_academic` (`id`, `Academic_id`, `Cv_id`) VALUES
(33, 1, 90),
(34, 1, 91),
(35, 1, 92),
(36, 1, 93),
(37, 1, 94),
(38, 1, 95),
(39, 1, 96),
(40, 1, 97),
(42, 5, 99),
(43, 5, 100),
(44, 5, 101),
(45, 1, 102),
(46, 1, 103),
(49, 1, 106),
(50, 1, 107),
(51, 1, 108);

-- --------------------------------------------------------

--
-- Structure de la table `liaison_experience`
--

CREATE TABLE `liaison_experience` (
  `id` int(255) NOT NULL,
  `Experience_id` int(255) NOT NULL,
  `Cv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liaison_experience`
--

INSERT INTO `liaison_experience` (`id`, `Experience_id`, `Cv_id`) VALUES
(31, 1, 90),
(32, 1, 91),
(37, 1, 96),
(39, 1, 97),
(43, 4, 99),
(44, 4, 100),
(45, 4, 101),
(46, 1, 102),
(48, 1, 103),
(52, 1, 106),
(53, 1, 107),
(54, 1, 108);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `User_id` int(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone_tel` int(30) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`User_id`, `Last_name`, `First_name`, `Email`, `Phone_tel`, `Username`, `Password`) VALUES
(1, 'Flits', 'Carla', 'mhcenac@gmail.com', 695591764, 'test', '1234'),
(2, 'Cenac', 'Lucille', 'lucille.cenac@gmail.com', 695591764, 'lucille', '1234'),
(3, 'Cenac', 'Lucille', 'lucille.cenac@gmail.com', 695591764, 'lucille', '1234'),
(4, 'Smith', 'John', 'mhcenac@gmail.com', 695591764, 'john', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`Academic_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`Cv_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`Experience_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Index pour la table `liaison_academic`
--
ALTER TABLE `liaison_academic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liaison_experience`
--
ALTER TABLE `liaison_experience`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `academics`
--
ALTER TABLE `academics`
  MODIFY `Academic_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `Cv_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `Experience_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `liaison_academic`
--
ALTER TABLE `liaison_academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `liaison_experience`
--
ALTER TABLE `liaison_experience`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
