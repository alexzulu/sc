-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 11 2017 г., 12:39
-- Версия сервера: 5.5.24
-- Версия PHP: 5.3.10-1ubuntu3.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `service_centre`
--

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'SONY'),
(2, 'Lenovo'),
(4, 'Samsung');

-- --------------------------------------------------------

--
-- Структура таблицы `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` char(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `devices`
--

INSERT INTO `devices` (`id`, `type`) VALUES
(1, 'Телефон'),
(2, 'Ноутбук'),
(3, 'Планшет'),
(4, 'Компьютер');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL DEFAULT '1000',
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `remonter` text COLLATE utf8_unicode_ci NOT NULL,
  `device` text COLLATE utf8_unicode_ci NOT NULL,
  `firm` text COLLATE utf8_unicode_ci NOT NULL,
  `model` text COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` text COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `equipment` text COLLATE utf8_unicode_ci NOT NULL,
  `client_name` text COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `client_addres` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `expenses` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `date_in`, `date_out`, `remonter`, `device`, `firm`, `model`, `serial_number`, `reason`, `equipment`, `client_name`, `client_phone`, `client_addres`, `notes`, `expenses`, `cost`) VALUES
(1000, 'Принят', '2017-09-07', '0000-00-00', '', 'Телефон', 'Fly', 'IQ4502 Quad', 'RLIQ4502GK0036259', 'Не заряжается', 'Батарея', 'Алексей', '+7(928)379-34-68', '', 'Возможно умер контроллер заряда', 0, 0),
(1001, 'Принят', '2017-09-07', '0000-00-00', '', 'Ноутбук', 'Lenovo', 'B590', '1234567890', 'Не загружается', 'Зарядка, батарея', 'Виктор', '', '', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
