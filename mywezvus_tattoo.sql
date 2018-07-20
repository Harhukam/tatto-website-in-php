-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2018 at 03:37 AM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywezvus_tattoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `about_title` varchar(72) NOT NULL,
  `about_description` varchar(160) NOT NULL,
  `about_heading` varchar(20) NOT NULL,
  `about_text` varchar(1000) NOT NULL,
  `about_photo` varchar(100) NOT NULL,
  `about_vision` varchar(20) NOT NULL,
  `about_vision_text` varchar(1000) NOT NULL,
  `about_mission` varchar(20) NOT NULL,
  `about_mission_text` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `adminID`, `about_title`, `about_description`, `about_heading`, `about_text`, `about_photo`, `about_vision`, `about_vision_text`, `about_mission`, `about_mission_text`) VALUES
(200001, 200001, 'About us', 'Abroad Study Campus is a highly experienced VISA SPECIALIST. Our staff knows the problems faced by students and professionals wanting to migrate abroad.     ', 'About Us ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '91185.png', 'Who we are', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'What we do', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` bigint(20) NOT NULL,
  `booking_name` text NOT NULL,
  `booking_mobile` text NOT NULL,
  `booking_from` text NOT NULL,
  `booking_to` text NOT NULL,
  `booking_adult` text NOT NULL,
  `booking_children` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_name`, `booking_mobile`, `booking_from`, `booking_to`, `booking_adult`, `booking_children`) VALUES
(4, 'harhukam Singh', '9463710716', '05/03/2018', '19/03/2018', '1', '1'),
(5, 'harhukam Singh', '9463710716', '13/03/2018', '22/03/2018', '5', '5'),
(6, '', '', '', '', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `contact_title` varchar(70) NOT NULL,
  `contact_description` varchar(160) NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_photo` mediumtext NOT NULL,
  `contact_companyname` mediumtext NOT NULL,
  `contact_address_title` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_mobile_heading` text NOT NULL,
  `contact_mobile_numbers` text NOT NULL,
  `contact_email_heading` text NOT NULL,
  `contact_email_text` text NOT NULL,
  `contact_hours_heading` text NOT NULL,
  `contact_hours_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `adminID`, `contact_title`, `contact_description`, `contact_heading`, `contact_photo`, `contact_companyname`, `contact_address_title`, `contact_address`, `contact_mobile_heading`, `contact_mobile_numbers`, `contact_email_heading`, `contact_email_text`, `contact_hours_heading`, `contact_hours_text`) VALUES
