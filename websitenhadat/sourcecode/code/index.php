<?php require_once('Connections/conn_qlnd.php'); ?>
<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make unified connection variable
$conn_conn_qlnd = new KT_connection($conn_qlnd, $database_conn_qlnd);
?>
 <!--
 <DIV id=divAdLeft 
      style="LEFT: -100px; WIDTH: 100px; POSITION: absolute; TOP: 71px">
	  <A 
      href="index.php" target=_blank><IMG alt="" src="images_gd/qc_haiben_01.gif" border="0" height="485" width="100"></A>
 </DIV>	
 <DIV id=divAdRight 
      style="RIGHT: -100px; WIDTH: 100px; POSITION: absolute; TOP: 71px">
	  <A 
      href="index.php" target=_blank><IMG alt="" src="images_gd/qc_haiben_01.gif" border="0" height="485" width="100"></A>
 </DIV>
 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/trangtri_index.css" rel="stylesheet" type="text/css" />
<link href="css/link.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="p7ttm/p7TTMscripts.js"></script>
<link href="p7ttm/p7TTM01.css" rel="stylesheet" type="text/css" media="all" />
</head>
<!--da fix loi hinh anh-->
<body onLoad="goforit();" bgcolor="#CCCCCC" style=" margin:0">
<!--banner and menu-->
   <table align="center" width="800" cellpadding="0" cellspacing="0" border="0">
      <tr>
      <td><?php
  mxi_includes_start("banner.php");
  require(basename("banner.php"));
  mxi_includes_end();
?>
</td>
</tr>
<tr>
<td><?php
  mxi_includes_start("menu.php");
  require(basename("menu.php"));
  mxi_includes_end();
?>
</td>
</tr>
</table>
<!--///////////////////-->


<!--center-->
<table width="800" align="center" cellpadding="0" cellspacing="0" style="background-image:url(images_gd/nen_center.gif)">
	<tr>
    	<td>
         
         <table width="780" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="550" valign="top">
    <!--menu-->
    <table class="can_top_table" align="center" width="500" height="40" border="0" cellpadding="0" cellspacing="0" background="images_gd/nen_menuduoi.gif">
   		<tr>
        	<td align="center"><span class="lienket"><a href="index.php">Trang Chủ&nbsp;</a></span>|&nbsp;<span class="lienket"><a href="index_noidung.php?mod=timkiem">Tim Kiếm</a></span> | <span class="lienket"><a href="index_tintuc.php?mod=tintucngang">Tin Tức </a></span>| <span class="lienket"><a href="index_tintuc.php?mod=thongke">Thống Kê&nbsp;</a></span>|&nbsp;<span class="lienket"><a href="index_tintuc.php?mod=lienhe">Liên Hệ</a></span> | <span class="lienket"><a href="index_tintuc.php?mod=yeucaunha">Đăng Yêu Cầu Nhà</a></span></td>
        </tr>
    </table>
    <!--////////////////////////-->
    
    <!--bang tin tieu bieu-->
    <table class="can_top_table" width="550" cellpadding="0" cellspacing="0" border="0">
        	<tr>
            <td height="32" align="center" background="images_gd/trai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Tin Tiêu Biểu</span></td>
            </tr>
            <tr>
            <td width="535" background="images_gd/trai_giua.gif" style="background-repeat:repeat-y; padding-left:15px; padding-top:10px"><?php
  mxi_includes_start("inc_buy_new.php");
  require(basename("inc_buy_new.php"));
  mxi_includes_end();
