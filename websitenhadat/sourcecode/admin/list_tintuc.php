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
$tfi_listtin_tuc5 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listtin_tuc5");
$tfi_listtin_tuc5->addColumn("tin_tuc.ID_TinTuc", "NUMERIC_TYPE", "ID_TinTuc", "=");
$tfi_listtin_tuc5->addColumn("tin_tuc.TieuDe", "STRING_TYPE", "TieuDe", "%");
$tfi_listtin_tuc5->addColumn("tin_tuc.TrichDanTin", "STRING_TYPE", "TrichDanTin", "%");
$tfi_listtin_tuc5->addColumn("tin_tuc.HinhMinhHoa", "STRING_TYPE", "HinhMinhHoa", "%");
$tfi_listtin_tuc5->addColumn("tin_tuc.TacGia", "STRING_TYPE", "TacGia", "%");
$tfi_listtin_tuc5->addColumn("tin_tuc.TinHot", "CHECKBOX_1_0_TYPE", "TinHot", "%");
$tfi_listtin_tuc5->addColumn("tin_tuc.TinTieuDiem", "CHECKBOX_1_0_TYPE", "TinTieuDiem", "%");
$tfi_listtin_tuc5->Execute();

// Sorter
$tso_listtin_tuc5 = new TSO_TableSorter("rstin_tuc1", "tso_listtin_tuc5");
$tso_listtin_tuc5->addColumn("tin_tuc.ID_TinTuc");
$tso_listtin_tuc5->addColumn("tin_tuc.TieuDe");
$tso_listtin_tuc5->addColumn("tin_tuc.TrichDanTin");
$tso_listtin_tuc5->addColumn("tin_tuc.HinhMinhHoa");
$tso_listtin_tuc5->addColumn("tin_tuc.TacGia");
$tso_listtin_tuc5->addColumn("tin_tuc.TinHot");
$tso_listtin_tuc5->addColumn("tin_tuc.TinTieuDiem");
$tso_listtin_tuc5->setDefault("tin_tuc.ID_TinTuc");
$tso_listtin_tuc5->Execute();