(200001, 200001, ' none      ', 'blank             ', 'Contact Us', '713098.png', 'Tatto Studio', 'Address :', '1234 Street Name,  <br>\r\n City Name, Country 144106               ', 'Phone :', '+91xxxxxxxxxx            ', 'Email :', 'info@xyz.com', 'Timming', ' 10:00am to 5:30pm                         ');

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE `cover` (
  `cover_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `cover1` text NOT NULL,
  `cover2` text NOT NULL,
  `cover3` text NOT NULL,
  `cover_txt1` text NOT NULL,
  `cover_txt2` text NOT NULL,
  `cover_txt3` text NOT NULL,
  `cover_txt4` text NOT NULL,
  `cover_txt5` text NOT NULL,
  `cover_txt6` text NOT NULL,
  `cover_txt7` text NOT NULL,
  `cover_txt8` text NOT NULL,
  `cover_txt9` text NOT NULL,
  `cover_txt10` text NOT NULL,
  `cover_txt11` text NOT NULL,
  `cover_txt12` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`cover_id`, `adminID`, `cover1`, `cover2`, `cover3`, `cover_txt1`, `cover_txt2`, `cover_txt3`, `cover_txt4`, `cover_txt5`, `cover_txt6`, `cover_txt7`, `cover_txt8`, `cover_txt9`, `cover_txt10`, `cover_txt11`, `cover_txt12`) VALUES
(200001, 200001, '499058.png', '149625.png', '334661.png', '1', '2', '3', '4', '1', '2', '3', '4', '1', '2', '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `feature_cover`
--

CREATE TABLE `feature_cover` (
  `feature_cover_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `feature_cover1` text NOT NULL,
  `feature_cover2` text NOT NULL,
  `feature_cover3` text NOT NULL,
  `feature_cover4` text NOT NULL,
  `feature_cover_txt1` text NOT NULL,
  `feature_cover_txt2` text NOT NULL,
  `feature_cover_txt3` text NOT NULL,
  `feature_cover_txt4` text NOT NULL,
  `feature_cover_txt5` text NOT NULL,
  `feature_cover_txt6` text NOT NULL,
  `feature_cover_txt7` text NOT NULL,
  `feature_cover_txt8` text NOT NULL,
  `feature_cover_txt9` text NOT NULL,
  `feature_cover_txt10` text NOT NULL,
  `feature_cover_txt11` text NOT NULL,
  `feature_cover_txt12` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature_cover`
--

INSERT INTO `feature_cover` (`feature_cover_id`, `adminID`, `feature_cover1`, `feature_cover2`, `feature_cover3`, `feature_cover4`, `feature_cover_txt1`, `feature_cover_txt2`, `feature_cover_txt3`, `feature_cover_txt4`, `feature_cover_txt5`, `feature_cover_txt6`, `feature_cover_txt7`, `feature_cover_txt8`, `feature_cover_txt9`, `feature_cover_txt10`, `feature_cover_txt11`, `feature_cover_txt12`) VALUES
(200001, 200001, '688161.jpg', '904133.jpg', '80663.jpg', '98305.png', '1', '2', '', '', '1', '2', '', '', '1', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `footer_id` int(11) NOT NULL,
  `footer_dynamic` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`footer_id`, `footer_dynamic`) VALUES
(200001, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `google_map`
--

CREATE TABLE `google_map` (
  `map_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `googlemap` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_map`
--

INSERT INTO `google_map` (`map_id`, `adminID`, `googlemap`) VALUES
(200001, 200001, ' <iframe src=\"https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d108907.9366791713!2d75.69610100514362!3d31.458923442089436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!3e6!4m0!4m4!1s0x391af92bff96f6bb%3A0x3119d9ac6333be0d!3m2!1d31.4589425!2d75.76614119999999!5e0!3m2!1sen!2sin!4v1519653184582\" width=\"100%\" height=\"555\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `head_dynamic`
--

CREATE TABLE `head_dynamic` (
  `head_id` int(11) NOT NULL,
  `head_dynamic` varchar(8000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_dynamic`
--

INSERT INTO `head_dynamic` (`head_id`, `head_dynamic`) VALUES
(200001, ' <meta name=\"distribution\" content=\"global\" />\r\n  <meta name=\"rating\" content=\"General\" />\r\n  <meta name=\"language\" content=\"En\" />\r\n  <meta name=\"robots\" content=\"all\" />\r\n  <meta name=\"revisit-after\" content=\"3 days\">');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `home_title` varchar(72) NOT NULL,
  `home_description` varchar(180) NOT NULL,
  `home_keywords` varchar(180) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `adminID`, `home_title`, `home_description`, `home_keywords`) VALUES
(200001, 200001, ' Tattoo making Services | India', ' what do you want to write here? gfhdfhfhfhfghfghfghfghfghfghfghfghfg hfghfghfhfhfhfg fh fghfhf fgh fghfgh fgh fg hfgh fgfg f fh fhf fhfhfghfgh  fgh fg hfgfghf', 'tattoo, tattoo studio');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `logo_pic` varchar(45) NOT NULL,
  `logo_alt` varchar(25) NOT NULL,
  `logo_sitename` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `adminID`, `logo_pic`, `logo_alt`, `logo_sitename`) VALUES
