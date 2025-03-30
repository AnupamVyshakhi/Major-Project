<?php
set_time_limit(0);
include("../connection.php");
//echo "dddddddddddddddddddddddddd";
if(isset($_POST['submit2']))
{
session_start();
	
$result55=mysqli_query($con,"SELECT * FROM tbl_voter WHERE voter_id='$_POST[v_id]'");
$row5=mysqli_fetch_array($result55);
$cc=mysqli_num_rows($result55);

//echo "uuuuuuuuuuuuu";
if($cc==1)
{
	
	$_SESSION['user']=$row5['id'];
	$_SESSION['election_id']=$_REQUEST['election_id'];
	$_SESSION['vid']=$row5['voter_id'];
	$_SESSION['email']=$row5['email'];
	//echo "SELECT * FROM tbl_voter WHERE voter_id='$_POST[v_id]'";
//echo"

}
else
{
	echo"No Voter Found";
}
$iid=$row5['id'];
$ee=$_REQUEST['election_id'];
$vid=$row5['voter_id'];
// "<a href='../voter/facedetect.php?id=$iid&election_id=$ee&vid=$vid'>SEND OTP</a>";
header("location:../voter/facedetect.php?id=$iid&election_id=$ee&vid=$vid&email=$row5[email]");
		 	

	//echo "dddddddd";

	
}









































include("../header_inner.php");
include("table.php");
error_reporting(0);
ob_start();
$k=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 


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
$_SESSION['election_id']=$_REQUEST['election_id'];



if($_REQUEST['a']==22)
{
	echo" <h4 style='color:#F00'> VOTER NOT VERIFIED</h4>";
}


echo "<div class='col-md-12'>";
echo "<h1> ELECTION PROCESS</h1>";

	echo "<div><form action='' method='post'>
	<input type='hidden' name='election_id' value='$_SESSION[election_id]'>
	Enter Voter Id <br>
	<input type='text' name='v_id' class='form-control' >
	<br>
	<input type='submit' name='submit2' value='submit' class='btn btn-danger'>
	
	</form>";


?>

  <?php  
echo "</div>";


//include("../footer_inner.php");

?>

