-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 13 mars 2018 à 13:19
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fredi`
--
CREATE DATABASE IF NOT EXISTS `fredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `numlicense_adherent` varchar(100) DEFAULT NULL,
  `id_demandeur` int(11) DEFAULT NULL,
  `nom_ad` varchar(30) DEFAULT NULL,
  `prenom_ad` varchar(30) DEFAULT NULL,
  `date_naissance_ad` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avancer`
--

CREATE TABLE `avancer` (
  `id_recu` int(11) DEFAULT NULL,
  `id_nfd` int(11) DEFAULT NULL,
  `id_representant` int(11) NOT NULL,
  `id_demandeur` int(11) NOT NULL,
  `numlicense_adherent` int(11) NOT NULL,
  `id_demandeur_DEMANDEUR` int(11) NOT NULL,
  `id_lf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `nom_club` varchar(25) NOT NULL,
  `adresse_club` varchar(150) DEFAULT NULL,
  `cp_club` float NOT NULL,
  `ville_club` varchar(25) DEFAULT NULL,
  `sigle_club` varchar(25) DEFAULT NULL,
  `nompresident_club` varchar(25) DEFAULT NULL,
  `id_ligue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `adresse_club`, `cp_club`, `ville_club`, `sigle_club`, `nompresident_club`, `id_ligue`) VALUES
(1, 'OL', '10 avenue Simone Veil', 69150, 'Lyon', NULL, 'jean michel aulas', NULL),
(2, 'OM', 'Centre D Entrainement R.l.d.\r\n\r\n33, Traverse La Martine - Bp 116', 13425, 'marseille', NULL, 'Jacques-Henri Eyraud', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `id_demandeur` int(11) NOT NULL,
  `nom_demandeur` varchar(25) NOT NULL,
  `prenom_demandeur` varchar(25) DEFAULT NULL,
  `rue_demandeur` varchar(25) DEFAULT NULL,
  `cp_demandeur` int(11) DEFAULT NULL,
  `ville_demandeur` varchar(25) DEFAULT NULL,
  `motdepasse_demandeur` varchar(150) DEFAULT NULL,
  `mail_demandeur` varchar(50) DEFAULT NULL,
  `datenaissance_demandeur` date DEFAULT NULL,
  `sexe_demandeur` varchar(25) DEFAULT NULL,
  `repre_demandeur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demandeur`
--

INSERT INTO `demandeur` (`id_demandeur`, `nom_demandeur`, `prenom_demandeur`, `rue_demandeur`, `cp_demandeur`, `ville_demandeur`, `motdepasse_demandeur`, `mail_demandeur`, `datenaissance_demandeur`, `sexe_demandeur`, `repre_demandeur`) VALUES
(1, 'lala', 'clement', 'chemin de la route', 82000, 'toulouse', 'mdp1', 'user1@user1', '1998-10-17', 'homme', ''),
(2, 'tersigny', 'Anthony', 'rue du chemin', 82000, 'Lyon', 'mdp2', 'user2@user2', '1999-01-01', 'homme', ''),
(3, 'lala', 'clement', '154 chemin lacoste', 82000, 'montauban', '7aa8e89b78457f437b85967911bd940a1b759bd9649bb40b361666ee4ccfb346', 'lol@lol', '1994-11-02', 'H', ''),
(4, 'lalatest', 'clementest', 'rue test', 16465, 'montauban', '7aa8e89b78457f437b85967911bd940a1b759bd9649bb40b361666ee4ccfb346', 'lala@lalatest', '2017-11-15', 'H', ''),
(5, 'lalatest2', 'clementest2', 'rue test2', 45587, 'montauban2', 'a6b7c51189bdb4c7952c0377d0ab3228c90e2731c91d2bda879d771f648f7750', 'lala@lalatest', '2017-11-15', 'H', ''),
(6, 'tersigny', 'anthony', '6 lotissement Miquelouddd', 9500, 'Rieuros', 'c9b85cb410d5367445bd9d766934c459646962dc9c127586c19b02e6aa473c86', 'anthony.tersigny@limayrac.fr', '2017-12-22', 'H', 'O'),
(7, 'tersigny', 'anthony', '6 lotissement Miquelouddd', 9500, 'Rieuros', '0a5c7028491723742af22e429b2a49c4c63e3fb303ac91eb5f00ca73e8d49b8d', 'anthony.tersigny@limayrac.fr', '2017-12-22', 'H', 'N'),
(8, 'lala', 'clement', 'lala', 82000, 'montauban', 'e5a6d282f3f97d31fed7c319c9508320df97f5e43e826324bf9a9fd086ffbaf0', 'lala@lala', '2018-03-15', 'H', '');

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--

CREATE TABLE `indemnite` (
  `annee_indemnite` year(4) NOT NULL,
  `tarifkilometrique_indemnite` decimal(25,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `indemnite`
--

INSERT INTO `indemnite` (`annee_indemnite`, `tarifkilometrique_indemnite`) VALUES
(2016, '15'),
(2017, '14'),
(2018, '30');

-- --------------------------------------------------------

--
-- Structure de la table `lignefrais`
--

CREATE TABLE `lignefrais` (
  `id_lf` int(11) NOT NULL,
  `datetrajet_lf` date DEFAULT NULL,
  `trajet_lf` varchar(100) NOT NULL,
  `km_lf` float DEFAULT NULL,
  `couttrajet_lf` decimal(25,0) NOT NULL,
  `coutpeage_lf` decimal(25,0) DEFAULT NULL,
  `coutrepas_lf` decimal(25,0) DEFAULT NULL,
  `couthebergement_lf` decimal(25,0) DEFAULT NULL,
  `annee_indemnite` year(4) DEFAULT NULL,
  `id_motif` int(11) DEFAULT NULL,
  `id_demandeur` int(11) NOT NULL,
  `annees` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefrais`
