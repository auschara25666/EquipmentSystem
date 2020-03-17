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
            <div class="accordion accordion-multi-colored" id="accordion-6" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading-17">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-17" aria-expanded="false" aria-controls="collapse-17">
                      เงื่อนไขการล็อกอิน
                    </a>
                  </h6>
                </div>
                <div id="collapse-17" class="collapse" role="tabpanel" aria-labelledby="heading-17" data-parent="#accordion-6">
                  <div class="card-body">
                    <h4>
                      <ol class="pl-3 mt-4">
                        <li>นักศึกษา Username ใช้ <span class="badge badge-warning">รหัสนักศึกษา : 601234567-8</span></li>
                        <li>อาจารย์/เจ้าหน้าที่ Username ใช้ <span class="badge badge-warning">อีเมล : example@kku.ac.th</span></li>
                      </ol>
                    </h4>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <h2>เข้าสู่ระบบ</h2>
            <form class="pt-3" method="POST" action="Config/check_login.php">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="User_Id" id="User_Id" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="Password" id="Password" placeholder="Password" required>
              </div>
              <div class="mt-3">
                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.php">
                  <h3>เข้าสู่ระบบ</h3>
                </a> -->
                <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="Submit" value="เข้าสู่ระบบ">
              </div>
              <div class="text-center mt-4 font-weight-light">
                <h4><a href="register-student.php" class="text-primary">ลงทะเบียนนักศึกษา</a> | <a href="register-teacher.php" class="text-primary">ลงทะเบียนอาจารย์และเจ้าหน้าที่</a></h4>
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