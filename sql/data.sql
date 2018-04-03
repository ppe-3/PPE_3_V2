-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 avr. 2018 à 14:37
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

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

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`numlicense_adherent`, `id_demandeur`, `nom_ad`, `prenom_ad`, `date_naissance_ad`, `mineur`) VALUES
('123', 10, 'ad-test', 'adtest', '2018-03-12', 1),
('1234', 10, 'testad2', 'testad2', '2018-03-31', 1);

--
-- Déchargement des données de la table `bordereau`
--

INSERT INTO `bordereau` (`id_notefrais`, `annee`, `id_demandeur`, `id_adherent`) VALUES
(1, 2015, 0, 0),
(2, 2016, 10, 123),
(3, 2017, 9, 1234),
(4, 2018, 0, 0);

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `adresse_club`, `cp_club`, `ville_club`, `sigle_club`, `nompresident_club`, `id_ligue`) VALUES
(1, 'OL', '10 avenue Simone Veil', 69150, 'Lyon', NULL, 'jean michel aulas', NULL),
(2, 'OM', 'Centre D Entrainement R.l.d.\r\n\r\n33, Traverse La Martine - Bp 116', 13425, 'marseille', NULL, 'Jacques-Henri Eyraud', NULL);

--
-- Déchargement des données de la table `demandeur`
--

INSERT INTO `demandeur` (`id_demandeur`, `nom_demandeur`, `prenom_demandeur`, `rue_demandeur`, `cp_demandeur`, `ville_demandeur`, `motdepasse_demandeur`, `mail_demandeur`, `datenaissance_demandeur`, `sexe_demandeur`, `repre_demandeur`) VALUES
(1, 'lala', 'clement', 'chemin de la route', 82000, 'toulouse', 'mdp1', 'user1@user1', '1998-10-17', 'homme', 0),
(2, 'tersigny', 'Anthony', 'rue du chemin', 82000, 'Lyon', 'mdp2', 'user2@user2', '1999-01-01', 'homme', 0),
(3, 'lala', 'clement', '154 chemin lacoste', 82000, 'montauban', '7aa8e89b78457f437b85967911bd940a1b759bd9649bb40b361666ee4ccfb346', 'lol@lol', '1994-11-02', 'H', 0),
(4, 'lalatest', 'clementest', 'rue test', 16465, 'montauban', '7aa8e89b78457f437b85967911bd940a1b759bd9649bb40b361666ee4ccfb346', 'lala@lalatest', '2017-11-15', 'H', 0),
(5, 'lalatest2', 'clementest2', 'rue test2', 45587, 'montauban2', 'a6b7c51189bdb4c7952c0377d0ab3228c90e2731c91d2bda879d771f648f7750', 'lala@lalatest', '2017-11-15', 'H', 0),
(6, 'tersigny', 'anthony', '6 lotissement Miquelouddd', 9500, 'Rieuros', 'c9b85cb410d5367445bd9d766934c459646962dc9c127586c19b02e6aa473c86', 'anthony.tersigny@limayrac.fr', '2017-12-22', 'H', 0),
(7, 'tersigny', 'anthony', '6 lotissement Miquelouddd', 9500, 'Rieuros', '0a5c7028491723742af22e429b2a49c4c63e3fb303ac91eb5f00ca73e8d49b8d', 'anthony.tersigny@limayrac.fr', '2017-12-22', 'H', 0),
(8, 'lala', 'clement', 'lala', 82000, 'montauban', 'e5a6d282f3f97d31fed7c319c9508320df97f5e43e826324bf9a9fd086ffbaf0', 'lala@lala', '2018-03-15', 'H', 0),
(9, 'lala2', 'clement2', 'lala rue', 82000, 'Montauban', '4907a81d832f0f850c69f1b142bbfa1cf1bb1e2d92e507ea73587aebda698630', 'lala@lala2', '2018-03-14', 'H', 0),
(10, 'lala3', 'lala3', 'rue', 82000, 'toulouse', '069f12f858be5e55a721e52c25381cb98b1e7c2a0953d22e296e15481335dffa', 'lala@lala3', '2018-03-14', 'H', 0),
(11, 'l', 'l', 'l', 0, 'l', '0dc37c473f501e36d5b69a7b8361a90d78adeb94781ad0e1156bd42e31e5c75d', 'l@l', '2018-04-10', 'H', 0);

--
-- Déchargement des données de la table `indemnite`
--

INSERT INTO `indemnite` (`annee_indemnite`, `tarifkilometrique_indemnite`) VALUES
(2016, '15'),
(2017, '14'),
(2018, '30');

--
-- Déchargement des données de la table `lignefrais`
--

INSERT INTO `lignefrais` (`id_lf`, `datetrajet_lf`, `trajet_lf`, `km_lf`, `couttrajet_lf`, `coutpeage_lf`, `coutrepas_lf`, `couthebergement_lf`, `annee_indemnite`, `id_motif`, `id_demandeur`, `annees`) VALUES
(2, '2016-10-12', '', 42, '0', '56', '75', '485', 2016, 2, 0, ''),
(3, '2017-12-06', 'Lyon-Bordeaux', 12, '55', '56', '369', '26', NULL, 1, 10, '2016'),
(4, '2018-03-08', 'lala', 150, '10', '10', '10', '10', NULL, 2, 0, ''),
(5, '2018-01-04', 'toulouse-montauban', 10, '10', '10', '10', '10', NULL, 1, 9, '2018'),
(8, '2018-03-15', 'AA', 2, '2', '2', '2', '2', NULL, 2, 9, '2017');

--
-- Déchargement des données de la table `ligue_affiliation`
--

INSERT INTO `ligue_affiliation` (`id_ligue`, `libelle_ligue`) VALUES
(1, 'ligue1'),
(2, 'ligue2');

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id_motif`, `libelle_motif`) VALUES
(1, 'motif#1'),
(2, 'motif#2');

--
-- Déchargement des données de la table `representant`
--

INSERT INTO `representant` (`id_representant`, `id_demandeur`, `numlicense_adherent`) VALUES
(1, 2, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
