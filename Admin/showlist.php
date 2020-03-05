<?php
session_start();
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
  <title>Admin-รายการครุภัณฑ์</title>
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
          <h1 class="card-title">รายการครุภัณฑ์</h1>
          <div class="row">
            <div class="col-12">
              <div align="right">
                <button type="button" name="add" id="add" data-toggle="modal" class="btn btn-warning btn-add">เพิ่มอุปกรณ์</button>
              </div>
              <div class="table-responsive">
                <table id="order-listing" class="table table">
                  <thead>
                    <tr>
                      <!-- <th>รูปครุภัณฑ์</th> -->
                      <th>หมายเลขครุภัณฑ์</th>
                      <th>ครุภัณฑ์</th>
                      <th>ประเภท</th>
                      <th>สถานที่</th>
                      <th>รายละเอียด</th>
                      <th>สถานะ</th>
                      <!-- <th>รายละเอียด</th> -->
                      <th>แก้ไข/ลบ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,
                                Equipment.EquipmentTypeID,Equipment.Equipmentplace,Equipment.Status,
                                EquipmentType.EquipmentType,Equipment.Detail
                            FROM Equipment,EquipmentType,Status
                            where Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID  and Equipment.Status=Status.status 
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
                          <td>
                            <div class="dropdown">
                              <button type="button" name="button" class="btn btn-info dropdown-toggle drop-edit" data-toggle="dropdown">
                                EDIT
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="btn-edit" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentType'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a></li>
                                <li class="dropdown-item"><a class="btn-del" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a></li>
                                <!-- <li class="dropdown-item"><a class="btn-detail" href="#" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>">รายละเอียด</a></li> -->
                              </ul>
                            </div>
                          </td>
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
                          <td>
                            <div class="dropdown">
                              <button type="button" name="button" class="btn btn-info dropdown-toggle drop-edit" data-toggle="dropdown">
                                EDIT
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="btn-edit" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentType'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a></li>
                                <li class="dropdown-item"><a class="btn-del" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a></li>
                                <!-- <li class="dropdown-item"><a class="btn-detail" href="#" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>">รายละเอียด</a></li> -->
                              </ul>
                            </div>
                          </td>
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
                          <td>
                            <div class="dropdown">
                              <button type="button" name="button" class="btn btn-info dropdown-toggle drop-edit" data-toggle="dropdown">
                                EDIT
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="btn-edit" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentType'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a></li>
                                <li class="dropdown-item"><a class="btn-del" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a></li>
                                <!-- <li class="dropdown-item"><a class="btn-detail" href="#" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>">รายละเอียด</a></li> -->
                              </ul>
                            </div>
                          </td>
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
                          <td><label class="badge badge-warning"><?php echo $fetch['Status'] ?>
                              <?php
                              $sql2 = "SELECT user.fname,user.lname from User,rent,rentdetail 
                             where rentdetail.EquipmentID = '$id' and rentdetail.TransID=rent.TransID and rent.user_id = user.user_id";
                              $result2 = mysqli_query($conn, $sql2);
                              while ($fetch2 = mysqli_fetch_assoc($result2)) {
                              ?>
                                <p>ผู้ยืม: <?php echo $fetch2['fname'] ?> <?php echo $fetch2['lname'] ?></p>

                          </td>
                          <td>
                            <div class="dropdown">
                              <button type="button" name="button" class="btn btn-info dropdown-toggle drop-edit" data-toggle="dropdown">
                                EDIT
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="btn-edit" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentType'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a></li>
                                <li class="dropdown-item"><a class="btn-del" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a></li>
                                <!-- <li class="dropdown-item"><a class="btn-detail" href="#" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>">รายละเอียด</a></li> -->
                              </ul>
                            </div>
                          </td>
                        </tr>
                  <?php
                              }
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