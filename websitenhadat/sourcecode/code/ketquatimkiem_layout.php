<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/link.css" rel="stylesheet" type="text/css" />
<link href="css/nhadat.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="ketquatimkiem_layout">
	<div id="ketquatimkiem_top">KẾT QUẢ TÌM KIẾM</div>
	<div id="ketquatimkiem_cen">
	<?php
	  if($_GET["loainha"]!="0" && $_GET["quan"]=="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]=="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )
	{
?>
    <?php
  mxi_includes_start("ketquatimkiem_loainha.php");
  require(basename("ketquatimkiem_loainha.php"));
  mxi_includes_end();
?>
<?php
}
	 if($_GET["loainha"]!="0" && $_GET["quan"]!="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]=="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )
	{
?>
<?php
  mxi_includes_start("ketquatimkiem_loainha_quan.php");
  require(basename("ketquatimkiem_loainha_quan.php"));
  mxi_includes_end();
?>
<?php
}
if($_GET["loainha"]=="0" && $_GET["quan"]=="0" && $_GET["sophongtam"]!="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]=="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )
	{
?>
<?php
  mxi_includes_start("ketquatimkiem_phongtam.php");
  require(basename("ketquatimkiem_phongtam.php"));
  mxi_includes_end(); 
?>
<?php
}
if($_GET["loainha"]=="0" && $_GET["quan"]=="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]!="0" && $_GET["tieude"]=="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )	{
?>
<?php
  mxi_includes_start("ketquatimkiem_phongngu.php");
  require(basename("ketquatimkiem_phongngu.php"));
  mxi_includes_end();
?>
<?php
}
if($_GET["loainha"]=="0" && $_GET["quan"]!="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]=="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )
	{
?>
<?php
  mxi_includes_start("ketquatimkiem_quan.php");
  require(basename("ketquatimkiem_quan.php"));
  mxi_includes_end();
?>
<?php
}
if($_GET["loainha"]=="0" && $_GET["quan"]=="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]=="" && $_GET["giamin"]!="0" && $_GET["giamax"]!="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )
	{
?>
<?php
  mxi_includes_start("ketquatimkiem_giaca.php");
  require(basename("ketquatimkiem_giaca.php"));
  mxi_includes_end();
?>

<?php
}
if($_GET["loainha"]=="0" && $_GET["quan"]=="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]!="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]=="" && $_GET["dtmax"]=="" )
	{
?>
<?php
  mxi_includes_start("ketquatimkiem_tieude.php");
  require(basename("ketquatimkiem_tieude.php"));
  mxi_includes_end();
?>
<?php
}
if($_GET["loainha"]=="0" && $_GET["quan"]=="0" && $_GET["sophongtam"]=="0" && $_GET["sophongngu"]=="0" && $_GET["tieude"]=="" && $_GET["giamin"]=="0" && $_GET["giamax"]=="0" && $_GET["dtmin"]!="" && $_GET["dtmax"]!="" )
	{
?>
<?php
  mxi_includes_start("ketquatimkiem_dientich.php");
  require(basename("ketquatimkiem_dientich.php"));
  mxi_includes_end();
?>
<?php
}
?>
</div>
<div id="bot"><span class="lienket3"><a href="index_noidung.php?mod=timkiem">Trở về</a></span></div>
</div>
</body>
</html>
