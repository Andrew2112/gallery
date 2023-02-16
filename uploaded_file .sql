-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2023 г., 19:17
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `uploaded_file`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `created_at`) VALUES
(92, '6381f8792094f_img1.jpg', '2022-11-26 14:28:57'),
(93, '6381f88ed10d3_img3.jpg', '2022-11-26 14:29:18'),
(94, '6381f88ef2405_img2.jpg', '2022-11-26 14:29:18'),
(95, '6381f9a491c4f_img6.jpg', '2022-11-26 14:33:53'),
(96, '6381f9a4b072b_img5.jpg', '2022-11-26 14:33:57'),
(97, '6381f9a4bd4a3_img4.jpg', '2022-11-26 14:33:56'),
(98, '63a17da82e709_6.jpg', '2022-12-20 12:17:28'),
(99, '63a17f1485872_1.jpg', '2022-12-20 12:23:33'),
(100, '63a17f14c8deb_4.jpg', '2022-12-20 12:23:35'),
(101, '63a17f14e020d_5.jpg', '2022-12-20 12:23:32'),
(102, '63a8acc197a8c_3.jpg', '2022-12-25 23:04:17'),
(103, '63ee528dd38c9_toy10.jpg', '2023-02-16 18:58:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
