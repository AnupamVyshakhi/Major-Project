<?php
session_start();
error_reporting(0);
if($_SESSION['type']=="")
{
	header("location:../login/login.php");
}
$title="";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../common/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body style="background-color:f36;">
<div class="wrapper">
<!--<div class="sidebar" data-color="red" data-image="../assets/img/sidebar-4.jpg">-->
<div class="sidebar" data-color="azure"  data-image="">
<!--
Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag
-->
<div class="sidebar-wrapper">
<div class="logo">
<span style="font-size:20px;color:#FFF;margin-top:12px; font-family:Georgia, 'Times New Roman', Times, serif"> Welcome <br><span style="font-size:12px;color:#000;">
</span>
            </span>
</div>
<ul class="nav">
     <?php
     if($_SESSION['type']=="admin")
       {
       ?>
       <li>
            <a href="../dashboard/dashboard.php">
            <i class="pe-7s-home"></i>
            <p>HOME</p></a>
       </li>
       <li>
            <a href="../voter/select.php">
            <i class="pe-7s-add-user"></i>
            <p>VOTER</p></a>
       </li>
       <li>
            <a href="../candidate/select.php">
            <i class="pe-7s-users"></i>
            <p>CANDIDATE</p></a>
       </li>
       <li>
            <a href="../news/select.php">
            <i class="pe-7s-news-paper"></i>
            <p>NEWS</p></a>
       </li>
       <li>
            <a href="../voting/select.php">
            <i class="pe-7s-check"></i>
            <p>VOTES</p></a>
       </li>
       <li>
            <a href="../election/select.php">
            <i class="pe-7s-file"></i>
            <p>ELECTION STATUS</p></a>
       </li>
       <li>
            <a href="../voting/result1.php">
            <i class="pe-7s-note"></i>
            <p>ELECTION RESULT</p></a>
       </li>
    <?php
       }
    else
{
       ?>
       <li>
            <a href="../dashboard/dashboard2.php">
            <i class="pe-7s-home"></i>
            <p>HOME</p></a>
       </li>
       <li>
            <a href="../voter/profile.php?id=<?php echo $_SESSION['uid']; ?>"> 
            <i class="pe-7s-user"></i>
            <p>PROFILE</p></a>
       </li>
       <li>
            <a href="../voting/step1.php">
            <i class="pe-7s-check"></i>
            <p>VOTING</p></a>
       </li>
       <li>
            <a href="../voting/result1.php">
            <i class="pe-7s-note"></i>
            <p>ELECTION RESULT</p></a>
       </li>
    <?php
       }
    ?>
    <?php
     if($_SESSION['uname']=="admin")
       {
       ?>
      
      
       <?php
       }
    elseif($_SESSION['uname']=="aa")
       {
       ?>
       <li>
            <a href="../user/profile.php?id=<?php echo $_SESSION['uid']; ?>"> 
            <i class="pe-7s-user"></i>
            <p>PROFILE</p></a>
       </li>
       <?php
       }
       ?>
</ul>
    </div>
    </div>
    <div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <br>
        </div>
        <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-left">
            <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
            <a href="../login/index.php?status=logout">
            <input type='button' value='LOGOUT' name='logout' class='form-control btn-primary'>
            </a>
            </li>
			<li class="separator hidden-lg hidden-md"></li>
        </ul>
            </div>
            </div>
        </nav>
    </body>
    <html>