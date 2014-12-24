<?php
include_once('500px.php');
include_once('.keys.php');

// The $consumer_key and the $consumer_secret are inside .keys.php
$px500 = new PICS($consumer_key, $consumer_secret);
$res  = $px500->get_user();
header("Content-Type: application/json");
echo $res;

?>