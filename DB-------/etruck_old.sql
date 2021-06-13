-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 01:56 PM
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
-- Database: `etruck`
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
  `P_Litre_Capital` decimal(10,0) NOT NULL,
  `P_Cash_Capital` decimal(10,0) NOT NULL,
  `P_Fuel_Price` decimal(10,0) NOT NULL,
  `P_New_Fuel_Price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petrol_stations`
--

INSERT INTO `petrol_stations` (`Id`, `P_Name`, `P_Address`, `Owner_Id`, `Owner_Name`, `Owner_Contact`, `P_Litre_Capital`, `P_Cash_Capital`, `P_Fuel_Price`, `P_New_Fuel_Price`) VALUES
(56, 'Total parco', 'Uni road block 13, karachi', '123120', 'Insane12', 345005491, '65200', '75000', '100', '100'),
(62, 'PSO', 'FBarea', 'PSO-1', 'fawwad', 231113421, '50000', '0', '100', '100'),
(63, 'PSO', 'Joher Mor, Karachi', 'joher123', 'Sami', 3458796589, '58230', '-202', '75', '70'),
(64, 'Shell', 'Ayesha manzil, Karachi', '12345', 'Moiz 1', 3546846168, '0', '0', '105', '105'),
(65, 'Hascol', 'Kamran Chowrangi, Karachi', 'Kami123', 'Kamran', 33312432323, '0', '0', '100', '100'),
(72, 'Memon', 'sohrabgoth, karacho', '123542', 'Memon altaf', 325478542, '17900', '13000', '100', '100'),
(73, 'Naseerabad Hascol', 'naseerabad, karachi', 'nas123', 'naseer', 3141251515, '0', '0', '110', '110'),
(74, 'Agha', 'Civic Center', 'asd123', 'khanasd', 31354684654123, '0', '0', '102', '102'),
(75, 'sam', 'sam', 'sam', 'sam', 123, '0', '0', '120', '120'),
(76, 'losyhyxata', 'xugacyh', 'banil', 'tiqehi', 219, '0', '0', '90', '90');

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

--
-- Dumping data for table `petrol_station_subuser`
--

INSERT INTO `petrol_station_subuser` (`Id`, `Sub_User_Name`, `Sub_User_Email`, `Sub_User_Password`, `Sub_User_Contact`, `Sub_User_ID`, `Sub_User_Parent`) VALUES
(2, 'sohail', 'sohail@mail.com', 'asd', 2147483647, '42101-213123123', '63');

-- --------------------------------------------------------

--
-- Table structure for table `ps_transaction_annex_cash`
--

