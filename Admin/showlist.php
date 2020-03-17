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

   <title>Admin-รายการครุภัณฑ์</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <?php
    include '../Body/branner.php';
    include '../Body/menu.php';
    ?>

   <!-- partial -->
   <div class="main-panel">
     <div class="content-wrapper">
       <div class="card">
         <div class="card-body">
           <h1 class="card-title"><b>รายการครุภัณฑ์</b>
             <div align="right">
               <button type="button" name="add" id="add" data-toggle="modal" class="btn btn-warning btn-type">เพิ่มประเภทอุปกรณ์</button>
               <button type="button" name="add" id="add" data-toggle="modal" class="btn btn-warning btn-add">เพิ่มอุปกรณ์</button>
             </div>
           </h1>
           <div class="row">
             <div class="col-12">
               <div class="table-responsive">
                 <table id="order-listing" class="table table table-bordered table-striped">
                   <thead>
                     <tr class="table-primary">
                       <!-- <th>รูปครุภัณฑ์</th> -->
                       <th width="135px"><b>หมายเลขครุภัณฑ์</b></th>
                       <th><b>ครุภัณฑ์</b></th>
                       <th><b>ปีงบประมาณ</b></th>
                       <th><b>ประเภท</b></th>
                       <th width="65px"><b>สถานที่</b></th>
                       <th><b>สถานะ</b></th>
                       <th><b>เพิ่มเติม</b></th>
                       <th><b>แก้ไข/ลบ</b></th>
                     </tr>
                   </thead>
                   <tbody class="table-striped">
                     <?php
                      $sql = "SELECT Equipment.EquipmentID,Equipment.EquipmentName,Equipment.fiscal_year,
                                Equipment.EquipmentTypeID,Equipment.Equipmentplace,Equipment.AddDate,Equipment.Status,
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
                           <td>25<?php echo $fetch['fiscal_year'] ?></td>
                           <td><?php echo $fetch['EquipmentType'] ?></td>
                           <td><?php echo $fetch['Equipmentplace'] ?></td>
                           <td><label class="badge badge-success"><?php echo $fetch['Status'] ?></td>
                           <td>
                             <button class="btn-detail btn btn-info btn-sm" type="button" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>" data-detaileq1="<?php echo $fetch['Detail'] ?>" data-adddate="<?php echo $fetch['AddDate'] ?>" aria-expanded="false">
                               รายละเอียด
                             </button>
                           </td>
                           <td>
                             <div class="dropdown">
                               <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 EDIT
                                 <i class="fa fa-cog"></i>
                                 <span class="caret"></span>
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                 <a class="btn-edit dropdown-item" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentTypeID'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a>
                                 <a class="btn-del dropdown-item" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a>
                                 <!-- <a class="btn-detail dropdown-item" href="#" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>" data-adddate="<?php echo $fetch['AddDate'] ?>">รายละเอียด</a> -->
                               </div>
                             </div>
                           </td>
                         </tr>
                       <?php
                        } else if ($fetch["Status"] == "กำลังซ่อม") {
                          $eqid2 = $fetch['EquipmentID'];
                        ?>
                         <tr>
                           <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                           <td><?php echo $fetch['EquipmentID'] ?></td>
                           <td><?php echo $fetch['EquipmentName'] ?></td>
                           <td>25<?php echo $fetch['fiscal_year'] ?></td>
                           <td><?php echo $fetch['EquipmentType'] ?></td>
                           <td><?php echo $fetch['Equipmentplace'] ?></td>
                           <td><label class="badge badge-info"><?php echo $fetch['Status'] ?></td>
                           <?php
                            $sql2 = "SELECT repairlist.EquipmentID,Equipment.Equipmentplace,Equipment.AddDate,repairlist.FixStatus,repairlist.FixDetail,repairlist.FixDate
                              FROM Equipment,repairlist
                              where repairlist.EquipmentID = '$eqid2' and repairlist.EquipmentID = Equipment.EquipmentID";
                            $result2 = mysqli_query($conn, $sql2);
                            while ($fetch2 = mysqli_fetch_array($result2)) {
                              $fixdate = $fetch2['FixDate'];
                              $fixdetail = $fetch2['FixDetail'];
                              $fixstatus = $fetch2['FixStatus'];
                            }
                            ?>
                           <td>
                             <button class="btn-repairdetail btn btn-info btn-sm" type="button" data-toggle="modal" id-detailrp="<?php echo $fetch['EquipmentID'] ?>" data-detaileq2="<?php echo $fetch['Detail'] ?>" data-adddaterp="<?php echo $fetch['AddDate'] ?>" data-fixdate="<?php echo $fixdate ?>" data-fixdetail="<?php echo $fixdetail ?>" data-repairstatus="<?php echo $fixstatus ?>" aria-expanded="false">
                               รายละเอียด
                             </button>
                           </td>
                           <td>
                             <div class="dropdown">
                               <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 EDIT
                                 <i class="fa fa-cog"></i>
                                 <span class="caret"></span>
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                 <a class="btn-edit dropdown-item" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentTypeID'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a>
                                 <a class="btn-del dropdown-item" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a>
                               </div>
                             </div>
                           </td>

                         </tr>
                       <?php
                        } else if ($fetch["Status"] == "ชำรุด") {
                          $eqid2 = $fetch['EquipmentID'];
                        ?>
                         <tr>
                           <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                           <td><?php echo $fetch['EquipmentID'] ?></td>
                           <td><?php echo $fetch['EquipmentName'] ?></td>
                           <td>25<?php echo $fetch['fiscal_year'] ?></td>
                           <td><?php echo $fetch['EquipmentType'] ?></td>
                           <td><?php echo $fetch['Equipmentplace'] ?></td>
                           <td><label class="badge badge-danger"><?php echo $fetch['Status'] ?></td>
                           <?php
                            $sql2 = "SELECT repairlist.EquipmentID,Equipment.Equipmentplace,Equipment.AddDate,repairlist.FixStatus,repairlist.FixDetail,repairlist.FixDate
                              FROM Equipment,repairlist
                              where repairlist.EquipmentID = '$eqid2' and repairlist.EquipmentID = Equipment.EquipmentID";
                            $result2 = mysqli_query($conn, $sql2);
                            while ($fetch2 = mysqli_fetch_array($result2)) {
                              $fixdate = $fetch2['FixDate'];
                              $fixdetail = $fetch2['FixDetail'];
                              $fixstatus = $fetch2['FixStatus'];
                            }
                            ?>
                           <td>
                             <button class="btn-repairdetail btn btn-info btn-sm" type="button" data-toggle="modal" id-detailrp="<?php echo $fetch['EquipmentID'] ?>" data-detaileq2="<?php echo $fetch['Detail'] ?>" data-adddaterp="<?php echo $fetch['AddDate'] ?>" data-fixdate="<?php echo $fixdate ?>" data-fixdetail="<?php echo $fixdetail ?>" data-repairstatus="<?php echo $fixstatus ?>" aria-expanded="false">
                               รายละเอียด
                             </button>
                           </td>
                           <td>
                             <div class="dropdown">
                               <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 EDIT
                                 <i class="fa fa-cog"></i>
                                 <span class="caret"></span>
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                 <a class="btn-edit dropdown-item" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentTypeID'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a>
                                 <a class="btn-del dropdown-item" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a>
                               </div>
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
                           <td>25<?php echo $fetch['fiscal_year'] ?></td>
                           <td><?php echo $fetch['EquipmentType'] ?></td>
                           <td><?php echo $fetch['Equipmentplace'] ?></td>
                           <?php
                            $sql3 = "SELECT user.User_id,user.Name,user.Phone,rentdetail.TransID,rentdetail.RentDate,rentdetail.ReturnDateFix,rentdetail.ReturnDate,rentdetail.RentStatus from User,rent,rentdetail 
                             where rentdetail.EquipmentID = '$id' and rentdetail.TransID=rent.TransID and rent.user_id = user.user_id";
                            $result3 = mysqli_query($conn, $sql3);
                            while ($fetch3 = mysqli_fetch_assoc($result3)) {
                              $idr = $fetch3['TransID'];
                              $rentdate = $fetch3['RentDate'];
                              $returndatefix = $fetch3['ReturnDateFix'];
                              $returndate = $fetch3['ReturnDate'];
                              $rentstatus = $fetch3['RentStatus'];
                              $name = $fetch3['Name'];
                              $userid = $fetch3['User_id'] . '   ' . $fetch3['Name'] . '   เบอร์ติดต่อ :' . $fetch3['Phone'];
                            }
                            ?>
                           <td><label class="badge badge-warning"><?php echo $fetch['Status'] ?>
                               <p>
                                 <p><label class="badge badge-info">ผู้ยืม: <?php echo $name ?></label></p>
                               </p>
                             </label>
                           </td>
                           <td>
                             <button class="btn-rent btn btn-info btn-sm" type="button" data-toggle="modal" id-detail-r="<?php echo $fetch['EquipmentID'] ?>" data-detaileq3="<?php echo $fetch['Detail'] ?>" data-adddate-r="<?php echo $fetch['AddDate'] ?>" data-idr="<?php echo $idr ?>" data-rentdate="<?php echo $rentdate ?>" data-returndatefix="<?php echo $returndatefix ?>" data-returndate="<?php echo $returndate ?>" data-rentstatus="<?php echo $rentstatus ?>" data-userid="<?php echo $userid ?>" aria-expanded="false">
                               รายละเอียด
                             </button>
                           </td>
                           <td>
                             <div class="dropdown">
                               <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 EDIT
                                 <i class="fa fa-cog"></i>
                                 <span class="caret"></span>
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                 <a class="btn-edit dropdown-item" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentTypeID'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a>
                                 <a class="btn-del dropdown-item" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a>
                                 <!-- <a class="btn-rent dropdown-item" href="#" data-toggle="modal" id-detail-r="<?php echo $fetch['EquipmentID'] ?>" data-adddate-r="<?php echo $fetch['AddDate'] ?>" data-idr="<?php echo $idr ?>" data-rentdate="<?php echo $rentdate ?>" data-returndatefix="<?php echo $returndatefix ?>" data-returndate="<?php echo $returndate ?>" data-rentstatus="<?php echo $rentstatus ?>" data-userid="<?php echo $userid ?>">รายละเอียด</a> -->
                               </div>
                             </div>
                           </td>
                         </tr>
                       <?php

                          // include '../Body/modal.php';
                        } else if ($fetch["Status"] == "ปลดระวาง") {
                        ?>
                         <tr>
                           <!-- <td><img src="../images/DataEquipment/<?= $fetch['EquipmentImg'] ?>"></td> -->
                           <td><?php echo $fetch['EquipmentID'] ?></td>
                           <td><?php echo $fetch['EquipmentName'] ?></td>
                           <td>25<?php echo $fetch['fiscal_year'] ?></td>
                           <td><?php echo $fetch['EquipmentType'] ?></td>
                           <td><?php echo $fetch['Equipmentplace'] ?></td>
                           <td><label class="badge badge-primary">**<?php echo $fetch['Status'] ?>**</td>
                           <td>
                             <button class="btn-detail btn btn-info btn-sm" type="button" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>" data-detaileq1="<?php echo $fetch['Detail'] ?>" data-adddate="<?php echo $fetch['AddDate'] ?>" aria-expanded="false">
                               รายละเอียด
                             </button>
                           </td>
                           <td>
                             <div class="dropdown">
                               <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 EDIT
                                 <i class="fa fa-cog"></i>
                                 <span class="caret"></span>
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                 <a class="btn-edit dropdown-item" href="#" data-id="<?php echo $fetch['EquipmentID'] ?>" data-name="<?php echo $fetch['EquipmentName'] ?>" data-type="<?php echo $fetch['EquipmentTypeID'] ?>" data-place="<?php echo $fetch['Equipmentplace'] ?>" data-img=" <?php echo $fetch['EquipmentImg'] ?>" data-detail="<?php echo $fetch['Detail'] ?>">แก้ไข</a>
                                 <a class="btn-del dropdown-item" href="#" data-toggle="modal" id="<?php echo $fetch['EquipmentID'] ?>">ลบ</a>
                                 <!-- <a class="btn-detail dropdown-item" href="#" data-toggle="modal" id-detail="<?php echo $fetch['EquipmentID'] ?>" data-adddate="<?php echo $fetch['AddDate'] ?>">รายละเอียด</a> -->
                               </div>
                             </div>
                           </td>
                         </tr>
                     <?php
                          // include '../Body/modal.php';
                        }
                        include '../Body/modal.php';
                      }
                      ?>
                   </tbody>
                 </table>

                 <div class="col-md-2"><?php


                                        ?></div>
                 <?php

                  include '../Body/footer.php';
                  ?>
                 <script src="../js/app.js"></script>
               <?php
              }
                ?>