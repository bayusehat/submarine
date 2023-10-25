-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2023 pada 11.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `submarine`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id_banner` bigint(255) UNSIGNED NOT NULL,
  `img_banner` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `sub_tagline` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status_banner` int(255) DEFAULT NULL,
  `position` bigint(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `deleted_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id_banner`, `img_banner`, `tagline`, `sub_tagline`, `link`, `status_banner`, `position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'banner1.png', 'Demo 2023 Release by OVER21', 'You can buy via our website or bandcamp click link below', 'https://submarine-records.bandcamp.com/track/im-still-not-dead-intro', 0, 0, '2023-07-30 20:34:05.000000', '2023-07-30 20:49:27.000000', NULL),
(2, NULL, 'DEMO 2023 Release by OVER21', 'You can buy via our website or bandcamp', 'https://submarine-records.bandcamp.com/track/im-still-not-dead-intro', 0, 0, '2023-07-30 20:41:19.000000', '2023-07-30 20:45:29.000000', '2023-07-30 20:45:29.000000'),
(3, NULL, 'DEMO 2023 Release by OVER21', 'You can buy via our website or bandcamp', 'https://submarine-records.bandcamp.com/track/im-still-not-dead-intro', 0, 0, '2023-07-30 20:42:19.000000', '2023-07-30 20:44:59.000000', '2023-07-30 20:44:59.000000'),
(4, '346671957_780960893702802_2629099514950660622_n.jpg', 'GRUFF Release Debut Single', 'Available on out bandcamp click link below', 'https://submarine-records.bandcamp.com/track/fault', 0, 0, '2023-07-30 20:51:01.000000', '2023-07-30 21:07:40.000000', NULL),
(5, 'IMG_3677.jpg', 'LILAC EP, RELEASE SOON!', 'Any question and information contact official Whatsapp Submarine Records', 'wa.me/62895364791632', 0, 0, '2023-07-30 20:55:26.000000', '2023-07-30 20:55:26.000000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `genres`
--

CREATE TABLE `genres` (
  `id_genre` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `genres`
--

INSERT INTO `genres` (`id_genre`, `genre`, `alias`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Punk Rock', 'punk-rock', '2023-07-25 21:13:45', '2023-07-25 21:15:15', '2023-07-25 21:15:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `invoice_to` varchar(255) NOT NULL,
  `invoice_cp` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_description` text NOT NULL,
  `invoice_address` text NOT NULL,
  `invoice_email` text NOT NULL,
  `invoice_amount` text NOT NULL,
  `invoice_total` text NOT NULL,
  `invoice_status` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id_invoice_detail` bigint(20) UNSIGNED NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(124, '2014_10_12_000000_create_users_table', 1),
(125, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(126, '2019_08_19_000000_create_failed_jobs_table', 1),
(127, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(128, '2023_06_15_062846_create_rosters_table', 1),
(129, '2023_06_15_063246_create_releases_table', 1),
(130, '2023_06_15_063519_create_tracks_table', 1),
(131, '2023_06_15_063729_create_genres_table', 1),
(132, '2023_06_21_062652_create_roles_table', 1),
(133, '2023_07_04_065519_create_release_types_table', 1),
(134, '2023_07_04_071433_create_release_images_table', 1),
(135, '2023_07_10_011203_create_ticket_orders_table', 1),
(136, '2014_10_12_100000_create_password_resets_table', 2),
(137, '2023_09_20_053552_create_invoices_table', 2),
(138, '2023_09_20_053705_create_invoice_details_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `releases`
--

CREATE TABLE `releases` (
  `id_release` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_roster` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `release_date` date NOT NULL,
  `id_release_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `releases`
--

INSERT INTO `releases` (`id_release`, `title`, `id_roster`, `description`, `price`, `release_date`, `id_release_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Self Titled', 6, 'Gruff first EP album', 40000.00, '2023-09-07', 2, '2023-09-07 01:32:12', '2023-09-07 01:32:12', NULL),
(6, 'Home', 4, 'First EP Album from Lilac', 40000.00, '2023-08-26', 2, '2023-09-10 23:33:58', '2023-09-10 23:33:58', NULL),
(7, 'REALLYSSSTTT!!!', 3, 'First EP Album from OVER21', 40000.00, '2022-03-23', 2, '2023-09-10 23:35:00', '2023-09-10 23:35:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `release_images`
--

CREATE TABLE `release_images` (
  `id_release_image` bigint(20) UNSIGNED NOT NULL,
  `id_release` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `release_images`
--

INSERT INTO `release_images` (`id_release_image`, `id_release`, `file_name`, `upload_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'COVERAsset 3 (2) (1).jpg', '2023-09-07 01:32:12', '2023-09-07 01:32:12', '2023-09-07 01:32:12', NULL),
(2, 6, 'COVERAsset 3 (1) (1) (1).jpg', '2023-09-10 23:33:58', '2023-09-10 23:33:58', '2023-09-10 23:33:58', NULL),
(3, 7, 'Cover EP REALLYSSSTTT!!!.png', '2023-09-10 23:35:00', '2023-09-10 23:35:00', '2023-09-10 23:35:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `release_types`
--

CREATE TABLE `release_types` (
  `id_release_type` bigint(20) UNSIGNED NOT NULL,
  `release_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `release_types`
--

INSERT INTO `release_types` (`id_release_type`, `release_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Single', NULL, NULL, NULL),
(2, 'EP', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rosters`
--

CREATE TABLE `rosters` (
  `id_roster` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `roster_photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rosters`
--

INSERT INTO `rosters` (`id_roster`, `name`, `roster_photo`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OVER21', 'NEO_8894.jpg', 'Sometimes, i just want to be alone and listen to punk rock', '2023-07-26 19:23:04', '2023-07-26 19:25:43', '2023-07-26 19:25:43'),
(2, 'OVER21', 'NEO_8894.jpg', 'Sometimes, i just want to be alone and listen to punk rock', '2023-07-26 19:26:10', '2023-07-26 19:27:10', '2023-07-26 19:27:10'),
(3, 'OVER21', 'Snapinsta.app_312219050_171257095578288_1671800664972809128_n_1080.jpg', 'Sometimes, i just want to be alone and listen to punk rock', '2023-07-26 19:27:32', '2023-07-26 20:31:42', NULL),
(4, 'LILAC', 'IMG_3677.jpg', 'Emotional / Alternative from Blitar', '2023-07-26 21:25:25', '2023-07-26 21:25:25', NULL),
(5, 'SHOUT OUT 631', 'WhatsApp Image 2023-04-13 at 14.43.42 (1).jpeg', 'Hardcore Beatdown from Surabaya', '2023-07-26 22:42:35', '2023-07-26 22:46:35', NULL),
(6, 'GRUFF', '346671957_780960893702802_2629099514950660622_n.jpg', 'Hardcore band from Sidoarjo', '2023-07-26 22:50:32', '2023-07-26 22:50:32', NULL),
(7, 'THREE DESTROYERS', 'DSC_0201 (1).jpg', 'Punk Rock band from Kediri', '2023-07-26 22:55:11', '2023-07-26 22:55:11', NULL),
(8, 'ENERGI ESOK HARI', '342243895_981202859894967_5262558138941639569_n.jpg', 'Garage Rock band from Surabaya', '2023-07-30 19:09:00', '2023-07-30 19:09:00', NULL),
(9, 'ALONG', 'RULESAsset 1.jpg', 'Rock band from Sidoarjo', '2023-08-01 00:36:25', '2023-08-01 00:36:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_orders`
--

CREATE TABLE `ticket_orders` (
  `id_ticket` bigint(20) UNSIGNED NOT NULL,
  `no_ticket` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ticket_status` varchar(255) NOT NULL DEFAULT 'NOT CHECKED',
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ticket_orders`
--

INSERT INTO `ticket_orders` (`id_ticket`, `no_ticket`, `id_user`, `customer_name`, `no_hp`, `ticket_type`, `quantity`, `ticket_status`, `order_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2307110245-48/4', 1, 'Eka Fikri', '0892833788886', 'PRESALE', 1, 'CHECKED', '0000-00-00', '2023-07-10 19:45:48', '2023-07-10 21:04:49', '2023-07-10 21:04:49'),
(2, '2307110403-09/2', 1, 'Aditya Firman', '081235330481', 'PRESALE', 1, 'CHECKED', '2023-07-11', '2023-07-10 21:03:09', '2023-10-24 22:59:27', '2023-10-24 22:59:27'),
(3, '2307110614-35/4', 1, 'Iceeks', '0881026634479', 'PRESALE', 1, 'CHECKED', '2023-07-02', '2023-07-10 23:14:35', '2023-10-24 22:59:28', '2023-10-24 22:59:28'),
(4, '2307110615-36/1', 1, 'Eka Fikri', '085336947014', 'PRESALE', 1, 'CHECKED', '2023-07-08', '2023-07-10 23:15:36', '2023-10-24 22:59:30', '2023-10-24 22:59:30'),
(5, '2307110616-40/4', 1, 'Aji Cakrawangsa', '0895631285383', 'PRESALE', 1, 'CHECKED', '2023-07-09', '2023-07-10 23:16:40', '2023-10-24 22:59:31', '2023-10-24 22:59:31'),
(6, '2307110617-20/3', 1, 'Nizar', '08000000000', 'PRESALE', 1, 'CHECKED', '2023-07-05', '2023-07-10 23:17:20', '2023-10-24 22:59:32', '2023-10-24 22:59:32'),
(7, '2307110635-12/2', 1, 'DUMMY', '09809201212', 'PRESALE', 1, 'CHECKED', '2023-07-11', '2023-07-10 23:35:12', '2023-07-10 23:35:52', '2023-07-10 23:35:52'),
(8, '2307110641-46/4', 1, 'testing 2', '0928309283094', 'PRESALE', 1, 'CHECKED', '2023-02-22', '2023-07-10 23:41:46', '2023-07-10 23:43:44', '2023-07-10 23:43:44'),
(9, '2307110703-29/2', 1, 'Testing', '02939820983', 'PRESALE', 1, 'CHECKED', '2023-07-11', '2023-07-11 00:03:29', '2023-07-11 00:04:27', '2023-07-11 00:04:27'),
(10, '2307110745-00/0', 1, 'Testing 909', '0891288989', 'PRESALE', 1, 'CHECKED', '2023-07-12', '2023-07-11 00:45:00', '2023-07-11 00:45:37', '2023-07-11 00:45:37'),
(11, '2307110333-37/2', 1, 'Moch. Saiful Bakhri', '089668959370', 'PRESALE', 1, 'CHECKED', '2023-07-11', '2023-07-11 08:33:37', '2023-10-24 22:59:33', '2023-10-24 22:59:33'),
(12, '2307120437-25/2', 1, 'Sakti Oky', '081236677620', 'PRESALE', 1, 'NOT CHECKED', '2023-07-12', '2023-07-12 09:37:25', '2023-08-23 19:18:14', '2023-08-23 19:18:14'),
(13, '2307180358-51/2', 1, 'Prada Rihal', '089602166192', 'BUNDLING', 1, 'CHECKED', '2023-07-18', '2023-07-18 08:58:51', '2023-10-24 22:59:34', '2023-10-24 22:59:34'),
(14, '2307180359-11/0', 1, 'Prada Rihal', '089602166192', 'BUNDLING', 1, 'CHECKED', '2023-07-18', '2023-07-18 08:59:11', '2023-10-24 22:59:35', '2023-10-24 22:59:35'),
(15, '2307180359-26/2', 1, 'Prada Rihal', '089602166192', 'BUNDLING', 1, 'CHECKED', '2023-07-18', '2023-07-18 08:59:26', '2023-10-24 22:59:36', '2023-10-24 22:59:36'),
(16, '2307190315-45/0', 1, 'Andhika', '081556705516', 'PRESALE', 1, 'CHECKED', '2023-07-19', '2023-07-18 20:15:45', '2023-10-24 22:59:37', '2023-10-24 22:59:37'),
(17, '2307190607-53/0', 1, 'Fahrizal Syahrul Huda Bahtiar', '085655844057', 'BUNDLING', 1, 'CHECKED', '2023-07-19', '2023-07-18 23:07:54', '2023-10-24 22:59:38', '2023-10-24 22:59:38'),
(18, '2307190608-12/0', 1, 'Fahrizal Syahrul Huda Bahtiar', '085655844057', 'BUNDLING', 1, 'CHECKED', '2023-07-19', '2023-07-18 23:08:12', '2023-10-24 22:59:39', '2023-10-24 22:59:39'),
(19, '2307200926-21/0', 1, 'Angga Aditiya', '0895367334765', 'BUNDLING', 1, 'CHECKED', '2023-07-20', '2023-07-20 02:26:21', '2023-10-24 22:59:40', '2023-10-24 22:59:40'),
(20, '2307200926-34/2', 1, 'Angga Aditiya', '0895367334765', 'BUNDLING', 1, 'CHECKED', '2023-07-20', '2023-07-20 02:26:34', '2023-10-24 22:59:42', '2023-10-24 22:59:42'),
(21, '2307200927-21/0', 1, 'Rofi', '083122098536', 'PRESALE', 1, 'CHECKED', '2023-07-20', '2023-07-20 02:27:21', '2023-10-24 22:59:43', '2023-10-24 22:59:43'),
(22, '2307200929-54/3', 1, 'Edo vp', '08000000000', 'BUNDLING', 1, 'CHECKED', '2023-07-19', '2023-07-20 02:29:54', '2023-10-24 22:59:44', '2023-10-24 22:59:44'),
(23, '2307200930-23/2', 1, 'Edo vp', '08000000000', 'PRESALE', 1, 'NOT CHECKED', '2023-07-19', '2023-07-20 02:30:23', '2023-07-20 02:30:27', '2023-07-20 02:30:27'),
(24, '2307200930-44/1', 1, 'Edo vp', '08000000000', 'BUNDLING', 1, 'CHECKED', '2023-07-19', '2023-07-20 02:30:44', '2023-10-24 22:59:45', '2023-10-24 22:59:45'),
(25, '2307200931-05/0', 1, 'Edo vp', '08000000000', 'BUNDLING', 1, 'CHECKED', '2023-07-19', '2023-07-20 02:31:05', '2023-10-24 22:59:46', '2023-10-24 22:59:46'),
(26, '2307200931-20/1', 1, 'Edo vp', '08000000000', 'BUNDLING', 1, 'CHECKED', '2023-07-19', '2023-07-20 02:31:20', '2023-10-24 22:59:47', '2023-10-24 22:59:47'),
(27, '2307201151-45/0', 1, 'Anta', '089664364718', 'BUNDLING', 1, 'CHECKED', '2023-07-20', '2023-07-20 04:51:45', '2023-10-24 22:59:48', '2023-10-24 22:59:48'),
(28, '2307201151-59/1', 1, 'Anta', '089664364718', 'BUNDLING', 1, 'CHECKED', '2023-07-20', '2023-07-20 04:51:59', '2023-10-24 22:59:49', '2023-10-24 22:59:49'),
(29, '2307201152-24/4', 1, 'Chimpung', '082147880008', 'PRESALE', 1, 'CHECKED', '2023-07-20', '2023-07-20 04:52:24', '2023-10-24 22:59:50', '2023-10-24 22:59:50'),
(30, '2307201153-16/0', 1, 'Rama', '08000000000', 'BUNDLING', 1, 'CHECKED', '2023-07-20', '2023-07-20 04:53:16', '2023-10-24 22:59:51', '2023-10-24 22:59:51'),
(31, '2307201153-29/4', 1, 'Rama', '08000000000', 'BUNDLING', 1, 'CHECKED', '2023-07-20', '2023-07-20 04:53:29', '2023-10-24 22:59:52', '2023-10-24 22:59:52'),
(32, '2307210553-07/1', 1, 'dery', '081803031675', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-20 22:53:07', '2023-10-24 22:59:53', '2023-10-24 22:59:53'),
(33, '2307210553-27/3', 1, 'Dwiky', '0800000000', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-20 22:53:27', '2023-10-24 22:59:54', '2023-10-24 22:59:54'),
(34, '2307210606-42/3', 1, 'Test Scan', '0895364791632', 'PRESALE', 1, 'CHECKED', '2023-07-21', '2023-07-20 23:06:42', '2023-07-20 23:08:37', '2023-07-20 23:08:37'),
(35, '2307211257-21/0', 1, 'Singgih Ari Wibowo', '082233046730', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 05:57:21', '2023-10-24 22:59:55', '2023-10-24 22:59:55'),
(36, '2307210100-34/1', 1, 'Alif', '085876157918', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 06:00:34', '2023-10-24 22:59:56', '2023-10-24 22:59:56'),
(37, '2307210129-45/0', 1, 'Dimas Gutama', '085606450911', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 06:29:45', '2023-10-24 22:59:57', '2023-10-24 22:59:57'),
(38, '2307210129-58/4', 1, 'Dimas Gutama', '085606450911', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 06:29:58', '2023-10-24 22:59:59', '2023-10-24 22:59:59'),
(39, '2307210142-04/1', 1, 'Indra vp', '08000000000', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 06:42:04', '2023-10-24 23:00:00', '2023-10-24 23:00:00'),
(40, '2307210142-45/2', 1, 'Ferdy Subandri', '082140019474', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 06:42:45', '2023-10-24 23:00:01', '2023-10-24 23:00:01'),
(41, '2307210439-18/4', 1, 'Rendra', '080000000000', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 09:39:18', '2023-10-24 23:00:02', '2023-10-24 23:00:02'),
(42, '2307210439-45/2', 1, 'Mario', '080000000000', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 09:39:45', '2023-10-24 23:00:03', '2023-10-24 23:00:03'),
(43, '2307210439-59/0', 1, 'Mario', '08000000000', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 09:39:59', '2023-10-24 23:00:04', '2023-10-24 23:00:04'),
(44, '2307210440-37/2', 1, 'Irfan', '085732014639', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 09:40:37', '2023-10-24 23:00:05', '2023-10-24 23:00:05'),
(45, '2307210440-50/2', 1, 'Irfan', '085732014639', 'FLASHSALE', 1, 'CHECKED', '2023-07-21', '2023-07-21 09:40:50', '2023-10-24 23:00:06', '2023-10-24 23:00:06'),
(46, '2307220645-56/3', 1, 'Geo', '081252799931', 'FLASHSALE', 1, 'CHECKED', '2023-07-22', '2023-07-21 23:45:56', '2023-10-24 23:00:07', '2023-10-24 23:00:07'),
(47, '2307220646-08/3', 1, 'Geo', '081252799931', 'FLASHSALE', 1, 'CHECKED', '2023-07-22', '2023-07-21 23:46:08', '2023-10-24 23:00:08', '2023-10-24 23:00:08'),
(48, '2307220720-09/1', 1, 'Aldi Taher', '081249176420', 'FLASHSALE', 1, 'CHECKED', '2023-07-22', '2023-07-22 00:20:09', '2023-07-22 02:30:28', '2023-07-22 02:30:28'),
(49, '2307220915-07/4', 1, 'Test', '9799900', 'FLASHSALE', 1, 'CHECKED', '2023-07-22', '2023-07-22 02:15:07', '2023-07-25 21:15:35', '2023-07-25 21:15:35'),
(50, '2308240212-59/4', 2, 'Agus Irawan', '085755836938', 'PRESALE', 1, 'NOT CHECKED', '2023-08-18', '2023-08-23 19:12:59', '2023-10-24 23:00:09', '2023-10-24 23:00:09'),
(51, '2308240213-32/2', 2, 'Saifulloh Anam', '085853926690', 'PRESALE', 1, 'NOT CHECKED', '2023-08-18', '2023-08-23 19:13:32', '2023-10-24 23:00:10', '2023-10-24 23:00:10'),
(52, '2308240214-07/3', 2, 'Setyawan', '085895079643', 'PRESALE', 1, 'NOT CHECKED', '2023-08-19', '2023-08-23 19:14:07', '2023-10-24 23:00:11', '2023-10-24 23:00:11'),
(53, '2308240214-25/4', 2, 'Setyawan', '085895079643', 'PRESALE', 1, 'NOT CHECKED', '2023-08-19', '2023-08-23 19:14:25', '2023-10-24 23:00:12', '2023-10-24 23:00:12'),
(54, '2308240214-59/1', 2, 'bachrul IBAD', '089612400649', 'PRESALE', 1, 'NOT CHECKED', '2023-08-20', '2023-08-23 19:14:59', '2023-10-24 23:00:13', '2023-10-24 23:00:13'),
(55, '2308240215-13/1', 2, 'bachrul IBAD', '089612400649', 'PRESALE', 1, 'NOT CHECKED', '2023-08-20', '2023-08-23 19:15:13', '2023-10-24 23:00:14', '2023-10-24 23:00:14'),
(56, '2308240215-42/2', 2, 'Hamid Jainudin', '083856845395', 'PRESALE', 1, 'NOT CHECKED', '2023-08-20', '2023-08-23 19:15:42', '2023-10-24 23:00:15', '2023-10-24 23:00:15'),
(57, '2308240216-30/3', 2, 'Stefanus Dimas', '081703555384', 'PRESALE', 1, 'NOT CHECKED', '2023-08-22', '2023-08-23 19:16:30', '2023-10-24 23:00:17', '2023-10-24 23:00:17'),
(58, '2308240216-45/0', 2, 'Stefanus Dimas', '081703555384', 'PRESALE', 1, 'NOT CHECKED', '2023-08-22', '2023-08-23 19:16:45', '2023-10-24 23:00:18', '2023-10-24 23:00:18'),
(59, '2308240217-01/0', 2, 'Stefanus Dimas', '081703555384', 'PRESALE', 1, 'NOT CHECKED', '2023-08-22', '2023-08-23 19:17:01', '2023-10-24 23:00:19', '2023-10-24 23:00:19'),
(60, '2308240218-00/4', 2, 'Dandy', '081252877871', 'PRESALE', 1, 'NOT CHECKED', '2023-08-23', '2023-08-23 19:18:00', '2023-10-24 23:00:20', '2023-10-24 23:00:20'),
(61, '2308240633-08/2', 2, 'Dandy', '081252877871', 'PRESALE', 1, 'NOT CHECKED', '2023-08-23', '2023-08-23 23:33:08', '2023-10-24 23:00:21', '2023-10-24 23:00:21'),
(62, '2308240633-53/4', 2, 'Hamid Jainudin', '083856845395', 'PRESALE', 1, 'NOT CHECKED', '2023-08-19', '2023-08-23 23:33:53', '2023-10-24 23:00:22', '2023-10-24 23:00:22'),
(63, '2308240636-07/2', 2, 'ADY EKO PRAYITNO', '082139180851', 'PRESALE', 1, 'NOT CHECKED', '2023-08-23', '2023-08-23 23:36:07', '2023-10-24 23:00:23', '2023-10-24 23:00:23'),
(64, '2308240636-21/0', 2, 'ADY EKO PRAYITNO', '082139180851', 'PRESALE', 1, 'NOT CHECKED', '2023-08-23', '2023-08-23 23:36:21', '2023-10-24 23:00:24', '2023-10-24 23:00:24'),
(65, '2308260632-13/1', 2, 'ryan', '089678143625', 'PRESALE', 1, 'NOT CHECKED', '2023-08-26', '2023-08-25 23:32:13', '2023-10-24 23:00:25', '2023-10-24 23:00:25'),
(66, '2308260632-27/2', 2, 'ryan', '089678143625', 'PRESALE', 1, 'NOT CHECKED', '2023-08-26', '2023-08-25 23:32:27', '2023-10-24 23:00:26', '2023-10-24 23:00:26'),
(67, '2308260633-54/2', 2, 'Ali Akbar', '085748585336', 'PRESALE', 1, 'NOT CHECKED', '2023-08-26', '2023-08-25 23:33:54', '2023-10-24 23:00:27', '2023-10-24 23:00:27'),
(68, '2308260634-05/3', 2, 'Ali Akbar', '085748585336', 'PRESALE', 1, 'NOT CHECKED', '2023-08-26', '2023-08-25 23:34:05', '2023-10-24 23:00:32', '2023-10-24 23:00:32'),
(69, '2308260634-16/1', 2, 'Ali Akbar', '085748585336', 'PRESALE', 1, 'NOT CHECKED', '2023-08-26', '2023-08-25 23:34:16', '2023-10-24 23:00:33', '2023-10-24 23:00:33'),
(70, '2308260636-12/4', 2, 'Eval', '081259525769', 'PRESALE', 1, 'NOT CHECKED', '2023-08-26', '2023-08-25 23:36:12', '2023-10-24 23:00:30', '2023-10-24 23:00:30'),
(71, '2310250601-20/3', 2, 'Ferly Amlizyan', '081654961561', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:01:20', '2023-10-24 23:01:20', NULL),
(72, '2310250601-36/4', 2, 'Ferly Amlizyan', '081654961561', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:01:36', '2023-10-24 23:01:36', NULL),
(73, '2310250601-57/2', 2, 'farid saputra', '085157334051', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:01:57', '2023-10-24 23:01:57', NULL),
(74, '2310250602-21/0', 2, 'Angga Aditiya', '0895367334765', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:02:21', '2023-10-24 23:02:21', NULL),
(75, '2310250603-21/0', 2, 'Oscar', '082229966354', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:03:21', '2023-10-24 23:03:21', NULL),
(76, '2310250603-59/4', 2, 'bj', '088989595689', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:03:59', '2023-10-24 23:03:59', NULL),
(77, '2310250609-24/1', 2, 'Silvia', '085236118086', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:09:24', '2023-10-24 23:09:24', NULL),
(78, '2310250610-33/2', 2, 'ianjembret', '087821135052', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:10:33', '2023-10-24 23:10:33', NULL),
(79, '2310250610-45/3', 2, 'ianjembret', '087821135052', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-24 23:10:45', '2023-10-24 23:10:45', NULL),
(80, '2310250744-21/0', 2, 'M. Rizqy Ifaldhi Putra', '082301573954', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 00:44:21', '2023-10-25 00:44:21', NULL),
(81, '2310250848-21/1', 2, 'Aditya Firdaus', '085236688525', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 01:48:21', '2023-10-25 01:48:21', NULL),
(82, '2310250848-37/3', 2, 'Aditya Firdaus', '085236688525', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 01:48:37', '2023-10-25 01:48:37', NULL),
(83, '2310250848-46/3', 2, 'Aditya Firdaus', '085236688525', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 01:48:46', '2023-10-25 01:48:46', NULL),
(84, '2310250909-15/1', 2, 'Adeliya', '089621454832', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 02:09:15', '2023-10-25 02:09:15', NULL),
(85, '2310250913-37/2', 2, 'Muhammad Afif', '085780348097', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 02:13:37', '2023-10-25 02:13:37', NULL),
(86, '2310250913-51/0', 2, 'Muhammad Afif', '085780348097', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 02:13:51', '2023-10-25 02:13:51', NULL),
(87, '2310250914-00/2', 2, 'Muhammad Afif', '085780348097', 'EARLY BIRD', 1, 'NOT CHECKED', '2023-10-25', '2023-10-25 02:14:00', '2023-10-25 02:14:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracks`
--

CREATE TABLE `tracks` (
  `id_track` bigint(20) UNSIGNED NOT NULL,
  `track_title` varchar(255) NOT NULL,
  `id_release` int(11) NOT NULL,
  `track_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `phone`, `email`, `email_verified_at`, `password`, `address`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Timur Embara', '0895364791632', 'timurembara@gmail.com', NULL, '$2y$10$CLCKV/C4c2qcPc2XAA7PSOT5R9M0sRKZiImljnW7MqTRb86.bW1bS', NULL, 1, NULL, '2023-07-11 00:05:03', '2023-07-11 00:05:03', NULL),
(2, 'Submarine Records', '0895364791632', 'submarine.recs@gmail.com', NULL, '$2y$10$u94jYq8.7ymnD08/lCPa6ebbtZyxTxJprzuYJRfzO3IHtvKlrho6q', NULL, 1, NULL, '2023-07-26 21:18:29', '2023-07-26 21:18:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id_invoice_detail`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `releases`
--
ALTER TABLE `releases`
  ADD PRIMARY KEY (`id_release`);

--
-- Indeks untuk tabel `release_images`
--
ALTER TABLE `release_images`
  ADD PRIMARY KEY (`id_release_image`);

--
-- Indeks untuk tabel `release_types`
--
ALTER TABLE `release_types`
  ADD PRIMARY KEY (`id_release_type`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `rosters`
--
ALTER TABLE `rosters`
  ADD PRIMARY KEY (`id_roster`);

--
-- Indeks untuk tabel `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indeks untuk tabel `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id_track`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id_invoice_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `releases`
--
ALTER TABLE `releases`
  MODIFY `id_release` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `release_images`
--
ALTER TABLE `release_images`
  MODIFY `id_release_image` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `release_types`
--
ALTER TABLE `release_types`
  MODIFY `id_release_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rosters`
--
ALTER TABLE `rosters`
  MODIFY `id_roster` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ticket_orders`
--
ALTER TABLE `ticket_orders`
  MODIFY `id_ticket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id_track` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
