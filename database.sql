-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2023 a las 15:56:57
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rent-management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`chat_id`, `name`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, 'none'),
(11, 'none'),
(12, 'none'),
(13, 'none'),
(14, 'none'),
(15, 'none'),
(16, 'none'),
(17, 'none'),
(18, 'none'),
(19, 'none'),
(20, 'none'),
(21, 'none'),
(22, 'none'),
(23, 'none'),
(24, 'none'),
(25, 'none'),
(26, 'none'),
(27, 'none'),
(28, 'none'),
(29, 'none');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_user`
--

CREATE TABLE `chat_user` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat_user`
--

INSERT INTO `chat_user` (`chat_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 2),
(3, 3),
(8, 6),
(8, 2),
(9, 6),
(9, 3),
(11, 7),
(11, 2),
(13, 7),
(13, 3),
(15, 8),
(15, 2),
(17, 8),
(17, 3),
(27, 11),
(27, 2),
(29, 11),
(29, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`message_id`, `timestamp`, `content`, `user_id`, `chat_id`) VALUES
(1, '2023-02-13 15:24:39', 'Good morning, sir, I have made the payment for this month\'s rent.', 1, 2),
(2, '2023-02-13 15:27:26', 'This is the screenshot.', 1, 2),
(3, '2023-02-13 15:27:26', 'https://pbs.twimg.com/media/ETVQdB9UUAAxMSX?format=jpg&name=large', 1, 2),
(4, '2023-02-13 19:44:40', 'Ok, let me check my account.', 3, 2),
(5, '2023-02-14 05:45:24', 'Ok.', 1, 2),
(6, '2023-02-14 12:54:13', 'Sir, I have made another payment. Please check your account.', 1, 2),
(7, '2023-02-14 12:56:02', 'I have accepted your payment.', 3, 2),
(15, '2023-02-14 14:42:33', 'Good morning, I have made this month\'s payment, the reference is 4405.', 1, 2),
(16, '2023-02-14 14:44:47', 'Yes, I received, I will accept it in a while.', 3, 2),
(17, '2023-02-14 14:47:52', 'Hello, Rand, please remember the payment of the rent is by the end of each month. Please also remenber to update your account information.', 3, 29),
(18, '2023-02-14 14:48:43', 'Ok, thank you.', 11, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('REVIEWING','ACCEPTED','DECLINED','') NOT NULL DEFAULT 'REVIEWING',
  `amount` double NOT NULL,
  `paid_by` enum('CASH','NEFT','CHEQUE','') NOT NULL,
  `reference` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `rent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id`, `date`, `status`, `amount`, `paid_by`, `reference`, `user_id`, `rent_id`) VALUES
(1, '2023-01-25', 'ACCEPTED', 20000, 'NEFT', '8485', 1, 1),
(2, '2023-02-12', 'ACCEPTED', 20000, 'NEFT', '7923', 1, 1),
(11, '2023-02-14', 'ACCEPTED', 20000, 'NEFT', '4405', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `initial_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `total_amount` double NOT NULL,
  `monthly_amount` double NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rent`
--

INSERT INTO `rent` (`id`, `initial_date`, `end_date`, `total_amount`, `monthly_amount`, `shop_id`, `user_id`) VALUES
(1, '2023-01-01', '2024-01-01', 1000000, 100000, 1, 1),
(4, '2023-01-01', '2023-09-01', 80000, 20000, 4, 6),
(7, '2023-02-14', '2023-02-14', 100000, 20000, 6, 7),
(9, '2023-02-01', '2023-10-14', 100000, 20000, 8, 8),
(11, '2023-02-01', '2023-12-14', 100000, 20000, 14, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`) VALUES
(1, 'Tecnological Revolution'),
(4, 'Ramen Kitchen'),
(5, 'Not set'),
(6, 'Not set'),
(7, 'Not set'),
(8, 'Nintendo'),
(9, 'Not set'),
(10, 'Not set'),
(11, 'Not set'),
(12, 'Dilema'),
(13, 'Not set'),
(14, 'Microsoft');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tenant_details`
--

CREATE TABLE `tenant_details` (
  `id` int(11) NOT NULL,
  `profile_picture` longblob,
  `aadhaar_number` text NOT NULL,
  `eb_number` text NOT NULL,
  `address` text NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tenant_details`
--

INSERT INTO `tenant_details` (`id`, `profile_picture`, `aadhaar_number`, `eb_number`, `address`, `shop_id`, `user_id`) VALUES
(1, NULL, '1010 5040 2050', 'EB-G1-20', 'Bucaramang, India', 1, 1),
(4, NULL, '1234 5678 9011', 'MU-30-IN', 'Bangladesh, India', 4, 6),
(5, NULL, 'Not set', 'Not set', 'Not set', 6, 7),
(6, NULL, 'Not set', 'Not set', 'Not set', 8, 8),
(9, NULL, '4040 0343 2943', 'EB-20-UN', 'Mocaranga, India', 14, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `type` enum('ADMINISTRATOR','OWNER','TENANT','') NOT NULL DEFAULT 'TENANT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `phone_number`, `password`, `type`) VALUES
(1, 'Naram Gara', '1234567890', '12345', 'TENANT'),
(2, 'Administrator', 'administrator', '12345', 'ADMINISTRATOR'),
(3, 'Owner', 'owner', '12345', 'OWNER'),
(6, 'Kalpana Menon\r\n', '02225243263', '12345', 'TENANT'),
(7, 'Najeem Sudan', '2345670134', '12345', 'TENANT'),
(8, 'Ishaan Ghul', '2525223', '12345', 'TENANT'),
(10, 'Raas a Guul', '542345', '12345', 'TENANT'),
(11, 'Rand Thor', '348605', '12345', 'TENANT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indices de la tabla `chat_user`
--
ALTER TABLE `chat_user`
  ADD KEY `chat_id` (`chat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_id` (`chat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rent_id` (`rent_id`);

--
-- Indices de la tabla `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indices de la tabla `tenant_details`
--
ALTER TABLE `tenant_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tenant_details`
--
ALTER TABLE `tenant_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat_user`
--
ALTER TABLE `chat_user`
  ADD CONSTRAINT `chat_user_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`chat_id`),
  ADD CONSTRAINT `chat_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`chat_id`);

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`rent_id`) REFERENCES `rent` (`id`);

--
-- Filtros para la tabla `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `tenant_details`
--
ALTER TABLE `tenant_details`
  ADD CONSTRAINT `tenant_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenant_details_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
