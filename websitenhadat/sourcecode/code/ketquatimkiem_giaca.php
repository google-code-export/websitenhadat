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

$maxRows_rs_timkiem_giaca = 10;
$pageNum_rs_timkiem_giaca = 0;
if (isset($_GET['pageNum_rs_timkiem_giaca'])) {
  $pageNum_rs_timkiem_giaca = $_GET['pageNum_rs_timkiem_giaca'];
}
$startRow_rs_timkiem_giaca = $pageNum_rs_timkiem_giaca * $maxRows_rs_timkiem_giaca;

$colname1_rs_timkiem_giaca = "1";
if (isset($_GET["giamin"])) {
  $colname1_rs_timkiem_giaca = $_GET["giamin"];
}
$colname2_rs_timkiem_giaca = "50";
if (isset($_GET["giamax"])) {
  $colname2_rs_timkiem_giaca = $_GET["giamax"];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_timkiem_giaca = sprintf("SELECT nha_dat.TieuDe, nha_dat.SoPTam, nha_dat.SoPNgu, nha_dat.TienThue, nha_dat.DatCoc, nha_dat.DienTich, nha_dat.HinhAnh, nha_dat.MoTaChiTiet, nha_dat.ID_NhaDat FROM nha_dat WHERE nha_dat.TienThue BETWEEN %s AND %s ORDER BY nha_dat.TienThue DESC", GetSQLValueString($colname1_rs_timkiem_giaca, "double"),GetSQLValueString($colname2_rs_timkiem_giaca, "double"));
$query_limit_rs_timkiem_giaca = sprintf("%s LIMIT %d, %d", $query_rs_timkiem_giaca, $startRow_rs_timkiem_giaca, $maxRows_rs_timkiem_giaca);
$rs_timkiem_giaca = mysql_query($query_limit_rs_timkiem_giaca, $conn_qlnd) or die(mysql_error());
$row_rs_timkiem_giaca = mysql_fetch_assoc($rs_timkiem_giaca);

if (isset($_GET['totalRows_rs_timkiem_giaca'])) {
  $totalRows_rs_timkiem_giaca = $_GET['totalRows_rs_timkiem_giaca'];
} else {
  $all_rs_timkiem_giaca = mysql_query($query_rs_timkiem_giaca);
  $totalRows_rs_timkiem_giaca = mysql_num_rows($all_rs_timkiem_giaca);
}
$totalPages_rs_timkiem_giaca = ceil($totalRows_rs_timkiem_giaca/$maxRows_rs_timkiem_giaca)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_timkiem_giaca.HinhAnh}");
$objDynamicThumb1->setResize(120, 90, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/nhadat.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php do { ?>
    <?php 
// Show IF Conditional region1 
if (@$row_rs_timkiem_giaca['TieuDe'] != "") {
?>
      <div id="ketquatimkiem_layout"> <img src="<?php echo $objDynamicThumb1->Execute(); ?>" hspace="5" vspace="5" border="0" align="left" /><span class="lienket1"><a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_timkiem_giaca['ID_NhaDat']; ?>"><?php echo $row_rs_timkiem_giaca['TieuDe']; ?></a></span><br />
        Tiền thuê : <?php echo $row_rs_timkiem_giaca['TienThue']; ?>&nbsp;&nbsp;triệu/tháng&nbsp;&nbsp;Đặt cọc : <?php echo $row_rs_timkiem_giaca['DatCoc']; ?> triệu<br />
        Số phòng tắm : <?php echo $row_rs_timkiem_giaca['SoPTam']; ?>&nbsp;&nbsp;phòng &nbsp;&nbsp;<br />
        Số phòng ngủ: <?php echo $row_rs_timkiem_giaca['SoPNgu']; ?> &nbsp;phòng
        <div class="clear"></div>
      </div>
      <?php 
// else Conditional region1
} else { ?>
      Không tìm thấy nhà đất nào theo yêu cầu của bạn!
  <?php } 
// endif Conditional region1
?>
    <?php } while ($row_rs_timkiem_giaca = mysql_fetch_assoc($rs_timkiem_giaca)); ?>
</body>
</html>
<?php
mysql_free_result($rs_timkiem_giaca);
?>
