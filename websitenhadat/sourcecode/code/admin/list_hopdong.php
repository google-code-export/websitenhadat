<?php require_once('../Connections/conn_qlnd.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

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
$tfi_listhop_dong1 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listhop_dong1");
$tfi_listhop_dong1->addColumn("hop_dong.TimeBD", "DATE_TYPE", "TimeBD", "=");
$tfi_listhop_dong1->addColumn("hop_dong.TimeKT", "DATE_TYPE", "TimeKT", "=");
$tfi_listhop_dong1->addColumn("hop_dong.NgayKy", "DATE_TYPE", "NgayKy", "=");
$tfi_listhop_dong1->addColumn("nha_dat.ID_NhaDat", "NUMERIC_TYPE", "ID_NhaDat", "=");
$tfi_listhop_dong1->addColumn("nguoi_thue.ID_NguoiThue", "NUMERIC_TYPE", "ID_NguoiThue", "=");
$tfi_listhop_dong1->addColumn("nhan_vien.ID_NV", "STRING_TYPE", "ID_NV", "%");
$tfi_listhop_dong1->Execute();

// Sorter
$tso_listhop_dong1 = new TSO_TableSorter("rshop_dong1", "tso_listhop_dong1");
$tso_listhop_dong1->addColumn("hop_dong.TimeBD");
$tso_listhop_dong1->addColumn("hop_dong.TimeKT");
$tso_listhop_dong1->addColumn("hop_dong.NgayKy");
$tso_listhop_dong1->addColumn("nha_dat.TieuDe");
$tso_listhop_dong1->addColumn("nguoi_thue.TenNguoiThue");
$tso_listhop_dong1->addColumn("nhan_vien.TenNV");
$tso_listhop_dong1->setDefault("hop_dong.NgayKy DESC");
$tso_listhop_dong1->Execute();

// Navigation
$nav_listhop_dong1 = new NAV_Regular("nav_listhop_dong1", "rshop_dong1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TieuDe, ID_NhaDat FROM nha_dat ORDER BY TieuDe";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TenNguoiThue, ID_NguoiThue FROM nguoi_thue ORDER BY TenNguoiThue";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset3 = "SELECT TenNV, ID_NV FROM nhan_vien ORDER BY TenNV";
$Recordset3 = mysql_query($query_Recordset3, $conn_qlnd) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

//NeXTenesio3 Special List Recordset
$maxRows_rshop_dong1 = $_SESSION['max_rows_nav_listhop_dong1'];
$pageNum_rshop_dong1 = 0;
if (isset($_GET['pageNum_rshop_dong1'])) {
  $pageNum_rshop_dong1 = $_GET['pageNum_rshop_dong1'];
}
$startRow_rshop_dong1 = $pageNum_rshop_dong1 * $maxRows_rshop_dong1;

// Defining List Recordset variable
$NXTFilter_rshop_dong1 = "1=1";
if (isset($_SESSION['filter_tfi_listhop_dong1'])) {
  $NXTFilter_rshop_dong1 = $_SESSION['filter_tfi_listhop_dong1'];
}
// Defining List Recordset variable
$NXTSort_rshop_dong1 = "hop_dong.NgayKy DESC";
if (isset($_SESSION['sorter_tso_listhop_dong1'])) {
  $NXTSort_rshop_dong1 = $_SESSION['sorter_tso_listhop_dong1'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rshop_dong1 = "SELECT hop_dong.TimeBD, hop_dong.TimeKT, hop_dong.NgayKy, nha_dat.TieuDe AS ID_NhaDat, nguoi_thue.TenNguoiThue AS ID_NguoiThue, nhan_vien.TenNV AS ID_NV, hop_dong.ID_HopDong FROM ((hop_dong LEFT JOIN nha_dat ON hop_dong.ID_NhaDat = nha_dat.ID_NhaDat) LEFT JOIN nguoi_thue ON hop_dong.ID_NguoiThue = nguoi_thue.ID_NguoiThue) LEFT JOIN nhan_vien ON hop_dong.ID_NV = nhan_vien.ID_NV WHERE {$NXTFilter_rshop_dong1} ORDER BY {$NXTSort_rshop_dong1}";
$query_limit_rshop_dong1 = sprintf("%s LIMIT %d, %d", $query_rshop_dong1, $startRow_rshop_dong1, $maxRows_rshop_dong1);
$rshop_dong1 = mysql_query($query_limit_rshop_dong1, $conn_qlnd) or die(mysql_error());
$row_rshop_dong1 = mysql_fetch_assoc($rshop_dong1);

if (isset($_GET['totalRows_rshop_dong1'])) {
  $totalRows_rshop_dong1 = $_GET['totalRows_rshop_dong1'];
} else {
  $all_rshop_dong1 = mysql_query($query_rshop_dong1);
  $totalRows_rshop_dong1 = mysql_num_rows($all_rshop_dong1);
}
$totalPages_rshop_dong1 = ceil($totalRows_rshop_dong1/$maxRows_rshop_dong1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listhop_dong1->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
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
  .KT_col_TimeBD {width:100px; overflow:hidden;}
  .KT_col_TimeKT {width:100px; overflow:hidden;}
  .KT_col_NgayKy {width:100px; overflow:hidden;}
  .KT_col_ID_NhaDat {width:90px; overflow:hidden;}
  .KT_col_ID_NguoiThue {width:90px; overflow:hidden;}
  .KT_col_ID_NV {width:90px; overflow:hidden;}
</style>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../includes/resources/calendar.js"></script>

</head>

<body>
<div align="center">
<div class="KT_tng" id="listhop_dong1">
<br />
  <span class="chu">QUẢN LÝ THÔNG TIN HỢP ĐỒNG
  </span>
  <br />
  <br />
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listhop_dong1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listhop_dong1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listhop_dong1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listhop_dong1'] == 1) {
?>
                            <a href="<?php echo $tfi_listhop_dong1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listhop_dong1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TimeBD" class="KT_sorter KT_col_TimeBD <?php echo $tso_listhop_dong1->getSortIcon('hop_dong.TimeBD'); ?>"> <a href="<?php echo $tso_listhop_dong1->getSortLink('hop_dong.TimeBD'); ?>">T/g bắt đầu</a> </th>
            <th id="TimeKT" class="KT_sorter KT_col_TimeKT <?php echo $tso_listhop_dong1->getSortIcon('hop_dong.TimeKT'); ?>"> <a href="<?php echo $tso_listhop_dong1->getSortLink('hop_dong.TimeKT'); ?>">T/g kết thúc</a> </th>
            <th id="NgayKy" class="KT_sorter KT_col_NgayKy <?php echo $tso_listhop_dong1->getSortIcon('hop_dong.NgayKy'); ?>"> <a href="<?php echo $tso_listhop_dong1->getSortLink('hop_dong.NgayKy'); ?>">Ngày ký</a> </th>
            <th id="ID_NhaDat" class="KT_sorter KT_col_ID_NhaDat <?php echo $tso_listhop_dong1->getSortIcon('nha_dat.TieuDe'); ?>"> <a href="<?php echo $tso_listhop_dong1->getSortLink('nha_dat.TieuDe'); ?>">Nhà đất</a> </th>
            <th id="ID_NguoiThue" class="KT_sorter KT_col_ID_NguoiThue <?php echo $tso_listhop_dong1->getSortIcon('nguoi_thue.TenNguoiThue'); ?>"> <a href="<?php echo $tso_listhop_dong1->getSortLink('nguoi_thue.TenNguoiThue'); ?>">Người thuê</a> </th>
            <th id="ID_NV" class="KT_sorter KT_col_ID_NV <?php echo $tso_listhop_dong1->getSortIcon('nhan_vien.TenNV'); ?>"> <a href="<?php echo $tso_listhop_dong1->getSortLink('nhan_vien.TenNV'); ?>">Nhân viên</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listhop_dong1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input name="tfi_listhop_dong1_TimeBD" id="tfi_listhop_dong1_TimeBD" value="undefined" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" /></td>
            <td><input name="tfi_listhop_dong1_TimeKT" id="tfi_listhop_dong1_TimeKT" value="<?php echo @$_SESSION['tfi_listhop_dong1_TimeKT']; ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" /></td>
            <td><input name="tfi_listhop_dong1_NgayKy" id="tfi_listhop_dong1_NgayKy" value="<?php echo @$_SESSION['tfi_listhop_dong1_NgayKy']; ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" /> </td>
            <td><select name="tfi_listhop_dong1_ID_NhaDat" id="tfi_listhop_dong1_ID_NhaDat">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listhop_dong1_ID_NhaDat']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['ID_NhaDat']?>"<?php if (!(strcmp($row_Recordset1['ID_NhaDat'], @$_SESSION['tfi_listhop_dong1_ID_NhaDat']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TieuDe']?></option>
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
            <td><select name="tfi_listhop_dong1_ID_NguoiThue" id="tfi_listhop_dong1_ID_NguoiThue">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listhop_dong1_ID_NguoiThue']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['ID_NguoiThue']?>"<?php if (!(strcmp($row_Recordset2['ID_NguoiThue'], @$_SESSION['tfi_listhop_dong1_ID_NguoiThue']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['TenNguoiThue']?></option>
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
            <td><select name="tfi_listhop_dong1_ID_NV" id="tfi_listhop_dong1_ID_NV">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listhop_dong1_ID_NV']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['ID_NV']?>"<?php if (!(strcmp($row_Recordset3['ID_NV'], @$_SESSION['tfi_listhop_dong1_ID_NV']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['TenNV']?></option>
              <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
            </select>
            </td>
            <td><input type="submit" name="tfi_listhop_dong1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rshop_dong1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="8"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rshop_dong1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_hop_dong" class="id_checkbox" value="<?php echo $row_rshop_dong1['ID_HopDong']; ?>" />
                <input type="hidden" name="ID_HopDong" class="id_field" value="<?php echo $row_rshop_dong1['ID_HopDong']; ?>" />
            </td>
            <td><div class="KT_col_TimeBD"><?php echo KT_formatDate($row_rshop_dong1['TimeBD']); ?></div></td>
            <td><div class="KT_col_TimeKT"><?php echo KT_formatDate($row_rshop_dong1['TimeKT']); ?></div></td>
            <td><div class="KT_col_NgayKy"><?php echo KT_formatDate($row_rshop_dong1['NgayKy']); ?></div></td>
            <td><div class="KT_col_ID_NhaDat"><?php echo KT_FormatForList($row_rshop_dong1['ID_NhaDat'], 20); ?></div></td>
            <td><div class="KT_col_ID_NguoiThue"><?php echo KT_FormatForList($row_rshop_dong1['ID_NguoiThue'], 20); ?></div></td>
            <td><div class="KT_col_ID_NV"><?php echo KT_FormatForList($row_rshop_dong1['ID_NV'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admin.php?mod=form_hopdong&amp;ID_HopDong=<?php echo $row_rshop_dong1['ID_HopDong']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rshop_dong1 = mysql_fetch_assoc($rshop_dong1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listhop_dong1->Prepare();
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
        <a class="KT_additem_op_link" href="admin.php?mod=form_hopdong&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($rshop_dong1);
?>
