$('.btn-edit-social').on('click',function(){
    let id = $(this).data('id')
    $.ajax({
        url:`/admin/webcontent/social/${id}/edit`,
        method: "GET",
        success: function(data){
            $('#modal-edit-social').find('.modal-body').html(data)
            $('#modal-edit-social').modal('show')
        },
        error:function(error){
            console.log(error)
        }
    })
})

$('.btn-update-social').on('click',function(){
    let id = $('#form-edit-social').find('#id-data').val()
    let formData = $('#form-edit-social').serialize()
    console.log(formData)
    $.ajax({
        url:`/admin/webcontent/social/${id}`,
        method: "PATCH",
        data:formData,
        success: function(data){
            $('#modal-edit-social').find('.modal-body').html(data)
            $('#modal-edit-social').modal('hide')
            window.location.assign('/admin/webcontent/social')
            $('#alertMessage').html('<div class="alert alert-success">Sosial Media Berhasil Diubah!</div>');
        },
        error:function(response){
            // console.log(response);
            $('#titleError').text(response.responseJSON.errors.title);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#gambarError').text(response.responseJSON.errors.images_id);
        }
    })
})



