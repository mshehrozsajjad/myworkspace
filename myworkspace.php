
<?php include 'components/login-check.php' ;
        
        
		
		
$query= 	'	
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myworkspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `iddepartment` mediumint(9) NOT NULL,
  `departmentname` varchar(100) NOT NULL,
  `departmentdescription` text NOT NULL,
  `user-name` varchar(100) NOT NULL,
  `project_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`iddepartment`, `departmentname`, `departmentdescription`, `user-name`, `project_id`) VALUES
(7, \'Backend\', \'Hussain Farooq karega!\', \'Shery97\', 6),
(3, \'Graphics\', \'asada\', \'admin\', 4),
(4, \'Media\', \'All about media LOL!\', \'admin\', 4),
(5, \'Registrations\', \'All about registration peeps!\', \'admin\', 4),
(6, \'Web Developement\', \'To create a shitty website.\', \'Shery97\', 5);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `idprojects` mediumint(9) NOT NULL,
  `projectname` varchar(100) NOT NULL,
  `projectdescription` text NOT NULL,
  `projectpicture` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`idprojects`, `projectname`, `projectdescription`, `projectpicture`, `username`) VALUES
(5, \'Beijing Forum\', \'International Conference to Handle Chinese.\', NULL, \'Shery97\'),
(4, \'NIMUN\', \'NIMUN ’16 is all about taking the Model UN experience to new heights of excellence. Delegates from across the board are given the opportunity to have a hand in rigorous debating sessions regarding the brewing socio-political issues. This year, NIMUN has committed itself to lay out a platform which facilitates a battle of wits in diplomatic matters amongst a diverse group of delegates. We aim to equip today’s youth with skills that are called for the leaders of tomorrow.\', NULL, \'admin\'),
(6, \'Quibble\', \'A Shit Game\', NULL, \'Shery97\');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `idtasks` mediumint(9) NOT NULL,
  `taskname` varchar(100) NOT NULL,
  `taskdescription` text NOT NULL,
  `dept_id` mediumint(9) NOT NULL,
  `project_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_dept`
--

CREATE TABLE `user_dept` (
  `dept_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user-name` varchar(100) NOT NULL,
  `dept_id` mediumint(9) NOT NULL,
  `can_edit` enum(\'0\',\'1\') NOT NULL DEFAULT \'0\',
  `project_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_dept`
--

INSERT INTO `user_dept` (`dept_name`, `user_name`, `user-name`, `dept_id`, `can_edit`, `project_id`) VALUES
(\'Graphics\', \'admin\', \'admin\', 3, \'1\', 4),
(\'Media\', \'admin\', \'admin\', 4, \'1\', 4),
(\'Graphics\', \'admin\', \'Shery97\', 3, \'0\', 4),
(\'Registrations\', \'admin\', \'admin\', 5, \'1\', 4),
(\'Media\', \'admin\', \'Shery97\', 4, \'1\', 4),
(\'Web Developement\', \'Shery97\', \'Shery97\', 6, \'1\', 5),
(\'Backend\', \'Shery97\', \'Shery97\', 7, \'1\', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `projectname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user-name` varchar(100) NOT NULL,
  `project_id` mediumint(9) NOT NULL,
  `can_edit` enum(\'1\',\'0\') NOT NULL DEFAULT \'0\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`projectname`, `username`, `user-name`, `project_id`, `can_edit`) VALUES
(\'NIMUN\', \'admin\', \'admin\', 4, \'1\'),
(\'NIMUN\', \'admin\', \'Shery97\', 4, \'0\'),
(\'Beijing Forum\', \'Shery97\', \'Shery97\', 5, \'1\'),
(\'Quibble\', \'Shery97\', \'Shery97\', 6, \'1\');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `taskid` mediumint(9) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `websiteusers`
--

CREATE TABLE `websiteusers` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `profession` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `shortbio` text,
  `experience` text,
  `picture` varchar(100) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `activeStatus` enum(\'1\',\'0\') NOT NULL,
  `ProfileComplete` enum(\'1\',\'0\') DEFAULT \'0\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `websiteusers`
--

INSERT INTO `websiteusers` (`username`, `email`, `pass`, `firstname`, `middlename`, `lastname`, `dob`, `gender`, `profession`, `country`, `shortbio`, `experience`, `picture`, `mobile`, `activeStatus`, `ProfileComplete`) VALUES
(\'admin\', \'14bscsmsajjad@seecs.edu.pk\', \'e2bd0Ty0G0k2c\', \'Admin\', \'\', \'Khan\', \'25-03-1997\', \'Male\', \'Web Developer\', \'Pakistan\', \'I am rockstar.\', \'\', NULL, \'03356978866\', \'0\', \'1\'),
(\'saady\', \'saad\', \'sada\', \'saad\', NULL, \'arshad\', NULL, \'Female\', \'Dancer\', \'Kenya\', NULL, NULL, NULL, \'090078601\', \'0\', \'0\'),
(\'Shery97\', \'bounty-hunter97@live.com\', \'e2bd0Ty0G0k2c\', \'Muhammad Shehroz\', \'\', \'Sajjad\', \'25-03-1997\', \'Male\', \'Web Developer\', \'Pakistan\', \'I am rockstar.\', \'\', NULL, \'03356978866\', \'1\', \'1\'),
(\'tayyab\', \'syedtayyab@gmail.com\', \'e2URlooFo0iNk\', \'Syed Muhammad\', \'\', \'Tayyab\', \'30-06-1996\', \'Male\', \'Works At Student\', \'Pakistan\', \'A shit person.\', \'\', NULL, \'090078601\', \'0\', \'1\');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentname`,`user-name`,`iddepartment`,`project_id`),
  ADD UNIQUE KEY `iddepartment_UNIQUE` (`iddepartment`),
  ADD KEY `username2_idx` (`user-name`),
  ADD KEY `project-id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectname`,`username`,`idprojects`),
  ADD UNIQUE KEY `idprojects_UNIQUE` (`idprojects`),
  ADD KEY `username1_idx` (`username`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`idtasks`),
  ADD KEY `deptid1_idx` (`dept_id`),
  ADD KEY `projid_idx` (`project_id`);

