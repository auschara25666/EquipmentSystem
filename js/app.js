$(document).ready(function() {
    // $('.datatable').datatable();
    $("input").not('input[type=submit]').addClass('form-control');
    $('.btn-edit').click(function() {
        // get data
        var EquipmentID = $(this).attr('data-id');
        var EquipmentName = $(this).attr('data-name');
        var EquipmentTypeID = $(this).attr('data-type');
        var Equipmentplace = $(this).attr('data-place');
        var EquipmentImg = $(this).attr('data-img');
        var Detail = $(this).attr('data-detail');

        //set value to modal
        $('#EquipmentID').val(EquipmentID);
        $('#EquipmentName').val(EquipmentName);
        $('#EquipmentTypeID').val(EquipmentTypeID);
        $('#Equipmentplace').val(Equipmentplace);
        $('#EquipmentImg').val(EquipmentImg);
        $('#Detail').val(Detail);

        // open modal
        $('#fromEdit').modal('show');

    })

    $('.btn-del').click(function() {
        // get data
        var EquipmentIDdel = $(this).attr('id');
        var EquipmentName = $(this).attr('name');

        //set value to modal
        $('#EquipmentIDdel').val(EquipmentIDdel);
        $('#EquipmentName').val(EquipmentName);

        // var textbody = $('#textbd');
        // $textbody.text('ต้องการลบ ' + EquipmentIDdel + 'จริงหรือไม่ ?');

        $('#fromDel').modal('show');

    })

    $('.btn-add').click(function() {
        // event.preventDefault();
        $('#add_data_Modal').modal('show');

    })
    $('.btn-type').click(function() {
        // event.preventDefault();
        $('#add_type_Modal').modal('show');

    })
    $('.btn-detail').click(function() {
        var EquipmentIDdetail = $(this).attr("id-detail");
        var AddDate = $(this).attr("data-adddate");
        var eqDetail1 = $(this).attr("data-detaileq1");

        $('#EquipmentIDdetail').val(EquipmentIDdetail);
        $('#AddDate').val(AddDate);
        $('#eqDetail1').val(eqDetail1);

        $('#dataModal').modal('show');

    })
    $('.btn-repairdetail').click(function() {
        var rpEquipmentIDdetail = $(this).attr("id-detailrp");
        var rpAddDate = $(this).attr("data-adddaterp");
        var FixStatus = $(this).attr("data-repairstatus");
        var FixDetail = $(this).attr("data-fixdetail");
        var FixDate = $(this).attr("data-fixdate");
        var eqDetail2 = $(this).attr("data-detaileq2");

        $('#rpEquipmentIDdetail').val(rpEquipmentIDdetail);
        $('#rpAddDate').val(rpAddDate);
        $('#FixStatus').val(FixStatus);
        $('#FixDetail').val(FixDetail);
        $('#FixDate').val(FixDate);
        $('#eqDetail2').val(eqDetail2);

        $('#datarepairModal').modal('show');

    })
    $('.btn-rent').click(function() {
            var rEquipmentIDdetail = $(this).attr("id-detail-r");
            var rAddDate = $(this).attr("data-adddate-r");
            var TransID = $(this).attr("data-idr");
            var RentDate = $(this).attr("data-rentdate");
            var ReturnDateFix = $(this).attr("data-returndatefix");
            var ReturnDate = $(this).attr("data-returndate");
            var Phone = $(this).attr("data-phone");
            var User_id = $(this).attr("data-userid");
            var RentStatus = $(this).attr("data-rentstatus");
            var eqDetail3 = $(this).attr("data-detaileq3");

            $('#rEquipmentIDdetail').val(rEquipmentIDdetail);
            $('#rAddDate').val(rAddDate);
            $('#TransID').val(TransID);
            $('#RentDate').val(RentDate);
            $('#ReturnDateFix').val(ReturnDateFix);
            $('#ReturnDate').val(ReturnDate);
            $('#Phone').val(Phone);
            $('#User_id').val(User_id);
            $('#RentStatus').val(RentStatus);
            $('#eqDetail3').val(eqDetail3);

            $('#dataRentModal').modal('show');

        })
        //รายละเอียดหน้าซ่อม
    $('.btn-repair').click(function() {

        var fFixDetail = $(this).attr("detail-fixdetail");
        var fFixDate = $(this).attr("detail-fixdate");
        var fFixPlace = $(this).attr("detail-fixplace");

        $('#fFixDetail').val(fFixDetail);
        $('#fFixDate').val(fFixDate);
        $('#fFixPlace').val(fFixPlace);


        $('#detailrepairModal').modal('show');

    })
});