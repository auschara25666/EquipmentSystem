$(document).ready(function() {
    // $('.datatable').datatable();
    $("input").not('input[type=submit]').addClass('form-control');
    $('.btn-edit').click(function() {
        // get data
        var EquipmentID = $(this).attr('data-id');
        var EquipmentName = $(this).attr('data-name');
        var EquipmentType = $(this).attr('data-type');
        var Equipmentplace = $(this).attr('data-place');
        var EquipmentImg = $(this).attr('data-img');
        var Detail = $(this).attr('data-detail');

        //set value to modal
        $('#EquipmentID').val(EquipmentID);
        $('#EquipmentName').val(EquipmentName);
        $('#EquipmentType').val(EquipmentType);
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

    });
    $('.view_data').click(function() {
        var EquipmentIDdetail = $(this).attr("id-detail");
        $('#EquipmentIDdetail').val(EquipmentIDdetail);

        $('#dataModal').modal('show');

    });
});