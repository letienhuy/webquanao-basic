<?php
$username='root';
$password='';
$conn=mysql_connect('localhost',$username,$password);
mysql_select_db('shop1',$conn);
mysql_set_charset('utf8');
?>