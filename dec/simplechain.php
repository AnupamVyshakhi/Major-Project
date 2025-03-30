<?php
include("../header_inner.php");
set_time_limit(0);
require_once('blockchain.php');

/*
Set up a simple chain and mine two blocks.
*/

$testCoin = new BlockChain();

include("../connection.php");

 $result2 = mysqli_query($con,"select *  from tbl_voter ");

    while($row2 =mysqli_fetch_array($result2))
    {
	
		$testCoin->push(new Block($row2['id'], strtotime("now"),$row2['adhar_no']));
		mysqli_query($con,"update tbl_voter set status='3' where id='$row2[id]'") or die("error".mysqli_error($con));
		//mysqli_query($con,"update registartion set blockorg='$org' where id='$row2[id]'") or die("error".mysqli_error($con));
		
//echo $arrKeys['public'];
	} 

/*
echo "<br>mining block 1...\n";
//$myhmac="d55bddf8d62910879ed9f605522149a8";
$testCoin->push(new Block(1, strtotime("now"),"$myhmac"));

echo "<br>mining block 2...\n";
$testCoin->push(new Block(2, strtotime("now")," $myhmac"));
*/
json_encode($testCoin, JSON_PRETTY_PRINT);
