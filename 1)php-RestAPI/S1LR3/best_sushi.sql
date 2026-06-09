-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 05 2023 г., 16:04
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `best_sushi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `name_Client` varchar(45) NOT NULL,
  `ID_point` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `img_path`, `name_Client`, `ID_point`, `description`, `cost`) VALUES
(1, 'set_california.png', 'Сет Калифорния', 1, 'Калифорния, Калифорния запеченная, Калифорния с лососем, Калифорния с креветкой. 32 ролла (приборов на 3 персоны).', 1150),
(3, 'big_fish.png', 'Big Fish', 2, 'Филадельфия, Бостон, Океан, Магуро спешл, Аризона, Даллас. 48 роллов (приборов на 5 персон)', 2200),
(4, 'farerskie_ostrova.png', 'Фарерские отрова', 5, 'Ролл Лосось яки, ролл Чикаго, ролл Сяке, суши с лососем. Всего 24 ролла и 2 суши. (Приборов на 2 персоны)', 1300),
(5, 'set_5_element.png', 'Сет Пятый элемент', 4, 'Филадельфия, Креветка Блючиз, Кайеси, Сяке темпура и хосомак с лососем запеченный. 38 роллов (приборов на 4 персоны)', 1500),
(6, 'love_story.png', 'Любовная история', 2, 'Ролл Фреш с крабом(сурими) и помидоркой черри. Ролл Бостон под шапкой из фарерского лосося. Ролл Филадельфия. Ролл Океан с тигровой креветкой, сливочным сыром. Гунканы запеченные с мидиями\r\nВсего 32 ролла и 3 гункана\r\n(Приборов на 3 персоны)', 1500),
(7, 'salmon.png', 'Salmon', 1, 'Чикаго, Аризона, Бостон, 24 ролла, 810 г. (приборов на 2 персоны)', 1150),
(8, 'rivera.png', 'Ривьера', 1, 'Паттайя, Сливочный краб, Океан, Тазу Саке, 32 ролла (приборов на 3 персоны)', 1450),
(9, 'hard.png', 'Хард', 2, 'Шиитаке, Кайеси, Греческий, Спайси 32 ролла (приборов на 3 персоны)', 1450),
(10, 'hard_berning.png', 'Хард Бернинг', 4, 'Вегас, Спайси, Бостон, Тазу Саке, гункан с лососем запеченный 3шт. гункан с лососем 3шт, 38 шт (приборов на 4 персоны)', 1850),
(11, 'gurme.png', 'Гурмэ', 5, 'Кани Бонито, Филадельфия гурмэ, Бонито 24 ролла (приборов на 2 персоны)', 1000),
(12, 'bogemskaia_rapsodia.png', 'Богемская рапсодия', 3, 'Филадельфия, Филадельфия запеченная, Калифорния, Калифорния запеченная 32 ролла (приборов на 3 персоны)', 1500),
(13, 'hose.png', 'Хосэ', 5, 'Хосомаки запеченные под сырным соусом (пармезан) с креветкой (6шт), с тунцом (6шт), с снежным крабом (6шт), с лососем (6шт). Всего 24 ролла. (приборов на 2 персоны)', 680),
(14, 'tempura.png', 'Темпура', 1, 'Унаги темпура (угорь) 8шт. Эби темпура (креветка) 8шт. Саке темпура (лосось) 8шт. Итариан (краб сурими) 8шт. Всего 32 ролла (приборов на 3 персоны)', 1250);

-- --------------------------------------------------------

--
-- Структура таблицы `pointsales`
--

CREATE TABLE `pointsales` (
  `ID` int(11) UNSIGNED NOT NULL,
  `point_Sales` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pointsales`
--

INSERT INTO `pointsales` (`ID`, `point_Sales`) VALUES
(1, 'ул.Ким,21'),
(2, 'ул.Буханцева,1'),
(3, 'ул.Суши,9'),
(4, 'ул.Сердец,31'),
(5, 'ул.Атом,7');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `krov` text NOT NULL,
  `rezus` text NOT NULL,
  `vk` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `krov`, `rezus`, `vk`, `password`, `email`) VALUES
(6, 'Fedor Pavlov', 'I', '+', 'asdasd', '6108948a918e79383e2cac3c5d300b39', 'f2003p@yandex.ru'),
(7, 'Fedor Pavlov', 'II', '+', 'awdadwwa', '6108948a918e79383e2cac3c5d300b39', 'fp@yandex.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `index_1` (`ID_point`);

--
-- Индексы таблицы `pointsales`
--
ALTER TABLE `pointsales`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `pointsales`
--
ALTER TABLE `pointsales`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
