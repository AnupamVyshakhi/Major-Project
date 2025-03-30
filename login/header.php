<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>College Online Voting</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

 

</head>

<body>
    <!-- Start Main Top -->


    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo2.png" class="logo" alt="" width="25%"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
					
                        <?php
						// Get the current script name
						$current_page = basename($_SERVER['PHP_SELF']);
						?>

							<li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item <?php echo $current_page == 'login.php' ? 'active' : ''; ?>">
								<a class="nav-link" href="login.php">Admin</a>
							</li>
							<li class="nav-item <?php echo $current_page == 'login1.php' ? 'active' : ''; ?>">
								<a class="nav-link" href="login1.php">Voter</a>
							</li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->