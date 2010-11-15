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
$formValidation->addField("TenNV", true, "text", "", "", "", "Vui lòng nhập tên nhân viên!");
$formValidation->addField("Email_HoTro", true, "text", "", "", "", "Vui lòng nhập Email !");
$formValidation->addField("DienThoai", true, "text", "", "", "", "Vui lòng nhập điện thoại!");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_nhan_vien = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_nhan_vien);
// Register triggers
$ins_nhan_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_nhan_vien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_nhan_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_nhan_vien->setTable("nhan_vien");
$ins_nhan_vien->addColumn("TenNV", "STRING_TYPE", "POST", "TenNV");
$ins_nhan_vien->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_nhan_vien->addColumn("Email_HoTro", "STRING_TYPE", "POST", "Email_HoTro");
$ins_nhan_vien->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$ins_nhan_vien->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$ins_nhan_vien->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$ins_nhan_vien->addColumn("Luong", "STRING_TYPE", "POST", "Luong");
$ins_nhan_vien->setPrimaryKey("ID_NV", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_nhan_vien = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_nhan_vien);
// Register triggers
$upd_nhan_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_nhan_vien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_nhan_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_nhan_vien->setTable("nhan_vien");
$upd_nhan_vien->addColumn("TenNV", "STRING_TYPE", "POST", "TenNV");
$upd_nhan_vien->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$upd_nhan_vien->addColumn("Email_HoTro", "STRING_TYPE", "POST", "Email_HoTro");
$upd_nhan_vien->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$upd_nhan_vien->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$upd_nhan_vien->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$upd_nhan_vien->addColumn("Luong", "STRING_TYPE", "POST", "Luong");
$upd_nhan_vien->setPrimaryKey("ID_NV", "NUMERIC_TYPE", "GET", "ID_NV");

// Make an instance of the transaction object
$del_nhan_vien = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_nhan_vien);
// Register triggers
$del_nhan_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_nhan_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_nhan_vien->setTable("nhan_vien");
$del_nhan_vien->setPrimaryKey("ID_NV", "NUMERIC_TYPE", "GET", "ID_NV");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnhan_vien = $tNGs->getRecordset("nhan_vien");
$row_rsnhan_vien = mysql_fetch_assoc($rsnhan_vien);
$totalRows_rsnhan_vien = mysql_num_rows($rsnhan_vien);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
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
      CHỈNH SỬA THÔNG TIN NHÂN VIÊN</span>
    <br />
    <br />
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnhan_vien > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh"><label for="TenNV_<?php echo $cnt1; ?>">Tên NV</label></td>
            <td><input type="text" name="TenNV_<?php echo $cnt1; ?>" id="TenNV_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnhan_vien['TenNV']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("TenNV");?> <?php echo $tNGs->displayFieldError("nhan_vien", "TenNV", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="DiaChi_<?php echo $cnt1; ?>">Địa Chỉ</label></td>
              <td><textarea name="DiaChi_<?php echo $cnt1; ?>" id="DiaChi_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnhan_vien['DiaChi']); ?></textarea>
              
              <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    oEdit1.width=500;
    oEdit1.height=300;

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

    oEdit1.REPLACE("DiaChi_<?php echo $cnt1; ?>");
  </script>
              
                  <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("nhan_vien", "DiaChi", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="Email_HoTro_<?php echo $cnt1; ?>">Email</label></td>
            <td><input type="text" name="Email_HoTro_<?php echo $cnt1; ?>" id="Email_HoTro_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnhan_vien['Email_HoTro']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("Email_HoTro");?> <?php echo $tNGs->displayFieldError("nhan_vien", "Email_HoTro", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="DienThoai_<?php echo $cnt1; ?>">Điện Thoại</label></td>
            <td><input type="text" name="DienThoai_<?php echo $cnt1; ?>" id="DienThoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnhan_vien['DienThoai']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("nhan_vien", "DienThoai", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="GioiTinh_<?php echo $cnt1; ?>_1">Giới Tính</label></td>
              <td><div>
                  <input <?php if (!(strcmp(KT_escapeAttribute($row_rsnhan_vien['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_1" value="1" />
                  <label for="GioiTinh_<?php echo $cnt1; ?>_1">Nam</label>
                </div>
                  <div>
                    <input <?php if (!(strcmp(KT_escapeAttribute($row_rsnhan_vien['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_2" value="0" />
                    <label for="GioiTinh_<?php echo $cnt1; ?>_2">Nữ</label>
                  </div>
                <?php echo $tNGs->displayFieldError("nhan_vien", "GioiTinh", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="NgaySinh_<?php echo $cnt1; ?>">Ngày Sinh</label></td>
            <td><input name="NgaySinh_<?php echo $cnt1; ?>" id="NgaySinh_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsnhan_vien['NgaySinh']); ?>" size="10" maxlength="22" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
                  <?php echo $tNGs->displayFieldHint("NgaySinh");?> <?php echo $tNGs->displayFieldError("nhan_vien", "NgaySinh", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="Luong_<?php echo $cnt1; ?>">Lương</label></td>
            <td><input type="text" name="Luong_<?php echo $cnt1; ?>" id="Luong_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnhan_vien['Luong']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("Luong");?> <?php echo $tNGs->displayFieldError("nhan_vien", "Luong", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_nhan_vien_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnhan_vien['kt_pk_nhan_vien']); ?>" />
          <?php } while ($row_rsnhan_vien = mysql_fetch_assoc($rsnhan_vien)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_NV'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_NV')" />
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
