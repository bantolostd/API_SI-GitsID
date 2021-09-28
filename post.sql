-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2021 pada 14.29
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas18`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_body` text NOT NULL,
  `post_image` varchar(20) NOT NULL,
  `post_time` datetime NOT NULL,
  `post_credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_body`, `post_image`, `post_time`, `post_credit`) VALUES
(1, 'Lorem, ipsum dolor sit amet consectetur adipisicin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit quibusdam nesciunt necessitatibus vel reiciendis? Eos quidem odio, cupiditate reprehenderit quis dignissimos eum tenetur dolorum, totam accusantium earum placeat nam culpa explicabo? Quam rem, excepturi laborum vero facere harum aut officiis maiores omnis ut! Nulla impedit reiciendis laboriosam consequuntur veniam labore!', '', '2021-09-15 19:21:10', 1),
(2, 'Lorem ipsum dolor sit amet consectetur adipisicing', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat earum tenetur necessitatibus. Cumque, quibusdam accusamus. Sunt illum nemo, accusantium excepturi quos vel repellendus corporis corrupti nisi. Adipisci esse praesentium officiis assumenda, unde laudantium similique, et vero numquam cumque illo id.', '', '2021-09-16 14:23:28', 1),
(3, 'Lorem ipsum dolor sit amet consectetur adipisicing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, esse. Nisi itaque illo error at animi aliquid fugit deserunt eaque, labore odit eligendi commodi ratione placeat? Veritatis porro, molestiae libero quas debitis blanditiis voluptates nesciunt?', '', '2021-09-23 19:23:55', 1),
(4, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque inventore similique iure quibusdam. Commodi velit cupiditate dignissimos aut magnam aliquid eos beatae? Dolorem quo earum eum a, ratione aperiam cum voluptas placeat nisi sunt temporibus. Officiis ratione eveniet nam necessitatibus sunt fugit facilis!', '', '2021-09-24 10:26:07', 1),
(5, 'Lorem ipsum dolor, sit amet consectetur adipisicin', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque inventore similique iure quibusdam. Commodi velit cupiditate dignissimos aut magnam aliquid eos beatae? Dolorem quo earum eum a, ratione aperiam cum voluptas placeat nisi sunt temporibus. Quia corrupti deserunt unde explicabo molestiae, eaque aperiam nostrum dolores natus praesentium sapiente tempora laborum nobis veritatis est nisi? Totam quaerat quam, saepe omnis quas illo maxime sunt dicta quo enim, tempore qui laborum facilis dolor quibusdam maiores? Quibusdam nobis corporis itaque, velit nemo consequatur natus ea voluptate placeat qui eos quae ullam atque pariatur eaque id. Officiis ratione eveniet nam necessitatibus sunt fugit facilis!', '', '2021-09-26 19:26:07', 1),
(6, 'Lorem ipsum dolor sit amet consectetur adipisicing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium beatae possimus deserunt eum at iure exercitationem maiores dicta eligendi error ab molestias quae accusamus qui, aliquid similique nulla cumque enim alias? Odio nesciunt cupiditate aliquam praesentium corporis porro labore tempore iste dicta nobis autem, corrupti dolorem deserunt, rem alias, incidunt vero? Doloribus accusantium consequatur explicabo exercitationem corporis fugit voluptatem, fugiat ut id pariatur perspiciatis magni? Veritatis, a. Aperiam sed saepe consequatur nostrum dolor quisquam distinctio iure numquam, sit consequuntur quam impedit. Pariatur vero ullam alias dolores tenetur beatae iure dolore vitae aperiam veritatis odit natus quae fugit quo animi placeat, similique iste ipsa impedit ab, delectus doloribus! Numquam ut nostrum neque ducimus fugiat magni veniam reprehenderit sequi quidem nisi hic perspiciatis rerum dolorem quas ullam ipsum, ratione quibusdam. Optio esse minima tenetur. Cum earum culpa dolorem, quam obcaecati quisquam quod iste in ea illum, ratione id deleniti itaque doloribus fugit.', '', '2021-09-27 19:28:06', 1),
(7, 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus quibusdam, nemo architecto, aliquam voluptas modi iusto quae dolores dignissimos aperiam numquam ut cum consectetur suscipit id iste in culpa, qui vitae perspiciatis. Enim quia corrupti aut harum eos vel quos reiciendis asperiores quod sunt amet ducimus commodi aliquam adipisci, porro quo aperiam esse? At molestiae provident nesciunt asperiores quibusdam ratione, eius autem incidunt odit sunt nihil alias animi, veritatis ex, dicta voluptate. Nostrum beatae ipsa alias eum. Ut corporis at sapiente, voluptatem rem earum modi aperiam temporibus repellat beatae veniam?', '', '2021-09-28 06:28:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