CREATE TABLE `ps_transaction_annex_cash` (
  `Id` int(11) NOT NULL,
  `Ps_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` double NOT NULL,
  `Annex` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_transaction_annex_cash`
--

INSERT INTO `ps_transaction_annex_cash` (`Id`, `Ps_Id`, `Date`, `Amount`, `Annex`) VALUES
(11, 59, '2020-09-09', 250000, 'etruck5f67690092a7a7.90638820.jpg'),
(12, 56, '2020-09-22', 25000, 'etruck5f676c0e192793.12898941.jpg'),
(13, 63, '2020-11-03', 25000, 'etruck5fa120ab66dd89.83047299.jpg'),
(14, 63, '2020-12-15', 23000, 'etruck5fd8cadc97c636.83479348.jpg'),
(15, 63, '2020-12-15', 23500, 'etruck5fd8cb49782ba9.30368410.jpg'),
(16, 63, '2020-12-15', 25000, 'etruck5fd8cb79ae35d9.53051653.jpg'),
(17, 56, '2020-12-20', 35000, 'etruck5fdf7b8629e514.92051475.jpg'),
(18, 72, '2021-02-03', 25000, 'etruck601aba80816696.66365003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ps_transaction_annex_litre`
--

CREATE TABLE `ps_transaction_annex_litre` (
  `Id` int(11) NOT NULL,
  `Ps_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` double NOT NULL,
  `Annex` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_transaction_annex_litre`
--

INSERT INTO `ps_transaction_annex_litre` (`Id`, `Ps_Id`, `Date`, `Amount`, `Annex`) VALUES
(99, 53, '2020-06-09', 250008, '12c.jpg'),
(100, 57, '2020-09-02', 1500, '6828613-polygon-wallpapers.jpg'),
(103, 56, '2020-09-14', 50000, 'etruck5f676dd411b7d5.64913054.jpg'),
(104, 58, '2020-09-20', 200000, 'etruck5f6790c6655436.92976365.jpg'),
(105, 63, '2020-10-29', 25000, 'etruck5f9a877f690339.42644713.jpg'),
(106, 63, '2020-12-15', 25000, 'etruck5fd8c9e529c359.13588008.jpg'),
(107, 63, '2020-12-15', 100000, 'etruck5fd8ca5b077863.74046952.jpg'),
(108, 72, '2021-02-03', 25000, 'etruck601aba60b5b787.68213119.jpg'),
(109, 56, '2021-03-19', 200, 'etruck605469ae54fc11.73342496.png'),
(110, 63, '2021-04-11', 50000, 'etruck6072c17275d5a7.38165279.jpg');

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
  `Fuel_Rate` double NOT NULL,
  `Fuel` double DEFAULT NULL,
  `Cash` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_transaction_detail`
--

INSERT INTO `ps_transaction_detail` (`Id`, `Ps_Id`, `Date`, `Plate_No`, `Driver_Name`, `Token`, `Fuel_Rate`, `Fuel`, `Cash`) VALUES
(1, 56, '2020-09-16', 'qwe123', 'freak', 'qwer1234', 100, 23, 2000),
(3, 56, '2020-09-15', 'kgf1122', 'inshal', '123asd', 0, 50, 1000),
(4, 58, '2020-08-20', 'qwe231', 'BOBO', 'qwer1234', 0, 22, 25000),
(5, 59, '2020-09-25', 'asw1122', 'Pacify', 'asd11', 0, 41, 5000);

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
  `Token_Fuel_Rate` decimal(10,0) DEFAULT NULL,
  `Token_Cash` bigint(20) NOT NULL,
  `Token_Litres` double NOT NULL,
  `Token_Approved_Cash` bigint(20) DEFAULT NULL,
  `Token_Approved_Litres` decimal(10,0) DEFAULT NULL,
  `Token_Total_Amount` decimal(10,0) DEFAULT NULL,
  `Token_App_User` varchar(35) DEFAULT NULL,
  `Token` varchar(55) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_data`
--

INSERT INTO `token_data` (`Id`, `Token_Date`, `Token_User`, `Token_TC`, `Token_Driver`, `Token_PS`, `Token_Fuel_Rate`, `Token_Cash`, `Token_Litres`, `Token_Approved_Cash`, `Token_Approved_Litres`, `Token_Total_Amount`, `Token_App_User`, `Token`, `Status`) VALUES
(54, '2021-01-30', 'VICKY', 19, 9, 63, '50', 1000, 10, 1000, '10', '1500', NULL, '49807', 'Approved'),
(55, '2021-01-30', 'Mahmud', 19, 12, 64, NULL, 500, 10, NULL, NULL, NULL, NULL, '79247', 'Pending'),
(56, '2021-01-31', 'BOB', 19, 12, 63, '50', 100, 10, 100, '10', '600', NULL, '71058', 'Approved'),
(63, '2021-01-31', 'Mahmud', 19, 9, 63, NULL, 1000, 10, NULL, NULL, NULL, NULL, '92649', 'Pending'),
(64, '2021-01-31', 'Mahmud', 19, 9, 63, '50', 3500, 22, 3500, '22', '4600', NULL, '85598', 'Approved'),
(65, '2021-01-31', 'Mahmud', 19, 9, 63, '50', 100, 22, 100, '22', '1200', NULL, '18457', 'Approved'),
(66, '2021-01-31', 'Mahmud', 19, 9, 63, '50', 100, 22, 100, '22', '1200', NULL, '92605', 'Approved'),
(67, '2021-01-31', 'VICKY', 19, 12, 63, '50', 5000, 22, 5000, '22', '6100', NULL, '27272', 'Approved'),
(68, '2021-01-31', 'VICKY', 19, 12, 63, '50', 3500, 22, 3500, '22', '4600', NULL, '51135', 'Approved'),
(69, '2021-01-31', 'VICKY', 19, 12, 63, NULL, 5000, 22, NULL, NULL, NULL, NULL, '61708', 'Pending'),
(70, '2021-01-31', 'VICKY', 19, 12, 63, '50', 100, 10, 100, '10', '600', NULL, '77651', 'Approved'),
(71, '2021-01-31', 'VICKY', 19, 12, 63, '50', 300, 10, 300, '10', '800', NULL, '19364', 'Approved'),
(72, '2021-01-31', 'Mahmud', 19, 12, 63, '50', 300, 5, 300, '5', '550', NULL, '51754', 'Approved'),
(73, '2021-02-01', 'VICKY', 19, 12, 63, '50', 0, 10, 0, '10', '500', 'sohail', '54478', 'Approved'),
(74, '2021-02-01', 'Mahmud', 19, 9, 63, '50', 100, 2, 100, '2', '200', 'sami', '59819', 'Approved'),
(75, '2021-02-03', 'VICKY', 19, 12, 63, '120', 80, 0, 80, '15', '1873', 'sami', '42695', 'Approved'),
(76, '2021-02-03', 'Mahmud', 19, 12, 63, '112', 3500, 22, 3500, '22', '5964', 'sami', '54170', 'Approved'),
(77, '2021-02-03', 'Mahmud', 19, 12, 63, '112', 5000, 35, 5000, '35', '8920', 'sami', '59878', 'Approved'),
(79, '2021-02-03', 'VICKY', 19, 12, 63, '120', 100, 20, 100, '20', '2490', 'sami', '82431', 'Approved'),
(81, '2021-02-20', 'Mahmud', 19, 12, 63, '120', 100, 10, 100, '10', '1295', 'sami', '52734', 'Approved'),
(82, '2021-02-20', 'Mahmud', 19, 9, 63, '110', 2500, 10, 2500, '10', '3600', 'sami', '92490', 'Approved'),
(83, '2021-02-20', 'hamedani', 34, 18, 63, '100', 100, 5, 100, '5', '598', 'sami', '69104', 'Approved'),
(84, '2021-02-21', 'Mahmud', 19, 19, 63, '110', 1500, 22, 1200, '22', '3620', 'sohail', '10538', 'Approved'),
(85, '2021-03-14', 'hamedani', 34, 18, 63, '100', 3500, 35, 3500, '35', '6983', 'sami', '42536', 'Approved'),
(86, '2021-03-14', 'hamedani', 34, 18, 63, '100', 100, 40, 100, '40', '4080', 'sami', '23917', 'Approved'),
(87, '2021-03-14', 'Mahmud', 19, 12, 63, '110', 100, 10, 100, '10', '1200', 'sami', '85037', 'Approved'),
(88, '2021-03-15', 'insane', 35, 20, 63, '100', 1000, 10, 1000, '10', '2000', 'sami', '30921', 'Approved'),
(89, '2021-03-22', 'BOB', 19, 19, 63, '113', 1000, 20, 1000, '20', '3250', 'sohail', '22682', 'Approved'),
(90, '2021-03-22', 'BOB', 19, 12, 63, '113', 1000, 22, 1000, '22', '3475', 'sohail', '59138', 'Approved'),
(91, '2021-03-24', 'Mahmud', 19, 12, 63, '113', 3500, 250, 3500, '100', '14750', 'sami', '48000', 'Approved'),
(92, '2021-03-24', 'Mahmud', 19, 9, 62, NULL, 3500, 22, NULL, NULL, NULL, NULL, '54490', 'Pending'),
(93, '2021-03-24', 'Mahmud', 19, 9, 75, NULL, 5000, 35, NULL, NULL, NULL, NULL, '86687', 'Pending'),
(94, '2021-03-26', 'Mahmud', 19, 12, 63, '113', 1000, 50, 1000, '50', '6650', 'sami', '29289', 'Approved'),
(95, '2021-03-30', 'Mahmud', 19, 12, 63, NULL, 100, 2, NULL, NULL, NULL, NULL, '40467', 'Pending'),
(96, '2021-03-31', 'Mahmud', 19, 19, 63, '113', 500, 5, 500, '5', '1065', 'sami', '60170', 'Approved'),
(97, '2021-03-31', 'Mahmud', 19, 12, 62, NULL, 200, 5, NULL, NULL, NULL, NULL, '20232', 'Pending'),
(98, '2021-03-31', 'Mahmud', 19, 19, 63, '113', 2, 5, 2, '5', '567', 'sami', '69018', 'Approved'),
(99, '2021-03-31', 'Mahmud', 19, 19, 63, '113', 200, 5, 200, '5', '765', 'sami', '83658', 'Approved');

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
  `TC_Capital` decimal(10,0) NOT NULL,
  `TC_PetrolStations` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truck_company`
--

INSERT INTO `truck_company` (`Id`, `TC_Name`, `TC_Address`, `TC_Owner_Id`, `TC_Owner_Name`, `TC_Owner_Contact`, `TC_Capital`, `TC_PetrolStations`) VALUES
(6, '3408736583', 'Gulshan -e- Azeem, Scheme33', '12313', 'Md. Muqtada Kamal', 34854548725, '26000', '56,62,63'),
(19, 'Payitaht', 'payitaht, turkey', 'mahmud123', 'Mahmud', 23111455, '1466', '62,63,75'),
(22, 'daewoo', 'kemari, karachi', 'qwerty123', 'Raza meer', 2147483647, '0', '64,65,72'),
(25, 'asd', 'asd', 'asd', 'asd', 3408736583, '0', '62,63,72'),
(26, 'helo', 'ad', 'helo12345', 'hasd', 123, '0', '56,62'),
(32, 'hello', 'hello', 'asd', 'asd', 123, '0', '56,74'),
(34, 'Etihad ', 'cornish site, Sharjah', 'asd123qwe', 'Sheikh Hamedani', 98745613513, '5900', '56,62,63,64'),
(35, 'insane', 'insane', 'insane', 'insae', 123123123, '98000', '56,63'),
(36, 'asdasd', 'asdasd', 'asdasd', 'Md. Muqtada Kamal', 3408736583, '0', '72');

-- --------------------------------------------------------

--
-- Table structure for table `truck_company_fuel_data`
--

CREATE TABLE `truck_company_fuel_data` (
  `Id` int(11) NOT NULL,
  `TC_Id` bigint(20) NOT NULL,
  `PS_Id` bigint(20) NOT NULL,
  `PS_Fuel_Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truck_company_fuel_data`
--

INSERT INTO `truck_company_fuel_data` (`Id`, `TC_Id`, `PS_Id`, `PS_Fuel_Price`) VALUES
(7, 6, 56, '114'),
(8, 6, 62, '110'),
(9, 6, 63, '222'),
(10, 22, 64, '111'),
(11, 22, 65, '110'),
(12, 22, 72, '112'),
(13, 19, 56, '222'),
(14, 19, 63, '113'),
(15, 19, 64, '85'),
(16, 34, 56, '222'),
(17, 34, 62, '110'),
(18, 34, 63, '114'),
(19, 34, 64, '113'),
(20, 34, 65, '111'),
(21, 34, 72, '114'),
(22, 35, 56, '110'),
(23, 35, 63, '100'),
(24, 19, 62, '114'),
(25, 19, 65, '99'),
(26, 19, 74, '113'),
(27, 19, 72, '58'),
(28, 32, 64, '110'),
(29, 32, 62, '222'),
(30, 32, 63, '114'),
(31, 25, 63, '111'),
(32, 25, 62, '113'),
(33, 25, 72, '114'),
(34, 36, 72, '110'),
(35, 19, 75, '125');

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

--
-- Dumping data for table `truck_company_subuser`
--

INSERT INTO `truck_company_subuser` (`Id`, `Sub_User_Name`, `Sub_User_Email`, `Sub_User_Password`, `Sub_User_Contact`, `Sub_User_ID`, `Sub_User_Parent`) VALUES
(4, 'VICKY', 'VICKY@MAIL.COM', 'ASD', 123, 'vicky123', '19'),
(5, 'BOB', 'bob@mail.com', 'bob', 2134512315, '42402-123123123', '19'),
(6, 'Ali', 'ali@mail.com', 'asd', 2147483647, '41213-123123-1', '34');

-- --------------------------------------------------------

--
-- Table structure for table `truck_credit_request`
--

CREATE TABLE `truck_credit_request` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Date_Of_Approval` date DEFAULT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Paid_Amount` decimal(10,0) DEFAULT NULL,
  `TC_Id` int(11) NOT NULL,
  `Status` varchar(55) NOT NULL,
  `Action` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truck_credit_request`
--

INSERT INTO `truck_credit_request` (`Id`, `Date`, `Date_Of_Approval`, `Amount`, `Paid_Amount`, `TC_Id`, `Status`, `Action`) VALUES
(3, '2020-10-08', '2020-10-22', '50000', '50000', 19, 'Paid', 'approved'),
(4, '2020-10-07', '2020-10-08', '250000', '250000', 22, 'Paid', 'approved'),
(5, '2020-10-29', '2020-10-29', '200000', '200000', 23, 'Paid', 'Approved'),
(6, '2020-10-30', '2020-12-30', '2500', '1500', 19, 'Notpaid', 'Approved'),
(8, '2021-01-04', '2021-01-04', '80000', '80000', 19, 'Paid', 'Approved'),
(9, '2021-01-05', '2021-01-05', '2500', '0', 24, 'Notpaid', 'Approved'),
(10, '2021-01-05', '2021-01-05', '5000', '0', 24, 'Notpaid', 'Approved'),
(11, '2021-02-04', '2021-02-04', '2500', '2500', 19, 'Paid', 'Approved');

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

--
-- Dumping data for table `truck_drivers`
--

INSERT INTO `truck_drivers` (`Id`, `Driver_Name`, `Driver_Email`, `Driver_Contact`, `Driver_Plate_No`, `Driver_Address`, `Driver_Id_Card`, `Driver_TC_Owner_Id`) VALUES
(9, 'Md Yousuf', 'yousuf123@gmail.com', 34141587, 'KGG123', 'FB.area,karachi', '42401-2516-22', 'mahmud123'),
(12, 'Inshal', 'inshi1122@gmail.com', 9234589634, 'AJA987', 'Scheme33, Madras society, karachi', '4111-241684-1', 'mahmud123'),
(14, 'Insane', 'insane123@gmail.com', 3456843216948, 'AFK GH 123', 'Waterpump, karachi', '42010-1235-156', 'qwerty123'),
(15, 'Moiz', 'moiz123@gmail.com', 3212131311, 'CDG 321', 'Anda mor, karachi', '43213-123123-123', 'qwerty123'),
(18, 'waqar', 'waqar@mail.com', 354646464, 'KGG 021', 'Sector 1, Karachi', '454587-42354321', 'asd123qwe'),
(19, 'Haris', 'haris.bob@mail.com', 3548798989, 'KKG 123', 'Waterpump, karachi', '42587989893', 'mahmud123'),
(20, 'habib', 'habib@mail.com', 123456789, 'hbb123', 'hasd', '456789123', 'insane');

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

--
-- Dumping data for table `truck_transaction_annex`
--

INSERT INTO `truck_transaction_annex` (`Id`, `TC_Id`, `Date`, `Amount`, `Credit_Amount`, `Annex`) VALUES
(19, 19, '2020-12-02', '22000', 'Debit annex', 'etruck5fc7ca2276ba48.70953286.jpg'),
(20, 3, '2020-12-16', '48000', 'Debit annex', 'etruck5fd8a5b668a078.07456686.jpg'),
(21, 24, '2020-12-15', '65000', 'Debit annex', 'etruck5fd8a861e6d126.86965603.jpg'),
(23, 19, '2020-12-23', 'Credit annex', '2500', 'etruck5fe38fe5374f39.55610529.jpg'),
(24, 34, '2021-02-03', '25000', 'Debit annex', 'etruck601abe8a140ae7.83730675.jpg'),
(25, 6, '2021-02-21', '24000', 'Debit annex', 'etruck60321fe9a92eb4.77925175.jpg'),
(26, 35, '2021-03-15', '100000', 'Debit annex', 'etruck604f4149046205.71153759.jpg'),
(27, 6, '2021-03-19', '2000', 'Debit annex', 'etruck60546768675e24.88224651.jpg');

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
(1, 'Freak', 'freak123@gmail.com', 'freakhere123', 1, 'superadmin'),
(5, 'petrolstation', 'total@gmail.com', 'total123', 4, '123120'),
(7, 'venom', 'venom@gmail.com', 'venom', 3, '12313'),
(24, 'Mahmud', 'mahmud123@gmail.com', 'mahmud123', 3, 'mahmud123'),
(27, 'raza', 'raza@gmail.com', 'raza', 3, 'qwerty123'),
(29, 'sami', 'sami@hotmail.com', 'sami', 4, 'joher123'),
(30, 'moiz', 'moiz@mail.com', 'moiz', 4, '12345'),
(32, 'kami', 'kami@gmail.com', 'kami123', 4, 'Kami123'),
(36, 'Md', 'md158@gmail.com', 'asd', 2, 'Petrol-Sub-Admin'),
(57, 'admin', 'iqtada2395@gmail.com', 'asd', 4, 'asd'),
(58, 'newqwe', 'new123@gmail.com', 'new', 4, 'asd'),
(59, 'test', 'test@gmail.com', 'test', 4, 'test1'),
(60, 'sad', 'sad@mail.com', 'sad', 4, 'sad'),
(61, 'truckwala', 'truck@mail.com', 'truck', 2.1, 'Truck-Sub-Admin'),
(63, 'aaa', 'aaa@gmail.com', 'aaa', 3, 'asd'),
(65, 'VICKY', 'VICKY@MAIL.COM', 'ASD', 5, 'vicky123'),
(67, 'BOB', 'bob@mail.com', 'bob', 5, '42402-123123123'),
(69, 'sohail', 'sohail@mail.com', 'asd', 6, '42101-213123123'),
(70, 'hamedani', 'hamedani@mail.com', 'asd', 3, 'asd123qwe'),
(71, 'Ali', 'ali@mail.com', 'asd', 5, '41213-123123-1'),
(72, 'Memon', 'memon@mail.com', 'memon', 4, '123542'),
(73, 'naseer', 'naseerabad@mail.com', 'asd', 4, 'nas123'),
(75, 'khan1', 'khan@mail.com', 'khan', 4, 'asd123'),
(76, 'insane', 'insane@mail.com', 'insane', 3, 'insane'),
(77, 'asd', 'asd@hotmail.com', 'asd', 3, 'asdasd'),
(78, 'sam', 'sam@mail.com', 'sam', 4, 'sam'),
(80, 'truck', 'truck1234@gmail.com', '123', 2.1, 'Truck-Sub-Admin'),
(81, 'fodal', 'zaket@mailinator.com', 'Pa$$w0rd!', 4, 'banil');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `petrol_station_subuser`
--
ALTER TABLE `petrol_station_subuser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ps_transaction_annex_cash`
--
ALTER TABLE `ps_transaction_annex_cash`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ps_transaction_annex_litre`
--
ALTER TABLE `ps_transaction_annex_litre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `ps_transaction_detail`
--
ALTER TABLE `ps_transaction_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token_data`
--
ALTER TABLE `token_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `truck_company`
--
ALTER TABLE `truck_company`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `truck_company_fuel_data`
--
ALTER TABLE `truck_company_fuel_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `truck_company_subuser`
--
ALTER TABLE `truck_company_subuser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `truck_credit_request`
--
ALTER TABLE `truck_credit_request`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `truck_drivers`
--
ALTER TABLE `truck_drivers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `truck_transaction_annex`
--
ALTER TABLE `truck_transaction_annex`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