(200001, 200001, '521901.png', 'xxx', 'index.php');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `navbar_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `navbar_cat` mediumtext NOT NULL,
  `navbar_name` mediumtext NOT NULL,
  `navbar_url` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`navbar_id`, `adminID`, `navbar_cat`, `navbar_name`, `navbar_url`) VALUES
(52, 200001, 'navbar', 'Home', 'index.php'),
(53, 200001, 'navbar', 'Services', 'index.php#tr-service'),
(54, 200001, 'navbar', 'Contact Us', 'index.php#tr-contact');

-- --------------------------------------------------------

--
-- Table structure for table `photo_slider_section`
--

CREATE TABLE `photo_slider_section` (
  `ps_id` int(11) NOT NULL,
  `ps_txt1` text NOT NULL,
  `ps_txt2` text NOT NULL,
  `ps_txt3` text NOT NULL,
  `ps_txt4` text NOT NULL,
  `ps_txt5` text NOT NULL,
  `ps_txt6` text NOT NULL,
  `ps_txt7` text NOT NULL,
  `ps_txt8` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_slider_section`
--

INSERT INTO `photo_slider_section` (`ps_id`, `ps_txt1`, `ps_txt2`, `ps_txt3`, `ps_txt4`, `ps_txt5`, `ps_txt6`, `ps_txt7`, `ps_txt8`) VALUES
(200001, 'PORTFOLIO', 'RECENTLY ', 'WORK ', 'TATTOO SHOTS.', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` bigint(20) NOT NULL,
  `post_cat` varchar(100) NOT NULL,
  `post_title` text NOT NULL,
  `post_permalink` mediumtext NOT NULL,
  `post_pic` varchar(500) NOT NULL,
  `post_txt` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_cat`, `post_title`, `post_permalink`, `post_pic`, `post_txt`, `post_date`, `post_author`) VALUES
(9, 'services', 'Degital Photography', 'degital-photography', 'degital-photography.png', '<p>&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit<br></p>', '2018-07-07 13:33:40', 'Rebory'),
(10, 'best4portfolio', 'Portfolio 1', 'portfolio-1', 'portfolio-1.jpg', '  <p>test</p>', '2018-07-07 18:41:09', 'Rebory'),
(12, 'best4portfolio', 'Portfolio 2', 'portfolio-2', 'portfolio-2.jpg', '<p>rgeg</p>', '2018-07-07 18:41:42', 'Rebory'),
(13, 'best4portfolio', 'Portfolio 4', 'portfolio-4', 'portfolio-4.jpg', '<p>Portfolio 4<br></p>', '2018-07-10 19:09:21', 'Rebory'),
(15, 'best4portfolio', 'Portfolio 3', 'portfolio-3', 'portfolio-3.jpg', '<p>Portfolio 3<br></p>', '2018-07-10 19:13:06', 'Rebory');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_cat_id`, `cat_name`) VALUES
(19, 'services'),
(20, 'timeline'),
(21, 'best4portfolio');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `services_title` varchar(60) NOT NULL,
  `services_description` varchar(160) NOT NULL,
  `services_heading` varchar(30) NOT NULL,
  `services_post_photo` varchar(200) NOT NULL,
  `services_post_heading` varchar(60) NOT NULL,
  `services_post_text` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `adminID`, `services_title`, `services_description`, `services_heading`, `services_post_photo`, `services_post_heading`, `services_post_text`) VALUES
(4, 200001, 'title of services', ' description  ', 'services', '100880.png', 'hdgshdgfhsgdh', 'xczxhcxh');

-- --------------------------------------------------------

--
-- Table structure for table `services_txt`
--

CREATE TABLE `services_txt` (
  `services_txt_id` bigint(20) NOT NULL,
  `adminID` int(11) NOT NULL,
  `service_txt1` text NOT NULL,
  `service_txt2` text NOT NULL,
  `service_txt3` text NOT NULL,
  `service_txt4` text NOT NULL,
  `service_txt5` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_txt`
--

