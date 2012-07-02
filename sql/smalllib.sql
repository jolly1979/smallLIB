-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Jul 2012 um 23:02
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `smalllib`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `access_components`
--

CREATE TABLE IF NOT EXISTS `access_components` (
  `com_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `access_components`
--

INSERT INTO `access_components` (`com_id`, `access_id`) VALUES
(2, 5),
(3, 5),
(5, 3),
(6, 5),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 3),
(19, 3),
(21, 3),
(22, 3),
(23, 3),
(25, 3),
(26, 3),
(27, 6),
(28, 3),
(29, 3),
(30, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `access_libraries`
--

CREATE TABLE IF NOT EXISTS `access_libraries` (
  `access_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `access_libraries`
--

INSERT INTO `access_libraries` (`access_id`, `library_id`) VALUES
(3, 18),
(3, 19),
(1, 20),
(4, 21),
(4, 22);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `access_list`
--

CREATE TABLE IF NOT EXISTS `access_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `accesslevel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `access_list`
--

INSERT INTO `access_list` (`id`, `name`, `accesslevel`) VALUES
(1, 'Admin', 0),
(2, 'Verwalter', 5),
(3, 'Bibliothekar', 10),
(4, 'Ausleiher', 15),
(5, 'Gast', 1000),
(6, 'Registriert', 999);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `access_modules`
--

CREATE TABLE IF NOT EXISTS `access_modules` (
  `modules_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `access_modules`
--

INSERT INTO `access_modules` (`modules_id`, `access_id`) VALUES
(1, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `access_newscat`
--

CREATE TABLE IF NOT EXISTS `access_newscat` (
  `newscat_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `access_newscat`
--

INSERT INTO `access_newscat` (`newscat_id`, `access_id`) VALUES
(7, 1),
(8, 6),
(9, 5),
(10, 6),
(11, 1),
(0, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `access_user`
--

CREATE TABLE IF NOT EXISTS `access_user` (
  `user_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `access_user`
--

INSERT INTO `access_user` (`user_id`, `access_id`) VALUES
(0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `borrower`
--

CREATE TABLE IF NOT EXISTS `borrower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone_mobile` varchar(100) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `borrower`
--

INSERT INTO `borrower` (`id`, `user_id`, `name`, `email`, `phone`, `phone_mobile`, `info`) VALUES
(3, 9, 'Jolly Jumper', 'jolly@gothgallery.de', '', '', ''),
(4, 9, 'Danny Graupner', 'danny@graupner-kuesel.de', '', '', ''),
(5, 9, 'Trämmler', 'insultax@aol.com', '', '', ''),
(6, 9, 'Han Solo', 'han@graupner-kuesel.de', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `components`
--

CREATE TABLE IF NOT EXISTS `components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `info` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Daten für Tabelle `components`
--

INSERT INTO `components` (`id`, `name`, `info`) VALUES
(2, 'news', 'News-Skript'),
(3, 'impressum', 'Impressum'),
(5, 'news_insert', 'News einstellen'),
(6, 'register', 'Registrierungsskript'),
(7, 'admin', 'Admin-Startskript'),
(8, 'admin_user_rights', 'Nutzerverwaltung'),
(9, 'admin_access_edit', 'Rollenverwaltung'),
(10, 'admin_modules_edit', 'Modulverwaltung'),
(14, 'admin_newscat_edit', 'Newskategorieverwaltung'),
(15, 'admin_parameter_edit', 'Parameterverwaltung'),
(16, 'admin_navigation_edit', 'Navigationsverwaltung'),
(17, 'admin_components_edit', 'Komponentenverwaltung'),
(18, 'news_edit', 'News bearbeiten'),
(19, 'news_del', 'News lÃ¶schen'),
(21, 'library_mgt', 'Bibliothekenverwaltung Startskript'),
(22, 'library_mgt_add', 'Bibliothek hinzufÃ¼gen'),
(23, 'library_mgt_edit', 'Bibliotheken bearbeiten'),
(25, 'library_mgt_del', 'Bibliothek lÃ¶schen'),
(26, 'library_mgt_loc', 'Bibliotheksstruktur'),
(27, 'profile', 'Profilverwaltung'),
(28, 'library_mgt_borrower', 'Ausleiherliste'),
(29, 'item_mgt', 'Artikelverwaltung Startskript'),
(30, 'item_mgt_add', 'Artikel hinzufÃ¼gen'),
(32, 'item_mgt_add_ean', 'Artikelsuche via Amazon; nicht direkt ansprechen'),
(33, 'item_mgt_edit', 'Artikel verwalten'),
(34, 'item_mgt_edit_del', 'Artikel lÃ¶schen; nicht direkt ansprechen'),
(35, 'item_mgt_edit_edit', 'Artikel bearbeiten; nicht direkt ansprechen'),
(36, 'item_mgt_edit_loc', 'Artikel bewegen; nicht direkt ansprechen'),
(37, 'item_mgt_list', 'ArtikelÃ¼bersicht');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(64) NOT NULL,
  `value` varchar(64) DEFAULT NULL,
  `info` varchar(255) NOT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `config`
--

INSERT INTO `config` (`id`, `parameter`, `value`, `info`, `del`) VALUES
(1, 'active_template', '1', 'aktives Template', 0),
(2, 'head_title', 'Seitenname', 'Titel fÃ¼r die Seite', 0),
(3, 'footer', 'smallLIB 0.1 (C) 2012', 'Footertext', 0),
(4, 'language', 'germani.php', 'Sprachfile', 0),
(6, 'news_count', '50', 'Anzahl der angezeigten News', 0),
(7, 'amazon_secret_access_key', 'selbst eintragen', '', 0),
(8, 'amazon_access_key_id', 'selbst eintragen', '', 0),
(9, 'amazon_associate_id', 'selbst eintragen', '', 0),
(10, 'subdir', '', 'Seite in einem Unterverzeichnis von DOCROOT', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `area_code` varchar(10) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `countries`
--

INSERT INTO `countries` (`id`, `name`, `area_code`, `country_code`) VALUES
(1, 'Deutschland', '+49', 'DE'),
(2, '&Ouml;sterreich', '+43', 'AT');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `rack_id` int(11) NOT NULL,
  `index_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DetailPageURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ean` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `owncode` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Publisher` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Binding` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PublicationDate` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Feature` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Pages` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Edition` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `Currency` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ShortDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fullsearch` (`Title`,`isbn`,`asin`,`ean`,`owncode`,`Author`,`Creator`,`Label`,`Publisher`,`Binding`,`Feature`,`Edition`,`Keywords`,`ShortDescription`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_cat`
--

CREATE TABLE IF NOT EXISTS `item_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `searchindex` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `item_cat`
--

INSERT INTO `item_cat` (`id`, `searchindex`, `name`) VALUES
(1, 'Books', 'B&uuml;cher'),
(2, 'DVD', 'DVD'),
(3, 'Music', 'Musik'),
(4, 'Toys', 'Spielwaren'),
(5, 'OutdoorLiving', 'Hobby &amp; Freizeit'),
(6, 'Software', 'Software'),
(7, 'Tools', 'Werkzeug'),
(8, 'SoftwareVideoGames', 'Video &amp; PC Spiele'),
(9, 'HomeGarden', 'Haus &amp; Garten'),
(10, 'Kitchen', 'Haushalt'),
(11, 'Photo', 'Fotografie'),
(12, 'Electronics', 'Elektronik'),
(13, 'All', 'Alle Kategorien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `libraries`
--

CREATE TABLE IF NOT EXISTS `libraries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `created` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_no` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `phone_mobile` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lib_floor`
--

CREATE TABLE IF NOT EXISTS `lib_floor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lib_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lib_rack`
--

CREATE TABLE IF NOT EXISTS `lib_rack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lib_room`
--

CREATE TABLE IF NOT EXISTS `lib_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `info` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `modules`
--

INSERT INTO `modules` (`id`, `name`, `info`) VALUES
(1, 'navigation', 'Stellt das Navigations-Skript'),
(4, 'login', 'Stellt das Login-Skript');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `parent` int(11) NOT NULL,
  `prio` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Daten für Tabelle `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`, `parent`, `prio`, `access_id`, `active`) VALUES
(1, 'Start', '?com=news', 0, 0, 5, 1),
(2, 'News eintragen', '?com=news_insert', 1, 1, 3, 1),
(3, 'Impressum', '?com=impressum', 0, 3, 5, 1),
(4, 'Administration', '?com=admin', 0, 10, 1, 1),
(5, 'Nutzer bearbeiten', '?com=admin_user_rights', 4, 40, 1, 1),
(6, 'Rollen bearbeiten', '?com=admin_access_edit', 4, 43, 1, 1),
(7, 'Module bearbeiten', '?com=admin_modules_edit', 4, 45, 1, 1),
(8, 'Newskategorien bearbeiten', '?com=admin_newscat_edit', 1, 4, 1, 1),
(9, 'Parameter bearbeiten', '?com=admin_parameter_edit', 4, 46, 1, 1),
(10, 'Navigation bearbeiten', '?com=admin_navigation_edit', 4, 42, 1, 1),
(11, 'Komponenten bearbeiten', '?com=admin_components_edit', 4, 44, 1, 1),
(12, 'Bibliotheksverwaltung', '?com=library_mgt', 0, 9, 3, 1),
(13, 'HinzufÃ¼gen', '?com=library_mgt_add', 12, 1, 3, 1),
(14, 'Bearbeiten', '?com=library_mgt_edit', 12, 2, 3, 1),
(15, 'LÃ¶schen', '?com=library_mgt_del', 12, 5, 3, 1),
(17, 'Lagerstruktur', '?com=library_mgt_loc', 12, 7, 3, 1),
(18, 'Profil', '?com=profile', 0, 1, 6, 1),
(19, 'Ausleiherliste', '?com=library_mgt_borrower', 12, 9, 3, 1),
(20, 'Artikelverwaltung', '?com=item_mgt', 0, 7, 3, 1),
(22, 'Artikel hinzufÃ¼gen', '?com=item_mgt_add', 20, 1, 3, 1),
(23, 'Artikel verwalten', '?com=item_mgt_edit', 20, 5, 3, 1),
(24, 'ArtikelÃ¼bersicht', '?com=item_mgt_list', 20, 10, 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `text`, `date`) VALUES
(28, 0, 'Neue Bibliothek erstellt: Neue Bibliothek...', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Danny Graupner (danny)</p>', '2012-05-06 23:43:06'),
(29, 0, 'Neue Bibliothek erstellt: Neue Bibliothek...', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Danny Graupner (danny)</p>', '2012-05-06 23:47:24'),
(31, 0, 'Neue Bibliothek erstellt: Neue Bibliothek...', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Danny Graupner (danny)</p>', '2012-05-06 23:49:14'),
(35, 0, 'Eine Bibliothek wurde gelöscht.', '<p>Folgende Bibliothek wurde gelöscht: Neue Bibliothek...</p>', '2012-05-12 17:33:23'),
(42, 0, 'Neue Bibliothek erstellt: ANA', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Danny Graupner (danny)</p>', '2012-05-12 17:41:22'),
(43, 0, 'Neuer Benutzer registriert.', '<p>Folgender Benutzer hat sich neu angemeldet: Tr&auml;mmler (Zauberfee)</p>', '2012-05-13 19:04:42'),
(44, 0, 'Neue Bibliothek erstellt: Jan', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Tr&auml;mmler (Zauberfee)</p>', '2012-05-13 19:07:23'),
(45, 0, 'Neue Bibliothek erstellt: Hamburg', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Danny Graupner (danny)</p>', '2012-05-23 21:55:06'),
(46, 0, 'Neue Bibliothek erstellt: Neue Bibliothek...', '<p>Folgender Benutzer hat eine neue Bibliothek erstellt: Jolly Jumper (jolly)</p>', '2012-06-17 15:35:19'),
(47, 0, 'Eine Bibliothek wurde gel&ouml;scht.', '<p>Folgende Bibliothek wurde gel&ouml;scht: Neue Bibliothek...</p>', '2012-06-17 17:41:02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news_2_cat`
--

CREATE TABLE IF NOT EXISTS `news_2_cat` (
  `cat_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `news_2_cat`
--

INSERT INTO `news_2_cat` (`cat_id`, `news_id`) VALUES
(0, 16),
(0, 18),
(0, 19),
(0, 20),
(0, 18),
(0, 19),
(0, 43),
(0, 44),
(0, 45),
(0, 46),
(0, 47);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news_cat`
--

CREATE TABLE IF NOT EXISTS `news_cat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dir` varchar(64) NOT NULL,
  `startfile` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `templates`
--

INSERT INTO `templates` (`id`, `name`, `dir`, `startfile`) VALUES
(1, 'Default', 'default', 'index.tpl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `realname` varchar(100) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_no` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone_mobile` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `realname`, `street`, `street_no`, `country_id`, `zip`, `city`, `phone`, `phone_mobile`, `fax`, `info`) VALUES
(0, 'System', '40f7ee684ba8f871f50005a7feb83935', 'system@localhost', 'SYSTEM', '', '', 0, '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
