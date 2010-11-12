-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.27-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema quanlynhadat
--

CREATE DATABASE IF NOT EXISTS quanlynhadat;
USE quanlynhadat;

--
-- Definition of table `chu_nha`
--

DROP TABLE IF EXISTS `chu_nha`;
CREATE TABLE `chu_nha` (
  `ID_ChuNha` int(10) unsigned NOT NULL auto_increment,
  `TenChuNha` varchar(45) NOT NULL,
  `DiaChi` text NOT NULL,
  `DienThoai` varchar(20) NOT NULL,
  PRIMARY KEY  (`ID_ChuNha`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chu_nha`
--

/*!40000 ALTER TABLE `chu_nha` DISABLE KEYS */;
INSERT INTO `chu_nha` (`ID_ChuNha`,`TenChuNha`,`DiaChi`,`DienThoai`) VALUES 
 (1,'Nguyá»…n HoÃ ng Tuáº¥n Anh','\r\n\r\n<p>Nguyá»…n Thá»‹ Minh Khai - Q1 - HCM</p>','0987677763'),
 (2,'BÃ¹i Quang Tung','233 LÃ½ ThÃ¡nh TÃ´ng - Quáº­n 6 - TP HCM','01234837833'),
 (3,'Mai Quang Tuáº¥n','Quáº­n 9- HCM','0982763773'),
 (4,'Nguyá»…n Thá»‹ Hoa','45 Nguyá»…n Kiá»‡m-Q.GÃ² Váº¥p-HCM','01287987678'),
 (5,'Tráº§n VÄƒn ToÃ n','\r\n\r\n<p>Äá»“ng Nai</p>','01838938883'),
 (6,'LÃª Ãnh Tuyáº¿t','BÃ¬nh DÆ°Æ¡ng','0976577363'),
 (7,'HoÃ ng Tráº§n CÃ´ng Tuáº¥n','\r\n\r\n<p>23 Nguyá»…n Thá»‹ Minh Khai - Q1</p>','0837823789'),
 (8,'Nguyá»…n Lá»‡ QuyÃªn','PhÆ°á»ng 8 - Q.PhÃº Nhuáº­n','08 3827 233'),
 (9,'LÃª CÃ´ng Anh','Q.6-HCM','0967766122'),
 (10,'Phan Trá»ng HÃ¹ng','HCM','098654545');
/*!40000 ALTER TABLE `chu_nha` ENABLE KEYS */;


--
-- Definition of table `hop_dong`
--

DROP TABLE IF EXISTS `hop_dong`;
CREATE TABLE `hop_dong` (
  `ID_HopDong` int(10) unsigned NOT NULL auto_increment,
  `ChuThich` text,
  `AnHien` tinyint(3) unsigned default '1',
  `TimeBD` datetime NOT NULL,
  `TimeKT` datetime default NULL,
  `NgayKy` datetime NOT NULL,
  `ID_NhaDat` int(10) unsigned default NULL,
  `ID_NguoiThue` int(10) unsigned default NULL,
  `ID_NV` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID_HopDong`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hop_dong`
--

/*!40000 ALTER TABLE `hop_dong` DISABLE KEYS */;
INSERT INTO `hop_dong` (`ID_HopDong`,`ChuThich`,`AnHien`,`TimeBD`,`TimeKT`,`NgayKy`,`ID_NhaDat`,`ID_NguoiThue`,`ID_NV`) VALUES 
 (2,'\r\n',1,'2010-09-01 00:00:00','2010-11-16 00:00:00','2010-09-03 00:00:00',2,3,2),
 (3,'\r\n',1,'2010-09-06 00:00:00','2010-10-29 00:00:00','2010-09-10 00:00:00',11,2,4),
 (4,'\r\n',1,'2010-08-13 00:00:00','2011-09-22 00:00:00','2010-09-10 00:00:00',9,4,1);
/*!40000 ALTER TABLE `hop_dong` ENABLE KEYS */;


--
-- Definition of table `huong_nha`
--

DROP TABLE IF EXISTS `huong_nha`;
CREATE TABLE `huong_nha` (
  `ID_HuongNha` int(10) unsigned NOT NULL auto_increment,
  `TenHuongNha` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID_HuongNha`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `huong_nha`
--

/*!40000 ALTER TABLE `huong_nha` DISABLE KEYS */;
INSERT INTO `huong_nha` (`ID_HuongNha`,`TenHuongNha`) VALUES 
 (1,'TÃ¢y'),
 (2,'ÄÃ´ng'),
 (3,'Nam'),
 (4,'Báº¯c'),
 (5,'TÃ¢y Báº¯c'),
 (6,'ÄÃ´ng Nam'),
 (7,'TÃ¢y Nam'),
 (8,'ÄÃ´ng Báº¯c');
/*!40000 ALTER TABLE `huong_nha` ENABLE KEYS */;


--
-- Definition of table `loai_nha`
--

DROP TABLE IF EXISTS `loai_nha`;
CREATE TABLE `loai_nha` (
  `ID_LoaiNha` int(10) unsigned NOT NULL auto_increment,
  `TenLoaiNha` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID_LoaiNha`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loai_nha`
--

/*!40000 ALTER TABLE `loai_nha` DISABLE KEYS */;
INSERT INTO `loai_nha` (`ID_LoaiNha`,`TenLoaiNha`) VALUES 
 (1,'NhÃ  bÃ¬nh dÃ¢n'),
 (2,'NhÃ  Vip'),
 (3,'NhÃ  táº¡m'),
 (4,'PhÃ²ng Vip'),
 (5,'Chung cÆ°'),
 (6,'Biá»‡t thá»±'),
 (7,'VÄƒn phÃ²ng'),
 (8,'Máº·t báº±ng ');
/*!40000 ALTER TABLE `loai_nha` ENABLE KEYS */;


--
-- Definition of table `nghe_nghiep`
--

DROP TABLE IF EXISTS `nghe_nghiep`;
CREATE TABLE `nghe_nghiep` (
  `ID_NgheNghiep` int(10) unsigned NOT NULL auto_increment,
  `Ten_NgheNghiep` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID_NgheNghiep`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nghe_nghiep`
--

/*!40000 ALTER TABLE `nghe_nghiep` DISABLE KEYS */;
INSERT INTO `nghe_nghiep` (`ID_NgheNghiep`,`Ten_NgheNghiep`) VALUES 
 (1,'GiÃ¡o ViÃªn'),
 (2,'BÃ¡c SÄ©'),
 (3,'KÄ© SÆ°'),
 (4,'Ná»™i Trá»£'),
 (5,'Kiáº¿n TrÃºc SÆ°'),
 (6,'LÃ m NÃ´ng'),
 (7,'Kinh Doanh'),
 (8,'Quáº£n LÃ½ ');
/*!40000 ALTER TABLE `nghe_nghiep` ENABLE KEYS */;


--
-- Definition of table `nguoi_thue`
--

DROP TABLE IF EXISTS `nguoi_thue`;
CREATE TABLE `nguoi_thue` (
  `ID_NguoiThue` int(10) unsigned NOT NULL auto_increment,
  `TenNguoiThue` varchar(45) NOT NULL,
  `DiaChi` text,
  `DienThoai` varchar(20) NOT NULL,
  `KhanNangThue` text,
  `GioiTinh` varchar(20) default NULL,
  `ID_LoaiNha` int(10) unsigned default NULL,
  `ID_QueQuan` int(10) unsigned default NULL,
  `ID_NgheNghiep` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID_NguoiThue`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nguoi_thue`
--

/*!40000 ALTER TABLE `nguoi_thue` DISABLE KEYS */;
INSERT INTO `nguoi_thue` (`ID_NguoiThue`,`TenNguoiThue`,`DiaChi`,`DienThoai`,`KhanNangThue`,`GioiTinh`,`ID_LoaiNha`,`ID_QueQuan`,`ID_NgheNghiep`) VALUES 
 (2,'Van Khanh','HCM\r\n','09328327327','\r\n','1',1,15,1),
 (3,'Tuáº¥n Anh','HCM\r\n','0908923893','\r\n','1',4,16,5),
 (4,'XuÃ¢n Phong','ÄÃ  Náº³ng\r\n','01232398239','\r\n','1',4,19,3);
/*!40000 ALTER TABLE `nguoi_thue` ENABLE KEYS */;


--
-- Definition of table `nha_dat`
--

DROP TABLE IF EXISTS `nha_dat`;
CREATE TABLE `nha_dat` (
  `ID_NhaDat` int(10) unsigned NOT NULL auto_increment,
  `TieuDe` varchar(100) default NULL,
  `Duong` varchar(45) default NULL,
  `SoPTam` int(10) unsigned default NULL,
  `SoPNgu` int(10) unsigned default NULL,
  `TienThue` int(10) unsigned default NULL,
  `DatCoc` int(10) unsigned default NULL,
  `DienTich` int(10) unsigned default NULL,
  `HinhAnh` varchar(45) default NULL,
  `MoTaChiTiet` text,
  `CapDoUuTien` int(10) unsigned default NULL,
  `ID_HuongNha` int(10) unsigned default NULL,
  `ID_LoaiNha` int(10) unsigned default NULL,
  `ID_Quan` int(10) unsigned default NULL,
  `ID_ChuNha` int(10) unsigned default NULL,
  `ID_NV` int(10) unsigned default NULL,
  `NhaMoi` tinyint(3) unsigned default NULL,
  PRIMARY KEY  (`ID_NhaDat`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nha_dat`
--

/*!40000 ALTER TABLE `nha_dat` DISABLE KEYS */;
INSERT INTO `nha_dat` (`ID_NhaDat`,`TieuDe`,`Duong`,`SoPTam`,`SoPNgu`,`TienThue`,`DatCoc`,`DienTich`,`HinhAnh`,`MoTaChiTiet`,`CapDoUuTien`,`ID_HuongNha`,`ID_LoaiNha`,`ID_Quan`,`ID_ChuNha`,`ID_NV`,`NhaMoi`) VALUES 
 (1,'Báº¿n ChÆ°Æ¡ng DÆ°Æ¡ng','Phan ÄÃ¬nh PhÃ¹ng',2,4,20,20,10,'canhochuongduong_1.jpg','\r\n',NULL,5,5,7,1,1,1),
 (2,'NhÃ  á»Ÿ ','34 Nguyá»…n TrÃ£i',2,3,2,5,50,'2317682410099695695uMoxOT_th_1.jpg','\r\n',NULL,2,1,3,2,2,NULL),
 (3,'Cho thuÃª vÄƒn phÃ²ng','23 Äiá»‡n BiÃªn Phá»§ ',1,0,15,50,89,'Office-Rounded-Edges_1.jpg','\r\n',NULL,8,7,5,3,3,1),
 (4,'PhÃ²ng Ä‘áº¹p','12 HoÃ ng Hoa ThÃ¡m',1,1,4,4,60,'thumb_Living-Room-2_0.jpg','\r\n',NULL,4,4,17,4,4,NULL),
 (5,'NÆ¡i nghÄ© ngÆ¡i tuyá»‡t vá»i','HÃ n Máº·c Tá»­',2,5,30,50,200,'cuocchoimaohiem_1.jpg','\r\n',NULL,8,6,7,5,3,1),
 (6,'Cho thuÃª phÃ²ng pro','Nguyá»…n ThÃ¡i Há»c',2,3,8,16,120,'cat_apartment_1.jpg','\r\n',NULL,6,4,18,6,2,NULL),
 (7,'NhÃ  á»Ÿ bÃ¬nh dÃ¢n','98 Phan Huy Ãch',2,4,5,10,120,'cat_villa_1.jpg','\r\n',NULL,1,1,14,7,1,NULL),
 (8,'PhÃ²ng á»Ÿ sang trá»ng cho dÃ¢n pro','88 Äiá»‡n BiÃªn Phá»§',1,2,10,50,80,'them_1.jpg','\r\n',NULL,8,4,13,8,4,1),
 (9,'Thoáº£i mÃ¡i táº­n hÆ°á»Ÿng','567 Tráº§n NÃ£o',2,3,9,9,130,'laodong_1.jpg','\r\n',NULL,5,2,2,9,1,NULL),
 (10,'NhÃ  Ä‘áº¹p ráº½ ','Nguyá»…n Duy Trinh',2,4,7,10,85,'1274761679_1.jpg','\r\n',NULL,2,3,2,10,2,1),
 (11,'Nhá»¯ng ngÃ´i nhÃ  Ä‘áº¹p tuyá»‡t vá»i!','Nguyá»…n kiá»‡m',32,32,30,50,NULL,'CongTrinh_1.jpg','NhÃ  Ä‘áº¹p , thoÃ¡ng mÃ¡t .<br />\r\n\r\n\r\nHÃ£y táº­n hÆ°á»Ÿng nhá»¯ng buá»•i sÃ¡ng trong lÃ nh á»Ÿ ngÃ´i nhÃ  tuyá»‡t vá»i cá»§a chÃºng ta.<br />\r\n\r\n\r\nHÃ£y lÃ m chá»§ nÃ³ Ä‘á»ƒ táº­n hÆ°á»Ÿng ngay.<br />\r\n\r\n\r\n<br />\r\n\r\n\r\n',NULL,3,2,14,4,3,1),
 (12,'Biá»‡t thá»± !','3',3,3,3,3,130,'2317682410099695695uMoxOT_th_1.jpg','sÃ d\r\n',NULL,7,6,18,4,3,NULL),
 (13,'NhÃ  bÃ¬nh dÃ¢n','2',2,2,8,NULL,NULL,'nhaochuot_1.jpg','sdfds\r\n',NULL,3,1,19,2,1,NULL),
 (14,'NhÃ  Ä‘áº¹p ráº½ dÃ nh cho cÃ´ng nhÃ¢n viÃªn chá»©c.','3',3,3,3,0,NULL,'chophep_1.jpg','sdf\r\n',NULL,3,1,19,2,4,1);
/*!40000 ALTER TABLE `nha_dat` ENABLE KEYS */;


--
-- Definition of table `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
CREATE TABLE `nhan_vien` (
  `ID_NV` int(10) unsigned NOT NULL auto_increment,
  `TenNV` varchar(45) default NULL,
  `DiaChi` varchar(100) default NULL,
  `Email_HoTro` varchar(45) NOT NULL,
  `DienThoai` varchar(45) default NULL,
  `GioiTinh` varchar(45) default NULL,
  `NgaySinh` datetime default NULL,
  `Luong` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID_NV`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhan_vien`
--

/*!40000 ALTER TABLE `nhan_vien` DISABLE KEYS */;
INSERT INTO `nhan_vien` (`ID_NV`,`TenNV`,`DiaChi`,`Email_HoTro`,`DienThoai`,`GioiTinh`,`NgaySinh`,`Luong`) VALUES 
 (1,'BÃ¹i Quang Huy','HCM','traitimvotinh_0305','093483773','1','0000-00-00 00:00:00',3),
 (2,'Nguyá»…n HoÃ ng Anh','BÃ¬nh Tháº¡nh - HCM','changkho_loyeu_113@yahoo.com','090323083','1','0000-00-00 00:00:00',2),
 (3,'LÃª BÃª La','32 Nguyá»…n Thá»‹ Minh Khai - Q1','ola.alo9@yahoo.com','0983798329','0','0000-00-00 00:00:00',4),
 (4,'Tráº§n VÄƒn Báº£o HÆ°ng','\r\n\r\n<p>Quáº­n 4 - HCM</p>','nhoemnhieu@yahoo.com','0127543434','1','1899-11-30 00:00:00',2);
/*!40000 ALTER TABLE `nhan_vien` ENABLE KEYS */;


--
-- Definition of table `quan`
--

DROP TABLE IF EXISTS `quan`;
CREATE TABLE `quan` (
  `ID_Quan` int(10) unsigned NOT NULL auto_increment,
  `TenQuan` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID_Quan`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quan`
--

/*!40000 ALTER TABLE `quan` DISABLE KEYS */;
INSERT INTO `quan` (`ID_Quan`,`TenQuan`) VALUES 
 (1,'Quáº­n 1'),
 (2,'Quáº­n 2'),
 (3,'Quáº­n 3'),
 (4,'Quáº­n 4'),
 (5,'Quáº­n 5'),
 (6,'Quáº­n 6'),
 (7,'Quáº­n 7'),
 (8,'Quáº­n 8'),
 (9,'Quáº­n 9'),
 (10,'Quáº­n 10'),
 (11,'Quáº­n 11'),
 (12,'Quáº­n 12'),
 (13,'BÃ¬nh Tháº¡nh'),
 (14,'GÃ² Váº¥p'),
 (15,'HÃ³c MÃ´n'),
 (16,'BÃ¬nh ChÃ¡nh'),
 (17,'TÃ¢n BÃ¬nh '),
 (18,'TÃ¢n PhÃº'),
 (19,'PhÃº Nhuáº­n');
/*!40000 ALTER TABLE `quan` ENABLE KEYS */;


--
-- Definition of table `quang_cao`
--

DROP TABLE IF EXISTS `quang_cao`;
CREATE TABLE `quang_cao` (
  `ID_QuangCao` int(10) unsigned NOT NULL auto_increment,
  `TieuDe` varchar(45) default NULL,
  `Hinh_QuangCao` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID_QuangCao`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quang_cao`
--

/*!40000 ALTER TABLE `quang_cao` DISABLE KEYS */;
INSERT INTO `quang_cao` (`ID_QuangCao`,`TieuDe`,`Hinh_QuangCao`) VALUES 
 (1,'NhÃ  Ä‘áº¹p','HinhMuaBan_20817145437_1.jpg'),
 (2,'PhÃ²ng vip','thumb_pc-pk2_1.jpg'),
 (3,'chung cÆ°','canhochuongduong_1.jpg'),
 (4,'vÄƒn phÃ²ng','Office-Rounded-Edges_1.jpg');
/*!40000 ALTER TABLE `quang_cao` ENABLE KEYS */;


--
-- Definition of table `que_quan`
--

DROP TABLE IF EXISTS `que_quan`;
CREATE TABLE `que_quan` (
  `ID_QueQuan` int(10) unsigned NOT NULL auto_increment,
  `Ten_QueQuan` varchar(45) NOT NULL,
  PRIMARY KEY  (`ID_QueQuan`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `que_quan`
--

/*!40000 ALTER TABLE `que_quan` DISABLE KEYS */;
INSERT INTO `que_quan` (`ID_QueQuan`,`Ten_QueQuan`) VALUES 
 (1,'Báº¯c Giang'),
 (2,'HÃ  Giang'),
 (3,'Nam Äá»‹nh'),
 (4,'Háº£i PhÃ²ng'),
 (5,'Háº£i DÆ°Æ¡ng'),
 (6,'HÃ  Ná»™i'),
 (7,'Thanh HÃ³a'),
 (8,'Nghá»‡ An'),
 (9,'HÃ  TÄ©nh'),
 (10,'Quáº£ng BÃ¬nh'),
 (11,'Quáº£ng Trá»‹ '),
 (12,'Quáº£ng Nam'),
 (13,'Quáº£ng NgÃ£i '),
 (14,'Huáº¿ '),
 (15,'ÄÃ  Náºµng'),
 (16,'BÃ¬nh Äá»‹nh'),
 (17,'PhÃº YÃªn'),
 (18,'KhÃ¡nh HÃ²a'),
 (19,'KonTum'),
 (20,'Gia Lai '),
 (21,'DakLak'),
 (22,'LÃ¢m Äá»“ng '),
 (23,'BÃ¬nh PhÆ°á»›c '),
 (24,'Äá»“ng Nai'),
 (25,'HCM'),
 (26,'An Giang '),
 (27,'Ca Mau'),
 (28,'Äá»“ng ThÃ¡p'),
 (29,'TÃ¢y Ninh'),
 (30,'BÃ¬nh DÆ°Æ¡ng');
/*!40000 ALTER TABLE `que_quan` ENABLE KEYS */;


--
-- Definition of table `thanh_vien`
--

DROP TABLE IF EXISTS `thanh_vien`;
CREATE TABLE `thanh_vien` (
  `ID_ThanhVien` int(10) unsigned NOT NULL auto_increment,
  `TenThanhVien` varchar(45) default NULL,
  `UserName` varchar(45) NOT NULL,
  `PassWord` varchar(45) NOT NULL,
  `DiaChi` varchar(100) default NULL,
  `DienThoai` varchar(20) default NULL,
  `GioiTinh` varchar(20) default NULL,
  `Email` varchar(45) NOT NULL,
  `Avartar` varchar(45) default NULL,
  `SoLanLogIn` int(10) unsigned default NULL,
  `NgayDangKy` datetime default NULL,
  `ThongTinThem` text,
  `AcessLevel` tinyint(3) unsigned default NULL,
  PRIMARY KEY  (`ID_ThanhVien`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thanh_vien`
--

/*!40000 ALTER TABLE `thanh_vien` DISABLE KEYS */;
INSERT INTO `thanh_vien` (`ID_ThanhVien`,`TenThanhVien`,`UserName`,`PassWord`,`DiaChi`,`DienThoai`,`GioiTinh`,`Email`,`Avartar`,`SoLanLogIn`,`NgayDangKy`,`ThongTinThem`,`AcessLevel`) VALUES 
 (1,'ola','ola','2fe04e524ba40505a82e03a2819429cc','hcm','0935747447','0','ola.alo@gmai.com','HinhMuaBan_20817145437_1.jpg',NULL,'0000-00-00 00:00:00','Äang lÃ  sinh viÃªn .',1),
 (2,'votinh','votinh','88741e770b664af0a726c4250e854731','HCM','01278767887','1','cnkhanhdl@gmail.com','cat_penthouse_2.jpg',NULL,'0000-00-00 00:00:00','\r\n\r\n<p>Äang lÃ  sinh viÃªn .</p>',1),
 (4,'khanh','khanh','46c9a651ec34e9118b64e72ae13b067f','HCM','345657554','1','ola.alo9@yahoo.com','4.jpeg',NULL,'2010-09-03 10:29:11','\r\n',2);
/*!40000 ALTER TABLE `thanh_vien` ENABLE KEYS */;


--
-- Definition of table `thong_tin_tim_kiem`
--

DROP TABLE IF EXISTS `thong_tin_tim_kiem`;
CREATE TABLE `thong_tin_tim_kiem` (
  `ID_ThongTin` int(10) unsigned NOT NULL auto_increment,
  `GioiTinh` varchar(20) default NULL,
  `NgaySinh` datetime default NULL,
  `GiaThapNhat` int(10) unsigned default NULL,
  `GiaCaoNhat` int(10) unsigned default NULL,
  `DTNhoNhat` int(10) unsigned default NULL,
  `DTLonNhat` int(10) unsigned default NULL,
  `SoPTam` int(10) unsigned default NULL,
  `SoPNgu` int(10) unsigned default NULL,
  `ID_Quan` int(10) unsigned default NULL,
  `ID_LoaiNha` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID_ThongTin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thong_tin_tim_kiem`
--

/*!40000 ALTER TABLE `thong_tin_tim_kiem` DISABLE KEYS */;
/*!40000 ALTER TABLE `thong_tin_tim_kiem` ENABLE KEYS */;


--
-- Definition of table `tin_tuc`
--

DROP TABLE IF EXISTS `tin_tuc`;
CREATE TABLE `tin_tuc` (
  `ID_TinTuc` int(10) unsigned NOT NULL auto_increment,
  `TieuDe` varchar(45) default NULL,
  `TrichDanTin` varchar(200) default NULL,
  `NoiDung` text,
  `HinhMinhHoa` varchar(45) default NULL,
  `TacGia` varchar(45) default NULL,
  `NgayDangTin` datetime default NULL,
  `TinHot` tinyint(3) unsigned default NULL,
  `TinTieuDiem` tinyint(3) unsigned default NULL,
  `TinMoi` tinyint(3) unsigned default NULL,
  PRIMARY KEY  (`ID_TinTuc`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tin_tuc`
--

/*!40000 ALTER TABLE `tin_tuc` DISABLE KEYS */;
INSERT INTO `tin_tuc` (`ID_TinTuc`,`TieuDe`,`TrichDanTin`,`NoiDung`,`HinhMinhHoa`,`TacGia`,`NgayDangTin`,`TinHot`,`TinTieuDiem`,`TinMoi`) VALUES 
 (1,'GhÃ¬m giÃ¡ báº¥t Ä‘á»™ng sáº£n: Cáº§n lÃ m ch','Äá»ƒ kinh doanh BÄS thÃ nh cÃ´ng, yáº¿u tá»‘ cá»‘t lÃµi lÃ  táº­n dá»¥ng Ä‘Æ°á»£c thá»i gian, quay vÃ²ng vá»‘n nhanh. BÃªn cáº¡nh Ä‘Ã³, dá»± trá»¯ Ä‘áº¥t Ä‘Ã´ thá»‹ sáº½ kÃ©o giÃ¡ Ä‘áº¥t cao vÃ´ lï','Viá»‡n trÆ°á»Ÿng Viá»‡n NghiÃªn cá»©u ÄÃ´ thá»‹ vÃ  PhÃ¡t triá»ƒn Háº¡ táº§ng - TS. Pháº¡m Sá»¹ LiÃªm - cho biáº¿t Ä‘ang tiáº¿n hÃ nh Ä‘á» xuáº¥t UBND TP. HÃ  Ná»™i nghiÃªn cá»©u Ã¡p dá»¥ng thÃ­ Ä‘iá»ƒm thá»ƒ cháº¿ \"dá»± trá»¯ Ä‘áº¥t Ä‘Ã´ thá»‹â€. ÄÃ¢y lÃ  giáº£i phÃ¡p Ä‘Æ°á»£c ká»³ vá»ng sáº½ ghÃ¬m Ä‘Æ°á»£c giÃ¡ Ä‘áº¥t vÃ  Ä‘áº©y nhanh tá»‘c Ä‘á»™ phÃ¡t triá»ƒn Ä‘Ã´ thá»‹.<br />\r\n\r\n<br />\r\n\r\nTS. Pháº¡m Sá»¹ LiÃªm chia sáº» vá»›i PV.VietNamNet cÃ¢u chuyá»‡n cÃ¡ch Ä‘Ã¢y khÃ´ng lÃ¢u má»™t sá»‘ nhÃ  Ä‘áº§u tÆ° nÆ°á»›c ngoÃ i Ä‘áº¿n Ä‘á» nghá»‹ vá»›i Ã´ng ráº±ng cÃ³ thá»ƒ giÃºp há» cÃ³ Ä‘Æ°á»£c khoáº£ng 200 hecta Ä‘áº¥t Ä‘á»ƒ lÃ m dá»± Ã¡n chá»‰ trong vÃ²ng 6 thÃ¡ng hay khÃ´ng?<br />\r\n\r\n<br />\r\n\r\nVá»‹ Viá»‡n trÆ°á»Ÿng quáº£ quyáº¿t tráº£ lá»i: nÆ°á»›c tÃ´i cháº³ng bao giá» cÃ³ 200 hecta trong 6 thÃ¡ng cáº£, bÃ¬nh thÆ°á»ng pháº£i vÃ i nÄƒm.<br />\r\n\r\n<br />\r\n\r\nCÃ¡c nhÃ  Ä‘áº§u tÆ° bÃ¨n nÃ³i ráº±ng, váº­y thÃ¬ chÃºng tÃ´i pháº£i sang Trung Quá»‘c, áº¤n Äá»™ thÃ´i bá»Ÿi náº¿u cÃ³ Ä‘áº¥t trong 6 thÃ¡ng, chÃºng tÃ´i xÃ¢y dá»±ng thÃªm 6 thÃ¡ng ná»¯a rá»“i Ä‘Æ°a ra bÃ¡n thÃ¬ cÃ²n cáº¡nh tranh, chá»© náº¿u cháº­m thÃ¬ máº·t hÃ ng Ä‘Ã³ sáº½ cÃ³ anh khÃ¡c lÃ m máº¥t. ChÆ°a ká»ƒ Ä‘Æ°a ra thá»‹ trÆ°á»ng, gáº·p lÃºc ná»n kinh táº¿ rÆ¡i vÃ o suy thoÃ¡i, sá»©c mua giáº£m thÃ¬ rá»§i ro cÃ ng cao<br />\r\n\r\n<br />\r\n\r\nLiÃªn quan Ä‘áº¿n chuyá»‡n k&eacute;o dÃ i thá»i gian giao Ä‘áº¥t, TS. LiÃªm nÃªu tiáº¿p vÃ­ dá»¥: chÃ­nh quyá»n Ä‘áº¥u tháº§u máº¥y lÃ´ Ä‘áº¥t á»Ÿ Cáº§u Giáº¥y cÃ¡ch Ä‘Ã¢y khÃ´ng lÃ¢u. Káº¿t quáº£, giÃ¡ Ä‘áº¡t Ä‘áº¿n 67 triá»‡u Ä‘á»“ng/m2, thu Ä‘Æ°á»£c hÆ¡n 300 tá»· Ä‘á»“ng thu ngÃ¢n sÃ¡ch. ThÃ´ng tin nÃ y Ä‘Æ°á»£c cÃ´ng bá»‘, ngÆ°á»i dÃ¢n Ä‘á»u náº¯m rÃµ. Äáº¿n lÃºc chÃ­nh quyá»n cÃ³ káº¿ hoáº¡ch lÃ m Ä‘Æ°á»ng vÃ nh Ä‘ai Ä‘i qua khu vá»±c nÃ y, khi giáº£i phÃ³ng máº·t báº±ng, dÃ¢n Ä‘Ã²i pháº£i tÃ­nh \"sÃ¡t giÃ¡ thá»‹ trÆ°á»ngâ€. Cuá»‘i cÃ¹ng cÃ£i nhau, khÃ´ng bÃªn nÃ o chá»‹u thá»‘ng nháº¥t vÃ  há»‡ luá»µ lÃ  cÃ´ng trÃ¬nh cháº­m trá»….<br />\r\n\r\n<br />\r\n\r\nMá»™t quan sÃ¡t ná»¯a dÆ°á»›i con máº¯t cá»§a vá»‹ chuyÃªn gia trong lÄ©nh vá»±c nghiÃªn cá»©u Ä‘Ã´ thá»‹ vÃ  phÃ¡t triá»ƒn háº¡ táº§ng, thá»i gian gáº§n Ä‘Ã¢y chÃºng ta bÃ n luáº­n ráº¥t nhiá»u Ä‘áº¿n váº¥n Ä‘á» quy hoáº¡ch Thá»§ Ä‘Ã´ nhÆ°ng chi tiáº¿t khÃ´ng k&eacute;m pháº§n quan trá»ng lÃ  thá»±c hiá»‡n quy hoáº¡ch theo káº¿ hoáº¡ch tháº¿ nÃ o thÃ¬ láº¡i ráº¥t Ã­t Ä‘Æ°á»£c nÃ³i Ä‘áº¿n.<br />\r\n\r\n<br />\r\n\r\n\r\n<hr />\r\n\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a> \r\n<hr />\r\n\r\n<br />\r\n\r\nHiá»‡n nay cÃ¡c dá»± Ã¡n khu Ä‘Ã´ thá»‹ má»›i táº¡i HÃ  Ná»™i nÃ³i riÃªng má»c lÃªn tá»± phÃ¡t, phÃ¢n tÃ¡n, tráº£i ra kháº¯p nÆ¡i, tuá»³ theo Ä‘á» xuáº¥t cá»§a nhÃ  kinh doanh báº¥t Ä‘á»™ng sáº£n vÃ  Ä‘á»u Ä‘Æ°á»£c chÃ­nh quyá»n Ä‘Ã´ thá»‹ cháº¥p nháº­n. TÃ¬nh tráº¡ng nÃ y khiáº¿n viá»‡c káº¿t ná»‘i cÃ¡c khu Ä‘Ã´ thá»‹ má»›i vá»›i há»‡ thá»‘ng háº¡ táº§ng cáº¥p 1 cá»§a Ä‘Ã´ thá»‹ ráº¥t khÃ³ khÄƒn vÃ  tá»‘n k&eacute;m.<br />\r\n\r\n<br />\r\n\r\nTS. LiÃªm chá»‰ ra: \"ChÃºng ta cÃ³ 1 báº£n Ä‘á»“ quy hoáº¡ch tháº­t nhÆ°ng láº¡i thá»±c hiá»‡n khÃ´ng theo káº¿ hoáº¡ch. Má»™t sá»‘ dá»± Ã¡n khi xÃ¢y xong trá»Ÿ thÃ nh á»‘c Ä‘áº£o - tá»±&nbsp; sinh, tá»± dÆ°á»¡ng ráº¥t khá»•. Thiáº¿u thá»‘n tá»« háº¡ táº§ng ká»¹ thuáº­t nhÆ° Ä‘iá»‡n, cáº¥p thoÃ¡t nÆ°á»›c Ä‘áº¿n háº¡ táº§ng xÃ£ há»™i nhÆ° chá»£, trÆ°á»ng cáº¥p 3.<br />\r\n\r\n<br />\r\n\r\nTá»‡ hÆ¡n, cÃ´ng trÆ°á»ng xÃ¢y dá»±ng má»Ÿ ra kháº¯p nÆ¡i dang dá»Ÿ tá»« nÄƒm nÃ y Ä‘áº¿n nÄƒm khÃ¡c. Tuy xÃ¢y dá»±ng nhiá»u nhÆ°ng Ã­t nÆ¡i nÃ o táº¡o Ä‘Æ°á»£c khu vá»±c Ä‘Ã´ thá»‹ hoÃ n chá»‰nh, hiá»‡n Ä‘áº¡iâ€.<br />\r\n\r\n<br />\r\n\r\n<span style=\"font-weight: bold;\">ThoÃ¡t khá»i \"ngá»™ nháº­nâ€</span><br />\r\n\r\n<br />\r\n\r\nCÃ¢u tráº£ lá»i chung nháº¥t cho cÃ¡c hiá»‡n tÆ°á»£ng nÃªu trÃªn, theo Ã´ng LiÃªm, Ä‘Ã³ lÃ  do cÃ¡c cáº¥p chÃ­nh quyá»n cÃ³ sá»± \"ngá»™ nháº­n ráº¥t lá»›nâ€ trong viá»‡c thu há»“i vÃ  giao Ä‘áº¥t; sÃ¢u xa hÆ¡n lÃ  chÃºng ta chÆ°a cÃ³ cháº¿ Ä‘á»™ dá»± trá»¯ Ä‘áº¥t Ä‘Ã´ thá»‹.<br />\r\n\r\n<br />\r\n\r\nLuáº­t Äáº¥t Ä‘ai 2003 Ä‘Ã£ quy Ä‘á»‹nh rÃµ hai phÆ°Æ¡ng thá»©c thu há»“i Ä‘áº¥t vÃ  giao Ä‘áº¥t lÃ : 1. NhÃ  nÆ°á»›c quyáº¿t Ä‘á»‹nh thu há»“i Ä‘áº¥t, tá»• chá»©c phÃ¡t triá»ƒn quá»¹ Ä‘áº¥t do cáº¥p tá»‰nh thÃ nh láº­p thá»±c hiá»‡n viá»‡c thu há»“i Ä‘áº¥t, bá»“i thÆ°á»ng, giáº£i phÃ³ng máº·t báº±ng vÃ  trá»±c tiáº¿p quáº£n lÃ½ quá»¹ Ä‘áº¥t Ä‘Ã£ thu há»“i... 2. NhÃ  nÆ°á»›c thu há»“i Ä‘áº¥t, bá»“i thÆ°á»ng, giáº£i phÃ³ng máº·t báº±ng vÃ  giao Ä‘áº¥t cho nhÃ  Ä‘áº§u tÆ° Ä‘Æ°á»£c cÆ¡ quan nhÃ  nÆ°á»›c cÃ³ tháº©m quyá»n x&eacute;t duyá»‡t.<br />\r\n\r\n<br />\r\n\r\nNhiá»u nÆ°á»›c trÃªn tháº¿ giá»›i gá»i phÆ°Æ¡ng thá»©c thá»©c nháº¥t lÃ  Dá»± trá»¯ Ä‘áº¥t Ä‘Ã´ thá»‹ - cÃ³ tÃ¡c dá»¥ng cho Ä‘Ã´ thá»‹ phÃ¡t triá»ƒn theo quy hoáº¡ch, theo káº¿ hoáº¡ch, huy Ä‘á»™ng hiá»‡u quáº£ nguá»“n tÃ i nguyÃªn Ä‘áº¥t Ä‘ai vÃ o phÃ¡t triá»ƒn Ä‘Ã´ thá»‹ vÃ  Ä‘Æ°a thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n vÃ o ná» náº¿p. Tuy nhiÃªn, phÆ°Æ¡ng thá»©c thá»© hai hiá»‡n má»›i lÃ  chá»§ Ä‘áº¡o, Ä‘Æ°á»£c dÃ¹ng phá»• biáº¿n nháº¥t á»Ÿ nÆ°á»›c ta.<br />\r\n\r\n<br />\r\n\r\nSá»Ÿ dÄ© nhÆ° váº­y lÃ  do chÃ­nh quyá»n Ä‘á»‹a phÆ°Æ¡ng nghÄ© ráº±ng chá»‰ cÃ¡c nhÃ  Ä‘áº§u tÆ° báº¥t Ä‘á»™ng sáº£n (trong vÃ  ngoÃ i nÆ°á»›c) má»›i nhiá»u tiá»n Ä‘á»ƒ á»©ng trÆ°á»›c cho viá»‡c bá»“i thÆ°á»ng, giáº£i phÃ³ng máº·t báº±ng vá»‘n khÃ¡ tá»‘n k&eacute;m, cÃ²n Ä‘á»‹a phÆ°Æ¡ng thÃ¬ khÃ´ng cÃ³ tiá»n lÃ m viá»‡c Ä‘Ã³. NhÆ°ng thá»±c cháº¥t, kinh doanh trong thá»‹ trÆ°á»ng Ä‘áº¥t Ä‘Ã´ thá»‹ Ä‘á»u dá»±a vÃ o nguá»“n vá»‘n huy Ä‘á»™ng, vá»‘n vay, Ä‘áº·c biá»‡t tá»« ngÃ¢n hÃ ng.<br />\r\n\r\n<br />\r\n\r\nNáº¿u tá»• chá»©c phÃ¡t triá»ƒn quá»¹ Ä‘áº¥t cá»§a Ä‘á»‹a phÆ°Æ¡ng cÃ³ dá»± Ã¡n tá»‘t, Ä‘Æ°á»£c ngÃ¢n hÃ ng tin cáº­y, Ä‘Æ°á»£c chÃ­nh quyá»n tá»‰nh báº£o lÃ£nh thÃ¬ váº«n vay Ä‘Æ°á»£c nhiá»u vá»‘n Ä‘á»ƒ thá»±c hiá»‡n dá»± trá»¯ Ä‘áº¥t.<br />\r\n\r\n<br />\r\n\r\n<span style=\"font-weight: bold;\">GiÃ¡ Ä‘áº¥t sáº½ Ä‘Æ°á»£c k&eacute;o xuá»‘ng</span><br />\r\n\r\n<br />\r\n\r\nTheo phÃ¢n tÃ­ch cá»§a Ã´ng LiÃªm, thá»‹ trÆ°á»ng Ä‘áº¥t Ä‘Ã´ thá»‹ nÆ°á»›c ta Ä‘Æ°á»£c phÃ¢n ra lÃ m hai thá»‹ trÆ°á»ng Ä‘áº¥t cáº¥p 1 vÃ  cáº¥p 2. Trong Ä‘Ã³ thá»‹ trÆ°á»ng Ä‘áº¥t cáº¥p 1: NhÃ  nÆ°á»›c Ä‘Ã³ng vai trÃ² lÃ  bÃªn cung á»©ng duy nháº¥t, sá»± cáº¡nh tranh chá»‰ diá»…n ra giá»¯a cÃ¡c bÃªn cáº§u. CÃ²n thá»‹ trÆ°á»ng Ä‘áº¥t cáº¥p 2 lÃ  cÃ¡c bÃªn Ä‘Ã£ cÃ³ quyá»n sá»­ dá»¥ng Ä‘em quyá»n Ä‘Ã³ cho thuÃª hoáº·c chuyá»ƒn nhÆ°á»£ng cho bÃªn khÃ¡c.<br />\r\n\r\n<br />\r\n\r\nNguá»“n cung trong thá»‹ trÆ°á»ng cáº¥p 2 phá»¥ thuá»™c vÃ o nguá»“n cung trong thá»‹ trÆ°á»ng cáº¥p 1. Máº·t khÃ¡c, tuy giÃ¡ bá»“i thÆ°á»ng Ä‘áº¥t khi thu há»“i cho thá»‹ trÆ°á»ng cáº¥p 1 lÃ  do chÃ­nh quyá»n quy Ä‘á»‹nh nhÆ°ng váº«n pháº£i trÃªn cÆ¡ sá»Ÿ tham kháº£o máº·t báº±ng giÃ¡ Ä‘áº¥t trong thá»‹ trÆ°á»ng cáº¥p 2. KhÃ´ng chá»‰ váº­y, giÃ¡ bá»“i thÆ°á»ng Ä‘áº¥t (cá»™ng vá»›i phÆ°Æ¡ng thá»©c Ä‘áº¥u giÃ¡) láº¡i áº£nh hÆ°á»Ÿng Ä‘áº¿n giÃ¡ giao Ä‘áº¥t, cho thuÃª Ä‘áº¥t trong thá»‹ trÆ°á»ng cáº¥p 1.<br />\r\n\r\n<br />\r\n\r\nCÃ¡c giÃ¡ Ä‘Ã³ cá»™ng vá»›i chi phÃ­ giao dá»‹ch khÃ¡ cao (ká»ƒ cáº£ phÃ­ \"bÃ´i trÆ¡nâ€) rá»‘t cuá»™c sáº½ pháº£n Ã¡nh vÃ o giÃ¡ Ä‘áº¥t trong thá»‹ trÆ°á»ng cáº¥p 2 vÃ  Ä‘áº©y giÃ¡ Ä‘Ã³ lÃªn cao hÆ¡n. Má»‘i quan há»‡ qua láº¡i giá»¯a giÃ¡ Ä‘áº¥t á»Ÿ hai thá»‹ trÆ°á»ng nÃ y táº¡o ra chu ká»³ tÄƒng giÃ¡ Ä‘áº¥t theo kiá»ƒu xoáº¯n á»‘c, khiáº¿n giÃ¡ Ä‘áº¥t Ä‘Ã´ thá»‹ nÄƒm sau cao hÆ¡n nÄƒm trÆ°á»›c.<br />\r\n\r\n<br />\r\n\r\nÃp dá»¥ng cháº¿ Ä‘á»™ dá»± trá»¯ Ä‘áº¥t thÃ´ng qua tá»• chá»©c phÃ¡t triá»ƒn quá»¹ Ä‘áº¥t Ä‘á»ƒ thá»±c hiá»‡n nguyÃªn táº¯c \"5 thá»‘ng nháº¥tâ€ nhÆ° kinh nghiá»‡m má»™t sá»‘ nÆ°á»›c lÃ : 1. Thá»‘ng nháº¥t thu há»“i; 2. Thá»‘ng nháº¥t dá»± trá»¯; 3. Thá»‘ng nháº¥t phÃ¡t triá»ƒn háº¡ táº§ng; 4. Thá»‘ng nháº¥t kinh doanh; 5. Thá»‘ng nháº¥t cung á»©ng (theo nhu cáº§u cá»§a thá»‹ trÆ°á»ng vÃ  phÃ¡t triá»ƒn Ä‘Ã´ thá»‹) sáº½ phÃ¡ vá»¡ cÃ¡i vÃ²ng \"luáº©n quáº©nâ€ cá»§a sá»± tÄƒng giÃ¡ Ä‘áº¥t.<br />\r\n\r\n<br />\r\n\r\n\"Khi Ä‘áº¥t trong tay NhÃ  nÆ°á»›c thÃ¬ NhÃ  nÆ°á»›c cáº¥p Ä‘áº¥t dá»±a vÃ o chÃ­nh sÃ¡ch chá»© khÃ´ng pháº£i dá»±a vÃ o quan há»‡ cung cáº§u Ä‘Æ¡n thuáº§n. VÃ­ dá»¥ chá»§ trÆ°Æ¡ng xÃ¢y nhÃ  thu nháº­p tháº¥p thÃ¬ ta Ä‘Æ°a ra giÃ¡ Ä‘áº¥t tháº¥p. Chá»— nÃ o Ä‘áº¥t Ä‘áº¯c Ä‘á»‹a thÃ¬ ta Ä‘áº¥u giÃ¡ hoáº·c Ã´ng doanh nghiá»‡p kinh doanh bÃ¡n láº» cáº§n, tÃ´i Ä‘Æ°a ra ngay giÃ¡ vá»«a pháº£i Ä‘á»ƒ thu hÃºt Ã´ng vÃ o lÃ m cho nhanh. Chá»— nÃ y lÃ£i Ã­t, Ä‘á»‹a Ä‘iá»ƒm Ä‘áº¯c Ä‘á»‹a lÃ£i nhiá»u thÃ¬ lÃ£i bÃ¬nh quÃ¢n trÃªn cáº£ miáº¿ng Ä‘áº¥t to hÃ ng nghÃ¬n hecta váº«n sáº½ lÃ  há»£p lÃ½â€ - TS. LiÃªm nÃªu báº­t.<br />\r\n\r\n<br />\r\n\r\nGS.TS Äáº·ng HÃ¹ng VÃµ cÅ©ng cho ráº±ng, cÆ¡ cháº¿ sá»­ dá»¥ng quá»¹ Ä‘áº¥t Ä‘á»ƒ táº¡o vá»‘n phÃ¡t triá»ƒn thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n lÃ  ráº¥t quan trá»ng Ä‘á»‘i vá»›i nhá»¯ng nÆ°á»›c Ä‘ang phÃ¡t triá»ƒn nhÆ° Viá»‡t Nam. ÄÃ¢y lÃ  nguá»“n vá»‘n ná»™i lá»±c then chá»‘t, bÃªn cáº¡nh vá»‘n cá»§a ngÆ°á»i dÃ¢n vÃ  nhÃ  Ä‘áº§u tÆ°.<br />\r\n\r\n<br />\r\n\r\nNhÆ°ng Ä‘á»ƒ sá»­ dá»¥ng cÆ¡ cháº¿ nÃ y hiá»‡u quáº£, khÃ´ng bá»‹ tiÃªu hao tÃ i nguyÃªn thÃ¬ cáº§n pháº£i gáº¯n vá»›i quy hoáº¡ch Ä‘Ã´ thá»‹ Ä‘á»“ng bá»™, kháº£ thi vÃ  sá»± chuyÃªn nghiá»‡p, tÃ¢m huyáº¿t cá»§a nhá»¯ng lÃ£nh Ä‘áº¡o trá»±c tiáº¿p á»Ÿ Ä‘á»‹a phÆ°Æ¡ng. Táº¥t cáº£ sáº½ giÃºp trÃ¡nh Ä‘Æ°á»£c thá»±c tráº¡ng má»™t sá»‘ Ä‘á»‹a phÆ°Æ¡ng bá» ra khÃ¡ nhiá»u tiá»n Ä‘á»ƒ thu há»“i, dá»± trá»¯ Ä‘áº¥t nhÆ°ng sau khÃ´ng cÃ³ nhÃ  Ä‘áº§u tÆ° nÃ o ngÃ³ ngÃ ng vÃ¬ vá»‹ trÃ­ Ä‘áº¥t khÃ´ng thuáº­n lá»£i<br />\r\n\r\n<span style=\"font-style: italic;\"><br />\r\n	\r\n	</span>','ghimgia.JPG','Theo Nguyá»…n Nga - Vietnamnet','2010-08-25 00:00:00',0,1,1),
 (2,'Thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n nghá»‰ dÆ','KhÃ´ng nÃ¡o nhiá»‡t vÃ  nhiá»u rá»§i ro nhÆ° phÃ¢n khÃºc Ä‘áº¥t ná»n vÃ  cÄƒn há»™ chung cÆ°, phÃ¢n khÃºc báº¥t Ä‘á»™ng sáº£n nghá»‰ dÆ°á»¡ng Ä‘ang thu hÃºt ngÃ y nhiá»u sá»± quan tÃ¢m cá»§a giá»›i','<strong>GiÃ¡ cao váº«n háº¿t hÃ ng<br />\r\n	<br />\r\n	</strong>Trung tuáº§n thÃ¡ng 8, viá»‡c cÃ´ng bá»‘ tiáº¿n Ä‘á»™ bÃ¡n hÃ ng cá»§a dá»± Ã¡n Ä‘áº£o nhÃ¢n táº¡o Hoa PhÆ°á»£ng Ä‘áº·t táº¡i bÃ£i 2, bÃ£i biá»ƒn Äá»“ SÆ¡n (Háº£i PhÃ²ng) do Táº­p Ä‘oÃ n Daso Group Vietnam lÃ m chá»§ Ä‘áº§u tÆ° Ä‘Ã£ thá»±c sá»± gÃ¢y sá»‘c. Báº¥t ká»ƒ thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n Ä‘ang trong cÆ¡n tráº§m láº¯ng vá»›i cÃ¡c giao dá»‹ch cháº­m, hoáº·c gáº§n nhÆ° khÃ´ng cÃ³ giao dá»‹ch, máº·c dÃ¹ giÃ¡ Ä‘Ã£ giáº£m so vá»›i Ä‘áº§u nÄƒm tá»« 10-20% thÃ¬ CÃ´ng ty Newlink - Ä‘Æ¡n vá»‹ Ä‘á»™c quyá»n bÃ¡n hÃ ng cá»§a dá»± Ã¡n Ä‘áº£o Hoa PhÆ°á»£ng - cho biáº¿t: Äá»£t 1 (tá»« ngÃ y 20.4.2010) má»Ÿ bÃ¡n Khu biá»‡t thá»± Poseidon 50 cÄƒn vá»›i diá»‡n tÃ­ch tá»« 495m2 Ä‘áº¿n hÆ¡n 600m2, Ä‘Ã£ Ä‘Æ°á»£c cÃ¡c nhÃ  Ä‘áº§u tÆ° Ä‘áº·t cá»c mua gáº§n háº¿t. Hiá»‡n khu biá»‡t thá»± nÃ y chá»‰ cÃ²n láº¡i 6 cÄƒn chÆ°a cÃ³ chá»§.<br />\r\n<br />\r\nÄiá»u Ä‘Ã¡ng nÃ³i lÃ  giÃ¡ cÃ¡c cÄƒn biá»‡t thá»± á»Ÿ Ä‘Ã¢y khÃ´ng há» ráº» chÃºt nÃ o. Dá»± Ã¡n triá»ƒn khai theo hÃ¬nh thá»©c chÃ¬a khoÃ¡ trao tay, giÃ¡ Ä‘áº¥t 1.000USD/m2, giÃ¡ xÃ¢y dá»±ng theo cÃ¡c máº«u thiáº¿t káº¿ cá»§a cÃ¡c kiáº¿n trÃºc sÆ° Má»¹ khoáº£ng 250USD/m2 xÃ¢y dá»±ng, tÃ­nh bÃ¬nh quÃ¢n má»™t cÄƒn biá»‡t thá»± trÃªn Ä‘áº£o cÃ³ giÃ¡ tá»« 400.000-600.000USD/cÄƒn.<br />\r\n<br />\r\nTuy nhiÃªn, theo Ã´ng Äáº·ng Ngá»c HoÃ  - chá»§ Ä‘áº§u tÆ°, Tá»•ng giÃ¡m Ä‘á»‘c Daso Group, sáº½ cÃ³ má»™t sá»‘ cÄƒn biá»‡t thá»± Ä‘Æ°á»£c bÃ¡n trong giai Ä‘oáº¡n tá»›i lÃªn tá»›i 1,8 triá»‡u USD/cÄƒn! CÅ©ng theo Ã´ng, má»©c giÃ¡ nhÆ° váº­y váº«n lÃ  há»£p lÃ½ vÃ¬ Ä‘Ã¢y lÃ  hÃ²n Ä‘áº£o nhÃ¢n táº¡o Ä‘áº§u tiÃªn cá»§a Viá»‡t Nam. Äá»ƒ cÃ³ thá»ƒ chÃ­nh thá»©c khá»Ÿi cÃ´ng giai Ä‘oáº¡n 2 cá»§a dá»± Ã¡n, táº­p Ä‘oÃ n Ä‘Ã£ pháº£i Ä‘á»• vÃ o Ä‘Ã¢y hÃ ng trÄƒm triá»‡u USD láº¥p Ä‘áº¥t láº¥n biá»ƒn, thÄƒm dÃ² Ä‘á»‹a cháº¥nâ€¦ vÃ  Ä‘iá»u quan trá»ng hÆ¡n, trÃªn tá»•ng diá»‡n tÃ­ch gáº§n 60ha, Ä‘áº£o Hoa PhÆ°á»£ng sáº½ Ä‘Æ°á»£c xÃ¢y dá»±ng thÃ nh má»™t quáº§n thá»ƒ khÃ¡ch sáº¡n 5 sao, khu resort, trong tÃ¢m mua sáº¯m, cÃ´ng viÃªn nÆ°á»›c trong nhÃ , ráº¡p chiáº¿u phimâ€¦ vÃ  nhiá»u tiá»‡n Ã­ch khÃ¡c mÃ  chá»‰ nhá»¯ng khÃ¡ch hÃ ng chá»n nÆ¡i nÃ y lÃ m nÆ¡i nghá»‰ dÆ°á»¡ng má»›i cáº£m nháº­n Ä‘Æ°á»£c.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\nCÃ¡c dá»± Ã¡n biá»‡t thá»± nghá»‰ dÆ°á»¡ng táº¡i Ba VÃ¬, HoÃ  BÃ¬nh, VÄ©nh PhÃºcâ€¦ - nhá»¯ng nÆ¡i tuy khÃ´ng cÃ³ biá»ƒn nhÆ°ng láº¡i cÃ³ vá»‹ trÃ­ Ä‘á»‹a lÃ½ vÃ  cáº£nh quan thiÃªn nhiÃªn Ä‘áº¹p cÃ¹ng vá»›i khÃ­ háº­u khÃ¡ Ã´n hoÃ  - cÅ©ng háº¥p dáº«n giá»›i Ä‘áº§u tÆ° vÃ¬ giÃ¡ ráº» báº±ng phÃ¢n ná»­a, tá»« 1,5- 3,5 tá»‰ Ä‘á»“ng. SÃ´i Ä‘á»™ng nháº¥t hiá»‡n nay lÃ  cÃ¡c dá»± Ã¡n gáº§n nÃºi Ba VÃ¬ nhÆ° The Grand Arena Hill (CTCP Ä‘áº§u tÆ° Gia Tuá»‡), The Queen Villas (CTCP Ä‘áº§u tÆ° du lá»‹ch vÃ  thÆ°Æ¡ng máº¡i Háº£i Linh), Táº£n ViÃªn Resort, khu biá»‡t thá»± há»“ YÃªn BÃ iâ€¦ Phong cáº£nh sÆ¡n thá»§y há»¯u tÃ¬nh, gáº§n cÃ¡c khu tháº¯ng cáº£nh nhÆ° ThÃ¡c Äa, Suá»‘i TiÃªnâ€¦, láº¡i cÃ¡ch HÃ  Ná»™i bÃ¡n kÃ­nh 40-70km, cÃ³ thá»ƒ Ä‘i vá» trong ngÃ y nÃªn Ä‘Æ°á»£c giá»›i Ä‘áº§u tÆ° quan tÃ¢m cÅ©ng dá»… hiá»ƒu. Hiá»‡n táº¡i má»©c giÃ¡ táº¡i nhiá»u dá»± Ã¡n lá»›n á»Ÿ Ba VÃ¬ Ä‘ang Ä‘Æ°á»£c giao dá»‹ch á»Ÿ má»©c tá»« 2,5- 3,5 triá»‡u Ä‘á»“ng/m2.<br />\r\n<br />\r\nTuy nhiÃªn, giao dá»‹ch thá»±c sá»± háº¥p dáº«n nhÃ  Ä‘áº§u tÆ° cáº£ trong nÆ°á»›c láº«n nÆ°á»›c ngoÃ i váº«n lÃ  dá»c biá»ƒn miá»n Trung, Ä‘áº·c biá»‡t lÃ  bá» biá»ƒn Má»¹ KhÃª (ÄÃ  Náºµng), Ä‘Æ°á»£c xáº¿p háº¡ng má»™t trong nhá»¯ng bá» biá»ƒn Ä‘áº¹p nháº¥t hÃ nh tinh. Náº¿u Ä‘i dá»c Ä‘Æ°á»ng SÆ¡n TrÃ  - Äiá»‡n Ngá»c thá»i Ä‘iá»ƒm nÃ y cÃ³ thá»ƒ dá»… dÃ ng báº¯t gáº·p nhá»¯ng bÄƒngrÃ´n quáº£ng cÃ¡o cÆ¡ há»™i cuá»‘i cÃ¹ng Ä‘á»ƒ sá»Ÿ há»¯u cÃ¡c biá»‡t thá»± táº¡i Dá»± Ã¡n Ocean Villas - biá»ƒn ÄÃ  Náºµng Resort (ÄÃ  Náºµng) cá»§a VinaCapital; cÃ¡c biá»‡t thá»± hÆ°á»›ng biá»ƒn thuá»™c Dá»± Ã¡n Furama Resort má»Ÿ rá»™ng, hay cÃ¡c cÄƒn há»™ cao cáº¥p cá»§a khu nghá»‰ dÆ°á»¡ng Hyatt Regency Danang Residences do Indochina Land thuá»™c Táº­p Ä‘oÃ n Indochina Capital lÃ m chá»§ Ä‘áº§u tÆ°â€¦<br />\r\n<br />\r\nÄÆ°á»£c biáº¿t, Ä‘áº¿n thá»i Ä‘iá»ƒm nÃ y, 30 cÄƒn biá»‡t thá»± (giai Ä‘oáº¡n 1A) cá»§a dá»± Ã¡n Ocean Villas cÃ³ diá»‡n tÃ­ch tá»« 400-700m2 Ä‘Ã£ Ä‘Æ°á»£c bÃ¡n gáº§n háº¿t, chá»‰ cÃ²n láº¡i má»™t vÃ i cÄƒn, dÃ¹ giÃ¡ gáº§n 1.000USD/m2 tuá»³ vá»‹ trÃ­. 174 cÄƒn há»™ vÃ  27 biá»‡t thá»± trong khu nghá»‰ dÆ°á»¡ng Hyatt Regency Danang Residences Ä‘Æ°á»£c má»Ÿ bÃ¡n tá»« cuá»‘i thÃ¡ng 5 Ä‘áº¿n nay cÅ©ng Ä‘Ã£ bÃ¡n Ä‘Æ°á»£c hÆ¡n 80%, dÃ¹ giÃ¡ má»™t cÄƒn há»™ nhá» nháº¥t á»Ÿ Ä‘Ã¢y (khoáº£ng 80m2) cÅ©ng lÃªn tá»›i ngÃ³t 300.000 USD/cÄƒn, tÃ­nh ra tá»« 2.500USD Ä‘áº¿n gáº§n 3.000USD/m2 cÄƒn há»™. Äiá»u Ä‘Ã¡ng ngáº¡c nhiÃªn lÃ  chá»§ sá»Ÿ há»¯u chá»§ yáº¿u lÃ  nhÃ  Ä‘áº§u tÆ° trong nÆ°á»›c.<br />\r\n<br />\r\n<strong>PhÆ°Æ¡ng Ã¡n chia lá»i háº¥p dáº«n</strong><br />\r\n<br />\r\nTráº£ lá»i phÃ³ng viÃªn vá» quyáº¿t Ä‘á»‹nh Ä‘áº§u tÆ° vÃ o má»™t biá»‡t thá»± nghá»‰ dÆ°á»¡ng táº¡i ÄÃ  Náºµng, chá»‹ Ä.T.K.P cho ráº±ng, dÃ¹ cÃ³ nhiá»u tiá»n nhÆ°ng sáº½ ráº¥t khÃ³ khÄƒn náº¿u báº¡n tá»± mua Ä‘áº¥t vÃ  xÃ¢y Ä‘Æ°á»£c má»™t biá»‡t thá»± bÃªn bá» biá»ƒn. Ngay cáº£ khi lÃ m Ä‘Æ°á»£c viá»‡c Ä‘Ã³ thÃ¬ cÅ©ng sáº½ khÃ´ng Ä‘Æ°á»£c nhÆ° Ã½ muá»‘n vÃ¬ sáº½ k&eacute;o theo ráº¥t nhiá»u chi phÃ­ phÃ¡t sinh nhÆ° thuÃª ngÆ°á»i trÃ´ng coi, chÄƒm sÃ³c, báº£o dÆ°á»¡ngâ€¦<br />\r\n<br />\r\nCÃ²n náº¿u tham gia Ä‘áº§u tÆ° vÃ o má»™t dá»± Ã¡n vá»›i má»™t quáº§n thá»ƒ biá»‡t thá»± Ä‘Æ°á»£c quáº£n lÃ½ váº­n hÃ nh chuyÃªn nghiá»‡p, Ä‘i kÃ¨m vá»›i nÃ³ lÃ  cÃ¡c dá»‹ch vá»¥ vÃ  tiá»‡n Ã­ch, thÃ¬ giÃ¡ trá»‹ Ä‘áº§u tÆ° cá»§a báº¡n Ä‘Ã£ thá»±c sá»± Ä‘Æ°á»£c nÃ¢ng lÃªn. LÃºc Ä‘Ã³, khÃ´ng chá»‰ cÃ³ má»™t \"báº¥t Ä‘á»™ng sáº£n Ä‘á»ƒ dÃ nhâ€ ná»¯a, mÃ  cÃ²n lÃ  báº¥t Ä‘á»™ng sáº£n sinh lá»£i vá»›i hoáº¡t Ä‘á»™ng cho thuÃª láº¡i, Ä‘Æ°á»£c duy trÃ¬ báº£o dÆ°á»¡ng hÃ ng nÄƒm vÃ  mang láº¡i nguá»“n lá»£i Ä‘Ã¡ng ká»ƒ.<br />\r\n<br />\r\nHiá»‡n phÆ°Æ¡ng Ã¡n \"time shareâ€ Ä‘ang Ä‘Æ°á»£c nhiá»u khÃ¡ch hÃ ng lá»±a chá»n khi quyáº¿t Ä‘á»‹nh Ä‘áº§u tÆ° báº¥t Ä‘á»™ng sáº£n nghá»‰ dÆ°á»¡ng. Vá»›i phÆ°Æ¡ng Ã¡n tÃ i chÃ­nh minh báº¡ch, dá»± Ã¡n Fusion Alya Há»™i An cá»§a chá»§ Ä‘áº§u tÆ° Serebity vÃ  Brainstones lÃ  má»™t trong nhá»¯ng dá»± Ã¡n nhÆ° váº­y.<br />\r\n<br />\r\nNáº±m trÃªn biá»ƒn Cá»­a Äáº¡i (Há»™i An), dá»± Ã¡n Fusion Alya Há»™i An lÃ  sáº£n pháº©m Ä‘áº§u tÆ° káº¿t há»£p quyá»n sá»Ÿ há»¯u má»™t cÄƒn há»™ hay biá»‡t thá»±, gáº¯n liá»n vá»›i quyá»n sá»Ÿ há»¯u cÃ¡c tiá»‡n Ã­ch khÃ¡c cá»§a khu nghá»‰ dÆ°á»¡ng. KhÃ¡ch hÃ ng sáº½ mua cá»• pháº§n cá»§a Cty cá»• pháº§n sá»Ÿ há»¯u 100% khu nghá»‰ dÆ°á»¡ng. Nguá»“n thu nháº­p Ä‘Æ°á»£c tá»« táº¥t cáº£ cÃ¡c cÄƒn sáº½ Ä‘Æ°á»£c gá»™p láº¡i vÃ  bÃ¡o cÃ¡o tÃ i chÃ­nh sáº½ Ä‘Æ°á»£c cÃ´ng bá»‘ hÃ ng quÃ½ cho táº¥t cáº£ cÃ¡c chá»§ sá»Ÿ há»¯u. Theo hÃ¬nh thá»©c nÃ y, chá»§ sá»Ÿ há»¯u sáº½ khÃ´ng pháº£i lo láº¯ng lÃ  ban quáº£n lÃ½ Æ°u tiÃªn cho thuÃª cÄƒn nÃ o trÆ°á»›c, sáº½ nháº­n Ä‘Æ°á»£c lá»£i nhuáº­n theo cá»• pháº§n dá»±a vÃ o tá»•ng doanh thu cá»§a khu nghá»‰ dÆ°á»¡ng, bao gá»“m doanh thu tiá»n phÃ²ng vÃ  doanh thu cá»§a táº¥t cáº£ cÃ¡c dá»‹ch vá»¥ khÃ¡c trong khu nghá»‰ dÆ°á»¡ng.<br />\r\n<br />\r\nTrong 3 nÄƒm Ä‘áº§u tiÃªn, Ä‘Æ°á»£c cam káº¿t thu nháº­p cho thuÃª tá»‘i thiá»ƒu lÃ  6%/nÄƒm. NgoÃ i ra, má»—i chá»§ sá»Ÿ há»¯u cÃ²n cÃ³ thÃªm 20 ngÃ y nghá»‰ miá»…n phÃ­ hÃ ng nÄƒm táº¡i khu nghá»‰ dÆ°á»¡ng. GiÃ¡ biá»‡t thá»± hoáº·c cÄƒn há»™ á»Ÿ Ä‘Ã¢y dao Ä‘á»™ng tá»« 110.000 - 280.000USD/cÄƒn, phÆ°Æ¡ng Ã¡n thanh toÃ¡n linh hoáº¡t tá»« 15% Ä‘áº¿n 30% theo tá»«ng giai Ä‘oáº¡n, tháº­m chÃ­ cÃ³ thá»ƒ tráº£ dáº§n trong 4 nÄƒm Ä‘áº§u cá»§a dá»± Ã¡n. Trong khi cÃ¡c hÃ¬nh thá»©c Ä‘áº§u tÆ° khÃ¡c trÃªn thá»‹ trÆ°á»ng thÆ°á»ng dáº«n Ä‘áº¿n chi phÃ­ hoáº¡t Ä‘á»™ng cá»§a khu nghá»‰ dÆ°á»¡ng cao, thu nháº­p cho thuÃª hÃ ng nÄƒm tháº¥p vÃ  cÃ¡c váº¥n Ä‘á» trÃ¡ch nhiá»‡m phÃ¡p lÃ½ phá»©c táº¡p, thÃ¬ á»Ÿ dá»± Ã¡n nÃ y, phÆ°Æ¡ng Ã¡n chia lá»£i nhuáº­n ká»ƒ trÃªn Ä‘Ã£ tháº­t sá»± háº¥p dáº«n cÃ¡c nhÃ  Ä‘áº§u tÆ°.<br />\r\n<br />\r\nRáº¥t nhiá»u dá»± Ã¡n lá»›n Ä‘ang triá»ƒn khai cá»§a chá»§ Ä‘áº§u tÆ° trong nÆ°á»›c vÃ  nÆ°á»›c ngoÃ i cÅ©ng lá»±a chá»n hÃ¬nh thá»©c Ä‘áº§u tÆ° nÃ y Ä‘á»ƒ thu hÃºt nhÃ  Ä‘áº§u tÆ°, nháº¥t lÃ  nhÃ  Ä‘áº§u tÆ° cÃ¡ nhÃ¢n, nhÆ° The First Villas &amp; Resort táº¡i Ká»³ SÆ¡n - HoÃ  BÃ¬nh; Flamingo Äáº¡i Láº£i; Hyatt ÄÃ  Náºµng... Ã”ng Äáº·ng Ngá»c HoÃ  - Tá»•ng giÃ¡m Ä‘á»‘c Daso Group - cho biáº¿t, á»Ÿ dá»± Ã¡n Ä‘áº£o nhÃ¢n táº¡o Hoa PhÆ°á»£ng, Ã´ng cÅ©ng sáº½ chá»‰ bÃ¡n hÆ¡n 100 cÄƒn biá»‡t thá»± xÃ¢y trÃªn Ä‘áº¥t á»Ÿ sá»Ÿ há»¯u lÃ¢u dÃ i (freehold land), sá»‘ biá»‡t thá»± cÃ²n láº¡i dÃ nh cho cÃ¡c chuyÃªn gia nÆ°á»›c ngoÃ i thuÃª dÃ i háº¡n, hoáº·c bÃ¡n dÆ°á»›i hÃ¬nh thá»©c \"time shareâ€, nhÃ  Ä‘áº§u tÆ° gÃ³p vá»‘n Ä‘áº§u tÆ° rá»“i cÃ¹ng chá»§ Ä‘áº§u tÆ° cho thuÃª láº¡i.<br />\r\n<br />\r\nTheo Ä‘Ã¡nh giÃ¡ cá»§a Savills Viá»‡t Nam, phÃ¢n khÃºc báº¥t Ä‘á»™ng sáº£n nghá»‰ dÆ°á»¡ng trong nÄƒm 2010 sáº½ cÃ³ nhiá»u diá»…n biáº¿n thÃº vá»‹, háº¥p dáº«n khÃ´ng chá»‰ vá»›i nhÃ  Ä‘áº§u tÆ° mÃ  cÃ²n vá»›i cáº£ ngÆ°á»i sá»­ dá»¥ng cuá»‘i cÃ¹ng. Tuy nhiÃªn, nguá»“n cung dá»“i dÃ o vá»›i giÃ¡ há»£p lÃ½ váº«n chÆ°a Ä‘á»§ Ä‘á»ƒ lÃ´i cuá»‘n nhÃ  Ä‘áº§u tÆ° hay ngÆ°á»i cÃ³ nhu cáº§u mua Ä‘á»ƒ á»Ÿ bá»Ÿi vÃ¬ cÃ ng cÃ³ nhiá»u lá»±a chá»n, khÃ¡ch hÃ ng cÃ ng khÃ³ tÃ­nh, há» sáº½ quan tÃ¢m nhiá»u hÆ¡n tá»›i thiáº¿t káº¿, vá»‹ trÃ­, cháº¥t lÆ°á»£ng dá»‹ch vá»¥ Ä‘i kÃ¨m.<br />\r\n<br />\r\nNhiá»u chuyÃªn gia báº¥t Ä‘á»™ng sáº£n cho ráº±ng, thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n nghá»‰ dÆ°á»¡ng Viá»‡t Nam Ä‘ang á»Ÿ giai Ä‘oáº¡n khá»Ÿi Ä‘áº§u, khi má»™t sá»‘ ngÆ°á»i báº¯t Ä‘áº§u cÃ³ tÃ­ch luá»¹ tÃ i sáº£n Ä‘á»§ lá»›n Ä‘á»ƒ tiáº¿p cáº­n nÃ³. VÃ  má»™t loáº¡i báº¥t Ä‘á»™ng sáº£n cÃ³ giÃ¡ trá»‹ cao vá» Ä‘á»™ sá»­ dá»¥ng cÅ©ng nhÆ° kháº£ nÄƒng sinh lá»i, thÃ¢n thiá»‡n vá»›i mÃ´i trÆ°á»ng thÃ¬ kháº£ nÄƒng phÃ¡t triá»ƒn máº¡nh trong thá»i gian tá»›i lÃ  ráº¥t kháº£ quan. VÃ  sá»± tháº­t trÃªn thá»‹ trÆ°á»ng hiá»‡n nay, nhu cáº§u vá» loáº¡i hÃ ng hoÃ¡ Ä‘áº·c biá»‡t nÃ y Ä‘ang cÃ³ nhá»¯ng cÆ¡n sÃ³ng ngáº§m máº¡nh máº½â€¦','thitruong.jpg','Theo Lao Äá»™ng','0000-00-00 00:00:00',0,1,NULL),
 (3,'Äáº§u tÆ° 4,5 tá»· USD vÃ o dá»± Ã¡n Khu du ','Polo Beach International Limited, Há»“ng KÃ´ng chuáº©n bá»‹ thÃ nh láº­p CÃ´ng ty TNHH quá»‘c táº¿ Polo Beach (Viá»‡t Nam) Ä‘á»ƒ Ä‘áº§u tÆ° vÃ o dá»± Ã¡n MÅ©i Dinh táº¡i Ninh Thuáº­n.','Äáº§u thÃ¡ng 8 nÄƒm 2010, Sá»Ÿ Káº¿ hoáº¡ch vÃ  Äáº§u tÆ° tá»‰nh Ninh Thuáº­n Ä‘Ã£ gá»­i vÄƒn báº£n lÃªn Bá»™ XÃ¢y dá»±ng vá» viá»‡c Ä‘á» nghá»‹ gÃ³p Ã½ kiáº¿n cho dá»± Ã¡n thÃ nh láº­p CÃ´ng ty TNHH quá»‘c táº¿ Polo Beach (Viá»‡t Nam).<br />\r\n\r\n<br />\r\n\r\nSau xem x&eacute;t, Bá»™ XÃ¢y dá»±ng Ä‘Ã£ cÃ³ vÄƒn báº£n 1588 /BXD â€“ HÄXD vá» cáº¥p giáº¥y chá»©ng nháº­n Ä‘áº§u tÆ°cho dá»± Ã¡n Khu du lá»‹ch tá»•ng há»£pcao cáº¥p MÅ©i Dinh.<br />\r\n\r\n<br />\r\n\r\nTheo Ä‘Ã³, Dá»± Ã¡n Khu du lá»‹ch tá»•ng há»£p cao cáº¥p MÅ©i Dinh, huyá»‡n Thuáº­n Nam, tá»‰nh Ninh Thuáº­n Ä‘Ã£ Ä‘Æ°á»£c UBND tá»‰nh Ninh Thuáº­n Ä‘á»“ng Ã½ chá»§ trÆ°Æ¡ng cho CÃ´ng ty Polo Beach International Limited, Há»“ng KÃ´ng Ä‘áº§u tÆ° theo vÄƒn báº£n sá»‘ 2783/UBND-TH ngÃ y 29/6/2010.<br />\r\n\r\n<br />\r\n\r\n\r\n<hr />\r\n\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n\r\n<br />\r\n\r\nDá»± Ã¡n Khu du lá»‹ch tá»•ng há»£p cao cáº¥p MÅ©i Dinh, tá»‰nh Ninh Thuáº­n cÃ³ quy mÃ´ chiáº¿m Ä‘áº¥t lá»›n 1.500 ha (diá»‡n tÃ­ch giai Ä‘oáº¡n 1 lÃ  700ha), tá»•ng vá»‘n Ä‘áº§u tÆ° 4,5 tá»· USD; lÄ©nh vá»±c Ä‘áº§u tÆ° Ä‘a dáº¡ng, gá»“m nhiá»u loáº¡i hÃ¬nh hoáº¡t Ä‘á»™ng nhÆ° khu nghá»‰ dÆ°á»¡ng cao cáº¥p, khu giáº£i trÃ­ tá»•ng há»£p quy mÃ´ lá»›n, khu biá»‡t thá»± cao cáº¥p, khu cÃ´ng trÃ¬nh cÃ´ng Ã­ch; Ä‘á»‹a bÃ n nghiÃªn cá»©u rá»™ng, chia lÃ m 4 khu chá»©c nÄƒng chÃ­nh gá»“m nhiá»u háº¡ng má»¥c Ä‘áº§u tÆ°. Song há»“ sÆ¡ chÆ°a cÃ³ vÄƒn báº£n cá»§a Ä‘á»‹a phÆ°Æ¡ng xem x&eacute;t vá» ná»™i dung quy hoáº¡ch vÃ¹ng dá»± Ã¡n.<br />\r\n\r\n<br />\r\n\r\nDo váº­y, trÃªn cÆ¡ sá»Ÿ quy hoáº¡ch chung xÃ¢y dá»±ng vÃ¹ng dá»± Ã¡n Ä‘Æ°á»£c duyá»‡t, NhÃ  Ä‘áº§u tÆ° láº­p quy hoáº¡ch cÃ¡c khu chá»©c nÄƒng Ä‘á»ƒ phÃ¢n Ä‘á»‹nh rÃµ cÃ¡c khu chá»©c nÄƒng, liÃªn káº¿t giá»¯a cÃ¡c khu chá»©c nÄƒng, tá»• chá»©c khÃ´ng gian, kiáº¿n trÃºc cáº£nh quan Ä‘áº£m báº£o sá»± phÃ¡t triá»ƒn cá»§a dá»± Ã¡n theo tá»«ng giai Ä‘oáº¡n, bá»‘ trÃ­ máº¡ng lÆ°á»›i cÃ¡c cÃ´ng trÃ¬nh ká»¹ thuáº­t,... lÃ m cÆ¡ sá»Ÿ cho cÃ´ng tÃ¡c láº­p, trÃ¬nh duyá»‡t quy hoáº¡ch chi tiáº¿t xÃ¢y dá»±ng 1/500 theo quy Ä‘á»‹nh vÃ  triá»ƒn khai thá»±c hiá»‡n cÃ¡c bÆ°á»›c tiáº¿p theo theo quy Ä‘á»‹nh cá»§a phÃ¡p luáº­t vá» xÃ¢y dá»±ng. <br />\r\n\r\n<br />\r\n\r\nBá»™ XÃ¢y dá»±ng cho biáº¿t, theo há»“ sÆ¡ vá» dá»± Ã¡n cho tháº¥y NhÃ  Ä‘áº§u tÆ° tá»± cam káº¿t gÃ³p vá»‘n Ä‘iá»u lá»‡ lÃ  900 triá»‡u USD chiáº¿m 20% tá»•ng vá»‘n Ä‘áº§u tÆ° dá»± Ã¡n lÃ  4,5 tá»· USD Ä‘Ã¡p á»©ng quy Ä‘á»‹nh, vÃ  há»“ sÆ¡ cÃ³ vÄƒn báº£n xÃ¡c nháº­n nÄƒng lá»±c tÃ i chÃ­nh cá»§a Johnson Capital Group, Inc cho NhÃ  Ä‘áº§u tÆ° thá»±c hiá»‡n dá»± Ã¡n vÃ  vÄƒn báº£n BÃ¡o cÃ¡o cá»§a kiá»ƒm toÃ¡n viÃªn Ä‘á»™c láº­p KPMG cho hai nÄƒm tÃ i chÃ­nh 2008, 2009.<br />\r\n\r\n<br />\r\n\r\nTuy nhiÃªn Ä‘á»ƒ Ä‘áº£m báº£o tiáº¿n Ä‘á»™, má»¥c tiÃªu Ä‘áº§u tÆ°, Bá»™ XÃ¢y dá»±ng Ä‘á» nghá»‹ Sá»Ÿ Káº¿ hoáº¡ch vÃ  Äáº§u tÆ° tá»‰nh Ninh Thuáº­n&nbsp; yÃªu cáº§u NhÃ  Ä‘áº§u tÆ° pháº£i cam káº¿t tiáº¿n Ä‘á»™ thá»±c hiá»‡n Ä‘áº§u tÆ° vÃ  giÃ¡m sÃ¡t quÃ¡ trÃ¬nh triá»ƒn khai Ä‘áº§u tÆ° Ä‘áº£m báº£o Ä‘Ãºng cam káº¿t.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />\r\n\r\n<br />\r\n\r\nMá»™t sá»‘ ná»™i dung cáº§n lÆ°u Ã½ cá»§a Bá»™ XÃ¢y dá»±ng<br />\r\n\r\n<br />\r\n\r\n- Dá»± Ã¡n cÃ³ háº¡ng má»¥c Ä‘áº§u tÆ° sÃ¢n gÃ´n (sÃ¢n gÃ´n MÅ©i Dinh) thuá»™c danh má»¥c cÃ¡c sÃ¢n gÃ´n dá»± kiáº¿n phÃ¡t triá»ƒn Ä‘áº¿n nÄƒm 2020 ban hÃ nh kÃ¨m theo Quyáº¿t Ä‘á»‹nh sá»‘ 1946/QÄ-TTg ngÃ y 26/11/2009 cá»§a Thá»§ tÆ°á»›ng ChÃ­nh phá»§ vá» phÃª duyá»‡t quy hoáº¡ch sÃ¢n gÃ´n Viá»‡t Nam Ä‘áº¿n nÄƒm 2020. Do váº­y khi láº­p dá»± Ã¡n Ä‘áº§u tÆ° xÃ¢y dá»±ng sÃ¢n gÃ´n Ä‘á» nghá»‹ NhÃ  Ä‘áº§u tÆ° thá»±c hiá»‡n tuÃ¢n theo cÃ¡c quy Ä‘á»‹nh táº¡i Quyáº¿t Ä‘á»‹nh nÃ y vÃ  cÃ¡c quy Ä‘á»‹nh phÃ¡p luáº­t khÃ¡c cÃ³ liÃªn quan; Ä‘á»“ng thá»i pháº£i Ä‘Æ°á»£c sá»± cháº¥p thuáº­n cá»§a cÆ¡ quan quáº£n lÃ½ nhÃ  nÆ°á»›c vá» Ä‘áº¥t Ä‘ai vá» quy mÃ´ sÃ¢n gÃ´n. <br />\r\n\r\n<br />\r\n\r\n- Äá» nghá»‹ UBND tá»‰nh Ninh Thuáº­n yÃªu cáº§u chá»§ Ä‘áº§u tÆ° lá»±a chá»n dá»± Ã¡n thÃ nh pháº§n Æ°u tiÃªn Ä‘áº§u tÆ° trÆ°á»›c vÃ  thá»±c hiá»‡n giao Ä‘áº¥t tá»«ng pháº§n phÃ¹ há»£p vá»›i tiáº¿n Ä‘á»™ dá»± Ã¡n, khÃ´ng Ä‘á»ƒ viá»‡c dá»± Ã¡n Ä‘Ã£ giao Ä‘áº¥t nhÆ°ng cháº­m, khÃ´ng triá»ƒn khai Ä‘áº§u tÆ°, gÃ¢y lÃ£ng phÃ­.<br />\r\n\r\n<br />\r\n\r\n- Bá»™ XÃ¢y dá»±ng cho ráº±ng, trÆ°á»›c máº¯t chá»‰ nÃªn xem x&eacute;t cho ph&eacute;p NhÃ  Ä‘áº§u tÆ° nÃ y kháº£o sÃ¡t, nghiÃªn cá»©u láº­p dá»± Ã¡n Ä‘áº§u tÆ° cho diá»‡n tÃ­ch 700ha Ä‘áº¥t (diá»‡n tÃ­ch Ä‘Ã£ Ä‘Æ°á»£c UBND tá»‰nh Ninh Thuáº­n cháº¥p thuáº­n); viá»‡c Ä‘áº§u tÆ° má»Ÿ rá»™ng dá»± Ã¡n giai Ä‘oáº¡n tiáº¿p theo (diá»‡n tÃ­ch 800ha) Ä‘Æ°á»£c xem x&eacute;t sau khi Ä‘Ã¡nh giÃ¡ hiá»‡u quáº£ Ä‘áº§u tÆ° cá»§a giai Ä‘oáº¡n trÆ°á»›c.','dautu.jpg','K.T - Theo Bá»™ XÃ¢y dá»±ng','2010-04-23 00:00:00',1,0,1),
 (4,'Viá»‡t kiá»u khÃ´ng á»Ÿ Viá»‡t Nam ba thÃ¡ng','Viá»‡t kiá»u khÃ´ng pháº£i vá» Viá»‡t Nam cÆ° trÃº Ä‘á»§ ba thÃ¡ng trá»Ÿ lÃªn (cÆ° trÃº liÃªn tá»¥c hoáº·c cá»™ng dá»“n) váº«n Ä‘Æ°á»£c mua nhÃ  táº¡i Viá»‡t Nam.','NgÆ°á»i mua chá»‰ cáº§n cÃ³ cÃ¡c giáº¥y tá» chá»©ng minh Ä‘á»§ Ä‘iá»u kiá»‡n vá» cÆ° trÃº. ÄÃ³ lÃ  ná»™i dung Bá»™ XÃ¢y dá»±ng vá»«a gá»­i á»¦y ban ThÆ°á»ng vá»¥ Quá»‘c há»™i xem x&eacute;t.<br />\r\n<br />\r\nTrong trÆ°á»ng há»£p Viá»‡t kiá»u váº«n mang há»™ chiáº¿u Viá»‡t Nam thÃ¬ pháº£i cÃ³ sá»• táº¡m trÃº hoáº·c giáº¥y tá» xÃ¡c nháº­n táº¡m trÃº do cÆ¡ quan cÃ´ng an cáº¥p phÆ°á»ng nÆ¡i ngÆ°á»i Ä‘Ã³ cÆ° trÃº cáº¥p Ä‘á»ƒ chá»©ng minh Ä‘Æ°á»£c ph&eacute;p cÆ° trÃº táº¡i Viá»‡t Nam. TrÆ°á»ng há»£p Viá»‡t kiá»u mang há»™ chiáº¿u nÆ°á»›c ngoÃ i thÃ¬ pháº£i cÃ³ tháº» táº¡m trÃº, hoáº·c pháº£i cÃ³ dáº¥u cá»§a cÆ¡ quan xuáº¥t cáº£nh cá»§a Viá»‡t Nam Ä‘Ã³ng vÃ o há»™ chiáº¿u ghi thá»i háº¡n cÆ° trÃº táº¡i Viá»‡t Nam tá»« ba thÃ¡ng trá»Ÿ lÃªn.<br />\r\n','haha.jpg','Theo PhÃ¡p Luáº­t TP','0000-00-00 00:00:00',1,0,NULL),
 (5,'Máº·t báº±ng bÃ¡n láº»: â€œHÃ ng Ä‘á»™câ€ gï','Trong lÄ©nh vá»±c kinh doanh máº·t báº±ng bÃ¡n láº» lÃ  nhÃ  phá»‘ táº¡i TPHCM cÃ³ má»™t dÃ²ng sáº£n pháº©m thuá»™c loáº¡i hÃ ng Ä‘á»™c Ä‘Æ°á»£c nhiá»u nhÃ  bÃ¡n láº» tÃ¬m kiáº¿m, giÃ¡ cáº£ cÅ©ng Ä‘ï','<span style=\"font-weight: bold;\">HÃ ng Ä‘á»™c Ä‘Æ°á»£c sÄƒn lÃ¹ng<br />\r\n	\r\n	<br />\r\n	\r\n	</span>Máº·t báº±ng náº±m ngay gÃ³c ngÃ£ tÆ° táº¥t nhiÃªn lÃ  sáº½ cÃ³ hai máº·t tiá»n, hÃ nh khÃ¡ch tá»« 4 hÆ°á»›ng lÆ°u thÃ´ng qua ngÃ£ tÆ° Ä‘á»u dá»… dÃ ng nháº­n tháº¥yâ€¦ Nhá» nhá»¯ng Æ°u tháº¿ trÃªn, dÃ²ng sáº£n pháº©m nÃ y luÃ´n Ä‘Æ°á»£c cÃ¡c nhÃ  bÃ¡n láº», kinh doanh sÄƒn lÃ¹ng.<br />\r\n\r\n<br />\r\n\r\nThá»±c táº¿ lÃ  cÃ³ khÃ¡ nhiá»u máº·t hÃ ng \"Ä‘áº¡i giaâ€ chuyÃªn tÃ¬m kiáº¿m nhá»¯ng vá»‹ trÃ­ máº·t báº±ng nhÆ° trÃªn Ä‘á»ƒ Ä‘áº·t cÆ¡ sá»Ÿ kinh doanh nhÆ° cÃ¢y xÄƒng, cá»­a hÃ ng máº¯t kÃ­nh thá»i trangâ€¦ Nhiá»u thÆ°Æ¡ng hiá»‡u thá»©c Äƒn nhanh ná»•i tiáº¿ng tháº¿ giá»›i nhÆ° KFC, Lotteriaâ€¦ cÅ©ng tháº¿.<br />\r\n\r\n<br />\r\n\r\nTheo cÃ¡c cÆ¡ sá»Ÿ mÃ´i giá»›i nhÃ  Ä‘áº¥t thÃ¬ giÃ¡ thuÃª máº·t báº±ng cÃ¡c vá»‹ trÃ­ gÃ³c ngÃ£ tÆ° luÃ´n cÃ³ giÃ¡ cao hÆ¡n máº·t báº±ng máº·t tiá»n cÃ¹ng tuyáº¿n Ä‘Æ°á»ng tá»« 20 - 50%. CÃ¡c máº·t báº±ng khÃ´ng pháº£i ngay gÃ³c ngÃ£ tÆ° cÃ³ hai máº·t tiá»n mÃ  chá»‰ gáº§n giao lá»™ má»™t chÃºt thÃ¬ giÃ¡ thuÃª cÅ©ng nhá»‰nh hÆ¡n cÃ¡c máº·t báº±ng náº±m giá»¯a Ä‘Æ°á»ng, vá»‹ trÃ­ cÃ ng gáº§n giao lá»™ thÃ¬ giÃ¡ cÃ ng cao.<br />\r\n\r\n<br />\r\n\r\n\r\n<hr />\r\n\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n\r\n<br />\r\n\r\nTuy giÃ¡ thuÃª cao nhÆ° tháº¿ nhÆ°ng cÃ¡c cÆ¡ sá»Ÿ mÃ´i giá»›i Ä‘á»u cho biáº¿t lÃ  muá»‘n thuÃª máº·t báº±ng gÃ³c ngÃ£ tÆ° ráº¥t khÃ³. VÃ¬ há»… cÃ³ máº·t báº±ng nÃ o vá»«a trá»‘ng chá»— lÃ  cÃ³ khÃ¡ch má»›i trÃ¡m vÃ o ngay, ai muá»‘n thuÃª pháº£i Ä‘áº·t hÃ ng trÆ°á»›c cho cÃ¡c cÆ¡ sá»Ÿ mÃ´i giá»›i nhá» Ä‘á»ƒ Ã½ giÃ¹m, khi cÃ³ hÃ ng thÃ¬ bÃ¡o chá»© khÃ´ng khi nÃ o cÃ³ sáºµn hÃ ng.<br />\r\n\r\n<br />\r\n\r\nKhÃ´ng chá»‰ máº·t báº±ng kinh doanh bÃªn dÆ°á»›i mÃ  ngay cáº£ khoáº£ng khÃ´ng bÃªn trÃªn cÃ¡c vá»‹ trÃ­ nÃ y cÅ©ng Ä‘Æ°á»£c cÃ¡c nhÃ  quáº£ng cÃ¡o nháº¯m tá»›i. Bá»Ÿi vá»›i vá»‹ trÃ­ Ä‘áº¹p, hÆ°á»›ng há»™i tá»¥ nhiá»u dÃ²ng xe, gÃ³c ngÃ£ tÆ° luÃ´n lÃ  Æ°u tiÃªn hÃ ng Ä‘áº§u Ä‘á»ƒ Ä‘áº·t cÃ¡c báº£ng quáº£ng cÃ¡o ngoÃ i trá»i; Ä‘áº·c biá»‡t lÃ  cÃ¡c gÃ³c ngÃ£ tÆ° cá»§a cÃ¡c tuyáº¿n Ä‘Æ°á»ng cháº¡y theo trá»¥c báº¯c - nam, vÃ¬ Ä‘Ã¢y lÃ  vá»‹ trÃ­ cÃ³ gÃ³c nhÃ¬n tá»‘t, thá»i gian Ä‘Ã³n sÃ¡ng dÃ iâ€¦<br />\r\n\r\n<br />\r\n\r\n<span style=\"font-weight: bold;\">GÃ³c ngÃ£ tÆ° chÆ°a cháº¯c Ä‘áº¹p</span><br />\r\n\r\n<br />\r\n\r\nTuy trÃªn nguyÃªn táº¯c vá»‹ trÃ­ gÃ³c ngÃ£ tÆ° lÃ  Ä‘áº¯c Ä‘á»‹a, tá»¥ há»™i Ã¡nh nhÃ¬n tá»« nhiá»u hÆ°á»›ng lÆ°u thÃ´ng. Tuy nhiÃªn, cÅ©ng cÃ³ vÃ i vá»‹ trÃ­ do cÃ¡c lÃ½ do khÃ¡c nhau mÃ  trá»Ÿ thÃ nh nhá»¯ng máº·t tiá»n gÃ³c ngÃ£ tÆ°â€¦ khÃ´ng Ä‘áº¹p.<br />\r\n\r\n<br />\r\n\r\nCháº³ng háº¡n nhÆ° vá»‹ trÃ­ gÃ³c ngÃ£ tÆ° LÃ½ ThÃ¡i Tá»• - Nguyá»…n Thá»‹ Minh Khai. CÃ³ thá»ƒ nÃ³ Ä‘Ã¢y lÃ  má»™t vá»‹ trÃ­ ráº¥t Ä‘áº¹p vÃ¬ náº±m ngay gÃ³c ná»•i báº­t cá»§a má»™t giao lá»™ 6 tuyáº¿n Ä‘Æ°á»ng huyáº¿t máº¡ch á»Ÿ trung tÃ¢m TP, má»—i ngÃ y cÃ³ hÃ ng trÄƒm ngÃ n lÆ°á»£t ngÆ°á»i cháº¡y qua vÃ²ng xoay nÃ y.<br />\r\n\r\n<br />\r\n\r\nTuy nhiÃªn, thá»±c táº¿ kinh doanh cá»§a nhiá»u cá»­a hÃ ng táº¡i vá»‹ trÃ­ nÃ y cÅ©ng khÃ´ng hiá»‡u quáº£ láº¯m so vá»›i cÃ¡i giÃ¡ thuÃª cao ngáº¥t ngÆ°á»Ÿng cá»§a máº·t báº±ng, lÆ°á»£ng khÃ¡ch Ä‘áº¿n giao dá»‹ch quÃ¡ Ã­t so vá»›i mong Ä‘á»£i cá»§a cÃ¡c khÃ¡ch thuÃª máº·t báº±ng.<br />\r\n\r\n<br />\r\n\r\nNhiá»u ngÆ°á»i cho lÃ  vÃ¬ vá»‹ trÃ­ nÃ y náº±m ngay gÃ³c láº¹m cá»§a vÃ²ng cung ráº½ tá»« Nguyá»…n Thá»‹ Minh Khai sang LÃ½ ThÃ¡i Tá»• nÃªn xe lÆ°u thÃ´ng theo hÆ°á»›ng nÃ y khÃ³ tháº¥y, xe cÃ¡c hÆ°á»›ng khÃ¡c tháº¥y dá»… dÃ ng nhÆ°ng ngáº¡i Ä‘áº¿n vÃ¬ lÆ°á»£ng xe lÆ°u thÃ´ng quanh vÃ²ng xoay ráº¥t Ä‘Ã´ng, khÃ³ ráº½ vÃ o. Chá»‰ nhá»¯ng yáº¿u tá»‘ nhá» trÃªn cÅ©ng khiáº¿n vá»‹ trÃ­ Ä‘áº¯c Ä‘á»‹a nhÆ° tháº¿ trá»Ÿ thÃ nhâ€¦ khÃ´ng Ä‘áº¹p.<br />\r\n\r\n<br />\r\n\r\nNgoÃ i nhá»¯ng gÃ³c ngÃ£ tÆ° cÃ¡ biá»‡t trÃªn, nhá»¯ng máº·t báº±ng gÃ³c ngÃ£ tÆ° cá»§a cÃ¡c tuyáº¿n Ä‘Æ°á»ng 1 chiá»u cÅ©ng lÃ  nhá»¯ng máº·t báº±ng Ä‘áº¯c Ä‘á»‹a nhÆ°ngâ€¦ khÃ´ng Ä‘áº¹p. VÃ¬ chÃ­nh Ä‘Æ°á»ng 1 chiá»u Ä‘Ã£ háº¡n cháº¿ ráº¥t nhiá»u khÃ¡ch nhÃ¬n tháº¥y cá»­a hÃ ng nhÆ°ng ngáº¡i Ä‘áº¿n giao dá»‹ch vÃ¬ khÃ³ ráº½ vÃ o.<br />\r\n\r\n<br />\r\n\r\nNgoÃ i ra, nhá»¯ng gÃ³c ngÃ£ tÆ° bá»‹ lÃ´ cá»‘t cháº¯n ngang cÅ©ng khiáº¿n giÃ¡ trá»‹ cá»§a nÃ³ giáº£m háº³n trong máº¯t nhÃ  kinh doanh. VÃ¬ Ä‘á»‘i vá»›i cÃ¡c cá»­a hÃ ng bÃ¡n láº», vá»‹ trÃ­ khÃ¡ch dá»… nháº­n tháº¥y lÃ  Ä‘iá»u quan trá»ng, Ä‘iá»u kiá»‡n giao thÃ´ng dá»… dÃ ng cho khÃ¡ch tiáº¿p cáº­n cá»­a hÃ ng cÃ ng quan trá»ng hÆ¡n. LÃ´ cá»‘t Ä‘Ã£ cháº¯n máº¥t lá»‘i vÃ o cá»§a khÃ¡ch thÃ¬ vá»‹ trÃ­ gÃ³c ngÃ£ tÆ° máº¥t háº³n giÃ¡ trá»‹ cá»§a nÃ³, trá»Ÿ thÃ nh gÃ³c ngÃ£ tÆ° khÃ´ng Ä‘áº¹p.','mat.jpg',NULL,'1900-11-06 00:00:00',1,0,1),
 (6,'CÄƒn há»™ chung cÆ° cÅ© giáº£m giÃ¡.','Sau má»™t thá»i gian tÄƒng giÃ¡ chÃ³ng máº·t do cÃ¡c chá»§ dá»± Ã¡n kinh doanh nhÃ  Ä‘áº©y má»©c giÃ¡ bá»“i thÆ°á»ng vÃ  há»— trá»£ giáº£i tá»a lÃªn cao, hiá»‡n má»©c giÃ¡ cÄƒn há»™ chung cÆ° cÅ© á','Theo thÃ´ng tin tá»« má»™t sá»‘ sÃ n giao dá»‹ch báº¥t Ä‘á»™ng sáº£n, giÃ¡ cÄƒn há»™ chung cÆ° cÅ© táº¡i quáº­n 1, hiá»‡n tháº¥p nháº¥t lÃ  33 triá»‡u Ä‘á»“ng/m2. Cá»¥ thá»ƒ, má»™t cÄƒn há»™ chung cÆ° Nguyá»…n ThÃ¡i BÃ¬nh thuá»™c phÆ°á»ng Nguyá»…n ThÃ¡i BÃ¬nh Ä‘ang cÃ³ giÃ¡ chÃ o bÃ¡n á»Ÿ má»©c 33-35 triá»‡u Ä‘á»“ng/m2.<br />\r\n<br />\r\nCÄƒn há»™ táº¡i chung cÆ° 300 thuá»™c phÆ°á»ng Cáº§u Kho giÃ¡ tá»« 37-44 triá»‡u Ä‘á»“ng/m2... Nhiá»u chung cÆ° cÅ© nhÆ°ng tá»a láº¡c táº¡i nhá»¯ng tuyáº¿n Ä‘Æ°á»ng trung tÃ¢m giÃ¡ chÃ o bÃ¡n cÃ²n tá»« 50 - 70 triá»‡u Ä‘á»“ng/m2, trong khi trÆ°á»›c Ä‘Ã¢y nhiá»u cÄƒn há»™ cÅ© vÃ  xuá»‘ng cáº¥p cÅ©ng Ä‘Æ°á»£c rao giÃ¡ cáº£ trÄƒm triá»‡u Ä‘á»“ng/m2.','index.jpg',' Theo NgÆ°á»i Lao Äá»™ng','0000-00-00 00:00:00',1,0,1),
 (7,'Lao Ä‘á»™ng nháº­p cÆ° cÃ³ Ã­t \"cá»­a\" mua nh','Khi UBND TP HÃ  Ná»™i cÃ³ Quyáº¿t Ä‘á»‹nh 34 quy Ä‘á»‹nh 10 Ä‘iá»ƒm quyáº¿t Ä‘á»‹nh, Æ°u tiÃªn cho cÃ¡c Ä‘á»‘i tÆ°á»£ng thuá»™c diá»‡n chÃ­nh sÃ¡ch, ngÆ°á»i cÃ³ cÃ´ng vá»›i cÃ¡ch máº¡ng, nhá»¯ng ngÆ°','328 cÄƒn nhÃ  á»Ÿ xÃ£ há»™i diá»‡n tÃ­ch tá»« 60 -70m2 vá»›i giÃ¡ chá»‰ ngoÃ i 600 triá»‡u Ä‘á»“ng do Vinaconex XuÃ¢n Mai lÃ m chá»§ Ä‘áº§u tÆ° táº¡i phá»‘ NgÃ´ ThÃ¬ Nháº­m (HÃ  ÄÃ´ng) báº¯t Ä‘áº§u Ä‘Æ°á»£c bÃ¡n ra ngoÃ i thá»‹ trÆ°á»ng khiáº¿n ráº¥t nhiá»u ngÆ°á»i cÃ³ thu nháº­p tháº¥p cÃ ng trá»Ÿ nÃªn sá»‘t sáº¯ng. Náº¿u khÃ´ng cÃ³ nhá»¯ng dá»± Ã¡n nhÃ  á»Ÿ xÃ£ há»™i nhÆ° tháº¿ nÃ y thÃ¬ cháº¯c cháº¯n nhá»¯ng ngÆ°á»i cÃ³ thu nháº­p tháº¥p khÃ´ng bao giá» cÃ³ thá»ƒ sá»Ÿ há»¯u Ä‘Æ°á»£c má»™t cÄƒn há»™ mÆ¡ Æ°á»›c. Tuy váº­y, khÃ´ng biáº¿t há»“ sÆ¡ cá»§a mÃ¬nh cÃ³ Ä‘Æ°á»£c duyá»‡t váº«n Ä‘ang lÃ  cÃ¢u há»i cá»§a ráº¥t nhiá»u ngÆ°á»i.<br />\r\n<strong><br />\r\n	Lao Ä‘á»™ng nháº­p cÆ° khÃ³ Ä‘áº¿n lÆ°á»£t</strong><br />\r\n<br />\r\nTá»« cÃ¡ch Ä‘Ã¢y hÆ¡n má»™t thÃ¡ng khi nghe thÃ´ng tin dá»± Ã¡n nhÃ  á»Ÿ thu nháº­p tháº¥p Ä‘áº§u tiÃªn á»Ÿ HÃ  ÄÃ´ng sáº¯p sá»­a tiáº¿p nháº­n há»“ sÆ¡, khiáº¿n vá»£ chá»“ng anh Tráº§n VÄƒn Chiáº¿n (quÃª gá»‘c á»Ÿ ThÃ¡i BÃ¬nh, hiá»‡n Ä‘ang thuÃª nhÃ  á»Ÿ sá»‘ nhÃ  2D, ngÃ¡ch 29/436, ngÃµ 442, Ä‘Æ°á»ng Ã‚u CÆ¡) Ä‘áº·c biá»‡t quan tÃ¢m. Hai vá»£ chá»“ng thay nhau Ä‘á»c bÃ¡o, lÃªn máº¡ng tÃ¬m hiá»ƒu thÃ´ng tin, táº­n dá»¥ng háº¿t cÃ¡c má»‘i quan há»‡ thÃ¢n quen nháº±m tÃ¬m cÃ¡ch tiáº¿p cáº­n dá»± Ã¡n, lÃ m há»“ sÆ¡ Ä‘Äƒng kÃ½ mua nhÃ .<br />\r\n<br />\r\nX&eacute;t theo quy Ä‘á»‹nh thÃ¬ cáº£ hai vá»£ chá»“ng anh Ä‘á»u lÃ  ngÆ°á»i cÃ³ thu nháº­p tháº¥p vÃ¬ hiá»‡n cáº£ hai vá»£ chá»“ng Ä‘á»u Ä‘ang cÃ´ng tÃ¡c á»Ÿ má»™t doanh nghiá»‡p NhÃ  nÆ°á»›c náº±m trÃªn Ä‘á»‹a bÃ n quáº­n TÃ¢y Há»“.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\nKhÃ´ng nhá»¯ng tháº¿, sau gáº§n chá»¥c nÄƒm lao Ä‘á»™ng tÃ­ch cá»±c cÃ³ Ä‘Æ°á»£c má»™t khoáº£n tiá»n nháº¥t Ä‘á»‹nh, hai vá»£ chá»“ng láº¡i bÃ n nhau tiáº¿p tá»¥c vá» quÃª vay hai bÃªn gia Ä‘Ã¬nh ná»™i ngoáº¡i vÃ  Ä‘Æ°á»£c ngÆ°á»i thÃ¢n Ä‘á»“ng Ã½ cho mÆ°á»£n sá»‘ tiá»n vÃ i trÄƒm triá»‡u Ä‘á»ƒ mua nhÃ . Váº«n biáº¿t sá»‘ lÆ°á»£ng nhÃ  cá»§a dá»± Ã¡n nÃ y khÃ´ng nhiá»u nhÆ°ng cáº£ hai vá»£ chá»“ng anh Chiáº¿n váº«n hy vá»ng vÃ o cÆ¡ há»™i hiáº¿m cÃ³ nÃ y.<br />\r\n<br />\r\nNáº¿u cÄƒn cá»© theo quy Ä‘á»‹nh vá» \"diá»‡n Ä‘Æ°á»£c mua nhÃ  giÃ¡ tháº¥p\" táº¡i ThÃ´ng tÆ° 36 cá»§a Bá»™ XÃ¢y dá»±ng thÃ¬ cáº£ hai vá»£ chá»“ng anh Ä‘á»u tháº¥y mÃ¬nh phÃ¹ há»£p vá»›i cÃ¡c tiÃªu chÃ­ cÆ¡ báº£n (chiáº¿m Ä‘áº¿n 90 Ä‘iá»ƒm) nhÆ°: ngÆ°á»i mua nhÃ  pháº£i lÃ  cÃ¡n bá»™, cÃ´ng chá»©c, viÃªn chá»©c chÆ°a cÃ³ nhÃ  á»Ÿ hoáº·c cÃ³ nhÃ  á»Ÿ dÆ°á»›i 5m2 sá»­ dá»¥ng/ngÆ°á»i, cÃ³ thu nháº­p dÆ°á»›i má»©c bÃ¬nh quÃ¢n cá»§a Ä‘á»‹a phÆ°Æ¡ng...<br />\r\n<br />\r\nTuy nhiÃªn, Ä‘áº¿n ngÃ y 16/8 khi UBND TP HÃ  Ná»™i cÃ³ Quyáº¿t Ä‘á»‹nh 34, thÃ¬ 10 Ä‘iá»ƒm cÃ²n láº¡i, cÅ©ng lÃ  10 Ä‘iá»ƒm quyáº¿t Ä‘á»‹nh, Æ°u tiÃªn cho cÃ¡c Ä‘á»‘i tÆ°á»£ng thuá»™c diá»‡n chÃ­nh sÃ¡ch, ngÆ°á»i cÃ³ cÃ´ng vá»›i cÃ¡ch máº¡ng, nhá»¯ng ngÆ°á»i lao Ä‘á»™ng, hoáº¡t Ä‘á»™ng cÃ³ trÃ¬nh Ä‘á»™, tay nghá» báº­c cao nháº¥t trong má»™t sá»‘ lÄ©nh vá»±câ€¦ thÃ¬ cáº£ hai vá»£ chá»“ng Ä‘á»u cáº£m tháº¥y cÆ¡ há»™i cho mÃ¬nh lÃ  khÃ´ng nhiá»u, tháº­m chÃ­ lÃ  báº±ng khÃ´ng.<br />\r\n<br />\r\n<strong>Sáº½ duyá»‡t há»“ sÆ¡ theo Ä‘Ãºng quy Ä‘á»‹nh</strong><br />\r\n<br />\r\nÄÃ³ lÃ  lá»i cam káº¿t cá»§a Ã´ng Äáº·ng HoÃ ng Huy, Tá»•ng GiÃ¡m Ä‘á»‘c Vinaconex XuÃ¢n Mai khi Vinaconex XuÃ¢n Mai tiáº¿p nháº­n há»“ sÆ¡. Ã”ng Huy kháº³ng Ä‘á»‹nh Ä‘Æ¡n vá»‹ sáº½ bÃ¡n cÄƒn há»™ Ä‘Ãºng quy cháº¿ theo ThÃ´ng tÆ° 36 cá»§a Bá»™ XÃ¢y dá»±ng vÃ  theo Quyáº¿t Ä‘á»‹nh 34 cá»§a UBND TP HÃ  Ná»™i vÃ  sáº½ khÃ´ng cÃ³ báº¥t ká»³ má»™t trÆ°á»ng há»£p há»“ sÆ¡ ngoáº¡i lá»‡ nÃ o. Náº¿u trong trÆ°á»ng há»£p cÃ³ quÃ¡ nhiá»u ngÆ°á»i cÃ¹ng Ä‘áº¡t thang Ä‘iá»ƒm tá»‘i Ä‘a 100 thÃ¬ cÃ´ng ty sáº½ tÃ­nh Ä‘áº¿n phÆ°Æ¡ng Ã¡n bá»‘c thÄƒm xem ai Ä‘Æ°á»£c quyá»n mua trÆ°á»›c.<br />\r\n<br />\r\nKhÃ´ng chá»‰ dá»± Ã¡n CT1-NgÃ´ ThÃ¬ Nháº­m, nguá»“n cung cÄƒn há»™ giÃ¡ ráº» táº¡i quáº­n HÃ  ÄÃ´ng thá»i gian tá»›i tiáº¿p tá»¥c tÄƒng máº¡nh khi dá»± Ã¡n nhÃ  á»Ÿ cho ngÆ°á»i cÃ³ thu nháº­p tháº¥p quy mÃ´ 5 khá»‘i nhÃ  cao 19 táº§ng gá»“m 1.512 cÄƒn há»™, diá»‡n tÃ­ch tá»« 65-70m2, giÃ¡ dá»± kiáº¿n 8 triá»‡u Ä‘á»“ng/m2 vá»«a Ä‘Æ°á»£c Tá»•ng CÃ´ng ty Xuáº¥t nháº­p kháº©u vÃ  XÃ¢y dá»±ng Viá»‡t Nam - Vinaconex khá»Ÿi cÃ´ng hÃ´m 21/8.<br />\r\n<br />\r\nBÃªn cáº¡nh Ä‘Ã³, 800 cÄƒn há»™ cho thuÃª theo diá»‡n nhÃ  xÃ£ há»™i do vá»‘n ngÃ¢n sÃ¡ch thÃ nh phá»‘ Ä‘áº§u tÆ° cÅ©ng Ä‘ang Ä‘Æ°á»£c gáº¥p rÃºt hoÃ n thiá»‡n táº¡i khu Ä‘Ã´ thá»‹ Viá»‡t HÆ°ng (quáº­n Long BiÃªn).<br />\r\n<br />\r\nÃ”ng Nguyá»…n Quá»‘c Tuáº¥n, PhÃ³ GiÃ¡m Ä‘á»‘c Sá»Ÿ XÃ¢y dá»±ng HÃ  Ná»™i cho biáº¿t, ngay khi tiáº¿p nháº­n há»“ sÆ¡ Ä‘áº¿n háº¿t ngÃ y 10/9, chá»§ Ä‘áº§u tÆ° sáº½ tiáº¿n hÃ nh x&eacute;t duyá»‡t há»“ sÆ¡ cá»§a nhá»¯ng ngÆ°á»i Ä‘Äƒng kÃ½ mua nhÃ  ngay.<br />\r\n<br />\r\nKhi chá»§ Ä‘áº§u tÆ° x&eacute;t xong chuyá»ƒn há»“ sÆ¡ vÃ  danh sÃ¡ch cho Sá»Ÿ XÃ¢y dá»±ng Ä‘á»ƒ Sá»Ÿ kiá»ƒm tra. 15 ngÃ y sau náº¿u Sá»Ÿ khÃ´ng cÃ³ Ã½ kiáº¿n gÃ¬ thÃ¬ chá»§ Ä‘áº§u tÆ° Ä‘Æ°á»£c ph&eacute;p bÃ¡n cho ngÆ°á»i mua.<br />\r\n<br />\r\nVinaconex XuÃ¢n Mai sáº½ nháº­n há»“ sÆ¡ tá»« ngÃ y 26/8 Ä‘áº¿n háº¿t 10/9: Má»›i chá»‰ trong 2 ngÃ y Ä‘áº§u tiÃªn Ä‘Ã£ cÃ³ hÃ ng trÄƒm ngÆ°á»i mang há»“ sÆ¡ Ä‘áº¿n Ä‘Äƒng kÃ½ Ä‘á»ƒ Ä‘Æ°á»£c x&eacute;t duyá»‡t. LÆ°á»£ng ngÆ°á»i mang há»“ sÆ¡ Ä‘áº¿n Ä‘Äƒng kÃ½ Ä‘Ã´ng lÃ  váº­y nhÆ°ng thá»±c táº¿ sá»‘ há»“ sÆ¡ Ä‘Ãºng yÃªu cáº§u láº¡i khÃ´ng nhiá»u. Trong ngÃ y Ä‘áº§u tiÃªn, hÆ¡n trÄƒm ngÆ°á»i mang há»“ sÆ¡ Ä‘áº¿n ná»™p nhÆ°ng chá»‰ cÃ³ hÆ¡n chá»¥c há»“ sÆ¡ Ä‘áº¡t yÃªu cáº§u, Ä‘áº§y Ä‘á»§ cÃ¡c loáº¡i giáº¥y tá», thá»§ tá»¥c Ä‘Ãºng theo quy Ä‘á»‹nh.<br />\r\n<br />\r\nTrÆ°á»›c tÃ¬nh tráº¡ng nÃ y, Ã´ng Äáº·ng HoÃ ng Huy - Tá»•ng GiÃ¡m Ä‘á»‘c CÃ´ng ty CP BÃªtÃ´ng vÃ  XÃ¢y dá»±ng Vinaconex XuÃ¢n Mai - chá»§ Ä‘áº§u tÆ° dá»± Ã¡n CT1 - NgÃ´ ThÃ¬ Nháº­m, HÃ  ÄÃ´ng lÆ°u Ã½, cÃ¡c khÃ¡ch hÃ ng cáº§n nghiÃªn cá»©u ká»¹ Quyáº¿t Ä‘á»‹nh 34 ban hÃ nh ngÃ y 16/8 cá»§a UBND HÃ  Ná»™i Ä‘á»ƒ xem mÃ¬nh cÃ³ thuá»™c Ä‘á»‘i tÆ°á»£ng Ä‘Æ°á»£c x&eacute;t hay khÃ´ng, náº¿u cÃ³ thÃ¬ Ä‘áº¡t thang Ä‘iá»ƒm bao nhiÃªu.<br />\r\n<br />\r\nÃ”ng Huy khuyáº¿n cÃ¡o, nhá»¯ng trÆ°á»ng há»£p tá»± x&eacute;t tháº¥y mÃ¬nh tháº¥p Ä‘iá»ƒm quÃ¡ thÃ¬ chÆ°a nÃªn tham gia Ä‘Äƒng kÃ½ mua nhÃ  Ä‘á»£t nÃ y mÃ  nÃªn tiáº¿p tá»¥c kiÃªn nháº«n chá» cÃ¡c dá»± Ã¡n káº¿ tiáº¿p, bá»Ÿi kháº£ nÄƒng nhá»¯ng khÃ¡ch hÃ ng Ä‘áº¡t Ä‘iá»ƒm tá»‘i Ä‘a (100 Ä‘iá»ƒm) trong giai Ä‘oáº¡n Ä‘áº§u tiÃªn sáº½ lÃ  ráº¥t lá»›n.','laodong.jpg','Theo CÃ´ng An NhÃ¢n DÃ¢n','0000-00-00 00:00:00',0,1,NULL),
 (8,'Báº¥t Ä‘á»™ng sáº£n láº¡i â€œngá»£p thá»Ÿâ€.','Nhiá»u quy Ä‘á»‹nh má»›i vá» tÃ­n dá»¥ng cho báº¥t Ä‘á»™ng sáº£n vÃ  mua nhÃ ... khiáº¿n thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n cÃ³ nguy cÆ¡ láº¡i â€œÄ‘Ã³ng bÄƒngâ€','ChÆ°a bao giá» thá»‹ trÆ°á»ng nhÃ  Ä‘áº¥t láº¡i cÃ³ nhiá»u chÃ­nh sÃ¡ch tÃ¡c Ä‘á»™ng Ä‘an xen theo chiá»u hÆ°á»›ng xáº¥u nhÆ° hiá»‡n nay. Theo thá»‘ng kÃª sÆ¡ bá»™, cÃ³ Ã­t nháº¥t 3 chÃ­nh sÃ¡ch liÃªn quan Ä‘áº¿n tÃ i chÃ­nh, thuáº¿ sá»­ dá»¥ng Ä‘áº¥t vÃ  hoáº¡t Ä‘á»™ng kinh doanh Ä‘ang lÃ m cho cÃ¡c ngÃ¢n hÃ ng, chá»§ Ä‘áº§u tÆ° vÃ  khÃ¡ch hÃ ng dÃ¨ dáº·t má»Ÿ háº§u bao Ä‘á»ƒ Ä‘áº§u tÆ° vÃ o thá»‹ trÆ°á»ng nÃ y.<br />\r\n<br />\r\n<strong>Láº¡i khÃ³a \"vanâ€ tÃ­n dá»¥ng<br />\r\n	</strong><br />\r\nNáº¿u Ä‘áº§u nÄƒm 2008, nhiá»u ngÆ°á»i tá»«ng chá»©ng kiáº¿n thá»‹ trÆ°á»ng nhÃ  Ä‘áº¥t báº¯t Ä‘áº§u Ä‘i xuá»‘ng vÃ  \"Ä‘Ã³ng bÄƒngâ€ do chÃ­nh sÃ¡ch tÃ­n dá»¥ng thÃ¬ nay, thá»‹ trÆ°á»ng nÃ y cÃ³ thá»ƒ sáº½ láº¡i tiáº¿p tá»¥c pháº£i chá»‹u cáº£nh \"cÃ¡m treo, heo nhá»‹n Ä‘Ã³iâ€.<br />\r\n<br />\r\nNguyÃªn nhÃ¢n chÃ­nh lÃ  cÃ¡c ngÃ¢n hÃ ng buá»™c pháº£i thá»±c hiá»‡n theo nhá»¯ng chÃ­nh sÃ¡ch liÃªn quan Ä‘áº¿n ThÃ´ng tÆ° sá»‘ 13/2010/TT-NHNN do Thá»‘ng Ä‘á»‘c NgÃ¢n hÃ ng NhÃ  nÆ°á»›c ban hÃ nh (ngÃ y 20-5-2010) quy Ä‘á»‹nh vá» cÃ¡c tá»‰ lá»‡ báº£o Ä‘áº£m an toÃ n hoáº¡t Ä‘á»™ng cÃ¡c tá»• chá»©c tÃ­n dá»¥ng, sáº½ cÃ³ hiá»‡u lá»±c thi hÃ nh tá»« ngÃ y 1-10.<br />\r\n<br />\r\nQuy Ä‘á»‹nh nÃ y nháº±m phÃ²ng ngá»«a nguy cÆ¡ bong bÃ³ng báº¥t Ä‘á»™ng sáº£n (BÄS), theo Ä‘Ã³ sáº½ tÄƒng há»‡ sá»‘ rá»§i ro tá»« 100% lÃªn 250% Ä‘á»‘i vá»›i cÃ¡c khoáº£n vay kinh doanh BÄS, Ä‘á»“ng thá»i tÄƒng há»‡ sá»‘ an toÃ n vá»‘n cá»§a cÃ¡c ngÃ¢n hÃ ng lÃªn 9%.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\nNhÆ° váº­y, viá»‡c vay vá»‘n mua nhÃ  Ä‘áº¥t sáº½ khÃ³ khÄƒn hÆ¡n vÃ¬ cÃ¡c ngÃ¢n hÃ ng sáº½ pháº£i thu háº¹p tÃ­n dá»¥ng trong lÄ©nh vá»±c nÃ y Ä‘á»ƒ báº£o Ä‘áº£m an toÃ n vá»‘n. Nguá»“n cung tÃ­n dá»¥ng cÅ©ng sáº½ bá»‹ thu háº¹p, trong khi Ä‘Ã³ mua bÃ¡n BÄS lÃ¢u nay chá»§ yáº¿u sá»­ dá»¥ng khÃ¡ nhiá»u tá»« vá»‘n vay ngÃ¢n hÃ ng. Nhá»¯ng Ä‘á»™ng thÃ¡i trÃªn sáº½ tÃ¡c Ä‘á»™ng xáº¥u Ä‘áº¿n thá»‹ trÆ°á»ng vÃ  nguy cÆ¡ \"Ä‘Ã³ng bÄƒngâ€ BÄS lÃ  Ä‘iá»u khÃ³ trÃ¡nh khá»i.<br />\r\n<br />\r\nTheo Ä‘Ã¡nh giÃ¡ cá»§a cÃ¡c chuyÃªn gia Ä‘á»‹a á»‘c, khi ThÃ´ng tÆ° 13 cÃ³ hiá»‡u lá»±c thi hÃ nh sáº½ cÃ³ tÃ¡c Ä‘á»™ng Ä‘áº¿n dÃ²ng tiá»n Ä‘á»• vÃ o BÄS. CÃ¡c ngÃ¢n hÃ ng sáº½ pháº£i thu háº¹p láº¡i nhá»¯ng khoáº£n vay cho cáº£ chá»§ Ä‘áº§u tÆ° Ä‘ang kinh doanh dá»± Ã¡n vÃ  cáº£ nhá»¯ng khÃ¡ch hÃ ng Ä‘Ã£ vÃ  sáº½ tham gia thá»‹ trÆ°á»ng mua cÄƒn há»™ tráº£ gÃ³p.<br />\r\n<br />\r\nVá» dÃ i háº¡n, viá»‡c tÄƒng há»‡ sá»‘ rá»§i ro Ä‘á»‘i vá»›i lÄ©nh vá»±c BÄS cÃ³ thá»ƒ sáº½ giÃºp há»‡ thá»‘ng ngÃ¢n hÃ ng báº£o Ä‘áº£m Ä‘Æ°á»£c má»©c Ä‘á»™ an toÃ n vá»‘n vÃ  á»•n Ä‘á»‹nh vá»¯ng cháº¯c trÆ°á»›c nhá»¯ng biáº¿n Ä‘á»™ng xáº¥u cá»§a ná»n kinh táº¿ vÄ© mÃ´, song vá» ngáº¯n háº¡n, thá»‹ trÆ°á»ng cháº¯c cháº¯n sáº½ chá»©ng kiáº¿n má»™t sá»‘ cÃ´ng ty kinh doanh nhÃ  Ä‘áº¥t trong nÆ°á»›c phÃ¡ sáº£n vÃ  buá»™c pháº£i bÃ¡n láº¡i dá»± Ã¡n. KhÃ¡ch hÃ ng cÃ³ nhu cáº§u mua nhÃ  Ä‘á»ƒ á»Ÿ cÅ©ng sáº½ gáº·p khÃ´ng Ã­t khÃ³ khÄƒn vÃ¬ thiáº¿u sá»± há»— trá»£ tÃ i chÃ­nh cáº§n thiáº¿t cho khoáº£n vay cÃ²n láº¡i...<br />\r\n<br />\r\n<strong>Doanh nghiá»‡p kÃªu khÃ³<br />\r\n	</strong><br />\r\nKhi doanh nghiá»‡p kinh doanh nhÃ  Ä‘áº¥t váº«n chÆ°a háº¿t choÃ¡ng vÃ¡ng vá»›i Nghá»‹ Ä‘á»‹nh 69/CP (ban hÃ nh ngÃ y 13-8-2009) vá» viá»‡c thu tiá»n sá»­ dá»¥ng Ä‘áº¥t theo giÃ¡ thá»‹ trÆ°á»ng Ä‘á»‘i vá»›i cÃ¡c doanh nghiá»‡p khi thá»±c hiá»‡n cÃ¡c dá»± Ã¡n nhÃ  á»Ÿ thÃ¬ má»›i Ä‘Ã¢y, dá»± tháº£o thÃ´ng tÆ° hÆ°á»›ng dáº«n Nghá»‹ Ä‘á»‹nh 71 vá» quy Ä‘á»‹nh chi tiáº¿t vÃ  hÆ°á»›ng dáº«n Luáº­t NhÃ  á»Ÿ Ä‘ang Ä‘Æ°á»£c Bá»™ XÃ¢y dá»±ng láº¥y Ã½ kiáº¿n láº¡i tiáº¿p tá»¥c gÃ¢y báº¥t lá»£i Ä‘á»‘i vá»›i thá»‹ trÆ°á»ng vÃ  bá»‹ pháº£n á»©ng. Theo nhiá»u doanh nghiá»‡p vÃ  nhÃ  Ä‘áº§u tÆ°, náº¿u má»™t sá»‘ quy Ä‘á»‹nh trong thÃ´ng tÆ° nÃ y Ä‘Æ°a vÃ o Ã¡p dá»¥ng thÃ¬ thá»‹ trÆ°á»ng BÄS cÃ³ nguy cÆ¡ \"Ä‘Ã³ng bÄƒngâ€.<br />\r\n<br />\r\nCá»¥ thá»ƒ hÆ¡n, theo dá»± tháº£o quy Ä‘á»‹nh, ká»ƒ tá»« ngÃ y 8-8, trong pháº¡m vi má»™t tá»‰nh, TP trá»±c thuá»™c Trung Æ°Æ¡ng, má»—i há»™ gia Ä‘Ã¬nh hoáº·c cÃ¡ nhÃ¢n khi tham gia gÃ³p vá»‘n hoáº·c há»£p tÃ¡c Ä‘áº§u tÆ° vá»›i chá»§ Ä‘áº§u tÆ° chá»‰ Ä‘Æ°á»£c phÃ¢n chia má»™t cÄƒn nhÃ  á»Ÿ (nhÃ  biá»‡t thá»±, nhÃ  riÃªng láº», cÄƒn há»™ chung cÆ°).<br />\r\n<br />\r\nCÃ¢u há»i Ä‘áº·t ra: VÃ¬ sao má»—i ngÆ°á»i chá»‰ Ä‘Æ°á»£c ph&eacute;p mua má»™t cÄƒn nhÃ  mÃ  khÃ´ng pháº£i nhiá»u hÆ¡n, tÃ¹y thuá»™c vÃ o Ä‘iá»u kiá»‡n tÃ i chÃ­nh? NgoÃ i ra, dá»± tháº£o cÃ²n quy Ä‘á»‹nh, khi gÃ³p vá»‘n, bÃªn Ä‘Æ°á»£c phÃ¢n chia nhÃ  á»Ÿ khÃ´ng Ä‘Æ°á»£c chuyá»ƒn nhÆ°á»£ng quyá»n sá»­ dá»¥ng cho tá»• chá»©c, cÃ¡ nhÃ¢n khÃ¡c. Náº¿u ngÆ°á»i Ä‘Æ°á»£c phÃ¢n chia qua Ä‘á»i thÃ¬ ngÆ°á»i thá»«a káº¿ má»›i tiáº¿p tá»¥c Ä‘Æ°á»£c hÆ°á»Ÿng.<br />\r\n<br />\r\nNháº­n Ä‘á»‹nh vá» Ä‘iá»u khoáº£n nÃ y, Ã´ng LÃª HoÃ ng ChÃ¢u, Chá»§ tá»‹ch Hiá»‡p há»™i BÄS TPHCM, cho ráº±ng: \"Má»—i há»™ gia Ä‘Ã¬nh hoáº·c cÃ¡ nhÃ¢n khi tham gia gÃ³p vá»‘n vÃ o dá»± Ã¡n chá»‰ Ä‘Æ°á»£c chia má»™t nhÃ  á»Ÿ lÃ  báº¥t há»£p lÃ½, Ä‘i ngÆ°á»£c vá»›i thÃ´ng lá»‡ quá»‘c táº¿ vÃ  á»Ÿ gÃ³c Ä‘á»™ nÃ o Ä‘Ã³ Ä‘ang lÃ m khÃ³ thá»‹ trÆ°á»ng BÄSâ€.<br />\r\n<br />\r\nMá»™t váº¥n Ä‘á» khÃ¡c cÅ©ng Ä‘ang gÃ¢y tranh cÃ£i lÃ  theo Ä‘iá»u 19 cá»§a dá»± tháº£o, há»™ gia Ä‘Ã¬nh, cÃ¡ nhÃ¢n, tá»• chá»©c khÃ´ng cÃ³ chá»©c nÄƒng kinh doanh BÄS khi chuyá»ƒn nhÆ°á»£ng há»£p Ä‘á»“ng gÃ³p vá»‘n pháº£i cÃ³ chá»©ng nháº­n cá»§a cÆ¡ quan cÃ´ng chá»©ng. Theo cÃ¡c doanh nghiá»‡p, náº¿u pháº£i thÃªm pháº§n cÃ´ng chá»©ng sáº½ khiáº¿n giao dá»‹ch thÃªm rá»‘i vÃ  máº¥t thá»i gian, bá»Ÿi vÃ¬ trÆ°á»›c nay, viá»‡c mua bÃ¡n Ä‘Æ°á»£c thá»±c hiá»‡n ráº¥t nhanh gá»n...<br />\r\n<br />\r\nHiá»‡p há»™i BÄS TPHCM vá»«a cÃ³ vÄƒn báº£n gá»­i cÃ¡c doanh nghiá»‡p vÃ  cÃ¡c cÆ¡ quan liÃªn quan Ä‘á»ƒ táº­p há»£p Ã½ kiáº¿n nháº±m pháº£n Ã¡nh nhá»¯ng báº¥t cáº­p trong dá»± tháº£o Ä‘á»ƒ gá»­i cho Bá»™ XÃ¢y dá»±ng trÆ°á»›c khi thÃ´ng tÆ° Ä‘Æ°á»£c ban hÃ nh. Theo nháº­n Ä‘á»‹nh cá»§a cÃ¡c chuyÃªn gia Ä‘á»‹a á»‘c, dÆ°á»›i tÃ¡c Ä‘á»™ng cá»§a Nghá»‹ Ä‘á»‹nh 69, Nghá»‹ Ä‘á»‹nh 71 vÃ  ThÃ´ng tÆ° 13, thá»‹ trÆ°á»ng BÄS cÃ³ nguy cÆ¡ láº¡i \"Ä‘Ã³ng bÄƒngâ€.<br />\r\n<strong><br />\r\n	Thanh lá»c thá»‹ trÆ°á»ng<br />\r\n	</strong><br />\r\nTheo Thá»© trÆ°á»Ÿng Bá»™ XÃ¢y dá»±ng Nguyá»…n Tráº§n Nam, Nghá»‹ Ä‘á»‹nh 71 sáº½ thanh lá»c thá»‹ trÆ°á»ng, nhá»¯ng quy Ä‘á»‹nh cháº·t cháº½ sáº½ loáº¡i khá»i cuá»™c chÆ¡i nhá»¯ng doanh nghiá»‡p khÃ´ng cÃ³ tÃ­nh chuyÃªn nghiá»‡p cao vÃ  nÄƒng lá»±c tÃ i chÃ­nh tháº¥p. Trong ngáº¯n háº¡n, thá»‹ trÆ°á»ng cÃ³ thá»ƒ chá»¯ng láº¡i vÃ  cÃ³ nguy cÆ¡ \"Ä‘Ã³ng bÄƒngâ€ nhÆ°ng vá» lÃ¢u dÃ i sáº½ giÃºp thá»‹ trÆ°á»ng minh báº¡ch hÆ¡n, phÃ¡t triá»ƒn bá»n vá»¯ng, á»•n Ä‘á»‹nh hÆ¡n...<br />\r\n','bddd.jpg','Theo NgÆ°á»i Lao Äá»™ng','0000-00-00 00:00:00',1,0,1),
 (9,'Xu hÆ°á»›ng má»›i cá»§a thá»‹ trÆ°á»ng cÄƒn ','CÄƒn há»™ cÃ³ giÃ¡ bÃ¡n khoáº£ng 17 triá»‡u Ä‘á»“ng/m 2 trá»Ÿ xuá»‘ng Ä‘ang lÃ  tÃ¢m Ä‘iá»ƒm dáº«n dáº¯t kÃªnh báº¥t Ä‘á»™ng sáº£n.','PhÃ¢n khÃºc cÄƒn há»™ cao cáº¥p Ä‘Ã³ng bÄƒng khi tÃ¡m thÃ¡ng Ä‘áº§u nÄƒm khÃ´ng cÃ³ dá»± Ã¡n siÃªu cao cáº¥p nÃ o chÃ o bÃ¡n. Trong khi Ä‘Ã³, nhá»¯ng dá»± Ã¡n cÄƒn há»™ cÃ³ giÃ¡ tá»« khoáº£ng 17 triá»‡u Ä‘á»“ng/m2 Ä‘á»• láº¡i bung hÃ ng máº¡nh máº½.<br />\r\n<br />\r\nXu hÆ°á»›ng chuyá»ƒn Ä‘á»™ng cá»§a kÃªnh báº¥t Ä‘á»™ng sáº£n ngáº¯n háº¡n cÅ©ng nhÆ° trung háº¡n lÃ  hÆ°á»›ng Ä‘áº¿n khÃ¡ch hÃ ng vá»›i cÃ¡ch xÃ¢y cÄƒn há»™ giÃ¡ trung bÃ¬nh, cháº¥t lÆ°á»£ng cao, nhiá»u tiá»‡n Ã­ch.<br />\r\n<br />\r\nÄÃ¢y lÃ  nháº­n Ä‘á»‹nh cá»§a CÃ´ng ty TNHH Cushman &amp; Wakefield Viá»‡t Nam, chuyÃªn nghiÃªn cá»©u vá» thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n Ä‘Æ°a ra trong \"ÄÃªm báº¥t Ä‘á»™ng sáº£n láº§n thá»© 28â€ do Hiá»‡p há»™i Báº¥t Ä‘á»™ng sáº£n TP.HCM tá»• chá»©c ngÃ y 26-8.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\n<strong>CÄƒn há»™ háº¡ng trung lÃªn ngÃ´i</strong><br />\r\n<br />\r\nBÃ¡o cÃ¡o cá»§a cÃ´ng ty nÃ y cho tháº¥y á»Ÿ TP trong tÃ¡m thÃ¡ng qua Ä‘Ã£ cÃ³ 46 dá»± Ã¡n vá»›i tá»•ng sá»‘ 8.550 cÄƒn há»™ giÃ¡ khoáº£ng 17 triá»‡u Ä‘á»“ng/m2 trá»Ÿ xuá»‘ng chÃ o bÃ¡n ra thá»‹ trÆ°á»ng, cÃ²n láº¡i cÃ¡c phÃ¢n khÃºc khÃ¡c thÃ¬ chá»§ Ä‘áº§u tÆ° Ã¡n binh báº¥t Ä‘á»™ng hoáº·c ra sáº£n pháº©m nhá» giá»t.<br />\r\n<br />\r\nNháº­n Ä‘á»‹nh nÃ y cÅ©ng trÃ¹ng khá»›p vá»›i káº¿t quáº£ kháº£o sÃ¡t cá»§a cÃ¡c cÃ´ng ty nghiÃªn cá»©u báº¥t Ä‘á»™ng sáº£n khÃ¡c nhÆ° CBRE, Savill, Vietreesâ€¦ CÃ¡c bÃ¡o cÃ¡o nghiÃªn cá»©u cá»§a cÃ¡c cÃ´ng ty trÃªn Ä‘á»u cho tháº¥y trÃªn thá»‹ trÆ°á»ng sÆ¡ cáº¥p chá»‰ cÃ³ cÃ¡c dá»± Ã¡n cÄƒn há»™ giÃ¡ trung bÃ¬nh táº¡i cÃ¡c quáº­n nhÆ° 9, TÃ¢n PhÃº, Thá»§ Äá»©c, GÃ² Váº¥p bung hÃ ng.<br />\r\n<br />\r\nGhi nháº­n cá»§a phÃ³ng viÃªn cÅ©ng cho tháº¥y trong hai quÃ½ Ä‘áº§u nÄƒm 2010, cÃ¡c dá»± Ã¡n cÄƒn há»™ cao cáº¥p á»Ÿ cÃ¡c quáº­n 2, 7, NhÃ  BÃ¨â€¦ gáº§n nhÆ° trÃ¹m má»m, tháº­m chÃ­ cÃ³ má»™t dá»± Ã¡n má»Ÿ cá»­a bÃ¡n hÃ ng nhÆ°ng tá»‰ lá»‡ khÃ¡ch hÃ ng vÃ o mua khÃ´ng Ä‘Ã¡ng ká»ƒ.<br />\r\n<br />\r\nCÃ²n á»Ÿ cÃ¡c sÃ n giao dá»‹ch báº¥t Ä‘á»™ng sáº£n cÃ³ uy tÃ­n nhÆ° Sacomreal, TÃ­n NghÄ©a, NhÃ  Viá»‡t Nam, PhÃ¡t HÆ°ngâ€¦ thÃ¬ giao dá»‹ch chá»§ yáº¿u vá» Ä‘áº¥t ná»n, cÃ²n cÄƒn há»™ bÃ¡n chá»‰ cÃ³ á»Ÿ phÃ¢n khÃºc cÄƒn há»™ giÃ¡ háº¡ng trung.<br />\r\n<br />\r\n<strong>Phá»¥c vá»¥ ngÆ°á»i mua á»Ÿ</strong><br />\r\n<br />\r\nLÃ½ giáº£i cho viá»‡c cÄƒn há»™ cao cáº¥p máº¥t Ä‘i tÃ­nh dáº«n dáº¯t thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n, Ã´ng Hugo Slade, GiÃ¡m Ä‘á»‘c CÃ´ng ty TNHH Cushman &amp; Wakefield Viá»‡t Nam, cho biáº¿t lÃ  do giÃ¡ bÃ¡n khÃ´ng phÃ¹ há»£p vá»›i kháº£ nÄƒng chi tráº£, Ä‘áº§u cÆ¡ \"lÆ°á»›t sÃ³ngâ€ thÃ¬ Ã­t cÆ¡ há»™i vÃ  lÃ£i suáº¥t vay quÃ¡ cao Ä‘á»‘i vá»›i ngÆ°á»i mua á»Ÿ.<br />\r\n<br />\r\nNgoÃ i ra cÃ¡c chÃ­nh sÃ¡ch nhÆ° Nghá»‹ Ä‘á»‹nh 69 tÃ­nh thuáº¿ tiá»n sá»­ dá»¥ng Ä‘áº¥t, Nghá»‹ Ä‘á»‹nh 71 siáº¿t Ä‘áº§u cÆ¡â€¦ cÅ©ng tÃ¡c Ä‘á»™ng máº¡nh Ä‘áº¿n tÃ¢m lÃ½ khÃ¡ch hÃ ng vÃ  lÃ m áº£nh hÆ°á»Ÿng thá»‹ trÆ°á»ng. VÃ¬ tháº¿ kÃªnh báº¥t Ä‘á»™ng sáº£n Ä‘Ã£ cÃ³ sá»± Ä‘á»•i ngÃ´i khi cÄƒn há»™ cao cáº¥p rÆ¡i vÃ o cáº£nh áº£m Ä‘áº¡m, cÃ²n phÃ¢n khÃºc cÄƒn há»™ giÃ¡ trung bÃ¬nh, bÃ¬nh dÃ¢n lÃªn ngÃ´i.<br />\r\n<br />\r\nÃ”ng LÃª HoÃ ng ChÃ¢u, Chá»§ tá»‹ch Hiá»‡p há»™i Báº¥t Ä‘á»™ng sáº£n TP.HCM, cÅ©ng Ä‘á»“ng tÃ¬nh vá»›i nháº­n x&eacute;t trÃªn. Ã”ng cho ráº±ng thá»‹ trÆ°á»ng cÄƒn há»™ lÃºc nÃ y Ä‘ang hÆ°á»›ng Ä‘áº¿n ngÆ°á»i mua á»Ÿ.<br />\r\n<br />\r\n\"Hiá»‡n ngÆ°á»i mua quan tÃ¢m Ä‘áº¿n vá»‹ trÃ­, giÃ¡, chÆ°Æ¡ng trÃ¬nh thanh toÃ¡n, há»— trá»£ tÃ i chÃ­nh, thiáº¿t káº¿, thÆ°Æ¡ng hiá»‡u, sá»± minh báº¡châ€¦ ChÃ­nh vÃ¬ tháº¿ nhiá»u chá»§ Ä‘áº§u tÆ° dá»± Ã¡n báº¥t Ä‘á»™ng sáº£n cÅ©ng chuyá»ƒn hÆ°á»›ng sang xÃ¢y cÄƒn há»™ cÃ³ giÃ¡ trung bÃ¬nh, cháº¥t lÆ°á»£ng, nhiá»u tiá»‡n Ã­ch Ä‘á»ƒ cung á»©ngâ€.<br />\r\n<br />\r\nTheo Ã´ng ChÃ¢u, sá»± chuyá»ƒn hÆ°á»›ng nhÆ° váº­y cá»§a doanh nghiá»‡p báº¥t Ä‘á»™ng sáº£n lÃ  cÃ³ lá»£i cho khÃ¡ch hÃ ng mua á»Ÿ cÅ©ng nhÆ° Ä‘áº§u tÆ°.<br />\r\n<br />\r\nThá»±c táº¿ thá»‹ trÆ°á»ng cÅ©ng cho tháº¥y cÃ¡c chá»§ Ä‘áº§u tÆ° nhÆ° Nam Long, Thuduc House, Váº¡n PhÃ¡t HÆ°ngâ€¦ thá»i gian gáº§n Ä‘Ã¢y tung sáº£n pháº©m cÄƒn há»™ giÃ¡ trung bÃ¬nh tá»« 18 triá»‡u Ä‘á»“ng/m2 trá»Ÿ láº¡i, xÃ¢y cháº¥t lÆ°á»£ng, giao nhÃ  Ä‘Ãºng tiáº¿n Ä‘á»™â€¦ Ä‘Ã£ ráº¥t hÃºt khÃ¡ch lÃ  vÃ­ dá»¥.<br />\r\n','xuhuong.jpg','Theo PhÃ¡p luáº­t Tp.HCM','0000-00-00 00:00:00',0,1,NULL);
INSERT INTO `tin_tuc` (`ID_TinTuc`,`TieuDe`,`TrichDanTin`,`NoiDung`,`HinhMinhHoa`,`TacGia`,`NgayDangTin`,`TinHot`,`TinTieuDiem`,`TinMoi`) VALUES 
 (10,'Äáº¥t phÃ­a TÃ¢y tÄƒng giÃ¡: Nghá»‹ch lÃ½ cá','Äáº¥t phÃ­a TÃ¢y tÄƒng giÃ¡, Ä‘áº·c biá»‡t lÃ  cÆ¡n sá»‘t Ä‘áº¥t Ba VÃ¬ trong thá»i gian qua lÃ  má»™t nghá»‹ch lÃ½ cá»§a quáº£n lÃ½. Cáº§n Ä‘áº·t ra váº¥n Ä‘á» tÃ¡c Ä‘á»™ng cá»§a Ä‘á»‹nh hÆ°á»›ng ','ÄÃ³ lÃ  Ã½ kiáº¿n cá»§a Ã´ng Äáº·ng HÃ¹ng VÃµ, nguyÃªn thá»© trÆ°á»Ÿng bá»™ TÃ i nguyÃªn vÃ  mÃ´i trÆ°á»ng, táº¡i há»™i tháº£o vá» báº¥t Ä‘á»™ng sáº£n phÃ­a TÃ¢y vá»«a diá»…n ra.<br />\r\n<br />\r\nÄá»‹nh hÆ°á»›ng phÃ¡t triá»ƒn HÃ  Ná»™i vá» phÃ­a TÃ¢y Ä‘Ã£ Ä‘Æ°á»£c ChÃ­nh phá»§, lÃ£nh Ä‘áº¡o thÃ nh phá»‘ quyáº¿t Ä‘á»‹nh tá»« nhiá»u nÄƒm nay. Má»™t quy hoáº¡ch ráº¥t nghiÃªm tÃºc chá» phÃª duyá»‡t mÃ  tÃ¡c Ä‘á»™ng vÃ o sá»‘t Ä‘áº¥t thá»±c táº¿ Ä‘Ã£ xáº£y ra.<br />\r\n<br />\r\nVá»«a qua, Bá»™ XÃ¢y dá»±ng Ä‘Ã£ cÃ³ bÃ¡o cÃ¡o gá»­i Thá»§ tÆ°á»›ng ChÃ­nh phá»§ vá» tÃ¬nh hÃ¬nh thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n táº¡i má»™t sá»‘ khu vá»±c Ä‘ang xem x&eacute;t quy hoáº¡ch táº¡i HÃ  Ná»™i. Táº¡i khu vá»±c phÃ­a TÃ¢y, giÃ¡ báº¥t Ä‘á»™ng sáº£n tÄƒng Ä‘á»u Ä‘áº·n tá»« trÆ°á»›c khi cÃ³ quyáº¿t Ä‘á»‹nh sÃ¡t nháº­p thá»§ Ä‘Ã´ HÃ  Ná»™i cho Ä‘áº¿n nay, trong khi táº¡i cÃ¡c khu vá»±c phÃ­a báº¯c, phÃ­a nam vÃ  phÃ­a Ä‘Ã´ng chá»‰ má»›i tÄƒng trá»Ÿ láº¡i tá»« Ä‘áº§u quÃ½ 1/2010.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\nÄáº·c biá»‡t, lÆ°á»£ng giao dá»‹ch vÃ  giÃ¡ chuyá»ƒn nhÆ°á»£ng Ä‘Æ°á»£c chÃ o bÃ¡n trÃªn thá»‹ trÆ°á»ng tá»± do cÃ¡c loáº¡i Ä‘áº¥t thá»• cÆ°, Ä‘áº¥t cÃ¢y lÃ¢u nÄƒm Ä‘Ã£ Ä‘Æ°á»£c cáº¥p giáº¥y chá»©ng nháº­n quyá»n sá»­ dá»¥ng Ä‘áº¥t táº¡i nhiá»u Ä‘á»‹a bÃ n cá»§a HÃ  Ná»™i, trong Ä‘Ã³ cÃ³ cÃ¡c Ä‘á»‹a Ä‘iá»ƒm Ä‘ang Ä‘Æ°á»£c xem x&eacute;t quy hoáº¡ch Thá»§ Ä‘Ã´ HÃ  Ná»™i, tÄƒng máº¡nh trong quÃ½ 1 vÃ  Ä‘áº§u quÃ½ 2/2010.<br />\r\n<br />\r\nTÃ¬nh tráº¡ng \"lÃ m giÃ¡â€, tung tin Ä‘á»“n, giao dá»‹ch áº£o Ä‘á»ƒ Ä‘áº©y giÃ¡ báº¥t Ä‘á»™ng sáº£n lÃªn cao, nháº¥t lÃ  táº¡i cÃ¡c khu vá»±c huyá»‡n Tháº¡ch Tháº¥t, huyá»‡n Ba VÃ¬. Háº§u háº¿t, cÃ¡c giao dá»‹ch chá»§ yáº¿u lÃ  Ä‘áº§u tÆ°, \"lÆ°á»›t sÃ³ngâ€ chá»© khÃ´ng cÃ³ nhu cáº§u vá» chá»— á»Ÿ. Viá»‡c Ä‘áº§u cÆ¡, kÃ­ch giÃ¡, \"lÃ m giÃ¡â€ áº£o cá»§a giá»›i Ä‘áº§u cÆ¡, tÃ¢m lÃ½ mua bÃ¡n theo \"tin Ä‘á»“nâ€, \"tÃ¢m lÃ½ Ä‘Ã¡m Ä‘Ã´ngâ€ cá»§a cÃ¡c nhÃ  Ä‘áº§u tÆ° nhá» láº» cÅ©ng lÃ  má»™t trong nhá»¯ng nguyÃªn nhÃ¢n Ä‘á»ƒ Ä‘áº©y giÃ¡ báº¥t Ä‘á»™ng sáº£n lÃªn cao.<br />\r\n<br />\r\nTheo Ã´ng Äáº·ng HÃ¹ng VÃµ nháº­n Ä‘á»‹nh, tÃ¡c Ä‘á»™ng cá»§a Ä‘á»‹nh hÆ°á»›ng phÃ¡t triá»ƒn HÃ  Ná»™i vá» phÃ­a TÃ¢y thá»±c táº¿ Ä‘Ã£ áº£nh hÆ°á»Ÿng tá»›i thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n. ChÃ­nh vÃ¬ tháº¿ cáº§n pháº£i cÃ³ nhá»¯ng biá»‡n phÃ¡p Ä‘á»ƒ trÃ¡nh cÃ¡c tÃ¡c Ä‘á»™ng xáº¥u.<br />\r\n<br />\r\nSá»± biáº¿n Ä‘á»™ng chÃ³ng máº·t cá»§a thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n phÃ­a TÃ¢y, cáº§n pháº£i nghiÃªm tÃºc rÃºt kinh nghiá»‡m trong cÃ´ng tÃ¡c quáº£n lÃ½, cáº§n pháº£i cÃ³ nhá»¯ng bÆ°á»›c Ä‘i Ä‘Ãºng Ä‘á»ƒ thá»‹ trÆ°á»ng phÃ¡t triá»ƒn má»™t cÃ¡ch lÃ nh máº¡nh. CÆ¡ cháº¿ gá»i vá»‘n vÃ  chia sáº» lá»£i Ã­ch hiá»‡u quáº£ cá»§a vá»‘n gá»i cÃ³ táº§m quan trá»ng Ä‘áº·c biá»‡t Ä‘á»ƒ táº¡o á»•n Ä‘á»‹nh cho thá»‹ trÆ°á»ng. Vá»‘n báº¥t Ä‘á»™ng sáº£n lÃ  má»™t váº¥n Ä‘á» lá»›n cáº§n cÃ¡c giáº£i phÃ¡p Ä‘á»“ng bá»™.<br />\r\n<br />\r\nNghá»‹ Ä‘á»‹nh 71/2010/NÄ-CP vá»«a Ä‘Æ°á»£c ChÃ­nh phá»§ ban hÃ nh, táº­p trung vÃ o giáº£i quyáº¿t Ä‘Æ°á»£c khÃ¡ nhiá»u váº¥n Ä‘á» cÃ³ liÃªn quan tá»›i cÆ¡ cháº¿ giáº£i quyáº¿t vá»‘n cho thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n vÃ  nÃ¢ng cao tÃ­nh minh báº¡ch cho thá»‹ trÆ°á»ng.<br />\r\n<br />\r\nNghá»‹ Ä‘á»‹nh nÃ y cÅ©ng hÆ°á»›ng tá»›i viá»‡c loáº¡i bá» Ä‘i nhá»¯ng nhÃ  Ä‘áº§u tÆ° lÃ m Äƒn thiáº¿u chuyÃªn nghiá»‡p, Ä‘áº§u cÆ¡ lÆ°á»›t sÃ³ng, táº¡o máº­p má» thÃ´ng tin, trá»¥c lá»£i tá»« nhá»¯ng káº½ há»Ÿ cá»§a thá»‹ trÆ°á»ng. NgoÃ i cÆ¡ cháº¿ chuyá»ƒn Ä‘á»•i quá»¹ Ä‘áº¥t thÃ nh nÄƒng lá»±c tÃ i chÃ­nh, cÆ¡ cháº¿ \"mua bÃ¡n nhÃ  trÃªn giáº¥yâ€ trÃªn cÆ¡ sá»Ÿ huy Ä‘á»™ng vá»‘n tá»« ngÆ°á»i tiÃªu dÃ¹ng cÅ©ng Ä‘Æ°á»£c xem x&eacute;t, loáº¡i trá»« Ä‘i nhá»¯ng rá»§i ro Ä‘á»‘i vá»›i bÃªn mua. ÄÃ¢y cÅ©ng lÃ  tÃ­n hiá»‡u tá»‘t cho thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n.<br />\r\n','datphia.jpg','Theo Duy KhÃ¡nh - Dothi.net','0000-00-00 00:00:00',1,0,NULL),
 (11,'Dá»± trá»¯ Ä‘áº¥t Ä‘em láº¡i nhiá»u lá»£i Ã­','Dá»± trá»¯ Ä‘áº¥t lÃ  biá»‡n phÃ¡p quan trá»ng Ä‘á»ƒ chÃ­nh quyá»n Ä‘Ã´ thá»‹ thá»±c hiá»‡n â€œkinh doanh Ä‘Ã´ thá»‹â€.','Hiá»‡n nay phÆ°Æ¡ng thá»©c thu há»“i Ä‘áº¥t, giao Ä‘áº¥t á»Ÿ nÆ°á»›c ta thá»±c hiá»‡n chá»§ yáº¿u qua viá»‡c nhÃ  nÆ°á»›c thu há»“i Ä‘áº¥t, bá»“i thÆ°á»ng, giáº£i phÃ³ng máº·t báº±ng (thÃ´ng qua chá»§ Ä‘áº§u tÆ°) vÃ  giao Ä‘áº¥t cho nhÃ  Ä‘áº§u tÆ°. Sá»Ÿ dÄ© phÆ°Æ¡ng thá»©c nÃ y Ä‘Æ°á»£c phá»• biáº¿n lÃ  do chÃ­nh quyá»n cÃ¡c tá»‰nh cho ráº±ng chá»‰ cÃ¡c nhÃ  Ä‘áº§u tÆ° tÆ° nhÃ¢n, nhÃ  Ä‘áº§u tÆ° nÆ°á»›c ngoÃ i má»›i cÃ³ nhiá»u tiá»n Ä‘á»ƒ á»©ng trÆ°á»›c cho viá»‡c bá»“i thÆ°á»ng, giáº£i phÃ³ng máº·t báº±ng, cÃ²n tá»‰nh khÃ´ng cÃ³ tiá»n Ä‘á»ƒ lÃ m viá»‡c Ä‘Ã³.<br />\r\n<br />\r\n<strong>DÃ¢n Ä‘á»¡ cá»±c, nhÃ  Ä‘áº§u tÆ° bá»›t khá»•</strong><br />\r\n<br />\r\nThá»±c ra kinh doanh trong thá»‹ trÆ°á»ng Ä‘áº¥t Ä‘Ã´ thá»‹, dÃ¹ lÃ  ai thÃ¬ cÅ©ng pháº£i dá»±a vÃ o pháº§n lá»›n vá»‘n vay ngÃ¢n hÃ ng. Váº¥n Ä‘á» chá»‰ lÃ  Ä‘Æ¡n vá»‹ kinh doanh cÃ³ Ä‘á»§ Ä‘á»™ tin cáº­y Ä‘á»ƒ ngÃ¢n hÃ ng cho vay hay khÃ´ng mÃ  thÃ´i. VÃ¬ tháº¿, náº¿u tá»• chá»©c phÃ¡t triá»ƒn quá»¹ Ä‘áº¥t cáº¥p tá»‰nh, TP cÃ³ dá»± Ã¡n tá»‘t, Ä‘Æ°á»£c ngÃ¢n hÃ ng tin cáº­y vÃ  Ä‘Æ°á»£c chÃ­nh quyá»n Ä‘á»©ng ra báº£o lÃ£nh thÃ¬ váº«n sáº½ vay Ä‘Æ°á»£c nhiá»u vá»‘n Ä‘á»ƒ dá»± trá»¯ Ä‘áº¥t. Tháº­m chÃ­ Ä‘á»‹a phÆ°Æ¡ng cÃ²n cÃ³ thá»ƒ vay Ä‘Æ°á»£c vá»‘n ODA náº¿u Ä‘Ã³ lÃ  dá»± Ã¡n dá»± trá»¯ Ä‘áº¥t cÃ³ quan tÃ¢m Ä‘áº¿n ngÆ°á»i nghÃ¨o, giÃºp cáº£i thiá»‡n mÃ´i trÆ°á»ng Ä‘Ã´ thá»‹â€¦<br />\r\n<br />\r\nGiÃ¡ Ä‘áº¥t Ä‘Ã´ thá»‹ á»Ÿ ta hiá»‡n Ä‘ang theo hÃ¬nh xoáº¯n á»‘c, nÄƒm sau luÃ´n cao hÆ¡n nÄƒm trÆ°á»›c. Náº¿u Ã¡p dá»¥ng viá»‡c dá»± trá»¯ Ä‘áº¥t, chÃ­nh quyá»n Ä‘Ã´ thá»‹ cÃ³ thá»ƒ phÃ¡ vá»¡ cÃ¡i vÃ²ng luáº©n quáº©n Ä‘Ã³ báº±ng cÃ¡ch thÃ´ng qua tá»• chá»©c phÃ¡t triá»ƒn quá»¹ Ä‘áº¥t Ä‘á»ƒ thá»±c hiá»‡n \"nÄƒm thá»‘ng nháº¥tâ€ nhÆ° kinh nghiá»‡m cá»§a Trung Quá»‘c. ÄÃ³ lÃ : Thá»‘ng nháº¥t thu há»“i; thá»‘ng nháº¥t dá»± trá»¯; thá»‘ng nháº¥t phÃ¡t triá»ƒn háº¡ táº§ng; thá»‘ng nháº¥t kinh doanh; thá»‘ng nháº¥t cung á»©ng. Qua Ä‘Ã³, chÃ­nh quyá»n cÃ³ thá»ƒ chi phá»‘i quan há»‡ giÃ¡ cáº£, cung cáº§u khiáº¿n thá»‹ trÆ°á»ng nÃ y phÃ¡t triá»ƒn lÃ nh máº¡nh, háº¡n cháº¿ Ä‘áº§u cÆ¡â€¦<br />\r\n<br />\r\nThá»‹ trÆ°á»ng báº¥t Ä‘á»™ng sáº£n (BÄS) Ä‘Ã³ng vai trÃ² quan trá»ng trong viá»‡c thá»±c hiá»‡n quy hoáº¡ch Ä‘Ã´ thá»‹. Tháº¿ nhÆ°ng hiá»‡n táº¡i HÃ  Ná»™i cÅ©ng nhÆ° nhiá»u Ä‘Ã´ thá»‹ khÃ¡c, cÃ¡c dá»± Ã¡n khu Ä‘Ã´ thá»‹ má»›i phÃ¢n tÃ¡n kháº¯p nÆ¡i, tÃ¹y theo Ä‘á» xuáº¥t cá»§a nhÃ  kinh doanh BÄS vÃ  Ä‘á»u Ä‘Æ°á»£c chÃ­nh quyá»n Ä‘Ã´ thá»‹ cháº¥p nháº­n. TÃ¬nh tráº¡ng Ä‘Ã³ khiáº¿n cho viá»‡c káº¿t ná»‘i cÃ¡c khu Ä‘Ã´ thá»‹ má»›i vá»›i há»‡ thá»‘ng háº¡ táº§ng cá»§a Ä‘Ã´ thá»‹ ráº¥t khÃ³ khÄƒn vÃ  tá»‘n k&eacute;m. Má»™t sá»‘ nÆ¡i pháº£i tá»± khoan giáº¿ng Ä‘á»ƒ cáº¥p nÆ°á»›c, pháº£i tá»± tÃ¬m nÆ¡i thoÃ¡t nÆ°á»›c táº¡m thá»i, thiáº¿u trÆ°á»ng há»c, chá»£â€¦ HÆ¡n ná»¯a, cÃ´ng trÆ°á»ng xÃ¢y dá»±ng má»Ÿ ra kháº¯p nÆ¡i dang dá»Ÿ tá»« nÄƒm nÃ y qua nÄƒm khÃ¡c khiáº¿n cuá»™c sá»‘ng cá»§a ngÆ°á»i dÃ¢n khÃ´ng Ä‘Æ°á»£c thoáº£i mÃ¡i. XÃ¢y dá»±ng tuy nhiá»u nhÆ°ng Ã­t nÆ¡i táº¡o Ä‘Æ°á»£c khu vá»±c Ä‘Ã´ thá»‹ hoÃ n chá»‰nh vÃ  hiá»‡n Ä‘áº¡i.<br />\r\n<br />\r\nViá»‡c dá»± trá»¯ Ä‘áº¥t cho ph&eacute;p táº­p trung cÃ¡c dá»± Ã¡n BÄS vÃ o má»™t khu vá»±c phÃ¡t triá»ƒn Ä‘Ã´ thá»‹ rá»™ng lá»›n, cÃ³ káº¿ hoáº¡ch tá»«ng giai Ä‘oáº¡n phÃ¡t triá»ƒn, xÃ¢y Ä‘Ã¢u Ä‘Æ°á»£c Ä‘áº¥y, xong khu vá»±c nÃ y rá»“i chuyá»ƒn sang khu vá»±c khÃ¡c. CÃ¡c dá»± Ã¡n BÄS cÃ³ sáºµn Ä‘áº¥t sáº¡ch nÃªn cÃ³ thá»ƒ khá»Ÿi cÃ´ng vÃ  káº¿t thÃºc Ä‘Ãºng háº¡n mÃ  khÃ´ng bá»‹ cáº£n trá»Ÿ vÃ¬ cÃ´ng tÃ¡c bá»“i thÆ°á»ng, giáº£i phÃ³ng máº·t báº±ng cháº­m trá»… vÃ  khiáº¿u kiá»‡n k&eacute;o dÃ i.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\n<strong>Thá»±c hiá»‡n kinh doanh Ä‘Ã´ thá»‹</strong><br />\r\n<br />\r\nViá»‡c dá»± trá»¯ Ä‘áº¥t táº¡o Ä‘iá»u kiá»‡n cho chÃ­nh quyá»n Ä‘Ã´ thá»‹ Ä‘iá»u hÃ nh Ä‘Æ°á»£c thá»‹ trÆ°á»ng Ä‘áº¥t Ä‘Ã´ thá»‹ chá»© khÃ´ng chá»‰ cháº¡y theo phá»¥c vá»¥ thá»‹ trÆ°á»ng nhÆ° hiá»‡n nay. NgÃ¢n sÃ¡ch Ä‘Ã´ thá»‹ sáº½ thu Ä‘Æ°á»£c pháº§n lá»›n lá»£i Ã­ch mÃ  tÃ i nguyÃªn Ä‘áº¥t Ä‘em láº¡i chá»© khÃ´ng Ä‘á»ƒ giá»›i kinh doanh BÄS kiáº¿m Ä‘Æ°á»£c siÃªu lá»£i nhuáº­n tá»« kinh doanh Ä‘áº¥t vÃ  má»™t sá»‘ quan chá»©c sa vÃ o tham nhÅ©ng Ä‘áº¥t Ä‘ai khiáº¿n cÃ¡c há»™ bá»‹ thu há»“i Ä‘áº¥t vÃ  ngÆ°á»i dÃ¢n báº¥t bÃ¬nh. Vá»›i lá»£i nhuáº­n thu Ä‘Æ°á»£c tá»« dá»± trá»¯ Ä‘áº¥t, chÃ­nh quyá»n Ä‘Ã´ thá»‹ cÃ³ thá»ƒ giÃºp Ä‘á»¡ cÃ¡c há»™ nghÃ¨o cáº£i thiá»‡n Ä‘iá»u kiá»‡n á»Ÿ vÃ  tiáº¿p cáº­n cÃ¡c dá»‹ch vá»¥ háº¡ táº§ng.<br />\r\n<br />\r\nDá»± trá»¯ Ä‘áº¥t lÃ  biá»‡n phÃ¡p quan trá»ng Ä‘á»ƒ chÃ­nh quyá»n Ä‘Ã´ thá»‹ thá»±c hiá»‡n \"kinh doanh Ä‘Ã´ thá»‹â€. ÄÃ¢y lÃ  má»™t khÃ¡i niá»‡m má»›i Ä‘ang Ä‘Æ°á»£c nhiá»u Ä‘Ã´ thá»‹ trÃªn tháº¿ giá»›i quan tÃ¢m. Thá»±c cháº¥t cá»§a kinh doanh Ä‘Ã´ thá»‹ lÃ  khai thÃ¡c cÃ¡c tÃ i sáº£n tá»± nhiÃªn nhÆ° Ä‘áº¥t Ä‘ai, khÃ´ng gian Ä‘Ã´ thá»‹ vÃ  tÃ i sáº£n nhÃ¢n táº¡o nhÆ° káº¿t cáº¥u háº¡ táº§ng cá»§a Ä‘Ã´ thá»‹ nháº±m táº¡o ra nhiá»u giÃ¡ trá»‹ gia tÄƒng Ä‘á»ƒ cÃ³ vá»‘n phÃ¡t triá»ƒn Ä‘Ã´ thá»‹ (thÃ´ng qua cÆ¡ cháº¿ thá»‹ trÆ°á»ng). Äáº¥t Ä‘ai lÃ  yáº¿u tá»‘ sáº£n xuáº¥t cÆ¡ báº£n, do Ä‘Ã³ Ä‘áº¥t lÃ  khÃ¢u then chá»‘t trong kinh doanh Ä‘Ã´ thá»‹.<br />\r\n<br />\r\ná»ž Viá»‡t Nam, cÆ¡ sá»Ÿ phÃ¡p lÃ½ cho dá»± trá»¯ Ä‘áº¥t Ä‘Ã£ cÃ³ trong Luáº­t Äáº¥t Ä‘ai nÄƒm 2003 nhÆ°ng Ä‘Ã£ qua báº£y nÄƒm mÃ  váº«n chÆ°a hÃ¬nh thÃ nh Ä‘Æ°á»£c khuÃ´n khá»• thá»ƒ cháº¿ cho chá»§ trÆ°Æ¡ng quan trá»ng nÃ y. NÄƒm khÃ¢u quan trá»ng cá»§a dá»± trá»¯ Ä‘áº¥t, tá»©c \"nÄƒm thá»‘ng nháº¥tâ€ Ä‘Ã£ nÃªu, cáº§n Ä‘Æ°á»£c quy Ä‘á»‹nh ráº¥t cá»¥ thá»ƒ thÃ¬ má»›i váº­n hÃ nh Ä‘Æ°á»£c. VÃ¬ váº­y, Ä‘Ã£ Ä‘áº¿n lÃºc nÆ°á»›c ta cáº§n xÃ¢y dá»±ng thá»ƒ cháº¿ hoÃ n chá»‰nh cho viá»‡c dá»± trá»¯ Ä‘áº¥t Ä‘Ã´ thá»‹ vÃ  nhanh chÃ³ng má»Ÿ rá»™ng viá»‡c Ã¡p dá»¥ng nÃ³ vÃ o phÃ¡t triá»ƒn Ä‘Ã´ thá»‹, nháº¥t lÃ  Ä‘á»ƒ táº¡o Ä‘iá»u kiá»‡n thuáº­n lá»£i cho thá»±c hiá»‡n quy hoáº¡ch Ä‘Ã´ thá»‹.<br />\r\n<strong><br />\r\n	Nhiá»u nÆ°á»›c Ä‘Ã£ thá»±c hiá»‡n dá»± trá»¯ Ä‘áº¥t</strong><br />\r\n<br />\r\nTheo tÃ­nh toÃ¡n cá»§a Trung Quá»‘c, giÃ¡ trá»‹ tÃ i sáº£n Ä‘áº¥t Ä‘Ã´ thá»‹ cá»§a nÆ°á»›c nÃ y chiáº¿m 3/4 tá»•ng giÃ¡ trá»‹ tÃ i sáº£n Ä‘áº¥t Ä‘ai cáº£ nÆ°á»›c. VÃ¬ váº­y, cáº§n thÃ´ng qua kinh doanh Ä‘Ã´ thá»‹ mÃ  Ä‘Æ°a giÃ¡ trá»‹ tiá»m tÃ ng Ä‘Ã³ thÃ nh giÃ¡ trá»‹ thá»±c Ä‘á»ƒ xÃ¢y dá»±ng Ä‘Ã´ thá»‹. Nhiá»u Ä‘Ã´ thá»‹ nhÆ° Tháº©m Quyáº¿n, ThÆ°á»£ng Háº£iâ€¦ Ä‘Ã£ huy Ä‘á»™ng cÃ³ hiá»‡u quáº£ nguá»“n vá»‘n tá»« Ä‘áº¥t Ä‘á»ƒ phÃ¡t triá»ƒn TP cá»§a há» ráº¥t nhanh chÃ³ng khiáº¿n tháº¿ giá»›i ngÆ°á»¡ng má»™.<br />\r\n<br />\r\nNÄƒm 1996, ThÆ°á»£ng Háº£i lÃ  Ä‘Ã´ thá»‹ Ä‘áº§u tiÃªn á»Ÿ Trung Quá»‘c Ã¡p dá»¥ng viá»‡c dá»± trá»¯ Ä‘áº¥t. Dáº§n dáº§n cÃ¡ch lÃ m nÃ y lan rá»™ng sang nhiá»u TP khÃ¡c. Äáº¿n nÄƒm 2001, Quá»‘c vá»¥ viá»‡n nÆ°á»›c nÃ y má»›i dá»±a trÃªn kinh nghiá»‡m cá»§a cÃ¡c nÆ¡i cho ph&eacute;p nÆ¡i nÃ o cÃ³ Ä‘iá»u kiá»‡n thÃ¬ Ä‘Æ°á»£c Ã¡p dá»¥ng viá»‡c dá»± trá»¯ Ä‘áº¥t.<br />\r\n<br />\r\nTrÃªn tháº¿ giá»›i, nhiá»u nÆ°á»›c cÅ©ng Ä‘Ã£ thá»±c hiá»‡n dá»± trá»¯ Ä‘áº¥t. á»ž chÃ¢u Ã‚u cÃ³ Anh, PhÃ¡p, Ão, TÃ¢y Ban Nha, Thá»¥y SÄ©, Äan Máº¡ch, Na Uy, Bá»‰, Thá»¥y Äiá»ƒnâ€¦ á»ž chÃ¢u Ã cÃ³ Trung Quá»‘c, HÃ n Quá»‘câ€¦ Thá»±c tiá»…n cÃ¡c nÆ°á»›c trÃªn Ä‘Ã£ chá»©ng tá» viá»‡c dá»± trá»¯ Ä‘áº¥t Ä‘em láº¡i nhiá»u lá»£i Ã­ch cho phÃ¡t triá»ƒn Ä‘Ã´ thá»‹. (TS Pháº¡m SÄ© LiÃªm, PhÃ³ Chá»§ tá»‹ch Tá»•ng há»™i XÃ¢y dá»±ng Viá»‡t Nam)<br />\r\n','dutru.jpg',NULL,'0000-00-00 00:00:00',1,0,1),
 (12,'An Giang Æ°u Ä‘Ã£i phaÌt triÃªÌ‰n nhÃ  á»Ÿ c','Theo Quyáº¿t Ä‘á»‹nh 31/2010/QÄ-UBND cá»§a tá»‰nh An Giang, nhÃ  Ä‘áº§u tÆ° tham gia Ä‘áº§u tÆ° xÃ¢y dá»±ng dá»± Ã¡n nhÃ  á»Ÿ cÃ´ng nhÃ¢n, nhÃ  á»Ÿ thu nháº­p tháº¥p trÃªn Ä‘á»‹a bÃ n tá»‰nh sáº½ Ä‘Æ','Äá»“ng thá»i, nhÃ  Ä‘áº§u tÆ° Ä‘Æ°á»£c Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i thuáº¿ giÃ¡ trá»‹ gia tÄƒng, miá»…n thuáº¿ thu nháº­p doanh nghiá»‡p trong 4 nÄƒm vÃ  giáº£m 50% sá»‘ thuáº¿ thu nháº­p doanh nghiá»‡p trong 5 - 9 nÄƒm tiáº¿p theo, cá»™ng vá»›i Ä‘Æ°á»£c Ã¡p dá»¥ng thuáº¿ suáº¥t thuáº¿ thu nháº­p doanh nghiá»‡p 10% trong suá»‘t thá»i gian hoáº¡t Ä‘á»™ng. CÃ¡c doanh nghiá»‡p nÃ y cÃ²n Ä‘Æ°á»£c vay vá»‘n tÃ­n dá»¥ng Æ°u Ä‘Ã£i hoáº·c há»— trá»£ lÃ£i suáº¥t; Ä‘Æ°á»£c há»— trá»£ Ä‘áº§u tÆ° háº¡ táº§ng ká»¹ thuáº­t ngoÃ i hÃ ng rÃ o dá»± Ã¡n vÃ  cÃ´ng trÃ¬nh háº¡ táº§ng xÃ£ há»™i phÃ¹ há»£p quy hoáº¡ch chi tiáº¿t.<br />\r\n<br />\r\nNgoÃ i ra, nhÃ  Ä‘áº§u tÆ° cÃ²n Ä‘Æ°á»£c Æ°u Ä‘Ã£i vá» quy hoáº¡ch sá»­ dá»¥ng Ä‘áº¥t vÃ  má»™t sá»‘ thá»§ tá»¥c vá» xÃ¢y dá»±ng, Ä‘Ã³ lÃ  Ä‘Æ°á»£c Ä‘iá»u chá»‰nh tÄƒng máº­t Ä‘á»™ xÃ¢y dá»±ng vÃ  há»‡ sá»‘ sá»­ dá»¥ng Ä‘áº¥t lÃªn 1,5 láº§n so vá»›i quy chuáº©n quy hoáº¡ch xÃ¢y dá»±ng hiá»‡n hÃ nh; khÃ´ng bá»‹ khá»‘ng cháº¿ sá»‘ táº§ng (nhÆ°ng pháº£i phÃ¹ há»£p vá»›i quy hoáº¡ch xÃ¢y dá»±ng Ä‘Ã£ Ä‘Æ°á»£c duyá»‡t) vÃ  Ä‘Æ°á»£c cung cáº¥p miá»…n phÃ­ cÃ¡c thiáº¿t káº¿ máº«u, thiáº¿t káº¿ Ä‘iá»ƒn hÃ¬nh vá» nhÃ  á»Ÿ cÃ´ng nhÃ¢n, nhÃ  á»Ÿ cho ngÆ°á»i thu nháº­p tháº¥p.<br />\r\n<br />\r\nTá»‰nh quy Ä‘á»‹nh, cÃ¡c nhÃ  Ä‘áº§u tÆ° cÃ³ nhu cáº§u tham gia Ä‘áº§u tÆ° xÃ¢y dá»±ng dá»± Ã¡n nhÃ  á»Ÿ cÃ´ng nhÃ¢n, nhÃ  á»Ÿ thu nháº­p tháº¥p pháº£i Ä‘Äƒng kÃ½ vá»›i UBND nhÃ¢n tá»‰nh Ä‘á»ƒ Ä‘Æ°á»£c hÆ°á»Ÿng cÃ¡c chÃ­nh sÃ¡ch Æ°u Ä‘Ã£i.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\nÄáº·c biá»‡t, tá»‰nh An Giang cÅ©ng quy Ä‘á»‹nh rÃµ, cÃ¡c nhÃ  Ä‘áº§u tÆ° khÃ´ng Ä‘Æ°á»£c tÃ­nh cÃ¡c khoáº£n Æ°u Ä‘Ã£i cá»§a NhÃ  nÆ°á»›c vÃ o giÃ¡ bÃ¡n, giÃ¡ cho thuÃª, thuÃª mua Ä‘á»‘i vá»›i nhÃ  á»Ÿ thu nháº­p tháº¥p vÃ  giÃ¡ cho thuÃª Ä‘á»‘i vá»›i nhÃ  á»Ÿ cÃ´ng nhÃ¢n.<br />\r\n<br />\r\nHiá»‡n cáº£ nÆ°á»›c cÃ³ hÆ¡n 1 triá»‡u cÃ´ng nhÃ¢n lÃ m viá»‡c táº¡i 154 khu cÃ´ng nghiá»‡p, khu cháº¿ xuáº¥t. Trong Ä‘Ã³ cÃ³ má»›i chá»‰ 7-10% sá»‘ lao Ä‘á»™ng Ä‘Æ°á»£c thuÃª nhÃ  trong cÃ¡c khu xÃ¢y dá»±ng thuá»™c nguá»“n vá»‘n ngÃ¢n sÃ¡ch NhÃ  nÆ°á»›c, sá»‘ cÃ²n láº¡i hÆ¡n 70%, pháº£i thuÃª á»Ÿ ngoÃ i vá»›i cháº¥t lÆ°á»£ng nhÃ  tháº¥p.','angiang.jpg','Theo Website ChÃ­nh Phá»§','0000-00-00 00:00:00',1,0,0),
 (13,'Báº¥t Ä‘á»™ng sáº£n vÃ¹ng ven liÃªn tá»¥c tÄƒ','KhÃ´ng chá»‰ á»Ÿ HÃ  Ná»™i, TPHCM, táº¡i cÃ¡c thÃ nh phá»‘ tráº» nhÆ° Háº£i PhÃ²ng, ÄÃ  Náºµng, Nha Trang... giÃ¡ nhÃ  Ä‘áº¥t cÅ©ng ráº¥t Ä‘áº¯t Ä‘á» vÃ  liÃªn tá»¥c tÄƒng giÃ¡.','TrÆ°á»›c tÃ¬nh hÃ¬nh Ä‘Ã³, nhiá»u ngÆ°á»i Ä‘Ã£ chuyá»ƒn hÆ°á»›ng mua nhÃ , Ä‘áº¥t á»Ÿ xa khu vá»±c trung tÃ¢m thÃ nh phá»‘ hoáº·c cÃ¡c vÃ¹ng ven. Nhiá»u Ä‘áº¡i gia cÅ©ng tÃ¬m vá» cÃ¡c khu vá»±c nÃ y Ä‘á»ƒ mua Ä‘áº¥t rá»™ng lÃ m nhÃ  nghá»‰ cuá»‘i tuáº§n, lÃ m biá»‡t thá»± Ä‘Ã£ Ä‘áº©y giÃ¡ Ä‘áº¥t á»Ÿ vÃ¹ng ven tÄƒng lÃªn chÃ³ng máº·t.<br />\r\n<br />\r\ná»ž HÃ  Ná»™i, Ä‘áº¥t á»Ÿ cÃ¡c khu vá»±c gáº§n trung tÃ¢m nhÆ° Long BiÃªn, HÃ  ÄÃ´ng Ä‘Ã£ tÄƒng giÃ¡ gáº¥p 4 - 8 láº§n trong vÃ i nÄƒm gáº§n Ä‘Ã¢y. GiÃ¡ Ä‘áº¥t á»Ÿ gáº§n cÃ¡c trá»¥c Ä‘Æ°á»ng lá»›n khu vá»±c nÃ y khoáº£ng tá»« 35 - 40 triá»‡u Ä‘á»“ng/m2 thay cho giÃ¡ 5 - 6 triá»‡u Ä‘á»“ng/m2 trÆ°á»›c Ä‘Ã¢y.<br />\r\n<br />\r\nTáº¡i thÃ nh phá»‘ ÄÃ  Náºµng, cÃ¡ch Ä‘Ã¢y 5 nÄƒm giÃ¡ Ä‘áº¥t nhá»¯ng khu vá»±c trong ngÃµ, cÃ¡ch Ä‘Æ°á»ng khoáº£ng 100m - 200m á»Ÿ xÃ£ HÃ²a Tiáº¿n - HÃ²a Vang cÃ³ giÃ¡ giao dá»‹ch chá»‰ trÃªn dÆ°á»›i 1 triá»‡u Ä‘á»“ng/m2, Ä‘áº¿n thá»i Ä‘iá»ƒm nÃ y Ä‘ang Ä‘Æ°á»£c rao bÃ¡n vá»›i giÃ¡ 5 - 7 triá»‡u Ä‘á»“ng/m2. á»ž khu vá»±c quáº­n Cáº©m Lá»‡, giÃ¡ Ä‘áº¥t trÆ°á»›c Ä‘Ã¢y khoáº£ng 2 - 2,5 triá»‡u Ä‘á»“ng/m2, nay tÄƒng lÃªn tá»« 4 - 5 triá»‡u Ä‘á»“ng/m2; nhá»¯ng nÆ¡i thuá»™c ngÃ£ 3, hay nhá»¯ng khu vá»±c cÃ³ kháº£ nÄƒng kinh doanh thÃ¬ giÃ¡ Ä‘áº¥t cÃ²n tÄƒng cao ná»¯a.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<strong><br />\r\n	Nhiá»u dá»± Ã¡n má»Ÿ rá»™ng</strong><br />\r\n<br />\r\nKhi thÃ nh phá»‘ HÃ  Ná»™i cÃ´ng bá»‘ quy hoáº¡ch cÃ¡c Ä‘Ã´ thá»‹ vá»‡ tinh, cÃ¡c Ä‘á»‹nh hÆ°á»›ng giao thÃ´ng lá»›n má»Ÿ rá»™ng Ä‘Ã£ tÃ¡c Ä‘á»™ng trá»±c tiáº¿p Ä‘áº¿n giÃ¡ cáº£ vÃ  nhu cáº§u Ä‘áº§u tÆ° táº¡i cÃ¡c khu vá»±c nhÆ° SÃ³c SÆ¡n, MÃª Linh, Quá»‘c Oai, XuÃ¢n Mai, Äan PhÆ°á»£ng... Tháº­m chÃ­ ngay cáº£ khi quy hoáº¡ch Ä‘ang cÃ²n cÃ³ sá»± tranh cÃ£i thÃ¬ cÃ¡c khu vá»±c nÃ y Ä‘Ã£ cÃ³ chá»§ Ä‘áº§u tÆ° nhanh chÃ¢n láº­p dá»± Ã¡n, khá»Ÿi Ä‘á»™ng lÃ m cho phÃ¢n khÃºc thá»‹ trÆ°á»ng nÃ y cÃ ng khá»Ÿi sáº¯c hÆ¡n.<br />\r\n<br />\r\nSá»©c nÃ³ng táº¡i thá»‹ trÆ°á»ng Ä‘áº¥t ven Ä‘Ã´ TPHCM khÃ´ng cao nhÆ° á»Ÿ HÃ  Ná»™i hay cÃ¡c tá»‰nh thÃ nh Ä‘ang phÃ¡t triá»ƒn. NguyÃªn nhÃ¢n khÃ´ng pháº£i phÃ¢n khÃºc thá»‹ trÆ°á»ng nÃ y khÃ´ng phÃ¡t triá»ƒn mÃ  do nÃ³ Ä‘Ã£ Ä‘i trÆ°á»›c HÃ  Ná»™i tá»« nhiá»u nÄƒm nay vÃ  Ä‘Ã£ qua giai Ä‘oáº¡n \"nÃ³ng sá»‘t\".<br />\r\n<br />\r\nMáº·t khÃ¡c, TPHCM lÃ  Ä‘á»‹a bÃ n lá»›n, phÃ¡t triá»ƒn Ä‘á»“ng Ä‘á»u trÃªn diá»‡n rá»™ng, khÃ´ng cá»¥c bá»™ táº¡i khu vá»±c nÃ o, nháº¥t lÃ  cÆ¡ sá»Ÿ háº¡ táº§ng Ä‘Æ°á»£c liÃªn thÃ´ng Ä‘i cÃ¡c tá»‰nh lÃ¢n cáº­n phÃ¢n tá»a Ä‘i kháº¯p má»i hÆ°á»›ng. Do Ä‘Ã³, phÃ¢n khÃºc cá»§a thá»‹ trÆ°á»ng báº¥t Ä‘á»™ng ven Ä‘Ã´ lÃ  ráº¥t lá»›n, giÃ¡ cáº£ cÅ©ng Ä‘Æ°á»£c dÃ n Ä‘á»u ra cÃ¡c khu vá»±c, má»Ÿ ra nhiá»u cÆ¡ há»™i cho nhÃ  Ä‘áº§u tÆ° lá»±a chá»n. Äiá»u nÃ y cÅ©ng Ä‘á»“ng nghÄ©a vá»›i viá»‡c giÃ¡ cáº£ thá»‹ trÆ°á»ng á»Ÿ Ä‘Ã¢y cÅ©ng sáº½ má»m hÆ¡n vÃ  thÃ­ch há»£p vá»›i nhiá»u táº§ng lá»›p dÃ¢n cÆ° hÆ¡n.<br />\r\n<br />\r\nTá»« nÄƒm 2008, UBND thÃ nh phá»‘ ÄÃ  Náºµng Ä‘Ã£ triá»ƒn khai cÃ¡c dá»± Ã¡n Ä‘áº§u tÆ° xÃ¢y dá»±ng khu dÃ¢n cÆ°, khu Ä‘Ã´ thá»‹ lá»›n á»Ÿ quáº­n NgÅ© HÃ nh SÆ¡n, dá»± Ã¡n xÃ¢y dá»±ng khu phá»‘ chá»£ HÃ²a Háº£i rá»™ng hay LÃ ng Äáº¡i há»c ÄÃ  Náºµngâ€¦ NgoÃ i ra, thÃ nh phá»‘ cÅ©ng Ä‘áº§u tÆ° má»Ÿ rá»™ng cÃ¡c tuyáº¿n giao thÃ´ng nhÆ° Ä‘Æ°á»ng vÃ nh Ä‘ai phÃ­a Nam thÃ nh phá»‘ ná»‘i tá»« quá»‘c lá»™ 1A thuá»™c Ä‘á»‹a pháº­n huyá»‡n HÃ²a Vang Ä‘áº¿n Ä‘Æ°á»ng Tráº§n Äáº¡i NghÄ©a, quáº­n NgÅ© HÃ nh SÆ¡n dÃ i 5,1 km, rá»™ng 33mâ€¦<br />\r\n<br />\r\nVá»›i viá»‡c Ä‘áº§u tÆ° nÃ³i trÃªn, hÆ¡n 3.500 ha Ä‘áº¥t vÃ¹ng ven phÃ­a Nam thÃ nh phá»‘ thuá»™c khu vá»±c trÃªn Ä‘Ã£ biáº¿n thÃ nh Ä‘áº¥t á»Ÿ Ä‘Ã´ thá»‹ cÃ³ giÃ¡ trá»‹ cao...<br />\r\n<br />\r\n<strong>Äáº§u tÆ° vÃ o Ä‘áº¥t vÃ¹ng ven</strong><br />\r\n<br />\r\nXu hÆ°á»›ng Ä‘áº§u tÆ° vÃ o báº¥t Ä‘á»™ng sáº£n vÃ¹ng ven ngoáº¡i thÃ nh lÃ  xu tháº¿ táº¥t yáº¿u khÃ¡ch quan trong quÃ¡ trÃ¬nh phÃ¡t triá»ƒn Ä‘Ã´ thá»‹ hÃ³a gáº¯n liá»n vá»›i cÃ´ng nghiá»‡p hÃ³a ngÃ y cÃ ng máº¡nh cá»§a Ä‘áº¥t nÆ°á»›c.<br />\r\n<br />\r\nKhi ná»n kinh táº¿ phÃ¡t triá»ƒn, cÃ¹ng vá»›i nhu cáº§u má»Ÿ rá»™ng Ä‘Ã´ thá»‹ thÃ¬ nhu cáº§u vá» nhÃ  á»Ÿ, vÄƒn phÃ²ng lÃ m viá»‡c, khu cÃ´ng nghiá»‡p cÅ©ng tÄƒng theo. Trong khi Ä‘Ã³, nhÃ  Ä‘áº¥t á»Ÿ khu vá»±c ná»™i thÃ nh Ä‘Ã£ bá»‹ quÃ¡ táº£i vá» nhiá»u máº·t nÃªn viá»‡c chuyá»ƒn hÆ°á»›ng ra vÃ¹ng ven lÃ  má»™t giáº£i phÃ¡p cho nhiá»u ngÆ°á»i dÃ¢n Ä‘Ã´ thá»‹ cÅ©ng nhÆ° cÃ¡c chá»§ Ä‘áº§u tÆ° phÃ¡t triá»ƒn dá»± Ã¡n báº¥t Ä‘á»™ng sáº£n hiá»‡n nay.<br />\r\n<br />\r\nHÆ¡n ná»¯a, giÃ¡ Ä‘áº¥t vÃ¹ng ven Ä‘Ã´ khÃ´ng quÃ¡ cao, phÃ¹ há»£p vá»›i kháº£ nÄƒng tÃ i chÃ­nh cá»§a nhiá»u ngÆ°á»i. VÃ¬ váº­y, Ä‘áº¥t ven Ä‘Ã´ khÃ´ng chá»‰ má»Ÿ ra cÆ¡ há»™i sá»Ÿ há»¯u cho cÃ¡c \"Ä‘áº¡i gia\" mÃ  cáº£ nhá»¯ng ngÆ°á»i Ã­t tiá»n khi muá»‘n an cÆ° Ä‘á»ƒ láº¡c nghiá»‡p. Sá»± sÃ´i Ä‘á»™ng cá»§a Ä‘áº¥t ven Ä‘Ã´ cÃ²n cÃ³ sá»± gÃ³p sá»©c lá»›n cá»§a \"cuá»™c cÃ¡ch máº¡ng\" di dá»i cÃ¡c trá»¥ sá»Ÿ lÃ m viá»‡c, trÆ°á»ng há»c, cÃ¡c dá»± Ã¡n chung cÆ° ra ngoÃ i Ä‘á»ƒ giáº£m táº£i máº­t Ä‘á»™ dÃ¢n cÆ° vÃ  giao thÃ´ng táº¡i khu vá»±c trung tÃ¢m.<br />\r\n<br />\r\nHiá»‡n má»™t sá»‘ khu vá»±c vÃ¹ng ven Ä‘Æ°á»£c Ä‘áº§u tÆ° há»‡ thá»‘ng cÆ¡ sá»Ÿ háº¡ táº§ng tá»‘t hÆ¡n nhÆ° Ä‘Æ°á»ng giao thÃ´ng, há»‡ thá»‘ng cáº¥p, thoÃ¡t nÆ°á»›câ€¦, táº¡o Ä‘iá»u kiá»‡n thuáº­n lá»£i Ä‘á»ƒ giao dá»‹ch báº¥t Ä‘á»™ng sáº£n khu vá»±c vÃ¹ng ven thÃ nh cÃ´ng nhiá»u hÆ¡n.','bds.jpg','Theo DVT','0000-00-00 00:00:00',1,0,NULL),
 (14,'Cho phÃ©p tÆ° nhÃ¢n kinh doanh chung cÆ° mini','ÄÃ¢y lÃ  nÃ©t má»›i quan trá»ng trong má»™t thÃ´ng tÆ° sáº¯p Ä‘Æ°á»£c ban hÃ nh. Nghá»‹ Ä‘á»‹nh 71 chÃ­nh thá»©c cÃ³ hiá»‡u lá»±c tá»« ngÃ y 8/8. Hiá»‡n nay thÃ´ng tÆ° hÆ°á»›ng dáº«n Nghá»‹ Ä‘á»‹nh ','Theo Thá»© trÆ°á»Ÿng Nguyá»…n Tráº§n Nam, má»™t trong nhá»¯ng ná»™i dung quan trá»ng náº±m trong dá»± tháº£o thÃ´ng tÆ° hÆ°á»›ng dáº«n Ä‘Ã³ lÃ  viá»‡c cÃ´ng nháº­n quyá»n sá»Ÿ há»¯u cá»§a khÃ¡ch hÃ ng mua cÄƒn há»™ thuá»™c loáº¡i hÃ¬nh chung cÆ° do tÆ° nhÃ¢n xÃ¢y dá»±ng.<br />\r\n<br />\r\nTheo Ä‘Ã³ há»™ gia Ä‘Ã¬nh, cÃ¡ nhÃ¢n xÃ¢y dá»±ng nhÃ  á»Ÿ táº¡i Ä‘Ã´ thá»‹ tá»« 2 táº§ng trá»Ÿ lÃªn mÃ  má»—i táº§ng cÃ³ tá»« 2 cÄƒn há»™ trá»Ÿ lÃªn vÃ  má»—i cÄƒn há»™ Ä‘Æ°á»£c thiáº¿t káº¿, xÃ¢y dá»±ng theo kiá»ƒu kh&eacute;p kÃ­n thÃ¬ diá»‡n tÃ­ch sÃ n xÃ¢y dá»±ng má»—i cÄƒn há»™ tá»‘i thiá»ƒu pháº£i lÃ  30m2; Ä‘á»“ng thá»i pháº£i Ä‘Ã¡p á»©ng cÃ¡c quy Ä‘á»‹nh vá» nhÃ  chung cÆ° theo quy Ä‘á»‹nh táº¡i Ä‘iá»u 70 cá»§a Luáº­t nhÃ  á»Ÿ.<br />\r\n<br />\r\nNhÃ  á»Ÿ cÃ³ Ä‘á»§ Ä‘iá»u kiá»‡n quy Ä‘á»‹nh nhÆ° nÃªu trÃªn mÃ  há»™ gia Ä‘Ã¬nh, cÃ¡ nhÃ¢n cÃ³ yÃªu cáº§u sáº½ Ä‘Æ°á»£c cÆ¡ quan nhÃ  nÆ°á»›c cÃ³ tháº©m quyá»n cáº¥p giáº¥y chá»©ng nháº­n quyá»n sá»Ÿ há»¯u Ä‘á»‘i vá»›i tá»«ng cÄƒn há»™ trong nhÃ  á»Ÿ Ä‘Ã³.<br />\r\n<br />\r\n\r\n<hr />\r\n<a href=\"http://www.metvuong.com/advance_search.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ tÃ¬m kiáº¿m cÃ¡c cÄƒn há»™ hay nhÃ  á»Ÿ cÃ³ sáºµn táº¡i Viá»‡t Nam</span></a><br />\r\n<a href=\"http://www.metvuong.com/sell.php\"><span class=\"color_red\">Nháº¥p Ä‘Ã¢y Ä‘á»ƒ Ä‘Äƒng báº¥t Ä‘á»™ng sáº£n bÃ¡n hay cho thuÃª cá»§a báº¡n táº¡i Viá»‡t Nam</span></a>\r\n<hr />\r\n<br />\r\nÄáº·c biá»‡t, má»—i cÄƒn há»™ riÃªng láº» trong chung cÆ° mini nÃ y Ä‘Æ°á»£c cho ph&eacute;p bÃ¡n, cho thuÃª khi Ä‘Ã£ cÃ³ giáº¥y chá»©ng nháº­n quyá»n sá»Ÿ há»¯u.<br />\r\n<br />\r\nKhi bÃ¡n cÄƒn há»™ thÃ¬ há»™ gia Ä‘Ã¬nh, cÃ¡ nhÃ¢n pháº£i lÃ m thá»§ tá»¥c chuyá»ƒn quyá»n sá»­ dá»¥ng Ä‘áº¥t cho ngÆ°á»i mua theo hÃ¬nh thá»©c Ä‘áº¥t sá»­ dá»¥ng chung.<br />\r\n<br />\r\nTrÃªn thá»±c táº¿, loáº¡i hÃ¬nh chung cÆ° mini Ä‘Ã£ phÃ¡t triá»ƒn khÃ¡ nhanh á»Ÿ HÃ  Ná»™i, Ä‘áº·c biá»‡t lÃ  khu vá»±c trung tÃ¢m â€“ nÆ¡i \"Ä‘áº¥t cháº­t ngÆ°á»i Ä‘Ã´ngâ€ vÃ  giÃ¡ ráº¥t Ä‘áº¯t Ä‘á», vÃ i nÄƒm trá»Ÿ láº¡i Ä‘Ã¢y.<br />\r\n<br />\r\nThÃ´ng thÆ°á»ng Ä‘Ã³ lÃ  nhá»¯ng toÃ  nhÃ  cao tá»« 5-7 táº§ng, xÃ¢y trÃªn lÃ´ Ä‘áº¥t diá»‡n tÃ­ch tá»« 150-300m2, má»—i táº§ng cÃ³ tá»« 2-3 cÄƒn há»™ xÃ¢y kh&eacute;p kÃ­n.<br />\r\n<br />\r\nChá»§ Ä‘áº§u tÆ° lÃ  há»™ gia Ä‘Ã¬nh, cÃ¡ nhÃ¢n trÆ°á»›c khi xÃ¢y dá»±ng cÃ¡c toÃ  nhÃ  nÃ y chá»‰ cáº§n xin giáº¥y ph&eacute;p xÃ¢y dá»±ng nhÆ° má»™t gia Ä‘Ã¬nh bÃ¬nh thÆ°á»ng, khÃ´ng pháº£i láº­p dá»± Ã¡n theo Luáº­t nhÃ  á»Ÿ.<br />\r\n<br />\r\nXÃ¢y xong, há» bÃ¡n tá»«ng cÄƒn cho nhá»¯ng ngÆ°á»i cÃ³ nhu cáº§u. Má»©c giÃ¡ sÆ¡ cáº¥p theo ghi nháº­n thÆ°á»ng tá»« 6-7 triá»‡u Ä‘á»“ng/m2. Vá» sau mua Ä‘i bÃ¡n láº¡i, cÃ³ thá»ƒ lÃªn tá»›i 15-16 triá»‡u Ä‘á»“ng/m2.<br />\r\n<br />\r\nQua kháº£o sÃ¡t má»™t sá»‘ toÃ  nhÃ  loáº¡i nÃ y, Thá»© trÆ°á»Ÿng Tráº§n Nam cho ráº±ng, chá»§ Ä‘áº§u tÆ° sau khi xÃ¢y dá»±ng vÃ  bÃ¡n xong, quyá»n sá»Ÿ há»¯u vÃ  quáº£n lÃ½ thuá»™c vá» cÃ¡c há»™ dÃ¢n.<br />\r\n<br />\r\n\"Loáº¡i hÃ¬nh chung cÆ° tÆ° nhÃ¢n trÆ°á»›c Ä‘Ã¢y chÃºng ta chÆ°a tÃ­nh Ä‘áº¿n. NhÆ°ng nay thá»±c tiá»…n cuá»™c sá»‘ng xáº£y ra, Nghá»‹ Ä‘á»‹nh cÅ©ng Ä‘i theo hÆ°á»›ng thÃ¡o gá»¡, cÃ´ng nháº­n quyá»n sá»Ÿ há»¯u cho ngÆ°á»i mua nhÃ , chá»© khÃ´ng Ä‘i theo hÆ°á»›ng phá»§ quyáº¿tâ€ â€“ Ã´ng Nam nÃ³i.<br />\r\n<br />\r\nÄÆ°á»£c biáº¿t viá»‡c cáº¥p giáº¥y chá»©ng nháº­n quyá»n sá»Ÿ há»¯u nhá»¯ng cÄƒn há»™ loáº¡i nÃ y trÆ°á»›c khi Nghá»‹ Ä‘á»‹nh 71 cÃ³ hiá»‡u lá»±c thÃ¬ má»—i Ä‘á»‹a phÆ°Æ¡ng láº¡i xá»­ lÃ½ má»™t cÃ¡ch khÃ¡c nhau, thiáº¿u Ä‘á»“ng bá»™, thá»‘ng nháº¥t: cÃ³ nÆ¡i cáº¥p, cÃ³ nÆ¡i khÃ´ng Ä‘á»“ng Ã½ cáº¥p.','chophep.jpg','Theo Nguyá»…n Nga - Vietnamnet','0000-00-00 00:00:00',0,1,1);
/*!40000 ALTER TABLE `tin_tuc` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
