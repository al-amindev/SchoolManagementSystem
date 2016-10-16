-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2015 at 07:35 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_organization`
--

CREATE TABLE IF NOT EXISTS `about_organization` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `about_us` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `information` varchar(1000) NOT NULL,
  `org_remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(32) NOT NULL,
  `std_id` int(32) NOT NULL,
  `sub_id` int(32) NOT NULL,
  `class_id` int(32) NOT NULL,
  `attendance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `c_name` varchar(32) NOT NULL,
  `c_active` tinyint(1) NOT NULL,
  `c_remarks` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `user_id`, `c_name`, `c_active`, `c_remarks`, `create_date`, `modify_date`) VALUES
(1, 1, 'ONE', 1, 'This is class ONE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'TWO', 1, 'This is class TWO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'THREE', 1, 'This is class THREE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'FOUR', 0, 'This is class FOUR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'FIVE', 0, 'This is class FIVE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'SIX', 1, 'This is class SIX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'SAVEN', 0, 'This is class SAVEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'EIGHT', 1, 'This is class EIGHT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'NINE', 0, 'This is class NINE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'TEN', 0, 'This is class TEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_description` varchar(390) NOT NULL,
  `event_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galleryphoto`
--

CREATE TABLE IF NOT EXISTS `galleryphoto` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `img_title` varchar(200) NOT NULL,
  `g_image_path` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleryphoto`
--

INSERT INTO `galleryphoto` (`id`, `user_id`, `img_title`, `g_image_path`) VALUES
(1, 8, 'This is the flower', 'gallery_image/IMG_20151014_105012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `result_id` mediumint(12) NOT NULL,
  `class_id` tinyint(2) NOT NULL,
  `subject_id` tinyint(2) NOT NULL,
  `reg_number` int(16) NOT NULL,
  `gpa` float NOT NULL,
  `r_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `r_remarks` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `class_id`, `subject_id`, `reg_number`, `gpa`, `r_date`, `modify_date`, `r_remarks`) VALUES
(1, 1, 0, 4, 4.5, '2015-09-02 05:19:34', NULL, ''),
(2, 1, 0, 4, 4, '2015-09-08 06:17:07', NULL, ''),
(3, 1, 1, 201501001, 97, '2015-10-27 16:35:55', NULL, 'Good, You got A+'),
(4, 1, 2, 201501001, 90, '2015-10-27 16:37:52', NULL, 'good'),
(5, 1, 3, 201501001, 88, '2015-10-27 16:38:23', NULL, 'very good'),
(6, 2, 8, 20203823, 87, '2015-12-06 22:03:14', NULL, 'Rashedul reult good'),
(7, 2, 9, 20203823, 80, '2015-12-06 22:04:25', NULL, 'Good you got A+'),
(8, 1, 3, 201501001, 34, '2015-12-29 11:48:08', NULL, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` tinyint(3) NOT NULL,
  `class_id` int(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_name` varchar(40) NOT NULL,
  `s_active` tinyint(1) NOT NULL,
  `t_assign` int(32) NOT NULL,
  `subject_image` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `s_remarks` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `class_id`, `user_id`, `s_name`, `s_active`, `t_assign`, `subject_image`, `create_date`, `modify_date`, `s_remarks`) VALUES
