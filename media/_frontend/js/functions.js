;(function($){
    $(function(){



        $('.button-collapse[data-activates="nav-mobile"]').sideNav();
        // $('.parallax').parallax();

        $(window).scroll(function(e){
          var scrollTop = $(window).scrollTop();
          var docHeight = $(document).height();
          var winHeight = $(window).height();
          var scrollPercent = (scrollTop) / (docHeight - winHeight);
          var scrollPercentRounded = Math.round(scrollPercent*100);
          if(scrollPercentRounded>25 && $('.link_up').css('visibility')!='visible'){
              $('.link_up').css({visibility: 'visible'});
          }
          else if(scrollPercentRounded<25 && $('.link_up').css('visibility')=='visible') {
            $('.link_up').css({visibility: 'hidden'});
          }


        });

        $('.scrollspy').scrollSpy({scrollOffset: 50});
        $('.slider').slider({height: 200});
        $('.button-collapse[data-activates="widget-mobile"]').sideNav({
            menuWidth: '470', // Default is 240
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
          }
        );
        // $('.materialboxed').each(function(){
        //     var parent_a = $(this).parent().parent();
        //     if(parent_a.attr('href')){
        //         parent_a.attr('data-src',parent_a.attr('href'))
        //         parent_a.removeAttr('href')
        //     }
        // });

        // var observer = new MutationObserver(function(mutations) {
        //     mutations.forEach(function(mutation) {
        //       for(var j=0; j<mutation.addedNodes.length; ++j) {
        //                // was a child added with ID of 'bar'?
        //                if(mutation.addedNodes[j].id == "sidenav-overlay") {
        //                    //console.log("bar was added!");
        //
        //                    $(mutation.addedNodes[j]).click(function(){
        //                      if(state)
        //                      show_aside();
        //                    });
        //                }
        //            }
        //
        //         // if (mutation.attributeName === "class") {
        //         //     var attributeValue = $(mutation.target).prop(mutation.attributeName);
        //         //     var parent_a = $(mutation.target).parent().parent();
        //         //     if(attributeValue.indexOf("active") != -1){
        //         //       if(!$(mutation.target).attr('data-img'))
        //         //           $(mutation.target).attr('data-img',$(mutation.target).attr('src'))
        //         //       $(mutation.target).attr('src',parent_a.attr('data-src'))
        //         //     }else{
        //         //       // $(this).attr('data-img',$(this).attr('src'))
        //         //       $(mutation.target).attr('src',$(mutation.target).attr('data-img'))
        //         //     }
        //         //
        //         // }
        //     });
        // });
        // $('img.materialboxed.size-thumbnail').each(function(){
            // observer.observe($('body')[0],  {
            //     childList: true
            // });
        // });
        // $('.materialboxed').materialbox();

        $('#search').focus(function() {
            $(this).parent().parent().parent().addClass('focused');
            });

        $('#search').blur(function() {
            if (!$(this).val()) {
                $(this).parent().parent().parent().removeClass('focused');
            }
        });


          $('.comment-quote-link').click(function(){
            //Find the content
              var comment_content=$(this).parent().parent().parent().parent().find('div.comment-quote').html();
              //Add Blockquote to the textarea
              var id=$(this).parent().parent().parent().parent().attr('id');
              var name=$(this).parent().parent().parent().parent().find('cite').text();
              var first='<strong><a href="#'+id+'">'+name+'</a> :</strong>';
              $('textarea#comment').html('<blockquote>'+first+comment_content+'</blockquote>');
                });

              });

              // $('a[data-activates="widget-mobile"]').click(function(){
              //   show_aside();
              // })
              //
              // function show_aside(){
              //   if(state){
              //     $("#hiddenSideBar").toggleClass("show");
              //     $("body").css({});
              //     // $('#sidenav-overlay').remove();
              //     state=false;
              //   }
              //   else{
              //     $("#hiddenSideBar").toggleClass("show");
              //     // $('body').append('<div id="sidenav-overlay" style="opacity: 1;" class=""></div>')
              //
              //
              //     $("body").css({overflow:"hidden"});
              //
              //     state=true;
              //   }
              //
              // }
              //
              //



////
$.fn.stickyTopBottom = function(options) {
	  var $el, container_top, current_translate, element_top, last_viewport_top, viewport_height;
	  if (options == null) {
	    options = {};
	  }
	  options = $.extend({
	    container: $('#main_content'),
	    top_offset: 70,
	    bottom_offset: 0
	  }, options);
	  $el = $(this);
	  container_top = options.container.offset().top + 30;
	  element_top = $el.offset().top;
	  viewport_height = $(window).height();
	  $(window).on('resize', function() {
	    return viewport_height = $(window).height();
	  });
	  current_translate = 0;
	  last_viewport_top = document.documentElement.scrollTop || document.body.scrollTop;
	  return $(window).scroll(function(event) {
	    var container_bottom, effective_viewport_bottom, effective_viewport_top, element_fits_in_viewport, element_height, is_scrolling_up, new_translation, viewport_bottom, viewport_top;
	    viewport_top = document.documentElement.scrollTop || document.body.scrollTop;
	    viewport_bottom = viewport_top + viewport_height;
	    effective_viewport_top = viewport_top + options.top_offset;
	    effective_viewport_bottom = viewport_bottom - options.bottom_offset;
	    element_height = $el.height();
	    is_scrolling_up = viewport_top < last_viewport_top;
	    element_fits_in_viewport = element_height < viewport_height;
	    new_translation = null;
	    if (is_scrolling_up) {
	      if (effective_viewport_top < container_top) {
	        new_translation = 0;
	      } else if (effective_viewport_top < element_top + current_translate) {
	        new_translation = effective_viewport_top - element_top;
	      }
	    } else if (element_fits_in_viewport) {
	      if (effective_viewport_top > element_top + current_translate) {
	        new_translation = effective_viewport_top - element_top;
	      }
	    } else {
	      container_bottom = container_top + options.container.height();
	      if (effective_viewport_bottom > container_bottom) {
	        new_translation = container_bottom - (element_top + element_height);
	      } else if (effective_viewport_bottom > element_top + element_height + current_translate) {
	        new_translation = effective_viewport_bottom - (element_top + element_height);
	      }
	    }
	    if (new_translation !== null) {
	      current_translate = new_translation;
	      $el.css("cssText","transform: translate(0, " + (current_translate) + "px) !important");
	      // if(current_translate == 0){
	      // 	$el.css('margin-top',"0");
	      // }else{
	      // 	$el.css('margin-top',"40px");
	      // }

	    }
	    return last_viewport_top = viewport_top;
	  });
	};




  var $window = $(window);


  function checkWidth() {
      var windowsize = $window.width();
      if (windowsize > 992) {
        $('#widget-mobile').stickyTopBottom();
      }
      else{
        $('#widget-mobile').unbind("stickyTopBottom");
      }
  }
  // Execute on load
  checkWidth();
  // Bind event listener
  $(window).resize(checkWidth);

})(jQuery);

