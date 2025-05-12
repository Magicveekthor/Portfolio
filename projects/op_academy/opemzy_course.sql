-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 02:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opemzy_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `user_id`, `tutor_id`, `comment`, `date`) VALUES
('SUZWWxSdZ1UVBqYBh2sT', 'dkWyKRlgdZuunI9Jia5u', 'SUZWWxSdZ1UVBqYBh2sT', 'SUZWWxSdZ1UVBqYBh2sT', 'I love your content. This is exactly what I was looking for', '2024-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('', '', '', ''),
('Victor Odoh', 'magicveekthor@gmail.com', 'Enquries', '3e4re5tgrhytuj'),
('Peter Odoh', 'piperrano@gmail.com', '4tryuyiu', 'q3wetryuyio');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `video`, `thumb`, `date`, `status`) VALUES
('fCVoRoBe8dzsoOcV62q2', 'SUZWWxSdZ1UVBqYBh2sT', 'DlEDovjKd8no8QK7fPhP', 'Revit Essential Guide - Part 01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis bibendum metus orci, sit amet blandit metus lacinia ac. Ut pretium lectus nec tincidunt faucibus. Mauris blandit ac erat vitae porta. Vestibulum mollis ipsum eros, in pharetra nunc consectetur sed. ', '5uCv90aCDhXi4Cpf9za5.mp4', 'r5IcBQQ2Lu6Xw0e4Vvv7.jpg', '2024-02-21', 'Active'),
('dkWyKRlgdZuunI9Jia5u', 'SUZWWxSdZ1UVBqYBh2sT', 'DlEDovjKd8no8QK7fPhP', 'Revit Essential Guide - Part 02', 'Sed imperdiet vel augue at tincidunt. Sed et justo semper, fringilla tellus et, semper nulla. Vestibulum eleifend, magna id auctor scelerisque, sapien sapien dictum tellus, nec egestas ipsum turpis ut nisl. ', 'oNKRbJ7vRAyf68Tjtda4.mp4', 'TLMgi92lQ2PKabSAHQXS.jpg', '2024-02-21', 'Active'),
('4M6LNc4oQ2VXjgDmPpqS', 'SUZWWxSdZ1UVBqYBh2sT', 'DlEDovjKd8no8QK7fPhP', 'Revit Essential Guide - Part 03', 'Ut eget vulputate nulla, nec fringilla leo. Phasellus ullamcorper nec tellus vel lacinia. Sed at consectetur purus. Pellentesque metus est, vestibulum a velit id, imperdiet eleifend elit. Donec molestie tempor diam, eget scelerisque tortor ultrices in.', 'hYvgHIakVgjNXSipZuKe.mp4', '5epuV29yIF9Gctu4C2Qb.jpg', '2024-02-21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `search_tag` varchar(255) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `tutor_id`, `title`, `description`, `p_category`, `search_tag`, `thumb`, `date`, `status`) VALUES
('DlEDovjKd8no8QK7fPhP', 'SUZWWxSdZ1UVBqYBh2sT', 'Corona Renderer & SketchUp - Essential Guide (2024)', 'Quisque in urna nisl. Mauris libero erat, congue sit amet risus nec, luctus lacinia nulla. Nam at elit et sapien lobortis eleifend. Nunc eget lacus sit amet odio malesuada efficitur. Aenean euismod nisi in scelerisque volutpat. Nam a congue turpis. Aenean ac ligula vitae lacus consequat feugiat.\r\n\r\nVivamus placerat viverra diam, non dignissim metus vehicula et. Ut aliquet commodo accumsan. Nulla auctor accumsan justo non malesuada. Aliquam fringilla ex non gravida posuere. Suspendisse iaculis nisi auctor dolor congue, vitae efficitur sem congue. Praesent venenatis, nibh sit amet sollicitudin vulputate, justo metus vulputate dui, sit amet congue neque justo sed erat. Nullam fringilla nisl et vestibulum gravida. Morbi pretium arcu eu lorem feugiat, quis viverra erat hendrerit.', 'Archviz', 'corona, sketchup, autodesk', 'J8K17F4Zf7ktgSdN1ksW.jpg', '2024-02-01', 'Active'),
('bJOhdCa7UBAtOmFJuqOj', 'SUZWWxSdZ1UVBqYBh2sT', 'Adobe Photoshop Essential Guide - Beginner Level (2024)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, facere! Laudantium totam facere aut expedita rerum ad assumenda esse odio.', 'Presentation', 'photoshop, presentation, adobe', 'B9gkDImwVpvZUCEpMnhO.png', '2024-02-05', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `username`, `email`, `profession`, `password`, `image`) VALUES
('SUZWWxSdZ1UVBqYBh2sT', 'Arc Odoh Peter Ejike', 'magicveekthor@gmail.com', 'MSc, Ph.D, Instructor', '068942c83f0e6994d046f7ec01b8f42ba8f317a7', 'Xe6FqpIWPIJzS49Pd2EL.jpg'),
('V4oGGSd75i1k3RRHOyA5', 'Henry-Aloh Chidera Henry', 'piperrano@gmail.com', 'BSc, MSc, Instructor', '068942c83f0e6994d046f7ec01b8f42ba8f317a7', 'uhGv8mWmrUYQvNat6NbM.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `premium_access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `premium_access`) VALUES
('qfMQdHVy74JQFmt9MAaz', 'Victor Odoh', 'magicveekthor@gmail.com', '068942c83f0e6994d046f7ec01b8f42ba8f317a7', '9Cckl3lw88jF6iQRSInv.jpg', 'Not Paid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
