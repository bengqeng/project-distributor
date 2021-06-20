require('./adminlte');
require('./admin-carousel');
require('./admin-social');
require('./admin-product');
require('./admin-about');

window.updateUserReportTable = function (){
    $('#table-users-report').dataTable({
        dom: 'lfrtipB',
        buttons: [
            'excelHtml5', 'csvHtml5', 'pdfHtml5'
        ]
    });
};
