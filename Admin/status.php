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
  <title>Admin-สถานะครุภัณฑ์</title>
  <?php
  include '../Body/branner.php';
  include '../Body/menu.php';
  ?>

  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title"><b>สถานะครุภัณฑ์</b></h3>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table table table-bordered table-striped">
                  <thead>
                    <tr class="table-primary">
                      <th width="135px"><b>หมายเลขครุภัณฑ์</b></th>
                      <th><b>ครุภัณฑ์</b></th>
                      <th><B>ประเภท</B></th>
                      <th width="85px"><B>สิทธื์การยืม</B></th>
                      <th><b>สถานะ</b></th>
                      <th width="95px"><b>แก้ไขสถานะ</b></th>
                      <th width="140px"><b>แก้ไขสิทธื์การยืม</b></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,
                                          Equipment.EquipmentTypeID,Equipment.Status,
                                          Status.Status,EquipmentType.EquipmentType,Equipment.Permission
                            FROM Equipment,Status,EquipmentType
                            where Equipment.Status = Status.Status and Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID
                            order by Equipment.EquipmentID ASC";
                    $result = mysqli_query($conn, $sql);
                    while ($fetch = mysqli_fetch_assoc($result)) {
                      if ($fetch['Permission'] == '1') {
                        $Permis = 'ทุกคน';
                      } elseif ($fetch['Permission'] == '2') {
                        $Permis = 'อาจารย์/เจ้าหน้าที่';
                      } else {
                        $Permis = 'ยังไม่กำหนดสิทธิ์';
                      }
                      if ($fetch["Status"] == "ปกติ") {

                    ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['EquipmentType'] ?></td>
                          <td><?php echo $Permis ?></td>
                          <td><label class="badge badge-success"><?php echo $fetch['Status'] ?></label></td>
                          <td>
                            <div class="dropdown">
                              <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <?php
                                $strSQL = "SELECT * FROM Status ORDER BY Status ASC";
                                $objQuery = mysqli_query($conn, $strSQL);
                                while ($objResuut = mysqli_fetch_array($objQuery)) {

                                ?>
                                  <option value="<?php echo $objResuut["Status"] . " " . $fetch['EquipmentID']; ?>">
                                    <?php echo $objResuut["Status"]; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </td>
                          <td>
                            <select class="form-control" name="Permission" id="Permission" onchange="window.location.href='../Config/update-permission.php?Permission='+this.value">
                              <option disabled selected value="">แก้ไขสถานะ</option>
                              <option value="<?php echo "1" .
                                                " " . $fetch['EquipmentID']; ?>">ทุกคน</option>
                              <option value="<?php echo "2" .
                                                " " . $fetch['EquipmentID']; ?>">อาจารย์/เจ้าหน้าที่</option>
                            </select>
                          </td>
                        </tr>
                      <?php
                      }
                      if ($fetch["Status"] == "กำลังซ่อม") {
                      ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['EquipmentType'] ?></td>
                          <td><?php echo $Permis ?></td>
                          <td><label class="badge badge-info"><?php echo $fetch['Status'] ?></label></td>
                          <td>
                            <div class="dropdown">
                              <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <?php
                                $strSQL = "SELECT * FROM Status ORDER BY Status ASC";
                                $objQuery = mysqli_query($conn, $strSQL);
                                while ($objResuut = mysqli_fetch_array($objQuery)) {

                                ?>
                                  <option value="<?php echo $objResuut["Status"] . " " . $fetch['EquipmentID']; ?>">
                                    <?php echo $objResuut["Status"]; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <select name="Permission" id="Permission" onchange="window.location.href='../Config/update-permission.php?Permission='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <option value="<?php echo "1" .
                                                  " " . $fetch['EquipmentID']; ?>">ทุกคน</option>
                                <option value="<?php echo "2" .
                                                  " " . $fetch['EquipmentID']; ?>">อาจารย์/เจ้าหน้าที่</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                      if ($fetch["Status"] == "ชำรุด") {
                      ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['EquipmentType'] ?></td>
                          <td><?php echo $Permis ?></td>
                          <td><label class="badge badge-danger"><?php echo $fetch['Status'] ?></label></td>
                          <td>
                            <div class="dropdown">
                              <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <?php
                                $strSQL = "SELECT * FROM Status ORDER BY Status ASC";
                                $objQuery = mysqli_query($conn, $strSQL);
                                while ($objResuut = mysqli_fetch_array($objQuery)) {

                                ?>
                                  <option value="<?php echo $objResuut["Status"] . " " . $fetch['EquipmentID']; ?>">
                                    <?php echo $objResuut["Status"]; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <select name="Permission" id="Permission" onchange="window.location.href='../Config/update-permission.php?Permission='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <option value="<?php echo "1" .
                                                  " " . $fetch['EquipmentID']; ?>">ทุกคน</option>
                                <option value="<?php echo "2" .
                                                  " " . $fetch['EquipmentID']; ?>">อาจารย์/เจ้าหน้าที่</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                      if ($fetch["Status"] == "ถูกยืม") {
                        $id = $fetch['EquipmentID'];
                      ?>
                        <tr>
                          <td><?php echo $fetch['EquipmentID'] ?></td>
                          <td><?php echo $fetch['EquipmentName'] ?></td>
                          <td><?php echo $fetch['EquipmentType'] ?></td>
                          <td><?php echo $Permis ?></td>
                          <td><label class="badge badge-warning"><?php echo $fetch['Status'] ?>
                              <?php
                              $sql2 = "SELECT user.Name from User,rent,rentdetail 
                             where rentdetail.EquipmentID = '$id' and rentdetail.TransID=rent.TransID and rent.user_id = user.user_id";
                              $result2 = mysqli_query($conn, $sql2);
                              while ($fetch2 = mysqli_fetch_assoc($result2)) {
                              ?>
                                <p>
                                  <p><label class="badge badge-info">ผู้ยืม: <?php echo $fetch2['Name'] ?></label></p>
                                </p>

                            </label></td>
                          <td>
                            <div class="dropdown">
                              <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <?php
                                $strSQL = "SELECT * FROM Status ORDER BY Status ASC";
                                $objQuery = mysqli_query($conn, $strSQL);
                                while ($objResuut = mysqli_fetch_array($objQuery)) {

                                ?>
                                  <option value="<?php echo $objResuut["Status"] . " " . $fetch['EquipmentID']; ?>">
                                    <?php echo $objResuut["Status"]; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <select name="Permission" id="Permission" onchange="window.location.href='../Config/update-permission.php?Permission='+this.value">
                                <option disabled selected value="">แก้ไขสถานะ</option>
                                <option value="<?php echo "1" .
                                                  " " . $fetch['EquipmentID']; ?>">ทุกคน</option>
                                <option value="<?php echo "2" .
                                                  " " . $fetch['EquipmentID']; ?>">อาจารย์/เจ้าหน้าที่</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                      <?php
                              }
                            }
                            if ($fetch["Status"] == "ปลดระวาง") {
                      ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['EquipmentType'] ?></td>
                        <td><?php echo $Permis ?></td>
                        <td><label class="badge badge-primary">**<?php echo $fetch['Status'] ?>**</label></td>
                        <td>
                          <div class="dropdown">
                            <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                              <option disabled selected value="">แก้ไขสถานะ</option>
                              <?php
                              $strSQL = "SELECT * FROM Status ORDER BY Status ASC";
                              $objQuery = mysqli_query($conn, $strSQL);
                              while ($objResuut = mysqli_fetch_array($objQuery)) {

                              ?>
                                <option value="<?php echo $objResuut["Status"] . " " . $fetch['EquipmentID']; ?>">
                                  <?php echo $objResuut["Status"]; ?></option>
                              <?php } ?>
                            </select>

                          </div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select name="Permission" id="Permission" onchange="window.location.href='../Config/update-permission.php?Permission='+this.value">
                              <option disabled selected value="">แก้ไขสถานะ</option>
                              <option value="<?php echo "1" .
                                                " " . $fetch['EquipmentID']; ?>">ทุกคน</option>
                              <option value="<?php echo "2" .
                                                " " . $fetch['EquipmentID']; ?>">อาจารย์/เจ้าหน้าที่</option>
                            </select>
                          </div>
                        </td>
                      </tr>
                  <?php }
                          } ?>

                  </tbody>

                </table>
              <?php
              include '../Body/footer.php';
            }
              ?>
              <script src="../js/toastDemo.js"></script>