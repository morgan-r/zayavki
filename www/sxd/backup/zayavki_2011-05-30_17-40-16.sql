#SXD20|20008|50045|50204|2011.05.30 17:40:16|zayavki|cp1251|9|28|
#TA mat`3`117|naklr`0`0|peremen`1`17|rashod`3`39|soft`1`155|tehnika`3`276|user`1`65|who`7`518|zayavka`9`428
#EOH

#	TC`mat`cp1251_general_ci	;
CREATE TABLE `mat` (
  `id` int(3) NOT NULL auto_increment,
  `name` char(30) NOT NULL,
  `price` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251	;
#	TD`mat`cp1251_general_ci	;
INSERT INTO `mat` VALUES 
(1,'Тонер',450),
(2,'Тонер HP',300),
(3,'Тонер SAMSUNG',290)	;
#	TC`naklr`cp1251_general_ci	;
CREATE TABLE `naklr` (
  `id` int(6) NOT NULL auto_increment,
  `nakl` int(7) NOT NULL,
  `id_mat` int(3) NOT NULL,
  `kol_vo` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251	;
#	TC`peremen`cp1251_general_ci	;
CREATE TABLE `peremen` (
  `id_zayavka` int(6) NOT NULL,
  `id_teh` int(5) NOT NULL,
  `new_otdel` int(3) NOT NULL,
  `id_otv_n` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251	;
#	TD`peremen`cp1251_general_ci	;
INSERT INTO `peremen` VALUES 
(1,2,30,1)	;
#	TC`rashod`cp1251_general_ci	;
CREATE TABLE `rashod` (
  `id_mat` int(3) NOT NULL,
  `kol_vo` int(5) NOT NULL,
  `id_zayavka` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251	;
#	TD`rashod`cp1251_general_ci	;
INSERT INTO `rashod` VALUES 
(1,500,3),
(1,100,2),
(2,1,9)	;
#	TC`soft`cp1251_general_ci	;
CREATE TABLE `soft` (
  `id_zayavka` int(6) NOT NULL,
  `software` char(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251	;
#	TD`soft`cp1251_general_ci	;
INSERT INTO `soft` VALUES 
(8,'Windows XP')	;
#	TC`tehnika`cp1251_general_ci	;
CREATE TABLE `tehnika` (
  `id` int(5) NOT NULL auto_increment,
  `teh` char(20) default NULL,
  `model` char(40) NOT NULL,
  `stoimost` int(6) NOT NULL,
  `inv_number` char(15) NOT NULL,
  `id_otv` int(3) NOT NULL,
  `id_otdel` int(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251	;
#	TD`tehnika`cp1251_general_ci	;
INSERT INTO `tehnika` VALUES 
(1,'Монитор','SAMSUNG',5640,'00000000000324',1,32),
(2,'Системный блок','IRBIS',17984,'00000000000324',1,32),
(3,'Принтер','HP',4090,'000000000243',3,35)	;
#	TC`user`cp1251_general_ci	;
CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `surname` char(25) default NULL,
  `name` char(15) NOT NULL,
  `login` char(15) NOT NULL,
  `password` int(33) NOT NULL,
  `status` enum('admin','user') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251	;
#	TD`user`cp1251_general_ci	;
INSERT INTO `user` VALUES 
(0,'Шаталов','Максим','admin',0,'admin')	;
#	TC`who`cp1251_general_ci	;
CREATE TABLE `who` (
  `id` int(4) NOT NULL auto_increment,
  `F` char(25) default NULL,
  `I` char(15) default NULL,
  `O` char(25) default NULL,
  `otdel` int(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=cp1251	;
#	TD`who`cp1251_general_ci	;
INSERT INTO `who` VALUES 
(1,'Филатова','Елена','Павловна',32),
(2,'Рамазанова','Юлия','Александровна',31),
(3,'Фенина','Рашида','Джагафаровна',35),
(4,'Трифонов','Артем','Александрович',34),
(5,'Юдина','Нелли','Валерьевна',33),
(7,'Жаркова','Наталья','Ивановна',33),
(8,'Васильева','Надежда','Ивановна',34)	;
#	TC`zayavka`cp1251_general_ci	;
CREATE TABLE `zayavka` (
  `id` int(6) NOT NULL auto_increment,
  `date_z` datetime NOT NULL,
  `id_who` int(3) NOT NULL,
  `problem` text NOT NULL,
  `isp` char(25) NOT NULL,
  `comments` text NOT NULL,
  `date_isp` datetime NOT NULL,
  `vip` enum('0','1') default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251	;
#	TD`zayavka`cp1251_general_ci	;
INSERT INTO `zayavka` VALUES 
(1,'2011-05-23 02:34:19',1,'Не работает компьютер','Шульгин А','','2011-05-23 14:44:24','1'),
(2,'2011-05-23 19:20:53',2,'Принтер','Шульгин А','','2011-05-24 15:40:09','1'),
(3,'2011-05-23 21:27:00',3,'Принтер','Шульгин А','','2011-05-23 21:27:48','1'),
(4,'2011-05-23 23:01:11',4,'Сломалась мышь','','','0000-00-00 00:00:00','1'),
(5,'2011-05-23 23:05:37',4,'Монитор','','','0000-00-00 00:00:00','0'),
(6,'2011-05-23 23:06:58',5,'Клавиатура','','','0000-00-00 00:00:00','0'),
(7,'2011-05-24 11:56:23',5,'Монитор','','','0000-00-00 00:00:00','0'),
(8,'2011-05-30 16:07:40',5,'Компьютер','Шаталов М В','Переустановил','2011-05-30 16:08:31','0'),
(9,'2011-05-30 16:47:56',7,'Принтер','Шаталов М В','','2011-05-29 02:21:17','')	;
