-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2014 pada 22.08
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `wayang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_category`
--

CREATE TABLE IF NOT EXISTS `wy_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `date_add` datetime NOT NULL,
  `published` tinyint(4) NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `permalink` varchar(225) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `wy_category`
--

INSERT INTO `wy_category` (`cat_id`, `title`, `date_add`, `published`, `date_modified`, `permalink`) VALUES
(1, 'Uncotegorize', '2014-02-21 00:00:00', 0, '2014-06-18 11:50:28', 'uncotegorize'),
(2, 'Web Programming', '2014-02-21 00:00:00', 1, NULL, 'web-programming'),
(3, 'PHP', '2014-02-21 00:00:00', 0, NULL, 'php'),
(4, 'HTML / CSS', '2014-02-21 00:00:00', 1, '2014-05-26 14:48:38', 'html-/-css'),
(5, 'Java Script', '2014-02-21 00:00:00', 1, '2014-05-29 16:54:47', 'java-script'),
(15, 'lagi now', '2014-05-29 17:03:26', 1, NULL, 'lagi-now');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_comment`
--

CREATE TABLE IF NOT EXISTS `wy_comment` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(225) NOT NULL,
  `c_email` varchar(225) NOT NULL,
  `c_url` varchar(225) NOT NULL,
  `c_date` datetime NOT NULL,
  `c_content` text NOT NULL,
  `c_post_id` int(11) DEFAULT NULL,
  `c_page_id` int(11) DEFAULT NULL,
  `c_ip` varchar(15) NOT NULL,
  `is_parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `wy_comment`
--

INSERT INTO `wy_comment` (`c_id`, `c_name`, `c_email`, `c_url`, `c_date`, `c_content`, `c_post_id`, `c_page_id`, `c_ip`, `is_parent`) VALUES
(1, 'Sender', 'sender@sender.com', 'sender.com', '2014-02-21 00:00:00', 'Test sending comment on first post', 1, NULL, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_page`
--

CREATE TABLE IF NOT EXISTS `wy_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `date_add` datetime NOT NULL,
  `content` longtext,
  `comment_open` tinyint(4) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `use_plugin` varchar(225) DEFAULT NULL,
  `is_parent` int(11) NOT NULL DEFAULT '0',
  `permalink` varchar(225) NOT NULL,
  `taglist` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `wy_page`
--

INSERT INTO `wy_page` (`page_id`, `author`, `title`, `date_add`, `content`, `comment_open`, `published`, `date_modified`, `use_plugin`, `is_parent`, `permalink`, `taglist`) VALUES
(1, 1, 'First Page', '2014-02-21 00:00:00', '<p>The boxes used in this template are nested inbetween a normal Bootstrap row and the start of your column layout. The boxes will be full-width boxes, so if you want to make them smaller then you will need to customize.</p>\r\n\r\n<p>A huge thanks to Death to the Stock Photo for allowing us to use the beautiful photos that make this template really come to life. When using this template, make sure your photos are decent. Also make sure that the file size on your photos is kept to a minumum to keep load times to a minimum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n', 1, 1, '2014-09-03 15:03:53', NULL, 0, 'first-page', ''),
(2, 0, 'Second Pages', '2014-09-03 18:16:29', '<p>Second Pages</p>\r\n', 1, 1, '2014-09-03 22:05:53', '', 0, 'second-pages', ''),
(3, 0, 'Page Tags', '2014-09-03 21:48:36', '<p>Page Tags</p>\r\n', 1, 1, NULL, '', 0, 'page-tags', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_plugin`
--

