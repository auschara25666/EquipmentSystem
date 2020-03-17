<?php
if (!isset($_SESSION)) {
    session_start();
    $session_User_id = $_SESSION['User_id'];
}
if ($_SESSION['Active'] == "no") {
    echo "<script>alert('กรุณารอ การยืนยันการสมัคร จากแอดมิน!!');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";
    exit();
}
if ($_SESSION['User_id'] == "") {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";
    exit();
} else {
    include '../Body/header-users.php';
?>
    <title>Home-นักศึกษา</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <?php
    include '../Body/branner-users.php';
    include '../Body/menu-users.php';
    ?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">รายการครุภัณฑ์</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table table table-bordered table-striped">
                                    <thead>
                                        <tr class="table-primary">
                                            <!-- <th>รูปครุภัณฑ์</th> -->
                                            <th>หมายเลขครุภัณฑ์</th>
                                            <th>ครุภัณฑ์</th>
                                            <th>ประเภท</th>
                                            <th>สถานที่</th>
                                            <th>รายละเอียด</th>
                                            <th>สถานะ</th>
                                            <!-- <th>รายละเอียด</th> -->
                                            <!-- <th>แก้ไข/ลบ</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,
                                Equipment.Equipmentplace,Equipment.Status,
                                EquipmentType.EquipmentType,Equipment.Detail,Equipment.Permission
                            FROM Equipment,EquipmentType,Status
                            where Equipment.Permission = '1' and Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID  and Equipment.Status=Status.status 
                            order by Equipment.EquipmentID ASC";
                                        $result = mysqli_query($conn, $sql);
                                        while ($fetch = mysqli_fetch_assoc($result)) {

                                            if ($fetch["Status"] == "ปกติ") {
                                        ?>
                                                <tr>
                                                    <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                                                    <td><?php echo $fetch['EquipmentID'] ?></td>
                                                    <td><?php echo $fetch['EquipmentName'] ?></td>
                                                    <td><?php echo $fetch['EquipmentType'] ?></td>
                                                    <td><?php echo $fetch['Equipmentplace'] ?></td>
                                                    <td><?php echo $fetch['Detail'] ?></td>
                                                    <td><label class="badge badge-success"><?php echo $fetch['Status'] ?></td>

                                                </tr>
                                            <?php
                                            } else if ($fetch["Status"] == "กำลังซ่อม") {
                                            ?>
                                                <tr>
                                                    <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                                                    <td><?php echo $fetch['EquipmentID'] ?></td>
                                                    <td><?php echo $fetch['EquipmentName'] ?></td>
                                                    <td><?php echo $fetch['EquipmentType'] ?></td>
                                                    <td><?php echo $fetch['Equipmentplace'] ?></td>
                                                    <td><?php echo $fetch['Detail'] ?></td>
                                                    <td><label class="badge badge-info"><?php echo $fetch['Status'] ?></td>

                                                </tr>
                                            <?php
                                            } else if ($fetch["Status"] == "ชำรุด") {
                                            ?>
                                                <tr>
                                                    <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                                                    <td><?php echo $fetch['EquipmentID'] ?></td>
                                                    <td><?php echo $fetch['EquipmentName'] ?></td>
                                                    <td><?php echo $fetch['EquipmentType'] ?></td>
                                                    <td><?php echo $fetch['Equipmentplace'] ?></td>
                                                    <td><?php echo $fetch['Detail'] ?></td>
                                                    <td><label class="badge badge-danger"><?php echo $fetch['Status'] ?></td>

                                                </tr>
                                            <?php
                                            } else if ($fetch["Status"] == "ถูกยืม") {
                                                $id = $fetch['EquipmentID'];
                                            ?>
                                                <tr>
                                                    <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                                                    <td><?php echo $fetch['EquipmentID'] ?></td>
                                                    <td><?php echo $fetch['EquipmentName'] ?></td>
                                                    <td><?php echo $fetch['EquipmentType'] ?></td>
                                                    <td><?php echo $fetch['Equipmentplace'] ?></td>
                                                    <td><?php echo $fetch['Detail'] ?></td>
                                                    <td><label class="badge badge-warning"><?php echo $fetch['Status'] ?></td>

                                                </tr>
                                            <?php

                                            } else if ($fetch["Status"] == "ปลดระวาง") {
                                            ?>
                                                <tr>
                                                    <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                                                    <td><?php echo $fetch['EquipmentID'] ?></td>
                                                    <td><?php echo $fetch['EquipmentName'] ?></td>
                                                    <td><?php echo $fetch['EquipmentType'] ?></td>
                                                    <td><?php echo $fetch['Equipmentplace'] ?></td>
                                                    <td><?php echo $fetch['Detail'] ?></td>
                                                    <td><label class="badge badge-primary">**<?php echo $fetch['Status'] ?>**</td>

                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>

                                <?php
                                include '../Body/modal.php';
                                include '../Body/footer.php';
                                ?>
                                <script src="../js/app.js"></script>
                            <?php
                        }
                            ?>