$(function(){

    $('.upload-foto-add').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $('.upload-foto-urutan').val($(this).attr('data-id'));
        $('.upload-foto-input').click();
        return false;
    });
    $('.upload-foto-delete').click(function(){
        var dataId = $(this).parent().find('.upload-foto-add').attr('data-id');
        if (type_upload == 'update') {
            var query_delete = '?type=delete_update';
        } else{
            var query_delete = '?type=delete';
        };
        $.ajax({
            url: url_to_upload_foto_product+query_delete,
            dataType: 'json',
            data: 'id='+dataId,
            type: 'post',
            success: function(msg){
                $('.upload-foto-add-'+ dataId +' img').attr('src', url_to_image_add_foto_product);
                $('.upload-foto-add-'+ dataId).parent().find('.upload-foto-delete').hide();
                return false;
            },
            error: function(msg){
                alert('sending data error, cek your connection');
                console.log(msg);
                return false;
            }
        }); 
        return false;
    });

    // Initialize the jQuery File Upload plugin
    $('.upload-foto-input').fileupload({

        url: url_to_upload_foto_product_baru,
        // This element will accept file drag/drop uploading
        // dropZone: $('.upload-foto-add'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit();
        },

        progress: function(e, data){

        },

        fail:function(e, data){
            // Something has gone wrong!
            alert('Something has gone wrong!');
        },

        done: function(e, data){
            var json = JSON.parse(data.result);
            if (json.status=='success') {
                $('.upload-foto-add-'+ json.urutan +' img').attr('src', json.thumb);
                $('.upload-foto-add-'+ json.urutan).parent().find('.upload-foto-delete').show();
                // $.fancybox.close();
            }else{
                alert(json.msg)
            };
        }

    });


    // Prevent the default action when a file is dropped on the window
    // $(document).on('drop dragover dragend dragexit', function (e) {
    //     if (e.type=='dragover') {
    //         $('.drop-cover-drop').show();
    //         $('.drop-logo-drop').show();
    //     }
    //     if (e.type=='drop' || e.type=='dragend' || e.type=='dragexit') {
    //         $('.drop-cover-drop').hide();
    //         $('.drop-logo-drop').hide();
    //     };

    //     e.preventDefault();
    // });
});

