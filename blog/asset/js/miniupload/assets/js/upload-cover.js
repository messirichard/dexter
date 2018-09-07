$(function(){
    var jumlah_cover_upload = 0;

    $('#drop-cover a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload-cover').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#upload-cover'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {

            jumlah_cover_upload = jumlah_cover_upload + 1;

            // membatalkan upload
            if (jumlah_cover_upload > 1) {
                jqXHR.abort();
            }else{
                // Automatically upload the file once it is added to the queue
                var jqXHR = data.submit();
            };
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
                $('#upload-cover img').attr('src', json.thumb);
                // $.fancybox.close();
            }else{
                alert(json.msg)
            };
            jumlah_cover_upload = 0;
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover dragend dragexit', function (e) {
        if (e.type=='dragover') {
            $('.drop-cover-drop').show();
            $('.drop-logo-drop').show();
        }
        if (e.type=='drop' || e.type=='dragend' || e.type=='dragexit') {
            $('.drop-cover-drop').hide();
            $('.drop-logo-drop').hide();
        };

        e.preventDefault();
    });
});

