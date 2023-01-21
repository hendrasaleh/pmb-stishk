-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Nov 2022 pada 09.35
-- Versi server: 10.5.17-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7164532_maba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gender` int(2) NOT NULL DEFAULT 0,
  `kelas_id` int(11) DEFAULT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `village_id` varchar(15) NOT NULL,
  `district_id` varchar(15) NOT NULL,
  `regency_id` varchar(15) NOT NULL,
  `province_id` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `reff` varchar(255) DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `kelas_id`, `asal_sekolah`, `alamat`, `village_id`, `district_id`, `regency_id`, `province_id`, `email`, `image`, `password`, `role_id`, `is_active`, `reff`, `date_created`, `date_modified`) VALUES
(8, 'Hendra Karunia A., Lc.', 1, 5, '', 'Dusun Manis Rt 09 Rw 02', '3208162012', '021515', '021500', '020000', 'hendrasaleh@gmail.com', 'default1.png', '$2y$10$XBnbQw2g779dEooZOYU1Bu61sWc8oc0jnurJfPlfua5Lf3K5RuFs6', 1, 1, NULL, 1607950063, 1623596536),
(31, 'Tim Admin', 1, 91, 'Husnul Khotimah', NULL, '3208122009', '021516', '021500', '020000', '081234567890', 'default1.png', '$2y$10$kVbsT0U0lG0V7fLXC1ytluWMTQGtE18O10LyB82omBKXe/2ICtId6', 4, 1, 'Internet', 1645321982, 1645322045),
(32, 'Ari Anggi Purnamasari', 0, 91, 'SIT Smk Bina Insan Mulia', NULL, 'Ciumbuleuit', '026026', '026000', '020000', '0895357910173', 'default2.jpeg', '$2y$10$S5kG.B7zceP7y28c1R2oFOvLZcWmwFTc40G/WLRxltHGU7DV2TMGC', 3, 1, 'Dari Teh Dewi Sapitri', 1645537012, 1645669320),
(33, 'ULIN NURUL \'ADILAH', 0, 91, 'SMA MUHAMMADIYAH 1 PURBALINGGA', NULL, 'Serang', '030313', '030300', '030000', '085875568802', 'default2.jpeg', '$2y$10$6fU9kMhV6vQ1pqjUZEzJI.o3x2HFEwsYDneFKC905cRyTtj8ivJOi', 3, 1, 'Dari Pengasuh (Fuji Astuti)', 1645582161, 1649746044),
(34, 'Nabila Husnallisan', 0, 91, 'MAs Nurul Huda', 'Jl. Panumbang jaya no.31a RT 01/04 ', 'Ciumbuleuit', '026026', '026000', '020000', '088224543700', 'default2.jpeg', '$2y$10$EE6zrLEAsxAN235nfibTN.7si0lAYgYj3TqZHJy1Zopbtjm8P6cgG', 3, 1, 'Pembina (Teh Dewis)', 1645600494, 1645673870),
(35, 'Fathi Ridho', 1, 91, 'MAS IBADUL GHOFUR', NULL, 'Sirnabaya', '021419', '021400', '020000', '081321133790', 'default1.png', '$2y$10$tIYAWLE2UkwygXc4ah0arO0yL1.zZlcIZ9QP0DG8Q4K7ywm9cT/y6', 3, 1, 'Muhammad Syauqi Rabbani ', 1645657311, 1650507288),
(36, 'Titin Agustin', 1, 91, 'MAS ibadul ghofur', NULL, 'Tanjungsari', '021419', '021400', '020000', '0881022215009', 'default1.png', '$2y$10$8C1PW2psxZwHA1lwwqjfWewyMZPVvaHyM5QHM0V8q9nGjTgOI2fdy', 3, 0, 'Dari teman ( syauqi )', 1645659744, 1645659744),
(37, 'Muhammad Ilyas Albifachri', 1, 91, 'SMAN2 KUNINGAN', NULL, 'Bandorasa Wetan', '021517', '021500', '020000', '08971809628', 'default1.png', '$2y$10$DqV6teDNErUZ2J4U/JsKZezalGI1emzPA1dOtuEpcbkGzooAe1fBS', 3, 1, 'Dari Instagram stis hk', 1645674610, 1652337599),
(38, 'FARIDATUN MARIFATUSSOLIHAH', 0, 91, 'SMAS WAHIDIYAH KOTA KEDIRI', NULL, 'Sirnabaya', '021419', '021400', '020000', '085257160132', 'default2.jpeg', '$2y$10$8ntxEDytxqat4d/xtVVtWuc/yU5TBAEL3Zw6EGtXrsIqmzjesUnLC', 3, 1, 'Kerabat dekat', 1646031392, 1655525396),
(39, 'WARDAH NAZIHAH', 0, 92, 'Ponpes Mardhotillah', NULL, '-', '166101', '166100', '160000', '081522510204', 'default2.jpeg', '$2y$10$QPvkFNFZ7U3lW/NVlWHYme5lu3ZDEdZMYd5lluooDeXnLRaxSc1fK', 3, 1, 'Dari teman abi:ustadz alfan', 1646143572, 1649321667),
(40, 'ARIS RISMAYA', 1, 91, 'MAS AL_Hidayaah Sumbakeling', NULL, 'Patalagan', '021520', '021500', '020000', '083816438723', 'default1.png', '$2y$10$ELsf1JoTxm6.YUO/uSGVn.6/qVfVypv5MpQ9PXl7DVyGgjGZ36LQ2', 3, 1, '083816438723', 1646227097, 1647245170),
(41, 'SAD123', 1, 91, 'sad123', NULL, 'sadadgau', '060101', '060100', '060000', '085244154378', 'default1.png', '$2y$10$kM4T7ACZNXFbs3Mjs6IFCukfmP2YJpbpQX0kfH6Zb1D/DMeq4rrBi', 3, 0, 'fb', 1646559684, 1646559684),
(43, 'FITRI AMALIA', 0, 91, 'MAN 1 CIREBON', NULL, 'Kalibaru', '021738', '021700', '020000', '087866914624', 'default2.jpeg', '$2y$10$nP3909Et/lrGIZchYMaM7.x7IFu3E32.ns.z4umLGu4Xe/c08YG8a', 3, 1, 'Ibu nurayani guru pondok pesantren Husnul khotimah', 1646738016, 1655949787),
(44, 'GINA AULIA MULIA ASIH', 0, 92, 'SMAN 2 Kuningan', NULL, 'Pajawanlor', '021510', '021500', '020000', '082120722545', 'default2.jpeg', '$2y$10$xknEB81oxTiRib2.VAjfaOe3EUnGsh0w.CUjEYDFG.8lgL2Wm/2tW', 3, 1, 'Dari kakak (Aji) ', 1646887060, 1646907814),
(45, 'KHOIRUL UMAM', 1, 91, 'SMAN 1 TAMBUN SELATAN', NULL, 'Margaharja', '021420', '021400', '020000', '+6285157449941', 'default1.png', '$2y$10$TMfx9WPzjyMK98b4cdal5.euAY3dKm8j0P1VrlqyEW8nsRMa3aDnS', 3, 0, 'Dari KH.Surahman Hidayat MA.', 1646898993, 1646898993),
(48, 'ZAINAL ABIDIN', 1, 91, 'SMA labbaik', NULL, 'Mandor', '130905', '130900', '130000', '085820429594', 'default1.png', '$2y$10$W8GdWmYxRetunpkl.r7kSufjr0KbAQvyUhiTYx6tkClIdBC5npGu2', 3, 0, 'Dari teman ari', 1646967315, 1646967315),
(49, 'INDRIANI ARNETHA ADRIYA', 0, 91, 'MA Husnul Khotimah', NULL, 'Desa sembawa', '021516', '021500', '020000', '081386434477', 'default2.jpeg', '$2y$10$LEMcHkiK1lFjL/xPeB8ZR.3nC0kg4JXqQDqgz3X4KLFquDCKkoxUa', 3, 1, 'Dari stik Hk', 1647063898, 1649818153),
(50, 'UMMU NAHDZO KAMILAH', 0, 92, 'Ponpes alfurqon mulia', NULL, 'Bodelor', '021714', '021700', '020000', '085797710731', 'default2.jpeg', '$2y$10$nsNTPOhPws5KumTyWl8Ye.SXpLoZNiD.tR.sEWtE7YDQfUObLt3ti', 3, 0, 'Dari uwak prof dr ahmad satori ismail', 1647733178, 1647733178),
(51, 'SUDIRMAN', 1, 91, 'SMK N 1 MAMUJU', NULL, 'Kurungan bassi', '330102', '330100', '330000', '082192196144', 'default1.png', '$2y$10$wTN6az7JgCnBrrLctBqAqObrkxtlSn0Am3Hg9A8W3HGTi4ZIxbuX6', 3, 0, 'Dari fb', 1647755457, 1647755457),
(52, 'DEWI LESTARI ISWANDI', 1, 91, 'SMA MANBA\'UL ULUM PANCALANG', NULL, 'SILEBU', '021520', '021500', '020000', '087843107353', 'default1.png', '$2y$10$ROdqCzBUMVRIF88vkEtQIOZwZXbL.QgTHKyl7aw7m6.5YfaNXpVbq', 3, 0, 'Dari Orang Tua', 1648267569, 1648267569),
(53, 'LUTPI MUHAMMAD JULIYANTO', 1, 91, 'Ma subulul huda darma', NULL, 'Parung', '021501', '021500', '020000', '089664293632', 'default1.png', '$2y$10$BLg2SUKaI2I6b/FXfGk9VuOhi3.tBiq6KE0PNb/vyyg4rS4cMglma', 3, 1, 'Kang rama', 1648562582, 1650075358),
(54, 'FITRIAMALIA', 0, 91, 'MAN 1 CIREBON', NULL, 'Desa.kalibaru', '021738', '021700', '020000', '08199779023', 'default2.jpeg', '$2y$10$yY9mvXav13Rd/uvob.o9Pel4i8OX9BX3f.fk/wuiWd3R/XNQp0UlW', 3, 0, 'Dari kakak(komariah)', 1648565328, 1648565328),
(55, 'MUHAMMAD FIRMAN ZAKY DZALILLAH', 1, 92, 'MAN 3 KUNINGAN', NULL, 'Desa Kaduagung', '021524', '021500', '020000', '085766106308', 'default1.png', '$2y$10$sEcdukCcvyqNh2U0fRROtewS9g1YfWcyGgliY2G96GjYvjxxBN896', 3, 1, 'Ustadz (Ustadz Dzulkifli)', 1648612155, 1649997716),
(56, 'TRIA IRZA WARTIKA', 0, 92, 'MA Al-Ittifaqiah', NULL, 'Sungai rotan', '110409', '110400', '110000', '089646341778', 'default2.jpeg', '$2y$10$P.6hNhGBcbAqMPmBBTmqRuddBQ7aH11KQta8x44FgdzLTspleGkHS', 3, 0, 'Dari Facebook ', 1648889102, 1648889102),
(57, 'SOLEH SAPUTRA', 1, 92, 'MAN 1 KUNINGAN', NULL, 'Cipedes', '021503', '021500', '020000', '082315083706', 'default1.png', '$2y$10$FsMeqBbX6ytbgj/HPUGnhOAq87L/rkHe1IM.vWEg3./hn/XB.0moS', 3, 0, 'Ada yang sosialisake sekolah', 1649127417, 1649127417),
(58, 'RIA APRILIANI', 0, 92, 'MAN 2 KUNINGAN', NULL, 'Desa benda', '021508', '021500', '020000', '081574713241', 'default2.jpeg', '$2y$10$m3ieLG5BImazz5icueIY3OO6b7BCg7ERHc.dNXfW.jHwuv20jUWFm', 3, 0, 'Dari grup sekolah', 1649388619, 1649388619),
(59, 'ISYAH NUR HAISYAH', 0, 91, 'SMAN 1 Kadugede', NULL, 'Maniskidul', '021516', '021500', '020000', '08987975791', 'default2.jpeg', '$2y$10$bJzL.EUIEsCnlY3mwPB.leo8DspE3TvcfqAN4MvS6nGstPmKMKKuC', 3, 1, 'Dari sekolah', 1649389456, 1649472169),
(60, 'RIJKI WILDANI', 1, 91, 'mana 3 kuningan', NULL, 'Galaherang', '021531', '021500', '020000', '085793606128', 'default1.png', '$2y$10$1L612BKywnwWOl4KTfyUyOz0tFr17wUfa/iu34BCVhmWm/Uga7jNO', 3, 1, 'Dari teman', 1649396755, 1653703815),
(61, 'ELISATUS SA\'ADAH', 0, 92, 'SMK AL BADRI KALISAT', NULL, 'Cumedak', '052426', '052400', '050000', '085333830512', 'default2.jpeg', '$2y$10$OW.45pDkIj2XVWhQp9hQVOjJ7fROoGkK7MyF7PFJEz0QuR86lp4FS', 3, 0, 'Media sosial', 1649644467, 1649644467),
(62, 'AYU NURMALASARI', 0, 92, 'SMAN 1 jalaksana', NULL, 'Jalaksana', '021516', '021500', '020000', '083823140774', 'default2.jpeg', '$2y$10$BEk/Qgp.xaJbsmB6AQv3vOHgiMzqdFhpgGQJhBr0X6piMp1l3OtY6', 3, 1, 'Dari teman (Muhammad Ramadhan )', 1649756493, 1650091036),
(63, 'ILMAN ARDIYANSYAH', 1, 91, 'SMK ASH-SHOBUNIYYAH', NULL, 'LOYANG', '021804', '021800', '020000', '+62895322442395', 'default1.png', '$2y$10$UVZh9vrAbvSdi4LHtin/qOifW0VNUJ/KidHG0cX/T1zdIuPVLMUW6', 3, 0, 'GROUP WA', 1650944868, 1650944868),
(64, 'LELY NURALFI LAILI', 0, 92, 'MAN 2 KUNINGAN', NULL, 'Pangkalan', '021510', '021500', '020000', '0881023533553', 'default2.jpeg', '$2y$10$bRSmQGh8gow8lURe7gecB.rRv71mIpOLTtMsXMszPMZprZFtrhDPG', 3, 0, 'Dra. Popon Kuraesin', 1651123492, 1651123492),
(65, 'NURUL SAFANTY', 0, 91, 'SMA Binaul Ummah', NULL, 'Lambunga', '240717', '240700', '240000', '082127148670', 'default2.jpeg', '$2y$10$fPAoSWeYurQerzZf2.c7ZOI6GU1jQyskA0a.F9p/2eCqPlZ8Tgw06', 3, 0, 'Dari Teman (Teh Ida) ', 1651129268, 1651129268),
(66, 'IRMA ISMAYANTI', 0, 91, 'SMA binaul ummah', NULL, 'Margacina', '021524', '021500', '020000', '085718099832', 'default2.jpeg', '$2y$10$bEKbSAN3vvlOPoH08WAqQu55zPvYbWga8bxf8g6.iPykxV1w6DWNC', 3, 1, 'Dari kakak tingkat di STIS hk', 1651340150, 1655870435),
(67, 'MEKI', 1, 92, 'Jsjs', NULL, 'Kertajaya', '060810', '060800', '060000', '0818382838283', 'default1.png', '$2y$10$9odxy.t2wWKneodK44.ibeEC7MP5FK5R8F9YP8NmfMHfxr10Z7kou', 3, 0, 'Ahmad', 1651465091, 1651465091),
(68, 'IVA KUSTIARA LASTIVA', 0, 91, 'SMKN 1 Kawali', NULL, 'Lumbunh', '021435', '021400', '020000', '085846274236', 'default2.jpeg', '$2y$10$4/saqqF8i6BkDeERJuTh.ukknk1zXtc.mc7ZeueG5yQPcm3tF9X3i', 3, 0, 'Dari keluarga', 1651474779, 1651474779),
(69, 'FAJAR KURNIAWAN', 1, 92, 'MAS YLPI MUJAHIDDIN', NULL, 'Sungai Meranti', '090213', '090200', '090000', '082288694951', 'default1.png', '$2y$10$umtUolZqsUbi8IBGru8Ap.b5VEpnsfOn5wbm0GYPrzvbmH6RTbUCq', 3, 0, 'Ainun karimah', 1651565191, 1651565191),
(70, 'ADITYA RAHMAN', 1, 91, 'SMK Hidayatul Islam', NULL, 'Cikahuripan', '021531', '021500', '020000', '083829726378', 'default1.png', '$2y$10$AOo.KhMEjpSgf/d.y78hReFi7QRrv4cvxj1vhS9yWa/II2wGTNTDK', 3, 1, 'DPC PKS Maleber', 1651852785, 1652337618),
(71, 'DINI SILVIYANI', 0, 92, 'Man 2 Kuningan', NULL, 'Sagaranten', '021506', '021500', '020000', '081324419760', 'default2.jpeg', '$2y$10$Fx6/jT4N9ec8HfcRbCSxJeJgyP8sBr6XbWr28vYoRjY69nte6qlpu', 3, 0, 'Dari media sosial ', 1651971533, 1651971533),
(72, 'RISTA AZAHRA', 0, 91, 'SMK Miftahul Falah Jakarta Selatan', NULL, 'Parung', '021501', '021500', '020000', '089652060221', 'default2.jpeg', '$2y$10$Xu2mZyloVCEEdfv4W9Egw.2vUFgyIyThjwurMIJvGxJRVN/XYqrV2', 3, 0, ' pa isep pa Abud (karyawan HK)', 1652408138, 1652408138),
(73, 'AAS SUTISNA', 1, 92, 'MAS SABILURROSYAD', NULL, 'Dayeuhluhur', '021426', '021400', '020000', '085754726344', 'default1.png', '$2y$10$sb4Bi94.fymTAgNoAkssROvS2xwqqPx/bNq1wymeIgMo6rsOozciK', 3, 1, 'Dari Facebook ', 1652424647, 1658109506),
(74, 'BIMA PRAKASA YUDHA', 1, 91, 'SMAN 4 CIREBON', NULL, 'Karyamulya', '026304', '026300', '020000', '089652694778', 'default1.png', '$2y$10$GhU56iiJe8x822mJw4CmN.ysFWnIW/lt79JeWFSJzerjeZZp/5Jzq', 3, 1, 'Dari Tante (Umi Wina)', 1652933046, 1652933409),
(75, 'IRHAMNI', 1, 91, 'Smk Dairobby', NULL, 'Ciracas', '016402', '016400', '010000', '083872603940', 'default1.png', '$2y$10$5.QYvTHfVc0X4aBtc2/C/e/fr5lCyqmsP2wX.Po/TqhUjTtlAzpfW', 3, 0, 'ust.khozin (abu faqih)', 1653309074, 1653309074),
(76, 'YASIN ABDULLAH', 1, 91, 'SMAN 1 Garawangi', NULL, 'karamatwangi', '021512', '021500', '020000', '089506210802', 'default1.png', '$2y$10$LHNFGjHMe0aqcbxWyz8.vuf254lmm27YIlZTR7gPeOB2Y6t97oSdy', 3, 0, 'dari teman ( kharisma)', 1654066981, 1654066981),
(77, 'MELYANA RISMAYANTI', 0, 92, 'SMA IT YASHUDA', NULL, 'Desa. Cibulan', '021509', '021500', '020000', '087774990332', 'default2.jpeg', '$2y$10$aEjKhu2pz6DUhwaEwOZ.fu2ZLeM7tDnwXpRVLs1y8Xs3wo/VciyzK', 3, 1, 'Dari teman (th silva) ', 1654693219, 1654831433),
(78, 'RINAH MUSTIKA', 0, 92, 'MA DARUL FALAH', NULL, 'Kertajaya', '021820', '021800', '020000', '083149615404', 'default2.jpeg', '$2y$10$DZjkZOAGWdS/XMJHLRLSO.ovY9RHOIwhrQ6mXdG6p1F/FiLn4O6Pq', 3, 0, 'Dari Mba Mutiara Al-Qorni', 1654835012, 1654835012),
(79, 'M RAFI ANDRIANSYAH F', 1, 91, 'SMAN 1 KADUGEDE', NULL, 'Jambar', '021525', '021500', '020000', '0895378271505', 'default1.png', '$2y$10$cbpfsF4JkqOT2/c.6tCxa.MSu2erJt3i3PHIUHbZMLHWFshvKF8Y6', 3, 1, ' (Ulpah)', 1654851237, 1654852326),
(80, 'ALDO PRASTYO', 1, 91, 'Man Gunung megang', NULL, 'Lrg. Tinta mas', '116005', '116000', '110000', '081311054635', 'default1.png', '$2y$10$KJ5G96SjG1Sr7CkeYD0PYOBlo9bNgv/8DBjwaSl8WKskqLd8lgW.2', 3, 0, 'Kakak permpuan', 1654871978, 1654871978),
(81, 'FIKRI BAEHAKI', 1, 92, 'SMK IT DAARUL ABROR', NULL, 'Desa situgede', '021120', '021100', '020000', '0895428992229', 'default1.png', '$2y$10$/gZu9PbAac62iMeJE.03sOE97V1XA/kqrPLAamVALQ69hjGYJq66W', 3, 0, 'Dari grup alumni', 1655532052, 1655532052),
(82, 'DELIA ADEWIAH', 0, 91, 'SMK Budi Bhakti Mandirancan', NULL, 'Patalagan', '021520', '021500', '020000', '083131083541', 'default2.jpeg', '$2y$10$YoM2lN.yEaji0BOORfeuOehB/4QwouwaJZ4ivPGOpTmT44DuFErrW', 3, 0, 'Dari temen', 1655689047, 1655689047),
(83, 'ADILA ZAHRAILHAQ ALGHEFIRA', 1, 92, 'MAN 2 Kuningan', NULL, 'Nanggela', '021509', '021500', '020000', '081313930834', 'default1.png', '$2y$10$hp3BIBltuGXyQpNg2ofQg.nhnhC2liQ8Tb3vEYtPg.l.BPIxuW60u', 3, 1, 'Dari kaka (zaidan)', 1655824462, 1655974834),
(85, 'SUWARNO', 1, 92, 'MA Husnul khotimah', NULL, 'Cikanyere', '020723', '020700', '020000', '08811454220', 'default1.png', '$2y$10$T9mePMAIuu95VeUVUdhejutyRPWLpjuG0iUfpqIzK2B41hoUKDwl.', 3, 0, 'Wesbsite', 1655974775, 1655974775),
(86, 'MUSTIKA RAHAYUNA', 0, 91, 'MAN 1 Kuningan', NULL, 'Babakanmulya', '021516', '021500', '020000', '081222491148', 'default2.jpeg', '$2y$10$O2QZ4esj3LPczsVdU/5SlOHP2Si3me1EHb8PRFoVhoxOtJch2snmu', 3, 0, 'Dari saudara (Nada Amalia Rahida) ', 1655975147, 1655975147),
(87, 'YASFIA', 0, 92, 'MA RAUDLATUL MUTA\'ALIMIN', NULL, 'Pangauban', '020806', '020800', '020000', '083124127585', 'default2.jpeg', '$2y$10$6/3afWOi7pj7Q9rOzhyX6Oyvqh/NK0lctAxarsazm20t0EiT8xB.O', 3, 0, 'Dari pimpinan pondok: Ust taufan firdaus Lc. M.Ag', 1656052942, 1656052942),
(88, 'NENG APRILIA', 0, 91, 'MA sirnamiskin', NULL, 'mh abd rochman', '026002', '026000', '020000', '08996919344', 'default2.jpeg', '$2y$10$ny3DevWCDl/Aj0FQNtw8xeVxcA1zAwBhKAZQVpPsnhof7LyuPTKz.', 3, 0, 'dari teman:eulis', 1656302626, 1656302626),
(89, 'MUHAMMAD AKMAL AS SHODIQ', 1, 91, 'Pondok pesantren Daarul Rahman', NULL, 'Jatimakmur', '026501', '026500', '020000', '085694972142', 'default1.png', '$2y$10$1kqer5o9n1yg3Bgt/6DsQejJYhI.capVgu/OpZPHk3QafhHbpWLuW', 3, 1, 'Dari kerabat', 1656324688, 1656474374),
(90, 'HASNA SALSABILA', 0, 92, 'Dawaul munawar', NULL, 'Cilolohan', '026808', '026800', '020000', '085316270651', 'default2.jpeg', '$2y$10$PV0mDCvnDr8OYYx9xph9SeAnU1gThHLI9p/rTt6vbcqGZfOaII1lO', 3, 0, 'Dari teman ayah ', 1656454960, 1656454960),
(91, 'YUDAN DAWILLAH DARMAWAN', 1, 91, 'SMK ISLAM TERPADU DAARUL ABROR CIBIUK', NULL, 'Desa Cinagara', '021131', '021100', '020000', '089527242009', 'default1.png', '$2y$10$X5PjPTftZ2tVgpwqah.nWOQgMdxz.A95wIs9vbHOUhUX7N02B6QFu', 3, 1, 'Dari sodara (tyias) Alumni stishk', 1656485181, 1656561356),
(92, 'JSNS', 1, 92, 'Dnnd', NULL, 'Ndnd', '040208', '040200', '040000', '082828828211', 'default1.png', '$2y$10$uhjm/af8RN9kSPL.vG4Rd.YxAUaTstAEK.Ueg7RDda80oI4NjrAeK', 3, 0, 'Djjd', 1656487775, 1656487775),
(93, 'NURUL HAMDALAH', 0, 0, 'Ponpes modern Al ikhlas putri', NULL, 'Muncangela', '021521', '021500', '020000', '083805069499', 'default2.jpeg', '$2y$10$mrC.VulowcAvIwWzTLIlF.h/nuwFvl3OjbI6jKfhmo1FPo0aDdWyi', 3, 0, 'Nurul Hamdalah ', 1656645716, 1656645716),
(94, 'TOMI LUKMANA', 1, 91, 'Pondok pesantren modern Al-ikhlash , ciawilor-ciawigebang Kuningan Jawa barat', NULL, 'Desa kananga , ', '021528', '021500', '020000', '082116406799', 'default1.png', '$2y$10$TRLJqcNtTVS9bWa.huhTj.yVBo6xJ/XbZAJXBus8NPMnSMqPgThcS', 3, 1, 'Dari teman ( Nurul Hamdalah )', 1656648651, 1656724650),
(95, 'NURUL AENI', 0, 92, 'SMK Yaba Nusantara Cikawung', NULL, 'Cikawung', '021904', '021900', '020000', '085724533785', 'default2.jpeg', '$2y$10$vzCtSKAHn582QDGM/ynHj.PsPN010DK/23c8UA68UQ.TaCArAy/Gu', 3, 1, 'Dari keluarga (teh dedeh &amp; a henda) ', 1656661740, 1656724659),
(96, 'YAHYA AYYASY', 1, 92, 'SMAS IT Situwangi Islamic Boarding School', NULL, 'Mangkubumi', '026804', '026800', '020000', '081323336605', 'default1.png', '$2y$10$8R.tTaeBMBmyluIJvJLs/OQmaXUMuHuwwmWkCN.zPcHtwZ.GLpTfW', 3, 0, 'Dari ayah', 1656687165, 1656687165),
(97, 'ATIKAH SHOBRINA', 0, 92, 'SMAN 3 KUNINGAN', NULL, 'Ciporang', '021531', '021500', '020000', '08987396189', 'default2.jpeg', '$2y$10$7khbjU/xFlsdYfZYb3XA1eGXxY6RQ/Af6zAz5nCjoLXvZ1H5dEV6C', 3, 0, 'Ibu saya, umi Laela', 1656820269, 1656820269),
(98, 'HEIMALIA PUTRI', 0, 92, 'SMA Negeri 2 Serui', NULL, 'Jln. Jendral So', '250306', '250300', '250000', '081316627870', 'default2.jpeg', '$2y$10$XVpntnXZHGxK1db9um3bueJm9lZ3bVH/T58sjKimFsfVd4vbmozpu', 3, 0, 'Saudara', 1658049920, 1658049920),
(99, 'AIDA QURROTUL AINI', 0, 91, 'MA Daarul Huffaazh', NULL, 'Bondan', '021827', '021800', '020000', '08979677368', 'default2.jpeg', '$2y$10$ASYEUI3eoWiJXu.d3MSvveIKNekS4xW6Rx5QcD7u03NZcXXBlu6ye', 3, 1, 'Teman (Rimah)', 1658104792, 1660873944),
(100, 'ADE MAY LUKY HAREFA', 1, 91, 'SMK BNKP LUZAMANU', NULL, '-', '076009', '076000', '070000', '082365036242', 'default1.png', '$2y$10$WgFx/l9P.RFpvpIgJ9Hl..lPnkuX0VYyaPzg/av0uvpeOuRXP7QBe', 3, 0, 'Dari teman', 1658136321, 1658136321),
(101, 'AISYAH NUR AQILAH', 0, 91, 'SMAIT ASSYIFA BOARDING SCHOOL  JALANCAGAK SUBANG', NULL, 'Cigelereng', '026006', '026000', '020000', '081312600998', 'default2.jpeg', '$2y$10$u.9TCFuB1Gy9/yEH.HYaC.N51iR1.ukmwgy5Zzbr4JCl6A3rxfmiy', 3, 1, 'Dari kaka kelas: ka Maitsa', 1658196306, 1658283151),
(102, 'REINA ZAHIDAH', 0, 91, 'Pondok pesantren Tahfidz Arrasyid Nambo', NULL, 'Tirtajaya', '026603', '026600', '020000', '081914940436', 'default2.jpeg', '$2y$10$qwduNZ/Aoak1bNLOPTkilup3LIIAzlHeOO/R3IlxiF/g3I41H/yJu', 3, 0, 'Info Tahfidz di Instagram ', 1658288925, 1658288925),
(103, 'MUHAMMAD HAFIDUDDIN', 1, 92, 'sma almuqoddasah', NULL, 'Ketularan', '040216', '040200', '040000', '085950878351', 'default1.png', '$2y$10$WhGmM9jMEgYZOOKUPKjyFOkn1THNRl.ku9jxiQ6JFZCT0wZMn2Po6', 3, 0, 'Dari facebook', 1658367948, 1658367948),
(104, 'ARDLIN RAMDHAN SYUHADA', 1, 91, 'SMAN 1 MANDIRANCAN', NULL, 'Danalampah', '021520', '021500', '020000', '081573401181', 'default1.png', '$2y$10$bK.GA2u9twBqUNp53sxnpOuNfV3POmKStr7i3SxLxhwHHcgCo.Ku2', 3, 1, 'Dari grup WhatsApp Husnul Khotimah', 1658467964, 1659513726),
(105, 'ACHMAD AKBAR FAIZ MUBAROK', 1, 91, 'SMK N Jawa Tengah', NULL, 'Tanjungmeru', '030510', '030500', '030000', '081227617521', 'default1.png', '$2y$10$GWc96k5IVdv9iRjjv3Y14u8lH5AI0o34D4qVxwf0CbDgMWUr5Tsji', 3, 0, 'Dari IG : Infobeasiswatahfidz', 1658502411, 1658502411),
(106, 'ABIDAH MUTHIAH BAROROH', 0, 91, 'MA NURUL CHALIK', NULL, 'DESA SIMPANGAN', '110905', '110900', '110000', '085840500430', 'default2.jpeg', '$2y$10$nK0WqVsn8VjWIvlU1/YwDOK2vZYSfTVW4grGF9b9xjY2ssSxtsvQq', 3, 1, 'DARI TEMAN (FIRDA)', 1659048911, 1660528059),
(107, 'RAHMAD MUNTARI SANTOSO JS', 1, 91, 'Pondok pesantren darul Muhsinin', NULL, 'Ujung gading ja', '072306', '072300', '070000', '082281016623', 'default1.png', '$2y$10$S24./cco1mdyuFxNROLljugbLhtR7YJh1yvyNf1XTizIlnsNQsJru', 3, 0, 'Sosial media', 1659331448, 1659331448),
(108, 'RAHMAN MAULANA HADIWIJAYA', 1, 91, 'SMAN 1 Cisarua', NULL, 'Kasturi', '021513', '021500', '020000', '082216543155', 'default1.png', '$2y$10$pJYqRSfBuQM5e2KMSKaIoux1YYkuMVV.CuCWSww9iKOV/9MW/fWaC', 3, 0, '', 1659352915, 1659352915),
(109, 'MILA KAMILATUN NISA', 0, 92, 'MA AL-HIKMAH', NULL, 'Cieurih', '021425', '021400', '020000', '082119116770', 'default2.jpeg', '$2y$10$Mlha6JXfDi1DTrakWJzuReXUSNvzSMzYvyZm3IE988TyBKZJPtJyO', 3, 0, 'Dari Kaka(Ust.Arif)', 1659435568, 1659435568),
(110, 'HANINA NAZZALA', 0, 91, 'SMA BINAUL UMMAH', NULL, 'Rawa Terate', '016408', '016400', '010000', '089505085187', 'default2.jpeg', '$2y$10$T1l.kFNcihvCqiQLgYjyJusGst.gsQwPvyp1sZdI58aUz.48/kYuO', 3, 0, 'Dari google', 1659448942, 1659448942),
(111, 'GHOLIYAH KHUSNUN AFIFAH', 0, 92, 'Ma\'had imam Syafi\'i', NULL, 'Harjosari kidul', '032812', '032800', '030000', '089643263358', 'default2.jpeg', '$2y$10$LIIoKpRZW71110E09JsnV.Ped1rUoZ5aUNVqLtD/fcJZqaUSnAFO6', 3, 0, 'Teman', 1659508992, 1659508992),
(112, 'NUR ALIFA', 0, 92, 'MAN 1 Cirebon', NULL, 'Desa Balad', '021726', '021700', '020000', '089512501871', 'default2.jpeg', '$2y$10$.CT1wD2xwIacPMI5PvyCnOc5kNw92uwn3/e/Ahh3N8GRr4wpLd5vu', 3, 1, 'Dari bibi', 1659591878, 1659688288),
(113, 'FARIDATUN ILMI JAMAL', 0, 91, 'MA Darul Istiqamah', NULL, 'Puncak Indah', '192604', '192600', '190000', '085756152371', 'default2.jpeg', '$2y$10$cktT8J1iBLY2JSt6ZBYmU.xKXHS7qh139Fv46kCga4hknCQjdZua6', 3, 0, 'Dari Sosmed', 1660472674, 1660472674),
(114, 'MA\'RIFAT M MUSA', 0, 92, 'SMAN 1 Tinangkung', NULL, 'Labibi', '180118', '180100', '180000', '085298903420', 'default2.jpeg', '$2y$10$7y7iR/2W5ExlfL6NBzeGpOD.MlFa2vxOtzqVCVdLmngU3hP0ajdz6', 3, 0, 'Dari Media sosial ', 1660707079, 1660707079),
(115, 'SITI MAISAROH', 0, 91, 'Anshor Al assunnah', NULL, 'Sawah', '090119', '090100', '090000', '081313752257', 'default2.jpeg', '$2y$10$830/iOj8tw1qGAaCjAC.PuJARIuO9S/ECUNajLTiZ/6XNF.LqzeXq', 3, 1, 'Dari guru(ustad Mumuh)', 1661006574, 1661154897),
(116, 'DAMAS ARIF RAMADHANI', 1, 91, 'SMA Mbs poncowati Lampung tengah', NULL, 'Gunung agung', '120209', '120200', '120000', '085668406369', 'default1.png', '$2y$10$vLXmVfQ1NSj6gIPBC.o3hegkq1XCfIHEoChl7pTpIppCjn7fyuCXa', 3, 0, 'Dari teman (Fira)', 1661160120, 1661160120),
(117, 'NUGIE SAPUTRA', 1, 91, 'MA Subulul Huda Darma', NULL, 'Parung', '021501', '021500', '020000', '085797715610', 'default1.png', '$2y$10$mof5.npyd6j4F4/VQ.WsU.6grTrGdzwyWMWps6/l66hvgXYgyNEka', 3, 1, 'Sella Ristiana', 1661344961, 1661396302),
(118, 'PAHROROZI', 1, 92, 'SMA BAITUL QURAN DEPOK', NULL, 'Bukit baru', '296005', '296000', '290000', '085882856243', 'default1.png', '$2y$10$6P7d9yTzU6Zl3n.ZCFr.zuFTiNvshOBrFPFeRkq3qyTswq1fCGsmy', 3, 0, 'Dari ig @info_tahfizh', 1661436883, 1661436883),
(119, 'ACHMAD NURJANAH', 1, 91, 'MAN KOTA CIMAHI', NULL, 'CIBEBER', '020819', '020800', '020000', '081567655485', 'default1.png', '$2y$10$qY4g5WP9FqibWTR3AtX.z.If3PX15ubvaGL/XCG/5uZY7xL3cnRum', 3, 1, 'DARI GURU SEKOLAH MANKOCI', 1661493220, 1661910090),
(120, 'NABILA', 0, 91, 'SMAN 1 TANJUNG BATU', NULL, 'Seri bandung', '111003', '111000', '110000', '083879056994', 'default2.jpeg', '$2y$10$cToqE2zdWnQMXAWitRfR8u8ORhuC3lmZqnPa4BI5y5BsvJRb9x57u', 3, 1, 'Ig', 1661594461, 1661910098),
(121, 'HASNA SALSABILA', 0, 92, 'SMA Islam Ibnu Siena', NULL, 'Kahuripan', '026808', '026800', '020000', '6285316270651', 'default2.jpeg', '$2y$10$obmFEdoFHAcSyPn2yQjosO44rZVINcYka1SX7gNQvmQoRtC8oeadK', 3, 1, 'Orang tua', 1661786444, 1661910080),
(122, 'RESKI SAPUTRA', 1, 91, 'SMAN 1 Luwu Timur', NULL, 'Lakawali', '192604', '192600', '190000', '085243927752', 'default1.png', '$2y$10$BxMVrBTlYIjtkunXcaOSZOeY6UF0Sj1lwsSht682gXvTdSwERoDpG', 3, 1, 'Murobbi', 1663036319, 1663573251),
(123, 'RIFA SITI PADILAH', 0, 92, 'MAN 2 KUNINGAN', NULL, 'Desa Ancaran', '021513', '021500', '020000', '089660521223', 'default2.jpeg', '$2y$10$WtaHU.RP/7TF4lpUivBMluUFTkrSpjuD9YT5GfN2ABsMB2fNMfoKe', 3, 0, 'Dari Grup Man 2 Kuningan ', 1663560194, 1663560194),
(124, 'SITI KUMAEROH', 0, 91, 'MAN 3 CIREBON', NULL, 'Desa kendal', '021708', '021700', '020000', '0895604005235', 'default2.jpeg', '$2y$10$759fE6zdBFviCzF.3ZkHQOoLJIYRji3crpDdEOpd.u1RuTB9k6T2C', 3, 0, 'Dari bimbingan konseling', 1663746658, 1663746658),
(125, 'AHMAD HADI SULISTIYO', 1, 92, 'SMK Ma\'arif Kota Mungkid', NULL, 'Donorojo', '030811', '030800', '030000', '081215289218', 'default1.png', '$2y$10$XhZ/zKjENL5Fz75ftkYiIO7zlf/crtX4FRpEqvDW1Hx.UD2gzEwTq', 3, 0, 'Internet ', 1665279727, 1665279727),
(126, 'MURSAHIDIN', 1, 91, 'MA DARUL MASAKIN', NULL, 'desa sedau', '230105', '230100', '230000', '083147897099', 'default1.png', '$2y$10$rn881dvKdggJ52lMtVLgZOIy.sh1U0taBKnmXvLgXgndeEvdEQY7i', 3, 0, 'dari fecbook', 1667566783, 1667566783);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
