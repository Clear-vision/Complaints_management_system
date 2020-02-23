<?php
session_start();
error_reporting(0);
include("../admin/include/config.php");
if(strlen($_SESSION['login']) == 0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid = $_SESSION['id'];
$department = mysqli_real_escape_string($con,$_POST['department']);
$complaintype = mysqli_real_escape_string($con,$_POST['complaintype']);

$complaintdetails = mysqli_real_escape_string($con,$_POST['complaindetails']);
$compfile = mysqli_real_escape_string($con,$_FILES["compfile"]["name"]);


$target_dir = "complaintdocs/";
$size = mysqli_real_escape_string($con, $_FILES["compfile"]["size"]);

$target_file = $target_dir . basename($compfile);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



 if (isset($compfile) && !empty($compfile)) {
    
  
//allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jepg" && $imageFileType != "gif" && $imageFileType != "mp3" && $imageFileType != "mp4" && $imageFileType != "pdf" && $imageFileType != "xls" && $imageFileType != "docx" && $imageFileType != "ppt" && $imageFileType != "pptx") {
  echo "Sorry, only JPG, JEPG, PNG, GIF, MP3, MP4, PDF, DOCX files are allowed."."<a href='register-complaint.php'>Go Back</a>";
  $uploadOk = 0;
  exit();
}


//check file size
if ($size > 5000000) {
  echo "Sorry, your file is too large."."<a href='register-complaint.php'>Go Back</a>";
  $uploadOk = 0;
  exit();
}


}



move_uploaded_file($_FILES["compfile"]["tmp_name"],$target_dir.$compfile);
$query = mysqli_query($con,"INSERT INTO tblcomplaints(userId, department, complaintType, complaintDetails, complaintFile) VALUES('$uid','$department','$complaintype', '$complaintdetails','$compfile')");

// code for show complaint number
$sql = mysqli_query($con,"SELECT complaintNumber FROM tblcomplaints  ORDER BY complaintNumber DESC LIMIT 1");


while($row = mysqli_fetch_array($sql))
{
 $cmpn = $row['complaintNumber'];
}
$complainno = $cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaint number is  "+"'.$complainno.'")</script>';



header("Refresh:1; dashboard.php");

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'includes/meta.php'; ?>

    <title>CMS | User Register Complaint</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsection.php",
  data:'section_id='+val,
  success: function(data){
    $("#section").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Register Complaint</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>O0h!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Department</label>
<div class="col-sm-4">
<select name="department" id="department" class="form-control" onChange="getCat(this.value);" required>
<option value="">Select Department</option>
<?php $sql = mysqli_query($con,"SELECT id, department_name FROM department");
while ($rw = mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['department_name']);?></option>
<?php
}
?>
</select>
 </div>

 </div>




<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Type</label>
<div class="col-sm-4">
<select name="complaintype" class="form-control" required="">
                <option value="Complaint"> Complaint</option>
                  <option value="General Query">General Query</option>
                </select> 
</div>

</div>



<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Details (max 2000 words) </label>
<div class="col-sm-6">
<textarea  name="complaindetails" required cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Related Doc(<span style="color: green;">if any</span>) </label>
<div class="col-sm-6">
<input type="file" name="compfile" accept=".png, .jepg, .jpg, .pdf, .mp4, .mp3, .xls, .docx" class="form-control" value="">
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
