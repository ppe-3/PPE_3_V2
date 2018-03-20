-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 13 mars 2018 à 14:33
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

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

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--

CREATE TABLE `indemnite` (
  `annee_indemnite` year(4) NOT NULL,
  `tarifkilometrique_indemnite` decimal(25,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `ligue_affiliation`
--

CREATE TABLE `ligue_affiliation` (
  `id_ligue` int(11) NOT NULL,
  `libelle_ligue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `libelle_motif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notefrais`
--

CREATE TABLE `notefrais` (
  `id_notefrais` int(11) NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
