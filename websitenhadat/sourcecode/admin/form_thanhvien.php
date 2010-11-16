<?php require_once('../Connections/conn_qlnd.php'); ?><?php
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

//start Trigger_CheckPasswords trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckPasswords(&$tNG) {
  $myThrowError = new tNG_ThrowError($tNG);
  $myThrowError->setErrorMsg("Could not create account.");
  $myThrowError->setField("PassWord");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("UserName", true, "text", "", "", "", "Vui lòng nhập username.");
$formValidation->addField("PassWord", true, "text", "", "", "", "Vui lòng nhập email.");
$formValidation->addField("Email", true, "text", "email", "", "", "Vui lòng nhập email.");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckOldPassword trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckOldPassword(&$tNG) {
  return Trigger_UpdatePassword_CheckOldPassword($tNG);
}
//end Trigger_CheckOldPassword trigger

// Make an insert transaction instance
$ins_thanh_vien = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_thanh_vien);
// Register triggers
$ins_thanh_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_thanh_vien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_thanh_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_thanh_vien->registerConditionalTrigger("{POST.PassWord} != {POST.re_PassWord}", "BEFORE", "Trigger_CheckPasswords", 50);
// Add columns
$ins_thanh_vien->setTable("thanh_vien");
$ins_thanh_vien->addColumn("TenThanhVien", "STRING_TYPE", "POST", "TenThanhVien");
$ins_thanh_vien->addColumn("UserName", "STRING_TYPE", "POST", "UserName");
$ins_thanh_vien->addColumn("PassWord", "STRING_TYPE", "POST", "PassWord");
$ins_thanh_vien->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_thanh_vien->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$ins_thanh_vien->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$ins_thanh_vien->addColumn("Email", "STRING_TYPE", "POST", "Email");
$ins_thanh_vien->addColumn("Avartar", "FILE_TYPE", "FILES", "Avartar");
$ins_thanh_vien->addColumn("NgayDangKy", "DATE_TYPE", "POST", "NgayDangKy", "{NOW_DT}");
$ins_thanh_vien->addColumn("ThongTinThem", "STRING_TYPE", "POST", "ThongTinThem");
$ins_thanh_vien->addColumn("AcessLevel", "NUMERIC_TYPE", "VALUE", "2");
$ins_thanh_vien->setPrimaryKey("ID_ThanhVien", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_thanh_vien = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_thanh_vien);
// Register triggers
$upd_thanh_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_thanh_vien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_thanh_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_thanh_vien->registerConditionalTrigger("{POST.PassWord} != {POST.re_PassWord}", "BEFORE", "Trigger_CheckPasswords", 50);
$upd_thanh_vien->registerTrigger("BEFORE", "Trigger_CheckOldPassword", 60);
// Add columns
$upd_thanh_vien->setTable("thanh_vien");
$upd_thanh_vien->addColumn("TenThanhVien", "STRING_TYPE", "POST", "TenThanhVien");
$upd_thanh_vien->addColumn("UserName", "STRING_TYPE", "POST", "UserName");
$upd_thanh_vien->addColumn("PassWord", "STRING_TYPE", "POST", "PassWord");
$upd_thanh_vien->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$upd_thanh_vien->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$upd_thanh_vien->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$upd_thanh_vien->addColumn("Email", "STRING_TYPE", "POST", "Email");
$upd_thanh_vien->addColumn("Avartar", "FILE_TYPE", "FILES", "Avartar");
$upd_thanh_vien->addColumn("NgayDangKy", "DATE_TYPE", "POST", "NgayDangKy");
$upd_thanh_vien->addColumn("ThongTinThem", "STRING_TYPE", "POST", "ThongTinThem");
$upd_thanh_vien->addColumn("AcessLevel", "NUMERIC_TYPE", "CURRVAL", "");
$upd_thanh_vien->setPrimaryKey("ID_ThanhVien", "NUMERIC_TYPE", "GET", "ID_ThanhVien");

// Make an instance of the transaction object
$del_thanh_vien = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_thanh_vien);
// Register triggers
$del_thanh_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_thanh_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_thanh_vien->setTable("thanh_vien");
$del_thanh_vien->setPrimaryKey("ID_ThanhVien", "NUMERIC_TYPE", "GET", "ID_ThanhVien");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsthanh_vien = $tNGs->getRecordset("thanh_vien");
$row_rsthanh_vien = mysql_fetch_assoc($rsthanh_vien);
$totalRows_rsthanh_vien = mysql_num_rows($rsthanh_vien);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rsthanh_vien.Avartar}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>

