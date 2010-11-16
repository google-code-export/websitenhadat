<?php require_once('../Connections/conn_qlnd.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_conn_qlnd = new KT_connection($conn_qlnd, $database_conn_qlnd);

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

// Filter
$tfi_listthong_tin_tim_kiem1 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listthong_tin_tim_kiem1");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.GioiTinh", "STRING_TYPE", "GioiTinh", "%");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.NgaySinh", "DATE_TYPE", "NgaySinh", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.GiaThapNhat", "NUMERIC_TYPE", "GiaThapNhat", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.GiaCaoNhat", "NUMERIC_TYPE", "GiaCaoNhat", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.DTNhoNhat", "NUMERIC_TYPE", "DTNhoNhat", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.DTLonNhat", "NUMERIC_TYPE", "DTLonNhat", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.SoPTam", "NUMERIC_TYPE", "SoPTam", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.SoPNgu", "NUMERIC_TYPE", "SoPNgu", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("quan.ID_Quan", "NUMERIC_TYPE", "ID_Quan", "=");
$tfi_listthong_tin_tim_kiem1->addColumn("loai_nha.ID_LoaiNha", "NUMERIC_TYPE", "ID_LoaiNha", "=");
$tfi_listthong_tin_tim_kiem1->Execute();

// Sorter
$tso_listthong_tin_tim_kiem1 = new TSO_TableSorter("rsthong_tin_tim_kiem1", "tso_listthong_tin_tim_kiem1");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.GioiTinh");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.NgaySinh");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.GiaThapNhat");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.GiaCaoNhat");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.DTNhoNhat");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.DTLonNhat");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.SoPTam");
$tso_listthong_tin_tim_kiem1->addColumn("thong_tin_tim_kiem.SoPNgu");
$tso_listthong_tin_tim_kiem1->addColumn("quan.TenQuan");
$tso_listthong_tin_tim_kiem1->addColumn("loai_nha.TenLoaiNha");
$tso_listthong_tin_tim_kiem1->setDefault("thong_tin_tim_kiem.NgaySinh DESC");
$tso_listthong_tin_tim_kiem1->Execute();

