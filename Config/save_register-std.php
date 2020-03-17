<?php
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user_id = $_GET["user_id"];
$Prefix = $_GET["Prefix"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$password = $_GET["password"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$role = "นักศึกษา";
$Active = "no";

$name = $Prefix. $fname.' '. $lname;
// //เพิ่มเข้าไปในฐานข้อมูล

$sql = "INSERT INTO user
			 VALUES('$user_id', '$name', '$password', '$phone','$email','$role',CURDATE(),'$Active')";

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));

//ปิดการเชื่อมต่อ database
mysqli_close($conn);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 	echo "<script>alert('กรอกถูกต้องแล้วจ้า');</script>";
// } else {
// 	echo "<script>alert('กรอกให้ถูกต้องนะ อิอิ');</script>";
// }
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
