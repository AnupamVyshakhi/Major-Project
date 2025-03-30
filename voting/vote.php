
<head>
  <meta http-equiv="refresh" content="10">
</head> 
<?php

include("../connection.php");
$result=mysqli_query($con,"SELECT * FROM display_vote WHERE id='1' ");
	$row=mysqli_fetch_array($result);

if($row['cid']!="0")
{
	
	$result22=mysqli_query($con,"SELECT * FROM candidates WHERE id='$row[cid]' ");
	$row22=mysqli_fetch_array($result22);
	echo"<div class='col-md-6'> <img src='../candidate/uploads/$row22[party_symbol]' width='100%' /> </div>";
}
else
{

echo "
<div class='col-md-5'> <img src='black.jpg' width='100%'/></div>";
}


?>