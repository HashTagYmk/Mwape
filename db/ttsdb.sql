-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 02:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `guest_no` int(11) NOT NULL,
  `status` varchar(60) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `s_id`, `date`, `guest_no`, `status`, `added`, `type`) VALUES
(1, 1, 3, '2022-12-23', 2, 'pending', '2022-12-19 15:59:06', 'location'),
(3, 2, 2, '2022-12-23', 10, 'pending', '2022-12-20 19:50:03', 'location');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `description`, `image`, `user_id`, `added`) VALUES
(1, 'Lusaka City', 'Lusaka city skyline', 'images/1671462884_g-1.jpg', 2, '2022-12-19 17:16:51'),
(2, 'Nc\'wala Ceremony', 'Nc\'wala(Harvest) Is An Annual Traditional Ceremony Where The Ngoni People Of The Eastern Province Of Zambia Come Together During The Last Weekend Of February.', 'images/1671463243_mwendangombe3.jpg', 2, '2022-12-19 17:20:43'),
(3, 'Bungee Jumping, Livingstone', 'Bungee Jumping At The Victoria Falls', 'images/1671463309_g-3.jpg', 2, '2022-12-19 17:21:49'),
(4, 'David Livingsone Hotel', 'Located In Southern Province Of Zambia. Hospitality At Its Finest', 'images/1671463368_g-4.jpg', 2, '2022-12-19 17:22:48'),
(5, 'Lusaka\'s Heros Stadium', 'Heros National Stadium, Located In The Heart Of The Capital', 'images/1671463393_g-5.jpg', 2, '2022-12-19 17:23:13'),
(6, 'Victoria Falls, Livingstone', 'The Mighty Mosi-O-Tunya, The Smoke That Thunders. Victoria Falls At Twilight', 'images/1671463441_g-6.jpg', 2, '2022-12-19 17:24:01'),
(7, 'Zambian Local', 'Beautiful Zambian Local Raising The Nations Flag High', 'images/1671463465_g-7.jpg', 2, '2022-12-19 17:24:25'),
(8, 'Zambia\'s Freedom Statue', 'Zambia\'s Freedom Statue Symbolizing The Freedom From Colonial Rule', 'images/1671463488_g-8.jpg', 2, '2022-12-19 17:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  `rating` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`, `image`, `price`, `rating`, `user_id`, `modified`) VALUES
(1, 'The Kuomboka Ceremony', 'Kuomboka Is A Word In The Lozi Language; It Literally Means ‘To Get Out Of Water’. In Today\'s Zambia It Is Applied To A Traditional Ceremony That Takes Place At The End Of The Rain Season, When The Upper Zambezi River Floods The Plains Of The Western Province', 'images/1671404291_7-3.jpg', 90, 4, 2, '0000-00-00 00:00:00'),
(2, 'Blue Lagoon', 'Blue Lagoon Lies Only 120kms West Of Lusaka On The Kafue Flats And The Vast Floodplain Attracts Thousands Of Kafue Lechwe, Zebra, Sitatunga, Some Buffalo And Numerous Waterbirds. The Plains Are Fringed With Acacia Woodland.', 'images/1671442346_p-2.jpg', 90, 4, 2, '0000-00-00 00:00:00'),
(3, '37d Gallery', '37d Gallery Is Located Within A Beautiful Contemporary Building In The Kabulonga Area. The Gallery Holds A Wide Range Of Art Works By Both Local Zambian Artists And International Artists.', 'images/1671442391_p-3.jpg', 90, 4, 2, '0000-00-00 00:00:00'),
(4, 'Mukuni Big Five', 'Walk With The Kings Of The African Bush In This Amazing And Unique Experience With No Restraints. Just You And The Lions, A One On One Personal And Intimate Walk Right Next To You.', 'images/1671442422_p-4.jpg', 90, 4, 2, '0000-00-00 00:00:00'),
(5, 'Chimfunshi Wildlife Orphanage', 'Chimfunshi Wildlife Orphanage Is A Sanctuary For Chimpanzees, Located In Zambia\'s Copperbelt Province.', 'images/1671442497_p-5.jpg', 90, 4, 2, '0000-00-00 00:00:00'),
(6, 'Mokřady Bangweulu', 'The Bangweulu Wetlands Is A Wetland Ecosystem Adjacent To Lake Bangweulu In North-Eastern Zambia. The Area Has Been Designated As One Of The World\'s Most Important Wetlands By The Ramsar Convention, And An \"Important Bird Area\" By BirdLife International.', 'images/1671442557_p-6.jpg', 90, 4, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lodging`
--

CREATE TABLE `lodging` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  `rating` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lodging`
--

INSERT INTO `lodging` (`id`, `name`, `description`, `image`, `price`, `rating`, `user_id`, `modified`) VALUES
(7, 'Taj Pamodzi', 'A luxurious retreat in one the fastest growing and most hospitable cities in Africa, Taj Pamodzi, our 5 star hotel in Lusaka, is the undisputed choice for business and leisure travelers to the sparkling Zambian capital', 'images/1671587829_Superior_Room_-_Twin_3x2.jpg', 2101, 5, 2, '2022-12-21 03:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `phone_no` varchar(12) DEFAULT NULL,
  `password` longtext NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `joined` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `phone_no`, `password`, `is_admin`, `joined`) VALUES
(1, 'thomsimbeye@gmail.com', 'Thom', 'Simbeye', NULL, '$2y$10$dQrjFPClibhQR5N8TzofHeutgfcHHJcUzAKUyossVaT5oNetuMczW', 0, '2022-12-18 01:22:01'),
(2, 'admin@gmail.com', 'Admin', '', NULL, '$2y$10$i4JnZwFdn66BWocVa3WQeevDBQtt4Fsrv18TbZYKEmRVK9g1TR8oC', 1, '2022-12-18 01:34:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lodging`
--
ALTER TABLE `lodging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lodging`
--
ALTER TABLE `lodging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
