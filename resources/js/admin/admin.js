require('./adminlte');
require('./admin-carousel');
require('./admin-social');
require('./admin-product');
require('./admin-about');

window.updateUserReportTable = function (){
    $('#table-users-report').dataTable({
        dom: 'lfrtipB',
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export'
        }],
    });
};

window.deleteCategoryProduct = function(id){
    $.ajax({
        type: "DELETE",
        url: "product-category/" + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "JSON",
        success: function (response) {
            window.location.href = "product-category";
        }
    });
};
