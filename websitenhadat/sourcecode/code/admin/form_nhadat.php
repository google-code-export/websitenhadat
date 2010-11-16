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
$formValidation->addField("Duong", true, "text", "", "", "", "Nhập đường");
$formValidation->addField("SoPTam", true, "numeric", "", "", "", "Nhập số phòng tắm!");
$formValidation->addField("SoPNgu", true, "numeric", "", "", "", "Số phòng ngủ!");
$formValidation->addField("ID_HuongNha", true, "numeric", "", "", "", "Vui lòng chọn hướng nhà!");
$formValidation->addField("ID_NV", true, "numeric", "", "", "", "Vui lòng chọn nhân viên để liên hệ!");
$formValidation->addField("ID_LoaiNha", true, "numeric", "", "", "", "Vui lòng chọn loại nhà!");
$formValidation->addField("ID_Quan", true, "numeric", "", "", "", "Vui lòng chọn quận!");
$formValidation->addField("ID_ChuNha", true, "numeric", "", "", "", "Vui lòng chọn chủ nhà!");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/");
  $deleteObj->setDbFieldName("HinhAnh");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("HinhAnh");
  $uploadObj->setDbFieldName("HinhAnh");
  $uploadObj->setFolder("../images/");
  $uploadObj->setResize("true", 100, 0);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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
