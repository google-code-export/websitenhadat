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
$query_rs_slide_nhadat = "SELECT TieuDe, TienThue, DatCoc, DienTich, HinhAnh FROM nha_dat ORDER BY ID_NhaDat DESC LIMIT 0,4";
$rs_slide_nhadat = mysql_query($query_rs_slide_nhadat, $conn_qlnd) or die(mysql_error());
$row_rs_slide_nhadat = mysql_fetch_assoc($rs_slide_nhadat);
$totalRows_rs_slide_nhadat = mysql_num_rows($rs_slide_nhadat);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TieuDe, TienThue, DatCoc, DienTich, HinhAnh FROM nha_dat ORDER BY ID_NhaDat DESC LIMIT 0,4";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TieuDe, TienThue, DatCoc, DienTich, HinhAnh FROM nha_dat ORDER BY ID_NhaDat DESC LIMIT 0,4";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_slide_nhadat.HinhAnh}");
$objDynamicThumb1->setResize(75, 55, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("images/");
$objDynamicThumb2->setRenameRule("{Recordset1.HinhAnh}");
$objDynamicThumb2->setResize(230, 200, false);
$objDynamicThumb2->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>vietchuyen.org</title>
<link href="trangtri.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* Reset style */
* { margin:0; padding:0; word-break:break-all; }
body { background:#FFF; color:#333; font:12px/1.6em Helvetica, Arial, sans-serif; }
h1, h2, h3, h4, h5, h6 { font-size:1em; }
a { color:#0287CA; text-decoration:none; }
	a:hover { text-decoration:underline; }
ul, li { list-style:none; }
fieldset, img { border:none; }
legend { display:none; }
em, strong, cite, th { font-style:normal; font-weight:normal; }
input, textarea, select, button { font:12px Helvetica, Arial, sans-serif; }
table { border-collapse:collapse; }
html { overflow:-moz-scrollbars-vertical; } /*Always show Firefox scrollbar*/

/* iFocus style */
#ifocus { width:500px; height:250px; margin:20px; border:1px solid #DEDEDE; background:#F8F8F8; }
	#ifocus_pic { display:inline; position:relative; float:left; width:380px; height:250px; overflow:hidden; margin:10px 0 0 10px; }
		#ifocus_piclist { position:absolute; }
		#ifocus_piclist li { width:380px; height:250px; overflow:hidden; }
		#ifocus_piclist img { width:380px; height:250px; }
	#ifocus_btn { display:inline; float:right; width:90px; margin:10px 10px 0 0; }
		#ifocus_btn li { width:90px; height:50px; cursor:pointer; opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=50); }
		#ifocus_btn img { width:75px; height:45px; margin:7px 0 0 11px; }
		#ifocus_btn .current { background: url(images/ifocus_btn_bg_cu.gif) no-repeat; opacity:1; -moz-opacity:1; filter:alpha(opacity=100); }
	#ifocus_opdiv {
	position:absolute;
	left:0;
	bottom:-6px;
	width:380px;
	height:67px;
	background:#000;
	opacity:0.5;
	-moz-opacity:0.5;
	filter:alpha(opacity=30);
}
	#ifocus_tx {
	position:absolute;
	left:8px;
	bottom:5px;
	color:#FFF;
	width: 399px;
	height:55px;
	overflow:hidden;
}
		#ifocus_tx .normal { display:none; }
</style>
<script type="text/javascript" src="Scripts/tinmoinhat.js"></script>
</head>
<body>
<div id="ifocus">
  
    <div id="ifocus_pic">
      <div id="ifocus_piclist" style="left:0; top:0;">
        <ul>
        <?php do { ?>
          <li><a href="#" title="" target=_blank><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></a></li>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </ul>
      </div>
      <div id="ifocus_opdiv"></div>
      <div id="ifocus_tx">
        <ul>
        <?php do { ?>
          <li class="current"><?php echo $row_Recordset2['TieuDe']; ?><br />Diện tích : <?php echo $row_Recordset2['DienTich']; ?> m2 <br />Tiền thuê : <?php echo $row_Recordset2['TienThue']; ?> triệu/tháng <br />Đặt cọc : <?php echo $row_Recordset2['DatCoc']; ?> triệu </a>
          </li>
          <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
        </ul>
      </div>
    </div>
        <div id="ifocus_btn">
		<ul>
          <?php do { ?>
          <li class="current"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></li>
            <?php } while ($row_rs_slide_nhadat = mysql_fetch_assoc($rs_slide_nhadat)); ?>
            </ul>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_slide_nhadat);
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
