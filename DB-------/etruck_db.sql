-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 08:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etruck_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `petrol_stations`
--

CREATE TABLE `petrol_stations` (
  `Id` int(11) NOT NULL,
  `P_Name` varchar(45) NOT NULL,
  `P_Address` varchar(60) NOT NULL,
  `Owner_Id` varchar(55) NOT NULL,
  `Owner_Name` varchar(45) NOT NULL,
  `Owner_Contact` bigint(20) NOT NULL,
  `P_Litre_Capital` float NOT NULL,
  `P_Cash_Capital` float NOT NULL,
  `P_Fuel_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petrol_station_subuser`
--

CREATE TABLE `petrol_station_subuser` (
  `Id` int(11) NOT NULL,
  `Sub_User_Name` varchar(45) NOT NULL,
  `Sub_User_Email` varchar(45) NOT NULL,
  `Sub_User_Password` varchar(45) NOT NULL,
  `Sub_User_Contact` int(11) NOT NULL,
  `Sub_User_ID` varchar(45) NOT NULL,
  `Sub_User_Parent` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ps_transaction_annex_cash`
--

CREATE TABLE `ps_transaction_annex_cash` (
  `Id` int(11) NOT NULL,
  `Ps_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` float NOT NULL,
  `Annex` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ps_transaction_annex_litre`
--

CREATE TABLE `ps_transaction_annex_litre` (
  `Id` int(11) NOT NULL,
  `Ps_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` float NOT NULL,
  `Annex` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ps_transaction_detail`
--

CREATE TABLE `ps_transaction_detail` (
  `Id` int(11) NOT NULL,
  `Ps_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Plate_No` varchar(45) NOT NULL,
  `Driver_Name` varchar(45) NOT NULL,
  `Token` varchar(55) NOT NULL,
  `Fuel_Rate` float NOT NULL,
  `Fuel` float DEFAULT NULL,
  `Cash` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token_data`
--

CREATE TABLE `token_data` (
  `Id` int(11) NOT NULL,
  `Token_Date` date DEFAULT NULL,
  `Token_User` varchar(35) DEFAULT NULL,
  `Token_TC` int(88) NOT NULL,
  `Token_Driver` int(88) NOT NULL,
  `Token_PS` int(88) NOT NULL,
  `Token_Fuel_Rate` float DEFAULT NULL,
  `Token_Cash` float NOT NULL,
  `Token_Litres` float NOT NULL,
  `Token_Approved_Cash` float DEFAULT NULL,
  `Token_Approved_Litres` float DEFAULT NULL,
  `Token_Total_Amount` float DEFAULT NULL,
  `Token_App_User` varchar(35) DEFAULT NULL,
  `Token` varchar(55) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_company`
--

CREATE TABLE `truck_company` (
  `Id` int(11) NOT NULL,
  `TC_Name` varchar(45) NOT NULL,
  `TC_Address` varchar(55) NOT NULL,
  `TC_Owner_Id` varchar(45) NOT NULL,
  `TC_Owner_Name` varchar(45) NOT NULL,
  `TC_Owner_Contact` bigint(20) NOT NULL,
  `TC_Capital` float DEFAULT NULL,
  `TC_PetrolStations` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_company_fuel_data`
--

CREATE TABLE `truck_company_fuel_data` (
  `Id` int(11) NOT NULL,
  `TC_Id` bigint(20) NOT NULL,
  `PS_Id` bigint(20) NOT NULL,
  `PS_Fuel_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_company_subuser`
--

CREATE TABLE `truck_company_subuser` (
  `Id` int(11) NOT NULL,
  `Sub_User_Name` varchar(45) NOT NULL,
  `Sub_User_Email` varchar(45) NOT NULL,
  `Sub_User_Password` varchar(45) NOT NULL,
  `Sub_User_Contact` int(11) NOT NULL,
  `Sub_User_ID` varchar(45) NOT NULL,
  `Sub_User_Parent` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `truck_credit_request`
--

CREATE TABLE `truck_credit_request` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Date_Of_Approval` date DEFAULT NULL,
  `Amount` float NOT NULL,
  `Paid_Amount` float DEFAULT NULL,
  `TC_Id` int(11) NOT NULL,
  `Status` varchar(55) NOT NULL,
  `Action` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_drivers`
--

CREATE TABLE `truck_drivers` (
  `Id` int(11) NOT NULL,
  `Driver_Name` varchar(55) NOT NULL,
  `Driver_Email` varchar(55) NOT NULL,
  `Driver_Contact` bigint(55) NOT NULL,
  `Driver_Plate_No` varchar(55) NOT NULL,
  `Driver_Address` varchar(120) NOT NULL,
  `Driver_Id_Card` varchar(55) NOT NULL,
  `Driver_TC_Owner_Id` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_transaction_annex`
--

CREATE TABLE `truck_transaction_annex` (
  `Id` int(11) NOT NULL,
  `TC_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` text DEFAULT NULL,
  `Credit_Amount` varchar(55) DEFAULT NULL,
  `Annex` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `PassWord` varchar(25) NOT NULL,
  `User_Role` double NOT NULL,
  `Owner_Id` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `UserName`, `Email`, `PassWord`, `User_Role`, `Owner_Id`) VALUES
(1, 'SuperAdmin', 'admin@etruck.com', 'Netware!234%', 1, 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petrol_stations`
--
ALTER TABLE `petrol_stations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `petrol_station_subuser`
--
ALTER TABLE `petrol_station_subuser`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ps_transaction_annex_cash`
--
ALTER TABLE `ps_transaction_annex_cash`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ps_transaction_annex_litre`
--
ALTER TABLE `ps_transaction_annex_litre`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ps_transaction_detail`
--
ALTER TABLE `ps_transaction_detail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `token_data`
--
ALTER TABLE `token_data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `truck_company`
--
ALTER TABLE `truck_company`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `truck_company_fuel_data`
--
ALTER TABLE `truck_company_fuel_data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `truck_company_subuser`
--
ALTER TABLE `truck_company_subuser`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `truck_credit_request`
--
ALTER TABLE `truck_credit_request`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `truck_drivers`
--
ALTER TABLE `truck_drivers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `truck_transaction_annex`
--
ALTER TABLE `truck_transaction_annex`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petrol_stations`
--
ALTER TABLE `petrol_stations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petrol_station_subuser`
--
ALTER TABLE `petrol_station_subuser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ps_transaction_annex_cash`
--
ALTER TABLE `ps_transaction_annex_cash`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ps_transaction_annex_litre`
--
ALTER TABLE `ps_transaction_annex_litre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ps_transaction_detail`
--
ALTER TABLE `ps_transaction_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token_data`
--
ALTER TABLE `token_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_company`
--
ALTER TABLE `truck_company`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_company_fuel_data`
--
ALTER TABLE `truck_company_fuel_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_company_subuser`
--
ALTER TABLE `truck_company_subuser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_credit_request`
--
ALTER TABLE `truck_credit_request`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_drivers`
--
ALTER TABLE `truck_drivers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_transaction_annex`
--
ALTER TABLE `truck_transaction_annex`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
