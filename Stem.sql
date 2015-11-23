-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for stem
DROP DATABASE IF EXISTS `stem`;
CREATE DATABASE IF NOT EXISTS `stem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stem`;


-- Dumping structure for table stem.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', '1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table stem.appointments
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_id` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL DEFAULT '0',
  `course_code` int(11) NOT NULL DEFAULT '0',
  `a_date` date NOT NULL DEFAULT '0000-00-00',
  `from_hour` int(11) NOT NULL DEFAULT '0',
  `to_hour` int(11) NOT NULL DEFAULT '0',
  `from_min` int(11) NOT NULL DEFAULT '0',
  `to_min` int(11) NOT NULL DEFAULT '0',
  `from_period` varchar(2) NOT NULL DEFAULT '0',
  `to_period` varchar(2) NOT NULL DEFAULT '0',
  `purpose` varchar(500) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT 'app_req',
  `row_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.appointments: ~0 rows (approximately)
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` (`appointment_id`, `instructor_id`, `student_id`, `course_code`, `a_date`, `from_hour`, `to_hour`, `from_min`, `to_min`, `from_period`, `to_period`, `purpose`, `status`, `row_id`) VALUES
	(27, 40, 33, 5, '2015-11-20', 10, 11, 5, 5, 'AM', 'AM', 'ef sd fdsf sdfs fsdf sdfsdf sdf sdfs fsdfsd sf sfs sdf sdf sdf sfs s sdf sfsf sfsf ', 'app_fixed', 54),
	(30, 41, 33, 4, '2015-11-21', 8, 9, 0, 0, 'AM', 'AM', 'xfs sdfsd f', 'app_req', 57),
	(31, 41, 33, 4, '2015-11-21', 9, 10, 5, 5, 'AM', 'AM', 'wksj hsldkfjsdlfkklfs djfsd', 'app_req', 58),
	(32, 40, 33, 5, '2015-11-21', 9, 10, 5, 5, 'AM', 'AM', 'dflskd slfslfd', 'app_req', 61);
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;


-- Dumping structure for table stem.complaint
DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(50) NOT NULL DEFAULT '0',
  `subject_name` varchar(50) DEFAULT NULL,
  `tutor_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `reply` varchar(50) DEFAULT NULL,
  `replied_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.complaint: ~0 rows (approximately)
/*!40000 ALTER TABLE `complaint` DISABLE KEYS */;
/*!40000 ALTER TABLE `complaint` ENABLE KEYS */;


-- Dumping structure for table stem.contact
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  KEY `contact_id` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.contact: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- Dumping structure for table stem.courses_experience
DROP TABLE IF EXISTS `courses_experience`;
CREATE TABLE IF NOT EXISTS `courses_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `expertize` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.courses_experience: ~4 rows (approximately)
/*!40000 ALTER TABLE `courses_experience` DISABLE KEYS */;
INSERT INTO `courses_experience` (`id`, `tutor_id`, `course_id`, `expertize`) VALUES
	(19, 40, 6, 'Expert'),
	(20, 40, 5, 'Expert'),
	(21, 41, 7, 'OK'),
	(22, 41, 4, 'OK');
/*!40000 ALTER TABLE `courses_experience` ENABLE KEYS */;


-- Dumping structure for table stem.course_notifications
DROP TABLE IF EXISTS `course_notifications`;
CREATE TABLE IF NOT EXISTS `course_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_type` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.course_notifications: ~2 rows (approximately)
/*!40000 ALTER TABLE `course_notifications` DISABLE KEYS */;
INSERT INTO `course_notifications` (`id`, `option_type`, `content`, `student_id`) VALUES
	(1, 'courseNotExists', ' fsdf fsdfsdf sdf sfsdf sdfsdsdf sdf sf fsf sf', 34),
	(2, 'limited', 'ksdslkd', 34);
/*!40000 ALTER TABLE `course_notifications` ENABLE KEYS */;


-- Dumping structure for table stem.departments
DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(100) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.departments: ~2 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `dept_name`, `dept_id`) VALUES
	(6, 'CSE', 'CSE'),
	(7, 'EE', 'EE'),
	(8, 'ECE', 'ECE');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;


