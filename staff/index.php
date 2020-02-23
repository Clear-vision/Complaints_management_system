<?php
session_start();
error_reporting(0);
include("../admin/include/config.php");
if(isset($_POST['submit']))
{
	/*$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = md5(mysqli_real_escape_string($con,$_POST['password']));
$ret = mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num = mysqli_fetch_array($ret);*/
$errormsg = '';
$username = mysqli_real_escape_string($con, $_POST["username"]);

$password = mysqli_real_escape_string($con, $_POST["password"]); 

$query = mysqli_query($con,"SELECT * FROM staff WHERE username = '$username'");

if (mysqli_num_rows($query) > 0) {
			
                while ($num = mysqli_fetch_array($query)) {
                	
                	if (password_verify($password, $num["password"])) {


$extra = "dashboard.php";//

$_SESSION['alogin'] =  mysqli_real_escape_string($con, $_POST['username']);
$_SESSION['id'] = $num['id'];
$_SESSION['department'] = $num['department_id'];
$_SESSION['name'] = $num['username'];
$host = $_SERVER['HTTP_HOST'];
$uip = $_SERVER['REMOTE_ADDR'];
$status = 1;
$log = mysqli_query($con,"INSERT INTO userlog(uid,username,userip,status) VALUES('".$_SESSION['id']."','".$_SESSION['alogin']."','$uip','$status')");
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
$errormsg = "Invalid username or password";
$extra = "index.php";

}
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="John Lukondo">
	<title>CMS | Staff login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
 
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.php">
			  		COMPLAINT MANAGEMENT SYSTEM
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li class="portal"><a href="../" style="color: #111;text-shadow: none;">
						Back to Portal
						
						</a></li>

						

						
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="post">
						<div class="module-head">
							<h3>Staff Sign In</h3>
						</div>
						<span style="color:red; margin: 7px;" ><?php echo $errormsg; ?></span>

						
                                      <?php if (isset($_SESSION["slogout"]) && !empty($_SESSION["slogout"])) {
		        			
		        		 echo  '<p style="padding-left:4%; padding-top:2%;  color:green">'.$_SESSION["slogout"].'</p>'; 
		        		}
		        		?>

						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="username" placeholder="Username" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
						<input class="span12" type="password" id="inputPassword" name="password" placeholder="Password" required>
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>
									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<?php include 'include/footer.php'; ?>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>