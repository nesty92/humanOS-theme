<?php
/**
 *
 * 	The main template file
 *
 * 	This is the most generic template file in a WordPress theme
 * 	and one of the two required files for a theme (the other being style.css).
 * 	It is used to display a page when nothing more specific matches a query.
 * 	E.g., it puts together the home page when no home.php file exists.
 *
 * 	@link http://codex.wordpress.org/Template_Hierarchy
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

		                			<!-- the last arrow from path -->
		                			<li></li>
		              			</ul>
		            		</nav>

		            		<!-- the headline -->
		            		<h1><?php echo esc_html( get_theme_mod( 'blog-title' , __( 'Blog' , 'materialize' ) ) ); ?></h1>
		          		</div>

		          		<!-- the number of posts from blog -->
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
    <div id="main_content" class="content scrollspy">

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
