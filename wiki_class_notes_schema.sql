# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: db.cs.dal.ca (MySQL 5.0.95)
# Database: sdugas
# Generation Time: 2013-02-12 23:29:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table courses
# ------------------------------------------------------------

CREATE TABLE `courses` (
  `id` int(11) NOT NULL auto_increment,
  `department_id` int(11) default NULL,
  `name` varchar(45) default NULL,
  `number` int(5) default NULL,
  `created_on` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created_by` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table departments
# ------------------------------------------------------------

CREATE TABLE `departments` (
  `id` int(11) NOT NULL auto_increment,
  `institution_id` int(11) default NULL,
  `name` varchar(40) default NULL,
  `shortname` varchar(7) default NULL,
  `created_on` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created_by` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table institutions
# ------------------------------------------------------------

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  `created_on` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created_by` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table notes
# ------------------------------------------------------------

CREATE TABLE `notes` (
  `id` int(32) unsigned NOT NULL auto_increment,
  `title` varchar(90) default NULL,
  `summary` text,
  `content` text NOT NULL,
  `created_on` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created_by` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table section_schedules
# ------------------------------------------------------------

CREATE TABLE `section_schedules` (
  `id` int(11) NOT NULL auto_increment,
  `monday` tinyint(1) default '0',
  `tuesday` tinyint(1) default '0',
  `wednesday` tinyint(1) default '0',
  `thursday` tinyint(1) default '0',
  `friday` tinyint(1) default '0',
  `saturday` tinyint(1) default '0',
  `sunday` tinyint(1) default '0',
  `start_time` time default NULL,
  `end_time` time default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created_by` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table sections
# ------------------------------------------------------------

CREATE TABLE `sections` (
  `id` int(11) NOT NULL auto_increment,
  `section_number` int(3) NOT NULL,
  `section_schedule_id` int(11) NOT NULL,
  `text_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table textbooks
# ------------------------------------------------------------

CREATE TABLE `textbooks` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(90) default NULL,
  `author` varchar(90) default NULL,
  `created_on` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `created_by` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
