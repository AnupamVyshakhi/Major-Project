
<?php
include("../header_inner.php");
include("table.php");
error_reporting(0);

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
<!--<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>-->
<?php

include("data_validation.php");
include("../connection.php");
echo "<div class='col-md-12'><div class='col-md-6'>";
echo "<h1> ELECTION LIST </h1>";
if($_SESSION['type']=="admin")
{
  $result=mysqli_query($con,"SELECT * FROM election  WHERE result_status='active'  ORDER BY id DESC");
}else{
  $result=mysqli_query($con,"SELECT * FROM election  WHERE voter_status='active' ORDER BY id DESC");
}

while($row=mysqli_fetch_array($result))
{
	echo "<div><form action='result2.php' method='post'>
	<input type='hidden' name='election_id' value='$row[id]'>
	<input type='submit' name='submit' value='$row[election_name]' class='btn btn-primary'>
	
	</form></div>";
}

echo "</div><div class='col-md-6' style='background:#FFFF; padding:20px;'>";
echo "<h1> LATEST NEWS </h1> <marquee direction='up'>";
$result=mysqli_query($con,"SELECT * FROM news  ORDER BY id DESC");

while($row=mysqli_fetch_array($result))
{
	echo "
	<h3>$row[title] ($row[date])</h3>
	<br>
	$row[description]
	 ";
}
echo "</marquee></div></div>";






include("../footer_inner.php");

?>
   <div id="sample">
 <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->