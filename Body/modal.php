<!-- modal Edit-->
<div class="modal fade" id="fromEdit">
  <div class="modal-dialog" role="document">
    <form action="../Config/save-edit.php">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">แก้ไข</h3>
          <button type="button" name="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- /.modal-header -->

        <div class="modal-body">

          <div class="form-group">
            <label>หมายเลขครุภัณฑ์</label>
            <input type="text" name="EquipmentID" id="EquipmentID" class="form-control" disabled />
            <input type="hidden" name="EquipmentID" id="EquipmentID" class="form-control" disabled />
          </div>
          <div class="form-group">
            <label>ชื่อครุภัณฑ์</label>
            <input name="EquipmentName" id="EquipmentName" class="form-control" required />
          </div>
          <div class="form-group">

            <label for="EquipmentType" name="EquipmentType" id="EquipmentType">ประเภทครุภัณฑ์</label>
            <select required name="EquipmentTypeID" id="EquipmentTypeID" class="form-control">
              <option disabled selected value="EquipmentType">แก้ไขประเภทครุภัณฑ์</option>
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

<!-- Add modal -->
<div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <form id="insert_form" action="../Config/insert.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">เพิ่มอุปกรณ์</h4>
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
            <input type="text" name="EquipmentID" id="EquipmentID" class="form-control" required />
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

        </div>
        <div class="modal-footer">
          <input type="submit" name="insert" id="insert" value="บันทึก" class="btn btn-success" />
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
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
        <h4 class="modal-title">รายละเอียดครุภัณฑ์</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-form-label" for="EquipmentID">หมายเลขครุภัณฑ์</label>
          <p><input type="text" value="" disabled='disabled' />
            <input type="hidden" name="EquipmentID" id="EquipmentID" value="">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="EquipmentName">ครุภัณฑ์</label>
          <input type="text" name="EquipmentName" id="EquipmentName" value="">
        </div>

        <div class="form-group">
          <label class="col-form-label" for="EquipmentType">ประเภทครุภัณฑ์</label>
          <input type="text" name="EquipmentType" id="EquipmentType" value="">
        </div>

        <div class="form-group">
          <label class="col-form-label" for="Equipmentplace">สถานที่</label>
          <input type="text" name="Equipmentplace" id="Equipmentplace" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Delete modal -->
<div class="modal fade" id="fromDel">
  <div class="modal-dialog" role="document">
    <form action="../Config/delete.php?EquipmentIDdel=?" +this.value>
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">ลบ</h3>
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