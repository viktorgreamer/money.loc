-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 17 2019 г., 15:25
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
