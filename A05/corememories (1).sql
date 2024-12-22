-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 04:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, '', 'She is incredibly optimistic, always finding the bright side in every situation, and her positivity has a way of inspiring those around her to do the same.', NULL),
(2, 1, '', 'Her ability to see the bright side in any situation brings joy to others. She teaches us that with the right mindset, every setback can turn into an opportunity.', NULL),
(3, 1, '', 'Loraine’s optimism is truly infectious. She has an amazing ability to find the good in every situation, turning challenges into opportunities. Her positivity lifts the spirits of everyone around her, making even the hardest moments feel easier.', NULL),
(4, 2, '', 'Every journey is a new story waiting to be written. From scaling the peaks of majestic mountains to wandering through vibrant city streets, I find joy in embracing the unknown. Each adventure offers a chance to discover new cultures, meet fascinating people, and experience the thrill of exploring un', NULL),
(5, 2, 'img/travel1.jpg', '', NULL),
(6, 2, 'img/travel2', '', NULL),
(7, 3, '', 'The Pageant Era was a defining moment of confidence, grace, and discipline. This phase nurtured my ability to present myself with poise and embrace challenges in the spotlight.', NULL),
(8, 3, '', 'My Sporty Era taught me the importance of resilience, teamwork, and perseverance. It was during this time that I learned to push my limits and thrive under pressure, both physically and mentally.', NULL),
(9, 3, '', 'The Dancer Era was a journey of emotional release and creative expression. It refined my ability to convey emotions through movement and connect with others in a more profound, graceful manner.', NULL),
(10, 4, '', 'To my family, words can never fully express how grateful I am for your constant love, support, and understanding. You are my strength, my joy, and the reason for all the smiles I carry every day. I cherish every moment we share and look forward to many more. Thank you for always being there, no matt', NULL),
(11, 4, '', 'Life often presents us with crossroads—moments of choice that define our future. These crossroads are symbolic of independence, a phase where we must rely on ourselves, our values, and our vision.', NULL),
(12, 4, '', 'Making informed and thoughtful choices to navigate life\'s complexities.', NULL),
(13, 1, NULL, 'Loraine’s optimism creates an uplifting atmosphere, where even the toughest moments become easier to face together.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'The Optimist', 'Radiates positivity and finds the best in every situation', 'Loraine\'s optimism is her superpower. Like Joy, she radiates positivity and finds the best in every situation.', '#FFEB3B', 'img/joy.png', 'active'),
(2, 'Thoughtful Explorer', 'Loves trying new things and exploring the world', 'The Explorer within her loves trying new things, whether it’s traveling to new places, meeting new people, or diving into different hobbies.', '#FFCDD2', 'img/d1.jpg', 'active'),
(3, 'The Competitor', 'Highly driven to achieve goals, both individually and as part of a team', 'Loraine has a strong desire to win and would be highly driven to achieve her goals, both individually and as part of a team.', '#B2DFDB;', 'img/fear.png', 'active'),
(4, 'Loving Soul', 'Offers kindness and warmth, always ready to listen and provide support', 'Loraine is loving, offering kindness and warmth to everyone around her, always ready to listen and provide support.', '#e9a2e6', 'img/saddd.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  MODIFY `islandOfPersonalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
