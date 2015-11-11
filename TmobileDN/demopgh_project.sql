-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2014 at 08:25 AM
-- Server version: 5.5.31
-- PHP Version: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demopgh_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `content` text,
  `small` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `lang_id`, `content`, `small`) VALUES
(1, 1, '&lt;p&gt;\r\n	Ok&lt;/p&gt;\r\n', ''),
(1, 2, '&lt;p&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/data/images/logo%20hoiangift%20new.gif&quot; style=&quot;width: 150px; height: 76px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;span style=&quot;color: rgb(255, 140, 0);&quot;&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;Chúng tôi có những bộ sưu tập mẫu độc đáo để đáp ứng mọi yêu cầu trang trí của Quý Vị. các sản phẩm của chúng tôi không đụng hàng…với phương châm là Uy Tín, Chất Lượng đặt lên hàng đầu. Nên được số đông khách hàng tín nhiệm &amp;amp; đánh giá cao.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;br style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; background-color: rgb(193, 148, 196);&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(255, 140, 0);&quot;&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: bold;&quot;&gt;Hội An Gift Shop&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt; với đội ngũ thợ tay nghề cao, năng động và có nhiều kinh nghiệm trong thiết kế nghệ thuật tạo hình, nên cho ra nhiều sản phẩm cao cấp phù hợp với thị hiếu khách hàng luôn đòi hỏi cao về tính nghệ thuật &lt;/span&gt;&lt;br style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; background-color: rgb(193, 148, 196);&quot; /&gt;\r\n	&lt;br style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; background-color: rgb(193, 148, 196);&quot; /&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;Đáp ứng nhu cầu thị trường cũng như ứng dụng công nghệ thông tin vào sản xuất kinh doanh nên hiện tại công ty đã cho ra đời website bán hàng trực tuyến trên mạng với địa chỉ &lt;/span&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: bold;&quot;&gt;www.hoiangiftshop.com&lt;/span&gt; &lt;/span&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;nhằm chủ động hơn trong việc tư vấn cho khách hàng được đầy đủ hơn về thông tin sản phẩm, giá cả cũng như chất lượng để sao cho đạt được mục tiêu cuối cùng là sản phẩm ưng ý nhưng giá cả thì phải chăng. &lt;/span&gt;&lt;br style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; background-color: rgb(193, 148, 196);&quot; /&gt;\r\n	&lt;br style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; background-color: rgb(193, 148, 196);&quot; /&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;Không những đã khẳng định được thương hiệu ở trong nước mà hiện tại sản phẩm của &lt;/span&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;&lt;span style=&quot;font-weight: bold;&quot;&gt;Hoi An Gift shop &lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif;&quot;&gt;đã được đón nhận ở ngoài nước… Đặc biệt là những Việt kiều đã sinh sống và làm việc ở nước ngoài nhưng muốn dùng những sản phầm nghệ thuật thủ công độc đáo từ quê hương,dù là một phần nhỏ nhưng vẫn mang được một nét riêng trong từng căn hộ để mỗi không gian là nơi thư giãn lý tưởng sau một ngày làm việc đầy mệt mỏi&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `cot` tinyint(1) NOT NULL DEFAULT '0',
  `images` varchar(254) DEFAULT NULL,
  `images_main` varchar(254) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `parent_id`, `ordering`, `cot`, `images`, `images_main`, `published`) VALUES
