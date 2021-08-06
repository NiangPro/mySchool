-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 août 2021 à 18:41
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `appreciations`
--

CREATE TABLE `appreciations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appreciations`
--

INSERT INTO `appreciations` (`id`, `value`, `created_at`, `updated_at`) VALUES
(3, 'Bien', '2021-07-07 12:28:09', '2021-07-07 12:28:09'),
(4, 'Médiocre', '2021-07-07 13:46:54', '2021-07-07 13:46:54'),
(5, 'Faible', '2021-07-08 11:04:55', '2021-07-08 11:05:20');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `name`, `libelle`, `created_at`, `updated_at`) VALUES
(1, '4ème', 'quatrième', '2021-06-18 13:01:26', '2021-07-26 11:14:07'),
(3, '6ème', 'sixième', '2021-06-18 13:01:46', '2021-07-26 11:12:06'),
(4, '5ème', 'cinquième', '2021-06-18 13:03:38', '2021-07-26 11:13:21'),
(6, '3ème', 'troisième', '2021-06-18 13:07:59', '2021-07-26 11:14:30');

-- --------------------------------------------------------

--
-- Structure de la table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Amphi 1', 100, '2021-06-18 13:08:18', '2021-07-01 16:00:27'),
(2, 'Amphi 2', 200, '2021-06-18 13:08:32', '2021-06-18 13:08:32'),
(3, 'Salle 1', 35, '2021-07-01 11:12:55', '2021-07-01 16:01:49'),
(4, 'Salle 2', 23, '2021-07-01 15:59:26', '2021-07-01 15:59:26'),
(5, 'Salle 3', 63, '2021-07-08 12:15:57', '2021-07-08 12:15:57');

-- --------------------------------------------------------

--
-- Structure de la table `coefficients`
--

CREATE TABLE `coefficients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coefficients`
--

