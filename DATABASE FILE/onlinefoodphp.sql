-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 01:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`, `rs_id`) VALUES
(1, 'admin', 'admin', 'cb.admin@amrita.edu', '', '2023-06-03 13:51:23', 143),
(3, 'MainCanteen', 'maincanteen', 'cb.maincanteen@amrita.edu', '', '2023-05-13 13:20:19', 7),
(4, 'ITCanteen', 'itcanteen', 'cb.itcanteen@amrita.edu', '', '2023-05-13 13:22:40', 8),
(5, 'MBACanteen', 'mbacanteen', 'cb.mbacanteen@amrita.edu', '', '2023-05-13 13:23:34', 9);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  `fc_id` int(11) NOT NULL,
  `calories` float NOT NULL,
  `est_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`, `fc_id`, `calories`, `est_time`) VALUES
(19, 7, 'Battura', 'Battura is fried puffed bread traditionally served with chola (chickpeas). The combination, called Chola Batura. ', 18.00, '646bafd5d7be9.jpg', 6, 136, 90),
(21, 7, 'Panner Butter Masala', 'Paneer Butter Masala is a creamy, rich, mildly sweet gravy made with onion tomato base, rich in butter and cream.', 70.00, '646ba8da9d0d7.jpg', 8, 660, 30),
(22, 7, 'Aloo Masala', 'Aloo Masala is a South Indian side dish of boiled potatoes, tempered with spices and herbs.', 40.00, '646bae13d551e.jpg', 8, 174, 0),
(23, 7, 'Parotta', 'Parotta is a layered flatbread popular in Tamilnadu and Kerala, traditionally made using maida (all-purpose flour).', 15.00, '646bb13dc1823.jpg', 6, 327, 0),
(24, 7, 'Ghee Roast', 'Dosa ghee roast has the rich aroma of ghee and a wonderful texture that is crisp and golden coloured on the outer side', 60.00, '646bb234cae48.jpg', 6, 200, 0),
(25, 7, 'Podi Roast', 'Podi Dosa is a spicy and delicious dosa recipe with idli milagai podi.', 50.00, '646bb3227e6e0.jpg', 6, 140, 0),
(26, 7, 'Plain Roast ', 'Plain Roast is a delicious South Indian crepe made from fermented rice and lentil batter, crispy on the outside and soft on the inside.', 50.00, '646bb43ea6f92.jpg', 6, 120.9, 0),
(27, 8, 'Egg Fried Rice', 'Egg fried rice is a flavorful and popular dish made by stir-frying cooked rice with scrambled eggs and various ingredients.', 90.00, '646c5406006c4.jpg', 6, 362, 0),
(28, 8, 'Double Omlette', 'Double omelette is a delicious breakfast or brunch option made by folding two fluffy omelettes together, often filled with a variety of ingredients.', 30.00, '646c54cb68b00.jpg', 9, 59, 0),
(29, 9, 'Watermelon Juice', 'Refreshing and hydrating, watermelon juice is a delightful summer beverage made by blending juicy watermelon chunks into a smooth and fruity drink.', 30.00, '646c56803a185.jpg', 3, 150, 0),
(30, 9, 'Gobi Fried Rice', 'Gobi fried rice is a tasty and aromatic dish where fragrant basmati rice is stir-fried with flavorful spices, tender cauliflower florets, and other delicious ingredients.', 70.00, '646c5718772d5.jpg', 6, 237, 80),
(36, 8, 'Vada ', 'Vada is a popular South Indian breakfast snack of donut shaped lentil fritters that are fluffy, crispy, soft and delicious.', 15.00, '6487aabccff2a.jpeg', 6, 120, 120);

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `fc_id` int(11) NOT NULL,
  `fc_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`fc_id`, `fc_name`) VALUES
