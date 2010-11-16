<?php require_once('../Connections/conn_qlnd.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_conn_qlnd = new KT_connection($conn_qlnd, $database_conn_qlnd);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

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

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quan = "SELECT * FROM quan ORDER BY ID_Quan ASC";
$rs_quan = mysql_query($query_rs_quan, $conn_qlnd) or die(mysql_error());
$row_rs_quan = mysql_fetch_assoc($rs_quan);
$totalRows_rs_quan = mysql_num_rows($rs_quan);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TenQuan, ID_Quan FROM quan ORDER BY TenQuan";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_loainha = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha = mysql_query($query_rs_loainha, $conn_qlnd) or die(mysql_error());
$row_rs_loainha = mysql_fetch_assoc($rs_loainha);
$totalRows_rs_loainha = mysql_num_rows($rs_loainha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TenLoaiNha, ID_LoaiNha FROM loai_nha ORDER BY TenLoaiNha";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_thong_tin_tim_kiem = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_thong_tin_tim_kiem);
// Register triggers
$ins_thong_tin_tim_kiem->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_thong_tin_tim_kiem->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_thong_tin_tim_kiem->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_thong_tin_tim_kiem->setTable("thong_tin_tim_kiem");
$ins_thong_tin_tim_kiem->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$ins_thong_tin_tim_kiem->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$ins_thong_tin_tim_kiem->addColumn("GiaThapNhat", "NUMERIC_TYPE", "POST", "GiaThapNhat");
$ins_thong_tin_tim_kiem->addColumn("GiaCaoNhat", "NUMERIC_TYPE", "POST", "GiaCaoNhat");
$ins_thong_tin_tim_kiem->addColumn("DTNhoNhat", "NUMERIC_TYPE", "POST", "DTNhoNhat");
$ins_thong_tin_tim_kiem->addColumn("DTLonNhat", "NUMERIC_TYPE", "POST", "DTLonNhat");
$ins_thong_tin_tim_kiem->addColumn("SoPTam", "NUMERIC_TYPE", "POST", "SoPTam");
$ins_thong_tin_tim_kiem->addColumn("SoPNgu", "NUMERIC_TYPE", "POST", "SoPNgu");
$ins_thong_tin_tim_kiem->addColumn("ID_Quan", "NUMERIC_TYPE", "POST", "ID_Quan");
$ins_thong_tin_tim_kiem->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$ins_thong_tin_tim_kiem->setPrimaryKey("ID_ThongTin", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_thong_tin_tim_kiem = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_thong_tin_tim_kiem);
// Register triggers
$upd_thong_tin_tim_kiem->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_thong_tin_tim_kiem->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_thong_tin_tim_kiem->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_thong_tin_tim_kiem->setTable("thong_tin_tim_kiem");
$upd_thong_tin_tim_kiem->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$upd_thong_tin_tim_kiem->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$upd_thong_tin_tim_kiem->addColumn("GiaThapNhat", "NUMERIC_TYPE", "POST", "GiaThapNhat");
$upd_thong_tin_tim_kiem->addColumn("GiaCaoNhat", "NUMERIC_TYPE", "POST", "GiaCaoNhat");
$upd_thong_tin_tim_kiem->addColumn("DTNhoNhat", "NUMERIC_TYPE", "POST", "DTNhoNhat");
$upd_thong_tin_tim_kiem->addColumn("DTLonNhat", "NUMERIC_TYPE", "POST", "DTLonNhat");
$upd_thong_tin_tim_kiem->addColumn("SoPTam", "NUMERIC_TYPE", "POST", "SoPTam");
$upd_thong_tin_tim_kiem->addColumn("SoPNgu", "NUMERIC_TYPE", "POST", "SoPNgu");
$upd_thong_tin_tim_kiem->addColumn("ID_Quan", "NUMERIC_TYPE", "POST", "ID_Quan");
$upd_thong_tin_tim_kiem->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$upd_thong_tin_tim_kiem->setPrimaryKey("ID_ThongTin", "NUMERIC_TYPE", "GET", "ID_ThongTin");

// Make an instance of the transaction object
$del_thong_tin_tim_kiem = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_thong_tin_tim_kiem);
// Register triggers
$del_thong_tin_tim_kiem->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_thong_tin_tim_kiem->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_thong_tin_tim_kiem->setTable("thong_tin_tim_kiem");
$del_thong_tin_tim_kiem->setPrimaryKey("ID_ThongTin", "NUMERIC_TYPE", "GET", "ID_ThongTin");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsthong_tin_tim_kiem = $tNGs->getRecordset("thong_tin_tim_kiem");
$row_rsthong_tin_tim_kiem = mysql_fetch_assoc($rsthong_tin_tim_kiem);
$totalRows_rsthong_tin_tim_kiem = mysql_num_rows($rsthong_tin_tim_kiem);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
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
<div class="KT_tng">
<br />
  <span class="chu">
    CHỈNH SỬA THÔNG TIN TIM KIẾM</span>
  <br />
  <br />
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsthong_tin_tim_kiem > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table width="301" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td width="49" class="chu_xanh"><label for="GioiTinh_<?php echo $cnt1; ?>">Phái</label></td>
          <td width="174"><div>
              <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthong_tin_tim_kiem['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_1" value="1" />
              <label for="GioiTinh_<?php echo $cnt1; ?>_1">Nam</label>
            </div>
              <div>
                <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthong_tin_tim_kiem['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_2" value="0" />
                <label for="GioiTinh_<?php echo $cnt1; ?>_2">Nữ</label>
              </div>
              <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "GioiTinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="NgaySinh_<?php echo $cnt1; ?>">Ngày sinh</label></td>
          <td><input name="NgaySinh_<?php echo $cnt1; ?>" id="NgaySinh_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsthong_tin_tim_kiem['NgaySinh']); ?>" size="30" maxlength="45" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
              <?php echo $tNGs->displayFieldHint("NgaySinh");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "NgaySinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="GiaThapNhat_<?php echo $cnt1; ?>">Giá Min</label></td>
          <td><input type="text" name="GiaThapNhat_<?php echo $cnt1; ?>" id="GiaThapNhat_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['GiaThapNhat']); ?>" size="20" />
              <?php echo $tNGs->displayFieldHint("GiaThapNhat");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "GiaThapNhat", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="GiaCaoNhat_<?php echo $cnt1; ?>">Giá Max</label></td>
          <td><input type="text" name="GiaCaoNhat_<?php echo $cnt1; ?>" id="GiaCaoNhat_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['GiaCaoNhat']); ?>" size="30" />
              <?php echo $tNGs->displayFieldHint("GiaCaoNhat");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "GiaCaoNhat", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="DTNhoNhat_<?php echo $cnt1; ?>">DT min</label></td>
          <td><input type="text" name="DTNhoNhat_<?php echo $cnt1; ?>" id="DTNhoNhat_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['DTNhoNhat']); ?>" size="20" />
              <?php echo $tNGs->displayFieldHint("DTNhoNhat");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "DTNhoNhat", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="DTLonNhat_<?php echo $cnt1; ?>">DT Max</label></td>
          <td><input type="text" name="DTLonNhat_<?php echo $cnt1; ?>" id="DTLonNhat_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['DTLonNhat']); ?>" size="30" />
              <?php echo $tNGs->displayFieldHint("DTLonNhat");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "DTLonNhat", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="SoPTam_<?php echo $cnt1; ?>">Số PTam</label></td>
          <td><input type="text" name="SoPTam_<?php echo $cnt1; ?>" id="SoPTam_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['SoPTam']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("SoPTam");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "SoPTam", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="SoPNgu_<?php echo $cnt1; ?>">Số PNgu</label></td>
          <td><input type="text" name="SoPNgu_<?php echo $cnt1; ?>" id="SoPNgu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['SoPNgu']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("SoPNgu");?> <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "SoPNgu", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_Quan_<?php echo $cnt1; ?>">Quận</label></td>
          <td><select name="ID_Quan_<?php echo $cnt1; ?>" id="ID_Quan_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_quan['ID_Quan']?>"<?php if (!(strcmp($row_rs_quan['ID_Quan'], $row_rsthong_tin_tim_kiem['ID_Quan']))) {echo "SELECTED";} ?>><?php echo $row_rs_quan['TenQuan']?></option>
            <?php
} while ($row_rs_quan = mysql_fetch_assoc($rs_quan));
  $rows = mysql_num_rows($rs_quan);
  if($rows > 0) {
      mysql_data_seek($rs_quan, 0);
	  $row_rs_quan = mysql_fetch_assoc($rs_quan);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "ID_Quan", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_LoaiNha_<?php echo $cnt1; ?>">Loại nhà</label></td>
          <td><select name="ID_LoaiNha_<?php echo $cnt1; ?>" id="ID_LoaiNha_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset2['ID_LoaiNha']?>"<?php if (!(strcmp($row_Recordset2['ID_LoaiNha'], $row_rsthong_tin_tim_kiem['ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['TenLoaiNha']?></option>
            <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("thong_tin_tim_kiem", "ID_LoaiNha", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_thong_tin_tim_kiem_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsthong_tin_tim_kiem['kt_pk_thong_tin_tim_kiem']); ?>" />
      <?php } while ($row_rsthong_tin_tim_kiem = mysql_fetch_assoc($rsthong_tin_tim_kiem)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_ThongTin'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_ThongTin')" />
          </div>
          <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
          <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
          <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($rs_quan);

mysql_free_result($Recordset1);

mysql_free_result($rs_loainha);

mysql_free_result($Recordset2);
?>
