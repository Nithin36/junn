-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2019 at 07:17 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `junai7pe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `status` int(10) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `photo`, `status`, `num`) VALUES
(3, 'Euphoria', '', 0, 2),
(4, 'Burberry', '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `num`) VALUES
(32, 'Spray', 0, 2),
(35, 'New Products', 0, 1),
(39, 'Oil', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) NOT NULL,
  `name` varchar(400) NOT NULL,
  `address` text NOT NULL,
  `mobno` varchar(200) NOT NULL,
  `telno` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `faxno` varchar(30) NOT NULL,
  `num` int(11) NOT NULL,
  `website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `address`, `mobno`, `telno`, `email`, `faxno`, `num`, `website`) VALUES
(1, 'Junaid Perfumes', '\n\nTharayil Building,\nOpp Arogyalayam Hospital,\nNear Aluva Metro Station,\nBypass Junction,Aluva, \nErnamkulam,\nKerala, \nIndia.\n\n', ' 91 9744528791', ' 91 484 4853040', 'info@junaidperfumes.in', '', 1, 'www.junaidperfumes.in');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'www');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fname` varchar(400) NOT NULL,
  `lname` varchar(400) NOT NULL,
  `address` text NOT NULL,
  `mobno` varchar(200) NOT NULL,
  `email` varchar(70) NOT NULL,
  `daddress` text NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `location` varchar(60) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `password2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `address`, `mobno`, `email`, `daddress`, `country`, `city`, `location`, `pincode`, `password`, `password2`) VALUES
(5, 'nithin', 'pankaj', 'werewr', '9526100636', 'pnithin36@gmail.com', '0', 'india', 'kochi', 'kochi', '45634563', 'e10adc3949ba59abbe56e057f20f883e', 'MTIzNDU2'),
(6, 'Nithin', 'pankaj', 'dsfsd', '9526100636', 'pnithin36@gmail.com', '0', 'India', 'Kochi', 'Kochi', '689508', 'e10adc3949ba59abbe56e057f20f883e', 'MTIzNDU2'),
(7, 'Remya', 'S', 'test', '9495476750', 'operations@solutionsinfoway.com', '0', 'india', 'thiruvalla', 'thiruvalla', '689`101', 'bbc142c9089941c7bfee3eb3eb51466e', 'anVuYWlkMTIz'),
(8, 'gdrf', 'fdsf', 'fesdf', '35435', 'nithin@solutionsinfoway.com', '0', 'fdsf', 'dfds', 'fes', '34324523', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'NDU2NDU2'),
(9, 'Rajesh', 'KR', 'Kurumampuzha\nAkkarapuram\nKurichikara', '9744528791', 'krr542@gmil.com', '0', 'India', 'Thrissur', 'Thrissur', '680028', '25d55ad283aa400af464c76d713c07ad', 'MTIzNDU2Nzg='),
(10, 'A', 'B', 'asdfgherty', '9539416974', 'abey.daniel@fragrancia.co.in', '0', 'india', 'kottayam', 'town', '0000', 'e9ea90857363708afc42938a00719e76', 'MTIzNDVA'),
(11, 'Rajesh', 'Raghavan', 'Kurumampuzha \nAkkarapuram \nKurichikkara', '9744528791', 'seena.trade@gmail.com', '0', 'India', 'Thrissur', 'Thrissur', '680028', '25d55ad283aa400af464c76d713c07ad', 'MTIzNDU2Nzg='),
(12, 'niithin', 'pankaj', 'Aswathy', '43543563453', 'admin@sohmi.in', '0', 'India', 'Shasthamangalamftttyyyttyt', 'Trivandrum', '695001', '9e178bc2bad446bc7d407b6d350657f7', 'bml0aGlu');

-- --------------------------------------------------------

--
-- Table structure for table `customerdelivery`
--

CREATE TABLE `customerdelivery` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `mobno` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `cusid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerdelivery`
--

INSERT INTO `customerdelivery` (`id`, `country`, `city`, `location`, `mobno`, `email`, `pincode`, `address`, `cusid`) VALUES
(20, 'india', 'kochi', 'kochi', '9526100636', 'pnithin36@gmail.com', '45634563', 'werewr', 5),
(19, 'India', 'Thrissur', 'Thrissur', '9744528791', 'seena.trade@gmail.com', '680028', 'Kurumampuzha \nAkkarapuram \nKurichikkara', 11),
(18, 'india', 'kottayam', 'town', '9539416974', 'abey.daniel@fragrancia.co.in', '0000', 'asdfgherty', 10),
(21, 'India', 'Shasthamangalamftttyyyttyt', 'Trivandrum', '43543563453', 'admin@sohmi.in', '695001', 'Aswathy', 12);

-- --------------------------------------------------------

--
-- Table structure for table `forgot`
--

