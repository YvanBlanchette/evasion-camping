-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 22 juil. 2024 à 05:26
-- Version du serveur : 8.0.36
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evasion_camping`
--

-- --------------------------------------------------------

--
-- Structure de la table `campings`
--

CREATE TABLE `campings` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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

INSERT INTO `campings` (`id`, `name`, `region`, `address`, `city`, `postal_code`, `description`, `nb_terrains`, `popularite`, `nb_stars`, `actif`, `accept_animals`, `date_inscription`, `experience_id`, `id_picsum`) VALUES
(1, 'Camping Les Érables', 'Laurentides', '123 Rue des Bouleaux', ' Saint-Sauveur', 'J0R 1R3', 'Situé au cœur des Laurentides, le Camping Les Érables offre une évasion parfaite avec ses vastes terrains boisés et ses nombreux sentiers de randonnée. Les visiteurs peuvent profiter d\'un environnement serein, de lacs pittoresques pour la pêche et de feux de camp sous un ciel étoilé.', 25, 9999999, 5, 1, 1, '2023-06-01', 1, 28),
(2, 'Camping La Rive', 'Laurentides', '456 Chemin du Lac', 'Mont-Tremblant', 'J8E 1E9', 'Niché près des rives du Lac Tremblant, le Camping La Rive est idéal pour les amateurs de sports nautiques. Avec des plages de sable fin, des installations modernes et des activités pour toute la famille, ce camping est une destination estivale de choix.', 0, 9999999, 3, 0, 1, '2023-06-02', 1, 34),
(3, 'Camping Le Refuge', 'Laurentides', '789 Route des Montagnes', 'Val-David', 'J0T 2N0', 'Au cœur des montagnes de Val-David, le Camping Le Refuge est un havre de paix entouré de paysages à couper le souffle. Les visiteurs peuvent s\'adonner à l\'escalade, aux balades en forêt et à la découverte de la faune locale dans un cadre naturel exceptionnel.', 141, 9999998, 3, 1, 1, '2023-06-03', 2, 177),
(4, 'Camping Les Aventures', 'Laurentides', '1011 Chemin de la Forêt', 'Sainte-Adèle', 'J8B 2N6', 'Le Camping Les Aventures à Sainte-Adèle est un endroit dynamique pour les familles et les aventuriers. Offrant des activités telles que le kayak, le VTT et des sentiers de découverte de la nature, ce camping promet des vacances pleines de sensations fortes.', 10, 9999996, 2, 1, 1, '2023-06-04', 3, 260),
(5, 'Camping Au Bord de l\'Eau', 'Estrie', '1213 Avenue des Pins', 'Magog', 'J1X 3Y5', 'Situé à Magog, le Camping Au Bord de l\'Eau permet aux visiteurs de profiter du magnifique Lac Memphrémagog. Les campeurs peuvent se détendre sur les plages, pratiquer des sports nautiques ou explorer les charmants villages des environs.', 12, 9999997, 2, 1, 1, '2023-06-05', 4, 14),
(6, 'Camping Les Sapins', 'Laval', '1415 Boulevard des Laurentides', 'Laval', 'H7N 4Z3', 'Situé à Laval, le Camping Les Sapins combine la proximité urbaine avec le charme naturel. Ce camping familial offre des installations modernes, des piscines, et un accès facile aux attractions de la ville, tout en offrant un cadre paisible.', 99, 165, 5, 1, 0, '2023-06-06', 1, 28),
(7, 'Camping Le Havre', 'Bas-Saint-Laurent', '1617 Rue de la Plage', 'Rimouski', 'G5L 3B8', 'Le Camping Le Havre à Rimouski est parfait pour ceux qui cherchent à se ressourcer près du fleuve Saint-Laurent. Avec des sites de camping spacieux, des sentiers côtiers et des activités de plein air variées, il est idéal pour les amoureux de la nature.', 0, 236, 3, 0, 0, '2023-06-07', 1, 34),
(8, 'Camping Les Collines', 'Capitale-Nationale', '1819 Route du Fleuve', 'Baie-Saint-Paul', 'G3Z 2V4', 'Situé à Baie-Saint-Paul, le Camping Les Collines offre des vues panoramiques sur les montagnes environnantes. Les campeurs peuvent profiter de la randonnée, de l\'observation des oiseaux et des marchés locaux remplis de produits artisanaux.', 10, 248, 1, 1, 1, '2023-07-02', 4, 11),
(9, 'Camping La Clairière', 'Montérégie', '2021 Chemin du Boisé', 'Saint-Jean-sur-Richelieu', 'J2W 1S9', 'À Saint-Jean-sur-Richelieu, le Camping La Clairière offre un cadre champêtre avec des vastes prairies et des ruisseaux tranquilles. Idéal pour des vacances relaxantes, il propose des activités comme la pêche, le vélo et des soirées cinéma en plein air.', 32, 242, 4, 1, 1, '2023-06-09', 1, 65),
(10, 'Camping Les Vagues', 'Gaspésie–Îles-de-la-Madeleine', '2223 Rue de la Mer', 'Gaspé', 'G4X 1K1', 'Situé à Gaspé, le Camping Les Vagues est bordé par l\'océan Atlantique. Les visiteurs peuvent y pratiquer la pêche en haute mer, le kayak de mer et profiter des plages immaculées, tout en explorant les falaises spectaculaires de la région.', 24, 187, 5, 1, 1, '2023-06-10', 5, 103),
(11, 'Camping Les Horizons', 'Mauricie', '2425 Avenue des Cèdres', 'Trois-Rivières', 'G8Y 6T4', 'À Trois-Rivières, le Camping Les Horizons offre une expérience unique avec ses terrains bien aménagés et ses nombreuses activités familiales. Les campeurs peuvent profiter de piscines, de terrains de sport et de soirées animées autour du feu.', 299, 9972, 5, 1, 1, '2024-07-12', 5, 324),
(12, 'Camping Le Grand Air', 'Estrie', '2627 Chemin des Prairies', 'Sherbrooke', 'J1L 1Y3', 'Niché dans les collines de Sherbrooke, le Camping Le Grand Air propose des vacances revigorantes avec ses forêts denses et ses rivières claires. Idéal pour les randonnées et les pique-niques, il offre une véritable évasion en pleine nature.', 293, 6174, 5, 1, 1, '2024-07-12', 1, 324),
(13, 'Camping La Sérénité', 'Centre-du-Québec', '2829 Rue des Champs', 'Drummondville', 'J2B 8A8', 'Situé à Drummondville, le Camping La Sérénité porte bien son nom avec ses paysages paisibles et ses installations confortables. Les visiteurs peuvent profiter de la pêche, des promenades en forêt et des soirées sous les étoiles.', 285, 5380, 2, 1, 0, '2024-07-12', 3, 324),
(14, 'Camping Les Voyageurs', 'Saguenay–Lac-Saint-Jean', '3031 Route des Vents', 'Saguenay', 'G7X 3H7', 'À Saguenay, le Camping Les Voyageurs est parfait pour les amateurs d\'aventure. Avec des activités comme le rafting, le canoë et la randonnée en montagne, ce camping promet des expériences inoubliables au cœur de la nature sauvage.', 197, 5994, 3, 1, 0, '2024-07-12', 5, 324),
(15, 'Camping Le Tranquille', 'Chaudière-Appalaches', '3233 Chemin de la Montagne', 'Montmagny', 'G5V 1L9', 'Situé à Montmagny, le Camping Le Tranquille offre un cadre bucolique avec ses champs verdoyants et ses rivières paisibles. Les campeurs peuvent s\'adonner à la pêche, aux promenades à cheval et aux visites des marchés locaux.', 121, 7387, 5, 1, 1, '2024-07-12', 4, 324),
(16, 'Camping Les Aventuriers', 'Saguenay–Lac-Saint-Jean', '3435 Boulevard du Lac', 'Alma', 'G8B 5W4', 'À Alma, le Camping Les Aventuriers propose des vacances dynamiques avec des activités telles que le vélo, le canoë et des excursions en nature. Les vastes terrains et les lacs pittoresques en font une destination prisée des familles et des aventuriers.', 57, 9517, 2, 1, 1, '2024-07-12', 5, 324),
(17, 'Camping La Belle Étoile', 'Côte-Nord', '3637 Rue de l\'Île', 'Sept-Îles', 'G4R 4L2', 'À Sept-Îles, le Camping La Belle Étoile est idéal pour les amateurs de plein air avec ses plages de sable et ses forêts denses. Les visiteurs peuvent explorer la région, pratiquer des sports nautiques et profiter de la tranquillité du bord de mer.', 254, 3560, 2, 1, 1, '2024-07-12', 2, 324),
(18, 'Camping Les Pionniers', 'Centre-du-Québec', '3839 Avenue des Sommets', 'Victoriaville', 'G6P 4T7', 'Situé à Victoriaville, le Camping Les Pionniers est entouré de forêts et de champs, offrant un cadre idéal pour des vacances tranquilles. Les campeurs peuvent participer à des randonnées, des visites de fermes locales et des activités en famille.', 116, 4717, 5, 1, 0, '2024-07-12', 3, 324),
(19, 'Camping Le Ruisseau', 'Laurentides', '4041 Chemin des Cascades', 'Mont-Laurier', 'J9L 3H9', 'À Mont-Laurier, le Camping Le Ruisseau est un refuge naturel avec ses rivières cristallines et ses bois paisibles. Les visiteurs peuvent profiter de la pêche, des balades en forêt et des soirées conviviales autour du feu de camp.', 195, 5996, 2, 1, 1, '2024-07-12', 5, 324),
(20, 'Camping Les Étoiles', 'Bas-Saint-Laurent', '4243 Route de la Vallée', 'Saint-Félicien', 'G8K 1R1', 'Situé à Saint-Félicien, le Camping Les Étoiles offre une expérience unique sous un ciel étoilé. Avec des activités comme le canoë, les randonnées et l\'observation de la faune, ce camping est parfait pour ceux qui cherchent à se reconnecter avec la nature.', 266, 4614, 2, 1, 0, '2024-07-12', 2, 324),
(49, 'Camping Banana Slama', 'Mauricie', '1234, chemin du bananier', 'BananaVille', 'B4N 4N4', 'Camping de Donkey Kong et ses amis lol', 100, 1000, 5, 1, 1, '2024-07-02', 2, 501);

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
(1, 'Tranquilité', 'Profitez d\'une escapade sereine en pleine nature avec notre camping Tranquilité. Idéal pour ceux recherchant paix et calme, vous trouverez des emplacements isolés pour vous ressourcer loin du tumulte quotidien.'),
(2, 'Activités sportives', 'Pour les amateurs de sensations fortes, notre camping Activités sportives offre des emplacements proches de sentiers de randonnée, de pistes cyclables et de plans d\'eau pour pratiquer l\'escalade, le canoë-kayak et le VTT.'),
(3, 'Hivernal', 'Découvrez le charme unique du camping en hiver avec notre expérience Hivernal. Profitez d\'activités comme le ski, les raquettes, et les feux de camp sous les étoiles, tout en restant confortablement au chaud.'),
(4, 'Camping en tente', 'Vivez une expérience authentique avec notre camping en tente. Idéal pour les puristes, montez votre tente et dormez à la belle étoile, entouré par les sons et les odeurs apaisants de la nature.'),
(5, 'Prêts à camper', 'Simplifiez votre séjour avec notre expérience Prêts à camper. Tout est préparé pour vous : tentes ou cabanes aménagées, prêtes à vous accueillir dès votre arrivée pour un séjour confortable et sans stress.'),
(6, 'Familiale', 'Découvrez nos campings idéaux pour des vacances en famille, offrant des installations adaptées aux enfants, des activités ludiques pour tous les âges, et un environnement sécurisé pour créer des souvenirs inoubliables en famille.');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `province`, `country`) VALUES
(1, 'Bas-Saint-Laurent', 'Québec', 'Canada'),
(2, 'Saguenay-Lac-Saint-Jean', 'Québec', 'Canada'),
(3, 'Capitale-Nationale', 'Québec', 'Canada'),
(4, 'Mauricie', 'Québec', 'Canada'),
(5, 'Estrie', 'Québec', 'Canada'),
(6, 'Montréal', 'Québec', 'Canada'),
(7, 'Outaouais', 'Québec', 'Canada'),
(8, 'Abitibi-Témiscamingue', 'Québec', 'Canada'),
(9, 'Côte-Nord', 'Québec', 'Canada'),
(10, 'Nord-du-Québec', 'Québec', 'Canada'),
(11, 'Gaspésie-Îles-de-la-Madeleine', 'Québec', 'Canada'),
(12, 'Chaudière-Appalaches', 'Québec', 'Canada'),
(13, 'Laval', 'Québec', 'Canada'),
(14, 'Lanaudière', 'Québec', 'Canada'),
(15, 'Laurentides', 'Québec', 'Canada'),
(16, 'Montérégie', 'Québec', 'Canada'),
(17, 'Centre-du-Québec', 'Québec', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `camping_id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `nb_stars` int NOT NULL,
  `review` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `camping_id`, `username`, `email`, `date`, `nb_stars`, `review`) VALUES
