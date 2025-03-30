<?php
include('header.php');

if(isset($_POST['submit']))
{
$target_path = "keyimg/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);

//$dir="uploads";
$myFile = $target_path;
//$myFile = "uploads/splitb/".basename($_FILES['uploadedfile']['name']);
//echo $myFile."<br>";
//echo "<img src='$myFile'>";
$myfile = fopen($myFile, "r") or die("Unable to open file! !!!!! 444");
$theData2=fread($myfile,filesize($myFile));


/*
$myFile = "../voter/uploads/splita/".basename($_FILES['uploadedfile']['name']);
//echo $myFile."<br>";
//echo "<img src='$myFile'>";
$myfile = fopen($myFile, "r") or die("Unable to open file!");
$theData1=fread($myfile,filesize($myFile));
*/

$myFile = "../voter/uploads/splita/" . basename($_FILES['uploadedfile']['name']);

// Try to open the file and read its content
$myfile = fopen($myFile, "r");

if (!$myfile) {
    // If file cannot be opened, show an alert
    echo "<script>alert('Invalid Key!'); window.location='login1.php';</script>";
    exit;  // Stop further execution
}

$theData1 = fread($myfile, filesize($myFile));
fclose($myfile);



//echo "<a href='dec.php?a=a$hash.$ext&b=b$hash.$ext'>DECRYPTION</a>";

$myFile = "../voter/uploads/split/ccc".basename($_FILES['uploadedfile']['name']);
$fh = fopen($myFile, 'w') or die("can't open file");
$theData3=$theData1.$theData2;
fwrite($fh, $theData3);
fclose($fh);


?>

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Voter Login</h2>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio justo, ultrices ac nisl sed, lobortis porta elit. Fusce in metus ac ex venenatis ultricies at cursus mauris.</p>-->
                        <form  action="redirect1.php" method="post" enctype='multipart/form-data'>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="UserName" placeholder="User Name" value="<?php echo $_REQUEST['UserName']; ?>" autocomplete="off" readonly>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>Password</p>
										<?php
										echo "<img src='$myFile'>";
										?>
										<input type="password" class="form-control" name="Password" placeholder="Enter password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!--<div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>-->
                                    <div class="submit-button text-center">
                                        <input class="btn hvr-hover" id="submit" type="submit" name="admin" value="Login">
                                        
                                    </div>
                                    <!--<div class="text-center">
                                        Not a User ? <a href="register.php"> Register Now</a>
                                    </div>-->
                                </div>
                            </div>
                        </form>
						<?php
}
?>
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