-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2017 г., 10:12
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dba`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1024) NOT NULL,
  `author` varchar(1024) NOT NULL,
  `pub_year` int(4) NOT NULL,
  `price` float NOT NULL,
  `recording_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `pub_year`, `price`, `recording_date`) VALUES
(1, 'Собачье сердце', 'Булгаков М. А.', 1985, 420, '2017-03-29 05:43:09'),
(2, 'Война и мир', 'Толстой Л. Н.', 1935, 1400, '2017-03-29 05:43:09'),
(3, 'Мертвые души', 'Гоголь Н. В.', 1992, 200, '2017-03-29 05:43:09'),
(4, 'Мастер и Маргарита', 'Булгаков М. А.', 1995, 500, '2017-03-29 05:43:09');

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

CREATE TABLE `publisher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1024) NOT NULL,
  `country` varchar(1024) NOT NULL,
  `city` varchar(1024) NOT NULL,
  `recording_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `country`, `city`, `recording_date`) VALUES
(1, 'АСТ', 'Россия', 'Москва', '2017-03-29 06:01:34'),
(2, 'Elsevier', 'Нидерланды', 'Амстердам', '2017-03-29 06:01:34'),
(3, 'Karger AG', 'Германия', 'Берлин', '2017-03-29 06:01:34'),
(4, 'Питер', 'Россия', 'Санкт-Петербург', '2017-03-29 06:01:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