(1, 1, 'Jeanne', 'jeanne@example.com', '2023-07-15', 4, 'Super camping! J\'ai adoré l\'ambiance chaleureuse et les activités proposées.'),
(2, 1, 'Martin', 'martin@example.com', '2023-08-02', 5, 'Magnifique emplacement près des montagnes. Parfait pour un séjour en famille.'),
(3, 1, 'Sophie', 'sophie@example.com', '2023-06-20', 5, 'Les installations sont très propres et bien entretenues. J\'y retournerai certainement.'),
(4, 1, 'Pierre', 'pierre@example.com', '2023-09-10', 4, 'Très bon accueil et cadre agréable. Idéal pour se ressourcer en pleine nature.'),
(5, 1, 'Marie', 'marie@example.com', '2023-07-30', 3, 'Les sanitaires mériteraient d\'être rénovés, mais le reste est satisfaisant.'),
(6, 2, 'Philippe', 'philippe@example.com', '2023-08-15', 5, 'Vue imprenable sur le lac et ambiance relaxante. Parfait pour déconnecter.'),
(7, 2, 'Julie', 'julie@example.com', '2023-07-05', 4, 'Le personnel est très accueillant et les animations sont variées.'),
(8, 2, 'Luc', 'luc@example.com', '2023-06-18', 5, 'Excellent endroit pour les amateurs de nature. Rien à redire!'),
(9, 2, 'Isabelle', 'isabelle@example.com', '2023-09-05', 5, 'Les emplacements sont spacieux et bien aménagés. Je recommande vivement.'),
(10, 2, 'David', 'david@example.com', '2023-08-25', 4, 'Les tarifs sont un peu élevés mais cela vaut le coup pour l\'emplacement.'),
(11, 3, 'Émilie', 'emilie@example.com', '2023-06-25', 5, 'Cadre enchanteur et tranquillité assurée. Parfait pour les amoureux de la nature.'),
(12, 3, 'Marc', 'marc@example.com', '2023-07-10', 5, 'Les sentiers de randonnée sont magnifiques. Une expérience à renouveler.'),
(13, 3, 'Catherine', 'catherine@example.com', '2023-08-12', 4, 'Les installations sont modernes mais la connexion internet est parfois faible.'),
(14, 3, 'Alexandre', 'alexandre@example.com', '2023-09-20', 5, 'Service impeccable et paysages à couper le souffle. Je recommande vivement!'),
(15, 3, 'Caroline', 'caroline@example.com', '2023-07-08', 3, 'Les sanitaires pourraient être améliorés mais l\'accueil est chaleureux.'),
(16, 4, 'Maxime', 'maxime@example.com', '2023-08-30', 5, 'Le personnel est très sympathique et les activités proposées sont variées.'),
(17, 4, 'Amélie', 'amelie@example.com', '2023-07-20', 4, 'Endroit idéal pour les familles avec enfants. Beaucoup d\'animations.'),
(18, 4, 'Olivier', 'olivier@example.com', '2023-09-15', 5, 'Les installations sont bien entretenues et l\'ambiance est conviviale.'),
(19, 4, 'Sylvie', 'sylvie@example.com', '2023-06-28', 3, 'Les emplacements sont un peu serrés mais la proximité des activités est un avantage.'),
(20, 4, 'Mathieu', 'mathieu@example.com', '2023-07-15', 4, 'Bon rapport qualité-prix. À recommander pour un séjour détente.'),
(21, 5, 'Sophie', 'sophie@example.com', '2023-08-10', 5, 'Emplacement magnifique au bord du lac. Parfait pour les amateurs de tranquillité.'),
(22, 5, 'Nicolas', 'nicolas@example.com', '2023-07-12', 4, 'Les équipements sont modernes et bien entretenus. Un lieu de vacances idéal.'),
(23, 5, 'Charlotte', 'charlotte@example.com', '2023-09-08', 5, 'Le personnel est très accueillant et les services proposés sont excellents.'),
(24, 5, 'Antoine', 'antoine@example.com', '2023-07-25', 4, 'Les activités nautiques sont variées et accessibles à tous. Très agréable!'),
(25, 5, 'Julie', 'julie@example.com', '2023-08-05', 3, 'Les prix sont un peu élevés mais l\'expérience en vaut la peine.'),
(26, 6, 'Thomas', 'thomas@example.com', '2023-09-01', 5, 'Superbe camping avec une vue imprenable. Parfait pour les amoureux de la nature.'),
(27, 6, 'Émilie', 'emilie@example.com', '2023-08-20', 4, 'Les installations sont propres et bien entretenues. Endroit très agréable.'),
(28, 6, 'Guillaume', 'guillaume@example.com', '2023-07-30', 5, 'L\'ambiance est conviviale et les activités proposées sont variées.'),
(29, 6, 'Élodie', 'elodie@example.com', '2023-09-10', 5, 'Service impeccable et emplacement idéal pour explorer la région.'),
(30, 6, 'Julien', 'julien@example.com', '2023-07-18', 4, 'Les emplacements pourraient être plus grands, mais le cadre est magnifique.'),
(31, 7, 'Sarah', 'sarah@example.com', '2023-08-08', 5, 'Vue spectaculaire sur la plage et ambiance relaxante. Parfait pour se ressourcer.'),
(32, 7, 'Vincent', 'vincent@example.com', '2023-07-15', 4, 'Les équipements sont en bon état et le personnel est sympathique.'),
(33, 7, 'Jessica', 'jessica@example.com', '2023-09-05', 5, 'Les services sont de qualité et les animations sont appréciées.'),
(34, 7, 'Alex', 'alex@example.com', '2023-07-25', 4, 'L\'emplacement est idéal pour les amateurs de sports nautiques.'),
(35, 7, 'Marie', 'marie@example.com', '2023-08-20', 3, 'Les tarifs sont un peu élevés pour la région mais l\'expérience globale est positive.'),
(36, 8, 'Charles', 'charles@example.com', '2023-08-18', 5, 'Cadre naturel et paisible, parfait pour une escapade en famille.'),
(37, 8, 'Laura', 'laura@example.com', '2023-07-22', 4, 'Les installations sont bien entretenues et l\'ambiance est agréable.'),
(38, 8, 'Mathilde', 'mathilde@example.com', '2023-09-12', 5, 'Les activités proposées sont diversifiées et adaptées à tous les âges.'),
(39, 8, 'François', 'francois@example.com', '2023-07-30', 4, 'Service attentionné et emplacements spacieux. Je recommande.'),
(40, 8, 'Élise', 'elise@example.com', '2023-08-10', 3, 'L\'accès Wi-Fi est limité mais la beauté des paysages compense largement.'),
(41, 9, 'Gabriel', 'gabriel@example.com', '2023-09-02', 5, 'Endroit calme et bien aménagé, parfait pour se détendre.'),
(42, 9, 'Sophie', 'sophie@example.com', '2023-07-28', 4, 'Les infrastructures sont modernes et propres. Très bon accueil.'),
(43, 9, 'Antoine', 'antoine@example.com', '2023-08-15', 5, 'L\'équipe est très professionnelle et les services sont de qualité.'),
(44, 9, 'Julie', 'julie@example.com', '2023-07-10', 4, 'Les activités sont variées et adaptées à tous les visiteurs.'),
(45, 9, 'Maxime', 'maxime@example.com', '2023-08-25', 3, 'Les tarifs pourraient être revus à la baisse mais l\'expérience est satisfaisante.'),
(46, 10, 'Léa', 'lea@example.com', '2023-08-05', 5, 'Super emplacement avec une vue magnifique sur la mer. Ambiance conviviale.'),
(47, 10, 'Alexandre', 'alexandre@example.com', '2023-07-12', 4, 'Les équipements sont modernes et bien entretenus. Séjour agréable garanti.'),
(48, 10, 'Catherine', 'catherine@example.com', '2023-09-18', 5, 'Service impeccable et personnel accueillant. Je recommande vivement!'),
(49, 10, 'Éric', 'eric@example.com', '2023-07-25', 4, 'Les activités nautiques sont nombreuses et accessibles. Idéal pour les familles.'),
(50, 10, 'Anne', 'anne@example.com', '2023-08-15', 3, 'Les tarifs sont un peu élevés mais l\'emplacement en vaut la peine.'),
(51, 11, 'Maxime', 'maxime@example.com', '2023-09-10', 5, 'Cadre naturel exceptionnel et calme absolu. Parfait pour se ressourcer.'),
(52, 11, 'Julie', 'julie@example.com', '2023-07-28', 4, 'Les installations sont modernes et bien entretenues. Vue panoramique magnifique.'),
(53, 11, 'Antoine', 'antoine@example.com', '2023-08-20', 5, 'Le personnel est attentionné et les activités proposées sont variées.'),
(54, 11, 'Émilie', 'emilie@example.com', '2023-07-10', 4, 'Les emplacements sont spacieux et bien délimités. Séjour très agréable.'),
(55, 11, 'Nicolas', 'nicolas@example.com', '2023-08-25', 3, 'Les tarifs sont un peu élevés mais la qualité des prestations est au rendez-vous.'),
(56, 12, 'Charlotte', 'charlotte@example.com', '2023-08-18', 5, 'Vue magnifique sur la ville et calme absolu. Idéal pour une escapade urbaine.'),
(57, 12, 'Théo', 'theo@example.com', '2023-07-22', 4, 'Les installations sont modernes et bien équipées. Personnel accueillant.'),
(58, 12, 'Léa', 'lea@example.com', '2023-09-12', 5, 'Les services sont de qualité et l\'ambiance est conviviale. À recommander!'),
(59, 12, 'Julien', 'julien@example.com', '2023-07-30', 4, 'Les tarifs sont raisonnables pour la région. Très bon rapport qualité-prix.'),
(60, 12, 'Emma', 'emma@example.com', '2023-08-10', 3, 'L\'accès Wi-Fi est limité mais le cadre naturel compense largement.'),
(61, 13, 'Lucas', 'lucas@example.com', '2023-09-02', 5, 'Endroit paisible et bien entretenu, parfait pour se ressourcer.'),
(62, 13, 'Sarah', 'sarah@example.com', '2023-07-28', 4, 'Les installations sont propres et modernes. Personnel sympathique.'),
(63, 13, 'Thomas', 'thomas@example.com', '2023-08-15', 5, 'Les services sont de qualité et l\'ambiance est relaxante. À découvrir!'),
(64, 13, 'Élise', 'elise@example.com', '2023-07-10', 4, 'Les activités proposées sont variées et adaptées à tous les visiteurs.'),
(65, 13, 'Antoine', 'antoine@example.com', '2023-08-25', 3, 'Les tarifs pourraient être plus compétitifs mais l\'expérience est satisfaisante.'),
(66, 14, 'Julie', 'julie@example.com', '2023-08-05', 5, 'Vue exceptionnelle sur le fjord et ambiance conviviale. Parfait pour les amoureux de la nature.'),
(67, 14, 'Alexandre', 'alexandre@example.com', '2023-07-12', 4, 'Les équipements sont modernes et bien entretenus. Séjour agréable garanti.'),
(68, 14, 'Émilie', 'emilie@example.com', '2023-09-18', 5, 'Service impeccable et personnel accueillant. Je recommande vivement!'),
(69, 14, 'Thomas', 'thomas@example.com', '2023-07-25', 4, 'Les activités nautiques sont nombreuses et accessibles. Idéal pour les familles.'),
(70, 14, 'Laura', 'laura@example.com', '2023-08-15', 3, 'Les tarifs sont un peu élevés mais l\'emplacement en vaut la peine.'),
(71, 15, 'Louis', 'louis@example.com', '2023-09-10', 5, 'Cadre naturel exceptionnel et ambiance paisible. Parfait pour se détendre en famille.'),
(72, 15, 'Sophie', 'sophie@example.com', '2023-07-28', 4, 'Les installations sont modernes et bien entretenues. Vue panoramique magnifique.'),
(73, 15, 'Antoine', 'antoine@example.com', '2023-08-20', 5, 'Le personnel est attentionné et les activités proposées sont variées.'),
(74, 15, 'Émilie', 'emilie@example.com', '2023-07-10', 4, 'Les emplacements sont spacieux et bien délimités. Séjour très agréable.'),
(75, 15, 'Nicolas', 'nicolas@example.com', '2023-08-25', 3, 'Les tarifs sont un peu élevés mais la qualité des prestations est au rendez-vous.'),
(76, 16, 'Maxime', 'maxime@example.com', '2023-08-18', 5, 'Vue magnifique sur la ville et calme absolu. Idéal pour une escapade urbaine.'),
(77, 16, 'Julie', 'julie@example.com', '2023-07-22', 4, 'Les installations sont modernes et bien équipées. Personnel accueillant.'),
(78, 16, 'Léa', 'lea@example.com', '2023-09-12', 5, 'Les services sont de qualité et l\'ambiance est conviviale. À recommander!'),
(79, 16, 'Julien', 'julien@example.com', '2023-07-30', 4, 'Les tarifs sont raisonnables pour la région. Très bon rapport qualité-prix.'),
(80, 16, 'Emma', 'emma@example.com', '2023-08-10', 3, 'L\'accès Wi-Fi est limité mais le cadre naturel compense largement.'),
(81, 17, 'Lucas', 'lucas@example.com', '2023-09-02', 5, 'Endroit paisible et bien entretenu, parfait pour se ressourcer.'),
(82, 17, 'Sarah', 'sarah@example.com', '2023-07-28', 4, 'Les installations sont propres et modernes. Personnel sympathique.'),
(83, 17, 'Thomas', 'thomas@example.com', '2023-08-15', 5, 'Les services sont de qualité et l\'ambiance est relaxante. À découvrir!'),
(84, 17, 'Élise', 'elise@example.com', '2023-07-10', 4, 'Les activités proposées sont variées et adaptées à tous les visiteurs.'),
(85, 17, 'Antoine', 'antoine@example.com', '2023-08-25', 3, 'Les tarifs pourraient être plus compétitifs mais l\'expérience est satisfaisante.'),
(86, 18, 'Julie', 'julie@example.com', '2023-08-05', 5, 'Vue exceptionnelle sur le fjord et ambiance conviviale. Parfait pour les amoureux de la nature.'),
(87, 18, 'Alexandre', 'alexandre@example.com', '2023-07-12', 4, 'Les équipements sont modernes et bien entretenus. Séjour agréable garanti.'),
(88, 18, 'Émilie', 'emilie@example.com', '2023-09-18', 5, 'Service impeccable et personnel accueillant. Je recommande vivement!'),
(89, 18, 'Thomas', 'thomas@example.com', '2023-07-25', 4, 'Les activités nautiques sont nombreuses et accessibles. Idéal pour les familles.'),
(90, 18, 'Laura', 'laura@example.com', '2023-08-15', 3, 'Les tarifs sont un peu élevés mais l\'emplacement en vaut la peine.'),
(91, 19, 'Louis', 'louis@example.com', '2023-09-10', 5, 'Cadre naturel exceptionnel et ambiance paisible. Parfait pour se détendre en famille.'),
(92, 19, 'Sophie', 'sophie@example.com', '2023-07-28', 4, 'Les installations sont modernes et bien entretenues. Vue panoramique magnifique.'),
(93, 19, 'Antoine', 'antoine@example.com', '2023-08-20', 5, 'Le personnel est attentionné et les activités proposées sont variées.'),
(94, 19, 'Émilie', 'emilie@example.com', '2023-07-10', 4, 'Les emplacements sont spacieux et bien délimités. Séjour très agréable.'),
(95, 19, 'Nicolas', 'nicolas@example.com', '2023-08-25', 3, 'Les tarifs sont un peu élevés mais la qualité des prestations est au rendez-vous.'),
(96, 20, 'Maxime', 'maxime@example.com', '2023-08-18', 5, 'Vue magnifique sur la ville et calme absolu. Idéal pour une escapade urbaine.'),
(97, 20, 'Julie', 'julie@example.com', '2023-07-22', 4, 'Les installations sont modernes et bien équipées. Personnel accueillant.'),
(98, 20, 'Léa', 'lea@example.com', '2023-09-12', 5, 'Les services sont de qualité et l\'ambiance est conviviale. À recommander!'),
(99, 20, 'Julien', 'julien@example.com', '2023-07-30', 4, 'Les tarifs sont raisonnables pour la région. Très bon rapport qualité-prix.'),
(100, 20, 'Emma', 'emma@example.com', '2023-08-10', 3, 'L\'accès Wi-Fi est limité mais le cadre naturel compense largement.'),
(111, 49, 'MarioB', 'MBrothers@example.com', '2024-07-19', 3, 'Beau camping, propriétaires plutôt turbulants et bruyants. Il faut aimer les bananes...');

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
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `campings`
--
ALTER TABLE `campings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
