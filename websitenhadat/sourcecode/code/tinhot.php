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
$query_rs_tinhot = "SELECT ID_TinTuc, TieuDe, HinhMinhHoa ,TrichDanTin, TinMoi FROM tin_tuc WHERE TinHot=1 ORDER BY ID_TinTuc DESC LIMIT 0,8";
$rs_tinhot = mysql_query($query_rs_tinhot, $conn_qlnd) or die(mysql_error());
$row_rs_tinhot = mysql_fetch_assoc($rs_tinhot);
$totalRows_rs_tinhot = mysql_num_rows($rs_tinhot);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT ID_TinTuc, TieuDe, HinhMinhHoa ,TrichDanTin FROM tin_tuc WHERE TinHot=1 ORDER BY ID_TinTuc DESC LIMIT 0,8";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_tinhot.HinhMinhHoa}");
$objDynamicThumb1->setResize(70, 43, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("images/");
$objDynamicThumb2->setRenameRule("{rs_tinhot.HinhMinhHoa}");
$objDynamicThumb2->setResize(80, 63, false);
$objDynamicThumb2->setWatermark(false);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/link.css" rel="stylesheet" type="text/css" />
<link href="p7ttm/p7TTM08.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="p7ttm/p7TTMscripts.js"></script>
<script type="text/javascript">
<!--
<?php
$j=0;
 do {
 $j++;
  ?>
P7_opTTM('id:p7Tooltip_<?php echo $j; ?>','att:title','p7TTM08',8,300,4,1,1,0,0,0,200,0,1,1);
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
//-->
</script>
</head>

<body>

<?php
$i=0; //them vao
 do { 
 $i++; //them vao
  ?> 
  <table width="200" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="80" align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" vspace="5" border="0"  /></td>
      <td valign="top" align="left"><span class="lienket"><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_tinhot['ID_TinTuc']; ?>" title="<img src='<?php echo $objDynamicThumb2->Execute(); ?>' border='0' vspace='2' hspace='3' align='left'/><?php echo $row_rs_tinhot['TrichDanTin']; ?>" class="p7TTM_trg" id="p7Tooltip_<?php echo $i; ?>"><?php echo $row_rs_tinhot['TieuDe']; ?></a></span><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_tinhot['ID_TinTuc']; ?>" title="<img src='<?php echo $objDynamicThumb2->Execute(); ?>' border='0' vspace='2' hspace='3' align='left'/><?php echo $row_rs_tinhot['TrichDanTin']; ?>" class="p7TTM_trg" id="p7Tooltip_<?php echo $i; ?>"></a><span class="lienket1"><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_tinhot['ID_TinTuc']; ?>" title="<img src='<?php echo $objDynamicThumb2->Execute(); ?>' border='0' vspace='2' hspace='3' align='left'/><?php echo $row_rs_tinhot['TrichDanTin']; ?>" class="p7TTM_trg">
            <?php 
// Show IF Conditional region1 
if (@$row_rs_tinhot['TinMoi'] == 1) {
?>
          <img src="images_gd/new.jpg" width="33" height="16" border="0" />
          <?php } 
// endif Conditional region1
?>
          </a></span></td>
    </tr>
  </table>
<?php }
   while ($row_rs_tinhot = mysql_fetch_assoc($rs_tinhot)); ?>
</body>
</html>
<?php
mysql_free_result($rs_tinhot);

mysql_free_result($Recordset1);
?>
