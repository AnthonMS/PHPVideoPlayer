-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2018 at 11:49 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamingservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `episodes_new`
--

CREATE TABLE `episodes_new` (
  `episode_no` int(11) NOT NULL,
  `episode_title` varchar(255) NOT NULL,
  `last_episode` tinyint(1) NOT NULL,
  `last_season` tinyint(1) NOT NULL,
  `season_no` int(11) NOT NULL,
  `serie_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episodes_new`
--

INSERT INTO `episodes_new` (`episode_no`, `episode_title`, `last_episode`, `last_season`, `season_no`, `serie_title`, `url`) VALUES
(1, 'Cartman Gets an Anal Probe', 0, 0, 1, 'south_park', ''),
(2, 'Weight Gain 4000', 0, 0, 1, 'south_park', ''),
(1, 'Pilot', 0, 0, 1, 'brooklyn_nine_nine', ''),
(4, 'Big Gay Al\'s Big Gay Boat Ride', 0, 0, 1, 'south_park', ''),
(3, 'Volcano', 0, 0, 1, 'south_park', ''),
(5, 'An Elephant Makes Love to a Pig', 0, 0, 1, 'south_park', ''),
(6, 'Death', 0, 0, 1, 'south_park', ''),
(7, 'Pinkeye', 0, 0, 1, 'south_park', ''),
(8, 'Damien', 0, 0, 1, 'south_park', ''),
(9, 'Starvin\' Marvin', 0, 0, 1, 'south_park', ''),
(10, 'Mr. Hankey, the Christmas Poo', 0, 0, 1, 'south_park', ''),
(11, 'Tom\'s Rhinoplasty', 0, 0, 1, 'south_park', ''),
(12, 'Mecha-Streisand', 0, 0, 1, 'south_park', ''),
(13, 'Cartman\'s Mom Is a Dirty Slut', 1, 0, 1, 'south_park', ''),
(1, 'Terrance and Phillip in Not Without My Anus', 0, 0, 2, 'south_park', ''),
(2, 'Cartman\'s Mom Is Still a Dirty Slut', 0, 0, 2, 'south_park', ''),
(3, 'Ike\'s Wee Wee', 0, 0, 2, 'south_park', ''),
(4, 'Chickenlover', 0, 0, 2, 'south_park', ''),
(5, 'Conjoined Fetus Lady', 0, 0, 2, 'south_park', ''),
(6, 'The Mexican Staring Frog of Southern Sri Lanka', 0, 0, 2, 'south_park', ''),
(7, 'City on the Edge of Forever', 0, 0, 2, 'south_park', ''),
(8, 'Summer Sucks', 0, 0, 2, 'south_park', ''),
(9, 'Chef\'s Salty Chocolate Balls', 0, 0, 2, 'south_park', ''),
(10, 'Chicken Pox', 0, 0, 2, 'south_park', ''),
(11, 'Roger Ebert Should Lay Off the Fatty Foods', 0, 0, 2, 'south_park', ''),
(12, 'Clubhouses', 0, 0, 2, 'south_park', ''),
(13, 'Cow Days', 0, 0, 2, 'south_park', ''),
(14, 'Chef Aid', 0, 0, 2, 'south_park', ''),
(15, 'Spookyfish', 0, 0, 2, 'south_park', ''),
(16, 'Merry Christmas, Charlie Manson!', 0, 0, 2, 'south_park', ''),
(17, 'Gnomes', 0, 0, 2, 'south_park', ''),
(18, 'Prehistoric Ice Man', 1, 0, 2, 'south_park', ''),
(1, 'Rainforest Schmainforest', 0, 0, 3, 'south_park', ''),
(2, 'Spontaneous Combustion', 0, 0, 3, 'south_park', ''),
(3, 'The Succubus', 0, 0, 3, 'south_park', ''),
(4, 'Jakovasaurs', 0, 0, 3, 'south_park', ''),
(5, 'Tweek vs. Craig', 0, 0, 3, 'south_park', ''),
(6, 'Sexual Harassment Panda', 0, 0, 3, 'south_park', ''),
(7, 'Cat Orgy', 0, 0, 3, 'south_park', ''),
(8, 'Two Guys Naked in a Hot Tub', 0, 0, 3, 'south_park', ''),
(9, 'Jewbilee', 0, 0, 3, 'south_park', ''),
(10, 'Korn\'s Groovy Pirate Ghost Mystery', 0, 0, 3, 'south_park', ''),
(11, 'Chinpokomon', 0, 0, 3, 'south_park', ''),
(12, 'Hooked on Monkey Phonics', 0, 0, 3, 'south_park', ''),
(13, 'Starvin\' Marvin in Space', 0, 0, 3, 'south_park', ''),
(14, 'The Red Badge of Gayness', 0, 0, 3, 'south_park', ''),
(15, 'Mr. Hankey\'s Christmas Classics', 0, 0, 3, 'south_park', ''),
(16, 'Are You There, God? It\'s Me, Jesus', 0, 0, 3, 'south_park', ''),
(17, 'World Wide Recorder Concert', 1, 0, 3, 'south_park', ''),
(1, 'The Tooth Fairy\'s Tats 2000', 0, 0, 4, 'south_park', ''),
(2, 'Cartman\'s Silly Hate Crime 2000', 0, 0, 4, 'south_park', ''),
(3, 'Timmy! 2000', 0, 0, 4, 'south_park', ''),
(4, 'Quintuplets 2000', 0, 0, 4, 'south_park', ''),
(5, 'Cartman Joins NAMBLA', 0, 0, 4, 'south_park', ''),
(6, 'Cherokee Hair Tampons', 0, 0, 4, 'south_park', ''),
(7, 'Chef Goes Nanners', 0, 0, 4, 'south_park', ''),
(8, 'Something You Can Do with Your Finger', 0, 0, 4, 'south_park', ''),
(9, 'Do the Handicapped Go to Hell?', 0, 0, 4, 'south_park', ''),
(10, 'Probably', 0, 0, 4, 'south_park', ''),
(11, 'Fourth Grade', 0, 0, 4, 'south_park', ''),
(12, 'Trapper Keeper', 0, 0, 4, 'south_park', ''),
(13, 'Helen Keller! The Musical', 0, 0, 4, 'south_park', ''),
(14, 'Pip', 0, 0, 4, 'south_park', ''),
(15, 'Fat Camp', 0, 0, 4, 'south_park', ''),
(16, 'The Wacky Molestation Adventure', 0, 0, 4, 'south_park', ''),
(17, 'A Very Crappy Christmas', 1, 0, 4, 'south_park', ''),
(1, 'It Hits the Fan', 0, 0, 5, 'south_park', ''),
(2, 'Cripple Fight', 0, 0, 5, 'south_park', ''),
(3, 'Super Best Friends', 0, 0, 5, 'south_park', ''),
(4, 'Scott Tenorman Must Die', 0, 0, 5, 'south_park', ''),
(5, 'Terrance and Phillip: Behind the Blow', 0, 0, 5, 'south_park', ''),
(6, 'Cartmanland', 0, 0, 5, 'south_park', ''),
(7, 'Proper Condom Use', 0, 0, 5, 'south_park', ''),
(8, 'Towelie', 0, 0, 5, 'south_park', ''),
(9, 'Osama bin Laden Has Farty Pants', 0, 0, 5, 'south_park', ''),
(10, 'How to Eat with Your Butt', 0, 0, 5, 'south_park', ''),
(11, 'The Entity', 0, 0, 5, 'south_park', ''),
(12, 'Here Comes the Neighborhood', 0, 0, 5, 'south_park', ''),
(13, 'Kenny Dies', 0, 0, 5, 'south_park', ''),
(14, 'Butters\' Very Own Episode', 1, 0, 5, 'south_park', ''),
(1, 'Jared Has Aides', 0, 0, 6, 'south_park', ''),
(2, 'Asspen', 0, 0, 6, 'south_park', ''),
(3, 'Freak Strike', 0, 0, 6, 'south_park', ''),
(4, 'Fun with Veal', 0, 0, 6, 'south_park', ''),
(5, 'The New Terrance and Phillip Movie Trailer', 0, 0, 6, 'south_park', ''),
(6, 'Professor Chaos', 0, 0, 6, 'south_park', ''),
(7, 'The Simpsons Already Did It', 0, 0, 6, 'south_park', ''),
(8, 'Red Hot Catholic Love', 0, 0, 6, 'south_park', ''),
(9, 'Free Hat', 0, 0, 6, 'south_park', ''),
(10, 'Bebe\'s Boobs Destroy Society', 0, 0, 6, 'south_park', ''),
(11, 'Child Abduction Is Not Funny', 0, 0, 6, 'south_park', ''),
(12, 'A Ladder to Heaven', 0, 0, 6, 'south_park', ''),
(13, 'The Return of the Fellowship of the Ring to the Two Towers', 0, 0, 6, 'south_park', ''),
(14, 'The Death Camp of Tolerance', 0, 0, 6, 'south_park', ''),
(15, 'The Biggest Douche in the Universe', 0, 0, 6, 'south_park', ''),
(16, 'My Future Self n\' Me', 0, 0, 6, 'south_park', ''),
(17, 'Red Sleigh Down', 1, 0, 6, 'south_park', ''),
(1, 'Cancelled', 0, 0, 7, 'south_park', ''),
(2, 'Krazy Kripples', 0, 0, 7, 'south_park', ''),
(3, 'Toilet Paper', 0, 0, 7, 'south_park', ''),
(4, 'I\'m a Little Bit Country', 0, 0, 7, 'south_park', ''),
(5, 'Fat Butt and Pancake Head', 0, 0, 7, 'south_park', ''),
(6, 'Lil\' Crime Stoppers', 0, 0, 7, 'south_park', ''),
(7, 'Red Man\'s Greed', 0, 0, 7, 'south_park', ''),
(8, 'South Park Is Gay', 0, 0, 7, 'south_park', ''),
(9, 'Christian Rock Hard', 0, 0, 7, 'south_park', ''),
(10, 'Grey Dawn', 0, 0, 7, 'south_park', ''),
(11, 'Casa Bonita', 0, 0, 7, 'south_park', ''),
(12, 'All About Mormons', 0, 0, 7, 'south_park', ''),
(13, 'Butt Out', 0, 0, 7, 'south_park', ''),
(14, 'Raisins', 0, 0, 7, 'south_park', ''),
(15, 'It\'s Christmas in Canada', 1, 0, 7, 'south_park', ''),
(1, 'Good Times with Weapons', 0, 0, 8, 'south_park', ''),
(2, 'Up the Down Steroid', 0, 0, 8, 'south_park', ''),
(3, 'The Passion of the Jew', 0, 0, 8, 'south_park', ''),
(4, 'You Got F. in the A', 0, 0, 8, 'south_park', ''),
(5, 'AWESOM-O', 0, 0, 8, 'south_park', ''),
(6, 'The Jeffersons', 0, 0, 8, 'south_park', ''),
(7, 'Goobacks', 0, 0, 8, 'south_park', ''),
(8, 'Douche and Turd', 0, 0, 8, 'south_park', ''),
(9, 'Something Wall-Mart This Way Comes', 0, 0, 8, 'south_park', ''),
(10, 'Preschool', 0, 0, 8, 'south_park', ''),
(11, 'Quest for Ratings', 0, 0, 8, 'south_park', ''),
(12, 'Stupid Spoiled Whore Video Playset', 0, 0, 8, 'south_park', ''),
(13, 'Cartman\'s Incredible Gift', 0, 0, 8, 'south_park', ''),
(14, 'Woodland Critter Christmas', 1, 0, 8, 'south_park', ''),
(1, 'Mr. Garrison\'s Fancy New Vagina', 0, 0, 9, 'south_park', ''),
(2, 'Die Hippie, Die', 0, 0, 9, 'south_park', ''),
(3, 'Wing', 0, 0, 9, 'south_park', ''),
(4, 'Best Friends Forever', 0, 0, 9, 'south_park', ''),
(5, 'The Losing Edge', 0, 0, 9, 'south_park', ''),
(6, 'The Death of Eric Cartman', 0, 0, 9, 'south_park', ''),
(7, 'Erection Day', 0, 0, 9, 'south_park', ''),
(8, 'Two Days Before the Day After Tomorrow', 0, 0, 9, 'south_park', ''),
(9, 'Marjorine', 0, 0, 9, 'south_park', ''),
(10, 'Follow That Egg!', 0, 0, 9, 'south_park', ''),
(11, 'Ginger Kids', 0, 0, 9, 'south_park', ''),
(12, 'Trapped in the Closet', 0, 0, 9, 'south_park', ''),
(13, 'Free Willzyx', 0, 0, 9, 'south_park', ''),
(14, 'Bloody Mary', 1, 0, 9, 'south_park', ''),
(1, 'The Return of Chef', 0, 0, 10, 'south_park', ''),
(2, 'Smug Alert', 0, 0, 10, 'south_park', ''),
(3, 'Cartoon Wars Part 1', 0, 0, 10, 'south_park', ''),
(4, 'Cartoon Wars Part 2', 0, 0, 10, 'south_park', ''),
(5, 'A Million Little Fibers', 0, 0, 10, 'south_park', ''),
(6, 'Manbearpig', 0, 0, 10, 'south_park', ''),
(7, 'Tsst', 0, 0, 10, 'south_park', ''),
(8, 'Make Love, Not Warcraft', 0, 0, 10, 'south_park', ''),
(9, 'Mystery of the Urinal Deuce', 0, 0, 10, 'south_park', ''),
(10, 'Miss Teacher Bangs a Boy', 0, 0, 10, 'south_park', ''),
(11, 'Hell on Earth 2006', 0, 0, 10, 'south_park', ''),
(12, 'Go, God, Go!', 0, 0, 10, 'south_park', ''),
(13, 'Go, God, Go Part XII', 0, 0, 10, 'south_park', ''),
(14, 'Stanley\'s Cup', 1, 0, 10, 'south_park', ''),
(1, 'With Apologies to Jesse Jackson', 0, 0, 11, 'south_park', ''),
(2, 'Cartman Sucks', 0, 0, 11, 'south_park', ''),
(3, 'Lice Capades', 0, 0, 11, 'south_park', ''),
(4, 'The Snuke', 0, 0, 11, 'south_park', ''),
(5, 'Fantastic Easter Special', 0, 0, 11, 'south_park', ''),
(6, 'D-Yikes', 0, 0, 11, 'south_park', ''),
(7, 'Night of the Living Homeless', 0, 0, 11, 'south_park', ''),
(8, 'Le Petit Tourette', 0, 0, 11, 'south_park', ''),
(9, 'More Crap', 0, 0, 11, 'south_park', ''),
(10, 'Imaginationland', 0, 0, 11, 'south_park', ''),
(11, 'Imaginationland Part 2', 0, 0, 11, 'south_park', ''),
(12, 'Imaginationland Part 3', 0, 0, 11, 'south_park', ''),
(13, 'Guitar Queer-O', 0, 0, 11, 'south_park', ''),
(14, 'The List', 1, 0, 11, 'south_park', ''),
(1, 'Tonsil Trouble', 0, 0, 12, 'south_park', ''),
(2, 'Britney\'s New Look', 0, 0, 12, 'south_park', ''),
(3, 'Major Boobage', 0, 0, 12, 'south_park', ''),
(4, 'Canada on Strike!', 0, 0, 12, 'south_park', ''),
(5, 'Eek, A Penis!', 0, 0, 12, 'south_park', ''),
(6, 'Over Logging', 0, 0, 12, 'south_park', ''),
(7, 'Super Fun Time', 0, 0, 12, 'south_park', ''),
(8, 'The China Problem', 0, 0, 12, 'south_park', ''),
(9, 'Breast Cancer Show Ever', 0, 0, 12, 'south_park', ''),
(10, 'Pandemic', 0, 0, 12, 'south_park', ''),
(11, 'Pandemic 2---The Startling', 0, 0, 12, 'south_park', ''),
(12, 'About Last Night...', 0, 0, 12, 'south_park', ''),
(13, 'Elementary School Musical', 0, 0, 12, 'south_park', ''),
(14, 'The Ungroundable', 1, 0, 12, 'south_park', ''),
(1, 'The Ring', 0, 0, 13, 'south_park', ''),
(2, 'The Coon', 0, 0, 13, 'south_park', ''),
(3, 'Margaritaville', 0, 0, 13, 'south_park', ''),
(4, 'Eat, Pray, Queef', 0, 0, 13, 'south_park', ''),
(5, 'Fishsticks', 0, 0, 13, 'south_park', ''),
(6, 'Pinewood Derby', 0, 0, 13, 'south_park', ''),
(7, 'Fatbeard', 0, 0, 13, 'south_park', ''),
(8, 'Dead Celebrities', 0, 0, 13, 'south_park', ''),
(9, 'Butters\' Bottom Bitch', 0, 0, 13, 'south_park', ''),
(10, 'W.T.F.', 0, 0, 13, 'south_park', ''),
(11, 'Whale Whores', 0, 0, 13, 'south_park', ''),
(12, 'The F Word', 0, 0, 13, 'south_park', ''),
(13, 'Dances With Smurfs', 0, 0, 13, 'south_park', ''),
(14, 'Pee', 1, 0, 13, 'south_park', ''),
(1, 'Sexual Healing', 0, 0, 14, 'south_park', ''),
(2, 'The Tale of Scrotie McBoogerballs', 0, 0, 14, 'south_park', ''),
(3, 'Medicinal Fried Chicken', 0, 0, 14, 'south_park', ''),
(4, 'You Have 0 Friends', 0, 0, 14, 'south_park', ''),
(5, '200', 0, 0, 14, 'south_park', ''),
(6, '201', 0, 0, 14, 'south_park', ''),
(7, 'Crippled Summer', 0, 0, 14, 'south_park', ''),
(8, 'Poor and Stupid', 0, 0, 14, 'south_park', ''),
(9, 'It\'s a Jersey Thing', 0, 0, 14, 'south_park', ''),
(10, 'Insheeption', 0, 0, 14, 'south_park', ''),
(11, 'Coon 2: Hindsight', 0, 0, 14, 'south_park', ''),
(12, 'Mysterion Rises', 0, 0, 14, 'south_park', ''),
(13, 'Coon vs. Coon &amp; Friends', 0, 0, 14, 'south_park', ''),
(14, 'CrÃ¨me Fraiche', 1, 0, 14, 'south_park', ''),
(1, 'HUMANCENTiPAD', 0, 0, 15, 'south_park', ''),
(2, 'Funnybot', 0, 0, 15, 'south_park', ''),
(3, 'Royal Pudding', 0, 0, 15, 'south_park', ''),
(4, 'T.M.I.', 0, 0, 15, 'south_park', ''),
(5, 'Crack Baby Athletic Association', 0, 0, 15, 'south_park', ''),
(6, 'City Sushi', 0, 0, 15, 'south_park', ''),
(7, 'You\'re Getting Old', 0, 0, 15, 'south_park', ''),
(8, 'Ass Burgers', 0, 0, 15, 'south_park', ''),
(9, 'The Last of the Meheecans', 0, 0, 15, 'south_park', ''),
(10, 'Bass to Mouth', 0, 0, 15, 'south_park', ''),
(11, 'Broadway Bro Down', 0, 0, 15, 'south_park', ''),
(12, '1%', 0, 0, 15, 'south_park', ''),
(13, 'A History Channel Thanksgiving', 0, 0, 15, 'south_park', ''),
(14, 'The Poor Kid', 1, 0, 15, 'south_park', ''),
(1, 'Reverse Cowgirl', 0, 0, 16, 'south_park', ''),
(2, 'Cash for Gold', 0, 0, 16, 'south_park', ''),
(3, 'Faith Hilling', 0, 0, 16, 'south_park', ''),
(4, 'Jewpacabra', 0, 0, 16, 'south_park', ''),
(5, 'Butterballs', 0, 0, 16, 'south_park', ''),
(6, 'I Should Have Never Gone Ziplining', 0, 0, 16, 'south_park', ''),
(7, 'Cartman Finds Love', 0, 0, 16, 'south_park', ''),
(8, 'Sarcastaball', 0, 0, 16, 'south_park', ''),
(9, 'Raising the Bar', 0, 0, 16, 'south_park', ''),
(10, 'Insecurity', 0, 0, 16, 'south_park', ''),
(11, 'Going Native', 0, 0, 16, 'south_park', ''),
(12, 'A Nightmare on Face Time', 0, 0, 16, 'south_park', ''),
(13, 'A Scause for Applause', 0, 0, 16, 'south_park', ''),
(14, 'Obama Wins!', 1, 0, 16, 'south_park', ''),
(1, 'Let Go, Let Gov', 0, 0, 17, 'south_park', ''),
(2, 'Informative Murder Porn', 0, 0, 17, 'south_park', ''),
(3, 'World War Zimmerman', 0, 0, 17, 'south_park', ''),
(4, 'Goth Kids 3: Dawn of the Posers', 0, 0, 17, 'south_park', ''),
(5, 'Taming Strange', 0, 0, 17, 'south_park', ''),
(6, 'Ginger Cow', 0, 0, 17, 'south_park', ''),
(7, 'Black Friday', 0, 0, 17, 'south_park', ''),
(8, 'A Song of Ass and Fire', 0, 0, 17, 'south_park', ''),
(9, 'Titties and Dragons', 0, 0, 17, 'south_park', ''),
(10, 'The Hobbit', 1, 0, 17, 'south_park', ''),
(1, 'Go Fund Yourself', 0, 0, 18, 'south_park', ''),
(2, 'Gluten Free Ebola', 0, 0, 18, 'south_park', ''),
(3, 'The Cissy', 0, 0, 18, 'south_park', ''),
(4, 'Handicar', 0, 0, 18, 'south_park', ''),
(5, 'The Magic Bush', 0, 0, 18, 'south_park', ''),
(6, 'Freemium Isn\'t Free', 0, 0, 18, 'south_park', ''),
(7, 'Grounded Vindaloop', 0, 0, 18, 'south_park', ''),
(8, 'Cock Magic', 0, 0, 18, 'south_park', ''),
(9, '#REHASH', 0, 0, 18, 'south_park', ''),
(10, '#HappyHolograms', 1, 0, 18, 'south_park', ''),
(1, 'Stunning and Brave', 0, 0, 19, 'south_park', ''),
(2, 'Where My Country Gone?', 0, 0, 19, 'south_park', ''),
(3, 'The City Part of Town', 0, 0, 19, 'south_park', ''),
(4, 'You\'re Not Helping', 0, 0, 19, 'south_park', ''),
(5, 'Safe Space', 0, 0, 19, 'south_park', ''),
(6, 'Tweek x Craig', 0, 0, 19, 'south_park', ''),
(7, 'Naughty Ninjas', 0, 0, 19, 'south_park', ''),
(8, 'Sponsered Content', 0, 0, 19, 'south_park', ''),
(9, 'Truth and Advertising', 0, 0, 19, 'south_park', ''),
(10, 'PC Principle Final Justice', 1, 0, 19, 'south_park', ''),
(1, 'Member Berries', 0, 0, 20, 'south_park', ''),
(2, 'Skank Hunt', 0, 0, 20, 'south_park', ''),
(3, 'The Damned', 0, 0, 20, 'south_park', ''),
(4, 'Wieners Out', 0, 0, 20, 'south_park', ''),
(5, 'Douche and a Danish', 0, 0, 20, 'south_park', ''),
(6, 'Fort Collins', 0, 0, 20, 'south_park', ''),
(7, 'Oh, Jeez', 0, 0, 20, 'south_park', ''),
(8, 'Members Only', 0, 0, 20, 'south_park', ''),
(9, 'Not Funny', 0, 0, 20, 'south_park', ''),
(10, 'The End of Serialization as We Know It', 1, 0, 20, 'south_park', ''),
(1, 'White People Renovating Houses', 0, 1, 21, 'south_park', ''),
(2, 'Put It Down', 0, 1, 21, 'south_park', ''),
(3, 'Holiday Special', 0, 1, 21, 'south_park', ''),
(4, 'Franchise Prequel', 0, 1, 21, 'south_park', ''),
(5, 'Hummels &amp; Heroin', 0, 1, 21, 'south_park', ''),
(6, 'Sons of Witches', 0, 1, 21, 'south_park', ''),
(7, 'Doubling Down', 0, 1, 21, 'south_park', ''),
(8, 'Moss Piglets', 0, 1, 21, 'south_park', ''),
(9, 'Super Hard PCness', 0, 1, 21, 'south_park', ''),
(10, 'Splatty Tomato', 1, 1, 21, 'south_park', '');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `unikid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `seasons` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `popular` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`unikid`, `title`, `url`, `seasons`, `category`, `popular`) VALUES
(3, 'south_park', 'https://vignette.wikia.nocookie.net/southpark/images/4/4c/Season15.jpg', 21, 'comedy,animation', 1),
(4, 'brooklyn_nine_nine', 'https://images-na.ssl-images-amazon.com/images/I/91%2BTVZUi2ZL._SY445_.jpg', 5, 'comedy', 1),
(5, 'gravity_falls', 'https://vignette.wikia.nocookie.net/gravityfalls/images/8/8b/Six_strange_tales.jpg', 2, 'animation', 0),
(6, 'workaholics', 'https://www.dvdsreleasedates.com/posters/800/W/Workaholics-2011-movie-poster.jpg', 7, 'comedy', 1),
(7, 'dragon_ball_z', 'https://vignette4.wikia.nocookie.net/dragonball/images/5/53/Dbz_season_1_cover.jpg', 9, 'animation', 0),
(8, 'american_dad', 'http://www.tvshowsondvd.com/graphics/news3/AmericanDad_V4_early.jpg', 15, 'animation', 1),
(9, 'family_guy', 'https://images-na.ssl-images-amazon.com/images/M/MV5BNGRkMTllZTUtZTQyYi00NjVlLTlhZjEtODExNjQ4YjQ1Y2RjXkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg', 16, 'animation', 1),
(10, 'mr._robot', 'https://www.what-song.com/images/showposters/39.jpg', 3, 'action', 1),
(12, 'modern_family', 'https://i.pinimg.com/736x/f3/48/50/f34850f7af6f85aeb212369b2f9742c1--modern-family-season--tv-series.jpg', 9, 'comedy,family', 1),
(13, 'breaking_bad', 'https://images-na.ssl-images-amazon.com/images/M/MV5BZDNhNzhkNDctOTlmOS00NWNmLWEyODQtNWMxM2UzYmJiNGMyXkEyXkFqcGdeQXVyNTMxMjgxMzA@._V1_.jpg', 5, 'action,drama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `serie_title` varchar(255) NOT NULL,
  `season_no` int(11) NOT NULL,
  `thumb_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`serie_title`, `season_no`, `thumb_url`) VALUES
