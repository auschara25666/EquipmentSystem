<?php
require_once 'connect.php';

$result = $_GET["Status"];
$result_explode = explode(' ', $result);

$Status = $result_explode[0];
$EquipmentID = $result_explode[1];

// echo "id=$EquipmentID";
// echo "status=$Status";

$sql = "UPDATE Equipment SET  
			Status='$Status' 
            WHERE EquipmentID='$EquipmentID' ";

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn, $sql));

if ($result) {
    echo "<script type='text/javascript' >";
    echo "alert('อัพเดตสถานะสำเร็จ!!');";
    echo "window.location = '../Admin/status.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('อัพเดตสถานะ ไม่สำเร็จ!!');";
    echo "</script>";
}

mysqli_close($conn);

?>