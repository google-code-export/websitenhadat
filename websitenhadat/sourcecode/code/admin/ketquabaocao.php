<?php require_once('../Connections/conn_qlnd.php'); ?>
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

$colname1_rs_baocao = "2010-09-10";
if (isset($_GET["to"])) {
  $colname1_rs_baocao = $_GET["to"];
}
$colname2_rs_baocao = "2010-10-10";
if (isset($_GET["from"])) {
  $colname2_rs_baocao = $_GET["from"];
}
mysql_select_db($database_conn_qlnd, $conn_qlnd);
$query_rs_baocao = sprintf("SELECT hop_dong.ID_HopDong, hop_dong.TimeBD, hop_dong.TimeKT, hop_dong.NgayKy, nha_dat.ID_NhaDat, nha_dat.TieuDe, nha_dat.TienThue, nha_dat.DatCoc, nguoi_thue.ID_NguoiThue, nguoi_thue.TenNguoiThue, nguoi_thue.DiaChi, nguoi_thue.DienThoai, nha_dat.DienTich FROM ((hop_dong LEFT JOIN nha_dat ON nha_dat.ID_NhaDat=hop_dong.ID_NhaDat) LEFT JOIN nguoi_thue ON nguoi_thue.ID_NguoiThue=hop_dong.ID_NguoiThue)  WHERE hop_dong.NgayKy BETWEEN %s AND %s", GetSQLValueString($colname1_rs_baocao, "date"),GetSQLValueString($colname2_rs_baocao, "date"));
$rs_baocao = mysql_query($query_rs_baocao, $conn_qlnd) or die(mysql_error());
$row_rs_baocao = mysql_fetch_assoc($rs_baocao);
$totalRows_rs_baocao = mysql_num_rows($rs_baocao);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/nhadat.css" rel="stylesheet" type="text/css" />
<link href="../css/Trangtri.css" rel="stylesheet" type="text/css" />
</head>

<body>
<BR />
<div id="baocaoketqua">
<div id="baocaoketqua_tieude">BÁO CÁO ĐỊNH KÌ</div>
<?php
$s=0; 
$dem=0;
do 
{ 
$dem++;
?>
<div id="ketquabaocao_noidung">
  <span class="chu3"><?php echo $dem; ?>.Mã hợp đồng : <?php echo $row_rs_baocao['ID_HopDong']; ?></span><br />
  Ngày kí : <?php echo date('d/m/Y',$row_rs_baocao['NgayKy']); ?><br />
  Tiền thuê : <?php echo number_format($row_rs_baocao['TienThue'],0,',','.'); ?>  triệu/tháng<br />
Đặt cọc : <?php echo $row_rs_baocao['DatCoc']; ?>&nbsp;triệu<br />
Người thuê : <?php echo $row_rs_baocao['TenNguoiThue']; ?></div> 
<?php 
$s=$s + $row_rs_baocao["TienThue"]; 
} while ($row_rs_baocao = mysql_fetch_assoc($rs_baocao)); ?>
</div>
  <BR />
  <div id="thongkehopdong">
  Tổng tiền hợp đồng đã kí được : <?php echo $s; ?> triệu.
  <br />
  Phần trăm trích được : <?php echo $s*0.08; ?> triệu.
  </div>
  <br />
</body>
</html>
<?php
mysql_free_result($rs_baocao);
?>
