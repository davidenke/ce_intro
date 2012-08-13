-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `intro` char(1) NOT NULL default '',
  `addM4v` char(1) NOT NULL default '',
  `addWebm` char(1) NOT NULL default '',
  `addOgv` char(1) NOT NULL default '',
  `imageSRC` varchar(255) NOT NULL default '',
  `videoSRCm4v` varchar(255) NOT NULL default '',
  `videoSRCwebm` varchar(255) NOT NULL default '',
  `videoSRCogv` varchar(255) NOT NULL default '',
  `fullsizeSRC` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