CREATE TABLE `forgot` (
  `id` int(9) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgot`
--

INSERT INTO `forgot` (`id`, `email`) VALUES
(1, 'info@copaxsolutions.com');

-- --------------------------------------------------------

--
-- Table structure for table `fragrance`
--

CREATE TABLE `fragrance` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fragrance`
--

INSERT INTO `fragrance` (`id`, `name`, `num`) VALUES
(33, 'Oriental', 0),
(34, 'Western', 0),
(40, 'Arabic', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `news` int(11) NOT NULL,
  `photo` text NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homemenu`
--

CREATE TABLE `homemenu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title1` varchar(50) NOT NULL,
  `title2` text NOT NULL,
  `description` text NOT NULL,
  `readmore` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homemenu`
--

INSERT INTO `homemenu` (`id`, `name`, `title1`, `title2`, `description`, `readmore`) VALUES
(1, 'home', 'Welcome Junaid Perfumes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit a et, c', 'Junaid Perfumes Initially drawn by the attraction of Bahrains flourishing pearl industry, the founder of the company, Syed Junaid Alam discovered a treasure of traditional natural oils and production of some of the finest perfumes, oils, incense, accessories & selections of Oudh wood from different parts of Asia. And by 1910, he started his dealings in essential oils and traditional fragrances. Thus, was born Syed Junaid Alam W.L.L.<br /><br /><br />\r\nWhat began as a family-run business almost a century ago, soon transformed into a prosperous and booming business enterprise. The name Junaid has become synonymous with refined excellence and good taste. Passed on from one generation to the next, the company has continued to expand, adopting modern techniques and technologies, while remaining true to its rich traditions and values. In other words, Junaid has been successfully enchanting the senses and captivating the minds of its patrons.', 'http://sways.in/demo/junaid/index.php/page/page/8QQA6hR4LStmHqplLp3mc7yTwtj-iD9EM9ovsRtKTxQ');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `con_id`) VALUES
(1, 'rttt', 0),
(2, 'eeee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locationmap`
--

CREATE TABLE `locationmap` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` text NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationmap`
--

INSERT INTO `locationmap` (`id`, `name`, `code`, `num`) VALUES
(1, 'Junaid Perfumes', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3927.86244283043!2d76.3485371!3d10.1103439!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080f2635fea6ed%3A0x8c8c7500de3da677!2sJunaid+Perfumes!5e0!3m2!1sen!2sin!4v1515513026314', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(200) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `status` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `name`, `email`, `password`, `password2`, `usertype`, `img`, `status`) VALUES
(2, 'admin', 'admin', 'admin', 'f24282445b1e39bde289c254e538d813', 'YWRtaW5uMzY=', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `child` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `child`, `num`) VALUES
(15, 'About Us', '<p style=\"text-align:justify\">&quot; Junaid Perfumes, India is a Franchisee of Junaid Perfumes, Bahrain owned by M/s Syed Junaid Alam W.L.L&quot;. Copax Solutions Pvt Ltd is an emerging business group in India having diversified business in various sectors with special care and focus on cosmetics &amp; perfumes products. Copax Solutions is the exclusive agent/franchisee of Junaid Perfumes. The first outlet in India has been opened on November 20. 2017 at Aluva City, 10 Kms away from Cochin International Airport, Please visit our website&nbsp;www.junaidperfumes.in&nbsp;for more information about the products and online store purchases.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nInitially drawn by the attraction of Bahrain&#39;s flourishing pearl industry, the founder of the company, Syed Junaid Alam discovered a treasure of traditional natural oils and production of some of the finest perfumes , oils, incense, accessories &amp; selection of Oudh wood from different parts of Asia. And by 1910 , he started his dealing in essential oils and traditional fragrances. Thus was born Syed Junaid Alam W.L.L.</p>\r\n\r\n<p style=\"text-align:justify\">Passed on from one generation to the next, the company has continued to expand, adopting modern techniques and technologies, while remaining true to its rich traditions and values. Junaid boasts an assorted collection of popular traditional Arabic fragrances and oils. its product line, nevertheless, is not restricted and is constantly being enhanced with new products, reflecting and catering to the changing tastes and desires of its ever-growing clientele.</p>\r\n\r\n<p style=\"text-align:justify\">Over the years, innovative thinking and profound creativity have enabled the company to achieve competitive advantage in the dynamic fragrance industry.Junaid&#39;s product line has come to be associated with high quality, building an unrivaled reputation. Today, Junaid Perfumes is a market leader, proud of the highest international standards it conforms to, confident in its capabilities and highly optimistic about the future.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n&nbsp;</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `child` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `child`, `num`, `image`) VALUES
(7, 'First Outlet', '', 0, 1, '1fd358d27aa59014fc72d09bb123203f.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `mobno` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cusid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `courierno` varchar(100) NOT NULL,
  `trackid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `ohdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ordersstatus`
--

CREATE TABLE `ordersstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordersstatus`
--

INSERT INTO `ordersstatus` (`id`, `name`, `num`) VALUES
(1, 'processing', 1),
(2, 'dispatched', 2),
(3, 'cancelled', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `usertype` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `fragrance` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price` int(30) NOT NULL,
  `howtouse` text NOT NULL,
  `ingredients` text NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `usertype`, `brand`, `fragrance`, `quantity`, `price`, `howtouse`, `ingredients`, `description`, `photo`, `status`, `num`, `addeddate`) VALUES
(83, 'NAWAEM SPRAY', 53, 0, 33, 0, 0, '', '', '<p>A fresh new feel with the beautiful Nawaem &ndash; a distinctive concept incorporating a haven of alluring Arabian and western notes.<br />\r\nThis creative blend of extraordinary fresh and floral notes is inviting, soft and sensual. Opening on a cascade of lotus blossom and luscious pear, this fragrance cascades into a stream of floral jasmine and delicate tube rose ending on a bed of lingering sandalwood and earthy musk.<br />\r\nBrought to life in its delicate droplet-shaped bottle, the exotic Nawaem is truly an explosion of delightful scents that will overwhelm your spirit with sensual femininity.</p>\r\n\r\n<p>Strength &nbsp; &nbsp; &nbsp;Oil Concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown<br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lotus Blossom /Pear<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; Jasmine / Tube Rose<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sandal / Musk</p>\r\n', '584db01278c790606d3cab5733dea039.jpg', 1, 3, '2017-12-11 08:26:23'),
(84, 'THULOOJ', 53, 0, 34, 0, 0, '', '', '<p>THULOOJ &ldquo;Luminously Tropical with Thulooj&rdquo;<br />\r\nGet the fresh feel this spring with the all-new Thulooj from Junaid Perfumes. With the freshness of pineapple and tropical fruits, the inviting Thulooj for women flows into a floral valley of jasmine and lily of the valley settling on the smooth intensity of white musk. Thulooj is presented in a milky white bottle that is reminiscent of the soft feel of snow.</p>\r\n\r\n<p>Strength &nbsp; &nbsp;Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top<br />\r\nHeart<br />\r\nBase</p>\r\n', '9edf65a8210e79e3b8d81241948f90f0.jpg', 1, 4, '2017-12-11 08:35:25'),
(85, 'HAJAR', 52, 0, 33, 0, 0, '', '', '<p style=\"text-align:justify\">Depicting a robust personality, the masculine Hajar is a fine scent that captures the essence of traditional Arabia. This sophisticated fragrance opens on a citrusy top note of mandarin and lemon and trails into a spicy and prominent heart of cardamom. The bold fragrance intensifies on the base impressions of sandalwood and pure Oud oil.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Breakdown</strong><br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Madarin / Lemon<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cardamom<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sandal / Dahn Oud</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Strength</strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;Oil concentrates 16% Ethyl 84%</p>\r\n', '094440f4db98d94cc557cf341161a7f6.jpg', 1, 6, '2017-12-11 08:50:18'),
(86, 'BANAFSAJ AQUAFINE SPRAY', 53, 0, 34, 0, 0, '', '', '<p style=\"text-align:justify\">Banafsaj &ldquo;beauty in full bloom&rdquo; Blossom in the freshness of light summer breeze with the tantalizing Banafsaj &ndash; the fragrance that embodies buoyant individuality and grace. A magical blend of rose and jasmine with succulent notes of amber and musk makes Banafsaj a dazzling spring bouquet that every woman of today desires. Elegant and stylish, Banafsaj is encased in an elongated stem-shaped bottle befitted with a crown of a blooming violet.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p><strong>Breakdown</strong><br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Rose<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Jasmine /&nbsp;Rose<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Amber (sweet woody note) / Musk</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&nbsp;</h2>\r\n', 'cdcfaf2e7d0fc0e8bc7eb3e314e33c81.jpg', 1, 6, '2017-12-11 09:00:01'),
(87, 'BADIAH GOLD', 53, 0, 33, 0, 0, '', '', '<p>Badiah Gold&hellip; Classy and extraordinary</p>\r\n\r\n<p>Badiah Gold was inspired by the golden Arabian traditions and heritage which greatly suits the classy and chic lady; it embodies the astonishing appreciation for the luxurious, emotional and memorable qualities of elegance and sophistication. This oriental perfume opens up with a fresh fruity note, leading to a rich odor of the attractive rosy scents leaving you in a bed of authentic Oudy fragrance to enjoy this magnificent ambiance.</p>\r\n\r\n<p>Strength Oil Concentrates 16% Ethyl 84%&nbsp;</p>\r\n\r\n<p>Breakdown<br />\r\nTop &nbsp; &nbsp; Fruity<br />\r\nHeart &nbsp; Rosy<br />\r\nBase &nbsp; &nbsp;Oudy</p>\r\n', '32398fd93ef502dff1cfc6164e2aeb74.jpg', 1, 1, '2017-12-12 12:09:17'),
(88, 'TAARIIKH GOLD', 53, 0, 34, 0, 0, '', '', '<p>TAARIIKH GOLD &ldquo;takes time to make history&rdquo; Elegant in its look and feel, &ldquo;Taariikh Gold&rdquo; for women beautifully reveals its enchanting charisma in mild notes of rose and gardenia with a heart of flavorful vanilla and ends on intense white musk. This charming fragrance is treasured in clear crystalline bottle whose beauty is magnified with its intricately designedt rim and crap.</p>\r\n\r\n<p>Strength Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp;Rose / Gardenia<br />\r\nHeart &nbsp;Vanilla<br />\r\nBase &nbsp; White Musk</p>\r\n', '9629afdf079eb727386f02b4f9b3911f.jpg', 1, 2, '2017-12-12 12:23:24'),
(89, 'TAARIIKH ROSE', 54, 0, 34, 0, 0, '', '', '<p>Taariikh Rose for the distinctive woman is the latest addition to the majestic Taariikh collection from Junaid Perfumes. This delicate perfume is in harmony with very special enchanting notes that opens with the combination of the fresh violet and the tender Jasmine, as a heart note you enjoy the embrace of the woody accords of the Rose flowers, while the oriental base note of the sweet vanilla gives the warmth to the whole composition.</p>\r\n\r\n<p>Strength&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown<br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Violet / Jasmine<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rose<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Vanilla<br />\r\n&nbsp;</p>\r\n', '9b03db004689a9bd3ddf4e439463f244.jpg', 1, 3, '2017-12-12 12:26:23'),
(91, 'HADARAH OIL', 54, 0, 34, 0, 0, '', '', '<p>True tradition defines Hadarah the essence of purity. The aromatic Hadarah oil combines the purest elements that comprise of Vanilla, White Musk and mild rose. comprise of Vanilla, White Musk and mild rose.</p>\r\n\r\n<p><br />\r\nTOP: Vanilla</p>\r\n\r\n<p>HEART: White Musk</p>\r\n\r\n<p>BOTTOM: Rose</p>\r\n', '9d43c8b90fd93f3ebd566e47fd818791.jpg', 1, 3, '2017-12-12 01:04:05'),
(92, 'TAARIIKH ROSE OIL', 53, 0, 34, 0, 0, '', '', '<h3><strong>08-0-1526</strong></h3>\r\n\r\n<p>TOP: (Vanilla) - HEART: (Jasmine) - BOTTOM: (Rose)</p>\r\n', 'e57f0ea45ede1948e0b5035a4a2b233f.jpg', 1, 4, '2017-12-12 01:07:18'),
(94, 'RIHAN AL MASHMOOM OIL', 54, 0, 33, 0, 0, '', '', '<p><strong>08-0-1501</strong></p>\r\n\r\n<p>This powerful fragrant oil encompasses components of Rihan and Mashmoom, making it extremely desirable in arabian traditions.</p>\r\n\r\n<p><strong>Breakdown</strong><br />\r\nTop<br />\r\nHeart &nbsp; &nbsp; &nbsp;Mashmoom<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp;Rihan</p>\r\n', '24b541ee2fee87e56df2213824ec3f40.jpg', 1, 1, '2017-12-12 01:14:49'),
(95, 'BANAFSAJ Perfume Spray', 53, 0, 34, 0, 0, '', '', '<p>Banafsaj &ldquo;beauty in full bloom&rdquo; Blossom in the freshness of light summer breeze with the tantalizing Banafsaj &ndash; the fragrance that embodies buoyant individuality and grace. A magical blend of rose and jasmine with succulent notes of amber and musk makes Banafsaj a dazzling spring bouquet that every woman of today desires. Elegant and stylish, Banafsaj is encased in an elongated stem-shaped bottle befitted with a crown of a blooming violet.</p>\r\n\r\n<p>Strength&nbsp; &nbsp; &nbsp; Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp;Rose<br />\r\nHeart &nbsp; &nbsp;Jasmine / Rose<br />\r\nBase &nbsp; &nbsp; Amber (sweet woody note) / Musk<br />\r\n&nbsp;</p>\r\n', '28de0986b4326b65de29a0bed12305a6.jpg', 1, 8, '2017-12-12 01:18:07'),
(96, 'MUSK AL WARD', 54, 0, 33, 0, 0, '', '', '<p style=\"text-align:justify\"><span style=\"font-size:18px\"><strong>08-0-1508</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">As the name suggests, Musk Al Ward is purely the coming together of beauty and&nbsp;elegance. The enriched oil concentrate amalgamates the pureness of musk with the softness of roses in a creation that&rsquo;s quite distinct.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Breakdown</strong><br />\r\nTop<br />\r\nHeart &nbsp; &nbsp; &nbsp;Musk<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp;Wark</p>\r\n', '4ae8389f8af095d2bbbb72e8b82077e9.jpg', 1, 2, '2017-12-12 01:19:32'),
(97, 'BANAFSAJ NIGHT Perfume Spray ', 53, 0, 34, 0, 0, '', '', '<p>Banafsaj Night &ldquo;beauty in full bloom&rdquo;</p>\r\n\r\n<p>The evening dawns her perfect expression as flowers whisper their sweetness into Banafsaj Night. Deep violets capture a uniqueness that opens on a blossom of fresh Roses that intertwines with the sensual fruity core of Litchi. A flowery cocktail, Banafsaj Night takes on her fragrant trail through sweet notes of tantalizing Jasmine that ends on a warm aromatic bed of ever-lasting Musk.</p>\r\n\r\n<p>Strength &nbsp; Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp; Rose<br />\r\nHeart &nbsp; Litchi<br />\r\nBase &nbsp; &nbsp;White Musk / Jasmine</p>\r\n', '7233292200848aae1c82b374e345d2ca.jpg', 1, 8, '2017-12-12 01:20:54'),
(98, 'MUSK SHAFFAF OIL', 54, 0, 33, 0, 0, '', '', '<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">08-0-1503</span></strong></p>\r\n\r\n<p style=\"text-align:justify\">With hints of sophistication and, the soft Musk Shafaf is an oil concentrate that oozes style in its smooth aroma. The captivating Musk Shafaf embodies the purest form of musk that is contained in a glass vial encased in an ornate silverfish bronze minaret like shell.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Breakdown</strong><br />\r\nTop<br />\r\nHeart &nbsp; &nbsp; &nbsp;Musk<br />\r\nBase</p>\r\n', '53ad38a83146d2a8ec6268699e85ea9f.jpg', 1, 4, '2017-12-12 01:24:04'),
(99, 'SOLITAIRE', 53, 0, 34, 0, 0, '', '', '<p>SOLITAIRE &ldquo;your true love&rdquo;<br />\r\nA passionate perfume for the modern woman. The surprising melange of romantic various notes makes Solitaire a truly unique experience. Simple yet elegant, Solitaire reveals her essence in a crystalline bottle with a touch of aqua blue, this utterly feminine Eau de Perfume, charms you with its enticing aroma</p>\r\n\r\n<p>Strength&nbsp; &nbsp; &nbsp;Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown<br />\r\nTop&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lilly of the Valley / Rose<br />\r\nHeart&nbsp; &nbsp; &nbsp; &nbsp; Rose Petal<br />\r\nBase&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;White Musk</p>\r\n', '553ffa9b3340cf6e9b7248f95af0ddcc.jpg', 1, 11, '2017-12-12 01:24:19'),
(100, 'SILVER MUSK ', 52, 0, 34, 0, 0, '', '', '<p style=\"text-align:justify\">Silver Musk&hellip; New trends, new elegance</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\">08-0-1455</span></p>\r\n\r\n<p style=\"text-align:justify\">Magnetic and magnificent define Silver Musk, the latest addition to every must have.</p>\r\n\r\n<p style=\"text-align:justify\">Enjoy the new feel of this powerful fragrance today. The extraordinary Silver Musk reflects the personality of the ambitious man and the beautiful woman with its matchless feel.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Breakdown</strong><br />\r\nTop<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Musk<br />\r\nBase</p>\r\n', '1720654250c43a78c974b98ad1c55a28.jpg', 1, 6, '2017-12-12 01:28:35'),
(101, 'FUTAINA', 53, 0, 34, 0, 0, '', '', '<p>A beautifully sensuous perfume for a woman with elegance, Futaina is a glamorous perfume spray that is a must have for every special occasion. Futaina opens to reveal a melody of tempting floral and woody notes. The top notes introduces white musk for an earthy feel that flows to a gentle heart of rose evoking freshness with a rich base of jasmine. This soft-pink scented perfume is encased in a diamond shaped enclosure that&rsquo;s finished-off with a simple yet delicate crystalline cap.</p>\r\n\r\n<p>Strength &nbsp; &nbsp;Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp;White Musk<br />\r\nHeart &nbsp;Rose<br />\r\nBase &nbsp; Jasmine</p>\r\n', '6094ec84a95cff7a87ff58e415347632.jpg', 1, 11, '2017-12-12 01:32:15'),
(102, 'BANAFSAJ NIGHT OIL', 53, 0, 33, 0, 0, '', '', '<p>BANAFSAJ NIGHT &nbsp;&rdquo;beauty in full bloom&rdquo;<br />\r\nSweet whispers of the night for an aromatic evening of expressions, Banafsaj Night Oil designed to reach out to the contemporary woman of today. A purely western fragrance, embodies elegance and grace in its beautifully engraved cylindrical bottle.</p>\r\n\r\n<p><strong>Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>&nbsp;Oil Concentrates 16% Ethyl 84%</p>\r\n\r\n<p><strong>Breakdown</strong></p>\r\n\r\n<p>Top&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rose<br />\r\nHeart&nbsp; &nbsp; &nbsp; Litchi<br />\r\nBase&nbsp; &nbsp; &nbsp; &nbsp; White Musk / Jasmine</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '0472864321eb272c278b7c4aa0782e84.jpg', 1, 7, '2017-12-12 01:34:16'),
(103, 'HANAKO', 53, 0, 0, 0, 0, '', '', '<p>The mystic oriental &ldquo;Flower Girl&rdquo; beckons you to get immersed in a bouquet of freshness with Hanako, This light and long-lasting perfume embodies the finesse of tuberose, with the depth of jasmine and white musk and a misty aura of rose.</p>\r\n\r\n<p>Strength&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp;Tuberose<br />\r\nHeart &nbsp; &nbsp;Jasmine / White Musk<br />\r\nBase &nbsp; &nbsp; Rose</p>\r\n', '3340186926ce2009a3b1b7ccc44f5572.jpg', 1, 14, '2017-12-12 01:36:29'),
(104, 'BANAFSAJ Fragrant Oil', 53, 0, 34, 0, 0, '', '', '<p style=\"text-align: justify;\"><span style=\"font-size:20px\"><strong>08-0-1446</strong></span></p>\r\n\r\n<p style=\"text-align: justify;\">A favourite amongst the Banafsaj series, This lovely edition carries a concentrate of fruity floral essences combining the refreshing sweetness of rose and jasmine and the earthiness of amber and musk into a lovely blend that&rsquo;s treasured in a simple and delicately studded opaque bottle.</p>\r\n\r\n<p><strong>Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Oil Concentrates</p>\r\n\r\n<p><strong>Breakdown</strong><br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rose<br />\r\nHeart &nbsp; &nbsp; &nbsp;Jasmine / Rose<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp;Amber (sweet woody note) / Musk</p>\r\n', '060f5206c47c5acbf8ff0b44f69bd1a3.jpg', 1, 8, '2017-12-12 01:40:05'),
(105, 'FUTAINA Fragrant Oil', 53, 0, 34, 0, 0, '', '', '<p style=\"text-align: justify;\"><strong><span style=\"font-size:18px\">08-0-1452</span></strong></p>\r\n\r\n<p style=\"text-align: justify;\">FUTAINA &rdquo;the true beauty&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">Evoking every essence of sensuality, the rich western oil concentrate, Futaina is a reflection of everlasting elegance and glamour of a modern woman.&nbsp;The scent is adorned in a rectangle crystal bottle with a sphere crystal cap&nbsp;enhancing the sweet and classical essence of floral perfumes.</p>\r\n\r\n<p><strong>Breakdown</strong><br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;White Musk<br />\r\nHeart &nbsp; &nbsp; &nbsp;Rose<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp;Jasmine</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'f2fbe23a540797926d4871b86a2fa9e8.jpg', 1, 9, '2017-12-12 01:44:43'),
(106, 'MOATTAR DHAHAB SPRAY', 53, 3, 34, 0, 0, '', '', '<p>The rich and smooth MoattarDhahab opens with fruity notes of vanilla that submerges into delicate note of white musk and the flowery essence of rose. The compact MoattarDhahab presents itself as the perfect little perfume for a woman on the go.</p>\r\n\r\n<p>Strength Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp; Vanilla<br />\r\nHeart &nbsp; &nbsp; White Musk<br />\r\nBase &nbsp; &nbsp; &nbsp;Rose</p>\r\n', '5f43cffa36554a17fbac0480ef5092b8.jpg', 1, 3, '2018-01-02 11:18:36'),
(107, 'FANAN', 53, 0, 34, 0, 0, '', '', '<p>Fanan &ldquo;sparkling beauty for her&rdquo;<br />\r\nFanan (literally meaning &lsquo;branches&rsquo;) has been inspired by beauty that branches in all forms. Encased in a custom moulded glass bottle with a rustic rose bouquet engraved cap and shoulder, the sparkling Fanan lives up to its name. The fragrance opens with a fruity combination of mandarin and sweet orange followed by light and airy notes of delightful rose and freesia. An end note of sensuality is pronounced with the spellbinding richness of White Musk.</p>\r\n\r\n<p>Top notes: Mandarin / Sweet Orange</p>\r\n\r\n<p>Heart note: Rose / Freesia</p>\r\n\r\n<p>Base: White Musk</p>\r\n', 'a78bccd86a48747a86367981d0fa46dd.jpg', 1, 7, '2018-01-02 11:49:49'),
(108, 'IBDAR SPRAY', 52, 0, 34, 0, 0, '', '', '', 'a1ec0161a74182c47d55b424294f11b6.jpg', 1, 9, '2018-01-02 12:02:51'),
(109, 'ATEEQ', 52, 0, 34, 0, 0, '', '', '<p>Identify a personality with Ateeq for men. This oriental fragrance for men releases freshness in its mild notes of vanilla and rose that intensifies on amber and cedar.</p>\r\n\r\n<p><br />\r\nStrength &nbsp; Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown<br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp;Vanilla<br />\r\nHeart &nbsp; &nbsp; &nbsp;Rose<br />\r\nBase &nbsp; &nbsp; &nbsp; Amber / Cedarwood</p>\r\n\r\n<p>&nbsp;</p>\r\n', '46d3a0632812ae028c9ca40e37260728.jpg', 1, 11, '2018-01-02 01:26:21'),
(110, 'NAZEEH', 52, 0, 33, 0, 0, '', '', '<p>An enigmatic blend of the old and new, this daring fragrance captures a fusion inspired by the feel of a French era with highlights of the East. Nazeeh capture the spirit of an ambitions man.</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fresh / Citrus Lavender<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sandal / Patchouli<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Oud / Musk</p>\r\n', '20a804cfc95e8f8a04eafda6fb609b8e.jpg', 1, 13, '2018-01-02 01:34:04'),
(111, 'PINK MUSK SPRAY', 53, 0, 34, 0, 0, '', '', '<p>Fragrance Family : Floral &amp; Fruity</p>\r\n\r\n<p>Top : Musk</p>\r\n\r\n<p>Heart : Rose</p>\r\n', 'adef292b0293d322c48a22ca7ad006be.jpg', 1, 14, '2018-01-02 01:41:22'),
(112, 'BANAFSAJ SPRING SPRAY', 53, 0, 34, 0, 0, '', '', '<p>Soft feminine scented oil that represents affection and love which expresses the blooming, cheerful and joyful spring season. It has distinctive opening notes of the fresh fruity notes leading your senses to the charming and tender jasmine scent, before ending on the strong musky aroma. This exclusive oil is contained in a 10 ml bottle, which is designed with flourishing Banafsaj flowers and amusing colorful crafted shades and capped with an attractive golden Banafsaj flower like lid.&nbsp;</p>\r\n\r\n<p><br />\r\nTop&nbsp;&nbsp; &nbsp;Fruity<br />\r\nHeart&nbsp;&nbsp; &nbsp;Jasmine<br />\r\nBase&nbsp;&nbsp; &nbsp;Musk</p>\r\n', '3011dd5b58807280ea52799fc42812ef.jpg', 1, 14, '2018-01-02 01:53:05'),
(113, 'RAZEEN', 52, 0, 34, 0, 0, '', '', '<p>RAZEEN &ldquo;Inspired by the elements&rdquo;<br />\r\nThe true sense of calm and well-being comes alive with the vitalizing Razeen. In each of its three phases, this powerful fragrance reflects the unmistakable allure of the man of today who is driven by sheer instinct. Razeen for an identity that is self-evident.</p>\r\n\r\n<p><br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Citrus<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lavender / Orris<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Patchouli / Cederwood</p>\r\n', 'eddd0589d4d3b6dfad4b0d0ef1c3b6d1.jpg', 1, 10, '2018-01-02 01:58:14'),
(114, 'HADEEL SPRAY', 53, 0, 34, 0, 0, '', '', '<p>Reminiscent of spring and the soft chirping of birds, Hadeel entices you with its melodic aroma. Embodying the perfect blend of aromas.</p>\r\n\r\n<p>Top Voilet / Rose<br />\r\nHeart White Musk / Jasmine<br />\r\nBase Fruits / Vanila</p>\r\n', '8e912d88b489f8ada9d2292321a64557.jpg', 1, 12, '2018-01-02 02:06:14'),
(115, 'SAKURA SPRAY', 53, 0, 34, 0, 0, '', '', '<p>Sakura Spray&hellip; Affection and Magnificence</p>\r\n\r\n<p>Sakura Spray is the latest addition to Junaid Perfumes precious collection, inspired by the traditional Japanese Cherry blossom tree which symbolizes love and beauty. Sakura Spray was specially created for the delicate and passionate lady with its gentle opening notes of fresh and sweet odors of Mandarin and litchi, leading your senses to detect an adorable bouquet of warm roses, delicate Jasmine along with a beautiful contrast of rich cedar wood scent. The base of this unique spray is nothing but special as well with the sensual traditional Musk combined with the warm Arabian musk.</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Mandarin / Litchi<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rose / Jasmine /cedar wood<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Vanilla / Musk</p>\r\n', '9f10d5596ec31d9c0403a2a5b4213ed0.jpg', 1, 9, '2018-01-02 02:58:00'),
(116, 'LILAC SPRAY', 53, 0, 34, 0, 0, '', '', '<p>Lilac Spray a brand new addition to the Junaid Perfumes family tempts you into dreaming of floral spring filled with lilacs.<br />\r\nYou can refresh your skin with the gentle touch of this subtle fragrance, which will indeed give you a whiff of season to come. This is a fresh, unique, feminine scent which rules with pure lilac fragrance. The Lilac spray truly weaves a gentle and pretty story of rich blossoms and delicate petals.</p>\r\n\r\n<p>Strength &nbsp; &nbsp; Oil Concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top<br />\r\nHeart &nbsp;Pure Lilac Flower fragrance<br />\r\nBase<br />\r\n&nbsp;</p>\r\n', '7887c8ce2ad0229c71b5a3c68fa5a04b.jpg', 1, 7, '2018-01-02 03:04:19'),
(117, 'TAARIIKH BLACK', 52, 0, 34, 0, 0, '', '', '<p>TAARIIKH BLACK &rdquo;notes of inspiration&rdquo;<br />\r\nDiscover a melody of fragrant notes that transcend to create the mystical Taariikh from junaid perfumes. Taariikh symbolizes the forgotten era and is an aromatically distinct fragrance that captures the spirit of Arabia in its classic and modern uniqueness. The new fragrance &lsquo;Taariikh Black&rsquo; for men captures the mystique of rich traditions in its warm, spicy and woody notes.</p>\r\n\r\n<p>Strength &nbsp; &nbsp; Oil concentrates 16% Ethyl 84%</p>\r\n\r\n<p>Breakdown</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp; &nbsp;Spicy<br />\r\nHeart &nbsp; &nbsp; &nbsp;Woody / Oud<br />\r\nBase &nbsp; &nbsp; &nbsp; Amber / Woody</p>\r\n', '60646b0356ae617b9f044c527d8841a5.jpg', 1, 5, '2018-01-02 03:16:49'),
(118, 'WUJOOD', 52, 0, 33, 0, 0, '', '', '<p>Designed for a man who stands tall and distinct, Created for the modern man in lines with Arab traditions, Wujood has been designed to be worn on the traditional. Its distinct fragrance insinuates sophistication and lingers on for hours without leaving any stain behind.</p>\r\n\r\n<p>Top &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rose<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Musk<br />\r\nBase &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sandal</p>\r\n', '9ebdde079179accbd132b96c64471c92.jpg', 1, 8, '2018-01-02 03:21:59'),
(119, 'SHARAAR OIL', 54, 0, 33, 0, 0, '', '', '<p>A mix of Amber, Musk and Rose</p>\r\n', 'c0b2ee8bd4765790cdfcd6b723940c3b.jpg', 1, 8, '2018-01-02 03:31:21'),
(120, 'SILVER MUSK OIL', 54, 0, 34, 0, 0, '', '', '<p>SILVER MUSK &rdquo;the royal aroma&rdquo;<br />\r\nSilver Musk, unleashes a unique and powerful aroma that is considered sensual and highly energetic. This spicy and oriental scent is treasured in a pink bottle engulfed in a bold silver metallic outer-cover.</p>\r\n', '82103d7635be7c77f5607ac74d4d05d4.jpg', 1, 6, '2018-01-02 03:37:50'),
(121, 'BANAFSAJ SPRING OIL', 53, 0, 33, 0, 0, '', '', '<p>Soft feminine scented oil that represents affection and love which expresses the blooming, cheerful and joyful spring season. It has distinctive opening notes of the fresh fruity notes leading your senses to the charming and tender jasmine scent, before ending on the strong musky aroma. This exclusive oil is contained in a 10 ml bottle, which is designed with flourishing Banafsaj flowers and amusing colorful crafted shades and capped with an attractive golden Banafsaj flower like lid.</p>\r\n\r\n<p><strong>Strength&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Oil Concentrates 16% Ethyl 84%</p>\r\n\r\n<p><strong>Breakdown</strong><br />\r\nTop &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fruity<br />\r\nHeart &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Jasmine</p>\r\n\r\n<p style=\"margin-left:.5in\">&nbsp;</p>\r\n', '760f63b45e0542ea730c619dacc2b1ca.jpg', 1, 10, '2018-01-09 02:03:57'),
(122, 'BADIAH Fragrant Oil', 52, 0, 40, 0, 0, '', '', '<p>Badiah&hellip; Rich and Sumptuous<br />\r\nBadiah is an Arabic authentic perfume specially designed for the distinct man, as it consists of a special blend of odors that add a charismatic ambiance to it. Badiah is a combination of the highest quality notes that is enhanced with several exotic aromas, &nbsp;including the rich Oud at its top note that adds a challenging yet charming characteristic. Ward at the heart note creates a feeling of glamour and luxury, while the base note leads you to the oriental and earthy musk that leaves you with a luxurious feeling.</p>\r\n\r\n<p>Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Oil concentrates</p>\r\n\r\n<p>Breakdown<br />\r\nTop &nbsp; &nbsp; Oud<br />\r\nHeart &nbsp; Ward<br />\r\nBase &nbsp; &nbsp;Musk</p>\r\n', '79f1e2adef70b406c867ee46dfe4db36.jpg', 1, 1, '2018-01-09 02:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `product_id`, `category_id`) VALUES
(20, 0, 0),
(21, 0, 20),
(22, 0, 21),
(23, 0, 20),
(27, 67, 21),
(28, 67, 23),
(29, 0, 31),
(30, 0, 31),
(31, 68, 31),
(32, 69, 31),
(33, 70, 23),
(42, 71, 31),
(46, 74, 34),
(47, 75, 34),
(48, 76, 34),
(50, 77, 34),
(53, 73, 34),
(57, 72, 33),
(91, 78, 35),
(92, 79, 32),
(94, 82, 32),
(96, 80, 39),
(97, 81, 39),
(106, 90, 32),
(108, 92, 39),
(109, 93, 32),
(121, 104, 39),
(122, 105, 39),
(123, 94, 39),
(124, 96, 39),
(129, 85, 32),
(130, 86, 32),
(132, 107, 32),
(133, 108, 32),
(137, 110, 32),
(139, 112, 32),
(140, 113, 32),
(141, 114, 32),
(142, 115, 32),
(145, 118, 32),
(149, 120, 39),
(152, 111, 32),
(157, 91, 39),
(158, 98, 39),
(160, 119, 39),
(161, 102, 39),
(163, 121, 39),
(165, 88, 32),
(168, 89, 32),
(169, 83, 32),
(170, 106, 32),
(172, 117, 32),
(174, 100, 32),
(176, 95, 32),
(177, 97, 32),
(178, 101, 32),
(179, 99, 32),
(180, 103, 32),
(182, 109, 32),
(183, 116, 32),
(186, 87, 32),
(187, 84, 32),
(188, 122, 39);

-- --------------------------------------------------------

--
-- Table structure for table `productgallery`
--

CREATE TABLE `productgallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productgallery`
--

INSERT INTO `productgallery` (`id`, `product_id`, `name`, `photo`, `status`, `num`) VALUES
(67, 0, 'ddd', 'd9554408c9da1c0463812779765c6301.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(15) NOT NULL,
  `orderid` varchar(15) NOT NULL,
  `productid` int(11) NOT NULL,
  `producttitle` varchar(600) NOT NULL,
  `cusid` int(11) NOT NULL,
  `noofitems` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `orderstatus` int(11) NOT NULL,
  `outofstock` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `daddress` text NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `paid` int(11) NOT NULL,
  `conform` int(11) NOT NULL,
  `orderhistory` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `uniqueid`, `orderid`, `productid`, `producttitle`, `cusid`, `noofitems`, `price`, `totalprice`, `orderstatus`, `outofstock`, `orderdate`, `daddress`, `contactno`, `country`, `city`, `location`, `pincode`, `dname`, `paid`, `conform`, `orderhistory`) VALUES
(108, 'uni4RSSRM5P6', 'ord36OK41NL79J', 81, 'Burberry Brit', 0, 1, 55, 55, 0, 0, '2017-12-11 10:30:45', '', '', '', '', '', '', '', 0, 0, 0),
(109, 'uni4RSSRM5P6', 'ordK727579722L', 78, 'Perfume Travel Atomizer', 0, 1, 100, 100, 0, 0, '2017-12-11 11:07:50', '', '', '', '', '', '', '', 0, 0, 0),
(110, 'uniJ3RQOMN3R', 'ordK6S3P5JO456', 81, 'Burberry Brit', 0, 1, 55, 55, 0, 0, '2017-12-11 03:05:03', '', '', '', '', '', '', '', 0, 0, 0),
(111, 'uni19NL3JO92', 'ord5QM78J6JQO4', 78, 'Perfume Travel Atomizer', 5, 1, 100, 100, 0, 0, '2017-12-11 04:12:24', '', '', '', '', '', '', '', 0, 1, 1),
(112, 'uniM58RSQJ4M', 'ordN648R51JP55', 81, 'Burberry Brit', 5, 1, 55, 55, 0, 0, '2017-12-11 04:21:39', '', '', '', '', '', '', '', 0, 1, 1),
(113, 'uniO71415PL7', 'ord7N6KLK944PL', 84, 'THULOOJ', 0, 1, 1730, 1730, 0, 0, '2017-12-11 08:35:37', '', '', '', '', '', '', '', 0, 0, 0),
(121, 'uniK4PJRPRQ2', 'ordJ7OKJ5Q1PJ1', 87, 'BADIAH GOLD', 0, 2, 4491, 8982, 0, 0, '2017-12-14 11:32:13', '', '', '', '', '', '', '', 0, 0, 0),
(122, 'uniK77686859', 'ordRMP9L77K6QR', 78, 'Perfume Travel Atomizer', 0, 1, 200, 200, 0, 0, '2017-12-14 11:53:50', '', '', '', '', '', '', '', 0, 0, 0),
(123, 'uniK4PJRPRQ2', 'ord58J3ROL6871', 78, 'Perfume Travel Atomizer', 0, 1, 200, 200, 0, 0, '2017-12-14 11:54:19', '', '', '', '', '', '', '', 0, 0, 0),
(124, 'uni8K7N9MNS6', 'ord74KRMRSK7LN', 94, 'RIHAN AL MASHMOOM OIL', 5, 1, 1984, 1984, 0, 0, '2017-12-14 12:12:29', '', '', '', '', '', '', '', 0, 0, 0),
(125, 'uni4R3S22R9P', 'ord82O6643MRO4', 94, 'RIHAN AL MASHMOOM OIL', 0, 1, 1984, 1984, 0, 0, '2017-12-14 12:12:57', '', '', '', '', '', '', '', 0, 0, 0),
(126, 'uni179K65N4M', 'ordRLL76R57KN7', 84, 'THULOOJ', 0, 1, 1557, 1557, 0, 0, '2017-12-14 01:55:56', '', '', '', '', '', '', '', 0, 0, 0),
(127, 'uniP9L3S7J42', 'ordQS44M5SP19K', 87, 'BADIAH GOLD', 5, 1, 4491, 4491, 0, 0, '2018-01-03 12:32:09', '', '', '', '', '', '', '', 0, 1, 1),
(128, 'uniN2339N1S2', 'ordLQR9MR59N5J', 96, 'MUSK AL WARD', 0, 1, 2093, 2093, 0, 0, '2018-01-08 11:50:46', '', '', '', '', '', '', '', 0, 0, 0),
(129, 'uniM7NSL1MLN', 'ord4R6QP9L8JRS', 94, 'RIHAN AL MASHMOOM OIL', 0, 1, 1984, 1984, 0, 0, '2018-01-08 11:52:11', '', '', '', '', '', '', '', 0, 0, 0),
(130, 'uniLL1J4NO5N', 'ord4141QKS56R8', 102, 'BANAFSAJ NIGHT OIL', 0, 1, 4036, 4036, 0, 0, '2018-01-10 12:34:44', '', '', '', '', '', '', '', 0, 0, 0),
(131, 'uniPQ3734PP6', 'ordMP8PK57N11R', 87, 'BADIAH GOLD', 0, 1, 4491, 4491, 0, 0, '2018-01-11 11:04:35', '', '', '', '', '', '', '', 0, 0, 0),
(132, 'uniPSJO29929', 'ord9M9P958JKS6', 83, 'NAWAEM SPRAY', 0, 1, 1142, 1142, 0, 0, '2018-01-11 12:57:23', '', '', '', '', '', '', '', 0, 0, 0),
(134, 'uni7MMNSP196', 'ordKJKKPN2612L', 83, 'NAWAEM SPRAY', 0, 1, 1142, 1142, 0, 0, '2018-01-12 09:00:26', '', '', '', '', '', '', '', 0, 0, 0),
(135, 'uni3L3RKPNPJ', 'ord9PKOK7SN38M', 122, 'BADIAH Fragrant Oil', 5, 1, 5522, 5522, 0, 0, '2018-01-12 01:00:36', '', '', '', '', '', '', '', 0, 0, 0),
(136, 'uni58358L559', 'ordK9OJ9O2SL7N', 96, 'MUSK AL WARD', 0, 1, 2093, 2093, 0, 0, '2018-01-12 01:01:27', '', '', '', '', '', '', '', 0, 0, 0),
(137, 'uniR23LS9RJL', 'ordN64L4P818OO', 83, 'NAWAEM SPRAY', 0, 1, 1142, 1142, 0, 0, '2018-01-12 01:22:43', '', '', '', '', '', '', '', 0, 0, 0),
(138, 'uniJLPJM5ON2', 'ord8SS187QOL35', 122, 'BADIAH Fragrant Oil', 5, 1, 5522, 5522, 0, 0, '2018-01-12 01:41:51', '', '', '', '', '', '', '', 0, 0, 0),
(139, 'uniN5N88PSQ3', 'ord8OQN8R11637', 94, 'RIHAN AL MASHMOOM OIL', 9, 1, 1984, 1984, 0, 0, '2018-01-12 01:48:03', '', '', '', '', '', '', '', 0, 0, 0),
(140, 'uni4MOS2RJ86', 'ordMNQNM9N994P', 122, 'BADIAH Fragrant Oil', 8, 1, 5522, 5522, 0, 0, '2018-01-12 01:49:12', '', '', '', '', '', '', '', 0, 0, 0),
(141, 'uniM3MQ4M41Q', 'ord434O8R4O4R7', 89, 'TAARIIKH ROSE', 0, 1, 4209, 4209, 0, 0, '2018-01-12 01:54:59', '', '', '', '', '', '', '', 0, 0, 0),
(142, 'uniQJ253O45K', 'ord433K6M68O9K', 87, 'BADIAH GOLD', 0, 1, 4491, 4491, 0, 0, '2018-01-12 02:25:08', '', '', '', '', '', '', '', 0, 0, 0),
(143, 'uniRJ37S91K1', 'ordL9SN87K8M93', 122, 'BADIAH Fragrant Oil', 0, 1, 5522, 5522, 0, 0, '2018-01-12 03:50:51', '', '', '', '', '', '', '', 0, 0, 0),
(144, 'uniQ8L7J6N46', 'ordN3675S1PK63', 94, 'RIHAN AL MASHMOOM OIL', 10, 1, 1984, 1984, 0, 0, '2018-01-13 04:06:45', '', '', '', '', '', '', '', 0, 1, 1),
(145, 'uniR9PR1RJQ9', 'ordO11KM5QO1MO', 94, 'RIHAN AL MASHMOOM OIL', 10, 1, 1984, 1984, 0, 0, '2018-01-13 04:23:37', '', '', '', '', '', '', '', 0, 0, 0),
(146, 'uniNNN4P2PLS', 'ord1M8193SO518', 89, 'TAARIIKH ROSE', 0, 1, 4209, 4209, 0, 0, '2018-01-13 04:41:58', '', '', '', '', '', '', '', 0, 0, 0),
(147, 'uni23MK71Q49', 'ord5S57LLOQJJL', 83, 'NAWAEM SPRAY', 11, 1, 1142, 1142, 0, 0, '2018-01-13 04:55:24', '', '', '', '', '', '', '', 0, 1, 1),
(148, 'uniNQ2JN8JL6', 'ord5Q6Q18O98L4', 100, 'SILVER MUSK ', 0, 1, 3259, 3259, 0, 0, '2018-01-15 10:10:02', '', '', '', '', '', '', '', 0, 0, 0),
(149, 'uniSMQL8S41Q', 'ordJJ764S9O25R', 87, 'BADIAH GOLD', 0, 1, 4491, 4491, 0, 0, '2018-01-17 10:19:00', '', '', '', '', '', '', '', 0, 0, 0),
(150, 'uniKQQ2L57MS', 'ord4298NO3KS3R', 106, 'MOATTAR DHAHAB SPRAY', 0, 1, 1569, 1569, 0, 0, '2018-01-23 11:54:24', '', '', '', '', '', '', '', 0, 0, 0),
(151, 'uni51P1L261P', 'ordPLJ9PQO89JR', 122, 'BADIAH Fragrant Oil', 0, 1, 5522, 5522, 0, 0, '2018-01-26 02:18:37', '', '', '', '', '', '', '', 0, 0, 0),
(152, 'uniS479OLQ64', 'ordMRO46ORS44P', 88, 'TAARIIKH GOLD', 0, 1, 4937, 4937, 0, 0, '2018-01-27 04:09:58', '', '', '', '', '', '', '', 0, 0, 0),
(153, 'uni833J3643R', 'ordS2R6638NL2Q', 87, 'BADIAH GOLD', 5, 1, 4491, 4491, 0, 0, '2018-01-28 08:44:17', '', '', '', '', '', '', '', 0, 1, 1),
(154, 'uniOMJ49M18S', 'ordPKO34LL8N1L', 87, 'BADIAH GOLD', 5, 1, 4491, 4491, 0, 0, '2018-02-09 05:11:43', '', '', '', '', '', '', '', 0, 0, 0),
(155, 'uniM89JLNLLM', 'ordS472LOSLN7P', 87, 'BADIAH GOLD', 0, 1, 4491, 4491, 0, 0, '2018-02-15 11:22:40', '', '', '', '', '', '', '', 0, 0, 0),
(156, 'uniP4RN8P1O7', 'ord98JLLRNORNR', 87, 'BADIAH GOLD', 0, 1, 4491, 4491, 0, 0, '2018-02-16 05:16:33', '', '', '', '', '', '', '', 0, 0, 0),
(157, 'uniMO4923NNM', 'ordSNN7ORJL9NJ', 122, 'BADIAH Fragrant Oil', 0, 10, 5522, 55220, 0, 0, '2019-09-05 07:39:13', '', '', '', '', '', '', '', 0, 0, 0),
(159, 'uni6P13288O3', 'ordO5MKJRO4NM2', 87, 'BADIAH GOLD', 12, 1, 4491, 4491, 0, 0, '2019-09-06 09:01:11', '', '', '', '', '', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `id` int(11) NOT NULL,
  `sizename` int(11) NOT NULL,
  `sizeunit` int(11) NOT NULL,
  `noofitems` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price` int(30) NOT NULL,
  `onlineprice` int(30) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`id`, `sizename`, `sizeunit`, `noofitems`, `quantity`, `price`, `onlineprice`, `product_id`) VALUES
(67, 0, 0, 0, 2, 4, 0, 0),
(68, 1, 0, 0, 200, 0, 0, 29),
(69, 1, 0, 0, 200, 0, 0, 30),
(70, 1, 0, 0, 11, 0, 0, 31),
(71, 1, 0, 0, 45, 0, 0, 69),
(72, 1, 0, 4, 4, 4, 0, 70),
(76, 1, 1, 54, 5, 54, 0, 71),
(80, 1, 1, 8, 100, 8, 0, 74),
(81, 1, 1, 8, 100, 8, 0, 75),
(82, 1, 1, 8, 100, 8, 0, 76),
(84, 1, 1, 8, 100, 8, 0, 77),
(87, 1, 1, 7, 100, 7, 0, 73),
(91, 1, 1, 3, 20, 300, 0, 72),
(124, 0, 1, 12, 120, 100, 200, 78),
(125, 0, 1, 5, 100, 55, 1000, 79),
(127, 0, 1, 14, 4, 4, 10, 82),
(129, 0, 1, 5, 150, 55, 13, 80),
(130, 0, 1, 7, 4, 55, 10, 81),
(139, 0, 1, 10, 20, 3471, 3124, 90),
(141, 0, 1, 12, 5, 5120, 4608, 92),
(142, 0, 1, 28, 100, 3244, 2920, 93),
(154, 0, 1, 6, 12, 4880, 4392, 104),
(155, 0, 1, 24, 25, 5509, 4958, 105),
(156, 0, 1, 11, 24, 2204, 1984, 94),
(157, 0, 1, 14, 18, 2325, 2093, 96),
(162, 0, 1, 24, 100, 2163, 1947, 85),
(163, 0, 1, 12, 100, 2373, 2136, 86),
(165, 0, 1, 22, 100, 2462, 2216, 107),
(166, 0, 1, 18, 100, 2478, 2230, 108),
(170, 0, 1, 24, 100, 2759, 2483, 110),
(172, 0, 1, 12, 100, 3006, 2705, 112),
(173, 0, 1, 14, 100, 3128, 2815, 113),
(174, 0, 1, 12, 100, 3201, 2881, 114),
(175, 0, 1, 28, 100, 3244, 2920, 115),
(178, 0, 1, 12, 100, 4779, 4301, 118),
(182, 0, 1, 2, 10, 4167, 3750, 120),
(185, 0, 1, 12, 100, 2781, 2503, 111),
(190, 0, 1, 12, 5, 3554, 3199, 91),
(191, 0, 1, 21, 18, 2561, 2305, 98),
(193, 0, 1, 0, 18, 2404, 2164, 119),
(194, 0, 1, 12, 11, 4484, 4036, 102),
(196, 0, 1, 10, 10, 4585, 4125, 121),
(198, 0, 1, 3, 100, 5486, 4937, 88),
(201, 0, 1, 5, 31, 4677, 4209, 89),
(202, 0, 1, 40, 100, 1269, 1142, 83),
(203, 0, 1, 60, 100, 1743, 1569, 106),
(205, 0, 1, 31, 100, 4192, 3773, 117),
(207, 0, 1, 10, 100, 3621, 3259, 100),
(209, 0, 1, 12, 100, 2943, 2649, 95),
(210, 0, 1, 12, 100, 2835, 2552, 97),
(211, 0, 1, 18, 100, 2678, 2410, 101),
(212, 0, 1, 23, 100, 2986, 2687, 99),
(213, 0, 1, 28, 100, 2545, 2291, 103),
(215, 0, 1, 36, 100, 2750, 2475, 109),
(216, 0, 1, 20, 100, 3471, 3124, 116),
(218, 0, 1, 5, 100, 4990, 4491, 87),
(219, 0, 1, 48, 100, 1730, 1557, 84),
(220, 0, 1, 10, 100, 6136, 5522, 122);

-- --------------------------------------------------------

--
-- Table structure for table `sizename`
--

CREATE TABLE `sizename` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizename`
--

INSERT INTO `sizename` (`id`, `name`) VALUES
(1, '0.23oz');

-- --------------------------------------------------------

--
-- Table structure for table `sizeunit`
--

CREATE TABLE `sizeunit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizeunit`
--

INSERT INTO `sizeunit` (`id`, `name`) VALUES
(1, 'ml');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title1` varchar(50) NOT NULL,
  `title2` varchar(50) NOT NULL,
  `title3` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `photo2` text NOT NULL,
  `status` int(10) NOT NULL,
  `num` int(11) NOT NULL,
  `description` text NOT NULL,
  `readmore` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `title1`, `title2`, `title3`, `photo`, `photo2`, `status`, `num`, `description`, `readmore`) VALUES
(57, '3', 'Inspired by the elements', 's', 's', '5061ff9a55efb870881b03e646163a9f.jpg', '', 0, 3, 'The true sense of calm and well-being comes alive with the vitalizing Razeen. In each of its three phases, this powerful fragrance reflects the unmistakable allure of the man of today who is driven by sheer instinct. <br />\r\n<br />\r\n', ''),
(58, '1', 'Beauty In Full Bloom', 's', 's', '0dd95bfd6e04423b0576c7dfd18baf0f.jpg', '', 0, 4, 'Sweet whispers of the night for an aromatic evening of expressions, Banafsaj Night Oil designed to reach out to the contemporary woman of today.', ''),
(59, '2', 'Arabic Authentic Perfume ', 's', 's', '213c532d1c115a46953bc02b4100ad3f.jpg', '', 0, 2, 'Badiah is an Arabic authentic perfume specially designed for the distinct man, as it consists of a special blend of odors that add a charismatic ambiance to it. ', ''),
(60, '1', 'Takes time to make history', 's', 's', 'b18fd42e1331f7e449e8d01a15338f29.jpg', '', 0, 2, 'Beautifully reveals its enchanting charisma in mild notes of rose and gardenia with a heart of flavorful vanilla and ends on intense white musk. <br />\r\n<br />\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `menu` int(11) NOT NULL,
  `num` varchar(11) NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `name`, `description`, `menu`, `num`, `display`) VALUES
(10, 'About Us', '<p>Jupiter Oil field solutions is a high and specified steel fabrication and mechanical construction company focused on delivering, excellent quality service to various industries within Saudi Arabia as a genius Saudi Company with a mission and vision to be a leader in specialized high end steel fabrication and serviced within Saudi Arabia and Other GCC Countries.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Although Jupiter is a relatively new company to the markets, its management team has our 10 years of local experience in the same field. Jupiter oil field solutions strives to offer exceptional customers services and high quality products to all of its customer through personal interaction, a dedicated and specialized team and quality control. Meet the team to learn more about some of the individuals who contribute to our great work place.</p>\r\n', 15, '1', 1),
(13, 'Vision-Mission                      ', '<p><strong>Mission</strong></p>\r\n\r\n<p>Provide shet metal products and associate supply chain solutions that consistently meet or exeed our customers need and expectations expecations for quality service and value.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Vision</strong></p>\r\n\r\n<p>To be recognized in the industries we serve as partner in choice.</p>\r\n', 15, '2', 0),
(14, 'General Information', '<p>will &nbsp;update soon........</p>\r\n', 15, '3', 0),
(15, 'Management ', '<p>Will update Soon.....</p>\r\n', 15, '4', 0),
(16, 'Organization Chart   ', '<p>Will update Soon......</p>\r\n', 15, '5', 0),
(17, 'Awards & Certificates    ', '<p>Will update soon.....</p>\r\n', 15, '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`, `image`) VALUES
(52, 'Men', '87a7add8347130fa18b6985825fb428d.jpg'),
(53, 'Women', '7426e4f326b65b5eae48ddc77f3f8cde.jpg'),
(54, 'Unisex', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(10) NOT NULL,
  `news` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdelivery`
--
ALTER TABLE `customerdelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot`
--
ALTER TABLE `forgot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fragrance`
--
ALTER TABLE `fragrance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homemenu`
--
ALTER TABLE `homemenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locationmap`
--
ALTER TABLE `locationmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordersstatus`
--
ALTER TABLE `ordersstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productgallery`
--
ALTER TABLE `productgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizename`
--
ALTER TABLE `sizename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizeunit`
--
ALTER TABLE `sizeunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customerdelivery`
--
ALTER TABLE `customerdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `forgot`
--
ALTER TABLE `forgot`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fragrance`
--
ALTER TABLE `fragrance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `homemenu`
--
ALTER TABLE `homemenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locationmap`
--
ALTER TABLE `locationmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `ordersstatus`
--
ALTER TABLE `ordersstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `productgallery`
--
ALTER TABLE `productgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `productsize`
--
ALTER TABLE `productsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `sizename`
--
ALTER TABLE `sizename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizeunit`
--
ALTER TABLE `sizeunit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