--

INSERT INTO `lignefrais` (`id_lf`, `datetrajet_lf`, `trajet_lf`, `km_lf`, `couttrajet_lf`, `coutpeage_lf`, `coutrepas_lf`, `couthebergement_lf`, `annee_indemnite`, `id_motif`, `id_demandeur`, `annees`) VALUES
(2, '2016-10-12', '', 42, '0', '56', '75', '485', 2016, 2, 0, ''),
(3, '2017-12-06', 'Lyon-Bordeaux', 12, '55', '56', '369', '26', NULL, 1, 0, ''),
(4, '2018-03-08', 'lala', 150, '10', '10', '10', '10', NULL, 2, 0, ''),
(5, '2018-01-04', 'toulouse-montauban', 10, '10', '10', '10', '10', NULL, 1, 8, '2018'),
(8, '2018-03-15', 'AA', 2, '2', '2', '2', '2', NULL, 2, 8, '2018');

-- --------------------------------------------------------

--
-- Structure de la table `ligue_affiliation`
--

CREATE TABLE `ligue_affiliation` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue_affiliation`
--

INSERT INTO `ligue_affiliation` (`id_ligue`, `libelle_ligue`) VALUES
(1, 'ligue1'),
(2, 'ligue2');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `libelle_motif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id_motif`, `libelle_motif`) VALUES
(1, 'motif#1'),
(2, 'motif#2');

-- --------------------------------------------------------

--
-- Structure de la table `notefrais`
--

CREATE TABLE `notefrais` (
  `id_notefrais` int(11) NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notefrais`
--

INSERT INTO `notefrais` (`id_notefrais`, `annee`) VALUES
(1, 2015),
(2, 2016),
(3, 2017),
(4, 2018);

-- --------------------------------------------------------

--
-- Structure de la table `representant`
--

