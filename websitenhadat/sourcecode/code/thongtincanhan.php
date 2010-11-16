<?php require_once('Connections/conn_qlnd.php'); ?><?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

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

// Make an update transaction instance
$upd_thanh_vien = new tNG_update($conn_conn_qlnd);
$tNGs->addTransaction($upd_thanh_vien);
// Register triggers
$upd_thanh_vien->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_thanh_vien->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_thanh_vien->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
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
$upd_thanh_vien->addColumn("ThongTinThem", "STRING_TYPE", "POST", "ThongTinThem");
$upd_thanh_vien->setPrimaryKey("ID_ThanhVien", "NUMERIC_TYPE", "GET", "ID_ThanhVien");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsthanh_vien = $tNGs->getRecordset("thanh_vien");
$row_rsthanh_vien = mysql_fetch_assoc($rsthanh_vien);
$totalRows_rsthanh_vien = mysql_num_rows($rsthanh_vien);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="includes/common/js/base.js" type="text/javascript"></script><script src="includes/common/js/utility.js" type="text/javascript"></script><script src="includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
  <table width="500" align="center" cellpadding="2" cellspacing="0">
  	<tr>
    	<td colspan="2" align="center" class="chu1Copy">
        CẬP NHẬT THÔNG TIN CÁ NHÂN        </td>
    </tr>
    
    <tr>
      <td width="180" class="chu3"><label for="TenThanhVien">Tên thanh viên</label></td>
<td width="334"><input type="text" name="TenThanhVien" id="TenThanhVien" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['TenThanhVien']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("TenThanhVien");?> <?php echo $tNGs->displayFieldError("thanh_vien", "TenThanhVien"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="UserName">UserName</label></td>
      <td><input type="text" name="UserName" id="UserName" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['UserName']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("UserName");?> <?php echo $tNGs->displayFieldError("thanh_vien", "UserName"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="old_PassWord">PassWord cũ</label></td>
      <td><input type="password" name="old_PassWord" id="old_PassWord" value="" size="32" />
          <?php echo $tNGs->displayFieldError("thanh_vien", "old_PassWord"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="PassWord">PassWord</label></td>
      <td><input type="password" name="PassWord" id="PassWord" value="" size="32" />
          <?php echo $tNGs->displayFieldHint("PassWord");?> <?php echo $tNGs->displayFieldError("thanh_vien", "PassWord"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="re_PassWord">Nhập lại PassWord</label></td>
      <td><input type="password" name="re_PassWord" id="re_PassWord" value="" size="32" />      </td>
    </tr>
    <tr>
      <td class="chu3"><label for="DiaChi">Địa chỉ</label></td>
      <td><input type="text" name="DiaChi" id="DiaChi" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['DiaChi']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("thanh_vien", "DiaChi"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="DienThoai">Điện thoại</label></td>
      <td><input type="text" name="DienThoai" id="DienThoai" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['DienThoai']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("thanh_vien", "DienThoai"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="GioiTinh_1">Giới tính</label></td>
      <td><div>
        <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanh_vien['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_1" value="1" />
        <label for="GioiTinh_1">Nam</label>
      </div>
          <div>
            <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanh_vien['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_2" value="0" />
            <label for="GioiTinh_2">Nữ </label>
          </div>
        <?php echo $tNGs->displayFieldError("thanh_vien", "GioiTinh"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="Email">Email:</label></td>
      <td><input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['Email']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("thanh_vien", "Email"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="Avartar">Avartar</label></td>
      <td><input type="file" name="Avartar" id="Avartar" size="32" />
          <?php echo $tNGs->displayFieldError("thanh_vien", "Avartar"); ?> </td>
    </tr>
    <tr>
      <td class="chu3"><label for="ThongTinThem">Thông tin thêm</label></td>
      <td><textarea name="ThongTinThem" id="ThongTinThem" cols="40" rows="5"><?php echo KT_escapeAttribute($row_rsthanh_vien['ThongTinThem']); ?></textarea>
      <?php echo $tNGs->displayFieldHint("ThongTinThem");?> <?php echo $tNGs->displayFieldError("thanh_vien", "ThongTinThem"); ?> </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <br />
      <input name="KT_Update1" type="submit" class="chu4" id="KT_Update1" value="Cập Nhật Thông Tin" />      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>

</body>
</html>
