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
  $myThrowError->setErrorMsg("Passwords do not match.");
  $myThrowError->setField("PassWord");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("UserName", true, "text", "", "", "", "Vui lòng nhập Username.");
$formValidation->addField("PassWord", true, "text", "", "", "", "Bạn chưa nhập Pass");
$formValidation->addField("Email", true, "text", "email", "", "", "Nhập Email.");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckUnique trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("thanh_vien");
  $tblFldObj->addFieldName("Email");
  $tblFldObj->setErrorMsg("Email này đã có người dùng !");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique trigger

//start CheckCaptcha trigger
//remove this line if you want to edit the code by hand
function CheckCaptcha(&$tNG) {
	$captcha = new tNG_Captcha("captcha_id_id", $tNG);
	$captcha->setFormField("POST", "captcha_id");
	$captcha->setErrorMsg("Vui lòng nhập lại mã !");
	return $captcha->Execute();
}
//end CheckCaptcha trigger

//start Trigger_CheckUnique2 trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique2(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("thanh_vien");
  $tblFldObj->addFieldName("ID_ThanhVien");
  $tblFldObj->addFieldName("Email");
  $tblFldObj->setErrorMsg("Email này đã có người dùng!");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique2 trigger

//start Trigger_CheckUnique1 trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckUnique1(&$tNG) {
  $tblFldObj = new tNG_CheckUnique($tNG);
  $tblFldObj->setTable("thanh_vien");
  $tblFldObj->addFieldName("UserName");
  $tblFldObj->setErrorMsg("Username này đã có người dùng!");
  return $tblFldObj->Execute();
}
//end Trigger_CheckUnique1 trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("Avartar");
  $uploadObj->setDbFieldName("Avartar");
  $uploadObj->setFolder("images/");
  $uploadObj->setResize("false", 100, 80);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Start trigger
$formValidation1 = new tNG_FormValidation();
$formValidation1->addField("UserName", true, "text", "", "", "", "Vui lòng nhập Username.");
$formValidation1->addField("PassWord", true, "text", "", "", "", "Bạn chưa nhập Pass");
$formValidation1->addField("Email", true, "text", "email", "", "", "Nhập Email.");
$tNGs->prepareValidation($formValidation1);
// End trigger

//start Trigger_CheckPasswords1 trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckPasswords1(&$tNG) {
  $myThrowError = new tNG_ThrowError($tNG);
  $myThrowError->setErrorMsg("Passwords do not match.");
  $myThrowError->setField("PassWord");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords1 trigger

// Make an insert transaction instance
$userRegistration = new tNG_insert($conn_conn_qlnd);
$tNGs->addTransaction($userRegistration);
// Register triggers
$userRegistration->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$userRegistration->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$userRegistration->registerTrigger("END", "Trigger_Default_Redirect", 99, "regestry_success.php");
$userRegistration->registerConditionalTrigger("{POST.PassWord} != {POST.re_PassWord}", "BEFORE", "Trigger_CheckPasswords", 50);
$userRegistration->registerTrigger("BEFORE", "Trigger_CheckUnique", 30);
$userRegistration->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$userRegistration->registerTrigger("BEFORE", "CheckCaptcha", 10);
$userRegistration->registerTrigger("BEFORE", "Trigger_CheckUnique1", 30);
$userRegistration->registerTrigger("BEFORE", "Trigger_CheckUnique2", 30);
// Add columns
$userRegistration->setTable("thanh_vien");
$userRegistration->addColumn("TenThanhVien", "STRING_TYPE", "POST", "TenThanhVien");
$userRegistration->addColumn("UserName", "STRING_TYPE", "POST", "UserName");
$userRegistration->addColumn("PassWord", "STRING_TYPE", "POST", "PassWord");
$userRegistration->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$userRegistration->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$userRegistration->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$userRegistration->addColumn("Email", "STRING_TYPE", "POST", "Email");
$userRegistration->addColumn("Avartar", "FILE_TYPE", "FILES", "Avartar");
$userRegistration->addColumn("NgayDangKy", "DATE_TYPE", "POST", "NgayDangKy", "{NOW_DT}");
$userRegistration->addColumn("ThongTinThem", "STRING_TYPE", "POST", "ThongTinThem");
$userRegistration->setPrimaryKey("ID_ThanhVien", "NUMERIC_TYPE");