$query_rs_chunha = "SELECT ID_ChuNha, TenChuNha FROM chu_nha ORDER BY ID_ChuNha ASC";
$rs_chunha = mysql_query($query_rs_chunha, $conn_qlnd) or die(mysql_error());
$row_rs_chunha = mysql_fetch_assoc($rs_chunha);
$totalRows_rs_chunha = mysql_num_rows($rs_chunha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset5 = "SELECT TenChuNha, ID_ChuNha FROM chu_nha ORDER BY TenChuNha";
$Recordset5 = mysql_query($query_Recordset5, $conn_qlnd) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quan = "SELECT * FROM quan ORDER BY ID_Quan ASC";
$rs_quan = mysql_query($query_rs_quan, $conn_qlnd) or die(mysql_error());
$row_rs_quan = mysql_fetch_assoc($rs_quan);
$totalRows_rs_quan = mysql_num_rows($rs_quan);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset4 = "SELECT TenQuan, ID_Quan FROM quan ORDER BY TenQuan";
$Recordset4 = mysql_query($query_Recordset4, $conn_qlnd) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_loainha = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha = mysql_query($query_rs_loainha, $conn_qlnd) or die(mysql_error());
$row_rs_loainha = mysql_fetch_assoc($rs_loainha);
$totalRows_rs_loainha = mysql_num_rows($rs_loainha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset3 = "SELECT TenLoaiNha, ID_LoaiNha FROM loai_nha ORDER BY TenLoaiNha";
$Recordset3 = mysql_query($query_Recordset3, $conn_qlnd) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_nhanvien = "SELECT ID_NV, TenNV FROM nhan_vien ORDER BY ID_NV ASC";
$rs_nhanvien = mysql_query($query_rs_nhanvien, $conn_qlnd) or die(mysql_error());
$row_rs_nhanvien = mysql_fetch_assoc($rs_nhanvien);
$totalRows_rs_nhanvien = mysql_num_rows($rs_nhanvien);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_huongnha = "SELECT * FROM huong_nha ORDER BY ID_HuongNha ASC";
$rs_huongnha = mysql_query($query_rs_huongnha, $conn_qlnd) or die(mysql_error());
$row_rs_huongnha = mysql_fetch_assoc($rs_huongnha);
$totalRows_rs_huongnha = mysql_num_rows($rs_huongnha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TenHuongNha, ID_HuongNha FROM huong_nha ORDER BY TenHuongNha";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT TenNV, ID_NV FROM nhan_vien ORDER BY TenNV";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_nha_dat = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_nha_dat);
// Register triggers
$ins_nha_dat->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_nha_dat->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_nha_dat->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_nha_dat->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_nha_dat->setTable("nha_dat");
$ins_nha_dat->addColumn("ID_NhaDat", "NUMERIC_TYPE", "VALUE", "");
$ins_nha_dat->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$ins_nha_dat->addColumn("Duong", "STRING_TYPE", "POST", "Duong");
$ins_nha_dat->addColumn("SoPTam", "NUMERIC_TYPE", "POST", "SoPTam");
$ins_nha_dat->addColumn("SoPNgu", "NUMERIC_TYPE", "POST", "SoPNgu");
$ins_nha_dat->addColumn("TienThue", "STRING_TYPE", "POST", "TienThue");
$ins_nha_dat->addColumn("DatCoc", "NUMERIC_TYPE", "POST", "DatCoc");
$ins_nha_dat->addColumn("DienTich", "NUMERIC_TYPE", "POST", "DienTich");
$ins_nha_dat->addColumn("HinhAnh", "FILE_TYPE", "FILES", "HinhAnh");
$ins_nha_dat->addColumn("MoTaChiTiet", "STRING_TYPE", "POST", "MoTaChiTiet");
$ins_nha_dat->addColumn("ID_HuongNha", "NUMERIC_TYPE", "POST", "ID_HuongNha");
$ins_nha_dat->addColumn("ID_NV", "NUMERIC_TYPE", "POST", "ID_NV");
$ins_nha_dat->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$ins_nha_dat->addColumn("ID_Quan", "NUMERIC_TYPE", "POST", "ID_Quan");
$ins_nha_dat->addColumn("ID_ChuNha", "NUMERIC_TYPE", "POST", "ID_ChuNha");
$ins_nha_dat->setPrimaryKey("ID_NhaDat", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_nha_dat = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_nha_dat);
// Register triggers
$upd_nha_dat->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_nha_dat->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_nha_dat->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_nha_dat->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_nha_dat->setTable("nha_dat");
$upd_nha_dat->addColumn("ID_NhaDat", "NUMERIC_TYPE", "CURRVAL", "");
$upd_nha_dat->addColumn("TieuDe", "STRING_TYPE", "POST", "TieuDe");
$upd_nha_dat->addColumn("Duong", "STRING_TYPE", "POST", "Duong");
$upd_nha_dat->addColumn("SoPTam", "NUMERIC_TYPE", "POST", "SoPTam");
$upd_nha_dat->addColumn("SoPNgu", "NUMERIC_TYPE", "POST", "SoPNgu");
$upd_nha_dat->addColumn("TienThue", "STRING_TYPE", "POST", "TienThue");
$upd_nha_dat->addColumn("DatCoc", "NUMERIC_TYPE", "POST", "DatCoc");
$upd_nha_dat->addColumn("DienTich", "NUMERIC_TYPE", "POST", "DienTich");
$upd_nha_dat->addColumn("HinhAnh", "FILE_TYPE", "FILES", "HinhAnh");
$upd_nha_dat->addColumn("MoTaChiTiet", "STRING_TYPE", "POST", "MoTaChiTiet");
$upd_nha_dat->addColumn("ID_HuongNha", "NUMERIC_TYPE", "POST", "ID_HuongNha");
$upd_nha_dat->addColumn("ID_NV", "NUMERIC_TYPE", "POST", "ID_NV");
$upd_nha_dat->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$upd_nha_dat->addColumn("ID_Quan", "NUMERIC_TYPE", "POST", "ID_Quan");
$upd_nha_dat->addColumn("ID_ChuNha", "NUMERIC_TYPE", "POST", "ID_ChuNha");
$upd_nha_dat->setPrimaryKey("ID_NhaDat", "NUMERIC_TYPE", "GET", "ID_NhaDat");

// Make an instance of the transaction object
$del_nha_dat = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_nha_dat);
// Register triggers
$del_nha_dat->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_nha_dat->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_nha_dat->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_nha_dat->setTable("nha_dat");
$del_nha_dat->setPrimaryKey("ID_NhaDat", "NUMERIC_TYPE", "GET", "ID_NhaDat");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnha_dat = $tNGs->getRecordset("nha_dat");
$row_rsnha_dat = mysql_fetch_assoc($rsnha_dat);
$totalRows_rsnha_dat = mysql_num_rows($rsnha_dat);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rsnha_dat.HinhAnh}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/");
$objDynamicThumb1->setRenameRule("{rsnha_dat.HinhAnh}");
$objDynamicThumb1->setResize(100, 80, false);
$objDynamicThumb1->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script type="text/javascript" src="../Editor/scripts/innovaeditor.js"></script>

