-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 09:26 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Drama'),
(3, 'Thriller'),
(4, 'Adventure'),
(5, 'Comedy'),
(6, 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `quality` int(10) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `rating`, `duration`, `release_date`, `quality`, `cover`, `synopsis`, `genre`) VALUES
(45, 'Doctor Strange', 8, 120, '2017-03-03', 2, 'images/Doctor-Strange-Poster.jpg', 'Before he met the Sorcerer Supreme, Doctor Stephen Vincent Strange (Cumberbatch) was an unlikable and egotistical neurosurgeon. Everything changes when a car accident limits Strangeâ€™s use of his hands, sending him on a maddening quest for a miracle cure. This origin story introduces the magical and mystical realms of the Marvel Cinematic Universe.', 1),
(46, 'Resident Evil : The Final Chapter', 6, 120, '2016-12-13', 1, 'images/re.jpg', 'The T-virus unleashed by the evil Umbrella Corp. has spread to every corner of the globe, infesting the planet with zombies, demons and monsters. Alice (Milla Jovovich), a former Umbrella employee turned rogue warrior, joins her friends on a last-chance mission to storm the company''s headquarters located deep underneath what used to be Raccoon City. But the Red Queen (Ever Anderson) knows that Alice is coming, and the final battle will determine if the rest of mankind lives or dies.', 4),
(47, 'La La Land', 8, 128, '2016-12-25', 3, 'images/la la land.jpg', 'Sebastian (Ryan Gosling) and Mia (Emma Stone) are drawn together by their common desire to do what they love. But as success mounts they are faced with decisions that begin to fray the fragile fabric of their love affair, and the dreams they worked so hard to maintain in each other threaten to rip them apart.', 2),
(48, 'About Time', 9, 120, '2013-10-25', 1, 'images/at.jpg', 'When Tim Lake (Domhnall Gleeson) is 21, his father (Bill Nighy) tells him a secret: The men in their family can travel through time. Although he can''t change history, Tim resolves to improve his life by getting a girlfriend. He meets Mary (Rachel McAdams), falls in love and finally wins her heart via time-travel and a little cunning. However, as his unusual life progresses, Tim finds that his special ability can''t shield him and those he loves from the problems of ordinary life.', 2),
(49, 'Hitman', 6, 120, '2016-03-11', 1, 'images/h.jpg', 'A professional assassin known only as Agent 47 (Timothy Olyphant) gets caught up in a dangerous political takeover. He flees across Eastern Europe, hoping to find out who set him up and why. However, his growing attachment to a beautiful but traumatized young woman poses as great a threat to his survival as that of the Interpol and Russian agents who are hunting him down.', 1),
(50, 'Moana', 8, 120, '2016-11-23', 4, 'images/moana.jpg', 'An adventurous teenager sails out on a daring mission to save her people. During her journey, Moana meets the once-mighty demigod Maui, who guides her in her quest to become a master way-finder. Together they sail across the open ocean on an action-packed voyage, encountering enormous monsters and impossible odds. Along the way, Moana fulfills the ancient quest of her ancestors and discovers the one thing she always sought: her own identity.', 6),
(51, 'Wreck It Ralph', 9, 120, '2012-11-09', 2, 'images/w.jpg', 'Arcade-game character Wreck-It Ralph (John C. Reilly) is tired of always being the "bad guy" and losing to his "good guy" opponent, Fix-It Felix (Jack McBrayer). Finally, after decades of seeing all the glory go to Felix, Ralph decides to take matters into his own hands. He sets off on a game-hopping trip to prove that he has what it takes to be a hero. However, while on his quest, Ralph accidentally unleashes a deadly enemy that threatens the entire arcade.', 6),
(52, 'Fantastic Beasts and Where to Find Them', 8, 133, '2016-11-16', 4, 'images/f.jpg', 'The year is 1926, and Newt Scamander (Eddie Redmayne) has just completed a global excursion to find and document an extraordinary array of magical creatures. Arriving in New York for a brief stopover, he might have come and gone without incident, were it not for a No-Maj (American for Muggle) named Jacob, a misplaced magical case, and the escape of some of Newt''s fantastic beasts, which could spell trouble for both the wizarding and No-Maj worlds.', 4),
(53, 'Nocturnal Animals', 7, 117, '2016-10-14', 4, 'images/n.jpg', 'A successful Los Angeles art-gallery owner''s idyllic life is marred by the constant traveling of her handsome second husband. While he is away, she is shaken by the arrival of a manuscript written by her first husband, who she has not seen in years. The manuscript tells the story of a teacher who finds a trip with his family turning into a nightmare. As Susan reads the book, it forces her to examine her past and confront some dark truths.', 3),
(54, 'The Girl on the Train', 7, 112, '2016-10-27', 3, 'images/g.jpg', 'Commuter Rachel Watson (Emily Blunt) catches daily glimpses of a seemingly perfect couple, Scott and Megan, from the window of her train. One day, Watson witnesses something shocking unfold in the backyard of the strangers'' home. Rachel tells the authorities what she thinks she saw after learning that Megan is now missing and feared dead. Unable to trust her own memory, the troubled woman begins her own investigation, while police suspect that Rachel may have crossed a dangerous line.', 3),
(55, 'Central Intelligence', 8, 114, '2016-06-16', 1, 'images/ci.jpg', 'Bullied as a teen for being overweight, Bob Stone (Dwayne Johnson) shows up to his high school reunion looking fit and muscular. While there, he finds Calvin Joyner (Kevin Hart), a fast-talking accountant who misses his glory days as a popular athlete. Stone is now a lethal CIA agent who needs Calvin''s number skills to help him save the compromised U.S. spy satellite system. Together, the former classmates encounter shootouts, espionage and double-crosses while trying to prevent worldwide chaos.', 5),
(56, 'Why Him?', 9, 111, '2016-12-30', 1, 'images/wh.jpg', 'During the holidays, loving but overprotective Ned (Bryan Cranston) travels to California to visit his daughter Stephanie (Zoey Deutch) at Stanford University. While there, he meets his biggest nightmare: her well-meaning but socially awkward boyfriend Laird (James Franco). Even though Laird is a billionaire, Ned disapproves of his freewheeling attitude and unfiltered language. His panic level escalates even further when he learns that Laird plans to ask for Stephanie''s hand in marriage.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` int(11) NOT NULL,
  `quality` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `quality`) VALUES
(1, 'HD'),
(2, 'BRRip '),
(3, 'TS'),
(4, 'CAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `quality` (`quality`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`quality`) REFERENCES `qualities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
