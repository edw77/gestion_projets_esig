-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 11 Novembre 2021 à 14:35
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(7) NOT NULL,
  `nom_departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `nom_departement`) VALUES
(1, 'ET'),
(2, 'GEE'),
(3, 'SEI'),
(4, 'TIC');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(7) NOT NULL,
  `nom_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'Eleve'),
(2, 'Professeur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(7) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `nombre_inscrits` int(7) NOT NULL DEFAULT '0',
  `nombre_places` int(7) NOT NULL DEFAULT '0',
  `id_departement` int(7) NOT NULL,
  `id_auteur` int(7) NOT NULL,
  `lien_pdf` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `titre`, `nombre_inscrits`, `nombre_places`, `id_departement`, `id_auteur`, `lien_pdf`, `description`) VALUES
(1, 'Création d\'un logiciel de cryptage de données', 0, 5, 4, 3, NULL, NULL),
(2, 'Création d\'un logiciel d\'analyse de données', 0, 3, 4, 4, NULL, NULL),
(3, 'Energies renouvelables', 0, 4, 2, 7, NULL, NULL),
(4, 'Intelligence Artificielle', 0, 10, 4, 7, NULL, NULL),
(5, 'Systèmes connectés dans une voiture ', 0, 5, 3, 5, NULL, NULL),
(6, 'Test en télécom', 0, 10, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(7) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse_mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_sujet` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `adresse_mail`, `mdp`, `id_departement`, `id_sujet`, `id_role`) VALUES
(1, 'WHITE', 'WALTER', 'admin1@esig.fr ', '$2y$12$PKQcNyHVgaecm0a9biZ9NOGFll.VSWzwo6AZDqb68WT9TLGMtaihu', 1, NULL, 3),
(2, 'BENIMARU', 'SHINMON', 'prof-et@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 1, NULL, 2),
(3, 'MESSI', 'LIONEL', 'prof-tic@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 4, NULL, 2),
(4, 'DE RIVIA', 'GERALT', 'prof-tic2@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 4, NULL, 2),
(5, 'VERCETTI', 'TOMMY', 'prof-sei@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 3, NULL, 2),
(6, 'TOMURA', 'SHIGARAKI', 'prof-sei2@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 3, NULL, 2),
(7, 'RASHFORD', 'MARCUS', 'prof-gee2@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 2, NULL, 2),
(8, 'SCORSESE', 'Martin', 'prof-et2@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 4, NULL, 1),
(9, 'DUMOULIN', 'Jean', 'etud-sei@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 3, NULL, 1),
(10, 'Jedusor', 'Thomas', 'etud-tic@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 4, NULL, 1),
(11, 'Who', 'Doctor', 'etud-tic1@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 4, NULL, 1),
(12, 'Butcher', 'Billy', 'etud-tic2@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 4, NULL, 1),
(13, 'Campbell', 'Hughie', 'etud-tic3@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 4, NULL, 1),
(14, 'Kahnwald', 'Jonas', 'etud-tic4@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 4, NULL, 1),
(15, 'Atreides', 'Paul', 'etud-sei1@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 3, NULL, 1),
(16, 'Boone', 'Charles', 'etud-sei2@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 3, NULL, 1),
(17, 'Holmes', 'Mycroft', 'etud-et@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 1, NULL, 1),
(18, 'Shelby', 'Thomas', 'etud-et2@esig.fr', '$2y$12$UQKsi.PtVdl5qZgNu3HJTuME/fckY5BqwlMzIgc.c0/29WebJk59y', 1, NULL, 1),
(19, 'Marcheciel', 'Luc', 'prof-gee@esig.fr', '$2y$12$XeC7xyC4INzrw50hHWT4S.ooKiBWX/hqafUSA4GVqvjTi/Ye.v0Im', 3, NULL,2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_departement` (`id_departement`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `adresse_mail` (`adresse_mail`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_sujet` (`id_sujet`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `FK_id_auteur` FOREIGN KEY (`id_auteur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `FK_id_departement_sujet` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_id_departement` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_id_sujet` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
