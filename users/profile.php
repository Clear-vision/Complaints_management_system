<?php
session_start();
error_reporting(0);
include("../admin/include/config.php");
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('UTC');// change according timezone
$currentTime = date( 'd-m-Y h:i:s', time () );


if(isset($_POST['submit']))
{
 $successmsg = '';
 $errormsg = '';
  
$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
$address = mysqli_real_escape_string($con,$_POST['address']);


$query = mysqli_query($con,"UPDATE tbl_student SET fullName = '$fullname', contactNo = '$contact_number', address = '$address' WHERE student_registration_no = '".$_SESSION['login']."'");
if($query)
{
$successmsg = "Profile Successfully Updated";
}
else
{
$errormsg = "Profile not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include 'includes/meta.php'; ?>
    <title>CMS | User Change Password</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Profile info</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt row-height">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if(isset($successmsg))
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }else{?>

   <?php if(isset($errormsg))
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Ooh!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }}?>
 <?php $query = mysqli_query($con,"SELECT * FROM tbl_student WHERE student_registration_no ='".$_SESSION['login']."'");
 while($row = mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullName']);?>'s Profile</h4>
    <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>
                      <form class="form-horizontal style-form" method="post" name="profile" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullName']);?>" class="form-control" >
 </div>
<label class="col-sm-2 col-sm-2 control-label">User Email </label>
 <div class="col-sm-4">
<input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control" readonly>
</div>
 </div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Contact Number</label>
 <div class="col-sm-4">
<input type="text" name="contact_number" required value="<?php echo htmlentities($row['contactNo']); ?>" class="form-control">
</div>

<label class="col-sm-2 col-sm-2 control-label">Address </label>
<div class="col-sm-4">
<textarea  name="address" required="required" class="form-control"><?php echo htmlentities($row['address']);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Faculty</label>
<div class="col-sm-4">
<input name="faculty" value="<?php echo htmlentities($row['faculty']);?>" class="form-control" readonly />

</div>

<label class="col-sm-2 col-sm-2 control-label">Program </label>
<div class="col-sm-4">
<input type="text" name="program" required value="<?php echo htmlentities($row['program']);?>" class="form-control" readonly />
</div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Registration Number</label>
<div class="col-sm-4">
<input type="text" name="st_registration_number" maxlength="16" required value="<?php echo htmlentities($row['student_registration_no']);?>" class="form-control" readonly />
</div>

<label class="col-sm-2 col-sm-2 control-label">Registration Date </label>
<div class="col-sm-4">
<input type="text" name="regdate" required="required" value="<?php echo htmlentities(date('F d, Y - h:i:s A',strtotime($row['regDate'])));?>" class="form-control" readonly />
 </div>
</div>


<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Update</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
