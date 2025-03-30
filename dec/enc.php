<?php
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
$arrKeys = generate();
$msg="gec idukki";

$strEncrypted = encrypt($msg, $arrKeys['public']);
echo "Enc :: $strEncrypted <br>";
echo "<br><br>public ::<br><br> $arrKeys[public] ||| <br><br><br>private ::<br> $arrKeys[private] <br>";



$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $strEncrypted;
fwrite($myfile, $txt);

fclose($myfile);


$myfile = fopen("private.txt", "w") or die("Unable to open file!");
$txt = $arrKeys['private'];
fwrite($myfile, $txt);

fclose($myfile);



$myfile = fopen("public.txt", "w") or die("Unable to open file!");
$txt = $arrKeys['public'];
fwrite($myfile, $txt);

fclose($myfile);






?>
