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
// //เพิ่มเข้าไปในฐานข้อมูล
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "INSERT INTO user
			 VALUES('$user_id', '$name', '$password', '$phone','$email','$role',CURDATE(),'$Active')";
} else {
    echo "<script>alert('กรอก อีเมลให้ถูกต้อง');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/register-student.php'};</script>";
}

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));

//ปิดการเชื่อมต่อ database
mysqli_close($conn);

if ($result) {
    echo "<script type='text/javascript' >";
    echo "alert('ลงทะเบียนสำเร็จ!! \\n กรุณารอการยืนยันการสมัคร ภายใน 24 ชั่วโมง');";
    echo "window.location = '../login.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ลงทะเบียน ไม่สำเร็จ!!');";
    echo "</script>";
}
