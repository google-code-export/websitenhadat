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
$formValidation->addField("TimeBD", true, "date", "", "", "", "Vui lòng nhập thời gian bắt đầu thuê.");
$formValidation->addField("ID_NhaDat", true, "numeric", "", "", "", "Vui lòng chọn nhà đất.");
$formValidation->addField("ID_NguoiThue", true, "numeric", "", "", "", "Vui lòng chọn tên người thuê.");
$formValidation->addField("ID_NV", true, "text", "", "", "", "Vui lòng nhập nhân viên.");
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
$query_rs_nhanvien = "SELECT ID_NV, TenNV FROM nhan_vien ORDER BY ID_NV ASC";
$rs_nhanvien = mysql_query($query_rs_nhanvien, $conn_qlnd) or die(mysql_error());
$row_rs_nhanvien = mysql_fetch_assoc($rs_nhanvien);
$totalRows_rs_nhanvien = mysql_num_rows($rs_nhanvien);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset3 = "SELECT TenNV, ID_NV FROM nhan_vien ORDER BY TenNV";
$Recordset3 = mysql_query($query_Recordset3, $conn_qlnd) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_nguoithue = "SELECT ID_NguoiThue, TenNguoiThue FROM nguoi_thue ORDER BY ID_NguoiThue ASC";
$rs_nguoithue = mysql_query($query_rs_nguoithue, $conn_qlnd) or die(mysql_error());
$row_rs_nguoithue = mysql_fetch_assoc($rs_nguoithue);
$totalRows_rs_nguoithue = mysql_num_rows($rs_nguoithue);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TenNguoiThue, ID_NguoiThue FROM nguoi_thue ORDER BY TenNguoiThue";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_nhadat = "SELECT ID_NhaDat, TieuDe FROM nha_dat ORDER BY ID_NhaDat ASC";
$rs_nhadat = mysql_query($query_rs_nhadat, $conn_qlnd) or die(mysql_error());
$row_rs_nhadat = mysql_fetch_assoc($rs_nhadat);
$totalRows_rs_nhadat = mysql_num_rows($rs_nhadat);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TieuDe, ID_NhaDat FROM nha_dat ORDER BY TieuDe";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Make an insert transaction instance
$ins_hop_dong = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_hop_dong);
// Register triggers
$ins_hop_dong->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_hop_dong->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_hop_dong->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_hop_dong->setTable("hop_dong");
$ins_hop_dong->addColumn("TimeBD", "DATE_TYPE", "POST", "TimeBD");
$ins_hop_dong->addColumn("TimeKT", "DATE_TYPE", "POST", "TimeKT");
$ins_hop_dong->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "0");
$ins_hop_dong->addColumn("ChuThich", "STRING_TYPE", "POST", "ChuThich");
$ins_hop_dong->addColumn("NgayKy", "DATE_TYPE", "POST", "NgayKy", "{NOW_DT}");
$ins_hop_dong->addColumn("ID_NhaDat", "NUMERIC_TYPE", "POST", "ID_NhaDat");
$ins_hop_dong->addColumn("ID_NguoiThue", "NUMERIC_TYPE", "POST", "ID_NguoiThue");
$ins_hop_dong->addColumn("ID_NV", "STRING_TYPE", "POST", "ID_NV");
$ins_hop_dong->setPrimaryKey("ID_HopDong", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_hop_dong = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_hop_dong);
// Register triggers
$upd_hop_dong->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_hop_dong->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_hop_dong->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_hop_dong->setTable("hop_dong");
$upd_hop_dong->addColumn("TimeBD", "DATE_TYPE", "POST", "TimeBD");
$upd_hop_dong->addColumn("TimeKT", "DATE_TYPE", "POST", "TimeKT");
$upd_hop_dong->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_hop_dong->addColumn("ChuThich", "STRING_TYPE", "POST", "ChuThich");
$upd_hop_dong->addColumn("NgayKy", "DATE_TYPE", "POST", "NgayKy");
$upd_hop_dong->addColumn("ID_NhaDat", "NUMERIC_TYPE", "POST", "ID_NhaDat");
$upd_hop_dong->addColumn("ID_NguoiThue", "NUMERIC_TYPE", "POST", "ID_NguoiThue");
$upd_hop_dong->addColumn("ID_NV", "STRING_TYPE", "POST", "ID_NV");
$upd_hop_dong->setPrimaryKey("ID_HopDong", "NUMERIC_TYPE", "GET", "ID_HopDong");

