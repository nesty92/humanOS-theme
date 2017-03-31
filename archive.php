<?php
/**
 *
 *  The template for displaying archive pages
 *
 *  Used to display archive-type pages if nothing more specific matches a query.
 *  For example, puts together date-based pages if no date.php file exists.
 *
 *  @link https://codex.wordpress.org/Template_Hierarchy
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

                                    <?php
                                        // the path for the daily archives
                                        if ( is_day() ){
                                            $day    = get_the_date( );
                                            $m      = get_the_date( 'm' );
                                            $d      = get_the_date( 'd' );

                                            $month  = get_the_date( 'F' );
                                            $year   = get_the_date( 'Y' );
                                            $FY     = get_the_date( 'F Y' );

                                            echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( __( 'Yearly archives - %s' , 'materialize' ), esc_attr( $year ) ) . '">'  . esc_html( $year ) . '</a></li>';
                                            echo '<li><a href="' . esc_url( get_month_link( $year, $m ) ) . '" title="' . sprintf( __( 'Monthly archives - %s' , 'materialize' ), esc_attr( $FY ) ) . '">'  . esc_html( $month ) . '</a></li>';
                                            echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( $d ) . '</time></li>';

                                            $title  = __( 'Daily Archives' , 'materialize' );

                                        }

                                        // the path for the monthly archives
                                        else if ( is_month() ){
                                            $month  = get_the_date( 'F' );
                                            $year   = get_the_date( 'Y' );

                                            echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( __( 'Yearly archives - %s' , 'materialize' ), esc_attr( $year ) ) . '">'  . esc_html( $year ) . '</a></li>';
                                            echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( $month ) . '</time></li>';
                                            
                                            $title  = __( 'Monthly Archives' , 'materialize' );

                                        }

                                        // the path for the yearly archives
                                        else if ( is_year() ){
                                            $year   = get_the_date( 'Y' );
                                            echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">'  . esc_html( $year ) . '</time></li>';

                                            $title  = __( 'Yearly Archives' , 'materialize' );

                                        }

                                        // the path for the others cases
                                        else{
                                            $year   = __( 'Archives' , 'materialize' );
                                            echo '<li>' . esc_html( $year ) . '</li>';
                                            $title  = $year;
                                        }
                                    ?>

                                    <!-- the last arrow from path -->
                                    <li></li>
                                </ul>
                            </nav>

                            <!-- the headline -->
                            <h1><?php echo $title; ?></h1>
                        </div>

                        <!-- the number of posts from archive -->
                        <div class="col s12 m4 l3 mythemes-posts-found">
                            <div class="found-details">
                                <?php echo mythemes_breadcrumbs::count( $wp_query ); ?>
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