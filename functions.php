<?php



 require_once( get_stylesheet_directory() . '/lib/main.php' );
	add_action( 'wp_enqueue_scripts',  array( 'mythemes_humanos_scripts',  'frontend' ), 0 );

  if( get_theme_mod( 'mythemes-gallery', true ) ){

      add_filter( 'post_gallery',         array( 'mythemes_humanos_gallery',  'shortcode'), null, 2 );
  }




    {   ////    NOT FOUND FUNCTIONS AND FILTERS

        /**
         * Determines the difference between two timestamps.
         *
         * The difference is returned in a human readable format such as "1 hour",
         * "5 mins", "2 days".
         *
         * @since 1.5.0
         *
         * @param int $from Unix timestamp from which the difference begins.
         * @param int $to Optional. Unix timestamp to end the time difference. Default becomes time() if not set.
         * @return string Human readable time difference.
         */
        function shoestrap_human_time_diff( $from, $to = '' ) {
            if ( empty( $to ) )
                $to = time();

            $diff = (int) abs( $to - $from );

            if ( $diff < HOUR_IN_SECONDS ) {
                $mins = round( $diff / MINUTE_IN_SECONDS );
                if ( $mins <= 1 )
                    $mins = 1;
                /* translators: min=minute */
                $since = sprintf( _n( '%s minuto', '%s minutos', $mins, 'shoestrap' ), $mins );
            } elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
                $hours = round( $diff / HOUR_IN_SECONDS );
                if ( $hours <= 1 )
                    $hours = 1;
                $since = sprintf( _n( '%s hora', '%s horas', $hours, 'shoestrap' ), $hours );
            } elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
                $days = round( $diff / DAY_IN_SECONDS );
                if ( $days <= 1 )
                    $days = 1;
                $since = sprintf( _n( '%s día', '%s días', $days, 'shoestrap' ), $days );
            } elseif ( $diff < 30 * DAY_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
                $weeks = round( $diff / WEEK_IN_SECONDS );
                if ( $weeks <= 1 )
                    $weeks = 1;
                $since = sprintf( _n( '%s semana', '%s semanas', $weeks, 'shoestrap' ), $weeks );
            } elseif ( $diff < YEAR_IN_SECONDS && $diff >= 30 * DAY_IN_SECONDS ) {
                $months = round( $diff / ( 30 * DAY_IN_SECONDS ) );
                if ( $months <= 1 )
                    $months = 1;
                $since = sprintf( _n( '%s mes', '%s meses', $months, 'shoestrap' ), $months );
            } elseif ( $diff >= YEAR_IN_SECONDS ) {
                $years = round( $diff / YEAR_IN_SECONDS );
                if ( $years <= 1 )
                    $years = 1;
                $since = sprintf( _n( '%s año ago', '%s años ago', $years, 'shoestrap' ), $years );
            }

            return $since;
        }







        function wpdocs_custom_excerpt_length( $length ) {
            return 25;
        }
        add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

        function wpdocs_excerpt_more( $more ) {
            return '...';
        }
        add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
        function fb_change_search_url_rewrite() {
        	if ( is_search() && ! empty( $_GET['s'] ) ) {
        		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' )).'/' );
        		exit();
        	}
        }
        add_action( 'template_redirect', 'fb_change_search_url_rewrite' );

        // function WPTime_add_custom_class_to_all_images($content){
        //     /* Filter by Qassim Hassan - http://wp-time.com */
        //     $my_custom_class = "materialboxed"; // your custom class
        //     $add_class = str_replace('<img class="', '<img class="'.$my_custom_class.' ', $content); // add class
        //     return $add_class; // display class to image
        // }
        // add_filter('the_content', 'WPTime_add_custom_class_to_all_images');
        //
        // function wpb_imagelink_setup() {
        // 	$image_set = get_option( 'image_default_link_type' );
        // 	if ($image_set !== 'none') {
        // 		update_option('image_default_link_type', 'none');
        // 	}
        // }
        // add_action('admin_init', 'wpb_imagelink_setup', 10);

	}





?>
