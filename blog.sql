-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 01:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `commentmeta`
--

CREATE TABLE `commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postmeta`
--

CREATE TABLE `postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2018-03-18 06:43:06', '2018-03-18 06:43:06', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', 'What is Lorem Ipsum', '', 'publish', 'open', 'open', '', 'What-is-Lorem-Ipsum', '', '', '2018-03-18 06:43:06', '2018-03-18 06:43:06', '', 0, '', 0, 'post', '', 0),
(2, 1, '2018-03-18 06:43:45', '2018-03-18 06:43:45', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'Where does it come from', '', 'publish', 'open', 'open', '', 'Where-does-it-come-from', '', '', '2018-03-18 06:43:45', '2018-03-18 06:43:45', '', 0, '', 0, 'post', '', 0),
(3, 1, '2018-03-18 06:44:21', '2018-03-18 06:44:21', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 'Why do we use it', '', 'publish', 'open', 'open', '', 'Why-do-we-use-it', '', '', '2018-03-18 06:44:21', '2018-03-18 06:44:21', '', 0, '', 0, 'post', '', 0),
(4, 1, '2018-03-18 06:44:59', '2018-03-18 06:44:59', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span>', 'Where can I get some', '', 'publish', 'open', 'open', '', 'Where-can-I-get-some', '', '', '2018-03-18 06:44:59', '2018-03-18 06:44:59', '', 0, '', 0, 'post', '', 0),
(5, 1, '2018-03-18 06:45:46', '2018-03-18 06:45:46', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tincidunt metus accumsan diam tempus, sed facilisis nisl dictum. Pellentesque ligula urna, viverra vel tellus nec, euismod semper nunc. Integer semper urna nec mi consequat blandit. Aliquam pharetra lectus vitae ante placerat lacinia. Proin rutrum posuere odio, vel convallis ligula tempor ut. Pellentesque vehicula eleifend lacus id pretium. Donec in nulla a sapien consectetur porta at id enim. Nam hendrerit vel lectus sit amet bibendum. Vestibulum non tellus sit amet enim laoreet convallis quis quis dolor. Nulla faucibus nibh iaculis ultricies tempor. Aliquam ac tortor pharetra, venenatis justo et, porttitor est. Duis volutpat sem at sem tincidunt, sed commodo ex iaculis. Duis lorem tortor, aliquet a enim vel, luctus fringilla tellus. Pellentesque cursus ligula lorem, non venenatis metus posuere semper. Aliquam sagittis viverra feugiat. Nam sed urna convallis massa faucibus malesuada a sed odio.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Quisque at enim ac tortor hendrerit finibus non sit amet orci. Quisque dictum augue odio, ac venenatis risus accumsan ut. Aliquam vitae ligula tellus. Fusce facilisis nulla velit. Mauris sodales viverra diam, sit amet rutrum risus faucibus non. Sed eget ultrices est, sed luctus lorem. Etiam scelerisque massa aliquet, interdum elit et, venenatis eros. Nulla ultrices ultrices tellus, eu blandit orci sagittis a. Nam pharetra, nisl at porttitor mollis, tellus lectus eleifend lacus, vel accumsan tellus erat non quam. Suspendisse potenti. In commodo condimentum nisl. Proin euismod magna a fringilla vulputate. Cras mattis ornare nisl vitae consequat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Vestibulum ac orci eget tellus rhoncus luctus. Aliquam eleifend dictum porta. Nulla scelerisque vitae diam nec tristique. In pharetra eleifend orci, non ultrices quam rhoncus eu. Cras ac massa rutrum, commodo nisl pharetra, tempus odio. Sed ac sapien quis ex fringilla ornare. Praesent lorem lectus, scelerisque sed bibendum in, porttitor ut libero. Praesent quis luctus arcu, vel volutpat eros. Curabitur urna erat, lobortis id lacus ut, imperdiet hendrerit nisl. Aenean et mi non eros varius tincidunt et vitae est. Sed bibendum et erat ut vulputate.</p>', 'Lorem ipsum dolor sit amet consectetur adipiscing elit', '', 'publish', 'open', 'open', '', 'Lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', '', '', '2018-03-18 06:47:19', '2018-03-18 06:47:19', '', 0, '', 0, 'post', '', 0),
(6, 1, '2018-03-18 06:47:08', '2018-03-18 06:47:08', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed non bibendum tortor. Aliquam porttitor tempor nulla vel efficitur. Ut euismod nisl eu sagittis elementum. Nulla facilisi. Quisque in commodo erat, eu maximus turpis. Fusce nisi libero, pellentesque a justo id, cursus porttitor purus. Proin aliquet nisi vestibulum, semper augue id, ullamcorper lectus. Ut mauris lorem, egestas non placerat vel, viverra sit amet dolor. Etiam mollis congue odio, vel efficitur libero gravida at. Pellentesque vel accumsan justo. Nunc a rhoncus quam. Etiam purus quam, sollicitudin vitae varius malesuada, imperdiet ut lacus. Quisque eu est ac nisi porttitor imperdiet sed eu massa. Nam vel ligula quis tortor dictum congue.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Ut placerat dolor at feugiat elementum. Proin gravida libero et dui lacinia, a blandit odio posuere. Mauris accumsan iaculis mauris, pulvinar pellentesque elit volutpat nec. Aenean facilisis augue id nisi consequat porta. Nulla tristique tortor id semper vulputate. Maecenas in dui id lacus euismod luctus. Pellentesque lectus dolor, pellentesque sit amet tincidunt ac, dapibus vitae libero. In eget mauris sollicitudin, accumsan sapien et, vulputate nibh. Curabitur a ligula consequat, rutrum velit sit amet, tincidunt eros. Etiam volutpat fringilla diam, sed mollis ipsum pharetra sed. Donec euismod risus sed arcu lobortis, commodo aliquet mauris tincidunt. Nam mattis dapibus massa, et dapibus leo accumsan eu. Vestibulum id massa facilisis, tempor nisl id, tempor leo. In placerat, ipsum vel fringilla luctus, magna ligula pellentesque elit, eget dictum dolor arcu quis urna. In interdum nunc eget iaculis commodo. Maecenas molestie, dui vitae eleifend vestibulum, neque diam porta diam, non lobortis massa tellus tincidunt tellus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed convallis eros ut mollis lacinia. In in arcu a dui tincidunt pretium eu eu enim. Nam id lacinia massa, eu varius quam. Duis eleifend urna in nisi vulputate porta. Maecenas eu justo ex. Nunc faucibus nunc eget commodo sollicitudin. Quisque vehicula massa volutpat euismod porta. Integer venenatis, sem vitae volutpat blandit, lacus nulla blandit arcu, accumsan feugiat velit mauris nec purus.</p>', 'Sed non bibendum tortor aliquam porttitor tempor nulla vel efficitur', '', 'publish', 'open', 'open', '', 'Sed-non-bibendum-tortor-aliquam-porttitor-tempor-nulla-vel-efficitur', '', '', '2018-03-18 06:47:08', '2018-03-18 06:47:08', '', 0, '', 0, 'post', '', 0),
(7, 1, '2018-03-18 06:48:11', '2018-03-18 06:48:11', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nunc tortor elit, tincidunt vitae pharetra et, hendrerit et urna. Vivamus congue interdum justo. Duis porta nibh lorem, eget vehicula nisl tincidunt nec. Duis congue est ut sollicitudin luctus. Duis mollis leo id velit blandit, id pretium tortor ornare. Aliquam placerat mollis molestie. Sed suscipit quis libero eu porta. Mauris eleifend ut dolor non lobortis. Vestibulum facilisis lacinia ante, vitae pharetra tortor dapibus quis. Integer sollicitudin nibh vitae ante egestas malesuada. Donec vitae nibh non purus euismod fringilla. Vestibulum euismod venenatis semper. Aliquam odio metus, consectetur a leo quis, tincidunt tincidunt lacus. Cras metus mauris, sagittis ac consectetur in, lacinia non diam. Sed vitae leo imperdiet tellus iaculis sodales ut ullamcorper purus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nunc sit amet condimentum augue. Duis bibendum dapibus euismod. Donec sed leo eget nisl sodales aliquam ut a eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultricies, odio eget tempor vulputate, ante nisi elementum urna, at ultrices urna elit ac mi. Curabitur felis nulla, varius id porttitor et, hendrerit eget mauris. Fusce at cursus diam. Etiam condimentum feugiat libero, in convallis lorem imperdiet vestibulum. In pretium pharetra ipsum sed tincidunt. Integer dapibus tempus ipsum a tincidunt. Vestibulum eget risus et erat elementum rhoncus a quis enim. Sed sit amet neque tempus, consequat erat iaculis, hendrerit enim. In pretium erat nisi, sit amet rhoncus diam imperdiet id. Morbi id odio sit amet ligula iaculis lobortis. Vivamus bibendum dignissim risus, ut maximus risus commodo sed. Etiam tristique et erat non viverra.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Maecenas commodo luctus hendrerit. Ut imperdiet nibh sed aliquam luctus. Duis posuere, elit vel blandit sagittis, enim odio pharetra sapien, nec suscipit ante nibh at neque. Curabitur vel pellentesque libero. Duis maximus nisi id lacus ultrices luctus. Donec egestas elementum scelerisque. Nullam rutrum nisl elit, non bibendum augue congue at.</p>', 'Nunc tortor elit tincidunt vitae pharetra et hendrerit et urna', '', 'publish', 'open', 'open', '', 'Nunc-tortor-elit-tincidunt-vitae-pharetra-et-hendrerit-et-urna', '', '', '2018-03-18 06:48:11', '2018-03-18 06:48:11', '', 0, '', 0, 'post', '', 0),
(8, 1, '2018-03-18 06:49:11', '2018-03-18 06:49:11', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Morbi ut sapien purus. Aliquam convallis ex vel felis pretium volutpat. In sed eros dui. Morbi justo dui, semper sed dui eget, lacinia facilisis lectus. Aliquam placerat tellus eu egestas facilisis. Donec porta magna diam, non ultrices augue tempor sit amet. Nulla consequat scelerisque lacus non ullamcorper. Praesent vulputate cursus mi id commodo.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Curabitur sollicitudin eget nisi id viverra. Quisque venenatis libero non vulputate dictum. Aliquam nulla elit, consectetur non libero non, consequat maximus lorem. Nunc quis luctus tellus, ac pharetra felis. Mauris viverra elementum ante, quis suscipit diam posuere at. Sed laoreet urna a turpis viverra, vitae tincidunt purus venenatis. In a est venenatis, pharetra risus nec, cursus mi. Nam consectetur sem vel eros tempus condimentum. Praesent gravida vel risus non fermentum. Vivamus tincidunt dolor sit amet dictum facilisis. Nam rhoncus orci nunc, quis viverra velit consectetur vel. Aenean dolor ligula, ultricies sed mi a, blandit rutrum tortor. Etiam tempor fringilla lacus sit amet consequat. Cras sit amet massa eu dolor ornare fermentum eget id tortor. Quisque tempor massa sit amet posuere tempor. Praesent efficitur, magna id mattis aliquet, neque leo egestas nibh, non vestibulum ligula metus at nisi.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Mauris tempor a est et pharetra. Donec tempor at ex nec placerat. Quisque auctor libero ac pellentesque facilisis. Nulla ac quam felis. Donec porta tincidunt eros sed aliquam. Curabitur a porttitor lacus. Mauris finibus tincidunt convallis. Praesent consequat mauris ornare tempor rhoncus. Cras eu ultrices enim. Nam laoreet tempus magna, vitae pellentesque mauris. Proin dignissim nibh lorem, ac imperdiet ipsum posuere id. Donec vulputate dui eu condimentum rhoncus. Aliquam id fringilla lorem.</p>', 'Morbi ut sapien purus aliquam convallis ex vel felis pretium volutpat', '', 'publish', 'open', 'open', '', 'Morbi-ut-sapien-purus-aliquam-convallis-ex-vel-felis-pretium-volutpat', '', '', '2018-03-18 06:49:11', '2018-03-18 06:49:11', '', 0, '', 0, 'post', '', 0),
(9, 1, '2018-03-18 06:50:20', '2018-03-18 06:50:20', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Aliquam libero odio, auctor sit amet aliquam vitae, aliquam et dui. Vestibulum at libero nec turpis vestibulum aliquam. Vestibulum a magna non lacus malesuada tincidunt a nec sem. Mauris nec dui in tortor euismod dignissim. Sed semper tempus erat, a tincidunt turpis mollis nec. Donec ut purus lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin ac risus suscipit, malesuada urna id, dictum augue. Curabitur interdum porttitor sollicitudin. Vivamus ultrices convallis arcu, in rutrum sapien ullamcorper in.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Suspendisse finibus ipsum eget enim malesuada, auctor imperdiet tellus convallis. Nulla sit amet metus felis. Morbi auctor a nisl eget facilisis. Sed ut purus id sapien iaculis eleifend. Nullam eu sem ligula. Ut ultricies augue non lacus suscipit pellentesque. Sed neque nisi, finibus sed auctor id, gravida vel dolor. Maecenas porttitor, elit ac vehicula dictum, nisi felis suscipit nisi, eu dapibus sapien elit vel est. Duis ac sem convallis, faucibus ligula in, condimentum augue. Sed facilisis pharetra porta. Nulla ornare metus dignissim, convallis odio eu, egestas nibh.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In sed fringilla arcu. Sed arcu lorem, semper eget magna ornare, egestas pulvinar nisi. Nullam placerat odio nulla, et lobortis justo elementum in. Cras efficitur tortor a convallis iaculis. Curabitur sollicitudin egestas elementum. Duis bibendum libero ac magna consectetur iaculis. Morbi scelerisque vestibulum suscipit. Vivamus ut posuere risus, et pulvinar metus. Ut tincidunt facilisis massa vitae vulputate. Donec at diam eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum pharetra sollicitudin varius. In commodo lectus lacus, eget interdum neque porta in. Pellentesque dictum enim eu nulla dapibus, nec volutpat ex ornare. Ut consectetur convallis convallis.</p>', 'Aliquam libero odio auctor sit amet aliquam vitae', '', 'publish', 'open', 'open', '', 'Aliquam-libero-odio-auctor-sit-amet-aliquam-vitae', '', '', '2018-03-18 06:50:20', '2018-03-18 06:50:20', '', 0, '', 0, 'post', '', 0),
(10, 1, '2018-03-18 06:51:03', '2018-03-18 06:51:03', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tincidunt metus accumsan diam tempus, sed facilisis nisl dictum. Pellentesque ligula urna, viverra vel tellus nec, euismod semper nunc. Integer semper urna nec mi consequat blandit. Aliquam pharetra lectus vitae ante placerat lacinia. Proin rutrum posuere odio, vel convallis ligula tempor ut. Pellentesque vehicula eleifend lacus id pretium. Donec in nulla a sapien consectetur porta at id enim. Nam hendrerit vel lectus sit amet bibendum. Vestibulum non tellus sit amet enim laoreet convallis quis quis dolor. Nulla faucibus nibh iaculis ultricies tempor. Aliquam ac tortor pharetra, venenatis justo et, porttitor est. Duis volutpat sem at sem tincidunt, sed commodo ex iaculis. Duis lorem tortor, aliquet a enim vel, luctus fringilla tellus. Pellentesque cursus ligula lorem, non venenatis metus posuere semper. Aliquam sagittis viverra feugiat. Nam sed urna convallis massa faucibus malesuada a sed odio.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Quisque at enim ac tortor hendrerit finibus non sit amet orci. Quisque dictum augue odio, ac venenatis risus accumsan ut. Aliquam vitae ligula tellus. Fusce facilisis nulla velit. Mauris sodales viverra diam, sit amet rutrum risus faucibus non. Sed eget ultrices est, sed luctus lorem. Etiam scelerisque massa aliquet, interdum elit et, venenatis eros. Nulla ultrices ultrices tellus, eu blandit orci sagittis a. Nam pharetra, nisl at porttitor mollis, tellus lectus eleifend lacus, vel accumsan tellus erat non quam. Suspendisse potenti. In commodo condimentum nisl. Proin euismod magna a fringilla vulputate. Cras mattis ornare nisl vitae consequat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Vestibulum ac orci eget tellus rhoncus luctus. Aliquam eleifend dictum porta. Nulla scelerisque vitae diam nec tristique. In pharetra eleifend orci, non ultrices quam rhoncus eu. Cras ac massa rutrum, commodo nisl pharetra, tempus odio. Sed ac sapien quis ex fringilla ornare. Praesent lorem lectus, scelerisque sed bibendum in, porttitor ut libero. Praesent quis luctus arcu, vel volutpat eros. Curabitur urna erat, lobortis id lacus ut, imperdiet hendrerit nisl. Aenean et mi non eros varius tincidunt et vitae est. Sed bibendum et erat ut vulputate.</p>', 'Quisque at enim ac tortor hendrerit finibus non sit amet orci', '', 'publish', 'open', 'open', '', 'Quisque-at-enim-ac-tortor-hendrerit-finibus-non-sit-amet-orci', '', '', '2018-03-18 06:51:03', '2018-03-18 06:51:03', '', 0, '', 0, 'post', '', 0),
(11, 1, '2018-03-18 06:51:55', '2018-03-18 06:51:55', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed non bibendum tortor. Aliquam porttitor tempor nulla vel efficitur. Ut euismod nisl eu sagittis elementum. Nulla facilisi. Quisque in commodo erat, eu maximus turpis. Fusce nisi libero, pellentesque a justo id, cursus porttitor purus. Proin aliquet nisi vestibulum, semper augue id, ullamcorper lectus. Ut mauris lorem, egestas non placerat vel, viverra sit amet dolor. Etiam mollis congue odio, vel efficitur libero gravida at. Pellentesque vel accumsan justo. Nunc a rhoncus quam. Etiam purus quam, sollicitudin vitae varius malesuada, imperdiet ut lacus. Quisque eu est ac nisi porttitor imperdiet sed eu massa. Nam vel ligula quis tortor dictum congue.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Ut placerat dolor at feugiat elementum. Proin gravida libero et dui lacinia, a blandit odio posuere. Mauris accumsan iaculis mauris, pulvinar pellentesque elit volutpat nec. Aenean facilisis augue id nisi consequat porta. Nulla tristique tortor id semper vulputate. Maecenas in dui id lacus euismod luctus. Pellentesque lectus dolor, pellentesque sit amet tincidunt ac, dapibus vitae libero. In eget mauris sollicitudin, accumsan sapien et, vulputate nibh. Curabitur a ligula consequat, rutrum velit sit amet, tincidunt eros. Etiam volutpat fringilla diam, sed mollis ipsum pharetra sed. Donec euismod risus sed arcu lobortis, commodo aliquet mauris tincidunt. Nam mattis dapibus massa, et dapibus leo accumsan eu. Vestibulum id massa facilisis, tempor nisl id, tempor leo. In placerat, ipsum vel fringilla luctus, magna ligula pellentesque elit, eget dictum dolor arcu quis urna. In interdum nunc eget iaculis commodo. Maecenas molestie, dui vitae eleifend vestibulum, neque diam porta diam, non lobortis massa tellus tincidunt tellus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed convallis eros ut mollis lacinia. In in arcu a dui tincidunt pretium eu eu enim. Nam id lacinia massa, eu varius quam. Duis eleifend urna in nisi vulputate porta. Maecenas eu justo ex. Nunc faucibus nunc eget commodo sollicitudin. Quisque vehicula massa volutpat euismod porta. Integer venenatis, sem vitae volutpat blandit, lacus nulla blandit arcu, accumsan feugiat velit mauris nec purus.</p>', 'Ut placerat dolor at feugiat elementum proin gravida libero et dui lacinia', '', 'publish', 'open', 'open', '', 'Ut-placerat-dolor-at-feugiat-elementum-proin-gravida-libero-et-dui-lacinia', '', '', '2018-03-18 06:51:55', '2018-03-18 06:51:55', '', 0, '', 0, 'post', '', 0),
(12, 1, '2018-03-18 06:52:28', '2018-03-18 06:52:28', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nunc tortor elit, tincidunt vitae pharetra et, hendrerit et urna. Vivamus congue interdum justo. Duis porta nibh lorem, eget vehicula nisl tincidunt nec. Duis congue est ut sollicitudin luctus. Duis mollis leo id velit blandit, id pretium tortor ornare. Aliquam placerat mollis molestie. Sed suscipit quis libero eu porta. Mauris eleifend ut dolor non lobortis. Vestibulum facilisis lacinia ante, vitae pharetra tortor dapibus quis. Integer sollicitudin nibh vitae ante egestas malesuada. Donec vitae nibh non purus euismod fringilla. Vestibulum euismod venenatis semper. Aliquam odio metus, consectetur a leo quis, tincidunt tincidunt lacus. Cras metus mauris, sagittis ac consectetur in, lacinia non diam. Sed vitae leo imperdiet tellus iaculis sodales ut ullamcorper purus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nunc sit amet condimentum augue. Duis bibendum dapibus euismod. Donec sed leo eget nisl sodales aliquam ut a eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultricies, odio eget tempor vulputate, ante nisi elementum urna, at ultrices urna elit ac mi. Curabitur felis nulla, varius id porttitor et, hendrerit eget mauris. Fusce at cursus diam. Etiam condimentum feugiat libero, in convallis lorem imperdiet vestibulum. In pretium pharetra ipsum sed tincidunt. Integer dapibus tempus ipsum a tincidunt. Vestibulum eget risus et erat elementum rhoncus a quis enim. Sed sit amet neque tempus, consequat erat iaculis, hendrerit enim. In pretium erat nisi, sit amet rhoncus diam imperdiet id. Morbi id odio sit amet ligula iaculis lobortis. Vivamus bibendum dignissim risus, ut maximus risus commodo sed. Etiam tristique et erat non viverra.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Maecenas commodo luctus hendrerit. Ut imperdiet nibh sed aliquam luctus. Duis posuere, elit vel blandit sagittis, enim odio pharetra sapien, nec suscipit ante nibh at neque. Curabitur vel pellentesque libero. Duis maximus nisi id lacus ultrices luctus. Donec egestas elementum scelerisque. Nullam rutrum nisl elit, non bibendum augue congue at.</p>', 'Nunc sit amet condimentum augue duis bibendum dapibus euismod', '', 'publish', 'open', 'open', '', 'Nunc-sit-amet-condimentum-augue-duis-bibendum-dapibus-euismod', '', '', '2018-03-18 06:52:28', '2018-03-18 06:52:28', '', 0, '', 0, 'post', '', 0),
(13, 1, '2018-03-18 06:53:06', '2018-03-18 06:53:06', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Morbi ut sapien purus. Aliquam convallis ex vel felis pretium volutpat. In sed eros dui. Morbi justo dui, semper sed dui eget, lacinia facilisis lectus. Aliquam placerat tellus eu egestas facilisis. Donec porta magna diam, non ultrices augue tempor sit amet. Nulla consequat scelerisque lacus non ullamcorper. Praesent vulputate cursus mi id commodo.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Curabitur sollicitudin eget nisi id viverra. Quisque venenatis libero non vulputate dictum. Aliquam nulla elit, consectetur non libero non, consequat maximus lorem. Nunc quis luctus tellus, ac pharetra felis. Mauris viverra elementum ante, quis suscipit diam posuere at. Sed laoreet urna a turpis viverra, vitae tincidunt purus venenatis. In a est venenatis, pharetra risus nec, cursus mi. Nam consectetur sem vel eros tempus condimentum. Praesent gravida vel risus non fermentum. Vivamus tincidunt dolor sit amet dictum facilisis. Nam rhoncus orci nunc, quis viverra velit consectetur vel. Aenean dolor ligula, ultricies sed mi a, blandit rutrum tortor. Etiam tempor fringilla lacus sit amet consequat. Cras sit amet massa eu dolor ornare fermentum eget id tortor. Quisque tempor massa sit amet posuere tempor. Praesent efficitur, magna id mattis aliquet, neque leo egestas nibh, non vestibulum ligula metus at nisi.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Mauris tempor a est et pharetra. Donec tempor at ex nec placerat. Quisque auctor libero ac pellentesque facilisis. Nulla ac quam felis. Donec porta tincidunt eros sed aliquam. Curabitur a porttitor lacus. Mauris finibus tincidunt convallis. Praesent consequat mauris ornare tempor rhoncus. Cras eu ultrices enim. Nam laoreet tempus magna, vitae pellentesque mauris. Proin dignissim nibh lorem, ac imperdiet ipsum posuere id. Donec vulputate dui eu condimentum rhoncus. Aliquam id fringilla lorem.</p>', 'Curabitur sollicitudin eget nisi id viverra Quisque venenatis', '', 'publish', 'open', 'open', '', 'Curabitur-sollicitudin-eget-nisi-id-viverra-Quisque-venenatis', '', '', '2018-03-18 06:53:06', '2018-03-18 06:53:06', '', 0, '', 0, 'post', '', 0),
(14, 1, '2018-03-18 06:53:43', '2018-03-18 06:53:43', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Aliquam libero odio, auctor sit amet aliquam vitae, aliquam et dui. Vestibulum at libero nec turpis vestibulum aliquam. Vestibulum a magna non lacus malesuada tincidunt a nec sem. Mauris nec dui in tortor euismod dignissim. Sed semper tempus erat, a tincidunt turpis mollis nec. Donec ut purus lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin ac risus suscipit, malesuada urna id, dictum augue. Curabitur interdum porttitor sollicitudin. Vivamus ultrices convallis arcu, in rutrum sapien ullamcorper in.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Suspendisse finibus ipsum eget enim malesuada, auctor imperdiet tellus convallis. Nulla sit amet metus felis. Morbi auctor a nisl eget facilisis. Sed ut purus id sapien iaculis eleifend. Nullam eu sem ligula. Ut ultricies augue non lacus suscipit pellentesque. Sed neque nisi, finibus sed auctor id, gravida vel dolor. Maecenas porttitor, elit ac vehicula dictum, nisi felis suscipit nisi, eu dapibus sapien elit vel est. Duis ac sem convallis, faucibus ligula in, condimentum augue. Sed facilisis pharetra porta. Nulla ornare metus dignissim, convallis odio eu, egestas nibh.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In sed fringilla arcu. Sed arcu lorem, semper eget magna ornare, egestas pulvinar nisi. Nullam placerat odio nulla, et lobortis justo elementum in. Cras efficitur tortor a convallis iaculis. Curabitur sollicitudin egestas elementum. Duis bibendum libero ac magna consectetur iaculis. Morbi scelerisque vestibulum suscipit. Vivamus ut posuere risus, et pulvinar metus. Ut tincidunt facilisis massa vitae vulputate. Donec at diam eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum pharetra sollicitudin varius. In commodo lectus lacus, eget interdum neque porta in. Pellentesque dictum enim eu nulla dapibus, nec volutpat ex ornare. Ut consectetur convallis convallis.</p>', 'Suspendisse finibus ipsum eget enim malesuada', '', 'publish', 'open', 'open', '', 'Suspendisse-finibus-ipsum-eget-enim-malesuada', '', '', '2018-03-18 06:53:43', '2018-03-18 06:53:43', '', 0, '', 0, 'post', '', 0),
(15, 1, '2018-03-18 06:54:17', '2018-03-18 06:54:17', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tincidunt metus accumsan diam tempus, sed facilisis nisl dictum. Pellentesque ligula urna, viverra vel tellus nec, euismod semper nunc. Integer semper urna nec mi consequat blandit. Aliquam pharetra lectus vitae ante placerat lacinia. Proin rutrum posuere odio, vel convallis ligula tempor ut. Pellentesque vehicula eleifend lacus id pretium. Donec in nulla a sapien consectetur porta at id enim. Nam hendrerit vel lectus sit amet bibendum. Vestibulum non tellus sit amet enim laoreet convallis quis quis dolor. Nulla faucibus nibh iaculis ultricies tempor. Aliquam ac tortor pharetra, venenatis justo et, porttitor est. Duis volutpat sem at sem tincidunt, sed commodo ex iaculis. Duis lorem tortor, aliquet a enim vel, luctus fringilla tellus. Pellentesque cursus ligula lorem, non venenatis metus posuere semper. Aliquam sagittis viverra feugiat. Nam sed urna convallis massa faucibus malesuada a sed odio.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Quisque at enim ac tortor hendrerit finibus non sit amet orci. Quisque dictum augue odio, ac venenatis risus accumsan ut. Aliquam vitae ligula tellus. Fusce facilisis nulla velit. Mauris sodales viverra diam, sit amet rutrum risus faucibus non. Sed eget ultrices est, sed luctus lorem. Etiam scelerisque massa aliquet, interdum elit et, venenatis eros. Nulla ultrices ultrices tellus, eu blandit orci sagittis a. Nam pharetra, nisl at porttitor mollis, tellus lectus eleifend lacus, vel accumsan tellus erat non quam. Suspendisse potenti. In commodo condimentum nisl. Proin euismod magna a fringilla vulputate. Cras mattis ornare nisl vitae consequat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Vestibulum ac orci eget tellus rhoncus luctus. Aliquam eleifend dictum porta. Nulla scelerisque vitae diam nec tristique. In pharetra eleifend orci, non ultrices quam rhoncus eu. Cras ac massa rutrum, commodo nisl pharetra, tempus odio. Sed ac sapien quis ex fringilla ornare. Praesent lorem lectus, scelerisque sed bibendum in, porttitor ut libero. Praesent quis luctus arcu, vel volutpat eros. Curabitur urna erat, lobortis id lacus ut, imperdiet hendrerit nisl. Aenean et mi non eros varius tincidunt et vitae est. Sed bibendum et erat ut vulputate.</p>', 'Vestibulum ac orci eget tellus rhoncus luctus', '', 'publish', 'open', 'open', '', 'Vestibulum-ac-orci-eget-tellus-rhoncus-luctus', '', '', '2018-03-18 06:54:17', '2018-03-18 06:54:17', '', 0, '', 0, 'post', '', 0),
(16, 1, '2018-03-18 06:55:26', '2018-03-18 06:55:26', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed non bibendum tortor. Aliquam porttitor tempor nulla vel efficitur. Ut euismod nisl eu sagittis elementum. Nulla facilisi. Quisque in commodo erat, eu maximus turpis. Fusce nisi libero, pellentesque a justo id, cursus porttitor purus. Proin aliquet nisi vestibulum, semper augue id, ullamcorper lectus. Ut mauris lorem, egestas non placerat vel, viverra sit amet dolor. Etiam mollis congue odio, vel efficitur libero gravida at. Pellentesque vel accumsan justo. Nunc a rhoncus quam. Etiam purus quam, sollicitudin vitae varius malesuada, imperdiet ut lacus. Quisque eu est ac nisi porttitor imperdiet sed eu massa. Nam vel ligula quis tortor dictum congue.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Ut placerat dolor at feugiat elementum. Proin gravida libero et dui lacinia, a blandit odio posuere. Mauris accumsan iaculis mauris, pulvinar pellentesque elit volutpat nec. Aenean facilisis augue id nisi consequat porta. Nulla tristique tortor id semper vulputate. Maecenas in dui id lacus euismod luctus. Pellentesque lectus dolor, pellentesque sit amet tincidunt ac, dapibus vitae libero. In eget mauris sollicitudin, accumsan sapien et, vulputate nibh. Curabitur a ligula consequat, rutrum velit sit amet, tincidunt eros. Etiam volutpat fringilla diam, sed mollis ipsum pharetra sed. Donec euismod risus sed arcu lobortis, commodo aliquet mauris tincidunt. Nam mattis dapibus massa, et dapibus leo accumsan eu. Vestibulum id massa facilisis, tempor nisl id, tempor leo. In placerat, ipsum vel fringilla luctus, magna ligula pellentesque elit, eget dictum dolor arcu quis urna. In interdum nunc eget iaculis commodo. Maecenas molestie, dui vitae eleifend vestibulum, neque diam porta diam, non lobortis massa tellus tincidunt tellus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed convallis eros ut mollis lacinia. In in arcu a dui tincidunt pretium eu eu enim. Nam id lacinia massa, eu varius quam. Duis eleifend urna in nisi vulputate porta. Maecenas eu justo ex. Nunc faucibus nunc eget commodo sollicitudin. Quisque vehicula massa volutpat euismod porta. Integer venenatis, sem vitae volutpat blandit, lacus nulla blandit arcu, accumsan feugiat velit mauris nec purus.</p>', 'Sed convallis eros ut mollis lacinia', '', 'publish', 'open', 'open', '', 'Sed-convallis-eros-ut-mollis-lacinia', '', '', '2018-03-18 06:55:26', '2018-03-18 06:55:26', '', 0, '', 0, 'post', '', 0),
(17, 1, '2018-03-18 06:56:02', '2018-03-18 06:56:02', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nunc tortor elit, tincidunt vitae pharetra et, hendrerit et urna. Vivamus congue interdum justo. Duis porta nibh lorem, eget vehicula nisl tincidunt nec. Duis congue est ut sollicitudin luctus. Duis mollis leo id velit blandit, id pretium tortor ornare. Aliquam placerat mollis molestie. Sed suscipit quis libero eu porta. Mauris eleifend ut dolor non lobortis. Vestibulum facilisis lacinia ante, vitae pharetra tortor dapibus quis. Integer sollicitudin nibh vitae ante egestas malesuada. Donec vitae nibh non purus euismod fringilla. Vestibulum euismod venenatis semper. Aliquam odio metus, consectetur a leo quis, tincidunt tincidunt lacus. Cras metus mauris, sagittis ac consectetur in, lacinia non diam. Sed vitae leo imperdiet tellus iaculis sodales ut ullamcorper purus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nunc sit amet condimentum augue. Duis bibendum dapibus euismod. Donec sed leo eget nisl sodales aliquam ut a eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultricies, odio eget tempor vulputate, ante nisi elementum urna, at ultrices urna elit ac mi. Curabitur felis nulla, varius id porttitor et, hendrerit eget mauris. Fusce at cursus diam. Etiam condimentum feugiat libero, in convallis lorem imperdiet vestibulum. In pretium pharetra ipsum sed tincidunt. Integer dapibus tempus ipsum a tincidunt. Vestibulum eget risus et erat elementum rhoncus a quis enim. Sed sit amet neque tempus, consequat erat iaculis, hendrerit enim. In pretium erat nisi, sit amet rhoncus diam imperdiet id. Morbi id odio sit amet ligula iaculis lobortis. Vivamus bibendum dignissim risus, ut maximus risus commodo sed. Etiam tristique et erat non viverra.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Maecenas commodo luctus hendrerit. Ut imperdiet nibh sed aliquam luctus. Duis posuere, elit vel blandit sagittis, enim odio pharetra sapien, nec suscipit ante nibh at neque. Curabitur vel pellentesque libero. Duis maximus nisi id lacus ultrices luctus. Donec egestas elementum scelerisque. Nullam rutrum nisl elit, non bibendum augue congue at.</p>', 'Maecenas commodo luctus hendrerit', '', 'publish', 'open', 'open', '', 'Maecenas-commodo-luctus-hendrerit', '', '', '2018-03-18 06:56:02', '2018-03-18 06:56:02', '', 0, '', 0, 'post', '', 0),
(18, 1, '2018-03-18 06:56:32', '2018-03-18 06:56:32', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Morbi ut sapien purus. Aliquam convallis ex vel felis pretium volutpat. In sed eros dui. Morbi justo dui, semper sed dui eget, lacinia facilisis lectus. Aliquam placerat tellus eu egestas facilisis. Donec porta magna diam, non ultrices augue tempor sit amet. Nulla consequat scelerisque lacus non ullamcorper. Praesent vulputate cursus mi id commodo.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Curabitur sollicitudin eget nisi id viverra. Quisque venenatis libero non vulputate dictum. Aliquam nulla elit, consectetur non libero non, consequat maximus lorem. Nunc quis luctus tellus, ac pharetra felis. Mauris viverra elementum ante, quis suscipit diam posuere at. Sed laoreet urna a turpis viverra, vitae tincidunt purus venenatis. In a est venenatis, pharetra risus nec, cursus mi. Nam consectetur sem vel eros tempus condimentum. Praesent gravida vel risus non fermentum. Vivamus tincidunt dolor sit amet dictum facilisis. Nam rhoncus orci nunc, quis viverra velit consectetur vel. Aenean dolor ligula, ultricies sed mi a, blandit rutrum tortor. Etiam tempor fringilla lacus sit amet consequat. Cras sit amet massa eu dolor ornare fermentum eget id tortor. Quisque tempor massa sit amet posuere tempor. Praesent efficitur, magna id mattis aliquet, neque leo egestas nibh, non vestibulum ligula metus at nisi.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Mauris tempor a est et pharetra. Donec tempor at ex nec placerat. Quisque auctor libero ac pellentesque facilisis. Nulla ac quam felis. Donec porta tincidunt eros sed aliquam. Curabitur a porttitor lacus. Mauris finibus tincidunt convallis. Praesent consequat mauris ornare tempor rhoncus. Cras eu ultrices enim. Nam laoreet tempus magna, vitae pellentesque mauris. Proin dignissim nibh lorem, ac imperdiet ipsum posuere id. Donec vulputate dui eu condimentum rhoncus. Aliquam id fringilla lorem.</p>', 'Mauris tempor a est et pharetra donec tempor at ex nec placerat', '', 'publish', 'open', 'open', '', 'Mauris-tempor-a-est-et-pharetra-donec-tempor-at-ex-nec-placerat', '', '', '2018-03-18 06:56:32', '2018-03-18 06:56:32', '', 0, '', 0, 'post', '', 0),
(19, 1, '2018-03-18 06:57:20', '2018-03-18 06:57:20', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Aliquam libero odio, auctor sit amet aliquam vitae, aliquam et dui. Vestibulum at libero nec turpis vestibulum aliquam. Vestibulum a magna non lacus malesuada tincidunt a nec sem. Mauris nec dui in tortor euismod dignissim. Sed semper tempus erat, a tincidunt turpis mollis nec. Donec ut purus lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin ac risus suscipit, malesuada urna id, dictum augue. Curabitur interdum porttitor sollicitudin. Vivamus ultrices convallis arcu, in rutrum sapien ullamcorper in.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"margin-bottom: 15px;\"><a href=\"http://kautube.com\" style=\"margin-bottom: 15px;\">Suspendisse finibus ipsum eget enim malesuada</a></span></font>, auctor imperdiet tellus convallis. Nulla sit amet metus felis. Morbi auctor a nisl eget facilisis. Sed ut purus id sapien iaculis eleifend. Nullam eu sem ligula. Ut ultricies augue non lacus suscipit pellentesque. Sed neque nisi, finibus sed auctor id, gravida vel dolor. Maecenas porttitor, elit ac vehicula dictum, nisi felis suscipit nisi, eu dapibus sapien elit vel est. Duis ac sem convallis, faucibus ligula in, condimentum augue. Sed facilisis pharetra porta. Nulla ornare metus dignissim, convallis odio eu, egestas nibh.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In sed fringilla arcu. Sed arcu lorem, semper eget magna ornare, egestas pulvinar nisi. Nullam placerat odio nulla, et lobortis justo elementum in. Cras efficitur tortor a convallis iaculis. Curabitur sollicitudin egestas elementum. Duis bibendum libero ac magna consectetur iaculis. Morbi scelerisque vestibulum suscipit. Vivamus ut posuere risus, et pulvinar metus. Ut tincidunt facilisis massa vitae vulputate. Donec at diam eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum pharetra sollicitudin varius. In commodo lectus lacus, eget interdum neque porta in. Pellentesque dictum enim eu nulla dapibus, nec volutpat ex ornare. Ut consectetur convallis convallis.</p>', 'In sed fringilla arcu sed arcu lorem', '', 'publish', 'open', 'open', '', 'In-sed-fringilla-arcu-sed-arcu-lorem', '', '', '2018-03-18 06:57:20', '2018-03-18 06:57:20', '', 0, '', 0, 'post', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `termmeta`
--

CREATE TABLE `termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Business', 'business', 0),
(6, 'Technology', 'technology', 0),
(7, 'Programming', 'programming', 0),
(8, 'Lifestyle', 'lifestyle', 0),
(9, 'Foods', 'foods', 0),
(10, 'Lorem ipsum', 'lorem-ipsum', 0),
(11, 'Business', 'business', 0),
(12, 'Techno', 'techno', 0),
(13, 'Come', 'come', 0),
(14, 'Business', 'business', 0),
(15, 'Lorem ipsum', 'lorem-ipsum', 0),
(16, 'Business', 'business', 0),
(17, 'Come', 'come', 0),
(21, 'Programming', 'programming', 0),
(22, 'Business', 'business', 0),
(23, 'Business', 'business', 0),
(24, 'Lorem ipsum', 'lorem-ipsum', 0),
(25, 'Programming', 'programming', 0),
(26, 'Programming', 'programming', 0),
(27, 'Lorem ipsum', 'lorem-ipsum', 0),
(28, 'Life', 'life', 0),
(29, 'Style', 'style', 0),
(30, 'Life', 'life', 0),
(31, 'Style', 'style', 0),
(32, 'Life', 'life', 0),
(33, 'Style', 'style', 0),
(34, 'Life', 'life', 0),
(35, 'Style', 'style', 0),
(36, 'Life', 'life', 0),
(37, 'Style', 'style', 0),
(38, 'Life', 'life', 0),
(39, 'Style', 'style', 0),
(40, 'Life', 'life', 0),
(41, 'Style', 'style', 0),
(42, 'Rice', 'rice', 0),
(43, 'Food', 'food', 0),
(44, 'Rice', 'rice', 0),
(45, 'Food', 'food', 0),
(46, 'Rice', 'rice', 0),
(47, 'Food', 'food', 0),
(48, 'Rice', 'rice', 0),
(49, 'Rice', 'rice', 0);

