
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `hms_user`;
CREATE TABLE `hms_user` (
  `id`            mediumint(8)	unsigned NOT NULL AUTO_INCREMENT, 
  `login`         char(32)  DEFAULT NULL,
  `name`          char(32)  DEFAULT NULL,  
  `password`      char(255) DEFAULT NULL,
  `password2`     char(255) DEFAULT NULL,
  `passwordsalt`  char(128) DEFAULT NULL,
  `mobile`        char(24)  DEFAULT NULL,
  `email`         char(64)  DEFAULT NULL, 
  `type`          tinyint(1)	unsigned NOT NULL DEFAULT '1',
  `level`         tinyint(1)	unsigned NOT NULL DEFAULT '1',  
  `flag`          tinyint(1) unsigned DEFAULT '0' COMMENT '0:用户/1:总公司/2:分公司/3:家庭超市', 
  `region`        mediumint(8)  DEFAULT NULL, 
  `status`        tinyint(1) unsigned DEFAULT '0',
  `first`         tinyint(1) unsigned DEFAULT '0',
  `province`      char(32)  DEFAULT NULL,
  `city`          char(32)   DEFAULT NULL,
  `county`        char(32)   DEFAULT NULL,  
  `idcard`        char(32)  DEFAULT NULL,   
  `address`       varchar(255)  DEFAULT NULL,
  `postcode`      char(16)  DEFAULT NULL,
  `date`          int(10)   unsigned DEFAULT NULL,
  `code`          char(8)   DEFAULT NULL COMMENT '个人邀请码',
  `memo`          text DEFAULT NULL,
  `remember_token`    char(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_referee`;
CREATE TABLE `hms_referee` (
  `id`    mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,
  `uid`   mediumint(8)  unsigned DEFAULT NULL,
  `pid`   mediumint(8)  unsigned DEFAULT NULL ,   
  `quarter` tinyint(2)  unsigned DEFAULT NULL , 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_accepter`;
CREATE TABLE `hms_accepter` (
  `id`    mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,
  `uid`   mediumint(8)  unsigned DEFAULT NULL,
  `pid`   mediumint(8)  unsigned DEFAULT NULL ,   
  `quarter` tinyint(2)  unsigned DEFAULT NULL , 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_record`;
CREATE TABLE `hms_record` (
  `id`      mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,   
  `uid`     mediumint(8)  unsigned DEFAULT NULL,  
  `bid`     mediumint(8)  unsigned DEFAULT NULL COMMENT '被结算用户',
  `flag`    tinyint(2)    DEFAULT NULL COMMENT '借贷标志',
  `type`    tinyint(2)    unsigned DEFAULT NULL COMMENT '流水类型',  
  `cost`    float         DEFAULT NULL COMMENT '结算基准',
  `rate`    float         DEFAULT NULL COMMENT '利率',
  `amount`  float         DEFAULT NULL COMMENT '发生额',
  `status`  int(2)        unsigned DEFAULT NULL COMMENT '流水状态',
  `date`    int(10)       unsigned DEFAULT NULL COMMENT '流水日期',
  `sdate`   int(10)       unsigned DEFAULT NULL COMMENT '结算日期',
  `balance` float         DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `hms_account`;
CREATE TABLE `hms_account` (
  `id`        mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,   
  `uid`       mediumint(8)  unsigned DEFAULT NULL,
  `type`      tinyint(2)    unsigned DEFAULT NULL COMMENT '账户类型', 
  `date`      int(10)       unsigned DEFAULT NULL COMMENT '开户日期', 
  `balance`   float         DEFAULT NULL COMMENT '余额',
  `status`    tinyint(2)    unsigned DEFAULT '0' COMMENT '账户状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_menu`;
CREATE TABLE `hms_menu` (
  `id`        mediumint(8)  unsigned NOT NULL AUTO_INCREMENT, 
  `flag`      tinyint(1)    unsigned DEFAULT NULL ,   
  `name`      char(16)      DEFAULT NULL,
  `parent`    tinyint(2)    unsigned DEFAULT NULL ,   
  `prefix`    char(8)       DEFAULT NULL,
  `controller` char(16)     DEFAULT NULL,
  `action`    char(16)      DEFAULT NULL,
  `icon`      char(24)      DEFAULT NULL,
  `order`     char(16)      DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_menus`;
CREATE TABLE `hms_menus` (
  `id`        mediumint(8)  unsigned NOT NULL AUTO_INCREMENT, 
  `flag`      tinyint(1)    unsigned DEFAULT NULL ,   
  `name`      char(16)      DEFAULT NULL,
  `parent`    tinyint(2)    unsigned DEFAULT NULL ,   
  `prefix`    char(8)       DEFAULT NULL,
  `controller` char(16)     DEFAULT NULL,
  `action`    char(16)      DEFAULT NULL,
  `icon`      char(24)      DEFAULT NULL,
  `order`     char(16)      DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_menut`;
CREATE TABLE `hms_menut` (
  `id`        mediumint(8)  unsigned NOT NULL AUTO_INCREMENT, 
  `flag`      tinyint(1)    unsigned DEFAULT NULL ,   
  `name`      char(16)      DEFAULT NULL,
  `parent`    tinyint(2)    unsigned DEFAULT NULL ,   
  `prefix`    char(8)       DEFAULT NULL,
  `controller` char(16)     DEFAULT NULL,
  `action`    char(16)      DEFAULT NULL,
  `icon`      char(24)      DEFAULT NULL,
  `order`     char(16)      DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_configure`;
CREATE TABLE `hms_configure` (
  `id`        mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,   
  `key`       char(16)      DEFAULT NULL,
  `value`     char(16)      DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_param`;
CREATE TABLE `hms_param` (
  `id`        mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,  
  `type`      char(16)      DEFAULT NULL, 
  `key`       char(16)      DEFAULT NULL,
  `value`     char(16)      DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hms_product`;
CREATE TABLE `hms_product` (
  `id`            mediumint(8)  unsigned NOT NULL AUTO_INCREMENT, 
  `code`          char(32)      DEFAULT NULL,
  `name`          char(64)      DEFAULT NULL,
  `category`      char(16)      DEFAULT NULL,  
  `price1`        float         DEFAULT NULL,
  `price2`        float         DEFAULT NULL,
  `specs`         char(64)      DEFAULT NULL,
  `status`        tinyint(2)    unsigned DEFAULT NULL , 
  `badge`         tinyint(2)    unsigned DEFAULT NULL , 
  `image`         char(64)      DEFAULT NULL, 
  `memo`          text          DEFAULT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `hms_order`;
CREATE TABLE `hms_order` (
  `id`            mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,
  `uid`           mediumint(8)  unsigned DEFAULT NULL,
  `amount`        float         unsigned DEFAULT '0',
  `serial`        char(32)      DEFAULT NULL COMMENT '订单编号', 
  `date`          int(10)       unsigned DEFAULT NULL,
  `status`        int(2)        unsigned DEFAULT NULL,
  `type`          int(2)        unsigned DEFAULT '0' COMMET '首单标志',
  `invoice`       int(2)        unsigned DEFAULT NULL COMMENT '发货方式',  
  `ticket`        char(32)      DEFAULT NULL COMMENT '运单号',
  `express`       char(32)      DEFAULT NULL COMMENT '快递公司',
  `shopid`        mediumint(8)  unsigned DEFAULT NULL,
  `name`          char(32)      DEFAULT NULL,  
  `mobile`        char(24)      DEFAULT NULL,
  `address`       varchar(255)  DEFAULT NULL,
  `postcode`      char(16)      DEFAULT NULL,
  `memo`          text          DEFAULT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `hms_orderitem`;
CREATE TABLE `hms_orderitem` (
  `id`            mediumint(8)  unsigned NOT NULL AUTO_INCREMENT,
  `uid`           mediumint(8)  unsigned DEFAULT NULL,
  `orderid`       mediumint(8)  unsigned DEFAULT NULL,
  `productid`     mediumint(8)  unsigned DEFAULT NULL,
  `code`          char(32)      DEFAULT NULL,
  `name`          char(64)      DEFAULT NULL,
  `type`          char(16)      DEFAULT NULL,
  `category`      char(16)      DEFAULT NULL,  
  `price1`        float         DEFAULT NULL,
  `price2`        float         DEFAULT NULL,
  `specs`         char(64)      DEFAULT NULL,
  `memo`          text          DEFAULT NULL, 
  `image`         char(64)      DEFAULT NULL, 
  `number`        mediumint(8)  unsigned DEFAULT NULL,
  `total`         float         DEFAULT NULL,  
  `status`        int(2)        unsigned DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




