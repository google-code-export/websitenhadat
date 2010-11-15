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
$tfi_listchu_nha1 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listchu_nha1");
$tfi_listchu_nha1->addColumn("chu_nha.ID_ChuNha", "NUMERIC_TYPE", "ID_ChuNha", "=");
$tfi_listchu_nha1->addColumn("chu_nha.TenChuNha", "STRING_TYPE", "TenChuNha", "%");
$tfi_listchu_nha1->addColumn("chu_nha.DiaChi", "STRING_TYPE", "DiaChi", "%");
$tfi_listchu_nha1->addColumn("chu_nha.DienThoai", "STRING_TYPE", "DienThoai", "%");
$tfi_listchu_nha1->Execute();

// Sorter
$tso_listchu_nha1 = new TSO_TableSorter("rschu_nha1", "tso_listchu_nha1");
$tso_listchu_nha1->addColumn("chu_nha.ID_ChuNha");
$tso_listchu_nha1->addColumn("chu_nha.TenChuNha");
$tso_listchu_nha1->addColumn("chu_nha.DiaChi");
$tso_listchu_nha1->addColumn("chu_nha.DienThoai");
$tso_listchu_nha1->setDefault("chu_nha.ID_ChuNha");
$tso_listchu_nha1->Execute();

// Navigation
$nav_listchu_nha1 = new NAV_Regular("nav_listchu_nha1", "rschu_nha1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rschu_nha1 = $_SESSION['max_rows_nav_listchu_nha1'];
$pageNum_rschu_nha1 = 0;
if (isset($_GET['pageNum_rschu_nha1'])) {
  $pageNum_rschu_nha1 = $_GET['pageNum_rschu_nha1'];
}
$startRow_rschu_nha1 = $pageNum_rschu_nha1 * $maxRows_rschu_nha1;

// Defining List Recordset variable
$NXTFilter_rschu_nha1 = "1=1";
if (isset($_SESSION['filter_tfi_listchu_nha1'])) {
  $NXTFilter_rschu_nha1 = $_SESSION['filter_tfi_listchu_nha1'];
}
// Defining List Recordset variable
$NXTSort_rschu_nha1 = "chu_nha.ID_ChuNha";
if (isset($_SESSION['sorter_tso_listchu_nha1'])) {
  $NXTSort_rschu_nha1 = $_SESSION['sorter_tso_listchu_nha1'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rschu_nha1 = "SELECT chu_nha.ID_ChuNha, chu_nha.TenChuNha, chu_nha.DiaChi, chu_nha.DienThoai FROM chu_nha WHERE {$NXTFilter_rschu_nha1} ORDER BY {$NXTSort_rschu_nha1}";
$query_limit_rschu_nha1 = sprintf("%s LIMIT %d, %d", $query_rschu_nha1, $startRow_rschu_nha1, $maxRows_rschu_nha1);
$rschu_nha1 = mysql_query($query_limit_rschu_nha1, $conn_qlnd) or die(mysql_error());
$row_rschu_nha1 = mysql_fetch_assoc($rschu_nha1);

if (isset($_GET['totalRows_rschu_nha1'])) {
  $totalRows_rschu_nha1 = $_GET['totalRows_rschu_nha1'];
} else {
  $all_rschu_nha1 = mysql_query($query_rschu_nha1);
  $totalRows_rschu_nha1 = mysql_num_rows($all_rschu_nha1);
}
$totalPages_rschu_nha1 = ceil($totalRows_rschu_nha1/$maxRows_rschu_nha1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listchu_nha1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_ID_ChuNha {width:140px; overflow:hidden;}
  .KT_col_TenChuNha {width:140px; overflow:hidden;}
  .KT_col_DiaChi {width:140px; overflow:hidden;}
  .KT_col_DienThoai {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div align="center">
  <div class="KT_tng" id="listchu_nha1">
  <br />
    <span class="chu">QUẢN LÝ THÔNG TIN CHỦ NHÀ</span> 
    <br />
    <br />
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listchu_nha1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listchu_nha1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listchu_nha1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listchu_nha1'] == 1) {
?>
                  <a href="<?php echo $tfi_listchu_nha1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listchu_nha1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="ID_ChuNha" class="KT_sorter KT_col_ID_ChuNha <?php echo $tso_listchu_nha1->getSortIcon('chu_nha.ID_ChuNha'); ?>"> <a href="<?php echo $tso_listchu_nha1->getSortLink('chu_nha.ID_ChuNha'); ?>">Mã</a> </th>
              <th id="TenChuNha" class="KT_sorter KT_col_TenChuNha <?php echo $tso_listchu_nha1->getSortIcon('chu_nha.TenChuNha'); ?>"> <a href="<?php echo $tso_listchu_nha1->getSortLink('chu_nha.TenChuNha'); ?>">Tên Chủ Nhà</a> </th>
              <th id="DiaChi" class="KT_sorter KT_col_DiaChi <?php echo $tso_listchu_nha1->getSortIcon('chu_nha.DiaChi'); ?>"> <a href="<?php echo $tso_listchu_nha1->getSortLink('chu_nha.DiaChi'); ?>">Địa Chỉ</a> </th>
              <th id="DienThoai" class="KT_sorter KT_col_DienThoai <?php echo $tso_listchu_nha1->getSortIcon('chu_nha.DienThoai'); ?>"> <a href="<?php echo $tso_listchu_nha1->getSortLink('chu_nha.DienThoai'); ?>">Điện Thoại</a> </th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listchu_nha1'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listchu_nha1_ID_ChuNha" id="tfi_listchu_nha1_ID_ChuNha" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchu_nha1_ID_ChuNha']); ?>" size="20" maxlength="100" /></td>
                <td><input type="text" name="tfi_listchu_nha1_TenChuNha" id="tfi_listchu_nha1_TenChuNha" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchu_nha1_TenChuNha']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listchu_nha1_DiaChi" id="tfi_listchu_nha1_DiaChi" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchu_nha1_DiaChi']); ?>" size="20" maxlength="100" /></td>
                <td><input type="text" name="tfi_listchu_nha1_DienThoai" id="tfi_listchu_nha1_DienThoai" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchu_nha1_DienThoai']); ?>" size="20" maxlength="20" /></td>
                <td><input type="submit" name="tfi_listchu_nha1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rschu_nha1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rschu_nha1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_chu_nha" class="id_checkbox" value="<?php echo $row_rschu_nha1['ID_ChuNha']; ?>" />
                      <input type="hidden" name="ID_ChuNha" class="id_field" value="<?php echo $row_rschu_nha1['ID_ChuNha']; ?>" />
                  </td>
                  <td><div class="KT_col_ID_ChuNha"><?php echo KT_FormatForList($row_rschu_nha1['ID_ChuNha'], 20); ?></div></td>
                  <td><div class="KT_col_TenChuNha"><?php echo KT_FormatForList($row_rschu_nha1['TenChuNha'], 100); ?></div></td>
                  <td><div class="KT_col_DiaChi"><?php echo KT_FormatForList($row_rschu_nha1['DiaChi'], 100); ?></div></td>
                  <td><div class="KT_col_DienThoai"><?php echo KT_FormatForList($row_rschu_nha1['DienThoai'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="admin.php?mod=form_chunha&amp;ID_ChuNha=<?php echo $row_rschu_nha1['ID_ChuNha']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rschu_nha1 = mysql_fetch_assoc($rschu_nha1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listchu_nha1->Prepare();
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
          <a class="KT_additem_op_link" href="admin.php?mod=form_chunha&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>
<?php
mysql_free_result($rschu_nha1);
?>
