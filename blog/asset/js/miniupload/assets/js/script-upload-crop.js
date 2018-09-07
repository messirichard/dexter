$(document).ready(function(){
    // init jCrop
    var jcrop_api;
    initJcrop();

    'use strict';

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),
        dataType: 'json',
        progress: function(e, data){
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css(
                'width',
                progress + '%'
            );
        },

        fail:function(e, data){
            // Something has gone wrong!
            alert('Something has gone wrong!');
        },

        done: function(e, data){
            if (data.result.msg=='ok') {
                jcrop_api.setImage(data.result.fullpath);
                $('.upload-filenya').hide();
                $('.crop-filenya').show();
                miniupload_crop_object.val(data.result.name);
                
                // Close Fancybox
                $.fancybox.close();

                if (miniupload_crop_status == 'update') {
                    jcrop_api.animateTo([                   
                        0,
                        0,
                        miniupload_crop_width,
                        miniupload_crop_height
                    ]);
                    $('#x').val(0);
                    $('#y').val(0);
                    $('#w').val(miniupload_crop_width);
                    $('#h').val(miniupload_crop_height);
                }else{
                    var img = new Image();
                    img.onload = function() {
                        jcrop_api.animateTo([                   
                            0,
                            0,
                            miniupload_crop_width,
                            miniupload_crop_height
                        ]);
                    }
                    img.src =  data.result.fullpath;
                }
            }else{
                alert(data.result.msg);
            };


        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });


    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }

    function releaseCheck()
    {
      jcrop_api.setOptions({ allowSelect: true });
      $('#can_click').attr('checked',false);
    };

    $('.change-image').live('click',function(){
        $('.upload-filenya').slideDown();
        $('.crop-filenya').slideUp();
    })
    $('.change-image-cancel').live('click',function(){
        $('.upload-filenya').slideUp();
        $('.crop-filenya').slideDown();
    })
    
    if (miniupload_crop_status == 'update') {
    }else{
        $('#x').val(0);
        $('#y').val(0);
        $('#w').val(miniupload_crop_width);
        $('#h').val(miniupload_crop_height);
    }

    // JCrop
    function initJcrop()//{{{
    {
          $('.crop-image').Jcrop({
            boxWidth: 800,
            minSize: [miniupload_crop_width, miniupload_crop_height],
            // trueSize: [jcrop_width,jcrop_height],
            onRelease: releaseCheck,
            onSelect: updateCoords,
            aspectRatio: miniupload_crop_width / miniupload_crop_height
          },function(){


            jcrop_api = this;
            if (miniupload_crop_status == 'update') {
                jcrop_api.setImage($('.crop-image').attr('src'));
                var img = new Image();
                img.onload = function() {
                    jcrop_api.animateTo([                   
                        $('#x').val(),
                        $('#y').val(),
                        $('#x').val()*1+$('#w').val()*1,
                        $('#y').val()*1+$('#h').val()*1
                    ]);
                }
                img.src =  $('.crop-image').attr('src');
                $('.upload-filenya').hide();
            }else{;
                jcrop_api.disable();
                $('.upload-filenya').show();
                $('.crop-filenya').hide();
            }

          });

    };

});



$('.delete-gambar').live('click', function() {
    $(this).parent().parent().parent().remove();
    return false;
})

function updateCoords(c)
{
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

function checkCoords()
{
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
};