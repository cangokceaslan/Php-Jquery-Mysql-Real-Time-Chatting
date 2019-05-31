-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 31 May 2019, 22:33:43
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Veritabanı: `mesaj`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(30) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `receiver` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `date`) VALUES
(1, 'cangokceaslan', 'yazilim', 'Hello World', '2019-05-16'),
(2, 'cangokceaslan', 'yazilim', 'Hello World', '2019-05-15'),
(3, 'yazilim', 'cangokceaslan', 'Hello World1', '2019-05-08'),
(4, 'cangokceaslan', 'yazilim', 'Mesaj', '2019-05-31'),
(5, 'cangokceaslan', 'yazilim', 'T', '2019-05-31'),
(6, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(7, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(8, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(9, 'yazilim', 'cangokceaslan', 'Twitter', '2019-05-31'),
(10, 'yazilim', 'cangokceaslan', 'X', '2019-05-31'),
(11, 'cangokceaslan', 'yazilim', 'T', '2019-05-31'),
(12, 'yazilim', 'cangokceaslan', 'TT', '2019-05-31'),
(13, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(14, 'yazilim', 'cangokceaslan', 'T', '2019-05-31'),
(15, 'cangokceaslan', 'yazilim', 'T', '2019-05-31'),
(16, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(17, 'yazilim', 'cangokceaslan', 'Can', '2019-05-31'),
(18, 'cangokceaslan', 'yazilim', 'TTTWE', '2019-05-31'),
(19, 'cangokceaslan', 'yazilim', 'TTTWE', '2019-05-31'),
(20, 'cangokceaslan', 'yazilim', 'Tan', '2019-05-31'),
(21, 'cangokceaslan', 'yazilim', 'Tan', '2019-05-31'),
(22, 'yazilim', 'cangokceaslan', 'Man', '2019-05-31'),
(23, 'cangokceaslan', 'yazilim', 'Lan', '2019-05-31'),
(24, 'yazilim', 'cangokceaslan', 'Can', '2019-05-31'),
(25, 'cangokceaslan', 'yazilim', 'Twitter', '2019-05-31'),
(26, 'yazilim', 'cangokceaslan', 'Facebook', '2019-05-31'),
(27, 'cangokceaslan', 'yazilim', 'T', '2019-05-31'),
(28, 'cangokceaslan', 'yazilim', 'T', '2019-05-31'),
(29, 'cangokceaslan', 'yazilim', 'T', '2019-05-31'),
(30, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(31, 'yazilim', 'cangokceaslan', 'Gonder', '2019-05-31'),
(32, 'cangokceaslan', 'yazilim', 'Can', '2019-05-31'),
(33, 'yazilim', 'cangokceaslan', 'Twitter', '2019-05-31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `surname`) VALUES
(1, 'cangokceaslan', 'Can', 'Gökçeaslan'),
(2, 'yazilim', 'Yazılım', 'Öğreniyorum');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
