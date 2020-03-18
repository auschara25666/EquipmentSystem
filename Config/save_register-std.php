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

$name = $Prefix . $fname . ' ' . $lname;
// //เพิ่มเข้าไปในฐานข้อมูล

$sqlid = "select * from user where User_id = '$user_id'";
$resultid = mysqli_query($conn, $sqlid);
$result = mysqli_fetch_array($resultid);
if (!$result) {

	$sql = "INSERT INTO user
			 VALUES('$user_id', '$name', '$password', '$phone','$email','$role',CURDATE(),'$Active')";

	$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));

	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
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
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
}else{
	echo "<script type='text/javascript' >";
	echo "alert('มีผู้ใช้ รหัสนักศึกษา นี้แล้ว\\nกรุณาตรวจสอบความถูกต้อง');";
	echo "window.location.replace('../register-student.php')";
	echo "</script>";
}
