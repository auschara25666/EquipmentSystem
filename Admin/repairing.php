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
          <h3 class="card-title"><b>รายการแจ้งซ่อม</b></h3>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table table table-bordered table-striped">
                  <thead>
                    <tr class="table-primary">
                      <th width="115px"><b>รหัสอุปกรณ์</b></th>
                      <th><b>ชื่ออุปกรณ์</b></th>
                      <th><b>ผู้แจ้ง</b></th>
                      <th><b>สถานะ</b></th>
                      <th width="80px">
                        <center><b>ระดับ<p>ความสำคัญ</p></b></center>
                      </th>
                      <th width="100px"><b>เจ้าหน้าที่</b></th>
                      <th><b>ความสำคัญ</b></th>
                      <th><b>แก้ไขสถานะ</b></th>
                      <th width="50px"><b>รายละเอียด</b></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,repairlist.FixDetail,repairlist.FixDate,
                                          Equipment.Equipmentplace,FixStatus.FixStatus,repairlist.Priority,User.Name,repairlist.staff
                                  FROM Equipment,repairlist,FixStatus,User
                                  where Equipment.EquipmentID = repairlist.EquipmentID and FixStatus.FixStatus = repairlist.FixStatus and repairlist.User_id=User.User_id
                                  order by Priority  DESC";
                    $result = mysqli_query($conn, $sql);
                    while ($fetch = mysqli_fetch_assoc($result)) {
                      if ($fetch['FixStatus'] == "รอดำเนินการ") {
                        $eqid5 = $fetch['EquipmentID'];
                    ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['Name'] ?></td>
                          <td><label class="badge badge-warning"><?php echo $fetch['FixStatus'] ?></td>
                          <td>
                            <center>
                              <div class="badge badge-pill badge-primary"><?php echo $fetch['Priority'] ?></div>
                            </center>
                          </td>
                          <?php
                          $strSQL2 = "SELECT user.Name FROM repairlist,user where EquipmentID = '$eqid5' and user.User_id = repairlist.staff";
                          $objQuery2 = mysqli_query($conn, $strSQL2);
                          while ($objResuut2 = mysqli_fetch_array($objQuery2)) {
                            $nstaff = $objResuut2['Name'];
                          } ?>
                          <td><?php echo $nstaff ?></td>
                          <td>
                            <div class="dropdown">
                              <select id="Priority" id="Priority" onchange="window.location.href='../Config/updatepriority.php?Priority='+this.value">
                                <option disabled selected value="">ระดับความสำคัญ</option>
                                <option value="<?php echo '1' . " " . $fetch['EquipmentID']; ?>">1 - น้อยที่สุด</option>
                                <option value="<?php echo '2' . " " . $fetch['EquipmentID']; ?>">2 - น้อย</option>
                                <option value="<?php echo '3' . " " . $fetch['EquipmentID']; ?>">3 - ปกติ</option>
                                <option value="<?php echo '4' . " " . $fetch['EquipmentID']; ?>">4 - มาก</option>
                                <option value="<?php echo '5' . " " . $fetch['EquipmentID']; ?>">5 - มากที่สุด</option>
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
                          <?php
                          $sql5 = "SELECT *
                              FROM repairlist
                              where repairlist.EquipmentID = '$eqid5'";
                          $result5 = mysqli_query($conn, $sql5);
                          while ($fetch5 = mysqli_fetch_array($result5)) {
                            $fixdate = $fetch5['FixDate'];
                            $fixdetail = $fetch5['FixDetail'];
                            $fixstatus = $fetch5['FixStatus'];
                          }

                          ?>
                          <td>
                            <button class="btn-repair btn btn-info btn-sm" type="button" data-toggle="modal" detail-fixdate="<?php echo $fixdate ?>" detail-fixdetail="<?php echo $fixdetail ?>" detail-fixplace="<?php echo $fetch['Equipmentplace'] ?>" aria-expanded="false">
                              รายละเอียด
                            </button>
                          </td>
                        </tr>
                      <?php
                      }
                      if ($fetch['FixStatus'] == "กำลังดำเนินการ") {
                        $eqid5 = $fetch['EquipmentID'];
                      ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['Name'] ?></td>
                          <td><label class="badge badge-info"><?php echo $fetch['FixStatus'] ?></td>
                          <td>
                            <center>
                              <div class="badge badge-pill badge-primary"><?php echo $fetch['Priority'] ?></div>
                            </center>
                          </td>
                          <?php
                          $strSQL2 = "SELECT user.Name FROM repairlist,user where EquipmentID = '$eqid5' and user.User_id = repairlist.staff";
                          $objQuery2 = mysqli_query($conn, $strSQL2);
                          while ($objResuut2 = mysqli_fetch_array($objQuery2)) {
                            $nstaff = $objResuut2['Name'];
                          } ?>
                          <td><?php echo $nstaff ?></td>
                          <td>
                            <div class="dropdown">
                              <select id="Priority" id="Priority" onchange="window.location.href='../Config/updatepriority.php?Priority='+this.value">
                                <option disabled selected value="">ระดับความสำคัญ</option>
                                <option value="<?php echo '1' . " " . $fetch['EquipmentID']; ?>">1 - น้อยที่สุด</option>
                                <option value="<?php echo '2' . " " . $fetch['EquipmentID']; ?>">2 - น้อย</option>
                                <option value="<?php echo '3' . " " . $fetch['EquipmentID']; ?>">3 - ปกติ</option>
                                <option value="<?php echo '4' . " " . $fetch['EquipmentID']; ?>">4 - มาก</option>
                                <option value="<?php echo '5' . " " . $fetch['EquipmentID']; ?>">5 - มากที่สุด</option>
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
                          <?php
                          $sql5 = "SELECT *
                              FROM repairlist
                              where repairlist.EquipmentID = '$eqid5'";
                          $result5 = mysqli_query($conn, $sql5);
                          while ($fetch5 = mysqli_fetch_array($result5)) {
                            $fixdate = $fetch5['FixDate'];
                            $fixdetail = $fetch5['FixDetail'];
                            $fixstatus = $fetch5['FixStatus'];
                          }

                          ?>
                          <td>
                            <button class="btn-repair btn btn-info btn-sm" type="button" data-toggle="modal" detail-fixdate="<?php echo $fixdate ?>" detail-fixdetail="<?php echo $fixdetail ?>" detail-fixplace="<?php echo $fetch['Equipmentplace'] ?>" aria-expanded="false">
                              รายละเอียด
                            </button>
                          </td>
                        </tr>
                      <?php
                      }
                      if ($fetch['FixStatus'] == "ดำเนินการเสร็จสิ้น") {
                        $eqid5 = $fetch['EquipmentID'];
                      ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['Name'] ?></td>
                          <td><label class="badge badge-success"><?php echo $fetch['FixStatus'] ?></td>
                          <td>
                            <center>
                              <div class="badge badge-pill badge-primary"><?php echo $fetch['Priority'] ?></div>
                            </center>
                          </td>
                          <?php
                          $strSQL2 = "SELECT user.Name FROM repairlist,user where EquipmentID = '$eqid5' and user.User_id = repairlist.staff";
                          $objQuery2 = mysqli_query($conn, $strSQL2);
                          while ($objResuut2 = mysqli_fetch_array($objQuery2)) {
                            $nstaff = $objResuut2['Name'];
                          } ?>
                          <td><?php echo $nstaff ?></td>
                          <td>
                            <div class="dropdown">
                              <select id="Priority" id="Priority" onchange="window.location.href='../Config/updatepriority.php?Priority='+this.value">
                                <option disabled selected value="">ระดับความสำคัญ</option>
                                <option value="<?php echo '1' . " " . $fetch['EquipmentID']; ?>">1 - น้อยที่สุด</option>
                                <option value="<?php echo '2' . " " . $fetch['EquipmentID']; ?>">2 - น้อย</option>
                                <option value="<?php echo '3' . " " . $fetch['EquipmentID']; ?>">3 - ปกติ</option>
                                <option value="<?php echo '4' . " " . $fetch['EquipmentID']; ?>">4 - มาก</option>
                                <option value="<?php echo '5' . " " . $fetch['EquipmentID']; ?>">5 - มากที่สุด</option>
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
                          <?php
                          $sql5 = "SELECT *
                              FROM repairlist
                              where repairlist.EquipmentID = '$eqid5'";
                          $result5 = mysqli_query($conn, $sql5);
                          while ($fetch5 = mysqli_fetch_array($result5)) {
                            $fixdate = $fetch5['FixDate'];
                            $fixdetail = $fetch5['FixDetail'];
                            $fixstatus = $fetch5['FixStatus'];
                          }

                          ?>
                          <td>
                            <button class="btn-repair btn btn-info btn-sm" type="button" data-toggle="modal" detail-fixdate="<?php echo $fixdate ?>" detail-fixdetail="<?php echo $fixdetail ?>" detail-fixplace="<?php echo $fetch['Equipmentplace'] ?>" aria-expanded="false">
                              รายละเอียด
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                      include '../Body/modal.php';
                    }
                    ?>
                  </tbody>

                </table>
                <?php
                include '../Body/footer.php';
                ?>
                <script src="../js/app.js"></script>
              <?php
            }
              ?>