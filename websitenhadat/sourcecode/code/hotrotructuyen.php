<?php require_once('Connections/conn_qlnd.php'); ?>
<?php
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
$query_rs_hotrotructuyen = "SELECT TenNV, Email_HoTro FROM nhan_vien ORDER BY ID_NV DESC LIMIT 0,4";
$rs_hotrotructuyen = mysql_query($query_rs_hotrotructuyen, $conn_qlnd) or die(mysql_error());
$row_rs_hotrotructuyen = mysql_fetch_assoc($rs_hotrotructuyen);
$totalRows_rs_hotrotructuyen = mysql_num_rows($rs_hotrotructuyen);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/h/.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php do { ?>
  <div id="hotrotructuyen">
  <span class="chu">
  <?php echo $row_rs_hotrotructuyen['TenNV']; ?>
  </span>
  <br />
  <a href="ymsgr:sendIM?<?php echo $row_rs_hotrotructuyen['Email_HoTro']; ?>"><img src="http://opi.yahoo.com/online?u=<?php echo $row_rs_hotrotructuyen['Email_HoTro']; ?>&amp;m=g&amp;t=2" alt="" border="0" /></a>
</div>
  <?php } while ($row_rs_hotrotructuyen = mysql_fetch_assoc($rs_hotrotructuyen)); ?>

</body>
</html>
<?php
mysql_free_result($rs_hotrotructuyen);
?>
