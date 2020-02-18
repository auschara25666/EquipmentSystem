<?php
    require_once '../Config/connect.php';

    $result = $_GET["FixStatus"];
    $result_explode = explode('-', $result);

    $FixStatus = $result_explode[0];
    $EquipmentID = $result_explode[1];

    $sql = "UPDATE Repairlist SET  
			FixStatus='$FixStatus' 
            WHERE EquipmentID='$EquipmentID' ";

    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn, $sql));

    mysqli_close($conn);
    
?>
<script>
    window.location="repairing.php";
</script>