<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <div align="center"><span class="chu">
    CHINH SỬA THÔNG TIN THÀNH VIÊN</span>
  </div>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsthanh_vien > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table width="515" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td><label for="TenThanhVien_<?php echo $cnt1; ?>">Tên thanh viên</label></td>
          <td><input type="text" name="TenThanhVien_<?php echo $cnt1; ?>" id="TenThanhVien_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['TenThanhVien']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("TenThanhVien");?> <?php echo $tNGs->displayFieldError("thanh_vien", "TenThanhVien", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="UserName_<?php echo $cnt1; ?>">UserName</label></td>
          <td><input type="text" name="UserName_<?php echo $cnt1; ?>" id="UserName_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['UserName']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("UserName");?> <?php echo $tNGs->displayFieldError("thanh_vien", "UserName", $cnt1); ?> </td>
        </tr>
        <?php 
// Show IF Conditional show_old_PassWord_on_update_only 
if (@$_GET['ID_ThanhVien'] != "") {
?>
        
        <?php } 
// endif Conditional show_old_PassWord_on_update_only
?>
        <tr>
          <td><label for="PassWord_<?php echo $cnt1; ?>">PassWord</label></td>
          <td><input type="password" name="PassWord_<?php echo $cnt1; ?>" id="PassWord_<?php echo $cnt1; ?>" value="" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("PassWord");?> <?php echo $tNGs->displayFieldError("thanh_vien", "PassWord", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="re_PassWord_<?php echo $cnt1; ?>">Nhập lại PassWord</label></td>
          <td><input type="password" name="re_PassWord_<?php echo $cnt1; ?>" id="re_PassWord_<?php echo $cnt1; ?>" value="" size="32" maxlength="45" />
          </td>
        </tr>
        <tr>
          <td><label for="DiaChi_<?php echo $cnt1; ?>">Địa chỉ</label></td>
          <td><input type="text" name="DiaChi_<?php echo $cnt1; ?>" id="DiaChi_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['DiaChi']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("thanh_vien", "DiaChi", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="DienThoai_<?php echo $cnt1; ?>">Điện thoại</label></td>
          <td><input type="text" name="DienThoai_<?php echo $cnt1; ?>" id="DienThoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['DienThoai']); ?>" size="20" maxlength="20" />
              <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("thanh_vien", "DienThoai", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="GioiTinh_<?php echo $cnt1; ?>_1">Giới tính</label></td>
          <td><div>
            <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanh_vien['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_1" value="1" />
            <label for="GioiTinh_<?php echo $cnt1; ?>_1">Nam</label>
          </div>
              <div>
                <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanh_vien['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_2" value="0" />
                <label for="GioiTinh_<?php echo $cnt1; ?>_2">Nữ </label>
              </div>
            <?php echo $tNGs->displayFieldError("thanh_vien", "GioiTinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="Email_<?php echo $cnt1; ?>">Email</label></td>
          <td><input type="text" name="Email_<?php echo $cnt1; ?>" id="Email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['Email']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("thanh_vien", "Email", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="Avartar_<?php echo $cnt1; ?>">Avartar</label></td>
          <td><input type="file" name="Avartar_<?php echo $cnt1; ?>" id="Avartar_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("thanh_vien", "Avartar", $cnt1); ?> <?php 
// Show If File Exists (region4)
if (tNG_fileExists("../images/", "{rsthanh_vien.Avartar}")) {
?>
                <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" />
                <?php } 
// EndIf File Exists (region4)
?></td>
        </tr>
        <tr>
          <td><label for="NgayDangKy_<?php echo $cnt1; ?>">Ngày đăng kí</label></td>
          <td><input type="text" name="NgayDangKy_<?php echo $cnt1; ?>" id="NgayDangKy_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsthanh_vien['NgayDangKy']); ?>" size="10" maxlength="22" />
              <?php echo $tNGs->displayFieldHint("NgayDangKy");?> <?php echo $tNGs->displayFieldError("thanh_vien", "NgayDangKy", $cnt1); ?> </td>
        </tr>
        <tr>
          <td><label for="ThongTinThem_<?php echo $cnt1; ?>">Thông tin thêm</label></td>
          <td><textarea name="ThongTinThem_<?php echo $cnt1; ?>" id="ThongTinThem_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsthanh_vien['ThongTinThem']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("ThongTinThem");?> <?php echo $tNGs->displayFieldError("thanh_vien", "ThongTinThem", $cnt1); ?> </td>
        </tr>
        <tr>
          <td>AcessLevel:</td>
          <td><?php echo KT_escapeAttribute($row_rsthanh_vien['AcessLevel']); ?></td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_thanh_vien_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['kt_pk_thanh_vien']); ?>" />
      <?php } while ($row_rsthanh_vien = mysql_fetch_assoc($rsthanh_vien)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_ThanhVien'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_ThanhVien')" />
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
<div align="center"></div>
</body>
</html>
