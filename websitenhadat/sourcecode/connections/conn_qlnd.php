<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_qlnd = "localhost";
$database_conn_qlnd = "quanlynhdat";
$username_conn_qlnd = "root";
$password_conn_qlnd = "khanh03091988";
$conn_qlnd = mysql_pconnect($hostname_conn_qlnd, $username_conn_qlnd, $password_conn_qlnd) or trigger_error(mysql_error(),E_USER_ERROR); 
?>