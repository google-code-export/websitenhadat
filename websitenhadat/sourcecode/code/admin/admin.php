<?php
// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Include Multiple Static Pages
$mxiObj = new MXI_Includes("mod");
$mxiObj->IncludeStatic("ketquabaocao", "ketquabaocao.php", "", "", "");
$mxiObj->IncludeStatic("form_chunha", "form_chunha.php", "", "", "");
$mxiObj->IncludeStatic("form_hopdong", "form_hopdong.php", "", "", "");
$mxiObj->IncludeStatic("form_huongnha", "form_huongnha.php", "", "", "");
$mxiObj->IncludeStatic("form_loainha", "form_loainha.php", "", "", "");
$mxiObj->IncludeStatic("form_nghenghiep", "form_nghenghiep.php", "", "", "");
$mxiObj->IncludeStatic("form_nguoithue", "form_nguoithue.php", "", "", "");
$mxiObj->IncludeStatic("form_nhadat", "form_nhadat.php", "", "", "");
$mxiObj->IncludeStatic("form_nhanvien", "form_nhanvien.php", "", "", "");
$mxiObj->IncludeStatic("form_quan", "form_quan.php", "", "", "");
$mxiObj->IncludeStatic("form_quangcao", "form_quangcao.php", "", "", "");
$mxiObj->IncludeStatic("form_quequan", "form_quequan.php", "", "", "");
$mxiObj->IncludeStatic("form_thanhvien", "form_thanhvien.php", "", "", "");
$mxiObj->IncludeStatic("form_thongtintimkiem", "form_thongtintimkiem.php", "", "", "");
$mxiObj->IncludeStatic("form_tintuc", "form_tintuc.php", "", "", "");
$mxiObj->IncludeStatic("list_chunha", "list_chunha.php", "", "", "");
$mxiObj->IncludeStatic("list_hopdong", "list_hopdong.php", "", "", "");
$mxiObj->IncludeStatic("list_huongnha", "list_huongnha.php", "", "", "");
$mxiObj->IncludeStatic("list_loainha", "list_loainha.php", "", "", "");
$mxiObj->IncludeStatic("list_nghenghiep", "list_nghenghiep.php", "", "", "");
$mxiObj->IncludeStatic("list_nguoithue", "list_nguoithue.php", "", "", "");
$mxiObj->IncludeStatic("list_nhadat", "list_nhadat.php", "", "", "");
$mxiObj->IncludeStatic("list_nhanvien", "list_nhanvien.php", "", "", "");
$mxiObj->IncludeStatic("list_quan", "list_quan.php", "", "", "");
$mxiObj->IncludeStatic("list_quangcao", "list_quangcao.php", "", "", "");
$mxiObj->IncludeStatic("list_quequan", "list_quequan.php", "", "", "");
$mxiObj->IncludeStatic("list_thongtintimkiem", "list_thongtintimkiem.php", "", "", "");
$mxiObj->IncludeStatic("list_tintuc", "list_tintuc.php", "", "", "");
$mxiObj->IncludeStatic("baocao", "baocao.php", "", "", "");
$mxiObj->IncludeStatic("", "gioithieu.php", "", "", "");
$mxiObj->IncludeStatic("list_thanhvien", "list_thanhvien.php", "", "", "");
// End Include Multiple Static Pages
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $mxiObj->getTitle(); ?></title>
<link href="../css/Trangtri.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="<?php echo $mxiObj->getKeywords(); ?>" />
<meta name="description" content="<?php echo $mxiObj->getDescription(); ?>" />
<base href="<?php echo mxi_getBaseURL(); ?>" />
</head>

<body style="margin:0">
<div id="admin">
  <div id="banner"><img src="../images_gd/banner_admin2.gif" width="980" height="130" /></div>
  <div id="menu">
    <?php
  mxi_includes_start("menu_admin.php");
  require(basename("menu_admin.php"));
  mxi_includes_end();
?></div>
  <div id="center">
    <?php
  $incFileName = $mxiObj->getCurrentInclude();
  if ($incFileName !== null)  {
    mxi_includes_start($incFileName);
    require(basename($incFileName)); // require the page content
    mxi_includes_end();
}







?></div>
  <div id="footer">
    <span class="chu">Copyright@ 2010<br />
    Design by : daica_ede - Email : cnkhanhdl@gmail.com</span>
  </div>
</div>
</body>
</html>