INSERT INTO `services_txt` (`services_txt_id`, `adminID`, `service_txt1`, `service_txt2`, `service_txt3`, `service_txt4`, `service_txt5`) VALUES
(200001, 200001, 'Our Services', 'Get', 'Experience', 'With our Service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE `sidebar` (
  `sidebar_id` int(11) NOT NULL,
  `sidebar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`sidebar_id`, `sidebar`) VALUES
(200001, '  ');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `slide1` text NOT NULL,
  `slide2` text NOT NULL,
  `slide3` text NOT NULL,
  `slider_txt1` mediumtext NOT NULL,
  `slider_txt2` text NOT NULL,
  `slider_txt3` text NOT NULL,
  `slider_txt4` mediumtext NOT NULL,
  `slider_txt5` text NOT NULL,
  `slider_txt6` text NOT NULL,
  `slider_txt7` text NOT NULL,
  `slider_txt8` text NOT NULL,
  `slider_txt9` text NOT NULL,
  `slider_txt10` text NOT NULL,
  `slider_txt11` text NOT NULL,
  `slider_txt12` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `adminID`, `slide1`, `slide2`, `slide3`, `slider_txt1`, `slider_txt2`, `slider_txt3`, `slider_txt4`, `slider_txt5`, `slider_txt6`, `slider_txt7`, `slider_txt8`, `slider_txt9`, `slider_txt10`, `slider_txt11`, `slider_txt12`) VALUES
(200001, 200001, '705103.jpg', '667744.jpg', '136345.jpg', 'Creative Design', 'Learn More About Us ', 'Watch Video', 'https://www.youtube.com/watch?v=FLHgpmn6eYI', 'Hello! I am', '  Jimmy', 'Learn More About Us', '', 'OPENING UP A WORLD', 'CREATIVE DIGITAL AGENCY', 'Learn More About Us', 'https://www.youtube.com/watch?v=FLHgpmn6eYI');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` bigint(20) NOT NULL,
  `adminID` int(11) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `youtube` varchar(50) NOT NULL,
  `google` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `adminID`, `facebook`, `instagram`, `twitter`, `youtube`, `google`) VALUES