// Navigation
$nav_listthong_tin_tim_kiem1 = new NAV_Regular("nav_listthong_tin_tim_kiem1", "rsthong_tin_tim_kiem1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TenQuan, ID_Quan FROM quan ORDER BY TenQuan";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TenLoaiNha, ID_LoaiNha FROM loai_nha ORDER BY TenLoaiNha";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

//NeXTenesio3 Special List Recordset
$maxRows_rsthong_tin_tim_kiem1 = $_SESSION['max_rows_nav_listthong_tin_tim_kiem1'];
$pageNum_rsthong_tin_tim_kiem1 = 0;
if (isset($_GET['pageNum_rsthong_tin_tim_kiem1'])) {
  $pageNum_rsthong_tin_tim_kiem1 = $_GET['pageNum_rsthong_tin_tim_kiem1'];
}
$startRow_rsthong_tin_tim_kiem1 = $pageNum_rsthong_tin_tim_kiem1 * $maxRows_rsthong_tin_tim_kiem1;

// Defining List Recordset variable
$NXTFilter_rsthong_tin_tim_kiem1 = "1=1";
if (isset($_SESSION['filter_tfi_listthong_tin_tim_kiem1'])) {
  $NXTFilter_rsthong_tin_tim_kiem1 = $_SESSION['filter_tfi_listthong_tin_tim_kiem1'];
}
// Defining List Recordset variable
$NXTSort_rsthong_tin_tim_kiem1 = "thong_tin_tim_kiem.NgaySinh DESC";
if (isset($_SESSION['sorter_tso_listthong_tin_tim_kiem1'])) {
  $NXTSort_rsthong_tin_tim_kiem1 = $_SESSION['sorter_tso_listthong_tin_tim_kiem1'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rsthong_tin_tim_kiem1 = "SELECT thong_tin_tim_kiem.GioiTinh, thong_tin_tim_kiem.NgaySinh, thong_tin_tim_kiem.GiaThapNhat, thong_tin_tim_kiem.GiaCaoNhat, thong_tin_tim_kiem.DTNhoNhat, thong_tin_tim_kiem.DTLonNhat, thong_tin_tim_kiem.SoPTam, thong_tin_tim_kiem.SoPNgu, quan.TenQuan AS ID_Quan, loai_nha.TenLoaiNha AS ID_LoaiNha, thong_tin_tim_kiem.ID_ThongTin FROM (thong_tin_tim_kiem LEFT JOIN quan ON thong_tin_tim_kiem.ID_Quan = quan.ID_Quan) LEFT JOIN loai_nha ON thong_tin_tim_kiem.ID_LoaiNha = loai_nha.ID_LoaiNha WHERE {$NXTFilter_rsthong_tin_tim_kiem1} ORDER BY {$NXTSort_rsthong_tin_tim_kiem1}";
$query_limit_rsthong_tin_tim_kiem1 = sprintf("%s LIMIT %d, %d", $query_rsthong_tin_tim_kiem1, $startRow_rsthong_tin_tim_kiem1, $maxRows_rsthong_tin_tim_kiem1);
$rsthong_tin_tim_kiem1 = mysql_query($query_limit_rsthong_tin_tim_kiem1, $conn_qlnd) or die(mysql_error());
$row_rsthong_tin_tim_kiem1 = mysql_fetch_assoc($rsthong_tin_tim_kiem1);

if (isset($_GET['totalRows_rsthong_tin_tim_kiem1'])) {
  $totalRows_rsthong_tin_tim_kiem1 = $_GET['totalRows_rsthong_tin_tim_kiem1'];
} else {
  $all_rsthong_tin_tim_kiem1 = mysql_query($query_rsthong_tin_tim_kiem1);
  $totalRows_rsthong_tin_tim_kiem1 = mysql_num_rows($all_rsthong_tin_tim_kiem1);
}
$totalPages_rsthong_tin_tim_kiem1 = ceil($totalRows_rsthong_tin_tim_kiem1/$maxRows_rsthong_tin_tim_kiem1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listthong_tin_tim_kiem1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script><style type="text/css">
  /* Dynamic List row settings */
  .KT_col_GioiTinh {width:40px; overflow:hidden;}
  .KT_col_NgaySinh {width:100px; overflow:hidden;}
  .KT_col_GiaThapNhat {width:80px; overflow:hidden;}
  .KT_col_GiaCaoNhat {width:80px; overflow:hidden;}
  .KT_col_DTNhoNhat {width:80px; overflow:hidden;}
  .KT_col_DTLonNhat {width:80px; overflow:hidden;}
  .KT_col_SoPTam {width:70px; overflow:hidden;}
  .KT_col_SoPNgu {width:70px; overflow:hidden;}
  .KT_col_ID_Quan {width:50px; overflow:hidden;}
  .KT_col_ID_LoaiNha {width:80px; overflow:hidden;}
</style>

</head>

<body>
<div align="center">
<div class="KT_tng" id="listthong_tin_tim_kiem1">
<br />
 <span class="chu">QUẢN LÝ THÔNG TIN TÌM KIẾM</span>
  <br />
  <br />
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listthong_tin_tim_kiem1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listthong_tin_tim_kiem1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listthong_tin_tim_kiem1']; ?>
            <?php 
  // else Conditional region1
  } else { ?>
            <?php echo NXT_getResource("all"); ?>
            <?php } 
  // endif Conditional region1
?>
            <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listthong_tin_tim_kiem1'] == 1) {
?>
                            <a href="<?php echo $tfi_listthong_tin_tim_kiem1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listthong_tin_tim_kiem1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="GioiTinh" class="KT_sorter KT_col_GioiTinh <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.GioiTinh'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.GioiTinh'); ?>">Phái</a> </th>
            <th id="NgaySinh" class="KT_sorter KT_col_NgaySinh <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.NgaySinh'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.NgaySinh'); ?>">Ngày sinh</a> </th>
            <th id="GiaThapNhat" class="KT_sorter KT_col_GiaThapNhat <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.GiaThapNhat'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.GiaThapNhat'); ?>">Giá Min</a> </th>
            <th id="GiaCaoNhat" class="KT_sorter KT_col_GiaCaoNhat <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.GiaCaoNhat'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.GiaCaoNhat'); ?>">Giá Max</a> </th>
            <th id="DTNhoNhat" class="KT_sorter KT_col_DTNhoNhat <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.DTNhoNhat'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.DTNhoNhat'); ?>">DT min</a> </th>
            <th id="DTLonNhat" class="KT_sorter KT_col_DTLonNhat <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.DTLonNhat'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.DTLonNhat'); ?>">DT Max</a> </th>
            <th id="SoPTam" class="KT_sorter KT_col_SoPTam <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.SoPTam'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.SoPTam'); ?>">Số PTam</a> </th>
            <th id="SoPNgu" class="KT_sorter KT_col_SoPNgu <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('thong_tin_tim_kiem.SoPNgu'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('thong_tin_tim_kiem.SoPNgu'); ?>">Số PNgu</a> </th>
            <th id="ID_Quan" class="KT_sorter KT_col_ID_Quan <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('quan.TenQuan'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('quan.TenQuan'); ?>">Quận</a> </th>
            <th id="ID_LoaiNha" class="KT_sorter KT_col_ID_LoaiNha <?php echo $tso_listthong_tin_tim_kiem1->getSortIcon('loai_nha.TenLoaiNha'); ?>"> <a href="<?php echo $tso_listthong_tin_tim_kiem1->getSortLink('loai_nha.TenLoaiNha'); ?>">Loại nhà</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listthong_tin_tim_kiem1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_GioiTinh" id="tfi_listthong_tin_tim_kiem1_GioiTinh" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_GioiTinh']); ?>" size="20" maxlength="20" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_NgaySinh" id="tfi_listthong_tin_tim_kiem1_NgaySinh" value="<?php echo @$_SESSION['tfi_listthong_tin_tim_kiem1_NgaySinh']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_GiaThapNhat" id="tfi_listthong_tin_tim_kiem1_GiaThapNhat" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_GiaThapNhat']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_GiaCaoNhat" id="tfi_listthong_tin_tim_kiem1_GiaCaoNhat" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_GiaCaoNhat']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_DTNhoNhat" id="tfi_listthong_tin_tim_kiem1_DTNhoNhat" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_DTNhoNhat']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_DTLonNhat" id="tfi_listthong_tin_tim_kiem1_DTLonNhat" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_DTLonNhat']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_SoPTam" id="tfi_listthong_tin_tim_kiem1_SoPTam" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_SoPTam']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listthong_tin_tim_kiem1_SoPNgu" id="tfi_listthong_tin_tim_kiem1_SoPNgu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthong_tin_tim_kiem1_SoPNgu']); ?>" size="20" maxlength="100" /></td>
            <td><select name="tfi_listthong_tin_tim_kiem1_ID_Quan" id="tfi_listthong_tin_tim_kiem1_ID_Quan">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listthong_tin_tim_kiem1_ID_Quan']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['ID_Quan']?>"<?php if (!(strcmp($row_Recordset1['ID_Quan'], @$_SESSION['tfi_listthong_tin_tim_kiem1_ID_Quan']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenQuan']?></option>
              <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listthong_tin_tim_kiem1_ID_LoaiNha" id="tfi_listthong_tin_tim_kiem1_ID_LoaiNha">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listthong_tin_tim_kiem1_ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['ID_LoaiNha']?>"<?php if (!(strcmp($row_Recordset2['ID_LoaiNha'], @$_SESSION['tfi_listthong_tin_tim_kiem1_ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['TenLoaiNha']?></option>
              <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
            </select>
            </td>
            <td><input type="submit" name="tfi_listthong_tin_tim_kiem1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsthong_tin_tim_kiem1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="12"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsthong_tin_tim_kiem1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_thong_tin_tim_kiem" class="id_checkbox" value="<?php echo $row_rsthong_tin_tim_kiem1['ID_ThongTin']; ?>" />
                <input type="hidden" name="ID_ThongTin" class="id_field" value="<?php echo $row_rsthong_tin_tim_kiem1['ID_ThongTin']; ?>" />
            </td>
            <td><?php 
// Show IF Conditional region4 
if (@$row_rsthong_tin_tim_kiem1['GioiTinh'] == 1) {
?>
                <img src="gtk-apply.png" width="16" height="16" />
                <?php } 
// endif Conditional region4
?></td>
            <td><div class="KT_col_NgaySinh"><?php echo KT_formatDate($row_rsthong_tin_tim_kiem1['NgaySinh']); ?></div></td>
            <td><div class="KT_col_GiaThapNhat"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['GiaThapNhat'], 20); ?></div></td>
            <td><div class="KT_col_GiaCaoNhat"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['GiaCaoNhat'], 20); ?></div></td>
            <td><div class="KT_col_DTNhoNhat"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['DTNhoNhat'], 20); ?></div></td>
            <td><div class="KT_col_DTLonNhat"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['DTLonNhat'], 20); ?></div></td>
            <td><div class="KT_col_SoPTam"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['SoPTam'], 20); ?></div></td>
            <td><div class="KT_col_SoPNgu"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['SoPNgu'], 20); ?></div></td>
            <td><div class="KT_col_ID_Quan"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['ID_Quan'], 20); ?></div></td>
            <td><div class="KT_col_ID_LoaiNha"><?php echo KT_FormatForList($row_rsthong_tin_tim_kiem1['ID_LoaiNha'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admin.php?mod=form_thongtintimkiem&amp;ID_ThongTin=<?php echo $row_rsthong_tin_tim_kiem1['ID_ThongTin']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rsthong_tin_tim_kiem1 = mysql_fetch_assoc($rsthong_tin_tim_kiem1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listthong_tin_tim_kiem1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="admin.php?mod=form_thongtintimkiem&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($rsthong_tin_tim_kiem1);
?>
