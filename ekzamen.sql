-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2018 г., 17:32
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) UNSIGNED NOT NULL,
  `avtor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `avtor`) VALUES
(1, 'Test', 'Test Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 1545306949, 'aleks2'),
(2, 'Test2', 'Test 2Интересные факты\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 'Интересные факты\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 1545309629, 'aleks2'),
(3, '41214214124124', '41214214124124', '41214214124124', 21, '41214214124124'),
(4, 'testik00000000', 'testik00000000', 'testik00000000', 21, 'testik00000000'),
(5, '51531512523453', 'testik00000000', 'testik00000000', 21, 'testik00000000'),
(6, 'astfa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 21, 'testik00000000'),
(7, 'Testovoe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque iure ipsam ab fugit aperiam architecto, ipsa sequi omnis perspiciatis, consequatur deserunt nulla earum officia esse voluptates ducimus sit dolores. Molestias.', 1, 'Заглушка'),
(8, 'fasfsafaf', 'fasfsafsafasfsafsafaf', 'fsafafsaffasfafsafafsafsaf', 1, 'Заглушка');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `mess` text NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(1, 'Вася', 'Тестовый комментарий', 2),
(2, 'Вася', 'Тестовый комментарий', 2),
(3, 'Вася', 'Тестовый комментарий', 2),
(4, 'Вася', 'Тестовый комментарий', 2),
(5, 'Вася', 'Тестовый комментарий', 2),
(6, 'Вася', 'Тестовый комментарий', 2),
(7, 'Вася', 'Тестовый комментарий', 2),
(8, 'Вася', 'Тестовый комментарий', 2),
(9, 'aleks', 'asa', 2),
(10, '', 'asdsadsadasd', 2),
(11, '', 'safafs', 2),
(12, '', 'fsafafafsa', 1),
(13, 'fsafafa', 'fsafafafsa', 1),
(14, 'adasdsad', 'ssdasdad', 4),
(15, 'SADSADAS', 'DASDAD', 1),
(16, 'DASDAS', 'DASDSADAS', 1),
(17, 'DAFA', 'SADASD', 1),
(18, 'Test', '1234', 1),
(19, 'Test', '1234', 1),
(20, 'adfsaf', 'asfaa', 1),
(21, 'adfsaf', 'asfaa', 1),
(22, 'ЫФФЫВЫФВ', 'ЫФВФ', 8),
(23, 'ЫФФЫВЫФВ', 'ЫФВФ', 8),
(24, 'afs', 'asfaf', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(1, 'Алексей', 'velcom.ale@gmail.com', 'admin', '020fb34d4a9caaea26d224d690fbfe0c'),
(2, 'Фиксик', 'fiksik@test.ru', 'Fiksik', '020fb34d4a9caaea26d224d690fbfe0c'),
(3, 'Фиксик', 'fiksik@test.ru', 'Fiksik', '020fb34d4a9caaea26d224d690fbfe0c'),
(4, 'Test', 'test@mail.ru', 'Test', '020fb34d4a9caaea26d224d690fbfe0c'),
(5, 'Aleks', 'aleks@test.ru', 'aleks', '020fb34d4a9caaea26d224d690fbfe0c'),
(6, 'test', 'velcom.ale@gmail.com', 'login3', '12345'),
(7, 'test', 'velcom.ale@gmail.com', 'admin', 'admin'),
(8, 'test', 'velcom.ale@gmail.com', 'fasfafaf', '020fb34d4a9caaea26d224d690fbfe0c');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
