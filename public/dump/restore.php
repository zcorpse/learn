<?php
require 'dbmanage.php';

$db = new DBManage ( 'localhost', 'root', 'nirvana', 'hlbs', 'utf8' );
//参数：sql文件
$db->restore ( './backup/20141026031635_all_v1.sql');

?>