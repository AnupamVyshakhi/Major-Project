
<?php
include("../header_inner.php");
include("table.php");
error_reporting(0);
session_start();
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
  <script src="jquery-1.8.2.js"></script>
<script src="mfs100-9.0.2.6.js"></script>
  <style>
  .error
  {
	  color:#F00 !important;
  }
  .hide
{
display:none;	
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
session_start();
$eid=$_REQUEST['eid'];

include("../connection.php");

echo "<div class='col-md-12'><div class='col-md-6'>";
echo "<h1> CANDIDATES LIST </h1>";

echo"<table class='table'>";


	$result=mysqli_query($con,"SELECT * FROM candidates WHERE election='$eid' ORDER BY local_body,body_name,ward_circle_division ASC ");
	while($row=mysqli_fetch_array($result))
	{
	 
	
	echo"<tr>
	
	<td>$row[candidate_name] </td>
	<td><img src='../candidate/uploads/$row[party_symbol]' width='100'/></td>
	<td>$row[local_body] </td>
	<td>$row[body_name] </td>
	<td>$row[ward_circle_division] </td>
	
	
	
	
	</tr>";


	}
	


echo "</table></div>";

	

echo "</div>";

include("../footer_inner.php");

?>
   <div id="sample">
 <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->