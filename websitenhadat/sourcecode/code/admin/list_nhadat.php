<?php require_once('../Connections/conn_qlnd.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

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
$tfi_listnha_dat2 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listnha_dat2");
$tfi_listnha_dat2->addColumn("nha_dat.TieuDe", "STRING_TYPE", "TieuDe", "%");
$tfi_listnha_dat2->addColumn("nha_dat.TienThue", "STRING_TYPE", "TienThue", "%");
$tfi_listnha_dat2->addColumn("nha_dat.DienTich", "NUMERIC_TYPE", "DienTich", "=");
$tfi_listnha_dat2->addColumn("nha_dat.HinhAnh", "STRING_TYPE", "HinhAnh", "%");
$tfi_listnha_dat2->addColumn("huong_nha.ID_HuongNha", "NUMERIC_TYPE", "ID_HuongNha", "=");
$tfi_listnha_dat2->addColumn("nhan_vien.ID_NV", "NUMERIC_TYPE", "ID_NV", "=");
$tfi_listnha_dat2->addColumn("loai_nha.ID_LoaiNha", "NUMERIC_TYPE", "ID_LoaiNha", "=");
$tfi_listnha_dat2->addColumn("quan.ID_Quan", "NUMERIC_TYPE", "ID_Quan", "=");
$tfi_listnha_dat2->addColumn("chu_nha.ID_ChuNha", "NUMERIC_TYPE", "ID_ChuNha", "=");
$tfi_listnha_dat2->Execute();

// Sorter
$tso_listnha_dat2 = new TSO_TableSorter("rsnha_dat1", "tso_listnha_dat2");
$tso_listnha_dat2->addColumn("nha_dat.TieuDe");
$tso_listnha_dat2->addColumn("nha_dat.TienThue");
$tso_listnha_dat2->addColumn("nha_dat.DienTich");
$tso_listnha_dat2->addColumn("nha_dat.HinhAnh");
$tso_listnha_dat2->addColumn("huong_nha.TenHuongNha");
$tso_listnha_dat2->addColumn("nhan_vien.TenNV");
$tso_listnha_dat2->addColumn("loai_nha.TenLoaiNha");
$tso_listnha_dat2->addColumn("quan.TenQuan");
$tso_listnha_dat2->addColumn("chu_nha.TenChuNha");
$tso_listnha_dat2->setDefault("nha_dat.TieuDe");
$tso_listnha_dat2->Execute();

// Navigation
$nav_listnha_dat2 = new NAV_Regular("nav_listnha_dat2", "rsnha_dat1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TenHuongNha, ID_HuongNha FROM huong_nha ORDER BY TenHuongNha";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TenNV, ID_NV FROM nhan_vien ORDER BY TenNV";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_loainha = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha = mysql_query($query_rs_loainha, $conn_qlnd) or die(mysql_error());
$row_rs_loainha = mysql_fetch_assoc($rs_loainha);
$totalRows_rs_loainha = mysql_num_rows($rs_loainha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quan = "SELECT * FROM quan ORDER BY ID_Quan ASC";
$rs_quan = mysql_query($query_rs_quan, $conn_qlnd) or die(mysql_error());
$row_rs_quan = mysql_fetch_assoc($rs_quan);
$totalRows_rs_quan = mysql_num_rows($rs_quan);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_chunha = "SELECT ID_ChuNha, TenChuNha FROM chu_nha ORDER BY ID_ChuNha ASC";
$rs_chunha = mysql_query($query_rs_chunha, $conn_qlnd) or die(mysql_error());
$row_rs_chunha = mysql_fetch_assoc($rs_chunha);
$totalRows_rs_chunha = mysql_num_rows($rs_chunha);

//NeXTenesio3 Special List Recordset
$maxRows_rsnha_dat1 = $_SESSION['max_rows_nav_listnha_dat2'];
$pageNum_rsnha_dat1 = 0;
if (isset($_GET['pageNum_rsnha_dat1'])) {
  $pageNum_rsnha_dat1 = $_GET['pageNum_rsnha_dat1'];
}
$startRow_rsnha_dat1 = $pageNum_rsnha_dat1 * $maxRows_rsnha_dat1;

// Defining List Recordset variable
$NXTFilter_rsnha_dat1 = "1=1";
if (isset($_SESSION['filter_tfi_listnha_dat2'])) {
  $NXTFilter_rsnha_dat1 = $_SESSION['filter_tfi_listnha_dat2'];
}
// Defining List Recordset variable
$NXTSort_rsnha_dat1 = "nha_dat.TieuDe";
if (isset($_SESSION['sorter_tso_listnha_dat2'])) {
  $NXTSort_rsnha_dat1 = $_SESSION['sorter_tso_listnha_dat2'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rsnha_dat1 = "SELECT nha_dat.TieuDe, nha_dat.TienThue, nha_dat.DienTich, nha_dat.HinhAnh, huong_nha.TenHuongNha AS ID_HuongNha, nhan_vien.TenNV AS ID_NV, loai_nha.TenLoaiNha AS ID_LoaiNha, quan.TenQuan AS ID_Quan, chu_nha.TenChuNha AS ID_ChuNha, nha_dat.ID_NhaDat FROM ((((nha_dat LEFT JOIN huong_nha ON nha_dat.ID_HuongNha = huong_nha.ID_HuongNha) LEFT JOIN nhan_vien ON nha_dat.ID_NV = nhan_vien.ID_NV) LEFT JOIN loai_nha ON nha_dat.ID_LoaiNha = loai_nha.ID_LoaiNha) LEFT JOIN quan ON nha_dat.ID_Quan = quan.ID_Quan) LEFT JOIN chu_nha ON nha_dat.ID_ChuNha = chu_nha.ID_ChuNha WHERE {$NXTFilter_rsnha_dat1} ORDER BY {$NXTSort_rsnha_dat1}";
$query_limit_rsnha_dat1 = sprintf("%s LIMIT %d, %d", $query_rsnha_dat1, $startRow_rsnha_dat1, $maxRows_rsnha_dat1);
$rsnha_dat1 = mysql_query($query_limit_rsnha_dat1, $conn_qlnd) or die(mysql_error());
$row_rsnha_dat1 = mysql_fetch_assoc($rsnha_dat1);

if (isset($_GET['totalRows_rsnha_dat1'])) {
  $totalRows_rsnha_dat1 = $_GET['totalRows_rsnha_dat1'];
} else {
  $all_rsnha_dat1 = mysql_query($query_rsnha_dat1);
  $totalRows_rsnha_dat1 = mysql_num_rows($all_rsnha_dat1);
}
$totalPages_rsnha_dat1 = ceil($totalRows_rsnha_dat1/$maxRows_rsnha_dat1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listnha_dat2->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rsnha_dat1.HinhAnh}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
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
  .KT_col_TieuDe {width:80px; overflow:hidden;}
  .KT_col_TienThue {width:70px; overflow:hidden;}
  .KT_col_DienTich {width:70px; overflow:hidden;}
  .KT_col_HinhAnh {width:70px; overflow:hidden;}
  .KT_col_ID_HuongNha {width:70px; overflow:hidden;}
  .KT_col_ID_NV {width:70px; overflow:hidden;}
  .KT_col_ID_LoaiNha {width:70px; overflow:hidden;}
  .KT_col_ID_Quan {width:70px; overflow:hidden;}
  .KT_col_ID_ChuNha {width:70px; overflow:hidden;}
</style>

</head>

<body>
<div align="center">
<div class="KT_tng" id="listnha_dat2">
<br />
  <span class="chu">QUẢN LÝ THÔNG TIN NHÀ ĐẤT</span>
  <br />
  <br />
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listnha_dat2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listnha_dat2'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listnha_dat2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listnha_dat2'] == 1) {
?>
                            <a href="<?php echo $tfi_listnha_dat2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listnha_dat2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TieuDe" class="KT_sorter KT_col_TieuDe <?php echo $tso_listnha_dat2->getSortIcon('nha_dat.TieuDe'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('nha_dat.TieuDe'); ?>">Tiêu Đề</a> </th>
            <th id="TienThue" class="KT_sorter KT_col_TienThue <?php echo $tso_listnha_dat2->getSortIcon('nha_dat.TienThue'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('nha_dat.TienThue'); ?>">Tiền Thuê</a> </th>
            <th id="DienTich" class="KT_sorter KT_col_DienTich <?php echo $tso_listnha_dat2->getSortIcon('nha_dat.DienTich'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('nha_dat.DienTich'); ?>">Diện Tích</a> </th>
            <th id="HinhAnh" class="KT_sorter KT_col_HinhAnh <?php echo $tso_listnha_dat2->getSortIcon('nha_dat.HinhAnh'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('nha_dat.HinhAnh'); ?>">Hình Ảnh</a> </th>
            <th id="ID_HuongNha" class="KT_sorter KT_col_ID_HuongNha <?php echo $tso_listnha_dat2->getSortIcon('huong_nha.TenHuongNha'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('huong_nha.TenHuongNha'); ?>">Hướng Nhà</a> </th>
            <th id="ID_NV" class="KT_sorter KT_col_ID_NV <?php echo $tso_listnha_dat2->getSortIcon('nhan_vien.TenNV'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('nhan_vien.TenNV'); ?>">NV</a> </th>
            <th id="ID_LoaiNha" class="KT_sorter KT_col_ID_LoaiNha <?php echo $tso_listnha_dat2->getSortIcon('loai_nha.TenLoaiNha'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('loai_nha.TenLoaiNha'); ?>">Loại Nhà</a> </th>
            <th id="ID_Quan" class="KT_sorter KT_col_ID_Quan <?php echo $tso_listnha_dat2->getSortIcon('quan.TenQuan'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('quan.TenQuan'); ?>">Quận</a> </th>
            <th id="ID_ChuNha" class="KT_sorter KT_col_ID_ChuNha <?php echo $tso_listnha_dat2->getSortIcon('chu_nha.TenChuNha'); ?>"> <a href="<?php echo $tso_listnha_dat2->getSortLink('chu_nha.TenChuNha'); ?>">Chủ Nhà</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listnha_dat2'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listnha_dat2_TieuDe" id="tfi_listnha_dat2_TieuDe" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnha_dat2_TieuDe']); ?>" size="8" maxlength="45" /></td>
            <td><input type="text" name="tfi_listnha_dat2_TienThue" id="tfi_listnha_dat2_TienThue" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnha_dat2_TienThue']); ?>" size="8" maxlength="45" /></td>
            <td><input type="text" name="tfi_listnha_dat2_DienTich" id="tfi_listnha_dat2_DienTich" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnha_dat2_DienTich']); ?>" size="8" maxlength="100" /></td>
            <td><input type="text" name="tfi_listnha_dat2_HinhAnh" id="tfi_listnha_dat2_HinhAnh" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listnha_dat2_HinhAnh']); ?>" size="8" maxlength="30" /></td>
            <td><select name="tfi_listnha_dat2_ID_HuongNha" id="tfi_listnha_dat2_ID_HuongNha">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnha_dat2_ID_HuongNha']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['ID_HuongNha']?>"<?php if (!(strcmp($row_Recordset1['ID_HuongNha'], @$_SESSION['tfi_listnha_dat2_ID_HuongNha']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenHuongNha']?></option>
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
            <td><select name="tfi_listnha_dat2_ID_NV" id="tfi_listnha_dat2_ID_NV">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnha_dat2_ID_NV']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['ID_NV']?>"<?php if (!(strcmp($row_Recordset2['ID_NV'], @$_SESSION['tfi_listnha_dat2_ID_NV']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['TenNV']?></option>
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
            <td><select name="tfi_listnha_dat2_ID_LoaiNha" id="tfi_listnha_dat2_ID_LoaiNha">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnha_dat2_ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_loainha['ID_LoaiNha']?>"<?php if (!(strcmp($row_rs_loainha['ID_LoaiNha'], @$_SESSION['tfi_listnha_dat2_ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo $row_rs_loainha['TenLoaiNha']?></option>
              <?php
} while ($row_rs_loainha = mysql_fetch_assoc($rs_loainha));
  $rows = mysql_num_rows($rs_loainha);
  if($rows > 0) {
      mysql_data_seek($rs_loainha, 0);
	  $row_rs_loainha = mysql_fetch_assoc($rs_loainha);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listnha_dat2_ID_Quan" id="tfi_listnha_dat2_ID_Quan">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnha_dat2_ID_Quan']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_quan['ID_Quan']?>"<?php if (!(strcmp($row_rs_quan['ID_Quan'], @$_SESSION['tfi_listnha_dat2_ID_Quan']))) {echo "SELECTED";} ?>><?php echo $row_rs_quan['TenQuan']?></option>
              <?php
} while ($row_rs_quan = mysql_fetch_assoc($rs_quan));
  $rows = mysql_num_rows($rs_quan);
  if($rows > 0) {
      mysql_data_seek($rs_quan, 0);
	  $row_rs_quan = mysql_fetch_assoc($rs_quan);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listnha_dat2_ID_ChuNha" id="tfi_listnha_dat2_ID_ChuNha">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listnha_dat2_ID_ChuNha']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rs_chunha['ID_ChuNha']?>"<?php if (!(strcmp($row_rs_chunha['ID_ChuNha'], @$_SESSION['tfi_listnha_dat2_ID_ChuNha']))) {echo "SELECTED";} ?>><?php echo $row_rs_chunha['TenChuNha']?></option>
              <?php
} while ($row_rs_chunha = mysql_fetch_assoc($rs_chunha));
  $rows = mysql_num_rows($rs_chunha);
  if($rows > 0) {
      mysql_data_seek($rs_chunha, 0);
	  $row_rs_chunha = mysql_fetch_assoc($rs_chunha);
  }