CREATE TABLE `representant` (
  `id_representant` int(11) NOT NULL,
  `id_demandeur` int(11) NOT NULL,
  `numlicense_adherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `representant`
--

INSERT INTO `representant` (`id_representant`, `id_demandeur`, `numlicense_adherent`) VALUES
(1, 2, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avancer`
--
ALTER TABLE `avancer`
  ADD PRIMARY KEY (`id_representant`,`id_demandeur`,`numlicense_adherent`,`id_demandeur_DEMANDEUR`,`id_lf`),
  ADD KEY `FK_AVANCER_id_demandeur` (`id_demandeur`),
  ADD KEY `FK_AVANCER_numlicense_adherent` (`numlicense_adherent`),
  ADD KEY `FK_AVANCER_id_demandeur_DEMANDEUR` (`id_demandeur_DEMANDEUR`),
  ADD KEY `FK_AVANCER_id_lf` (`id_lf`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `FK_CLUB_id_ligue` (`id_ligue`);

--
-- Index pour la table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`id_demandeur`);

--
-- Index pour la table `indemnite`
--
ALTER TABLE `indemnite`
  ADD PRIMARY KEY (`annee_indemnite`);

--
-- Index pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  ADD PRIMARY KEY (`id_lf`),
  ADD KEY `FK_LIGNEFRAIS_annee_indemnite` (`annee_indemnite`),
  ADD KEY `FK_LIGNEFRAIS_id_motif` (`id_motif`),
  ADD KEY `annee_indemnite` (`annee_indemnite`);

--
-- Index pour la table `ligue_affiliation`
--
ALTER TABLE `ligue_affiliation`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id_motif`);

--
-- Index pour la table `notefrais`
--
ALTER TABLE `notefrais`
  ADD PRIMARY KEY (`id_notefrais`);

--
-- Index pour la table `representant`
--
ALTER TABLE `representant`
  ADD PRIMARY KEY (`id_representant`,`id_demandeur`),
  ADD KEY `FK_REPRESENTANT_id_demandeur` (`id_demandeur`),
  ADD KEY `FK_numlicence_adherent` (`numlicense_adherent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id_demandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  MODIFY `id_lf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `ligue_affiliation`
--
ALTER TABLE `ligue_affiliation`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `notefrais`
--
ALTER TABLE `notefrais`
  MODIFY `id_notefrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `representant`
--
ALTER TABLE `representant`
  MODIFY `id_representant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avancer`
--
ALTER TABLE `avancer`
  ADD CONSTRAINT `FK_AVANCER_id_demandeur` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`),
  ADD CONSTRAINT `FK_AVANCER_id_demandeur_DEMANDEUR` FOREIGN KEY (`id_demandeur_DEMANDEUR`) REFERENCES `demandeur` (`id_demandeur`),
  ADD CONSTRAINT `FK_AVANCER_id_lf` FOREIGN KEY (`id_lf`) REFERENCES `lignefrais` (`id_lf`),
  ADD CONSTRAINT `FK_AVANCER_id_representant` FOREIGN KEY (`id_representant`) REFERENCES `representant` (`id_representant`),
  ADD CONSTRAINT `FK_AVANCER_numlicense_adherent` FOREIGN KEY (`numlicense_adherent`) REFERENCES `adherent` (`numlicense_adherent`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `FK_CLUB_id_ligue` FOREIGN KEY (`id_ligue`) REFERENCES `ligue_affiliation` (`id_ligue`);

--
-- Contraintes pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  ADD CONSTRAINT `FK_LIGNEFRAIS_annee_indemnite` FOREIGN KEY (`annee_indemnite`) REFERENCES `indemnite` (`annee_indemnite`),
  ADD CONSTRAINT `FK_LIGNEFRAIS_id_motif` FOREIGN KEY (`id_motif`) REFERENCES `motif` (`id_motif`);

--
-- Contraintes pour la table `representant`
--
ALTER TABLE `representant`
  ADD CONSTRAINT `FK_REPRESENTANT_id_demandeur` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`),
  ADD CONSTRAINT `FK_numlicence_adherent` FOREIGN KEY (`numlicense_adherent`) REFERENCES `adherent` (`numlicense_adherent`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
