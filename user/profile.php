<?php
include("table.php");
include("../header_inner.php");
include("data_validation.php");
include("../connection.php");
$k=0;
?>


<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
    th{
      text-transform:uppercase;
    }
    </style>
</head>

<body>



<?php
$id=$_REQUEST['id'];
$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;

echo "<table width='90%' align='center'  class='table'>

<tr>
<th><h2>PROFILE</h2></th>
<td>
<div class='col-md-3'>
                          

</div>
</td>
</tr>";
while ($row = mysqli_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;

$result2 = mysqli_query($con,"SELECT * FROM $table where id='$id'") or die(mysql_error());
$row2= mysqli_fetch_array($result2);

$datas=$row2[$name];
//echo $datas;

if($i==1 )
{
	
	// echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' value='$datas' readonly></div>";
}

elseif($name=="status" )
{
	
	// echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' value='$datas' readonly></div>";
}
  elseif($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint" || $type_only=="text" || $type_only=="date"  )
  {
	  
	  
	  echo " 	<tr>  <th> ".str_replace('_', ' ', $name)."</th><td>$datas</td></tr>";
	  
	  
	  
  }
  
  
    
 if($type_only=="tinytext" )
  {
    echo " 	<tr>  <th> ".str_replace('_', ' ', $name)."</th><td><img src='uploads/$datas'  width='200px' height='150px'/></td></tr>";
	  
  }
 
  

  
  
}


echo "


</table>

";




echo "
</div></div>
<div class='clearfix'></div>

</div>
";



mysqli_free_result($result);






echo "<div class='clearfix'></div>
";










mysqli_close($con);
?>
