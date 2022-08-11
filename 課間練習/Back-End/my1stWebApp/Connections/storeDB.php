<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
ob_start();
header('Content-type: text/html; charset=utf-8');
if(!isset($_SESSION)){
	session_start();
	}
$hostname_storeDB = "localhost";
$database_storeDB = "onlinestore";
$username_storeDB = "root";
$password_storeDB = "";
$storeDB = @mysql_pconnect($hostname_storeDB, $username_storeDB, $password_storeDB) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_query('SET NAMES utf8');
?>