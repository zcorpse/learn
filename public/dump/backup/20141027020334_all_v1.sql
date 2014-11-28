--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: localhost
-- 生成日期: 2014 年  10 月 27 日 02:03
-- MySQL版本: 5.5.34
-- PHP 版本: 5.4.22

--
-- 数据库: `hms_database`
--

-- -------------------------------------------------------

--
-- 表的结构hms_accepter
--

DROP TABLE IF EXISTS `hms_accepter`;
CREATE TABLE `hms_accepter` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned DEFAULT NULL,
  `pid` mediumint(8) unsigned DEFAULT NULL,
  `quarter` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_accepter
--

INSERT INTO `hms_accepter` VALUES('1','7','3','1');
INSERT INTO `hms_accepter` VALUES('2','8','7','2');
INSERT INTO `hms_accepter` VALUES('3','9','8','1');
INSERT INTO `hms_accepter` VALUES('4','10','9','1');
INSERT INTO `hms_accepter` VALUES('5','11','10','1');
INSERT INTO `hms_accepter` VALUES('6','12','11','1');
INSERT INTO `hms_accepter` VALUES('7','13','12','1');
INSERT INTO `hms_accepter` VALUES('8','14','7','1');
INSERT INTO `hms_accepter` VALUES('9','15','14','2');
INSERT INTO `hms_accepter` VALUES('10','16','15','1');
INSERT INTO `hms_accepter` VALUES('11','17','16','1');
INSERT INTO `hms_accepter` VALUES('12','18','17','1');
INSERT INTO `hms_accepter` VALUES('13','19','18','1');
INSERT INTO `hms_accepter` VALUES('14','20','14','1');
INSERT INTO `hms_accepter` VALUES('15','21','19','1');
INSERT INTO `hms_accepter` VALUES('16','22','21','1');
INSERT INTO `hms_accepter` VALUES('17','23','20','1');
INSERT INTO `hms_accepter` VALUES('18','24','23','1');
INSERT INTO `hms_accepter` VALUES('19','25','24','1');
INSERT INTO `hms_accepter` VALUES('20','26','25','1');
INSERT INTO `hms_accepter` VALUES('21','27','25','2');
INSERT INTO `hms_accepter` VALUES('22','28','27','2');
INSERT INTO `hms_accepter` VALUES('23','29','27','1');
INSERT INTO `hms_accepter` VALUES('24','30','29','1');
INSERT INTO `hms_accepter` VALUES('25','31','26','1');
INSERT INTO `hms_accepter` VALUES('26','32','31','1');
INSERT INTO `hms_accepter` VALUES('27','33','32','1');
INSERT INTO `hms_accepter` VALUES('28','34','31','2');
INSERT INTO `hms_accepter` VALUES('29','35','20','2');
INSERT INTO `hms_accepter` VALUES('30','36','35','1');
INSERT INTO `hms_accepter` VALUES('31','37','36','1');
INSERT INTO `hms_accepter` VALUES('32','38','37','1');
INSERT INTO `hms_accepter` VALUES('33','39','38','1');
INSERT INTO `hms_accepter` VALUES('34','40','39','1');
INSERT INTO `hms_accepter` VALUES('35','41','40','1');
INSERT INTO `hms_accepter` VALUES('36','42','41','1');
INSERT INTO `hms_accepter` VALUES('37','43','42','1');
INSERT INTO `hms_accepter` VALUES('38','44','36','2');
INSERT INTO `hms_accepter` VALUES('39','45','44','1');
INSERT INTO `hms_accepter` VALUES('40','46','45','1');
INSERT INTO `hms_accepter` VALUES('41','47','46','1');
INSERT INTO `hms_accepter` VALUES('42','48','47','1');
INSERT INTO `hms_accepter` VALUES('43','49','47','2');
INSERT INTO `hms_accepter` VALUES('44','50','49','1');
INSERT INTO `hms_accepter` VALUES('45','51','48','1');
INSERT INTO `hms_accepter` VALUES('46','52','51','1');
INSERT INTO `hms_accepter` VALUES('47','53','52','1');
INSERT INTO `hms_accepter` VALUES('48','54','53','1');
INSERT INTO `hms_accepter` VALUES('49','55','54','1');
--
-- 表的结构hms_account
--

DROP TABLE IF EXISTS `hms_account`;
CREATE TABLE `hms_account` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned DEFAULT NULL,
  `type` tinyint(2) unsigned DEFAULT NULL COMMENT '账户类型',
  `date` int(10) unsigned DEFAULT NULL COMMENT '开户日期',
  `balance` float DEFAULT NULL COMMENT '余额',
  `status` tinyint(2) unsigned DEFAULT '0' COMMENT '账户状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_account
--

