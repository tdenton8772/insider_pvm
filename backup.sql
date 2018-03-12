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
INSERT INTO `documents` VALUES (11,'PDCal Ge PD157.txt','900	46.743\r\n905	47.281\r\n910	47.714\r\n915	48.180\r\n920	48.682\r\n925	49.157\r\n930	49.573\r\n935	50.027\r\n940	50.457\r\n945	50.868\r\n950	51.277\r\n955	51.613\r\n960	51.946\r\n965	52.298\r\n970	52.720\r\n975	53.076\r\n980	53.426\r\n985	53.805\r\n990	54.195\r\n995	54.503\r\n1000	54.933\r\n1005	55.330\r\n1010	55.661\r\n1015	55.988\r\n1020	56.259\r\n1025	56.583\r\n1030	56.856\r\n1035	57.112\r\n1040	57.346\r\n1045	57.580\r\n1050	57.851\r\n1055	58.092\r\n1060	58.382\r\n1065	58.609\r\n1070	58.837\r\n1075	59.133\r\n1080	59.335\r\n1085	59.579\r\n1090	59.835\r\n1095	60.078\r\n1100	60.274\r\n1105	60.525\r\n1110	60.745\r\n1115	61.004\r\n1120	61.263\r\n1125	61.511\r\n1130	61.769\r\n1135	62.044\r\n1140	62.307\r\n1145	62.547\r\n1150	62.815\r\n1155	63.074\r\n1160	63.347\r\n1165	63.582\r\n1170	63.766\r\n1175	64.037\r\n1180	64.164\r\n1185	64.298\r\n1190	64.506\r\n1195	64.637\r\n1200	64.820\r\n1205	64.933\r\n1210	65.053\r\n1215	65.221\r\n1220	65.348\r\n1225	65.443\r\n1230	65.611\r\n1235	65.717\r\n1240	65.818\r\n1245	65.919\r\n1250	66.085\r\n1255	66.200\r\n1260	66.318\r\n1265	66.386\r\n1270	66.498\r\n1275	66.619\r\n1280	66.758\r\n1285	66.872\r\n1290	66.974\r\n1295	67.106\r\n1300	67.194\r\n1305	67.338\r\n1310	67.465\r\n1315	67.590\r\n1320	67.697\r\n1325	67.828\r\n1330	67.980\r\n1335	68.087\r\n1340	68.213\r\n1345	68.311\r\n1350	68.470\r\n1355	68.620\r\n1360	68.747\r\n1365	68.844\r\n1370	68.967\r\n1375	69.076\r\n1380	69.285\r\n1385	69.355\r\n1390	69.541\r\n1395	69.668\r\n1400	69.868\r\n1405	69.896\r\n1410	70.021\r\n1415	70.119\r\n1420	70.309\r\n1425	70.358\r\n1430	70.480\r\n1435	70.565\r\n1440	70.627\r\n1445	70.735\r\n1450	70.834\r\n1455	70.839\r\n1460	71.012\r\n1465	71.121\r\n1470	71.267\r\n1475	71.420\r\n1480	71.482\r\n1485	71.570\r\n1490	71.676\r\n1495	71.870\r\n1500	71.958\r\n1505	72.075\r\n1510	72.246\r\n1515	72.294\r\n1520	72.489\r\n1525	72.615\r\n1530	72.795\r\n1535	72.832\r\n1540	72.848\r\n1545	72.660\r\n1550	72.433\r\n1555	71.990\r\n1560	71.306\r\n1565	70.210\r\n1570	68.834\r\n1575	67.047\r\n1580	64.814\r\n1585	62.238\r\n1590	59.481\r\n1595	56.676\r\n1600	54.044\r\n1605	51.444\r\n1610	49.134\r\n1615	47.091\r\n1620	45.144\r\n1625	43.426\r\n1630	41.862\r\n1635	40.397\r\n1640	39.115\r\n1645	37.829\r\n1650	36.580\r\n1655	35.627\r\n1660	34.476\r\n1665	33.252\r\n1670	32.116\r\n1675	30.994\r\n1680	29.963\r\n1685	28.862\r\n1690	27.954\r\n1695	27.082\r\n1700	26.244\r\n1705	25.362\r\n1710	24.675\r\n1715	23.931\r\n1720	23.044\r\n1725	22.192\r\n1730	21.350\r\n1735	20.343\r\n1740	19.413\r\n1745	18.420\r\n1750	17.494\r\n1755	16.511\r\n1760	15.483\r\n1765	14.548\r\n1770	13.610\r\n1775	12.944\r\n1780	12.163\r\n1785	11.232\r\n1790	10.430\r\n1795	9.662\r\n1800	9.030\r\n',NULL,2331),(12,'PDCal Ge PD157.pdf','%PDF-1.3\n%�쏢\n8 0 obj\n<</Length 9 0 R/Filter /FlateDecode>>\nstream\nx��]\r�]�U��byc3��H[�<�j@���@��\0��RM�|`�HIB�P00uh�ZJkJ�\n-��J[ڢH�b)�v�6E�#D�s��e������ڤ���޽���=����>p�g��\n,�.��]l�+��x%������{������N�5S��nyoE�\"�E)ߟ���5c}ɵǆ�.���ޙ=60\Z[����E�s\r����c^h���ʼ��\'�5w��y�������=�/do�E\'�]o�)sOYӛ{Ңc���h��^�l��u}�឵k.^���\0�v���<�ނ���~��O�o>p�5�xחf|o��s�ū����G��ón|�֛���W��{��g�?�����~������:��O��0������y��6����=u퓷,~e빫���_���v\"��]�y�����-�r��K�߼�e���C_�׭���?������?��a?���/Z{���{�#���QG�bP��J!t��?�iHjԗP�������L-�C\"%�a�Z����4�51�Y�[�;�!��\r$���=�ˆ�yKp�d������Uo�7�9P�Z\Z\"%�@��7��K�����%����Xa�{�u�lʤUZUe�P��N^�A3��?{���GJcU0K�CF�G��ZU	�h�*�]\Z����+VB�3t�=�J<\ZǎV��x���S[	�`\n~wi%N�ٝV\"��a��l%�㜼��(�K�h%�g�iP��3�����,�~~�������Y�p�>���M˗�v�+��?w����C��i���w�c��W��z����m��{˟���;�v��~��ş�������}�<8�v�Q�-��Gg-���|���~���^��Zt�6q௿x����}��SݢA]#ӏR��q&�$�A�N��;�E;�&����\ZU��ى��Tw�u$2��#=�g��4����n�uxc֑��^l�KI�	>�X�#!a�\'!]�paxJ�m��\\_([�xr�l��X	�0 �>�A���S��QIM�(<���2��BY?���Lǲ�C��X5,��P	g|Uoi��R����Xvq�޺P�d,���a�,\Z���z�6d+=�1�z%�,(���]V�c��B��L\0�b@U	��Ji�0`�pb��pa�\\r��3��7PR�o4�3�`�k_[�ڨ\0��r#�w���A���`�S��)8H�-<��lx\n1p�8���S�ی��+�����\'�1V�*>X���X�D�s���B�p̳JYk\ne�b��9oĪ򲥅���Q�[jo}CeU�JkМa0�J�=��������/X��Ϗq�c4�Ѐ6��	��	�\ZF��O�}P��u�^��05�3j����\Z��C{�� 	��H��B��OU��Oj\"���V�����dYt�p}Aw�. �/���.������Y]�Q�xA�/&�V1Ӈ���A\n�`���tA�G��0]�U���\Z/ �/�_VML�����\rw�ƻ���/^@�.�Ԕh4�RS,o\nS[�Q]lE����b��+�)M�V��\ZU؀����l�BV��W�j�+O��.�4D	�a�N�sf���i�6`�w*�˜��5�~U���F�\'�̐:��H��ր�Ma8a4o�w����+a�X��OL��>> `�A��q�;�`\\ɀ\r�뀱/eI\'0���,�GϬ%��\0��ɐ�T��07<`�Z�0���[��؀Q�Ɠ~���+��y,����1k�����E��@Έ�9��jp� j�y���+Q�^�(�#O��\0��ApWన]FSΟ�~*��������p\0~l�\"@�� �	\\H�\0AH��\0�TIn� t$��c��ق^\'��� �*�&@hL:F*(�=\'��� TP���GW:@xeA��D=h�k	��hMT �5�]`(\0-��~�p���\n@D�m���*�Ў�<@h̒�Y�`��A����Ub�I�\0��#����RK,]8 t�9j�\n��F���.�!�z�.@��E*7è=H��7F�1\nJT\"9�$VBP�!E\'�0���	⫨_O��P]�Ɯ(B|	��dVpRn� ��{� ~z��d��\0�������\01(@x2E�ɀ\'I��۔I��c�(.J����HKMQ�X�:����,��`QP�PDB�MN��؄��؆�d���!�z��C�g�dk\Z�0�؄fM�\0�[0�S�G�j�6�_�Tb}�p!6Y��;�9��o��J�C�r8����Ե��8y�Tn�P�\0��s*F�\'�w(F�J@���� �l�0��8,A�5W+�P�@T\0��A�0���	)AQK %�y2`�����S	0؎�,`��\'����*`$���S��\'`U)�_���K��&Я�m�tes:��AX|*.<���BP��\"�0�1�{3��=��\0[�y�<<��O�E$�bcAV�Dd/:��2�b{q<�-c+H��e��d�E$Ƃ�y�X|�XL�Xd�Xd�X|c�cQ-�E�LQ�Y��Y\n���ґ���X��U�YY�XT�XL�X�g,�g�#f{����^tb/&��؋��KNYT�,ne���@Y���P�3��Ț���N�ST����ST�)��SD�)&�]��kO1����S\\�)\"�?���q<E%��O1���q<�%�\"O����7�SL�)\"��x�K<E\'��w�����<Ŏ�)*��x��y\nD������`:%��O񉧨�SD�)��)(E�St�S�!#O,�Y�)~��3��[x��y\n&(O�O�4��ʸ�͸�̸�θ�ȸ�/s�7����&.�&*�&:�&6�&\"�&<�&>�&6q�7�C�Md�MT����]s�q�q���d����%nb2n\"w37ac�IK6E5p+?�}%^�Y�����Ȍ��^b3^\"2^�2^�/�yq�b3�\"3��G�,�(6�(:�(*q(J�f�dEg�d�d�dY�q�q�q�q�q�q�eU��%��y�\"G�GqG/�5/i!#)�bX\"#b,�]$#�\"#L�Ο�y�)�,\"/q%^��O\\�%\"��x��?I�F����K��I����K�N�_�%��?�>�[̟��KT�%��Kv&\"����\'e^RΟ�]Ο��Kx�%��K|)�ɂ/a)�����$^\"/቗��e��f�D��Ol�K�N�OXK�$�(�%��s볜�o�%����\"/��m��E�.pђ\'�Q-\\���Ir.�v�\":�\"���s���և5�#�\rܞ#I_s�I0(2q�q�q�q�q�q�}�qٗ]�#�%>�|��#.�#*�#����>�3>�3>�2>b3>b2>b3>b3>�Z�����nəؚ���3>\"2>\"Z�������������)��s�3�7Q)g�S��&��j����h\nO4E&��M�E�bMቦ��3Q57�,q��	O����O�D\'n\"jnB4%r���/�Ld�&>q]�&&qUs~ǜ	b�M\\�&��&�Z���DHDMH��U��ԄĲDHL�N�Blb!��1��M,DY�J,D�񉅘Rvĳ�Blb!\"��X�J,D$\"��C��+�Dl�bLJ�����@�R�\r�Z� .�\"�\r�[�����7���o����	r\"\r��[��� \'\"&ȉ�b2b2���8�<H��T��ϸ�o�z�a2�aZI�y����θ�nr\\ч���iA��%��$��sa=VDު6�ȑqaKH��V�Z�ՌZ�V-j��&v]f��t�lP��5������r5�wNѢ1��ܥaƩɄ�At)p�eM�+���ŶVL�ZKeݨU�\'��W�\r�\ZܷJ�J0j��H$ء�J�jz\r��Ⱥ�,.����{�fu��a�Q���v�Y�=�Tۑ���ƨZZ�VF�����a���M�ъ�g��<4j���徚�Fu\ncrإf-�v�-��#�ŷ�ZZv���/��E�����R��vO�j��Z\\�UK�3�rW��A�D�3إj�ǃ�f�1ZZ�4V~���ШY�Q���v�YΧ�h�n3ZZ%UKk�s�jY1/�Q���v�Z���m�%�vd��� j�6䚕�b^�:U�6F�K�Z>�XI�-���ji�F�Z��O�@�x ��\\O<(��#�)��x�R<`)�x��@N{<0��hY�l$���beb.�.��ŴlI��,f��Vi�U�T�*�ek�u��N���m��$W7��H�Ji�Z�R��*��X��\Z?]���f�뭮�l��z>>�%�ݙ�o���\Z�����Y\\��^��B��BY��8?f`U�^�P����R�՞t��Pme>�1��G+2���7+vRfXu��4�_[�8�!�p�\ne��l��a���f$��:2S�0]�J���4HΙ���w\'h��r����\\�\r�>,�ӵ�9��SA��G�UН��1���;���F�Ν�������¹o�}��1F��)�d�6�ײ��(�����m`��Av�te�%QEw�W[�Q�z�{_�m�\r}�\"�X�g�NŇ�~\n˗�7�����$�K�K�D�1��V|��T�����~T|:��?|�\r��Xtw�M%������d�Nj@��\Z��&�@8�V\r��8�K�R������C��y$~uEb5,JA8�2\nL&�aAK��; \\�U|���]�:u��Mu��K�i�;.��6��&�tWt�*�w�|���I���q;��ex���e�y�\rW�}6�{�ݛ����3����M[~e����x�l�����;��o�<�g|扃N�ݰ}��>�w��_���+���v����\\r����#_z��o|jv��.�֫W��Gn:�n{f���]���36���,�����������ݶ�=�ǂo|�4v�a�?�q��G�~�#���;��7��W�����޹�į�Ŷ�O�����/>�����W�ǖٷ�|p�w�>�k���c�����[���]���<sʑ/�U�<��9乗.?��!����n:���������z�k����O�~�__��3�/������mo�/_�ş:���/����}n�Co\Z>}�9��ں�c�{�W7أ�~��s�r�?��\'g��o�b~x�+�?�{3�������e�|�-�����}b�c�}���6�����~y��x�{���i6�ҒEglu�0�;�+%qU`v�0�W�NF+p�����1���Da9����V�#��޻�j0��C�U�95�Ф���B�݅zsB������zj��+��67��ᢂ�N�zf�~q=qǢһq靷����H�ލw�\'�Ҡ��-h�t�_�-��B�`C#\\W�VI��T�b�	�7���ƩR 6�Z�� �%�ڝ_Z2�a��U �*bJ�퉁X���r����w!�+t�\"1�L��u`/%�q��x�F!#j�ľ��À���s�i$�z��%�[�Wz�R��w!�0=�ςω��ˉ\"1�0W�ĸ1�%K���̢���J`tvZ�؃��g)՛����F�]�ą.vC ֜�.~;��.O��B��=�0}U�x�u���h4I���Uk~���Z��Y?d�i�_��N�y=�/��I�ư�i��^�E��^��/3a_��p��I��bk���6N�W��0�g���xў��r��pqVm�mt5:\\m]�+�V�Ո)/�-I����=�҄SPjLu�>��~��nO�`<-�h�����	Y\ZW�1[K�+�)��m\"�������RSHT�D�#r����mN���h�������ck~��(���Gǎ�τ\'rrړ�!��ɱ��B��;�e&�+:�MT�FLt��6NP�j�5�y-�E�6�NN�	�E;�]�W[W9y��0��+�9f8�986ؔ�v\'��\08i����S8{�ު~�7:}�\n�.Z���_�kJX9}���I�ns���u��\\E��1�Ώ�ʘ��j����ck~���\0<~��&���l[�9?.笜$����@��ru=�W}�	��I?�[\Z=:?��զ�	����F<�<^$KO��h�py?���p�u5������KRe���rx<9/�S9v25KQ�禚���u�}���+^�3}�W�⚒UNppt���۝~T��7z����9�-OG�G\n8(���ē8|l͏��W&9�8�ǤN�9<�*Y�g��W}�3|��L�WtB<E��+����j��d}��3}6�*���zO��t~n.���FW�����D_7?�F.I�9(��`t%uO��K���\0W�Fg��覡<w��Iq5�x\n��t���~y�V�*X剼�c���v�3r���if0�e�^1.�%�������~���Jh�[�`bUcE�^�,�0f��-�\'��x�i{���[j�BYI���z�e�½���#x�T���z-I�f��rB�X����it� ��� ���r��3����YY��?U޶�bM<U \n�\r��j6��uJ�����:�\Z{��\ZQ�S�Bk�p}{�虽�����endstream\nendobj\n9 0 obj\n6571\nendobj\n7 0 obj\n<</Type/Page/MediaBox [0 0 612 792]\n/Rotate 90/Parent 3 0 R\n/Resources<</ProcSet[/PDF /ImageC /Text]\n/ExtGState 19 0 R\n/XObject 20 0 R\n/Font 21 0 R\n>>\n/Contents 8 0 R\n>>\nendobj\n3 0 obj\n<< /Type /Pages /Kids [\n7 0 R\n] /Count 1\n/Rotate 90>>\nendobj\n1 0 obj\n<</Type /Catalog /Pages 3 0 R\n>>\nendobj\n6 0 obj\n<</Type/ExtGState/Name/R6/TR/Identity/BG 4 0 R/UCR 5 0 R/OPM 1/SM 0.02>>\nendobj\n10 0 obj\n<</Subtype/Image\n/ColorSpace/DeviceRGB\n/Width 54\n/Height 146\n/BitsPerComponent 8\n/Filter/FlateDecode\n/DecodeParms<</Predictor 15\n/Columns 54\n/Colors 3>>/Length 279>>stream\nx���-�@@��q�����g�G`0tH[@�dW�\'&#?1z�<�۶�\n.$�0����,�1u]�f��i�D\\�57�W������Dl۶����껟�M�dd�\'�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D�$I$�H$�H\"�D\"�D���!q��cn�mb]׹O�B�6?����\n\nendstream\nendobj\n14 0 obj\n<</Subtype/Image\n/ColorSpace/DeviceRGB\n/Width 111\n/Height 146\n/BitsPerComponent 8\n/Filter/DCTDecode/Length 1524>>stream\n����\0Adobe\0d\0\0\0\0��\0C\0\n		\n\r\r\Z\Z\Z\Z��\0C��\0\0�\0o\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�\Z&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0�6���S���ֶHpn�q��{����7���\0�\0�\0�r�����\0~�*\0?���\0��ߟ�ʀ�G/�,����\0������7���\0�\0�\0�r�����\0~�*\0?���\0��ߟ�ʀ�G/�,����\0������7���\0�\0�\0�r�����\0~�*\0?���\0��ߟ�ʀ�G/�,����\0���v�%��%��]�R�Tz�2s@�9�\0![���\0�z\0��\0��\n\0(\0��\n\0(\0��\n\0(�����uo���\0�����\n\0(\0��\n\0(\0��\n\0(\0�sß�տޏ�\0g���\n\0(\0��\n\0(\0��\n\0(\0��9��GV�\0z?���::\0(\0��\n\0(\0��\n\0(\0��\n\0�<9�\0![���\0�z\0��\0��\n\0(\0��\n\0(\0��\n\0(�����uo���\0�����\n\0(\0��\n\0(\0��\n\0(\0�sß�տޏ�\0g���\n\0(\0��\n\0(\0��\n\0(\0��9��GV�\0z?���::\0(\0��\n\0(\0��\n\0(\0��\n\0�<9�\0![���\0�z\0��\0��\n\0(\0��\n\0(\0��\n\0(�����uo���\0�����\n\0(\0��\n\0(\0��\n\0(\0�sß�տޏ�\0g���\n\0(\0��\n\0(\0��\n\0(\0��9��GV�\0z?���::\0(\0��\n\0(\0��\n\0(\0��\n\0�<9�\0![���\0�z\0��\0��\n\0(\0��\n\0(\0��\n\0(�����uo���\0�����\n\0(\0��\n\0(\0��\n\0(\0�sß�տޏ�\0g���\n\0(\0��\n\0(\0��\n\0(\0��9��GV�\0z?���::\0(\0��\n\0(\0��\n\0(\0��\n\0�����u�L�V)]B1�,n�?1@�\0P@\0\0P@\0\0P@\0\0\0\0\0@\0\0P@\0\0P@\0\0P@\0��\nendstream\nendobj\n18 0 obj\n<</Subtype/Image\n/ColorSpace/DeviceRGB\n/Width 13\n/Height 110\n/BitsPerComponent 8\n/Filter/FlateDecode\n/DecodeParms<</Predictor 15\n/Columns 13\n/Colors 3>>/Length 252>>stream\nx��Y� D����m��33\nA��W�`K)m�ao�̢�lzȃ\"�b�Xx}3T�����g[!wF����/��h~�z�s�C8�@F0·�gJ#z��s��Aۋ=�9�r~�Y�G�E9���*�ؠ���\0�\05i2��ɯ(4#�w��1:~�cy�Xk�)����e�_��/��S�2�[X��;����kxO���`���>���.�\"�wIe|��wIn�s�{ߣ:��ў!�/�P�w��_�	?��z<\0���U\nendstream\nendobj\n19 0 obj\n<</R6\n6 0 R>>\nendobj\n20 0 obj\n<</R18\n18 0 R/R14\n14 0 R/R10\n10 0 R>>\nendobj\n21 0 obj\n<</R13\n13 0 R/R17\n17 0 R>>\nendobj\n5 0 obj\n<</Filter/FlateDecode\n/FunctionType 0\n/Domain[0\n1]\n/Range[-1\n1]\n/BitsPerSample 8\n/Size[256]/Length 12>>stream\nx�kh�\0\0D��\nendstream\nendobj\n4 0 obj\n<</Filter/FlateDecode\n/FunctionType 0\n/Domain[0\n1]\n/Range[0\n1]\n/BitsPerSample 8\n/Size[256]/Length 12>>stream\nx�c`�\0\0\0\0\nendstream\nendobj\n16 0 obj\n<</Type/FontDescriptor/FontName/VPUJVO+TTD0t00/FontBBox[54 -10 564 682]/Flags 4\n/Ascent 682\n/CapHeight 682\n/Descent -10\n/ItalicAngle 0\n/StemV 84\n/MissingWidth 645\n/FontFile2 15 0 R>>\nendobj\n15 0 obj\n<</Length1 25280/Filter/FlateDecode/Length 22 0 R>>stream\nx��}{|Tյ�:��<����\0!D0�!yb\'H��0ĀHS�\"�EBT|Qʥ����R\n\'1x��\nU�z)ZE�)���*�����a���~�_���~���^{��>g�$\"jO�H��;&�\r%qU:L�v_E��l\'���=4�=u�m���)Q�7U5�ܷ+{�N�g���3kn�Q��~V=�\"��o��8=�\Z;t�A��G�W�}s)�p�V�#\Z4n�O�UϏu%�t_�#5���7z/2ݳ+�n�W��t�O�c�[-��O��v��\"�?A�+�)J\"���d+�T2r���K!Qk��>��jԔ��m���r���Ri��]�j�bŢM�F���~���?��+��؇���K���i3������Ru(��39[\"�s!o|����I�%�����&z�ޠ�4�&��!�!��iP�1_��!��z��\n`�Y�XȈD�}�>��gh%z��t���\nbT���}4uǡ���6��t/泣܋:*��E�@����)�F������<z�C���\r�+I]�EeT�qQ3Z��5���ڮ���j�ڮ����k	����9}���J��=��`�-l��ؑ��\"v^�M���1��q�c��V��;�7*gd��Fde�:|�-CӇ�\r4�;���}z���Lu�H���յKr�ĄN����;���DG�m�\"K4PJ֒��3�.y����8ݚc����4�w�z:�3����4�W�N�ZB���|���Ye���v�O�÷�����<c+�Z�R����+T^�g��y��T�&�ƿ1(¿���,A~����Q��Ѥ�D&e��#,�k)V���jL�C���x����蒗�QB9�j����eµ���y��1�\Z�iR�yM�I����˻�ǎd^E�����H4�$�s�DSݵ��R�D����	��v�y���� �A\r��ӎ3�DM��ȑDDv�h�)�=���0fj��D<��J:]*i�[��Y�NF�`B��iQ���B��-�uMN�xAO�b�_S*P�����eZ����BW@���ӝ/�<wA��i�@���I�,?X==�j\"<�(���/Omqi�ZG����?z̥�$�ps��v�[�\0v�JS9�$���zCc3syJ�B�&�qLPL�oe�[[T9�н�:K�Sk���T��O�MQ3��<̂��ڕ��P��Р��~�Ow�����jO��1pD�ޑϦ�j]��`mm�X��(��?�	�W?y��L*s�}��f�Ya2?�%����Tc�QU���6����zk	^g���\ZX\\�/�w��kr���d�iċKB�R2�Ԧ�v2*��)�`hA�ʌ,�fU�����ɮ��z\n���wam���I_T�q;=�\rGmMA�-V���WW��ºr���F`�Y�\nK��N���)tWW�b�\'5ӕڱܪSr�bs�A����j������.d����Ҝ��L�ɝ~��iBgE��1��x�(�fL4m4���3����\ZZ��J$�E�F�M��F�y1w.i�J��EVI��s�\\<�:�ϵ=��4!an�ZK�x!S��4��S�_q�fLv)���|ek���A�	�d���~ߣ9��-����.w;;¼I�S��U+��g�Ķ�����II�O��¤+�3QRwAm�Ԯ�a�@���cC��s�;�{x��\n�fZ�ޅ��\\�F���Z�c-���+����j� \"�w5O���3P�\n�nҏ���e��2�\Z�!��u��5|4|q]y5�[�\r���ЭX-e~SJ�.sq_cx(����hչR��e�����\r!ř��_��\n�VSF�6�+<YQ<�*&H��q�O��<̯�Ȃ��z���r<��\Z|��\'�w:�܏��eI��7�B��N�ȕ9�39��Kh�Q��];}D�D�*2DzZ�D\"/�ʓhZ�l�9�<y���y�{�.��?��Eo������b�w�k�W�	��M�\r�z}�HN\ni����W)U-���:*��CK�s�L���I4�6�NH��WɠU�5J�~�\'/`	�\0�6˂�T�����JNn�����D�@�m�)I]M���4ն�A��	j��Gz5˩4D>D	���C�Qi(�H��h���3�><磹j:��-�M����K]�&`ū�(�ثD��A����J)�ޛJ�x��n�z�c��Q@^L�D|9�K�0�s��[���z�W5��9�\'���өZ�A^��RR�m/%+���r�����)�I����?�q��c�<fkL���*<�]������o�\0_�P��(*���43y>��l�2u2ƃy��A�4\Z\'��r������	�Q�e^�+�T��<h\'_]���h�z�2P�Y�@��_���4�KA�K�F���)K�D4�u�|`�G��`��3��d�}F���x�xˋ1�fKi&0��RO�X�<�Re�^�[%/�)�s���^$?���l�1<&e�K�/_\"��6�se�uC��>\Z�#ϣy6����,9�J�(C^C>��/P�8cOb�e�a�da��\Z������t���\\7�=Z(�����Ő��(��c�t�5#�<�چ~	��(�Y�y�b�Ы���M������:fR^{�L��L��/�-�E�zd}Ú�ua�_���\Z�TYF^���G�Z����.��z����(��nI�q�i[c�G�Hر��G��E��7h�c�#���0�O�g�jy5�y����⍠!9\\!�XԒ�t�)�-��rJ�μ�5��G\'гH�����,oe�ƶE�6�C�+�%�+�!�HyFR��l�,��Πs�b]c}�}���X�#i�y�9�?�u?��>����(mTR���<��]�\"�[��iO��T�������I�6�:�����X��k`9٢����	4B����:I��,a�a����q�9�vE�G��Z������}��~��%����q��@�,sqQo�=��:��St�iK�l��ĳ��a\'Zc�ߧE�&�n�	[�zV�A��+�%�crF�e{�+Ƥ�R�����yi�����Qn�~V?��B�Z�9T�\r��s߰d��	ˀ�|q��v��R}�\Z�!�\"���.ﷰ%�}@_��b\rl�#1v\'d��X�/��<M%j=��\r=Uo%��m�zs�aj�J��n`]x�^ԫ� �*��\Z�_��@�E���ň�)G����1�f;�k�����A�Z��\Za������M��߷�Ja�`\0�El�Ck�~�?]!��1�MX�i����Mt�@TP��Y��؎�L��ﯖ������Q����oL�e��h��Z��yܤ�\"mJr�rS�7�W� S�7���/�Z{�e�y-@-�����9�`T�~ҞC�z�r�lg����z:�>���r�%��W^3��/�F���1�9�`�H�Ѓ�O	���xB�k^W{��܇�_����&�����_��{�}+�n\0��Ұ]�A�;Aσ��ڷ\"���=oP�[�^4�a�[�GG��=�F{�{��+���>ȕԲ7�a>����ܐo�s	�\r,zŞ\n[-�E-����B����׃.a?/�����mg�f`wm�=�j����mkD�F���&����>D�쎚�7-�.�53݌��9`6��πm��@O-Ů�v+@/�-�\0�Y��\0?���wX/f����w��p��}�:�/��^��\0�ͼ�_���:�_���1�z���3�͖�Cr4�q�\"|\r�g���bw4�k&m�ἤcl��%��̸���I�o����w���&^5��\0�K��*}3��o���Ic�\\~:s\n��}I����c���O�[��D�| S����.��3���F�\n=�$��א�f�i��L\n_��G�Z�wO-D��� ��3��r��o�Ϙ��.��@sL�H������0�ثw5 ��&?6�jE��������L^m�w��\n�1����|�A��c��(�XгF���@�f�12��n/!o\n��qD��n�]OUO`��5m�z�y����\r��W��+�����۱���8�]�(\'����/`����Ia���E�\'��~�]�l���o�CΠ�����.��N�s���0	�A�T}�܄=!C�oP����5R��$�xO��9��3G�R����l�KEJ_JQ�����~�f��2�I��n����1|��ѿ��9����תq���R��?x���śޟ��XmXT�	7 qֵ��+�`�WV蟱γ�\\�a����x�(|���������l��ǯ�o-m�^��{��+�MN��\r˧9ڄ��\n*��#4���~��\"V�V�K�4Ƀ�W	��롇�YE��^�~h�2��x�\"�c5Ɨ�/��F��%��N��r2�BG��W�89G?���)>���������8��~\"��j`�U��t��^`�?[p��~i8o}�?#;���x�^���˙B�߁޾�7���P&a�Y��!K�;pR>E�\0 !���a�T���m�W=�\'c��J���|&�:�x�N�Wy��n���4:�k�^��ҁ9h�ϒ	���m��A1V�L\"�-�|:I��KXk/�蜲r݃�Wa7�����<^�B~��@6XO5_?].R�@W��&�_0�ԃes�����>:�;�[È�3�,�Wؖ�Q8oۚ�������^l��P�g�\Zq���9?]�%��|^eO\0�5�:��\r8��4v!M�>O~�:��a���R��é�5�=� ؔR�Ö�c��QG)2��l������T<�~��5�k�?�Y)�&�86\'	�:f{\r��	{_6�8wٿ�����B�N`��ۜ�ߢ|^�w\Z�^}�ƙg���+��k��\n���3Y�lf�Ǽ�\n�>ZgD�^���P5����%bmGPq�w<���I�}�� x\n�k0�� �1�w0�9�l�J	Q\'!�w�o���U��^�c�a�\r�!��&���R��Ӧ{M$�u��WC�u\'������d���x}���H�9���A8w�@�|*�M3��y}ǐ���Xu3��L5@C�$���?+q~��q�ˢf����&���d�ix:��\\��m�#���&����M���z��@^$�ӴH �i�H��]#�|���@~�U��V�k�q��>�@~��õ��D����V	��|\\Kƽ\"��^��c|$�?>���)Xe��-h�\r�Q`=�gf�Y?Ā�-3�ׄ��k��\0�ɢ? �������瘾���c��7F>���wJ�¶�}#��a���\n���?	���Y�I�{�S�P�x�Zo���~ج���\n���Q��E�uh����d���\n��^ʾOU�%c��/�9}9\r����F�����#��׿�ߢy�!�K!��E��(A�\'���A���<5��a2P�:��({(E{�y�g8�e�_[����xˈ����n��(����g��o\r{\'7��?�lb7��:�POS�uh�[̻�\'a7#>	gC����#W��p{l/E}�g�V����y��Q*=����z�!�]\r ���_���b�����1D���G|S}�\r`���\'A֩�����Y~�$|�$\Z��M��4 tHC��Ʒ=���@��߮�������u9�<y/�EQy���;�>��>j=��\Z���)	��X����~����%��q������SB���_r���!���wo��m^����f�*�w��#��)�Gc���2�C#�]ƜKc�/�rx�0�9��J�(0^_.��(]z��1��,��}�\'9�Y��_��x}��6��F���b��ɝ����@����������:��7ų���L 0���x�$����������!�\"�_��p���Gdy��~3�X��;\n0�ďC�I�A)@w[ߤ���Ea�a�X�b���YaX7���k�=��&rB�����������9��v�\'�on�9�I�YϿ��?z�u�t�\Z���_��,�~�8�~\n��ഔ�B�d`$� Pdb��u�e��`�e��R}�<�M����<�j�a^��f�8*�5S�3��h�ț]|�������S���q]�xF}�*�����?�=\'���t����H�Cp>�e(���\r���W���/��O���m�D}�������PGR��}s����&��\r\'����o@%0��`ɐy�~�ښCS��Y�#e��-�}����![��*����_3g�eɆǧ��^��������)������X�;岜�1X��?h���w�ˁ�;`\0�}���2@z0��iʧ\Zsi31 �\"�4�����p�4\\�?$n�	2(l�\0E[�v5��5AYy�Y����5�����ą�:���!]�\r�Ǜ�U�G��פ�\'!s֫���m��`��l�U@�ΛkP�I�g�й�@9�\n�oD_�����H��\0F�p�kR5\r����֍HO����z�D�M�|�M�a\n��7�+�l�MR?��Y����O}C�骨|*t�����N�2���?��ܝ��l �cl��5��FEھ�m6)�y��4�Y8�\'PQ�.�VD\\�����c��\0�e��Ų�z{��j}��Ú�ȹ�Q������p���s�B�-\nݷ�_�k^�¹.�\'�]U���6�}���Ͷ�RlQ��:h�x�l��.���Q7��ݬ��|��G�\'1_\0߻�r$�{-_��˿����`��7Ҩ0j��f�a���4\rS���}�A�c�cؓy��\n\Z>���7���t�wR�y�;��O����ek0��V�`2�W��LХ��g\n���Oȥ;�o�����K���F�zv�Z{8�̨Y4vd�x�������\'\r瘺��}�\n�\\�	��Zy�V�~.��j�}��:n����\0��E��E����:�1�=�m���0췝\0_(.zu��\ng᷍��{Kh\Z������&�aߢ���)�k7�~G]�_(\n�tR\ZM�<��u���NrK9�c����&)ۊ�bE�Z�4+2؊�\"+�ZŊH��\"���U�E����9\Z5O��?�\'\"���p���D�O�{E�����u��p�\r�\ZD�U�u\"\\)�Z��R.�B.�|V��D�E\"��0m�z\Z\"�C=�Ч~�3�}��#I���� �y�%��=���@����W�`�O�;;�u���w��`Bb�{f\"���`zu�kz���v��@ңy]R�Gv��@�GD�V�mk�1�פ�ll������\\=�F�n��/�S�W���Y�׉m�Y�^�r�� ��\r����e/\Z�|�F��W?���\rL3h�nLG���x���x}����܅�=���_�;O�����&���ң�׭�k��S��.����X�w[m��(y�M����s��CH��mG���F�힒���s�/v���ke�/����P��+g���yZ���u���Sϫާ��Ճ3�MK�U5MZ�<7yd���eAw̗��zwJ9Rv#���7�腢���hJ\Z�m��}z����Xb6b����{l0s-]]L_iq�g���oye���\"�K:�q�\\ {�T:�����w�c\\:ċ&v��\'\Z�V�����V��.���DǋJ��TưFWb�K%���r`�d������^*�X*�]*�nML��8,1�������1��!�JZ\"\rN�]\Z!�ӛ)eQ�4\\��⨝�I?��w\09Ñ3��rJ#H�썊�ct�+����R��KQx�^)\Z*�Ꮐb�߀/��\0;Jb�R,���놆���׷�\0o�@o����^�)=��=:�kR::L�JG�$\r�-�j S�����U�kC/����#&����PT��$���ޭ�]I��A�V�_�a�;t��9���!�GBZ�Ⓔ�O���>�ٹ}���>�%\r���/�Ov�����lWvrvbv|v��l{��M�%e�_L�e�Z\'	tb���-nRܥ�Po�Sr��A��,G�&?�$Q��>�$���M���$u��e���!iŁeO�{�ݵ �E֢���P���^N���	�˓덼.+})�ЯO�6��BX�Es�${��&)�`FBO~�m��y������Y0ٙ\\K����p�Z����\\E2��R(v���x`�׫%k� ӫ�j�a����kѥ@��ZW{���Ó�@r^Y�́��w�G\'J98�f�\0C�4`00p\0*�\0�l\r^~�2x.x6x:x2�i��_��������|+�\'�z�%�+�=��\Z���W���+�%��`\\�&q��󏰓!S�~R*Q��u��x���x��)FI�ڣCZ�C�~j��~;��@ӺH?N�z��YY4�����C:��3��C��JX���ѣ��榙T��<��<8�b#byy�]���kt��v��mw��v��mw��v��mw��v��mw��v��mw��v���ߖ?H�JDRW��H�����K��\"TY>�$]�B����E,��\\�)�hRɝc\'��-+�2g�~NZ%~������9����\r�z6��m���!����[�����i͵�om��h�? b�v�!z��\nendstream\nendobj\n22 0 obj\n8603\nendobj\n12 0 obj\n<</Type/FontDescriptor/FontName/NWVKVO+Helvetica/FontBBox[-174 -285 1001 953]/Flags 32\n/Ascent 953\n/CapHeight 741\n/Descent -285\n/ItalicAngle 0\n/StemV 104\n/MissingWidth 278\n/XHeight 539\n/CharSet(/space/comma/hyphen/period/zero/one/two/three/four/five/six/seven/eight/nine/A/B/C/D/E/F/G/I/J/M/N/P/Q/V/W/bracketleft/bracketright/a/c/e/f/g/h/i/l/m/n/o/r/s/t/u/v/x/y)\n/FontFile3 11 0 R>>\nendobj\n11 0 obj\n<</Subtype/Type1C/Filter/FlateDecode/Length 23 0 R>>stream\nx��Vy\\Y��RU\"bC,��DTT�ٛMP��Y0	�-���Wd��n(�v���Ү��۸�\'�DD����N�ox�n@ۙ�/�%��ֹ��|�9%�:Q\"��%qR�7�I�1Ju�Ҩ�V�o�\n�DB�NB1�5���� �C�o~�U�9Qս���jչX��	��:�)U���z��L\Z���7^WP�W���!�F��g��v��A����E�R�+�(�F>U���J>W�V�㓒3b�y���4>Z�U�j>�p�Z��ǫ��Z�r�����>[��QU:���g���@��\"Fʒle�}Ï/P�5*���y����+�Feo��*m��0�����i�|�^G�5d���3\r�zU��\'�#�:b4�+�v���u���]v�=�?��\n����%F��J>Ge(P+J�_rT�^�B�A����ݏ�+�����~��/�������@]�n�k�O�*�A���OTif\Z�T1��S�y�j��?n~����nE\rW��N�%�WF�&G��&D򣍪�آ8�\"�D3)h��|�_������FQ�T&�DEP�T?*�\n���(�?M\r�P�T5�\ZHM�b)o*����)j�K%P�T0�A%R#)�r����)Ճ�J�R�3Փ�F�P����N\r%�����ꂨ�(\\t��)��nq\'q�x����_�J�%c$�%/�\Z��W��\'3�)dև�Ξc��w�E��;�8vws������K�.�Tty�$q�wj����\0T�MB`�HЂ�{�u�4^k�H��7�i$��u����8<�\'h�8�a��ڝ���q�����$Ci��U�\Z9/��,y����V�a�慛�mG��޵�7�ںq��cPfu��,Ԣ*!�a~�+�}�\Zܥ?�#ڶ=�c����\\���ֱ�x��A����Kd�����\ng-	�X\'�ՉP�X��e���X�7�L��p��؁�?��Op��+��tY�tEb&>�������3�+���G��\ZY%Ba�E,仁B\0�\r,V\r����\r���$�k�X�!�;zf�0�\\�+j����w��z70�wѹ�G���:�.#Kv��!V*���£�������`ƦH����`.�0����;Kv�A�(�L=�X_�]<�<��sP��I�o�v+��ݸ~V^O���Y��B�f�T�8?��Mb�)�����8GX<al�a���W�r�.�b7�mBH�JH��������\'2���Ӫ��Zh���\"`��B]m�G�<j4o�\"�\"����BP�	�A�kuZR���~;\"�t��nĥ	\nZD����C\Z�K/�X����$%�BH����8H�\0}�\\,����oT�K��\nb�@P�H��yz����#��c�\"��\"�ᰗ}a 85�z)�1jJ^JGSw�N�[�o�y����͕�k�=|9Z�by{�f�=�w����!$ �b(� �	r|�ni��	�!��\'>8Ǐ���ΰ�ЗD���^�����U[j֬B+���2%�W�Alhִ0����{�)\r&�Cu�̰��\Z^���9(�/����<qt�)t��>�밗_hӴ�B/X�̋��cƤO*� �*3��W\0��FN�k���2!�l+o�Uf[8��I�%UK;T�.�v���v2���3G��ںs��+�FF\ZX^�x��^ihƬ�!�4��h�k��gb����~,�����1�C0�C�WGϐ�vi�Et����-��A�i��K���HUi�R�q��K��#��u��\r����=���n������v,v�.ic�Nl\'�%�����l6��^�\r�����+�)�\'��\\������\0���W7�\"�$�\n��e�>J�^<s�4��H\'����/\0>`\'=X��(w����\n�����7�������lh�����	�܊��?���}Fˁ�4rS��e�EH鑙93|�r��\"ټ�K6.=��+p�;�b�ǳ��Lӎ��)�5z�v;:�q���;�i\'��>7I%�l =R|�H�M�@:��?�޽pn�lǜJ=�e;��%�b�qS��d�`ӎ|g�����3����ˣ@_Lc7���c\\��S�e��k�P3ѿ�#���i��*Y+=��C#����Ɣ)����aw���_��ߗU�H���7>|��9�!,^#�WD�}O��ܬ�*���=f�w�V|�ؼ��借3Π\'I��芞�$C�.�㑶m\r��Ѫq�|F���C!���*\Z��K�	En¶��,çF�*�ސ	�H�7t3�7��Z:���]6�ij{O{%�t���6�+{\r�u!�\Z7��I����y!�,!޶�>�&�\'1l�ل\nω���A�̜�/թ��\"62�T����7v4��H���U&��ȩ��31���6��4۵��A,�p�[�|Z�X�w��\Z�}sc�s�e�����g����5!��1]���A�Escaǹ��f�Kԫ��h��V�ߪ��pE�:}��ڌ6��^C�#DsH�h�ިR��6�q����y�AnY��b�����z��j2��i<�ֆg\nm��4l$o\0_�:	;8���v�\\q\nv��\r�q%N�U�V\Z< �q��\r�>R�m�ؿ�҃�\'����~r�ڝ��12�f�a��v(\'�~)�a^���(JΔ�/)vD#V\Z��fO�g1οGt�m��	$�~4�i{�G/H�xY�!�~4$�~�!Xx\r_�^K�>�\"8o�S�p�B?�{\n�I�ylK��3p���z\Z�p�n`4A�	���N�X(�fp�Nt��M�O��gl���֫q���|C�yZ$F��P��6�h��S��~o?����q��y��=�)��v���֚D�bXEH��w$>�ּ�;_3A����\Z�z)�n�c�b\n��H�\"~ZTq��]��=_�r]M��޼9�҂��&)�+aܥ���ut<��h���\\cm��Ф�ѣ\\��dh��W��f{�� AJ��$\n{��2�}�_�$k��Q����RE�+���U2��|.\'�Kj���8����������j�>e��#0�\\Qs\\3� ?��7B/�3��ĎC��\'2�����y�ʤ�G�d\'���n��_���Ͼ2�L����{|zZTl�q�2Oܾs��#��=>�`��:28)u���\r\rW/YH��a1���0������SL)&�N��5�ŵ0�ی�\'Q@�Au���7NޭjB�!�R�Dq#�r�~��K/��X�{4�C��gv\\�I��K����#ewX�.���ף���H���|��?��bH%���3�Lv燛Ű� %is3��~�w�S,?�1��X��M��,�l�2�CZO�Afe\r�?�H��S����z�`a�z����[�5�Ž�������c��ʝ�kUg�L�����M��^���sQ�b���Q�L�����Y9Iz��i�ǳz���{�WW�iW-b�^M�:sr|�<`���z�`�Gu��GsT������>�R���C\'��N9�~	QMEJe��Y����!$�	z6��W.m���ǳ�{��臸�76�~\'��+�W�X���ȉD��SYa���o��e	+Xgc���\n��i�cc�ߜ�\Z�:u���q���\nendstream\nendobj\n23 0 obj\n3591\nendobj\n13 0 obj\n<</Subtype/Type1/BaseFont/NWVKVO+Helvetica/Type/Font/Name/R13/FontDescriptor 12 0 R/FirstChar 1/LastChar 255/Widths[ 333 333 333 278 500 500 167 333 556 222 584 333 333 611 500\n278 278 278 278 278 278 278 278 278 278 278 278 278 278 278 278\n278 278 355 556 556 889 667 191 333 333 389 584 278 333 278 278\n556 556 556 556 556 556 556 556 556 556 278 278 584 584 584 556\n1015 667 667 722 722 667 611 778 722 278 500 667 556 833 722 778\n667 778 722 667 611 722 667 944 667 667 611 278 278 278 469 556\n333 556 556 500 556 556 278 556 556 222 222 500 222 833 556 556\n556 556 333 500 278 556 500 722 500 500 500 334 260 334 584 278\n556 278 222 556 333 1000 556 556 333 1000 667 333 1000 278 278 278\n278 222 221 333 333 350 556 1000 333 1000 500 333 944 278 278 667\n278 333 556 556 556 556 260 556 333 737 370 556 584 278 737 333\n606 584 351 351 333 556 537 278 333 351 365 556 869 869 869 611\n667 667 667 667 667 667 1000 722 667 667 667 667 278 278 278 278\n722 722 778 778 778 778 778 584 778 722 722 722 722 666 666 611\n556 556 556 556 556 556 889 500 556 556 556 556 278 278 278 278\n556 556 556 556 556 556 556 584 611 556 556 556 556 500 555 500]\n>>\nendobj\n17 0 obj\n<</Subtype/TrueType/BaseFont/VPUJVO+TTD0t00/Type/Font/Name/R17/FontDescriptor 16 0 R/FirstChar 1/LastChar 1/Widths[ 216]\n>>\nendobj\n2 0 obj\n<</Producer(GNU Ghostscript 7.05)\n/Title(Labview Document)\n/Creator(PScript5.dll Version 5.2)\n/CreationDate(7/7/2015 15:15:5)\n/Author(QE)>>endobj\nxref\n0 24\n0000000000 65535 f \n0000006930 00000 n \n0000024397 00000 n \n0000006861 00000 n \n0000009941 00000 n \n0000009793 00000 n \n0000006978 00000 n \n0000006676 00000 n \n0000000015 00000 n \n0000006656 00000 n \n0000007066 00000 n \n0000019395 00000 n \n0000018996 00000 n \n0000023093 00000 n \n0000007544 00000 n \n0000010287 00000 n \n0000010088 00000 n \n0000024257 00000 n \n0000009215 00000 n \n0000009666 00000 n \n0000009696 00000 n \n0000009750 00000 n \n0000018975 00000 n \n0000023072 00000 n \ntrailer\n<< /Size 24 /Root 1 0 R /Info 2 0 R\n>>\nstartxref\n24551\n%%EOF\n',NULL,25110);
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
