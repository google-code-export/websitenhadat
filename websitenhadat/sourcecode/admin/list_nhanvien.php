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
$tfi_listnhan_vien1 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listnhan_vien1");
$tfi_listnhan_vien1->addColumn("nhan_vien.TenNV", "STRING_TYPE", "TenNV", "%");
$tfi_listnhan_vien1->addColumn("nhan_vien.DiaChi", "STRING_TYPE", "DiaChi", "%");
$tfi_listnhan_vien1->addColumn("nhan_vien.Email_HoTro", "STRING_TYPE", "Email_HoTro", "%");
$tfi_listnhan_vien1->addColumn("nhan_vien.DienThoai", "STRING_TYPE", "DienThoai", "%");
$tfi_listnhan_vien1->addColumn("nhan_vien.GioiTinh", "STRING_TYPE", "GioiTinh", "%");
$tfi_listnhan_vien1->addColumn("nhan_vien.NgaySinh", "DATE_TYPE", "NgaySinh", "=");
$tfi_listnhan_vien1->addColumn("nhan_vien.Luong", "STRING_TYPE", "Luong", "%");
$tfi_listnhan_vien1->Execute();

// Sorter
$tso_listnhan_vien1 = new TSO_TableSorter("rsnhan_vien1", "tso_listnhan_vien1");
$tso_listnhan_vien1->addColumn("nhan_vien.TenNV");
$tso_listnhan_vien1->addColumn("nhan_vien.DiaChi");
$tso_listnhan_vien1->addColumn("nhan_vien.Email_HoTro");
$tso_listnhan_vien1->addColumn("nhan_vien.DienThoai");
$tso_listnhan_vien1->addColumn("nhan_vien.GioiTinh");
$tso_listnhan_vien1->addColumn("nhan_vien.NgaySinh");
$tso_listnhan_vien1->addColumn("nhan_vien.Luong");
$tso_listnhan_vien1->setDefault("nhan_vien.TenNV");
$tso_listnhan_vien1->Execute();

