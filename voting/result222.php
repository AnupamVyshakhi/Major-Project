
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

?>

<div class='container'> 
<?php

//if(isset($_POST['submit1']))
//{
echo "<div class='col-md-12'>";
echo "<h1> ELECTION LIST </h1>";
//echo "SELECT * FROM candidates WHERE election='$row[election_id]' ";


$resultrf=mysqli_query($con,"SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id]");
	$rowrf=mysqli_fetch_array($resultrf);
  echo "<table border=1 class='table'>
  
  
  
  <tr>
  <th>Party</th>
  <th>Candidate</th>
 
  
  <th>Party</th> 
 
  </tr>
  ";

$result22=mysqli_query($con,"SELECT * FROM candidates WHERE election='$_POST[election_id]' ");
//echo "SELECT * FROM candidates WHERE election='$_POST[election_id]' and body_name='$_POST[body]' and local_body='$_POST[type]' order by ward_circle_division  desc";//
	while($row22=mysqli_fetch_array($result22))
	{





if($row22['ward_circle_division']!=$ward)
echo "<tr><td colspan=4> <h4> NO  $row22[ward_circle_division] </h4></td></tr>";


$ward=$row22['ward_circle_division'];
	echo"
  <tr><td>

 
  
  
  <img src='../candidate/uploads/$row22[party_symbol]' width='100px' /> </td><td>
	
	  $row22[candidate_name] </td><td>
	
	     $row22[party_name]</td>
       
       ";
$hashed = hash("sha512", $row22['party_name']);

$resultr=mysqli_query($con,"SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id] and casted='$hashed' order by cc asc");
	$rowr=mysqli_fetch_array($resultr);
	//echo "SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id] and casted='$hashed' order by cc asc";
	echo"
 </tr>
	 ";
	 
	}
	//echo "SELECT count(casted) as cc WHERE election_id=$_POST[election_id] and casted='$hashed'";
echo"</table>";






include("../footer_inner.php");

?></div>
   <div id="sample">
 <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->
  