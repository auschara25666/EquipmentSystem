<?php
$servername = "10.199.66.227";
$username = "20S3_g2";
$password = "kSn5HXgV";
$db = "20s3_g2";

$conn = mysqli_connect($servername,  $username, $password, $db)
 or die(mysqli_connect_errno());
// set character set utf-8
mysqli_query($conn, 'SET CHARACTER SET UTF8');
?>
