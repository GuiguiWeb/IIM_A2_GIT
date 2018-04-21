# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.21)
# Base de données: IIM_Git_SoundCloud
# Temps de génération: 2018-04-21 18:32:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;



# Affichage de la table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `mid` int(11) unsigned NOT NULL,
  `message` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `mid` (`mid`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `musics` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `uid`, `mid`, `message`, `date`)
VALUES
	(1,6,1,'Comment 1\n','2018-04-20 16:56:02'),
	(2,1,1,'Commzdz\n','2018-04-20 15:37:21'),
	(3,1,1,'dezef','2018-04-20 17:18:34'),
	(7,1,1,'cdsfczec','2018-04-20 17:38:42'),
	(8,7,1,'dscsd','2018-04-21 17:31:54'),
	(9,7,2,'dscsdc','2018-04-21 18:58:51'),
	(10,7,2,'verv','2018-04-21 18:58:55'),
	(11,7,2,'jioijh bjnkknbnklojnbnklnjbnkln kln','2018-04-21 20:11:04'),
	(12,8,2,'sdcsds','2018-04-21 20:12:34'),
	(13,8,1,'ss','2018-04-21 20:13:32'),
	(14,10,1,'xqsx','2018-04-21 20:15:52'),
	(15,10,2,'qsxsx','2018-04-21 20:15:56');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `mid` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `mid` (`mid`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `musics` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;

INSERT INTO `likes` (`id`, `uid`, `mid`, `date`)
VALUES
	(8,7,2,'2018-04-21 17:38:06'),
	(10,7,1,'2018-04-21 18:58:46'),
	(11,8,1,'2018-04-21 20:14:31'),
	(12,8,2,'2018-04-21 20:14:42'),
	(13,9,2,'2018-04-21 20:15:16'),
	(14,9,1,'2018-04-21 20:15:21'),
	(15,10,1,'2018-04-21 20:15:47'),
	(16,10,2,'2018-04-21 20:16:01');

/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table musics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `musics`;

CREATE TABLE `musics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'refers to id in users table',
  `title` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `musics` WRITE;
/*!40000 ALTER TABLE `musics` DISABLE KEYS */;

INSERT INTO `musics` (`id`, `user_id`, `title`, `file`, `created_at`)
VALUES
	(1,1,'UN*DEUX - Shopping Day','musics/d0dbde0148d66ddf8ae815e014e2a668.1.mp3','2015-10-01 15:35:05'),
	(2,1,'FlicFlac - Can\'t Get Away (Bootleg)','musics/4baf839a4706fdc8caf286cd35dba410.1.mp3','2015-10-02 13:41:26');

/*!40000 ALTER TABLE `musics` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'encrypted passwords are better',
  `picture` varchar(255) DEFAULT '' COMMENT 'name of profile picture',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`, `created_at`)
VALUES
	(1,'Git','git@initiation.com','$2y$10$K3jans.CZ/CGpvJoyFWO4uhW0JeGA4C0zExk6495QbkAwId2kC3oy','view/profil_pic/e8df43b8a90546b15da8591c89711879.1.jpg','2015-10-01 13:13:46'),
	(6,'himiko','himiko','$2y$10$lRYLEhHNtxM8L82bD7PcZ.KfkGP8sBum0V3hPeePvGBgjCdEKEyN2','','2018-04-18 16:09:18'),
	(7,'Jean','jean@jean.fr','$2y$10$lpwL45Yx9HfVKE/3Pxnu4udX8bBdKsCQ.pWXgpZvMjqXsbkGCkLwS','/view/public.png','2018-04-20 14:24:48'),
	(8,'ma','ma@ma.fr','$2y$10$O78tG.DCxGCu0SyLti1dV.Sy0RZqKL4RJzniHe1l1MHkr5AzvL73G','/view/public.png','2018-04-21 20:10:44'),
	(9,'mo','mo@mo.fr','$2y$10$RGCGciusbMOoWHiuLv0QzuXcaLAFGdd1F7SML9X/P0nz1N4KP6f4m','/view/public.png','2018-04-21 20:15:06'),
	(10,'mp','mp@mp.fr','$2y$10$llMg8yUH/vCyDpFNMyIoiunQNRemHVAv9maVPj8NJw/dK9dRz/Tv.','/view/public.png','2018-04-21 20:15:34');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
