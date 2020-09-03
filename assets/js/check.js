(function ($) {
    "use strict";
	 

 	// check selection variable
	var checkValue = false;
	$(".jacai").change(function() {
	  var names = {};
	  $('.jacai').each(function() {
	      names[$(this).attr('name')] = true;
	  });
	  var count = 0;
	  $.each(names, function() { 
	      count++;
	  });
	  if ($('.jacai:checked').length === count) {
	    checkValue = true; 
	  }
	}).change(); 


	// check selection if reset
	$(document).on('click', '.reset_variations,.close', function (e) {
	   e.preventDefault(); 
	  checkValue = false;
	});

 
    // START ajax add to cart By Sajib Talukder
    $(document).on('click', '.single_add_to_cart_button', function (e) {
        e.preventDefault();
        var $this = $(this);
        var btnTxt = 'Add to Cart';
        $this.addClass('adding');  
        $this.html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
         
        var cart = $this.closest( 'form.cart' ),
            quantity = cart.find('input[name=quantity]').val(), 
            pid = cart.find('input[name=product_id]').val(); 

            var item;
            if($('.variations_form').length){
             var $variation_form = $( this ).closest( '.variations_form' );
                var var_id = $variation_form.find( 'input[name=variation_id]' ).val();
                $( '.ajaxerrors' ).remove();
                var item = {},
                    check = true;
                    var variations = $variation_form.find( 'select[name^=attribute]' );
                    if ( !variations.length) {
                        variations = $variation_form.find( '[name^=attribute]:checked' );
                    }
                    if ( !variations.length) {
                        variations = $variation_form.find( 'input[name^=attribute]' );
                    }
                variations.each( function() {
                    var $this = $( this ),
                        attributeName = $this.attr( 'name' ),
                        attributevalue = $this.val(),
                        index,
                        attributeTaxName; 
                        item[attributeName] = attributevalue; 
                } );
                // prevent proceed without selection
                if(checkValue!=true){
                  console.log(checkValue+' - N');
                   return false;
                }else{ 
                  console.log(checkValue+' - Y');
                }
            }else{
              item = 0;
              var pid = $this.attr('value');
            }
            // console.log(item);
        // The Ajax request
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                'action': 'variation_to_cart', 
                pid : pid,
                quantity : quantity, 
                item : item
            },
            success: function (response) { 
                  
                var fragments = response.fragments;

                if ( fragments ) {
                //  console.log('fragments');

                  jQuery.each(fragments, function(key, value) {
                      jQuery(key).replaceWith(value);
                  });

                } 
                if ( response ) { 
                  $('#added').show();

 
                  setTimeout(function() {   
                   // $('#added').fadeOut(1000); 
                   $this.removeClass('adding');
                   $this.html();
                   $this.text(btnTxt);  
                    $('#added').hide();
                    $('.modal').modal('toggle'); 
                  }, 2000); 


                } 
             
            },
            error: function (error) {
                 
            }
        });  
    });
    // END ajax add to cart By Sajib Talukder



})(jQuery); 

