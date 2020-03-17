<?php
require_once 'connect.php';

$result = $_GET["Active"];
$result_explode = explode(' ', $result);

$Active = $result_explode[0];
$user_id = $result_explode[1];

// echo "id=$EquipmentID";
// echo "status=$Status";

$sql = "UPDATE user SET  
			Active='$Active' 
            WHERE User_id='$user_id' ";

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn, $sql));

// if ($Active == 'yes') {

//     $sql2 = "SELECT * FROM user Where User_id='$user_id' ";
//     $result2 = mysqli_query($conn, $sql2);
//     while ($fetch = mysqli_fetch_assoc($result2)) {

//         $strTo = $fetch['Email'];
//         $strSubject = "test";
//         // $strSubject = "การยืนยันการสมัครใช้งานเว็บไซต์ ระบบครุภัณฑ์ สาขาวิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น";
//         // $strHeader .= "MIME-Version: 1.0' . \r\n";
//         // $strHeader .= "Content-type: text/html; charset=utf-8\n";
//         $strHeader .= "From: auschara_p@kkumail.com";
//         $strMessage = "test";
//         // $strMessage = "การสมัครขอเข้าใช้เว็บไซต์ ระบบครุภัณฑ์ สาขาวิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น \n ได้รับการยืนยันแล้ว \n สามารถเข้าใช้ระบบได้ที่ \n http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem";

//         $flgSend = mail($strTo, $strSubject, $strMessage, $strHeader);  // @ = No Show Error //
//         if ($flgSend) {
//             echo "Email Sending.";
//         } else {
//             echo $fetch['Email'];
//             echo "Email Can Not Send.";
//         }
//     }
// }


if ($result) {
    echo "<script type='text/javascript' >";
    echo "alert('ยืนยันการสมัครสำเร็จ!!');";
    echo "window.location = '../Admin/user-manage.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ยืนยันการสมัครสำเร็จ ไม่สำเร็จ!!');";
    echo "</script>";
}
mysqli_close($conn);

?>