// Make an insert transaction instance
$userRegistration1 = new tNG_insert($conn_conn_qlnd);
$tNGs->addTransaction($userRegistration1);
// Register triggers
$userRegistration1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert2");
$userRegistration1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation1);
$userRegistration1->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
$userRegistration1->registerConditionalTrigger("{POST.PassWord} != {POST.re_PassWord}", "BEFORE", "Trigger_CheckPasswords1", 50);
$userRegistration1->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$userRegistration1->registerTrigger("BEFORE", "CheckCaptcha", 10);
$userRegistration1->registerTrigger("BEFORE", "Trigger_CheckUnique1", 30);
$userRegistration1->registerTrigger("BEFORE", "Trigger_CheckUnique2", 30);
// Add columns
$userRegistration1->setTable("thanh_vien");
$userRegistration1->addColumn("TenThanhVien", "STRING_TYPE", "POST", "TenThanhVien");
$userRegistration1->addColumn("UserName", "STRING_TYPE", "POST", "UserName");
$userRegistration1->addColumn("PassWord", "STRING_TYPE", "POST", "PassWord");
$userRegistration1->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$userRegistration1->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$userRegistration1->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$userRegistration1->addColumn("Email", "STRING_TYPE", "POST", "Email");
$userRegistration1->addColumn("Avartar", "FILE_TYPE", "FILES", "Avartar");
$userRegistration1->addColumn("NgayDangKy", "DATE_TYPE", "POST", "NgayDangKy", "{NOW_DT}");
$userRegistration1->addColumn("ThongTinThem", "STRING_TYPE", "POST", "ThongTinThem");
$userRegistration1->addColumn("AcessLevel", "NUMERIC_TYPE", "POST", "AcessLevel", "2");
$userRegistration1->setPrimaryKey("ID_ThanhVien", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsthanh_vien = $tNGs->getRecordset("thanh_vien");
$row_rsthanh_vien = mysql_fetch_assoc($rsthanh_vien);
$totalRows_rsthanh_vien = mysql_num_rows($rsthanh_vien);

// Captcha Image
$captcha_id_obj = new KT_CaptchaImage("captcha_id_id");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="includes/common/js/base.js" type="text/javascript"></script><script src="includes/common/js/utility.js" type="text/javascript"></script><script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script type="text/javascript" src="Editor/scripts/innovaeditor.js"></script>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form method="post" id="form2" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
  <br />
  <table width="500" cellpadding="0" cellspacing="0" class="chu3" style="text-align:left">
  	<tr>
    	<td colspan="2" align="center" class="chu1Copy">
        ĐĂNG KÍ THÀNH VIÊN        </td>
    </tr>
    <tr>
    	<td colspan="2" class="chu2">
        	Bạn hãy đọc kĩ nội qui trang web trước khi đăng kí .<br />
            Nếu bạn đồng ý hãy điền đầy đủ thông tin dưới đây.      </td>
    </tr>
    <tr>
      <td width="133"><label for="TenThanhVien">Tên Thành Viên</label></td>
      <td width="365"><input type="text" name="TenThanhVien" id="TenThanhVien" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['TenThanhVien']); ?>" size="32" />
      <?php echo $tNGs->displayFieldHint("TenThanhVien");?> <?php echo $tNGs->displayFieldError("thanh_vien", "TenThanhVien"); ?> </td>
    </tr>
    <tr>
      <td><label for="UserName">UserName</label></td>
      <td><input type="text" name="UserName" id="UserName" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['UserName']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("UserName");?> <?php echo $tNGs->displayFieldError("thanh_vien", "UserName"); ?> </td>
    </tr>
    <tr>
      <td><label for="PassWord">PassWord</label></td>
      <td><input type="password" name="PassWord" id="PassWord" value="" size="32" />
          <?php echo $tNGs->displayFieldHint("PassWord");?> <?php echo $tNGs->displayFieldError("thanh_vien", "PassWord"); ?> </td>
    </tr>
    <tr>
      <td><label for="re_PassWord">Nhập Lại PassWord</label></td>
      <td><input type="password" name="re_PassWord" id="re_PassWord" value="" size="32" />      </td>
    </tr>
    <tr>
      <td><label for="DiaChi">Địa Chỉ</label></td>
      <td><input type="text" name="DiaChi" id="DiaChi" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['DiaChi']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("thanh_vien", "DiaChi"); ?> </td>
    </tr>
    <tr>
      <td><label for="DienThoai">Điện Thoại</label></td>
      <td><input type="text" name="DienThoai" id="DienThoai" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['DienThoai']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("thanh_vien", "DienThoai"); ?> </td>
    </tr>
    <tr>
      <td><label for="GioiTinh_1">Giới Tính</label></td>
      <td><div>
        <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanh_vien['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_1" value="1" />
        <label for="GioiTinh_1">Nam</label>
      </div>
          <div>
            <input <?php if (!(strcmp(KT_escapeAttribute($row_rsthanh_vien['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_2" value="0" />
            <label for="GioiTinh_2">Nữ</label>
          </div>
        <?php echo $tNGs->displayFieldError("thanh_vien", "GioiTinh"); ?> </td>
    </tr>
    <tr>
      <td><label for="Email">Email</label></td>
      <td><input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsthanh_vien['Email']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("thanh_vien", "Email"); ?> </td>
    </tr>
    <tr>
      <td><label for="Avartar">Avartar</label></td>
      <td><input type="file" name="Avartar" id="Avartar" size="32" />
          <?php echo $tNGs->displayFieldError("thanh_vien", "Avartar"); ?> </td>
    </tr>
    <tr>
        <td colspan="2">
        <input type="hidden" readonly="readonly" name="AcessLevel" id="AcessLevel" value=2 />        </td>
    </tr>
    <tr>
      <td><label for="ThongTinThem">Thông Tin Thêm</label></td>
      <td><textarea name="ThongTinThem" id="ThongTinThem" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsthanh_vien['ThongTinThem']); ?></textarea>
      
      
        <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    oEdit1.width=370;
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

    oEdit1.REPLACE("ThongTinThem");
  </script>
      
      
          <?php echo $tNGs->displayFieldHint("ThongTinThem");?> <?php echo $tNGs->displayFieldError("thanh_vien", "ThongTinThem"); ?> </td>
    </tr>
    <tr>
    	<td>Mã xác định
        </td>
        <td><input type="text" name="captcha_id" id="captcha_id" value="" />
          <br />
Nhập kí tự bạn thấy phía dưới vào !.<br />
<img src="<?php echo $captcha_id_obj->getImageURL("");?>" border="1" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCFFFF"><input name="KT_Insert2" type="submit" class="chu4" id="KT_Insert2" value="Đăng Kí" />      </td>
    </tr>
  </table>
  <input type="hidden" name="NgayDangKy" id="NgayDangKy" value="<?php echo KT_formatDate($row_rsthanh_vien['NgayDangKy']); ?>" />
</form>
</body>
</html>
