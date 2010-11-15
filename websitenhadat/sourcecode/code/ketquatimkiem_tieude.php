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

$maxRows_rs_timkiem_tieude = 10;
$pageNum_rs_timkiem_tieude = 0;
if (isset($_GET['pageNum_rs_timkiem_tieude'])) {
  $pageNum_rs_timkiem_tieude = $_GET['pageNum_rs_timkiem_tieude'];
}
$startRow_rs_timkiem_tieude = $pageNum_rs_timkiem_tieude * $maxRows_rs_timkiem_tieude;

$KTColParam1_rs_timkiem_tieude = "phong";
if (isset($_GET["tieude"])) {
  $KTColParam1_rs_timkiem_tieude = $_GET["tieude"];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_timkiem_tieude = sprintf("SELECT nha_dat.ID_NhaDat, nha_dat.TieuDe, nha_dat.Duong, nha_dat.SoPNgu, nha_dat.SoPTam, nha_dat.TienThue, nha_dat.DatCoc, nha_dat.DienTich, nha_dat.HinhAnh, nha_dat.MoTaChiTiet FROM nha_dat WHERE nha_dat.TieuDe LIKE %s ", GetSQLValueString("%" . $KTColParam1_rs_timkiem_tieude . "%", "text"));
$query_limit_rs_timkiem_tieude = sprintf("%s LIMIT %d, %d", $query_rs_timkiem_tieude, $startRow_rs_timkiem_tieude, $maxRows_rs_timkiem_tieude);
$rs_timkiem_tieude = mysql_query($query_limit_rs_timkiem_tieude, $conn_qlnd) or die(mysql_error());
$row_rs_timkiem_tieude = mysql_fetch_assoc($rs_timkiem_tieude);

if (isset($_GET['totalRows_rs_timkiem_tieude'])) {
  $totalRows_rs_timkiem_tieude = $_GET['totalRows_rs_timkiem_tieude'];
} else {
  $all_rs_timkiem_tieude = mysql_query($query_rs_timkiem_tieude);
  $totalRows_rs_timkiem_tieude = mysql_num_rows($all_rs_timkiem_tieude);
}
$totalPages_rs_timkiem_tieude = ceil($totalRows_rs_timkiem_tieude/$maxRows_rs_timkiem_tieude)-1;

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_timkiem_tieude.HinhAnh}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php do { ?>
  <?php 
// Show IF Conditional region1 
if (@$row_rs_timkiem_tieude['TieuDe'] != "") {
?>
    <div id="timkiem_tieude"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" hspace="5" vspace="5" border="0" align="left" />
     <span class="lienket">
     <a href="index.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_timkiem_tieude['ID_NhaDat']; ?>"><?php echo $row_rs_timkiem_tieude['TieuDe']; ?></a></span><br />
      Tiền thuê : <?php echo $row_rs_timkiem_tieude['TienThue']; ?> triệu/tháng. Đặt cọc : <?php echo $row_rs_timkiem_tieude['DatCoc']; ?>  triệu . &nbsp;Số phòng tắm : <?php echo $row_rs_timkiem_tieude['SoPTam']; ?> phòng . Số phòng ngũ : <?php echo $row_rs_timkiem_tieude['SoPNgu']; ?> phòng
      <div class="clear"></div>
    </div>
    <?php 
// else Conditional region1
} else { ?>
    Không tìm thấy thông tin bạn cần tìm !
     <?php } 
// endif Conditional region1
?>
  <?php } while ($row_rs_timkiem_tieude = mysql_fetch_assoc($rs_timkiem_tieude)); ?>
</body>
</html>
<?php
mysql_free_result($rs_timkiem_tieude);
?>
