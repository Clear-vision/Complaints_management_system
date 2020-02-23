<?php
session_start();
error_reporting(0);
include("../admin/include/config.php");
if(isset($_POST['submit']))
{
 
$errormsg = '';
$registration_number = mysqli_real_escape_string($con, $_POST["registration_number"]);

$password = mysqli_real_escape_string($con, $_POST["password"]); 

$query = mysqli_query($con,"SELECT * FROM tbl_student WHERE student_registration_no = '$registration_number'");

if (mysqli_num_rows($query) > 0) {
			
                while ($row = mysqli_fetch_array($query)) {
                	
                	if (password_verify($password, $row["password"])) {



$extra = "dashboard.php";//
$_SESSION['login'] = mysqli_real_escape_string($con, $_POST['registration_number']);
$_SESSION['id'] = $row['id'];
$host = $_SERVER['HTTP_HOST'];
$uip = $_SERVER['REMOTE_ADDR'];
$status = 1;
$log = mysqli_query($con,"INSERT INTO userlog(uid,username,userip,status) VALUES('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

else
{
$_SESSION['login'] = $_POST['username'];	
$uip = $_SERVER['REMOTE_ADDR'];
$status = 0;
mysqli_query($con,"INSERT INTO userlog(username,userip,status) VALUES('".$_SESSION['login']."','$uip','$status')");
$errormsg = "Invalid registration number or password";
$extra = "index.php";

}
}
}
}

if(isset($_POST['change']))
{
   $msg = '';	
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $registration_number = mysqli_real_escape_string($con, $_POST['registration_number']);


$query = mysqli_query($con,"SELECT * FROM tbl_student WHERE userEmail='$email' AND student_registration_no = '$registration_number'");
$num = mysqli_fetch_array($query);
if($num > 0)
{
	$password = mysqli_real_escape_string($con, $_POST['password']);
   $password_hash = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($con,"UPDATE tbl_student SET password ='$password_hash' WHERE userEmail='$email' AND student_registration_no = '$registration_number' ");
$msg = "Password Changed Successfully";

}
else
{
$errormsg = "Invalid email id or Registration_number";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php  include 'includes/meta.php'; ?>
    <title>CMS | User Login</title>
    <meta name="author" content="John Lukondo">

   <?php  include 'includes/links.php';  ?>
<script type="text/javascript">
function valid()
{
 if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
return true;
}
</script>
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">


	  	<header class="header black-bg">
              
            <!--logo start-->
            
            <b class="cms-title">Complaint Management System</b>            
                
           

        </header>


	  	<div class="container">

	  		<div class="row-h">
	  	
		      <form class="form-login" name="login" method="post">
		        <h2 class="form-login-heading"> STUDENT LOGIN</h2>
		        <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if(isset($errormsg)){
echo $errormsg;
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if(isset($msg)){
echo $msg;
		        		}?></p>

		        		<?php if (isset($_SESSION["ulogout"]) && !empty($_SESSION["ulogout"])) {
		        			
		        		 echo  '<p style="padding-left:4%; padding-top:2%;  color:green">'.$_SESSION["ulogout"].'</p>'; 
		        		}
		        		?>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="registration_number" placeholder="Registration Number"  required autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" required placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>

		            </label>
		             <hr>
		            <button class="btn btn-primary btn-block" name="submit" type="submit"><i class="glyphicon glyphicon-log-in"> </i> LOGIN </button>
		           
		           </form>
		           
		
		        </div>
		
		          <!-- Modal -->
		           <form class="form-login" name="forgot" method="post">
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your details below to reset your password.</p>
<input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br >
<input type="text" name="registration_number" placeholder="Registration_number" autocomplete="off" class="form-control" required><br>
 <input type="password" class="form-control" placeholder="New Password" id="password" name="password"  required ><br />
<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required >

		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-primary" type="submit" name="change" onclick="return valid();">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>
		
		      	  </div>	
	  	
	  	</div>

	  	 <?php include("includes/login-footer.php");?>
	  	 
	  </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <!-- <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
 -->

  </body>
</html>
