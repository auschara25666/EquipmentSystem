<?php
require_once 'connect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$sql1 = "SELECT * From EquipmentType";
$result1 = mysqli_query($conn, $sql1);
while ($fetch = mysqli_fetch_assoc($result1)) {
    $typeid = $fetch["EquipmentTypeID"];
}

$EquipmentTypeID = $typeid+1;
$EquipmentType = $_GET["EquipmentType"];


$sql = "INSERT INTO EquipmentType(EquipmentTypeID, EquipmentType)  
           VALUES('$EquipmentTypeID', '$EquipmentType')";

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn) . "<br>$sql");


if ($result) {
     echo "<script type='text/javascript'>";
     echo "alert('เพิ่มประเภทครุภัณฑ์สำเร็จ!!');";
     echo "window.location = '../Admin/showlist.php'; ";
     echo "</script>";
} else {
     echo "<script type='text/javascript'>";
     echo "alert('เพิ่มประเภทครุภัณฑ์ ไม่สำเร็จ!!');";
     echo "</script>";
}