(1, 0, 0, 1, 'duong-da-menu1.png', 'duong-da-main1.png', 1),
(2, 0, 1, 1, 'duong-the-menu.png', 'duong-the-main.png', 1),
(38, 0, 4, 1, NULL, NULL, 1),
(37, 0, 3, 1, NULL, NULL, 1),
(17, 0, 2, 1, 'trang-diem-menu.png', 'trang-diem-main.png', 1),
(51, 17, 3, 1, NULL, NULL, 1),
(52, 17, 1, 1, NULL, NULL, 1),
(53, 17, 2, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `cat_order` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `parent_id`, `cat_order`, `published`) VALUES
(1, 0, 0, 1),
(2, 0, 1, 1),
(3, 0, 2, 1),
(85, 0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_des`
--

CREATE TABLE IF NOT EXISTS `category_des` (
  `cat_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `cat_name` varchar(254) DEFAULT NULL,
  `cat_slug` varchar(254) DEFAULT NULL,
  `cat_des` varchar(254) DEFAULT NULL,
  `cat_keyword` varchar(254) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_des`
--

INSERT INTO `category_des` (`cat_id`, `lang_id`, `cat_name`, `cat_slug`, `cat_des`, `cat_keyword`) VALUES
(1, 1, 'Khuyến mãi', 'khuyen-mai', '', ''),
(3, 2, 'Purchase Support', 'purchase-support', '', ''),
(3, 1, 'Hỗ trợ mua hàng', 'ho-tro-mua-hang', '', ''),
(2, 2, 'Service', 'service', '', ''),
(2, 1, 'Dịch vụ', 'dich-vu', '', ''),
(85, 1, 'Bảng Giá', 'bang-gia', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cat_des`
--

CREATE TABLE IF NOT EXISTS `cat_des` (
  `cat_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `name` varchar(254) DEFAULT NULL,
  `slug` varchar(254) DEFAULT NULL,
  `keyword` varchar(254) DEFAULT NULL,
  `des` varchar(254) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_des`
--

INSERT INTO `cat_des` (`cat_id`, `lang_id`, `name`, `slug`, `keyword`, `des`) VALUES
(17, 1, 'Phụ kiện', 'phu-kien', '', ''),
(51, 1, 'Dock Sạc', 'dock-sac', '', ''),
(2, 1, 'Linh kiện', 'linh-kien', '', ''),
(52, 1, 'Bao da', 'bao-da', '', ''),
(53, 1, 'Ốp lưng', 'op-lung', '', ''),
(37, 1, 'Tặng phẩm', 'tang-pham', '', ''),
(38, 1, 'Hàng khuyến mãi', 'hang-khuyen-mai', '', ''),
(1, 1, 'BlackBerry', 'blackberry', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `city_name` varchar(254) DEFAULT NULL,
  `city_url` varchar(254) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `site` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: site, 1: hệ thống',
  `rate` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=785 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `parentid`, `city_name`, `city_url`, `ordering`, `site`, `rate`, `published`) VALUES
(25, 0, 'Hồ Chí Minh', 'tp-ho-chi-minh', 0, 1, 0, 1),
(26, 0, 'Hà Nội', 'tp-ha-noi', 0, 1, 0, 1),
(27, 25, 'Quận 1', 'quan-1', 1, 0, 0, 1),
(28, 25, 'Quận 2', 'quan-2', 2, 0, 0, 1),
(29, 25, 'Quận 3', 'quan-3', 3, 0, 0, 1),
(30, 25, 'Quận 4', 'quan-4', 4, 0, 0, 1),
(31, 25, 'Quận 5', 'quan-5', 5, 0, 0, 1),
(32, 25, 'Quận 6', 'quan-6', 6, 0, 0, 1),
(33, 25, 'Quận 7', 'quan-7', 7, 0, 0, 1),
(34, 25, 'Quận 8', 'quan-8', 8, 0, 0, 1),
(35, 25, 'Quận 9', 'quan-9', 9, 0, 0, 1),
(36, 25, 'Quận 10', 'quan-10', 10, 0, 0, 1),
(37, 25, 'Quận 11', 'quan-11', 11, 0, 0, 1),
(38, 25, 'Quận 12', 'quan-12', 12, 0, 0, 1),
(39, 25, 'Quận Bình Thạnh', 'quan-binh-thanh', 13, 0, 0, 1),
(40, 25, 'Quận Bình Tân', 'quan-binh-tan', 14, 0, 0, 1),
(41, 25, 'Quận Gò Vấp', 'quan-go-vap', 15, 0, 0, 1),
(42, 25, 'Quận Phú Nhuận', 'quan-phu-nhuan', 16, 0, 0, 1),
(43, 25, 'Quận Thủ Đức', 'quan-thu-duc', 17, 0, 0, 1),
(44, 25, 'Quận Tân Bình', 'quan-tan-binh', 18, 0, 0, 1),
(45, 25, 'Quận Tân Phú', 'quan-tan-phu', 19, 0, 0, 1),
(46, 25, 'Huyện Bình Chánh', 'huyen-binh-chanh', 20, 0, 0, 1),
(47, 25, 'Huyện Cần Giờ', 'huyen-can-gio', 21, 0, 0, 1),
(48, 25, 'Huyện Củ Chi', 'huyen-cu-chi', 22, 0, 0, 1),
(49, 25, 'Huyện Hóc Môn', 'huyen-hoc-mon', 23, 0, 0, 1),
(50, 25, 'Huyện Nhà Bè', 'huyen-nha-be', 24, 0, 0, 1),
(51, 26, 'Huyện Ba Vì', 'huyen-ba-vi', 1, 0, 0, 1),
(52, 26, 'Huyện Chương Mỹ', 'huyen-chuong-my', 2, 0, 0, 1),
(53, 26, 'Huyện Gia Lâm', 'huyen-gia-lam', 3, 0, 0, 1),
(54, 26, 'Huyện Hoài Đức', 'huyen-hoai-duc', 4, 0, 0, 1),
(55, 26, 'Huyện Mê Linh', 'huyen-me-linh', 5, 0, 0, 1),
(56, 26, 'Huyễn Mỹ Đức', 'huyen-my-duc', 6, 0, 0, 1),
(57, 26, 'Huyện Phú Xuyên', 'huyen-phu-xuyen', 7, 0, 0, 1),
(58, 26, 'Huyện Phú Thọ', 'huyen-phu-tho', 8, 0, 0, 1),
(59, 26, 'Huyện Quốc Oai', 'huyen-quoc-oai', 9, 0, 0, 1),
(60, 26, 'Huyện Sóc Sơn', 'huyen-soc-son', 10, 0, 0, 1),
(61, 26, 'Huyện Thanh Oai', 'huyen-thanh-oai', 11, 0, 0, 1),
(62, 26, 'Huyện Thanh Trì', 'huyen-thanh-tri', 12, 0, 0, 1),
(63, 26, 'Huyện Thường Tín', 'huyen-thuong-tin', 13, 0, 0, 1),
(64, 26, 'Huyện Thạch Thất', 'huyen-thach-that', 14, 0, 0, 1),
(65, 26, 'Huyện Từ Liêm', 'huyen-tu-liem', 15, 0, 0, 1),
(66, 26, 'Huyện Đan Phượng', 'huyen-dan-phuong', 16, 0, 0, 1),
(67, 26, 'Huyện Đông Anh', 'huyen-dong-anh', 17, 0, 0, 1),
(68, 26, 'Huyện Ứng Hòa', 'huyen-ung-hoa', 18, 0, 0, 1),
(69, 26, 'Quận Ba Đình', 'quan-ba-dinh', 19, 0, 0, 1),
(70, 26, 'Quận Cầu Giấy', 'quan-cau-giay', 20, 0, 0, 1),
(71, 26, 'Quận Hai Bà Trưng', 'quan-hai-ba-trung', 21, 0, 0, 1),
(72, 26, 'Quận Hà Đông', 'quan-ha-dong', 22, 0, 0, 1),
(73, 26, 'Quận Hoàng Kiếm', 'quan-hoang-kiem', 23, 0, 0, 1),
(74, 26, 'Quận Hoàng Mai', 'quan-hoang-mai', 24, 0, 0, 1),
(75, 26, 'Quận Long Biên', 'quan-long-bien', 25, 0, 0, 1),
(76, 26, 'Quận Thanh Xuân', 'quan-thanh-xuan', 26, 0, 0, 1),
(77, 26, 'Quận Tây Hồ', 'quan-tay-ho', 27, 0, 0, 1),
(78, 26, 'Quận Đống Đa', 'quan-dong-da', 28, 0, 0, 1),
(79, 26, 'Thị Xã Sơn Tây', 'thi-xa-son-tay', 29, 0, 0, 1),
(80, 0, 'An Giang', 'an-giang', 0, 0, 0, 1),
(81, 0, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 0, 0, 0, 1),
(82, 0, 'Bình Dương', 'binh-duong', 0, 0, 0, 1),
(83, 0, 'Bình Phước', 'binh-phuoc', 0, 0, 0, 1),
(84, 0, 'Bình Thuận', 'binh-thuan', 0, 0, 0, 1),
(85, 80, 'Huyện An Phú', 'huyen-an-phu', 1, 0, 0, 1),
(86, 80, 'Huyện Châu Phú', 'huyen-chau-phu', 2, 0, 0, 1),
(87, 80, 'Huyện Châu Thành', 'huyen-chau-thanh', 3, 0, 0, 1),
(88, 80, 'Huyện Chợ Mới', 'huyen-cho-moi', 4, 0, 0, 1),
(89, 80, 'Huyện Phú Tân', 'huyen-phu-tan', 5, 0, 0, 1),
(90, 80, 'Huyện Thoại Sơn', 'huyen-thoai-son', 6, 0, 0, 1),
(91, 80, 'Huyện Tịnh Biên', 'huyen-tinh-bien', 7, 0, 0, 1),
(92, 80, 'Huyện Tri Tôn', 'huyen-tri-ton', 8, 0, 0, 1),
(93, 80, 'Thành phố Long Xuyên', 'thanh-pho-long-xuyen', 9, 0, 0, 1),
(94, 80, 'Thị xã Châu Đốc', 'thi-xa-chau-doc', 10, 0, 0, 1),
(95, 80, 'Thị xã Tân Châu', 'thi-xa-tan-chau', 11, 0, 0, 1),
(96, 81, 'Huyện Châu Đức', 'huyen-chau-duc', 1, 0, 0, 1),
(97, 81, 'Huyện Côn Đảo', 'huyen-con-dao', 0, 0, 0, 1),
(98, 81, 'Huyện Đất Đỏ', 'huyen-dat-do', 0, 0, 0, 1),
(99, 81, 'Huyện Long Điền', 'huyen-long-dien', 0, 0, 0, 1),
(100, 81, 'Huyện Tân Thành', 'huyen-tan-thanh', 0, 0, 0, 1),
(101, 81, 'Huyện Xuyên Mộc', 'huyen-xuyen-moc', 0, 0, 0, 1),
(102, 81, 'Thành phố Vũng Tàu', 'thanh-pho-vung-tau', 0, 0, 0, 1),
(103, 81, 'Thị xã Bà Rịa', 'thi-xa-ba-ria', 0, 0, 0, 1),
(104, 0, 'Bắc Giang', 'bac-giang', 0, 0, 0, 1),
(105, 104, 'Huyện Hiệp Hòa', 'huyen-hiep-hoa', 0, 0, 0, 1),
(106, 104, 'Huyện Lạng Giang', 'huyen-lang-giang', 0, 0, 0, 1),
(107, 104, 'Huyện Lục Nam', 'huyen-luc-nam', 0, 0, 0, 1),
(108, 104, 'Huyện Lục Ngạn', 'huyen-luc-ngan', 0, 0, 0, 1),
(109, 104, 'Huyện Sơn Động', 'huyen-son-dong', 0, 0, 0, 1),
(110, 104, 'Huyện Tân Yên', 'huyen-tan-yen', 0, 0, 0, 1),
(111, 104, 'Huyện Việt Yên', 'huyen-viet-yen', 0, 0, 0, 1),
(112, 104, 'Huyện Yên Dũng', 'huyen-yen-dung', 0, 0, 0, 1),
(113, 104, 'Huyện Yên Thế', 'huyen-yen-the', 0, 0, 0, 1),
(114, 104, 'Thành phố Bắc Giang', 'thanh-pho-bac-giang', 0, 0, 0, 1),
(115, 0, 'Bắc Kạn', 'bac-kan', 0, 0, 0, 1),
(116, 115, 'Huyện Ba Bể', 'huyen-ba-be', 0, 0, 0, 1),
(117, 115, 'Huyện Bạch Thông', 'huyen-bach-thong', 0, 0, 0, 1),
(118, 115, 'Huyện Chợ Đồn', 'huyen-cho-don', 0, 0, 0, 1),
(119, 115, 'Huyện Chợ Mới', 'huyen-cho-moi', 0, 0, 0, 1),
(120, 115, 'Huyện Na Rì', 'huyen-na-ri', 0, 0, 0, 1),
(121, 115, 'Huyện Ngân Sơn', 'huyen-ngan-son', 0, 0, 0, 1),
(122, 115, 'Huyện Pác Nặm', 'huyen-pac-nam', 0, 0, 0, 1),
(123, 115, 'Thị xã Bắc Kạn', 'thi-xa-bac-kan', 0, 0, 0, 1),
(124, 0, 'Bạc Liêu', 'bac-lieu', 0, 0, 0, 1),
(125, 0, 'Bắc Ninh', 'bac-ninh', 0, 0, 0, 1),
(126, 0, 'Bến Tre', 'ben-tre', 0, 0, 0, 1),
(127, 0, 'Bình Định', 'binh-dinh', 0, 0, 0, 1),
(128, 124, 'Huyện Đông Hải', 'huyen-dong-hai', 0, 0, 0, 1),
(129, 124, 'Huyện Giá Rai', 'huyen-gia-rai', 0, 0, 0, 1),
(130, 124, 'Huyện Hòa Bình', 'huyen-hoa-binh', 0, 0, 0, 1),
(131, 124, 'Huyện Hồng Dân', 'huyen-hong-dan', 0, 0, 0, 1),
(132, 124, 'Huyện Phước Long', 'huyen-phuoc-long', 0, 0, 0, 1),
(133, 124, 'Huyện Vĩnh Lợi', 'huyen-vinh-loi', 0, 0, 0, 1),
(134, 124, 'Thành Phố Bạc Liêu', 'thanh-pho-bac-lieu', 0, 0, 0, 1),
(135, 125, 'Huyện Gia Bình', 'huyen-gia-binh', 0, 0, 0, 1),
(136, 125, 'Huyện Lương Tài', 'huyen-luong-tai', 0, 0, 0, 1),
(137, 125, 'Huyện Quế Võ', 'huyen-que-vo', 0, 0, 0, 1),
(138, 125, 'Huyện Thuận Thành', 'huyen-thuan-thanh', 0, 0, 0, 1),
(139, 125, 'Huyện Tiên Du', 'huyen-tien-du', 0, 0, 0, 1),
(140, 125, 'Huyện Yên Phong', 'huyen-yen-phong', 0, 0, 0, 1),
(141, 125, 'Thành phố Bắc Ninh', 'thanh-pho-bac-ninh', 0, 0, 0, 1),
(142, 125, 'Thị xã Từ Sơn', 'thi-xa-tu-son', 0, 0, 0, 1),
(143, 126, 'Huyện Ba Tri', 'huyen-ba-tri', 0, 0, 0, 1),
(144, 126, 'Huyện Bình Đại', 'huyen-binh-dai', 0, 0, 0, 1),
(145, 126, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(146, 126, 'Huyện Chợ Lách', 'huyen-cho-lach', 0, 0, 0, 1),
(147, 126, 'Huyện Giồng Trôm', 'huyen-giong-trom', 0, 0, 0, 1),
(148, 126, 'Huyện Mỏ Cày Bắc', 'huyen-mo-cay-bac', 0, 0, 0, 1),
(149, 126, 'Huyện Mỏ Cày Nam', 'huyen-mo-cay-nam', 0, 0, 0, 1),
(150, 126, 'Huyện Thạnh Phú', 'huyen-thanh-phu', 0, 0, 0, 1),
(151, 126, 'Thành phố Bến Tre', 'thanh-pho-ben-tre', 0, 0, 0, 1),
(152, 127, 'Huyện An Lão', 'huyen-an-lao', 0, 0, 0, 1),
(153, 127, 'Huyện An Nhơn', 'huyen-an-nhon', 0, 0, 0, 1),
(154, 127, 'Huyện Hoài Ân', 'huyen-hoai-an', 0, 0, 0, 1),
(155, 127, 'Huyện Hoài Nhơn', 'huyen-hoai-nhon', 0, 0, 0, 1),
(156, 127, 'Huyện Phù Mỹ', 'huyen-phu-my', 0, 0, 0, 1),
(157, 127, 'Huyện Phù Cát', 'huyen-phu-cat', 0, 0, 0, 1),
(158, 127, 'Huyện Tây Sơn', 'huyen-tay-son', 0, 0, 0, 1),
(159, 127, 'Huyện Tuy Phước', 'huyen-tuy-phuoc', 0, 0, 0, 1),
(160, 127, 'Huyện Vân Canh', 'huyen-van-canh', 0, 0, 0, 1),
(161, 127, 'Huyện Vĩnh Thạnh', 'huyen-vinh-thanh', 0, 0, 0, 1),
(162, 127, 'Thành phố Quy Nhơn', 'thanh-pho-quy-nhon', 0, 0, 0, 1),
(163, 82, 'Huyện Bến Cát', 'huyen-ben-cat', 0, 0, 0, 0),
(164, 82, 'Huyện Dầu Tiếng', 'huyen-dau-tieng', 0, 0, 0, 0),
(165, 82, 'Huyện Dĩ An', 'huyen-di-an', 0, 0, 0, 0),
(166, 82, 'Huyện Phú Giáo', 'huyen-phu-giao', 0, 0, 0, 0),
(167, 82, 'Huyện Tân Uyên', 'huyen-tan-uyen', 0, 0, 0, 0),
(168, 82, 'Huyện Thuận An', 'huyen-thuan-an', 0, 0, 0, 0),
(169, 82, 'Thị xã Thủ Dầu Một', 'thi-xa-thu-dau-mot', 0, 0, 0, 0),
(170, 83, 'Huyện Bù Đăng', 'huyen-bu-dang', 0, 0, 0, 1),
(171, 83, 'Huyện Bù Đốp', 'huyen-bu-dop', 0, 0, 0, 1),
(172, 83, 'Huyện Bù Gia Mập', 'huyen-bu-gia-map', 0, 0, 0, 1),
(173, 83, 'Huyện Chơn Thành', 'huyen-chon-thanh', 0, 0, 0, 1),
(174, 83, 'Huyện Đồng Phú', 'huyen-dong-phu', 0, 0, 0, 1),
(175, 83, 'Huyện Hớn Quản', 'huyen-hon-quan', 0, 0, 0, 1),
(176, 83, 'Huyện Lộc Ninh', 'huyen-loc-ninh', 0, 0, 0, 1),
(177, 83, 'Thị xã Bình Long', 'thi-xa-binh-long', 0, 0, 0, 1),
(178, 83, 'Thị xã Đồng Xoài', 'thi-xa-dong-xoai', 0, 0, 0, 1),
(179, 83, 'Thị xã Phước Long', 'thi-xa-phuoc-long', 0, 0, 0, 1),
(180, 84, 'Huyện Đức Linh', 'huyen-duc-linh', 0, 0, 0, 1),
(181, 84, 'Huyện Bắc Bình', 'huyen-bac-binh', 0, 0, 0, 1),
(182, 84, 'Huyện Hàm Tân', 'huyen-ham-tan', 0, 0, 0, 1),
(183, 84, 'Huyện Hàm Thuận Bắc', 'huyen-ham-thuan-bac', 0, 0, 0, 1),
(184, 84, 'Huyện Hàm Thuận Nam', 'huyen-ham-thuan-nam', 0, 0, 0, 1),
(185, 84, 'Huyện Phú Qúi', 'huyen-phu-qui', 0, 0, 0, 1),
(186, 84, 'Huyện Tánh Linh', 'huyen-tanh-linh', 0, 0, 0, 1),
(187, 84, 'Huyện Tuy Phong', 'huyen-tuy-phong', 0, 0, 0, 1),
(188, 84, 'Thành phố Phan Thiết', 'thanh-pho-phan-thiet', 0, 0, 0, 1),
(189, 84, 'Thị xã La Gi', 'thi-xa-la-gi', 0, 0, 0, 1),
(190, 0, 'Cao Bằng', 'cao-bang', 0, 0, 0, 1),
(191, 0, 'Cà Mau', 'ca-mau', 0, 0, 0, 1),
(192, 0, 'Đắk Lắk', 'dak-lak', 0, 0, 0, 1),
(193, 0, 'Đắk Nông', 'dak-nong', 0, 0, 0, 1),
(194, 0, 'Điện Biên', 'dien-bien', 0, 0, 0, 1),
(195, 0, 'Đồng Nai', 'dong-nai', 0, 0, 0, 1),
(196, 0, 'Đồng Tháp', 'dong-thap', 0, 0, 0, 1),
(197, 0, 'Gia Lai', 'gia-lai', 0, 0, 0, 1),
(198, 0, 'Hà Giang', 'ha-giang', 0, 0, 0, 1),
(199, 0, 'Hà Nam', 'ha-nam', 0, 0, 0, 1),
(200, 0, 'Hà Tĩnh', 'ha-tinh', 0, 0, 0, 1),
(201, 0, 'Hải Dương', 'hai-duong', 0, 0, 0, 1),
(202, 0, 'Hậu Giang', 'hau-giang', 0, 0, 0, 1),
(203, 0, 'Hòa Bình', 'hoa-binh', 0, 0, 0, 1),
(204, 0, 'Hưng Yên', 'hung-yen', 0, 0, 0, 1),
(205, 0, 'Khánh Hòa', 'khanh-hoa', 0, 0, 0, 1),
(206, 0, 'Kiên Giang', 'kien-giang', 0, 0, 0, 1),
(207, 0, 'Kon Tum', 'kon-tum', 0, 0, 0, 1),
(208, 0, 'Lai Châu', 'lai-chau', 0, 0, 0, 1),
(209, 0, 'Lâm Đồng', 'lam-dong', 0, 0, 0, 1),
(210, 0, 'Lạng Sơn', 'lang-son', 0, 0, 0, 1),
(211, 0, 'Lào Cai', 'lao-cai', 0, 0, 0, 1),
(212, 0, 'Long An', 'long-an', 0, 0, 0, 1),
(213, 0, 'Nam Định', 'nam-dinh', 0, 0, 0, 1),
(214, 0, 'Nghệ An', 'nghe-an', 0, 0, 0, 1),
(215, 0, 'Ninh Bình', 'ninh-binh', 0, 0, 0, 1),
(216, 0, 'Ninh Thuận', 'ninh-thuan', 0, 0, 0, 1),
(217, 0, 'Phú Thọ', 'phu-tho', 0, 0, 0, 1),
(218, 0, 'Phú Yên', 'phu-yen', 0, 0, 0, 1),
(219, 0, 'Quảng Bình', 'quang-binh', 0, 0, 0, 1),
(220, 0, 'Quảng Nam', 'quang-nam', 0, 0, 0, 1),
(221, 0, 'Quảng Ngãi', 'quang-ngai', 0, 0, 0, 1),
(222, 0, 'Quảng Ninh', 'quang-ninh', 0, 0, 0, 1),
(223, 0, 'Quảng Trị', 'quang-tri', 0, 0, 0, 1),
(224, 0, 'Sóc Trăng', 'soc-trang', 0, 0, 0, 1),
(225, 0, 'Sơn La', 'son-la', 0, 0, 0, 1),
(226, 0, 'Tây Ninh', 'tay-ninh', 0, 0, 0, 1),
(227, 0, 'Thái Bình', 'thai-binh', 0, 0, 0, 1),
(228, 0, 'Thái Nguyên', 'thai-nguyen', 0, 0, 0, 1),
(229, 0, 'Thanh Hóa', 'thanh-hoa', 0, 0, 0, 1),
(230, 0, 'Thừa Thiên Huế', 'thua-thien-hue', 0, 0, 0, 1),
(231, 0, 'Tiền Giang', 'tien-giang', 0, 0, 0, 1),
(232, 0, 'Trà Vinh', 'tra-vinh', 0, 0, 0, 1),
(233, 0, 'Tuyên Quang', 'tuyen-quang', 0, 0, 0, 1),
(234, 0, 'Vĩnh Long', 'vinh-long', 0, 0, 0, 1),
(235, 0, 'Vĩnh Phúc', 'vinh-phuc', 0, 0, 0, 1),
(236, 0, 'Yên Bái', 'yen-bai', 0, 0, 0, 1),
(237, 0, 'Cần Thơ', 'tp-can-tho', 0, 0, 0, 1),
(1, 0, 'Đà Nẵng', 'tp-da-nang', 0, 0, 0, 1),
(239, 0, 'Hải Phòng', 'hai-phong', 0, 0, 0, 1),
(240, 191, 'Huyện Cái Nước', 'huyen-cai-nuoc', 0, 0, 0, 1),
(241, 191, 'Huyện Đầm Dơi', 'huyen-dam-doi', 0, 0, 0, 1),
(242, 191, 'Huyện Năm Căn', 'huyen-nam-can', 0, 0, 0, 1),
(243, 191, 'Huyện Ngọc Hiển', 'huyen-ngoc-hien', 0, 0, 0, 1),
(244, 191, 'Huyện Phú Tân', 'huyen-phu-tan', 0, 0, 0, 1),
(245, 191, 'Huyện Thới Bình', 'huyen-thoi-binh', 0, 0, 0, 1),
(246, 191, 'Huyện Trần Văn Thời', 'huyen-tran-van-thoi', 0, 0, 0, 1),
(247, 191, 'Huyện U Minh', 'huyen-u-minh', 0, 0, 0, 1),
(248, 191, 'Thành phố Cà Mau', 'thanh-pho-ca-mau', 0, 0, 0, 1),
(249, 190, 'Huyện Bảo Lạc', 'huyen-bao-lac', 0, 0, 0, 1),
(250, 190, 'Huyện Bảo Lâm', 'huyen-bao-lam', 0, 0, 0, 1),
(251, 190, 'Huyện Hạ Lang', 'huyen-ha-lang', 0, 0, 0, 1),
(252, 190, 'Huyện Hà Quảng', 'huyen-ha-quang', 0, 0, 0, 1),
(253, 190, 'Huyện Hòa An', 'huyen-hoa-an', 0, 0, 0, 1),
(254, 190, 'Huyện Nguyên Bình', 'huyen-nguyen-binh', 0, 0, 0, 1),
(255, 190, 'Huyện Phục Hòa', 'huyen-phuc-hoa', 0, 0, 0, 1),
(256, 190, 'Huyện Quảng Uyên', 'huyen-quang-uyen', 0, 0, 0, 1),
(257, 190, 'Huyện Thạch An', 'huyen-thach-an', 0, 0, 0, 1),
(258, 190, 'Huyện Thông Nông', 'huyen-thong-nong', 0, 0, 0, 1),
(259, 190, 'Huyện Trà Lĩnh', 'huyen-tra-linh', 0, 0, 0, 1),
(260, 190, 'Huyện Trùng Khánh', 'huyen-trung-khanh', 0, 0, 0, 1),
(261, 190, 'Thị xã Cao Bằng', 'thi-xa-cao-bang', 0, 0, 0, 1),
(262, 192, 'Huyện Buôn Đôn', 'huyen-buon-don', 0, 0, 0, 1),
(263, 192, 'Huyện Cư Kuin', 'huyen-cu-kuin', 0, 0, 0, 1),
(264, 192, 'Huyện Cư MGar', 'huyen-cu-mgar', 0, 0, 0, 1),
(265, 192, 'Huyện Ea Kar', 'huyen-ea-kar', 0, 0, 0, 1),
(266, 192, 'Huyện Ea Súp', 'huyen-ea-sup', 0, 0, 0, 1),
(267, 192, 'Huyện EaHLeo', 'huyen-eahleo', 0, 0, 0, 1),
(268, 192, 'Huyện Krông Ana', 'huyen-krong-ana', 0, 0, 0, 1),
(269, 192, 'Huyện Krông Bông', 'huyen-krong-bong', 0, 0, 0, 1),
(270, 192, 'Huyện Krông Búk', 'huyen-krong-buk', 0, 0, 0, 1),
(271, 192, 'Huyện Krông Năng', 'huyen-krong-nang', 0, 0, 0, 1),
(272, 192, 'Huyện Krông Pắc', 'huyen-krong-pac', 0, 0, 0, 1),
(273, 192, 'Huyện Lắk', 'huyen-lak', 0, 0, 0, 1),
(274, 192, 'Huyện MDrắk', 'huyen-mdrak', 0, 0, 0, 1),
(275, 192, 'Thành phố Buôn Ma Thuột', 'thanh-pho-buon-ma-thuot', 0, 0, 0, 1),
(276, 192, 'Thị xã Buôn Hồ', 'thi-xa-buon-ho', 0, 0, 0, 1),
(277, 193, 'Huyện Cư Jút', 'huyen-cu-jut', 0, 0, 0, 1),
(278, 193, 'Huyện Đắk GLong', 'huyen-dak-glong', 0, 0, 0, 1),
(279, 193, 'Huyện Đắk Mil', 'huyen-dak-mil', 0, 0, 0, 1),
(280, 193, 'Huyện Đắk RLấp', 'huyen-dak-rlap', 0, 0, 0, 1),
(281, 193, 'Huyện Đắk Song', 'huyen-dak-song', 0, 0, 0, 1),
(282, 193, 'Huyện KRông Nô', 'huyen-krong-no', 0, 0, 0, 1),
(283, 193, 'Huyện Tuy Đức', 'huyen-tuy-duc', 0, 0, 0, 1),
(284, 193, 'Thị xã Gia Nghĩa', 'thi-xa-gia-nghia', 0, 0, 0, 1),
(285, 194, 'Huyện Điện Biên', 'huyen-dien-bien', 0, 0, 0, 1),
(286, 194, 'Huyện Điện Biên Đông', 'huyen-dien-bien-dong', 0, 0, 0, 1),
(287, 194, 'Huyện Mường Chà', 'huyen-muong-cha', 0, 0, 0, 1),
(288, 194, 'Huyện Mương Nhé', 'huyen-muong-nhe', 0, 0, 0, 1),
(289, 194, 'Huyện Mường ảng', 'huyen-muong-ang', 0, 0, 0, 1),
(290, 194, 'Huyện Tủa Chùa', 'huyen-tua-chua', 0, 0, 0, 1),
(291, 194, 'Huyện Tuần Giáo', 'huyen-tuan-giao', 0, 0, 0, 1),
(292, 194, 'Thành phố Điện Biên phủ', 'thanh-pho-dien-bien-phu', 0, 0, 0, 1),
(293, 194, 'Thị xã Mường Lay', 'thi-xa-muong-lay', 0, 0, 0, 1),
(294, 195, 'Huyện Cẩm Mỹ', 'huyen-cam-my', 0, 0, 0, 1),
(295, 195, 'Huyện Định Quán', 'huyen-dinh-quan', 0, 0, 0, 1),
(296, 195, 'Huyện Long Thành', 'huyen-long-thanh', 0, 0, 0, 1),
(297, 195, 'Huyện Nhơn Trạch', 'huyen-nhon-trach', 0, 0, 0, 1),
(298, 195, 'Huyện Tân Phú', 'huyen-tan-phu', 0, 0, 0, 1),
(299, 195, 'Huyện Thống Nhất', 'huyen-thong-nhat', 0, 0, 0, 1),
(300, 195, 'Huyện Trảng Bom', 'huyen-trang-bom', 0, 0, 0, 1),
(301, 195, 'Huyện Vĩnh Cửu', 'huyen-vinh-cuu', 0, 0, 0, 1),
(302, 195, 'Huyện Xuân Lộc', 'huyen-xuan-loc', 0, 0, 0, 1),
(303, 195, 'Thành phố Biên Hòa', 'thanh-pho-bien-hoa', 0, 0, 0, 1),
(304, 195, 'Thị xã Long Khánh', 'thi-xa-long-khanh', 0, 0, 0, 1),
(305, 196, 'Huyện Cao Lãnh', 'huyen-cao-lanh', 0, 0, 0, 1),
(306, 196, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(307, 196, 'Huyện Hồng Ngự', 'huyen-hong-ngu', 0, 0, 0, 1),
(308, 196, 'Huyện Lai Vung', 'huyen-lai-vung', 0, 0, 0, 1),
(309, 196, 'Huyện Lấp Vò', 'huyen-lap-vo', 0, 0, 0, 1),
(310, 196, 'Huyện Tam Nông', 'huyen-tam-nong', 0, 0, 0, 1),
(311, 196, 'Huyện Tân Hồng', 'huyen-tan-hong', 0, 0, 0, 1),
(312, 196, 'Huyện Thanh Bình', 'huyen-thanh-binh', 0, 0, 0, 1),
(313, 196, 'Huyện Tháp Mười', 'huyen-thap-muoi', 0, 0, 0, 1),
(314, 196, 'Thành phố Cao Lãnh', 'thanh-pho-cao-lanh', 0, 0, 0, 1),
(315, 196, 'Thị xã Hồng Ngự', 'thi-xa-hong-ngu', 0, 0, 0, 1),
(316, 196, 'Thị xã Sa Đéc', 'thi-xa-sa-dec', 0, 0, 0, 1),
(317, 197, 'Huyện Chư Păh', 'huyen-chu-pah', 0, 0, 0, 1),
(318, 197, 'Huyện Chư Pưh', 'huyen-chu-puh', 0, 0, 0, 1),
(319, 197, 'Huyện Chư Sê', 'huyen-chu-se', 0, 0, 0, 1),
(320, 197, 'Huyện ChưPRông', 'huyen-chuprong', 0, 0, 0, 1),
(321, 197, 'Huyện Đăk Đoa', 'huyen-dak-doa', 0, 0, 0, 1),
(322, 197, 'Huyện Đăk Pơ', 'huyen-dak-po', 0, 0, 0, 1),
(323, 197, 'Huyện Đức Cơ', 'huyen-duc-co', 0, 0, 0, 1),
(324, 197, 'Huyện Ia Grai', 'huyen-ia-grai', 0, 0, 0, 1),
(325, 197, 'Huyện KBang', 'huyen-kbang', 0, 0, 0, 1),
(326, 197, 'Huyện Ia Pa', 'huyen-ia-pa', 0, 0, 0, 1),
(327, 197, 'Huyện Kông Chro', 'huyen-kong-chro', 0, 0, 0, 1),
(328, 197, 'Huyện Krông Pa', 'huyen-krong-pa', 0, 0, 0, 1),
(329, 197, 'Huyện Mang Yang', 'huyen-mang-yang', 0, 0, 0, 1),
(330, 197, 'Huyện Phú Thiện', 'huyen-phu-thien', 0, 0, 0, 1),
(331, 197, 'Thành phố Plei Ku', 'thanh-pho-plei-ku', 0, 0, 0, 1),
(332, 197, 'Thị xã AYun Pa', 'thi-xa-ayun-pa', 0, 0, 0, 1),
(333, 197, 'Thị xã An Khê', 'thi-xa-an-khe', 0, 0, 0, 1),
(334, 198, 'Huyện Bắc Mê', 'huyen-bac-me', 0, 0, 0, 1),
(335, 198, 'Huyện Bắc Quang', 'huyen-bac-quang', 0, 0, 0, 1),
(336, 198, 'Huyện Đồng Văn', 'huyen-dong-van', 0, 0, 0, 1),
(337, 198, 'Huyện Hoàng Su Phì', 'huyen-hoang-su-phi', 0, 0, 0, 1),
(338, 198, 'Huyện Mèo Vạc', 'huyen-meo-vac', 0, 0, 0, 1),
(339, 198, 'Huyện Quản Bạ', 'huyen-quan-ba', 0, 0, 0, 1),
(340, 198, 'Huyện Quang Bình', 'huyen-quang-binh', 0, 0, 0, 1),
(341, 198, 'Huyện Vị Xuyên', 'huyen-vi-xuyen', 0, 0, 0, 1),
(342, 198, 'Huyện Xín Mần', 'huyen-xin-man', 0, 0, 0, 1),
(343, 198, 'Huyện Yên Minh', 'huyen-yen-minh', 0, 0, 0, 1),
(344, 198, 'Thành Phố Hà Giang', 'thanh-pho-ha-giang', 0, 0, 0, 1),
(345, 199, 'Huyện Bình Lục', 'huyen-binh-luc', 0, 0, 0, 1),
(346, 199, 'Huyện Duy Tiên', 'huyen-duy-tien', 0, 0, 0, 1),
(347, 199, 'Huyện Kim Bảng', 'huyen-kim-bang', 0, 0, 0, 1),
(348, 199, 'Huyện Lý Nhân', 'huyen-ly-nhan', 0, 0, 0, 1),
(349, 199, 'Huyện Thanh Liêm', 'huyen-thanh-liem', 0, 0, 0, 1),
(350, 199, 'Thành phố Phủ Lý', 'thanh-pho-phu-ly', 0, 0, 0, 1),
(351, 200, 'Huyện Cẩm Xuyên', 'huyen-cam-xuyen', 0, 0, 0, 1),
(352, 200, 'Huyện Can Lộc', 'huyen-can-loc', 0, 0, 0, 1),
(353, 200, 'Huyện Đức Thọ', 'huyen-duc-tho', 0, 0, 0, 1),
(354, 200, 'Huyện Hương Khê', 'huyen-huong-khe', 0, 0, 0, 1),
(355, 200, 'Huyện Hương Sơn', 'huyen-huong-son', 0, 0, 0, 1),
(356, 200, 'Huyện Kỳ Anh', 'huyen-ky-anh', 0, 0, 0, 1),
(357, 200, 'Huyện Lộc Hà', 'huyen-loc-ha', 0, 0, 0, 1),
(358, 200, 'Huyện Nghi Xuân', 'huyen-nghi-xuan', 0, 0, 0, 1),
(359, 200, 'Huyện Thạch Hà', 'huyen-thach-ha', 0, 0, 0, 1),
(360, 200, 'Huyện Vũ Quang', 'huyen-vu-quang', 0, 0, 0, 1),
(361, 200, 'Thành phố Hà Tĩnh', 'thanh-pho-ha-tinh', 0, 0, 0, 1),
(362, 200, 'Thị xã Hồng Lĩnh', 'thi-xa-hong-linh', 0, 0, 0, 1),
(363, 201, 'Huyện Bình Giang', 'huyen-binh-giang', 0, 0, 0, 1),
(364, 201, 'Huyện Cẩm Giàng', 'huyen-cam-giang', 0, 0, 0, 1),
(365, 201, 'Huyện Gia Lộc', 'huyen-gia-loc', 0, 0, 0, 1),
(366, 201, 'Huyện Kim Thành', 'huyen-kim-thanh', 0, 0, 0, 1),
(367, 201, 'Huyện Kinh Môn', 'huyen-kinh-mon', 0, 0, 0, 1),
(368, 201, 'Huyện Nam Sách', 'huyen-nam-sach', 0, 0, 0, 1),
(369, 201, 'Huyện Ninh Giang', 'huyen-ninh-giang', 0, 0, 0, 1),
(370, 201, 'Huyện Thanh Hà', 'huyen-thanh-ha', 0, 0, 0, 1),
(371, 201, 'Huyện Thanh Miện', 'huyen-thanh-mien', 0, 0, 0, 1),
(372, 201, 'Huyện Tứ Kỳ', 'huyen-tu-ky', 0, 0, 0, 1),
(373, 201, 'Thành phố Hải Dương', 'thanh-pho-hai-duong', 0, 0, 0, 1),
(374, 201, 'Thị xã Chí Linh', 'thi-xa-chi-linh', 0, 0, 0, 1),
(375, 203, 'Huyện Cao Phong', 'huyen-cao-phong', 0, 0, 0, 1),
(376, 203, 'Huyện Đà Bắc', 'huyen-da-bac', 0, 0, 0, 1),
(377, 203, 'Huyện Kim Bôi', 'huyen-kim-boi', 0, 0, 0, 1),
(378, 203, 'Huyện Kỳ Sơn', 'huyen-ky-son', 0, 0, 0, 1),
(379, 203, 'Huyện Lạc Sơn', 'huyen-lac-son', 0, 0, 0, 1),
(380, 203, 'Huyện Lạc Thủy', 'huyen-lac-thuy', 0, 0, 0, 1),
(381, 203, 'Huyện Lương Sơn', 'huyen-luong-son', 0, 0, 0, 1),
(382, 203, 'Huyện Mai Châu', 'huyen-mai-chau', 0, 0, 0, 1),
(383, 203, 'Huyện Tân Lạc', 'huyen-tan-lac', 0, 0, 0, 1),
(384, 203, 'Huyện Yên Thủy', 'huyen-yen-thuy', 0, 0, 0, 1),
(385, 203, 'Thành phố Hòa Bình', 'thanh-pho-hoa-binh', 0, 0, 0, 1),
(386, 204, 'Huyện Ân Thi', 'huyen-an-thi', 0, 0, 0, 1),
(387, 204, 'Huyện Khoái Châu', 'huyen-khoai-chau', 0, 0, 0, 1),
(388, 204, 'Huyện Kim Động', 'huyen-kim-dong', 0, 0, 0, 1),
(389, 204, 'Huyện Mỹ Hào', 'huyen-my-hao', 0, 0, 0, 1),
(390, 204, 'Huyện Phù Cừ', 'huyen-phu-cu', 0, 0, 0, 1),
(391, 204, 'Huyện Tiên Lữ', 'huyen-tien-lu', 0, 0, 0, 1),
(392, 204, 'Huyện Văn Giang', 'huyen-van-giang', 0, 0, 0, 1),
(393, 204, 'Huyện Văn Lâm', 'huyen-van-lam', 0, 0, 0, 1),
(394, 204, 'Huyện Yên Mỹ', 'huyen-yen-my', 0, 0, 0, 1),
(395, 204, 'Thành phố Hưng Yên', 'thanh-pho-hung-yen', 0, 0, 0, 1),
(396, 205, 'Huyện Cam Lâm', 'huyen-cam-lam', 0, 0, 0, 1),
(397, 205, 'Huyện Diên Khánh', 'huyen-dien-khanh', 0, 0, 0, 1),
(398, 205, 'Huyện Khánh Sơn', 'huyen-khanh-son', 0, 0, 0, 1),
(399, 205, 'Huyện Khánh Vĩnh', 'huyen-khanh-vinh', 0, 0, 0, 1),
(400, 205, 'Huyện Ninh Hòa', 'huyen-ninh-hoa', 0, 0, 0, 1),
(401, 205, 'Huyện Trường Sa', 'huyen-truong-sa', 0, 0, 0, 1),
(402, 205, 'Huyện Vạn Ninh', 'huyen-van-ninh', 0, 0, 0, 1),
(403, 205, 'Thành phố Nha Trang', 'thanh-pho-nha-trang', 0, 0, 0, 1),
(404, 205, 'Thị xã Cam Ranh', 'thi-xa-cam-ranh', 0, 0, 0, 1),
(405, 202, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(406, 202, 'Huyện Châu Thành A', 'huyen-chau-thanh-a', 0, 0, 0, 1),
(407, 202, 'Huyện Long Mỹ', 'huyen-long-my', 0, 0, 0, 1),
(408, 202, 'Huyện Phụng Hiệp', 'huyen-phung-hiep', 0, 0, 0, 1),
(409, 202, 'Huyện Vị Thủy', 'huyen-vi-thuy', 0, 0, 0, 1),
(410, 202, 'Thành Phố Vị Thanh', 'thanh-pho-vi-thanh', 0, 0, 0, 1),
(411, 202, 'Thị xã Ngã Bảy', 'thi-xa-nga-bay', 0, 0, 0, 1),
(412, 206, 'Huyện An Biên', 'huyen-an-bien', 0, 0, 0, 1),
(413, 206, 'Huyện An Minh', 'huyen-an-minh', 0, 0, 0, 1),
(414, 206, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(415, 206, 'Huyện Giang Thành', 'huyen-giang-thanh', 0, 0, 0, 1),
(416, 206, 'Huyện Giồng Riềng', 'huyen-giong-rieng', 0, 0, 0, 1),
(417, 206, 'Huyện Gò Quao', 'huyen-go-quao', 0, 0, 0, 1),
(418, 206, 'Huyện Hòn Đất', 'huyen-hon-dat', 0, 0, 0, 1),
(419, 206, 'Huyện Kiên Hải', 'huyen-kien-hai', 0, 0, 0, 1),
(420, 206, 'Huyện Kiên Lương', 'huyen-kien-luong', 0, 0, 0, 1),
(421, 206, 'Huyện Phú Quốc', 'huyen-phu-quoc', 0, 0, 0, 1),
(422, 206, 'Huyện Tân Hiệp', 'huyen-tan-hiep', 0, 0, 0, 1),
(423, 206, 'Huyện U Minh Thượng', 'huyen-u-minh-thuong', 0, 0, 0, 1),
(424, 206, 'Huyện Vĩnh Thuận', 'huyen-vinh-thuan', 0, 0, 0, 1),
(425, 206, 'Thành phố Rạch Giá', 'thanh-pho-rach-gia', 0, 0, 0, 1),
(426, 206, 'Thị xã Hà Tiên', 'thi-xa-ha-tien', 0, 0, 0, 1),
(427, 207, 'Huyện Đắk Glei', 'huyen-dak-glei', 0, 0, 0, 1),
(428, 207, 'Huyện Đắk Hà', 'huyen-dak-ha', 0, 0, 0, 1),
(429, 207, 'Huyện Đắk Tô', 'huyen-dak-to', 0, 0, 0, 1),
(430, 207, 'Huyện Kon Plông', 'huyen-kon-plong', 0, 0, 0, 1),
(431, 207, 'Huyện Kon Rẫy', 'huyen-kon-ray', 0, 0, 0, 1),
(432, 207, 'Huyện Ngọc Hồi', 'huyen-ngoc-hoi', 0, 0, 0, 1),
(433, 207, 'Huyện Sa Thầy', 'huyen-sa-thay', 0, 0, 0, 1),
(434, 207, 'Huyện Tu Mơ Rông', 'huyen-tu-mo-rong', 0, 0, 0, 1),
(435, 207, 'Thành phố Kon Tum', 'thanh-pho-kon-tum', 0, 0, 0, 1),
(436, 208, 'Huyện Mường Tè', 'huyen-muong-te', 0, 0, 0, 1),
(437, 208, 'Huyện Phong Thổ', 'huyen-phong-tho', 0, 0, 0, 1),
(438, 208, 'Huyện Sìn Hồ', 'huyen-sin-ho', 0, 0, 0, 1),
(439, 208, 'Huyện Tam Đường', 'huyen-tam-duong', 0, 0, 0, 1),
(440, 208, 'Huyện Tân Uyên', 'huyen-tan-uyen', 0, 0, 0, 1),
(441, 208, 'Huyện Than Uyên', 'huyen-than-uyen', 0, 0, 0, 1),
(442, 208, 'Thị xã Lai Châu', 'thi-xa-lai-chau', 0, 0, 0, 1),
(443, 209, 'Huyện Bảo Lâm', 'huyen-bao-lam', 0, 0, 0, 1),
(444, 209, 'Huyện Cát Tiên', 'huyen-cat-tien', 0, 0, 0, 1),
(445, 209, 'Huyện Đạ Huoai', 'huyen-da-huoai', 0, 0, 0, 1),
(446, 209, 'Huyện Đạ Tẻh', 'huyen-da-teh', 0, 0, 0, 1),
(447, 209, 'Huyện Đam Rông', 'huyen-dam-rong', 0, 0, 0, 1),
(448, 209, 'Huyện Di Linh', 'huyen-di-linh', 0, 0, 0, 1),
(449, 209, 'Huyện Đơn Dương', 'huyen-don-duong', 0, 0, 0, 1),
(450, 209, 'Huyện Đức Trọng', 'huyen-duc-trong', 0, 0, 0, 1),
(451, 209, 'Huyện Lạc Dương', 'huyen-lac-duong', 0, 0, 0, 1),
(452, 209, 'Huyện Lâm Hà', 'huyen-lam-ha', 0, 0, 0, 1),
(453, 209, 'Thành phố Bảo Lộc', 'thanh-pho-bao-loc', 0, 0, 0, 1),
(454, 209, 'Thành phố Đà Lạt', 'thanh-pho-da-lat', 0, 0, 0, 1),
(455, 210, 'Huyện Bắc Sơn', 'huyen-bac-son', 0, 0, 0, 1),
(456, 210, 'Huyện Bình Gia', 'huyen-binh-gia', 0, 0, 0, 1),
(457, 210, 'Huyện Cao Lộc', 'huyen-cao-loc', 0, 0, 0, 1),
(458, 210, 'Huyện Chi Lăng', 'huyen-chi-lang', 0, 0, 0, 1),
(459, 210, 'Huyện Đình Lập', 'huyen-dinh-lap', 0, 0, 0, 1),
(460, 210, 'Huyện Hữu Lũng', 'huyen-huu-lung', 0, 0, 0, 1),
(461, 210, 'Huyện Lộc Bình', 'huyen-loc-binh', 0, 0, 0, 1),
(462, 210, 'Huyện Tràng Định', 'huyen-trang-dinh', 0, 0, 0, 1),
(463, 210, 'Huyện Văn Lãng', 'huyen-van-lang', 0, 0, 0, 1),
(464, 210, 'Huyện Văn Quan', 'huyen-van-quan', 0, 0, 0, 1),
(465, 210, 'Thành phố Lạng Sơn', 'thanh-pho-lang-son', 0, 0, 0, 1),
(466, 211, 'Huyện Bắc Hà', 'huyen-bac-ha', 0, 0, 0, 1),
(467, 211, 'Huyện Bảo Thắng', 'huyen-bao-thang', 0, 0, 0, 1),
(468, 211, 'Huyện Bảo Yên', 'huyen-bao-yen', 0, 0, 0, 1),
(469, 211, 'Huyện Bát Xát', 'huyen-bat-xat', 0, 0, 0, 1),
(470, 211, 'Huyện Mường Khương', 'huyen-muong-khuong', 0, 0, 0, 1),
(471, 211, 'Huyện Sa Pa', 'huyen-sa-pa', 0, 0, 0, 1),
(472, 211, 'Huyện Si Ma Cai', 'huyen-si-ma-cai', 0, 0, 0, 1),
(473, 211, 'Huyện Văn Bàn', 'huyen-van-ban', 0, 0, 0, 1),
(474, 211, 'Thành phố Lào Cai', 'thanh-pho-lao-cai', 0, 0, 0, 1),
(475, 212, 'Huyện Bến Lức', 'huyen-ben-luc', 0, 0, 0, 1),
(476, 212, 'Huyện Cần Đước', 'huyen-can-duoc', 0, 0, 0, 1),
(477, 212, 'Huyện Cần Giuộc', 'huyen-can-giuoc', 0, 0, 0, 1),
(478, 212, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(479, 212, 'Huyện Đức Hòa', 'huyen-duc-hoa', 0, 0, 0, 1),
(480, 212, 'Huyện Đức Huệ', 'huyen-duc-hue', 0, 0, 0, 1),
(481, 212, 'Huyện Mộc Hóa', 'huyen-moc-hoa', 0, 0, 0, 1),
(482, 212, 'Huyện Tân Hưng', 'huyen-tan-hung', 0, 0, 0, 1),
(483, 212, 'Huyện Tân Thạnh', 'huyen-tan-thanh', 0, 0, 0, 1),
(484, 212, 'Huyện Tân Trụ', 'huyen-tan-tru', 0, 0, 0, 1),
(485, 212, 'Huyện Thạnh Hóa', 'huyen-thanh-hoa', 0, 0, 0, 1),
(486, 212, 'Huyện Thủ Thừa', 'huyen-thu-thua', 0, 0, 0, 1),
(487, 212, 'Huyện Vĩnh Hưng', 'huyen-vinh-hung', 0, 0, 0, 1),
(488, 212, 'Thành phố Tân An', 'thanh-pho-tan-an', 0, 0, 0, 1),
(489, 213, 'Huyện Giao Thủy', 'huyen-giao-thuy', 0, 0, 0, 1),
(490, 213, 'Huyện Hải Hậu', 'huyen-hai-hau', 0, 0, 0, 1),
(491, 213, 'Huyện Mỹ Lộc', 'huyen-my-loc', 0, 0, 0, 1),
(492, 213, 'Huyện Nam Trực', 'huyen-nam-truc', 0, 0, 0, 1),
(493, 213, 'Huyện Nghĩa Hưng', 'huyen-nghia-hung', 0, 0, 0, 1),
(494, 213, 'Huyện Trực Ninh', 'huyen-truc-ninh', 0, 0, 0, 1),
(495, 213, 'Huyện Vụ Bản', 'huyen-vu-ban', 0, 0, 0, 1),
(496, 213, 'Huyện Xuân Trường', 'huyen-xuan-truong', 0, 0, 0, 1),
(497, 213, 'Huyện ý Yên', 'huyen-y-yen', 0, 0, 0, 1),
(498, 213, 'Thành phố Nam Định', 'thanh-pho-nam-dinh', 0, 0, 0, 1),
(499, 214, 'Huyện Anh Sơn', 'huyen-anh-son', 0, 0, 0, 1),
(500, 214, 'Huyện Con Cuông', 'huyen-con-cuong', 0, 0, 0, 1),
(501, 214, 'Huyện Diễn Châu', 'huyen-dien-chau', 0, 0, 0, 1),
(502, 214, 'Huyện Đô Lương', 'huyen-do-luong', 0, 0, 0, 1),
(503, 214, 'Huyện Hưng Nguyên', 'huyen-hung-nguyen', 0, 0, 0, 1),
(504, 214, 'Huyện Kỳ Sơn', 'huyen-ky-son', 0, 0, 0, 1),
(505, 214, 'Huyện Nam Đàn', 'huyen-nam-dan', 0, 0, 0, 1),
(506, 214, 'Huyện Nghi Lộc', 'huyen-nghi-loc', 0, 0, 0, 1),
(507, 214, 'Huyện Nghĩa Đàn', 'huyen-nghia-dan', 0, 0, 0, 1),
(508, 214, 'Huyện Quế Phong', 'huyen-que-phong', 0, 0, 0, 1),
(509, 214, 'Huyện Quỳ Châu', 'huyen-quy-chau', 0, 0, 0, 1),
(510, 214, 'Huyện Quỳ Hợp', 'huyen-quy-hop', 0, 0, 0, 1),
(511, 214, 'Huyện Quỳnh Lưu', 'huyen-quynh-luu', 0, 0, 0, 1),
(512, 214, 'Huyện Tân Kỳ', 'huyen-tan-ky', 0, 0, 0, 1),
(513, 214, 'Huyện Thanh Chương', 'huyen-thanh-chuong', 0, 0, 0, 1),
(514, 214, 'Huyện Tương Dương', 'huyen-tuong-duong', 0, 0, 0, 1),
(515, 214, 'Huyện Yên Thành', 'huyen-yen-thanh', 0, 0, 0, 1),
(516, 214, 'Thành phố Vinh', 'thanh-pho-vinh', 0, 0, 0, 1),
(517, 214, 'Thị xã Cửa Lò', 'thi-xa-cua-lo', 0, 0, 0, 1),
(518, 214, 'Thị xã Thái Hòa', 'thi-xa-thai-hoa', 0, 0, 0, 1),
(519, 215, 'Huyện Gia Viễn', 'huyen-gia-vien', 0, 0, 0, 1),
(520, 215, 'Huyện Hoa Lư', 'huyen-hoa-lu', 0, 0, 0, 1),
(521, 215, 'Huyện Kim Sơn', 'huyen-kim-son', 0, 0, 0, 1),
(522, 215, 'Huyện Nho Quan', 'huyen-nho-quan', 0, 0, 0, 1),
(523, 215, 'Huyện Yên Khánh', 'huyen-yen-khanh', 0, 0, 0, 1),
(524, 215, 'Huyện Yên Mô', 'huyen-yen-mo', 0, 0, 0, 1),
(525, 215, 'Thành phố Ninh Bình', 'thanh-pho-ninh-binh', 0, 0, 0, 1),
(526, 215, 'Thị xã Tam Điệp', 'thi-xa-tam-diep', 0, 0, 0, 1),
(527, 216, 'Huyên Bác ái', 'huyen-bac-ai', 0, 0, 0, 1),
(528, 216, 'Huyện Ninh Hải', 'huyen-ninh-hai', 0, 0, 0, 1),
(529, 216, 'Huyện Ninh Phước', 'huyen-ninh-phuoc', 0, 0, 0, 1),
(530, 216, 'Huyện Ninh Sơn', 'huyen-ninh-son', 0, 0, 0, 1),
(531, 216, 'Huyện Thuận Bắc', 'huyen-thuan-bac', 0, 0, 0, 1),
(532, 216, 'Huyện Thuận Nam', 'huyen-thuan-nam', 0, 0, 0, 1),
(533, 216, 'Thành phố Phan Rang-Tháp Chàm', 'thanh-pho-phan-rang-thap-cham', 0, 0, 0, 1),
(534, 217, 'Huyện Cẩm Khê', 'huyen-cam-khe', 0, 0, 0, 1),
(535, 217, 'Huyện Đoan Hùng', 'huyen-doan-hung', 0, 0, 0, 1),
(536, 217, 'Huyện Hạ Hòa', 'huyen-ha-hoa', 0, 0, 0, 1),
(537, 217, 'Huyện Lâm Thao', 'huyen-lam-thao', 0, 0, 0, 1),
(538, 217, 'Huyện Phù Ninh', 'huyen-phu-ninh', 0, 0, 0, 1),
(539, 217, 'Huyện Tam Nông', 'huyen-tam-nong', 0, 0, 0, 1),
(540, 217, 'Huyện Tân Sơn', 'huyen-tan-son', 0, 0, 0, 1),
(541, 217, 'Huyện Thanh Ba', 'huyen-thanh-ba', 0, 0, 0, 1),
(542, 217, 'Huyện Thanh Sơn', 'huyen-thanh-son', 0, 0, 0, 1),
(543, 217, 'Huyện Thanh Thủy', 'huyen-thanh-thuy', 0, 0, 0, 1),
(544, 217, 'Huyện Yên Lập', 'huyen-yen-lap', 0, 0, 0, 1),
(545, 217, 'Thành phố Việt Trì', 'thanh-pho-viet-tri', 0, 0, 0, 1),
(546, 217, 'Thị xã Phú Thọ', 'thi-xa-phu-tho', 0, 0, 0, 1),
(547, 218, 'Huyện Đông Hòa', 'huyen-dong-hoa', 0, 0, 0, 1),
(548, 218, 'Huyện Đồng Xuân', 'huyen-dong-xuan', 0, 0, 0, 1),
(549, 218, 'Huyện Phú Hòa', 'huyen-phu-hoa', 0, 0, 0, 1),
(550, 218, 'Huyện Sơn Hòa', 'huyen-son-hoa', 0, 0, 0, 1),
(551, 218, 'Huyện Sông Hinh', 'huyen-song-hinh', 0, 0, 0, 1),
(552, 218, 'Huyện Tây Hòa', 'huyen-tay-hoa', 0, 0, 0, 1),
(553, 218, 'Huyện Tuy An', 'huyen-tuy-an', 0, 0, 0, 1),
(554, 218, 'Thành phố Tuy Hòa', 'thanh-pho-tuy-hoa', 0, 0, 0, 1),
(555, 218, 'Thị xã Sông Cầu', 'thi-xa-song-cau', 0, 0, 0, 1),
(556, 239, 'Huyện An Dương', 'huyen-an-duong', 0, 0, 0, 1),
(557, 239, 'Huyện An Lão', 'huyen-an-lao', 0, 0, 0, 1),
(558, 239, 'Huyện Bạch Long Vĩ', 'huyen-bach-long-vi', 0, 0, 0, 1),
(559, 239, 'Huyện Cát Hải', 'huyen-cat-hai', 0, 0, 0, 1),
(560, 239, 'Huyện Kiến Thụy', 'huyen-kien-thuy', 0, 0, 0, 1),
(561, 239, 'Huyện Thủy Nguyên', 'huyen-thuy-nguyen', 0, 0, 0, 1),
(562, 239, 'Huyện Tiên Lãng', 'huyen-tien-lang', 0, 0, 0, 1),
(563, 239, 'Huyện Vĩnh Bảo', 'huyen-vinh-bao', 0, 0, 0, 1),
(564, 239, 'Quận Đồ Sơn', 'quan-do-son', 0, 0, 0, 1),
(565, 239, 'Quận Dương Kinh', 'quan-duong-kinh', 0, 0, 0, 1),
(566, 239, 'Quận Hải An', 'quan-hai-an', 0, 0, 0, 1),
(567, 239, 'Quận Hồng Bàng', 'quan-hong-bang', 0, 0, 0, 1),
(568, 239, 'Quận Kiến An', 'quan-kien-an', 0, 0, 0, 1),
(569, 239, 'Quận Lê Chân', 'quan-le-chan', 0, 0, 0, 1),
(570, 239, 'Quận Ngô Quyền', 'quan-ngo-quyen', 0, 0, 0, 1),
(571, 1, 'Huyện Hòa Vang', 'huyen-hoa-vang', 0, 0, 0, 1),
(572, 1, 'Huyện Hoàng Sa', 'huyen-hoang-sa', 0, 0, 0, 1),
(573, 1, 'Quận Cẩm Lệ', 'quan-cam-le', 0, 0, 0, 1),
(574, 1, 'Quận Hải Châu', 'quan-hai-chau', 0, 0, 0, 1),
(575, 1, 'Quận Liên Chiểu', 'quan-lien-chieu', 0, 0, 0, 1),
(576, 1, 'Quận Ngũ Hành Sơn', 'quan-ngu-hanh-son', 0, 0, 0, 1),
(577, 1, 'Quận Sơn Trà', 'quan-son-tra', 0, 0, 0, 1),
(578, 1, 'Quận Thanh Khê', 'quan-thanh-khe', 0, 0, 0, 1),
(579, 237, 'Huyện Cờ Đỏ', 'huyen-co-do', 0, 0, 0, 1),
(580, 237, 'Huyện Phong Điền', 'huyen-phong-dien', 0, 0, 0, 1),
(581, 237, 'Huyện Thới Lai', 'huyen-thoi-lai', 0, 0, 0, 1),
(582, 237, 'Huyện Vĩnh Thạnh', 'huyen-vinh-thanh', 0, 0, 0, 1),
(583, 237, 'Quận Bình Thủy', 'quan-binh-thuy', 0, 0, 0, 1),
(584, 237, 'Quận Cái Răng', 'quan-cai-rang', 0, 0, 0, 1),
(585, 237, 'Quận Ninh Kiều', 'quan-ninh-kieu', 0, 0, 0, 1),
(586, 237, 'Quận Ô Môn', 'quan-o-mon', 0, 0, 0, 1),
(587, 237, 'Quận Thốt Nốt', 'quan-thot-not', 0, 0, 0, 1),
(588, 231, 'Huyện Cái Bè', 'huyen-cai-be', 0, 0, 0, 1),
(589, 231, 'Huyện Cai Lậy', 'huyen-cai-lay', 0, 0, 0, 1),
(590, 231, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(591, 231, 'Huyện Chợ Gạo', 'huyen-cho-gao', 0, 0, 0, 1),
(592, 231, 'Huyện Gò Công Đông', 'huyen-go-cong-dong', 0, 0, 0, 1),
(593, 231, 'Huyện Gò Công Tây', 'huyen-go-cong-tay', 0, 0, 0, 1),
(594, 231, 'Huyện Tân Phú Đông', 'huyen-tan-phu-dong', 0, 0, 0, 1),
(595, 231, 'Huyện Tân Phước', 'huyen-tan-phuoc', 0, 0, 0, 1),
(596, 231, 'Thành phố Mỹ Tho', 'thanh-pho-my-tho', 0, 0, 0, 1),
(597, 231, 'Thị xã Gò Công', 'thi-xa-go-cong', 0, 0, 0, 1),
(598, 232, 'Huyện Càng Long', 'huyen-cang-long', 0, 0, 0, 1),
(599, 232, 'Huyện Cầu Kè', 'huyen-cau-ke', 0, 0, 0, 1),
(600, 232, 'Huyện Cầu Ngang', 'huyen-cau-ngang', 0, 0, 0, 1),
(601, 232, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(602, 232, 'Huyện Duyên Hải', 'huyen-duyen-hai', 0, 0, 0, 1),
(603, 232, 'Huyện Tiểu Cần', 'huyen-tieu-can', 0, 0, 0, 1),
(604, 232, 'Huyện Trà Cú', 'huyen-tra-cu', 0, 0, 0, 1),
(605, 232, 'Thành phố Trà Vinh', 'thanh-pho-tra-vinh', 0, 0, 0, 1),
(606, 234, 'Huyện Bình Minh', 'huyen-binh-minh', 0, 0, 0, 1),
(607, 234, 'Huyện Bình Tân', 'huyen-binh-tan', 0, 0, 0, 1),
(608, 234, 'Huyện Long Hồ', 'huyen-long-ho', 0, 0, 0, 1),
(609, 234, 'Huyện Mang Thít', 'huyen-mang-thit', 0, 0, 0, 1),
(610, 234, 'Huyện Tam Bình', 'huyen-tam-binh', 0, 0, 0, 1),
(611, 234, 'Huyện Trà Ôn', 'huyen-tra-on', 0, 0, 0, 1),
(612, 234, 'Huyện Vũng Liêm', 'huyen-vung-liem', 0, 0, 0, 1),
(613, 234, 'Thành phố Vĩnh Long', 'thanh-pho-vinh-long', 0, 0, 0, 1),
(614, 223, 'Huyện Cam Lộ', 'huyen-cam-lo', 0, 0, 0, 1),
(615, 223, 'Huyện Cồn Cỏ', 'huyen-con-co', 0, 0, 0, 1),
(616, 223, 'Huyện Đa Krông', 'huyen-da-krong', 0, 0, 0, 1),
(617, 223, 'Huyện Gio Linh', 'huyen-gio-linh', 0, 0, 0, 1),
(618, 223, 'Huyện Hải Lăng', 'huyen-hai-lang', 0, 0, 0, 1),
(619, 223, 'Huyện Hướng Hóa', 'huyen-huong-hoa', 0, 0, 0, 1),
(620, 223, 'Huyện Triệu Phong', 'huyen-trieu-phong', 0, 0, 0, 1),
(621, 223, 'Huyện Vính Linh', 'huyen-vinh-linh', 0, 0, 0, 1),
(622, 223, 'Thành phố Đông Hà', 'thanh-pho-dong-ha', 0, 0, 0, 1),
(623, 223, 'Thị xã Quảng Trị', 'thi-xa-quang-tri', 0, 0, 0, 1),
(624, 221, 'Huyện Ba Tơ', 'huyen-ba-to', 0, 0, 0, 1),
(625, 221, 'Huyện Bình Sơn', 'huyen-binh-son', 0, 0, 0, 1),
(626, 221, 'Huyện Đức Phổ', 'huyen-duc-pho', 0, 0, 0, 1),
(627, 221, 'Huyện Lý Sơn', 'huyen-ly-son', 0, 0, 0, 1),
(628, 221, 'Huyện Minh Long', 'huyen-minh-long', 0, 0, 0, 1),
(629, 221, 'Huyện Mộ Đức', 'huyen-mo-duc', 0, 0, 0, 1),
(630, 221, 'Huyện Nghĩa Hành', 'huyen-nghia-hanh', 0, 0, 0, 1),
(631, 221, 'Huyện Sơn Hà', 'huyen-son-ha', 0, 0, 0, 1),
(632, 221, 'Huyện Sơn Tây', 'huyen-son-tay', 0, 0, 0, 1),
(633, 221, 'Huyện Sơn Tịnh', 'huyen-son-tinh', 0, 0, 0, 1),
(634, 221, 'Huyện Tây Trà', 'huyen-tay-tra', 0, 0, 0, 1),
(635, 221, 'Huyện Trà Bồng', 'huyen-tra-bong', 0, 0, 0, 1),
(636, 221, 'Huyện Tư Nghĩa', 'huyen-tu-nghia', 0, 0, 0, 1),
(637, 221, 'Thành phố Quảng Ngãi', 'thanh-pho-quang-ngai', 0, 0, 0, 1),
(638, 220, 'Huyện Bắc Trà My', 'huyen-bac-tra-my', 0, 0, 0, 1),
(639, 220, 'Huyện Đại Lộc', 'huyen-dai-loc', 0, 0, 0, 1),
(640, 220, 'Huyện Điện Bàn', 'huyen-dien-ban', 0, 0, 0, 1),
(641, 220, 'Huyện Đông Giang', 'huyen-dong-giang', 0, 0, 0, 1),
(642, 220, 'Huyện Duy Xuyên', 'huyen-duy-xuyen', 0, 0, 0, 1),
(643, 220, 'Huyện Hiệp Đức', 'huyen-hiep-duc', 0, 0, 0, 1),
(644, 220, 'Huyện Nam Giang', 'huyen-nam-giang', 0, 0, 0, 1),
(645, 220, 'Huyện Nam Trà My', 'huyen-nam-tra-my', 0, 0, 0, 1),
(646, 220, 'Huyện Nông Sơn', 'huyen-nong-son', 0, 0, 0, 1),
(647, 220, 'Huyện Núi Thành', 'huyen-nui-thanh', 0, 0, 0, 1),
(648, 220, 'Huyện Phú Ninh', 'huyen-phu-ninh', 0, 0, 0, 1),
(649, 220, 'Huyện Phước Sơn', 'huyen-phuoc-son', 0, 0, 0, 1),
(650, 220, 'Huyện Quế Sơn', 'huyen-que-son', 0, 0, 0, 1),
(651, 220, 'Huyện Tây Giang', 'huyen-tay-giang', 0, 0, 0, 1),
(652, 220, 'Huyện Thăng Bình', 'huyen-thang-binh', 0, 0, 0, 1),
(653, 220, 'Huyện Tiên Phước', 'huyen-tien-phuoc', 0, 0, 0, 1),
(654, 220, 'Thành phố Hội An', 'thanh-pho-hoi-an', 0, 0, 0, 1),
(655, 220, 'Thành phố Tam Kỳ', 'thanh-pho-tam-ky', 0, 0, 0, 1),
(656, 219, 'Huyện Bố Trạch', 'huyen-bo-trach', 0, 0, 0, 1),
(657, 219, 'Huyện Lệ Thủy', 'huyen-le-thuy', 0, 0, 0, 1),
(658, 219, 'Huyện Minh Hoá', 'huyen-minh-hoa', 0, 0, 0, 1),
(659, 219, 'Huyện Quảng Ninh', 'huyen-quang-ninh', 0, 0, 0, 1),
(660, 219, 'Huyện Quảng Trạch', 'huyen-quang-trach', 0, 0, 0, 1),
(661, 219, 'Huyện Tuyên Hoá', 'huyen-tuyen-hoa', 0, 0, 0, 1),
(662, 219, 'Thành phố Đồng Hới', 'thanh-pho-dong-hoi', 0, 0, 0, 1),
(663, 230, 'Huyện A Lưới', 'huyen-a-luoi', 0, 0, 0, 1),
(664, 230, 'Huyện Hương Trà', 'huyen-huong-tra', 0, 0, 0, 1),
(665, 230, 'Huyện Nam Dông', 'huyen-nam-dong', 0, 0, 0, 1),
(666, 230, 'Huyện Phong Điền', 'huyen-phong-dien', 0, 0, 0, 1),
(667, 230, 'Huyện Phú Lộc', 'huyen-phu-loc', 0, 0, 0, 1),
(668, 230, 'Huyện Phú Vang', 'huyen-phu-vang', 0, 0, 0, 1),
(669, 230, 'Huyện Quảng Điền', 'huyen-quang-dien', 0, 0, 0, 1),
(670, 230, 'Thành phố Huế', 'thanh-pho-hue', 0, 0, 0, 1),
(671, 230, 'Thị xã Hương Thủy', 'thi-xa-huong-thuy', 0, 0, 0, 1),
(672, 226, 'Huyện Bến Cầu', 'huyen-ben-cau', 0, 0, 0, 1),
(673, 226, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(674, 226, 'Huyện Dương Minh Châu', 'huyen-duong-minh-chau', 0, 0, 0, 1),
(675, 226, 'Huyện Gò Dầu', 'huyen-go-dau', 0, 0, 0, 1),
(676, 226, 'Huyện Hòa Thành', 'huyen-hoa-thanh', 0, 0, 0, 1),
(677, 226, 'Huyện Tân Biên', 'huyen-tan-bien', 0, 0, 0, 1),
(678, 226, 'Huyện Tân Châu', 'huyen-tan-chau', 0, 0, 0, 1),
(679, 226, 'Huyện Trảng Bàng', 'huyen-trang-bang', 0, 0, 0, 1),
(680, 226, 'Thị xã Tây Ninh', 'thi-xa-tay-ninh', 0, 0, 0, 1),
(681, 222, 'Huyện Ba Chẽ', 'huyen-ba-che', 0, 0, 0, 1),
(682, 222, 'Huyện Bình Liêu', 'huyen-binh-lieu', 0, 0, 0, 1),
(683, 222, 'Huyện Cô Tô', 'huyen-co-to', 0, 0, 0, 1),
(684, 222, 'Huyện Đầm Hà', 'huyen-dam-ha', 0, 0, 0, 1),
(685, 222, 'Huyện Đông Triều', 'huyen-dong-trieu', 0, 0, 0, 1),
(686, 222, 'Huyện Hải Hà', 'huyen-hai-ha', 0, 0, 0, 1),
(687, 222, 'Huyện Hoành Bồ', 'huyen-hoanh-bo', 0, 0, 0, 1),
(688, 222, 'Huyện Tiên Yên', 'huyen-tien-yen', 0, 0, 0, 1),
(689, 222, 'Huyện Vân Đồn', 'huyen-van-don', 0, 0, 0, 1),
(690, 222, 'Huyện Yên Hưng', 'huyen-yen-hung', 0, 0, 0, 1),
(691, 222, 'Thành phố Hạ Long', 'thanh-pho-ha-long', 0, 0, 0, 1),
(692, 222, 'Thành phố Móng Cái', 'thanh-pho-mong-cai', 0, 0, 0, 1),
(693, 222, 'Thị xã Cẩm Phả', 'thi-xa-cam-pha', 0, 0, 0, 1),
(694, 222, 'Thị xã Uông Bí', 'thi-xa-uong-bi', 0, 0, 0, 1),
(695, 224, 'Huyện Châu Thành', 'huyen-chau-thanh', 0, 0, 0, 1),
(696, 224, 'Huyện Cù Lao Dung', 'huyen-cu-lao-dung', 0, 0, 0, 1),
(697, 224, 'Huyện Kế Sách', 'huyen-ke-sach', 0, 0, 0, 1),
(698, 224, 'Huyện Long Phú', 'huyen-long-phu', 0, 0, 0, 1),
(699, 224, 'Huyện Mỹ Tú', 'huyen-my-tu', 0, 0, 0, 1),
(700, 224, 'Huyện Mỹ Xuyên', 'huyen-my-xuyen', 0, 0, 0, 1),
(701, 224, 'Huyện Ngã Năm', 'huyen-nga-nam', 0, 0, 0, 1),
(702, 224, 'Huyện Thạnh Trị', 'huyen-thanh-tri', 0, 0, 0, 1),
(703, 224, 'Huyện Trần Đề', 'huyen-tran-de', 0, 0, 0, 1),
(704, 224, 'Huyện Vĩnh Châu', 'huyen-vinh-chau', 0, 0, 0, 1),
(705, 224, 'Thành phố Sóc Trăng', 'thanh-pho-soc-trang', 0, 0, 0, 1),
(706, 225, 'Huyện Bắc Yên', 'huyen-bac-yen', 0, 0, 0, 1),
(707, 225, 'Huyện Mai Sơn', 'huyen-mai-son', 0, 0, 0, 1),
(708, 225, 'Huyện Mộc Châu', 'huyen-moc-chau', 0, 0, 0, 1),
(709, 225, 'Huyện Mường La', 'huyen-muong-la', 0, 0, 0, 1),
(710, 225, 'Huyện Phù Yên', 'huyen-phu-yen', 0, 0, 0, 1),
(711, 225, 'Huyện Quỳnh Nhai', 'huyen-quynh-nhai', 0, 0, 0, 1),
(712, 225, 'Huyện Sông Mã', 'huyen-song-ma', 0, 0, 0, 1),
(713, 225, 'Huyện Sốp Cộp', 'huyen-sop-cop', 0, 0, 0, 1),
(714, 225, 'Huyện Thuận Châu', 'huyen-thuan-chau', 0, 0, 0, 1),
(715, 225, 'Huyện Yên Châu', 'huyen-yen-chau', 0, 0, 0, 1),
(716, 225, 'Thành phố Sơn La', 'thanh-pho-son-la', 0, 0, 0, 1),
(717, 227, 'Huyện Đông Hưng', 'huyen-dong-hung', 0, 0, 0, 1),
(718, 227, 'Huyện Hưng Hà', 'huyen-hung-ha', 0, 0, 0, 1),
(719, 227, 'Huyện Kiến Xương', 'huyen-kien-xuong', 0, 0, 0, 1),
(720, 227, 'Huyện Quỳnh Phụ', 'huyen-quynh-phu', 0, 0, 0, 1),
(721, 227, 'Huyện Thái Thụy', 'huyen-thai-thuy', 0, 0, 0, 1),
(722, 227, 'Huyện Tiền Hải', 'huyen-tien-hai', 0, 0, 0, 1),
(723, 227, 'Huyện Vũ Thư', 'huyen-vu-thu', 0, 0, 0, 1),
(724, 227, 'Thành phố Thái Bình', 'thanh-pho-thai-binh', 0, 0, 0, 1),
(725, 228, 'Huyện Đại Từ', 'huyen-dai-tu', 0, 0, 0, 1),
(726, 228, 'Huyện Định Hóa', 'huyen-dinh-hoa', 0, 0, 0, 1),
(727, 228, 'Huyện Đồng Hỷ', 'huyen-dong-hy', 0, 0, 0, 1),
(728, 228, 'Huyện Phổ Yên', 'huyen-pho-yen', 0, 0, 0, 1),
(729, 228, 'Huyện Phú Bình', 'huyen-phu-binh', 0, 0, 0, 1),
(730, 228, 'Huyện Phú Lương', 'huyen-phu-luong', 0, 0, 0, 1),
(731, 228, 'Huyện Võ Nhai', 'huyen-vo-nhai', 0, 0, 0, 1),
(732, 228, 'Thành phố Thái Nguyên', 'thanh-pho-thai-nguyen', 0, 0, 0, 1),
(733, 228, 'Thị xã Sông Công', 'thi-xa-song-cong', 0, 0, 0, 1),
(734, 229, 'Huyện Bá Thước', 'huyen-ba-thuoc', 0, 0, 0, 1),
(735, 229, 'Huyện Cẩm Thủy', 'huyen-cam-thuy', 0, 0, 0, 1),
(736, 229, 'Huyện Đông Sơn', 'huyen-dong-son', 0, 0, 0, 1),
(737, 229, 'Huyện Hà Trung', 'huyen-ha-trung', 0, 0, 0, 1),
(738, 229, 'Huyện Hậu Lộc', 'huyen-hau-loc', 0, 0, 0, 1),
(739, 229, 'Huyện Hoằng Hóa', 'huyen-hoang-hoa', 0, 0, 0, 1),
(740, 229, 'Huyện Lang Chánh', 'huyen-lang-chanh', 0, 0, 0, 1),
(741, 229, 'Huyện Mường Lát', 'huyen-muong-lat', 0, 0, 0, 1),
(742, 229, 'Huyện Nga Sơn', 'huyen-nga-son', 0, 0, 0, 1),
(743, 229, 'Huyện Ngọc Lặc', 'huyen-ngoc-lac', 0, 0, 0, 1),
(744, 229, 'Huyện Như Thanh', 'huyen-nhu-thanh', 0, 0, 0, 1),
(745, 229, 'Huyện Như Xuân', 'huyen-nhu-xuan', 0, 0, 0, 1),
(746, 229, 'Huyện Nông Cống', 'huyen-nong-cong', 0, 0, 0, 1),
(747, 229, 'Huyện Quan Hóa', 'huyen-quan-hoa', 0, 0, 0, 1),
(748, 229, 'Huyện Quan Sơn', 'huyen-quan-son', 0, 0, 0, 1),
(749, 229, 'Huyện Quảng Xương', 'huyen-quang-xuong', 0, 0, 0, 1),
(750, 229, 'Huyện Thạch Thành', 'huyen-thach-thanh', 0, 0, 0, 1),
(751, 229, 'Huyện Thiệu Hóa', 'huyen-thieu-hoa', 0, 0, 0, 1),
(752, 229, 'Huyện Thọ Xuân', 'huyen-tho-xuan', 0, 0, 0, 1),
(753, 229, 'Huyện Thường Xuân', 'huyen-thuong-xuan', 0, 0, 0, 1),
(754, 229, 'Huyện Tĩnh Gia', 'huyen-tinh-gia', 0, 0, 0, 1),
(755, 229, 'Huyện Triệu Sơn', 'huyen-trieu-son', 0, 0, 0, 1),
(756, 229, 'Huyện Vĩnh Lộc', 'huyen-vinh-loc', 0, 0, 0, 1),
(757, 229, 'Huyện Yên Định', 'huyen-yen-dinh', 0, 0, 0, 1),
(758, 229, 'Thành phố Thanh Hóa', 'thanh-pho-thanh-hoa', 0, 0, 0, 1),
(759, 229, 'Thị xã Bỉm Sơn', 'thi-xa-bim-son', 0, 0, 0, 1),
(760, 229, 'Thị xã Sầm Sơn', 'thi-xa-sam-son', 0, 0, 0, 1),
(761, 233, 'Huyện Chiêm Hóa', 'huyen-chiem-hoa', 0, 0, 0, 1),
(762, 233, 'Huyện Hàm Yên', 'huyen-ham-yen', 0, 0, 0, 1),
(763, 233, 'Huyện Na Hang', 'huyen-na-hang', 0, 0, 0, 1),
(764, 233, 'Huyện Sơn Dương', 'huyen-son-duong', 0, 0, 0, 1),
(765, 233, 'Huyện Yên Sơn', 'huyen-yen-son', 0, 0, 0, 1),
(766, 233, 'Thành phố Tuyên Quang', 'thanh-pho-tuyen-quang', 0, 0, 0, 1),
(767, 235, 'Huyện Bình Xuyên', 'huyen-binh-xuyen', 0, 0, 0, 1),
(768, 235, 'Huyện Lập Thạch', 'huyen-lap-thach', 0, 0, 0, 1),
(769, 235, 'Huyện Sông Lô', 'huyen-song-lo', 0, 0, 0, 1),
(770, 235, 'Huyện Tam Đảo', 'huyen-tam-dao', 0, 0, 0, 1),
(771, 235, 'Huyện Tam Dương', 'huyen-tam-duong', 0, 0, 0, 1),
(772, 235, 'Huyện Vĩnh Tường', 'huyen-vinh-tuong', 0, 0, 0, 1),
(773, 235, 'Huyện Yên Lạc', 'huyen-yen-lac', 0, 0, 0, 1),
(774, 235, 'Thành phố Vĩnh Yên', 'thanh-pho-vinh-yen', 0, 0, 0, 1),
(775, 235, 'Thị xã Phúc Yên', 'thi-xa-phuc-yen', 0, 0, 0, 1),
(776, 236, 'Huyện Lục Yên', 'huyen-luc-yen', 0, 0, 0, 1),
(777, 236, 'Huyện Mù Cang Chải', 'huyen-mu-cang-chai', 0, 0, 0, 1),
(778, 236, 'Huyện Trạm Tấu', 'huyen-tram-tau', 0, 0, 0, 1),
(779, 236, 'Huyện Trấn Yên', 'huyen-tran-yen', 0, 0, 0, 1),
(780, 236, 'Huyện Văn Chấn', 'huyen-van-chan', 0, 0, 0, 1),
(781, 236, 'Huyện Văn Yên', 'huyen-van-yen', 0, 0, 0, 1),
(782, 236, 'Huyện Yên Bình', 'huyen-yen-binh', 0, 0, 0, 1),
(783, 236, 'Thành phố Yên Bái', 'thanh-pho-yen-bai', 0, 0, 0, 1),
(784, 236, 'Thị xã Nghĩa Lộ', 'thi-xa-nghia-lo', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(254) DEFAULT NULL,
  `address` varchar(254) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `title` varchar(254) DEFAULT NULL,
  `content` text,
  `datesend` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_office` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(254) DEFAULT NULL,
  `address` varchar(254) NOT NULL,
  `name` varchar(254) DEFAULT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `phone_2` varchar(20) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `images` varchar(254) NOT NULL,
  `datesave` int(11) DEFAULT NULL,
  `created_by` varchar(20) NOT NULL,
  `modified` int(11) NOT NULL,
  `note` text,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `id_office`, `parent_id`, `title`, `address`, `name`, `phone_1`, `phone_2`, `email`, `images`, `datesave`, `created_by`, `modified`, `note`, `ordering`, `published`) VALUES
(35, 2, 0, 'Phó Giám đốc', '', 'Lê Văn Chính', '', '0905.189269', '', '', NULL, '238', 1415955393, '', 3, 1),
(38, 35, 0, 'Giám đốc', '', 'Võ Đức Thắng', ' 0906512924', '', '', '', NULL, '238', 1415976235, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_des`
--

CREATE TABLE IF NOT EXISTS `contact_des` (
  `id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `title` varchar(254) DEFAULT NULL,
  `address` varchar(254) DEFAULT NULL,
  `intro` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_des`
--

INSERT INTO `contact_des` (`id`, `lang_id`, `title`, `address`, `intro`) VALUES
(1, 1, 'Mái Che Tân Quốc Kỳ', 'Thành phố Đà Nẵng', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_row`
--

CREATE TABLE IF NOT EXISTS `contact_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(254) DEFAULT NULL,
  `website` varchar(254) DEFAULT NULL,
  `hotline` varchar(254) DEFAULT NULL,
  `phone` varchar(254) DEFAULT NULL,
  `fax` varchar(254) DEFAULT NULL,
  `send_mail` tinyint(1) NOT NULL DEFAULT '1',
  `lat` varchar(254) DEFAULT NULL,
  `lng` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_row`
--

INSERT INTO `contact_row` (`id`, `email`, `website`, `hotline`, `phone`, `fax`, `send_mail`, `lat`, `lng`) VALUES
(1, 'infor@maichedanang.com', 'www.maichedanang.com', '', '0934971071', '', 1, '16.0544068', '108.20216670000002');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `session_id` varchar(50) NOT NULL DEFAULT '',
  `ip_address` varchar(15) DEFAULT NULL,
  `accountid` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`session_id`, `ip_address`, `accountid`, `timestamp`) VALUES
('er3q1vad77eq8tqu8c0tg7ik62', '14.167.40.195', NULL, 1419405690);

-- --------------------------------------------------------

--
-- Table structure for table `counter_history`
--

CREATE TABLE IF NOT EXISTS `counter_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_total` int(11) DEFAULT NULL,
  `c_day_name` int(2) DEFAULT NULL,
  `c_today_hits` int(11) DEFAULT NULL,
  `c_month_name` int(2) DEFAULT NULL,
  `c_month_hits` int(11) DEFAULT NULL,
  `last_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `counter_history`
--

INSERT INTO `counter_history` (`id`, `c_total`, `c_day_name`, `c_today_hits`, `c_month_name`, `c_month_hits`, `last_update`) VALUES
(1, 7581, 24, 16, 12, 44, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE IF NOT EXISTS `dangky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ho` varchar(200) DEFAULT NULL,
  `ten` varchar(200) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `address1` varchar(254) DEFAULT NULL,
  `address2` varchar(254) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `check_mail` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id`, `ho`, `ten`, `email`, `address1`, `address2`, `city`, `country`, `mobile`, `check_mail`) VALUES
(2, 'Nguyễn', 'Nam', 'tnduoc@gmail.com', '195 Tô Hiệu', '', 'Đà Nẵng', 'Việt Nam', '0989284728', 1),
(3, 'Pham', 'Huu Duyen', 'duyenph.ahrhcm@mc.com.vn', '107', '107', 'HCM', 'Vietnam', '0944844549', 1),
(4, 'Pham', 'Huu Duyen', 'duyenph.ahrhcm@mc.com.vn', '107', '107', 'HCM', 'Vietnam', '0944844549', 1),
(5, 'Pham', 'Huu Duyen', 'duyenph.ahrhcm@mc.com.vn', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `geocode_cache`
--

CREATE TABLE IF NOT EXISTS `geocode_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `query` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `geocode_cache`
--

INSERT INTO `geocode_cache` (`id`, `lng`, `lat`, `query`) VALUES
(36, 108.1662483, 16.072239, '185 t'),
(37, 108.1662483, 16.072239, '185 t'),
(38, 108.1668677, 16.065762, '185 t'),
(39, 108.1668677, 16.065762, '185 t'),
(40, 108.1668677, 16.065762, '185 t'),
(41, 108.1668677, 16.065762, '185 t'),
(42, 108.1668677, 16.065762, '185 t'),
(43, 108.1668677, 16.065762, '185 t'),
(44, 108.1668677, 16.065762, '185 t'),
(45, 108.1668677, 16.065762, '185 t'),
(46, 108.1668677, 16.065762, '185 t'),
(47, 108.1668677, 16.065762, '185 t'),
(48, 108.1668677, 16.065762, '185 t'),
(49, 108.1668677, 16.065762, '185 t'),
(50, 108.1668677, 16.065762, '185 t'),
(51, 108.1668677, 16.065762, '185 t'),
(52, 108.1668677, 16.065762, '185 t'),
(53, 108.1668677, 16.065762, '185 t'),
(54, 108.1668677, 16.065762, '185 t'),
(55, 108.1668677, 16.065762, '185 t'),
(56, 108.1668677, 16.065762, '185 t'),
(57, 108.1668677, 16.065762, '185 t'),
(58, 108.1668677, 16.065762, '185 t'),
(59, 108.1668677, 16.065762, '185 t'),
(60, 108.1668677, 16.065762, '185 t'),
(61, 108.1668677, 16.065762, '185 t'),
(62, 108.1668677, 16.065762, '185 t'),
(63, 108.1668677, 16.065762, '185 t'),
(64, 108.1668677, 16.065762, '185 t'),
(65, 108.1668677, 16.065762, '185 t'),
(66, 108.1668677, 16.065762, '185 t'),
(67, 108.1668677, 16.065762, '185 t'),
(68, 108.1668677, 16.065762, '185 t'),
(69, 108.1668677, 16.065762, '185 t'),
(70, 108.1668677, 16.065762, '185 t'),
(71, 108.1668677, 16.065762, '185 t'),
(72, 108.1668677, 16.065762, '185 t'),
(73, 108.1668677, 16.065762, '185 t'),
(74, 108.1668677, 16.065762, '185 t'),
(75, 108.1668677, 16.065762, '185 t'),
(76, 108.1668677, 16.065762, '185 t'),
(77, 108.1668677, 16.065762, '185 t'),
(78, 108.1668677, 16.065762, '185 t'),
(79, 108.1668677, 16.065762, '185 t'),
(80, 108.1668677, 16.065762, '185 t'),
(81, 108.1668677, 16.065762, '185 t'),
(82, 108.1668677, 16.065762, '185 t'),
(83, 108.1668677, 16.065762, '185 t'),
(84, 108.1668677, 16.065762, '185 t'),
(85, 108.1668677, 16.065762, '185 t'),
(86, 108.1668677, 16.065762, '185 t'),
(87, 108.1668677, 16.065762, '185 t'),
(88, 108.1668677, 16.065762, '185 tô hiệu, liên chiểu, Đà nẵng, việt nam'),
(89, 108.338047, 15.8800568, '01 trần hưng Đạo - hội an - quảng nam'),
(90, 108.1743517, 16.0671155, '156/1 nguyễn như hạnh - quận liên chiểu - tp Đà nẵng'),
(91, 108.166768, 16.0647134, '185 t'),
(92, 108.166768, 16.0647134, '185 t'),
(93, 108.166768, 16.0647134, '185 t'),
(94, 108.166768, 16.0647134, '185 tô hiệu, hòa minh, liên chiểu, Đà nẵng'),
(95, 106.731475, 10.7893292, '42, đường số 12, p11, q.gò vấp, tp.hcm'),
(96, 106.6606317, 10.8543819, '42 Đường số 12, phường 11, quận gò vấp, tp.hcm'),
(97, 106.6592324, 10.8426211, 'số 42, đường 12, phường 11, quận gò vấp, tp.hcm'),
(98, 106.6592324, 10.8426211, 'số 42 đường 12, phường 11, quận gò vấp, tp.hcm');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) DEFAULT NULL,
  `alias` varchar(254) DEFAULT NULL,
  `title` varchar(254) DEFAULT NULL,
  `slug` varchar(254) DEFAULT NULL,
  `title_menu` varchar(254) DEFAULT NULL,
  `content` text,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `catid`, `alias`, `title`, `slug`, `title_menu`, `content`, `ordering`, `published`) VALUES
(2, 2, NULL, 'Cách tạo gian hàng', 'cach-tao-gian-hang', 'Cách tạo gian hàng', '&lt;h1&gt;Cách tạo gian hàng&lt;/h1&gt;\r\n', 2, 1),
(3, 2, NULL, 'Hướng dẫn đăng bán', 'huong-dan-dang-ban', 'Hướng dẫn đăng bán', '&lt;div class=&quot;article-inside&quot;&gt;\r\n&lt;p&gt;&lt;strong style=&quot;font-size: 14px; border-bottom: 1px solid #333;&quot;&gt;Bước 1:&lt;/strong&gt; Đăng nhập vào 123Mua, vào phần &lt;strong&gt;&quot;Đăng bán&quot;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; class=&quot;img&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic28.png&quot; style=&quot;width: 400px; height: 71px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong style=&quot;font-size: 14px; border-bottom: 1px solid #333;&quot;&gt;Bước 2:&lt;/strong&gt; Chọn ngành hàng cho đúng ngành hàng shop đăng bán và bấm vào &lt;strong&gt;&quot;Tiếp tục&quot;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic29.png&quot; style=&quot;width: 400px; height: 117px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong style=&quot;font-size: 14px; border-bottom: 1px solid #333;&quot;&gt;Bước 3:&lt;/strong&gt; Chọn &lt;strong&gt;1 trong 2&lt;/strong&gt; cách đăng trên 123Mua&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; class=&quot;img&quot; height=&quot;65&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic30.png&quot; width=&quot;460&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p class=&quot;step-inside rounded&quot; style=&quot;margin-left: 0;&quot;&gt;Cách 1: Đăng 1 sản phẩm trong 1 topic&lt;/p&gt;\r\n\r\n&lt;p&gt;Bạn bắt đầu nhập &lt;strong&gt;Thông tin cơ bản&lt;/strong&gt; sản phẩm đăng bán:&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic31.png&quot; style=&quot;width: 400px; height: 219px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ul class=&quot;listing&quot; style=&quot;margin-left: 0; padding-left: 10px; border-left: 2px solid #ddd;&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tên sản phẩm:&lt;/strong&gt; là tên tiêu đề của toàn bộ tin đăng, phải ghi rõ sản phẩm được bán trong tin đăng.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Mô tả ngắn:&lt;/strong&gt; Mô tả ngắn gọn về sản phẩm trong tin đăng đến khách hàng.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Mã sản phẩm:&lt;/strong&gt; mã măt hàng Shop bán để khách hàng tiện cho việc đặt hàng&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Giá bán:&lt;/strong&gt; Giá bán chính xác của sản phẩm, phải ghi đúng theo quy định VNĐ&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Khu vực bán:&lt;/strong&gt; chọn khu vực thích hợp theo nhu cầu của Shop&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Hình ảnh sản phẩm:&lt;/strong&gt; chọn hình ảnh chính xác của sản phẩm cần đăng bán.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Lưu ý:&lt;/strong&gt; Điền thông tin cơ bản bắt buộc, lưu ý viết tiêu đề tiếng Việt có dấu ngắn gọn nhưng phải ghi rõ sản phẩm muốn bán trong tin đăng. Tiêu đề topic sản phẩm đăng bán không được trùng nhau&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Vào phần &lt;strong&gt;thông số sản phẩm&lt;/strong&gt;, chọn các thông tin cơ bản đúng với sản phẩm đăng bán trong tin đăng&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic32.png&quot; style=&quot;width: 400px; height: 62px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Vào phần &lt;strong&gt;&quot;Mô tả chi tiết sản phẩm&quot;&lt;/strong&gt;, chỉnh sửa hình ảnh vào giữa, thêm text giới thiệu Shop…, sau đó bấm &lt;strong&gt;&quot;Cập nhật sản phẩm&quot;&lt;/strong&gt; để hoàn tất quá trình đăng bán sản 1 sản phẩm trong 1 tin đăng&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic33.png&quot; style=&quot;width: 400px; height: 283px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Bạn đã đăng sản phẩm thành công trên 123Mua&lt;/strong&gt;. BQT 123Mua sẽ duyệt topic trong vòng 24 giờ&lt;/p&gt;\r\n\r\n&lt;p&gt; &lt;/p&gt;\r\n\r\n&lt;p class=&quot;step-inside rounded&quot; style=&quot;margin-left: 0;&quot;&gt;Cách 2: Đăng nhiều sản phẩm trong 1 topic:&lt;/p&gt;\r\n\r\n&lt;p&gt;Bạn bắt đầu nhập &lt;strong&gt;Thông tin cơ bản&lt;/strong&gt; sản phẩm đăng bán:&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic34.png&quot; style=&quot;width: 400px; height: 111px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ul class=&quot;listing&quot; style=&quot;margin-left: 0; padding-left: 10px; border-left: 2px solid #ddd;&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tên nhóm sản phẩm:&lt;/strong&gt; là tiêu đề của toàn bộ tin đăng, phải ghi rõ sản phẩm được bán trong tin đăng&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Mô tả ngắn:&lt;/strong&gt; Mô tả ngắn gọn về sản phẩm trong tin đăng đến khách hàng.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Khu vực bán:&lt;/strong&gt; chọn khu vực thích hợp theo nhu cầu của Shop&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Bạn điền tiếp &lt;strong&gt;Thông tin chi tiết&lt;/strong&gt; sản phẩm mà bạn muốn đăng bán (tối đa 24 sản phẩm)&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic35.png&quot; style=&quot;width: 400px; height: 113px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;ul class=&quot;listing&quot; style=&quot;margin-left: 0; padding-left: 10px; border-left: 2px solid #ddd;&quot;&gt;\r\n	&lt;li&gt;&lt;strong&gt;Hình ảnh:&lt;/strong&gt; là nơi bạn thực hịên đăng ảnh, hình ảnh phải đúng sản phẩm cần đăng bán.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tên sản phẩm:&lt;/strong&gt; là tên sản phẩm bạn đăng bán.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Giá sản phẩm:&lt;/strong&gt; là giá của từng sản phẩm bạn đăng bán.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Sau khi điền đầy đủ thông tin chi tiết từng sản phẩm. Bạn hãy bấm nút &lt;strong&gt;&quot;Lưu sản phẩm&quot;&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm sẽ hiển thị tại mục &lt;strong&gt;Mô tả chi tiết&lt;/strong&gt; sản phẩm.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lập lại thao tác đăng bán với các sản phẩm khác, 1 bài đăng được đăng &lt;strong&gt;tối đa 24 sản phẩm&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;**Lưu ý&lt;/strong&gt;: Trong quá trình đăng bán, bạn có thể thực hiện thao tác sửa hoặc xóa sản phẩm mới đăng bằng cách bấm vào nút &lt;strong&gt;Sửa&lt;/strong&gt; và &lt;strong&gt;Xóa&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sau khi đăng xong các sản phẩm, vào Thông tin chi tiết sản phẩm, chỉnh sửa tin đăng của mình sao cho dễ nhìn và bắt mắt hơn bằng các công cụ có sẵn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;color: #d00;&quot;&gt;&lt;strong style=&quot;text-decoration: underline;&quot;&gt;Lưu ý:&lt;/strong&gt; Chúng tôi khuyến khích bạn thực hiện thao tác đăng hình ảnh sản phẩm theo hướng dẫn của chúng tôi. Bạn không nên cắt và dán nội dung tại các trang website khác vào mục Mô tả chung này.&lt;/p&gt;\r\n\r\n&lt;p&gt;Để giúp bạn thuận tiện hơn trong việc đăng ảnh vào tin đăng. Bạn có thể sử công cụ đăng ảnh tại mục Mô tả chung bằng cách &lt;strong&gt;Upload ảnh từ máy tính&lt;/strong&gt; hoặc &lt;strong&gt;chèn link URL&lt;/strong&gt; như sau:&lt;/p&gt;\r\n\r\n&lt;p&gt;Upload ảnh:&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; height=&quot;180&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic36.png&quot; width=&quot;436&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Hoặc chèn URL&lt;/p&gt;\r\n\r\n&lt;p align=&quot;center&quot;&gt;&lt;img alt=&quot;123Mua.vn&quot; height=&quot;180&quot; src=&quot;http://trogiup.123mua.vn/default/images/faqs_pic37.png&quot; width=&quot;436&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sau khi đăng xong hình ảnh sản phẩm, bạn bắt đầu viết thông tin giới thiệu rõ nét về sản phẩm đăng bán của shop và nhấn nút &lt;strong&gt;&quot;Đăng bán&quot;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Bạn đã đăng sản phẩm thành công trên 123Mua&lt;/strong&gt;. Các tin đăng của bạn được chuyển qua BQT 123Mua kiểm duyệt trong vòng 24 giờ.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;p&gt; &lt;/p&gt;\r\n', 3, 1),
(8, 3, NULL, 'Qui định mua hàng', 'qui-dinh-mua-hang', 'Qui định mua hàng', '&lt;p&gt;\r\n	&lt;strong class=&quot;active&quot;&gt;Qui định mua hàng&lt;/strong&gt;&lt;/p&gt;\r\n', 3, 1),
(9, 3, NULL, 'Nội dung bình luận', 'noi-dung-binh-luan', 'Nội dung bình luận', '&lt;p&gt;\r\n	&lt;strong class=&quot;active&quot;&gt;Nội dung bình luận&lt;/strong&gt;&lt;/p&gt;\r\n', 5, 1),
(10, 3, NULL, 'Các câu hỏi thường gặp', 'cac-cau-hoi-thuong-gap', 'Các câu hỏi thường gặp', '&lt;p&gt;\r\n	&lt;strong class=&quot;active&quot;&gt;Các câu hỏi thường gặp&lt;/strong&gt;&lt;/p&gt;\r\n', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(254) DEFAULT NULL,
  `images` varchar(254) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang_des`
--

CREATE TABLE IF NOT EXISTS `khachhang_des` (
  `id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `name` varchar(254) DEFAULT NULL,
  `slug` varchar(254) DEFAULT NULL,
  `gioithieu` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(254) DEFAULT NULL,
  `lang_dir` varchar(254) DEFAULT NULL,
  `lang_icon` varchar(254) DEFAULT NULL,
  `lang_default` tinyint(1) NOT NULL DEFAULT '0',
  `lang_order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `lang_name`, `lang_dir`, `lang_icon`, `lang_default`, `lang_order`) VALUES
(1, 'Vietnamese', 'vi', 'vn', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordering` int(11) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `module` varchar(200) DEFAULT NULL,
  `show_title` varchar(200) DEFAULT NULL,
  `html` tinyint(1) DEFAULT '0',
  `params` text,
  `attr` text,
  `published` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `ordering`, `position`, `module`, `show_title`, `html`, `params`, `attr`, `published`) VALUES
(44, 3, 'left', 'mod_customer', '1', 0, '', 'id=5&test=true', 1),
(43, 5, 'slideshow', 'mod_slideshow', '0', 0, '_blank', 'otp=0&img_h=590&test=true', 1),
(45, 4, 'online', 'mod_online', '0', 0, '_blank', 'number=bluesky&total_number=0&test=true', 1),
(46, 2, 'support', 'mod_custom', '0', 1, '_blank', 'test=true', 1),
(47, 1, 'footer', 'mod_html', '0', 1, '', 'test=true', 1),
(48, 6, 'bottom_content', 'mod_html', '0', 1, '', 'test=true', 0),
(49, 7, 'Slide_Scrolling', 'mod_bannerscroll', '0', 0, '', 'file_img_l=&link_img_l=&target_ads_l=page_owner&file_img_r=&link_img_r=&target_ads_r=page_owner&test=true', 1),
(50, NULL, 'banner', 'mod_custom', '0', 1, '_blank', 'test=true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules_des`
--

CREATE TABLE IF NOT EXISTS `modules_des` (
  `id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `title` varchar(254) DEFAULT NULL,
  `content` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules_des`
--

INSERT INTO `modules_des` (`id`, `lang_id`, `title`, `content`) VALUES
(45, 2, 'Visitor Statistics', ''),
(45, 1, 'Thống kê truy cập', ''),
(43, 2, 'Hình ảnh trang chủ', ''),
(43, 1, 'Hình ảnh trang chủ', ''),
(44, 1, 'Đối tác', ''),
(44, 2, 'Customer', ''),
(47, 1, 'footer_HTML', '&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	Copyright © 2013 - 2014 &lt;a href=&quot;http://www.maichedanang.com&quot;&gt;Mái hiên&lt;/a&gt; - &lt;a href=&quot;http://www.maichedanang.com&quot;&gt;Mái che&lt;/a&gt; - &lt;a href=&quot;http://www.maichedanang.com&quot;&gt;Nhà bạt&lt;/a&gt;. Phát triển bởi &lt;a href=&quot;http://www.pgh.vn&quot; target=&quot;_blank&quot; title=&quot;pgh.vn&quot;&gt;Công Ty TNHH MTV Phan Gia Huy&lt;/a&gt;&lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	Thông tin và sản phẩm chỉ mang tính tham khảo. Chúng tôi chưa cung cấp dịch vụ trên website này.&lt;/div&gt;\r\n&lt;div class=&quot;bannergroup&quot;&gt;\r\n	&lt;!--&lt;div class=&quot;banneritem&quot;&gt;&lt;div class=&quot;clr&quot;&gt;&lt;/div&gt;--&gt;&lt;/div&gt;\r\n'),
(48, 1, 'bottom_content', '&lt;div id=&quot;ja-contentwrap&quot;&gt;\r\n	&lt;div class=&quot;column&quot; id=&quot;ja-content&quot; style=&quot;width:100%&quot;&gt;\r\n		&lt;div class=&quot;column&quot; id=&quot;ja-current-content&quot; style=&quot;width:100%&quot;&gt;\r\n			&lt;div class=&quot;ja-content-main clearfix&quot;&gt;\r\n				&lt;h1 class=&quot;componentheading&quot;&gt;\r\n					Mái hiên - Mái che - Nhà bạt - Mái vòm - Mái hiên di động&lt;/h1&gt;\r\n				&lt;div class=&quot;blog&quot;&gt;\r\n					&lt;div class=&quot;article_row cols1 clearfix&quot;&gt;\r\n						&lt;div class=&quot;article_column column1&quot;&gt;\r\n							&lt;div class=&quot;contentpaneopen  clearfix&quot;&gt;\r\n								&lt;div class=&quot;article-main&quot;&gt;\r\n									&lt;form action=&quot;#&quot; method=&quot;post&quot;&gt;\r\n										&lt;span class=&quot;content_rating&quot;&gt;Xem kết quả:&lt;img alt=&quot;&quot; height=&quot;12&quot; src=&quot;&quot; title=&quot;&quot; width=&quot;12&quot; /&gt;&lt;img alt=&quot;&quot; height=&quot;12&quot; src=&quot;&quot; title=&quot;&quot; width=&quot;12&quot; /&gt;&lt;img alt=&quot;&quot; height=&quot;12&quot; src=&quot;/plugins/content/onboomvote/rating_starstar.png&quot; title=&quot;&quot; width=&quot;12&quot; /&gt;&lt;img alt=&quot;&quot; height=&quot;12&quot; src=&quot;/plugins/content/onboomvote/rating_starstar.png&quot; title=&quot;&quot; width=&quot;12&quot; /&gt;&lt;img alt=&quot;&quot; height=&quot;12&quot; src=&quot;/plugins/content/onboomvote/rating_starstar.png&quot; title=&quot;&quot; width=&quot;12&quot; /&gt; /  số bình chọn: 30&lt;/span&gt;&lt;br /&gt;\r\n										&lt;span class=&quot;content_vote&quot;&gt;Bình thường&lt;input alt=&quot;vote 1 star&quot; name=&quot;user_rating&quot; type=&quot;radio&quot; value=&quot;1&quot; /&gt;&lt;input alt=&quot;vote 2 star&quot; name=&quot;user_rating&quot; type=&quot;radio&quot; value=&quot;2&quot; /&gt;&lt;input alt=&quot;vote 3 star&quot; name=&quot;user_rating&quot; type=&quot;radio&quot; value=&quot;3&quot; /&gt;&lt;input alt=&quot;vote 4 star&quot; name=&quot;user_rating&quot; type=&quot;radio&quot; value=&quot;4&quot; /&gt;&lt;input alt=&quot;vote 5 star&quot; checked=&quot;checked&quot; name=&quot;user_rating&quot; type=&quot;radio&quot; value=&quot;5&quot; /&gt;Tuyệt vời &lt;input class=&quot;button&quot; name=&quot;submit_vote&quot; type=&quot;submit&quot; value=&quot;Bỏ phiếu&quot; /&gt;&lt;input name=&quot;task&quot; type=&quot;hidden&quot; value=&quot;vote&quot; /&gt;&lt;input name=&quot;option&quot; type=&quot;hidden&quot; value=&quot;com_content&quot; /&gt;&lt;input name=&quot;cid&quot; type=&quot;hidden&quot; value=&quot;62&quot; /&gt;&lt;input name=&quot;url&quot; type=&quot;hidden&quot; value=&quot;http://www.maihien.com/index.php&quot; /&gt;&lt;/span&gt;&lt;/form&gt;\r\n									&lt;div class=&quot;hreview-aggregate&quot; style=&quot;display:none;&quot;&gt;\r\n										&lt;span class=&quot;item&quot;&gt;&lt;span class=&quot;fn&quot;&gt;Giới thiệu&lt;/span&gt;&lt;/span&gt;&lt;span class=&quot;rating&quot;&gt;&lt;span class=&quot;average&quot;&gt;5&lt;/span&gt; .&lt;span class=&quot;best&quot;&gt;5&lt;/span&gt;&lt;/span&gt;.&lt;span class=&quot;count&quot;&gt;30&lt;/span&gt; -.&lt;/div&gt;\r\n									&lt;div class=&quot;article-content&quot;&gt;\r\n										&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n											Mái hiên và mái hiên di động được thiết kế để che nắng cho ban công, tiền sảnh, hiên nhà của bạn luôn râm mát mà vẫn đảm bảo thoáng gió và đón nắng khi cần thiết. Về thiết kế mái che nắng (bạt thả - dùng cho các chung cư) và mái hiên di động cơ bản là giống nhau gồm kết cấu quay, thanh cuộn và chất liệu bạt; mái hiên di động có thêm các tay đỡ để nâng toàn bộ mái lên giúp mái hướng ra phía ngoài.&lt;/div&gt;\r\n									&lt;/div&gt;\r\n								&lt;/div&gt;\r\n							&lt;/div&gt;\r\n						&lt;/div&gt;\r\n					&lt;/div&gt;\r\n				&lt;/div&gt;\r\n			&lt;/div&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	 &lt;/p&gt;\r\n'),
(49, 1, 'Slide_Scrolling', ''),
(46, 1, 'Hỗ trợ trực tuyến', '&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;br /&gt;\r\n	&lt;a href=&quot;ymsgr:SendIM?duongtanden4&quot;&gt;&lt;img src=&quot;http://opi.yahoo.com/online?u=duongtanden4&amp;amp;m=g&amp;amp;t=2&quot; /&gt;&lt;/a&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;span style=&quot;font-family:tahoma,geneva,sans-serif;&quot;&gt;&lt;span style=&quot;font-size:12px;&quot;&gt;&lt;strong style=&quot;color: rgb(0, 0, 205);&quot;&gt;Phone : 0934 971 071&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n'),
(50, 1, 'Banner', '&lt;div class=&quot;post&quot;&gt;\r\n	&lt;h2&gt;\r\n		Welcome to -T--mobile Đà Nẵng_Blackberry Shop&lt;span class=&quot;title-bottom&quot;&gt; &lt;/span&gt;&lt;/h2&gt;\r\n	&lt;p&gt;\r\n		trang web moi&lt;/p&gt;\r\n&lt;/div&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `metakey` varchar(254) DEFAULT NULL,
  `metadesc` varchar(254) DEFAULT NULL,
  `images` varchar(254) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `attr` varchar(500) DEFAULT 'show_intro=1,show_author=1,show_date=1,show_editdate=1,show_print=1,show_email=1,show_comment=1',
  `created_by` int(11) DEFAULT '0',
  `created` int(11) DEFAULT '0',
  `modified` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '1',
  `noibat` tinyint(1) NOT NULL DEFAULT '0',
  `option` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: Noi bat',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `cat_id`, `metakey`, `metadesc`, `images`, `ordering`, `attr`, `created_by`, `created`, `modified`, `hits`, `noibat`, `option`, `published`) VALUES
(181, 2, NULL, NULL, 'huong-dan-mua-hang.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 238, 1378700566, 1419391009, 1, 0, 0, 1),
(182, 2, NULL, NULL, 'chinh-sach-chung.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 238, 1378716975, 1419390962, 1, 0, 0, 1),
(180, 1, NULL, NULL, 'apple-tung-bo-doi-macbook-air-moi.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378399541, 1415161974, 1, 0, 0, 1),
(172, 1, NULL, NULL, 'nhung-bieu-tuong-cua-tien-tai-trong-phong-thuy.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378398860, 1415162142, 1, 0, 0, 1),
(173, 1, NULL, NULL, 'bieu-tuong-ngua-ngo-trong-dieu-khac-da-quy.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378399263, 1415162150, 1, 0, 0, 1),
(174, 1, NULL, NULL, 'cach-bai-tri-tuong-phat-di-lac.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378399296, 1415162172, 1, 0, 0, 1),
(175, 85, NULL, NULL, 've-dep-nao-long-cua-hem-nui-trou-de-fer.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378399335, 1415162169, 1, 0, 0, 1),
(176, 1, NULL, NULL, 'tan-huong-ky-nghi-voi-dich-vu-cao-cap-tai-hongkong.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 238, 1378399396, 1379900204, 1, 0, 0, 1),
(177, 1, NULL, NULL, 'bat-mat-nhung-doi-co-dep-nhu-tranh-ve-o-palouse.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 238, 1378399431, 1379900198, 1, 0, 0, 1),
(178, 85, NULL, NULL, 'paris-hoa-le-tu-moi-goc-nhin.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378399478, 1415162100, 1, 0, 0, 1),
(179, 1, NULL, NULL, 'chiem-nguong-hon-ngoc-quy-langkawi.jpg', NULL, 'show_intro=2&show_author=2&show_date=2&show_editdate=2&show_print=2&show_email=2&show_comment=2&show_other=2', 231, 1378399512, 1415161981, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_channel`
--

CREATE TABLE IF NOT EXISTS `news_channel` (
  `channel_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_des`
--

CREATE TABLE IF NOT EXISTS `news_des` (
  `id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `title` varchar(254) DEFAULT NULL,
  `slug` varchar(254) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `cat_slug` varchar(254) DEFAULT NULL,
  `main_slug` varchar(254) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `introtext` varchar(254) DEFAULT NULL,
  `fulltext` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_des`
--

INSERT INTO `news_des` (`id`, `lang_id`, `title`, `slug`, `cat_id`, `cat_slug`, `main_slug`, `main_id`, `introtext`, `fulltext`) VALUES
(172, 1, 'Những biểu tượng của tiền tài trong phong thủy', 'nhung-bieu-tuong-cua-tien-tai-trong-phong-thuy', 1, 'tu-van-mai-che', 'khuyen-mai', 1, 'Dù là nhà ở hay văn phòng công ty, những biểu tượng phong thủy về tiền tài thường được đặt ở góc tài lộc của căn phòng, nhằm cầu tiền tài, may mắn sẽ đến với gia chủ.', '&lt;div align=&quot;justify&quot; style=&quot;line-height:20px;&quot;&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Góc tài lộc được xác định là góc nằm phía tay trái của bạn, tính từ cửa trước khi ta bước vào. Tại đây, người ta thường đặt những vật phẩm phong thủy – biểu tượng của tiền bạc đó là:&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;1. Chuông gió&lt;/strong&gt;&lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Chuông gió được sử dụng để hút dòng chảy tiền bạc vào nhà. Cách sử dụng hiệu quả nhất với chuông gió là số 9, có thể là 9cm, hoặc 9 sợi dây ruy băng đỏ. Chiếc chuông gió có sức mạnh nhất là những chiếc có 6 thanh và làm bằng kim loại.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: center;&quot;&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Chuông gió được treo ở vị trí tài lộc của ngôi nhà hoặc văn phòng. Cũng đừng quên để tiếng chuông gió được vang lên thường xuyên.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;2. Nước&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Sự di chuyển của nước trong phong thủy nghĩa là sự di chuyển của tiền về phía bạn. Do vậy, hãy đặt một đài phun nước hoặc thác nước trong nhà ở góc tài lộc hoặc đài phun nước ngoài trời ở vị trí gần cửa chính. Tùy theo diện tích, bạn có thể chọn một chiếc đài phun nước nhỏ hay lớn.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;3. Đồng tiền xu Trung Quốc&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Treo những đồng tiền chéo nhau và kết nối chúng bằng một sợi dây màu đỏ, sau đó treo lên các cửa ra vào. Dùng 9 hoặc 6 đồng tiền xu cho cửa chính và những cửa còn lại thì treo số lượng ít hơn. Phong thủy cho rằng, làm như vậy sẽ giúp giữ được năng lượng tiền bạc trong nhà.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Phong thủy cũng cho rằng việc giữ lại tiền dưới mọi hình thức như sổ séc, sổ tiết kiệm, thẻ ngân hàng, vv… trong một chiếc hộp phong thủy có màu tím hoặc màu vàng thật đẹp sẽ giúp bạn giữ được tiền.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Ngoài ra, bạn hãy đặt 9 đồng xu thật sáng bóng tại góc tài lộc, và hãy tưởng tượng rằng “những hạt giống” này đang sinh sôi và phát triển.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Khi nhận tiền lương, trước khi đưa vào sử dụng, bạn nên giữ một lúc ở góc này. Và những đồng tiền lẻ cũng đừng quên giữ trong một chiếc bát màu tím hoặc vàng ở góc thịnh vượng. Nó không chỉ là một ý nghĩa về phong thủy, mà còn là vật trang trí cho góc nhà của bạn nữa.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;4. Ông thần tài&lt;/strong&gt;&lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Ông thần tài được sử dụng nhằm mục đích cầu phước lành cho gia chủ. Vị trí thíc hợp nhất cho tượng Thần tài đó là đối diện với cửa trước. Dù bức tượng lớn hay nhỏ, nó đều có sức mạnh đáng kể đối với tiền tài của gia đình bạn.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;5. Đá quý và đá phong thủy&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Đá quý và đá phong thủy là biểu tượng của giàu sang, phú quý. Bạn nên giữ kim cương hay đồ trang sức bằng đá quý vào một chiếc hộp có màu tím hoặc màu vàng trong góc tài lộc của phòng ngủ. Phía trên chiếc hộp nên đặt chuông gió. Trong phong thủy, điều này có nghĩa là sự sang trọng, giàu có sẽ bị hút vào cuộc sống của bạn.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: center;&quot;&gt;\r\n		&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Thạch anh tím có màu sắc rất đẹp, vừa dùng trang trí, vừa là biểu tượng của phú quý.Nếu tình hình tài chính gia đình bạn không mấy ổn định, hay bạn thường xuyên phải suy nghĩ về nó, hãy đặt những vật nặng như đá tròn hay tượng ở góc tài lộc.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;6. Trái cây, ngũ cốc&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Trái cây và ngũ cốc có ý nghĩa mang lại sự no đủ trong phong thủy. Những bát hoa quả tràn trề, hay cây sai trĩu quả là những vật phẩm phong thủy thường được sử dụng.&lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Người ta thường xếp 9 quả cam hay mận, được đặt trong một chiếc bát màu vàng, hay những chùm nho đỏ, dứa tươi và chuối được xếp đầy trong khay, hoặc cũng có thể treo tranh vụ mùa bội thu, vv… Đây là những biểu tượng phong thủy mang lại sự no đủ về vật chất, bạn nên đặt vào góc tài lộc.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;7. Tre may mắn&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Để tăng sự may mắn, thành công về tiền bạc, hãy đặt 9 thân tre trong chiếc bình màu tím. Chiếc bình này phải có thân to hơn miệng, với ý nghĩa là giữ của.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;8. Ếch may mắn&lt;/strong&gt;&lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Tượng ếch có ý nghĩa thu hút và bảo vệ tiền bạc. Chúng thường được đặt đối diện với cửa trước và nghiêng một góc 45 độ.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: center;&quot;&gt;\r\n		&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;9. Những loại cây lá tròn&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Cây lá tròn giúp tái tạo dòng năng lượng và kích thích phát triển dòng chảy của tiền. Bạn hãy nhớ là luôn giữ cho cây được khỏe mạnh và không được ngập quá nhiều nước. Những cây lá tròn này sẽ được đặt trong chậu màu tím là tốt nhất, và nó còn giúp làm đẹp cho góc tài lộc của nhà bạn đấy.&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		&lt;strong&gt;10. Bể cá cảnh&lt;/strong&gt;&lt;br /&gt;\r\n		 &lt;/div&gt;\r\n	&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n		Cá là biểu tượng sức mạnh của tiền bạc và sự thịnh vượng. Bể cá cảnh đặt ở phía Đông Nam, gần cửa chính, hoặc lối vào khu vực kinh doanh rất tốt lành, bởi nó không chỉ là một biểu tượng phong thủy thu hút tiền bạc mà còn là sự cân bằng của 5 yếu tố cơ bản trong phong thủy: Mộc (cây trong bể cá), Kim (cấu trúc bể cá), Thủy (nước), Hỏa (màu sắc của cá như vàng, đỏ, hoặc chiếu sáng của bể).&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	 &lt;/p&gt;\r\n'),
(173, 1, 'Biểu tượng Ngựa (Ngọ) trong điêu khắc đá quý', 'bieu-tuong-ngua-ngo-trong-dieu-khac-da-quy', 1, 'tu-van-mai-che', 'khuyen-mai', 1, 'Ngựa đồng hành với loài người từ xa xưa, trong các trận chiến, trong nông nghiệp, đi lại hay săn bắn. Ngựa đã giành một chỗ ngồi đặc biệt trong các biểu tượng của sự danh dự, trong tôn giáo, và đại diện cho nhiều đức tính cao quý.', '&lt;p&gt;\r\n	Ở Phương Đông, ngựa gắn với sự thành công, “mã đáo thành công” biểu thị cho được việc khi ra đi và quay trở về với sự thắng lợi; hay “vinh quy bái tổ” khi học trò thi đậu tiến sỹ được vua ban thưởng ngựa để trở về thăm quê.&lt;/p&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Đức Phật cũng được cho là đã rời khỏi trần thế và bay đến cõi Niết Bàn bằng một con ngựa trắng.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Phương Tây, ngựa là chiến lợi phẩm trong các cuộc chiến tranh và biểu tượng cho quyền lực, chiến thắng, thống trị và vinh dự.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Người La Mã coi ngựa là biểu tượng của sự liên tục của cuộc sống, khả năng sinh sản và khả năng tái sinh.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Hindu, Ấn độ giáo, con ngựa trắng được cho là hiện thân cuối cùng của thần Vishnu.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Trong những thời khắc quan trọng, sự xuất hiện của Ngựa trong giấc mơ của con người cũng chỉ cho bạn thấy trước được vấn đề: nếu trong mơ bạn cưỡi một con ngựa, điều đó cho thấy là dự án hay sự kiện của bạn đang ấp ủ sẽ thành công.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Ngựa được chế tác rất đẹp bởi chất liệu đá thạch anh hồng, đá Aventurine, hoặc đá mã não.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Đá quý Tự nhiên nhận chế tác, điêu khắc đá theo yêu cầu của khách hàng những sản phẩm đẹp với nhiều dáng phong phú và sáng tạo.&lt;/div&gt;\r\n'),
(174, 1, 'Cách bài trí tượng Phật Di Lặc', 'cach-bai-tri-tuong-phat-di-lac', 1, 'tu-van-mai-che', 'khuyen-mai', 1, 'Bài trí tượng Phật Di lặc theo những qui tắc phong thuỷ nhất định trong mỗi gia đình đem lại vận may và an lành cho gia đình. ', '&lt;p&gt;\r\n	Bày tượng Phật ở vị trí cao hướng ra cửa chính nhìn của căn nhà. Vị trí này được cho là giúp Phật biến toàn bộ khí vào nhà thành năng lượng tốt.&lt;/p&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Đặt tượng Phật ở cung Đông của ngôi nhà hay phòng khách để tạo sự hài hòa cho cả gia đình và hóa giải mọi rắc rối, cãi cọ.&lt;/div&gt;\r\n&lt;div&gt;\r\n	Bày tượng Phật ở cung Đông Nam của phòng khách, phòng lễ tân hoặc của toàn bộ ngôi nhà để gia tăng vận may tài lộc.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Với những người làm việc trong môi trường cạnh tranh, ví dụ người nắm giữ những vị trí chủ chốt của công ty, các chính trị gia… đặt Phật Di Lặc ở nơi làm việc hoặc tại nhà giúp mang lại may mắn và loại bớt sự thù địch. Hình ảnh của Phật cũng giúp tâm trí minh mẫn và giảm bớt căng thẳng.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	      Ảnh: Tượng Phật Di lặc nằm.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Đặt tượng Phật trong xe ô tô giúp giảm bớt lo âu, tránh tai nạn và mang lại tin vui.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Bày tượng Phật ở bàn làm việc để giảm bớt căng thẳng và tranh cãi với đồng nghiệp, đồng thời giúp bạn hoàn thành công việc tốt hơn.&lt;/div&gt;\r\n&lt;div&gt;\r\n	Học sinh muốn đạt thành tích cao có thể đặt tượng Di Lặc trên bàn học để tăng cảm hứng học tập.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Phật Di Lặc có thể là món quà lý tưởng cho bất cứ dịp vui nào. Với người đang gặp nhiều rủi ro, đây cũng là món quà hết sức ý nghĩa.&lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	 &lt;/div&gt;\r\n&lt;div&gt;\r\n	Chú ý: Không bày tượng Phật trong phòng tắm, nhà bếp, phòng ngủ hay đặt trực tiếp trên sàn nhà.&lt;/div&gt;\r\n'),
(176, 2, 'Tận hưởng kỳ nghỉ với dịch vụ cao cấp tại Hongkong', 'tan-huong-ky-nghi-voi-dich-vu-cao-cap-tai-hongkong', 1, 'news', 'news', 1, 'Mùa du lịch hè 2013, ba đơn vị lữ hành lớn tại Hà Nội là Asia Sun, TransViet Travel và Vietravel hợp tác với hãng Hàng không danh tiếng Cathay Pacific/Dragon Air và đối tác du lịch China Tour Advisor sẽ đem lại cho du khách kỳ nghỉ đáng nhớ với chùm tour', '&lt;p&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Nằm trong chùm tour đặc biệt này là các chương trình du lịch tới 3 thành phố lớn của Trung Quốc là Hongkong, Thâm Quyến, Quảng Châu với các chủ đề vui chơi và ẩm thực. Mở đầu chương trình tour chủ đề “Các công viên danh tiếng” là điểm dừng Thâm Quyến, nơi du khách có cơ hội chiêm ngưỡng mô hình thu nhỏ của 130 kỳ quan khắp năm châu như tháp Eiffel, Kim Tự Tháp Ai Cập, Angkor Wat… trong Công viên Cửa sổ Thế giới và trải nghiệm cảm giác cả thể giới nằm gọn trong tầm mắt. Cách đó không xa là Công viên Trung Hoa Cẩm Tú, thế giới thu nhỏ của nền văn hóa Trung Hoa và Công viên EAST OCT, nơi du khách sẽ được hòa mình vào thế giới thiên nhiên tràn ngập các loài hoa và cây xanh bao phủ trên các ngọn núi xen lẫn những kiến trúc độc đáo theo phong cách Châu Âu và Trung Quốc. Các công viên này đã góp phần làm cho Thâm Quyến trở thành một trong những thành phố du lịch trọng điểm của Trung Quốc, thu hút vô số lượt khách tham quan mỗi năm. &lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Tận hưởng kỳ nghỉ với dịch vụ cao cấp tại Hongkong, Du lịch, &quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-03/1370241718-dan-huong-dich-vu-du-lich-cao-cap.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	Công viên sinh thái OCT East, Thẩm Quyến&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Rời sang Quảng Châu, sau chuyến tham quan Thành phố, du khách sẽ được thưởng thức những màn nhào lộn điêu luyện, những pha biểu diễn “thót tim”, sự xuất hiện “hoành tráng” của các loài động vật biểu diễn dưới sự dẫn dắt của các nghệ sĩ xiếc thú tài ba trên sân khấu… Tất cả hòa quyện trong chương trình biểu diễn kết hợp giữa âm thanh và nghệ thuật ánh sáng hiện đại tại Rạp xiếc với sức chứa hơn 8000 người nằm trong Công viên giải trí cảm giác mạnh lớn nhất Trung Quốc – Chime Long. Kết thúc chương trình là chuyến du ngoạn trong công viên Disneyland – Hongkong,  gặp gỡ các nhân vật quen thuộc của Walt Disney và hoà mình vào thế giới kỳ diệu Tomorrowland, Fantasy land và vùng đất phiêu lưu mạo hiểm Adventureland. Màn trình diễn pháo hoa hoành tráng trên bầu trời đêm tại lâu đài Sleeping Beauty khép lại chương trình tour đặc sắc chủ đề “Các công viên danh tiếng” trong niềm nuối tiếc của du khách.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Du khách yêu mến các món ăn Trung Hoa sẽ được thỏa mãn với chương trình tour đặc sắc “Tinh hoa ẩm thực Trung Hoa” bởi bên cạnh các điểm tham quan và mua sắm, quý khách sẽ được ghé thăm những nhà hàng cao cấp tại địa phương và thưởng thức những món ăn đặc sản nổi tiếng như ngỗng quay béo ngậy, tiệc nướng BBQ thơm phức, lẩu truyền thống Quảng Đông “Poon Choi”… Mỗi món ăn của người Trung Hoa là một chuyến phiêu lưu vị giác, sự cầu kỳ trong cách lựa chọn nguyên liệu, sự cẩn trọng trong quá trình chế biến và sự tinh tế trong việc nêm nếm gia giảm, tất cả được kết hợp hoàn hảo, mang lại cho người dùng những trải nghiệm khó quên.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Tận hưởng kỳ nghỉ với dịch vụ cao cấp tại Hongkong, Du lịch, &quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-03/1370241718-dan-huong-dich-vu-du-lich-cao-cap8.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	Lẩu truyền thống Quảng Đông – Poon Choi&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Đặc biệt, du khách được trải nghiệm bay cùng Hãng hàng không uy tín Cathay Pacific/Dragon Air và được bố trí nghỉ ngơi tại những khách sạn 5 sao sang trọng, tiện nghi, hiện đại hàng đầu nằm trong Trung tâm thành phố hoặc ngay trong công viên Disneyland và Chime Long để thỏa sức tận hưởng những dịch vụ tốt nhất trong suốt hành trình.&lt;/p&gt;\r\n'),
(176, 1, 'Tận hưởng kỳ nghỉ với dịch vụ cao cấp tại Hongkong', 'tan-huong-ky-nghi-voi-dich-vu-cao-cap-tai-hongkong', 1, 'tin-tuc', 'khuyen-mai', 1, 'Mùa du lịch hè 2013, ba đơn vị lữ hành lớn tại Hà Nội là Asia Sun, TransViet Travel và Vietravel hợp tác với hãng Hàng không danh tiếng Cathay Pacific/Dragon Air và đối tác du lịch China Tour Advisor sẽ đem lại cho du khách kỳ nghỉ đáng nhớ với chùm tour', '&lt;p&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Nằm trong chùm tour đặc biệt này là các chương trình du lịch tới 3 thành phố lớn của Trung Quốc là Hongkong, Thâm Quyến, Quảng Châu với các chủ đề vui chơi và ẩm thực. Mở đầu chương trình tour chủ đề “Các công viên danh tiếng” là điểm dừng Thâm Quyến, nơi du khách có cơ hội chiêm ngưỡng mô hình thu nhỏ của 130 kỳ quan khắp năm châu như tháp Eiffel, Kim Tự Tháp Ai Cập, Angkor Wat… trong Công viên Cửa sổ Thế giới và trải nghiệm cảm giác cả thể giới nằm gọn trong tầm mắt. Cách đó không xa là Công viên Trung Hoa Cẩm Tú, thế giới thu nhỏ của nền văn hóa Trung Hoa và Công viên EAST OCT, nơi du khách sẽ được hòa mình vào thế giới thiên nhiên tràn ngập các loài hoa và cây xanh bao phủ trên các ngọn núi xen lẫn những kiến trúc độc đáo theo phong cách Châu Âu và Trung Quốc. Các công viên này đã góp phần làm cho Thâm Quyến trở thành một trong những thành phố du lịch trọng điểm của Trung Quốc, thu hút vô số lượt khách tham quan mỗi năm. &lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Tận hưởng kỳ nghỉ với dịch vụ cao cấp tại Hongkong, Du lịch, &quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-03/1370241718-dan-huong-dich-vu-du-lich-cao-cap.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	Công viên sinh thái OCT East, Thẩm Quyến&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Rời sang Quảng Châu, sau chuyến tham quan Thành phố, du khách sẽ được thưởng thức những màn nhào lộn điêu luyện, những pha biểu diễn “thót tim”, sự xuất hiện “hoành tráng” của các loài động vật biểu diễn dưới sự dẫn dắt của các nghệ sĩ xiếc thú tài ba trên sân khấu… Tất cả hòa quyện trong chương trình biểu diễn kết hợp giữa âm thanh và nghệ thuật ánh sáng hiện đại tại Rạp xiếc với sức chứa hơn 8000 người nằm trong Công viên giải trí cảm giác mạnh lớn nhất Trung Quốc – Chime Long. Kết thúc chương trình là chuyến du ngoạn trong công viên Disneyland – Hongkong,  gặp gỡ các nhân vật quen thuộc của Walt Disney và hoà mình vào thế giới kỳ diệu Tomorrowland, Fantasy land và vùng đất phiêu lưu mạo hiểm Adventureland. Màn trình diễn pháo hoa hoành tráng trên bầu trời đêm tại lâu đài Sleeping Beauty khép lại chương trình tour đặc sắc chủ đề “Các công viên danh tiếng” trong niềm nuối tiếc của du khách.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Du khách yêu mến các món ăn Trung Hoa sẽ được thỏa mãn với chương trình tour đặc sắc “Tinh hoa ẩm thực Trung Hoa” bởi bên cạnh các điểm tham quan và mua sắm, quý khách sẽ được ghé thăm những nhà hàng cao cấp tại địa phương và thưởng thức những món ăn đặc sản nổi tiếng như ngỗng quay béo ngậy, tiệc nướng BBQ thơm phức, lẩu truyền thống Quảng Đông “Poon Choi”… Mỗi món ăn của người Trung Hoa là một chuyến phiêu lưu vị giác, sự cầu kỳ trong cách lựa chọn nguyên liệu, sự cẩn trọng trong quá trình chế biến và sự tinh tế trong việc nêm nếm gia giảm, tất cả được kết hợp hoàn hảo, mang lại cho người dùng những trải nghiệm khó quên.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Tận hưởng kỳ nghỉ với dịch vụ cao cấp tại Hongkong, Du lịch, &quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-03/1370241718-dan-huong-dich-vu-du-lich-cao-cap8.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	Lẩu truyền thống Quảng Đông – Poon Choi&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Đặc biệt, du khách được trải nghiệm bay cùng Hãng hàng không uy tín Cathay Pacific/Dragon Air và được bố trí nghỉ ngơi tại những khách sạn 5 sao sang trọng, tiện nghi, hiện đại hàng đầu nằm trong Trung tâm thành phố hoặc ngay trong công viên Disneyland và Chime Long để thỏa sức tận hưởng những dịch vụ tốt nhất trong suốt hành trình.&lt;/p&gt;\r\n'),
(177, 2, 'Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse', 'bat-mat-nhung-doi-co-dep-nhu-tranh-ve-o-palouse', 1, 'news', 'news', 1, 'Palouse, vùng nông nghiệp nằm ở Tây Bắc nước Mỹ luôn là nguồn cảm hứng cho các nhiếp ảnh gia bởi khung cảnh bắt mắt của những đồi cỏ đẹp như tranh vẽ.', '&lt;div align=&quot;justify&quot; style=&quot;line-height:20px;&quot;&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Nằm ở phía nam Spokane, Palouse là một khu vực nông nghiệp trù phú rộng gần 780.000 ha, chủ yếu sử dụng để sản xuất lúa mì và các loại đậu. Với vẻ đặc trưng là sự xanh tốt của các ngọn đồi cùng không gian thiên nhiên rộng lớn, Palouse đã trở thành điểm đến lý tưởng cho các nhiếp ảnh gia.&lt;/span&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--1-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n		Địa hình khu vực này rất đặc biệt với nhiều ngọn đồi xinh đẹp, những đụn bùn vạn hình phủ đầy cây xanh và tầng đất sâu màu mỡ tạo cho Palouse một khung cảnh tuyệt đẹp như tranh vẽ. Được hình thành từ hàng nghìn năm trước, những đồi cỏ rộng lớn này có nguồn gốc là những đồi cát với các sườn dốc đạt đến độ 50%. Dù có sự cải tạo của con người nhưng những đồi cỏ này vẫn giữ được vẻ đẹp nguyên thủy như khi mới hình thành.&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--2-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n		Hiện nay, phần lớn đồng cỏ Palouse trở thành đất nông nghiệp và thị trấn. Ước tính rằng chỉ còn ít hơn 1% thảm thực vật nguyên thủy của Palouse là tồn tại. Điều này khiến người lo ngại rằng hệ sinh thái nơi này đang dần có nguy cơ biến mất hoàn toàn.&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n		Tuy nhiên, vẻ đẹp của những đồi cỏ nhiều màu sắc ở Palouse vẫn “mê hoặc” biết &lt;a href=&quot;http://www.24h.com.vn/&quot; style=&quot;text-decoration: none; color: rgb(0, 0, 255);&quot;&gt;bao&lt;/a&gt; nhiếp ảnh gia trên thế giới, trong đó có Ryan McGinty và Chris Froelich. Những bức ảnh tuyệt đẹp dưới đây của Palouse đều do 2 nhiếp ảnh gia này thực hiện:&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--3-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--4-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--5-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--6-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--7-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--8-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--9-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--10-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--11-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--12-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--13-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--14-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;ul&gt;\r\n		&lt;li&gt;\r\n			&lt;strong&gt;Nguồn: 24h.com.vn&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;/ul&gt;\r\n&lt;/div&gt;\r\n'),
(177, 1, 'Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse', 'bat-mat-nhung-doi-co-dep-nhu-tranh-ve-o-palouse', 1, 'tin-tuc', 'khuyen-mai', 1, 'Palouse, vùng nông nghiệp nằm ở Tây Bắc nước Mỹ luôn là nguồn cảm hứng cho các nhiếp ảnh gia bởi khung cảnh bắt mắt của những đồi cỏ đẹp như tranh vẽ.', '&lt;div align=&quot;justify&quot; style=&quot;line-height:20px;&quot;&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Nằm ở phía nam Spokane, Palouse là một khu vực nông nghiệp trù phú rộng gần 780.000 ha, chủ yếu sử dụng để sản xuất lúa mì và các loại đậu. Với vẻ đặc trưng là sự xanh tốt của các ngọn đồi cùng không gian thiên nhiên rộng lớn, Palouse đã trở thành điểm đến lý tưởng cho các nhiếp ảnh gia.&lt;/span&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--1-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n		Địa hình khu vực này rất đặc biệt với nhiều ngọn đồi xinh đẹp, những đụn bùn vạn hình phủ đầy cây xanh và tầng đất sâu màu mỡ tạo cho Palouse một khung cảnh tuyệt đẹp như tranh vẽ. Được hình thành từ hàng nghìn năm trước, những đồi cỏ rộng lớn này có nguồn gốc là những đồi cát với các sườn dốc đạt đến độ 50%. Dù có sự cải tạo của con người nhưng những đồi cỏ này vẫn giữ được vẻ đẹp nguyên thủy như khi mới hình thành.&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--2-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n		Hiện nay, phần lớn đồng cỏ Palouse trở thành đất nông nghiệp và thị trấn. Ước tính rằng chỉ còn ít hơn 1% thảm thực vật nguyên thủy của Palouse là tồn tại. Điều này khiến người lo ngại rằng hệ sinh thái nơi này đang dần có nguy cơ biến mất hoàn toàn.&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n		Tuy nhiên, vẻ đẹp của những đồi cỏ nhiều màu sắc ở Palouse vẫn “mê hoặc” biết &lt;a href=&quot;http://www.24h.com.vn/&quot; style=&quot;text-decoration: none; color: rgb(0, 0, 255);&quot;&gt;bao&lt;/a&gt; nhiếp ảnh gia trên thế giới, trong đó có Ryan McGinty và Chris Froelich. Những bức ảnh tuyệt đẹp dưới đây của Palouse đều do 2 nhiếp ảnh gia này thực hiện:&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--3-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--4-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--5-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--6-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397361-nhung-doi-cat-dep-nhu-trong-mo--7-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--8-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--9-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--10-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--11-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--12-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--13-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;img alt=&quot;Bắt mắt những đồi cỏ đẹp như tranh vẽ ở Palouse, Du lịch, doi co, khung canh dep, canh thien nhien, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-05/1370397438-nhung-doi-cat-dep-nhu-trong-mo--14-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n	&lt;ul&gt;\r\n		&lt;li&gt;\r\n			&lt;strong&gt;Nguồn: 24h.com.vn&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;/ul&gt;\r\n&lt;/div&gt;\r\n');
INSERT INTO `news_des` (`id`, `lang_id`, `title`, `slug`, `cat_id`, `cat_slug`, `main_slug`, `main_id`, `introtext`, `fulltext`) VALUES
(179, 1, 'Chiêm ngưỡng “hòn ngọc quý” Langkawi', 'chiem-nguong-hon-ngoc-quy-langkawi', 1, 'tu-van-mai-che', 'khuyen-mai', 1, 'Nằm ở phía Tây Bắc thủ đô Kuala Lumpur của Malaysia, đảo Langkawi được ví như một “hòn ngọc quý” với vẻ đẹp quyến rũ, thu hút khá đông khách du lịch.', '&lt;p&gt;\r\n	&lt;span style=&quot;line-height: 1.6em; font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Đảo Langkawi còn có tên gọi khác là đảo Đại bàng. Cách thủ đô Kuala Lumpur chừng 30km, hòn đảo này không chỉ thu hút khách du lịch bằng những bãi biển đẹp, các khu resort sang trọng, Langkawi còn là một thiên đường mua sắm hấp dẫn với đầy đủ các mặt hàng được miễn thuế.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311658-du-lich-quanh-dap-angkari--1-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Tên gọi Langkawi là kết hợp của hai từ “Lang” và “Kawi”. “Lang” là từ gốc tiếng Malaysia, trong từ Helang, nghĩa là đại bàng. Trong quá khứ, quần đảo này là nơi cư ngụ của vô số những con chim đại bàng và chúng vẫn còn tồn tại đến ngày nay.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311658-du-lich-quanh-dap-angkari--2-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Cũng chính vì điều này đã khiến đảo Langkawi trở thành điểm đến ưa thích của khách du lịch mỗi khi đến với Malaysia. Hình ảnh chim đại bàng đã trở thành biểu tượng cho đảo Langkawi nên bạn sẽ bắt gặp ngay một bức tượng đại bàng khổng lồ ngay khi vừa đặt chân lên “hòn ngọc quý” này.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311658-du-lich-quanh-dap-angkari--3-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Mời các bạn cùng chiêm ngưỡng vẻ đẹp quyến rũ của đảo Langkawi:&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311658-du-lich-quanh-dap-angkari--4-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311658-du-lich-quanh-dap-angkari--6-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311658-du-lich-quanh-dap-angkari--7-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311700-du-lich-quanh-dap-angkari--8-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311700-du-lich-quanh-dap-angkari--9-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311700-du-lich-quanh-dap-angkari--10-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;Chiêm ngưỡng “hòn ngọc quý” Langkawi, Du lịch, hon ngoc quy, bien, dao, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370311700-du-lich-quanh-dap-angkari--11-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n		&lt;strong&gt;Nguồn: 24h.com.vn&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(180, 1, 'Apple tung bộ đôi MacBook Air mới', 'apple-tung-bo-doi-macbook-air-moi', 1, 'tu-van-mai-che', 'khuyen-mai', 1, 'Hai mẫu MacBook Air 11 inch và 13 inch mới được Apple cải thiện khá nhiều về hiệu suất cũng như thời lượng pin sử dụng.', '&lt;p&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Ngay trước giờ WWDC 2013 khai màn, rất ít người cho rằng Apple sẽ tung một phiên bản cập nhật cho dòng máy tính xác tay MacBook Air. Tuy nhiên, cải hai phiên bản mới là MacBook Air 11 inch và 13 inch đã chính thức được Phil Schiller, phó chủ tịch marketing toàn cầu của Apple trình làng.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Về thiết kế, cả hai mẫu &lt;strong&gt;MacBook Air mới&lt;/strong&gt; đều giữ nguyên vẻ ngoài so với “người tiền nhiệm”, tuy nhiên nó vẫn rất bắt mắt và ngang ngửa so với mẫu Ultrabook mới nhất vừa được Sony tung ra là Vaio Pro (mỏng và nhẹ nhất). Cả hai phiên bản 11-inch và 13-inch của MacBook Air vẫn có cùng độ dày, dao động từ 0,11-inch đến 0,68 inch.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center; font-style: italic; color: rgb(0, 0, 255);&quot;&gt;\r\n	MacBook Air mới cải thiện hiệu suất cũng như thời lượng pin&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	MacBook Air mới được trang bị bộ vi xử lý Intel Haswell (thế hệ thứ 4) mới nhất tiết kiệm pin, cho thời gian sử dụng lên đến 1 ngày làm việc. Macbook Air 11 inch sẽ cho thời lượng pin 9 tiếng, phiên bản 13 inch có thể sử dụng lên tới 12 giờ sau một lần sạc, trong khi phiên bản cũ chỉ có thời gian sử dụng là 7 giờ.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Bộ vi xử lý thế hệ thứ 4 này của Intel sẽ song hành cùng với đồ họa HD5000, hứa hẹn cải thiện tốt hiệu suất chơi game so với card HD4000 ra mắt năm ngoái (một phiên bản cũng được cải tiến so với HD3000).&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Cả MacBook Air 11 inch và 13 inch mới đều được trang bị vi xử lý tốc độ 1.3GHz cùng 4GB bộ nhớ RAM. Người dùng có thể tùy chọn để nâng cấp lên 8GB bộ nhớ RAM, 512GB ổ cứng lưu trữ và vi xử lý Core i7 tốc độ 1.7GHz.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center; font-style: italic; color: rgb(0, 0, 255);&quot;&gt;\r\n	Máy cũng có thiết kế siêu mỏng&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Phiên bản mới hỗ trợ bộ thu sóng Wi-Fi 802.11ac, hai thiết bị mạng chuyên dụng hỗ trợ chuẩn Wi-Fi mới gồm router Airport Extreme và thiết bị router kết hợp với ổ cứng backup qua mạng Time Capsule. Cả hai thiết bị này đều mang thiết kế hoàn toàn mới theo hình khối thẳng đứng, thay vì nằm ngang dẹt như hai phiên bản Airport Extreme và Time Capsule trước đó. Hai thiết bị này đều hỗ trợ những chuẩn kết nối mạng mạnh nhất hiện nay như Gigabit LAN 1Gbps, Wi-Fi 802.11a/b/g/n/ac với hai băng tần 2.4GHz và 5GHz tương thích hoàn toàn với các thiết bị của Apple hiện nay.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Hiện tại, cả hai phiên bản &lt;em&gt;MacBook Air 11 inch&lt;/em&gt; và 13 inch đều có sẵn trên các gian hàng của Apple, với mức giá khởi điểm 999 USD cho phiên bản 11 inch sử dụng ổ cứng 128GB và giá 1.199 USD cho ổ cứng 256GB. Trong khi đó giá 1.099 USD cho phiên bản 13,3-inch sử dụng ổ cứng 128GB và 1.299 USD cho phiên bản ổ cứng 255GB.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;br /&gt;\r\n	 &lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: left;&quot;&gt;\r\n	&lt;strong&gt;Nguồn: 24h.com.vn&lt;/strong&gt;&lt;/p&gt;\r\n'),
(181, 1, 'Hướng dẫn mua hàng', 'huong-dan-mua-hang', 2, 'dich-vu', 'dich-vu', 2, '', '&lt;div class=&quot;khung_nd_home&quot;&gt;\r\n	&lt;div class=&quot;khung_chua_noidung&quot;&gt;\r\n		&lt;div class=&quot;noi_dung_xem&quot; style=&quot;padding-top:10px; overflow:hidden; text-align:justify; line-height:17px;&quot;&gt;\r\n			&lt;div style=&quot;text-align: center;&quot;&gt;\r\n				&lt;img alt=&quot;&quot; height=&quot;330&quot; src=&quot;http://dungtuyetstone.com/uploads/shaking_hands.jpg&quot; width=&quot;500&quot; /&gt;&lt;br /&gt;\r\n				 &lt;/div&gt;\r\n			&lt;ul style=&quot;margin: 0px; padding: 0px 0px 0px 30px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px;&quot;&gt;\r\n				&lt;li style=&quot;margin: 0px; padding: 0px;&quot;&gt;\r\n					&lt;span style=&quot;margin: 0px; padding: 0px; font-size: small;&quot;&gt;Hàng đá mỹ nghệ : Dũng Tuyết là nhà phân phối các sản phẩm đá mỹ nghệ tại Việt Nam. Chúng tôi cam kết mang đến cho khách hàng sản phẩm chính hãng với chất lượng số 1 toàn cầu.&lt;/span&gt;&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;br /&gt;\r\n			&lt;ul style=&quot;margin: 0px; padding: 0px 0px 0px 30px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px;&quot;&gt;\r\n				&lt;li style=&quot;margin: 0px; padding: 0px;&quot;&gt;\r\n					&lt;span style=&quot;margin: 0px; padding: 0px; font-size: small;&quot;&gt;Giá tối ưu : sản phẩm khi đến với khách hàng đã được tối ưu về giá thông qua các chương trình khuyến mãi mua hàng, kích cầu mua sắm.&lt;/span&gt;&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;br /&gt;\r\n			&lt;ul style=&quot;margin: 0px; padding: 0px 0px 0px 30px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px;&quot;&gt;\r\n				&lt;li style=&quot;margin: 0px; padding: 0px;&quot;&gt;\r\n					&lt;span style=&quot;margin: 0px; padding: 0px; font-size: small;&quot;&gt;Phong cách phục vụ và tư vấn chuyên nghiệp : đội ngũ nhân viên được huấn luyện theo tiêu chuẩn cao nhất từ hãng Canon sẽ đảm bảo sự hài lòng cho quý khách. Việc chọn mua sản phẩm sẽ được tư vấn tận tình, bảo đảm sự hài lòng trước khi đi đến quyết định mua hàng.&lt;/span&gt;&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;br /&gt;\r\n			&lt;ul style=&quot;margin: 0px; padding: 0px 0px 0px 30px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px;&quot;&gt;\r\n				&lt;li style=&quot;margin: 0px; padding: 0px;&quot;&gt;\r\n					&lt;span style=&quot;margin: 0px; padding: 0px; font-size: small;&quot;&gt;Dịch vụ hậu mãi chu đáo : hệ thống trung tâm dịch vụ bảo hành chuyên nghiệp sẽ góp phần nâng cao chất lượng dịch vụ sau bán hàng,...&lt;/span&gt;&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;br /&gt;\r\n			&lt;ul style=&quot;margin: 0px; padding: 0px 0px 0px 30px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px;&quot;&gt;\r\n				&lt;li style=&quot;margin: 0px; padding: 0px;&quot;&gt;\r\n					&lt;span style=&quot;margin: 0px; padding: 0px; font-size: small;&quot;&gt;Phương thức nhận đơn hàng : chúng tôi chấp nhận đơn đặt hàng qua Website, Email, Tel, Fax và Hotline.&lt;/span&gt;&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;br /&gt;\r\n			&lt;ul style=&quot;margin: 0px; padding: 0px 0px 0px 30px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px;&quot;&gt;\r\n				&lt;li style=&quot;margin: 0px; padding: 0px;&quot;&gt;\r\n					&lt;span style=&quot;margin: 0px; padding: 0px; font-size: small;&quot;&gt;Bộ phận TMĐT sẽ tiến hành xác minh đơn hàng trước khi hình thành giao dịch.&lt;/span&gt;&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	 &lt;/p&gt;\r\n'),
(182, 1, 'Chính sách chung', 'chinh-sach-chung', 2, 'dich-vu', 'dich-vu', 2, 'Chính sách chung', ''),
(175, 1, 'Vẻ đẹp nao lòng của hẻm núi Trou de Fer', 've-dep-nao-long-cua-hem-nui-trou-de-fer', 85, 'ngoai-that-dep', 'bang-gia', 85, 'Trou de Fer là một trong những địa điểm tham quan ngoạn mục nhất thuộc quốc đảo La Réunion (trong Ấn Độ Dương) nằm ở ngoài khơi bờ biển cách phía đông Madagasca 700 km và cách phía tây nam Mauritius 200km.', '&lt;p&gt;\r\n	&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;Trou de Fer là một hẻm núi phủ đầy cây cối có độ sâu khoảng 305m, nằm giữa hai vòng đá hình cung ở trên có con sông Bras de Caverne chảy qua. Hẻm núi được chia thành hai phần riêng biệt, phần miệng lớn của hẻm núi chứa 6 thác nước nổi bật nhất và phần còn lại là khe núi hẹp tạo thành chiều dài cho hẻm núi.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Nước từ thượng nguồn con sông Bras de Caverne chảy xuống vòng cung lớn nhất nằm trên sườn núi qua bức tường của hẻm núi từ độ cao 210m tạo nên những dòng thác ấn tượng. Tùy theo mùa mà lượng nước nhiều hay ít. Vào những tháng mùa khô, nước rất ít và gần như là không có tại các thác nhưng vào mùa xuân, các dòng thác được hồi sinh và người ta đo được chiều cao lớn nhất của một trong sáu ngọn thác vào thời điểm này là 300m. Vượt qua chặng đường khoảng 3,5 km, con sông Bras de Caverne chảy vào 3 ngọn thác ấn tượng nhất ở độ cao 930m và sau đó chảy quanh co dọc theo hẻm núi hẹp cho đến khi hợp lưu với con sông Riviere du Mat chảy vào Ấn Độ Dương.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Kể từ khi được phát hiện vào năm 1989 cho đến nay, Trou de Fer trở là điểm đến ưa thích dành cho những người đam mê môn thể thao mạo hiểm - canyoneering. Đặc biệt ở Pháp, người ta mang môn thể thao vượt thác này đến Trou de Fer, họ sử dụng các kỹ năng như leo trèo bơi lội xuôi theo các dòng thác đổ. Trou de Fer trở thành một cái gì đó đầy thách thức đối với họ.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302690-hem-nui-dep--1-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;&quot;&gt;\r\n	 Hẻm núi Trou de Fer có tên tiếng anh là &quot;Iron Hole&quot;.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Địa hình Trou de Fer được tạo ra từ núi lửa đứt gãy, cho nên việc tiếp cận vào trung tâm hòn đảo Réunion này là rất khó khăn. Chính địa hình trắc trở này đã giúp cho hòn tránh được sự xâm lấn của con người, giúp nó giữ được vẻ hoang sơ vốn có và cả những khu rừng nhiệt đới xung quanh được bảo tồn tốt, làm môi trường sinh sống yên bình cho những loài thực vật như thạch nam khổng lồ, dương xỉ, địa y... Độ cao của rừng so với mực nước biển là tương đối thấp, tuy nhiên nơi đây cũng đã được chuyển đổi thành đất nông nghiệp hay đô thị nhưng lại biến mất sau đó không &lt;a href=&quot;http://www.24h.com.vn/&quot; style=&quot;text-decoration: none; color: rgb(0, 0, 255);&quot;&gt;bao&lt;/a&gt; lâu. Đây là nguyên nhân khiến hơn 30 loài động vật và thực vật mà trong đó có khoảng 2/3 là loài đặc hữu đã bị tuyệt chủng trên hòn đảo này trong vòng 400 năm qua.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302691-hem-nui-dep--2-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	Sự tàn phá rừng và việc hợp nhất những loài không bản địa có tác động nghiêm trọng đến các hệ sinh thái đảo, sự cân bằng đã được tạo ra nhưng lại không có sự tương tác với môi trường bên ngoài. Trên đảo, loài chim cu lười đã bị tuyệt chủng ngay sau khi có sự xuất hiện của những thủy thủ đến từ phương tây. Thay vào đó là những giống loài gia súc, gia cầm mới được họ mang đến hòn đảo này.&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;Vẻ đẹp của Trou de Fer:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;strong&gt;&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302691-hem-nui-dep--3-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;strong&gt;&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302691-hem-nui-dep--4-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;strong&gt;&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302691-hem-nui-dep--5-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;strong&gt;&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302691-hem-nui-dep--6-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n	&lt;strong&gt;&lt;img alt=&quot;Vẻ đẹp nao lòng của hẻm núi Trou de Fer, Du lịch, du lich, hiem nui, dia danh dep, du lich, du lich the gioi, canh dep, phong canh dep, anh thien nhien, anh phong canh, wallpaper, hinh anh dep, bao, tin tuc, hinh dep&quot; class=&quot;news-image&quot; src=&quot;http://img-hcm.24hstatic.com:8008/upload/2-2013/images/2013-06-04/1370302691-hem-nui-dep--7-.jpg&quot; style=&quot;border: 0px;&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n		&lt;strong&gt;Nguồn: 24h.com.vn&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(178, 1, 'Paris hoa lệ từ mọi góc nhìn', 'paris-hoa-le-tu-moi-goc-nhin', 85, 'ngoai-that-dep', 'bang-gia', 85, 'Không cần đến Paris, bạn cũng có thể chiêm ngưỡng những khung cảnh hoa lệ của Thủ đô nước Pháp trong bộ ảnh dưới đây.', '&lt;div align=&quot;justify&quot; style=&quot;line-height:20px;&quot;&gt;\r\n	&lt;div style=&quot;text-align: center;&quot;&gt;\r\n		 &lt;/div&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Toàn cảnh tháp Eiffel - biểu tượng của Thủ đô nước Pháp&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Khung cảnh dưới chân tháp Eiffel&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;br /&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Khải Hoàn Môn - địa danh nổi tiếng ở Paris&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Bảo tàng Louvre với kim tự tháp bằng kính khổng lồ&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;br /&gt;\r\n		&lt;br /&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Nhà thờ Notre Dame&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Khách sạn Montmartre cổ kính&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Một góc Paris hoa lệ&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		 &lt;/p&gt;\r\n	&lt;p style=&quot;font-family: Arial, Helvetica, sans-serif; text-align: center;&quot;&gt;\r\n		&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;em&gt;Paris rực rỡ về đêm&lt;/em&gt;&lt;/span&gt;&lt;br /&gt;\r\n		 &lt;/p&gt;\r\n	&lt;ul&gt;\r\n		&lt;li&gt;\r\n			&lt;strong&gt;Nguồn: 24h.com.vn&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	 &lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news_img`
--

CREATE TABLE IF NOT EXISTS `news_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `path` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(254) DEFAULT NULL,
  `website` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `address` varchar(254) DEFAULT NULL,
  `phone_1` varchar(20) DEFAULT '0',
  `phone_2` varchar(20) DEFAULT '0',
  `fax` varchar(20) DEFAULT '0',
  `note` text,
  `published` tinyint(4) DEFAULT '1',
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `parent_id`, `title`, `website`, `email`, `address`, `phone_1`, `phone_2`, `fax`, `note`, `published`, `ordering`) VALUES
(1, 0, 'Sở Giáo dục và Đào tạo Quảng Nam', 'http://quangnam.edu.vn/', '', '8 Trần Phú - Thành phố Tam Kỳ - tỉnh Quảng Nam', '0510.3811337', '0', '0510.3812247', '', 1, 0),
(2, 1, 'Trung tâm GDTX tỉnh Quảng Nam', '', 'ndtoan57@gmail.com', '124B Trần Quý Cáp, thành phố Tam Kỳ', '0510. 3812087', '0', '0', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `images` varchar(254) DEFAULT NULL,
  `show_price` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `is_new`, `code`, `size`, `images`, `show_price`, `ordering`, `published`) VALUES
(105, 1, 0, NULL, '', 'blackberry-9000.jpg', 1, 0, 1),
(106, 1, 0, NULL, '', 'blackberry-9700.jpg', 1, 0, 1),
(107, 1, 1, NULL, '', 'blackberry-9800.jpg', 1, 0, 1),
(108, 1, 0, NULL, '', 'blackberry-9860.jpg', 1, 0, 1),
(109, 1, 1, NULL, '', 'blackberry-8700.jpg', 1, 0, 1),
(111, 52, 0, NULL, '', 'bao-da-z10.jpg', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_des`
--

CREATE TABLE IF NOT EXISTS `product_des` (
  `id` int(11) DEFAULT NULL,
  `main_id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `slugcat` varchar(254) DEFAULT NULL,
  `title` varchar(254) DEFAULT NULL,
  `slug` varchar(254) DEFAULT NULL,
  `gioithieu` text,
  `price` decimal(11,1) NOT NULL DEFAULT '0.0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_des`
--

INSERT INTO `product_des` (`id`, `main_id`, `lang_id`, `slugcat`, `title`, `slug`, `gioithieu`, `price`) VALUES
(105, 1, 1, 'blackberry', 'Blackberry 9000', 'blackberry-9000', '\r\nBlacbkerry 9000 Đà Nẵng\r\nBlacbkerry 9000\r\nGiá	\r\n899.000Đ\r\nTình Trạng	\r\nCÒN HÀNG\r\nPhụ Kiện	\r\nSạc, Cáp, Màn hình\r\n\r\n\r\nBlacbkerry 8900 Đà Nẵng\r\n\r\nBlacbkerry 8900\r\nGiá	\r\n750.000Đ\r\nTình Trạng	\r\nCÒN HÀNG\r\nPhụ Kiện	\r\nSạc, Cáp, Màn hình\r\n', 1700000.0),
(106, 1, 1, 'blackberry', 'Blackberry 9700', 'blackberry-9700', '', 1900000.0),
(107, 1, 1, 'blackberry', 'Blackberry 9800', 'blackberry-9800', '', 600000.0),
(108, 1, 1, 'blackberry', 'Blackberry 9860', 'blackberry-9860', '', 1900000.0),
(109, 1, 1, 'blackberry', 'Blackberry 8700', 'blackberry-8700', '', 600000.0),
(111, 17, 1, 'phu-kien', 'Bao da Z10', 'bao-da-z10', '', 100000.0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) DEFAULT NULL,
  `key` varchar(254) DEFAULT NULL,
  `value` varchar(254) DEFAULT NULL,
  `group` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `lang_id`, `key`, `value`, `group`) VALUES
(1, 1, 'site_name', NULL, 'setting'),
(2, 1, 'site_email', NULL, 'setting'),
(3, 1, 'site_keyword', NULL, 'setting'),
(4, 1, 'site_des', NULL, 'setting'),
(5, 1, 'site_close', NULL, 'setting'),
(6, 1, 'site_close_message', NULL, 'setting'),
(7, 2, 'site_name', NULL, 'setting'),
(8, 2, 'site_email', NULL, 'setting'),
(9, 2, 'site_keyword', NULL, 'setting'),
(10, 2, 'site_des', NULL, 'setting'),
(11, 2, 'site_close', NULL, 'setting'),
(12, 2, 'site_close_message', NULL, 'setting'),
(13, 1, 'contact_name', NULL, 'contact'),
(14, 1, 'contact_email', NULL, 'contact'),
(15, 1, 'contact_address', NULL, 'contact'),
(16, 1, 'contact_phone', NULL, 'contact'),
(17, 1, 'contact_fax', NULL, 'contact'),
(18, 1, 'contact_hotline', NULL, 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) DEFAULT NULL,
  `path` varchar(254) DEFAULT NULL,
  `link` varchar(254) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `path`, `link`, `ordering`) VALUES
(20, 'slide 03', '03.jpg', '', 3),
(18, 'slide 01', '01.jpg', '', 1),
(21, 'slide 04', '04.jpg', '', 4),
(19, 'slide 02', '02.jpg', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tam`
--

CREATE TABLE IF NOT EXISTS `tam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(254) DEFAULT NULL,
  `session_id` varchar(254) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `thcat`
--

CREATE TABLE IF NOT EXISTS `thcat` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `thcat`
--

INSERT INTO `thcat` (`catid`, `ordering`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `male` tinyint(1) DEFAULT '1' COMMENT '1: Nam, 0: Nu',
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `chungminh` varchar(255) DEFAULT NULL,
  `avatar` varchar(254) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=875 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `group_id`, `city`, `district`, `username`, `password`, `fullname`, `email`, `birthday`, `male`, `phone`, `address`, `chungminh`, `avatar`, `create_time`, `last_login_time`, `published`) VALUES
(238, 18, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@gmail.com', 545241600, 1, '', '', NULL, NULL, NULL, NULL, 1),
(874, 18, NULL, NULL, 'tranvietphu', 'e0e04468dd41a7ab25330b2fb8254f4f', 'tranvietphu', 'vietphutran1995@gmail.com', NULL, 1, '0942255462', 'k408/22 trung nu vuong', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(254) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`) VALUES
(18, 'Quản trị'),
(1, 'Thành viên');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
