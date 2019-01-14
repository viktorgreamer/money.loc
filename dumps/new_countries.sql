-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2019 г., 14:17
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a0086640_money`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contries`
--

CREATE TABLE `contries` (
  `id` int(3) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contries`
--

INSERT INTO `contries` (`id`, `name`) VALUES
(1, 'Abkhazia'),
(2, 'Australia'),
(3, 'Austria'),
(4, 'Azerbaijan'),
(5, 'Albania'),
(6, 'Algeria'),
(7, 'American Samoa'),
(8, 'Anguilla'),
(9, 'Angola'),
(10, 'Andorra'),
(11, 'Antarctica'),
(12, 'Antigua and Barbuda'),
(13, 'Argentina'),
(14, 'Armenia'),
(15, 'Aruba'),
(16, 'Afghanistan'),
(17, 'Bahamas'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Bahrain'),
(21, 'Belarus'),
(22, 'Belize'),
(23, 'Belgium'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bulgaria'),
(27, 'Bolivia, plurinational state of'),
(28, 'Bonaire, Sint Eustatius and Saba'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Bhutan'),
(37, 'Vanuatu'),
(38, 'Hungary'),
(39, 'Venezuela'),
(40, 'Virgin Islands, British'),
(41, 'Virgin Islands, U.S.'),
(42, 'Vietnam'),
(43, 'Gabon'),
(44, 'Haiti'),
(45, 'Guyana'),
(46, 'Gambia'),
(47, 'Ghana'),
(48, 'Guadeloupe'),
(49, 'Guatemala'),
(50, 'Guinea'),
(51, 'Guinea-Bissau'),
(52, 'Germany'),
(53, 'Guernsey'),
(54, 'Gibraltar'),
(55, 'Honduras'),
(56, 'Hong Kong'),
(57, 'Grenada'),
(58, 'Greenland'),
(59, 'Greece'),
(60, 'Georgia'),
(61, 'Guam'),
(62, 'Denmark'),
(63, 'Jersey'),
(64, 'Djibouti'),
(65, 'Dominica'),
(66, 'Dominican Republic'),
(67, 'Egypt'),
(68, 'Zambia'),
(69, 'Western Sahara'),
(70, 'Zimbabwe'),
(71, 'Israel'),
(72, 'India'),
(73, 'Indonesia'),
(74, 'Jordan'),
(75, 'Iraq'),
(76, 'Iran, Islamic Republic of'),
(77, 'Ireland'),
(78, 'Iceland'),
(79, 'Spain'),
(80, 'Italy'),
(81, 'Yemen'),
(82, 'Cape Verde'),
(83, 'Kazakhstan'),
(84, 'Cambodia'),
(85, 'Cameroon'),
(86, 'Canada'),
(87, 'Qatar'),
(88, 'Kenya'),
(89, 'Cyprus'),
(90, 'Kyrgyzstan'),
(91, 'Kiribati'),
(92, 'China'),
(93, 'Cocos (Keeling) Islands'),
(94, 'Colombia'),
(95, 'Comoros'),
(96, 'Congo'),
(97, 'Congo, Democratic Republic of the'),
(98, 'Korea, Democratic People\'s republic of'),
(99, 'Korea, Republic of'),
(100, 'Costa Rica'),
(101, 'Cote d\'Ivoire'),
(102, 'Cuba'),
(103, 'Kuwait'),
(104, 'Curaçao'),
(105, 'Lao People\'s Democratic Republic'),
(106, 'Latvia'),
(107, 'Lesotho'),
(108, 'Lebanon'),
(109, 'Libyan Arab Jamahiriya'),
(110, 'Liberia'),
(111, 'Liechtenstein'),
(112, 'Lithuania'),
(113, 'Luxembourg'),
(114, 'Mauritius'),
(115, 'Mauritania'),
(116, 'Madagascar'),
(117, 'Mayotte'),
(118, 'Macao'),
(119, 'Malawi'),
(120, 'Malaysia'),
(121, 'Mali'),
(122, 'United States Minor Outlying Islands'),
(123, 'Maldives'),
(124, 'Malta'),
(125, 'Morocco'),
(126, 'Martinique'),
(127, 'Marshall Islands'),
(128, 'Mexico'),
(129, 'Micronesia, Federated States of'),
(130, 'Mozambique'),
(131, 'Moldova'),
(132, 'Monaco'),
(133, 'Mongolia'),
(134, 'Montserrat'),
(135, 'Burma'),
(136, 'Namibia'),
(137, 'Nauru'),
(138, 'Nepal'),
(139, 'Niger'),
(140, 'Nigeria'),
(141, 'Netherlands'),
(142, 'Nicaragua'),
(143, 'Niue'),
(144, 'New Zealand'),
(145, 'New Caledonia'),
(146, 'Norway'),
(147, 'United Arab Emirates'),
(148, 'Oman'),
(149, 'Bouvet Island'),
(150, 'Isle of Man'),
(151, 'Norfolk Island'),
(152, 'Christmas Island'),
(153, 'Heard Island and McDonald Islands'),
(154, 'Cayman Islands'),
(155, 'Cook Islands'),
(156, 'Turks and Caicos Islands'),
(157, 'Pakistan'),
(158, 'Palau'),
(159, 'Palestinian Territory, Occupied'),
(160, 'Panama'),
(161, 'Holy See (Vatican City State)'),
(162, 'Papua New Guinea'),
(163, 'Paraguay'),
(164, 'Peru'),
(165, 'Pitcairn'),
(166, 'Poland'),
(167, 'Portugal'),
(168, 'Puerto Rico'),
(169, 'Macedonia, The Former Yugoslav Republic Of'),
(170, 'Reunion'),
(171, 'Russian Federation'),
(172, 'Rwanda'),
(173, 'Romania'),
(174, 'Samoa'),
(175, 'San Marino'),
(176, 'Sao Tome and Principe'),
(177, 'Saudi Arabia'),
(178, 'Swaziland'),
(179, 'Saint Helena, Ascension And Tristan Da Cunha'),
(180, 'Northern Mariana Islands'),
(181, 'Saint Barthélemy'),
(182, 'Saint Martin (French Part)'),
(183, 'Senegal'),
(184, 'Saint Vincent and the Grenadines'),
(185, 'Saint Kitts and Nevis'),
(186, 'Saint Lucia'),
(187, 'Saint Pierre and Miquelon'),
(188, 'Serbia'),
(189, 'Seychelles'),
(190, 'Singapore'),
(191, 'Sint Maarten'),
(192, 'Syrian Arab Republic'),
(193, 'Slovakia'),
(194, 'Slovenia'),
(195, 'United Kingdom'),
(196, 'United States'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'Sudan'),
(200, 'Suriname'),
(201, 'Sierra Leone'),
(202, 'Tajikistan'),
(203, 'Thailand'),
(204, 'Taiwan, Province of China'),
(205, 'Tanzania, United Republic Of'),
(206, 'Timor-Leste'),
(207, 'Togo'),
(208, 'Tokelau'),
(209, 'Tonga'),
(210, 'Trinidad and Tobago'),
(211, 'Tuvalu'),
(212, 'Tunisia'),
(213, 'Turkmenistan'),
(214, 'Turkey'),
(215, 'Uganda'),
(216, 'Uzbekistan'),
(217, 'Ukraine'),
(218, 'Wallis and Futuna'),
(219, 'Uruguay'),
(220, 'Faroe Islands'),
(221, 'Fiji'),
(222, 'Philippines'),
(223, 'Finland'),
(224, 'Falkland Islands (Malvinas)'),
(225, 'France'),
(226, 'French Guiana'),
(227, 'French Polynesia'),
(228, 'French Southern Territories'),
(229, 'Croatia'),
(230, 'Central African Republic'),
(231, 'Chad'),
(232, 'Montenegro'),
(233, 'Czech Republic'),
(234, 'Chile'),
(235, 'Switzerland'),
(236, 'Sweden'),
(237, 'Svalbard and Jan Mayen'),
(238, 'Sri Lanka'),
(239, 'Ecuador'),
(240, 'Equatorial Guinea'),
(241, 'Åland Islands'),
(242, 'El Salvador'),
(243, 'Eritrea'),
(244, 'Estonia'),
(245, 'Ethiopia'),
(246, 'South Africa'),
(247, 'South Georgia and the South Sandwich Islands'),
(248, 'South Ossetia'),
(249, 'South Sudan'),
(250, 'Jamaica'),
(251, 'Japan');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contries`
--
ALTER TABLE `contries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contries`
--
ALTER TABLE `contries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
