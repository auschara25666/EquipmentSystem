<?php
if (!isset($_SESSION)) {
  session_start();
}
if ($_SESSION['User_id'] == "") {
  echo "<script>alert('กรุณาเข้าสู่ระบบ');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";
  exit();
}

if ($_SESSION['Role'] != "admin") {
    echo "<script>alert('เข้าได้เฉพาะแอดมินเท่านั้น');{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";

  exit();
}else{
  
  include '../Body/header.php';
?>

<title>Admin-รายการแจ้งซ่อม</title>
<?php
include '../Body/branner.php';
include '../Body/menu.php';
?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">รายการแจ้งซ่อม</h3>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table">
                <thead>
                  <tr>
                    <th>รหัสอุปกรณ์</th>
                    <th>ชื่ออุปกรณ์</th>
                    <th>รายละเอียด</th>
                    <th>วันที่แจ้ง</th>
                    <th>สถานที่</th>
                    <th>ผู้แจ้ง</th>
                    <th>สถานะ</th>
                    <th>ระดับความสำคัญ</th>
                    <th>ความสำคัญ</th>
                    <th>แก้ไขสถานะ</th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,repairlist.FixDetail,repairlist.FixDate,
                                          Equipment.Equipmentplace,FixStatus.FixStatus,repairlist.Priority,User.Fname,User.Lname
                                  FROM Equipment,repairlist,FixStatus,User
                                  where Equipment.EquipmentID = repairlist.EquipmentID and FixStatus.FixStatus = repairlist.FixStatus and repairlist.User_id=User.User_id
                                  order by Priority  DESC";
                  $result = mysqli_query($conn, $sql);
                  while ($fetch = mysqli_fetch_assoc($result)) {
                    if ($fetch['FixStatus'] == "รอดำเนินการ") {
                  ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['FixDetail'] ?></td>
                        <td><?php echo $fetch['FixDate'] ?></td>
                        <td><?php echo $fetch['Equipmentplace'] ?></td>
                        <td><?php echo $fetch['Fname'] ?> <?php echo $fetch['Lname'] ?></td>
                        <td><label class="badge badge-warning"><?php echo $fetch['FixStatus'] ?></td>
                        <td>
                          <div class="badge badge-pill badge-primary"><?php echo $fetch['Priority'] ?></div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select id="Priority" id="Priority" onchange="window.location.href='../Config/updatepriority.php?Priority='+this.value">
                              <option disabled selected value="">ระดับความสำคัญ</option>
                              <option value="<?php echo '1' . " " . $fetch['EquipmentID']; ?>">1</option>
                              <option value="<?php echo '2' . " " . $fetch['EquipmentID']; ?>">2</option>
                              <option value="<?php echo '3' . " " . $fetch['EquipmentID']; ?>">3</option>
                              <option value="<?php echo '4' . " " . $fetch['EquipmentID']; ?>">4</option>
                              <option value="<?php echo '5' . " " . $fetch['EquipmentID']; ?>">5</option>
                            </select>
                          </div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select name="FixStatus" id="FixStatus" onchange="window.location.href='../Config/updatefixstatus.php?FixStatus='+this.value">
                              <option disabled selected value="">แก้ไขสถานะ</option>
                              <?php
                              $strSQL = "SELECT * FROM FixStatus ORDER BY FixStatus ASC";
                              $objQuery = mysqli_query($conn, $strSQL);
                              while ($objResuut = mysqli_fetch_array($objQuery)) {
                              ?>
                                <option value="<?php echo $objResuut["FixStatus"] . " " . $fetch['EquipmentID']; ?>">
                                  <?php echo $objResuut["FixStatus"]; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    if ($fetch['FixStatus'] == "กำลังดำเนินการ") {
                    ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['FixDetail'] ?></td>
                        <td><?php echo $fetch['FixDate'] ?></td>
                        <td><?php echo $fetch['Equipmentplace'] ?></td>
                        <td><?php echo $fetch['Fname'] ?> <?php echo $fetch['Lname'] ?></td>
                        <td><label class="badge badge-info"><?php echo $fetch['FixStatus'] ?></td>
                        <td>
                          <div class="badge badge-pill badge-primary"><?php echo $fetch['Priority'] ?></div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select id="Priority" id="Priority" onchange="window.location.href='../Config/updatepriority.php?Priority='+this.value">
                              <option disabled selected value="">ระดับความสำคัญ</option>
                              <option value="<?php echo '1' . " " . $fetch['EquipmentID']; ?>">1</option>
                              <option value="<?php echo '2' . " " . $fetch['EquipmentID']; ?>">2</option>
                              <option value="<?php echo '3' . " " . $fetch['EquipmentID']; ?>">3</option>
                              <option value="<?php echo '4' . " " . $fetch['EquipmentID']; ?>">4</option>
                              <option value="<?php echo '5' . " " . $fetch['EquipmentID']; ?>">5</option>
                            </select>
                          </div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select name="FixStatus" id="FixStatus" onchange="window.location.href='../Config/updatefixstatus.php?FixStatus='+this.value">
                              <option disabled selected value="">แก้ไขสถานะ</option>
                              <?php
                              $strSQL = "SELECT * FROM FixStatus ORDER BY FixStatus ASC";
                              $objQuery = mysqli_query($conn, $strSQL);
                              while ($objResuut = mysqli_fetch_array($objQuery)) {
                              ?>
                                <option value="<?php echo $objResuut["FixStatus"] . " " . $fetch['EquipmentID']; ?>">
                                  <?php echo $objResuut["FixStatus"]; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    if ($fetch['FixStatus'] == "ดำเนินการเสร็จสิ้น") {
                    ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['FixDetail'] ?></td>
                        <td><?php echo $fetch['FixDate'] ?></td>
                        <td><?php echo $fetch['Equipmentplace'] ?></td>
                        <td><?php echo $fetch['Fname'] ?> <?php echo $fetch['Lname'] ?></td>
                        <td><label class="badge badge-success"><?php echo $fetch['FixStatus'] ?></td>
                        <td>
                          <div class="badge badge-pill badge-primary"><?php echo $fetch['Priority'] ?></div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select id="Priority" id="Priority" onchange="window.location.href='../Config/updatepriority.php?Priority='+this.value">
                              <option disabled selected value="">ระดับความสำคัญ</option>
                              <option value="<?php echo '1' . " " . $fetch['EquipmentID']; ?>">1</option>
                              <option value="<?php echo '2' . " " . $fetch['EquipmentID']; ?>">2</option>
                              <option value="<?php echo '3' . " " . $fetch['EquipmentID']; ?>">3</option>
                              <option value="<?php echo '4' . " " . $fetch['EquipmentID']; ?>">4</option>
                              <option value="<?php echo '5' . " " . $fetch['EquipmentID']; ?>">5</option>
                            </select>
                          </div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select name="FixStatus" id="FixStatus" onchange="window.location.href='../Config/updatefixstatus.php?FixStatus='+this.value">
                              <option disabled selected value="">แก้ไขสถานะ</option>
                              <?php
                              $strSQL = "SELECT * FROM FixStatus ORDER BY FixStatus ASC";
                              $objQuery = mysqli_query($conn, $strSQL);
                              while ($objResuut = mysqli_fetch_array($objQuery)) {
                              ?>
                                <option value="<?php echo $objResuut["FixStatus"] . " " . $fetch['EquipmentID']; ?>">
                                  <?php echo $objResuut["FixStatus"]; ?></option>
                              <?php } ?>
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
              <?php
              include '../Body/footer.php';
                }
              ?>