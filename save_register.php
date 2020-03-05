<?php
include('Config/connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$user_id = $_POST["user_id"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$role = $_POST["role"];
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO user
			 VALUES('$user_id', '$fname', '$lname', '$password', '$phone','$email','$role')";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Register Succesfuly');";
	echo "window.location = 'login.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
}
?>