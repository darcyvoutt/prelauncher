<?php 

CREATE TABLE `subscribers` (
`id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `count` smallint(6) NOT NULL,
  `referrer` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;


INSERT INTO `subscribers` (`id`, `email`, `ip_address`, `created_date`, `count`, `referrer`) VALUES
(1, 'test@gmail.com', '174.118.55.39', '2015-05-07 04:25:38', 0, ''),
(3, 'darcyvoutt@gmail.com', '::1', '2015-05-08 04:09:01', 0, ''),
(4, 'sa@gmail.com', '127.0.0.1', '2015-05-08 04:15:40', 0, ''),
(5, 'sdmas@gmail.com', '::1', '2015-05-08 04:17:15', 0, ''),
(6, 'sadasmda@gmail.com', '::1', '2015-05-08 04:59:43', 2, ''),
(7, 'askdmaskdma@gmail.com', '::1', '2015-05-08 04:35:34', 0, ''),
(8, 'asdkasmdkam@gmail.com', '::1', '2015-05-08 05:25:48', 1, ''),
(9, 'askdkasd@gmail.com', '::1', '2015-05-08 04:41:27', 0, '6'),
(10, 'masndajnda@gmail.com', '::1', '2015-05-08 04:44:07', 0, '6'),
(11, 'sadkasmdkamsdkmas@gmail.com', '::1', '2015-05-08 04:44:27', 0, '6'),
(12, 'flag@gmail.com', '::1', '2015-05-08 04:59:11', 0, '6'),
(13, 'somethingelse@gmail.com', '::1', '2015-05-08 04:59:43', 0, '6'),
(14, 'sub_id@gmail.com', '::1', '2015-05-08 05:13:59', 0, ''),
(15, 'somethingnew@gmail.com', '::1', '2015-05-08 05:25:48', 0, '8'),
(16, 'daryvoutt@gmail.com', '::1', '2015-05-15 22:00:22', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
 ADD PRIMARY KEY (`id`), ADD KEY `email` (`email`,`created_date`), ADD KEY `referrer` (`referrer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;