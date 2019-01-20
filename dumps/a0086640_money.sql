-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 17 2019 г., 15:36
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

-- --------------------------------------------------------

--
-- Структура таблицы `faqs`
--

CREATE TABLE `faqs` (
  `id` int(5) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `lg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `lg`) VALUES
(31, 'Where can I check my current balance?', 'The current balance is displayed on your main page. ', 1),
(32, 'How to withdraw?', '1. Sign in. \r\n2. Click on $ button, then on Withdraw. \r\n3. Follow the instructions for Bank Wire. \r\n4. Enter the amount which you want to withdraw. \r\n5. Click on Withdraw button. \r\n6. The funds will be withdrawn in 48 hours. ', 1),
(33, 'Are my funds secure? ', 'All funds are securely held at our bank partner. Customer securities accounts at Interactive Brokers LLC are protected by the Securities Investor Protection Corporation (\"SIPC\") for a maximum coverage of $500,000 (with a cash sublimit of $250,000) and under Interactive Brokers LLC\'s excess SIPC policy with certain underwriters at Lloyd\'s of London for up to an additional $30 million (with a cash sublimit of $900,000) subject to an aggregate limit of $150 million. ', 1),
(34, 'What payments are accepted by Nest Securities? ', 'Presently, we only accept Bank Wire for companies and enterprises and Bitcoin for individual customers. ', 1),
(35, 'I forgot my login/password. What shall I do? ', 'We recommend you to keep your password safe. But in case you lose it, there is a possibility to restore it on our Password Reset page. (Alternatively, use the support chat situated at the bottom right of this page). ', 1),
(36, 'Is there any limit on the amount of deposit? ', 'No. You can deposit as much as you find appropriate. ', 1),
(37, 'Is there a minimum/maximum timeframe for deposit? Do I have to keep funds for specific time? ', 'No. You can deposit and withdraw at any moment. ', 1),
(38, 'Do you sign any agreement with customer? ', 'Each customer agrees with User Agreement upon sign up. ', 1),
(39, 'How is the profit calculated? ', 'The profit is calculated one time each month. It is become visible in account statement.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `faqs1`
--

CREATE TABLE `faqs1` (
  `id` int(5) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `lg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faqs1`
--

INSERT INTO `faqs1` (`id`, `question`, `answer`, `lg`) VALUES
(1, 'Labore qui tenetur iste exercitationem.', 'Aut ut totam similique id eaque. Accusamus et error velit quibusdam unde. Veniam et facilis neque necessitatibus eum laborum non et. Odit rerum iusto soluta maiores omnis enim veniam. Rem facere tempora quas aut molestiae mollitia. Laboriosam iusto soluta nulla sunt deleniti sed deleniti.', 1),
(2, 'Deserunt dolor qui beatae repudiandae qui.', 'Cum et quo est nihil molestiae quod. Non est omnis maiores sapiente. Ea qui deleniti eos. Iusto temporibus et eos et fugiat id et. Sint optio porro dolore velit saepe harum quasi. Fugiat reiciendis maiores totam dolorum quis aperiam.', 1),
(3, 'Quo et commodi commodi hic doloremque est nam.', 'Voluptatem temporibus ut dolorem architecto ratione ipsam velit. Et numquam et qui nulla consequatur illum. Nostrum voluptatum et mollitia omnis enim. Qui est provident vero doloremque cumque sed consequuntur. Debitis a et commodi est commodi non corrupti reiciendis. Fuga et ut quos dolores corporis accusamus voluptas. Maxime minima officia deleniti harum sunt laborum magni.', 1),
(4, 'Labore ullam a sint dolorum est.', 'Ea eum temporibus ut ex. Et aut praesentium voluptate quam error. Itaque et aut maiores tempore. Officia illo molestias minus voluptas odio. Ut rerum ut esse enim rerum. Et dolorum vel et rerum distinctio. Aspernatur eos sed saepe deserunt.', 1),
(5, 'Sapiente enim exercitationem dolores.', 'Voluptatem ex sit repellendus harum et totam ea voluptas. Unde nemo ut totam eius similique hic nihil numquam. Laudantium quia similique voluptatem voluptates ipsam commodi ullam. Cum non quis deserunt et rerum. Consequuntur voluptatem necessitatibus animi nobis.', 1),
(6, 'Sit eaque aut est laborum.', 'Sint autem ducimus et. Et pariatur perferendis animi pariatur aut consequatur. Voluptatibus libero a temporibus vel sint. Voluptatem assumenda rerum est. Aut dignissimos autem tempore porro facere. Consectetur laudantium illum recusandae incidunt at et aliquam est. Laudantium fugiat omnis sed et illum illo.', 1),
(7, 'Quos ut laborum occaecati quae quo.', 'Odit voluptate doloremque velit sed sed quis. Ut laudantium blanditiis aut nostrum dignissimos perspiciatis omnis. Dolorem ut qui et qui ex occaecati. Tenetur quia a blanditiis sed aut officia. Possimus nulla voluptatem ratione. Saepe voluptate nesciunt at dolores aperiam ad unde. Ad dolorem dolores id commodi qui nostrum libero.', 1),
(8, 'Ea ad ut et quam.', 'Unde unde tenetur eaque ut quas soluta commodi. Facilis soluta consequuntur quia veniam in nulla. Qui porro atque consequatur perspiciatis officiis ut suscipit. Sint cum in facere. At vel vitae repellendus natus illum. Aspernatur cumque unde architecto ut porro eos non. Et praesentium dolorum impedit aut sed. Et deserunt ea architecto. Voluptatibus accusamus et nobis quidem.', 1),
(9, 'Rerum esse cum aut dicta eaque impedit.', 'Quas laborum ratione ullam soluta consequatur quas omnis. Maiores aspernatur incidunt est error asperiores sed. Suscipit modi ut aut facilis ut aspernatur voluptatum. Est delectus dolores minus. Dolor eos est sed. Accusamus et molestias voluptas.', 1),
(10, 'Nobis qui et cupiditate velit.', 'Debitis dolorem quibusdam distinctio doloribus quam repellat similique. Iste rerum aliquam occaecati sapiente eveniet laborum. Ab fuga debitis accusamus placeat quis. Sapiente nisi veritatis hic esse saepe occaecati. Hic qui earum consequuntur quibusdam rerum. Ratione sint sequi officiis debitis voluptatum qui.', 1),
(11, 'Eum ut ut omnis ipsam enim enim.', 'Soluta cupiditate voluptatibus dolorem labore quae. Harum quis nulla non sint itaque nihil. Quia optio qui quia. Ullam qui eum qui aut nesciunt vel fugit et. Cum explicabo et amet in totam aut. Deserunt eveniet aliquid non accusamus neque. Voluptatem sed culpa dicta fugiat quae. Autem illum voluptatem minus.', 1),
(12, 'Repellendus labore fuga sequi doloremque sint.', 'Ut aut impedit illo possimus adipisci optio. Sunt enim doloribus enim et magnam. Minima placeat qui quis omnis omnis non doloremque. Ea necessitatibus voluptatem molestias doloremque aspernatur non quod eius. Et ut fuga facere veniam.', 1),
(13, 'Deserunt consequuntur omnis omnis eaque amet.', 'Dignissimos aut nobis rerum atque. Et qui omnis pariatur quis eligendi doloremque dolore. Assumenda dignissimos possimus ut reiciendis eum. Facilis optio ullam numquam ab ex aut. Fuga consequatur dolorem sed accusantium. Ullam quia saepe aliquam perferendis impedit deleniti. Debitis doloribus quis ut corrupti.', 1),
(14, 'Et consequatur distinctio reiciendis dolor alias.', 'Perferendis esse eos omnis saepe accusantium laborum ut. Iste qui cum quod qui nostrum. Ab consequatur distinctio deserunt sequi exercitationem placeat voluptatem. Consectetur harum deserunt et ducimus. Unde est similique deserunt sint pariatur delectus aliquam. Mollitia suscipit aut nam aut alias placeat in.', 1),
(15, 'Veritatis similique ipsa voluptatem.', 'Quo quae sequi in quisquam fugiat accusamus. Omnis corporis eaque laboriosam fuga doloremque. Doloribus similique in incidunt soluta alias. Voluptatem neque neque ipsum pariatur dolor sit aut.', 1),
(16, 'Explicabo sint est esse ad.', 'Molestiae ut quibusdam est quia architecto sint deleniti. Mollitia magni placeat molestias ut veniam laborum officia omnis. Consectetur quas aspernatur dolorem vero. Architecto dolores est molestiae nihil maiores qui eum. Temporibus quia nihil quam sunt iure excepturi. Excepturi incidunt repudiandae neque et magnam cupiditate repudiandae facere.', 1),
(17, 'Dolor impedit rem minus.', 'Molestiae corrupti modi fugit fugiat voluptatem deserunt. Voluptatem consequatur laborum ducimus quidem dignissimos. Molestiae aspernatur odit repellat ut. Doloremque ullam recusandae aut quo. Suscipit in molestias dolore. Quidem nesciunt error sit fugiat. Ipsa fugit cum libero in sint aut. Vero veniam enim explicabo et quidem vitae.', 1),
(18, 'Error et laudantium rem accusantium vel.', 'Est amet rem neque repellat odit sequi. Et illum modi dolor ab ratione in aliquam. Sit voluptates voluptates quis fugit occaecati pariatur. Laudantium est et dolorum magnam qui. Voluptatem autem corporis modi ut ut eligendi voluptatem corrupti. Dolores et earum inventore et. Sed ut corporis non et minima aperiam numquam. Quia laudantium omnis id rem sunt et incidunt.', 1),
(19, 'Quo voluptatem molestiae qui illum.', 'Autem non eius tempora perferendis. Hic ut repellat quos ad et cupiditate commodi. Eaque et id reiciendis velit veniam assumenda libero. Sit quam magnam dolorem ut et odit non. Aut vel temporibus sint. Quis voluptas voluptas doloremque alias.', 1),
(20, 'Eum maiores rerum illum unde rem.', 'Dolorem eius atque et consectetur qui aspernatur. In quasi temporibus veritatis est. Maxime possimus fuga rerum perferendis voluptatem dolorum. Qui aut vero eum aspernatur est optio.', 1),
(21, 'Distinctio blanditiis praesentium soluta.', 'Omnis omnis laborum at molestias numquam. Quod quam qui ipsam. Est nemo consequatur beatae sunt officiis. Voluptate aliquid officiis laudantium non commodi dignissimos. Nostrum explicabo est ea omnis illo iusto. Quo nemo accusamus quisquam quae. Qui ducimus qui labore mollitia corrupti dolorem non.', 1),
(22, 'Officiis facere sed totam illo.', 'Placeat aspernatur aut doloribus repellendus veniam repudiandae deserunt. Reiciendis velit culpa ut eligendi nihil in. Non ipsam quo voluptate consequatur aut. Sit eos est in quasi. Fugiat aut occaecati quidem veritatis consequatur voluptas consequuntur. Cumque aliquam est ab nesciunt consequatur perspiciatis. Possimus quam itaque omnis praesentium sint. Quibusdam aut quia reiciendis rerum.', 1),
(23, 'Sequi qui quis dolores aut et.', 'Eius ipsam et assumenda quaerat a labore. Aperiam odit nihil et. Ut magni consequuntur voluptatem et ut et. Asperiores ut reprehenderit quis quas in incidunt magnam. Earum labore vel enim aut. Culpa excepturi ea aspernatur quos est ratione et. Vero perferendis aut vel excepturi aut. Odit ut perspiciatis unde omnis natus.', 1),
(24, 'Quia nam quia vero cupiditate illum.', 'Laborum nobis qui voluptatum hic perspiciatis ut nostrum. Tempore aperiam ratione iure aperiam dicta consequuntur cupiditate. Voluptatum ipsa et cum voluptatem tenetur animi eius ut. Magni blanditiis nihil molestiae praesentium id provident. Eveniet fuga officia in ipsum error sit. Consequatur incidunt est est veniam rerum aut est.', 1),
(25, 'Eum ad unde omnis veritatis.', 'Laboriosam cumque beatae eum consequuntur. Odio in accusamus doloribus consequatur. Amet sint et atque cupiditate quaerat. Voluptates dolorem et nemo occaecati omnis. Autem esse sit quisquam minima esse beatae eum. Et voluptatem minus quia. Expedita est perferendis aut totam beatae esse. Ad non asperiores occaecati voluptatem veniam sint. Facere aut ad fugit aliquam at.', 1),
(26, 'Corrupti qui nihil ut ab eos.', 'Amet ut est dicta consequatur. Similique in voluptate ab eos. Et dignissimos soluta numquam vitae harum nihil iusto. Nisi necessitatibus eligendi iusto ab nihil dolor odio eum. Rerum id cupiditate fugiat eos rem. Perspiciatis officiis ipsam a sed beatae ut et quia.', 1),
(27, 'Architecto atque non aliquam accusamus.', 'Omnis voluptas alias odio aliquid autem occaecati. Ea voluptatem est illo tempora quos. Voluptatem voluptates eaque quis eaque quam. Quia molestiae eligendi voluptates iusto qui et eligendi. Nemo quae perspiciatis facilis sequi sit. Porro quas nihil eveniet.', 1),
(28, 'Et quasi quia numquam aliquam maxime.', 'Expedita voluptatum maiores dolores voluptates. Qui quam aliquam quis aspernatur. Unde eius ipsam quo enim. Provident optio voluptates quia distinctio porro ut. Dolor accusantium totam nesciunt necessitatibus porro et laboriosam exercitationem. Possimus sit magnam doloremque et. Numquam sit mollitia ut officiis at sed vero molestiae. Minima non porro sed nobis.', 1),
(29, 'Tempore soluta ut enim molestiae quo earum.', 'Veniam totam ullam dicta ea adipisci distinctio soluta est. Voluptas repellat quia architecto mollitia in. Ut voluptatum consectetur quis cumque est sit harum cupiditate. Omnis mollitia odit perferendis voluptate. Minima animi excepturi qui mollitia aut. Incidunt ipsa sit asperiores non dolorum et nihil.', 1),
(30, 'Modi debitis minima officia ut.', 'Laudantium ipsa sapiente dolorem sit dolorem unde rem. Quia blanditiis et eius fugit. Quam et eum quae dolorum. Voluptatem voluptatem dolorem nostrum aliquid neque ea minima ex. Non tempore beatae ea nulla nostrum maiores ea. Vero voluptas et a odio dignissimos consequuntur. Fugiat illo voluptas eveniet esse. Et dolor odio qui quia sed.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'es', 'Hommamio'),
(2, 'es', 'Delete messagio'),
(3, 'es', 'Typerrio');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1547455154),
('m150207_210500_i18n_init', 1547455156);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `type` int(1) NOT NULL,
  `value` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `confirm_status` int(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `confirmed_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `type`, `value`, `status`, `confirm_status`, `created_at`, `confirmed_at`) VALUES
