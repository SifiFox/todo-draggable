-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 19 2021 г., 15:55
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todolist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `todos`
--

INSERT INTO `todos` (`id`, `title`, `data_time`, `checked`) VALUES
(12, '3eqweqweq', '2021-07-19 14:54:00', 0),
(14, '3123141', '2021-07-19 14:58:59', 1),
(15, 'asdaeda', '2021-07-19 15:49:28', 0),
(16, 'qweqewq', '2021-07-19 15:49:31', 1),
(17, 'test', '2021-07-19 15:49:32', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
