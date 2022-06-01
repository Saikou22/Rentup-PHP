-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 29 avr. 2022 à 17:49
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rentup`
--

-- --------------------------------------------------------

--
-- Structure de la table `property`
--

CREATE TABLE `property` (
  `id_property` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postale_code` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  `status` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(800) DEFAULT NULL,
  `property_type_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `property`
--

INSERT INTO `property` (`id_property`, `name`, `street`, `city`, `postale_code`, `state`, `country`, `price`, `status`, `create_at`, `image`, `property_type_id`, `seller_id`) VALUES
(1, 'Red Carpet', 'Zirak Road', 'Toronto', '2109', 'Otawa', 'Canada', 802.65, 'For Sale', '2022-04-29 10:08:47', 'p-1.png', 1, 1),
(2, 'Fairemount Properties ', 'Kings Road', 'New-York', '56000', 'New-York', 'USA', 300.28, 'For Rent', '2022-04-29 10:08:38', 'p-4.png', 2, 2),
(3, 'The Real Estate Corner ', 'Mooker Market', 'Newark ', '5624', 'London', 'England', 550.85, 'Sold', '2022-04-29 10:08:32', 'p-3.png', 3, 2),
(4, 'Monaco Palace', 'Charles 3 street', 'Monte Carlo', '98000', 'Monaco', 'Monaco', 209.35, 'For Rent', '2022-04-29 10:08:26', 'p-2.png', 2, 4),
(5, 'Le Champ de Mars ', '6 bd Robespierre', 'Paris', '75007', 'IDF', 'France', 999.35, 'Sold', '2022-04-29 10:08:20', 'p-5.png', 2, 1),
(7, 'La Niçoise', '2 rue du Duc  ', 'Nice ', '13000', 'Nice', 'Italie', 978.35, 'For Sale', '2022-04-29 10:08:14', 'p-6.png', 3, 6),
(8, 'Espace Mayennes', '2 bd Leon Blum  ', 'Laval', '44500', 'Laval', 'France', 578.35, 'For Sale', '2022-04-29 10:08:07', 'p-6.png', 2, 3),
(9, 'Duc de Bretagne', '2 bd Gl de Gaule  ', 'Nantes', '44000', 'Nantes', 'France', 998.35, 'For Rent', '2022-04-29 10:05:01', 'p-3.png', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `PropertyType`
--

CREATE TABLE `PropertyType` (
  `id_property_type` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `picto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `PropertyType`
--

INSERT INTO `PropertyType` (`id_property_type`, `name`, `value`, `picto`) VALUES
(1, 'Maison', 122, 'fa fa-home'),
(2, 'Appartement', 155, 'fa fa-building'),
(3, 'Villa', 202, 'fa fa-home');

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

CREATE TABLE `seller` (
  `id_seller` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `profil_picture` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`id_seller`, `firstname`, `lastname`, `location`, `email`, `mot_de_passe`, `telephone`, `profil_picture`) VALUES
(1, 'Anne k', 'Young ', '20 broadway Road, New York ', 'young@gmail.com', '1234', '01 34 56 78 98', './images/team-1.jpg'),
(2, 'Harijeet ', 'Siller', '1 bd Quebec road, Canada ', 'siller@gmail.com', '12345', '12 98 76 54 32', './images/team-2.jpg'),
(3, 'Sargam', 'Sing', '3 kings road, London ', 'sing@gmail.com', '123456', '01 45 64 38 92', './images/team-3.jpg'),
(4, 'Grimaldo', 'Michael', '22 briardwood bd', 'michael@gmail.com', '1234567', '01 88 99 45 67', './images/team-4.jpg'),
(5, 'Plazza', 'Stephane', '22 bd de Paris', 'stephane@gmail.com', '12345678', '01 97 84 56 70', './images/team-5.jpg'),
(6, 'Doe', 'John', '2 rue du Maréchal Juin', 'john@gmail.com', '123456789', '07 40 56 70 89 ', './images/team-1.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id_property`),
  ADD KEY `id_property_type_idx` (`property_type_id`),
  ADD KEY `id_seller_idx` (`seller_id`);

--
-- Index pour la table `PropertyType`
--
ALTER TABLE `PropertyType`
  ADD PRIMARY KEY (`id_property_type`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Index pour la table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id_seller`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `property`
--
ALTER TABLE `property`
  MODIFY `id_property` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `id_property_type` FOREIGN KEY (`property_type_id`) REFERENCES `propertytype` (`id_property_type`),
  ADD CONSTRAINT `id_seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id_seller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
