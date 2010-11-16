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
$query_rs_nhadat = "SELECT * FROM nha_dat ORDER BY ID_NhaDat DESC LIMIT 0,4";
$rs_nhadat = mysql_query($query_rs_nhadat, $conn_qlnd) or die(mysql_error());
$row_rs_nhadat = mysql_fetch_assoc($rs_nhadat);
$totalRows_rs_nhadat = mysql_num_rows($rs_nhadat);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT * FROM nha_dat ORDER BY ID_NhaDat DESC LIMIT 0,4";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_nhadat.HinhAnh}");
$objDynamicThumb1->setResize(80, 56, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("images/");
$objDynamicThumb2->setRenameRule("{Recordset2.HinhAnh}");
$objDynamicThumb2->setResize(390, 260, false);
$objDynamicThumb2->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Featured Content Slider Using jQuery</title>
<link rel="stylesheet" type="text/css" href="featured-content-slider/style.css" />
<script type="text/javascript" src="featured-content-slider/js/jquery.min.js" ></script>
<script type="text/javascript" src="featured-content-slider/js/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 3000, true);
	});
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
<link href="css/xq.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="featured-content-slider/style.css"></script>
<link href="css/linkxanh.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>		
<div id="featured" >
<ul class="ui-tabs-nav">
	        <?php 
			$i=0;
			do { 
			$i++;
			?>
            <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $i;?>"><a href="#fragment-<?php echo $i; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a>            </li>
            <?php } while ($row_rs_nhadat = mysql_fetch_assoc($rs_nhadat)); ?>
          </ul>
  <!-- First Content -->	          
<?php 
		$dem=0;
		do { 
		$dem++;
		?>
        <div id="fragment-<?php echo $dem; ?>" class="ui-tabs-panel" style=""><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" />
<div class="info style1" >
<p>
              <?php echo $row_Recordset2['TieuDe']; ?><br />
Diện tích : <?php echo $row_Recordset2['DienTich']; ?> m2&nbsp;&nbsp;&nbsp; Tiền thuê : <?php echo $row_Recordset2['TienThue']; ?> triệu/tháng    
</p>
      </div>
  </div>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>               
</div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_nhadat);

mysql_free_result($Recordset2);
?>
