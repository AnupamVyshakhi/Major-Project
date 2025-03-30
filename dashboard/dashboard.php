<?php
error_reporting(0);
$status=$_REQUEST['status'];
if ($status == "logout")
{
    session_start();
    session_unset();
    session_destroy();
	header("location:../login/index.php");
}
?>
<?php
include("../common/menu.php");
?>
<style>
<style>
#right
{
float:right;	
color:#333;
font-size:12px;
}
.userd
{
color:#333;	
}
.red
{
background:#FFECF4;
padding:10px;	
}
#right
{
float:right;	
color:#333;efont-size:12px;
}
.userd
{
color:#333;	
}
.red
{
background:#F36;
padding:10px;	
}
.table
{
margin-bottom:10px;
background:#E6F4FF;	
}
.sep
{
height:30px;
background:#666;	
}
</style>
  <div class="content">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class="header">
  </div>
  <div class="content all-icons">
  <div class="row">
  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
      <a href="../voter/select.php"><div class="font-icon-detail">
      <i class="pe-7s-add-user" style="color: darkturquoise";></i>
      <input type="text" value="VOTER"></div></a>
  </div>
  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
      <a href="../candidate/select.php"><div class="font-icon-detail">
      <i class="pe-7s-users" style="color: darkturquoise";></i>
      <input type="text" value="CANDIDATE"></div></a>
  </div>
  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
       <a href="../news/select.php"><div class="font-icon-detail">
       <i class="pe-7s-news-paper" style="color: darkturquoise";></i>
       <input type="text" value="NEWS"></div></a>
  </div>
  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
       <a href="../voting/select.php"><div class="font-icon-detail">
       <i class="pe-7s-check" style="color: darkturquoise";></i>
       <input type="text" value="VOTES"></div></a>
  </div>
  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
       <a href="../voting/result1.php"><div class="font-icon-detail">
       <i class="pe-7s-note" style="color: darkturquoise";></i>
       <input type="text" value="ELECTION RESULT"></div></a>
  </div>
  <?php
if($_SESSION['uname']=="admin")
  {
  ?>
  
  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
        <a href="../election/select.php"><div class="font-icon-detail">
        <i class="pe-7s-file" style="color: darkturquoise";></i>
        <input type="text" value="ELECTION STATUS"></div></a>
  </div>
<?php
  }
else
  {
?>
   <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
        <a href="../user/profile.php?id=<?php echo $_SESSION['uid']; ?>"><div class="font-icon-detail">
        <i class="pe-7s-user"  style="color: darkturquoise";></i>
        <input type="text" value="PROFILE"></div></a>
   </div>
<?php
  }
?>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <footer class="footer">
      <div class="container-fluid">
        <nav class="pull-left">
        </nav>
          <p class="copyright pull-right">
          </p>
      </div>
  </footer>
  </div>
  </div>
</body>
</html>