-- Dumping structure for table stem.excel_date
DROP TABLE IF EXISTS `excel_date`;
CREATE TABLE IF NOT EXISTS `excel_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `Term` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Section` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `InstructorID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.excel_date: ~10 rows (approximately)
/*!40000 ALTER TABLE `excel_date` DISABLE KEYS */;
INSERT INTO `excel_date` (`id`, `Year`, `Term`, `Department`, `Number`, `Section`, `Name`, `InstructorID`) VALUES
	(1, 15, 'FA', 'MATH', 140, 1, 'Calculus 1', 'cedzo001'),
	(2, 15, 'FA', 'MATH', 140, 2, 'Calculus 1', 'cedzo001'),
	(3, 15, 'FA', 'MATH', 140, 4, 'Calculus 1', 'prier001'),
	(4, 15, 'FA', 'MATH', 140, 5, 'Calculus 1', 'prier001'),
	(5, 15, 'FA', 'MATH', 111, 1, 'College Algebra', 'nogaj001'),
	(6, 15, 'FA', 'MATH', 111, 2, 'College Algebra', 'nogaj001'),
	(7, 15, 'FA', 'MATH', 111, 3, 'College Algebra', 'malue001'),
	(8, 15, 'FA', 'PHYS', 105, 1, 'General Physics 1', 'conklin001'),
	(9, 15, 'FA', 'PHYS', 105, 2, 'General Physics 2', 'hilburn001'),
	(10, 15, 'FA', 'PHYS', 105, 3, 'General Physics 3', 'ferralli001');
/*!40000 ALTER TABLE `excel_date` ENABLE KEYS */;


-- Dumping structure for table stem.schedule
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_col` date NOT NULL DEFAULT '0000-00-00',
  `week_day` varchar(10) NOT NULL DEFAULT '0',
  `fhour` int(11) NOT NULL DEFAULT '0',
  `fminutes` int(11) NOT NULL DEFAULT '0',
  `fperiod` char(2) NOT NULL DEFAULT '0',
  `thour` int(11) NOT NULL DEFAULT '0',
  `tminutes` int(11) NOT NULL DEFAULT '0',
  `tperiod` char(2) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.schedule: ~2 rows (approximately)
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`id`, `date_col`, `week_day`, `fhour`, `fminutes`, `fperiod`, `thour`, `tminutes`, `tperiod`, `status`) VALUES
	(64, '2015-11-20', 'Friday', 10, 5, 'AM', 11, 5, 'AM', NULL),
	(65, '2015-11-20', 'Friday', 2, 10, 'PM', 3, 10, 'PM', NULL),
	(66, '2015-11-21', 'Saturday', 10, 5, 'AM', 11, 5, 'AM', NULL),
	(67, '2015-11-21', 'Saturday', 8, 0, 'AM', 9, 0, 'AM', NULL),
	(68, '2015-11-21', 'Saturday', 9, 5, 'AM', 10, 5, 'AM', NULL),
	(69, '2015-11-21', 'Saturday', 11, 5, 'AM', 12, 5, 'PM', NULL),
	(70, '2015-11-22', 'Sunday', 10, 5, 'AM', 11, 5, 'AM', NULL),
	(71, '2015-11-29', 'Sunday', 10, 5, 'AM', 11, 5, 'AM', NULL);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;


-- Dumping structure for table stem.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Accept',
  `major` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `emailid` (`emailid`),
  UNIQUE KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.student: ~1 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`student_id`, `student_name`, `emailid`, `password`, `status`, `major`, `year`, `term`, `stu_id`) VALUES
	(33, 'chanti ', 'chantigadu502@gmail.com', '123', 'Accept', 'CSE', 2013, 'FA', '502'),
	(34, 'chanti gadu', 'shanthiswaroop572@gmail.com', '123', 'Accept', 'CSE', 2013, 'FA', '503');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


-- Dumping structure for table stem.student_to_tutor
DROP TABLE IF EXISTS `student_to_tutor`;
CREATE TABLE IF NOT EXISTS `student_to_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `courses_list` varchar(100) DEFAULT NULL,
  `phone_number` bigint(20) NOT NULL DEFAULT '0',
  `desp` varchar(1000) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.student_to_tutor: ~1 rows (approximately)
/*!40000 ALTER TABLE `student_to_tutor` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_to_tutor` ENABLE KEYS */;


-- Dumping structure for table stem.stu_req_inconvenient_time
DROP TABLE IF EXISTS `stu_req_inconvenient_time`;
CREATE TABLE IF NOT EXISTS `stu_req_inconvenient_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date_selected` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.stu_req_inconvenient_time: ~4 rows (approximately)
/*!40000 ALTER TABLE `stu_req_inconvenient_time` DISABLE KEYS */;
INSERT INTO `stu_req_inconvenient_time` (`id`, `student_id`, `subject_id`, `date_selected`, `time`, `status`, `description`) VALUES
	(1, 34, 4, '2015-11-21', '12:10', 'Request Sends to Tutor', 'pending'),
	(2, 34, 5, '2015-11-28', 'PM:30', 'pending', ''),
	(4, 34, 5, '2015-11-21', 'AM:30', 'pending', ''),
	(5, 34, 5, '2015-11-21', 'AM:30 ', 'pending', '                   sssssssssss'),
	(6, 34, 5, '2015-11-25', '10:30 AM', 'pending', '                   aaaaaaaaa');
/*!40000 ALTER TABLE `stu_req_inconvenient_time` ENABLE KEYS */;


