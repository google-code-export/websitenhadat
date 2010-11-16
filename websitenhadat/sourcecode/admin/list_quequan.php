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
$tfi_listque_quan1 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listque_quan1");
$tfi_listque_quan1->addColumn("que_quan.ID_QueQuan", "NUMERIC_TYPE", "ID_QueQuan", "=");
$tfi_listque_quan1->addColumn("que_quan.Ten_QueQuan", "STRING_TYPE", "Ten_QueQuan", "%");
$tfi_listque_quan1->Execute();

// Sorter
$tso_listque_quan1 = new TSO_TableSorter("rsque_quan1", "tso_listque_quan1");
$tso_listque_quan1->addColumn("que_quan.ID_QueQuan");
$tso_listque_quan1->addColumn("que_quan.Ten_QueQuan");
$tso_listque_quan1->setDefault("que_quan.ID_QueQuan");
$tso_listque_quan1->Execute();

// Navigation
$nav_listque_quan1 = new NAV_Regular("nav_listque_quan1", "rsque_quan1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsque_quan1 = $_SESSION['max_rows_nav_listque_quan1'];
$pageNum_rsque_quan1 = 0;
if (isset($_GET['pageNum_rsque_quan1'])) {
  $pageNum_rsque_quan1 = $_GET['pageNum_rsque_quan1'];
}
$startRow_rsque_quan1 = $pageNum_rsque_quan1 * $maxRows_rsque_quan1;

// Defining List Recordset variable
$NXTFilter_rsque_quan1 = "1=1";
if (isset($_SESSION['filter_tfi_listque_quan1'])) {
  $NXTFilter_rsque_quan1 = $_SESSION['filter_tfi_listque_quan1'];
}
// Defining List Recordset variable
$NXTSort_rsque_quan1 = "que_quan.ID_QueQuan";
if (isset($_SESSION['sorter_tso_listque_quan1'])) {
  $NXTSort_rsque_quan1 = $_SESSION['sorter_tso_listque_quan1'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rsque_quan1 = "SELECT que_quan.ID_QueQuan, que_quan.Ten_QueQuan FROM que_quan WHERE {$NXTFilter_rsque_quan1} ORDER BY {$NXTSort_rsque_quan1}";
$query_limit_rsque_quan1 = sprintf("%s LIMIT %d, %d", $query_rsque_quan1, $startRow_rsque_quan1, $maxRows_rsque_quan1);
$rsque_quan1 = mysql_query($query_limit_rsque_quan1, $conn_qlnd) or die(mysql_error());
$row_rsque_quan1 = mysql_fetch_assoc($rsque_quan1);

if (isset($_GET['totalRows_rsque_quan1'])) {
  $totalRows_rsque_quan1 = $_GET['totalRows_rsque_quan1'];
} else {
  $all_rsque_quan1 = mysql_query($query_rsque_quan1);
  $totalRows_rsque_quan1 = mysql_num_rows($all_rsque_quan1);
}
$totalPages_rsque_quan1 = ceil($totalRows_rsque_quan1/$maxRows_rsque_quan1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listque_quan1->checkBoundries();
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
  .KT_col_ID_QueQuan {width:140px; overflow:hidden;}
  .KT_col_Ten_QueQuan {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div align="center">
  <div class="KT_tng" id="listque_quan1">
  <br />
    <span class="chu"> QUẢN LÝ THÔNG TIN QUÊ QUÁN CỦA KHÁCH HÀNG</span>
    <br />
    <br />
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listque_quan1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listque_quan1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listque_quan1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listque_quan1'] == 1) {
?>
                  <a href="<?php echo $tfi_listque_quan1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listque_quan1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="ID_QueQuan" class="KT_sorter KT_col_ID_QueQuan <?php echo $tso_listque_quan1->getSortIcon('que_quan.ID_QueQuan'); ?>"> <a href="<?php echo $tso_listque_quan1->getSortLink('que_quan.ID_QueQuan'); ?>">Mã Quê Quán</a> </th>
              <th id="Ten_QueQuan" class="KT_sorter KT_col_Ten_QueQuan <?php echo $tso_listque_quan1->getSortIcon('que_quan.Ten_QueQuan'); ?>"> <a href="<?php echo $tso_listque_quan1->getSortLink('que_quan.Ten_QueQuan'); ?>">Tên Quê Quán</a> </th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listque_quan1'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listque_quan1_ID_QueQuan" id="tfi_listque_quan1_ID_QueQuan" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listque_quan1_ID_QueQuan']); ?>" size="20" maxlength="100" /></td>
                <td><input type="text" name="tfi_listque_quan1_Ten_QueQuan" id="tfi_listque_quan1_Ten_QueQuan" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listque_quan1_Ten_QueQuan']); ?>" size="20" maxlength="45" /></td>
                <td><input type="submit" name="tfi_listque_quan1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rsque_quan1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rsque_quan1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_que_quan" class="id_checkbox" value="<?php echo $row_rsque_quan1['ID_QueQuan']; ?>" />
                      <input type="hidden" name="ID_QueQuan" class="id_field" value="<?php echo $row_rsque_quan1['ID_QueQuan']; ?>" />
                  </td>
                  <td><div class="KT_col_ID_QueQuan"><?php echo KT_FormatForList($row_rsque_quan1['ID_QueQuan'], 20); ?></div></td>
                  <td><div class="KT_col_Ten_QueQuan"><?php echo KT_FormatForList($row_rsque_quan1['Ten_QueQuan'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="admin.php?mod=form_quequan&amp;ID_QueQuan=<?php echo $row_rsque_quan1['ID_QueQuan']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rsque_quan1 = mysql_fetch_assoc($rsque_quan1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listque_quan1->Prepare();
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
          <a class="KT_additem_op_link" href="admin.php?mod=form_quequan&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>
<?php
mysql_free_result($rsque_quan1);
?>
