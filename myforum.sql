-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `artscomments`
--

CREATE TABLE `artscomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `artsposts`
--

CREATE TABLE `artsposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `artsreply`
--

CREATE TABLE `artsreply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `artstopic`
--

CREATE TABLE `artstopic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artstopic`
--

INSERT INTO `artstopic` (`id`, `topic_name`) VALUES
(1, 'Education'),
(2, 'Urdu'),
(3, 'English'),
(4, 'English Literature'),
(5, 'Urdu Litrature'),
(6, 'physical Education'),
(7, 'psychology'),
(8, 'Sociology'),
(9, 'Political Science'),
(10, 'E Science ');

-- --------------------------------------------------------

--
-- Table structure for table `artsupvote`
--

CREATE TABLE `artsupvote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computercomments`
--

CREATE TABLE `computercomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computercomments`
--

INSERT INTO `computercomments` (`comment_id`, `post_id`, `user_id`, `comment_content`, `date`, `time`) VALUES
(1, 31, 3, 'not sure about this language ...........but this is the one of the languages GOOGLE is using', '2019-08-12', '06:18:47'),
(2, 32, 3, 'idk', '2022-05-30', '20:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `computerposts`
--

CREATE TABLE `computerposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computerposts`
--

INSERT INTO `computerposts` (`id`, `user_id`, `topic_id`, `title`, `content`, `date`, `time`, `upvote`) VALUES
(29, 14, 15, 'What is numpy?', 'HI.....can anybody tell me what is \"numpy\" in python.....how to use it.....is it a package or anything else.....', '2019-07-14', '20:20:31', 1),
(30, 3, 1, 'Frames and iframes', 'What is the difference between frames and iframesâ€¦â€¦â€¦...which is better...â€¦â€¦â€¦â€¦...how to use both ...plzzz tell me anybody with examples...â€¦â€¦â€¦.thanks in advance', '2019-07-14', '20:24:49', 1),
(31, 9, 19, 'About GO Programming language', 'hey ............plzzz tell me what is GO programming language and how to write programs in Go.......is it procedural or oop based......................thanks', '2019-07-14', '20:30:48', 1),
(32, 3, 16, 'What are array List Class in java?', 'Hey...â€¦â€¦ Can anybody tell What are ArrayList Class. What is the difference between simple arrays and array list class?\r\nHow to use them in program...?', '2019-08-09', '14:46:57', 2),
(33, 3, 9, 'MVC', 'what is jsp design with MVC..', '2019-09-24', '19:09:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `computerreply`
--

CREATE TABLE `computerreply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computerreply`
--

INSERT INTO `computerreply` (`reply_id`, `comment_id`, `post_id`, `user_id`, `reply_content`, `date`, `time`) VALUES
(1, 2, 32, 3, 'shutup', '2022-05-30', '20:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `computertopic`
--

CREATE TABLE `computertopic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computertopic`
--

INSERT INTO `computertopic` (`id`, `topic_name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'PHP'),
(4, 'JavaScript'),
(5, '.NET'),
(6, 'Perl'),
(7, 'SQL'),
(8, 'JDBC'),
(9, 'JSP'),
(10, 'Microsoft ASP'),
(11, 'JavaBeans'),
(12, 'Ruby'),
(13, 'VB Script'),
(14, 'XML'),
(15, 'Python'),
(16, 'Java'),
(17, 'c/c++'),
(18, 'Android'),
(19, 'Go'),
(20, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `computerupvote`
--

CREATE TABLE `computerupvote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computerupvote`
--

INSERT INTO `computerupvote` (`id`, `post_id`, `user_id`, `date`, `time`) VALUES
(21, 32, 14, '2019-09-14', '15:43:48'),
(22, 31, 14, '2019-09-14', '15:44:37'),
(33, 29, 3, '2019-09-24', '19:19:07'),
(35, 32, 3, '2020-12-18', '18:37:15'),
(37, 34, 3, '2020-12-18', '18:37:33'),
(41, 33, 3, '2021-04-18', '11:35:49'),
(42, 30, 3, '2021-04-18', '11:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `generalcomments`
--

CREATE TABLE `generalcomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalposts`
--

CREATE TABLE `generalposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalreply`
--

CREATE TABLE `generalreply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `date` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generaltopic`
--

CREATE TABLE `generaltopic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generaltopic`
--

INSERT INTO `generaltopic` (`id`, `topic_name`) VALUES
(1, 'social section'),
(2, 'politics'),
(3, 'religions'),
(4, 'other related ');

-- --------------------------------------------------------

--
-- Table structure for table `generalupvote`
--

CREATE TABLE `generalupvote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `islamiccomments`
--

CREATE TABLE `islamiccomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `islamiccomments`
--

INSERT INTO `islamiccomments` (`comment_id`, `post_id`, `user_id`, `comment_content`, `date`, `time`) VALUES
(1, 1, 14, 'Around 7500 Hadiths are there in Sahih-Al -Bukharie', '2019-08-31', '10:21:25'),
(2, 2, 16, 'Allah says in this verse that come towards me 1 step i will come towards you 10 steps', '2020-03-28', '10:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `islamicposts`
--

CREATE TABLE `islamicposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `islamicposts`
--

INSERT INTO `islamicposts` (`id`, `user_id`, `topic_id`, `title`, `content`, `date`, `time`, `upvote`) VALUES
(1, 3, 3, 'total no of hadiths in sahih al bukhari ', 'Asalamu alaikum can any one tell me how many hadiths are there in Sahih AL Bukhari......', '2019-08-12', '06:14:42', 0),
(2, 3, 1, 'Elaborate the meaning of this Verse?', '\"Call upon Me, I will respond to you \".\r\nAl Quran 40:60\r\nElaborate?', '2020-03-28', '09:54:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `islamicreply`
--

CREATE TABLE `islamicreply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `islamicreply`
--

INSERT INTO `islamicreply` (`reply_id`, `comment_id`, `post_id`, `user_id`, `reply_content`, `date`, `time`) VALUES
(1, 1, 1, 3, 'thanks', '2019-08-31', '10:24:38'),
(2, 2, 2, 3, 'THANKS AROOJA ,,,,,,,,', '2021-04-18', '11:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `islamictopic`
--

CREATE TABLE `islamictopic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `islamictopic`
--

INSERT INTO `islamictopic` (`id`, `topic_name`) VALUES
(1, 'Al Quran'),
(2, 'Hadith Shareef'),
(3, 'Sahih-Al-Bukhari');

-- --------------------------------------------------------

--
-- Table structure for table `islamicupvote`
--

CREATE TABLE `islamicupvote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `islamicupvote`
--

INSERT INTO `islamicupvote` (`id`, `post_id`, `user_id`, `date`, `time`) VALUES
(1, 2, 16, '2020-03-28', '10:00:48'),
(2, 2, 3, '2020-03-28', '10:04:24'),
(3, 2, 14, '2020-08-05', '11:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profilepic` text NOT NULL,
  `backgrnd` varchar(1000) NOT NULL DEFAULT 'a.jpg',
  `caption` varchar(60) NOT NULL DEFAULT 'A picture is worth,more than thousand words.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `user_id`, `profilepic`, `backgrnd`, `caption`) VALUES
(3, 14, 'pro.jpg', '20180323_114502.jpg', 'srinagar'),
(4, 3, 'mylogo.jpg', 'wallpaper.jpg', 'Default '),
(5, 9, 'p4YBAFaxmEmAHSL_AAN-RCP4NCI47.jpg', 'a.jpg', 'A picture is worth,more than thousand words.'),
(6, 15, 'defaultFemale.png', 'a.jpg', 'A picture is worth,more than thousand words.'),
(7, 16, 'haid.png', 'Screenshot (2).png', 'Silent eyes 8'),
(8, 17, '20180421_184008.jpg', 'Screenshot_20181221-095944_IOS Launcher.jpg', 'Blurrryyyyy...................'),
(9, 18, 'defaultMale.png', 'a.jpg', 'A picture is worth,more than thousand words.');

-- --------------------------------------------------------

--
-- Table structure for table `othercomments`
--

CREATE TABLE `othercomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `othercomments`
--

INSERT INTO `othercomments` (`comment_id`, `post_id`, `user_id`, `comment_content`, `date`, `time`) VALUES
(1, 2, 3, 'i don\'t know', '2019-10-09', '19:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `otherposts`
--

CREATE TABLE `otherposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherposts`
--

INSERT INTO `otherposts` (`id`, `user_id`, `topic_id`, `title`, `content`, `date`, `time`, `upvote`) VALUES
(1, 17, 5, 'velocity', 'what is velocity?', '2019-08-06', '18:36:11', 1),
(2, 18, 4, 'bi quadratic equation', 'huia everyone ,,,,...plzzzz tell me how to solve Bi quadratic equation in mathamaticsâ€¦', '2019-10-09', '19:29:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `otherreply`
--

CREATE TABLE `otherreply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `othertopic`
--

CREATE TABLE `othertopic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `othertopic`
--

INSERT INTO `othertopic` (`id`, `topic_name`) VALUES
(1, 'English'),
(2, 'urdu'),
(3, 'Sc.Science'),
(4, 'Mathamatics'),
(5, 'Science'),
(6, 'GK'),
(7, 'Arabic(Lower Standard)'),
(8, 'Islamic Studies (lower standard)');

-- --------------------------------------------------------

--
-- Table structure for table `otherupvote`
--

CREATE TABLE `otherupvote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherupvote`
--

INSERT INTO `otherupvote` (`id`, `post_id`, `user_id`, `date`, `time`) VALUES
(3, 1, 3, '2019-09-14', '15:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `sciencecomments`
--

CREATE TABLE `sciencecomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sciencecomments`
--

INSERT INTO `sciencecomments` (`comment_id`, `post_id`, `user_id`, `comment_content`, `date`, `time`) VALUES
(1, 8, 3, 'study of animals.....', '2019-10-03', '18:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `scienceposts`
--

CREATE TABLE `scienceposts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scienceposts`
--

INSERT INTO `scienceposts` (`id`, `user_id`, `topic_id`, `title`, `content`, `date`, `time`, `upvote`) VALUES
(8, 9, 5, 'about zoology', 'what is zoology', '2019-07-10', '19:31:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sciencereply`
--

CREATE TABLE `sciencereply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sciencetopic`
--

CREATE TABLE `sciencetopic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sciencetopic`
--

INSERT INTO `sciencetopic` (`id`, `topic_name`) VALUES
(1, 'Physics'),
(2, 'Chemistry'),
(3, 'Mathematics'),
(4, 'Biology'),
(5, 'Zoology'),
(6, 'Botany'),
(7, 'Home Science Subject'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `scienceupvote`
--

CREATE TABLE `scienceupvote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scienceupvote`
--

INSERT INTO `scienceupvote` (`id`, `post_id`, `user_id`, `date`, `time`) VALUES
(7, 9, 3, '2019-09-14', '15:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `cnumber` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `field` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `cnumber`, `password`, `email`, `gender`, `field`, `date`, `time`, `login_date`, `login_time`) VALUES
(3, 'Hyder', 'Nabi', '8082549017', 'haidii22', 'hydernabi22@gmail.com', 'Male', 'Computer Science', '2019-03-15', '09:25:16', '2022-10-24', '14:55:54'),
(9, 'me', ' n me', '1234567895', 'qwertyuiop', 'hydernabi22@gmail.com', 'Female', 'Computer Science', '2019-07-04', '08:31:24', '2019-07-14', '20:26:40'),
(14, 'Yasir', 'Nazir', '7006246837', 'mnbvcxza', 'yasirNazir77@gmail.com', 'Male', 'Science', '2019-07-13', '15:57:44', '2021-03-16', '09:44:06'),
(15, 'Rozey', 'Jan', '9797002175', 'rozeyjan', 'rozey@gmail.com', 'Female', 'Islamic', '2019-07-19', '20:30:10', '2019-07-19', '20:30:10'),
(16, 'Bhat Arooja', 'Gowhar', '9796700116', 'arooja22', 'bhatArooja22@gmail.com', 'Female', '1st to 12th Standard', '2019-07-23', '10:18:16', '2020-03-28', '10:00:26'),
(17, 'Arsilan', 'Manzoor', '8494078980', 'arsilan22', 'arsi707@gmial.com', 'Male', '1st to 12th Standard', '2019-08-06', '18:35:05', '2019-08-27', '12:07:11'),
(18, 'Dar', 'Shakir', '9622601321', 'darshakir', 'darshakir851@gmail.com', 'Male', '1st to 12th Standard', '2019-10-09', '19:27:47', '2019-10-09', '19:30:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artscomments`
--
ALTER TABLE `artscomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `artsposts`
--
ALTER TABLE `artsposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artsreply`
--
ALTER TABLE `artsreply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `artstopic`
--
ALTER TABLE `artstopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artsupvote`
--
ALTER TABLE `artsupvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computercomments`
--
ALTER TABLE `computercomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `computerposts`
--
ALTER TABLE `computerposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computerreply`
--
ALTER TABLE `computerreply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `computertopic`
--
ALTER TABLE `computertopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computerupvote`
--
ALTER TABLE `computerupvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalcomments`
--
ALTER TABLE `generalcomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `generalposts`
--
ALTER TABLE `generalposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalreply`
--
ALTER TABLE `generalreply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `generaltopic`
--
ALTER TABLE `generaltopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalupvote`
--
ALTER TABLE `generalupvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `islamiccomments`
--
ALTER TABLE `islamiccomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `islamicposts`
--
ALTER TABLE `islamicposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `islamicreply`
--
ALTER TABLE `islamicreply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `islamictopic`
--
ALTER TABLE `islamictopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `islamicupvote`
--
ALTER TABLE `islamicupvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `othercomments`
--
ALTER TABLE `othercomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `otherposts`
--
ALTER TABLE `otherposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherreply`
--
ALTER TABLE `otherreply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `othertopic`
--
ALTER TABLE `othertopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherupvote`
--
ALTER TABLE `otherupvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sciencecomments`
--
ALTER TABLE `sciencecomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `scienceposts`
--
ALTER TABLE `scienceposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sciencereply`
--
ALTER TABLE `sciencereply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `sciencetopic`
--
ALTER TABLE `sciencetopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scienceupvote`
--
ALTER TABLE `scienceupvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `cnumber` (`cnumber`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `cnumber_2` (`cnumber`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artscomments`
--
ALTER TABLE `artscomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artsposts`
--
ALTER TABLE `artsposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artsreply`
--
ALTER TABLE `artsreply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artstopic`
--
ALTER TABLE `artstopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artsupvote`
--
ALTER TABLE `artsupvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `computercomments`
--
ALTER TABLE `computercomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `computerposts`
--
ALTER TABLE `computerposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `computerreply`
--
ALTER TABLE `computerreply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `computertopic`
--
ALTER TABLE `computertopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `computerupvote`
--
ALTER TABLE `computerupvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `generalcomments`
--
ALTER TABLE `generalcomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generalposts`
--
ALTER TABLE `generalposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generalreply`
--
ALTER TABLE `generalreply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generaltopic`
--
ALTER TABLE `generaltopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `generalupvote`
--
ALTER TABLE `generalupvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `islamiccomments`
--
ALTER TABLE `islamiccomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `islamicposts`
--
ALTER TABLE `islamicposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `islamicreply`
--
ALTER TABLE `islamicreply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `islamictopic`
--
ALTER TABLE `islamictopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `islamicupvote`
--
ALTER TABLE `islamicupvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `othercomments`
--
ALTER TABLE `othercomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otherposts`
--
ALTER TABLE `otherposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otherreply`
--
ALTER TABLE `otherreply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `othertopic`
--
ALTER TABLE `othertopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otherupvote`
--
ALTER TABLE `otherupvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sciencecomments`
--
ALTER TABLE `sciencecomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scienceposts`
--
ALTER TABLE `scienceposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sciencereply`
--
ALTER TABLE `sciencereply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sciencetopic`
--
ALTER TABLE `sciencetopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scienceupvote`
--
ALTER TABLE `scienceupvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
