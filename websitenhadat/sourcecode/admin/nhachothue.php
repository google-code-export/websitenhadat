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
$query_rs_nhachothue = "SELECT * FROM nha_dat ORDER BY ID_NhaDat ASC LIMIT 0,8";
$rs_nhachothue = mysql_query($query_rs_nhachothue, $conn_qlnd) or die(mysql_error());
$row_rs_nhachothue = mysql_fetch_assoc($rs_nhachothue);
$totalRows_rs_nhachothue = mysql_num_rows($rs_nhachothue);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT * FROM nha_dat ORDER BY ID_NhaDat DESC LIMIT 0,6";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("", "KT_thumbnail3");
$objDynamicThumb3->setFolder("images/");
$objDynamicThumb3->setRenameRule("{rs_nhachothue.HinhAnh}");
$objDynamicThumb3->setResize(80, 63, false);
$objDynamicThumb3->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb4 = new tNG_DynamicThumbnail("", "KT_thumbnail4");
$objDynamicThumb4->setFolder("images/");
$objDynamicThumb4->setRenameRule("{rs_nhachothue.HinhAnh}");
$objDynamicThumb4->setResize(240, 170, false);
$objDynamicThumb4->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/nhadat.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="p7ttm/p7TTMscripts.js"></script>
<link href="p7ttm/p7TTM01.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
<!--
<?php 
$j=0;
do { 
$j++;
?>
P7_opTTM('id:p7Tooltip_<?php echo $j; ?>','att:title','p7TTM01',5,300,4,1,1,0,0,0,100,0,1,1);
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
//-->
</script>
</head>

<body>
<div id="noidung">
    <?php
	$i=0;
  do { 
  $i++;
  // horizontal looper version 3
?>      
<div id="box">
              <div id="tieude"><img src="images_gd/bizweb_icon_target(1).jpg" width="16" height="15" border="0" /></a>
                <span class="lienket"><a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_nhachothue['ID_NhaDat']; ?>"><?php echo $row_rs_nhachothue['TieuDe']; ?></a></span>
                <?php 
// Show IF Conditional region1 
if (@$row_rs_nhachothue['NhaMoi'] == 1) {
?>
                <img src="images_gd/new.jpg" width="33" height="16" />
                  <?php } 
// endif Conditional region1
?></div>
    <div class="clear"></div>
        <div id="hinh"><a href="index_noidung.php?mod=chitietnhadat&amp;ID_NhaDat=<?php echo $row_rs_nhachothue['ID_NhaDat']; ?>"><img src="<?php echo $objDynamicThumb3->Execute(); ?>" name="p7Tooltip_<?php echo $i; ?>" vspace="3" border="0" class="p7TTM_trg" id="p7Tooltip_<?php echo $i; ?>" title="<?php echo $row_rs_nhachothue['TieuDe']; ?><img src=<?php echo $objDynamicThumb4->Execute(); ?> border=0 align=middle hspace=3 vspace=3 />" /></a></div>      
<div id="gioithieu">Diện Tích :<?php echo $row_rs_nhachothue['DienTich']; ?> m2<br />
    Số PT :<?php echo $row_rs_nhachothue['SoPNgu']; ?>&nbsp;phòng<br />
    Số PN :<?php echo $row_rs_nhachothue['SoPTam']; ?>&nbsp;phòng<br />
    Tiền Thuê :<?php echo $row_rs_nhachothue['TienThue']; ?> triệu/tháng<br />
    </div>
        
  </div>
      <?php
    $row_rs_nhachothue = mysql_fetch_assoc($rs_nhachothue);
    if (!isset($nested_rs_nhachothue)) {
      $nested_rs_nhachothue= 1;
    }
    if (isset($row_rs_nhachothue) && is_array($row_rs_nhachothue) && $nested_rs_nhachothue++ % 2==0) {
      echo "<div class=clear></div>";
    }
  } while ($row_rs_nhachothue); //end horizontal looper version 3
?>
</div>
<div class="clear">
<div id="xemhet">
  <a href="index_tintuc.php?mod=xemhetnha">Xem tất cả nhà...
</a></div>
</body>
</html>
<?php
mysql_free_result($rs_nhachothue);

mysql_free_result($Recordset1);
?>
