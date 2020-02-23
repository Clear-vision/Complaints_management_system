<?php
include("../admin/include/config.php");
if(!empty($_POST["email"])) {
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	
		$result = mysqli_query($con,"SELECT userEmail FROM tbl_student WHERE userEmail='$email'");
		$count = mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
