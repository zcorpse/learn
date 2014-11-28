<?php
require 'dbmanage.php';

$db = new DBManage ( 'localhost', 'root', 'M9CBCtGJtH', 'hms_database', 'utf8' );
// 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2000，即2M)
$db->backup ();

?>