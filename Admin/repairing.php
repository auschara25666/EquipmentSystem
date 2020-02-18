<?php
  include '../Body/header.php';
?>
<title>Admin-รายการแจ้งซ่อม</title>
<div class="container-scroller">
  <?php
      include '../Body/branner.php';
    ?>
  <div class="container-fluid page-body-wrapper">
    <?php
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
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>รหัสอุปกรณ์</th>
                        <th>ชื่ออุปกรณ์</th>
                        <th>รายละอียด</th>
                        <th>วันที่แจ้ง</th>
                        <th>สถานที่</th>
                        <th>สถานะ</th>
                        <th>ระดับความสำคัญ</th>
                        <th>ความสำคัญ</th>
                        <th>แก้ไขสถานะ</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                            $sql ="SELECT Equipment.EquipmentID,Equipment.EquipmentName,repairlist.FixDetail,repairlist.FixDate,
                                          Equipment.Equipmentplace,FixStatus.FixStatus,repairlist.Priority
                                  FROM Equipment,repairlist,FixStatus
                                  where Equipment.EquipmentID = repairlist.EquipmentID and FixStatus.FixStatus = repairlist.FixStatus
                                  order by Priority  DESC";
                            $result = mysqli_query($conn,$sql);
                            while ($fetch = mysqli_fetch_assoc($result)){   
                          ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['FixDetail']?></td>
                        <td><?php echo $fetch['FixDate']?></td>
                        <td><?php echo $fetch['Equipmentplace']?></td>
                        <td><?php echo $fetch['FixStatus']?></td>
                        <td><?php echo $fetch['Priority']?></td>
                        <td>
                          <div class="dropdown">
                            <select id="Priority" id="Priority"
                              onchange="window.location.href='updatepriority.php?Priority='+this.value">
                              <option >ระดับความสำคัญ</option>
                              <option value="<?php echo '1'."-". $fetch['EquipmentID'];?>">1</option>
                              <option value="<?php echo '2'."-". $fetch['EquipmentID'];?>">2</option>
                              <option value="<?php echo '3'."-". $fetch['EquipmentID'];?>">3</option>
                              <option value="<?php echo '4'."-". $fetch['EquipmentID'];?>">4</option>
                              <option value="<?php echo '5'."-". $fetch['EquipmentID'];?>">5</option>
                            </select>
                          </div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <select name="FixStatus" id="FixStatus"
                              onchange="window.location.href='updatefixstatus.php?FixStatus='+this.value">
                              <?php
                                $strSQL = "SELECT * FROM FixStatus ORDER BY FixStatus ASC";
                                $objQuery = mysqli_query($conn,$strSQL);
                                while($objResuut = mysqli_fetch_array($objQuery)){
                              ?>
                              <option value="<?php echo $objResuut["FixStatus"]."-".$fetch['EquipmentID'];?>">
                                <?php echo $objResuut["FixStatus"];?></option>
                              <?php } } ?>
                            </select>
                          </div>
                        </td>
                      </tr>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<?php
  include '../Body/footer.php';
?>