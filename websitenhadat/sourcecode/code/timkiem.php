<?php require_once('Connections/conn_qlnd.php'); ?>
<?php
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
$query_rs_quan = "SELECT * FROM quan ORDER BY ID_Quan ASC";
$rs_quan = mysql_query($query_rs_quan, $conn_qlnd) or die(mysql_error());
$row_rs_quan = mysql_fetch_assoc($rs_quan);
$totalRows_rs_quan = mysql_num_rows($rs_quan);

mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_loainha = "SELECT * FROM loai_nha ORDER BY ID_LoaiNha ASC";
$rs_loainha = mysql_query($query_rs_loainha, $conn_qlnd) or die(mysql_error());
$row_rs_loainha = mysql_fetch_assoc($rs_loainha);
$totalRows_rs_loainha = mysql_num_rows($rs_loainha);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('Vui lòng nhập từ khóa cần tìm');
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
</head>

<body>

<p align="center" class="chu1Copy">TÌM KIẾM THÔNG TIN !</p>
<form action="index_noidung.php?mod=ketquatimkiem" method="get" name="timkiem">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="chu3">Loại Nhà</td>
    <td class="chu3"><select name="loainha" id="loainha">
        <option value="0">Chọn...</option>
<?php
do {  
?><option value="<?php echo $row_rs_loainha['ID_LoaiNha']?>"><?php echo $row_rs_loainha['TenLoaiNha']?></option>
          <?php
} while ($row_rs_loainha = mysql_fetch_assoc($rs_loainha));
  $rows = mysql_num_rows($rs_loainha);
  if($rows > 0) {
      mysql_data_seek($rs_loainha, 0);
	  $row_rs_loainha = mysql_fetch_assoc($rs_loainha);
  }
?>
      </select></td>
  </tr>
  
  <tr>
    <td width="120" class="chu3">Quận</td>
    <td width="378"><label>
      <select name="quan" id="quan">
        <option value="0">Chọn...</option>
        <?php
do {  
?>
        <option value="<?php echo $row_rs_quan['ID_Quan']?>"><?php echo $row_rs_quan['TenQuan']?></option>
        <?php
} while ($row_rs_quan = mysql_fetch_assoc($rs_quan));
  $rows = mysql_num_rows($rs_quan);
  if($rows > 0) {
      mysql_data_seek($rs_quan, 0);
	  $row_rs_quan = mysql_fetch_assoc($rs_quan);
  }
?>
      </select>
    </label></td>
  </tr>
  <tr>
  	<td class="chu3">Tiêu Đề nhà</td>
    <td><label>
      <input name="tieude" type="text" id="tieude"/>
    </label></td>
  </tr>
  <tr>
  	<td class="chu3">Giá cả</td>
    <td><span class="chu3">Từ</span>
      <label><span class="chu3">      </span>
      <select name="giamin" id="giamin">
        <option value="0" selected="selected">Giá từ...</option>
        <option value="5">1 triệu</option>
        <option value="10">10 triệu</option>
        <option value="20">20 triệu</option>
        <option value="30">30 triệu</option>
        <option value="50">50 triệu</option>
        </select>
&nbsp;&nbsp;&nbsp;&nbsp;      <span class="chu3">đến &nbsp;&nbsp;</span>
      <select name="giamax" id="giamax">
        <option value="0" selected="selected">đến...</option>
        <option value="5">5 triệu</option>
        <option value="10">10 triệu</option>
        <option value="20">20 triệu</option>
        <option value="50">50 triệu</option>
        <option value="100">100 triệu </option>
      </select>
      </label></td>
  </tr>
  <tr>
    <td class="chu3">Diện tích </td>
    <td><span class="chu3">Từ</span>
      <label>
      <input name="dtmin" type="text" id="dtmin" size="20"/>
      <span class="chu3">đến </span>
      <input type="text" name="dtmax" id="dtmax" />
      </label></td>
  </tr>
  <tr>
  	<td class="chu3">Số phòng tắm</td>
    <td><label>
      <select name="sophongtam" id="sophongtam">
        <option value="0" selected="selected">Chọn...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
    </label></td>
  </tr>
  <tr>
  	<td class="chu3">Số phòng ngũ</td>
    <td><label>
      <select name="sophongngu" id="sophongngu">
        <option value="0" selected="selected">Chọn...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
    </label></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><label>
      <br />
      <span class="chu3">
      <input name="mod" type="hidden" id="mod" value="ketquatimkiem" />
      </span>
      <input type="submit" class="chu4" value="Tìm Kiếm" />
    	<BR />
    </label></td>
  </tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($rs_quan);
mysql_free_result($rs_loainha);
?>
