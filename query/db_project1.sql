-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 jun 2020 om 19:42
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_aanspreektitel`
--

CREATE TABLE `t_aanspreektitel` (
  `d_index` int(11) NOT NULL,
  `d_aanspreekTitel` varchar(10) DEFAULT NULL COMMENT 'Mevrouw,Mijnheer,Dhr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_aanspreektitel`
--

INSERT INTO `t_aanspreektitel` (`d_index`, `d_aanspreekTitel`) VALUES
(0, ''),
(1, 'Mevrouw'),
(2, 'Mijnheer'),
(3, 'Dhr');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_authentication`
--

CREATE TABLE `t_authentication` (
  `d_user` int(11) NOT NULL,
  `d_logon` varchar(45) DEFAULT NULL,
  `d_paswoord` char(64) DEFAULT NULL,
  `d_identifier` char(64) DEFAULT NULL,
  `d_token` char(64) DEFAULT NULL,
  `d_expire` bigint(20) DEFAULT NULL,
  `d_faultcntr` tinyint(4) DEFAULT NULL,
  `d_timeOut` bigint(20) DEFAULT NULL,
  `d_resetKey` char(64) DEFAULT NULL,
  `d_resetTime` bigint(20) DEFAULT NULL,
  `d_rol` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_authentication`
--

