
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
$eid=$_SESSION['election_id'];

include("data_validation.php");
include("../connection.php");

if(isset($_POST['submit']))
{
	mysqli_query($con,"UPDATE display_vote SET cid='0' WHERE id='1'");
	
	echo "<script>window.location.replace('step2.php?election_id=$_SESSION[election_id]');</script>";
	//header("location:step4.php");
	
	
}



echo "<div class='col-md-12'><div class='col-md-12'>";
echo "<h2> ELECTION PROCESS COMPLETED </h2>";

echo "THANK YOU FOR VOTING ....";
echo"<br>";
echo "<form action='step1.php' method='post'><input type='submit' class='btn btn-primary' value='Go To Home' name='submit'/></form>";


echo "</div>";

//include("../footer_inner.php");

?>
   <div id="sample">
 <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->