('south_park', 1, 'https://worldofcactus.files.wordpress.com/2015/02/south-park-season-1-front.jpg'),
('south_park', 2, 'https://images-na.ssl-images-amazon.com/images/I/91Ohq9cMT6L._SY445_.jpg'),
('south_park', 3, 'http://www.dvd-forum.at/img/uploaded/cover/large/120092059573053000.jpg'),
('south_park', 4, 'https://worldofcactus.files.wordpress.com/2015/02/south-park-season-4-front.jpg'),
('south_park', 5, 'http://www.thaidvd.biz/images/southpark_s5.jpg'),
('south_park', 6, 'https://images-na.ssl-images-amazon.com/images/I/51ZSL%2BHpovL.jpg'),
('south_park', 7, 'https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/Southparkseason7.jpg/220px-Southparkseason7.jpg'),
('south_park', 8, 'https://i.pinimg.com/originals/1a/a5/65/1aa56527b24a8e0efc71e945e195e131.jpg'),
('south_park', 10, 'https://vignette.wikia.nocookie.net/southpark/images/3/3d/Season10.jpg'),
('south_park', 9, 'https://vignette.wikia.nocookie.net/southpark/images/7/7b/South_Park_Season_9.jpg'),
('south_park', 11, 'https://vignette.wikia.nocookie.net/southpark/images/5/5f/Season11.jpg'),
('south_park', 12, 'https://images-na.ssl-images-amazon.com/images/I/91p5qT0qVfL._SY445_.jpg'),
('south_park', 13, 'https://upload.wikimedia.org/wikipedia/en/5/58/SouthParkSeason13.jpg'),
('south_park', 14, 'https://upload.wikimedia.org/wikipedia/en/5/5f/South_Park_season_14_DVD_cover.png'),
('south_park', 15, 'https://images-na.ssl-images-amazon.com/images/I/81RnQUEiX6L._SL1500_.jpg'),
('south_park', 16, 'https://target.scene7.com/is/image/Target/14653727?wid=520&amp;hei=520&amp;fmt=pjpeg'),
('south_park', 17, 'https://images-na.ssl-images-amazon.com/images/I/81529ImoaEL._SL1500_.jpg'),
('south_park', 18, 'http://www.tvshowsondvd.com/graphics/news3/SouthPark_S18_DVD_e.jpg'),
('south_park', 19, 'https://upload.wikimedia.org/wikipedia/en/5/5c/Southparks19dvdcover.jpg'),
('south_park', 20, 'https://images-na.ssl-images-amazon.com/images/I/81tBTuK8a-L._SL1500_.jpg'),
('south_park', 21, 'https://images.justwatch.com/poster/25664333/s592/South-Park.jpg'),
('gravity_falls', 1, 'https://vignette.wikia.nocookie.net/gravityfalls/images/8/8b/Six_strange_tales.jpg'),
('gravity_falls', 2, 'https://vignette.wikia.nocookie.net/gravityfalls/images/7/73/Once_Upon_a_Swine_cover.jpg'),
('brooklyn_nine_nine', 1, 'https://images-na.ssl-images-amazon.com/images/I/71BM419m1pL._SL1500_.jpg'),
('brooklyn_nine_nine', 2, 'https://images-na.ssl-images-amazon.com/images/I/91rpicYAqHL._SY445_.jpg'),
('brooklyn_nine_nine', 3, 'https://store.hmv.com/HMVStore/media/product/289038/01-289038.jpg'),
('brooklyn_nine_nine', 5, 'https://images-na.ssl-images-amazon.com/images/M/MV5BNDc3NzQxODAwOV5BMl5BanBnXkFtZTgwODkwMjU2MzI@._V1_SY1000_CR0,0,674,1000_AL_.jpg'),
('workaholics', 1, 'https://images-na.ssl-images-amazon.com/images/I/51w2PW1PBXL.jpg'),
('workaholics', 2, 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/Workaholics_S2_DVD.jpg/220px-Workaholics_S2_DVD.jpg'),
('workaholics', 4, 'http://www.tvshowsondvd.com/graphics/news3/Workaholics_S4_DVD_e.jpg'),
('workaholics', 7, 'https://upload.wikimedia.org/wikipedia/en/thumb/1/10/Workaholics_S7_DVD.jpg/220px-Workaholics_S7_DVD.jpg'),
('workaholics', 3, 'https://upload.wikimedia.org/wikipedia/en/thumb/7/79/Workaholics_S3_DVD.jpg/220px-Workaholics_S3_DVD.jpg'),
('mr._robot', 1, 'https://4.bp.blogspot.com/-BInTEetxTxY/WOD62DwvhXI/AAAAAAAAPd8/nj9OI_sz3y0e8zupzjVsvylRS14jLqWkACLcB/s1600/Mr%2BRobot.jpg'),
('mr._robot', 2, 'https://cdn.flickeringmyth.com/wp-content/uploads/2016/06/Mr-Robot-season-2-posters-3-600x889.jpg'),
('mr._robot', 3, 'https://s-media-cache-ak0.pinimg.com/originals/fc/83/62/fc8362c50e0443c755c6ee4f073badbb.jpg'),
('modern_family', 1, 'https://upload.wikimedia.org/wikipedia/en/d/d0/ModernFamilyS1DVD.jpg'),
('modern_family', 2, 'https://i.pinimg.com/736x/f3/48/50/f34850f7af6f85aeb212369b2f9742c1--modern-family-season--tv-series.jpg'),
('modern_family', 3, 'https://upload.wikimedia.org/wikipedia/en/9/9f/Modern_Family_Season_3.jpg'),
('modern_family', 4, 'https://upload.wikimedia.org/wikipedia/en/6/61/Modern_Family_Season_4.jpg'),
('modern_family', 5, 'http://images2.static-bluray.com/movies/covers/85902_front.jpg'),
('modern_family', 6, 'https://media.takealot.com/covers/covers_tsins/41352328/Modern%20Family%20Season%206-zoom.png'),
('modern_family', 7, 'https://upload.wikimedia.org/wikipedia/en/thumb/1/15/Modern_Family_season_7_dvd.jpg/250px-Modern_Family_season_7_dvd.jpg'),
('modern_family', 8, 'http://img.thetake.com/season_images/f8af284d9d206e3cc6e56ddfcdf49122f3b206466432b318af5cecd849368bce.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `admin`) VALUES
(3, 'Anthon', 'EasyPass', 1),
(4, 'Gustav', 'NotEasyPass', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`unikid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `unikid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
