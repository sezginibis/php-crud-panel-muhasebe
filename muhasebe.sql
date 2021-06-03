-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Haz 2021, 19:38:47
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `muhasebe`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alacaklar`
--

CREATE TABLE `alacaklar` (
  `alacak_id` int(11) NOT NULL,
  `alacak_isim` varchar(100) NOT NULL,
  `alacak_aciklama` text NOT NULL,
  `alacak_zaman` date NOT NULL,
  `alacak_tutar` float(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `alacaklar`
--

INSERT INTO `alacaklar` (`alacak_id`, `alacak_isim`, `alacak_aciklama`, `alacak_zaman`, `alacak_tutar`) VALUES
(4, 'Deneme', 'test açıklaması', '2021-06-06', 100.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calisanlar`
--

CREATE TABLE `calisanlar` (
  `calisan_id` int(11) NOT NULL,
  `calisan_isim` varchar(100) NOT NULL,
  `calisan_yas` date NOT NULL,
  `calisan_bolum` varchar(70) NOT NULL,
  `calisan_maas` float(20,2) NOT NULL,
  `ise_baslama_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `calisanlar`
--

INSERT INTO `calisanlar` (`calisan_id`, `calisan_isim`, `calisan_yas`, `calisan_bolum`, `calisan_maas`, `ise_baslama_tarihi`) VALUES
(2, 'Ali Züğürt', '1981-12-10', 'El işi ürünleri', 3500.00, '2020-01-01'),
(3, 'Yasin Karakaş', '1981-04-09', 'Patron', 15000.00, '2000-08-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_firma` varchar(255) NOT NULL,
  `kullanici_adi` varchar(150) NOT NULL,
  `kullanici_tarih` date NOT NULL DEFAULT current_timestamp(),
  `kullanici_mail` varchar(150) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  `yetki_durumu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_firma`, `kullanici_adi`, `kullanici_tarih`, `kullanici_mail`, `kullanici_sifre`, `yetki_durumu`) VALUES
(7, 'farketmez', 'İsmail Kara', '2021-05-31', 'deneme@deneme.com', '8f10d078b2799206cfe914b32cc6a5e9', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masraflar`
--

CREATE TABLE `masraflar` (
  `masraf_id` int(11) NOT NULL,
  `masraf_baslik` varchar(255) NOT NULL,
  `masraf_aciklama` text NOT NULL,
  `masraf_tutar` float(20,2) NOT NULL,
  `masraf_zaman` date NOT NULL,
  `masraf_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `masraflar`
--

INSERT INTO `masraflar` (`masraf_id`, `masraf_baslik`, `masraf_aciklama`, `masraf_tutar`, `masraf_zaman`, `masraf_kategori`) VALUES
(4, 'düzenlendi', 'ofise tablet alında', 3000.00, '2021-05-30', 'test kategorisi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nakit`
--

CREATE TABLE `nakit` (
  `nakit_id` int(11) NOT NULL,
  `nakit_baslik` varchar(255) NOT NULL,
  `nakit_aciklama` varchar(255) NOT NULL,
  `nakit_gelen_tutar` float(20,2) NOT NULL,
  `nakit_cikan_tutar` float(20,2) NOT NULL,
  `nakit_zaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `nakit`
--

INSERT INTO `nakit` (`nakit_id`, `nakit_baslik`, `nakit_aciklama`, `nakit_gelen_tutar`, `nakit_cikan_tutar`, `nakit_zaman`) VALUES
(5, 'Elden alınmıştı', 'Un parası', 0.00, 100.90, '2021-05-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `odeme_id` int(11) NOT NULL,
  `odeme_baslik` varchar(255) NOT NULL,
  `odeme_aciklama` text NOT NULL,
  `odeme_kime` varchar(255) NOT NULL,
  `odeme_zaman` date NOT NULL,
  `odeme_tutar` float(20,2) NOT NULL,
  `para_alinan_zaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odemeler`
--

INSERT INTO `odemeler` (`odeme_id`, `odeme_baslik`, `odeme_aciklama`, `odeme_kime`, `odeme_zaman`, `odeme_tutar`, `para_alinan_zaman`) VALUES
(4, 'İkinci İşlem', 'Nitelikli borç', 'Ege Üniversitesi', '2021-05-26', 3000.25, '2021-05-14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satislar`
--

CREATE TABLE `satislar` (
  `satis_id` int(11) NOT NULL,
  `satis_baslik` varchar(255) NOT NULL,
  `satis_aciklama` text NOT NULL,
  `satis_zaman` date NOT NULL,
  `satis_tutar` float(20,2) NOT NULL,
  `satis_odeme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `satislar`
--

INSERT INTO `satislar` (`satis_id`, `satis_baslik`, `satis_aciklama`, `satis_zaman`, `satis_tutar`, `satis_odeme`) VALUES
(2, 'Elma', 'Küçük ', '2021-06-01', 300.00, 'Nakit'),
(3, 'Armut', 'Yeşil sağlam', '2021-05-30', 300.00, 'Nakit');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alacaklar`
--
ALTER TABLE `alacaklar`
  ADD PRIMARY KEY (`alacak_id`);

--
-- Tablo için indeksler `calisanlar`
--
ALTER TABLE `calisanlar`
  ADD PRIMARY KEY (`calisan_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `masraflar`
--
ALTER TABLE `masraflar`
  ADD PRIMARY KEY (`masraf_id`);

--
-- Tablo için indeksler `nakit`
--
ALTER TABLE `nakit`
  ADD PRIMARY KEY (`nakit_id`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`odeme_id`);

--
-- Tablo için indeksler `satislar`
--
ALTER TABLE `satislar`
  ADD PRIMARY KEY (`satis_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alacaklar`
--
ALTER TABLE `alacaklar`
  MODIFY `alacak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `calisanlar`
--
ALTER TABLE `calisanlar`
  MODIFY `calisan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `masraflar`
--
ALTER TABLE `masraflar`
  MODIFY `masraf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `nakit`
--
ALTER TABLE `nakit`
  MODIFY `nakit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `odeme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `satislar`
--
ALTER TABLE `satislar`
  MODIFY `satis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
