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
$tfi_listthanh_vien5 = new TFI_TableFilter($conn_conn_qlnd, "tfi_listthanh_vien5");
$tfi_listthanh_vien5->addColumn("thanh_vien.TenThanhVien", "STRING_TYPE", "TenThanhVien", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.UserName", "STRING_TYPE", "UserName", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.PassWord", "STRING_TYPE", "PassWord", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.DienThoai", "STRING_TYPE", "DienThoai", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.GioiTinh", "STRING_TYPE", "GioiTinh", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.Email", "STRING_TYPE", "Email", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.Avartar", "STRING_TYPE", "Avartar", "%");
$tfi_listthanh_vien5->addColumn("thanh_vien.AcessLevel", "NUMERIC_TYPE", "AcessLevel", "=");
$tfi_listthanh_vien5->Execute();

// Sorter
$tso_listthanh_vien5 = new TSO_TableSorter("rsthanh_vien1", "tso_listthanh_vien5");
$tso_listthanh_vien5->addColumn("thanh_vien.TenThanhVien");
$tso_listthanh_vien5->addColumn("thanh_vien.UserName");
$tso_listthanh_vien5->addColumn("thanh_vien.PassWord");
$tso_listthanh_vien5->addColumn("thanh_vien.DienThoai");
$tso_listthanh_vien5->addColumn("thanh_vien.GioiTinh");
$tso_listthanh_vien5->addColumn("thanh_vien.Email");
$tso_listthanh_vien5->addColumn("thanh_vien.Avartar");
$tso_listthanh_vien5->addColumn("thanh_vien.AcessLevel");
$tso_listthanh_vien5->setDefault("thanh_vien.AcessLevel");
$tso_listthanh_vien5->Execute();