-- Dumping structure for table stem.subject
DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) DEFAULT NULL,
  `course_id` varchar(50) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.subject: ~4 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`subject_id`, `subject_name`, `course_id`, `dept_id`) VALUES
	(4, 'java', '100', 'CSE'),
	(5, 'C++', '101', 'CSE'),
	(6, 'C', '102', 'CSE'),
	(7, 'DBMS', '103', 'CSE');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;


-- Dumping structure for table stem.tutor
DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_name` varchar(50) DEFAULT NULL,
  `instructor_id` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `working_days` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `schedule_status` varchar(50) DEFAULT 'unschedule',
  PRIMARY KEY (`tutor_id`),
  UNIQUE KEY `emailid` (`emailid`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.tutor: ~1 rows (approximately)
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
INSERT INTO `tutor` (`tutor_id`, `tutor_name`, `instructor_id`, `emailid`, `password`, `phone_number`, `address`, `subject`, `working_hours`, `working_days`, `status`, `schedule_status`) VALUES
	(40, 'nukesh', 'nuk1122', 'nukesh.poodi@gmail.com', '123', 8686148163, NULL, '6,5', 4, 'Monday,Tuesday,Wednesday,Thursday,Friday', 'Accept', 'unschedule'),
	(41, 'nukesh1', 'nuk1123', 'nukesh.smts@gmail.com', '123', 9876543210, NULL, '7,4', 4, 'Monday,Tuesday,Wednesday,Thursday', 'Accept', 'unschedule');
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;


-- Dumping structure for table stem.tutor_request
DROP TABLE IF EXISTS `tutor_request`;
CREATE TABLE IF NOT EXISTS `tutor_request` (
  `tutor_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutorid` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_time` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  PRIMARY KEY (`tutor_req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.tutor_request: ~0 rows (approximately)
/*!40000 ALTER TABLE `tutor_request` DISABLE KEYS */;
INSERT INTO `tutor_request` (`tutor_req_id`, `tutorid`, `data`, `from_time`, `to_time`, `reason`, `description`, `status`) VALUES
	(1, 41, '2015-11-21', '10:05 AM', '11:05 AM', 'class cancellation', 'asddsads', 'accept');
/*!40000 ALTER TABLE `tutor_request` ENABLE KEYS */;


-- Dumping structure for table stem.tutor_schedule2
DROP TABLE IF EXISTS `tutor_schedule2`;
CREATE TABLE IF NOT EXISTS `tutor_schedule2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_day` date NOT NULL DEFAULT '0000-00-00',
  `week_day` varchar(50) DEFAULT NULL,
  `fhours` int(11) NOT NULL DEFAULT '0',
  `fminutes` int(11) NOT NULL DEFAULT '0',
  `fperiod` varchar(50) NOT NULL DEFAULT '0',
  `thours` int(11) DEFAULT '0',
  `tminutes` int(11) DEFAULT '0',
  `tperiod` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT 'Preferred',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.tutor_schedule2: ~2 rows (approximately)
/*!40000 ALTER TABLE `tutor_schedule2` DISABLE KEYS */;
INSERT INTO `tutor_schedule2` (`id`, `tutor_id`, `student_id`, `date_day`, `week_day`, `fhours`, `fminutes`, `fperiod`, `thours`, `tminutes`, `tperiod`, `status`) VALUES
	(54, 40, NULL, '2015-11-20', 'Friday', 10, 5, 'AM', 11, 5, 'AM', 'class'),
	(55, 40, NULL, '2015-11-20', 'Friday', 2, 10, 'PM', 3, 10, 'PM', 'Preferred'),
	(56, 41, NULL, '2015-11-21', 'Saturday', 10, 5, 'AM', 11, 5, 'AM', 'Preferred'),
	(57, 41, NULL, '2015-11-21', 'Saturday', 8, 0, 'AM', 9, 0, 'AM', 'Preferred'),
	(58, 41, NULL, '2015-11-21', 'Saturday', 9, 5, 'AM', 10, 5, 'AM', 'Preferred'),
	(59, 41, NULL, '2015-11-21', 'Saturday', 11, 5, 'AM', 12, 5, 'PM', 'Preferred'),
	(60, 40, NULL, '2015-11-21', 'Saturday', 8, 0, 'AM', 9, 0, 'AM', 'Preferred'),
	(61, 40, NULL, '2015-11-21', 'Saturday', 9, 5, 'AM', 10, 5, 'AM', 'Preferred'),
	(62, 40, NULL, '2015-11-21', 'Saturday', 10, 5, 'AM', 11, 5, 'AM', 'Preferred'),
	(63, 40, NULL, '2015-11-21', 'Saturday', 11, 5, 'AM', 12, 5, 'PM', 'Preferred'),
	(64, 41, NULL, '2015-11-22', 'Sunday', 10, 5, 'AM', 11, 5, 'AM', 'Preferred'),
	(65, 41, NULL, '2015-11-29', 'Sunday', 10, 5, 'AM', 11, 5, 'AM', 'Preferred');
/*!40000 ALTER TABLE `tutor_schedule2` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
