-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 19 Haz 2021, 03:40:23
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `oto_takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `k_adi` text COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `k_adi`, `sifre`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclar`
--

DROP TABLE IF EXISTS `araclar`;
CREATE TABLE IF NOT EXISTS `araclar` (
  `arac_id` int(11) NOT NULL AUTO_INCREMENT,
  `plaka` text COLLATE utf8_turkish_ci NOT NULL,
  `kul_id` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`arac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `araclar`
--

INSERT INTO `araclar` (`arac_id`, `plaka`, `kul_id`) VALUES
(7, '06 KKU 06', '2'),
(8, '40 KKU 40', '2'),
(9, '71 KKU 71', '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gider`
--

DROP TABLE IF EXISTS `gider`;
CREATE TABLE IF NOT EXISTS `gider` (
  `gider_id` int(11) NOT NULL AUTO_INCREMENT,
  `gider_adi` text COLLATE utf8_turkish_ci NOT NULL,
  `gider_tutar` text COLLATE utf8_turkish_ci NOT NULL,
  `ilk_img` text COLLATE utf8_turkish_ci NOT NULL,
  `son_img` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gider_arac_id` text COLLATE utf8_turkish_ci NOT NULL,
  `gider_kul_id` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`gider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gider`
--

INSERT INTO `gider` (`gider_id`, `gider_adi`, `gider_tutar`, `ilk_img`, `son_img`, `tarih`, `gider_arac_id`, `gider_kul_id`) VALUES
(21, 'Yakıt Gideri', '30', 'images/3165930722d06ef915ad8443451c7f05c78707b654.jpg', '', '2021-04-16 19:55:09', '7', '1'),
(23, 'Cam Değişimi', '500', 'images/2562231474kirikcam.jpg', 'images/2184426162cam.jpg', '2021-05-16 19:55:44', '7', '1'),
(24, 'Yakıt Gideri', '50', '', '', '2021-04-16 21:46:24', '9', '3'),
(25, 'Vergi Gideri', '150', '', '', '2021-05-16 21:46:27', '9', '3'),
(26, 'Cam Değişimi', '200', 'images/21241228912562231474kirikcam.jpg', 'images/23481249412184426162cam.jpg', '2021-04-16 21:46:39', '9', '3'),
(30, 'Yakıt Gideri', '30', 'images/2066021931yakit50.jpg', '', '2021-06-16 20:00:35', '9', '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kul_id` int(11) NOT NULL AUTO_INCREMENT,
  `kul_sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `ad` text COLLATE utf8_turkish_ci NOT NULL,
  `mail` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kul_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kul_id`, `kul_sifre`, `ad`, `mail`) VALUES
(2, '123', 'Furkan Can', 'fc@gmail.com'),
(3, '123', 'Ahmet Mehmet', 'deneme@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
