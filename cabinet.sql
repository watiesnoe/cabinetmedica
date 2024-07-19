-- phpMyAdmin SQL Dump
--snt
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 juil. 2024 à 10:45
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
(1, '2024-07-05', 'recu', 1, 1, 400000),
(3, '2024-07-05', NULL, 1, 1, 280000),
(4, '2024-07-06', 'recu', 2, 1, 614700),
(5, '2024-07-06', 'recu', 3, 2, 676000),
(6, '2024-07-06', NULL, 2, 1, 505400),
(7, '2024-07-06', NULL, 4, 1, 382800),
(8, '2024-07-06', NULL, 3, 1, 503800),
(9, '2024-07-06', NULL, 4, 1, 83500),
(10, '2024-07-06', NULL, 2, 1, 717800),
(11, '2024-07-06', NULL, 2, 1, 706400),
(12, '2024-07-06', NULL, 3, 1, 34000),
(13, '2024-07-06', NULL, 3, 1, 54000),
(14, '2024-07-06', NULL, 2, 1, 4200),
(15, '2024-07-06', NULL, 1, 4, 80400);

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
(1, NULL, NULL, 'maux de tete', 3, NULL, NULL, 'mal de coup', '', '', '', '', NULL),
(2, NULL, NULL, 'resultat fini', 5, NULL, NULL, 'Analyse ticket', '', '', '', '', NULL);

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
(1, NULL, NULL, '2024-06-15 00:00:00', 'alanalys ed opopo', NULL, 1, '0000-00-00', 1, NULL, 0, 1, NULL),
(2, NULL, NULL, '2024-06-18 00:00:00', 'tousdfk', NULL, 2, '0000-00-00', 1, NULL, 0, 2, NULL),
(3, NULL, NULL, '2024-06-19 00:00:00', NULL, NULL, 4, '0000-00-00', NULL, NULL, 0, 4, NULL);

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
(1, 'Goute apais', 'GA', 5000),
(2, 'Cardio analyse', 'RX', 5000);

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
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Pommande'),
(2, 'ANALGÉSIQUES OPIOIDES'),
(3, 'SOINS PALLIATIFS'),
(4, 'ANTIALLERGIQUES/ANTI-ANAPHYLACTIQUES'),
(5, 'ANTIEPILEPTIQUES/ANTICONVULSIVANTS'),
(6, 'Antifilariens'),
(7, 'ANTIBACTERIENS'),
(8, 'ANTIFONGIQUES'),
(9, 'ANTIVIRAUX'),
(10, 'ANTIPROTOZOAIRES'),
(11, 'ANTIMIGRAINEUX'),
(12, 'IMMUNOSUPPRESSEURS'),
(13, 'ANTIPARKINSONIENS'),
(14, 'MEDICAMENTS UTILISES EN HEMATOLOGIE'),
(15, 'Médicaments affectant la coagulation');

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
(1, 'FOFANA', 'SEGOU', '74787889'),
(2, 'Maman daff', 'SEGOU', '74787875'),
(3, 'kona Boubou', 'segou', '78945612'),
(4, 'Bakary Samake', 'segou', '78894556');

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
-- Structure de la table `ligne_analyse`
--

