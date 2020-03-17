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
}

if ($_SESSION['Role'] != "admin") {
    echo "<script>alert('เข้าได้เฉพาะแอดมินเท่านั้น');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";
    exit();
} else {
    include '../Body/header.php';
?>
    <title>Admin-จัดการผู้ใช้</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <?php
    include '../Body/branner.php';
    include '../Body/menu.php';
    ?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"><b>จัดการผู้ใช้</b></h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table table table-bordered table-striped">
                                    <thead>
                                        <tr class="table-primary">
                                            <!-- <th>รูปครุภัณฑ์</th> -->
                                            <th><b>สถานะ</b></th>
                                            <th><b>รหัสนักศึกษา</b></th>
                                            <th><b>ชื่อ-สกุล</b></th>
                                            <th><B>อีเมล</B></th>
                                            <th><b>เบอร์</b></th>
                                            <th><b>วันที่สมัคร</b></th>
                                            <th><b>Active</b></th>
                                            <th><b>ยืนยันการสมัคร</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM user";
                                        $result = mysqli_query($conn, $sql);
                                        while ($fetch = mysqli_fetch_assoc($result)) {

                                            if ($fetch["Active"] == "yes") {
                                        ?>
                                                <tr>
                                                    <td><?php echo $fetch['Role'] ?></td>
                                                    <td><?php echo $fetch['User_id'] ?></td>
                                                    <td><?php echo $fetch['Name'] ?></td>
                                                    <td><?php echo $fetch['Email'] ?></td>
                                                    <td><?php echo $fetch['Phone'] ?></td>
                                                    <td><?php echo $fetch['Date'] ?></td>
                                                    <td><label class="badge badge-success"><?php echo $fetch['Active'] ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <select name="Active" id="Active" onchange="window.location.href='../Config/updateActive.php?Active='+this.value">
                                                                <option value="" disabled selected>แก้ไขสถานะ</option>
                                                                <option value="<?php echo "yes" .
                                                                                    " " . $fetch['User_id']; ?>">Yes</option>
                                                                <option value="<?php echo "no" .
                                                                                    " " . $fetch['User_id']; ?>">No</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            } else if ($fetch["Active"] == "no") {
                                            ?>
                                                <tr>
                                                    <td><?php echo $fetch['Role'] ?></td>
                                                    <td><?php echo $fetch['User_id'] ?></td>
                                                    <td><?php echo $fetch['Name'] ?></td>
                                                    <td><?php echo $fetch['Email'] ?></td>
                                                    <td><?php echo $fetch['Phone'] ?></td>
                                                    <td><?php echo $fetch['Date'] ?></td>
                                                    <td><label class="badge badge-danger"><?php echo $fetch['Active'] ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <select name="Active" id="Active" onchange="window.location.href='../Config/updateActive.php?Active='+this.value">
                                                                <option value="" disabled selected>แก้ไขสถานะ</option>
                                                                <option value="<?php echo "yes" .
                                                                                    " " . $fetch['User_id']; ?>">Yes</option>
                                                                <option value="<?php echo "no" .
                                                                                    " " . $fetch['User_id']; ?>">No</option>
                                                            </select>

                                                        </div>
                                                    </td>
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