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
$tfi_listnguoi_thue1 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listnguoi_thue1");
$tfi_listnguoi_thue1->addColumn("nguoi_thue.TenNguoiThue", "STRING_TYPE", "TenNguoiThue", "%");
$tfi_listnguoi_thue1->addColumn("nguoi_thue.DiaChi", "STRING_TYPE", "DiaChi", "%");
$tfi_listnguoi_thue1->addColumn("nguoi_thue.DienThoai", "STRING_TYPE", "DienThoai", "%");
$tfi_listnguoi_thue1->addColumn("nguoi_thue.KhanNangThue", "STRING_TYPE", "KhanNangThue", "%");
$tfi_listnguoi_thue1->addColumn("loai_nha.ID_LoaiNha", "NUMERIC_TYPE", "ID_LoaiNha", "=");
$tfi_listnguoi_thue1->addColumn("que_quan.ID_QueQuan", "NUMERIC_TYPE", "ID_QueQuan", "=");
$tfi_listnguoi_thue1->addColumn("nghe_nghiep.ID_NgheNghiep", "NUMERIC_TYPE", "ID_NgheNghiep", "=");
$tfi_listnguoi_thue1->Execute();

// Sorter
$tso_listnguoi_thue1 = new TSO_TableSorter("rsnguoi_thue1", "tso_listnguoi_thue1");
$tso_listnguoi_thue1->addColumn("nguoi_thue.TenNguoiThue");
$tso_listnguoi_thue1->addColumn("nguoi_thue.DiaChi");
$tso_listnguoi_thue1->addColumn("nguoi_thue.DienThoai");
$tso_listnguoi_thue1->addColumn("nguoi_thue.KhanNangThue");
$tso_listnguoi_thue1->addColumn("loai_nha.TenLoaiNha");
$tso_listnguoi_thue1->addColumn("que_quan.Ten_QueQuan");
$tso_listnguoi_thue1->addColumn("nghe_nghiep.Ten_NgheNghiep");
$tso_listnguoi_thue1->setDefault("nguoi_thue.TenNguoiThue");
$tso_listnguoi_thue1->Execute();

