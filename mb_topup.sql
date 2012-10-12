-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 05, 2012 at 10:32 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `mb_topup`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `system_account`
-- 

CREATE TABLE `system_account` (
  `sa_id` int(5) NOT NULL auto_increment,
  `sa_sm_id` int(5) NOT NULL,
  `sa_www` varchar(100) collate utf8_unicode_ci NOT NULL,
  `sa_title` varchar(500) collate utf8_unicode_ci NOT NULL,
  `sa_description` mediumtext collate utf8_unicode_ci NOT NULL,
  `sa_search` mediumtext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sa_id`),
  KEY `sa_sm_id` (`sa_sm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

-- 
-- Dumping data for table `system_account`
-- 

INSERT INTO `system_account` VALUES (1, 6, 'vayo', 'vayo', 'vayo', 'vayo, vayo, vayo');
INSERT INTO `system_account` VALUES (2, 7, '11-100003t', '', '', '');
INSERT INTO `system_account` VALUES (3, 8, '11-100004t', '', '', '');
INSERT INTO `system_account` VALUES (4, 9, '11-100005t', '', '', '');
INSERT INTO `system_account` VALUES (5, 10, '11-100006t', '', '', '');
INSERT INTO `system_account` VALUES (6, 11, '11-100007t', '', '', '');
INSERT INTO `system_account` VALUES (7, 12, '11-100008t', '', '', '');
INSERT INTO `system_account` VALUES (8, 13, '11-100009t', '', '', '');
INSERT INTO `system_account` VALUES (9, 14, '11-100010t', '', '', '');
INSERT INTO `system_account` VALUES (10, 15, '11-100011t', '', '', '');
INSERT INTO `system_account` VALUES (11, 16, '11-100012t', '', '', '');
INSERT INTO `system_account` VALUES (12, 17, '11-100013t', '', '', '');
INSERT INTO `system_account` VALUES (13, 18, '11-100014', '', '', '');
INSERT INTO `system_account` VALUES (14, 19, '11-100015', '', '', '');
INSERT INTO `system_account` VALUES (15, 20, '11-100016', '', '', '');
INSERT INTO `system_account` VALUES (16, 21, '12-100017', '', '', '');
INSERT INTO `system_account` VALUES (17, 22, '12-100018', '', '', '');
INSERT INTO `system_account` VALUES (18, 23, '12-100019', '', '', '');
INSERT INTO `system_account` VALUES (19, 24, '12-100020', '', '', '');
INSERT INTO `system_account` VALUES (20, 25, '12-100021', '', '', '');
INSERT INTO `system_account` VALUES (21, 26, '12-100022', '', '', '');
INSERT INTO `system_account` VALUES (22, 27, '12-100023', '', '', '');
INSERT INTO `system_account` VALUES (23, 28, '12-100024', '', '', '');
INSERT INTO `system_account` VALUES (24, 29, '12-100025', '', '', '');
INSERT INTO `system_account` VALUES (25, 30, '12-100026', '', '', '');
INSERT INTO `system_account` VALUES (26, 31, '12-100023', '', '', '');
INSERT INTO `system_account` VALUES (27, 32, '12-100024', '', '', '');
INSERT INTO `system_account` VALUES (28, 33, '12-100025', '', '', '');
INSERT INTO `system_account` VALUES (29, 34, '12-100026', '', '', '');
INSERT INTO `system_account` VALUES (30, 35, '12-100017', '', '', '');
INSERT INTO `system_account` VALUES (31, 36, '12-100018', '', '', '');
INSERT INTO `system_account` VALUES (32, 37, '12-100019', '', '', '');
INSERT INTO `system_account` VALUES (33, 38, '12-100020', '', '', '');
INSERT INTO `system_account` VALUES (34, 39, '12-100021', '', '', '');
INSERT INTO `system_account` VALUES (35, 40, '12-100022', '', '', '');
INSERT INTO `system_account` VALUES (36, 41, '12-100023', '', '', '');
INSERT INTO `system_account` VALUES (37, 42, '12-100024', '', '', '');
INSERT INTO `system_account` VALUES (38, 43, '12-100025', '', '', '');
INSERT INTO `system_account` VALUES (39, 44, '12-100026', '', '', '');
INSERT INTO `system_account` VALUES (40, 45, '12-100027', '', '', '');
INSERT INTO `system_account` VALUES (41, 46, '12-100028', '', '', '');
INSERT INTO `system_account` VALUES (42, 47, '12-100029', '', '', '');
INSERT INTO `system_account` VALUES (43, 48, '12-100030', '', '', '');
INSERT INTO `system_account` VALUES (44, 49, '12-100031', '', '', '');
INSERT INTO `system_account` VALUES (45, 50, '12-100032', '', '', '');
INSERT INTO `system_account` VALUES (46, 51, '12-100033', '', '', '');
INSERT INTO `system_account` VALUES (47, 52, '12-100034', '', '', '');
INSERT INTO `system_account` VALUES (48, 53, '12-100035', '', '', '');
INSERT INTO `system_account` VALUES (49, 54, '12-100036', '', '', '');
INSERT INTO `system_account` VALUES (50, 55, '12-100037', '', '', '');
INSERT INTO `system_account` VALUES (51, 56, '12-100038', '', '', '');
INSERT INTO `system_account` VALUES (52, 57, '12-100039', '', '', '');
INSERT INTO `system_account` VALUES (53, 58, '12-100040', '', '', '');
INSERT INTO `system_account` VALUES (54, 59, '12-100041', '', '', '');
INSERT INTO `system_account` VALUES (55, 60, '12-100042', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_allsale`
-- 

CREATE TABLE `system_allsale` (
  `sal_id` int(4) NOT NULL auto_increment,
  `sal_date` date NOT NULL,
  `sal_mcut` int(6) NOT NULL,
  `sal_pcut` int(11) NOT NULL,
  `sal_point` int(11) NOT NULL,
  `sal_per` int(11) NOT NULL,
  PRIMARY KEY  (`sal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `system_allsale`
-- 

INSERT INTO `system_allsale` VALUES (1, '2012-05-17', 5, 1986, 550000, 15278);
INSERT INTO `system_allsale` VALUES (2, '2012-05-17', 5, 130, 36000, 1000);
INSERT INTO `system_allsale` VALUES (3, '2012-05-17', 5, 743, 200000, 5714);
INSERT INTO `system_allsale` VALUES (4, '2012-05-17', 5, 743, 200000, 5714);
INSERT INTO `system_allsale` VALUES (5, '2012-05-17', 5, 743, 200000, 5714);
INSERT INTO `system_allsale` VALUES (6, '2012-08-14', 5, 4, 1000, 28);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_allsale_list`
-- 

CREATE TABLE `system_allsale_list` (
  `sas_id` int(11) NOT NULL auto_increment,
  `sal_id` int(4) NOT NULL,
  `sm_id` int(7) NOT NULL,
  `sas_point` int(11) NOT NULL,
  `sas_date` date NOT NULL,
  `sas_per` varchar(3) NOT NULL,
  PRIMARY KEY  (`sas_id`),
  KEY `sal_id` (`sal_id`,`sm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `system_allsale_list`
-- 

INSERT INTO `system_allsale_list` VALUES (1, 1, 6, 764, '2012-05-17', '5%');
INSERT INTO `system_allsale_list` VALUES (2, 1, 8, 306, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (3, 1, 15, 306, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (4, 1, 16, 306, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (5, 1, 45, 306, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (6, 2, 6, 50, '2012-05-17', '5%');
INSERT INTO `system_allsale_list` VALUES (7, 2, 8, 20, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (8, 2, 15, 20, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (9, 2, 16, 20, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (10, 2, 45, 20, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (11, 3, 6, 286, '2012-05-17', '5%');
INSERT INTO `system_allsale_list` VALUES (12, 3, 8, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (13, 3, 15, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (14, 3, 16, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (15, 3, 45, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (16, 4, 6, 286, '2012-05-17', '5%');
INSERT INTO `system_allsale_list` VALUES (17, 4, 8, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (18, 4, 15, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (19, 4, 16, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (20, 4, 45, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (21, 5, 6, 286, '2012-05-17', '5%');
INSERT INTO `system_allsale_list` VALUES (22, 5, 8, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (23, 5, 15, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (24, 5, 16, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (25, 5, 45, 114, '2012-05-17', '2%');
INSERT INTO `system_allsale_list` VALUES (26, 6, 6, 1, '2012-08-14', '5%');
INSERT INTO `system_allsale_list` VALUES (27, 6, 8, 1, '2012-08-14', '2%');
INSERT INTO `system_allsale_list` VALUES (28, 6, 15, 1, '2012-08-14', '2%');
INSERT INTO `system_allsale_list` VALUES (29, 6, 16, 1, '2012-08-14', '2%');
INSERT INTO `system_allsale_list` VALUES (30, 6, 45, 1, '2012-08-14', '2%');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_bill`
-- 

CREATE TABLE `system_bill` (
  `sbl_id` int(3) NOT NULL auto_increment,
  `sbl_date` date NOT NULL,
  `sbl_pv` int(7) NOT NULL,
  `sbl_mb` int(7) NOT NULL,
  PRIMARY KEY  (`sbl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `system_bill`
-- 

INSERT INTO `system_bill` VALUES (4, '2012-05-08', 123683, 7);
INSERT INTO `system_bill` VALUES (5, '2012-05-09', 5500, 1);
INSERT INTO `system_bill` VALUES (6, '2012-05-15', 21619, 5);
INSERT INTO `system_bill` VALUES (7, '2012-05-17', 0, 0);
INSERT INTO `system_bill` VALUES (8, '2012-05-28', 212332, 6);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_bill_list`
-- 

CREATE TABLE `system_bill_list` (
  `stl_id` int(11) NOT NULL auto_increment,
  `sbl_id` int(3) NOT NULL,
  `sli_sr_reply` int(7) NOT NULL,
  `stl_pv` int(7) NOT NULL,
  `stl_date` date NOT NULL,
  PRIMARY KEY  (`stl_id`),
  KEY `sbl_id` (`sbl_id`,`sli_sr_reply`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- 
-- Dumping data for table `system_bill_list`
-- 

INSERT INTO `system_bill_list` VALUES (14, 4, 6, 65047, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (15, 4, 8, 8136, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (16, 4, 9, 746, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (17, 4, 12, 715, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (18, 4, 13, 1048, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (19, 4, 15, 8435, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (20, 4, 35, 39556, '2012-05-08');
INSERT INTO `system_bill_list` VALUES (21, 5, 6, 5500, '2012-05-09');
INSERT INTO `system_bill_list` VALUES (22, 6, 6, 3781, '2012-05-15');
INSERT INTO `system_bill_list` VALUES (23, 6, 9, 1449, '2012-05-15');
INSERT INTO `system_bill_list` VALUES (24, 6, 7, 7968, '2012-05-15');
INSERT INTO `system_bill_list` VALUES (25, 6, 15, 500, '2012-05-15');
INSERT INTO `system_bill_list` VALUES (26, 6, 16, 7921, '2012-05-15');
INSERT INTO `system_bill_list` VALUES (27, 8, 6, 83435, '2012-05-28');
INSERT INTO `system_bill_list` VALUES (28, 8, 8, 31948, '2012-05-28');
INSERT INTO `system_bill_list` VALUES (29, 8, 15, 31483, '2012-05-28');
INSERT INTO `system_bill_list` VALUES (30, 8, 16, 31483, '2012-05-28');
INSERT INTO `system_bill_list` VALUES (31, 8, 18, 3500, '2012-05-28');
INSERT INTO `system_bill_list` VALUES (32, 8, 45, 30483, '2012-05-28');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_category`
-- 

CREATE TABLE `system_category` (
  `sc_id` tinyint(4) NOT NULL auto_increment,
  `sc_code` varchar(10) collate utf8_unicode_ci NOT NULL,
  `sc_name` varchar(300) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `system_category`
-- 

INSERT INTO `system_category` VALUES (1, 'a001', 'คอมพิวเตอร์');
INSERT INTO `system_category` VALUES (2, 'a002', 'เครื่องประดับ');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_contact`
-- 

CREATE TABLE `system_contact` (
  `sct_id` int(11) NOT NULL auto_increment,
  `sct_sm_id` int(5) NOT NULL,
  `sct_subject` varchar(300) collate utf8_unicode_ci NOT NULL,
  `sct_message` mediumtext collate utf8_unicode_ci NOT NULL,
  `sct_date` datetime NOT NULL,
  `sct_submit` tinyint(1) NOT NULL,
  PRIMARY KEY  (`sct_id`),
  KEY `sct_sm_id` (`sct_sm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `system_contact`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `system_district`
-- 

CREATE TABLE `system_district` (
  `sd_id` int(4) NOT NULL auto_increment,
  `sd_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

-- 
-- Dumping data for table `system_district`
-- 

INSERT INTO `system_district` VALUES (2, 'กรุงเทพมหานคร');
INSERT INTO `system_district` VALUES (3, 'กระบี่');
INSERT INTO `system_district` VALUES (4, 'กาญจนบุรี');
INSERT INTO `system_district` VALUES (5, 'กาฬสินธุ์');
INSERT INTO `system_district` VALUES (6, 'กำแพงเพชร');
INSERT INTO `system_district` VALUES (7, 'ขอนแก่น');
INSERT INTO `system_district` VALUES (8, 'จันทบุรี');
INSERT INTO `system_district` VALUES (9, 'ฉะเชิงเทรา');
INSERT INTO `system_district` VALUES (10, 'ชลบุรี');
INSERT INTO `system_district` VALUES (11, 'ชัยนาท');
INSERT INTO `system_district` VALUES (12, 'ชัยภูมิ');
INSERT INTO `system_district` VALUES (13, 'ชุมพร');
INSERT INTO `system_district` VALUES (14, 'เชียงราย ');
INSERT INTO `system_district` VALUES (15, 'เชียงใหม่');
INSERT INTO `system_district` VALUES (16, 'ตรัง');
INSERT INTO `system_district` VALUES (17, 'ตราด');
INSERT INTO `system_district` VALUES (18, 'ตาก');
INSERT INTO `system_district` VALUES (19, 'นครนายก');
INSERT INTO `system_district` VALUES (20, 'นครปฐม');
INSERT INTO `system_district` VALUES (21, 'นครพนม');
INSERT INTO `system_district` VALUES (22, 'นครราชสีมา');
INSERT INTO `system_district` VALUES (23, 'นครศรีธรรมราช');
INSERT INTO `system_district` VALUES (24, 'นครสวรรค์');
INSERT INTO `system_district` VALUES (25, 'นนทบุรี');
INSERT INTO `system_district` VALUES (26, 'นราธิวาส ');
INSERT INTO `system_district` VALUES (27, 'น่าน');
INSERT INTO `system_district` VALUES (28, 'บุรีรัมย์');
INSERT INTO `system_district` VALUES (29, 'ปทุมธานี');
INSERT INTO `system_district` VALUES (30, 'ประจวบคีรีขันธ์');
INSERT INTO `system_district` VALUES (31, 'ปราจีนบุรี');
INSERT INTO `system_district` VALUES (32, 'ปัตตานี');
INSERT INTO `system_district` VALUES (33, 'พระนครศรีอยุธยา');
INSERT INTO `system_district` VALUES (34, 'พะเยา');
INSERT INTO `system_district` VALUES (35, 'พังงา');
INSERT INTO `system_district` VALUES (36, 'พัทลุง');
INSERT INTO `system_district` VALUES (37, 'พิจิตร');
INSERT INTO `system_district` VALUES (38, 'พิษณุโลก');
INSERT INTO `system_district` VALUES (39, 'เพชรบุรี');
INSERT INTO `system_district` VALUES (40, 'เพชรบูรณ์');
INSERT INTO `system_district` VALUES (41, 'แพร่');
INSERT INTO `system_district` VALUES (42, 'ภูเก็ต');
INSERT INTO `system_district` VALUES (43, 'มหาสารคาม');
INSERT INTO `system_district` VALUES (44, 'มุกดาหาร');
INSERT INTO `system_district` VALUES (45, 'แม่ฮ่องสอน');
INSERT INTO `system_district` VALUES (46, 'ยโสธร');
INSERT INTO `system_district` VALUES (47, 'ยะลา');
INSERT INTO `system_district` VALUES (48, 'ร้อยเอ็ด');
INSERT INTO `system_district` VALUES (49, 'ระนอง');
INSERT INTO `system_district` VALUES (50, 'ระยอง');
INSERT INTO `system_district` VALUES (51, 'ราชบุรี');
INSERT INTO `system_district` VALUES (52, 'ลพบุรี');
INSERT INTO `system_district` VALUES (53, 'ลำปาง');
INSERT INTO `system_district` VALUES (54, 'ลำพูน');
INSERT INTO `system_district` VALUES (55, 'เลย');
INSERT INTO `system_district` VALUES (56, 'ศรีสะเกษ');
INSERT INTO `system_district` VALUES (57, 'สกลนคร');
INSERT INTO `system_district` VALUES (58, 'สงขลา');
INSERT INTO `system_district` VALUES (59, 'สตูล');
INSERT INTO `system_district` VALUES (60, 'สมุทรปราการ');
INSERT INTO `system_district` VALUES (61, 'สมุทรสงคราม');
INSERT INTO `system_district` VALUES (62, 'สมุทรสาคร');
INSERT INTO `system_district` VALUES (63, 'สระแก้ว');
INSERT INTO `system_district` VALUES (64, 'สระบุรี');
INSERT INTO `system_district` VALUES (65, 'สิงห์บุรี');
INSERT INTO `system_district` VALUES (66, 'สุโขทัย');
INSERT INTO `system_district` VALUES (67, 'สุพรรณบุรี');
INSERT INTO `system_district` VALUES (68, 'สุราษฎร์ธานี');
INSERT INTO `system_district` VALUES (69, 'สุรินทร์');
INSERT INTO `system_district` VALUES (70, 'หนองคาย');
INSERT INTO `system_district` VALUES (71, 'หนองบัวลำภู');
INSERT INTO `system_district` VALUES (72, 'อ่างทอง');
INSERT INTO `system_district` VALUES (73, 'อำนาจเจริญ');
INSERT INTO `system_district` VALUES (74, 'อุดรธานี');
INSERT INTO `system_district` VALUES (75, 'อุตรดิตถ์');
INSERT INTO `system_district` VALUES (76, 'อุทัยธานี');
INSERT INTO `system_district` VALUES (77, 'อุบลราชธานี');
INSERT INTO `system_district` VALUES (78, 'บึงกาฬ');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_liner`
-- 

CREATE TABLE `system_liner` (
  `sli_id` int(7) NOT NULL auto_increment,
  `sli_sr_target` int(7) NOT NULL,
  `sli_sr_reply` int(7) NOT NULL,
  `sli_sr_direct` int(7) NOT NULL,
  `sli_level` tinyint(2) NOT NULL,
  `sli_vip` tinyint(1) NOT NULL,
  `sli_upd` date NOT NULL,
  `sli_renew` datetime NOT NULL,
  `sli_expire` datetime NOT NULL,
  `sli_plane` tinyint(2) NOT NULL,
  `sli_svip` tinyint(1) NOT NULL,
  PRIMARY KEY  (`sli_id`),
  KEY `sli_sr_target` (`sli_sr_target`,`sli_sr_reply`,`sli_sr_direct`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

-- 
-- Dumping data for table `system_liner`
-- 

INSERT INTO `system_liner` VALUES (1, 1, 6, 1, 1, 1, '2011-11-07', '2012-05-17 16:48:27', '2015-12-09 16:48:27', 1, 0);
INSERT INTO `system_liner` VALUES (2, 6, 8, 6, 1, 1, '2011-11-07', '2011-11-11 15:06:51', '2012-07-06 15:06:51', 1, 0);
INSERT INTO `system_liner` VALUES (3, 8, 9, 8, 0, 1, '2011-11-07', '2011-11-11 15:12:57', '2012-10-12 15:12:57', 3, 0);
INSERT INTO `system_liner` VALUES (4, 9, 10, 6, 1, 1, '2011-11-07', '2012-05-15 12:52:48', '2012-05-16 12:52:48', 0, 0);
INSERT INTO `system_liner` VALUES (5, 10, 11, 0, 1, 1, '2011-11-07', '2012-05-15 18:19:18', '2012-05-17 18:19:18', 1, 0);
INSERT INTO `system_liner` VALUES (6, 11, 12, 8, 1, 1, '2011-11-07', '2012-05-07 16:53:01', '2012-06-07 16:53:01', 1, 0);
INSERT INTO `system_liner` VALUES (7, 12, 13, 11, 0, 1, '2011-11-07', '2011-11-12 10:44:59', '2013-04-09 10:44:59', 3, 0);
INSERT INTO `system_liner` VALUES (8, 6, 7, 6, 1, 1, '2011-11-07', '2012-05-18 15:43:02', '2012-06-18 15:43:02', 1, 1);
INSERT INTO `system_liner` VALUES (9, 7, 14, 7, 1, 1, '2011-11-07', '2012-05-15 12:51:06', '2012-06-15 12:51:06', 1, 0);
INSERT INTO `system_liner` VALUES (10, 6, 15, 6, 1, 1, '2011-11-09', '2011-11-11 17:36:49', '2012-06-09 17:36:49', 6, 0);
INSERT INTO `system_liner` VALUES (11, 6, 16, 6, 1, 1, '2011-11-12', '2012-05-15 18:19:33', '2012-05-17 18:19:33', 1, 0);
INSERT INTO `system_liner` VALUES (14, 7, 17, 6, 0, 1, '2011-11-22', '2012-05-15 12:52:00', '2012-05-16 12:52:00', 0, 0);
INSERT INTO `system_liner` VALUES (15, 7, 18, 6, 0, 1, '2011-11-22', '2012-05-15 12:51:52', '2012-05-16 12:51:52', 0, 0);
INSERT INTO `system_liner` VALUES (16, 7, 19, 6, 0, 0, '2011-11-22', '2012-05-15 12:51:37', '2012-05-16 12:51:37', 0, 0);
INSERT INTO `system_liner` VALUES (18, 14, 35, 6, 0, 1, '2012-01-31', '2012-05-17 17:03:17', '2013-12-03 17:03:17', 1, 0);
INSERT INTO `system_liner` VALUES (19, 8, 46, 1, 0, 1, '2012-05-09', '2012-05-09 18:22:35', '2012-06-09 18:22:35', 0, 0);
INSERT INTO `system_liner` VALUES (20, 6, 45, 6, 0, 1, '2012-05-09', '2012-05-09 18:48:44', '2012-06-09 18:48:44', 0, 0);
INSERT INTO `system_liner` VALUES (21, 45, 40, 45, 0, 1, '2012-05-15', '2012-05-15 12:46:15', '2012-06-15 12:46:15', 0, 0);
INSERT INTO `system_liner` VALUES (22, 45, 20, 45, 0, 1, '2012-05-15', '2012-05-15 12:46:37', '2012-06-15 12:46:37', 0, 0);
INSERT INTO `system_liner` VALUES (23, 45, 36, 45, 1, 1, '2012-05-15', '2012-05-15 12:47:04', '2012-06-15 12:47:04', 0, 1);
INSERT INTO `system_liner` VALUES (24, 45, 37, 45, 0, 1, '2012-05-15', '2012-05-15 12:47:20', '2012-06-15 12:47:20', 0, 1);
INSERT INTO `system_liner` VALUES (25, 16, 43, 16, 0, 1, '2012-05-15', '2012-05-15 12:53:58', '2012-06-15 12:53:58', 0, 1);
INSERT INTO `system_liner` VALUES (26, 16, 42, 16, 0, 1, '2012-05-15', '2012-05-15 12:54:10', '2012-06-15 12:54:10', 0, 1);
INSERT INTO `system_liner` VALUES (27, 16, 39, 16, 0, 1, '2012-05-15', '2012-05-15 12:54:25', '2012-06-15 12:54:25', 0, 1);
INSERT INTO `system_liner` VALUES (28, 16, 44, 16, 0, 1, '2012-05-15', '2012-05-15 12:54:42', '2012-06-15 12:54:42', 0, 1);
INSERT INTO `system_liner` VALUES (29, 8, 41, 8, 0, 1, '2012-05-15', '2012-05-15 12:55:08', '2012-06-15 12:55:08', 0, 1);
INSERT INTO `system_liner` VALUES (30, 8, 38, 8, 0, 1, '2012-05-15', '2012-05-15 12:55:18', '2012-06-15 12:55:18', 0, 1);
INSERT INTO `system_liner` VALUES (31, 7, 59, 7, 0, 1, '2012-05-15', '2012-05-15 14:08:03', '2012-06-15 14:08:04', 0, 1);
INSERT INTO `system_liner` VALUES (32, 8, 50, 8, 0, 1, '2012-05-15', '2012-05-15 14:08:26', '2012-06-15 14:08:26', 0, 1);
INSERT INTO `system_liner` VALUES (33, 15, 52, 15, 0, 1, '2012-05-15', '2012-05-15 14:08:51', '2012-06-15 14:08:51', 0, 1);
INSERT INTO `system_liner` VALUES (34, 15, 57, 15, 0, 1, '2012-05-15', '2012-05-15 14:09:03', '2012-06-15 14:09:03', 0, 1);
INSERT INTO `system_liner` VALUES (35, 15, 48, 15, 0, 1, '2012-05-15', '2012-05-15 14:09:12', '2012-06-15 14:09:12', 0, 0);
INSERT INTO `system_liner` VALUES (36, 15, 55, 15, 0, 1, '2012-05-15', '2012-05-15 14:09:22', '2012-06-15 14:09:22', 0, 0);
INSERT INTO `system_liner` VALUES (37, 15, 51, 15, 0, 1, '2012-05-15', '2012-05-15 14:09:31', '2012-06-15 14:09:31', 0, 0);
INSERT INTO `system_liner` VALUES (38, 16, 53, 16, 0, 1, '2012-05-15', '2012-05-15 14:09:54', '2012-06-15 14:09:54', 0, 0);
INSERT INTO `system_liner` VALUES (39, 45, 58, 45, 0, 1, '2012-05-15', '2012-05-15 14:10:18', '2012-06-15 14:10:18', 0, 1);
INSERT INTO `system_liner` VALUES (40, 14, 49, 1, 0, 1, '2012-05-17', '2012-05-17 15:33:02', '2012-06-17 15:33:02', 0, 0);
INSERT INTO `system_liner` VALUES (41, 14, 60, 1, 0, 1, '2012-08-15', '2012-08-15 12:00:26', '2012-09-15 12:00:26', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_member`
-- 

CREATE TABLE `system_member` (
  `sm_id` int(5) NOT NULL auto_increment,
  `sm_code` varchar(10) collate utf8_unicode_ci NOT NULL,
  `sm_email` varchar(150) collate utf8_unicode_ci NOT NULL,
  `sm_pass` varchar(30) collate utf8_unicode_ci NOT NULL,
  `sm_name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `sm_sex` varchar(5) collate utf8_unicode_ci NOT NULL,
  `sm_pid` varchar(13) collate utf8_unicode_ci NOT NULL,
  `sm_addr` varchar(255) collate utf8_unicode_ci NOT NULL,
  `sm_district` int(4) NOT NULL,
  `sm_postcode` varchar(5) collate utf8_unicode_ci NOT NULL,
  `sm_mtel` varchar(10) collate utf8_unicode_ci NOT NULL,
  `sm_htel` varchar(9) collate utf8_unicode_ci NOT NULL,
  `sm_bank_acc` varchar(255) collate utf8_unicode_ci default NULL,
  `sm_bank_name` varchar(100) collate utf8_unicode_ci default NULL,
  `sm_bank_id` varchar(100) collate utf8_unicode_ci default NULL,
  `sm_bank_type` varchar(100) collate utf8_unicode_ci default NULL,
  `sm_bank_area` varchar(100) collate utf8_unicode_ci default NULL,
  `sm_date_regist` date NOT NULL,
  `sm_date_start` datetime default NULL,
  `sm_date_end` datetime default NULL,
  `sm_level` tinyint(1) NOT NULL,
  `sm_user` varchar(30) collate utf8_unicode_ci NOT NULL,
  `sm_pic` varchar(300) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sm_id`),
  KEY `sm_district` (`sm_district`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

-- 
-- Dumping data for table `system_member`
-- 

INSERT INTO `system_member` VALUES (1, '11-100001t', 'admin', '1234', 'Administrator', '', '', 'กรุงเทพ แถว ๆ ปทุมวัน', 38, '', '0809999999', '053999999', NULL, NULL, NULL, NULL, NULL, '2011-10-20', NULL, NULL, 9, 'admin', '');
INSERT INTO `system_member` VALUES (7, '11-100003t', 'test1@mail.com', '1234', 'นุสรา แก้ววังตา', 'ชาย', '1574400234768', '33/109 ต.ป่าแฝก อ.เมือง', 11, '32100', '0809999999', '053999999', 'นุสรา แก้ววังตา', 'กรุงเทพ', '11234566112', 'ออมทรัพย์', 'หนองจอก', '2011-10-24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'test01', '');
INSERT INTO `system_member` VALUES (6, '11-100002t', 'test@mail.com', '123456', 'แก้ว คำปัน', 'ชาย', '1501100112577', '123/7 ต.ป่าแง้ว อ.ท่าวังตาล', 18, '20199', '0801111223', '053999933', 'นายแก้ว กันธา', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'หนองจอก', '2011-10-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'test', 'Desert.jpg');
INSERT INTO `system_member` VALUES (8, '11-100004t', 'test2@mail.com', 'STHALKCMBI', 'โมฮัมหมัด โจโฉ', 'ชาย', '1501100112558', 'a', 3, '10000', '0801111111', '053999999', 'โมฮัมหมัด โจ', 'ไทยพาณิชญ์', '12345678', 'ออมทรัพย์', 'เจริญชัย', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (9, '11-100005t', 'test3@mail.com', 'JWHFUNBSLG', 'ป้าแก้ว ใจดี', 'ชาย', '1501100112577', '', 8, ' ', '0809999999', '', 'ป้าแก้ว ใจดี', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'หนองจอก', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (10, '11-100006t', 'test4@mail.com', 'AYNOZLXEQT', 'นายมา ปาปี้', 'ชาย', '1501100112577', '', 15, ' ', '0809999999', '', 'นายมา ปาปี้', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'หนองจอก', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (11, '11-100007t', 'test5@mail.com', 'WSEXVLJDHI', 'มาแล นอแมร์', 'ชาย', '1234567890123', '', 15, ' ', '0809999999', '', 'มาแล นอแมร์', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'นองประทีบ', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (12, '11-100008t', 'test6@mail.com', 'ASFNPCQJWX', 'จะอือ ลืนนา', 'ชาย', '1501100112577', '', 23, ' ', '0809999999', '', 'จะอือ ลืนนา', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'นองประทีบ', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (13, '11-100009t', 'test7@mail.com', '1234', 'มายู ลือเซอะ', 'ชาย', '1501100112577', '', 29, ' ', '0809999999', '', 'มายู ลือเซอะ', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'นองประทีบ', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (14, '11-100010t', 'test9@mail.com', 'PIYAXGFCRU', 'ไมรา จาไมก้า', 'ชาย', '1501100112577', '', 54, ' ', '0809999999', '', 'ไมรา จาไมก้า', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'นองประทีบ', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (15, '11-100011t', 'test10@mail.com', 'UEFZAHCLIO', 'วานรักษ์ พายะกำ', 'ชาย', '1501100112577', '', 54, ' ', '0809999999', '', 'วานรักษ์ พายะกำ', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'นองประทีบ', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (16, '11-100012t', 'test8@mail.com', 'RCUITDVQLG', 'นาสปี้ โซโลโก', 'ชาย', '1501100112558', '', 49, ' ', '0801111111', '', 'นาสปี้ โซโลโก', 'ไทยพาณิชญ์', '1123456678', 'ออมทรัพย์', 'นองประทีบ', '2011-11-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (17, '11-100013t', 'test12@mail.com', '1234', 'manga Solona', 'ชาย', '1501100112558', '', 4, ' ', '0801111111', '', 'จะอือ ลืนนา', 'ไทยพาณิชญ์', '12345678', 'กระแสรายวัน', 'หนองจอก', '2011-11-21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (18, '11-100014', 'test11@mail.com', 'KQJVIEXWUD', 'yoyo shakala', 'ชาย', '1501100112558', '', 2, ' ', '0809999999', '', 'นายแก้ว กันธา', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'หนองจอก', '2011-11-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (19, '11-100015', 'test13@mail.com', 'VYOLZEUTQC', 'mojo shakala', 'ชาย', '1501100112558', '', 2, ' ', '0809999999', '', 'นายแก้ว กันธา', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'หนองจอก', '2011-11-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (20, '11-100016', 'test14@mail.com', 'HBVJYDRTGW', 'nakala shakala', 'ชาย', '1501100112558', '', 2, ' ', '0809999999', '', 'นายแก้ว กันธา', 'กรุงเทพ', '1123456678', 'กระแสรายวัน', 'หนองจอก', '2011-11-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (42, '12-100024', 'test37@mail.com', '1234', 'มานะ สูงเนิน', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:10:31', '2012-08-31 13:10:31', 0, 'test02', '');
INSERT INTO `system_member` VALUES (43, '12-100025', 'test38@mail.com', '1234', 'เจษฎา เสาร์แก้ว', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:27:58', '2012-02-15 13:27:58', 0, '', '');
INSERT INTO `system_member` VALUES (41, '12-100023', 'test36@mail.com', '12345', 'ทองคำ จันทร์ดี', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:06:47', '2012-02-15 13:06:47', 0, '', '');
INSERT INTO `system_member` VALUES (40, '12-100022', 'test35@mail.com', '12345', 'ทองคำ จันทร์ดี', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:01:42', '2012-02-15 13:01:42', 0, '', '');
INSERT INTO `system_member` VALUES (39, '12-100021', 'test30@mail.com', '12345', 'ทองคำ จันทร์ดี', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:01:26', '2012-02-15 13:01:26', 0, '', '');
INSERT INTO `system_member` VALUES (38, '12-100020', 'test25@mail.com', '12345', 'ทองคำ จันทร์ดี', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:01:08', '2012-02-15 13:01:08', 0, '', '');
INSERT INTO `system_member` VALUES (37, '12-100019', 'admin@mail.com', '1234', 'มานะ แก้วจินดา', '', '', '', 15, '', '0899999999', '1', '', '', '', '', '', '2012-02-04', '2012-02-04 10:47:19', '2012-02-13 10:47:19', 0, '', '');
INSERT INTO `system_member` VALUES (36, '12-100018', 'test16@mail.com', '12345', 'นายแก้ว มารูน', '', '', '', 11, '', '0850391665', '1', '', '', '', '', '', '2012-01-30', '2012-01-30 14:48:44', '2012-02-08 14:48:44', 0, '', '');
INSERT INTO `system_member` VALUES (35, '12-100017', 'test15@mail.com', '12345', 'ทองคำ เงินมั่งมี', '', '', '', 2, '', '0850391665', '0', '', '', '', '', '', '2012-01-30', '2012-01-30 14:46:29', '2012-02-08 14:46:29', 1, '', '');
INSERT INTO `system_member` VALUES (44, '12-100026', 'test39@mail.com', '1234', 'เจษฎา เสาร์แก้ว', '', '', '', 2, '', '0899999999', '1', '', '', '', '', '', '2012-02-06', '2012-02-06 13:29:52', '2012-02-15 13:29:52', 0, '', '');
INSERT INTO `system_member` VALUES (45, '12-100027', 'test40@mail.com', '1234', 'นาย เจริญ  แก้วแปง', '', '', '', 15, '', '0899999999', '1', '', '', '', '', '', '2012-03-29', '2012-03-29 16:18:31', '2012-04-07 16:18:31', 0, '', '');
INSERT INTO `system_member` VALUES (46, '12-100028', 'test41@mail.com', 'AUJCSVLDOK', 'jetsada saokeaw', 'ชาย', '1509900483215', 'chiangmai', 15, '50230', '0855555555', '', 'แก้ว จรูญ', 'กรุงเทพ', '5000 0000', 'ออมทรัพย์', 'หางดง', '2012-04-27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (47, '12-100029', 'test31@mail.com', 'QGRYHCODBS', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (48, '12-100030', 'test32@mail.com', 'HIZFYEVMOR', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (49, '12-100031', 'test33@mail.com', 'BMSRXGJVHW', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (50, '12-100032', 'test34@mail.com', 'MUHYWZVRFX', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (51, '12-100033', 'test42@mail.com', 'XGZCLPARJI', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (52, '12-100034', 'test43@mail.com', 'TZGYMUBXIF', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (53, '12-100035', 'test44@mail.com', 'MEKQUACDPY', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (54, '12-100036', 'test45@mail.com', 'OSBJNEULKR', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (55, '12-100037', 'test46@mail.com', 'NUHKVGXRMI', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (56, '12-100038', 'test47@mail.com', 'IQCPKOBGNW', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (57, '12-100039', 'test48@mail.com', 'USTYLOEHAD', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (58, '12-100040', 'test49@mail.com', 'XCLHSTKDQJ', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (59, '12-100041', 'test50@mail.com', 'DWRPJXGLCZ', 'test account', 'ชาย', '1234567890123', '', 2, ' ', '0821198876', '', 'จาคอป ชาลาล่า', 'ไทยพานิชญ์', '1234567890000', 'ออมทรัพย์', 'เพลินจิต', '2012-05-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '');
INSERT INTO `system_member` VALUES (60, '12-100042', 'test41@mail.com', '123456', 'sdfsdfsdf', 'ชาย', '1111111111111', 'gfdgfdg', 19, '50230', '1111111111', '111111', 'fsdfsdfsdfsdfds', 'sdfsdfsdfdsf', 'fsdfsdfsdfdsfdsfdsf', 'dsfdsfdsfsdfsdfsdf', 'dsfsdfsdfsdfdsf', '2012-05-28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'test03', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_news`
-- 

CREATE TABLE `system_news` (
  `syn_id` int(11) NOT NULL auto_increment,
  `syn_title` varchar(300) collate utf8_unicode_ci NOT NULL,
  `syn_detail` longtext collate utf8_unicode_ci NOT NULL,
  `syn_date` date NOT NULL,
  `syn_st` tinyint(4) NOT NULL,
  PRIMARY KEY  (`syn_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `system_news`
-- 

INSERT INTO `system_news` VALUES (1, 'คลิปวีดีโอกับการพาชมเครื่องเล่นตัวใหม่จากหนังฟอร์มยักษ์ Transformers : The Ride', '<div class="entry-meta">\r\n	<span style="color:#008000;">ใกล้จะเปิดตัว\r\nเข้าไปทุกทีแล้วกับเครื่องเล่นตัวใหม่จากหนังหุ่นยนต์ฟอร์มยักษ์อย่าง \r\nTransformers ที่ถึงแม้หนังจะจบไตรภาคไปด้วยความสมบูรณ์แล้ว \r\nแต่หนังก็ยังไม่ยอมปล่อยให้ชื่อเสียงของเหล่าหุ่นยนต์นี้หลุดลอยไปได้ง่ายๆ \r\nเพราะว่าพวกเหล่าหุ่นยนต์จะกลับมาให้คุณมันส์แบบทะลุจออีกครั้งในเครื่อง\r\nเล่นอย่าง Transformers : The Ride เป็นเครื่องเล่นในรูปแบบ 3D \r\nที่จะโชว์ให้คนดูเห็นถึงฉากการต่อสู้สุดมันส์ของเหล่าหุ่นยนต์ \r\nและเปรียบเสมือนว่าเราเข้าไปสู้กับพวกมันด้วย \r\nซึ่งเครื่องเล่นนี้ได้เปิดตัวอยู่ที่ ยูนิเวอร์แซล สตูดิโอ ที่ สิงค์โปร \r\nนี้เองครับ</span>\r\n</div>\r\n<div class="entry-content">\r\n	<p style="text-align:left;">\r\n		โดยถ้าใครนึกภาพไม่ออกนั้น \r\nคลิปด้านบนนี้คือตัวอย่างของเครื่องเล่น Transformers : The Ride ครับ \r\nซึ่งจะเห็นว่าเครื่องเล่นนี้ไม่ได้เอาฉากจากหนังมาใส่ \r\nแต่กลับกลายเป็นว่าหนังสร้าง CGI ให้เหล่าพวกหุ่นยนต์ขึ้นมาใหม่หมด \r\nรวมทั้งฉากแอ็คชั่นด้วยเช่นกัน โดยเครื่องเล่น Transformers : The Ride \r\nนี้มีกำหนดเปิดเครื่องเล่นวันที่ 3 ธันวาคม ที่ ยูนิเวอร์แซล สตูดิโอ ครับ \r\nและคลิปด้านล่างนี้คือวีดีโอพาชมด้านในเครื่องเล่นครับ\r\n	</p>\r\n	<p style="text-align:center;">\r\n		<img class="alignnone size-full wp-image-110689" title="4914161361_8426f18709" src="http://movie.mthai.com/wp-content/uploads/2011/11/4914161361_8426f18709.jpg" alt="" height="333" width="500" />\r\n	</p>\r\n	<p style="text-align:center;">\r\n		<img class="alignnone size-full wp-image-110690" title="TFTR_Preshow-AllSpark_Vault800w-550x361" src="http://movie.mthai.com/wp-content/uploads/2011/11/TFTR_Preshow-AllSpark_Vault800w-550x361.jpg" alt="" height="361" width="550" />\r\n	</p>\r\n	<p style="text-align:center;">\r\n		<img class="alignnone size-full wp-image-110691" title="TFTR_Preshow-NEST_Orientation800w-550x356" src="http://movie.mthai.com/wp-content/uploads/2011/11/TFTR_Preshow-NEST_Orientation800w-550x356.jpg" alt="" height="356" width="550" />\r\n	</p>\r\n</div>', '2011-11-23', 1);
INSERT INTO `system_news` VALUES (3, 'ตัวอย่างใหม่ในรูปแบบโชว์เพลงประกอบกับหนังมนุษย์ต่างดาวบุกโลก The Darkest Hour 3D', '<a class="comment-link" href="http://movie.mthai.com/movie-news/110696.html#respond" title="Post a comment"></a><span style="color:#008000;">เตรียมจะเข้า\r\nฉายในอเมริกาในช่วงวันหยุดยาวคริสต์มาสนี้แล้ว \r\nกับหนังเอเลี่ยนบุกโลกเรื่องใหม่อย่าง The Darkest Hour 3D หรือในชื่อว่า \r\n“มหันตภัยมืดถล่มโลก” ซึ่งเมื่อ 2-3 วันที่แล้ว ทางค่ายหนังอย่าง 20th \r\nCentury Fox ก็ได้ปล่อยตัวอย่างใหม่ที่ชื่อว่า Mood Piece \r\nออกมาสู่สายตาชาวโลก ที่เป็นตัวอย่างเน้นขายเสียงเพลงประกอบหรือ Score \r\nที่แต่งโดย ไทเลอร์ เบดส์ \r\nซึ่งตัวอย่างใหม่นี้ก็จะทำให้เรารู้ถึงอารมณ์ของหนังเอเลี่ยนบุกโลกเรื่อง\r\nใหม่นี้มากขึ้นทีเดียว ไม่ว่าจะเป็นทั้งอารมณ์ที่ออกแนวติสๆ ปนความระทึก \r\nซึ่งตัวอย่างใหม่จะเร้าใจแค่ไหนคลิกชมได้ด้านบนครับ</span>\r\n<div class="entry-content">\r\n	<p>\r\n		หนังกำกับโดยคริส กอแร็ก จาก Right at Your Door \r\nและอำนวยการสร้างโดยทิเมอร์ เบ็กแมมเบตอฟ จาก Wanted \r\nบอกเล่าเรื่องราวของกลุ่มเพื่อนชาวอเมริกันซึ่งนำแสดงโดยเอมิล เฮิร์ช, \r\nเรเชล เทย์เลอร์, แม็กซ์ มิงเกลลา และ โอลิเวีย เทิร์ลบี \r\nที่ไปเที่ยวมอสโกกันแล้วพบต้องเอาตัวรอดจากเหตุการณ์เอเลี่ยนบุกโลกที่นั่น\r\n	</p>\r\n	<p>\r\n		เอเลี่ยนพวกนี้บุกมาโลกเพื่อกินพลังงาน \r\nและระหว่างที่ทางการและนักวิทยาศาสตร์ไม่อาจเอาชนะการรุกรานได้ \r\nหนุ่มสาวกลุ่มนี้ได้พบวิธีเอาชนะพวกมัน \r\nแต่พวกมันก็มีข้อได้เปรียบอยู่ตรงที่ว่าพวกเขาไม่สามารถมองเห็นตัวพวกมัน \r\nและเอเลี่ยนพวกนี้ก็มีแขนพลังงานที่มาดูกินพลังงานชีวิตของทุกสิ่งบนโลกได้\r\n	</p>\r\n	<p style="text-align:center;">\r\n		<img style="width:600px;height:249px;" class="alignnone size-full wp-image-110697" title="dark11" src="http://movie.mthai.com/wp-content/uploads/2011/11/dark11.jpg" alt="" height="249" width="600" />\r\n	</p>\r\n	<p style="text-align:center;">\r\n		<img class="alignnone size-full wp-image-110698" title="dark04" src="http://movie.mthai.com/wp-content/uploads/2011/11/dark04.jpg" alt="" height="249" width="600" />\r\n	</p>\r\n<br />\r\n</div>', '2011-11-23', 2);
INSERT INTO `system_news` VALUES (4, 'ทดสอบประกาศข่าวประชาสัมพันธ์', '<img src="/mlmclick/work/member/kindeditor/attached/image/20120301/20120301130748_45928.png" alt="" />ทดสอบประกาศข่าวประชาสัมพันธ์<br />', '2012-03-01', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_page`
-- 

CREATE TABLE `system_page` (
  `sp_id` int(5) NOT NULL auto_increment,
  `sp_detail` longtext collate utf8_unicode_ci NOT NULL,
  `sp_vedio` varchar(500) collate utf8_unicode_ci NOT NULL,
  `sp_image` varchar(255) collate utf8_unicode_ci NOT NULL,
  `sp_type` tinyint(1) NOT NULL,
  `sp_target` tinyint(1) NOT NULL,
  `sp_date` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sp_id`),
  KEY `sp_target` (`sp_target`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `system_page`
-- 

INSERT INTO `system_page` VALUES (19, '<br />\r\n<p style="text-align:center;">\r\n	<img src="/thailandwebmarketing/tg/work/member/kindeditor/attached/image/20111020/20111020192600_85215.png" alt="" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="/thailandwebmarketing/tg/work/member/kindeditor/attached/image/20111020/20111020193058_68403.png" alt="" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="/thailandwebmarketing/tg/work/member/kindeditor/attached/image/20111020/20111020193110_87368.png" alt="" /> \r\n</p>', '', '', 1, 1, '');
INSERT INTO `system_page` VALUES (20, '<div style="text-align:center;">\r\n	<img src="http://maps.googleapis.com/maps/api/staticmap?center=18.789859338824925%2C98.98142876196289&amp;zoom=12&amp;size=558x360&amp;maptype=roadmap&amp;markers=18.789859338824925%2C98.98142876196289&amp;language=en&amp;sensor=false" alt="" /><br />\r\n</div>', '', '', 1, 1, '');
INSERT INTO `system_page` VALUES (22, '<br />\r\n<div style="text-align:center;">\r\n	<iframe src="http://www.youtube.com/embed/bjy1-RaeRmg" allowfullscreen="" frameborder="0" height="315" width="560">\r\n	</iframe>\r\n</div>', '', '', 1, 1, '');
INSERT INTO `system_page` VALUES (23, '<p>\r\n	<strong>รับทันที  1500 PV/ รหัส (หลังจากจัดเรียงสายงานแล้ว)</strong><br />\r\nสำหรับสมาชิกใหม่ในโครงสร้างเครือข่ายของคุณ จากการแนะนำและสมัครผ่านทางเว็บไซด์ส่วนตัวของคุณ\r\n</p>\r\n<p>\r\n	<strong>รับทันที  200 PV/ รหัส (หลังจากจัดเรียงสายงานแล้ว)</strong><br />\r\nสำหรับสมาชิกใหม่ในโครงสร้างเครือข่ายของคุณ จากการแนะนำและสมัครผ่านทางเว็บไซด์ของสมาชิกท่านอื่น\r\n</p>\r\n<p>\r\n	โอกาสรับรายได้มากถึง 14,760,000 PV  (1,476,000 บาท)\r\n</p>\r\n<br />', '', '', 1, 1, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_payrefer`
-- 

CREATE TABLE `system_payrefer` (
  `sf_id` int(6) NOT NULL auto_increment,
  `sf_title` varchar(300) collate utf8_unicode_ci NOT NULL,
  `sf_bank` varchar(300) collate utf8_unicode_ci NOT NULL,
  `sf_money` decimal(6,2) NOT NULL,
  `sf_date_submit` varchar(100) collate utf8_unicode_ci NOT NULL,
  `sf_time` varchar(40) collate utf8_unicode_ci NOT NULL,
  `sf_slipe` varchar(255) collate utf8_unicode_ci NOT NULL,
  `sf_note` varchar(500) collate utf8_unicode_ci NOT NULL,
  `sf_date_send` datetime NOT NULL,
  `sf_sm_id` int(5) NOT NULL,
  `sf_status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`sf_id`),
  KEY `sf_sm_id` (`sf_sm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `system_payrefer`
-- 

INSERT INTO `system_payrefer` VALUES (3, 'ต่ออายุสมาชิก', 'กรุงเทพ', 9999.99, '10/24/2011', '12:00', 'home_3.png', 'ทดสอบ', '2011-11-16 17:09:22', 6, 0);
INSERT INTO `system_payrefer` VALUES (4, 'ต่ออายุสมาชิก', 'กรุงเทพ', 11.11, '10/24/2011', '12:00', 'home_3_1.png', 'ทดสอบ', '2011-11-16 17:10:00', 6, 0);
INSERT INTO `system_payrefer` VALUES (2, 'ชำระเงินค่าบริการรายเดือน', 'กรุงเทพ', 1200.00, '10/24/2011', '12:00', 'home_4.png', 'ชำระเงินค่าบริการรายเดือน', '2011-10-24 17:48:28', 7, 1);
INSERT INTO `system_payrefer` VALUES (5, 'ชำระเงินค่าบริการรายเดือน', 'กรุงเทพ', 1200.00, '10/04/2011', '12:00', 'home_2.png', '', '2011-11-16 17:12:28', 6, 0);
INSERT INTO `system_payrefer` VALUES (6, 'ชำระเงินค่าบริการรายเดือน', 'กรุงเทพ', 1200.00, '10/04/2011', '12:00', 'post_blog_4.png', '', '2011-11-16 17:18:53', 6, 0);
INSERT INTO `system_payrefer` VALUES (7, 'd', 'ธ.กสิกรไทย สาขา จอหอ', 123.00, '10/24/2011', '12:00', '', '1', '2011-11-21 13:14:50', 6, 0);
INSERT INTO `system_payrefer` VALUES (8, 'ชำระเงินค่าบริการรายเดือน', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 123.00, '11/24/2011', '12:00', '', 'dd', '2011-11-24 11:34:29', 6, 0);
INSERT INTO `system_payrefer` VALUES (9, 'ชำระเงินค่าบริการรายเดือน', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 123.00, '11/24/2011', '12:00', '', 'dd', '2011-11-24 11:34:36', 6, 0);
INSERT INTO `system_payrefer` VALUES (10, 'ddd', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 123.00, '11/24/2011', '12:00', '', 'd', '2011-11-24 11:36:44', 6, 0);
INSERT INTO `system_payrefer` VALUES (11, 'ชำระเงินค่าบริการรายเดือน', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 9999.99, '11/24/2011', '12:00', '', '', '2011-11-24 11:45:14', 6, 0);
INSERT INTO `system_payrefer` VALUES (12, 'ชำระเงินค่าบริการรายเดือน', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 9999.99, '11/24/2011', '12:00', '', '', '2011-11-24 11:46:22', 6, 0);
INSERT INTO `system_payrefer` VALUES (13, 'ชำระเงินค่าบริการรายเดือน', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 9999.99, '11/23/2011', '12:00', '', '', '2011-11-24 11:49:28', 6, 0);
INSERT INTO `system_payrefer` VALUES (14, 'ชำระเงินค่าบริการรายเดือน', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 111.11, '11/23/2011', '12:00', '', '', '2011-11-24 11:52:00', 6, 1);
INSERT INTO `system_payrefer` VALUES (15, 'ต่ออายุสมาชิก', ' ธ.กรุงเทพ สาขา ย่อยจอหอ', 1299.11, '11/23/2011', '12:00', '', 'd', '2011-11-24 11:57:07', 6, 0);
INSERT INTO `system_payrefer` VALUES (16, 'รดติดต่อสั่งสินค้าที่เบอร์ โทร 080-3795415 หรือ ทางอีเมลล์ tg1081009@gmail.com เมื่อทางเว็บตรวจสอบ ว่ามีสินค้า(เนื่องจากสินค้าของเราเป็นสิ', 'ธ.ไทยพาณิชย์ สาขา จอหอ', 9999.99, '12/22/2011', '12:00', '', 'yu', '2011-12-30 14:11:11', 6, 0);
INSERT INTO `system_payrefer` VALUES (17, 'hj', 'ธ.ไทยพาณิชย์ สาขา จอหอ', 1299.00, '11/24/2011', '12', '', '', '2011-12-30 14:12:47', 6, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_point`
-- 

CREATE TABLE `system_point` (
  `spi_id` int(11) NOT NULL auto_increment,
  `sli_id` int(7) NOT NULL,
  `spi_rule` tinyint(2) NOT NULL,
  `spi_pt` int(11) NOT NULL,
  `spi_upd` datetime NOT NULL,
  `spi_cut` tinyint(1) NOT NULL,
  `spi_note` varchar(300) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`spi_id`),
  KEY `sli_id` (`sli_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=509 ;

-- 
-- Dumping data for table `system_point`
-- 

INSERT INTO `system_point` VALUES (1, 6, 1, 100, '2011-11-07 14:14:48', 1, NULL);
INSERT INTO `system_point` VALUES (2, 6, 2, 20, '2011-11-07 14:14:48', 1, NULL);
INSERT INTO `system_point` VALUES (3, 8, 1, 100, '2011-11-07 14:15:18', 1, NULL);
INSERT INTO `system_point` VALUES (4, 8, 2, 20, '2011-11-07 14:15:18', 1, NULL);
INSERT INTO `system_point` VALUES (5, 6, 2, 20, '2011-11-07 14:15:18', 1, NULL);
INSERT INTO `system_point` VALUES (6, 6, 1, 100, '2011-11-07 14:15:46', 1, NULL);
INSERT INTO `system_point` VALUES (7, 9, 2, 20, '2011-11-07 14:15:46', 1, NULL);
INSERT INTO `system_point` VALUES (8, 8, 2, 20, '2011-11-07 14:15:46', 1, NULL);
INSERT INTO `system_point` VALUES (9, 6, 2, 20, '2011-11-07 14:15:46', 1, NULL);
INSERT INTO `system_point` VALUES (10, 10, 2, 20, '2011-11-07 14:19:22', 1, NULL);
INSERT INTO `system_point` VALUES (11, 9, 2, 20, '2011-11-07 14:19:22', 1, NULL);
INSERT INTO `system_point` VALUES (12, 8, 2, 20, '2011-11-07 14:19:22', 1, NULL);
INSERT INTO `system_point` VALUES (13, 6, 2, 20, '2011-11-07 14:19:22', 1, NULL);
INSERT INTO `system_point` VALUES (14, 8, 1, 100, '2011-11-07 14:21:04', 1, NULL);
INSERT INTO `system_point` VALUES (15, 11, 2, 20, '2011-11-07 14:21:04', 1, NULL);
INSERT INTO `system_point` VALUES (16, 10, 2, 20, '2011-11-07 14:21:04', 1, NULL);
INSERT INTO `system_point` VALUES (17, 9, 2, 20, '2011-11-07 14:21:04', 1, NULL);
INSERT INTO `system_point` VALUES (18, 8, 2, 20, '2011-11-07 14:21:04', 1, NULL);
INSERT INTO `system_point` VALUES (19, 6, 2, 20, '2011-11-07 14:21:04', 1, NULL);
INSERT INTO `system_point` VALUES (20, 11, 1, 100, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (21, 12, 2, 20, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (22, 11, 2, 20, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (23, 10, 2, 20, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (24, 9, 2, 20, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (25, 8, 2, 20, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (26, 6, 2, 20, '2011-11-07 14:57:26', 1, NULL);
INSERT INTO `system_point` VALUES (27, 6, 1, 100, '2011-11-07 14:59:04', 1, NULL);
INSERT INTO `system_point` VALUES (28, 6, 2, 20, '2011-11-07 14:59:04', 1, NULL);
INSERT INTO `system_point` VALUES (29, 7, 1, 100, '2011-11-07 18:00:22', 1, NULL);
INSERT INTO `system_point` VALUES (30, 7, 2, 20, '2011-11-07 18:00:22', 1, NULL);
INSERT INTO `system_point` VALUES (31, 6, 2, 20, '2011-11-07 18:00:22', 1, NULL);
INSERT INTO `system_point` VALUES (32, 6, 1, 100, '2011-11-09 16:46:37', 1, '');
INSERT INTO `system_point` VALUES (33, 6, 2, 20, '2011-11-09 16:46:37', 1, '');
INSERT INTO `system_point` VALUES (34, 6, 0, 755, '2011-11-09 18:04:41', 1, 'ค่าสั่งซื้อสินค้า 17 รายการ');
INSERT INTO `system_point` VALUES (35, 6, 0, 755, '2011-11-09 18:04:49', 1, 'ค่าสั่งซื้อสินค้า 17 รายการ');
INSERT INTO `system_point` VALUES (36, 6, 0, 500, '2011-11-09 18:05:43', 1, '');
INSERT INTO `system_point` VALUES (37, 6, 0, 1085, '2011-11-09 18:06:20', 1, 'ค่าสั่งซื้อสินค้า');
INSERT INTO `system_point` VALUES (38, 6, 0, 2300, '2011-11-09 18:07:25', 1, 'โบนัสแนะนำคนเข้าใช้งานระบบ 300 คน');
INSERT INTO `system_point` VALUES (39, 15, 0, 500, '2011-11-10 09:48:16', 1, 'ค่าสั่งซื้อสินค้า');
INSERT INTO `system_point` VALUES (40, 15, 0, 1670, '2011-11-10 09:49:17', 1, 'ค่าสินค้า');
INSERT INTO `system_point` VALUES (41, 15, 0, 875, '2011-11-10 09:50:12', 1, 'ค่าสินค้า');
INSERT INTO `system_point` VALUES (42, 11, 3, 15, '2011-11-10 18:00:38', 1, '');
INSERT INTO `system_point` VALUES (43, 10, 3, 15, '2011-11-10 18:00:38', 1, '');
INSERT INTO `system_point` VALUES (44, 9, 3, 15, '2011-11-10 18:00:38', 1, '');
INSERT INTO `system_point` VALUES (45, 8, 3, 15, '2011-11-10 18:00:38', 1, '');
INSERT INTO `system_point` VALUES (46, 6, 3, 15, '2011-11-10 18:00:38', 1, '');
INSERT INTO `system_point` VALUES (47, 11, 3, 15, '2011-11-10 18:01:29', 1, '');
INSERT INTO `system_point` VALUES (48, 10, 3, 15, '2011-11-10 18:01:29', 1, '');
INSERT INTO `system_point` VALUES (49, 9, 3, 15, '2011-11-10 18:01:29', 1, '');
INSERT INTO `system_point` VALUES (50, 8, 3, 15, '2011-11-10 18:01:29', 1, '');
INSERT INTO `system_point` VALUES (51, 6, 3, 15, '2011-11-10 18:01:29', 1, '');
INSERT INTO `system_point` VALUES (52, 11, 3, 15, '2011-11-10 18:02:57', 1, '');
INSERT INTO `system_point` VALUES (53, 10, 3, 15, '2011-11-10 18:02:57', 1, '');
INSERT INTO `system_point` VALUES (54, 9, 3, 15, '2011-11-10 18:02:57', 1, '');
INSERT INTO `system_point` VALUES (55, 8, 3, 15, '2011-11-10 18:02:57', 1, '');
INSERT INTO `system_point` VALUES (56, 6, 3, 15, '2011-11-10 18:02:57', 1, '');
INSERT INTO `system_point` VALUES (57, 11, 3, 15, '2011-11-10 18:03:51', 1, '');
INSERT INTO `system_point` VALUES (58, 10, 3, 15, '2011-11-10 18:03:51', 1, '');
INSERT INTO `system_point` VALUES (59, 9, 3, 15, '2011-11-10 18:03:51', 1, '');
INSERT INTO `system_point` VALUES (60, 8, 3, 15, '2011-11-10 18:03:51', 1, '');
INSERT INTO `system_point` VALUES (61, 6, 3, 15, '2011-11-10 18:03:51', 1, '');
INSERT INTO `system_point` VALUES (62, 11, 3, 15, '2011-11-10 18:05:28', 1, '');
INSERT INTO `system_point` VALUES (63, 10, 3, 15, '2011-11-10 18:05:28', 1, '');
INSERT INTO `system_point` VALUES (64, 9, 3, 15, '2011-11-10 18:05:28', 1, '');
INSERT INTO `system_point` VALUES (65, 8, 3, 15, '2011-11-10 18:05:28', 1, '');
INSERT INTO `system_point` VALUES (66, 6, 3, 15, '2011-11-10 18:05:28', 1, '');
INSERT INTO `system_point` VALUES (67, 6, 3, 15, '2011-11-11 10:07:32', 1, '');
INSERT INTO `system_point` VALUES (68, 6, 3, 15, '2011-11-11 10:14:42', 1, '');
INSERT INTO `system_point` VALUES (69, 6, 3, 15, '2011-11-11 10:21:16', 1, '');
INSERT INTO `system_point` VALUES (70, 6, 3, 15, '2011-11-11 10:26:37', 1, '');
INSERT INTO `system_point` VALUES (71, 6, 3, 15, '2011-11-11 10:26:43', 1, '');
INSERT INTO `system_point` VALUES (72, 6, 3, 15, '2011-11-11 10:26:48', 1, '');
INSERT INTO `system_point` VALUES (73, 6, 3, 15, '2011-11-11 10:40:33', 1, '');
INSERT INTO `system_point` VALUES (74, 6, 3, 15, '2011-11-11 10:40:40', 1, '');
INSERT INTO `system_point` VALUES (75, 6, 3, 15, '2011-11-11 10:40:44', 1, '');
INSERT INTO `system_point` VALUES (76, 6, 3, 15, '2011-11-11 10:41:01', 1, '');
INSERT INTO `system_point` VALUES (77, 6, 3, 15, '2011-11-11 10:55:00', 1, '');
INSERT INTO `system_point` VALUES (78, 6, 3, 15, '2011-11-11 10:55:45', 1, '');
INSERT INTO `system_point` VALUES (79, 6, 3, 15, '2011-11-11 10:58:21', 1, '');
INSERT INTO `system_point` VALUES (80, 6, 3, 15, '2011-11-11 10:58:43', 1, '');
INSERT INTO `system_point` VALUES (81, 6, 3, 15, '2011-11-11 10:59:53', 1, '');
INSERT INTO `system_point` VALUES (82, 6, 3, 15, '2011-11-11 11:00:07', 1, '');
INSERT INTO `system_point` VALUES (83, 6, 3, 15, '2011-11-11 11:21:02', 1, '');
INSERT INTO `system_point` VALUES (84, 6, 3, 15, '2011-11-11 11:21:30', 1, '');
INSERT INTO `system_point` VALUES (85, 6, 3, 15, '2011-11-11 11:22:07', 1, '');
INSERT INTO `system_point` VALUES (86, 6, 3, 15, '2011-11-11 11:23:57', 1, '');
INSERT INTO `system_point` VALUES (87, 6, 3, 15, '2011-11-11 11:27:23', 1, '');
INSERT INTO `system_point` VALUES (88, 6, 3, 15, '2011-11-11 11:32:34', 1, '');
INSERT INTO `system_point` VALUES (89, 6, 3, 15, '2011-11-11 11:32:43', 1, '');
INSERT INTO `system_point` VALUES (90, 6, 3, 15, '2011-11-11 11:32:47', 1, '');
INSERT INTO `system_point` VALUES (91, 6, 3, 15, '2011-11-11 11:32:52', 1, '');
INSERT INTO `system_point` VALUES (92, 6, 3, 15, '2011-11-11 11:35:32', 1, '');
INSERT INTO `system_point` VALUES (93, 6, 3, 15, '2011-11-11 11:36:12', 1, '');
INSERT INTO `system_point` VALUES (94, 6, 3, 15, '2011-11-11 11:36:28', 1, '');
INSERT INTO `system_point` VALUES (95, 6, 3, 15, '2011-11-11 11:38:12', 1, '');
INSERT INTO `system_point` VALUES (96, 6, 3, 15, '2011-11-11 11:41:59', 1, '');
INSERT INTO `system_point` VALUES (97, 6, 3, 15, '2011-11-11 11:42:12', 1, '');
INSERT INTO `system_point` VALUES (98, 6, 3, 15, '2011-11-11 11:42:17', 1, '');
INSERT INTO `system_point` VALUES (99, 6, 3, 15, '2011-11-11 11:42:22', 1, '');
INSERT INTO `system_point` VALUES (100, 6, 3, 15, '2011-11-11 11:42:39', 1, '');
INSERT INTO `system_point` VALUES (101, 6, 3, 15, '2011-11-11 11:43:07', 1, '');
INSERT INTO `system_point` VALUES (102, 11, 3, 15, '2011-11-11 15:06:23', 1, '');
INSERT INTO `system_point` VALUES (103, 10, 3, 15, '2011-11-11 15:06:23', 1, '');
INSERT INTO `system_point` VALUES (104, 9, 3, 15, '2011-11-11 15:06:23', 1, '');
INSERT INTO `system_point` VALUES (105, 8, 3, 15, '2011-11-11 15:06:23', 1, '');
INSERT INTO `system_point` VALUES (106, 6, 3, 15, '2011-11-11 15:06:23', 1, '');
INSERT INTO `system_point` VALUES (107, 6, 3, 15, '2011-11-11 15:08:39', 1, '');
INSERT INTO `system_point` VALUES (108, 6, 3, 15, '2011-11-11 15:10:13', 1, '');
INSERT INTO `system_point` VALUES (109, 6, 3, 15, '2011-11-11 15:10:49', 1, '');
INSERT INTO `system_point` VALUES (110, 6, 3, 45, '2011-11-11 15:12:57', 1, 'ต่ออายุรายเดือน 3 เดือน');
INSERT INTO `system_point` VALUES (111, 11, 3, 15, '2011-11-11 15:18:42', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (112, 10, 3, 15, '2011-11-11 15:18:42', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (113, 9, 3, 15, '2011-11-11 15:18:42', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (114, 8, 3, 15, '2011-11-11 15:18:42', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (115, 6, 3, 15, '2011-11-11 15:18:42', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (116, 11, 3, 15, '2011-11-11 15:19:49', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (117, 10, 3, 15, '2011-11-11 15:19:49', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (118, 9, 3, 15, '2011-11-11 15:19:49', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (119, 8, 3, 15, '2011-11-11 15:19:49', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (120, 6, 3, 15, '2011-11-11 15:19:49', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (121, 11, 3, 15, '2011-11-11 15:20:26', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (122, 10, 3, 15, '2011-11-11 15:20:26', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (123, 9, 3, 15, '2011-11-11 15:20:26', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (124, 8, 3, 15, '2011-11-11 15:20:26', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (125, 6, 3, 15, '2011-11-11 15:20:26', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (126, 12, 3, 15, '2011-11-11 15:21:33', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (127, 11, 3, 15, '2011-11-11 15:21:33', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (128, 10, 3, 15, '2011-11-11 15:21:33', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (129, 9, 3, 15, '2011-11-11 15:21:33', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (130, 8, 3, 15, '2011-11-11 15:21:33', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (131, 6, 3, 15, '2011-11-11 15:21:33', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (132, 12, 3, 45, '2011-11-11 15:21:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (133, 11, 3, 45, '2011-11-11 15:21:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (134, 10, 3, 45, '2011-11-11 15:21:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (135, 9, 3, 45, '2011-11-11 15:21:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (136, 8, 3, 45, '2011-11-11 15:21:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (137, 6, 3, 45, '2011-11-11 15:21:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (138, 12, 3, 15, '2011-11-11 15:22:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (139, 11, 3, 15, '2011-11-11 15:22:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (140, 10, 3, 15, '2011-11-11 15:22:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (141, 9, 3, 15, '2011-11-11 15:22:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (142, 8, 3, 15, '2011-11-11 15:22:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (143, 6, 3, 15, '2011-11-11 15:22:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (144, 12, 3, 45, '2011-11-11 15:22:17', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (145, 11, 3, 45, '2011-11-11 15:22:17', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (146, 10, 3, 45, '2011-11-11 15:22:17', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (147, 9, 3, 45, '2011-11-11 15:22:17', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (148, 8, 3, 45, '2011-11-11 15:22:17', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (149, 6, 3, 45, '2011-11-11 15:22:17', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (150, 12, 3, 15, '2011-11-11 16:12:05', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (151, 11, 3, 15, '2011-11-11 16:12:05', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (152, 10, 3, 15, '2011-11-11 16:12:05', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (153, 9, 3, 15, '2011-11-11 16:12:05', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (154, 8, 3, 15, '2011-11-11 16:12:05', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (155, 6, 3, 15, '2011-11-11 16:12:05', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (156, 6, 3, 90, '2011-11-11 17:36:49', 1, 'สายงานต่ออายุวีไอพี 6 เดือน');
INSERT INTO `system_point` VALUES (157, 13, 0, 50, '2011-11-11 17:44:23', 1, 'ค่าแชร์');
INSERT INTO `system_point` VALUES (158, 6, 1, 100, '2011-11-12 09:30:21', 1, '');
INSERT INTO `system_point` VALUES (159, 6, 2, 20, '2011-11-12 09:30:21', 1, '');
INSERT INTO `system_point` VALUES (160, 12, 3, 45, '2011-11-12 10:44:59', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (161, 11, 3, 45, '2011-11-12 10:44:59', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (162, 10, 3, 45, '2011-11-12 10:44:59', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (163, 9, 3, 45, '2011-11-12 10:44:59', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (164, 8, 3, 45, '2011-11-12 10:44:59', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (165, 6, 3, 45, '2011-11-12 10:44:59', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (166, 6, 4, 40, '2011-11-14 10:44:41', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (167, 6, 4, 40, '2011-11-14 10:44:46', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (168, 6, 4, 40, '2011-11-14 10:44:50', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (169, 6, 4, 40, '2011-11-14 10:45:41', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (170, 6, 4, 40, '2011-11-14 10:45:44', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (171, 6, 4, 40, '2011-11-14 10:46:20', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (172, 6, 0, 1195, '2011-10-01 11:58:58', 1, 'ค่าสั่งซื้อสินค้า');
INSERT INTO `system_point` VALUES (173, 6, 0, 598, '2011-10-01 11:59:35', 1, 'ค่าสั่งอาหารหมู');
INSERT INTO `system_point` VALUES (174, 0, 4, 10, '2011-11-15 17:02:53', 1, 'สมาชิกเต็มชั้น ที่ ');
INSERT INTO `system_point` VALUES (175, 6, 3, 15, '2011-11-18 14:20:41', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (176, 6, 3, 15, '2011-11-18 14:20:43', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (177, 6, 3, 15, '2011-11-18 14:24:58', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (178, 7, 0, 175, '2011-11-20 23:57:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 7 % <br>อัฟไลน์ซื้อสินค้า 25000 บาท');
INSERT INTO `system_point` VALUES (179, 8, 0, 175, '2011-11-20 23:57:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 7 % <br>อัฟไลน์ซื้อสินค้า 25000 บาท');
INSERT INTO `system_point` VALUES (180, 15, 0, 175, '2011-11-20 23:57:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 7 % <br>อัฟไลน์ซื้อสินค้า 25000 บาท');
INSERT INTO `system_point` VALUES (181, 16, 0, 175, '2011-11-20 23:57:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 7 % <br>อัฟไลน์ซื้อสินค้า 25000 บาท');
INSERT INTO `system_point` VALUES (182, 6, 0, 2500, '2011-11-20 23:57:45', 1, 'อัฟไลน์ซื้อสินค้า 25000 บาท');
INSERT INTO `system_point` VALUES (183, 7, 0, 4296, '2011-11-21 00:10:30', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 13 % <br>');
INSERT INTO `system_point` VALUES (184, 8, 0, 4296, '2011-11-21 00:10:30', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 13 % <br>');
INSERT INTO `system_point` VALUES (185, 15, 0, 4296, '2011-11-21 00:10:30', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 13 % <br>');
INSERT INTO `system_point` VALUES (186, 16, 0, 4296, '2011-11-21 00:10:30', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 13 % <br>');
INSERT INTO `system_point` VALUES (187, 6, 0, 33048, '2011-11-21 00:10:30', 1, '');
INSERT INTO `system_point` VALUES (188, 7, 0, 418, '2011-11-21 00:11:55', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 4 % <br>');
INSERT INTO `system_point` VALUES (189, 8, 0, 418, '2011-11-21 00:11:55', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 4 % <br>');
INSERT INTO `system_point` VALUES (190, 15, 0, 418, '2011-11-21 00:11:55', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 4 % <br>');
INSERT INTO `system_point` VALUES (191, 16, 0, 418, '2011-11-21 00:11:55', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 4 % <br>');
INSERT INTO `system_point` VALUES (192, 6, 0, 10444, '2011-11-21 00:11:55', 1, '');
INSERT INTO `system_point` VALUES (193, 6, 1, 100, '2011-11-22 13:17:47', 1, '');
INSERT INTO `system_point` VALUES (194, 6, 2, 20, '2011-11-22 13:17:47', 1, '');
INSERT INTO `system_point` VALUES (195, 6, 1, 100, '2011-11-22 13:18:28', 1, '');
INSERT INTO `system_point` VALUES (196, 6, 2, 20, '2011-11-22 13:18:28', 1, '');
INSERT INTO `system_point` VALUES (197, 6, 1, 100, '2011-11-22 13:23:15', 1, '');
INSERT INTO `system_point` VALUES (198, 6, 2, 20, '2011-11-22 13:23:15', 1, '');
INSERT INTO `system_point` VALUES (199, 6, 1, 100, '2011-11-22 13:24:25', 1, '');
INSERT INTO `system_point` VALUES (200, 6, 2, 20, '2011-11-22 13:24:25', 1, '');
INSERT INTO `system_point` VALUES (201, 6, 1, 100, '2011-11-22 13:28:48', 1, '');
INSERT INTO `system_point` VALUES (202, 7, 2, 20, '2011-11-22 13:28:48', 1, '');
INSERT INTO `system_point` VALUES (203, 6, 2, 20, '2011-11-22 13:28:48', 1, '');
INSERT INTO `system_point` VALUES (204, 6, 1, 100, '2011-11-22 13:30:57', 1, '');
INSERT INTO `system_point` VALUES (205, 7, 2, 20, '2011-11-22 13:30:57', 1, '');
INSERT INTO `system_point` VALUES (206, 6, 2, 20, '2011-11-22 13:30:57', 1, '');
INSERT INTO `system_point` VALUES (207, 6, 1, 100, '2011-11-22 13:31:58', 1, '');
INSERT INTO `system_point` VALUES (208, 7, 2, 20, '2011-11-22 13:31:58', 1, '');
INSERT INTO `system_point` VALUES (209, 6, 2, 20, '2011-11-22 13:31:58', 1, '');
INSERT INTO `system_point` VALUES (210, 18, 0, 5000, '2011-11-22 13:36:33', 1, '');
INSERT INTO `system_point` VALUES (211, 7, 0, 1, '2011-11-22 14:15:21', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 5 % <br>');
INSERT INTO `system_point` VALUES (212, 8, 0, 1, '2011-11-22 14:15:21', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 5 % <br>');
INSERT INTO `system_point` VALUES (213, 15, 0, 1, '2011-11-22 14:15:21', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 5 % <br>');
INSERT INTO `system_point` VALUES (214, 16, 0, 1, '2011-11-22 14:15:21', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 5 % <br>');
INSERT INTO `system_point` VALUES (215, 6, 0, 1, '2011-11-22 14:15:21', 1, '');
INSERT INTO `system_point` VALUES (216, 6, 1, 100, '2011-11-23 10:59:24', 1, '');
INSERT INTO `system_point` VALUES (217, 11, 2, 20, '2011-11-23 10:59:24', 1, '');
INSERT INTO `system_point` VALUES (218, 6, 3, 15, '2011-11-25 10:15:22', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (219, 6, 1, 100, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (220, 13, 2, 15, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (221, 12, 2, 15, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (222, 11, 2, 15, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (223, 10, 2, 15, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (224, 9, 2, 15, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (225, 8, 2, 15, '2011-12-08 11:37:31', 1, '');
INSERT INTO `system_point` VALUES (226, 13, 0, 25, '2011-12-27 13:52:56', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 5 % <br>111');
INSERT INTO `system_point` VALUES (227, 12, 0, 500, '2011-12-27 13:52:56', 1, '111');
INSERT INTO `system_point` VALUES (228, 6, 3, 15, '2012-01-06 10:51:28', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (229, 6, 1, 100, '2012-01-31 11:32:46', 1, '');
INSERT INTO `system_point` VALUES (230, 14, 2, 15, '2012-01-31 11:32:46', 1, '');
INSERT INTO `system_point` VALUES (231, 7, 2, 15, '2012-01-31 11:32:46', 1, '');
INSERT INTO `system_point` VALUES (232, 6, 2, 15, '2012-01-31 11:32:46', 1, '');
INSERT INTO `system_point` VALUES (233, 9, 1, 150, '2012-01-31 13:21:21', 1, '');
INSERT INTO `system_point` VALUES (234, 9, 2, 10, '2012-01-31 13:21:21', 1, '');
INSERT INTO `system_point` VALUES (235, 8, 2, 10, '2012-01-31 13:21:21', 1, '');
INSERT INTO `system_point` VALUES (236, 6, 2, 10, '2012-01-31 13:21:21', 1, '');
INSERT INTO `system_point` VALUES (237, 9, 1, 150, '2012-01-31 13:33:05', 1, '');
INSERT INTO `system_point` VALUES (238, 9, 2, 10, '2012-01-31 13:33:05', 1, '');
INSERT INTO `system_point` VALUES (239, 8, 2, 10, '2012-01-31 13:33:05', 1, '');
INSERT INTO `system_point` VALUES (240, 6, 2, 10, '2012-01-31 13:33:05', 1, '');
INSERT INTO `system_point` VALUES (241, 9, 1, 150, '2012-01-31 13:37:32', 1, '');
INSERT INTO `system_point` VALUES (242, 9, 2, 10, '2012-01-31 13:37:32', 1, '');
INSERT INTO `system_point` VALUES (243, 8, 2, 10, '2012-01-31 13:37:32', 1, '');
INSERT INTO `system_point` VALUES (244, 6, 2, 10, '2012-01-31 13:37:32', 1, '');
INSERT INTO `system_point` VALUES (245, 9, 1, 150, '2012-01-31 13:39:57', 1, '');
INSERT INTO `system_point` VALUES (246, 9, 2, 10, '2012-01-31 13:39:57', 1, '');
INSERT INTO `system_point` VALUES (247, 8, 2, 10, '2012-01-31 13:39:57', 1, '');
INSERT INTO `system_point` VALUES (248, 6, 2, 10, '2012-01-31 13:39:57', 1, '');
INSERT INTO `system_point` VALUES (249, 9, 1, 150, '2012-01-31 13:42:04', 1, '');
INSERT INTO `system_point` VALUES (250, 9, 2, 10, '2012-01-31 13:42:04', 1, '');
INSERT INTO `system_point` VALUES (251, 8, 2, 10, '2012-01-31 13:42:04', 1, '');
INSERT INTO `system_point` VALUES (252, 6, 2, 10, '2012-01-31 13:42:04', 1, '');
INSERT INTO `system_point` VALUES (253, 9, 1, 150, '2012-01-31 13:43:04', 1, '');
INSERT INTO `system_point` VALUES (254, 13, 2, 100, '2012-01-31 13:43:04', 1, '');
INSERT INTO `system_point` VALUES (255, 9, 2, 10, '2012-01-31 13:43:04', 1, '');
INSERT INTO `system_point` VALUES (256, 8, 2, 10, '2012-01-31 13:43:04', 1, '');
INSERT INTO `system_point` VALUES (257, 9, 1, 150, '2012-01-31 13:45:05', 1, '');
INSERT INTO `system_point` VALUES (258, 9, 2, 100, '2012-01-31 13:45:05', 1, '');
INSERT INTO `system_point` VALUES (259, 8, 2, 10, '2012-01-31 13:45:05', 1, '');
INSERT INTO `system_point` VALUES (260, 6, 2, 10, '2012-01-31 13:45:05', 1, '');
INSERT INTO `system_point` VALUES (261, 9, 3, 8, '2012-01-31 13:53:48', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (262, 8, 3, 8, '2012-01-31 13:53:48', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (263, 6, 3, 8, '2012-01-31 13:53:48', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (264, 9, 3, 8, '2012-01-31 13:56:41', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (265, 8, 3, 8, '2012-01-31 13:56:41', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (266, 6, 3, 8, '2012-01-31 13:56:41', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (267, 14, 3, 10, '2012-01-31 14:01:21', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (268, 7, 3, 8, '2012-01-31 14:01:21', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (269, 6, 3, 8, '2012-01-31 14:01:21', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (270, 13, 2, 100, '2012-01-31 14:04:31', 1, '');
INSERT INTO `system_point` VALUES (271, 11, 2, 10, '2012-01-31 14:04:31', 1, '');
INSERT INTO `system_point` VALUES (272, 9, 2, 10, '2012-01-31 14:04:31', 1, '');
INSERT INTO `system_point` VALUES (273, 8, 2, 10, '2012-01-31 14:04:31', 1, '');
INSERT INTO `system_point` VALUES (274, 6, 4, 40, '2012-01-31 14:05:29', 1, 'สมาชิกเต็มชั้น ที่ 1');
INSERT INTO `system_point` VALUES (275, 35, 0, 39056, '2012-01-31 14:10:57', 1, '');
INSERT INTO `system_point` VALUES (276, 14, 3, 120, '2012-01-31 14:11:34', 1, 'สายงานต่ออายุวีไอพี 12 เดือน');
INSERT INTO `system_point` VALUES (277, 7, 3, 96, '2012-01-31 14:11:34', 1, 'สายงานต่ออายุวีไอพี 12 เดือน');
INSERT INTO `system_point` VALUES (278, 6, 3, 96, '2012-01-31 14:11:34', 1, 'สายงานต่ออายุวีไอพี 12 เดือน');
INSERT INTO `system_point` VALUES (279, 14, 3, 30, '2012-01-31 14:13:16', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (280, 7, 3, 24, '2012-01-31 14:13:16', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (281, 6, 3, 24, '2012-01-31 14:13:16', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (282, 14, 3, 10, '2012-01-31 14:15:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (283, 7, 3, 8, '2012-01-31 14:15:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (284, 6, 3, 8, '2012-01-31 14:15:11', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (285, 14, 3, 30, '2012-01-31 14:15:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (286, 7, 3, 24, '2012-01-31 14:15:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (287, 6, 3, 24, '2012-01-31 14:15:43', 1, 'สายงานต่ออายุวีไอพี 3 เดือน');
INSERT INTO `system_point` VALUES (288, 11, 3, 100, '2012-05-07 16:53:01', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (289, 9, 3, 200, '2012-05-07 16:53:01', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (290, 8, 3, 120, '2012-05-07 16:53:01', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (291, 7, 0, 2000, '2012-05-08 11:37:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 25 % <br>');
INSERT INTO `system_point` VALUES (292, 8, 0, 2000, '2012-05-08 11:37:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 25 % <br>');
INSERT INTO `system_point` VALUES (293, 15, 0, 2000, '2012-05-08 11:37:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 25 % <br>');
INSERT INTO `system_point` VALUES (294, 16, 0, 2000, '2012-05-08 11:37:45', 1, 'ได้รับ PV โบนัสจากอัฟไลน์ในการซื้อสินค้า 25 % <br>');
INSERT INTO `system_point` VALUES (295, 6, 0, 8000, '2012-05-08 11:37:45', 1, '');
INSERT INTO `system_point` VALUES (296, 13, 0, 1341, '2012-05-08 16:42:21', 1, 'ทดสอบ');
INSERT INTO `system_point` VALUES (297, 12, 4, 0, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (298, 11, 4, 200, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (299, 9, 4, 100, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (300, 8, 4, 100, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (301, 13, 4, 131, '0000-00-00 00:00:00', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (302, 12, 4, 0, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (303, 11, 4, 200, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (304, 9, 4, 100, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (305, 8, 4, 100, '0000-00-00 00:00:00', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (306, 13, 4, 262, '0000-00-00 00:00:00', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (307, 12, 4, 0, '2012-05-08 16:50:43', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (308, 11, 4, 200, '2012-05-08 16:50:43', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (309, 9, 4, 100, '2012-05-08 16:50:43', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (310, 8, 4, 100, '2012-05-08 16:50:43', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (311, 13, 4, 524, '2012-05-08 16:50:43', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (312, 12, 4, 0, '2012-05-08 16:53:10', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (313, 11, 4, 200, '2012-05-08 16:53:10', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (314, 9, 4, 100, '2012-05-08 16:53:10', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (315, 8, 4, 100, '2012-05-08 16:53:10', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (316, 13, 4, 1048, '2012-05-08 16:53:10', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (317, 8, 4, 0, '2012-05-08 17:01:30', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (318, 6, 4, 200, '2012-05-08 17:01:30', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (319, 9, 4, 746, '2012-05-08 17:01:30', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (320, 6, 4, 0, '2012-05-08 17:05:15', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (321, 15, 4, 8435, '2012-05-08 17:05:15', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (322, 7, 4, 200, '2012-05-08 17:06:22', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (323, 6, 4, 200, '2012-05-08 17:06:22', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (324, 35, 4, 37556, '2012-05-08 17:06:22', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (325, 6, 4, 0, '2012-05-08 17:07:29', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (326, 16, 4, 5390, '2012-05-08 17:07:29', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (327, 35, 0, 2000, '2012-05-08 17:26:17', 1, 'ทดสอบ');
INSERT INTO `system_point` VALUES (328, 6, 0, 500, '2012-05-09 17:13:57', 1, '');
INSERT INTO `system_point` VALUES (329, 6, 0, 5000, '2012-05-09 17:18:04', 1, '');
INSERT INTO `system_point` VALUES (330, 16, 0, 2031, '2012-05-09 18:20:06', 1, '');
INSERT INTO `system_point` VALUES (331, 8, 2, 100, '2012-05-09 18:22:35', 1, '');
INSERT INTO `system_point` VALUES (332, 6, 2, 100, '2012-05-09 18:22:35', 1, '');
INSERT INTO `system_point` VALUES (333, 46, 0, 1682, '2012-05-09 18:22:54', 1, '');
INSERT INTO `system_point` VALUES (334, 6, 2, 100, '2012-05-09 18:48:44', 1, '');
INSERT INTO `system_point` VALUES (335, 8, 4, 0, '2012-05-09 18:52:30', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (336, 6, 4, 200, '2012-05-09 18:52:30', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (337, 46, 4, 182, '2012-05-09 18:52:30', 0, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (338, 6, 0, 1431, '2012-05-15 10:53:19', 1, '');
INSERT INTO `system_point` VALUES (339, 7, 0, 1923, '2012-05-15 10:53:36', 1, '');
INSERT INTO `system_point` VALUES (340, 8, 0, 1565, '2012-05-15 10:53:54', 1, '');
INSERT INTO `system_point` VALUES (341, 9, 0, 1449, '2012-05-15 11:05:08', 1, '');
INSERT INTO `system_point` VALUES (342, 45, 2, 100, '2012-05-15 12:46:15', 1, '');
INSERT INTO `system_point` VALUES (343, 6, 2, 100, '2012-05-15 12:46:15', 1, '');
INSERT INTO `system_point` VALUES (344, 45, 2, 100, '2012-05-15 12:46:37', 1, '');
INSERT INTO `system_point` VALUES (345, 6, 2, 100, '2012-05-15 12:46:37', 1, '');
INSERT INTO `system_point` VALUES (346, 45, 2, 100, '2012-05-15 12:47:04', 1, '');
INSERT INTO `system_point` VALUES (347, 6, 2, 100, '2012-05-15 12:47:04', 1, '');
INSERT INTO `system_point` VALUES (348, 45, 2, 100, '2012-05-15 12:47:20', 1, '');
INSERT INTO `system_point` VALUES (349, 6, 2, 100, '2012-05-15 12:47:20', 1, '');
INSERT INTO `system_point` VALUES (350, 6, 3, 50, '2012-05-15 12:51:06', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (351, 16, 2, 100, '2012-05-15 12:53:58', 1, '');
INSERT INTO `system_point` VALUES (352, 6, 2, 100, '2012-05-15 12:53:58', 1, '');
INSERT INTO `system_point` VALUES (353, 16, 2, 100, '2012-05-15 12:54:10', 1, '');
INSERT INTO `system_point` VALUES (354, 6, 2, 100, '2012-05-15 12:54:10', 1, '');
INSERT INTO `system_point` VALUES (355, 16, 2, 100, '2012-05-15 12:54:25', 1, '');
INSERT INTO `system_point` VALUES (356, 6, 2, 100, '2012-05-15 12:54:25', 1, '');
INSERT INTO `system_point` VALUES (357, 16, 2, 100, '2012-05-15 12:54:42', 1, '');
INSERT INTO `system_point` VALUES (358, 6, 2, 100, '2012-05-15 12:54:42', 1, '');
INSERT INTO `system_point` VALUES (359, 8, 2, 100, '2012-05-15 12:55:08', 1, '');
INSERT INTO `system_point` VALUES (360, 6, 2, 100, '2012-05-15 12:55:08', 1, '');
INSERT INTO `system_point` VALUES (361, 8, 2, 100, '2012-05-15 12:55:18', 1, '');
INSERT INTO `system_point` VALUES (362, 6, 2, 100, '2012-05-15 12:55:18', 1, '');
INSERT INTO `system_point` VALUES (363, 7, 2, 100, '2012-05-15 14:08:03', 1, '');
INSERT INTO `system_point` VALUES (364, 6, 2, 100, '2012-05-15 14:08:03', 1, '');
INSERT INTO `system_point` VALUES (365, 8, 2, 100, '2012-05-15 14:08:26', 1, '');
INSERT INTO `system_point` VALUES (366, 6, 2, 100, '2012-05-15 14:08:26', 1, '');
INSERT INTO `system_point` VALUES (367, 15, 2, 100, '2012-05-15 14:08:51', 1, '');
INSERT INTO `system_point` VALUES (368, 6, 2, 100, '2012-05-15 14:08:51', 1, '');
INSERT INTO `system_point` VALUES (369, 15, 2, 100, '2012-05-15 14:09:03', 1, '');
INSERT INTO `system_point` VALUES (370, 6, 2, 100, '2012-05-15 14:09:03', 1, '');
INSERT INTO `system_point` VALUES (371, 15, 2, 100, '2012-05-15 14:09:12', 1, '');
INSERT INTO `system_point` VALUES (372, 6, 2, 100, '2012-05-15 14:09:12', 1, '');
INSERT INTO `system_point` VALUES (373, 15, 2, 100, '2012-05-15 14:09:22', 1, '');
INSERT INTO `system_point` VALUES (374, 6, 2, 100, '2012-05-15 14:09:22', 1, '');
INSERT INTO `system_point` VALUES (375, 15, 2, 100, '2012-05-15 14:09:31', 1, '');
INSERT INTO `system_point` VALUES (376, 6, 2, 100, '2012-05-15 14:09:31', 1, '');
INSERT INTO `system_point` VALUES (377, 16, 2, 100, '2012-05-15 14:09:54', 1, '');
INSERT INTO `system_point` VALUES (378, 6, 2, 100, '2012-05-15 14:09:54', 1, '');
INSERT INTO `system_point` VALUES (379, 45, 2, 100, '2012-05-15 14:10:18', 1, '');
INSERT INTO `system_point` VALUES (380, 6, 2, 100, '2012-05-15 14:10:18', 1, '');
INSERT INTO `system_point` VALUES (381, 6, 4, 0, '2012-05-15 15:20:49', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (382, 7, 4, 7968, '2012-05-15 15:20:49', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (383, 6, 3, 100, '2012-05-18 15:43:02', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (384, 6, 4, 0, '2012-05-15 15:55:26', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (385, 8, 4, 465, '2012-05-15 15:55:26', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (386, 6, 4, 25000, '2012-05-17 11:43:08', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (387, 8, 4, 10000, '2012-05-17 11:43:08', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (388, 15, 4, 10000, '2012-05-17 11:43:08', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (389, 16, 4, 10000, '2012-05-17 11:43:08', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (390, 45, 4, 10000, '2012-05-17 11:43:08', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (391, 6, 4, 1500, '2012-05-17 11:48:03', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (392, 8, 4, 600, '2012-05-17 11:48:03', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (393, 15, 4, 600, '2012-05-17 11:48:03', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (394, 16, 4, 600, '2012-05-17 11:48:03', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (395, 45, 4, 600, '2012-05-17 11:48:03', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (396, 6, 4, 225, '2012-05-17 11:48:52', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (397, 8, 4, 90, '2012-05-17 11:48:52', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (398, 15, 4, 90, '2012-05-17 11:48:52', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (399, 16, 4, 90, '2012-05-17 11:48:52', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (400, 45, 4, 90, '2012-05-17 11:48:52', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (401, 6, 4, 1250, '2012-05-17 11:49:40', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (402, 8, 4, 500, '2012-05-17 11:49:40', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (403, 15, 4, 500, '2012-05-17 11:49:40', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (404, 16, 4, 500, '2012-05-17 11:49:40', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (405, 45, 4, 500, '2012-05-17 11:49:40', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (406, 6, 4, 49000, '2012-05-17 12:04:19', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (407, 8, 4, 19600, '2012-05-17 12:04:19', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (408, 15, 4, 19600, '2012-05-17 12:04:19', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (409, 16, 4, 19600, '2012-05-17 12:04:19', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (410, 45, 4, 19600, '2012-05-17 12:04:19', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (411, 6, 4, 63, '2012-05-17 12:15:38', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (412, 8, 4, 25, '2012-05-17 12:15:38', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (413, 15, 4, 25, '2012-05-17 12:15:38', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (414, 16, 4, 25, '2012-05-17 12:15:38', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (415, 45, 4, 25, '2012-05-17 12:15:38', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (416, 6, 4, 764, '2012-05-17 12:18:27', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (417, 8, 4, 306, '2012-05-17 12:18:27', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (418, 15, 4, 306, '2012-05-17 12:18:27', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (419, 16, 4, 306, '2012-05-17 12:18:27', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (420, 45, 4, 306, '2012-05-17 12:18:27', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (421, 6, 4, 0, '2012-05-17 12:22:03', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (422, 45, 4, 30121, '2012-05-17 12:22:03', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (423, 7, 4, 0, '2012-05-17 12:22:08', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (424, 6, 4, 200, '2012-05-17 12:22:08', 1, 'รายการจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (425, 18, 4, 3500, '2012-05-17 12:22:08', 1, 'รายการคงเลือจ่าย PV แผนพิเศษ');
INSERT INTO `system_point` VALUES (426, 6, 5, 50, '2012-05-17 12:27:34', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (427, 8, 5, 20, '2012-05-17 12:27:34', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (428, 15, 5, 20, '2012-05-17 12:27:34', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (429, 16, 5, 20, '2012-05-17 12:27:34', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (430, 45, 5, 20, '2012-05-17 12:27:34', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (431, 6, 5, 286, '2012-05-17 14:49:26', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (432, 8, 5, 114, '2012-05-17 14:49:26', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (433, 15, 5, 114, '2012-05-17 14:49:26', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (434, 16, 5, 114, '2012-05-17 14:49:26', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (435, 45, 5, 114, '2012-05-17 14:49:26', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (436, 6, 5, 286, '2012-05-17 15:00:18', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (437, 8, 5, 114, '2012-05-17 15:00:18', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (438, 15, 5, 114, '2012-05-17 15:00:18', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (439, 16, 5, 114, '2012-05-17 15:00:18', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (440, 45, 5, 114, '2012-05-17 15:00:18', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (441, 6, 5, 286, '2012-05-17 15:01:11', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (442, 8, 5, 114, '2012-05-17 15:01:11', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (443, 15, 5, 114, '2012-05-17 15:01:11', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (444, 16, 5, 114, '2012-05-17 15:01:11', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (445, 45, 5, 114, '2012-05-17 15:01:11', 1, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 05/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (446, 14, 2, 100, '2012-05-17 15:29:24', 1, '');
INSERT INTO `system_point` VALUES (447, 7, 2, 100, '2012-05-17 15:29:24', 1, '');
INSERT INTO `system_point` VALUES (448, 6, 2, 800, '2012-05-17 15:29:24', 1, '');
INSERT INTO `system_point` VALUES (449, 14, 2, 100, '2012-05-17 15:31:41', 1, '');
INSERT INTO `system_point` VALUES (450, 7, 2, 100, '2012-05-17 15:31:41', 1, '');
INSERT INTO `system_point` VALUES (451, 6, 2, 800, '2012-05-17 15:31:41', 1, '');
INSERT INTO `system_point` VALUES (452, 14, 2, 100, '2012-05-17 15:33:02', 1, '');
INSERT INTO `system_point` VALUES (453, 7, 2, 100, '2012-05-17 15:33:02', 1, '');
INSERT INTO `system_point` VALUES (454, 6, 2, 800, '2012-05-17 15:33:02', 1, '');
INSERT INTO `system_point` VALUES (455, 14, 3, 100, '2012-05-17 17:03:17', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (456, 7, 3, 50, '2012-05-17 17:03:17', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (457, 6, 3, 200, '2012-05-17 17:03:17', 1, 'สายงานต่ออายุวีไอพี 1 เดือน');
INSERT INTO `system_point` VALUES (458, 6, 0, 1825, '2012-05-26 13:49:29', 1, '');
INSERT INTO `system_point` VALUES (459, 6, 0, 1750, '2012-05-28 12:06:05', 1, '');
INSERT INTO `system_point` VALUES (460, 6, 4, 250, '2012-05-28 12:09:00', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (461, 7, 0, 2000, '2012-05-28 12:09:23', 1, '');
INSERT INTO `system_point` VALUES (462, 14, 0, 2000, '2012-05-28 12:09:33', 1, '');
INSERT INTO `system_point` VALUES (463, 15, 0, 2500, '2012-05-28 12:09:45', 1, '');
INSERT INTO `system_point` VALUES (464, 16, 0, 1500, '2012-05-28 12:09:56', 1, '');
INSERT INTO `system_point` VALUES (465, 0, 0, 2500, '2012-05-28 12:10:05', 0, '');
INSERT INTO `system_point` VALUES (466, 6, 4, 0, '2012-05-28 12:10:21', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (467, 16, 4, 0, '2012-05-28 12:10:21', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (468, 6, 4, 0, '2012-05-28 12:10:31', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (469, 15, 4, 1000, '2012-05-28 12:10:31', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (470, 11, 0, 5000, '2012-05-28 12:11:51', 1, '');
INSERT INTO `system_point` VALUES (471, 10, 4, 0, '2012-05-28 12:12:02', 1, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (472, 9, 4, 200, '2012-05-28 12:12:02', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (473, 8, 4, 200, '2012-05-28 12:12:02', 1, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (474, 6, 4, 100, '2012-05-28 12:12:02', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (475, 11, 4, 4900, '2012-05-28 12:12:02', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (476, 7, 4, 0, '2012-05-28 12:12:19', 1, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (477, 6, 4, 200, '2012-05-28 12:12:19', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (478, 14, 4, 1115, '2012-05-28 12:12:19', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (479, 6, 4, 0, '2012-05-28 12:12:24', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (480, 7, 4, 850, '2012-05-28 12:12:24', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (481, 12, 0, 1529, '2012-05-29 15:21:54', 1, '');
INSERT INTO `system_point` VALUES (482, 11, 4, 350, '2012-05-29 15:22:43', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (483, 10, 4, 200, '2012-05-29 15:22:43', 1, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (484, 9, 4, 200, '2012-05-29 15:22:43', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (485, 8, 4, 150, '2012-05-29 15:22:43', 1, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (486, 6, 4, 100, '2012-05-29 15:22:43', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (487, 12, 4, 29, '2012-05-29 15:22:43', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (488, 36, 0, 1664, '2012-05-30 16:59:18', 1, '');
INSERT INTO `system_point` VALUES (489, 45, 4, 350, '2012-05-30 17:00:00', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (490, 6, 4, 200, '2012-05-30 17:00:00', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (491, 36, 4, 164, '2012-05-30 17:00:00', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (492, 10, 0, 1538, '2012-05-30 17:01:07', 1, '');
INSERT INTO `system_point` VALUES (493, 9, 4, 350, '2012-05-30 17:01:57', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (494, 8, 4, 200, '2012-05-30 17:01:57', 1, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (495, 6, 4, 200, '2012-05-30 17:01:57', 0, 'รายการจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (496, 10, 4, 628, '2012-05-30 17:01:57', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (497, 8, 0, 1520, '2012-05-30 18:16:34', 1, '');
INSERT INTO `system_point` VALUES (498, 6, 4, 100, '2012-05-30 18:16:41', 0, 'ได้รับรายได้แผนพิเศษจาก คุณ โมฮัมหมัด โจโฉ');
INSERT INTO `system_point` VALUES (499, 8, 4, 570, '2012-05-30 18:16:41', 0, 'รายการคงเลือจ่าย รายได้ แผนพิเศษ');
INSERT INTO `system_point` VALUES (500, 6, 5, 1, '2012-08-14 12:04:14', 0, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 08/2012 จำนวน 5%');
INSERT INTO `system_point` VALUES (501, 8, 5, 1, '2012-08-14 12:04:14', 0, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 08/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (502, 15, 5, 1, '2012-08-14 12:04:14', 0, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 08/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (503, 16, 5, 1, '2012-08-14 12:04:14', 0, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 08/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (504, 45, 5, 1, '2012-08-14 12:04:14', 0, 'รายได้ตามแผนจ่าย All Sale ประจำเดือน 08/2012 จำนวน 2%');
INSERT INTO `system_point` VALUES (505, 6, 0, 500, '2012-08-14 16:49:48', 0, '');
INSERT INTO `system_point` VALUES (506, 14, 2, 100, '2012-08-15 12:00:26', 0, '');
INSERT INTO `system_point` VALUES (507, 7, 2, 100, '2012-08-15 12:00:26', 0, '');
INSERT INTO `system_point` VALUES (508, 6, 2, 800, '2012-08-15 12:00:26', 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_point_dra`
-- 

CREATE TABLE `system_point_dra` (
  `spr_id` int(11) NOT NULL auto_increment,
  `sli_id` int(11) NOT NULL,
  `spr_pt` int(11) NOT NULL,
  `spr_comment` varchar(500) collate utf8_unicode_ci NOT NULL,
  `spr_date` datetime NOT NULL,
  `spr_ck` tinyint(4) NOT NULL,
  PRIMARY KEY  (`spr_id`),
  KEY `sli_id` (`sli_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `system_point_dra`
-- 

INSERT INTO `system_point_dra` VALUES (1, 6, 2400, '', '2011-11-15 12:00:59', 2);
INSERT INTO `system_point_dra` VALUES (2, 6, 1000, 'โอนเงินไปเรียบร้อย', '2011-11-15 13:17:48', 1);
INSERT INTO `system_point_dra` VALUES (3, 6, 1100, 'ยังไม่รับโอนวันนี้อ่ะ', '2011-11-15 13:17:57', 2);
INSERT INTO `system_point_dra` VALUES (4, 6, 500, 'โอนเงินให้แล้ว', '2011-11-15 13:18:04', 1);
INSERT INTO `system_point_dra` VALUES (5, 6, 2000, 'ทำรายการโอนเงินไปไห้แล้ว', '2011-11-15 13:18:12', 1);
INSERT INTO `system_point_dra` VALUES (9, 7, 100, 'ต่ออายุสมาชิกแบบใช้ PV แบบ 1 เดือน', '2011-11-18 14:24:58', 1);
INSERT INTO `system_point_dra` VALUES (6, 6, 700, '', '2011-11-16 14:34:56', 1);
INSERT INTO `system_point_dra` VALUES (7, 6, 5100, '', '2011-11-16 14:35:15', 2);
INSERT INTO `system_point_dra` VALUES (8, 6, 600, '', '2011-11-16 14:36:19', 1);
INSERT INTO `system_point_dra` VALUES (10, 6, 1200, 'ต่ออายุสมาชิกแบบใช้ PV แบบ 12 เดือน', '2011-11-18 14:33:04', 1);
INSERT INTO `system_point_dra` VALUES (11, 6, 1200, 'ต่ออายุสมาชิกแบบใช้ PV แบบ 12 เดือน', '2011-11-18 14:33:11', 1);
INSERT INTO `system_point_dra` VALUES (12, 6, 5000, 'ผิดพลาดจากการจ่าย PV', '2011-11-22 14:17:53', 1);
INSERT INTO `system_point_dra` VALUES (13, 35, 2400, 'ต่ออายุสมาชิกโดยใช้ PV แบบ 12 เดือน', '2012-01-31 14:11:34', 1);
INSERT INTO `system_point_dra` VALUES (14, 35, 600, 'ต่ออายุสมาชิกโดยใช้ PV แบบ 3 เดือน', '2012-01-31 14:13:16', 1);
INSERT INTO `system_point_dra` VALUES (15, 35, 200, 'ต่ออายุสมาชิกโดยใช้ PV แบบ 1 เดือน', '2012-01-31 14:15:11', 1);
INSERT INTO `system_point_dra` VALUES (16, 35, 600, 'ต่ออายุสมาชิกโดยใช้ PV แบบ 3 เดือน', '2012-01-31 14:15:43', 1);
INSERT INTO `system_point_dra` VALUES (17, 11, 500, '', '2012-04-23 16:54:33', 1);
INSERT INTO `system_point_dra` VALUES (18, 6, 3000, 'ฮ๋าจะถอน', '2012-05-08 11:42:00', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_point_total`
-- 

CREATE TABLE `system_point_total` (
  `sto_id` int(11) NOT NULL auto_increment,
  `sli_id` int(7) NOT NULL,
  `sto_ptotal` int(11) NOT NULL,
  `sto_cutdate` date NOT NULL,
  `sto_cutcheck` tinyint(1) NOT NULL,
  PRIMARY KEY  (`sto_id`),
  KEY `sli_id` (`sli_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `system_point_total`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `system_product`
-- 

CREATE TABLE `system_product` (
  `spd_id` int(5) NOT NULL auto_increment,
  `spd_sc_id` tinyint(4) NOT NULL,
  `spd_name` varchar(300) collate utf8_unicode_ci NOT NULL,
  `spd_detail` mediumtext collate utf8_unicode_ci NOT NULL,
  `spd_price` int(5) NOT NULL,
  `spd_point` int(5) NOT NULL,
  `spd_buy` int(7) NOT NULL,
  `spd_new` tinyint(1) NOT NULL,
  `spd_code` varchar(10) collate utf8_unicode_ci NOT NULL,
  `spd_date` date NOT NULL,
  `spd_discut` tinyint(4) NOT NULL,
  `spd_pic` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`spd_id`),
  KEY `spd_sc_id` (`spd_sc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `system_product`
-- 

INSERT INTO `system_product` VALUES (1, 1, 'Samsung Galaxy Nexus White', 'รายละเอียดของสินค้า...', 19, 15, 0, 0, 'SSG001', '2012-04-26', 0, 'MacBook_Air.jpg');
INSERT INTO `system_product` VALUES (2, 1, 'Samsung Galaxy Nexus White', 'รายละเอียดของสินค้า...', 19400, 15, 0, 0, 'SSG001', '2012-05-02', 0, 'Jellyfish.jpg');
INSERT INTO `system_product` VALUES (3, 2, 'Hello Kitty Digital Video Player', 'รายละเอียดของสินค้า...', 1000, 15, 0, 0, 'ET7001', '2012-05-02', 0, 'Chrysanthemum.jpg');
INSERT INTO `system_product` VALUES (4, 2, 'Hello Kitty Digital Video Player', 'รายละเอียดของสินค้า...', 19900, 15, 0, 0, 'SSG001', '2012-05-02', 0, 'Penguins.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_renew`
-- 

CREATE TABLE `system_renew` (
  `srn_id` int(11) NOT NULL auto_increment,
  `sli_id` int(6) NOT NULL,
  `srn_upd` datetime NOT NULL,
  `srn_plane` tinyint(4) NOT NULL,
  PRIMARY KEY  (`srn_id`),
  KEY `sli_id` (`sli_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

-- 
-- Dumping data for table `system_renew`
-- 

INSERT INTO `system_renew` VALUES (1, 14, '2011-11-11 11:36:12', 1);
INSERT INTO `system_renew` VALUES (2, 14, '2011-11-11 11:42:39', 3);
INSERT INTO `system_renew` VALUES (3, 14, '2011-11-11 11:43:07', 1);
INSERT INTO `system_renew` VALUES (4, 8, '2011-11-11 14:59:32', 6);
INSERT INTO `system_renew` VALUES (5, 13, '2011-11-11 15:06:23', 1);
INSERT INTO `system_renew` VALUES (6, 8, '2011-11-11 15:06:51', 1);
INSERT INTO `system_renew` VALUES (7, 9, '2011-11-11 15:08:39', 1);
INSERT INTO `system_renew` VALUES (8, 9, '2011-11-11 15:10:13', 1);
INSERT INTO `system_renew` VALUES (9, 9, '2011-11-11 15:10:49', 3);
INSERT INTO `system_renew` VALUES (10, 9, '2011-11-11 15:12:57', 3);
INSERT INTO `system_renew` VALUES (11, 13, '2011-11-11 15:18:42', 1);
INSERT INTO `system_renew` VALUES (12, 13, '2011-11-11 15:19:49', 1);
INSERT INTO `system_renew` VALUES (13, 13, '2011-11-11 15:20:26', 1);
INSERT INTO `system_renew` VALUES (14, 13, '2011-11-11 15:21:33', 1);
INSERT INTO `system_renew` VALUES (15, 13, '2011-11-11 15:21:43', 3);
INSERT INTO `system_renew` VALUES (16, 13, '2011-11-11 15:22:11', 1);
INSERT INTO `system_renew` VALUES (17, 13, '2011-11-11 15:22:17', 3);
INSERT INTO `system_renew` VALUES (18, 13, '2011-11-11 16:12:05', 1);
INSERT INTO `system_renew` VALUES (19, 15, '2011-11-11 17:36:49', 6);
INSERT INTO `system_renew` VALUES (20, 13, '2011-11-12 10:44:59', 3);
INSERT INTO `system_renew` VALUES (21, 6, '2011-11-16 16:21:34', 1);
INSERT INTO `system_renew` VALUES (22, 6, '2011-11-16 16:21:41', 3);
INSERT INTO `system_renew` VALUES (23, 6, '2011-11-16 16:21:47', 6);
INSERT INTO `system_renew` VALUES (24, 6, '2011-11-16 16:21:53', 12);
INSERT INTO `system_renew` VALUES (25, 6, '2011-11-18 14:01:44', 1);
INSERT INTO `system_renew` VALUES (26, 7, '2011-11-18 14:20:41', 1);
INSERT INTO `system_renew` VALUES (27, 7, '2011-11-18 14:20:43', 1);
INSERT INTO `system_renew` VALUES (28, 7, '2011-11-18 14:24:58', 1);
INSERT INTO `system_renew` VALUES (29, 6, '2011-11-18 14:33:04', 12);
INSERT INTO `system_renew` VALUES (30, 6, '2011-11-18 14:33:11', 12);
INSERT INTO `system_renew` VALUES (31, 16, '2011-11-25 10:15:22', 1);
INSERT INTO `system_renew` VALUES (32, 16, '2011-11-25 10:44:23', 99);
INSERT INTO `system_renew` VALUES (33, 16, '2011-11-25 10:47:00', 99);
INSERT INTO `system_renew` VALUES (34, 16, '2011-11-25 10:47:11', 99);
INSERT INTO `system_renew` VALUES (35, 16, '2011-11-25 10:48:26', 99);
INSERT INTO `system_renew` VALUES (36, 16, '2011-11-25 10:49:06', 3);
INSERT INTO `system_renew` VALUES (37, 16, '2011-11-25 10:49:24', 99);
INSERT INTO `system_renew` VALUES (38, 16, '2012-01-06 10:51:21', 99);
INSERT INTO `system_renew` VALUES (39, 16, '2012-01-06 10:51:28', 1);
INSERT INTO `system_renew` VALUES (40, 11, '2012-01-31 13:53:48', 1);
INSERT INTO `system_renew` VALUES (41, 11, '2012-01-31 13:56:41', 1);
INSERT INTO `system_renew` VALUES (42, 35, '2012-01-31 14:01:21', 1);
INSERT INTO `system_renew` VALUES (43, 35, '2012-01-31 14:11:34', 12);
INSERT INTO `system_renew` VALUES (44, 35, '2012-01-31 14:13:16', 3);
INSERT INTO `system_renew` VALUES (45, 35, '2012-01-31 14:15:11', 1);
INSERT INTO `system_renew` VALUES (46, 35, '2012-01-31 14:15:43', 3);
INSERT INTO `system_renew` VALUES (47, 11, '2012-05-07 16:49:55', 1);
INSERT INTO `system_renew` VALUES (48, 35, '2012-05-07 16:50:58', 1);
INSERT INTO `system_renew` VALUES (49, 12, '2012-05-07 16:52:06', 1);
INSERT INTO `system_renew` VALUES (50, 12, '2012-05-07 16:52:16', 3);
INSERT INTO `system_renew` VALUES (51, 12, '2012-05-07 16:52:26', 12);
INSERT INTO `system_renew` VALUES (52, 12, '2012-05-07 16:53:01', 1);
INSERT INTO `system_renew` VALUES (53, 14, '2012-05-15 12:51:06', 1);
INSERT INTO `system_renew` VALUES (54, 7, '2012-05-15 12:51:19', 99);
INSERT INTO `system_renew` VALUES (55, 11, '2012-05-15 12:51:29', 99);
INSERT INTO `system_renew` VALUES (56, 19, '2012-05-15 12:51:37', 99);
INSERT INTO `system_renew` VALUES (57, 16, '2012-05-15 12:51:45', 99);
INSERT INTO `system_renew` VALUES (58, 18, '2012-05-15 12:51:52', 99);
INSERT INTO `system_renew` VALUES (59, 17, '2012-05-15 12:52:00', 99);
INSERT INTO `system_renew` VALUES (60, 10, '2012-05-15 12:52:48', 99);
INSERT INTO `system_renew` VALUES (61, 7, '2012-05-18 15:43:02', 1);
INSERT INTO `system_renew` VALUES (62, 11, '2012-05-15 18:19:18', 99);
INSERT INTO `system_renew` VALUES (63, 16, '2012-05-15 18:19:33', 99);
INSERT INTO `system_renew` VALUES (64, 6, '2012-05-17 16:48:27', 1);
INSERT INTO `system_renew` VALUES (65, 35, '2012-05-17 17:03:17', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_reply`
-- 

CREATE TABLE `system_reply` (
  `sr_id` int(5) NOT NULL auto_increment,
  `sr_target` int(5) NOT NULL,
  `sr_sm_id` int(5) NOT NULL,
  PRIMARY KEY  (`sr_id`),
  KEY `sr_target` (`sr_target`,`sr_sm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

-- 
-- Dumping data for table `system_reply`
-- 

INSERT INTO `system_reply` VALUES (1, 1, 6);
INSERT INTO `system_reply` VALUES (2, 6, 7);
INSERT INTO `system_reply` VALUES (3, 6, 8);
INSERT INTO `system_reply` VALUES (4, 6, 9);
INSERT INTO `system_reply` VALUES (5, 6, 10);
INSERT INTO `system_reply` VALUES (6, 6, 11);
INSERT INTO `system_reply` VALUES (7, 6, 12);
INSERT INTO `system_reply` VALUES (8, 6, 13);
INSERT INTO `system_reply` VALUES (9, 6, 14);
INSERT INTO `system_reply` VALUES (10, 6, 15);
INSERT INTO `system_reply` VALUES (11, 7, 16);
INSERT INTO `system_reply` VALUES (12, 6, 17);
INSERT INTO `system_reply` VALUES (13, 6, 18);
INSERT INTO `system_reply` VALUES (14, 6, 19);
INSERT INTO `system_reply` VALUES (15, 6, 20);
INSERT INTO `system_reply` VALUES (16, 8, 22);
INSERT INTO `system_reply` VALUES (17, 12, 23);
INSERT INTO `system_reply` VALUES (18, 6, 24);
INSERT INTO `system_reply` VALUES (19, 10, 25);
INSERT INTO `system_reply` VALUES (20, 10, 26);
INSERT INTO `system_reply` VALUES (21, 10, 27);
INSERT INTO `system_reply` VALUES (22, 16, 28);
INSERT INTO `system_reply` VALUES (23, 8, 29);
INSERT INTO `system_reply` VALUES (24, 8, 30);
INSERT INTO `system_reply` VALUES (25, 9, 31);
INSERT INTO `system_reply` VALUES (26, 9, 32);
INSERT INTO `system_reply` VALUES (27, 15, 33);
INSERT INTO `system_reply` VALUES (28, 8, 34);
INSERT INTO `system_reply` VALUES (29, 6, 35);
INSERT INTO `system_reply` VALUES (30, 9, 36);
INSERT INTO `system_reply` VALUES (31, 6, 37);
INSERT INTO `system_reply` VALUES (32, 6, 38);
INSERT INTO `system_reply` VALUES (33, 6, 39);
INSERT INTO `system_reply` VALUES (34, 6, 40);
INSERT INTO `system_reply` VALUES (35, 6, 41);
INSERT INTO `system_reply` VALUES (36, 9, 42);
INSERT INTO `system_reply` VALUES (37, 16, 43);
INSERT INTO `system_reply` VALUES (38, 16, 44);
INSERT INTO `system_reply` VALUES (39, 6, 45);
INSERT INTO `system_reply` VALUES (40, 1, 46);
INSERT INTO `system_reply` VALUES (41, 1, 47);
INSERT INTO `system_reply` VALUES (42, 1, 48);
INSERT INTO `system_reply` VALUES (43, 1, 49);
INSERT INTO `system_reply` VALUES (44, 1, 50);
INSERT INTO `system_reply` VALUES (45, 1, 51);
INSERT INTO `system_reply` VALUES (46, 1, 52);
INSERT INTO `system_reply` VALUES (47, 1, 53);
INSERT INTO `system_reply` VALUES (48, 1, 54);
INSERT INTO `system_reply` VALUES (49, 1, 55);
INSERT INTO `system_reply` VALUES (50, 1, 56);
INSERT INTO `system_reply` VALUES (51, 1, 57);
INSERT INTO `system_reply` VALUES (52, 1, 58);
INSERT INTO `system_reply` VALUES (53, 1, 59);
INSERT INTO `system_reply` VALUES (54, 1, 60);

-- --------------------------------------------------------

-- 
-- Table structure for table `system_sliders`
-- 

CREATE TABLE `system_sliders` (
  `sld_id` int(4) NOT NULL auto_increment,
  `sld_name` varchar(300) NOT NULL,
  `sld_image` text NOT NULL,
  `sld_link` varchar(500) NOT NULL,
  PRIMARY KEY  (`sld_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `system_sliders`
-- 

INSERT INTO `system_sliders` VALUES (1, 'DEMO SLIDE SHOW PREVIEW', 'hd_wall_9900.jpg', 'http://www.membertopupnetwork.com');
INSERT INTO `system_sliders` VALUES (2, 'DEMO SLIDE SHOW PREVIEW', 'hd_wall_8122.jpg', 'http://www.membertopupnetwork.com');
INSERT INTO `system_sliders` VALUES (3, 'DEMO SLIDE SHOW PREVIEW', 'hd_wall_1593.jpg', 'http://www.membertopupnetwork.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `system_webboard`
-- 

CREATE TABLE `system_webboard` (
  `sw_id` int(6) NOT NULL auto_increment,
  `sw_target` int(6) NOT NULL,
  `sw_sm_id` int(5) NOT NULL,
  `sw_title` varchar(400) collate utf8_unicode_ci NOT NULL,
  `sw_detail` longtext collate utf8_unicode_ci NOT NULL,
  `sw_date` datetime NOT NULL,
  `sw_view` int(5) NOT NULL,
  `sw_level` tinyint(1) NOT NULL,
  `sw_ip` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sw_id`),
  KEY `sw_sm_id` (`sw_sm_id`),
  KEY `sw_target` (`sw_target`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `system_webboard`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `system_webpage`
-- 

CREATE TABLE `system_webpage` (
  `swp_id` int(11) NOT NULL auto_increment,
  `swp_name` varchar(500) NOT NULL,
  `swp_desc` text NOT NULL,
  PRIMARY KEY  (`swp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `system_webpage`
-- 

INSERT INTO `system_webpage` VALUES (1, 'oppatunity', 'oppatunity oppatunity<br />');
INSERT INTO `system_webpage` VALUES (2, 'onlinelearning', 'onlinelearning onlinelearning<br />');
INSERT INTO `system_webpage` VALUES (3, 'testimonials', 'testimonials testimonials<br />');
INSERT INTO `system_webpage` VALUES (4, 'vdo', '<iframe width="513" height="317" src="http://www.youtube.com/embed/9bZkp7q19f0" frameborder="0" allowfullscreen></iframe>');
INSERT INTO `system_webpage` VALUES (5, 'faq', 'faq faq faq<br />');
INSERT INTO `system_webpage` VALUES (6, 'contactus', 'contactus contactus<br />');
INSERT INTO `system_webpage` VALUES (7, 'meetingcalendar', 'meetingcalendar meetingcalendar<br />');
INSERT INTO `system_webpage` VALUES (8, 'promotion', 'promotion promotion promotion');
INSERT INTO `system_webpage` VALUES (10, 'aboutus', 'aboutus');
