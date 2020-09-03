(function ($) {
    "use strict";


  // date picker start
  var ldates = object_name.datesDisabled,
  hours = object_name.hoursDisabled;

  if (hours) {   
     hours = object_name.hoursDisabled;
  } else {
     hours = '';
  }
  if(ldates){
    var  dateArray = ldates.split("|");
    if (dateArray && dateArray.length) {   
       dateArray = ldates.split("|");
    } else {
       dateArray = [];
    }
  }else{
    dateArray = [];
  }

  $("#soupdatetimepicker").datetimepicker({ 
    format: "dd MM, yyyy - HH:ii p",
    hoursDisabled: hours,
    startDate:new Date(),
    datesDisabled: dateArray
  });

  // date picker end


// Gift card
$('.modal-body #give-as-present').click(function(e) { 
  e.preventDefault();
  var link =  $(this).siblings('button').data('link'); 
  console.log(link);
  location.href = link;
}); 

// pagination
$('nav.mt-5 ul').removeClass('page-numbers').addClass('pagination justify-content-center');
$('nav.mt-5 ul li').addClass('page-item');
$('nav.mt-5 ul li span').removeClass('page-numbers').addClass('page-link');
$('nav.mt-5 ul li a').removeClass('page-numbers').addClass('page-link');


//  widget search
$('.disp-review .blockquote:even .blockquote-content').addClass('dark');
$('.blockquotes.hom1 .blockquote:odd .blockquote-content').addClass('dark').attr('data-animation','fadeInRight');
$('.blockquotes.hom1 .blockquote:odd').attr('data-animation','fadeInRight');

//  widget search
$('.widget_search .search-form .search-field').addClass('form-control');
$('.widget_search .search-form .search-field').unwrap();
$('.screen-reader-text').remove(); 
$('.widget_search .search-form .search-submit').wrap( "<div class=\"btn btn-secondary btn-block\"></div>" );
$('.no-results .search-form .search-submit').wrap( "<div class=\"btn btn-secondary\"></div>" );

// widget recent post , recent comment , archive , categories , meta
$('.widget_recent_entries ul,.widget_recent_comments ul,.widget_archive ul,.widget_categories ul,.widget_meta ul,.widget_pages ul,.widget_rss ul,.widget_nav_menu ul').addClass('list-posts');
$('.widget_recent_entries ul li a,.widget_recent_comments ul li a,.widget_archive ul li a,.widget_categories ul li a,.widget_meta ul li a').addClass('title');
$('.widget_recent_entries ul li span').removeClass('post-date').addClass('date');

// post comment form
$('#add-comment p.form-submit').removeClass('form-submit').addClass('btn btn-primary sp-cmnt');
$('.comment-reply-link,#cancel-comment-reply-link').addClass('text-primary');

// product pop up
$('.popsoup .variations.panel-details:first-child .collapse').addClass('show');
$('.panel-details-container.popsoup form.cart button').addClass('modal-btn btn btn-secondary btn-block btn-lg');

// faq animation
if ($("section").hasClass("soupanimation")) {
  $("body").attr({
    "data-spy" : "scroll",
    "data-target" : "#side-navigation",
    "data-offset" : "70" 
  });
}

// woocommerce checkkout
$('.woocommerce-billing-fields input,.woocommerce-shipping-fields input[type="text"],.woocommerce-billing-fields select,.woocommerce-additional-fields textarea,.woocommerce-account-fields input[type="password"],.checkout_coupon input[type="text"],.soup-woo-checkout .woocommerce-form-login input[type="text"],.soup-woo-checkout .woocommerce-form-login input[type="password"]').addClass('form-control');
$('.woocommerce-billing-fields #billing_address_1_field,.woocommerce-shipping-fields #shipping_address_1_field').removeClass('form-row-wide').addClass('form-row-first');
$('.woocommerce-billing-fields #billing_city_field,.woocommerce-shipping-fields #shipping_city_field').removeClass('form-row-wide').addClass('form-row-last');
$('#soup_own_checkout_field select').addClass('form-control'); 
$('#soup_own_checkout_field h3').replaceWith(function() {
    return '<h4 class="border-bottom pb-4 mt-5"><i class="ti ti-package mr-3 text-primary"></i>' + $(this).text() + '</h4>';
});
 
 $( ".panel-details-container.popsoup form.cart button" ).wrapInner( "<span></span>");

$('.deliver-field-class select').wrap( "<div class=\"select-container\"></div>" );

// place order button 
$('.place-order #place_order').wrap( "<div class=\"btn btn-primary soup-order\"></div>" );


 $("form.cart").on("change", "input.qty", function() {
    if (this.value === "0")
        this.value = "1";
 
    $(this.form).find("button[data-quantity]").data("quantity", this.value);
});


//  product quick view
$(document).on("click", ".popup .btn.ptom", function(){   
  $('.modal-content').html('<span class="tloading">Loading...</span>'); 
  var productId;
  productId = $(this).data('pid');  
  $.ajax({
    type: 'post',
    url: object_name.ajaxurl,
    data:  {
        productId: productId, 
        action: 'soup_product_view'
    } ,
    success: function (result) {   
      
        $('.modal-content').html(result); 
      
        var $icon = $('<svg class="icon" x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>');
        $('.custom-control-indicator').html($icon);


        $.getScript(object_name.soup_home+'wp-content/plugins/wc-variations-radio-buttons/assets/js/frontend/add-to-cart-variation.js', function() {
          console.log('add-to-cart-variation.js');
        }); 
        $.getScript(object_name.soup_home+'wp-content/themes/soup/assets/js/check.js', function() {
          console.log('check.js');
        });
        
        if($('.variations_form').length > 0){
          $('.variations_form .variations:nth-child(1) .collapse').addClass('show');
        }
    },
    error: function () {
      alert("error");
    }
  });        
});
 
  
// Ajax delete product in the cart
$(document).on('click', '#panel-cart .action-icon', function (e)
{
    e.preventDefault();

    $('.cart-summary').append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
  
    var product_id = $(this).attr("data-pid"),
        cart_item_key = $(this).attr("data-item_key");
     var data_2 = { 
        action: "product_remove",
        product_id: product_id, 
        cart_item_key: cart_item_key 
      };
    $.ajax({
        type: 'POST', 
        url: wc_add_to_cart_params.ajax_url,
        data: {
            action: "product_remove",
            product_id: product_id, 
            cart_item_key: cart_item_key 
        },
        success: function(response) {  
            // Replace fragments
            if ( response ) { 
               var fragments = response.fragments;

              if ( fragments ) {

                jQuery.each(fragments, function(key, value) {
                    jQuery(key).replaceWith(value);
                });
                $('.cart-summary .lds-ellipsis').remove();

              }
            }
        }
    });

    jQuery.post( object_name.ajaxurl, data_2, function( response ){ 
      $( 'body' ).trigger( 'wc_fragment_refresh' );
      $( 'body' ).trigger( 'update_checkout' );   
    });
});  


if(object_name.singleProduct){

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
                   $('#added').fadeOut(1000); 
                   $this.removeClass('adding');
                   $this.html();
                   $this.text(btnTxt); 
                  }, 2000); 

                } 
             
            },
            error: function (error) {
                 
            }
        });  
    });
    // END ajax add to cart By Sajib Talukder
}


  // product quantity udpate in checkout page
  $( "form.checkout" ).bind( "change keyup", "input.qty", function( e ) {
    var data = {
      action: 'update_order_review',
      security: wc_checkout_params.update_order_review_nonce,
      post_data: $( 'form.checkout' ).serialize()
    };

    jQuery.post( object_name.ajaxurl, data, function( response ){
      $( 'body' ).trigger( 'update_checkout' ); 
      $( 'body' ).trigger( 'wc_fragment_refresh' );
    });
  });

  // product quantity udpate in min cart
  $( "#panel-cart" ).bind( "change keyup", "input.qty", function( e ) {
    var data = {
      action: 'update_order_review', 
      post_data: $( 'form.sp-mincart' ).serialize()
    };

    $('.cart-summary').append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');

    jQuery.post( object_name.ajaxurl, data, function( response ){ 
      $( 'body' ).trigger( 'wc_fragment_refresh' );
      $( 'body' ).trigger( 'update_checkout' );   
    });
  });


})(jQuery); 

