<?php
session_start();
require 'include/config.php';

if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}

if (isset($_POST["submit"])) {
	
	    $student_name = mysqli_real_escape_string($con, $_POST["fullname"]);
		$student_email = mysqli_real_escape_string($con, $_POST["student_email"]);
		$contact_number = mysqli_real_escape_string($con, $_POST["contact_number"]); 
        $address = mysqli_real_escape_string($con, $_POST["address"]);
		$faculty = mysqli_real_escape_string($con, $_POST["faculty"]);
		$program = mysqli_real_escape_string($con, $_POST["program"]);
		$student_registration_number = mysqli_real_escape_string($con, $_POST["st_registration_number"]);
		$student_password = mysqli_real_escape_string($con, $_POST["password"]);
		$status = 1;
		$password = password_hash($student_password, PASSWORD_DEFAULT);
		$query = "INSERT INTO tbl_student(fullName, userEmail, password, contactNo, address, faculty, program, student_registration_no, status) VALUES('$student_name','$student_email', '$password', '$contact_number', '$address', '$faculty', '$program', '$student_registration_number', $status)";

		if (mysqli_query($con,$query)) {
			
			echo '<script>

                            alert("Registration Completed")
			</script>';
			header("Refresh:1; manage-users.php");
		}

	
}

/*if (isset($_POST["login"])) {
	
	if (empty($_POST["username"]) || empty($_POST["password"])) {
		
		echo '<script> alert("Both Fields are required")</script>';
	}else{

		$username = mysqli_real_escape_string($connect, $_POST["username"]);
		$password = mysqli_real_escape_string($connect, $_POST["password"]);
		$query = "SELECT * FROM tbl_user WHERE username = '$username'";
		$result = mysqli_query($connect, $query);
		if (mysqli_num_rows($result) > 0) {
			
                while ($row = mysqli_fetch_array($result)) {
                	
                	if (password_verify($password, $row["password"])) {
                		
                                   //return true;
                		$_SESSION["username"] = $username;
                		header("Location: manage-users.php.php");
                	}else{

                		//return false;
                		echo '<script>alert("Wrong User Details")</script>';

                	}
                }
		}else{
			echo '<script>alert("Wrong User Details")</script>';
		}
	}
}*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add_student</title>
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
								<h3>Add Student</h3>
							</div>
							<div class="module-body">


									<br />

 <form class="form-group style-form" method="post" name="profile" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Full Student Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" required  class="form-control" >
 </div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Student Email </label>
 <div class="col-sm-4">
<input type="email" name="student_email" required class="form-control" />
</div>
 </div>

<div class="form-group">
 <label class="col-sm-2 col-sm-2 control-label">student Password</label>
<div class="col-sm-4">
<input type="password" name="password" required class="form-control" />
</div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Contact Number</label>
 <div class="col-sm-4">
<input type="tel" name="contact_number" required  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Address </label>
<div class="col-sm-4">
<textarea  name="address" required class="form-control"></textarea>
</div>
</div>


<?php

$query_fac = mysqli_query($con, "SELECT * FROM faculty");


	
	?>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Faculty</label>
 <div class="col-sm-4">
<select required name="faculty">

	<?php

	while($row = mysqli_fetch_assoc($query_fac)){

?>
	<option value="<?php echo $row["facultyName"]; ?>" ><?php echo $row["facultyName"]; ?></option>

	<?php

}

?>
</select>
</div>
</div>

<?php



?>




<?php

$query_pro = mysqli_query($con, "SELECT * FROM program");


	
	?>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Program</label>
 <div class="col-sm-4">
<select required name="department_name">

	<?php

	while($row = mysqli_fetch_assoc($query_pro)){

?>
	<option value="<?php echo $row["program"]; ?>" ><?php echo $row["program_name"]; ?></option>

	<?php

}

?>
</select>
</div>
</div>

<?php



?>



<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Registration Number</label>
<div class="col-sm-4">
<input type="text" name="st_registration_number" maxlength="16" required  class="form-control" />
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