CREATE TABLE IF NOT EXISTS `wy_plugin` (
  `plugin_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(225) NOT NULL,
  `plugin_path` varchar(225) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_post`
--

CREATE TABLE IF NOT EXISTS `wy_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `tag` varchar(225) NOT NULL,
  `date_add` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `comment_open` tinyint(4) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `permalink` varchar(225) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `wy_post`
--

INSERT INTO `wy_post` (`post_id`, `title`, `tag`, `date_add`, `author`, `content`, `comment_open`, `comment_count`, `permalink`, `published`, `date_modified`) VALUES
(1, 'First Post', 'First Post, Post, Public', '2014-02-21 00:00:00', 1, '<p>The boxes used in this template are nested inbetween a normal Bootstrap row and the start of your column layout. The boxes will be full-width boxes, so if you want to make them smaller then you will need to customize.</p>\r\n\r\n<p>A huge thanks to Death to the Stock Photo for allowing us to use the beautiful photos that make this template really come to life. When using this template, make sure your photos are decent. Also make sure that the file size on your photos is kept to a minumum to keep load times to a minimum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', 1, 1, 'first-post', 1, NULL),
(2, 'Sample Post', 'Sample', '2014-02-21 00:00:00', 1, '<p>The boxes used in this template are nested inbetween a normal Bootstrap row and the start of your column layout. The boxes will be full-width boxes, so if you want to make them smaller then you will need to customize.</p>\n\n<p>A huge thanks to Death to the Stock Photo for allowing us to use the beautiful photos that make this template really come to life. When using this template, make sure your photos are decent. Also make sure that the file size on your photos is kept to a minumum to keep load times to a minimum.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', 1, 0, 'sample-post', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_setting`
--

CREATE TABLE IF NOT EXISTS `wy_setting` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_key` varchar(225) NOT NULL,
  `s_value` varchar(225) DEFAULT NULL,
  `is_auto` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `wy_setting`
--

INSERT INTO `wy_setting` (`s_id`, `s_key`, `s_value`, `is_auto`) VALUES
(1, 'url', 'http://localhost/wayangcms', '1'),
(2, 'sitename', 'Wayang CMS | It''s Your Puppets', '1'),
(3, 'description', 'Wayang CMS | It''s Your Puppets', '1'),
(4, 'userregister', '0', '0'),
(5, 'email', 'admin@wayang-cms.org', '1'),
(6, 'commentnotify', 'yes', '1'),
(7, 'posts_perpage', '10', '1'),
(8, 'posts_perrss', '10', '1'),
(9, 'dateformat', 'yyyy-mm-dd', '1'),
(10, 'timeformat', 'hh:MM:ss', '1'),
(11, 'permalink', 'yes', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_themes`
--

CREATE TABLE IF NOT EXISTS `wy_themes` (
  `themes_id` int(11) NOT NULL AUTO_INCREMENT,
  `themes_name` varchar(225) NOT NULL,
  `themes_path` varchar(225) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`themes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_user`
--

CREATE TABLE IF NOT EXISTS `wy_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `url` varchar(225) NOT NULL,
  `date_registered` datetime NOT NULL,
  `actiovation` varchar(225) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `display_name` varchar(225) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `wy_user`
--

INSERT INTO `wy_user` (`user_id`, `username`, `pass`, `email`, `url`, `date_registered`, `actiovation`, `status`, `display_name`) VALUES
(1, 'wyadmin', 'c44bcc770721a2470e105a1ca25b1b0e5104e6a6', 'admin@wayang-cms.org', 'http://www.wayang-cms.org', '2014-02-21 00:00:00', '', 'admin', 'Wayang Admin'),
(2, 'rully', 'c4f9390950f0360df55661efde6480a73f74a25d', 'rully@wayang-cms.org', 'http://rully.wayang-cms.org', '2014-02-21 00:00:00', NULL, 'member', 'Rully'),
(3, 'hafizh', '6f63dc5f608887ad8bf5315015ecde6a5ce11eae', 'hafizh@wayang-cms.org', 'http://hafizh.wayang-cms.org', '2014-02-21 00:00:00', NULL, 'member', 'Hafizh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wy_usermeta`
--

CREATE TABLE IF NOT EXISTS `wy_usermeta` (
  `um_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key_name` varchar(225) NOT NULL,
  `key_value` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`um_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
