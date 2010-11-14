<?php require_once('Connections/conn_qlnd.php'); ?>
<?php require_once('Connections/conn_qlnd.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quangcao = "SELECT * FROM quang_cao ORDER BY ID_QuangCao DESC LIMIT 0,3";
$rs_quangcao = mysql_query($query_rs_quangcao, $conn_qlnd) or die(mysql_error());
$row_rs_quangcao = mysql_fetch_assoc($rs_quangcao);
$totalRows_rs_quangcao = mysql_num_rows($rs_quangcao);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_quangcao.Hinh_QuangCao}");
$objDynamicThumb1->setResize(180, 140, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/trang_quangcao.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="hinh">
  <?php do { ?>
      <div align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" width="180" vspace="2" border="0" />        </div>
      <?php } while ($row_rs_quangcao = mysql_fetch_assoc($rs_quangcao)); ?></div>
</body>
</html>
<?php
mysql_free_result($rs_quangcao);
?>
