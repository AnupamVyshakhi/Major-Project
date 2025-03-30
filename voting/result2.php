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

$resultrf = mysqli_query($con, "SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id]");
$rowrf = mysqli_fetch_array($resultrf);

echo "<table border=1 class='table'>
  <tr>
    <th>Party</th>
    <th>Candidate</th>
    <th>Party</th>
    <th>Count</th>
  </tr>";

$result22 = mysqli_query($con, "SELECT * FROM candidates WHERE election='$_POST[election_id]'");
$maxVotes = 0;
$winners = [];  // To store the winners

while ($row22 = mysqli_fetch_array($result22)) {
    if ($row22['ward_circle_division'] != $ward) {
        echo "<tr><td colspan=4> <h4> NO  $row22[ward_circle_division] </h4></td></tr>";
        $winner = "";
        $cc = 0;
    }
    $ward = $row22['ward_circle_division'];

    echo "<tr><td>
    <img src='../candidate/uploads/$row22[party_symbol]' width='100px' /> </td><td>
    $row22[candidate_name] </td><td>
    $row22[party_name]</td>
    <td>";

    $hashed = hash("sha512", $row22['party_name']);
    $resultr = mysqli_query($con, "SELECT count(casted) as cc FROM voting WHERE election_id=$_POST[election_id] and casted='$hashed'");

    $rowr = mysqli_fetch_array($resultr);
    echo "$rowr[cc]   <br></td></tr>";

    // Compare votes to track the winner
    if ($rowr['cc'] > $maxVotes) {
        $maxVotes = $rowr['cc'];
        $winners = [$row22['candidate_name']];  // Reset winners list to the new candidate
    } elseif ($rowr['cc'] == $maxVotes) {
        // If the vote count is the same as the max, add the candidate to the winners list
        $winners[] = $row22['candidate_name'];
    }
}

echo "</table>";

// After the loop, check the winners
if (count($winners) > 1) {
    echo "<h3 style='color: red;'>Winner: It's a tie</h3>";
} elseif (count($winners) == 1) {
    echo "<h3 style='color: red;'>Winner: " . $winners[0] . "</h3>";
} else {
    echo "<h3 style='color: red;'>No votes casted yet.</h3>";
}


include("../footer_inner.php");

?></div>
   <div id="sample">
</body>
</html>