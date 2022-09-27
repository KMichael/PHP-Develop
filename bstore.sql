-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 27 2022 г., 07:08
-- Версия сервера: 10.5.11-MariaDB
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `book` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `user_id`, `book`, `created_at`, `updated_at`) VALUES
(1, 2, 'Фантастические рассказы', NULL, NULL),
(2, 3, 'Любовный роман', NULL, NULL),
(3, 4, 'Столовые приборы', NULL, NULL),
(4, 4, 'Кухонный справочник', NULL, NULL),
(116, 63, 'История XX века', '2022-09-25 23:27:42', '2022-09-25 23:27:42');

-- --------------------------------------------------------

--
-- Структура таблицы `book_genre`
--

CREATE TABLE `book_genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book_genre`
--

INSERT INTO `book_genre` (`id`, `book_id`, `genre_id`) VALUES
(1, 4, 5),
(2, 3, 5),
(3, 2, 2),
(4, 2, 1),
(116, 1, 3),
(117, 1, 4),
(127, 116, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `b_genres`
--

CREATE TABLE `b_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_books` bigint(20) UNSIGNED NOT NULL,
  `id_genres` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `genre`, `created_at`, `updated_at`) VALUES
(1, 'Детектив', NULL, '2022-09-26 20:51:59'),
(2, 'Роман', NULL, NULL),
(3, 'Наука', NULL, NULL),
(4, 'Фантастика', NULL, NULL),
(5, 'Справочник', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(39, '2014_10_12_000000_create_users_table', 1),
(40, '2014_10_12_100000_create_password_resets_table', 1),
(41, '2019_08_19_000000_create_failed_jobs_table', 1),
(42, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(43, '2022_09_22_053930_create_books_table', 1),
(44, '2022_09_22_061303_create_genres_table', 1),
(45, '2022_09_22_061346_create_b_genres_table', 1),
(46, '2022_09_22_190805_create_book_genre_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$Rg7UXWAZV3Wm48w5kVg4oeiuaP8lIR/Y6PbrbRm8xqGYlnuZd97Uq', 1, NULL, '2022-09-01 01:04:12', '2022-09-24 01:04:12'),
(2, 'Fedor', 'Fedor@Fedor.com', NULL, '$2y$10$HTtAmQ6Zl4L0XvzRY6XkJeYyYOSwceXhHrFzsuraYdWPtIOAvL2Ei', NULL, NULL, '2022-09-22 12:21:46', '2022-09-23 11:17:14'),
(3, 'Ivan', 'Ivan@Ivan.com', NULL, '$2y$10$Mx3y3yeF7XCWhOFh8SIqauuA1M4WiOfYr0ARyZyKO5rjiW7oXwq2a', NULL, NULL, '2022-09-22 12:21:53', '2022-09-23 11:17:14'),
(4, 'Vasya', 'Vasya@Vasya.ru', NULL, '$2y$10$nH/xrR3SfCBeZWApyqik3.25bRPiMWZU8xJCkW8qKyN8HCRyPXDpa', NULL, NULL, '2022-09-22 12:22:02', '2022-09-23 11:17:14'),
(63, 'Oleg', 'Oleg@Oleg.ru', NULL, '$2y$10$6P7IRXxR1XkeoJZh5Ukdf.StInMyZBTehKqJg3zTAwSL2p6bg1TvW', NULL, NULL, '2022-09-25 23:27:08', '2022-09-25 23:27:08'),
(65, 'Женя', 'evgen@evgen.com', NULL, '$2y$10$odM.ArkNDB/68wBzNL82Segwp3mAK4cv/ulaIhoO7FNl490koClcG', NULL, NULL, '2022-09-26 20:51:24', '2022-09-26 20:51:33');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_book_unique` (`book`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_genre_book_id_foreign` (`book_id`),
  ADD KEY `book_genre_genre_id_foreign` (`genre_id`);

--
-- Индексы таблицы `b_genres`
--
ALTER TABLE `b_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_genres_id_books_foreign` (`id_books`),
  ADD KEY `b_genres_id_genres_foreign` (`id_genres`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT для таблицы `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT для таблицы `b_genres`
--
ALTER TABLE `b_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `book_genre`
--
ALTER TABLE `book_genre`
  ADD CONSTRAINT `book_genre_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `b_genres`
--
ALTER TABLE `b_genres`
  ADD CONSTRAINT `b_genres_id_books_foreign` FOREIGN KEY (`id_books`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `b_genres_id_genres_foreign` FOREIGN KEY (`id_genres`) REFERENCES `genres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
