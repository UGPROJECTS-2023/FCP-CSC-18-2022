<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conroad = "localhost";
$database_conroad = "road";
$username_conroad = "root";
$password_conroad = "";
$conroad = mysql_pconnect($hostname_conroad, $username_conroad, $password_conroad) or trigger_error(mysql_error(),E_USER_ERROR); 
?>