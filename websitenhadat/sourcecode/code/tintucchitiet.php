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

$colname_rs_tintucchitiet = "-1";
if (isset($_GET['ID_TinTuc'])) {
  $colname_rs_tintucchitiet = $_GET['ID_TinTuc'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_tintucchitiet = sprintf("SELECT * FROM tin_tuc WHERE ID_TinTuc = %s", GetSQLValueString($colname_rs_tintucchitiet, "int"));
$rs_tintucchitiet = mysql_query($query_rs_tintucchitiet, $conn_qlnd) or die(mysql_error());
$row_rs_tintucchitiet = mysql_fetch_assoc($rs_tintucchitiet);
$totalRows_rs_tintucchitiet = mysql_num_rows($rs_tintucchitiet);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_tintucchitiet.HinhMinhHoa}");
$objDynamicThumb1->setResize(120, 0, true);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/trang_tintuc.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="520" border="0" cellpadding="0" cellspacing="0">
<tr>
    	<td colspan="2">
        <span class="chu"><?php echo $row_rs_tintucchitiet['TieuDe']; ?></span>		</td>
  </tr>
    <tr>
        <td width="140"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" align="middle" /></td>
      <td valign="top"><?php echo $row_rs_tintucchitiet['TrichDanTin']; ?>
      </td>
    </tr>
    <tr>
    <td  colspan="2"><?php echo $row_rs_tintucchitiet['NoiDung']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs_tintucchitiet);
?>
