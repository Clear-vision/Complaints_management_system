<?php
session_start();
include("../admin/include/config.php");
$_SESSION['alogin']=="";
date_default_timezone_set('UTC');
$ldate  = date( 'd-m-Y h:i:s', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE username = '".$_SESSION['alogin']."' ORDER BY id DESC LIMIT 1");
session_unset();
session_destroy();
$_SESSION['slogout'] = "You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
