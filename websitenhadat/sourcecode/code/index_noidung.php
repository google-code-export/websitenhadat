<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');

// Include Multiple Static Pages
$mxiObj = new MXI_Includes("mod");
$mxiObj->IncludeStatic("timkiem", "timkiem.php", "", "", "");
$mxiObj->IncludeStatic("chitietnhadat", "chitietnhadat.php", "", "", "");
$mxiObj->IncludeStatic("yeucaunha", "yeucaunha.php", "", "", "");
$mxiObj->IncludeStatic("search", "ketquatimkiem.php", "", "", "");
$mxiObj->IncludeStatic("ketquatimkiem", "ketquatimkiem_layout.php", "", "", "");
// End Include Multiple Static Pages
?>
<!--
<DIV id=divAdLeft 
      style="LEFT: -100px; WIDTH: 90px; POSITION: absolute; TOP: 71px">
	  
	  <A 
      href="#blank" target=_blank><IMG alt="" src="images_gd/qc_haiben_01.gif" border="0" height="485" width="90"></A>
      
 </DIV>	
      <DIV id=divAdRight 
      style="LEFT: -100px; WIDTH: 90px; POSITION: absolute; TOP: 71px">
	  
	  <A 
      href="#blank" target=_blank><IMG alt="" src="images_gd/qc_haiben_01.gif" border="0" height="485" width="90"></A></DIV>
-->      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $mxiObj->getTitle(); ?></title>
<link href="css/trangtri_index.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="<?php echo $mxiObj->getKeywords(); ?>" />
<meta name="description" content="<?php echo $mxiObj->getDescription(); ?>" />
<base href="<?php echo mxi_getBaseURL(); ?>" />
</head>
<body onLoad="goforit();" bgcolor="#CCCCCC" style=" margin:0">
<!--banner and menu-->
   <table align="center" width="800" cellpadding="0" cellspacing="0" border="0">
      <tr>
      <td><?php
  mxi_includes_start("banner_menu.php");
  require(basename("banner_menu.php"));
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
        	<td align="center"><span class="lienket1"><a href="index.php">Trang Chủ </a></span>|&nbsp;<span class="lienket1"><a href="index_noidung.php?mod=timkiem">Tim Kiếm</a></span> |&nbsp;<span class="lienket1"><a href="index_tintuc.php?mod=tintucngang">Tin Tức</a></span>&nbsp;| <span class="lienket1"><a href="index_tintuc.php?mod=thongke">Thống Kê</a></span>&nbsp;| <span class="lienket1"><a href="index_tintuc.php?mod=dangki">Đăng Kí</a></span> | <span class="lienket1"><a href="index_tintuc.php?mod=yeucaunha">Đăng Yêu Cầu Nhà</a></span> </td>
        </tr>
    </table>
    <!--////////////////////////-->
    
    <!--bang tin tieu bieu-->
    <table class="can_top_table" width="550" cellpadding="0" cellspacing="0" border="0">
        	<tr>
            <td height="32" align="center" background="images_gd/trai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Nội Dung</span></td>
            </tr>
            <tr>
              <td width="530" background="images_gd/trai_giua.gif" style="background-repeat:repeat-y; padding-left:20px"><?php
  $incFileName = $mxiObj->getCurrentInclude();
  if ($incFileName !== null)  {
    mxi_includes_start($incFileName);
    require(basename($incFileName)); // require the page content
    mxi_includes_end();
}















?></td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/trai_duoi.gif" />            </td>
            </tr>
    </table>
    <!--//////////////////////////////////////-->

    <!--bang thong tin nha dat-->
    <table class="can_top_table" width="550" cellpadding="0" cellspacing="0" border="0">
        	<tr>
            <td height="32" align="center" background="images_gd/trai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Thông Tin Nhà Đất</span></td>
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
    
<!--/////////////////////////////-->    </td>
    <td width="230" valign="top">
     
 
    
    <!--bang tin tuc-->
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td class="chu_tieude"  height="30" align="center" background="images_gd/phai_tren.gif" style=" background-repeat:no-repeat">Tin Tức</td>
            </tr>
            <tr>
            <td align="center" background="images_gd/phai_giua.gif" style="background-repeat:repeat-y"><?php
  mxi_includes_start("tinhot.php");
  require(basename("tinhot.php"));
  mxi_includes_end();
?></td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/phai_duoi.gif" />
            </td>
            </tr>
    </table>
    <!--het bang tin tuc-->
    
    
     <!--bang ngoai te-->
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td><?php
  mxi_includes_start("laygiavang.php");
  require(basename("laygiavang.php"));
  mxi_includes_end();
?></td>
            </tr>
    </table>
    <!--het ///////////////////////////////--> 
     
      <!--bang quang cao-->
    <table class="can_top_table" width="220" cellpadding="0" cellspacing="0" border="0" align="center">
        	<tr>
            <td height="30" align="center" background="images_gd/phai_tren.gif" style=" background-repeat:no-repeat"><span class="chu_tieude">Quảng Cáo</span></td>
            </tr>
            <tr>
            <td width="210" align="center" background="images_gd/phai_giua.gif" style="background-repeat:repeat-y; padding-left:10px"><?php
  mxi_includes_start("quangcao.php");
  require(basename("quangcao.php"));
  mxi_includes_end();
?></td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/phai_duoi.gif" />
            </td>
            </tr>
    </table>
    <!--//////////////////////////--> 
     
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
?>
</td>
            </tr>
            <tr>
            <td>
            <img src="images_gd/phai_duoi.gif" />
            </td>
            </tr>
    </table>
    <!--//////////////////////////--> 
     
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
