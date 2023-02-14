-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2023 a las 07:54:54
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
(13, 'none');

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
(4, 4),
(4, 2),
(5, 4),
(5, 3),
(6, 5),
(6, 2),
(7, 5),
(7, 3),
(8, 6),
(8, 2),
(9, 6),
(9, 3),
(11, 7),
(11, 2),
(13, 7),
(13, 3);

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
(5, '2023-02-14 05:45:24', 'Ok.', 1, 2);

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
(3, '2023-02-01', 'ACCEPTED', 40000, 'CHEQUE', '4523', 4, 2),
(4, '2023-01-25', 'ACCEPTED', 20000, 'CASH', '', 5, 3),
(5, '2023-02-13', 'REVIEWING', 10000, 'CASH', 'none', 1, 1),
(6, '2023-02-13', 'REVIEWING', 20000, 'CASH', 'none', 1, 1);

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
(2, '2023-01-01', '2023-11-01', 200000, 20000, 2, 4),
(3, '2023-01-01', '2023-04-01', 60000, 20000, 3, 5),
(4, '2023-01-01', '2023-09-01', 80000, 20000, 4, 6),
(6, '2023-01-14', '2023-09-14', 100000, 20000, 6, 7);

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
(2, 'Mobile World'),
(3, 'Technical Reparations Inc'),
(4, 'Ramen Kitchen'),
(5, 'Not set'),
(6, 'Not set');

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
(1, NULL, '1234 5678 9011', 'BE-10-IN', 'Bangladesh, India', 1, 1),
(2, NULL, '1234 5678 9011', 'ME-40-IN', 'Bangladesh, India', 2, 4),
(3, NULL, '1234 5678 9011', 'BG-39-IN', 'Bangladesh, India', 3, 5),
(4, NULL, '1234 5678 9011', 'MU-30-IN', 'Bangladesh, India', 4, 6),
(5, NULL, 'Not set', 'Not set', 'Not set', 6, 7);

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
(1, 'Narendra Gara', '123456789011', '12345', 'TENANT'),
(2, 'Administrator', 'administrator', '12345', 'ADMINISTRATOR'),
(3, 'Owner', 'owner', '12345', 'OWNER'),
(4, 'Lata Patla', '04424993266 \r\n', '12345', 'TENANT'),
(5, 'Om Sura', '02227467277 \r\n', '12345', 'TENANT'),
(6, 'Kalpana Menon\r\n', '02225243263', '12345', 'TENANT'),
(7, 'Najeem Sudan', '2345670134', '12345', 'TENANT');

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tenant_details`
--
ALTER TABLE `tenant_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
