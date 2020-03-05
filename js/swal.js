$(document).ready(function() {
    $(document).on("click", ".btn-del", function() {
        var EquipmentID = $(this).attr('id');
        var btn = this;
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'EquipmentID =' + EquipmentID;
        if (EquipmentID == '') {
            //alert("Please Fill All Fields");

        } else {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {

                    if (isConfirm) {
                        table.row($(btn).parents('tr')).remove().draw(false);
                        $.ajax({
                            type: "POST",
                            url: "delete.php",
                            data: dataString,
                            cache: false,
                            success: function(result) {
                                swal("Deleted!", "Your Data has been deleted.", "success");

                            }
                        });
                    } else {
                        swal("Cancelled", "Your Data is safe :)", "error");
                    }
                });

        }
        return false;
    });
});