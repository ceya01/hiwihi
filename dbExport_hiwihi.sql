-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiwihi`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tweet_id` int(11) DEFAULT NULL,
  `regist_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `followee_id` int(11) DEFAULT NULL,
  `follow_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `retweet`
--

CREATE TABLE `retweet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tweet_id` int(11) DEFAULT NULL,
  `regist_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `text` text,
  `user_id` int(11) DEFAULT NULL,
  `replyto_id` int(11) DEFAULT NULL,
  `post_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `edit_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tweet`
--

INSERT INTO `tweet` (`id`, `text`, `user_id`, `replyto_id`, `post_time`, `edit_time`, `delete_flag`) VALUES
(1, '#はじめてのツイート', 1, NULL, '2019-04-18 17:15:05', '2019-04-18 17:15:05', 0),
(2, 'ツイッターはじめました！！', 2, NULL, '2019-04-18 18:09:20', '2019-04-18 18:09:20', 0),
(3, 'いえーーーい！', 3, NULL, '2019-04-18 18:09:26', '2019-04-18 18:09:26', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bio` text,
  `delete_flag` tinyint(1) DEFAULT '0',
  `char_id` varchar(255) DEFAULT NULL,
  `regist_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `edit_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `icon`, `name`, `bio`, `delete_flag`, `char_id`, `regist_time`, `edit_time`) VALUES
(1, 'guest01@mail.com', 'bd4904f88fc6451823277f07b8ea08a3', '9c193c85e577f43f9ed0cd8237f5445c81d46f93.png', 'ゲスト01', 'ヒウィッヒヒーはじめました！', 0, 'guest01', '2019-03-29 16:55:44', '2019-04-17 18:34:30'),
(2, 'guest02@mail.com', 'bd4904f88fc6451823277f07b8ea08a3', '65850b6f076ce8ec9d74448283086f5d7edba24f.png', 'ゲスト02', 'ヒウィッヒヒーはじめたわ！', 0, 'guest02', '2019-03-29 16:55:44', '2019-04-17 18:35:20'),
(3, 'guest03@mail.com', 'bd4904f88fc6451823277f07b8ea08a3', '8d61fc0f4bddd54741261778748a44ff5c605943.png', 'ゲスト03', 'ヒウィッヒヒーはじめたぜ！', 0, 'guest02', '2019-03-29 16:55:44', '2019-04-17 18:35:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retweet`
--
ALTER TABLE `retweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retweet`
--
ALTER TABLE `retweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
