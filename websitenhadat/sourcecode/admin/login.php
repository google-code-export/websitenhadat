<?php require_once('Connections/conn_qlnd.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_conn_qlnd = new KT_connection($conn_qlnd, $database_conn_qlnd);

// Start trigger
$formValidation1 = new tNG_FormValidation();
$formValidation1->addField("kt_login_user", true, "text", "", "", "", "Vui lòng nhập Username.");
$formValidation1->addField("kt_login_password", true, "text", "", "", "", "Vui lòng nhập Password.");
$tNGs->prepareValidation($formValidation1);
// End trigger

// Make a login transaction instance
$loginTransaction = new tNG_login($conn_conn_qlnd);
$tNGs->addTransaction($loginTransaction);
// Register triggers
$loginTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login1");
$loginTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Make a login transaction instance
$loginTransaction1 = new tNG_login($conn_conn_qlnd);
$tNGs->addTransaction($loginTransaction1);
// Register triggers
$loginTransaction1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login2");
$loginTransaction1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation1);
$loginTransaction1->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction1->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction1->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction1->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Make a login transaction instance
$loginTransaction1 = new tNG_login($conn_conn_qlnd);
$tNGs->addTransaction($loginTransaction1);
// Register triggers
$loginTransaction1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login2");
$loginTransaction1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation1);
$loginTransaction1->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction1->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction1->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction1->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
<link href="css/Trangtri1.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
</head>

<body style=" margin:0">
<div align="center">
<form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
    <table width="200" cellpadding="0" cellspacing="0" align="center" style="text-align:center">
      <tr>
        <td><label for="kt_login_user"><span class="chu3">Username</span></label>
          <br />
          <input class="username" type="text" name="kt_login_user" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="20" />
        <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?> </td>
      </tr>
      <tr>
        <td ><label for="kt_login_password"><span class="chu3">Password</span></label>
          <br />
          <input class="password" type="password" name="kt_login_password" id="kt_login_password" value="" size="20" />
        <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?> </td>
      </tr>
      <tr>
        <td>
          <input  <?php if (!(strcmp(KT_escapeAttribute($row_rscustom['kt_login_rememberme']),"1"))) {echo "checked";} ?> type="checkbox" name="kt_login_rememberme" id="kt_login_rememberme" value="1" />
          <label for="kt_login_rememberme"><span class="chu3">Nhớ tôi.</span></label>
        <?php echo $tNGs->displayFieldError("custom", "kt_login_rememberme"); ?> </td>
      </tr>
      <tr>
        <td align="center"><input type="submit" name="kt_login2" id="kt_login2" value="Đăng Nhập" style="color:#FF0000"/></td>
      </tr>
      <tr>
        <td align="center"><span class="lienket1"><a href="forgot_password.php">Quên mật khẩu?</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="lienket1"><a href="index_tintuc.php?mod=dangki">Đăng Kí</a></span>        </td>
      </tr>
    </table>
  </form>
  </div>
</body>
</html>