</head>

<body>
<div align="center">
  <div class="KT_tng">
  <br />
  <span class="chu">
    CHỈNH SỬA THÔNG TIN NHÀ ĐẤT</span>
  <br />
  <br />
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnha_dat > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="chu_xanh">Mã</td>
          <td><?php echo KT_escapeAttribute($row_rsnha_dat['ID_NhaDat']); ?></td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="TieuDe_<?php echo $cnt1; ?>">Tiêu Đề</label></td>
          <td><input type="text" name="TieuDe_<?php echo $cnt1; ?>" id="TieuDe_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['TieuDe']); ?>" size="50" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("TieuDe");?> <?php echo $tNGs->displayFieldError("nha_dat", "TieuDe", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="Duong_<?php echo $cnt1; ?>">Đường</label></td>
          <td><input type="text" name="Duong_<?php echo $cnt1; ?>" id="Duong_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['Duong']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("Duong");?> <?php echo $tNGs->displayFieldError("nha_dat", "Duong", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="SoPTam_<?php echo $cnt1; ?>">SoPTam:</label></td>
          <td><input type="text" name="SoPTam_<?php echo $cnt1; ?>" id="SoPTam_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['SoPTam']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("SoPTam");?> <?php echo $tNGs->displayFieldError("nha_dat", "SoPTam", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="SoPNgu_<?php echo $cnt1; ?>">SoPNgu:</label></td>
          <td><input type="text" name="SoPNgu_<?php echo $cnt1; ?>" id="SoPNgu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['SoPNgu']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("SoPNgu");?> <?php echo $tNGs->displayFieldError("nha_dat", "SoPNgu", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="TienThue_<?php echo $cnt1; ?>">Tiền Thuê</label></td>
          <td><input type="text" name="TienThue_<?php echo $cnt1; ?>" id="TienThue_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['TienThue']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("TienThue");?> <?php echo $tNGs->displayFieldError("nha_dat", "TienThue", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="DatCoc_<?php echo $cnt1; ?>">Đặc Cọc</label></td>
          <td><input type="text" name="DatCoc_<?php echo $cnt1; ?>" id="DatCoc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['DatCoc']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("DatCoc");?> <?php echo $tNGs->displayFieldError("nha_dat", "DatCoc", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="DienTich_<?php echo $cnt1; ?>">Diện Tích</label></td>
          <td><input type="text" name="DienTich_<?php echo $cnt1; ?>" id="DienTich_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnha_dat['DienTich']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("DienTich");?> <?php echo $tNGs->displayFieldError("nha_dat", "DienTich", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="HinhAnh_<?php echo $cnt1; ?>">Hình Ảnh</label></td>
          <td><input type="file" name="HinhAnh_<?php echo $cnt1; ?>" id="HinhAnh_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("nha_dat", "HinhAnh", $cnt1); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php 
// Show If File Exists (region3)
if (tNG_fileExists("../images/", "{rsnha_dat.HinhAnh}")) {
?>
                <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" />
                <?php } 
// EndIf File Exists (region3)
?></td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="MoTaChiTiet_<?php echo $cnt1; ?>">Mô Tả Chi Tiết</label></td>
          <td><textarea name="MoTaChiTiet_<?php echo $cnt1; ?>" id="MoTaChiTiet_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnha_dat['MoTaChiTiet']); ?></textarea>
          
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

    oEdit1.REPLACE("MoTaChiTiet_<?php echo $cnt1; ?>");
  </script>
          
              <?php echo $tNGs->displayFieldHint("MoTaChiTiet");?> <?php echo $tNGs->displayFieldError("nha_dat", "MoTaChiTiet", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_HuongNha_<?php echo $cnt1; ?>">Hướng Nhà</label></td>
          <td><select name="ID_HuongNha_<?php echo $cnt1; ?>" id="ID_HuongNha_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset1['ID_HuongNha']?>"<?php if (!(strcmp($row_Recordset1['ID_HuongNha'], $row_rsnha_dat['ID_HuongNha']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenHuongNha']?></option>
            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nha_dat", "ID_HuongNha", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_NV_<?php echo $cnt1; ?>">Mã NV</label></td>
          <td><select name="ID_NV_<?php echo $cnt1; ?>" id="ID_NV_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset2['ID_NV']?>"<?php if (!(strcmp($row_Recordset2['ID_NV'], $row_rsnha_dat['ID_NV']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['ID_NV']?></option>
            <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nha_dat", "ID_NV", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_LoaiNha_<?php echo $cnt1; ?>">Loại Nhà</label></td>
          <td><select name="ID_LoaiNha_<?php echo $cnt1; ?>" id="ID_LoaiNha_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_loainha['ID_LoaiNha']?>"<?php if (!(strcmp($row_rs_loainha['ID_LoaiNha'], $row_rsnha_dat['ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo $row_rs_loainha['TenLoaiNha']?></option>
            <?php
} while ($row_rs_loainha = mysql_fetch_assoc($rs_loainha));
  $rows = mysql_num_rows($rs_loainha);
  if($rows > 0) {
      mysql_data_seek($rs_loainha, 0);
	  $row_rs_loainha = mysql_fetch_assoc($rs_loainha);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nha_dat", "ID_LoaiNha", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_Quan_<?php echo $cnt1; ?>">Quận</label></td>
          <td><select name="ID_Quan_<?php echo $cnt1; ?>" id="ID_Quan_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_quan['ID_Quan']?>"<?php if (!(strcmp($row_rs_quan['ID_Quan'], $row_rsnha_dat['ID_Quan']))) {echo "SELECTED";} ?>><?php echo $row_rs_quan['TenQuan']?></option>
            <?php
} while ($row_rs_quan = mysql_fetch_assoc($rs_quan));
  $rows = mysql_num_rows($rs_quan);
  if($rows > 0) {
      mysql_data_seek($rs_quan, 0);
	  $row_rs_quan = mysql_fetch_assoc($rs_quan);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nha_dat", "ID_Quan", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_ChuNha_<?php echo $cnt1; ?>">Mã Chủ Nhà</label></td>
          <td><select name="ID_ChuNha_<?php echo $cnt1; ?>" id="ID_ChuNha_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_chunha['ID_ChuNha']?>"<?php if (!(strcmp($row_rs_chunha['ID_ChuNha'], $row_rsnha_dat['ID_ChuNha']))) {echo "SELECTED";} ?>><?php echo $row_rs_chunha['ID_ChuNha']?></option>
            <?php
} while ($row_rs_chunha = mysql_fetch_assoc($rs_chunha));
  $rows = mysql_num_rows($rs_chunha);
  if($rows > 0) {
      mysql_data_seek($rs_chunha, 0);
	  $row_rs_chunha = mysql_fetch_assoc($rs_chunha);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nha_dat", "ID_ChuNha", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_nha_dat_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnha_dat['kt_pk_nha_dat']); ?>" />
      <?php } while ($row_rsnha_dat = mysql_fetch_assoc($rsnha_dat)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_NhaDat'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_NhaDat')" />
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
<?php
mysql_free_result($rs_chunha);

mysql_free_result($Recordset5);

mysql_free_result($rs_quan);

mysql_free_result($Recordset4);

mysql_free_result($rs_loainha);

mysql_free_result($Recordset3);

mysql_free_result($rs_nhanvien);

mysql_free_result($rs_huongnha);

mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
