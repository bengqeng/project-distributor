    $('.btn-edit').on('click',function(){
        let id = $(this).data('id')
        $.ajax({
            url:`/admin/webcontent/carousel/${id}/edit`,
            method: "GET",
            success: function(data){
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('show')
            },
            error:function(error){
                console.log(error)
            }
        })
    })

    $('.btn-update').on('click',function(){
        let id = $('#form-edit').find('#id-data').val()
        let formData = $('#form-edit').serialize()
        console.log(formData)
        $.ajax({
            url:`/admin/webcontent/carousel/${id}`,
            method: "PATCH",
            data:formData,
            success: function(data){
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/admin/webcontent/carousel')
                $('#alertMessage').html('<div class="alert alert-success">Carousel Berhasil Diubah!</div>');
            },
            error:function(err){
                console.log(err.responseJSON)
                let err_log = err.responseJSON.errors;
                if(err.status == 422){
                    if(typeof(err_log.title) !== "undefined"){
                        $('#modal-edit').find('[name="title"]').prev().html(' Title | <span class="text-danger text-sm">'+err_log.title[0]+' </span>')
                    }else {
                        $('#modal-edit').find('[name="title"]').prev().html('<span>Title</span>')
                    }

                    if(typeof(err_log.description) !== "undefined"){
                        $('#modal-edit').find('[name="description"]').prev().html('Deskripsi | <p class="text-danger text-sm">'+err_log.description[0]+' </p>')
                    }else {
                        $('#modal-edit').find('[name="description"]').prev().html('<span>Deskripsi</span>')
                    }

                    if(typeof(err_log.images) !== "undefined"){
                        $('#modal-edit').find('[name="images"]').prev().html('Gambar | <span class="text-danger text-sm">'+err_log.images[0]+' </span>')
                    }else {
                        $('#modal-edit').find('[name="images"]').prev().html('<span>Gambar</span>')
                    }
                }
            }
        })
    })
