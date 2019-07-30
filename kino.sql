-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 05 Gru 2018, 21:12
-- Wersja serwera: 5.5.21-log
-- Wersja PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilety`
--

CREATE TABLE IF NOT EXISTS `bilety` (
  `Id_Biletu` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Seansu` int(11) NOT NULL,
  `Id_Klienta` int(11) NOT NULL,
  `Value` decimal(9,2) NOT NULL,
  `Value2` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`Id_Biletu`),
  KEY `Id_Seansu` (`Id_Seansu`),
  KEY `Id_Biletu` (`Id_Biletu`),
  KEY `Id_Klienta` (`Id_Klienta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `bilety`
--

INSERT INTO `bilety` (`Id_Biletu`, `Id_Seansu`, `Id_Klienta`, `Value`, `Value2`) VALUES
(1, 2, 2, 20.00, '30% Zniżki'),
(2, 1, 2, 20.00, '30% Zniżki'),
(3, 3, 1, 20.00, '30$ Zniżki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cennik`
--

CREATE TABLE IF NOT EXISTS `cennik` (
  `Nazwa_Produktu` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Cena_Produktu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Zdj_Produktu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Opis_Produktów` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `cennik`
--

INSERT INTO `cennik` (`Nazwa_Produktu`, `Cena_Produktu`, `Zdj_Produktu`, `Opis_Produktów`) VALUES
('Bilet Ulgowy', '30% Zniżki', '<img style="float:left;"\n src=''pic/ticket.png'' height=''40%'' width=''12%'' /> ', 'Zniżka po okazaniu legitymacji szkolnej przy kasie kina.'),
('Bilet Normalny', '20zł', '<img style="float:left;"  src=''pic/tickets.png'' height=''40%'' width=''12%'' /> ', 'Podstawowa cena każdego normalnego biletu.'),
('Popcorn i Nachos', '10zł', '<img style="float:left;"   src=''pic/pop.png'' height=''40%'' width=''12%'' /> ', 'U nas do wyboru Duża porcja popcornu lub nachos'),
('Napoje', '5zł', '<img style="float:left;"  src=''pic/cola.png'' height=''40%'' width=''12%'' /> ', 'Dostępne są: Pepsi , Tymbark , Fanta , Kropa Beskidu i soki Capy. 500ml');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE IF NOT EXISTS `filmy` (
  `Id_Filmu` int(11) NOT NULL AUTO_INCREMENT,
  `Tytul` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Reżyser` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Rok_Produkcji` varchar(4) NOT NULL,
  `Czas_Trwania` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Opis` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Pic` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Pic2` text NOT NULL,
  PRIMARY KEY (`Id_Filmu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`Id_Filmu`, `Tytul`, `Reżyser`, `Rok_Produkcji`, `Czas_Trwania`, `Opis`, `Pic`, `Pic2`) VALUES
(1, 'Skazani na Shawshank', 'Frank Darabont', '1994', '2.22', 'Adaptacja opowiadania Stephena Kinga. Niesłusznie skazany na dożywocie bankier, stara się przetrwać w brutalnym, więziennym świecie.', ' <img  src=''pic/skazani.jpg'' height=''90%'' width=''75%'' /> ', '<img  src=''pic/skazani.jpg'' height=''25%'' width=''50%'' /> '),
(2, 'Nietykalni ', 'Olivier Nakache ', '2011', '1.52', 'Sparaliżowany milioner zatrudnia do opieki młodego chłopaka z przedmieścia, który właśnie wyszedł z więzienia.', '\n<img src=''pic/nietykalni.jpg'' height=''90%'' width=''110%'' />', '<img  src=''pic/nietykalni.jpg'' height=''25%'' width=''50%'' /> '),
(3, 'Zielona Mila', 'Frank Darabont', '1999', '3.08', 'Emerytowany strażnik więzienny opowiada przyjaciółce o niezwykłym mężczyźnie, którego skazano na śmierć za zabójstwo dwóch 9-letnich dziewczynek.', '<img  src=''pic/zielona.jpg'' height=''90%'' width=''75%'' />', '<img  src=''pic/zielona.jpg'' height=''25%'' width=''50%'' /> ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `Id_Klienta` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `miejscaifilm1` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `miejscaifilm2` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `miejscaifilm3` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`Id_Klienta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`Id_Klienta`, `Login`, `Haslo`, `email`, `miejscaifilm1`, `miejscaifilm2`, `miejscaifilm3`) VALUES
(1, 'Krzysztof', 'Karkowski', '', '', '', ''),
(2, 'Michał', 'Kowalski', '', '', '', ''),
(5, 'Jan', 'Sobieski', '', '', '', ''),
(6, 'admin', 'admin', '', 'Skazani na Shawshank. [ Twoje Miejsca: A28=1,A37=1 ]   [ Cena biletów:  40zł ]. ', 'Nietykalni . [ Twoje Miejsca: A28=1 ]   [ Cena biletów:  20zł ]. ', 'Zielona Mila. [ Twoje Miejsca: A24=1,A34=1,A44=1 ]   [ Cena biletów:  60zł ]. '),
(40, 'admin2', 'abba', 'aloha@wp.pl', '', '', ''),
(41, 'admin3', 'chuj', 'asdasd@wp.pl', '', '', ''),
(42, 'abbi', 'abbi', 'abiiii@wp.pl', '', '', ''),
(43, 'alehandro', 'papiok', 'wena@wp.pl', '', '', ''),
(44, '', '', '', 'Skazani na Shawshank A14=1', '', ''),
(45, '', '', '', 'Skazani na Shawshank A14=1', '', ''),
(46, '', '', '', 'SkazaniA7', '', ''),
(47, '', '', '', 'Skazani na Shawshank', '', ''),
(48, 'krzys', 'krzys', 'dupa@dupa.pl', 'Skazani na Shawshank. [ Twoje Miejsca: A1=1 ]   [ Cena biletów:  20zł ]. ', 'Nietykalni . [ Twoje Miejsca: A9=1 ]   [ Cena biletów:  20zł ]. ', 'Zielona Mila. [ Twoje Miejsca: A54=1 ]   [ Cena biletów:  20zł ]. ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE IF NOT EXISTS `kontakt` (
  `Tele` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kontakt`
--

INSERT INTO `kontakt` (`Tele`, `Adres`, `Email`, `Opis`) VALUES
('787675247', 'Szamotuły , Ratuszowa 19 ', 'tertxx@wp.pl', 'Kasa kina czynna godzinę przed każdym seansem.</br>\nKino czynne w dniach: od piątku do niedzieli. </br>\nŚroda i czwartek – kasa kina NIECZYNNA.</br>\nZACHĘCAMY DO INTERNETOWEGO ZAKUPU BILETÓW </br>\n\nRezerwowane bilety na stronie prosimy odebrać 30 minut przed seansem. </br> </br>\n\nNumer Konta: 987654321123456789</br>\nKontakt e-mail: tertxx@wp.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `regulamin`
--

CREATE TABLE IF NOT EXISTS `regulamin` (
  `Regulamin_Rez` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `regulamin`
--

INSERT INTO `regulamin` (`Regulamin_Rez`) VALUES
('Regulamin Rezerwacji Kina Papiok !! </br> </br> 1. Można rezerwować maksymalnie 4 miejsca na dany seans. W przypadku większych zamówień prosimy o rezerwacje telefoniczną! </br> </br> 2. Rezerwacje na dany seans można złożyć tylko raz dlatego prosimy o dokładne przemyślenie wyboru. <br> </br> 3. Po zarezerwowaniu miejsc konieczne jest jak najszybsze przelanie pieniędzy na konto kina z podanym tytułem filmu i ilością zarezerwowanych miejsc, można również wpłacać je w kasie kina. W przypadku kiedy miną 2h od zarezerwowania miejsca, te które nie zostały zapłacone zostaną na nowo puste. Numer Konta Kina Papiok 987654321123456789 </br> </br> 4. Zniżka uczniowska zostanie nałożona na rachunek przy okazaniu legitymacji szkolnych w kasie kina. </br> </br> 5. Nieprzestrzeganie zasad będzie karane. </br> </br> Pozdrawiamy  i życzymy udanych seansów Kino Papiok .');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `Id_Seansu` int(11) NOT NULL,
  `A1` varchar(1) NOT NULL,
  `A2` varchar(1) NOT NULL,
  `A3` varchar(1) NOT NULL,
  `A4` varchar(1) NOT NULL,
  `A5` varchar(1) NOT NULL,
  `A6` varchar(1) NOT NULL,
  `A7` varchar(1) NOT NULL,
  `A8` varchar(1) NOT NULL,
  `A9` varchar(1) NOT NULL,
  `A10` varchar(1) NOT NULL,
  `A11` varchar(1) NOT NULL,
  `A12` varchar(1) NOT NULL,
  `A13` varchar(1) NOT NULL,
  `A14` varchar(1) NOT NULL,
  `A15` varchar(1) NOT NULL,
  `A16` varchar(1) NOT NULL,
  `A17` varchar(1) NOT NULL,
  `A18` varchar(1) NOT NULL,
  `A19` varchar(1) NOT NULL,
  `A20` int(1) NOT NULL,
  `A21` varchar(1) NOT NULL,
  `A22` varchar(1) NOT NULL,
  `A23` varchar(1) NOT NULL,
  `A24` varchar(1) NOT NULL,
  `A25` varchar(1) NOT NULL,
  `A26` varchar(1) NOT NULL,
  `A27` varchar(1) NOT NULL,
  `A28` varchar(1) NOT NULL,
  `A29` varchar(1) NOT NULL,
  `A30` varchar(1) NOT NULL,
  `A31` varchar(1) NOT NULL,
  `A32` varchar(1) NOT NULL,
  `A33` varchar(1) NOT NULL,
  `A34` varchar(1) NOT NULL,
  `A35` varchar(1) NOT NULL,
  `A36` varchar(1) NOT NULL,
  `A37` varchar(1) NOT NULL,
  `A38` varchar(1) NOT NULL,
  `A39` varchar(1) NOT NULL,
  `A40` varchar(1) NOT NULL,
  `A41` varchar(1) NOT NULL,
  `A42` varchar(1) NOT NULL,
  `A43` varchar(1) NOT NULL,
  `A44` varchar(1) NOT NULL,
  `A45` varchar(1) NOT NULL,
  `A46` varchar(1) NOT NULL,
  `A47` varchar(1) NOT NULL,
  `A48` varchar(1) NOT NULL,
  `A49` varchar(1) NOT NULL,
  `A50` varchar(1) NOT NULL,
  `A51` varchar(1) NOT NULL,
  `A52` varchar(1) NOT NULL,
  `A53` varchar(1) NOT NULL,
  `A54` varchar(1) NOT NULL,
  UNIQUE KEY `Id_Seansu` (`Id_Seansu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `sale`
--

INSERT INTO `sale` (`Id_Seansu`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `A10`, `A11`, `A12`, `A13`, `A14`, `A15`, `A16`, `A17`, `A18`, `A19`, `A20`, `A21`, `A22`, `A23`, `A24`, `A25`, `A26`, `A27`, `A28`, `A29`, `A30`, `A31`, `A32`, `A33`, `A34`, `A35`, `A36`, `A37`, `A38`, `A39`, `A40`, `A41`, `A42`, `A43`, `A44`, `A45`, `A46`, `A47`, `A48`, `A49`, `A50`, `A51`, `A52`, `A53`, `A54`) VALUES
(1, '', '', '0', '1', '', '', '1', '', '', '', '', '', '', '', '1', '1', '', '', '', 0, '', '', '1', '', '', '', '', '1', '', '', '', '', '', '1', '1', '1', '1', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '0', '1', '0', '', '', '', '', '', '', '', '', '1', '', '', '1', '', '', '', '', 1, '', '1', '', '', '', '1', '', '', '', '', '', '', '1', '', '', '1', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '1', '', '', ''),
(3, '1', '', '0', '', '', '1', '', '1', '', '', '', '', '', '1', '', '', '', '', '', 0, '', '', '', '1', '', '', '1', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '1', '', '1', '', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seanse`
--

CREATE TABLE IF NOT EXISTS `seanse` (
  `Id_Seansu` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Filmu` int(11) NOT NULL,
  `Id_Sali` int(11) NOT NULL,
  `Dzień1` date NOT NULL,
  `Godzina_Rozpoczecia1` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`Id_Seansu`),
  KEY `Id_Filmu` (`Id_Filmu`),
  KEY `Id_Sali` (`Id_Sali`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `seanse`
--

INSERT INTO `seanse` (`Id_Seansu`, `Id_Filmu`, `Id_Sali`, `Dzień1`, `Godzina_Rozpoczecia1`) VALUES
(1, 1, 1, '2018-10-17', '14:00'),
(2, 2, 1, '2018-10-23', '14:00'),
(3, 3, 1, '2018-11-06', '15:35');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bilety`
--
ALTER TABLE `bilety`
  ADD CONSTRAINT `bilety_ibfk_2` FOREIGN KEY (`Id_Seansu`) REFERENCES `seanse` (`Id_Seansu`),
  ADD CONSTRAINT `bilety_ibfk_3` FOREIGN KEY (`Id_Klienta`) REFERENCES `klienci` (`Id_Klienta`);

--
-- Ograniczenia dla tabeli `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`Id_Seansu`) REFERENCES `seanse` (`Id_Seansu`);

--
-- Ograniczenia dla tabeli `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `seanse_ibfk_1` FOREIGN KEY (`Id_Filmu`) REFERENCES `filmy` (`Id_Filmu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
