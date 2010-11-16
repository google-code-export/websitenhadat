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
$masterValidation = new tNG_FormValidation();
$masterValidation->addField("TenChuNha", true, "text", "", "", "", "Vui lòng nhập tên chủ nhà!");
$masterValidation->addField("DienThoai", true, "text", "", "", "", "Vui lòng nhập điện thoại!");
$tNGs->prepareValidation($masterValidation);
// End trigger

// Start trigger
$detailValidation = new tNG_FormValidation();
$detailValidation->addField("TieuDe", true, "text", "", "", "", "Vui lòng nhập tiêu đề!");
$detailValidation->addField("SoPTam", true, "numeric", "", "", "", "Vui lòng nhập số phòng !");
$detailValidation->addField("SoPNgu", true, "numeric", "", "", "", "Vui lòng nhập số phòng !");
$detailValidation->addField("DienTich", true, "numeric", "", "", "", "Vui lòng cho biết diện tích nhà !");
$tNGs->prepareValidation($detailValidation);
// End trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("HinhAnh");
  $uploadObj->setDbFieldName("HinhAnh");
  $uploadObj->setFolder("images/");
  $uploadObj->setResize("true", 100, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

//start Trigger_LinkTransactions trigger
//remove this line if you want to edit the code by hand 
function Trigger_LinkTransactions(&$tNG) {
	global $ins_nha_dat;
  $linkObj = new tNG_LinkedTrans($tNG, $ins_nha_dat);
  $linkObj->setLink("ID_ChuNha");
  return $linkObj->Execute();
}
//end Trigger_LinkTransactions trigger

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_huongnha = "SELECT * FROM huong_nha ORDER BY ID_HuongNha ASC";
$rs_huongnha = mysql_query($query_rs_huongnha, $conn_qlnd) or die(mysql_error());
$row_rs_huongnha = mysql_fetch_assoc($rs_huongnha);
$totalRows_rs_huongnha = mysql_num_rows($rs_huongnha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_loainha = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha = mysql_query($query_rs_loainha, $conn_qlnd) or die(mysql_error());
$row_rs_loainha = mysql_fetch_assoc($rs_loainha);
$totalRows_rs_loainha = mysql_num_rows($rs_loainha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quan = "SELECT * FROM quan ORDER BY ID_Quan ASC";
$rs_quan = mysql_query($query_rs_quan, $conn_qlnd) or die(mysql_error());
$row_rs_quan = mysql_fetch_assoc($rs_quan);
$totalRows_rs_quan = mysql_num_rows($rs_quan);

// Make an insert transaction instance
$ins_chu_nha = new tNG_insert($conn_conn_qlnd);
$tNGs->addTransaction($ins_chu_nha);
// Register triggers
$ins_chu_nha->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_chu_nha->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $masterValidation);
$ins_chu_nha->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
$ins_chu_nha->registerTrigger("AFTER", "Trigger_LinkTransactions", 98);
$ins_chu_nha->registerTrigger("ERROR", "Trigger_LinkTransactions", 98);
// Add columns
$ins_chu_nha->setTable("chu_nha");
$ins_chu_nha->addColumn("TenChuNha", "STRING_TYPE", "POST", "TenChuNha");
$ins_chu_nha->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_chu_nha->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$ins_chu_nha->setPrimaryKey("ID_ChuNha", "NUMERIC_TYPE");

// Make an insert transaction instance
$ins_nha_dat = new tNG_insert($conn_conn_qlnd);
$tNGs->addTransaction($ins_nha_dat);
// Register triggers
$ins_nha_dat->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "");
$ins_nha_dat->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $detailValidation);
$ins_nha_dat->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_nha_dat->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
$ins_nha_dat->setTable("nha_dat");
$ins_nha_dat->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$ins_nha_dat->addColumn("Duong", "STRING_TYPE", "POST", "Duong");
$ins_nha_dat->addColumn("SoPTam", "NUMERIC_TYPE", "POST", "SoPTam");
$ins_nha_dat->addColumn("SoPNgu", "NUMERIC_TYPE", "POST", "SoPNgu");
$ins_nha_dat->addColumn("TienThue", "STRING_TYPE", "POST", "TienThue");
$ins_nha_dat->addColumn("DatCoc", "NUMERIC_TYPE", "POST", "DatCoc");
$ins_nha_dat->addColumn("DienTich", "NUMERIC_TYPE", "POST", "DienTich");
$ins_nha_dat->addColumn("ID_HuongNha", "NUMERIC_TYPE", "POST", "ID_HuongNha");
$ins_nha_dat->addColumn("HinhAnh", "FILE_TYPE", "FILES", "HinhAnh");
$ins_nha_dat->addColumn("MoTaChiTiet", "STRING_TYPE", "POST", "MoTaChiTiet");
$ins_nha_dat->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$ins_nha_dat->addColumn("ID_Quan", "NUMERIC_TYPE", "POST", "ID_Quan");
$ins_nha_dat->addColumn("ID_ChuNha", "NUMERIC_TYPE", "VALUE", "");
$ins_nha_dat->setPrimaryKey("ID_NhaDat", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rschu_nha = $tNGs->getRecordset("chu_nha");
$row_rschu_nha = mysql_fetch_assoc($rschu_nha);
$totalRows_rschu_nha = mysql_num_rows($rschu_nha);

// Get the transaction recordset
$rsnha_dat = $tNGs->getRecordset("nha_dat");
$row_rsnha_dat = mysql_fetch_assoc($rsnha_dat);
$totalRows_rsnha_dat = mysql_num_rows($rsnha_dat);
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
<script type="text/javascript" src="Editor/scripts/innovaeditor.js"></script>

</head>

<body>

<div align="center">
  <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
  <table width="500" border="0" cellpadding="0" cellspacing="0">
    <tr>
    	<td colspan="2" align="center" class="chu">Nhập Thông Tin Chủ Nhà</td>
    </tr>
    <tr>
      <td width="100" align="left" class="chu3"><label for="TenChuNha">Tên Chủ Nhà</label></td>
      <td width="408" align="left"><input type="text" name="TenChuNha" id="TenChuNha" value="<?php echo KT_escapeAttribute($row_rschu_nha['TenChuNha']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("TenChuNha");?> <?php echo $tNGs->displayFieldError("chu_nha", "TenChuNha"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="DiaChi">Địa Chỉ</label></td>
      <td align="left"><textarea name="DiaChi" id="DiaChi" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rschu_nha['DiaChi']); ?></textarea>
      
      <script>
    var oEdit2 = new InnovaEditor("oEdit2");

    oEdit2.width=350;
    oEdit2.height=150;

    /***************************************************
    ADDING CUSTOM BUTTONS
    ***************************************************/

    oEdit2.arrCustomButtons = [["CustomName1","alert('Command 1 here.')","Caption 1 here","btnCustom1.gif"],
    ["CustomName2","alert(\"Command '2' here.\")","Caption 2 here","btnCustom2.gif"],
    ["CustomName3","alert('Command \"3\" here.')","Caption 3 here","btnCustom3.gif"]]


    /***************************************************
    RECONFIGURE TOOLBAR BUTTONS
    ***************************************************/

    oEdit2.tabs=[
    ["tabHome", "Home", ["grpEdit", "grpFont", "grpPara", "grpInsert", "grpTables"]],
    ["tabStyle", "Objects", ["grpResource", "grpMedia", "grpMisc", "grpCustom"]]
    ];

    oEdit2.groups=[
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
    oEdit2.css="style/test.css";//Specify external css file here

    oEdit2.cmdAssetManager = "modalDialogShow('/Editor/assetmanager/assetmanager.php',640,465)"; //Command to open the Asset Manager add-on.
    oEdit2.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.
    oEdit2.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.

    oEdit2.arrCustomTag=[["First Name","{%first_name%}"],
    ["Last Name","{%last_name%}"],
    ["Email","{%email%}"]];//Define custom tag selection

    oEdit2.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors

    oEdit2.mode="XHTMLBody"; //Editing mode. Possible values: "HTMLBody" (default), "XHTMLBody", "HTML", "XHTML"

    oEdit2.REPLACE("DiaChi");
  </script>
          
      
      
          <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("chu_nha", "DiaChi"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="DienThoai">Điện Thoại</label></td>
      <td align="left"><input type="text" name="DienThoai" id="DienThoai" value="<?php echo KT_escapeAttribute($row_rschu_nha['DienThoai']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("chu_nha", "DienThoai"); ?> </td>
    </tr>
    <tr class="chu3">
      <td colspan="2" align="center" class="chu"><br />
        Nhập Thông Tin Nhà Đất</td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="TieuDe">Loại Hình</label></td>
      <td align="left"><label>
        <select name="loaihinh" id="loaihinh">
          <option>Chọn...</option>
          <option value="nha">Nhà</option>
          <option value="dat">Đất</option>
        </select>
        </label></td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="TieuDe">Tiêu Đề</label></td>
      <td align="left"><input type="text" name="TieuDe" id="TieuDe" value="<?php echo KT_escapeAttribute($row_rsnha_dat['TieuDe']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("TieuDe");?> <?php echo $tNGs->displayFieldError("nha_dat", "TieuDe"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3" ><label for="Duong">Đường</label></td>
      <td align="left"><input type="text" name="Duong" id="Duong" value="<?php echo KT_escapeAttribute($row_rsnha_dat['Duong']); ?>" size="20" />
          <?php echo $tNGs->displayFieldHint("Duong");?> <?php echo $tNGs->displayFieldError("nha_dat", "Duong"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="SoPTam">Số phòng tắm</label></td>
      <td align="left"><input type="text" name="SoPTam" id="SoPTam" value="<?php echo KT_escapeAttribute($row_rsnha_dat['SoPTam']); ?>" size="15" />
          <?php echo $tNGs->displayFieldHint("SoPTam");?> <?php echo $tNGs->displayFieldError("nha_dat", "SoPTam"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="SoPNgu">Số phòng ngủ</label></td>
      <td align="left"><input type="text" name="SoPNgu" id="SoPNgu" value="<?php echo KT_escapeAttribute($row_rsnha_dat['SoPNgu']); ?>" size="15" />
          <?php echo $tNGs->displayFieldHint("SoPNgu");?> <?php echo $tNGs->displayFieldError("nha_dat", "SoPNgu"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="TienThue">Tiền thuê</label></td>
      <td align="left"><input type="text" name="TienThue" id="TienThue" value="<?php echo KT_escapeAttribute($row_rsnha_dat['TienThue']); ?>" size="20" />
          <?php echo $tNGs->displayFieldHint("TienThue");?> <?php echo $tNGs->displayFieldError("nha_dat", "TienThue"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="DatCoc">Đặt cọc</label></td>
      <td align="left"><input type="text" name="DatCoc" id="DatCoc" value="<?php echo KT_escapeAttribute($row_rsnha_dat['DatCoc']); ?>" size="20" />
          <?php echo $tNGs->displayFieldHint("DatCoc");?> <?php echo $tNGs->displayFieldError("nha_dat", "DatCoc"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="DienTich">Diện tích</label></td>
      <td align="left"><input type="text" name="DienTich" id="DienTich" value="<?php echo KT_escapeAttribute($row_rsnha_dat['DienTich']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DienTich");?> <?php echo $tNGs->displayFieldError("nha_dat", "DienTich"); ?> </td>
    </tr>
   
    <tr>
      <td align="left" class="chu3"><label for="HinhAnh">Hình ảnh nhà </label></td>
      <td align="left"><input type="file" name="HinhAnh" id="HinhAnh" size="32" />
          <?php echo $tNGs->displayFieldError("nha_dat", "HinhAnh"); ?> <span class="chu2">(nếu có)</span></td>
    </tr>
    <tr>
      <td width="92" align="left" class="chu3"><label for="MoTaChiTiet">Mô tả chi tiết</label></td>
      <td align="left"><textarea name="MoTaChiTiet" id="MoTaChiTiet" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnha_dat['MoTaChiTiet']); ?></textarea>
      
       <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    oEdit1.width=350;
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

    oEdit1.REPLACE("MoTaChiTiet");
  </script>
      
        <?php echo $tNGs->displayFieldHint("MoTaChiTiet");?> <?php echo $tNGs->displayFieldError("nha_dat", "MoTaChiTiet"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="ID_LoaiNha">Loại Nhà</label></td>
      <td align="left"><select name="ID_LoaiNha" id="ID_LoaiNha">
        <option value="" <?php if (!(strcmp("", $row_rsnha_dat['ID_LoaiNha']))) {echo "selected=\"selected\"";} ?>>Chọn...</option>
        <?php
do {  
?><option value="<?php echo $row_rs_loainha['ID_LoaiNha']?>"<?php if (!(strcmp($row_rs_loainha['ID_LoaiNha'], $row_rsnha_dat['ID_LoaiNha']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_loainha['TenLoaiNha']?></option>
        <?php
} while ($row_rs_loainha = mysql_fetch_assoc($rs_loainha));
  $rows = mysql_num_rows($rs_loainha);
  if($rows > 0) {
      mysql_data_seek($rs_loainha, 0);
	  $row_rs_loainha = mysql_fetch_assoc($rs_loainha);
  }
?>
      </select>
          <?php echo $tNGs->displayFieldError("nha_dat", "ID_LoaiNha"); ?> </td>
    </tr>
    <tr>
      <td align="left" class="chu3"><label for="ID_Quan">Quận</label></td>
      <td align="left"><select name="ID_Quan" id="ID_Quan">
        <option value="" <?php if (!(strcmp("", $row_rsnha_dat['ID_Quan']))) {echo "selected=\"selected\"";} ?>>Chọn...</option>
        <?php
do {  
?>
        <option value="<?php echo $row_rs_quan['ID_Quan']?>"<?php if (!(strcmp($row_rs_quan['ID_Quan'], $row_rsnha_dat['ID_Quan']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_quan['TenQuan']?></option>
        <?php
} while ($row_rs_quan = mysql_fetch_assoc($rs_quan));
  $rows = mysql_num_rows($rs_quan);
  if($rows > 0) {
      mysql_data_seek($rs_quan, 0);
	  $row_rs_quan = mysql_fetch_assoc($rs_quan);
  }
?>
      </select>
          <?php echo $tNGs->displayFieldError("nha_dat", "ID_Quan"); ?> </td>
    </tr>
     <tr>
      <td align="left" class="chu3"><label for="ID_HuongNha">Hướng nhà</label></td>
      <td align="left"><select name="ID_HuongNha" id="ID_HuongNha">
        <option value="" <?php if (!(strcmp("", $row_rsnha_dat['ID_HuongNha']))) {echo "selected=\"selected\"";} ?>>Chọn...</option>
        <?php
do {  
?><option value="<?php echo $row_rs_huongnha['ID_HuongNha']?>"<?php if (!(strcmp($row_rs_huongnha['ID_HuongNha'], $row_rsnha_dat['ID_HuongNha']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_huongnha['TenHuongNha']?></option>
        <?php
} while ($row_rs_huongnha = mysql_fetch_assoc($rs_huongnha));
  $rows = mysql_num_rows($rs_huongnha);
  if($rows > 0) {
      mysql_data_seek($rs_huongnha, 0);
	  $row_rs_huongnha = mysql_fetch_assoc($rs_huongnha);
  }
?>
      </select>
          <?php echo $tNGs->displayFieldError("nha_dat", "ID_HuongNha"); ?> <span class="chu2">(nếu có)</span></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><br /><input name="KT_Insert1" type="submit" class="chu4" id="KT_Insert1" value="Đăng Thông Tin" />
        <input name="nhaplai" type="reset" class="chu4" id="nhaplai" value="Nhập Lại" />        </td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<?php
mysql_free_result($rs_huongnha);

mysql_free_result($rs_loainha);

mysql_free_result($rs_quan);
?>
