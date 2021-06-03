require('./bootstrap_bundle');

if ($('div.success-message-registration')){
  setTimeout(function() {
    $("div.success-message-registration").delay(2000).fadeOut('slow');
  }, 5000);
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#provinsi').change(function (e) {
    e.preventDefault();

    if(this.value == ""){
        html = '<option value="">Pilih Kota atau Kabupaten</option>';
        $('#city').html(html);
        return false;
    }

    $.ajax({
        type: "GET",
        url: "/provinsi/" + this.value + "/kabupaten",
        data: {},
        dataType: "JSON",
        success: function (kabupaten) {
            html = '<option value="">Pilih Kota atau Kabupaten</option>';
            $.each(kabupaten, function (i, v) {
                html += '<option value="'+v.id_kab+'">';
                html += v.nama;
                html += '</option>';
            });
            $('#city').html(html);
        }
    });
});

$('#city').change(function (e) {
    e.preventDefault();

    $.ajax({
        type: "GET",
        url: "/kabupaten/" + this.value + "/kecamatan",
        data: {},
        dataType: "JSON",
        success: function (kabupaten) {
            html = '<option value="">Pilih Kecamatan</option>';
            $.each(kabupaten, function (i, v) {
                html += '<option value="'+v.id_kab+'">';
                html += v.nama;
                html += '</option>';
            });
            $('#kecamatan').html(html);
        }
    });
});
