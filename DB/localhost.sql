-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2019 at 12:42 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10946841_hcpms`
--
CREATE DATABASE IF NOT EXISTS `id10946841_hcpms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id10946841_hcpms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(2, 'admin', 'admin', 'Admin', 'M', 'Nistrator'),
(3, 'admin2', 'admin2', 'admin2', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `itr_no` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `servtype` varchar(50) NOT NULL,
  `tdate` date NOT NULL,
  `dtime` varchar(40) NOT NULL,
  `status` enum('pending','accept') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `itr_no`, `firstname`, `lastname`, `contact`, `servtype`, `tdate`, `dtime`, `status`) VALUES
(1, 1, 'Hermida', 'satiada', '09462886584', 'Fecalysis - Regular: Php 350', '2019-10-01', '7:00 PM', 'pending'),
(2, 6, 'alverio', 'alverio', '09462886584', 'hematology-Regular: PHP350', '2019-10-01', '9:30 AM', 'accept'),
(3, 7, 'jc', 'satiada', '09998587056', 'hematology-Regular: PHP350', '2019-10-03', '10:00 AM', 'accept'),
(4, 7, 'jc', 'satiada', '09998587056', 'Hematology - Regular: Php 350', '2019-10-01', '7:30 PM', 'accept'),
(5, 7, 'jc', 'satiada', '09998587056', 'Hematology - Regular: Php 350', '2019-10-01', '8:00 PM', 'accept'),
(6, 7, 'jc', 'satiada', '09998587056', 'Fecalysis - Regular: Php 350', '2019-10-01', '7:30 PM', 'accept'),
(7, 7, 'jc', 'satiada', '09998587056', 'Fecalysis - Senior: Php 280', '2019-10-01', '7:30 PM', 'accept'),
(8, 7, 'jc', 'satiada', '09998587056', 'Consultation - Senior: Php 280', '2019-10-01', '7:30 PM', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `com_id` int(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `complaints` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `itr_no` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`com_id`, `date`, `complaints`, `remark`, `itr_no`, `section`, `status`) VALUES
(56, '10/01/2019', 'to infections swine flue', 'checkup', '1', 'Fecalysis', 'Done'),
(57, '10/01/2019', 'to see infections  in urine', 'checkup / followup', '2', 'Urinalysis', 'Done'),
(58, '10/01/2019', 'broken bones in joints', 'xray for joints', '7', 'Xray', 'Done'),
(59, '10/01/2019', 'fecalysis', 'test subject for fecalysis', '7', 'Fecalysis', 'Done'),
(60, '10/01/2019', 'urinalysis for medical use', 'for medical certficate', '7', 'Urinalysis', 'Done'),
(61, '10/01/2019', 'for medical purposes', 'for medical purposes', '7', 'Hematology', 'Done'),
(62, '10/01/2019', 'broken knee', 'they have a broken knee', '7', 'Rehabilitation', 'Done'),
(63, '10/01/2019', 'bone structor', 'consultation', '1', 'Xray', 'Pending'),
(64, '10/01/2019', 'Knee fracture', 'xray for knee', '7', 'Xray', 'Done'),
(65, '10/01/2019', 'for medical use', 'for medical use', '7', 'Fecalysis', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `fecalisys`
--

CREATE TABLE `fecalisys` (
  `fecalisys_id` int(11) NOT NULL,
  `date_of_request` date NOT NULL,
  `price` int(11) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `consistency` varchar(15) NOT NULL,
  `pus_cells` varchar(15) NOT NULL,
  `RBC` varchar(15) NOT NULL,
  `fat_globules` varchar(15) NOT NULL,
  `occult_blood` varchar(15) NOT NULL,
  `others_chem` varchar(15) NOT NULL,
  `ova` varchar(15) NOT NULL,
  `larva` varchar(15) NOT NULL,
  `adult_forms` varchar(15) NOT NULL,
  `cyst` varchar(15) NOT NULL,
  `trophozoites` varchar(15) NOT NULL,
  `others_pro` varchar(15) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_reported` date NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fecalisys`
--

INSERT INTO `fecalisys` (`fecalisys_id`, `date_of_request`, `price`, `requested_by`, `color`, `consistency`, `pus_cells`, `RBC`, `fat_globules`, `occult_blood`, `others_chem`, `ova`, `larva`, `adult_forms`, `cyst`, `trophozoites`, `others_pro`, `remarks`, `date_reported`, `pathologist`, `medical_technologist`, `itr_no`, `user_id`, `month`, `year`) VALUES
(6, '2019-09-01', 200, 'Doctor F', 'brown', 'fluffy', '12', '11', '12', '12', 'none', '23', '99', '99', '57', '6', 'none', 'see more bacterials infections', '2019-10-01', 'Doctor F', 'Doctor F', '1', 24, 'Sep', '2019'),
(7, '2019-10-01', 200, 'Dr. Alvs', 'Yellow', 'Fluppy', '21', '12', '12', '12', '23', '23', '12', '32', 'none', 'none', '', 'for medicala use only', '2019-10-01', 'Dr. Angel', 'Dr. Hector', '7', 24, 'Oct', '2019'),
(8, '2019-10-01', 200, 'Dr. Alvs', 'Yellow', 'Yes', '12', '21', '32', 'yes', 'yes', '12', '32', '12', '32', '12', '32', 'They have no virus seen on laboratory', '2019-10-01', 'Dr. Jess', 'Dra. See', '7', 24, 'Oct', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `hematology`
--

CREATE TABLE `hematology` (
  `hem_id` int(11) NOT NULL,
  `date_requested` date NOT NULL,
  `price` int(10) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `hemoglobin` varchar(15) NOT NULL,
  `hematocrit` varchar(15) NOT NULL,
  `RBC_count` varchar(15) NOT NULL,
  `WBC_count` varchar(15) NOT NULL,
  `platelet` varchar(15) NOT NULL,
  `bleeding_time` varchar(15) NOT NULL,
  `clotting_time` varchar(15) NOT NULL,
  `neutrophil` varchar(15) NOT NULL,
  `segmenters` varchar(15) NOT NULL,
  `stabs` varchar(15) NOT NULL,
  `lymphocytes` varchar(15) NOT NULL,
  `monocyte` varchar(15) NOT NULL,
  `eosinophil` varchar(15) NOT NULL,
  `basophil` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `ABO_group` varchar(15) NOT NULL,
  `Rh_group` varchar(15) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `itr_no` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hematology`
--

INSERT INTO `hematology` (`hem_id`, `date_requested`, `price`, `requested_by`, `hemoglobin`, `hematocrit`, `RBC_count`, `WBC_count`, `platelet`, `bleeding_time`, `clotting_time`, `neutrophil`, `segmenters`, `stabs`, `lymphocytes`, `monocyte`, `eosinophil`, `basophil`, `total`, `ABO_group`, `Rh_group`, `remarks`, `pathologist`, `medical_technologist`, `itr_no`, `user_id`, `month`, `year`) VALUES
(3, '2019-10-01', 180, 'Dr. Alvs', '120', '30', '6', '12', '160', '3', '2', '55', '12', '21', '23', '4', '2', '1', '60', 'A', 'O', 'for medical puroposes', 'Dr. Alvin', 'Dra. Gumatayers', '7', 23, 'Oct', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `itr`
--

CREATE TABLE `itr` (
  `itr_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `family_no` varchar(6) NOT NULL,
  `phil_health_no` varchar(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `age` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `BP` varchar(10) NOT NULL,
  `TEMP` varchar(10) NOT NULL,
  `PR` varchar(10) NOT NULL,
  `RR` varchar(10) NOT NULL,
  `WT` varchar(10) NOT NULL,
  `HT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itr`
--

INSERT INTO `itr` (`itr_no`, `email`, `password`, `family_no`, `phil_health_no`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `address`, `contact`, `civil_status`, `gender`, `BP`, `TEMP`, `PR`, `RR`, `WT`, `HT`) VALUES
(1, 'hermidaisidro@gmail.com', '123', '1', '13232-22-2', 'Hermida', 'L', 'satiada', '12/11/1985', '24', '#3 Grupo st., Civillain city', '09462886584', 'Single', 'Male', '121', '123&deg;C', '12', '21', '131kg', '54'),
(2, 'fernandoamorsolo@gmail.com', '123', '1', '122-003-455', 'Fernando', 'L', 'Amorsolo', '01/01/2017', '24', 'carlma antipolo city', '09462886584', 'Single', 'Male', '121', '20&deg;C', '12', '12', '131kg', '5\'2'),
(3, 'agustinsebastian@gmail.com', '123', '0', '0', 'Agustin', 'L', 'Sebastian', '09/10/1982', '28', '3# Gang nam st., Puro City', '09380959168', 'Single', 'Male', '', '&deg;C', '', '', 'kg', ''),
(4, 'agustinsebastian@gmail.com', '123', '0', '0', 'Agustin', 'L', 'Sebastian', '09/10/1982', '28', '3# Gang nam st., Puro City', '09380959168', 'Single', 'Male', '', '&deg;C', '', '', 'kg', ''),
(5, 'cargojessie@gmail.com', '123', '0', '0', 'Cargo', 'M', 'Jessie', '03/02/1965', '24', '#3 Grupo st., Civillain city', '09380959168', 'Single', 'Male', '', '&deg;C', '', '', 'kg', ''),
(6, 'crusalverio@gmail.com', '123', '0', '0', 'alverio', 'o', 'alverio', '11/12/1988', '24', '#24 Jeans st., UP city', '09462886584', 'Single', 'Male', '', '&deg;C', '', '', 'kg', ''),
(7, 'jcsatiada@gmail.com', 'jcsatiada', '3', '-', 'jc', 'pascual', 'satiada', '04/20/2000', '23', 'Marikina City', '09998587056', 'Single', 'Male', '12', '12&deg;C', '12', '12', '12kg', '12');

-- --------------------------------------------------------

--
-- Table structure for table `radiological`
--

CREATE TABLE `radiological` (
  `rad_id` int(11) NOT NULL,
  `case_no` varchar(12) NOT NULL,
  `referred_by` varchar(30) NOT NULL,
  `clinical_impression` varchar(100) NOT NULL,
  `room_bed_no` varchar(11) NOT NULL,
  `type_of_examination` varchar(30) NOT NULL,
  `date_taken` date NOT NULL,
  `remark` varchar(255) NOT NULL,
  `radiologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiological`
--

INSERT INTO `radiological` (`rad_id`, `case_no`, `referred_by`, `clinical_impression`, `room_bed_no`, `type_of_examination`, `date_taken`, `remark`, `radiologist`, `itr_no`, `user_id`, `month`, `price`, `year`) VALUES
(7, '1', 'Dr Syson', 'Knee-AP and Lateral', '2', 'Xray', '2019-09-01', '', 'Dr. Albert Syson', '7', 21, 'Sep', 250, '2019'),
(8, '2', 'Dra. Alvis', 'Skull-AP and Lateral', '3', 'Skull fracture Xray', '2019-10-01', 'No Broken skull', 'Dr. Albert Syson', '7', 21, 'Oct', 250, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `rehabilitation`
--

CREATE TABLE `rehabilitation` (
  `rehab_id` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `type_of_disability` varchar(50) NOT NULL,
  `subjective` varchar(100) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `assessment` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rehabilitation`
--

INSERT INTO `rehabilitation` (`rehab_id`, `price`, `diagnosis`, `type_of_disability`, `subjective`, `objective`, `assessment`, `plan`, `date`, `itr_no`, `user_id`, `month`, `year`) VALUES
(2, 300, 'Broken Bones', 'Broken Bones', 'Broken Bones', 'Broken Bones', 'Broken Bones', 'Broken Bones', '10/01/2019', '7', 25, 'Oct', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

CREATE TABLE `secretary` (
  `sec_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`sec_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(2, 'secretary', '123', 'sec', 'R', 'Tary');

-- --------------------------------------------------------

--
-- Table structure for table `urinalysis`
--

CREATE TABLE `urinalysis` (
  `urinalysis_id` int(11) NOT NULL,
  `date_of_request` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `color` varchar(15) NOT NULL,
  `transparency` varchar(15) NOT NULL,
  `specific_gravity` varchar(15) NOT NULL,
  `ph` varchar(15) NOT NULL,
  `sugar` varchar(15) NOT NULL,
  `protein` varchar(15) NOT NULL,
  `pregnancy_test` varchar(15) NOT NULL,
  `pus_cells` varchar(15) NOT NULL,
  `rbc` varchar(15) NOT NULL,
  `cast` varchar(15) NOT NULL,
  `urates` varchar(15) NOT NULL,
  `uric_acid` varchar(15) NOT NULL,
  `cal_ox` varchar(15) NOT NULL,
  `epith_cells` varchar(15) NOT NULL,
  `mucus_threads` varchar(15) NOT NULL,
  `others` varchar(15) NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urinalysis`
--

INSERT INTO `urinalysis` (`urinalysis_id`, `date_of_request`, `price`, `color`, `transparency`, `specific_gravity`, `ph`, `sugar`, `protein`, `pregnancy_test`, `pus_cells`, `rbc`, `cast`, `urates`, `uric_acid`, `cal_ox`, `epith_cells`, `mucus_threads`, `others`, `pathologist`, `medical_technologist`, `itr_no`, `user_id`, `month`, `year`) VALUES
(3, '09/01/2019', 80, 'yellow', 'ok', '12', '1.2', '0.1', '22', 'none', '99', '11', '112', '123', '12', '12', '4', '4', 'none', 'Doctor Urine', 'Doctor Urine', '2', 22, 'Sep', '2019'),
(4, '10/01/2019', 80, 'Yellow', 'yes', '20', '12', '23', '33', '21', '32', '32', '12', '23', '12', '32', '12', '32', '12', 'Dr. Jess', 'Dra. Syson', '7', 22, 'Oct', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `section`) VALUES
(21, 'doctorx', 'doctorx', 'doctor', '', 'Xray', 'Xray'),
(22, 'doctoru', 'doctoru', 'doctor', '', 'Urinalysis', 'Urinalysis'),
(23, 'doctorh', 'doctorh', 'doctor', '', 'hematology', 'Hematology'),
(24, 'doctorf', 'doctorf', 'Fecal', '', 'fecalysis', 'Fecalysis'),
(25, 'doctorc', 'doctorc', 'doctor', '', 'consultation', 'Consultation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `fecalisys`
--
ALTER TABLE `fecalisys`
  ADD PRIMARY KEY (`fecalisys_id`);

--
-- Indexes for table `hematology`
--
ALTER TABLE `hematology`
  ADD PRIMARY KEY (`hem_id`);

--
-- Indexes for table `itr`
--
ALTER TABLE `itr`
  ADD PRIMARY KEY (`itr_no`),
  ADD UNIQUE KEY `itr_no` (`itr_no`);

--
-- Indexes for table `radiological`
--
ALTER TABLE `radiological`
  ADD PRIMARY KEY (`rad_id`);

--
-- Indexes for table `rehabilitation`
--
ALTER TABLE `rehabilitation`
  ADD PRIMARY KEY (`rehab_id`);

--
-- Indexes for table `secretary`
--
ALTER TABLE `secretary`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `urinalysis`
--
ALTER TABLE `urinalysis`
  ADD PRIMARY KEY (`urinalysis_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `com_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `fecalisys`
--
ALTER TABLE `fecalisys`
  MODIFY `fecalisys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hematology`
--
ALTER TABLE `hematology`
  MODIFY `hem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itr`
--
ALTER TABLE `itr`
  MODIFY `itr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `radiological`
--
ALTER TABLE `radiological`
  MODIFY `rad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rehabilitation`
--
ALTER TABLE `rehabilitation`
  MODIFY `rehab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `secretary`
--
ALTER TABLE `secretary`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urinalysis`
--
ALTER TABLE `urinalysis`
  MODIFY `urinalysis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
