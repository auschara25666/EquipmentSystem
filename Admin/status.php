<?php
  include '../Body/header.php';
?>
<title>Admin-สถานะครุภัณฑ์</title>
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
            <h3 class="card-title">รายการครุภัณฑ์</h3>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table">
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
                            $sql ="SELECT Equipment.EquipmentID,Equipment.EquipmentName,
                                          Equipment.EquipmentTypeID,Equipment.Status,
                                          Status.Status,EquipmentType.EquipmentType
                            FROM Equipment,Status,EquipmentType
                            where Equipment.Status = Status.Status and Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID
                            order by Equipment.EquipmentID ASC";
                            $result = mysqli_query($conn,$sql);
                            while ($fetch = mysqli_fetch_assoc($result)){   
                          ?>
                      <tr>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['EquipmentType']?></td>
                        <td><?php echo $fetch['Status']?></td>
                        <td>
                          <div class="dropdown">
                            <select name="Status" id="Status"
                              onchange="window.location.href='update.php?Status='+this.value">
                              <option >แก้ไขสถานะ</option>
                              <?php
                                      $strSQL = "SELECT * FROM Status ORDER BY Status ASC";
                                      $objQuery = mysqli_query($conn,$strSQL);
                                      while($objResuut = mysqli_fetch_array($objQuery)){
                                      
                                    ?>
                              <option value="<?php echo $objResuut["Status"]."-".$fetch['EquipmentID'];?>">
                                <?php echo $objResuut["Status"];?></option>
                              <?php } }?>
                            </select>
                          </div>
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