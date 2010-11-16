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

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_conn_qlnd);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Trangtri.css" rel="stylesheet" type="text/css" />
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<link href="css/link.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center" id="wellcome_user">
Chào mừng <span class="chu4_gachchan"><?php echo $_SESSION['kt_login_user']; ?></span>  đã trở lại !<br />
    <?php
//Show If User Is Logged In (region2)
$isLoggedIn1 = new tNG_UserLoggedIn($conn_conn_qlnd);
//Grand Levels: Level
$isLoggedIn1->addLevel("2");
if ($isLoggedIn1->Execute()) {
?>
       <span class="lienket"><a href="index_tintuc.php?mod=dangnha">[Đăng Nhà]</a></span> </span>
      <?php
}
//End Show If User Is Logged In (region2)
?>
    <?php
//Show If User Is Logged In (region1)
$isLoggedIn = new tNG_UserLoggedIn($conn_conn_qlnd);
//Grand Levels: Level
$isLoggedIn->addLevel("1");
if ($isLoggedIn->Execute()) {
?>
      <span class="lienket1"><a href="admin/admin.php"> [Quản Lý] </a></span>
      <?php
}
//End Show If User Is Logged In (region1)
?>
      <?php
//Show If User Is Logged In (region3)
$isLoggedIn2 = new tNG_UserLoggedIn($conn_conn_qlnd);
//Grand Levels: Level
$isLoggedIn2->addLevel("2");
if ($isLoggedIn2->Execute()) {
?>
        <span class="lienket1"><a href="index_tintuc.php?mod=thongtincanhan&amp;ID_ThanhVien=<?php echo $_SESSION['kt_login_id']; ?>">[ThôngTin]</a></span>
        <?php
}
//End Show If User Is Logged In (region3)
?>    <br />
<span class="lienket1"><a href="<?php echo $logoutTransaction->getLogoutLink(); ?>">[Thoát]</a></span>
</div>
</body>
</html>