(1, 8, 1, 1234, 2, 0, 1547688700, 1547688733),
(2, 8, 2, 1234, 2, 0, 1547688773, 1547688803),
(3, 8, 1, 235232, 1, 0, 1547708904, NULL),
(4, 8, 1, 235232, 1, 0, 1547709078, NULL),
(5, 8, 1, 2, 1, 0, 1547709139, NULL),
(6, 8, 1, 2, 1, 0, 1547709197, NULL),
(7, 8, 1, 2, 1, 0, 1547709326, NULL),
(8, 8, 1, 235232, 1, 0, 1547709353, NULL),
(9, 8, 1, 235232, 1, 0, 1547709465, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `source_message`
--

INSERT INTO `source_message` (`id`, `category`, `message`) VALUES
(1, 'app', 'Home'),
(2, 'app', 'Delete'),
(3, 'app', 'Type'),
(4, 'app', 'About');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `company_name` varchar(256) DEFAULT NULL,
  `address_line1` varchar(256) NOT NULL,
  `address_line2` varchar(256) DEFAULT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `postal` int(6) NOT NULL,
  `country_id` int(3) NOT NULL,
  `lg` varchar(3) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `auth_key` varchar(256) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `password_reset_token` varchar(256) NOT NULL,
  `status` int(2) NOT NULL,
  `add_contacts` varchar(256) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `visited_at` int(11) DEFAULT NULL,
  `billing` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `sms` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `company_name`, `address_line1`, `address_line2`, `city`, `state`, `postal`, `country_id`, `lg`, `phone`, `birthday`, `email`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `add_contacts`, `created_at`, `updated_at`, `visited_at`, `billing`, `role`, `sms`) VALUES
(8, 'Viktor', 'Vasilev', 'Google', 'Волотовская д. 8', '', 'Великий Новгород', 'Новгородская область', 173000, 1, 'en', '+79217304030', '2019-01-08', 'viktorgreamer@gmail.com', 'viktor', 'rRt3JGSsV5Es8MXXlpD8xoaGvx-6U9FQ', '$2y$13$3nCjaPmhcyMdn0CgfPB./OmHlyGhstUXCe3qB4FAcqckbv9aYwn1G', '', 10, '', 1547646076, 1547646076, 1547711966, 940934, 2, 201468);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contries`
--
ALTER TABLE `contries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faqs1`
--
ALTER TABLE `faqs1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`),
  ADD KEY `idx_message_language` (`language`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_source_message_category` (`category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contries`
--
ALTER TABLE `contries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT для таблицы `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `faqs1`
--
ALTER TABLE `faqs1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
