-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 22 2018 г., 10:01
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `faq_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(13, 'Политика', 1, 1),
(14, 'Права', 2, 1),
(15, 'Медицина', 3, 1),
(16, 'Химия', 4, 1),
(17, 'Разработка', 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `data_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `question`, `category_id`, `user_id`, `answer`, `is_new`, `status`, `data_creation`) VALUES
(34, 'Вопрос вопрос вопрос?', 13, 3, 'Ответ ответ ответ)))))))))))))))))))))))))))))))))))))))))))))', 0, 1, '2018-11-22 09:24:19'),
(35, 'Вопрос вопрос вопрос?', 13, 4, '0Ответ ответ ответ)))))))))))))))))))))))))))))))))))))))))))))', 1, 1, '2018-11-22 09:24:19'),
(36, 'Вопрос вопрос вопрос?', 13, 4, 'Ответ ответ ответ)))))))))))))))))))))))))))))))))))))))))))))', 0, 1, '2018-11-22 09:24:19'),
(37, 'Вопрос вопрос вопрос?', 13, 5, '', 0, 1, '2018-11-22 09:24:19'),
(38, 'Вопрос вопрос вопрос2?', 13, 5, 'Ответ ответ ответ))))))))))))))))))))))))))))))))', 0, 1, '2018-11-22 09:24:19'),
(39, 'Вопрос вопрос вопрос3?', 13, 5, 'Ответ ответ ответ))))))))))))))))))))))))))))))))', 0, 1, '2018-11-22 09:24:19'),
(40, 'Вопрос вопрос вопрос4?', 13, 5, '', 0, 0, '2018-11-22 09:24:19'),
(41, 'Вопрос вопрос вопрос?', 14, 4, '', 1, 1, '2018-11-22 09:24:19'),
(42, 'Вопрос вопрос вопрос?', 14, 3, 'Ответ ответ ответ))))))))))))))))))))))))))))))))', 0, 1, '2018-11-22 09:24:19'),
(43, 'Вопрос вопрос вопрос?', 14, 3, 'Ответ ответ ответ))))))))))))))))))))))))))))))))', 0, 1, '2018-11-22 09:24:19'),
(44, 'Вопрос вопрос вопрос?', 15, 3, '', 0, 1, '2018-11-22 09:24:19'),
(45, 'Вопрос вопрос вопрос?', 16, 3, 'Ответ ответ ответ))))))))))))))))))))))))))))))))', 0, 0, '2018-11-22 09:24:19'),
(46, 'Вопрос вопрос вопрос?2', 16, 0, 'Ответ ответ ответ', 1, 1, '2018-11-22 09:24:19'),
(55, 'пустой вопрос?2', 13, 3, '', 1, 0, '2018-11-22 09:24:19'),
(56, 'ertyuytr', 13, 0, 'ertyuhgfd', 0, 1, '2018-11-22 09:24:19'),
(57, '123456', 13, 0, '765432', 1, 1, '2018-11-22 09:24:19'),
(58, 'poiuytre', 13, 3, 'answer', 1, 1, '2018-11-22 09:24:19'),
(59, 'new question?', 13, 4, '', 1, 0, '2018-11-22 09:25:15'),
(60, 'Работает дата?', 17, 3, 'Да, работаем', 1, 1, '2018-11-22 09:49:52');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'alex', 'alex@mail.com', '1111', 'user'),
(4, 'admin', 'admin@admin.com', 'admin', 'admin'),
(5, 'piter', 'serg@mail.com', '2222', 'user'),
(6, 'bob', 'bob@bob.bob', '123456', 'user'),
(7, 'bob23234', 'bob2@bob2.bob2333', '1234565', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
