-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Paź 2022, 13:22
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wolontariat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `eventsId` int(11) NOT NULL,
  `eventsCity` varchar(128) NOT NULL,
  `eventsTitle` text NOT NULL,
  `eventsDesc` text NOT NULL,
  `eventsContactInfo` text NOT NULL,
  `eventsImage` text NOT NULL,
  `eventsUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`eventsId`, `eventsCity`, `eventsTitle`, `eventsDesc`, `eventsContactInfo`, `eventsImage`, `eventsUserId`) VALUES
(17, 'Tarnowskie Góry', 'PODAJ POMOCNĄ ŁAPĘ', 'Zbieramy dla \"Wolontariatu na Rzecz Zwierząt Dotkniętych Bezdomnością PIES NA ZAKRĘCIE\"\r\nCiepłe koce, ręczniki, narzuty, bielizna pościelowa, karma mokra, gryzaki, zabawki, metalowe miski\r\n\r\nDary należy przynieść do szkoły podstawowej nr 10 przy ulicy Jana Kochanowskiego 15 do sekretariatu\r\n\r\nAkcja trwa do 23.12.2022\r\n\r\nZapraszamy!!!', '222222222', 'https://e3.365dm.com/21/08/1600x900/2372108230418994507_5487554.jpg?20210823091153', 6),
(18, 'Bytom', 'BYTOMSKI BIEG SPONSOROWANY', 'Akcja wolontaryjna naszej szkoły tym razem łączy sport z charytatywnością i przedsiębiorczością.\r\n\r\nReguły są proste:\r\n1.Każdy chętny uczeń szuka sponsora (np. rodziców, dziadków, zaprzyjaźnione firmy).\r\n2.Sponsor płaci za każde przebiegnięte kółko - ok. 300m (dowolną kwotę, np. 2, 5, 10 zł za okrążenie).\r\n3.Biegacz (przedszkolak, uczeń, nauczyciel, cała klasa) swoim wysiłkiem fizycznym zbiera pieniądze na rzecz Fundacji Bytomskie Hospicjum dla Dzieci.\r\n\r\n13.06.2023 8:30 - 12:00 Stadion - Nadzieja Bytom przy ul. Worpie 18, Bytom', '222222222', 'https://scontent.fpoz4-1.fna.fbcdn.net/v/t39.30808-6/294937688_465583672238925_4955149297408629778_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=e3f864&_nc_ohc=fKbR_Xko2dkAX9Fev4U&_nc_ht=scontent.fpoz4-1.fna&oh=00_AT-DJ0ZFCn4xFrnd_OEs2iuGpjI4CsgAqWqoK-iulOtcrg&oe=635AD169', 6),
(19, 'Częstochowa', 'Zbiórka na rzecz domu dziecka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur accumsan, elit finibus interdum varius, mi diam pellentesque elit, vel efficitur mauris nulla non lacus. Mauris elementum sem ut ligula convallis, ac lacinia sapien pretium. Pellentesque sagittis, ipsum vel fermentum tempor, odio nunc hendrerit risus, at pharetra metus felis sed purus. Quisque vehicula, lorem sed pellentesque viverra, lectus erat convallis velit, at bibendum mauris tortor vel orci. Mauris tempus porttitor turpis et ornare. Nunc eget porttitor leo. Aliquam sit amet lorem lacinia nisi porttitor ornare. Cras nisl ipsum, sodales ac consectetur nec, fringilla facilisis metus. Nulla iaculis sem at enim fermentum, ac suscipit nisl pellentesque. Ut vitae dui ut lorem cursus suscipit et ac turpis.', '222222222', '', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersUsername` varchar(64) NOT NULL,
  `usersPhoneNumber` int(9) NOT NULL,
  `usersType` varchar(64) NOT NULL,
  `usersPassword` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`usersId`, `usersUsername`, `usersPhoneNumber`, `usersType`, `usersPassword`) VALUES
(6, 'Konrad222', 222222222, 'organizer', '$2y$10$7USHsd1BQQ.HF.NQTV2j8OPuKZQnJUPLdQB.DnvTPtep3IhMLwdKm');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventsId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `eventsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
