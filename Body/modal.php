<!-- modal Edit-->
<div class="modal fade" id="fromEdit">
  <div class="modal-dialog" role="document">
    <form action="../Config/save-edit.php">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"><b>แก้ไขข้อมูล</b></h3>
          <button type="button" name="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- /.modal-header -->

        <div class="modal-body">

          <div class="form-group">
            <label>หมายเลขครุภัณฑ์</label>
            <!-- <input type="text" name="EquipmentID" id="EquipmentID" class="form-control" disabled /> -->
            <input type="text" name="EquipmentID" id="EquipmentID" class="form-control" readonly="" />
          </div>
          <div class="form-group">
            <label>ชื่อครุภัณฑ์</label>
            <input name="EquipmentName" id="EquipmentName" class="form-control" required />
          </div>

          <div class="form-group">

            <label>ประเภทครุภัณฑ์</label>
            <INPUT TYPE="hidden" for="EquipmentTypeID" NAME="EquipmentTypeID" id="EquipmentTypeID" class="form-control" readonly="" />
            <select class="form-control" type="text" name="EquipmentTypeID" id="EquipmentTypeID" require>
              <option disabled selected value="">"แก้ไขประเภทครุภัณฑ์"</option>
              <?php
              $strSQL = "SELECT * FROM EquipmentType ORDER BY EquipmentTypeID ASC";
              $objQuery = mysqli_query($conn, $strSQL);
              while ($objResuut = mysqli_fetch_array($objQuery)) {
              ?>
                
                <option value="<?php echo $objResuut["EquipmentTypeID"]; ?>">
                  <?php echo $objResuut["EquipmentTypeID"]; ?>-<?php echo $objResuut["EquipmentType"]; ?></option>
              <?php }
              ?>
            </select>

          </div>

          <!-- <div class="form-group">

            <label for="EquipmentTypeID">ประเภทครุภัณฑ์</label>
            <?php
            // $i = $fetch['EquipmentTypeID'];
            ?>
            <span><?= $ggg ?></span>
            <input name="EquipmentTypeID" id="EquipmentTypeID" class="form-control" />
            <select required name="EquipmentTypeID" id="EquipmentTypeID" class="form-control">
              <option disabled value="">แก้ไขประเภทครุภัณฑ์</option>
              <?php
              // $strSQL = "SELECT * FROM EquipmentType ORDER BY EquipmentTypeID ASC";
              // $objQuery = mysqli_query($conn, $strSQL);
              // while ($objResuut = mysqli_fetch_array($objQuery)) {
              ?>
                <option value="<?php echo $objResuut["EquipmentTypeID"]; ?>">
                  <?php echo $objResuut["EquipmentTypeID"]; ?>-<?php echo $objResuut["EquipmentType"]; ?></option>
              <?php //} 
              ?>
            </select>
          </div> -->

          <div class="form-group">
            <label>สถานที่</label>
            <input type="text" name="Equipmentplace" id="Equipmentplace" class="form-control" required />
          </div>

          <div class="form-group">
            <label>รายละเอียดครุภัณฑ์</label>
            <input type="text" name="Detail" id="Detail" class="form-control" required />
          </div>

        </div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="บันทึก">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div><!-- /.modal-footer -->
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade -->