?>
            </select>
            </td>
            <td><input type="submit" name="tfi_listnha_dat2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsnha_dat1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="11"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsnha_dat1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_nha_dat" class="id_checkbox" value="<?php echo $row_rsnha_dat1['ID_NhaDat']; ?>" />
                <input type="hidden" name="ID_NhaDat" class="id_field" value="<?php echo $row_rsnha_dat1['ID_NhaDat']; ?>" />
            </td>
            <td><div class="KT_col_TieuDe"><?php echo KT_FormatForList($row_rsnha_dat1['TieuDe'], 50); ?></div></td>
            <td><div class="KT_col_TienThue"><?php echo KT_FormatForList($row_rsnha_dat1['TienThue'], 20); ?></div></td>
            <td><div class="KT_col_DienTich"><?php echo KT_FormatForList($row_rsnha_dat1['DienTich'], 20); ?></div></td>
            <td><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
            <td><div class="KT_col_ID_HuongNha"><?php echo KT_FormatForList($row_rsnha_dat1['ID_HuongNha'], 20); ?></div></td>
            <td><div class="KT_col_ID_NV"><?php echo KT_FormatForList($row_rsnha_dat1['ID_NV'], 20); ?></div></td>
            <td><div class="KT_col_ID_LoaiNha"><?php echo KT_FormatForList($row_rsnha_dat1['ID_LoaiNha'], 20); ?></div></td>
            <td><div class="KT_col_ID_Quan"><?php echo KT_FormatForList($row_rsnha_dat1['ID_Quan'], 20); ?></div></td>
            <td><div class="KT_col_ID_ChuNha"><?php echo KT_FormatForList($row_rsnha_dat1['ID_ChuNha'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="admin.php?mod=form_nhadat&amp;ID_NhaDat=<?php echo $row_rsnha_dat1['ID_NhaDat']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rsnha_dat1 = mysql_fetch_assoc($rsnha_dat1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listnha_dat2->Prepare();
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
        <a class="KT_additem_op_link" href="admin.php?mod=form_nhadat&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($rs_loainha);

mysql_free_result($rs_quan);

mysql_free_result($rs_chunha);

mysql_free_result($rsnha_dat1);
?>
