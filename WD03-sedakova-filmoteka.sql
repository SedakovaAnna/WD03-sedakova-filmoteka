-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2018 г., 14:21
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `WD03-sedakova-filmoteka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `genre` text COLLATE utf8_bin NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `title`, `genre`, `year`) VALUES
(1, 'Облачный атлас', 'драма', 2010),
(2, 'Такси 2', 'комедия', 2000),
(3, 'Мир юрского периода 2', 'фантастика', 2018),
(4, 'Ночная смена', 'комедия', 2018),
(5, 'Распрекрасный принц', 'фэнтези', 2018),
(6, 'Книжный клуб', 'комедия', 2018),
(7, 'Во власти стихии', 'драма', 2018),
(8, 'План побега 2', 'триллер', 2018),
(9, 'Инсомния', 'детектив', 2018),
(10, 'Красотка на всю голову', 'комедия', 2018),
(11, 'Фото на память', 'ужасы', 2018),
(12, 'Восемь подруг Оушена', 'боевик', 2018);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
