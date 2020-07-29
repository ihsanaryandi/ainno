-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2020 pada 13.30
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
  `creator` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `business_groups`
--

INSERT INTO `business_groups` (`group_id`, `name`, `description`, `creator`) VALUES
(5, 'Bisnis Startup', 'ini adalah deskripsi dari bisnis startup saya', 'shuzolotova');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_members`
--

CREATE TABLE `group_members` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_username` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_members`
--

INSERT INTO `group_members` (`member_id`, `group_id`, `member_username`) VALUES
(6, 5, 'shuzolotova');

-- --------------------------------------------------------

--
-- Struktur dari tabel `networks`
--

CREATE TABLE `networks` (
  `network_id` int(11) NOT NULL,
  `founder_username` char(120) NOT NULL,
  `co_founder_username` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `networks`
--

INSERT INTO `networks` (`network_id`, `founder_username`, `co_founder_username`) VALUES
(23, 'jillvalentine', 'shuzolotova'),
(24, 'shuzolotova', 'jillvalentine'),
(29, 'clairedfield', 'shuzolotova'),
(30, 'shuzolotova', 'clairedfield');

-- --------------------------------------------------------

--
-- Struktur dari tabel `network_requests`
--

CREATE TABLE `network_requests` (
  `request_id` int(11) NOT NULL,
  `username_request` char(120) NOT NULL,
  `co_founder_username` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Sasha Zotova', 'shuzolotova', 'sasha@gmail.com', '$2y$10$zADDuxPRCe09rptK0367ceSiHJIYX4mfMjrsrUmhxvgLTZS9KPmdu', 'looking_cofounder', 'Bandung', 'profile_pictures/719599bf2c7679f050904600b788960e.jpg', 'i\'m good at programming and design'),
(10, 'Jill Valentine', 'jillvalentine', 'jill@gmail.com', '$2y$10$bq0MJZGelRXV3GNF9qTOAuucLkACxn66JnjSgmpieTDD9SYNUSLIS', 'looking_cofounder', 'Bandung', 'profile_pictures/a21b4ea37864162e0fa3594f44a6c434.jpg', 'i\'m a good designer'),
(11, 'Claire Redfield', 'clairedfield', 'claire@gmail.com', '$2y$10$6.WnDGS/wRDrreUhcEm5gOcJlafFFJgwW3EHibHM/zR4dW/yzQZaG', 'looking_cofounder', 'Bandung', 'default-user-picture.jpg', 'i\'m good at marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skills`
--

CREATE TABLE `user_skills` (
  `user_skill_id` int(11) NOT NULL,
  `username` char(120) NOT NULL,
  `skill_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_skills`
--

INSERT INTO `user_skills` (`user_skill_id`, `username`, `skill_name`) VALUES
(18, 'jillvalentine', 'Skill 2'),
(19, 'jillvalentine', 'Skill 3'),
(20, 'jillvalentine', 'Skill 1'),
(25, 'shuzolotova', 'Skill 1'),
(26, 'shuzolotova', 'Skill 2'),
(27, 'shuzolotova', 'Skill 3'),
(28, 'clairedfield', 'Skill 1'),
(29, 'clairedfield', 'Skill 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wanted_skills`
--

CREATE TABLE `wanted_skills` (
  `wanted_skill_id` int(11) NOT NULL,
  `username` char(120) NOT NULL,
  `skill_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wanted_skills`
--

INSERT INTO `wanted_skills` (`wanted_skill_id`, `username`, `skill_name`) VALUES
(15, 'jillvalentine', 'Skill 1'),
(16, 'jillvalentine', 'Skill 2'),
(17, 'jillvalentine', 'Skill 2'),
(18, 'jillvalentine', 'Skill 3'),
(19, 'shuzolotova', 'Skill 1'),
(20, 'shuzolotova', 'Skill 2'),
(21, 'shuzolotova', 'Skill 3'),
(22, 'clairedfield', 'Skill 2'),
(23, 'clairedfield', 'Skill 3'),
(24, 'clairedfield', 'Skill 1');

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
-- Indeks untuk tabel `network_requests`
--
ALTER TABLE `network_requests`
  ADD PRIMARY KEY (`request_id`);

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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `group_members`
--
ALTER TABLE `group_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `networks`
--
ALTER TABLE `networks`
  MODIFY `network_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `network_requests`
--
ALTER TABLE `network_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `user_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `wanted_skills`
--
ALTER TABLE `wanted_skills`
  MODIFY `wanted_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
