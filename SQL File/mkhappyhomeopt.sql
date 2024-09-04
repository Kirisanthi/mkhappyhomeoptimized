-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 05:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkhappyhomeopt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 769234697, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-08-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Email`, `Phone`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(10, 'kirisanthi', 'Majuran', 'kirisanthiselvanajagam@gmail.com', 7452835212, 'test', '2024-08-12 11:18:13', NULL),
(12, 'kirisanthi', 'Majuran', 'kirisanthiselvanajagam@gmail.com', 7452835212, 'Enquiry', '2024-08-18 17:50:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: center;\"><font color=\"#2D6D4E\" face=\"arial, sans-serif\"><b>MK Happy Home!!</b></font></div><div style=\"text-align: left;\"><span style=\"color: rgb(122, 122, 122); font-size: 18px; text-align: justify; font-weight: initial;\">At MK Happy Home, we are dedicated to providing exceptional care and support to the elderly, ensuring they live their golden years with dignity, joy, and peace. Our team of compassionate and skilled caregivers is committed to creating a nurturing environment where seniors feel valued and respected. With a focus on personalized care, we offer a range of services tailored to meet the unique needs of each resident, from daily assistance and medical support to engaging activities and social interaction. At MK Happy Home, we believe that every individual deserves a happy and healthy life, and we strive to make that a reality for all our residents.</span></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '35, Leamington Cres, Harrow. HA2 9HH', 'mkhappyhome@gmail.com', 769234697, NULL, '09:00 am to 6:30 pm'),
(3, 'rules', 'Rules', '<div class=\"wpb_row vc_row-fluid vc_custom_1415091130045\" style=\"box-sizing: inherit; color: rgb(153, 153, 153); font-family: Asap, sans-serif; font-size: 14px;\"><div class=\"vc_col-sm-12 wpb_column column_container\" style=\"box-sizing: inherit;\"><div class=\"wpb_wrapper\" style=\"box-sizing: inherit;\"><div class=\"wpb_text_column wpb_content_element \" style=\"box-sizing: inherit;\"><div class=\"wpb_wrapper\" style=\"box-sizing: inherit;\"><ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5em; margin-left: 1em; list-style-position: initial; list-style-image: initial; padding: 0px;\"><li style=\"text-align: left; box-sizing: inherit;\">Firearms and weapons are not allowed in premises.</li><li style=\"text-align: left; box-sizing: inherit;\">Keeping pets are not allowed in premises .</li><li style=\"text-align: left; box-sizing: inherit;\">Non Vegetarian Food is Prohibited</li><li style=\"text-align: left; box-sizing: inherit;\">All residents shall maintain discipline and ensure that other residents are not disturbed by their any act.</li><li style=\"text-align: left; box-sizing: inherit;\">our minimum lock in period is six month and after six month if discharge require than minimum two month notice require for refund of security.</li></ul></div></div></div></div></div><div class=\"wpb_row vc_row-fluid vc_custom_1415091139991\" style=\"box-sizing: inherit; color: rgb(153, 153, 153); font-family: Asap, sans-serif; font-size: 14px;\"><div class=\"vc_col-sm-12 wpb_column column_container\" style=\"box-sizing: inherit;\"><div class=\"wpb_wrapper\" style=\"box-sizing: inherit;\"><div id=\"section-14-1416982836\" class=\" dt-section-head left size-default\" style=\"box-sizing: inherit;\"><h4 class=\"section-main-title\" style=\"text-align: left; box-sizing: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(47, 163, 173); font-weight: 600; font-size: 18px;\">Rules for Visitors</h4><ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5em; margin-left: 1em; list-style-position: initial; list-style-image: initial; padding: 0px;\"><li style=\"text-align: left; box-sizing: inherit;\">Visiting hours for the guest will be from 10am to 6pm , Only identified guests are allowed inside the home.</li><li style=\"text-align: left; box-sizing: inherit;\">Guests are not allowed to stay overnight in their residentâ€™s without the permission from the management.</li></ul><h3 class=\"section-main-title\" style=\"text-align: left; box-sizing: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(47, 163, 173); font-weight: 600; font-size: 20px;\">In case of Emergency / Mishappening</h3></div><div class=\"wpb_text_column wpb_content_element \" style=\"box-sizing: inherit;\"><div class=\"wpb_wrapper\" style=\"box-sizing: inherit;\"><p align=\"justify\" style=\"text-align: left; box-sizing: inherit; margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">In case of any mishappening or any emergency situation with any resident, the management shall take steps to intimate the relatives/ next of kin immediately. We will also take the necessary steps as per the protocol to control the situation in safe and respected manner.</p></div></div></div></div></div>', NULL, NULL, NULL, ''),
(4, 'Eligibilities and Rules', 'Eligibilities and Rules', '\r\n<h3 style=\"color: #2D6D4E\">Eligibilities</h3>\r\n<ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5em; margin-left: 1em; list-style-position: initial; list-style-image: initial; padding: 0px; color: rgb(153, 153, 153); font-family: Asap, sans-serif; font-size: 14px;\">\r\n<h4>Age Requirements</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Minimum Age:</b>Minimum Age Required is 55 years.</li>\r\n\r\n\r\n\r\n<h4>Health and Medical Needs</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Level of Care Needed:</b> Prospective residents must\r\n typically require the level of care provided by the facility, whether it is assisted living, \r\nskilled nursing, or memory care.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Medical Assessment:</b> Some facilities may require a medical assessment to determine the level of care needed and ensure that the facility can meet those needs.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Chronic Conditions:</b> Residents often have chronic medical conditions that necessitate long-term care.</li>\r\n\r\n\r\n<h4>Financial Considerations</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Payment Ability:</b>Residents must typically have the means to pay for care, either through personal finances, insurance, or government assistance programs.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Insurance Coverage:</b>Eligibility might be influenced by the types of insurance or benefits the individual has, such as Medicare, Medicaid, or long-term care insurance.</li>\r\n\r\n\r\n<h4>Residency and Citizenship</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Geographical Restrictions:</b>Some care homes may have residency requirements, such as being a resident of the state or country where the facility is located.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Citizenship Status:</b>Some facilities may have specific eligibility criteria based on citizenship or legal residency status.</li>\r\n\r\n\r\n</ul>\r\n\r\n\r\n<br>\r\n<h3 style=\"color: #2D6D4E\">Rules</h3>\r\n<ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0.5em; margin-left: 1em; list-style-position: initial; list-style-image: initial; padding: 0px; color: rgb(153, 153, 153); font-family: Asap, sans-serif; font-size: 14px;\">\r\n<h4>General Conduct</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Respectful Behavior:</b>Residents, staff, and visitors must treat each other with respect and dignity at all times.</li>\r\n<li style=\"box-sizing: inherit;\"><b> Physical, verbal, or emotional abuse is strictly prohibited.</li>\r\n\r\n\r\n<h4>Health and Safety</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Medication Management:</b> Medications must be administered by authorized staff, and residents are generally not allowed to keep personal medications without supervision.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Smoking Policies:</b> Smoking is typically restricted to designated areas and may be prohibited entirely within the facility.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Emergency Procedures:</b> Residents and staff must be familiar with emergency exits, fire drills, and other safety protocols.</li>\r\n\r\n\r\n\r\n<h4>Visiting Policies</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Visiting Hours:</b>Visitors must adhere to designated visiting hours to ensure residents have adequate rest and privacy.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Visitor Conduct:</b>Visitors are expected to follow facility rules and respect the privacy and routines of all residents.</li>\r\n\r\n\r\n<h4>Medical and Health Services</h4>\r\n<li style=\"box-sizing: inherit;\"><b>Regular Health Check-ups:</b>Residents must comply with regular health check-ups and medical assessments as required by the facility.</li>\r\n<li style=\"box-sizing: inherit;\"><b>Reporting Health Issues:</b>Any changes in health or well-being should be reported to the staff immediately.</li>\r\n\r\n\r\n\r\n</ul>', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblseniorcitizen`
--

