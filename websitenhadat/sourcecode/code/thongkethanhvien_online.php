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
$query_rs_tongthanhvien = "SELECT ID_ThanhVien FROM thanh_vien";
$rs_tongthanhvien = mysql_query($query_rs_tongthanhvien, $conn_qlnd) or die(mysql_error());
$row_rs_tongthanhvien = mysql_fetch_assoc($rs_tongthanhvien);
$totalRows_rs_tongthanhvien = mysql_num_rows($rs_tongthanhvien);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="thongketruycap">
<span class="chu3">Số người Online</span><br />
<?php include("counters.php"); ?>
<br />
<span class="chu3">Tổng thành viên</span><br />
<span class="style1"><?php echo $totalRows_rs_tongthanhvien ?></span> <br />
<span class="chu3">Tổng lượt truy cập</span><br />
<?php include("hitcounter/hitcounter.php"); ?>
</div>
</body>
</html>
<?php
mysql_free_result($rs_tongthanhvien);
?>
