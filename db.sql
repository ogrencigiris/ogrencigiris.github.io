1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamaný: 14 Ara 2014, 10:28:10
-- Sunucu sürümü: 5.6.16
-- PHP Sürümü: 5.5.11
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
--
-- Veritabaný: `ogrenci`
--
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `dokuman`
--
 
CREATE TABLE IF NOT EXISTS `dokuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(150) NOT NULL,
  `ogrno` int(11) NOT NULL,
  `bilgi` varchar(200) NOT NULL,
  `yol` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
 
--
-- Tablo döküm verisi `dokuman`
--
 
INSERT INTO `dokuman` (`id`, `ad`, `ogrno`, `bilgi`, `yol`) VALUES
(1, 'M.Ali', 135035026, 'sdfsdf', 'sdfsdf');
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `kitap`
--
 
CREATE TABLE IF NOT EXISTS `kitap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(100) NOT NULL,
  `baslik` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `kitaplik`
--
 
CREATE TABLE IF NOT EXISTS `kitaplik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `kulupler`
--
 
CREATE TABLE IF NOT EXISTS `kulupler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(150) NOT NULL,
  `bilgi` varchar(300) NOT NULL,
  `yoneticiid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `ogrenci`
--
 
CREATE TABLE IF NOT EXISTS `ogrenci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrno` int(11) NOT NULL,
  `icerik` text NOT NULL,
  `paylasim` varchar(250) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `uyekitap`
--
 
CREATE TABLE IF NOT EXISTS `uyekitap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `kitapid` varchar(100) NOT NULL,
  `kitaplikid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `uyekulup`
--
 
CREATE TABLE IF NOT EXISTS `uyekulup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `kulupid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Tablo için tablo yapýsý `uyeler`
--
 
CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrno` int(11) NOT NULL,
  `ad` varchar(100) DEFAULT NULL,
  `soyad` varchar(100) DEFAULT NULL,
  `fakulte` varchar(200) DEFAULT NULL,
  `bolum` varchar(200) DEFAULT NULL,
  `sinif` varchar(5) DEFAULT NULL,
  `eposta` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;
 
--
-- Tablo döküm verisi `uyeler`
--
 
INSERT INTO `uyeler` (`id`, `ogrno`, `ad`, `soyad`, `fakulte`, `bolum`, `sinif`, `eposta`) VALUES
(47, 135035026, 'M.Aasdasdli', 'Baharrrrr', 'TBMYO', 'Bilgisayar', '2/A', 'muhammedalibahar@gmail.com');
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;