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
$formValidation->addField("TenQuan", true, "text", "", "", "", "Vui lòng nhập tên quận!");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("quan");
  $tblFldObj->addFieldName("TenQuan");
  $tblFldObj->setErrorMsg("Quận này đã có ! ");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

// Make an insert transaction instance
$ins_quan = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_quan);
// Register triggers
$ins_quan->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_quan->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_quan->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_quan->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$ins_quan->setTable("quan");
$ins_quan->addColumn("ID_Quan", "NUMERIC_TYPE", "VALUE", "");
$ins_quan->addColumn("TenQuan", "STRING_TYPE", "POST", "TenQuan");
$ins_quan->setPrimaryKey("ID_Quan", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_quan = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_quan);
// Register triggers
$upd_quan->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_quan->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_quan->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_quan->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
// Add columns
$upd_quan->setTable("quan");
$upd_quan->addColumn("ID_Quan", "NUMERIC_TYPE", "CURRVAL", "");
$upd_quan->addColumn("TenQuan", "STRING_TYPE", "POST", "TenQuan");
$upd_quan->setPrimaryKey("ID_Quan", "NUMERIC_TYPE", "GET", "ID_Quan");

// Make an instance of the transaction object
$del_quan = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_quan);
// Register triggers
$del_quan->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_quan->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_quan->setTable("quan");
$del_quan->setPrimaryKey("ID_Quan", "NUMERIC_TYPE", "GET", "ID_Quan");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsquan = $tNGs->getRecordset("quan");
$row_rsquan = mysql_fetch_assoc($rsquan);
$totalRows_rsquan = mysql_num_rows($rsquan);
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
    <span class="chu">CHỈNH SỬA THÔNG TIN QUẬN</span>
    <br />
    <br />
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsquan > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh">Mã Quận</td>
              <td><?php echo KT_escapeAttribute($row_rsquan['ID_Quan']); ?></td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TenQuan_<?php echo $cnt1; ?>">Tên Quận</label></td>
            <td><input type="text" name="TenQuan_<?php echo $cnt1; ?>" id="TenQuan_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsquan['TenQuan']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("TenQuan");?> <?php echo $tNGs->displayFieldError("quan", "TenQuan", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_quan_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsquan['kt_pk_quan']); ?>" />
          <?php } while ($row_rsquan = mysql_fetch_assoc($rsquan)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_Quan'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_Quan')" />
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
