-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Авг 22 2022 г., 18:40
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo_list`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access_tokens`
--

CREATE TABLE `access_tokens` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(200) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `text` text NOT NULL,
  `done` tinyint NOT NULL DEFAULT '0',
  `edited_by_admin` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `is_admin`) VALUES
(1, 'root', '$2y$10$s3fWmozoKNQAEhwzDm/VGeE1t1BhaG4A7ASX66b4s5mGzteH.QAzi', 0),
(6, 'admin', '$2y$10$Zl/FdJtWvbzOwNN0vJnZre8to6X3M8U.cwmiYUFGiHHqfqeMhC7XC', 1),
(7, 'root2', '$2y$10$F1Tr.3gcIdqxPciR/gCbTuWVAuh54s8Bnwdth40lz5Vktudoksoxq', 0),
(8, 'root4', '$2y$10$fQJ44ZS2qdP/zgv1VhhNn.PprXmbBng8lZ4fbWiGKu6igV/zBrkAS', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