?>
</td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/trai_duoi.gif" />
            </td>
            </tr>
    </table>
    <!--//////////////////////////////////////-->
    
    <table class="can_top_table" width="550" cellpadding="0" cellspacing="0" border="0">
        	<tr>
            <td align="center"><marquee behavior="alternate" direction="left" scrollamount="10" scrolldelay="100">
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','510','height','102','src','images_gd/hinh_chay-000001','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','images_gd/hinh_chay-000001' ); //end AC code
              </script>
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','510','height','102','src','images_gd/hinh_chay-000001','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','images_gd/hinh_chay-000001' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="510" height="102">
                <param name="movie" value="images_gd/hinh_chay-000001.swf" />
                <param name="quality" value="high" />
                <embed src="images_gd/hinh_chay-000001.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="510" height="102"></embed>
              </object></noscript>
              </noscript>  
            </marquee> </td>
            </tr>
    </table>
    
    
    <!--bang thong tin nha dat-->
    <table class="can_top_table" width="550" cellpadding="0" cellspacing="0" border="0">
        	<tr>
            <td height="32" align="center" background="images_gd/trai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Thông Tin Nhà Đất Mới</span></td>
            </tr>
            <tr>
            <td width="530" background="images_gd/trai_giua.gif" style="background-repeat:repeat-y; padding-left:20px"><?php
  mxi_includes_start("nhachothue.php");
  require(basename("nhachothue.php"));
  mxi_includes_end();
?>
</td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/trai_duoi.gif" />
            </td>
            </tr>
    </table>
    <!--/////////////////////////////-->
    
    </td>
    <td width="230" valign="top">
     
     
     
     <!--bang dang nhap-->
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td height="30" align="center" background="images_gd/phai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Đăng Nhập</span></td>
            </tr>
            <tr>
            <td align="center" background="images_gd/phai_giua.gif" style="background-repeat:repeat-y"><br />
    
<?php
//Show If User Is Logged In (region1)
$isLoggedIn = new tNG_UserLoggedIn($conn_conn_qlnd);
//Grand Levels: Level
$isLoggedIn->addLevel("1");
$isLoggedIn->addLevel("2");
if ($isLoggedIn->Execute()) {
?>
    <?php
  mxi_includes_start("wellcome_user.php");
  require(basename("wellcome_user.php"));
  mxi_includes_end();
?>
    <?php 
// else Show If User Is Logged In (region1)
} else { ?>
              <?php
  mxi_includes_start("login.php");
  require(basename("login.php"));
  mxi_includes_end();
?>
  <?php
}
//End Show If User Is Logged In (region1)
?></td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/phai_duoi.gif" />            </td>
            </tr>
    </table>
    <!--het ///////////////////////////////-->    
    
    <!--bang lay gia vang-->
<table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td><?php
  mxi_includes_start("laygiavang.php");
  require(basename("laygiavang.php"));
  mxi_includes_end();
?></td>
            </tr>
    </table>
    <!--het bang ho tro truc tuyen--> 
     
      <!--bang gia vang-->
      <!--//////////////////////////////-->
      
         <!--bang ho tro truc tuyen-->
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td height="30" align="center" background="images_gd/phai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Hỗ Trợ</span></td>
            </tr>
            <tr>
            <td align="center" background="images_gd/phai_giua.gif" style="background-repeat:repeat-y"><?php
  mxi_includes_start("hotrotructuyen.php");
  require(basename("hotrotructuyen.php"));
  mxi_includes_end();
?></td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/phai_duoi.gif" />
            </td>
            </tr>
    </table>
    <!--het bang ho tro truc tuyen--> 
      
      
      <!--bang thong ke-->
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td height="30" align="center" background="images_gd/phai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Thống Kê</span></td>
            </tr>
            <tr>
              <td align="center" background="images_gd/phai_giua.gif" style="background-repeat:repeat-y"><?php
  mxi_includes_start("thongkethanhvien_online.php");
  require(basename("thongkethanhvien_online.php"));
  mxi_includes_end();
?></td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/phai_duoi.gif" />            </td>
            </tr>
    </table>
    <!--//////////////////////////--> 
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td align="center">
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','120','height','121','src','images/nackvision_timer03','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','images/nackvision_timer03' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="120" height="121">
                <param name="movie" value="images/nackvision_timer03.swf" />
                <param name="quality" value="high" />
                <embed src="images/nackvision_timer03.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="120" height="121"></embed>
              </object></noscript></td>
            </tr>
    </table>
     
     </td>
  </tr>
</table>
         
         
        </td>
    </tr>
</table>
<!--//////////////////////-->


<!--footer-->

<table width="800" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
    	<td>
        	<img src="images_gd/nen_footer.gif" />
        </td>
    </tr>