var mythemes_masonry = {
    _class : function(){
        this.init = function( el, callback ){
            var total = jQuery( el ).find( 'img' ).length;

            jQuery( el ).find( 'img' ).each(function(){
                var image = new Image();

                image.onload = function(){
                    total--;

                    if( total == 0 ){
                        callback();
                    }
                }

                image.src = jQuery( this ).attr( 'src' );
            });
        }
    }
};

var _mythemes_masonry = new mythemes_masonry._class();

jQuery(document).ready(function(){

    /* CHANGE BORDER BOTTOM ON WINDOW RESIZE */
    jQuery( window ).resize(function() {
        if( jQuery( '.mythemes-gallery' ).length ){
            jQuery( '.mythemes-gallery' ).masonry();
        }

    });


});

jQuery(document).ready(function(){

    _mythemes_masonry.init( 'div.mythemes-gallery', function(){
        jQuery( 'div.mythemes-gallery' ).masonry();
    });

    jQuery(
        'div.widget div.tagcloud a,' +
        'article div.meta ul.post-categories li a,' +
        'body.single section div.post-meta-tags a,' +
        'div.comment-respond h3.comment-reply-title small a,' +
        'div.pagination a,' +
        'article a.more-link'
    ).addClass( 'waves-effect waves-light' );


    jQuery(
        'div.collapsed-wrapper ul li a'
    ).each(function(){
        jQuery( this ).addClass( 'waves-effect waves-dark' );
    });

    if( jQuery( 'select' ).length ){
        jQuery('select').material_select();
    }

    if( !jQuery( 'textarea' ).hasClass( 'materialize-textarea' ) ){
        jQuery( 'textarea' ).addClass( 'materialize-textarea' );
    }

    jQuery(
        'div.comment-respond h3.comment-reply-title small a'
    ).addClass( 'btn waves-effect waves-light' );


    if( !jQuery( '.btn,[class^="btn"]' ).hasClass( 'waves-effect' ) )
        jQuery( '.btn,[class^="btn"]' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '[class*="btn"]' ).hasClass( 'waves-effect' ) )
        jQuery( '[class*="btn"]' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '.button' ).hasClass( 'waves-effect' ) )
        jQuery( '.button' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '.mythemes-btn' ).hasClass( 'waves-effect' ) )
        jQuery( '.mythemes-btn' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '.mythemes-button' ).hasClass( 'waves-effect' ) )
        jQuery( '.mythemes-button' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( 'button' ).hasClass( 'waves-effect' ) )
        jQuery( 'button' ).addClass( 'waves-effect waves-dark' );

    jQuery( 'input[type="button"], input[type="submit"], input[type="reset"]' ).addClass( 'waves-effect waves-dark' );
});
