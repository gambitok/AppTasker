-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 05 2018 г., 12:24
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `apptasker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id_task` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `text` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id_task`, `name`, `email`, `text`, `image`, `status`) VALUES
(1, 'Дмитро', 'dmytro@mail.com', 'Задача 1', '/img/1.png', 0),
(2, 'Ярослав', 'vitalik29@mail.com', '\n            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at aut delectus dicta dolor doloremque expedita hic ipsum laborum, necessitatibus odio praesentium quam, quas repellat repudiandae soluta tempore vel.', '/img/164125.jpg', 1),
(3, 'Валентин2', 'dmdz@gmail.com2', '\n            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at aut delectus dicta dolor doloremque expedita hic ipsum laborum, necessitatibus odio praesentium quam, quas repellat repudiandae soluta tempore vel.', '/img/1.png', 1),
(4, 'Андрій', 'dmdz@mulo.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eius laboriosam, odio', '/img/164125.jpg', 1),
(5, 'Петя', 'O@i.ua', 'Lorem ipsum dolor sit amet, consectet', '/img/1.png', 0),
(6, 'Коля2', 'dmdz@mulo.com', 'Завдання - блабла', '/img/164125.jpg', 1),
(7, 'Льоня', 'kok@i.ya', 'Lorem ipsum dolor sit amet, consectetur', '/img/1.png', 1),
(8, 'Боря2', 'asddddk@i.ya2', '\n            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at aut delectus dicta dolor doloremque expedita hic ipsum laborum, necessitatibus odio praesentium quam, quas repellat repudiandae soluta tempore vel.', '/img/164125.jpg', 1),
(11, 'Тігран', 'gambitokgd@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eius laboriosam, ', '/img/164125.jpg', 0),
(33, 'Dmitro', 'gambitokgd@gmail.com', 'Завдання 1', '/img/1.png', 0),
(34, 'Василько', 'gambitokgd@yahoo.com', '\n            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at aut delectus dicta dolor doloremque expedita hic ipsum laborum, necessitatibus odio praesentium quam, quas repellat repudiandae soluta tempore vel.', '/img/164125.jpg', 0),
(41, 'aaa', 'dmdz@gmail.com2', '\n            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at aut delectus dicta dolor doloremque expedita hic ipsum laborum, necessitatibus odio praesentium quam, quas repellat repudiandae soluta tempore vel.', '/img/164125.jpg', 0),
(42, 'a', 'ura@gmail.com', '\n            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at aut delectus dicta dolor doloremque expedita hic ipsum laborum, necessitatibus odio praesentium quam, quas repellat repudiandae soluta tempore vel.', '/img/164125.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
