-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2017 at 12:13 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuntube`
--

-- --------------------------------------------------------

--
-- Table structure for table `embeded`
--

CREATE TABLE `embeded` (
  `id` int(11) NOT NULL,
  `video_link` text NOT NULL,
  `page_link` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `code_link` text NOT NULL,
  `page` varchar(10) NOT NULL,
  `page_id` varchar(50) NOT NULL,
  `page_id_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `embeded`
--

INSERT INTO `embeded` (`id`, `video_link`, `page_link`, `title`, `code_link`, `page`, `page_id`, `page_id_id`) VALUES
(1, 'https://www.youtube.com/watch?v=fabm0XY-Ylw', 'https://www.facebook.com/Koora.Inc/', 'Classico', 'fabm0XY-Ylw', 'facebook', 'KOORA', 'Koora.Inc'),
(2, 'https://www.youtube.com/watch?v=WekGVdBqtVI', 'https://www.youtube.com/channel/UCP6YrHRe_gjDuBayaP6dNzQ', 'Atlitico', 'WekGVdBqtVI', 'youtube', 'UCP6YrHRe_gjDuBayaP6dNzQ', ''),
(3, 'https://www.youtube.com/watch?v=-4nR0-s-a1Q', 'https://www.youtube.com/channel/UCy-FfA7HF1RP8y7D7u2vBBw', 'Benzema', '-4nR0-s-a1Q', 'youtube', 'UCy-FfA7HF1RP8y7D7u2vBBw', ''),
(4, 'https://www.youtube.com/watch?v=pgDeOZYYMt0', 'https://twitter.com/Cristiano?lang=en', 'CR7', 'pgDeOZYYMt0', 'twitter', 'Cristiano?lang=en', ''),
(5, 'https://www.youtube.com/watch?v=WWV2ynLoQzo', 'https://www.mshkelty.com/', 'Mshkelty', 'WWV2ynLoQzo', 'website', 'https://www.mshkelty.com/', ''),
(6, 'https://www.youtube.com/watch?v=FsnMs_m83rg', 'https://twitter.com/Cristiano', 'Cr7 Twittrer', 'FsnMs_m83rg', 'twitter', 'Cristiano', ''),
(7, 'https://www.youtube.com/watch?v=0wn6wm4dOzc', 'https://twitter.com/Cristiano', 'Twitter', '0wn6wm4dOzc', 'twitter', 'Cristiano', ''),
(8, 'https://www.youtube.com/watch?v=g-XLvg50jZs', 'https://www.facebook.com/propertyfinder.eg/?hc_ref=ARQ6dhfGhEaeX-0HtDVxv3nGnOMEPT_zFMniPo2xJv9auyz20BGhjYiU_eDb8s13ndw&fref=nf', 'propertyfinder', 'g-XLvg50jZs', 'facebook', 'propertyfinder', 'propertyfinder.eg'),
(9, 'https://www.youtube.com/watch?v=1l5Ezg0nQww', 'https://www.facebook.com/Koora.Inc/', 'KORA', '1l5Ezg0nQww', 'facebook', 'KOORA', 'Koora.Inc'),
(10, 'https://www.youtube.com/watch?v=fB0xbn2Kpeg', 'https://www.youtube.com/channel/UC9ZDa9DoP-P6PdimRgz6PVQ', 'ISCO', 'fB0xbn2Kpeg', 'youtube', 'UC9ZDa9DoP-P6PdimRgz6PVQ', ''),
(11, 'https://www.youtube.com/watch?v=Ey7Qw16On18', 'https://www.youtube.com/channel/UCPes253HyFFdebGZLG6L0DA', 'hhh', 'Ey7Qw16On18', 'youtube', 'UCPes253HyFFdebGZLG6L0DA', ''),
(13, 'https://www.youtube.com/watch?v=oIowZiM41kQ', 'https://www.mshkelty.com/', 'New Test', 'oIowZiM41kQ', 'website', 'https://www.mshkelty.com/', ''),
(14, 'https://www.youtube.com/watch?v=e0hVcATVlmE', 'https://www.mshkelty.com/', 'Mshkelty new', 'e0hVcATVlmE', 'website', 'https://www.mshkelty.com/', ''),
(15, 'https://www.youtube.com/watch?v=fB0xbn2Kpeg', 'https://www.mshkelty.com/', 'Hello', 'fB0xbn2Kpeg', 'website', 'https://www.mshkelty.com/', ''),
(16, 'https://www.youtube.com/watch?v=26_3tWGnM_w', 'https://www.mshkelty.com/', '1111', '26_3tWGnM_w', 'website', 'https://www.mshkelty.com/', ''),
(17, 'https://www.youtube.com/watch?v=oIowZiM41kQ', 'https://www.mshkelty.com/', 'okayyyyyy', 'oIowZiM41kQ', 'website', 'https://www.mshkelty.com/', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `embeded`
--
ALTER TABLE `embeded`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `embeded`
--
ALTER TABLE `embeded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