INSERT INTO `t_authentication` (`d_user`, `d_logon`, `d_paswoord`, `d_identifier`, `d_token`, `d_expire`, `d_faultcntr`, `d_timeOut`, `d_resetKey`, `d_resetTime`, `d_rol`) VALUES
(1, 'nirmalsuraj2@gmail.com', 'd56faf3eccba0a31d84b993d59f897566efde8e86c3673bcf4680fffcb21daf7', '', '', 0, 0, 0, '', 0, 1),
(2, 'sunil@gmail.com', '17e882f0048a008e72fdeb6724d06f0d3c3873c45cf2e71d2a20c1ed1230d65e', '', '', 0, 0, 0, '', 0, 2),
(3, 'flores@gmail.com', 'd15a4a52648402bb724813a214e04ee9c941f78e795fed51b5ef01b48a31345c', '', '', 0, 0, 0, '', 0, 1),
(12, 'sunny@gmail.com', 'f2296b894edd72a2c5c2c5db4d86cfe708639851da5eca832a86c0343847a89f', '', '', 0, 0, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_authorised`
--

CREATE TABLE `t_authorised` (
  `d_index` int(11) NOT NULL,
  `d_script` varchar(100) DEFAULT NULL,
  `d_0` tinyint(3) DEFAULT NULL,
  `d_1` tinyint(3) DEFAULT NULL,
  `d_2` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_authorised`
--

INSERT INTO `t_authorised` (`d_index`, `d_script`, `d_0`, `d_1`, `d_2`) VALUES
(1, 'afrekenen.php', 0, 1, 0),
(2, 'bezoeker.php', 1, 1, 1),
(3, 'car.php', 0, 1, 0),
(4, 'check_table.php', 0, 1, 0),
(5, 'factuur.php', 0, 1, 1),
(6, 'home_klant.php', 0, 1, 0),
(7, 'klant_data_aanpassen.php', 0, 1, 1),
(8, 'klant_profiel.php', 0, 1, 0),
(9, 'login.php', 1, 1, 1),
(10, 'resgisteren.php', 1, 1, 1),
(11, 'shoppen.php', 0, 1, 0),
(12, 'show_list.php', 0, 1, 0),
(13, 'show_product.php', 0, 1, 0),
(14, 'tovoegen_in_list.php', 0, 1, 0),
(15, 'bedrijf_regis.php', 0, 1, 0),
(16, 'klant_select.php', 0, 1, 0),
(17, 'logout.php', 0, 1, 1),
(18, 'home_admin.php', 0, 0, 1),
(19, 'aanpassen.php', 0, 1, 1),
(20, 'a_admin.php', 0, 0, 1),
(21, 'select.php', 0, 0, 1),
(22, 'toon.php', 0, 0, 1),
(23, 'verwijderen.php', 0, 0, 1),
(24, 'errors.php', 0, 0, 1),
(25, 'modal.php', 0, 0, 1),
(26, 'reset_pass.php', 1, 1, 1),
(27, 'reset_check.php', 1, 1, 1),
(28, 'contact.php', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_bedrijf`
--

CREATE TABLE `t_bedrijf` (
  `d_index` int(11) NOT NULL,
  `d_naam` varchar(60) DEFAULT NULL,
  `d_btw` varchar(45) DEFAULT NULL,
  `d_straat` varchar(50) DEFAULT NULL,
  `d_telefoonnummer` varchar(11) DEFAULT NULL,
  `d_huisNummer` char(5) DEFAULT NULL,
  `t_users_d_index` int(11) NOT NULL,
  `t_gemeente_d_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_bedrijf`
--

INSERT INTO `t_bedrijf` (`d_index`, `d_naam`, `d_btw`, `d_straat`, `d_telefoonnummer`, `d_huisNummer`, `t_users_d_index`, `t_gemeente_d_index`) VALUES
(1, 'johone', 'BE0402206045', 'PlantinenMoretuslei', '03/2502020', '05555', 1, 60),
(16, 'delhiaze', 'BE0402206045', 'plazl,   kqsd  qsdq, 518, 518, 518', '03/5552020', '518', 2, 321);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_btw`
--

CREATE TABLE `t_btw` (
  `d_index` int(11) NOT NULL,
  `d_btw` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_btw`
--

INSERT INTO `t_btw` (`d_index`, `d_btw`) VALUES
(1, ''),
(2, '6%'),
(3, '12%'),
(4, '21%');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_factuur`
--

CREATE TABLE `t_factuur` (
  `d_index` int(11) NOT NULL,
  `t_users_d_index` int(11) NOT NULL,
  `d_productNaam` varchar(100) DEFAULT NULL,
  `d_prijs` varchar(100) DEFAULT NULL,
  `d_datum` char(10) DEFAULT NULL,
  `d_btw` varchar(45) DEFAULT NULL,
  `d_psofkg` char(2) DEFAULT NULL,
  `d_artieknummer` int(11) DEFAULT NULL,
  `d_aantal` int(11) DEFAULT NULL,
  `d_factuurnummer` varchar(100) NOT NULL,
  `d_count_holder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_factuur`
--

INSERT INTO `t_factuur` (`d_index`, `t_users_d_index`, `d_productNaam`, `d_prijs`, `d_datum`, `d_btw`, `d_psofkg`, `d_artieknummer`, `d_aantal`, `d_factuurnummer`, `d_count_holder`) VALUES
(104, 1, 'Tomaten', '2', '2020-06-05', '6%', 'kg', 2, 5, 'fk05-06-2020-0', 0),
(105, 1, 'Melk', '2', '2020-06-05', '6%', 'ps', 15, 3, 'fk05-06-2020-1', 1),
(106, 1, 'Visstick', '5', '2020-06-05', '12%', 'ps', 10, 6, 'fk05-06-2020-2', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_gemeente`
--

CREATE TABLE `t_gemeente` (
  `d_index` int(11) NOT NULL,
  `d_postcode` smallint(4) DEFAULT NULL,
  `d_gemeentenaam` varchar(100) DEFAULT NULL,
  `d_land` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_gemeente`
--

INSERT INTO `t_gemeente` (`d_index`, `d_postcode`, `d_gemeentenaam`, `d_land`) VALUES
(1, 9420, 'Aaigem', 'BEL'),
(2, 8511, 'Aalbeke', 'BEL'),
(3, 9300, 'Aalst', 'BEL'),
(4, 3800, 'Aalst (Limb.)', 'BEL'),
(5, 9880, 'Aalter', 'BEL'),
(6, 3200, 'Aarschot', 'BEL'),
(7, 8700, 'Aarsele', 'BEL'),
(8, 8211, 'Aartrijke', 'BEL'),
(9, 2630, 'Aartselaar', 'BEL'),
(10, 4557, 'Ab?e', 'BEL'),
(11, 4280, 'Abolens', 'BEL'),
(12, 3930, 'Achel', 'BEL'),
(13, 5590, 'Ach?ne', 'BEL'),
(14, 5362, 'Achet', 'BEL'),
(15, 4219, 'Acosse', 'BEL'),
(16, 6280, 'Acoz', 'BEL'),
(17, 9991, 'Adegem', 'BEL'),
(18, 8660, 'Adinkerke', 'BEL'),
(19, 1790, 'Affligem', 'BEL'),
(20, 9051, 'Afsnee', 'BEL'),
(21, 5544, 'Agimont', 'BEL'),
(22, 4317, 'Aineffe', 'BEL'),
(23, 5310, 'Aische-en-Refail', 'BEL'),
(24, 6250, 'Aiseau', 'BEL'),
(25, 6250, 'Aiseau-Presles', 'BEL'),
(26, 5070, 'Aisemont', 'BEL'),
(27, 3570, 'Alken', 'BEL'),
(28, 5550, 'Alle', 'BEL'),
(29, 4432, 'Alleur', 'BEL'),
(30, 1652, 'Alsemberg', 'BEL'),
(31, 8690, 'Alveringem', 'BEL'),
(32, 4540, 'Amay', 'BEL'),
(33, 6680, 'Amberloup', 'BEL'),
(34, 4770, 'Ambl?ve', 'BEL'),
(35, 6953, 'Ambly', 'BEL'),
(36, 4219, 'Ambresin', 'BEL'),
(37, 4770, 'Amel', 'BEL'),
(38, 6997, 'Amonines', 'BEL'),
(39, 7750, 'Amougies', 'BEL'),
(40, 4540, 'Ampsin', 'BEL'),
(41, 5300, 'Andenne', 'BEL'),
(42, 1070, 'Anderlecht', 'BEL'),
(43, 6150, 'Anderlues', 'BEL'),
(44, 4821, 'Andrimont', 'BEL'),
(45, 4031, 'Angleur', 'BEL'),
(46, 7387, 'Angre', 'BEL'),
(47, 7387, 'Angreau', 'BEL'),
(48, 5537, 'Anh?e', 'BEL'),
(49, 6721, 'Anlier', 'BEL'),
(50, 6890, 'Anloy', 'BEL'),
(51, 5537, 'Annevoie-Rouillon', 'BEL'),
(52, 4430, 'Ans', 'BEL'),
(53, 5500, 'Anseremme', 'BEL'),
(54, 7750, 'Anseroeul', 'BEL'),
(55, 5520, 'Anth?e', 'BEL'),
(56, 4520, 'Antheit', 'BEL'),
(57, 4160, 'Anthisnes', 'BEL'),
(58, 7640, 'Antoing', 'BEL'),
(59, 2000, 'Antwerpen', 'BEL'),
(60, 2018, 'Antwerpen', 'BEL'),
(61, 2020, 'Antwerpen', 'BEL'),
(62, 2030, 'Antwerpen', 'BEL'),
(63, 2040, 'Antwerpen', 'BEL'),
(64, 2050, 'Antwerpen', 'BEL'),
(65, 2060, 'Antwerpen', 'BEL'),
(66, 7910, 'Anvaing', 'BEL'),
(67, 8570, 'Anzegem', 'BEL'),
(68, 9200, 'Appels', 'BEL'),
(69, 9400, 'Appelterre-Eichem', 'BEL'),
(70, 7811, 'Arbre (Ht.)', 'BEL'),
(71, 5170, 'Arbre (Nam.)', 'BEL'),
(72, 4990, 'Arbrefontaine', 'BEL'),
(73, 7910, 'Arc-Aini?res', 'BEL'),
(74, 1390, 'Archennes', 'BEL'),
(75, 7910, 'Arc-Wattripont', 'BEL'),
(76, 8850, 'Ardooie', 'BEL'),
(77, 2370, 'Arendonk', 'BEL'),
(78, 4601, 'Argenteau', 'BEL'),
(79, 6700, 'Arlon', 'BEL'),
(80, 7181, 'Arquennes', 'BEL'),
(81, 5060, 'Arsimont', 'BEL'),
(82, 6870, 'Arville', 'BEL'),
(83, 3665, 'As', 'BEL'),
(84, 9404, 'Aspelare', 'BEL'),
(85, 9890, 'Asper', 'BEL'),
(86, 7040, 'Asquillies', 'BEL'),
(87, 1007, 'Ass. Commiss. Communau. fran?aise', 'BEL'),
(88, 1005, 'Ass. R?un. Com. Communau. Commune', 'BEL'),
(89, 1730, 'Asse', 'BEL'),
(90, 8310, 'Assebroek', 'BEL'),
(91, 9960, 'Assenede', 'BEL'),
(92, 6860, 'Assenois', 'BEL'),
(93, 3460, 'Assent', 'BEL'),
(94, 5330, 'Assesse', 'BEL'),
(95, 9800, 'Astene', 'BEL'),
(96, 7800, 'Ath', 'BEL'),
(97, 7387, 'Athis', 'BEL'),
(98, 6791, 'Athus', 'BEL'),
(99, 3404, 'Attenhoven', 'BEL'),
(100, 3384, 'Attenrode', 'BEL'),
(101, 6717, 'Attert', 'BEL'),
(102, 7941, 'Attre', 'BEL'),
(103, 6790, 'Aubange', 'BEL'),
(104, 7972, 'Aubechies', 'BEL'),
(105, 4880, 'Aubel', 'BEL'),
(106, 5660, 'Aublain', 'BEL'),
(107, 6880, 'Auby-sur-Semois', 'BEL'),
(108, 1160, 'Auderghem', 'BEL'),
(109, 7382, 'Audregnies', 'BEL'),
(110, 7040, 'Aulnois', 'BEL'),
(111, 6706, 'Autelbas', 'BEL'),
(112, 1367, 'Autre-Eglise', 'BEL'),
(113, 7387, 'Autreppe', 'BEL'),
(114, 5060, 'Auvelais', 'BEL'),
(115, 5580, 'Ave-et-Auffe', 'BEL'),
(116, 8630, 'Avekapelle', 'BEL'),
(117, 8580, 'Avelgem', 'BEL'),
(118, 4260, 'Avennes', 'BEL'),
(119, 3271, 'Averbode', 'BEL'),
(120, 4280, 'Avernas-le-Bauduin', 'BEL'),
(121, 4280, 'Avin', 'BEL'),
(122, 4340, 'Awans', 'BEL'),
(123, 6870, 'Awenne', 'BEL'),
(124, 4400, 'Awirs', 'BEL'),
(125, 6900, 'Aye', 'BEL'),
(126, 4630, 'Ayeneux', 'BEL'),
(127, 4920, 'Aywaille', 'BEL'),
(128, 4090, 'B.S.D. (Belg. Strijdkr. Duitsland)', 'BEL'),
(129, 9890, 'Baaigem', 'BEL'),
(130, 3128, 'Baal', 'BEL'),
(131, 9310, 'Baardegem', 'BEL'),
(132, 2387, 'Baarle-Hertog', 'BEL'),
(133, 9200, 'Baasrode', 'BEL'),
(134, 9800, 'Bachte-Maria-Leerne', 'BEL'),
(135, 4837, 'Baelen (Lg.)', 'BEL'),
(136, 5550, 'Bagimont', 'BEL'),
(137, 6464, 'Baileux', 'BEL'),
(138, 6460, 'Baili?vre', 'BEL'),
(139, 5555, 'Baillamont', 'BEL'),
(140, 7730, 'Bailleul', 'BEL'),
(141, 5377, 'Baillonville', 'BEL'),
(142, 7380, 'Baisieux', 'BEL'),
(143, 1470, 'Baisy-Thy', 'BEL'),
(144, 5190, 'Bal?tre', 'BEL'),
(145, 9860, 'Balegem', 'BEL'),
(146, 2490, 'Balen', 'BEL'),
(147, 9420, 'Bambrugge', 'BEL'),
(148, 6951, 'Bande', 'BEL'),
(149, 6500, 'Barben?on', 'BEL'),
(150, 4671, 'Barchon', 'BEL'),
(151, 5570, 'Baronville', 'BEL'),
(152, 7534, 'Barry', 'BEL'),
(153, 5370, 'Barvaux-Condroz', 'BEL'),
(154, 6940, 'Barvaux-sur-Ourthe', 'BEL'),
(155, 7971, 'Bas?cles', 'BEL'),
(156, 4520, 'Bas-Oha', 'BEL'),
(157, 4983, 'Basse-Bodeux', 'BEL'),
(158, 4690, 'Bassenge', 'BEL'),
(159, 9968, 'Bassevelde', 'BEL'),
(160, 7830, 'Bassilly', 'BEL'),
(161, 6600, 'Bastogne', 'BEL'),
(162, 7784, 'Bas-Warneton', 'BEL'),
(163, 3870, 'Batsheers', 'BEL'),
(164, 4651, 'Battice', 'BEL'),
(165, 7130, 'Battignies', 'BEL'),
(166, 7331, 'Baudour', 'BEL'),
(167, 7870, 'Bauffe', 'BEL'),
(168, 7604, 'Baugnies', 'BEL'),
(169, 1401, 'Baulers', 'BEL'),
(170, 9520, 'Bavegem', 'BEL'),
(171, 8531, 'Bavikhove', 'BEL'),
(172, 9150, 'Bazel', 'BEL'),
(173, 4052, 'Beaufays', 'BEL'),
(174, 6500, 'Beaumont', 'BEL'),
(175, 5570, 'Beauraing', 'BEL'),
(176, 6980, 'Beausaint', 'BEL'),
(177, 1320, 'Beauvechain', 'BEL'),
(178, 8630, 'Beauvoorde', 'BEL'),
(179, 6594, 'Beauwelz', 'BEL'),
(180, 7532, 'Beclers', 'BEL'),
(181, 3960, 'Beek', 'BEL'),
(182, 9630, 'Beerlegem', 'BEL'),
(183, 8730, 'Beernem', 'BEL'),
(184, 2340, 'Beerse', 'BEL'),
(185, 1650, 'Beersel', 'BEL'),
(186, 8600, 'Beerst', 'BEL'),
(187, 1673, 'Beert', 'BEL'),
(188, 9080, 'Beervelde', 'BEL'),
(189, 2580, 'Beerzel', 'BEL'),
(190, 5000, 'Beez', 'BEL'),
(191, 6987, 'Beffe', 'BEL'),
(192, 3130, 'Begijnendijk', 'BEL'),
(193, 6672, 'Beho', 'BEL'),
(194, 1852, 'Beigem', 'BEL'),
(195, 8480, 'Bekegem', 'BEL'),
(196, 1730, 'Bekkerzeel', 'BEL'),
(197, 3460, 'Bekkevoort', 'BEL'),
(198, 1009, 'Belgische Senaat', 'BEL'),
(199, 5001, 'Belgrade', 'BEL'),
(200, 4610, 'Bellaire', 'BEL'),
(201, 7170, 'Bellecourt', 'BEL'),
(202, 6730, 'Bellefontaine (Lux.)', 'BEL'),
(203, 5555, 'Bellefontaine (Nam.)', 'BEL'),
(204, 8510, 'Bellegem', 'BEL'),
(205, 9881, 'Bellem', 'BEL'),
(206, 6834, 'Bellevaux', 'BEL'),
(207, 4960, 'Bellevaux-Ligneuville', 'BEL'),
(208, 1674, 'Bellingen', 'BEL'),
(209, 7970, 'Beloeil', 'BEL'),
(210, 9111, 'Belsele (Sint-Niklaas)', 'BEL'),
(211, 4500, 'Ben-Ahin', 'BEL'),
(212, 6941, 'Bende', 'BEL'),
(213, 3540, 'Berbroek', 'BEL'),
(214, 2600, 'Berchem (Antwerpen)', 'BEL'),
(215, 9690, 'Berchem (O.-Vl.)', 'BEL'),
(216, 1082, 'Berchem-Sainte-Agathe', 'BEL'),
(217, 2040, 'Berendrecht', 'BEL'),
(218, 1910, 'Berg (Bt.)', 'BEL'),
(219, 3700, 'Berg (Limb.)', 'BEL'),
(220, 4360, 'Bergilers', 'BEL'),
(221, 3580, 'Beringen', 'BEL'),
(222, 2590, 'Berlaar', 'BEL'),
(223, 9290, 'Berlare', 'BEL'),
(224, 3830, 'Berlingen', 'BEL'),
(225, 4257, 'Berloz', 'BEL'),
(226, 4607, 'Berneau', 'BEL'),
(227, 7320, 'Bernissart', 'BEL'),
(228, 6560, 'Bersillies-l\'Abbaye', 'BEL'),
(229, 3060, 'Bertem', 'BEL'),
(230, 6687, 'Bertogne', 'BEL'),
(231, 4280, 'Bertr?e', 'BEL'),
(232, 6880, 'Bertrix', 'BEL'),
(233, 5651, 'Berz?e', 'BEL'),
(234, 8980, 'Beselare', 'BEL'),
(235, 3130, 'Betekom', 'BEL'),
(236, 4300, 'Bettincourt', 'BEL'),
(237, 5030, 'Beuzet', 'BEL'),
(238, 2560, 'Bevel', 'BEL'),
(239, 1547, 'Bever', 'BEL'),
(240, 4960, 'Beverc?', 'BEL'),
(241, 9700, 'Bevere', 'BEL'),
(242, 8791, 'Beveren (Leie)', 'BEL'),
(243, 8800, 'Beveren (Roeselare)', 'BEL'),
(244, 8691, 'Beveren-aan-den-Ijzer', 'BEL'),
(245, 9120, 'Beveren-Waas', 'BEL'),
(246, 3581, 'Beverlo', 'BEL'),
(247, 3740, 'Beverst', 'BEL'),
(248, 4610, 'Beyne-Heusay', 'BEL'),
(249, 6543, 'Bienne-lez-Happart', 'BEL'),
(250, 3360, 'Bierbeek', 'BEL'),
(251, 6533, 'Bierc?e', 'BEL'),
(252, 1301, 'Bierges', 'BEL'),
(253, 1430, 'Bierghes', 'BEL'),
(254, 4460, 'Bierset', 'BEL'),
(255, 5380, 'Bierwart', 'BEL'),
(256, 5640, 'Biesme', 'BEL'),
(257, 5640, 'Biesmer?e', 'BEL'),
(258, 6531, 'Biesme-sous-Thuin', 'BEL'),
(259, 1547, 'Bievene', 'BEL'),
(260, 5555, 'Bievre', 'BEL'),
(261, 1390, 'Biez', 'BEL'),
(262, 6690, 'Bihain', 'BEL'),
(263, 8920, 'Bikschote', 'BEL'),
(264, 4831, 'Bilstain', 'BEL'),
(265, 3740, 'Bilzen', 'BEL'),
(266, 7130, 'Binche', 'BEL'),
(267, 3850, 'Binderveld', 'BEL'),
(268, 3211, 'Binkom', 'BEL'),
(269, 5537, 'Bioul', 'BEL'),
(270, 8501, 'Bissegem', 'BEL'),
(271, 7783, 'Bizet', 'BEL'),
(272, 2830, 'Blaasveld', 'BEL'),
(273, 5542, 'Blaimont', 'BEL'),
(274, 7522, 'Blandain', 'BEL'),
(275, 3052, 'Blanden', 'BEL'),
(276, 8370, 'Blankenberge', 'BEL'),
(277, 7040, 'Blaregnies', 'BEL'),
(278, 7321, 'Blaton', 'BEL'),
(279, 7370, 'Blaugies', 'BEL'),
(280, 4670, 'Bl?gny', 'BEL'),
(281, 7620, 'Bl?haries', 'BEL'),
(282, 4280, 'Blehen', 'BEL'),
(283, 6760, 'Bleid', 'BEL'),
(284, 4300, 'Bleret', 'BEL'),
(285, 7903, 'Blicquy', 'BEL'),
(286, 3950, 'Bocholt', 'BEL'),
(287, 2530, 'Boechout', 'BEL'),
(288, 3890, 'Boekhout', 'BEL'),
(289, 9961, 'Boekhoute', 'BEL'),
(290, 4250, 'Bo?lhe', 'BEL'),
(291, 8904, 'Boezinge', 'BEL'),
(292, 1670, 'Bogaarden', 'BEL'),
(293, 5550, 'Bohan', 'BEL'),
(294, 5140, 'Boign?e', 'BEL'),
(295, 4690, 'Boirs', 'BEL'),
(296, 7866, 'Bois-de-Lessines', 'BEL'),
(297, 5170, 'Bois-de-Villers', 'BEL'),
(298, 7170, 'Bois-d\'Haine', 'BEL'),
(299, 4560, 'Bois-et-Borsu', 'BEL'),
(300, 5310, 'Bolinne', 'BEL'),
(301, 4653, 'Bolland', 'BEL'),
(302, 1367, 'Bomal (Bt.)', 'BEL'),
(303, 6941, 'Bomal-sur-Ourthe', 'BEL'),
(304, 4607, 'Bombaye', 'BEL'),
(305, 3840, 'Bommershoven (Haren)', 'BEL'),
(306, 4100, 'Boncelles', 'BEL'),
(307, 5310, 'Boneffe', 'BEL'),
(308, 2820, 'Bonheiden', 'BEL'),
(309, 5021, 'Boninne', 'BEL'),
(310, 1325, 'Bonlez', 'BEL'),
(311, 6700, 'Bonnert', 'BEL'),
(312, 5300, 'Bonneville', 'BEL'),
(313, 7603, 'Bon-Secours', 'BEL'),
(314, 5377, 'Bonsin', 'BEL'),
(315, 2221, 'Booischot', 'BEL'),
(316, 8630, 'Booitshoeke', 'BEL'),
(317, 2850, 'Boom', 'BEL'),
(318, 3631, 'Boorsem', 'BEL'),
(319, 3190, 'Boortmeerbeek', 'BEL'),
(320, 1761, 'Borchtlombeek', 'BEL'),
(321, 2140, 'Borgerhout (Antwerpen)', 'BEL'),
(322, 3840, 'Borgloon', 'BEL'),
(323, 4317, 'Borlez', 'BEL'),
(324, 3891, 'Borlo', 'BEL'),
(325, 6941, 'Borlon', 'BEL'),
(326, 2880, 'Bornem', 'BEL'),
(327, 1404, 'Bornival', 'BEL'),
(328, 2150, 'Borsbeek (Antw.)', 'BEL'),
(329, 9552, 'Borsbeke', 'BEL'),
(330, 5032, 'Bossi?re', 'BEL'),
(331, 8583, 'Bossuit', 'BEL'),
(332, 1390, 'Bossut-Gottechain', 'BEL'),
(333, 3300, 'Bost', 'BEL'),
(334, 5032, 'Bothey', 'BEL'),
(335, 9820, 'Bottelare', 'BEL'),
(336, 6200, 'Bouffioulx', 'BEL'),
(337, 5004, 'Bouge', 'BEL'),
(338, 7040, 'Bougnies', 'BEL'),
(339, 6830, 'Bouillon', 'BEL'),
(340, 6464, 'Bourlers', 'BEL'),
(341, 5575, 'Bourseigne-Neuve', 'BEL'),
(342, 5575, 'Bourseigne-Vieille', 'BEL'),
(343, 7110, 'Boussoit', 'BEL'),
(344, 7300, 'Boussu', 'BEL'),
(345, 5660, 'Boussu-en-Fagne', 'BEL'),
(346, 6440, 'Boussu-lez-Walcourt', 'BEL'),
(347, 1470, 'Bousval', 'BEL'),
(348, 3370, 'Boutersem', 'BEL'),
(349, 5500, 'Bouvignes-sur-Meuse', 'BEL'),
(350, 7803, 'Bouvignies', 'BEL'),
(351, 2288, 'Bouwel', 'BEL'),
(352, 8680, 'Bovekerke', 'BEL'),
(353, 3870, 'Bovelingen', 'BEL'),
(354, 4300, 'Bovenistier', 'BEL'),
(355, 5081, 'Bovesse', 'BEL'),
(356, 6671, 'Bovigny', 'BEL'),
(357, 4990, 'Bra', 'BEL'),
(358, 7604, 'Braffe', 'BEL'),
(359, 5590, 'Braibant', 'BEL'),
(360, 1420, 'Braine-l\'Alleud', 'BEL'),
(361, 1440, 'Braine-le-Ch?teau', 'BEL'),
(362, 7090, 'Braine-le-Comte', 'BEL'),
(363, 4260, 'Braives', 'BEL'),
(364, 9660, 'Brakel', 'BEL'),
(365, 5310, 'Branchon', 'BEL'),
(366, 6800, 'Bras', 'BEL'),
(367, 7604, 'Brasmenil', 'BEL'),
(368, 2930, 'Brasschaat', 'BEL'),
(369, 7130, 'Bray', 'BEL'),
(370, 2960, 'Brecht', 'BEL'),
(371, 8450, 'Bredene', 'BEL'),
(372, 3960, 'Bree', 'BEL'),
(373, 2870, 'Breendonk', 'BEL'),
(374, 4020, 'Bressoux', 'BEL'),
(375, 8900, 'Brielen', 'BEL'),
(376, 2520, 'Broechem', 'BEL'),
(377, 3840, 'Broekom', 'BEL'),
(378, 1931, 'Brucargo', 'BEL'),
(379, 7940, 'Brugelette', 'BEL'),
(380, 8000, 'Brugge', 'BEL'),
(381, 5660, 'Br?ly', 'BEL'),
(382, 5660, 'Br?ly-de-Pesche', 'BEL'),
(383, 7620, 'Brunehaut', 'BEL'),
(384, 1785, 'Brussegem', 'BEL'),
(385, 1000, 'Brussel', 'BEL'),
(386, 1070, 'Brussel (Anderlecht)', 'BEL'),
(387, 1050, 'Brussel (Elsene)', 'BEL'),
(388, 1040, 'Brussel (Etterbeek)', 'BEL'),
(389, 1140, 'Brussel (Evere)', 'BEL'),
(390, 1083, 'Brussel (Ganshoren)', 'BEL'),
(391, 1130, 'Brussel (Haren)', 'BEL'),
(392, 1090, 'Brussel (Jette)', 'BEL'),
(393, 1081, 'Brussel (Koekelberg)', 'BEL'),
(394, 1020, 'Brussel (Laken)', 'BEL'),
(395, 1120, 'Brussel (Neder-Over-Heembeek)', 'BEL'),
(396, 1160, 'Brussel (Oudergem)', 'BEL'),
(397, 1030, 'Brussel (Schaarbeek)', 'BEL'),
(398, 1082, 'Brussel (Sint-Agatha-Berchem)', 'BEL'),
(399, 1060, 'Brussel (Sint-Gillis)', 'BEL'),
(400, 1080, 'Brussel (Sint-Jans-Molenbeek)', 'BEL'),
(401, 1210, 'Brussel (Sint-Joost-ten-Node)', 'BEL'),
(402, 1200, 'Brussel (Sint-Lambrechts-Woluwe)', 'BEL'),
(403, 1150, 'Brussel (Sint-Pieters-Woluwe)', 'BEL'),
(404, 1180, 'Brussel (Ukkel)', 'BEL'),
(405, 1190, 'Brussel (Vorst)', 'BEL'),
(406, 1170, 'Brussel (Watermaal-Bosvoorde)', 'BEL'),
(407, 1934, 'Brussel X-Luchthaven Remailing', 'BEL'),
(408, 1005, 'Brusselse Hoofdstedelijke Raad', 'BEL'),
(409, 3800, 'Brustem', 'BEL'),
(410, 1000, 'Bruxelles', 'BEL'),
(411, 1070, 'Bruxelles (Anderlecht)', 'BEL'),
(412, 1160, 'Bruxelles (Auderghem)', 'BEL'),
(413, 1082, 'Bruxelles (Berchem-Sainte-Agathe)', 'BEL'),
(414, 1040, 'Bruxelles (Etterbeek)', 'BEL'),
(415, 1140, 'Bruxelles (Evere)', 'BEL'),
(416, 1190, 'Bruxelles (Forest)', 'BEL'),
(417, 1083, 'Bruxelles (Ganshoren)', 'BEL'),
(418, 1130, 'Bruxelles (Haeren)', 'BEL'),
(419, 1050, 'Bruxelles (Ixelles)', 'BEL'),
(420, 1090, 'Bruxelles (Jette)', 'BEL'),
(421, 1081, 'Bruxelles (Koekelberg)', 'BEL'),
(422, 1020, 'Bruxelles (Laeken)', 'BEL'),
(423, 1080, 'Bruxelles (Molenbeek-Saint-Jean)', 'BEL'),
(424, 1120, 'Bruxelles (Neder-Over-Heembeek)', 'BEL'),
(425, 1060, 'Bruxelles (Saint-Gilles)', 'BEL'),
(426, 1210, 'Bruxelles (Saint-Josse-ten-Noode)', 'BEL'),
(427, 1030, 'Bruxelles (Schaerbeek)', 'BEL'),
(428, 1180, 'Bruxelles (Uccle)', 'BEL'),
(429, 1170, 'Bruxelles (Watermael-Boitsfort)', 'BEL'),
(430, 1200, 'Bruxelles (Woluwe-Saint-Lambert)', 'BEL'),
(431, 1150, 'Bruxelles (Woluwe-Saint-Pierre)', 'BEL'),
(432, 1934, 'Bruxelles X-Aeroport Remailing', 'BEL'),
(433, 7641, 'Bruyelle', 'BEL'),
(434, 6222, 'Brye', 'BEL'),
(435, 3440, 'Budingen', 'BEL'),
(436, 9255, 'Buggenhout', 'BEL'),
(437, 7911, 'Buissenal', 'BEL'),
(438, 5580, 'Buissonville', 'BEL'),
(439, 1501, 'Buizingen', 'BEL'),
(440, 1910, 'Buken', 'BEL'),
(441, 4760, 'Bullange', 'BEL'),
(442, 4760, 'B?llingen', 'BEL'),
(443, 8630, 'Bulskamp', 'BEL'),
(444, 3380, 'Bunsbeek', 'BEL'),
(445, 2070, 'Burcht', 'BEL'),
(446, 4210, 'Burdinne', 'BEL'),
(447, 6927, 'Bure', 'BEL'),
(448, 4790, 'Burg-Reuland', 'BEL'),
(449, 9420, 'Burst', 'BEL'),
(450, 7602, 'Bury', 'BEL'),
(451, 4750, 'B?tgenbach', 'BEL'),
(452, 4750, 'Butgenbach', 'BEL'),
(453, 3891, 'Buvingen', 'BEL'),
(454, 7133, 'Buvrinnes', 'BEL'),
(455, 6743, 'Buzenol', 'BEL'),
(456, 6230, 'Buzet', 'BEL'),
(457, 7604, 'Callenelle', 'BEL'),
(458, 7642, 'Calonne', 'BEL'),
(459, 7940, 'Cambron-Casteau', 'BEL'),
(460, 7870, 'Cambron-Saint-Vincent', 'BEL'),
(461, 1804, 'Cargovil', 'BEL'),
(462, 6850, 'Carlsbourg', 'BEL'),
(463, 7141, 'Carni?res', 'BEL'),
(464, 7061, 'Casteau (Soignies)', 'BEL'),
(465, 5650, 'Castillon', 'BEL'),
(466, 7760, 'Celles (Ht.)', 'BEL'),
(467, 4317, 'Celles (Lg.)', 'BEL'),
(468, 5561, 'Celles (Nam.)', 'BEL'),
(469, 4632, 'C?rexhe-Heuseux', 'BEL'),
(470, 5630, 'Cerfontaine', 'BEL'),
(471, 1341, 'C?roux-Mousty', 'BEL'),
(472, 4650, 'Chaineux', 'BEL'),
(473, 5550, 'Chairi?re', 'BEL'),
(474, 1008, 'Chambre des Repr?sentants', 'BEL'),
(475, 5020, 'Champion', 'BEL'),
(476, 6971, 'Champlon', 'BEL'),
(477, 6921, 'Chanly', 'BEL'),
(478, 6742, 'Chantemelle', 'BEL'),
(479, 7903, 'Chapelle-?-Oie', 'BEL'),
(480, 7903, 'Chapelle-?-Wattines', 'BEL'),
(481, 7160, 'Chapelle-lez-Herlaimont', 'BEL'),
(482, 4537, 'Chapon-Seraing', 'BEL'),
(483, 6000, 'Charleroi', 'BEL'),
(484, 4654, 'Charneux', 'BEL'),
(485, 6824, 'Chassepierre', 'BEL'),
(486, 1450, 'Chastre', 'BEL'),
(487, 5650, 'Chastr?s', 'BEL'),
(488, 1450, 'Chastre-Villeroux-Blanmont', 'BEL'),
(489, 6200, 'Ch?telet', 'BEL'),
(490, 6200, 'Ch?telineau', 'BEL'),
(491, 6747, 'Ch?tillon', 'BEL'),
(492, 4050, 'Chaudfontaine', 'BEL'),
(493, 1325, 'Chaumont-Gistoux', 'BEL'),
(494, 7063, 'Chauss?e-Notre-Dame-Louvignies', 'BEL'),
(495, 4032, 'Ch?n?e', 'BEL'),
(496, 6673, 'Cherain', 'BEL'),
(497, 4602, 'Cheratte', 'BEL'),
(498, 7521, 'Chercq', 'BEL'),
(499, 5590, 'Chevetogne', 'BEL'),
(500, 4987, 'Chevron', 'BEL'),
(501, 7950, 'Chi?vres', 'BEL'),
(502, 6460, 'Chimay', 'BEL'),
(503, 6810, 'Chiny', 'BEL'),
(504, 4400, 'Chokier', 'BEL'),
(505, 1031, 'Christelijke Sociale Organisaties', 'BEL'),
(506, 5560, 'Ciergnon', 'BEL'),
(507, 5590, 'Ciney', 'BEL'),
(508, 4260, 'Ciplet', 'BEL'),
(509, 7024, 'Ciply', 'BEL'),
(510, 1010, 'Cit? Administrative de l\'Etat', 'BEL'),
(511, 1480, 'Clabecq', 'BEL'),
(512, 4560, 'Clavier', 'BEL'),
(513, 4890, 'Clermont (Lg.)', 'BEL'),
(514, 5650, 'Clermont (Nam.)', 'BEL'),
(515, 4480, 'Clermont-sous-Huy', 'BEL'),
(516, 5022, 'Cognel?e', 'BEL'),
(517, 7340, 'Colfontaine', 'BEL'),
(518, 4170, 'Comblain-au-Pont', 'BEL'),
(519, 4180, 'Comblain-Fairon', 'BEL'),
(520, 4180, 'Comblain-la-Tour', 'BEL'),
(521, 7780, 'Comines', 'BEL'),
(522, 7780, 'Comines-Warneton', 'BEL'),
(523, 5590, 'Conneux', 'BEL'),
(524, 1005, 'Conseil Region Bruxelles-Capitale', 'BEL'),
(525, 1435, 'Corbais', 'BEL'),
(526, 6838, 'Corbion', 'BEL'),
(527, 7910, 'Cordes', 'BEL'),
(528, 5620, 'Corenne', 'BEL'),
(529, 4860, 'Cornesse', 'BEL'),
(530, 5555, 'Cornimont', 'BEL'),
(531, 5032, 'Corroy-le-Ch?teau', 'BEL'),
(532, 1325, 'Corroy-le-Grand', 'BEL'),
(533, 4257, 'Corswarem', 'BEL'),
(534, 1450, 'Cortil-Noirmont', 'BEL'),
(535, 5380, 'Cortil-Wodon', 'BEL'),
(536, 6010, 'Couillet', 'BEL'),
(537, 6180, 'Courcelles', 'BEL'),
(538, 5336, 'Courri?re', 'BEL'),
(539, 6120, 'Cour-sur-Heure', 'BEL'),
(540, 1490, 'Court-Saint-Etienne', 'BEL'),
(541, 4218, 'Couthuin', 'BEL'),
(542, 5300, 'Coutisse', 'BEL'),
(543, 1380, 'Couture-Saint-Germain', 'BEL'),
(544, 5660, 'Couvin', 'BEL'),
(545, 4280, 'Cras-Avernas', 'BEL'),
(546, 4280, 'Crehen', 'BEL'),
(547, 4367, 'Crisn?e', 'BEL'),
(548, 7120, 'Croix-lez-Rouveroy', 'BEL'),
(549, 4784, 'Crombach', 'BEL'),
(550, 5332, 'Crupet', 'BEL'),
(551, 7033, 'Cuesmes', 'BEL'),
(552, 6880, 'Cugnon', 'BEL'),
(553, 5660, 'Cul-des-Sarts', 'BEL'),
(554, 5562, 'Custinne', 'BEL'),
(555, 1045, 'D.I.V.', 'BEL'),
(556, 8890, 'Dadizele', 'BEL'),
(557, 5660, 'Dailly', 'BEL'),
(558, 9160, 'Daknam', 'BEL'),
(559, 4607, 'Dalhem', 'BEL'),
(560, 8340, 'Damme', 'BEL'),
(561, 6767, 'Dampicourt', 'BEL'),
(562, 6020, 'Dampremy', 'BEL'),
(563, 4253, 'Darion', 'BEL'),
(564, 5630, 'Daussois', 'BEL'),
(565, 5020, 'Daussoulx', 'BEL'),
(566, 5100, 'Dave', 'BEL'),
(567, 6929, 'Daverdisse', 'BEL'),
(568, 8420, 'De Haan', 'BEL'),
(569, 9170, 'De Klinge', 'BEL'),
(570, 8630, 'De Moeren', 'BEL'),
(571, 8660, 'De Panne', 'BEL'),
(572, 9840, 'De Pinte', 'BEL'),
(573, 8540, 'Deerlijk', 'BEL'),
(574, 9570, 'Deftinge', 'BEL'),
(575, 9800, 'Deinze', 'BEL'),
(576, 9280, 'Denderbelle', 'BEL'),
(577, 9450, 'Denderhoutem', 'BEL'),
(578, 9470, 'Denderleeuw', 'BEL'),
(579, 9200, 'Dendermonde', 'BEL'),
(580, 9400, 'Denderwindeke', 'BEL'),
(581, 5537, 'Den?e', 'BEL'),
(582, 8720, 'Dentergem', 'BEL'),
(583, 7912, 'Dergneau', 'BEL'),
(584, 2480, 'Dessel', 'BEL'),
(585, 8792, 'Desselgem', 'BEL'),
(586, 9070, 'Destelbergen', 'BEL'),
(587, 9042, 'Desteldonk', 'BEL'),
(588, 9831, 'Deurle', 'BEL'),
(589, 2100, 'Deurne (Antwerpen)', 'BEL'),
(590, 3290, 'Deurne (Bt.)', 'BEL'),
(591, 7864, 'Deux-Acren', 'BEL'),
(592, 5310, 'Dhuy', 'BEL'),
(593, 1831, 'Diegem', 'BEL'),
(594, 3590, 'Diepenbeek', 'BEL'),
(595, 3290, 'Diest', 'BEL'),
(596, 3700, 'Diets-Heur', 'BEL'),
(597, 8900, 'Dikkebus', 'BEL'),
(598, 9630, 'Dikkele', 'BEL'),
(599, 9890, 'Dikkelvenne', 'BEL'),
(600, 8600, 'Diksmuide', 'BEL'),
(601, 1700, 'Dilbeek', 'BEL'),
(602, 3650, 'Dilsen-Stokkem', 'BEL'),
(603, 5500, 'Dinant', 'BEL'),
(604, 5570, 'Dion', 'BEL'),
(605, 1325, 'Dion-Valmont', 'BEL'),
(606, 4820, 'Dison', 'BEL'),
(607, 6960, 'Dochamps', 'BEL'),
(608, 9130, 'Doel', 'BEL'),
(609, 6836, 'Dohan', 'BEL'),
(610, 5680, 'Doische', 'BEL'),
(611, 4140, 'Dolembreux', 'BEL'),
(612, 4357, 'Donceel', 'BEL'),
(613, 1370, 'Dongelberg', 'BEL'),
(614, 3540, 'Donk', 'BEL'),
(615, 6536, 'Donstiennes', 'BEL'),
(616, 5530, 'Dorinne', 'BEL'),
(617, 3440, 'Dormaal', 'BEL'),
(618, 7711, 'Dottenijs', 'BEL'),
(619, 7711, 'Dottignies', 'BEL'),
(620, 7370, 'Dour', 'BEL'),
(621, 5670, 'Dourbes', 'BEL'),
(622, 8951, 'Dranouter', 'BEL'),
(623, 5500, 'Dr?hance', 'BEL'),
(624, 8600, 'Driekapellen', 'BEL'),
(625, 3350, 'Drieslinter', 'BEL'),
(626, 1620, 'Drogenbos', 'BEL'),
(627, 9031, 'Drongen', 'BEL'),
(628, 8380, 'Dudzele', 'BEL'),
(629, 2570, 'Duffel', 'BEL'),
(630, 3080, 'Duisburg', 'BEL'),
(631, 3803, 'Duras', 'BEL'),
(632, 6940, 'Durbuy', 'BEL'),
(633, 5530, 'Durnal', 'BEL'),
(634, 1653, 'Dworp', 'BEL'),
(635, 1049, 'E.U.-Commissie', 'BEL'),
(636, 1048, 'E.U.-Raad', 'BEL'),
(637, 4690, 'Eben-Emael', 'BEL'),
(638, 6860, 'Ebly', 'BEL'),
(639, 7190, 'Ecaussinnes', 'BEL'),
(640, 7190, 'Ecaussinnes-d\'Enghien', 'BEL'),
(641, 7191, 'Ecaussinnes-Lalaing', 'BEL'),
(642, 2650, 'Edegem', 'BEL'),
(643, 9700, 'Edelare', 'BEL'),
(644, 7850, 'Edingen', 'BEL'),
(645, 9900, 'Eeklo', 'BEL'),
(646, 8480, 'Eernegem', 'BEL'),
(647, 8740, 'Egem', 'BEL'),
(648, 8630, 'Eggewaartskapelle', 'BEL'),
(649, 5310, 'Eghez?e', 'BEL'),
(650, 4120, 'Ehein', 'BEL'),
(651, 3740, 'Eigenbilzen', 'BEL'),
(652, 2430, 'Eindhout', 'BEL'),
(653, 9700, 'Eine', 'BEL'),
(654, 3630, 'Eisden', 'BEL'),
(655, 9810, 'Eke', 'BEL'),
(656, 2180, 'Ekeren (Antwerpen)', 'BEL'),
(657, 9160, 'Eksaarde', 'BEL'),
(658, 3941, 'Eksel', 'BEL'),
(659, 3650, 'Elen', 'BEL'),
(660, 9620, 'Elene', 'BEL'),
(661, 1982, 'Elewijt', 'BEL'),
(662, 3400, 'Eliksem', 'BEL'),
(663, 1671, 'Elingen', 'BEL'),
(664, 4590, 'Ellemelle', 'BEL'),
(665, 7890, 'Ellezelles', 'BEL'),
(666, 7910, 'Ellignies-lez-Frasnes', 'BEL'),
(667, 7972, 'Ellignies-Sainte-Anne', 'BEL'),
(668, 3670, 'Ellikom', 'BEL'),
(669, 7370, 'Elouges', 'BEL'),
(670, 9790, 'Elsegem', 'BEL'),
(671, 4750, 'Elsenborn', 'BEL'),
(672, 1050, 'Elsene', 'BEL'),
(673, 9660, 'Elst', 'BEL'),
(674, 8906, 'Elverdinge', 'BEL'),
(675, 9140, 'Elversele', 'BEL'),
(676, 2520, 'Emblem', 'BEL'),
(677, 4053, 'Embourg', 'BEL'),
(678, 8870, 'Emelgem', 'BEL'),
(679, 5080, 'Emines', 'BEL'),
(680, 5363, 'Emptinne', 'BEL'),
(681, 9700, 'Ename', 'BEL'),
(682, 3800, 'Engelmanshoven', 'BEL'),
(683, 7850, 'Enghien', 'BEL'),
(684, 4480, 'Engis', 'BEL'),
(685, 1350, 'Enines', 'BEL'),
(686, 4800, 'Ensival', 'BEL'),
(687, 7134, 'Epinois', 'BEL'),
(688, 1980, 'Eppegem', 'BEL'),
(689, 5580, 'Eprave', 'BEL'),
(690, 7050, 'Erbaut', 'BEL'),
(691, 7050, 'Erbisoeul', 'BEL'),
(692, 7500, 'Ere', 'BEL'),
(693, 9320, 'Erembodegem (Aalst)', 'BEL'),
(694, 6997, 'Erez?e', 'BEL'),
(695, 5644, 'Ermeton-sur-Biert', 'BEL'),
(696, 5030, 'Ernage', 'BEL'),
(697, 6972, 'Erneuville', 'BEL'),
(698, 4920, 'Ernonheid', 'BEL'),
(699, 9420, 'Erondegem', 'BEL'),
(700, 9420, 'Erpe', 'BEL'),
(701, 9420, 'Erpe-Mere', 'BEL'),
(702, 5101, 'Erpent', 'BEL'),
(703, 6441, 'Erpion', 'BEL'),
(704, 3071, 'Erps-Kwerps', 'BEL'),
(705, 6560, 'Erquelinnes', 'BEL'),
(706, 7387, 'Erquennes', 'BEL'),
(707, 9940, 'Ertvelde', 'BEL'),
(708, 9620, 'Erwetegem', 'BEL'),
(709, 7760, 'Escanaffles', 'BEL'),
(710, 8600, 'Esen', 'BEL'),
(711, 4130, 'Esneux', 'BEL'),
(712, 8587, 'Espierres', 'BEL'),
(713, 8587, 'Espierres-Helchin', 'BEL'),
(714, 7502, 'Esplechin', 'BEL'),
(715, 7743, 'Esquelmes', 'BEL'),
(716, 2910, 'Essen', 'BEL'),
(717, 1790, 'Essene', 'BEL'),
(718, 7730, 'Estaimbourg', 'BEL'),
(719, 7730, 'Estaimpuis', 'BEL'),
(720, 7120, 'Estinnes', 'BEL'),
(721, 7120, 'Estinnes-au-Mont', 'BEL'),
(722, 7120, 'Estinnes-au-Val', 'BEL'),
(723, 6740, 'Etalle', 'BEL'),
(724, 6760, 'Ethe', 'BEL'),
(725, 9680, 'Etikhove', 'BEL'),
(726, 8460, 'Ettelgem', 'BEL'),
(727, 1040, 'Etterbeek', 'BEL'),
(728, 7080, 'Eugies (Frameries)', 'BEL'),
(729, 4700, 'Eupen', 'BEL'),
(730, 1047, 'Europees Parlement', 'BEL'),
(731, 4631, 'Evegn?e', 'BEL'),
(732, 5350, 'Evelette', 'BEL'),
(733, 9660, 'Everbeek', 'BEL'),
(734, 3078, 'Everberg', 'BEL'),
(735, 1140, 'Evere', 'BEL'),
(736, 9940, 'Evergem', 'BEL'),
(737, 7730, 'Evregnies', 'BEL'),
(738, 5530, 'Evrehailles', 'BEL'),
(739, 4731, 'Eynatten', 'BEL'),
(740, 3400, 'Ezemaal', 'BEL'),
(741, 4090, 'F.B.A. (Forces Belges en Allemagne)', 'BEL'),
(742, 5600, 'Fagnolle', 'BEL'),
(743, 4317, 'Faimes', 'BEL'),
(744, 5522, 'Fala?n', 'BEL'),
(745, 5060, 'Falisolle', 'BEL'),
(746, 4260, 'Fallais', 'BEL'),
(747, 5500, 'Falmagne', 'BEL'),
(748, 5500, 'Falmignoul', 'BEL'),
(749, 7181, 'Familleureux', 'BEL'),
(750, 6240, 'Farciennes', 'BEL'),
(751, 5340, 'Faulx-les-Tombes', 'BEL'),
(752, 7120, 'Fauroeulx', 'BEL'),
(753, 6637, 'Fauvillers', 'BEL'),
(754, 4950, 'Faymonville', 'BEL'),
(755, 6856, 'Fays-les-Veneurs', 'BEL'),
(756, 7387, 'Fayt-le-Franc', 'BEL'),
(757, 7170, 'Fayt-lez-Manage', 'BEL'),
(758, 5570, 'Felenne', 'BEL'),
(759, 7181, 'Feluy', 'BEL'),
(760, 4607, 'Feneur', 'BEL'),
(761, 5380, 'Fernelmont', 'BEL'),
(762, 4190, 'Ferri?res', 'BEL'),
(763, 5570, 'Feschaux', 'BEL'),
(764, 4347, 'Fexhe-le-Haut-Clocher', 'BEL'),
(765, 4458, 'Fexhe-Slins', 'BEL'),
(766, 4181, 'Filot', 'BEL'),
(767, 5560, 'Finnevaux', 'BEL'),
(768, 4530, 'Fize-Fontaine', 'BEL'),
(769, 4367, 'Fize-le-Marsal', 'BEL'),
(770, 6686, 'Flamierge', 'BEL'),
(771, 5620, 'Flavion', 'BEL'),
(772, 5020, 'Flawinne', 'BEL'),
(773, 4400, 'Fl?malle', 'BEL'),
(774, 4400, 'Fl?malle-Grande', 'BEL'),
(775, 4400, 'Fl?malle-Haute', 'BEL'),
(776, 7012, 'Fl?nu', 'BEL'),
(777, 4620, 'Fl?ron', 'BEL'),
(778, 6220, 'Fleurus', 'BEL'),
(779, 7880, 'Flobecq', 'BEL'),
(780, 4540, 'Fl?ne', 'BEL'),
(781, 5334, 'Flor?e', 'BEL'),
(782, 5150, 'Floreffe', 'BEL'),
(783, 5620, 'Florennes', 'BEL'),
(784, 6820, 'Florenville', 'BEL'),
(785, 5150, 'Floriffoux', 'BEL'),
(786, 5370, 'Flostoy', 'BEL'),
(787, 5572, 'Focant', 'BEL'),
(788, 1212, 'FOD Mobiliteit', 'BEL'),
(789, 1350, 'Folx-les-Caves', 'BEL'),
(790, 6140, 'Fontaine-l\'Ev?que', 'BEL'),
(791, 6567, 'Fontaine-Valmont', 'BEL'),
(792, 5650, 'Fontenelle', 'BEL'),
(793, 6820, 'Fontenoille', 'BEL'),
(794, 7643, 'Fontenoy', 'BEL'),
(795, 4340, 'Fooz', 'BEL'),
(796, 6141, 'Forchies-la-Marche', 'BEL'),
(797, 1190, 'Forest', 'BEL'),
(798, 7910, 'Forest (Ht.)', 'BEL'),
(799, 4870, 'For?t', 'BEL'),
(800, 6596, 'Forge-Philippe', 'BEL'),
(801, 6464, 'Forges', 'BEL'),
(802, 6953, 'Forri?res', 'BEL'),
(803, 5380, 'Forville', 'BEL'),
(804, 4980, 'Fosse (Lg.)', 'BEL'),
(805, 5070, 'Fosses-la-Ville', 'BEL'),
(806, 7830, 'Fouleng', 'BEL'),
(807, 6440, 'Fourbechies', 'BEL'),
(808, 3798, 'Fouron-le-Comte', 'BEL'),
(809, 3790, 'Fourons', 'BEL'),
(810, 3790, 'Fouron-Saint-Martin', 'BEL'),
(811, 3792, 'Fouron-Saint-Pierre', 'BEL'),
(812, 5504, 'Foy-Notre-Dame', 'BEL'),
(813, 4870, 'Fraipont', 'BEL'),
(814, 5650, 'Fraire', 'BEL'),
(815, 4557, 'Fraiture', 'BEL'),
(816, 7080, 'Frameries', 'BEL'),
(817, 6853, 'Framont', 'BEL'),
(818, 5600, 'Franchimont', 'BEL'),
(819, 4970, 'Francorchamps', 'BEL'),
(820, 5380, 'Franc-Waret', 'BEL'),
(821, 5150, 'Frani?re', 'BEL'),
(822, 5660, 'Frasnes (Nam.)', 'BEL'),
(823, 7910, 'Frasnes-lez-Anvaing', 'BEL'),
(824, 7911, 'Frasnes-lez-Buissenal', 'BEL'),
(825, 6210, 'Frasnes-lez-Gosselies', 'BEL'),
(826, 4347, 'Freloux', 'BEL'),
(827, 6800, 'Freux', 'BEL'),
(828, 6440, 'Froidchapelle', 'BEL'),
(829, 5576, 'Froidfontaine', 'BEL'),
(830, 7504, 'Froidmont', 'BEL'),
(831, 6990, 'Fronville', 'BEL'),
(832, 7503, 'Froyennes', 'BEL'),
(833, 4260, 'Fumal', 'BEL'),
(834, 5500, 'Furfooz', 'BEL'),
(835, 5641, 'Furnaux', 'BEL'),
(836, 1750, 'Gaasbeek', 'BEL'),
(837, 7943, 'Gages', 'BEL'),
(838, 7906, 'Gallaix', 'BEL'),
(839, 1570, 'Galmaarden', 'BEL'),
(840, 1083, 'Ganshoren', 'BEL'),
(841, 7530, 'Gaurain-Ramecroix (Tournai)', 'BEL'),
(842, 9890, 'Gavere', 'BEL'),
(843, 5575, 'Gedinne', 'BEL'),
(844, 2440, 'Geel', 'BEL'),
(845, 4250, 'Geer', 'BEL'),
(846, 1367, 'Geest-G?rompont-Petit-Rosi?re', 'BEL'),
(847, 3450, 'Geetbets', 'BEL'),
(848, 5024, 'Gelbress?e', 'BEL'),
(849, 3800, 'Gelinden', 'BEL'),
(850, 3620, 'Gellik', 'BEL'),
(851, 3200, 'Gelrode', 'BEL'),
(852, 8980, 'Geluveld', 'BEL'),
(853, 8940, 'Geluwe', 'BEL'),
(854, 6929, 'Gembes', 'BEL'),
(855, 5030, 'Gembloux', 'BEL'),
(856, 4851, 'Gemmenich', 'BEL'),
(857, 1470, 'Genappe', 'BEL'),
(858, 3600, 'Genk', 'BEL'),
(859, 7040, 'Genly', 'BEL'),
(860, 3770, 'Genoelselderen', 'BEL'),
(861, 9000, 'Gent', 'BEL'),
(862, 9050, 'Gentbrugge', 'BEL'),
(863, 1450, 'Gentinnes', 'BEL'),
(864, 1332, 'Genval', 'BEL'),
(865, 9500, 'Geraardsbergen', 'BEL'),
(866, 3960, 'Gerdingen', 'BEL'),
(867, 5524, 'Gerin', 'BEL'),
(868, 1367, 'G?rompont', 'BEL'),
(869, 6769, 'G?rouville', 'BEL'),
(870, 6280, 'Gerpinnes', 'BEL'),
(871, 2590, 'Gestel', 'BEL'),
(872, 5340, 'Gesves', 'BEL'),
(873, 7822, 'Ghislenghien', 'BEL'),
(874, 7011, 'Ghlin', 'BEL'),
(875, 7863, 'Ghoy', 'BEL'),
(876, 7823, 'Gibecq', 'BEL'),
(877, 2275, 'Gierle', 'BEL'),
(878, 8691, 'Gijverinkhove', 'BEL'),
(879, 9308, 'Gijzegem', 'BEL'),
(880, 8570, 'Gijzelbrechtegem', 'BEL'),
(881, 9860, 'Gijzenzele', 'BEL'),
(882, 6060, 'Gilly (Charleroi)', 'BEL'),
(883, 5680, 'Gimn?e', 'BEL'),
(884, 3890, 'Gingelom', 'BEL'),
(885, 8470, 'Gistel', 'BEL'),
(886, 8830, 'Gits', 'BEL'),
(887, 7041, 'Givry', 'BEL'),
(888, 1473, 'Glabais', 'BEL'),
(889, 3380, 'Glabbeek-Zuurbemde', 'BEL'),
(890, 4000, 'Glain', 'BEL'),
(891, 4400, 'Gleixhe', 'BEL'),
(892, 1315, 'Glimes', 'BEL'),
(893, 4690, 'Glons', 'BEL'),
(894, 5680, 'Gochen?e', 'BEL'),
(895, 7160, 'Godarville', 'BEL'),
(896, 5530, 'Godinne', 'BEL'),
(897, 9620, 'Godveerdegem', 'BEL'),
(898, 4834, 'Go?', 'BEL'),
(899, 9500, 'Goeferdinge', 'BEL'),
(900, 7040, 'Goegnies-Chauss?e', 'BEL'),
(901, 5353, 'Goesnes', 'BEL'),
(902, 3300, 'Goetsenhoven', 'BEL'),
(903, 4140, 'Gomz?-Andoumont', 'BEL'),
(904, 7830, 'Gondregnies', 'BEL'),
(905, 5660, 'Gonrieux', 'BEL'),
(906, 9090, 'Gontrode', 'BEL'),
(907, 1755, 'Gooik', 'BEL'),
(908, 3803, 'Gorsem', 'BEL'),
(909, 3840, 'Gors-Opleeuw', 'BEL'),
(910, 6041, 'Gosselies', 'BEL'),
(911, 3840, 'Gotem', 'BEL'),
(912, 9800, 'Gottem', 'BEL'),
(913, 7070, 'Gottignies', 'BEL'),
(914, 6280, 'Gougnies', 'BEL'),
(915, 5651, 'Gourdinne', 'BEL'),
(916, 6030, 'Goutroux', 'BEL'),
(917, 6670, 'Gouvy', 'BEL'),
(918, 6181, 'Gouy-lez-Pi?ton', 'BEL'),
(919, 6534, 'Goz?e', 'BEL'),
(920, 4460, 'Gr?ce-Berleur', 'BEL'),
(921, 4460, 'Gr?ce-Hollogne', 'BEL'),
(922, 5555, 'Graide', 'BEL'),
(923, 9800, 'Grammene', 'BEL'),
(924, 4300, 'Grand-Axhe', 'BEL'),
(925, 7973, 'Grandglise', 'BEL'),
(926, 4280, 'Grand-Hallet', 'BEL'),
(927, 6698, 'Grand-Halleux', 'BEL'),
(928, 6940, 'Grandhan', 'BEL'),
(929, 5031, 'Grand-Leez', 'BEL'),
(930, 5030, 'Grand-Manil', 'BEL'),
(931, 6960, 'Grandmenil', 'BEL'),
(932, 7900, 'Grandmetz', 'BEL'),
(933, 4650, 'Grand-Rechain', 'BEL'),
(934, 6560, 'Grand-Reng', 'BEL'),
(935, 6470, 'Grandrieu', 'BEL'),
(936, 1367, 'Grand-Rosi?re-Hottomont', 'BEL'),
(937, 4360, 'Grandville', 'BEL'),
(938, 6840, 'Grandvoir', 'BEL'),
(939, 6840, 'Grapfontaine', 'BEL'),
(940, 7830, 'Graty', 'BEL'),
(941, 5640, 'Graux', 'BEL'),
(942, 3450, 'Grazen', 'BEL'),
(943, 9200, 'Grembergen', 'BEL'),
(944, 1390, 'Grez-Doiceau', 'BEL'),
(945, 1850, 'Grimbergen', 'BEL'),
(946, 9506, 'Grimminge', 'BEL'),
(947, 4030, 'Grivegn?e', 'BEL'),
(948, 2280, 'Grobbendonk', 'BEL'),
(949, 1702, 'Groot-Bijgaarden', 'BEL'),
(950, 3800, 'Groot-Gelmen', 'BEL'),
(951, 3840, 'Groot-Loon', 'BEL'),
(952, 7950, 'Grosage', 'BEL'),
(953, 5555, 'Gros-Fays', 'BEL'),
(954, 3990, 'Grote-Brogel', 'BEL'),
(955, 9620, 'Grotenberge', 'BEL'),
(956, 3740, 'Grote-Spouwen', 'BEL'),
(957, 3670, 'Gruitrode', 'BEL'),
(958, 6952, 'Grune', 'BEL'),
(959, 6927, 'Grupont', 'BEL'),
(960, 7620, 'Guignies', 'BEL'),
(961, 3723, 'Guigoven', 'BEL'),
(962, 6704, 'Guirsch', 'BEL'),
(963, 8560, 'Gullegem', 'BEL'),
(964, 3870, 'Gutschoven', 'BEL'),
(965, 3150, 'Haacht', 'BEL'),
(966, 9450, 'Haaltert', 'BEL'),
(967, 9120, 'Haasdonk', 'BEL'),
(968, 3053, 'Haasrode', 'BEL'),
(969, 6720, 'Habay', 'BEL'),
(970, 6720, 'Habay-la-Neuve', 'BEL'),
(971, 6723, 'Habay-la-Vieille', 'BEL'),
(972, 6782, 'Habergy', 'BEL'),
(973, 4684, 'Haccourt', 'BEL'),
(974, 6720, 'Hachy', 'BEL'),
(975, 7911, 'Hacquegnies', 'BEL'),
(976, 1130, 'Haren (Bruxelles)', 'BEL'),
(977, 5351, 'Haillot', 'BEL'),
(978, 7100, 'Haine-Saint-Paul', 'BEL'),
(979, 7100, 'Haine-Saint-Pierre', 'BEL'),
(980, 7350, 'Hainin', 'BEL'),
(981, 3300, 'Hakendover', 'BEL'),
(982, 6792, 'Halanzy', 'BEL'),
(983, 3545, 'Halen', 'BEL'),
(984, 2220, 'Hallaar', 'BEL'),
(985, 1500, 'Halle', 'BEL'),
(986, 2980, 'Halle (Kempen)', 'BEL'),
(987, 3440, 'Halle-Booienhoven', 'BEL'),
(988, 6986, 'Halleux', 'BEL'),
(989, 6922, 'Halma', 'BEL'),
(990, 3800, 'Halmaal', 'BEL'),
(991, 5340, 'Haltinne', 'BEL'),
(992, 3945, 'Ham', 'BEL'),
(993, 6840, 'Hamipr?', 'BEL'),
(994, 1785, 'Hamme (Bt.)', 'BEL'),
(995, 9220, 'Hamme (O.-Vl.)', 'BEL'),
(996, 1320, 'Hamme-Mille', 'BEL'),
(997, 4180, 'Hamoir', 'BEL'),
(998, 5360, 'Hamois', 'BEL'),
(999, 3930, 'Hamont', 'BEL'),
(1000, 3930, 'Hamont-Achel', 'BEL'),
(1001, 6990, 'Hampteau', 'BEL'),
(1002, 6120, 'Ham-sur-Heure', 'BEL'),
(1003, 6120, 'Ham-sur-Heure-Nalinnes', 'BEL'),
(1004, 5190, 'Ham-sur-Sambre', 'BEL'),
(1005, 8610, 'Handzame', 'BEL'),
(1006, 4357, 'Haneffe', 'BEL'),
(1007, 4210, 'Hann?che', 'BEL'),
(1008, 4280, 'Hannut', 'BEL'),
(1009, 5310, 'Hanret', 'BEL'),
(1010, 9850, 'Hansbeke', 'BEL'),
(1011, 5580, 'Han-sur-Lesse', 'BEL'),
(1012, 6560, 'Hantes-Wih?ries', 'BEL'),
(1013, 5621, 'Hanzinelle', 'BEL'),
(1014, 5621, 'Hanzinne', 'BEL'),
(1015, 7321, 'Harchies', 'BEL'),
(1016, 8530, 'Harelbeke', 'BEL'),
(1017, 3840, 'Haren (Borgloon)', 'BEL'),
(1018, 1130, 'Haren (Brussel)', 'BEL'),
(1019, 3700, 'Haren (Tongeren)', 'BEL'),
(1020, 6900, 'Hargimont', 'BEL'),
(1021, 7022, 'Harmignies', 'BEL'),
(1022, 6767, 'Harnoncourt', 'BEL'),
(1023, 6960, 'Harre', 'BEL'),
(1024, 6950, 'Harsin', 'BEL'),
(1025, 7022, 'Harveng', 'BEL'),
(1026, 4920, 'Harz?', 'BEL'),
(1027, 3500, 'Hasselt', 'BEL'),
(1028, 5540, 'Hasti?re', 'BEL'),
(1029, 5540, 'Hasti?re-Lavaux', 'BEL'),
(1030, 5541, 'Hasti?re-par-Del?', 'BEL'),
(1031, 6870, 'Hatrival', 'BEL'),
(1032, 7120, 'Haulchin', 'BEL'),
(1033, 4730, 'Hauset', 'BEL'),
(1034, 6929, 'Haut-Fays', 'BEL'),
(1035, 1461, 'Haut-Ittre', 'BEL'),
(1036, 5537, 'Haut-le-Wastia', 'BEL'),
(1037, 7334, 'Hautrage', 'BEL'),
(1038, 7041, 'Havay', 'BEL'),
(1039, 5370, 'Havelange', 'BEL'),
(1040, 5590, 'Haversin', 'BEL'),
(1041, 7531, 'Havinnes', 'BEL'),
(1042, 7021, 'Havr?', 'BEL'),
(1043, 3940, 'Hechtel', 'BEL'),
(1044, 3940, 'Hechtel-Eksel', 'BEL'),
(1045, 5543, 'Heer', 'BEL'),
(1046, 3870, 'Heers', 'BEL'),
(1047, 3740, 'Hees', 'BEL'),
(1048, 8551, 'Heestert', 'BEL'),
(1049, 2801, 'Heffen', 'BEL'),
(1050, 1670, 'Heikruis', 'BEL'),
(1051, 2830, 'Heindonk', 'BEL'),
(1052, 6700, 'Heinsch', 'BEL'),
(1053, 8301, 'Heist-aan-Zee', 'BEL'),
(1054, 2220, 'Heist-op-den-Berg', 'BEL'),
(1055, 1790, 'Hekelgem', 'BEL'),
(1056, 3870, 'Heks', 'BEL'),
(1057, 8587, 'Helchin', 'BEL'),
(1058, 3530, 'Helchteren', 'BEL'),
(1059, 9450, 'Heldergem', 'BEL'),
(1060, 1357, 'H?l?cine', 'BEL'),
(1061, 3440, 'Helen-Bos', 'BEL'),
(1062, 8587, 'Helkijn', 'BEL'),
(1063, 7830, 'Hellebecq', 'BEL'),
(1064, 9571, 'Hemelveerdegem', 'BEL'),
(1065, 2620, 'Hemiksem', 'BEL'),
(1066, 5380, 'Hemptinne (Fernelmont)', 'BEL'),
(1067, 5620, 'Hemptinne-lez-Florennes', 'BEL'),
(1068, 3840, 'Hendrieken', 'BEL'),
(1069, 3700, 'Henis', 'BEL'),
(1070, 7090, 'Hennuy?res', 'BEL'),
(1071, 4841, 'Henri-Chapelle', 'BEL'),
(1072, 7090, 'Henripont', 'BEL'),
(1073, 7350, 'Hensies', 'BEL'),
(1074, 3971, 'Heppen', 'BEL'),
(1075, 4771, 'Heppenbach', 'BEL'),
(1076, 6220, 'Heppignies', 'BEL'),
(1077, 6887, 'Herbeumont', 'BEL'),
(1078, 7050, 'Herchies', 'BEL'),
(1079, 3770, 'Herderen', 'BEL'),
(1080, 9310, 'Herdersem', 'BEL'),
(1081, 3020, 'Herent', 'BEL'),
(1082, 2200, 'Herentals', 'BEL'),
(1083, 2270, 'Herenthout', 'BEL'),
(1084, 1540, 'Herfelingen', 'BEL'),
(1085, 4728, 'Hergenrath', 'BEL'),
(1086, 7742, 'H?rinnes-lez-Pecq', 'BEL'),
(1087, 3540, 'Herk-de-Stad', 'BEL'),
(1088, 4681, 'Hermalle-sous-Argenteau', 'BEL'),
(1089, 4480, 'Hermalle-sous-Huy', 'BEL'),
(1090, 4680, 'Herm?e', 'BEL'),
(1091, 5540, 'Hermeton-sur-Meuse', 'BEL'),
(1092, 1540, 'Herne', 'BEL'),
(1093, 4217, 'H?ron', 'BEL'),
(1094, 7911, 'Herquegies', 'BEL'),
(1095, 7712, 'Herseaux', 'BEL'),
(1096, 2230, 'Herselt', 'BEL'),
(1097, 4040, 'Herstal', 'BEL'),
(1098, 3717, 'Herstappe', 'BEL'),
(1099, 7522, 'Hertain', 'BEL'),
(1100, 3831, 'Herten', 'BEL'),
(1101, 8020, 'Hertsberge', 'BEL'),
(1102, 4650, 'Herve', 'BEL'),
(1103, 9550, 'Herzele', 'BEL'),
(1104, 8501, 'Heule', 'BEL'),
(1105, 5377, 'Heure (Nam.)', 'BEL'),
(1106, 4682, 'Heure-le-Romain', 'BEL'),
(1107, 9700, 'Heurne', 'BEL'),
(1108, 3550, 'Heusden (Limb.)', 'BEL'),
(1109, 9070, 'Heusden (O.-Vl.)', 'BEL'),
(1110, 3550, 'Heusden-Zolder', 'BEL'),
(1111, 4802, 'Heusy', 'BEL'),
(1112, 8950, 'Heuvelland', 'BEL'),
(1113, 3191, 'Hever', 'BEL'),
(1114, 3001, 'Heverlee', 'BEL'),
(1115, 1435, 'H?villers', 'BEL'),
(1116, 6941, 'Heyd', 'BEL'),
(1117, 9550, 'Hillegem', 'BEL'),
(1118, 2880, 'Hingene', 'BEL'),
(1119, 5380, 'Hingeon', 'BEL'),
(1120, 6984, 'Hives', 'BEL'),
(1121, 2660, 'Hoboken (Antwerpen)', 'BEL'),
(1122, 4351, 'Hodeige', 'BEL'),
(1123, 6987, 'Hodister', 'BEL'),
(1124, 4162, 'Hody', 'BEL'),
(1125, 3320, 'Hoegaarden', 'BEL'),
(1126, 1560, 'Hoeilaart', 'BEL'),
(1127, 8340, 'Hoeke', 'BEL'),
(1128, 3746, 'Hoelbeek', 'BEL'),
(1129, 3471, 'Hoeleden', 'BEL'),
(1130, 3840, 'Hoepertingen', 'BEL'),
(1131, 3730, 'Hoeselt', 'BEL'),
(1132, 2940, 'Hoevenen', 'BEL'),
(1133, 1981, 'Hofstade (Bt.)', 'BEL'),
(1134, 9308, 'Hofstade (O.-Vl.)', 'BEL'),
(1135, 5377, 'Hogne', 'BEL'),
(1136, 4342, 'Hognoul', 'BEL'),
(1137, 7620, 'Hollain', 'BEL'),
(1138, 6637, 'Hollange', 'BEL'),
(1139, 8902, 'Hollebeke', 'BEL'),
(1140, 4460, 'Hollogne-aux-Pierres', 'BEL'),
(1141, 4250, 'Hollogne-sur-Geer', 'BEL'),
(1142, 3220, 'Holsbeek', 'BEL'),
(1143, 2811, 'Hombeek', 'BEL'),
(1144, 4852, 'Hombourg', 'BEL'),
(1145, 6640, 'Hompr?', 'BEL'),
(1146, 6780, 'Hondelange', 'BEL'),
(1147, 5570, 'Honnay', 'BEL'),
(1148, 7387, 'Honnelles', 'BEL'),
(1149, 8830, 'Hooglede', 'BEL'),
(1150, 8690, 'Hoogstade', 'BEL'),
(1151, 2320, 'Hoogstraten', 'BEL'),
(1152, 9667, 'Horebeke', 'BEL'),
(1153, 4460, 'Horion-Hoz?mont', 'BEL'),
(1154, 7301, 'Hornu', 'BEL'),
(1155, 3870, 'Horpmaal', 'BEL'),
(1156, 7060, 'Horrues', 'BEL'),
(1157, 6990, 'Hotton', 'BEL'),
(1158, 6724, 'Houdemont', 'BEL'),
(1159, 7110, 'Houdeng-Aimeries', 'BEL'),
(1160, 7110, 'Houdeng-Goegnies (La Louvi?re)', 'BEL'),
(1161, 5575, 'Houdremont', 'BEL'),
(1162, 6660, 'Houffalize', 'BEL'),
(1163, 5563, 'Hour', 'BEL'),
(1164, 4671, 'Housse', 'BEL'),
(1165, 7812, 'Houtaing', 'BEL'),
(1166, 1476, 'Houtain-le-Val', 'BEL'),
(1167, 4682, 'Houtain-Saint-Sim?on', 'BEL'),
(1168, 8377, 'Houtave', 'BEL'),
(1169, 8630, 'Houtem (W.-Vl.)', 'BEL'),
(1170, 3530, 'Houthalen', 'BEL'),
(1171, 3530, 'Houthalen-Helchteren', 'BEL'),
(1172, 7781, 'Houthem (Comines)', 'BEL'),
(1173, 8650, 'Houthulst', 'BEL'),
(1174, 2235, 'Houtvenne', 'BEL'),
(1175, 3390, 'Houwaart', 'BEL'),
(1176, 5530, 'Houx', 'BEL'),
(1177, 5560, 'Houyet', 'BEL'),
(1178, 2540, 'Hove', 'BEL'),
(1179, 7830, 'Hoves (Ht.)', 'BEL'),
(1180, 7624, 'Howardries', 'BEL'),
(1181, 4520, 'Huccorgne', 'BEL'),
(1182, 9750, 'Huise', 'BEL'),
(1183, 7950, 'Huissignies', 'BEL'),
(1184, 1654, 'Huizingen', 'BEL'),
(1185, 3040, 'Huldenberg', 'BEL'),
(1186, 2235, 'Hulshout', 'BEL'),
(1187, 5560, 'Hulsonniaux', 'BEL'),
(1188, 8531, 'Hulste', 'BEL'),
(1189, 6900, 'Humain', 'BEL'),
(1190, 1851, 'Humbeek', 'BEL'),
(1191, 9630, 'Hundelgem', 'BEL'),
(1192, 1367, 'Huppaye', 'BEL'),
(1193, 4500, 'Huy', 'BEL'),
(1194, 7022, 'Hyon', 'BEL'),
(1195, 8480, 'Ichtegem', 'BEL'),
(1196, 9472, 'Iddergem', 'BEL'),
(1197, 9506, 'Idegem', 'BEL'),
(1198, 8900, 'Ieper', 'BEL'),
(1199, 9340, 'Impe', 'BEL'),
(1200, 1315, 'Incourt', 'BEL'),
(1201, 8770, 'Ingelmunster', 'BEL'),
(1202, 8570, 'Ingooigem', 'BEL'),
(1203, 1041, 'International Press Center', 'BEL'),
(1204, 7801, 'Irchonwelz', 'BEL'),
(1205, 7822, 'Isi?res', 'BEL'),
(1206, 5032, 'Isnes', 'BEL'),
(1207, 2222, 'Itegem', 'BEL'),
(1208, 1701, 'Itterbeek', 'BEL'),
(1209, 1460, 'Ittre', 'BEL'),
(1210, 4400, 'Ivoz-Ramet', 'BEL'),
(1211, 1050, 'Ixelles', 'BEL'),
(1212, 8870, 'Izegem', 'BEL'),
(1213, 6810, 'Izel', 'BEL'),
(1214, 8691, 'Izenberge', 'BEL'),
(1215, 6941, 'Izier', 'BEL'),
(1216, 8490, 'Jabbeke', 'BEL'),
(1217, 4845, 'Jalhay', 'BEL'),
(1218, 5354, 'Jallet', 'BEL'),
(1219, 5600, 'Jamagne', 'BEL'),
(1220, 5100, 'Jambes (Namur)', 'BEL'),
(1221, 5600, 'Jamiolle', 'BEL'),
(1222, 6120, 'Jamioulx', 'BEL'),
(1223, 6810, 'Jamoigne', 'BEL'),
(1224, 1350, 'Jandrain-Jandrenouille', 'BEL'),
(1225, 1350, 'Jauche', 'BEL'),
(1226, 1370, 'Jauchelette', 'BEL'),
(1227, 5570, 'Javingue', 'BEL'),
(1228, 4540, 'Jehay', 'BEL'),
(1229, 6880, 'Jehonville', 'BEL'),
(1230, 7012, 'Jemappes', 'BEL'),
(1231, 5580, 'Jemelle', 'BEL'),
(1232, 4101, 'Jemeppe-sur-Meuse', 'BEL'),
(1233, 5190, 'Jemeppe-sur-Sambre', 'BEL'),
(1234, 4357, 'Jeneffe (Lg.)', 'BEL'),
(1235, 5370, 'Jeneffe (Nam.)', 'BEL'),
(1236, 3840, 'Jesseren (Kolmont)', 'BEL'),
(1237, 1090, 'Jette', 'BEL'),
(1238, 3890, 'Jeuk', 'BEL'),
(1239, 1370, 'Jodoigne', 'BEL'),
(1240, 1370, 'Jodoigne-Souveraine', 'BEL'),
(1241, 7620, 'Jollain-Merlin', 'BEL'),
(1242, 6280, 'Joncret', 'BEL'),
(1243, 4650, 'Jul?mont', 'BEL'),
(1244, 6040, 'Jumet (Charleroi)', 'BEL'),
(1245, 4020, 'Jupille-sur-Meuse', 'BEL'),
(1246, 4450, 'Juprelle', 'BEL'),
(1247, 7050, 'Jurbise', 'BEL'),
(1248, 6642, 'Juseret', 'BEL'),
(1249, 8600, 'Kaaskerke', 'BEL'),
(1250, 8870, 'Kachtem', 'BEL'),
(1251, 3293, 'Kaggevinne', 'BEL'),
(1252, 7540, 'Kain', 'BEL'),
(1253, 9270, 'Kalken', 'BEL'),
(1254, 9120, 'Kallo (Beveren-Waas)', 'BEL'),
(1255, 9130, 'Kallo (Kieldrecht)', 'BEL'),
(1256, 2920, 'Kalmthout', 'BEL'),
(1257, 1008, 'Kamer van Volksvertegenwoordigers', 'BEL'),
(1258, 1910, 'Kampenhout', 'BEL'),
(1259, 8700, 'Kanegem', 'BEL'),
(1260, 3770, 'Kanne', 'BEL'),
(1261, 2950, 'Kapellen (Antw.)', 'BEL'),
(1262, 3381, 'Kapellen (Bt.)', 'BEL'),
(1263, 1880, 'Kapelle-op-den-Bos', 'BEL'),
(1264, 9970, 'Kaprijke', 'BEL'),
(1265, 8572, 'Kaster', 'BEL'),
(1266, 2460, 'Kasterlee', 'BEL'),
(1267, 3950, 'Kaulille', 'BEL'),
(1268, 3140, 'Keerbergen', 'BEL'),
(1269, 8600, 'Keiem', 'BEL'),
(1270, 4720, 'Kelmis', 'BEL'),
(1271, 4367, 'Kemexhe', 'BEL'),
(1272, 8956, 'Kemmel', 'BEL'),
(1273, 9190, 'Kemzeke', 'BEL'),
(1274, 8581, 'Kerkhove', 'BEL'),
(1275, 3370, 'Kerkom', 'BEL'),
(1276, 3800, 'Kerkom-bij-Sint-Truiden', 'BEL'),
(1277, 9451, 'Kerksken', 'BEL'),
(1278, 3510, 'Kermt (Hasselt)', 'BEL'),
(1279, 3840, 'Kerniel', 'BEL'),
(1280, 3472, 'Kersbeek-Miskom', 'BEL'),
(1281, 2560, 'Kessel', 'BEL'),
(1282, 3010, 'Kessel-Lo (Leuven)', 'BEL'),
(1283, 3640, 'Kessenich', 'BEL'),
(1284, 1755, 'Kester', 'BEL'),
(1285, 4701, 'Kettenis', 'BEL'),
(1286, 5060, 'Keumi?e', 'BEL'),
(1287, 9130, 'Kieldrecht (Beveren)', 'BEL'),
(1288, 3640, 'Kinrooi', 'BEL'),
(1289, 3990, 'Kleine-Brogel', 'BEL'),
(1290, 3740, 'Kleine-Spouwen', 'BEL'),
(1291, 3870, 'Klein-Gelmen', 'BEL'),
(1292, 8420, 'Klemskerke', 'BEL'),
(1293, 8650, 'Klerken', 'BEL'),
(1294, 9690, 'Kluisbergen', 'BEL'),
(1295, 9940, 'Kluizen', 'BEL'),
(1296, 9910, 'Knesselare', 'BEL'),
(1297, 8300, 'Knokke', 'BEL'),
(1298, 8300, 'Knokke-Heist', 'BEL'),
(1299, 1730, 'Kobbegem', 'BEL'),
(1300, 8680, 'Koekelare', 'BEL'),
(1301, 1081, 'Koekelberg', 'BEL'),
(1302, 3582, 'Koersel', 'BEL'),
(1303, 8670, 'Koksijde', 'BEL'),
(1304, 3840, 'Kolmont (Borgloon)', 'BEL'),
(1305, 3700, 'Kolmont (Tongeren)', 'BEL'),
(1306, 7780, 'Komen', 'BEL'),
(1307, 7780, 'Komen-Waasten', 'BEL'),
(1308, 2500, 'Koningshooikt', 'BEL'),
(1309, 3700, 'Koninksem', 'BEL'),
(1310, 2550, 'Kontich', 'BEL'),
(1311, 8510, 'Kooigem', 'BEL'),
(1312, 8000, 'Koolkerke', 'BEL'),
(1313, 8851, 'Koolskamp', 'BEL'),
(1314, 3060, 'Korbeek-Dijle', 'BEL'),
(1315, 3360, 'Korbeek-Lo', 'BEL'),
(1316, 8610, 'Kortemark', 'BEL'),
(1317, 3470, 'Kortenaken', 'BEL'),
(1318, 3070, 'Kortenberg', 'BEL'),
(1319, 3720, 'Kortessem', 'BEL'),
(1320, 3890, 'Kortijs', 'BEL'),
(1321, 8500, 'Kortrijk', 'BEL'),
(1322, 3220, 'Kortrijk-Dutsel', 'BEL'),
(1323, 3850, 'Kozen', 'BEL'),
(1324, 1950, 'Kraainem', 'BEL'),
(1325, 8972, 'Krombeke', 'BEL'),
(1326, 9150, 'Kruibeke', 'BEL'),
(1327, 9770, 'Kruishoutem', 'BEL'),
(1328, 3300, 'Kumtich', 'BEL'),
(1329, 3511, 'Kuringen', 'BEL'),
(1330, 3840, 'Kuttekoven', 'BEL'),
(1331, 8520, 'Kuurne', 'BEL'),
(1332, 3945, 'Kwaadmechelen', 'BEL'),
(1333, 9690, 'Kwaremont', 'BEL'),
(1334, 7080, 'La Bouverie', 'BEL'),
(1335, 5080, 'La Bruy?re', 'BEL'),
(1336, 4720, 'La Calamine', 'BEL'),
(1337, 7611, 'La Glanerie', 'BEL'),
(1338, 4987, 'La Gleize', 'BEL'),
(1339, 7170, 'La Hestre', 'BEL'),
(1340, 1310, 'La Hulpe', 'BEL'),
(1341, 7100, 'La Louvi?re', 'BEL'),
(1342, 4910, 'La Reid', 'BEL'),
(1343, 6980, 'La Roche-en-Ardenne', 'BEL'),
(1344, 2430, 'Laakdal', 'BEL'),
(1345, 3400, 'Laar', 'BEL'),
(1346, 9270, 'Laarne', 'BEL'),
(1347, 6567, 'Labuissi?re', 'BEL'),
(1348, 6821, 'Lacuisine', 'BEL'),
(1349, 7950, 'Ladeuze', 'BEL'),
(1350, 1020, 'Laeken (Bruxelles)', 'BEL'),
(1351, 5550, 'Lafor?t', 'BEL'),
(1352, 7890, 'Lahamaide', 'BEL'),
(1353, 1020, 'Laken (Brussel)', 'BEL'),
(1354, 7522, 'Lamain', 'BEL'),
(1355, 4800, 'Lambermont', 'BEL'),
(1356, 6220, 'Lambusart', 'BEL'),
(1357, 4350, 'Lamine', 'BEL'),
(1358, 4210, 'Lamontz?e', 'BEL'),
(1359, 6767, 'Lamorteau', 'BEL'),
(1360, 8600, 'Lampernisse', 'BEL'),
(1361, 3620, 'Lanaken', 'BEL'),
(1362, 4600, 'Lanaye', 'BEL'),
(1363, 9850, 'Landegem', 'BEL'),
(1364, 6111, 'Landelies', 'BEL'),
(1365, 3400, 'Landen', 'BEL'),
(1366, 5300, 'Landenne', 'BEL'),
(1367, 9860, 'Landskouter', 'BEL'),
(1368, 5651, 'Laneffe', 'BEL'),
(1369, 3201, 'Langdorp', 'BEL'),
(1370, 8920, 'Langemark', 'BEL'),
(1371, 8920, 'Langemark-Poelkapelle', 'BEL'),
(1372, 3650, 'Lanklaar', 'BEL'),
(1373, 7800, 'Lanquesaint', 'BEL'),
(1374, 4450, 'Lantin', 'BEL'),
(1375, 4300, 'Lantremange', 'BEL'),
(1376, 7622, 'Laplaigne', 'BEL'),
(1377, 8340, 'Lapscheure', 'BEL'),
(1378, 1380, 'Lasne', 'BEL'),
(1379, 1380, 'Lasne-Chapelle-Saint-Lambert', 'BEL'),
(1380, 1370, 'Lathuy', 'BEL'),
(1381, 4261, 'Latinne', 'BEL'),
(1382, 6761, 'Latour', 'BEL'),
(1383, 3700, 'Lauw', 'BEL'),
(1384, 8930, 'Lauwe', 'BEL'),
(1385, 6681, 'Lavacherie', 'BEL'),
(1386, 5580, 'Lavaux-Sainte-Anne', 'BEL'),
(1387, 4217, 'Lavoir', 'BEL'),
(1388, 5670, 'Le Mesnil', 'BEL'),
(1389, 7070, 'Le Roeulx', 'BEL'),
(1390, 5070, 'Le Roux', 'BEL'),
(1391, 9280, 'Lebbeke', 'BEL'),
(1392, 1320, 'l\'Ecluse', 'BEL'),
(1393, 9340, 'Lede', 'BEL'),
(1394, 9050, 'Ledeberg (Gent)', 'BEL'),
(1395, 8880, 'Ledegem', 'BEL'),
(1396, 3061, 'Leefdaal', 'BEL'),
(1397, 1755, 'Leerbeek', 'BEL'),
(1398, 6142, 'Leernes', 'BEL'),
(1399, 6530, 'Leers-et-Fosteau', 'BEL'),
(1400, 7730, 'Leers-Nord', 'BEL'),
(1401, 2811, 'Leest', 'BEL'),
(1402, 9620, 'Leeuwergem', 'BEL'),
(1403, 8432, 'Leffinge', 'BEL'),
(1404, 6860, 'L?glise', 'BEL'),
(1405, 5590, 'Leignon', 'BEL'),
(1406, 8691, 'Leisele', 'BEL'),
(1407, 8600, 'Leke', 'BEL'),
(1408, 1502, 'Lembeek', 'BEL'),
(1409, 9971, 'Lembeke', 'BEL'),
(1410, 9820, 'Lemberge', 'BEL'),
(1411, 8860, 'Lendelede', 'BEL'),
(1412, 1750, 'Lennik', 'BEL'),
(1413, 7870, 'Lens', 'BEL'),
(1414, 4280, 'Lens-Saint-Remy', 'BEL'),
(1415, 4250, 'Lens-Saint-Servais', 'BEL'),
(1416, 4360, 'Lens-sur-Geer', 'BEL'),
(1417, 3970, 'Leopoldsburg', 'BEL'),
(1418, 4560, 'Les Avins', 'BEL'),
(1419, 6210, 'Les Bons Villers', 'BEL'),
(1420, 6811, 'Les Bulles', 'BEL'),
(1421, 6830, 'Les Hayons', 'BEL'),
(1422, 4317, 'Les Waleffes', 'BEL'),
(1423, 6464, 'l\'Escaill?re', 'BEL'),
(1424, 7621, 'Lesdain', 'BEL'),
(1425, 7860, 'Lessines', 'BEL'),
(1426, 5580, 'Lessive', 'BEL'),
(1427, 6953, 'Lesterny', 'BEL'),
(1428, 5170, 'Lesve', 'BEL'),
(1429, 7850, 'Lettelingen', 'BEL'),
(1430, 9521, 'Letterhoutem', 'BEL'),
(1431, 6500, 'Leugnies', 'BEL'),
(1432, 9700, 'Leupegem', 'BEL'),
(1433, 3630, 'Leut', 'BEL'),
(1434, 3000, 'Leuven', 'BEL'),
(1435, 5310, 'Leuze (Nam.)', 'BEL'),
(1436, 7900, 'Leuze-en-Hainaut', 'BEL'),
(1437, 6500, 'Leval-Chaudeville', 'BEL'),
(1438, 7134, 'Leval-Trahegnies', 'BEL'),
(1439, 6238, 'Liberchies', 'BEL'),
(1440, 6890, 'Libin', 'BEL'),
(1441, 6800, 'Libramont-Chevigny', 'BEL'),
(1442, 2460, 'Lichtaart', 'BEL'),
(1443, 8810, 'Lichtervelde', 'BEL'),
(1444, 1770, 'Liedekerke', 'BEL'),
(1445, 9400, 'Lieferinge', 'BEL'),
(1446, 4000, 'Li?ge', 'BEL'),
(1447, 4020, 'Li?ge', 'BEL'),
(1448, 4030, 'Li?ge', 'BEL'),
(1449, 2500, 'Lier', 'BEL'),
(1450, 9570, 'Lierde', 'BEL'),
(1451, 4990, 'Lierneux', 'BEL'),
(1452, 5310, 'Liernu', 'BEL'),
(1453, 4042, 'Liers', 'BEL'),
(1454, 2870, 'Liezele', 'BEL'),
(1455, 7812, 'Ligne', 'BEL'),
(1456, 4254, 'Ligney', 'BEL'),
(1457, 5140, 'Ligny', 'BEL'),
(1458, 2275, 'Lille', 'BEL'),
(1459, 2040, 'Lillo', 'BEL'),
(1460, 1428, 'Lillois-Witterz?e', 'BEL'),
(1461, 1300, 'Limal', 'BEL'),
(1462, 4830, 'Limbourg', 'BEL'),
(1463, 1342, 'Limelette', 'BEL'),
(1464, 6670, 'Limerl?', 'BEL'),
(1465, 4357, 'Limont', 'BEL'),
(1466, 4287, 'Lincent', 'BEL'),
(1467, 3210, 'Linden', 'BEL'),
(1468, 1630, 'Linkebeek', 'BEL'),
(1469, 3560, 'Linkhout', 'BEL'),
(1470, 1357, 'Linsmeau', 'BEL'),
(1471, 2547, 'Lint', 'BEL'),
(1472, 3350, 'Linter', 'BEL'),
(1473, 2890, 'Lippelo', 'BEL'),
(1474, 5501, 'Lisogne', 'BEL'),
(1475, 8380, 'Lissewege', 'BEL'),
(1476, 5101, 'Lives-sur-Meuse', 'BEL'),
(1477, 4600, 'Lixhe', 'BEL'),
(1478, 8647, 'Lo', 'BEL'),
(1479, 6540, 'Lobbes', 'BEL'),
(1480, 9080, 'Lochristi', 'BEL'),
(1481, 6042, 'Lodelinsart', 'BEL'),
(1482, 2990, 'Loenhout', 'BEL'),
(1483, 8958, 'Loker', 'BEL'),
(1484, 9160, 'Lokeren', 'BEL'),
(1485, 3545, 'Loksbergen', 'BEL'),
(1486, 8434, 'Lombardsijde', 'BEL'),
(1487, 7870, 'Lombise', 'BEL'),
(1488, 3920, 'Lommel', 'BEL'),
(1489, 4783, 'Lommersweiler', 'BEL'),
(1490, 6463, 'Lompret', 'BEL'),
(1491, 6924, 'Lomprez', 'BEL'),
(1492, 4431, 'Loncin', 'BEL'),
(1493, 1840, 'Londerzeel', 'BEL'),
(1494, 6688, 'Longchamps (Lux.)', 'BEL'),
(1495, 5310, 'Longchamps (Nam.)', 'BEL'),
(1496, 6840, 'Longlier', 'BEL'),
(1497, 1325, 'Longueville', 'BEL'),
(1498, 6600, 'Longvilly', 'BEL'),
(1499, 4710, 'Lontzen', 'BEL'),
(1500, 5030, 'Lonz?e', 'BEL'),
(1501, 3040, 'Loonbeek', 'BEL'),
(1502, 8210, 'Loppem', 'BEL'),
(1503, 4987, 'Lorc?', 'BEL'),
(1504, 8647, 'Lo-Reninge', 'BEL'),
(1505, 1651, 'Lot', 'BEL'),
(1506, 9880, 'Lotenhulle', 'BEL'),
(1507, 5575, 'Louette-Saint-Denis', 'BEL'),
(1508, 5575, 'Louette-Saint-Pierre', 'BEL'),
(1509, 1471, 'Loupoigne', 'BEL'),
(1510, 1348, 'Louvain-la-Neuve', 'BEL'),
(1511, 4141, 'Louveign?', 'BEL'),
(1512, 9920, 'Lovendegem', 'BEL'),
(1513, 3360, 'Lovenjoel', 'BEL'),
(1514, 6280, 'Loverval', 'BEL'),
(1515, 5101, 'Loyers', 'BEL'),
(1516, 3210, 'Lubbeek', 'BEL'),
(1517, 7700, 'Luingne', 'BEL'),
(1518, 3560, 'Lummen', 'BEL'),
(1519, 5170, 'Lustin', 'BEL'),
(1520, 6238, 'Luttre', 'BEL'),
(1521, 9680, 'Maarkedal', 'BEL'),
(1522, 9680, 'Maarke-Kerkem', 'BEL'),
(1523, 3680, 'Maaseik', 'BEL'),
(1524, 3630, 'Maasmechelen', 'BEL'),
(1525, 6663, 'Mabompr?', 'BEL'),
(1526, 1830, 'Machelen (Bt.)', 'BEL'),
(1527, 9870, 'Machelen (O.-Vl.)', 'BEL'),
(1528, 6591, 'Macon', 'BEL'),
(1529, 6593, 'Macquenoise', 'BEL'),
(1530, 5374, 'Maffe', 'BEL'),
(1531, 7810, 'Maffle', 'BEL'),
(1532, 4623, 'Magn?e', 'BEL'),
(1533, 5330, 'Maillen', 'BEL'),
(1534, 7812, 'Mainvault', 'BEL'),
(1535, 7020, 'Maisi?res', 'BEL'),
(1536, 6852, 'Maissin', 'BEL'),
(1537, 5300, 'Maizeret', 'BEL'),
(1538, 3700, 'Mal', 'BEL'),
(1539, 9990, 'Maldegem', 'BEL'),
(1540, 1840, 'Malderen', 'BEL'),
(1541, 6960, 'Malempr?', 'BEL'),
(1542, 1360, 'Mal?ves-Sainte-Marie-Wastines', 'BEL'),
(1543, 2390, 'Malle', 'BEL'),
(1544, 4960, 'Malmedy', 'BEL'),
(1545, 5020, 'Malonne', 'BEL'),
(1546, 5575, 'Malvoisin', 'BEL'),
(1547, 7170, 'Manage', 'BEL'),
(1548, 4760, 'Manderfeld', 'BEL'),
(1549, 6960, 'Manhay', 'BEL'),
(1550, 8433, 'Mannekensvere', 'BEL'),
(1551, 1380, 'Maransart', 'BEL'),
(1552, 1495, 'Marbais (Bt.)', 'BEL'),
(1553, 6120, 'Marbaix (Ht.)', 'BEL'),
(1554, 6724, 'Marbehan', 'BEL'),
(1555, 6900, 'Marche-en-Famenne', 'BEL'),
(1556, 5024, 'Marche-les-Dames', 'BEL'),
(1557, 7190, 'Marche-lez-Ecaussinnes', 'BEL'),
(1558, 6030, 'Marchienne-au-Pont', 'BEL'),
(1559, 4570, 'Marchin', 'BEL'),
(1560, 7387, 'Marchipont', 'BEL'),
(1561, NULL, NULL, NULL);
INSERT INTO `t_gemeente` (`d_index`, `d_postcode`, `d_gemeentenaam`, `d_land`) VALUES
(1562, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_gender`
--

CREATE TABLE `t_gender` (
  `d_index` int(11) NOT NULL,
  `d_sex` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_gender`
--

INSERT INTO `t_gender` (`d_index`, `d_sex`) VALUES
(0, ''),
(1, 'V'),
(2, 'M'),
(3, 'X');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_list`
--

CREATE TABLE `t_list` (
  `d_index` int(11) NOT NULL,
  `d_aantal` smallint(4) DEFAULT NULL,
  `t_producten_d_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_menu`
--

CREATE TABLE `t_menu` (
  `d_index` int(11) NOT NULL,
  `d_item` varchar(20) DEFAULT NULL,
  `d_link` varchar(100) DEFAULT NULL,
  `d_volgorde` tinyint(4) DEFAULT NULL,
  `d_menu` tinyint(4) DEFAULT NULL,
  `d_0` tinyint(3) DEFAULT NULL,
  `d_1` tinyint(3) DEFAULT NULL,
  `d_2` tinyint(3) DEFAULT NULL,
  `d_3` int(11) NOT NULL,
  `d_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_menu`
--

INSERT INTO `t_menu` (`d_index`, `d_item`, `d_link`, `d_volgorde`, `d_menu`, `d_0`, `d_1`, `d_2`, `d_3`, `d_4`) VALUES
(1, 'Shoppen', 'klant_select.php?actie=1', 2, 3, 0, 1, 0, 0, 0),
(2, 'Registeren', 'resgisteren.php', 1, 2, 1, 1, 1, 1, 1),
(3, 'Login', 'login.php', 1, 1, 1, 1, 1, 1, 1),
(4, 'Registeren', 'resgisteren.php', 1, 0, 1, 1, 1, 1, 1),
(5, 'Login', 'login.php', 1, 0, 1, 1, 1, 1, 1),
(6, 'Home', 'bezoeker.php', 0, 2, 1, 0, 0, 0, 0),
(7, 'Home', 'bezoeker.php', 0, 1, 1, 0, 0, 0, 0),
(46, 'fa fa-shopping-cart', 'klant_select.php?actie=4', 5, 3, 0, 1, 0, 0, 0),
(47, 'Afrekenen', 'klant_select.php?actie=5', 0, 3, 0, 1, 0, 0, 0),
(48, 'Factuur', 'klant_select.php?actie=2', 3, 3, 0, 1, 0, 0, 0),
(49, 'fa fa-home', 'home_klant.php', 0, 3, 0, 1, 0, 0, 0),
(50, 'Profiel', 'klant_select.php?actie=3', 1, 3, 0, 1, 0, 0, 0),
(51, 'Aanpassen', 'klant_select.php?actie=6', 0, 3, 0, 1, 0, 0, 0),
(52, 'Logout', 'logout.php', 6, 3, 0, 1, 0, 0, 0),
(53, 'fa fa-home', 'home_admin.php', 0, 4, 0, 0, 1, 0, 0),
(54, 'Logout', 'logout.php', 5, 4, 0, 0, 1, 0, 0),
(55, 'Admin', 'a_admin.php', 2, 4, 0, 0, 1, 0, 0),
(57, 'Errors', 'errors.php', 4, 4, 0, 0, 1, 0, 0),
(58, 'fa fa-home', 'home_admin.php', 1, 5, 0, 0, 1, 0, 0),
(59, 'Bekijken', 'select.php?actie=7', 2, 5, 0, 0, 1, 0, 0),
(60, 'Aanpassen ', 'select.php?actie=8', 3, 5, 0, 0, 1, 0, 0),
(61, 'Toevoegen', 'select.php?actie=9', 4, 5, 0, 0, 1, 0, 0),
(62, 'Verwijderen', 'select.php?actie=10', 5, 5, 0, 0, 1, 0, 0),
(63, 'fa fa-home', 'home_admin.php', 0, 6, 0, 0, 1, 0, 0),
(64, 'Back up', 'errors.php?dwn=go', 1, 6, 0, 0, 1, 0, 0),
(65, 'Login', '../scripts/login.php', 2, 7, 1, 0, 0, 0, 0),
(66, 'Home', '../scripts/bezoeker.php', 0, 7, 1, 0, 0, 0, 0),
(67, NULL, 'sdqqs', NULL, NULL, NULL, NULL, NULL, 0, 0),
(68, NULL, 'qsddqs', NULL, NULL, NULL, NULL, NULL, 0, 0),
(69, 'Verwijderen', 'errors.php?reset=go', 3, 6, 0, 0, 1, 0, 0),
(70, 'Contact', 'contact.php', 10, 0, 1, 1, 0, 0, 0),
(71, 'Contact', 'contact.php', 3, 2, 1, 1, 0, 0, 0),
(72, 'Contact', 'contact.php', 5, 3, 1, 1, 0, 0, 0),
(73, 'Contact', 'contact.php', 10, 1, 1, 1, 0, 0, 0),
(74, 'Registeren', '../scripts/resgisteren.php', 1, 7, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_mnemonic`
--

CREATE TABLE `t_mnemonic` (
  `d_index` int(11) NOT NULL,
  `d_mnemonic` varchar(45) NOT NULL,
  `d_table` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_mnemonic`
--

INSERT INTO `t_mnemonic` (`d_index`, `d_mnemonic`, `d_table`) VALUES
(1, 'factuur', 't_factuur'),
(2, 'Leden', 'v_full_gegevens_users'),
(3, 'Prodcuten', 'v_selectproducten'),
(4, 'Product soort', 't_soort');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_mnemonic_user`
--

CREATE TABLE `t_mnemonic_user` (
  `d_index` tinyint(2) NOT NULL,
  `d_mnemonic` varchar(45) NOT NULL,
  `d_table` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_mnemonic_user`
--

INSERT INTO `t_mnemonic_user` (`d_index`, `d_mnemonic`, `d_table`) VALUES
(1, 'Bedrijf gegevens', 't_bedrijf'),
(4, 'Persoonlijk gegevens', 't_users'),
(5, 'Paswoord gegevens', 't_authentication');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_producten`
--

CREATE TABLE `t_producten` (
  `d_index` int(11) NOT NULL,
  `d_productNaam` varchar(100) DEFAULT NULL,
  `d_img` varchar(100) DEFAULT NULL,
  `d_prijs` float DEFAULT NULL,
  `d_psofkg` char(2) DEFAULT NULL,
  `d_beschrijving` longtext,
  `t_soort_d_index` int(10) UNSIGNED NOT NULL,
  `t_btw_d_index` int(11) NOT NULL,
  `d_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_producten`
--

INSERT INTO `t_producten` (`d_index`, `d_productNaam`, `d_img`, `d_prijs`, `d_psofkg`, `d_beschrijving`, `t_soort_d_index`, `t_btw_d_index`, `d_stock`) VALUES
(2, 'Tomaten', '../img/tomaat.jpg', 2, 'kg', 'Bel', 3, 2, 36),
(3, 'Prei', '../img/prei.jpg', 4, 'ps', 'bel', 3, 2, 19),
(8, 'Suraj', '../img/FTi16n2.png', 5, 'kg', 'dit is een test2', 1, 3, 1),
(9, 'Appel', '../img/FTl11e16.png', 2.5, 'kg', 'zoete appels ', 2, 2, 0),
(10, 'Visstick', '../img/FTn12h14.png', 5, 'ps', 'iglo', 6, 3, 39),
(11, 'Pot test', '../img/FTf3m8.png', 35, 'ps', 'Metaal , 2 l', 4, 4, 20),
(12, 'Mes', '../img/FTd5g11.png', 3, 'ps', 'millennium', 5, 4, 30),
(14, 'stink kaas', '../img/FTd13d5.png', 30, 'ps', 'stink-kaas, bel', 8, 3, 25),
(15, 'Melk', '../img/FTa2m2.png', 2, 'ps', 'Volle Melk', 8, 2, 12),
(16, 'pan', '../img/FTg13l1.png', 55, 'ps', 'test', 7, 3, 46),
(17, 'pan', '../img/FT9k15.png', 55, 'ps', 'te', 1, 2, 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_rol`
--

CREATE TABLE `t_rol` (
  `d_index` int(11) NOT NULL,
  `d_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_rol`
--

INSERT INTO `t_rol` (`d_index`, `d_rol`) VALUES
(0, ''),
(1, 'klant'),
(2, 'Magazijn'),
(3, 'Verantwoordelijk'),
(4, 'Baas');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_soort`
--

CREATE TABLE `t_soort` (
  `d_index` int(10) UNSIGNED NOT NULL,
  `d_soorNaam` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_soort`
--

INSERT INTO `t_soort` (`d_index`, `d_soorNaam`) VALUES
(1, 'Alle Producten'),
(2, 'Fruit'),
(3, 'Groeten'),
(4, 'Potten'),
(5, 'Bestekken'),
(6, 'Diepvriesproducte'),
(7, 'Pannen'),
(8, 'Zuivel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `t_users`
--

CREATE TABLE `t_users` (
  `d_index` int(11) NOT NULL,
  `d_naam` varchar(45) DEFAULT NULL,
  `d_email` varchar(100) DEFAULT NULL,
  `d_geboortedatum` date DEFAULT NULL,
  `d_voornaam` varchar(45) DEFAULT NULL,
  `d_straat` varchar(100) DEFAULT NULL,
  `d_huisNummer` char(5) DEFAULT NULL,
  `d_telefoonnummer` varchar(11) DEFAULT NULL,
  `d_datum` date DEFAULT NULL,
  `t_gender_d_index` int(11) NOT NULL,
  `t_adres_d_index` int(11) NOT NULL,
  `t_aanspreekTitel_d_index` int(11) NOT NULL,
  `t_rol_d_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `t_users`
--

INSERT INTO `t_users` (`d_index`, `d_naam`, `d_email`, `d_geboortedatum`, `d_voornaam`, `d_straat`, `d_huisNummer`, `d_telefoonnummer`, `d_datum`, `t_gender_d_index`, `t_adres_d_index`, `t_aanspreekTitel_d_index`, `t_rol_d_index`) VALUES
(1, 'suraj', 'nirmalsuraj2@gmail.com', '1993-09-12', 'nirmal', 'plantin en moretuslei', '137', '03/2592027', '2020-04-15', 1, 321, 2, 1),
(2, 'nirmal', 'flores@gmail.com', '2019-08-27', 'sunil', 'plantin en moretuslei', '187', '03/5552020', '2020-04-18', 2, 321, 1, 2),
(12, 'abi', 'sunny@gmail.com', '1993-09-12', 'nir', 'plantin', '12', '03/1351660', '2020-06-02', 2, 60, 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_bijwerken`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `v_bijwerken` (
`d_id` int(11)
,`d_productNaam` varchar(100)
,`d_img` varchar(100)
,`d_prijs` float
,`d_btw` varchar(45)
,`d_aantal` smallint(4)
,`d_index` int(11)
,`t_soort_d_index` int(10) unsigned
,`d_psofkg` char(2)
,`d_stock` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_full_gegevens_bedrijf`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `v_full_gegevens_bedrijf` (
`d_index` int(11)
,`d_naam` varchar(60)
,`d_btw` varchar(45)
,`d_straat` varchar(50)
,`d_telefoonnummer` varchar(11)
,`d_huisNummer` char(5)
,`d_user` int(11)
,`d_postcode` smallint(4)
,`d_gemeentenaam` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_full_gegevens_users`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `v_full_gegevens_users` (
`d_index` int(11)
,`d_aanspreekTitel` varchar(10)
,`d_aanspreekindx` int(11)
,`d_naam` varchar(45)
,`d_voornaam` varchar(45)
,`d_email` varchar(100)
,`d_geboortedatum` date
,`d_straat` varchar(100)
,`d_huisNummer` char(5)
,`d_rol` varchar(45)
,`d_rol_index` int(11)
,`d_telefoonnummer` varchar(11)
,`d_gemeentenaam` varchar(100)
,`d_pk` int(11)
,`d_postcode` smallint(4)
,`d_sex` varchar(2)
,`d_sex_index` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_selectproducten`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `v_selectproducten` (
`d_index` int(11)
,`d_productNaam` varchar(100)
,`d_img` varchar(100)
,`d_prijs` float
,`d_beschrijving` longtext
,`d_btw` varchar(45)
,`d_btxind` int(11)
,`d_stock` int(11)
,`d_soorNaam` varchar(45)
,`d_psofkg` char(2)
,`t_soort_d_index` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Structuur voor de view `v_bijwerken`
--
DROP TABLE IF EXISTS `v_bijwerken`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bijwerken`  AS  select `t_list`.`d_index` AS `d_id`,`t_producten`.`d_productNaam` AS `d_productNaam`,`t_producten`.`d_img` AS `d_img`,`t_producten`.`d_prijs` AS `d_prijs`,`t_btw`.`d_btw` AS `d_btw`,`t_list`.`d_aantal` AS `d_aantal`,`t_producten`.`d_index` AS `d_index`,`t_producten`.`t_soort_d_index` AS `t_soort_d_index`,`t_producten`.`d_psofkg` AS `d_psofkg`,`t_producten`.`d_stock` AS `d_stock` from ((`t_list` join `t_producten` on((`t_list`.`t_producten_d_index` = `t_producten`.`d_index`))) join `t_btw` on((`t_producten`.`t_btw_d_index` = `t_btw`.`d_index`))) ;

-- --------------------------------------------------------

--
-- Structuur voor de view `v_full_gegevens_bedrijf`
--
DROP TABLE IF EXISTS `v_full_gegevens_bedrijf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_full_gegevens_bedrijf`  AS  select `t_bedrijf`.`d_index` AS `d_index`,`t_bedrijf`.`d_naam` AS `d_naam`,`t_bedrijf`.`d_btw` AS `d_btw`,`t_bedrijf`.`d_straat` AS `d_straat`,`t_bedrijf`.`d_telefoonnummer` AS `d_telefoonnummer`,`t_bedrijf`.`d_huisNummer` AS `d_huisNummer`,`t_bedrijf`.`t_users_d_index` AS `d_user`,`t_gemeente`.`d_postcode` AS `d_postcode`,`t_gemeente`.`d_gemeentenaam` AS `d_gemeentenaam` from (`t_bedrijf` join `t_gemeente` on((`t_bedrijf`.`t_gemeente_d_index` = `t_gemeente`.`d_index`))) ;

-- --------------------------------------------------------

--
-- Structuur voor de view `v_full_gegevens_users`
--
DROP TABLE IF EXISTS `v_full_gegevens_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_full_gegevens_users`  AS  select `us`.`d_index` AS `d_index`,`t_aanspreektitel`.`d_aanspreekTitel` AS `d_aanspreekTitel`,`t_aanspreektitel`.`d_index` AS `d_aanspreekindx`,`us`.`d_naam` AS `d_naam`,`us`.`d_voornaam` AS `d_voornaam`,`us`.`d_email` AS `d_email`,`us`.`d_geboortedatum` AS `d_geboortedatum`,`us`.`d_straat` AS `d_straat`,`us`.`d_huisNummer` AS `d_huisNummer`,`t_rol`.`d_rol` AS `d_rol`,`t_rol`.`d_index` AS `d_rol_index`,`us`.`d_telefoonnummer` AS `d_telefoonnummer`,`t_gemeente`.`d_gemeentenaam` AS `d_gemeentenaam`,`t_gemeente`.`d_index` AS `d_pk`,`t_gemeente`.`d_postcode` AS `d_postcode`,`t_gender`.`d_sex` AS `d_sex`,`t_gender`.`d_index` AS `d_sex_index` from ((((`t_users` `us` join `t_gemeente` on((`us`.`t_adres_d_index` = `t_gemeente`.`d_index`))) join `t_gender` on((`us`.`t_gender_d_index` = `t_gender`.`d_index`))) join `t_aanspreektitel` on((`us`.`t_aanspreekTitel_d_index` = `t_aanspreektitel`.`d_index`))) join `t_rol` on((`us`.`t_rol_d_index` = `t_rol`.`d_index`))) ;

-- --------------------------------------------------------

--
-- Structuur voor de view `v_selectproducten`
--
DROP TABLE IF EXISTS `v_selectproducten`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_selectproducten`  AS  select `x`.`d_index` AS `d_index`,`x`.`d_productNaam` AS `d_productNaam`,`x`.`d_img` AS `d_img`,`x`.`d_prijs` AS `d_prijs`,`x`.`d_beschrijving` AS `d_beschrijving`,`t_btw`.`d_btw` AS `d_btw`,`t_btw`.`d_index` AS `d_btxind`,`x`.`d_stock` AS `d_stock`,`t_soort`.`d_soorNaam` AS `d_soorNaam`,`x`.`d_psofkg` AS `d_psofkg`,`x`.`t_soort_d_index` AS `t_soort_d_index` from ((`t_producten` `x` join `t_soort` on((`x`.`t_soort_d_index` = `t_soort`.`d_index`))) join `t_btw` on((`x`.`t_btw_d_index` = `t_btw`.`d_index`))) ;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `t_aanspreektitel`
--
ALTER TABLE `t_aanspreektitel`
  ADD PRIMARY KEY (`d_index`),
  ADD UNIQUE KEY `d_index_UNIQUE` (`d_index`);

--
-- Indexen voor tabel `t_authentication`
--
ALTER TABLE `t_authentication`
  ADD PRIMARY KEY (`d_user`);

--
-- Indexen voor tabel `t_authorised`
--
ALTER TABLE `t_authorised`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_bedrijf`
--
ALTER TABLE `t_bedrijf`
  ADD PRIMARY KEY (`d_index`),
  ADD KEY `fk_t_bedrijf_t_users1_idx` (`t_users_d_index`),
  ADD KEY `fk_t_bedrijf_t_gemeente1_idx` (`t_gemeente_d_index`);

--
-- Indexen voor tabel `t_btw`
--
ALTER TABLE `t_btw`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_factuur`
--
ALTER TABLE `t_factuur`
  ADD PRIMARY KEY (`d_index`),
  ADD UNIQUE KEY `d_index_UNIQUE` (`d_index`),
  ADD KEY `fk_t_order_t_users1_idx` (`t_users_d_index`);

--
-- Indexen voor tabel `t_gemeente`
--
ALTER TABLE `t_gemeente`
  ADD PRIMARY KEY (`d_index`),
  ADD UNIQUE KEY `d_index_UNIQUE` (`d_index`);

--
-- Indexen voor tabel `t_gender`
--
ALTER TABLE `t_gender`
  ADD PRIMARY KEY (`d_index`),
  ADD UNIQUE KEY `d_index_UNIQUE` (`d_index`);

--
-- Indexen voor tabel `t_list`
--
ALTER TABLE `t_list`
  ADD PRIMARY KEY (`d_index`,`t_producten_d_index`),
  ADD KEY `fk_t_list_t_producten1_idx` (`t_producten_d_index`);

--
-- Indexen voor tabel `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_mnemonic`
--
ALTER TABLE `t_mnemonic`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_mnemonic_user`
--
ALTER TABLE `t_mnemonic_user`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_producten`
--
ALTER TABLE `t_producten`
  ADD PRIMARY KEY (`d_index`,`t_soort_d_index`),
  ADD UNIQUE KEY `d_index_UNIQUE` (`d_index`),
  ADD KEY `fk_t_producten_t_soort1_idx` (`t_soort_d_index`),
  ADD KEY `fk_t_producten_t_btw1_idx` (`t_btw_d_index`);

--
-- Indexen voor tabel `t_rol`
--
ALTER TABLE `t_rol`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_soort`
--
ALTER TABLE `t_soort`
  ADD PRIMARY KEY (`d_index`);

--
-- Indexen voor tabel `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`d_index`,`t_gender_d_index`,`t_adres_d_index`),
  ADD UNIQUE KEY `d_index_UNIQUE` (`d_index`),
  ADD KEY `fk_t_users_t_gender_idx` (`t_gender_d_index`),
  ADD KEY `fk_t_users_t_adres1_idx` (`t_adres_d_index`),
  ADD KEY `fk_t_users_t_aanspreekTitel1_idx` (`t_aanspreekTitel_d_index`),
  ADD KEY `fk_t_users_t_rol1_idx` (`t_rol_d_index`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `t_authorised`
--
ALTER TABLE `t_authorised`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT voor een tabel `t_bedrijf`
--
ALTER TABLE `t_bedrijf`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT voor een tabel `t_btw`
--
ALTER TABLE `t_btw`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `t_factuur`
--
ALTER TABLE `t_factuur`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT voor een tabel `t_gemeente`
--
ALTER TABLE `t_gemeente`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1563;
--
-- AUTO_INCREMENT voor een tabel `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT voor een tabel `t_mnemonic`
--
ALTER TABLE `t_mnemonic`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `t_mnemonic_user`
--
ALTER TABLE `t_mnemonic_user`
  MODIFY `d_index` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `t_producten`
--
ALTER TABLE `t_producten`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT voor een tabel `t_soort`
--
ALTER TABLE `t_soort`
  MODIFY `d_index` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `t_users`
--
ALTER TABLE `t_users`
  MODIFY `d_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `t_bedrijf`
--
ALTER TABLE `t_bedrijf`
  ADD CONSTRAINT `fk_t_bedrijf_t_gemeente1` FOREIGN KEY (`t_gemeente_d_index`) REFERENCES `t_gemeente` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_bedrijf_t_users1` FOREIGN KEY (`t_users_d_index`) REFERENCES `t_users` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `t_factuur`
--
ALTER TABLE `t_factuur`
  ADD CONSTRAINT `fk_t_order_t_users1` FOREIGN KEY (`t_users_d_index`) REFERENCES `t_users` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `t_list`
--
ALTER TABLE `t_list`
  ADD CONSTRAINT `fk_t_list_t_producten1` FOREIGN KEY (`t_producten_d_index`) REFERENCES `t_producten` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `t_producten`
--
ALTER TABLE `t_producten`
  ADD CONSTRAINT `fk_t_producten_t_btw1` FOREIGN KEY (`t_btw_d_index`) REFERENCES `t_btw` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_producten_t_soort1` FOREIGN KEY (`t_soort_d_index`) REFERENCES `t_soort` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `t_users`
--
ALTER TABLE `t_users`
  ADD CONSTRAINT `fk_t_users_t_aanspreekTitel1` FOREIGN KEY (`t_aanspreekTitel_d_index`) REFERENCES `t_aanspreektitel` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_users_t_adres1` FOREIGN KEY (`t_adres_d_index`) REFERENCES `t_gemeente` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_users_t_gender` FOREIGN KEY (`t_gender_d_index`) REFERENCES `t_gender` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_users_t_rol1` FOREIGN KEY (`t_rol_d_index`) REFERENCES `t_rol` (`d_index`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
