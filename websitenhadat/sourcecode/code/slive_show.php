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
$query_rs_slideshow1 = "SELECT * FROM tin_tuc ORDER BY ID_TinTuc DESC LIMIT 0,4";
$rs_slideshow1 = mysql_query($query_rs_slideshow1, $conn_qlnd) or die(mysql_error());
$row_rs_slideshow1 = mysql_fetch_assoc($rs_slideshow1);
$totalRows_rs_slideshow1 = mysql_num_rows($rs_slideshow1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_slideshow_right = "SELECT * FROM tin_tuc ORDER BY ID_TinTuc DESC LIMIT 0,5";
$rs_slideshow_right = mysql_query($query_rs_slideshow_right, $conn_qlnd) or die(mysql_error());
$row_rs_slideshow_right = mysql_fetch_assoc($rs_slideshow_right);
$totalRows_rs_slideshow_right = mysql_num_rows($rs_slideshow_right);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT * FROM tin_tuc ORDER BY ID_TinTuc DESC LIMIT 0,5";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_slideshow_right.HinhMinhHoa}");
$objDynamicThumb1->setResize(70, 48, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("", "KT_thumbnail3");
$objDynamicThumb3->setFolder("images/");
$objDynamicThumb3->setRenameRule("{rs_slideshow_right.HinhMinhHoa}");
$objDynamicThumb3->setResize(80, 63, false);
$objDynamicThumb3->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("images/");
$objDynamicThumb2->setRenameRule("{rs_slideshow1.HinhMinhHoa}");
$objDynamicThumb2->setResize(290, 200, false);
$objDynamicThumb2->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="trang_slideshow.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="slideshow_zing/style.css"></script>
<script type="text/javascript" src="slideshow_zing/update.css"></script>
<script type="text/javascript" src="slideshow_zing/jquery.js"></script>
<script type="text/javascript" src="slideshow_zing/jquery-1.js"></script>
<style type="text/css">
<!--
.style1 {color: #0033FF}
-->
</style>
<link href="css/link.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="p7ttm/p7TTMscripts.js"></script>
<link href="p7ttm/p7TTM08.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
<!--
<?php 
$j=0;
do {  
$j++
?>
P7_opTTM('id:p7Tooltip_<?php echo $j; ?>','att:title','p7TTM08',5,300,4,1,1,0,0,0,300,0,1,1);
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
//-->
</script>
</head>

<body>

<div id="slide_main">
	<div id="slide_left">
	  <div id="hinh"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /></div>
      <div id="noidungtin">
      	<div id="tieude"><img src="slideshow_zing/ico_new.gif" />
        <span class="lienket2">
        <a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_slideshow1['ID_TinTuc']; ?>"><?php echo $row_rs_slideshow1['TieuDe']; ?></a></span>
        </div>
        <div class="clear"></div>
        <div id="trichdan"><?php echo $row_rs_slideshow1['TrichDanTin']; ?></div>
        <div id="button">
          <div align="right"><img src="slideshow_zing/prev.gif" width="20" height="19" /><img src="slideshow_zing/pause.gif" width="20" height="19" /><img src="slideshow_zing/next.gif" width="20" height="19" /></div>
        </div>
      </div>
	</div>
    <script type="text/javascript"> var newsoption1={firstname:"hinh",secondname:"noidung", thirdname:"button", newsspeed:'6000', imagedir:'slideshow_zing/', mouseover:false }; $init_news(newsoption1);</script>
    
    <div id="slide_right">
      <div id="show_tindoc"> 
<?php
		$i=0;
		 do {
		 $i++;
		  ?>
        <img src="<?php echo $objDynamicThumb1->Execute(); ?>" hspace="5" vspace="5" border="0" align="left" /><span class="lienket2"><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_slideshow_right['ID_TinTuc']; ?>" title="<img src=<?php echo $objDynamicThumb3->Execute(); ?> border=0 hspace=3 align=left /><?php echo $row_rs_slideshow_right['TrichDanTin']; ?>" class="p7TTM_trg" id="p7Tooltip_<?php echo $i; ?>"><?php echo $row_rs_slideshow_right['TieuDe']; ?></a></span>
        <div class="clear"></div>
        <?php } while ($row_rs_slideshow_right = mysql_fetch_assoc($rs_slideshow_right)); ?></div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_slideshow1);

mysql_free_result($rs_slideshow_right);

mysql_free_result($Recordset1);
?>