--
-- Indexes for table `user_dept`
--
ALTER TABLE `user_dept`
  ADD KEY `dept_name3_idx` (`dept_name`),
  ADD KEY `usename6_idx` (`user_name`),
  ADD KEY `username7_idx` (`user-name`),
  ADD KEY `deptid` (`dept_id`),
  ADD KEY `projectid2_idx` (`project_id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD KEY `projectname2_idx` (`projectname`),
  ADD KEY `username5_idx` (`username`),
  ADD KEY `username6_idx` (`user-name`),
  ADD KEY `projectid` (`project_id`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
  ADD KEY `taskid_idx` (`taskid`),
  ADD KEY `username8_idx` (`username`);

--
-- Indexes for table `websiteusers`
--
ALTER TABLE `websiteusers`
  ADD PRIMARY KEY (`username`,`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `iddepartment` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `idprojects` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `idtasks` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `project-id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`idprojects`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username2` FOREIGN KEY (`user-name`) REFERENCES `websiteusers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `username1` FOREIGN KEY (`username`) REFERENCES `websiteusers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `deptid1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`iddepartment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projid` FOREIGN KEY (`project_id`) REFERENCES `projects` (`idprojects`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_dept`
--
ALTER TABLE `user_dept`
  ADD CONSTRAINT `dept_name3` FOREIGN KEY (`dept_name`) REFERENCES `department` (`departmentname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deptid` FOREIGN KEY (`dept_id`) REFERENCES `department` (`iddepartment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectid2` FOREIGN KEY (`project_id`) REFERENCES `department` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usename6` FOREIGN KEY (`user_name`) REFERENCES `department` (`user-name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username7` FOREIGN KEY (`user-name`) REFERENCES `websiteusers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_project`
--
ALTER TABLE `user_project`
  ADD CONSTRAINT `projectid` FOREIGN KEY (`project_id`) REFERENCES `projects` (`idprojects`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectname2` FOREIGN KEY (`projectname`) REFERENCES `projects` (`projectname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username5` FOREIGN KEY (`username`) REFERENCES `projects` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username6` FOREIGN KEY (`user-name`) REFERENCES `websiteusers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `taskid` FOREIGN KEY (`taskid`) REFERENCES `tasks` (`idtasks`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username8` FOREIGN KEY (`username`) REFERENCES `websiteusers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; ';
$data = mysql_query ($query)or die(mysql_error());
if($data)
	{
       
		echo "Success";
	}
?>