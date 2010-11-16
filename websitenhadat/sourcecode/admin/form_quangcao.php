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
$formValidation->addField("TieuDe", true, "text", "", "", "", "Vui lòng nhập tiêu đề!");
$formValidation->addField("Hinh_QuangCao", true, "", "", "", "", "Vui lòng chọn hình quảng cáo.");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/");
  $deleteObj->setDbFieldName("Hinh_QuangCao");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("Hinh_QuangCao");
  $uploadObj->setDbFieldName("Hinh_QuangCao");
  $uploadObj->setFolder("../images/");
  $uploadObj->setResize("false", 100, 100);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_quang_cao = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_quang_cao);
// Register triggers
$ins_quang_cao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_quang_cao->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_quang_cao->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_quang_cao->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_quang_cao->setTable("quang_cao");
$ins_quang_cao->addColumn("ID_QuangCao", "STRING_TYPE", "VALUE", "");
$ins_quang_cao->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$ins_quang_cao->addColumn("Hinh_QuangCao", "FILE_TYPE", "FILES", "Hinh_QuangCao");
$ins_quang_cao->setPrimaryKey("ID_QuangCao", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_quang_cao = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_quang_cao);
// Register triggers
$upd_quang_cao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_quang_cao->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_quang_cao->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_quang_cao->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_quang_cao->setTable("quang_cao");
$upd_quang_cao->addColumn("ID_QuangCao", "STRING_TYPE", "CURRVAL", "");
$upd_quang_cao->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$upd_quang_cao->addColumn("Hinh_QuangCao", "FILE_TYPE", "FILES", "Hinh_QuangCao");
$upd_quang_cao->setPrimaryKey("ID_QuangCao", "NUMERIC_TYPE", "GET", "ID_QuangCao");

// Make an instance of the transaction object
$del_quang_cao = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_quang_cao);
// Register triggers
$del_quang_cao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_quang_cao->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_quang_cao->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_quang_cao->setTable("quang_cao");
$del_quang_cao->setPrimaryKey("ID_QuangCao", "NUMERIC_TYPE", "GET", "ID_QuangCao");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsquang_cao = $tNGs->getRecordset("quang_cao");
$row_rsquang_cao = mysql_fetch_assoc($rsquang_cao);
$totalRows_rsquang_cao = mysql_num_rows($rsquang_cao);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rsquang_cao.Hinh_QuangCao}");
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
</head>

<body>
<div align="center">
  <div class="KT_tng">
  <br />
    <span class="chu">
      CHỈNH SỬA THÔNG TIN QUẢNG CÁO</span>
    <br />
    <br />
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsquang_cao > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh">Mã</td>
              <td><?php echo KT_escapeAttribute($row_rsquang_cao['ID_QuangCao']); ?></td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TieuDe_<?php echo $cnt1; ?>">Tiêu Đề</label></td>
            <td><input type="text" name="TieuDe_<?php echo $cnt1; ?>" id="TieuDe_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsquang_cao['TieuDe']); ?>" size="32" maxlength="100" />
                  <?php echo $tNGs->displayFieldHint("TieuDe");?> <?php echo $tNGs->displayFieldError("quang_cao", "TieuDe", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="Hinh_QuangCao_<?php echo $cnt1; ?>">Hình Quảng Cáo</label></td>
            <td><input type="file" name="Hinh_QuangCao_<?php echo $cnt1; ?>" id="Hinh_QuangCao_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("quang_cao", "Hinh_QuangCao", $cnt1); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php 
// Show If File Exists (region3)
if (tNG_fileExists("../images/", "{rsquang_cao.Hinh_QuangCao}")) {
?>
                    <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" />
                    <?php } 
// EndIf File Exists (region3)
?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_quang_cao_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsquang_cao['kt_pk_quang_cao']); ?>" />
          <?php } while ($row_rsquang_cao = mysql_fetch_assoc($rsquang_cao)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_QuangCao'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_QuangCao')" />
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
