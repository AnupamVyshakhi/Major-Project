<?php
include("../header_inner.php");
include("table.php");
error_reporting(0);
if($_REQUEST['a']=="error")
  {
	 echo "<script>alert('Insert Faild!!!!')</script>";
  }
if($_REQUEST['a']=="1")
  {
	 echo "<script>alert('Insert Sucessfully')</script>";
  }
$k=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<style>
.error
  {
	  color:#F00 !important;
  }
</style>
</head>
<body>
<?php
include("data_validation.php");
include("../connection.php");
$g=0;
$result = mysqli_query($con,"SHOW FIELDS FROM $table");
$i = 0;
echo "<div class='col-sm-12'>";
echo "<h2><center><b> ELECTION NEWS</b></center></h2>";
echo "<form action='insert.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";
while ($row = mysqli_fetch_array($result))
{
  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;
$g++;
if($i==1)
  {
	//$gender=enum("male");
	//echo"<td>Male <input type='radio' name='$name'> </td>";
  }
elseif($name=="title")
  {
	  echo "<div class='col-md-6'>
                <div class='form-group'>
	  <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>
	  <textarea name='$name'  class='form-control' rows='4' required></textarea>
	  </div></div>";
  }
elseif($name=="description")
  {
	  echo "<div class='col-md-6'>
                <div class='form-group'>
	  <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>
	  <textarea name='$name'  class='form-control' rows='4' required></textarea>
	  </div></div>";
  }
elseif($name=="date" )
  {
	  $date=date("Y-m-d");
	  echo "
	  <div class='col-md-6'>
                <div class='form-group'>
	  <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>
	  <input type='date' name='$name'  class='form-control' value='$date' required></div></div>";
	  ?>
	  <script type="text/javascript">
$(function() 
{
	$('#t<?php echo $k;?>').datepick();
});
function showDate(date) 
{
	alert('The date chosen is ' + date);
}
</script>
      <?php
	  $k++;
  }
}
echo "
    <div class='col-md-12'>
    <div class='col-md-3'><div class='form-group'>
    <input type='submit' value='Submit' name='submit' class='form-control btn-success'>";
echo "</form>";
echo "
</div></div>
    <div class='col-md-3'><div class='form-group'>
    <form action='select.php' method='post'><input type='submit' name='view' value='View All' class='form-control btn-primary'>
	</form></div></div>
    <div class='clearfix'></div></div>";
mysqli_free_result($result);
echo "</div>
<div class='clearfix'></div>";
mysqli_close($con);
include("../footer_inner.php");
?>
<div id="sample">
</body>
</html>