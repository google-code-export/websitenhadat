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
$formValidation->addField("TenNguoiThue", true, "text", "", "", "", "Vui lòng nhập tên!");
$formValidation->addField("DienThoai", true, "text", "", "", "", "Vui lòng nhập điện thoại !");
$formValidation->addField("ID_LoaiNha", true, "numeric", "", "", "", "Vui lòng chọn loại nhà");
$formValidation->addField("ID_QueQuan", true, "numeric", "", "", "", "Vui lòng chọn quê quán!");
$formValidation->addField("ID_NgheNghiep", true, "numeric", "", "", "", "Vui lòng chọn nghề nghiệp !");
$tNGs->prepareValidation($formValidation);
// End trigger

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
$query_rs_loainha = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha = mysql_query($query_rs_loainha, $conn_qlnd) or die(mysql_error());
$row_rs_loainha = mysql_fetch_assoc($rs_loainha);
$totalRows_rs_loainha = mysql_num_rows($rs_loainha);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset1 = "SELECT TenLoaiNha, ID_LoaiNha FROM loai_nha ORDER BY TenLoaiNha";
$Recordset1 = mysql_query($query_Recordset1, $conn_qlnd) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quequan = "SELECT * FROM que_quan ORDER BY ID_QueQuan ASC";
$rs_quequan = mysql_query($query_rs_quequan, $conn_qlnd) or die(mysql_error());
$row_rs_quequan = mysql_fetch_assoc($rs_quequan);
$totalRows_rs_quequan = mysql_num_rows($rs_quequan);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset2 = "SELECT Ten_QueQuan, ID_QueQuan FROM que_quan ORDER BY Ten_QueQuan";
$Recordset2 = mysql_query($query_Recordset2, $conn_qlnd) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_nghenghiep = "SELECT * FROM nghe_nghiep ORDER BY ID_NgheNghiep ASC";
$rs_nghenghiep = mysql_query($query_rs_nghenghiep, $conn_qlnd) or die(mysql_error());
$row_rs_nghenghiep = mysql_fetch_assoc($rs_nghenghiep);
$totalRows_rs_nghenghiep = mysql_num_rows($rs_nghenghiep);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_Recordset3 = "SELECT Ten_NgheNghiep, ID_NgheNghiep FROM nghe_nghiep ORDER BY Ten_NgheNghiep";
$Recordset3 = mysql_query($query_Recordset3, $conn_qlnd) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

