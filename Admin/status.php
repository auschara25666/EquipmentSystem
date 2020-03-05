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
        <h3 class="card-title">สถานะครุภัณฑ์</h3>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table">
                <thead>
                  <tr>
                    <th>หมายเลขครุภัณฑ์</th>
                    <th>ครุภัณฑ์</th>
                    <th>ประเภท</th>
                    <th>สถานะ</th>
                    <th>แก้ไขสถานะ</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,
                                          Equipment.EquipmentTypeID,Equipment.Status,
                                          Status.Status,EquipmentType.EquipmentType
                            FROM Equipment,Status,EquipmentType
                            where Equipment.Status = Status.Status and Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID
                            order by Equipment.EquipmentID ASC";
                  $result = mysqli_query($conn, $sql);
                  while ($fetch = mysqli_fetch_assoc($result)) {
                    if ($fetch["Status"] == "ปกติ") {
                  ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['EquipmentType'] ?></td>
                        <td><label class="badge badge-success"><?php echo $fetch['Status'] ?></label></td>
                        <td>
                          <div class="dropdown">
                            <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                              <option>แก้ไขสถานะ</option>
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
                      </tr>
                    <?php
                    }
                    if ($fetch["Status"] == "กำลังซ่อม") {
                    ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['EquipmentType'] ?></td>
                        <td><label class="badge badge-info"><?php echo $fetch['Status'] ?></label></td>
                        <td>
                          <div class="dropdown">
                            <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                              <option>แก้ไขสถานะ</option>
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
                      </tr>
                    <?php
                    }
                    if ($fetch["Status"] == "ชำรุด") {
                    ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['EquipmentType'] ?></td>
                        <td><label class="badge badge-danger"><?php echo $fetch['Status'] ?></label></td>
                        <td>
                          <div class="dropdown">
                            <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                              <option>แก้ไขสถานะ</option>
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
                      </tr>
                    <?php
                    }
                    if ($fetch["Status"] == "ถูกยืม") {
                    ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID'] ?></td>
                        <td><?php echo $fetch['EquipmentName'] ?></td>
                        <td><?php echo $fetch['EquipmentType'] ?></td>
                        <td><label class="badge badge-warning"><?php echo $fetch['Status'] ?></label></td>
                        <td>
                          <div class="dropdown">
                            <select name="Status" id="Status" onchange="window.location.href='../Config/update.php?Status='+this.value">
                              <option>แก้ไขสถานะ</option>
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
                      </tr>
                  <?php }
                  } ?>

                </tbody>

              </table>
              <?php
              include '../Body/footer.php';
                }
              ?>