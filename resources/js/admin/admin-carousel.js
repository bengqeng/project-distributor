$('.btn-edit-caro').on('click',function(){
    let id = $(this).data('id')
    $.ajax({
        url:`/admin/webcontent/carousel/${id}/edit`,
        method: "GET",
        success: function(data){
            $('#modal-edit-caro').find('.modal-body').html(data)
            $('#modal-edit-caro').modal('show')
        },
        error:function(error){
            console.log(error)
        }
    })
})

$('.btn-update-caro').on('click',function(){
    let id = $('#form-edit-caro').find('#id-data').val()
    let formData = $('#form-edit-caro').serialize()
    console.log(formData)
    $.ajax({
        url:`/admin/webcontent/carousel/${id}`,
        method: "PATCH",
        data:formData,
        success: function(data){
            $('#modal-edit-caro').find('.modal-body').html(data)
            $('#modal-edit-caro').modal('hide')
            window.location.assign('/admin/webcontent/carousel')
            $('#alertMessage').html('<div class="alert alert-success">Carousel Berhasil Diubah!</div>');
        },
        error:function(response){
            // console.log(response);
            $('#titleError').text(response.responseJSON.errors.title);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#gambarError').text(response.responseJSON.errors.images_id);
        }
    })
})



