<?php
    require_once '../Config/connect.php';

    $result = $_GET["Priority"];
    $result_explode = explode(' ', $result);

    $Priority = $result_explode[0];
    $EquipmentID = $result_explode[1];

    $sql = "UPDATE Repairlist SET  
			Priority='$Priority' 
            WHERE EquipmentID='$EquipmentID' ";

    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn, $sql));

if ($result) {
    echo "<script type='text/javascript' >";
    echo "alert('อัพเดตความสำคัญการซ้อมสำเร็จ!!');";
    echo "window.location = '../Admin/repairing.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('อัพเดตความสำคัญการซ้อม ไม่สำเร็จ!!');";
    echo "</script>";
}

    mysqli_close($conn);
    
?>
