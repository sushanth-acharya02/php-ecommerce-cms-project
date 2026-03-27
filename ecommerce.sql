-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2025 at 01:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `pk_id` int(11) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `title_colour` varchar(7) NOT NULL DEFAULT '#00FFFF',
  `banner_small_text` varchar(255) NOT NULL,
  `small_text_colour` varchar(7) NOT NULL DEFAULT '#FF0000',
  `button_text` varchar(255) NOT NULL,
  `button_colour` varchar(7) NOT NULL DEFAULT '#0641C8',
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`pk_id`, `banner_image`, `banner_title`, `title_colour`, `banner_small_text`, `small_text_colour`, `button_text`, `button_colour`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'banner_image1.avif', 'UNMATCHED COMFORT', '#00ffff', 'Unstoppable style', '#ff0000', 'Shop Now', '#0641c8', 1, 0, 0, '2025-11-17 12:00:01', 0, '2025-11-17 06:30:01', 0),
(2, 'banner_image2.jpg', 'UNMATCHED COMFORT 2', '#8000ff', 'Unstoppable style 2', '#ffff00', 'Shop Now', '#008040', 1, 0, 0, '2025-11-17 12:00:52', 0, '2025-11-17 06:30:52', 0),
(3, 'banner_image3.jpg', 'UNMATCHED COMFORT 3', '#00ff80', 'Unstoppable style 3', '#ff80c0', 'Shop Now', '#8080ff', 1, 0, 0, '2025-11-17 12:04:01', 0, '2025-11-17 06:34:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pk_id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `fk_colour` varchar(7) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `pk_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pcid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`pk_id`, `title`, `pcid`, `image`, `seo_url`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'Mens', 0, 'category_image1.jpg', 'mens', 1, 0, 0, '2025-11-12 11:01:33', 0, '2025-12-16 10:56:47', 0),
(2, 'Womens', 0, 'category_image2.jpg', 'womens', 1, 0, 0, '2025-11-12 11:02:40', 0, '2025-12-02 06:41:40', 0),
(3, 'Kids', 0, 'category_image3.jpg', 'kids', 1, 0, 0, '2025-11-12 11:03:10', 0, '2025-12-02 06:41:46', 0),
(4, 'Shoes', 1, 'category_image4.jpg', 'shoes', 1, 0, 0, '2025-11-12 11:04:08', 0, '2025-12-02 06:41:51', 0),
(5, 'Sandals', 1, 'category_image5.jpg', 'sandals', 1, 0, 0, '2025-11-12 11:04:51', 0, '2025-12-02 06:41:55', 0),
(6, 'Slippers', 1, 'category_image6.jpg', 'slippers', 1, 0, 0, '2025-11-12 11:06:00', 0, '2025-12-02 06:41:59', 0),
(7, 'Shoes', 2, 'category_image7.jpg', 'shoes', 1, 0, 0, '2025-11-12 11:11:39', 0, '2025-12-02 06:42:04', 0),
(8, 'Sandals', 2, 'category_image8.jpg', 'sandals', 1, 0, 0, '2025-11-12 11:12:22', 0, '2025-12-02 06:42:09', 0),
(9, 'Slippers', 2, 'category_image9.jpg', 'slippers', 1, 0, 0, '2025-11-12 11:13:09', 0, '2025-12-02 06:42:15', 0),
(10, 'Shoes', 3, 'category_image10.webp', 'shoes', 1, 0, 0, '2025-11-12 11:13:51', 0, '2025-12-02 06:42:19', 0),
(11, 'Sandals', 3, 'category_image11.webp', 'sandals', 1, 0, 0, '2025-11-12 11:14:39', 0, '2025-12-02 06:42:24', 0),
(12, 'Running Shoes', 4, 'category_image12.jpg', 'running-shoes', 1, 0, 0, '2025-11-12 11:16:56', 0, '2025-11-12 07:30:50', 0),
(13, 'Casual Shoes', 4, 'category_image13.webp', 'casual-shoes', 1, 0, 0, '2025-11-12 11:17:49', 0, '2025-12-02 06:42:37', 0),
(14, 'Sports Shoes', 4, 'category_image14.webp', 'sports-shoes', 1, 0, 0, '2025-11-12 11:19:00', 0, '2025-12-02 06:42:48', 0),
(15, 'Casual', 5, 'category_image15.webp', 'casual', 1, 0, 0, '2025-11-12 11:20:02', 0, '2025-12-02 06:42:54', 0),
(16, 'Sports', 5, 'category_image16.jpg', 'sports', 1, 0, 0, '2025-11-12 11:20:46', 0, '2025-12-02 06:42:58', 0),
(17, 'Clogs', 5, 'category_image17.jpg', 'clogs', 1, 0, 0, '2025-11-12 11:22:49', 0, '2025-12-02 06:43:02', 0),
(18, 'Flip Flops', 6, 'category_image18.jpg', 'flip-flops', 1, 0, 0, '2025-11-12 11:26:15', 0, '2025-12-02 06:43:08', 0),
(19, 'Slides', 6, 'category_image19.jpg', 'slides', 1, 0, 0, '2025-11-12 11:28:18', 0, '2025-12-02 06:43:12', 0),
(20, 'Running Shoes', 7, 'category_image20.jpg', 'running-shoes', 1, 0, 0, '2025-11-12 11:32:12', 0, '2025-12-02 06:43:43', 0),
(21, 'Casual Shoes', 7, 'category_image21.jpg', 'casual-shoes', 1, 0, 0, '2025-11-12 11:34:07', 0, '2025-12-02 06:43:50', 0),
(22, 'Sports Shoes', 7, 'category_image22.jpg', 'sports-shoes', 1, 0, 0, '2025-11-12 11:34:53', 0, '2025-12-02 06:43:55', 0),
(23, 'Casual', 8, 'category_image23.jpg', 'casual', 1, 0, 0, '2025-11-12 11:35:51', 0, '2025-12-02 06:44:00', 0),
(24, 'Sports', 8, 'category_image24.jpg', 'sports', 1, 0, 0, '2025-11-12 11:37:28', 0, '2025-12-02 06:44:05', 0),
(25, 'Clogs', 8, 'category_image25.jpg', 'clogs', 1, 0, 0, '2025-11-12 11:39:11', 0, '2025-12-02 06:44:10', 0),
(26, 'Flip Flops', 9, 'category_image26.jpg', 'flip-flops', 1, 0, 0, '2025-11-12 11:40:16', 0, '2025-12-02 06:44:16', 0),
(27, 'Slides', 9, 'category_image27.jpg', 'slides', 1, 0, 0, '2025-11-12 11:43:08', 0, '2025-12-02 06:44:21', 0),
(28, 'Running Shoes', 10, 'category_image28.jpg', 'running-shoes', 1, 0, 0, '2025-11-12 11:44:19', 0, '2025-12-02 06:44:28', 0),
(29, 'Casual Shoes', 10, 'category_image29.jpg', 'casual-shoes', 1, 0, 0, '2025-11-12 11:44:51', 0, '2025-12-02 06:44:33', 0),
(30, 'Sports Shoes', 10, 'category_image30.jpg', 'sports-shoes', 1, 0, 0, '2025-11-12 11:45:26', 0, '2025-12-02 06:44:39', 0),
(31, 'Casual', 11, 'category_image31.jpg', 'casual', 1, 0, 0, '2025-11-12 11:46:12', 0, '2025-12-02 06:44:49', 0),
(32, 'Sports', 11, 'category_image32.jpg', 'sports', 1, 0, 0, '2025-11-12 11:47:00', 0, '2025-12-02 06:44:53', 0),
(33, 'Clogs', 11, 'category_image33.jpg', 'clogs', 1, 0, 0, '2025-11-12 11:47:59', 0, '2025-12-02 06:44:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `pk_id` int(11) NOT NULL,
  `country` varchar(250) NOT NULL DEFAULT '',
  `iso` char(2) NOT NULL DEFAULT '',
  `contid` int(3) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`pk_id`, `country`, `iso`, `contid`) VALUES
(1, 'Afghanistan', 'AF', 4),
(2, 'Albania', 'AL', 3),
(3, 'Algeria', 'DZ', 4),
(4, 'American Samoa', 'AS', 4),
(5, 'Andorra', 'AD', 3),
(6, 'Angola', 'AO', 4),
(7, 'Anguilla', 'AI', 4),
(8, 'Antarctica', 'AQ', 4),
(9, 'Antigua And Barbuda', 'AG', 4),
(10, 'Argentina', 'AR', 4),
(11, 'Armenia', 'AM', 4),
(12, 'Aruba', 'AW', 4),
(13, 'Australia', 'AU', 4),
(14, 'Austria', 'AT', 3),
(15, 'Azerbaijan', 'AZ', 4),
(16, 'Bahamas', 'BS', 4),
(17, 'Bahrain', 'BH', 4),
(18, 'Bangladesh', 'BD', 4),
(19, 'Barbados', 'BB', 4),
(20, 'Belarus', 'BY', 3),
(21, 'Belgium', 'BE', 3),
(22, 'Belize', 'BZ', 4),
(23, 'Benin', 'BJ', 4),
(24, 'Bermuda', 'BM', 4),
(25, 'Bhutan', 'BT', 4),
(26, 'Bolivia', 'BO', 4),
(27, 'Bosnia And Herzegowina', 'BA', 3),
(28, 'Botswana', 'BW', 4),
(29, 'Bouvet Island', 'BV', 4),
(30, 'Brazil', 'BR', 4),
(31, 'British Indian Ocean Territory', 'IO', 4),
(32, 'Brunei Darussalam', 'BN', 4),
(33, 'Bulgaria', 'BG', 3),
(34, 'Burkina Faso', 'BF', 4),
(35, 'Burundi', 'BI', 4),
(36, 'Cambodia', 'KH', 4),
(37, 'Cameroon', 'CM', 4),
(38, 'Canada', 'CA', 4),
(39, 'Cape Verde', 'CV', 4),
(40, 'Cayman Islands', 'KY', 4),
(41, 'Central African Republic', 'CF', 4),
(42, 'Chad', 'TD', 4),
(43, 'Chile', 'CL', 4),
(44, 'China', 'CN', 4),
(45, 'Colombia', 'CO', 4),
(46, 'Comoros', 'KM', 4),
(47, 'Congo', 'CG', 4),
(48, 'Cook Islands', 'CK', 4),
(49, 'Costa Rica', 'CR', 4),
(50, 'Cote D\'ivoire', 'CI', 4),
(51, 'Croatia', 'HR', 3),
(52, 'Cuba', 'CU', 4),
(53, 'Cyprus', 'CY', 3),
(54, 'Czech Republic', 'CZ', 3),
(55, 'Denmark', 'DK', 3),
(56, 'Djibouti', 'DJ', 4),
(57, 'Dominica', 'DM', 4),
(58, 'Dominican Republic', 'DO', 4),
(59, 'East Timor', 'TP', 4),
(60, 'Ecuador', 'EC', 4),
(61, 'Egypt', 'EG', 4),
(62, 'El Salvador', 'SV', 4),
(63, 'Equatorial Guinea', 'GQ', 4),
(64, 'Eritrea', 'ER', 4),
(65, 'Estonia', 'EE', 3),
(66, 'Ethiopia', 'ET', 4),
(67, 'Falkland Islands (Malvinas)', 'FK', 4),
(68, 'Faroe Islands', 'FO', 4),
(69, 'Fiji', 'FJ', 4),
(70, 'Finland', 'FI', 3),
(71, 'France', 'FR', 3),
(72, 'France, Metropolitan', 'FX', 4),
(73, 'French Guiana', 'GF', 4),
(74, 'French Polynesia', 'PF', 4),
(75, 'French Southern Territories', 'TF', 4),
(76, 'Gabon', 'GA', 4),
(77, 'Gambia', 'GM', 4),
(78, 'Georgia', 'GE', 4),
(79, 'Germany', 'DE', 4),
(80, 'Ghana', 'GH', 3),
(81, 'Gibraltar', 'GI', 4),
(82, 'Greece', 'GR', 3),
(83, 'Greenland', 'GL', 4),
(84, 'Grenada', 'GD', 4),
(85, 'Guadeloupe', 'GP', 4),
(86, 'Guam', 'GU', 4),
(87, 'Guatemala', 'GT', 4),
(88, 'Guinea', 'GN', 4),
(89, 'Guinea-Bissau', 'GW', 4),
(90, 'Guyana', 'GY', 4),
(91, 'Haiti', 'HT', 4),
(92, 'Heard And Mc Donald Islands', 'HM', 4),
(93, 'Honduras', 'HN', 4),
(94, 'Hong Kong', 'HK', 4),
(95, 'Hungary', 'HU', 3),
(96, 'Iceland', 'IS', 3),
(97, 'India', 'IN', 4),
(98, 'Indonesia', 'ID', 4),
(99, 'Iran (Islamic Republic Of)', 'IR', 4),
(100, 'Iraq', 'IQ', 4),
(101, 'Ireland', 'IE', 1),
(102, 'Israel', 'IL', 4),
(103, 'Italy', 'IT', 3),
(104, 'Jamaica', 'JM', 4),
(105, 'Japan', 'JP', 4),
(106, 'Jordan', 'JO', 4),
(107, 'Kazakhstan', 'KZ', 4),
(108, 'Kenya', 'KE', 4),
(109, 'Kiribati', 'KI', 4),
(110, 'Korea, Democratic People\'s Republic Of', 'KP', 4),
(111, 'Korea, Republic Of', 'KR', 4),
(112, 'Kuwait', 'KW', 4),
(113, 'Kyrgyzstan', 'KG', 4),
(114, 'Lao People\'s Democratic Republic', 'LA', 4),
(115, 'Latvia', 'LV', 3),
(116, 'Lebanon', 'LB', 4),
(117, 'Lesotho', 'LS', 4),
(118, 'Liberia', 'LR', 4),
(119, 'Libyan Arab Jamahiriya', 'LY', 4),
(120, 'Liechtenstein', 'LI', 3),
(121, 'Lithuania', 'LT', 3),
(122, 'Luxembourg', 'LU', 3),
(123, 'Macau', 'MO', 4),
(124, 'Macedonia', 'MK', 3),
(125, 'Madagascar', 'MG', 4),
(126, 'Malawi', 'MW', 4),
(127, 'Malaysia', 'MY', 4),
(128, 'Maldives', 'MV', 4),
(129, 'Mali', 'ML', 4),
(130, 'Malta', 'MT', 3),
(131, 'Marshall Islands', 'MH', 4),
(132, 'Martinique', 'MQ', 4),
(133, 'Mauritania', 'MR', 4),
(134, 'Mauritius', 'MU', 4),
(135, 'Mayotte', 'YT', 4),
(136, 'Mexico', 'MX', 4),
(137, 'Micronesia, Federated States Of', 'FM', 4),
(138, 'Moldova, Republic Of', 'MD', 3),
(139, 'Monaco', 'MC', 3),
(140, 'Mongolia', 'MN', 4),
(141, 'Montserrat', 'MS', 4),
(142, 'Morocco', 'MA', 4),
(143, 'Mozambique', 'MZ', 4),
(144, 'Myanmar', 'MM', 4),
(145, 'Namibia', 'NA', 4),
(146, 'Nauru', 'NR', 4),
(147, 'Nepal', 'NP', 4),
(148, 'Netherlands', 'NL', 3),
(149, 'Netherlands Antilles', 'AN', 4),
(150, 'New Caledonia', 'NC', 4),
(151, 'New Zealand', 'NZ', 4),
(152, 'Nicaragua', 'NI', 4),
(153, 'Niger', 'NE', 4),
(154, 'Nigeria', 'NG', 4),
(155, 'Niue', 'NU', 4),
(156, 'Norfolk Island', 'NF', 4),
(157, 'Northern Mariana Islands', 'MP', 4),
(158, 'Norway', 'NO', 3),
(159, 'Oman', 'OM', 4),
(160, 'Pakistan', 'PK', 4),
(161, 'Palau', 'PW', 4),
(162, 'Panama', 'PA', 4),
(163, 'Papua New Guinea', 'PG', 4),
(164, 'Paraguay', 'PY', 4),
(165, 'Peru', 'PE', 4),
(166, 'Philippines', 'PH', 4),
(167, 'Pitcairn', 'PN', 4),
(168, 'Poland', 'PL', 4),
(169, 'Portugal', 'PT', 3),
(170, 'Puerto Rico', 'PR', 4),
(171, 'Qatar', 'QA', 4),
(172, 'Reunion', 'RE', 4),
(173, 'Romania', 'RO', 3),
(174, 'Russian Federation', 'RU', 3),
(175, 'Rwanda', 'RW', 4),
(176, 'Saint Kitts And Nevis', 'KN', 4),
(177, 'Saint Lucia', 'LC', 4),
(178, 'Saint Vincent And The Grenadines', 'VC', 4),
(179, 'Samoa', 'WS', 4),
(180, 'San Marino', 'SM', 3),
(181, 'Sao Tome And Principe', 'ST', 4),
(182, 'Saudi Arabia', 'SA', 4),
(183, 'Senegal', 'SN', 4),
(184, 'Seychelles', 'SC', 4),
(185, 'Sierra Leone', 'SL', 4),
(186, 'Singapore', 'SG', 4),
(187, 'Slovakia (Slovak Republic)', 'SK', 3),
(188, 'Slovenia', 'SI', 3),
(189, 'Solomon Islands', 'SB', 4),
(190, 'Somalia', 'SO', 4),
(191, 'South Africa', 'ZA', 4),
(192, 'South Georgia/South Sandwich Islands', 'GS', 4),
(193, 'Spain', 'ES', 3),
(194, 'Sri Lanka', 'LK', 4),
(195, 'St. Helena', 'SH', 4),
(196, 'St. Pierre And Miquelon', 'PM', 4),
(197, 'Sudan', 'SD', 4),
(198, 'Suriname', 'SR', 4),
(199, 'Svalbard And Jan Mayen Islands', 'SJ', 4),
(200, 'Swaziland', 'SZ', 4),
(201, 'Sweden', 'SE', 4),
(202, 'Switzerland', 'CH', 3),
(203, 'Syrian Arab Republic', 'SY', 4),
(204, 'Taiwan', 'TW', 4),
(205, 'Tajikistan', 'TJ', 4),
(206, 'Tanzania, United Republic Of', 'TZ', 4),
(207, 'Thailand', 'TH', 4),
(208, 'Togo', 'TG', 4),
(209, 'Tokelau', 'TK', 4),
(210, 'Tonga', 'TO', 4),
(211, 'Trinidad And Tobago', 'TT', 4),
(212, 'Tunisia', 'TN', 4),
(213, 'Turkey', 'TR', 4),
(214, 'Turkmenistan', 'TM', 4),
(215, 'Turks And Caicos Islands', 'TC', 4),
(216, 'Tuvalu', 'TV', 4),
(217, 'Uganda', 'UG', 4),
(218, 'Ukraine', 'UA', 3),
(219, 'United Arab Emirates', 'AE', 4),
(220, 'United Kingdom', 'UK', 1),
(221, 'United States', 'US', 2),
(222, 'United States Minor Outlying Islands', 'UM', 4),
(223, 'Uruguay', 'UY', 4),
(224, 'Uzbekistan', 'UZ', 4),
(225, 'Vanuatu', 'VU', 4),
(226, 'Vatican City State (Holy See)', 'VA', 3),
(227, 'Venezuela', 'VE', 4),
(228, 'Viet Nam', 'VN', 4),
(229, 'Virgin Islands (British)', 'VG', 4),
(230, 'Virgin Islands (U.S.)', 'VI', 2),
(231, 'Wallis And Futuna Islands', 'WF', 4),
(232, 'Western Sahara', 'EH', 4),
(233, 'Yemen', 'YE', 4),
(234, 'Yugoslavia', 'YU', 4),
(235, 'Zaire', 'ZR', 4),
(236, 'Zambia', 'ZM', 4),
(237, 'Zimbabwe', 'ZW', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `pk_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_one` text NOT NULL,
  `address_two` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`pk_id`, `title`, `firstname`, `lastname`, `username`, `password`, `address_one`, `address_two`, `city`, `state`, `country`, `postalcode`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'Mr', 'raj', 'kumar', 'raj@gmail.com', '$2y$10$GBaaeGvyPHnbL421MW3dgu8DS.6KRQ0EmCnoesv8bgZR.iLAhxATO', 'xyz', 'xyz', 'hhh', 'hhh', 'IN', 'hhh', 1, 0, 0, '2025-12-11 14:36:18', 0, '2025-12-11 09:06:18', 0),
(2, 'Mr', 'abc', 'bb', 'abc@gmail.com', '$2y$10$7rGqZwB.HJNJ2PaPk26sC.ovLTvNwngjc89LeGwAB3Aej4Hz8uMRK', 'dd', 'dd', 'dd', 'dd', 'IN', '23235', 1, 0, 0, '2025-12-11 16:15:18', 0, '2025-12-11 10:45:18', 0),
(3, 'Mr', 'aa', 'bb', 'aa@gmail.com', '$2y$10$x3VWm3mbvJRMmFd4yqWbUOCodmuYYW.BrnxFMgXXwSSjA9NufEJ9y', 'grtggt', 'grt', 'yre', 'yye', 'IN', '45376', 1, 0, 0, '2025-12-11 16:20:01', 0, '2025-12-11 10:50:01', 0),
(4, 'Mr', 'rr', 'tt', 'abc@gmail.com', '$2y$10$uBY4WY2XsFhGHBQBPp2/S.6HZyweQ4XRLdZQ1zrgR/3U.QrDMPBjS', 'ter', 'dgdg', 'gg', 'gf', 'IN', '43543', 1, 0, 0, '2025-12-11 16:44:21', 0, '2025-12-11 11:14:21', 0),
(5, 'Mr', 'mno', 'bbv', 'mno@gmail.com', '$2y$10$u5qjJpBgH19opBO1ab.yX.vKv7vd83bA3tGqqEEitM52S8IObiK3G', 'mn', 'ff', 'fff', 'ff', 'IN', '654', 1, 0, 0, '2025-12-11 17:46:02', 0, '2025-12-11 12:16:02', 0),
(6, 'Mr', 'rrr', 'ccc', 'rrr@gmail.com', '$2y$10$VzwzhbxKemFm5gyeQc2RQuA.H7eZE0/GV4jDS17wjlV5YJm.yGqUS', 'rr', 'rr', 'rr', 'rr', 'IN', '4643', 1, 0, 0, '2025-12-12 10:55:29', 0, '2025-12-12 05:25:29', 0),
(7, 'Mr', 'rohan', 'rs', 'rohan@gmail.com', '$2y$10$PDkeT1y0Yq5wkLYdBu5nO.OJjLBO7s6rVsik04RiKwnoAa5VQcFZm', 'anb', 'dsf', 'dgf', 'dsgd', 'IN', '3245436', 1, 0, 0, '2025-12-12 10:58:30', 0, '2025-12-12 05:28:30', 0),
(8, 'Mr', 'rahul', 'fsd', 'rahul@gmail.com', '$2y$10$0v.lnTSTdWEOAB7yCW6CQeyD8KYtjw/aGZZWPTyEYlJR6s2vhUJOG', 'hhg', 'fhghf', 'fg', 'fg', 'IN', '5473', 1, 0, 0, '2025-12-12 11:20:24', 0, '2025-12-12 05:50:24', 0),
(9, 'Mr', 'ww', 'ww', 'ww@gmail.com', '$2y$10$lJ9sSQA2h6c2fZ746e/TI.MlR0u30I.sM0ugtutG4htsM9Aqogjwq', 'ww', 'ww', 'ww', 'ww', 'IN', '325', 1, 0, 0, '2025-12-12 12:10:17', 0, '2025-12-12 06:40:17', 0),
(10, 'Mr', 'new', 'fir', 'new@gmail.com', '$2y$10$oqGDzSV9NITdiPjFkf12bu69X.Yegrwx7wN4COsXSy2MAaDrfP9.O', 'new ', 'new', 'new', 'new', 'IN', '345663', 1, 0, 0, '2025-12-12 14:12:30', 0, '2025-12-12 08:42:30', 0),
(11, 'Mr', 'new1', 'cc', 'new1@gmail.com', '$2y$10$f9JMVymhTw.fmUuXZs3rM.FEyVSNmfM8NRsDWUHMza.zLwDaAbXg.', 'bb', 'bb', 'bb', 'bb', 'IN', '436w54', 1, 0, 0, '2025-12-12 17:09:21', 0, '2025-12-12 11:39:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `pk_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`pk_id`, `email`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'rajesh@gmail.com', 1, 0, 0, '2025-12-19 12:31:37', 0, '2025-12-19 07:01:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pk_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `fk_category` int(11) NOT NULL,
  `fk_colour` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pk_id`, `product_title`, `fk_category`, `fk_colour`, `product_description`, `product_price`, `seo_url`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'Puma', 12, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 450.00, 'puma', 1, 0, 0, '2025-11-24 19:18:59', 0, '2025-11-27 06:56:12', 0),
(2, 'Nike', 13, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 600.00, 'nike', 1, 0, 0, '2025-11-24 19:19:36', 0, '2025-11-27 08:17:08', 0),
(3, 'Campus', 14, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 550.00, 'campus', 1, 0, 0, '2025-11-24 19:20:11', 0, '2025-11-27 08:17:34', 0),
(4, 'Bata', 15, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 350.00, 'bata', 1, 0, 0, '2025-11-24 19:21:31', 0, '2025-11-27 08:18:28', 0),
(5, 'Vkc', 16, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 450.00, 'vkc', 1, 0, 0, '2025-11-24 19:22:09', 0, '2025-11-27 08:18:36', 0),
(6, 'Paragon', 17, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 420.00, 'paragon', 1, 0, 0, '2025-11-24 19:24:02', 0, '2025-11-27 08:18:45', 0),
(7, 'Crocs', 18, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 750.00, 'crocs', 1, 0, 0, '2025-11-24 19:25:19', 0, '2025-11-27 08:18:53', 0),
(8, 'Adda', 19, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 600.00, 'adda', 1, 0, 0, '2025-11-24 19:26:06', 0, '2025-11-27 08:19:00', 0),
(9, 'Campus', 20, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 900.00, 'campus', 1, 0, 0, '2025-11-24 19:27:53', 0, '2025-11-27 13:09:53', 0),
(10, 'Nike', 21, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 550.00, 'nike', 1, 0, 0, '2025-11-24 19:28:39', 0, '2025-11-27 13:10:02', 0),
(11, 'Puma', 22, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 740.00, 'puma', 1, 0, 0, '2025-11-24 19:29:24', 0, '2025-11-27 13:10:10', 0),
(12, 'Paragon', 23, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 370.00, 'paragon', 1, 0, 0, '2025-11-24 19:30:30', 0, '2025-11-27 13:10:18', 0),
(13, 'Bata', 24, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 560.00, 'bata', 1, 0, 0, '2025-11-24 19:31:52', 0, '2025-11-27 13:10:28', 0),
(14, 'Vkc', 25, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 680.00, 'vkc', 1, 0, 0, '2025-11-24 19:32:44', 0, '2025-11-27 13:10:38', 0),
(15, 'Adda', 26, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 470.00, 'adda', 1, 0, 0, '2025-11-24 19:33:33', 0, '2025-11-27 13:10:49', 0),
(16, 'Crocs', 27, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 760.00, 'crocs', 1, 0, 0, '2025-11-24 19:34:08', 0, '2025-11-27 13:10:59', 0),
(17, 'Nike', 28, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 455.00, 'nike', 1, 0, 0, '2025-11-24 19:35:18', 0, '2025-11-27 13:11:08', 0),
(18, 'Puma', 29, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 540.00, 'puma', 1, 0, 0, '2025-11-24 19:35:56', 0, '2025-11-27 13:11:16', 0),
(19, 'Campus', 30, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 720.00, 'campus', 1, 0, 0, '2025-11-24 19:37:22', 0, '2025-11-27 13:11:23', 0),
(20, 'Vkc', 31, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 300.00, 'vkc', 1, 0, 0, '2025-11-24 19:38:52', 0, '2025-11-27 13:11:31', 0),
(21, 'Bata', 32, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 680.00, 'bata', 1, 0, 0, '2025-11-24 19:40:15', 0, '2025-11-27 13:11:40', 0),
(22, 'Paragon', 33, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 650.00, 'paragon', 1, 0, 0, '2025-11-24 19:41:28', 0, '2025-11-27 13:11:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `pk_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`pk_id`, `fk_product_id`, `images`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 1, 'product_image1.jpg', 1, 0, 0, '2025-11-24 19:18:59', 0, '2025-11-24 13:48:59', 0),
(2, 2, 'product_image2.jpg', 1, 0, 0, '2025-11-24 19:19:36', 0, '2025-11-24 13:49:36', 0),
(3, 3, 'product_image3.jpg', 1, 0, 0, '2025-11-24 19:20:11', 0, '2025-11-24 13:50:11', 0),
(4, 4, 'product_image4.jpg', 1, 0, 0, '2025-11-24 19:21:31', 0, '2025-11-24 13:51:31', 0),
(5, 5, 'product_image5.jpg', 1, 0, 0, '2025-11-24 19:22:09', 0, '2025-11-24 13:52:09', 0),
(6, 6, 'product_image6.jpg', 1, 0, 0, '2025-11-24 19:24:02', 0, '2025-11-24 13:54:02', 0),
(7, 7, 'product_image7.jpg', 1, 0, 0, '2025-11-24 19:25:19', 0, '2025-11-24 13:55:19', 0),
(8, 8, 'product_image8.jpg', 1, 0, 0, '2025-11-24 19:26:06', 0, '2025-11-24 13:56:06', 0),
(9, 9, 'product_image9.jpg', 1, 0, 0, '2025-11-24 19:27:53', 0, '2025-11-24 13:57:53', 0),
(10, 10, 'product_image10.jpg', 1, 0, 0, '2025-11-24 19:28:39', 0, '2025-11-24 13:58:39', 0),
(11, 11, 'product_image11.jpg', 1, 0, 0, '2025-11-24 19:29:24', 0, '2025-11-24 13:59:24', 0),
(12, 12, 'product_image12.jpg', 1, 0, 0, '2025-11-24 19:30:30', 0, '2025-11-24 14:00:30', 0),
(13, 13, 'product_image13.jpg', 1, 0, 0, '2025-11-24 19:31:52', 0, '2025-11-24 14:01:52', 0),
(14, 14, 'product_image14.jpg', 1, 0, 0, '2025-11-24 19:32:44', 0, '2025-11-24 14:02:44', 0),
(15, 15, 'product_image15.jpg', 1, 0, 0, '2025-11-24 19:33:33', 0, '2025-11-24 14:03:33', 0),
(16, 16, 'product_image16.jpg', 1, 0, 0, '2025-11-24 19:34:08', 0, '2025-11-24 14:04:08', 0),
(17, 17, 'product_image17.jpg', 1, 0, 0, '2025-11-24 19:35:18', 0, '2025-11-24 14:05:18', 0),
(18, 18, 'product_image18.jpg', 1, 0, 0, '2025-11-24 19:35:56', 0, '2025-11-24 14:05:56', 0),
(19, 19, 'product_image19.jpg', 1, 0, 0, '2025-11-24 19:37:22', 0, '2025-11-24 14:07:22', 0),
(20, 20, 'product_image20.jpg', 1, 0, 0, '2025-11-24 19:38:52', 0, '2025-11-24 14:08:52', 0),
(21, 21, 'product_image21.jpg', 1, 0, 0, '2025-11-24 19:40:15', 0, '2025-11-24 14:10:15', 0),
(22, 22, 'product_image22.jpg', 1, 0, 0, '2025-11-24 19:41:28', 0, '2025-11-24 14:11:28', 0),
(23, 23, 'product_image23.jpg', 1, 0, 0, '2025-12-16 11:30:10', 0, '2025-12-16 06:00:10', 0),
(24, 24, 'product_image24.jpg', 1, 0, 0, '2025-12-16 11:32:52', 0, '2025-12-16 06:02:52', 0),
(25, 25, 'product_image25.jpg', 1, 0, 0, '2025-12-16 11:34:27', 0, '2025-12-16 06:04:27', 0),
(26, 26, 'product_image26.jpg', 1, 0, 0, '2025-12-16 11:45:46', 0, '2025-12-16 06:15:46', 0),
(27, 27, 'product_image27.jpg', 1, 0, 0, '2025-12-16 11:47:11', 0, '2025-12-16 06:17:11', 0),
(28, 28, 'product_image28.jpg', 1, 0, 0, '2025-12-16 13:52:42', 0, '2025-12-16 08:22:42', 0),
(29, 31, 'product_image31.jpg', 1, 0, 0, '2025-12-16 16:08:24', 0, '2025-12-16 10:38:24', 0),
(30, 32, 'product_image32.jpg', 1, 0, 0, '2025-12-16 16:30:30', 0, '2025-12-16 11:00:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `pk_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_size`
--

INSERT INTO `products_size` (`pk_id`, `fk_product_id`, `size`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 1, '7', 1, 0, 0, '2025-12-17 17:28:34', 0, '2025-12-17 11:58:34', 0),
(2, 1, '8', 1, 0, 0, '2025-12-17 17:28:34', 0, '2025-12-17 11:58:34', 0),
(3, 1, '9', 1, 0, 0, '2025-12-17 17:28:34', 0, '2025-12-17 11:58:34', 0),
(4, 1, '10', 1, 0, 0, '2025-12-17 17:28:34', 0, '2025-12-17 11:58:34', 0),
(5, 2, '6', 1, 0, 0, '2025-12-17 17:28:58', 0, '2025-12-17 11:58:58', 0),
(6, 2, '8', 1, 0, 0, '2025-12-17 17:28:58', 0, '2025-12-17 11:58:58', 0),
(7, 2, '9', 1, 0, 0, '2025-12-17 17:28:58', 0, '2025-12-17 11:58:58', 0),
(8, 2, '10', 1, 0, 0, '2025-12-17 17:28:58', 0, '2025-12-17 11:58:58', 0),
(9, 3, '6', 1, 0, 0, '2025-12-17 17:29:13', 0, '2025-12-17 11:59:13', 0),
(10, 3, '7', 1, 0, 0, '2025-12-17 17:29:13', 0, '2025-12-17 11:59:13', 0),
(11, 3, '9', 1, 0, 0, '2025-12-17 17:29:13', 0, '2025-12-17 11:59:13', 0),
(12, 3, '10', 1, 0, 0, '2025-12-17 17:29:13', 0, '2025-12-17 11:59:13', 0),
(13, 4, '6', 1, 0, 0, '2025-12-17 17:29:34', 0, '2025-12-17 11:59:34', 0),
(14, 4, '7', 1, 0, 0, '2025-12-17 17:29:34', 0, '2025-12-17 11:59:34', 0),
(15, 4, '8', 1, 0, 0, '2025-12-17 17:29:34', 0, '2025-12-17 11:59:34', 0),
(16, 4, '10', 1, 0, 0, '2025-12-17 17:29:34', 0, '2025-12-17 11:59:34', 0),
(17, 5, '6', 1, 0, 0, '2025-12-17 17:29:55', 0, '2025-12-17 11:59:55', 0),
(18, 5, '7', 1, 0, 0, '2025-12-17 17:29:55', 0, '2025-12-17 11:59:55', 0),
(19, 5, '8', 1, 0, 0, '2025-12-17 17:29:55', 0, '2025-12-17 11:59:55', 0),
(20, 5, '9', 1, 0, 0, '2025-12-17 17:29:55', 0, '2025-12-17 11:59:55', 0),
(21, 6, '7', 1, 0, 0, '2025-12-17 17:30:40', 0, '2025-12-17 12:00:40', 0),
(22, 6, '8', 1, 0, 0, '2025-12-17 17:30:40', 0, '2025-12-17 12:00:40', 0),
(23, 6, '9', 1, 0, 0, '2025-12-17 17:30:40', 0, '2025-12-17 12:00:40', 0),
(24, 6, '10', 1, 0, 0, '2025-12-17 17:30:40', 0, '2025-12-17 12:00:40', 0),
(25, 7, '6', 1, 0, 0, '2025-12-17 17:31:05', 0, '2025-12-17 12:01:05', 0),
(26, 7, '8', 1, 0, 0, '2025-12-17 17:31:05', 0, '2025-12-17 12:01:05', 0),
(27, 7, '9', 1, 0, 0, '2025-12-17 17:31:05', 0, '2025-12-17 12:01:05', 0),
(28, 7, '10', 1, 0, 0, '2025-12-17 17:31:05', 0, '2025-12-17 12:01:05', 0),
(29, 8, '6', 1, 0, 0, '2025-12-17 17:31:43', 0, '2025-12-17 12:01:43', 0),
(30, 8, '7', 1, 0, 0, '2025-12-17 17:31:43', 0, '2025-12-17 12:01:43', 0),
(31, 8, '9', 1, 0, 0, '2025-12-17 17:31:43', 0, '2025-12-17 12:01:43', 0),
(32, 8, '10', 1, 0, 0, '2025-12-17 17:31:43', 0, '2025-12-17 12:01:43', 0),
(33, 9, '6', 1, 0, 0, '2025-12-17 17:32:03', 0, '2025-12-17 12:02:03', 0),
(34, 9, '7', 1, 0, 0, '2025-12-17 17:32:03', 0, '2025-12-17 12:02:03', 0),
(35, 9, '8', 1, 0, 0, '2025-12-17 17:32:03', 0, '2025-12-17 12:02:03', 0),
(36, 9, '10', 1, 0, 0, '2025-12-17 17:32:03', 0, '2025-12-17 12:02:03', 0),
(37, 10, '6', 1, 0, 0, '2025-12-17 17:32:18', 0, '2025-12-17 12:02:18', 0),
(38, 10, '7', 1, 0, 0, '2025-12-17 17:32:18', 0, '2025-12-17 12:02:18', 0),
(39, 10, '8', 1, 0, 0, '2025-12-17 17:32:18', 0, '2025-12-17 12:02:18', 0),
(40, 10, '9', 1, 0, 0, '2025-12-17 17:32:18', 0, '2025-12-17 12:02:18', 0),
(41, 11, '7', 1, 0, 0, '2025-12-17 17:34:07', 0, '2025-12-17 12:04:07', 0),
(42, 11, '8', 1, 0, 0, '2025-12-17 17:34:07', 0, '2025-12-17 12:04:07', 0),
(43, 11, '9', 1, 0, 0, '2025-12-17 17:34:07', 0, '2025-12-17 12:04:07', 0),
(44, 11, '10', 1, 0, 0, '2025-12-17 17:34:07', 0, '2025-12-17 12:04:07', 0),
(45, 12, '6', 1, 0, 0, '2025-12-17 17:34:28', 0, '2025-12-17 12:04:28', 0),
(46, 12, '8', 1, 0, 0, '2025-12-17 17:34:28', 0, '2025-12-17 12:04:28', 0),
(47, 12, '9', 1, 0, 0, '2025-12-17 17:34:28', 0, '2025-12-17 12:04:28', 0),
(48, 12, '10', 1, 0, 0, '2025-12-17 17:34:28', 0, '2025-12-17 12:04:28', 0),
(49, 13, '6', 1, 0, 0, '2025-12-17 17:35:16', 0, '2025-12-17 12:05:16', 0),
(50, 13, '7', 1, 0, 0, '2025-12-17 17:35:16', 0, '2025-12-17 12:05:16', 0),
(51, 13, '9', 1, 0, 0, '2025-12-17 17:35:16', 0, '2025-12-17 12:05:16', 0),
(52, 13, '10', 1, 0, 0, '2025-12-17 17:35:16', 0, '2025-12-17 12:05:16', 0),
(53, 14, '6', 1, 0, 0, '2025-12-17 17:35:36', 0, '2025-12-17 12:05:36', 0),
(54, 14, '7', 1, 0, 0, '2025-12-17 17:35:36', 0, '2025-12-17 12:05:36', 0),
(55, 14, '8', 1, 0, 0, '2025-12-17 17:35:36', 0, '2025-12-17 12:05:36', 0),
(56, 14, '10', 1, 0, 0, '2025-12-17 17:35:36', 0, '2025-12-17 12:05:36', 0),
(57, 15, '6', 1, 0, 0, '2025-12-17 17:35:59', 0, '2025-12-17 12:05:59', 0),
(58, 15, '7', 1, 0, 0, '2025-12-17 17:35:59', 0, '2025-12-17 12:05:59', 0),
(59, 15, '8', 1, 0, 0, '2025-12-17 17:35:59', 0, '2025-12-17 12:05:59', 0),
(60, 15, '9', 1, 0, 0, '2025-12-17 17:35:59', 0, '2025-12-17 12:05:59', 0),
(61, 16, '7', 1, 0, 0, '2025-12-17 17:36:24', 0, '2025-12-17 12:06:24', 0),
(62, 16, '8', 1, 0, 0, '2025-12-17 17:36:24', 0, '2025-12-17 12:06:24', 0),
(63, 16, '9', 1, 0, 0, '2025-12-17 17:36:24', 0, '2025-12-17 12:06:24', 0),
(64, 16, '10', 1, 0, 0, '2025-12-17 17:36:24', 0, '2025-12-17 12:06:24', 0),
(65, 17, '6', 1, 0, 0, '2025-12-17 17:36:42', 0, '2025-12-17 12:06:42', 0),
(66, 17, '8', 1, 0, 0, '2025-12-17 17:36:42', 0, '2025-12-17 12:06:42', 0),
(67, 17, '9', 1, 0, 0, '2025-12-17 17:36:42', 0, '2025-12-17 12:06:42', 0),
(68, 17, '10', 1, 0, 0, '2025-12-17 17:36:42', 0, '2025-12-17 12:06:42', 0),
(69, 18, '6', 1, 0, 0, '2025-12-17 17:37:27', 0, '2025-12-17 12:07:27', 0),
(70, 18, '7', 1, 0, 0, '2025-12-17 17:37:27', 0, '2025-12-17 12:07:27', 0),
(71, 18, '9', 1, 0, 0, '2025-12-17 17:37:27', 0, '2025-12-17 12:07:27', 0),
(72, 18, '10', 1, 0, 0, '2025-12-17 17:37:27', 0, '2025-12-17 12:07:27', 0),
(73, 19, '6', 1, 0, 0, '2025-12-17 17:37:53', 0, '2025-12-17 12:07:53', 0),
(74, 19, '7', 1, 0, 0, '2025-12-17 17:37:53', 0, '2025-12-17 12:07:53', 0),
(75, 19, '8', 1, 0, 0, '2025-12-17 17:37:53', 0, '2025-12-17 12:07:53', 0),
(76, 19, '10', 1, 0, 0, '2025-12-17 17:37:53', 0, '2025-12-17 12:07:53', 0),
(77, 20, '6', 1, 0, 0, '2025-12-17 17:38:13', 0, '2025-12-17 12:08:13', 0),
(78, 20, '7', 1, 0, 0, '2025-12-17 17:38:13', 0, '2025-12-17 12:08:13', 0),
(79, 20, '8', 1, 0, 0, '2025-12-17 17:38:13', 0, '2025-12-17 12:08:13', 0),
(80, 20, '9', 1, 0, 0, '2025-12-17 17:38:13', 0, '2025-12-17 12:08:13', 0),
(81, 21, '7', 1, 0, 0, '2025-12-17 17:38:49', 0, '2025-12-17 12:08:49', 0),
(82, 21, '8', 1, 0, 0, '2025-12-17 17:38:49', 0, '2025-12-17 12:08:49', 0),
(83, 21, '9', 1, 0, 0, '2025-12-17 17:38:49', 0, '2025-12-17 12:08:49', 0),
(84, 21, '10', 1, 0, 0, '2025-12-17 17:38:49', 0, '2025-12-17 12:08:49', 0),
(85, 22, '6', 1, 0, 0, '2025-12-17 17:39:34', 0, '2025-12-17 12:09:34', 0),
(86, 22, '8', 1, 0, 0, '2025-12-17 17:39:34', 0, '2025-12-17 12:09:34', 0),
(87, 22, '9', 1, 0, 0, '2025-12-17 17:39:34', 0, '2025-12-17 12:09:34', 0),
(88, 22, '10', 1, 0, 0, '2025-12-17 17:39:34', 0, '2025-12-17 12:09:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `pk_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`pk_id`, `email`, `password`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'abc@gmail.com', '$2y$10$gItReQC/et1Zt1MBa.54qO.bx8BtqK7TcVhHqP00XANzScMy4d77a', 1, 0, 0, '2025-12-08 17:55:03', 0, '2025-12-08 12:25:03', 0),
(2, 'xyz@gmail.com', '$2y$10$Z2T8voN80Pi4q7mFNcl6tOj.nGCgla0qRZajt9bm9UJrpMlWOL7Hq', 1, 0, 0, '2025-12-09 12:08:10', 0, '2025-12-09 06:38:10', 0),
(3, 'om@gmail.com', '$2y$10$t.D8ZGH0qlJtL7OxplNqh.fy3Sb0dq5uQhFAns9.JOC20fsLLm2lS', 1, 0, 0, '2025-12-09 12:30:12', 0, '2025-12-09 07:00:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoe_colour`
--

CREATE TABLE `shoe_colour` (
  `pk_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `colour` varchar(7) NOT NULL DEFAULT '#000000',
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoe_colour`
--

INSERT INTO `shoe_colour` (`pk_id`, `title`, `colour`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'Red', '#ff0000', 1, 0, 0, '2025-11-18 15:52:25', 1, '2025-11-18 10:22:25', 0),
(2, 'Green', '#00ff00', 1, 0, 0, '2025-11-18 15:53:08', 1, '2025-11-18 10:23:08', 0),
(3, 'Blue', '#0000ff', 1, 0, 0, '2025-11-18 15:53:26', 1, '2025-11-18 10:23:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pk_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `live` smallint(1) NOT NULL DEFAULT 1,
  `delete_id` smallint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pk_id`, `email`, `password`, `live`, `delete_id`, `sort_id`, `create_date`, `created_by`, `update_date`, `updated_by`) VALUES
(1, 'demo@gmail.com', 'MTIzNERlbW8=', 1, 0, 0, '2025-10-30 17:34:47', 0, '2025-10-31 11:21:18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`pk_id`),
  ADD UNIQUE KEY `iso` (`iso`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `shoe_colour`
--
ALTER TABLE `shoe_colour`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shoe_colour`
--
ALTER TABLE `shoe_colour`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