<!-- Add Equipment modal -->
<div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <form id="insert_form" action="../Config/insert.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>เพิ่มครุภัณฑ์</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <!-- <div class="form-group">
            <label class="col-form-label">เลือกรูปภาพ</label><br>
            <input class="form-control" type="file" name="EquipmentImg">
          </div> -->
          <div class="form-group">
            <label>ปีงบประมาณ</label>
            <select required name="Year" id="Year" class="form-control">
              <option disabled selected value="">เลือกปีงบประมาณ</option>
              <option value="50">2550</option>
              <option value="51">2551</option>
              <option value="52">2552</option>
              <option value="53">2553</option>
              <option value="54">2554</option>
              <option value="55">2555</option>
              <option value="56">2556</option>
              <option value="57">2557</option>
              <option value="58">2558</option>
              <option value="59">2569</option>
              <option value="60">2560</option>
              <option value="61">2561</option>
              <option value="62">2562</option>
              <option value="63">2563</option>
            </select>
          </div>

          <div class="form-group">
            <label>ประเภทครุภัณฑ์</label>
            <select required name="EquipmentTypeID" id="EquipmentTypeID" class="form-control">
              <option disabled selected value="">เลือกประเภทครุภัณฑ์</option>
              <?php
              $strSQL = "SELECT * FROM EquipmentType ORDER BY EquipmentTypeID ASC";
              $objQuery = mysqli_query($conn, $strSQL);
              while ($objResuut = mysqli_fetch_array($objQuery)) {
              ?>
                <option value="<?php echo $objResuut["EquipmentTypeID"]; ?>">
                  <?php echo $objResuut["EquipmentTypeID"]; ?>-<?php echo $objResuut["EquipmentType"]; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>หมายเลขครุภัณฑ์</label>
            <input type="text" name="EquipmentID" id="EquipmentID" class="form-control" required pattern=".{1,6}" />
          </div>
          <div class="form-group">
            <label>ชื่อครุภัณฑ์</label>
            <input name="EquipmentName" id="EquipmentName" class="form-control" required />
          </div>
          <div class="form-group">
            <label>สถานที่</label>
            <input type="text" name="Equipmentplace" id="Equipmentplace" class="form-control" required />
          </div>
          <div class="form-group">
            <label>รายละเอียดครุภัณฑ์</label>
            <input type="text" name="Detail" id="Detail" class="form-control" required />
          </div>

          <div class="form-group">
            <label>สิทธิ์ในการยืม</label>
            <div required class="row">
              <div class="col-md-2">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" name="Permission" id="Permission" class="form-check-input" value="1" checked>
                    ทุกคน
                  </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" name="Permission" id="Permission" class="form-check-input" value="2">
                    อาจารย์/เจ้าหน้าที่
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="insert" id="insert" value="บันทึก" class="btn btn-success" />
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- view detail modal -->
<div id="dataModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><B>รายละเอียดครุภัณฑ์</B></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-form-label">หมายเลขครุภัณฑ์</label>
          <input type="text" name="EquipmentIDdetail" id="EquipmentIDdetail" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="AddDate">วันที่เพิ่มครุภัณฑ์</label>
          <input type="text" name="AddDate" id="AddDate" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="eqDetail1">รายละเอียดครุภัณฑ์</label>
          <input type="text" name="eqDetail1" id="eqDetail1" readonly="">
        </div>

        <!-- <div class="form-group">
          <label class="col-form-label" for="EquipmentType">ประเภทครุภัณฑ์</label>
          <input type="text" name="EquipmentType" id="EquipmentType" value="">
        </div> -->

        <!-- <div class="form-group">
          <label class="col-form-label" for="Equipmentplace">สถานที่</label>
          <input type="text" name="Equipmentplace" id="Equipmentplace" value="">
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- view repairdetail modal -->
<div id="datarepairModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><B>รายละเอียดครุภัณฑ์</B></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-form-label" for="rpEquipmentIDdetail">หมายเลขครุภัณฑ์</label>
          <input type="text" name="rpEquipmentIDdetail" id="rpEquipmentIDdetail" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="rpAddDate">วันที่เพิ่มครุภัณฑ์</label>
          <input type="text" name="rpAddDate" id="rpAddDate" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="eqDetail2">รายละเอียดครุภัณฑ์</label>
          <input type="text" name="eqDetail2" id="eqDetail2" readonly="">
        </div>
        <div class="modal-header">
          <h4 class="modal-title"><b>รายละเอียดการซ่อมครุภัณฑ์</b></h4>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="FixDetail">รายละเอียดการชำรุด</label>
          <input type="text" name="FixDetail" id="FixDetail" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="FixDate">วันที่แจ้งซ่อม</label>
          <input type="text" name="FixDate" id="FixDate" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="FixStatus">สถานะการซ่อมครุภัณฑ์</label>
          <input type="text" name="FixStatus" id="FixStatus" readonly="">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- view Rentdetail modal -->
<div id="dataRentModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><B>รายละเอียดครุภัณฑ์</B></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-form-label" for="rEquipmentIDdetail">หมายเลขครุภัณฑ์</label>
          <input type="text" name="rEquipmentIDdetail" id="rEquipmentIDdetail" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="rAddDate">วันที่เพิ่มครุภัณฑ์</label>
          <input type="text" name="rAddDate" id="rAddDate" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="eqDetail3">รายละเอียดครุภัณฑ์</label>
          <input type="text" name="eqDetail3" id="eqDetail3" readonly="">
        </div>
        <div class="modal-header">
          <h4 class="modal-title"><b>รายละเอียดการยืมครุภัณฑ์</b></h4>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="TransID">หมายเลขรายการยืม</label>
          <input type="text" name="TransID" id="TransID" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="User_id">ผู้ยืม</label>
          <input type="text" name="User_id" id="User_id" readonly="">
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label class="col-form-label" for="RentDate">วันที่ยืม</label>
              <input type="text" name="RentDate" id="RentDate" readonly="">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="col-form-label" for="ReturnDateFix">วันที่ต้องคืน</label>
              <input type="text" name="ReturnDateFix" id="ReturnDateFix" readonly="">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="col-form-label" for="ReturnDate">วันที่คืน</label>
              <input type="text" name="ReturnDate" id="ReturnDate" readonly="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="RentStatus">สถานะการยืม</label>
          <input type="text" name="RentStatus" id="RentStatus" readonly="">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete modal -->
<div id="fromDel" class="modal fade">
  <div class="modal-dialog" role="document">
    <form action="../Config/delete.php?EquipmentIDdel=?" +this.value>
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"><b>ลบครุภัณฑ์</b></h3>
          <button type="button" name="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- /.modal-header -->

        <div class="modal-body">
          <h2>ต้องการลบจริงหรือไม่?</h2>
        </div><!-- /.modal-body -->

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="EquipmentIDdel" id="EquipmentIDdel">ลบ</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div><!-- /.modal-footer -->
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade -->

<!-- Add EquipmentType modal -->
<div id="add_type_Modal" class="modal fade">
  <div class="modal-dialog">
    <form id="insert_form" action="../Config/insert-equipmenttype.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">เพิ่มประเภทครุภัณฑ์</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>ประเภทครุภัณฑ์</label>
            <input type="text" name="EquipmentType" id="EquipmentType" class="form-control" required pattern="[^()/><\][\\\x22,;|]+" title="กรุณากรอกประเภทครุภัณฑ์ให้ถูกต้อง" />
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="insert" id="insert" value="บันทึก" class="btn btn-success" />
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- view รายละเอียดหน้าซ่อม modal -->
<div id="detailrepairModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>รายละเอียดการซ่อมครุภัณฑ์</b></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-form-label" for="f">รายละเอียดการชำรุด</label>
          <input type="text" name="fFixDetail" id="fFixDetail" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="fFixDate">วันที่แจ้งซ่อม</label>
          <input type="text" name="fFixDate" id="fFixDate" readonly="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="fFixPlace">สถานที่</label>
          <input type="text" name="fFixPlace" id="fFixPlace" readonly="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>