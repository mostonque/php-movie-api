-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Oca 2019, 06:43:37
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ytvideolar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminusers`
--

CREATE TABLE `adminusers` (
  `yoneticiAdi` varchar(11) DEFAULT NULL,
  `sifre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `adminusers`
--

INSERT INTO `adminusers` (`yoneticiAdi`, `sifre`) VALUES
('serhat', 'asdasd'),
('yaşar', 'demirtaş');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videolar`
--

CREATE TABLE `videolar` (
  `no` int(11) NOT NULL,
  `videoId` varchar(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `aciklama` text,
  `img` varchar(100) DEFAULT NULL,
  `izlenme` int(11) NOT NULL,
  `likeSayisi` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `yorum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `videolar`
--

INSERT INTO `videolar` (`no`, `videoId`, `title`, `aciklama`, `img`, `izlenme`, `likeSayisi`, `dislike`, `yorum`) VALUES
(1, 'QXV_cB1POKk', 'Eli Türkoğlu - Yokluğunun Ertesi', 'Eli Türkoğlu\'nun, Dark\'n Dark Music etiketiyle yayınlanan &quot;Yokluğunun Ertesi&quot; isimli tekli çalışması, video klibiyle netd müzik\'te.\n\nSöz: Gözde Ançel\nMüzik: Gözde Ançel, Buray\nDüzenleme: Osman Çetin\nYönetmen: Mustafa Özen\n\nTü', 'https://i.ytimg.com/vi/QXV_cB1POKk/hqdefault.jpg', 4578278, 39847, 2069, 2602),
(2, 'jv853jO65aU', 'НЕВЕРОЯТНЫЕ МАШИНЫ МОНСТРЫ', 'НЕВЕРОЯТНЫЕ МАШИНЫ МОНСТРЫ \n\nПривет, всем любителям тяжелой техники, посвящается выпуск о машинах-монстрах, самые большие Экскаваторы, кра?', 'https://i.ytimg.com/vi/jv853jO65aU/hqdefault.jpg', 5922442, 21991, 3014, 529),
(3, '9iH9prDyiU8', 'Ahmet Kaya - Bundan Böyle Yol Yok ( Uzun Versiyon  )', '', 'https://i.ytimg.com/vi/9iH9prDyiU8/hqdefault.jpg', 129801, 1211, 35, 31),
(4, '_urfADGK2qg', 'AHMET KAYA ☆ Demedim mi Haydar', 'https://www.facebook.com/AhmetKAYAOzlemii\n\nSöz: Yusuf Hayaloğlu\nMüzik: Ahmet KAYA\nAlbüm: Beni Bul | Kasım, 1995\n\nbiz dağlarda keklik idik\nşimdi bu çöplükte karga olduk\nbizimde boyumuzu aştı bu şehir\nyerlere serildik madara olduk\n\ndemedim mi h', 'https://i.ytimg.com/vi/_urfADGK2qg/hqdefault.jpg', 604038, 2782, 127, 168),
(5, 'GqSbk4ZVS7o', 'Sırrı Süreyya Önder 5 Komik Fıkra :)', 'Kanala Abone OL : https://goo.gl/Wnd8ht\n\nBir EŞŞEK Bir KURD\'U Öldürebilir mi ? ►  https://goo.gl/umVeNQ\nSesine Hayran Kalacağınız 5 Amatör Sokak Sanatçısı ►https://goo.gl/XsZCiQ\nUnutulmuş Eski İnternet Fenomenleri ►https://goo.gl/tDYdUR', 'https://i.ytimg.com/vi/GqSbk4ZVS7o/hqdefault.jpg', 1998844, 5957, 1515, 635),
(6, 'sZySQTH_L8A', 'Sırrı Süreyya önder Bakanlara Eleştiriler ve Komik Anlar - 2016', 'HDP Ankara milletvekili sırrı Süreyya önder bütçe görüşmeleri konuşmasında Kültür ve Turizm konularında Bakanları ve cumhurbaşkanı nı eleştirdi ...&quot;Bakanlıkların sitesi bakanların kişisel sitesi gibi kullanılıyor &quot; \n&quo', 'https://i.ytimg.com/vi/sZySQTH_L8A/hqdefault.jpg', 893039, 2694, 376, 190),
(7, 'iyeBCgFSz0s', 'BUNDAN ÖTE AYRILIK VAR(AHMET KAYA) 2018 BİLİNMEYEN PARÇA...  SESLENDİREN :ÖZGÜR TÜZER', 'AHMET KAYA - BUNDAN ÖTE AYRILIK VAR SESLENDİREN :ÖZGÜR TÜZER\nSözler:\nyüce dağların ardında kaldı hayallerimiz\nbu şehirde yine ölüm var\nkaranlıklar çöktü yine sevgilerde sahteymiş\nbu gönlümde yine hüzün var\n\nyüreğimi yakıyorsun o ', 'https://i.ytimg.com/vi/iyeBCgFSz0s/hqdefault.jpg', 3263516, 24329, 810, 576),
(8, 'C5BXOvXsoRs', 'Bataklıktaki mağarada ölümü bekleyen hasta köpeklerin kurtuluşu', 'instagram  sincap_alf\nfacebook   sincap Alf the squirrel\nyoutube     Tayfun Demir\nSquirrel, Ardilla, Eichhörnchen\n\nSincaplar ülkemizde yıllardır yasak olmasına rağmen  ormanlardan toplanıp para için vicdanlarını da satmış kişiler tarafından ', 'https://i.ytimg.com/vi/C5BXOvXsoRs/hqdefault.jpg', 394726, 17514, 204, 3172),
(9, 'lm8eTi9ZyLM', 'Phát hiện và bắt bạch tuộc sống dưới lớp cát ở bãi biển thật tài tình', 'Phát hiện và bắt bạch tuộc sống dưới lớp cát ở bãi biển khi nước ròng thật tài tình...nghe nói con bạch tuộc này có người ăn sống được luôn...\nCác bạn xem Video nếu thấy hay cho mình xin 1 like, chi', 'https://i.ytimg.com/vi/lm8eTi9ZyLM/hqdefault.jpg', 268555, 842, 134, 65),
(10, 'p-F8phsct9Y', 'HAYIR DERSEN ÖLERSİN #2 - #HerşeyEvet', 'Ben Enes Batur , Her şeye evet diyerek bir gün geçirme video su yaptık , Enes Batur vs Alper Rende her söylediğime evet demek zorunda kaldı intikam challenge hayır dersen ölersin !!  Her söylenene Evet Diyerek bir gün geçirmek , güzel ve eğl', 'https://i.ytimg.com/vi/p-F8phsct9Y/hqdefault.jpg', 2204906, 112399, 5677, 13547),
(11, 'XSotNEmqaNE', 'DAHA ÖNCE BÖYLESİ YAPILMADI ! ZULA MONTAGE - Furkan Soysal #Hayati', 'instagram\nRiffRoff.Life\nVideodaki Müzik\nhttps://www.youtube.com/watch?v=mB-mZ7lPoo0', 'https://i.ytimg.com/vi/XSotNEmqaNE/hqdefault.jpg', 20049, 1050, 22, 258),
(12, '8QyGI5QrffA', 'ZULA YOTUBERLAR\'IN  EN İYİ VURUŞLARI VE MUHAMET YT NİN EN İYİ DEAGLE VURUŞLARI', 'ETİKETLER               \noyun oynarken dinlenecek şarkılar yabancı,oyun oynarken dinlenecek şarkılar minecraft,\noyun oynarken dinlenecek şarkılar &amp; kopmalık müzikler (hard mix ) (2015),\noyun oynarken dinlenecek şarkılar nightcore,\noyun oyn', 'https://i.ytimg.com/vi/8QyGI5QrffA/hqdefault.jpg', 331683, 4242, 792, 593),
(13, 'GTl36y7rzY8', 'YENİ 4.000.000$ OYUNUN EN GÜÇLÜ KAMYONU!!', 'Selam ben Baturay, bugün sizlerlerle GTA 5 Online yeni gelen dlc arena war gta 5 yeni 4.000.000$ alev atan tır oyunun en güçlü kamyonunu inceledik, yeni ve efsane bir savaş arabası test ettik. Komik ve güzel bir video oldu. İyi seyirler.\n\n\n►ABO', 'https://i.ytimg.com/vi/GTl36y7rzY8/hqdefault.jpg', 215708, 17465, 270, 2199),
(14, 'AQHgaDM4f6I', 'HALİL ÖRENLER İLE SADECE COLT1911 CHALLENGE - Zula', 'Hepinize selam canlar, ben Deniz Toma. Zula da halil örenler ile birlikte rekabetçide sadece colt 1911 challenge yaparak trolledik. Zula da her ne kadar rekabet maçını trollesekte sonradan maçı kazandık.\n\nEn uygun zula altını Oynasana \'dan alın', 'https://i.ytimg.com/vi/AQHgaDM4f6I/hqdefault.jpg', 24266, 1279, 40, 159),
(15, 'V1HyH4dsHMM', 'Amazing Skills LIKE A BOSS #9 ???? PEOPLE ARE INSANE', 'Public video Amazing Skills LIKE A BOSS #9, \nI believe the video will make you satisfying.\n\n???????? Support us by LIKE and SUBSCRIBE.   It\'s free\nI LOVE ALL YOU????????????????\n\n???????? Click HERE to subscribe: http://bit.ly/ColorfulLife102\n\nVIEW MORE:\n', 'https://i.ytimg.com/vi/V1HyH4dsHMM/hqdefault.jpg', 43405822, 337480, 28367, 11184),
(16, '5tNzh_anCqM', 'A Lovely Day | Episode Compilation | Mr Bean Official Cartoon', 'No Parking \nMr Bean wants to watch the movie Titanic in the city. Unfortunately, he has serious difficulties finding a parking space.\n\nHaircut\nMr Bean saves a kitten from a tree. The press and the kitten\'s owner arrive at his door for a photograph but Bea', 'https://i.ytimg.com/vi/5tNzh_anCqM/hqdefault.jpg', 27516221, 56389, 17941, 2077),
(17, 'nWVviLxkXuc', 'CEHENNEM DESEN İLE OYNADIM HİLE UYARISI VERDİ ! ZULA', '+3 BİN LİKE GELİR Mİ CANLARIMMM\nPERDİGİTAL KAYIT OL VE İNDİRİMLİ ZA AL\nhttps://www.perdigital.com/kayit/oyuncu?click=492\n\nMerhaba canlarım ben Growe , Zula yeni güncelleme gelirde ben çekmezmiyim bugün oyuna eklenen cehennem desen ile video ', 'https://i.ytimg.com/vi/nWVviLxkXuc/hqdefault.jpg', 35251, 2881, 97, 361),
(18, '3GCawl3IdEk', 'YENİ 4.250.000$ YOK EDİLEMEZ ARABA!!', 'https://gleam.io/dELNf/baturay-anar-ylba-ekilii\nhttps://gleam.io/dELNf/baturay-anar-ylba-ekilii\nhttps://gleam.io/dELNf/baturay-anar-ylba-ekilii\n\nSelam ben Baturay, bugün sizlerlerle GTA 5 Online yeni gelen dlc arena war gta 5 yeni 4.250.000$ Yok Edilemez', 'https://i.ytimg.com/vi/3GCawl3IdEk/hqdefault.jpg', 341145, 28504, 535, 4419),
(19, 'fD2UExUhq-s', 'LP - Lost On You [Live Session]', 'LP - Lost On You\n\nEnjoy a unique playlist which includes LP, Katy Perry, Clean Bandit, Imagine Dragons, J Balvin, Dj Khaled, Robin Schulz, Taylor Swift, DNCE, Ofenbach, P!ink, Aviici, Ed Sheeran, Kadebostany, Charlie Puth, Bob Sinclar, OneRepublic, and al', 'https://i.ytimg.com/vi/fD2UExUhq-s/hqdefault.jpg', 14656639, 98937, 4499, 3704),
(20, 'pynDvIsLoU0', 'Ronaldinho: 14 Ridiculous Tricks That No One Expected', 'Facebook: https://www.facebook.com/djamel.ronaldo.7\n\nSubscribe for more amazing videos\nFor Real Madrid News visit our Website:\nhttp://rmadridalbania.info/\nlike facebook page:\nReal Madrid C.F.OFFICAL FAN PAGE ALBANIA\nhttps://www.facebook.com/Real.Madrid.Al', 'https://i.ytimg.com/vi/pynDvIsLoU0/hqdefault.jpg', 30018583, 187826, 13206, 10711);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminusers`
--
ALTER TABLE `adminusers`
  ADD UNIQUE KEY `yoneticiAdi` (`yoneticiAdi`);
ALTER TABLE `adminusers` ADD FULLTEXT KEY `yoneticiAdi_2` (`yoneticiAdi`);

--
-- Tablo için indeksler `videolar`
--
ALTER TABLE `videolar`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `videoId` (`videoId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `videolar`
--
ALTER TABLE `videolar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