// Make an instance of the transaction object
$del_hop_dong = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_hop_dong);
// Register triggers
$del_hop_dong->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_hop_dong->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_hop_dong->setTable("hop_dong");
$del_hop_dong->setPrimaryKey("ID_HopDong", "NUMERIC_TYPE", "GET", "ID_HopDong");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rshop_dong = $tNGs->getRecordset("hop_dong");
$row_rshop_dong = mysql_fetch_assoc($rshop_dong);
$totalRows_rshop_dong = mysql_num_rows($rshop_dong);
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
<script type="text/javascript" src="../Editor/scripts/innovaeditor.js"></script>

</head>

<body>
<div align="center">
<div class="KT_tng">
<br />
  <span class="chu">
    CHỈNH SỬA THÔNG TIN HỢP ĐỒNG</span>
  <br />
  <br />
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rshop_dong > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="chu_xanh"><label for="TimeBD_<?php echo $cnt1; ?>">T/g bắt đầu</label></td>
          <td><input name="TimeBD_<?php echo $cnt1; ?>" id="TimeBD_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rshop_dong['TimeBD']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
              <?php echo $tNGs->displayFieldHint("TimeBD");?> <?php echo $tNGs->displayFieldError("hop_dong", "TimeBD", $cnt1); ?></td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="TimeKT_<?php echo $cnt1; ?>">T/g kết thúc</label></td>
          <td><input name="TimeKT_<?php echo $cnt1; ?>" id="TimeKT_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rshop_dong['TimeKT']); ?>" size="10" maxlength="22" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
              <?php echo $tNGs->displayFieldHint("TimeKT");?> <?php echo $tNGs->displayFieldError("hop_dong", "TimeKT", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="AnHien_<?php echo $cnt1; ?>">Ẩn hiện</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rshop_dong['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
              <?php echo $tNGs->displayFieldError("hop_dong", "AnHien", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ChuThich_<?php echo $cnt1; ?>">Chú thích</label></td>
          <td><textarea name="ChuThich_<?php echo $cnt1; ?>" id="ChuThich_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rshop_dong['ChuThich']); ?></textarea>
          
          <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    oEdit1.width=500;
    oEdit1.height=200;

    /***************************************************
    ADDING CUSTOM BUTTONS
    ***************************************************/

    oEdit1.arrCustomButtons = [["CustomName1","alert('Command 1 here.')","Caption 1 here","btnCustom1.gif"],
    ["CustomName2","alert(\"Command '2' here.\")","Caption 2 here","btnCustom2.gif"],
    ["CustomName3","alert('Command \"3\" here.')","Caption 3 here","btnCustom3.gif"]]


    /***************************************************
    RECONFIGURE TOOLBAR BUTTONS
    ***************************************************/

    oEdit1.tabs=[
    ["tabHome", "Home", ["grpEdit", "grpFont", "grpPara", "grpInsert", "grpTables"]],
    ["tabStyle", "Objects", ["grpResource", "grpMedia", "grpMisc", "grpCustom"]]
    ];

    oEdit1.groups=[
    ["grpEdit", "", ["Undo", "Redo", "FullScreen", "RemoveFormat", "BRK", "Cut", "Copy", "Paste", "PasteWord", "PasteText", "XHTMLSource"]],
    ["grpFont", "", ["FontName", "FontSize", "Styles", "BRK", "Bold", "Italic", "Underline", "Strikethrough", "Superscript", "ForeColor", "BackColor"]],
    ["grpPara", "", ["Paragraph", "Indent", "Outdent", "StyleAndFormatting", "BRK", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull", "Numbering", "Bullets"]],
    ["grpInsert", "", ["Hyperlink", "Bookmark", "BRK", "Image"]],
    ["grpTables", "", ["Table", "BRK", "Guidelines"]],
    ["grpResource", "", ["InternalLink", "BRK", "CustomObject"]],
    ["grpMedia", "", ["Media", "BRK", "Flash"]],
    ["grpMisc", "", ["Characters", "Line", "Absolute", "BRK", "CustomTag"]],
    ["grpCustom", "", ["CustomName1","CustomName2", "BRK","CustomName3"]]
    ];

    /***************************************************
    OTHER SETTINGS
    ***************************************************/
    oEdit1.css="style/test.css";//Specify external css file here

    oEdit1.cmdAssetManager = "modalDialogShow('/Editor/assetmanager/assetmanager.php',640,465)"; //Command to open the Asset Manager add-on.
    oEdit1.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.
    oEdit1.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.

    oEdit1.arrCustomTag=[["First Name","{%first_name%}"],
    ["Last Name","{%last_name%}"],
    ["Email","{%email%}"]];//Define custom tag selection

    oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors

    oEdit1.mode="XHTMLBody"; //Editing mode. Possible values: "HTMLBody" (default), "XHTMLBody", "HTML", "XHTML"

    oEdit1.REPLACE("ChuThich_<?php echo $cnt1; ?>");
  </script>
          
          
              <?php echo $tNGs->displayFieldHint("ChuThich");?> <?php echo $tNGs->displayFieldError("hop_dong", "ChuThich", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="NgayKy_<?php echo $cnt1; ?>">Ngày ký</label></td>
          <td><input name="NgayKy_<?php echo $cnt1; ?>" id="NgayKy_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rshop_dong['NgayKy']); ?>" size="10" maxlength="22" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
              <?php echo $tNGs->displayFieldHint("NgayKy");?> <?php echo $tNGs->displayFieldError("hop_dong", "NgayKy", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_NhaDat_<?php echo $cnt1; ?>">Mã Nhà</label></td>
          <td><select name="ID_NhaDat_<?php echo $cnt1; ?>" id="ID_NhaDat_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset1['ID_NhaDat']?>"<?php if (!(strcmp($row_Recordset1['ID_NhaDat'], $row_rshop_dong['ID_NhaDat']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['ID_NhaDat']?></option>
            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("hop_dong", "ID_NhaDat", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_NguoiThue_<?php echo $cnt1; ?>">Mã Người Thuê</label></td>
          <td><select name="ID_NguoiThue_<?php echo $cnt1; ?>" id="ID_NguoiThue_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_nguoithue['ID_NguoiThue']?>"<?php if (!(strcmp($row_rs_nguoithue['ID_NguoiThue'], $row_rshop_dong['ID_NguoiThue']))) {echo "SELECTED";} ?>><?php echo $row_rs_nguoithue['ID_NguoiThue']?></option>
            <?php
} while ($row_rs_nguoithue = mysql_fetch_assoc($rs_nguoithue));
  $rows = mysql_num_rows($rs_nguoithue);
  if($rows > 0) {
      mysql_data_seek($rs_nguoithue, 0);
	  $row_rs_nguoithue = mysql_fetch_assoc($rs_nguoithue);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("hop_dong", "ID_NguoiThue", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_NV_<?php echo $cnt1; ?>">Mã Nhân Viên</label></td>
          <td><select name="ID_NV_<?php echo $cnt1; ?>" id="ID_NV_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_nhanvien['ID_NV']?>"<?php if (!(strcmp($row_rs_nhanvien['ID_NV'], $row_rshop_dong['ID_NV']))) {echo "SELECTED";} ?>><?php echo $row_rs_nhanvien['ID_NV']?></option>
            <?php
} while ($row_rs_nhanvien = mysql_fetch_assoc($rs_nhanvien));
  $rows = mysql_num_rows($rs_nhanvien);
  if($rows > 0) {
      mysql_data_seek($rs_nhanvien, 0);
	  $row_rs_nhanvien = mysql_fetch_assoc($rs_nhanvien);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("hop_dong", "ID_NV", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_hop_dong_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rshop_dong['kt_pk_hop_dong']); ?>" />
      <?php } while ($row_rshop_dong = mysql_fetch_assoc($rshop_dong)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_HopDong'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_HopDong')" />
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
mysql_free_result($rs_nhanvien);

mysql_free_result($Recordset3);

mysql_free_result($rs_nguoithue);

mysql_free_result($Recordset2);

mysql_free_result($rs_nhadat);

mysql_free_result($Recordset1);
?>
