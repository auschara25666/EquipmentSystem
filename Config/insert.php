<?php
require_once 'connect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);


$Year = $_GET["Year"];
$ID = $_GET["EquipmentID"];
$EquipmentTypeID = $_GET["EquipmentTypeID"];
$EquipmentName = $_GET["EquipmentName"];
$Equipmentplace = $_GET["Equipmentplace"];
$Detail = $_GET["Detail"];

$EquipmentID = $Year.'/02'.$EquipmentTypeID.'00-'.$ID;

$sql = "INSERT INTO Equipment(EquipmentID,EquipmentImg,EquipmentTypeID, EquipmentName,Detail,Equipmentplace, Status)  
           VALUES('$EquipmentID','','$EquipmentTypeID', '$EquipmentName','$Detail', '$Equipmentplace','ปกติ')";

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");


if ($result) {
     echo "<script type='text/javascript'>";
     echo "alert('เพิ่มข้อมูลครุภัณฑ์สำเร็จ!!');";
     echo "window.location = '../Admin/showlist.php'; ";
     echo "</script>";
} else {
     echo "<script type='text/javascript'>";
     echo "alert('เพิ่มข้อมูลครุภัณฑ์ ไม่สำเร็จ!!');";
     echo "</script>";
}

?>
