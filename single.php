<?php
/**
 *
 *  The template for displaying all single posts and attachments
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

                        <div class="col s12">

                            <!-- the breadcrumbs navigation path -->
                            <nav class="mythemes-navigation">
                              <ul>

                                <!-- the home link -->
                                <?php echo mythemes_breadcrumbs::home(); ?>

                                <!-- the post categories ( hierarchical path ) -->
                                <?php
                                    global $post;

                                    $categories = array_reverse( get_the_category( $post -> ID ) );

                                    if( !empty( $categories ) ){

                                        foreach( $categories as $c ){
                                            echo mythemes_breadcrumbs::categories( absint( $c -> term_id ) );
                                            break;
                                        }
                                    }
                                ?>

                                <!-- the last arrow from path -->
                                <li></li>

                              </ul>
                            </nav>

                        </div>

                    </div>
                </div>

            </div>
    <?php
        }
    ?>


    <!--  the content -->
    <div id="main_content" class="content scrollspy">

        <!--  the container ( align to center ) -->
        <div class="container">
            <div class="row">

            <?php
                global $post;

                // get layout details
                $mythemes_humanos_layout = new mythemes_humanos_layout( 'post' );

                // left sidebar ( if exists )
                $mythemes_humanos_layout -> sidebar( 'left' );
            ?>
                <!-- the post -->
                <section class="<?php echo $mythemes_humanos_layout -> classes(); ?>">

                <?php

                    if( have_posts() ){
                        while( have_posts() ){
                            the_post();
                ?>
                            <article <?php post_class(); ?>>

                                <?php
                                    // the post thumbnail
                                    $p_thumbnail ;//= get_post( get_post_thumbnail_id( $post -> ID ) );

                                    if( has_post_thumbnail( $post -> ID ) && isset( $p_thumbnail -> ID ) ){
                                ?>
                                        <!-- the post thumbanil wrapper -->
                                        <div class="post-thumbnail overflow-wrapper">

                                        <?php

                                            // the post thumbnail
                                            echo get_the_post_thumbnail( $post -> ID , 'mythemes-classic' , array(
                                                'alt' => mythemes_post::title( $post -> ID, true )
                                            ));

                                            // the post thumbnail caption
                                            $c_thumbnail = isset( $p_thumbnail -> post_excerpt ) ? esc_html( $p_thumbnail -> post_excerpt ) : null;

                                            if( !empty( $c_thumbnail ) ){
                                                echo '<div class="valign-bottom-cell-wrapper">';
                                                echo '<footer class="valign-cell">' . $c_thumbnail . '</footer>';
                                                echo '</div>';
                                            }
                                        ?>
                                        </div><!-- .post-thumbnail -->
                                <?php
                                    }
                                ?>

                                <!-- the post title -->
                                <h1 class="post-title"><?php the_title(); ?></h1>

                                <!-- the post top meta: author / time / comments -->
                                <?php get_template_part( 'templates/meta/top' ); ?>

                                <!-- the post content wrapper -->
                                <div class="post-content">
                                    <!-- the post content -->
                                    <?php the_content(); ?>
                                    <div class="clearfix"></div>
                                </div>

                            </article>

                            <?php
                                // the post pagination ( if exists )
                                wp_link_pages( array(
                                    'before'        => '<div class="mythemes-paged-post"><span class="mythemes-pagination-title">' . __( 'Pages', 'materialize' ) . ': </span>',
                                    'after'         => '<div class="clearfix"></div></div>',
                                    'link_before'   => '<span class="mythemes-pagination-item">',
                                    'link_after'    => '</span>'
                                ));
                            ?>

                            <?php
                                /**
                                 *
                                 *  The template part for displaying bottom post meta
                                 *  If you want to override this in a child theme, then include a file
                                 *  called bottom.php and that will be used instead.
                                 */

                                get_template_part( 'templates/meta/bottom' );
                            ?>

                            <!-- the post comments -->
                            <?php comments_template(); ?>

                <?php
                        } // end of post
                    }
                ?>

                </section>

            <?php
                // right sidebar ( if exists )
                $mythemes_humanos_layout -> sidebar( 'right' );
            ?>

            </div>
        </div><!-- .container -->
    </div><!-- .content -->


<?php get_footer(); ?>