CREATE TABLE `tblseniorcitizen` (
  `ID` int(5) NOT NULL,
  `RegistrationNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `CommunicationAddress` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `EmergencyAddress` mediumtext DEFAULT NULL,
  `EmergencyContactnumber` bigint(10) DEFAULT NULL,
  `AddedBy` varchar(100) DEFAULT NULL,
  `RegitrationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblseniorcitizen`
--

INSERT INTO `tblseniorcitizen` (`ID`, `RegistrationNumber`, `Name`, `DateofBirth`, `ContactNumber`, `CommunicationAddress`, `ProfilePic`, `EmergencyAddress`, `EmergencyContactnumber`, `AddedBy`, `RegitrationDate`) VALUES
(1, 488502765, 'Kirisanthi', '1957-12-29', 7423185902, '49, Leamington cres, Harrow', 'fee6dc18b34886c2a805f1bd925a26d61723484901.jpg', '49, Leamington cres, Harrow.', 7423185902, 'admin', '2024-09-10 12:55:43'),
(2, 588502746, 'Mr.Kailash ', '1955-01-05', 7978798789, 'J&amp;K Block H.No826<div>Laxmi Nagar New Delhi</div>', '4c46b2a6bab3ed69444fc402e47ea5691718311683.jpg', 'J&amp;K Block H.No826<div>Laxmi Nagar New Delhi</div>', 5656565656, 'admin', '2022-05-26 12:58:47'),
(4, 388502761, 'Mr. Harish Sharma', '1966-01-05', 7897979789, 'J-890 Jaslamer', 'ecebbecf28c2692aeb021597fbddb1741653629882.jpg', 'J-890 Jaslamer<br>', 1316545645, 'admin', '2022-05-27 05:38:02'),
(5, 759722058, 'Anuj Kumar', '1969-12-30', 142536485, 'A 122 new Colony New Delhi&nbsp;', '4c46b2a6bab3ed69444fc402e47ea5691718311837.jpg', 'B 1233 ABC Street XYZ Colny New Delhi India', 1234569870, 'admin', '2022-06-05 09:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(5) NOT NULL,
  `ServiceTitle` varchar(250) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `ServiceImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceTitle`, `ServiceDescription`, `CreationDate`, `ServiceImage`) VALUES
(1, 'Medical and Health Services', '<li><strong>Medical Care:</strong> Regular check-ups, medication management, and access to doctors, nurses, and specialists.</li><li><strong>Nursing Care:</strong> 24/7 nursing support for residents with chronic health conditions or those recovering from surgery or illness.</li><li><strong>Rehabilitation Services:</strong> Physical, occupational, and speech therapy to help residents regain or maintain their mobility and independence.</li><li><strong>Palliative and Hospice Care:</strong> Specialized care for residents with serious illnesses or those nearing the end of life, focusing on comfort and quality of life.</li>', '2024-08-02 21:12:22', 'uploads/'),
(2, 'Personal Care Services', '<li><strong>Assistance with Activities of Daily Living (ADLs):</strong> Help with bathing, dressing, grooming, eating, and toileting.</li><li><strong>Mobility Assistance:</strong> Support with moving around the facility, transferring from bed to chair, and using mobility aids.</li>', '2024-08-02 21:13:01', NULL),
(3, 'Housekeeping and Maintenance\r\n', '<li><strong>Cleaning Services:</strong> Regular cleaning of residents\' rooms and common areas. </li><li><strong>Laundry Services:</strong> Washing, drying, and folding of personal clothing and linens.</li><li><strong>Maintenance Services:</strong> Upkeep of the facility, including repairs and safety checks.</li>', '2024-08-02 21:23:56', NULL),
(4, 'Transportation Services\r\n', '<li><strong>Scheduled Transportation:</strong> Rides to medical appointments, shopping trips, and social outings. </li><li><strong>On-demand Transportation:</strong> Transportation for emergencies or unscheduled trips as needed.</li>', '2024-08-02 21:26:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_page_type` (`PageType`);

--
-- Indexes for table `tblseniorcitizen`
--
ALTER TABLE `tblseniorcitizen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblseniorcitizen`
--
ALTER TABLE `tblseniorcitizen`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
