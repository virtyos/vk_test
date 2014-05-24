-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 24 2014 г., 13:56
-- Версия сервера: 5.1.40-community
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pixel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pixel_site`
--

CREATE TABLE IF NOT EXISTS `pixel_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `look_depth` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `pixel_site`
--

INSERT INTO `pixel_site` (`id`, `url`, `look_depth`) VALUES
(1, 'www.anonsus.com', 0),
(2, 'aqda', 0),
(3, 'sadasda', 0),
(4, 'sfs', 0),
(5, 'sadas', 0),
(6, 'fdsfds', 0),
(7, 'http://vk.com', 0),
(8, 'http://111.ru', 0),
(9, 'http://vk1.com', 0),
(10, 'http://findaflat11.ru', 0),
(11, 'http://findaflat1ww1.ru', 0),
(12, 'http://findwwaflat11.ru', 0),
(13, 'http://findasdflat11.ru', 0),
(14, 'http://1sds11.ru', 0),
(15, 'http://1sssds11.ru', 2),
(16, 'http://findssaflat1ww1.ru', 0),
(17, 'http://1dd11.ru', 0),
(18, 'http://anonsus.dev', 0),
(19, 'http://rambler.ru', 0),
(20, 'http://yandex.ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pixel_stat_site`
--

CREATE TABLE IF NOT EXISTS `pixel_stat_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_site` int(11) NOT NULL,
  `date_visit` date NOT NULL,
  `count_visit` int(11) NOT NULL,
  `count_interest_visits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_site` (`id_site`,`date_visit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `pixel_stat_site`
--

INSERT INTO `pixel_stat_site` (`id`, `id_site`, `date_visit`, `count_visit`, `count_interest_visits`) VALUES
(2, 15, '2014-05-23', 1, 0),
(12, 15, '2014-05-24', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pixel_stat_user`
--

CREATE TABLE IF NOT EXISTS `pixel_stat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `date_visit` date NOT NULL,
  `count_visit` int(11) NOT NULL,
  `is_interest` tinyint(4) NOT NULL,
  `site_pages` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`date_visit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `pixel_stat_user`
--

INSERT INTO `pixel_stat_user` (`id`, `id_user`, `id_site`, `date_visit`, `count_visit`, `is_interest`, `site_pages`) VALUES
(2, 2, 15, '2014-05-23', 39, 0, ''),
(7, 2, 15, '2014-05-24', 13, 1, '["http:\\/\\/vk_test\\/test.html"]');

-- --------------------------------------------------------

--
-- Структура таблицы `pixel_user`
--

CREATE TABLE IF NOT EXISTS `pixel_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`,`user_agent`),
  KEY `ip_2` (`ip`,`user_agent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `pixel_user`
--

INSERT INTO `pixel_user` (`id`, `ip`, `user_agent`) VALUES
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
