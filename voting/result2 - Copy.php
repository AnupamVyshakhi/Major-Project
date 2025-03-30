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
<?php
include("data_validation.php");
include("../connection.php");
?>

<div class='container'> 

<?php
//if(isset($_POST['submit1']))
//{
echo "<div class='col-md-12'>";
echo "<h1> ELECTION RESULT </h1>";
//echo "SELECT * FROM candidates WHERE election='$row[election_id]' ";
$resultrf=mysqli_query($con,"SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id]");
$rowrf=mysqli_fetch_array($resultrf);
echo "<table border=1 class='table'>
  <tr>
  <th>Party</th>
  <th>Candidate</th>
  <th>Party</th>
  <th>Count</th>
  </tr>";

$result22=mysqli_query($con,"SELECT * FROM candidates WHERE election='$_POST[election_id]'");
while($row22=mysqli_fetch_array($result22))
	{
if($row22['ward_circle_division']!=$ward)
{
echo "<tr><td colspan=4> <h4> NO  $row22[ward_circle_division] </h4></td></tr>";
//echo "<tr><td colspan=4> $winner</td></tr>";
$winner="";
$cc=0;
}
$ward=$row22['ward_circle_division'];
	echo"
  <tr><td>
  <img src='../candidate/uploads/$row22[party_symbol]' width='100px' /> </td><td>
	$row22[candidate_name] </td><td>
	$row22[party_name]</td>
  <td>";
$hashed = hash("sha512", $row22['party_name']);
//echo $row22['party_name'];
$resultr=mysqli_query($con,"SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id] and casted='$hashed' order by cc asc");
//echo "SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id] and casted='$hashed' order by cc asc";
	$rowr=mysqli_fetch_array($resultr);
	 echo"
   $rowr[cc]   <br></td>
   </tr>";

if ($rowr['cc'] > 0) { // Check if the count is greater than 0
    if ($rowr['cc'] > $cc) { // Check if the count exceeds the comparison value
        $winner = $row22['candidate_name'];
    }
    echo "<h3 style='color: red;'>Winner: " . (isset($winner) ? $winner : "No winner yet") . "</h3>";
} else {
    //echo "No votes casted yet.";
}
   

}
 //echo "SELECT count(casted) as cc WHERE election_id=$_POST[election_id] and casted='$hashed'";
echo"</table>";


include("../footer_inner.php");

?></div>
   <div id="sample">
</body>
</html>