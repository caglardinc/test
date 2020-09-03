(function( $ ) {
 
    $("li.menu-item").hover(
        function(){  
            imgurl = $(this).find('.edit-menu-item-mimg').val();  
            if(imgurl.indexOf('http://') === 0){ 
                $(this).find('.custom_media_button').text('Change');
            }else{ 
                $(this).find('.custom_media_button').text('Upload');
            }  
        },
        function(){ 
            imgurl = $(this).find('.edit-menu-item-mimg').val();  
            if(imgurl.indexOf('http://') === 0){ 
                $(this).find('.custom_media_button').text('Change');
            }else{ 
                $(this).find('.custom_media_button').text('Upload');
            }  
    });

    $('li.menu-item').each(function(i){
        gimgurl = $(this).find('#upimage').attr('src');
        if(gimgurl.indexOf('http://') === 0){ 
        }else{
            $(this).find('#upimage').css("display", "none");
        }
    });

    var mid;
    var mcls;
    var btnid;
    $('.field-mimg').hover(
        function(){
            // first function is for the mouseover/mouseenter events
            btnid = $(this).find('.custom_media_button').attr("id");
            mid = $(this).find('.widefat').attr("id");
            mcls = $(this).find('#upimage').attr("class");    
        },
        function(){
             // code goes to here. 
    });

    $(".field-mimg").on('click','.custom_media_remove' , function(e) {
         e.preventDefault();
         $('#'+mid).val(''); 
         $('.'+mcls).attr('src','').css('display','none'); 
        cng = $(this).siblings(".custom_media_button");
        cng.text('Upload');
    }); 
 
    function media_upload(button_class) {

        var _custom_media = true,

        _orig_send_attachment = wp.media.editor.send.attachment;



        $('body').on('click', button_class, function(e) {

            var button_id ='#'+mid;

            var self = $(button_id);

            var send_attachment_bkp = wp.media.editor.send.attachment;

            var button = $(button_id);
 

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment){

                if ( _custom_media  ) { 
 
                    $('#'+mid).val(attachment.url); 
                    $('.'+mcls).attr('src',attachment.url).css('display','block'); 
                    mid = null;
                    mcls =null; 
                    url = $('.'+mcls).attr('src');
                    if(url!==''){
                        $('#'+btnid).text('Change');
                    }

                } else {

                    return _orig_send_attachment.apply( button_id, [props, attachment] );

                }

            }

            wp.media.editor.open(button);
                return false;
        });

    }
    media_upload('.custom_media_button.button');



})( jQuery );