<?php
$server   = "localhost";
$username = "root";
$password = "DB2017rf.";
$db       = 'carrito';
$con      = mysql_connect($server, $username, $password) or die("no se ha podido establecer la conexion con el servidor de base de datos");
$sdb      = mysql_select_db($db, $con) or die("la base de datos no existe");

# set charset

mysql_query('SET NAMES \'utf8\'');

?>