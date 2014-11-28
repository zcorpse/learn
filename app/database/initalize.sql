
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Data for the table `accounts` */
truncate table `hms_user`;
insert  into `hms_user`(`id`,`login`,`name`,`password`,`password2`,`passwordsalt`,`mobile`,`email`,`type`,`level`,`flag`,`region`,`status`,`province`,`city`,`county`,`idcard`,`address`,`postcode`,`date`,`code`,`memo`,`remember_token`) values
 (1,'admin','总公司','$2y$10$zDsIUuavA0p0gnC/itAofOI0FELGlBo0qR62VlPP0C0VeG2FgJONu','$2y$10$uVfSVJVrsSdG5DNxiJu94OMn.FqFb11QN0wxrSqaf02DWDYC/RAAm',NULL,NULL,NULL,1,1,1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'z1xhQLKq4SMgNyDCTEmCYocZ31ioibalzKxeJ7YWt8aJmMQ6Y3b8rx6tlyYK');
 
truncate table `hms_account`;
insert  into `hms_account`(`id`,`uid`,`type`,`date`,`balance`,`status`) values 
	(1,1,1,1411862400,0,1);


/*Data for the table `records` */
truncate table `hms_record`;
insert  into `hms_record`(`id`,`uid`,`bid`,`flag`,`type`,`cost`,`rate`,`status`,`amount`,`date`,`balance`) values 
(1,1,1,1,0,0,1,1,0,1411948800,0);


/*1412006400*/

truncate table `hms_configure`;
insert  into `hms_configure`(`id`,`key`,`value`) values (1,'sysdate','1412006400');


 truncate table `hms_accepter`;


 truncate table `hms_referee`;

 
truncate table `hms_menu`;
insert  into `hms_menu`(`id`,`flag`,`name`,`parent`,`prefix`,`controller`,`action`,`icon`,`order`) values
 (1,2,'账户管理',0,'bo','account',NULL,'fa-check-square-o','1'),
 (2,2,'账户开户',1,'bo','account','register',NULL,'1'),
 (3,2,'激活账户',1,'bo','account','active',NULL,'2'),
 (4,2,'账务结算',0,'bo','settle',NULL,'fa-ils','2'),
 (5,2,'流水查询',4,'bo','settle','search',NULL,'1'),
 (6,2,'账户充值',1,'bo','account','charge',NULL,'3'),
 (7,2,'用户查询',1,'bo','account','search',NULL,'4'),
 (8,1,'区域管理',0,'ho','branch',NULL,'fa-list-ul','1'),
 (9,1,'新设分公司',8,'ho','branch','new',NULL,'2'),
 (10,1,'订购系统',0,'ho','product',NULL,'fa-credit-card','3'),
 (26,1,'新增产品',10,'ho','product','add',NULL,'1'),
 (11,1,'产品管理',10,'ho','product','item',NULL,'2'),
 (12,1,'订单管理',10,'ho','product','order',NULL,'3'),
 (13,2,'数据报表',0,'bo','report',NULL,'fa-bar-chart','3'),
 (14,2,'账户统计',13,'bo','report','account',NULL,'1'),
 (15,2,'结算统计',13,'bo','report','record',NULL,'2'),
 (16,0,'个人账户',0,'user','finance',NULL,'fa-tags','2'),
 (17,0,'交易明细',16,'user','finance','detail',NULL,'2'),
 (18,0,'内部转账',16,'user','finance','transfer',NULL,'3'),
 (19,0,'账户资料',16,'user','finance','profile',NULL,'1'),
 (20,1,'分公司一览',8,'ho','branch','list',NULL,'1'),
 (21,0,'业绩管理',0,'user','market',NULL,'fa-bar-chart','1'),
 (22,0,'业绩查看',21,'user','market','view',NULL,'1'),
 (23,0,'业绩明细',21,'user','market','detail',NULL,'2'),
 (24,1,'业绩统计',0,'ho','business',NULL,'fa-area-chart','2'),
 (25,1,'分公司业绩',24,'ho','business','branch',NULL,'2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
