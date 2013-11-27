-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2013 at 11:44 AM
-- Server version: 5.5.34-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socmgmto`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `batch` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `desc` varchar(2000) NOT NULL,
  `society` varchar(50) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`index`, `name`, `batch`, `photo`, `desc`, `society`) VALUES
(1, 'Shivam Singh', '2009-13', './alumni/shivam.jpg', 'heiuwhcweclqwmclwq', 'konnexions'),
(3, 'Mohit Dayal', '2009-13', './alumni/mohit.jpg', 'XLRI', 'konnexions'),
(4, 'aas', '', '', '', 'Konnexions'),
(5, '', '', '', '', 'Konnexions'),
(6, '', 'afdg', '', '', 'Konnexions'),
(7, 'ayush', '2010', 'DSC_0553.JPG', 'sdfsdahaojd', 'Konnexions');

-- --------------------------------------------------------

--
-- Table structure for table `code_ques`
--

CREATE TABLE IF NOT EXISTS `code_ques` (
  `cid` int(11) NOT NULL,
  `ques_id` varchar(11) NOT NULL,
  `ques_url` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`cid`,`ques_id`),
  KEY `ques_id` (`ques_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_ques`
--

INSERT INTO `code_ques` (`cid`, `ques_id`, `ques_url`, `marks`) VALUES
(1, 'LIFE', './problem/life.txt', 1),
(1, 'SCANPRINT', './problem/scan.txt', 1),
(3, 'pj', './problem/pj.txt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `code_user`
--

CREATE TABLE IF NOT EXISTS `code_user` (
  `cid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `questid` varchar(11) NOT NULL,
  PRIMARY KEY (`cid`,`userid`,`questid`),
  KEY `code_user_ibfk_2` (`userid`),
  KEY `code_user_ibfk_3` (`questid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_user`
--

INSERT INTO `code_user` (`cid`, `userid`, `questid`) VALUES
(1, 1005036, 'LIFE'),
(1, 1005036, 'SCANPRINT');

-- --------------------------------------------------------

--
-- Table structure for table `Coding`
--

CREATE TABLE IF NOT EXISTS `Coding` (
  `Cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(40) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`Cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Coding`
--

INSERT INTO `Coding` (`Cid`, `cname`, `start`, `end`) VALUES
(1, 'Marathon', '2013-10-01 07:25:12', '2013-11-20 07:32:17'),
(3, 'marathon2', '2013-11-16 02:02:02', '2013-11-17 04:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `commentdesc` varchar(100) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentid`),
  KEY `postid` (`postid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `commentdesc`, `postid`, `userid`, `timestamp`) VALUES
(1, 'ayush is my name', 1, 1005036, '2013-11-08 07:37:52'),
(2, 'ayush is my second name', 2, 1005036, '2013-11-08 07:37:52'),
(3, 'ayush is not my name', 2, 1005036, '2013-11-08 07:38:12'),
(4, 'qazxswedcvfrtgbnnhyujm,kiol', 21, 1005036, '2013-11-11 17:36:04'),
(5, 'qazxswedcvfrtgbnnhyujm,kiol', 21, 1005036, '2013-11-11 17:36:53'),
(6, 'qazxswedcvfrtgbnnhyujm,kiol', 21, 1005036, '2013-11-11 17:39:59'),
(7, 'asdfg', 23, 1005036, '2013-11-11 20:17:04'),
(8, 'erwqw', 25, 1005036, '2013-11-11 20:18:43'),
(9, 'erwdwdd', 26, 1005036, '2013-11-11 20:19:27'),
(10, 'refwew', 2, 1005036, '2013-11-11 20:30:31'),
(11, 'refwew', 2, 1005036, '2013-11-11 20:30:50'),
(12, 'ertufg', 24, 1005036, '2013-11-11 20:34:26'),
(13, 'ertufg', 24, 1005036, '2013-11-11 20:34:51'),
(14, 'ertufg', 24, 1005036, '2013-11-11 20:35:09'),
(15, 'abcdefghijkl', 29, 1005036, '2013-11-11 20:49:02'),
(16, 'fuyf', 29, 1005036, '2013-11-12 06:17:14'),
(17, 'vhjv', 29, 1005036, '2013-11-12 06:17:22'),
(18, 'qwerty', 29, 1005082, '2013-11-17 06:55:58'),
(19, 'wedw', 34, 1005036, '2013-11-17 08:45:07'),
(30, 'this is a sample comment', 37, 1005082, '2013-11-18 04:31:55'),
(31, 'ugseirwu', 38, 1005036, '2013-11-18 08:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `society` varchar(20) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`index`, `name`, `desc`, `society`) VALUES
(1, 'IMAG0133.jpg', 'hlehflw', 'konnexions'),
(2, './files/Grade Sheet.pdf', 'my gradesheet', 'Konnexions'),
(3, './files/', '', 'Qutopia'),
(4, './files/ericsson report.pdf', 'Rs Agrawal', 'Qutopia'),
(5, './files/Gsoc plan.pdf', 'Gsoc certi', 'Qutopia'),
(6, './files/Screenshot from 2013-04-17 19:21:58.png', 'phpmyAdmin Error', 'Konnexions');

-- --------------------------------------------------------

--
-- Table structure for table `Forum`
--

CREATE TABLE IF NOT EXISTS `Forum` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `postdesc` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `society` varchar(30) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `Forum`
--

INSERT INTO `Forum` (`postid`, `postdesc`, `userid`, `timestamp`, `society`) VALUES
(1, 'gwedjhisad', 1005036, '2013-11-08 11:03:13', 'konnexions'),
(2, 'qwertyu', 1005036, '2013-11-08 11:03:19', 'konnexions'),
(3, 'qwertyuioopasdfghjklzxcvbnmmdguwef', 1005036, '2013-11-09 07:20:41', 'konnexions'),
(20, 'main hun ghatotkach...main dunia main sabse nirala...', 1005036, '2013-11-09 10:59:08', 'Konnexions'),
(21, 'main hun ghatotkach...main dunia main sabse nirala...', 1005036, '2013-11-09 11:00:18', 'Konnexions'),
(22, 'main hun ghatotkach...main dunia main sabse nirala...', 1005036, '2013-11-09 11:00:50', 'Konnexions'),
(23, 'main hun ghatotkach...main dunia main sabse nirala...', 1005036, '2013-11-09 11:02:09', 'Konnexions'),
(24, 'main hun ghatotkach...main dunia main sabse nirala...', 1005036, '2013-11-09 11:05:48', 'Konnexions'),
(25, 'it starts with one thing i dont know why....doesnt even matter how hard i try, keep that in mind i d', 1005036, '2013-11-11 20:01:03', 'Konnexions'),
(26, 'r3fedw3f3f', 1005036, '2013-11-11 20:19:19', 'Konnexions'),
(27, 'bhfkg', 1005036, '2013-11-11 20:41:00', 'konnexionse'),
(28, 'abcdefghijklmn', 1005036, '2013-11-11 20:45:25', 'Konnexions'),
(29, 'opqrstuvwxyz', 1005036, '2013-11-11 20:48:51', 'Konnexions'),
(34, 'qwerty', 1005036, '2013-11-17 08:44:50', 'Konnexions'),
(36, 'qwerty', 1005008, '2013-11-17 08:51:24', 'Qutopia'),
(37, 'This is a sample post', 1005082, '2013-11-18 04:31:40', 'Konnexions'),
(38, 'ewtgfsifidsufh', 1005036, '2013-11-18 08:11:07', 'Konnexions');

-- --------------------------------------------------------

--
-- Table structure for table `Quiz`
--

CREATE TABLE IF NOT EXISTS `Quiz` (
  `quizid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society` varchar(40) NOT NULL,
  PRIMARY KEY (`quizid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Quiz`
--

INSERT INTO `Quiz` (`quizid`, `Name`, `startdate`, `enddate`, `society`) VALUES
(1, 'Marathon', '2013-11-17 18:46:04', '2013-11-12 02:52:22', 'konnexions'),
(8, 'marathon', '2013-11-17 06:30:00', '2013-11-19 06:30:00', 'Konnexions');

-- --------------------------------------------------------

--
-- Table structure for table `Quiz_question`
--

CREATE TABLE IF NOT EXISTS `Quiz_question` (
  `qnid` int(11) NOT NULL AUTO_INCREMENT,
  `quizid` int(11) NOT NULL,
  `questionText` varchar(200) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'subjective/mcq',
  `correctans` varchar(40) NOT NULL,
  PRIMARY KEY (`qnid`),
  KEY `quizid` (`quizid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Quiz_question`
--

INSERT INTO `Quiz_question` (`qnid`, `quizid`, `questionText`, `type`, `correctans`) VALUES
(1, 1, 'who was the first prime minister of India', 0, 'a'),
(2, 1, 'what is your name', 1, 'ayush');

-- --------------------------------------------------------

--
-- Table structure for table `Quiz_question_option`
--

CREATE TABLE IF NOT EXISTS `Quiz_question_option` (
  `qnid` int(11) NOT NULL,
  `options` varchar(40) NOT NULL,
  PRIMARY KEY (`qnid`,`options`),
  KEY `qnid` (`qnid`),
  KEY `options` (`options`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Quiz_question_option`
--

INSERT INTO `Quiz_question_option` (`qnid`, `options`) VALUES
(1, 'jawahar lal nehru'),
(1, 'rajendra prasad');

-- --------------------------------------------------------

--
-- Table structure for table `Quiz_user`
--

CREATE TABLE IF NOT EXISTS `Quiz_user` (
  `quizid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`quizid`,`userid`),
  KEY `quizid` (`quizid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Quiz_user`
--

INSERT INTO `Quiz_user` (`quizid`, `userid`, `score`) VALUES
(1, 1005036, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `name` varchar(30) NOT NULL,
  `batch` int(11) NOT NULL,
  `phoneno` bigint(13) NOT NULL,
  `mailid` varchar(50) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `rollno` int(11) NOT NULL,
  `society` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`rollno`,`society`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`name`, `batch`, `phoneno`, `mailid`, `branch`, `photo`, `rollno`, `society`, `password`, `role`) VALUES
('Aditi', 2010, 99999999, 'aditi@gmail.com', 'cse', 'qwerty.jpg', 1005008, 'qutopia', '436242e0c0af36e461a395c937165372864a99f9', ''),
('Arya', 2010, 9999999999, 'arya@gmail.com', 'cse', 'arya.jpg', 1005033, 'qutopia', '2ad6f04015710f5c25c8c20e2d6c597eb13f3989', 'admin'),
('ayush', 2010, 9938124033, 'ayush.choubey@gmail.com', 'cse', './slideshow/6.jpg', 1005036, 'konnexions', '2147aa348383f7cc243fbb58bd89ebe161e80d69', ''),
('admin_k', 2010, 7205871385, 'mayankbajaj123@gmail.com', 'CSE', './slideshow/6.jpg', 1005082, 'konnexions', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `code_ques`
--
ALTER TABLE `code_ques`
  ADD CONSTRAINT `code_ques_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `Coding` (`Cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `code_user`
--
ALTER TABLE `code_user`
  ADD CONSTRAINT `code_user_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `Coding` (`Cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `code_user_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `Student` (`rollno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `code_user_ibfk_3` FOREIGN KEY (`questid`) REFERENCES `code_ques` (`ques_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `Forum` (`postid`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `Student` (`rollno`);

--
-- Constraints for table `Quiz_question`
--
ALTER TABLE `Quiz_question`
  ADD CONSTRAINT `Quiz_question_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `Quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Quiz_question_option`
--
ALTER TABLE `Quiz_question_option`
  ADD CONSTRAINT `Quiz_question_option_ibfk_1` FOREIGN KEY (`qnid`) REFERENCES `Quiz_question` (`qnid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Quiz_user`
--
ALTER TABLE `Quiz_user`
  ADD CONSTRAINT `Quiz_user_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `Quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Quiz_user_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `Student` (`rollno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
