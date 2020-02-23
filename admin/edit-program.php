<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('UTC');// change according timezone
$currentTime = date( 'd-m-Y h:i:s', time () );


if(isset($_POST['submit']))
{
	
	$program = mysqli_real_escape_string($con,$_POST['program']);
	$id = intval($_GET['id']);
$sql = mysqli_query($con,"UPDATE program SET program_name = '$program', 
	updationDate = '$currentTime' WHERE id = '$id'");
$_SESSION['msg']="Program Updated";

header("Refresh:2; program.php");

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit Program</title>
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
								<h3>Edit Program</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid"  method="post" >
<?php
$id = intval($_GET['id']);
$query = mysqli_query($con,"SELECT faculty.id, faculty.facultyName,
	                        program.program_name FROM program 
	                        join faculty 
	                        on faculty.id = program.faculty_id
	                         WHERE program.id = '$id'");
while($row = mysqli_fetch_array($query))
{
?>		

<div class="control-group">
<label class="control-label" for="basicinput">Faculty</label>
<div class="controls">
<select name="department" class="span8 tip" required>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($faculty_name = $row['facultyName']);?></option>
<?php $query1 = mysqli_query($con,"SELECT * FROM faculty");
while($result = mysqli_fetch_array($query1))
{
	$faculty = $result['facultyName'];
if($faculty_name = $faculty)
{
	continue;
}
else{
?>
<option value="<?php echo $result['id'];?>"><?php echo $result['facultyName'];?></option>
<?php } }?>
</select>
</div>
</div>




<div class="control-group">
<label class="control-label" for="basicinput">Program Name</label>
<div class="controls">
<input type="text" placeholder="Enter Program Name"  name="program" value="<?php echo  htmlentities($row['program_name']);?>" class="span8 tip" required>
</div>
</div>


									<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary">Update</button>
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
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>