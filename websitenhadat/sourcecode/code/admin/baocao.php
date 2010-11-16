<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/Trangtri.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../includes/resources/calendar.js"></script>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<form action="admin.php?mod=ketquabaocao" name="ketquabaocao" method="get">
<div align="center">
  <br />
  <p class="chu1"><span class="chu1Copy">KẾT QUẢ BÁO CÁO ĐỊNH KÌ</span><br />
  </p>
  
  <table width="500" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="26" colspan="2" align="left" class="chu3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Từ  
        <label>
        <input name="to" id="to" value="" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:mondayfirst="true" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
        </label>
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đến&nbsp; 
        <input name="from" id="from" value="" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:mondayfirst="true" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
        </label></td>
    </tr>
    
    <tr>
      <td height="26" colspan="2" align="right"><label>
      <input name="mod" type="hidden" id="mod" value="ketquabaocao" />
      <input type="submit" class="chu4" id="ketquabaocao" value="Xem"/>
      </label>
      <br /></td>
    </tr>
  </table>
  <br />
</div>
</form>
</body>
</html>