<?php
  include 'Body/header-index.php';
  
?>
<title>REGISTER</title>
<style type="text/css">
        .error{ color: red; }
        .success{ color: green; }
</style>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">
                                <h1>ลงทะเบียน</h1>
                            </h1>
                            <form class="form-sample" method="post" action="Config/save_register.php">
                                <p class="card-description">
                                    Personal info
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>ชื่อ</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fname" required="required" class="form-control" placeholder="สมชาย"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>นามสกุล</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="lname" required="required" class="form-control" placeholder="สอนดี"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>ชื่อผู้ใช้</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="user_id" required="required" class="form-control" placeholder="60xxxxxxx-x"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><h4>บทบาท</h4></label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="role" placeholder="เลือกบทบาท">
                                                    <option value="นักศึกษา">นักศึกษา</option>
                                                    <option value="อาจารย์">อาจารย์</option>
                                                    <option value="บุคคลากร">บุคคลากร</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>รหัสผ่าน</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="password" required="required" class="form-control" placeholder="abc12345"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>ยืนยันรหัสผ่าน</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="enpassword" required="required" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>เบอร์โทรศัพท์</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" required="required" class="form-control" placeholder="0123456789"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>อีเมล</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" required="required" class="form-control" placeholder="abc@kkumail.com"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="mt-3">
                        <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit" value="Submit">
                        </div>
                        </form>
                    </div>
                </div>
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