// Navigation
$nav_listnhan_vien1 = new NAV_Regular("nav_listnhan_vien1", "rsnhan_vien1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsnhan_vien1 = $_SESSION['max_rows_nav_listnhan_vien1'];
$pageNum_rsnhan_vien1 = 0;
if (isset($_GET['pageNum_rsnhan_vien1'])) {
  $pageNum_rsnhan_vien1 = $_GET['pageNum_rsnhan_vien1'];
}
$startRow_rsnhan_vien1 = $pageNum_rsnhan_vien1 * $maxRows_rsnhan_vien1;

// Defining List Recordset variable
$NXTFilter_rsnhan_vien1 = "1=1";
if (isset($_SESSION['filter_tfi_listnhan_vien1'])) {
  $NXTFilter_rsnhan_vien1 = $_SESSION['filter_tfi_listnhan_vien1'];
}
// Defining List Recordset variable
$NXTSort_rsnhan_vien1 = "nhan_vien.TenNV";
if (isset($_SESSION['sorter_tso_listnhan_vien1'])) {
  $NXTSort_rsnhan_vien1 = $_SESSION['sorter_tso_listnhan_vien1'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rsnhan_vien1 = "SELECT nhan_vien.TenNV, nhan_vien.DiaChi, nhan_vien.Email_HoTro, nhan_vien.DienThoai, nhan_vien.GioiTinh, nhan_vien.NgaySinh, nhan_vien.Luong, nhan_vien.ID_NV FROM nhan_vien WHERE {$NXTFilter_rsnhan_vien1} ORDER BY {$NXTSort_rsnhan_vien1}";
$query_limit_rsnhan_vien1 = sprintf("%s LIMIT %d, %d", $query_rsnhan_vien1, $startRow_rsnhan_vien1, $maxRows_rsnhan_vien1);
$rsnhan_vien1 = mysql_query($query_limit_rsnhan_vien1, $conn_qlnd) or die(mysql_error());
$row_rsnhan_vien1 = mysql_fetch_assoc($rsnhan_vien1);

if (isset($_GET['totalRows_rsnhan_vien1'])) {
  $totalRows_rsnhan_vien1 = $_GET['totalRows_rsnhan_vien1'];
} else {
  $all_rsnhan_vien1 = mysql_query($query_rsnhan_vien1);
  $totalRows_rsnhan_vien1 = mysql_num_rows($all_rsnhan_vien1);
}
$totalPages_rsnhan_vien1 = ceil($totalRows_rsnhan_vien1/$maxRows_rsnhan_vien1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnhan_vien1->checkBoundries();
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
  .KT_col_TenNV {width:100px; overflow:hidden;}
  .KT_col_DiaChi {width:140px; overflow:hidden;}
  .KT_col_Email_HoTro {width:100px; overflow:hidden;}
  .KT_col_DienThoai {width:100px; overflow:hidden;}
  .KT_col_GioiTinh {width:70px; overflow:hidden;}
  .KT_col_NgaySinh {width:80px; overflow:hidden;}
  .KT_col_Luong {width:80px; overflow:hidden;}
</style>
</head>

<body>
<div align="center">
  <div class="KT_tng" id="listnhan_vien1">
  <br />
    <span class="chu"> QUẢN LÝ THÔNG TIN NHÂN VIÊN
    </span>
    <br />
    <br />
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listnhan_vien1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnhan_vien1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listnhan_vien1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnhan_vien1'] == 1) {
?>
            <a href="<?php echo $tfi_listnhan_vien1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
            <?php 
  // else Conditional region2
  } else { ?>
            <a href="<?php echo $tfi_listnhan_vien1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
            <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="TenNV" class="KT_sorter KT_col_TenNV <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.TenNV'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.TenNV'); ?>">Tên NV</a> </th>
              <th id="DiaChi" class="KT_sorter KT_col_DiaChi <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.DiaChi'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.DiaChi'); ?>">Địa Chỉ</a> </th>
              <th id="Email_HoTro" class="KT_sorter KT_col_Email_HoTro <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.Email_HoTro'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.Email_HoTro'); ?>">Email</a> </th>
              <th id="DienThoai" class="KT_sorter KT_col_DienThoai <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.DienThoai'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.DienThoai'); ?>">Điện Thoại</a> </th>
              <th id="GioiTinh" class="KT_sorter KT_col_GioiTinh <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.GioiTinh'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.GioiTinh'); ?>">Giới Tính</a> </th>
              <th id="NgaySinh" class="KT_sorter KT_col_NgaySinh <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.NgaySinh'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.NgaySinh'); ?>">Ngày Sinh</a> </th>
              <th id="Luong" class="KT_sorter KT_col_Luong <?php echo $tso_listnhan_vien1->getSortIcon('nhan_vien.Luong'); ?>"> <a href="<?php echo $tso_listnhan_vien1->getSortLink('nhan_vien.Luong'); ?>">Lương</a> </th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnhan_vien1'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listnhan_vien1_TenNV" id="tfi_listnhan_vien1_TenNV" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhan_vien1_TenNV']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listnhan_vien1_DiaChi" id="tfi_listnhan_vien1_DiaChi" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhan_vien1_DiaChi']); ?>" size="20" maxlength="100" /></td>
                <td><input type="text" name="tfi_listnhan_vien1_Email_HoTro" id="tfi_listnhan_vien1_Email_HoTro" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhan_vien1_Email_HoTro']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listnhan_vien1_DienThoai" id="tfi_listnhan_vien1_DienThoai" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhan_vien1_DienThoai']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listnhan_vien1_GioiTinh" id="tfi_listnhan_vien1_GioiTinh" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhan_vien1_GioiTinh']); ?>" size="20" maxlength="20" /></td>
                <td><input type="text" name="tfi_listnhan_vien1_NgaySinh" id="tfi_listnhan_vien1_NgaySinh" value="<?php echo @$_SESSION['tfi_listnhan_vien1_NgaySinh']; ?>" size="10" maxlength="22" /></td>
                <td><input type="text" name="tfi_listnhan_vien1_Luong" id="tfi_listnhan_vien1_Luong" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnhan_vien1_Luong']); ?>" size="20" maxlength="45" /></td>
                <td><input type="submit" name="tfi_listnhan_vien1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rsnhan_vien1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="9"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rsnhan_vien1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_nhan_vien" class="id_checkbox" value="<?php echo $row_rsnhan_vien1['ID_NV']; ?>" />
                    <input type="hidden" name="ID_NV" class="id_field" value="<?php echo $row_rsnhan_vien1['ID_NV']; ?>" />
                  </td>
                  <td><div class="KT_col_TenNV"><?php echo KT_FormatForList($row_rsnhan_vien1['TenNV'], 100); ?></div></td>
                  <td><div class="KT_col_DiaChi"><?php echo KT_FormatForList($row_rsnhan_vien1['DiaChi'], 100); ?></div></td>
                  <td><div class="KT_col_Email_HoTro"><?php echo KT_FormatForList($row_rsnhan_vien1['Email_HoTro'], 50); ?></div></td>
                  <td><div class="KT_col_DienThoai"><?php echo KT_FormatForList($row_rsnhan_vien1['DienThoai'], 20); ?></div></td>
                  <td><?php 
// Show IF Conditional region4 
if (@$row_rsnhan_vien1['GioiTinh'] == 1) {
?>
                      <img src="gtk-apply.png" width="16" height="16" />
                      <?php 
// else Conditional region4
} else { ?>
                      <img src="button_cancel.png" width="16" height="16" />
  <?php } 
// endif Conditional region4
?></td>
                  <td><div class="KT_col_NgaySinh"><?php echo KT_formatDate($row_rsnhan_vien1['NgaySinh']); ?></div></td>
                  <td><div class="KT_col_Luong"><?php echo KT_FormatForList($row_rsnhan_vien1['Luong'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="admin.php?mod=form_nhanvien&amp;ID_NV=<?php echo $row_rsnhan_vien1['ID_NV']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rsnhan_vien1 = mysql_fetch_assoc($rsnhan_vien1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listnhan_vien1->Prepare();
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
          <a class="KT_additem_op_link" href="admin.php?mod=form_nhanvien&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>
<?php
mysql_free_result($rsnhan_vien1);
?>