// Navigation
$nav_listthanh_vien5 = new NAV_Regular("nav_listthanh_vien5", "rsthanh_vien1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsthanh_vien1 = $_SESSION['max_rows_nav_listthanh_vien5'];
$pageNum_rsthanh_vien1 = 0;
if (isset($_GET['pageNum_rsthanh_vien1'])) {
  $pageNum_rsthanh_vien1 = $_GET['pageNum_rsthanh_vien1'];
}
$startRow_rsthanh_vien1 = $pageNum_rsthanh_vien1 * $maxRows_rsthanh_vien1;

// Defining List Recordset variable
$NXTFilter_rsthanh_vien1 = "1=1";
if (isset($_SESSION['filter_tfi_listthanh_vien5'])) {
  $NXTFilter_rsthanh_vien1 = $_SESSION['filter_tfi_listthanh_vien5'];
}
// Defining List Recordset variable
$NXTSort_rsthanh_vien1 = "thanh_vien.AcessLevel";
if (isset($_SESSION['sorter_tso_listthanh_vien5'])) {
  $NXTSort_rsthanh_vien1 = $_SESSION['sorter_tso_listthanh_vien5'];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);

$query_rsthanh_vien1 = "SELECT thanh_vien.TenThanhVien, thanh_vien.UserName, thanh_vien.PassWord, thanh_vien.DienThoai, thanh_vien.GioiTinh, thanh_vien.Email, thanh_vien.Avartar, thanh_vien.AcessLevel, thanh_vien.ID_ThanhVien FROM thanh_vien WHERE {$NXTFilter_rsthanh_vien1} ORDER BY {$NXTSort_rsthanh_vien1}";
$query_limit_rsthanh_vien1 = sprintf("%s LIMIT %d, %d", $query_rsthanh_vien1, $startRow_rsthanh_vien1, $maxRows_rsthanh_vien1);
$rsthanh_vien1 = mysql_query($query_limit_rsthanh_vien1, $conn_qlnd) or die(mysql_error());
$row_rsthanh_vien1 = mysql_fetch_assoc($rsthanh_vien1);

if (isset($_GET['totalRows_rsthanh_vien1'])) {
  $totalRows_rsthanh_vien1 = $_GET['totalRows_rsthanh_vien1'];
} else {
  $all_rsthanh_vien1 = mysql_query($query_rsthanh_vien1);
  $totalRows_rsthanh_vien1 = mysql_num_rows($all_rsthanh_vien1);
}
$totalPages_rsthanh_vien1 = ceil($totalRows_rsthanh_vien1/$maxRows_rsthanh_vien1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listthanh_vien5->checkBoundries();
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
  .KT_col_TenThanhVien {width:120px; overflow:hidden;}
  .KT_col_UserName {width:80px; overflow:hidden;}
  .KT_col_PassWord {width:80px; overflow:hidden;}
  .KT_col_DienThoai {width:90px; overflow:hidden;}
  .KT_col_GioiTinh {width:80px; overflow:hidden;}
  .KT_col_Email {width:100px; overflow:hidden;}
  .KT_col_Avartar {width:100px; overflow:hidden;}
  .KT_col_AcessLevel {width:60px; overflow:hidden;}
</style>
<body>

<div align="center">
  <div class="KT_tng" id="listthanh_vien5">
    <span class="chu">QUẢN LÝ THÔNG TIN THÀNH VIÊN </span>
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listthanh_vien5->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listthanh_vien5'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listthanh_vien5']; ?>
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
  if (@$_SESSION['has_filter_tfi_listthanh_vien5'] == 1) {
?>
                  <a href="<?php echo $tfi_listthanh_vien5->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listthanh_vien5->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="TenThanhVien" class="KT_sorter KT_col_TenThanhVien <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.TenThanhVien'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.TenThanhVien'); ?>">Tên Thành Viên</a> </th>
              <th id="UserName" class="KT_sorter KT_col_UserName <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.UserName'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.UserName'); ?>">UserName</a> </th>
              <th id="PassWord" class="KT_sorter KT_col_PassWord <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.PassWord'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.PassWord'); ?>">PassWord</a> </th>
              <th id="DienThoai" class="KT_sorter KT_col_DienThoai <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.DienThoai'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.DienThoai'); ?>">Điện Thoại</a> </th>
              <th id="GioiTinh" class="KT_sorter KT_col_GioiTinh <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.GioiTinh'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.GioiTinh'); ?>">Giới Tính</a> </th>
              <th id="Email" class="KT_sorter KT_col_Email <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.Email'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.Email'); ?>">Email</a> </th>
              <th id="Avartar" class="KT_sorter KT_col_Avartar <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.Avartar'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.Avartar'); ?>">Avartar</a> </th>
              <th id="AcessLevel" class="KT_sorter KT_col_AcessLevel <?php echo $tso_listthanh_vien5->getSortIcon('thanh_vien.AcessLevel'); ?>"> <a href="<?php echo $tso_listthanh_vien5->getSortLink('thanh_vien.AcessLevel'); ?>">AcessLevel</a> </th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listthanh_vien5'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listthanh_vien5_TenThanhVien" id="tfi_listthanh_vien5_TenThanhVien" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_TenThanhVien']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_UserName" id="tfi_listthanh_vien5_UserName" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_UserName']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_PassWord" id="tfi_listthanh_vien5_PassWord" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_PassWord']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_DienThoai" id="tfi_listthanh_vien5_DienThoai" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_DienThoai']); ?>" size="20" maxlength="20" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_GioiTinh" id="tfi_listthanh_vien5_GioiTinh" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_GioiTinh']); ?>" size="20" maxlength="20" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_Email" id="tfi_listthanh_vien5_Email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_Email']); ?>" size="20" maxlength="35" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_Avartar" id="tfi_listthanh_vien5_Avartar" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_Avartar']); ?>" size="20" maxlength="45" /></td>
                <td><input type="text" name="tfi_listthanh_vien5_AcessLevel" id="tfi_listthanh_vien5_AcessLevel" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listthanh_vien5_AcessLevel']); ?>" size="20" maxlength="100" /></td>
                <td><input type="submit" name="tfi_listthanh_vien5" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rsthanh_vien1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="10"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rsthanh_vien1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_thanh_vien" class="id_checkbox" value="<?php echo $row_rsthanh_vien1['ID_ThanhVien']; ?>" />
                      <input type="hidden" name="ID_ThanhVien" class="id_field" value="<?php echo $row_rsthanh_vien1['ID_ThanhVien']; ?>" />
                  </td>
                  <td><div class="KT_col_TenThanhVien"><?php echo KT_FormatForList($row_rsthanh_vien1['TenThanhVien'], 20); ?></div></td>
                  <td><div class="KT_col_UserName"><?php echo KT_FormatForList($row_rsthanh_vien1['UserName'], 20); ?></div></td>
                  <td><div class="KT_col_PassWord"><?php echo KT_FormatForList($row_rsthanh_vien1['PassWord'], 20); ?></div></td>
                  <td><div class="KT_col_DienThoai"><?php echo KT_FormatForList($row_rsthanh_vien1['DienThoai'], 20); ?></div></td>
                  <td><div class="KT_col_GioiTinh"><?php echo KT_FormatForList($row_rsthanh_vien1['GioiTinh'], 20); ?></div></td>
                  <td><div class="KT_col_Email"><?php echo KT_FormatForList($row_rsthanh_vien1['Email'], 20); ?></div></td>
                  <td><div class="KT_col_Avartar"><?php echo KT_FormatForList($row_rsthanh_vien1['Avartar'], 20); ?></div></td>
                  <td><div class="KT_col_AcessLevel"><?php echo KT_FormatForList($row_rsthanh_vien1['AcessLevel'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="admin.php?mod=form_thanhvien&amp;ID_ThanhVien=<?php echo $row_rsthanh_vien1['ID_ThanhVien']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rsthanh_vien1 = mysql_fetch_assoc($rsthanh_vien1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listthanh_vien5->Prepare();
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
          <a class="KT_additem_op_link" href="admin.php?mod=form_thanhvien&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
      </form>
    </div>
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($rsthanh_vien1);
?>




