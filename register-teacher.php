<?php
include 'Body/header-index.php';
?>
<title>REGISTER</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style type="text/css">
    .error {
        color: red;
    }

    .success {
        color: green;
    }
</style>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion accordion-multi-colored" id="accordion-6" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-17">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-17" aria-expanded="false" aria-controls="collapse-17">
                                                เงื่อนไขการลงทะเบียน
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collapse-17" class="collapse" role="tabpanel" aria-labelledby="heading-17" data-parent="#accordion-6">
                                        <div class="card-body">
                                            <h4>
                                                <ol class="pl-3 mt-4">
                                                    <li>กรอกอีเมล - เช่น <span class="badge badge-warning">UserID: xxxxxxxx-x</span></li>
                                                    <li>กำหนดรหัสผ่านให้ประกอบไปด้วยตัวอักษรภาษาอังกฤษ และตัวเลขผสมกันอย่างน้อย 8 ตัว เช่น <span class="badge badge-warning">Password: abcd1234</span></li>
                                                </ol>
                                            </h4>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="card-title">
                                <h1>ลงทะเบียน</h1>
                            </h1>
                            <form class="form-sample" method="post" action="Config/save_register-personnel.php">
                                <p class="card-description">
                                    อาจารย์ / เจ้าหน้าที่
                                </p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">
                                                <h4>คำนำหน้า</h4>
                                            </label>
                                            <div class="col-sm-6">
                                                <select required class="form-control" name="Prefix" placeholder="เลือกคำนำหน้า">
                                                    <option value="" disabled selected>คำนำหน้าชื่อ</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="นาย">นาย</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>ชื่อ</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fname" required="required" class="form-control" placeholder="สมชาย" pattern="[^'\0-9]+[^-,]" title=" กรุณากรอกชื่อจริงให้ถูกต้อง" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">
                                                <h4>นามสกุล</h4>
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="lname" required="required" class="form-control" placeholder="สอนดี" pattern="[^'\0-9]+[^-,]" title=" กรุณากรอกชื่อจริงให้ถูกต้อง" />
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
                                                <input type="password" name="password" required="required" class="form-control" placeholder="abc12345" pattern="^(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{8,}$" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>บทบาท</h4>
                                            </label>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="role" id="role" value="อาจารย์" checked>
                                                        อาจารย์
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="role" id="role" value="เจ้าหน้าที่">
                                                        เจ้าหน้าที่
                                                    </label>
                                                </div>
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
                                                <input type="text" name="phone" required="required" class="form-control" placeholder="0123456789" pattern="(\d{10,10})" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">
                                                <h4>อีเมล</h4>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" required="required" class="form-control" placeholder="abc@kkumail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="กรุณากรอกอีเมล์ให้ถูกต้อง" />
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
<script src="js/todolist.js"></script>