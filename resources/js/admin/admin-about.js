$('.btn-edit-about').on('click',function(){
    let id = $(this).data('id')
    $.ajax({
        url:`/admin/webcontent/about/${id}/edit`,
        method: "GET",
        success: function(data){
            $('#modal-edit-about').find('.modal-body').html(data)
            $('#modal-edit-about').modal('show')
        },
        error:function(error){
            console.log(error)
        }
    })
})

$('.btn-update-about').on('click',function(){
    let id = $('#form-edit-about').find('#id-data').val()
    let formData = $('#form-edit-about').serialize()
    console.log(formData)
    $.ajax({
        url:`/admin/webcontent/about/${id}`,
        method: "PATCH",
        data:formData,
        success: function(data){
            $('#modal-edit-about').find('.modal-body').html(data)
            $('#modal-edit-about').modal('hide')
            window.location.assign('/admin/webcontent/about')
            $('#alertMessage').html('<div class="alert alert-success">About Us Berhasil Diubah!</div>');
        },
        error:function(response){
            // console.log(response);
            $('#titleError').text(response.responseJSON.errors.title);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#gambarError').text(response.responseJSON.errors.images_id);
        }
    })
})



