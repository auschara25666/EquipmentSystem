<?php
session_start();
$serverName = "10.199.66.227";
$userName = "20S3_g2";
$userPassword = "kSn5HXgV";
$dbName = "20s3_g2";

$objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
$strSQL = "SELECT * FROM User WHERE User_id = '" . mysqli_real_escape_string($objCon, $_POST['User_Id']) . "' 
    and Password = '" . mysqli_real_escape_string($objCon, $_POST['Password']) . "'";
$objCon->set_charset("utf8");
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
if (!$objResult) {
    echo "<script>if(confirm('กรุณากรอกข้อมูลให้ถูกต้อง !!')){document.location.href='login.php'};</script>";
} else {
    $_SESSION["User_id"] = $objResult["User_id"];
    $_SESSION["Role"] = $objResult["Role"];
    // $test = $_SESSION["Role"];
    // echo $test;
    // session_write_close();

    if ($gg == 'admin') {
        header("location:Admin/status.php");
    } elseif ($gg == 'นักศึกษา') {
        echo "<script>if(confirm('ยังไม่มีบริการของนักศึกษา !!')){document.location.href='login.php'};</script>";
    } else {
        header("location:login.php");
    }

    // if ($gg   == 'Admin') {
    //     header("location:Admin/status.php");
    // }
    // if ($_SESSION["Role"] == 'นักศึกษา') {
    //     header("location:admin/showlist.php");
    // } else {
    //     header("location:login.php");
    // }
}
mysqli_close($objCon);
