# Dump of table blog_cats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_cats`;

CREATE TABLE `blog_cats` (
  `catID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catTitle` varchar(255) DEFAULT NULL,
  `catSlug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `blog_cats` WRITE;
/*!40000 ALTER TABLE `blog_cats` DISABLE KEYS */;

INSERT INTO `blog_cats` (`catID`, `catTitle`, `catSlug`)
VALUES
	(1,'General','general'),
	(2,'Development','development'),
	(5,'Misc','misc'),
	(4,'Testing','testing');

/*!40000 ALTER TABLE `blog_cats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blog_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_members`;

CREATE TABLE `blog_members` (
  `memberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `blog_members` WRITE;
/*!40000 ALTER TABLE `blog_members` DISABLE KEYS */;

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`)
VALUES
	(1,'Demo','$2a$12$TF8u1maUr5kADc42g1FB0ONJDEtt24ue.UTIuP13gij5AHsg5f5s2','demo@demo.com');

/*!40000 ALTER TABLE `blog_members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blog_post_cats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_post_cats`;

CREATE TABLE `blog_post_cats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `blog_post_cats` WRITE;
/*!40000 ALTER TABLE `blog_post_cats` DISABLE KEYS */;

INSERT INTO `blog_post_cats` (`id`, `postID`, `catID`)
VALUES
	(25,2,5),
	(21,6,4),
	(24,2,1),
	(4,3,2),
	(20,6,1),
	(16,1,2);

/*!40000 ALTER TABLE `blog_post_cats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blog_posts_seo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_posts_seo`;

CREATE TABLE `blog_posts_seo` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) DEFAULT NULL,
  `postSlug` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  `postimg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `blog_posts_seo` WRITE;
/*!40000 ALTER TABLE `blog_posts_seo` DISABLE KEYS */;

