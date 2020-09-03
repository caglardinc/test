(function( $ ) {

    jQuery(document).ready( function($) {

        function media_upload(button_class) {

            var _custom_media = true,

            _orig_send_attachment = wp.media.editor.send.attachment;



            $('body').on('click', button_class, function(e) {
                var xurl = $(this).siblings('.custom_media_url').attr('class');
                xurl = xurl.split(' ').join('.'); 
                var durl = '.'+xurl;
                var ximg = $(this).siblings('.custom_media_image').attr('class');
                ximg = ximg.split(' ').join('.'); 
                var dimg = '.'+ximg;


                var button_id ='#'+$(this).attr('id');

                var self = $(button_id);

                var send_attachment_bkp = wp.media.editor.send.attachment;

                var button = $(button_id);

                var id = button.attr('id').replace('_button', '');

                _custom_media = true;

                wp.media.editor.send.attachment = function(props, attachment){

                    if ( _custom_media  ) {

                        $('.custom_media_id').val(attachment.id);

                       $(durl).val(attachment.url);

                        $(dimg).attr('src',attachment.url).css('display','block');

                    } else {

                        return _orig_send_attachment.apply( button_id, [props, attachment] );

                    }

                }

                wp.media.editor.open(button);

                    return false;

            });

        }

        media_upload('.custom_media_button.button');

    });

})( jQuery );