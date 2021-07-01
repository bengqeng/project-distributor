require('./adminlte');
require('./admin-carousel');
require('./admin-social');
require('./admin-product');

if ($("#status-message")){
    setTimeout(function(e){
        $("#status-message").animate({ height: 0, opacity: 0 }, 'slow');
    },3000);
}

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
    let product_category = id;
    $.ajax({
        type: "DELETE",
        url: "product-category/" + product_category,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "JSON",
        success: function (response) {
            window.location.href = "product-category";
        }
    });
};

window.addNewCategoryProduct = function(){
    $.ajax({
        type: "GET",
        url: "product-category/create ",
        dataType: "HTML",
        success: function (response) {
            $('div#product_category_modal_content').html(response);
            $('#modal-category-product').modal('show')
        }
    });
};

window.editProductCategory = function (productCategoryid){
    $.ajax({
        type: "GET",
        url: "product-category/" + productCategoryid,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "HTML",
        success: function (response) {
            $('div#product_category_modal_content').html(response);
            $('#modal-category-product').modal('show')
        }
    });
}
