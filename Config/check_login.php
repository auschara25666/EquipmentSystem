<?php
if (!isset($_SESSION)) {
    session_start();
}
include("connect.php");
if (isset($_POST['Submit'])) {
    $strSQL = "SELECT * FROM User WHERE User_id = '" . mysqli_real_escape_string($conn, $_POST['User_Id']) . "' 
    and Password = '" . mysqli_real_escape_string($conn, $_POST['Password']) . "'";
    $conn->set_charset("utf8");
    $objQuery = mysqli_query($conn, $strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    if (!$objResult) {
            echo "<script>alert('กรุณากรอกข้อมูลให้ถูกต้อง');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";

    } else {
        $_SESSION["User_id"] = $objResult["User_id"];
        $_SESSION["Role"] = $objResult["Role"];
        $Role = $_SESSION["Role"];
        $User_id = $_SESSION["User_id"];
        // echo $ss;
        // echo $Role;

        // $test = $_SESSION["Role"];
        // echo $test;
        session_write_close();

        if ($Role == 'admin') {
            header("location:../index.php");
        } elseif ($Role == 'นักศึกษา') {
            header("location:../index-user.php");
        } else {
            header("location:../login.php");
        }

        // if ($Role   == 'Admin') {
        //     header("location:Admin/status.php");
        // }
        // if ($_SESSION["Role"] == 'นักศึกษา') {
        //     header("location:admin/showlist.php");
        // } else {
        //     header("location:login.php");
        // }
    }
    mysqli_close($conn);
}
