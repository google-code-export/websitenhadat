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
$formValidation = new tNG_FormValidation();
$formValidation->addField("TenNguoiThue", true, "text", "", "", "", "Vui lòng nhập tên!");
$formValidation->addField("DienThoai", true, "text", "", "", "", "Vui lòng nhập điện thoại !");
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
$query_rs_loainha1 = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha1 = mysql_query($query_rs_loainha1, $conn_qlnd) or die(mysql_error());
$row_rs_loainha1 = mysql_fetch_assoc($rs_loainha1);
$totalRows_rs_loainha1 = mysql_num_rows($rs_loainha1);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quequan = "SELECT * FROM que_quan ORDER BY ID_QueQuan ASC";
$rs_quequan = mysql_query($query_rs_quequan, $conn_qlnd) or die(mysql_error());
$row_rs_quequan = mysql_fetch_assoc($rs_quequan);
$totalRows_rs_quequan = mysql_num_rows($rs_quequan);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_quequan1 = "SELECT * FROM que_quan ORDER BY ID_QueQuan ASC";
$rs_quequan1 = mysql_query($query_rs_quequan1, $conn_qlnd) or die(mysql_error());
$row_rs_quequan1 = mysql_fetch_assoc($rs_quequan1);
$totalRows_rs_quequan1 = mysql_num_rows($rs_quequan1);

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
$ins_nguoi_thue = new tNG_insert($conn_conn_qlnd);
$tNGs->addTransaction($ins_nguoi_thue);
// Register triggers
$ins_nguoi_thue->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_nguoi_thue->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_nguoi_thue->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
$ins_nguoi_thue->setTable("nguoi_thue");
$ins_nguoi_thue->addColumn("TenNguoiThue", "STRING_TYPE", "POST", "TenNguoiThue");
$ins_nguoi_thue->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_nguoi_thue->addColumn("DienThoai", "STRING_TYPE", "POST", "DienThoai");
$ins_nguoi_thue->addColumn("GioiTinh", "STRING_TYPE", "POST", "GioiTinh");
$ins_nguoi_thue->addColumn("KhanNangThue", "STRING_TYPE", "POST", "KhanNangThue");
$ins_nguoi_thue->addColumn("ID_LoaiNha", "NUMERIC_TYPE", "POST", "ID_LoaiNha");
$ins_nguoi_thue->addColumn("ID_QueQuan", "NUMERIC_TYPE", "POST", "ID_QueQuan");
$ins_nguoi_thue->addColumn("ID_NgheNghiep", "NUMERIC_TYPE", "POST", "ID_NgheNghiep");
$ins_nguoi_thue->setPrimaryKey("ID_NguoiThue", "NUMERIC_TYPE");

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
  <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <p align="center" class="chu1Copy">ĐĂNG  YÊU CẦU NHÀ!</p>
    <table width="500" cellpadding="0" cellspacing="0">
      <tr>
      	<td width="150" align="left" class="chu3"><label for="TenNguoiThue">Chọn Loại Hình </label></td>
        <td>
        <select name="loaihinh">  
        <option>Chọn...</option>
          <option value="nha">Nhà</option>
          <option value="dat">Đất</option>
        </select>
        </td>
      </tr>
      <tr>
        <td width="150" align="left" class="chu3"><label for="TenNguoiThue">Tên Người Đăng</label></td>
        <td width="392" align="left"><input type="text" name="TenNguoiThue" id="TenNguoiThue" value="<?php echo KT_escapeAttribute($row_rsnguoi_thue['TenNguoiThue']); ?>" size="25" />
            <?php echo $tNGs->displayFieldHint("TenNguoiThue");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "TenNguoiThue"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="DiaChi">Địa Chỉ</label></td>
        <td align="left"><input type="text" name="DiaChi" id="DiaChi" value="<?php echo KT_escapeAttribute($row_rsnguoi_thue['DiaChi']); ?>" size="32" />
            <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "DiaChi"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="DienThoai">Điện Thoại</label></td>
        <td align="left"><input type="text" name="DienThoai" id="DienThoai" value="<?php echo KT_escapeAttribute($row_rsnguoi_thue['DienThoai']); ?>" size="20" />
            <?php echo $tNGs->displayFieldHint("DienThoai");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "DienThoai"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="GioiTinh_1">Giới Tính</label></td>
        <td align="left"><div>
            <input <?php if (!(strcmp(KT_escapeAttribute($row_rsnguoi_thue['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_1" value="1" />
            <label for="GioiTinh_1" class="chu3">Nam</label>
          </div>
            <div>
              <input <?php if (!(strcmp(KT_escapeAttribute($row_rsnguoi_thue['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_2" value="0" />
              <label for="GioiTinh_2" class="chu3">Nứ</label>
            </div>
          <?php echo $tNGs->displayFieldError("nguoi_thue", "GioiTinh"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="KhanNangThue">Khản Năng Thuê</label></td>
        <td align="left"><textarea name="KhanNangThue" id="KhanNangThue" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsnguoi_thue['KhanNangThue']); ?></textarea>


<script>
    var oEdit1 = new InnovaEditor("oEdit1");

    oEdit1.width=340;
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

    oEdit1.REPLACE("KhanNangThue");
  </script>
          


          <?php echo $tNGs->displayFieldHint("KhanNangThue");?> <?php echo $tNGs->displayFieldError("nguoi_thue", "KhanNangThue"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="ID_LoaiNha">Loại Nhà</label></td>
        <td align="left"><select name="ID_LoaiNha" id="ID_LoaiNha">
          <option value="" <?php if (!(strcmp("", $row_rsnguoi_thue['ID_LoaiNha']))) {echo "selected=\"selected\"";} ?>>Chọn...</option>
          <option value="khac" <?php if (!(strcmp("khac", $row_rsnguoi_thue['ID_LoaiNha']))) {echo "selected=\"selected\"";} ?>>Khác</option>
<?php
do {  
?><option value="<?php echo $row_rs_loainha['ID_LoaiNha']?>"<?php if (!(strcmp($row_rs_loainha['ID_LoaiNha'], $row_rsnguoi_thue['ID_LoaiNha']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_loainha['TenLoaiNha']?></option>
            <?php
} while ($row_rs_loainha = mysql_fetch_assoc($rs_loainha));
  $rows = mysql_num_rows($rs_loainha);
  if($rows > 0) {
      mysql_data_seek($rs_loainha, 0);
	  $row_rs_loainha = mysql_fetch_assoc($rs_loainha);
  }
?>
          </select>
            <?php echo $tNGs->displayFieldError("nguoi_thue", "ID_LoaiNha"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="ID_QueQuan">Quê Quán</label></td>
        <td align="left"><select name="ID_QueQuan" id="ID_QueQuan">
          <option value="" <?php if (!(strcmp("", $row_rsnguoi_thue['ID_QueQuan']))) {echo "selected=\"selected\"";} ?>>Chọn...</option>
          <option value="khac" <?php if (!(strcmp("khac", $row_rsnguoi_thue['ID_QueQuan']))) {echo "selected=\"selected\"";} ?>>Khác</option>
<?php
do {  
?><option value="<?php echo $row_rs_quequan['ID_QueQuan']?>"<?php if (!(strcmp($row_rs_quequan['ID_QueQuan'], $row_rsnguoi_thue['ID_QueQuan']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_quequan['Ten_QueQuan']?></option>
            <?php
} while ($row_rs_quequan = mysql_fetch_assoc($rs_quequan));
  $rows = mysql_num_rows($rs_quequan);
  if($rows > 0) {
      mysql_data_seek($rs_quequan, 0);
	  $row_rs_quequan = mysql_fetch_assoc($rs_quequan);
  }
?>
          </select>
            <?php echo $tNGs->displayFieldError("nguoi_thue", "ID_QueQuan"); ?> </td>
      </tr>
      <tr>
        <td align="left" class="chu3"><label for="ID_NgheNghiep">Nghề Nghiệp</label></td>
        <td align="left"><select name="ID_NgheNghiep" id="ID_NgheNghiep">
          <option value="" <?php if (!(strcmp("", $row_rsnguoi_thue['ID_NgheNghiep']))) {echo "selected=\"selected\"";} ?>>Chọn...</option>
          <option value="khac" <?php if (!(strcmp("khac", $row_rsnguoi_thue['ID_NgheNghiep']))) {echo "selected=\"selected\"";} ?>>Khác</option>
          <?php
do {  
?><option value="<?php echo $row_rs_nghenghiep['ID_NgheNghiep']?>"<?php if (!(strcmp($row_rs_nghenghiep['ID_NgheNghiep'], $row_rsnguoi_thue['ID_NgheNghiep']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_nghenghiep['Ten_NgheNghiep']?></option>
            <?php
} while ($row_rs_nghenghiep = mysql_fetch_assoc($rs_nghenghiep));
  $rows = mysql_num_rows($rs_nghenghiep);
  if($rows > 0) {
      mysql_data_seek($rs_nghenghiep, 0);
	  $row_rs_nghenghiep = mysql_fetch_assoc($rs_nghenghiep);
  }
?>
          </select>
            <?php echo $tNGs->displayFieldError("nguoi_thue", "ID_NgheNghiep"); ?> </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><br /><input name="KT_Insert1" type="submit" class="chu4" id="KT_Insert1" value="Cập Nhật Thông Tin" />        </td>
      </tr>
      <tr>
      		<td colspan="2" class="chu2">
          		Chúng tôi sẽ liên hệ lại với bạn một ngày gần nhất khi có nhà theo yêu cầu của bạn .<br />
                Cảm ơn bạn đã đến với chúng tôi .        </td>
      </tr>
      
    </table>
  </form>
</div>
</body>
</html>
<?php
mysql_free_result($rs_loainha);

mysql_free_result($rs_loainha1);

mysql_free_result($rs_quequan);

mysql_free_result($rs_quequan1);

mysql_free_result($rs_nghenghiep);

mysql_free_result($Recordset3);
?>
