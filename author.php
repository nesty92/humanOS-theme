<?php
/**
 *
 *  The template for displaying author posts
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

get_header(); ?>

    <?php
        if( (bool)get_theme_mod( 'mythemes-show-breadcrumbs', true ) ){
    ?>
            <!-- the breadcrumbs content -->
            <div class="mythemes-page-header">

                <!-- the breadcrumbs container ( align to center ) -->
                <div class="container">
                    <div class="row">

                        <div class="col s12 m8 l9">

                            <!-- the breadcrumbs navigation path -->
                            <nav class="mythemes-nav-inline">
                                <ul class="mythemes-menu">

                                    <!-- the home link -->
                                    <?php echo mythemes_breadcrumbs::home(); ?>

                                    <li><?php _e( 'Author' , 'materialize' ); ?></li>

                                    <!-- the last arrow from path -->
                                    <li></li>
                                </ul>
                            </nav>

                            <!-- the headline ( Author Name ) -->
                            <h1><?php  echo get_the_author_meta( 'display_name' , $post-> post_author ); ?></h1>
                        </div>

                        <!-- the avatar author -->
                        <div class="col s12 m4 l3 mythemes-author-avatar">
                            <div class="author-details">
                                <?php echo get_avatar( $post -> post_author, 68, get_template_directory_uri() . '/media/img/default-avatar-68.png' ); ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
    <?php
        }
    ?>


    <!-- the content -->
    <div id="main_content" class="content">

        <!-- the container ( align to center ) -->
        <div class="container">
            <div class="row">

                <?php

                    /**
                     *
                     *  Include the posts loop
                     *  If you want to override this in a child theme, then include a file
                     *  called loop.php and that will be used instead.
                     */

                    get_template_part( 'templates/loop' );
                ?>

            </div>
        </div><!-- .container -->
    </div><!-- .content -->


<?php get_footer(); ?>
