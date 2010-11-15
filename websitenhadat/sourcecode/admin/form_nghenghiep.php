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
$formValidation->addField("Ten_NgheNghiep", true, "text", "", "", "", "Vui lòng nhập tên nghề nghiệp!");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("nghe_nghiep");
  $tblFldObj->addFieldName("Ten_NgheNghiep");
  $tblFldObj->setErrorMsg("Nghề này đã có !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_nghe_nghiep = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_nghe_nghiep);
// Register triggers
$ins_nghe_nghiep->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_nghe_nghiep->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_nghe_nghiep->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_nghe_nghiep->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_nghe_nghiep->setTable("nghe_nghiep");
$ins_nghe_nghiep->addColumn("ID_NgheNghiep", "NUMERIC_TYPE", "VALUE", "");
$ins_nghe_nghiep->addColumn("Ten_NgheNghiep", "STRING_TYPE", "POST", "Ten_NgheNghiep");
$ins_nghe_nghiep->setPrimaryKey("ID_NgheNghiep", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_nghe_nghiep = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_nghe_nghiep);
// Register triggers
$upd_nghe_nghiep->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_nghe_nghiep->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_nghe_nghiep->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_nghe_nghiep->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_nghe_nghiep->setTable("nghe_nghiep");
$upd_nghe_nghiep->addColumn("ID_NgheNghiep", "NUMERIC_TYPE", "CURRVAL", "");
$upd_nghe_nghiep->addColumn("Ten_NgheNghiep", "STRING_TYPE", "POST", "Ten_NgheNghiep");
$upd_nghe_nghiep->setPrimaryKey("ID_NgheNghiep", "NUMERIC_TYPE", "GET", "ID_NgheNghiep");

// Make an instance of the transaction object
$del_nghe_nghiep = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_nghe_nghiep);
// Register triggers
$del_nghe_nghiep->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_nghe_nghiep->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_nghe_nghiep->setTable("nghe_nghiep");
$del_nghe_nghiep->setPrimaryKey("ID_NgheNghiep", "NUMERIC_TYPE", "GET", "ID_NgheNghiep");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnghe_nghiep = $tNGs->getRecordset("nghe_nghiep");
$row_rsnghe_nghiep = mysql_fetch_assoc($rsnghe_nghiep);
$totalRows_rsnghe_nghiep = mysql_num_rows($rsnghe_nghiep);
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
      CHỈNH SỬA THÔNG TIN NGHỀ NGHIỆP CỦA KHÁCH HÀNG</span>
    <br />
    <br />
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnghe_nghiep > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh">Mã Nghề Nghiệp</td>
              <td><?php echo KT_escapeAttribute($row_rsnghe_nghiep['ID_NgheNghiep']); ?></td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="Ten_NgheNghiep_<?php echo $cnt1; ?>">Tên Nghề Nghiệp</label></td>
            <td><input type="text" name="Ten_NgheNghiep_<?php echo $cnt1; ?>" id="Ten_NgheNghiep_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnghe_nghiep['Ten_NgheNghiep']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("Ten_NgheNghiep");?> <?php echo $tNGs->displayFieldError("nghe_nghiep", "Ten_NgheNghiep", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_nghe_nghiep_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnghe_nghiep['kt_pk_nghe_nghiep']); ?>" />
          <?php } while ($row_rsnghe_nghiep = mysql_fetch_assoc($rsnghe_nghiep)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_NgheNghiep'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_NgheNghiep')" />
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