(1, 'Starters'),
(3, 'Juices & Milkshakes'),
(4, 'Chat Items'),
(6, 'Main Course'),
(7, 'Ice Cream'),
(8, 'Curries'),
(9, 'Bakes & Snacks'),
(10, 'Sweets & Puddings'),
(11, 'Chinese'),
(12, 'Hot Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03'),
(13, 11, 'closed', 'Have a Great Meal !!!!', '2023-05-09 12:06:26'),
(14, 12, 'closed', 'have a great meal', '2023-05-10 05:05:08'),
(15, 13, 'rejected', '', '2023-05-13 13:02:39'),
(16, 14, 'closed', '', '2023-05-22 13:59:28'),
(17, 15, 'rejected', 'wergr', '2023-05-22 14:12:39'),
(18, 13, 'in process', 'Done', '2023-05-22 18:43:37'),
(19, 13, 'rejected', 'sry', '2023-05-22 18:45:21'),
(20, 13, 'in process', 'heheh', '2023-05-22 18:45:42'),
(21, 13, 'rejected', 'sffewf', '2023-05-22 18:53:22'),
(22, 13, 'closed', 'sefewf', '2023-05-22 18:53:42'),
(23, 13, 'in process', 'rretrt', '2023-05-22 18:55:44'),
(24, 13, 'closed', 'efewf', '2023-05-22 18:56:00'),
(25, 13, 'rejected', 'sefesf', '2023-05-22 18:56:43'),
(26, 13, 'in process', 'esfef', '2023-05-22 18:57:18'),
(27, 13, 'closed', 'aefef', '2023-05-22 18:57:32'),
(28, 16, 'closed', '', '2023-05-23 07:50:13'),
(29, 18, 'closed', '', '2023-05-23 08:05:24'),
(30, 13, 'in process', 'jhgty', '2023-05-29 07:35:06'),
(31, 13, 'closed', 'Hello Delivered', '2023-05-30 06:15:12'),
(32, 33, 'rejected', 'Sry brooo', '2023-05-30 06:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `created_date`) VALUES
(7, 1, 'Main Canteen', '8am', '10pm', 'All Days', 'Beside Amriteshwari Hall, AB1\r\n', '645a46100dbf7.jpg', '2023-05-09 13:09:36'),
(8, 2, 'IT Canteen', '8am', '8pm', 'All Days', 'Near AB3 ', '645a7469b5804.jpg', '2023-05-09 16:27:21'),
(9, 1, 'MBA Canteen', '8am', '8pm', 'All Days', 'Beside ASB Block', '645a74f9b80d6.jpg', '2023-05-09 16:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Veg', '2023-05-09 12:32:31'),
(2, 'NonVeg', '2023-05-09 12:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Academic Program` varchar(222) NOT NULL,
  `Admitted Branch` varchar(222) NOT NULL,
  `Section` varchar(222) NOT NULL,
  `Class Advisor` varchar(222) NOT NULL,
  `Joining Year` int(222) NOT NULL,
  `Gender` varchar(222) NOT NULL,
  `Date of Birth` date DEFAULT NULL,
  `Blood Group` varchar(222) NOT NULL,
  `balance` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `status`, `date`, `Academic Program`, `Admitted Branch`, `Section`, `Class Advisor`, `Joining Year`, `Gender`, `Date of Birth`, `Blood Group`, `balance`, `pin`) VALUES
(8, 'CB.EN.U4CSE20621', 'Harsha', 'Vardhan', 'tadikonda.shiva@yahoo.com', '9652938412', 'a9b59d7179830e6eecae0ba954503370', 1, '2023-06-02 18:03:48', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Vidhya S', 2020, 'Male', '2003-01-24', 'A+', 15, 1234),
(9, 'CB.EN.U4CSE20611', 'Yash', 'chowta', 'yashoosworld@gmail.com', '9502790992', '25f9e794323b453885f5181f1b624d0b', 1, '2023-06-04 13:30:14', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Vidhya S', 2020, 'Male', '2003-01-01', 'O+', 11, 1234),
(39, 'CB.EN.U4CSE20603', 'Deepthi Reddy', 'Alety', 'deepthireddy03@gmail.com', '7894561233', 'fcea920f7412b5da7be0cf42b8c93759', 1, '2023-05-22 19:06:47', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Ramya G R', 2020, 'Female', '2003-07-07', 'B+', 0, 1234),
(40, 'CB.EN.U4CSE20654', 'Priyatha Reddy', 'S L', 'priya@gmail.com', '9573732697', '0b1c8bc395a9588a79cd3c191c22a6b4', 1, '2023-05-22 19:07:12', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Ramya G R', 2020, 'Female', '2002-12-31', 'A+', 0, 1234),
(41, 'CB.EN.U4CSE20639', 'Karthik', 'Mukkanti', 'karthik@gmail.com', '9874563217', '02adcec2263d2127269fcd769c33f029', 1, '2023-05-22 19:07:15', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Ramya G R', 2020, 'Male', '2003-04-08', 'O+', 0, 1234),
(42, 'CB.EN.U4MEE20144', 'Sreedhar', ' Balaji G ', 'sreedhar@gmail.com', '7412589632', '64e1b13a22d3ae8ebf72ec3e2a0eb213', 1, '2023-05-22 19:07:18', 'B.Tech', 'Mechanical Engineering (MEE)', 'A', 'Bhaskar A', 2020, 'Male', '2003-06-28', 'A+', 0, 1234),
(43, 'CB.EN.U4CSE20271', 'Ashish   ', 'Yenepuri ', 'ashish@gmail.com', '8965471235', '7b69ad8a8999d4ca7c42b8a729fb0ffd', 1, '2023-05-22 19:07:21', 'B.Tech', 'Computer Science Engineering (CSE)', 'C', 'Venkat R', 2020, 'Male', '2003-10-03', 'B+', 0, 1234),
(44, 'CB.EN.U4ECE20213', 'Dharun', 'Kumar S', 'dharun@gmail.com', '7894561236', '4ccd8a3d5219d3145fe00f00bc843aec', 1, '2023-05-22 19:07:24', 'B.Tech', 'Electronics and Communication Engineering (ECE)', 'B', 'Goutham C', 2020, 'Male', '2003-08-26', 'O+', 0, 1234),
(45, 'CB.EN.U4ELC20017', 'Saketh', 'Desini', 'saketh@gmail.com', '8523697412', '47097357fa18466c03efe81b056677d0', 1, '2023-05-22 19:07:29', 'B.Tech', 'Electronics & Computers Engineering (ELC)', 'C', 'Bhuvan M', 2020, 'Male', '2003-03-10', 'A+', 0, 1234),
(46, 'CB.EN.U4CSE20143', 'Mahesh Sai', 'Mullapudi', 'mahesh@gmail.com', '7891236548', '49bb197bec17b7d20b2df6b1f3c3434a', 1, '2023-05-22 19:07:31', 'B.Tech', 'Computer Science Engineering (CSE)', 'B', 'Bhagavathi Sivakumar', 2020, 'Male', '2003-02-01', 'O+', 0, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `rs_id`) VALUES
(12, 7, 'Lime Juice', 3, 20.00, 'closed', '2023-05-01 13:53:01', 7),
(13, 8, 'Lime Juice', 1, 20.00, 'closed', '2023-05-06 13:53:15', 7),
(14, 8, 'Battura', 1, 18.00, 'closed', '2023-06-11 00:47:41', 8),
(15, 8, 'Battura', 1, 18.00, 'rejected', '2023-05-03 13:53:18', 7),
(16, 8, 'Lime Juice', 1, 20.00, 'closed', '2023-06-05 18:41:20', 8),
(18, 9, 'Lime juice', 3, 20.00, 'closed', '2023-06-10 22:03:23', 7),
(19, 9, 'Battura', 1, 20.00, 'closed', '2023-06-10 22:03:33', 7),
(20, 9, 'Lime Juice', 1, 20.00, 'closed', '2023-06-05 02:57:24', 7),
(21, 9, 'Battura', 1, 18.00, 'preapring', '2023-06-03 02:59:40', 7),
(22, 9, 'Battura', 2, 18.00, 'preparing', '2023-06-05 02:57:54', 7),
(23, 9, 'Battura', 1, 18.00, 'closed', '2023-06-05 18:41:26', 9),
(24, 9, 'Lime Juice', 1, 20.00, 'rejected', '2023-06-05 02:58:34', 7),
(25, 8, 'Lime Juice', 2, 20.00, 'closed', '2023-06-11 00:47:52', 9),
(26, 8, 'Lime Juice', 2, 20.00, 'rejected', '2023-06-03 02:58:44', 7),
(27, 9, 'Lime Juice', 1, 20.00, 'closed', '2023-06-03 02:58:48', 7),
(28, 9, 'Parotta', 1, 15.00, 'closed', '2023-06-03 02:59:33', 7),
(29, 8, 'Battura', 2, 18.00, 'closed', '2023-06-03 02:59:01', 7),
(30, 8, 'Lime Juice', 2, 20.00, 'closed', '2023-06-03 02:59:26', 7),
(31, 8, 'Lime Juice', 2, 20.00, NULL, '2023-06-03 13:53:58', 7),
(32, 8, 'Battura', 2, 18.00, NULL, '2023-06-03 13:53:58', 7),
(33, 8, 'Parotta', 1, 15.00, 'rejected', '2023-06-03 13:53:58', 7),
(34, 8, 'Battura', 1, 18.00, NULL, '2023-06-03 13:53:58', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`fc_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `fc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
