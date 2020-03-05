<?php
require_once 'connect.php';

$EquipmentID = $_GET['EquipmentID'];
$EquipmentName = $_GET['EquipmentName'];
$Equipmentplace = $_GET['Equipmentplace'];
$Detail = $_GET['Detail'];
$EquipmentTypeID = $_GET['EquipmentTypeID'];

$sql = "UPDATE Equipment SET  
                EquipmentID = '$EquipmentID',
                EquipmentName = '$EquipmentName',
                Equipmentplace = '$Equipmentplace',
                Detail = '$Detail',
                EquipmentTypeID = '$EquipmentTypeID'
        WHERE EquipmentID='$EquipmentID' ";


$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn, $sql));
mysqli_close($conn);

?>
<script>
    window.location = "../Admin/showlist.php";
    alert("แก้ไขสำเร็จ !!");
</script>