// Navigation
$nav_listnguoi_thue1 = new NAV_Regular("nav_listnguoi_thue1", "rsnguoi_thue1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TenLoaiNha, ID_LoaiNha FROM loai_nha ORDER BY TenLoaiNha";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT Ten_QueQuan, ID_QueQuan FROM que_quan ORDER BY Ten_QueQuan";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset3 = "SELECT Ten_NgheNghiep, ID_NgheNghiep FROM nghe_nghiep ORDER BY Ten_NgheNghiep";
$Recordset3 = mysql_query($query_Recordset3, $conn_qlnd) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

//NeXTenesio3 Special List Recordset
$maxRows_rsnguoi_thue1 = $_SESSION['max_rows_nav_listnguoi_thue1'];
$pageNum_rsnguoi_thue1 = 0;
if (isset($_GET['pageNum_rsnguoi_thue1'])) {
  $pageNum_rsnguoi_thue1 = $_GET['pageNum_rsnguoi_thue1'];
}
$startRow_rsnguoi_thue1 = $pageNum_rsnguoi_thue1 * $maxRows_rsnguoi_thue1;

// Defining List Recordset variable
$NXTFilter_rsnguoi_thue1 = "1=1";
if (isset($_SESSION['filter_tfi_listnguoi_thue1'])) {
  $NXTFilter_rsnguoi_thue1 = $_SESSION['filter_tfi_listnguoi_thue1'];
}
// Defining List Recordset variable
$NXTSort_rsnguoi_thue1 = "nguoi_thue.TenNguoiThue";
if (isset($_SESSION['sorter_tso_listnguoi_thue1'])) {
  $NXTSort_rsnguoi_thue1 = $_SESSION['sorter_tso_listnguoi_thue1'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rsnguoi_thue1 = "SELECT nguoi_thue.TenNguoiThue, nguoi_thue.DiaChi, nguoi_thue.DienThoai, nguoi_thue.KhanNangThue, loai_nha.TenLoaiNha AS ID_LoaiNha, que_quan.Ten_QueQuan AS ID_QueQuan, nghe_nghiep.Ten_NgheNghiep AS ID_NgheNghiep, nguoi_thue.ID_NguoiThue FROM ((nguoi_thue LEFT JOIN loai_nha ON nguoi_thue.ID_LoaiNha = loai_nha.ID_LoaiNha) LEFT JOIN que_quan ON nguoi_thue.ID_QueQuan = que_quan.ID_QueQuan) LEFT JOIN nghe_nghiep ON nguoi_thue.ID_NgheNghiep = nghe_nghiep.ID_NgheNghiep WHERE {$NXTFilter_rsnguoi_thue1} ORDER BY {$NXTSort_rsnguoi_thue1}";
$query_limit_rsnguoi_thue1 = sprintf("%s LIMIT %d, %d", $query_rsnguoi_thue1, $startRow_rsnguoi_thue1, $maxRows_rsnguoi_thue1);
$rsnguoi_thue1 = mysql_query($query_limit_rsnguoi_thue1, $conn_qlnd) or die(mysql_error());
$row_rsnguoi_thue1 = mysql_fetch_assoc($rsnguoi_thue1);

if (isset($_GET['totalRows_rsnguoi_thue1'])) {
  $totalRows_rsnguoi_thue1 = $_GET['totalRows_rsnguoi_thue1'];
} else {
  $all_rsnguoi_thue1 = mysql_query($query_rsnguoi_thue1);
  $totalRows_rsnguoi_thue1 = mysql_num_rows($all_rsnguoi_thue1);
}
$totalPages_rsnguoi_thue1 = ceil($totalRows_rsnguoi_thue1/$maxRows_rsnguoi_thue1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnguoi_thue1->checkBoundries();
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
  .KT_col_TenNguoiThue {width:100px; overflow:hidden;}
  .KT_col_DiaChi {width:140px; overflow:hidden;}
  .KT_col_DienThoai {width:100px; overflow:hidden;}
  .KT_col_KhanNangThue {width:140px; overflow:hidden;}
  .KT_col_ID_LoaiNha {width:70px; overflow:hidden;}
  .KT_col_ID_QueQuan {width:75px; overflow:hidden;}
  .KT_col_ID_NgheNghiep {width:90px; overflow:hidden;}
</style>
</head>

<body>
<div align="center">
<div class="KT_tng" id="listnguoi_thue1">
<br />
  <span class="chu"> QUẢN LÝ THÔNG TIN NGƯỜI THUÊ</span>
  <br />
  <br />
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listnguoi_thue1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnguoi_thue1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listnguoi_thue1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnguoi_thue1'] == 1) {
?>
                            <a href="<?php echo $tfi_listnguoi_thue1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listnguoi_thue1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TenNguoiThue" class="KT_sorter KT_col_TenNguoiThue <?php echo $tso_listnguoi_thue1->getSortIcon('nguoi_thue.TenNguoiThue'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('nguoi_thue.TenNguoiThue'); ?>">Người Thuê</a> </th>
            <th id="DiaChi" class="KT_sorter KT_col_DiaChi <?php echo $tso_listnguoi_thue1->getSortIcon('nguoi_thue.DiaChi'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('nguoi_thue.DiaChi'); ?>">Địa Chỉ</a> </th>
            <th id="DienThoai" class="KT_sorter KT_col_DienThoai <?php echo $tso_listnguoi_thue1->getSortIcon('nguoi_thue.DienThoai'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('nguoi_thue.DienThoai'); ?>">Điện Thoại</a> </th>
            <th id="KhanNangThue" class="KT_sorter KT_col_KhanNangThue <?php echo $tso_listnguoi_thue1->getSortIcon('nguoi_thue.KhanNangThue'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('nguoi_thue.KhanNangThue'); ?>">Khản Năng Thuê</a> </th>
            <th id="ID_LoaiNha" class="KT_sorter KT_col_ID_LoaiNha <?php echo $tso_listnguoi_thue1->getSortIcon('loai_nha.TenLoaiNha'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('loai_nha.TenLoaiNha'); ?>"> Loại Nhà</a> </th>
            <th id="ID_QueQuan" class="KT_sorter KT_col_ID_QueQuan <?php echo $tso_listnguoi_thue1->getSortIcon('que_quan.Ten_QueQuan'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('que_quan.Ten_QueQuan'); ?>">Quê Quán</a> </th>
            <th id="ID_NgheNghiep" class="KT_sorter KT_col_ID_NgheNghiep <?php echo $tso_listnguoi_thue1->getSortIcon('nghe_nghiep.Ten_NgheNghiep'); ?>"> <a href="<?php echo $tso_listnguoi_thue1->getSortLink('nghe_nghiep.Ten_NgheNghiep'); ?>">Nghề Nghiệp</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnguoi_thue1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listnguoi_thue1_TenNguoiThue" id="tfi_listnguoi_thue1_TenNguoiThue" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnguoi_thue1_TenNguoiThue']); ?>" size="20" maxlength="45" /></td>
            <td><input type="text" name="tfi_listnguoi_thue1_DiaChi" id="tfi_listnguoi_thue1_DiaChi" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnguoi_thue1_DiaChi']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listnguoi_thue1_DienThoai" id="tfi_listnguoi_thue1_DienThoai" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnguoi_thue1_DienThoai']); ?>" size="20" maxlength="20" /></td>
            <td><input type="text" name="tfi_listnguoi_thue1_KhanNangThue" id="tfi_listnguoi_thue1_KhanNangThue" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnguoi_thue1_KhanNangThue']); ?>" size="20" maxlength="100" /></td>
            <td><select name="tfi_listnguoi_thue1_ID_LoaiNha" id="tfi_listnguoi_thue1_ID_LoaiNha">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnguoi_thue1_ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['ID_LoaiNha']?>"<?php if (!(strcmp($row_Recordset1['ID_LoaiNha'], @$_SESSION['tfi_listnguoi_thue1_ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenLoaiNha']?></option>
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
            <td><select name="tfi_listnguoi_thue1_ID_QueQuan" id="tfi_listnguoi_thue1_ID_QueQuan">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnguoi_thue1_ID_QueQuan']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['ID_QueQuan']?>"<?php if (!(strcmp($row_Recordset2['ID_QueQuan'], @$_SESSION['tfi_listnguoi_thue1_ID_QueQuan']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['Ten_QueQuan']?></option>
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
            <td><select name="tfi_listnguoi_thue1_ID_NgheNghiep" id="tfi_listnguoi_thue1_ID_NgheNghiep">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnguoi_thue1_ID_NgheNghiep']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['ID_NgheNghiep']?>"<?php if (!(strcmp($row_Recordset3['ID_NgheNghiep'], @$_SESSION['tfi_listnguoi_thue1_ID_NgheNghiep']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['Ten_NgheNghiep']?></option>
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
            <td><input type="submit" name="tfi_listnguoi_thue1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsnguoi_thue1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="9"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsnguoi_thue1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_nguoi_thue" class="id_checkbox" value="<?php echo $row_rsnguoi_thue1['ID_NguoiThue']; ?>" />
                <input type="hidden" name="ID_NguoiThue" class="id_field" value="<?php echo $row_rsnguoi_thue1['ID_NguoiThue']; ?>" />
            </td>
            <td><div class="KT_col_TenNguoiThue"><?php echo KT_FormatForList($row_rsnguoi_thue1['TenNguoiThue'], 100); ?></div></td>
            <td><div class="KT_col_DiaChi"><?php echo KT_FormatForList($row_rsnguoi_thue1['DiaChi'], 100); ?></div></td>
            <td><div class="KT_col_DienThoai"><?php echo KT_FormatForList($row_rsnguoi_thue1['DienThoai'], 20); ?></div></td>
            <td><div class="KT_col_KhanNangThue"><?php echo KT_FormatForList($row_rsnguoi_thue1['KhanNangThue'], 100); ?></div></td>
            <td><div class="KT_col_ID_LoaiNha"><?php echo KT_FormatForList($row_rsnguoi_thue1['ID_LoaiNha'], 20); ?></div></td>
            <td><div class="KT_col_ID_QueQuan"><?php echo KT_FormatForList($row_rsnguoi_thue1['ID_QueQuan'], 20); ?></div></td>
            <td><div class="KT_col_ID_NgheNghiep"><?php echo KT_FormatForList($row_rsnguoi_thue1['ID_NgheNghiep'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admin.php?mod=form_nguoithue&amp;ID_NguoiThue=<?php echo $row_rsnguoi_thue1['ID_NguoiThue']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rsnguoi_thue1 = mysql_fetch_assoc($rsnguoi_thue1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listnguoi_thue1->Prepare();
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
        <a class="KT_additem_op_link" href="admin.php?mod=form_nguoithue&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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

mysql_free_result($rsnguoi_thue1);
?>
