<?php
include('include/config.php');
if(!empty($_POST["program_id"])) 
{
 $id = intval($_POST['cat_id']);
$query = mysql_query("SELECT * FROM program WHERE id = $id");
?>
<option value="">Select Program</option>
<?php
 while($row = mysql_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['program_name']); ?></option>
  <?php
 }
}
?>