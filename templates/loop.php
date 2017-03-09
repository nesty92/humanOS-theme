<?php
/**
 *
 *  The template part for displaying posts from blog
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */



    global $posts_total, $posts_index;

    $mythemes_humanos_layout = new mythemes_humanos_layout( );

    // left sidebar ( if exists )
    $mythemes_humanos_layout -> sidebar( 'left' );
?>

<!-- content -->
<section class="<?php echo $mythemes_humanos_layout -> classes(); ?> mythemes-classic">
<?php

//    if(is_home())
//      get_template_part( 'templates/header' );

    if( have_posts() ){
        $posts_total = count( $wp_query -> posts );
        $posts_index = 0;
        while( have_posts() ){
            $posts_index++;
            the_post();

            /**
             *
             *  Include the classic post view
             *  If you want to override this in a child theme, then include a file
             *  called classic.php and that will be used instead.
             */
             if (!is_search() ) {
            			if($post_type=='question'){
                            get_template_part( 'templates/views/card_horizontal' );
            			}else
                            get_template_part( 'templates/views/card' );

            }else {
                  get_template_part( 'templates/views/card_search' );
            }
      }
    }

    // if results not found
    else{?>

      <div class="">
          <div class="row ">


              <!-- the page content length ( 12 columns )  -->
              <section class="col s12 ">

                  <!-- the page content -->
                  <div>
                      <big class="error-404-message search-error"><?php echo materialize_not_found_message(); ?></big>
                      <p class="error-404-description"><?php echo materialize_not_found_description(); ?></p>

                  <div>

              </section>

          </div>
      </div>
<?php    }

    // pagination template
    get_template_part( 'templates/pagination' );
?>
</section>

<?php
    // right sidebar ( if exists )

    $mythemes_humanos_layout -> sidebar( 'right' );
?>
