-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 09 juil. 2024 à 18:39
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test2024`
--

-- --------------------------------------------------------

--
-- Structure de la table `campings`
--

CREATE TABLE `campings` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nb_terrains` int NOT NULL,
  `popularite` int NOT NULL,
  `nb_stars` int NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `accept_animals` tinyint(1) NOT NULL,
  `date_inscription` date NOT NULL,
  `experience_id` int NOT NULL,
  `id_picsum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campings`
--

INSERT INTO `campings` (`id`, `name`, `region`, `description`, `nb_terrains`, `popularite`, `nb_stars`, `actif`, `accept_animals`, `date_inscription`, `experience_id`, `id_picsum`) VALUES
(1, 'Camping Havre de paix', 'Centre-du-Québec', 'Magnifique camping.... C\'est le camping le plus populaire, il devrait s\'afficher en premier sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings, sur la liste des campings 3* et plus dans la liste des campings associés à l\'expérience Tranquilité', 25, 9999999, 5, 1, 1, '2023-06-01', 1, 28),
(2, 'Camping INACTIF', 'Centre du Québec', 'Magnifique camping. Puisqu\'il est inactif, il ne doit s\'afficher à aucun endroit sur le site. ', 0, 9999999, 3, 0, 1, '2023-06-02', 1, 34),
(3, 'Camping Sportif', 'Mauricie', 'Magnifique camping.... C\'est le camping le 2e plus populaire, il devrait s\'afficher en deuxième sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings, sur la liste des campings 3* et plus dans la liste des campings associés à l\'expérience Activités sportives', 141, 9999998, 3, 1, 1, '2023-06-03', 2, 177),
(4, 'Camping Hivernal', 'Montérégie', 'Magnifique camping.... C\'est le camping le 4e plus populaire, il devrait s\'afficher en quatrième sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings et dans la liste des campings associés à l\'expérience Hivernale. Il n\'apparaît pas dans la liste des campings 3* et plus. ', 10, 9999996, 2, 1, 1, '2023-06-04', 3, 260),
(5, 'Camping Le paradis perdu', 'Saguenay-Lac-Saint-Jean', 'Magnifique camping.... C\'est le camping le 3e plus populaire, il devrait s\'afficher en troisième sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings et dans la liste des campings associés à l\'expérience Camping en tente. Il n\'apparaît pas dans la liste des campings 3* et plus. ', 12, 9999997, 2, 1, 1, '2023-06-05', 4, 14),
(6, 'Camping PAS ANIMAUX', 'Centre du Québec', 'Magnifique camping 5 étoiles.. qui n\'accepte pas les animaux!', 99, 165, 5, 1, 0, '2023-06-06', 1, 28),
(7, 'Camping INACTIF et PAS ANIMAUX', 'Centre-du-Québec', 'Magnifique camping qui n\'accepte pas les animaux. Puisqu\'il est inactif, il ne doit s\'afficher à aucun endroit sur le site. ', 0, 236, 3, 0, 0, '2023-06-07', 1, 34),
(8, 'Camping Rustique', 'Centre-du-Québec', 'Magnifique camping associé à l\'expérience Camping en tente', 10, 248, 1, 1, 1, '2023-07-02', 4, 11),
(9, 'Camping Sérénité', 'Mauricie', 'Magnifique camping associé à l\'expérience Tranquilité', 32, 242, 4, 1, 1, '2023-06-09', 1, 65),
(10, 'Camping Le tout prêt', 'Montérégie', 'Magnifique camping associé à l\'expérience Prêt à camping', 24, 187, 5, 1, 1, '2023-06-10', 5, 103),
(11, 'Camping #11', 'Région X', 'Ceci est la description du camping #11. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(12, 'Camping #12', 'Région X', 'Ceci est la description du camping #12. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(13, 'Camping #13', 'Région X', 'Ceci est la description du camping #13. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(14, 'Camping #14', 'Région X', 'Ceci est la description du camping #14. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(15, 'Camping #15', 'Région X', 'Ceci est la description du camping #15. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(16, 'Camping #22', 'Région X', 'Ceci est la description du camping #16. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(17, 'Camping #23', 'Région X', 'Ceci est la description du camping #17. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(18, 'Camping #24', 'Région X', 'Ceci est la description du camping #18. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(19, 'Camping #25', 'Région X', 'Ceci est la description du camping #19. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324),
(20, 'Camping #26', 'Région X', 'Ceci est la description du camping #20. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 0, 0, 0, 1, 0, '2024-01-01', 1, 324);

UPDATE `campings` set nb_terrains = FLOOR(RAND()*(300-30+1)+30), nb_stars = FLOOR(RAND()*(5-1+1)+1), popularite = FLOOR(RAND()*(10000-2000+1)+2000), accept_animals = FLOOR(RAND()*(1-0+1)+0), date_inscription=CURDATE(), experience_id=FLOOR(RAND()*(5-1+1)+1) WHERE id > 10;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `name`, `description`) VALUES
(1, 'Tranquilité', ''),
(2, 'Activités sportives', ''),
(3, 'Hivernal', ''),
(4, 'Camping en tente', ''),
(5, 'Prêts à camper', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `campings`
--
ALTER TABLE `campings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campings_experiences` (`experience_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `campings`
--
ALTER TABLE `campings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `campings`
--
ALTER TABLE `campings`
  ADD CONSTRAINT `campings_experiences` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
