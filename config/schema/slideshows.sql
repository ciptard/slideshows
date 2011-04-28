#slideshows sql generated on: 2011-04-25 20:38:05 : 1303778285

DROP TABLE IF EXISTS `slideshow_slides`;
DROP TABLE IF EXISTS `slideshows`;


CREATE TABLE `slideshow_slides` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`slideshow_id` int(11) NOT NULL,
	`file` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`link` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
	`active` tinyint(1) NOT NULL,
	`start` date DEFAULT NULL,
	`end` date DEFAULT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `slideshows` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`active` tinyint(1) NOT NULL,
	`start` date DEFAULT NULL,
	`end` date DEFAULT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,
	`slideshow_slide_count` int(3) DEFAULT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

