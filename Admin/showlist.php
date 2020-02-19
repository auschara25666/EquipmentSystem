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
                  <table id="order-listing" class="table table-dark">
                    <thead>
                      <tr>
                        <th>รูปครุภัณฑ์</th>
                        <th>หมายเลขครุภัณฑ์</th>
                        <th>ครุภัณฑ์</th>
                        <th>ประเภท</th>
                        <th>สถานที่</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
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
                                if($fetch["Status"] == "ปกติ") {
                          ?>
                      <tr>
                        <td><img src="../images/DataEquipment/<?=$fetch['EquipmentImg']?>"></td>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['EquipmentType']?></td>
                        <td><?php echo $fetch['Equipmentplace']?></td>
                        <td><label class="badge badge-success"><?php echo $fetch['Status']?></td>
                        <td>
                          <!-- Edit button -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">EDIT</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>EDIT</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                                </td>
                          <!-- Delete button -->
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">DELETE</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>DELETE</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                      }
                      if($fetch["Status"] == "กำลังซ่อม") {
                      ?>
                      <tr>
                        <td><img src="../images/DataEquipment/<?=$fetch['EquipmentImg']?>"></td>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['EquipmentType']?></td>
                        <td><?php echo $fetch['Equipmentplace']?></td>
                        <td><label class="badge badge-info"><?php echo $fetch['Status']?></td>
                        <td>
                         <!-- Edit button -->
                         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">EDIT</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>EDIT</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                                </td>
                          <!-- Delete button -->
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">DELETE</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>DELETE</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                      }
                      if($fetch["Status"] == "ชำรุด") {
                      ?>
                      <tr>
                        <td><img src="../images/DataEquipment/<?=$fetch['EquipmentImg']?>"></td>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['EquipmentType']?></td>
                        <td><?php echo $fetch['Equipmentplace']?></td>
                        <td><label class="badge badge-danger"><?php echo $fetch['Status']?></td>
                        <td>
                          <!-- Edit button -->
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">EDIT</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>EDIT</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                                </td>
                          <!-- Delete button -->
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">DELETE</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>DELETE</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                      }
                      if($fetch["Status"] == "ถูกยืม") {
                      ?>
                      <tr>
                        <td><img src="../images/DataEquipment/<?=$fetch['EquipmentImg']?>"></td>
                        <td><?php echo $fetch['EquipmentID']?></td>
                        <td><?php echo $fetch['EquipmentName']?></td>
                        <td><?php echo $fetch['EquipmentType']?></td>
                        <td><?php echo $fetch['Equipmentplace']?></td>
                        <td><label class="badge badge-warning"><?php echo $fetch['Status']?></td>
                        <td>
                         <!-- Edit button -->
                         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">EDIT</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>EDIT</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                                </td>
                          <!-- Delete button -->
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#exampleModal">DELETE</button>
                          </div>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>DELETE</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                      } }
                      ?>
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
<script src="../../../../js/modal-demo.js"></script>