-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 19 2020 г., 11:54
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `43lessonPL`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int(10) NOT NULL,
  `id_universities` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `id_universities`, `user_id`) VALUES
(1, 2, 8),
(2, 1, 8),
(3, 4, 8),
(4, 3, 8),
(5, 2, 10),
(6, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `fio` varchar(355) NOT NULL,
  `school` varchar(355) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(355) NOT NULL,
  `phone` varchar(355) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `fio`, `school`, `age`, `email`, `phone`, `password`) VALUES
(8, 'Любовь Яковлева', '5 школа Якутск', 17, 'liubov.iakovleva5@gmail.com', '89243607067', 123),
(9, 'Копырин Николай', 'ЯГНГ', 17, 'kopyrin@gmail.com', '89243607068', 123),
(10, 'Иванов Иван', '157 школа', 17, 'ivanov@gmail.com', '89243607069', 123);

-- --------------------------------------------------------

--
-- Структура таблицы `universities`
--

CREATE TABLE `universities` (
  `id` int(10) NOT NULL,
  `name` varchar(355) NOT NULL,
  `description` varchar(355) NOT NULL,
  `count_places` int(10) NOT NULL,
  `photo` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `universities`
--

INSERT INTO `universities` (`id`, `name`, `description`, `count_places`, `photo`) VALUES
(1, 'МГУ им. Ломоносова', 'Лучший университет России', 100, 'img/msu.jpg'),
(2, 'Московский Государственный Институт Международных Отношений', 'Московский государственный институт международных отношений МИД Российской Федерации — один из ведущих российских университетов, готовящий специалистов по 18 направлениям', 100, 'img/mgimo.png'),
(3, 'Университет ИТМО', 'Университет ИТМО — первый неклассический университет. Стать высококлассным и продвинутым программистом, ученым, инженером, предпринимателем, выбрать профессию будущего на стыке новых направлений и исполнить свою мечту очень легко. Нужно выбрать Университет ИТМО.\r\n\r\n', 100, 'img/itmo.jpg'),
(4, 'Universal University', 'Первый в России университет креативных индустрий, где учат и учатся по-другому. В Universal University учат учиться и закладывать полученное знание в жизнеспособные проекты, которые становятся движущей силой в креативных индустриях в масштабах города, страны и мира.', 100, 'img/uu.png');

-- --------------------------------------------------------

--
-- Структура таблицы `university_admin`
--

CREATE TABLE `university_admin` (
  `id` int(10) NOT NULL,
  `login` varchar(355) NOT NULL,
  `passwors` varchar(355) NOT NULL,
  `university_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `university_admin`
--

INSERT INTO `university_admin` (`id`, `login`, `passwors`, `university_id`) VALUES
(1, 'admin_MSU', '12345', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

CREATE TABLE `works` (
  `id` int(10) NOT NULL,
  `description` text NOT NULL,
  `files` text NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `works`
--

INSERT INTO `works` (`id`, `description`, `files`, `student_id`) VALUES
(5, 'Нарисовал человека', 'img/ae1b327e220b4381bf96600e97dbd861.jpg', 8),
(6, 'Нарисовал человека', 'img/ee2dc54c27bab024017f2c096a31b181.jpg', 8),
(7, 'Нарисовал человека', 'img/78daa4ae0f217dbad5b6ee4f31a10a72.jpg', 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `university_admin`
--
ALTER TABLE `university_admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `university_admin`
--
ALTER TABLE `university_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
