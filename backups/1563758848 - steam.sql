

CREATE TABLE IF NOT EXISTS `accounts` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  `name` varchar(56) NOT NULL,
  `userurl` varchar(56) NOT NULL,
  `avatarurl` varchar(256) NOT NULL,
  `bigavatarurl` varchar(256) NOT NULL,
  `staffname` varchar(56) NOT NULL DEFAULT '',
  `TotalCases` int(12) NOT NULL DEFAULT '0',
  `WeeklyCases` int(12) NOT NULL DEFAULT '0',
  `FormalWarnings` int(2) NOT NULL DEFAULT '0',
  `TagsWhitelist` int(11) NOT NULL DEFAULT '0',
  `Overwatched` int(11) NOT NULL DEFAULT '0',
  `WeeklyTech` int(12) NOT NULL DEFAULT '0',
  `ip` text NOT NULL,
  `pass` text NOT NULL,
  `blocked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO `accounts` (`uid`, `pid`, `name`, `userurl`, `avatarurl`, `bigavatarurl`, `staffname`, `TotalCases`, `WeeklyCases`, `FormalWarnings`, `TagsWhitelist`, `Overwatched`, `WeeklyTech`, `ip`, `pass`, `blocked`) VALUES
	(7,'76561198170373903','pauly','https://steamcommunity.com/id/ip-spoofer/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d2/d2e0fa4047650700b7e59804af8b3d04b066d2f3_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d2/d2e0fa4047650700b7e59804af8b3d04b066d2f3_full.jpg','pauly','0','0','0','0','0','0','45.12.223.84','pD/S19x36ZmrzbtiV0uGncIFXh6tG0C/l70+OelKIEo=','0'),
	(6,'76561198293578146','brandon','https://steamcommunity.com/id/Laugh/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/af/afc27e8dfea12f8b594e1d718206afb017d0455c_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/af/afc27e8dfea12f8b594e1d718206afb017d0455c_full.jpg','brandon','0','0','0','0','0','0','96.30.145.24','0R6KssT7rTNx0zAykfG694XKxfMOCX9mGzxqOkWdEBI=','0'),
	(8,'76561198075021625','MapleMooses ?','https://steamcommunity.com/id/friendo/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/73/73a99562ea98b7a5b134f030e30d1f6d37208fe4_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/73/73a99562ea98b7a5b134f030e30d1f6d37208fe4_full.jpg','Alek Belokov','0','0','0','0','0','0','70.81.181.117','IZ2U7Iob4PldMGRJ0pEA0GHy9OJ0+U5hW5vTGVZL0xM=','0'),
	(9,'76561198404773914','Kobe','https://steamcommunity.com/profiles/76561198404773914/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg','John Reddington',3,3,'0','0','0','0','24.26.156.110','ZgrdTJCEmOKz5XjaVgQfiTC7GXOFg8UF69I4pvLZXXA=','0'),
	(10,'76561198180984321','Dave Coleman DayLight.Networks','https://steamcommunity.com/id/monkeycow/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/c3/c3886d888c54f7612f31c5d8135646ebcc187942_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/c3/c3886d888c54f7612f31c5d8135646ebcc187942_full.jpg','Dave Coleman',1,1,'0','0',3,'0','89.187.164.93','raSJbLzOYb2T3Othqb/Ejyqn55wOoa0FNRepqNxCc+0=','0'),
	(11,'76561198201442377','Amber Freeman','https://steamcommunity.com/profiles/76561198201442377/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/6b/6ba327331a4706bee0b29c25bc0a34a081e08fe6_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/6b/6ba327331a4706bee0b29c25bc0a34a081e08fe6_full.jpg','Amber Freeman','0','0','0','0','0','0','174.240.5.88','Wzf6JV/9l7ujQRcbE9HkIUUaq8W8w9XtAmv5qwLrFrc=','0'),
	(12,'76561198326967896','Jordan','https://steamcommunity.com/id/plusknight/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/7b/7b569680f3a2067ec884c47e0e2c93d7da8ead7d_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/7b/7b569680f3a2067ec884c47e0e2c93d7da8ead7d_full.jpg','Jordan','0','0','0','0','0','0','96.32.224.165','7nIpf0AC0NcwnryM9wiFfJdKk3Rz6upGh2Cw/m65lB4=','0'),
	(13,'76561198119258603','Trunks','https://steamcommunity.com/id/treetrunk/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d1/d1322c032749da805f8bd6ec3b4e67a4b0afde9f_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d1/d1322c032749da805f8bd6ec3b4e67a4b0afde9f_full.jpg','John Silver',4,4,'0','0','0','0','76.180.130.202','2p6TZo0H2lTivDEfBofWyqwTNTSjTI68xJJH45kxeWA=','0'),
	(14,'76561198317726585','Faded Kill','https://steamcommunity.com/id/fadedkill/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/9e/9eaaf2d55bd6a69a4f572f4816356ed9148019c8_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/9e/9eaaf2d55bd6a69a4f572f4816356ed9148019c8_full.jpg','Braid Rosso',11,11,'0',2,'0','0','99.95.124.198','+eTIUjLQLBCWSQ+HttuPhnnyKAvEK8OqsTGjkLYnsLM=','0'),
	(15,'76561197960560932','Heat','https://steamcommunity.com/profiles/76561197960560932/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/20/20d1a9547fef7ddaca403a12da3f6138b8df84c7_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/20/20d1a9547fef7ddaca403a12da3f6138b8df84c7_full.jpg','TylerChampion','0','0','0','0','0','0','75.160.214.46','Y37BJW6IUINI4HYvVj9UzehB2qENZ1nLL70QHCjvRiU=','0'),
	(16,'76561198310430800','[140th] Andrew','https://steamcommunity.com/profiles/76561198310430800/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg','AndrewSanderson','0','0','0','0','0','0','94.0.175.1','wgAMZuBlWdgc2q/DYU/tLE0BPej8Et32Z/TIU+kvMyA=','0'),
	(17,'76561198140151368','DayLight.Networks ????','https://steamcommunity.com/profiles/76561198140151368/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/01/01f0d13ff4725fd466f24dfbeb9a4639ff9cd1af_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/01/01f0d13ff4725fd466f24dfbeb9a4639ff9cd1af_full.jpg','Jason Smith',8,8,'0','0','0','0','107.217.48.12','on7yM6svEUx7GRSJMiL5nRxsFGv7oSWHpdI1a7S5epg=','0'),
	(18,'76561198208080315','.benjarino DayLight.network','https://steamcommunity.com/id/benjarino/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fe8c603f221a687e7d791aed173bd031d79d553c_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fe8c603f221a687e7d791aed173bd031d79d553c_full.jpg','Ben Jarino','0','0','0','0','0','0','173.76.254.175','VVKikLjcnDFRkYg0xac/p4OVPFmV5TxKk/XV+lbjQOI=','0'),
	(19,'76561198041001394','shade','https://steamcommunity.com/id/Shade920/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/ed/ed7daf5258327b5945372c9ee536f38d884e479c_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/ed/ed7daf5258327b5945372c9ee536f38d884e479c_full.jpg','Ace Booth','0','0','0','0','0','0','67.161.22.55','VupnY8vMEJsf2iiV1QP3dFf6F/iTuHy56IZJY2XPN0Y=','0'),
	(20,'76561198178942257','BustinBudTV','https://steamcommunity.com/profiles/76561198178942257/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/8e/8e7921eecbfe0dd27e1016bc6e65318859d08f3c_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/8e/8e7921eecbfe0dd27e1016bc6e65318859d08f3c_full.jpg','Chriss James',6,6,'0','0','0','0','174.29.140.160','jCbSmMb98533MEhtOtdel+oNmOnKyVn+Mf95dsiv/0k=','0'),
	(21,'76561198093375356','Invictus','https://steamcommunity.com/id/Haywo0d/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/16/16895e7cacc77de73f3354cfa207554fd4211f4a_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/16/16895e7cacc77de73f3354cfa207554fd4211f4a_full.jpg','Haywood','0','0','0','0','0','0','68.99.82.69','B/QYwjm95pmQeRfIqRzZnxG58azVO9j9/sCq4xgZK20=','0'),
	(22,'76561198143613231','DayLight.Network Andrew','https://steamcommunity.com/profiles/76561198143613231/','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/06/063a0dc6e50f59c10e87c073bf588b6dcfa0df61_medium.jpg','https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/06/063a0dc6e50f59c10e87c073bf588b6dcfa0df61_full.jpg','null','0','0','0','0','0','0','','','0');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `cases` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  `punishment` varchar(56) NOT NULL,
  `suspect` varchar(56) NOT NULL,
  `notes` varchar(10000) NOT NULL,
  `overwatch` varchar(56) NOT NULL,
  `date` varchar(56) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO `cases` (`uid`, `pid`, `punishment`, `suspect`, `notes`, `overwatch`, `date`) VALUES
	(1,'76561198404773914','Whitelist/Tags','John Ackerman','Gave him his teamspeak tags','','21-07-2019'),
	(2,'76561198404773914','Whitelist/Tags','Scott Raze','Gave him his ts teamspeak ','','21-07-2019'),
	(3,'76561198404773914','Whitelist/Tags','Rakan Bin Riyadh','Gave him his ts tags','','21-07-2019'),
	(4,'76561198317726585','Whitelist/Tags','John wilson ','DLN tag','none','21-07-2019'),
	(5,'76561198317726585','Warning Points','Clif Manarello,rocco tacco','https://www.youtube.com/watch?v=zHTXc72V1rk&feature=youtu.be','Dave Coleman','21-07-2019'),
	(6,'76561198317726585','Warning Points','Clif Manarello,rocco tacco','https://www.youtube.com/watch?v=zHTXc72V1rk&feature=youtu.be','Dave Coleman','21-07-2019'),
	(7,'76561198317726585','Whitelist/Tags','Centurion Galio','UN whitelisting  ','Tyler champion','21-07-2019'),
	(8,'76561198317726585','Whitelist/Tags','Danny Trejo','DLN tag ','none','21-07-2019'),
	(9,'76561198317726585','Whitelist/Tags','Ming Pusha','DLN tag ','','21-07-2019'),
	(10,'76561198140151368','Whitelist/Tags','Connor(Teamspeak Name)','Asked For Member Tag','N / A','21-07-2019'),
	(11,'76561198140151368','Compensation Issued','Liam Capone, Kacper','Liam was rdmed by Kacper 50k comp was issued to liam by kacper for his mistake','N/A','21-07-2019'),
	(12,'76561198140151368','Whitelist/Tags','Abu','Giving PFC Whitelisting Authed by Alek','N/A','21-07-2019'),
	(13,'76561198140151368','Whitelist/Tags','Reggie','Asked For Member Tag Was given Member Tag','N/A','21-07-2019'),
	(14,'76561198140151368','Whitelist/Tags','Lourince','Asked For \"Member\" Tag Was given \"Member\" Tag, Asked For \"The Chechen\" tag and was given when roster was shown','N/A','21-07-2019'),
	(15,'76561198140151368','Whitelist/Tags','Connor','Requested Member Tag and it was provided(dont know if I already logged this, apologies if I did)','N/A','21-07-2019'),
	(16,'76561198140151368','Whitelist/Tags','Alex Roadman/Tree Ambushe','Givin EMS whitlisting authed by Alek','N/A','21-07-2019'),
	(17,'76561198317726585','Whitelist/Tags','Marcus Manarello','Gang tag and un tag ','none','21-07-2019'),
	(18,'76561198317726585','N/A','Ryan Awbrey ','tech support about linking steam ','none','21-07-2019'),
	(19,'76561198317726585','Compensation Issued','all the UR FAT gang member ','$2,210,000 comped cuz the glitch with gold bars talk to Dave for more info ','Dave Coleman','22-07-2019'),
	(20,'76561198180984321','Compensation Issued','Lewis Gunna','200k comp /  https://www.youtube.com/watch?v=rsDmxxOsCtg&feature=youtu.be / Took money even though the gang was not created','N/A','22-07-2019'),
	(21,'76561198119258603','Compensation Issued','Johny Hunter ','had a car we removed from the server ','Jonh Silver ','22-07-2019'),
	(22,'76561198119258603','Compensation Issued','John Silver','gave myself 500k to give pis in game ','Jonh Silver ','22-07-2019'),
	(23,'76561198317726585','Whitelist/Tags','Abo dosr AL Shishani ','gave him gang tag','none','22-07-2019'),
	(24,'76561198119258603','Compensation Issued','Ryan Jay','server went down ','Jonh Silver ','22-07-2019'),
	(25,'76561198317726585','Whitelist/Tags','Jacob Topper ','tmp tags ','none','22-07-2019'),
	(26,'76561198119258603','Compensation Issued','Ryan Jay',' rebel spawn broke and he was rdmed ','Jonh Silver ','22-07-2019'),
	(27,'76561198140151368','Whitelist/Tags','Scott Duckle','TMP Whitelisting Lvl 1','N/A','22-07-2019'),
	(28,'76561198178942257','Whitelist/Tags','James Mags','DNL tags requested DNL tags given ','','22-07-2019'),
	(29,'76561198178942257','Whitelist/Tags','Max Flash ','DNL tags Requested DNL tags given ','','22-07-2019'),
	(30,'76561198178942257','Whitelist/Tags','Jake Flash','Tags DLN requested DNL tags given ','','22-07-2019'),
	(31,'76561198178942257','Whitelist/Tags','Jacob Spreezy','Whitlisting for TMP lvl 1 requested TMP Lvl 1 given','','22-07-2019'),
	(32,'76561198178942257','N/A','Cal monarello','Questiong about Trial Staff','','22-07-2019'),
	(33,'76561198178942257','N/A','Kyle Fisherman and friend ','Needed official gang stuff worked out Ben was unavalable \r\n','','22-07-2019');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `civ_licenses2` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(128) NOT NULL,
  `name` varchar(76) NOT NULL,
  `box_id` varchar(24) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `civ_licenses2` (`uid`, `class`, `name`, `box_id`) VALUES
	(1,'license_civ_gun','Gun License','1'),
	(2,'license_civ_duper','Duper','2'),
	(3,'license_civ_passport','Passport','3'),
	(4,'license_civ_driver','Driver License','4'),
	(5,'license_civ_oil','Oil Processing License','5'),
	(6,'license_civ_diamond','Diamond Processing License','6'),
	(7,'license_civ_salt','Salt Processing License','7'),
	(8,'license_civ_Sand','Sand Processing License','8'),
	(9,'license_civ_cocaine','Cocaine Processing','9'),
	(10,'license_civ_heroin','Heroin Processing','10'),
	(11,'license_civ_marijuana','Marijuana Processing','11'),
	(12,'license_civ_cloth','Cloth License','12'),
	(13,'license_civ_rubber','Rubber License','13');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `cop_licenses2` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(128) NOT NULL,
  `name` varchar(76) NOT NULL,
  `box_id` varchar(24) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `cop_licenses2` (`uid`, `class`, `name`, `box_id`) VALUES
	(1,'license_cop_nato','NATO License','1');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `cop_ranks` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` varchar(26) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `cop_ranks` (`uid`, `level`, `name`) VALUES
	(1,1,'Cop Level 1'),
	(2,2,'Cop Level 2'),
	(3,3,'Cop Level 3'),
	(4,4,'Cop Level 4'),
	(5,5,'Cop Level 5'),
	(6,6,'Cop Level 6'),
	(7,7,'Cop Level 7'),
	(8,8,'Cop Level 8'),
	(9,9,'Cop Level 9'),
	(10,10,'Cop Level 10');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `flagged` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `fwarn` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `creator` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` varchar(56) NOT NULL,
  `Idiot` varchar(256) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `med_licenses2` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(128) NOT NULL,
  `name` varchar(76) NOT NULL,
  `box_id` varchar(24) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `med_licenses2` (`uid`, `class`, `name`, `box_id`) VALUES
	(1,'license_med_tru','Tactical Response Unit','medictruboxa'),
	(2,'license_med_command','Department Command','medcmdboxa'),
	(3,'license_med_highcommand','High Command','medhcmdboxa');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `medic_ranks` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` varchar(26) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `medic_ranks` (`uid`, `level`, `name`) VALUES
	(1,1,'Medic Level 1'),
	(2,2,'Medic Level 2'),
	(3,3,'Medic Level 3'),
	(4,4,'Medic Level 4'),
	(5,5,'Medic Level 5');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `notes` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  `creator` varchar(56) NOT NULL,
  `date` varchar(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `notes` (`uid`, `pid`, `creator`, `date`, `reason`) VALUES
	(1,'76561198264345672','Alek Belokov','21-07-2019','Comp 500,000 after losing Uranium in truck during a server crash'),
	(2,'76561198258868284','pauly','21-07-2019','150K COMP FOR GANG - Pauly'),
	(3,'76561198316812270','Alek Belokov','21-07-2019','200,000 Comp'),
	(4,'76561198123409295','Jason Smith','21-07-2019',''),
	(5,'76561198316812270','Alek Belokov','22-07-2019','Comp');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `points` (
  `uid` bigint(255) NOT NULL AUTO_INCREMENT,
  `pid` varchar(156) NOT NULL,
  `name` varchar(56) NOT NULL,
  `points` bigint(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `points` (`uid`, `pid`, `name`, `points`) VALUES
	(1,'76561198352825118','Debug Desmond',5),
	(2,'76561198314986618','Jake Woods',15),
	(3,'76561198879109187','[TMP] Pfc. C. Valentino',10),
	(4,'76561198336843149','Abu Ali ALShishani',10);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `points_logs` (
  `uid` bigint(255) NOT NULL AUTO_INCREMENT,
  `pid` varchar(156) NOT NULL,
  `creator` varchar(56) NOT NULL,
  `amount` int(66) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `active` int(2) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `points_logs` (`uid`, `pid`, `creator`, `amount`, `reason`, `date`, `active`) VALUES
	(1,'76561198352825118','Jason Smith',5,'RDM','2019-07-21',1),
	(2,'76561198314986618','John Silver',15,'RDM','2019-07-21',1),
	(3,'76561198879109187','Jason Smith',10,'RDM - told to by dave','2019-07-22',1),
	(4,'76561198336843149','John Silver',10,'RDM at check point ','2019-07-22',1);

-- ------------------------------------------------ 