-- --------------------------------------------------------

--
-- Table structure for table `term_relationships`
--

CREATE TABLE `term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_relationships`
--

INSERT INTO `term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(1, 10, 0),
(1, 11, 0),
(2, 6, 0),
(2, 12, 0),
(2, 13, 0),
(3, 2, 0),
(3, 14, 0),
(3, 15, 0),
(4, 2, 0),
(4, 16, 0),
(4, 17, 0),
(5, 7, 0),
(5, 23, 0),
(5, 24, 0),
(5, 25, 0),
(6, 7, 0),
(6, 21, 0),
(6, 22, 0),
(7, 7, 0),
(7, 26, 0),
(7, 27, 0),
(8, 8, 0),
(8, 28, 0),
(8, 29, 0),
(9, 8, 0),
(9, 30, 0),
(9, 31, 0),
(10, 8, 0),
(10, 32, 0),
(10, 33, 0),
(11, 8, 0),
(11, 34, 0),
(11, 35, 0),
(12, 8, 0),
(12, 36, 0),
(12, 37, 0),
(13, 8, 0),
(13, 38, 0),
(13, 39, 0),
(14, 8, 0),
(14, 40, 0),
(14, 41, 0),
(15, 9, 0),
(15, 42, 0),
(15, 43, 0),
(16, 9, 0),
(16, 44, 0),
(16, 45, 0),
(17, 9, 0),
(17, 46, 0),
(17, 47, 0),
(18, 9, 0),
(18, 48, 0),
(19, 9, 0),
(19, 49, 0);

-- --------------------------------------------------------

--
-- Table structure for table `term_taxonomy`
--

CREATE TABLE `term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_taxonomy`
--

INSERT INTO `term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'category', '', 0, 0),
(6, 6, 'category', '', 0, 0),
(7, 7, 'category', '', 0, 0),
(8, 8, 'category', '', 0, 0),
(9, 9, 'category', '', 0, 0),
(10, 10, 'post_tag', '', 0, 0),
(11, 11, 'post_tag', '', 0, 0),
(12, 12, 'post_tag', '', 0, 0),
(13, 13, 'post_tag', '', 0, 0),
(14, 14, 'post_tag', '', 0, 0),
(15, 15, 'post_tag', '', 0, 0),
(16, 16, 'post_tag', '', 0, 0),
(17, 17, 'post_tag', '', 0, 0),
(21, 21, 'post_tag', '', 0, 0),
(22, 22, 'post_tag', '', 0, 0),
(23, 23, 'post_tag', '', 0, 0),
(24, 24, 'post_tag', '', 0, 0),
(25, 25, 'post_tag', '', 0, 0),
(26, 26, 'post_tag', '', 0, 0),
(27, 27, 'post_tag', '', 0, 0),
(28, 28, 'post_tag', '', 0, 0),
(29, 29, 'post_tag', '', 0, 0),
(30, 30, 'post_tag', '', 0, 0),
(31, 31, 'post_tag', '', 0, 0),
(32, 32, 'post_tag', '', 0, 0),
(33, 33, 'post_tag', '', 0, 0),
(34, 34, 'post_tag', '', 0, 0),
(35, 35, 'post_tag', '', 0, 0),
(36, 36, 'post_tag', '', 0, 0),
(37, 37, 'post_tag', '', 0, 0),
(38, 38, 'post_tag', '', 0, 0),
(39, 39, 'post_tag', '', 0, 0),
(40, 40, 'post_tag', '', 0, 0),
(41, 41, 'post_tag', '', 0, 0),
(42, 42, 'post_tag', '', 0, 0),
(43, 43, 'post_tag', '', 0, 0),
(44, 44, 'post_tag', '', 0, 0),
(45, 45, 'post_tag', '', 0, 0),
(46, 46, 'post_tag', '', 0, 0),
(47, 47, 'post_tag', '', 0, 0),
(48, 48, 'post_tag', '', 0, 0),
(49, 49, 'post_tag', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', 'saya'),
(3, 1, 'last_name', 'dia'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'false'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'document,settings,theme_editor_notice'),
(15, 1, 'show_welcome_panel', '1'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '104'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:2:\"::\";}'),
(19, 1, 'wp_user-settings', 'editor=html&libraryContent=browse&cats=pop'),
(20, 1, 'wp_user-settings-time', '1520145646'),
(22, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(23, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}'),
(25, 1, 'nav_menu_recently_edited', '18'),
(27, 1, '_edd_user_address', 'a:0:{}'),
(28, 1, 'session_tokens', 'a:4:{s:64:\"97d007d4ca00d3ed1cc19fbc5f5a72770d920e9c796090b2cf883bf41c7a6a92\";a:4:{s:10:\"expiration\";i:1520473258;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:132:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.168 Safari/537.36 OPR/51.0.2830.40\";s:5:\"login\";i:1520300458;}s:64:\"fb165293e9b121e40e9e01ebae23bf973544b41861fe415370f9d4cc674cfab9\";a:4:{s:10:\"expiration\";i:1520488497;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:132:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.168 Safari/537.36 OPR/51.0.2830.40\";s:5:\"login\";i:1520315697;}s:64:\"434812c369a021610ee284284a8a4be5f79eb3b502a1f451d4d1b0825b5e8fae\";a:4:{s:10:\"expiration\";i:1520515074;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:132:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.168 Safari/537.36 OPR/51.0.2830.40\";s:5:\"login\";i:1520342274;}s:64:\"a7d08133c2c48fa1c170d3925ab40cb119c79ebad1a2d627b0ccf6e7aa971527\";a:4:{s:10:\"expiration\";i:1520557192;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:132:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.168 Safari/537.36 OPR/51.0.2830.40\";s:5:\"login\";i:1520384392;}}'),
(29, 1, 'wp_media_library_mode', 'list');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'tedirghazali', '5b3cdd7dafc8dca65b3cd633241b2646', 'tedirghazali', 'tedirghazali@localhost', 'http://kautube.com', '2018-03-15 07:24:36', '', 0, 'tedirghazali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentmeta`
--
ALTER TABLE `commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `postmeta`
--
ALTER TABLE `postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `termmeta`
--
ALTER TABLE `termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `name` (`name`(191),`slug`(191));

--
-- Indexes for table `term_relationships`
--
ALTER TABLE `term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `term_taxonomy`
--
ALTER TABLE `term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD KEY `term_id` (`term_id`,`taxonomy`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentmeta`
--
ALTER TABLE `commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postmeta`
--
ALTER TABLE `postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `termmeta`
--
ALTER TABLE `termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `term_taxonomy`
--
ALTER TABLE `term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
