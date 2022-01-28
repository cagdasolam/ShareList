-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Oca 2022, 00:06:54
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bosluklu_liste_cananas`
--

CREATE TABLE `bosluklu_liste_cananas` (
  `song` varchar(100) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bosluklu_liste_cananas`
--

INSERT INTO `bosluklu_liste_cananas` (`song`, `artist`) VALUES
('nereden nasıl başlasam', 'taylan kaya');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneme_qwe`
--

CREATE TABLE `deneme_qwe` (
  `song` varchar(100) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `deneme_qwe`
--

INSERT INTO `deneme_qwe` (`song`, `artist`) VALUES
('one more time', 'daft punk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutişko_cananas`
--

CREATE TABLE `kutişko_cananas` (
  `song` varchar(100) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kutişko_cananas`
--

INSERT INTO `kutişko_cananas` (`song`, `artist`) VALUES
('ateşten gömlek', 'sagopa kajmer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `new_list_cananas`
--

CREATE TABLE `new_list_cananas` (
  `song` varchar(100) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `new_list_cananas`
--

INSERT INTO `new_list_cananas` (`song`, `artist`) VALUES
('persephone', 'Wishbone Ash'),
('astronomy', 'blue öyster cult'),
('doctor doctor', 'ufo'),
('temple of the king', 'rainbow'),
('gates of babylon', 'rainbow');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `path_qwe`
--

CREATE TABLE `path_qwe` (
  `song` varchar(100) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `path_qwe`
--

INSERT INTO `path_qwe` (`song`, `artist`) VALUES
('path', 'pather');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `playlists`
--

INSERT INTO `playlists` (`id`, `list_name`, `owner`) VALUES
(1, 'testlist_qwe', 'qwe'),
(2, 'testlist2_qwe', 'qwe'),
(6, 'deneme_qwe', 'qwe'),
(15, 'bosluklu_liste_cananas', 'cananas'),
(19, 'new_list_cananas', 'cananas'),
(20, 'path_qwe', 'qwe'),
(21, 'rütuş_qwee', 'qwee'),
(22, 'kutişko_cananas', 'cananas');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rütuş_qwee`
--

CREATE TABLE `rütuş_qwee` (
  `song` varchar(100) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `rütuş_qwee`
--

INSERT INTO `rütuş_qwee` (`song`, `artist`) VALUES
('than came the last day of may', 'blue öyster cult');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testlist2_qwe`
--

CREATE TABLE `testlist2_qwe` (
  `song` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `testlist2_qwe`
--

INSERT INTO `testlist2_qwe` (`song`, `artist`) VALUES
('money', 'pink floyd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testlist_qwe`
--

CREATE TABLE `testlist_qwe` (
  `song` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `testlist_qwe`
--

INSERT INTO `testlist_qwe` (`song`, `artist`) VALUES
('killer queen', 'queen'),
('hotel california', 'eagles'),
('one more time', 'daft punk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profil_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profil_photo`) VALUES
(1, 'qwe', 'cag_das98@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'uploads/qwelorempicsum.jpg'),
(2, 'qwe1', 'cag_das98@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'uploads/qwe1lorempicsum.jpg'),
(3, 'qwe2', 'cag_das98@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', ''),
(4, 'cananas', 'caneken@gmail.com', '81e1a4e22864c01047c0e1bd8cb1b17da3a933bc', ''),
(5, 'asd', 'cag_das98@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', ''),
(6, 'qwee', 'cag_das98@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
