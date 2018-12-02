-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 02 2018 г., 17:25
-- Версия сервера: 8.0.12
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `horoscope`
--

DELIMITER $$
--
-- Функции
--
CREATE DEFINER=`root`@`localhost` FUNCTION `beetween_date` (`curr_date` TEXT, `beg_date` TEXT, `end_date` TEXT) RETURNS TINYINT(1) NO SQL
BEGIN
	set curr_date = RIGHT(curr_date,5);
    if beg_date>end_date then
    	if end_date<curr_date THEN
        	if beg_date>curr_date THEN
            	return false;
            ELSE
            	return true;
            end if;
        ELSE
        	return true;
        end if;
   	elseif beg_date<end_date then
    	if end_date<curr_date THEN
        	return false;
        ELSE   
        	if beg_date>curr_date THEN
            	return false;
            ELSE
            	return true;
            end if;
        end if;
    ELSE
    	return false;
    end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `prediction`
--

CREATE TABLE `prediction` (
  `d_date` date NOT NULL,
  `i_zodiac_id` int(11) NOT NULL DEFAULT '1',
  `t_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prediction`
--

INSERT INTO `prediction` (`d_date`, `i_zodiac_id`, `t_text`) VALUES
('2018-11-25', 1, 'text-2018-11-25'),
('2018-11-26', 1, 'text-2018-11-26'),
('2018-11-27', 1, 'text-2018-11-27'),
('2018-11-28', 1, 'text-2018-11-28'),
('2018-11-29', 1, 'text-2018-11-29'),
('2018-11-30', 1, 'text-2018-11-30'),
('2018-12-01', 1, 'text_2018-12-01'),
('2018-12-02', 1, 'text_2018-12-02'),
('2018-12-03', 1, 'text_2018-12-03'),
('2018-12-04', 1, 'text_2018-12-04'),
('2018-12-05', 1, 'text_2018-12-05'),
('2018-12-06', 1, 'text_2018-12-06'),
('2018-12-07', 1, 'text_2018-12-07'),
('2018-12-08', 1, 'text_2018-12-08'),
('2018-12-09', 1, 'text_2018-12-09'),
('2018-12-10', 1, 'text_2018-12-10'),
('2018-12-11', 1, 'text_2018-12-11'),
('2018-12-12', 1, 'text_2018-12-12'),
('2018-12-13', 1, 'text_2018-12-13'),
('2018-12-14', 1, 'text_2018-12-14'),
('2018-12-15', 1, 'text_2018-12-15'),
('2018-12-16', 1, 'text_2018-12-16'),
('2018-12-17', 1, 'text_2018-12-17'),
('2018-12-18', 1, 'text_2018-12-18'),
('2018-12-19', 1, 'text_2018-12-19'),
('2018-12-20', 1, 'text_2018-12-20'),
('2018-12-21', 1, 'text_2018-12-21'),
('2018-12-22', 1, 'text_2018-12-22'),
('2018-12-23', 1, 'text_2018-12-23'),
('2018-12-24', 1, 'text_2018-12-24'),
('2018-12-25', 1, 'text_2018-12-25'),
('2018-12-26', 1, 'text_2018-12-26'),
('2018-12-27', 1, 'text_2018-12-27'),
('2018-12-28', 1, 'text_2018-12-28'),
('2018-12-29', 1, 'text_2018-12-29'),
('2018-12-30', 1, 'text_2018-12-30'),
('2018-12-31', 1, 'text_2018-12-31'),
('2019-01-01', 1, 'text_2019-01-01'),
('2019-01-02', 1, 'text_2019-01-02'),
('2019-01-03', 1, 'text_2019-01-03'),
('2019-01-04', 1, 'text_2019-01-04'),
('2019-01-05', 1, 'text_2019-01-05'),
('2019-01-06', 1, 'text_2019-01-06'),
('2019-01-07', 1, 'text_2019-01-07'),
('2019-01-08', 1, 'text_2019-01-08'),
('2019-01-09', 1, 'text_2019-01-09'),
('2019-01-10', 1, 'text_2019-01-10'),
('2019-01-11', 1, 'text_2019-01-11'),
('2019-01-12', 1, 'text_2019-01-12'),
('2019-01-13', 1, 'text_2019-01-13'),
('2019-01-14', 1, 'text_2019-01-14'),
('2019-01-15', 1, 'text_2019-01-15'),
('2019-01-16', 1, 'text_2019-01-16'),
('2019-01-17', 1, 'text_2019-01-17'),
('2019-01-18', 1, 'text_2019-01-18'),
('2019-01-19', 1, 'text_2019-01-19'),
('2019-01-20', 1, 'text_2019-01-20'),
('2019-01-21', 1, 'text_2019-01-21'),
('2019-01-22', 1, 'text_2019-01-22'),
('2019-01-23', 1, 'text_2019-01-23'),
('2019-01-24', 1, 'text_2019-01-24'),
('2019-01-25', 1, 'text_2019-01-25'),
('2019-01-26', 1, 'text_2019-01-26'),
('2019-01-27', 1, 'text_2019-01-27'),
('2019-01-28', 1, 'text_2019-01-28'),
('2019-01-29', 1, 'text_2019-01-29'),
('2019-01-30', 1, 'text_2019-01-30'),
('2019-01-31', 1, 'text_2019-01-31'),
('2019-02-01', 1, 'text_2019-02-01'),
('2019-02-02', 1, 'text_2019-02-02'),
('2019-02-03', 1, 'text_2019-02-03'),
('2019-02-04', 1, 'text_2019-02-04'),
('2019-02-05', 1, 'text_2019-02-05'),
('2019-02-06', 1, 'text_2019-02-06'),
('2019-02-07', 1, 'text_2019-02-07'),
('2019-02-08', 1, 'text_2019-02-08');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `i_id` int(11) NOT NULL,
  `s_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`i_id`, `s_login`) VALUES
(1, 'login_1'),
(10, 'login_10'),
(11, 'login_11'),
(12, 'login_12'),
(13, 'login_13'),
(14, 'login_14'),
(15, 'login_15'),
(16, 'login_16'),
(17, 'login_17'),
(18, 'login_18'),
(19, 'login_19'),
(2, 'login_2'),
(20, 'login_20'),
(21, 'login_21'),
(22, 'login_22'),
(23, 'login_23'),
(24, 'login_24'),
(25, 'login_25'),
(26, 'login_26'),
(27, 'login_27'),
(28, 'login_28'),
(29, 'login_29'),
(3, 'login_3'),
(30, 'login_30'),
(31, 'login_31'),
(32, 'login_32'),
(33, 'login_33'),
(34, 'login_34'),
(35, 'login_35'),
(36, 'login_36'),
(37, 'login_37'),
(38, 'login_38'),
(39, 'login_39'),
(4, 'login_4'),
(40, 'login_40'),
(41, 'login_41'),
(42, 'login_42'),
(43, 'login_43'),
(44, 'login_44'),
(45, 'login_45'),
(5, 'login_5'),
(6, 'login_6'),
(7, 'login_7'),
(8, 'login_8'),
(9, 'login_9');

-- --------------------------------------------------------

--
-- Структура таблицы `user_field`
--

CREATE TABLE `user_field` (
  `i_id` int(11) NOT NULL,
  `s_field_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_field`
--

INSERT INTO `user_field` (`i_id`, `s_field_path`) VALUES
(1, 'birth_date');

-- --------------------------------------------------------

--
-- Структура таблицы `user_field_value`
--

CREATE TABLE `user_field_value` (
  `i_fld_id` int(11) NOT NULL,
  `i_user_id` int(11) NOT NULL,
  `t_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_field_value`
--

INSERT INTO `user_field_value` (`i_fld_id`, `i_user_id`, `t_value`) VALUES
(1, 1, '1920-01-19'),
(1, 2, '198001-13'),
(1, 3, '198901-09'),
(1, 4, '1991-12-11'),
(1, 5, '1965-08-17'),
(1, 6, '1920-01-20'),
(1, 7, '1920-01-21'),
(1, 8, '1920-12-22'),
(1, 9, '1920-12-23'),
(1, 10, '1920-01-24'),
(1, 11, '1920-01-25'),
(1, 12, '1920-01-26'),
(1, 13, '1920-01-27'),
(1, 14, '1920-01-28'),
(1, 15, '1990-12-29'),
(1, 16, '1990-12-30'),
(1, 17, '1990-12-31'),
(1, 18, '1990-01-01'),
(1, 19, '1990-01-02'),
(1, 20, '1990-01-03'),
(1, 21, '1990-01-04'),
(1, 22, '199001-06'),
(1, 23, '199001-06'),
(1, 24, '199001-06'),
(1, 25, '199001-05'),
(1, 26, '199001-07'),
(1, 27, '1990-01-08'),
(1, 28, '1990-01-09'),
(1, 29, '1990-01-10'),
(1, 30, '1990-01-15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `prediction`
--
ALTER TABLE `prediction`
  ADD UNIQUE KEY `d_date` (`d_date`,`i_zodiac_id`) USING BTREE;

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `s_login` (`s_login`);

--
-- Индексы таблицы `user_field`
--
ALTER TABLE `user_field`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `s_field_path` (`s_field_path`);

--
-- Индексы таблицы `user_field_value`
--
ALTER TABLE `user_field_value`
  ADD PRIMARY KEY (`i_fld_id`,`i_user_id`),
  ADD KEY `i_user_id` (`i_user_id`);
ALTER TABLE `user_field_value` ADD FULLTEXT KEY `t_value` (`t_value`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `user_field`
--
ALTER TABLE `user_field`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_field_value`
--
ALTER TABLE `user_field_value`
  ADD CONSTRAINT `user_field_value_ibfk_1` FOREIGN KEY (`i_fld_id`) REFERENCES `user_field` (`i_id`),
  ADD CONSTRAINT `user_field_value_ibfk_2` FOREIGN KEY (`i_user_id`) REFERENCES `user` (`i_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
