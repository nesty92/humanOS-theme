<?php
/**
 *
 *  The template for the search form
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */
?>

<!-- search form -->
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="searchform">
    <fieldset>
        <div id="searchbox">

        	<!-- search input -->
            <input type="text" name="s"  id="keywords" value="<?php _e( 'type here...' , 'materialize' ); ?>" onfocus="if (this.value == '<?php _e( 'type here...' , 'materialize' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'type here...' , 'materialize' ); ?>';}">

            <!-- search button -->
            <button type="submit" class="waves-effect waves-light btn" style="background-color:#773F5C;">

            	<!-- button search icon -->
            	<i class="mythemes-icon-search-5"></i></button>
        </div>
    </fieldset>
</form>
