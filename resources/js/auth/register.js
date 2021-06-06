$(document).ready(function () {
    validate_register();
});

if ($("#login-message-error")){
    setTimeout(function(e){
        $("div.success-message-registration").delay(2000).fadeOut('slow');
    },3000);
}

$('#provinsi').change(function (e) {
    e.preventDefault();
    validate_register();

    if(this.value == ""){
        kabupaten_html = '<option value="">Pilih Kota atau Kabupaten</option>';
        $('#city').html(kabupaten_html);

        kecamatan_html = '<option value="">Pilih Kecamatan</option>';
        $('#kecamatan').html(kecamatan_html);
        return;
    }

    $('button#loading-kabupaten').removeClass('sr-only');
    $('#city').addClass('sr-only');

    $.ajax({
        type: "GET",
        url: "/provinsi/" + this.value + "/kabupaten",
        data: {},
        dataType: "JSON",
        success: function (kabupaten) {
            html = '<option value="">Pilih Kota atau Kabupaten</option>';
            $.each(kabupaten, function (v1,v2) {
                html += '<option value="'+ v2 +'">';
                html += v1;
                html += '</option>';
            });
            $('#city').html(html);
        }
    });

    setTimeout(function(){
        $('#city').removeClass('sr-only');
        $('button#loading-kabupaten').addClass('sr-only');
    },1000);
});

$('#city').change(function (e) {
    e.preventDefault();
    validate_register();

    if(this.value == ""){
        html = '<option value="">Pilih Kota atau Kabupaten</option>';
        $('#kecamatan').html(html);
        return;
    }

    $('button#loading-kecamatan').removeClass('sr-only');
    $('#kecamatan').addClass('sr-only');

    $.ajax({
        type: "GET",
        url: "/kabupaten/" + this.value + "/kecamatan",
        data: {},
        dataType: "JSON",
        success: function (kabupaten) {
            html = '<option value="">Pilih Kecamatan</option>';
            $.each(kabupaten, function (v1, v2) {
                html += '<option value="'+ v2 +'">';
                html += v1;
                html += '</option>';
            });
            $('#kecamatan').html(html);
        }
    });

    setTimeout(function(){
        $('#kecamatan').removeClass('sr-only');
        $('button#loading-kecamatan').addClass('sr-only');
    },1000);
});

function validate_register() {
    const provinsi = $('#provinsi').find(":selected").val();
    const city = $('#city').find(":selected").val();

    if (provinsi === ""){
        $('#city').attr("disabled", true);
        $('#kecamatan').attr("disabled", true);
        return;
    } else {
        $('#city').removeAttr("disabled");
        $('#kecamatan').removeAttr("disabled");
    }

    if (city === ""){
        $('#kecamatan').attr("disabled", true);
        return;
    } else {
        $('#kecamatan').removeAttr("disabled");
    }

}
