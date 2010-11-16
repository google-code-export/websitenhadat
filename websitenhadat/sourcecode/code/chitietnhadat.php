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

$colname_rs_chitietnhadat = "-1";
if (isset($_GET['ID_NhaDat'])) {
  $colname_rs_chitietnhadat = $_GET['ID_NhaDat'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_chitietnhadat = sprintf("SELECT * FROM nha_dat WHERE ID_NhaDat = %s", GetSQLValueString($colname_rs_chitietnhadat, "int"));
$rs_chitietnhadat = mysql_query($query_rs_chitietnhadat, $conn_qlnd) or die(mysql_error());
$row_rs_chitietnhadat = mysql_fetch_assoc($rs_chitietnhadat);
$totalRows_rs_chitietnhadat = mysql_num_rows($rs_chitietnhadat);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_chitietnhadat.HinhAnh}");
$objDynamicThumb1->setResize(110, 80, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/trang_tintuc.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><span class="chu"><?php echo $row_rs_chitietnhadat['TieuDe']; ?></span></td>
  </tr>
  <tr>
    <td width="120" align="center" valign="middle"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
    <td align="left" valign="top">Số phòng tắm : <?php echo $row_rs_chitietnhadat['SoPTam']; ?> phòng<br />
    Số phòng ngũ : <?php echo $row_rs_chitietnhadat['SoPNgu']; ?> phòng<br />
    Tiền thuê : <?php echo $row_rs_chitietnhadat['TienThue']; ?> triệu/tháng<br />
    Diện tích : <?php echo $row_rs_chitietnhadat['DienTich']; ?> m2<br /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">Mô tả chi tiết :<br />
      <?php echo $row_rs_chitietnhadat['MoTaChiTiet']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs_chitietnhadat);
?>