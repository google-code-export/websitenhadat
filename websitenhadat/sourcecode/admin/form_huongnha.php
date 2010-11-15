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
$formValidation->addField("TenHuongNha", true, "text", "", "", "", "Vui lòng nhập tên hướng nhà!");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_huong_nha = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_huong_nha);
// Register triggers
$ins_huong_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_huong_nha->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_huong_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_huong_nha->setTable("huong_nha");
$ins_huong_nha->addColumn("ID_HuongNha", "NUMERIC_TYPE", "VALUE", "");
$ins_huong_nha->addColumn("TenHuongNha", "STRING_TYPE", "POST", "TenHuongNha");
$ins_huong_nha->setPrimaryKey("ID_HuongNha", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_huong_nha = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_huong_nha);
// Register triggers
$upd_huong_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_huong_nha->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_huong_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_huong_nha->setTable("huong_nha");
$upd_huong_nha->addColumn("ID_HuongNha", "NUMERIC_TYPE", "CURRVAL", "");
$upd_huong_nha->addColumn("TenHuongNha", "STRING_TYPE", "POST", "TenHuongNha");
$upd_huong_nha->setPrimaryKey("ID_HuongNha", "NUMERIC_TYPE", "GET", "ID_HuongNha");

// Make an instance of the transaction object
$del_huong_nha = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_huong_nha);
// Register triggers
$del_huong_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_huong_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_huong_nha->setTable("huong_nha");
$del_huong_nha->setPrimaryKey("ID_HuongNha", "NUMERIC_TYPE", "GET", "ID_HuongNha");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rshuong_nha = $tNGs->getRecordset("huong_nha");
$row_rshuong_nha = mysql_fetch_assoc($rshuong_nha);
$totalRows_rshuong_nha = mysql_num_rows($rshuong_nha);
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
      CHỈNH SỬA THÔNG TIN HƯỚNG NHÀ</span>
    <br />
    <br />
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rshuong_nha > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="chu_xanh">Mã Hướng Nhà</td>
              <td><?php echo KT_escapeAttribute($row_rshuong_nha['ID_HuongNha']); ?></td>
            </tr>
            <tr>
              <td class="chu_xanh"><label for="TenHuongNha_<?php echo $cnt1; ?>">Tên Hướng Nhà:</label></td>
            <td><input type="text" name="TenHuongNha_<?php echo $cnt1; ?>" id="TenHuongNha_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshuong_nha['TenHuongNha']); ?>" size="32" maxlength="45" />
                  <?php echo $tNGs->displayFieldHint("TenHuongNha");?> <?php echo $tNGs->displayFieldError("huong_nha", "TenHuongNha", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_huong_nha_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rshuong_nha['kt_pk_huong_nha']); ?>" />
          <?php } while ($row_rshuong_nha = mysql_fetch_assoc($rshuong_nha)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_HuongNha'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_HuongNha')" />
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