CREATE TABLE `ligne_analyse` (
  `id_analyse` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `examen_dema` int(11) NOT NULL,
  `prix_examen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_analyse`
--

INSERT INTO `ligne_analyse` (`id_analyse`, `id_examen`, `examen_dema`, `prix_examen`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 1, 2, 0),
(5, 2, 2, 0),
(6, 1, 3, 0),
(7, 2, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id_ligne` int(11) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `num_commande` int(11) NOT NULL,
  `qte_commande` varchar(50) DEFAULT NULL,
  `qt_recu` int(11) NOT NULL,
  `qt_restant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_ligne`, `idMedicament`, `num_commande`, `qte_commande`, `qt_recu`, `qt_restant`) VALUES
(1, 14, 1, '500', 500, 0),
(2, 16, 1, '200', 200, 0),
(3, 17, 1, '300', 300, 0),
(4, 14, 2, '500', 0, 0),
(5, 16, 2, '200', 0, 0),
(6, 17, 2, '300', 0, 0),
(7, 9, 3, '50', 50, 0),
(8, 12, 3, '20', 7, 13),
(9, 13, 3, '30', 0, 0),
(10, 14, 3, '90', 0, 0),
(11, 16, 3, '20', 0, 0),
(12, 17, 3, '89', 0, 0),
(13, 5, 4, '80', 80, 0),
(14, 14, 4, '99', 99, 0),
(15, 17, 4, '50', 50, 0),
(16, 5, 5, '89', 89, 0),
(17, 18, 5, '50', 50, 0),
(18, 19, 5, '30', 30, 0),
(19, 9, 6, '88', 0, 0),
(20, 12, 6, '20', 0, 0),
(21, 13, 6, '89', 0, 0),
(22, 9, 7, '22', 22, 0),
(23, 11, 7, '89', 0, 0),
(24, 12, 7, '98', 0, 0),
(25, 13, 7, '60', 0, 0),
(26, 9, 8, '89', 0, 0),
(27, 12, 8, '88', 0, 0),
(28, 13, 8, '10', 0, 0),
(29, 16, 9, '78', 0, 0),
(30, 17, 9, '89', 0, 0),
(31, 9, 10, '56', 0, 0),
(32, 11, 10, '200', 0, 0),
(33, 13, 10, '63', 0, 0),
(34, 5, 11, '85', 0, 0),
(35, 11, 11, '55', 0, 0),
(36, 18, 11, '2', 0, 0),
(37, 14, 12, '20', 0, 0),
(38, 17, 12, '56', 0, 0),
(39, 12, 13, '78', 78, 0),
(40, 13, 13, '12', 0, 0),
(41, 12, 14, '7', 0, 0),
(42, 12, 15, '89', 0, 0),
(43, 13, 15, '45', 0, 0),
(44, 5, 15, '78', 0, 0),
(45, 9, 15, '9', 0, 0),
(46, 11, 15, '9', 0, 0),
(47, 18, 15, '15', 0, 0);

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
(1, 1, 16, '1 matin /midi /soir', 3, NULL, '3', 'effecuter'),
(2, 1, 17, '2 matin/ soir', 5, NULL, '5', 'effecuter'),
(3, 1, 18, '1ml/Matin-midi-soir', NULL, NULL, '6', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lit`
--

CREATE TABLE `lit` (
  `num_lit` int(11) NOT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `frais_salle` int(11) DEFAULT NULL,
  `num_salle` int(11) DEFAULT NULL,
  `nom_lit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lit`
--

INSERT INTO `lit` (`num_lit`, `statut`, `frais_salle`, `num_salle`, `nom_lit`) VALUES
(1, NULL, NULL, 3, 0),
(2, NULL, NULL, 3, 0),
(3, NULL, NULL, 3, 0),
(4, NULL, NULL, 3, 0);

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
(1, 'SNT', 'Traoré', 'supAdmin', NULL, NULL, 'supadmin@supadmin.com', '$2y$10$fde.HgEhzFMzH.XakPcpi.zzhmfvppDsF0FvfYlv4.6nzOXZmoS8K', NULL, 1, NULL);

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
(1, 'Comprimé', 'Phosphate de codéine', '40 mg', 0, 60, 1, 2, 5000, 7000),
(2, 'Comprimé', 'Sulfate de morphine', '10 mg', 0, 60, 3, 2, 5000, 6000),
(3, 'Granulé', 'Sulfate de morphine', '40 mg', 0, 70, 3, 2, 5000, 6000),
(4, 'Suspension', 'Sulfate de morphine', '10 mg/5 ml', 0, 80, 1, 2, 7000, 8000),
(5, 'Injectable', 'Chlorhydrate de morphine', '10 mg/ml', 258, 89, 3, 2, 7000, 8000),
(6, 'Sirop', 'Halopéridol', '2 mg/ml', 0, 20, 2, 3, 2000, 2500),
(7, 'Patch', 'Hyoscine hydrobromide', 'Injectable', 0, 40, 1, 3, 2000, 3000),
(8, 'Comprimé', 'Ondansétron', '4 mg; 8 mg', 0, 28, 2, 2, 2000, 2500),
(9, 'Injectable', 'Adrénaline (épinéphrine)', '1 mg/ml', 72, 30, 2, 4, 5000, 6000),
(10, 'Injectable', 'N-acétylcystéine', '200 mg/ml', 0, 15, 4, 3, 800, 1000),
(11, 'Liquide buvable', 'Atropine', '1 mg/ml', 0, 30, 4, 2, 2000, 2500),
(12, 'Injectable', ' Naloxone', '1 mg/ml', 85, 50, 2, 7, 600, 1000),
(13, 'Comprimé', 'Acide valproïque', '100 mg', 0, 30, 1, 7, 600, 700),
(14, 'Sirop', ' Acide valproïque', '1 mg/ml', 656, 20, 2, 2, 300, 500),
(15, 'Injectable', 'Sulfate de Magnésium', '30 mg', 0, 50, 4, 6, 800, 1000),
(16, 'Co. masticable/dispersible', ' Lorazépam', '30 mg', 197, 20, 2, 8, 500, 1000),
(17, 'Sol. buvable', ' Ciprofloxacine HC', '30 mg', 345, 25, 1, 8, 500, 600),
(18, 'Suspension', 'Ciprofloxacine HC', '125 mg/5 ml', 90, 30, 1, 5, 700, 800),
(19, 'Co./Capsule', 'Doxycycline', '100 mg', 50, 30, 2, 2, 600, 800),
(20, 'Perfusion', 'Métronidazole', '500 mg/100 ml', 0, 60, 1, 3, 6000, 7000),
(21, 'gélule', 'Rifampicine', '125 mg/5 ml', 0, 30, 1, 11, 3000, 4000);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_03_103843_create_sessions_table', 1);

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
(1, '2024-07-10 16:08:18', NULL, 1, NULL, 6000, '2024-07-10');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Toure', 'Barry', '34', 'M', NULL, 75566321, NULL, NULL, NULL, NULL, NULL, NULL, 'bozo', NULL),
(2, 'ballo', 'Oumou', '25', 'F', NULL, 74125889, NULL, NULL, NULL, NULL, NULL, NULL, 'Peul', 1),
(3, 'ballo', 'Amina', '34', 'F', '50', 74125889, '2', NULL, 'segou', 'AB', 'Celibataire', 'Mamadou', 'Peul', 1),
(4, 'Toure', 'Ousma', '25', 'M', NULL, 75566321, NULL, NULL, NULL, NULL, NULL, NULL, 'bozo', NULL),
(5, 'Amadou ', 'keita', '25', 'M', '80', 75566321, '2', NULL, 'segou', 'AB', 'Celibataire', 'Mamadou', 'bozo', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posologie`
--

CREATE TABLE `posologie` (
  `num_posologie` int(11) NOT NULL,
  `type_posologie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'OM', 'Orange Money');

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
(1, 'salle 1', NULL, 2),
(2, 'salle 1', NULL, 2),
(3, 'Salle 2', NULL, 2);

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
(2, 'Mutalite', 60, 'Mta');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Direction'),
(2, 'Pediatrie');

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
(1, '2024-06-15', 'analyse', 'analyse', 1, '2024-06-25', 10000, 0, 1, NULL, NULL),
(2, '2024-06-18', 'analyse', 'analyse', 2, '2024-06-28', 10000, 1, 1, NULL, NULL),
(3, '2024-06-18', 'consultation', 'consultationn simple', 3, '2024-06-28', 6000, 1, 1, 'utiliser', NULL),
(4, '2024-06-19', 'analyse', 'Analyse simple', 4, '2024-06-29', 10000, 1, 1, NULL, NULL),
(5, '2024-07-10', 'consultation', 'il est sain et sauf', 5, '2024-07-20', 7800, 1, 2, 'utiliser', NULL);

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
('crts', 'Carton', 1),
('bte', 'Boite', 2),
('plqts', 'plaquette', 3),
('aple', 'Ampoule', 4),
('scht', 'Sachet', 5),
('csht', 'Cachet', 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Index pour la table `ligne_analyse`
--
ALTER TABLE `ligne_analyse`
  ADD PRIMARY KEY (`id_analyse`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id_ligne`);

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
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`num_ordo`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`num_patient`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  ADD PRIMARY KEY (`num_rendez`);

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
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `num_consult` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `num_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `examen_clinique`
--
ALTER TABLE `examen_clinique`
  MODIFY `num_examen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id_fami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ligne_analyse`
--
ALTER TABLE `ligne_analyse`
  MODIFY `id_analyse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `ligne_vente`
--
ALTER TABLE `ligne_vente`
  MODIFY `id_ligneVente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `lit`
--
ALTER TABLE `lit`
  MODIFY `num_lit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `num_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `idMedicament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `num_ordo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `num_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reglements`
--
ALTER TABLE `reglements`
  MODIFY `idReglement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `num_rendez` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `num_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `securite_sociale`
--
ALTER TABLE `securite_sociale`
  MODIFY `idSecurite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `num_structure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `num_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `unite`
--
ALTER TABLE `unite`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
