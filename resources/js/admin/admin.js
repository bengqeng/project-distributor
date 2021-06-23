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
