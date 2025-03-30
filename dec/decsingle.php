<?php
include("../header_inner.php");
?>
<form enctype="multipart/form-data" action="" method="POST">
Key <input type="file" name='uploadedfile' />
<br />
Private <input type="file" name='uploadedfile2' />
<br />
<input type="submit" name='sub' />


</form>
<?php





if(isset($_POST['sub']))
{

$target_path = "uploads/";

$target_path1 = $target_path . basename( $_FILES['uploadedfile']['name']); 

move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path1);
 
$target_path = "uploads/";

$target_path2 = $target_path . basename( $_FILES['uploadedfile2']['name']); 

move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], $target_path2);




error_reporting(0);
// Generate a public and private key


// Encrypt data using the public key

// Decrypt data using the private key
function decrypt($data, $privateKey)
{
    // Decrypt the data using the private key
    openssl_private_decrypt($data, $decryptedData, $privateKey);

    // Return decrypted data
    return $decryptedData;
}

// Encrypt and then decrypt a string
//$arrKeys = generate();




$myfile = fopen($target_path1, "r") or die("Unable to open file!");
$a=fread($myfile,filesize($target_path1));
fclose($myfile);

$myfile = fopen($target_path2, "r") or die("Unable to open file!");
$b=fread($myfile,filesize($target_path2));
fclose($myfile);
/*
$a=$_POST['private_key'];
$b=$_POST['blockkey'];*/

//echo $a."<br><br>";
//echo $b."<br><br>";


$strDecrypted = decrypt($a,$b);
echo "<br>Dec :: $strDecrypted<br>";


/*include("../connection.php");

$result2 = mysqli_query($con,"select *  from registartion  where id='17' ");

    while($row2 =mysqli_fetch_array($result2))
    {
		$b=stripslashes($row2['private_key']);
		$a=$row2['blockkey'];
echo $arrKeys['public'];

//echo "$b<br><br>";

//echo "$a <br><br>";


$strDecrypted = decrypt($a, $b);
echo "<br>Dec :: $strDecrypted";

	} 
*/





/*
echo $a;



$strDecrypted = decrypt($a, $b);
echo "<br>Dec :: $strDecrypted";
*/







}



?>
