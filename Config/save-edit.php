<?php
require_once 'connect.php';

$EquipmentID = $_GET['EquipmentID'];
$EquipmentName = $_GET['EquipmentName'];
$Equipmentplace = $_GET['Equipmentplace'];
$Detail = $_GET['Detail'];
$EquipmentTypeID = $_GET['EquipmentTypeID'];


$y_explode = explode('/', $EquipmentID);

$y = $y_explode[0];
$id = $y_explode[1];

$id_explode = explode('-', $id);

$id1 = $id_explode[0];
$id2 = $id_explode[1];

// echo " y = ".$y;
// echo "id1 = ".$id1;
$array = str_split($id1,2);
if ($EquipmentTypeID < '10') {
    $eqid = $y . '/' . $array[0] . '0'.$EquipmentTypeID . '00-' . $id2;
}else{
    $eqid = $y . '/' . $array[0] . $EquipmentTypeID . '00-' . $id2;
}

// 50 / 020100 - 00000

// $array0 = $array[0];
// echo " a0 :".$array[0];
// echo " eq". $EquipmentTypeID;
// echo " a2 :" . $array[2];
// echo " id2 = ".$id2;
// $eqid = $y.'/'. $array[0].$EquipmentTypeID.'00-'.$id2;
// echo $eqid;

$sql = "UPDATE Equipment SET  
                EquipmentID = '$eqid',
                EquipmentName = '$EquipmentName',
                Equipmentplace = '$Equipmentplace',
                Detail = '$Detail',
                EquipmentTypeID = '$EquipmentTypeID'
        WHERE EquipmentID='$EquipmentID' ";


$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn, $sql));

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขครุภัณฑ์สำเร็จ!!');";
    echo "window.location = '../Admin/showlist.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขครุภัณฑ์ ไม่สำเร็จ!!');";
    echo "</script>";
}

mysqli_close($conn);

?>