// Make an insert transaction instance
$ins_nguoi_thue = new tNG_multipleInsert($conn_conn_qlnd);
$tNGs->addTransaction($ins_nguoi_thue);
// Register triggers
$ins_nguoi_thue->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_nguoi_thue->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_nguoi_thue->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_nguoi_thue->setTable("nguoi_thue");
$ins_nguoi_thue->addColumn("TenNguoiThue", "STRING_TYPE", "POST", "TenNguoiThue");
$ins_nguoi_thue->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_nguoi_thue->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$ins_nguoi_thue->addColumn("KhanNangThue", "STRING_TYPE", "POST", "KhanNangThue");
$ins_nguoi_thue->addColumn("GioiTinh", "NUMERIC_TYPE", "POST", "GioiTinh");
$ins_nguoi_thue->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$ins_nguoi_thue->addColumn("ID_QueQuan", "NUMERIC_TYPE", "POST", "ID_QueQuan");
$ins_nguoi_thue->addColumn("ID_NgheNghiep", "NUMERIC_TYPE", "POST", "ID_NgheNghiep");
$ins_nguoi_thue->setPrimaryKey("ID_NguoiThue", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_nguoi_thue = new tNG_multipleUpdate($conn_conn_qlnd);
$tNGs->addTransaction($upd_nguoi_thue);
// Register triggers
$upd_nguoi_thue->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_nguoi_thue->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_nguoi_thue->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_nguoi_thue->setTable("nguoi_thue");
$upd_nguoi_thue->addColumn("TenNguoiThue", "STRING_TYPE", "POST", "TenNguoiThue");
$upd_nguoi_thue->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$upd_nguoi_thue->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$upd_nguoi_thue->addColumn("KhanNangThue", "STRING_TYPE", "POST", "KhanNangThue");
$upd_nguoi_thue->addColumn("GioiTinh", "NUMERIC_TYPE", "POST", "GioiTinh");
$upd_nguoi_thue->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$upd_nguoi_thue->addColumn("ID_QueQuan", "NUMERIC_TYPE", "POST", "ID_QueQuan");
$upd_nguoi_thue->addColumn("ID_NgheNghiep", "NUMERIC_TYPE", "POST", "ID_NgheNghiep");
$upd_nguoi_thue->setPrimaryKey("ID_NguoiThue", "NUMERIC_TYPE", "GET", "ID_NguoiThue");

// Make an instance of the transaction object
$del_nguoi_thue = new tNG_multipleDelete($conn_conn_qlnd);
$tNGs->addTransaction($del_nguoi_thue);
// Register triggers
$del_nguoi_thue->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_nguoi_thue->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_nguoi_thue->setTable("nguoi_thue");
$del_nguoi_thue->setPrimaryKey("ID_NguoiThue", "NUMERIC_TYPE", "GET", "ID_NguoiThue");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsnguoi_thue = $tNGs->getRecordset("nguoi_thue");
$row_rsnguoi_thue = mysql_fetch_assoc($rsnguoi_thue);
$totalRows_rsnguoi_thue = mysql_num_rows($rsnguoi_thue);
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
    CHỈNH SỬA THÔNG TIN NGƯỜI THUÊ</span>
  <br />
  <br />
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsnguoi_thue > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="chu_xanh" ><label for="TenNguoiThue_<?php echo $cnt1; ?>">Tên Người Thuê</label></td>
          <td><input type="text" name="TenNguoiThue_<?php echo $cnt1; ?>" id="TenNguoiThue_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnguoi_thue['TenNguoiThue']); ?>" size="32" maxlength="45" />
              <?php echo $tNGs->displayFieldHint("TenNguoiThue");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "TenNguoiThue", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="DiaChi_<?php echo $cnt1; ?>">Địa Chỉ</label></td>
          <td><textarea name="DiaChi_<?php echo $cnt1; ?>" id="DiaChi_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnguoi_thue['DiaChi']); ?></textarea>
          
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

    oEdit1.REPLACE("DiaChi_<?php echo $cnt1; ?>");
  </script>
          
              <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "DiaChi", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="DienThoai_<?php echo $cnt1; ?>">Điện Thoại</label></td>
          <td><input type="text" name="DienThoai_<?php echo $cnt1; ?>" id="DienThoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsnguoi_thue['DienThoai']); ?>" size="20" maxlength="20" />
              <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "DienThoai", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="KhanNangThue_<?php echo $cnt1; ?>">Khản Năng Thuê</label></td>
          <td><textarea name="KhanNangThue_<?php echo $cnt1; ?>" id="KhanNangThue_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnguoi_thue['KhanNangThue']); ?></textarea>
          
           <script>
    var oEdit2 = new InnovaEditor("oEdit2");

    oEdit2.width=500;
    oEdit2.height=200;

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

    oEdit2.REPLACE("KhanNangThue_<?php echo $cnt1; ?>");
  </script>
          
              <?php echo $tNGs->displayFieldHint("KhanNangThue");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "KhanNangThue", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="GioiTinh_<?php echo $cnt1; ?>">Giới Tính</label></td>
          <td><div>
              <input <?php if (!(strcmp(KT_escapeAttribute($row_rsnguoi_thue['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_1" value="1" />
              <label for="GioiTinh_<?php echo $cnt1; ?>_1">Nam</label>
            </div>
              <div>
                <input <?php if (!(strcmp(KT_escapeAttribute($row_rsnguoi_thue['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_2" value="0" />
                <label for="GioiTinh_<?php echo $cnt1; ?>_2">Nữ</label>
              </div>
              <?php echo $tNGs->displayFieldError("nguoi_thue", "GioiTinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_LoaiNha_<?php echo $cnt1; ?>">Mã Loại Nhà</label></td>
          <td><select name="ID_LoaiNha_<?php echo $cnt1; ?>" id="ID_LoaiNha_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_loainha['ID_LoaiNha']?>"<?php if (!(strcmp($row_rs_loainha['ID_LoaiNha'], $row_rsnguoi_thue['ID_LoaiNha']))) {echo "SELECTED";} ?>><?php echo $row_rs_loainha['TenLoaiNha']?></option>
            <?php
} while ($row_rs_loainha = mysql_fetch_assoc($rs_loainha));
  $rows = mysql_num_rows($rs_loainha);
  if($rows > 0) {
      mysql_data_seek($rs_loainha, 0);
	  $row_rs_loainha = mysql_fetch_assoc($rs_loainha);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nguoi_thue", "ID_LoaiNha", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_QueQuan_<?php echo $cnt1; ?>">Mã Quê Quán</label></td>
          <td><select name="ID_QueQuan_<?php echo $cnt1; ?>" id="ID_QueQuan_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_rs_quequan['ID_QueQuan']?>"<?php if (!(strcmp($row_rs_quequan['ID_QueQuan'], $row_rsnguoi_thue['ID_QueQuan']))) {echo "SELECTED";} ?>><?php echo $row_rs_quequan['Ten_QueQuan']?></option>
            <?php
} while ($row_rs_quequan = mysql_fetch_assoc($rs_quequan));
  $rows = mysql_num_rows($rs_quequan);
  if($rows > 0) {
      mysql_data_seek($rs_quequan, 0);
	  $row_rs_quequan = mysql_fetch_assoc($rs_quequan);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nguoi_thue", "ID_QueQuan", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="chu_xanh"><label for="ID_NgheNghiep_<?php echo $cnt1; ?>">Mã Nghề Nghiệp</label></td>
          <td><select name="ID_NgheNghiep_<?php echo $cnt1; ?>" id="ID_NgheNghiep_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset3['ID_NgheNghiep']?>"<?php if (!(strcmp($row_Recordset3['ID_NgheNghiep'], $row_rsnguoi_thue['ID_NgheNghiep']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['Ten_NgheNghiep']?></option>
            <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("nguoi_thue", "ID_NgheNghiep", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_nguoi_thue_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsnguoi_thue['kt_pk_nguoi_thue']); ?>" />
      <?php } while ($row_rsnguoi_thue = mysql_fetch_assoc($rsnguoi_thue)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['ID_NguoiThue'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'ID_NguoiThue')" />
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
mysql_free_result($rs_loainha);

mysql_free_result($Recordset1);

mysql_free_result($rs_quequan);

mysql_free_result($Recordset2);

mysql_free_result($rs_nghenghiep);

mysql_free_result($Recordset3);
?>
