$(function(){
    var jumlah_logo_upload = 0;

    $('#drop-logo a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload-logo').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#upload-logo'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
            jumlah_logo_upload = jumlah_logo_upload + 1;

            // membatalkan upload
            if (jumlah_logo_upload > 1) {
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
                $('#upload-logo img').attr('src', json.thumb);
                // $.fancybox.close();
            }else{
                alert(json.msg)
            };
            jumlah_logo_upload = 0;
        }

    });


});

