<?php
/**
 *
 *  The template part for displaying bottom post meta
 *  The bottom post meta containing the post tags
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    if( (bool)get_theme_mod( 'mythemes-bottom-meta' , true ) ){

	    if( has_tag() ){
?>
	        <div class="post-meta-terms">
	            <div class="post-meta-tags">

	                <span class="mythemes-btn"><i class="white-text zmdi zmdi-tag zmdi-hc-fw"></i></span>
	                <?php the_tags( '' , '' , '' ); ?>

	                <div class="clear clearfix"></div>
	            </div><!-- .post-meta-tags -->
	        </div><!-- .post-meta-terms -->
<?php
	    }
	}
?>
