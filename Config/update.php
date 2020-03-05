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

mysqli_close($conn);

?>
<!-- <script>
    window.location = "../Admin/status.php";
</script> -->