<?php
session_start();
include("../admin/include/config.php");
$_SESSION['login']=="";
date_default_timezone_set('UTC');
$ldate=date( 'd-m-Y h:i:s', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE username = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['ulogout'] = "You have successfully logout";

?>
<script language="javascript">
document.location="index.php";
</script>
