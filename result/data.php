
<?php
include("../header_inner.php");
include("table.php");
error_reporting(0);


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
include("header.php");

$python = `python pgm.py`;
//echo $python;
echo "<h1>COUNTING RESULT</h1>";

$myFile = "result.txt";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
echo $theData;



?>

</body>