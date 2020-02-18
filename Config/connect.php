<?php
$servername = "10.199.66.227";
$username = "20S3_g2";
$password = "kSn5HXgV";
$db = "20s3_g2";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$sq = mysqli_query($conn, 'SET CHARACTER SET UTF8');

?>