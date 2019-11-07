-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 nov. 2019 à 21:13
-- Version du serveur :  5.7.23
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_gestion_pelerin`
--

-- --------------------------------------------------------

--
-- Structure de la table `tab_admin`
--

DROP TABLE IF EXISTS `tab_admin`;
CREATE TABLE IF NOT EXISTS `tab_admin` (
  `ID_AD` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_AD` varchar(100) NOT NULL,
  `LOGIN_AD` varchar(100) NOT NULL,
  `MDP_AD` varchar(100) NOT NULL,
  `PHONE_AD` varchar(100) NOT NULL,
  `MAIL_AD` varchar(100) NOT NULL,
  `ADRESSE_AD` varchar(100) NOT NULL,
  `SIEGE_AD` varchar(100) NOT NULL,
  `LOGO_AD` varchar(100) NOT NULL,
  `TYPE_AD` int(11) NOT NULL,
  `SAVE_AD` varchar(100) NOT NULL,
  `UPDATE_AD` varchar(100) NOT NULL,
  `DELETE_AD` varchar(100) NOT NULL,
  `CONNECT_AD` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_AD`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_admin`
--

INSERT INTO `tab_admin` (`ID_AD`, `NOM_AD`, `LOGIN_AD`, `MDP_AD`, `PHONE_AD`, `MAIL_AD`, `ADRESSE_AD`, `SIEGE_AD`, `LOGO_AD`, `TYPE_AD`, `SAVE_AD`, `UPDATE_AD`, `DELETE_AD`, `CONNECT_AD`) VALUES
(1, 'CNSPM', 'comite', 'fe974dbcd214a36943c5d8639ae807a7', '76695935', 'comite@gmail.com', '5985', 'OUAGADOUGOU', '1.PNG', 1, '', '', '', '2019-11-07 19:20:43'),
(2, 'MTSOFT Sarl', 'mtsoft', 'df86a5d2471a2d510c18bbaa8c298bec', '78758873', 'raficvoyage@gmail.com', 'raficvoyage@gmail.com', 'ouagadougou', 'ouaga', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tab_agence`
--

DROP TABLE IF EXISTS `tab_agence`;
CREATE TABLE IF NOT EXISTS `tab_agence` (
  `ID_AG` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_AG` varchar(60) NOT NULL,
  `PHONE_AG` varchar(12) NOT NULL,
  `MAIL_AG` varchar(60) NOT NULL,
  `ADRESSE_AG` varchar(60) NOT NULL,
  `SIEGE_AG` varchar(60) NOT NULL,
  `LOGO_AG` varchar(100) NOT NULL,
  `ACTIVE_AG` int(11) NOT NULL,
  `QUOTA_AG` int(11) NOT NULL DEFAULT '0',
  `SAVE_AG` varchar(60) NOT NULL,
  `UPDATE_AG` varchar(60) NOT NULL,
  `DELETE_AG` int(11) NOT NULL,
  PRIMARY KEY (`ID_AG`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_agence`
--

INSERT INTO `tab_agence` (`ID_AG`, `NOM_AG`, `PHONE_AG`, `MAIL_AG`, `ADRESSE_AG`, `SIEGE_AG`, `LOGO_AG`, `ACTIVE_AG`, `QUOTA_AG`, `SAVE_AG`, `UPDATE_AG`, `DELETE_AG`) VALUES
(1, 'AL HOUDA INTERNATIONAL', '25 38 38 84', 'raficvoyage@gmail.com', '01 ouaga bp 5985 ouaga 01', 'BOBO DIOULASSO', 'AL HOUDA INTERNATIONAL25 38 38 8420191030140247.jpg', 0, 300, '2019-10-30 14:02:47', '2019-11-04 08:55:23', 0),
(2, 'OKAZ UNITED CO', '71706945', 'okaz@gmail.com', '5985', 'OUAGADOUGOU', 'OKAZ UNITED CO7170694520191104085107.jpg', 0, 300, '2019-11-04 08:51:07', '', 0),
(3, 'RAFIC VOYAGE Sarl', '25 38 38 84', 'raficvoyage@gmail.com', '5985', 'OUAGADOUGOU', 'RAFIC VOYAGE Sarl25 38 38 8420191107190709.jpg', 0, 0, '2019-11-07 19:07:10', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_batiment`
--

DROP TABLE IF EXISTS `tab_batiment`;
CREATE TABLE IF NOT EXISTS `tab_batiment` (
  `ID_BATI` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_BATI` varchar(60) NOT NULL,
  `PROPRIETAIRE_BATI` varchar(60) NOT NULL,
  `QUARTIER_BATI` varchar(60) NOT NULL,
  `NB_LIT_BATI` int(11) NOT NULL,
  `AGENCE_BATI` int(11) NOT NULL,
  `SAVE_BATI` varchar(60) NOT NULL,
  `UPDATE_BATI` varchar(60) NOT NULL,
  `DELETE_BATI` int(11) NOT NULL,
  PRIMARY KEY (`ID_BATI`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_batiment`
--

INSERT INTO `tab_batiment` (`ID_BATI`, `NOM_BATI`, `PROPRIETAIRE_BATI`, `QUARTIER_BATI`, `NB_LIT_BATI`, `AGENCE_BATI`, `SAVE_BATI`, `UPDATE_BATI`, `DELETE_BATI`) VALUES
(1, 'B1', 'KALKAZI', '251K', 500, 5, '2019-05-16 13:08:26', '2019-05-21 14:07:16', 0),
(2, 'B2', 'KALKAZ', '251J', 150, 4, '2019-05-16 13:09:55', '2019-05-16 17:57:57', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_facilitateur`
--

DROP TABLE IF EXISTS `tab_facilitateur`;
CREATE TABLE IF NOT EXISTS `tab_facilitateur` (
  `ID_FACILITE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_FACILITE` varchar(60) NOT NULL,
  `PRENOM_FACILITE` varchar(60) NOT NULL,
  `NAISS_FACILITE` varchar(20) NOT NULL,
  `MAIL_FACILITE` varchar(60) NOT NULL,
  `PHONE_FACILITE` varchar(60) NOT NULL,
  `RESID_FACILITE` varchar(60) NOT NULL,
  `PHOTO_FACILITE` varchar(60) DEFAULT NULL,
  `STATUT_FACILITE` int(11) NOT NULL,
  `AG_FACILITE` int(11) NOT NULL,
  `SAVE_FACILITE` varchar(20) NOT NULL,
  `DELETE_FACILITE` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_FACILITE`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_facilitateur`
--

INSERT INTO `tab_facilitateur` (`ID_FACILITE`, `NOM_FACILITE`, `PRENOM_FACILITE`, `NAISS_FACILITE`, `MAIL_FACILITE`, `PHONE_FACILITE`, `RESID_FACILITE`, `PHOTO_FACILITE`, `STATUT_FACILITE`, `AG_FACILITE`, `SAVE_FACILITE`, `DELETE_FACILITE`) VALUES
(1, 'SAWADOGO', 'ALASSANE', '2019-10-10', 'sana@gmail.com', '78787878', 'OUAGADOUGOU', NULL, 1, 1, '2019-10-30 14:08:39', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_partenaire`
--

DROP TABLE IF EXISTS `tab_partenaire`;
CREATE TABLE IF NOT EXISTS `tab_partenaire` (
  `ID_PART` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_PART` varchar(100) NOT NULL,
  `PRENOM_PART` varchar(100) NOT NULL,
  `ADRESSE_PART` varchar(60) NOT NULL,
  `MAIL_PART` varchar(60) NOT NULL,
  `PHONE_PART` varchar(60) NOT NULL,
  `SAVE_PART` varchar(60) NOT NULL,
  `DELETE_PART` int(11) NOT NULL,
  PRIMARY KEY (`ID_PART`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_partenaire`
--

INSERT INTO `tab_partenaire` (`ID_PART`, `NOM_PART`, `PRENOM_PART`, `ADRESSE_PART`, `MAIL_PART`, `PHONE_PART`, `SAVE_PART`, `DELETE_PART`) VALUES
(3, 'FAIB', 'FAIB Ouaga', '5623', 'mane87tasere@gmail.com', '789456123', '2019-05-14 14:43:36', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_payement`
--

DROP TABLE IF EXISTS `tab_payement`;
CREATE TABLE IF NOT EXISTS `tab_payement` (
  `PAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAY_TYPE` varchar(20) NOT NULL,
  `PAY_MONTANT` float NOT NULL,
  `PAY_NUM_CHEQUE` varchar(100) NOT NULL,
  `PAY_BANQUE` varchar(100) NOT NULL,
  `PAY_COMPTE` varchar(100) NOT NULL,
  `PAY_DATEVIREMENT` varchar(100) NOT NULL,
  `PAY_AUTRE` varchar(100) NOT NULL,
  `PAY_PELERIN` varchar(100) NOT NULL,
  `PAY_SAVE` varchar(100) NOT NULL DEFAULT '00-00-0000 00:00:00',
  `PAY_JOUR` date NOT NULL,
  `PAY_UPDATE` varchar(100) NOT NULL DEFAULT '00-00-0000 00:00:00',
  `PAY_DEL` int(11) NOT NULL DEFAULT '1',
  `PAY_IDUSER` int(11) NOT NULL,
  PRIMARY KEY (`PAY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_payement`
--

INSERT INTO `tab_payement` (`PAY_ID`, `PAY_TYPE`, `PAY_MONTANT`, `PAY_NUM_CHEQUE`, `PAY_BANQUE`, `PAY_COMPTE`, `PAY_DATEVIREMENT`, `PAY_AUTRE`, `PAY_PELERIN`, `PAY_SAVE`, `PAY_JOUR`, `PAY_UPDATE`, `PAY_DEL`, `PAY_IDUSER`) VALUES
(1, 'Espece', 200000, '', '', '', '', 'TRAORE Lassina', '2', '2019-11-04 10:31:03', '2019-11-04', '00-00-0000 00:00:00', 0, 2),
(2, 'Espece', 500000, '', '', '', '', '', '2', '2019-11-04 14:19:04', '2019-11-04', '00-00-0000 00:00:00', 0, 2),
(3, 'Espece', 1000000, '', 'Ecobank', '', '2019-11-14', '', '1', '2019-11-07 00:20:06', '2019-11-07', '00-00-0000 00:00:00', 0, 2),
(4, 'Espece', 300000, '', '', '', '2019-11-01', '', '3', '2019-11-07 19:18:32', '2019-11-07', '00-00-0000 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_pelerin`
--

DROP TABLE IF EXISTS `tab_pelerin`;
CREATE TABLE IF NOT EXISTS `tab_pelerin` (
  `ID_PELERIN` int(11) NOT NULL AUTO_INCREMENT,
  `PASSEPORT` varchar(20) NOT NULL,
  `NOM_PELERIN` varchar(100) NOT NULL,
  `PRENOM_PELERIN` varchar(100) NOT NULL,
  `NAISS_PELERIN` varchar(60) NOT NULL,
  `SEXE_PELERIN` varchar(10) NOT NULL,
  `NATIONALITE` varchar(60) NOT NULL,
  `DATE_DELIV` varchar(60) NOT NULL,
  `DATE_EXPIR` varchar(60) NOT NULL,
  `VOL_PELERIN` varchar(60) NOT NULL,
  `LOCALITE_PELERIN` varchar(60) NOT NULL,
  `PHONE_PELERIN` varchar(60) NOT NULL,
  `BESOIN_PELERIN` varchar(100) NOT NULL,
  `PHOTO_PELERIN` varchar(100) NOT NULL,
  `AG_PELERIN` int(11) NOT NULL,
  `ID_AGENT` int(11) NOT NULL,
  `ID_COMITE` int(11) NOT NULL,
  `LIRE_PELERIN` varchar(20) NOT NULL,
  `SAVE_PELERIN` varchar(60) NOT NULL,
  `UPDATE_PELERIN` varchar(60) NOT NULL,
  `DEL_PELERIN` int(11) NOT NULL,
  PRIMARY KEY (`ID_PELERIN`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_pelerin`
--

INSERT INTO `tab_pelerin` (`ID_PELERIN`, `PASSEPORT`, `NOM_PELERIN`, `PRENOM_PELERIN`, `NAISS_PELERIN`, `SEXE_PELERIN`, `NATIONALITE`, `DATE_DELIV`, `DATE_EXPIR`, `VOL_PELERIN`, `LOCALITE_PELERIN`, `PHONE_PELERIN`, `BESOIN_PELERIN`, `PHOTO_PELERIN`, `AG_PELERIN`, `ID_AGENT`, `ID_COMITE`, `LIRE_PELERIN`, `SAVE_PELERIN`, `UPDATE_PELERIN`, `DEL_PELERIN`) VALUES
(1, 'B08285929', 'SAWADOGO', 'TASSERE', '2019-11-06', 'Male', 'BFA', '2019-11-14', '2019-11-29', '1', 'OUAGADOUGOU', '71706945', '1', '7875887320191030140449.png', 1, 2, 1, 'Manuel', '2019-11-02 10:10:01', '', 0),
(2, 'A2190161', 'MANE', 'MADI', '2019-11-07', 'Male', 'BFA', '2019-11-08', '2019-11-07', '1', 'OUAGADOUGOU', '78758873', '1', 'noimageMale.png', 1, 2, 1, 'Manuel', '2019-11-02 10:50:26', '', 0),
(3, 'A2190162', 'TRAORE', 'LASSINA', '1955-01-01', 'Male', 'BFA', '2019-11-05', '2019-11-14', '3', 'OUAGADOUGOU', '76695935', '1', 'noimageMale.png', 1, 2, 1, 'Manuel', '2019-11-04 08:00:58', '', 0),
(4, 'A2190168', 'SANOU', 'MADOU', '2019-11-05', 'Male', 'BFA', '2019-11-07', '2019-11-14', '4', 'OUAGADOUGOU', '71706945', '1', 'okaz1.PNG', 1, 0, 0, 'Manuel', '2019-11-06 10:11:06', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_quotas`
--

DROP TABLE IF EXISTS `tab_quotas`;
CREATE TABLE IF NOT EXISTS `tab_quotas` (
  `ID_QUOTA` int(11) NOT NULL AUTO_INCREMENT,
  `QUOTAS` int(11) NOT NULL,
  `ANNE_QUOTA` varchar(20) NOT NULL,
  `MOTIF_QUOTA` varchar(60) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `SAVE_QUOTA` varchar(20) NOT NULL,
  `UPDATE_QUOTA` varchar(20) NOT NULL,
  `DELETE_QUOTA` int(11) NOT NULL,
  PRIMARY KEY (`ID_QUOTA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_quotas`
--

INSERT INTO `tab_quotas` (`ID_QUOTA`, `QUOTAS`, `ANNE_QUOTA`, `MOTIF_QUOTA`, `DESCRIPTION`, `SAVE_QUOTA`, `UPDATE_QUOTA`, `DELETE_QUOTA`) VALUES
(1, 4200, '2015-05-20', 'Hadj 2016', '2015,2016,2017', '2019-05-13 12:07:31', '2019-05-13 12:07:40', 0),
(2, 8143, '2019', 'Hadj 2017', '2015,2016,2017', '2019-05-15 11:40:57', '2019-05-21 13:58:45', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_service`
--

DROP TABLE IF EXISTS `tab_service`;
CREATE TABLE IF NOT EXISTS `tab_service` (
  `ID_SERVICE` int(11) NOT NULL AUTO_INCREMENT,
  `DESIGNATION` varchar(60) NOT NULL,
  `COUT_SERVICE` int(11) NOT NULL,
  `ANNE_EDITION` varchar(60) NOT NULL,
  `DESCRIPTION_SERVICE` varchar(60) NOT NULL,
  `SERVICE_AG` varchar(20) NOT NULL,
  `SAVE_SERVICE` varchar(60) NOT NULL,
  `UPDATE_SERVICE` varchar(60) NOT NULL,
  `DEL_SERVICE` int(11) NOT NULL,
  PRIMARY KEY (`ID_SERVICE`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_service`
--

INSERT INTO `tab_service` (`ID_SERVICE`, `DESIGNATION`, `COUT_SERVICE`, `ANNE_EDITION`, `DESCRIPTION_SERVICE`, `SERVICE_AG`, `SAVE_SERVICE`, `UPDATE_SERVICE`, `DEL_SERVICE`) VALUES
(1, 'HAJ 2020', 2132000, '2020', 'Prix officiel de 2019', '1', '2019-10-30 14:18:47', '2019-11-04 07:44:36', 1),
(2, 'HAJ 2020', 2132000, '2020', 'Prix officiel', '1', '2019-11-04 07:55:06', '', 1),
(3, 'HAJ 2020', 2200000, '2020', 'Prix officiel de 2019', '1', '2019-11-04 07:58:46', '', 1),
(4, 'HAJ 2020', 300000, '2020', 'Prix officiel de 2019', '1', '2019-11-04 08:04:48', '', 0),
(5, 'HAJ 2020', 2200000, '2020', 'Prix officiel', '3', '2019-11-07 19:11:27', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_trajet`
--

DROP TABLE IF EXISTS `tab_trajet`;
CREATE TABLE IF NOT EXISTS `tab_trajet` (
  `ID_TRAJET` int(11) NOT NULL AUTO_INCREMENT,
  `VOLS_ID` int(11) NOT NULL,
  `TYPE_TRAJET` int(11) NOT NULL,
  `VILLE_TRAJET` varchar(60) NOT NULL,
  `DATE_TRAJET` varchar(60) NOT NULL,
  `SAVE_TRAJET` varchar(60) NOT NULL,
  `UPDATE_TRAJET` varchar(60) NOT NULL,
  `DELETE_TRAJET` int(11) NOT NULL,
  PRIMARY KEY (`ID_TRAJET`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_trajet`
--

INSERT INTO `tab_trajet` (`ID_TRAJET`, `VOLS_ID`, `TYPE_TRAJET`, `VILLE_TRAJET`, `DATE_TRAJET`, `SAVE_TRAJET`, `UPDATE_TRAJET`, `DELETE_TRAJET`) VALUES
(1, 2, 0, '', '2019-11-06', '2019-11-04 09:11:37', '', 0),
(2, 1, 1, '', '2019-11-22', '2019-11-04 09:12:23', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_vols`
--

DROP TABLE IF EXISTS `tab_vols`;
CREATE TABLE IF NOT EXISTS `tab_vols` (
  `ID_VOLS` int(11) NOT NULL AUTO_INCREMENT,
  `TRAJET_VOLS` varchar(100) NOT NULL,
  `ARRIVER_VOLS` varchar(100) NOT NULL,
  `COMPAGNIE_VOLS` varchar(100) NOT NULL,
  `NUMERO_VOLS` varchar(60) NOT NULL,
  `VOLUME_VOLS` varchar(60) NOT NULL,
  `PHONE_VOLS` varchar(60) NOT NULL,
  `SAVE_VOLS` varchar(60) NOT NULL,
  `UPDATE_VOLS` varchar(60) NOT NULL,
  `DELETE_VOLS` int(11) NOT NULL,
  PRIMARY KEY (`ID_VOLS`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tab_vols`
--

INSERT INTO `tab_vols` (`ID_VOLS`, `TRAJET_VOLS`, `ARRIVER_VOLS`, `COMPAGNIE_VOLS`, `NUMERO_VOLS`, `VOLUME_VOLS`, `PHONE_VOLS`, `SAVE_VOLS`, `UPDATE_VOLS`, `DELETE_VOLS`) VALUES
(1, 'OUAGADOUGOU', 'DJEDDAH', 'FLAYNASS', 'XY450', '450', '7777777766', '2019-11-04 08:38:45', '', 0),
(2, 'OUAGADOUGOU', 'MEDINE', 'AIR BURKINA', 'AT375', '355', '777777777', '2019-11-04 08:41:57', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NOM` varchar(100) NOT NULL,
  `USER_PRENOM` varchar(100) NOT NULL,
  `USER_PHONE` int(11) NOT NULL,
  `USER_MAIL` varchar(40) NOT NULL,
  `USER_LOGIN` varchar(20) NOT NULL,
  `USER_MDP` varchar(50) NOT NULL,
  `USER_TYPE` int(11) NOT NULL,
  `AG_USER` int(11) NOT NULL,
  `USER_PHOTO` varchar(100) NOT NULL,
  `USER_SAVE` datetime NOT NULL,
  `USER_UPDATE` datetime NOT NULL,
  `USER_ACTIVE` int(11) NOT NULL,
  `USER_DEL` int(11) NOT NULL,
  `USER_CONNECT` datetime NOT NULL,
  `USER_ADMIN` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NOM`, `USER_PRENOM`, `USER_PHONE`, `USER_MAIL`, `USER_LOGIN`, `USER_MDP`, `USER_TYPE`, `AG_USER`, `USER_PHOTO`, `USER_SAVE`, `USER_UPDATE`, `USER_ACTIVE`, `USER_DEL`, `USER_CONNECT`, `USER_ADMIN`) VALUES
(1, 'KABORE', 'AMIDOU', 78758873, 'kaboreamidou@yahoo.fr', 'kabore17', 'e43c737a0e136398d90b2fb3ff27e3ab', 2, 1, '7875887320191030140449.jpg', '2019-10-30 14:04:49', '0000-00-00 00:00:00', 0, 0, '2019-11-07 18:47:04', 1),
(2, 'BARRO', 'Fatoumata', 78787878, 'fatim@gmail.com', 'barro17', '6c0670a36291f8ff0d767c20d0531caf', 4, 1, 'BARROFatoumata20191102113345.jpg', '2019-11-02 11:32:56', '2019-11-02 11:33:45', 0, 0, '2019-11-07 08:53:30', 2),
(3, 'SANA', 'TASSERE', 78787878, 'sana@gmail.com', 'sana17', 'b0b1515418b25ba839431f6c3fed1a2f', 2, 2, '7878787820191104085209.jpg', '2019-11-04 08:52:09', '0000-00-00 00:00:00', 0, 0, '2019-11-04 09:44:00', 1),
(4, 'GUEBRE', 'IBRAHIM', 789456123, 'guebreibrahim@gmail.com', 'guebre20', 'b2540c0be17d4d08ad4f34365f8c3f9b', 2, 3, '78945612320191107190855.jpg', '2019-11-07 19:08:55', '0000-00-00 00:00:00', 0, 0, '2019-11-07 19:09:44', 1),
(5, 'FOFANA', 'MADOU', 7555555, 'kaboreamidou@yahoo.fr', 'fofana18', 'd14aedf50c9308f4e56f2a2a219ca294', 4, 3, '755555520191107191502.jpg', '2019-11-07 19:15:02', '0000-00-00 00:00:00', 0, 0, '2019-11-07 19:16:00', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
