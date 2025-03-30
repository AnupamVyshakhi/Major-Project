<?php
include("../header_inner.php");
error_reporting(0);
// Generate a public and private key
function generate()
{
    // Set the key parameters
    $config = array(
        "digest_alg" => "sha256",
        "private_key_bits" => 1024,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );

    // Create the private and public key
    $res = openssl_pkey_new($config);

    // Extract the private key from $res to $privKey
    openssl_pkey_export($res, $privKey);

    // Extract the public key from $res to $pubKey
    $pubKey = openssl_pkey_get_details($res);

    return array(
        'private' => $privKey,
        'public' => $pubKey["key"],
        'type' => $config,
    );
}

// Encrypt data using the public key
function encrypt($data, $publicKey)
{
    // Encrypt the data using the public key
    openssl_public_encrypt($data, $encryptedData, $publicKey);

    // Return encrypted data
    return $encryptedData;
}

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





/*
$myfile = fopen("private.txt", "r") or die("Unable to open file!");
$arrKeys['private']=fread($myfile,filesize("private.txt"));
fclose($myfile);


$myfile = fopen("public.txt", "r") or die("Unable to open file!");
$arrKeys['public']=fread($myfile,filesize("public.txt"));
fclose($myfile);
*/


include("../connection.php");

$id=14;

	  $result2 = mysqli_query($con,"select *  from tbl_voter  ");

    while($row2 =mysqli_fetch_array($result2))
    {
		$arrKeys['private']=$row2['private_key'];
		$pub=$row2['public_key'];
		
		$id=$row2['id'];
		$msg=$row2['blockorg'];

$strEncrypted = encrypt($msg, $pub);


		$myfile = fopen("key/enc$id.txt", "w") or die("Unable to open file!");
$txt = $strEncrypted;
fwrite($myfile, $txt);

fclose($myfile);
$strEncrypted=addslashes($strEncrypted);












mysqli_query($con,"update tbl_voter set blockkey='$strEncrypted' where id='$id'") or die("error".mysqli_error($con));

		


/*
$myfile = fopen("enc.data", "w") or die("Unable to open file!");
$txt = $strEncrypted;
fwrite($myfile, $txt);

fclose($myfile);
*/

$myfile = fopen("private/private$id.txt", "w") or die("Unable to open file!");
$txt = $arrKeys['private'];
fwrite($myfile, $txt);

fclose($myfile);


		
		
		//mysqli_query($con,"update registartion set status='3' where id='$row2[id]'") or die("error".mysqli_error($con));
//echo $arrKeys['public'];
	} 











?>
