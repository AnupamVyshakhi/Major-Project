<?php 
include("header.php"); 
?>

<style>
.slides-navigation a {
    background: none !important;
}
</style>

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> College e-Voting System</strong></h1>
							<p class="m-b-40">Experience a secure and transparent voting system using advanced <br> visual cryptography to ensure the integrity of your vote.</p>
							<p><a class="btn hvr-hover" href="login1.php">Start Voting</a></p>
						</div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> College e-Voting System</strong></h1>
							<p class="m-b-40">Cast your vote effortlessly and securely with our innovative e-voting platform. <br> Visual cryptography ensures transparency and trust in every election.</p>
							<p><a class="btn hvr-hover" href="#">Get Started</a></p>
						</div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            
        </div>
    </div>
    <!-- End Categories -->





<?php include("footer.php")?>