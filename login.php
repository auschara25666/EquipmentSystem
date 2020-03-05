<?php
include 'Body/header-index.php';
?>
<title>LOGIN</title>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo ">
              <img src="images/logo.png" alt="logo" style="width: 300px;">
            </div>
            <h2>เข้าสู่ระบบ</h2>
            <form class="pt-3" method="POST" action="Config/check_login.php">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="User_Id" id="User_Id" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="Password" id="Password" placeholder="Password">
              </div>
              <div class="mt-3">
                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.php">
                  <h3>เข้าสู่ระบบ</h3>
                </a> -->
                <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="Submit" value="เข้าสู่ระบบ">
              </div>
              <div class="text-center mt-4 font-weight-light">
                <h3><a href="register.php" class="text-primary">ลงทะเบียน</a></h3>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<?php
include 'Body/footer-index.php';
?>