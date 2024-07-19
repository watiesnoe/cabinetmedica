-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 mai 2024 à 14:23
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabinet`
--

-- --------------------------------------------------------

--
-- Structure de la table `antecedent_personnelle`
--

CREATE TABLE `antecedent_personnelle` (
  `num_alergie` int(11) NOT NULL,
  `substance` varchar(50) DEFAULT NULL,
  `remarque_personnelle` varchar(50) DEFAULT NULL,
  `idpatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE `certificat` (
  `num_certificat` int(11) NOT NULL,
  `type_certificat` varchar(50) DEFAULT NULL,
  `motif_certificat` varchar(50) DEFAULT NULL,
  `num_consult` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `num_commande` int(11) NOT NULL,
  `date_comande` date DEFAULT NULL,
  `statut_commande` varchar(50) DEFAULT NULL,
  `numAgent` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `montant_commande` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`num_commande`, `date_comande`, `statut_commande`, `numAgent`, `id_fournisseur`, `montant_commande`) VALUES
(1, '2024-01-14', NULL, 1, 2, 0),
(2, '2024-01-14', NULL, 1, 2, 0),
(3, '2024-01-14', NULL, 1, 2, 0),
(4, '2024-01-14', NULL, 1, 2, 0),
(5, '2024-01-14', NULL, 1, 2, 0),
(6, '2024-01-14', NULL, 1, 1, 0),
(7, '2024-01-14', NULL, 1, 1, 0),
(8, '2024-01-14', NULL, 1, 1, 0),
(9, '2024-01-14', NULL, 1, 1, 0),
(10, '2024-01-14', NULL, 1, 1, 0),
(11, '2024-01-14', NULL, 1, 1, 0),
(12, '2024-01-14', NULL, 1, 1, 0),
(13, '2024-01-14', NULL, 1, 1, 0),
(14, '2024-01-14', NULL, 1, 1, 0),
(15, '2024-01-15', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `comporte`
--

CREATE TABLE `comporte` (
  `num_examen` int(11) NOT NULL,
  `numDemanceExamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `num_consult` int(11) NOT NULL,
  `date_consult` varchar(50) DEFAULT NULL,
  `motif_consult` varchar(50) DEFAULT NULL,
  `resultat_diagnos` varchar(50) DEFAULT NULL,
  `num_ticket` int(11) DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `num_medecin` int(11) DEFAULT NULL,
  `examen_clinic` varchar(255) DEFAULT NULL,
  `antecedant_medicaux` varchar(255) DEFAULT NULL,
  `antecedant_chirigicale` varchar(255) DEFAULT NULL,
  `antecedant_familiale` varchar(255) DEFAULT NULL,
  `antecedant_autre` varchar(255) DEFAULT NULL,
  `idRendezVous` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`num_consult`, `date_consult`, `motif_consult`, `resultat_diagnos`, `num_ticket`, `idpatient`, `num_medecin`, `examen_clinic`, `antecedant_medicaux`, `antecedant_chirigicale`, `antecedant_familiale`, `antecedant_autre`, `idRendezVous`) VALUES
(1, NULL, NULL, 'Resulta corect', 1, NULL, 1, 'mlvk,dwwc;wxmcv', 'alergique au tor', 'chirigi', 'avg ', 'ilvont ouis ', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `demandeexamen`
--

CREATE TABLE `demandeexamen` (
  `numDemanceExamen` int(11) NOT NULL,
  `nomExamen` varchar(50) DEFAULT NULL,
  `motif_axamen` varchar(50) DEFAULT NULL,
  `dateDamande` datetime DEFAULT NULL,
  `bilanExamen` varchar(50) DEFAULT NULL,
  `num_consult` int(11) DEFAULT NULL,
  `num_ticket` int(11) DEFAULT NULL,
  `date_realisation` date NOT NULL,
  `medecinRealisation` int(11) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `medecinDemande` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `nomStructure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demandeexamen`
--

INSERT INTO `demandeexamen` (`numDemanceExamen`, `nomExamen`, `motif_axamen`, `dateDamande`, `bilanExamen`, `num_consult`, `num_ticket`, `date_realisation`, `medecinRealisation`, `statut`, `medecinDemande`, `idPatient`, `nomStructure`) VALUES
(3, '3', NULL, '2024-05-13 00:00:00', NULL, NULL, 2, '0000-00-00', NULL, NULL, 0, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dossier_patient`
--

CREATE TABLE `dossier_patient` (
  `num_dossier` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `idpatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `num_examen` int(11) NOT NULL,
  `nom_examen` varchar(150) NOT NULL,
  `code_examen` varchar(50) DEFAULT NULL,
  `prix_axamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`num_examen`, `nom_examen`, `code_examen`, `prix_axamen`) VALUES
(1, 'Radio X', 'RX', 7000),
(2, 'Goute apais', 'GT', 5000),
(3, 'Cardio analyse', 'CA', 7000);

-- --------------------------------------------------------

--
-- Structure de la table `examen_clinique`
--

CREATE TABLE `examen_clinique` (
  `num_examen` int(11) NOT NULL,
  `examen_clinic` varchar(50) DEFAULT NULL,
  `num_consult` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id_fami` int(11) NOT NULL,
  `nom_famille` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id_fami`, `nom_famille`) VALUES
(4, 'Injectables'),
(5, 'Orales'),
(6, 'Pommandes');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom_fournisseur` varchar(50) DEFAULT NULL,
  `adresse_fournisseur` varchar(50) DEFAULT NULL,
  `telephone_fournisseur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `adresse_fournisseur`, `telephone_fournisseur`) VALUES
(1, 'SNT', 'SEGOU', '78451223'),
(2, 'chaka', 'togo', '71730042');

-- --------------------------------------------------------

--
-- Structure de la table `histoire_maladie`
--

CREATE TABLE `histoire_maladie` (
  `num_historique` int(11) NOT NULL,
  `date_debut` int(11) NOT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `idpatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hospitaliser`
--

CREATE TABLE `hospitaliser` (
  `num_hospital` int(11) NOT NULL,
  `date_arrive` date DEFAULT NULL,
  `date_sortis` date DEFAULT NULL,
  `num_lit` int(11) DEFAULT NULL,
  `num_consult` int(11) NOT NULL,
  `num_salle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `identifier`
--

CREATE TABLE `identifier` (
  `num_maladie` int(11) NOT NULL,
  `mum_syptome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `idMedicament` int(11) NOT NULL,
  `num_commande` int(11) NOT NULL,
  `qte_commande` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`idMedicament`, `num_commande`, `qte_commande`) VALUES
(6, 1, '1'),
(6, 2, '1'),
(6, 3, '1'),
(6, 4, '1'),
(6, 5, '1'),
(6, 6, '1'),
(6, 7, '1'),
(6, 8, '1'),
(6, 9, '1'),
(7, 15, '1'),
(8, 10, '1'),
(8, 11, '1'),
(8, 12, '1'),
(8, 13, '1'),
(8, 14, '1'),
(9, 1, '2'),
(9, 2, '2'),
(9, 3, '2'),
(9, 4, '2'),
(9, 5, '2'),
(9, 6, '1'),
(9, 7, '1'),
(9, 8, '1'),
(9, 9, '1'),
(9, 10, '1'),
(9, 11, '1'),
(9, 12, '1'),
(9, 13, '1'),
(9, 14, '1'),
(10, 10, '1'),
(10, 11, '1'),
(10, 12, '1'),
(10, 13, '1'),
(10, 14, '1');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_vente`
--

CREATE TABLE `ligne_vente` (
  `id_ligneVente` int(11) NOT NULL,
  `num_ordo` int(11) NOT NULL,
  `id_lot` int(11) NOT NULL,
  `posologie` varchar(50) DEFAULT NULL,
  `qte_vendu` int(11) DEFAULT NULL,
  `dure_traitement` varchar(50) DEFAULT NULL,
  `quantite_prescite` varchar(50) DEFAULT NULL,
  `statut_ordo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_vente`
--

INSERT INTO `ligne_vente` (`id_ligneVente`, `num_ordo`, `id_lot`, `posologie`, `qte_vendu`, `dure_traitement`, `quantite_prescite`, `statut_ordo`) VALUES
(1, 4, 8, 'matin et soir', 3, NULL, '3', 'effecuter'),
(2, 4, 9, 'CHAQUE MATIN', 2, NULL, '2', 'effecuter'),
(3, 4, 6, 'DEUX LE MATIN ET SOIR', 2, NULL, '2', 'effecuter'),
(4, 5, 6, 'UN SOIR ET MATIN', 2, NULL, '2', 'effecuter'),
(5, 5, 8, 'soir', 2, NULL, '2', 'effecuter'),
(6, 5, 9, 'matin', NULL, NULL, '3', NULL),
(7, 5, 10, 'matin et soir', 2, NULL, '2', 'effecuter');

-- --------------------------------------------------------

--
-- Structure de la table `lit`
--

CREATE TABLE `lit` (
  `num_lit` int(11) NOT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `frais_salle` int(11) DEFAULT NULL,
  `num_salle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `num_livraison` int(11) NOT NULL,
  `date_livraison` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livrer`
--

CREATE TABLE `livrer` (
  `num_livraison` int(11) NOT NULL,
  `id_lot` int(11) NOT NULL,
  `quantite_livre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE `lot` (
  `id_lot` int(11) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `date_fab` date NOT NULL,
  `date_perem` date NOT NULL,
  `quantie_recu` int(11) NOT NULL,
  `quantie_restante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `maladie`
--

CREATE TABLE `maladie` (
  `num_maladie` int(11) NOT NULL,
  `type_maladie` varchar(50) DEFAULT NULL,
  `nom_maladie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `num_medecin` int(11) NOT NULL,
  `nom_medecin` varchar(50) DEFAULT NULL,
  `prenom_medecin` varchar(50) DEFAULT NULL,
  `specialite` varchar(50) DEFAULT NULL,
  `numero_tele` int(11) DEFAULT NULL,
  `adresse_email` varchar(50) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `profile_medecin` varchar(50) DEFAULT NULL,
  `num_structure` int(11) NOT NULL,
  `genre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`num_medecin`, `nom_medecin`, `prenom_medecin`, `specialite`, `numero_tele`, `adresse_email`, `pseudo`, `mot_de_passe`, `profile_medecin`, `num_structure`, `genre`) VALUES
(1, 'Traore', 'Siaba Noé', 'supAdmin', NULL, NULL, 'supadmin@supadmin.com', '$2y$10$IAAAqpDZg8LUzezqJk/NfeSw8nPSBmp8C62VVIsNlIIoE8FOxRY5q', NULL, 1, NULL),
(2, 'Amara', 'COULIFALY', 'admin', 85522356, 'samakebakary338@gmail.com', 'watiesnoe123', '$2y$10$MZb5D3w/6kqSDPRnnNO5XO1Z0EFTTCyVaOwdMDsC/IgN5TSnhm.iu', 'WhatsApp Image 2024-01-03 at 09.24.31 (1).png', 1, 'M'),
(3, 'Coulibaly', 'Fatim', 'admin', 77777777, 'fatime@gmail.com', 'fatime', '$2y$10$SjKyhFWaw23BAtbcWq6NxOq0RBnxiUNjfJAHsTfc.4XmPdA5dKmP2', 'WhatsApp Image 2024-01-03 at 09.24.31 (1).png', 2, 'F');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `idMedicament` int(11) NOT NULL,
  `forme` varchar(50) DEFAULT NULL,
  `dci` varchar(50) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_fami` int(11) DEFAULT NULL,
  `prix_achat` int(255) NOT NULL,
  `prix_vente` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`idMedicament`, `forme`, `dci`, `dosage`, `stock`, `stock_min`, `id_unit`, `id_fami`, `prix_achat`, `prix_vente`) VALUES
(6, 'comprimé', ' Paracétamol', '500mg', 7996, 10, 1, 5, 8000, 10000),
(7, 'comprimé', 'Acide acétylsalicylique', '500mg', 200, 200, 2, 4, 6000, 7000),
(8, 'comprimé dispersible', ' Amoxicillicine', '250g', 795, 200, 1, 5, 5000, 6000),
(9, 'comprimé', 'Artéméther/Luméfantrine', '20mg/120mg; B/24cp', 298, 100, 1, 4, 5000, 6000),
(10, 'solution', 'Benzoate de benzyle', '12,50%', 98, 50, 1, 4, 5000, 6000);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement_medicament`
--

CREATE TABLE `mouvement_medicament` (
  `num_mouve` int(11) NOT NULL,
  `date_mouve` date DEFAULT NULL,
  `type_mouve` varchar(50) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `id_lot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `num_ordo` int(11) NOT NULL,
  `date_ordo` varchar(50) DEFAULT NULL,
  `statut_ordo` int(11) DEFAULT NULL,
  `num_consult` int(11) NOT NULL,
  `idReglement` int(11) DEFAULT NULL,
  `montant` int(255) NOT NULL,
  `dateAchat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ordonnance`
--

INSERT INTO `ordonnance` (`num_ordo`, `date_ordo`, `statut_ordo`, `num_consult`, `idReglement`, `montant`, `dateAchat`) VALUES
(1, '2023-11-30 14:03:25', NULL, 6, NULL, 0, NULL),
(2, '2023-11-30 14:09:11', NULL, 6, NULL, 0, NULL),
(3, '2023-11-30 14:09:51', NULL, 6, NULL, 0, NULL),
(4, '2023-12-21 13:14:24', NULL, 6, NULL, 50000, '2024-01-09'),
(5, '2024-01-10 18:13:51', NULL, 10, NULL, 44000, '2024-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `num_patient` int(11) NOT NULL,
  `prenom_patient` varchar(50) DEFAULT NULL,
  `nom_patient` varchar(50) DEFAULT NULL,
  `age_patient` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `poids_patient` varchar(50) DEFAULT NULL,
  `telephonepat` int(50) DEFAULT NULL,
  `taille_patient` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `groupesangine` varchar(50) DEFAULT NULL,
  `stuation_matrimonial` varchar(50) DEFAULT NULL,
  `fils_de` varchar(50) DEFAULT NULL,
  `ethnie` varchar(100) NOT NULL,
  `idsecurite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`num_patient`, `prenom_patient`, `nom_patient`, `age_patient`, `genre`, `poids_patient`, `telephonepat`, `taille_patient`, `profession`, `adresse`, `groupesangine`, `stuation_matrimonial`, `fils_de`, `ethnie`, `idsecurite`) VALUES
(1, 'Mousphat', 'Ousma', '34', 'M', '52', 75566321, '2', NULL, 'togotout vas bien', 'AB', 'Celibataire', 'Mamadou', 'bozo', 1),
(2, 'ballo', 'Bakary', '9', 'F', NULL, 74125889, NULL, NULL, NULL, NULL, NULL, NULL, 'Peul', 2);

-- --------------------------------------------------------

--
-- Structure de la table `posologie`
--

CREATE TABLE `posologie` (
  `num_posologie` int(11) NOT NULL,
  `type_posologie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posologie`
--

INSERT INTO `posologie` (`num_posologie`, `type_posologie`) VALUES
(1, 'matin/soir');

-- --------------------------------------------------------

--
-- Structure de la table `reglements`
--

CREATE TABLE `reglements` (
  `idReglement` int(11) NOT NULL,
  `code_paiement` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reglements`
--

INSERT INTO `reglements` (`idReglement`, `code_paiement`, `nom`) VALUES
(1, 'OM', 'Orange Money'),
(2, 'MoovM', 'Moov money');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `num_rendez` int(11) NOT NULL,
  `jour` varchar(50) DEFAULT NULL,
  `heure_rendezvous` varchar(50) DEFAULT NULL,
  `idpatient` int(11) NOT NULL,
  `numAgent` int(11) NOT NULL,
  `effectuer` varchar(50) DEFAULT NULL,
  `motif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`num_rendez`, `jour`, `heure_rendezvous`, `idpatient`, `numAgent`, `effectuer`, `motif`) VALUES
(1, '2023-11-30', NULL, 0, 0, NULL, ''),
(5, '2023-11-30', '11:00', 1, 1, NULL, 'rende vosu'),
(6, '2023-12-03', '11:00', 2, 1, 'actif', 'JE SUISDsdsgsd');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `num_salle` int(11) NOT NULL,
  `code_salle` varchar(50) DEFAULT NULL,
  `type_salle` varchar(50) DEFAULT NULL,
  `num_structure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`num_salle`, `code_salle`, `type_salle`, `num_structure`) VALUES
(1, 'Salle I', NULL, 2),
(2, 'Salle II', NULL, 2),
(3, 'Salle III', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `securite_sociale`
--

CREATE TABLE `securite_sociale` (
  `idSecurite` int(11) NOT NULL,
  `nom_societe` varchar(50) DEFAULT NULL,
  `pourcentage_montant` int(11) DEFAULT NULL,
  `codesociete` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `securite_sociale`
--

INSERT INTO `securite_sociale` (`idSecurite`, `nom_societe`, `pourcentage_montant`, `codesociete`) VALUES
(1, 'AMO POUR ETAT', 75, 'AMO'),
(2, 'Mutalite', 60, 'Mta'),
(3, 'Mali muta', 60, 'Mta'),
(4, 'Mutalite', 60, 'Mta'),
(5, 'Mutalite', 60, 'Mta');

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `num_structure` int(11) NOT NULL,
  `nom_structure` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`num_structure`, `nom_structure`) VALUES
(1, 'direction'),
(2, 'Salle pediatrie'),
(3, 'bloc operatoire'),
(4, 'Urologie');

-- --------------------------------------------------------

--
-- Structure de la table `symptome`
--

CREATE TABLE `symptome` (
  `mum_syptome` int(11) NOT NULL,
  `type_symtome` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `num_consult` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `num_ticket` int(11) NOT NULL,
  `date_ticket` date DEFAULT NULL,
  `type_ticket` varchar(50) DEFAULT NULL,
  `motif_ticket` varchar(50) DEFAULT NULL,
  `idPatient` int(11) NOT NULL,
  `date_expire` date NOT NULL,
  `frais` int(11) NOT NULL,
  `idUt` int(11) NOT NULL,
  `codeStructure` int(11) NOT NULL,
  `statut_ticket` varchar(50) DEFAULT NULL,
  `autre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`num_ticket`, `date_ticket`, `type_ticket`, `motif_ticket`, `idPatient`, `date_expire`, `frais`, `idUt`, `codeStructure`, `statut_ticket`, `autre`) VALUES
(1, '2024-04-27', 'consultation', 'il est sain et sauf', 1, '2024-05-07', 6000, 1, 1, 'utiliser', NULL),
(2, '2024-05-13', 'analyse', 'Analyse simple', 2, '2024-05-23', 7000, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `traitement_en_cours`
--

CREATE TABLE `traitement_en_cours` (
  `num_traitement` int(11) NOT NULL,
  `pathologie` varchar(50) DEFAULT NULL,
  `traitement` varchar(50) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `duree` date DEFAULT NULL,
  `idpatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE `unite` (
  `code_unite` varchar(255) DEFAULT NULL,
  `code_nom` varchar(255) DEFAULT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `unite`
--

INSERT INTO `unite` (`code_unite`, `code_nom`, `id_unit`) VALUES
('bts', 'Boite ', 1),
('plt', 'Plaquette', 2),
('Pdre', 'Poudre', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `antecedent_personnelle`
--
ALTER TABLE `antecedent_personnelle`
  ADD PRIMARY KEY (`num_alergie`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD PRIMARY KEY (`num_certificat`),
  ADD KEY `num_consult` (`num_consult`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_commande`),
  ADD KEY `num_livraison` (`numAgent`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD PRIMARY KEY (`num_examen`,`numDemanceExamen`),
  ADD KEY `numDemanceExamen` (`numDemanceExamen`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`num_consult`);

--
-- Index pour la table `demandeexamen`
--
ALTER TABLE `demandeexamen`
  ADD PRIMARY KEY (`numDemanceExamen`);

--
-- Index pour la table `dossier_patient`
--
ALTER TABLE `dossier_patient`
  ADD PRIMARY KEY (`num_dossier`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`num_examen`);

--
-- Index pour la table `examen_clinique`
--
ALTER TABLE `examen_clinique`
  ADD PRIMARY KEY (`num_examen`),
  ADD KEY `num_consult` (`num_consult`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id_fami`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `histoire_maladie`
--
ALTER TABLE `histoire_maladie`
  ADD PRIMARY KEY (`num_historique`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `hospitaliser`
--
ALTER TABLE `hospitaliser`
  ADD PRIMARY KEY (`num_hospital`),
  ADD KEY `num_lit` (`num_lit`),
  ADD KEY `num_consult` (`num_consult`),
  ADD KEY `num_salle` (`num_salle`);

--
-- Index pour la table `identifier`
--
ALTER TABLE `identifier`
  ADD PRIMARY KEY (`num_maladie`,`mum_syptome`),
  ADD KEY `mum_syptome` (`mum_syptome`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`idMedicament`,`num_commande`),
  ADD KEY `num_commande` (`num_commande`);

--
-- Index pour la table `ligne_vente`
--
ALTER TABLE `ligne_vente`
  ADD PRIMARY KEY (`id_ligneVente`);

--
-- Index pour la table `lit`
--
ALTER TABLE `lit`
  ADD PRIMARY KEY (`num_lit`),
  ADD KEY `num_salle` (`num_salle`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`num_livraison`);

--
-- Index pour la table `livrer`
--
ALTER TABLE `livrer`
  ADD PRIMARY KEY (`num_livraison`,`id_lot`),
  ADD KEY `id_lot` (`id_lot`);

--
-- Index pour la table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id_lot`),
  ADD KEY `idMedicament` (`idMedicament`);

--
-- Index pour la table `maladie`
--
ALTER TABLE `maladie`
  ADD PRIMARY KEY (`num_maladie`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`num_medecin`),
  ADD KEY `num_structure` (`num_structure`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`idMedicament`);

--
-- Index pour la table `mouvement_medicament`
--
ALTER TABLE `mouvement_medicament`
  ADD PRIMARY KEY (`num_mouve`),
  ADD KEY `id_lot` (`id_lot`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`num_ordo`),
  ADD KEY `num_consult` (`num_consult`),
  ADD KEY `idReglement` (`idReglement`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`num_patient`);

--
-- Index pour la table `posologie`
--
ALTER TABLE `posologie`
  ADD PRIMARY KEY (`num_posologie`);

--
-- Index pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD PRIMARY KEY (`idReglement`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`num_rendez`),
  ADD UNIQUE KEY `idpatient` (`idpatient`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`num_salle`),
  ADD KEY `num_structure` (`num_structure`);

--
-- Index pour la table `securite_sociale`
--
ALTER TABLE `securite_sociale`
  ADD PRIMARY KEY (`idSecurite`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`num_structure`);

--
-- Index pour la table `symptome`
--
ALTER TABLE `symptome`
  ADD PRIMARY KEY (`mum_syptome`),
  ADD KEY `num_consult` (`num_consult`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`num_ticket`),
  ADD KEY `idpatient` (`idPatient`);

--
-- Index pour la table `traitement_en_cours`
--
ALTER TABLE `traitement_en_cours`
  ADD PRIMARY KEY (`num_traitement`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `unite`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `antecedent_personnelle`
--
ALTER TABLE `antecedent_personnelle`
  MODIFY `num_alergie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `certificat`
--
ALTER TABLE `certificat`
  MODIFY `num_certificat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `num_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `num_consult` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demandeexamen`
--
ALTER TABLE `demandeexamen`
  MODIFY `numDemanceExamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dossier_patient`
--
ALTER TABLE `dossier_patient`
  MODIFY `num_dossier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `num_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `examen_clinique`
--
ALTER TABLE `examen_clinique`
  MODIFY `num_examen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id_fami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `num_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `securite_sociale`
--
ALTER TABLE `securite_sociale`
  MODIFY `idSecurite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `num_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