</table>
<!--///////////////////-->
<SCRIPT language=JavaScript>
	function FloatTopDiv()
	{
		startX = document.body.clientWidth - 106, startY = 71;
		var ns = (navigator.appName.indexOf("Netscape") != -1);
		var d = document;

		if (document.body.clientWidth < 980) startX = -106;


		function ml(id)
		{
			var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
			if(d.layers)el.style=el;
			el.sP=function(x,y){this.style.left=x;this.style.top=y;};
			el.x = startX;
			el.y = startY;
			return el;
		}

		window.stayTopLeft=function()
		{

			if (document.body.clientWidth < 980)
			{
				ftlObj.x = - 110;ftlObj.y = 0;	ftlObj.sP(ftlObj.x, ftlObj.y);
			}

			else
			{
			if (document.documentElement && document.documentElement.scrollTop)
				var pY = ns ? pageYOffset : document.documentElement.scrollTop;
			else if (document.body)
				var pY = ns ? pageYOffset : document.body.scrollTop;

			if (document.body.scrollTop > 71){startY = 3} else {startY = 71};

			if (document.body.clientWidth >= 1024)
			{
				ftlObj.x = document.body.clientWidth - 110;ftlObj.y += (pY + startY - ftlObj.y)/32;ftlObj.sP(ftlObj.x, ftlObj.y);
			}
			else
			{


			ftlObj.x  = startX;
			ftlObj.y += (pY + startY - ftlObj.y)/32;
			ftlObj.sP(ftlObj.x, ftlObj.y);
			}
			}
			setTimeout("stayTopLeft()", 1);
		}

		ftlObj = ml("divAdRight");
		stayTopLeft();

	}
function FloatTopDiv2()
	{
		startX2 = document.body.clientWidth - 1004, startY2 = 71;
		var ns2 = (navigator.appName.indexOf("Netscape") != -1);
		var d2 = document;

		if (document.body.clientWidth < 980) startX2 = -110;


		function ml2(id)
		{
			var el2=d2.getElementById?d2.getElementById(id):d2.all?d2.all[id]:d2.layers[id];
			if(d2.layers)el2.style=el2;
			el2.sP=function(x,y){this.style.left=x;this.style.top=y;};
			el2.x = startX2;
			el2.y = startY2;
			return el2;
		}

		window.stayTopLeft2=function()
		{
			if (document.body.clientWidth < 980)
			{
				ftlObj2.x = - 110;ftlObj2.y = 0;	ftlObj2.sP(ftlObj2.x, ftlObj2.y);
			}
			else
			{
			if (document.documentElement && document.documentElement.scrollTop)
				var pY2 = ns2 ? pageYOffset : document.documentElement.scrollTop;
			else if (document.body)
				var pY2 = ns2 ? pageYOffset : document.body.scrollTop;

			if (document.body.scrollTop > 71){startY2 = 3} else {startY2 = 71};

			if (document.body.clientWidth >= 1024)
			{
				ftlObj2.x =  0;ftlObj2.y += (pY2 + startY2 - ftlObj2.y)/32;	ftlObj2.sP(ftlObj2.x, ftlObj2.y);
			}
			else
			{



			ftlObj2.x  = startX2;
			ftlObj2.y += (pY2 + startY2 - ftlObj2.y)/32;
			ftlObj2.sP(ftlObj2.x, ftlObj2.y);
			}
			}
			setTimeout("stayTopLeft2()", 1);
		}

		ftlObj2 = ml2("divAdLeft");
		stayTopLeft2();

	}


	function ShowAdDiv()
	{
		var objAdDivLeft  = document.getElementById("divAdLeft");
		var objAdDivRight = document.getElementById("divAdRight");
		if (document.body.clientWidth < 980)
		{
			objAdDivLeft.style.left  = - 110;
			objAdDivRight.style.left = - 110;
		}

		else
		{
			objAdDivLeft.style.left  = 0;
			objAdDivRight.style.left = document.body.clientWidth - 110;
		}
		FloatTopDiv();
		FloatTopDiv2();
	}
	ShowAdDiv();

</SCRIPT>


</body>
</html>
