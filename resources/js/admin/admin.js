require('./adminlte');
require('./admin-carousel');

window.updateUserReportTable = function (){
  $('#table-users-report').dataTable({
    dom: 'lfrtipB',
    buttons: [
        'excelHtml5', 'csvHtml5', 'pdfHtml5'
    ]
  });
};