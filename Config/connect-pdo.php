<?php
$servername = "10.199.66.227";
$username = "20S3_g2";
$password = "kSn5HXgV";
$db = "20s3_g2";

    try {
        $conn = new PDO("mysql:host=$servername; dbname=$db; charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>