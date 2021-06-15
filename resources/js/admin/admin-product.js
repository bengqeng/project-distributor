$('.btn-edit-prod').on('click',function(){
    let id = $(this).data('id')
    $.ajax({
        url:`/admin/webcontent/product/${id}/edit`,
        method: "GET",
        success: function(data){
            $('#modal-edit-prod').find('.modal-body').html(data)
            $('#modal-edit-prod').modal('show')
        },
        error:function(error){
            console.log(error)
        }
    })
})

$('.btn-update-prod').on('click',function(){
    let id = $('#form-edit-prod').find('#id-data').val()
    let formData = $('#form-edit-prod').serialize()
    console.log(formData)
    $.ajax({
        url:`/admin/webcontent/product/${id}`,
        method: "PATCH",
        data:formData,
        success: function(data){
            $('#modal-edit-prod').find('.modal-body').html(data)
            $('#modal-edit-prod').modal('hide')
            window.location.assign('/admin/webcontent/product')
            $('#alertMessage').html('<div class="alert alert-success">product Berhasil Diubah!</div>');
        },
        error:function(response){
            // console.log(response);
            $('#titleError').text(response.responseJSON.errors.title);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#gambarError').text(response.responseJSON.errors.images_id);
        }
    })
})



