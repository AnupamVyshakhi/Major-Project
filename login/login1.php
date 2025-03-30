<?php
include('header.php');
error_reporting(0);
if($_REQUEST['a']=="error")
{
?>
	<script>
	alert('Sorry! Invalid Username or Password');
	window.location.href = 'login1.php';
	</script>
<?php
}
?>

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Voter Login</h2>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio justo, ultrices ac nisl sed, lobortis porta elit. Fusce in metus ac ex venenatis ultricies at cursus mauris.</p>-->
                        <form  action="login2.php" method="post" enctype='multipart/form-data'>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="UserName" placeholder="User Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file"  id="password" class="form-control" name="uploadedfile" required accept=".png">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!--<div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>-->
                                    <div class="submit-button text-center">
                                        <input class="btn hvr-hover" id="submit" type="submit" name="submit" value="Login">
                                        
                                    </div>
                                    <!--<div class="text-center">
                                        Not a User ? <a href="register.php"> Register Now</a>
                                    </div>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>College of Engineering Chengannur</h2>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: College of Engineering Chengannur
								Chengannur P.O.
								Alapuzha District
								Kerala
								PIN 689121<br> </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">0479 245 4125</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="#">principal@ceconline.edu</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

    <?php
include('footer.php');
?>