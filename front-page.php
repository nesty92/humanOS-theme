<?php
/**
 *
 *  The front page template
 *  It can display a static page or latest blog posts.
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

get_header(); ?>

<?php
    $is_enb_front_page      = get_option( 'show_on_front' ) == 'page';
    $is_front_page          = $is_enb_front_page && is_front_page();

    if( $is_front_page ){

	   $are_active_sidebras =  is_active_sidebar( 'front-page-header-first' ) ||
                               is_active_sidebar( 'front-page-header-second' ) ||
                               is_active_sidebar( 'front-page-header-third' );

        if( $are_active_sidebras ){
?>
            <!-- the header front page sidebars -->
            <div class="mythemes-white mythemes-front-page-header-sidebars">

                <!-- the header front page sidebars content -->
                <div class="content">
                    <div class="container">

                        <aside class="row mythemes-header-items">

                            <!-- the header front page first sidebar -->
                            <div class="col s12 m4 l4 header-item">
                                <?php get_sidebar( 'front-page-header-first' ); ?>
                            </div>

                            <!-- the header front page second sidebar -->
                            <div class="col s12 m4 l4 header-item">
                                <?php get_sidebar( 'front-page-header-second' ); ?>
                            </div>

                            <!-- the header front page third sidebar -->
                            <div class="col s12 m4 l4 header-item">
                                <?php get_sidebar( 'front-page-header-third' ); ?>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>


<!-- the content -->
<div id="main_content" class="content scrollspy">

    <!-- the container ( align to center ) -->
    <div class="container">
        <div class="row">

            <?php
                // static front page
                if( $is_front_page ){

                    // get layout details
                    $mythemes_humanos_layout = new mythemes_humanos_layout( 'front-page' );

                    // left sidebar ( if exists )
                    $mythemes_humanos_layout -> sidebar( 'left' );
            ?>
                    <!-- the page content -->
                    <section class="<?php echo $mythemes_humanos_layout -> classes(); ?>">

                    <?php

                        $wp_query = new WP_Query(array(
                            'p' 		=> get_option( 'page_on_front' ),
                            'post_type' => 'page'
                        ));

                        $not_found = true;

                        if( count( $wp_query -> posts ) ){

                            // the page content class
                            $classes = implode( ' ' , get_post_class( 'mythemes-page' , absint( get_option( 'page_on_front' ) ) ) );

                            // the page content wrapper
                            echo '<div class="' . $classes . '">';

                            foreach( $wp_query -> posts as $post ){

                                $wp_query -> the_post();

                                // the page thumbnail
                                $p_thumbnail = get_post( get_post_thumbnail_id() );

                                if( has_post_thumbnail() && isset( $p_thumbnail -> ID ) ){
                                	?>
	                                    <div class="post-thumbnail">
	                                    <?php
	                                    	echo get_the_post_thumbnail( $post -> ID, 'full', array(
	                                    		'alt' 	=> mythemes_post::title( $post -> ID, true )
	                                    	));

                                            // the thumbnail caption
	                                    	$c_thumbnail = !empty( $p_thumbnail -> post_excerpt ) ? esc_html( $p_thumbnail -> post_excerpt ) : null;

	                                        if( !empty( $c_thumbnail ) ) {
	                                    		?>
		                                            <footer class="wp-caption">
		                                                <?php echo $c_thumbnail; ?>
		                                            </footer>
	                                    		<?php
	                                        }
	                                    ?>
	                                    </div>
                                	<?php
                            	}

                                // the page content
                                the_content();

                                // the page pagination
                                wp_link_pages( array(
                                    'before'        => '<div class="clearfix"></div><div class="mythemes-paged-post"><span class="mythemes-pagination-title">' . __( 'Pages', 'materialize' ) . ': </span>',
                                    'after'         => '</div>',
                                    'link_before'   => '<span class="mythemes-pagination-item">',
                                    'link_after'   	=> '</span>'
                                ));

                                echo '<div class="clearfix"></div>';
                                echo '</div>';
                            }

                            $not_found = false;
                        }

                        // if page not found
                        if( $not_found ){
                            echo '<h3>' . __( 'Page not found' , 'materialize' ) . '</h3>';
                            echo '<p>' . __( 'We apologize but this page, post or resource does not exist or can not be found.' , 'materialize' ) . '</p>';
                        }
                    ?>

                    </section>
            <?php
                    // right sidebar ( if exists )
                    $mythemes_humanos_layout -> sidebar( 'right' );

                }

                // latest blog posts
                else{

                    /**
                     *
                     *  Include the posts loop
                     *  If you want to override this in a child theme, then include a file
                     *  called loop.php and that will be used instead.
                     */

                    get_template_part( 'templates/loop' );
                }
            ?>
            </div>
        </div><!-- .container -->
    </div><!-- .content -->


<?php get_footer(); ?>