(200001, 200001, 'https://www.facebook.com/artistrandeepsinghgill', 'https://www.instagram.com/artistrandeepsinghgill', '#', 'https://www.youtube.com/user/artistgill/', '#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPass` varchar(100) NOT NULL,
  `adminStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `adminPhoto` varchar(200) DEFAULT NULL,
  `adminJoiningDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminPass`, `adminStatus`, `tokenCode`, `adminPhoto`, `adminJoiningDate`) VALUES
(200001, 'Rebory Sgh', 'harhukams@gmail.com', '69a829ce4f4e0d631ca634a866590a60', 'Y', '7d0e49aeceb6ed0a90f43e85ae79718c', '619967.png', '2018-06-25 06:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tour_id` bigint(11) NOT NULL,
  `tour_type` mediumtext NOT NULL,
  `tour_name` mediumtext NOT NULL,
  `tour_price` text NOT NULL,
  `tour_description` longtext NOT NULL,
  `tour_start_date` varchar(50) NOT NULL,
  `tour_end_date` varchar(50) NOT NULL,
  `tour_photo` mediumtext NOT NULL,
  `tour_hotel_star` text NOT NULL,
  `tour_map` longtext NOT NULL,
  `tour_status` varchar(100) NOT NULL,
  `tour_url` longtext NOT NULL,
  `tour_discount` mediumtext NOT NULL,
  `tour_post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `tour_type`, `tour_name`, `tour_price`, `tour_description`, `tour_start_date`, `tour_end_date`, `tour_photo`, `tour_hotel_star`, `tour_map`, `tour_status`, `tour_url`, `tour_discount`, `tour_post_date`) VALUES
(9, 'tour', 'new tour jalandhar', '2000/-', 'thisÂ  is tour body', '07/03/2018', '08/03/2018', 'new-tour-jalandhar.jpg', '4star.png', 'no map found', 'Active', 'new-tour-jalandhar', '10 % OFF', '2018-03-05 05:05:49'),
(10, 'tour', 'tour package 2', '6000/-', '<div style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>', '06/03/2018', '05/03/2018', 'tour-package-2.jpg', '3star.png', 'no', 'Active', 'tour-package-2', '12% OFF', '2018-03-05 09:28:14'),
(11, 'tour', 'tour package 3', '10000/-', '<div style=\"text-align: justify;\"><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 1</strong>Â â€“ Let The Adventure Begin! (Drive from Pathankot to Dalhousie- 85 km/approx. 3 hours)</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">In the morning, start on your journey to the picturesque hills of Dalhousie. Located in Himachal Pradesh, this ensnaring hill station, is named after a British Viceroy called Lord Dalhousie and boasts of an amazing old world charm that includes colonial architecture and old churches. Positioned across five hills (Potreys, Tehra, Kathlog, Bakrota, and Balun) Dalhousie is located at an elevation of 2036 m above sea level. Dotted with snow-capped mountain peaks, groves of pines, deodars and Oaks, the town serves as a gateway to the ancient Chamba Hill, now Chamba district, known for its ancient Hindu culture and temples.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">After reaching Dalhousie, check-in to your hotel and relax for a while. Later you can venture out to enjoy the scenic locales and also explore the local markets.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Treat yourself to some wholesome food at one of the local eateries and return to the hotel for a good sleep.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 2</strong>Â â€“ Letâ€™s Look Around (Sightseeing in Dalhousie)</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Today is your date with Dalhousie as you venture out for a full day sightseeing tour.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">We begin with a visit to Panchpula. Home to many water springs, itâ€™s best known for Satdhara, a spring believed to contain medicinal and healing properties. Also, get to see a monument built in memory of freedom fighter Sardar Ajit Singh.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Your stint with history continues as you visit Subhash Baoli, a place built in memory of Subhash Chandra Bose who spent some time here in 1937. A popular picnic spot, the Baoli offers enchanting views of snow capped hills and towering trees. Soak in all the beauty at this spot that offers comfortable seating.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Later, pay homage at the Bhulwani Mata Temple at Bara Pathar. Last, witness the stunning view of snow-capped peaks at Bakrota Hills, situated at the height of 2085 m above sea level. This day ends with your return to the hotel to get a good nightâ€™s sleep.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 3</strong>Â â€“ A Date with Dalhousie (Dalhousie)</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Today, you have the opportunity to explore Dalhousie as you like. Spend your day at leisure at the hotel or visit some the tourist spots that enthralled you the most the previous day.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Overnight stay at the hotel.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 4</strong>Â â€“ Drive from Dalhousie to Dharamshala (120 km/approx. 4 hours)</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">In the morning, start your road journey to Dharamshala.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Surrounded by dense pine trees, deodar forests, numerous streams, Dharamshala is situated in the Dhauladhar ranges of Himalayas.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">As you reach Dharamshala, you check into your hotel room and spend the evening at leisure in the company of your loved ones. Overnight stay in Dharamshala.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 5</strong>Â â€“ Exploring Dharamshala (Sightseeing in Dharamshala)</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">A sightseeing tour of Dharamshala awaits you this morning. Enjoy its colorful temples and gompas, the Kangra Museum, Dal Lake, St. Johnâ€™s Church among other attractions.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Dedicated to Lord Elgin, Viceroy of India during the 19th century, St Johnâ€™s Church is built in the neo-Gothic style and surrounded by pine, fir and deodar trees.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Visit the Tibetan Medical Centre located in Kangra and learn about the traditional system of Tibet for preparing medicinal pills. At Kangra, you can also visit the Art Museum where artifacts that belong to the 5th century are showcased.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">After exploring Dharamshala, return to the hotel and relax. Enjoy your evening at leisure and stay overnight at the hotel.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 6</strong>Â â€“ Hello, Shimla! (Drive from Dharamshala to Shimla- 210 km/approx. 5 hours)</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">In the morning, check-out from the hotel and drive to Shimla.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">The capital of Himachal Pradesh, Shimla is known as the Queen of Hills. Shimla, a beautiful hill resort in Himachal Pradesh, was treated as a summer capital during the British regime and boasts of colonial architectural, serpentine streets and beautiful hills.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Once you reach Shimla, check-in at the hotel and spend the rest of the evening in leisure activities. You can either hang out at the mall road and indulge in some retail therapy or you can go for some sightseeing to explore places like Jakhoo Temple, Kali Bari Temple and Himachal Museum and Library.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">The night is spent in the comforts of your room at the hotel in Shimla.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 7</strong>Â â€“ Sightseeing in Shimla</p><p style=\"margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; text-align: left; font-size: 1.1em; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">This day is booked for a fun sightseeing tour of Shimla. Alternatively, you can undertake an excursion to Kufri, a breathtaking hill station at a distance of about 16 km from Shimla.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Kufri, located at the foothills of Himalayas attracts numerous tourists round the year. In the winter months, most adventure enthusiasts head to this to indulge in adventure activities including trekking, skiing, and trekking among others. You can also hike (or hire a mule) to climb the Mahasu Peak- the highest point in Kufri. Offering panoramic (and spectacular) view of the Himalayan mountain ranges like Badrinath and Kedarnath, this place is a delight for any visitor.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">After this, come back to the hotel in the afternoon and relax for a while. In the evening, you can step out to enjoy the mall road, lined with numerous restaurants and shops selling traditional items and wooded crafts.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1.1em;\">Thereafter, return to the hotel and for a good nightâ€™s sleep.</span></div></p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><strong>DAY 8</strong>Â â€“ Home Calling (Drive from Shimla to Pathankot- 341 km/approx. 8 hours)</p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\">In the morning, embark on a road journey to Pathankot to return home with a bag full of memories.</p><p style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><br></p><h3 style=\"text-align: justify; margin-bottom: 10px; line-height: 1.8em; letter-spacing: 1px; font-size: 1.1em; color: rgb(51, 51, 51);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><span style=\"font-weight: bold;\">Package Inclusive</span></h3><div><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">Welcome drink on arrival.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">Parking and Toll tax.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">Meet & greet on arrival.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">07 Breakfast & 07 Dinners.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">Pick and Drop at time of arrival/departure.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">Driverâ€™s allowance, Road tax and Fuel charges.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">Sightseeing by private car.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">All hotel and transport taxes & Driver Allowances.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">All transfers and sightseeing by personal car.</span><br style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\"><span style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15.4px;=\"\" letter-spacing:=\"\" 1px;=\"\" text-align:=\"\" left;\"=\"\">07 Nights Accommodation on double sharing basis.</span><span style=\"font-weight: bold;\"><br></span></div></div>', '05/03/2018', '13/03/2018', 'tour-package-3.jpg', '4star.png', 'no', 'Active', 'tour-package-3', '15% off', '2018-03-05 16:22:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`cover_id`);

--
-- Indexes for table `feature_cover`
--
ALTER TABLE `feature_cover`
  ADD PRIMARY KEY (`feature_cover_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `google_map`
--
ALTER TABLE `google_map`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `head_dynamic`
--
ALTER TABLE `head_dynamic`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`navbar_id`);

--
-- Indexes for table `photo_slider_section`
--
ALTER TABLE `photo_slider_section`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_cat_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `services_txt`
--
ALTER TABLE `services_txt`
  ADD PRIMARY KEY (`services_txt_id`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`sidebar_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `cover`
--
ALTER TABLE `cover`
  MODIFY `cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `feature_cover`
--
ALTER TABLE `feature_cover`
  MODIFY `feature_cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `google_map`
--
ALTER TABLE `google_map`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `head_dynamic`
--
ALTER TABLE `head_dynamic`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `navbar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `photo_slider_section`
--
ALTER TABLE `photo_slider_section`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201807100000014;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services_txt`
--
ALTER TABLE `services_txt`
  MODIFY `services_txt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200002;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