INSERT INTO `hms_account` VALUES('1','1','1','1411862400','470000','1');
INSERT INTO `hms_account` VALUES('2','2','1','1413636361','0','1');
INSERT INTO `hms_account` VALUES('3','3','1','1413636387','0','1');
INSERT INTO `hms_account` VALUES('4','4','1','1413636423','0','1');
INSERT INTO `hms_account` VALUES('5','5','1','1413636449','0','1');
INSERT INTO `hms_account` VALUES('6','6','1','1413636475','0','1');
INSERT INTO `hms_account` VALUES('7','7','1','1413636577','0','1');
INSERT INTO `hms_account` VALUES('8','8','1','1413636640','0','1');
INSERT INTO `hms_account` VALUES('9','9','1','1413636690','0','1');
INSERT INTO `hms_account` VALUES('10','10','1','1413636741','0','1');
INSERT INTO `hms_account` VALUES('11','11','1','1413636776','0','1');
INSERT INTO `hms_account` VALUES('12','12','1','1413636808','0','1');
INSERT INTO `hms_account` VALUES('13','13','1','1413636855','0','1');
INSERT INTO `hms_account` VALUES('14','14','1','1413636895','0','1');
INSERT INTO `hms_account` VALUES('15','15','1','1413636932','0','1');
INSERT INTO `hms_account` VALUES('16','16','1','1413636964','0','1');
INSERT INTO `hms_account` VALUES('17','17','1','1413637004','0','1');
INSERT INTO `hms_account` VALUES('18','18','1','1413637037','0','1');
INSERT INTO `hms_account` VALUES('19','19','1','1413637074','0','1');
INSERT INTO `hms_account` VALUES('20','20','1','1413637100','0','1');
INSERT INTO `hms_account` VALUES('21','21','1','1413637151','0','1');
INSERT INTO `hms_account` VALUES('22','22','1','1413637181','0','1');
INSERT INTO `hms_account` VALUES('23','23','1','1413791641','0','1');
INSERT INTO `hms_account` VALUES('24','24','1','1413791708','0','1');
INSERT INTO `hms_account` VALUES('25','25','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('26','26','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('27','27','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('28','28','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('29','29','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('30','30','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('31','31','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('32','32','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('33','33','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('34','34','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('35','35','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('36','36','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('37','37','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('38','38','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('39','39','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('40','40','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('41','41','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('42','42','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('43','43','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('44','44','1','1413734400','0','1');
INSERT INTO `hms_account` VALUES('45','45','1','1413734400','0','1');
INSERT INTO `hms_account` VALUES('46','46','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('47','47','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('48','48','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('49','49','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('50','50','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('51','51','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('52','52','1','1413734400','0','1');
INSERT INTO `hms_account` VALUES('53','53','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('54','54','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('55','55','1','1413561600','0','1');
INSERT INTO `hms_account` VALUES('59','59','1','1413907200','0','1');
--
-- 表的结构hms_configure
--

DROP TABLE IF EXISTS `hms_configure`;
CREATE TABLE `hms_configure` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `key` char(16) DEFAULT NULL,
  `value` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_configure
--

INSERT INTO `hms_configure` VALUES('1','sysdate','1412006400');
--
-- 表的结构hms_menu
--

DROP TABLE IF EXISTS `hms_menu`;
CREATE TABLE `hms_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `flag` tinyint(1) unsigned DEFAULT NULL,
  `name` char(16) DEFAULT NULL,
  `parent` tinyint(2) unsigned DEFAULT NULL,
  `prefix` char(8) DEFAULT NULL,
  `controller` char(16) DEFAULT NULL,
  `action` char(16) DEFAULT NULL,
  `icon` char(24) DEFAULT NULL,
  `order` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_menu
--

INSERT INTO `hms_menu` VALUES('1','0','产品订购','0','user','order','','fa-credit-card','1');
INSERT INTO `hms_menu` VALUES('2','0','产品列表','1','user','order','item','','1');
INSERT INTO `hms_menu` VALUES('3','0','购物车','1','user','order','cart','','2');
INSERT INTO `hms_menu` VALUES('4','0','我的订单','1','user','order','bought','','3');
INSERT INTO `hms_menu` VALUES('5','0','业绩管理','0','user','market','','fa-bar-chart','2');
INSERT INTO `hms_menu` VALUES('6','0','业绩查看','5','user','market','view','','1');
INSERT INTO `hms_menu` VALUES('7','0','我的推荐','5','user','market','referee','','2');
INSERT INTO `hms_menu` VALUES('8','0','个人账户','0','user','finance','','fa-tags','3');
INSERT INTO `hms_menu` VALUES('9','0','账户余额','8','user','finance','balance','','1');
INSERT INTO `hms_menu` VALUES('10','0','交易明细','8','user','finance','detail','','2');
INSERT INTO `hms_menu` VALUES('11','0','内部转账','8','user','finance','transfer','','3');
INSERT INTO `hms_menu` VALUES('12','1','区域管理','0','ho','branch','','fa-list-ul','1');
INSERT INTO `hms_menu` VALUES('13','1','分公司一览','12','ho','branch','list','','1');
INSERT INTO `hms_menu` VALUES('14','1','新设分公司','12','ho','branch','new','','2');
INSERT INTO `hms_menu` VALUES('15','1','分公司业绩','12','ho','branch','extra','','2');
INSERT INTO `hms_menu` VALUES('16','1','人员结构','0','ho','member','','fa-external-link','2');
INSERT INTO `hms_menu` VALUES('17','1','股东/会员查询','16','ho','member','query','','1');
INSERT INTO `hms_menu` VALUES('18','1','人员区域调整','16','ho','member','adjust','','2');
INSERT INTO `hms_menu` VALUES('19','1','产品管理','0','ho','product','','fa-credit-card','3');
INSERT INTO `hms_menu` VALUES('20','1','新增产品','19','ho','product','add','','1');
INSERT INTO `hms_menu` VALUES('21','1','产品列表','19','ho','product','item','','2');
INSERT INTO `hms_menu` VALUES('22','1','订单管理','0','ho','indent','','fa-calendar-o','4');
INSERT INTO `hms_menu` VALUES('23','1','快递订单','22','ho','indent','express','','1');
INSERT INTO `hms_menu` VALUES('24','1','家庭超市订单','22','ho','indent','shop','','2');
INSERT INTO `hms_menu` VALUES('25','1','首单调整','22','ho','indent','first','','3');
INSERT INTO `hms_menu` VALUES('26','1','帐务处理','0','ho','business','','fa-bar-chart','5');
INSERT INTO `hms_menu` VALUES('27','1','内部转账','26','ho','business','transfer','','1');
INSERT INTO `hms_menu` VALUES('28','1','余额补充','26','ho','business','reserve','','3');
INSERT INTO `hms_menu` VALUES('29','1','帐务记录','26','ho','business','statement','','4');
INSERT INTO `hms_menu` VALUES('30','2','账户管理','0','bo','account','','fa-check-square-o','1');
INSERT INTO `hms_menu` VALUES('31','2','账户开户','30','bo','account','register','','1');
INSERT INTO `hms_menu` VALUES('32','2','激活账户','30','bo','account','active','','2');
INSERT INTO `hms_menu` VALUES('33','2','账户充值','30','bo','account','charge','','3');
INSERT INTO `hms_menu` VALUES('34','2','用户查询','30','bo','account','search','','4');
INSERT INTO `hms_menu` VALUES('35','2','家庭超市','0','bo','shop','','fa-ticket','2');
INSERT INTO `hms_menu` VALUES('36','2','新增家庭超市','35','bo','shop','new','','1');
INSERT INTO `hms_menu` VALUES('37','2','查看家庭超市','35','bo','shop','list','','2');
INSERT INTO `hms_menu` VALUES('38','2','超市订单','35','bo','shop','order','','3');
INSERT INTO `hms_menu` VALUES('39','2','账务结算','0','bo','settle','','fa-ils','3');
INSERT INTO `hms_menu` VALUES('40','2','流水查询','39','bo','settle','search','','1');
INSERT INTO `hms_menu` VALUES('41','2','超市结算','39','bo','settle','shop','','2');
INSERT INTO `hms_menu` VALUES('42','2','区域结算','39','bo','settle','regionsearch','','3');
INSERT INTO `hms_menu` VALUES('43','2','数据报表','0','bo','report','','fa-bar-chart','4');
INSERT INTO `hms_menu` VALUES('44','2','账户统计','43','bo','report','account','','1');
INSERT INTO `hms_menu` VALUES('45','2','结算统计','43','bo','report','record','','2');
--
-- 表的结构hms_order
--

DROP TABLE IF EXISTS `hms_order`;
CREATE TABLE `hms_order` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned DEFAULT NULL,
  `amount` float unsigned DEFAULT '0',
  `serial` char(32) DEFAULT NULL COMMENT '订单编号',
  `date` int(10) unsigned DEFAULT NULL,
  `status` int(2) unsigned DEFAULT NULL,
  `type` tinyint(1) unsigned DEFAULT NULL,
  `invoice` int(2) unsigned DEFAULT NULL COMMENT '发货方式',
  `ticket` char(32) DEFAULT NULL COMMENT '运单号',
  `express` char(32) DEFAULT NULL COMMENT '快递公司',
  `shopid` mediumint(8) unsigned DEFAULT NULL,
  `name` char(32) DEFAULT NULL,
  `mobile` char(24) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` char(16) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_order
--

--
-- 表的结构hms_orderitem
--

DROP TABLE IF EXISTS `hms_orderitem`;
CREATE TABLE `hms_orderitem` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned DEFAULT NULL,
  `orderid` mediumint(8) unsigned DEFAULT NULL,
  `productid` mediumint(8) unsigned DEFAULT NULL,
  `code` char(32) DEFAULT NULL,
  `name` char(64) DEFAULT NULL,
  `type` char(16) DEFAULT NULL,
  `category` char(16) DEFAULT NULL,
  `price1` float DEFAULT NULL,
  `price2` float DEFAULT NULL,
  `specs` char(64) DEFAULT NULL,
  `memo` text,
  `image` char(64) DEFAULT NULL,
  `number` mediumint(8) unsigned DEFAULT NULL,
  `total` float DEFAULT NULL,
  `status` int(2) unsigned DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_orderitem
--

--
-- 表的结构hms_param
--

DROP TABLE IF EXISTS `hms_param`;
CREATE TABLE `hms_param` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(16) DEFAULT NULL,
  `key` char(16) DEFAULT NULL,
  `value` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_param
--

INSERT INTO `hms_param` VALUES('1','product_type','1','黑茶');
INSERT INTO `hms_param` VALUES('2','product_type','2','红酒');
INSERT INTO `hms_param` VALUES('3','product_category','1','合力产品');
INSERT INTO `hms_param` VALUES('4','product_category','2','海济产品');
INSERT INTO `hms_param` VALUES('5','product_type','3','白酒');
--
-- 表的结构hms_product
--

DROP TABLE IF EXISTS `hms_product`;
CREATE TABLE `hms_product` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(32) DEFAULT NULL,
  `name` char(64) DEFAULT NULL,
  `type` char(16) DEFAULT NULL,
  `category` char(16) DEFAULT NULL,
  `price1` float DEFAULT NULL,
  `price2` float DEFAULT NULL,
  `specs` char(64) DEFAULT NULL,
  `status` tinyint(2) unsigned DEFAULT NULL,
  `badge` int(2) unsigned DEFAULT NULL,
  `image` char(64) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_product
--

INSERT INTO `hms_product` VALUES('1','ST001','黑金9999','1','1','19999','14999','500g牙尖','1','1','','精包装');
INSERT INTO `hms_product` VALUES('2','ST002','冰牙尖','1','1','5999','4499','150g牙尖','1','1','','精包装');
INSERT INTO `hms_product` VALUES('3','ST003','黑金1595','1','1','1999','1499','1595g天尖黑砖','1','2','','精包装');
INSERT INTO `hms_product` VALUES('4','ST004','天尖薄片','1','1','1599','1199','144片/盒','1','0','','精包装');
INSERT INTO `hms_product` VALUES('5','ST005','天尖薄片','1','1','999','749','100片/盒','1','0','','精包装');
INSERT INTO `hms_product` VALUES('6','ST006','天尖薄片','1','1','599','449','42片/盒','1','3','','精包装');
INSERT INTO `hms_product` VALUES('7','ST007','天尖薄片','1','1','499','374','50片/盒','1','0','','精包装');
INSERT INTO `hms_product` VALUES('8','ST008','天尖薄片','1','1','299','224','20片/盒','1','0','','精包装');
INSERT INTO `hms_product` VALUES('9','ST009','天尖薄片','1','1','129','96','12片/盒','1','1','','普包');
INSERT INTO `hms_product` VALUES('10','ST010','天尖薄片','1','1','49','36','4片/盒','1','0','','普包');
INSERT INTO `hms_product` VALUES('11','ST011','天尖薄片','1','1','20','15','6g/盒','1','0','','普包');
INSERT INTO `hms_product` VALUES('12','ST012','贡尖薄片','1','1','599','449','100片/盒','1','0','','精包装');
INSERT INTO `hms_product` VALUES('13','ST013','贡尖薄片','1','1','299','224','50片/盒','1','0','','精包装');
INSERT INTO `hms_product` VALUES('14','ST014','贡尖薄片','1','1','39','29','6片/盒','1','0','','普包');
INSERT INTO `hms_product` VALUES('15','ST015','贡尖薄片','1','1','10','7.5','6g/盒','1','2','','普包');
INSERT INTO `hms_product` VALUES('16','ST016','金钱福饼','1','1','399','299','500g黑砖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('17','ST017','金钱福饼','1','1','499','374','1000g黑砖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('18','ST018','长寿月饼','1','1','399','299','500g黑砖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('19','ST019','长寿月饼','1','1','499','374','1000g黑砖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('20','ST020','黑金福箱','1','1','299','224','800g茯砖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('21','ST021','黑金福箱','1','1','399','299','1500g茯砖','1','1','','精包装');
INSERT INTO `hms_product` VALUES('22','ST022','黑金福篮','1','1','999','749','1000g天尖','1','2','','精包装');
INSERT INTO `hms_product` VALUES('23','ST023','黑金立方','1','1','299','224','200g高山天尖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('24','ST024','黑金立方','1','1','199','149','120g高山天尖','1','0','','精包装');
INSERT INTO `hms_product` VALUES('25','ST025','福满堂','1','1','199','149','200g','1','0','','精包装');
INSERT INTO `hms_product` VALUES('26','ST026','金福饼','1','1','99','74','100g','1','0','','精包装');
INSERT INTO `hms_product` VALUES('27','ST027','高山原叶茯砖','1','1','299','224','800g','1','0','','普包');
INSERT INTO `hms_product` VALUES('28','ST028','黑金竹简','1','1','599','449','2支16两','1','0','','精包装');
INSERT INTO `hms_product` VALUES('29','ST029','黑金千两茶','1','1','5999','4499','花卷','1','0','','精包装');
INSERT INTO `hms_product` VALUES('30','ST030','黑金五百两茶','1','1','3280','2460','花卷','1','0','','精包装');
INSERT INTO `hms_product` VALUES('31','ST031','黑金百两茶','1','1','599','449','花卷','1','0','','精包装');
INSERT INTO `hms_product` VALUES('32','ST032','陈年黑砖','1','1','1280','960','03年*1800g','1','0','','普包');
INSERT INTO `hms_product` VALUES('33','ST033','陈年青砖','1','1','1680','1260','02年*1500g','1','0','','普包');
INSERT INTO `hms_product` VALUES('34','ST034','冰岩茶具','1','1','1199','899','四个杯','1','0','','精包装');
INSERT INTO `hms_product` VALUES('35','ST035','冰岩茶具','1','1','5999','4499','一壶两杯','1','0','','精包装');
INSERT INTO `hms_product` VALUES('36','ST036','茶针','1','1','59','44','一支','1','3','','普包');
INSERT INTO `hms_product` VALUES('37','ST901','塞拉尔·干红','2','1','189','123','1×6×750ml,12°','1','0','','纸盒');
INSERT INTO `hms_product` VALUES('38','ST902','大木盒干红','2','1','168','109','1×6×750ml,12°','1','0','','木盒');
INSERT INTO `hms_product` VALUES('39','ST903','塞拉尔·美乐','2','1','239','155','1×6×750ml,13°','1','2','','纸盒');
INSERT INTO `hms_product` VALUES('40','ST904','塞拉尔·赤霞珠','2','1','299','194','1×6×750ml,13°','1','1','','木盒');
INSERT INTO `hms_product` VALUES('41','ST905','塞拉尔·莎当妮干白','2','1','439','285','1×6×750ml,12.5°','1','0','','纸盒');
INSERT INTO `hms_product` VALUES('42','ST906','塞拉尔·波尔多','2','1','689','448','1×6×750ml,12.5°','1','1','','皮盒');
INSERT INTO `hms_product` VALUES('43','ST907','卡斯特·酒庄','2','1','2980','1937','1×6×750ml,13°','1','0','','皮盒');
INSERT INTO `hms_product` VALUES('44','ST501','五龙朝圣','3','1','2180','1526','1×4×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('45','ST502','锦绣河山(红瓶)','3','1','398','278','1×6×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('46','ST503','锦绣河山(绿瓶)','3','1','380','266','1×6×500ml,52°','1','3','','');
INSERT INTO `hms_product` VALUES('47','ST504','五福临门','3','1','298','208','1×6×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('48','ST505','百福具','3','1','280','196','1×6×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('49','ST506','一代天骄','3','1','198','126','1×6×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('50','ST507','窖藏','3','1','180','126','1×12×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('51','ST508','珍藏','3','1','158','110','1×12×500ml,52°','1','0','','');
INSERT INTO `hms_product` VALUES('52','ST509','风华正茂','3','1','88','61','1×6×500ml,52°','1','0','','');
--
-- 表的结构hms_record
--

DROP TABLE IF EXISTS `hms_record`;
CREATE TABLE `hms_record` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned DEFAULT NULL,
  `bid` mediumint(8) unsigned DEFAULT NULL COMMENT '被结算用户',
  `flag` tinyint(2) DEFAULT NULL COMMENT '借贷标志',
  `type` tinyint(2) unsigned DEFAULT NULL COMMENT '流水类型',
  `cost` float DEFAULT NULL COMMENT '结算基准',
  `rate` float DEFAULT NULL COMMENT '利率',
  `amount` float DEFAULT NULL COMMENT '发生额',
  `status` int(2) unsigned DEFAULT NULL COMMENT '流水状态',
  `date` int(10) unsigned DEFAULT NULL COMMENT '流水日期',
  `sdate` int(10) unsigned DEFAULT NULL COMMENT '结算日期',
  `balance` float DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_record
--

--
-- 表的结构hms_referee
--

DROP TABLE IF EXISTS `hms_referee`;
CREATE TABLE `hms_referee` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned DEFAULT NULL,
  `pid` mediumint(8) unsigned DEFAULT NULL,
  `quarter` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_referee
--

INSERT INTO `hms_referee` VALUES('1','7','3','1');
INSERT INTO `hms_referee` VALUES('2','8','7','1');
INSERT INTO `hms_referee` VALUES('3','9','7','1');
INSERT INTO `hms_referee` VALUES('4','10','7','1');
INSERT INTO `hms_referee` VALUES('5','11','7','1');
INSERT INTO `hms_referee` VALUES('6','12','7','1');
INSERT INTO `hms_referee` VALUES('7','13','7','1');
INSERT INTO `hms_referee` VALUES('8','14','7','1');
INSERT INTO `hms_referee` VALUES('9','15','14','1');
INSERT INTO `hms_referee` VALUES('10','16','14','1');
INSERT INTO `hms_referee` VALUES('11','17','14','1');
INSERT INTO `hms_referee` VALUES('12','18','14','1');
INSERT INTO `hms_referee` VALUES('13','19','18','1');
INSERT INTO `hms_referee` VALUES('14','20','14','1');
INSERT INTO `hms_referee` VALUES('15','21','18','1');
INSERT INTO `hms_referee` VALUES('16','22','18','1');
INSERT INTO `hms_referee` VALUES('17','23','20','1');
INSERT INTO `hms_referee` VALUES('18','24','23','1');
INSERT INTO `hms_referee` VALUES('19','25','23','1');
INSERT INTO `hms_referee` VALUES('20','26','20','1');
INSERT INTO `hms_referee` VALUES('21','27','20','1');
INSERT INTO `hms_referee` VALUES('22','28','27','1');
INSERT INTO `hms_referee` VALUES('23','29','27','1');
INSERT INTO `hms_referee` VALUES('24','30','23','1');
INSERT INTO `hms_referee` VALUES('25','31','23','1');
INSERT INTO `hms_referee` VALUES('26','32','31','1');
INSERT INTO `hms_referee` VALUES('27','33','31','1');
INSERT INTO `hms_referee` VALUES('28','34','31','1');
INSERT INTO `hms_referee` VALUES('29','35','20','1');
INSERT INTO `hms_referee` VALUES('30','36','35','1');
INSERT INTO `hms_referee` VALUES('31','37','36','1');
INSERT INTO `hms_referee` VALUES('32','38','20','1');
INSERT INTO `hms_referee` VALUES('33','39','20','1');
INSERT INTO `hms_referee` VALUES('34','40','35','1');
INSERT INTO `hms_referee` VALUES('35','41','40','1');
INSERT INTO `hms_referee` VALUES('36','42','36','1');
INSERT INTO `hms_referee` VALUES('37','43','37','1');
INSERT INTO `hms_referee` VALUES('38','44','36','1');
INSERT INTO `hms_referee` VALUES('39','45','36','1');
INSERT INTO `hms_referee` VALUES('40','46','44','1');
INSERT INTO `hms_referee` VALUES('41','47','36','1');
INSERT INTO `hms_referee` VALUES('42','48','47','1');
INSERT INTO `hms_referee` VALUES('43','49','47','1');
INSERT INTO `hms_referee` VALUES('44','50','47','1');
INSERT INTO `hms_referee` VALUES('45','51','47','1');
INSERT INTO `hms_referee` VALUES('46','52','36','1');
INSERT INTO `hms_referee` VALUES('47','53','36','1');
INSERT INTO `hms_referee` VALUES('48','54','53','1');
INSERT INTO `hms_referee` VALUES('49','55','52','1');
--
-- 表的结构hms_user
--

DROP TABLE IF EXISTS `hms_user`;
CREATE TABLE `hms_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `login` char(32) DEFAULT NULL,
  `name` char(32) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  `password2` char(255) DEFAULT NULL,
  `passwordsalt` char(128) DEFAULT NULL,
  `mobile` char(24) DEFAULT NULL,
  `email` char(64) DEFAULT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `flag` tinyint(1) unsigned DEFAULT '0' COMMENT '0:用户/1:总公司/2:分公司',
  `region` mediumint(8) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `first` tinyint(1) unsigned DEFAULT '0',
  `province` char(32) DEFAULT NULL,
  `city` char(32) DEFAULT NULL,
  `county` char(32) DEFAULT NULL,
  `idcard` char(32) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` char(16) DEFAULT NULL,
  `date` int(10) unsigned DEFAULT NULL,
  `code` char(8) DEFAULT NULL COMMENT '个人邀请码',
  `memo` text,
  `remember_token` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 hms_user
--

INSERT INTO `hms_user` VALUES('1','admin','总公司','$2y$10$zDsIUuavA0p0gnC/itAofOI0FELGlBo0qR62VlPP0C0VeG2FgJONu','$2y$10$e6.kFiIRW3DqNu5R/8ZA9OejEZYFy/o4URZVOUDgjshQPtXB9pdp2','','','','1','1','1','','1','0','','','','','','','','','','HGDJ9ZS0Xs93raLf6TEUrttUxS8bt84dIxEAYuevJUv6TS98TxBYsVKv6y8R');
INSERT INTO `hms_user` VALUES('2','frq','芙蓉区','$2y$10$DyUNbGppg0KLVI.kOuAMOeeTRTFMXiI.F.TjypRykfwn4IpiZfYLS','$2y$10$0OIvdSlTBMJfkhWXrJJscO20XYzkSr.GU8H882gVzXTmgE7P5T0W2','','15116206836','','1','1','2','1','1','0','湖南省','长沙市','芙蓉区','','','','1413636361','475512','','aHscaaObR0frzNO1jC0nXnlqCZ7TbWsvJbfOH5ZoKLLLBeFofgNarhnDBwvV');
INSERT INTO `hms_user` VALUES('3','yhq','雨花区','$2y$10$LI8WOmjwg0ZOLQbBDBfdxeGAewBUUOtAuPefkkRLN2BUAEss7MYxC','$2y$10$TIY8e8aeAUClzxBW4UqJiuZZ2ozzzCbh4KIr88xkmE3Px4iHd6vHi','','15116206836','','1','1','2','1','1','0','湖南省','长沙市','雨花区','','','','1413636387','829080','','CIod3o0GmUxcTvr4ios42nO1X8eH8gLYUOJWN0YqO3eMyMthY4bihj6qnqkG');
INSERT INTO `hms_user` VALUES('4','kfq','开福区','$2y$10$pHbDnQ4gI3qFcihr.PGvZOX7OQKFojbg6/r49SvV5e3l.NNpyV2li','$2y$10$WN7gM4VgzaQHg5/FUjHEqOnj9uoJQnKXgHu8syAlh8aR9PVz643q.','','15116206836','','1','1','2','1','1','0','湖南省','长沙市','开福区','','','','1413636423','307449','','');
INSERT INTO `hms_user` VALUES('5','txq','天心区','$2y$10$EVJ4EYqSFlU2Dg3GFKNkZ.3agn5Ob8X9TrUQNGcauryosE715D/ca','$2y$10$ZLT4NjvKyw2rQeeuiKcUDuKmuZoQBesIaeKGU2c/su0Qsp/q7st2.','','15116206836','','1','1','2','1','1','0','湖南省','长沙市','天心区','','','','1413636449','582244','','');
INSERT INTO `hms_user` VALUES('6','ylq','岳麓区','$2y$10$/WjVsu7EISe0P41CrbCU4ep4Kja5WFmzM34u5iwiUS4VCsVYNFGQ6','$2y$10$3pDkKOGgm.vOBURxuEaJc.mjreJEUrkLotIHdBJfm8fmgJvSG2hN.','','15116206836','','1','1','2','1','1','0','湖南省','长沙市','岳麓区','','','','1413636475','199481','','');
INSERT INTO `hms_user` VALUES('7','hlldw','李德文','$2y$10$AiPNGNcnj5OxdY.tM62yZOG1FGXE4S8lO8k4fOskbmJom9BOd2lOu','$2y$10$iyX6P26JiMdArOaKnqmNtO/dCBDvl.mTUtF5pf8bduueolQ8zCrze','','15116206836','','1','1','0','3','1','0','','','','','430203197306223015','','1413636577','623141','','sKaASQp2OCUwyqdh9ielx8Br4Zy0uZtkCQ2lWAp3V2OG1zRzjYvfsbrUioom');
INSERT INTO `hms_user` VALUES('8','hlczf','陈紫飞','$2y$10$wGkmt2OYRWiVLDL/4.kd7uldKvq87Clbi83NSKuzLSbLYUdo.BMxu','$2y$10$EH5g8L15VCEtNXJ0N8kZpORQmqY/7NTTGXRhEDAZ669.fsujmBXbi','','15116206836','','2','1','0','3','1','0','','','','','','','1413636640','269381','','');
INSERT INTO `hms_user` VALUES('9','hlhxy','黄小毅','$2y$10$RhbmGXVJvTart4MjwT1nTOpKkQr74XwkDCt1sghD627wrm.LnNd7C','$2y$10$KGeJI6wo3hmtRSrIRzE6KeyED6GMkk7ChuasS6s1subz9GB1akTfq','','15116206836','','1','1','0','3','1','0','','','','','','','1413636690','550549','','');
INSERT INTO `hms_user` VALUES('10','hldll','邓玲玲','$2y$10$SSuwP36/QceMLdlDjYyRPeNjas8xn.j2Mcbsv7ZaD3rcVyRFVF.Oi','$2y$10$DWYFGZLxZzqJd3Hv0gqMAOMeC1RRkXgAwmVGQZ5vqi5Xlh0ooVWLK','','18711135909','','1','1','0','3','1','0','','','','','','','1413636741','217691','','');
INSERT INTO `hms_user` VALUES('11','hlxj','熊健','$2y$10$HPHQ1ZVr8T0S.GbmqR/3NuPAPLOmezLWPPBnXTW0XSPHqjtGhIdLS','$2y$10$eslAlq5w0fAn4G2vgFjumOpLTg5UMrDwoitiZ3LYiOUFjBBSt4Au2','','15973115457','','1','1','0','3','1','0','','','','','','','1413636776','915734','','');
INSERT INTO `hms_user` VALUES('12','hllh','刘慧','$2y$10$RKuwpIqZHxGShcDU2YLXJuiXMmEBFFYVjnnKyAeKgwZtDCQWAEGNe','$2y$10$ZEHP7h.qElit4KVojuYGD.gxXMRWwpz3S2bvaEeYxiPiQIGqBESSG','','15974236566','','1','1','0','3','1','0','','','','','','','1413636808','822076','','');
INSERT INTO `hms_user` VALUES('13','hlxyf','熊裕丰','$2y$10$52puNsFncbhVne1iBtNBXORIoGhA4gJDAjiEKCjuaZNjcyWZfIQIa','$2y$10$V4twQgpNMi.AtxF9qNvI8empsmf7jUJrvr8WXUU6aFBpE6xfT//2S','','15874992499','','1','1','0','3','1','0','','','','','','','1413636855','367269','','');
INSERT INTO `hms_user` VALUES('14','hlzll','朱林林','$2y$10$GDOrDFAeh29AnQu5o/DyEOar6XC6x76vfZXP9FIVH8Hi87BXISNA2','$2y$10$ObpeUrQn3VZJMbnWr5eEaucGAyHvqLEUbYcTjpTk.oNhrMArpeUH6','','13637424262','','1','1','0','3','1','0','','','','','','','1413636895','647915','','ECaaPPGfpTTz93BaoVSh7LlwuW1yHVpiAhwOAk547MaWfOEyhVTAzngZvMRw');
INSERT INTO `hms_user` VALUES('15','hlxhs','肖宏愫','$2y$10$qdDqJkvLh61msn3tbwb/gemdLJSUm.ua6mnE6.iV66HxkA8Q7Xyzu','$2y$10$9Kr6t.cc/93ZNzATUZF2SuRGEgRHhJhdrU9PVzrkaPRoxKbe92aie','','13649800496','','1','1','0','3','1','0','','','','','','','1413636932','616796','','');
INSERT INTO `hms_user` VALUES('16','hlhyg','何永刚','$2y$10$fL3B15TbkYgdJxOu8q37x.5rDLVmc4d4LdyfTir1bBGIaOofgmYqq','$2y$10$a98w8ffA5OCGlrzWGPeKhuIzPT2Sj6I3ChKV7hVKXncvFo/O62mai','','13423202862','','1','1','0','3','1','0','','','','','','','1413636964','241558','','');
INSERT INTO `hms_user` VALUES('17','hlfst','冯胜涛','$2y$10$yBKnZtbMUSAn7JOsLYi2...80XIK7cavlvM1GcGpMGdNqhQw3T0Xm','$2y$10$aYisiCbcuwwbfVXUU3rZMOdIziWZ0ltCXxCmb2F5WqW3jGChmybKu','','13686234850','','1','1','0','3','1','0','','','','','','','1413637004','969924','','');
INSERT INTO `hms_user` VALUES('18','hlyj','颜进','$2y$10$rJbwrAH540tSGaPpyxsz6Ohf5AjICvrcqD1hvpL0YaeSocblrMBdy','$2y$10$4voyPIt0jxuld5NstnW3..metWUZ/nhZLOvxgY81pw/2JCwLVj7eK','','13973164401','','1','1','0','3','1','0','','','','','','','1413637037','315853','','bAvECGDv1Om7kUdbf3I4sPF2hfia1bsIfTFeZ4tLxSrAYga11LTyeDBHCX2d');
INSERT INTO `hms_user` VALUES('19','hlwwy','吴文永','$2y$10$j2897xx16aEWp8c53QnaEeLtM5SAWJQTFhCwe9z9RupYvJpo4Pr8e','$2y$10$.q1lctrHjVJvHJAmh3BuVuiJqeoA9MBQnXn2fUPCnFe4YOkag6NxW','','13787223897','','1','1','0','3','1','0','','','','','','','1413637074','521820','','');
INSERT INTO `hms_user` VALUES('20','hldzy','杜志勇','$2y$10$3tIyp38hKjr96wZ8kzrFSONO4vydi5FN6FHxb.2oEXf2fwbvw5Q4G','$2y$10$EyRyGOw2zcmTUgaoM3OEK.6LTRaD987pBwdLKPAp2J8grNBkYK.wu','','13786143829','','1','1','0','3','1','0','','','','','','','1413637100','637451','','3ccTZJSRiGRSbwLJOSDuyRVEPuDQxD8ie2NXmjYAWkPt2glOc01joqkcBVeC');
INSERT INTO `hms_user` VALUES('21','hlxh','许华','$2y$10$Dk9aBxlEG5lJ4/5r3ZQVh.5Ek8Zgmi.SyMM1f2dgTaZuoRJLJRine','$2y$10$ThRRP2OxuGJ.eUK0QCUOgOkmDaAD446eGwRKClZOy6MbE6HmxV7UO','','13973164401','','2','1','0','3','1','0','','','','','','','1413637151','320578','','');
INSERT INTO `hms_user` VALUES('22','hlyc','殷楚','$2y$10$Ubh5MZAe7x1vYfELPYM1luXEmRnP3Y0KMnlxA5N9i4UvNGr66Rh3q','$2y$10$56LgMzw0HpGi/vvATOG5eufYt1mp9Wh2u3/F5CI51JUl/SjjPqkti','','13973164401','','2','1','0','3','1','0','','','','','','','1413637181','746243','','');
INSERT INTO `hms_user` VALUES('23','hlcgl','陈国林','$2y$10$SzHU7tQXgR6SjwwzCX/rQ..aiLCJlZkQshqKEQTVAC8SGuADA8UAa','$2y$10$QulW8taOPqnzPHEgBCVYre47QwkHz2qsu32ne1au8den7mzcqOgDK','','13207485667','','1','1','0','3','1','0','','','','','','','1413561600','933532','','viqoelNwghowVN78Kk7msBBv8r6Avy5CEe6LxWzQikGBB1mdemqHJQwgchUY');
INSERT INTO `hms_user` VALUES('24','hlcml','陈慕林','$2y$10$H.nxMePI2N6Z0jtQpOhp6.yDMQvyi.jY0EjYf45TUUTU7im3S8wQa','$2y$10$ZBMh7l6MiOf84.yyu141gOgwXTwFtwhDI3j8h5ZsdN4RdhCKNzbJ.','','18507350566','','1','1','0','3','1','0','','','','','','','1413561600','930346','','');
INSERT INTO `hms_user` VALUES('25','hllzr','李祖任','$2y$10$Fsr0TD87z9Nv4WED3STLAO6gUDoK/DQAKU8gkmOwvfsXXTh6YyC8m','$2y$10$eorompTthzFbVR/vL0NVgeQEK3sSy6l/BgHiCKDd3/ZBmp45dGYOG','','18670331999','','1','1','0','3','1','0','','','','','','','1413561600','609353','','');
INSERT INTO `hms_user` VALUES('26','hldyg','杜印根','$2y$10$qcjlQZ3nOKAbDdc5SqkL5uM/a73xnBhz13.LIoMmfeZlMkzYaWtpW','$2y$10$tAK.G9uDkvrCjUyTIuoHjenTswpqFA40Zg/45R7qrXf4sxun1KwJe','','13873100849','','1','1','0','3','1','0','','','','','','','1413561600','675381','','');
INSERT INTO `hms_user` VALUES('27','hljlf','蒋丽飞','$2y$10$../s6BQOTFztk3JsNh.41eMZks4oRIczJclv8S4RYv3E2RK6cPZpq','$2y$10$LkM0G39W80Fikh2K.fBcSOoF5P/SiN8cVi4Iu9i7Pr9c6l5J0b0QG','','13508483699','','1','1','0','3','1','0','','','','','','','1413561600','932049','','');
INSERT INTO `hms_user` VALUES('28','hljc','蒋纯','$2y$10$a54y2V4hKGMvIK6Mj.QgtONxYok8NU5vTFBWRJk3NPYWc2ye9.XoG','$2y$10$5lE2l3gKBoSawlU3.Zo9G.c2qja.NASvpaCFGg48dbgg5p/8ZdYiS','','13548664748','','1','1','0','3','1','0','','','','','','','1413561600','872833','','');
INSERT INTO `hms_user` VALUES('29','hlhqx','贺秋香','$2y$10$yLyy.2rP/kuRv5XCRrrP2OfX.Ba67q0JQZni/yMvClURTaBtjj8iS','$2y$10$N1MX4bpA5gajQok6SWtpqe6Qlf4y.18SPGBUAX0HLt6zi1e8j8mw2','','15607313912','','1','1','0','3','1','0','','','','','','','1413561600','598092','','');
INSERT INTO `hms_user` VALUES('30','hlwzm','伍知明','$2y$10$.wZkIvDAK.hsY7zpzKmnP.xn9qGvzO3W7p3484MroB.c1Z9.vIyP2','$2y$10$cjqSatpKHNkgQTgg/KrRGue1M8jr2CSYTc7x1tXkNAh1pel/yZLB6','','18711067136','','1','1','0','3','1','0','','','','','','','1413561600','612265','','');
INSERT INTO `hms_user` VALUES('31','hlzll01','曾莉莉','$2y$10$08B4QSzSNzyqvmsPS/3Fjua0//JsGfgcra0APO2LIaN6CCRvsJwEm','$2y$10$GwYtu9FrsiXGLnVZlVh6TOkC5odbZFWwYQBp.AcoIU0ygbVFCGaWu','','13975896825','','1','1','0','3','1','0','','','','','','','1413561600','745227','','rTnMXBzI8ZsHSapwZitR3mHJ1qZYQKMVDiAcJtfeZDfLAyHtTBzeNTUHStHc');
INSERT INTO `hms_user` VALUES('32','hlzxy','赵湘云','$2y$10$TRBpjTduHVlYSKRzavElt.dls41Io4GULjNmbo5M9HaAk.vrJtzi2','$2y$10$zfYMcqQ2jeekkSLGATBpqukIwy3N5SN/HLIfxLIk0HynwDfgVe7su','','18216592203','','1','1','0','3','1','0','','','','','','','1413561600','883764','','');
INSERT INTO `hms_user` VALUES('33','hlfxs','符小双','$2y$10$JkgeGtWHplVKIbknGmYvNuEuT0UnyN9UdZ8AmRDq/Ra501zMgc7L.','$2y$10$fS1fqtkqrzvvZbkc60f7NeHvx/7NT9hHSNYoDPxn1RjzZbq/H5Y.m','','18216726696','','1','1','0','3','1','0','','','','','','','1413561600','962564','','');
INSERT INTO `hms_user` VALUES('34','hlzqq','曾青青','$2y$10$vJgQB9BXmXoybL/YLbNYHuJ81BFQwEgLeuNtNeoaP8FwQO6Yr1Y42','$2y$10$gAbyyvf13UrZoZj5M9/8yeJBU7D4RaxTwIJ80HrEzBQ93ab5i7Nee','','18687466658','','1','1','0','3','1','0','','','','','','','1413561600','481912','','');
INSERT INTO `hms_user` VALUES('35','hlwq','王勤','$2y$10$ZfhC7WF.KMTDvyx2/tgt7eF.TecGNGJHoE1iGjW6UBAxzKxaWt4.O','$2y$10$K8n6CPQqNnCJP56qn0OUb.LJ0T7KhFTA.lVvJsahB7OxMOtEl9h.q','','13786116963','','1','1','0','3','1','0','','','','','','','1413561600','184402','','');
INSERT INTO `hms_user` VALUES('36','hlxle','徐立娥','$2y$10$j.nEUWgxKMNDAXVoE1nEcOc4HvSdlL1bfkclvshEOMVxJAErKFiMq','$2y$10$vCOARZxp.ys0BRnoFALDAeRpPNcryRHXN3Pn6Lxq/v7eP7CwXiiyi','','18229929923','','1','1','0','3','1','0','','','','','','','1413561600','110766','','of9QjLxVFDBYSd6xinYLFAdOHRUfxAkKltXevywao9O9hOQoysqgfYlryRSB');
INSERT INTO `hms_user` VALUES('37','hlzlp','张丽萍','$2y$10$69/8qI66O4NM0dsBYZCE3.ljOeFtyfzvx44o1opGEqYd9fyfVAB/a','$2y$10$VTTX06fK98DIdH9T1IOZh.jsuLlrjrvQyRgv3MWYqqxG3BXApg0rC','','15580973900','','1','1','0','3','1','0','','','','','','','1413561600','287371','','');
INSERT INTO `hms_user` VALUES('38','hldzh','邓志华','$2y$10$ykmQSa9Ri9KtlXhjZBMddeRi16sdp5ke4lRXaM8G5nXcq0GzMzqs.','$2y$10$Ntbguc1I.uGen4MbEruuTOoPC/WwmS7vONCfymolKEnGMaZcVp9p2','','15974274626','','1','1','0','3','1','0','','','','','','','1413561600','600125','','');
INSERT INTO `hms_user` VALUES('39','hllm','李敏','$2y$10$qzeqNUlyM4e8AliTTk17HOnyIwindLRNig.T2Kbu4hBzHnNjkH0Rm','$2y$10$I4olW9p45/trz8vE32.oTOnNTNfoWsxSzM259T0XP0PmSVQvzS.oe','','13787266787','','1','1','0','3','1','0','','','','','','','1413561600','303219','','');
INSERT INTO `hms_user` VALUES('40','hlzjh','周建华','$2y$10$491PRegP9IcFpgJ/3g9xGOe4igE.lRORRB6ntSU2oUU.XiJJhxt7W','$2y$10$77fISxBTAfzNx8dVt6y1peUkAS0vYpBQRrIGaOvCVkSO7Ck2UMIWi','','13786116963','','1','1','0','2','1','0','','','','','','','1413561600','151141','','');
INSERT INTO `hms_user` VALUES('41','hlxcb','谢传兵','$2y$10$OnI0mebm.7TDTdbE1x3tAeEwShhfN5y7Qj6Ua/9OPT8szJGXxJr42','$2y$10$cYk1p6T5LTJ7syVWGVrzKeAUxKqNMv3G3AZqLb0VhiqHAlM3pWRPe','','18874213202','','1','1','0','3','1','0','','','','','','','1413561600','779064','','');
INSERT INTO `hms_user` VALUES('42','hllyl','李运良','$2y$10$FrGLiG6404xcw7ZOt0HKYe40DBgXVWhCW6uXmyoyhdCWNkLsbhjqO','$2y$10$RtMAkPQGxO3.bsqb1eLEBu34nnMMBzx3VpXXOpJycawLGcgkITbl2','','18253273153','','1','1','0','3','1','0','','','','','','','1413561600','304098','','');
INSERT INTO `hms_user` VALUES('43','hllys','刘玉珊','$2y$10$/p7AKQ7Rrr6wqHHP82ejAekUZ5Pdj.RKmOamJ3a3PPhcGmUDgGxUW','$2y$10$cddDU3aYdJ4HrASaSii.Auu7kk6Ey7syVCZidPDRsmLuR2oszSa1G','','18975851505','','1','1','0','2','1','0','','','','','','','1413561600','825894','','');
INSERT INTO `hms_user` VALUES('44','hlzzl','朱宗林','$2y$10$M8VPEfLT61peVQOpfq.7huuv/Ew0JjS80tZdcF1kX/IwLe3Bg7Ozm','$2y$10$a1Ss1nnXXbMrHr3IGIQLT.SPeKok9kK8NUEKyxpCHA60TbYPLzp06','','13974884256','','1','1','0','3','1','0','','','','','','','1413734400','516217','','');
INSERT INTO `hms_user` VALUES('45','hlyry','余瑞英','$2y$10$YTgHaX2eSDRMZ5OkhydQrODgaXPGiYgflyyX4YsHL.jwlvM4eyDoW','$2y$10$FH5kvQqTMIw.sGDFrCe63usNc.FVeAix7/0ZpHfYB.FgF0.sV8fiC','','13657303194','','1','1','0','3','1','0','','','','','','','1413734400','328598','','');
INSERT INTO `hms_user` VALUES('46','hlzhl','邹红玲','$2y$10$i5U2iS5MDwjPDVJeBNX/ruR883fU5PHlnaWUmwnZWuXq7X3YawkPC','$2y$10$4nEOqkhJ8OPbNrqJ6V.5POL8t1PEdR9LeHeSy2N04PJa8Yw5s4Rna','','18108459753','','1','1','0','3','1','0','','','','','','','1413561600','424865','','');
INSERT INTO `hms_user` VALUES('47','hldql','戴青莲','$2y$10$gcbkfNXhTWnUyX9qDKQJR.htq6L.FiYAsYihAsg3z8XdErriRB4me','$2y$10$UbB8UF9xnAOckCAWcUjCwemMUx7lcQ3OnffLslaWEg5TjFO8pyJvS','','13975854648','','1','1','0','4','1','0','','','','','','','1413561600','901562','','TJiTTk7eDRCPbg5xFLjds30eWKsYSxQvBzdoWnCFxhJim3P2HnlBEcuqMfTX');
INSERT INTO `hms_user` VALUES('48','hlyj01','杨健','$2y$10$GE11l6TbPANLocCPK.R25.Au15t8RDqpE7GeQY8RlvodMTHt.KOHS','$2y$10$UqhUMLHTQaU0SczuT9dKbO9/AUOMDz06npet21cZOj0qnnKrNN.fS','','18570373283','','1','1','0','3','1','0','','','','','','','1413561600','468179','','uQzVhbMtNFut19DmtEnUniefCefSoOVMKo61cDvja4ihvj0TOs9C1ZMLPnR5');
INSERT INTO `hms_user` VALUES('49','hllb','刘彬','$2y$10$N9QzMKwndC/FhA.eSSd12OmXRFBNpqWhxT5skB7rRKoG2ZOxSLCIC','$2y$10$wCHIYPIhs1plAT26boKCnuLWgMPJjGRU/oR.mpPR.xv1HmRtaCT3O','','15211154321','','1','1','0','3','1','0','','','','','','','1413561600','509378','','');
INSERT INTO `hms_user` VALUES('50','hllyx','刘英喜','$2y$10$sJJ9eiuVXDzwl92DIvSQrO1orpDYzFoXMJ7P6ESOOJrdxY5nOsdWG','$2y$10$oSaOaMjOy0T1JfWNuOaze.yRRLkZr82F1FgAdC9DTAvNUr54sIFCq','','18507311851','','1','1','0','3','1','0','','','','','','','1413561600','675299','','');
INSERT INTO `hms_user` VALUES('51','hlld','廖东','$2y$10$iQWDlqhZE8RwqH.iyBUZo.rqp6bQdR0tKspKjs3HKeW1WxMW69lsi','$2y$10$K/VHzXOyXb3PplwVTbCwAebWwqb.OmPQ2CTt.f3wYAJHkoUWUh8Bu','','13787194667','','1','1','0','3','1','0','','','','','','','1413561600','722210','','');
INSERT INTO `hms_user` VALUES('52','hlfy','方圆','$2y$10$My1styIeSv6VFhXCDUAjyOGKeS275aLhmu/HDSt/o.cD/b94f3jJ2','$2y$10$/te0r2myOtWaHl/sTiqkEeYwJMhNK4rJTLigocaRPLmjXUo3STWtu','','13487580990','','1','1','0','3','1','0','','','','','','','1413734400','563156','','');
INSERT INTO `hms_user` VALUES('53','hldzy01','邓志勇','$2y$10$GpQg7OPlmB/TRQtogo5mHelqkIcz/Wgw/GCB9uqnERrq1ixWjiXFe','$2y$10$7x7M4Q7skGgozUCwtwwsOeCfbFJg9zPPUIy2oUZvjS.oI4k3hFjve','','18688651968','','1','1','0','3','1','0','','','','','','','1413561600','118539','','');
INSERT INTO `hms_user` VALUES('54','hlzww','邹微微','$2y$10$Uzax8rM7h4ZZDUv7y8xXpeU.LegBGekn6VdWgcu.Ro0WMNtvafX4q','$2y$10$qQ8svy0Qeu.8YIi28qFZs.h5CT1ku4RsMLLcgKeTBfvYuaiwMQWCm','','18686851968','','1','1','0','3','1','0','','','','','','','1413561600','424645','','');
INSERT INTO `hms_user` VALUES('55','hlcq','陈琼','$2y$10$TmZ250ms0VT1WB2ENWmbmelWtOkyuW2AJmdrEMWtktgeexub/zA5S','$2y$10$qb.7TVtZ1GsezyZl0Z8pFOmPBxKDO65GtVPDkBgqlZWZOJaODEJ3q','','18692207387','','1','1','0','3','1','0','','','','','','','1413561600','955175','','');
INSERT INTO `hms_user` VALUES('59','sp1','合力雨花营业部','$2y$10$SoHyxqdo5iANrezsqha3JuKasPkU/lYh9kWyggP6E68Ui.sCkw9Hm','$2y$10$6..GmqZgbg6/341uGpKdYOnOFXi7TkrGAAyDrEAQSgSF4bcGZ3xfy','','13307318899','','0','1','3','3','1','0','','','','','','','1413907200','389132','','');
