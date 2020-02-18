<?php
  include '../Body/header.php';
?>
<title>Admin-รายการครุภัณฑ์</title>
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
            <h2 class="card-title">สถานะครุภัณฑ์</h2>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>รูปครุภัณฑ์</th>
                        <th>หมายเลขครุภัณฑ์</th>
                        <th>ครุภัณฑ์</th>
                        <th>ประเภท</th>
                        <th>สถานที่</th>
                        <th>สถานะ</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                            $sql ="SELECT Equipment.EquipmentID,Equipment.EquipmentName,
                                          Equipment.EquipmentTypeID,Equipment.Equipmentplace,Equipment.Status,
                                          Status.Status,EquipmentType.EquipmentType,Equipment.EquipmentImg
                            FROM Equipment,Status,EquipmentType
                            where Equipment.Status = Status.Status and Equipment.EquipmentTypeID = EquipmentType.EquipmentTypeID
                            order by Equipment.EquipmentID ASC";
                            $result = mysqli_query($conn,$sql);
                            while ($fetch = mysqli_fetch_assoc($result)){ 
                          ?>
                      <tr>
                        <td><img src="../images/DataEquipment/<?=$fetch['EquipmentImg']?>"></td>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['EquipmentType']?></td>
                        <td><?php echo $fetch['Equipmentplace']?></td>
                        <td><?php echo $fetch['Status']?></td>
                        <?php
                             }
                          ?>
                      </tr>
                    </tbody>

                  </table>
                </div>
              </div>
              <div class="col-12">

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