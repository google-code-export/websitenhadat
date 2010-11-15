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

$maxRows_rs_ketquatimkiem_dientich = 10;
$pageNum_rs_ketquatimkiem_dientich = 0;
if (isset($_GET['pageNum_rs_ketquatimkiem_dientich'])) {
  $pageNum_rs_ketquatimkiem_dientich = $_GET['pageNum_rs_ketquatimkiem_dientich'];
}
$startRow_rs_ketquatimkiem_dientich = $pageNum_rs_ketquatimkiem_dientich * $maxRows_rs_ketquatimkiem_dientich;

$colname1_rs_ketquatimkiem_dientich = "20";
if (isset($_GET["dtmin"])) {
  $colname1_rs_ketquatimkiem_dientich = $_GET["dtmin"];
}
$colname2_rs_ketquatimkiem_dientich = "100";
if (isset($_GET["dtmax"])) {
  $colname2_rs_ketquatimkiem_dientich = $_GET["dtmax"];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_ketquatimkiem_dientich = sprintf("SELECT nha_dat.TieuDe, nha_dat.ID_NhaDat, nha_dat.SoPTam, nha_dat.SoPNgu, nha_dat.TienThue, nha_dat.DienTich, nha_dat.HinhAnh, nha_dat.MoTaChiTiet FROM nha_dat WHERE nha_dat.DienTich BETWEEN %s AND %s", GetSQLValueString($colname1_rs_ketquatimkiem_dientich, "int"),GetSQLValueString($colname2_rs_ketquatimkiem_dientich, "int"));
$query_limit_rs_ketquatimkiem_dientich = sprintf("%s LIMIT %d, %d", $query_rs_ketquatimkiem_dientich, $startRow_rs_ketquatimkiem_dientich, $maxRows_rs_ketquatimkiem_dientich);
$rs_ketquatimkiem_dientich = mysql_query($query_limit_rs_ketquatimkiem_dientich, $conn_qlnd) or die(mysql_error());
$row_rs_ketquatimkiem_dientich = mysql_fetch_assoc($rs_ketquatimkiem_dientich);

if (isset($_GET['totalRows_rs_ketquatimkiem_dientich'])) {
  $totalRows_rs_ketquatimkiem_dientich = $_GET['totalRows_rs_ketquatimkiem_dientich'];
} else {
  $all_rs_ketquatimkiem_dientich = mysql_query($query_rs_ketquatimkiem_dientich);
  $totalRows_rs_ketquatimkiem_dientich = mysql_num_rows($all_rs_ketquatimkiem_dientich);
}
$totalPages_rs_ketquatimkiem_dientich = ceil($totalRows_rs_ketquatimkiem_dientich/$maxRows_rs_ketquatimkiem_dientich)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_ketquatimkiem_dientich.HinhAnh}");
$objDynamicThumb1->setResize(100, 80, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
<link href="css/linkxanh.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php do { ?>
  <div id="ketquatimkiem_dientich"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" hspace="5" vspace="5" border="0" align="left" />
  <span class="lienketxanh">
  <a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_ketquatimkiem_dientich['ID_NhaDat']; ?>"><?php echo $row_rs_ketquatimkiem_dientich['TieuDe']; ?></a>
  </span>
  <br />
    Tiền thuê : <?php echo $row_rs_ketquatimkiem_dientich['TienThue']; ?> triệu . Diện tích : <?php echo $row_rs_ketquatimkiem_dientich['DienTich']; ?> m2. <br />
    Số phòng tắm : <?php echo $row_rs_ketquatimkiem_dientich['SoPTam']; ?> phòng . <br />
    Số phòng ngũ : <?php echo $row_rs_ketquatimkiem_dientich['SoPNgu']; ?> phòng.
    <div class="clear"></div>
  </div>
  <?php } while ($row_rs_ketquatimkiem_dientich = mysql_fetch_assoc($rs_ketquatimkiem_dientich)); ?></body>
</html>
<?php
mysql_free_result($rs_ketquatimkiem_dientich);
?>
