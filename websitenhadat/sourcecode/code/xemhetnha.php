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
$query_rs_xemhetnha = "SELECT ID_NhaDat, TieuDe, SoPTam, SoPNgu, TienThue, DatCoc, DienTich, HinhAnh, NhaMoi FROM nha_dat ORDER BY CapDoUuTien ASC";
$rs_xemhetnha = mysql_query($query_rs_xemhetnha, $conn_qlnd) or die(mysql_error());
$row_rs_xemhetnha = mysql_fetch_assoc($rs_xemhetnha);
$totalRows_rs_xemhetnha = mysql_num_rows($rs_xemhetnha);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_xemhetnha.HinhAnh}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xem tat ca nha dat hien co</title>
<link href="css/nhadat.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
</head>
<!--da fix loi hinh anh-->
<body>
    <div id="xemhetnha">
      <?php
  do {
?>
      <div id="xemhetnha_thongtin">
        <div id="xemhetnha_thongtin_tieude"> <span class="lienket"><a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_nhachothue['ID_NhaDat']; ?>"><img src="images_gd/bizweb_icon_target(1).jpg" width="16" height="15" border="0" /></a><a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_xemhetnha['ID_NhaDat']; ?>"><?php echo $row_rs_xemhetnha['TieuDe']; ?></a></span>
            <?php 
// Show IF Conditional region1 
if (@$row_rs_xemhetnha['NhaMoi'] == 1) {
?>
              <img src="images_gd/new.jpg" width="33" height="16" border="0" />
              <?php } 
// endif Conditional region1
?>
        </div>
        <div id="xemhetnha_thongtin_noidung"> <img src="<?php echo $objDynamicThumb1->Execute(); ?>" hspace="4" vspace="4" border="0" align="left" /> Diện tích : <?php echo $row_rs_xemhetnha['DienTich']; ?>&nbsp;m2<br />
          Giá thuê : <?php echo $row_rs_xemhetnha['TienThue']; ?> triệu/tháng &nbsp;<br />
          Đặt cọc :<?php echo $row_rs_xemhetnha['DatCoc']; ?> &nbsp; triệu<br />
          Số Phòng tắm : <?php echo $row_rs_xemhetnha['SoPTam']; ?> &nbsp;phòng &nbsp;Số phòng ngũ : <?php echo $row_rs_xemhetnha['SoPNgu']; ?> &nbsp;phòng<br />
        </div>
      </div>
      <?php
    $row_rs_xemhetnha = mysql_fetch_assoc($rs_xemhetnha);
    if (!isset($nested_rs_xemhetnha)) {
      $nested_rs_xemhetnha= 1;
    }
    if (isset($row_rs_xemhetnha) && is_array($row_rs_xemhetnha) && $nested_rs_xemhetnha++ % 2==0) {
      echo "<div class=clear></div>";
    }
	?>
   <?php
} while ($row_rs_xemhetnha); //end horizontal looper version 3
?>
</div>
</body>
</html>
<?php
mysql_free_result($rs_xemhetnha);
?>
