--
-- База данных: `code-php`
--
CREATE DATABASE `code-php`; 
Use `code-php`;
-- --------------------------------------------------------

--
-- Структура таблицы `authorized`
--

CREATE TABLE `authorized` (
  `id` int(12) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `authorized`
--

INSERT INTO `authorized` (`id`, `login`, `password`) VALUES
(1, 'boka', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authorized`
--
ALTER TABLE `authorized`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authorized`
--
ALTER TABLE `authorized`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;