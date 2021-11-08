-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 10:13 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_room`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `app__users`
--

CREATE TABLE `app__users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_Id` int(10) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `app__users`
--

INSERT INTO `app__users` (`id`, `name`, `email`, `phone`, `cmnd`, `image`, `department_Id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Thanh Dat', 'nguyenthanhdat210101@gmail.com', '0987654321', '0987655432', 'IMG20200524214233.jpg', 6, NULL, '$2y$10$YFQdO6ZirFjMEgzZpcSvleL9gi.aNB20LJL8FliCtTCvu0cNehFnG', NULL, '2021-11-04 00:21:17', '2021-11-04 00:21:17'),
(2, 'Phan Huyen Thi', 'gadathethoi99@gmail.com', '0816516400', '987654322', 'COMPUTER.png', 7, NULL, '$2y$10$3vpzLkDwrsOTywRAji/.Veckos0PPgxC5XUVduxAXVI7LwxMUJAxq', NULL, '2021-11-04 00:21:55', '2021-11-08 02:10:25'),
(3, 'Phan Thị Huyền', 'datntpd03522@fpt.edu.vn', '0941519704', '987654323', 'received_4068654193188614.jpeg', 7, NULL, '$2y$10$lfPZaiKFZ1JgOf5LTi5LXeTdKPMt0IL6gByLBvP16tYwgvDL0IKOq', NULL, '2021-11-04 00:22:36', '2021-11-05 01:46:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'phong ban 101', 1, '2021-11-04 00:20:26', '2021-11-04 19:56:33'),
(2, 'phong ban 102', 1, '2021-11-04 00:20:29', '2021-11-04 19:56:42'),
(3, 'phong ban103', 1, '2021-11-04 00:20:31', '2021-11-04 19:56:49'),
(6, 'phong ban 201', 1, '2021-11-04 00:20:41', '2021-11-04 19:57:25'),
(7, 'Phòng Bàn 204', 1, '2021-11-04 00:20:47', '2021-11-04 19:57:38'),
(8, 'phong hop 304 A', 1, '2021-11-08 02:06:34', '2021-11-08 02:06:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `meet_rooms`
--

CREATE TABLE `meet_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `meet_rooms`
--

INSERT INTO `meet_rooms` (`id`, `name`, `address`, `status`, `image`, `seats`, `created_at`, `updated_at`) VALUES
(1, 'Phòng Họp số 2', '137 Nguyễn Thị Thập - Đà Nẵng', 1, 'room.jpg', 156, '2021-11-04 00:23:41', '2021-11-04 00:23:41'),
(2, 'Phòng Họp số 1', '12 Nguyễn Thị Thập - Đà Nẵng', 1, 'room2.jpg', 42, '2021-11-04 00:23:57', '2021-11-04 00:23:57'),
(3, 'Phòng Họp số 3', '15 Quang Trung - Đà Nẵng', 1, 'msi.png', 1615, '2021-11-04 00:24:14', '2021-11-04 00:24:14'),
(4, 'Phòng Họp số 4 A', '12 -  LÃO BẠNG - Đà Nẵng', 1, 'COMPUTER.png', 1423, '2021-11-08 02:07:15', '2021-11-08 02:07:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_02_082450_create_departments_table', 1),
(6, '2021_11_02_082540_create_meet_rooms_table', 1),
(7, '2021_11_02_085204_create_app__users_table', 1),
(8, '2021_11_02_090702_create_participation_tickers_table', 1),
(9, '2021_11_04_070924_create_participation__ticket__details_table', 1),
(12, '2021_11_08_061622_time_book_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `participation_tickers`
--

CREATE TABLE `participation_tickers` (
  `id` int(10) UNSIGNED NOT NULL,
  `meet_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `book_date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `participation_tickers`
--

INSERT INTO `participation_tickers` (`id`, `meet_id`, `status`, `book_date`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2021-11-05 09:46:00', '2021-11-20 17:00:00', '2021-11-20 18:00:00', '2021-11-04 19:46:12', '2021-11-04 19:46:12'),
(8, 3, 1, '2021-11-05 16:08:00', '2021-11-20 17:00:00', '2021-11-20 18:00:00', '2021-11-05 02:08:42', '2021-11-05 02:08:42'),
(10, 3, 1, '2021-11-08 10:37:00', '2021-11-13 17:00:00', '2021-11-13 18:00:00', '2021-11-07 20:37:01', '2021-11-07 20:37:01'),
(12, 2, 1, '2021-11-08 14:59:00', '2021-11-11 19:00:00', '2021-11-11 20:00:00', '2021-11-08 00:59:45', '2021-11-08 00:59:45'),
(13, 2, 1, '2021-11-08 15:01:00', '2021-11-20 16:00:00', '2021-11-20 17:00:00', '2021-11-08 01:01:21', '2021-11-08 01:01:21'),
(14, 2, 1, '2021-11-08 15:11:00', '2021-11-20 18:00:00', '2021-11-20 19:00:00', '2021-11-08 01:11:07', '2021-11-08 01:11:07'),
(15, 4, 1, '2021-11-08 16:10:00', '2021-11-15 08:00:00', '2021-11-15 09:00:00', '2021-11-08 02:10:55', '2021-11-08 02:10:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `participation__ticket__details`
--

CREATE TABLE `participation__ticket__details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticketid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `participation__ticket__details`
--

INSERT INTO `participation__ticket__details` (`id`, `user_id`, `ticketid`, `created_at`, `updated_at`) VALUES
(19, 2, 6, '2021-11-04 20:42:02', '2021-11-04 20:42:02'),
(20, 3, 6, '2021-11-04 20:42:07', '2021-11-04 20:42:07'),
(21, 1, 8, '2021-11-08 02:05:22', '2021-11-08 02:05:22'),
(23, 3, 8, '2021-11-08 02:05:30', '2021-11-08 02:05:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'datntpd03522@fpt.edu.vn', 'XCCWtYJYTFRR1EQhYm5YkO42dYoWyqO3xVeGdJDv2ko0G652TXJuJF3Q7G1tcWpx', '2021-11-05 01:30:14', '2021-11-05 01:43:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `app__users`
--
ALTER TABLE `app__users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app__users_email_unique` (`email`),
  ADD UNIQUE KEY `app__users_cmnd_unique` (`cmnd`),
  ADD KEY `app__users_department_id_foreign` (`department_Id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `meet_rooms`
--
ALTER TABLE `meet_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `participation_tickers`
--
ALTER TABLE `participation_tickers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participation_tickers_meet_id_foreign` (`meet_id`);

--
-- Chỉ mục cho bảng `participation__ticket__details`
--
ALTER TABLE `participation__ticket__details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participation__ticket__details_user_id_foreign` (`user_id`),
  ADD KEY `participation__ticket__details_ticketid_foreign` (`ticketid`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `app__users`
--
ALTER TABLE `app__users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `meet_rooms`
--
ALTER TABLE `meet_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `participation_tickers`
--
ALTER TABLE `participation_tickers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `participation__ticket__details`
--
ALTER TABLE `participation__ticket__details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `app__users`
--
ALTER TABLE `app__users`
  ADD CONSTRAINT `app__users_department_id_foreign` FOREIGN KEY (`department_Id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `participation_tickers`
--
ALTER TABLE `participation_tickers`
  ADD CONSTRAINT `participation_tickers_meet_id_foreign` FOREIGN KEY (`meet_id`) REFERENCES `meet_rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `participation__ticket__details`
--
ALTER TABLE `participation__ticket__details`
  ADD CONSTRAINT `participation__ticket__details_ticketid_foreign` FOREIGN KEY (`ticketid`) REFERENCES `participation_tickers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participation__ticket__details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `app__users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
