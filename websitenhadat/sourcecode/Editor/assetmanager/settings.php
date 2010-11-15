<?php require_once('../../Connections/conn_qlnd.php'); ?><?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Make unified connection variable
$conn_qlnd = new KT_connection($conn_qlnd, $database_conn_qlnd);
?>

<?php
$bReturnAbsolute=false;

$sBaseVirtual0="/Editor/assets";  //Assuming that the path is http://yourserver/Editor/assets/ ("Relative to Root" Path is required)

//$sBase0="C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/cms/Editor/assets"; //Duong dan that den thu muc assets cho bo apche-php-mysql roi

$sBase0="C:/AppServ/www/quanlynhadat/Editor/assets"; //Duong dan that den thu muc assets cho bo tich hop appserv

//$sBase0="/home/yourserver/web/Editor/assets"; //example for Unix server

$sName0="Assets";

$sBaseVirtual1="";
$sBase1="";
$sName1="";

$sBaseVirtual2="";
$sBase2="";
$sName2="";

$sBaseVirtual3="";
$sBase3="";
$sName3="";
?>