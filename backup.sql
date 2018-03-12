-- MySQL dump 10.13  Distrib 5.1.72, for Win64 (unknown)
--
-- Host: localhost    Database: simplecms786
-- ------------------------------------------------------
-- Server version	5.1.72-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_comments` (
  `Comm_Index` int(10) NOT NULL AUTO_INCREMENT,
  `Project_Idx` int(10) NOT NULL,
  `Comment` text NOT NULL,
  `Importance` int(1) NOT NULL DEFAULT '1',
  `Tab_Index` int(10) NOT NULL DEFAULT '1',
  `Comment_Idx` int(10) DEFAULT NULL,
  `Has_Comment` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Comm_Index`),
  KEY `FK_blog_comments_blog_index` (`Project_Idx`),
  CONSTRAINT `FK_blog_comments_blog_index` FOREIGN KEY (`Project_Idx`) REFERENCES `blog_index` (`B_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
INSERT INTO `blog_comments` VALUES (2,2,'This is a test',1,1,NULL,1),(3,2,'This is a comment on a comment',1,2,2,1),(4,2,'This is another comment',1,2,2,0),(5,2,'This is a comment on a comment on a comment',1,3,3,0);
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_index`
--

DROP TABLE IF EXISTS `blog_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_index` (
  `B_Index` int(10) NOT NULL AUTO_INCREMENT,
  `Project_Name` varchar(35) NOT NULL,
  `Closed` int(1) NOT NULL,
  `Comments` int(1) NOT NULL,
  PRIMARY KEY (`B_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_index`
--

LOCK TABLES `blog_index` WRITE;
/*!40000 ALTER TABLE `blog_index` DISABLE KEYS */;
INSERT INTO `blog_index` VALUES (1,'Test1',0,0),(2,'Test2',0,0),(3,'Test3',1,0),(4,'Test4',0,0);
/*!40000 ALTER TABLE `blog_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cal_request`
--

DROP TABLE IF EXISTS `cal_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cal_request` (
  `Request_Idx` int(10) NOT NULL AUTO_INCREMENT,
  `SN_Index` int(10) DEFAULT NULL,
  `Name` varchar(35) DEFAULT NULL,
  `Organization` varchar(45) DEFAULT NULL,
  `Department` varchar(35) DEFAULT NULL,
  `Phone` varchar(35) DEFAULT NULL,
  `Email` varchar(35) DEFAULT NULL,
  `Authorized` text,
  `Org_Man` varchar(15) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Other` varchar(30) DEFAULT NULL,
  `Description` text,
  `req_Date` int(10) DEFAULT NULL,
  `CL_Attached` int(1) DEFAULT NULL,
  `Data_Attached` int(1) DEFAULT NULL,
  `VOC_F` decimal(4,3) DEFAULT NULL,
  `Isc_F` decimal(5,2) DEFAULT NULL,
  `FF_F` decimal(4,1) DEFAULT NULL,
  `Pmax_F` decimal(5,2) DEFAULT NULL,
  `Eff_F` decimal(4,1) DEFAULT NULL,
  `Size_F` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`Request_Idx`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cal_request`
--

LOCK TABLES `cal_request` WRITE;
/*!40000 ALTER TABLE `cal_request` DISABLE KEYS */;
INSERT INTO `cal_request` VALUES (1,55,'Halbert Tam','Alta Devices','Manufacturing','408-585-2035','halbertt@altadevices.com ','N/A','PVM','Ga','NA','This Reference cell is a new 2cm x 2cm Gallium arsenide cell with a BK7 Window a K-Type Thermocouple and a 4pin Round Din Connector',NULL,NULL,NULL,'0.931','101.96','71.5','67.82','15.4','4.39'),(3,56,'Lawrence Kazmerski','University of Colorado','RASEI','303-524-0315','solarpvkaz@gmail.com','N/A','PVM','Si','N/A','',NULL,NULL,NULL,'0.624','138.57','74.8','64.61','15.6','4.15'),(4,57,'Dr. Ana Flavia Nogueira','Univeridade Estadual de Campinas','Chemistry Insititute','+55 19 3521 3029','anaflavia@iqm.unicamp.br','Gabriela Sonai, Robson Luis Generoso, Francisco das Chagas Marques','PVM','Si','','PVM-1051 1x1 Silicon Reference Cell, KG5 window, K-Thermocouple',NULL,NULL,NULL,'0.548','11.91','66.0','43.09','4.0','1.08'),(5,58,'May Ahmed Yasin','University of Sharjah','Electrical Engineering College','+971-6-558-5000','','May Ahmed Yasin','PVM','Si','','Si, BK7 window, K-Thermocouple, 2x2',NULL,NULL,NULL,'0.623','138.79','75.0','64.82','15.6','4.17'),(6,60,'Hyung-Jun Song','Los Alamos National Lab (LANL)','N/A','505-667-4419','hyung-jun@lanl.gov','Hyung-Jun Song','PVM','Si','','PVM-1046: Si, 2x2 cm, KG5 window, K-thermocouple, ',NULL,NULL,NULL,'0.587','51.36','72.6','21.86','5.1','4.25'),(7,64,'Ahmed M. Hawary','Multi-systems Engineering Company','Technical Solutions','+2012 2178 3234','solutions@mencegypt.com','Ahmed M. Haraway, Angie Mitchell, Stephen Mitchell','PVM','Si','','2x2 Si BK7 T-TC',NULL,NULL,NULL,'0.619','143.25','73.1','64.78','15.2','4.25'),(8,66,'Nora Zoto','OAI','Purchasing','408 232 0600 x233','Nzoto@oainet.com ','','PVM','Si','','2x2 Si BK7 K-Tc, Calibrated By NREL, Verified by PVM',NULL,NULL,NULL,'0.618','141.40','74.1','64.79','15.3','4.25'),(9,67,'Erin Chang ','Burgeon ','Trading Division ','+866(3)3280531 x207 ','erin.chang@burgeon.com.tw ','NKCU','PVM','Si','','2x2 Si BK7 KT-C , Calibrated by Newport, Verified by PVM',NULL,NULL,NULL,'0.623','141.16','75.2','66.10','15.5','4.25'),(10,71,'Justin Dinger','Sinton','N/A','303-945-2476',' justin@sintoninstruments.com','Justin Dinger','PVM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cal_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `Dept_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Department` varchar(20) NOT NULL,
  PRIMARY KEY (`Dept_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Manufacturing'),(2,'Engineering'),(3,'Shipping/Receiving'),(4,'Stock Room'),(5,'Sales'),(6,'Demo'),(7,'Front Office'),(8,'Manufacturing');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `Doc_Index` int(10) NOT NULL AUTO_INCREMENT,
  `Doc_Name` varchar(50) DEFAULT NULL,
  `Document` longblob,
  `doc_Type` varchar(50) DEFAULT NULL,
  `size` int(10) DEFAULT NULL,
  PRIMARY KEY (`Doc_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (11,'PDCal Ge PD157.txt','900	46.743\r\n905	47.281\r\n910	47.714\r\n915	48.180\r\n920	48.682\r\n925	49.157\r\n930	49.573\r\n935	50.027\r\n940	50.457\r\n945	50.868\r\n950	51.277\r\n955	51.613\r\n960	51.946\r\n965	52.298\r\n970	52.720\r\n975	53.076\r\n980	53.426\r\n985	53.805\r\n990	54.195\r\n995	54.503\r\n1000	54.933\r\n1005	55.330\r\n1010	55.661\r\n1015	55.988\r\n1020	56.259\r\n1025	56.583\r\n1030	56.856\r\n1035	57.112\r\n1040	57.346\r\n1045	57.580\r\n1050	57.851\r\n1055	58.092\r\n1060	58.382\r\n1065	58.609\r\n1070	58.837\r\n1075	59.133\r\n1080	59.335\r\n1085	59.579\r\n1090	59.835\r\n1095	60.078\r\n1100	60.274\r\n1105	60.525\r\n1110	60.745\r\n1115	61.004\r\n1120	61.263\r\n1125	61.511\r\n1130	61.769\r\n1135	62.044\r\n1140	62.307\r\n1145	62.547\r\n1150	62.815\r\n1155	63.074\r\n1160	63.347\r\n1165	63.582\r\n1170	63.766\r\n1175	64.037\r\n1180	64.164\r\n1185	64.298\r\n1190	64.506\r\n1195	64.637\r\n1200	64.820\r\n1205	64.933\r\n1210	65.053\r\n1215	65.221\r\n1220	65.348\r\n1225	65.443\r\n1230	65.611\r\n1235	65.717\r\n1240	65.818\r\n1245	65.919\r\n1250	66.085\r\n1255	66.200\r\n1260	66.318\r\n1265	66.386\r\n1270	66.498\r\n1275	66.619\r\n1280	66.758\r\n1285	66.872\r\n1290	66.974\r\n1295	67.106\r\n1300	67.194\r\n1305	67.338\r\n1310	67.465\r\n1315	67.590\r\n1320	67.697\r\n1325	67.828\r\n1330	67.980\r\n1335	68.087\r\n1340	68.213\r\n1345	68.311\r\n1350	68.470\r\n1355	68.620\r\n1360	68.747\r\n1365	68.844\r\n1370	68.967\r\n1375	69.076\r\n1380	69.285\r\n1385	69.355\r\n1390	69.541\r\n1395	69.668\r\n1400	69.868\r\n1405	69.896\r\n1410	70.021\r\n1415	70.119\r\n1420	70.309\r\n1425	70.358\r\n1430	70.480\r\n1435	70.565\r\n1440	70.627\r\n1445	70.735\r\n1450	70.834\r\n1455	70.839\r\n1460	71.012\r\n1465	71.121\r\n1470	71.267\r\n1475	71.420\r\n1480	71.482\r\n1485	71.570\r\n1490	71.676\r\n1495	71.870\r\n1500	71.958\r\n1505	72.075\r\n1510	72.246\r\n1515	72.294\r\n1520	72.489\r\n1525	72.615\r\n1530	72.795\r\n1535	72.832\r\n1540	72.848\r\n1545	72.660\r\n1550	72.433\r\n1555	71.990\r\n1560	71.306\r\n1565	70.210\r\n1570	68.834\r\n1575	67.047\r\n1580	64.814\r\n1585	62.238\r\n1590	59.481\r\n1595	56.676\r\n1600	54.044\r\n1605	51.444\r\n1610	49.134\r\n1615	47.091\r\n1620	45.144\r\n1625	43.426\r\n1630	41.862\r\n1635	40.397\r\n1640	39.115\r\n1645	37.829\r\n1650	36.580\r\n1655	35.627\r\n1660	34.476\r\n1665	33.252\r\n1670	32.116\r\n1675	30.994\r\n1680	29.963\r\n1685	28.862\r\n1690	27.954\r\n1695	27.082\r\n1700	26.244\r\n1705	25.362\r\n1710	24.675\r\n1715	23.931\r\n1720	23.044\r\n1725	22.192\r\n1730	21.350\r\n1735	20.343\r\n1740	19.413\r\n1745	18.420\r\n1750	17.494\r\n1755	16.511\r\n1760	15.483\r\n1765	14.548\r\n1770	13.610\r\n1775	12.944\r\n1780	12.163\r\n1785	11.232\r\n1790	10.430\r\n1795	9.662\r\n1800	9.030\r\n',NULL,2331),(12,'PDCal Ge PD157.pdf','%PDF-1.3\n%Çì¢\n8 0 obj\n<</Length 9 0 R/Filter /FlateDecode>>\nstream\nxœí]\rğ]ÅU‡”byc3…ÉH[¡< j@ò²ßÊ@øÉ\0†RMÓ|`òHIBøP00uh•ZJkJÅ\n-°¢J[Ú¢H‹b)vÄ6E¨#DÀsÎî½»÷eïÿ½›¿Ú¤¿ÿŞ½»÷œ=çìï»»ï¢>pÑgøÿ\n,ö.êÍ]lú+×÷x%ü» §øÀ{ïú‚ù¾ÒNö5S¼¿nyoEï\"¸E)ßŸÃ·ˆ5c}ÉµÇ†æ.æ¬ÒÚŞ™=60\Z[“’¸ìEŸs\r¡­ºüc^h©ÀĞÊ¼½¹\'5wñüy½¹çô•éÍ=µ/doî¼E\'ö]oî)sOYÓ›{Ò¢c»hİò^°lÃÚu}®áµk.^¸î\0¼vİú¾<î¸Ş‚“ú—~ìûOò™o>pÖ5Ïx×—f|oóÖsõÅ«şıú…GôÜÃ³n|ôÖ›úÁWÿ‰{ø„g¶?³ı…«¾~ûÖÍåÌÃ:ù¨O¯Ù0ûÓç­şŠ¿yı»6Ÿ÷üå=uí“·,~eë¹«Şö³_¾¿v\"ÿò]öyóìã÷í-ºrÆæK®ß¼îeÿ¹õC_»×­ØôÑ?øö§øÂ?ıéa?³éî‡/Z{Ë‹ÿ{Á#½“ôQG bP‘İJ!tŸÃ?ÔiHjÔ—PªÏŒ„õ¡øL-‰C\"%ıaÄZˆşš4Ú51ÖYÓ[Õ;§!¨Ü\r$ş†=ÇË†ıyKpğdŸ÷—¬èáUo™7ı9PÍZ\Z\"%í@õ¥7¡úK†½Ùü¨%¿Šã¬³XaÉ{³u¡lÊ¤UZUe¢PÊN^ŠA3áá?{¨ GJcU0K¶CFâGŒÄZU	áhí*Ç]\Z‰ÿ+VBİ3t†=ØJ<\ZÇVâÉxŠ¡ÄS[	á`\n~wi%N¤ÙV\"§´aõl%Šãœ¼ƒ•(úKÈh%ŞgêiPŞá3ÿ²ÿ“×,½~~ÿÔïôÿáõY·pï>ûèMË—ŞvÄ+¿ô?wô×ñøCû¾iëæÅw¾cŞêW·zÓÌÕÃm‡Î{ËŸ½õ;÷vÕÏ~ìÆÅŸµíÕ¿ö}¶<8ëvÍQ§-ıëGg-û›|ñ÷®~ïüï^ªŸZtã§6qà¯¿xÅâÅß}ÃëƒSİ¢A]#ÓRÆìq&£$ØAÁNˆÒ;ñE;™&ı³â±\ZU¶‡Ù‰”ÄTw˜u$2Ğò¬#=¯gÂ‘¨4Üå¬ÃÕnuxcÖ‘‚ü^l†KI‚	>ÃX§#!aª\'!]paxJíœm†§\\_([Öxr…lÑÀX	ª0 ø>’AªĞÑS…¬QIM½(< •Ú2ğìBY?‹ùLÇ²ÓC™‡X5,ËãP	g|Uoi¡¬RŒÕÜùXvq¡ŞºPöd,Ÿ¢aı,\ZæŞözÊ6d+=ß1…z%½,(”•ú]Vèc°™BšÙL\0Æb@U	€ÄJiÂ0`”pb€Àpa€\\rø•3¸¯7PRào4ª3‚`k_[ıÚ¨\0­•r#ŠwÖóÑAËëÑ`ÀSØê)8HÌ-<çîlx\n1pâ8ÇÿàSìÛŒ¼ß+Š‚¹ƒ‡\'Ì1Vé*>X‡Š…X§DáŒs¢²‚B™pÌ³JYk\ne•b¸†9oÄªò²¥…²èÎQ÷[jo}CeU†JkĞœa0ŸJœ=´¦ãú—Àå…ğ/X»ïÏq‹c4‹Ğ€6Ïê	¸®	å\ZFå†OÁ}PÈãu¼^®ğ05îŠñª3j´¾ş\Z¦C{º¶ 	Øå‚H’€B¸OU¸ŒOj\"®îåV³úâê‚àdYtp}Aw«. ®/øì‚Ï.§Æ„ë”Y]°Q±xAáœ/&¡V1Ó‡ò¤ğA\nÒ`ÇñÂtAÂG¼€0]ÌU¦øÂ\Z/ ¬/€_VMLğÙã„é\rw¸Æ»º€¬/^@˜.ˆÔ”h4ÅRS,o\nS[¡Q]lEõ¬ˆêbôÃ+Á)MúVÉÆ\ZUØ€¹„¼lœBVñüW®jŒ+Oèğ.®4D	ÆaNísfĞ¸„iÆ6`àw*†Ëœ‹€5¦~UÀîåF†\'â‚Ì:³àHˆàÖ€±Ma8a4oáw‡›†ª+a‰XÌÑOLÀØ>> `îAé†qãŠ;Â`\\É€\r–ë€±/eI\'0áö£,šGÏ¬%éä\0¬†ÉÃTŠã07<`˜Z¡0ŒƒÑ[è×Ø€Q‡Æ“~…å+¸×y,ÑåÆ÷1k†©ƒÃüEŞÑ@Îˆá9…jp– jÁy‚¨à+Qß^Ä(ã•#O‹—\0â¼íApWà°¨]FSÎŸà~*€•‚­ƒ³·p\0~là\"@áŠ è	\\HÔ\0AHğ÷\0¡TInŠ t$„¡cáÄÙ‚^\'€øœ ¨*Â&@hL:F*(ò=\'¡‚â TP’ €GW:@xeA¼ÍD=h Âˆk	ÂãhMT ´5¡]`(\0-ØØ~€p›‘¨\n@DÂmÆ½*±Ğ°<@hÌ’™Yœ`¬–AëÖÈñ½Ub¡Iğ®\0¡‚#ƒ€šÄRK,]8 tá9jÇ\nƒ“F‚Ê„.¼!ˆzğ.@˜´E*7Ã¨=H¦„7Fñ‹¾1\nJT\"9Å$VBP¨!E\'à0øş©	â«¨_OÉÎP]ğ¦ªÆœ(B|	£¸dVpRnœ ŒÌ{‚ ~z¡ød–š\0ñõ¢“À\01(@x2E±É€\'I¥„Û”IÒc©(.J½’áHKMQÉX¤:è³ù“,°`QPÁPDBÂMNæñØ„˜‚Ø†Ød°Š×!†zœ½CÇg¶dk\Z‘0†Ø„fMŸ\0ã[0„SŠGøj‚6á_ÀTb}¤p!6YÌĞ;²9şoÿ›JêCœr8¢â§Ôµ·ã8yŠTn£P±\0¨Ãs*F¶\'w(FÑJ@üÇÏÃ ƒl–0ô¥8,AÓ5W+ÌPÈ@T\0»€A×0¤„‘	)AQK %ƒy2`‡˜â–À¹S	0Ø’,`‡¯\'ºµ’*`$ÒìSôì\'`U)Š_«€ÁK”¢&Ğ¯àm…tes:…üAX|*.<Œ¸…BPñ\"õ0¬1¯{3¢â=ˆŞ\0[ÁyŞ<<ö‹OŒE$ÆbcAVÀDd/:±Î2öb{q<±-c+HŒÅeŒÅdŒE$Æ‚³yÍX|ÆXLÆXdÆXdÆX|cÑcQ-ŒE—LQãYŠ®Y\nÎÆàÒ‘±¸ÄX•UŒYYÍXTÆXLÆXìg,¨gÇ#f{‰½ÈÄ^tb/&±›Ø‹¯ÙKNYT¢,neÁ©º@Yä¶Pó3§Èš§ÀóNÎST‘§¸ÄSTâ)¾ÈSDâ)&ñ]óäkO1‰§ğÄS\\â)\"ñ?§¸q<E%ÂO1‰§ğq<Å%\"O±‰§è7ÆSLâ)\"ñ‘xŠK<E\'¢w•§ÀóÕ<Åã)*ñ—xŠ­y\nDš§˜š§`:%òÉOñ‰§¨ÄSDâ)¶æ)(EÅStÍSğ!#O,ñYæ)~¢3Â[xŠ¬y\n&(OáOñ‰§4¸‰Ê¸‰Í¸‰Ì¸‰Î¸‰È¸‰/sÇ7Áù¹æ&.ã&*ã&:ã&6ã&\"ã&<ã&>ã&6qÃ7ÁCÍMdÆMT™›à”]s‘q‘q¸‰d‰›ÀØ%nb2n\"w37acøIK6E5p+?á”}%^âY‘—¸Œ—ÈŒ—˜^b3^\"2^¢2^Â/˜yqb3\"3ÂG±,ã(6ã(:ã(*q(JÅfÅdEgÅdÅdÅdY–q‘q•q“q“qŸq–eUøÅ%‚y\"GÑGqG/‘5/i!#)•bX\"#b,‘]$#ª\"#L»ÎŸ”y‰)ò’,\"/q%^’çO\\â%\"ñ—x‰—?I¼F‰—ÈÄKì¸üI™—øÄKôNğ_ä%®”?Ñ>ñ[ÌŸ˜ÄKTâ%¶ÈKv&\"Š¼Äó\'e^RÎŸø]ÎŸ¸ÄKxâ%®ÈK|)‚É‚/a)â‹ù½¼Ä$^\"/á‰—¨ñ¼„e¼Äf¼D¶äOlÆKøNæOXKş$ç(¦%¢Æsë³œ‰oá%¦…—¸\"/‘øm§ÈEø.pÑ’\'‘Q-\\„µäIr.¢và\":ã\"º•´s‘š¤Ö‡5Ÿ#Ñ\rÜ#I_sêI0(2qŸq•q›qq—q™}ÙqÙ—]æ#’%>‚|¡æ#.ã#*ã#²…¸>¢3>Â3>â2>b3>b2>b3>b3>âZøˆÌøˆnÉ™Øš€3>\"2>\"ZøˆËøˆÏøÏøˆÊøˆ)óÔs3á7Q)g¢SÎÄ&šâjš‚º¯h\nO4E&š¢MñEšbMá‰¦˜”3Q57ñ,q›¸	OÜÄ¹‰OÜD\'n\"jnB4%r™¸‰/æLdâ&>q]ä&&qUs~Çœ	bÍM\\â&²â&éZ›ØDHDMH®U„ÄÔ„Ä²DHLñƒNÆBlb!º˜1ÅìˆM,DYˆJ,Dìñ‰…˜RvÄ³ÄBlb!\"±“XˆJ,D$\"ŠÔC©‡+¦Dl¢bLJÓ¾Áßß@šRñ\rËZò .ã\"ñ\ræ[øËø†Ï7¤Ÿ€oìì÷š	r\"\rîá[¸‡™ \'\"&È‰ˆb2b2â¡ï8¥<HöT“¸Ï¸‡oázîa2îaZIÁyìûŒÎ¸‡nr\\Ñ‡ªŸãiAŸÀ%øÑ$¬çsa=VDŞª6‚È‘qaKH»ÎV²ZÕŒZ¦V-j»®&v]fËÏt¡lP¸—5–©åëĞÂr5×wNÑ¢1×÷Ü¥aÆ©É„‘At)p…eM‡+„•ÇÅ¶VL›ZKeİ¨Uà\'” W‚\rÅ\ZÜ·JÖJ0jÓâH$Ø¡ÁJájz\r–´ÈºÑ,.»ˆš¥{¹fuôôa€QÚóv©Yæ§=”TÛ‘ÑâêÆ¨ZZó˜«VF›õ©¤Ìa‡ªM·ÑŠİg´¸<4j–æšå¾š¼Fu\ncrØ¥f-›v£-©¶#£Å·ë¨ZZv›«–/ŒªEõ‰ïÂìRµšvO«jåî³Z\\¢UK—3ÕrWÇ‚AŸD²3Ø¥jå´Çƒ’f»1ZZã4V~çšÅ×Ğ¨Y„QÖêv©YÎ§İhÕn3ZZ%UKkçsÕjY1/‚QŸ†¹v¨ZˆçÓm´%Ívd´¸Í j–6äš•¦b^£:Uı6F°KÍZ>í“XI-¦²£jiûF®ZâOñ@¤x º\\O<(©¶#«)ˆÑxÀR<`)ğxÇñ@N{<0»ÏhYŠl$ ú‚beb.¡.µÊÅ´lI­İ,f¾ƒViûU¦TË*ÊekµuÁºNù–Óm©¥$W7–ŠHƒJiëZ¦RÚİ*ğƒXÜé\Z?]ĞîÖf¾ë­®âlÜêz>>ü%¼İ™šoãßÊ\Zä—êÅ±’Y\\„ß^ïÂBÙÊBYµõ8?f`U¡^¿Pïı…²R¿ÕtÜÇPme>¿1ª÷G+2’„Ã7+vRfXu˜”4´_[×8˜!ßpí\ne¬­lŠŒaµÅ¥f$çò:2S‚0]ùJÜ»­4HÎ™­¬Ôw\'hÜ‹r†¥™˜\\„\rÅ>,ËÓµœ9ôí³SAÑÛG¹UĞ¾Ú1Ò×;¦“øF×Îª­ºîÚÂ¹o—}§ô1Fö¸)œd¯6…×²Ó¸(»ôµ’äm`Öá¡Av¡teã%QEwâW[ßQüzë{_…mî„\r}ë\"çXÑgöNÅ‡¹~\nË—Š7ø“øÕÿ$¾KâK–DÎ1ÕéV|©ØTâ«Å÷™ø~T|:¨¨?| \râçXtw¶M%¾³­²ëîd¯Nj@Ùë“\Z’ì&×@8¬V\ròæ8¬KéRöì–’ø¦Cñãy$~uEb5,JA8¬2\nL&ÇaAK§â; \\¦U|›•é]¿:uƒˆMuêÃKËi‘;.šâ6Ù& tWtÈ*ÎwÂ‡£|š§—I†§—q;ùéexÇèée¼yõ\rW³}6İ{ıİ›¶¿şÏ3Ÿ™±ùM[~eÆş—ùxßløÌòÃö;à„o½<Õg|æ‰ƒNÂİ°}Ëß>÷Â–wığ˜_¼éÑ+¸ùİvúşß\\rÂÛùÈ#_zöøo|jvïê.ÿÖ«WöÛGn:ön{fÓó÷]»ôÊ36Şÿñ¯,ùûİùÂËôÏı¯İ¶á=¿Ç‚o|â4vİaò¨?˜qøõGÜ~è#÷óá;ÿ°7˜ñW·ÜüØòŞ¹ıÄ¯ÿÅ¶ûO›õÖÁã/>ÿ£Ëı·WşÇ–Ù·¬|pãwİ>òk¿õÚc×üô÷…[¿ºÿ]êôŸ<sÊ‘/­Uß<şÅ9ä¹—.?¿÷!×şÖın:çşîûßÿÔÛîzçk×íÿÍO¨~ü__şé3¶/üİıÎßç•moç/_şÅŸ:ù…£/ùĞù}n¿Co\Z>}Ç9û¯Úºïcï{ßW7Ø£·~ûósî»rñ?ÿÄ\'gÿ³oİb~xÜ+Ÿ?ş{3¹íñ•ÇùÒeó|ê-ÿö¹‡Ö}bæc÷}ö¬—6ŞÿêÁ«~yöÓxÕ{ˆ²i6ÈÒ’Eglu¢0Œ;ñ€+%qU`v¢0ÚWNF+p´¼ŠùÊ1ÕéìDa9ÀµÒVÇ#ÌŞ»°j0û“C™U95ÅĞ¤‡¹±B™İ…zsB™íÀäòzjÂç+•µ67Á›á¢‚şNŠzf¢~q=qÇ¢Ò»qé·ÔëüÂH–Şwá‰\'ğÒ •º-h tğ_é-ıÒBÆ`C#\\WçVIƒËTÆbÚ	³7ÿ¿ÄÆ©R 6ÿZ±¥ «%Ú_Z2œaªÓU Ö*bJ˜í‰XÊü„r”ÚÛˆw!Ï+t»\"1îL‰áu`/%şqˆÄx¬F!#j‰Ä¾Š²Ã€«è‹ÕsÜi$¶zÄ%ª[ªWz–Rß‰w!Ÿ0=‘Ï‚Ï‰•İË‰\"10WˆÄ¸1«%K«ëä„Ì¢¯ÊªJ`tvZ¼Øƒ’¥g)Õ›´¬Å÷Fâ]ˆÄ….vC ÖœÈ.~;Åí°.OâŞBÜí=¬0}U”x¢u«ôåh4IÍâ‘ÜUk~¤µ¸ZÄĞY?dìiï_•NØy=¾/ÜëIóÆ°Æiïõ^õEØÓ^Áª/3a_áÈp‰›I«¾bk¬½¯6NÖWİş0Óg£¯ÒxÑÏr¼âpqVmmt5:\\m]+VŞÕˆ)/Æ-I…§‡†=èÒ„SPjLu¦>~² nOÉ`<-‘h¹§®—î	Y\ZWè¬1[K¥+®)‘Ÿm\"–ª–¨³ïRSHTõDÏ#r‰ê¤ÓmNéªÊh£çÙÄÉck~¤µ(¸ãÉGÇ©Ï„\'rrÚ“!âÌÉ±÷ÚBª;öe&ì+:MT§FLt´¯6NPœjô5ây-ãEë6ğNNü	ÃE;½]W[W9yİü0¹º+›9f8ı986Ø”ãv\'ßá\08i­ÎÚôS8{áŞª~º7:}ã\nı.Zåôõ_éŠkJX9}ÀÁÑIÂnsú²„uø\\Eç§ã1ÊÎ’Ê˜£jôÄùck~¤µ¨\0<~¾²&ÂÁá«l[Â9?.ç¬œ$âÌùé@ÕÊru=ÃW}™	ûŠI?‹[\Z=:?öÕ¦Ã	ö¾F<²<^$KOàühÕpy?ÚÕèpµu5‘ó×Í³‘KReŠ¸rx<9/ÇS9v25KQ·ç¦šå›÷ÕuÓ}Ñéó+^ç3}ıWºâš’UNppt’¬Û~T²ª7z¦¢Ãã9©-OG½G\n8(­ÔÄ“8|lÍ´…W&9á8ÃÇ¤NÂ9<ş*Yåg½W}3|ìËLØWtB<E«ê+¶ÆÚûjÓád}Õí3}6ú*—²zOàğt~n.ú½·FW£ÃÕÖÕD_7?ÌF.I•9(ı`t%uOáğµK¨ìõ\0WüFg§òè¦¡<w•Iq5ğx\nİ®tşäñ€~yÉV¿*Xå‰¼Ãc©Âûvõ3r–«if0ò²eñ^1.ê%û¥öª¥ıš~¬½‘JhÜ[å¬`bUcE¡^©,ş0fÛê-ñ\'ã·xĞi{½åÊ[jï²BYI¶…zëeƒÂ½¥öª#xÌTû¨•z-I»f´²rBËXÕÈìàit¸ ’õµ ¯Õ˜r­ı3œÔâÆYYŒ ?UŞ¶ÂbM<U \nÍ\r±ªj6­şuJ°­ı©:µ\Z{•Ï\ZQ§S®Bk×p}{İè™½ÿû¶Úÿendstream\nendobj\n9 0 obj\n6571\nendobj\n7 0 obj\n<</Type/Page/MediaBox [0 0 612 792]\n/Rotate 90/Parent 3 0 R\n/Resources<</ProcSet[/PDF /ImageC /Text]\n/ExtGState 19 0 R\n/XObject 20 0 R\n/Font 21 0 R\n>>\n/Contents 8 0 R\n>>\nendobj\n3 0 obj\n<< /Type /Pages /Kids [\n7 0 R\n] /Count 1\n/Rotate 90>>\nendobj\n1 0 obj\n<</Type /Catalog /Pages 3 0 R\n>>\nendobj\n6 0 obj\n<</Type/ExtGState/Name/R6/TR/Identity/BG 4 0 R/UCR 5 0 R/OPM 1/SM 0.02>>\nendobj\n10 0 obj\n<</Subtype/Image\n/ColorSpace/DeviceRGB\n/Width 54\n/Height 146\n/BitsPerComponent 8\n/Filter/FlateDecode\n/DecodeParms<</Predictor 15\n/Columns 54\n/Colors 3>>/Length 279>>stream\nxœíÜ-ƒ@@á®Ãq…µ€ãşgâG`0tH[@½dW¼\'&#?1zÂ<ÏÛ¶½\n.$â0¹·Åâ²,¹1u]—f˜¦iÇD\\×57éWº½¾ï÷ıDlÛ¶»¬ªê»ŸˆMÓddı\'‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D‰$I$’H$‘H\"‘D\"‰D×Äı!qÄcnÉmb]×¹O…Bş6?ô™•³\n\nendstream\nendobj\n14 0 obj\n<</Subtype/Image\n/ColorSpace/DeviceRGB\n/Width 111\n/Height 146\n/BitsPerComponent 8\n/Filter/DCTDecode/Length 1524>>stream\nÿØÿî\0Adobe\0d\0\0\0\0ÿÛ\0C\0\n		\n\r\r\Z\Z\Z\ZÿÛ\0CÿÀ\0\0’\0o\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0\0}\0!1AQa\"q2‘¡#B±ÁRÑğ$3br‚	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyzƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚáâãäåæçèéêñòóôõö÷øùúÿÄ\0\0\0\0\0\0\0\0	\nÿÄ\0µ\0\0w\0!1AQaq\"2B‘¡±Á	#3RğbrÑ\n$4á%ñ\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz‚ƒ„…†‡ˆ‰Š’“”•–—˜™š¢£¤¥¦§¨©ª²³´µ¶·¸¹ºÂÃÄÅÆÇÈÉÊÒÓÔÕÖ×ØÙÚâãäåæçèéêòóôõö÷øùúÿÚ\0\0\0?\0û6ÎÎçS½½Ö¶HpnëŸq”{şËßú7ıùÿ\0ì¨\0ÿ\0„r÷ş‚Íÿ\0~û*\0?á½ÿ\0 ³ßŸşÊ€øG/è,ß÷çÿ\0² şËßú7ıùÿ\0ì¨\0ÿ\0„r÷ş‚Íÿ\0~û*\0?á½ÿ\0 ³ßŸşÊ€øG/è,ß÷çÿ\0² şËßú7ıùÿ\0ì¨\0ÿ\0„r÷ş‚Íÿ\0~û*\0?á½ÿ\0 ³ßŸşÊ€øG/è,ß÷çÿ\0² šv‹%¤­%İÛ]ñ…R»Tz’2s@ü9ÿ\0![ıèÿ\0öz\0èè\0 €\n\0(\0 €\n\0(\0 €\n\0(œğçü„uo÷£ÿ\0Ùè£ €\n\0(\0 €\n\0(\0 €\n\0(\0 sÃŸòÕ¿Şÿ\0g €\n\0(\0 €\n\0(\0 €\n\0(\0 €9ÏÈGVÿ\0z?ı€::\0(\0 €\n\0(\0 €\n\0(\0 €\n\0ç<9ÿ\0![ıèÿ\0öz\0èè\0 €\n\0(\0 €\n\0(\0 €\n\0(œğçü„uo÷£ÿ\0Ùè£ €\n\0(\0 €\n\0(\0 €\n\0(\0 sÃŸòÕ¿Şÿ\0g €\n\0(\0 €\n\0(\0 €\n\0(\0 €9ÏÈGVÿ\0z?ı€::\0(\0 €\n\0(\0 €\n\0(\0 €\n\0ç<9ÿ\0![ıèÿ\0öz\0èè\0 €\n\0(\0 €\n\0(\0 €\n\0(œğçü„uo÷£ÿ\0Ùè£ €\n\0(\0 €\n\0(\0 €\n\0(\0 sÃŸòÕ¿Şÿ\0g €\n\0(\0 €\n\0(\0 €\n\0(\0 €9ÏÈGVÿ\0z?ı€::\0(\0 €\n\0(\0 €\n\0(\0 €\n\0ç<9ÿ\0![ıèÿ\0öz\0èè\0 €\n\0(\0 €\n\0(\0 €\n\0(œğçü„uo÷£ÿ\0Ùè£ €\n\0(\0 €\n\0(\0 €\n\0(\0 sÃŸòÕ¿Şÿ\0g €\n\0(\0 €\n\0(\0 €\n\0(\0 €9ÏÈGVÿ\0z?ı€::\0(\0 €\n\0(\0 €\n\0(\0 €\n\0Áğõ¼©u©LèV)]B1ş,nÎ?1@Ô\0P@\0\0P@\0\0P@\0\0\0\0\0@\0\0P@\0\0P@\0\0P@\0ÿÙ\nendstream\nendobj\n18 0 obj\n<</Subtype/Image\n/ColorSpace/DeviceRGB\n/Width 13\n/Height 110\n/BitsPerComponent 8\n/Filter/FlateDecode\n/DecodeParms<</Predictor 15\n/Columns 13\n/Colors 3>>/Length 252>>stream\nxœí—YÃ Dãûšªm”‚33\nAÊW¯`K)maoÎÌ¢œlzÈƒ\"ó™b­Xx}3Tåõúİg[!wF»ü­Ç/šh~£z—s¹C8Î@F0Î‡ìgJ#z£çsêüAÛ‹=“9êr~İYÙGåE9†ªü*ûØ şúò\0ı\05i2·É¯(4#âwûû1:~¢cyûXkø)½Íöùe—_ÖÉ/à˜Sã2“[Xï¯×;ºşõÈkxOªºâ`ëò>û›ë.¼\"ÿwIe|çï’wInåˆsåˆ{ß£:ÇîÑ!Ñ/ó”Pÿw÷ô_Å	?¼¿z<\0­óÏU\nendstream\nendobj\n19 0 obj\n<</R6\n6 0 R>>\nendobj\n20 0 obj\n<</R18\n18 0 R/R14\n14 0 R/R10\n10 0 R>>\nendobj\n21 0 obj\n<</R13\n13 0 R/R17\n17 0 R>>\nendobj\n5 0 obj\n<</Filter/FlateDecode\n/FunctionType 0\n/Domain[0\n1]\n/Range[-1\n1]\n/BitsPerSample 8\n/Size[256]/Length 12>>stream\nxœkhÙ\0\0DÀ€\nendstream\nendobj\n4 0 obj\n<</Filter/FlateDecode\n/FunctionType 0\n/Domain[0\n1]\n/Range[0\n1]\n/BitsPerSample 8\n/Size[256]/Length 12>>stream\nxœc`Ù\0\0\0\0\nendstream\nendobj\n16 0 obj\n<</Type/FontDescriptor/FontName/VPUJVO+TTD0t00/FontBBox[54 -10 564 682]/Flags 4\n/Ascent 682\n/CapHeight 682\n/Descent -10\n/ItalicAngle 0\n/StemV 84\n/MissingWidth 645\n/FontFile2 15 0 R>>\nendobj\n15 0 obj\n<</Length1 25280/Filter/FlateDecode/Length 22 0 R>>stream\nxœí}{|TÕµÿ:™<Â’†÷\0!D0¡!yb\'H¹“0Ä€HSÅ\"¯EBT|QÊ¥”òÑÔR\n\'1x¦Š\nU®z)ZE—)ò­å*æÜïÚçœa½Ş~Ÿ_Îá»×~½×^{íµ×>gò$\"jO‹H¡’;&¦\r%qU:Lšv_E‘l\'’²§=4Ç=uÖm»‘ñ)QÌ7U5÷Ü·+{€Nûg¤—Ü3kn•QÌã~V=½\"øéoëö8=¼\Z;tìA”àGºWõ}s)úpúV¤#\Z4nÖO¦UÏu%½t_Å#5ÎÇô7z/2İ³+î›n”WœãtÍO˜cò[-Ò÷O¯ùvÇÑ\"Ô?Aõ+Û)J\"²­¥d+¿T2rôúŠK!Qkıï¢>µ¾jÔ”÷ë§m¿¡ör‘ş…Ri‘ş]çjİbÅ¢M¨F²ÖÌ~À¤÷?…ì+¯ÓØ‡¸ÿùK£—èi3ş½Êçø¿Ru(ıª39[\"ès!o|Á½I»%ùŠ²Ÿã&z“Ş Å4–&ÓÛ!Û!äùiP‹1_ºŞ!òz˜¥\n`±Y¶XÈˆDÙ}‚>ƒ¼gh%zş…t€ÆÑ\nbT¡Ëî¡}4uÇ¡´—6¢¯t/æ³£Ü‹:*¤ŸE÷@îÿûë)šF«©¥µ¹õ<zÒCô˜ü\rô+I]­EeTî¥qQ3ZÓé5ÿ€¾Ú®¶«íj»Ú®¶ëÿïk	öÑçè9}™¾…J©¿=¶`Ÿ-lõÛØ‘—á\"v^òM–•Ş1şöqÅcÇİV˜—;Ú7*gdöFdeŞ:|Ø-CÓ‡¤\r4Ğ; ¿¾}z÷òôLu÷HéŞÍÕµKrç¤Ä„NñâÚ;ÚÅÆDGÙmª\"K4PJÖ’óü3µ.yÍáÉ÷8İšcü¹ÛÓ4Šw¥z:º3ÒÊ™µ4›W£NÅZB‰¿|™åšİYe¼¦ôvOÅÃ·»ÜšÚÿ<c+‚Z¿RªÇù¡+T^g´®yşÔT—&÷Æ¿1(Â¿±î æ,A~ªËÈ£Q‰ŸÑ¤ÍD&e¦–#,õk)V²¼üjLî„CÛÁæx©ÖÙàè’—¯QB9j”ÈÕÎeÂµÌÖúyÁˆ1Ñ\Z¥iRÂyMê¤I‰·ƒåË»àÇd^EÁ™‚àH4¸$Ós†DSİµîÚRÇDÓÅÚŞ	ş†v±y¼é±È ‘A\r±íÓ3ĞDMƒäÈ‘DDvŒh)º=ÄÏì0fj¾•D<ùJ:]*iÒ[êÂ‹Y±NFÌ`B³çiQîš¯B£•î†-µuMNªxAO°bŠ_S*P¡”ŞÕeZ·â’ÉÈBW@ ÚÍÓ/<wAµ»i®@èÉçI¿,?X==Àj\"<ù(‹Éó/Omqiñ ZG¯ÖÕÚ?zÌ¥Ô$Ïps²¶v¹[Û\0vÃJS9„$ƒõÚzCc3syJÒBÓ&´qLPLoe…[[T9ÓĞ½Š:KÿSkšã›TÌæOŠMQ3™å™<Ì‚™îÚ•ÓÅPëÄĞ ¯î‚™ù~ÚOwâéÉş‚jOÁ¥1pD”Ş‘Ï¦¦j]¼ü`mm³X÷Ë(¸Ä?¯	—W?yš¯L*s€}ùåf–Ya2?Æ%üòòTcŞQU‹ê½Ü6Øã®å£zk	^gê”µ\ZX\\ê/Èw‰Ñkräéd×iÄ‹KBÙR2êÔ¦v2*è)`hAµÊŒ,‡fUÍú¢ÕıÉ®ıˆz\nµµ…wam ¶¢I_Téq;=µ\rGmMAÀ-V¾„üWWº´ÂºrÍ¨–F`’Yß\nK‹µNîæé)tWWÆb”\'5Ó•Ú±ÜªSr­bsAã¡÷¼Îj§À›Éå.dóÒ«àÒœ™¼LÁÉ~¬ƒiBgE€õ1»x¥(å½fL4m4†íŞ3¤¦ò\ZZÙä£J$´EüFÚM•®Fò¥y1w.i±Jïä’EVIèñ€s•\\<ñ:®Ïµ=ñî¬4!anƒZKÆx!S‹Î4§»S_qÉfLv)‹õÂ|ek½âA–	¬d­Óã~ß£9½š-ÏßâÊ.w;;Â¼I¨SäåU+ú¾gŸÄ¶“œš”­IIœO°¥Â¤+3QRwAmÀÔ®ğa™@°úêcC§Ãsõ;Æ{x„ï\n“fZêŞ…¼–\\©F±åZÛc-î”À¯+Ïï†õÁj \"îw5O¶æä3Pî\nÏnÒòÙìe®â2Õ\Z¡!ÚËuíæ5|4|q]y5´[ó\rÀÜÃĞ­X-e~SJ™.sq_cx(——‡¤hÕ¹RºÅe—¥ÂÚå\r!Å™¡µ_æ×\n½VSFú6¯+<YQ<Æ*&HÂİqûO¦ë²<Ì¯ÏÈ‚™ïz”÷™r<Òã\Z|Òã\'ûw:‰Ü—ùeIÎä–7ôB™§NÈ•9—39áæKh­Qõ];}D‹D©*2DzZ“D\"/ÚÊ“hZ“lä9­<yª‘çy†{á.˜‘?ˆğEoü¾•ÈÑëbİw¿k÷WÎ	¿ÚM´\r z}›HN\ni»â¡çÔW)U-¡ö:*±ßCKÑsòLª’”I4Î6—NHÍÔWÉ U 5JŠ~õ\'/`	¼\0Ì6Ë‚ÀT®ÏÏÚæJNn‡©²š–D½@›mı)I]MÍê×4Õ¶ÔAÍÊ	j¶ÍGz5Ë©4D>D	êÈßCÍQi(»HÍöhšªÎ3é><ç£¹j:õ·-¤MêŠšK]Õ&`Å««(ãØ«DëÇA‡‡ãJ)ÆŞ›JÕxš¬n§z¥cØ¤Q@^LÃD|9ÕKç0Şsúå[¯·£zÎW5”ã9®\'ïÅóÓ©ZŞA^”­RRœm/%+›©«r˜â”õ¢ÿ)ÒIÚš‹ş?àq‹±cÜ<fkL‚æé*<¦]ğä§€À¾o‘\0_áPˆ†(*ÍÂü43y>½ l¢2u2ÆƒyêAö4\Z\'çÒr¥„æÛæÑ	ûQŠe^í+¨TÌç<h\'_]ş‹h¼z–2P§Y@»¡_¥Êı4ŞKAûK‹Féèï)KÿD4uí|`ëGÉ`²í3ª³dÅ}FİÌÂxÈxË‹1ÌfKi&0›ÛRO³Xî<÷Reë^´[%/§)µsğø…^$?÷Çl¡1<&eıKÕ/_\"îã6ÁseuC¾€>\ZÉ#Ï£y6õ–ÖÑ,9‡J¥(C^C>‰ó/Pô8cObe½aıdaıÀ\Zè¦ÎÅøÀ»tœõÌ\\7ù=Z(Ÿ®¡ÅÅÂ(°cÍtã5#ô<‡Ú†~	½±(ÊY÷yìbœĞ«Åú³M§€àÇÏ:fR^{ã“Lå¡L—/è-ëœEÅzd}ÃšäuaÒ_„øÁ\ZëTYF^¡ïĞG‹Z²°¨ò–±.€€zº³™¦(‹±nIÊqêi[cŒGùHØ±ÙÑGÁÇEèö7hëcı#ÌïÏ0¿OØgÓjy5äy‘Òâ !9\\!«XÔ’ót‹)‹-ßrJÎ¼5ùÌG\'Ğ³H·‚âù,oe»Æ¶EØ6ØCÎ+®%×+ä!×HyFR¶‹l›,ı’Î süb]c}š}¤³Xõ#ièy¬9–?Ûu?İ€> ›³é©(mTRèƒí¿<˜ş]¬\"ú[¥¿iO×ßT¢ô·ìÕú¶Iú6û:ı¹§ŞÚXŞĞk`9Ù¢Áƒ¹¨	4B¬Ãíˆó:I¥Á,aóaûíÃèq¶9¼vEôGèÎZú™Ü²›…}¥’~«ö%›²‚Æq¾Ú@¢,sqQo…=û­:ŒÊSt»iK£l¥»Ä³ãÉa\'Zc˜ß§E&Önç	[²zVÏA¦˜+æ%êcrFıe{Á+Æ¤ÖR¶í÷¦İyiŒŸ±ÕQnÃ~V?©–B¿Z‘9T¢\r–Ãsß°dÀû	Ë€Û|qÈÁvõÆR}Ô\ZìŸ!ş\"õ·ç£.ï·°%Ñ}@_¥‘b\rlß#1v\'d€ÌXß/ª<M%j=òê\r=Uo%§mızs¿ajî£J¥°n`]x„^Ô«Ë §*èñ\ZÄ_¥Û@£EıÉöÅˆÛ)G¬±õğ1œf;ĞkŞ×ì¥ä´ÏAZ”ñ\Za»ˆş”ÈÉMõâ‹ß·—JaÓ`\0·El—Ckä~ì?]!“·1¦MXÛiìôïåMt¾@TP®‰YÀïØ™LÍôï¯–Ïõ¯°§—QıÄõËoL¯eÂh¨ãZå¦İyÜ¤«\"mJrÍrS†7¢WØ Sæ7¢¡½/’Z{‡e‡y-@-ÑòÕÔ¬9è`T‘~ÒCªzõr lg¿½Ãz:Ñ>ô§«rë%ÇĞW^3Âï/›F¥Öø1ç9á`¿HÀĞƒ O	³±àxBˆk^W{üÔÜ‡„_¼ãÆô&ôÃØËá_³{•}+’n\0­³Ò°]ïA¾;AÏƒşÙÚ·\"©¹‡=oPı[“^4éa¶[ìGGÒÈ=ïF{à{¢é+…èå>È•Ô²7¢a>ËÕèöÜoƒs	Ÿ\r,zÅ\n[-ì¥E-ıŒğ‰B”ç„ûç³×ƒ.a?/ü¤ëÀò§mgôf`wmæ=òjÀ½ØmkD½F½Ø¼&öÍëÀ>Dßìš¤7-À.à53İŒıö9`6öĞÏ€mˆ»@O-Å®ïv+@/è-ê\0½Y½ı\0?Œ«wX/f£ßÙèwúÙp‰Š}ú:€/²Û^§·\0¯Í¼—_ëĞÏ:´_öë1¾zŒ¯ã3ÒÍ–ÜCr4å‚qŞ\"|\r‹g³«İbw4ék&m¾á¼¤cl—æ%’ŞÌ¸›ÃÆI›oŠ÷şúw¡³°&^5©È\0ŸK®À*}3°üoöû¤Ic\\~:s\nø–}I‡ƒìc¯ˆ—Oè[ØïDİ| Sô©ğó.åÅ3 «F›\n=Ò$ÙÄ×ÏföiíÛL\n_”ëG‰ZùwO-DºêÎ ¾ô3ĞƒrıÀo¦Ï˜õê.Ò@sL™Hà•ëõÀ¸0àØ«w5 ú¬&?6újEºµÁäï„ÙçßL^m w™ç½\n¨1úãçõ|ĞA‡˜cºË(§XĞ³FŸ­›@ƒfŒ12Ün/!o\nÑ÷qDƒn…]OUO`şŸ5müzÊyßàüñ\röËWó+ô³úÎûÛ±®š8è]Õ(\'ôµ¶Ø/`ƒí­°Ÿã©IaøáÊEñ\'ı~œ]šlõµ¬oâ½CÎ ğÁÕ÷Ğ.÷»N¼sªÄş0	çAòT}‰Ü„=!CßoPê‹ù®´5R“ú$üxO˜Ç9˜Š3GŠRˆ¸ñşlKEJ_JQ§‚“´~ğf¥2øIöì˜nÔ»ö1|İ×Ñ¿ß÷9øô»‰×ªq‹¥Rèù?xŸµöÅ›ŞŸàãXmXTœ	7 qÖµöú+ö`ÔWVèŸ±Î³õ\\Ÿa–˜ç·å—x¶(|”õ—û¬úÏÑÖlĞ Ç¯èo-mÀ^®š{úÚ+ÆMN¥ç\rË§9Ú„³Æ\n*²æ#4ÖùÖ~Ìö\"VŠV—Kİ4ÉƒçW	¹ïë¡‡“YEñ^±~h‰2ş×xè\"ëc5Æ—©/ÕÉFüå%è„ñNøŸr2ÅBGŸ“WÑ89G?¥Èú)>·«Œ÷‘ÔûõÕ8ãğ~\"öÛj`ĞU¼£t„¡^`Î?[p¶İ~i8o}«?#;õõòx½^Î×ó¡Ë™BŸßŞ¾ï7¦ÏáP&a¾Y§“!KÌ;pR>Eİ\0 !ƒó×ağT‰õ˜m¾W=£\'c½©J‚ùÕ|&ª:²xõNWyşÍnòÚı4:·k©^ùšÒ9hÏ’	ğÕãm³ôA1VûL\"Ì-á|:IÌÛKXk/€èœ²rİƒ¹Wa7¿óú<^ëB~‘—@6XO5_?].R¶@WöÀ&…_0ÎÔƒes¾ÑÚŞÈ>:ë;ë‰[Ãˆá3ù,èWØ–şQ8oÛš ¥”¤´’Ã^l¬P¾g•\Zq¶¯Ç9?]ù%¥â|^eO\0¬5ü:öŸ\r8£˜4v!M>O~û:ô“aôÕ÷R¿ĞÃ©ğ5ø=é Ø”R¼Ã–‚cıçQG)2ÖëlúÖÄËè»T< ~ğ5Şk§?ÎY)ö&ğ86\'	ö:f{\r¼Í	{_6Ì8wÙ¿¥ş¶¹ûBñN`ÏÛœÔß¢|^ãw\Zü^}ìÆ™gúĞÙ+âìk½›\nÌ3YèlfµÇ¼ó»\nä±>ZgD‹^±¦ÏP5¿ƒà÷%bmGPqäw<üÎâIô}µ  x\nØk0¦· ï‡1öw09”lŸJ	Q\'!£wĞoúÉ¿Uá^ÔcÛaÙ\r¶!°ò&±—÷RÍıÓ¦{M$´uµ¹WC»u\'à‘Òıö™dªÒx}·ÔÚH±9‡ª”A8w@Ú|*½M3Ùy}Ç°€Xu3ÚÛL5@CŞ$¹ùİ?+q~‡ÍqÎË¢fÀ†¸Ş&šŠdØix:‡¼\\£ìm«#ú•&²Å÷™MàëŠíŸz­@^$ĞÓ´H ŸiïH˜ù]#|¦¹‘@~îUø¸V½kñq­ü>‘@~ŸÈÃµÚôDùëğV	äÿ|\\KÆ½\"ü^×ác|$?>’ø‰)Xe¾ÿ-hµ\r¶Q`=ÆgfµY?Ä€-3±×„¡ëk¨Ÿ\0ÏÉ¢? ÍåĞÏçöç˜¾ïÓçc õ7F>û®¬wJÅÂ¶}#ìÔaÊö³\nö¥º?	åãÄYşI¹{¿SñP®xßZoìíÊ~Ø¬óÆŞ\nŒÃşQªEüuh÷ôØdµûŞ\nªÂ^Ê¾OUè%cñÃ/›9}9\rŞÄûÕF±¿Ôù°#ì××¿‘ß¢yò!èK!èıEˆç(Aš\'Í îAäçÓ<5æa2P:¬ÿ({(E{ğy±g8åeÈ_[óê†½xËˆËóŠän İ(—ó¤ñä—g‚ÿo\r{\'7£¬?Ğlb7ìÌ:ğPOSäuhï[Ì»é\'a7#>	gCÔÃş#Wêßp{l/E}®gÕVÈü¢èy¬ÓQ*=¥¶‚÷zˆ!Ş]\r ıì_Ã¹ç¼bï ¬¦ş1DáÁÛG|S}ş\r`³‡¾\'AÖ©ÊìíéúY~ç$|ª$\ZÂßMû¿4 tHCÙ×Æ·=¦ü­@¼¯ß®ÿ›ğ¥ëìÇôu9€<y/°EQy™úÊ;Ğ>·Í>j=ªş\Z¼Œƒ)	şåXœ“¿ƒ~ö„¾ô„%„¾q›ßÄÍïàSBßÁ·_rŠàù!ıá¿òwoîƒßm^òâıöfÛ*åwµì#³¿)¾Gc¯óŞ2ïC#å]ÆœKcï/Êrx0¤9˜ãJê(0^_.Òã(]zÇĞ1çšŞ,ôã}¡\'9òYèÎ_ĞŞx}Ÿ©6ÑÇFÌû³bîÛÉ©«Àİ@¼ş—‡­ùœúú:ßÔ7Å³ªàL 0ƒã°¹x¦$ı…üçÏÜèİæá¿!ô\"ğ_À™pÜèêGdyìÚ~3ÀXšù;\n0ÆÄC˜IïA)@w[ß¤ÍïÓEaßaÆXßb®õ¼YaX7ı¬½k®=Öß&rB—ğ›±®ê£ÿŠõ9™ v§\'ÄonÃ9şIÔYÏ¿ƒÑ?z´u‚t˜\Z¯ _ëË,¨~æ8’~\nØßà´”ŒBşd`$ğ Pdbà¦uõeŠØ`´eÅåR}™<èM›­¸Ò<¼jÔa^”µfı8*¼5S3•«h¿È›]|ƒ†…ÿúÇÊS§À¦q]ô´xF}€*±ç¬À¸û?…=\'¦¶ÔtüØèîH¦Cp>Œe(ÿ‰õ\rØ×ÀW¢›¨/€ŸO¥‹½m¼D}ÕıâÌÕÏ÷PGR÷Á}s¿Œ«ü&İ\r\'ÿ…åo@%0‰å`Éyæ~ıÚšCSöàYı#e°œ-Ê}³Œ„¼![æë*óËìŸ_3gõeÉ†Ç§ú°^¸ÍïÑâûÇÔ)ğû©ÏÒX¥;å²œ¬1Xƒ¶?hğ½åw‚Ëï¹;`\0Æ}’ÇÎ2@z0ËÔiÊ§\Zsi31 ò\"Ú4²ì…üã·Æp³4\\®?$né”	2(l¡\0E[ºv5°î‰5AYyíYÔÒÉğ5Èò—ùÍÄ…Ñ:Îô¹!]Ú\rúÇ›¢U¬G¬³×¤Ğ\'!sÖ«°øúmÎéµ`ûŠl¶U@¸Î›kPè€I¡g…Ğ¹Ù@9ğ\nÒoD_¤¡Ñ ¡H¿ì\0FÏpèkR5\r•ßåòÖHO††šïzÏDÎMä|°M¶a\nö¼7à+…lØMR?Í²Y¦¹•í ¾O}Cÿéª¨|*tô¢Â¬å¨Nú2¦òó¨?…øÜÈçl ücl­Œ5§³FEÚ¾m6)yøğ4ÏY8¢\'PQÌ.ÃVD\\ı”ÿ€Îc³ß\0Üe¾£Å²æz{èÿj}†Ãš“È¹¸QúšëÃÔëpŒós½BŸ-\nİ·ô_ì‰k^®Â¹.´\'è]Ué×À6™}óÕÔÍ¶RlQ”¬:h¥xÇlşË.™ï¶÷Q7ø´İ¬÷½|Ö¿G¿\'1_\0ß»«r$ì{-_€Ë¿ÍáßÇ`šà7Ò¨0jÿfÿaàí4\rSÖáÅ}ìA¿cÁcØ“yèŸ×\n\Z>ûËâ7ÛàçtåwRÇyá;øØOàŞş¿ek0–ĞVå`2ğWøûLĞ¥¿Šg\nÿ”øOÈ¥;Åo·ø÷€¡KÉÀÛFüzvöZ{8öÌ¨Y4vd”x×Æïş­ïÜ\'\rç˜º«è}èŠ\nĞ\\à	ûç´Zy›Vƒ~.èÑjş}¨í:nûğ·§\0ÇèEŒëEĞ‡Ñ:û1¹=ÇmÒÔ0ì·\0_(.zuµÿ\ngá·¾ø{Kh\ZûüêÏèÿ&šaß¢ü«Í)Èk7‘~G]è_(\nâtR\ZM‡<ŸÔuìÆÒNrK9Ûc’¥±î&)ÛŠÜbE†Z‘4+2ØŠ´\"+¢ZÅŠH¾³\"¦‹°U„Eø•¿á9\Z5O‹ğ¤?á\'\"ü‹ˆp¿ßáŸD¸O„{Eø–÷ˆğu¶ˆp—\rÎ\ZD¸U„u\"\\)ÂZ®áR.áB.á|VŠ°D„E\"Œã0m·z\Z\"¿C=…Ğ§~á»3¦}Öá#I»ıù ‚y%¹æ=Öåƒÿ@ü¡‡ÜWƒ`ÖOÜ;;Éuïì…÷wó`Bb·{f\"¨š`zu‚kzõ²Ÿvíò@Ò£y]RçGv«ÿ@ûGDèVÏmkß1Ë×¤ll—µçé³Û\\=³FnÅ/ÑSêW‡˜áYÁ×‰míœY£^“r‘ê ¦\r€¬Ùşe/\Z’|ÛFæ´W?¦£¶\rL3hçnLGú’úx³®x}ŸœåûÜ…ì²=²šô_Ò;O–ïãş²&–ÊŞÒ£²×­µkŸµS’¡.ÙûıÅXïw[mŞó(yãMÙëû¤s—¬CHàámG‡¤‹Fºí’åû°sç¬/vËŞİkeï/µÏÛPëÈ+g’²yZá¸Ïñu§¤¬SÏ«Ş§ŸïÕƒ3ÚMKî’U5MZı<7ydÛó½ûeAwÌ—½ÅzwJ9Rv#º…º7öè…¢´ÆùhJ\Z¼m©â}zı²äûXb6böôìå{l0s-]]L_iqÆgí—»oyeû§½\"îK:‡q\\ {‡T:ö¼†­²wëc\\:Ä‹&võí\'\ZîV—’’µ¢VõÖ.õ®DÇ‹JŞùTï‚¥Æ°FWb•K%ïãÀr`°d©êıÛÒÿ^*ÏX*õ]*¹nML˜8,1ş–Ä‰¡‰1é‰ö!‰JZ\"\rNİ]\Z!ıÓ›)eQœ4\\º•â¨”I?Šw\09Ã‘3œîrJ#H’ìŠŞctª+µÃóÑR·KQxş^)\Z*Óá€bàß€/€ï\0;JbÑR,­Éîë††úôë×·Ã\0oÜ@o‡¸^)=âÜ=:ĞkR::L‡JG×$\rñ-’j S¶äìåëUÓkC/µƒ³£#&¶ÃíPT›ƒ$ÙÑÇŞ­‡]IîÑA¥V”_Óa’;tîÑ9­³Ò!¡GBZ‚â’º·OêÚ>ÑÙ¹}¼šĞ>Í%\rÌİ/»Ov¯ìÙîì”lWvrvbv|v‡ì˜l{¶’MÙ%e’_LÅe¹Z\'	tb®–á-nRÜ¥ÚPo±Sr·¿A’,G®&?Ş$Q™¦>Ş$ƒÄçM¾Ûß$uáâe®!iÅeO”{½İµ ÿEÖ¢îåÚP¬ê^NÅÚĞ	šË“ë¼.+})ŞĞ¯O6  BXÈEsš${ÁŒ&)¶`FBO~“m¤ˆyòÍš¤œ›Y0Ù™\\K¤‡‹ôp£Zè’˜óà\\E2èõR(vİ¼›x`×«%k£ Ó«Ôjˆaù–”ækÑ¥@ÉİZW{‘„Ã“Û@r^YƒÌÁİwûG\'J98¨f·\0C4`00p\0* \0’ï l\r^~ü2x.x6x:x2øiğ“à_‚‚ûƒïÿÜÜ|+¸\'øz°%¸+¸=ØÜ\Z¬®ÖW——ç+ƒ%Á¢`\\ğ&q•ÿó°“!S~R*Q“¨u¦á¾xÒìÎxÍÑ)FIÜÚ£CZ¹C“~j›Ã~;Óí@ÓºH?NózúŸYY4êô¨ÓéC:õì3ì–áC“ìJXüğàÑ£§åæ¦™TÉÌ<Øç<8÷b#byyˆ]Ïº‰ktÛİv·İmwÛİv·İmwÛİv·İmwÛİv·İmwÛİv·İmwÛİvÿÀ›ß–?HàJDRWÀH÷øûÿõK¥\"TY>ç$]·B¤ùçİE,òã\\Ø)hRÉc\'İá-+Ë2gÈ~NZ%~¿÷¿ºÎÑ9ı²ë‡Ê\räz6ù©më«ÿÒ!ûïäŠÙ[ÿ½•é›iÍµë¾om÷×hş? b¬vÿ!z“¨\nendstream\nendobj\n22 0 obj\n8603\nendobj\n12 0 obj\n<</Type/FontDescriptor/FontName/NWVKVO+Helvetica/FontBBox[-174 -285 1001 953]/Flags 32\n/Ascent 953\n/CapHeight 741\n/Descent -285\n/ItalicAngle 0\n/StemV 104\n/MissingWidth 278\n/XHeight 539\n/CharSet(/space/comma/hyphen/period/zero/one/two/three/four/five/six/seven/eight/nine/A/B/C/D/E/F/G/I/J/M/N/P/Q/V/W/bracketleft/bracketright/a/c/e/f/g/h/i/l/m/n/o/r/s/t/u/v/x/y)\n/FontFile3 11 0 R>>\nendobj\n11 0 obj\n<</Subtype/Type1C/Filter/FlateDecode/Length 23 0 R>>stream\nxœVy\\Y¶®RU\"bC,—¤DTT—Ù›MPÔ¢Y0	›-»­Wdô‰Ún(îv» ãÒ®¸´Û¸¯\'ˆDD»µÕ÷N¥oxın@Û™ß/ù%·êÖ¹çœï|ß9%¢:Q\"‘È%qRú7éI¾1Ju‘Ò¨ÊVØoú\n½DBïNB1Ç5¿—ı éCÅo~ÙU9QÕ½¿êïjÕ¹Xº	¦¯:)U‹‰Şz§¥L\Zäëë7^WPªWååù!£Fâg”òŸvø¥A•§åE‘R­+Ğ(µF>U©äùJ>W¥Vòã“’3b£yïèÄ4>Z©Uêj>¹p†Z•ÍÇ«²•ZƒrŸ«Óóê>[§ÍQU:­ÁŸgà¼¡@™­\"FÊ’le}Ã/Pê5*ƒ¬y•ÏÓ+´FeoÔñ*m¶º0ÇîÜÏÕi|^Gö5d‡•¬3\rÙzU‘\'“#¢:b4æ+Œv¿Ùæu¹äÉ]v¡=›?÷Œ\n•ÖÀ•%F»ŸJ>Ge(P+J‰_rT^ÕB¡A¥Íûâİ×+óúµÒĞ~®•/ùñÿ–µ¢ @]Ún«kêOÿ*£A©ÎõOTif\ZøT1‹çS”y…j…ş?n~©Òÿ¯nE\rWªÍN×%WFä&Gêó&Dò£ªÂØ¢8µ\"½D3)høä|°_ÖÈÁ£ü‡FQT&•DEPşT?*™\n ¼¨(ª?M\r¡P©T5”\ZHM¤b)o*Š£Ò)jåK%PáT0•A%R#)r£¾¦Ü)ÕƒêJ…R”3Õ“êF¹P®””êN\r%”¤¨ÑÔê‚¨«(\\t·×)¬Ónq\'q˜xø¼ø_ıJÜ%c$»%/é\ZÑéWôŒ\'3)dÖ‡Îc¡³wçE·;º8vwsœêø­£µK·.óºTtyá$qÊwj‚ıÎÖ\0T“MB`•HĞ‚{Œu’4^kÕH°7´i$¿Òu “À™8<—\'h”8ßa­ÙÚØô¶q¸¿Í÷ü$Ciˆ´UÏ\Z9/·¤,yü••—V°aÌæ…›—mG»ÑŞµÛ7íÚºqû¦cPfuîá,Ô¢*!åa~•+ª}«\ZÜ¥?Ş#Ú¶=ƒcŒôæÿ\\º÷üÖ±ìxş£Aà™¦¸KdÒÀ”¡É\ng-	ÃX\'øÕ‰P“X˜ï¸eçæÿX¼7ïLüŞpÄâ¾ØÈ?¤™Op©İ+åÁtYğtEb&>†¯Àı‚éå½3Â+åÎÖG¨Ê\ZY%BaE,ä»B\0‰\r,V\ræœßÖ\r«­İ$˜kÓX !Û;zf¨0Ã\\³+jú–ÄwéÇz70ÓwÑ¹­Gª©:.#Kv­ÿ!V*ÜÚğÂ£¨¶ø”ò€ò`Æ¦Håºßæ`.Ä0çÑŞÅ;Kv¯AÙ(§L=»X_¢]<‰<ƒŸsPÅÌI´oşv+ı¸İ¸~V^O”ÿ×Y…ÆBƒfşTÄ8?ÃµMbØ)âğÀ¡8GX<alşaôûÊW†r¯.…b7ÜmBH€JHÁõ²©…àû\'2‹ØÚÓªá†ÙZh›‹Ğ\"`ÏİB]mÉGš<j4oÌ\"Ô\"¶úˆÓBP€	¡AèkuZRìø¼~;\"ìtØënÄ¥	\nZD¡·¯·C\ZëK/ÊX š«Õ$%¨BH‚ı€…8H²\0}¯\\,Õí“ïÖoT¯KëÈ\nbî@PH¨„yzºäôÜ#ªçcÎ\"†“\"‡á°—}a 85Üz)²1jJ^JGSwèNï[¼oÅy¶ü·æÍ•Ïk¾=|9Z¾by{²fáº=¡w‹ø… !$ ƒb(Â Ã	r|€niëÅ	×!Œ¯\'>8Ç„½äÎ°ŸĞ—DÖë¡è^ƒÖæ™éƒU[jÖ¬B+¶Êî2%óWÎAlhÖ´0ùĞÈè{¶)\rÂ”&¦CuÇÌ°Öî\Z^¼¯×9(¥/£“›<qtë)t›…>£ë°—_hÓ´ĞB/XéÌ‹ÚÉcÆ¤O*ï ß*3”µW\0¾FNèk¶õ…2!Ğl+oÓUf[8íÏI˜%UK;Tæ.½v÷“Äv2èñÖ3G÷îÚºsõÏ+ÙFF\ZX^¶xåü^ihÆ¬É!¬4¹•h¬kïËgb©Ä~,£¸ş—½1¤C0‹C‡WGÏ™viöEtı´çÔ-¶€A§iÕÓKÿ‚”HUiÜR²qÑ÷K÷³#èµŞuÉĞ\r™Ğí=½ñ‚n¬Çà’®¹v,vÇ.ic‡Nl\'æ%Ó’îÖÏl6ÂÍ^Á\r®»ûäÀ+Œ)–\'øã\\òñÄş¸—\0ù‡ÜW7¼\"û$Á\nØÌe¥>J˜^<sÑ4ä¼H\'‹˜ä/\0>`\'=X–(w€çæà\nïÌøÁ•7ÛÊìÅø³ólh‚…¤ùÄ	ÎÜŠ÷Ñ?ã®ç¯ã}FË¯4rSÉÏeÕEHé‘™93|ªrÃö\"Ù¼K6.=Ì£+p×; b¡Ç³›ïLÓ÷Û)³5z“v;:ìqúøş;·i\'–Ë>7I%šl =R|H²MÓ@:¤½?îŞ½pn•lÇœJ=Êe;ú¤%şbÿqSßdÊ`Ó|g†İíĞÍ3‹­ÇáË£@_Lc7ßÁØc\\ÌîSÓe“Ïk›P3Ñ¿#øƒøiÊà*Y+=¼±C#ƒ†¢ñÆ”)Á‘“±aw¡„Œ_ë×ß—UûH®ªí7>|îˆî9¬!,^#±WDô}O§ÒÜ¬ª*ÿÛÙ=fşwóV|‹Ø¼•‡å€Ÿ3Î \'I¾ûèŠ$Cà.øã‘¶m\r´´Ñªqö|FÛûÀC!“¸*\ZÂ»Kß	EnÂ¶‘ø,Ã§FÅ*Ş	ÌH›7t3õ7™ôZ:³ûÌ]6œij{O{%†t‚Şà6Í+{\rÛu!‚\Z7È¶IÓØÛ‚y!„,!Ş¶Í>çŒ&«\'1l…Ù„\nÏ‰­­’A–Ìœ£/Õ©æä\"62çT£ü”ß7v4…HëëÁU&œèÈ©İë31øËà6Íç4Ûµ´¡A,üp†[¸|ZŠXí·wÉá\ZÓ}scãsòe†‚šå“ØgôšÔì5!öñ1]†¼AùEscaÇ¹¥ËfÍKÔ«§ hÖïVÒßª­¾pE¶:}—áÚŒ6”ï^Cú#DsH·hŞ¨RÏø6±qÊıµïy±AnY¿¥bÏ¶½Ùãz»Áj2÷½i<ÕÖ†g\nm’4l$o\0_ :	;8ˆ€Õv°\\q\nv…‰\rãq%NÀU’V\Z< Üq–ä\rİ>Rÿm¼Ø¿îÒƒŸ\'¼™‘Ş~rñÚë•12Üf¿a¿¼v(\'Ö~)ôa^¥©(JÎ”©/)vD#V\Z‰²fOg1Î¿Gt„më	$ì~4îi{G/HØxYö!Ë~4$‘~£!Xx\r_Û^KÚ>õ\"8oÃSåp¨B?Ö{\nÓIÿylK‘ø3p¾Ãz\ZôpÃn`4A“	šÈûN³X(°fp¶NtºÍMòOúïgl¾ˆØÖ«qı“|C§yZ$F¯ŸP©Û6ûhÚõS¢ğ~o?€ğş¯qïŒìyšò=)ÓvÁàüÖšDÚbXEH‚ÿw$>ğ²Ö¼§;_3AŠÉÎÀ\Zâz)Án°cïb\n… H¥\"~ZTqÂÂ]¶Œ=_“r]Mˆ½Ş¼9ôÒ‚¥‘&)å+aÜ¥×ïĞut<çûh»àá\\cm²ßĞ¤¸Ñ£î¼´\\½ÖdhİæW’èf{’Ú AJã¼$\n{§ã2ö}Š_À$k—ÕQÓ®ßÕREÍ+²œU2÷|.\'æKjïÄÕ8ŸƒÄßÇáÄñïÛj¼>eöÃ#0˜\\Qs\\3¬ ?îÒ7B/¡3÷ğÄCöé\'2¹ÁâØy¦Ê¤ïGçd\'‡ôÄn¿ø_š«Ï¾2êˆLú³°{|zZTlæ´qã2OÜ¾sæÄ#¹ô=>ë`¹š:28)uÈğ¤Ë\r\rW/YHÏa1Šá0ÜäğÂñ°ğSL)&¸NÄÙ5¯Åµ0‚ÛŒÙ\'Q@‘Au¿æï7NŞ­jBÀ!èRúDq#çrÂ~ûËK/ŸX{4ûC÷Ûgv\\üI¾Kõ€Ğô#ewXè.ÌäÌ×£‚†H¿ÒÚ|õæ?åè¡bH%öûğ©3˜Lvç‡›Å°‡ %is3³Œ~íwÑS,?ğ1“¡X²ÂMù‡,÷lò2†CZOùAfe\rä?åH‡ôS­­òözŠ`aúz¡œ³•[¬5ÏÅ½ç°ñöùš„cäİÊĞkUgëL¯ıù‡ÃMçŞ^èñë…sQºb¸¨¨QÔLÚƒ† ˜Y9IzåüiËÇ³zÕéÕ{×WWÿiW-bŸ^M›:sr|<`ö³zê`…Gu®ğGsT³½»Ï·>¼Ròæì´C\'¦øN9ı~	QMEJeîæY‡¢ïå¿!$ğª	z6çŸ±W.m¼µëÇ³÷{‚óè‡¸î76û~\'³Ğ+WìX·½êÈ‰Dƒ¦SYa¥šœoå†êe	+Xgcµ°­\nªâ«i“ccÓßœœ\Z×:u¥¨ÿq¿áû\nendstream\nendobj\n23 0 obj\n3591\nendobj\n13 0 obj\n<</Subtype/Type1/BaseFont/NWVKVO+Helvetica/Type/Font/Name/R13/FontDescriptor 12 0 R/FirstChar 1/LastChar 255/Widths[ 333 333 333 278 500 500 167 333 556 222 584 333 333 611 500\n278 278 278 278 278 278 278 278 278 278 278 278 278 278 278 278\n278 278 355 556 556 889 667 191 333 333 389 584 278 333 278 278\n556 556 556 556 556 556 556 556 556 556 278 278 584 584 584 556\n1015 667 667 722 722 667 611 778 722 278 500 667 556 833 722 778\n667 778 722 667 611 722 667 944 667 667 611 278 278 278 469 556\n333 556 556 500 556 556 278 556 556 222 222 500 222 833 556 556\n556 556 333 500 278 556 500 722 500 500 500 334 260 334 584 278\n556 278 222 556 333 1000 556 556 333 1000 667 333 1000 278 278 278\n278 222 221 333 333 350 556 1000 333 1000 500 333 944 278 278 667\n278 333 556 556 556 556 260 556 333 737 370 556 584 278 737 333\n606 584 351 351 333 556 537 278 333 351 365 556 869 869 869 611\n667 667 667 667 667 667 1000 722 667 667 667 667 278 278 278 278\n722 722 778 778 778 778 778 584 778 722 722 722 722 666 666 611\n556 556 556 556 556 556 889 500 556 556 556 556 278 278 278 278\n556 556 556 556 556 556 556 584 611 556 556 556 556 500 555 500]\n>>\nendobj\n17 0 obj\n<</Subtype/TrueType/BaseFont/VPUJVO+TTD0t00/Type/Font/Name/R17/FontDescriptor 16 0 R/FirstChar 1/LastChar 1/Widths[ 216]\n>>\nendobj\n2 0 obj\n<</Producer(GNU Ghostscript 7.05)\n/Title(Labview Document)\n/Creator(PScript5.dll Version 5.2)\n/CreationDate(7/7/2015 15:15:5)\n/Author(QE)>>endobj\nxref\n0 24\n0000000000 65535 f \n0000006930 00000 n \n0000024397 00000 n \n0000006861 00000 n \n0000009941 00000 n \n0000009793 00000 n \n0000006978 00000 n \n0000006676 00000 n \n0000000015 00000 n \n0000006656 00000 n \n0000007066 00000 n \n0000019395 00000 n \n0000018996 00000 n \n0000023093 00000 n \n0000007544 00000 n \n0000010287 00000 n \n0000010088 00000 n \n0000024257 00000 n \n0000009215 00000 n \n0000009666 00000 n \n0000009696 00000 n \n0000009750 00000 n \n0000018975 00000 n \n0000023072 00000 n \ntrailer\n<< /Size 24 /Root 1 0 R /Info 2 0 R\n>>\nstartxref\n24551\n%%EOF\n',NULL,25110);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doma_039`
--

DROP TABLE IF EXISTS `doma_039`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doma_039` (
  `sn_index` int(10) NOT NULL,
  `QE_Cal_FN` mediumtext,
  `Ref_Cell_QE_FN` mediumtext,
  `STD_RefCell_ID` mediumtext,
  `Cal_Val` decimal(5,2) DEFAULT NULL,
  `Cal_Ver_FN` mediumtext,
  `039_Index` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`039_Index`),
  KEY `FK_doma_039_sn_main` (`sn_index`),
  CONSTRAINT `FK_doma_039_sn_main` FOREIGN KEY (`sn_index`) REFERENCES `sn_main` (`sn_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doma_039`
--

LOCK TABLES `doma_039` WRITE;
/*!40000 ALTER TABLE `doma_039` DISABLE KEYS */;
INSERT INTO `doma_039` VALUES (55,'QE150509-1002521K025CAL.txt','QE150509-102540PVM1053.txt','PVM902','106.80','150509-121540-IV-PVM905.txt',23),(56,'QE-151519-1002521K025Cal.txt','QE150509-100839PVM1062.txt','PVM905','132.20','150509-104647_IV_PVM905.txt',24),(57,'QE-151519-1002521K025Cal.txt','QE150509-103308PVM1051.txt','PVM904','47.94','150509-11434_IV_PVM904.txt',25),(58,'QE-150509-100252-K025Cal.txt','QE150509-101525PVM1055','PVM905','132.20','150509-104647_IV_PVM905.txt',26),(59,'QE150218-082324 1K025 Cal.txt','QE 150218-093540 PVM1046.txt','PVM-852','49.31','105218-12593-IV-PVM852.txt',27),(60,'QE150218-082324 1K025 Cal.txt','QE 150218-093540 PVM1046.txt','PVM-852','49.31','105218-12593-IV-PVM852.txt',28),(62,'QE15072808364_9K023.txt','QE150728-090306_PVM1068.txt','PVM790','107.40','150727-091145_IV_PVM790.txt',30),(63,'QE150414-0756581K025Cal.txt','QE150414-080356PVM1050.txt','PVM905','132.25','150414-082951_IV_PVM905.txt',31),(64,'QE150817-095606_1K025Cal.txt','QE150817-101549_PVM1071.txt','PVM851','107.40','150817-085751_IV_PVM851.txt',32),(65,'QE150821-084402_1K025Cal.txt','QE150821-085438_PVM1072.txt','PVM851','133.90','150821-074138_IV_PVM851.txt',33),(66,'QE150804-092829_1K025_Cal.txt','150804_100057-PVM1060.txt','PVM851','133.90','150804_073613_IV_PVM851.txt',34),(67,'QE 150618-100433 1K025 Cal.txt','QE 150618-104854 PVM1057.txt','851','133.96','150618-080040_IV_PVM851.txt',35),(68,'QE 150909-111908 1K025 Cal.txt','QE 150909-113250 PVM1070.txt','851','133.90','150909-085055_IV_PVM851.txt',36),(69,'QE 150918-073243 1K025 Cal.txt','QE 150918-075540 PVM1076.txt','PVM851','133.90','150918-063215_IV_PVM851 CAL.txt',37),(70,'QE 150918-073243 1K025 Cal.txt','QE 150918-074746 PVM1077.txt','851','133.90','150918-063215_IV_PVM851 CAL.txt',38),(71,'QE 150918-073243 1K025 Cal.txt','QE 150918-074746 PVM1077.txt','PNM851','133.90','150918-063215_IV_PVM851 CAL.txt',39);
/*!40000 ALTER TABLE `doma_039` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failures`
--

DROP TABLE IF EXISTS `failures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failures` (
  `Failures_Idx` int(10) NOT NULL AUTO_INCREMENT,
  `Major_System` varchar(25) DEFAULT NULL,
  `Doc_P_SA` varchar(25) DEFAULT NULL,
  `Closed` int(1) DEFAULT NULL,
  `Found_By` varchar(25) DEFAULT NULL,
  `Issued_To` varchar(50) DEFAULT NULL,
  `Prob_Desc` mediumtext,
  `Solution_Desc` text,
  `chk_MFR` int(1) DEFAULT NULL,
  `chk_Design` int(1) DEFAULT NULL,
  `chk_Supp` int(1) DEFAULT NULL,
  `chk_Doc` int(11) DEFAULT NULL,
  `chk_Part` varchar(50) DEFAULT NULL,
  `chk_Proc` int(1) DEFAULT NULL,
  `chk_Purc` int(1) DEFAULT NULL,
  `TimeLost` decimal(10,2) DEFAULT NULL,
  `Found_DT` int(10) DEFAULT NULL,
  `End_DT` int(10) DEFAULT NULL,
  PRIMARY KEY (`Failures_Idx`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failures`
--

LOCK TABLES `failures` WRITE;
/*!40000 ALTER TABLE `failures` DISABLE KEYS */;
INSERT INTO `failures` VALUES (1,'QEXL','Computer',1,'Tyler','0','Testing DB','Fix',0,1,0,0,'0',1,0,NULL,NULL,NULL),(2,'QEXL','MPAS-900',0,'Tyler','0','Checking Submit','Testing',0,1,0,0,'0',0,0,NULL,NULL,NULL),(4,'QEXL','MPAS-500',0,'Tyler','0','Data wont work','NA',0,1,0,0,'0',0,0,'4.00',1434058920,1434058920),(5,'insider','n/a',0,'tyler','n/a','testing the database over wifi','n/a',0,1,0,0,'0',0,0,'0.00',1434554880,1434554880);
/*!40000 ALTER TABLE `failures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meas_sys`
--

DROP TABLE IF EXISTS `meas_sys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meas_sys` (
  `Meas_Idx` int(10) NOT NULL AUTO_INCREMENT,
  `Meas_SN` int(10) DEFAULT NULL,
  `System_Model` varchar(25) DEFAULT NULL,
  `Cal_Date` int(10) DEFAULT NULL,
  PRIMARY KEY (`Meas_Idx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meas_sys`
--

LOCK TABLES `meas_sys` WRITE;
/*!40000 ALTER TABLE `meas_sys` DISABLE KEYS */;
INSERT INTO `meas_sys` VALUES (1,26,'QEX10',NULL);
/*!40000 ALTER TABLE `meas_sys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `near_miss`
--

DROP TABLE IF EXISTS `near_miss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `near_miss` (
  `NM_Index` int(10) NOT NULL AUTO_INCREMENT,
  `Dept_Index` int(2) DEFAULT NULL,
  `Incident_DT` int(10) DEFAULT NULL,
  `Box_1` int(1) DEFAULT NULL,
  `Box_2` int(1) DEFAULT NULL,
  `Box_3` int(1) DEFAULT NULL,
  `Box_4` int(1) DEFAULT NULL,
  `Haz_Desc` mediumtext,
  `Empl_Name` varchar(25) DEFAULT NULL,
  `Rpt_Date` int(10) DEFAULT NULL,
  `NM_Desc` text,
  `Causes` text,
  `Corr_Action` text,
  `Investigator` varchar(25) DEFAULT NULL,
  `No_Comp` text,
  PRIMARY KEY (`NM_Index`),
  KEY `FK_near_miss_department` (`Dept_Index`),
  CONSTRAINT `FK_near_miss_department` FOREIGN KEY (`Dept_Index`) REFERENCES `department` (`Dept_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `near_miss`
--

LOCK TABLES `near_miss` WRITE;
/*!40000 ALTER TABLE `near_miss` DISABLE KEYS */;
INSERT INTO `near_miss` VALUES (92,3,1433974440,1,0,1,0,'Testing DB','Tyler',1433916000,'This is a test','This is another test',NULL,NULL,NULL),(93,7,1433976180,1,0,1,0,'Orri Bothered Tyler','Tyler',1433916000,'Values','2','3','4','Values in 5'),(94,4,1433950980,1,0,1,0,'Testing the database','Tyler',1434002400,'Tyler','Tyler','Tyler','Ttyler','Tyler'),(95,8,1441057500,0,0,0,0,'A locking wheel on one of the build tables was left sticking out where people are walking/moving their feet.  I tripped on it but managed to avoid falling/any injury.  ','Eric Straily',1441000800,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `near_miss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nist_pd_std`
--

DROP TABLE IF EXISTS `nist_pd_std`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nist_pd_std` (
  `NIST_idx` int(10) NOT NULL AUTO_INCREMENT,
  `NIST_Name` varchar(35) DEFAULT NULL,
  `NIST_Description` text,
  PRIMARY KEY (`NIST_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nist_pd_std`
--

LOCK TABLES `nist_pd_std` WRITE;
/*!40000 ALTER TABLE `nist_pd_std` DISABLE KEYS */;
INSERT INTO `nist_pd_std` VALUES (1,'1755','1755 QE (0-100) NIST.txt');
/*!40000 ALTER TABLE `nist_pd_std` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observation`
--

DROP TABLE IF EXISTS `observation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observation` (
  `obs_idx` int(10) NOT NULL AUTO_INCREMENT,
  `obs_date` int(10) NOT NULL,
  `id_Name` varchar(35) NOT NULL,
  `source` int(1) NOT NULL,
  `sup_Name` varchar(35) NOT NULL,
  `Area` varchar(20) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `risk` int(1) NOT NULL,
  `Corr_Action` text NOT NULL,
  `Follow_Up` int(1) NOT NULL,
  `Follow_Date` int(10) DEFAULT NULL,
  `Follow_Action` text,
  `Resp_Person` varchar(20) NOT NULL,
  `Final_Date` int(10) NOT NULL,
  PRIMARY KEY (`obs_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observation`
--

LOCK TABLES `observation` WRITE;
/*!40000 ALTER TABLE `observation` DISABLE KEYS */;
INSERT INTO `observation` VALUES (1,1434434400,'Tyler',1,'Halden','Front','Manufacturing','Description',1,'None',2,1434434400,'N/A','N/A',1434434400),(2,1434434400,'Tyler',3,'Halden','Front','Manufacturing','Description',3,'None',1,1434434400,'N/A','N/A',1434434400),(3,1434434400,'Tyler',5,'Halden','Back','Engineering','Testing',3,'Corrective Action',2,1434434400,'N/A','N/A',1434434400),(4,1434520800,'tyler',2,'halden','front','mfr','testing WiFi db',3,'none',2,1434520800,'n/a','n/a',1434520800);
/*!40000 ALTER TABLE `observation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menulabel` varchar(50) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pd_cal`
--

DROP TABLE IF EXISTS `pd_cal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pd_cal` (
  `Cal_Index` int(10) NOT NULL AUTO_INCREMENT,
  `SN_Index` int(10) DEFAULT NULL,
  `PD_Type` int(1) DEFAULT NULL,
  `NIST_Idx` int(10) DEFAULT NULL,
  `Temp` decimal(5,2) DEFAULT NULL,
  `Humidity` decimal(5,2) DEFAULT NULL,
  `PDcalPDF_Idx` int(10) DEFAULT NULL,
  `PDcalTXT_Idx` int(10) DEFAULT NULL,
  `Meas_Idx` int(10) DEFAULT NULL,
  PRIMARY KEY (`Cal_Index`),
  KEY `FK_pd_cal_pd_main` (`SN_Index`),
  KEY `FK_pd_cal_pd_type` (`PD_Type`),
  KEY `FK_pd_cal_nist_pd_std` (`NIST_Idx`),
  KEY `FK_pd_cal_meas_sys` (`Meas_Idx`),
  KEY `FK_pd_cal_documents` (`PDcalPDF_Idx`),
  KEY `FK_pd_cal_documents_1` (`PDcalTXT_Idx`),
  CONSTRAINT `FK_pd_cal_documents` FOREIGN KEY (`PDcalPDF_Idx`) REFERENCES `documents` (`Doc_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pd_cal_documents_1` FOREIGN KEY (`PDcalTXT_Idx`) REFERENCES `documents` (`Doc_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pd_cal_meas_sys` FOREIGN KEY (`Meas_Idx`) REFERENCES `meas_sys` (`Meas_Idx`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pd_cal_nist_pd_std` FOREIGN KEY (`NIST_Idx`) REFERENCES `nist_pd_std` (`NIST_idx`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pd_cal_pd_main` FOREIGN KEY (`SN_Index`) REFERENCES `pd_main` (`PD_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pd_cal_pd_type` FOREIGN KEY (`PD_Type`) REFERENCES `pd_type` (`pdType_Idx`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pd_cal`
--

LOCK TABLES `pd_cal` WRITE;
/*!40000 ALTER TABLE `pd_cal` DISABLE KEYS */;
INSERT INTO `pd_cal` VALUES (1,1,1,1,'17.00','20.00',12,11,1);
/*!40000 ALTER TABLE `pd_cal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pd_main`
--

DROP TABLE IF EXISTS `pd_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pd_main` (
  `PD_Index` int(10) NOT NULL AUTO_INCREMENT,
  `PD_SN` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`PD_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pd_main`
--

LOCK TABLES `pd_main` WRITE;
/*!40000 ALTER TABLE `pd_main` DISABLE KEYS */;
INSERT INTO `pd_main` VALUES (1,'8D080');
/*!40000 ALTER TABLE `pd_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pd_type`
--

DROP TABLE IF EXISTS `pd_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pd_type` (
  `pdType_Idx` int(1) NOT NULL AUTO_INCREMENT,
  `Type` varchar(6) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`pdType_Idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pd_type`
--

LOCK TABLES `pd_type` WRITE;
/*!40000 ALTER TABLE `pd_type` DISABLE KEYS */;
INSERT INTO `pd_type` VALUES (1,'Si','Silicon'),(2,'SiGe','Silicon/Germanium');
/*!40000 ALTER TABLE `pd_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_calibration`
--

DROP TABLE IF EXISTS `pn_calibration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_calibration` (
  `Calibration_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Calibration_Name` tinytext NOT NULL,
  `Calibration_Desc` text NOT NULL,
  PRIMARY KEY (`Calibration_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_calibration`
--

LOCK TABLES `pn_calibration` WRITE;
/*!40000 ALTER TABLE `pn_calibration` DISABLE KEYS */;
INSERT INTO `pn_calibration` VALUES (1,'00','Without Calibration'),(2,'01','With NREL Traceable Calibration'),(3,'02','With PVM Calibration'),(4,'03','With NREL Calibration');
/*!40000 ALTER TABLE `pn_calibration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_connector`
--

DROP TABLE IF EXISTS `pn_connector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_connector` (
  `Connector_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Connector_Name` tinytext NOT NULL,
  `Connector_Desc` text,
  PRIMARY KEY (`Connector_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_connector`
--

LOCK TABLES `pn_connector` WRITE;
/*!40000 ALTER TABLE `pn_connector` DISABLE KEYS */;
INSERT INTO `pn_connector` VALUES (1,'4D','4 Pin Circular Din Connector'),(2,'BP','Banana Plug Connector'),(3,'0S','Lemo 0S Series (ETCC-23) Connector'),(4,'00','No Connector');
/*!40000 ALTER TABLE `pn_connector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_custom`
--

DROP TABLE IF EXISTS `pn_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_custom` (
  `Custom_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Custom_Name` tinytext NOT NULL,
  `Custom_Desc` text NOT NULL,
  PRIMARY KEY (`Custom_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_custom`
--

LOCK TABLES `pn_custom` WRITE;
/*!40000 ALTER TABLE `pn_custom` DISABLE KEYS */;
INSERT INTO `pn_custom` VALUES (1,'00','No Customization'),(2,'01','Cust Supplied Solar Cell'),(3,'02','RG610 Filter'),(4,'03','Si Gray'),(5,'04','No Window Glue'),(6,'05','Shunt Resistor'),(7,'06','High Impedance between TC and Solar Cell');
/*!40000 ALTER TABLE `pn_custom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_material`
--

DROP TABLE IF EXISTS `pn_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_material` (
  `Material_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Material_Name` tinytext,
  `Material_Desc` text,
  PRIMARY KEY (`Material_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_material`
--

LOCK TABLES `pn_material` WRITE;
/*!40000 ALTER TABLE `pn_material` DISABLE KEYS */;
INSERT INTO `pn_material` VALUES (1,'Si','Silicon Active Material'),(2,'Ga','Gallium Arsenide Active Material'),(3,'00','Unknown Material');
/*!40000 ALTER TABLE `pn_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_size`
--

DROP TABLE IF EXISTS `pn_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_size` (
  `Size_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Size_Name` tinytext NOT NULL,
  `Size_Descrip` mediumtext NOT NULL,
  `Measurement` decimal(5,3) NOT NULL,
  PRIMARY KEY (`Size_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_size`
--

LOCK TABLES `pn_size` WRITE;
/*!40000 ALTER TABLE `pn_size` DISABLE KEYS */;
INSERT INTO `pn_size` VALUES (1,'D8','8mm Diameter Aperature Area','0.500'),(2,'01','10mm x 10mm Square Area','1.000'),(3,'02','20mm x 20mm Square Area','4.000'),(4,'03','26mm x 26mm Area','6.760'),(5,'S4','4.4mm x 4.4mm Area','0.200');
/*!40000 ALTER TABLE `pn_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_temp`
--

DROP TABLE IF EXISTS `pn_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_temp` (
  `Temp_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Temp_Name` tinytext NOT NULL,
  `Temp_Desc` text,
  PRIMARY KEY (`Temp_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_temp`
--

LOCK TABLES `pn_temp` WRITE;
/*!40000 ALTER TABLE `pn_temp` DISABLE KEYS */;
INSERT INTO `pn_temp` VALUES (1,'KT','K-Type Thermocouple Temperature Sensor'),(2,'PT','P-Type Thermocouple Temperature Sensor'),(3,'RD','RTD Temperature Sensor'),(4,'IC','IC Temperature Sensor'),(5,'JT','J-Type Thermocouple Temperature Sensor'),(6,'TT','T-Type Thermocouple Temperature Sensor'),(7,'L3','LM35DZ Temperature Sensor');
/*!40000 ALTER TABLE `pn_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pn_window`
--

DROP TABLE IF EXISTS `pn_window`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pn_window` (
  `Window_Index` int(2) NOT NULL AUTO_INCREMENT,
  `Window_Name` tinytext NOT NULL,
  `Window_Desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Window_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pn_window`
--

LOCK TABLES `pn_window` WRITE;
/*!40000 ALTER TABLE `pn_window` DISABLE KEYS */;
INSERT INTO `pn_window` VALUES (1,'K7','BK7 Cover Glass Window'),(2,'G1','KG1 Filter Glass Window'),(3,'G2','KG2 Filter Glass Window'),(4,'G3','KG3 Filter Glass Window'),(5,'G5','KG5 Filter Glass Window'),(6,'QZ','Quartz Cover Glass Window'),(7,'R1','RG610 Window'),(8,'R3','RG630 Window'),(9,'R4','RG645 Window'),(10,'R6','RG665 Window'),(11,'B9','BG39 Window'),(12,'26','Combination of KG2 and RG610 Window'),(13,'00','No Window'),(14,'00','No Window');
/*!40000 ALTER TABLE `pn_window` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sn_main`
--

DROP TABLE IF EXISTS `sn_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sn_main` (
  `sn_Index` int(10) NOT NULL AUTO_INCREMENT,
  `SN` int(4) NOT NULL,
  `PN_Size` int(2) NOT NULL,
  `PN_Window` int(2) NOT NULL,
  `PN_Temp` int(2) NOT NULL,
  `PN_Connector` int(2) NOT NULL,
  `PN_Cal` int(2) NOT NULL,
  `PN_Custom` int(2) NOT NULL,
  `Man_Date` int(10) NOT NULL,
  `PN_Material` int(2) NOT NULL,
  `Other_Features` text,
  PRIMARY KEY (`sn_Index`),
  KEY `FK_sn_main_pn_size` (`PN_Size`),
  KEY `FK_sn_main_pn_window` (`PN_Window`),
  KEY `FK_sn_main_pn_temp` (`PN_Temp`),
  KEY `FK_sn_main_pn_connector` (`PN_Connector`),
  KEY `FK_sn_main_pn_calibration` (`PN_Cal`),
  KEY `FK_sn_main_pn_custom` (`PN_Custom`),
  KEY `FK_sn_main_pn_material` (`PN_Material`),
  CONSTRAINT `FK_sn_main_pn_calibration` FOREIGN KEY (`PN_Cal`) REFERENCES `pn_calibration` (`Calibration_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sn_main_pn_connector` FOREIGN KEY (`PN_Connector`) REFERENCES `pn_connector` (`Connector_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sn_main_pn_custom` FOREIGN KEY (`PN_Custom`) REFERENCES `pn_custom` (`Custom_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sn_main_pn_material` FOREIGN KEY (`PN_Material`) REFERENCES `pn_material` (`Material_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sn_main_pn_size` FOREIGN KEY (`PN_Size`) REFERENCES `pn_size` (`Size_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sn_main_pn_temp` FOREIGN KEY (`PN_Temp`) REFERENCES `pn_temp` (`Temp_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sn_main_pn_window` FOREIGN KEY (`PN_Window`) REFERENCES `pn_window` (`Window_Index`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sn_main`
--

LOCK TABLES `sn_main` WRITE;
/*!40000 ALTER TABLE `sn_main` DISABLE KEYS */;
INSERT INTO `sn_main` VALUES (55,1053,3,1,1,1,3,1,1434952800,2,'None'),(56,1062,3,1,1,1,3,1,1435212000,1,'None'),(57,1051,2,5,1,1,2,1,1435212000,1,'None'),(58,1055,3,1,1,1,3,1,1436421600,1,''),(59,1046,3,5,1,1,3,2,1436767200,1,''),(60,1046,3,5,1,1,3,2,1436767200,1,'none'),(62,1068,3,1,1,1,1,1,1438927200,2,''),(63,1050,3,1,1,1,1,1,1439359200,1,''),(64,1071,3,1,6,1,1,1,1439791200,1,''),(65,1072,2,1,1,1,1,1,1440136800,1,''),(66,1060,3,1,1,1,4,7,1441173600,1,''),(67,1057,3,1,1,1,2,1,1441173600,1,''),(68,1070,3,1,3,1,2,1,1441778400,1,''),(69,1076,3,6,3,1,3,1,1442556000,1,''),(70,1077,3,6,3,1,1,1,1442556000,1,''),(71,1077,3,6,3,1,1,1,1442556000,1,'');
/*!40000 ALTER TABLE `sn_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_data`
--

DROP TABLE IF EXISTS `test_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_data` (
  `Index` int(10) NOT NULL AUTO_INCREMENT,
  `Test_Index` int(10) NOT NULL,
  `Tab_Index` int(1) NOT NULL,
  `Test_FN` text,
  `Test_C` decimal(3,1) DEFAULT NULL,
  `Test_VOC` decimal(4,3) DEFAULT NULL,
  `Test_Isc` decimal(5,2) DEFAULT NULL,
  `Test_FF` decimal(4,1) DEFAULT NULL,
  `Test_Pmax` decimal(5,2) DEFAULT NULL,
  `Test_Eff` decimal(4,1) DEFAULT NULL,
  `Test_Size` decimal(5,3) DEFAULT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_data`
--

LOCK TABLES `test_data` WRITE;
/*!40000 ALTER TABLE `test_data` DISABLE KEYS */;
INSERT INTO `test_data` VALUES (30,23,1,'150509-122112-IV-PVM1053.txt','21.0','0.936','96.97','71.8','65.15','16.3',NULL),(31,23,2,'122337_IV_PVM1053.txt','25.0','0.927','97.53','71.4','64.55','16.4',NULL),(32,23,3,'122538_IV_PVM1053.txt','35.0','0.908','98.49','71.0','63.46','15.9',NULL),(33,23,4,'122756_IV_PVM1053.txt','45.0','0.888','99.70','70.3','62.24','15.6',NULL),(34,23,5,'122337_IV_PVM1053.txt','21.0','0.936','97.30','71.8','65.43','16.4',NULL),(35,24,1,'150509_112328_IV_PVM1062.txt','21.0','0.629','136.37','73.9','63.39','15.9',NULL),(36,24,2,'112537_IV_PVM1062.txt','25.0','0.621','136.27','73.8','62.44','15.6',NULL),(37,24,3,'112928_IV_PVM1062.txt','35.0','0.601','137.06','72.9','60.02','15.0',NULL),(38,24,4,'113324_IV_PVM1062.txt','45.0','0.581','137.66','72.2','57.69','14.4',NULL),(39,24,5,'113909_IV_PVM1062.txt','21.0','0.629','135.96','73.9','63.16','15.8',NULL),(40,25,1,'150509-115155_IV_PVM1051.txt','21.0','0.555','11.60','65.4','42.10','4.2',NULL),(41,25,2,'115711_IV_PVM1051.txt','25.0','0.547','11.60','65.4','41.37','4.1',NULL),(42,25,3,'120153_IV_PVM1051.txt','35.0','0.525','11.60','65.6','39.17','3.9',NULL),(43,25,4,'120425_IV_PVM1051.txt','45.0','0.502','11.50','65.6','36.80','3.7',NULL),(44,25,5,'121015_IV_PVM1051.txt','21.0','0.555','11.59','65.5','42.10','4.2',NULL),(45,26,1,'150509-105606_IV_PVM1055.txt','21.0','0.629','135.64','73.5','62.74','15.7',NULL),(46,26,2,'150509-105851_IV_PVM1055.txt','25.0','0.621','135.66','73.2','61.73','15.4',NULL),(47,26,3,'150509-110135_IV_PVM1055.txt','35.0','0.601','136.33','72.4','59.31','14.8',NULL),(48,26,4,'150509-110348_IV_PVM1055.txt','45.0','0.581','137.21','71.7','57.15','14.3',NULL),(49,26,5,'150509-110912_IV_PVM1055.txt','21.0','0.629','135.24','73.6','62.72','15.7',NULL),(50,28,1,'105218-130448_IV_PVM1046.txt','21.0','0.592','50.83','69.5','20.93','5.2',NULL),(51,28,2,'105218-131159_IV_PVM1046.txt','25.0','0.583','50.70','69.6','20.58','5.2',NULL),(52,28,3,'105218-131743_IV_PVM1046.txt','35.0','0.563','50.82','68.7','19.68','4.9',NULL),(53,28,4,'105218-132208_IV_PVM1046.txt','45.0','0.543','50.73','68.7','18.94','4.7',NULL),(54,28,5,'105218-133353_IV_PVM1046.txt','21.0','0.592','50.67','69.8','20.95','5.2',NULL),(55,30,1,'150727-091145-PVM790.txt','21.0','0.928','97.10','73.3','66.10','16.5',NULL),(56,30,2,'150727-093003_IV_PVM790.txt','25.0','0.920','97.20','73.0','65.20','16.3',NULL),(57,30,3,'150727-093401-PVM790.txt','35.0','0.899','98.30','71.9','63.50','15.9',NULL),(58,30,4,'150727-093717-PVM790.txt','45.0','0.878','99.10','71.1','68.80','15.5',NULL),(59,30,5,'150727-094135-PVM790.txt','21.0','0.929','96.90','73.4','66.10','16.5',NULL),(60,31,1,'150414-084215_IV_PVM1050.txt','21.0','0.997','97.20','75.1','72.83','18.2',NULL),(61,31,2,'150414-084552_IV_PVM1050.txt','25.0','0.989','97.50','74.8','72.15','18.0',NULL),(62,31,3,'150414-085221_IV_PVM1050.txt','35.0','0.969','98.60','74.5','71.15','17.8',NULL),(63,31,4,'150414-085612_IV_PVM1050.txt','45.0','0.951','99.60','73.6','69.73','17.4',NULL),(64,31,5,'150414-090601_IV_PVM1050.txt','21.0','0.999','96.70','75.1','72.52','18.1',NULL),(65,32,1,'150817-090933_IV_PVM1071.txt','21.0','0.626','139.23','73.3','63.84','16.0',NULL),(66,32,2,'150817-091218_IV_PVM1071.txt','25.0','0.616','139.33','73.3','62.95','15.7',NULL),(67,32,3,'150817-091511_IV_PVM1071.txt','35.0','0.597','139.79','72.6','60.63','16.0',NULL),(68,32,4,'150817-091747_IV_PVM1071.txt','45.0','0.578','140.70','71.6','58.23','14.6',NULL),(69,32,5,'150817-092728_IV_PVM1071.txt','21.0','0.627','139.09','73.4','64.20','16.0',NULL),(70,33,1,'150821-075608_IV_PVM1072.txt','21.0','0.617','40.20','67.5','16.70','4.2',NULL),(71,33,2,'150821-080214_IV_PVM1072.txt','25.0','0.609','40.20','67.5','16.50','4.1',NULL),(72,33,3,'150821-080551_IV_PVM1072.txt','35.0','0.589','40.50','66.9','16.00','4.0',NULL),(73,33,4,'150821-080957_IV_PVM1072.txt','45.0','0.569','40.60','66.0','15.30','3.8',NULL),(74,33,5,'150821-081638_IV_PVM1072.txt','21.0','0.617','40.10','68.1','16.90','4.2',NULL),(75,34,1,'150804-082417-IV-PVM1060.txt','21.0','0.625','137.69','73.4','63.18','15.8',NULL),(76,34,2,'150804-082718-IV-PVM1060.txt','25.0','0.616','138.25','72.9','62.00','15.5',NULL),(77,34,3,'150804-083034-IV-PVM1060.txt','35.0','0.596','138.88','72.9','59.66','14.9',NULL),(78,34,4,'150804-083346-IV-PVM1060.txt','45.0','0.576','139.31','71.8','57.58','14.4',NULL),(79,34,5,'150804-084057-IV-PVM1060.txt','21.0','0.624','137.58','73.2','62.82','15.7',NULL),(80,34,9,'1239.02','25.1','0.618','141.10','73.8','64.38','15.2','4.250'),(81,35,1,'150618-085820_IV_PVM1057.txt','21.0','0.631','135.89','74.5','63.82','16.0',NULL),(82,35,2,'150618-090419_IV_PVM1057.txt','25.0','0.622','135.99','74.3','62.79','15.7',NULL),(83,35,3,'150618-090714_IV_PVM1057.txt','35.0','0.602','136.68','73.6','60.60','15.2',NULL),(84,35,4,'150618-091221_IV_PVM1057.txt','45.0','0.580','137.53','72.7','58.00','14.5',NULL),(85,35,5,'150618-094348_IV_PVM1057.txt','21.0','0.629','135.80','74.8','63.88','16.0',NULL),(86,35,9,'1280','24.0','0.623','139.92','74.9','65.30','15.3','4.262'),(87,36,1,'150909-085801_IV_PVM1070.txt','21.0','0.628','140.00','74.9','65.90','16.5',NULL),(88,36,2,'150909-090131_IV_PVM1070.txt','25.0','0.620','141.00','74.5','65.00','16.3',NULL),(89,36,3,'150909-090549_IV_PVM1070.txt','35.0','0.600','141.00','73.5','62.40','15.6',NULL),(90,36,4,'150909-090928_IV_PVM1070.txt','45.0','0.579','142.00','72.7','59.70','14.9',NULL),(91,36,5,'150909-091545_IV_PVM1070.txt','21.0','0.628','140.00','79.4','66.00','16.5',NULL),(92,37,1,'150918-064124_IV_PVM1076.txt','21.0','0.629','143.00','75.2','67.70','16.9',NULL),(93,37,2,'150918-064345_IV_PVM1076.txt','25.0','0.623','143.00','74.9','66.90','16.7',NULL),(94,37,3,'150918-064606_IV_PVM1076.txt','35.0','0.603','145.00','74.1','64.60','16.1',NULL),(95,37,4,'150918-064908_IV_PVM1076.txt','45.0','0.581','145.00','73.0','61.60','15.4',NULL),(96,37,5,'150918-065452_IV_PVM1076.txt','21.0','0.630','143.00','75.2','67.80','16.9',NULL),(97,38,1,'150918-070414_IV_PVM1077.txt','21.0','0.626','143.00','74.0','66.20','16.6',NULL),(98,38,2,'150918-070616_IV_PVM1077.txt','25.0','0.618','142.00','74.1','65.10','16.3',NULL),(99,38,3,'150918-070946_IV_PVM1077.txt','35.0','0.598','143.00','73.2','62.60','15.6',NULL);
/*!40000 ALTER TABLE `test_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_in_roles`
--

DROP TABLE IF EXISTS `users_in_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_in_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_in_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `users_in_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_in_roles`
--

LOCK TABLES `users_in_roles` WRITE;
/*!40000 ALTER TABLE `users_in_roles` DISABLE KEYS */;
INSERT INTO `users_in_roles` VALUES (1,1,1);
/*!40000 ALTER TABLE `users_in_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-22 14:20:02
