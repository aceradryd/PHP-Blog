-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 19. Mrz 2018 um 21:21
-- Server Version: 5.5.59-0+deb8u1
-- PHP-Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `uni`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id` int(11) NOT NULL,
  `titel` text CHARACTER SET latin1,
  `inhalt` text CHARACTER SET latin1,
  `date` datetime DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`id`, `titel`, `inhalt`, `date`, `autor_id`) VALUES
(1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.', '2018-01-07 17:32:03', 1),
(3, 'Kafka', 'Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas Böses getan hätte, wurde er eines Morgens verhaftet. »Wie ein Hund!« sagte er, es war, als sollte die Scham ihn überleben. Als Gregor Samsa eines Morgens aus unruhigen Träumen erwachte, fand er sich in seinem Bett zu einem ungeheueren Ungeziefer verwandelt. Und es war ihnen wie eine Bestätigung ihrer neuen Träume und guten Absichten, als am Ziele ihrer Fahrt die Tochter als erste sich erhob und ihren jungen Körper dehnte. »Es ist ein eigentümlicher Apparat«, sagte der Offizier zu dem Forschungsreisenden und überblickte mit einem gewissermaßen bewundernden Blick den ihm doch wohlbekannten Apparat. Sie hätten noch ins Boot springen können, aber der Reisende hob ein schweres, geknotetes Tau vom Boden, drohte ihnen damit und hielt sie dadurch von dem Sprunge ab. In den letzten Jahrzehnten ist das Interesse an Hungerkünstlern sehr zurückgegangen. Aber sie überwanden sich, umdrängten den Käfig und wollten sich gar nicht fortrühren. Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas Böses getan hätte, wurde er eines Morgens verhaftet. »Wie ein Hund!« sagte er, es war, als sollte die Scham ihn überleben. Als Gregor Samsa eines Morgens aus unruhigen Träumen erwachte, fand er sich in seinem Bett zu einem ungeheueren Ungeziefer verwandelt. Und es war ihnen wie eine Bestätigung ihrer neuen Träume und guten Absichten, als am Ziele ihrer Fahrt die Tochter als erste sich erhob und ihren jungen Körper dehnte. »Es ist ein eigentümlicher Apparat«, sagte der Offizier zu dem Forschungsreisenden und überblickte mit einem gewissermaßen bewundernden Blick den ihm doch wohlbekannten Apparat. Sie hätten noch ins Boot springen können, aber der Reisende hob ein schweres, geknotetes Tau vom Boden, drohte ihnen damit und hielt sie dadurch von dem Sprunge ab. In den letzten Jahrzehnten ist das Interesse an Hungerkünstlern sehr zurückgegangen. Aber sie überwanden sich, umdrängten den Käfig und wollten sich gar nicht fortrühren. Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas Böses getan hätte, wurde er eines Morgens verhaftet. »Wie ein Hund!« sagte er, es war, als sollte die Scham ihn überleben. Als Gregor Samsa eines Morgens aus unruhigen Träumen erwachte, fand er sich in seinem Bett zu einem ungeheueren Ungeziefer verwandelt. Und es war ihnen wie eine Bestätigung ihrer neuen Träume und guten Absichten, als am Ziele ihrer Fahrt die Tochter als erste sich erhob und ihren jungen Körper dehnte. »Es ist ein eigentümlicher Apparat«, sagte der Offizier zu dem Forschungsreisenden und überblickte mit einem gewissermaßen bewundernden Blick den ihm doch wohlbekannten Apparat. Sie hätten noch ins Boot springen können, aber der Reisende hob ein schweres, geknotetes Tau vom Boden, drohte ihnen damit und hielt sie dadurch von dem Sprunge ab. In den letzten Jahrzehnten ist das Interesse an Hungerkünstlern sehr zurückgegangen. Aber sie überwanden sich, umdrängten den Käfig und wollten sich gar nicht fortrühren.Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas Böses getan hätte, wurde er eines Morgens verhaftet. »Wie ein Hund!« sagte er, es war, als sollte die Scham ihn überleben.', '2018-01-07 17:46:07', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
`id` int(11) NOT NULL,
  `nutzername` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `passwort` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `autor`
--

INSERT INTO `autor` (`id`, `nutzername`, `email`, `passwort`) VALUES
(1, 'Admin', 'admin@dpdgaming.de', '$2y$12$5KvTBoQkXHHgM4Vl0cVxCOVbZcSRulvUQfZlhKMtkVHFE1KdZa3O2'),
(3, 'Acera', 'acera@dpdgaming.de', '$2y$12$bLwqQooSkZ0ExOQSk4IOJebjSxufs7LEGaWsR3mFV9wSQVZRTwEdW'),
(4, 'AceraDryd', 'aceradryd@dpdgaming.de', '$2y$12$2QpSyJfIQiRRKBGQnWLVU.BBttRZSgcvhO.eIx7IUjmiPTjYYX8Zy'),
(5, 'Testnutzer', 't@t.de', '$2y$12$3NwQ3SaR/OxeYSx8.xzHBOngYXT3JgT4sZCFarzcEths2JuAwWLBS'),
(6, 'Anonym', 'anonym@anonym.an', '$2y$12$l4Rhy4KsGjc.xEr7iDp5MO.jRw8CXtvhQlYXDlMxxMkd6dE0idXl6'),
(7, 'Rohland', 'spike199797@gmail.com', '$2y$12$YPbZ6PI5g4AI.t.IyXO5Pes4F6SoRzOCQauAaQBVLlq6Vh.gEFu9i');

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `blogeintrag`
--
CREATE TABLE IF NOT EXISTS `blogeintrag` (
`id` int(11)
,`nutzername` varchar(45)
,`titel` text
,`inhalt` text
,`date` datetime
);
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentare`
--

