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
$formValidation->addField("TieuDe", true, "text", "", "", "", "Vui lòng nhập tiêu đề.");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/");
  $deleteObj->setDbFieldName("HinhMinhHoa");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("HinhMinhHoa");
  $uploadObj->setDbFieldName("HinhMinhHoa");
  $uploadObj->setFolder("../images/");
  $uploadObj->setResize("false", 100, 80);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_tin_tuc = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_tin_tuc);
// Register triggers
$ins_tin_tuc->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tin_tuc->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tin_tuc->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_tin_tuc->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_tin_tuc->setTable("tin_tuc");
$ins_tin_tuc->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$ins_tin_tuc->addColumn("TrichDanTin", "STRING_TYPE", "POST", "TrichDanTin");
$ins_tin_tuc->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$ins_tin_tuc->addColumn("TacGia", "STRING_TYPE", "POST", "TacGia");
$ins_tin_tuc->addColumn("TinHot", "CHECKBOX_1_0_TYPE", "POST", "TinHot", "0");
$ins_tin_tuc->addColumn("TinTieuDiem", "CHECKBOX_1_0_TYPE", "POST", "TinTieuDiem", "0");
$ins_tin_tuc->addColumn("NgayDangTin", "DATE_TYPE", "POST", "NgayDangTin", "{NOW_DT}");
$ins_tin_tuc->addColumn("HinhMinhHoa", "FILE_TYPE", "FILES", "HinhMinhHoa");
$ins_tin_tuc->setPrimaryKey("ID_TinTuc", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tin_tuc = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_tin_tuc);
// Register triggers
$upd_tin_tuc->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tin_tuc->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tin_tuc->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_tin_tuc->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_tin_tuc->setTable("tin_tuc");
$upd_tin_tuc->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$upd_tin_tuc->addColumn("TrichDanTin", "STRING_TYPE", "POST", "TrichDanTin");
$upd_tin_tuc->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$upd_tin_tuc->addColumn("TacGia", "STRING_TYPE", "POST", "TacGia");
$upd_tin_tuc->addColumn("TinHot", "CHECKBOX_1_0_TYPE", "POST", "TinHot");
$upd_tin_tuc->addColumn("TinTieuDiem", "CHECKBOX_1_0_TYPE", "POST", "TinTieuDiem");
$upd_tin_tuc->addColumn("NgayDangTin", "DATE_TYPE", "POST", "NgayDangTin");
$upd_tin_tuc->addColumn("HinhMinhHoa", "FILE_TYPE", "FILES", "HinhMinhHoa");
$upd_tin_tuc->setPrimaryKey("ID_TinTuc", "NUMERIC_TYPE", "GET", "ID_TinTuc");

// Make an instance of the transaction object
$del_tin_tuc = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_tin_tuc);
// Register triggers
$del_tin_tuc->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tin_tuc->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_tin_tuc->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_tin_tuc->setTable("tin_tuc");
$del_tin_tuc->setPrimaryKey("ID_TinTuc", "NUMERIC_TYPE", "GET", "ID_TinTuc");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstin_tuc = $tNGs->getRecordset("tin_tuc");
$row_rstin_tuc = mysql_fetch_assoc($rstin_tuc);
$totalRows_rstin_tuc = mysql_num_rows($rstin_tuc);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rstin_tuc.HinhMinhHoa}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
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
    <span class="chu">
      CHỈNH SỬA TIN TỨC NHÀ ĐẤT</span>
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rstin_tuc > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh"><label for="TieuDe_<?php echo $cnt1; ?>">Tiêu Đề</label></td>
          <td><input type="text" name="TieuDe_<?php echo $cnt1; ?>" id="TieuDe_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstin_tuc['TieuDe']); ?>" size="45" maxlength="100" />
                  <?php echo $tNGs->displayFieldHint("TieuDe");?> <?php echo $tNGs->displayFieldError("tin_tuc", "TieuDe", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TrichDanTin_<?php echo $cnt1; ?>">Trích Dẫn Tin</label></td>
          <td><input type="text" name="TrichDanTin_<?php echo $cnt1; ?>" id="TrichDanTin_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstin_tuc['TrichDanTin']); ?>" size="100" />
                  <?php echo $tNGs->displayFieldHint("TrichDanTin");?> <?php echo $tNGs->displayFieldError("tin_tuc", "TrichDanTin", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="NoiDung_<?php echo $cnt1; ?>">Nội Dung</label></td>
              <td><textarea name="NoiDung_<?php echo $cnt1; ?>" id="NoiDung_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstin_tuc['NoiDung']); ?></textarea>
              
              
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

    oEdit1.REPLACE("NoiDung_<?php echo $cnt1; ?>");
  </script>
          
              
              
                  <?php echo $tNGs->displayFieldHint("NoiDung");?> <?php echo $tNGs->displayFieldError("tin_tuc", "NoiDung", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TacGia_<?php echo $cnt1; ?>">Tác Giả</label></td>
          <td><input type="text" name="TacGia_<?php echo $cnt1; ?>" id="TacGia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstin_tuc['TacGia']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("TacGia");?> <?php echo $tNGs->displayFieldError("tin_tuc", "TacGia", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TinHot_<?php echo $cnt1; ?>">Hot</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstin_tuc['TinHot']),"1"))) {echo "checked";} ?> type="checkbox" name="TinHot_<?php echo $cnt1; ?>" id="TinHot_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tin_tuc", "TinHot", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TinTieuDiem_<?php echo $cnt1; ?>">Tiêu Điểm</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstin_tuc['TinTieuDiem']),"1"))) {echo "checked";} ?> type="checkbox" name="TinTieuDiem_<?php echo $cnt1; ?>" id="TinTieuDiem_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tin_tuc", "TinTieuDiem", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="NgayDangTin_<?php echo $cnt1; ?>">Ngày đăng tin</label></td>
          <td><input name="NgayDangTin_<?php echo $cnt1; ?>" id="NgayDangTin_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstin_tuc['NgayDangTin']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                  <?php echo $tNGs->displayFieldHint("NgayDangTin");?> <?php echo $tNGs->displayFieldError("tin_tuc", "NgayDangTin", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="HinhMinhHoa_<?php echo $cnt1; ?>">Hình minh họa</label></td>
          <td><input type="file" name="HinhMinhHoa_<?php echo $cnt1; ?>" id="HinhMinhHoa_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tin_tuc", "HinhMinhHoa", $cnt1); ?> <?php 
// Show If File Exists (region3)
if (tNG_fileExists("../images/", "{rstin_tuc.HinhMinhHoa}")) {
?>
                    <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" />
                    <?php } 
// EndIf File Exists (region3)
?></td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_tin_tuc_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstin_tuc['kt_pk_tin_tuc']); ?>" />
          <?php } while ($row_rstin_tuc = mysql_fetch_assoc($rstin_tuc)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_TinTuc'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_TinTuc')" />
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
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
