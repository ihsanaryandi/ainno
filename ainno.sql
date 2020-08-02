-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2020 pada 11.02
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ainno`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `business_groups`
--

CREATE TABLE `business_groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `business_groups`
--

INSERT INTO `business_groups` (`group_id`, `name`, `description`, `creator`) VALUES
(5, 'Bisnis Startup', 'ini adalah deskripsi dari bisnis startup saya', 7),
(6, 'Bisnis opo welah', 'bisnis ini adalah bisnis yang tidak jelas hahahaha', 10),
(8, 'Grup Baru', 'ini adalah grup baru!!!!', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_members`
--

CREATE TABLE `group_members` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_members`
--

INSERT INTO `group_members` (`member_id`, `group_id`, `user_id`) VALUES
(6, 5, 7),
(7, 6, 10),
(8, 6, 7),
(9, 8, 7),
(10, 8, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `networks`
--

CREATE TABLE `networks` (
  `network_id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `is_connected` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `networks`
--

INSERT INTO `networks` (`network_id`, `user1`, `user2`, `is_connected`) VALUES
(42, 10, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` char(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(30) NOT NULL,
  `city` varchar(100) NOT NULL,
  `profile_picture` varchar(256) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `type`, `city`, `profile_picture`, `bio`) VALUES
(7, 'Sasha Zotova', 'shuzolotova', 'sasha@gmail.com', '$2y$10$zADDuxPRCe09rptK0367ceSiHJIYX4mfMjrsrUmhxvgLTZS9KPmdu', 'looking_cofounder', 'Bandung', 'profile_pictures/68d09cfb8a5e58f9b713cba9d2887e13.jpg', 'i\'m good at programming and design'),
(10, 'Jill Valentine', 'jillvalentine', 'jill@gmail.com', '$2y$10$bq0MJZGelRXV3GNF9qTOAuucLkACxn66JnjSgmpieTDD9SYNUSLIS', 'looking_cofounder', 'Bandung', 'profile_pictures/912aca9b894cd463522e8f36dde93fab.jpg', 'I\'m a good designer\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skills`
--

CREATE TABLE `user_skills` (
  `user_skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_skills`
--

INSERT INTO `user_skills` (`user_skill_id`, `user_id`, `skill_name`) VALUES
(18, 10, 'Skill 2'),
(19, 10, 'Skill 3'),
(20, 10, 'Skill 1'),
(25, 7, 'Skill 1'),
(26, 7, 'Skill 2'),
(27, 7, 'Skill 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wanted_skills`
--

CREATE TABLE `wanted_skills` (
  `wanted_skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wanted_skills`
--

INSERT INTO `wanted_skills` (`wanted_skill_id`, `user_id`, `skill_name`) VALUES
(15, 10, 'Skill 1'),
(16, 10, 'Skill 2'),
(17, 10, 'Skill 2'),
(18, 10, 'Skill 3'),
(19, 7, 'Skill 1'),
(20, 7, 'Skill 2'),
(21, 7, 'Skill 3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `business_groups`
--
ALTER TABLE `business_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `networks`
--
ALTER TABLE `networks`
  ADD PRIMARY KEY (`network_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`user_skill_id`);

--
-- Indeks untuk tabel `wanted_skills`
--
ALTER TABLE `wanted_skills`
  ADD PRIMARY KEY (`wanted_skill_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `business_groups`
--
ALTER TABLE `business_groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `group_members`
--
ALTER TABLE `group_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `networks`
--
ALTER TABLE `networks`
  MODIFY `network_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `user_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `wanted_skills`
--
ALTER TABLE `wanted_skills`
  MODIFY `wanted_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