CREATE TABLE IF NOT EXISTS `kommentare` (
`id` int(10) unsigned NOT NULL,
  `artikel_id` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kommentar` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `kommentare`
--

INSERT INTO `kommentare` (`id`, `artikel_id`, `username`, `kommentar`) VALUES
(1, 1, 'Max Mustermann', 'Lorem ipsum dolor sit amet!'),
(8, 3, 'Brian', 'Wundervoll!'),
(9, 1, 'Max', 'Wie poetisch!'),
(10, 3, 'Anonym', 'Toll'),
(11, 3, 'awds', 'awdasdfdasdfad'),
(12, 3, 'Sleppo04', 'Echt toll!'),
(13, 3, 'Sleppo04', 'Echt toll!'),
(14, 3, 'Sleppo04', 'Echt toll!');

-- --------------------------------------------------------

--
-- Struktur des Views `blogeintrag`
--
DROP TABLE IF EXISTS `blogeintrag`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `blogeintrag` AS select `artikel`.`id` AS `id`,`autor`.`nutzername` AS `nutzername`,`artikel`.`titel` AS `titel`,`artikel`.`inhalt` AS `inhalt`,`artikel`.`date` AS `date` from (`artikel` join `autor` on((`artikel`.`autor_id` = `autor`.`id`))) order by `artikel`.`date` desc;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_artikel_autor_id_idx` (`autor_id`);

--
-- Indizes für die Tabelle `autor`
--
ALTER TABLE `autor`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nutzername` (`nutzername`);

--
-- Indizes für die Tabelle `kommentare`
--
ALTER TABLE `kommentare`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_kommentare_artikel_idx` (`artikel_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `autor`
--
ALTER TABLE `autor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `kommentare`
--
ALTER TABLE `kommentare`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikel`
--
ALTER TABLE `artikel`
ADD CONSTRAINT `fk_artikel_autor_id` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `kommentare`
--
ALTER TABLE `kommentare`
ADD CONSTRAINT `fk_kommentare_artikel` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
