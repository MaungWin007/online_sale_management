-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 02:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_sale_management`
--
CREATE DATABASE IF NOT EXISTS `online_sale_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `online_sale_management`;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storemap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `contact`, `email`, `storemap`, `uuid`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Traffico', 'yangon', '09123456789', 'traffico@gmail.com', 'abcdef', '', '-', 'Active', NULL, NULL),
(2, 'Blenco', 'YGN', '0912345678', 'blanco@gmail.com', 'cdwsd', '8ef54d99-6a54-49a4-81d8-e2c4fab5a150', '-', 'Active', '2022-05-31 00:02:26', '2022-05-31 00:02:26'),
(3, 'Levis', 'YGN', '1233456', 'levis@gmail.com', 'levis', '4929550c-71fb-444f-8737-12cb25406188', '-', 'Active', '2022-05-31 00:03:24', '2022-05-31 00:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `branchitemdetails`
--

CREATE TABLE `branchitemdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branchitem_id` bigint(20) NOT NULL,
  `itemdetail_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branchitemdetails`
--

INSERT INTO `branchitemdetails` (`id`, `branchitem_id`, `itemdetail_id`, `qty`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 'cb487e26-f014-4e64-ba58-d8e13f9f7317', 'Active', '2022-07-03 00:33:21', '2022-07-03 00:33:21'),
(2, 2, 3, 17, '97ac285f-d719-4e98-9be9-300d4416a541', 'Active', '2022-07-03 00:33:21', '2022-07-03 00:33:21'),
(3, 3, 8, 6, '122b8f07-9e2e-4266-89a3-f01a1fe700e2', 'Active', '2022-07-03 00:34:24', '2022-07-03 00:34:24'),
(4, 3, 7, 7, 'ca548a17-3c5a-47d7-bf72-4c180330d9f5', 'Active', '2022-07-03 00:34:24', '2022-07-03 00:34:24'),
(5, 4, 11, 7, 'e4d2c53c-5fd1-461a-ac50-c6f36943b9e0', 'Active', '2022-07-03 00:34:59', '2022-07-03 00:34:59'),
(6, 4, 12, 7, 'aa2895db-fdea-45de-b724-76ce628bcbe4', 'Active', '2022-07-03 00:34:59', '2022-07-03 00:34:59'),
(7, 5, 21, 15, '7b4561f3-2242-4512-afd3-694c03ca9b5f', 'Active', '2022-07-03 00:35:30', '2022-07-03 00:35:30'),
(8, 5, 19, 8, '8a514fa7-a2c7-41bf-9056-19009abac86c', 'Active', '2022-07-03 00:35:30', '2022-07-03 00:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `branchitems`
--

CREATE TABLE `branchitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `branch_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branchitems`
--

INSERT INTO `branchitems` (`id`, `item_id`, `totalqty`, `uuid`, `status`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1f410e35-97c1-474a-a57e-c6792333434d', 'Active', 1, '2022-07-02 23:42:23', '2022-07-02 23:42:23'),
(2, 2, 21, 'a2f6b754-4859-4963-b6d3-1f635e5bc66b', 'Active', 1, '2022-07-03 00:33:21', '2022-07-03 00:33:21'),
(3, 4, 13, '76f9ed29-8fe8-4da2-9c50-53b98eedaee2', 'Active', 1, '2022-07-03 00:34:24', '2022-07-03 00:34:24'),
(4, 6, 14, 'e26f784c-b38f-4b61-86de-4c6ff24ea572', 'Active', 1, '2022-07-03 00:34:59', '2022-07-03 00:34:59'),
(5, 9, 23, 'bbbc7c47-01b7-4d82-b7c3-c63400981ccd', 'Active', 1, '2022-07-03 00:35:30', '2022-07-03 00:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Polo Shirt', '48c46459-12e1-4778-8bb9-1c499ed8a007', 'Active', '2022-05-30 23:31:15', '2022-05-30 23:31:15'),
(2, 'Long-sleeve Plain Tees', 'b8daa021-3421-445f-ba40-3ef02c7fe53b', 'Active', '2022-05-30 23:32:53', '2022-05-30 23:32:53'),
(3, 'Short-sleeve Plain Tees', '6a3daf3b-17d6-498c-956b-4f0a62739d5b', 'Active', '2022-05-30 23:33:13', '2022-05-30 23:33:21'),
(4, 'Graphic Tees', 'acd59b1f-45cb-4da8-9316-f2e119ccc18f', 'Active', '2022-05-30 23:33:38', '2022-05-30 23:33:38'),
(5, 'Long-sleeve Shirts', 'c775b8a1-e38b-435d-92b6-d1f018382fa8', 'Active', '2022-05-30 23:33:56', '2022-05-30 23:33:56'),
(6, 'Short-sleeve Shirts', 'a647b58b-7ec6-4eae-a140-bae438a100f0', 'Active', '2022-05-30 23:34:15', '2022-05-30 23:34:15'),
(7, 'Sweatshirts', '617ca006-d6a3-4a50-bed2-bfbb3d5e460e', 'Active', '2022-05-30 23:34:54', '2022-05-30 23:34:54'),
(8, 'Hoodies', '1d794431-2ce9-48d6-a57b-e0f4cd70b5e1', 'Active', '2022-05-30 23:35:04', '2022-05-30 23:35:04'),
(9, 'Sweaters', '20a7aee6-8735-491a-9b2f-c944910a3e44', 'Active', '2022-05-30 23:35:23', '2022-05-30 23:35:23'),
(10, 'Cardigans', 'd5126af9-f987-4e0d-af47-199016c875f4', 'Active', '2022-05-30 23:35:37', '2022-05-30 23:35:37'),
(11, 'Joggers', 'ac6f3dda-f7cc-4de0-b392-f193ee73e03d', 'Active', '2022-05-30 23:36:58', '2022-05-30 23:36:58'),
(12, 'Jeans', 'b222e53a-fcf8-4ac0-a46b-487378c399c5', 'Active', '2022-05-30 23:37:09', '2022-05-30 23:37:09'),
(13, 'Shorts', '9ad92a37-f135-41a0-a6f0-1e75bbc3959e', 'Active', '2022-05-30 23:37:20', '2022-05-30 23:37:20'),
(14, 'Pants', '923e233e-4e59-4af7-a102-14f007f9e999', 'Active', '2022-05-30 23:37:37', '2022-05-30 23:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', 'YGN', 'Active', '2022-05-20 01:14:53', '2022-05-20 01:14:53'),
(2, 'Bago', 'bgo', 'Active', '2022-05-20 01:15:07', '2022-05-20 01:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colorname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorimage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `colorname`, `colorcode`, `colorimage`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blue', '#0f4e9f', '', '4f7abdf2-9e74-4bee-8d0f-12b74f0ebaec', 'Active', '2022-05-31 00:11:52', '2022-05-31 00:11:52'),
(2, 'Mountain Blue', '-', '401d4d19-1213-4c31-aae3-7c5a0fc60763.webp', 'ed868632-f366-48b6-a346-b8f5a93334f7', 'Active', '2022-05-31 00:16:29', '2022-05-31 00:16:29'),
(3, 'Gray_Red', '-', '44451fea-cc57-4755-8170-d00e0743d8d5.webp', '7122bc81-be9d-4773-8997-1e607fd1641b', 'Active', '2022-05-31 00:22:57', '2022-05-31 00:22:57'),
(4, 'Gray', '#0f4e9f', '', 'a9f5c9e6-e35d-4528-a0f5-99b99cb9c153', 'Active', '2022-05-31 00:23:47', '2022-05-31 00:23:47'),
(5, 'Yellow', '#FFBF00', '', 'b27b529c-feb2-4169-bf2b-39673a4bac56', 'Active', '2022-05-31 00:24:41', '2022-05-31 00:24:41'),
(6, 'Yellow_Flower', '-', '649430eb-5965-4e2e-9f5f-ab2ccc4fb3d2.webp', '340a61c8-99cc-495b-bc62-ef0a1842efc9', 'Active', '2022-05-31 00:25:38', '2022-05-31 00:25:38'),
(7, 'Gray1', '-', 'd4e34f8e-ed39-47ef-93bd-284c1159543d.webp', 'f9a3973b-4d1a-4f96-adc5-1501f061549f', 'Active', '2022-05-31 01:05:22', '2022-05-31 01:05:22'),
(8, 'Red', '-', 'a84218f3-9ef7-4477-b63d-0295f76e744b.webp', 'd3153333-762c-4e51-963c-5798bea8c317', 'Active', '2022-05-31 01:10:18', '2022-05-31 01:10:18'),
(9, 'Blue', '-', '45a39a30-e6df-4720-84d6-2a9d61a9f33e.webp', '9a89b0d1-41c8-4c80-9551-03eb054e1a8a', 'Active', '2022-05-31 01:13:04', '2022-05-31 01:13:04'),
(10, 'Green_color', '-', 'c0855650-f072-4fec-8e4c-35d01fbf52b8.webp', '1a204112-1321-4af4-9101-9e871c898dc2', 'Active', '2022-05-31 01:17:16', '2022-05-31 01:17:16'),
(11, 'Brown_img', '-', '1dfe4b4f-70ba-4b55-a5f0-9722fabef84f.webp', '59de84b2-334e-4265-a7c5-2913ee042c31', 'Active', '2022-05-31 01:21:27', '2022-05-31 01:21:27'),
(12, 'warm_gray', '-', '38c572a5-d067-4e5e-9ff9-1f1400888745.webp', 'dced1874-ce08-4332-8695-5d3f4e2df973', 'Active', '2022-05-31 01:31:11', '2022-05-31 01:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `totalamount` int(11) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `totalamount`, `point`, `user_id`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 5, '30da479c-ca00-40ee-807a-25e67005bca9', '2022-07-02 23:30:46', '2022-07-02 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `itemdetails`
--

CREATE TABLE `itemdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `color_id` bigint(20) NOT NULL,
  `size_id` bigint(20) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemdetails`
--

INSERT INTO `itemdetails` (`id`, `item_id`, `color_id`, `size_id`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2b5cdc99-3920-4a53-8cbf-2cd7aebee42c', 'Active', '2022-05-31 00:51:06', '2022-05-31 00:51:06'),
(2, 2, 7, 4, '77942168-1d79-45ee-8b79-06384c14c049', 'Active', '2022-05-31 01:07:12', '2022-05-31 01:07:12'),
(3, 2, 7, 3, 'e41e8891-cd2e-4281-80b2-50361e560803', 'Active', '2022-05-31 01:07:12', '2022-05-31 01:07:12'),
(4, 3, 8, 5, '6796fd34-9af8-420a-a729-e6f83a804382', 'Active', '2022-05-31 01:11:24', '2022-05-31 01:11:24'),
(5, 3, 8, 3, '22a273e3-e7a8-4d1e-80fc-c8286e82688f', 'Active', '2022-05-31 01:11:24', '2022-05-31 01:11:24'),
(6, 3, 8, 4, '0006d640-b296-4697-ab45-d90781a129c4', 'Active', '2022-05-31 01:11:24', '2022-05-31 01:11:24'),
(7, 4, 9, 3, 'f4f192e5-78fd-471c-aacd-5298083d39ec', 'Active', '2022-05-31 01:14:32', '2022-05-31 01:14:32'),
(8, 4, 9, 4, 'beabd18d-5497-40fb-8fbe-056bd3df859e', 'Active', '2022-05-31 01:14:32', '2022-05-31 01:14:32'),
(9, 5, 10, 5, '6012c668-6bb4-4338-8bce-c1fe0c7a813a', 'Active', '2022-05-31 01:19:13', '2022-05-31 01:19:13'),
(10, 5, 10, 2, 'a252290d-b1a7-49ba-9fb3-1ab5dd7eecb1', 'Active', '2022-05-31 01:19:13', '2022-05-31 01:19:13'),
(11, 6, 11, 3, '4b42e738-b7b7-44f1-a108-0083c19d9a72', 'Active', '2022-05-31 01:22:10', '2022-05-31 01:22:10'),
(12, 6, 11, 6, 'c2f9ad54-3fde-4280-a30e-9c1cf8fc725f', 'Active', '2022-05-31 01:22:10', '2022-05-31 01:22:10'),
(13, 7, 7, 2, '1ab7aab2-c686-4151-b5c9-cfc113a1f956', 'Active', '2022-05-31 01:27:53', '2022-05-31 01:27:53'),
(14, 7, 7, 3, '2793c173-eabd-4cf9-a097-5abd29b263f1', 'Active', '2022-05-31 01:27:53', '2022-05-31 01:27:53'),
(15, 7, 7, 4, '31040f18-9a58-4627-9fb0-54588414d64c', 'Active', '2022-05-31 01:27:53', '2022-05-31 01:27:53'),
(16, 8, 9, 5, '1ca4f2c1-2f07-43cc-83c7-bdd752e407e0', 'Active', '2022-05-31 01:28:52', '2022-05-31 01:28:52'),
(17, 8, 9, 6, '6d69af6f-e1bf-4d02-97a6-a7741270005b', 'Active', '2022-05-31 01:28:52', '2022-05-31 01:28:52'),
(18, 8, 9, 1, '310a35f9-feb3-4ffd-8f45-42a67c4360ae', 'Active', '2022-05-31 01:28:52', '2022-05-31 01:28:52'),
(19, 9, 12, 3, '6bc1085c-a493-4ac0-b924-7e54aeda6a06', 'Active', '2022-05-31 01:31:54', '2022-05-31 01:31:54'),
(20, 9, 12, 4, 'f43d378b-5821-4ade-b470-9f07039602c8', 'Active', '2022-05-31 01:31:54', '2022-05-31 01:31:54'),
(21, 9, 12, 5, '6fe8f8a4-d339-4fba-9cb3-b2a2943045f6', 'Active', '2022-05-31 01:31:54', '2022-05-31 01:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `itemphotos`
--

CREATE TABLE `itemphotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Yes',
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemphotos`
--

INSERT INTO `itemphotos` (`id`, `item_id`, `photo`, `primary`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '97d6a704-872d-4235-ab09-6685c923b7f0.webp', 'Yes', '3d2c7d3b-3d8e-4490-8be5-687653f31e4f', 'Active', '2022-05-31 00:51:06', '2022-05-31 00:51:06'),
(2, 2, '2c55be4e-b6bb-48c3-9bb1-995a4dc7a629.webp', 'Yes', 'ca0555dc-8c7e-495a-ad92-eb91ca14a61a', 'Active', '2022-05-31 01:07:12', '2022-05-31 01:07:12'),
(3, 3, 'ef61a24e-3336-41f9-b9c1-6005bb1d40ba.webp', 'Yes', 'b7b327e2-0b03-4c9c-8277-3fcdb6d38320', 'Active', '2022-05-31 01:11:24', '2022-05-31 01:11:24'),
(4, 4, '2a6063b5-128c-46bf-8d7c-028ba4819b4e.webp', 'Yes', '1f8744b6-9f44-4c0c-844b-3f004613886a', 'Active', '2022-05-31 01:14:32', '2022-05-31 01:14:32'),
(5, 5, 'c84e35f9-dd0f-4330-8322-8ffe0d6f63dc.webp', 'Yes', '23407e84-c832-4c4f-8ca5-43564a380729', 'Active', '2022-05-31 01:19:13', '2022-05-31 01:19:13'),
(6, 6, '9a0ff18e-7765-4295-bc9b-7ed451772ca5.webp', 'Yes', '54c1ca1a-f14d-4fd6-96f6-e4d38202ab90', 'Active', '2022-05-31 01:22:10', '2022-05-31 01:22:10'),
(7, 7, '88770599-21ee-49f6-b525-1eca7fecbd6a.webp', 'Yes', '9dc6e345-c1d2-4785-b9db-baa532f7a354', 'Active', '2022-05-31 01:27:53', '2022-05-31 01:27:53'),
(8, 8, 'bc8e652d-706c-44e7-b060-3eaa48c03e01.webp', 'Yes', '2d44029a-6e4d-4a4c-b519-a5691ad1b47d', 'Active', '2022-05-31 01:28:52', '2022-05-31 01:28:52'),
(9, 9, '155b0ea0-ce62-4ba8-aee7-d1da9499b811.webp', 'Yes', '091742a5-d4f0-45a6-afe7-6adbb7cd065b', 'Active', '2022-05-31 01:31:54', '2022-05-31 01:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprice` int(11) NOT NULL,
  `purchaseprice` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availablecolor` int(11) NOT NULL DEFAULT 0,
  `availablesize` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `model`, `saleprice`, `purchaseprice`, `description`, `availablecolor`, `availablesize`, `category_id`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Polo Shirt', 25000, 20000, 'shirt', 0, 0, 1, '149569dc-7551-4e76-a283-aa3a1a5ff164', 'Active', '2022-05-31 00:51:06', '2022-05-31 00:51:06'),
(2, 'Sweater1', 18000, 12000, 'shirt', 0, 0, 7, 'a02efe05-6232-4131-a11b-5f5a323eb3e4', 'Active', '2022-05-31 01:07:12', '2022-05-31 01:07:12'),
(3, 'Hoodie1', 14000, 10000, 'hoodie', 0, 0, 8, '5a64889f-717c-4930-bded-c70a44c78766', 'Active', '2022-05-31 01:11:24', '2022-05-31 01:11:24'),
(4, 'Jean1', 24000, 19000, 'jean', 0, 0, 12, '6ad60fc7-9942-443b-bc94-22668a19cb67', 'Active', '2022-05-31 01:14:32', '2022-05-31 01:14:32'),
(5, 'Pant1', 29000, 24000, 'pant', 0, 0, 14, 'ef44eda8-5b83-4924-814f-d0c8edfe93db', 'Active', '2022-05-31 01:19:13', '2022-05-31 01:19:13'),
(6, 'Pant2', 27000, 22000, 'pant', 0, 0, 14, '739061a0-9afe-443e-944e-4da058b2c524', 'Active', '2022-05-31 01:22:10', '2022-05-31 01:22:10'),
(7, 'Hoodie2', 22000, 20000, 'hoodie', 0, 0, 8, '412afed8-671c-45e0-8ade-4d5ef1bf20fd', 'Active', '2022-05-31 01:27:53', '2022-05-31 01:27:53'),
(8, 'Levis Jean', 25000, 20000, 'jean', 0, 0, 12, '1fa2074a-282e-4fcb-8a18-5548818f8718', 'Active', '2022-05-31 01:28:52', '2022-05-31 01:28:52'),
(9, 'Polo Shirt2', 24000, 20000, 'shirt', 0, 0, 1, '25d14070-87f0-40e7-b1e0-e23e2e04e6da', 'Active', '2022-05-31 01:31:54', '2022-05-31 01:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_05_04_154530_add_to_users', 2),
(8, '2022_05_06_163954_staff', 2),
(9, '2022_05_09_121522_create_branches_table', 3),
(10, '2022_05_09_142806_create_townships_table', 4),
(11, '2022_05_09_152346_create_cities_table', 5),
(19, '2022_05_09_165942_create_cities_table', 6),
(20, '2022_05_09_171557_create_roles_table', 6),
(21, '2022_05_10_043606_create_customers_table', 6),
(22, '2022_05_10_051917_create_staff_table', 6),
(23, '2022_05_10_054546_add_to_role', 6),
(24, '2022_05_10_081401_drop_image_column', 7),
(26, '2022_05_10_082152_delete_image_image', 8),
(29, '2022_05_14_154227_create_categories_table', 9),
(30, '2022_05_16_041316_create_sizes_table', 10),
(32, '2022_05_16_051320_create_colors_table', 11),
(33, '2022_05_19_044807_create_items_table', 12),
(34, '2022_05_20_065612_create_itemdetails_table', 13),
(35, '2022_05_20_081535_create_itemphotos_table', 14),
(40, '2022_05_30_050039_create_branchitems_table', 15),
(41, '2022_05_30_065648_create_branchitemdetails_table', 15),
(44, '2022_06_17_151003_create_sales_table', 16),
(45, '2022_06_18_154018_create_saleitems_table', 16),
(47, '2022_07_03_051505_add_sale_records', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sales Manager', 'sale apartamant', 'Active', NULL, NULL),
(2, 'Accounting Manager', 'am', 'Active', '2022-05-31 00:03:54', '2022-05-31 00:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `saleitems`
--

CREATE TABLE `saleitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) NOT NULL,
  `itemdetails_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saleitems`
--

INSERT INTO `saleitems` (`id`, `sale_id`, `itemdetails_id`, `qty`, `unitprice`, `discount`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 25000, 0, 'ed1cb59b-ec9b-47e4-8626-74840a986791', '2022-07-03 00:59:52', '2022-07-03 00:59:52'),
(2, 1, 4, 1, 27000, 0, '6d36868a-da88-435f-862e-c7ae752a2c55', '2022-07-03 00:59:52', '2022-07-03 00:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salecode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) NOT NULL,
  `paymenttype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` int(11) NOT NULL,
  `Totalqty` int(11) NOT NULL,
  `deliveryaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `township_id` bigint(20) NOT NULL,
  `bankimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount` int(11) NOT NULL DEFAULT 0,
  `totalpoint` int(11) NOT NULL DEFAULT 0,
  `paidamount` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `salecode`, `customer_id`, `branch_id`, `paymenttype`, `totalamount`, `Totalqty`, `deliveryaddress`, `township_id`, `bankimage`, `bank_id`, `discount`, `discountamount`, `totalpoint`, `paidamount`, `uuid`, `created_at`, `updated_at`) VALUES
(1, '12332', 5, 1, 'cash', 52000, 2, 'Traffico', 1, 'null', 1, NULL, 0, 0, 55000, '541253e1-00c0-435d-9db2-d176a5c2bbe9', '2022-07-03 00:59:52', '2022-07-03 00:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sizename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `sizename`, `description`, `uuid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free Size', 'everybody can wear', 'b4117228-3cd9-43f6-bccc-d17f26d463f6', 'Active', '2022-05-31 00:26:18', '2022-05-31 00:26:18'),
(2, 'XXL', 'Double Extra Large (46 to 47) Size', '14f53cb4-323c-4fe6-8bb6-2b68acc8b2ef', 'Active', '2022-05-31 00:34:28', '2022-05-31 00:34:28'),
(3, 'XL', 'Extra Large(44 to 45) Size', '6e4b1083-7b60-487a-83ea-46a47c379422', 'Active', '2022-05-31 00:36:19', '2022-05-31 00:36:19'),
(4, 'L', 'Large Size(42 to 43)', '026cf399-8ee7-4142-b259-cc59f31aa0fe', 'Active', '2022-05-31 00:36:54', '2022-05-31 00:36:54'),
(5, 'M', 'Medium sIZE(40 to 41)', 'b4a30474-5ef9-403a-ba5f-6fc7c34467ec', 'Active', '2022-05-31 00:37:34', '2022-05-31 00:37:34'),
(6, 'S', 'Small (38 to 39) Size', '85878562-c3aa-469e-9ddd-71175be5190c', 'Active', '2022-05-31 00:40:29', '2022-05-31 00:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `user_id`, `role_id`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '10eb47a6-474b-4720-a4d0-ed3266236a94', '2022-05-31 00:00:43', '2022-05-31 00:00:43'),
(2, 2, 1, '77e54502-e72b-4af3-b856-b23e604a3fed', '2022-05-31 00:08:18', '2022-05-31 00:08:18'),
(3, 3, 1, '9461a478-6b0f-46ac-b6a2-2ea76af8e368', '2022-05-31 00:09:26', '2022-05-31 00:09:26'),
(4, 4, 2, 'b210c985-daea-495b-9eeb-82d248e4a3ae', '2022-07-02 23:21:22', '2022-07-02 23:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `city_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `description`, `status`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Yankhin', 'des', 'Active', 1, '2022-05-09 10:33:36', '2022-05-09 10:33:36'),
(2, 'Taung Oakkala pa', 'dsdsds', 'Active', 1, '2022-05-09 10:50:55', '2022-05-09 10:50:55'),
(3, 'hlaing WIn', 'des', 'Active', 2, '2022-05-09 10:51:30', '2022-05-09 10:51:30'),
(4, 'Sulae', 'sulae', 'Active', 1, '2022-05-20 01:15:27', '2022-05-20 01:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phoneno`, `uuid`, `images`, `type`, `branch_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maung Win', 'mw@gmail.com', NULL, '$2y$10$RZ/9jnTOUNpH96f74ipnL.WdJGruVnq1MQxvqIKeUmHYcmioMkEo2', 97851813, 'c4e7f14b-b652-4c0f-8c0a-5492551bd0fe', '-', 'admin', 1, 'Active', NULL, '2022-05-31 00:00:43', '2022-05-31 00:00:43'),
(2, 'Kyaw Oo', 'ko@ko.com', NULL, '$2y$10$NoYn64rRobkLOoG.39puQ.LipaKv5pqdm07EC.pCWprJWFFZ8uLgu', 23456678, 'b4787e97-5e5d-405f-a1af-4bb1c423f27e', '-', 'customer', 2, 'Active', NULL, '2022-05-31 00:08:18', '2022-05-31 00:08:18'),
(3, 'Mya Mya', 'mya@mya.com', NULL, '$2y$10$s1eykQvV92qToIrM.2eC.uD0.GGACraV0UhHIayp5F3g22680iFde', 3555432, '9e248ad7-256a-4620-9e48-ff5dd7a96ee6', '-', 'admin', 3, 'Active', NULL, '2022-05-31 00:09:26', '2022-05-31 00:09:26'),
(4, 'hlaing WIn', 'al@al.com', NULL, '$2y$10$4vcqKZroKKgZaWx.wdaf1O2zxP0hU278Dm0li/DIsjj6pmusK7ETi', 111111, '7f04aa9b-ec3d-4882-8af5-f64f33cdd2ad', 'michael-d-rnKqWvO80Y4-unsplash.jpg', '', 1, 'Active', NULL, '2022-07-02 23:21:22', '2022-07-02 23:21:22'),
(5, 'Kg Kg', 'kg@gmail.com', NULL, '$2y$10$6Ic8AIG0ISjiswILHZqBV.lZ4YlbI4cF2WtmqadIllKzsio.ELeOW', 9665433, '95fd9165-ef9c-4114-9bbd-d565c22adef6', '-', 'customer', 1, 'Active', NULL, '2022-07-02 23:30:46', '2022-07-02 23:30:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_email_unique` (`email`),
  ADD UNIQUE KEY `branches_uuid_unique` (`uuid`);

--
-- Indexes for table `branchitemdetails`
--
ALTER TABLE `branchitemdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchitems`
--
ALTER TABLE `branchitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `itemdetails`
--
ALTER TABLE `itemdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemphotos`
--
ALTER TABLE `itemphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleitems`
--
ALTER TABLE `saleitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branchitemdetails`
--
ALTER TABLE `branchitemdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branchitems`
--
ALTER TABLE `branchitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemdetails`
--
ALTER TABLE `itemdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `itemphotos`
--
ALTER TABLE `itemphotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saleitems`
--
ALTER TABLE `saleitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
