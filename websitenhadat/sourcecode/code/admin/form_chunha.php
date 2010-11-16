<?php require_once('../Connections/conn_qlnd.php'); ?>
<?php
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
$formValidation->addField("TenChuNha", true, "text", "", "", "", "Vui lòng nhập tên chủ nhà!");
$formValidation->addField("DienThoai", true, "text", "", "", "", "Vui lòng nhập điện thoại!");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_chu_nha = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_chu_nha);
// Register triggers
$ins_chu_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_chu_nha->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_chu_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_chu_nha->setTable("chu_nha");
$ins_chu_nha->addColumn("ID_ChuNha", "NUMERIC_TYPE", "POST", "ID_ChuNha");
$ins_chu_nha->addColumn("TenChuNha", "STRING_TYPE", "POST", "TenChuNha");
$ins_chu_nha->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_chu_nha->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$ins_chu_nha->setPrimaryKey("ID_ChuNha", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_chu_nha = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_chu_nha);
// Register triggers
$upd_chu_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_chu_nha->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_chu_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_chu_nha->setTable("chu_nha");
$upd_chu_nha->addColumn("ID_ChuNha", "NUMERIC_TYPE", "POST", "ID_ChuNha");
$upd_chu_nha->addColumn("TenChuNha", "STRING_TYPE", "POST", "TenChuNha");
$upd_chu_nha->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$upd_chu_nha->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$upd_chu_nha->setPrimaryKey("ID_ChuNha", "NUMERIC_TYPE", "GET", "ID_ChuNha");

// Make an instance of the transaction object
$del_chu_nha = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_chu_nha);
// Register triggers
$del_chu_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_chu_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_chu_nha->setTable("chu_nha");
$del_chu_nha->setPrimaryKey("ID_ChuNha", "NUMERIC_TYPE", "GET", "ID_ChuNha");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rschu_nha = $tNGs->getRecordset("chu_nha");
$row_rschu_nha = mysql_fetch_assoc($rschu_nha);
$totalRows_rschu_nha = mysql_num_rows($rschu_nha);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<script type="text/javascript" src="../Editor/scripts/innovaeditor.js"></script>

</head>

<body>
<div align="center">
  <div class="KT_tng">
  <br />
    <span class="chu">
      CHỈNH SỬA THÔNG TIN CHỦ NHÀ</span>
      <br />
      <br />
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rschu_nha > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh"><label for="ID_ChuNha_<?php echo $cnt1; ?>">Mã</label></td>
            <td><input type="text" name="ID_ChuNha_<?php echo $cnt1; ?>" id="ID_ChuNha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rschu_nha['ID_ChuNha']); ?>" size="7" />
                  <?php echo $tNGs->displayFieldHint("ID_ChuNha");?> <?php echo $tNGs->displayFieldError("chu_nha", "ID_ChuNha", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TenChuNha_<?php echo $cnt1; ?>">Tên Chủ Nhà</label></td>
            <td><input type="text" name="TenChuNha_<?php echo $cnt1; ?>" id="TenChuNha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rschu_nha['TenChuNha']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("TenChuNha");?> <?php echo $tNGs->displayFieldError("chu_nha", "TenChuNha", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="DiaChi_<?php echo $cnt1; ?>">Địa Chỉ</label></td>
              <td><textarea name="DiaChi_<?php echo $cnt1; ?>" id="DiaChi_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rschu_nha['DiaChi']); ?></textarea>
              
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

    oEdit1.REPLACE("DiaChi_<?php echo $cnt1; ?>");
  </script>
              
                  <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("chu_nha", "DiaChi", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="DienThoai_<?php echo $cnt1; ?>">Điện Thoại</label></td>
            <td><input type="text" name="DienThoai_<?php echo $cnt1; ?>" id="DienThoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rschu_nha['DienThoai']); ?>" size="20" maxlength="20" />
                  <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("chu_nha", "DienThoai", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_chu_nha_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rschu_nha['kt_pk_chu_nha']); ?>" />
          <?php } while ($row_rschu_nha = mysql_fetch_assoc($rschu_nha)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_ChuNha'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_ChuNha')" />
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
