<?php

session_start();
date_default_timezone_set('Asia/Calcutta'); 
$otp_time=date("Y-m-d h:i:s");


$url="https://alc-training.in/gateway.php?"; 
$email=$_SESSION['email'];
$pass=$_POST['newpassword'];
//$email="@gmail.com";
//$rand=rand(1000,9999);
$subject="Welcome To Evote System";
$title="Evote System Login Details";
$msg="Your Username : $email Updated Password: $pass  "; // HTML message

echo $msg;


$message = urlencode($msg);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL
handle");} $ret = curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt ($ch,CURLOPT_POST, 1);
curl_setopt($ch,
CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch,CURLOPT_POSTFIELDS,"email=$email&msg=$msg&subject=$subject&title=$title");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxyip with port.
 // $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); //
 if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error

die(curl_error($ch));
curl_close($ch); // close cURL
 } else {

$info = curl_getinfo($ch);
curl_close($ch); // close cURL


}





?>