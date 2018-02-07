-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 07. Feb 2018 um 09:18
-- Server-Version: 5.7.21-0ubuntu0.16.04.1
-- PHP-Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `series-feed`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `id` int(8) NOT NULL,
  `name` varchar(16) NOT NULL,
  `perm_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `name`, `perm_level`) VALUES
(1, 'Benutzer', 5),
(2, 'Admin', 1),
(4, 'Test', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `producers`
--

CREATE TABLE `producers` (
  `id` int(8) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `producers`
--

INSERT INTO `producers` (`id`, `name`) VALUES
(1, 'AMC'),
(2, 'Warner Bros. Entertainment'),
(3, '20th Century Fox'),
(4, 'Lions Gate Entertainment'),
(5, 'DreamWorks SKG'),
(6, 'Universal Studios'),
(7, 'Columbia Pictures'),
(8, 'Metro-Goldwyn-Mayer'),
(9, 'Paramount Pictures'),
(10, 'Netflix '),
(11, 'CBS Television Studios'),
(12, 'Sony Pictures'),
(13, 'Justin Roiland\'s Solo Vanity'),
(14, 'MTV'),
(15, 'Universal Cable Productions'),
(16, 'Hartswood Film'),
(17, 'BBC'),
(18, 'Matt & Ross Duffer'),
(19, 'David Crane'),
(20, 'Kurt Sutter'),
(21, 'Clair Welland'),
(22, 'ABC'),
(23, 'Eric Falconer'),
(24, 'Carol Trussel'),
(25, 'Sky'),
(26, 'Amazon Studios'),
(27, 'Scott Free Films'),
(28, 'Josh Goldsmith'),
(29, 'Adelstein-Parouse'),
(30, 'Jay Gruska'),
(31, 'Saxonia Media Filmproduktion'),
(32, 'Shane Brennan'),
(33, 'FX Production'),
(34, 'Redseven Entertainment'),
(35, 'ITV Studios'),
(36, 'Super Channel'),
(37, 'Platinum Dunes'),
(38, 'Fox'),
(39, 'Carousel Television'),
(40, 'National Geographic'),
(41, 'Anonymous Content'),
(42, 'FactoryMadeVentures'),
(43, 'Canal+'),
(44, 'Chris Plourde'),
(45, 'Showtime'),
(46, 'Darren Star Productions'),
(47, 'HBO Entertainment'),
(48, 'Marvel Television'),
(49, 'Lucasarts'),
(50, 'Nintendo'),
(51, 'Zeppotron'),
(52, 'Aaron Ehasz'),
(53, 'Robert C. Cooper'),
(54, 'John Wells'),
(55, 'Television 360'),
(56, 'Sonar Entertaiment'),
(57, 'Carnival Films'),
(58, 'Ranchhand Productions'),
(59, 'Jonathan M. Smith'),
(60, 'Shore Z Productions'),
(61, 'George Will Television'),
(62, 'Dimension Television'),
(63, 'Warner Horizon TV'),
(64, 'Steven Hillenberg'),
(65, 'Hofman & Voges Entertaiment'),
(66, 'WilFilm'),
(67, 'Fred De Breadeny');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ratings`
--

