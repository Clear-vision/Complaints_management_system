<?php
session_start();
require 'include/config.php';
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}

if (isset($_POST["submit"])) {
	
	    $staff_name = mysqli_real_escape_string($con, $_POST["username"]);
		$staff_email = mysqli_real_escape_string($con, $_POST["staff_email"]);
		$staff_password = mysqli_real_escape_string($con, $_POST["password"]);
		$password = password_hash($staff_password, PASSWORD_DEFAULT);
		
		$department_id = mysqli_real_escape_string($con, $_POST["department_id"]);
		$status = 1;
		
		$query = "INSERT INTO staff(username, email, password, department_id, status) VALUES('$staff_name','$staff_email', '$password', '$department_id', '$status')";

		if (mysqli_query($con,$query)) {
			
			echo '<script>

                            alert("Registration Completed")
			</script>';
			header("Refresh:1; manage_staff.php");
		}else{
             
             echo '<script>

                            alert("Registration failed");
			</script>';

		}

	
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add_staff</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add Staff</h3>
							</div>
							<div class="module-body">


									<br />

 <form class="form-group style-form" method="post" name="profile" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Staff Name</label>
<div class="col-sm-4">
<input type="text" name="username" required  class="form-control" >
 </div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Email </label>
 <div class="col-sm-4">
<input type="email" name="staff_email" required class="form-control" />
</div>
 </div>

<?php

$query_dep = mysqli_query($con, "SELECT * FROM department");


	
	?>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Department</label>
 <div class="col-sm-4">
<select required name="department_id">

	<?php

	while($row = mysqli_fetch_assoc($query_dep)){

?>
	<option value="<?php echo $row["id"]; ?>" ><?php echo $row["department_name"]; ?></option>

	<?php

}

?>
</select>
</div>
</div>

<?php



?>

<div class="form-group">
 <label class="col-sm-2 col-sm-2 control-label">Staff Password</label>
<div class="col-sm-4">
<input type="password" name="password" required class="form-control" />
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-10">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>

						
</div>
</div>
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	
</body>