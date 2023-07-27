-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 10:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(64) NOT NULL,
  `news_category` varchar(64) NOT NULL,
  `archives` tinyint(1) NOT NULL,
  `author` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `short_content`, `content`, `image`, `news_category`, `archives`, `author`) VALUES
(1, '20.06.2023.', 'NOGOMET', 'Hrvatska još jednom neuspješna u lovu na zlato. Španjolci osvojili Ligu nacija.', '18.06.2023. se održalo treće izdanje finala Lige nacije. Hrvatska je ponovno bila bezuspješna te tako izgubila od Španjolske nakon raspucavanja jedanaesteraca. Ekipe su bile podjednake i pokazalo se još jednom da Hrvatska nogometna reprezentacija pripada u samom vrhu nogometnog svijeta. ', 'modric.jpg', 'Sport', 0, 'admin'),
(2, '20.06.2023.', 'NOGOMET', 'Kovačić već ovaj tjedan postaje igrač Manchester Cityja? I Joško je sve dogovorio s građanima!', 'Novopečeni europski prvak uskoro bi u svoje redove mogao dovesti dvojicu hrvatskih reprezentativaca! Kako piše pouzdani Fabrizio Romano, Manchester City jako je blizu dogovora s Chelseajem, a građani će potom krenuti i po igrača RB Leipziga.', 'mancity.webp', 'Sport', 0, 'admin'),
(3, '20.06.2023.', 'NOGOMET', 'Veliko pojačanje za Chelsea: Nkunku je službeno plavac.', 'Premierligaš Chelsea službeno je na svojim internetskim stranicama u utorak potvrdio ono što je bilo od ranije poznato, novi nogometaš na Stamford Bridgeu je 25-godišnji Christopher Nkunku. U Chelsea je francuski reprezentativni napadač došao iz Leipziga te je potpisao šestogodišnji ugovor.', 'nkunku.webp', 'Sport', 0, 'admin'),
(4, '21.06.2023.', 'NOGOMET', 'Na dočeku Španjolaca su vrijeđali mladu zvijezdu Barce.', 'Umjesto na ulicama prijestolnice, Španjolci su proslavili titulu s navijačima u Palači sportova, dvorani košarkaša Real Madrida, pred oko 15.000 ljudi. Proslavu je zasjenio incident. Dok se mladi reprezentatvac Gavi (18), zvijezda Barcelone, htio obratiti mnoštvu, dio navijača počeo je skandirati uvredljivu pjesmu: \"Puta Barça!\", u slobodnom prijevodu \"Je*eš Barçu!\".', 'gavi.webp', 'Sport', 0, 'admin'),
(5, '20.06.2023.', 'NESTALA PODMORNICA', 'Ljudi u nestaloj podmornici imaju zraka za još 40 sati.', 'Spasilačke ekipe se utrkuju s vremenom kako bi pronašli britanskog milijardera Hamisha Hardinga i četvoricu druga putnika u 6,7 metara dugom plovilu tvrtke OceanGate Expeditions. Kapetan Jamie Frederick iz američke obalne straže je rekao da je ostalo zraka za još otprilike 40 sati u ronilici \"Titan\", s kojom je izgubljen kontakt u nedjelju kada se nalazila otprilike 700 kilometara južno od grada St John u kanadskoj provinciji Newfoundland, u blizini koje se nalazi olupina Titanica.', 'podmornica.webp', 'Svijet', 0, 'admin'),
(6, '20.06.2023.', 'ANDREW TATE', 'Andrew Tate će na sud: Optužen za silovanje, trgovinu ljudima i seksualno iskorištavanje žena.', 'Andrew Tate, kontroverzni influencer, optužen je za nekoliko kaznenih djela. Među njima je silovanje, trgovina ljudima te organiziranje skupine za iskorištavanje žena. Rumunjski tužitelji podigli su u utorak optužnicu protiv kontroverzne internet zvijezde Andrewa Tatea, njegova brata Tristana i dvije Rumunjke koji sada čekaju suđenje pod optužbom za trgovinu ljudima, silovanje i formiranje kriminalne skupine za seksualno iskorištavanje žena. Braća Tate i osumnjičene Rumunjke u kućnom su pritvoru otkad je pokrenuta istraga zbog navodnog zlostavljanja sedam žena, optužbe koje oni odbacuju.', 'andrewtate.webp', 'Svijet', 0, 'admin'),
(7, '20.06.2023.', 'TRAGEDIJA U UGANDI', 'Strava u Ugandi: U školi ubijeno 42 ljudi, od toga većinom djeca. Priveli su 20 kolaboracionista.', 'Ugandske vlasti rekle su u ponedjeljak da je 20 osoba privedeno na ispitivanje o mogućoj ulozi u masakru 42 osobe, uglavnom učenika, koji je u petak izvela islamistička skupina Savezničke demokratske snage (ADF). \"Uhićeno je barem 20 osumnjičenih suradnika ADF-a, kako bi pomogli našim istragama\", priopćila je policija.', 'uganda.webp', 'Svijet', 0, 'admin'),
(8, '20.06.2023.', 'NEVRIJEME U BRAZILU', 'Najmanje 13 poginulih u olujnom nevremenu u Brazilu.', 'Neprekidne kiše i jaki vjetrovi uzrokovali su štetu u desecima općina u državi Rio Grande du Sud, uključujući njen glavni grad Porto Alegre. Najmanje 13 ljudi je poginulo, a troje se vode kao nestali, nakon što je olujno nevrijeme između četvrtka i petka pogodilo južni Brazil, objavile su vlasti u nedjelju. Broj nestalih je, međutim, revidiran na niže, s 20 u subotu na tri, a svi su iz grada Caraa koji se nalazi na obali, 90 km od Porto Alegrea, i ima 8.000 stanovnika.', 'brasil.webp', 'Svijet', 0, 'admin'),
(9, '21.06.2023.', 'NOGOMET', 'Izbornik BiH nakon poraza od Luksemburga: Ne mogu ni ja pobijediti u F1 sa \"Spačekom\".', 'U okviru kvalifikacija za Europsko prvenstvo, Luksemburg je u Bilinom polju porazio Bosnu i Hercegovinu s 2-0 i tako ju ostavio na samo tri boda iz četiri utakmice. Poraz Edina Džeke, Miralema Pjanića i ostatka društva od države od 640.000 stanovnika možda je iznenadila laike, no oni upućeniji znaju da Luksemburg odavno nije amaterska reprezentacija, već skup talentiranih nogometaša, mahom iz Bundeslige. ', 'bih.webp', 'Sport', 1, 'admin'),
(10, '21.06.2023.', 'RAT U UKRAJINI', 'Sjedinjene Države šalju Ukrajini 1,3 milijarde dolara za obnovu infrastrukture uništene u ratu.', 'Sjedinjene Države će poslati još 1,3 milijardi vrijednu pomoć Ukrajini za rekonstrukciju energetske mreže i modernizaciju luka, željeznica i druge infrastrukture, rekao je u srijedu u Londonu američki državni tajnik Antony Blinken na konferenciji o obnovi Ukrajine. Britanija, Sjedinjene Države i Europska unija obećale su u srijedu više milijardi dolara pomoći Kijevu na drugoj Međunarodnoj konferenciji o obnovi Ukrajine, a britanski premijer Rishi Sunak pokrenuo je okvir ratnog osiguranja kako bi pokušao potaknuti tvrtke na ulaganja.', 'ukraine.webp', 'Svijet', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `level`) VALUES
(1, 'Mladen', 'Pavlović', 'admin', '$2y$10$a20XfKvzCUXu4rPrD7oaV.f4zILUUDOIYa7zGma6cwsocs52dX.hq', 1),
(2, 'gost', 'gost', 'gost', '$2y$10$OHA1JB0VymmgAsmAui0Fz.qdTEmLyIJ0n3iqFU.Wfu2nyo0VuZSO6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_ix` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
