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
$result = mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$_SESSION[uid]'");
$cc=mysqli_fetch_array($result);
//$_SESSION['email']=$cc['mail_id'];

$i = 0;
echo "<form method='post' enctype='multipart/form-data'>";


	  
	  
	  echo "
	  
	  <div class='col-md-10'>
         <div class='form-group'>
         <label>Current Password</label>
         <input type='text' name='$name' value='$cc[password]' class='form-control' readonly > 
         </div>
         </div>";
	  
	  
	  
      echo "
	  
	   <div class='col-md-10'>
      <div class='form-group'>
      <label>New Password</label>
      <input type='text' name='newpassword' class='form-control'  > </div>
       </div>";

       echo "
	  
       <div class='col-md-10'>
        <div class='form-group'>
        <label>Re-enter New Password</label>
        <input type='text' name='renewpassword' class='form-control'  > </div>
         </div>";
                                        
                                        
  


echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Update' name='submit' class='form-control btn-success'>";



echo "</form>";



echo "
</div></div>
<div class='clearfix'></div>

</div>
";

if(isset($_POST['submit']))
{
  $newpassword=$_POST['newpassword'];
  $renewpassword=$_POST['renewpassword'];

  if($newpassword==$renewpassword)
  {
    $up=mysqli_query($con,"UPDATE `user` SET password ='$newpassword' WHERE `id`='$_SESSION[uid]'");
    include('mail1.php');
   echo '<script>
    alert("updated successfully");
    window.location="change_password.php";
    </script>';
  }
  else{
    echo '<script>
    alert("password doesnot match");
    window.location="change_password.php";
    </script>';
  }
 
}


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