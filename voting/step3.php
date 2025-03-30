
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
<?php
session_start();
$eid=$_SESSION['election_id'];

include("data_validation.php");
include("../connection.php");
$result88=mysqli_query($con,"SELECT * FROM voting WHERE voter_id='$_SESSION[vid]' and election_id='$_SESSION[election_id]'  ");
	$row88=mysqli_num_rows($result88);
	if($row88=="0")
	{
	}
	else
	{
		echo "<script>alert('ALLREDY VOTED');</script>";
		echo "<script>window.location.replace('step2.php?election_id=$_SESSION[election_id]');</script>";
	}

if(isset($_POST['vote']))
{
	$date=date("Y-m-d");
	 $hashed = hash("sha512", $_POST['vote']);
	 echo $_POST['vote'];
	$result=mysqli_query($con,"INSERT INTO voting(voter_id,election_id,date,casted) VALUES('$_POST[vid]','$_POST[election_id]','$date','$hashed')");
	
	mysqli_query($con,"UPDATE display_vote SET cid='$_POST[cid]' WHERE id='1'");
	
	echo "<script>window.location.replace('step4.php');</script>";
	//header("location:step4.php");
}
echo "<div class='col-md-12'><div class='col-md-6'>";
echo "<h1> ELECTION PROCESS </h1>";
$result22=mysqli_query($con,"SELECT * FROM tbl_voter WHERE voter_id='$_SESSION[vid]' ");
$row22=mysqli_fetch_array($result22);
//echo "SELECT * FROM candidates WHERE election='$eid' and local_body='$row22[local_body]' and body_name='$row22[body_name]' and ward_circle_division='$row22[ward_circle_division]'  ";
$result=mysqli_query($con,"SELECT * FROM candidates WHERE election='$eid'");
while($row=mysqli_fetch_array($result))
	{
	  echo "<form action='' method='post'>
	  <input type='hidden' name='election_id' value='$eid'>
	  <input type='hidden' name='vid' value='$_SESSION[vid]'> ";
	  echo "
      <input type='hidden' name='cid' value='$row[id]'>
	  <div class='col-md-12'><div class='col-md-4'><img src='../candidate/uploads/$row[party_symbol]' width='100'/> </div>
	  <div class='col-md-4'>$row[candidate_name]</div><div class='col-md-4'>
	  <div class='col-md-5'>$row[party_name]</div><div class='col-md-a'>";	
	  echo"<input type='submit' name='vote' value='$row[party_name]' class='btn btn-success'></div></div></div>";
	  echo"</form>";
    }
echo "</div>";
    echo"<div class='col-md-6'> 
	<div style='background-color:#FFF; padding:20px;'>
	NAME : $row22[name] </br> 
	ADDRESS : $row22[address] </br>
	Voter ID : $row22[voter_id] </br>
	</div> 
	</div>";
echo "</div>";
include("../footer_inner.php");
?>
   <div id="sample">
</body>
</html>