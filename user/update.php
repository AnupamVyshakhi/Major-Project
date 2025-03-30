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
</head>
<body>



<?php
$id=$_REQUEST['id'];
$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;
echo"<h2><center><b>UPDATE REGISTRATION</b></center></h2>";
echo "<form action='update_data.php?id=$id' method='post' enctype='multipart/form-data'>";
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

elseif($name=='admin_id')
  {

     $sql2 = "select MAX(admin_id)+1 as aid  from user ";
     $result2 = mysqli_query($con, $sql2);
     $row22=mysqli_fetch_array($result2);
     echo "
	   <div class='col-md-6'>
                      <div class='form-group'>
     <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
     echo"<input type='text' value='' name='$name' class='form-control' required pattern='[0-9]{5}'> </div></div>";
  }
elseif($name=="admin_name")
  {
	  echo "
	  <div class='col-md-6'>
                      <div class='form-group'>
    <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
    echo"<input type='text' name='$name'class='form-control' required> </div></div>";
  }
else if($name=="adhar_no" )
  {
	  echo "
	  <div class='col-md-6'>
                        <div class='form-group'>
    <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
    echo"<input type='text' name='$name'class='form-control' required	pattern='[0-9]{8}'>
    </div></div>";
  }
elseif($name=="address")
  {
	  echo "
	  <div class='col-md-6'>
                      <div class='form-group'>
    <label>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
    echo"<input type='text' name='$name'class='form-control' required> </div></div>";
  }


 elseif($i==30 )
  {
	  echo "
	  
	  <div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> ";
	  
	
	echo "<select name='$name' class='form-control'>";
	
	  
	  $sql2 = "select *  from division where id='$row2[division]'";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));

    
    while($row2 =mysqli_fetch_array($result2))
    {
		
		echo "<option value='$row2[id]'>$row2[division]</option>";
	}
	
	  $sql2 = "select *  from division where id!='$row2[division]'";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));

    
    while($row2 =mysqli_fetch_array($result2))
    {
		
		echo "<option value='$row2[id]'>$row2[division]</option>";
	}
	
	
	
	
	
	
	
	  echo "</select>";
	    
	  echo "</div>
                                        ";
	
      
    
  }
  






  elseif($name=='mail_id'  )
  {
	  
	  
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
    echo"<input type='text' name='$name' value='$datas' class='form-control' readonly required > </div>
                                        </div>";
	  
	  
	  
  }
  


  elseif($name=='password'  )
  {
	  
	  
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
    echo"<input type='password' name='$name' value='$datas' class='form-control' required> </div>
                                        </div>";
	  
	  
	  
  }
  




  elseif($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint"  )
  {
	  
	  
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
    echo"<input type='text' name='$name' value='$datas' class='form-control' > </div>
                                        </div>";
	  
	  
	  
  }
  
  
    elseif($type_only=="date" )
  {
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></div><div class='col-sm-4'> <input type='text' name='$name' id='t$k' value='$datas' class='form-control'></div>";
	  
	  ?>
	  
	    <script type="text/javascript">
$(function() {
	$('#t<?php echo $k;?>').datepick();
	
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
      <?php
	  $k++;
  }
  
  
  
  
 if($type_only=="tinytext" )
  {
	  echo "
	  
	  	  
	  <div class='col-md-10'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>";
	  
	  echo"<input type='file' name='$name' class='form-control' value='$datas' >
	 <img src='uploads/$datas' width='180'>
	  
	  </div></div>";
  }
  if($type_only=="text" )
  {
	  echo "<div class='col-md-10'>
                                            <div class='form-group'><label>
											
											 ".str_replace('_', ' ', $name)."<span style='color:red;'>*</span></label>
											
											<textarea name='$name' class='form-control'>$datas</textarea>
											</div>
											</div>";
  }
  
  
  

  
  
}


echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Update' name='submit' class='form-control btn-success'>";



echo "</form>";
echo "
</div></div><div class='col-md-3'>   <div class='form-group'>
<form action='select.php' method='post'><input type='submit' name='view' value='Back' class='form-control btn-primary'></form></div></div>
<div class='clearfix'></div>

</div>
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
<div id="sample">
  <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>