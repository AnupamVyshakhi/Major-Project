<?php
include("../header_inner.php");

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




/*$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
$a=fread($myfile,filesize("newfile.txt"));
fclose($myfile);

$myfile = fopen("private.txt", "r") or die("Unable to open file!");
$b=fread($myfile,filesize("private.txt"));
fclose($myfile);


*/






include("../connection.php");

$id=14;

	  $result2 = mysqli_query($con,"select *  from tbl_voter  where id='18' ");

    while($row2 =mysqli_fetch_array($result2))
    {
		$b=stripslashes($row2['private_key']);
		$a=$row2['blockkey'];
//echo $arrKeys['public'];

//echo "$b<br><br>";

//echo "$a <br><br>";


$strDecrypted = decrypt($a, $b);
echo "<br>Dec :: $strDecrypted";

	} 








?>