INSERT INTO `coefficients` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 5, '2021-07-08 11:10:19', '2021-07-08 11:10:19'),
(3, 2, '2021-07-08 11:10:43', '2021-07-08 11:10:43'),
(5, 1, '2021-07-08 16:06:11', '2021-07-08 16:06:11');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `jour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `debut`, `fin`, `jour`, `matiere_id`, `user_id`, `classroom_id`, `classe_id`, `school_year_id`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '09:50:00', 'Jeudi', 1, 13, 5, 1, 1, '2021-06-28 14:53:49', '2021-07-08 12:16:21'),
(4, '08:00:00', '10:00:00', 'Lundi', 2, 14, 3, 4, 1, '2021-07-27 15:52:41', '2021-07-27 15:52:41'),
(5, '14:00:00', '16:00:00', 'Mercredi', 2, 14, 4, 3, 1, '2021-07-27 15:54:31', '2021-07-27 15:54:31'),
(7, '13:00:00', '16:00:00', 'Mardi', 3, 14, 3, 4, 2, '2021-08-02 12:55:44', '2021-08-02 12:55:44');

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
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_matiere_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coefficient` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `name`, `libelle`, `type_matiere_id`, `created_at`, `updated_at`, `coefficient`) VALUES
(1, 'Français', 'Fr', 1, '2021-06-25 15:40:08', '2021-07-12 13:22:05', 4),
(2, 'Texte Suivi de Questions', 'TSQ', 1, '2021-06-25 15:41:33', '2021-07-12 13:06:56', 2),
(3, 'Mathématiques', 'Math', 2, '2021-06-25 16:18:30', '2021-07-12 13:04:33', 4);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_01_154013_create_roles_table', 1),
(5, '2021_06_01_154417_create_permissions_table', 1),
(6, '2021_06_02_090204_create_users_roles_table', 1),
(7, '2021_06_02_090705_create_users_permissions_table', 1),
(8, '2021_06_02_091749_create_role_permissions_table', 1),
(9, '2021_06_07_143657_create_classes_table', 1),
(10, '2021_06_11_100154_create_school_years_table', 1),
(11, '2021_06_11_103659_create_users_classes_table', 1),
(12, '2021_06_11_134222_create_schools_table', 1),
(13, '2021_06_15_091215_create_classrooms_table', 1),
(14, '2021_06_24_111206_create_type_matieres_table', 2),
(15, '2021_06_24_111641_create_matieres_table', 2),
(16, '2021_06_28_101748_create_cours_table', 3),
(17, '2021_07_07_094056_create_appreciations_table', 4),
(18, '2021_07_08_092335_create_coefficients_table', 5),
(19, '2021_07_09_100944_create_periods_table', 6),
(20, '2021_07_12_102804_add_matiere_coefficient', 7),
(21, '2021_07_12_133249_create_notes_table', 8),
(22, '2021_07_15_090900_add_etat_school_years', 9),
(23, '2021_07_15_152036_add_classe_note', 10);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valeur` double UNSIGNED NOT NULL,
  `appreciation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere_id` bigint(20) UNSIGNED DEFAULT NULL,
  `apprenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `period_id` bigint(20) UNSIGNED DEFAULT NULL,
  `enseignant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `valeur`, `appreciation`, `matiere_id`, `apprenant_id`, `period_id`, `enseignant_id`, `school_year_id`, `created_at`, `updated_at`, `classe_id`) VALUES
(1, 17.5, 'Excellent', 2, 10, 1, 14, 1, '2021-07-15 15:42:18', '2021-07-15 15:42:18', 6),
(2, 9.25, 'Insuffisant', 2, 15, 1, 14, 1, '2021-07-16 09:24:20', '2021-07-16 09:24:20', 6),
(3, 12, 'Assez Bien', 2, 4, 1, 14, 1, '2021-08-04 13:50:01', '2021-08-04 13:50:01', 4),
(4, 8, 'Insuffisant', 3, 4, 1, 14, 1, '2021-08-06 16:30:57', '2021-08-06 16:30:57', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `periods`
--

INSERT INTO `periods` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Devoir 1', '2021-07-09 13:25:56', '2021-07-09 13:25:56'),
(4, 'Semestre 1', '2021-07-09 16:31:43', '2021-07-09 16:31:43'),
(5, 'Semestre 2', '2021-07-09 16:32:07', '2021-07-09 16:32:07'),
(6, 'Devoir 2', '2021-07-15 10:50:28', '2021-07-15 10:50:28'),
(7, 'Devoir 3', '2021-07-15 10:50:42', '2021-07-15 10:50:42'),
(8, 'Devoir 4', '2021-07-15 10:50:55', '2021-07-15 10:50:55');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'full permissions', 'full-permissions', '2021-06-18 12:59:24', '2021-06-18 12:59:24'),
(2, 'view', 'view', '2021-06-18 12:59:34', '2021-06-18 12:59:34'),
(3, 'view', 'view', '2021-06-18 12:59:51', '2021-06-18 12:59:51'),
(4, 'add', 'add', '2021-06-18 12:59:51', '2021-06-18 12:59:51'),
(5, 'edit', 'edit', '2021-06-18 12:59:51', '2021-06-18 12:59:51'),
(6, 'delete', 'delete', '2021-06-18 12:59:51', '2021-06-18 12:59:51'),
(7, 'view', 'view', '2021-06-18 13:00:06', '2021-06-18 13:00:06'),
(8, 'view', 'view', '2021-07-29 09:36:21', '2021-07-29 09:36:21'),
(9, 'add', 'add', '2021-07-29 09:36:22', '2021-07-29 09:36:22'),
(10, 'edit', 'edit', '2021-07-29 09:36:22', '2021-07-29 09:36:22');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2021-06-18 12:59:23', '2021-06-18 12:59:23'),
(2, 'Apprenant', 'apprenant', '2021-06-18 12:59:34', '2021-06-18 12:59:34'),
(3, 'Enseignant', 'enseignant', '2021-06-18 12:59:51', '2021-06-18 12:59:51'),
(4, 'Tuteur', 'tuteur', '2021-06-18 13:00:06', '2021-06-18 13:00:06'),
(5, 'Surveillant', 'surveillant', '2021-07-29 09:36:21', '2021-07-29 09:36:21');

-- --------------------------------------------------------

--
-- Structure de la table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(3, 4, NULL, NULL),
(3, 5, NULL, NULL),
(3, 6, NULL, NULL),
(4, 7, NULL, NULL),
(5, 8, NULL, NULL),
(5, 9, NULL, NULL),
(5, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schools`
--

