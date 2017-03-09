<?php
if( !class_exists( 'mythemes_humanos_gallery' ) ){

class mythemes_humanos_gallery
{
	static function shortcode( $rett, $_attr )
	{
		global $post;

        $attr = shortcode_atts( array(
            'order'                 => 'ASC',
            'orderby'               => 'menu_order ID',
            'id'                    => $post -> ID,
            'ids'                   => '',
            'itemtag'               => 'dl',
            'icontag'               => 'dt',
            'captiontag'            => 'dd',
            'columns'               => 3,
            'size'                  => 'thumbnail',
            'include'               => '',
            'exclude'               => '',
            'mythemes_style'    			=> 'none'
        ) , $_attr );

        /* NO MYTHEM.ES SHORTCODE EMBED */
        if( isset( $attr[ 'mythemes_style' ] ) && $attr[ 'mythemes_style' ] == 'none' ){
            return $rett;
        }


        $cols = $attr[ 'columns' ];
        $ids = array();

        if( empty( $attr[ 'ids' ] ) ){

            $id         = intval( $attr[ 'id' ] );
            $orderby    = $attr[ 'order' ];
            $order      = $attr[ 'order' ];
            $includes   = $attr[ 'include' ];
            $exclude    = $attr[ 'exclude' ];

            if ( 'RAND' == $attr[ 'order' ] ) {
                $orderby = 'none';
            }

            if ( !empty( $includes ) ) {
                $attachments = get_posts( array('include' => $includes, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } elseif ( !empty( $exclude ) ) {
                $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } else {
                $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
            }

            foreach ( $attachments as $key => $val ) {
                $ids[ ] = $val -> ID ;
            }
        }else{
            $ids = explode( ',' , $attr[ 'ids' ] );
        }

        $rett  = '<div class="mythemes-gallery colls-' . $cols . '">';

        foreach( $ids as $id ){

            $p = get_post( $id );

            if( !isset( $p -> ID ) ){
            	continue;
            }

            $media = wp_get_attachment_image_src( $id , 'large' );
            $full = wp_get_attachment_image_src( $id , 'full' );

            $rett .= '<figure class="mythemes-item ' . $attr[ 'mythemes_style' ] . '">';
            $rett .= '<div>';
            $rett .= '<div class="mythemes-thumbnail">';
            $rett .= '<img src="' . $media[ 0 ] . '" alt="' . mythemes_post::title( $p -> ID, true ) . '"/>';
            $rett .= '<figcaption>';
            $rett .= '<div class="mythemes-text">';

            if( !empty( $p -> post_title ) ){
                $rett .= '<div class="mythemes-title">';
                $rett .= '<h2>' . mythemes_post::title( $p -> ID ) . '</h2>';
                $rett .= '</div>';
            }

            $excerpt = strip_tags( $p -> post_excerpt );

            if( !empty( $excerpt ) ){
                $rett .= '<div class="mythemes-caption">';
                $rett .= '<p>' . esc_html( strip_tags( $p -> post_excerpt ) ) . '</p>';
                $rett .= '</div>';
            }

            $rett .= '</div>';
            $rett .= '<a href="' . $full[ 0 ] . '" data-gal="prettyPhoto[pp_gal]" title="' . $excerpt . '" class="waves-effect waves-dark"></a>';
            $rett .= '</figcaption>';
            $rett .= '</div>';
            $rett .= '</div>';
            $rett .= '</figure>';
        }

        $rett .= '<div class="clearfix clear"></div>';
        $rett .= '</div>';

        return $rett;
	}

	static function admin_init()
	{
		add_action( 'wp_enqueue_media', array( 'mythemes_gallery' , 'admin_media' ));
		add_action( 'print_media_templates', array( 'mythemes_gallery' , 'admin_settings' ));
	}

	static function admin_media()
	{
		if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
                return;

		wp_enqueue_script( 'mythemes-gallery-settings',  get_template_directory_uri() . '/media/_backend/js/gallery.js', array( 'media-views' ) );
	}

	static function admin_settings()
	{
        if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
            return;
        ?>
        <script type="text/html" id="tmpl-mythemes-gallery-settings">
            <label class="mythemes-gallery-settings">
                <span>myThem.es Style</span>
                <select class="mythemes_style" name="mythemes_style" data-setting="mythemes_style">
                <?php
                    $mythemes_style = array(
                        'none'              => __( 'None', 'materialize' ),
                        'effect-bubba'    	=> __( 'Effect Bubba', 'materialize' )
                    );

                    foreach ( $mythemes_style as $value => $name ) { ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, 'none' ); ?>>
                            <?php echo esc_html( $name ); ?>
                        </option>
                <?php } ?>
                </select>
            </label>
        </script>
        <?php
	}
}

}   /* END IF CLASS EXISTS */
?>