CREATE TABLE `ratings` (
  `id` int(8) NOT NULL,
  `seriesid` int(8) NOT NULL,
  `userid` int(8) NOT NULL,
  `stars` int(1) NOT NULL,
  `text` varchar(80) NOT NULL,
  `rating_date` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `ratings`
--

INSERT INTO `ratings` (`id`, `seriesid`, `userid`, `stars`, `text`, `rating_date`) VALUES
(1, 1, 8, 5, 'Sehr spannende Serie, empfehlenswert :D', '1511776619246');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `series_data`
--

CREATE TABLE `series_data` (
  `id` int(8) NOT NULL,
  `name` varchar(64) NOT NULL,
  `producerid` int(8) NOT NULL,
  `seasons` varchar(8) NOT NULL,
  `episodes` varchar(8) NOT NULL,
  `genre` varchar(32) NOT NULL,
  `last_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clicks` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `series_data`
--

INSERT INTO `series_data` (`id`, `name`, `producerid`, `seasons`, `episodes`, `genre`, `last_edit`, `clicks`) VALUES
(1, 'The Walking Dead', 1, '7+', '108+', 'Drama / Horror', '2017-12-21 09:00:48', 12),
(2, 'Star Trek: Discovery', 11, '1', '9+', 'Science-Fiction', '2018-01-06 14:27:35', 1),
(3, 'Narcos', 10, '3+', '30+', 'Drama / Krimi', '2018-01-06 14:27:39', 1),
(4, 'Tote Mädchen lügen nicht', 10, '1+', '13+', 'Drama', '2018-01-06 14:27:42', 3),
(5, 'Breaking Bad', 12, '5', '62', 'Drama / Krimi', '2018-01-06 14:27:45', 1),
(6, 'American Horror Story', 3, '7+', '83+', 'Horror / Thriller', '2017-12-21 08:58:58', 1),
(7, 'Rick & Morty', 13, '3', '31', 'Comedy', '2017-11-16 13:28:47', 0),
(8, 'Scream', 14, '2+', '24', 'Horror / Slasher', '2017-11-16 13:29:30', 0),
(9, 'Sherlock', 16, '4', '13', 'Krimi', '2017-11-16 13:30:27', 0),
(10, 'Suits', 15, '7', '102', 'Dramedy', '2017-11-16 13:31:08', 0),
(11, 'Stranger Things', 10, '2+', '17', 'Science-Fiction / Mystery', '2017-11-16 13:32:22', 0),
(12, 'Riverdale', 11, '2', '18+', 'Drama', '2017-11-16 13:35:05', 0),
(13, 'The Big Bang Theory', 2, '11+', '238+', 'Sitcom', '2017-11-16 13:35:45', 0),
(14, 'Friends', 19, '10', '236', 'Sitcom', '2017-11-16 13:36:18', 0),
(15, 'Sons of Anarchy', 20, '7', '92', 'Drama', '2017-11-16 13:36:45', 0),
(16, 'Orphan Black', 21, '5', '50', 'Thriller / Drama', '2017-11-16 13:37:13', 0),
(17, 'How to get away with murder', 22, '4', '51+', 'Krimi / Drama', '2017-11-16 13:37:44', 0),
(18, 'Blue Mountain State', 23, '3', '39', 'Sportcomedy', '2017-11-16 13:38:22', 0),
(19, 'Hannibal', 24, '3', '39', 'Psychothriller', '2017-11-16 13:38:50', 0),
(20, 'House of Cards', 10, '5+', '65', 'Politthriller', '2017-11-16 13:39:32', 0),
(21, 'Under the Dome', 11, '3', '39', 'Mystery / Drama', '2017-11-17 09:08:40', 0),
(22, 'Vikings', 26, '4', '49+', 'Historisch / Fiktional', '2017-11-17 09:08:40', 0),
(23, 'The Grand Tour', 26, '1+', '13', 'Magazin', '2017-11-17 09:08:40', 0),
(24, 'Taboo', 27, '1+', '8', 'Drama', '2017-11-17 09:08:40', 0),
(25, 'Fear The Walking Dead', 1, '3+', '37', 'Horror / Drama', '2018-01-06 14:27:31', 2),
(26, 'THe Night Manager', 17, '1+', '8', 'Thriller', '2017-11-17 09:14:13', 0),
(27, 'All or Nothing', 26, '2+', '16', 'Sportdoku', '2017-11-17 09:14:13', 0),
(28, 'Hand of God', 6, '2', '20', 'Drama', '2017-11-17 09:14:13', 0),
(29, 'Lucifer', 2, '3', '38+', 'Fantasy', '2017-11-17 09:14:13', 0),
(30, 'The man in the high castle', 26, '2+', '20+', 'Science-Fiction', '2017-11-17 09:14:13', 0),
(31, 'King of Queens', 28, '9', '209', 'Sitcom', '2017-11-17 09:14:13', 0),
(32, 'Family Guy', 3, '16', '295+', 'Comedy / Satire', '2017-11-17 09:14:13', 0),
(33, 'Prison Break', 29, '5', '90', 'Action / Drama', '2017-11-17 09:14:13', 0),
(34, 'Two and a half Men', 2, '12', '262', 'Sitcom', '2017-11-17 09:14:13', 0),
(35, 'Grey\'s Anatomy', 22, '14', '300+', 'Dramedy / Krankenhaus', '2017-11-17 09:15:29', 0),
(36, 'Supernatural', 30, '13', '269+', 'Drama / Mystery', '2017-11-17 09:15:29', 0),
(37, 'In aller Freundschaft', 31, '20', '791+', 'Krankenhaus', '2017-11-17 09:21:01', 0),
(38, 'Lethal Weapon', 2, '2+', '22+', 'Action / Dramedy', '2017-11-17 09:21:01', 0),
(39, 'Two broke Girls', 2, '6', '138', 'Sitcom', '2017-11-17 09:21:01', 0),
(40, 'You are wanted', 2, '1+', '6', 'Thriller', '2017-11-17 09:21:01', 0),
(41, 'The 100', 2, '4+', '58', 'Postapocalypse', '2017-12-21 09:01:13', 2),
(42, 'The Arrangement', 15, '1', '10', 'Drama', '2017-11-17 09:21:01', 0),
(43, 'Quantico', 22, '2+', '44', 'Drama / Thriller', '2017-11-17 09:21:01', 0),
(44, 'Rosewood', 3, '2', '44', 'Krimi', '2017-11-17 09:21:01', 0),
(45, 'Auf Herz und Nieren', 12, '1', '6', 'Dramedy', '2017-11-17 09:21:01', 0),
(46, 'Defiying Gravity', 22, '1', '13', 'Science-Fiction', '2017-11-17 09:21:01', 0),
(47, 'Hawaii Five-0', 11, '8', '174+', 'Action / Krimi', '2017-11-17 09:22:12', 0),
(48, 'NCIS', 32, '15', '335+', 'Krimi', '2017-11-17 09:22:12', 0),
(49, 'Last man on Earth', 3, '4', '51+', 'Comedy / Postapocalypse', '2017-11-17 09:22:56', 0),
(50, 'Criminal Minds', 22, '13', '283+', 'Krimi / Drama', '2017-11-17 09:28:48', 0),
(51, 'Scorpion', 11, '3', '71+', 'Drama / Action', '2017-11-17 09:28:48', 0),
(52, 'American Housewife', 22, '2', '28', 'Comedy', '2017-11-17 09:28:48', 0),
(53, 'The Strain', 33, '4', '46', 'Mystery / Horror', '2017-11-17 09:28:48', 0),
(54, 'Bull', 11, '2', '26', 'Dramedy', '2017-11-17 09:28:48', 0),
(55, 'The Taste', 34, '5', '35+', 'Kochshow', '2017-11-17 09:28:48', 0),
(56, 'Der letzte Bulle', 35, '5', '60', 'Krimi', '2017-11-17 09:28:48', 0),
(57, 'Slasher', 36, '1+', '8', 'Horror', '2017-11-17 09:28:48', 0),
(58, 'Black Sailes', 37, '4', '38', 'Abenteuer', '2017-11-17 09:28:48', 0),
(59, 'Thirteen', 17, '1', '5', 'Drama', '2017-11-17 09:28:48', 0),
(60, 'The X-Files', 38, '10+', '208+', 'Science Fiction', '2017-11-17 09:29:25', 0),
(61, 'American Dad', 38, '13+', '234+', 'Comedy / Satire', '2017-12-21 09:01:58', 16),
(62, 'Angie Triebeca', 39, '3', '30', 'Dramedy', '2017-11-17 09:35:26', 0),
(63, 'Babylon Berlin', 25, '2', '16', 'Drama', '2017-11-17 09:35:26', 0),
(64, 'Tin Star', 25, '2', '20', 'Drama', '2017-11-17 09:35:26', 0),
(65, 'The long road home', 40, '1', '8', 'Militärdrama', '2017-11-17 09:35:26', 0),
(66, 'The good fight', 11, '1+', '10', 'Drama', '2017-11-17 09:35:26', 0),
(67, 'True Detective', 41, '2+', '16', 'Krimi / Mystery', '2017-11-17 09:35:26', 0),
(68, 'The Fall - Tod in Bellfast', 17, '3+', '16', 'Drama / Krimi', '2017-11-17 09:35:26', 0),
(69, 'The state', 40, '1', '4', 'Drama', '2017-11-17 09:35:26', 0),
(70, 'From Dust till Dawn', 42, '3', '30', 'Horror / Drama', '2017-11-17 09:35:26', 0),
(71, 'Colony', 15, '2', '23+', 'Science-Fiction / Drama', '2017-11-17 09:42:09', 0),
(72, 'Büro der Legenden', 43, '3+', '30+', 'Drama / Krimi', '2017-11-17 09:42:09', 0),
(73, 'Shooter', 9, '2', '18', 'Drama / Action', '2017-11-17 09:42:09', 0),
(74, 'Dice', 44, '1', '6', 'Sitcom', '2017-11-17 09:42:09', 0),
(75, 'White famous', 45, '1', '4', 'Comedy', '2017-11-17 09:42:09', 0),
(76, 'Madame Secretary', 11, '3+', '68', 'Drama', '2017-11-17 09:42:09', 0),
(77, 'Younger', 46, '3+', '24', 'Comedy / Drama', '2017-11-17 09:42:09', 0),
(78, 'Vice Principals', 47, '2', '18', 'Comedy', '2017-11-17 09:42:09', 0),
(79, 'Marvel\'s Agents of S.H.I.E.L.D.', 48, '4+', '88', 'Action / Science-Fiction', '2017-11-17 09:42:09', 0),
(80, 'Die Sopranos', 47, '6', '86', 'Drama / Mafia', '2017-11-17 09:42:09', 0),
(81, 'Star Wars - The Clone Wars', 49, '6', '121+', 'Cartoon / Science Fiction', '2017-11-20 08:41:13', 0),
(82, 'Pokémon', 50, '20', '990+', 'Abenteuer', '2017-11-20 08:41:13', 0),
(83, 'Black Mirror', 51, '3+', '13+', 'Thriller / Horror', '2017-11-20 08:42:33', 0),
(84, 'Avatar - Der Herr der Elemente', 52, '3', '61', 'Abenteuer / Fantasy', '2017-11-20 08:42:33', 0),
(85, 'Lie to me', 38, '3', '48', 'Drama / Krimi', '2017-11-20 08:46:20', 0),
(86, 'Preacher', 12, '2', '23', 'Drama', '2017-11-20 08:46:20', 0),
(87, 'Mr. Robot', 41, '3', '28+', 'Thriller / Drama', '2017-11-20 08:48:07', 0),
(88, 'Lost', 22, '6', '121', 'Abenteuer / Action', '2017-11-20 08:48:07', 0),
(89, 'Stargate Atlantis', 53, '5', '100', 'Science-Fiction', '2017-11-20 08:50:30', 0),
(90, 'Forever', 2, '1', '22', 'Fantasy / Krimi', '2017-11-20 08:50:30', 0),
(91, 'Shameless', 54, '7+', '84', 'Dramedy', '2017-11-20 08:51:25', 0),
(92, 'Game of Thrones', 55, '7+', '67', 'Fantasy / Drama', '2017-11-20 08:51:25', 0),
(93, 'Shannara Chronicles', 56, '2', '18+', 'Fantasy / Endzeit', '2017-11-20 08:52:44', 0),
(94, 'Downton Abbey', 57, '6', '52', 'Historiendrama', '2017-11-20 08:52:44', 0),
(95, 'Californication', 45, '7', '86', 'Dramedy', '2017-11-20 08:53:41', 0),
(96, 'The Ranch', 58, '2', '30+', 'Sitcom', '2017-11-20 08:53:41', 0),
(97, 'H2O Plötzlich Meerjungfrau', 59, '3', '78', 'Drama / Fantasy', '2017-11-20 08:54:45', 0),
(98, 'Vampire Diaries', 2, '8', '171', 'Drama / Fantasy', '2017-11-20 08:54:45', 0),
(99, 'Sneaky Pete', 60, '1+', '10', 'Krimi / Drama', '2017-11-20 08:55:36', 0),
(100, 'Gossip Girl', 11, '6', '121', 'Drama', '2017-11-20 08:55:36', 0),
(101, 'Sense8', 61, '2', '23+', 'Drama / Science-Fiction', '2017-11-20 08:56:39', 0),
(102, 'Der Nebel', 62, '1', '10', 'Mystery / Science-Fiction', '2017-11-20 08:56:39', 0),
(103, 'Fringe - Grenzfälle des FBI', 2, '5', '100', 'Abenteuer / Mystery', '2017-11-20 08:58:30', 0),
(104, 'Pretty little Liars', 63, '7', '160', 'Drama / Mystery', '2017-11-20 08:58:30', 0),
(105, 'SpongeBob Schwammkopf', 64, '11+', '428+', 'Comedy / Slapstick', '2017-11-20 09:00:21', 0),
(106, 'Türkisch für Anfänger', 65, '3', '52', 'Comedy', '2017-11-20 09:00:21', 0),
(107, 'Lego Ninjago', 66, '7+', '88', 'Animationsserie', '2017-11-20 09:01:06', 0),
(108, 'Young Sheldon', 2, '1', '4', 'Comedy', '2017-11-20 09:01:06', 0),
(109, 'Bob der Baumeister', 67, '20', '355+', 'Animationsserie', '2017-11-20 09:02:03', 0),
(110, 'The OA', 10, '1+', '8', 'Mystery / Drama', '2017-11-20 09:02:03', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `series_on_services`
--

CREATE TABLE `series_on_services` (
  `serviceid` int(8) NOT NULL,
  `seriesid` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `series_on_services`
--

INSERT INTO `series_on_services` (`serviceid`, `seriesid`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(1, 1),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(4, 61),
(4, 62),
(4, 63),
(4, 64),
(4, 65),
(4, 66),
(4, 67),
(4, 68),
(4, 69),
(4, 70),
(4, 71),
(4, 72),
(4, 73),
(4, 74),
(4, 75),
(4, 76),
(4, 77),
(4, 78),
(4, 79),
(4, 80),
(1, 81),
(1, 82),
(1, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(3, 92),
(2, 93),
(2, 94),
(1, 95),
(1, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(1, 101),
(1, 102),
(2, 103),
(1, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(1, 110);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `streaming_services`
--

CREATE TABLE `streaming_services` (
  `id` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `website_link` varchar(64) NOT NULL,
  `price_string` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `streaming_services`
--

INSERT INTO `streaming_services` (`id`, `name`, `website_link`, `price_string`) VALUES
(1, 'Netflix', 'https://www.netflix.com/de/', 'ab 7,99€ / Monat'),
(2, 'Amazon Prime Video', 'https://www.amazon.de/Prime-Video/b?ie=UTF8&node=3279204031', 'ab 8,99€ / Monat'),
(3, 'Maxdome', 'https://www.maxdome.de/', 'ab 7,99€ / Monat'),
(4, 'Sky Ticket', 'https://skyticket.sky.de/', 'ab 1,00€ / Monat');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `account_status` int(8) NOT NULL,
  `group_id` int(8) NOT NULL,
  `last_login` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `account_status`, `group_id`, `last_login`) VALUES
(2, 'felixk', '2a5fc0f1fd5a33bd6d1424043da53ed7', 'legoinsel2@gmail.com', 1, 2, '1511117543516'),
(7, 'felixj', 'db3a03992de2012b644ca357f5de6384', 'fcjfb@junger-dettenhausen.de', 1, 2, '1511205647484'),
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.de', 1, 2, '1517912433277'),
(9, 'march', '4544de663aeeb00d41bb54fa775cb7c7', 'marc.hoermann@gmx.de', 1, 2, '1516955612019');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seriesid` (`seriesid`),
  ADD KEY `userid` (`userid`);

--
-- Indizes für die Tabelle `series_data`
--
ALTER TABLE `series_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producerid` (`producerid`);

--
-- Indizes für die Tabelle `series_on_services`
--
ALTER TABLE `series_on_services`
  ADD KEY `serviceid` (`serviceid`),
  ADD KEY `seriesid` (`seriesid`);

--
-- Indizes für die Tabelle `streaming_services`
--
ALTER TABLE `streaming_services`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT für Tabelle `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `series_data`
--
ALTER TABLE `series_data`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT für Tabelle `streaming_services`
--
ALTER TABLE `streaming_services`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`seriesid`) REFERENCES `series_data` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `series_data`
--
ALTER TABLE `series_data`
  ADD CONSTRAINT `series_data_ibfk_1` FOREIGN KEY (`producerid`) REFERENCES `producers` (`id`);

--
-- Constraints der Tabelle `series_on_services`
--
ALTER TABLE `series_on_services`
  ADD CONSTRAINT `series_on_services_ibfk_1` FOREIGN KEY (`serviceid`) REFERENCES `streaming_services` (`id`),
  ADD CONSTRAINT `series_on_services_ibfk_2` FOREIGN KEY (`seriesid`) REFERENCES `series_data` (`id`);

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
