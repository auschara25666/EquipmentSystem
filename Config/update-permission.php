<?php
require_once 'connect.php';

    $result = $_GET["Permission"];
    $result_explode = explode(' ', $result);

    $Permission = $result_explode[0];
    $EquipmentID = $result_explode[1];

    $sql = "UPDATE Equipment SET  
			Permission='$Permission' 
            WHERE EquipmentID='$EquipmentID' ";

    $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn, $sql));

if ($result) {
    echo "<script type='text/javascript' >";
    echo "alert('อัพเดตสิทธิ์การยืมสำเร็จ!!');";
    echo "window.location = '../Admin/status.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('อัพเดตสิทธิ์การยืม ไม่สำเร็จ!!');";
    echo "</script>";
}

    mysqli_close($conn);

?>