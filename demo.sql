
--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `orders_cnt` int(11) DEFAULT NULL,
  `questions_cnt` int(11) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `orders_cnt`, `questions_cnt`, `city_name`) VALUES
(1, 10, 20, 'Cairo'),
(2, 30, 50, 'Alex'),
(3, 70, 90, 'Port Said'),
(4, 35, 88, 'Luxor');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `orders_cnt` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `orders_cnt`, `city_id`) VALUES
(1, 'Hand Craft', 40, 1),
(2, 'Delivery', 150, 2),
(3, 'Voicing', 30, 3),
(4, 'Content Creation', 70, 4);

-- --------------------------------------------------------

--
-- Table structure for table `social_platforms`
--

CREATE TABLE `social_platforms` (
  `id` int(11) NOT NULL,
  `social_name` varchar(255) NOT NULL,
  `cnt` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_platforms`
--

INSERT INTO `social_platforms` (`id`, `social_name`, `cnt`, `city_id`) VALUES
(1, 'Facebook', 50, 1),
(2, 'Youtube', 90, 2),
(3, 'Twitter', 30, 3),
(4, 'Instagram', 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `vote_name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `vote_type` tinyint(1) NOT NULL DEFAULT '1',
  `cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `vote_name`, `city_id`, `vote_type`, `cnt`) VALUES
(1, 'Vote Yes', 1, 1, 250),
(2, 'Vote Yes', 2, 2, 500),
(3, 'Vote Yes', 3, 3, 750),
(4, 'Vote Yes', 4, 4, 1200),
(5, 'Vote NO', 1, 1, 300),
(6, 'Vote NO', 2, 2, 400),
(7, 'Vote NO', 3, 3, 500),
(8, 'Vote NO', 4, 4, 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_platforms`
--
ALTER TABLE `social_platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_platforms`
--
ALTER TABLE `social_platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


