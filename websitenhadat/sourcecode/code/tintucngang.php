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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rs_tintucngang = 10;
$pageNum_rs_tintucngang = 0;
if (isset($_GET['pageNum_rs_tintucngang'])) {
  $pageNum_rs_tintucngang = $_GET['pageNum_rs_tintucngang'];
}
$startRow_rs_tintucngang = $pageNum_rs_tintucngang * $maxRows_rs_tintucngang;

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_tintucngang = "SELECT ID_TinTuc, TieuDe, TrichDanTin, NoiDung, HinhMinhHoa, TacGia, TinMoi FROM tin_tuc ORDER BY ID_TinTuc DESC";
$query_limit_rs_tintucngang = sprintf("%s LIMIT %d, %d", $query_rs_tintucngang, $startRow_rs_tintucngang, $maxRows_rs_tintucngang);
$rs_tintucngang = mysql_query($query_limit_rs_tintucngang, $conn_qlnd) or die(mysql_error());
$row_rs_tintucngang = mysql_fetch_assoc($rs_tintucngang);

if (isset($_GET['totalRows_rs_tintucngang'])) {
  $totalRows_rs_tintucngang = $_GET['totalRows_rs_tintucngang'];
} else {
  $all_rs_tintucngang = mysql_query($query_rs_tintucngang);
  $totalRows_rs_tintucngang = mysql_num_rows($all_rs_tintucngang);
}
$totalPages_rs_tintucngang = ceil($totalRows_rs_tintucngang/$maxRows_rs_tintucngang)-1;

$queryString_rs_tintucngang = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs_tintucngang") == false && 
        stristr($param, "totalRows_rs_tintucngang") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs_tintucngang = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs_tintucngang = sprintf("&totalRows_rs_tintucngang=%d%s", $totalRows_rs_tintucngang, $queryString_rs_tintucngang);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/");
$objDynamicThumb1->setRenameRule("{rs_tintucngang.HinhMinhHoa}");
$objDynamicThumb1->setResize(110, 80, false);
$objDynamicThumb1->setWatermark(false);

$TFM_LimitLinksEndCount = 5;
$TFM_temp = $pageNum_rs_tintucngang + 1;
$TFM_startLink = max(1,$TFM_temp - intval($TFM_LimitLinksEndCount/2));
$TFM_temp = $TFM_startLink + $TFM_LimitLinksEndCount - 1;
$TFM_endLink = min($TFM_temp, $totalPages_rs_tintucngang + 1);
if($TFM_endLink != $TFM_temp) $TFM_startLink = max(1,$TFM_endLink - $TFM_LimitLinksEndCount + 1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/link.css" rel="stylesheet" type="text/css" />
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php do { ?>
  <table style="margin-top:7px" width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><span class="lienket1"><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_tintucngang['ID_TinTuc']; ?>"><img src="images_gd/bizweb_rss_icon(1).jpg" width="20" height="20" border="0" /></a></span><span class="lienket"><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_tintucngang['ID_TinTuc']; ?>"><?php echo $row_rs_tintucngang['TieuDe']; ?></a></span><span class="lienket1"><a href="index_tintuc.php?mod=tintucchitiet&amp;ID_TinTuc=<?php echo $row_rs_tintucngang['ID_TinTuc']; ?>">
            <?php 
// Show IF Conditional region1 
if (@$row_rs_tintucngang['TinMoi'] == 1) {
?>
          <img src="images_gd/new.jpg" width="33" height="16" border="0" />
          <?php } 
// endif Conditional region1
?>
          </a></span></td>
    </tr>
    <tr>
      <td width="120"><div align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" vspace="5" border="0" /></div></td>
      <td valign="top"><?php echo $row_rs_tintucngang['TrichDanTin']; ?></td>
    </tr>
      </table>
  <?php } while ($row_rs_tintucngang = mysql_fetch_assoc($rs_tintucngang)); ?>
  <p align="center">Trang 
    <?php
for ($i = $TFM_startLink; $i <= $TFM_endLink; $i++) {
  $TFM_LimitPageEndCount = $i -1;
  if($TFM_LimitPageEndCount != $pageNum_rs_tintucngang) {
    printf('<a href="'."%s?pageNum_rs_tintucngang=%d%s", $currentPage, $TFM_LimitPageEndCount, $queryString_rs_tintucngang.'">');
    echo "$i</a>";
  }else{
    echo "<strong>$i</strong>";
  }
if($i != $TFM_endLink) echo(" |");}
?></p>
</body>
</html>
<?php
mysql_free_result($rs_tintucngang);
?>
