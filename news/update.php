<?php
include("table.php");
include("../header_inner.php");
include("data_validation.php");
include("../connection.php");
error_reporting(0);
$k=0;
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
<?php
$id=$_REQUEST['id'];
$result = mysqli_query($con,"SHOW FIELDS FROM $table");
$i = 0;
echo "<h2><center><b>UPDATE NEWS</b></center></h2>";
echo "<form action='update_data.php?id=$id' method='post' enctype='multipart/form-data'>";
while ($row = mysqli_fetch_array($result))
 {
  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;
$result2 = mysqli_query($con,"SELECT * FROM $table where id='$id'") or die(mysql_error());
$row2= mysqli_fetch_array($result2);
$datas=$row2[$name];
if($i==1 )
{
	// echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' value='$datas' readonly></div>";
}
elseif($i==30 )
  {
	  echo "
	  <div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> ";
	  echo "<select name='$name' class='form-control'>";
    $sql2 = "select *  from division where id='$row2[division]'";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
while($row2 =mysqli_fetch_array($result2))
    {
		  echo "<option value='$row2[id]'>$row2[division]</option>";
	  }
$sql2 = "select *  from division where id!='$row2[division]'";
$result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
while($row2 =mysqli_fetch_array($result2))
    {
		  echo "<option value='$row2[id]'>$row2[division]</option>";
	  }
echo "</select>";
	    echo "</div>
                   ";
}
elseif($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint"  )
  {
	  echo "
	  <div class='col-md-6'>
                      <div class='form-group'>
    <label>".str_replace('_', ' ', $name)."</label>
    <input type='text' name='$name' value='$datas' class='form-control' required ></div>
    </div>";
	}
  if($type_only=="date" )
  {
	  $date=date("Y-m-d");
	  echo "
	  <div class='col-md-6'>
                    <div class='form-group'>
    <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>
	  <input type='date' name='$name'  class='form-control' value='$datas' required></div></div>";
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
<div class='col-md-3'>            
<div class='form-group'>
<input type='submit' value='Update' name='submit' class='form-control btn-success'>";
echo "</form>";
echo "
</div></div><div class='col-md-3'>  
<div class='form-group'>
<form action='select.php' method='post'>
<input type='submit' name='view' value='Back' class='form-control btn-primary'></form></div></div>
<div class='clearfix'></div>
</div>";
mysqli_free_result($result);
echo "<div class='clearfix'></div>";
mysqli_close($con);
?>
<div id="sample">
  <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
//]]>
</script>
</body>
</html>