INSERT INTO `schools` (`id`, `name`, `adresse`, `tel`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Sunu Ecole', 'Unité 19', '777777700', 'sunuecole@gmail.com', '2021-07-02 15:58:22', '2021-07-08 12:54:09');

-- --------------------------------------------------------

--
-- Structure de la table `school_years`
--

CREATE TABLE `school_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_years`
--

INSERT INTO `school_years` (`id`, `debut`, `fin`, `created_at`, `updated_at`, `status`) VALUES
(1, '2020-07-09', '2021-06-16', NULL, '2021-07-15 10:33:49', 1),
(2, '2021-10-07', '2022-07-08', '2021-08-02 11:24:15', '2021-08-02 11:24:15', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_matieres`
--

CREATE TABLE `type_matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_matieres`
--

INSERT INTO `type_matieres` (`id`, `name`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Littéraire', 'LT', '2021-06-25 11:23:42', '2021-06-25 11:23:42'),
(2, 'Scientifique', 'SE', '2021-06-25 12:20:35', '2021-06-25 12:20:35'),
(3, 'Sportif', 'Sportif', '2021-06-25 12:20:50', '2021-06-25 12:20:50'),
(4, 'Complément', 'Complément', '2021-06-25 12:29:06', '2021-06-25 12:54:43');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieunais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `username`, `nationalite`, `sexe`, `adresse`, `datenais`, `lieunais`, `tel`, `parent_id`, `photo`, `email`, `email_verified_at`, `password`, `father_name`, `mother_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niang', 'Bassirou', 'admin', 'Sénégalaise', 'Masculin', 'Cambérène 2', '1995-03-19', 'Guédiawaye', '777208716', NULL, 'user-male.png', 'admin@admin.com', NULL, '$2y$10$v14xcSZZHcIAiGHLTJw0IOqqfetz/5YfXBGpbmrpJpwejANSTTcXO', NULL, NULL, NULL, '2021-05-31 16:35:32', '2021-05-31 16:35:32'),
(2, 'Diaw', 'Bara', 'bd778542523', 'Sénégalaise', 'Masculin', 'PAU19', '2021-06-19', 'Mbacké', '778542523', NULL, 'user-male.png', 'bara@gmail.com', NULL, '$2y$10$qT9KsL4/MWQuGvjFeX2htOBa/Ql3AzBRpwqvsKrIi5xolt4ehss0m', NULL, NULL, NULL, '2021-06-18 13:10:59', '2021-06-18 13:10:59'),
(4, 'Ngom', 'Fatou Daouda', 'fn00003', 'Sénégalaise', 'Feminin', 'yoff', '1998-02-14', 'Saint Louis', '785203060', 11, 'user-female.png', '', NULL, '$2y$10$if0PdxQv3g.1eo.X9cz1P.IKY2S5uEHRYDZmBFv2D.8LEzLi2ffZa', 'Daouda Ngom', 'Adja Diouf', NULL, '2021-06-18 13:23:34', '2021-06-23 13:05:34'),
(10, 'Diouf', 'Maman', 'md00005', 'sénégalaise', 'Feminin', 'fadia', '1997-11-06', 'guinée', '', 2, 'user-female.png', '', NULL, '$2y$10$czwd8iLBGPohuIIUIrrThO6jBAuTzQlp284NYn6z0uPyMz3FHgPn2', 'Toumany Diouf', 'Fatou Cissé', NULL, '2021-06-21 09:48:11', '2021-06-21 09:48:12'),
(11, 'Diallo', 'Woury', 'wd785421523', 'sénégalaise', 'Masculin', 'mariste', '1972-03-10', 'guinée', '785421523', NULL, 'user-male.png', '', NULL, '$2y$10$QiRO9eUhywzU4F8VVEcBLOkR6o9IXvN9dGTeG57SpZEEZEo2OVFJm', NULL, NULL, NULL, '2021-06-21 09:50:47', '2021-06-21 09:50:47'),
(12, 'Diallo', 'Lamine', 'ld000012', 'Sénégalaise', 'Masculin', 'mariste', '1996-03-07', 'guinée', '', 2, 'user-male.png', '', NULL, '$2y$10$sQVW7cL9RHKED6z2MwtwwO4ORpkAF3jQlWtwTBp.8BA.1/w3mISOy', 'Woury Diallo', 'Néné Gallé Diallo', NULL, '2021-06-21 09:50:48', '2021-06-23 10:57:28'),
(13, 'Niang', 'Bassirou', 'bn777208716', 'Sénégalaise', 'Masculin', 'Usine beeneu Tally', '1995-03-19', 'Guédiawaye', '777208716', NULL, 'user-male.png', 'niangprogrammeur@gmail.com', NULL, '$2y$10$Zp.y4EB6.Fhpq0Ahihr52.xBizvh0VGqh9FzPZOB3HKRpDoib7J2K', NULL, NULL, NULL, '2021-06-23 13:11:16', '2021-06-23 13:11:16'),
(14, 'Diouf', 'Diary', 'diary', 'Sénégalaise', 'Feminin', 'unité 25', '1993-07-08', 'Saint Louis', '702142532', NULL, 'user-female.png', 'diary@gmail.com', NULL, '$2y$10$L/YPQSm5rCVsWqvRSGuc9OhL.92lt2HEU22sSxfvyRdmThKARVD/i', NULL, NULL, NULL, '2021-06-28 15:01:15', '2021-07-30 13:21:03'),
(15, 'Mbaye', 'Ibrahima', 'im000015', 'Sénégalaise', 'Masculin', 'Yoff', '1994-03-02', 'Ngor', '', 2, 'user-male.png', '', NULL, '$2y$10$L/YPQSm5rCVsWqvRSGuc9OhL.92lt2HEU22sSxfvyRdmThKARVD/i', 'Père', 'Mère Mbaye', NULL, '2021-07-16 09:23:12', '2021-07-16 09:23:13'),
(16, 'Ndiaye', 'Léna', 'Léna', 'Sénégalaise', 'Feminin', 'yoff', '1999-03-02', 'casamance', '772584535', NULL, 'user-female.png', '', NULL, '$2y$10$jjsoqnxv/eLHh4j4Zpvm9es/MPRrKCoLJITb0k3kxxyZjrgzt6HeC', NULL, NULL, NULL, '2021-07-29 09:38:25', '2021-07-29 09:38:25');

-- --------------------------------------------------------

--
-- Structure de la table `users_classes`
--

CREATE TABLE `users_classes` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `school_year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_classes`
--

INSERT INTO `users_classes` (`user_id`, `classe_id`, `school_year_id`, `created_at`, `updated_at`) VALUES
(4, 4, 1, NULL, NULL),
(10, 6, 1, NULL, NULL),
(12, 1, 1, NULL, NULL),
(15, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2, 7, NULL, NULL),
(13, 3, NULL, NULL),
(13, 4, NULL, NULL),
(13, 5, NULL, NULL),
(13, 6, NULL, NULL),
(14, 3, NULL, NULL),
(14, 4, NULL, NULL),
(14, 5, NULL, NULL),
(14, 6, NULL, NULL),
(16, 8, NULL, NULL),
(16, 9, NULL, NULL),
(16, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 4, NULL, NULL),
(4, 2, NULL, NULL),
(10, 2, NULL, NULL),
(11, 4, NULL, NULL),
(12, 2, NULL, NULL),
(13, 3, NULL, NULL),
(14, 3, NULL, NULL),
(15, 2, NULL, NULL),
(16, 5, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appreciations`
--
ALTER TABLE `appreciations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coefficients`
--
ALTER TABLE `coefficients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_matiere_id_foreign` (`matiere_id`),
  ADD KEY `cours_user_id_foreign` (`user_id`),
  ADD KEY `cours_classroom_id_foreign` (`classroom_id`),
  ADD KEY `cours_classe_id_foreign` (`classe_id`),
  ADD KEY `cours_school_year_id_foreign` (`school_year_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matieres_type_matiere_id_foreign` (`type_matiere_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_matiere_id_foreign` (`matiere_id`),
  ADD KEY `notes_apprenant_id_foreign` (`apprenant_id`),
  ADD KEY `notes_period_id_foreign` (`period_id`),
  ADD KEY `notes_enseignant_id_foreign` (`enseignant_id`),
  ADD KEY `notes_school_year_id_foreign` (`school_year_id`),
  ADD KEY `notes_classe_id_foreign` (`classe_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_matieres`
--
ALTER TABLE `type_matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_parent_id_foreign` (`parent_id`);

--
-- Index pour la table `users_classes`
--
ALTER TABLE `users_classes`
  ADD PRIMARY KEY (`user_id`,`classe_id`,`school_year_id`),
  ADD KEY `users_classes_classe_id_foreign` (`classe_id`),
  ADD KEY `users_classes_school_year_id_foreign` (`school_year_id`);

--
-- Index pour la table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appreciations`
--
ALTER TABLE `appreciations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `coefficients`
--
ALTER TABLE `coefficients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_matieres`
--
ALTER TABLE `type_matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_school_year_id_foreign` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_type_matiere_id_foreign` FOREIGN KEY (`type_matiere_id`) REFERENCES `type_matieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_apprenant_id_foreign` FOREIGN KEY (`apprenant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_enseignant_id_foreign` FOREIGN KEY (`enseignant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_school_year_id_foreign` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_classes`
--
ALTER TABLE `users_classes`
  ADD CONSTRAINT `users_classes_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_classes_school_year_id_foreign` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_classes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
