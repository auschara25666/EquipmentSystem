<?php
if (!isset($_SESSION)) {
  session_start();
}
if ($_SESSION['User_id'] == "") {
  echo "<script>{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";
  exit();
}

if ($_SESSION['Role'] != "admin") {
  echo "<script>{document.location.href='http://10.199.66.227/SoftEn2020/Sec03/Perfect/EquipmentSystem/login.php'};</script>";

  exit();
}else{
  
  include 'Body/header-index.php';
?>

  <title>Admin-Home</title>
  <div class="container-scroller">
    <?php
    include 'Body/branner-index.php';
    ?>
    <div class="container-fluid page-body-wrapper">
      <?php
      include 'Body/menu-index.php';
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Admin-Home</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">

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
  include 'Body/footer-index.php';
  ?>
<?php } ?>