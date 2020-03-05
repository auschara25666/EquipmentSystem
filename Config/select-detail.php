<?php
require_once '../Config/connect.php';
echo "cdetail";
if (isset($_POST["EquipmentIDdetail"])){
    echo $_POST["EquipmentIDdetail"];
}
// if (isset($_POST["EquipmentID"])) {
//     $output = '';
//     $query1 = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,
//                                           Equipment.EquipmentTypeID,Equipment.Equipmentplace,Equipment.Status,
//                                           Status.Status,EquipmentType.EquipmentType,Equipment.EquipmentImg
//                             FROM Equipment,Status,EquipmentType
//                             where EquipmentID ='" . $_GET["EquipmentID"] . "' and Equipment.Status = Status.Status and Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID";
//     $query = "SELECT * FROM Equipment WHERE EquipmentID = '" . $_POST["EquipmentID"] . "'";
//     $result = mysqli_query($conn, $query);
//     $output .= '  
//       <div class="table-responsive">  
//            <table class="table table-bordered">';
//     while ($row = mysqli_fetch_array($result)) {
//         $output .= '
//      <tr>  
//             <td width="30%"><label>หมายเลขครุภัณฑ์</label></td>  
//             <td width="70%">' . $row["EquipmentID"] . '</td>  
//         </tr>
//         <tr>  
//             <td width="30%"><label>ครุภัณฑ์</label></td>  
//             <td width="70%">' . $row["EquipmentName"] . '</td>  
//         </tr>
//         <tr>  
//             <td width="30%"><label>ประเภทครุภัณฑ์</label></td>  
//             <td width="70%">' . $row["EquipmentType"] . '</td>  
//         </tr>
//         <tr>  
//             <td width="30%"><label>สถานที่</label></td>  
//             <td width="70%">' . $row["Equipmentplace"] . '</td>  
//         </tr>
//         <tr>  
//             <td width="30%"><label>สถานะครุภัณฑ์</label></td>  
//             <td width="70%">' . $row["Status"] . '</td>  
//         </tr>
//      ';
//     }
//     $output .= '</table></div>';
//     echo $output;
?>