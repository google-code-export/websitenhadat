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

$maxRows_rs_timkiem_1 = 10;
$pageNum_rs_timkiem_1 = 0;
if (isset($_GET['pageNum_rs_timkiem_1'])) {
  $pageNum_rs_timkiem_1 = $_GET['pageNum_rs_timkiem_1'];
}
$startRow_rs_timkiem_1 = $pageNum_rs_timkiem_1 * $maxRows_rs_timkiem_1;

$KTColParam1_rs_timkiem_1 = "4";
if (isset($_GET["loainha"])) {
  $KTColParam1_rs_timkiem_1 = $_GET["loainha"];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_timkiem_1 = sprintf("SELECT nha_dat.TieuDe, nha_dat.SoPTam, nha_dat.SoPNgu, nha_dat.TienThue, nha_dat.DatCoc, nha_dat.DienTich, nha_dat.HinhAnh, nha_dat.MoTaChiTiet, nha_dat.ID_NhaDat, nha_dat.ID_LoaiNha FROM nha_dat WHERE nha_dat.ID_LoaiNha=%s ", GetSQLValueString($KTColParam1_rs_timkiem_1, "int"));
$query_limit_rs_timkiem_1 = sprintf("%s LIMIT %d, %d", $query_rs_timkiem_1, $startRow_rs_timkiem_1, $maxRows_rs_timkiem_1);
$rs_timkiem_1 = mysql_query($query_limit_rs_timkiem_1, $conn_qlnd) or die(mysql_error());
$row_rs_timkiem_1 = mysql_fetch_assoc($rs_timkiem_1);

if (isset($_GET['totalRows_rs_timkiem_1'])) {
  $totalRows_rs_timkiem_1 = $_GET['totalRows_rs_timkiem_1'];
} else {
  $all_rs_timkiem_1 = mysql_query($query_rs_timkiem_1);
  $totalRows_rs_timkiem_1 = mysql_num_rows($all_rs_timkiem_1);
}
$totalPages_rs_timkiem_1 = ceil($totalRows_rs_timkiem_1/$maxRows_rs_timkiem_1)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_timkiem_1.HinhAnh}");
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
if (@$row_rs_timkiem_1['TieuDe'] != "") {
?>
    <div id="ketquatimkiem_layout">
      <img src="<?php echo $objDynamicThumb1->Execute(); ?>" hspace="5" vspace="5" border="0" align="left" />
      <span class="lienket1"> <a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_timkiem_1['ID_NhaDat']; ?>"><?php echo $row_rs_timkiem_1['TieuDe']; ?></a></span><br />
        Tiền thuê : <?php echo $row_rs_timkiem_1['TienThue']; ?>&nbsp;&nbsp;triệu/tháng&nbsp;&nbsp;Đặt cọc : <?php echo $row_rs_timkiem_1['DatCoc']; ?> triệu<br />
        Số phòng tắm : <?php echo $row_rs_timkiem_1['SoPTam']; ?>&nbsp;&nbsp;&nbsp;&nbsp;Số phòng ngủ: <?php echo $row_rs_timkiem_1['SoPNgu']; ?>
        <div class="clear"></div>
          </div>
    <?php 
// else Conditional region1
} else { ?>
      Không tìm thấy nhà đất nào theo dữ liệu tìm kiếm của bạn!
  <?php } 
// endif Conditional region1
?>
    <?php } while ($row_rs_timkiem_1 = mysql_fetch_assoc($rs_timkiem_1)); ?></body>
</html>
<?php
mysql_free_result($rs_timkiem_1);
?>
