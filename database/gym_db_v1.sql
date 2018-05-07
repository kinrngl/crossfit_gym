-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 04:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fname` varchar(24) NOT NULL,
  `lname` varchar(24) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_num` varchar(16) NOT NULL,
  `email` varchar(24) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('active','blocked','deleted') NOT NULL,
  `type` enum('regular','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fname`, `lname`, `birthdate`, `contact_num`, `email`, `gender`, `username`, `password`, `status`, `type`) VALUES
(4, 'Kean', 'Aton', '1997-10-04', '123-4567', 'kean@email.com', 'female', 'keanaton', 'pass1234', 'active', 'regular'),
(5, 'John', 'Doe', '1997-10-24', '123-1223', 'johndoe@gmail.com', 'male', 'johndoe', 'pass1234', 'active', 'regular'),
(6, 'Jane', 'Doe', '1998-10-10', '123-1232', 'janedoe@gmail.com', 'male', 'jandoe@gmail.com', 'pass1234', 'active', 'regular'),
(7, 'user', 'user', '2000-01-01', '123-1223', 'user@gmail.com', 'female', 'user', 'user', 'active', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `fname` varchar(24) NOT NULL,
  `lname` varchar(24) NOT NULL,
  `trainer_type` enum('musImp','cardio','yoga','all') NOT NULL,
  `contact_num` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `emp_start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workout_package`
--

CREATE TABLE `workout_package` (
  `id` int(11) NOT NULL,
  `workpac_name` varchar(24) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `duration_type` enum('day','week','month','year') NOT NULL,
  `duration_num` int(11) NOT NULL,
  `workout_type` enum('musImp','cardio','yoga','all') DEFAULT NULL,
  `description` text NOT NULL,
  `avail_num` int(11) NOT NULL,
  `sched_in` time NOT NULL,
  `sched_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workout_plan`
--

CREATE TABLE `workout_plan` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `isPaid` enum('paid','not') NOT NULL,
  `date_ordered` date NOT NULL,
  `date_paid` date DEFAULT NULL,
  `isFinished` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout_package`
--
ALTER TABLE `workout_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trainer_id` (`trainer_id`);

--
-- Indexes for table `workout_plan`
--
ALTER TABLE `workout_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mem_id_plan` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workout_package`
--
ALTER TABLE `workout_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workout_plan`
--
ALTER TABLE `workout_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `workout_package`
--
ALTER TABLE `workout_package`
  ADD CONSTRAINT `fk_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`id`);

--
-- Constraints for table `workout_plan`
--
ALTER TABLE `workout_plan`
  ADD CONSTRAINT `fk_mem_id_plan` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