// Navigation
$nav_listtin_tuc5 = new NAV_Regular("nav_listtin_tuc5", "rstin_tuc1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rstin_tuc1 = $_SESSION['max_rows_nav_listtin_tuc5'];
$pageNum_rstin_tuc1 = 0;
if (isset($_GET['pageNum_rstin_tuc1'])) {
  $pageNum_rstin_tuc1 = $_GET['pageNum_rstin_tuc1'];
}
$startRow_rstin_tuc1 = $pageNum_rstin_tuc1 * $maxRows_rstin_tuc1;

// Defining List Recordset variable
$NXTFilter_rstin_tuc1 = "1=1";
if (isset($_SESSION['filter_tfi_listtin_tuc5'])) {
  $NXTFilter_rstin_tuc1 = $_SESSION['filter_tfi_listtin_tuc5'];
}
// Defining List Recordset variable
$NXTSort_rstin_tuc1 = "tin_tuc.ID_TinTuc";
if (isset($_SESSION['sorter_tso_listtin_tuc5'])) {
  $NXTSort_rstin_tuc1 = $_SESSION['sorter_tso_listtin_tuc5'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rstin_tuc1 = "SELECT tin_tuc.ID_TinTuc, tin_tuc.TieuDe, tin_tuc.TrichDanTin, tin_tuc.HinhMinhHoa, tin_tuc.TacGia, tin_tuc.TinHot, tin_tuc.TinTieuDiem FROM tin_tuc WHERE {$NXTFilter_rstin_tuc1} ORDER BY {$NXTSort_rstin_tuc1}";
$query_limit_rstin_tuc1 = sprintf("%s LIMIT %d, %d", $query_rstin_tuc1, $startRow_rstin_tuc1, $maxRows_rstin_tuc1);
$rstin_tuc1 = mysql_query($query_limit_rstin_tuc1, $conn_qlnd) or die(mysql_error());
$row_rstin_tuc1 = mysql_fetch_assoc($rstin_tuc1);

if (isset($_GET['totalRows_rstin_tuc1'])) {
  $totalRows_rstin_tuc1 = $_GET['totalRows_rstin_tuc1'];
} else {
  $all_rstin_tuc1 = mysql_query($query_rstin_tuc1);
  $totalRows_rstin_tuc1 = mysql_num_rows($all_rstin_tuc1);
}
$totalPages_rstin_tuc1 = ceil($totalRows_rstin_tuc1/$maxRows_rstin_tuc1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtin_tuc5->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rstin_tuc1.HinhMinhHoa}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
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
  .KT_col_ID_TinTuc {width:80px; overflow:hidden;}
  .KT_col_TieuDe {width:140px; overflow:hidden;}
  .KT_col_TrichDanTin {width:170px; overflow:hidden;}
  .KT_col_HinhMinhHoa {width:100px; overflow:hidden;}
  .KT_col_TacGia {width:80px; overflow:hidden;}
  .KT_col_TinHot {width:80px; overflow:hidden;}
  .KT_col_TinTieuDiem {width:80px; overflow:hidden;}
</style>
</head>

<body>
<div align="center">
  <div class="KT_tng" id="listtin_tuc5">
    <span class="chu">QUẢN LÝ TIN TỨC NHÀ ĐẤT</span>
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listtin_tuc5->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtin_tuc5'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listtin_tuc5']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtin_tuc5'] == 1) {
?>
                  <a href="<?php echo $tfi_listtin_tuc5->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listtin_tuc5->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="ID_TinTuc" class="KT_sorter KT_col_ID_TinTuc <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.ID_TinTuc'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.ID_TinTuc'); ?>">ID</a> </th>
              <th id="TieuDe" class="KT_sorter KT_col_TieuDe <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.TieuDe'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.TieuDe'); ?>">Tiêu Đề</a> </th>
              <th id="TrichDanTin" class="KT_sorter KT_col_TrichDanTin <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.TrichDanTin'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.TrichDanTin'); ?>">Trích Dẫn Tin</a> </th>
              <th id="HinhMinhHoa" class="KT_sorter KT_col_HinhMinhHoa <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.HinhMinhHoa'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.HinhMinhHoa'); ?>">Hình</a> </th>
              <th id="TacGia" class="KT_sorter KT_col_TacGia <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.TacGia'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.TacGia'); ?>">Tác Giả</a> </th>
              <th id="TinHot" class="KT_sorter KT_col_TinHot <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.TinHot'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.TinHot'); ?>">Hot</a> </th>
              <th id="TinTieuDiem" class="KT_sorter KT_col_TinTieuDiem <?php echo $tso_listtin_tuc5->getSortIcon('tin_tuc.TinTieuDiem'); ?>"> <a href="<?php echo $tso_listtin_tuc5->getSortLink('tin_tuc.TinTieuDiem'); ?>">Tiêu Điểm</a> </th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtin_tuc5'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listtin_tuc5_ID_TinTuc" id="tfi_listtin_tuc5_ID_TinTuc" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_ID_TinTuc']); ?>" size="20" maxlength="100" /></td>
                <td><input type="text" name="tfi_listtin_tuc5_TieuDe" id="tfi_listtin_tuc5_TieuDe" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_TieuDe']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listtin_tuc5_TrichDanTin" id="tfi_listtin_tuc5_TrichDanTin" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_TrichDanTin']); ?>" size="20" maxlength="200" /></td>
                <td><input type="text" name="tfi_listtin_tuc5_HinhMinhHoa" id="tfi_listtin_tuc5_HinhMinhHoa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_HinhMinhHoa']); ?>" size="20" maxlength="35" /></td>
                <td><input type="text" name="tfi_listtin_tuc5_TacGia" id="tfi_listtin_tuc5_TacGia" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_TacGia']); ?>" size="20" maxlength="45" /></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_TinHot']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listtin_tuc5_TinHot" id="tfi_listtin_tuc5_TinHot" value="1" /></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listtin_tuc5_TinTieuDiem']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listtin_tuc5_TinTieuDiem" id="tfi_listtin_tuc5_TinTieuDiem" value="1" /></td>
                <td><input type="submit" name="tfi_listtin_tuc5" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rstin_tuc1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="9"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rstin_tuc1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_tin_tuc" class="id_checkbox" value="<?php echo $row_rstin_tuc1['ID_TinTuc']; ?>" />
                      <input type="hidden" name="ID_TinTuc" class="id_field" value="<?php echo $row_rstin_tuc1['ID_TinTuc']; ?>" />
                  </td>
                  <td><div class="KT_col_ID_TinTuc"><?php echo KT_FormatForList($row_rstin_tuc1['ID_TinTuc'], 20); ?></div></td>
                  <td><div class="KT_col_TieuDe"><?php echo KT_FormatForList($row_rstin_tuc1['TieuDe'], 20); ?></div></td>
                  <td><div class="KT_col_TrichDanTin"><?php echo KT_FormatForList($row_rstin_tuc1['TrichDanTin'], 20); ?></div></td>
                  <td align="center"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                  <td><div class="KT_col_TacGia"><?php echo KT_FormatForList($row_rstin_tuc1['TacGia'], 20); ?></div></td>
                  <td><div class="KT_col_TinHot"><?php echo KT_FormatForList($row_rstin_tuc1['TinHot'], 20); ?></div></td>
                  <td><div class="KT_col_TinTieuDiem"><?php echo KT_FormatForList($row_rstin_tuc1['TinTieuDiem'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="admin.php?mod=form_tintuc&amp;ID_TinTuc=<?php echo $row_rstin_tuc1['ID_TinTuc']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rstin_tuc1 = mysql_fetch_assoc($rstin_tuc1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listtin_tuc5->Prepare();
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
          <a class="KT_additem_op_link" href="admin.php?mod=form_tintuc&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
      </form>
    </div>
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($rstin_tuc1);
?>