(1, 1, 0, 'BANGLA', 1, 5, 'img/sub_img/bangla.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bangla is our common subject'),
(2, 1, 0, 'ENGLISH', 1, 6, 'img/sub_img/english.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'English is our common subject'),
(3, 1, 0, 'MATH', 1, 7, 'img/sub_img/math.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'English is our common subject'),
(4, 9, 0, 'ACCOUNTING', 0, 5, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'The accounting subject is only BUSINESS GROUP'),
(5, 9, 0, 'Bialogy', 0, 6, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bialo0gy subject only SCIENCE GROUP'),
(6, 9, 0, 'HISTORY', 0, 7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'The history subject is only HUMANITICS GROUP'),
(7, 6, 0, 'AGRICULTURE', 1, 5, 'img/sub_img/agriculture.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'The subject face after class SIX'),
(8, 2, 0, 'Bangla', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Class two bangla'),
(9, 2, 0, 'Math', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Class two math');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(32) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `s_reg_num` int(16) NOT NULL,
  `s_roll_num` int(12) NOT NULL,
  `s_class` smallint(2) NOT NULL,
  `s_group` varchar(10) NOT NULL,
  `t_subject` varchar(40) NOT NULL,
  `t_qualification` varchar(6) NOT NULL,
  `user_gender` text NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_f_name` varchar(32) NOT NULL,
  `user_l_name` varchar(32) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_image` varchar(1000) NOT NULL,
  `user_create` date NOT NULL,
  `user_varify` tinyint(1) NOT NULL,
  `user_active` tinyint(1) NOT NULL,
  `user_modify` date NOT NULL,
  `user_about` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `s_reg_num`, `s_roll_num`, `s_class`, `s_group`, `t_subject`, `t_qualification`, `user_gender`, `user_name`, `user_f_name`, `user_l_name`, `user_email`, `user_birthday`, `user_password`, `user_image`, `user_create`, `user_varify`, `user_active`, `user_modify`, `user_about`) VALUES
(1, 'admin', 0, 0, 0, '', '', '', 'Male', 'admin', 'alamin', 'alamincse', 'admin@school.com', '2001-06-08', '123', 'user_image/IMG_20150926_161240.jpg', '2015-10-27', 0, 1, '2015-10-27', 'nothing'),
(4, 'student', 32768, 2312313, 8, '', '', '', 'Male', 'mdalamin', 'Md', 'Shohag', 'mdalamin406@gmail.com', '0000-00-00', '123', 'postimage/11822445_470940513066697_4943118323821508229_n.jpg', '2015-09-07', 1, 1, '2015-09-07', 'Now i am student of BU'),
(5, 'teacher', 0, 0, 0, '', 'Mathmetics', 'BSc', 'Male', 'abusaley', 'Abu', 'Saley', 'abusaley@gmail.com', '0000-00-00', '123', 'postimage/profile.jpg', '2015-09-08', 1, 1, '2015-09-08', 'I am Interest of Math'),
(6, 'student', 0, 4234324, 0, '', 'Graphics', 'MBA', 'Male', 'azmanmolla', 'Azman', 'Molla', 'azamn@gmail.com', '2015-03-10', '123', 'user_image/IMG_20151014_105012.jpg', '2015-10-27', 1, 1, '2015-10-27', 'I mostly like graphics, But also interest business'),
(7, 'teacher', 0, 0, 0, '', 'PHP', 'Zend C', 'Male', 'arifhossian', 'Arif', 'Hossain', 'arif@rcl.com', '0000-00-00', '123', 'postimage/DSC00653.JPG', '2015-09-08', 1, 1, '2015-09-08', 'nothing'),
(8, 'student', 201501001, 1001, 1, '', '', '', 'Male', 'aminulislam', 'Aminul', 'Islam', 'aminul@tt.com', '2012-04-15', '123', '', '2015-10-27', 1, 1, '2015-10-27', 'This is my account'),
(10, 'student', 20203823, 312414, 2, '', '', '', 'Female', 'rashedul', 'Md', 'Rashed', 'test111@gmail.com', '0000-00-00', '123', 'asset/image/user/Untitled2.jpg', '2015-12-06', 1, 1, '2015-12-06', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback_org`
--

CREATE TABLE IF NOT EXISTS `user_feedback_org` (
  `fdback_id` int(12) NOT NULL,
  `fdback_title` varchar(100) NOT NULL,
  `user_id` mediumint(23) NOT NULL,
  `fdback_details` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_feedback_org`
--

INSERT INTO `user_feedback_org` (`fdback_id`, `fdback_title`, `user_id`, `fdback_details`) VALUES
(3, 'About Our School', 4, 'The school is the ideal school, i think because here the teacher in very con-such '),
(4, 'One', 1, 'This is the class one');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_organization`
--
ALTER TABLE `about_organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `galleryphoto`
--
ALTER TABLE `galleryphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_feedback_org`
--
ALTER TABLE `user_feedback_org`
  ADD PRIMARY KEY (`fdback_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_organization`
--
ALTER TABLE `about_organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleryphoto`
--
ALTER TABLE `galleryphoto`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` mediumint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_feedback_org`
--
ALTER TABLE `user_feedback_org`
  MODIFY `fdback_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
