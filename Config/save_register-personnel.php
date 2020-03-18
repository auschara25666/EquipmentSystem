<?php
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม

$user_id = $_POST["email"];
$Prefix = $_POST["Prefix"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$role = $_POST["role"];
$Active = "no";
$name = $Prefix . $fname . ' ' . $lname;

$slqid = "select * from user";
$resultid = mysqli_query($conn, $slqid);
while ($fetch = mysqli_fetch_assoc($resultid)) {
    $id = $fetch['User_id'];
}
if ($email != $id) {
    // //เพิ่มเข้าไปในฐานข้อมูล
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $sql = "INSERT INTO user
             VALUES('$user_id', '$name', '$password', '$phone','$email','$role',CURDATE(),'$Active')";
             $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));

        if ($result) {
            echo "<script type='text/javascript' >";
            echo "alert('ลงทะเบียนสำเร็จ!!\\nกรุณารอการยืนยันการสมัคร ภายใน 24 ชั่วโมง');";
            echo "window.location = '../login.php'; ";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('ลงทะเบียน ไม่สำเร็จ!!');";
            echo "</script>";
        }
    } else {
        echo "<script>alert('กรอก อีเมลให้ถูกต้อง');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/register-student.php'};</script>";
    }

    

    //ปิดการเชื่อมต่อ database
    mysqli_close($conn);
}else{
    echo "<script type='text/javascript' >";
    echo "alert('มีผู้ใช้ e-mail นี้แล้ว\\nกรุณาตรวจสอบความถูกต้อง');";
    echo "window.location.replace('../register-teacher.php')";
    echo "</script>";
}
